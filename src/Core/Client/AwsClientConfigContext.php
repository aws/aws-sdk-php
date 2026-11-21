<?php

declare(strict_types=1);

namespace Aws\Core\Client;

use Aws\Core\Credentials\AwsProfile;
use Aws\Core\Credentials\AwsProfileFile;

/**
 * Snapshot AWS client config inputs at construction time.
 */
final class AwsClientConfigContext
{
    /**
     * @param array<string, string> $env
     */
    public function __construct(
        public readonly array $env,
        public readonly string $profileName,
        public readonly ?string $credentialsFilePath,
        public readonly ?string $configFilePath,
        public readonly AwsProfileFile $profileFile,
        public readonly ?AwsProfile $profile
    ) {}

    /**
     * Return one snapshotted env var.
     */
    public function env(string $name): ?string
    {
        return $this->env[$name] ?? null;
    }
}
