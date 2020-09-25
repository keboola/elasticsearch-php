<?php

namespace KBC\Elasticsearch\Common\Exceptions;

/**
 * Class ClientErrorResponseException
 *
 * @category KBC\Elasticsearch
 * @package  KBC\Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClientErrorResponseException extends TransportException implements ElasticsearchException
{
}
