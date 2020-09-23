<?php

namespace Keboola\Elasticsearch\Endpoints\Source;

use Keboola\Elasticsearch\Endpoints\AbstractEndpoint;
use Keboola\Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\Endpoints\Source
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    /**
     * @return string
     * @throws \Keboola\Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for Get'
            );
        }
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Get'
            );
        }
        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Get'
            );
        }
        $id = $this->id;
        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/$id/_source";

        if (isset($index) === true && isset($type) === true && isset($id) === true) {
            $uri = "/$index/$type/$id/_source";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'parent',
            'preference',
            'realtime',
            'refresh',
            'routing',
            '_source',
            '_source_exclude',
            '_source_include',
            'version',
            'version_type',
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
