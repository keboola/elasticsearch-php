<?php

namespace KBC\Elasticsearch\Endpoints;

use KBC\Elasticsearch\Common\Exceptions;

/**
 * Class Explain
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Explain extends AbstractEndpoint
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
                'id is required for Explain'
            );
        }
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Explain'
            );
        }
        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Explain'
            );
        }
        $id = $this->id;
        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/$id/_explain";

        if (isset($index) === true && isset($type) === true && isset($id) === true) {
            $uri = "/$index/$type/$id/_explain";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'analyze_wildcard',
            'analyzer',
            'default_operator',
            'df',
            'fields',
            'lenient',
            'lowercase_expanded_terms',
            'parent',
            'preference',
            'q',
            'routing',
            'source',
            '_source',
            '_source_exclude',
            '_source_include',
            'stored_fields'
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
