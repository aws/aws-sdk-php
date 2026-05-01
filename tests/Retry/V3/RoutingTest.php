<?php
namespace Aws\Test\Retry\V3;

use Aws\DynamoDb\DynamoDbClient;
use Aws\Retry\Configuration;
use Aws\Retry\ConfigurationProvider;
use Aws\Retry\V3\OptIn;
use Aws\Retry\V3\RetryMiddleware as RetryV3Middleware;
use Aws\RetryMiddlewareV2;
use Aws\S3\S3Client;
use Aws\Sts\StsClient;
use PHPUnit\Framework\TestCase;

/**
 * Verifies that the AWS_NEW_RETRIES_2026 opt-in flag dispatches to the
 * correct middleware/config path at every integration point.
 */
class RoutingTest extends TestCase
{
    private string $previousOptIn;

    protected function setUp(): void
    {
        $this->previousOptIn = getenv(OptIn::ENV) ?: '';
        putenv(OptIn::ENV . '=');
        OptIn::reset();
    }

    protected function tearDown(): void
    {
        putenv(OptIn::ENV . '=' . $this->previousOptIn);
        OptIn::reset();
    }

    private function enableFlag(): void
    {
        putenv(OptIn::ENV . '=true');
        OptIn::reset();
    }

    public function testFallbackModeIsLegacyByDefault(): void
    {
        $this->assertSame('legacy', ConfigurationProvider::getDefaultMode());
        $config = call_user_func(ConfigurationProvider::fallback())->wait();
        $this->assertSame('legacy', $config->getMode());
    }

    public function testFallbackModeIsStandardWhenOptedIn(): void
    {
        $this->enableFlag();
        $this->assertSame('standard', ConfigurationProvider::getDefaultMode());
        $config = call_user_func(ConfigurationProvider::fallback())->wait();
        $this->assertSame('standard', $config->getMode());
    }

    public function testRetryMiddlewareV2Constant(): void
    {
        // Sanity check: legacy const is still 'legacy'.
        $this->assertSame('legacy', ConfigurationProvider::DEFAULT_MODE);
    }

    public function testS3ClientUsesPreSepMiddlewareWhenOptedOut(): void
    {
        $client = $this->newS3();
        $entries = $this->retryEntries($client);
        $this->assertCount(1, $entries);
        $this->assertSame(RetryMiddlewareV2::class, $entries[0]['middleware_class']);
    }

    public function testS3ClientUsesStandardMiddlewareWhenOptedIn(): void
    {
        $this->enableFlag();
        $client = $this->newS3();
        $entries = $this->retryEntries($client);
        $this->assertCount(1, $entries);
        $this->assertSame(RetryV3Middleware::class, $entries[0]['middleware_class']);
    }

    public function testDynamoDbDefaultRetriesIsTenWhenOptedOut(): void
    {
        $args = DynamoDbClient::getArguments();
        $this->assertSame(10, $args['retries']['default']);
    }

    public function testDynamoDbDefaultRetriesIsCallableWhenOptedIn(): void
    {
        $this->enableFlag();
        $args = DynamoDbClient::getArguments();
        $this->assertIsArray($args['retries']['default']);
        $this->assertSame([DynamoDbClient::class, '_defaultRetries'], $args['retries']['default']);
    }

    public function testDynamoDbUsesPreSepMiddlewareWhenOptedOut(): void
    {
        $client = $this->newDynamoDb(['retries' => new Configuration('standard', 3)]);
        $entries = $this->retryEntries($client);
        $this->assertCount(1, $entries);
        $this->assertSame(RetryMiddlewareV2::class, $entries[0]['middleware_class']);
    }

    public function testDynamoDbUsesStandardMiddlewareWhenOptedIn(): void
    {
        $this->enableFlag();
        $client = $this->newDynamoDb(['retries' => new Configuration('standard', 3)]);
        $entries = $this->retryEntries($client);
        $this->assertCount(1, $entries);
        $this->assertSame(RetryV3Middleware::class, $entries[0]['middleware_class']);
    }

    public function testStsRetriesFnInheritsParentWhenOptedOut(): void
    {
        // STS does not override the retry handler when opted out; it falls
        // back to ClientResolver::_apply_retries.
        $args = StsClient::getArguments();
        $this->assertSame(
            [\Aws\ClientResolver::class, '_apply_retries'],
            $args['retries']['fn']
        );
    }

    public function testStsRetriesFnIsRegisteredWhenOptedIn(): void
    {
        $this->enableFlag();
        $args = StsClient::getArguments();
        $this->assertSame([StsClient::class, '_applyRetryConfig'], $args['retries']['fn']);
    }

    public function testStsUsesStandardMiddlewareWhenOptedIn(): void
    {
        $this->enableFlag();
        $client = new StsClient([
            'region'  => 'us-east-1',
            'version' => 'latest',
            'retries' => new Configuration('standard', 3),
        ]);
        $entries = $this->retryEntries($client);
        $this->assertCount(1, $entries);
        $this->assertSame(RetryV3Middleware::class, $entries[0]['middleware_class']);
    }

    private function newS3(array $extra = []): S3Client
    {
        return new S3Client([
            'region'  => 'us-east-1',
            'version' => 'latest',
            'retries' => new Configuration('standard', 3),
        ] + $extra);
    }

    private function newDynamoDb(array $extra = []): DynamoDbClient
    {
        return new DynamoDbClient([
            'region'  => 'us-east-1',
            'version' => 'latest',
        ] + $extra);
    }

    /**
     * Returns the list of registered 'retry' handlers and the runtime class
     * each one wraps the next handler with. The handler list keeps entries
     * tagged by name; we filter for 'retry' and instantiate each closure
     * against a no-op next handler so we can read the resulting middleware's
     * class.
     */
    private function retryEntries($client): array
    {
        $list = $client->getHandlerList();
        $stepsProp = (new \ReflectionClass($list))->getProperty('steps');
        $stepsProp->setAccessible(true);
        $steps = $stepsProp->getValue($list);

        $entries = [];
        $noop = static fn ($cmd, $req) => null;
        foreach ($steps as $stepEntries) {
            foreach ($stepEntries as $tuple) {
                [$middlewareFn, $name] = $tuple;
                if ($name !== 'retry') {
                    continue;
                }
                $middleware = $middlewareFn($noop);
                $entries[] = [
                    'name' => $name,
                    'middleware_class' => is_object($middleware) ? get_class($middleware) : null,
                ];
            }
        }

        return $entries;
    }
}
