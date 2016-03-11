<?php
namespace Aws\Test;

use Aws\Api\ErrorParser\JsonRpcErrorParser;
use Aws\Api\ErrorParser\RestJsonErrorParser;
use Aws\Api\ErrorParser\XmlErrorParser;
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
            'statusCode'    => 200,
            'effectiveUri'  => (string) $req->getUri(),
            'headers'       => ['foo' => 'Bar'],
            'transferStats' => [],
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

    /**
     * @dataProvider responseAndParserProvider
     *
     * @param Response $res
     * @param $errorParser
     * @param $expectedCode
     * @param $expectedId
     */
    public function testCanRejectWithAndParseResponse(
        Response $res,
        $errorParser,
        $expectedCode,
        $expectedId
    )
    {
        $e = new \Exception('a');
        $cmd = new Command('foo');
        $req = new Request('GET', 'http://foo.com');
        $handler = function () use ($e, $req, $res) {
            return new RejectedPromise(['exception' => $e, 'response' => $res]);
        };
        $parser = [$this, 'fail'];
        $wrapped = new WrappedHttpHandler($handler, $parser, $errorParser);

        try {
            $wrapped($cmd, $req)->wait();
            $this->fail();
        } catch (AwsException $e) {
            $this->assertSame($cmd, $e->getCommand());
            $this->assertSame($res, $e->getResponse());
            $this->assertSame($req, $e->getRequest());
            $this->assertNull($e->getResult());
            $this->assertEquals($expectedCode, $e->getAwsErrorCode());
            $this->assertEquals($expectedId, $e->getAwsRequestId());
        }
    }

    public function responseAndParserProvider()
    {
        return [
            [
                new Response(
                    400,
                    ['X-Amzn-RequestId' => '123'],
                    json_encode(['__type' => 'foo#bar'])
                ),
                new JsonRpcErrorParser(),
                'bar',
                '123',
            ],
            [
                new Response(
                    400,
                    [
                        'X-Amzn-RequestId' => '123',
                        'X-Amzn-ErrorType' => 'foo:bar'
                    ],
                    json_encode(['message' => 'sorry!'])
                ),
                new RestJsonErrorParser(),
                'foo',
                '123',
            ],
            [
                new Response(
                    400,
                    [],
                    '<?xml version="1.0" encoding="UTF-8"?><Error><Code>InternalError</Code><RequestId>656c76696e6727732072657175657374</RequestId></Error>'
                ),
                new XmlErrorParser(),
                'InternalError',
                '656c76696e6727732072657175657374',
            ],
            [
                new Response(
                    400,
                    ['X-Amzn-RequestId' => '123'],
                    openssl_random_pseudo_bytes(1024)
                ),
                new XmlErrorParser(),
                null,
                null,
            ],
        ];
    }

    public function testCanRejectWithException()
    {
        $e = new \Exception('a');
        $cmd = new Command('foo');
        $req = new Request('GET', 'http://foo.com');
        $handler = function () use ($e) { throw $e; };
        $parser = [$this, 'fail'];
        $errorParser = [$this, 'fail'];
        $wrapped = new WrappedHttpHandler($handler, $parser, $errorParser);

        try {
            $wrapped($cmd, $req)->wait();
            $this->fail();
        } catch (\Exception $e2) {
            $this->assertSame($e, $e2);
        }
    }

    public function testDoesNotPassOnTransferStatsCallbackToHandlerByDefault()
    {
        $handler = function ($request, array $options) {
            $this->assertArrayNotHasKey('http_stats_receiver', $options);
            return new Response;
        };
        $parser = function () { return new Result; };
        $wrapped = new WrappedHttpHandler($handler, $parser, [$this, 'fail']);

        $wrapped(new Command('a'), new Request('GET', 'http://foo.com'))
            ->wait();
    }

    public function testPassesOnTransferStatsCallbackToHandlerWhenRequested()
    {
        $handler = function ($request, array $options) {
            $this->assertArrayHasKey('http_stats_receiver', $options);
            $this->assertTrue(is_callable($options['http_stats_receiver']));
            return new Response;
        };

        $parser = function () { return new Result; };
        $wrapped = new WrappedHttpHandler(
            $handler,
            $parser,
            [$this, 'fail'],
            AwsException::class,
            $collectStats = true
        );

        $wrapped(new Command('a'), new Request('GET', 'http://foo.com'))
            ->wait();
    }
}
