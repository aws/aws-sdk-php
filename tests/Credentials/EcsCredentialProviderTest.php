<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Credentials\EcsCredentialProvider;
use Aws\Exception\CredentialsException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Ring\Future\CompletedFutureArray;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Credentials\EcsCredentialProvider
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
        $this->expectExceptionMessage("Error retrieving credential from ECS");
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
        $this->expectExceptionMessage("Unexpected ECS credential value");
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

    public function testRequestHeaderWithAuthorisationKey(){
        $this->clearEnv();
        $provider = new EcsCredentialProvider();

        $TOKEN_VALUE = "GA%24102391AAA+BBBBB4==";
        $AUTH_KEYNAME = 'Authorization';
        putenv(EcsCredentialProvider::ENV_FULL_URI . '=http://localhost/test/metadata');
        putenv(EcsCredentialProvider::ENV_AUTH_TOKEN . '=' . $TOKEN_VALUE);

        $header = $provider->setHeaderForAuthToken();
        $this->assertArrayHasKey($AUTH_KEYNAME, $header);
        $this->assertSame($TOKEN_VALUE, $header[$AUTH_KEYNAME]);
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

    private function getTestCreds($result, Response $more = null)
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

    private function getProxyCheckGuzzleClient()
    {
        $t = (time() + 1000);
        $credentials = $this->getCredentialArray('foo', 'baz', null, "@{$t}");
        $version = \Aws\guzzle_major_version();

        if ($version === 5) {
            return new \Aws\Handler\GuzzleV5\GuzzleHandler(
                new Client([
                    'handler' => function (
                        array $request
                    ) use ($credentials) {
                        $this->assertSame('', $request['client']['proxy']);
                        return new CompletedFutureArray([
                            'status'  => 200,
                            'headers' => [],
                            'body'    => Psr7\Utils::streamFor(
                                json_encode($credentials)
                            ),
                        ]);
                    }
                ])
            );
        }

        if ($version === 6 || $version === 7) {
            return new \Aws\Handler\GuzzleV6\GuzzleHandler(
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

        throw new \RuntimeException('Unknown Guzzle version: ' . $version);
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
     * @param PromiseInterface[] $responses
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
            $creds,
            &$getRequests
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

            return Promise\Create::rejectionFor([
                'exception' => new \Exception(
                    'Invalid request passed to test server'
                )
            ]);
        };
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
                    'Error retrieving credential from ECS after attempt 0/1 (401 Unathorized)'
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
                    'Error retrieving credential from ECS after attempt 1/1 (cURL error 28: Connection timed out after 1000 milliseconds)'
                )
            ],
        ];
    }
}
