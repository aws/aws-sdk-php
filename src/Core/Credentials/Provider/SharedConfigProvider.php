<?php

declare(strict_types=1);

namespace Aws\Core\Credentials\Provider;

use Aws\Core\Config\ConfigFileLocation;
use Aws\Core\Credentials\AwsCredentialChainContext;
use Smithy\Auth\Aws\AwsCredentialsIdentityInterface;
use Aws\Core\Credentials\AwsCredentialSource;
use Aws\Core\Credentials\AwsProfile;
use Aws\Core\Credentials\AwsProfileFile;
use Smithy\Auth\ChainIdentityProviderInterface;
use Smithy\Auth\ChainSetup;
use Smithy\Auth\OrderingConstraint;

/**
 * Load shared config state into the credential chain.
 *
 * This provider is responsible for parsing the AWS shared credentials and
 * config files, selecting the active profile, and exposing that profile to
 * later providers through the chain setup property bag. It also records the
 * profile's detected credential sources so the chain can emit missing-module
 * hints when a configured source has no installed provider.
 *
 * @implements ChainIdentityProviderInterface<AwsCredentialsIdentityInterface>
 */
final class SharedConfigProvider implements ChainIdentityProviderInterface
{
    public const ENV_PROFILE = 'AWS_PROFILE';
    public const ENV_SHARED_CREDENTIALS_FILE = 'AWS_SHARED_CREDENTIALS_FILE';
    public const ENV_CONFIG_FILE = 'AWS_CONFIG_FILE';

    /**
     * Return the provider name.
     */
    public function name(): string
    {
        return AwsCredentialSource::SHARED_CONFIG->canonicalName();
    }

    /**
     * Return the provider ordering.
     */
    public function ordering(): OrderingConstraint
    {
        return OrderingConstraint::standard(AwsCredentialSource::SHARED_CONFIG->value);
    }

    /**
     * Return the emitted feature IDs.
     *
     * @return list<string>
     */
    public function featureIds(): array
    {
        return [];
    }

    /**
     * Load the shared profile state into the chain setup.
     *
     * @return void
     */
    public function setup(ChainSetup $setup): void
    {
        $profile = $setup->getProperty(AwsCredentialChainContext::PROFILE);
        if ($profile instanceof AwsProfile) {
            return;
        }

        $profileFile = $this->resolveProfileFile($setup);
        $profileName = $this->resolveProfileName($setup);
        $profile = $profileFile->getProfile($profileName);
        if (!$profile instanceof AwsProfile) {
            return;
        }

        $setup->setProperty(AwsCredentialChainContext::PROFILE, $profile);
        $this->markDetectedSources($setup, $profile);
    }

    /**
     * Return the default shared credentials file path.
     */
    public static function defaultCredentialsFile(): ?string
    {
        return ConfigFileLocation::credentialsFile(null, self::locationEnv());
    }

    /**
     * Return the default shared config file path.
     */
    public static function defaultConfigFile(): ?string
    {
        return ConfigFileLocation::configFile(null, self::locationEnv());
    }

    private function resolveProfileFile(ChainSetup $setup): AwsProfileFile
    {
        $profileFile = $setup->getProperty(AwsCredentialChainContext::PROFILE_FILE);
        if ($profileFile instanceof AwsProfileFile) {
            return $profileFile;
        }

        $resolved = AwsProfileFile::fromFiles(
            credentialsFile: $this->resolveConfiguredPath(
                $setup,
                AwsCredentialChainContext::CREDENTIALS_FILE_PATH,
                self::defaultCredentialsFile()
            ),
            configFile: $this->resolveConfiguredPath(
                $setup,
                AwsCredentialChainContext::CONFIG_FILE_PATH,
                self::defaultConfigFile()
            )
        );
        $setup->setProperty(AwsCredentialChainContext::PROFILE_FILE, $resolved);

        return $resolved;
    }

    private function resolveProfileName(ChainSetup $setup): string
    {
        $profileName = $setup->getProperty(
            AwsCredentialChainContext::PROFILE_NAME_OVERRIDE
        );
        if (\is_string($profileName) && $profileName !== '') {
            return $profileName;
        }

        return self::readEnv(self::ENV_PROFILE) ?? 'default';
    }

    private function markDetectedSources(
        ChainSetup $setup,
        AwsProfile $profile
    ): void {
        foreach ($profile->detectedCredentialSources() as $source) {
            $setup->markDetected($source->value);
        }
    }

    private function resolveConfiguredPath(
        ChainSetup $setup,
        string $property,
        ?string $default
    ): ?string {
        $configured = $setup->getProperty($property);
        if (\is_string($configured) && $configured !== '') {
            return ConfigFileLocation::expandHome($configured, self::locationEnv());
        }

        return $default;
    }

    /**
     * Return the env values used to locate the shared files.
     *
     * @return array<string, ?string>
     */
    private static function locationEnv(): array
    {
        $env = [];
        foreach (ConfigFileLocation::ENV_NAMES as $name) {
            $env[$name] = self::readEnv($name);
        }

        return $env;
    }

    /**
     * Read an env var.
     */
    private static function readEnv(string $name): ?string
    {
        $value = $_ENV[$name] ?? getenv($name);
        if ($value === false || $value === null || $value === '') {
            return null;
        }

        return (string) $value;
    }
}
