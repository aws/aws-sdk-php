<?php

namespace Aws\Tests\Token;

use Aws\Exception\TokenException;
use Aws\Test\UsesServiceTrait;
use Aws\Token\BedrockTokenProvider;
use Aws\Token\Token;
use Aws\Token\TokenInterface;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class BedrockTokenProviderTest extends TestCase
{
    use UsesServiceTrait;

    private array $originalEnv = [];

    protected function set_up(): void
    {
        parent::set_up();
        $this->originalEnv['AWS_BEARER_TOKEN_BEDROCK'] = getenv('AWS_BEARER_TOKEN_BEDROCK');
    }

    protected function tear_down(): void
    {
        parent::tear_down();
        if ($this->originalEnv['AWS_BEARER_TOKEN_BEDROCK'] !== false) {
            putenv('AWS_BEARER_TOKEN_BEDROCK=' . $this->originalEnv['AWS_BEARER_TOKEN_BEDROCK']);
        } else {
            putenv('AWS_BEARER_TOKEN_BEDROCK');
        }
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
            $this->assertStringContainsString('No token found in environment variable AWS_BEARER_TOKEN_BEDROCK', $e->getMessage());
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

        $args = ['auth_scheme_preference' => ['some-other-auth']];

        $provider = BedrockTokenProvider::createIfAvailable($args);

        $this->assertNotNull($provider);
        // Check auth_scheme_preference was modified
        $this->assertCount(2, $args['auth_scheme_preference']);
        $this->assertEquals(BedrockTokenProvider::BEARER_AUTH, $args['auth_scheme_preference'][0]);
        $this->assertEquals('some-other-auth', $args['auth_scheme_preference'][1]);

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
        $this->assertArrayHasKey('auth_scheme_preference', $args);
        $this->assertCount(1, $args['auth_scheme_preference']);
        $this->assertEquals(BedrockTokenProvider::BEARER_AUTH, $args['auth_scheme_preference'][0]);
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
     *  Test with Bedrock clients
     *
     * @dataProvider integrationWithClientProvider
     */
    public function testIntegrationWithClient($serviceName): void
    {
        putenv('AWS_BEARER_TOKEN_BEDROCK=test-token');

        $args = [
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'key',
                'secret' => 'secret'
            ]
        ];
        $client = $this->getTestClient($serviceName, $args);
        $promise = $client->getToken();

        $this->assertEquals('test-token', $promise->wait()->getToken());
    }

    public function integrationWithClientProvider(): array
    {
        return [
            ['bedrock'],
            ['bedrock-agent'],
            ['bedrock-agent-runtime'],
            ['bedrock-data-automation'],
            ['bedrock-data-automation-runtime']
        ];
    }
}
