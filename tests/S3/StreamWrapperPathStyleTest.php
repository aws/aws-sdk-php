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

/**
 * @covers Aws\S3\StreamWrapper
 */
class StreamWrapperPathStyleTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /** @var S3Client */
    private $client;

    /** @var LruArrayCache */
    private $cache;

    public function setUp()
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

    public function tearDown()
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

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Cannot open a bucket
     */
    public function testCannotOpenBuckets()
    {
        fopen('s3://bucket', 'r');
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Mode not supported
     */
    public function testSupportsOnlyReadWriteXA()
    {
        fopen('s3://bucket/key', 'c');
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage s3://bucket/key already exists on Amazon S3
     */
    public function testValidatesXMode()
    {
        $this->addMockResults($this->client, [new Result()]);
        fopen('s3://bucket/key', 'x');
    }

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
        $this->assertEquals(0, ftell($s));
        $this->assertFalse(feof($s));
        $this->assertEquals('foo', fread($s, 4));
        $this->assertEquals(3, ftell($s));
        $this->assertEquals(-1, fseek($s, 0));
        $this->assertEquals('', stream_get_contents($s));
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

        $this->assertEquals(0, ftell($s));
        $this->assertFalse(feof($s));
        $this->assertEquals('test', fread($s, 4));
        $this->assertEquals(4, ftell($s));
        $this->assertEquals(0, fseek($s, 0));
        $this->assertEquals('testing 123', stream_get_contents($s));
        $this->assertTrue(feof($s));
        $this->assertTrue(fclose($s));
    }

    public function testAttemptsToGuessTheContentType()
    {
        $h = [];
        $this->client->getHandlerList()->setHandler(function ($c, $r) use (&$h) {
            $h[] = [$c, $r];
            return \GuzzleHttp\Promise\promise_for(new Result());
        });
        file_put_contents('s3://foo/bar.xml', 'test');
        $this->assertCount(1, $h);
        $this->assertEquals('application/xml', $h[0][1]->getHeaderLine('Content-Type'));
    }

    public function testCanOpenWriteOnlyStreams()
    {
        $history = new History();
        $this->client->getHandlerList()->appendSign(Middleware::history($history));
        $this->addMockResults($this->client, [new Result()]);
        $s = fopen('s3://bucket/key', 'w');
        $this->assertEquals(4, fwrite($s, 'test'));
        $this->assertTrue(fclose($s));

        // Ensure that the stream was flushed and sent the upload
        $this->assertEquals(1, count($history));
        $cmd = $history->getLastCommand();
        $this->assertEquals('PutObject', $cmd->getName());
        $this->assertEquals('bucket', $cmd['Bucket']);
        $this->assertEquals('key', $cmd['Key']);
        $this->assertEquals('test', (string) $cmd['Body']);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage 403 Forbidden
     */
    public function testTriggersErrorInsteadOfExceptionWhenWriteFlushFails()
    {
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
            new Result(['Body' => Psr7\stream_for('test')]),
            new Result(['@metadata' => ['statusCode' => 204, 'effectiveUri' => 'http://foo.com']])
        ]);

        $s = fopen('s3://bucket/key', 'a');
        $this->assertEquals(4, ftell($s));
        $this->assertEquals(3, fwrite($s, 'ing'));
        $this->assertTrue(fclose($s));

        // Ensure that the stream was flushed and sent the upload
        $this->assertEquals(2, count($history));
        $entries = $history->toArray();
        $c1 = $entries[0]['command'];
        $this->assertEquals('GetObject', $c1->getName());
        $this->assertEquals('bucket', $c1['Bucket']);
        $this->assertEquals('key', $c1['Key']);
        $c2 = $entries[1]['command'];
        $this->assertEquals('PutObject', $c2->getName());
        $this->assertEquals('key', $c2['Key']);
        $this->assertEquals('testing', (string) $c2['Body']);
    }

    public function testCanOpenAppendStreamsWithMissingFile()
    {
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('err', $cmd); },
            new Result(['@metadata' => ['statusCode' => 204, 'effectiveUri' => 'http://foo.com']])
        ]);

        $s = fopen('s3://bucket/key', 'a');
        $this->assertEquals(0, ftell($s));
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
        $this->assertEquals(1, count($history));
        $entries = $history->toArray();
        $this->assertEquals('DELETE', $entries[0]['request']->getMethod());
        $this->assertEquals('/bucket/key', $entries[0]['request']->getUri()->getPath());
        $this->assertEquals('s3.amazonaws.com', $entries[0]['request']->getUri()->getHost());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage 403 Forbidden
     */
    public function testThrowsErrorsWhenUnlinkFails()
    {
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('403 Forbidden', $cmd); },
        ]);
        $this->assertFalse(unlink('s3://bucket/key'));
    }

    public function testCreatingBucketWithNoBucketReturnsFalse()
    {
        $this->assertFalse(mkdir('s3://'));
    }

    /**
     * @expectedExceptionMessage Bucket already exists: s3://already-existing-bucket
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testCreatingAlreadyExistingBucketRaisesError()
    {
        $this->addMockResults($this->client, [new Result()]);
        mkdir('s3://already-existing-bucket');
    }

    /**
     * @expectedExceptionMessage Subfolder already exists: s3://already-existing-bucket/key
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testCreatingAlreadyExistingBucketForKeyRaisesError()
    {
        $this->addMockResults($this->client, [new Result()]);
        mkdir('s3://already-existing-bucket/key');
    }

    public function testCreatingBucketsSetsAclBasedOnPermissions()
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

        $this->assertEquals(6, count($history));
        $entries = $history->toArray();

        $this->assertEquals('HEAD', $entries[0]['request']->getMethod());
        $this->assertEquals('HEAD', $entries[2]['request']->getMethod());
        $this->assertEquals('HEAD', $entries[4]['request']->getMethod());

        $this->assertEquals('PUT', $entries[1]['request']->getMethod());
        $this->assertEquals('/bucket', $entries[1]['request']->getUri()->getPath());
        $this->assertEquals('s3.amazonaws.com', $entries[1]['request']->getUri()->getHost());
        $this->assertEquals('public-read', (string) $entries[1]['request']->getHeaderLine('x-amz-acl'));
        $this->assertEquals('authenticated-read', (string) $entries[3]['request']->getHeaderLine('x-amz-acl'));
        $this->assertEquals('private', (string) $entries[5]['request']->getHeaderLine('x-amz-acl'));
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
        $this->assertEquals(2, count($history));
        $entries = $history->toArray();
        $this->assertEquals('HEAD', $entries[0]['request']->getMethod());
        $this->assertEquals('PUT', $entries[1]['request']->getMethod());
        $this->assertContains('public-read', $entries[1]['request']->getHeaderLine('x-amz-acl'));
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage specify a bucket
     */
    public function testCannotDeleteS3()
    {
        rmdir('s3://');
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage 403 Forbidden
     */
    public function testRmDirWithExceptionTriggersError()
    {
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
        $this->assertEquals(1, count($history));
        $entries = $history->toArray();
        $this->assertEquals('DELETE', $entries[0]['request']->getMethod());
        $this->assertEquals('/bucket', $entries[0]['request']->getUri()->getPath());
        $this->assertEquals('s3.amazonaws.com', $entries[0]['request']->getUri()->getHost());
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
        $this->assertEquals('GET', $entries[0]['request']->getMethod());
        $this->assertContains('prefix=object%2F', $entries[0]['request']->getUri()->getQuery());
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
        $this->assertEquals(2, count($history));
        $entries = $history->toArray();
        $this->assertEquals('GET', $entries[0]['request']->getMethod());
        $this->assertContains('prefix=bar%2F', $entries[0]['request']->getUri()->getQuery());
        $this->assertEquals('DELETE', $entries[1]['request']->getMethod());
        $this->assertEquals('/foo/bar/', $entries[1]['request']->getUri()->getPath());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage rename(): Cannot rename a file across wrapper types
     */
    public function testRenameEnsuresProtocolsMatch()
    {
        StreamWrapper::register($this->client, 'baz');
        rename('s3://foo/bar', 'baz://qux/quux');
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage The Amazon S3 stream wrapper only supports copying objects
     */
    public function testRenameEnsuresKeyIsSet()
    {
        rename('s3://foo/bar', 's3://baz');
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Forbidden
     */
    public function testRenameWithExceptionThrowsError()
    {
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
        $this->assertEquals(3, count($entries));
        $this->assertEquals('HEAD', $entries[0]['request']->getMethod());
        $this->assertEquals('/bucket/key', $entries[0]['request']->getUri()->getPath());
        $this->assertEquals('PUT', $entries[1]['request']->getMethod());
        $this->assertEquals('/other/new_key', $entries[1]['request']->getUri()->getPath());
        $this->assertEquals('s3.amazonaws.com', $entries[1]['request']->getUri()->getHost());
        $this->assertEquals(
            '/bucket/key',
            $entries[1]['request']->getHeaderLine('x-amz-copy-source')
        );
        $this->assertEquals(
            'COPY',
            $entries[1]['request']->getHeaderLine('x-amz-metadata-directive')
        );
        $this->assertEquals('DELETE', $entries[2]['request']->getMethod());
        $this->assertEquals('/bucket/key', $entries[2]['request']->getUri()->getPath());
        $this->assertEquals('s3.amazonaws.com', $entries[2]['request']->getUri()->getHost());
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
        $this->assertEquals(3, count($entries));
        $this->assertEquals('PUT', $entries[1]['request']->getMethod());
        $this->assertEquals('/other/new_key', $entries[1]['request']->getUri()->getPath());
        $this->assertEquals('s3.amazonaws.com', $entries[1]['request']->getUri()->getHost());
        $this->assertEquals(
            '/bucket/key',
            $entries[1]['request']->getHeaderLine('x-amz-copy-source')
        );
        $this->assertEquals(
            'REPLACE',
            $entries[1]['request']->getHeaderLine('x-amz-metadata-directive')
        );
    }

    public function testStatS3andBuckets()
    {
        clearstatcache('s3://');
        $stat = stat('s3://');
        $this->assertEquals(0040777, $stat['mode']);
        $this->addMockResults($this->client, [
            new Result() // 200
        ]);
        clearstatcache('s3://bucket');
        $stat = stat('s3://bucket');
        $this->assertEquals(0040777, $stat['mode']);
    }

    public function testStatDataIsClearedOnWrite()
    {
        $this->cache->set('s3://foo/bar', ['size' => 123, 7 => 123]);
        $this->assertEquals(123, filesize('s3://foo/bar'));
        $this->addMockResults($this->client, [
            new Result,
            new Result(['ContentLength' => 124])
        ]);
        file_put_contents('s3://foo/bar', 'baz!');
        $this->assertEquals(124, filesize('s3://foo/bar'));
    }

    public function testCanPullStatDataFromCache()
    {
        $this->cache->set('s3://foo/bar', ['size' => 123, 7 => 123]);
        $this->assertEquals(123, filesize('s3://foo/bar'));
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Forbidden
     */
    public function testFailingStatTriggersError()
    {
        // Sends one request for HeadObject, then another for ListObjects
        $this->addMockResults($this->client, [
            function ($cmd, $r) { return new S3Exception('403 Forbidden', $cmd); },
            function ($cmd, $r) { return new S3Exception('403 Forbidden', $cmd); }
        ]);
        clearstatcache('s3://bucket/key');
        stat('s3://bucket/key');
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage File or directory not found: s3://bucket
     */
    public function testBucketNotFoundTriggersError()
    {
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
        $this->assertEquals(0100777, $stat['mode']);
        $this->assertEquals(5, $stat['size']);
        $this->assertEquals($ts, $stat['mtime']);
        $this->assertEquals($ts, $stat['ctime']);
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
        $this->assertEquals(0040777, $stat['mode']);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage File or directory not found: s3://bucket/prefix
     */
    public function testCannotStatPrefixWithNoResults()
    {
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

        $this->assertEquals(count($queue), count($history));
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage cannot represent a stream of type user-space
     */
    public function testStreamCastIsNotPossible()
    {
        $this->addMockResults($this->client, [
            new Result(['Body' => Psr7\stream_for('')])
        ]);
        $r = fopen('s3://bucket/key', 'r');
        $read = [$r];
        $write = $except = null;
        stream_select($read, $write, $except, 0);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage No client in stream context
     */
    public function testEnsuresClientIsSet()
    {
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
        $this->assertFalse(file_exists('s3://bucket/key'));
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
                $this->assertEquals('bucket', $c['Bucket']);
                $this->assertEquals('/', $c['Delimiter']);
                $this->assertEquals('key/', $c['Prefix']);
            })
        );

        $dir = 's3://bucket/key/';
        $r = opendir($dir);
        $this->assertInternalType('resource', $r);

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
                $this->assertEquals('bucket', $c['Bucket']);
                $this->assertEquals('', $c['Delimiter']);
                $this->assertEquals('', $c['Prefix']);
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
        $this->assertEquals('e', $file1);
        $this->assertEquals(1, filesize('s3://bucket/key/' . $file1));
        $file2 = readdir($r);
        $this->assertEquals('f', $file2);
        $this->assertEquals(2, filesize('s3://bucket/key/' . $file2));
        closedir($r);
    }

    public function testReturnsStreamSizeFromHeaders()
    {
        $stream = Psr7\stream_for('12345');
        $stream = Psr7\FnStream::decorate($stream, [
            'getSize' => function () { return null; }
        ]);
        $result = [
            'Body' => $stream,
            'ContentLength' => 5
        ];
        $this->addMockResults($this->client, [$result]);
        $resource = fopen('s3://foo/bar', 'r');
        $this->assertEquals(5, fstat($resource)['size']);
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
        $this->assertEquals('bar', fread($s, 4));
    }
}
