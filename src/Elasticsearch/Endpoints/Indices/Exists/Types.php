<?php

namespace KBC\Elasticsearch\Endpoints\Indices\Exists;

use KBC\Elasticsearch\Endpoints\AbstractEndpoint;
use KBC\Elasticsearch\Common\Exceptions;

/**
 * Class Types
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Endpoints\Indices\Exists
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Types extends AbstractEndpoint
{
    /**
     * @throws \KBC\Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Types Exists'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Types Exists'
            );
        }

        $index = $this->index;
        $type  = $this->type;
        $uri   = "/$index/$type";

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
            'expand_wildcards'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'HEAD';
    }
}
