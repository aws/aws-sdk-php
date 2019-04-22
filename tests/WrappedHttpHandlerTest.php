<?php
namespace Aws\Test;

use Aws\Api\ErrorParser\JsonRpcErrorParser;
use Aws\Api\ErrorParser\RestJsonErrorParser;
use Aws\Api\ErrorParser\XmlErrorParser;
use Aws\Api\Service;
use Aws\AwsClient;
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
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\WrappedHttpHandler
 */
class WrappedHttpHandlerTest extends TestCase
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
     * @param $expectedArray
     */
    public function testCanRejectWithAndParseResponse(
        Response $res,
        Service $service,
        $errorParser,
        $expectedCode,
        $expectedId,
        $expectedArray
    )
    {
        $client = $this->generateTestClient($service, []);
        $cmd = $client->getCommand('TestOperation', []);
        $e = new \Exception('a');
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
            $this->assertEquals($expectedArray, $e->toArray());
        }
    }

    public function responseAndParserProvider()
    {
        $services = [
            'json' => $this->generateTestService('json'),
            'query' => $this->generateTestService('query'),
            'rest-json' => $this->generateTestService('rest-json'),
            'rest-xml' => $this->generateTestService('rest-xml'),
        ];

        return [
            [
                new Response(
                    400,
                    ['X-Amzn-RequestId' => '123'],
                    json_encode(['__type' => 'foo#bar'])
                ),
                $services['json'],
                new JsonRpcErrorParser($services['json']),
                'bar',
                '123',
                [],
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
                $services['rest-json'],
                new RestJsonErrorParser($services['rest-json']),
                'foo',
                '123',
                [],
            ],
            [
                new Response(
                    400,
                    [],
                    '<?xml version="1.0" encoding="UTF-8"?><Error><Code>InternalError</Code><RequestId>656c76696e6727732072657175657374</RequestId></Error>'
                ),
                $services['rest-xml'],
                new XmlErrorParser($services['rest-xml']),
                'InternalError',
                '656c76696e6727732072657175657374',
                [],
            ],
            [
                new Response(
                    400,
                    ['X-Amzn-RequestId' => '123'],
                    openssl_random_pseudo_bytes(1024)
                ),
                $services['query'],
                new XmlErrorParser($services['query']),
                null,
                null,
                [],
            ],
            // Rest-json with modeled exception
            [
                new Response(
                    400,
                    [
                        'X-Amzn-RequestId' => '123',
                        'X-Amzn-ErrorType' => 'TestException'
                    ],
                    json_encode([
                        'TestString' => 'foo-string',
                        'TestInt' => 456
                    ])
                ),
                $services['rest-json'],
                new RestJsonErrorParser($services['rest-json']),
                'TestException',
                '123',
                [
                    'TestString' => 'foo-string',
                    'TestInt' => 456
                ],
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
            $this->assertInternalType('callable', $options['http_stats_receiver']);
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

    private function generateTestClient(Service $service, $args = [])
    {
        return new AwsClient(
            array_merge(
                [
                    'service'      => 'foo',
                    'api_provider' => function () use ($service) {
                        return $service->toArray();
                    },
                    'region'       => 'us-east-1',
                    'version'      => 'latest',
                ],
                $args
            )
        );
    }

    private function generateTestService($protocol)
    {
        return new Service(
            [
                'metadata' => [
                    "protocol" => $protocol,
                    "apiVersion" => "2019-05-01"
                ],
                'shapes' => [
                    "TestException"=>[
                        "type" => "structure",
                        "members" => [
                            "TestString" => ["shape" => "String"],
                            "TestInt" => ["shape" => "Integer"]
                        ],
                        "error" => ["httpStatusCode" => 502],
                        "exception" => true
                    ],
                    "TestInput"=>[
                        "type" => "structure",
                        "members" => [
                            "TestInput" => ["shape" => "String"]
                        ],
                    ],
                ],
                'operations' => [
                    "TestOperation"=> [
                        "name"=> "TestOperation",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input" => ["shape"=> "TestInput"],
                        "errors" => [
                            ["shape" => "TestException"]
                        ],
                    ],
                ],
            ],
            function () { return []; }
        );
    }
}
