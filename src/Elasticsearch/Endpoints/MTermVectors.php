<?php

namespace Keboola\Elasticsearch\Endpoints;

use Keboola\Elasticsearch\Common\Exceptions;

/**
 * Class MTermVectors
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MTermVectors extends AbstractEndpoint
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
        return $this->getOptionalURI('_mtermvectors');
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'ids',
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
