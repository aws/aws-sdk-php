<?php

use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\EndpointV2\Ruleset\RulesetEndpoint
 */
class RulesetEndpointTest extends TestCase
{
    private static $url = 'https://exmaple.com';
    private static $properties = ['prop1' => 'value1', 'prop2' => 'value2'];
    private static $headers = ['header1' => 'value1', 'header2' => 'value2'];

    public function testCanBeCreated()
    {
        $endpoint = new RulesetEndpoint(self::$url, self::$properties, self::$headers);
        $this->assertInstanceOf(RulesetEndpoint::class, $endpoint);
    }

    public function testGetUrl()
    {
        $endpoint = new RulesetEndpoint(self::$url);
        $this->assertEquals(self::$url, $endpoint->getUrl());
    }

    public function testGetProperty()
    {
        $endpoint = new RulesetEndpoint(self::$url, self::$properties);
        $this->assertEquals('value1', $endpoint->getProperty('prop1'));
        $this->assertNull($endpoint->getProperty('notAProp'));
    }

    public function testGetProperties()
    {
        $endpoint = new RulesetEndpoint(self::$url, self::$properties);
        $this->assertEquals(self::$properties, $endpoint->getProperties());
    }

    public function testGetHeaders()
    {
        $endpoint = new RulesetEndpoint(self::$url, null, self::$headers);
        $this->assertEquals(self::$headers, $endpoint->getHeaders());
    }
}
