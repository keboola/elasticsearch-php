<?php

namespace Keboola\Elasticsearch\Endpoints\Cat;

use Keboola\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Tasks
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Tasks extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        return "/_cat/tasks";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'format',
            'node_id',
            'actions',
            'detailed',
            'parent_node',
            'parent_task',
            'h',
            'help',
            'v',
            's'
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
