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

namespace Aws\Tests\CloudSearch;

use Aws\CloudSearch\CloudSearchClient;
use Guzzle\Service\Resource\Model;

class CloudSearchClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\CloudSearch\CloudSearchClient::factory
     */
    public function testFactoryInitializesClient()
    {
        $client = CloudSearchClient::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $this->readAttribute($client, 'signature'));
        $this->assertInstanceOf('Aws\Common\Credentials\Credentials', $client->getCredentials());
        $this->assertEquals('https://cloudsearch.us-east-1.amazonaws.com', $client->getBaseUrl());
    }

    public function testCanGetDomainClient()
    {
        $client = $this->getMockBuilder('Aws\CloudSearch\CloudSearchClient')
            ->disableOriginalConstructor()
            ->setMethods(array('describeDomains'))
            ->getMock();
        $client->expects($this->any())
            ->method('describeDomains')
            ->will($this->returnValue(new Model(array(
                'DomainStatusList' => array(array('SearchService' => array('Endpoint' => 'foo.cloudsearch.com')))
            ))));

        $domainClient = $client->getDomainClient('foo');
        $this->assertEquals('https://foo.cloudsearch.com', $domainClient->getBaseUrl());
    }
}
