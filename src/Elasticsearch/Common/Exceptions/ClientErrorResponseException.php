<?php

namespace Keboola\Elasticsearch\Common\Exceptions;

/**
 * Class ClientErrorResponseException
 *
 * @category Keboola\Elasticsearch
 * @package  Keboola\Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClientErrorResponseException extends TransportException implements ElasticsearchException
{
}
