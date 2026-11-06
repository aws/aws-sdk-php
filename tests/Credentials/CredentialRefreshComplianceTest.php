<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialProvider;
use Aws\Exception\NoCredentialsError;
use Aws\Exception\NonRecoverableCredentialsException;
use Aws\Exception\NonRecoverableCredentialsExceptionInterface;
use GuzzleHttp\Promise\Create;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

// Shadows time() within Aws\Credentials so the memoize() lifecycle can be driven
// by a controllable clock via $_SERVER['aws_time'].
require_once __DIR__ . '/CredentialsClockOverride.php';

/**
 * Data-driven runner for the Credential Refresh Behavior SEP test suite,
 * exercising the closure-based CredentialProvider::memoize() lifecycle.
 *
 * The fixture mirrors the SEP's credential-refresh-tests.json. Cases exercising
 * unsupported features are skipped at runtime:
 *   - configuredAdvisoryWindowSeconds: customer-configured refresh windows are
 *     not supported.
 *   - invalidate: invalidation-on-authentication-failure is not implemented in
 *     the closure-based design.
 *
 * One deliberate deviation from the upstream fixture: the SEP pins
 * refreshBackoffSeconds for determinism, but the PHP runner does not pin the
 * backoff RNG (tracked as milestone M6). The one timing case that runs,
 * `failed-refresh-backoff-blocks-until-elapsed`, therefore uses advanceTime
 * values that straddle the computed [60, 90] backoff range for expired
 * credentials rather than the SEP's pinned value.
 *
 * @see https://code.amazon.com/packages/AwsDrSeps/blobs/main/--/seps/accepted/shared/credential-refresh/credential-refresh.md
 */
#[CoversClass(CredentialProvider::class)]
class CredentialRefreshComplianceTest extends TestCase
{
    private const BASE_TIME = 1000000000;

    protected function setUp(): void
    {
        // Swallow the E_USER_WARNING emitted on a failed refresh. Behavior is
        // asserted separately.
        set_error_handler(static function () { return true; }, E_USER_WARNING);
    }

    protected function tearDown(): void
    {
        restore_error_handler();
        unset($_SERVER['aws_time']);
    }

    /** Sets the simulated "now" seen by the Aws\Credentials time() shim. */
    private function setNow(int $now): void
    {
        $_SERVER['aws_time'] = $now;
    }

    private function now(): int
    {
        return $_SERVER['aws_time'];
    }

    public static function provideCases(): array
    {
        $path = __DIR__ . '/fixtures/credential-refresh-tests.json';
        $cases = json_decode(file_get_contents($path), true);

        $out = [];
        foreach ($cases as $i => $case) {
            $out[sprintf('#%02d %s', $i, $case['documentation'] ?? '')] = [$case];
        }

        return $out;
    }

    #[DataProvider('provideCases')]
    public function testCase(array $case): void
    {
        $given = $case['given'];

        if (isset($given['configuredAdvisoryWindowSeconds'])) {
            $this->markTestSkipped(
                'Customer-configured advisory refresh windows are not supported.'
            );
        }
        foreach ($case['steps'] as $step) {
            if ($step['type'] === 'invalidate') {
                $this->markTestSkipped(
                    'Invalidation on authentication failure is not implemented '
                    . 'in the closure-based design.'
                );
            }
        }

        $this->setNow(self::BASE_TIME);

        $source = new ScriptedSourceClosure();
        $provider = CredentialProvider::memoize($source);

        $this->seedState($provider, $source, $given);

        foreach ($case['steps'] as $step) {
            $this->runStep($provider, $source, $step);
        }
    }

    private function seedState($provider, ScriptedSourceClosure $source, array $given): void
    {
        $state = $given['cachedCredentials'];
        if ($state === 'none') {
            return;
        }

        $lifetime = 3600; // advisory window 900s, mandatory 60s
        $akid = $given['accessKeyId'] ?? 'AKID-SEED';
        $source->queue($this->freshCreds($lifetime, $akid));
        $provider()->wait();

        switch ($state) {
            case 'valid':
                break;
            case 'advisory':
                $this->setNow($this->now() + $lifetime - 800); // inside 900s advisory, outside 60s mandatory
                break;
            case 'mandatory':
                $this->setNow($this->now() + $lifetime - 30);  // inside 60s mandatory
                break;
            case 'expired':
                $this->setNow($this->now() + $lifetime + 10);
                break;
            default:
                $this->fail("Unknown cachedCredentials state: {$state}");
        }

        $source->resetContacted();
    }

    private function runStep($provider, ScriptedSourceClosure $source, array $step): void
    {
        if ($step['type'] === 'advanceTime') {
            $this->setNow($this->now() + $step['seconds']);
            return;
        }
        if ($step['type'] === 'getCredentials') {
            $this->runGetCredentials($provider, $source, $step);
            return;
        }
        $this->fail("Unknown step type: {$step['type']}");
    }

    private function runGetCredentials($provider, ScriptedSourceClosure $source, array $step): void
    {
        $expected = $step['expected'];

        if (isset($step['response'])) {
            $source->queue($this->responseFor($step['response'], $step['lifetimeSeconds'] ?? 3600));
        }
        $source->resetContacted();

        $result = null;
        $error = null;
        try {
            $result = $provider()->wait();
        } catch (\Throwable $e) {
            $error = $e;
        }

        $this->assertSame(
            $expected['sourceContacted'],
            $source->wasContacted(),
            'sourceContacted mismatch'
        );

        switch ($expected['result']) {
            case 'newCredentials':
                $this->assertInstanceOf(Credentials::class, $result);
                $this->assertTrue($source->lastReturnedIs($result), 'expected freshly returned credentials');
                break;
            case 'cachedCredentials':
                $this->assertInstanceOf(Credentials::class, $result);
                $this->assertFalse($source->lastReturnedIs($result), 'expected existing cached credentials');
                break;
            case 'noCredentialsError':
                $this->assertInstanceOf(NoCredentialsError::class, $error);
                break;
            case 'nonRecoverableError':
                $this->assertInstanceOf(NonRecoverableCredentialsExceptionInterface::class, $error);
                break;
            default:
                $this->fail("Unknown expected result: {$expected['result']}");
        }

        if (isset($expected['advisoryWindowSeconds'])) {
            $this->assertAdvisoryWindow($expected['advisoryWindowSeconds'], $result);
        }
    }

    /**
     * Verifies the advisory window behaviorally on an ISOLATED provider (so the
     * case under test is not perturbed): seed a provider with credentials of the
     * same lifetime, then confirm no refresh one second before the window opens
     * and a refresh one second after. Restores the clock afterward.
     */
    private function assertAdvisoryWindow(int $window, $creds): void
    {
        $lifetime = $creds->getExpiration() - $this->now();
        $savedNow = $this->now();

        $base = self::BASE_TIME;
        $expiration = $base + $lifetime;

        $probeSource = new ScriptedSourceClosure();
        $probeProvider = CredentialProvider::memoize($probeSource);

        $this->setNow($base);
        $probeSource->queue(new Credentials('AKID-PROBE', 'secret', 'token', $expiration));
        $probeProvider()->wait();

        // Just outside the window -> no source contact.
        $this->setNow($expiration - $window - 1);
        $probeSource->resetContacted();
        $probeProvider()->wait();
        $this->assertFalse($probeSource->wasContacted(), "expected no refresh just before the {$window}s advisory window");

        // Just inside the window -> source contacted.
        $this->setNow($expiration - $window + 1);
        $probeSource->queue(new Credentials('AKID-PROBE2', 'secret', 'token', ($expiration - $window + 1) + 3600));
        $probeSource->resetContacted();
        $probeProvider()->wait();
        $this->assertTrue($probeSource->wasContacted(), "expected a refresh just inside the {$window}s advisory window");

        $this->setNow($savedNow);
    }

    private function responseFor(string $response, int $lifetime)
    {
        switch ($response) {
            case 'freshCredentials':
                return $this->freshCreds($lifetime, 'AKID-FRESH-' . uniqid());
            case 'staleCredentials':
                return new Credentials('AKID-STALE', 'secret', 'token', $this->now() - 1);
            case 'error':
                return Create::rejectionFor(new \RuntimeException('source unreachable'));
            case 'nonRecoverableError':
                return Create::rejectionFor(new NonRecoverableCredentialsException('reauthenticate required'));
            default:
                $this->fail("Unknown response type: {$response}");
        }
    }

    private function freshCreds(int $lifetime, string $akid): Credentials
    {
        return new Credentials($akid, 'secret', 'token', $this->now() + $lifetime);
    }
}
