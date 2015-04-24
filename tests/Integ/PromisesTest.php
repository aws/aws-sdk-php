<?php
namespace Aws\Test\Integ;

use GuzzleHttp\Promise\PromiseInterface;

class PromisesTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public function testSendsSynchronously()
    {
        $client = $this->getSdk()->createClient('s3');
        $result = $client->listBuckets();
        $this->assertInstanceOf('Aws\Result', $result);
        $this->assertInternalType('string', $result['Owner']['ID']);
    }

    public function testProvidesPromises()
    {
        $client = $this->getSdk()->createClient('s3');
        $promise = $client->listBucketsAsync();
        $this->assertInstanceOf(PromiseInterface::class, $promise);
        // Block until it's ready
        $result = $promise->wait();
        $this->assertInternalType('string', $result['Owner']['ID']);
    }
}
