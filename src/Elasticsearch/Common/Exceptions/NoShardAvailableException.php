<?php

namespace Keboola\Elasticsearch\Common\Exceptions;

/**
 * NoShardAvailableException
 *
 * @category Keboola\Elasticsearch
 * @package Keboola\Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class NoShardAvailableException extends ServerErrorResponseException implements ElasticsearchException
{
}
