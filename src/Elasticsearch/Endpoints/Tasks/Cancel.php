<?php

namespace KBC\Elasticsearch\Endpoints\Tasks;

use KBC\Elasticsearch\Common\Exceptions;
use KBC\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Cancel
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Endpoints\Tasks
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Cancel extends AbstractEndpoint
{
    private $taskId;

    /**
     * @param string $taskId
     *
     * @return $this
     * @throws \KBC\Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function setTaskId($taskId)
    {
        if (isset($taskId) !== true) {
            return $this;
        }

        $this->taskId = $taskId;

        return $this;
    }

    /**
     * @return string
     * @throws \KBC\Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI()
    {
        if (isset($this->id) === true) {
            return "/_tasks/{$this->taskId}/_cancel";
        }

        return "/_tasks/_cancel";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'node_id',
            'actions',
            'parent_node',
            'parent_task',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
