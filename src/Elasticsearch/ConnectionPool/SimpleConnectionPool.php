<?php

namespace KBC\Elasticsearch\ConnectionPool;

use KBC\Elasticsearch\ConnectionPool\Selectors\SelectorInterface;
use KBC\Elasticsearch\Connections\Connection;
use KBC\Elasticsearch\Connections\ConnectionFactoryInterface;

class SimpleConnectionPool extends AbstractConnectionPool implements ConnectionPoolInterface
{

    /**
     * {@inheritdoc}
     */
    public function __construct($connections, SelectorInterface $selector, ConnectionFactoryInterface $factory, $connectionPoolParams)
    {
        parent::__construct($connections, $selector, $factory, $connectionPoolParams);
    }

    /**
     * @param bool $force
     *
     * @return Connection
     * @throws \KBC\Elasticsearch\Common\Exceptions\NoNodesAvailableException
     */
    public function nextConnection($force = false)
    {
        return $this->selector->select($this->connections);
    }

    public function scheduleCheck()
    {
    }
}
