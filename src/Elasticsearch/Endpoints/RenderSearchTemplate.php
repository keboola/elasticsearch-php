<?php

namespace Keboola\Elasticsearch\Endpoints;

use Keboola\Elasticsearch\Endpoints\AbstractEndpoint;
use Keboola\Elasticsearch\Common\Exceptions;

/**
 * Class Render
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class RenderSearchTemplate extends AbstractEndpoint
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
     * @throws \Keboola\Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI()
    {
        $id = $this->id;

        $uri   = "/_render/template";

        if (isset($id) === true) {
            $uri = "/_render/template/$id";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array();
    }

    /**
     * @return array
     * @throws \Keboola\Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
}
