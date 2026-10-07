<?php
namespace Aws\SocketTimeout;

/**
 * Resolves the default socket (inactivity) timeout for a service, in seconds.
 *
 * This is the single home for every decision in the default-socket-timeout
 * feature: the opt-in gate, the per-service tier lookup, and the millisecond
 * to second conversion. Keeping it independent of the client (and of
 * DefaultsMode) makes each branch unit-testable without constructing a client,
 * and guarantees the millisecond/second boundary is crossed in exactly one
 * place.
 *
 * The feature exists to eliminate the "no socket timeout at all" case, where a
 * connection establishes, exchanges some bytes, then goes silent and hangs
 * until the OS gives up. See the Socket Read Timeout Risk Mitigation SEP.
 */
final class Configuration
{
    /**
     * Opt-in gate. The feature is OFF unless this env var is the exact string
     * "true". Unset, empty, "1", "TRUE", or any other value all count as off.
     */
    private const GATE_ENV = 'AWS_ENABLE_DEFAULT_SOCKET_TIMEOUT_2026';

    /**
     * Interim default inactivity window, in SECONDS, for any service not listed
     * in the tier table (SEP: "a default socket read timeout and a default
     * socket write timeout of 5 minutes each to all services not covered by an
     * exemption"). This is a deliberately wide safety net, not the aggressive
     * end-goal value; the tuned end-goal default lives in the separate
     * default-configuration SEP (socketReadTimeoutInMillis).
     *
     * Authored directly in seconds -- it does NOT pass through the millisecond
     * JSON, so it is never divided. Writing it as 300000 (ms) would make cURL
     * wait 300000 seconds.
     */
    private const DEFAULT_TIER_SECONDS = 300; // 5 minutes

    /** Tier value meaning "fully exempt" -- attach no timeout at all. */
    private const EXEMPT = -1;

    /** Relative path to the tier table, from this file. */
    private const TIER_FILE = '/socket_timeout_tiers.json';

    /**
     * serviceId (sdkId) => milliseconds. Null means either not-yet-loaded or
     * load-failed; the two are told apart by self::$tiersLoaded.
     *
     * @var array<string,int>|null
     */
    private static $tiers = null;

    /**
     * Whether a load has been attempted. Needed because null is a valid loaded
     * result (a missing/corrupt file), so null alone cannot mean "unloaded".
     *
     * @var bool
     */
    private static $tiersLoaded = false;

    /**
     * Resolve the inactivity timeout, in SECONDS, for a service, or null when
     * no timeout should be attached (gate off, or the service is fully exempt).
     *
     * @param string $serviceId The service's sdkId, from
     *     Service::getMetadata('serviceId'). The tier table is keyed by this
     *     exact value (e.g. "S3", "Kinesis", "Bedrock Runtime").
     *
     * @return int|null Seconds for cURL's CURLOPT_LOW_SPEED_TIME, or null.
     */
    public static function resolve(string $serviceId): ?int
    {
        if (!self::isEnabled()) {
            return null;
        }

        $tiers = self::loadTiers();

        // Defensive: if the shipped tier table could not be loaded (missing or
        // corrupt data file), attach NOTHING rather than fall through to the
        // default tier. Falling through would silently give every service --
        // including fully-exempt ones like S3 -- the 300s default, a wrong and
        // invisible behavior change. A broken data file degrades the feature to
        // a no-op, never to incorrect timeouts.
        if ($tiers === null) {
            return null;
        }

        // Unlisted services get the default tier.
        if (!isset($tiers[$serviceId])) {
            return self::DEFAULT_TIER_SECONDS;
        }

        $ms = $tiers[$serviceId];
        if ($ms === self::EXEMPT) {
            return null;
        }

        // The SEP tier table is authored in milliseconds; cURL's
        // CURLOPT_LOW_SPEED_TIME is seconds. This is the one and only place the
        // unit is converted.
        return intdiv($ms, 1000);
    }

    /**
     * Whether the opt-in gate is on. Isolated so the exact-match semantics live
     * in one place.
     */
    private static function isEnabled(): bool
    {
        return getenv(self::GATE_ENV) === 'true';
    }

    /**
     * Load (and memoize) the tier table, or null if it cannot be loaded.
     *
     * A missing file makes load_compiled_json throw; a corrupt file makes it
     * return a non-array (json_decode null). Both degrade to null here so the
     * caller attaches no timeout rather than breaking client construction or
     * caching junk. The result is memoized either way, so a broken file is read
     * at most once.
     *
     * @return array<string,int>|null
     */
    private static function loadTiers(): ?array
    {
        if (self::$tiersLoaded) {
            return self::$tiers;
        }

        self::$tiersLoaded = true;
        try {
            $loaded = \Aws\load_compiled_json(__DIR__ . self::TIER_FILE);
            self::$tiers = is_array($loaded) ? $loaded : null;
        } catch (\Throwable $e) {
            self::$tiers = null;
        }

        return self::$tiers;
    }
}
