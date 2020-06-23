<?php
namespace Aws\Test\S3;

use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\LruArrayCache;
use Aws\Endpoint\PartitionEndpointProvider;
use Aws\Middleware;
use Aws\Result;
use Aws\S3\Exception\S3Exception;
use Aws\S3\RegionalEndpoint\Configuration;
use Aws\S3\S3Client;
use Aws\S3\UseArnRegion\Configuration as UseArnRegionConfiguration;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\S3Client
 * @covers Aws\S3\S3ClientTrait
 */
class S3ClientTest extends TestCase
{
    use UsesServiceTrait;

    public function testCanUseBucketEndpoint()
    {
        $c = new S3Client([
            'region'          => 'us-standard',
            'version'         => 'latest',
            'endpoint'        => 'http://test.domain.com',
            'bucket_endpoint' => true
        ]);
        $this->assertEquals(
            'http://test.domain.com/key',
            $c->getObjectUrl('test', 'key')
        );
    }

    public function bucketNameProvider()
    {
        return [
            ['.bucket', false],
            ['bucket.', false],
            ['192.168.1.1', false],
            ['1.1.1.100', false],
            ['test@42!@$5_', false],
            ['ab', false],
            ['12', false],
            ['bucket_name', false],
            ['bucket-name', true],
            ['bucket', true],
            ['my.bucket.com', true],
            ['test-fooCaps', false],
            ['w-w', true],
            ['w------', false]
        ];
    }

    /**
     * @dataProvider bucketNameProvider
     */
    public function testValidatesDnsBucketNames($bucket, $valid)
    {
        $this->assertEquals($valid, S3Client::isBucketDnsCompatible($bucket));
    }

    public function testCreatesPresignedRequests()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => ['key' => 'foo', 'secret' => 'bar']
        ]);
        $command = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $url = (string) $client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertStringStartsWith('https://foo.s3.amazonaws.com/bar?', $url);
        $this->assertContains('X-Amz-Expires=', $url);
        $this->assertContains('X-Amz-Credential=', $url);
        $this->assertContains('X-Amz-Signature=', $url);
    }

    public function testCreatesPresignedRequestsWithAccessPointArn()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => ['key' => 'foo', 'secret' => 'bar']
        ]);
        $command = $client->getCommand(
            'GetObject',
            [
                'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                'Key' => 'bar'
            ]
        );
        $url = (string) $client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertStringStartsWith('https://myendpoint-123456789012.s3-accesspoint.us-east-1.amazonaws.com/bar?', $url);
        $this->assertContains('X-Amz-Expires=', $url);
        $this->assertContains('X-Amz-Credential=', $url);
        $this->assertContains('X-Amz-Signature=', $url);
    }

    public function testCreatesPresignedRequestsWithStartTime()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => ['key' => 'foo', 'secret' => 'bar']
        ]);
        $command = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $url = (string) $client->createPresignedRequest(
            $command,
            '+20 minutes',
            ['start_time' => 1562349366]
        )->getUri();
        $this->assertStringStartsWith('https://foo.s3.amazonaws.com/bar?', $url);
        $this->assertContains('X-Amz-Expires=1200', $url);
        $this->assertContains('X-Amz-Credential=', $url);
        $this->assertContains('X-Amz-Signature=61a9940ecdd901be8e36833f6d47123c0c719fc6aa82042144a6c5cf44a25988', $url);
    }

    public function testCreatesPresignedRequestsWithPathStyleFallback()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => ['key' => 'foo.baz', 'secret' => 'bar']
        ]);
        $command = $client->getCommand('GetObject', ['Bucket' => 'foo.baz', 'Key' => 'bar']);
        $url = (string) $client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertStringStartsWith('https://s3.amazonaws.com/foo.baz/bar?', $url);
        $this->assertContains('X-Amz-Expires=', $url);
        $this->assertContains('X-Amz-Credential=', $url);
        $this->assertContains('X-Amz-Signature=', $url);
    }

    public function testCreatesPresignedRequestsWithPathStyle()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'use_path_style_endpoint' => true
        ]);
        $command = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $url = (string) $client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertStringStartsWith('https://s3.amazonaws.com/foo/bar?', $url);
        $this->assertContains('X-Amz-Expires=', $url);
        $this->assertContains('X-Amz-Credential=', $url);
        $this->assertContains('X-Amz-Signature=', $url);
    }

    public function testCreatingPresignedUrlDoesNotPermanentlyRemoveSigner()
    {
        $sent = false;
        $client = new S3Client([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'foo', 'secret'  => 'bar'],
            'http_handler' => function (RequestInterface $request) use (&$sent) {
                $sent = true;
                foreach (['X-Amz-Date', 'Authorization'] as $signatureHeader) {
                    $this->assertTrue($request->hasHeader($signatureHeader));
                }
                return Promise\promise_for(new Response);
            },
        ]);
        $command = $client->getCommand('GetObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $client->createPresignedRequest($command, 1342138769)->getUri();
        $client->execute($command);
        $this->assertTrue($sent);
    }

    public function testCreatesPresignedUrlsWithSpecialCharactersWithPathStyleFallback()
    {
        $client = new S3Client([
            'region'      => 'us-east-1',
            'version'     => 'latest',
            'credentials' => ['key' => 'foo', 'secret'  => 'bar']
        ]);
        $command = $client->getCommand('GetObject', [
            'Bucket' => 'foobar.test.abc',
            'Key'    => '+%.a'
        ]);
        $url = $client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertEquals('/foobar.test.abc/%2B%25.a', $url->getPath());
        $query = Psr7\parse_query($url->getQuery());
        $this->assertArrayHasKey('X-Amz-Credential', $query);
        $this->assertArrayHasKey('X-Amz-Signature', $query);
    }

    public function testCreatesPresignedUrlsWithSpecialCharactersWithPathStyle()
    {
        $client = new S3Client([
            'region'      => 'us-east-1',
            'version'     => 'latest',
            'credentials' => ['key' => 'foo', 'secret'  => 'bar'],
            'use_path_style_endpoint' => true,
        ]);
        $command = $client->getCommand('GetObject', [
            'Bucket' => 'foobar.test.abc',
            'Key'    => '+%.a'
        ]);
        $url = $client->createPresignedRequest($command, 1342138769)->getUri();
        $this->assertEquals('/foobar.test.abc/%2B%25.a', $url->getPath());
        $query = Psr7\parse_query($url->getQuery());
        $this->assertArrayHasKey('X-Amz-Credential', $query);
        $this->assertArrayHasKey('X-Amz-Signature', $query);
    }

    public function testRegistersStreamWrapper()
    {
        $s3 = $this->getTestClient('S3', ['region' => 'us-east-1']);
        $s3->registerStreamWrapper();
        $this->assertContains('s3', stream_get_wrappers());
        stream_wrapper_unregister('s3');
    }

    public function doesExistProvider()
    {
        return [
            ['foo', null, true, []],
            ['foo', 'bar', true, []],
            ['foo', null, true, $this->getS3ErrorMock('AccessDenied', 403)],
            ['foo', 'bar', true, $this->getS3ErrorMock('AccessDenied', 403)],
            ['foo', null, false, $this->getS3ErrorMock('Foo', 401)],
            ['foo', 'bar', false, $this->getS3ErrorMock('Foo', 401)],
            ['foo', null, -1, $this->getS3ErrorMock('Foo', 500)],
            ['foo', 'bar', -1, $this->getS3ErrorMock('Foo', 500)],
        ];
    }

    private function getS3ErrorMock($errCode, $statusCode)
    {
        $context = [
            'code' => $errCode,
            'response' => new Response($statusCode),
        ];
        return new S3Exception('', new Command('mockCommand'), $context);
    }

    /**
     * @dataProvider doesExistProvider
     */
    public function testsIfExists($bucket, $key, $exists, $result)
    {
        /** @var S3Client $s3 */
        $s3 = $this->getTestClient('S3', ['region' => 'us-east-1']);
        $this->addMockResults($s3, [$result]);
        try {
            if ($key) {
                $this->assertSame($exists, $s3->doesObjectExist($bucket, $key));
            } else {
                $this->assertSame($exists, $s3->doesBucketExist($bucket));
            }
        } catch (\Exception $e) {
            $this->assertEquals(-1, $exists);
        }
    }

    public function testReturnsObjectUrl()
    {
        $s3 = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => false
        ]);
        $this->assertEquals('https://foo.s3.amazonaws.com/bar', $s3->getObjectUrl('foo', 'bar'));
    }

    public function testReturnsObjectUrlWithPathStyleFallback()
    {
        $s3 = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => false,
        ]);
        $this->assertEquals('https://s3.amazonaws.com/foo.baz/bar', $s3->getObjectUrl('foo.baz', 'bar'));
    }

    public function testReturnsObjectUrlWithPathStyle()
    {
        $s3 = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => false,
            'use_path_style_endpoint' => true
        ]);
        $this->assertEquals('https://s3.amazonaws.com/foo/bar', $s3->getObjectUrl('foo', 'bar'));
    }

    public function testReturnsObjectUrlViaPath()
    {
        /** @var S3Client $s3 */
        $s3 = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => false
        ]);
        $this->assertEquals(
            'https://foo.s3.amazonaws.com/bar',
            $s3->getObjectUrl('foo', 'bar')
        );
    }

    public function testReturnsObjectUrlViaPathWithPathStyleFallback()
    {
        /** @var S3Client $s3 */
        $s3 = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => false
        ]);
        $this->assertEquals(
            'https://s3.amazonaws.com/foo.baz/bar',
            $s3->getObjectUrl('foo.baz', 'bar')
        );
    }

    public function testReturnsObjectUrlViaPathWithPathStyle()
    {
        /** @var S3Client $s3 */
        $s3 = $this->getTestClient('S3', [
            'region'      => 'us-east-1',
            'credentials' => false,
            'use_path_style_endpoint' => true
        ]);
        $this->assertEquals(
            'https://s3.amazonaws.com/foo.baz/bar',
            $s3->getObjectUrl('foo.baz', 'bar')
        );
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testEnsuresPrefixOrRegexSuppliedForDeleteMatchingObjects()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3');
        $client->deleteMatchingObjects('foo');
    }

    public function testDeletesMatchingObjectsByPrefixAndRegex()
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3');
        $client->getHandlerList()->setHandler(function ($c, $r) {
            $this->assertEquals('bucket', $c['Bucket']);
            return Promise\promise_for(new Result([
                'IsTruncated' => false,
                'Marker' => '',
                'Contents' => [
                    ['Key' => 'foo/bar'],
                    ['Key' => 'foo/bar/baz'],
                    ['Key' => 'foo/test'],
                    ['Key' => 'foo/bar/bam'],
                    ['Key' => 'foo/bar/001'],
                    ['Key' => 'foo/other']
                ]
            ]));
        });

        $agg = [];
        $client->deleteMatchingObjects('bucket', 'foo/bar/', '/^foo\/bar\/[a-z]+$/', [
            'before' => function ($cmd) use (&$agg) {
                foreach ($cmd['Delete']['Objects'] as $k) {
                    $agg[] = $k['Key'];
                }
            }
        ]);

        $this->assertEquals(['foo/bar/baz', 'foo/bar/bam'], $agg);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Mock queue is empty. Trying to send a PutObject
     */
    public function testProxiesToTransferObjectPut()
    {
        $client = $this->getTestClient('S3');
        $client->uploadDirectory(__DIR__, 'test');
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Mock queue is empty. Trying to send a ListObjects
     */
    public function testProxiesToTransferObjectGet()
    {
        $client = $this->getTestClient('S3');
        $client->downloadBucket(__DIR__, 'test');
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Mock queue is empty. Trying to send a PutObject
     */
    public function testProxiesToObjectUpload()
    {
        $client = $this->getTestClient('S3');
        $client->upload('bucket', 'key', 'body');
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Mock queue is empty. Trying to send a HeadObject
     */
    public function testProxiesToObjectCopy()
    {
        $client = $this->getTestClient('S3');
        $client->copy('from-bucket', 'fromKey', 'to-bucket', 'toKey');
    }

    /**
     * @dataProvider getTestCasesForLocationConstraints
     */
    public function testAddsLocationConstraintAutomatically($region, $target, $command, $contains)
    {
        $client = $this->getTestClient('S3', ['region' => $region]);
        $params = ['Bucket' => 'foo'];
        if ($region !== $target) {
            $params['CreateBucketConfiguration'] = ['LocationConstraint' => $target];
        }
        $command = $client->getCommand($command, $params);

        $text = "<LocationConstraint>{$target}</LocationConstraint>";
        $body = (string) \Aws\serialize($command)->getBody();
        if ($contains) {
            $this->assertContains($text, $body);
        } else {
            $this->assertNotContains($text, $body);
        }
    }

    public function getTestCasesForLocationConstraints()
    {
        return [
            ['us-west-2', 'us-west-2', 'CreateBucket', true],
            ['us-east-1', 'us-east-1', 'CreateBucket', false],
            ['us-west-2', 'us-west-2', 'HeadBucket',   false],
            ['us-west-2', 'eu-west-1', 'CreateBucket', true],
            ['us-west-2', 'us-east-1', 'CreateBucket', false],
        ];
    }

    public function testSaveAsParamAddsSink()
    {
        $client = $this->getTestClient('S3', [
            'http_handler' => function ($request, array $options) {
                $this->assertArrayHasKey('sink', $options);
                return Promise\promise_for(
                    new Psr7\Response(200, [], 'sink=' . $options['sink'])
                );
            }
        ]);

        $result = $client->getObject([
            'Bucket' => 'foo',
            'Key'    => 'bar',
            'SaveAs' => 'baz',
        ]);

        $this->assertEquals('sink=baz', (string) $result['Body']);
    }

    public function testRequestSucceedsWithColon()
    {
        $key = 'aaa:bbb';
        $s3 = $this->getTestClient('S3', [
            'http_handler' => function (RequestInterface $request) use ($key) {
                $this->assertContains(
                    urlencode($key),
                    (string) $request->getUri()
                );

                return Promise\promise_for(new Psr7\Response);
            }
        ]);

        $s3->getObject([
            'Bucket' => 'bucket',
            'Key'    => $key,
        ]);
    }

    /**
     * @dataProvider clientRetrySettingsProvider
     *
     * @param array $retrySettings
     */
    public function testRetriesConnectionErrors($retrySettings)
    {
        $retries = $retrySettings['max_attempts'] - 1;
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retrySettings,
            'http_handler' => function () use (&$retries) {
                if (0 === --$retries) {
                    return new FulfilledPromise(new Response);
                }

                return new RejectedPromise([
                    'connection_error' => true,
                    'exception' => $this->getMockBuilder(ConnectException::class)
                        ->disableOriginalConstructor()
                        ->getMock(),
                    'response' => null,
                ]);
            },
        ]);

        $client->headBucket([
            'Bucket' => 'bucket',
        ]);

        $this->assertEquals(0, $retries);
    }

    public function clientRetrySettingsProvider()
    {
        return [
            [
                [
                    'mode' => 'legacy',
                    'max_attempts' => 11,
                ],
            ],
            [
                [
                    'mode' => 'standard',
                    'max_attempts' => 11,
                ],
            ],
            [
                [
                    'mode' => 'adaptive',
                    'max_attempts' => 11,
                ],
            ],
        ];
    }

    /**
     * @dataProvider successErrorResponseProvider
     *
     * @param Response $failingSuccess
     * @param string   $operation
     * @param array    $payload
     * @param array    $retryOptions
     */
    public function testRetries200Errors(
        Response $failingSuccess,
        $operation,
        array $payload,
        $retryOptions
    ) {
        $retries = $retryOptions['max_attempts'];
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retryOptions,
            'http_handler' => function () use (&$retries, $failingSuccess) {
                if (0 === --$retries) {
                    return new FulfilledPromise(new Response(
                        200,
                        [],
                        $this->getWellFormedXml()
                    ));
                }

                return new FulfilledPromise($failingSuccess);
            },
        ]);

        $client->{$operation}($payload);

        $this->assertEquals(0, $retries);
    }

    public function successErrorResponseProvider()
    {
        return [
            [
                new Response(200, [], $this->getErrorXml()),
                'copyObject',
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'CopySource' => 'baz',
                ],
                [
                    'mode' => 'legacy',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getErrorXml()),
                'copyObject',
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'CopySource' => 'baz',
                ],
                [
                    'mode' => 'standard',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getErrorXml()),
                'copyObject',
                [
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'CopySource' => 'baz',
                ],
                [
                    'mode' => 'adaptive',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getErrorXml()),
                'uploadPartCopy',
                [
                    'PartNumber' => 1,
                    'UploadId' => PHP_INT_SIZE,
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'CopySource' => 'baz',
                ],
                [
                    'mode' => 'legacy',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getErrorXml()),
                'uploadPartCopy',
                [
                    'PartNumber' => 1,
                    'UploadId' => PHP_INT_SIZE,
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'CopySource' => 'baz',
                ],
                [
                    'mode' => 'standard',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getErrorXml()),
                'uploadPartCopy',
                [
                    'PartNumber' => 1,
                    'UploadId' => PHP_INT_SIZE,
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                    'CopySource' => 'baz',
                ],
                [
                    'mode' => 'adaptive',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getErrorXml()),
                'completeMultipartUpload',
                [
                    'UploadId' => PHP_INT_SIZE,
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                ],
                [
                    'mode' => 'legacy',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getErrorXml()),
                'completeMultipartUpload',
                [
                    'UploadId' => PHP_INT_SIZE,
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                ],
                [
                    'mode' => 'standard',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getErrorXml()),
                'completeMultipartUpload',
                [
                    'UploadId' => PHP_INT_SIZE,
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                ],
                [
                    'mode' => 'adaptive',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getMalformedXml()),
                'listObjects',
                [
                    'Bucket' => 'foo',
                ],
                [
                    'mode' => 'legacy',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getMalformedXml()),
                'listObjects',
                [
                    'Bucket' => 'foo',
                ],
                [
                    'mode' => 'standard',
                    'max_attempts' => 11
                ],
            ],
            [
                new Response(200, [], $this->getMalformedXml()),
                'listObjects',
                [
                    'Bucket' => 'foo',
                ],
                [
                    'mode' => 'adaptive',
                    'max_attempts' => 11
                ],
            ],
        ];
    }

    private function getErrorXml()
    {
        return <<<EOXML
<?xml version="1.0" encoding="UTF-8"?>
<Error>
  <Code>InternalError</Code>
  <Message>We encountered an internal error. Please try again.</Message>
  <RequestId>656c76696e6727732072657175657374</RequestId>
  <HostId>Uuag1LuByRx9e6j5Onimru9pO4ZVKnJ2Qz7/C1NPcfTWAtRPfTaOFg==</HostId>
</Error>
EOXML;
    }

    private function getMalformedXml()
    {
        return <<<EOXML
<?xml version="1.0" encoding="UTF-8"?>
<ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Name>jmtestbucket2</Name>
    <Prefix></Prefix>
    <Marker></Marker>
    <MaxKeys>1000</MaxKeys>
    <Delimiter>/</Delimiter>
    <IsTruncated>false</IsTruncated>
    <Contents>
        <Key>&lt;</Key>
        <LastModified>2015-09-03T23:51:29.000Z</LastModified>
        <ETag>&quot;af1ed9909386b6116bda14403ff5f72e&quot;</ETag>
        <Size>10</Size>
EOXML;
    }

    private function getWellFormedXml()
    {
        return '<?xml version="1.0" encoding="UTF-8"?><node></node>';
    }

    /**
     * @dataProvider clientRetrySettingsProvider
     *
     * @param array $retrySettings
     *
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessageRegExp /Your socket connection to the server/
     */
    public function testClientSocketTimeoutErrorsAreNotRetriedIndefinitely($retrySettings)
    {
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retrySettings,
            'http_handler' => function () {
                return new RejectedPromise([
                    'connection_error' => false,
                    'exception' => $this->getMockBuilder(RequestException::class)
                        ->disableOriginalConstructor()
                        ->getMock(),
                    'response' => new Response(400, [], $this->getSocketTimeoutResponse()),
                ]);
            },
        ]);

        $client->putObject([
            'Bucket' => 'bucket',
            'Key' => 'key',
            'Body' => Psr7\stream_for('x'),
        ]);
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

    /**
     * @dataProvider clientRetrySettingsProvider
     *
     * @param array $retrySettings
     */
    public function testNetworkingErrorsAreRetriedOnIdempotentCommands($retrySettings)
    {
        $networkingError = $this->getMockBuilder(RequestException::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $retries = $retrySettings['max_attempts'] - 1;
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retrySettings,
            'http_handler' => function () use (&$retries, $networkingError) {
                if (0 === --$retries) {
                    return new FulfilledPromise(new Response);
                }

                return new RejectedPromise([
                    'connection_error' => false,
                    'exception' => $networkingError,
                    'response' => null,
                ]);
            },
        ]);

        $client->putObject([
            'Bucket' => 'bucket',
            'Key' => 'key',
        ]);

        $this->assertEquals(0, $retries);
    }

    /**
     * @dataProvider clientRetrySettingsProvider
     *
     * @param array $retrySettings
     *
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessageRegExp /CompleteMultipartUpload/
     */
    public function testNetworkingErrorsAreNotRetriedOnNonIdempotentCommands($retrySettings)
    {
        $networkingError = $this->getMockBuilder(RequestException::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $retries = $retrySettings['max_attempts'];
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retrySettings,
            'http_handler' => function () use (&$retries, $networkingError) {
                if (0 === --$retries) {
                    return new FulfilledPromise(new Response);
                }

                return new RejectedPromise([
                    'connection_error' => false,
                    'exception' => $networkingError,
                    'response' => null,
                ]);
            },
        ]);

        $client->completeMultipartUpload([
            'Bucket' => 'bucket',
            'Key' => 'key',
            'UploadId' => 1,
        ]);

        $this->assertEquals(0, $retries);
    }

    /**
     * @dataProvider clientRetrySettingsProvider
     *
     * @param array $retrySettings
     */
    public function testErrorsWithUnparseableBodiesCanBeRetried($retrySettings)
    {
        $networkingError = $this->getMockBuilder(RequestException::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $retries = $retrySettings['max_attempts'];
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retrySettings,
            'http_handler' => function () use (&$retries, $networkingError) {
                if (0 === --$retries) {
                    return new FulfilledPromise(new Response);
                }

                return new RejectedPromise([
                    'connection_error' => false,
                    'exception' => $networkingError,
                    'response' => new Response(200, [], openssl_random_pseudo_bytes(2048)),
                ]);
            },
        ]);

        $client->getObject([
            'Bucket' => 'bucket',
            'Key' => 'key',
        ]);

        $this->assertEquals(0, $retries);
    }

    public function testListObjectsAppliesUrlEncodingWhenNoneSupplied()
    {
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => function (RequestInterface $request) {
                $query = Psr7\parse_query($request->getUri()->getQuery());
                $this->assertArrayHasKey('encoding-type', $query);
                $this->assertSame('url', $query['encoding-type']);

                return new FulfilledPromise(new Response);
            },
        ]);

        $client->listObjects(['Bucket' => 'bucket']);
    }

    public function testListObjectsUrlDecodesEncodedKeysWhenEncodingNotSupplied()
    {
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => function () {
                return new FulfilledPromise(new Response(200, [], $this->getUrlEncodedListObjectsResponse()));
            },
        ]);

        $response = $client->listObjects(['Bucket' => 'bucket']);
        $this->assertSame(',', $response['Delimiter']);
        $this->assertSame('test/yearmonth=201601/file2', $response['Marker']);
        $this->assertSame('test/yearmonth=201601/file2', $response['NextMarker']);
        $this->assertSame('test/yearmonth=201601/', $response['Prefix']);
        $this->assertSame('test/yearmonth=201601/file1', $response['Contents'][0]['Key']);
        $this->assertSame('test/yearmonth=201601/', $response['CommonPrefixes'][0]['Prefix']);
    }

    public function testListObjectsDefaultEncodingDoesNotCreateReferences()
    {
        $listObjects = $this->getUrlEncodedListObjectsResponse();
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => function () use ($listObjects) {
                return new FulfilledPromise(new Response(200, [], $listObjects));
            },
        ]);

        $response = $client->listObjects(['Bucket' => 'bucket']);
        $this->assertSame('test/yearmonth=201601/file1', $response['Contents'][0]['Key']);
        $this->assertSame('test/yearmonth=201601/', $response['CommonPrefixes'][0]['Prefix']);

        $listObjectsCopy = $listObjects;
        $listObjectsCopy = str_replace('file1', 'thisisatest', $listObjectsCopy);

        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => function () use ($listObjects) {
                return new FulfilledPromise(new Response(200, [], $listObjects));
            },
        ]);
        $response = $client->listObjects(['Bucket' => 'bucket']);
        $this->assertSame('test/yearmonth=201601/file1', $response['Contents'][0]['Key']);
        $this->assertSame('test/yearmonth=201601/', $response['CommonPrefixes'][0]['Prefix']);
    }

    public function testListObjectsDoesNotUrlDecodeEncodedKeysWhenEncodingSupplied()
    {
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => function () {
                return new FulfilledPromise(new Response(200, [], $this->getUrlEncodedListObjectsResponse()));
            },
        ]);

        $response = $client->listObjects([
            'Bucket' => 'bucket',
            'EncodingType' => 'url',
        ]);

        $this->assertSame('%2C', $response['Delimiter']);
        $this->assertSame('test/yearmonth%3D201601/file2', $response['Marker']);
        $this->assertSame('test/yearmonth%3D201601/file2', $response['NextMarker']);
        $this->assertSame('test/yearmonth%3D201601/', $response['Prefix']);
        $this->assertSame('test/yearmonth%3D201601/file1', $response['Contents'][0]['Key']);
        $this->assertSame('test/yearmonth%3D201601/', $response['CommonPrefixes'][0]['Prefix']);
    }

    private function getUrlEncodedListObjectsResponse()
    {
        return <<<EOXML
<?xml version="1.0" encoding="UTF-8"?>
<ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Prefix>test/yearmonth%3D201601/</Prefix>
    <Marker>test/yearmonth%3D201601/file2</Marker>
    <NextMarker>test/yearmonth%3D201601/file2</NextMarker>
    <Delimiter>%2C</Delimiter>
    <EncodingType>url</EncodingType>
    <Contents>
        <Key>test/yearmonth%3D201601/file1</Key>
    </Contents>
    <CommonPrefixes>
        <Prefix>test/yearmonth%3D201601/</Prefix>
    </CommonPrefixes>
</ListBucketResult>
EOXML;
    }

    public function testHeadObjectDisablesContentDecodingByDefault()
    {
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => function (RequestInterface $r, array $opts = []) {
                $this->assertArrayHasKey('decode_content', $opts);
                $this->assertFalse($opts['decode_content']);

                return Promise\promise_for(new Response);
            }
        ]);

        $client->headObject(['Bucket' => 'bucket', 'Key' => 'key']);
    }

    public function testContentDecodingCanBeDisabled()
    {
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http' => ['decode_content' => false],
            'http_handler' => function (RequestInterface $r, array $opts = []) {
                $this->assertArrayHasKey('decode_content', $opts);
                $this->assertFalse($opts['decode_content']);

                return Promise\promise_for(new Response);
            }
        ]);

        $client->getObject(['Bucket' => 'bucket', 'Key' => 'key']);
    }

    public function testContentDecodingCanBeDisabledOnCommands()
    {
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => function (RequestInterface $r, array $opts = []) {
                $this->assertArrayHasKey('decode_content', $opts);
                $this->assertFalse($opts['decode_content']);

                return Promise\promise_for(new Response);
            }
        ]);

        $client->getObject([
            'Bucket' => 'bucket',
            'Key' => 'key',
            '@http' => ['decode_content' => false],
        ]);
    }

    public function testCanDetermineRegionOfBucket()
    {
        $client = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function () {
                return new FulfilledPromise(new Response(301, [
                    'X-Amz-Bucket-Region' => 'alderaan-north-1',
                ]));
            },
        ]);
        $this->assertSame('alderaan-north-1', $client->determineBucketRegion('bucket'));

        $client = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function() {
                return new RejectedPromise([
                    'connection_error' => false,
                    'exception' => $this->getMockBuilder(AwsException::class)
                        ->disableOriginalConstructor()
                        ->getMock(),
                    'response' => new Response(400, [
                        'X-Amz-Bucket-Region' => 'us-west-2',
                    ]),
                ]);
            },
        ]);
        $this->assertSame('us-west-2', $client->determineBucketRegion('bucket'));
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     */
    public function testDetermineBucketRegionExposeException()
    {
        $client = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'http_handler' => function() {
                return new RejectedPromise([
                    'connection_error' => false,
                    'exception' => $this->getMockBuilder(AwsException::class)
                        ->disableOriginalConstructor()
                        ->getMock(),
                    'response' => null,
                ]);
            },
        ]);
        $client->determineBucketRegion('bucket');
    }

    public function testAppliesS3EndpointMiddlewareDualstackAccelerate()
    {
        // test applies s3-accelerate.dualstack for valid operations
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                'bucket.s3-accelerate.dualstack.amazonaws.com',
                $req->getUri()->getHost()
            );
            $this->assertSame(
                '/key',
                $req->getUri()->getPath()
            );
            return Promise\promise_for(new Response);
        };

        $accelerateClient = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'use_accelerate_endpoint' => true,
            'use_dual_stack_endpoint' => true,
            'http_handler' => $handler,
        ]);
        $accelerateClient->getObject([
            'Bucket' => 'bucket',
            'Key' => 'key'
        ]);

        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => $handler,
        ]);
        $client->getObject([
            'Bucket' => 'bucket',
            'Key' => 'key',
            '@use_accelerate_endpoint' => true,
            '@use_dual_stack_endpoint' => true,
        ]);
    }

    public function testAppliesS3EndpointMiddlewareDualstackInvalidAccelerate()
    {
        // test applies dualstack solo for invalid accelerate operations
        // when both endpoint is enabled
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                'bucket.s3.dualstack.us-west-2.amazonaws.com',
                $req->getUri()->getHost()
            );
            $this->assertSame(
                '/',
                $req->getUri()->getPath()
            );
            return Promise\promise_for(new Response);
        };

        $accelerateClient = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'use_accelerate_endpoint' => true,
            'use_dual_stack_endpoint' => true,
            'http_handler' => $handler,
        ]);
        $accelerateClient->createBucket([
            'Bucket' => 'bucket',
        ]);

        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => $handler,
        ]);
        $client->createBucket([
            'Bucket' => 'bucket',
            '@use_accelerate_endpoint' => true,
            '@use_dual_stack_endpoint' => true,
        ]);
    }

    public function testAppliesS3EndpointMiddlewareDualstackInvalidAccelerateWithPathStyle()
    {
        // test applies dualstack solo for invalid accelerate operations
        // when both endpoint is enabled and forcing path style
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                's3.dualstack.us-west-2.amazonaws.com',
                $req->getUri()->getHost()
            );
            return Promise\promise_for(new Response);
        };

        $accelerateClient = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'use_accelerate_endpoint' => true,
            'use_dual_stack_endpoint' => true,
            'use_path_style_endpoint' => true,
            'http_handler' => $handler,
        ]);
        $accelerateClient->createBucket([
            'Bucket' => 'bucket',
        ]);

        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => $handler,
        ]);
        $client->createBucket([
            'Bucket' => 'bucket',
            '@use_accelerate_endpoint' => true,
            '@use_dual_stack_endpoint' => true,
            '@use_path_style_endpoint' => true,
        ]);
    }

    public function testAppliesS3EndpointMiddlewareAccelerate()
    {
        // test applies s3-accelerate for valid operations
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                'bucket.s3-accelerate.amazonaws.com',
                $req->getUri()->getHost()
            );
            return Promise\promise_for(new Response);
        };

        $accelerateClient = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'use_accelerate_endpoint' => true,
            'http_handler' => $handler,
        ]);
        $accelerateClient->getObject([
            'Bucket' => 'bucket',
            'Key' => 'key'
        ]);

        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => $handler,
        ]);
        $client->getObject([
            'Bucket' => 'bucket',
            'Key' => 'key',
            '@use_accelerate_endpoint' => true,
        ]);
    }

    public function testAppliesS3EndpointMiddlewareDualstack()
    {
        // test applies dualstack
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                'bucket.s3.dualstack.us-west-2.amazonaws.com',
                $req->getUri()->getHost()
            );
            $this->assertSame(
                '/',
                $req->getUri()->getPath()
            );
            return Promise\promise_for(new Response);
        };

        $dualStackClient = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'use_dual_stack_endpoint' => true,
            'http_handler' => $handler,
        ]);
        $dualStackClient->createBucket([
            'Bucket' => 'bucket',
        ]);

        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => $handler,
        ]);
        $client->createBucket([
            'Bucket' => 'bucket',
            '@use_dual_stack_endpoint' => true,
        ]);
    }

    public function testAppliesS3EndpointMiddlewareDualstackWithPathStyle()
    {
        // test applies dualstack with path style
        $handler = function (RequestInterface $req) {
            $this->assertSame(
                's3.dualstack.us-west-2.amazonaws.com',
                $req->getUri()->getHost()
            );
            $this->assertSame(
                '/bucket',
                $req->getUri()->getPath()
            );
            return Promise\promise_for(new Response);
        };

        $dualStackClient = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'use_dual_stack_endpoint' => true,
            'use_path_style_endpoint' => true,
            'http_handler' => $handler,
        ]);
        $dualStackClient->createBucket([
            'Bucket' => 'bucket',
        ]);

        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'http_handler' => $handler,
        ]);
        $client->createBucket([
            'Bucket' => 'bucket',
            '@use_dual_stack_endpoint' => true,
            '@use_path_style_endpoint' => true,
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid configuration value provided for "use_arn_region"
     */
    public function testAddsUseArnRegionArgument()
    {
        new S3Client([
            'region' => 'us-east-1',
            'version' => 'latest',
            'use_arn_region' => 'trigger exception'
        ]);
    }

    public function testAddsUseArnRegionCacheArgument()
    {
        // Create cache object
        $cache = new LruArrayCache();
        $cache->set('aws_s3_use_arn_region_config', new UseArnRegionConfiguration(true));

        // Create client using cached use_arn_region config
        $client = new S3Client([
            'region' => 'us-east-1',
            'version' => 'latest',
            'use_arn_region' => $cache,
            'handler' => function (CommandInterface $cmd, RequestInterface $req) {
                $this->assertEquals(
                    'myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                    $req->getUri()->getHost()
                );
                $this->assertEquals(
                    '/Bar/Baz',
                    $req->getUri()->getPath()
                );
                return new Result([]);
            },
        ]);

        $command = $client->getCommand(
            'GetObject',
            [
                'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                'Key' => 'Bar/Baz',
            ]
        );
        $client->execute($command);
    }

    public function testCopyOperationCorrectlyPopulates()
    {
        $client = new S3Client([
            'region' => 'us-west-2',
            'version' => 'latest',
            'handler' => function (CommandInterface $cmd, RequestInterface $req) {
                $this->assertEquals(
                    'myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                    $req->getUri()->getHost()
                );
                $this->assertEquals(
                    '/copied-object',
                    $req->getUri()->getPath()
                );
                $this->assertEquals(
                    'arn:aws:s3:us-west-2:1234567890123:accesspoint:my-my/finks-object',
                    $req->getHeader('x-amz-copy-source')[0]
                );
                return new Result([]);
            },
        ]);

        $command = $client->getCommand(
            'CopyObject',
            [
                'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                'Key' => 'copied-object',
                'CopySource' => 'arn:aws:s3:us-west-2:1234567890123:accesspoint:my-my/finks-object'
            ]
        );
        $client->execute($command);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Configuration parameter must either be 'legacy' or 'regional'.
     */
    public function testAddsS3RegionalEndpointArgument()
    {
        new S3Client([
            'region' => 'us-east-1',
            'version' => 'latest',
            's3_us_east_1_regional_endpoint' => 'trigger_exception'
        ]);
    }

    public function testAddsS3RegionalEndpointsCacheArgument()
    {
        // Create cache object
        $cache = new LruArrayCache();
        $cache->set('aws_s3_us_east_1_regional_endpoint_config', new Configuration('regional'));
        // Create client using cached endpoints config
        $client = new S3Client([
            'region' => 'us-east-1',
            'version' => 'latest',
            's3_us_east_1_regional_endpoint' => $cache
        ]);
        // Get the expected Uri from the PartitionEndpointProvider
        $provider = PartitionEndpointProvider::defaultProvider([
            's3_us_east_1_regional_endpoint' => 'regional'
        ]);
        $endpoint = $provider([
            'service' => 's3',
            'region' => 'us-east-1',
        ]);
        $uri = new Uri($endpoint['endpoint']);
        $this->assertEquals($uri->getHost(), $client->getEndpoint()->getHost());
    }

    /**
     * Tests that S3 client configuration options lead to correct endpoints
     *
     * @dataProvider optionsToEndpointsCases
     * @param $options
     * @param $host
     */
    public function testResolvesOptionsToProperEndpoints($options, $host)
    {
        $client = new S3Client($options);
        $client->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) use ($host) {
                $this->assertEquals($host, $req->getUri()->getHost());
            })
        );
        $client->listBuckets();
    }

    public function optionsToEndpointsCases()
    {
        $handler = function ($cmd, $req) {
            return Promise\promise_for(new Result([]));
        };
        $data = json_decode(
            file_get_contents(__DIR__ . '/../Endpoint/fixtures/s3_us_east_1_regional_endpoint.json'),
            true
        );
        $regionalProvider = new PartitionEndpointProvider(
            $data['partitions'],
            'aws',
            [
                's3_us_east_1_regional_endpoint' => 'regional',
            ]
        );
        $legacyProvider = new PartitionEndpointProvider(
            $data['partitions'],
            'aws',
            [
                's3_us_east_1_regional_endpoint' => 'legacy',
            ]
        );

        return [
            [
                [
                    'region' => 'us-east-1',
                    'version' => 'latest',
                    'handler' => $handler,
                    'endpoint_provider' => $legacyProvider,
                ],
                's3.amazonaws.com'
            ],
            [
                [
                    'region' => 'us-east-1',
                    'version' => 'latest',
                    'handler' => $handler,
                    'endpoint_provider' => $regionalProvider,
                ],
                's3.us-east-1.amazonaws.com'
            ],
            [
                [
                    'region' => 'us-west-2',
                    'version' => 'latest',
                    'handler' => $handler,
                    'endpoint_provider' => $legacyProvider,
                ],
                's3.us-west-2.amazonaws.com'
            ],
            [
                [
                    'region' => 'us-west-2',
                    'version' => 'latest',
                    'handler' => $handler,
                    'endpoint_provider' => $regionalProvider,
                ],
                's3.us-west-2.amazonaws.com'
            ],
            [
                [
                    'region' => 'us-east-1',
                    'version' => 'latest',
                    'handler' => $handler,
                    'endpoint_provider' => $legacyProvider,
                    'use_dual_stack_endpoint' => true,
                ],
                's3.dualstack.us-east-1.amazonaws.com'
            ],
            [
                [
                    'region' => 'us-east-1',
                    'version' => 'latest',
                    'handler' => $handler,
                    'endpoint_provider' => $regionalProvider,
                    'use_dual_stack_endpoint' => true,
                ],
                's3.dualstack.us-east-1.amazonaws.com'
            ],
        ];
    }

    /**
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessage An error connecting to the service occurred while performing the CopyObject operation
     */
    public function testAppliesAmbiguousSuccessParsing()
    {
        $httpHandler = function ($request, array $options) {
            return Promise\promise_for(
                new Psr7\Response(200, [], "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n\n\n")
            );
        };

        $s3 = new S3Client([
            'version'     => 'latest',
            'region'      => 'us-east-1',
            'http_handler' => $httpHandler
        ]);

        $s3->copyObject([
            'Bucket' => 'test-dest',
            'Key' => 'test-key',
            'CopySource' => 'test-source/key'
        ]);
    }

    public function testRetriesAmbiguousSuccesses()
    {
        $counter = 0;
        $httpHandler = function ($request, array $options) use (&$counter) {
            if ($counter < 2) {
                $body = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n\n\n";
            } else {
                $body = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><OperationNameResponse><UploadId>baz</UploadId></OperationNameResponse>";
            }
            $counter++;

            return Promise\promise_for(
                new Psr7\Response(200, [], $body)
            );
        };

        $s3 = new S3Client([
            'version'     => 'latest',
            'region'      => 'us-east-1',
            'http_handler' => $httpHandler
        ]);
        $s3->copyObject([
            'Bucket' => 'test-dest',
            'Key' => 'test-key',
            'CopySource' => 'test-source/key'
        ]);

        $this->assertEquals(3, $counter);
    }
}
