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
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Enum\Region;
use Aws\Common\Client\BackoffOptionResolver;
use Aws\Common\Client\AbstractClient;
use Aws\Common\Region\EndpointProviderInterface;
use Aws\Common\Region\XmlEndpointProvider;
use Aws\Common\Signature\SignatureV4;
use Aws\Common\Signature\SignatureListener;
use Aws\Common\Credentials\Credentials;
use Guzzle\Common\Collection;
use Guzzle\Plugin\Backoff\BackoffPlugin;

/**
 * @covers Aws\Common\Client\AbstractClient
 */
class AbstractClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorConfiguresClient()
    {
        $signature = new SignatureV4();
        $credentials = new Credentials('test', '123');
        $endpointProvider = $this->getMock('Aws\Common\Region\EndpointProviderInterface');
        $config = new Collection(array(
            Options::ENDPOINT_PROVIDER => $endpointProvider
        ));

        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->setConstructorArgs(array($credentials, $signature, $config))
            ->getMockForAbstractClass();

        $this->assertSame($signature, $client->getSignature());
        $this->assertSame($credentials, $client->getCredentials());
        $this->assertSame($endpointProvider, $client->getEndpointProvider());
        $this->assertSame($config, $client->getConfig());

        // Ensure a signature event dispatcher was added
        $this->assertGreaterThan(0, array_filter(
            $client->getEventDispatcher()->getListeners('request.before_send'),
            function($e) {
                return $e[0] instanceof SignatureListener;
            }
        ));

        // Ensure that the user agent string is correct
        $expectedUserAgent = 'aws-sdk-php2/' . Aws::VERSION . ' Guzzle';
        $actualUserAgent = $this->readAttribute($client, 'userAgent');
        $this->assertRegExp("@^{$expectedUserAgent}@", $actualUserAgent);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionWhenNoEndpointProvider()
    {
        $signature = new SignatureV4();
        $credentials = new Credentials('test', '123');
        $config = new Collection();
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->setConstructorArgs(array($credentials, $signature, $config))
            ->getMockForAbstractClass();
    }

    public function testConstructorCallsResolvers()
    {
        $config = new Collection(array(
            Options::ENDPOINT_PROVIDER => $this->getMock('Aws\Common\Region\EndpointProviderInterface')
        ));
        $signature = new SignatureV4();
        $credentials = new Credentials('test', '123');
        $config->set('client.resolvers', array(
            new BackoffOptionResolver(function() {
                return BackoffPlugin::getExponentialBackoff();
            })
        ));

        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->setConstructorArgs(array($credentials, $signature, $config))
            ->getMockForAbstractClass();

        // Ensure that lazy resolvers were triggered
        $this->assertInstanceOf(
            'Guzzle\\Plugin\\Backoff\\BackoffPlugin',
            $client->getConfig(Options::BACKOFF)
        );
        // Ensure that the client removed the option
        $this->assertNull($config->get('client.resolvers'));
    }

    public function testUsesDefaultWaiterFactory()
    {
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        try {
            $client->waitUntil('foo', array('baz' => 'bar'));
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
        $this->assertSame($factory, $this->readAttribute($client, 'waiterFactory'));

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
        // Setup client
        $endpointProvider = new XmlEndpointProvider();
        $signature = new SignatureV4();
        $signature->setRegionName(Region::US_EAST_1);
        $credentials = new Credentials('test', '123');
        $config = new Collection(array(
            Options::SERVICE           => 's3',
            Options::SCHEME            => 'https',
            Options::BASE_URL          => $endpointProvider->getEndpoint('s3', Region::US_EAST_1)->getBaseUrl('https'),
            Options::ENDPOINT_PROVIDER => $endpointProvider
        ));
        /** @var $client AbstractClient */
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->setConstructorArgs(array($credentials, $signature, $config))
            ->getMockForAbstractClass();

        // Get the original values
        $baseUrl1 = $client->getBaseUrl();
        $regionName1 = $this->readAttribute($signature, 'regionName');
        $this->assertNotEmpty($baseUrl1);
        $this->assertNotEmpty($regionName1);

        // Change the region, get the new values, and compare with old
        $client->setRegion(Region::US_WEST_1);
        $baseUrl2 = $client->getBaseUrl();
        $regionName2 = $this->readAttribute($signature, 'regionName');
        $this->assertNotEmpty($baseUrl2);
        $this->assertNotEmpty($regionName2);
        $this->assertNotEquals($baseUrl1, $baseUrl2);
        $this->assertNotEquals($regionName1, $regionName2);
    }

    public function testAllowsMagicWaiters()
    {
        /** @var $client AbstractClient */
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->setConstructorArgs(array(
                new Credentials('test', '123'),
                new SignatureV4(),
                new Collection(array(Options::ENDPOINT_PROVIDER => new XmlEndpointProvider()))
            ))
            ->setMethods(array('waitUntil'))
            ->getMockForAbstractClass();
        $client->expects($this->once())
            ->method('waitUntil')
            ->with('Foo', array('baz' => 'bar'));
        $client->waitUntilFoo(array('baz' => 'bar'));
    }
}
