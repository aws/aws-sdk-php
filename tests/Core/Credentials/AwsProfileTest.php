<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials;

use Aws\Core\Credentials\AwsCredentialSource;
use Aws\Core\Credentials\AwsProfile;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Tests for {@see AwsProfile}: property lookup and credential-source detection.
 */
final class AwsProfileTest extends TestCase
{
    public function testExposesConstructorValues(): void
    {
        $profile = new AwsProfile(
            'dev',
            ['region' => 'us-west-2'],
            ['s3' => ['addressing_style' => 'path']]
        );

        $this->assertSame('dev', $profile->name);
        $this->assertSame(['region' => 'us-west-2'], $profile->properties);
        $this->assertSame(['s3' => ['addressing_style' => 'path']], $profile->subProperties);
    }

    public function testHasMatchesKeysCaseInsensitively(): void
    {
        $profile = new AwsProfile('default', ['region' => 'us-west-2', 'output' => '']);

        $this->assertTrue($profile->has('region'));
        $this->assertTrue($profile->has('REGION'));
        $this->assertTrue($profile->has('output'));
        $this->assertFalse($profile->has('aws_access_key_id'));
    }

    public function testGetMatchesKeysCaseInsensitively(): void
    {
        $profile = new AwsProfile('default', ['region' => 'us-west-2']);

        $this->assertSame('us-west-2', $profile->get('region'));
        $this->assertSame('us-west-2', $profile->get('Region'));
    }

    public function testGetReturnsNullForMissingAndEmptyValues(): void
    {
        $profile = new AwsProfile('default', ['output' => '']);

        $this->assertNull($profile->get('output'));
        $this->assertNull($profile->get('region'));
    }

    public function testGetSubPropertiesReturnsTheNamedGroup(): void
    {
        $profile = new AwsProfile(
            'default',
            [],
            ['s3' => ['addressing_style' => 'path', 'use_arn_region' => 'true']]
        );

        $this->assertSame(
            ['addressing_style' => 'path', 'use_arn_region' => 'true'],
            $profile->getSubProperties('S3')
        );
        $this->assertSame([], $profile->getSubProperties('ec2'));
    }

    public function testLegacySsoNeedsRoleBindingWithoutSsoSession(): void
    {
        $legacy = new AwsProfile('default', ['sso_account_id' => '123456789012']);
        $session = new AwsProfile('default', [
            'sso_session' => 'dev',
            'sso_role_name' => 'SampleRole',
        ]);
        $plain = new AwsProfile('default', ['region' => 'us-west-2']);

        $this->assertTrue($legacy->hasLegacySsoCredentialSource());
        $this->assertFalse($session->hasLegacySsoCredentialSource());
        $this->assertFalse($plain->hasLegacySsoCredentialSource());
    }

    public function testSsoSessionNeedsRoleBindingAndSsoSession(): void
    {
        $session = new AwsProfile('default', [
            'sso_session' => 'dev',
            'sso_account_id' => '123456789012',
        ]);
        $sessionOnly = new AwsProfile('default', ['sso_session' => 'dev']);
        $legacy = new AwsProfile('default', ['sso_role_name' => 'SampleRole']);

        $this->assertTrue($session->hasSsoSessionCredentialSource());
        $this->assertFalse($sessionOnly->hasSsoSessionCredentialSource());
        $this->assertFalse($legacy->hasSsoSessionCredentialSource());
    }

    /**
     * @param array<string, string> $properties
     * @param list<AwsCredentialSource> $expected
     */
    #[DataProvider('credentialSourceProvider')]
    public function testDetectsCredentialSources(
        array $properties,
        array $expected
    ): void
    {
        $profile = new AwsProfile('default', $properties);

        $this->assertSame($expected, $profile->detectedCredentialSources());
    }

    /**
     * @return iterable<string, array{array<string, string>, list<AwsCredentialSource>}>
     */
    public static function credentialSourceProvider(): iterable
    {
        yield 'no credentials' => [
            ['region' => 'us-west-2'],
            [],
        ];
        yield 'static keys' => [
            ['aws_access_key_id' => 'AKID', 'aws_secret_access_key' => 'SECRET'],
            [AwsCredentialSource::PROFILE_STATIC_KEYS],
        ];
        yield 'session keys' => [
            [
                'aws_access_key_id' => 'AKID',
                'aws_secret_access_key' => 'SECRET',
                'aws_session_token' => 'TOKEN',
            ],
            [AwsCredentialSource::PROFILE_SESSION_KEYS],
        ];
        yield 'access key alone' => [
            ['aws_access_key_id' => 'AKID'],
            [],
        ];
        yield 'assume role with source profile' => [
            ['role_arn' => 'arn:aws:iam::123456789012:role/demo', 'source_profile' => 'base'],
            [AwsCredentialSource::PROFILE_ASSUME_ROLE],
        ];
        yield 'assume role with credential source' => [
            ['role_arn' => 'arn:aws:iam::123456789012:role/demo', 'credential_source' => 'Environment'],
            [AwsCredentialSource::PROFILE_ASSUME_ROLE],
        ];
        yield 'web identity' => [
            ['role_arn' => 'arn:aws:iam::123456789012:role/demo', 'web_identity_token_file' => '/token'],
            [AwsCredentialSource::PROFILE_WEB_IDENTITY],
        ];
        yield 'sso session' => [
            ['sso_session' => 'dev', 'sso_account_id' => '123456789012'],
            [AwsCredentialSource::PROFILE_SSO_SESSION],
        ];
        yield 'legacy sso' => [
            ['sso_account_id' => '123456789012', 'sso_role_name' => 'SampleRole'],
            [AwsCredentialSource::PROFILE_LEGACY_SSO],
        ];
        yield 'login session' => [
            ['login_session' => 'session'],
            [AwsCredentialSource::PROFILE_LOGIN],
        ];
        yield 'credential process' => [
            ['credential_process' => 'fetch-creds'],
            [AwsCredentialSource::PROFILE_CREDENTIAL_PROCESS],
        ];
        yield 'several sources in detection order' => [
            [
                'credential_process' => 'fetch-creds',
                'aws_access_key_id' => 'AKID',
                'aws_secret_access_key' => 'SECRET',
                'role_arn' => 'arn:aws:iam::123456789012:role/demo',
                'source_profile' => 'base',
                'web_identity_token_file' => '/token',
            ],
            [
                AwsCredentialSource::PROFILE_STATIC_KEYS,
                AwsCredentialSource::PROFILE_ASSUME_ROLE,
                AwsCredentialSource::PROFILE_WEB_IDENTITY,
                AwsCredentialSource::PROFILE_CREDENTIAL_PROCESS,
            ],
        ];
    }
}
