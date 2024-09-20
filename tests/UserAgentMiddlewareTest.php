<?php

use Aws\Command;
use Aws\CommandInterface;
use Aws\MetricsBuilder;
use Aws\Sdk;
use Aws\UserAgentMiddleware;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class UserAgentMiddlewareTest extends TestCase
{
    private $deferFns = [];

    public function tearDown(): void
    {
        while (count($this->deferFns) > 0) {
            $fn = array_pop($this->deferFns);
            $fn();
        }
    }

    /**
     * Tests the user agent header is appended into the request headers.
     *
     * @return void
     */
    public function testAppendsUserAgentHeader()
    {
        $handler = UserAgentMiddleware::wrap([]);
        $middleware = $handler(function (
            CommandInterface $command,
            RequestInterface $request
        ) {
            $userAgent = $request->getHeaderLine('User-Agent');

            $this->assertNotEmpty($userAgent);
        });
        $request = new Request('post', 'foo', [], 'buzz');
        $middleware(new Command('buzz'), $request);
    }

    /**
     * Tests the user agent header value contains the expected
     * component.
     *
     * @dataProvider userAgentCasesDataProvider
     * @param array $args
     * @param string $expected
     *
     * @return void
     */
    public function testUserAgentContainsValue(array $args, string $expected)
    {
        $handler = UserAgentMiddleware::wrap($args);
        $middleware = $handler(function (
            CommandInterface $command,
            RequestInterface $request
        ) use ($expected) {
            if (empty($expected)) {
                $this->markTestSkipped('Expected value is empty');
            }
            $userAgent = $request->getHeaderLine('User-Agent');
            $userAgentValues = explode(' ', $userAgent);
            $this->assertTrue(in_array($expected, $userAgentValues));
        });
        $request = new Request('post', 'foo', [], 'buzz');
        $middleware(new Command('buzz'), $request);
    }

    /**
     * It returns a generator that yields an argument and an expected value
     * per iteration.
     * Example: yield [$arguments, 'ExpectedValue']
     *
     * @return Generator
     */
    public function userAgentCasesDataProvider(): Generator
    {
        $userAgentCases = [
            'sdkVersion' => [[], 'aws-sdk-php/' . Sdk::VERSION],
            'userAgentVersion' => [
                [], 'ua/' . UserAgentMiddleware::AGENT_VERSION
            ],
            'hhvmVersion' => function (): array {
                if (defined('HHVM_VERSION')) {
                    return [[], 'HHVM/' . HHVM_VERSION];
                }

                return [[], ""];
            },
            'osName' => function (): array {
                $disabledFunctions = explode(
                    ',',
                    ini_get('disable_functions')
                );
                if (function_exists('php_uname')
                    && !in_array(
                        'php_uname',
                        $disabledFunctions,
                        true
                    )
                ) {
                    $osName = "OS/" . php_uname('s') . '#' . php_uname('r');
                    if (!empty($osName)) {
                        return [[], $osName];
                    }
                }

                return [[], ""];
            },
            'langVersion' => [[], 'lang/php#' . phpversion()],
            'execEnv' => function (): array {
                $expectedEnv = "LambdaFooEnvironment";
                $currentEnv = getenv('AWS_EXECUTION_ENV');
                putenv("AWS_EXECUTION_ENV={$expectedEnv}");

                $this->deferFns[] = function () use ($currentEnv) {
                    if ($currentEnv !== false) {
                        putenv("AWS_EXECUTION_ENV={$currentEnv}");
                    } else {
                        putenv('AWS_EXECUTION_ENV');
                    }
                };

                return [[], $expectedEnv];
            },
            'appId' => function (): array {
                $expectedAppId = "FooAppId";
                $args = [
                    'app_id' => $expectedAppId
                ];

                return [$args, "app/{$expectedAppId}"];
            },
            'metricsWithEndpoint' => function (): array {
                $expectedEndpoint = "https://foo-endpoint.com";
                $args = [
                    'endpoint' => $expectedEndpoint
                ];

                return [$args, 'm/' . MetricsBuilder::ENDPOINT_OVERRIDE];
            },
            'metricsWithAccountIdModePreferred' => function (): array {
                $args = [
                    'account_id_endpoint_mode' => 'preferred'
                ];

                return [$args, 'm/' . MetricsBuilder::ACCOUNT_ID_MODE_PREFERRED];
            },
            'metricsWithAccountIdModeRequired' => function (): array {
                $args = [
                    'account_id_endpoint_mode' => 'required'
                ];

                return [$args, 'm/' . MetricsBuilder::ACCOUNT_ID_MODE_REQUIRED];
            },
            'metricsWithAccountIdModeDisabled' => function (): array {
                $args = [
                    'account_id_endpoint_mode' => 'disabled'
                ];

                return [$args, 'm/' . MetricsBuilder::ACCOUNT_ID_MODE_DISABLED];
            },
            'metricsWithRetryConfigArrayStandardMode' => function (): array {
                $args = [
                    'retries' => [
                        'mode' => 'standard'
                    ]
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_STANDARD];
            },
            'metricsWithRetryConfigArrayAdaptiveMode' => function (): array {
                $args = [
                    'retries' => [
                        'mode' => 'adaptive'
                    ]
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_ADAPTIVE];
            },
            'metricsWithRetryConfigArrayLegacyMode' => function (): array {
                $args = [
                    'retries' => [
                        'mode' => 'legacy'
                    ]
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_LEGACY];
            },
            'metricsWithRetryConfigStandardMode' => function (): array {
                $args = [
                    'retries' => new \Aws\Retry\Configuration(
                        'standard',
                        10
                    )
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_STANDARD];
            },
            'metricsWithRetryConfigAdaptiveMode' => function (): array {
                $args = [
                    'retries' => new \Aws\Retry\Configuration(
                    'adaptive',
                    10
                    )
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_ADAPTIVE];
            },
            'metricsWithRetryConfigLegacyMode' => function (): array {
                $args = [
                    'retries' => new \Aws\Retry\Configuration(
                        'legacy',
                        10
                    )
                ];

                return [$args, 'm/' . MetricsBuilder::RETRY_MODE_LEGACY];
            },
            'cfgWithEndpointDiscoveryConfigArray' => function (): array {
                $args = [
                    'endpoint_discovery' => [
                        'enabled' => true,
                        'cache_limit' => 1000
                    ]
                ];

                return [$args, 'cfg/endpoint-discovery'];
            },
            'cfgWithEndpointDiscoveryConfig' => function (): array {
                $args = [
                    'endpoint_discovery' => new \Aws\EndpointDiscovery\Configuration (
                        true,
                        1000
                    ),
                ];

                return [$args, 'cfg/endpoint-discovery'];
            }
        ];

        foreach ($userAgentCases as $key => $case) {
            if (is_callable($case)) {
                yield $key => $case();
            } else {
                yield  $key => $case;
            }
        }
    }

    /**
     * Tests the user agent header values starts with the SDK/version string.
     * Example: aws-sdk-php/3.x.x
     *
     * @return void
     */
    public function testUserAgentValueStartsWithSdkVersionString()
    {
        $handler = UserAgentMiddleware::wrap([]);
        $middleware = $handler(function (
            CommandInterface $command,
            RequestInterface $request
        ) {
            $userAgent = $request->getHeaderLine('User-Agent');
            $pattern = "aws-sdk-php/" . Sdk::VERSION;

            $this->assertTrue(
                substr($userAgent, 0, strlen($pattern)) === $pattern
            );
        });
        $request = new Request('post', 'foo', [], 'buzz');
        $middleware(new Command('buzz'), $request);
    }
}
