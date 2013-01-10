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

namespace Aws\Tests\CloudFront;

use Aws\CloudFront\CloudFrontClient;
use Guzzle\Http\Url;

/**
 * @covers Aws\CloudFront\CloudFrontClient
 */
class CloudFrontClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryCreatesClient()
    {
        $client = CloudFrontClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));
        $this->assertInstanceOf('Aws\CloudFront\CloudFrontSignature', $client->getSignature());
    }

    public function testCreatesSignedUrlsForHttp()
    {
        $ts = time() + 1000;
        $client = $this->getServiceBuilder()->get('cloudfront');

        if ($client->getConfig('private_key') == 'change_me') {
            $this->markTestSkipped('CloudFront private_key not set');
        }

        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $url = $client->getSignedUrl(array(
            'url'     => 'http://abc.cloudfront.net/images/image.jpg?color=red',
            'expires' => $ts
        ));
        $urlObject = Url::factory($url);
        $kp = $client->getConfig('key_pair_id');
        $this->assertStringStartsWith(
            "http://abc.cloudfront.net/images/image.jpg?color=red&Expires={$ts}&Signature=",
            $url
        );
        $signature = $urlObject->getQuery('Signature');
        $this->assertNotContains('?', $signature);
        $this->assertNotContains('=', $signature);
        $this->assertNotContains('/', $signature);
        $this->assertNotContains('&', $signature);
        $this->assertNotContains('+', $signature);
    }

    public function testCreatesSignedUrlsForRtmp()
    {
        $ts = time() + 1000;
        $client = $this->getServiceBuilder()->get('cloudfront');
        if ($client->getConfig('private_key') == 'change_me') {
            $this->markTestSkipped('CloudFront private_key not set');
        }
        /** @var $client \Aws\CloudFront\CloudFrontClient */
        $url = $client->getSignedUrl(array(
            'url'     => 'rtmp://foo.cloudfront.net/test.mp4',
            'expires' => $ts
        ));
        $kp = $client->getConfig('key_pair_id');
        $this->assertStringStartsWith("test.mp4%3FExpires%3D{$ts}%26Signature%3D", $url);
        $this->assertContains("Key-Pair-Id%3D{$kp}", $url);
    }

    public function testCreatesCannedSignedUrlsForRtmpWhileStrippingFileExtension()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $m = new \ReflectionMethod($client, 'createCannedPolicy');
        $m->setAccessible(true);
        $ts = time() + 1000;
        // Try with no leading path
        $result = $m->invoke($client, 'rtmp', 'rtmp://foo.cloudfront.net/test.mp4', $ts);
        $this->assertEquals(
            '{"Statement":[{"Resource":"test","Condition":{"DateLessThan":{"AWS:EpochTime":' . $ts . '}}}]}',
            $result
        );
        $this->assertInternalType('array', json_decode($result, true));
        // Try with nested path
        $result = $m->invoke($client, 'rtmp', 'rtmp://foo.cloudfront.net/videos/test.mp4', $ts);
        $this->assertEquals(
            '{"Statement":[{"Resource":"videos/test","Condition":{"DateLessThan":{"AWS:EpochTime":' . $ts . '}}}]}',
            $result
        );
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage An expires option is required
     */
    public function testEnsuresExpiresIsSetWhenUsingCannedPolicy()
    {
        $client = $this->getServiceBuilder()->get('cloudfront');
        $url = $client->getSignedUrl(array('url' => 'http://abc.cloudfront.net/images/image.jpg?color=red'));
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage Invalid URI scheme
     */
    public function testEnsuresUriSchemeIsValid()
    {
        $this->getServiceBuilder()->get('cloudfront')->getSignedUrl(array(
            'url'     => 'foo://bar.com',
            'expires' => time() + 100
        ));
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage An Amazon CloudFront keypair ID
     */
    public function testEnsuresKeyPairsAreSet()
    {
        $client = $this->getServiceBuilder()->get('cloudfront', true);
        $client->getConfig()->remove('key_pair_id');
        $client->getSignedUrl(array('url' => 'foo://bar.com'));
    }
}
