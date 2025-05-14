<?php
namespace Aws\Test\EndpointV2;

use Aws\Api\Service;
use Aws\Auth\Exception\UnresolvedAuthSchemeException;
use Aws\EndpointV2\EndpointProviderV2;
use Aws\EndpointV2\EndpointV2Middleware;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use Aws\Test\UsesServiceTrait;
use ReflectionClass;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class EndpointV2MiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider providedSuccessCases
     *
     * @param $service
     * @param $clientArgs
     * @param $commandName
     * @param $commandArgs
     * @param $expectedUri
     */
    public function testSuccessfullyResolvesEndpointAndAuthScheme(
        $service,
        $clientArgs,
        $commandName,
        $commandArgs,
        $expectedUri
    )
    {
        $nextHandler = function ($command, $endpoint) use ($service, $expectedUri) {
            $this->assertInstanceOf(RulesetEndpoint::class, $endpoint);
            $this->assertEquals($expectedUri, $endpoint->getUrl());
        };

        $client = $this->getTestClient($service, $clientArgs);
        $api = $client->getApi();
        $endpointProvider = $client->getEndpointProvider();
        $endpointArgs = $client->getEndpointProviderArgs();
        $command = $client->getCommand($commandName, $commandArgs);

        $mw = new EndpointV2Middleware($nextHandler, $endpointProvider, $api, $endpointArgs);

        $mw($command);
    }

    public function providedSuccessCases()
    {
        return [
            [
                's3',
                ['region' => 'us-west-2'],
                'listObjectsV2',
                ['Bucket' => 'foo-bucket'],
                'https://foo-bucket.s3.us-west-2.amazonaws.com'
            ],
            [
                's3',
                ['region' => 'us-west-2', 'use_path_style_endpoint' => true],
                'listObjectsV2',
                ['Bucket' => 'foo-bucket'],
                'https://s3.us-west-2.amazonaws.com/foo-bucket'
            ],
            [
                's3',
                ['region' => 'us-west-2', 'use_accelerate_endpoint' => true],
                'listObjectsV2',
                ['Bucket' => 'foo-bucket'],
                'https://foo-bucket.s3-accelerate.amazonaws.com'
            ],
            [
                's3',
                ['region' => 'us-west-2', 'use_accelerate_endpoint' => true],
                'listObjectsV2',
                ['Bucket' => 'foo-bucket'],
                'https://foo-bucket.s3-accelerate.amazonaws.com'
            ],
            [
                'sts',
                ['region' => 'us-west-2'],
                'getCallerIdentity',
                [],
                'https://sts.us-west-2.amazonaws.com'
            ],
            [
                'sts',
                ['region' => 'us-west-2', 'sts_regional_endpoints' => 'legacy'],
                'getCallerIdentity',
                [],
                'https://sts.amazonaws.com'
            ],
        ];
    }

    public function testInvalidAuthSchemeThrows()
    {
        $mockedEndpointProvider = $this->getMockBuilder(EndpointProviderV2::class)
            ->disableOriginalConstructor()
            ->getMock();

        $middleware = new EndpointV2Middleware(
            function ($command, $endpoint) {},
            $mockedEndpointProvider,
            $this->getMockBuilder(Service::class)
                ->disableOriginalConstructor()
                ->getMock(),
            []
        );

        $reflection = new ReflectionClass(EndpointV2Middleware::class);
        $method = $reflection->getMethod('resolveAuthScheme');
        $method->setAccessible(true);

        $this->expectException(UnresolvedAuthSchemeException::class);
        $this->expectExceptionMessage(
            "This operation requests `invalidAuthScheme` auth schemes, but the client currently supports"
        );

        $method->invoke($middleware, [['name' => 'invalidAuthScheme']]);
    }

    /**
     * @param $authSchemes
     * @param $expected
     *
     * @dataProvider v4aAuthProvider
     */
    public function testV4aAuthSchemeSelection($authSchemes, $expected)
    {
        if ($expected === 'v4a' && (!extension_loaded('awscrt'))) {
            $this->markTestSkipped();
        } elseif ($expected === 'v4' && (extension_loaded('awscrt'))) {
            $this->markTestSkipped();
        }

        $mockedEndpointProvider = $this->getMockBuilder(EndpointProviderV2::class)
            ->disableOriginalConstructor()
            ->getMock();

        $middleware = new EndpointV2Middleware(
            function ($command, $endpoint) {},
            $mockedEndpointProvider,
            $this->getMockBuilder(Service::class)
                ->disableOriginalConstructor()
                ->getMock(),
            []
        );

        $reflection = new ReflectionClass(EndpointV2Middleware::class);
        $method = $reflection->getMethod('resolveAuthScheme');
        $method->setAccessible(true);

        $result = $method->invoke($middleware, $authSchemes);
        $this->assertSame($expected, $result['version']);
    }

    public function v4aAuthProvider()
    {
        return [
            [
                [['name' => 'sigv4a'], ['name' => 'sigv4']],
                'v4'
            ],
            [
                [['name' => 'sigv4a'], ['name' => 'sigv4']],
                'v4a'
            ]
        ];
    }

    public function testThrowsForIncompatibleV4a()
    {
        if (extension_loaded('awscrt')) {
            $this->markTestSkipped();
        }

        $this->expectException(UnresolvedAuthSchemeException::class);
        $this->expectExceptionMessage('This operation requests `sigv4a` auth schemes,'
            . ' but the client currently supports `sigv4`, `none`, `bearer`, `sigv4-s3express`.'
        );

        $mockedEndpointProvider = $this->getMockBuilder(EndpointProviderV2::class)
            ->disableOriginalConstructor()
            ->getMock();

        $middleware = new EndpointV2Middleware(
            function ($command, $endpoint) {},
            $mockedEndpointProvider,
            $this->getMockBuilder(Service::class)
                ->disableOriginalConstructor()
                ->getMock(),
            []
        );

        $reflection = new ReflectionClass(EndpointV2Middleware::class);
        $method = $reflection->getMethod('resolveAuthScheme');
        $method->setAccessible(true);

       $method->invoke($middleware, [['name' => 'sigv4a']]);
    }

    /**
     * @dataProvider invalidInitializationProvider
     */
    public function testInitializationWithInvalidParameters(
        $nextHandler,
        $endpointProvider,
        $api,
        $args
    )
    {
        $this->expectException(\TypeError::class);
        new EndpointV2Middleware($nextHandler, $endpointProvider, $api, $args);
    }

    public function invalidInitializationProvider()
    {
        return [
            'Invalid nextHandler' => [
                'not_a_callable',
                $this->getMockBuilder(EndpointProviderV2::class)
                    ->disableOriginalConstructor()
                    ->getMock(),
                $this->getMockBuilder(Service::class)
                    ->disableOriginalConstructor()
                    ->getMock(),
                []
            ],
            'Invalid endpointProvider' => [
                function ($command, $endpoint) {},
                'not_an_endpoint_provider',
                $this->getMockBuilder(Service::class)
                    ->disableOriginalConstructor()
                    ->getMock(),
                []
            ],
            'Invalid api' => [
                function ($command, $endpoint) {},
                $this->getMockBuilder(EndpointProviderV2::class)
                    ->disableOriginalConstructor()
                    ->getMock(),
                'not_a_service',
                []
            ],
            'Invalid array' => [
                function ($command, $endpoint) {},
                $this->getMockBuilder(EndpointProviderV2::class)
                    ->disableOriginalConstructor()
                    ->getMock(),
                $this->getMockBuilder(Service::class)
                    ->disableOriginalConstructor()
                    ->getMock(),
                'not_an_array'
            ],
        ];
    }

    public function testBadParametersOnInvocation() {
        $this->expectException(\TypeError::class);

        $nextHandler = function ($command, $endpoint) {};
        $endpointProvider = $this->getMockBuilder(EndpointProviderV2::class)->getMock();
        $api = $this->getMockBuilder(Service::class)->getMock();
        $args = [];

        $middleware = new EndpointV2Middleware($nextHandler, $endpointProvider, $api, $args);
        $middleware('not_a_command');
    }
}
