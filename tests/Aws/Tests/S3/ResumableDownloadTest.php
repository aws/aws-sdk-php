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

use Aws\S3\ResumableDownload;
use Guzzle\Http\Message\Response;
use Guzzle\Http\EntityBody;
use Guzzle\Plugin\Mock\MockPlugin;

/**
 * @covers Aws\S3\ResumableDownload
 */
class ResumableDownloadTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \PHPUnit_Framework_Error_Warning
     */
    public function testEnsuresFilesCanBeOpened()
    {
        $client = $this->getServiceBuilder()->get('s3');
        new ResumableDownload($client, 'test', 'key', '/does/not/exist/foo');
    }

    public function testDownloadsUsingRangeRequests()
    {
        $client = $this->getServiceBuilder()->get('s3', true);
        $mock = new MockPlugin(array(new Response(200, array('Content-Length' => 9)), new Response(200, array('Content-Length' => 5), '_test')));
        $client->addSubscriber($mock);
        $target = EntityBody::factory('test');
        $target->seek(0, SEEK_END);
        $resumable = new ResumableDownload($client, 'test', 'key', $target);
        $resumable();

        $mocked = $mock->getReceivedRequests();
        $this->assertCount(2, $mocked);
        $this->assertEquals('HEAD', $mocked[0]->getMethod());
        $this->assertEquals('GET', $mocked[1]->getMethod());
        $this->assertEquals('bytes=4-8', (string) $mocked[1]->getHeader('Range'));
    }

    /**
     * @expectedException \Aws\Common\Exception\UnexpectedValueException
     * @expectedExceptionMessage Message integrity check failed. Expected 5032561e973f16047f3109e6a3f7f173 but got 4ba36d23a78c7393b4900ef38019d8ff
     */
    public function testEnsuresMd5Match()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $mock = new MockPlugin(array(
            new Response(200, array(
                'Content-Length' => 15,
                'Content-MD5'    => '5032561e973f16047f3109e6a3f7f173'
            )),
            new Response(200, array('Content-Length' => 1), '1')
        ));
        $client->addSubscriber($mock);
        $target = EntityBody::factory('11111111111111');
        $target->seek(0, SEEK_END);
        $resumable = new ResumableDownload($client, 'test', 'key', $target);
        $resumable();
    }
}
