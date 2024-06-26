<?php

namespace Aws\Test\Auth;

use Aws\Api\Service;
use Aws\Auth\AuthSelectionMiddleware;
use Aws\Auth\AuthSchemeResolver;
use Aws\Auth\Exception\UnresolvedAuthSchemeException;
use Aws\AwsClient;
use Aws\CommandInterface;
use Aws\Identity\AwsCredentialIdentity;
use Aws\Identity\BearerTokenIdentity;
use Aws\MockHandler;
use Aws\Result;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class AuthSelectionMiddlewareTest extends TestCase
{
    /**
     * @param $serviceAuth
     * @param $operationAuth
     * @param $expected
     *
     * @dataProvider resolvesAuthSchemeWithoutCRTProvider
     */
    public function testResolvesAuthSchemeWithoutCRT(
        $serviceAuth,
        $operationAuth,
        $expected,
        $unsignedPayload = null
    )
    {
        if (extension_loaded('awscrt')) {
            $this->markTestSkipped();
        }

        $nextHandler = function (CommandInterface $command) use ($expected) {
            $this->assertEquals($expected, $command['@context']['signature_version']);
        };
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $authResolver = new AuthSchemeResolver($credentialProvider);
        $service = $this->generateTestService($serviceAuth, $operationAuth, $unsignedPayload);
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $service);

        if ($expected === 'error') {
            $this->expectException(UnresolvedAuthSchemeException::class);
            $this->expectExceptionMessage(
               'The aws-crt-php extension and AWS credentials are required to use Signature V4A'
            );
        }
        $middleware($command);
    }

    public function ResolvesAuthSchemeWithoutCRTProvider()
    {
        return [
            [
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                [],
                'v4',
            ],
            [
                ['aws.auth#sigv4a', 'aws.auth#sigv4'],
                [],
                'v4'
            ],
            [
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                ['aws.auth#sigv4a', 'aws.auth#sigv4'],
                'v4'
            ],
            [
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                ['aws.auth#sigv4a', 'aws.auth#sigv4'],
                'v4-unsigned-body',
                true
            ],
            [
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                ['smithy.api#noAuth'],
                'anonymous'
            ],
            [
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                ['aws.auth#sigv4a'],
                'error'
            ],
        ];
    }

    /**
     * @param $serviceAuth
     * @param $operationAuth
     * @param $expected
     *
     * @dataProvider ResolvesAuthSchemeWithCRTprovider
     */
    public function testResolvesAuthSchemeWithCRT(
        $serviceAuth,
        $operationAuth,
        $expected,
        $unsignedPayload = null
    )
    {
        if (!extension_loaded('awscrt')) {
            $this->markTestSkipped();
        }

        $nextHandler = function (CommandInterface $command) use ($expected) {
            $this->assertEquals($expected, $command['@context']['signature_version']);
        };
        $service = $this->generateTestService($serviceAuth, $operationAuth, $unsignedPayload);
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $authResolver = new AuthSchemeResolver($credentialProvider);
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $service);

        $middleware($command);
    }

    public function ResolvesAuthSchemeWithCRTprovider()
    {
        return [
            [
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                [],
                'v4'
            ],
            [
                ['aws.auth#sigv4a', 'aws.auth#sigv4'],
                [],
                'v4a'
            ],
            [
                ['aws.auth#sigv4'],
                ['aws.auth#sigv4a'],
                'v4a'
            ],
            [
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                ['smithy.api#noAuth'],
                'anonymous'
            ],
            [
                ['aws.auth#sigv4a'],
                ['aws.auth#sigv4'],
                'v4-unsigned-body',
                true
            ]
        ];
    }

    /**
     * @param $serviceAuth
     * @param $operationAuth
     * @param $identity
     * @param $expected
     *
     * @dataProvider resolvesBearerAuthSchemeProvider
     */
    public function testResolvesBearerAuthScheme(
        $serviceAuth,
        $operationAuth,
        $tokenProvider,
        $expected
    ){
        $nextHandler = function (CommandInterface $command) use ($expected) {
            $this->assertEquals($expected, $command['@context']['signature_version']);
        };
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $authResolver = new AuthSchemeResolver($credentialProvider, $tokenProvider);
        $service = $this->generateTestService($serviceAuth, $operationAuth);
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $service);

        if ($expected === 'error') {
            $this->expectException(UnresolvedAuthSchemeException::class);
            $this->expectExceptionMessage(
                'Could not resolve an authentication scheme: Bearer token credentials must be provided to use Bearer authentication'
            );
        }

        $middleware($command);
    }

    public function resolvesBearerAuthSchemeProvider()
    {
        return [
            [
                ['smithy.api#httpBearerAuth', 'aws.auth#sigv4'],
                [],
                function () {
                    return Promise\Create::promiseFor(
                        $this->createMock(BearerTokenIdentity::class)
                    );
                },
                'bearer'
            ],
            [
                ['smithy.api#httpBearerAuth', 'aws.auth#sigv4'],
                [],
                function () {
                    return Promise\Create::promiseFor(
                        null
                    );
                },
                'v4'
            ],
            [
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                ['smithy.api#httpBearerAuth'],
                function () {
                    return Promise\Create::promiseFor(
                        $this->createMock(BearerTokenIdentity::class)
                    );
                },
                'bearer'
            ],
            [
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                ['smithy.api#httpBearerAuth'],
                function () {
                    return Promise\Create::promiseFor(
                        null
                    );
                },
                'error'
            ],
        ];
    }

    public function testUnknownAuthSchemeThrows()
    {
        $this->expectException(UnresolvedAuthSchemeException::class);
        $this->expectExceptionMessage(
            'Could not resolve an authentication scheme: The service does not support `notAnAuthScheme` authentication.'
        );

        $nextHandler = function (CommandInterface $command) {
            return null;
        };
        $service = $this->generateTestService(['notAnAuthScheme'], []);
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
               null
            );
        };
        $authResolver = new AuthSchemeResolver($credentialProvider);
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $service);

        $middleware($command);
    }

    public function testCommandOverrideResolver()
    {
        $nextHandler = function (CommandInterface $command) {
            $this->assertEquals('v4', $command['@context']['signature_version']);
        };
        $service = $this->generateTestService(['v4'], []);
        $credentialProvider = function () {
            return Promise\Create::promiseFor(
                $this->createMock(AwsCredentialIdentity::class)
            );
        };
        $authResolver = new AuthSchemeResolver($credentialProvider, null, ['notanauthscheme' => 'foo']);
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);
        $command['@context']['auth_scheme_resolver'] = new AuthSchemeResolver($credentialProvider);

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $service);

        $middleware($command);
    }

    public function testMiddlewareAppliedAtInitialization()
    {
        $service = $this->generateTestService([], []);
        $client = $this->generateTestClient($service);
        $list = $client->getHandlerList();
        $this->assertStringContainsString('auth-selection', $list->__toString());
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
                    'handler' => new MockHandler([new Result([])])
                ],
                $args
            )
        );
    }

    private function generateTestService($serviceAuth, $operationAuth, $unsignedPayload = false)
    {
        return new Service(
            [
                'metadata' => [
                    "protocol" => "json",
                    "apiVersion" => "1989-08-05",
                    "jsonVersion" => "1.1",
                    "auth" => $serviceAuth
                ],
                'operations' => [
                    'FooOperation' => [
                        'http' => [
                            'requestUri' => '/',
                            'httpMethod' => 'POST'
                        ],
                        'input' => [
                            'type' => 'structure',
                            'members' => [
                                'FooParam' => [
                                    'type' => 'string',
                                ],
                            ]
                        ],
                        'auth' => $operationAuth,
                        'unsignedpayload' => $unsignedPayload
                    ],
                ]
            ],
            function () { return []; }
        );
    }
}
