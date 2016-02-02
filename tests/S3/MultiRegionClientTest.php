<?php
namespace Aws\Test\S3;

use Aws\S3\MultiRegionClient;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise;
use Psr\Http\Message\RequestInterface;

class MultiRegionClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testWillRecoverFromPermanentRedirect()
    {
        $triedDefaultRegion = false;
        $instance = new MultiRegionClient([
            'version' => 'latest',
            'region' => 'eu-east-1',
            'http_handler' => function (RequestInterface $request) use (&$triedDefaultRegion) {
                if (strpos($request->getUri()->getHost(), 'eu-east-1')) {
                    $triedDefaultRegion = true;
                    return new Response(301, ['X-Amz-Bucket-Region' => 'us-west-2']);
                } elseif (strpos($request->getUri()->getHost(), 'us-west-2')) {
                    return new Response(200, [], 'Success!');
                }

                $this->fail('Failed to determine the correct region.');
            },
        ]);

        $object = $instance->getObject(['Bucket' => 'bucket', 'Key' => 'key']);
        $this->assertSame('Success!', (string) $object['Body']);
        $this->assertTrue($triedDefaultRegion);
    }

    public function testCreatesPresignedRequestsForCorrectRegion()
    {
        $client = new MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 's3.amazonaws.com') {
                    return Promise\promise_for(new Response(301, ['X-Amz-Bucket-Region' => 'us-west-2']));
                }

                return Promise\promise_for(new Response);
            },
            'clientFactory' => function (array $args) {
                return $this->getTestClient('S3', $args);
            },
        ]);

        $command = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $url = (string) $client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertStringStartsWith('https://s3-us-west-2.amazonaws.com/foo/bar?', $url);
        $this->assertContains('X-Amz-Expires=', $url);
        $this->assertContains('X-Amz-Credential=', $url);
        $this->assertContains('X-Amz-Signature=', $url);
    }

    public function testCreatesObjectUrlsForCorrectRegion()
    {
        $client = new MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 's3.amazonaws.com') {
                    return Promise\promise_for(new Response(301, ['X-Amz-Bucket-Region' => 'us-west-2']));
                }

                return Promise\promise_for(new Response);
            },
            'clientFactory' => function (array $args) {
                return $this->getTestClient('S3', $args);
            },
        ]);

        $url = $client->getObjectUrl('foo', 'bar');
        $this->assertSame('https://s3-us-west-2.amazonaws.com/foo/bar', $url);
    }
}
