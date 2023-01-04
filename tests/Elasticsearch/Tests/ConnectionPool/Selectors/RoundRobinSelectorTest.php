<?php

namespace KBC\Elasticsearch\Tests\ConnectionPool\Selectors;

use KBC\Elasticsearch;

/**
 * Class SnifferTest
 *
 * @category   Tests
 * @package    KBC\Elasticsearch
 * @subpackage Tests\ConnectionPool\RoundRobinSelectorTest
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class RoundRobinSelectorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Add Ten connections, select 15 to verify round robin
     *
     * @covers \RoundRobinSelector()::select
     *
     * @return void
     */
    public function testTenConnections()
    {
        $roundRobin = new Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector();

        $mockConnections = [];
        foreach (range(0, 10) as $index) {
            $mockConnections[$index] = $this->createMock('\Elasticsearch\Connections\CurlMultiConnection');
        }

        foreach (range(0, 15) as $index) {
            $retConnection = $roundRobin->select($mockConnections);

            $nextIndex = ($index % 10) + 1;
            static::assertEquals($mockConnections[$nextIndex], $retConnection);
        }
    }

    /**
     * Add Ten connections, select five, remove thre, test another 10 to check
     * that the round-robining works after removing connections
     *
     * @covers \KBC\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector()::select
     *
     * @return void
     */
    public function testAddTenConnectionsestFiveTRemoveThree()
    {
        $roundRobin = new Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector();

        $mockConnections = [];
        foreach (range(0, 10) as $index) {
            $mockConnections[$index] = $this->createMock('\Elasticsearch\Connections\CurlMultiConnection');
        }

        foreach (range(0, 4) as $index) {
            $retConnection = $roundRobin->select($mockConnections);

            $nextIndex = ($index % (count($mockConnections)-1)) + 1;
            static::assertEquals($mockConnections[$nextIndex], $retConnection);
        }

        unset($mockConnections[8]);
        unset($mockConnections[9]);
        unset($mockConnections[10]);

        foreach (range(5, 15) as $index) {
            $retConnection = $roundRobin->select($mockConnections);

            $nextIndex = ($index % (count($mockConnections)-1)) + 1;
            static::assertEquals($mockConnections[$nextIndex], $retConnection);
        }
    }
}
