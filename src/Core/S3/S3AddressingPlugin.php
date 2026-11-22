<?php

declare(strict_types=1);

namespace Aws\Core\S3;

use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Plugin\AbstractPlugin;

/**
 * Validate S3 bucket addressing options when an S3 client is created.
 *
 * S3 Transfer Acceleration supports only virtual hosted-style addressing,
 * so a client accepts `forcePathStyle` or `accelerate`, one at a time. Add the
 * plugin to an S3 client to enforce this.
 */
final class S3AddressingPlugin extends AbstractPlugin
{
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
}
