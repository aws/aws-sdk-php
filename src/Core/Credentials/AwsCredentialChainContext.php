<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Credentials;

/**
 * Property-bag keys understood by the AWS credential chain.
 */
final class AwsCredentialChainContext
{
    public const PROFILE_NAME_OVERRIDE = 'aws.profileNameOverride';
    public const PROFILE_FILE = 'aws.profileFile';
    public const PROFILE = 'aws.profile';
    public const CREDENTIALS_FILE_PATH = 'aws.sharedCredentialsFilePath';
    public const CONFIG_FILE_PATH = 'aws.configFilePath';
    public const EC2_INSTANCE_PROFILE_NAME = 'aws.ec2InstanceProfileName';
    public const DISABLE_EC2_METADATA = 'aws.disableEc2Metadata';
    public const EC2_METADATA_SERVICE_ENDPOINT = 'aws.ec2MetadataServiceEndpoint';
    public const EC2_METADATA_SERVICE_ENDPOINT_MODE = 'aws.ec2MetadataServiceEndpointMode';

    private function __construct() {}
}
