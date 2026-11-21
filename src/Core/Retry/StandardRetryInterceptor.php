<?php

declare(strict_types=1);

namespace Aws\Core\Retry;

use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Core\Exception\AwsException;
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\OutputContext;
use Smithy\Core\Transport\TransportResponseInterface;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Http\Client\Exception\HttpException;
use Smithy\Http\Message\HttpTransportResponse;

/**
 * Attach retry metadata before the strategy runs.
 *
 * The interceptor wraps retryable attempt failures in an internal
 * exception that carries normalized retry facts. On the final
 * completion path it unwraps the original error so customers do not
 * see retry-internal types.
 */
final class StandardRetryInterceptor extends AbstractInterceptor
{
    private const THROTTLING_ERROR_CODES = [
        'BandwidthLimitExceeded',
        'EC2ThrottledException',
        'LimitExceededException',
        'PriorRequestNotComplete',
        'ProvisionedThroughputExceededException',
        'RequestLimitExceeded',
        'RequestThrottled',
        'RequestThrottledException',
        'SlowDown',
        'ThrottledException',
        'Throttling',
        'ThrottlingException',
        'TooManyRequestsException',
        'TransactionInProgressException'
    ];

    private const TRANSIENT_ERROR_CODES = [
        'InternalError',
        'RequestTimeout',
        'RequestTimeoutException'
    ];

    private const STS_TRANSIENT_ERROR_CODES = [
        'IDPCommunicationError',
        'IDPCommunicationErrorException'
    ];

    private static ?self $instance = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct() {}

    public function modifyBeforeAttemptCompletion(
        OutputContext $ctx,
        ?\Throwable $error,
    ): SerializableStructInterface {
        if ($error === null) {
            return $ctx->output;
        }

        $retryAfterSeconds = self::retryAfterSeconds($ctx->response);
        $modeledRetryInfo = self::modeledRetryInfo($error);
        $isThrottling = ($modeledRetryInfo['throttling'] ?? false)
            || self::isThrottling($ctx, $error);
        $isRetryable = $retryAfterSeconds !== null
            || ($modeledRetryInfo['retryable'] ?? false)
            || $isThrottling
            || self::isTransient($ctx, $error);

        if ($isRetryable) {
            throw RetryMetadataException::wrap(
                $error,
                retryable: true,
                throttling: $isThrottling,
                retryAfterSeconds: $retryAfterSeconds
            );
        }

        throw $error;
    }

    public function modifyBeforeCompletion(
        OutputContext $ctx,
        ?\Throwable $error,
    ): SerializableStructInterface {
        if ($error instanceof RetryMetadataException) {
            throw RetryMetadataException::unwrap($error);
        }

        if ($error !== null) {
            throw $error;
        }

        return $ctx->output;
    }

    private static function isThrottling(
        OutputContext $ctx,
        \Throwable $error,
    ): bool {
        $statusCode = self::statusCode($ctx->response, $error);
        if ($statusCode === 429) {
            return true;
        }

        $errorCode = self::errorCode($error);
        if ($errorCode !== null
            && \in_array($errorCode, self::THROTTLING_ERROR_CODES, true)
        ) {
            return true;
        }

        return $statusCode === 503 && $errorCode === 'SlowDown';
    }

    private static function isTransient(
        OutputContext $ctx,
        \Throwable $error,
    ): bool {
        $unwrapped = RetryMetadataException::unwrap($error);
        if ($unwrapped instanceof HttpException) {
            return true;
        }

        $statusCode = self::statusCode($ctx->response, $unwrapped);
        if ($statusCode !== null
            && ($statusCode === 500
                || $statusCode === 502
                || $statusCode === 503
                || $statusCode === 504)
        ) {
            return true;
        }

        $errorCode = self::errorCode($unwrapped);
        if ($errorCode !== null
            && \in_array($errorCode, self::TRANSIENT_ERROR_CODES, true)
        ) {
            return true;
        }

        return self::isStsTransient($ctx, $errorCode);
    }

    private static function isStsTransient(
        OutputContext $ctx,
        ?string $errorCode,
    ): bool {
        if ($errorCode === null
            || !$ctx->config instanceof AbstractAwsClientConfig
            || $ctx->config->signingName !== 'sts'
        ) {
            return false;
        }

        return \in_array($errorCode, self::STS_TRANSIENT_ERROR_CODES, true);
    }

    private static function retryAfterSeconds(
        ?TransportResponseInterface $response,
    ): ?float {
        if ($response === null) {
            return null;
        }

        $value = HttpTransportResponse::expect($response)
            ->response
            ->getHeaderLine('x-amz-retry-after');
        if ($value === '' || !\ctype_digit($value)) {
            return null;
        }

        return ((float) $value) / 1000.0;
    }

    private static function statusCode(
        ?TransportResponseInterface $response,
        \Throwable $error,
    ): ?int {
        if ($response !== null) {
            return HttpTransportResponse::expect($response)
                ->response
                ->getStatusCode();
        }

        if ($error instanceof AwsException
            && $error->getHttpStatusCode() !== null
        ) {
            return $error->getHttpStatusCode();
        }

        return null;
    }

    private static function errorCode(\Throwable $error): ?string
    {
        $unwrapped = RetryMetadataException::unwrap($error);
        if ($unwrapped instanceof AwsException
            && $unwrapped->getAwsErrorCode() !== null
            && $unwrapped->getAwsErrorCode() !== ''
        ) {
            return $unwrapped->getAwsErrorCode();
        }

        $class = $unwrapped::class;
        if (\defined($class . '::AWS_QUERY_ERROR_CODE')) {
            $code = \constant($class . '::AWS_QUERY_ERROR_CODE');
            if (\is_string($code) && $code !== '') {
                return $code;
            }
        }

        if (\defined($class . '::SHAPE_ID')) {
            $shapeId = \constant($class . '::SHAPE_ID');
            if (\is_string($shapeId) && \str_contains($shapeId, '#')) {
                return \substr($shapeId, \strrpos($shapeId, '#') + 1);
            }
        }

        return null;
    }

    /**
     * Return modeled retry metadata declared on an exception schema.
     *
     * Generated schemas encode non-empty object trait values as JSON strings.
     *
     * @return array{retryable: bool, throttling: bool}|null
     */
    private static function modeledRetryInfo(\Throwable $error): ?array
    {
        $unwrapped = RetryMetadataException::unwrap($error);
        if (!$unwrapped instanceof SerializableStructInterface) {
            return null;
        }

        $schema = $unwrapped->getSchema();

        $retryable = $schema->getTrait(Schema::T_RETRYABLE);
        if ($retryable === null || $retryable === false) {
            return null;
        }

        if ($retryable === true) {
            return [
                'retryable' => true,
                'throttling' => false
            ];
        }

        if (\is_array($retryable)) {
            return [
                'retryable' => true,
                'throttling' => ($retryable['throttling'] ?? false) === true
            ];
        }

        if (\is_string($retryable)) {
            $decoded = \json_decode($retryable, true);
            if (\is_array($decoded)) {
                return [
                    'retryable' => true,
                    'throttling' => ($decoded['throttling'] ?? false) === true
                ];
            }

            return [
                'retryable' => true,
                'throttling' => false
            ];
        }

        return [
            'retryable' => (bool) $retryable,
            'throttling' => false
        ];
    }
}
