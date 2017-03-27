<?php
namespace Aws\Test\S3;

use Aws\CacheInterface;
use Aws\CommandInterface;
use Aws\Endpoint\Partition;
use Aws\LruArrayCache;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3MultiRegionClient;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7;
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
        $url = (string)$client->createPresignedRequest($command, 1342138769)->getUri();
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

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
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

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
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

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
        $this->assertSame('us-west-2', $cache->get('aws:s3:foo:location'));
    }

    public function testWillDefaultToRegionInPartition()
    {
        $client = new S3MultiRegionClient([
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'partition' => new Partition([
                'defaults' => [
                    'hostname' => '{service}.{region}.{dnsSuffix}',
                    'protocols' => ['https'],
                    'signatureVersions' => ['v4'],
                ],
                'partition' => 'aws_test',
                'dnsSuffix' => 'amazonaws.test',
                'regions' => [
                    'foo-region' => [
                        'description' => 'A description',
                    ],
                ],
                'services' => [
                    'service' => [
                        'endpoints' => [
                            'foo-region' => [],
                        ],
                    ],
                ],
            ]),
            'http_handler' => function (RequestInterface $request) {
                $this->assertSame('https', $request->getUri()->getScheme());
                $this->assertSame('s3.foo-region.amazonaws.test', $request->getUri()->getHost());
                return Promise\promise_for(new Response(200, [], 'object!'));
            },
        ]);

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
    }

    /**
     * @dataProvider booleanProvider
     *
     * @param bool $regionalized
     */
    public function testCallbacksAttachedToCommandHandlerListsAreInvoked($regionalized)
    {
        /** @var S3ClientInterface $client */
        $client = new S3MultiRegionClient([
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                return Promise\promise_for(new Response(200, [], 'object!'));
            },
        ]);

        $command = $client->getCommand('GetObject', [
            'Bucket' => 'bucket',
            'Key' => 'key',
        ] + ($regionalized ? ['@region' => 'us-east-1'] : []));
        $command->getHandlerList()
            ->appendSign(function (callable $handler) {
                return function (CommandInterface $c) use ($handler) {
                    return $handler($c)->then(function (ResultInterface $result) {
                        $result['Body'] = Psr7\stream_for(str_repeat($result['Body'], 2));
                        return $result;
                    });
                };
            }, 'body_doubler');

        $result = $client->execute($command);

        $this->assertSame('object!object!', (string) $result['Body']);
    }

    public function booleanProvider()
    {
        return [[true], [false]];
    }
}
