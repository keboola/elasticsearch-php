<?php

namespace KBC\Elasticsearch\Endpoints;

use KBC\Elasticsearch\Common\Exceptions;

/**
 * Class Update
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Update extends AbstractEndpoint
{
    /**
     * @param array $body
     *
     * @return $this
     * @throws \KBC\Elasticsearch\Common\Exceptions\InvalidArgumentException
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
     * @throws \KBC\Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for Update'
            );
        }
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Update'
            );
        }
        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Update'
            );
        }
        $id = $this->id;
        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/$id/_update";

        if (isset($index) === true && isset($type) === true && isset($id) === true) {
            $uri = "/$index/$type/$id/_update";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'consistency',
            'fields',
            'lang',
            'parent',
            'refresh',
            'replication',
            'retry_on_conflict',
            'routing',
            'script',
            'timeout',
            'timestamp',
            'ttl',
            'version',
            'version_type',
            '_source'
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
