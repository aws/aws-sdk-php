<?php

declare(strict_types=1);

namespace Aws\Core\Retry;

use Aws\Core\Client\AbstractAwsClientConfig;
use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Retry\RetryRequestFlagResolverInterface;
use Smithy\Client\Retry\RetryRequestFlags;
use Smithy\Core\Shape\OperationInterface;

/**
 * Resolve AWS retry request flags from service and operation metadata.
 *
 * Until `aws.api#longPoll` is available in generated operation schemas,
 * this resolver carries the specification's temporary hard-coded long-polling
 * allowlist.
 */
final class AwsRetryRequestFlagResolver
    implements RetryRequestFlagResolverInterface
{
    private static ?self $instance = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct() {}

    public function resolve(
        OperationInterface $operation,
        AbstractClientConfig $config
    ): int
    {
        if (!$config instanceof AbstractAwsClientConfig) {
            return 0;
        }

        return $this->isLongPolling($config->signingName, $operation->getName())
            ? RetryRequestFlags::LONG_POLLING
            : 0;
    }

    /**
     * Return true when the operation is in the specification's temporary allowlist.
     */
    private function isLongPolling(
        string $signingName,
        string $operationName
    ): bool
    {
        return match ($signingName) {
            'sqs' => $operationName === 'ReceiveMessage',
            'states' => $operationName === 'GetActivityTask',
            'swf' => $operationName === 'PollForActivityTask'
                || $operationName === 'PollForDecisionTask',
            default => false,
        };
    }
}
