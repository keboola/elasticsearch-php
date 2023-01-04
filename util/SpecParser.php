#!/usr/bin/env php
<?php

require_once '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('endpoint.twig');

$counter = 0;


function getApiPath()
{
    $path = __DIR__.'/elasticsearch/rest-api-spec/api';
    if (file_exists($path) !== true) {
        $path = __DIR__.'/elasticsearch/rest-api-spec/src/main/resources/rest-api-spec/api';
    }
    return $path;
}


if ($handle = opendir(getApiPath())) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            generateTemplate($entry, $template);
        }
    }
    closedir($handle);
}

function processURLPaths($data)
{
    $final = [];

    $containsType = false;
    $containsIndex = false;
    foreach ($data['url']['paths'] as $path) {
        $params = [];
        preg_match_all('/{(.*?)}/', $path, $params);
        $params = $params[1];
        $count = count($params);
        $parsedPath = str_replace('}', '', $path);
        $parsedPath = str_replace('{', '$', $parsedPath);

        if (array_search('index', $params) !== false) {
            $containsIndex = true;
        }

        if (array_search('type', $params) !== false) {
            $containsType = true;
        }

        $duplicate = false;
        foreach ($final as $existing) {
            if ($existing['params'] === $params) {
                $duplicate = true;
            }
        }

        if ($duplicate !== true) {
            $final[] = ['path'   => $path, 'parsedPath' => $parsedPath, 'params' => $params, 'count'  => $count];
        }
    }

    /*
    foreach ($final as &$existing) {
        if ($containsIndex === true && array_search('index', $existing['params']) === false && array_search('type', $existing['params']) !== false) {
            $existing['parsedPath'] = '/_all'.$existing['parsedPath'];
        }
    }
    */

    usort($final, fn($a, $b) => $b['count'] <=> $a['count']);

    return $final;
}

function getDefaultPath($path)
{
    if ($path['count'] === 0) {
        return $path['path'];
    } else {
        $final = str_replace('}', '', $path['path']);
        $final = str_replace('{', '$', $final);

        return $final;
    }
}

function forbid($key, $value)
{
    $forbid = ['GET' => ['/_nodes/hotthreads', '/_nodes/{node_id}/hotthreads', '/_nodes/{metric}'], 'HEAD' => [], 'PUT' => ['/{index}/{type}/_mapping'], 'POST' => ['/_all/{type}/_bulk', '/_all/{type}/_mget'], 'DELETE' => ['/{index}/{type}', '/{index}/{type}/_mapping'], 'QS' => ['operation_threading', 'field_data']];

    if (isset($forbid['key']) && $forbid['key'] === $value) {
        return true;
    } else {
        return false;
    }
}

function generateTemplate($path, $template)
{
    $ignoreList = ['index.json', 'bulk.json'];

    if (array_search($path, $ignoreList) !== false) {
        return;
    }

    $path = getApiPath().DIRECTORY_SEPARATOR.$path;
    $json = file_get_contents($path);
    $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    $namespace = array_key_first($data);
    $data = $data[$namespace];
    $namespace = explode('.', $namespace);

    $underscoreNamespace = ['get', 'put', 'post', 'delete', 'exists', 'update', 'create'];

    $exceptions = ['delete_by_query', 'update_by_query'];

    if (strpos($namespace[count($namespace)-1], '_')) {
        $temp = explode('_', $namespace[count($namespace)-1]);

        if (array_search($temp[0], $underscoreNamespace) !== false && array_search($namespace[count($namespace)-1], $exceptions) === false) {
            $namespace[count($namespace)-1] = $temp[1];
            $namespace[] = $temp[0];
        } else {
            $namespace[count($namespace)-1] = str_replace('_', '', $namespace[count($namespace)-1]);
        }
    }

    $data['url']['processed'] = processURLPaths($data);
    $data['url']['default'] = getDefaultPath($data['url']['processed'][(is_countable($data['url']['processed']) ? count($data['url']['processed']) : 0)-1]);
    if ((is_countable($data['methods']) ? count($data['methods']) : 0) > 1) {
        if (in_array("GET", $data['methods'])) {
            $data['methods'] = "GET";
        } else {
            $data['methods'] = $data['methods'][0];
        }
    }
    $renderVars = ['json'      => $json, 'data'      => $data, 'namespace' => $namespace, 'className' => ucfirst($namespace[count($namespace)-1])];

    $ret = $template->render($renderVars);

    $dir = __DIR__.'/output/'.implode('/', array_map('ucfirst', array_splice($namespace, 0, count($namespace)-1)));

    if (!str_ends_with($dir, '/')) {
        $dir .= '/';
    }
    if (!file_exists($dir)) {
        echo 'making dir: '.$dir."\n\n";
        $oldumask = umask(0);
        mkdir($dir, 0777, true);
        umask($oldumask);
    }

    echo $dir."\n\n";
    $path = $dir.$renderVars['className'].'.php';
    echo $path."\n\n";

    file_put_contents($path, $ret);
}
