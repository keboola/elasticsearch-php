<?php

namespace KBC\Elasticsearch\Tests\Serializers;

use KBC\Elasticsearch\Serializers\ArrayToJSONSerializer;
use PHPUnit\Framework\TestCase;
use Mockery as m;

/**
 * Class ArrayToJSONSerializerTest
 * @package KBC\Elasticsearch\Tests\Serializers
 */
class ArrayToJSONSerializerTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testSerializeArray()
    {
        $serializer = new ArrayToJSONSerializer();
        $body = ['value' => 'field'];

        $ret = $serializer->serialize($body);

        $body = json_encode($body, JSON_PRESERVE_ZERO_FRACTION);
        $this->assertEquals($body, $ret);
    }

    public function testSerializeString()
    {
        $serializer = new ArrayToJSONSerializer();
        $body = 'abc';

        $ret = $serializer->serialize($body);

        $this->assertEquals($body, $ret);
    }

    public function testDeserializeJSON()
    {
        $serializer = new ArrayToJSONSerializer();
        $body = '{"field":"value"}';

        $ret = $serializer->deserialize($body, []);

        $body = json_decode($body, true);
        $this->assertEquals($body, $ret);
    }
}
