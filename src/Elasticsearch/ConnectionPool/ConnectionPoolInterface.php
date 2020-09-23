<?php

namespace Keboola\Elasticsearch\ConnectionPool;

use Keboola\Elasticsearch\Connections\ConnectionInterface;

/**
 * ConnectionPoolInterface
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\ConnectionPool
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
interface ConnectionPoolInterface
{
    /**
     * @param bool $force
     *
     * @return ConnectionInterface
     */
    public function nextConnection($force = false);

    /**
     * @return void
     */
    public function scheduleCheck();
}
