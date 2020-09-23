<?php

namespace Keboola\Elasticsearch\Endpoints\Snapshot;

use Keboola\Elasticsearch\Endpoints\AbstractEndpoint;
use Keboola\Elasticsearch\Common\Exceptions;

/**
 * Class Restore
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\Endpoints\Snapshot
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Restore extends AbstractEndpoint
{
    // A repository name
    private $repository;

    // A snapshot name
    private $snapshot;

    /**
     * @param array $body
     *
     * @return $this
     * @throws \Keboola\Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @param $repository
     *
     * @return $this
     */
    public function setRepository($repository)
    {
        if (isset($repository) !== true) {
            return $this;
        }

        $this->repository = $repository;

        return $this;
    }

    /**
     * @param $snapshot
     *
     * @return $this
     */
    public function setSnapshot($snapshot)
    {
        if (isset($snapshot) !== true) {
            return $this;
        }

        $this->snapshot = $snapshot;

        return $this;
    }

    /**
     * @return string
     * @throws \Keboola\Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI()
    {
        if (isset($this->repository) !== true) {
            throw new Exceptions\RuntimeException(
                'repository is required for Restore'
            );
        }
        if (isset($this->snapshot) !== true) {
            throw new Exceptions\RuntimeException(
                'snapshot is required for Restore'
            );
        }
        $repository = $this->repository;
        $snapshot = $this->snapshot;
        $uri   = "/_snapshot/$repository/$snapshot/_restore";

        if (isset($repository) === true && isset($snapshot) === true) {
            $uri = "/_snapshot/$repository/$snapshot/_restore";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'master_timeout',
            'wait_for_completion',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
