<?php

declare(strict_types=1);

namespace Aws\Core\Model;

/**
 * Supply AWS authentication metadata omitted from service model closures.
 */
final class AwsAuthModelNormalizer
{
    private const AUTH = 'smithy.api#auth';

    private const AWS_AUTH_SCHEMES = [
        'aws.auth#sigv4',
        'aws.auth#sigv4a'
    ];

    private function __construct() {}

    /**
     * @param array<string, array<string, mixed>> $shapes
     * @return array<string, array<string, mixed>>
     */
    public static function normalizeShapes(array $shapes): array
    {
        foreach ($shapes as &$shape) {
            if (($shape['type'] ?? null) !== 'service') {
                continue;
            }

            $traits = $shape['traits'] ?? [];
            if (!\is_array($traits)
                || \array_key_exists(self::AUTH, $traits)
            ) {
                continue;
            }

            $authSchemes = [];
            foreach (self::AWS_AUTH_SCHEMES as $schemeId) {
                if (\array_key_exists($schemeId, $traits)) {
                    $authSchemes[] = $schemeId;
                }
            }
            if ($authSchemes !== []) {
                $shape['traits'][self::AUTH] = $authSchemes;
            }
        }
        unset($shape);

        return $shapes;
    }
}
