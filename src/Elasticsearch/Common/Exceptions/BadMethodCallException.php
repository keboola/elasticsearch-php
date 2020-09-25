<?php

namespace KBC\Elasticsearch\Common\Exceptions;

/**
 * BadMethodCallException
 *
 * Denote problems with a method call (e.g. incorrect number of arguments)
 *
 * @category KBC\Elasticsearch
 * @package  KBC\Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class BadMethodCallException extends \BadMethodCallException implements ElasticsearchException
{
}
