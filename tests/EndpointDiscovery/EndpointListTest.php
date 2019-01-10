<?php

namespace Aws\Test\EndpointDiscovery;

use Aws\EndpointDiscovery\EndpointList;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\EndpointDiscovery\EndpointList
 */
class EndpointListTest extends TestCase
{
    public function testStoresRetrievesAndCyclesActiveEndpoints()
    {
        $list = new EndpointList([
            'endpoint_1' => time() + 100,
            'endpoint_2' => time() + 100,
        ]);

        $this->assertEquals('endpoint_1', $list->getActive());
        $this->assertEquals('endpoint_2', $list->getActive());
        $this->assertEquals('endpoint_1', $list->getActive());
        $this->assertEquals('endpoint_2', $list->getActive());
    }

    public function testMovesToAndRetrievesFromExpiredEndpoints()
    {
        $list = new EndpointList([
            'endpoint_1' => time() + 2,
            'endpoint_2' => time() + 2,
        ]);
        $this->assertEquals('endpoint_1', $list->getActive());
        $this->assertEquals('endpoint_2', $list->getActive());

        sleep(4);

        $this->assertNull($list->getActive());
        $this->assertEquals('endpoint_1', $list->getEndpoint());
        $this->assertEquals('endpoint_2', $list->getEndpoint());
        $this->assertEquals('endpoint_1', $list->getEndpoint());
        $this->assertEquals('endpoint_2', $list->getEndpoint());
    }

    public function testGetEndpointSelectsActiveThenExpired()
    {
        $list = new EndpointList([
            'endpoint_1' => time() - 100,
            'endpoint_2' => time() + 100,
        ]);

        $this->assertEquals('endpoint_2', $list->getEndpoint());
        // Make sure list is not cycling to the expired endpoint
        $this->assertEquals('endpoint_2', $list->getEndpoint());

        $list->remove('endpoint_2');
        $this->assertEquals('endpoint_1', $list->getEndpoint());
    }

    public function testRemovesEndpoints()
    {
        $list = new EndpointList([
            'endpoint_1' => time() - 100,
            'endpoint_2' => time() + 100,
        ]);

        $this->assertEquals('endpoint_2', $list->getActive());

        $list->remove('endpoint_2');
        $this->assertNull($list->getActive());
        $this->assertEquals('endpoint_1', $list->getEndpoint());
        // Check that 'endpoint_2' was not moved to the expired list
        $this->assertEquals('endpoint_1', $list->getEndpoint());

        $list->remove('endpoint_1');
        $this->assertNull($list->getEndpoint());
    }
}
