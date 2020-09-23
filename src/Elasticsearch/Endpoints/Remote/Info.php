<?php

namespace Keboola\Elasticsearch\Endpoints\Remote;
use Keboola\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Info
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster\Nodes
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Info extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        return "/_remote/info";
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
        return 'GET';
    }
}
