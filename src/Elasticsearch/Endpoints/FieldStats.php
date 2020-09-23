<?php

namespace Keboola\Elasticsearch\Endpoints;

use Keboola\Elasticsearch\Common\Exceptions;

/**
 * Class FieldStats
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class FieldStats extends AbstractEndpoint
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
        $uri   = "/_field_stats";

        if (isset($index) === true) {
            $uri = "/$index/_field_stats";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'fields',
            'level',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'fields'
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
