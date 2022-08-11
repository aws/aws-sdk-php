<?php
namespace Aws\Test\Endpoint\UseFipsEndpoint;

use Aws\Endpoint\UseFipsEndpoint\Configuration;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Endpoint\UseFipsEndpoint\Configuration
 */
class ConfigurationTest extends TestCase
{
    /**
     * @dataProvider correctValueCases
     *
     * @param $param
     * @param $expected
     */
    public function testGetsCorrectValues($param, $expected)
    {
        $config = new Configuration($param);
        $this->assertEquals($expected, $config->isuseFipsEndpoint());
    }

    public function correctValueCases()
    {
        return [
            [true, true],
            [false, false],
            ['1', true],
            ['0', false],
            ['true', true],
            ['false', false],
            [1, true],
            [0, false],
        ];
    }

    public function testToArray()
    {
        $config = new Configuration(true);
        $expected = [
            'use_fips_endpoint' => true,
        ];
        $this->assertEquals($expected, $config->toArray());
    }

    public function testThrowsOnInvalidEndpointsType()
    {
        $this->expectException(\Aws\Endpoint\UseFipsEndpoint\Exception\ConfigurationException::class);
        $this->expectExceptionMessage("'use_fips_endpoint' config option must be a boolean value.");
        new Configuration('not a boolean');
    }
}
