<?php
namespace Aws\Test\S3;


use Aws\Api\Parser\Exception\ParserException;
use Aws\CommandInterface;
use Aws\S3\Exception\S3Exception;
use Aws\S3\RetryableMalformedResponseParser;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\TestCase;

class RetryableMalformedResponseParserTest extends TestCase
{
    /**
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessage Sorry!
     */
    public function testConvertsParserExceptionsToRetryableExceptions()
    {
        $parser = function () { throw new ParserException('Sorry!'); };

        $instance = new RetryableMalformedResponseParser(
            $parser,
            S3Exception::class
        );

        $instance(
            $this->getMockBuilder(CommandInterface::class)->getMock(),
            $this->getMockBuilder(ResponseInterface::class)->getMock()
        );
    }
}
