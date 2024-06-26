<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\CredentialsUtils;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Credentials\CredentialsUtils
 */
class CredentialsUtilsTest extends TestCase
{

    /**
     * @param string $host
     * @param bool $expectedResult
     *
     * @dataProvider loopBackAddressCasesProvider
     */
    public function testLoopBackAddressCases(string $host, bool $expectedResult)
    {
        $isLoopBack = CredentialsUtils::isLoopBackAddress($host);
        $this->assertEquals($expectedResult, $isLoopBack);
    }

    /**
     * @return string[]
     */
    public function loopBackAddressCasesProvider(): array
    {
        return [
            'IPv6_invalid_loopBack' =>
            [
                'host' => '::2',
                'expected' => false
            ],
            'IPv6_valid_loopBack' =>
                [
                    'host' => '::1',
                    'expected' => true
                ],
            'IPv4_invalid_loopBack' =>
                [
                    'host' => '192.168.0.1',
                    'expected' => false
                ],
            'IPv4_valid_loopBack' =>
                [
                    'host' => '127.0.0.1',
                    'expected' => true
                ],
            'IPv4_valid_loopBack_2' =>
                [
                    'host' => '127.0.0.255',
                    'expected' => true
                ],
        ];
    }
}
