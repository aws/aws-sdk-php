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

namespace Aws\Tests\Common\Region;

use Aws\Common\Region\Endpoint;
use Aws\Common\Region\Service;
use Aws\Common\Region\Region;

/**
 * @covers Aws\Common\Region\Endpoint
 */
class EndpointTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @var Endpoint
     */
    protected $endpoint;

    /**
     * @var Region
     */
    protected $region;

    /**
     * @var Service
     */
    protected $service;

    public function setUp()
    {
        $this->service = new Service('s3', 'Amazon Simple Storage Service');
        $this->region = new Region('us-west-1');
        $this->endpoint = new Endpoint('us-west-1.s3.amazonaws.com', $this->region, $this->service);
    }

    public function testHasGettersAndSetters()
    {
        $this->assertSame($this->region, $this->endpoint->getRegion());
        $this->assertSame($this->service, $this->endpoint->getService());
        $this->assertEquals('us-west-1.s3.amazonaws.com', $this->endpoint->getHost());
    }

    public function testChecksIfSchemeIsAvailable()
    {
        $this->assertFalse($this->endpoint->supportsScheme('smtp'));
        $this->assertTrue($this->endpoint->supportsScheme('http'));
        $this->assertTrue($this->endpoint->supportsScheme('https'));
    }

    public function testCreatesBaseUrl()
    {
        $this->assertEquals('http://us-west-1.s3.amazonaws.com', $this->endpoint->getBaseUrl('http'));
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage The us-west-1 region of s3 does not support the smtp URI scheme
     */
    public function testValidatesSchemeIsSupportedWhenCreatingBaseUrl()
    {
        $this->endpoint->getBaseUrl('smtp');
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage No URI scheme was provided
     */
    public function testEnsuresSchemeIsSetWhenGettingBaseUrl()
    {
        $this->endpoint->getBaseUrl('');
    }

    public function testSerializesEndpoint()
    {
        $json = $this->endpoint->serialize();
        $this->assertContains('"host":"us-west-1.s3.amazonaws.com"', $json);
        $this->assertContains('"Amazon Simple Storage Service"', $json);
        $serialized = serialize($this->endpoint);
        $endpoint = unserialize($serialized);
        $this->assertEquals($this->endpoint->getHost(), $endpoint->getHost());
        $this->assertEquals($this->endpoint->getRegion()->getName(), $endpoint->getRegion()->getName());
        $this->assertEquals($this->endpoint->getService()->getName(), $endpoint->getService()->getName());
        $this->assertEquals($this->endpoint->getService()->getFullName(), $endpoint->getService()->getFullName());
        $this->assertSame($this->endpoint->supportsScheme('http'), $endpoint->supportsScheme('http'));
        $this->assertSame($this->endpoint->supportsScheme('https'), $endpoint->supportsScheme('https'));
    }
}
