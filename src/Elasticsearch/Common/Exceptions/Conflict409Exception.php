<?php

namespace Keboola\Elasticsearch\Common\Exceptions;

/**
 * Conflict409Exception, thrown on 409 conflict http error
 *
 * @category Keboola\Elasticsearch
 * @package  Keboola\Elasticsearch\Common\Exceptions
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Conflict409Exception extends \Exception implements ElasticsearchException
{
}
