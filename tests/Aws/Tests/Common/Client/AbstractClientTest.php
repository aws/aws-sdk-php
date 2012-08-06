<?php

namespace Aws\Tests\Common\Client;

use Aws\Common\Aws;
use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Client\ExponentialBackoffOptionResolver;
use Aws\Common\Client\AbstractClient;
use Aws\Common\Signature\SignatureV4;
use Aws\Common\Signature\SignatureListener;
use Aws\Common\Credentials\Credentials;
use Guzzle\Common\Collection;
use Guzzle\Http\Plugin\ExponentialBackoffPlugin;

class AbstractClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\Common\Client\AbstractClient::__construct
     * @covers Aws\Common\Client\AbstractClient::getCredentials
     * @covers Aws\Common\Client\AbstractClient::getSignature
     */
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
        $this->assertGreaterThan(0, array_filter($client->getEventDispatcher()->getListeners('request.before_send'), function($e) {
            return $e[0] instanceof SignatureListener;
        }));

        // Ensure that the user agent string is correct
        $expectedUserAgent = 'aws-sdk-php/' . Aws::VERSION . ' Guzzle';
        $actualUserAgent = $client->getDefaultHeaders()->get('User-Agent');
        $this->assertRegExp("@^{$expectedUserAgent}@", $actualUserAgent);
    }

    /**
     * @covers Aws\Common\Client\AbstractClient::__construct
     */
    public function testConstructorCallsResolvers()
    {
        $config = new Collection();
        $signature = new SignatureV4();
        $credentials = new Credentials('test', '123');
        $config->set('client.resolvers', array(
            new ExponentialBackoffOptionResolver(function() {
                return new ExponentialBackoffPlugin();
            })
        ));

        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->setConstructorArgs(array($credentials, $signature, $config))
            ->getMockForAbstractClass();

        // Ensure that lazy resolvers were triggered
        $this->assertInstanceOf('Guzzle\\Http\\Plugin\\ExponentialBackoffPlugin', $client->getConfig(AwsClientInterface::EXPONENTIAL_BACKOFF_OPTION));
        // Ensure that the client removed the option
        $this->assertNull($config->get('client.resolvers'));
    }

    /**
     * @covers Aws\Common\Client\AbstractClient::waitUntil
     * @covers Aws\Common\Client\AbstractClient::getWaiterFactory
     */
    public function testUsesDefaultWaiterFactory()
    {
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        try {
            $client->waitUntil('foo', 'bar');
        } catch (\Exception $e) {}
    }

    /**
     * @covers Aws\Common\Client\AbstractClient::waitUntil
     * @covers Aws\Common\Client\AbstractClient::setWaiterFactory
     * @covers Aws\Common\Client\AbstractClient::getWaiterFactory
     */
    public function testAllowsWaiterFactoryInjection()
    {
        $client = $this->getMockBuilder('Aws\Common\Client\AbstractClient')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $waiter = $this->getMockBuilder('Aws\Common\Waiter\ResourceWaiterInterface')
            ->setMethods(array('wait', 'setResourceId', 'setConfig', 'setClient'))
            ->getMockForAbstractClass();

        $waiter->expects($this->once())
            ->method('wait')
            ->will($this->returnValue($client));

        $waiter->expects($this->once())
            ->method('setResourceId')
            ->will($this->returnValue($waiter));

        $waiter->expects($this->once())
            ->method('setConfig')
            ->will($this->returnValue($waiter));

        $waiter->expects($this->once())
            ->method('setClient')
            ->will($this->returnValue($waiter));

        $factory = $this->getMockBuilder('Aws\Common\Waiter\WaiterFactoryInterface')
            ->setMethods(array('factory'))
            ->getMock();

        $factory->expects($this->once())
            ->method('factory')
            ->will($this->returnValue($waiter));

        $client->setWaiterFactory($factory);
        $this->assertSame($factory, $this->readAttribute($client, 'waiterFactory'));

        $this->assertSame($client, $client->waitUntil('foo', 'bar'));
    }

    /**
     * @covers Aws\Common\Client\AbstractClient
     */
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
}
