<?php
namespace Aws\Test\SocketTimeout;

use Aws\CommandInterface;
use Aws\MockHandler;
use Aws\Result;
use Aws\SocketTimeout\Configuration;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\SocketTimeout\Configuration
 */
class ConfigurationTest extends TestCase
{
    use UsesServiceTrait;

    private const GATE = 'AWS_ENABLE_DEFAULT_SOCKET_TIMEOUT_2026';

    /** @var string|false Saved gate value, restored after each test. */
    private $savedGate;

    public function setUp(): void
    {
        $this->savedGate = getenv(self::GATE);
    }

    public function tearDown(): void
    {
        if ($this->savedGate === false) {
            putenv(self::GATE);
        } else {
            putenv(self::GATE . '=' . $this->savedGate);
        }
        // Reset the lazily-loaded statics so each test is independent.
        $ref = new \ReflectionClass(Configuration::class);
        foreach (['tiers' => null, 'tiersLoaded' => false] as $name => $reset) {
            $prop = $ref->getProperty($name);
            $prop->setAccessible(true);
            $prop->setValue(null, $reset);
        }
    }

    private function enable(): void
    {
        putenv(self::GATE . '=true');
    }

    // ---- Gate ------------------------------------------------------------

    public function testGateOffReturnsNullForEveryService(): void
    {
        putenv(self::GATE); // unset
        $this->assertNull(Configuration::resolve('Kinesis'));
        $this->assertNull(Configuration::resolve('DynamoDB'));
        $this->assertNull(Configuration::resolve('S3'));
    }

    /**
     * @dataProvider nonTrueGateValues
     */
    public function testGateOffForAnyValueOtherThanExactlyTrue(string $value): void
    {
        putenv(self::GATE . '=' . $value);
        $this->assertNull(
            Configuration::resolve('DynamoDB'),
            "Gate value '$value' must not enable the feature"
        );
    }

    public function nonTrueGateValues(): array
    {
        return [['false'], ['1'], ['TRUE'], ['True'], ['on'], ['yes'], ['0'], [' true']];
    }

    public function testGateOnWithExactlyTrue(): void
    {
        $this->enable();
        $this->assertSame(300, Configuration::resolve('DynamoDB'));
    }

    // ---- Tier resolution -------------------------------------------------

    public function testUnlistedServiceGetsDefaultTierInSeconds(): void
    {
        $this->enable();
        // DynamoDB is not in the tier file -> interim 5-minute default.
        $this->assertSame(300, Configuration::resolve('DynamoDB'));
    }

    public function testPartiallyExemptServiceConvertsMsToSeconds(): void
    {
        $this->enable();
        // Kinesis is 900000 ms in the file -> 900 s.
        $this->assertSame(900, Configuration::resolve('Kinesis'));
    }

    public function testFullyExemptServiceReturnsNull(): void
    {
        $this->enable();
        // S3 is -1 in the file -> no timeout attached.
        $this->assertNull(Configuration::resolve('S3'));
    }

    public function testDefaultIsAuthoredInSecondsNotMilliseconds(): void
    {
        $this->enable();
        // Guards against a stray 300000: a value in whole days is never a
        // legitimate inactivity window.
        $this->assertLessThan(86400, Configuration::resolve('DynamoDB'));
    }

    public function testServiceIdWithSpacesResolves(): void
    {
        $this->enable();
        // sdkId keys can contain spaces; the lookup must match verbatim.
        $this->assertNull(Configuration::resolve('Bedrock Runtime')); // -1
        $this->assertSame(900, Configuration::resolve('API Gateway')); // 900000
    }

    // ---- Tier file integrity (drift guard) -------------------------------

    public function testTierFileIsValidAndWellFormed(): void
    {
        $tiers = $this->loadTierFile();
        $this->assertNotEmpty($tiers);
        foreach ($tiers as $key => $value) {
            $this->assertIsString($key, 'Tier keys must be serviceId strings');
            $this->assertTrue(
                $value === -1 || $value === 900000,
                "Tier value for '$key' must be -1 (exempt) or 900000 (partial); got "
                    . var_export($value, true)
            );
        }
    }

    /**
     * Reports tier keys that match no shipped php serviceId. These are NOT a
     * failure: the tier file is a faithful copy of the shared cross-SDK
     * artifact (SEP) and legitimately contains services other SDKs ship but
     * php may not. The assertion only fails if a key is a near-miss of a real
     * serviceId (a likely typo), which a human reviews from the printed list.
     */
    public function testEveryTierKeyIsEitherShippedOrKnownCrossSdk(): void
    {
        $shipped = $this->shippedServiceIds();
        $tiers = $this->loadTierFile();

        // Services the SEP lists that php does not ship a client for. Keeping
        // this list explicit means a genuine typo (not on this list, not
        // shipped) still fails the build.
        $knownCrossSdk = [
            'SageMaker Runtime HTTP2',
            'Transcribe Streaming',
        ];

        $unmatched = [];
        foreach (array_keys($tiers) as $key) {
            if (!in_array($key, $shipped, true)
                && !in_array($key, $knownCrossSdk, true)
            ) {
                $unmatched[] = $key;
            }
        }

        $this->assertSame(
            [],
            $unmatched,
            "Tier keys match no shipped serviceId and are not known cross-SDK "
                . "entries (likely typos): " . implode(', ', $unmatched)
        );
    }

    // ---- Degrade on bad data file ---------------------------------------

    public function testUnloadableTierFileAttachesNothingForEveryService(): void
    {
        $this->enable();
        // Simulate a missing/corrupt data file: a load was attempted and
        // produced null. resolve() must then attach NOTHING for every service,
        // NOT fall through to the 300s default (which would wrongly time out
        // exempt services like S3).
        $ref = new \ReflectionClass(Configuration::class);
        $loaded = $ref->getProperty('tiersLoaded');
        $loaded->setAccessible(true);
        $loaded->setValue(null, true);
        $tiers = $ref->getProperty('tiers');
        $tiers->setAccessible(true);
        $tiers->setValue(null, null);

        $this->assertNull(Configuration::resolve('DynamoDB'), 'would-be default tier');
        $this->assertNull(Configuration::resolve('Kinesis'), 'would-be partial tier');
        $this->assertNull(Configuration::resolve('S3'), 'exempt stays exempt');
    }

    /**
     * @return array<string,int>
     */
    private function loadTierFile(): array
    {
        return \Aws\load_compiled_json(
            __DIR__ . '/../../src/SocketTimeout/socket-timeout-tiers.json'
        );
    }

    /**
     * Every serviceId shipped in the SDK's own model data.
     *
     * @return string[]
     */
    private function shippedServiceIds(): array
    {
        $ids = [];
        foreach (glob(__DIR__ . '/../../src/data/*/*/api-2.json') as $file) {
            $model = json_decode(file_get_contents($file), true);
            $sid = $model['metadata']['serviceId'] ?? null;
            if (is_string($sid) && $sid !== '') {
                $ids[$sid] = true;
            }
        }

        return array_keys($ids);
    }
}
