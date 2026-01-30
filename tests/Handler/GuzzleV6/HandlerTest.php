<?php
namespace Aws\Test\Handler\GuzzleV6;

use Aws\Handler\GuzzleV6\GuzzleHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(GuzzleHandler::class)]
class HandlerTest extends TestCase
{
    public function testV6ClassExists(): void
    {
        set_error_handler(function ($err, $message) {
            throw new \RuntimeException($message);
        });
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            'Using the "Aws\Handler\GuzzleV6\GuzzleHandler" class is deprecated, use "Aws\Handler\Guzzle\GuzzleHandler" instead.'
        );
        $this->assertTrue(class_exists(\Aws\Handler\GuzzleV6\GuzzleHandler::class));
        restore_error_handler();
    }
}
