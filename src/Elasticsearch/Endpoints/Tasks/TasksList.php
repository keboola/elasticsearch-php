<?php

namespace Keboola\Elasticsearch\Endpoints\Tasks;

use Keboola\Elasticsearch\Common\Exceptions;
use Keboola\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class TasksLists
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\Endpoints\Tasks
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class TasksList extends AbstractEndpoint
{

    /**
     * @return string
     * @throws \Keboola\Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI()
    {
        return "/_tasks";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'node_id',
            'actions',
            'detailed',
            'parent_node',
            'parent_task',
            'wait_for_completion',
            'group_by',
            'task_id'
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
