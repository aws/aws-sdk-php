<?php
namespace Aws\Test\S3;

use Aws\CommandInterface;
use Aws\History;
use Aws\LruArrayCache;
use Aws\Middleware;
use Aws\Result;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Aws\S3\StreamWrapper;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\S3\StreamWrapper
 */
class StreamWrapperPathStyleTest extends TestCase
{
    use UsesServiceTrait;

    /** @var S3Client */
    private $client;

    /** @var LruArrayCache */
    private $cache;

    public function set_up()
    {
        // use a fresh LRU cache for each test.
        $this->cache = new LruArrayCache();
        stream_context_set_default(['s3' => ['cache' => $this->cache]]);
        $this->client = $this->getTestClient('S3', [
            'region' => 'us-east-1',
            'use_path_style_endpoint' => true
        ]);
        $this->client->registerStreamWrapper();
    }

    public function tear_down()
    {
        stream_wrapper_unregister('s3');
        $this->client = null;
    }

    public function testRegistersStreamWrapperOnlyOnce()
    {
        StreamWrapper::register($this->client);
        $this->assertContains('s3', stream_get_wrappers());
        StreamWrapper::register($this->client);
    }

    public function testCannotOpenBuckets()
    {
        $this->expectExceptionMessage("Cannot open a bucket");
        $this->expectWarning();
        fopen('s3://bucket', 'r');
    }

    public function testSupportsOnlyReadWriteXA()
    {
        $this->expectExceptionMessage("Mode not supported");
        $this->expectWarning();
        fopen('s3://bucket/key', 'c');
    }

    public function testValidatesXMode()
    {
        $this->expectExceptionMessage("s3://bucket/key already exists on Amazon S3");
        $this->expectWarning();
        $this->addMockResults($this->client, [new Result()]);
        fopen('s3://bucket/key', 'x');
    }

    /** @doesNotPerformAssertions */
    public function testSuccessfulXMode()
    {
        $this->addMockResults(
            $this->client,
            [
                function ($cmd, $request) {
                    return new S3Exception('404', $cmd);
                },
                new Result()
            ]
        );
        $r = fopen('s3://bucket/key', 'x');
        fclose($r);
    }

    public function testOpensNonSeekableReadStream()
    {
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, 'foo');
        fseek($stream, 0);

        $this->addMockResults($this->client, [
            new Result([
                'Body' => new Psr7\NoSeekStream(new Psr7\Stream($stream))
            ])
        ]);

        $s = fopen('s3://bucket/key', 'r');
        $this->assertSame(0, ftell($s));
        $this->assertFalse(feof($s));
        $this->assertSame('foo', fread($s, 4));
        $this->assertSame(3, ftell($s));
        $this->assertSame(-1, fseek($s, 0));
        $this->assertSame('', stream_get_contents($s));
        $this->assertTrue(feof($s));
        $this->assertTrue(fclose($s));
    }

    public function testOpensSeekableReadStream()
    {
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, 'testing 123');
        fseek($stream, 0);

        $this->addMockResults($this->client, [
            new Result([
                'Body' => new Psr7\NoSeekStream(new Psr7\Stream($stream))
            ])
        ]);

        $s = fopen('s3://bucket/ket', 'r', false, stream_context_create([
            's3' => ['seekable' => true]
        ]));

        $this->assertSame(0, ftell($s));
        $this->assertFalse(feof($s));
        $this->assertSame('test', fread($s, 4));
        $this->assertSame(4, ftell($s));
        $this->assertSame(0, fseek($s, 0));
        $this->assertSame('testing 123', stream_get_contents($s));
        $this->assertTrue(feof($s));
        $this->assertTrue(fclose($s));
    }

    public function testAttemptsToGuessTheContentType()
    {
        $h = [];
        $this->client->getHandlerList()->setHandler(function ($c, $r) use (&$h) {
            $h[] = [$c, $r];
            return \GuzzleHttp\Promise\Create::promiseFor(new Result());
        });
        file_put_contents('s3://foo/bar.xml', 'test');
        $this->assertCount(1, $h);
        $this->assertSame('application/xml', $h[0][1]->getHeaderLine('Content-Type'));
    }

    public function testCanOpenWriteOnlyStreams()
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));
        $this->addMockResults($this->client, [new Result()]);
        $s = fopen('s3://bucket/key', 'w');
        $this->assertSame(4, fwrite($s, 'test'));
        $this->assertTrue(fclose($s));

        // Ensure that the stream was flushed and sent the upload
        $this->assertCount(1, $history);
        $cmd = $history->getLastCommand();
        $this->assertSame('PutObject', $cmd->getName());
        $this->assertSame('bucket', $cmd['Bucket']);
        $this->assertSame('key', $cmd['Key']);
        $this->assertSame('test', (string) $cmd['Body']);
    }

    public function testTriggersErrorInsteadOfExceptionWhenWriteFlushFails()
    {
        $this->expectExceptionMessage("403 Forbidden");
        $this->expectWarning();
        $this->addMockResults($this->client, [
            function ($cmd, $req) { return new S3Exception('403 Forbidden', $cmd); }
        ]);
        $s = fopen('s3://bucket/key', 'w');
        fwrite($s, 'test');
        fclose($s);
    }

    public function testCanOpenAppendStreamsWithOriginalFile()
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));

        // Queue the 200 response that will load the original, and queue the
        // 204 flush response
        $this->addMockResults($this->client, [
            new Result(['Body' => Psr7\Utils::streamFor('test')]),
            new Result(['@metadata' => ['statusCode' => 204, 'effectiveUri' => 'http://foo.com']])
        ]);

        $s = fopen('s3://bucket/key', 'a');
        $this->assertSame(4, ftell($s));
        $this->assertSame(3, fwrite($s, 'ing'));
        $this->assertTrue(fclose($s));

        // Ensure that the stream was flushed and sent the upload
        $this->assertCount(2, $history);
        $entries = $history->toArray();
        $c1 = $entries[0]['command'];
        $this->assertSame('GetObject', $c1->getName());
        $this->assertSame('bucket', $c1['Bucket']);
        $this->assertSame('key', $c1['Key']);
        $c2 = $entries[1]['command'];
        $this->assertSame('PutObject', $c2->getName());
        $this->assertSame('key', $c2['Key']);
        $this->assertSame('testing', (string) $c2['Body']);
    }

    public function testCanOpenAppendStreamsWithMissingFile()
    {
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('err', $cmd); },
            new Result(['@metadata' => ['statusCode' => 204, 'effectiveUri' => 'http://foo.com']])
        ]);

        $s = fopen('s3://bucket/key', 'a');
        $this->assertSame(0, ftell($s));
        $this->assertTrue(fclose($s));
    }

    public function testCanUnlinkFiles()
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));
        $this->addMockResults($this->client, [
            new Result(['@metadata' => ['statusCode' => 204]])
        ]);
        $this->assertTrue(unlink('s3://bucket/key'));
        $this->assertCount(1, $history);
        $entries = $history->toArray();
        $this->assertSame('DELETE', $entries[0]['request']->getMethod());
        $this->assertSame('/bucket/key', $entries[0]['request']->getUri()->getPath());
        $this->assertSame('s3.amazonaws.com', $entries[0]['request']->getUri()->getHost());
    }

    public function testThrowsErrorsWhenUnlinkFails()
    {
        $this->expectExceptionMessage("403 Forbidden");
        $this->expectWarning();
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('403 Forbidden', $cmd); },
        ]);
        $this->assertFalse(unlink('s3://bucket/key'));
    }

    public function testCreatingBucketWithNoBucketReturnsFalse()
    {
        $this->assertFalse(mkdir('s3://'));
    }

    public function testCreatingAlreadyExistingBucketRaisesError()
    {
        $this->expectWarning();
        $this->expectExceptionMessage("Bucket already exists: s3://already-existing-bucket");
        $this->addMockResults($this->client, [new Result()]);
        mkdir('s3://already-existing-bucket');
    }

    public function testCreatingAlreadyExistingBucketForKeyRaisesError()
    {
        $this->expectWarning();
        $this->expectExceptionMessage("Subfolder already exists: s3://already-existing-bucket/key");
        $this->addMockResults($this->client, [new Result()]);
        mkdir('s3://already-existing-bucket/key');
    }

    public function testCreatingBucketsDoesNotSetAcl()
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));

        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('404', $cmd); },
            new Result(),
            function ($cmd, $r) { return new S3Exception('404', $cmd); },
            new Result(),
            function ($cmd, $r) { return new S3Exception('404', $cmd); },
            new Result(),
        ]);

        $this->assertTrue(mkdir('s3://bucket', 0777));
        $this->assertTrue(mkdir('s3://bucket', 0601));
        $this->assertTrue(mkdir('s3://bucket', 0500));

        $this->assertCount(6, $history);
        $entries = $history->toArray();

        $this->assertSame('HEAD', $entries[0]['request']->getMethod());
        $this->assertSame('HEAD', $entries[2]['request']->getMethod());
        $this->assertSame('HEAD', $entries[4]['request']->getMethod());

        $this->assertSame('PUT', $entries[1]['request']->getMethod());
        $this->assertSame('/bucket/', $entries[1]['request']->getUri()->getPath());
        $this->assertSame('s3.amazonaws.com', $entries[1]['request']->getUri()->getHost());
        $this->assertSame('', (string) $entries[1]['request']->getHeaderLine('x-amz-acl'));
        $this->assertSame('', (string) $entries[3]['request']->getHeaderLine('x-amz-acl'));
        $this->assertSame('', (string) $entries[5]['request']->getHeaderLine('x-amz-acl'));
    }

    public function testCreatesNestedSubfolder()
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));

        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('404', $cmd); },
            new Result() // 204
        ]);

        $this->assertTrue(mkdir('s3://bucket/key/', 0777));
        $this->assertCount(2, $history);
        $entries = $history->toArray();
        $this->assertSame('HEAD', $entries[0]['request']->getMethod());
        $this->assertSame('PUT', $entries[1]['request']->getMethod());
        $this->assertStringContainsString('public-read', $entries[1]['request']->getHeaderLine('x-amz-acl'));
    }

    public function testCannotDeleteS3()
    {
        $this->expectExceptionMessage("specify a bucket");
        $this->expectWarning();
        rmdir('s3://');
    }

    public function testRmDirWithExceptionTriggersError()
    {
        $this->expectExceptionMessage("403 Forbidden");
        $this->expectWarning();
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('403 Forbidden', $cmd); },
        ]);
        rmdir('s3://bucket');
    }

    public function testCanDeleteBucketWithRmDir()
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));
        $this->addMockResults($this->client, [new Result()]);
        $this->assertTrue(rmdir('s3://bucket'));
        $this->assertCount(1, $history);
        $entries = $history->toArray();
        $this->assertSame('DELETE', $entries[0]['request']->getMethod());
        $this->assertSame('/bucket/', $entries[0]['request']->getUri()->getPath());
        $this->assertSame('s3.amazonaws.com', $entries[0]['request']->getUri()->getHost());
    }

    public function rmdirProvider()
    {
        return [
            ['s3://bucket/object/'],
            ['s3://bucket/object'],
        ];
    }

    /**
     * @dataProvider rmdirProvider
     */
    public function testCanDeleteObjectWithRmDir($path)
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));
        $this->addMockResults($this->client, [new Result(), new Result()]);
        $this->assertTrue(rmdir($path));
        $this->assertCount(1, $history);
        $entries = $history->toArray();
        $this->assertSame('GET', $entries[0]['request']->getMethod());
        $this->assertStringContainsString('prefix=object%2F', $entries[0]['request']->getUri()->getQuery());
    }

    public function testCanDeleteNestedFolderWithRmDir()
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));
        $this->addMockResults($this->client, [
            new Result([
                'Name' => 'foo',
                'Delimiter' => '/',
                'IsTruncated' => false,
                'Contents' => [['Key' => 'bar/']]
            ]),
            new Result()
        ]);
        $this->assertTrue(rmdir('s3://foo/bar'));
        $this->assertCount(2, $history);
        $entries = $history->toArray();
        $this->assertSame('GET', $entries[0]['request']->getMethod());
        $this->assertStringContainsString('prefix=bar%2F', $entries[0]['request']->getUri()->getQuery());
        $this->assertSame('DELETE', $entries[1]['request']->getMethod());
        $this->assertSame('/foo/bar/', $entries[1]['request']->getUri()->getPath());
    }

    public function testRenameEnsuresProtocolsMatch()
    {
        $this->expectExceptionMessage("rename(): Cannot rename a file across wrapper types");
        $this->expectWarning();
        StreamWrapper::register($this->client, 'baz');
        rename('s3://foo/bar', 'baz://qux/quux');
    }

    public function testRenameEnsuresKeyIsSet()
    {
        $this->expectExceptionMessage("The Amazon S3 stream wrapper only supports copying objects");
        $this->expectWarning();
        rename('s3://foo/bar', 's3://baz');
    }

    public function testRenameWithExceptionThrowsError()
    {
        $this->expectExceptionMessage("Forbidden");
        $this->expectWarning();
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('403 Forbidden', $cmd); },
        ]);
        rename('s3://foo/bar', 's3://baz/bar');
    }

    public function testCanRenameObjects()
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));
        $this->addMockResults($this->client, [
            new Result(),
            new Result(),
            new Result(),
        ]);
        $this->assertTrue(rename('s3://bucket/key', 's3://other/new_key'));
        $entries = $history->toArray();
        $this->assertCount(3, $entries);
        $this->assertSame('HEAD', $entries[0]['request']->getMethod());
        $this->assertSame('/bucket/key', $entries[0]['request']->getUri()->getPath());
        $this->assertSame('PUT', $entries[1]['request']->getMethod());
        $this->assertSame('/other/new_key', $entries[1]['request']->getUri()->getPath());
        $this->assertSame('s3.amazonaws.com', $entries[1]['request']->getUri()->getHost());
        $this->assertSame(
            '/bucket/key',
            $entries[1]['request']->getHeaderLine('x-amz-copy-source')
        );
        $this->assertSame(
            'COPY',
            $entries[1]['request']->getHeaderLine('x-amz-metadata-directive')
        );
        $this->assertSame('DELETE', $entries[2]['request']->getMethod());
        $this->assertSame('/bucket/key', $entries[2]['request']->getUri()->getPath());
        $this->assertSame('s3.amazonaws.com', $entries[2]['request']->getUri()->getHost());
    }

    public function testCanRenameObjectsWithCustomSettings()
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));
        $this->addMockResults($this->client, [
            new Result(), // 204
            new Result(), // 204
            new Result(), // 204
        ]);
        $this->assertTrue(rename(
            's3://bucket/key',
            's3://other/new_key',
            stream_context_create(['s3' => ['MetadataDirective' => 'REPLACE']])
        ));
        $entries = $history->toArray();
        $this->assertCount(3, $entries);
        $this->assertSame('PUT', $entries[1]['request']->getMethod());
        $this->assertSame('/other/new_key', $entries[1]['request']->getUri()->getPath());
        $this->assertSame('s3.amazonaws.com', $entries[1]['request']->getUri()->getHost());
        $this->assertSame(
            '/bucket/key',
            $entries[1]['request']->getHeaderLine('x-amz-copy-source')
        );
        $this->assertSame(
            'REPLACE',
            $entries[1]['request']->getHeaderLine('x-amz-metadata-directive')
        );
    }

    public function testStatS3andBuckets()
    {
        clearstatcache('s3://');
        $stat = stat('s3://');
        $this->assertSame(0040777, $stat['mode']);
        $this->addMockResults($this->client, [
            new Result() // 200
        ]);
        clearstatcache('s3://bucket');
        $stat = stat('s3://bucket');
        $this->assertSame(0040777, $stat['mode']);
    }

    public function testStatDataIsClearedOnWrite()
    {
        $this->cache->set('s3://foo/bar', ['size' => 123, 7 => 123]);
        $this->assertSame(123, filesize('s3://foo/bar'));
        $this->addMockResults($this->client, [
            new Result,
            new Result(['ContentLength' => 124])
        ]);
        file_put_contents('s3://foo/bar', 'baz!');
        $this->assertSame(124, filesize('s3://foo/bar'));
    }

    public function testCanPullStatDataFromCache()
    {
        $this->cache->set('s3://foo/bar', ['size' => 123, 7 => 123]);
        $this->assertSame(123, filesize('s3://foo/bar'));
    }

    public function testFailingStatTriggersError()
    {
        $this->expectExceptionMessage("Forbidden");
        $this->expectWarning();
        // Sends one request for HeadObject, then another for ListObjects
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('403 Forbidden', $cmd); },
            function ($cmd, $r) { return new S3Exception('403 Forbidden', $cmd); }
        ]);
        clearstatcache('s3://bucket/key');
        stat('s3://bucket/key');
    }

    public function testBucketNotFoundTriggersError()
    {
        $this->expectExceptionMessage("File or directory not found: s3://bucket");
        $this->expectWarning();
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('404', $cmd); },
        ]);
        clearstatcache('s3://bucket');
        stat('s3://bucket');
    }

    public function testStatsRegularObjects()
    {
        $ts = strtotime('Tuesday, April 9 2013');
        $this->addMockResults($this->client, [
            new Result([
                'ContentLength' => 5,
                'LastModified'  => gmdate('r', $ts)
            ])
        ]);
        clearstatcache('s3://bucket/key');
        $stat = stat('s3://bucket/key');
        $this->assertSame(0100777, $stat['mode']);
        $this->assertSame(5, $stat['size']);
        $this->assertSame($ts, $stat['mtime']);
        $this->assertSame($ts, $stat['ctime']);
    }

    public function testCanStatPrefix()
    {
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('404', $cmd); },
            new Result([
                'Name' => 'bucket-1',
                'IsTruncated' => false,
                'CommonPrefixes' => [
                    ['Prefix' => 'g/']
                ]
            ])
        ]);
        clearstatcache('s3://bucket/prefix');
        $stat = stat('s3://bucket/prefix');
        $this->assertSame(0040777, $stat['mode']);
    }

    public function testCannotStatPrefixWithNoResults()
    {
        $this->expectExceptionMessage("File or directory not found: s3://bucket/prefix");
        $this->expectWarning();
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('404', $cmd); },
            new Result()
        ]);
        clearstatcache('s3://bucket/prefix');
        stat('s3://bucket/prefix');
    }

    public function fileTypeProvider()
    {
        $err = function ($cmd, $r) { return new S3Exception('404', $cmd); };

        return [
            ['s3://', [], 'dir'],
            ['s3://t123', [new Result()], 'dir'],
            ['s3://t123/', [new Result()], 'dir'],
            ['s3://t123', [$err], 'error'],
            ['s3://t123/', [$err], 'error'],
            ['s3://t123/abc', [new Result()], 'file'],
            ['s3://t123/abc/', [new Result()], 'dir'],
            // Contains several keys, so this is a key prefix (directory)
            ['s3://t123/abc/', [
                $err,
                new Result([
                    'IsTruncated' => false,
                    'Delimiter'   => '/',
                    'Contents'    => [['Key' => 'e']]
                ])
            ], 'dir'],
            // No valid keys were found in the list objects call, so it's not
            // a file, directory, or key prefix.
            ['s3://t123/abc/', [
                $err,
                new Result([
                    'IsTruncated' => false,
                    'Contents' => []
                ])
            ], 'error'],
        ];
    }

    /**
     * @dataProvider fileTypeProvider
     */
    public function testDeterminesIfFileOrDir($uri, $queue, $result)
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));

        if ($queue) {
            $this->addMockResults($this->client, $queue);
        }

        clearstatcache();
        if ($result == 'error') {
            $err = false;
            set_error_handler(function ($e) use (&$err) { $err = true; });
            $actual = filetype($uri);
            restore_error_handler();
            $this->assertFalse($actual);
            $this->assertTrue($err);
        } else {
            $actual = filetype($uri);
            $this->assertSame($actual, $result);
        }

        $this->assertCount(count($queue), $history);
    }

    public function testStreamCastIsNotPossible()
    {
        if (PHP_VERSION_ID < 80000) {
            $this->expectExceptionMessage("cannot represent a stream of type user-space");
            $this->expectWarning();
        } else {
            $this->expectExceptionMessage('No stream arrays were passed');
            $this->expectException(\ValueError::class);
        }

        $this->addMockResults($this->client, [
            new Result(['Body' => Psr7\Utils::streamFor('')])
        ]);
        $r = fopen('s3://bucket/key', 'r');
        $read = [$r];
        $write = $except = null;
        stream_select($read, $write, $except, 0);
    }

    public function testEnsuresClientIsSet()
    {
        $this->expectExceptionMessage("No client in stream context");
        $this->expectWarning();
        fopen('s3://bucket/key', 'r', false, stream_context_create([
            's3' => ['client' => null]
        ]));
    }

    public function testDoesNotErrorOnIsLink()
    {
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('404', $cmd); },
        ]);
        $this->assertFalse(is_link('s3://bucket/key'));
    }

    public function testDoesNotErrorOnFileExists()
    {
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('404', $cmd); },
        ]);
        $this->assertFileDoesNotExist('s3://bucket/key');
    }

    public function testProvidesDirectoriesForS3()
    {
        $results = [
            [
                'IsTruncated' => true,
                'NextMarker'  => 'key/b/',
                'Name'        => 'bucket',
                'Prefix'      => '',
                'MaxKeys'     => 1000,
                'CommonPrefixes' => [
                    ['Prefix' => 'key/a/'],
                    ['Prefix' => 'key/b/']
                ]
            ],
            [
                'IsTruncated' => true,
                'Marker'      => '',
                'Contents'    => [['Key' => 'key/c']],
                'Name'        => 'bucket',
                'Prefix'      => '',
                'MaxKeys'     => 1000,
                'CommonPrefixes' => [['Prefix' => 'key/d/']]
            ],
            [
                'IsTruncated' => true,
                'Marker'      => '',
                'Delimiter'   => '/',
                'Contents'    => [
                    ['Key' => 'key/e', 'Size' => 1],
                    ['Key' => 'key/f', 'Size' => 2]
                ],
                'Name'        => 'bucket',
                'Prefix'      => '',
                'MaxKeys'     => 1000
            ],
            [
                'IsTruncated' => true,
                'Marker'      => '',
                'Name'        => 'bucket',
                'Prefix'      => '',
                'NextMarker'  => 'DUMMY',
                'MaxKeys'     => 1000
            ],
            [
                'IsTruncated' => false,
                'Name'        => 'bucket',
                'NextMarker'  => 'DUMMY',
                'MaxKeys'     => 1000,
                'CommonPrefixes' => [['Prefix' => 'key/g/']]
            ]
        ];

        $this->addMockResults($this->client, array_merge($results, $results));

        $this->client->getHandlerList()->appendBuild(
            Middleware::tap(function (CommandInterface $c, $req) {
                $this->assertSame('bucket', $c['Bucket']);
                $this->assertSame('/', $c['Delimiter']);
                $this->assertSame('key/', $c['Prefix']);
            })
        );

        $dir = 's3://bucket/key/';
        $r = opendir($dir);
        $this->assertIsResource($r);

        $files = [];
        while (($file = readdir($r)) !== false) {
            $files[] = $file;
        }

        // This is the order that the mock responses should provide
        $expected = ['a', 'b', 'c', 'd', 'e', 'f', 'g'];
        $this->assertEquals($expected, $files);

        // Get size from cache
        $this->assertSame(1, filesize('s3://bucket/key/e'));
        $this->assertSame(2, filesize('s3://bucket/key/f'));

        closedir($r);
    }

    /** @doesNotPerformAssertions */
    public function testCanSetDelimiterStreamContext()
    {
        $this->addMockResults($this->client, [
            [
                'IsTruncated' => false,
                'Marker'      => '',
                'Contents'    => [],
                'Name'        => 'bucket',
                'Prefix'      => '',
                'MaxKeys'     => 1000,
                'CommonPrefixes' => [['Prefix' => 'foo']]
            ]
        ]);

        $this->client->getHandlerList()->appendBuild(
            Middleware::tap(function (CommandInterface $c, $req) {
                $this->assertSame('bucket', $c['Bucket']);
                $this->assertSame('', $c['Delimiter']);
                $this->assertSame('', $c['Prefix']);
            })
        );

        $context = stream_context_create(['s3' => ['delimiter' => '']]);
        $r = opendir('s3://bucket', $context);
        closedir($r);
    }

    public function testCachesReaddirs()
    {
        $results = [
            [
                'IsTruncated' => false,
                'Marker'      => '',
                'Delimiter'   => '/',
                'Contents'    => [
                    ['Key' => 'key/e', 'Size' => 1],
                    ['Key' => 'key/f', 'Size' => 2]
                ],
                'Name'        => 'bucket',
                'Prefix'      => '',
                'MaxKeys'     => 1000
            ]
        ];

        $this->addMockResults($this->client, array_merge($results, $results));
        $dir = 's3://bucket/key/';
        $r = opendir($dir);
        $file1 = readdir($r);
        $this->assertSame('e', $file1);
        $this->assertSame(1, filesize('s3://bucket/key/' . $file1));
        $file2 = readdir($r);
        $this->assertSame('f', $file2);
        $this->assertSame(2, filesize('s3://bucket/key/' . $file2));
        closedir($r);
    }

    public function testReturnsStreamSizeFromHeaders()
    {
        $stream = Psr7\Utils::streamFor('12345');
        $stream = Psr7\FnStream::decorate($stream, [
            'getSize' => function () { return null; }
        ]);
        $result = [
            'Body' => $stream,
            'ContentLength' => 5
        ];
        $this->addMockResults($this->client, [$result]);
        $resource = fopen('s3://foo/bar', 'r');
        $this->assertSame(5, fstat($resource)['size']);
    }

    public function testCanUseCustomProtocol()
    {
        StreamWrapper::register($this->client, 'foo');
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, 'bar');
        fseek($stream, 0);

        $this->addMockResults($this->client, [
            new Result([
                'Body' => new Psr7\NoSeekStream(new Psr7\Stream($stream))
            ])
        ]);

        $s = fopen('foo://bucket/key', 'r');
        $this->assertSame('bar', fread($s, 4));
    }
}
