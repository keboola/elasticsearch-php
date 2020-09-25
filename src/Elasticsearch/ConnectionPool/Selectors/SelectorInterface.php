<?php

namespace KBC\Elasticsearch\ConnectionPool\Selectors;

/**
 * Class RandomSelector
 *
 * @category KBC\Elasticsearch
 * @package KBC\Elasticsearch\Connections\Selectors
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
interface SelectorInterface
{
    /**
     * Perform logic to select a single ConnectionInterface instance from the array provided
     *
     * @param  ConnectionInterface[] $connections an array of ConnectionInterface instances to choose from
     *
     * @return \KBC\Elasticsearch\Connections\ConnectionInterface
     */
    public function select($connections);
}
