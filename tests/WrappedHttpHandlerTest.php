<?php
namespace Aws\Test;

use Aws\Api\ErrorParser\JsonRpcErrorParser;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\Result;
use Aws\WrappedHttpHandler;
use GuzzleHttp\Promise\RejectedPromise;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * @covers Aws\WrappedHttpHandler
 */
class WrappedHttpHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testParsesResponses()
    {
        $called = false;
        $cmd = new Command('foo');
        $req = new Request('GET', 'http://foo.com');
        $res = new Response(200, ['Foo' => 'Bar']);
        $result = new Result();

        $handler = function (RequestInterface $request, array $options) use (&$called, $res, $req) {
            $this->assertSame($request, $req);
            $called = true;
            return $res;
        };

        $parser = function (CommandInterface $command, ResponseInterface $response) use ($res, $cmd, $result) {
            $this->assertSame($res, $response);
            $this->assertSame($cmd, $command);
            return $result;
        };

        $errorParser = [$this, 'fail'];
        $wrapped = new WrappedHttpHandler($handler, $parser, $errorParser);
        $promise = $wrapped($cmd, $req);
        $this->assertTrue($called);
        $this->assertInstanceOf('GuzzleHttp\Promise\PromiseInterface', $promise);
        $this->assertSame($result, $promise->wait());
        $this->assertEquals([
            'statusCode'   => 200,
            'effectiveUri' => (string) $req->getUri(),
            'headers'      => ['foo' => 'Bar']
        ], $result['@metadata']);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage The HTTP handler was rejected without an "exception" key value pair.
     */
    public function testEnsuresErrorHasExceptionKey()
    {
        $cmd = new Command('foo');
        $req = new Request('GET', 'http://foo.com');
        $handler = function () { return new RejectedPromise([]); };
        $parser = $errorParser = [$this, 'fail'];
        $wrapped = new WrappedHttpHandler($handler, $parser, $errorParser);
        $wrapped($cmd, $req)->wait();
    }

    public function testCanRejectWithoutResponse()
    {
        $e = new \Exception('a');
        $cmd = new Command('foo');
        $req = new Request('GET', 'http://foo.com');
        $handler = function () use ($e) {
            return new RejectedPromise(['exception' => $e]);
        };
        $parser = $errorParser = [$this, 'fail'];
        $wrapped = new WrappedHttpHandler($handler, $parser, $errorParser);
        try {
            $wrapped($cmd, $req)->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertSame($req, $e->getRequest());
            $this->assertSame($cmd, $e->getCommand());
            $this->assertNull($e->getResponse());
            $this->assertNull($e->getResult());
        }
    }

    public function testCanRejectWithAndParseResponse()
    {
        $e = new \Exception('a');
        $cmd = new Command('foo');
        $bd = json_encode(['__type' => 'foo#bar']);
        $res = new Response(400, ['X-Amzn-RequestId' => '123'], $bd);
        $req = new Request('GET', 'http://foo.com');
        $handler = function () use ($e, $req, $res) {
            return new RejectedPromise(['exception' => $e, 'response' => $res]);
        };
        $parser = [$this, 'fail'];
        $errorParser = new JsonRpcErrorParser();
        $wrapped = new WrappedHttpHandler($handler, $parser, $errorParser);

        try {
            $wrapped($cmd, $req)->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertSame($cmd, $e->getCommand());
            $this->assertSame($res, $e->getResponse());
            $this->assertSame($req, $e->getRequest());
            $this->assertNull($e->getResult());
            $this->assertEquals('bar', $e->getAwsErrorCode());
            $this->assertEquals('client', $e->getAwsErrorType());
            $this->assertEquals('123', $e->getAwsRequestId());
        }
    }
}
