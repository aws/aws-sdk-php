<?php
namespace Aws\Test\S3;

use Aws\CacheInterface;
use Aws\CommandInterface;
use Aws\Endpoint\Partition;
use Aws\Exception\AwsException;
use Aws\LruArrayCache;
use Aws\ResultInterface;
use Aws\S3\S3ClientInterface;
use Aws\S3\S3MultiRegionClient;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\RejectedPromise;
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

    private function getAuthHeaderMalformedXml()
    {
        return <<<EOXML
<?xml version="1.0" encoding="UTF-8"?>
<Error>
    <Code>AuthorizationHeaderMalformed</Code>
    <Message>The authorization header is malformed; the region 'us-east-1' is wrong; expecting 'us-west-2'</Message>
    <Region>us-west-2</Region>
    <RequestId>656c76696e6727732072657175657374</RequestId>
    <HostId>Uuag1LuByRx9e6j5Onimru9pO4ZVKnJ2Qz7/C1NPcfTWAtRPfTaOFg==</HostId>
</Error>
EOXML;
    }

    private function getAuthHeaderMalformedXmlWithoutRegion()
    {
        return <<<EOXML
<?xml version="1.0" encoding="UTF-8"?>
<Error>
    <Code>AuthorizationHeaderMalformed</Code>
    <Message>The authorization header is malformed;</Message>
    <RequestId>656c76696e6727732072657175657374</RequestId>
    <HostId>Uuag1LuByRx9e6j5Onimru9pO4ZVKnJ2Qz7/C1NPcfTWAtRPfTaOFg==</HostId>
</Error>
EOXML;
    }

    private function getSocketTimeoutResponse()
    {
        return <<<EOXML
<?xml version="1.0" encoding="UTF-8"?>
<Error>
    <Code>RequestTimeout</Code>
    <Message>Your socket connection to the server was not read from or written to within the timeout period. Idle connections will be closed.</Message>
    <RequestId>REQUEST_ID</RequestId>
    <HostId>HOST_ID</HostId>
</Error>
EOXML;
    }

    public function testCreatesPresignedRequestsForCorrectRegion()
    {
        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 'foo.s3.amazonaws.com') {
                    return new RejectedPromise([
                        'exception' => $this->getMockBuilder(RequestException::class)
                            ->disableOriginalConstructor()
                            ->getMock(),
                        'response' => new Response(400, [], $this->getAuthHeaderMalformedXml()),
                    ]);
                }

                return Promise\promise_for(new Response);
            },
        ]);

        $command = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $url = (string)$client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertStringStartsWith('https://foo.s3-us-west-2.amazonaws.com/bar?', $url);
        $this->assertContains('X-Amz-Expires=', $url);
        $this->assertContains('X-Amz-Credential=', $url);
        $this->assertContains('X-Amz-Signature=', $url);
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     * @expectedExceptionMessageRegExp /AWS HTTP error/
     */
    public function testRethrowsOnNoResponseException()
    {
        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 'foo.s3.amazonaws.com') {
                    return new RejectedPromise([
                        'exception' => $this->getMockBuilder(RequestException::class)
                            ->disableOriginalConstructor()
                            ->getMock(),
                    ]);
                }

                return Promise\promise_for(new Response);
            },
        ]);

        $command = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $client->createPresignedRequest($command, 1342138769)->getUri();
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     * @expectedExceptionMessageRegExp /The authorization header is malformed/
     */
    public function testRethrowsOnAuthHeaderMalformedWithoutRegion()
    {
        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 'foo.s3.amazonaws.com') {
                    return new RejectedPromise([
                        'exception' => $this->getMockBuilder(RequestException::class)
                            ->disableOriginalConstructor()
                            ->getMock(),
                        'response' => new Response(400, [], $this->getAuthHeaderMalformedXmlWithoutRegion()),
                    ]);
                }

                return Promise\promise_for(new Response);
            },
        ]);

        $command = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $client->createPresignedRequest($command, 1342138769)->getUri();
    }

    public function testRedirectsOnNonRedirectExceptionWithHeader()
    {
        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 'foo.s3.amazonaws.com') {
                    return new RejectedPromise([
                        'exception' => $this->getMockBuilder(RequestException::class)
                            ->disableOriginalConstructor()
                            ->getMock(),
                        'response' => new Response(
                            400,
                            ['X-Amz-Bucket-Region' => 'us-west-2'],
                            $this->getSocketTimeoutResponse()
                        )
                    ]);
                }

                return Promise\promise_for(new Response);
            }
        ]);

        $command = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $url = (string)$client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertStringStartsWith('https://foo.s3-us-west-2.amazonaws.com/bar?', $url);
        $this->assertContains('X-Amz-Expires=', $url);
        $this->assertContains('X-Amz-Credential=', $url);
        $this->assertContains('X-Amz-Signature=', $url);
    }

    public function testCreatesPresignedRequestsForCorrectRegionWithPathStyle()
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
            'use_path_style_endpoint' => true
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
                if ($request->getUri()->getHost() === 'foo.s3.amazonaws.com') {
                    return new RejectedPromise([
                        'exception' => $this->getMockBuilder(RequestException::class)
                            ->disableOriginalConstructor()
                            ->getMock(),
                        'response' => new Response(400, [], $this->getAuthHeaderMalformedXml()),
                    ]);
                }

                return Promise\promise_for(new Response);
            },
        ]);

        $url = $client->getObjectUrl('foo', 'bar');
        $this->assertSame('https://foo.s3-us-west-2.amazonaws.com/bar', $url);
    }

    public function testCreatesObjectUrlsForCorrectRegionWithPathStyle()
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
            'use_path_style_endpoint' => true
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
                if ($request->getUri()->getHost() === 'foo.s3.amazonaws.com') {
                    return new RejectedPromise([
                        'exception' => $this->getMockBuilder(RequestException::class)
                            ->disableOriginalConstructor()
                            ->getMock(),
                        'response' => new Response(400, [], $this->getAuthHeaderMalformedXml()),
                    ]);
                }

                return Promise\promise_for(new Response(200, [], 'object!'));
            },
        ]);

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
        $this->assertSame('us-west-2', $this->readAttribute($client, 'cache')->get('aws:s3:foo:location'));
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     * @expectedExceptionMessageRegExp /Your socket connection to the server was not read from or written to within the timeout period./
     */
    public function testRethrowsAwsExceptionViaMiddleware()
    {
        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 'foo.s3.amazonaws.com') {
                    return new RejectedPromise([
                        'exception' => $this->getMockBuilder(RequestException::class)
                            ->disableOriginalConstructor()
                            ->getMock(),
                        'response' => new Response(400, [], $this->getSocketTimeoutResponse()),
                    ]);
                }

                return Promise\promise_for(new Response(200, [], 'object!'));
            },
        ]);

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     * @expectedExceptionMessageRegExp /The authorization header is malformed/
     */
    public function testRethrowsOnAuthHeaderMalformedWithoutRegionViaMiddleware()
    {
        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 'foo.s3.amazonaws.com') {
                    return new RejectedPromise([
                        'exception' => $this->getMockBuilder(RequestException::class)
                            ->disableOriginalConstructor()
                            ->getMock(),
                        'response' => new Response(400, [], $this->getAuthHeaderMalformedXmlWithoutRegion()),
                    ]);
                }

                return Promise\promise_for(new Response(200, [], 'object!'));
            },
        ]);

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
    }

    public function testCachesBucketLocationAfterLookupWithPathStyle()
    {
        $redirected = false;
        $client = new S3MultiRegionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'http_handler' => function (RequestInterface $request) use (&$redirected) {
                if ($request->getUri()->getHost() === 's3.amazonaws.com') {
                    if (!$redirected) {
                        $redirected = true;
                        return Promise\promise_for(new Response(301));
                    }
                    return Promise\promise_for(new Response(301, [
                        'X-Amz-Bucket-Region' => 'us-west-2',
                    ]));
                }

                return Promise\promise_for(new Response(200, [], 'object!'));
            },
            'use_path_style_endpoint' => true
        ]);

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
        $this->assertSame('us-west-2', $this->readAttribute($client, 'cache')->get('aws:s3:foo:location'));
    }

    public function testCachesBucketLocationWithPathStyle()
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
            'use_path_style_endpoint' => true
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
                if ($request->getUri()->getHost() === 'foo.s3.amazonaws.com') {
                    $this->fail('The us-east-1 endpoint should never have been called.');
                }

                return Promise\promise_for(new Response(200, [], 'object!'));
            },
        ]);

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
    }

    public function testReadsBucketLocationFromCacheWithPathStyle()
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
            'use_path_style_endpoint' => true
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
                if ($request->getUri()->getHost() === 'foo.s3-us-west-2.amazonaws.com') {
                    return Promise\promise_for(new Response(200, [], 'object!'));
                }

                return new RejectedPromise([
                    'exception' => $this->getMockBuilder(RequestException::class)
                        ->disableOriginalConstructor()
                        ->getMock(),
                    'response' => new Response(400, [], $this->getAuthHeaderMalformedXml()),
                ]);
            },
        ]);

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
        $this->assertSame('us-west-2', $cache->get('aws:s3:foo:location'));
    }

    public function testCorrectsErroneousEntriesInCacheWithPathStyle()
    {
        $cache = new LruArrayCache;
        $cache->set('aws:s3:foo:location', 'us-east-1');

        $client = new S3MultiRegionClient([
            'region' => 'eu-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'bucket_region_cache' => $cache,
            'http_handler' => function (RequestInterface $request) {
                if ($request->getUri()->getHost() === 's3-us-west-2.amazonaws.com') {
                    return Promise\promise_for(new Response(200, [], 'object!'));
                }

                return Promise\promise_for(new Response(301, [
                    'X-Amz-Bucket-Region' => 'us-west-2',
                ]));
            },
            'use_path_style_endpoint' => true
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
                $this->assertSame('foo.s3.foo-region.amazonaws.test', $request->getUri()->getHost());
                return Promise\promise_for(new Response(200, [], 'object!'));
            },
        ]);

        $client->getObject(['Bucket' => 'foo', 'Key' => 'bar']);
    }

    public function testWillDefaultToRegionInPartitionWithPathStyle()
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
            'use_path_style_endpoint' => true
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
