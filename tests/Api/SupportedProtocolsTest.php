<?php

namespace Tests\Api;

use Aws\Api\SupportedProtocols;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class SupportedProtocolsTest extends TestCase
{
    /**
     * @dataProvider validProtocolsProvider
     */
    public function testIsSupportedReturnsTrueForValidProtocols(string $protocol)
    {
        $this->assertTrue(SupportedProtocols::isSupported($protocol));
    }

    /**
     * @dataProvider invalidProtocolsProvider
     */
    public function testIsSupportedReturnsFalseForInvalidProtocols(string $protocol)
    {
        $this->assertFalse(SupportedProtocols::isSupported($protocol));
    }

    /**
     * Data provider for valid protocols.
     *
     * @return array
     */
    public function validProtocolsProvider(): array
    {
        return [
            ['rest-json'],
            ['rest-xml'],
            ['json'],
            ['query'],
            ['ec2'],
        ];
    }

    /**
     * Data provider for invalid protocols.
     *
     * @return array
     */
    public function invalidProtocolsProvider(): array
    {
        return [
            ['graphql'],
            ['soap'],
            ['grpc'],
            [''],
            ['REST-JSON'],
            ['restjson'],
        ];
    }
}
