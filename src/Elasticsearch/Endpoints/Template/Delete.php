<?php

namespace KBC\Elasticsearch\Endpoints\Template;

use KBC\Elasticsearch\Endpoints\AbstractEndpoint;
use KBC\Elasticsearch\Common\Exceptions;

/**
 * Class Delete
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Endpoints\Template
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Delete extends AbstractEndpoint
{
    /**
     * @return string
     * @throws \KBC\Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for Delete'
            );
        }
        $templateId   = $this->id;
        $uri  = "/_search/template/$templateId";

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
     * @return string
     */
    public function getMethod()
    {
        return 'DELETE';
    }
}
