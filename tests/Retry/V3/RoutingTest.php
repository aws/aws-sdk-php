<?php
namespace Aws\Test\Retry\V3;

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDbStreams\DynamoDbStreamsClient;
use Aws\Retry\Configuration;
use Aws\Retry\ConfigurationProvider;
use Aws\Retry\V3\RetryMiddleware as RetryV3Middleware;
use Aws\S3\S3Client;
use Aws\Sns\SnsClient;
use Aws\Sts\StsClient;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Verifies that standard and adaptive modes dispatch to the V3 retry
 * middleware at every integration point.
 */
class RoutingTest extends TestCase
{
    public function testFallbackModeIsStandard(): void
    {
        $this->assertSame('standard', ConfigurationProvider::DEFAULT_MODE);
        $this->assertSame('standard', ConfigurationProvider::getDefaultMode());
        $config = call_user_func(ConfigurationProvider::fallback())->wait();
        $this->assertSame('standard', $config->getMode());
    }

    public function testS3ClientUsesV3Middleware(): void
    {
        $entries = $this->retryEntries($this->newS3());
        $this->assertCount(1, $entries);
        $this->assertSame(RetryV3Middleware::class, $entries[0]['middleware_class']);
    }

    public function testClientWithoutRetryConfigRetriesWithStandardDefaults(): void
    {
        // No retry configuration anywhere: the client must use standard mode
        // with 3 attempts and the 50 ms transient base delay.
        $delays = [];
        $handler = function ($request, array $options) use (&$delays) {
            // Full jitter can legitimately pick 0, so test presence, not truthiness.
            if (isset($options['delay'])) {
                $delays[] = $options['delay'];
            }
            return Create::promiseFor(new Response(500, [], ''));
        };

        $client = new SnsClient([
            'region'       => 'us-east-1',
            'version'      => 'latest',
            'credentials'  => false,
            'http_handler' => $handler,
            'stats'        => ['retries' => true],
        ]);

        // A 500 with an empty body is surfaced as a Result carrying the
        // status code, so the retry stats are read from the result metadata.
        $result = $client->listTopics();
        $stats = $result['@metadata']['transferStats'];

        $entries = $this->retryEntries($client);
        $this->assertSame(RetryV3Middleware::class, $entries[0]['middleware_class']);
        $this->assertSame(500, $result['@metadata']['statusCode']);
        $this->assertSame(2, $stats['retries_attempted']);
        $this->assertCount(3, $stats['http']);
        $this->assertCount(2, $delays);
        // Full jitter: rand(0, 50 * 2^(attempt - 1))
        $this->assertLessThanOrEqual(50, $delays[0]);
        $this->assertLessThanOrEqual(100, $delays[1]);
        $this->assertLessThanOrEqual(150, $stats['total_retry_delay']);
    }

    public function testDynamoDbDefaultRetriesIsCallable(): void
    {
        $args = DynamoDbClient::getArguments();
        $this->assertSame([DynamoDbClient::class, '_defaultRetries'], $args['retries']['default']);
    }

    #[DataProvider('envOrIniModeProvider')]
    public function testDynamoDbDefaultAttemptsFromEnvOrIni(
        array $env,
        string $expectedMode,
        int $expectedAttempts,
        ?string $ini = null,
        array $args = []
    ): void
    {
        // When only the mode comes from the environment or ~/.aws/config,
        // DynamoDB must apply its own max_attempts default (4 standard/adaptive,
        // 11 legacy) rather than the generic 3.
        $saved = [];
        foreach (['AWS_RETRY_MODE', 'AWS_MAX_ATTEMPTS', 'AWS_CONFIG_FILE', 'AWS_PROFILE', 'HOME'] as $k) {
            $saved[$k] = getenv($k);
        }
        $home = sys_get_temp_dir() . '/ddb-retries-' . uniqid();
        mkdir($home . '/.aws', 0777, true);
        try {
            putenv('AWS_CONFIG_FILE');
            putenv('AWS_PROFILE');
            putenv('AWS_RETRY_MODE');
            putenv('AWS_MAX_ATTEMPTS');
            putenv("HOME=$home");
            foreach ($env as $k => $v) {
                putenv("$k=$v");
            }
            if ($ini !== null) {
                file_put_contents($home . '/.aws/config', $ini);
            }

            $config = call_user_func(DynamoDbClient::_defaultRetries($args))->wait();
            $this->assertSame($expectedMode, $config->getMode());
            $this->assertSame($expectedAttempts, $config->getMaxAttempts());
        } finally {
            foreach ($saved as $k => $v) {
                putenv($v === false ? $k : "$k=$v");
            }
            @unlink($home . '/.aws/config');
            rmdir($home . '/.aws');
            rmdir($home);
        }
    }

    public static function envOrIniModeProvider(): array
    {
        return [
            'legacy only' => [['AWS_RETRY_MODE' => 'legacy'], 'legacy', 11],
            'standard only' => [['AWS_RETRY_MODE' => 'standard'], 'standard', 4],
            'adaptive only' => [['AWS_RETRY_MODE' => 'adaptive'], 'adaptive', 4],
            'legacy + explicit max_attempts' => [['AWS_RETRY_MODE' => 'legacy', 'AWS_MAX_ATTEMPTS' => '5'], 'legacy', 5],
            'standard + explicit max_attempts' => [['AWS_RETRY_MODE' => 'standard', 'AWS_MAX_ATTEMPTS' => '5'], 'standard', 5],
            'ini legacy only' => [[], 'legacy', 11, "[default]\nretry_mode = legacy\n"],
            'ini standard only' => [[], 'standard', 4, "[default]\nretry_mode = standard\n"],
            'ini standard + explicit max_attempts' => [[], 'standard', 5, "[default]\nretry_mode = standard\nmax_attempts = 5\n"],
            'env mode + ini max_attempts' => [['AWS_RETRY_MODE' => 'standard'], 'standard', 8, "[default]\nmax_attempts = 8\n"],
            'env max_attempts + ini mode' => [['AWS_MAX_ATTEMPTS' => '8'], 'adaptive', 8, "[default]\nretry_mode = adaptive\n"],
            'ini profile prefix' => [['AWS_PROFILE' => 'foo'], 'adaptive', 7, "[profile foo]\nretry_mode = adaptive\nmax_attempts = 7\n"],
            'ini ignored when shared config disabled' => [[], 'standard', 4, "[default]\nretry_mode = adaptive\nmax_attempts = 7\n", ['use_aws_shared_config_files' => false]],
            'uppercase legacy' => [['AWS_RETRY_MODE' => 'LEGACY'], 'legacy', 11],
        ];
    }

    #[DataProvider('arrayModeProvider')]
    public function testDynamoDbDefaultAttemptsFromArray(
        array $retries,
        int $expectedAttempts
    ): void
    {
        // 'retries' => ['mode' => ...] without max_attempts must use the
        // DynamoDB attempt default (4 standard/adaptive, 11 legacy), not the
        // generic 3 that ConfigurationProvider::unwrap() fills in.
        $this->assertSame($expectedAttempts, $this->countDynamoDbAttempts($retries));
    }

    public static function arrayModeProvider(): array
    {
        return [
            'standard' => [['mode' => 'standard'], 4],
            'adaptive' => [['mode' => 'adaptive'], 4],
            'legacy' => [['mode' => 'legacy'], 11],
            'standard + max_attempts' => [['mode' => 'standard', 'max_attempts' => 2], 2],
        ];
    }

    public function testDynamoDbUsesV3Middleware(): void
    {
        $entries = $this->retryEntries(
            $this->newDynamoDb(['retries' => new Configuration('standard', 3)])
        );
        $this->assertCount(1, $entries);
        $this->assertSame(RetryV3Middleware::class, $entries[0]['middleware_class']);
    }

    public function testDynamoDbStreamsSharesDynamoDbDefaults(): void
    {
        $args = DynamoDbStreamsClient::getArguments();
        $this->assertSame([DynamoDbClient::class, '_defaultRetries'], $args['retries']['default']);
        $this->assertSame([DynamoDbClient::class, '_applyRetryConfig'], $args['retries']['fn']);

        $attempts = 0;
        $client = new DynamoDbStreamsClient([
            'region'       => 'us-east-1',
            'version'      => 'latest',
            'credentials'  => false,
            'http_handler' => $this->failingHandler($attempts),
        ]);
        $entries = $this->retryEntries($client);
        $this->assertCount(1, $entries);
        $this->assertSame(RetryV3Middleware::class, $entries[0]['middleware_class']);

        $client->listStreams();
        $this->assertSame(4, $attempts);
    }

    public function testStsRetriesFnIsRegistered(): void
    {
        $args = StsClient::getArguments();
        $this->assertSame([StsClient::class, '_applyRetryConfig'], $args['retries']['fn']);
    }

    public function testStsUsesV3Middleware(): void
    {
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

    /** Handler that always returns HTTP 500 and counts invocations. */
    private function failingHandler(int &$attempts): callable
    {
        return function ($request, array $options) use (&$attempts) {
            $attempts++;
            return Create::promiseFor(new Response(500, [], ''));
        };
    }

    /** Total attempts a DynamoDbClient makes for the given 'retries' config. */
    private function countDynamoDbAttempts(array $retries): int
    {
        $attempts = 0;
        $client = new DynamoDbClient([
            'region'       => 'us-east-1',
            'version'      => 'latest',
            'credentials'  => false,
            'http_handler' => $this->failingHandler($attempts),
            'retries'      => $retries,
        ]);
        $client->listTables();

        return $attempts;
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
