<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Retry\Utils;

use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Retry\RetryRequestFlagResolverInterface;
use Smithy\Core\Shape\OperationInterface;

/**
 * Retry request flag resolver that always returns no flags.
 */
final class FixedFlagResolver implements RetryRequestFlagResolverInterface
{
    public function resolve(
        OperationInterface $operation,
        AbstractClientConfig $config
    ): int
    {
        return 0;
    }
}
