<?php
namespace Aws\Test\RequestCompression\DisableRequestCompression;

use Aws\RequestCompression\DisableRequestCompression\Configuration;
use Aws\RequestCompression\Exception\ConfigurationException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

///**
// * @covers \Aws\RequestCompression\DisableRequestCompression\Configuration
// */
//class ConfigurationTest extends TestCase
//{
//    /**
//     * @dataProvider correctValueCases
//     *
//     * @param $param
//     * @param $expected
//     */
//    public function testGetsCorrectValues($param, $expected)
//    {
//        $config = new Configuration($param);
//        $this->assertEquals($expected, $config->isDisableRequestCompression());
//    }
//
//    public function correctValueCases()
//    {
//        return [
//            [true, true],
//            [false, false],
//            ['1', true],
//            ['0', false],
//            ['true', true],
//            ['false', false],
//            [1, true],
//            [0, false],
//        ];
//    }
//
//    public function testToArray()
//    {
//        $config = new Configuration(false);
//        $expected = [
//            'disable_request_compression' => false,
//        ];
//        $this->assertEquals($expected, $config->toArray());
//    }
//
//    public function testThrowsOnInvalidType()
//    {
//        $this->expectException(ConfigurationException::class);
//        $this->expectExceptionMessage("'disable_request_compression' config option must be a boolean value.");
//        new Configuration('not a boolean');
//    }
//}