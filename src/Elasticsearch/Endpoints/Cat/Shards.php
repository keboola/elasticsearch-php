<?php

namespace Keboola\Elasticsearch\Endpoints\Cat;

use Keboola\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Shards
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Shards extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $uri   = "/_cat/shards";

        if (isset($index) === true) {
            $uri = "/_cat/shards/$index";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'bytes',
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
            's',
            'format',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}
