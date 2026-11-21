<?php

declare(strict_types=1);

namespace Aws\Core\Endpoint;

/**
 * Static AWS partition metadata table used by the `aws.partition` rules
 * function. Mirrors the shape of the `partitions.json` shipped by the
 * canonical SDK teams.
 *
 * Each partition entry has:
 *   - id, name          Partition identifier (matches ruleset expectations).
 *   - regionRegex       PCRE that matches all region names in this partition.
 *   - regions           `array<string, true>` of explicitly enumerated regions.
 *   - outputs           The properties returned to the ruleset:
 *                       name, dnsSuffix, dualStackDnsSuffix, supportsFIPS,
 *                       supportsDualStack, implicitGlobalRegion.
 *
 * The table is intentionally hand-authored and kept small — we only need
 * enough coverage for tests and Lambda-in-common-regions. Anything not
 * enumerated falls through to the `aws` (default) partition.
 *
 * TODO: Wire this to a generator that emits from
 * `botocore/data/partitions.json` in a future phase.
 */
final class Partitions
{
    /** @var list<array{
     *     id: string,
     *     regionRegex: string,
     *     regions: array<string, bool>,
     *     outputs: array{
     *         name: string,
     *         dnsSuffix: string,
     *         dualStackDnsSuffix: string,
     *         supportsFIPS: bool,
     *         supportsDualStack: bool,
     *         implicitGlobalRegion: string,
     *     },
     * }>|null
     */
    private static ?array $cache = null;

    /**
     * Region → outputs hash, built lazily on first `resolve()` call.
     * Turns the common exact-region path into an O(1) lookup instead
     * of a linear scan through partition entries and their regex.
     *
     * @var array<string, array{
     *     name: string,
     *     dnsSuffix: string,
     *     dualStackDnsSuffix: string,
     *     supportsFIPS: bool,
     *     supportsDualStack: bool,
     *     implicitGlobalRegion: string,
     * }>|null
     */
    private static ?array $regionIndex = null;

    private function __construct() {}

    /**
     * @return list<array{
     *     id: string,
     *     regionRegex: string,
     *     regions: array<string, bool>,
     *     outputs: array{
     *         name: string,
     *         dnsSuffix: string,
     *         dualStackDnsSuffix: string,
     *         supportsFIPS: bool,
     *         supportsDualStack: bool,
     *         implicitGlobalRegion: string,
     *     },
     * }>
     */
    public static function all(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }

        return self::$cache = [
            [
                'id' => 'aws',
                'regionRegex' => '/^(us|eu|ap|sa|ca|me|af|il|mx)\\-\\w+\\-\\d+$/',
                'regions' => [
                    'us-east-1' => true, 'us-east-2' => true, 'us-west-1' => true, 'us-west-2' => true,
                    'eu-west-1' => true, 'eu-west-2' => true, 'eu-west-3' => true, 'eu-central-1' => true,
                    'eu-north-1' => true, 'eu-south-1' => true, 'eu-south-2' => true, 'eu-central-2' => true,
                    'ap-south-1' => true, 'ap-south-2' => true, 'ap-northeast-1' => true, 'ap-northeast-2' => true,
                    'ap-northeast-3' => true, 'ap-southeast-1' => true, 'ap-southeast-2' => true, 'ap-southeast-3' => true,
                    'ap-southeast-4' => true, 'ap-east-1' => true, 'ca-central-1' => true, 'ca-west-1' => true,
                    'sa-east-1' => true, 'me-south-1' => true, 'me-central-1' => true, 'af-south-1' => true,
                    'il-central-1' => true, 'mx-central-1' => true, 'aws-global' => true,
                ],
                'outputs' => [
                    'name' => 'aws',
                    'dnsSuffix' => 'amazonaws.com',
                    'dualStackDnsSuffix' => 'api.aws',
                    'supportsFIPS' => true,
                    'supportsDualStack' => true,
                    'implicitGlobalRegion' => 'us-east-1',
                ],
            ],
            [
                'id' => 'aws-cn',
                'regionRegex' => '/^cn\\-\\w+\\-\\d+$/',
                'regions' => [
                    'cn-north-1' => true, 'cn-northwest-1' => true, 'aws-cn-global' => true,
                ],
                'outputs' => [
                    'name' => 'aws-cn',
                    'dnsSuffix' => 'amazonaws.com.cn',
                    'dualStackDnsSuffix' => 'api.amazonwebservices.com.cn',
                    'supportsFIPS' => true,
                    'supportsDualStack' => true,
                    'implicitGlobalRegion' => 'cn-northwest-1',
                ],
            ],
            [
                'id' => 'aws-us-gov',
                'regionRegex' => '/^us\\-gov\\-\\w+\\-\\d+$/',
                'regions' => [
                    'us-gov-east-1' => true, 'us-gov-west-1' => true, 'aws-us-gov-global' => true,
                ],
                'outputs' => [
                    'name' => 'aws-us-gov',
                    'dnsSuffix' => 'amazonaws.com',
                    'dualStackDnsSuffix' => 'api.aws',
                    'supportsFIPS' => true,
                    'supportsDualStack' => true,
                    'implicitGlobalRegion' => 'us-gov-west-1',
                ],
            ],
            [
                'id' => 'aws-iso',
                'regionRegex' => '/^us\\-iso\\-\\w+\\-\\d+$/',
                'regions' => ['us-iso-east-1' => true, 'us-iso-west-1' => true, 'aws-iso-global' => true],
                'outputs' => [
                    'name' => 'aws-iso',
                    'dnsSuffix' => 'c2s.ic.gov',
                    'dualStackDnsSuffix' => 'c2s.ic.gov',
                    'supportsFIPS' => true,
                    'supportsDualStack' => false,
                    'implicitGlobalRegion' => 'us-iso-east-1',
                ],
            ],
            [
                'id' => 'aws-iso-b',
                'regionRegex' => '/^us\\-isob\\-\\w+\\-\\d+$/',
                'regions' => ['us-isob-east-1' => true, 'aws-iso-b-global' => true],
                'outputs' => [
                    'name' => 'aws-iso-b',
                    'dnsSuffix' => 'sc2s.sgov.gov',
                    'dualStackDnsSuffix' => 'sc2s.sgov.gov',
                    'supportsFIPS' => true,
                    'supportsDualStack' => false,
                    'implicitGlobalRegion' => 'us-isob-east-1',
                ],
            ],
        ];
    }

    /**
     * Resolve a region name to its partition record. Returns `null` when
     * the region does not match any known partition.
     *
     * @return array{
     *     name: string,
     *     dnsSuffix: string,
     *     dualStackDnsSuffix: string,
     *     supportsFIPS: bool,
     *     supportsDualStack: bool,
     *     implicitGlobalRegion: string,
     * }|null
     */
    public static function resolve(string $region): ?array
    {
        // Exact-region lookup uses a flat map built once. Hits every
        // enumerated region (which is nearly every real-world call) in
        // a single hash probe. The regex fallback is only touched by
        // synthetic or unknown regions.
        $index = self::$regionIndex ?? self::buildRegionIndex();
        if (isset($index[$region])) {
            return $index[$region];
        }
        foreach (self::all() as $p) {
            if (\preg_match($p['regionRegex'], $region)) {
                return $p['outputs'];
            }
        }
        // Fall back to the default `aws` partition (matches botocore).
        return self::all()[0]['outputs'];
    }

    /**
     * @return array<string, array{
     *     name: string,
     *     dnsSuffix: string,
     *     dualStackDnsSuffix: string,
     *     supportsFIPS: bool,
     *     supportsDualStack: bool,
     *     implicitGlobalRegion: string,
     * }>
     */
    private static function buildRegionIndex(): array
    {
        $index = [];
        foreach (self::all() as $p) {
            foreach ($p['regions'] as $name => $_) {
                $index[$name] = $p['outputs'];
            }
        }
        return self::$regionIndex = $index;
    }
}
