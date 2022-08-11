<?php
namespace Aws\Test\Endpoint\UseDualstackEndpoint;

use Aws\Endpoint\UseDualstackEndpoint\Configuration;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Endpoint\UseDualstackEndpoint\Configuration
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
        $config = new Configuration($param, 'us-east-1');
        $this->assertEquals($expected, $config->isuseDualstackEndpoint());
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
        $config = new Configuration(true, 'us-east-1');
        $expected = [
            'use_dual_stack_endpoint' => true,
        ];
        $this->assertEquals($expected, $config->toArray());
    }

    public function testThrowsOnInvalidEndpointsType()
    {
        $this->expectException(\Aws\Endpoint\UseDualstackEndpoint\Exception\ConfigurationException::class);
        $this->expectExceptionMessage("'use_dual_stack_endpoint' config option must be a boolean value");
        new Configuration('not a boolean', 'us-east-1');
    }

    public function testThrowsOnInvalidRegion()
    {
        $this->expectException(\Aws\Endpoint\UseDualstackEndpoint\Exception\ConfigurationException::class);
        $this->expectExceptionMessage("Dual-stack is not supported in ISO regions");
        new Configuration(true, 'something-iso-something');
    }
}
