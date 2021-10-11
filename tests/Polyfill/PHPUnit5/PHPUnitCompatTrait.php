<?php

namespace Aws\Test\Polyfill\PHPUnit;

trait PHPUnitCompatTrait
{
    private $exceptionCode = null;

    public function _setUp()
    {
    }

    public function setUp()
    {
        $this->_setUp();
    }

    public function _tearDown()
    {
    }

    public function tearDown()
    {
        $this->_tearDown();
    }

    public static function setUpBeforeClass()
    {
        self::_setUpBeforeClass();
    }

    public static function tearDownAfterClass()
    {
        self::_tearDownAfterClass();
    }

    public static function _tearDownAfterClass()
    {
    }

    public static function _setUpBeforeClass()
    {
    }

    public function expectNotToPerformAssertions()
    {
    }

    public function expectWarning()
    {
        $this->expectException(\PHPUnit_Framework_Error_Warning::class);
    }

    public function expectExceptionMessageMatches($regularExpression)
    {
        $this->expectExceptionMessageRegExp($regularExpression);
    }

    public function expectExceptionMessageRegExp($messageRegExp)
    {
        $exception = $this->getExpectedException();
        $this->setExpectedExceptionRegExp($exception, $messageRegExp, $this->exceptionCode);
    }

    public function assertStringContainsString($expected, $actual, $message = '')
    {
        $this->assertContains($expected, $actual, $message);
    }

    public function assertStringNotContainsString($expected, $actual, $message = '')
    {
        $this->assertNotContains($expected, $actual, $message);
    }

    public function assertStringContainsStringIgnoringCase($expected, $actual, $message = '')
    {
        $this->assertContains($expected, $actual, $message, true);
    }

    public function assertIsInt($actual, $message = '')
    {
        $this->assertInternalType('int', $actual, $message);
    }

    public function assertIsArray($actual, $message = '')
    {
        $this->assertInternalType('array', $actual, $message);
    }

    public function assertIsCallable($actual, $message = '')
    {
        $this->assertInternalType('callable', $actual, $message);
    }

    public function assertIsString($actual, $message = '')
    {
        $this->assertInternalType('string', $actual, $message);
    }

    public function assertIsResource($actual, $message = '')
    {
        $this->assertInternalType('resource', $actual, $message);
    }

    public function assertMatchesRegularExpression($pattern, $string, $message = '')
    {
        $this->assertRegExp($pattern, $string, $message);
    }

    public function assertDoesNotMatchRegularExpression($pattern, $string, $message = '')
    {
        $this->assertNotRegExp($pattern, $string, $message);
    }

    public function assertFileDoesNotExist($file, $message = '')
    {
        $this->assertFileNotExists($file, $message);
    }
}