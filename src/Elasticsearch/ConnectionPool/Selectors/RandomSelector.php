<?php

namespace KBC\Elasticsearch\ConnectionPool\Selectors;

use KBC\Elasticsearch\Connections\ConnectionInterface;

/**
 * Class RandomSelector
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Connections\Selectors\RandomSelector
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class RandomSelector implements SelectorInterface
{
    /**
     * Select a random connection from the provided array
     *
     * @param  ConnectionInterface[] $connections an array of ConnectionInterface instances to choose from
     *
     * @return \KBC\Elasticsearch\Connections\ConnectionInterface
     */
    public function select($connections)
    {
        return $connections[array_rand($connections)];
    }
}
