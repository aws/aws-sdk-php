<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

return array (
    'apiVersion' => '2013-05-15',
    'endpointPrefix' => 'rds',
    'serviceFullName' => 'Amazon Relational Database Service',
    'serviceAbbreviation' => 'Amazon RDS',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'Rds',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'rds.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'rds.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'rds.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'rds.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'rds.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'rds.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'rds.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'rds.sa-east-1.amazonaws.com',
        ),
        'us-gov-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'rds.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AddSourceIdentifierToSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventSubscriptionWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AddSourceIdentifierToSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'SubscriptionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The subscription name does not exist.',
                    'class' => 'SubscriptionNotFoundException',
                ),
                array(
                    'reason' => 'The requested source could not be found.',
                    'class' => 'SourceNotFoundException',
                ),
            ),
        ),
        'AddTagsToResource' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AddTagsToResource',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'ResourceName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Tags' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tags.member',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
                array(
                    'reason' => 'DBSnapshotIdentifier does not refer to an existing DB Snapshot.',
                    'class' => 'DBSnapshotNotFoundException',
                ),
            ),
        ),
        'AuthorizeDBSecurityGroupIngress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AuthorizeDBSecurityGroupIngress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CIDRIP' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupOwnerId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBSecurityGroupName does not refer to an existing DB Security Group.',
                    'class' => 'DBSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The state of the DB Security Group does not allow deletion.',
                    'class' => 'InvalidDBSecurityGroupStateException',
                ),
                array(
                    'reason' => 'The specified CIDRIP or EC2 security group is already authorized for the specified DB security group.',
                    'class' => 'AuthorizationAlreadyExistsException',
                ),
                array(
                    'reason' => 'Database security group authorization quota has been reached.',
                    'class' => 'AuthorizationQuotaExceededException',
                ),
            ),
        ),
        'CopyDBSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CopyDBSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'SourceDBSnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'TargetDBSnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBSnapshotIdentifier is already used by an existing snapshot.',
                    'class' => 'DBSnapshotAlreadyExistsException',
                ),
                array(
                    'reason' => 'DBSnapshotIdentifier does not refer to an existing DB Snapshot.',
                    'class' => 'DBSnapshotNotFoundException',
                ),
                array(
                    'reason' => 'The state of the DB Security Snapshot does not allow deletion.',
                    'class' => 'InvalidDBSnapshotStateException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of DB Snapshots.',
                    'class' => 'SnapshotQuotaExceededException',
                ),
            ),
        ),
        'CreateDBInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBInstanceWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateDBInstance',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AllocatedStorage' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'DBInstanceClass' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Engine' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MasterUsername' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MasterUserPassword' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBSecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'DBSecurityGroups.member',
                    'items' => array(
                        'name' => 'DBSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'VpcSecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpcSecurityGroupIds.member',
                    'items' => array(
                        'name' => 'VpcSecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBSubnetGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'BackupRetentionPeriod' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PreferredBackupWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Port' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MultiAZ' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'EngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutoMinorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'LicenseModel' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Iops' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'OptionGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CharacterSetName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PubliclyAccessible' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'User already has a DB Instance with the given identifier.',
                    'class' => 'DBInstanceAlreadyExistsException',
                ),
                array(
                    'reason' => 'Specified DB Instance class is not available in the specified Availability Zone.',
                    'class' => 'InsufficientDBInstanceCapacityException',
                ),
                array(
                    'reason' => 'DBParameterGroupName does not refer to an existing DB Parameter Group.',
                    'class' => 'DBParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'DBSecurityGroupName does not refer to an existing DB Security Group.',
                    'class' => 'DBSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of DB Instances.',
                    'class' => 'InstanceQuotaExceededException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed amount of storage available across all DB Instances.',
                    'class' => 'StorageQuotaExceededException',
                ),
                array(
                    'reason' => 'DBSubnetGroupName does not refer to an existing DB Subnet Group.',
                    'class' => 'DBSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'Subnets in the DB subnet group should cover at least 2 availability zones unless there\'s\'only 1 available zone.',
                    'class' => 'DBSubnetGroupDoesNotCoverEnoughAZsException',
                ),
                array(
                    'reason' => 'Request subnet is valid, or all subnets are not in common Vpc.',
                    'class' => 'InvalidSubnetException',
                ),
                array(
                    'reason' => 'DB Subnet Group does not cover all availability zones after it is created because users\' change.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'Provisioned IOPS not available in the specified Availability Zone.',
                    'class' => 'ProvisionedIopsNotAvailableInAZException',
                ),
                array(
                    'reason' => 'The specified option group could not be found.',
                    'class' => 'OptionGroupNotFoundException',
                ),
            ),
        ),
        'CreateDBInstanceReadReplica' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBInstanceWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateDBInstanceReadReplica',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceDBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBInstanceClass' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Port' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'AutoMinorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Iops' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'OptionGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PubliclyAccessible' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'User already has a DB Instance with the given identifier.',
                    'class' => 'DBInstanceAlreadyExistsException',
                ),
                array(
                    'reason' => 'Specified DB Instance class is not available in the specified Availability Zone.',
                    'class' => 'InsufficientDBInstanceCapacityException',
                ),
                array(
                    'reason' => 'DBParameterGroupName does not refer to an existing DB Parameter Group.',
                    'class' => 'DBParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'DBSecurityGroupName does not refer to an existing DB Security Group.',
                    'class' => 'DBSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of DB Instances.',
                    'class' => 'InstanceQuotaExceededException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed amount of storage available across all DB Instances.',
                    'class' => 'StorageQuotaExceededException',
                ),
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
                array(
                    'reason' => 'The specified DB Instance is not in the available state.',
                    'class' => 'InvalidDBInstanceStateException',
                ),
                array(
                    'reason' => 'DBSubnetGroupName does not refer to an existing DB Subnet Group.',
                    'class' => 'DBSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'Subnets in the DB subnet group should cover at least 2 availability zones unless there\'s\'only 1 available zone.',
                    'class' => 'DBSubnetGroupDoesNotCoverEnoughAZsException',
                ),
                array(
                    'reason' => 'Request subnet is valid, or all subnets are not in common Vpc.',
                    'class' => 'InvalidSubnetException',
                ),
                array(
                    'reason' => 'DB Subnet Group does not cover all availability zones after it is created because users\' change.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'Provisioned IOPS not available in the specified Availability Zone.',
                    'class' => 'ProvisionedIopsNotAvailableInAZException',
                ),
                array(
                    'reason' => 'The specified option group could not be found.',
                    'class' => 'OptionGroupNotFoundException',
                ),
            ),
        ),
        'CreateDBParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBParameterGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateDBParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBParameterGroupFamily' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of DB Parameter Groups.',
                    'class' => 'DBParameterGroupQuotaExceededException',
                ),
                array(
                    'reason' => 'A DB Parameter Group with the same name exists.',
                    'class' => 'DBParameterGroupAlreadyExistsException',
                ),
            ),
        ),
        'CreateDBSecurityGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateDBSecurityGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBSecurityGroupDescription' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A database security group with the name specified in DBSecurityGroupName already exists.',
                    'class' => 'DBSecurityGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of DB Security Groups.',
                    'class' => 'DBSecurityGroupQuotaExceededException',
                ),
                array(
                    'reason' => 'A DB security group is not allowed for this action.',
                    'class' => 'DBSecurityGroupNotSupportedException',
                ),
            ),
        ),
        'CreateDBSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateDBSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBSnapshotIdentifier is already used by an existing snapshot.',
                    'class' => 'DBSnapshotAlreadyExistsException',
                ),
                array(
                    'reason' => 'The specified DB Instance is not in the available state.',
                    'class' => 'InvalidDBInstanceStateException',
                ),
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of DB Snapshots.',
                    'class' => 'SnapshotQuotaExceededException',
                ),
            ),
        ),
        'CreateDBSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSubnetGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateDBSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBSubnetGroupDescription' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SubnetIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SubnetIds.member',
                    'items' => array(
                        'name' => 'SubnetIdentifier',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBSubnetGroupName is already used by an existing DBSubnetGroup.',
                    'class' => 'DBSubnetGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of DB Subnet Groups.',
                    'class' => 'DBSubnetGroupQuotaExceededException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of subnets in a DB subnet Groups.',
                    'class' => 'DBSubnetQuotaExceededException',
                ),
                array(
                    'reason' => 'Subnets in the DB subnet group should cover at least 2 availability zones unless there\'s\'only 1 available zone.',
                    'class' => 'DBSubnetGroupDoesNotCoverEnoughAZsException',
                ),
                array(
                    'reason' => 'Request subnet is valid, or all subnets are not in common Vpc.',
                    'class' => 'InvalidSubnetException',
                ),
            ),
        ),
        'CreateEventSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventSubscriptionWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateEventSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'SubscriptionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnsTopicArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EventCategories' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'EventCategories.member',
                    'items' => array(
                        'name' => 'EventCategory',
                        'type' => 'string',
                    ),
                ),
                'SourceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SourceIds.member',
                    'items' => array(
                        'name' => 'SourceId',
                        'type' => 'string',
                    ),
                ),
                'Enabled' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have reached the maximum number of event subscriptions.',
                    'class' => 'EventSubscriptionQuotaExceededException',
                ),
                array(
                    'reason' => 'The supplied subscription name already exists.',
                    'class' => 'SubscriptionAlreadyExistException',
                ),
                array(
                    'reason' => 'SNS has responded that there is a problem with the SND topic specified.',
                    'class' => 'SNSInvalidTopicException',
                ),
                array(
                    'reason' => 'You do not have permission to publish to the SNS topic ARN.',
                    'class' => 'SNSNoAuthorizationException',
                ),
                array(
                    'reason' => 'The SNS topic ARN does not exist.',
                    'class' => 'SNSTopicArnNotFoundException',
                ),
                array(
                    'reason' => 'The supplied category does not exist.',
                    'class' => 'SubscriptionCategoryNotFoundException',
                ),
                array(
                    'reason' => 'The requested source could not be found.',
                    'class' => 'SourceNotFoundException',
                ),
            ),
        ),
        'CreateOptionGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'OptionGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateOptionGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'OptionGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EngineName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MajorEngineVersion' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OptionGroupDescription' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The option group you are trying to create already exists.',
                    'class' => 'OptionGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'The quota of 20 option groups was exceeded for this AWS account.',
                    'class' => 'OptionGroupQuotaExceededException',
                ),
            ),
        ),
        'DeleteDBInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBInstanceWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteDBInstance',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SkipFinalSnapshot' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'FinalDBSnapshotIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
                array(
                    'reason' => 'The specified DB Instance is not in the available state.',
                    'class' => 'InvalidDBInstanceStateException',
                ),
                array(
                    'reason' => 'DBSnapshotIdentifier is already used by an existing snapshot.',
                    'class' => 'DBSnapshotAlreadyExistsException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of DB Snapshots.',
                    'class' => 'SnapshotQuotaExceededException',
                ),
            ),
        ),
        'DeleteDBParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteDBParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The DB Parameter Group cannot be deleted because it is in use.',
                    'class' => 'InvalidDBParameterGroupStateException',
                ),
                array(
                    'reason' => 'DBParameterGroupName does not refer to an existing DB Parameter Group.',
                    'class' => 'DBParameterGroupNotFoundException',
                ),
            ),
        ),
        'DeleteDBSecurityGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteDBSecurityGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The state of the DB Security Group does not allow deletion.',
                    'class' => 'InvalidDBSecurityGroupStateException',
                ),
                array(
                    'reason' => 'DBSecurityGroupName does not refer to an existing DB Security Group.',
                    'class' => 'DBSecurityGroupNotFoundException',
                ),
            ),
        ),
        'DeleteDBSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSnapshotWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteDBSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The state of the DB Security Snapshot does not allow deletion.',
                    'class' => 'InvalidDBSnapshotStateException',
                ),
                array(
                    'reason' => 'DBSnapshotIdentifier does not refer to an existing DB Snapshot.',
                    'class' => 'DBSnapshotNotFoundException',
                ),
            ),
        ),
        'DeleteDBSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteDBSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The DB Subnet Group cannot be deleted because it is in use.',
                    'class' => 'InvalidDBSubnetGroupStateException',
                ),
                array(
                    'reason' => 'The DB subnet is not in the available state.',
                    'class' => 'InvalidDBSubnetStateException',
                ),
                array(
                    'reason' => 'DBSubnetGroupName does not refer to an existing DB Subnet Group.',
                    'class' => 'DBSubnetGroupNotFoundException',
                ),
            ),
        ),
        'DeleteEventSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventSubscriptionWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteEventSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'SubscriptionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The subscription name does not exist.',
                    'class' => 'SubscriptionNotFoundException',
                ),
                array(
                    'reason' => 'This error can occur if someone else is modifying a subscription. You should retry the action.',
                    'class' => 'InvalidEventSubscriptionStateException',
                ),
            ),
        ),
        'DeleteOptionGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteOptionGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'OptionGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified option group could not be found.',
                    'class' => 'OptionGroupNotFoundException',
                ),
                array(
                    'reason' => 'The Option Group is not in the available state.',
                    'class' => 'InvalidOptionGroupStateException',
                ),
            ),
        ),
        'DescribeDBEngineVersions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBEngineVersionMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDBEngineVersions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'Engine' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBParameterGroupFamily' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DefaultOnly' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ListSupportedCharacterSets' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeDBInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBInstanceMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDBInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBInstanceIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
            ),
        ),
        'DescribeDBLogFiles' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeDBLogFilesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDBLogFiles',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBInstanceIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'FilenameContains' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'FileLastWritten' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'FileSize' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
            ),
        ),
        'DescribeDBParameterGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBParameterGroupsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDBParameterGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBParameterGroupName does not refer to an existing DB Parameter Group.',
                    'class' => 'DBParameterGroupNotFoundException',
                ),
            ),
        ),
        'DescribeDBParameters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBParameterGroupDetails',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDBParameters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Source' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBParameterGroupName does not refer to an existing DB Parameter Group.',
                    'class' => 'DBParameterGroupNotFoundException',
                ),
            ),
        ),
        'DescribeDBSecurityGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSecurityGroupMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDBSecurityGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSecurityGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBSecurityGroupName does not refer to an existing DB Security Group.',
                    'class' => 'DBSecurityGroupNotFoundException',
                ),
            ),
        ),
        'DescribeDBSnapshots' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSnapshotMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDBSnapshots',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBInstanceIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBSnapshotIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnapshotType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBSnapshotIdentifier does not refer to an existing DB Snapshot.',
                    'class' => 'DBSnapshotNotFoundException',
                ),
            ),
        ),
        'DescribeDBSubnetGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSubnetGroupMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDBSubnetGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSubnetGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBSubnetGroupName does not refer to an existing DB Subnet Group.',
                    'class' => 'DBSubnetGroupNotFoundException',
                ),
            ),
        ),
        'DescribeEngineDefaultParameters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EngineDefaultsWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeEngineDefaultParameters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBParameterGroupFamily' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeEventCategories' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventCategoriesMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeEventCategories',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'SourceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeEventSubscriptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventSubscriptionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeEventSubscriptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'SubscriptionName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The subscription name does not exist.',
                    'class' => 'SubscriptionNotFoundException',
                ),
            ),
        ),
        'DescribeEvents' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeEvents',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'SourceIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'enum' => array(
                        'db-instance',
                        'db-parameter-group',
                        'db-security-group',
                        'db-snapshot',
                    ),
                ),
                'StartTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'EndTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'Duration' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'EventCategories' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'EventCategories.member',
                    'items' => array(
                        'name' => 'EventCategory',
                        'type' => 'string',
                    ),
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeOptionGroupOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'OptionGroupOptionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeOptionGroupOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'EngineName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MajorEngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeOptionGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'OptionGroups',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeOptionGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'OptionGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'EngineName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MajorEngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified option group could not be found.',
                    'class' => 'OptionGroupNotFoundException',
                ),
            ),
        ),
        'DescribeOrderableDBInstanceOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'OrderableDBInstanceOptionsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeOrderableDBInstanceOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'Engine' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBInstanceClass' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LicenseModel' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Vpc' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeReservedDBInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedDBInstanceMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedDBInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'ReservedDBInstanceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReservedDBInstancesOfferingId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBInstanceClass' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Duration' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ProductDescription' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OfferingType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MultiAZ' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified reserved DB Instance not found.',
                    'class' => 'ReservedDBInstanceNotFoundException',
                ),
            ),
        ),
        'DescribeReservedDBInstancesOfferings' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedDBInstancesOfferingMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedDBInstancesOfferings',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'ReservedDBInstancesOfferingId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBInstanceClass' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Duration' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ProductDescription' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OfferingType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MultiAZ' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Specified offering does not exist.',
                    'class' => 'ReservedDBInstancesOfferingNotFoundException',
                ),
            ),
        ),
        'DownloadDBLogFilePortion' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DownloadDBLogFilePortionDetails',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DownloadDBLogFilePortion',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBInstanceIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LogFileName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NumberOfLines' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
            ),
        ),
        'ListTagsForResource' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'TagListMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListTagsForResource',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'ResourceName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
                array(
                    'reason' => 'DBSnapshotIdentifier does not refer to an existing DB Snapshot.',
                    'class' => 'DBSnapshotNotFoundException',
                ),
            ),
        ),
        'ModifyDBInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBInstanceWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyDBInstance',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AllocatedStorage' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'DBInstanceClass' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBSecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'DBSecurityGroups.member',
                    'items' => array(
                        'name' => 'DBSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'VpcSecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpcSecurityGroupIds.member',
                    'items' => array(
                        'name' => 'VpcSecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'ApplyImmediately' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'MasterUserPassword' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'BackupRetentionPeriod' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PreferredBackupWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MultiAZ' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'EngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AllowMajorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AutoMinorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Iops' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'OptionGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NewDBInstanceIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified DB Instance is not in the available state.',
                    'class' => 'InvalidDBInstanceStateException',
                ),
                array(
                    'reason' => 'The state of the DB Security Group does not allow deletion.',
                    'class' => 'InvalidDBSecurityGroupStateException',
                ),
                array(
                    'reason' => 'User already has a DB Instance with the given identifier.',
                    'class' => 'DBInstanceAlreadyExistsException',
                ),
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
                array(
                    'reason' => 'DBSecurityGroupName does not refer to an existing DB Security Group.',
                    'class' => 'DBSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'DBParameterGroupName does not refer to an existing DB Parameter Group.',
                    'class' => 'DBParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'Specified DB Instance class is not available in the specified Availability Zone.',
                    'class' => 'InsufficientDBInstanceCapacityException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed amount of storage available across all DB Instances.',
                    'class' => 'StorageQuotaExceededException',
                ),
                array(
                    'reason' => 'DB Subnet Group does not cover all availability zones after it is created because users\' change.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'Provisioned IOPS not available in the specified Availability Zone.',
                    'class' => 'ProvisionedIopsNotAvailableInAZException',
                ),
                array(
                    'reason' => 'The specified option group could not be found.',
                    'class' => 'OptionGroupNotFoundException',
                ),
                array(
                    'class' => 'DBUpgradeDependencyFailureException',
                ),
            ),
        ),
        'ModifyDBParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBParameterGroupNameMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyDBParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Parameters' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Parameters.member',
                    'items' => array(
                        'name' => 'Parameter',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Source' => array(
                                'type' => 'string',
                            ),
                            'ApplyType' => array(
                                'type' => 'string',
                            ),
                            'DataType' => array(
                                'type' => 'string',
                            ),
                            'AllowedValues' => array(
                                'type' => 'string',
                            ),
                            'IsModifiable' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                            'MinimumEngineVersion' => array(
                                'type' => 'string',
                            ),
                            'ApplyMethod' => array(
                                'type' => 'string',
                                'enum' => array(
                                    'immediate',
                                    'pending-reboot',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBParameterGroupName does not refer to an existing DB Parameter Group.',
                    'class' => 'DBParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The DB Parameter Group cannot be deleted because it is in use.',
                    'class' => 'InvalidDBParameterGroupStateException',
                ),
            ),
        ),
        'ModifyDBSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSubnetGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyDBSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBSubnetGroupDescription' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SubnetIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SubnetIds.member',
                    'items' => array(
                        'name' => 'SubnetIdentifier',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBSubnetGroupName does not refer to an existing DB Subnet Group.',
                    'class' => 'DBSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of subnets in a DB subnet Groups.',
                    'class' => 'DBSubnetQuotaExceededException',
                ),
                array(
                    'reason' => 'The DB subnet is already in use in the availability zone.',
                    'class' => 'SubnetAlreadyInUseException',
                ),
                array(
                    'reason' => 'Subnets in the DB subnet group should cover at least 2 availability zones unless there\'s\'only 1 available zone.',
                    'class' => 'DBSubnetGroupDoesNotCoverEnoughAZsException',
                ),
                array(
                    'reason' => 'Request subnet is valid, or all subnets are not in common Vpc.',
                    'class' => 'InvalidSubnetException',
                ),
            ),
        ),
        'ModifyEventSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventSubscriptionWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyEventSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'SubscriptionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SnsTopicArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EventCategories' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'EventCategories.member',
                    'items' => array(
                        'name' => 'EventCategory',
                        'type' => 'string',
                    ),
                ),
                'Enabled' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have reached the maximum number of event subscriptions.',
                    'class' => 'EventSubscriptionQuotaExceededException',
                ),
                array(
                    'reason' => 'The subscription name does not exist.',
                    'class' => 'SubscriptionNotFoundException',
                ),
                array(
                    'reason' => 'SNS has responded that there is a problem with the SND topic specified.',
                    'class' => 'SNSInvalidTopicException',
                ),
                array(
                    'reason' => 'You do not have permission to publish to the SNS topic ARN.',
                    'class' => 'SNSNoAuthorizationException',
                ),
                array(
                    'reason' => 'The SNS topic ARN does not exist.',
                    'class' => 'SNSTopicArnNotFoundException',
                ),
                array(
                    'reason' => 'The supplied category does not exist.',
                    'class' => 'SubscriptionCategoryNotFoundException',
                ),
            ),
        ),
        'ModifyOptionGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'OptionGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyOptionGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'OptionGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OptionsToInclude' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OptionsToInclude.member',
                    'items' => array(
                        'name' => 'OptionConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'OptionName' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Port' => array(
                                'type' => 'numeric',
                            ),
                            'DBSecurityGroupMemberships' => array(
                                'type' => 'array',
                                'sentAs' => 'DBSecurityGroupMemberships.member',
                                'items' => array(
                                    'name' => 'DBSecurityGroupName',
                                    'type' => 'string',
                                ),
                            ),
                            'VpcSecurityGroupMemberships' => array(
                                'type' => 'array',
                                'sentAs' => 'VpcSecurityGroupMemberships.member',
                                'items' => array(
                                    'name' => 'VpcSecurityGroupId',
                                    'type' => 'string',
                                ),
                            ),
                            'OptionSettings' => array(
                                'type' => 'array',
                                'sentAs' => 'OptionSettings.member',
                                'items' => array(
                                    'name' => 'OptionSetting',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'Description' => array(
                                            'type' => 'string',
                                        ),
                                        'ApplyType' => array(
                                            'type' => 'string',
                                        ),
                                        'DataType' => array(
                                            'type' => 'string',
                                        ),
                                        'AllowedValues' => array(
                                            'type' => 'string',
                                        ),
                                        'IsModifiable' => array(
                                            'type' => 'boolean',
                                            'format' => 'boolean-string',
                                        ),
                                        'IsCollection' => array(
                                            'type' => 'boolean',
                                            'format' => 'boolean-string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'OptionsToRemove' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OptionsToRemove.member',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'ApplyImmediately' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The Option Group is not in the available state.',
                    'class' => 'InvalidOptionGroupStateException',
                ),
                array(
                    'reason' => 'The specified option group could not be found.',
                    'class' => 'OptionGroupNotFoundException',
                ),
            ),
        ),
        'PromoteReadReplica' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBInstanceWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PromoteReadReplica',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'BackupRetentionPeriod' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PreferredBackupWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified DB Instance is not in the available state.',
                    'class' => 'InvalidDBInstanceStateException',
                ),
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
            ),
        ),
        'PurchaseReservedDBInstancesOffering' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedDBInstanceWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PurchaseReservedDBInstancesOffering',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'ReservedDBInstancesOfferingId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReservedDBInstanceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBInstanceCount' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Specified offering does not exist.',
                    'class' => 'ReservedDBInstancesOfferingNotFoundException',
                ),
                array(
                    'reason' => 'User already has a reservation with the given identifier.',
                    'class' => 'ReservedDBInstanceAlreadyExistsException',
                ),
                array(
                    'reason' => 'Request would exceed the user\'s DB Instance quota.',
                    'class' => 'ReservedDBInstanceQuotaExceededException',
                ),
            ),
        ),
        'RebootDBInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBInstanceWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RebootDBInstance',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ForceFailover' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified DB Instance is not in the available state.',
                    'class' => 'InvalidDBInstanceStateException',
                ),
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
            ),
        ),
        'RemoveSourceIdentifierFromSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EventSubscriptionWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RemoveSourceIdentifierFromSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'SubscriptionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The subscription name does not exist.',
                    'class' => 'SubscriptionNotFoundException',
                ),
                array(
                    'reason' => 'The requested source could not be found.',
                    'class' => 'SourceNotFoundException',
                ),
            ),
        ),
        'RemoveTagsFromResource' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RemoveTagsFromResource',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'ResourceName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'TagKeys' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'TagKeys.member',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
                array(
                    'reason' => 'DBSnapshotIdentifier does not refer to an existing DB Snapshot.',
                    'class' => 'DBSnapshotNotFoundException',
                ),
            ),
        ),
        'ResetDBParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBParameterGroupNameMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ResetDBParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ResetAllParameters' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Parameters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Parameters.member',
                    'items' => array(
                        'name' => 'Parameter',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Source' => array(
                                'type' => 'string',
                            ),
                            'ApplyType' => array(
                                'type' => 'string',
                            ),
                            'DataType' => array(
                                'type' => 'string',
                            ),
                            'AllowedValues' => array(
                                'type' => 'string',
                            ),
                            'IsModifiable' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                            'MinimumEngineVersion' => array(
                                'type' => 'string',
                            ),
                            'ApplyMethod' => array(
                                'type' => 'string',
                                'enum' => array(
                                    'immediate',
                                    'pending-reboot',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The DB Parameter Group cannot be deleted because it is in use.',
                    'class' => 'InvalidDBParameterGroupStateException',
                ),
                array(
                    'reason' => 'DBParameterGroupName does not refer to an existing DB Parameter Group.',
                    'class' => 'DBParameterGroupNotFoundException',
                ),
            ),
        ),
        'RestoreDBInstanceFromDBSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBInstanceWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RestoreDBInstanceFromDBSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBSnapshotIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBInstanceClass' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Port' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBSubnetGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MultiAZ' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PubliclyAccessible' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AutoMinorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'LicenseModel' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Engine' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Iops' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'OptionGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'User already has a DB Instance with the given identifier.',
                    'class' => 'DBInstanceAlreadyExistsException',
                ),
                array(
                    'reason' => 'DBSnapshotIdentifier does not refer to an existing DB Snapshot.',
                    'class' => 'DBSnapshotNotFoundException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of DB Instances.',
                    'class' => 'InstanceQuotaExceededException',
                ),
                array(
                    'reason' => 'Specified DB Instance class is not available in the specified Availability Zone.',
                    'class' => 'InsufficientDBInstanceCapacityException',
                ),
                array(
                    'reason' => 'The state of the DB Security Snapshot does not allow deletion.',
                    'class' => 'InvalidDBSnapshotStateException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed amount of storage available across all DB Instances.',
                    'class' => 'StorageQuotaExceededException',
                ),
                array(
                    'reason' => 'DB Subnet Group does not cover all availability zones after it is created because users\' change.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'Cannot restore from vpc backup to non-vpc DB instance.',
                    'class' => 'InvalidRestoreException',
                ),
                array(
                    'reason' => 'DBSubnetGroupName does not refer to an existing DB Subnet Group.',
                    'class' => 'DBSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'Subnets in the DB subnet group should cover at least 2 availability zones unless there\'s\'only 1 available zone.',
                    'class' => 'DBSubnetGroupDoesNotCoverEnoughAZsException',
                ),
                array(
                    'reason' => 'Request subnet is valid, or all subnets are not in common Vpc.',
                    'class' => 'InvalidSubnetException',
                ),
                array(
                    'reason' => 'Provisioned IOPS not available in the specified Availability Zone.',
                    'class' => 'ProvisionedIopsNotAvailableInAZException',
                ),
                array(
                    'reason' => 'The specified option group could not be found.',
                    'class' => 'OptionGroupNotFoundException',
                ),
            ),
        ),
        'RestoreDBInstanceToPointInTime' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBInstanceWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RestoreDBInstanceToPointInTime',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'SourceDBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'TargetDBInstanceIdentifier' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RestoreTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'UseLatestRestorableTime' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'DBInstanceClass' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Port' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBSubnetGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MultiAZ' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PubliclyAccessible' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AutoMinorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'LicenseModel' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DBName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Engine' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Iops' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'OptionGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'User already has a DB Instance with the given identifier.',
                    'class' => 'DBInstanceAlreadyExistsException',
                ),
                array(
                    'reason' => 'DBInstanceIdentifier does not refer to an existing DB Instance.',
                    'class' => 'DBInstanceNotFoundException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of DB Instances.',
                    'class' => 'InstanceQuotaExceededException',
                ),
                array(
                    'reason' => 'Specified DB Instance class is not available in the specified Availability Zone.',
                    'class' => 'InsufficientDBInstanceCapacityException',
                ),
                array(
                    'reason' => 'The specified DB Instance is not in the available state.',
                    'class' => 'InvalidDBInstanceStateException',
                ),
                array(
                    'reason' => 'SourceDBInstanceIdentifier refers to a DB Instance with BackupRetentionPeriod equal to 0.',
                    'class' => 'PointInTimeRestoreNotEnabledException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed amount of storage available across all DB Instances.',
                    'class' => 'StorageQuotaExceededException',
                ),
                array(
                    'reason' => 'DB Subnet Group does not cover all availability zones after it is created because users\' change.',
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'reason' => 'Cannot restore from vpc backup to non-vpc DB instance.',
                    'class' => 'InvalidRestoreException',
                ),
                array(
                    'reason' => 'DBSubnetGroupName does not refer to an existing DB Subnet Group.',
                    'class' => 'DBSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'Subnets in the DB subnet group should cover at least 2 availability zones unless there\'s\'only 1 available zone.',
                    'class' => 'DBSubnetGroupDoesNotCoverEnoughAZsException',
                ),
                array(
                    'reason' => 'Request subnet is valid, or all subnets are not in common Vpc.',
                    'class' => 'InvalidSubnetException',
                ),
                array(
                    'reason' => 'Provisioned IOPS not available in the specified Availability Zone.',
                    'class' => 'ProvisionedIopsNotAvailableInAZException',
                ),
                array(
                    'reason' => 'The specified option group could not be found.',
                    'class' => 'OptionGroupNotFoundException',
                ),
            ),
        ),
        'RevokeDBSecurityGroupIngress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DBSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RevokeDBSecurityGroupIngress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-05-15',
                ),
                'DBSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CIDRIP' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupOwnerId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'DBSecurityGroupName does not refer to an existing DB Security Group.',
                    'class' => 'DBSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'Specified CIDRIP or EC2 security group is not authorized for the specified DB Security Group.',
                    'class' => 'AuthorizationNotFoundException',
                ),
                array(
                    'reason' => 'The state of the DB Security Group does not allow deletion.',
                    'class' => 'InvalidDBSecurityGroupStateException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EventSubscriptionWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EventSubscription' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'CustomerAwsId' => array(
                            'type' => 'string',
                        ),
                        'CustSubscriptionId' => array(
                            'type' => 'string',
                        ),
                        'SnsTopicArn' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubscriptionCreationTime' => array(
                            'type' => 'string',
                        ),
                        'SourceType' => array(
                            'type' => 'string',
                        ),
                        'SourceIdsList' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'SourceId',
                                'type' => 'string',
                                'sentAs' => 'SourceId',
                            ),
                        ),
                        'EventCategoriesList' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'EventCategory',
                                'type' => 'string',
                                'sentAs' => 'EventCategory',
                            ),
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DBSecurityGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DBSecurityGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'OwnerId' => array(
                            'type' => 'string',
                        ),
                        'DBSecurityGroupName' => array(
                            'type' => 'string',
                        ),
                        'DBSecurityGroupDescription' => array(
                            'type' => 'string',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                        ),
                        'EC2SecurityGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'EC2SecurityGroup',
                                'type' => 'object',
                                'sentAs' => 'EC2SecurityGroup',
                                'properties' => array(
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'EC2SecurityGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'EC2SecurityGroupId' => array(
                                        'type' => 'string',
                                    ),
                                    'EC2SecurityGroupOwnerId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'IPRanges' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'IPRange',
                                'type' => 'object',
                                'sentAs' => 'IPRange',
                                'properties' => array(
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'CIDRIP' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DBSnapshotWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DBSnapshot' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'DBSnapshotIdentifier' => array(
                            'type' => 'string',
                        ),
                        'DBInstanceIdentifier' => array(
                            'type' => 'string',
                        ),
                        'SnapshotCreateTime' => array(
                            'type' => 'string',
                        ),
                        'Engine' => array(
                            'type' => 'string',
                        ),
                        'AllocatedStorage' => array(
                            'type' => 'numeric',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'Port' => array(
                            'type' => 'numeric',
                        ),
                        'AvailabilityZone' => array(
                            'type' => 'string',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                        ),
                        'InstanceCreateTime' => array(
                            'type' => 'string',
                        ),
                        'MasterUsername' => array(
                            'type' => 'string',
                        ),
                        'EngineVersion' => array(
                            'type' => 'string',
                        ),
                        'LicenseModel' => array(
                            'type' => 'string',
                        ),
                        'SnapshotType' => array(
                            'type' => 'string',
                        ),
                        'Iops' => array(
                            'type' => 'numeric',
                        ),
                        'OptionGroupName' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DBInstanceWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DBInstance' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'DBInstanceIdentifier' => array(
                            'type' => 'string',
                        ),
                        'DBInstanceClass' => array(
                            'type' => 'string',
                        ),
                        'Engine' => array(
                            'type' => 'string',
                        ),
                        'DBInstanceStatus' => array(
                            'type' => 'string',
                        ),
                        'MasterUsername' => array(
                            'type' => 'string',
                        ),
                        'DBName' => array(
                            'type' => 'string',
                        ),
                        'Endpoint' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Address' => array(
                                    'type' => 'string',
                                ),
                                'Port' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'AllocatedStorage' => array(
                            'type' => 'numeric',
                        ),
                        'InstanceCreateTime' => array(
                            'type' => 'string',
                        ),
                        'PreferredBackupWindow' => array(
                            'type' => 'string',
                        ),
                        'BackupRetentionPeriod' => array(
                            'type' => 'numeric',
                        ),
                        'DBSecurityGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'DBSecurityGroup',
                                'type' => 'object',
                                'sentAs' => 'DBSecurityGroup',
                                'properties' => array(
                                    'DBSecurityGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'VpcSecurityGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'VpcSecurityGroupMembership',
                                'type' => 'object',
                                'sentAs' => 'VpcSecurityGroupMembership',
                                'properties' => array(
                                    'VpcSecurityGroupId' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'DBParameterGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'DBParameterGroup',
                                'type' => 'object',
                                'sentAs' => 'DBParameterGroup',
                                'properties' => array(
                                    'DBParameterGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'ParameterApplyStatus' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'AvailabilityZone' => array(
                            'type' => 'string',
                        ),
                        'DBSubnetGroup' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DBSubnetGroupName' => array(
                                    'type' => 'string',
                                ),
                                'DBSubnetGroupDescription' => array(
                                    'type' => 'string',
                                ),
                                'VpcId' => array(
                                    'type' => 'string',
                                ),
                                'SubnetGroupStatus' => array(
                                    'type' => 'string',
                                ),
                                'Subnets' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Subnet',
                                        'type' => 'object',
                                        'sentAs' => 'Subnet',
                                        'properties' => array(
                                            'SubnetIdentifier' => array(
                                                'type' => 'string',
                                            ),
                                            'SubnetAvailabilityZone' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Name' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'ProvisionedIopsCapable' => array(
                                                        'type' => 'boolean',
                                                    ),
                                                ),
                                            ),
                                            'SubnetStatus' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'PreferredMaintenanceWindow' => array(
                            'type' => 'string',
                        ),
                        'PendingModifiedValues' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DBInstanceClass' => array(
                                    'type' => 'string',
                                ),
                                'AllocatedStorage' => array(
                                    'type' => 'numeric',
                                ),
                                'MasterUserPassword' => array(
                                    'type' => 'string',
                                ),
                                'Port' => array(
                                    'type' => 'numeric',
                                ),
                                'BackupRetentionPeriod' => array(
                                    'type' => 'numeric',
                                ),
                                'MultiAZ' => array(
                                    'type' => 'boolean',
                                ),
                                'EngineVersion' => array(
                                    'type' => 'string',
                                ),
                                'Iops' => array(
                                    'type' => 'numeric',
                                ),
                                'DBInstanceIdentifier' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'LatestRestorableTime' => array(
                            'type' => 'string',
                        ),
                        'MultiAZ' => array(
                            'type' => 'boolean',
                        ),
                        'EngineVersion' => array(
                            'type' => 'string',
                        ),
                        'AutoMinorVersionUpgrade' => array(
                            'type' => 'boolean',
                        ),
                        'ReadReplicaSourceDBInstanceIdentifier' => array(
                            'type' => 'string',
                        ),
                        'ReadReplicaDBInstanceIdentifiers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ReadReplicaDBInstanceIdentifier',
                                'type' => 'string',
                                'sentAs' => 'ReadReplicaDBInstanceIdentifier',
                            ),
                        ),
                        'LicenseModel' => array(
                            'type' => 'string',
                        ),
                        'Iops' => array(
                            'type' => 'numeric',
                        ),
                        'OptionGroupMemberships' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'OptionGroupMembership',
                                'type' => 'object',
                                'sentAs' => 'OptionGroupMembership',
                                'properties' => array(
                                    'OptionGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'CharacterSetName' => array(
                            'type' => 'string',
                        ),
                        'SecondaryAvailabilityZone' => array(
                            'type' => 'string',
                        ),
                        'PubliclyAccessible' => array(
                            'type' => 'boolean',
                        ),
                        'StatusInfos' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'DBInstanceStatusInfo',
                                'type' => 'object',
                                'sentAs' => 'DBInstanceStatusInfo',
                                'properties' => array(
                                    'StatusType' => array(
                                        'type' => 'string',
                                    ),
                                    'Normal' => array(
                                        'type' => 'boolean',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DBParameterGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DBParameterGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'DBParameterGroupName' => array(
                            'type' => 'string',
                        ),
                        'DBParameterGroupFamily' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DBSubnetGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DBSubnetGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'DBSubnetGroupName' => array(
                            'type' => 'string',
                        ),
                        'DBSubnetGroupDescription' => array(
                            'type' => 'string',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                        ),
                        'SubnetGroupStatus' => array(
                            'type' => 'string',
                        ),
                        'Subnets' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Subnet',
                                'type' => 'object',
                                'sentAs' => 'Subnet',
                                'properties' => array(
                                    'SubnetIdentifier' => array(
                                        'type' => 'string',
                                    ),
                                    'SubnetAvailabilityZone' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Name' => array(
                                                'type' => 'string',
                                            ),
                                            'ProvisionedIopsCapable' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                    'SubnetStatus' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'OptionGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OptionGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'OptionGroupName' => array(
                            'type' => 'string',
                        ),
                        'OptionGroupDescription' => array(
                            'type' => 'string',
                        ),
                        'EngineName' => array(
                            'type' => 'string',
                        ),
                        'MajorEngineVersion' => array(
                            'type' => 'string',
                        ),
                        'Options' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Option',
                                'type' => 'object',
                                'sentAs' => 'Option',
                                'properties' => array(
                                    'OptionName' => array(
                                        'type' => 'string',
                                    ),
                                    'OptionDescription' => array(
                                        'type' => 'string',
                                    ),
                                    'Persistent' => array(
                                        'type' => 'boolean',
                                    ),
                                    'Permanent' => array(
                                        'type' => 'boolean',
                                    ),
                                    'Port' => array(
                                        'type' => 'numeric',
                                    ),
                                    'OptionSettings' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'OptionSetting',
                                            'type' => 'object',
                                            'sentAs' => 'OptionSetting',
                                            'properties' => array(
                                                'Name' => array(
                                                    'type' => 'string',
                                                ),
                                                'Value' => array(
                                                    'type' => 'string',
                                                ),
                                                'DefaultValue' => array(
                                                    'type' => 'string',
                                                ),
                                                'Description' => array(
                                                    'type' => 'string',
                                                ),
                                                'ApplyType' => array(
                                                    'type' => 'string',
                                                ),
                                                'DataType' => array(
                                                    'type' => 'string',
                                                ),
                                                'AllowedValues' => array(
                                                    'type' => 'string',
                                                ),
                                                'IsModifiable' => array(
                                                    'type' => 'boolean',
                                                ),
                                                'IsCollection' => array(
                                                    'type' => 'boolean',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'DBSecurityGroupMemberships' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'DBSecurityGroup',
                                            'type' => 'object',
                                            'sentAs' => 'DBSecurityGroup',
                                            'properties' => array(
                                                'DBSecurityGroupName' => array(
                                                    'type' => 'string',
                                                ),
                                                'Status' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'VpcSecurityGroupMemberships' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'VpcSecurityGroupMembership',
                                            'type' => 'object',
                                            'sentAs' => 'VpcSecurityGroupMembership',
                                            'properties' => array(
                                                'VpcSecurityGroupId' => array(
                                                    'type' => 'string',
                                                ),
                                                'Status' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'AllowsVpcAndNonVpcInstanceMemberships' => array(
                            'type' => 'boolean',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DBEngineVersionMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DBEngineVersions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DBEngineVersion',
                        'type' => 'object',
                        'sentAs' => 'DBEngineVersion',
                        'properties' => array(
                            'Engine' => array(
                                'type' => 'string',
                            ),
                            'EngineVersion' => array(
                                'type' => 'string',
                            ),
                            'DBParameterGroupFamily' => array(
                                'type' => 'string',
                            ),
                            'DBEngineDescription' => array(
                                'type' => 'string',
                            ),
                            'DBEngineVersionDescription' => array(
                                'type' => 'string',
                            ),
                            'DefaultCharacterSet' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CharacterSetName' => array(
                                        'type' => 'string',
                                    ),
                                    'CharacterSetDescription' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'SupportedCharacterSets' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'CharacterSet',
                                    'type' => 'object',
                                    'sentAs' => 'CharacterSet',
                                    'properties' => array(
                                        'CharacterSetName' => array(
                                            'type' => 'string',
                                        ),
                                        'CharacterSetDescription' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DBInstanceMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DBInstances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DBInstance',
                        'type' => 'object',
                        'sentAs' => 'DBInstance',
                        'properties' => array(
                            'DBInstanceIdentifier' => array(
                                'type' => 'string',
                            ),
                            'DBInstanceClass' => array(
                                'type' => 'string',
                            ),
                            'Engine' => array(
                                'type' => 'string',
                            ),
                            'DBInstanceStatus' => array(
                                'type' => 'string',
                            ),
                            'MasterUsername' => array(
                                'type' => 'string',
                            ),
                            'DBName' => array(
                                'type' => 'string',
                            ),
                            'Endpoint' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Address' => array(
                                        'type' => 'string',
                                    ),
                                    'Port' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'AllocatedStorage' => array(
                                'type' => 'numeric',
                            ),
                            'InstanceCreateTime' => array(
                                'type' => 'string',
                            ),
                            'PreferredBackupWindow' => array(
                                'type' => 'string',
                            ),
                            'BackupRetentionPeriod' => array(
                                'type' => 'numeric',
                            ),
                            'DBSecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'DBSecurityGroup',
                                    'type' => 'object',
                                    'sentAs' => 'DBSecurityGroup',
                                    'properties' => array(
                                        'DBSecurityGroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'VpcSecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'VpcSecurityGroupMembership',
                                    'type' => 'object',
                                    'sentAs' => 'VpcSecurityGroupMembership',
                                    'properties' => array(
                                        'VpcSecurityGroupId' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'DBParameterGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'DBParameterGroup',
                                    'type' => 'object',
                                    'sentAs' => 'DBParameterGroup',
                                    'properties' => array(
                                        'DBParameterGroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'ParameterApplyStatus' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'DBSubnetGroup' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'DBSubnetGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'DBSubnetGroupDescription' => array(
                                        'type' => 'string',
                                    ),
                                    'VpcId' => array(
                                        'type' => 'string',
                                    ),
                                    'SubnetGroupStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'Subnets' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Subnet',
                                            'type' => 'object',
                                            'sentAs' => 'Subnet',
                                            'properties' => array(
                                                'SubnetIdentifier' => array(
                                                    'type' => 'string',
                                                ),
                                                'SubnetAvailabilityZone' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Name' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'ProvisionedIopsCapable' => array(
                                                            'type' => 'boolean',
                                                        ),
                                                    ),
                                                ),
                                                'SubnetStatus' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'PreferredMaintenanceWindow' => array(
                                'type' => 'string',
                            ),
                            'PendingModifiedValues' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'DBInstanceClass' => array(
                                        'type' => 'string',
                                    ),
                                    'AllocatedStorage' => array(
                                        'type' => 'numeric',
                                    ),
                                    'MasterUserPassword' => array(
                                        'type' => 'string',
                                    ),
                                    'Port' => array(
                                        'type' => 'numeric',
                                    ),
                                    'BackupRetentionPeriod' => array(
                                        'type' => 'numeric',
                                    ),
                                    'MultiAZ' => array(
                                        'type' => 'boolean',
                                    ),
                                    'EngineVersion' => array(
                                        'type' => 'string',
                                    ),
                                    'Iops' => array(
                                        'type' => 'numeric',
                                    ),
                                    'DBInstanceIdentifier' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'LatestRestorableTime' => array(
                                'type' => 'string',
                            ),
                            'MultiAZ' => array(
                                'type' => 'boolean',
                            ),
                            'EngineVersion' => array(
                                'type' => 'string',
                            ),
                            'AutoMinorVersionUpgrade' => array(
                                'type' => 'boolean',
                            ),
                            'ReadReplicaSourceDBInstanceIdentifier' => array(
                                'type' => 'string',
                            ),
                            'ReadReplicaDBInstanceIdentifiers' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ReadReplicaDBInstanceIdentifier',
                                    'type' => 'string',
                                    'sentAs' => 'ReadReplicaDBInstanceIdentifier',
                                ),
                            ),
                            'LicenseModel' => array(
                                'type' => 'string',
                            ),
                            'Iops' => array(
                                'type' => 'numeric',
                            ),
                            'OptionGroupMemberships' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'OptionGroupMembership',
                                    'type' => 'object',
                                    'sentAs' => 'OptionGroupMembership',
                                    'properties' => array(
                                        'OptionGroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'CharacterSetName' => array(
                                'type' => 'string',
                            ),
                            'SecondaryAvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'PubliclyAccessible' => array(
                                'type' => 'boolean',
                            ),
                            'StatusInfos' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'DBInstanceStatusInfo',
                                    'type' => 'object',
                                    'sentAs' => 'DBInstanceStatusInfo',
                                    'properties' => array(
                                        'StatusType' => array(
                                            'type' => 'string',
                                        ),
                                        'Normal' => array(
                                            'type' => 'boolean',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'Message' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDBLogFilesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DescribeDBLogFiles' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DescribeDBLogFilesDetails',
                        'type' => 'object',
                        'sentAs' => 'DescribeDBLogFilesDetails',
                        'properties' => array(
                            'LogFileName' => array(
                                'type' => 'string',
                            ),
                            'LastWritten' => array(
                                'type' => 'numeric',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'DBParameterGroupsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DBParameterGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DBParameterGroup',
                        'type' => 'object',
                        'sentAs' => 'DBParameterGroup',
                        'properties' => array(
                            'DBParameterGroupName' => array(
                                'type' => 'string',
                            ),
                            'DBParameterGroupFamily' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DBParameterGroupDetails' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Parameters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Parameter',
                        'type' => 'object',
                        'sentAs' => 'Parameter',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Source' => array(
                                'type' => 'string',
                            ),
                            'ApplyType' => array(
                                'type' => 'string',
                            ),
                            'DataType' => array(
                                'type' => 'string',
                            ),
                            'AllowedValues' => array(
                                'type' => 'string',
                            ),
                            'IsModifiable' => array(
                                'type' => 'boolean',
                            ),
                            'MinimumEngineVersion' => array(
                                'type' => 'string',
                            ),
                            'ApplyMethod' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'DBSecurityGroupMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DBSecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DBSecurityGroup',
                        'type' => 'object',
                        'sentAs' => 'DBSecurityGroup',
                        'properties' => array(
                            'OwnerId' => array(
                                'type' => 'string',
                            ),
                            'DBSecurityGroupName' => array(
                                'type' => 'string',
                            ),
                            'DBSecurityGroupDescription' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                            ),
                            'EC2SecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'EC2SecurityGroup',
                                    'type' => 'object',
                                    'sentAs' => 'EC2SecurityGroup',
                                    'properties' => array(
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'EC2SecurityGroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'EC2SecurityGroupId' => array(
                                            'type' => 'string',
                                        ),
                                        'EC2SecurityGroupOwnerId' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'IPRanges' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IPRange',
                                    'type' => 'object',
                                    'sentAs' => 'IPRange',
                                    'properties' => array(
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'CIDRIP' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DBSnapshotMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DBSnapshots' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DBSnapshot',
                        'type' => 'object',
                        'sentAs' => 'DBSnapshot',
                        'properties' => array(
                            'DBSnapshotIdentifier' => array(
                                'type' => 'string',
                            ),
                            'DBInstanceIdentifier' => array(
                                'type' => 'string',
                            ),
                            'SnapshotCreateTime' => array(
                                'type' => 'string',
                            ),
                            'Engine' => array(
                                'type' => 'string',
                            ),
                            'AllocatedStorage' => array(
                                'type' => 'numeric',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Port' => array(
                                'type' => 'numeric',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                            ),
                            'InstanceCreateTime' => array(
                                'type' => 'string',
                            ),
                            'MasterUsername' => array(
                                'type' => 'string',
                            ),
                            'EngineVersion' => array(
                                'type' => 'string',
                            ),
                            'LicenseModel' => array(
                                'type' => 'string',
                            ),
                            'SnapshotType' => array(
                                'type' => 'string',
                            ),
                            'Iops' => array(
                                'type' => 'numeric',
                            ),
                            'OptionGroupName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DBSubnetGroupMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DBSubnetGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DBSubnetGroup',
                        'type' => 'object',
                        'sentAs' => 'DBSubnetGroup',
                        'properties' => array(
                            'DBSubnetGroupName' => array(
                                'type' => 'string',
                            ),
                            'DBSubnetGroupDescription' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                            ),
                            'SubnetGroupStatus' => array(
                                'type' => 'string',
                            ),
                            'Subnets' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Subnet',
                                    'type' => 'object',
                                    'sentAs' => 'Subnet',
                                    'properties' => array(
                                        'SubnetIdentifier' => array(
                                            'type' => 'string',
                                        ),
                                        'SubnetAvailabilityZone' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Name' => array(
                                                    'type' => 'string',
                                                ),
                                                'ProvisionedIopsCapable' => array(
                                                    'type' => 'boolean',
                                                ),
                                            ),
                                        ),
                                        'SubnetStatus' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EngineDefaultsWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EngineDefaults' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'DBParameterGroupFamily' => array(
                            'type' => 'string',
                        ),
                        'Marker' => array(
                            'type' => 'string',
                        ),
                        'Parameters' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Parameter',
                                'type' => 'object',
                                'sentAs' => 'Parameter',
                                'properties' => array(
                                    'ParameterName' => array(
                                        'type' => 'string',
                                    ),
                                    'ParameterValue' => array(
                                        'type' => 'string',
                                    ),
                                    'Description' => array(
                                        'type' => 'string',
                                    ),
                                    'Source' => array(
                                        'type' => 'string',
                                    ),
                                    'ApplyType' => array(
                                        'type' => 'string',
                                    ),
                                    'DataType' => array(
                                        'type' => 'string',
                                    ),
                                    'AllowedValues' => array(
                                        'type' => 'string',
                                    ),
                                    'IsModifiable' => array(
                                        'type' => 'boolean',
                                    ),
                                    'MinimumEngineVersion' => array(
                                        'type' => 'string',
                                    ),
                                    'ApplyMethod' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EventCategoriesMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EventCategoriesMapList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'EventCategoriesMap',
                        'type' => 'object',
                        'sentAs' => 'EventCategoriesMap',
                        'properties' => array(
                            'SourceType' => array(
                                'type' => 'string',
                            ),
                            'EventCategories' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'EventCategory',
                                    'type' => 'string',
                                    'sentAs' => 'EventCategory',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EventSubscriptionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'EventSubscriptionsList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'EventSubscription',
                        'type' => 'object',
                        'sentAs' => 'EventSubscription',
                        'properties' => array(
                            'CustomerAwsId' => array(
                                'type' => 'string',
                            ),
                            'CustSubscriptionId' => array(
                                'type' => 'string',
                            ),
                            'SnsTopicArn' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'SubscriptionCreationTime' => array(
                                'type' => 'string',
                            ),
                            'SourceType' => array(
                                'type' => 'string',
                            ),
                            'SourceIdsList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'SourceId',
                                    'type' => 'string',
                                    'sentAs' => 'SourceId',
                                ),
                            ),
                            'EventCategoriesList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'EventCategory',
                                    'type' => 'string',
                                    'sentAs' => 'EventCategory',
                                ),
                            ),
                            'Enabled' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EventsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Events' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Event',
                        'type' => 'object',
                        'sentAs' => 'Event',
                        'properties' => array(
                            'SourceIdentifier' => array(
                                'type' => 'string',
                            ),
                            'SourceType' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                            'EventCategories' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'EventCategory',
                                    'type' => 'string',
                                    'sentAs' => 'EventCategory',
                                ),
                            ),
                            'Date' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'OptionGroupOptionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OptionGroupOptions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'OptionGroupOption',
                        'type' => 'object',
                        'sentAs' => 'OptionGroupOption',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'EngineName' => array(
                                'type' => 'string',
                            ),
                            'MajorEngineVersion' => array(
                                'type' => 'string',
                            ),
                            'MinimumRequiredMinorEngineVersion' => array(
                                'type' => 'string',
                            ),
                            'PortRequired' => array(
                                'type' => 'boolean',
                            ),
                            'DefaultPort' => array(
                                'type' => 'numeric',
                            ),
                            'OptionsDependedOn' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'OptionName',
                                    'type' => 'string',
                                    'sentAs' => 'OptionName',
                                ),
                            ),
                            'Persistent' => array(
                                'type' => 'boolean',
                            ),
                            'Permanent' => array(
                                'type' => 'boolean',
                            ),
                            'OptionGroupOptionSettings' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'OptionGroupOptionSetting',
                                    'type' => 'object',
                                    'sentAs' => 'OptionGroupOptionSetting',
                                    'properties' => array(
                                        'SettingName' => array(
                                            'type' => 'string',
                                        ),
                                        'SettingDescription' => array(
                                            'type' => 'string',
                                        ),
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'ApplyType' => array(
                                            'type' => 'string',
                                        ),
                                        'AllowedValues' => array(
                                            'type' => 'string',
                                        ),
                                        'IsModifiable' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'OptionGroups' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OptionGroupsList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'OptionGroup',
                        'type' => 'object',
                        'sentAs' => 'OptionGroup',
                        'properties' => array(
                            'OptionGroupName' => array(
                                'type' => 'string',
                            ),
                            'OptionGroupDescription' => array(
                                'type' => 'string',
                            ),
                            'EngineName' => array(
                                'type' => 'string',
                            ),
                            'MajorEngineVersion' => array(
                                'type' => 'string',
                            ),
                            'Options' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Option',
                                    'type' => 'object',
                                    'sentAs' => 'Option',
                                    'properties' => array(
                                        'OptionName' => array(
                                            'type' => 'string',
                                        ),
                                        'OptionDescription' => array(
                                            'type' => 'string',
                                        ),
                                        'Persistent' => array(
                                            'type' => 'boolean',
                                        ),
                                        'Permanent' => array(
                                            'type' => 'boolean',
                                        ),
                                        'Port' => array(
                                            'type' => 'numeric',
                                        ),
                                        'OptionSettings' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'OptionSetting',
                                                'type' => 'object',
                                                'sentAs' => 'OptionSetting',
                                                'properties' => array(
                                                    'Name' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Value' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'DefaultValue' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Description' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'ApplyType' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'DataType' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'AllowedValues' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'IsModifiable' => array(
                                                        'type' => 'boolean',
                                                    ),
                                                    'IsCollection' => array(
                                                        'type' => 'boolean',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'DBSecurityGroupMemberships' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'DBSecurityGroup',
                                                'type' => 'object',
                                                'sentAs' => 'DBSecurityGroup',
                                                'properties' => array(
                                                    'DBSecurityGroupName' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Status' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'VpcSecurityGroupMemberships' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'VpcSecurityGroupMembership',
                                                'type' => 'object',
                                                'sentAs' => 'VpcSecurityGroupMembership',
                                                'properties' => array(
                                                    'VpcSecurityGroupId' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Status' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'AllowsVpcAndNonVpcInstanceMemberships' => array(
                                'type' => 'boolean',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'OrderableDBInstanceOptionsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OrderableDBInstanceOptions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'OrderableDBInstanceOption',
                        'type' => 'object',
                        'sentAs' => 'OrderableDBInstanceOption',
                        'properties' => array(
                            'Engine' => array(
                                'type' => 'string',
                            ),
                            'EngineVersion' => array(
                                'type' => 'string',
                            ),
                            'DBInstanceClass' => array(
                                'type' => 'string',
                            ),
                            'LicenseModel' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZones' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'AvailabilityZone',
                                    'type' => 'object',
                                    'sentAs' => 'AvailabilityZone',
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'ProvisionedIopsCapable' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                            ),
                            'MultiAZCapable' => array(
                                'type' => 'boolean',
                            ),
                            'ReadReplicaCapable' => array(
                                'type' => 'boolean',
                            ),
                            'Vpc' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ReservedDBInstanceMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ReservedDBInstances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReservedDBInstance',
                        'type' => 'object',
                        'sentAs' => 'ReservedDBInstance',
                        'properties' => array(
                            'ReservedDBInstanceId' => array(
                                'type' => 'string',
                            ),
                            'ReservedDBInstancesOfferingId' => array(
                                'type' => 'string',
                            ),
                            'DBInstanceClass' => array(
                                'type' => 'string',
                            ),
                            'StartTime' => array(
                                'type' => 'string',
                            ),
                            'Duration' => array(
                                'type' => 'numeric',
                            ),
                            'FixedPrice' => array(
                                'type' => 'numeric',
                            ),
                            'UsagePrice' => array(
                                'type' => 'numeric',
                            ),
                            'CurrencyCode' => array(
                                'type' => 'string',
                            ),
                            'DBInstanceCount' => array(
                                'type' => 'numeric',
                            ),
                            'ProductDescription' => array(
                                'type' => 'string',
                            ),
                            'OfferingType' => array(
                                'type' => 'string',
                            ),
                            'MultiAZ' => array(
                                'type' => 'boolean',
                            ),
                            'State' => array(
                                'type' => 'string',
                            ),
                            'RecurringCharges' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'RecurringCharge',
                                    'type' => 'object',
                                    'sentAs' => 'RecurringCharge',
                                    'properties' => array(
                                        'RecurringChargeAmount' => array(
                                            'type' => 'numeric',
                                        ),
                                        'RecurringChargeFrequency' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ReservedDBInstancesOfferingMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ReservedDBInstancesOfferings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReservedDBInstancesOffering',
                        'type' => 'object',
                        'sentAs' => 'ReservedDBInstancesOffering',
                        'properties' => array(
                            'ReservedDBInstancesOfferingId' => array(
                                'type' => 'string',
                            ),
                            'DBInstanceClass' => array(
                                'type' => 'string',
                            ),
                            'Duration' => array(
                                'type' => 'numeric',
                            ),
                            'FixedPrice' => array(
                                'type' => 'numeric',
                            ),
                            'UsagePrice' => array(
                                'type' => 'numeric',
                            ),
                            'CurrencyCode' => array(
                                'type' => 'string',
                            ),
                            'ProductDescription' => array(
                                'type' => 'string',
                            ),
                            'OfferingType' => array(
                                'type' => 'string',
                            ),
                            'MultiAZ' => array(
                                'type' => 'boolean',
                            ),
                            'RecurringCharges' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'RecurringCharge',
                                    'type' => 'object',
                                    'sentAs' => 'RecurringCharge',
                                    'properties' => array(
                                        'RecurringChargeAmount' => array(
                                            'type' => 'numeric',
                                        ),
                                        'RecurringChargeFrequency' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DownloadDBLogFilePortionDetails' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LogFileData' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'AdditionalDataPending' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
            ),
        ),
        'TagListMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TagList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'sentAs' => 'Tag',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DBParameterGroupNameMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DBParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ReservedDBInstanceWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedDBInstance' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'ReservedDBInstanceId' => array(
                            'type' => 'string',
                        ),
                        'ReservedDBInstancesOfferingId' => array(
                            'type' => 'string',
                        ),
                        'DBInstanceClass' => array(
                            'type' => 'string',
                        ),
                        'StartTime' => array(
                            'type' => 'string',
                        ),
                        'Duration' => array(
                            'type' => 'numeric',
                        ),
                        'FixedPrice' => array(
                            'type' => 'numeric',
                        ),
                        'UsagePrice' => array(
                            'type' => 'numeric',
                        ),
                        'CurrencyCode' => array(
                            'type' => 'string',
                        ),
                        'DBInstanceCount' => array(
                            'type' => 'numeric',
                        ),
                        'ProductDescription' => array(
                            'type' => 'string',
                        ),
                        'OfferingType' => array(
                            'type' => 'string',
                        ),
                        'MultiAZ' => array(
                            'type' => 'boolean',
                        ),
                        'State' => array(
                            'type' => 'string',
                        ),
                        'RecurringCharges' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'RecurringCharge',
                                'type' => 'object',
                                'sentAs' => 'RecurringCharge',
                                'properties' => array(
                                    'RecurringChargeAmount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'RecurringChargeFrequency' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'operations' => array(
            'DescribeDBEngineVersions' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'DBEngineVersions',
            ),
            'DescribeDBInstances' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'DBInstances',
            ),
            'DescribeDBLogFiles' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'DescribeDBLogFiles',
            ),
            'DescribeDBParameterGroups' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'DBParameterGroups',
            ),
            'DescribeDBParameters' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'Parameters',
            ),
            'DescribeDBSecurityGroups' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'DBSecurityGroups',
            ),
            'DescribeDBSnapshots' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'DBSnapshots',
            ),
            'DescribeDBSubnetGroups' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'DBSubnetGroups',
            ),
            'DescribeEngineDefaultParameters' => array(
                'token_param' => 'Marker',
                'limit_key' => 'MaxRecords',
            ),
            'DescribeEventSubscriptions' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'EventSubscriptionsList',
            ),
            'DescribeEvents' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'Events',
            ),
            'DescribeOptionGroupOptions' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'OptionGroupOptions',
            ),
            'DescribeOptionGroups' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'OptionGroupsList',
            ),
            'DescribeOrderableDBInstanceOptions' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'OrderableDBInstanceOptions',
            ),
            'DescribeReservedDBInstances' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'ReservedDBInstances',
            ),
            'DescribeReservedDBInstancesOfferings' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'ReservedDBInstancesOfferings',
            ),
            'DownloadDBLogFilePortion' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
            ),
            'ListTagsForResource' => array(
                'result_key' => 'TagList',
            ),
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'interval' => 30,
            'max_attempts' => 60,
        ),
        '__DBInstanceState' => array(
            'operation' => 'DescribeDBInstances',
            'acceptor.path' => 'DBInstances/*/DBInstanceStatus',
            'acceptor.type' => 'output',
        ),
        'DBInstanceAvailable' => array(
            'extends' => '__DBInstanceState',
            'success.value' => 'available',
            'failure.value' => array(
                'deleted',
                'deleting',
                'failed',
                'incompatible-restore',
                'incompatible-parameters',
                'incompatible-parameters',
                'incompatible-restore',
            ),
        ),
        'DBInstanceDeleted' => array(
            'extends' => '__DBInstanceState',
            'success.value' => 'deleted',
            'failure.value' => array(
                'creating',
                'modifying',
                'rebooting',
                'resetting-master-credentials',
            ),
        ),
    ),
);
