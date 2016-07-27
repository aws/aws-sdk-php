<?php
namespace Aws\Test\S3;

use Aws\CacheInterface;
use Aws\LruArrayCache;
use Aws\S3\S3MultiRegionClient;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise;
use Psr\Http\Message\RequestInterface;

class S3MultiRegionClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testWillRecoverFromPermanentRedirect()
    {
        $triedDefaultRegion = false;
        $instance = new S3MultiRegionClient([
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
        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 's3.amazonaws.com') {
                    return Promise\promise_for(new Response(301, ['X-Amz-Bucket-Region' => 'us-west-2']));
                }

                return Promise\promise_for(new Response);
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
        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 's3.amazonaws.com') {
                    return Promise\promise_for(new Response(301, ['X-Amz-Bucket-Region' => 'us-west-2']));
                }

                return Promise\promise_for(new Response);
            },
        ]);

        $url = $client->getObjectUrl('foo', 'bar');
        $this->assertSame('https://s3-us-west-2.amazonaws.com/foo/bar', $url);
    }

    public function testCachesBucketLocation()
    {
        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 's3.amazonaws.com') {
                    return Promise\promise_for(new Response(301, [
                        'X-Amz-Bucket-Region' => 'us-west-2',
                    ]));
                }

                return Promise\promise_for(new Response(200, [], 'object!'));
            },
        ]);

        $getObjectCommand = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $this->assertSame('object!', (string) $client->execute($getObjectCommand)['Body']);
        $this->assertSame('us-west-2', $this->readAttribute($client, 'cache')->get('aws:s3:foo:location'));
    }

    public function testReadsBucketLocationFromCache()
    {
        $cache = $this->getMockBuilder(CacheInterface::class)->getMock();
        $cache->expects($this->once())
            ->method('get')
            ->with('aws:s3:foo:location')
            ->willReturn('us-west-2');

        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'bucket_region_cache' => $cache,
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 's3.amazonaws.com') {
                    $this->fail('The us-east-1 endpoint should never have been called.');
                }

                return Promise\promise_for(new Response(200, [], 'object!'));
            },
        ]);

        $getObjectCommand = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $this->assertSame('object!', (string) $client->execute($getObjectCommand)['Body']);
    }

    public function testCorrectsErroneousEntriesInCache()
    {
        $cache = new LruArrayCache;
        $cache->set('aws:s3:foo:location', 'us-east-1');

        $client = new S3MultiRegionClient([
            'region' => 'eu-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'bucket_region_cache' => $cache,
            'http_handler' => function (RequestInterface $request) {
                if ($request->getMethod() === 'HEAD' && $request->getUri()->getPath() === '/foo') {
                    return Promise\promise_for(new Response(301, [
                        'X-Amz-Bucket-Region' => 'us-west-2',
                    ]));
                } elseif ($request->getUri()->getHost() === 's3-us-west-2.amazonaws.com') {
                    return Promise\promise_for(new Response(200, [], 'object!'));
                }

                return Promise\promise_for(new Response(301));
            },
        ]);

        $getObjectCommand = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $this->assertSame('object!', (string) $client->execute($getObjectCommand)['Body']);
        $this->assertSame('us-west-2', $cache->get('aws:s3:foo:location'));
    }
}
