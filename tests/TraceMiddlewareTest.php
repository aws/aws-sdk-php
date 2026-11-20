<?php
namespace Aws\Test;

use Aws\Api\Service;
use Aws\Backup\BackupClient;
use Aws\BedrockAgentCoreControl\BedrockAgentCoreControlClient;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\Command;
use Aws\EventBridge\EventBridgeClient;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\TraceMiddleware;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\FnStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TraceMiddleware::class)]
class TraceMiddlewareTest extends TestCase
{
    public function testEmitsDebugInfo()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function ($cmd, $req) {
            return Promise\Create::promiseFor(new Result([
                'baz' => 'bar',
                'bam' => 'qux'
            ]));
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                $req = $req->withHeader('foo', 'bar');
                return $handler($cmd, $req);
            };
        });
        $list->appendValidate(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                unset($cmd['b']);
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn]));
        $handler = $list->resolve();
        $command = new Command('foo', ['a' => '1', 'b' => '2']);
        $request = new Request('GET', 'http://foo.com');
        $handler($command, $request);
        Promise\Utils::queue()->run();
        $this->assertStringContainsString("-> Entering step init, name ''", $str);
        $this->assertStringContainsString('command was set to array', $str);
        $this->assertStringContainsString('request was set to array', $str);
        $this->assertStringContainsString("<- Leaving step init, name ''", $str);
        $this->assertStringContainsString('result was set to array', $str);
        $this->assertStringContainsString('Inclusive step time: ', $str);
        $this->assertStringContainsString('command.params.b was unset', $str);
        $this->assertStringContainsString('no changes', $str);
        $this->assertStringContainsString("<- Leaving step validate, name ''", $str);
    }

    public function testTracksExceptions()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function ($cmd, $req) {
            return Promise\Create::promiseFor(new Result());
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                $req = $req->withHeader('foo', 'bar');
                return $handler($cmd, $req);
            };
        });
        $list->appendValidate(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                return new RejectedPromise(new \Exception('Oh no!'));
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn]));
        $handler = $list->resolve();
        $command = new Command('foo');
        $request = new Request('GET', 'http://foo.com');
        $handler($command, $request);
        Promise\Utils::queue()->run();
        $this->assertStringContainsString('error was set to array', $str);
        $this->assertStringContainsString('trace', $str);
        $this->assertStringContainsString('class', $str);
        $this->assertStringContainsString('message', $str);
        $this->assertStringContainsString('string(6) "Oh no!"', $str);
    }

    public function testTracksAwsSpecificExceptions()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function ($cmd, $req) {
            return Promise\Create::promiseFor(new Result());
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                $req = $req->withHeader('foo', 'bar');
                return $handler($cmd, $req);
            };
        });
        $list->appendValidate(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                return new RejectedPromise(new AwsException('error', $cmd, [
                    'request'  => $req,
                    'response' => new Response(200)
                ]));
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn]));
        $handler = $list->resolve();
        $command = new Command('foo');
        $request = new Request('GET', 'http://foo.com');
        $handler($command, $request);
        Promise\Utils::queue()->run();
        $this->assertStringContainsString('error was set to array', $str);
        $this->assertStringContainsString('trace', $str);
        $this->assertStringContainsString('class', $str);
        $this->assertStringContainsString('message', $str);
        $this->assertStringContainsString('string(5) "error"', $str);
    }

    #[DataProvider('authStringProvider')]
    public function testScrubsAuthStrings($key, $signature, array $headers)
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();

        $list->setHandler(function ($cmd, $req) use ($key) {
            // ensure that http level debug information is filtered as well.
            fwrite($cmd['@http']['debug'], "Credential=$key/...\n");
            return Promise\Create::promiseFor(new Result());
        });

        $list->appendInit(function ($handler) {
            return function ($cmd, $req) use ($handler) {
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn]));
        $handler = $list->resolve();
        $command = new Command('foo');
        $request = new Request(
            'GET',
            "http://foo.com?Signature=$signature&AWSAccessKeyId=$key",
            array_map(function (array $h) { return $h['raw']; }, $headers)
        );
        $handler($command, $request);

        $this->assertStringNotContainsString($key, $str);
        $this->assertStringNotContainsString($signature, $str);
        foreach ($headers as $header) {
            $this->assertStringNotContainsString($header['raw'], $str);
            $this->assertStringContainsString($header['scrubbed'], $str);
        }
    }

    #[DataProvider('redactionProvider')]
    public function testRedactsSensitiveCommandParams(
        array $data,
        string $leaked,
        string $placeholder
    ) {
        $str = $this->traceOp('Op', $data, new Result());

        $this->assertStringContainsString('command was set to array', $str);
        $this->assertStringNotContainsString($leaked, $str);
        $this->assertStringContainsString($placeholder, $str);
        $this->assertStringContainsString('public-value', $str);
    }

    #[DataProvider('redactionProvider')]
    public function testRedactsSensitiveResultData(
        array $data,
        string $leaked,
        string $placeholder
    ) {
        $str = $this->traceOp('Op', [], new Result($data));

        $this->assertStringContainsString('result was set to array', $str);
        $this->assertStringNotContainsString($leaked, $str);
        $this->assertStringContainsString($placeholder, $str);
        $this->assertStringContainsString('public-value', $str);
    }

    public static function redactionProvider(): array
    {
        $public = ['Public' => 'public-value'];
        return [
            'top-level member named like its target' => [
                ['SecretString' => 'leak-top-level'] + $public,
                'leak-top-level',
                '[SecretString]',
            ],
            'member name differs from target' => [
                ['Password' => 'leak-password'] + $public,
                'leak-password',
                '[SecretString]',
            ],
            'list member' => [
                ['Items' => ['leak-list-1', 'leak-list-2']] + $public,
                'leak-list',
                '[SecretString]',
            ],
            'map value' => [
                ['ValMap' => ['k' => 'leak-map-value']] + $public,
                'leak-map-value',
                '[SecretString]',
            ],
            'map key' => [
                ['KeyMap' => ['leak-map-key' => 'v']] + $public,
                'leak-map-key',
                '[SecretString]#1',
            ],
            'union member' => [
                ['Choice' => ['Choice' => 'leak-union']] + $public,
                'leak-union',
                '[SecretString]',
            ],
            'nested structure member' => [
                ['Nested' => ['Inner' => 'leak-nested']] + $public,
                'leak-nested',
                '[SecretString]',
            ],
        ];
    }

    public function testDoesNotRedactMapKeyMatchingSensitiveShapeName()
    {
        $data = ['Plain' => ['SecretString' => 'plain-map-value']];

        $params = $this->traceOp('Op', $data, new Result());
        $this->assertStringContainsString('plain-map-value', $params);
        $this->assertStringNotContainsString('[SecretString]', $params);

        $result = $this->traceOp('Op', [], new Result($data));
        $this->assertStringContainsString('plain-map-value', $result);
        $this->assertStringNotContainsString('[SecretString]', $result);
    }

    public function testDistinctSensitiveMapKeysStayDistinct()
    {
        $str = $this->traceOp(
            'Op',
            ['KeyMap' => ['leak-a' => 'value-a', 'leak-b' => 'value-b']],
            new Result()
        );

        $this->assertStringNotContainsString('leak-a', $str);
        $this->assertStringNotContainsString('leak-b', $str);
        $this->assertStringContainsString('[SecretString]#1', $str);
        $this->assertStringContainsString('[SecretString]#2', $str);
        $this->assertStringContainsString('value-a', $str);
        $this->assertStringContainsString('value-b', $str);
    }

    public function testMasksBodyOfOperationWithSensitiveInput()
    {
        $body = '{"Password":"leak-body-secret"}';
        $str = $this->traceOp(
            'Op',
            [],
            new Result(),
            new Request('POST', '/', [], $body)
        );

        $this->assertStringNotContainsString('leak-body-secret', $str);
        $this->assertStringContainsString(
            '[REDACTED body, size=' . strlen($body) . ']',
            $str
        );
    }

    public function testKeepsBodyOfOperationWithoutSensitiveData()
    {
        $str = $this->traceOp(
            'PublicOp',
            ['Public' => 'public-value'],
            new Result(),
            new Request('POST', '/', [], '{"Public":"public-body"}')
        );

        $this->assertStringContainsString('public-body', $str);
        $this->assertStringNotContainsString('[REDACTED', $str);
    }

    public function testMasksResponseBodyOfOperationWithSensitiveOutput()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function ($cmd, $req) {
            return new RejectedPromise(new AwsException('error', $cmd, [
                'request'  => $req,
                'response' => new Response(
                    400,
                    [],
                    '{"Password":"leak-response-body"}'
                ),
            ]));
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req) use ($handler) {
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware(
            ['logfn' => $logfn, 'http' => false],
            $this->generateTestService()
        ));
        $handler = $list->resolve();
        $handler(new Command('Op'), new Request('POST', '/'));
        Promise\Utils::queue()->run();

        $this->assertStringContainsString('error was set to array', $str);
        $this->assertStringNotContainsString('leak-response-body', $str);
        $this->assertStringContainsString('[REDACTED body, size=', $str);
    }

    public function testUnknownCommandIsNotRedacted()
    {
        $data = ['Password' => 'unmodeled-value'];

        $withService = $this->traceOp('foo', $data, new Result($data));
        $this->assertStringContainsString('unmodeled-value', $withService);
        $this->assertStringNotContainsString('[SecretString]', $withService);

        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function () use ($data) {
            return Promise\Create::promiseFor(new Result($data));
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req) use ($handler) {
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn, 'http' => false]));
        $handler = $list->resolve();
        $handler(new Command('Op', $data), new Request('POST', '/', [], 'body'));
        Promise\Utils::queue()->run();

        $this->assertStringContainsString('unmodeled-value', $str);
        $this->assertStringContainsString('body', $str);
    }

    public function testRedactsCognitoSignUpPasswordInTrace()
    {
        $secret = 'Pw-Leak-Marker-7f3a9c';
        $str = $this->traceCognitoSignUp($secret, [
            'http' => false,
            'stream_size' => 0,
        ]);

        $this->assertStringContainsString('command.params', $str);
        $this->assertStringNotContainsString($secret, $str);
        $this->assertStringContainsString('[PasswordType]', $str);
    }

    public function testRedactsCognitoSignUpPasswordInRequestBody()
    {
        $secret = 'Pw-Leak-Marker-7f3a9c';
        $str = $this->traceCognitoSignUp($secret, ['http' => false]);

        $this->assertStringContainsString('request.body', $str);
        $this->assertStringNotContainsString($secret, $str);
        $this->assertStringContainsString('[REDACTED body, size=', $str);
    }

    private function traceCognitoSignUp(string $secret, array $debug): string
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $handler = new MockHandler();
        $handler->append(new Result(['UserConfirmed' => false]));
        $client = new CognitoIdentityProviderClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'AKIAEXAMPLE', 'secret' => 'example'],
            'handler' => $handler,
            'debug' => ['logfn' => $logfn] + $debug,
        ]);
        $client->signUp([
            'ClientId' => 'client',
            'Username' => 'alice',
            'Password' => $secret,
        ]);

        return $str;
    }

    public function testRedactsSensitiveHeadersInTraceAndWireOutput()
    {
        $key = 'SseC-Leak-Marker-0123456789abcdef';
        $str = $this->traceClientCall(S3Client::class, 'putObject', [
            'Bucket' => 'bucket',
            'Key' => 'key',
            'Body' => 'x',
            'SSECustomerAlgorithm' => 'AES256',
            'SSECustomerKey' => $key,
        ]);

        $this->assertStringNotContainsString($key, $str);
        $this->assertStringNotContainsString(base64_encode($key), $str);
        $this->assertStringContainsString('[SSECustomerKey]', $str);
        $this->assertStringContainsString(
            '> x-amz-server-side-encryption-customer-key: [SSECustomerKey]',
            $str
        );
    }

    public function testRedactsSensitiveQueryParams()
    {
        $secret = 'Query-Leak-Marker-5e1d';
        $str = $this->traceClientCall(
            BackupClient::class,
            'revokeRestoreAccessBackupVault',
            [
                'BackupVaultName' => 'vault',
                'RestoreAccessBackupVaultArn' => 'arn',
                'RequesterComment' => $secret,
            ]
        );

        $this->assertStringNotContainsString($secret, $str);
        $this->assertStringContainsString('requesterComment=[RequesterComment]', $str);
        $this->assertStringContainsString('[REDACTED target]', $str);
    }

    public function testRedactsPathWithSensitiveLabels()
    {
        $endpoint = 'Path-Leak-Marker-9b2c';
        $str = $this->traceClientCall(
            BedrockAgentCoreControlClient::class,
            'getAgentRuntimeEndpoint',
            ['agentRuntimeId' => 'runtime', 'endpointName' => $endpoint]
        );

        $this->assertStringNotContainsString($endpoint, $str);
        $this->assertStringContainsString('[REDACTED path]', $str);
        $this->assertStringContainsString('[REDACTED target]', $str);
    }

    /**
     * Calls a client with `http` debug on. Its HTTP handler writes
     * curl-style request lines to the debug resource, as CURLOPT_VERBOSE
     * does.
     */
    private function traceClientCall(string $class, string $method, array $args): string
    {
        $str = '';
        $client = new $class([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'AKIAEXAMPLE', 'secret' => 'example'],
            'http_handler' => function ($request, array $options) {
                if (is_resource($options['debug'] ?? null)) {
                    $lines = '> ' . $request->getMethod() . ' '
                        . $request->getRequestTarget() . " HTTP/1.1\n";
                    foreach ($request->getHeaders() as $name => $values) {
                        $lines .= "> {$name}: " . implode(', ', $values) . "\n";
                    }
                    fwrite($options['debug'], $lines);
                }
                return Promise\Create::promiseFor(new Response(200));
            },
            'debug' => ['logfn' => function ($value) use (&$str) { $str .= $value; }],
        ]);
        $client->{$method}($args);

        return $str;
    }

    private function traceOp(
        string $name,
        array $params,
        Result $result,
        ?Request $request = null
    ): string {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function () use ($result) {
            return Promise\Create::promiseFor($result);
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req) use ($handler) {
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware(
            ['logfn' => $logfn, 'http' => false],
            $this->generateTestService()
        ));
        $handler = $list->resolve();
        $handler(
            new Command($name, $params),
            $request ?: new Request('POST', '/')
        );
        Promise\Utils::queue()->run();

        return $str;
    }

    public function testEmitsForMiddlewareThatDoesNotReturnRequest()
    {

        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $handler = new MockHandler();
        $handler->append(new Result(['success']));
        $client = new EventBridgeClient([
            'region' => 'us-west-2',
            'handler' => $handler,
            'debug' => [
                'logfn' => $logfn
            ]

        ]);
        $result = $client->listRules();

        $this->assertStringContainsString("Leaving step build, name 'endpoint-resolution'", $str);
        $this->assertEquals('success', $result[0]);
    }

    public static function authStringProvider(): array
    {
        return [
            // v4 signature example from http://docs.aws.amazon.com/AmazonS3/latest/API/sigv4-auth-using-authorization-header.html
            [
                'AKIAIOSFODNN7EXAMPLE', // key
                'fe5f80f77d5fa3beca038a248ff027d0445342fe2855ddc963176630326f1024', // signature
                [ // headers
                    'Authorization' => [
                        'raw' => 'AWS4-HMAC-SHA256 Credential=AKIAIOSFODNN7EXAMPLE/20130524/us-east-1/s3/aws4_request, SignedHeaders=host;range;x-amz-date, Signature=fe5f80f77d5fa3beca038a248ff027d0445342fe2855ddc963176630326f1024',
                        'scrubbed' => 'AWS4-HMAC-SHA256 Credential=[KEY]/20130524/us-east-1/s3/aws4_request, SignedHeaders=host;range;x-amz-date, Signature=[SIGNATURE]',
                    ],
                    'X-Amz-Security-Token' => [ // STS token example from http://docs.aws.amazon.com/STS/latest/APIReference/API_GetSessionToken.html
                        'raw' => 'AQoEXAMPLEH4aoAH0gNCAPyJxz4BlCFFxWNE1OPTgk5TthT+FvwqnKwRcOIfrRh3c/LTo6UDdyJwOOvEVPvLXCrrrUtdnniCEXAMPLE/IvU1dYUg2RVAJBanLiHb4IgRmpRV3zrkuWJOgQs8IZZaIv2BXIa2R4OlgkBN9bkUDNCJiBeb/AXlzBBko7b15fjrBs2+cTQtpZ3CYWFXG8C5zqx37wnOE49mRl/+OtkIKGO7fAE',
                        'scrubbed' => '[TOKEN]',
                    ],
                    'Query-String' => [
                        'raw' => 'X-Amz-Security-Token=AQoEXAMPLEH4aoAH0gNCAPyJxz4BlCFFxWNE1OPTgk5TthT+FvwqnKwRcOIfrRh3c/LTo6UDdyJwOOvEVPvLXCrrrUtdnniCEXAMPLE/IvU1dYUg2RVAJBanLiHb4IgRmpRV3zrkuWJOgQs8IZZaIv2BXIa2R4OlgkBN9bkUDNCJiBeb/AXlzBBko7b15fjrBs2+cTQtpZ3CYWFXG8C5zqx37wnOE49mRl/+OtkIKGO7fAE&foo=bar',
                        'scrubbed' => 'X-Amz-Security-Token=[TOKEN]&foo=bar'
                    ],
                ],
            ],
        ];
    }

    public function testCanScrubOnArbitraryPatterns()
    {
        $scrubPatterns = [
            '/SuperSecret=[^&]+/i' => 'SuperSecret=[FOR_OFFICIAL_EYES_ONLY]'
        ];
        $toScrub = 'OhNoIShouldBeHidden';
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();

        $list->setHandler(function ($cmd, $req) {
            return Promise\Create::promiseFor(new Result());
        });

        $list->appendInit(function ($handler) {
            return function ($cmd, $req) use ($handler) {
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware([
            'logfn' => $logfn,
            'auth_strings' => $scrubPatterns,
        ]));

        $handler = $list->resolve();
        $command = new Command('foo');
        $request = new Request(
            'GET',
            "http://foo.com?SuperSecret=$toScrub"
        );
        $handler($command, $request);

        $this->assertStringNotContainsString($toScrub, $str);
        foreach (array_values($scrubPatterns) as $scrubbed) {
            $this->assertStringContainsString($scrubbed, $str);
        }
    }

    public function testDefersDebugResourceCloseForStreamedResponse()
    {
        $list = new HandlerList();
        $list->setHandler(function ($cmd) {
            $source = Utils::streamFor('payload');
            $debug = $cmd['@http']['debug'];
            $body = FnStream::decorate($source, [
                'read' => function ($length) use ($source, $debug) {
                    fwrite($debug, "stream notification\n");
                    return $source->read($length);
                },
            ]);
            return Promise\Create::promiseFor(new Result(['Body' => $body]));
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => function () {}]));

        $command = new Command('GetObject');
        $command['@http']['stream'] = true;
        $result = $list->resolve()(
            $command,
            new Request('GET', 'http://foo/')
        )->wait();

        $this->assertSame('payload', $result['Body']->read(7));
    }

    private function generateTestService()
    {
        return new Service(
            [
                'metadata' => [
                    'protocol' => 'json',
                    'apiVersion' => '2014-01-01',
                    'jsonVersion' => '1.1',
                ],
                'shapes' => [
                    'SecretString' => ['type' => 'string', 'sensitive' => true],
                    'PlainString' => ['type' => 'string'],
                    'SecretList' => [
                        'type' => 'list',
                        'member' => ['shape' => 'SecretString'],
                    ],
                    'SecretValueMap' => [
                        'type' => 'map',
                        'key' => ['shape' => 'PlainString'],
                        'value' => ['shape' => 'SecretString'],
                    ],
                    'SecretKeyMap' => [
                        'type' => 'map',
                        'key' => ['shape' => 'SecretString'],
                        'value' => ['shape' => 'PlainString'],
                    ],
                    'PlainMap' => [
                        'type' => 'map',
                        'key' => ['shape' => 'PlainString'],
                        'value' => ['shape' => 'PlainString'],
                    ],
                    'SecretUnion' => [
                        'type' => 'structure',
                        'union' => true,
                        'members' => [
                            'Choice' => ['shape' => 'SecretString'],
                            'Open' => ['shape' => 'PlainString'],
                        ],
                    ],
                    'Nested' => [
                        'type' => 'structure',
                        'members' => [
                            'Inner' => ['shape' => 'SecretString'],
                        ],
                    ],
                    'Payload' => [
                        'type' => 'structure',
                        'members' => [
                            'SecretString' => ['shape' => 'SecretString'],
                            'Password' => ['shape' => 'SecretString'],
                            'Items' => ['shape' => 'SecretList'],
                            'ValMap' => ['shape' => 'SecretValueMap'],
                            'KeyMap' => ['shape' => 'SecretKeyMap'],
                            'Plain' => ['shape' => 'PlainMap'],
                            'Choice' => ['shape' => 'SecretUnion'],
                            'Nested' => ['shape' => 'Nested'],
                            'Public' => ['shape' => 'PlainString'],
                        ],
                    ],
                    'PublicPayload' => [
                        'type' => 'structure',
                        'members' => [
                            'Public' => ['shape' => 'PlainString'],
                            'Plain' => ['shape' => 'PlainMap'],
                        ],
                    ],
                ],
                'operations' => [
                    'Op' => [
                        'name' => 'Op',
                        'http' => ['method' => 'POST', 'requestUri' => '/'],
                        'input' => ['shape' => 'Payload'],
                        'output' => ['shape' => 'Payload'],
                    ],
                    'PublicOp' => [
                        'name' => 'PublicOp',
                        'http' => ['method' => 'POST', 'requestUri' => '/'],
                        'input' => ['shape' => 'PublicPayload'],
                        'output' => ['shape' => 'PublicPayload'],
                    ],
                ],
            ],
            function () { return []; }
        );
    }
}
