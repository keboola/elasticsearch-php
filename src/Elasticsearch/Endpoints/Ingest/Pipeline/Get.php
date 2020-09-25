<?php

namespace KBC\Elasticsearch\Endpoints\Ingest\Pipeline;

use KBC\Elasticsearch\Common\Exceptions;
use KBC\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Endpoints\Ingest
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    /**
     * @return string
     * @throws \KBC\Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI()
    {
        if (isset($this->id) !== true) {
            return '/_ingest/pipeline/*';
        }

        $id = $this->id;

        return "/_ingest/pipeline/$id";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'master_timeout'
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
