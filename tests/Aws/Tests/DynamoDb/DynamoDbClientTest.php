<?php

namespace Aws\Tests\DynamoDb;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Signature\SignatureV4;
use Aws\DynamoDb\Model\Attribute;
use Aws\DynamoDb\Enum\Types;
use Aws\DynamoDb\DynamoDbClient;
use Guzzle\Common\Collection;

class DynamoDbClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\DynamoDb\DynamoDbClient::formatValue
     */
    public function testFormatValueProducesCorrectArrayStructure()
    {
        $client = $this->getServiceBuilder()->get('dynamo_db', true);
        $expected = array(Types::NUMBER => '100');
        $actual = $client->formatValue(100);

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Aws\DynamoDb\DynamoDbClient::formatAttributes
     */
    public function testFormatAttributesProducesCorrectArrayStructure()
    {
        $client = $this->getServiceBuilder()->get('dynamo_db', true);
        $expected = array(
            'number' => array(Types::NUMBER => '100'),
            'string' => array(Types::STRING => 'foo'),
        );

        $actual = $client->formatAttributes(array(
            'number' => 100,
            'string' => 'foo',
        ));

        $this->assertSame($expected, $actual);
    }

    /**
     * This was an issue in earlier DynamoDB clients from several programming
     * languages
     *
     * @covers Aws\DynamoDb\DynamoDbClient::formatAttributes
     */
    public function testFormatAttributesWorksWithTypesAsKeys()
    {
        $client = $this->getServiceBuilder()->get('dynamo_db', true);
        $expected = array(
            'N'  => array('N' => '1'),
            'S'  => array('S' => 'S'),
            'NS' => array('NS' => array('1', '2', '3', '4')),
            'SS' => array('SS' => array('N', 'S', 'NS', 'SS')),
        );

        $actual = $client->formatAttributes(array(
            'N'  => 1,
            'S'  => 'S',
            'NS' => array(1, 2, 3, 4),
            'SS' => array('N', 'S', 'NS', 'SS'),
        ));

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Aws\DynamoDb\DynamoDbClient::__construct
     */
    public function testConstructorInitializesProperties()
    {
        $creds     = new Credentials('foo', 'bar');
        $signature = new SignatureV4();
        $config    = new Collection();
        $client    = new DynamoDbClient($creds, $signature, $config);

        $this->assertSame($creds, $client->getCredentials());
        $this->assertSame($signature, $this->readAttribute($client, 'signature'));
    }

    /**
     * @covers Aws\DynamoDb\DynamoDbClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = DynamoDbClient::factory(array(
            'access_key_id'     => 'foo',
            'secret_access_key' => 'bar'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $this->readAttribute($client, 'signature'));
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('{scheme}://dynamodb.{region}.amazonaws.com', $client->getBaseUrl(false));
        $this->assertEquals('https://dynamodb.us-east-1.amazonaws.com', $client->getBaseUrl());
    }

    /**
     * @covers Aws\DynamoDb\DynamoDbClient::calculateRetryDelay
     */
    public function testHasCustomRetryDelay()
    {
        $client = DynamoDbClient::factory(array(
            'access_key_id'     => 'foo',
            'secret_access_key' => 'bar'
        ));

        $this->assertEquals(0, $client->calculateRetryDelay(1));
        $this->assertEquals(0.05, $client->calculateRetryDelay(2));
        $this->assertEquals(0.1, $client->calculateRetryDelay(3));
        $this->assertEquals(0.2, $client->calculateRetryDelay(4));
        $this->assertEquals(0.4, $client->calculateRetryDelay(5));
        $this->assertEquals(0.8, $client->calculateRetryDelay(6));
    }
}
