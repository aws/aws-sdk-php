<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\S3;

use Aws\S3\S3Client;
use Aws\S3\StreamWrapper;
use Guzzle\Http\Message\Response;
use Guzzle\Http\EntityBody;

/**
 * @covers Aws\S3\StreamWrapper
 */
class StreamWrapperTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @var S3Client
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('s3', true);
        StreamWrapper::register($this->client);
    }

    public function tearDown()
    {
        stream_wrapper_unregister('s3');
    }

    public function testRegistersStreamWrapper()
    {
        StreamWrapper::register($this->client);
        $this->assertContains('s3', stream_get_wrappers());
        // Ensure no error is thrown for registering twice
        StreamWrapper::register($this->client);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Cannot open a bucket
     */
    public function testCannotOpenBuckets()
    {
        fopen('s3://bucket', 'r');
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage simultaneous reading and writing
     */
    public function testCannotReadWriteStreams()
    {
        fopen('s3://bucket/key', 'r+');
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Mode not supported
     */
    public function testSupportsOnlyReadWriteXA()
    {
        fopen('s3://bucket/key', 'c');
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage s3://bucket/key already exists on Amazon S3
     */
    public function testValidatesXMode()
    {
        $this->setMockResponse($this->client, array(new Response(200)));
        fopen('s3://bucket/key', 'x');
    }

    public function testSuccessfulXMode()
    {
        $this->setMockResponse($this->client, array(new Response(404), new Response(200)));
        $r = fopen('s3://bucket/key', 'x');
        fclose($r);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage The Amazon S3 stream wrapper does not allow simultaneous reading and writing.
     */
    public function testCanThrowExceptionsInsteadOfErrors()
    {
        fopen('s3://bucket/key', 'r+', false, stream_context_create(array(
            's3' => array('throw_exceptions' => true)
        )));
    }

    public function testOpensNonSeekableReadStream()
    {
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, 'testing 123');
        fseek($stream, 0);

        $mock = $this->getMockBuilder('Guzzle\Http\EntityBody')
            ->setConstructorArgs(array($stream))
            ->setMethods(array('seek'))
            ->getMock();

        $mock->expects($this->any())
            ->method('seek')
            ->will($this->returnValue(false));

        $f = $this->getMockBuilder('Guzzle\Stream\PhpStreamRequestFactory')
            ->setMethods(array('createStream'))
            ->getMock();
        $f->expects($this->once())
            ->method('createStream')
            ->will($this->returnValue($mock));

        $s = fopen('s3://bucket/ket', 'r', false, stream_context_create(array(
            's3' => array('stream_factory' => $f)
        )));

        $this->assertEquals(0, ftell($s));
        $this->assertFalse(feof($s));
        $this->assertEquals('test', fread($s, 4));
        $this->assertEquals(4, ftell($s));
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

        $mock = $this->getMockBuilder('Guzzle\Http\EntityBody')
            ->setConstructorArgs(array($stream))
            ->setMethods(array('seek'))
            ->getMock();

        $mock->expects($this->any())
            ->method('seek')
            ->will($this->returnValue(false));

        $f = $this->getMockBuilder('Guzzle\Stream\PhpStreamRequestFactory')
            ->setMethods(array('createStream'))
            ->getMock();
        $f->expects($this->once())
            ->method('createStream')
            ->will($this->returnValue($mock));

        $s = fopen('s3://bucket/ket', 'r', false, stream_context_create(array(
            's3' => array('stream_factory' => $f, 'seekable' => true)
        )));

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
        $this->setMockResponse($this->client, array(new Response(200)));
        file_put_contents('s3://foo/bar.txt', 'test');
        $requests = $this->getMockedRequests();
        $this->assertEquals('text/plain', $requests[0]->getHeader('Content-Type'));
    }

    public function testCanOpenWriteOnlyStreams()
    {
        $this->setMockResponse($this->client, array(new Response(204)));

        $s = fopen('s3://bucket/key', 'w');
        $this->assertEquals(4, fwrite($s, 'test'));
        $this->assertTrue(fclose($s));

        // Ensure that the stream was flushed and sent the upload
        $requests = $this->getMockedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('PUT', $requests[0]->getMethod());
        $this->assertEquals('test', (string) $requests[0]->getBody());
        $this->assertEquals(4, (string) $requests[0]->getHeader('Content-Length'));
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage 403 Forbidden
     */
    public function testTriggersErrorInsteadOfExceptionWhenWriteFlushFails()
    {
        $this->setMockResponse($this->client, array(new Response(403)));
        $s = fopen('s3://bucket/key', 'w');
        fwrite($s, 'test');
        fclose($s);
    }

    public function testCanOpenAppendStreamsWithOriginalFile()
    {
        // Queue the 200 response that will load the original, and queue the 204 flush response
        $this->setMockResponse($this->client, array(
            new Response(200, null, 'test'),
            new Response(204)
        ));

        $s = fopen('s3://bucket/key', 'a');
        $this->assertEquals(4, ftell($s));
        $this->assertEquals(3, fwrite($s, 'ing'));
        $this->assertTrue(fclose($s));

        // Ensure that the stream was flushed and sent the upload
        $requests = $this->getMockedRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals('GET', $requests[0]->getMethod());
        $this->assertEquals('/key', $requests[0]->getResource());
        $this->assertEquals('PUT', $requests[1]->getMethod());
        $this->assertEquals('/key', $requests[1]->getResource());
        $this->assertEquals('testing', (string) $requests[1]->getBody());
        $this->assertEquals(7, (string) $requests[1]->getHeader('Content-Length'));
    }

    public function testCanOpenAppendStreamsWithMissingFile()
    {
        $this->setMockResponse($this->client, array(
            new Response(404),
            new Response(204)
        ));

        $s = fopen('s3://bucket/key', 'a');
        $this->assertEquals(0, ftell($s));
        $this->assertTrue(fclose($s));
    }

    public function testCanUnlinkFiles()
    {
        $this->setMockResponse($this->client, array(new Response(204)));
        $this->assertTrue(unlink('s3://bucket/key'));
        $requests = $this->getMockedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('DELETE', $requests[0]->getMethod());
        $this->assertEquals('/key', $requests[0]->getResource());
        $this->assertEquals('bucket.s3.amazonaws.com', $requests[0]->getHost());
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage 403 Forbidden
     */
    public function testThrowsErrorsWhenUnlinkFails()
    {
        $this->setMockResponse($this->client, array(new Response(403)));
        $this->assertFalse(unlink('s3://bucket/key'));
    }

    public function testCreatingBucketWithNoBucketReturnsFalse()
    {
        $this->assertFalse(mkdir('s3://'));
    }

    /**
     * @expectedExceptionMessage Directory already exists: s3://already-existing-bucket
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testCreatingAlreadyExistingBucketRaisesError()
    {
        $this->setMockResponse($this->client, new Response(200));
        mkdir('s3://already-existing-bucket');
    }

    /**
     * @expectedExceptionMessage Directory already exists: s3://already-existing-bucket/key
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testCreatingAlreadyExistingBucketForKeyRaisesError()
    {
        $this->setMockResponse($this->client, array(
            new Response(200),        // HEAD object response
        ));
        mkdir('s3://already-existing-bucket/key');
    }

    public function testCreatingBucketWithKeyReturnsTrue()
    {
        $this->setMockResponse($this->client, array(
            new Response(404), // headObject
            new Response(200)  // putObject
        ));
        $this->assertTrue(mkdir('s3://foo/bar'));
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage 403 Forbidden
     */
    public function testCreatingBucketWithExceptionRaisesError()
    {
        $this->setMockResponse($this->client, array(
            new Response(404),
            new Response(403))
        );
        mkdir('s3://bucket');
    }

    public function testCreatingBucketsSetsAclBasedOnPermissions()
    {
        $this->setMockResponse($this->client, array(
            new Response(404), new Response(204), // mkdir #1
            new Response(404), new Response(204), // mkdir #2
            new Response(404), new Response(204), // mkdir #3
        ));
        $this->assertTrue(mkdir('s3://bucket', 0777));
        $this->assertTrue(mkdir('s3://bucket', 0601));
        $this->assertTrue(mkdir('s3://bucket', 0500));
        $requests = $this->getMockedRequests();
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

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Please specify a bucket
     */
    public function testCannotDeleteS3()
    {
        rmdir('s3://');
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage 403 Forbidden
     */
    public function testRmDirWithExceptionTriggersError()
    {
        $this->setMockResponse($this->client, array(new Response(403)));
        rmdir('s3://bucket');
    }

    public function testCanDeleteBucketWithRmDir()
    {
        $this->setMockResponse($this->client, array(new Response(204)));
        $this->assertTrue(rmdir('s3://bucket'));
        $requests = $this->getMockedRequests();
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
        $this->setMockResponse($this->client, array(new Response(200), new Response(204)));
        $this->assertTrue(rmdir($path));
        $requests = $this->getMockedRequests();
        $this->assertEquals(1, count($requests));
        $this->assertEquals('GET', $requests[0]->getMethod());
        $this->assertEquals('object/', $requests[0]->getQuery()->get('prefix'));
    }

    public function testCanDeleteNestedFolderWithRmDir()
    {
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
        $this->setMockResponse(
            $this->client,
            array(new Response(200, array(), $xml), new Response(204))
        );
        $this->assertTrue(rmdir('s3://foo/bar'));
        $requests = $this->getMockedRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals('GET', $requests[0]->getMethod());
        $this->assertEquals('bar/', $requests[0]->getQuery()->get('prefix'));
        $this->assertEquals('DELETE', $requests[1]->getMethod());
        $this->assertEquals('/bar/', $requests[1]->getPath());
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage The Amazon S3 stream wrapper only supports copying objects
     */
    public function testRenameEnsuresKeyIsSet()
    {
        rename('s3://foo/bar', 's3://baz');
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Forbidden
     */
    public function testRenameWithExceptionThrowsError()
    {
        $this->setMockResponse($this->client, array(new Response(403)));
        rename('s3://foo/bar', 's3://baz/bar');
    }

    public function testCanRenameObjects()
    {
        $this->setMockResponse($this->client, array(new Response(204), new Response(204)));
        $this->assertTrue(rename('s3://bucket/key', 's3://other/new_key'));
        $requests = $this->getMockedRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals('PUT', $requests[0]->getMethod());
        $this->assertEquals('/new_key', $requests[0]->getResource());
        $this->assertEquals('other.s3.amazonaws.com', $requests[0]->getHost());
        $this->assertEquals('/bucket/key', (string) $requests[0]->getHeader('x-amz-copy-source'));
        $this->assertEquals('COPY', (string) $requests[0]->getHeader('x-amz-metadata-directive'));
        $this->assertEquals('DELETE', $requests[1]->getMethod());
        $this->assertEquals('/key', $requests[1]->getResource());
        $this->assertEquals('bucket.s3.amazonaws.com', $requests[1]->getHost());
    }

    public function testCanRenameObjectsWithCustomSettings()
    {
        $this->setMockResponse($this->client, array(new Response(204), new Response(204)));
        $this->assertTrue(rename('s3://bucket/key', 's3://other/new_key', stream_context_create(array(
            's3' => array('MetadataDirective' => 'REPLACE')
        ))));
        $requests = $this->getMockedRequests();
        $this->assertEquals(2, count($requests));
        $this->assertEquals('PUT', $requests[0]->getMethod());
        $this->assertEquals('/new_key', $requests[0]->getResource());
        $this->assertEquals('other.s3.amazonaws.com', $requests[0]->getHost());
        $this->assertEquals('/bucket/key', (string) $requests[0]->getHeader('x-amz-copy-source'));
        $this->assertEquals('REPLACE', (string) $requests[0]->getHeader('x-amz-metadata-directive'));
    }

    public function testProvidesDirectoriesForS3()
    {
        $this->setMockResponse($this->client, array(
            's3/list_objects_page_1',
            's3/list_objects_page_2',
            's3/list_objects_page_3',
            's3/list_objects_page_4',
            's3/list_objects_page_5',
            's3/list_objects_page_1',
            's3/list_objects_page_2',
            's3/list_objects_page_3',
            's3/list_objects_page_4',
            's3/list_objects_page_5'
        ));

        $c = null;
        $this->client->getEventDispatcher()->addListener('client.command.create', function ($e) use (&$c) {
            $c = $e['command'];
        });

        $dir = 's3://bucket/key/';
        $r = opendir($dir);
        $this->assertInternalType('resource', $r);

        // Ensure that the command was created correctly
        $this->assertEquals('bucket', $c['Bucket']);
        $this->assertEquals('/', $c['Delimiter']);
        $this->assertEquals('key/', $c['Prefix']);

        $files = array();
        while (($file = readdir($r)) !== false) {
            $files[] = $file;
        }

        // This is the order that the mock responses should provide
        $expected = array('a', 'b', 'c', 'd', 'e', 'f', 'g');

        $this->assertEquals($expected, $files);
        $this->assertEquals(5, count($this->getMockedRequests()));

        rewinddir($r);
        $files = array();
        while (($file = readdir($r)) !== false) {
            $files[] = $file;
        }
        $this->assertEquals($expected, $files);
        $this->assertEquals(10, count($this->getMockedRequests()));

        closedir($r);
    }

    public function testCanSetDelimiterStreamContext()
    {
        $this->setMockResponse($this->client, array('s3/list_objects_page_5'));

        $c = null;
        $this->client->getEventDispatcher()->addListener('client.command.create', function ($e) use (&$c) {
            $c = $e['command'];
        });

        $dir = 's3://bucket';
        $r = opendir($dir, stream_context_create(array('s3' => array('delimiter' => ''))));

        $this->assertEquals('bucket', $c['Bucket']);
        $this->assertEquals('', $c['Delimiter']);
        $this->assertEquals('', $c['Prefix']);

        closedir($r);
    }

    public function testStatS3andBuckets()
    {
        clearstatcache('s3://');
        $stat = stat('s3://');
        $this->assertEquals(0040777, $stat['mode']);

        $this->setMockResponse($this->client, array(new Response(200)));
        clearstatcache('s3://bucket');
        $stat = stat('s3://bucket');
        $this->assertEquals(0040777, $stat['mode']);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage Forbidden
     */
    public function testFailingStatTriggersError()
    {
        $this->setMockResponse($this->client, array(new Response(403)));
        clearstatcache('s3://bucket/key');
        stat('s3://bucket/key');
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage File or directory not found: s3://bucket
     */
    public function testBucketNotFoundTriggersError()
    {
        $this->setMockResponse($this->client, array(new Response(404)));
        $this->setMockResponse($this->client, array(new Response(404)));
        clearstatcache('s3://bucket');
        stat('s3://bucket');
    }

    public function testStatsRegularObjects()
    {
        $ts = strtotime('Tuesday, April 9 2013');
        $this->setMockResponse($this->client, array(new Response(200, array(
            'Content-Length' => 5,
            'Last-Modified'  => gmdate('r', $ts)
        ))));
        clearstatcache('s3://bucket/key');
        $stat = stat('s3://bucket/key');
        $this->assertEquals(0100777, $stat['mode']);
        $this->assertEquals(5, $stat['size']);
        $this->assertEquals($ts, $stat['mtime']);
        $this->assertEquals($ts, $stat['ctime']);
    }

    public function testCanStatPrefix()
    {
        $this->setMockResponse($this->client, array('s3/head_failure', 's3/list_objects_page_5'));
        clearstatcache('s3://bucket/prefix');
        $stat = stat('s3://bucket/prefix');
        $this->assertEquals(0040777, $stat['mode']);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedExceptionMessage File or directory not found: s3://bucket/prefix
     */
    public function testCannotStatPrefixWithNoResults()
    {
        $this->setMockResponse($this->client, array('s3/head_failure', 's3/head_success'));
        clearstatcache('s3://bucket/prefix');
        stat('s3://bucket/prefix');
    }

    public function fileTypeProvider()
    {
        return array(
            array('s3://', array(), 'dir'),
            array('s3://t123', array(new Response(200)), 'dir'),
            array('s3://t123/', array(new Response(200)), 'dir'),
            array('s3://t123', array(new Response(404)), 'error'),
            array('s3://t123/', array(new Response(404)), 'error'),
            array('s3://t123/abc', array(new Response(200)), 'file'),
            array('s3://t123/abc/', array(new Response(200)), 'dir'),
            // "s3/list_objects_page_3" contains several keys, so this is a key
            // prefix which means it is a directory
            array('s3://t123/abc/', array(
                new Response(404),
                $this->getMockResponse('s3/list_objects_page_3')
            ), 'dir'),
            // No valid keys were found in the list objects call, so it's not
            // a file, directory, or key prefix.
            array('s3://t123/abc/', array(
                new Response(404),
                $this->getMockResponse('s3/list_objects_page_4')
            ), 'error'),
        );
    }

    /**
     * @dataProvider fileTypeProvider
     */
    public function testDeterminesIfFileOrDir($uri, $responses, $result)
    {
        if ($responses) {
            $this->setMockResponse($this->client, $responses);
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

        $this->assertEquals(count($responses), count($this->getMockedRequests()));
    }
}
