<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Credentials;

/**
 * Model one shared-config profile.
 *
 * This is the normalized in-memory view of a single merged profile from the
 * shared credentials and config files. It also performs cheap credential-
 * source detection from the profile's own keys.
 */
final class AwsProfile
{
    /**
     * Create a profile view.
     *
     * Property keys are lower-case, as produced by the profile file parser.
     *
     * @param array<string, string> $properties
     * @param array<string, array<string, string>> $subProperties
     *     Sub-properties keyed by their parent property, e.g. `s3`.
     */
    public function __construct(
        public readonly string $name,
        public readonly array $properties,
        public readonly array $subProperties = []
    ) {}

    /**
     * Check whether a property exists. Keys match case-insensitively.
     */
    public function has(string $key): bool
    {
        return \array_key_exists(\strtolower($key), $this->properties);
    }

    /**
     * Return a normalized property value. Keys match case-insensitively.
     */
    public function get(string $key): ?string
    {
        $value = $this->properties[\strtolower($key)] ?? null;

        return $value === '' ? null : $value;
    }

    /**
     * Return the sub-properties of a property, e.g. `s3`.
     *
     * @return array<string, string>
     */
    public function getSubProperties(string $key): array
    {
        return $this->subProperties[\strtolower($key)] ?? [];
    }

    /**
     * Check whether this profile uses legacy inline SSO settings.
     */
    public function hasLegacySsoCredentialSource(): bool
    {
        return $this->get('sso_session') === null && $this->hasSsoRoleBinding();
    }

    /**
     * Check whether this profile uses an `sso_session` section.
     */
    public function hasSsoSessionCredentialSource(): bool
    {
        return $this->get('sso_session') !== null && $this->hasSsoRoleBinding();
    }

    /**
     * Return all detected credential sources in this profile.
     *
     * @return list<AwsCredentialSource>
     */
    public function detectedCredentialSources(): array
    {
        $detected = [];

        $accessKey = $this->get('aws_access_key_id');
        $secretKey = $this->get('aws_secret_access_key');
        $sessionToken = $this->get('aws_session_token');
        if ($accessKey !== null && $secretKey !== null) {
            $detected[] = $sessionToken === null
                ? AwsCredentialSource::PROFILE_STATIC_KEYS
                : AwsCredentialSource::PROFILE_SESSION_KEYS;
        }

        if ($this->get('role_arn') !== null
            && (
                $this->get('source_profile') !== null
                || $this->get('credential_source') !== null
            )
        ) {
            $detected[] = AwsCredentialSource::PROFILE_ASSUME_ROLE;
        }

        if ($this->get('role_arn') !== null && $this->get('web_identity_token_file') !== null) {
            $detected[] = AwsCredentialSource::PROFILE_WEB_IDENTITY;
        }

        if ($this->hasSsoSessionCredentialSource()) {
            $detected[] = AwsCredentialSource::PROFILE_SSO_SESSION;
        }

        if ($this->hasLegacySsoCredentialSource()) {
            $detected[] = AwsCredentialSource::PROFILE_LEGACY_SSO;
        }

        if ($this->get('login_session') !== null) {
            $detected[] = AwsCredentialSource::PROFILE_LOGIN;
        }

        if ($this->get('credential_process') !== null) {
            $detected[] = AwsCredentialSource::PROFILE_CREDENTIAL_PROCESS;
        }

        return $detected;
    }

    private function hasSsoRoleBinding(): bool
    {
        return $this->get('sso_account_id') !== null
            || $this->get('sso_role_name') !== null;
    }
}
