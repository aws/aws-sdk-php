<?php

declare(strict_types=1);

namespace Aws\Core\UserAgent;

use Smithy\Auth\IdentityChainInterface;
use Smithy\Auth\ResolvedIdentityMetadata;
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\RequestContext;
use Smithy\Core\Transport\TransportRequestInterface;
use Smithy\Http\Message\HttpTransportRequest;
use Smithy\Http\Message\Request;

/**
 * Write the `User-Agent` header with UA 2.1 business metrics.
 *
 * This is the single recording point. It runs in `modifyBeforeTransmit`,
 * after checksum calculation and signing. The header stays outside the signature.
 *
 * Everything known at client build time arrives pre-encoded in `$prefix`,
 * `$suffix`, and `$configIds`. Each request reads a fixed set of request
 * headers, one context key, and the credential chain's last resolved
 * metadata, then looks up the final header in a memo that holds one entry
 * per checksum/waiter combination.
 */
final class UserAgentInterceptor extends AbstractInterceptor
{
    /** Context key set by the waiter call plugin. */
    public const WAITER_KEY = 'aws.userAgent.waiter';

    public const MAX_METRICS_BYTES = 1024;

    private const WAITER_ID = 'B';
    private const TRAILER_HEADER = 'x-amz-trailer';
    private const NO_ALGORITHM = -1;

    /** @var list<string> Request checksum header names. */
    private const CHECKSUM_HEADERS = [
        'x-amz-checksum-crc32',
        'x-amz-checksum-crc32c',
        'x-amz-checksum-sha1',
        'x-amz-checksum-sha256',
        'x-amz-checksum-sha512',
        'x-amz-checksum-xxhash3',
        'x-amz-checksum-xxhash64',
        'x-amz-checksum-xxhash128',
    ];

    /** @var list<string> Metric IDs parallel to CHECKSUM_HEADERS. */
    private const CHECKSUM_IDS = [
        'U', 'V', 'X', 'Y', 'AF', 'AG', 'AH', 'AI',
    ];

    /** @var array<string, int> Trailer value to CHECKSUM_HEADERS index. */
    private const TRAILER_INDEX = [
        'x-amz-checksum-crc32' => 0,
        'x-amz-checksum-crc32c' => 1,
        'x-amz-checksum-sha1' => 2,
        'x-amz-checksum-sha256' => 3,
        'x-amz-checksum-sha512' => 4,
        'x-amz-checksum-xxhash3' => 5,
        'x-amz-checksum-xxhash64' => 6,
        'x-amz-checksum-xxhash128' => 7,
    ];

    /** @var array<int, string> Header memo for requests outside a chain. */
    private array $plainMemo = [];

    /** @var \WeakMap<ResolvedIdentityMetadata, array<int, string>> */
    private \WeakMap $metadataMemo;

    /**
     * @param string $prefix Header text up to and including `lang/` and
     *        `exec-env/` tokens.
     * @param string $suffix Header text after the metrics, such as ` app/x`.
     * @param list<string> $configIds Metric IDs known at client build time.
     * @param IdentityChainInterface<*>|null $chain Credential chain whose last
     *        resolved metadata supplies provider IDs.
     * @param bool $scansChecksums True when the service sends checksum
     *        headers.
     */
    public function __construct(
        private readonly string $prefix,
        private readonly string $suffix,
        private readonly array $configIds,
        private readonly ?IdentityChainInterface $chain,
        private readonly bool $scansChecksums
    ) {
        $this->metadataMemo = new \WeakMap();
    }

    /**
     * Encode metric IDs as a comma list of at most 1 KiB.
     *
     * An over-long list is cut back to the character before the last comma
     * that fits.
     *
     * @param list<string> $ids
     */
    public static function encodeMetrics(array $ids): string
    {
        $encoded = \implode(',', $ids);
        if (\strlen($encoded) <= self::MAX_METRICS_BYTES) {
            return $encoded;
        }

        $cut = \strrpos(
            \substr($encoded, 0, self::MAX_METRICS_BYTES + 1),
            ','
        );

        return $cut === false ? '' : \substr($encoded, 0, $cut);
    }

    /** @inheritDoc */
    public function modifyBeforeTransmit(
        RequestContext $ctx
    ): TransportRequestInterface
    {
        $transport = $ctx->request;
        if (!$transport instanceof HttpTransportRequest) {
            return $transport;
        }

        $request = $transport->request;
        $algorithm = self::NO_ALGORITHM;
        if ($this->scansChecksums) {
            foreach (self::CHECKSUM_HEADERS as $index => $name) {
                if ($request->hasHeader($name)) {
                    $algorithm = $index;
                    break;
                }
            }
            if ($algorithm === self::NO_ALGORITHM
                && $request->hasHeader(self::TRAILER_HEADER)
            ) {
                $algorithm = self::TRAILER_INDEX[
                    \strtolower($request->getHeaderLine(self::TRAILER_HEADER))
                ] ?? self::NO_ALGORITHM;
            }
        }

        $waiter = ($ctx->config->context[self::WAITER_KEY] ?? false) === true;
        $key = (($algorithm + 1) << 1) | (int) $waiter;
        $metadata = $this->chain?->getLastResolvedMetadata();

        $memo = $metadata === null
            ? $this->plainMemo
            : ($this->metadataMemo[$metadata] ?? []);
        $header = $memo[$key] ?? null;
        if ($header === null) {
            $header = $this->build($algorithm, $waiter, $metadata);
            $memo[$key] = $header;
            if ($metadata === null) {
                $this->plainMemo = $memo;
            } else {
                $this->metadataMemo[$metadata] = $memo;
            }
        }

        $normalized = ['user-agent' => ['User-Agent', [$header]]];

        return $transport->withRequest(
            $request instanceof Request
                ? $request->withNormalizedHeaders($normalized)
                : $request->withHeader('User-Agent', $header)
        );
    }

    private function build(
        int $algorithm,
        bool $waiter,
        ?ResolvedIdentityMetadata $metadata
    ): string
    {
        $ids = $this->configIds;
        if ($algorithm !== self::NO_ALGORITHM) {
            $ids[] = self::CHECKSUM_IDS[$algorithm];
        }
        foreach ($metadata->featureIds ?? [] as $id) {
            if (\preg_match('/^[A-Za-z0-9+\-]+$/', $id) === 1) {
                $ids[] = $id;
            }
        }
        if ($waiter) {
            $ids[] = self::WAITER_ID;
        }

        $encoded = self::encodeMetrics(\array_values(\array_unique($ids)));

        return $this->prefix
            . ($encoded === '' ? '' : ' m/' . $encoded)
            . $this->suffix;
    }
}
