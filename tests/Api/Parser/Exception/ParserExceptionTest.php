<?php
namespace Aws\Test\Api\Parser\Exception;

use Aws\Api\Parser\Exception\ParserException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Aws\Api\Parser\Exception\ParserException::class)]
class ParserExceptionTest extends TestCase
{
    public function testExtractsContext()
    {
        $exception = new ParserException(
            '',
            0,
            null,
            [
                'error_code' => 'foo',
                'request_id' => 'bar',
            ]
        );

        $this->assertSame('foo', $exception->getErrorCode());
        $this->assertSame('bar', $exception->getRequestId());
    }
}
