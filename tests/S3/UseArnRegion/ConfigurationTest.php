<?php
namespace Aws\Test\S3\UseArnRegion;

use Aws\S3\UseArnRegion\Configuration;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\S3\UseArnRegion\Configuration
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
        $this->assertEquals($expected, $config->isUseArnRegion());
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
            'use_arn_region' => true,
        ];
        $this->assertEquals($expected, $config->toArray());
    }

    /**
     * @expectedException \Aws\S3\UseArnRegion\Exception\ConfigurationException
     * @expectedExceptionMessage 'use_arn_region' config option must be a boolean value.
     */
    public function testThrowsOnInvalidEndpointsType()
    {
        new Configuration('not a boolean');
    }
}
