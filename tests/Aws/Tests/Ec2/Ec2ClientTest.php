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

namespace Aws\Tests\Ec2;

use Aws\Ec2\Ec2Client;
use Aws\Common\Enum\ClientOptions;

/**
 * @covers Aws\Ec2\Ec2Client
 */
class Ec2ClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInitializesClient()
    {
        $client = Ec2Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'ap-southeast-1'
        ));

        $this->assertEquals('https://ec2.ap-southeast-1.amazonaws.com', $client->getBaseUrl());
        $this->assertInstanceOf('Aws\Common\Signature\SignatureV2', $client->getSignature());
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
    }

    public function testFactoryUsesSigV4InCnRegions()
    {
        $description = array (
            'apiVersion' => '2013-10-15',
            'endpointPrefix' => 'ec2',
            'serviceType' => 'query',
            'signatureVersion' => 'v2',
            'namespace' => 'Ec2',
            'regions' => array(
                'cn-north-1' => array('http' => true, 'https' => true, 'hostname' => 'foo.aws.com')
            )
        );

        $client = Ec2Client::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'cn-north-1',
            ClientOptions::SERVICE_DESCRIPTION => $description
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $client->getSignature());
    }
}
