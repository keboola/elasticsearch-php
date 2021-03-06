<?php

namespace KBC\Elasticsearch\Endpoints;

use KBC\Elasticsearch\Common\Exceptions;

/**
 * Class Clearscroll
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClearScroll extends AbstractEndpoint
{
    // A comma-separated list of scroll IDs to clear
    private $scrollId;

    /**
     * @param $scroll_id
     *
     * @return $this
     */
    public function setScrollId($scrollId)
    {
        if (isset($scrollId) !== true) {
            return $this;
        }

        $this->scrollId = $scrollId;

        return $this;
    }

    /**
     * @return string
     * @throws \KBC\Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI()
    {
        return "/_search/scroll/";
    }

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
     * @return array
     */
    public function getBody()
    {
        if (isset($this->body)) {
            return $this->body;
        }
        if (is_array($this->scrollId)) {
            return ['scroll_id' => $this->scrollId];
        }
        return ['scroll_id' => [$this->scrollId]];
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'DELETE';
    }
}
