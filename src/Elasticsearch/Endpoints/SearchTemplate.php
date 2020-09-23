<?php

namespace Keboola\Elasticsearch\Endpoints;

use Keboola\Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Keboola\Elasticsearch\Common\Exceptions;

/**
 * Class SearchTemplate
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SearchTemplate extends AbstractEndpoint
{
    /**
     * @param array $body
     *
     * @return $this
     * @throws \Keboola\Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $type = $this->type;
        $uri   = "/_search/template";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_search/template";
        } elseif (isset($index) === true) {
            $uri = "/$index/_search/template";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_search/template";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'preference',
            'routing',
            'scroll',
            'search_type'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
}
