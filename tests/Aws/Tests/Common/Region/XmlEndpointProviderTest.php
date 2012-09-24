<?php

namespace Aws\Tests\Common\Region;

use Aws\Common\Region\XmlEndpointProvider;

/**
 * @covers Aws\Common\Region\XmlEndpointProvider
 */
class XmlEndpointProviderTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testProvidesRegions()
    {
        $provider = new XmlEndpointProvider();
        $this->assertArrayHasKey('us-east-1', $provider->getRegions());
        $this->assertArrayHasKey('us-east-1', $provider->getRegions('s3'));
    }

    public function testProvidesServices()
    {
        $provider = new XmlEndpointProvider();
        $this->assertArrayHasKey('s3', $provider->getServices());
        $this->assertArrayHasKey('s3', $provider->getServices('us-east-1'));
    }

    public function testCreatesEndpointForRegionAndService()
    {
        $provider = new XmlEndpointProvider();
        $endpoint = $provider->getEndpoint('s3', 'us-east-1');
        $this->assertInstanceOf('Aws\Common\Region\Endpoint', $endpoint);
        $this->assertEquals('us-east-1', $endpoint->getRegion()->getName());
        $this->assertEquals('s3', $endpoint->getService()->getName());
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     */
    public function testEnsuresRegionsFileExists()
    {
        $provider = new XmlEndpointProvider('/path/to/foo.bar');
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage Could not find an endpoint for the s3 service in the foo region
     */
    public function testEnsuresRegionAndServiceCombinationExists()
    {
        $provider = new XmlEndpointProvider();
        $provider->getEndpoint('s3', 'foo');
    }
}
