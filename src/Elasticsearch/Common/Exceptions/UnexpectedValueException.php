<?php

namespace KBC\Elasticsearch\Common\Exceptions;

/**
 * UnexpectedValueException
 *
 * Denote a value that is outside the normally accepted values
 *
 * @category KBC\Elasticsearch
 * @package  KBC\Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class UnexpectedValueException extends \UnexpectedValueException implements ElasticsearchException
{
}
