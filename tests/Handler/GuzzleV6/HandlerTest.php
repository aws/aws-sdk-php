<?php
namespace Aws\Test\Handler\GuzzleV6;

use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class HandlerTest extends TestCase
{
    public function testV6ClassExists(): void
    {
        $this->expectDeprecation();
        $this->expectDeprecationMessage(
            'Using the "Aws\Handler\GuzzleV6\GuzzleHandler" class is deprecated, use "Aws\Handler\Guzzle\GuzzleHandler" instead.'
        );
        $this->assertTrue(class_exists(\Aws\Handler\GuzzleV6\GuzzleHandler::class));
    }
}
