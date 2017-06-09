<?php
namespace Aws\Test\S3;

use Aws\Command;
use Aws\Exception\AwsException;
use Aws\Result;
use Aws\S3\Exception\S3Exception;
use Aws\S3\MultipartUploader;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\FnStream;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @covers Aws\S3\S3Client
 */
class S3ClientTest extends \PHPUnit_Framework_TestCase
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

    public function testRetriesConnectionErrors()
    {
        $retries = 11;
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retries,
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

    /**
     * @dataProvider successErrorResponseProvider
     *
     * @param Response $failingSuccess
     * @param string   $operation
     * @param array    $payload
     */
    public function testRetries200Errors(
        Response $failingSuccess,
        $operation,
        array $payload
    ) {
        $retries = 11;
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retries,
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
            ],
            [
                new Response(200, [], $this->getErrorXml()),
                'completeMultipartUpload',
                [
                    'UploadId' => PHP_INT_SIZE,
                    'Bucket' => 'foo',
                    'Key' => 'bar',
                ],
            ],
            [
                new Response(200, [], $this->getMalformedXml()),
                'listObjects',
                [
                    'Bucket' => 'foo',
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
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessageRegExp /Your socket connection to the server/
     */
    public function testClientSocketTimeoutErrorsAreNotRetriedIndefinitely()
    {
        $retries = 11;
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retries,
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

    public function testNetworkingErrorsAreRetriedOnIdempotentCommands()
    {
        $networkingError = $this->getMockBuilder(RequestException::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $retries = 11;
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retries,
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
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessageRegExp /CompleteMultipartUpload/
     */
    public function testNetworkingErrorsAreNotRetriedOnNonIdempotentCommands()
    {
        $networkingError = $this->getMockBuilder(RequestException::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $retries = 11;
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retries,
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

    public function testErrorsWithUnparseableBodiesCanBeRetried()
    {
        $networkingError = $this->getMockBuilder(RequestException::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $retries = 11;
        $client = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            'retries' => $retries,
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
                $this->assertSame(false, $opts['decode_content']);

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
                $this->assertSame(false, $opts['decode_content']);

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
                $this->assertSame(false, $opts['decode_content']);

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
}
