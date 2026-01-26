<?php
namespace Aws\Test\S3;

use Aws\CommandInterface;
use Aws\Result;
use Aws\S3\ExpiresParsingMiddleware;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\Attributes\CoversClass;

/**

 */
#[CoversClass(ExpiresParsingMiddleware::class)]
class ExpiresParsingMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    public function testEmitsWarningWhenMissingExpires()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(
            "Failed to parse the `expires` header as a timestamp due to "
            . " an invalid timestamp format.\nPlease refer to `ExpiresString` "
            . "for the unparsed string format of this header.\n"
        );
        set_error_handler(function ($errno, $errstr) {
            throw new \RuntimeException($errstr, $errno);
        });
        try {
            $command = $this->getMockBuilder(CommandInterface::class)->getMock();
            $request = $this->getMockBuilder(RequestInterface::class)->getMock();
            $nextHandler = function ($cmd, $request) {
                return Promise\Create::promiseFor(new Result([
                    'ExpiresString' => 'not-a-timestamp'
                ]));
            };

            $mw = new ExpiresParsingMiddleware($nextHandler);
            $mw($command, $request)->wait();
        } finally {
            restore_error_handler();
        }
    }

    public function testDoesNotEmitWarningWhenExpiresPresent()
    {
        $command = $this->getMockBuilder(CommandInterface::class)->getMock();
        $request = $this->getMockBuilder(RequestInterface::class)->getMock();
        $nextHandler = function ($cmd, $request) {
            return Promise\Create::promiseFor(new Result([
                'ExpiresString' => 'test',
                'Expires' => 'test'
            ]));
        };

        $mw = new ExpiresParsingMiddleware($nextHandler);
        $result = $mw($command, $request)->wait();
        $this->assertEquals('test', $result['Expires']);
        $this->assertEquals('test', $result['ExpiresString']);
    }
}
