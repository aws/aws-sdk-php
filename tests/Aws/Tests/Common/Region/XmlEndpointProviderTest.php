<?php

namespace Aws\Tests\Common\Region;

use Aws\Common\Region\XmlEndpointProvider;
use Guzzle\Service\Client;
use Guzzle\Http\Message\Response;

/**
 * @covers Aws\Common\Region\XmlEndpointProvider
 */
class XmlEndpointProviderTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @var string XML data that was present before running the test
     */
    protected static $xml;

    /**
     * Keep a copy of the XML data in the vendors folder in case a test fails then
     * we will restore the original copy
     */
    public static function setUpBeforeClass()
    {
        self::$xml = file_get_contents(__DIR__ . '/../../../../../vendor/aws/regions/endpoints.xml');
    }

    /**
     * Restore the original copy of the XML data
     */
    public static function tearDownAfterClass()
    {
        if (self::$xml) {
            file_put_contents(__DIR__ . '/../../../../../vendor/aws/regions/endpoints.xml', self::$xml);
        }
    }

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

    public function testFetchesFileFromS3WhenMissing()
    {
        $filename = __DIR__ . '/../../../../../vendor/aws/regions/endpoints.xml';
        if (!file_exists($filename)) {
            $this->markTestSkipped('Cannot test because the endpoints file is missing');
        }
        $data = file_get_contents($filename);
        // Delete any existing file
        unlink($filename);
        // Return the XML data to the client without an actual HTTP request
        $client = new Client();
        $this->setMockResponse($client, array(
            new Response(200, null, $data)
        ));

        // Instantiating the object should load the data from S3
        $provider = new XmlEndpointProvider(null, $client);
        $provider->getRegions();
        $this->assertFileExists($filename);
        $this->assertNotEmpty($provider->getRegions());
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
     * @expectedExceptionMessage Could not find an endpoint for the s3 service in the foo region
     */
    public function testEnsuresRegionAndServiceCombinationExists()
    {
        $provider = new XmlEndpointProvider();
        $provider->getEndpoint('s3', 'foo');
    }
}
