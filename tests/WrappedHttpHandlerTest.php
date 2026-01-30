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
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(WrappedHttpHandler::class)]
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

    #[DataProvider('responseAndParserProvider')]
    public function testCanRejectWithAndParseResponse(
        Response $res,
        string $serviceName,
        string $errorParserClass,
        ?string $expectedCode,
        ?string $expectedId,
        array $expectedArray
    )
    {
        $service = $this->generateTestService($serviceName);
        $errorParser = new $errorParserClass($service);
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

    public static function responseAndParserProvider(): \Generator
    {
        $cases = [
            'json_rpc_error_parser' => [
                'response' => new Response(
                    400,
                    ['X-Amzn-RequestId' => '123'],
                    json_encode(['__type' => 'foo#bar'])
                ),
                'service_name' => 'json',
                'error_parser' => JsonRpcErrorParser::class,
                'expected_code' => 'bar',
                'expected_id' => '123',
                'expected_array' => []
            ],
            'rest_json' => [
                'response' => new Response(
                    400,
                    ['X-Amzn-RequestId' => '123'],
                    json_encode(['message' => 'sorry!'])
                ),
                'service_name' => 'rest-json',
                'error_parser' => RestJsonErrorParser::class,
                'expected_code' => null,
                'expected_id' => '123',
                'expected_array' => []
            ],
            'rest_xml' => [
                'response' => new Response(
                    400,
                    [],
                    '<?xml version="1.0" encoding="UTF-8"?><Error><Code>InternalError</Code><RequestId>656c76696e6727732072657175657374</RequestId></Error>'
                ),
                'service_name' => 'rest-xml',
                'error_parser' => XmlErrorParser::class,
                'expected_code' => 'InternalError',
                'expected_id' => '656c76696e6727732072657175657374',
                'expected_array' => []
            ],
            'query' => [
                'response' => new Response(
                    400,
                    ['X-Amzn-RequestId' => '123'],
                    openssl_random_pseudo_bytes(1024)
                ),
                'service_name' => 'query',
                'error_parser' => XmlErrorParser::class,
                'expected_code' => null,
                'expected_id' => null,
                'expected_array' => []
            ],
            'rest_json_with_modeled_exception_from_header_error_type' => [
                'response' => new Response(
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
                'service_name' => 'rest-json',
                'error_parser' => RestJsonErrorParser::class,
                'expected_code' => 'TestException',
                'expected_id' => '123',
                'expected_array' => [
                    'TestString' => 'foo-string',
                    'TestInt' => 456,
                    'TestHeaders' => [],
                    'TestStatus' => 400
                ]
            ],
            'rest_json_with_modeled_exception_from_body_error_code' => [
                'response' => new Response(
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
                'service_name' => 'rest-json',
                'error_parser' => RestJsonErrorParser::class,
                'expected_code' => 'TestException',
                'expected_id' => '123',
                'expected_array' => [
                    'TestString' => 'foo-string',
                    'TestInt' => 456,
                    'TestHeaders' => [],
                    'TestStatus' => 400
                ]
            ],
            'ec2_with_modeled_exception' => [
                'response' => new Response(
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
                'service_name' => 'ec2',
                'error_parser' => XmlErrorParser::class,
                'expected_code' => 'TestException',
                'expected_id' => 'xyz',
                'expected_array' => [
                    'TestString' => 'SomeString',
                    'TestInt' => 456,
                    'TestHeaders' => [],
                    'TestStatus' => 400,
                ]
            ],
            'query_with_modeled_exception' => [
                'response' => new Response(
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
                'service_name' => 'query',
                'error_parser' => XmlErrorParser::class,
                'expected_code' => 'TestException',
                'expected_id' => 'xyz',
                'expected_array' => [
                    'TestString' => 'SomeString',
                    'TestInt' => 456,
                    'TestHeaders' => [],
                    'TestStatus' => 400,
                ]
            ],
            'rest_xml_with_modeled_exception' => [
                'response' => new Response(
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
                'service_name' => 'rest-xml',
                'error_parser' => XmlErrorParser::class,
                'expected_code' => 'TestException',
                'expected_id' => 'xyz',
                'expected_array' => [
                    'TestString' => 'SomeString',
                    'TestInt' => 456,
                    'TestHeaders' => [],
                    'TestStatus' => 400,
                ]
            ]
        ];

        foreach ($cases as $key => $case) {
            yield $key => $case;
        }
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
}
