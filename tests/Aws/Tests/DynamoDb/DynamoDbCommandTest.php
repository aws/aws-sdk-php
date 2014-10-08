<?php
namespace Aws\Tests\DynamoDb;

use Aws\DynamoDb\DynamoDbCommand;

class DynamoDbCommandTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCanMarshalNestedAttributes()
    {
        $decoded = array('B' => array('B' => array('B' => 'foo')));
        $encoded = array('B' => array('B' => array('B' => 'Zm9v')));
        $this->assertEquals($encoded, DynamoDbCommand::marshalAttributes($decoded));

        $decoded = array('BS' => array('BS' => array('BS' => array('foo', 'bar'))));
        $encoded = array('BS' => array('BS' => array('BS' => array('Zm9v', 'YmFy'))));
        $this->assertEquals($encoded, DynamoDbCommand::marshalAttributes($decoded));

        $decoded = array('N' => array('N' => 5));
        $encoded = array('N' => array('N' => '5'));
        $this->assertSame($encoded, DynamoDbCommand::marshalAttributes($decoded));

        $decoded = array('NS' => array('NS' => array(5, 10)));
        $encoded = array('NS' => array('NS' => array('5', '10')));
        $this->assertSame($encoded, DynamoDbCommand::marshalAttributes($decoded));
    }

    public function testCanDecodeNestedBinaryAttributes()
    {
        $decoded = array('B' => array('B' => array('B' => 'foo')));
        $encoded = array('B' => array('B' => array('B' => 'Zm9v')));
        $this->assertEquals($decoded, DynamoDbCommand::unmarshalAttributes($encoded));

        $decoded = array('BS' => array('BS' => array('BS' => array('foo', 'bar'))));
        $encoded = array('BS' => array('BS' => array('BS' => array('Zm9v', 'YmFy'))));
        $this->assertEquals($decoded, DynamoDbCommand::unmarshalAttributes($encoded));
    }
}
