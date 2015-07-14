<?php
namespace Aws\Tests\DynamoDbStreams\Integration;

use Aws\DynamoDbStreams\DynamoDbStreamsClient;
use Aws\DynamoDbStreams\Exception\DynamoDbStreamsException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var DynamoDbStreamsClient */
    private $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('DynamoDbStreams');
    }

    public function testListOperation()
    {
        $result = $this->client->listStreams(array('TableName' => 'fake-table'));
        $this->assertTrue($result->hasKey('Streams'));
        $this->assertInternalType('array', $result['Streams']);
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->describeStream(array(
                'StreamArn' => 'fake-stream-arn'
            ));
            $this->fail('An exception should have been thrown.');
        } catch (DynamoDbStreamsException $e) {
            $this->assertEquals('ValidationException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
