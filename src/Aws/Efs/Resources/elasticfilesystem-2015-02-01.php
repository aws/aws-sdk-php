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
    'apiVersion' => '2015-02-01',
    'endpointPrefix' => 'elasticfilesystem',
    'serviceFullName' => 'Amazon Elastic File System',
    'serviceAbbreviation' => 'efs',
    'serviceType' => 'rest-json',
    'signatureVersion' => 'v4',
    'namespace' => 'ElasticFileSystem',
    'operations' => array(
        'CreateFileSystem' => array(
            'httpMethod' => 'POST',
            'uri' => '/2015-02-01/file-systems',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'FileSystemDescription',
            'responseType' => 'model',
            'parameters' => array(
                'CreationToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned if the file system you are trying to create already exists, with the creation token you provided.',
                    'class' => 'FileSystemAlreadyExistsException',
                ),
                array(
                    'reason' => 'Returned if the AWS account has already created maximum number of file systems allowed per account.',
                    'class' => 'FileSystemLimitExceededException',
                ),
            ),
        ),
        'CreateMountTarget' => array(
            'httpMethod' => 'POST',
            'uri' => '/2015-02-01/mount-targets',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'MountTargetDescription',
            'responseType' => 'model',
            'parameters' => array(
                'FileSystemId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SubnetId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IpAddress' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 5,
                    'items' => array(
                        'name' => 'SecurityGroup',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned if the specified FileSystemId does not exist in the requester\'s AWS account.',
                    'class' => 'FileSystemNotFoundException',
                ),
                array(
                    'reason' => 'Returned if the file system\'s life cycle state is not "created".',
                    'class' => 'IncorrectFileSystemLifeCycleStateException',
                ),
                array(
                    'reason' => 'Returned if the mount target would violate one of the specified restrictions based on the file system\'s existing mount targets.',
                    'class' => 'MountTargetConflictException',
                ),
                array(
                    'reason' => 'Returned if there is no subnet with ID SubnetId provided in the request.',
                    'class' => 'SubnetNotFoundException',
                ),
                array(
                    'reason' => 'Returned if IpAddress was not specified in the request and there are no free IP addresses in the subnet.',
                    'class' => 'NoFreeAddressesInSubnetException',
                ),
                array(
                    'reason' => 'Returned if the request specified an IpAddress that is already in use in the subnet.',
                    'class' => 'IpAddressInUseException',
                ),
                array(
                    'reason' => 'The calling account has reached the ENI limit for the specific AWS region. Client should try to delete some ENIs or get its account limit raised. For more information, go to Amazon VPC Limits in the Amazon Virtual Private Cloud User Guide (see the Network interfaces per VPC entry in the table).',
                    'class' => 'NetworkInterfaceLimitExceededException',
                ),
                array(
                    'reason' => 'Returned if the size of SecurityGroups specified in the request is greater than five.',
                    'class' => 'SecurityGroupLimitExceededException',
                ),
                array(
                    'reason' => 'Returned if one of the specified security groups does not exist in the subnet\'s VPC.',
                    'class' => 'SecurityGroupNotFoundException',
                ),
                array(
                    'class' => 'UnsupportedAvailabilityZoneException',
                ),
            ),
        ),
        'CreateTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/2015-02-01/create-tags/{FileSystemId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'FileSystemId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Tags' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                            ),
                            'Value' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned if the specified FileSystemId does not exist in the requester\'s AWS account.',
                    'class' => 'FileSystemNotFoundException',
                ),
            ),
        ),
        'DeleteFileSystem' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2015-02-01/file-systems/{FileSystemId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'FileSystemId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned if the specified FileSystemId does not exist in the requester\'s AWS account.',
                    'class' => 'FileSystemNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a file system has mount targets.',
                    'class' => 'FileSystemInUseException',
                ),
            ),
        ),
        'DeleteMountTarget' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2015-02-01/mount-targets/{MountTargetId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'MountTargetId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The service timed out trying to fulfill the request, and the client should try the call again.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'Returned if there is no mount target with the specified ID is found in the caller\'s account.',
                    'class' => 'MountTargetNotFoundException',
                ),
            ),
        ),
        'DeleteTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/2015-02-01/delete-tags/{FileSystemId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'FileSystemId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'TagKeys' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'TagKey',
                        'type' => 'string',
                        'minLength' => 1,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned if the specified FileSystemId does not exist in the requester\'s AWS account.',
                    'class' => 'FileSystemNotFoundException',
                ),
            ),
        ),
        'DescribeFileSystems' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-02-01/file-systems',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DescribeFileSystemsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'CreationToken' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                ),
                'FileSystemId' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned if the specified FileSystemId does not exist in the requester\'s AWS account.',
                    'class' => 'FileSystemNotFoundException',
                ),
            ),
        ),
        'DescribeMountTargetSecurityGroups' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-02-01/mount-targets/{MountTargetId}/security-groups',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DescribeMountTargetSecurityGroupsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'MountTargetId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned if there is no mount target with the specified ID is found in the caller\'s account.',
                    'class' => 'MountTargetNotFoundException',
                ),
                array(
                    'reason' => 'Returned if the mount target is not in the correct state for the operation.',
                    'class' => 'IncorrectMountTargetStateException',
                ),
            ),
        ),
        'DescribeMountTargets' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-02-01/mount-targets',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DescribeMountTargetsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'FileSystemId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned if the specified FileSystemId does not exist in the requester\'s AWS account.',
                    'class' => 'FileSystemNotFoundException',
                ),
            ),
        ),
        'DescribeTags' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-02-01/tags/{FileSystemId}/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DescribeTagsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'FileSystemId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned if the specified FileSystemId does not exist in the requester\'s AWS account.',
                    'class' => 'FileSystemNotFoundException',
                ),
            ),
        ),
        'ModifyMountTargetSecurityGroups' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2015-02-01/mount-targets/{MountTargetId}/security-groups',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'MountTargetId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 5,
                    'items' => array(
                        'name' => 'SecurityGroup',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the request is malformed or contains an error such as an invalid parameter value or a missing required parameter.',
                    'class' => 'BadRequestException',
                ),
                array(
                    'reason' => 'Returned if an error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned if there is no mount target with the specified ID is found in the caller\'s account.',
                    'class' => 'MountTargetNotFoundException',
                ),
                array(
                    'reason' => 'Returned if the mount target is not in the correct state for the operation.',
                    'class' => 'IncorrectMountTargetStateException',
                ),
                array(
                    'reason' => 'Returned if the size of SecurityGroups specified in the request is greater than five.',
                    'class' => 'SecurityGroupLimitExceededException',
                ),
                array(
                    'reason' => 'Returned if one of the specified security groups does not exist in the subnet\'s VPC.',
                    'class' => 'SecurityGroupNotFoundException',
                ),
            ),
        ),
    ),
    'models' => array(
        'FileSystemDescription' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OwnerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreationToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FileSystemId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreationTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LifeCycleState' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'NumberOfMountTargets' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'SizeInBytes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'numeric',
                        ),
                        'Timestamp' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'MountTargetDescription' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OwnerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'MountTargetId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FileSystemId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SubnetId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LifeCycleState' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IpAddress' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'NetworkInterfaceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DescribeFileSystemsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FileSystems' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'FileSystemDescription',
                        'type' => 'object',
                        'properties' => array(
                            'OwnerId' => array(
                                'type' => 'string',
                            ),
                            'CreationToken' => array(
                                'type' => 'string',
                            ),
                            'FileSystemId' => array(
                                'type' => 'string',
                            ),
                            'CreationTime' => array(
                                'type' => 'string',
                            ),
                            'LifeCycleState' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'NumberOfMountTargets' => array(
                                'type' => 'numeric',
                            ),
                            'SizeInBytes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Value' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Timestamp' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeMountTargetSecurityGroupsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'SecurityGroup',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'DescribeMountTargetsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'MountTargets' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'MountTargetDescription',
                        'type' => 'object',
                        'properties' => array(
                            'OwnerId' => array(
                                'type' => 'string',
                            ),
                            'MountTargetId' => array(
                                'type' => 'string',
                            ),
                            'FileSystemId' => array(
                                'type' => 'string',
                            ),
                            'SubnetId' => array(
                                'type' => 'string',
                            ),
                            'LifeCycleState' => array(
                                'type' => 'string',
                            ),
                            'IpAddress' => array(
                                'type' => 'string',
                            ),
                            'NetworkInterfaceId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeTagsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Tags' => array(
                    'type' => 'array',
                    'location' => 'json',
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
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
);
