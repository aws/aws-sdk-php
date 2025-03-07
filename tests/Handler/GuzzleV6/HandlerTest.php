<?php
namespace Aws\Test\Handler\GuzzleV6;

use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Handler\GuzzleV6\GuzzleHandler
 */
class HandlerTest extends TestCase
{
    public function testV6ClassExists(): void
    {
        $this->assertTrue(class_exists(\Aws\Handler\GuzzleV6\GuzzleHandler::class));
    }
}