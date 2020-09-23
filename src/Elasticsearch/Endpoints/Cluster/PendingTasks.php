<?php

namespace Keboola\Elasticsearch\Endpoints\Cluster;

use Keboola\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Pendingtasks
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\Endpoints\Cluster
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class PendingTasks extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $uri   = "/_cluster/pending_tasks";

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'local',
            'master_timeout',
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
