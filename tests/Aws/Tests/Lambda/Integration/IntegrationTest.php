<?php
namespace Aws\Tests\Lambda\Integration;

use Aws\Lambda\LambdaClient;
use Aws\Lambda\Exception\LambdaException;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var LambdaClient */
    private $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('lambda');
    }

    public function testListsKeys()
    {
        $result = $this->client->listFunctions(array('MaxItems' => 1));
        $this->assertArrayHasKey('Functions', $result->toArray());
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->client->deleteFunction(array('FunctionName' => 'foobar'));
            $this->fail('An exception should have been thrown.');
        } catch (LambdaException $e) {
            $this->assertEquals('ResourceNotFoundException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
