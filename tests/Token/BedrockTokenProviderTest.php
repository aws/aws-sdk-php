<?php

namespace Aws\Tests\Token;

use Aws\Exception\TokenException;
use Aws\MetricsBuilder;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use Aws\Token\BedrockTokenProvider;
use Aws\Token\Token;
use Aws\Token\TokenInterface;
use Aws\Token\TokenProvider;
use Aws\Token\TokenSource;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class BedrockTokenProviderTest extends TestCase
{
    use UsesServiceTrait;

    private array $originalEnv = [];
    private ?string $tempConfigFile = null;
    private ?string $tempDir = null;

    protected function setUp(): void
    {
        parent::setUp();
        // Store original environment values
        $this->originalEnv = [
            'AWS_BEARER_TOKEN_BEDROCK' => getenv('AWS_BEARER_TOKEN_BEDROCK'),
            'AWS_BEARER_TOKEN_BEDROCKS' => getenv('AWS_BEARER_TOKEN_BEDROCKS'),
            'AWS_BEARER_TOKEN_BEDROCK_AGENT' => getenv('AWS_BEARER_TOKEN_BEDROCK_AGENT'),
            'AWS_AUTH_SCHEME_PREFERENCE' => getenv('AWS_AUTH_SCHEME_PREFERENCE'),
            'AWS_CONFIG_FILE' => getenv('AWS_CONFIG_FILE')
        ];
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Restore original environment values
        foreach ($this->originalEnv as $key => $value) {
            if ($value !== false) {
                putenv("{$key}={$value}");
            } else {
                putenv("{$key}=");
            }
        }

        // Clean up temp files
        if ($this->tempConfigFile && file_exists($this->tempConfigFile)) {
            unlink($this->tempConfigFile);
        }
        if ($this->tempDir && is_dir($this->tempDir)) {
            rmdir($this->tempDir);
        }

        $this->tempConfigFile = null;
        $this->tempDir = null;
    }

    /**
     * Test defaultProvider creates a memoized chain with env provider
     */
    public function testDefaultProvider(): void
    {
        putenv('AWS_BEARER_TOKEN_BEDROCK=test-token-123');

        $provider = BedrockTokenProvider::defaultProvider();

        $promise = $provider();
        $this->assertInstanceOf(Promise\PromiseInterface::class, $promise);

        $token = $promise->wait();
        $this->assertInstanceOf(TokenInterface::class, $token);
        $this->assertEquals('test-token-123', $token->getToken());
        $this->assertNull($token->getExpiration());
        $this->assertFalse($token->isExpired());
    }

    /**
     * Test defaultProvider when environment variable is not set
     */
    public function testDefaultProviderNoEnvVar(): void
    {
        putenv('AWS_BEARER_TOKEN_BEDROCK');

        $provider = BedrockTokenProvider::defaultProvider();
        $promise = $provider();

        // The memoize wrapper converts rejections to null
        $result = $promise->wait();
        $this->assertNull($result);
    }

    /**
     * Test env() method creates proper provider
     */
    public function testEnvMethod(): void
    {
        putenv('AWS_BEARER_TOKEN_BEDROCK=env-test-token');

        $provider = BedrockTokenProvider::env('bearer_token_bedrock');
        $promise = $provider();
        $token = $promise->wait();

        $this->assertInstanceOf(Token::class, $token);
        $this->assertEquals('env-test-token', $token->getToken());
        $this->assertNull($token->getExpiration());
    }

    /**
     * Test env() method when environment variable is empty
     */
    public function testEnvMethodEmptyValue(): void
    {
        putenv('AWS_BEARER_TOKEN_BEDROCK=');

        $provider = BedrockTokenProvider::env('bearer_token_bedrock');
        $promise = $provider();

        try {
            $promise->wait();
            $this->fail('Expected TokenException was not thrown');
        } catch (TokenException $e) {
            $this->assertStringContainsString(
                'No token found in environment variable AWS_BEARER_TOKEN_BEDROCK',
                $e->getMessage()
            );
        }
    }

    /**
     * Test fromTokenValue() method
     */
    public function testFromTokenValue(): void
    {
        $tokenValue = 'static-token-value';
        $provider = BedrockTokenProvider::fromTokenValue($tokenValue);
        $promise = $provider();
        $token = $promise->wait();

        $this->assertInstanceOf(Token::class, $token);
        $this->assertEquals($tokenValue, $token->getToken());
        $this->assertNull($token->getExpiration());
        $this->assertFalse($token->isExpired());
    }

    /**
     * Test createIfAvailable() when conditions are met
     */
    public function testCreateIfAvailableSuccess(): void
    {
        putenv('AWS_BEARER_TOKEN_BEDROCK=bedrock-token-456');

        $args = ['config' => ['auth_scheme_preference' => ['some-other-auth']]];

        $provider = BedrockTokenProvider::createIfAvailable($args);

        $this->assertNotNull($provider);
        // Check auth_scheme_preference was modified
        $this->assertCount(2, $args['config']['auth_scheme_preference']);
        $this->assertEquals(
            BedrockTokenProvider::BEARER_AUTH,
            $args['config']['auth_scheme_preference'][0]
        );
        $this->assertEquals(
            'some-other-auth',
            $args['config']['auth_scheme_preference'][1]
        );

        // Verify the provider works
        $promise = $provider();
        $token = $promise->wait();
        $this->assertEquals('bedrock-token-456', $token->getToken());
    }

    /**
     * Test createIfAvailable() when auth_scheme_preference is not set
     */
    public function testCreateIfAvailableNoAuthSchemePreference(): void
    {
        putenv('AWS_BEARER_TOKEN_BEDROCK=bedrock-token-789');

        $args = [
            'config' => ['signing_name' => 'bedrock']
        ];
        $provider = BedrockTokenProvider::createIfAvailable($args);

        $this->assertNotNull($provider);

        // Check auth_scheme_preference was created
        $this->assertArrayHasKey('auth_scheme_preference', $args['config']);
        $this->assertCount(1, $args['config']['auth_scheme_preference']);
        $this->assertEquals(
            BedrockTokenProvider::BEARER_AUTH,
            $args['config']['auth_scheme_preference'][0]
        );
    }

    /**
     * Test createIfAvailable() when token is not available
     */
    public function testCreateIfAvailableNoToken(): void
    {
        putenv('AWS_BEARER_TOKEN_BEDROCK');

        $args = [];
        $provider = BedrockTokenProvider::createIfAvailable($args);

        $this->assertNull($provider);
        $this->assertArrayNotHasKey('auth_scheme_preference', $args);
    }

    /**
     * Test memoization behavior - token should be cached
     */
    public function testMemoization(): void
    {
        putenv('AWS_BEARER_TOKEN_BEDROCK=memoized-token');

        $provider = BedrockTokenProvider::defaultProvider();

        // First call
        $token1 = $provider()->wait();

        // Change the environment variable
        putenv('AWS_BEARER_TOKEN_BEDROCK=different-token');

        // Second call should return the same token due to memoization
        $token2 = $provider()->wait();

        $this->assertEquals($token1->getToken(), $token2->getToken());
        $this->assertEquals('memoized-token', $token2->getToken());
    }

    /**
     * Test integration with Bedrock Clients
     *
     * @param $serviceName
     * @param $envVars
     * @param $clientArgs
     * @param $expectations
     * @param $iniConfig
     *
     * @dataProvider integrationWithClientProvider
     */
    public function testIntegrationWithClient(
        $serviceName,
        $envVars,
        $clientArgs,
        $expectations,
        $iniConfig = null
    ): void
    {
        foreach ($envVars as $key => $value) {
            putenv("{$key}={$value}");
        }

        if ($iniConfig !== null) {
            $this->tempDir = sys_get_temp_dir() . '/bedrock-token-test-' . uniqid() . '/';
            $this->tempConfigFile = $this->tempDir . 'config';

            if (!is_dir($this->tempDir)) {
                mkdir($this->tempDir, 0777, true);
            }

            $configContent = "[default]\n";
            foreach ($iniConfig as $key => $value) {
                $configContent .= "{$key}={$value}\n";
            }

            file_put_contents($this->tempConfigFile, $configContent);
            putenv("AWS_CONFIG_FILE={$this->tempConfigFile}");
        }

        $args = array_merge([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'key',
                'secret' => 'secret'
            ]
        ], $clientArgs);

        $client = $this->getTestClient($serviceName, $args);
        $promise = $client->getToken();
        $token = $promise->wait();

        // Check token value
        if ($expectations['token'] !== null) {
            $this->assertEquals($expectations['token'], $token->getToken());

            if (isset($envVars['AWS_BEARER_TOKEN_BEDROCK'])
                && !isset($clientArgs['token'])
            ) {
                $this->assertEquals(
                    TokenSource::BEARER_SERVICE_ENV_VARS->value,
                    $token->getSource()
                );
            } else {
                $this->assertNull($token->getSource());
            }
        } else {
            $this->assertNull($token);
        }

        // Check auth scheme preference
        if (isset($expectations['auth_scheme_preference'])) {
            $this->assertEquals(
                $expectations['auth_scheme_preference'],
                $client->getConfig('auth_scheme_preference')[0]
            );
        }
    }

    public function integrationWithClientProvider(): \Generator
    {
        static $services = [
            'bedrock',
            'bedrock-agent',
            'bedrock-agent-runtime',
            'bedrock-data-automation',
            'bedrock-data-automation-runtime'
        ];

        foreach ($services as $service) {
            // Valid env var
            yield "{$service}_valid_env" => [
                'service' => $service,
                'env_vars' => ['AWS_BEARER_TOKEN_BEDROCK' => 'test-token'],
                'client_args' => [],
                'expectations' => [
                    'token' => 'test-token',
                    'auth_scheme_preference' => BedrockTokenProvider::BEARER_AUTH
                ]
            ];

            // Similar but invalid env var
            yield "{$service}_invalid_env" => [
                'service' => $service,
                'env_vars' => [
                    'AWS_BEARER_TOKEN_BEDROCKS' => 'wrong-token',
                    'AWS_BEARER_TOKEN_BEDROCK_AGENT' => 'wrong-token'
                ],
                'client_args' => [],
                'expectations' => [
                    'token' => null
                ]
            ];

            // AWS_AUTH_SCHEME_PREFERENCE set
            yield "{$service}_auth_scheme_env" => [
                'service' => $service,
                'env_vars' => [
                    'AWS_BEARER_TOKEN_BEDROCK' => 'test-token',
                    'AWS_AUTH_SCHEME_PREFERENCE' => 'aws.auth#sigv4,smithy.api#noAuth'
                ],
                'client_args' => [],
                'expectations' => [
                    'token' => 'test-token',
                    'auth_scheme_preference' => BedrockTokenProvider::BEARER_AUTH
                ]
            ];

            // auth_scheme_preference from INI file
            yield "{$service}_auth_scheme_ini" => [
                'service' => $service,
                'env_vars' => ['AWS_BEARER_TOKEN_BEDROCK' => 'test-token'],
                'client_args' => [],
                'expectations' => [
                    'token' => 'test-token',
                    'auth_scheme_preference' => BedrockTokenProvider::BEARER_AUTH
                ],
                'ini_config' => [
                    'auth_scheme_preference' => 'aws.auth#sigv4,smithy.api#noAuth'
                ]
            ];

            // Client config token takes precedence
            yield "{$service}_client_token_precedence" => [
                'service' => $service,
                'env_vars' => ['AWS_BEARER_TOKEN_BEDROCK' => 'env-token'],
                'client_args' => [
                    'token' => TokenProvider::fromToken(new Token('config-token'))
                ],
                'expectations' => [
                    'token' => 'config-token'
                ]
            ];
        }
    }

    /**
     * Test that token source is added to user agent header
     *
     * @dataProvider tokenSourceUserAgentProvider
     */
    public function testTokenSourceInUserAgent(
        string $service,
        string $operation,
        array $args
    ): void
    {
        putenv('AWS_BEARER_TOKEN_BEDROCK=foo-token');

        $client = $this->getTestClient($service, [
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'key',
                'secret' => 'secret'
            ]
        ]);

        $this->assertEquals(
            BedrockTokenProvider::BEARER_AUTH,
            $client->getConfig('auth_scheme_preference')[0]
        );

        $client->getHandlerList()->appendSign(
            function (callable $handler) {
                return function ($command, $request) use ($handler, &$assertionMade) {
                    $this->assertStringEndsWith(
                        MetricsBuilder::BEARER_SERVICE_ENV_VARS,
                        $request->getHeaderLine('user-agent')
                    );

                    return $handler($command, $request);
                };
            },
            'test-token-source'
        );

        $this->addMockResults($client, [
            new Result([])
        ]);

        $client->{$operation}($args);
    }

    public function tokenSourceUserAgentProvider(): \Generator
    {
        yield 'bedrock' => [
            'service' => 'bedrock',
            'operation' => 'listCustomModelDeployments',
            'args' => []
        ];

        //TODO enable tests when these services support bearer auth
//        yield 'bedrock-data-automation' => [
//            'service' => 'bedrock-data-automation',
//            'operation' => 'listBlueprints',
//            'args' => []
//        ];
//
//        yield 'bedrock-agent-runtime' => [
//            'service' => 'bedrock-agent-runtime',
//            'operation' => 'listFlowExecutions',
//            'args' => ['flowIdentifier' => 'dummy-flow-id']
//        ];
//
//        yield 'bedrock-data-automation-runtime' => [
//            'service' => 'bedrock-data-automation-runtime',
//            'operation' => 'listTagsForResource',
//            'args' => ['resourceArn' => 'arn:aws:bedrock:us-east-1:123456789012:dummy']
//        ];
//
//        yield 'bedrock-agent' => [
//            'service' => 'bedrock-agent',
//            'operation' => 'listAgentActionGroups',
//            'args' => [
//                'agentId' => 'dummy-agent-id',
//                'agentVersion' => 'dummy-version'
//            ]
//        ];
    }
}
