<?php
namespace Aws\Test\SocketTimeout;

use Aws\AwsClient;
use Aws\Credentials\Credentials;
use Aws\DynamoDb\DynamoDbClient;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;

/**
 * End-to-end middleware behaviour for the default socket timeout, exercised
 * through a real client's handler list (the all-or-nothing guard and the
 * attach/skip decisions live in Aws\AwsClient).
 *
 * @covers \Aws\AwsClient::addDefaultSocketTimeout
 * @covers \Aws\AwsClient::getDefaultSocketTimeoutMiddleware
 */
class AwsClientSocketTimeoutTest extends TestCase
{
    private const GATE = 'AWS_ENABLE_DEFAULT_SOCKET_TIMEOUT_2026';

    /** @var string|false */
    private $savedGate;

    public function setUp(): void
    {
        if (!extension_loaded('curl')) {
            $this->markTestSkipped('Default socket timeout is cURL-only');
        }
        $this->savedGate = getenv(self::GATE);
    }

    public function tearDown(): void
    {
        if ($this->savedGate === false) {
            putenv(self::GATE);
        } else {
            putenv(self::GATE . '=' . $this->savedGate);
        }
    }

    private function enable(): void
    {
        putenv(self::GATE . '=true');
    }

    /**
     * Runs one command through $client, capturing the final @http.curl array
     * that reaches the handler (after every init middleware has run).
     *
     * @return array the curl option array, or [] if none was set
     */
    private function captureCurl($client, callable $invoke): array
    {
        $captured = [];
        $list = $client->getHandlerList();
        $list->setHandler(function ($command, $request) use (&$captured) {
            $captured = $command['@http']['curl'] ?? [];
            return Promise\Create::promiseFor(new Result([]));
        });
        $invoke($client);
        return $captured;
    }

    private function dynamoDb(): DynamoDbClient
    {
        return new DynamoDbClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'a', 'secret' => 'b'],
        ]);
    }

    private function s3(): S3Client
    {
        return new S3Client([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => ['key' => 'a', 'secret' => 'b'],
        ]);
    }

    // ---- Attach / skip ---------------------------------------------------

    public function testGateOffAttachesNothing(): void
    {
        putenv(self::GATE); // off
        $curl = $this->captureCurl(
            $this->dynamoDb(),
            fn($c) => $c->listTables()
        );
        $this->assertArrayNotHasKey(CURLOPT_LOW_SPEED_LIMIT, $curl);
        $this->assertArrayNotHasKey(CURLOPT_LOW_SPEED_TIME, $curl);
    }

    public function testDefaultTierServiceGetsLowSpeedPair(): void
    {
        $this->enable();
        $curl = $this->captureCurl(
            $this->dynamoDb(), // unlisted -> 300s
            fn($c) => $c->listTables()
        );
        $this->assertSame(1, $curl[CURLOPT_LOW_SPEED_LIMIT]);
        $this->assertSame(300, $curl[CURLOPT_LOW_SPEED_TIME]);
    }

    public function testFullyExemptServiceGetsNoPair(): void
    {
        $this->enable();
        $curl = $this->captureCurl(
            $this->s3(), // S3 is -1 -> exempt
            fn($c) => $c->listBuckets()
        );
        $this->assertArrayNotHasKey(CURLOPT_LOW_SPEED_LIMIT, $curl);
        $this->assertArrayNotHasKey(CURLOPT_LOW_SPEED_TIME, $curl);
    }

    // ---- All-or-nothing caller precedence --------------------------------

    public function testCallerSettingOnlyLowSpeedTimeDisablesDefaultEntirely(): void
    {
        $this->enable();
        $curl = $this->captureCurl(
            $this->dynamoDb(),
            fn($c) => $c->listTables([
                '@http' => ['curl' => [CURLOPT_LOW_SPEED_TIME => 120]],
            ])
        );
        // Caller's time stands alone; the SDK must NOT weld LIMIT=1 onto it.
        $this->assertSame(120, $curl[CURLOPT_LOW_SPEED_TIME]);
        $this->assertArrayNotHasKey(CURLOPT_LOW_SPEED_LIMIT, $curl);
    }

    public function testCallerSettingOnlyLowSpeedLimitDisablesDefaultEntirely(): void
    {
        $this->enable();
        $curl = $this->captureCurl(
            $this->dynamoDb(),
            fn($c) => $c->listTables([
                '@http' => ['curl' => [CURLOPT_LOW_SPEED_LIMIT => 500]],
            ])
        );
        // Caller's limit stands alone; the SDK must NOT add its own TIME.
        $this->assertSame(500, $curl[CURLOPT_LOW_SPEED_LIMIT]);
        $this->assertArrayNotHasKey(CURLOPT_LOW_SPEED_TIME, $curl);
    }

    public function testCallerSettingUnrelatedCurlOptionStillGetsDefaultPair(): void
    {
        $this->enable();
        $curl = $this->captureCurl(
            $this->dynamoDb(),
            fn($c) => $c->listTables([
                '@http' => ['curl' => [CURLOPT_TCP_KEEPALIVE => 1]],
            ])
        );
        // An unrelated curl option does not count as owning low-speed.
        $this->assertSame(1, $curl[CURLOPT_TCP_KEEPALIVE]);
        $this->assertSame(1, $curl[CURLOPT_LOW_SPEED_LIMIT]);
        $this->assertSame(300, $curl[CURLOPT_LOW_SPEED_TIME]);
    }

    // ---- Defensive: model without a serviceId ----------------------------

    public function testServiceWithoutServiceIdAttachesNothing(): void
    {
        $this->enable();
        // A model whose metadata has no serviceId must NOT emit an
        // undefined-index notice and must attach no timeout. This is the one
        // reason addDefaultSocketTimeout() uses getMetadata('serviceId')
        // (returns null) instead of getServiceId() (unguarded array access).
        $client = $this->bareClientWithoutServiceId();
        $curl = $this->captureCurl($client, fn($c) => $c->foo());
        $this->assertArrayNotHasKey(CURLOPT_LOW_SPEED_LIMIT, $curl);
        $this->assertArrayNotHasKey(CURLOPT_LOW_SPEED_TIME, $curl);
    }

    /**
     * A minimal real AwsClient over a synthetic model that deliberately omits
     * metadata.serviceId, mirroring the handful of older models that lack it.
     */
    private function bareClientWithoutServiceId(): AwsClient
    {
        $apiProvider = function ($type) {
            if ($type === 'paginator') {
                return ['pagination' => []];
            }
            if ($type === 'waiter') {
                return ['waiters' => [], 'version' => 2];
            }
            return [
                'metadata' => [
                    // no 'serviceId' on purpose
                    'protocol'       => 'query',
                    'endpointPrefix' => 'foo',
                ],
                'operations' => ['foo' => ['http' => ['method' => 'POST']]],
                'shapes'     => [],
            ];
        };

        return new AwsClient([
            'handler'      => new MockHandler(),
            'credentials'  => new Credentials('foo', 'bar'),
            'signature'    => new SignatureV4('foo', 'bar'),
            'endpoint'     => 'http://us-east-1.foo.amazonaws.com',
            'region'       => 'foo',
            'service'      => 'foo',
            'api_provider' => $apiProvider,
            'error_parser' => function () {},
            'version'      => 'latest',
        ]);
    }
}
