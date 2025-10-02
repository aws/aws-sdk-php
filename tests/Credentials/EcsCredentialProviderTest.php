<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Credentials\EcsCredentialProvider;
use Aws\Exception\CredentialsException;
use Aws\Handler\Guzzle\GuzzleHandler;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Ring\Future\CompletedFutureArray;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers \Aws\Credentials\EcsCredentialProvider
 */
class EcsCredentialProviderTest extends TestCase
{
    private $uripath;
    private $fulluripath;
    private $authtokenpath;

    private function clearEnv()
    {
        putenv(EcsCredentialProvider::ENV_URI . '=');
        unset($_SERVER[EcsCredentialProvider::ENV_URI]);

        putenv(EcsCredentialProvider::ENV_FULL_URI . '=');
        unset($_SERVER[EcsCredentialProvider::ENV_FULL_URI]);

        putenv(EcsCredentialProvider::ENV_AUTH_TOKEN . '=');
        unset($_SERVER[EcsCredentialProvider::ENV_AUTH_TOKEN]);

        putenv(EcsCredentialProvider::ENV_AUTH_TOKEN_FILE . '=');
        unset($_SERVER[EcsCredentialProvider::ENV_AUTH_TOKEN_FILE]);

        putenv(EcsCredentialProvider::ENV_RETRIES . '=');
        unset($_SERVER[EcsCredentialProvider::ENV_RETRIES]);

        $dir = sys_get_temp_dir() . '/path/to';

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        return $dir;
    }

    public function set_up()
    {
        $this->uripath = getenv(EcsCredentialProvider::ENV_URI);
        $this->fulluripath = getenv(EcsCredentialProvider::ENV_FULL_URI);
        $this->authtokenpath = getenv(EcsCredentialProvider::ENV_AUTH_TOKEN);
    }

    public function tear_down()
    {
        $this->uripath = getenv(EcsCredentialProvider::ENV_URI);
        $this->fulluripath = getenv(EcsCredentialProvider::ENV_FULL_URI);
        $this->authtokenpath = getenv(EcsCredentialProvider::ENV_AUTH_TOKEN);
    }

    public function testRejectsIfUriPathIsNotAvailable()
    {
        $this->expectExceptionMessage("Error retrieving credentials from container metadata");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $client = function () use (&$responses) {
            return Promise\Create::rejectionFor([
                'exception' => new \Exception('error')
            ]);
        };
        $p = new EcsCredentialProvider(['client' => $client]);
        $p()->wait();
    }

    public function testThrowsExceptionOnInvalidEcsCredential()
    {
        $this->expectExceptionMessage("Unexpected container metadata credentials value");
        $this->expectException(\Aws\Exception\CredentialsException::class);
        $this->getTestCreds(
            $this->getCredentialArray(null, null, null, null, false)
        )->wait();
    }

    public function testLoadsCredentialsAndProfile()
    {
        $t = time() + 1000;
        $c = $this->getTestCreds(
            $this->getCredentialArray('foo', 'baz', null, "@{$t}")
        )->wait();
        $this->assertSame('foo', $c->getAccessKeyId());
        $this->assertSame('baz', $c->getSecretKey());
        $this->assertNull($c->getSecurityToken());
        $this->assertSame($t, $c->getExpiration());
    }

    /** @doesNotPerformAssertions */
    public function testDoesNotRequireConfig()
    {
        new EcsCredentialProvider();
    }

    public function testRequestHeaderWithAuthorisationKey()
    {
        $TOKEN_VALUE = "GA%24102391AAA+BBBBB4==";
        $this->clearEnv();
        $this->expectException(CredentialsException::class);

        $client = $this->getClientWithHeaderMiddleware($TOKEN_VALUE);
        $provider = new EcsCredentialProvider(['client' => $client]);

        putenv(EcsCredentialProvider::ENV_FULL_URI . '=https://localhost/test/metadata');
        putenv(EcsCredentialProvider::ENV_AUTH_TOKEN . '=' . $TOKEN_VALUE);
        $provider()->wait();
    }

    public function testNoProxying()
    {
        $http = getenv('HTTP_PROXY');
        $https = getenv('HTTPS_PROXY');
        $no = getenv('NO_PROXY');

        putenv('HTTP_PROXY=127.0.0.1');
        putenv('HTTPS_PROXY=127.0.0.2');
        putenv('NO_PROXY=127.0.0.3, 127.0.0.4');

        $guzzle = $this->getProxyCheckGuzzleClient();
        $args['client'] = $guzzle;

        $provider = new EcsCredentialProvider($args);
        $provider()->otherwise(function(\Exception $e) {
            $this->fail('Did not override ECS request proxy settings.');
        })->wait();

        putenv("HTTP_PROXY=$http");
        putenv("HTTPS_PROXY=$https");
        putenv("NO_PROXY=$no");
    }

    /**
     * @dataProvider uriAndTokenResolutionProvider
     */
    public function testUriAndTokenResolution($case)
    {
        $dir = $this->clearEnv();
        $expect = $case['expect'];

        if ($expect['type'] === 'error') {
            $this->expectException(CredentialsException::class);
            $this->expectExceptionMessage($expect['reason']);
        }

        foreach ($case['env'] as $key => $value) {
            if ($key === 'AWS_CONTAINER_AUTHORIZATION_TOKEN_FILE'
                && $case['token_file']['type'] === 'success'
            ) {
                putenv("{$key}={$dir}/token");
            } else {
                putenv("{$key}={$value}");
            }
        }

        if (!empty($expect['request']['headers'])) {
            if (!empty($case['token_file']) && $case['token_file']['type'] === 'success') {
                file_put_contents($dir . '/token', $case['token_file']['content']);
            }

            $this->expectException(CredentialsException::class);
            $headerValue = $expect['request']['headers']['Authorization'];
            $client = $this->getClientWithHeaderMiddleware($headerValue);
            $provider = new EcsCredentialProvider(['client' => $client]);
            $provider()->wait();
        }

        $t = time() + 1000;
        $creds = $this->getCredentialArray(
            'foo', 'baz', 'bar', $t, true
        );
        $c = $this->resolveCredentials($creds)->wait();
        $this->assertSame('foo', $c->getAccessKeyId());
        $this->assertSame('baz', $c->getSecretKey());
        $this->assertSame('bar', $c->getSecurityToken());

        if (file_exists($dir . '/token')) {
            unlink($dir . '/token');
        }
    }

    public function uriAndTokenResolutionProvider(): \Generator
    {
        $cases = json_decode(file_get_contents(
            __DIR__ . '/fixtures/ecs/uri-token-resolution.json')
            , true
        );

        foreach ($cases as $case) {
            yield [$case];
        }
    }

    private function getCredentialArray(
        $key, $secret, $token = null, $time = null, $success = true
    ){
        return [
            'Code'            => $success ? 'Success' : 'Failed',
            'AccessKeyId'     => $key,
            'SecretAccessKey' => $secret,
            'Token'           => $token,
            'Expiration'      => $time
        ];
    }

    private function getTestCreds($result, ?Response $more = null)
    {
        $responses = [];
        $responses[] = new Response(200, [], Psr7\Utils::streamFor(json_encode($result)));
        if ($more) {
            $responses[] = $more;
        }
        $this->clearEnv();
        putenv(EcsCredentialProvider::ENV_URI
            . '=/latest/credentials?id=7e9114eb-6b2f-426e-908a-7f0a318e1786');
        $client = function () use (&$responses) {
            if (empty($responses)) {
                throw new \Exception('No responses');
            }
            return Promise\Create::promiseFor(array_shift($responses));
        };
        $args['client'] = $client;

        $provider = new EcsCredentialProvider($args);
        return $provider();
    }

    private function resolveCredentials($result, ?Response $more = null)
    {
        $responses = [];
        $responses[] = new Response(200, [], Psr7\Utils::streamFor(json_encode($result)));
        if ($more) {
            $responses[] = $more;
        }
        $client = function () use (&$responses) {
            if (empty($responses)) {
                throw new \Exception('No responses');
            }
            return Promise\Create::promiseFor(array_shift($responses));
        };
        $args['client'] = $client;

        $provider = new EcsCredentialProvider($args);
        return $provider();
    }

    private function getProxyCheckGuzzleClient()
    {
        $t = (time() + 1000);
        $credentials = $this->getCredentialArray('foo', 'baz', null, "@{$t}");
        return new \Aws\Handler\Guzzle\GuzzleHandler(
            new Client([
                'handler' => function (
                    Psr7\Request $request,
                    array $options
                ) use ($credentials) {
                    $this->assertSame('', $options['proxy']);
                    return Promise\Create::promiseFor(
                        new Response(
                            200,
                            [],
                            Psr7\Utils::streamFor(json_encode($credentials))
                        )
                    );
                }
            ])
        );
    }

    private function getClientWithHeaderMiddleware($expectedValue)
    {
        $stack = HandlerStack::create();
        $middleware = function (callable $handler) use ($expectedValue) {
            return function (RequestInterface $request, array $options) use ($handler, $expectedValue) {
                $this->assertTrue($request->hasHeader('Authorization'));
                $this->assertEquals($request->getHeader('Authorization'), $expectedValue);
                return $handler($request, $options);
            };
        };
        $stack->push($middleware);
        $baseClient = new Client(['handler' => $stack]);

        return new GuzzleHandler($baseClient);
    }

    public function testResolveCredentialsWithAccountId()
    {
        $testAccountId = 'foo';
        $expiration = time() + 1000;
        $testHandler = function (RequestInterface $_) use ($expiration, $testAccountId) {
            $jsonResponse = <<<EOF
{
    "AccessKeyId": "foo",
    "SecretAccessKey": "foo",
    "Token": "bazz",
    "Expiration": "@$expiration",
    "AccountId": "$testAccountId"
}
EOF;
            return Promise\Create::promiseFor(new Response(200, [], $jsonResponse));
        };
        $provider = new EcsCredentialProvider([
            'client' => $testHandler
        ]);
        try {
            /** @var Credentials $credentials */
            $credentials = $provider()->wait();
            $this->assertSame('foo', $credentials->getAccessKeyId());
            $this->assertSame('foo', $credentials->getSecretKey());
            $this->assertSame('bazz', $credentials->getSecurityToken());
            $this->assertSame($expiration, $credentials->getExpiration());
            $this->assertSame($testAccountId, $credentials->getAccountId());
        } catch (GuzzleException $e) {
            self::fail($e->getMessage());
        }

    }

    public function testResolveCredentialsWithAccountIdFromArn()
    {
        $testAccountId = 'foo';
        $testArn = "arn:aws:iam::$testAccountId:role/role_name";
        $expiration = time() + 1000;
        $testHandler = function (RequestInterface $_) use ($expiration, $testArn) {
            $jsonResponse = <<<EOF
{
    "AccessKeyId": "foo",
    "SecretAccessKey": "foo",
    "Token": "bazz",
    "Expiration": "@$expiration",
    "RoleArn": "$testArn"
}
EOF;
            return Promise\Create::promiseFor(new Response(200, [], $jsonResponse));
        };
        $provider = new EcsCredentialProvider([
            'client' => $testHandler
        ]);
        try {
            /** @var Credentials $credentials */
            $credentials = $provider()->wait();
            $this->assertSame('foo', $credentials->getAccessKeyId());
            $this->assertSame('foo', $credentials->getSecretKey());
            $this->assertSame('bazz', $credentials->getSecurityToken());
            $this->assertSame($expiration, $credentials->getExpiration());
            $this->assertSame($testAccountId, $credentials->getAccountId());
        } catch (GuzzleException $e) {
            self::fail($e->getMessage());
        }
    }

    /**
     * @dataProvider successTestCases
     *
     * @param callable $client
     * @param CredentialsInterface $expected
     */
    public function testHandlesSuccessScenarios(
        callable $client,
        CredentialsInterface $expected
    ) {
        $provider = new EcsCredentialProvider([
            'client' => $client,
            'retries' => 5
        ]);

        /** @var CredentialsInterface $credentials */
        $credentials = $provider()->wait();
        $this->assertSame(
            $expected->getAccessKeyId(),
            $credentials->getAccessKeyId()
        );
        $this->assertSame(
            $expected->getSecretKey(),
            $credentials->getSecretKey()
        );
        $this->assertEquals(
            $expected->getSecurityToken(),
            $credentials->getSecurityToken()
        );
        $this->assertEquals(
            $expected->getExpiration(),
            $credentials->getExpiration()
        );
    }

    public function successTestCases()
    {
        $expiry = time() + 1000;
        $creds = ['foo_key', 'baz_secret', 'qux_token', "@{$expiry}"];
        $credsObject = new Credentials($creds[0], $creds[1], $creds[2], $expiry);

        $connectException = new ConnectException(
            'cURL error 28: Connection timed out after 1000 milliseconds',
            new Psr7\Request('GET', '/latest')
        );
        $rejectionConnection = Promise\Create::rejectionFor([
            'exception' => $connectException,
        ]);

        $promiseCreds = Promise\Create::promiseFor(
            new Response(200, [], Psr7\Utils::streamFor(
                json_encode(call_user_func_array(
                    [$this, 'getCredentialArray'],
                    $creds
                )))
            )
        );

        return [
            'Happy path' => [
                $this->getTestClient([], $creds),
                $credsObject
            ],
            'With retries for ConnectException (Guzzle 7)' => [
                $this->getTestClient(
                    [
                        $rejectionConnection,
                        $promiseCreds
                    ],
                    $creds
                ),
                $credsObject
            ],
            'With 4 retries for ConnectException (Guzzle 7)' => [
                $this->getTestClient(
                    [
                        $rejectionConnection,
                        $rejectionConnection,
                        $rejectionConnection,
                        $promiseCreds
                    ],
                    $creds
                ),
                $credsObject
            ],
        ];
    }

    /**
     * @dataProvider failureTestCases
     *
     * @param $client
     * @param \Exception $expected
     */
    public function testHandlesFailureScenarios($client, \Exception $expected)
    {
        $provider = new EcsCredentialProvider([
            'client' => $client,
            'retries' => 1,
        ]);

        try {
            $provider()->wait();
            $this->fail('Provider should have thrown an exception.');
        } catch (\Exception $e) {
            $this->assertInstanceOf(get_class($expected), $e);
            $this->assertSame($expected->getMessage(), $e->getMessage());
        }
    }

    public function failureTestCases()
    {
        $getRequest = new Psr7\Request('GET', '/latest');

        $rejectionCreds = Promise\Create::rejectionFor([
            'exception' => new RequestException(
                '401 Unathorized',
                $getRequest,
                new Psr7\Response(401)
            )
        ]);
        $connectException = new ConnectException(
            'cURL error 28: Connection timed out after 1000 milliseconds',
            new Psr7\Request('GET', '/latest')
        );
        $rejectionConnection = Promise\Create::rejectionFor([
            'exception' => $connectException,
        ]);

        return [
            'Non-retryable error' => [
                $this->getTestClient(
                    [
                        $rejectionCreds,
                    ]
                ),
                new CredentialsException(
                    'Error retrieving credentials from container metadata after attempt 0/1 (401 Unathorized)'
                )
            ],
            'Retryable error' => [
                $this->getTestClient(
                    [
                        $rejectionConnection,
                        $rejectionConnection,
                    ]
                ),
                new CredentialsException(
                    'Error retrieving credentials from container metadata after attempt 1/1 (cURL error 28: Connection timed out after 1000 milliseconds)'
                )
            ],
        ];
    }

    public function testReadsRetriesFromEnvironment()
    {
        putenv('AWS_METADATA_SERVICE_NUM_ATTEMPTS=1');

        $connectException = new ConnectException(
            'cURL error 28: Connection timed out after 1000 milliseconds',
            new Psr7\Request('GET', '/latest')
        );
        $rejectionConnection = Promise\Create::rejectionFor([
            'exception' => $connectException,
        ]);

        $provider = new EcsCredentialProvider([
            'client' => $this->getTestClient(
                [
                    $rejectionConnection,
                    $rejectionConnection,
                ]
            ),
        ]);

        $expected = new CredentialsException(
            'Error retrieving credentials from container metadata after attempt 1/1 (cURL error 28: Connection timed out after 1000 milliseconds)'
        );

        try {
            $provider()->wait();
            $this->fail('Provider should have thrown an exception.');
        } catch (\Exception $e) {
            $this->assertInstanceOf(get_class($expected), $e);
            $this->assertSame($expected->getMessage(), $e->getMessage());
        }

        $this->clearEnv();
    }

    public function testAttemptsAreResetWhenProviderIsWhenSameProviderIsReused()
    {
        // Test attempts are reset.
        $expiry = time() + 1000;
        $creds = ['foo_key', 'baz_secret', 'qux_token', "@{$expiry}"];

        $credsObject = new Credentials($creds[0], $creds[1], $creds[2], $expiry);

        $connectException = new ConnectException(
            'cURL error 28: Connection timed out after 1000 milliseconds',
            new Psr7\Request('GET', '/latest')
        );
        $rejectionConnection = Promise\Create::rejectionFor([
            'exception' => $connectException,
        ]);
        $promiseCreds = Promise\Create::promiseFor(
            new Response(200, [], Psr7\Utils::streamFor(
                json_encode(call_user_func_array(
                    [$this, 'getCredentialArray'],
                    $creds
                )))
            )
        );

        $provider = new EcsCredentialProvider([
            'client' => $this->getTestClient(
                [
                    $rejectionConnection,
                    $rejectionConnection,
                    $promiseCreds,
                ],
                $creds
            ),
            'retries' => 2
        ]);

        $expected = new CredentialsException(
            'Error retrieving credentials from container metadata after attempt 1/1 (cURL error 28: Connection timed out after 1000 milliseconds)'
        );

        try {
            $credentials = $provider()->wait();
            $this->assertSame(
                $credsObject->getAccessKeyId(),
                $credentials->getAccessKeyId()
            );
            $this->assertSame(
                $credsObject->getSecretKey(),
                $credentials->getSecretKey()
            );
            $this->assertEquals(
                $credsObject->getSecurityToken(),
                $credentials->getSecurityToken()
            );
            $this->assertEquals(
                $credsObject->getExpiration(),
                $credentials->getExpiration()
            );
        } catch (\Exception $e) {
            $this->assertInstanceOf(get_class($expected), $e);
            $this->assertSame($expected->getMessage(), $e->getMessage());
        }

        $this->assertSame(3, $provider->getAttempts());

        try {
            $provider();
        } catch (\Throwable $throwable) {
            $this->assertSame(0, $provider->getAttempts());
        }
    }

    /**
     * @param Promise\PromiseInterface[] $responses
     * @param array $creds
     * @return \Closure
     */
    private function getTestClient(
        $responses = [],
        $creds = ['foo_key', 'baz_secret', 'qux_token', null]
    ) {
        $getRequests = 0;

        return function (RequestInterface $request) use (
            $responses,
            &$getRequests,
            $creds
        ) {
            if (!empty($responses)) {
                return $responses[$getRequests++];
            }
            return Promise\Create::promiseFor(
                new Response(
                    200,
                    [],
                    Psr7\Utils::streamFor(
                        json_encode(call_user_func_array(
                            [$this, 'getCredentialArray'],
                            $creds
                        ))
                    )
                )
            );
        };
    }
}
