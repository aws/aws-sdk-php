<?php

namespace Tests\Api;

use Aws\Api\SupportedProtocols;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(SupportedProtocols::class)]
class SupportedProtocolsTest extends TestCase
{
    #[DataProvider('validProtocolsProvider')]
    public function testIsSupportedReturnsTrueForValidProtocols(string $protocol)
    {
        $this->assertTrue(SupportedProtocols::isSupported($protocol));
    }

    #[DataProvider('invalidProtocolsProvider')]
    public function testIsSupportedReturnsFalseForInvalidProtocols(string $protocol)
    {
        $this->assertFalse(SupportedProtocols::isSupported($protocol));
    }

    /**
     * Data provider for valid protocols.
     *
     * @return array
     */
    public static function validProtocolsProvider(): array
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
    public static function invalidProtocolsProvider(): array
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
