<?php

namespace KBC\Elasticsearch\Endpoints;

use KBC\Elasticsearch\Common\Exceptions;

/**
 * Class TermVectors
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class TermVectors extends AbstractEndpoint
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
        if (isset($this->index) !== true) {
           throw new Exceptions\RuntimeException(
               'index is required for TermVectors'
           );
       }
       if (isset($this->type) !== true) {
           throw new Exceptions\RuntimeException(
               'type is required for TermVectors'
           );
       }
       if (isset($this->id) !== true && isset($this->body['doc']) !== true) {
           throw new Exceptions\RuntimeException(
               'id or doc is required for TermVectors'
           );
       }

       $index = $this->index;
       $type  = $this->type;
       $id    = $this->id;
       $uri   = "/$index/$type/_termvectors";

       if ($id !== null) {
           $uri = "/$index/$type/$id/_termvectors";
       }

       return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'term_statistics',
            'field_statistics',
            'fields',
            'offsets',
            'positions',
            'payloads',
            'preference',
            'routing',
            'parent',
            'realtime'
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
