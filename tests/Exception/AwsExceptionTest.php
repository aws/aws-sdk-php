<?php
namespace Aws\Test;

use Aws\Command;
use Aws\Exception\AwsException;
use Aws\Result;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

/**
 * @covers Aws\Exception\AwsException
 */
class AwsExceptionTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testProvidesContextShortcuts()
    {
        $ctx = [
            'request_id' => '10',
            'type'       => 'mytype',
            'code'       => 'mycode'
        ];

        $command = new Command('foo');
        $e = new AwsException('Foo', $command, $ctx);
        $this->assertEquals('10', $e->getAwsRequestId());
        $this->assertEquals('mytype', $e->getAwsErrorType());
        $this->assertEquals('mycode', $e->getAwsErrorCode());
        $this->assertSame($command, $e->getCommand());
        $this->assertNull($e->getResult());
    }

    public function testReturnsStatusCode()
    {
        $ctx = ['response' => new Response(400)];
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, $ctx);
        $this->assertEquals(400, $e->getStatusCode());
    }

    public function testProvidesResult()
    {
        $command = new Command('foo');
        $result = new Result();
        $e = new AwsException('Foo', $command, ['result' => $result]);
        $this->assertSame($result, $e->getResult());
    }

    public function testProvidesResponse()
    {
        $command = new Command('foo');
        $response = new Response();
        $e = new AwsException('Foo', $command, ['response' => $response]);
        $this->assertSame($response, $e->getResponse());
    }

    public function testProvidesErrorMessage()
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, ['message' => "test error message"]);
        $this->assertSame("test error message", $e->getAwsErrorMessage());
    }

    public function testProvidesFalseConnectionErrorFlag()
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, ['connection_error' => false]);
        $this->assertFalse($e->isConnectionError());
    }

    public function testProvidesTrueConnectionErrorFlag()
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, ['connection_error' => true]);
        $this->assertTrue($e->isConnectionError());
    }

    public function testProvidesRequest()
    {
        $command = new Command('foo');
        $request = new Request('GET', 'http://www.foo.com');
        $e = new AwsException('Foo', $command, ['request' => $request]);
        $this->assertSame($request, $e->getRequest());
    }

    public function testProvidesExceptionToStringWithNoPrevious()
    {
        $command = new Command('foo');
        $e = new AwsException('Foo', $command);

        $exceptionString = version_compare(PHP_VERSION, '7', '>=') ?
            'Aws\\Exception\\AwsException: Foo'
            : "exception 'Aws\\Exception\\AwsException' with message 'Foo' in ";

        $this->assertStringStartsWith($exceptionString, $e->__toString());
    }

    public function testProvidesExceptionToStringWithPreviousLast()
    {
        $prev = new \Exception("Last! '.");
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, [], $prev);
        $this->assertStringStartsWith(
            "exception 'Aws\\Exception\\AwsException' with message 'Foo'",
            $e->__toString()
        );
    }
}
