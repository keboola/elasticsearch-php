<?php

namespace KBC\Elasticsearch\Endpoints\Cat;

use KBC\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class NodeAttrs
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class NodeAttrs extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $uri   = "/_cat/nodeattrs";

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
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
