<?php
namespace Aws\Test\S3;

use Aws\S3\S3Client;
use Aws\S3\StreamWrapper;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\NoSeekStream;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\History;
use GuzzleHttp\Command\Event\PreparedEvent;

/**
 * @covers Aws\S3\StreamWrapper
 */
class StreamWrapperTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /** @var S3Client */
    private $client;

    public function setUp()
    {
        $this->client = $this->getTestClient('s3', ['region' => 'us-east-1']);
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
        $this->addMockResponses($this->client, [new Response(200)]);
        fopen('s3://bucket/key', 'x');
    }

    public function testSuccessfulXMode()
    {
        $this->addMockResponses(
            $this->client,
            [new Response(404), new Response(200)]
        );
        $r = fopen('s3://bucket/key', 'x');
        fclose($r);
    }

    public function testOpensNonSeekableReadStream()
    {
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, 'foo');
        fseek($stream, 0);

        $this->addMockResponses($this->client, [
            new Response(200, [], new NoSeekStream(new Stream($stream)))
        ], false);

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

        $this->addMockResponses($this->client, [
            new Response(200, [], new NoSeekStream(new Stream($stream)))
        ], false);

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
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);
        $this->addMockResponses($this->client, [new Response(200)]);
        file_put_contents('s3://foo/bar.xml', 'test');
        $this->assertEquals(
            'application/xml',
            $history->getLastRequest()->getHeader('Content-Type')
        );
    }

    public function testCanOpenWriteOnlyStreams()
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);
        $this->addMockResponses($this->client, [new Response(204)]);
        $s = fopen('s3://bucket/key', 'w');
        $this->assertEquals(4, fwrite($s, 'test'));
        $this->assertTrue(fclose($s));

        // Ensure that the stream was flushed and sent the upload
        $request = $history->getLastRequest();
        $this->assertEquals(1, count($history));
        $this->assertEquals('PUT', $request->getMethod());
        $this->assertEquals('test', (string) $request->getBody());
        $this->assertEquals(4, (string) $request->getHeader('Content-Length'));
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage 403 Forbidden
     */
    public function testTriggersErrorInsteadOfExceptionWhenWriteFlushFails()
    {
        $this->addMockResponses($this->client, [new Response(403)]);
        $s = fopen('s3://bucket/key', 'w');
        fwrite($s, 'test');
        fclose($s);
    }

    public function testCanOpenAppendStreamsWithOriginalFile()
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);

        // Queue the 200 response that will load the original, and queue the
        // 204 flush response
        $this->addMockResponses($this->client, [
            new Response(200, [], Stream::factory('test')),
            new Response(204)
        ]);

        $s = fopen('s3://bucket/key', 'a');
        $this->assertEquals(4, ftell($s));
        $this->assertEquals(3, fwrite($s, 'ing'));
        $this->assertTrue(fclose($s));

        // Ensure that the stream was flushed and sent the upload
        $requests = $history->getRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals('GET', $requests[0]->getMethod());
        $this->assertEquals('/key', $requests[0]->getResource());
        $this->assertEquals('PUT', $requests[1]->getMethod());
        $this->assertEquals('/key', $requests[1]->getResource());
        $this->assertEquals('testing', (string) $requests[1]->getBody());
        $this->assertEquals(7, $requests[1]->getHeader('Content-Length'));
    }

    public function testCanOpenAppendStreamsWithMissingFile()
    {
        $this->addMockResponses($this->client, [
            new Response(404),
            new Response(204)
        ]);

        $s = fopen('s3://bucket/key', 'a');
        $this->assertEquals(0, ftell($s));
        $this->assertTrue(fclose($s));
    }

    public function testCanUnlinkFiles()
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);
        $this->addMockResponses($this->client, [new Response(204)]);
        $this->assertTrue(unlink('s3://bucket/key'));
        $requests = $history->getRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('DELETE', $requests[0]->getMethod());
        $this->assertEquals('/key', $requests[0]->getResource());
        $this->assertEquals('bucket.s3.amazonaws.com', $requests[0]->getHost());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage 403 Forbidden
     */
    public function testThrowsErrorsWhenUnlinkFails()
    {
        $this->addMockResponses($this->client, [new Response(403)]);
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
        $this->addMockResponses($this->client, [new Response(200)]);
        mkdir('s3://already-existing-bucket');
    }

    /**
     * @expectedExceptionMessage Subfolder already exists: s3://already-existing-bucket/key
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testCreatingAlreadyExistingBucketForKeyRaisesError()
    {
        $this->addMockResponses($this->client, [new Response(200)]);
        mkdir('s3://already-existing-bucket/key');
    }

    public function testCreatingBucketsSetsAclBasedOnPermissions()
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);

        $this->addMockResponses($this->client, [
            new Response(404), new Response(204), // mkdir #1
            new Response(404), new Response(204), // mkdir #2
            new Response(404), new Response(204), // mkdir #3
        ]);

        $this->assertTrue(mkdir('s3://bucket', 0777));
        $this->assertTrue(mkdir('s3://bucket', 0601));
        $this->assertTrue(mkdir('s3://bucket', 0500));

        $requests = $history->getRequests();
        $this->assertEquals(6, count($requests));

        $this->assertEquals('HEAD', $requests[0]->getMethod());
        $this->assertEquals('HEAD', $requests[2]->getMethod());
        $this->assertEquals('HEAD', $requests[4]->getMethod());

        $this->assertEquals('PUT', $requests[1]->getMethod());
        $this->assertEquals('/', $requests[1]->getResource());
        $this->assertEquals('bucket.s3.amazonaws.com', $requests[1]->getHost());
        $this->assertContains('public-read', (string) $requests[1]);
        $this->assertContains('authenticated-read', (string) $requests[3]);
        $this->assertContains('private', (string) $requests[5]);
    }

    public function testCreatesNestedSubfolder()
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);

        $this->addMockResponses($this->client, [
            new Response(404), new Response(204)
        ]);

        $this->assertTrue(mkdir('s3://bucket/key/', 0777));
        $requests = $history->getRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals('HEAD', $requests[0]->getMethod());
        $this->assertEquals('PUT', $requests[1]->getMethod());
        $this->assertContains('public-read', (string) $requests[1]);
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
        $this->addMockResponses($this->client, [new Response(403)]);
        rmdir('s3://bucket');
    }

    public function testCanDeleteBucketWithRmDir()
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);
        $this->addMockResponses($this->client, [new Response(204)]);
        $this->assertTrue(rmdir('s3://bucket'));
        $requests = $history->getRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('DELETE', $requests[0]->getMethod());
        $this->assertEquals('/', $requests[0]->getResource());
        $this->assertEquals('bucket.s3.amazonaws.com', $requests[0]->getHost());
    }

    public function rmdirProvider()
    {
        return array(
            array('s3://bucket/object/'),
            array('s3://bucket/object'),
        );
    }

    /**
     * @dataProvider rmdirProvider
     */
    public function testCanDeleteObjectWithRmDir($path)
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);
        $this->addMockResponses($this->client, [
            new Response(200),
            new Response(204)
        ]);
        $this->assertTrue(rmdir($path));
        $requests = $history->getRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('GET', $requests[0]->getMethod());
        $this->assertEquals('object/', $requests[0]->getQuery()['prefix']);
    }

    public function testCanDeleteNestedFolderWithRmDir()
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);
        $xml = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Name>foo</Name>
    <Delimiter>/</Delimiter>
    <IsTruncated>false</IsTruncated>
    <Contents>
        <Key>bar/</Key>
    </Contents>
</ListBucketResult>
EOT;
        $this->addMockResponses($this->client, [
            new Response(200, [], Stream::factory($xml)),
            new Response(204)
        ]);
        $this->assertTrue(rmdir('s3://foo/bar'));
        $requests = $history->getRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals('GET', $requests[0]->getMethod());
        $this->assertEquals('bar/', $requests[0]->getQuery()['prefix']);
        $this->assertEquals('DELETE', $requests[1]->getMethod());
        $this->assertEquals('/bar/', $requests[1]->getPath());
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
        $this->addMockResponses($this->client, [new Response(403)]);
        rename('s3://foo/bar', 's3://baz/bar');
    }

    public function testCanRenameObjects()
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);
        $this->addMockResponses($this->client, [
            new Response(204),
            new Response(204)
        ]);
        $this->assertTrue(rename('s3://bucket/key', 's3://other/new_key'));
        $requests = $history->getRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals('PUT', $requests[0]->getMethod());
        $this->assertEquals('/new_key', $requests[0]->getResource());
        $this->assertEquals('other.s3.amazonaws.com', $requests[0]->getHost());
        $this->assertEquals(
            '/bucket/key',
            $requests[0]->getHeader('x-amz-copy-source')
        );
        $this->assertEquals(
            'COPY',
            $requests[0]->getHeader('x-amz-metadata-directive')
        );
        $this->assertEquals('DELETE', $requests[1]->getMethod());
        $this->assertEquals('/key', $requests[1]->getResource());
        $this->assertEquals('bucket.s3.amazonaws.com', $requests[1]->getHost());
    }

    public function testCanRenameObjectsWithCustomSettings()
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);
        $this->addMockResponses($this->client, [
            new Response(204),
            new Response(204)
        ]);
        $this->assertTrue(rename(
            's3://bucket/key',
            's3://other/new_key',
            stream_context_create(['s3' => ['MetadataDirective' => 'REPLACE']])
        ));
        $requests = $history->getRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals('PUT', $requests[0]->getMethod());
        $this->assertEquals('/new_key', $requests[0]->getResource());
        $this->assertEquals('other.s3.amazonaws.com', $requests[0]->getHost());
        $this->assertEquals(
            '/bucket/key',
            $requests[0]->getHeader('x-amz-copy-source')
        );
        $this->assertEquals(
            'REPLACE',
            $requests[0]->getHeader('x-amz-metadata-directive')
        );
    }

    public function testStatS3andBuckets()
    {
        clearstatcache('s3://');
        $stat = stat('s3://');
        $this->assertEquals(0040777, $stat['mode']);
        $this->addMockResponses($this->client, [new Response(200)]);
        clearstatcache('s3://bucket');
        $stat = stat('s3://bucket');
        $this->assertEquals(0040777, $stat['mode']);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Forbidden
     */
    public function testFailingStatTriggersError()
    {
        // Sends one request for HeadObject, then another for ListObjects
        $this->addMockResponses(
            $this->client,
            [new Response(403), new Response(403)]
        );
        clearstatcache('s3://bucket/key');
        stat('s3://bucket/key');
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage File or directory not found: s3://bucket
     */
    public function testBucketNotFoundTriggersError()
    {
        $this->addMockResponses($this->client, [new Response(404)]);
        clearstatcache('s3://bucket');
        stat('s3://bucket');
    }

    public function testStatsRegularObjects()
    {
        $ts = strtotime('Tuesday, April 9 2013');
        $this->addMockResponses($this->client, [
            new Response(200, [
                'Content-Length' => 5,
                'Last-Modified'  => gmdate('r', $ts)
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
        $xml = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Name>bucket-1</Name>
    <Prefix></Prefix>
    <Marker></Marker>
    <MaxKeys></MaxKeys>
    <Delimiter>/</Delimiter>
    <IsTruncated>false</IsTruncated>
    <CommonPrefixes>
        <Prefix>g/</Prefix>
    </CommonPrefixes>
</ListBucketResult>
EOT;
        $this->addMockResponses($this->client, [
            new Response(404),
            new Response(200, [], Stream::factory($xml))
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
        $this->addMockResponses($this->client, [
            new Response(404),
            new Response(200)
        ]);
        clearstatcache('s3://bucket/prefix');
        stat('s3://bucket/prefix');
    }

    public function fileTypeProvider()
    {
        $none = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <IsTruncated>false</IsTruncated>
</ListBucketResult>
EOT;

        $hasKeys = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<ListBucketResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
    <Name>bucket-1</Name>
    <Prefix></Prefix>
    <Marker></Marker>
    <MaxKeys></MaxKeys>
    <Delimiter>/</Delimiter>
    <IsTruncated>true</IsTruncated>
    <Contents>
        <Key>e</Key>
    </Contents>
</ListBucketResult>
EOT;

        return [
            ['s3://', [], 'dir'],
            ['s3://t123', [new Response(200)], 'dir'],
            ['s3://t123/', [new Response(200)], 'dir'],
            ['s3://t123', [new Response(404)], 'error'],
            ['s3://t123/', [new Response(404)], 'error'],
            ['s3://t123/abc', [new Response(200)], 'file'],
            ['s3://t123/abc/', [new Response(200)], 'dir'],
            // Contains several keys, so this is a key prefix (directory)
            ['s3://t123/abc/', [
                new Response(404),
                new Response(200, [], Stream::factory($hasKeys))
            ], 'dir'],
            // No valid keys were found in the list objects call, so it's not
            // a file, directory, or key prefix.
            ['s3://t123/abc/', [
                new Response(404),
                new Response(200, [], Stream::factory($none))
            ], 'error'],
        ];
    }

    /**
     * @dataProvider fileTypeProvider
     */
    public function testDeterminesIfFileOrDir($uri, $responses, $result)
    {
        $history = new History();
        $this->client->getHttpClient()->getEmitter()->attach($history);

        if ($responses) {
            $this->addMockResponses($this->client, $responses);
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

        $this->assertEquals(
            count($responses),
            count($history)
        );
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage cannot represent a stream of type user-space
     */
    public function testStreamCastIsNotPossible()
    {
        $this->addMockResponses($this->client, [
            new Response(200, [], Stream::factory(''))
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
        $this->addMockResponses($this->client, [new Response(404)]);
        $this->assertFalse(is_link('s3://bucket/key'));
    }

    public function testDoesNotErrorOnFileExists()
    {
        $this->addMockResponses($this->client, [new Response(404)]);
        $this->assertFalse(file_exists('s3://bucket/key'));
    }

    public function testProvidesDirectoriesForS3()
    {
        $results = [
            [
                'IsTruncated' => true,
                'NextMarker'  => 'b/',
                'Delimiter'   => '/',
                'Name'        => 'bucket',
                'Prefix'      => '',
                'MaxKeys'     => 1000,
                'CommonPrefixes' => [['Prefix' => 'a/'], ['Prefix' => 'b/']]
            ],
            [
                'IsTruncated' => true,
                'Marker'      => '',
                'Delimiter'   => '/',
                'Contents'    => [['Key' => 'c']],
                'Name'        => 'bucket',
                'Prefix'      => '',
                'MaxKeys'     => 1000,
                'CommonPrefixes' => [['Prefix' => 'd/']]
            ],
            [
                'IsTruncated' => true,
                'Marker'      => '',
                'Delimiter'   => '/',
                'Contents'    => [['Key' => 'e'], ['Key' => 'f']],
                'Name'        => 'bucket',
                'Prefix'      => '',
                'MaxKeys'     => 1000
            ],
            [
                'IsTruncated' => true,
                'Marker'      => '',
                'Delimiter'   => '/',
                'Name'        => 'bucket',
                'Prefix'      => '',
                'NextMarker'  => 'DUMMY',
                'MaxKeys'     => 1000
            ],
            [
                'IsTruncated' => false,
                'Delimiter'   => '/',
                'Name'        => 'bucket',
                'NextMarker'  => 'DUMMY',
                'MaxKeys'     => 1000,
                'CommonPrefixes' => [['Prefix' => 'g/']]
            ]
        ];

        $this->addMockResults($this->client, array_merge($results, $results));

        $this->client->getEmitter()->on('prepared', function (PreparedEvent $e) {
            $c = $e->getCommand();
            $this->assertEquals('bucket', $c['Bucket']);
            $this->assertEquals('/', $c['Delimiter']);
            $this->assertEquals('key/', $c['Prefix']);
        });

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

        closedir($r);
    }

    public function testCanSetDelimiterStreamContext()
    {
        $this->client->getEmitter()->on('prepared', function (PreparedEvent $e) {
            $c = $e->getCommand();
            $this->assertEquals('bucket', $c['Bucket']);
            $this->assertEquals('', $c['Delimiter']);
            $this->assertEquals('', $c['Prefix']);
        });

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

        $context = stream_context_create(['s3' => ['delimiter' => '']]);
        $r = opendir('s3://bucket', $context);
        closedir($r);
    }
}
