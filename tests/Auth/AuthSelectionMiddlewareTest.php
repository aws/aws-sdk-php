<?php

namespace Aws\Test\Auth;

use Aws\Api\Service;
use Aws\Auth\AuthSelectionMiddleware;
use Aws\Auth\AuthSchemeResolver;
use Aws\Auth\Exception\AuthException;
use Aws\AwsClient;
use Aws\CommandInterface;
use Aws\Credentials\Credentials;
use Aws\Identity\AwsCredentialIdentity;
use Aws\Identity\BearerTokenIdentity;
use Aws\Identity\IdentityInterface;
use Aws\MockHandler;
use Aws\Result;
use Aws\Token\Token;
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
        $expected
    )
    {
        if (extension_loaded('awscrt')) {
            $this->markTestSkipped();
        }

        $nextHandler = function (CommandInterface $command) use ($expected) {
            $this->assertEquals($expected, $command['@context']['signature_version']);
        };
        $authResolver = new AuthSchemeResolver();
        $service = $this->generateTestService($serviceAuth, $operationAuth);
        $identity = function () {
            return Promise\Create::promiseFor(
                $this->createMock(IdentityInterface::class)
            );
        };
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $identity, $service);

        if ($expected === 'error') {
            $this->expectException(AuthException::class);
            $this->expectExceptionMessage(
                'Could not resolve an authentication scheme: The service does not support `aws.auth#sigv4a` authentication.'
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
                'v4'
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
                ['smithy.auth#noAuth'],
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
        $expected
    )
    {
        if (!extension_loaded('awscrt')) {
            $this->markTestSkipped();
        }

        $nextHandler = function (CommandInterface $command) use ($expected) {
            $this->assertEquals($expected, $command['@context']['signature_version']);
        };
        $authResolver = new AuthSchemeResolver();
        $service = $this->generateTestService($serviceAuth, $operationAuth);
        $identity = function () {
            return Promise\Create::promiseFor(
                $this->createMock(IdentityInterface::class)
            );
        };
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $identity, $service);

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
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                ['aws.auth#sigv4a', 'aws.auth#sigv4'],
                'v4a'
            ],
            [
                ['aws.auth#sigv4', 'aws.auth#sigv4a'],
                ['smithy.auth#noAuth'],
                'anonymous'
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
        $identity,
        $expected
    ){
        $nextHandler = function (CommandInterface $command) use ($expected) {
            $this->assertEquals($expected, $command['@context']['signature_version']);
        };
        $authResolver = new AuthSchemeResolver();
        $service = $this->generateTestService($serviceAuth, $operationAuth);
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $identity, $service);

        if ($expected === 'error') {
            $this->expectException(AuthException::class);
            $this->expectExceptionMessage(
                'Could not resolve an authentication scheme: The service does not support `smithy.api#httpBearerAuth` authentication'
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
                        $this->createMock(IdentityInterface::class)
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
                        $this->createMock(IdentityInterface::class)
                    );
                },
                'error'
            ],
        ];
    }

    public function testUnknownAuthSchemeThrows()
    {
        $this->expectException(AuthException::class);
        $this->expectExceptionMessage(
            'Could not resolve an authentication scheme: The service does not support `notAnAuthScheme` authentication.'
        );

        $nextHandler = function (CommandInterface $command) {
            return null;
        };
        $authResolver = new AuthSchemeResolver();
        $service = $this->generateTestService(['notAnAuthScheme'], []);
        $identity = function () {
            return Promise\Create::promiseFor(
                $this->createMock(IdentityInterface::class)
            );
        };
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $identity, $service);

        $middleware($command);
    }

    public function testCommandOverrideResolver()
    {
        $nextHandler = function (CommandInterface $command) {
            $this->assertEquals('v4', $command['@context']['signature_version']);
        };
        $authResolver = new AuthSchemeResolver(['notanauthscheme' => 'foo']);
        $service = $this->generateTestService(['v4'], []);
        $identity = function () {
            return Promise\Create::promiseFor(
                $this->createMock(IdentityInterface::class)
            );
        };
        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);
        $command['@context']['auth_scheme_resolver'] = new AuthSchemeResolver();

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $identity, $service);

        $middleware($command);
    }

    public function testCommandOverrideIdentity()
    {
        $nextHandler = function (CommandInterface $command) {
            $this->assertInstanceOf(
                AwsCredentialIdentity::class,
                $command['@context']['resolved_identity']
            );
        };
        $authResolver = new AuthSchemeResolver();
        $service = $this->generateTestService(['v4'], []);
        $identityOverride = $this->createMock(AwsCredentialIdentity::class);
        $identity = function () {
            return Promise\Create::promiseFor(
                $this->createMock(BearerTokenIdentity::class)
            );
        };

        $client = $this->generateTestClient($service);
        $command = $client->getCommand('fooOperation', ['FooParam' => 'bar']);
        $command['@context']['resolved_identity'] = $identityOverride;

        $middleware = new AuthSelectionMiddleware($nextHandler, $authResolver, $identity, $service);

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

    private function generateTestService($serviceAuth, $operationAuth)
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
                        'auth' => $operationAuth
                    ],
                ]
            ],
            function () { return []; }
        );
    }
}
