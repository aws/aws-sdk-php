<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Client\AwsClientConfigContext;
use Aws\Core\Credentials\AwsConfigFile;
use Aws\Core\Credentials\AwsProfile;
use PHPUnit\Framework\TestCase;

final class AwsClientConfigContextTest extends TestCase
{
    public function testExposesSnapshottedInputs(): void
    {
        $profile = new AwsProfile('dev', ['region' => 'us-west-2']);
        $profileFile = new AwsConfigFile(
            ['dev' => $profile],
            credentialsFilePath: '/home/user/.aws/credentials',
            configFilePath: '/home/user/.aws/config'
        );

        $context = new AwsClientConfigContext(
            env: ['AWS_REGION' => 'eu-west-1'],
            profileName: 'dev',
            credentialsFilePath: '/home/user/.aws/credentials',
            configFilePath: '/home/user/.aws/config',
            profileFile: $profileFile,
            profile: $profile
        );

        $this->assertSame(['AWS_REGION' => 'eu-west-1'], $context->env);
        $this->assertSame('dev', $context->profileName);
        $this->assertSame(
            '/home/user/.aws/credentials',
            $context->credentialsFilePath
        );
        $this->assertSame('/home/user/.aws/config', $context->configFilePath);
        $this->assertSame($profileFile, $context->profileFile);
        $this->assertSame($profile, $context->profile);
    }

    public function testEnvReturnsSnapshottedValue(): void
    {
        $context = $this->createContext(['AWS_REGION' => 'eu-west-1']);

        $this->assertSame('eu-west-1', $context->env('AWS_REGION'));
    }

    public function testEnvReturnsNullForMissingName(): void
    {
        $context = $this->createContext(['AWS_REGION' => 'eu-west-1']);

        $this->assertNull($context->env('AWS_PROFILE'));
    }

    public function testEnvReadsTheSnapshotInsteadOfTheProcess(): void
    {
        $previous = \getenv('AWS_CONTEXT_TEST_VALUE');
        \putenv('AWS_CONTEXT_TEST_VALUE=live');
        try {
            $context = $this->createContext([
                'AWS_CONTEXT_TEST_VALUE' => 'snapshot'
            ]);

            $this->assertSame(
                'snapshot',
                $context->env('AWS_CONTEXT_TEST_VALUE')
            );
        } finally {
            \putenv(
                $previous === false
                    ? 'AWS_CONTEXT_TEST_VALUE'
                    : 'AWS_CONTEXT_TEST_VALUE=' . $previous
            );
        }
    }

    public function testProfileMayBeAbsent(): void
    {
        $context = $this->createContext([]);

        $this->assertNull($context->profile);
        $this->assertNull($context->credentialsFilePath);
        $this->assertNull($context->configFilePath);
    }

    /**
     * @param array<string, string> $env
     */
    private function createContext(array $env): AwsClientConfigContext
    {
        return new AwsClientConfigContext(
            env: $env,
            profileName: 'default',
            credentialsFilePath: null,
            configFilePath: null,
            profileFile: new AwsConfigFile([]),
            profile: null
        );
    }
}
