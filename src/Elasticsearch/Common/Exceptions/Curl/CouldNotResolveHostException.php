<?php

namespace KBC\Elasticsearch\Common\Exceptions\Curl;

use KBC\Elasticsearch\Common\Exceptions\ElasticsearchException;
use KBC\Elasticsearch\Common\Exceptions\TransportException;

/**
 * Class CouldNotResolveHostException
 *
 * @category KBC\Elasticsearch
 * @package  KBC\Elasticsearch\Common\Exceptions\Curl
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
  */
class CouldNotResolveHostException extends TransportException implements ElasticsearchException
{
}
