<?php
namespace Aws\Test;

use Aws\Api\ErrorParser\JsonRpcErrorParser;
use Aws\Api\ErrorParser\RestJsonErrorParser;
use Aws\Api\ErrorParser\XmlErrorParser;
use Aws\Api\Service;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\Result;
use Aws\WrappedHttpHandler;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\WrappedHttpHandler
 */
class WrappedHttpHandlerTest extends TestCase
{
    use TestServiceTrait;

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

    public function testEnsuresErrorHasExceptionKey()
    {
        $this->expectExceptionMessage("The HTTP handler was rejected without an \"exception\" key value pair.");
        $this->expectException(\RuntimeException::class);
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
            'ec2' => $this->generateTestService('ec2'),
            'json' => $this->generateTestService('json'),
            'query' => $this->generateTestService('query'),
            'rest-json' => $this->generateTestService('rest-json'),
            'rest-xml' => $this->generateTestService('rest-xml'),
        ];


            yield [
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
            ];
            yield [
                new Response(
                    400,
                    [
                        'X-Amzn-RequestId' => '123',
                    ],
                    json_encode(['message' => 'sorry!'])
                ),
                $services['rest-json'],
                new RestJsonErrorParser($services['rest-json']),
                null,
                '123',
                [],
            ];
            yield [
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
            ];
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
            ];
            yield 'Rest-json with modeled exception from header error type' => [
                new Response(
                    400,
                    [
                        'X-Amzn-RequestId' => '123',
                        'X-Amzn-ErrorType' => 'TestException'
                    ],
                    json_encode([
                        'TestString' => 'foo-string',
                        'TestInt' => 456,
                        'NotModeled' => 'bar'
                    ])
                ),
                $services['rest-json'],
                new RestJsonErrorParser($services['rest-json']),
                'TestException',
                '123',
                [
                    'TestString' => 'foo-string',
                    'TestInt' => 456,
                    'TestHeaders' => [],
                    'TestStatus' => 400
                ],
            ];
            yield 'Rest-json with modeled exception from body error code' => [
                new Response(
                    400,
                    [
                        'X-Amzn-RequestId' => '123'
                    ],
                    json_encode([
                        'TestString' => 'foo-string',
                        'TestInt' => 456,
                        'NotModeled' => 'bar',
                        'code' => 'TestException'
                    ])
                ),
                $services['rest-json'],
                new RestJsonErrorParser($services['rest-json']),
                'TestException',
                '123',
                [
                    'TestString' => 'foo-string',
                    'TestInt' => 456,
                    'TestHeaders' => [],
                    'TestStatus' => 400
                ],
            ];
            yield 'Ec2 with modeled exception' => [
                new Response(
                    400,
                    [],
                    '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
                    '<Response>' .
                    '  <Errors>' .
                    '    <Error>' .
                    '      <Code>TestException</Code>' .
                    '      <Message>Error Message</Message>' .
                    '      <TestString>SomeString</TestString>' .
                    '      <TestInt>456</TestInt>' .
                    '    </Error>' .
                    '  </Errors>' .
                    '  <RequestId>xyz</RequestId>' .
                    '</Response>'
                ),
                $services['ec2'],
                new XmlErrorParser($services['ec2']),
                'TestException',
                'xyz',
                [
                    'TestString' => 'SomeString',
                    'TestInt' => 456,
                    'TestHeaders' => [],
                    'TestStatus' => 400,
                ],
            ];
            yield 'Query with modeled exception' => [
                new Response(
                    400,
                    [],
                    '<ErrorResponse xmlns="http://sns.amazonaws.com/doc/2010-03-31/">' .
                    '  <Error>' .
                    '    <Type>ErrorType</Type>' .
                    '    <Code>TestException</Code>' .
                    '    <Message>Error Message</Message>' .
                    '    <TestString>SomeString</TestString>' .
                    '    <TestInt>456</TestInt>' .
                    '  </Error>' .
                    '  <RequestId>xyz</RequestId>' .
                    '</ErrorResponse>'
                ),
                $services['query'],
                new XmlErrorParser($services['query']),
                'TestException',
                'xyz',
                [
                    'TestString' => 'SomeString',
                    'TestInt' => 456,
                    'TestHeaders' => [],
                    'TestStatus' => 400,
                ],
            ];
            yield 'Rest-xml with modeled exception' => [
                new Response(
                    400,
                    [],
                    '<ErrorResponse xmlns="http://sns.amazonaws.com/doc/2010-03-31/">' .
                    '  <Error>' .
                    '    <Type>ErrorType</Type>' .
                    '    <Code>TestException</Code>' .
                    '    <Message>Error Message</Message>' .
                    '    <TestString>SomeString</TestString>' .
                    '    <TestInt>456</TestInt>' .
                    '  </Error>' .
                    '  <RequestId>xyz</RequestId>' .
                    '</ErrorResponse>'
                ),
                $services['rest-xml'],
                new XmlErrorParser($services['rest-xml']),
                'TestException',
                'xyz',
                [
                    'TestString' => 'SomeString',
                    'TestInt' => 456,
                    'TestHeaders' => [],
                    'TestStatus' => 400,
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
            $this->assertIsCallable($options['http_stats_receiver']);
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

    /**
     * @dataProvider errorIsParsedOnNonSeekableResponseBodyProvider
     *
     * @return void
     */
    public function testErrorIsParsedOnNonSeekableResponseBody(
        string $protocol,
        string $body,
        string $expected
    )
    {
        $service = $this->generateTestService($protocol);
        $parser = Service::createParser($service);
        $errorParser = Service::createErrorParser($service->getProtocol(), $service);
        $client = $this->generateTestClient(
            $service
        );
        $command = $client->getCommand('TestOperation');
        $exception = new AwsException(
            'Failed performing test operation',
            $command,
        );
        $uri = 'http://myservice.myregion.foo.com';
        $request = new Request('GET', $uri);
        $response = new Response(
            403,
            [],
            new NoSeekStream(
                Utils::streamFor($body)
            )
        );
        $handler = function () use ($exception, $response) {
            return new RejectedPromise([
                'exception' => $exception,
                'response' => $response,
            ]);
        };
        $wrapped = new WrappedHttpHandler($handler, $parser, $errorParser);
        try {
            $wrapped($command, $request)->wait();
            $this->fail(
                "Operation should have failed!"
            );
        } catch (\Exception $exception) {
            $this->assertStringContainsString(
                $expected,
                $exception->getMessage()
            );
        }
    }

    /**
     * @return array[]
     */
    public function errorIsParsedOnNonSeekableResponseBodyProvider(): array
    {
        return [
            'json' => [
                'protocol' => 'json',
                'body' => '{"Message": "Action not allowed!", "__Type": "ListObjects"}',
                'expected' => 'ListObjects (client): Action not allowed!',
            ],
            'query' => [
                'protocol' => 'query',
                'body' => '<?xml version="1.0" encoding="UTF-8"?><ErrorResponse><Error><Code>ListObjects</Code><Message>Action not allowed!</Message></Error></ErrorResponse>',
                'expected' => 'ListObjects (client): Action not allowed!',
            ],
            'rest-xml' => [
                'protocol' => 'rest-xml',
                'body' => '<?xml version="1.0" encoding="UTF-8"?><Error><Code>ListObjects</Code><Message>Action not allowed!</Message></Error>',
                'expected' => 'ListObjects (client): Action not allowed!',
            ],
            'rest-json' => [
                'protocol' => 'rest-json',
                'body' => '{"message": "Action not allowed!", "code": "ListObjects"}',
                'expected' => 'Action not allowed!',
            ]
        ];
    }
}
