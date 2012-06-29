<?php

namespace Aws\Tests\Common\Waiter;

use Aws\Common\InstanceMetadata\InstanceMetadataClient;

/**
 * @covers Aws\Common\Waiter\AbstractResourceWaiter
 */
class AbstractResourceWaiterTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage No client has been specified on the waiter
     */
    public function testEnsuresClientIsSetBeforeWaiting()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractResourceWaiter')
            ->getMockForAbstractClass();
        $waiter->wait();
    }

    /**
     * @expectedException Aws\Common\Exception\RuntimeException
     * @expectedExceptionMessage No resource ID has been specified on the waiter
     */
    public function testEnsuresResourceIdIsSetBeforeWaiting()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractResourceWaiter')
            ->getMockForAbstractClass();
        $waiter->setClient(InstanceMetadataClient::factory());
        $waiter->wait();
    }

    public function testCanWait()
    {
        $waiter = $this->getMockBuilder('Aws\Common\Waiter\AbstractResourceWaiter')
            ->setMethods(array('wait'))
            ->getMockForAbstractClass();

        $client = InstanceMetadataClient::factory();
        $waiter->setClient($client);
        $this->assertSame($client, $this->readAttribute($waiter, 'client'));

        $config = array('baz' => 'bar');
        $waiter->setConfig($config);
        $this->assertSame($config, $this->readAttribute($waiter, 'config'));

        $resourceId = 'foo';
        $waiter->setResourceId($resourceId);
        $this->assertSame($resourceId, $this->readAttribute($waiter, 'resourceId'));

        try {
            $waiter->wait();
        } catch (\Exception $e) {}
    }
}
