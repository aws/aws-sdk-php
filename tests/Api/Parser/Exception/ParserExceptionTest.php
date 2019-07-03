<?php
namespace Aws\Test\Api\Parser\Exception;

use Aws\Api\Parser\Exception\ParserException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Api\Parser\Exception\ParserException
 */
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

        $this->assertEquals('foo', $exception->getErrorCode());
        $this->assertEquals('bar', $exception->getRequestId());
    }
}
