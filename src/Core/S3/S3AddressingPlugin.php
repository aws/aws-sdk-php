<?php

declare(strict_types=1);

namespace Aws\Core\S3;

use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;

/**
 * Configure S3 bucket addressing.
 *
 * The plugin validates the addressing options when an S3 client is created.
 * S3 Transfer Acceleration supports only virtual hosted-style addressing, so
 * a client accepts `forcePathStyle` or `accelerate`, one at a time. Add the
 * plugin to an S3 client to enforce this.
 *
 * {@see self::normalizeShapes()} removes the bucket from S3 operation request
 * paths. S3 endpoint rules place the bucket in the endpoint URL: in the host
 * for virtual hosted-style addressing and in the endpoint path for path-style
 * addressing. The method drops the leading `/{Bucket}` segment from every S3
 * operation `@http` URI so the request path carries only the object key and
 * query. The `Bucket` member keeps its `@httpLabel` trait, so it remains an
 * endpoint context parameter and stays out of the body. Apply it wherever an
 * S3 model is loaded so every client builds the same request path.
 */
final class S3AddressingPlugin extends AbstractPlugin
{
    private const HTTP = 'smithy.api#http';
    private const SERVICE = 'aws.api#service';
    private const BUCKET_SEGMENT = '/{Bucket}';

    public function __construct(
        private readonly bool $forcePathStyle = false,
        private readonly bool $accelerate = false
    ) {}

    /**
     * @inheritDoc
     *
     * @throws \InvalidArgumentException When both path-style addressing and
     *     S3 Transfer Acceleration are enabled.
     */
    public function configure(AbstractClientConfig $config): AbstractClientConfig
    {
        if ($this->forcePathStyle && $this->accelerate) {
            throw new \InvalidArgumentException(
                'Path-style addressing cannot be used with S3 Accelerate. '
                . 'Set forcePathStyle or accelerate, not both.'
            );
        }

        return $config;
    }

    /**
     * Return the shapes with bucket-free operation URIs when the shapes
     * contain the S3 service.
     *
     * @param array<string, array<string, mixed>> $shapes
     * @return array<string, array<string, mixed>>
     */
    public static function normalizeShapes(array $shapes): array
    {
        if (!self::containsS3Service($shapes)) {
            return $shapes;
        }

        foreach ($shapes as &$shape) {
            if (($shape['type'] ?? null) !== 'operation') {
                continue;
            }

            $uri = $shape['traits'][self::HTTP]['uri'] ?? null;
            if (\is_string($uri) && self::startsWithBucket($uri)) {
                $shape['traits'][self::HTTP]['uri'] = \substr(
                    $uri,
                    \strlen(self::BUCKET_SEGMENT)
                );
            }
        }
        unset($shape);

        return $shapes;
    }

    /**
     * @param array<string, array<string, mixed>> $shapes
     */
    private static function containsS3Service(array $shapes): bool
    {
        foreach ($shapes as $shape) {
            if (($shape['type'] ?? null) === 'service'
                && ($shape['traits'][self::SERVICE]['sdkId'] ?? null) === 'S3'
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Return true when the URI's first path segment is exactly `{Bucket}`.
     */
    private static function startsWithBucket(string $uri): bool
    {
        if (!\str_starts_with($uri, self::BUCKET_SEGMENT)) {
            return false;
        }

        $next = $uri[\strlen(self::BUCKET_SEGMENT)] ?? '';

        return $next === '' || $next === '/' || $next === '?';
    }
}
