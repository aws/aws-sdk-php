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

namespace Aws\Tests\Common\Client;

use Aws\Common\Aws;
use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Enum\Region;
use Aws\Common\Signature\SignatureV4;
use Aws\Common\Signature\SignatureListener;
use Aws\Common\Credentials\Credentials;
use Aws\DynamoDb\DynamoDbClient;
use Guzzle\Common\Collection;
use Guzzle\Service\Description\ServiceDescription;

/**
 * @covers Aws\Common\Client\AbstractClient
 */
class AbstractClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorConfiguresClient()
    {
        $signature = new SignatureV4();
        $credentials = new Credentials('test', '123');
        $config = new Collection();

        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->setConstructorArgs(array($credentials, $signature, $config))
            ->getMockForAbstractClass();

        $this->assertSame($signature, $client->getSignature());
        $this->assertSame($credentials, $client->getCredentials());
        $this->assertSame($config, $client->getConfig());

        // Ensure a signature event dispatcher was added
        $this->assertGreaterThan(0, array_filter(
            $client->getEventDispatcher()->getListeners('request.before_send'),
            function($e) {
                return $e[0] instanceof SignatureListener;
            }
        ));

        // Ensure that the user agent string is correct
        $expectedUserAgent = 'aws-sdk-php2/' . Aws::VERSION;
        $actualUserAgent = $this->readAttribute($client, 'userAgent');
        $this->assertRegExp("@^{$expectedUserAgent}@", $actualUserAgent);
    }

    public function testUsesDefaultWaiterFactory()
    {
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        try {
            $client->waitUntil('foo', array('baz' => 'bar'));
        } catch (\Exception $e) {}

        try {
            $client->getWaiter('foo', array('baz' => 'bar'));
        } catch (\Exception $e) {}
    }

    public function testAllowsWaiterFactoryInjection()
    {
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $waiter = $this->getMockBuilder('Aws\Common\Waiter\ResourceWaiterInterface')
            ->setMethods(array('wait', 'setResource', 'setConfig', 'setClient'))
            ->getMockForAbstractClass();

        $waiter->expects($this->once())
            ->method('wait')
            ->will($this->returnValue($client));

        $waiter->expects($this->once())
            ->method('setConfig')
            ->will($this->returnValue($waiter));

        $waiter->expects($this->once())
            ->method('setClient')
            ->will($this->returnValue($waiter));

        $factory = $this->getMockBuilder('Aws\Common\Waiter\WaiterFactoryInterface')
            ->setMethods(array('build', 'canBuild'))
            ->getMock();

        $factory->expects($this->once())
            ->method('build')
            ->will($this->returnValue($waiter));

        $client->setWaiterFactory($factory);
        $this->assertSame($factory, $client->getWaiterFactory());

        $this->assertSame($client, $client->waitUntil('foo', array('baz' => 'bar')));
    }

    public function testClientUpperCasesMagicMethodCallsToCommands()
    {
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $factory = $this->getMockBuilder('Guzzle\Service\Command\Factory\FactoryInterface')
            ->getMock();

        $factory->expects($this->once())
            ->method('factory')
            ->with('FooBar')
            ->will($this->returnValue(null));

        $client->setCommandFactory($factory);

        try {
            $client->fooBar();
        } catch (\Exception $e) {}
    }

    public function testSetRegionUpdatesBaseUrlAndSignature()
    {
        /** @var $client AwsClientInterface */
        $client = $this->getServiceBuilder()->get('dynamodb', true);
        $client->getConfig()->set('scheme', 'https');
        foreach (array_keys($client->getRegions()) as $region) {
            $suffix = (strpos($region, 'cn-') === 0) ? '.cn' : '';
            $client->setRegion($region);
            $this->assertEquals("https://dynamodb.{$region}.amazonaws.com{$suffix}", (string) $client->getBaseUrl());
            $this->assertEquals("https://dynamodb.{$region}.amazonaws.com{$suffix}", $client->getConfig('base_url'));
            $this->assertEquals($region, $client->getRegion());
            $this->assertEquals($region, $this->readAttribute($client->getSignature(), 'regionName'));
        }

        /** @var $client AwsClientInterface */
        $client = $this->getServiceBuilder()->get('sts', true);
        $client->getConfig()->set('scheme', 'https');
        foreach (array_keys($client->getRegions()) as $region) {
            $client->setRegion($region);
            $this->assertEquals("https://sts.amazonaws.com", (string) $client->getBaseUrl());
            $this->assertEquals("https://sts.amazonaws.com", $client->getConfig('base_url'));
            $this->assertEquals(Region::US_EAST_1, $client->getRegion());
            $this->assertEquals(Region::US_EAST_1, $this->readAttribute($client->getSignature(), 'regionName'));
        }
    }

    public function testAllowsMagicWaiters()
    {
        /** @var $client AbstractClient */
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->setConstructorArgs(array(
                new Credentials('test', '123'),
                new SignatureV4(),
                new Collection()
            ))
            ->setMethods(array('waitUntil'))
            ->getMockForAbstractClass();
        $client->expects($this->once())
            ->method('waitUntil')
            ->with('Foo', array('baz' => 'bar'));
        $client->waitUntilFoo(array('baz' => 'bar'));
    }

    public function testAllowsMagicIterators()
    {
        /** @var $client AbstractClient */
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->setConstructorArgs(array(
                new Credentials('test', '123'),
                new SignatureV4(),
                new Collection()
            ))
            ->setMethods(array('getIterator'))
            ->getMockForAbstractClass();
        $client->expects($this->once())
            ->method('getIterator')
            ->with('Foo', array('baz' => 'bar'));
        $client->getFooIterator(array('baz' => 'bar'));
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage No regions
     */
    public function testEnsuresRegionsAreSetWhenCreatingEndpoints()
    {
        AbstractClient::getEndpoint(ServiceDescription::factory(array()), 'foo', 'baz');
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage foo is not a valid region
     */
    public function testEnsuresRegionIsValidWhenCreatingEndpoints()
    {
        AbstractClient::getEndpoint(ServiceDescription::factory(array(
            'regions' => array(
                'baz' => array()
            )
        )), 'foo', 'baz');
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage http is not a valid URI scheme for
     */
    public function testEnsuresSchemeIsValidWhenCreatingEndpoints()
    {
        AbstractClient::getEndpoint(ServiceDescription::factory(array(
            'regions' => array(
                'baz' => array(
                    'http' => false
                )
            )
        )), 'baz', 'http');
    }

    public function testCreatesEndpoints()
    {
        $this->assertEquals('http://test.com', AbstractClient::getEndpoint(ServiceDescription::factory(array(
            'regions' => array(
                'baz' => array(
                    'http' => true,
                    'hostname' => 'test.com'
                )
            )
        )), 'baz', 'http'));
    }

    public function testChangeRegionAndCredentialsEvents()
    {
        /** @var $client \Aws\Common\Client\AbstractClient */
        $client = $this->getServiceBuilder()->get('dynamodb', true);

        $this->assertContains('client.region_changed', $client::getAllEvents());
        $this->assertContains('client.credentials_changed', $client::getAllEvents());

        $regionChanged = false;
        $client->getEventDispatcher()->addListener('client.region_changed', function () use (&$regionChanged) {
            $regionChanged = true;
        });

        $credentialsChanged = false;
        $client->getEventDispatcher()->addListener('client.credentials_changed', function () use (&$credentialsChanged) {
            $credentialsChanged = true;
        });

        $this->assertFalse($regionChanged);
        $client->setRegion('us-west-1');
        $this->assertTrue($regionChanged);

        $this->assertFalse($credentialsChanged);
        $client->setCredentials(new Credentials('foo', 'bar'));
        $this->assertTrue($credentialsChanged);
    }

    public function testHasApiVersion()
    {
        $client = $this->getServiceBuilder()->get('dynamodb', true);
        $this->assertNotNull($client->getApiVersion());
    }

    /**
     * @expectedException \Aws\Common\Exception\TransferException
     */
    public function testWrapsCurlExceptions()
    {
        $this->getServiceBuilder()->get('dynamodb', true);
        $client = DynamoDbClient::factory(array(
            'key'            => 'foo',
            'secret'         => 'bar',
            'region'         => 'us-west-1',
            'client.backoff' => false,
            'base_url'       => 'http://localhost:123',
            'curl.options'   => array(CURLOPT_TIMEOUT_MS => 1)
        ));
        $client->listTables();
    }
}
