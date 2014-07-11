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

use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Credentials\Credentials;
use Aws\S3\S3Client;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Url;
use Guzzle\Http\Message\Request;
use Guzzle\Plugin\History\HistoryPlugin;
use Guzzle\Plugin\Mock\MockPlugin;

/**
 * @covers Aws\S3\S3Client
 */
class S3ClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * Data provider for testing if a bucket name is valid
     *
     * @return array
     */
    public function bucketNameProvider()
    {
        return array(
            array('.bucket', false),
            array('bucket.', false),
            array('192.168.1.1', false),
            array('1.1.1.100', false),
            array('test@42!@$5_', false),
            array('ab', false),
            array('12', false),
            array('bucket_name', false),
            array('bucket-name', true),
            array('bucket', true),
            array('my.bucket.com', true),
            array('test-fooCaps', false),
            array('w-w', true),
            array('w------', false)
        );
    }

    /**
     * @covers Aws\S3\S3Client::isValidBucketName
     * @dataProvider bucketNameProvider
     */
    public function testValidatesBucketNames($bucketName, $isValid)
    {
        $this->assertEquals($isValid, s3Client::isValidBucketName($bucketName));
    }

    /**
     * @covers Aws\S3\S3Client::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = S3Client::factory(array(
            'scheme' => 'http',
            'region' => 'ap-southeast-1'
        ));
        $this->assertEquals('http://s3-ap-southeast-1.amazonaws.com', $client->getBaseUrl());
    }

    /**
     * @covers Aws\S3\S3Client::createPresignedUrl
     */
    public function testCreatesPresignedUrls()
    {
        $client = S3Client::factory(array(
            'region' => 'us-east-1',
            'key'    => 'foo',
            'secret' => 'bar'
        ));
        $request = $client->get('/foobar');
        $original = (string) $request;
        $url = $client->createPresignedUrl($request, 1342138769);
        $this->assertContains('https://s3.amazonaws.com/foobar?AWSAccessKeyId=', $url);
        $this->assertContains('Expires=', $url);
        $this->assertContains('Signature=', $url);
        $this->assertSame($original, (string) $request);
    }

    /**
     * @covers Aws\S3\S3Client::createPresignedUrl
     */
    public function testCreatesPresignedUrlsWithSpecialCharacters()
    {
        $client = S3Client::factory(array(
            'region' => 'us-east-1',
            'key'    => 'foo',
            'secret' => 'bar'
        ));
        $request = $client->get('/foobar test: abc/+%.a');
        $url = $client->createPresignedUrl($request, 1342138769);
        $this->assertContains('https://s3.amazonaws.com/foobar%20test%3A%20abc/%2B%25.a?AWSAccessKeyId=', $url);
    }

    public function testCreatesPresignedUrlsWithStrtotime()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3', true);
        $url = Url::factory($client->createPresignedUrl($client->get('/foobar'), '10 minutes'));
        $this->assertTrue(time() < $url->getQuery()->get('Expires'));
    }

    public function testCreatesPresignedUrlsWithDateTime()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3', true);
        $url = Url::factory($client->createPresignedUrl($client->get('/foobar'), new \DateTime('+10 minutes')));
        $this->assertTrue(time() < $url->getQuery()->get('Expires'));
    }

    public function testCreatesPresignedUrlsWithSessionToken()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3', true);
        $client->setCredentials(new Credentials('foo', 'bar', 'baz'));
        $url = Url::factory($client->createPresignedUrl($client->get('/foobar'), '10 minutes'));
        $this->assertEquals('baz', $url->getQuery()->get('x-amz-security-token'));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The request object must be associated with the client
     */
    public function testValidatesRequestObjectWhenCreatingPreSignedUrl()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $client->createPresignedUrl(new Request('GET', 'http://foo.com'), '+10 minutes');
    }

    public function testDoesBucketExistReturnsCorrectBooleanValue()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array(
            's3/head_success',
            's3/head_access_denied',
            's3/head_failure'
        ));

        $this->assertTrue($client->doesBucketExist('bucket'));
        $this->assertTrue($client->doesBucketExist('bucket'));
        $this->assertFalse($client->doesBucketExist('bucket'));
    }

    public function testDoesObjectExistReturnsCorrectBooleanValue()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array(
            's3/head_success',
            's3/head_access_denied',
            's3/head_failure'
        ));

        $this->assertTrue($client->doesObjectExist('bucket', 'key'));
        $this->assertFalse($client->doesObjectExist('bucket', 'key'));
        $this->assertFalse($client->doesObjectExist('bucket', 'key'));
    }

    public function testDoesBucketPolicyExistReturnsCorrectBooleanValue()
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array(
            's3/get_bucket_policy_success',
            's3/get_bucket_policy_failure'
        ));

        $this->assertTrue($client->doesBucketPolicyExist('bucket'));
        $this->assertFalse($client->doesBucketPolicyExist('bucket'));
    }

    public function testClearsBucketHelperAndUsesSubResources()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $mock = $this->setMockResponse($client, array(
            's3/get_bucket_object_versions_page_2',
            's3/delete_multiple_objects'
        ));
        $client->clearBucket('foo');
        $requests = $mock->getReceivedRequests();
        foreach ($requests as $request) {
            $this->assertEquals('foo.s3.amazonaws.com', $request->getHost());
        }
        $this->assertEquals(2, count($requests));
        $this->assertTrue($requests[0]->getQuery()->hasKey('versions'));
        $this->assertTrue($requests[1]->getQuery()->hasKey('delete'));
    }

    public function testProperlyEncodesPrefixKeys()
    {
        $this->assertEquals('/foo/baz%20/bar%21', S3Client::encodeKey('/foo/baz /bar!'));
        $client = $this->getServiceBuilder()->get('s3', true);
        $command = $client->getCommand('PutObject', array(
            'Key'    => 'foo/baz /bar!',
            'Bucket' => 'test',
            'Body'   => ''
        ));
        $command->prepare();
        $this->assertEquals('/foo/baz%20/bar%21', $command->getRequest()->getPath());
        $this->assertEquals('test.s3.amazonaws.com', $command->getRequest()->getHost());
    }

    public function testExplodesKeys()
    {
        $this->assertEquals(array('foo', 'baz ', 'bar!'), S3Client::explodeKey('foo/baz /bar!'));
        $this->assertEquals(array('foo', 'baz ', 'bar!'), S3Client::explodeKey('/foo/baz /bar!'));
        $this->assertEquals(array(''), S3Client::explodeKey(''));
        $this->assertEquals(array(''), S3Client::explodeKey(null));
    }

    public function dataForCanCreateObjectUrlsTest()
    {
        return array(
            array(null, array(), 'https://foo.s3.amazonaws.com/bar'),
            array('+1 hour', array(), '#^https\://foo\.s3\.amazonaws\.com/bar\?.*AWSAccessKeyId.*Expires.*Signature.*$#'),
            array(null, array('Scheme' => 'http'), 'http://foo.s3.amazonaws.com/bar'),
            array(null, array('Scheme' => 'ftp'), 'ftp://foo.s3.amazonaws.com/bar'),
            array(null, array('Scheme' => ''), '://foo.s3.amazonaws.com/bar'),
            array(null, array('Scheme' => null), '//foo.s3.amazonaws.com/bar'),
            array(null, array('ResponseContentType' => 'image/png'), 'https://foo.s3.amazonaws.com/bar?response-content-type=' . urlencode('image/png')),
        );
    }

    /**
     * @dataProvider dataForCanCreateObjectUrlsTest
     */
    public function testCanCreateObjectUrls($expires, array $args, $expectedUrl)
    {
        /** @var $client S3Client */
        $client = $this->getServiceBuilder()->get('s3', true);
        $actualUrl = $client->getObjectUrl('foo', 'bar', $expires, $args);
        if (strpos($expectedUrl, '#^') === 0) {
            $this->assertRegExp($expectedUrl, $actualUrl);
        } else {
            $this->assertEquals($expectedUrl, $actualUrl);
        }
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     */
    public function testDeletesMatchingObjectsEnsuresPrefixOrRegex()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $client->deleteMatchingObjects('foo', '', '');
    }

    public function testDeletesMatchingObjects()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $history = new HistoryPlugin();
        $client->addSubscriber($history);

        $this->setMockResponse($client, array(
            's3/list_objects_page_1',
            's3/list_objects_page_2',
            's3/list_objects_page_3',
            's3/list_objects_page_4',
            's3/list_objects_page_5',
            's3/delete_multiple_objects'
        ));

        $event = null;
        // Delete objects from the foo bucket under the baz key that are a single lowercase letter
        $result = $client->deleteMatchingObjects('foo', 'baz', '/(c|f)/', array(
            'before_delete' => function ($e) use (&$event) {
                $event = $e;
            }
        ));

        $this->assertEquals(2, $result);
        $this->assertEquals(6, count($history));
        $this->assertEquals('POST', $history->getLastRequest()->getMethod());
        $this->assertEquals('/?delete', $history->getLastRequest()->getResource());
        $this->assertContains('<Key>c</Key>', (string) $history->getLastRequest()->getBody());
        $this->assertContains('<Key>f</Key>', (string) $history->getLastRequest()->getBody());
        $this->assertNotContains('<Key>e</Key>', (string) $history->getLastRequest()->getBody());
        $this->assertInstanceOf('Guzzle\Common\Event', $event);
    }

    public function testUploadsSmallerObjectsUsingPutObject()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $mock = new MockPlugin(array(new Response(206)));
        $client->addSubscriber($mock);
        $history = new HistoryPlugin();
        $client->addSubscriber($history);
        $result = $client->upload('test', 'key', 'test', 'public-read', array(
            'params' => array(
                'Metadata' => array('Foo' => 'Bar')
            )
        ));
        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $result);
        $this->assertCount(1, $history);
        $request = $history->getLastRequest();
        $this->assertEquals('PUT', $request->getMethod());
        $this->assertEquals('/key', $request->getResource());
        $this->assertEquals('test.s3.amazonaws.com', $request->getHost());
        $this->assertEquals('public-read', (string) $request->getHeader('x-amz-acl'));
        $this->assertEquals('Bar', (string) $request->getHeader('x-amz-meta-Foo'));
        $this->assertEquals('test', (string) $request->getBody());
    }

    public function testUploadsLargerObjectsUsingMultipartUploads()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $this->setMockResponse($client, array(
            's3/initiate_multipart_upload',
            's3/upload_part',
            's3/upload_part',
            's3/complete_multipart_upload'
        ));
        $history = new HistoryPlugin();
        $client->addSubscriber($history);
        $result = $client->upload('test', 'key', fopen(__FILE__, 'r'), 'public-read', array(
            'min_part_size' => 4,
            'params'        => array('Metadata' => array('Foo' => 'Bar'))
        ));
        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $result);
        $this->assertCount(3, $history);
        $request = $history->getLastRequest();
        $this->assertEquals('POST', $request->getMethod());
        $this->assertStringStartsWith('/key?uploadId=', $request->getResource());
        $this->assertEquals('application/xml', $request->getHeader('Content-Type'));
        $this->assertContains('<PartNumber>1</PartNumber>', (string) $request->getBody());
    }

    public function testUploadsDirectories()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $history = new HistoryPlugin();
        $client->addSubscriber($history);
        $params = array('foo' => 'bar');

        $mockBuild = $this->getMockBuilder('Aws\S3\Sync\UploadSync')
            ->disableOriginalConstructor()
            ->setMethods(array('transfer'))
            ->getMock();

        $mockBuild->expects($this->once())
            ->method('transfer');

        $mock = $this->getMockBuilder('Aws\S3\Sync\UploadSyncBuilder')
            ->setMethods(array('uploadFromDirectory', 'setClient', 'setBucket', 'setKeyPrefix',
                'setConcurrency', 'setBaseDir', 'force', 'setOperationParams', 'enableDebugOutput',
                'setMultipartUploadSize', 'build'))
            ->getMock();

        $mock->expects($this->once())->method('uploadFromDirectory')->with('/path')->will($this->returnSelf());
        $mock->expects($this->once())->method('setClient')->with($client)->will($this->returnSelf());
        $mock->expects($this->once())->method('setBucket')->with('bucket')->will($this->returnSelf());
        $mock->expects($this->once())->method('setKeyPrefix')->with('prefix')->will($this->returnSelf());
        $mock->expects($this->once())->method('setBaseDir')->with('/path')->will($this->returnSelf());
        $mock->expects($this->once())->method('setConcurrency')->with(20)->will($this->returnSelf());
        $mock->expects($this->once())->method('setOperationParams')->with($params)->will($this->returnSelf());
        $mock->expects($this->once())->method('enableDebugOutput')->with(true)->will($this->returnSelf());
        $mock->expects($this->once())->method('force')->with(false)->will($this->returnSelf());
        $mock->expects($this->once())->method('build')->will($this->returnValue($mockBuild));
        $mock->expects($this->once())->method('setMultipartUploadSize')->with(10)->will($this->returnValue($mockBuild));

        $client->uploadDirectory('/path', 'bucket', 'prefix', array(
            'concurrency' => 20,
            'builder'     => $mock,
            'params'      => $params,
            'debug'       => true,
            'multipart_upload_size' => 10
        ));
    }

    public function testDownloadsBuckets()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $history = new HistoryPlugin();
        $client->addSubscriber($history);
        $params = array('foo' => 'bar');

        $mockBuild = $this->getMockBuilder('Aws\S3\Sync\DownloadSync')
            ->disableOriginalConstructor()
            ->setMethods(array('transfer'))
            ->getMock();

        $mockBuild->expects($this->once())
            ->method('transfer');

        $mock = $this->getMockBuilder('Aws\S3\Sync\DownloadSyncBuilder')
            ->setMethods(array('setDirectory', 'setClient', 'setBucket', 'setKeyPrefix', 'allowResumableDownloads',
                'setConcurrency', 'force', 'setOperationParams', 'enableDebugOutput', 'build'))
            ->getMock();

        $mock->expects($this->once())->method('setDirectory')->with('/path')->will($this->returnSelf());
        $mock->expects($this->once())->method('setClient')->with($client)->will($this->returnSelf());
        $mock->expects($this->once())->method('setBucket')->with('bucket')->will($this->returnSelf());
        $mock->expects($this->once())->method('setKeyPrefix')->with('prefix')->will($this->returnSelf());
        $mock->expects($this->once())->method('setConcurrency')->with(20)->will($this->returnSelf());
        $mock->expects($this->once())->method('setOperationParams')->with($params)->will($this->returnSelf());
        $mock->expects($this->once())->method('enableDebugOutput')->with(true)->will($this->returnSelf());
        $mock->expects($this->once())->method('force')->with(false)->will($this->returnSelf());
        $mock->expects($this->once())->method('allowResumableDownloads')->will($this->returnSelf());
        $mock->expects($this->once())->method('build')->will($this->returnValue($mockBuild));

        $client->downloadBucket('/path', 'bucket', 'prefix', array(
            'concurrency' => 20,
            'builder'     => $mock,
            'params'      => $params,
            'debug'       => true,
            'allow_resumable'   => true
        ));
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testEnsuresSigV4HasRegion()
    {
        $sig = $this->getMockBuilder('Aws\S3\S3SignatureV4')
            ->disableOriginalConstructor()
            ->getMock();
        $s3 = S3Client::factory(array(Options::SIGNATURE => $sig));
        $this->assertSame($sig, $s3->getSignature());
    }

    public function testCanForceS3Signature()
    {
        $sig = $this->getMockBuilder('Aws\S3\S3Signature')
            ->disableOriginalConstructor()
            ->getMock();
        $s3 = S3Client::factory(array(
            Options::SIGNATURE => $sig,
            Options::REGION => 'cn-north-1'
        ));
        $this->assertSame($sig, $s3->getSignature());
    }

    public function testCanForceS3SignatureUsingString()
    {
        $s3 = S3Client::factory(array(
            Options::SIGNATURE => 's3',
            Options::REGION => 'cn-north-1'
        ));
        $this->assertInstanceOf('Aws\S3\S3Signature', $s3->getSignature());
    }

    public function testCanForceSigV4Signature()
    {
        $sig = $this->getMockBuilder('Aws\S3\S3SignatureV4')
            ->disableOriginalConstructor()
            ->getMock();
        $s3 = S3Client::factory(array(
            Options::SIGNATURE => $sig,
            Options::REGION => 'us-east-1'
        ));
        $this->assertSame($sig, $s3->getSignature());
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage A region must be specified when using signature version 4
     */
    public function testEnsuresRegionIsSetWhenUsingV4()
    {
        $s3 = S3Client::factory(array(Options::SIGNATURE => 'v4'));
        $this->assertInstanceOf('Aws\S3\S3SignatureV4', $s3->getSignature());
    }

    public function testCanForceS3SignatureV4UsingString()
    {
        $s3 = S3Client::factory(array(Options::SIGNATURE => 'v4', 'region' => 'us-west-2'));
        $this->assertInstanceOf('Aws\S3\S3SignatureV4', $s3->getSignature());
    }

    public function testUsesSigV4SignatureInSpecificRegions()
    {
        $s3 = S3Client::factory(array(Options::REGION => 'cn-north-1'));
        $this->assertInstanceOf('Aws\S3\S3SignatureV4', $s3->getSignature());
    }
}
