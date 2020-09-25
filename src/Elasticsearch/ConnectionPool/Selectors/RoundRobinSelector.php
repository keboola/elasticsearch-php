<?php

namespace KBC\Elasticsearch\ConnectionPool\Selectors;

use KBC\Elasticsearch\Connections\ConnectionInterface;

/**
 * Class RoundRobinSelector
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\ConnectionPool\Selectors\ConnectionPool
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class RoundRobinSelector implements SelectorInterface
{
    /**
     * @var int
     */
    private $current = 0;

    /**
     * Select the next connection in the sequence
     *
     * @param  ConnectionInterface[] $connections an array of ConnectionInterface instances to choose from
     *
     * @return \KBC\Elasticsearch\Connections\ConnectionInterface
     */
    public function select($connections)
    {
        $this->current += 1;

        return $connections[$this->current % count($connections)];
    }
}
