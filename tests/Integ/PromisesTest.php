<?php
namespace Aws\Test\Integ;

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
        $result = $client->listBucketsAsync();
        $this->assertInstanceOf('GuzzleHttp\Promise\PromiseInterface', $result);
        // Block until it's ready
        $this->assertInternalType('string', $result['Owner']['ID']);
    }

    public function testFuturesProvidePromises()
    {
        $client = $this->getSdk()->createClient('s3');
        $resolved = null;
        $result = $client->listBucketsAsync();
        $result
            ->then(function ($result) use (&$resolved) {
                $resolved = $result;
                $this->assertInstanceOf('Aws\Result', $result);
            });
        // Block to trigger the promise resolution.
        $result->wait();
        $this->assertInstanceOf('Aws\FutureResult', $result);
        $this->assertInstanceOf('Aws\Result', $resolved);
        $this->assertInternalType('string', $resolved['Owner']['ID']);
    }
}
