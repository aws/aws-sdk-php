<?php
namespace Aws\Test;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\ClientResolver;
use Aws\CommandInterface;
use Aws\HandlerList;
use Aws\Middleware;
use Aws\Result;
use Aws\StreamRequestPayloadMiddleware;
use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(StreamRequestPayloadMiddleware::class)]
class StreamRequestPayloadMiddlewareTest extends TestCase
{
    use ArraySubsetAsserts;

    #[DataProvider('addsProperHeadersDataProvider')]
    public function testAddsProperHeaders(
        array $commandDef,
        array $expectedHeaders,
        array $expectedNonHeaders
    ) {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand(
            $commandDef['command_name'],
            $commandDef['command_args']
        );
        $list = $this->generateTestHandlerList();

        $list->setHandler(function (
            CommandInterface $command,
            RequestInterface $request
        ) use (
            $expectedHeaders,
            $expectedNonHeaders
        ) {
            $this->assertArraySubset($expectedHeaders, $request->getHeaders());
            foreach ($expectedNonHeaders as $header) {
                $this->assertArrayNotHasKey($header, $request->getHeaders());
            }
            return new Result([]);
        });

        $handler = $list->resolve();
        $handler($command, new Request('POST', 'https://foo.com'));
    }

    public static function addsProperHeadersDataProvider(): array
    {
        $inputStream = Psr7\Utils::streamFor('test');

        return [
            [
                [
                    'command_name' => 'NonStreamingOp',
                    'command_args' => [
                        'InputString' => 'teststring',
                    ]
                ],
                [],
                [ 'transfer-encoding'],
            ],
            [
                [
                    'command_name' => 'StreamingOp',
                    'command_args' => [
                        'InputStream' => $inputStream,
                    ]
                ],
                [ 'Content-Length' => [26] ],
                [ 'transfer-encoding' ],
            ],
            [
                [
                    'command_name' => 'StreamingLengthOp',
                    'command_args' => [
                        'InputStream' => $inputStream,
                    ]
                ],
                [ 'Content-Length' => [26] ],
                [ 'transfer-encoding' ],
            ],
            [
                [
                    'command_name' => 'StreamingLengthUnsignedOp',
                    'command_args' => [
                        'InputStream' => $inputStream,
                    ]
                ],
                [ 'Content-Length' => [26] ],
                [ 'transfer-encoding' ],
            ],
        ];
    }

    public function testThrowsExceptionOnIncalculableSize()
    {
        $this->expectExceptionMessage("Payload content length is required and can not be calculated.");
        $this->expectException(\Aws\Exception\IncalculablePayloadException::class);
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand(
            'StreamingOp',
            [
                'InputStream' => Psr7\Utils::streamFor('test'),
            ]
        );
        $middleware = StreamRequestPayloadMiddleware::wrap($service);
        $invokable = $middleware(function($cmd, $req) {});

        // Mock a request with a body whose size returns null
        $filestream = tmpfile();
        $streamMock = $this->getMockBuilder(Psr7\Stream::class)
            ->setConstructorArgs([$filestream])
            ->getMock();
        $streamMock->expects($this->any())
            ->method('getSize')
            ->willReturn(null);
        $requestMock = $this->getMockBuilder(Request::class)
            ->setConstructorArgs(['POST', 'https://foo.com'])
            ->onlyMethods(['getBody'])
            ->getMock();
        $requestMock->expects($this->any())
            ->method('getBody')
            ->willReturn($streamMock);

        $invokable($command, $requestMock);
        fclose($filestream);
    }

    private function generateTestHandlerList()
    {
        $service = $this->generateTestService();
        $serializer = ClientResolver::_default_serializer([
            'api' => $service,
            'endpoint' => ''
        ]);

        $list = new HandlerList();
        $list->prependBuild(Middleware::requestBuilder($serializer), 'builder');
        $list->prependSign(
            StreamRequestPayloadMiddleware::wrap($service),
            'StreamRequestPayloadMiddleware'
        );

        return $list;
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

    private function generateTestService()
    {
        return new Service(
            [
                'metadata' => [
                    "protocol" => "rest-json",
                    "apiVersion" => "2014-01-01"
                ],
                'shapes' => [
                    "BlobLengthStream" => [
                        "type" => "blob",
                        "streaming" => true,
                        "requiresLength" => true,
                    ],
                    "BlobStream" => [
                        "type" => "blob",
                        "streaming" => true,
                    ],
                    "NonStreamingInputShape" => [
                        "type" => "structure",
                        "required" => [
                            "InputString",
                        ],
                        "members" => [
                            "InputString" => [
                                "shape" => "StringType",
                            ],
                        ],
                    ],
                    "StreamingInputShape" => [
                        "type" => "structure",
                        "required" => [
                            "InputStream",
                        ],
                        "members" => [
                            "InputStream" => [
                                "shape" => "BlobStream",
                            ],
                            "InputString" => [
                                "shape" => "StringType",
                            ],
                        ],
                    ],
                    "StreamingLengthInputShape" => [
                        "type" => "structure",
                        "members" => [
                            "InputStream" => [
                                "shape" => "BlobLengthStream",
                            ],
                        ],
                    ],
                    "StringType"=> [
                        "type" => "string",
                    ],
                ],
                'operations' => [
                    "NonStreamingOp" => [
                        "name"=> "NonStreamingOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "NonStreamingInputShape"],
                    ],
                    "StreamingOp" => [
                        "name"=> "StreamingOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "StreamingInputShape"],
                    ],
                    "StreamingLengthOp" => [
                        "name"=> "StreamingLengthOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "StreamingLengthInputShape"],
                    ],
                    "StreamingUnsignedOp" => [
                        "name"=> "StreamingUnsignedOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "StreamingInputShape"],
                        "authtype" => "v4-unsigned-body",
                    ],
                    "StreamingLengthUnsignedOp" => [
                        "name"=> "StreamingLengthUnsignedOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "StreamingLengthInputShape"],
                        "authtype" => "v4-unsigned-body",
                    ],
                ],
            ],
            function () { return []; }
        );
    }
}
