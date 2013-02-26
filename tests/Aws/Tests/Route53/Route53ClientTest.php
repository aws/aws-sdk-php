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

namespace Aws\Tests\Route53;

use Aws\Route53\Route53Client;

class Route53ClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Route53\Route53Client::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = Route53Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV3Https', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://route53.amazonaws.com', $client->getBaseUrl());
    }

    /**
     * @covers Aws\Route53\Route53Client::getServerTime
     */
    public function testGetServerTimeReturnsTimeForBoth200And400Responses()
    {
        $client = Route53Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
        ));

        $this->setMockResponse($client, array(
            'route53/server_time_1',
            'route53/server_time_2',
        ));

        $time = $client->getServerTime();
        $this->assertInstanceOf('DateTime', $time);
        $this->assertEquals('11-19-2009', $time->format('m-d-Y'));

        $time = $client->getServerTime();
        $this->assertInstanceOf('DateTime', $time);
        $this->assertEquals('11-20-2009', $time->format('m-d-Y'));
    }

    /**
     * @covers Aws\Route53\Route53Client::cleanId
     */
    public function testCanCleanId()
    {
        $original = array('/hostedzone/1', '2', '/change/3');
        $expected = array('1', '2', '3');
        $actual   = array_map('Aws\Route53\Route53Client::cleanId', $original);

        $this->assertSame($expected, $actual);
    }
}
