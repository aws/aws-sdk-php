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
    'apiVersion' => '2015-10-01',
    'endpointPrefix' => 'ec2',
    'serviceFullName' => 'Amazon Elastic Compute Cloud',
    'serviceAbbreviation' => 'Amazon EC2',
    'serviceType' => 'query',
    'signatureVersion' => 'v4',
    'namespace' => 'Ec2',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'ec2.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'ec2.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'ec2.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'ec2.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'ec2.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'ec2.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'ec2.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'ec2.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'ec2.cn-north-1.amazonaws.com.cn',
        ),
        'us-gov-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'ec2.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AllocateAddress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AllocateAddressResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AllocateAddress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Domain' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AssociateAddress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AssociateAddressResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AssociateAddress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PublicIp' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AllocationId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NetworkInterfaceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PrivateIpAddress' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AllowReassociation' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AssociateDhcpOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AssociateDhcpOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'DhcpOptionsId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AttachVolume' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'attachment',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AttachVolume',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Device' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AttachVpnGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AttachVpnGatewayResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AttachVpnGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpnGatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AuthorizeSecurityGroupIngress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AuthorizeSecurityGroupIngress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'GroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'GroupId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceSecurityGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceSecurityGroupOwnerId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'IpProtocol' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'FromPort' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'ToPort' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'CidrIp' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'IpPermissions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'IpPermission',
                        'type' => 'object',
                        'properties' => array(
                            'IpProtocol' => array(
                                'type' => 'string',
                            ),
                            'FromPort' => array(
                                'type' => 'numeric',
                            ),
                            'ToPort' => array(
                                'type' => 'numeric',
                            ),
                            'UserIdGroupPairs' => array(
                                'type' => 'array',
                                'sentAs' => 'Groups',
                                'items' => array(
                                    'name' => 'Groups',
                                    'type' => 'object',
                                    'properties' => array(
                                        'UserId' => array(
                                            'type' => 'string',
                                        ),
                                        'GroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'GroupId' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'IpRanges' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IpRange',
                                    'type' => 'object',
                                    'properties' => array(
                                        'CidrIp' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'PrefixListIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PrefixListId',
                                    'type' => 'object',
                                    'properties' => array(
                                        'PrefixListId' => array(
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
        'BundleInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'BundleInstanceResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'BundleInstance',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Storage' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'S3' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                                'AWSAccessKeyId' => array(
                                    'type' => 'string',
                                ),
                                'UploadPolicy' => array(
                                    'type' => 'string',
                                ),
                                'UploadPolicySignature' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CancelBundleTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CancelBundleTaskResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CancelBundleTask',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'BundleId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ConfirmProductInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ConfirmProductInstanceResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ConfirmProductInstance',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ProductCode' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CopySnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CopySnapshotResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CopySnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SourceRegion' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceSnapshotId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DestinationRegion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PresignedUrl' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Encrypted' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'KmsKeyId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CopyImage' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CopyImageResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CopyImage',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SourceRegion' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceImageId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Encrypted' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'KmsKeyId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateCustomerGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateCustomerGatewayResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateCustomerGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Type' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PublicIp' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'sentAs' => 'IpAddress',
                ),
                'BgpAsn' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateDhcpOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateDhcpOptionsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateDhcpOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'DhcpConfigurations' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'DhcpConfiguration',
                    'items' => array(
                        'name' => 'DhcpConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateKeyPair' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateKeyPairResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateKeyPair',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'KeyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateSecurityGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateSecurityGroupResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateSecurityGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'sentAs' => 'GroupDescription',
                ),
                'VpcId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'snapshot',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateSubnet' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateSubnetResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateSubnet',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CidrBlock' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateVolume' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'volume',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateVolume',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Size' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VolumeType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Iops' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Encrypted' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'KmsKeyId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateVpc' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateVpcResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateVpc',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'CidrBlock' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceTenancy' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateVpnConnection' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateVpnConnectionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateVpnConnection',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Type' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CustomerGatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VpnGatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Options' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'StaticRoutesOnly' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
        ),
        'CreateVpnGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateVpnGatewayResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateVpnGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Type' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteCustomerGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteCustomerGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'CustomerGatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteDhcpOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteDhcpOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'DhcpOptionsId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteKeyPair' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteKeyPair',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'KeyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteSecurityGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteSecurityGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'GroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'GroupId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SnapshotId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteSubnet' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteSubnet',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SubnetId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteVolume' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteVolume',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteVpc' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteVpc',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteVpnConnection' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteVpnConnection',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpnConnectionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteVpnGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteVpnGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpnGatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeregisterImage' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeregisterImage',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ImageId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeAccountAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAccountAttributesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAccountAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AttributeNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AttributeName',
                    'items' => array(
                        'name' => 'AttributeName',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'DescribeAddresses' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAddressesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAddresses',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PublicIps' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PublicIp',
                    'items' => array(
                        'name' => 'PublicIp',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'AllocationIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AllocationId',
                    'items' => array(
                        'name' => 'AllocationId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'DescribeAvailabilityZones' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAvailabilityZonesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAvailabilityZones',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ZoneNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ZoneName',
                    'items' => array(
                        'name' => 'ZoneName',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeBundleTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeBundleTasksResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeBundleTasks',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'BundleIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'BundleId',
                    'items' => array(
                        'name' => 'BundleId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeCustomerGateways' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeCustomerGatewaysResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCustomerGateways',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'CustomerGatewayIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CustomerGatewayId',
                    'items' => array(
                        'name' => 'CustomerGatewayId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDhcpOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeDhcpOptionsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDhcpOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'DhcpOptionsIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'DhcpOptionsId',
                    'items' => array(
                        'name' => 'DhcpOptionsId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeIdFormat' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeIdFormatResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeIdFormat',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'Resource' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeImageAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'imageAttribute',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeImageAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ImageId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeImages' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeImagesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeImages',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ImageIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ImageId',
                    'items' => array(
                        'name' => 'ImageId',
                        'type' => 'string',
                    ),
                ),
                'Owners' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Owner',
                    'items' => array(
                        'name' => 'Owner',
                        'type' => 'string',
                    ),
                ),
                'ExecutableUsers' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ExecutableBy',
                    'items' => array(
                        'name' => 'ExecutableBy',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceId',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeKeyPairs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeKeyPairsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeKeyPairs',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'KeyNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'KeyName',
                    'items' => array(
                        'name' => 'KeyName',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeRegions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeRegionsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeRegions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'RegionNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'RegionName',
                    'items' => array(
                        'name' => 'RegionName',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeReservedInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeReservedInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ReservedInstancesIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ReservedInstancesId',
                    'items' => array(
                        'name' => 'ReservedInstancesId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'OfferingType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeReservedInstancesModifications' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeReservedInstancesModificationsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedInstancesModifications',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'ReservedInstancesModificationIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ReservedInstancesModificationId',
                    'items' => array(
                        'name' => 'ReservedInstancesModificationId',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeReservedInstancesOfferings' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeReservedInstancesOfferingsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedInstancesOfferings',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ReservedInstancesOfferingIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ReservedInstancesOfferingId',
                    'items' => array(
                        'name' => 'ReservedInstancesOfferingId',
                        'type' => 'string',
                    ),
                ),
                'InstanceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ProductDescription' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'InstanceTenancy' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OfferingType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'IncludeMarketplace' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'MinDuration' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MaxDuration' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MaxInstanceCount' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeSecurityGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSecurityGroupsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSecurityGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'GroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'GroupName',
                    'items' => array(
                        'name' => 'GroupName',
                        'type' => 'string',
                    ),
                ),
                'GroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'GroupId',
                    'items' => array(
                        'name' => 'GroupId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSnapshotAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSnapshotAttributeResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSnapshotAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SnapshotId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeSnapshots' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSnapshotsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSnapshots',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SnapshotIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SnapshotId',
                    'items' => array(
                        'name' => 'SnapshotId',
                        'type' => 'string',
                    ),
                ),
                'OwnerIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Owner',
                    'items' => array(
                        'name' => 'Owner',
                        'type' => 'string',
                    ),
                ),
                'RestorableByUserIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'RestorableBy',
                    'items' => array(
                        'name' => 'RestorableBy',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeSubnets' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSubnetsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSubnets',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SubnetIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SubnetId',
                    'items' => array(
                        'name' => 'SubnetId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeVolumeAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVolumeAttributeResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVolumeAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeVolumes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVolumesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVolumes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VolumeIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VolumeId',
                    'items' => array(
                        'name' => 'VolumeId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeVolumeStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVolumeStatusResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVolumeStatus',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VolumeIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VolumeId',
                    'items' => array(
                        'name' => 'VolumeId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeVpcAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVpcAttributeResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVpcAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeVpcs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVpcsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVpcs',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpcId',
                    'items' => array(
                        'name' => 'VpcId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeVpnConnections' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVpnConnectionsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVpnConnections',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpnConnectionIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpnConnectionId',
                    'items' => array(
                        'name' => 'VpnConnectionId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeVpnGateways' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVpnGatewaysResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVpnGateways',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpnGatewayIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpnGatewayId',
                    'items' => array(
                        'name' => 'VpnGatewayId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DetachVolume' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'attachment',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DetachVolume',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Device' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Force' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DetachVpnGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DetachVpnGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpnGatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DisassociateAddress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DisassociateAddress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PublicIp' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AssociationId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'EnableVolumeIO' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnableVolumeIO',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'GetConsoleOutput' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetConsoleOutputResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetConsoleOutput',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'GetPasswordData' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetPasswordDataResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetPasswordData',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ImportKeyPair' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ImportKeyPairResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ImportKeyPair',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'KeyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PublicKeyMaterial' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'filters' => array(
                        'base64_encode',
                    ),
                ),
            ),
        ),
        'ModifyIdFormat' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyIdFormat',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'Resource' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'UseLongIds' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ModifyImageAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyImageAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ImageId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OperationType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'UserIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'UserId',
                    'items' => array(
                        'name' => 'UserId',
                        'type' => 'string',
                    ),
                ),
                'UserGroups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'UserGroup',
                    'items' => array(
                        'name' => 'UserGroup',
                        'type' => 'string',
                    ),
                ),
                'ProductCodes' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ProductCode',
                    'items' => array(
                        'name' => 'ProductCode',
                        'type' => 'string',
                    ),
                ),
                'Value' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LaunchPermission' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Add' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'LaunchPermission',
                                'type' => 'object',
                                'properties' => array(
                                    'UserId' => array(
                                        'type' => 'string',
                                    ),
                                    'Group' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'Remove' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'LaunchPermission',
                                'type' => 'object',
                                'properties' => array(
                                    'UserId' => array(
                                        'type' => 'string',
                                    ),
                                    'Group' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Description' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'ModifyReservedInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ModifyReservedInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyReservedInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReservedInstancesIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ReservedInstancesId',
                    'items' => array(
                        'name' => 'ReservedInstancesId',
                        'type' => 'string',
                    ),
                ),
                'TargetConfigurations' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ReservedInstancesConfigurationSetItemType',
                    'items' => array(
                        'name' => 'ReservedInstancesConfigurationSetItemType',
                        'type' => 'object',
                        'properties' => array(
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'Platform' => array(
                                'type' => 'string',
                            ),
                            'InstanceCount' => array(
                                'type' => 'numeric',
                            ),
                            'InstanceType' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ModifySnapshotAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifySnapshotAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SnapshotId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'OperationType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'UserIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'UserId',
                    'items' => array(
                        'name' => 'UserId',
                        'type' => 'string',
                    ),
                ),
                'GroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'UserGroup',
                    'items' => array(
                        'name' => 'UserGroup',
                        'type' => 'string',
                    ),
                ),
                'CreateVolumePermission' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Add' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CreateVolumePermission',
                                'type' => 'object',
                                'properties' => array(
                                    'UserId' => array(
                                        'type' => 'string',
                                    ),
                                    'Group' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'Remove' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CreateVolumePermission',
                                'type' => 'object',
                                'properties' => array(
                                    'UserId' => array(
                                        'type' => 'string',
                                    ),
                                    'Group' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ModifySubnetAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifySubnetAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'SubnetId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MapPublicIpOnLaunch' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
        ),
        'ModifyVolumeAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyVolumeAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VolumeId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutoEnableIO' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
        ),
        'ModifyVpcAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyVpcAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EnableDnsSupport' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
                'EnableDnsHostnames' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
        ),
        'MonitorInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'MonitorInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'MonitorInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceId',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'PurchaseReservedInstancesOffering' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'PurchaseReservedInstancesOfferingResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PurchaseReservedInstancesOffering',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ReservedInstancesOfferingId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceCount' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'LimitPrice' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Amount' => array(
                            'type' => 'numeric',
                        ),
                        'CurrencyCode' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'RebootInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RebootInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceId',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'RegisterImage' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RegisterImageResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RegisterImage',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ImageLocation' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Architecture' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'KernelId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RamdiskId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RootDeviceName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'BlockDeviceMappings' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'BlockDeviceMapping',
                    'items' => array(
                        'name' => 'BlockDeviceMapping',
                        'type' => 'object',
                        'properties' => array(
                            'VirtualName' => array(
                                'type' => 'string',
                            ),
                            'DeviceName' => array(
                                'type' => 'string',
                            ),
                            'Ebs' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'SnapshotId' => array(
                                        'type' => 'string',
                                    ),
                                    'VolumeSize' => array(
                                        'type' => 'numeric',
                                    ),
                                    'DeleteOnTermination' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                    'VolumeType' => array(
                                        'type' => 'string',
                                    ),
                                    'Iops' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Encrypted' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                ),
                            ),
                            'NoDevice' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'VirtualizationType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SriovNetSupport' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ReleaseAddress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ReleaseAddress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PublicIp' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AllocationId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ResetImageAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ResetImageAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ImageId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ResetSnapshotAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ResetSnapshotAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SnapshotId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'RevokeSecurityGroupIngress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RevokeSecurityGroupIngress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'GroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'GroupId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceSecurityGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceSecurityGroupOwnerId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'IpProtocol' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'FromPort' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'ToPort' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'CidrIp' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'IpPermissions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'IpPermission',
                        'type' => 'object',
                        'properties' => array(
                            'IpProtocol' => array(
                                'type' => 'string',
                            ),
                            'FromPort' => array(
                                'type' => 'numeric',
                            ),
                            'ToPort' => array(
                                'type' => 'numeric',
                            ),
                            'UserIdGroupPairs' => array(
                                'type' => 'array',
                                'sentAs' => 'Groups',
                                'items' => array(
                                    'name' => 'Groups',
                                    'type' => 'object',
                                    'properties' => array(
                                        'UserId' => array(
                                            'type' => 'string',
                                        ),
                                        'GroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'GroupId' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'IpRanges' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IpRange',
                                    'type' => 'object',
                                    'properties' => array(
                                        'CidrIp' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'PrefixListIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PrefixListId',
                                    'type' => 'object',
                                    'properties' => array(
                                        'PrefixListId' => array(
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
        'RunInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'reservation',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RunInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ImageId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MinCount' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MaxCount' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'KeyName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroup',
                    'items' => array(
                        'name' => 'SecurityGroup',
                        'type' => 'string',
                    ),
                ),
                'SecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroupId',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'UserData' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Placement' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'AvailabilityZone' => array(
                            'type' => 'string',
                        ),
                        'GroupName' => array(
                            'type' => 'string',
                        ),
                        'Tenancy' => array(
                            'type' => 'string',
                        ),
                        'HostId' => array(
                            'type' => 'string',
                        ),
                        'Affinity' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'KernelId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RamdiskId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'BlockDeviceMappings' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'BlockDeviceMapping',
                    'items' => array(
                        'name' => 'BlockDeviceMapping',
                        'type' => 'object',
                        'properties' => array(
                            'VirtualName' => array(
                                'type' => 'string',
                            ),
                            'DeviceName' => array(
                                'type' => 'string',
                            ),
                            'Ebs' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'SnapshotId' => array(
                                        'type' => 'string',
                                    ),
                                    'VolumeSize' => array(
                                        'type' => 'numeric',
                                    ),
                                    'DeleteOnTermination' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                    'VolumeType' => array(
                                        'type' => 'string',
                                    ),
                                    'Iops' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Encrypted' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                ),
                            ),
                            'NoDevice' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Monitoring' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
                'SubnetId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DisableApiTermination' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceInitiatedShutdownBehavior' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PrivateIpAddress' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AdditionalInfo' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NetworkInterfaces' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'NetworkInterface',
                    'items' => array(
                        'name' => 'NetworkInterface',
                        'type' => 'object',
                        'properties' => array(
                            'NetworkInterfaceId' => array(
                                'type' => 'string',
                            ),
                            'DeviceIndex' => array(
                                'type' => 'numeric',
                            ),
                            'SubnetId' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'PrivateIpAddress' => array(
                                'type' => 'string',
                            ),
                            'Groups' => array(
                                'type' => 'array',
                                'sentAs' => 'SecurityGroupId',
                                'items' => array(
                                    'name' => 'SecurityGroupId',
                                    'type' => 'string',
                                ),
                            ),
                            'DeleteOnTermination' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                            'PrivateIpAddresses' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PrivateIpAddressSpecification',
                                    'type' => 'object',
                                    'properties' => array(
                                        'PrivateIpAddress' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                        'Primary' => array(
                                            'type' => 'boolean',
                                            'format' => 'boolean-string',
                                        ),
                                    ),
                                ),
                            ),
                            'SecondaryPrivateIpAddressCount' => array(
                                'type' => 'numeric',
                            ),
                            'AssociatePublicIpAddress' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
                'IamInstanceProfile' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'EbsOptimized' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'TerminateInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'TerminateInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'TerminateInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceId',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'UnmonitorInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UnmonitorInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UnmonitorInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceId',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'CreateImage' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateImageResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateImage',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NoReboot' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'BlockDeviceMappings' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'BlockDeviceMapping',
                    'items' => array(
                        'name' => 'BlockDeviceMapping',
                        'type' => 'object',
                        'properties' => array(
                            'VirtualName' => array(
                                'type' => 'string',
                            ),
                            'DeviceName' => array(
                                'type' => 'string',
                            ),
                            'Ebs' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'SnapshotId' => array(
                                        'type' => 'string',
                                    ),
                                    'VolumeSize' => array(
                                        'type' => 'numeric',
                                    ),
                                    'DeleteOnTermination' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                    'VolumeType' => array(
                                        'type' => 'string',
                                    ),
                                    'Iops' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Encrypted' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                ),
                            ),
                            'NoDevice' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'StartInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'StartInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'StartInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'InstanceIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceId',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
                'AdditionalInfo' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'StopInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'StopInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'StopInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceId',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
                'Force' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeInstanceAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'InstanceAttribute',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeInstanceAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ModifyInstanceAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyInstanceAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Value' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'BlockDeviceMappings' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'BlockDeviceMapping',
                    'items' => array(
                        'name' => 'BlockDeviceMapping',
                        'type' => 'object',
                        'properties' => array(
                            'DeviceName' => array(
                                'type' => 'string',
                            ),
                            'Ebs' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'VolumeId' => array(
                                        'type' => 'string',
                                    ),
                                    'DeleteOnTermination' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                ),
                            ),
                            'VirtualName' => array(
                                'type' => 'string',
                            ),
                            'NoDevice' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'SourceDestCheck' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
                'DisableApiTermination' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
                'InstanceType' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Kernel' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Ramdisk' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'UserData' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'InstanceInitiatedShutdownBehavior' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Groups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'GroupId',
                    'items' => array(
                        'name' => 'GroupId',
                        'type' => 'string',
                    ),
                ),
                'EbsOptimized' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
                'SriovNetSupport' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'ResetInstanceAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ResetInstanceAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'RequestSpotInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RequestSpotInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RequestSpotInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SpotPrice' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceCount' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Type' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ValidFrom' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'ValidUntil' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'LaunchGroup' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AvailabilityZoneGroup' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'BlockDurationMinutes' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'LaunchSpecification' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'ImageId' => array(
                            'type' => 'string',
                        ),
                        'KeyName' => array(
                            'type' => 'string',
                        ),
                        'UserData' => array(
                            'type' => 'string',
                        ),
                        'AddressingType' => array(
                            'type' => 'string',
                        ),
                        'InstanceType' => array(
                            'type' => 'string',
                        ),
                        'Placement' => array(
                            'type' => 'object',
                            'properties' => array(
                                'AvailabilityZone' => array(
                                    'type' => 'string',
                                ),
                                'GroupName' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'KernelId' => array(
                            'type' => 'string',
                        ),
                        'RamdiskId' => array(
                            'type' => 'string',
                        ),
                        'BlockDeviceMappings' => array(
                            'type' => 'array',
                            'sentAs' => 'BlockDeviceMapping',
                            'items' => array(
                                'name' => 'BlockDeviceMapping',
                                'type' => 'object',
                                'properties' => array(
                                    'VirtualName' => array(
                                        'type' => 'string',
                                    ),
                                    'DeviceName' => array(
                                        'type' => 'string',
                                    ),
                                    'Ebs' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'SnapshotId' => array(
                                                'type' => 'string',
                                            ),
                                            'VolumeSize' => array(
                                                'type' => 'numeric',
                                            ),
                                            'DeleteOnTermination' => array(
                                                'type' => 'boolean',
                                                'format' => 'boolean-string',
                                            ),
                                            'VolumeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Iops' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Encrypted' => array(
                                                'type' => 'boolean',
                                                'format' => 'boolean-string',
                                            ),
                                        ),
                                    ),
                                    'NoDevice' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'Monitoring' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'SubnetId' => array(
                            'type' => 'string',
                        ),
                        'NetworkInterfaces' => array(
                            'type' => 'array',
                            'sentAs' => 'NetworkInterface',
                            'items' => array(
                                'name' => 'NetworkInterface',
                                'type' => 'object',
                                'properties' => array(
                                    'NetworkInterfaceId' => array(
                                        'type' => 'string',
                                    ),
                                    'DeviceIndex' => array(
                                        'type' => 'numeric',
                                    ),
                                    'SubnetId' => array(
                                        'type' => 'string',
                                    ),
                                    'Description' => array(
                                        'type' => 'string',
                                    ),
                                    'PrivateIpAddress' => array(
                                        'type' => 'string',
                                    ),
                                    'Groups' => array(
                                        'type' => 'array',
                                        'sentAs' => 'SecurityGroupId',
                                        'items' => array(
                                            'name' => 'SecurityGroupId',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'DeleteOnTermination' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                    'PrivateIpAddresses' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'PrivateIpAddressSpecification',
                                            'type' => 'object',
                                            'properties' => array(
                                                'PrivateIpAddress' => array(
                                                    'required' => true,
                                                    'type' => 'string',
                                                ),
                                                'Primary' => array(
                                                    'type' => 'boolean',
                                                    'format' => 'boolean-string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'SecondaryPrivateIpAddressCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'AssociatePublicIpAddress' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                ),
                            ),
                        ),
                        'IamInstanceProfile' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Arn' => array(
                                    'type' => 'string',
                                ),
                                'Name' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'EbsOptimized' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'SecurityGroupIds' => array(
                            'type' => 'array',
                            'sentAs' => 'SecurityGroupId',
                            'items' => array(
                                'name' => 'SecurityGroupId',
                                'type' => 'string',
                            ),
                        ),
                        'SecurityGroups' => array(
                            'type' => 'array',
                            'sentAs' => 'SecurityGroup',
                            'items' => array(
                                'name' => 'SecurityGroup',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSpotInstanceRequests' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSpotInstanceRequestsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSpotInstanceRequests',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SpotInstanceRequestIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SpotInstanceRequestId',
                    'items' => array(
                        'name' => 'SpotInstanceRequestId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CancelSpotInstanceRequests' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CancelSpotInstanceRequestsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CancelSpotInstanceRequests',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SpotInstanceRequestIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SpotInstanceRequestId',
                    'items' => array(
                        'name' => 'SpotInstanceRequestId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'DescribeSpotPriceHistory' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSpotPriceHistoryResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSpotPriceHistory',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
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
                'InstanceTypes' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceType',
                    'items' => array(
                        'name' => 'InstanceType',
                        'type' => 'string',
                    ),
                ),
                'ProductDescriptions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ProductDescription',
                    'items' => array(
                        'name' => 'ProductDescription',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateSpotDatafeedSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateSpotDatafeedSubscriptionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateSpotDatafeedSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Bucket' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeSpotDatafeedSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSpotDatafeedSubscriptionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSpotDatafeedSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteSpotDatafeedSubscription' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteSpotDatafeedSubscription',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreatePlacementGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreatePlacementGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Strategy' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeletePlacementGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeletePlacementGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'GroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribePlacementGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribePlacementGroupsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribePlacementGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'GroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'GroupName',
                    'items' => array(
                        'name' => 'GroupName',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateTags',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Resources' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ResourceId',
                    'items' => array(
                        'name' => 'ResourceId',
                        'type' => 'string',
                    ),
                ),
                'Tags' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tag',
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
        ),
        'DescribeTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeTagsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeTags',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteTags',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Resources' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ResourceId',
                    'items' => array(
                        'name' => 'ResourceId',
                        'type' => 'string',
                    ),
                ),
                'Tags' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tag',
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
        ),
        'AuthorizeSecurityGroupEgress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AuthorizeSecurityGroupEgress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'GroupId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceSecurityGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceSecurityGroupOwnerId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'IpProtocol' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'FromPort' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'ToPort' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'CidrIp' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'IpPermissions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'IpPermission',
                        'type' => 'object',
                        'properties' => array(
                            'IpProtocol' => array(
                                'type' => 'string',
                            ),
                            'FromPort' => array(
                                'type' => 'numeric',
                            ),
                            'ToPort' => array(
                                'type' => 'numeric',
                            ),
                            'UserIdGroupPairs' => array(
                                'type' => 'array',
                                'sentAs' => 'Groups',
                                'items' => array(
                                    'name' => 'Groups',
                                    'type' => 'object',
                                    'properties' => array(
                                        'UserId' => array(
                                            'type' => 'string',
                                        ),
                                        'GroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'GroupId' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'IpRanges' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IpRange',
                                    'type' => 'object',
                                    'properties' => array(
                                        'CidrIp' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'PrefixListIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PrefixListId',
                                    'type' => 'object',
                                    'properties' => array(
                                        'PrefixListId' => array(
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
        'RevokeSecurityGroupEgress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RevokeSecurityGroupEgress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'GroupId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceSecurityGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceSecurityGroupOwnerId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'IpProtocol' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'FromPort' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'ToPort' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'CidrIp' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'IpPermissions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'IpPermission',
                        'type' => 'object',
                        'properties' => array(
                            'IpProtocol' => array(
                                'type' => 'string',
                            ),
                            'FromPort' => array(
                                'type' => 'numeric',
                            ),
                            'ToPort' => array(
                                'type' => 'numeric',
                            ),
                            'UserIdGroupPairs' => array(
                                'type' => 'array',
                                'sentAs' => 'Groups',
                                'items' => array(
                                    'name' => 'Groups',
                                    'type' => 'object',
                                    'properties' => array(
                                        'UserId' => array(
                                            'type' => 'string',
                                        ),
                                        'GroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'GroupId' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'IpRanges' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IpRange',
                                    'type' => 'object',
                                    'properties' => array(
                                        'CidrIp' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'PrefixListIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PrefixListId',
                                    'type' => 'object',
                                    'properties' => array(
                                        'PrefixListId' => array(
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
        'CreateInternetGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateInternetGatewayResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateInternetGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeInternetGateways' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeInternetGatewaysResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeInternetGateways',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InternetGatewayIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InternetGatewayId',
                    'items' => array(
                        'name' => 'InternetGatewayId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteInternetGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteInternetGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InternetGatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AttachInternetGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AttachInternetGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InternetGatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DetachInternetGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DetachInternetGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InternetGatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateRouteTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateRouteTableResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateRouteTable',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeRouteTables' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeRouteTablesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeRouteTables',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'RouteTableIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'RouteTableId',
                    'items' => array(
                        'name' => 'RouteTableId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteRouteTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteRouteTable',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'RouteTableId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AssociateRouteTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AssociateRouteTableResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AssociateRouteTable',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SubnetId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RouteTableId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ReplaceRouteTableAssociation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReplaceRouteTableAssociationResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ReplaceRouteTableAssociation',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AssociationId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RouteTableId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DisassociateRouteTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DisassociateRouteTable',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AssociationId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateRoute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateRouteResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateRoute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'RouteTableId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DestinationCidrBlock' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'GatewayId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NetworkInterfaceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VpcPeeringConnectionId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NatGatewayId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ReplaceRoute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ReplaceRoute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'RouteTableId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DestinationCidrBlock' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'GatewayId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NetworkInterfaceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VpcPeeringConnectionId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NatGatewayId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteRoute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteRoute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'RouteTableId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DestinationCidrBlock' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateNetworkAcl' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateNetworkAclResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateNetworkAcl',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeNetworkAcls' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeNetworkAclsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeNetworkAcls',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkAclIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'NetworkAclId',
                    'items' => array(
                        'name' => 'NetworkAclId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteNetworkAcl' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteNetworkAcl',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkAclId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ReplaceNetworkAclAssociation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReplaceNetworkAclAssociationResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ReplaceNetworkAclAssociation',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AssociationId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NetworkAclId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateNetworkAclEntry' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateNetworkAclEntry',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkAclId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RuleNumber' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Protocol' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RuleAction' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Egress' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'CidrBlock' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'IcmpTypeCode' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'sentAs' => 'Icmp',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'numeric',
                        ),
                        'Code' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'PortRange' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'From' => array(
                            'type' => 'numeric',
                        ),
                        'To' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'ReplaceNetworkAclEntry' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ReplaceNetworkAclEntry',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkAclId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RuleNumber' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Protocol' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RuleAction' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Egress' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'CidrBlock' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'IcmpTypeCode' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'sentAs' => 'Icmp',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'numeric',
                        ),
                        'Code' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'PortRange' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'From' => array(
                            'type' => 'numeric',
                        ),
                        'To' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'DeleteNetworkAclEntry' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteNetworkAclEntry',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkAclId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RuleNumber' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Egress' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeInstanceStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeInstanceStatusResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeInstanceStatus',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceId',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'IncludeAllInstances' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ReportInstanceStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ReportInstanceStatus',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Instances' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceId',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
                'Status' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
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
                'ReasonCodes' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ReasonCode',
                    'items' => array(
                        'name' => 'ReasonCode',
                        'type' => 'string',
                    ),
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ImportInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ImportInstanceResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ImportInstance',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LaunchSpecification' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Architecture' => array(
                            'type' => 'string',
                        ),
                        'GroupNames' => array(
                            'type' => 'array',
                            'sentAs' => 'GroupName',
                            'items' => array(
                                'name' => 'GroupName',
                                'type' => 'string',
                            ),
                        ),
                        'GroupIds' => array(
                            'type' => 'array',
                            'sentAs' => 'GroupId',
                            'items' => array(
                                'name' => 'GroupId',
                                'type' => 'string',
                            ),
                        ),
                        'AdditionalInfo' => array(
                            'type' => 'string',
                        ),
                        'UserData' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Data' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'InstanceType' => array(
                            'type' => 'string',
                        ),
                        'Placement' => array(
                            'type' => 'object',
                            'properties' => array(
                                'AvailabilityZone' => array(
                                    'type' => 'string',
                                ),
                                'GroupName' => array(
                                    'type' => 'string',
                                ),
                                'Tenancy' => array(
                                    'type' => 'string',
                                ),
                                'HostId' => array(
                                    'type' => 'string',
                                ),
                                'Affinity' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Monitoring' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'SubnetId' => array(
                            'type' => 'string',
                        ),
                        'InstanceInitiatedShutdownBehavior' => array(
                            'type' => 'string',
                        ),
                        'PrivateIpAddress' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'DiskImages' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'DiskImage',
                    'items' => array(
                        'name' => 'DiskImage',
                        'type' => 'object',
                        'properties' => array(
                            'Image' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Format' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'Bytes' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                    'ImportManifestUrl' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Volume' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Size' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Platform' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ImportVolume' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ImportVolumeResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ImportVolume',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Image' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Format' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Bytes' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'ImportManifestUrl' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Volume' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Size' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'CancelConversionTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CancelConversionTask',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ConversionTaskId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReasonMessage' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeConversionTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeConversionTasksResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeConversionTasks',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'ConversionTaskIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ConversionTaskId',
                    'items' => array(
                        'name' => 'ConversionTaskId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'CreateNetworkInterface' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateNetworkInterfaceResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateNetworkInterface',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'SubnetId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PrivateIpAddress' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Groups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroupId',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'PrivateIpAddresses' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'PrivateIpAddressSpecification',
                        'type' => 'object',
                        'properties' => array(
                            'PrivateIpAddress' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Primary' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
                'SecondaryPrivateIpAddressCount' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeNetworkInterfaces' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeNetworkInterfacesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeNetworkInterfaces',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkInterfaceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'NetworkInterfaceId',
                    'items' => array(
                        'name' => 'NetworkInterfaceId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteNetworkInterface' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteNetworkInterface',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkInterfaceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AttachNetworkInterface' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AttachNetworkInterfaceResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AttachNetworkInterface',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkInterfaceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DeviceIndex' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DetachNetworkInterface' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DetachNetworkInterface',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AttachmentId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Force' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeNetworkInterfaceAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeNetworkInterfaceAttributeResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeNetworkInterfaceAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkInterfaceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attribute' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ModifyNetworkInterfaceAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyNetworkInterfaceAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkInterfaceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'SourceDestCheck' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
                'Groups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroupId',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'Attachment' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'AttachmentId' => array(
                            'type' => 'string',
                        ),
                        'DeleteOnTermination' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
        ),
        'ResetNetworkInterfaceAttribute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ResetNetworkInterfaceAttribute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'NetworkInterfaceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceDestCheck' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeExportTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeExportTasksResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeExportTasks',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'ExportTaskIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ExportTaskId',
                    'items' => array(
                        'name' => 'ExportTaskId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'CreateInstanceExportTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateInstanceExportTaskResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateInstanceExportTask',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'TargetEnvironment' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ExportToS3Task' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'sentAs' => 'ExportToS3',
                    'properties' => array(
                        'DiskImageFormat' => array(
                            'type' => 'string',
                        ),
                        'ContainerFormat' => array(
                            'type' => 'string',
                        ),
                        'S3Bucket' => array(
                            'type' => 'string',
                        ),
                        'S3Prefix' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CancelExportTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CancelExportTask',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'ExportTaskId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AssignPrivateIpAddresses' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AssignPrivateIpAddresses',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'NetworkInterfaceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PrivateIpAddresses' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PrivateIpAddress',
                    'items' => array(
                        'name' => 'PrivateIpAddress',
                        'type' => 'string',
                    ),
                ),
                'SecondaryPrivateIpAddressCount' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'AllowReassignment' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'UnassignPrivateIpAddresses' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UnassignPrivateIpAddresses',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'NetworkInterfaceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PrivateIpAddresses' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PrivateIpAddress',
                    'items' => array(
                        'name' => 'PrivateIpAddress',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'CancelReservedInstancesListing' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CancelReservedInstancesListingResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CancelReservedInstancesListing',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'ReservedInstancesListingId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateReservedInstancesListing' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateReservedInstancesListingResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateReservedInstancesListing',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'ReservedInstancesId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceCount' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PriceSchedules' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'PriceScheduleSpecification',
                        'type' => 'object',
                        'properties' => array(
                            'Term' => array(
                                'type' => 'numeric',
                            ),
                            'Price' => array(
                                'type' => 'numeric',
                            ),
                            'CurrencyCode' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'ClientToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeReservedInstancesListings' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeReservedInstancesListingsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedInstancesListings',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'ReservedInstancesId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReservedInstancesListingId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EnableVgwRoutePropagation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnableVgwRoutePropagation',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'RouteTableId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'GatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DisableVgwRoutePropagation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DisableVgwRoutePropagation',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'RouteTableId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'GatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateVpnConnectionRoute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateVpnConnectionRoute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'VpnConnectionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DestinationCidrBlock' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteVpnConnectionRoute' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteVpnConnectionRoute',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'VpnConnectionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DestinationCidrBlock' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AcceptVpcPeeringConnection' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AcceptVpcPeeringConnectionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AcceptVpcPeeringConnection',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcPeeringConnectionId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateVpcPeeringConnection' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateVpcPeeringConnectionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateVpcPeeringConnection',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PeerVpcId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PeerOwnerId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteVpcPeeringConnection' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteVpcPeeringConnectionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteVpcPeeringConnection',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcPeeringConnectionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeVpcPeeringConnections' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVpcPeeringConnectionsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVpcPeeringConnections',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcPeeringConnectionIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpcPeeringConnectionId',
                    'items' => array(
                        'name' => 'VpcPeeringConnectionId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RejectVpcPeeringConnection' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RejectVpcPeeringConnectionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RejectVpcPeeringConnection',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcPeeringConnectionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'EnableVpcClassicLink' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EnableVpcClassicLinkResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnableVpcClassicLink',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DisableVpcClassicLink' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DisableVpcClassicLinkResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DisableVpcClassicLink',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AttachClassicLinkVpc' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AttachClassicLinkVpcResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AttachClassicLinkVpc',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Groups' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroupId',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'DetachClassicLinkVpc' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DetachClassicLinkVpcResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DetachClassicLinkVpc',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeClassicLinkInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeClassicLinkInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeClassicLinkInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceId',
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeVpcClassicLink' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVpcClassicLinkResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVpcClassicLink',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpcId',
                    'items' => array(
                        'name' => 'VpcId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EnableVpcClassicLinkDnsSupport' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EnableVpcClassicLinkDnsSupportResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnableVpcClassicLinkDnsSupport',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'VpcId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DisableVpcClassicLinkDnsSupport' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DisableVpcClassicLinkDnsSupportResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DisableVpcClassicLinkDnsSupport',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'VpcId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeVpcClassicLinkDnsSupport' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVpcClassicLinkDnsSupportResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVpcClassicLinkDnsSupport',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'VpcIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 5,
                    'maximum' => 255,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                ),
            ),
        ),
        'CancelImportTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CancelImportTaskResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CancelImportTask',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ImportTaskId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CancelReason' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeImportImageTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeImportImageTasksResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeImportImageTasks',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ImportTaskIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ImportTaskId',
                    'items' => array(
                        'name' => 'ImportTaskId',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeImportSnapshotTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeImportSnapshotTasksResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeImportSnapshotTasks',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ImportTaskIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ImportTaskId',
                    'items' => array(
                        'name' => 'ImportTaskId',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ImportImage' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ImportImageResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ImportImage',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DiskContainers' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'DiskContainer',
                    'items' => array(
                        'name' => 'DiskContainer',
                        'type' => 'object',
                        'properties' => array(
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Format' => array(
                                'type' => 'string',
                            ),
                            'Url' => array(
                                'type' => 'string',
                            ),
                            'UserBucket' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S3Bucket' => array(
                                        'type' => 'string',
                                    ),
                                    'S3Key' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'DeviceName' => array(
                                'type' => 'string',
                            ),
                            'SnapshotId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'LicenseType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Hypervisor' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Architecture' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Platform' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClientData' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'UploadStart' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                        'UploadEnd' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                        'UploadSize' => array(
                            'type' => 'numeric',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RoleName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ImportSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ImportSnapshotResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ImportSnapshot',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DiskContainer' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'Format' => array(
                            'type' => 'string',
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'UserBucket' => array(
                            'type' => 'object',
                            'properties' => array(
                                'S3Bucket' => array(
                                    'type' => 'string',
                                ),
                                'S3Key' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'ClientData' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'UploadStart' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                        'UploadEnd' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                        'UploadSize' => array(
                            'type' => 'numeric',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RoleName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateVpcEndpoint' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateVpcEndpointResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateVpcEndpoint',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ServiceName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PolicyDocument' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RouteTableIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'RouteTableId',
                    'items' => array(
                        'name' => 'RouteTableId',
                        'type' => 'string',
                    ),
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeVpcEndpoints' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVpcEndpointsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVpcEndpoints',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcEndpointIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpcEndpointId',
                    'items' => array(
                        'name' => 'VpcEndpointId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteVpcEndpoints' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteVpcEndpointsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteVpcEndpoints',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcEndpointIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'VpcEndpointId',
                    'items' => array(
                        'name' => 'VpcEndpointId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'ModifyVpcEndpoint' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ModifyVpcEndpointResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyVpcEndpoint',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'VpcEndpointId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ResetPolicy' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PolicyDocument' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AddRouteTableIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AddRouteTableId',
                    'items' => array(
                        'name' => 'AddRouteTableId',
                        'type' => 'string',
                    ),
                ),
                'RemoveRouteTableIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'RemoveRouteTableId',
                    'items' => array(
                        'name' => 'RemoveRouteTableId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'DescribeVpcEndpointServices' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeVpcEndpointServicesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeVpcEndpointServices',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribePrefixLists' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribePrefixListsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribePrefixLists',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PrefixListIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PrefixListId',
                    'items' => array(
                        'name' => 'PrefixListId',
                        'type' => 'string',
                    ),
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'MoveAddressToVpc' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'MoveAddressToVpcResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'MoveAddressToVpc',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PublicIp' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'RestoreAddressToClassic' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RestoreAddressToClassicResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RestoreAddressToClassic',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PublicIp' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeMovingAddresses' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeMovingAddressesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeMovingAddresses',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PublicIps' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PublicIp',
                    'items' => array(
                        'name' => 'PublicIp',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeScheduledInstanceAvailability' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeScheduledInstanceAvailabilityResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeScheduledInstanceAvailability',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'Recurrence' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Frequency' => array(
                            'type' => 'string',
                        ),
                        'Interval' => array(
                            'type' => 'numeric',
                        ),
                        'OccurrenceDays' => array(
                            'type' => 'array',
                            'sentAs' => 'OccurrenceDay',
                            'items' => array(
                                'name' => 'OccurrenceDay',
                                'type' => 'numeric',
                            ),
                        ),
                        'OccurrenceRelativeToEnd' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'OccurrenceUnit' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'FirstSlotStartTimeRange' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'EarliestTime' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                        'LatestTime' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                    ),
                ),
                'MinSlotDurationInHours' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MaxSlotDurationInHours' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeScheduledInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeScheduledInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeScheduledInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ScheduledInstanceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ScheduledInstanceId',
                    'items' => array(
                        'name' => 'ScheduledInstanceId',
                        'type' => 'string',
                    ),
                ),
                'SlotStartTimeRange' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'EarliestTime' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                        'LatestTime' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filter',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'PurchaseScheduledInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'PurchaseScheduledInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PurchaseScheduledInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PurchaseRequests' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PurchaseRequest',
                    'items' => array(
                        'name' => 'PurchaseRequest',
                        'type' => 'object',
                        'properties' => array(
                            'PurchaseToken' => array(
                                'type' => 'string',
                            ),
                            'InstanceCount' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RunScheduledInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RunScheduledInstancesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RunScheduledInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceCount' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'ScheduledInstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LaunchSpecification' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'ImageId' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'KeyName' => array(
                            'type' => 'string',
                        ),
                        'SecurityGroupIds' => array(
                            'type' => 'array',
                            'sentAs' => 'SecurityGroupId',
                            'items' => array(
                                'name' => 'SecurityGroupId',
                                'type' => 'string',
                            ),
                        ),
                        'UserData' => array(
                            'type' => 'string',
                        ),
                        'Placement' => array(
                            'type' => 'object',
                            'properties' => array(
                                'AvailabilityZone' => array(
                                    'type' => 'string',
                                ),
                                'GroupName' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'KernelId' => array(
                            'type' => 'string',
                        ),
                        'InstanceType' => array(
                            'type' => 'string',
                        ),
                        'RamdiskId' => array(
                            'type' => 'string',
                        ),
                        'BlockDeviceMappings' => array(
                            'type' => 'array',
                            'sentAs' => 'BlockDeviceMapping',
                            'items' => array(
                                'name' => 'BlockDeviceMapping',
                                'type' => 'object',
                                'properties' => array(
                                    'DeviceName' => array(
                                        'type' => 'string',
                                    ),
                                    'NoDevice' => array(
                                        'type' => 'string',
                                    ),
                                    'VirtualName' => array(
                                        'type' => 'string',
                                    ),
                                    'Ebs' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'SnapshotId' => array(
                                                'type' => 'string',
                                            ),
                                            'VolumeSize' => array(
                                                'type' => 'numeric',
                                            ),
                                            'DeleteOnTermination' => array(
                                                'type' => 'boolean',
                                                'format' => 'boolean-string',
                                            ),
                                            'VolumeType' => array(
                                                'type' => 'string',
                                            ),
                                            'Iops' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Encrypted' => array(
                                                'type' => 'boolean',
                                                'format' => 'boolean-string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Monitoring' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'SubnetId' => array(
                            'type' => 'string',
                        ),
                        'NetworkInterfaces' => array(
                            'type' => 'array',
                            'sentAs' => 'NetworkInterface',
                            'items' => array(
                                'name' => 'NetworkInterface',
                                'type' => 'object',
                                'properties' => array(
                                    'NetworkInterfaceId' => array(
                                        'type' => 'string',
                                    ),
                                    'DeviceIndex' => array(
                                        'type' => 'numeric',
                                    ),
                                    'SubnetId' => array(
                                        'type' => 'string',
                                    ),
                                    'Description' => array(
                                        'type' => 'string',
                                    ),
                                    'PrivateIpAddress' => array(
                                        'type' => 'string',
                                    ),
                                    'PrivateIpAddressConfigs' => array(
                                        'type' => 'array',
                                        'sentAs' => 'PrivateIpAddressConfig',
                                        'items' => array(
                                            'name' => 'PrivateIpAddressConfig',
                                            'type' => 'object',
                                            'properties' => array(
                                                'PrivateIpAddress' => array(
                                                    'type' => 'string',
                                                ),
                                                'Primary' => array(
                                                    'type' => 'boolean',
                                                    'format' => 'boolean-string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'SecondaryPrivateIpAddressCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'AssociatePublicIpAddress' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                    'Groups' => array(
                                        'type' => 'array',
                                        'sentAs' => 'Group',
                                        'items' => array(
                                            'name' => 'Group',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'DeleteOnTermination' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                ),
                            ),
                        ),
                        'IamInstanceProfile' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Arn' => array(
                                    'type' => 'string',
                                ),
                                'Name' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'EbsOptimized' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
        ),
        'RequestSpotFleet' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RequestSpotFleetResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RequestSpotFleet',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SpotFleetRequestConfig' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'ClientToken' => array(
                            'type' => 'string',
                        ),
                        'SpotPrice' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'TargetCapacity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'ValidFrom' => array(
                            'type' => 'string',
                        ),
                        'ValidUntil' => array(
                            'type' => 'string',
                        ),
                        'TerminateInstancesWithExpiration' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'IamFleetRole' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'LaunchSpecifications' => array(
                            'required' => true,
                            'type' => 'array',
                            'minItems' => 1,
                            'items' => array(
                                'name' => 'SpotFleetLaunchSpecification',
                                'type' => 'object',
                                'properties' => array(
                                    'ImageId' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyName' => array(
                                        'type' => 'string',
                                    ),
                                    'SecurityGroups' => array(
                                        'type' => 'array',
                                        'sentAs' => 'GroupSet',
                                        'items' => array(
                                            'name' => 'GroupSet',
                                            'type' => 'object',
                                            'properties' => array(
                                                'GroupName' => array(
                                                    'type' => 'string',
                                                ),
                                                'GroupId' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'UserData' => array(
                                        'type' => 'string',
                                    ),
                                    'AddressingType' => array(
                                        'type' => 'string',
                                    ),
                                    'InstanceType' => array(
                                        'type' => 'string',
                                    ),
                                    'Placement' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'AvailabilityZone' => array(
                                                'type' => 'string',
                                            ),
                                            'GroupName' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'KernelId' => array(
                                        'type' => 'string',
                                    ),
                                    'RamdiskId' => array(
                                        'type' => 'string',
                                    ),
                                    'BlockDeviceMappings' => array(
                                        'type' => 'array',
                                        'sentAs' => 'BlockDeviceMapping',
                                        'items' => array(
                                            'name' => 'BlockDeviceMapping',
                                            'type' => 'object',
                                            'properties' => array(
                                                'VirtualName' => array(
                                                    'type' => 'string',
                                                ),
                                                'DeviceName' => array(
                                                    'type' => 'string',
                                                ),
                                                'Ebs' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'SnapshotId' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'VolumeSize' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'DeleteOnTermination' => array(
                                                            'type' => 'boolean',
                                                            'format' => 'boolean-string',
                                                        ),
                                                        'VolumeType' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Iops' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'Encrypted' => array(
                                                            'type' => 'boolean',
                                                            'format' => 'boolean-string',
                                                        ),
                                                    ),
                                                ),
                                                'NoDevice' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Monitoring' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Enabled' => array(
                                                'type' => 'boolean',
                                                'format' => 'boolean-string',
                                            ),
                                        ),
                                    ),
                                    'SubnetId' => array(
                                        'type' => 'string',
                                    ),
                                    'NetworkInterfaces' => array(
                                        'type' => 'array',
                                        'sentAs' => 'NetworkInterfaceSet',
                                        'items' => array(
                                            'name' => 'NetworkInterfaceSet',
                                            'type' => 'object',
                                            'properties' => array(
                                                'NetworkInterfaceId' => array(
                                                    'type' => 'string',
                                                ),
                                                'DeviceIndex' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'SubnetId' => array(
                                                    'type' => 'string',
                                                ),
                                                'Description' => array(
                                                    'type' => 'string',
                                                ),
                                                'PrivateIpAddress' => array(
                                                    'type' => 'string',
                                                ),
                                                'Groups' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'SecurityGroupId',
                                                    'items' => array(
                                                        'name' => 'SecurityGroupId',
                                                        'type' => 'string',
                                                    ),
                                                ),
                                                'DeleteOnTermination' => array(
                                                    'type' => 'boolean',
                                                    'format' => 'boolean-string',
                                                ),
                                                'PrivateIpAddresses' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'PrivateIpAddressesSet',
                                                    'items' => array(
                                                        'name' => 'PrivateIpAddressesSet',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'PrivateIpAddress' => array(
                                                                'required' => true,
                                                                'type' => 'string',
                                                            ),
                                                            'Primary' => array(
                                                                'type' => 'boolean',
                                                                'format' => 'boolean-string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'SecondaryPrivateIpAddressCount' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'AssociatePublicIpAddress' => array(
                                                    'type' => 'boolean',
                                                    'format' => 'boolean-string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IamInstanceProfile' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Arn' => array(
                                                'type' => 'string',
                                            ),
                                            'Name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'EbsOptimized' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                    'WeightedCapacity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'SpotPrice' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ExcessCapacityTerminationPolicy' => array(
                            'type' => 'string',
                        ),
                        'AllocationStrategy' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSpotFleetRequests' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSpotFleetRequestsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSpotFleetRequests',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SpotFleetRequestIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SpotFleetRequestId',
                    'items' => array(
                        'name' => 'SpotFleetRequestId',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeSpotFleetInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSpotFleetInstancesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSpotFleetInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SpotFleetRequestId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CancelSpotFleetRequests' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CancelSpotFleetRequestsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CancelSpotFleetRequests',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SpotFleetRequestIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SpotFleetRequestId',
                    'items' => array(
                        'name' => 'SpotFleetRequestId',
                        'type' => 'string',
                    ),
                ),
                'TerminateInstances' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeSpotFleetRequestHistory' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSpotFleetRequestHistoryResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSpotFleetRequestHistory',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'DryRun' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'SpotFleetRequestId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EventType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'StartTime' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ModifySpotFleetRequest' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ModifySpotFleetRequestResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifySpotFleetRequest',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'SpotFleetRequestId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'TargetCapacity' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'ExcessCapacityTerminationPolicy' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateFlowLogs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateFlowLogsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateFlowLogs',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'ResourceIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ResourceId',
                    'items' => array(
                        'name' => 'ResourceId',
                        'type' => 'string',
                    ),
                ),
                'ResourceType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'TrafficType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'LogGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DeliverLogsPermissionArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteFlowLogs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteFlowLogsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteFlowLogs',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'FlowLogIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'FlowLogId',
                    'items' => array(
                        'name' => 'FlowLogId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'DescribeFlowLogs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeFlowLogsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeFlowLogs',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'FlowLogIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'FlowLogId',
                    'items' => array(
                        'name' => 'FlowLogId',
                        'type' => 'string',
                    ),
                ),
                'Filter' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'AllocateHosts' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AllocateHostsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AllocateHosts',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'AutoPlacement' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'InstanceType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Quantity' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'AvailabilityZone' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ModifyInstancePlacement' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ModifyInstancePlacementResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyInstancePlacement',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Tenancy' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Affinity' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'HostId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ModifyHosts' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ModifyHostsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyHosts',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'HostIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'HostId',
                    'items' => array(
                        'name' => 'HostId',
                        'type' => 'string',
                    ),
                ),
                'AutoPlacement' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeHosts' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeHostsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeHosts',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'HostIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'HostId',
                    'items' => array(
                        'name' => 'HostId',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Filter' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ReleaseHosts' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReleaseHostsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ReleaseHosts',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'HostIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'HostId',
                    'items' => array(
                        'name' => 'HostId',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'CreateNatGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateNatGatewayResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateNatGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'SubnetId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AllocationId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DescribeNatGateways' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeNatGatewaysResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeNatGateways',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'NatGatewayIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'NatGatewayId',
                    'items' => array(
                        'name' => 'NatGatewayId',
                        'type' => 'string',
                    ),
                ),
                'Filter' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Value',
                                'items' => array(
                                    'name' => 'Value',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DeleteNatGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteNatGatewayResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteNatGateway',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2015-10-01',
                ),
                'NatGatewayId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
    ),
    'models' => array(
        'AllocateAddressResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PublicIp' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'publicIp',
                ),
                'Domain' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'domain',
                ),
                'AllocationId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'allocationId',
                ),
            ),
        ),
        'AssociateAddressResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AssociationId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'associationId',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'attachment' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'volumeId',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'instanceId',
                ),
                'Device' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'device',
                ),
                'State' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'status',
                ),
                'AttachTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'attachTime',
                ),
                'DeleteOnTermination' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'deleteOnTermination',
                ),
            ),
        ),
        'AttachVpnGatewayResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpcAttachment' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'attachment',
                    'properties' => array(
                        'VpcId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcId',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                    ),
                ),
            ),
        ),
        'BundleInstanceResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'BundleTask' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'bundleInstanceTask',
                    'properties' => array(
                        'InstanceId' => array(
                            'type' => 'string',
                            'sentAs' => 'instanceId',
                        ),
                        'BundleId' => array(
                            'type' => 'string',
                            'sentAs' => 'bundleId',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'StartTime' => array(
                            'type' => 'string',
                            'sentAs' => 'startTime',
                        ),
                        'UpdateTime' => array(
                            'type' => 'string',
                            'sentAs' => 'updateTime',
                        ),
                        'Storage' => array(
                            'type' => 'object',
                            'sentAs' => 'storage',
                            'properties' => array(
                                'S3' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Bucket' => array(
                                            'type' => 'string',
                                            'sentAs' => 'bucket',
                                        ),
                                        'Prefix' => array(
                                            'type' => 'string',
                                            'sentAs' => 'prefix',
                                        ),
                                        'AWSAccessKeyId' => array(
                                            'type' => 'string',
                                        ),
                                        'UploadPolicy' => array(
                                            'type' => 'string',
                                            'sentAs' => 'uploadPolicy',
                                        ),
                                        'UploadPolicySignature' => array(
                                            'type' => 'string',
                                            'sentAs' => 'uploadPolicySignature',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Progress' => array(
                            'type' => 'string',
                            'sentAs' => 'progress',
                        ),
                        'BundleTaskError' => array(
                            'type' => 'object',
                            'sentAs' => 'error',
                            'properties' => array(
                                'Code' => array(
                                    'type' => 'string',
                                    'sentAs' => 'code',
                                ),
                                'Message' => array(
                                    'type' => 'string',
                                    'sentAs' => 'message',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CancelBundleTaskResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'BundleTask' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'bundleInstanceTask',
                    'properties' => array(
                        'InstanceId' => array(
                            'type' => 'string',
                            'sentAs' => 'instanceId',
                        ),
                        'BundleId' => array(
                            'type' => 'string',
                            'sentAs' => 'bundleId',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'StartTime' => array(
                            'type' => 'string',
                            'sentAs' => 'startTime',
                        ),
                        'UpdateTime' => array(
                            'type' => 'string',
                            'sentAs' => 'updateTime',
                        ),
                        'Storage' => array(
                            'type' => 'object',
                            'sentAs' => 'storage',
                            'properties' => array(
                                'S3' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Bucket' => array(
                                            'type' => 'string',
                                            'sentAs' => 'bucket',
                                        ),
                                        'Prefix' => array(
                                            'type' => 'string',
                                            'sentAs' => 'prefix',
                                        ),
                                        'AWSAccessKeyId' => array(
                                            'type' => 'string',
                                        ),
                                        'UploadPolicy' => array(
                                            'type' => 'string',
                                            'sentAs' => 'uploadPolicy',
                                        ),
                                        'UploadPolicySignature' => array(
                                            'type' => 'string',
                                            'sentAs' => 'uploadPolicySignature',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Progress' => array(
                            'type' => 'string',
                            'sentAs' => 'progress',
                        ),
                        'BundleTaskError' => array(
                            'type' => 'object',
                            'sentAs' => 'error',
                            'properties' => array(
                                'Code' => array(
                                    'type' => 'string',
                                    'sentAs' => 'code',
                                ),
                                'Message' => array(
                                    'type' => 'string',
                                    'sentAs' => 'message',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ConfirmProductInstanceResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'OwnerId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'ownerId',
                ),
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'CopySnapshotResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'snapshotId',
                ),
            ),
        ),
        'CopyImageResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ImageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'imageId',
                ),
            ),
        ),
        'CreateCustomerGatewayResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CustomerGateway' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'customerGateway',
                    'properties' => array(
                        'CustomerGatewayId' => array(
                            'type' => 'string',
                            'sentAs' => 'customerGatewayId',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'Type' => array(
                            'type' => 'string',
                            'sentAs' => 'type',
                        ),
                        'IpAddress' => array(
                            'type' => 'string',
                            'sentAs' => 'ipAddress',
                        ),
                        'BgpAsn' => array(
                            'type' => 'string',
                            'sentAs' => 'bgpAsn',
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateDhcpOptionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DhcpOptions' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'dhcpOptions',
                    'properties' => array(
                        'DhcpOptionsId' => array(
                            'type' => 'string',
                            'sentAs' => 'dhcpOptionsId',
                        ),
                        'DhcpConfigurations' => array(
                            'type' => 'array',
                            'sentAs' => 'dhcpConfigurationSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Values' => array(
                                        'type' => 'array',
                                        'sentAs' => 'valueSet',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'string',
                                            'sentAs' => 'item',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateKeyPairResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'KeyName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'keyName',
                ),
                'KeyFingerprint' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'keyFingerprint',
                ),
                'KeyMaterial' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'keyMaterial',
                ),
            ),
        ),
        'CreateSecurityGroupResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GroupId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'groupId',
                ),
            ),
        ),
        'snapshot' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'snapshotId',
                ),
                'VolumeId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'volumeId',
                ),
                'State' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'status',
                ),
                'StateMessage' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'statusMessage',
                ),
                'StartTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'startTime',
                ),
                'Progress' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'progress',
                ),
                'OwnerId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'ownerId',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'description',
                ),
                'VolumeSize' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                    'sentAs' => 'volumeSize',
                ),
                'OwnerAlias' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'ownerAlias',
                ),
                'Encrypted' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'encrypted',
                ),
                'KmsKeyId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'kmsKeyId',
                ),
                'DataEncryptionKeyId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'dataEncryptionKeyId',
                ),
            ),
        ),
        'CreateSubnetResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Subnet' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'subnet',
                    'properties' => array(
                        'SubnetId' => array(
                            'type' => 'string',
                            'sentAs' => 'subnetId',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcId',
                        ),
                        'CidrBlock' => array(
                            'type' => 'string',
                            'sentAs' => 'cidrBlock',
                        ),
                        'AvailableIpAddressCount' => array(
                            'type' => 'numeric',
                            'sentAs' => 'availableIpAddressCount',
                        ),
                        'AvailabilityZone' => array(
                            'type' => 'string',
                            'sentAs' => 'availabilityZone',
                        ),
                        'DefaultForAz' => array(
                            'type' => 'boolean',
                            'sentAs' => 'defaultForAz',
                        ),
                        'MapPublicIpOnLaunch' => array(
                            'type' => 'boolean',
                            'sentAs' => 'mapPublicIpOnLaunch',
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'volume' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'volumeId',
                ),
                'Size' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                    'sentAs' => 'size',
                ),
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'snapshotId',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'availabilityZone',
                ),
                'State' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'status',
                ),
                'CreateTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'createTime',
                ),
                'Attachments' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'attachmentSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VolumeId' => array(
                                'type' => 'string',
                                'sentAs' => 'volumeId',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'Device' => array(
                                'type' => 'string',
                                'sentAs' => 'device',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'status',
                            ),
                            'AttachTime' => array(
                                'type' => 'string',
                                'sentAs' => 'attachTime',
                            ),
                            'DeleteOnTermination' => array(
                                'type' => 'boolean',
                                'sentAs' => 'deleteOnTermination',
                            ),
                        ),
                    ),
                ),
                'Tags' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'tagSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                                'sentAs' => 'key',
                            ),
                            'Value' => array(
                                'type' => 'string',
                                'sentAs' => 'value',
                            ),
                        ),
                    ),
                ),
                'VolumeType' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'volumeType',
                ),
                'Iops' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                    'sentAs' => 'iops',
                ),
                'Encrypted' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'encrypted',
                ),
                'KmsKeyId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'kmsKeyId',
                ),
            ),
        ),
        'CreateVpcResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Vpc' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'vpc',
                    'properties' => array(
                        'VpcId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcId',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'CidrBlock' => array(
                            'type' => 'string',
                            'sentAs' => 'cidrBlock',
                        ),
                        'DhcpOptionsId' => array(
                            'type' => 'string',
                            'sentAs' => 'dhcpOptionsId',
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                        'InstanceTenancy' => array(
                            'type' => 'string',
                            'sentAs' => 'instanceTenancy',
                        ),
                        'IsDefault' => array(
                            'type' => 'boolean',
                            'sentAs' => 'isDefault',
                        ),
                    ),
                ),
            ),
        ),
        'CreateVpnConnectionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpnConnection' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'vpnConnection',
                    'properties' => array(
                        'VpnConnectionId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpnConnectionId',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'CustomerGatewayConfiguration' => array(
                            'type' => 'string',
                            'sentAs' => 'customerGatewayConfiguration',
                        ),
                        'Type' => array(
                            'type' => 'string',
                            'sentAs' => 'type',
                        ),
                        'CustomerGatewayId' => array(
                            'type' => 'string',
                            'sentAs' => 'customerGatewayId',
                        ),
                        'VpnGatewayId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpnGatewayId',
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                        'VgwTelemetry' => array(
                            'type' => 'array',
                            'sentAs' => 'vgwTelemetry',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'OutsideIpAddress' => array(
                                        'type' => 'string',
                                        'sentAs' => 'outsideIpAddress',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                        'sentAs' => 'status',
                                    ),
                                    'LastStatusChange' => array(
                                        'type' => 'string',
                                        'sentAs' => 'lastStatusChange',
                                    ),
                                    'StatusMessage' => array(
                                        'type' => 'string',
                                        'sentAs' => 'statusMessage',
                                    ),
                                    'AcceptedRouteCount' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'acceptedRouteCount',
                                    ),
                                ),
                            ),
                        ),
                        'Options' => array(
                            'type' => 'object',
                            'sentAs' => 'options',
                            'properties' => array(
                                'StaticRoutesOnly' => array(
                                    'type' => 'boolean',
                                    'sentAs' => 'staticRoutesOnly',
                                ),
                            ),
                        ),
                        'Routes' => array(
                            'type' => 'array',
                            'sentAs' => 'routes',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'DestinationCidrBlock' => array(
                                        'type' => 'string',
                                        'sentAs' => 'destinationCidrBlock',
                                    ),
                                    'Source' => array(
                                        'type' => 'string',
                                        'sentAs' => 'source',
                                    ),
                                    'State' => array(
                                        'type' => 'string',
                                        'sentAs' => 'state',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateVpnGatewayResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpnGateway' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'vpnGateway',
                    'properties' => array(
                        'VpnGatewayId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpnGatewayId',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'Type' => array(
                            'type' => 'string',
                            'sentAs' => 'type',
                        ),
                        'AvailabilityZone' => array(
                            'type' => 'string',
                            'sentAs' => 'availabilityZone',
                        ),
                        'VpcAttachments' => array(
                            'type' => 'array',
                            'sentAs' => 'attachments',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'VpcId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'vpcId',
                                    ),
                                    'State' => array(
                                        'type' => 'string',
                                        'sentAs' => 'state',
                                    ),
                                ),
                            ),
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeAccountAttributesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AccountAttributes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'accountAttributeSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'AttributeName' => array(
                                'type' => 'string',
                                'sentAs' => 'attributeName',
                            ),
                            'AttributeValues' => array(
                                'type' => 'array',
                                'sentAs' => 'attributeValueSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'AttributeValue' => array(
                                            'type' => 'string',
                                            'sentAs' => 'attributeValue',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeAddressesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Addresses' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'addressesSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'PublicIp' => array(
                                'type' => 'string',
                                'sentAs' => 'publicIp',
                            ),
                            'AllocationId' => array(
                                'type' => 'string',
                                'sentAs' => 'allocationId',
                            ),
                            'AssociationId' => array(
                                'type' => 'string',
                                'sentAs' => 'associationId',
                            ),
                            'Domain' => array(
                                'type' => 'string',
                                'sentAs' => 'domain',
                            ),
                            'NetworkInterfaceId' => array(
                                'type' => 'string',
                                'sentAs' => 'networkInterfaceId',
                            ),
                            'NetworkInterfaceOwnerId' => array(
                                'type' => 'string',
                                'sentAs' => 'networkInterfaceOwnerId',
                            ),
                            'PrivateIpAddress' => array(
                                'type' => 'string',
                                'sentAs' => 'privateIpAddress',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeAvailabilityZonesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AvailabilityZones' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'availabilityZoneInfo',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ZoneName' => array(
                                'type' => 'string',
                                'sentAs' => 'zoneName',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'zoneState',
                            ),
                            'RegionName' => array(
                                'type' => 'string',
                                'sentAs' => 'regionName',
                            ),
                            'Messages' => array(
                                'type' => 'array',
                                'sentAs' => 'messageSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Message' => array(
                                            'type' => 'string',
                                            'sentAs' => 'message',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeBundleTasksResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'BundleTasks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'bundleInstanceTasksSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'BundleId' => array(
                                'type' => 'string',
                                'sentAs' => 'bundleId',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'StartTime' => array(
                                'type' => 'string',
                                'sentAs' => 'startTime',
                            ),
                            'UpdateTime' => array(
                                'type' => 'string',
                                'sentAs' => 'updateTime',
                            ),
                            'Storage' => array(
                                'type' => 'object',
                                'sentAs' => 'storage',
                                'properties' => array(
                                    'S3' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Bucket' => array(
                                                'type' => 'string',
                                                'sentAs' => 'bucket',
                                            ),
                                            'Prefix' => array(
                                                'type' => 'string',
                                                'sentAs' => 'prefix',
                                            ),
                                            'AWSAccessKeyId' => array(
                                                'type' => 'string',
                                            ),
                                            'UploadPolicy' => array(
                                                'type' => 'string',
                                                'sentAs' => 'uploadPolicy',
                                            ),
                                            'UploadPolicySignature' => array(
                                                'type' => 'string',
                                                'sentAs' => 'uploadPolicySignature',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Progress' => array(
                                'type' => 'string',
                                'sentAs' => 'progress',
                            ),
                            'BundleTaskError' => array(
                                'type' => 'object',
                                'sentAs' => 'error',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeCustomerGatewaysResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CustomerGateways' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'customerGatewaySet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'CustomerGatewayId' => array(
                                'type' => 'string',
                                'sentAs' => 'customerGatewayId',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'Type' => array(
                                'type' => 'string',
                                'sentAs' => 'type',
                            ),
                            'IpAddress' => array(
                                'type' => 'string',
                                'sentAs' => 'ipAddress',
                            ),
                            'BgpAsn' => array(
                                'type' => 'string',
                                'sentAs' => 'bgpAsn',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDhcpOptionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DhcpOptions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'dhcpOptionsSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'DhcpOptionsId' => array(
                                'type' => 'string',
                                'sentAs' => 'dhcpOptionsId',
                            ),
                            'DhcpConfigurations' => array(
                                'type' => 'array',
                                'sentAs' => 'dhcpConfigurationSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Values' => array(
                                            'type' => 'array',
                                            'sentAs' => 'valueSet',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'string',
                                                'sentAs' => 'item',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeIdFormatResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Statuses' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'statusSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'Resource' => array(
                                'type' => 'string',
                                'sentAs' => 'resource',
                            ),
                            'UseLongIds' => array(
                                'type' => 'boolean',
                                'sentAs' => 'useLongIds',
                            ),
                            'Deadline' => array(
                                'type' => 'string',
                                'sentAs' => 'deadline',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'imageAttribute' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ImageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'imageId',
                ),
                'LaunchPermissions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'launchPermission',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'UserId' => array(
                                'type' => 'string',
                                'sentAs' => 'userId',
                            ),
                            'Group' => array(
                                'type' => 'string',
                                'sentAs' => 'group',
                            ),
                        ),
                    ),
                ),
                'ProductCodes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'productCodes',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ProductCodeId' => array(
                                'type' => 'string',
                                'sentAs' => 'productCode',
                            ),
                            'ProductCodeType' => array(
                                'type' => 'string',
                                'sentAs' => 'type',
                            ),
                        ),
                    ),
                ),
                'KernelId' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'kernel',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'RamdiskId' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'ramdisk',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'Description' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'description',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'SriovNetSupport' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'sriovNetSupport',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'BlockDeviceMappings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'blockDeviceMapping',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VirtualName' => array(
                                'type' => 'string',
                                'sentAs' => 'virtualName',
                            ),
                            'DeviceName' => array(
                                'type' => 'string',
                                'sentAs' => 'deviceName',
                            ),
                            'Ebs' => array(
                                'type' => 'object',
                                'sentAs' => 'ebs',
                                'properties' => array(
                                    'SnapshotId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'snapshotId',
                                    ),
                                    'VolumeSize' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'volumeSize',
                                    ),
                                    'DeleteOnTermination' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'deleteOnTermination',
                                    ),
                                    'VolumeType' => array(
                                        'type' => 'string',
                                        'sentAs' => 'volumeType',
                                    ),
                                    'Iops' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'iops',
                                    ),
                                    'Encrypted' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'encrypted',
                                    ),
                                ),
                            ),
                            'NoDevice' => array(
                                'type' => 'string',
                                'sentAs' => 'noDevice',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeImagesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Images' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'imagesSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ImageId' => array(
                                'type' => 'string',
                                'sentAs' => 'imageId',
                            ),
                            'ImageLocation' => array(
                                'type' => 'string',
                                'sentAs' => 'imageLocation',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'imageState',
                            ),
                            'OwnerId' => array(
                                'type' => 'string',
                                'sentAs' => 'imageOwnerId',
                            ),
                            'CreationDate' => array(
                                'type' => 'string',
                                'sentAs' => 'creationDate',
                            ),
                            'Public' => array(
                                'type' => 'boolean',
                                'sentAs' => 'isPublic',
                            ),
                            'ProductCodes' => array(
                                'type' => 'array',
                                'sentAs' => 'productCodes',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'ProductCodeId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'productCode',
                                        ),
                                        'ProductCodeType' => array(
                                            'type' => 'string',
                                            'sentAs' => 'type',
                                        ),
                                    ),
                                ),
                            ),
                            'Architecture' => array(
                                'type' => 'string',
                                'sentAs' => 'architecture',
                            ),
                            'ImageType' => array(
                                'type' => 'string',
                                'sentAs' => 'imageType',
                            ),
                            'KernelId' => array(
                                'type' => 'string',
                                'sentAs' => 'kernelId',
                            ),
                            'RamdiskId' => array(
                                'type' => 'string',
                                'sentAs' => 'ramdiskId',
                            ),
                            'Platform' => array(
                                'type' => 'string',
                                'sentAs' => 'platform',
                            ),
                            'SriovNetSupport' => array(
                                'type' => 'string',
                                'sentAs' => 'sriovNetSupport',
                            ),
                            'StateReason' => array(
                                'type' => 'object',
                                'sentAs' => 'stateReason',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                            'ImageOwnerAlias' => array(
                                'type' => 'string',
                                'sentAs' => 'imageOwnerAlias',
                            ),
                            'Name' => array(
                                'type' => 'string',
                                'sentAs' => 'name',
                            ),
                            'Description' => array(
                                'type' => 'string',
                                'sentAs' => 'description',
                            ),
                            'RootDeviceType' => array(
                                'type' => 'string',
                                'sentAs' => 'rootDeviceType',
                            ),
                            'RootDeviceName' => array(
                                'type' => 'string',
                                'sentAs' => 'rootDeviceName',
                            ),
                            'BlockDeviceMappings' => array(
                                'type' => 'array',
                                'sentAs' => 'blockDeviceMapping',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'VirtualName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'virtualName',
                                        ),
                                        'DeviceName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'deviceName',
                                        ),
                                        'Ebs' => array(
                                            'type' => 'object',
                                            'sentAs' => 'ebs',
                                            'properties' => array(
                                                'SnapshotId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'snapshotId',
                                                ),
                                                'VolumeSize' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'volumeSize',
                                                ),
                                                'DeleteOnTermination' => array(
                                                    'type' => 'boolean',
                                                    'sentAs' => 'deleteOnTermination',
                                                ),
                                                'VolumeType' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'volumeType',
                                                ),
                                                'Iops' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'iops',
                                                ),
                                                'Encrypted' => array(
                                                    'type' => 'boolean',
                                                    'sentAs' => 'encrypted',
                                                ),
                                            ),
                                        ),
                                        'NoDevice' => array(
                                            'type' => 'string',
                                            'sentAs' => 'noDevice',
                                        ),
                                    ),
                                ),
                            ),
                            'VirtualizationType' => array(
                                'type' => 'string',
                                'sentAs' => 'virtualizationType',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'Hypervisor' => array(
                                'type' => 'string',
                                'sentAs' => 'hypervisor',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Reservations' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'reservationSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ReservationId' => array(
                                'type' => 'string',
                                'sentAs' => 'reservationId',
                            ),
                            'OwnerId' => array(
                                'type' => 'string',
                                'sentAs' => 'ownerId',
                            ),
                            'RequesterId' => array(
                                'type' => 'string',
                                'sentAs' => 'requesterId',
                            ),
                            'Groups' => array(
                                'type' => 'array',
                                'sentAs' => 'groupSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'GroupName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'groupName',
                                        ),
                                        'GroupId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'groupId',
                                        ),
                                    ),
                                ),
                            ),
                            'Instances' => array(
                                'type' => 'array',
                                'sentAs' => 'instancesSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'InstanceId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'instanceId',
                                        ),
                                        'ImageId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'imageId',
                                        ),
                                        'State' => array(
                                            'type' => 'object',
                                            'sentAs' => 'instanceState',
                                            'properties' => array(
                                                'Code' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'code',
                                                ),
                                                'Name' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'name',
                                                ),
                                            ),
                                        ),
                                        'PrivateDnsName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'privateDnsName',
                                        ),
                                        'PublicDnsName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'dnsName',
                                        ),
                                        'StateTransitionReason' => array(
                                            'type' => 'string',
                                            'sentAs' => 'reason',
                                        ),
                                        'KeyName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'keyName',
                                        ),
                                        'AmiLaunchIndex' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'amiLaunchIndex',
                                        ),
                                        'ProductCodes' => array(
                                            'type' => 'array',
                                            'sentAs' => 'productCodes',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'ProductCodeId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'productCode',
                                                    ),
                                                    'ProductCodeType' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'type',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'InstanceType' => array(
                                            'type' => 'string',
                                            'sentAs' => 'instanceType',
                                        ),
                                        'LaunchTime' => array(
                                            'type' => 'string',
                                            'sentAs' => 'launchTime',
                                        ),
                                        'Placement' => array(
                                            'type' => 'object',
                                            'sentAs' => 'placement',
                                            'properties' => array(
                                                'AvailabilityZone' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'availabilityZone',
                                                ),
                                                'GroupName' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'groupName',
                                                ),
                                                'Tenancy' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'tenancy',
                                                ),
                                                'HostId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'hostId',
                                                ),
                                                'Affinity' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'affinity',
                                                ),
                                            ),
                                        ),
                                        'KernelId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'kernelId',
                                        ),
                                        'RamdiskId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'ramdiskId',
                                        ),
                                        'Platform' => array(
                                            'type' => 'string',
                                            'sentAs' => 'platform',
                                        ),
                                        'Monitoring' => array(
                                            'type' => 'object',
                                            'sentAs' => 'monitoring',
                                            'properties' => array(
                                                'State' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'state',
                                                ),
                                            ),
                                        ),
                                        'SubnetId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'subnetId',
                                        ),
                                        'VpcId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'vpcId',
                                        ),
                                        'PrivateIpAddress' => array(
                                            'type' => 'string',
                                            'sentAs' => 'privateIpAddress',
                                        ),
                                        'PublicIpAddress' => array(
                                            'type' => 'string',
                                            'sentAs' => 'ipAddress',
                                        ),
                                        'StateReason' => array(
                                            'type' => 'object',
                                            'sentAs' => 'stateReason',
                                            'properties' => array(
                                                'Code' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'code',
                                                ),
                                                'Message' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'message',
                                                ),
                                            ),
                                        ),
                                        'Architecture' => array(
                                            'type' => 'string',
                                            'sentAs' => 'architecture',
                                        ),
                                        'RootDeviceType' => array(
                                            'type' => 'string',
                                            'sentAs' => 'rootDeviceType',
                                        ),
                                        'RootDeviceName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'rootDeviceName',
                                        ),
                                        'BlockDeviceMappings' => array(
                                            'type' => 'array',
                                            'sentAs' => 'blockDeviceMapping',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'DeviceName' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'deviceName',
                                                    ),
                                                    'Ebs' => array(
                                                        'type' => 'object',
                                                        'sentAs' => 'ebs',
                                                        'properties' => array(
                                                            'VolumeId' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'volumeId',
                                                            ),
                                                            'Status' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'status',
                                                            ),
                                                            'AttachTime' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'attachTime',
                                                            ),
                                                            'DeleteOnTermination' => array(
                                                                'type' => 'boolean',
                                                                'sentAs' => 'deleteOnTermination',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'VirtualizationType' => array(
                                            'type' => 'string',
                                            'sentAs' => 'virtualizationType',
                                        ),
                                        'InstanceLifecycle' => array(
                                            'type' => 'string',
                                            'sentAs' => 'instanceLifecycle',
                                        ),
                                        'SpotInstanceRequestId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'spotInstanceRequestId',
                                        ),
                                        'ClientToken' => array(
                                            'type' => 'string',
                                            'sentAs' => 'clientToken',
                                        ),
                                        'Tags' => array(
                                            'type' => 'array',
                                            'sentAs' => 'tagSet',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'Key' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'key',
                                                    ),
                                                    'Value' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'value',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'SecurityGroups' => array(
                                            'type' => 'array',
                                            'sentAs' => 'groupSet',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'GroupName' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'groupName',
                                                    ),
                                                    'GroupId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'groupId',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'SourceDestCheck' => array(
                                            'type' => 'boolean',
                                            'sentAs' => 'sourceDestCheck',
                                        ),
                                        'Hypervisor' => array(
                                            'type' => 'string',
                                            'sentAs' => 'hypervisor',
                                        ),
                                        'NetworkInterfaces' => array(
                                            'type' => 'array',
                                            'sentAs' => 'networkInterfaceSet',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'NetworkInterfaceId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'networkInterfaceId',
                                                    ),
                                                    'SubnetId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'subnetId',
                                                    ),
                                                    'VpcId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'vpcId',
                                                    ),
                                                    'Description' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'description',
                                                    ),
                                                    'OwnerId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'ownerId',
                                                    ),
                                                    'Status' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'status',
                                                    ),
                                                    'MacAddress' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'macAddress',
                                                    ),
                                                    'PrivateIpAddress' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'privateIpAddress',
                                                    ),
                                                    'PrivateDnsName' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'privateDnsName',
                                                    ),
                                                    'SourceDestCheck' => array(
                                                        'type' => 'boolean',
                                                        'sentAs' => 'sourceDestCheck',
                                                    ),
                                                    'Groups' => array(
                                                        'type' => 'array',
                                                        'sentAs' => 'groupSet',
                                                        'items' => array(
                                                            'name' => 'item',
                                                            'type' => 'object',
                                                            'sentAs' => 'item',
                                                            'properties' => array(
                                                                'GroupName' => array(
                                                                    'type' => 'string',
                                                                    'sentAs' => 'groupName',
                                                                ),
                                                                'GroupId' => array(
                                                                    'type' => 'string',
                                                                    'sentAs' => 'groupId',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                    'Attachment' => array(
                                                        'type' => 'object',
                                                        'sentAs' => 'attachment',
                                                        'properties' => array(
                                                            'AttachmentId' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'attachmentId',
                                                            ),
                                                            'DeviceIndex' => array(
                                                                'type' => 'numeric',
                                                                'sentAs' => 'deviceIndex',
                                                            ),
                                                            'Status' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'status',
                                                            ),
                                                            'AttachTime' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'attachTime',
                                                            ),
                                                            'DeleteOnTermination' => array(
                                                                'type' => 'boolean',
                                                                'sentAs' => 'deleteOnTermination',
                                                            ),
                                                        ),
                                                    ),
                                                    'Association' => array(
                                                        'type' => 'object',
                                                        'sentAs' => 'association',
                                                        'properties' => array(
                                                            'PublicIp' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'publicIp',
                                                            ),
                                                            'PublicDnsName' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'publicDnsName',
                                                            ),
                                                            'IpOwnerId' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'ipOwnerId',
                                                            ),
                                                        ),
                                                    ),
                                                    'PrivateIpAddresses' => array(
                                                        'type' => 'array',
                                                        'sentAs' => 'privateIpAddressesSet',
                                                        'items' => array(
                                                            'name' => 'item',
                                                            'type' => 'object',
                                                            'sentAs' => 'item',
                                                            'properties' => array(
                                                                'PrivateIpAddress' => array(
                                                                    'type' => 'string',
                                                                    'sentAs' => 'privateIpAddress',
                                                                ),
                                                                'PrivateDnsName' => array(
                                                                    'type' => 'string',
                                                                    'sentAs' => 'privateDnsName',
                                                                ),
                                                                'Primary' => array(
                                                                    'type' => 'boolean',
                                                                    'sentAs' => 'primary',
                                                                ),
                                                                'Association' => array(
                                                                    'type' => 'object',
                                                                    'sentAs' => 'association',
                                                                    'properties' => array(
                                                                        'PublicIp' => array(
                                                                            'type' => 'string',
                                                                            'sentAs' => 'publicIp',
                                                                        ),
                                                                        'PublicDnsName' => array(
                                                                            'type' => 'string',
                                                                            'sentAs' => 'publicDnsName',
                                                                        ),
                                                                        'IpOwnerId' => array(
                                                                            'type' => 'string',
                                                                            'sentAs' => 'ipOwnerId',
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'IamInstanceProfile' => array(
                                            'type' => 'object',
                                            'sentAs' => 'iamInstanceProfile',
                                            'properties' => array(
                                                'Arn' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'arn',
                                                ),
                                                'Id' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'id',
                                                ),
                                            ),
                                        ),
                                        'EbsOptimized' => array(
                                            'type' => 'boolean',
                                            'sentAs' => 'ebsOptimized',
                                        ),
                                        'SriovNetSupport' => array(
                                            'type' => 'string',
                                            'sentAs' => 'sriovNetSupport',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribeKeyPairsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'KeyPairs' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'keySet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'KeyName' => array(
                                'type' => 'string',
                                'sentAs' => 'keyName',
                            ),
                            'KeyFingerprint' => array(
                                'type' => 'string',
                                'sentAs' => 'keyFingerprint',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeRegionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Regions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'regionInfo',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'RegionName' => array(
                                'type' => 'string',
                                'sentAs' => 'regionName',
                            ),
                            'Endpoint' => array(
                                'type' => 'string',
                                'sentAs' => 'regionEndpoint',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeReservedInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedInstances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'reservedInstancesSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ReservedInstancesId' => array(
                                'type' => 'string',
                                'sentAs' => 'reservedInstancesId',
                            ),
                            'InstanceType' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceType',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'Start' => array(
                                'type' => 'string',
                                'sentAs' => 'start',
                            ),
                            'End' => array(
                                'type' => 'string',
                                'sentAs' => 'end',
                            ),
                            'Duration' => array(
                                'type' => 'numeric',
                                'sentAs' => 'duration',
                            ),
                            'UsagePrice' => array(
                                'type' => 'numeric',
                                'sentAs' => 'usagePrice',
                            ),
                            'FixedPrice' => array(
                                'type' => 'numeric',
                                'sentAs' => 'fixedPrice',
                            ),
                            'InstanceCount' => array(
                                'type' => 'numeric',
                                'sentAs' => 'instanceCount',
                            ),
                            'ProductDescription' => array(
                                'type' => 'string',
                                'sentAs' => 'productDescription',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'InstanceTenancy' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceTenancy',
                            ),
                            'CurrencyCode' => array(
                                'type' => 'string',
                                'sentAs' => 'currencyCode',
                            ),
                            'OfferingType' => array(
                                'type' => 'string',
                                'sentAs' => 'offeringType',
                            ),
                            'RecurringCharges' => array(
                                'type' => 'array',
                                'sentAs' => 'recurringCharges',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Frequency' => array(
                                            'type' => 'string',
                                            'sentAs' => 'frequency',
                                        ),
                                        'Amount' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'amount',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeReservedInstancesModificationsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedInstancesModifications' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'reservedInstancesModificationsSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ReservedInstancesModificationId' => array(
                                'type' => 'string',
                                'sentAs' => 'reservedInstancesModificationId',
                            ),
                            'ReservedInstancesIds' => array(
                                'type' => 'array',
                                'sentAs' => 'reservedInstancesSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'ReservedInstancesId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'reservedInstancesId',
                                        ),
                                    ),
                                ),
                            ),
                            'ModificationResults' => array(
                                'type' => 'array',
                                'sentAs' => 'modificationResultSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'ReservedInstancesId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'reservedInstancesId',
                                        ),
                                        'TargetConfiguration' => array(
                                            'type' => 'object',
                                            'sentAs' => 'targetConfiguration',
                                            'properties' => array(
                                                'AvailabilityZone' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'availabilityZone',
                                                ),
                                                'Platform' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'platform',
                                                ),
                                                'InstanceCount' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'instanceCount',
                                                ),
                                                'InstanceType' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'instanceType',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                                'sentAs' => 'createDate',
                            ),
                            'UpdateDate' => array(
                                'type' => 'string',
                                'sentAs' => 'updateDate',
                            ),
                            'EffectiveDate' => array(
                                'type' => 'string',
                                'sentAs' => 'effectiveDate',
                            ),
                            'Status' => array(
                                'type' => 'string',
                                'sentAs' => 'status',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'statusMessage',
                            ),
                            'ClientToken' => array(
                                'type' => 'string',
                                'sentAs' => 'clientToken',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribeReservedInstancesOfferingsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedInstancesOfferings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'reservedInstancesOfferingsSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ReservedInstancesOfferingId' => array(
                                'type' => 'string',
                                'sentAs' => 'reservedInstancesOfferingId',
                            ),
                            'InstanceType' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceType',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'Duration' => array(
                                'type' => 'numeric',
                                'sentAs' => 'duration',
                            ),
                            'UsagePrice' => array(
                                'type' => 'numeric',
                                'sentAs' => 'usagePrice',
                            ),
                            'FixedPrice' => array(
                                'type' => 'numeric',
                                'sentAs' => 'fixedPrice',
                            ),
                            'ProductDescription' => array(
                                'type' => 'string',
                                'sentAs' => 'productDescription',
                            ),
                            'InstanceTenancy' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceTenancy',
                            ),
                            'CurrencyCode' => array(
                                'type' => 'string',
                                'sentAs' => 'currencyCode',
                            ),
                            'OfferingType' => array(
                                'type' => 'string',
                                'sentAs' => 'offeringType',
                            ),
                            'RecurringCharges' => array(
                                'type' => 'array',
                                'sentAs' => 'recurringCharges',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Frequency' => array(
                                            'type' => 'string',
                                            'sentAs' => 'frequency',
                                        ),
                                        'Amount' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'amount',
                                        ),
                                    ),
                                ),
                            ),
                            'Marketplace' => array(
                                'type' => 'boolean',
                                'sentAs' => 'marketplace',
                            ),
                            'PricingDetails' => array(
                                'type' => 'array',
                                'sentAs' => 'pricingDetailsSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Price' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'price',
                                        ),
                                        'Count' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'count',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribeSecurityGroupsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'securityGroupInfo',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'OwnerId' => array(
                                'type' => 'string',
                                'sentAs' => 'ownerId',
                            ),
                            'GroupName' => array(
                                'type' => 'string',
                                'sentAs' => 'groupName',
                            ),
                            'GroupId' => array(
                                'type' => 'string',
                                'sentAs' => 'groupId',
                            ),
                            'Description' => array(
                                'type' => 'string',
                                'sentAs' => 'groupDescription',
                            ),
                            'IpPermissions' => array(
                                'type' => 'array',
                                'sentAs' => 'ipPermissions',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'IpProtocol' => array(
                                            'type' => 'string',
                                            'sentAs' => 'ipProtocol',
                                        ),
                                        'FromPort' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'fromPort',
                                        ),
                                        'ToPort' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'toPort',
                                        ),
                                        'UserIdGroupPairs' => array(
                                            'type' => 'array',
                                            'sentAs' => 'groups',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'UserId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'userId',
                                                    ),
                                                    'GroupName' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'groupName',
                                                    ),
                                                    'GroupId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'groupId',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'IpRanges' => array(
                                            'type' => 'array',
                                            'sentAs' => 'ipRanges',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'CidrIp' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'cidrIp',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'PrefixListIds' => array(
                                            'type' => 'array',
                                            'sentAs' => 'prefixListIds',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'PrefixListId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'prefixListId',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'IpPermissionsEgress' => array(
                                'type' => 'array',
                                'sentAs' => 'ipPermissionsEgress',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'IpProtocol' => array(
                                            'type' => 'string',
                                            'sentAs' => 'ipProtocol',
                                        ),
                                        'FromPort' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'fromPort',
                                        ),
                                        'ToPort' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'toPort',
                                        ),
                                        'UserIdGroupPairs' => array(
                                            'type' => 'array',
                                            'sentAs' => 'groups',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'UserId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'userId',
                                                    ),
                                                    'GroupName' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'groupName',
                                                    ),
                                                    'GroupId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'groupId',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'IpRanges' => array(
                                            'type' => 'array',
                                            'sentAs' => 'ipRanges',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'CidrIp' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'cidrIp',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'PrefixListIds' => array(
                                            'type' => 'array',
                                            'sentAs' => 'prefixListIds',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'PrefixListId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'prefixListId',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSnapshotAttributeResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'snapshotId',
                ),
                'CreateVolumePermissions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'createVolumePermission',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'UserId' => array(
                                'type' => 'string',
                                'sentAs' => 'userId',
                            ),
                            'Group' => array(
                                'type' => 'string',
                                'sentAs' => 'group',
                            ),
                        ),
                    ),
                ),
                'ProductCodes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'productCodes',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ProductCodeId' => array(
                                'type' => 'string',
                                'sentAs' => 'productCode',
                            ),
                            'ProductCodeType' => array(
                                'type' => 'string',
                                'sentAs' => 'type',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSnapshotsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Snapshots' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'snapshotSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'SnapshotId' => array(
                                'type' => 'string',
                                'sentAs' => 'snapshotId',
                            ),
                            'VolumeId' => array(
                                'type' => 'string',
                                'sentAs' => 'volumeId',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'status',
                            ),
                            'StateMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'statusMessage',
                            ),
                            'StartTime' => array(
                                'type' => 'string',
                                'sentAs' => 'startTime',
                            ),
                            'Progress' => array(
                                'type' => 'string',
                                'sentAs' => 'progress',
                            ),
                            'OwnerId' => array(
                                'type' => 'string',
                                'sentAs' => 'ownerId',
                            ),
                            'Description' => array(
                                'type' => 'string',
                                'sentAs' => 'description',
                            ),
                            'VolumeSize' => array(
                                'type' => 'numeric',
                                'sentAs' => 'volumeSize',
                            ),
                            'OwnerAlias' => array(
                                'type' => 'string',
                                'sentAs' => 'ownerAlias',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'Encrypted' => array(
                                'type' => 'boolean',
                                'sentAs' => 'encrypted',
                            ),
                            'KmsKeyId' => array(
                                'type' => 'string',
                                'sentAs' => 'kmsKeyId',
                            ),
                            'DataEncryptionKeyId' => array(
                                'type' => 'string',
                                'sentAs' => 'dataEncryptionKeyId',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribeSubnetsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Subnets' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'subnetSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'SubnetId' => array(
                                'type' => 'string',
                                'sentAs' => 'subnetId',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'CidrBlock' => array(
                                'type' => 'string',
                                'sentAs' => 'cidrBlock',
                            ),
                            'AvailableIpAddressCount' => array(
                                'type' => 'numeric',
                                'sentAs' => 'availableIpAddressCount',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'DefaultForAz' => array(
                                'type' => 'boolean',
                                'sentAs' => 'defaultForAz',
                            ),
                            'MapPublicIpOnLaunch' => array(
                                'type' => 'boolean',
                                'sentAs' => 'mapPublicIpOnLaunch',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeVolumeAttributeResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'volumeId',
                ),
                'AutoEnableIO' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'autoEnableIO',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'ProductCodes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'productCodes',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ProductCodeId' => array(
                                'type' => 'string',
                                'sentAs' => 'productCode',
                            ),
                            'ProductCodeType' => array(
                                'type' => 'string',
                                'sentAs' => 'type',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeVolumesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Volumes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'volumeSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VolumeId' => array(
                                'type' => 'string',
                                'sentAs' => 'volumeId',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                                'sentAs' => 'size',
                            ),
                            'SnapshotId' => array(
                                'type' => 'string',
                                'sentAs' => 'snapshotId',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'status',
                            ),
                            'CreateTime' => array(
                                'type' => 'string',
                                'sentAs' => 'createTime',
                            ),
                            'Attachments' => array(
                                'type' => 'array',
                                'sentAs' => 'attachmentSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'VolumeId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'volumeId',
                                        ),
                                        'InstanceId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'instanceId',
                                        ),
                                        'Device' => array(
                                            'type' => 'string',
                                            'sentAs' => 'device',
                                        ),
                                        'State' => array(
                                            'type' => 'string',
                                            'sentAs' => 'status',
                                        ),
                                        'AttachTime' => array(
                                            'type' => 'string',
                                            'sentAs' => 'attachTime',
                                        ),
                                        'DeleteOnTermination' => array(
                                            'type' => 'boolean',
                                            'sentAs' => 'deleteOnTermination',
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'VolumeType' => array(
                                'type' => 'string',
                                'sentAs' => 'volumeType',
                            ),
                            'Iops' => array(
                                'type' => 'numeric',
                                'sentAs' => 'iops',
                            ),
                            'Encrypted' => array(
                                'type' => 'boolean',
                                'sentAs' => 'encrypted',
                            ),
                            'KmsKeyId' => array(
                                'type' => 'string',
                                'sentAs' => 'kmsKeyId',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribeVolumeStatusResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeStatuses' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'volumeStatusSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VolumeId' => array(
                                'type' => 'string',
                                'sentAs' => 'volumeId',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'VolumeStatus' => array(
                                'type' => 'object',
                                'sentAs' => 'volumeStatus',
                                'properties' => array(
                                    'Status' => array(
                                        'type' => 'string',
                                        'sentAs' => 'status',
                                    ),
                                    'Details' => array(
                                        'type' => 'array',
                                        'sentAs' => 'details',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'Name' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'name',
                                                ),
                                                'Status' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'status',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Events' => array(
                                'type' => 'array',
                                'sentAs' => 'eventsSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'EventType' => array(
                                            'type' => 'string',
                                            'sentAs' => 'eventType',
                                        ),
                                        'Description' => array(
                                            'type' => 'string',
                                            'sentAs' => 'description',
                                        ),
                                        'NotBefore' => array(
                                            'type' => 'string',
                                            'sentAs' => 'notBefore',
                                        ),
                                        'NotAfter' => array(
                                            'type' => 'string',
                                            'sentAs' => 'notAfter',
                                        ),
                                        'EventId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'eventId',
                                        ),
                                    ),
                                ),
                            ),
                            'Actions' => array(
                                'type' => 'array',
                                'sentAs' => 'actionsSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Code' => array(
                                            'type' => 'string',
                                            'sentAs' => 'code',
                                        ),
                                        'Description' => array(
                                            'type' => 'string',
                                            'sentAs' => 'description',
                                        ),
                                        'EventType' => array(
                                            'type' => 'string',
                                            'sentAs' => 'eventType',
                                        ),
                                        'EventId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'eventId',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribeVpcAttributeResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpcId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'vpcId',
                ),
                'EnableDnsSupport' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'enableDnsSupport',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'EnableDnsHostnames' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'enableDnsHostnames',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeVpcsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Vpcs' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'vpcSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'CidrBlock' => array(
                                'type' => 'string',
                                'sentAs' => 'cidrBlock',
                            ),
                            'DhcpOptionsId' => array(
                                'type' => 'string',
                                'sentAs' => 'dhcpOptionsId',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'InstanceTenancy' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceTenancy',
                            ),
                            'IsDefault' => array(
                                'type' => 'boolean',
                                'sentAs' => 'isDefault',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeVpnConnectionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpnConnections' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'vpnConnectionSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VpnConnectionId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpnConnectionId',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'CustomerGatewayConfiguration' => array(
                                'type' => 'string',
                                'sentAs' => 'customerGatewayConfiguration',
                            ),
                            'Type' => array(
                                'type' => 'string',
                                'sentAs' => 'type',
                            ),
                            'CustomerGatewayId' => array(
                                'type' => 'string',
                                'sentAs' => 'customerGatewayId',
                            ),
                            'VpnGatewayId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpnGatewayId',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'VgwTelemetry' => array(
                                'type' => 'array',
                                'sentAs' => 'vgwTelemetry',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'OutsideIpAddress' => array(
                                            'type' => 'string',
                                            'sentAs' => 'outsideIpAddress',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                            'sentAs' => 'status',
                                        ),
                                        'LastStatusChange' => array(
                                            'type' => 'string',
                                            'sentAs' => 'lastStatusChange',
                                        ),
                                        'StatusMessage' => array(
                                            'type' => 'string',
                                            'sentAs' => 'statusMessage',
                                        ),
                                        'AcceptedRouteCount' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'acceptedRouteCount',
                                        ),
                                    ),
                                ),
                            ),
                            'Options' => array(
                                'type' => 'object',
                                'sentAs' => 'options',
                                'properties' => array(
                                    'StaticRoutesOnly' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'staticRoutesOnly',
                                    ),
                                ),
                            ),
                            'Routes' => array(
                                'type' => 'array',
                                'sentAs' => 'routes',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'DestinationCidrBlock' => array(
                                            'type' => 'string',
                                            'sentAs' => 'destinationCidrBlock',
                                        ),
                                        'Source' => array(
                                            'type' => 'string',
                                            'sentAs' => 'source',
                                        ),
                                        'State' => array(
                                            'type' => 'string',
                                            'sentAs' => 'state',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeVpnGatewaysResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpnGateways' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'vpnGatewaySet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VpnGatewayId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpnGatewayId',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'Type' => array(
                                'type' => 'string',
                                'sentAs' => 'type',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'VpcAttachments' => array(
                                'type' => 'array',
                                'sentAs' => 'attachments',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'VpcId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'vpcId',
                                        ),
                                        'State' => array(
                                            'type' => 'string',
                                            'sentAs' => 'state',
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetConsoleOutputResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'instanceId',
                ),
                'Timestamp' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'timestamp',
                ),
                'Output' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'output',
                ),
            ),
        ),
        'GetPasswordDataResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'instanceId',
                ),
                'Timestamp' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'timestamp',
                ),
                'PasswordData' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'passwordData',
                ),
            ),
        ),
        'ImportKeyPairResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'KeyName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'keyName',
                ),
                'KeyFingerprint' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'keyFingerprint',
                ),
            ),
        ),
        'ModifyReservedInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedInstancesModificationId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'reservedInstancesModificationId',
                ),
            ),
        ),
        'MonitorInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceMonitorings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'instancesSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'Monitoring' => array(
                                'type' => 'object',
                                'sentAs' => 'monitoring',
                                'properties' => array(
                                    'State' => array(
                                        'type' => 'string',
                                        'sentAs' => 'state',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'PurchaseReservedInstancesOfferingResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedInstancesId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'reservedInstancesId',
                ),
            ),
        ),
        'RegisterImageResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ImageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'imageId',
                ),
            ),
        ),
        'reservation' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservationId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'reservationId',
                ),
                'OwnerId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'ownerId',
                ),
                'RequesterId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'requesterId',
                ),
                'Groups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'groupSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'GroupName' => array(
                                'type' => 'string',
                                'sentAs' => 'groupName',
                            ),
                            'GroupId' => array(
                                'type' => 'string',
                                'sentAs' => 'groupId',
                            ),
                        ),
                    ),
                ),
                'Instances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'instancesSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'ImageId' => array(
                                'type' => 'string',
                                'sentAs' => 'imageId',
                            ),
                            'State' => array(
                                'type' => 'object',
                                'sentAs' => 'instanceState',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'code',
                                    ),
                                    'Name' => array(
                                        'type' => 'string',
                                        'sentAs' => 'name',
                                    ),
                                ),
                            ),
                            'PrivateDnsName' => array(
                                'type' => 'string',
                                'sentAs' => 'privateDnsName',
                            ),
                            'PublicDnsName' => array(
                                'type' => 'string',
                                'sentAs' => 'dnsName',
                            ),
                            'StateTransitionReason' => array(
                                'type' => 'string',
                                'sentAs' => 'reason',
                            ),
                            'KeyName' => array(
                                'type' => 'string',
                                'sentAs' => 'keyName',
                            ),
                            'AmiLaunchIndex' => array(
                                'type' => 'numeric',
                                'sentAs' => 'amiLaunchIndex',
                            ),
                            'ProductCodes' => array(
                                'type' => 'array',
                                'sentAs' => 'productCodes',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'ProductCodeId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'productCode',
                                        ),
                                        'ProductCodeType' => array(
                                            'type' => 'string',
                                            'sentAs' => 'type',
                                        ),
                                    ),
                                ),
                            ),
                            'InstanceType' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceType',
                            ),
                            'LaunchTime' => array(
                                'type' => 'string',
                                'sentAs' => 'launchTime',
                            ),
                            'Placement' => array(
                                'type' => 'object',
                                'sentAs' => 'placement',
                                'properties' => array(
                                    'AvailabilityZone' => array(
                                        'type' => 'string',
                                        'sentAs' => 'availabilityZone',
                                    ),
                                    'GroupName' => array(
                                        'type' => 'string',
                                        'sentAs' => 'groupName',
                                    ),
                                    'Tenancy' => array(
                                        'type' => 'string',
                                        'sentAs' => 'tenancy',
                                    ),
                                    'HostId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'hostId',
                                    ),
                                    'Affinity' => array(
                                        'type' => 'string',
                                        'sentAs' => 'affinity',
                                    ),
                                ),
                            ),
                            'KernelId' => array(
                                'type' => 'string',
                                'sentAs' => 'kernelId',
                            ),
                            'RamdiskId' => array(
                                'type' => 'string',
                                'sentAs' => 'ramdiskId',
                            ),
                            'Platform' => array(
                                'type' => 'string',
                                'sentAs' => 'platform',
                            ),
                            'Monitoring' => array(
                                'type' => 'object',
                                'sentAs' => 'monitoring',
                                'properties' => array(
                                    'State' => array(
                                        'type' => 'string',
                                        'sentAs' => 'state',
                                    ),
                                ),
                            ),
                            'SubnetId' => array(
                                'type' => 'string',
                                'sentAs' => 'subnetId',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'PrivateIpAddress' => array(
                                'type' => 'string',
                                'sentAs' => 'privateIpAddress',
                            ),
                            'PublicIpAddress' => array(
                                'type' => 'string',
                                'sentAs' => 'ipAddress',
                            ),
                            'StateReason' => array(
                                'type' => 'object',
                                'sentAs' => 'stateReason',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                            'Architecture' => array(
                                'type' => 'string',
                                'sentAs' => 'architecture',
                            ),
                            'RootDeviceType' => array(
                                'type' => 'string',
                                'sentAs' => 'rootDeviceType',
                            ),
                            'RootDeviceName' => array(
                                'type' => 'string',
                                'sentAs' => 'rootDeviceName',
                            ),
                            'BlockDeviceMappings' => array(
                                'type' => 'array',
                                'sentAs' => 'blockDeviceMapping',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'DeviceName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'deviceName',
                                        ),
                                        'Ebs' => array(
                                            'type' => 'object',
                                            'sentAs' => 'ebs',
                                            'properties' => array(
                                                'VolumeId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'volumeId',
                                                ),
                                                'Status' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'status',
                                                ),
                                                'AttachTime' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'attachTime',
                                                ),
                                                'DeleteOnTermination' => array(
                                                    'type' => 'boolean',
                                                    'sentAs' => 'deleteOnTermination',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'VirtualizationType' => array(
                                'type' => 'string',
                                'sentAs' => 'virtualizationType',
                            ),
                            'InstanceLifecycle' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceLifecycle',
                            ),
                            'SpotInstanceRequestId' => array(
                                'type' => 'string',
                                'sentAs' => 'spotInstanceRequestId',
                            ),
                            'ClientToken' => array(
                                'type' => 'string',
                                'sentAs' => 'clientToken',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'SecurityGroups' => array(
                                'type' => 'array',
                                'sentAs' => 'groupSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'GroupName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'groupName',
                                        ),
                                        'GroupId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'groupId',
                                        ),
                                    ),
                                ),
                            ),
                            'SourceDestCheck' => array(
                                'type' => 'boolean',
                                'sentAs' => 'sourceDestCheck',
                            ),
                            'Hypervisor' => array(
                                'type' => 'string',
                                'sentAs' => 'hypervisor',
                            ),
                            'NetworkInterfaces' => array(
                                'type' => 'array',
                                'sentAs' => 'networkInterfaceSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'NetworkInterfaceId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'networkInterfaceId',
                                        ),
                                        'SubnetId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'subnetId',
                                        ),
                                        'VpcId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'vpcId',
                                        ),
                                        'Description' => array(
                                            'type' => 'string',
                                            'sentAs' => 'description',
                                        ),
                                        'OwnerId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'ownerId',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                            'sentAs' => 'status',
                                        ),
                                        'MacAddress' => array(
                                            'type' => 'string',
                                            'sentAs' => 'macAddress',
                                        ),
                                        'PrivateIpAddress' => array(
                                            'type' => 'string',
                                            'sentAs' => 'privateIpAddress',
                                        ),
                                        'PrivateDnsName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'privateDnsName',
                                        ),
                                        'SourceDestCheck' => array(
                                            'type' => 'boolean',
                                            'sentAs' => 'sourceDestCheck',
                                        ),
                                        'Groups' => array(
                                            'type' => 'array',
                                            'sentAs' => 'groupSet',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'GroupName' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'groupName',
                                                    ),
                                                    'GroupId' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'groupId',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'Attachment' => array(
                                            'type' => 'object',
                                            'sentAs' => 'attachment',
                                            'properties' => array(
                                                'AttachmentId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'attachmentId',
                                                ),
                                                'DeviceIndex' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'deviceIndex',
                                                ),
                                                'Status' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'status',
                                                ),
                                                'AttachTime' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'attachTime',
                                                ),
                                                'DeleteOnTermination' => array(
                                                    'type' => 'boolean',
                                                    'sentAs' => 'deleteOnTermination',
                                                ),
                                            ),
                                        ),
                                        'Association' => array(
                                            'type' => 'object',
                                            'sentAs' => 'association',
                                            'properties' => array(
                                                'PublicIp' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'publicIp',
                                                ),
                                                'PublicDnsName' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'publicDnsName',
                                                ),
                                                'IpOwnerId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'ipOwnerId',
                                                ),
                                            ),
                                        ),
                                        'PrivateIpAddresses' => array(
                                            'type' => 'array',
                                            'sentAs' => 'privateIpAddressesSet',
                                            'items' => array(
                                                'name' => 'item',
                                                'type' => 'object',
                                                'sentAs' => 'item',
                                                'properties' => array(
                                                    'PrivateIpAddress' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'privateIpAddress',
                                                    ),
                                                    'PrivateDnsName' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'privateDnsName',
                                                    ),
                                                    'Primary' => array(
                                                        'type' => 'boolean',
                                                        'sentAs' => 'primary',
                                                    ),
                                                    'Association' => array(
                                                        'type' => 'object',
                                                        'sentAs' => 'association',
                                                        'properties' => array(
                                                            'PublicIp' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'publicIp',
                                                            ),
                                                            'PublicDnsName' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'publicDnsName',
                                                            ),
                                                            'IpOwnerId' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'ipOwnerId',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'IamInstanceProfile' => array(
                                'type' => 'object',
                                'sentAs' => 'iamInstanceProfile',
                                'properties' => array(
                                    'Arn' => array(
                                        'type' => 'string',
                                        'sentAs' => 'arn',
                                    ),
                                    'Id' => array(
                                        'type' => 'string',
                                        'sentAs' => 'id',
                                    ),
                                ),
                            ),
                            'EbsOptimized' => array(
                                'type' => 'boolean',
                                'sentAs' => 'ebsOptimized',
                            ),
                            'SriovNetSupport' => array(
                                'type' => 'string',
                                'sentAs' => 'sriovNetSupport',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'TerminateInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TerminatingInstances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'instancesSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'CurrentState' => array(
                                'type' => 'object',
                                'sentAs' => 'currentState',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'code',
                                    ),
                                    'Name' => array(
                                        'type' => 'string',
                                        'sentAs' => 'name',
                                    ),
                                ),
                            ),
                            'PreviousState' => array(
                                'type' => 'object',
                                'sentAs' => 'previousState',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'code',
                                    ),
                                    'Name' => array(
                                        'type' => 'string',
                                        'sentAs' => 'name',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UnmonitorInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceMonitorings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'instancesSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'Monitoring' => array(
                                'type' => 'object',
                                'sentAs' => 'monitoring',
                                'properties' => array(
                                    'State' => array(
                                        'type' => 'string',
                                        'sentAs' => 'state',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateImageResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ImageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'imageId',
                ),
            ),
        ),
        'StartInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StartingInstances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'instancesSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'CurrentState' => array(
                                'type' => 'object',
                                'sentAs' => 'currentState',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'code',
                                    ),
                                    'Name' => array(
                                        'type' => 'string',
                                        'sentAs' => 'name',
                                    ),
                                ),
                            ),
                            'PreviousState' => array(
                                'type' => 'object',
                                'sentAs' => 'previousState',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'code',
                                    ),
                                    'Name' => array(
                                        'type' => 'string',
                                        'sentAs' => 'name',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'StopInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StoppingInstances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'instancesSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'CurrentState' => array(
                                'type' => 'object',
                                'sentAs' => 'currentState',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'code',
                                    ),
                                    'Name' => array(
                                        'type' => 'string',
                                        'sentAs' => 'name',
                                    ),
                                ),
                            ),
                            'PreviousState' => array(
                                'type' => 'object',
                                'sentAs' => 'previousState',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'code',
                                    ),
                                    'Name' => array(
                                        'type' => 'string',
                                        'sentAs' => 'name',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'InstanceAttribute' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'instanceId',
                ),
                'InstanceType' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'instanceType',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'KernelId' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'kernel',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'RamdiskId' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'ramdisk',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'UserData' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'userData',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'DisableApiTermination' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'disableApiTermination',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'InstanceInitiatedShutdownBehavior' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'instanceInitiatedShutdownBehavior',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'RootDeviceName' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'rootDeviceName',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'BlockDeviceMappings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'blockDeviceMapping',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'DeviceName' => array(
                                'type' => 'string',
                                'sentAs' => 'deviceName',
                            ),
                            'Ebs' => array(
                                'type' => 'object',
                                'sentAs' => 'ebs',
                                'properties' => array(
                                    'VolumeId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'volumeId',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                        'sentAs' => 'status',
                                    ),
                                    'AttachTime' => array(
                                        'type' => 'string',
                                        'sentAs' => 'attachTime',
                                    ),
                                    'DeleteOnTermination' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'deleteOnTermination',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ProductCodes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'productCodes',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ProductCodeId' => array(
                                'type' => 'string',
                                'sentAs' => 'productCode',
                            ),
                            'ProductCodeType' => array(
                                'type' => 'string',
                                'sentAs' => 'type',
                            ),
                        ),
                    ),
                ),
                'EbsOptimized' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'ebsOptimized',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'SriovNetSupport' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'sriovNetSupport',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'SourceDestCheck' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'sourceDestCheck',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'Groups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'groupSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'GroupName' => array(
                                'type' => 'string',
                                'sentAs' => 'groupName',
                            ),
                            'GroupId' => array(
                                'type' => 'string',
                                'sentAs' => 'groupId',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RequestSpotInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SpotInstanceRequests' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'spotInstanceRequestSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'SpotInstanceRequestId' => array(
                                'type' => 'string',
                                'sentAs' => 'spotInstanceRequestId',
                            ),
                            'SpotPrice' => array(
                                'type' => 'string',
                                'sentAs' => 'spotPrice',
                            ),
                            'Type' => array(
                                'type' => 'string',
                                'sentAs' => 'type',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'Fault' => array(
                                'type' => 'object',
                                'sentAs' => 'fault',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                            'Status' => array(
                                'type' => 'object',
                                'sentAs' => 'status',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'UpdateTime' => array(
                                        'type' => 'string',
                                        'sentAs' => 'updateTime',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                            'ValidFrom' => array(
                                'type' => 'string',
                                'sentAs' => 'validFrom',
                            ),
                            'ValidUntil' => array(
                                'type' => 'string',
                                'sentAs' => 'validUntil',
                            ),
                            'LaunchGroup' => array(
                                'type' => 'string',
                                'sentAs' => 'launchGroup',
                            ),
                            'AvailabilityZoneGroup' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZoneGroup',
                            ),
                            'LaunchSpecification' => array(
                                'type' => 'object',
                                'sentAs' => 'launchSpecification',
                                'properties' => array(
                                    'ImageId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'imageId',
                                    ),
                                    'KeyName' => array(
                                        'type' => 'string',
                                        'sentAs' => 'keyName',
                                    ),
                                    'SecurityGroups' => array(
                                        'type' => 'array',
                                        'sentAs' => 'groupSet',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'GroupName' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'groupName',
                                                ),
                                                'GroupId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'groupId',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'UserData' => array(
                                        'type' => 'string',
                                        'sentAs' => 'userData',
                                    ),
                                    'AddressingType' => array(
                                        'type' => 'string',
                                        'sentAs' => 'addressingType',
                                    ),
                                    'InstanceType' => array(
                                        'type' => 'string',
                                        'sentAs' => 'instanceType',
                                    ),
                                    'Placement' => array(
                                        'type' => 'object',
                                        'sentAs' => 'placement',
                                        'properties' => array(
                                            'AvailabilityZone' => array(
                                                'type' => 'string',
                                                'sentAs' => 'availabilityZone',
                                            ),
                                            'GroupName' => array(
                                                'type' => 'string',
                                                'sentAs' => 'groupName',
                                            ),
                                        ),
                                    ),
                                    'KernelId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'kernelId',
                                    ),
                                    'RamdiskId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'ramdiskId',
                                    ),
                                    'BlockDeviceMappings' => array(
                                        'type' => 'array',
                                        'sentAs' => 'blockDeviceMapping',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'VirtualName' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'virtualName',
                                                ),
                                                'DeviceName' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'deviceName',
                                                ),
                                                'Ebs' => array(
                                                    'type' => 'object',
                                                    'sentAs' => 'ebs',
                                                    'properties' => array(
                                                        'SnapshotId' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'snapshotId',
                                                        ),
                                                        'VolumeSize' => array(
                                                            'type' => 'numeric',
                                                            'sentAs' => 'volumeSize',
                                                        ),
                                                        'DeleteOnTermination' => array(
                                                            'type' => 'boolean',
                                                            'sentAs' => 'deleteOnTermination',
                                                        ),
                                                        'VolumeType' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'volumeType',
                                                        ),
                                                        'Iops' => array(
                                                            'type' => 'numeric',
                                                            'sentAs' => 'iops',
                                                        ),
                                                        'Encrypted' => array(
                                                            'type' => 'boolean',
                                                            'sentAs' => 'encrypted',
                                                        ),
                                                    ),
                                                ),
                                                'NoDevice' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'noDevice',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'MonitoringEnabled' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'monitoringEnabled',
                                    ),
                                    'SubnetId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'subnetId',
                                    ),
                                    'NetworkInterfaces' => array(
                                        'type' => 'array',
                                        'sentAs' => 'networkInterfaceSet',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'NetworkInterfaceId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'networkInterfaceId',
                                                ),
                                                'DeviceIndex' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'deviceIndex',
                                                ),
                                                'SubnetId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'subnetId',
                                                ),
                                                'Description' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'description',
                                                ),
                                                'PrivateIpAddress' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'privateIpAddress',
                                                ),
                                                'Groups' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'SecurityGroupId',
                                                    'items' => array(
                                                        'name' => 'SecurityGroupId',
                                                        'type' => 'string',
                                                        'sentAs' => 'SecurityGroupId',
                                                    ),
                                                ),
                                                'DeleteOnTermination' => array(
                                                    'type' => 'boolean',
                                                    'sentAs' => 'deleteOnTermination',
                                                ),
                                                'PrivateIpAddresses' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'privateIpAddressesSet',
                                                    'items' => array(
                                                        'name' => 'item',
                                                        'type' => 'object',
                                                        'sentAs' => 'item',
                                                        'properties' => array(
                                                            'PrivateIpAddress' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'privateIpAddress',
                                                            ),
                                                            'Primary' => array(
                                                                'type' => 'boolean',
                                                                'sentAs' => 'primary',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'SecondaryPrivateIpAddressCount' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'secondaryPrivateIpAddressCount',
                                                ),
                                                'AssociatePublicIpAddress' => array(
                                                    'type' => 'boolean',
                                                    'sentAs' => 'associatePublicIpAddress',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IamInstanceProfile' => array(
                                        'type' => 'object',
                                        'sentAs' => 'iamInstanceProfile',
                                        'properties' => array(
                                            'Arn' => array(
                                                'type' => 'string',
                                                'sentAs' => 'arn',
                                            ),
                                            'Name' => array(
                                                'type' => 'string',
                                                'sentAs' => 'name',
                                            ),
                                        ),
                                    ),
                                    'EbsOptimized' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'ebsOptimized',
                                    ),
                                ),
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'CreateTime' => array(
                                'type' => 'string',
                                'sentAs' => 'createTime',
                            ),
                            'ProductDescription' => array(
                                'type' => 'string',
                                'sentAs' => 'productDescription',
                            ),
                            'BlockDurationMinutes' => array(
                                'type' => 'numeric',
                                'sentAs' => 'blockDurationMinutes',
                            ),
                            'ActualBlockHourlyPrice' => array(
                                'type' => 'string',
                                'sentAs' => 'actualBlockHourlyPrice',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'LaunchedAvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'launchedAvailabilityZone',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSpotInstanceRequestsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SpotInstanceRequests' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'spotInstanceRequestSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'SpotInstanceRequestId' => array(
                                'type' => 'string',
                                'sentAs' => 'spotInstanceRequestId',
                            ),
                            'SpotPrice' => array(
                                'type' => 'string',
                                'sentAs' => 'spotPrice',
                            ),
                            'Type' => array(
                                'type' => 'string',
                                'sentAs' => 'type',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'Fault' => array(
                                'type' => 'object',
                                'sentAs' => 'fault',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                            'Status' => array(
                                'type' => 'object',
                                'sentAs' => 'status',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'UpdateTime' => array(
                                        'type' => 'string',
                                        'sentAs' => 'updateTime',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                            'ValidFrom' => array(
                                'type' => 'string',
                                'sentAs' => 'validFrom',
                            ),
                            'ValidUntil' => array(
                                'type' => 'string',
                                'sentAs' => 'validUntil',
                            ),
                            'LaunchGroup' => array(
                                'type' => 'string',
                                'sentAs' => 'launchGroup',
                            ),
                            'AvailabilityZoneGroup' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZoneGroup',
                            ),
                            'LaunchSpecification' => array(
                                'type' => 'object',
                                'sentAs' => 'launchSpecification',
                                'properties' => array(
                                    'ImageId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'imageId',
                                    ),
                                    'KeyName' => array(
                                        'type' => 'string',
                                        'sentAs' => 'keyName',
                                    ),
                                    'SecurityGroups' => array(
                                        'type' => 'array',
                                        'sentAs' => 'groupSet',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'GroupName' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'groupName',
                                                ),
                                                'GroupId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'groupId',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'UserData' => array(
                                        'type' => 'string',
                                        'sentAs' => 'userData',
                                    ),
                                    'AddressingType' => array(
                                        'type' => 'string',
                                        'sentAs' => 'addressingType',
                                    ),
                                    'InstanceType' => array(
                                        'type' => 'string',
                                        'sentAs' => 'instanceType',
                                    ),
                                    'Placement' => array(
                                        'type' => 'object',
                                        'sentAs' => 'placement',
                                        'properties' => array(
                                            'AvailabilityZone' => array(
                                                'type' => 'string',
                                                'sentAs' => 'availabilityZone',
                                            ),
                                            'GroupName' => array(
                                                'type' => 'string',
                                                'sentAs' => 'groupName',
                                            ),
                                        ),
                                    ),
                                    'KernelId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'kernelId',
                                    ),
                                    'RamdiskId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'ramdiskId',
                                    ),
                                    'BlockDeviceMappings' => array(
                                        'type' => 'array',
                                        'sentAs' => 'blockDeviceMapping',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'VirtualName' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'virtualName',
                                                ),
                                                'DeviceName' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'deviceName',
                                                ),
                                                'Ebs' => array(
                                                    'type' => 'object',
                                                    'sentAs' => 'ebs',
                                                    'properties' => array(
                                                        'SnapshotId' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'snapshotId',
                                                        ),
                                                        'VolumeSize' => array(
                                                            'type' => 'numeric',
                                                            'sentAs' => 'volumeSize',
                                                        ),
                                                        'DeleteOnTermination' => array(
                                                            'type' => 'boolean',
                                                            'sentAs' => 'deleteOnTermination',
                                                        ),
                                                        'VolumeType' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'volumeType',
                                                        ),
                                                        'Iops' => array(
                                                            'type' => 'numeric',
                                                            'sentAs' => 'iops',
                                                        ),
                                                        'Encrypted' => array(
                                                            'type' => 'boolean',
                                                            'sentAs' => 'encrypted',
                                                        ),
                                                    ),
                                                ),
                                                'NoDevice' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'noDevice',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'MonitoringEnabled' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'monitoringEnabled',
                                    ),
                                    'SubnetId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'subnetId',
                                    ),
                                    'NetworkInterfaces' => array(
                                        'type' => 'array',
                                        'sentAs' => 'networkInterfaceSet',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'NetworkInterfaceId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'networkInterfaceId',
                                                ),
                                                'DeviceIndex' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'deviceIndex',
                                                ),
                                                'SubnetId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'subnetId',
                                                ),
                                                'Description' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'description',
                                                ),
                                                'PrivateIpAddress' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'privateIpAddress',
                                                ),
                                                'Groups' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'SecurityGroupId',
                                                    'items' => array(
                                                        'name' => 'SecurityGroupId',
                                                        'type' => 'string',
                                                        'sentAs' => 'SecurityGroupId',
                                                    ),
                                                ),
                                                'DeleteOnTermination' => array(
                                                    'type' => 'boolean',
                                                    'sentAs' => 'deleteOnTermination',
                                                ),
                                                'PrivateIpAddresses' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'privateIpAddressesSet',
                                                    'items' => array(
                                                        'name' => 'item',
                                                        'type' => 'object',
                                                        'sentAs' => 'item',
                                                        'properties' => array(
                                                            'PrivateIpAddress' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'privateIpAddress',
                                                            ),
                                                            'Primary' => array(
                                                                'type' => 'boolean',
                                                                'sentAs' => 'primary',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'SecondaryPrivateIpAddressCount' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'secondaryPrivateIpAddressCount',
                                                ),
                                                'AssociatePublicIpAddress' => array(
                                                    'type' => 'boolean',
                                                    'sentAs' => 'associatePublicIpAddress',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IamInstanceProfile' => array(
                                        'type' => 'object',
                                        'sentAs' => 'iamInstanceProfile',
                                        'properties' => array(
                                            'Arn' => array(
                                                'type' => 'string',
                                                'sentAs' => 'arn',
                                            ),
                                            'Name' => array(
                                                'type' => 'string',
                                                'sentAs' => 'name',
                                            ),
                                        ),
                                    ),
                                    'EbsOptimized' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'ebsOptimized',
                                    ),
                                ),
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'CreateTime' => array(
                                'type' => 'string',
                                'sentAs' => 'createTime',
                            ),
                            'ProductDescription' => array(
                                'type' => 'string',
                                'sentAs' => 'productDescription',
                            ),
                            'BlockDurationMinutes' => array(
                                'type' => 'numeric',
                                'sentAs' => 'blockDurationMinutes',
                            ),
                            'ActualBlockHourlyPrice' => array(
                                'type' => 'string',
                                'sentAs' => 'actualBlockHourlyPrice',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'LaunchedAvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'launchedAvailabilityZone',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CancelSpotInstanceRequestsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CancelledSpotInstanceRequests' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'spotInstanceRequestSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'SpotInstanceRequestId' => array(
                                'type' => 'string',
                                'sentAs' => 'spotInstanceRequestId',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSpotPriceHistoryResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SpotPriceHistory' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'spotPriceHistorySet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceType' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceType',
                            ),
                            'ProductDescription' => array(
                                'type' => 'string',
                                'sentAs' => 'productDescription',
                            ),
                            'SpotPrice' => array(
                                'type' => 'string',
                                'sentAs' => 'spotPrice',
                            ),
                            'Timestamp' => array(
                                'type' => 'string',
                                'sentAs' => 'timestamp',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'CreateSpotDatafeedSubscriptionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SpotDatafeedSubscription' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'spotDatafeedSubscription',
                    'properties' => array(
                        'OwnerId' => array(
                            'type' => 'string',
                            'sentAs' => 'ownerId',
                        ),
                        'Bucket' => array(
                            'type' => 'string',
                            'sentAs' => 'bucket',
                        ),
                        'Prefix' => array(
                            'type' => 'string',
                            'sentAs' => 'prefix',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'Fault' => array(
                            'type' => 'object',
                            'sentAs' => 'fault',
                            'properties' => array(
                                'Code' => array(
                                    'type' => 'string',
                                    'sentAs' => 'code',
                                ),
                                'Message' => array(
                                    'type' => 'string',
                                    'sentAs' => 'message',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSpotDatafeedSubscriptionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SpotDatafeedSubscription' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'spotDatafeedSubscription',
                    'properties' => array(
                        'OwnerId' => array(
                            'type' => 'string',
                            'sentAs' => 'ownerId',
                        ),
                        'Bucket' => array(
                            'type' => 'string',
                            'sentAs' => 'bucket',
                        ),
                        'Prefix' => array(
                            'type' => 'string',
                            'sentAs' => 'prefix',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'Fault' => array(
                            'type' => 'object',
                            'sentAs' => 'fault',
                            'properties' => array(
                                'Code' => array(
                                    'type' => 'string',
                                    'sentAs' => 'code',
                                ),
                                'Message' => array(
                                    'type' => 'string',
                                    'sentAs' => 'message',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribePlacementGroupsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PlacementGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'placementGroupSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'GroupName' => array(
                                'type' => 'string',
                                'sentAs' => 'groupName',
                            ),
                            'Strategy' => array(
                                'type' => 'string',
                                'sentAs' => 'strategy',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTagsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Tags' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'tagSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                                'sentAs' => 'resourceId',
                            ),
                            'ResourceType' => array(
                                'type' => 'string',
                                'sentAs' => 'resourceType',
                            ),
                            'Key' => array(
                                'type' => 'string',
                                'sentAs' => 'key',
                            ),
                            'Value' => array(
                                'type' => 'string',
                                'sentAs' => 'value',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'CreateInternetGatewayResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InternetGateway' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'internetGateway',
                    'properties' => array(
                        'InternetGatewayId' => array(
                            'type' => 'string',
                            'sentAs' => 'internetGatewayId',
                        ),
                        'Attachments' => array(
                            'type' => 'array',
                            'sentAs' => 'attachmentSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'VpcId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'vpcId',
                                    ),
                                    'State' => array(
                                        'type' => 'string',
                                        'sentAs' => 'state',
                                    ),
                                ),
                            ),
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeInternetGatewaysResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InternetGateways' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'internetGatewaySet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InternetGatewayId' => array(
                                'type' => 'string',
                                'sentAs' => 'internetGatewayId',
                            ),
                            'Attachments' => array(
                                'type' => 'array',
                                'sentAs' => 'attachmentSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'VpcId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'vpcId',
                                        ),
                                        'State' => array(
                                            'type' => 'string',
                                            'sentAs' => 'state',
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateRouteTableResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RouteTable' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'routeTable',
                    'properties' => array(
                        'RouteTableId' => array(
                            'type' => 'string',
                            'sentAs' => 'routeTableId',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcId',
                        ),
                        'Routes' => array(
                            'type' => 'array',
                            'sentAs' => 'routeSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'DestinationCidrBlock' => array(
                                        'type' => 'string',
                                        'sentAs' => 'destinationCidrBlock',
                                    ),
                                    'DestinationPrefixListId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'destinationPrefixListId',
                                    ),
                                    'GatewayId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'gatewayId',
                                    ),
                                    'InstanceId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'instanceId',
                                    ),
                                    'InstanceOwnerId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'instanceOwnerId',
                                    ),
                                    'NetworkInterfaceId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'networkInterfaceId',
                                    ),
                                    'VpcPeeringConnectionId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'vpcPeeringConnectionId',
                                    ),
                                    'NatGatewayId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'natGatewayId',
                                    ),
                                    'State' => array(
                                        'type' => 'string',
                                        'sentAs' => 'state',
                                    ),
                                    'Origin' => array(
                                        'type' => 'string',
                                        'sentAs' => 'origin',
                                    ),
                                ),
                            ),
                        ),
                        'Associations' => array(
                            'type' => 'array',
                            'sentAs' => 'associationSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'RouteTableAssociationId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'routeTableAssociationId',
                                    ),
                                    'RouteTableId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'routeTableId',
                                    ),
                                    'SubnetId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'subnetId',
                                    ),
                                    'Main' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'main',
                                    ),
                                ),
                            ),
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                        'PropagatingVgws' => array(
                            'type' => 'array',
                            'sentAs' => 'propagatingVgwSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'GatewayId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'gatewayId',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeRouteTablesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RouteTables' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'routeTableSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'RouteTableId' => array(
                                'type' => 'string',
                                'sentAs' => 'routeTableId',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'Routes' => array(
                                'type' => 'array',
                                'sentAs' => 'routeSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'DestinationCidrBlock' => array(
                                            'type' => 'string',
                                            'sentAs' => 'destinationCidrBlock',
                                        ),
                                        'DestinationPrefixListId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'destinationPrefixListId',
                                        ),
                                        'GatewayId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'gatewayId',
                                        ),
                                        'InstanceId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'instanceId',
                                        ),
                                        'InstanceOwnerId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'instanceOwnerId',
                                        ),
                                        'NetworkInterfaceId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'networkInterfaceId',
                                        ),
                                        'VpcPeeringConnectionId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'vpcPeeringConnectionId',
                                        ),
                                        'NatGatewayId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'natGatewayId',
                                        ),
                                        'State' => array(
                                            'type' => 'string',
                                            'sentAs' => 'state',
                                        ),
                                        'Origin' => array(
                                            'type' => 'string',
                                            'sentAs' => 'origin',
                                        ),
                                    ),
                                ),
                            ),
                            'Associations' => array(
                                'type' => 'array',
                                'sentAs' => 'associationSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'RouteTableAssociationId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'routeTableAssociationId',
                                        ),
                                        'RouteTableId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'routeTableId',
                                        ),
                                        'SubnetId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'subnetId',
                                        ),
                                        'Main' => array(
                                            'type' => 'boolean',
                                            'sentAs' => 'main',
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'PropagatingVgws' => array(
                                'type' => 'array',
                                'sentAs' => 'propagatingVgwSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'GatewayId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'gatewayId',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'AssociateRouteTableResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AssociationId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'associationId',
                ),
            ),
        ),
        'ReplaceRouteTableAssociationResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NewAssociationId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'newAssociationId',
                ),
            ),
        ),
        'CreateRouteResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'CreateNetworkAclResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NetworkAcl' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'networkAcl',
                    'properties' => array(
                        'NetworkAclId' => array(
                            'type' => 'string',
                            'sentAs' => 'networkAclId',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcId',
                        ),
                        'IsDefault' => array(
                            'type' => 'boolean',
                            'sentAs' => 'default',
                        ),
                        'Entries' => array(
                            'type' => 'array',
                            'sentAs' => 'entrySet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'RuleNumber' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'ruleNumber',
                                    ),
                                    'Protocol' => array(
                                        'type' => 'string',
                                        'sentAs' => 'protocol',
                                    ),
                                    'RuleAction' => array(
                                        'type' => 'string',
                                        'sentAs' => 'ruleAction',
                                    ),
                                    'Egress' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'egress',
                                    ),
                                    'CidrBlock' => array(
                                        'type' => 'string',
                                        'sentAs' => 'cidrBlock',
                                    ),
                                    'IcmpTypeCode' => array(
                                        'type' => 'object',
                                        'sentAs' => 'icmpTypeCode',
                                        'properties' => array(
                                            'Type' => array(
                                                'type' => 'numeric',
                                                'sentAs' => 'type',
                                            ),
                                            'Code' => array(
                                                'type' => 'numeric',
                                                'sentAs' => 'code',
                                            ),
                                        ),
                                    ),
                                    'PortRange' => array(
                                        'type' => 'object',
                                        'sentAs' => 'portRange',
                                        'properties' => array(
                                            'From' => array(
                                                'type' => 'numeric',
                                                'sentAs' => 'from',
                                            ),
                                            'To' => array(
                                                'type' => 'numeric',
                                                'sentAs' => 'to',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Associations' => array(
                            'type' => 'array',
                            'sentAs' => 'associationSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'NetworkAclAssociationId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'networkAclAssociationId',
                                    ),
                                    'NetworkAclId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'networkAclId',
                                    ),
                                    'SubnetId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'subnetId',
                                    ),
                                ),
                            ),
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeNetworkAclsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NetworkAcls' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'networkAclSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'NetworkAclId' => array(
                                'type' => 'string',
                                'sentAs' => 'networkAclId',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'IsDefault' => array(
                                'type' => 'boolean',
                                'sentAs' => 'default',
                            ),
                            'Entries' => array(
                                'type' => 'array',
                                'sentAs' => 'entrySet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'RuleNumber' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'ruleNumber',
                                        ),
                                        'Protocol' => array(
                                            'type' => 'string',
                                            'sentAs' => 'protocol',
                                        ),
                                        'RuleAction' => array(
                                            'type' => 'string',
                                            'sentAs' => 'ruleAction',
                                        ),
                                        'Egress' => array(
                                            'type' => 'boolean',
                                            'sentAs' => 'egress',
                                        ),
                                        'CidrBlock' => array(
                                            'type' => 'string',
                                            'sentAs' => 'cidrBlock',
                                        ),
                                        'IcmpTypeCode' => array(
                                            'type' => 'object',
                                            'sentAs' => 'icmpTypeCode',
                                            'properties' => array(
                                                'Type' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'type',
                                                ),
                                                'Code' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'code',
                                                ),
                                            ),
                                        ),
                                        'PortRange' => array(
                                            'type' => 'object',
                                            'sentAs' => 'portRange',
                                            'properties' => array(
                                                'From' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'from',
                                                ),
                                                'To' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'to',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Associations' => array(
                                'type' => 'array',
                                'sentAs' => 'associationSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'NetworkAclAssociationId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'networkAclAssociationId',
                                        ),
                                        'NetworkAclId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'networkAclId',
                                        ),
                                        'SubnetId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'subnetId',
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ReplaceNetworkAclAssociationResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NewAssociationId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'newAssociationId',
                ),
            ),
        ),
        'DescribeInstanceStatusResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceStatuses' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'instanceStatusSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'Events' => array(
                                'type' => 'array',
                                'sentAs' => 'eventsSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Code' => array(
                                            'type' => 'string',
                                            'sentAs' => 'code',
                                        ),
                                        'Description' => array(
                                            'type' => 'string',
                                            'sentAs' => 'description',
                                        ),
                                        'NotBefore' => array(
                                            'type' => 'string',
                                            'sentAs' => 'notBefore',
                                        ),
                                        'NotAfter' => array(
                                            'type' => 'string',
                                            'sentAs' => 'notAfter',
                                        ),
                                    ),
                                ),
                            ),
                            'InstanceState' => array(
                                'type' => 'object',
                                'sentAs' => 'instanceState',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'code',
                                    ),
                                    'Name' => array(
                                        'type' => 'string',
                                        'sentAs' => 'name',
                                    ),
                                ),
                            ),
                            'SystemStatus' => array(
                                'type' => 'object',
                                'sentAs' => 'systemStatus',
                                'properties' => array(
                                    'Status' => array(
                                        'type' => 'string',
                                        'sentAs' => 'status',
                                    ),
                                    'Details' => array(
                                        'type' => 'array',
                                        'sentAs' => 'details',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'Name' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'name',
                                                ),
                                                'Status' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'status',
                                                ),
                                                'ImpairedSince' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'impairedSince',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'InstanceStatus' => array(
                                'type' => 'object',
                                'sentAs' => 'instanceStatus',
                                'properties' => array(
                                    'Status' => array(
                                        'type' => 'string',
                                        'sentAs' => 'status',
                                    ),
                                    'Details' => array(
                                        'type' => 'array',
                                        'sentAs' => 'details',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'Name' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'name',
                                                ),
                                                'Status' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'status',
                                                ),
                                                'ImpairedSince' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'impairedSince',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'ImportInstanceResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ConversionTask' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'conversionTask',
                    'properties' => array(
                        'ConversionTaskId' => array(
                            'type' => 'string',
                            'sentAs' => 'conversionTaskId',
                        ),
                        'ExpirationTime' => array(
                            'type' => 'string',
                            'sentAs' => 'expirationTime',
                        ),
                        'ImportInstance' => array(
                            'type' => 'object',
                            'sentAs' => 'importInstance',
                            'properties' => array(
                                'Volumes' => array(
                                    'type' => 'array',
                                    'sentAs' => 'volumes',
                                    'items' => array(
                                        'name' => 'item',
                                        'type' => 'object',
                                        'sentAs' => 'item',
                                        'properties' => array(
                                            'BytesConverted' => array(
                                                'type' => 'numeric',
                                                'sentAs' => 'bytesConverted',
                                            ),
                                            'AvailabilityZone' => array(
                                                'type' => 'string',
                                                'sentAs' => 'availabilityZone',
                                            ),
                                            'Image' => array(
                                                'type' => 'object',
                                                'sentAs' => 'image',
                                                'properties' => array(
                                                    'Format' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'format',
                                                    ),
                                                    'Size' => array(
                                                        'type' => 'numeric',
                                                        'sentAs' => 'size',
                                                    ),
                                                    'ImportManifestUrl' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'importManifestUrl',
                                                    ),
                                                    'Checksum' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'checksum',
                                                    ),
                                                ),
                                            ),
                                            'Volume' => array(
                                                'type' => 'object',
                                                'sentAs' => 'volume',
                                                'properties' => array(
                                                    'Size' => array(
                                                        'type' => 'numeric',
                                                        'sentAs' => 'size',
                                                    ),
                                                    'Id' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'id',
                                                    ),
                                                ),
                                            ),
                                            'Status' => array(
                                                'type' => 'string',
                                                'sentAs' => 'status',
                                            ),
                                            'StatusMessage' => array(
                                                'type' => 'string',
                                                'sentAs' => 'statusMessage',
                                            ),
                                            'Description' => array(
                                                'type' => 'string',
                                                'sentAs' => 'description',
                                            ),
                                        ),
                                    ),
                                ),
                                'InstanceId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'instanceId',
                                ),
                                'Platform' => array(
                                    'type' => 'string',
                                    'sentAs' => 'platform',
                                ),
                                'Description' => array(
                                    'type' => 'string',
                                    'sentAs' => 'description',
                                ),
                            ),
                        ),
                        'ImportVolume' => array(
                            'type' => 'object',
                            'sentAs' => 'importVolume',
                            'properties' => array(
                                'BytesConverted' => array(
                                    'type' => 'numeric',
                                    'sentAs' => 'bytesConverted',
                                ),
                                'AvailabilityZone' => array(
                                    'type' => 'string',
                                    'sentAs' => 'availabilityZone',
                                ),
                                'Description' => array(
                                    'type' => 'string',
                                    'sentAs' => 'description',
                                ),
                                'Image' => array(
                                    'type' => 'object',
                                    'sentAs' => 'image',
                                    'properties' => array(
                                        'Format' => array(
                                            'type' => 'string',
                                            'sentAs' => 'format',
                                        ),
                                        'Size' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'size',
                                        ),
                                        'ImportManifestUrl' => array(
                                            'type' => 'string',
                                            'sentAs' => 'importManifestUrl',
                                        ),
                                        'Checksum' => array(
                                            'type' => 'string',
                                            'sentAs' => 'checksum',
                                        ),
                                    ),
                                ),
                                'Volume' => array(
                                    'type' => 'object',
                                    'sentAs' => 'volume',
                                    'properties' => array(
                                        'Size' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'size',
                                        ),
                                        'Id' => array(
                                            'type' => 'string',
                                            'sentAs' => 'id',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'StatusMessage' => array(
                            'type' => 'string',
                            'sentAs' => 'statusMessage',
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ImportVolumeResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ConversionTask' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'conversionTask',
                    'properties' => array(
                        'ConversionTaskId' => array(
                            'type' => 'string',
                            'sentAs' => 'conversionTaskId',
                        ),
                        'ExpirationTime' => array(
                            'type' => 'string',
                            'sentAs' => 'expirationTime',
                        ),
                        'ImportInstance' => array(
                            'type' => 'object',
                            'sentAs' => 'importInstance',
                            'properties' => array(
                                'Volumes' => array(
                                    'type' => 'array',
                                    'sentAs' => 'volumes',
                                    'items' => array(
                                        'name' => 'item',
                                        'type' => 'object',
                                        'sentAs' => 'item',
                                        'properties' => array(
                                            'BytesConverted' => array(
                                                'type' => 'numeric',
                                                'sentAs' => 'bytesConverted',
                                            ),
                                            'AvailabilityZone' => array(
                                                'type' => 'string',
                                                'sentAs' => 'availabilityZone',
                                            ),
                                            'Image' => array(
                                                'type' => 'object',
                                                'sentAs' => 'image',
                                                'properties' => array(
                                                    'Format' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'format',
                                                    ),
                                                    'Size' => array(
                                                        'type' => 'numeric',
                                                        'sentAs' => 'size',
                                                    ),
                                                    'ImportManifestUrl' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'importManifestUrl',
                                                    ),
                                                    'Checksum' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'checksum',
                                                    ),
                                                ),
                                            ),
                                            'Volume' => array(
                                                'type' => 'object',
                                                'sentAs' => 'volume',
                                                'properties' => array(
                                                    'Size' => array(
                                                        'type' => 'numeric',
                                                        'sentAs' => 'size',
                                                    ),
                                                    'Id' => array(
                                                        'type' => 'string',
                                                        'sentAs' => 'id',
                                                    ),
                                                ),
                                            ),
                                            'Status' => array(
                                                'type' => 'string',
                                                'sentAs' => 'status',
                                            ),
                                            'StatusMessage' => array(
                                                'type' => 'string',
                                                'sentAs' => 'statusMessage',
                                            ),
                                            'Description' => array(
                                                'type' => 'string',
                                                'sentAs' => 'description',
                                            ),
                                        ),
                                    ),
                                ),
                                'InstanceId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'instanceId',
                                ),
                                'Platform' => array(
                                    'type' => 'string',
                                    'sentAs' => 'platform',
                                ),
                                'Description' => array(
                                    'type' => 'string',
                                    'sentAs' => 'description',
                                ),
                            ),
                        ),
                        'ImportVolume' => array(
                            'type' => 'object',
                            'sentAs' => 'importVolume',
                            'properties' => array(
                                'BytesConverted' => array(
                                    'type' => 'numeric',
                                    'sentAs' => 'bytesConverted',
                                ),
                                'AvailabilityZone' => array(
                                    'type' => 'string',
                                    'sentAs' => 'availabilityZone',
                                ),
                                'Description' => array(
                                    'type' => 'string',
                                    'sentAs' => 'description',
                                ),
                                'Image' => array(
                                    'type' => 'object',
                                    'sentAs' => 'image',
                                    'properties' => array(
                                        'Format' => array(
                                            'type' => 'string',
                                            'sentAs' => 'format',
                                        ),
                                        'Size' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'size',
                                        ),
                                        'ImportManifestUrl' => array(
                                            'type' => 'string',
                                            'sentAs' => 'importManifestUrl',
                                        ),
                                        'Checksum' => array(
                                            'type' => 'string',
                                            'sentAs' => 'checksum',
                                        ),
                                    ),
                                ),
                                'Volume' => array(
                                    'type' => 'object',
                                    'sentAs' => 'volume',
                                    'properties' => array(
                                        'Size' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'size',
                                        ),
                                        'Id' => array(
                                            'type' => 'string',
                                            'sentAs' => 'id',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'StatusMessage' => array(
                            'type' => 'string',
                            'sentAs' => 'statusMessage',
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeConversionTasksResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ConversionTasks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'conversionTasks',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ConversionTaskId' => array(
                                'type' => 'string',
                                'sentAs' => 'conversionTaskId',
                            ),
                            'ExpirationTime' => array(
                                'type' => 'string',
                                'sentAs' => 'expirationTime',
                            ),
                            'ImportInstance' => array(
                                'type' => 'object',
                                'sentAs' => 'importInstance',
                                'properties' => array(
                                    'Volumes' => array(
                                        'type' => 'array',
                                        'sentAs' => 'volumes',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'BytesConverted' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'bytesConverted',
                                                ),
                                                'AvailabilityZone' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'availabilityZone',
                                                ),
                                                'Image' => array(
                                                    'type' => 'object',
                                                    'sentAs' => 'image',
                                                    'properties' => array(
                                                        'Format' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'format',
                                                        ),
                                                        'Size' => array(
                                                            'type' => 'numeric',
                                                            'sentAs' => 'size',
                                                        ),
                                                        'ImportManifestUrl' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'importManifestUrl',
                                                        ),
                                                        'Checksum' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'checksum',
                                                        ),
                                                    ),
                                                ),
                                                'Volume' => array(
                                                    'type' => 'object',
                                                    'sentAs' => 'volume',
                                                    'properties' => array(
                                                        'Size' => array(
                                                            'type' => 'numeric',
                                                            'sentAs' => 'size',
                                                        ),
                                                        'Id' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'id',
                                                        ),
                                                    ),
                                                ),
                                                'Status' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'status',
                                                ),
                                                'StatusMessage' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'statusMessage',
                                                ),
                                                'Description' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'description',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'InstanceId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'instanceId',
                                    ),
                                    'Platform' => array(
                                        'type' => 'string',
                                        'sentAs' => 'platform',
                                    ),
                                    'Description' => array(
                                        'type' => 'string',
                                        'sentAs' => 'description',
                                    ),
                                ),
                            ),
                            'ImportVolume' => array(
                                'type' => 'object',
                                'sentAs' => 'importVolume',
                                'properties' => array(
                                    'BytesConverted' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'bytesConverted',
                                    ),
                                    'AvailabilityZone' => array(
                                        'type' => 'string',
                                        'sentAs' => 'availabilityZone',
                                    ),
                                    'Description' => array(
                                        'type' => 'string',
                                        'sentAs' => 'description',
                                    ),
                                    'Image' => array(
                                        'type' => 'object',
                                        'sentAs' => 'image',
                                        'properties' => array(
                                            'Format' => array(
                                                'type' => 'string',
                                                'sentAs' => 'format',
                                            ),
                                            'Size' => array(
                                                'type' => 'numeric',
                                                'sentAs' => 'size',
                                            ),
                                            'ImportManifestUrl' => array(
                                                'type' => 'string',
                                                'sentAs' => 'importManifestUrl',
                                            ),
                                            'Checksum' => array(
                                                'type' => 'string',
                                                'sentAs' => 'checksum',
                                            ),
                                        ),
                                    ),
                                    'Volume' => array(
                                        'type' => 'object',
                                        'sentAs' => 'volume',
                                        'properties' => array(
                                            'Size' => array(
                                                'type' => 'numeric',
                                                'sentAs' => 'size',
                                            ),
                                            'Id' => array(
                                                'type' => 'string',
                                                'sentAs' => 'id',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'statusMessage',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateNetworkInterfaceResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NetworkInterface' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'networkInterface',
                    'properties' => array(
                        'NetworkInterfaceId' => array(
                            'type' => 'string',
                            'sentAs' => 'networkInterfaceId',
                        ),
                        'SubnetId' => array(
                            'type' => 'string',
                            'sentAs' => 'subnetId',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcId',
                        ),
                        'AvailabilityZone' => array(
                            'type' => 'string',
                            'sentAs' => 'availabilityZone',
                        ),
                        'Description' => array(
                            'type' => 'string',
                            'sentAs' => 'description',
                        ),
                        'OwnerId' => array(
                            'type' => 'string',
                            'sentAs' => 'ownerId',
                        ),
                        'RequesterId' => array(
                            'type' => 'string',
                            'sentAs' => 'requesterId',
                        ),
                        'RequesterManaged' => array(
                            'type' => 'boolean',
                            'sentAs' => 'requesterManaged',
                        ),
                        'Status' => array(
                            'type' => 'string',
                            'sentAs' => 'status',
                        ),
                        'MacAddress' => array(
                            'type' => 'string',
                            'sentAs' => 'macAddress',
                        ),
                        'PrivateIpAddress' => array(
                            'type' => 'string',
                            'sentAs' => 'privateIpAddress',
                        ),
                        'PrivateDnsName' => array(
                            'type' => 'string',
                            'sentAs' => 'privateDnsName',
                        ),
                        'SourceDestCheck' => array(
                            'type' => 'boolean',
                            'sentAs' => 'sourceDestCheck',
                        ),
                        'Groups' => array(
                            'type' => 'array',
                            'sentAs' => 'groupSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'GroupName' => array(
                                        'type' => 'string',
                                        'sentAs' => 'groupName',
                                    ),
                                    'GroupId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'groupId',
                                    ),
                                ),
                            ),
                        ),
                        'Attachment' => array(
                            'type' => 'object',
                            'sentAs' => 'attachment',
                            'properties' => array(
                                'AttachmentId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'attachmentId',
                                ),
                                'InstanceId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'instanceId',
                                ),
                                'InstanceOwnerId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'instanceOwnerId',
                                ),
                                'DeviceIndex' => array(
                                    'type' => 'numeric',
                                    'sentAs' => 'deviceIndex',
                                ),
                                'Status' => array(
                                    'type' => 'string',
                                    'sentAs' => 'status',
                                ),
                                'AttachTime' => array(
                                    'type' => 'string',
                                    'sentAs' => 'attachTime',
                                ),
                                'DeleteOnTermination' => array(
                                    'type' => 'boolean',
                                    'sentAs' => 'deleteOnTermination',
                                ),
                            ),
                        ),
                        'Association' => array(
                            'type' => 'object',
                            'sentAs' => 'association',
                            'properties' => array(
                                'PublicIp' => array(
                                    'type' => 'string',
                                    'sentAs' => 'publicIp',
                                ),
                                'PublicDnsName' => array(
                                    'type' => 'string',
                                    'sentAs' => 'publicDnsName',
                                ),
                                'IpOwnerId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'ipOwnerId',
                                ),
                                'AllocationId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'allocationId',
                                ),
                                'AssociationId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'associationId',
                                ),
                            ),
                        ),
                        'TagSet' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                        'PrivateIpAddresses' => array(
                            'type' => 'array',
                            'sentAs' => 'privateIpAddressesSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'PrivateIpAddress' => array(
                                        'type' => 'string',
                                        'sentAs' => 'privateIpAddress',
                                    ),
                                    'PrivateDnsName' => array(
                                        'type' => 'string',
                                        'sentAs' => 'privateDnsName',
                                    ),
                                    'Primary' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'primary',
                                    ),
                                    'Association' => array(
                                        'type' => 'object',
                                        'sentAs' => 'association',
                                        'properties' => array(
                                            'PublicIp' => array(
                                                'type' => 'string',
                                                'sentAs' => 'publicIp',
                                            ),
                                            'PublicDnsName' => array(
                                                'type' => 'string',
                                                'sentAs' => 'publicDnsName',
                                            ),
                                            'IpOwnerId' => array(
                                                'type' => 'string',
                                                'sentAs' => 'ipOwnerId',
                                            ),
                                            'AllocationId' => array(
                                                'type' => 'string',
                                                'sentAs' => 'allocationId',
                                            ),
                                            'AssociationId' => array(
                                                'type' => 'string',
                                                'sentAs' => 'associationId',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'InterfaceType' => array(
                            'type' => 'string',
                            'sentAs' => 'interfaceType',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeNetworkInterfacesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NetworkInterfaces' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'networkInterfaceSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'NetworkInterfaceId' => array(
                                'type' => 'string',
                                'sentAs' => 'networkInterfaceId',
                            ),
                            'SubnetId' => array(
                                'type' => 'string',
                                'sentAs' => 'subnetId',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'Description' => array(
                                'type' => 'string',
                                'sentAs' => 'description',
                            ),
                            'OwnerId' => array(
                                'type' => 'string',
                                'sentAs' => 'ownerId',
                            ),
                            'RequesterId' => array(
                                'type' => 'string',
                                'sentAs' => 'requesterId',
                            ),
                            'RequesterManaged' => array(
                                'type' => 'boolean',
                                'sentAs' => 'requesterManaged',
                            ),
                            'Status' => array(
                                'type' => 'string',
                                'sentAs' => 'status',
                            ),
                            'MacAddress' => array(
                                'type' => 'string',
                                'sentAs' => 'macAddress',
                            ),
                            'PrivateIpAddress' => array(
                                'type' => 'string',
                                'sentAs' => 'privateIpAddress',
                            ),
                            'PrivateDnsName' => array(
                                'type' => 'string',
                                'sentAs' => 'privateDnsName',
                            ),
                            'SourceDestCheck' => array(
                                'type' => 'boolean',
                                'sentAs' => 'sourceDestCheck',
                            ),
                            'Groups' => array(
                                'type' => 'array',
                                'sentAs' => 'groupSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'GroupName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'groupName',
                                        ),
                                        'GroupId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'groupId',
                                        ),
                                    ),
                                ),
                            ),
                            'Attachment' => array(
                                'type' => 'object',
                                'sentAs' => 'attachment',
                                'properties' => array(
                                    'AttachmentId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'attachmentId',
                                    ),
                                    'InstanceId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'instanceId',
                                    ),
                                    'InstanceOwnerId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'instanceOwnerId',
                                    ),
                                    'DeviceIndex' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'deviceIndex',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                        'sentAs' => 'status',
                                    ),
                                    'AttachTime' => array(
                                        'type' => 'string',
                                        'sentAs' => 'attachTime',
                                    ),
                                    'DeleteOnTermination' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'deleteOnTermination',
                                    ),
                                ),
                            ),
                            'Association' => array(
                                'type' => 'object',
                                'sentAs' => 'association',
                                'properties' => array(
                                    'PublicIp' => array(
                                        'type' => 'string',
                                        'sentAs' => 'publicIp',
                                    ),
                                    'PublicDnsName' => array(
                                        'type' => 'string',
                                        'sentAs' => 'publicDnsName',
                                    ),
                                    'IpOwnerId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'ipOwnerId',
                                    ),
                                    'AllocationId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'allocationId',
                                    ),
                                    'AssociationId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'associationId',
                                    ),
                                ),
                            ),
                            'TagSet' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'PrivateIpAddresses' => array(
                                'type' => 'array',
                                'sentAs' => 'privateIpAddressesSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'PrivateIpAddress' => array(
                                            'type' => 'string',
                                            'sentAs' => 'privateIpAddress',
                                        ),
                                        'PrivateDnsName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'privateDnsName',
                                        ),
                                        'Primary' => array(
                                            'type' => 'boolean',
                                            'sentAs' => 'primary',
                                        ),
                                        'Association' => array(
                                            'type' => 'object',
                                            'sentAs' => 'association',
                                            'properties' => array(
                                                'PublicIp' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'publicIp',
                                                ),
                                                'PublicDnsName' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'publicDnsName',
                                                ),
                                                'IpOwnerId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'ipOwnerId',
                                                ),
                                                'AllocationId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'allocationId',
                                                ),
                                                'AssociationId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'associationId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'InterfaceType' => array(
                                'type' => 'string',
                                'sentAs' => 'interfaceType',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'AttachNetworkInterfaceResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AttachmentId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'attachmentId',
                ),
            ),
        ),
        'DescribeNetworkInterfaceAttributeResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NetworkInterfaceId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'networkInterfaceId',
                ),
                'Description' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'description',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'string',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'SourceDestCheck' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'sourceDestCheck',
                    'properties' => array(
                        'Value' => array(
                            'type' => 'boolean',
                            'sentAs' => 'value',
                        ),
                    ),
                ),
                'Groups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'groupSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'GroupName' => array(
                                'type' => 'string',
                                'sentAs' => 'groupName',
                            ),
                            'GroupId' => array(
                                'type' => 'string',
                                'sentAs' => 'groupId',
                            ),
                        ),
                    ),
                ),
                'Attachment' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'attachment',
                    'properties' => array(
                        'AttachmentId' => array(
                            'type' => 'string',
                            'sentAs' => 'attachmentId',
                        ),
                        'InstanceId' => array(
                            'type' => 'string',
                            'sentAs' => 'instanceId',
                        ),
                        'InstanceOwnerId' => array(
                            'type' => 'string',
                            'sentAs' => 'instanceOwnerId',
                        ),
                        'DeviceIndex' => array(
                            'type' => 'numeric',
                            'sentAs' => 'deviceIndex',
                        ),
                        'Status' => array(
                            'type' => 'string',
                            'sentAs' => 'status',
                        ),
                        'AttachTime' => array(
                            'type' => 'string',
                            'sentAs' => 'attachTime',
                        ),
                        'DeleteOnTermination' => array(
                            'type' => 'boolean',
                            'sentAs' => 'deleteOnTermination',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeExportTasksResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ExportTasks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'exportTaskSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ExportTaskId' => array(
                                'type' => 'string',
                                'sentAs' => 'exportTaskId',
                            ),
                            'Description' => array(
                                'type' => 'string',
                                'sentAs' => 'description',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'statusMessage',
                            ),
                            'InstanceExportDetails' => array(
                                'type' => 'object',
                                'sentAs' => 'instanceExport',
                                'properties' => array(
                                    'InstanceId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'instanceId',
                                    ),
                                    'TargetEnvironment' => array(
                                        'type' => 'string',
                                        'sentAs' => 'targetEnvironment',
                                    ),
                                ),
                            ),
                            'ExportToS3Task' => array(
                                'type' => 'object',
                                'sentAs' => 'exportToS3',
                                'properties' => array(
                                    'DiskImageFormat' => array(
                                        'type' => 'string',
                                        'sentAs' => 'diskImageFormat',
                                    ),
                                    'ContainerFormat' => array(
                                        'type' => 'string',
                                        'sentAs' => 'containerFormat',
                                    ),
                                    'S3Bucket' => array(
                                        'type' => 'string',
                                        'sentAs' => 's3Bucket',
                                    ),
                                    'S3Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 's3Key',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateInstanceExportTaskResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ExportTask' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'exportTask',
                    'properties' => array(
                        'ExportTaskId' => array(
                            'type' => 'string',
                            'sentAs' => 'exportTaskId',
                        ),
                        'Description' => array(
                            'type' => 'string',
                            'sentAs' => 'description',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'StatusMessage' => array(
                            'type' => 'string',
                            'sentAs' => 'statusMessage',
                        ),
                        'InstanceExportDetails' => array(
                            'type' => 'object',
                            'sentAs' => 'instanceExport',
                            'properties' => array(
                                'InstanceId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'instanceId',
                                ),
                                'TargetEnvironment' => array(
                                    'type' => 'string',
                                    'sentAs' => 'targetEnvironment',
                                ),
                            ),
                        ),
                        'ExportToS3Task' => array(
                            'type' => 'object',
                            'sentAs' => 'exportToS3',
                            'properties' => array(
                                'DiskImageFormat' => array(
                                    'type' => 'string',
                                    'sentAs' => 'diskImageFormat',
                                ),
                                'ContainerFormat' => array(
                                    'type' => 'string',
                                    'sentAs' => 'containerFormat',
                                ),
                                'S3Bucket' => array(
                                    'type' => 'string',
                                    'sentAs' => 's3Bucket',
                                ),
                                'S3Key' => array(
                                    'type' => 'string',
                                    'sentAs' => 's3Key',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CancelReservedInstancesListingResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedInstancesListings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'reservedInstancesListingsSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ReservedInstancesListingId' => array(
                                'type' => 'string',
                                'sentAs' => 'reservedInstancesListingId',
                            ),
                            'ReservedInstancesId' => array(
                                'type' => 'string',
                                'sentAs' => 'reservedInstancesId',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                                'sentAs' => 'createDate',
                            ),
                            'UpdateDate' => array(
                                'type' => 'string',
                                'sentAs' => 'updateDate',
                            ),
                            'Status' => array(
                                'type' => 'string',
                                'sentAs' => 'status',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'statusMessage',
                            ),
                            'InstanceCounts' => array(
                                'type' => 'array',
                                'sentAs' => 'instanceCounts',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'State' => array(
                                            'type' => 'string',
                                            'sentAs' => 'state',
                                        ),
                                        'InstanceCount' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'instanceCount',
                                        ),
                                    ),
                                ),
                            ),
                            'PriceSchedules' => array(
                                'type' => 'array',
                                'sentAs' => 'priceSchedules',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Term' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'term',
                                        ),
                                        'Price' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'price',
                                        ),
                                        'CurrencyCode' => array(
                                            'type' => 'string',
                                            'sentAs' => 'currencyCode',
                                        ),
                                        'Active' => array(
                                            'type' => 'boolean',
                                            'sentAs' => 'active',
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'ClientToken' => array(
                                'type' => 'string',
                                'sentAs' => 'clientToken',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateReservedInstancesListingResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedInstancesListings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'reservedInstancesListingsSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ReservedInstancesListingId' => array(
                                'type' => 'string',
                                'sentAs' => 'reservedInstancesListingId',
                            ),
                            'ReservedInstancesId' => array(
                                'type' => 'string',
                                'sentAs' => 'reservedInstancesId',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                                'sentAs' => 'createDate',
                            ),
                            'UpdateDate' => array(
                                'type' => 'string',
                                'sentAs' => 'updateDate',
                            ),
                            'Status' => array(
                                'type' => 'string',
                                'sentAs' => 'status',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'statusMessage',
                            ),
                            'InstanceCounts' => array(
                                'type' => 'array',
                                'sentAs' => 'instanceCounts',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'State' => array(
                                            'type' => 'string',
                                            'sentAs' => 'state',
                                        ),
                                        'InstanceCount' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'instanceCount',
                                        ),
                                    ),
                                ),
                            ),
                            'PriceSchedules' => array(
                                'type' => 'array',
                                'sentAs' => 'priceSchedules',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Term' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'term',
                                        ),
                                        'Price' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'price',
                                        ),
                                        'CurrencyCode' => array(
                                            'type' => 'string',
                                            'sentAs' => 'currencyCode',
                                        ),
                                        'Active' => array(
                                            'type' => 'boolean',
                                            'sentAs' => 'active',
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'ClientToken' => array(
                                'type' => 'string',
                                'sentAs' => 'clientToken',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeReservedInstancesListingsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedInstancesListings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'reservedInstancesListingsSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ReservedInstancesListingId' => array(
                                'type' => 'string',
                                'sentAs' => 'reservedInstancesListingId',
                            ),
                            'ReservedInstancesId' => array(
                                'type' => 'string',
                                'sentAs' => 'reservedInstancesId',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                                'sentAs' => 'createDate',
                            ),
                            'UpdateDate' => array(
                                'type' => 'string',
                                'sentAs' => 'updateDate',
                            ),
                            'Status' => array(
                                'type' => 'string',
                                'sentAs' => 'status',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'statusMessage',
                            ),
                            'InstanceCounts' => array(
                                'type' => 'array',
                                'sentAs' => 'instanceCounts',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'State' => array(
                                            'type' => 'string',
                                            'sentAs' => 'state',
                                        ),
                                        'InstanceCount' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'instanceCount',
                                        ),
                                    ),
                                ),
                            ),
                            'PriceSchedules' => array(
                                'type' => 'array',
                                'sentAs' => 'priceSchedules',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Term' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'term',
                                        ),
                                        'Price' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'price',
                                        ),
                                        'CurrencyCode' => array(
                                            'type' => 'string',
                                            'sentAs' => 'currencyCode',
                                        ),
                                        'Active' => array(
                                            'type' => 'boolean',
                                            'sentAs' => 'active',
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'ClientToken' => array(
                                'type' => 'string',
                                'sentAs' => 'clientToken',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'AcceptVpcPeeringConnectionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpcPeeringConnection' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'vpcPeeringConnection',
                    'properties' => array(
                        'AccepterVpcInfo' => array(
                            'type' => 'object',
                            'sentAs' => 'accepterVpcInfo',
                            'properties' => array(
                                'CidrBlock' => array(
                                    'type' => 'string',
                                    'sentAs' => 'cidrBlock',
                                ),
                                'OwnerId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'ownerId',
                                ),
                                'VpcId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'vpcId',
                                ),
                            ),
                        ),
                        'ExpirationTime' => array(
                            'type' => 'string',
                            'sentAs' => 'expirationTime',
                        ),
                        'RequesterVpcInfo' => array(
                            'type' => 'object',
                            'sentAs' => 'requesterVpcInfo',
                            'properties' => array(
                                'CidrBlock' => array(
                                    'type' => 'string',
                                    'sentAs' => 'cidrBlock',
                                ),
                                'OwnerId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'ownerId',
                                ),
                                'VpcId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'vpcId',
                                ),
                            ),
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'sentAs' => 'status',
                            'properties' => array(
                                'Code' => array(
                                    'type' => 'string',
                                    'sentAs' => 'code',
                                ),
                                'Message' => array(
                                    'type' => 'string',
                                    'sentAs' => 'message',
                                ),
                            ),
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                        'VpcPeeringConnectionId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcPeeringConnectionId',
                        ),
                    ),
                ),
            ),
        ),
        'CreateVpcPeeringConnectionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpcPeeringConnection' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'vpcPeeringConnection',
                    'properties' => array(
                        'AccepterVpcInfo' => array(
                            'type' => 'object',
                            'sentAs' => 'accepterVpcInfo',
                            'properties' => array(
                                'CidrBlock' => array(
                                    'type' => 'string',
                                    'sentAs' => 'cidrBlock',
                                ),
                                'OwnerId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'ownerId',
                                ),
                                'VpcId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'vpcId',
                                ),
                            ),
                        ),
                        'ExpirationTime' => array(
                            'type' => 'string',
                            'sentAs' => 'expirationTime',
                        ),
                        'RequesterVpcInfo' => array(
                            'type' => 'object',
                            'sentAs' => 'requesterVpcInfo',
                            'properties' => array(
                                'CidrBlock' => array(
                                    'type' => 'string',
                                    'sentAs' => 'cidrBlock',
                                ),
                                'OwnerId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'ownerId',
                                ),
                                'VpcId' => array(
                                    'type' => 'string',
                                    'sentAs' => 'vpcId',
                                ),
                            ),
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'sentAs' => 'status',
                            'properties' => array(
                                'Code' => array(
                                    'type' => 'string',
                                    'sentAs' => 'code',
                                ),
                                'Message' => array(
                                    'type' => 'string',
                                    'sentAs' => 'message',
                                ),
                            ),
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'sentAs' => 'tagSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 'key',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                        'sentAs' => 'value',
                                    ),
                                ),
                            ),
                        ),
                        'VpcPeeringConnectionId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcPeeringConnectionId',
                        ),
                    ),
                ),
            ),
        ),
        'DeleteVpcPeeringConnectionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'DescribeVpcPeeringConnectionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpcPeeringConnections' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'vpcPeeringConnectionSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'AccepterVpcInfo' => array(
                                'type' => 'object',
                                'sentAs' => 'accepterVpcInfo',
                                'properties' => array(
                                    'CidrBlock' => array(
                                        'type' => 'string',
                                        'sentAs' => 'cidrBlock',
                                    ),
                                    'OwnerId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'ownerId',
                                    ),
                                    'VpcId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'vpcId',
                                    ),
                                ),
                            ),
                            'ExpirationTime' => array(
                                'type' => 'string',
                                'sentAs' => 'expirationTime',
                            ),
                            'RequesterVpcInfo' => array(
                                'type' => 'object',
                                'sentAs' => 'requesterVpcInfo',
                                'properties' => array(
                                    'CidrBlock' => array(
                                        'type' => 'string',
                                        'sentAs' => 'cidrBlock',
                                    ),
                                    'OwnerId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'ownerId',
                                    ),
                                    'VpcId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'vpcId',
                                    ),
                                ),
                            ),
                            'Status' => array(
                                'type' => 'object',
                                'sentAs' => 'status',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                            'VpcPeeringConnectionId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcPeeringConnectionId',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RejectVpcPeeringConnectionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'EnableVpcClassicLinkResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'DisableVpcClassicLinkResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'AttachClassicLinkVpcResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'DetachClassicLinkVpcResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'DescribeClassicLinkInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Instances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'instancesSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'Groups' => array(
                                'type' => 'array',
                                'sentAs' => 'groupSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'GroupName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'groupName',
                                        ),
                                        'GroupId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'groupId',
                                        ),
                                    ),
                                ),
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribeVpcClassicLinkResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Vpcs' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'vpcSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'ClassicLinkEnabled' => array(
                                'type' => 'boolean',
                                'sentAs' => 'classicLinkEnabled',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'sentAs' => 'tagSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'string',
                                            'sentAs' => 'key',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                            'sentAs' => 'value',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EnableVpcClassicLinkDnsSupportResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'DisableVpcClassicLinkDnsSupportResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'DescribeVpcClassicLinkDnsSupportResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Vpcs' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'vpcs',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'ClassicLinkDnsSupported' => array(
                                'type' => 'boolean',
                                'sentAs' => 'classicLinkDnsSupported',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'CancelImportTaskResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ImportTaskId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'importTaskId',
                ),
                'State' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'state',
                ),
                'PreviousState' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'previousState',
                ),
            ),
        ),
        'DescribeImportImageTasksResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ImportImageTasks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'importImageTaskSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ImportTaskId' => array(
                                'type' => 'string',
                                'sentAs' => 'importTaskId',
                            ),
                            'Architecture' => array(
                                'type' => 'string',
                                'sentAs' => 'architecture',
                            ),
                            'LicenseType' => array(
                                'type' => 'string',
                                'sentAs' => 'licenseType',
                            ),
                            'Platform' => array(
                                'type' => 'string',
                                'sentAs' => 'platform',
                            ),
                            'Hypervisor' => array(
                                'type' => 'string',
                                'sentAs' => 'hypervisor',
                            ),
                            'Description' => array(
                                'type' => 'string',
                                'sentAs' => 'description',
                            ),
                            'SnapshotDetails' => array(
                                'type' => 'array',
                                'sentAs' => 'snapshotDetailSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'DiskImageSize' => array(
                                            'type' => 'numeric',
                                            'sentAs' => 'diskImageSize',
                                        ),
                                        'Description' => array(
                                            'type' => 'string',
                                            'sentAs' => 'description',
                                        ),
                                        'Format' => array(
                                            'type' => 'string',
                                            'sentAs' => 'format',
                                        ),
                                        'Url' => array(
                                            'type' => 'string',
                                            'sentAs' => 'url',
                                        ),
                                        'UserBucket' => array(
                                            'type' => 'object',
                                            'sentAs' => 'userBucket',
                                            'properties' => array(
                                                'S3Bucket' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 's3Bucket',
                                                ),
                                                'S3Key' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 's3Key',
                                                ),
                                            ),
                                        ),
                                        'DeviceName' => array(
                                            'type' => 'string',
                                            'sentAs' => 'deviceName',
                                        ),
                                        'SnapshotId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'snapshotId',
                                        ),
                                        'Progress' => array(
                                            'type' => 'string',
                                            'sentAs' => 'progress',
                                        ),
                                        'StatusMessage' => array(
                                            'type' => 'string',
                                            'sentAs' => 'statusMessage',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                            'sentAs' => 'status',
                                        ),
                                    ),
                                ),
                            ),
                            'ImageId' => array(
                                'type' => 'string',
                                'sentAs' => 'imageId',
                            ),
                            'Progress' => array(
                                'type' => 'string',
                                'sentAs' => 'progress',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'statusMessage',
                            ),
                            'Status' => array(
                                'type' => 'string',
                                'sentAs' => 'status',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribeImportSnapshotTasksResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ImportSnapshotTasks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'importSnapshotTaskSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ImportTaskId' => array(
                                'type' => 'string',
                                'sentAs' => 'importTaskId',
                            ),
                            'SnapshotTaskDetail' => array(
                                'type' => 'object',
                                'sentAs' => 'snapshotTaskDetail',
                                'properties' => array(
                                    'DiskImageSize' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'diskImageSize',
                                    ),
                                    'Description' => array(
                                        'type' => 'string',
                                        'sentAs' => 'description',
                                    ),
                                    'Format' => array(
                                        'type' => 'string',
                                        'sentAs' => 'format',
                                    ),
                                    'Url' => array(
                                        'type' => 'string',
                                        'sentAs' => 'url',
                                    ),
                                    'UserBucket' => array(
                                        'type' => 'object',
                                        'sentAs' => 'userBucket',
                                        'properties' => array(
                                            'S3Bucket' => array(
                                                'type' => 'string',
                                                'sentAs' => 's3Bucket',
                                            ),
                                            'S3Key' => array(
                                                'type' => 'string',
                                                'sentAs' => 's3Key',
                                            ),
                                        ),
                                    ),
                                    'SnapshotId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'snapshotId',
                                    ),
                                    'Progress' => array(
                                        'type' => 'string',
                                        'sentAs' => 'progress',
                                    ),
                                    'StatusMessage' => array(
                                        'type' => 'string',
                                        'sentAs' => 'statusMessage',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                        'sentAs' => 'status',
                                    ),
                                ),
                            ),
                            'Description' => array(
                                'type' => 'string',
                                'sentAs' => 'description',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'ImportImageResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ImportTaskId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'importTaskId',
                ),
                'Architecture' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'architecture',
                ),
                'LicenseType' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'licenseType',
                ),
                'Platform' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'platform',
                ),
                'Hypervisor' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'hypervisor',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'description',
                ),
                'SnapshotDetails' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'snapshotDetailSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'DiskImageSize' => array(
                                'type' => 'numeric',
                                'sentAs' => 'diskImageSize',
                            ),
                            'Description' => array(
                                'type' => 'string',
                                'sentAs' => 'description',
                            ),
                            'Format' => array(
                                'type' => 'string',
                                'sentAs' => 'format',
                            ),
                            'Url' => array(
                                'type' => 'string',
                                'sentAs' => 'url',
                            ),
                            'UserBucket' => array(
                                'type' => 'object',
                                'sentAs' => 'userBucket',
                                'properties' => array(
                                    'S3Bucket' => array(
                                        'type' => 'string',
                                        'sentAs' => 's3Bucket',
                                    ),
                                    'S3Key' => array(
                                        'type' => 'string',
                                        'sentAs' => 's3Key',
                                    ),
                                ),
                            ),
                            'DeviceName' => array(
                                'type' => 'string',
                                'sentAs' => 'deviceName',
                            ),
                            'SnapshotId' => array(
                                'type' => 'string',
                                'sentAs' => 'snapshotId',
                            ),
                            'Progress' => array(
                                'type' => 'string',
                                'sentAs' => 'progress',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'statusMessage',
                            ),
                            'Status' => array(
                                'type' => 'string',
                                'sentAs' => 'status',
                            ),
                        ),
                    ),
                ),
                'ImageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'imageId',
                ),
                'Progress' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'progress',
                ),
                'StatusMessage' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'statusMessage',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'status',
                ),
            ),
        ),
        'ImportSnapshotResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ImportTaskId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'importTaskId',
                ),
                'SnapshotTaskDetail' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'snapshotTaskDetail',
                    'properties' => array(
                        'DiskImageSize' => array(
                            'type' => 'numeric',
                            'sentAs' => 'diskImageSize',
                        ),
                        'Description' => array(
                            'type' => 'string',
                            'sentAs' => 'description',
                        ),
                        'Format' => array(
                            'type' => 'string',
                            'sentAs' => 'format',
                        ),
                        'Url' => array(
                            'type' => 'string',
                            'sentAs' => 'url',
                        ),
                        'UserBucket' => array(
                            'type' => 'object',
                            'sentAs' => 'userBucket',
                            'properties' => array(
                                'S3Bucket' => array(
                                    'type' => 'string',
                                    'sentAs' => 's3Bucket',
                                ),
                                'S3Key' => array(
                                    'type' => 'string',
                                    'sentAs' => 's3Key',
                                ),
                            ),
                        ),
                        'SnapshotId' => array(
                            'type' => 'string',
                            'sentAs' => 'snapshotId',
                        ),
                        'Progress' => array(
                            'type' => 'string',
                            'sentAs' => 'progress',
                        ),
                        'StatusMessage' => array(
                            'type' => 'string',
                            'sentAs' => 'statusMessage',
                        ),
                        'Status' => array(
                            'type' => 'string',
                            'sentAs' => 'status',
                        ),
                    ),
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'description',
                ),
            ),
        ),
        'CreateVpcEndpointResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpcEndpoint' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'vpcEndpoint',
                    'properties' => array(
                        'VpcEndpointId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcEndpointId',
                        ),
                        'VpcId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcId',
                        ),
                        'ServiceName' => array(
                            'type' => 'string',
                            'sentAs' => 'serviceName',
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'PolicyDocument' => array(
                            'type' => 'string',
                            'sentAs' => 'policyDocument',
                        ),
                        'RouteTableIds' => array(
                            'type' => 'array',
                            'sentAs' => 'routeTableIdSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'string',
                                'sentAs' => 'item',
                            ),
                        ),
                        'CreationTimestamp' => array(
                            'type' => 'string',
                            'sentAs' => 'creationTimestamp',
                        ),
                    ),
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'clientToken',
                ),
            ),
        ),
        'DescribeVpcEndpointsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VpcEndpoints' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'vpcEndpointSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VpcEndpointId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcEndpointId',
                            ),
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'ServiceName' => array(
                                'type' => 'string',
                                'sentAs' => 'serviceName',
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'PolicyDocument' => array(
                                'type' => 'string',
                                'sentAs' => 'policyDocument',
                            ),
                            'RouteTableIds' => array(
                                'type' => 'array',
                                'sentAs' => 'routeTableIdSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'string',
                                    'sentAs' => 'item',
                                ),
                            ),
                            'CreationTimestamp' => array(
                                'type' => 'string',
                                'sentAs' => 'creationTimestamp',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DeleteVpcEndpointsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Unsuccessful' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'unsuccessful',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                                'sentAs' => 'resourceId',
                            ),
                            'Error' => array(
                                'type' => 'object',
                                'sentAs' => 'error',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ModifyVpcEndpointResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'DescribeVpcEndpointServicesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ServiceNames' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'serviceNameSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'string',
                        'sentAs' => 'item',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribePrefixListsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PrefixLists' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'prefixListSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'PrefixListId' => array(
                                'type' => 'string',
                                'sentAs' => 'prefixListId',
                            ),
                            'PrefixListName' => array(
                                'type' => 'string',
                                'sentAs' => 'prefixListName',
                            ),
                            'Cidrs' => array(
                                'type' => 'array',
                                'sentAs' => 'cidrSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'string',
                                    'sentAs' => 'item',
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'MoveAddressToVpcResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AllocationId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'allocationId',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'status',
                ),
            ),
        ),
        'RestoreAddressToClassicResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'status',
                ),
                'PublicIp' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'publicIp',
                ),
            ),
        ),
        'DescribeMovingAddressesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MovingAddressStatuses' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'movingAddressStatusSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'PublicIp' => array(
                                'type' => 'string',
                                'sentAs' => 'publicIp',
                            ),
                            'MoveStatus' => array(
                                'type' => 'string',
                                'sentAs' => 'moveStatus',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribeScheduledInstanceAvailabilityResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
                'ScheduledInstanceAvailabilitySet' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'scheduledInstanceAvailabilitySet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceType' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceType',
                            ),
                            'Platform' => array(
                                'type' => 'string',
                                'sentAs' => 'platform',
                            ),
                            'NetworkPlatform' => array(
                                'type' => 'string',
                                'sentAs' => 'networkPlatform',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'PurchaseToken' => array(
                                'type' => 'string',
                                'sentAs' => 'purchaseToken',
                            ),
                            'SlotDurationInHours' => array(
                                'type' => 'numeric',
                                'sentAs' => 'slotDurationInHours',
                            ),
                            'Recurrence' => array(
                                'type' => 'object',
                                'sentAs' => 'recurrence',
                                'properties' => array(
                                    'Frequency' => array(
                                        'type' => 'string',
                                        'sentAs' => 'frequency',
                                    ),
                                    'Interval' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'interval',
                                    ),
                                    'OccurrenceDaySet' => array(
                                        'type' => 'array',
                                        'sentAs' => 'occurrenceDaySet',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'numeric',
                                            'sentAs' => 'item',
                                        ),
                                    ),
                                    'OccurrenceRelativeToEnd' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'occurrenceRelativeToEnd',
                                    ),
                                    'OccurrenceUnit' => array(
                                        'type' => 'string',
                                        'sentAs' => 'occurrenceUnit',
                                    ),
                                ),
                            ),
                            'FirstSlotStartTime' => array(
                                'type' => 'string',
                                'sentAs' => 'firstSlotStartTime',
                            ),
                            'HourlyPrice' => array(
                                'type' => 'string',
                                'sentAs' => 'hourlyPrice',
                            ),
                            'TotalScheduledInstanceHours' => array(
                                'type' => 'numeric',
                                'sentAs' => 'totalScheduledInstanceHours',
                            ),
                            'AvailableInstanceCount' => array(
                                'type' => 'numeric',
                                'sentAs' => 'availableInstanceCount',
                            ),
                            'MinTermDurationInDays' => array(
                                'type' => 'numeric',
                                'sentAs' => 'minTermDurationInDays',
                            ),
                            'MaxTermDurationInDays' => array(
                                'type' => 'numeric',
                                'sentAs' => 'maxTermDurationInDays',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeScheduledInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
                'ScheduledInstanceSet' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'scheduledInstanceSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ScheduledInstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'scheduledInstanceId',
                            ),
                            'InstanceType' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceType',
                            ),
                            'Platform' => array(
                                'type' => 'string',
                                'sentAs' => 'platform',
                            ),
                            'NetworkPlatform' => array(
                                'type' => 'string',
                                'sentAs' => 'networkPlatform',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'SlotDurationInHours' => array(
                                'type' => 'numeric',
                                'sentAs' => 'slotDurationInHours',
                            ),
                            'Recurrence' => array(
                                'type' => 'object',
                                'sentAs' => 'recurrence',
                                'properties' => array(
                                    'Frequency' => array(
                                        'type' => 'string',
                                        'sentAs' => 'frequency',
                                    ),
                                    'Interval' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'interval',
                                    ),
                                    'OccurrenceDaySet' => array(
                                        'type' => 'array',
                                        'sentAs' => 'occurrenceDaySet',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'numeric',
                                            'sentAs' => 'item',
                                        ),
                                    ),
                                    'OccurrenceRelativeToEnd' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'occurrenceRelativeToEnd',
                                    ),
                                    'OccurrenceUnit' => array(
                                        'type' => 'string',
                                        'sentAs' => 'occurrenceUnit',
                                    ),
                                ),
                            ),
                            'PreviousSlotEndTime' => array(
                                'type' => 'string',
                                'sentAs' => 'previousSlotEndTime',
                            ),
                            'NextSlotStartTime' => array(
                                'type' => 'string',
                                'sentAs' => 'nextSlotStartTime',
                            ),
                            'HourlyPrice' => array(
                                'type' => 'string',
                                'sentAs' => 'hourlyPrice',
                            ),
                            'TotalScheduledInstanceHours' => array(
                                'type' => 'numeric',
                                'sentAs' => 'totalScheduledInstanceHours',
                            ),
                            'InstanceCount' => array(
                                'type' => 'numeric',
                                'sentAs' => 'instanceCount',
                            ),
                            'TermStartDate' => array(
                                'type' => 'string',
                                'sentAs' => 'termStartDate',
                            ),
                            'TermEndDate' => array(
                                'type' => 'string',
                                'sentAs' => 'termEndDate',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                                'sentAs' => 'createDate',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'PurchaseScheduledInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ScheduledInstanceSet' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'scheduledInstanceSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ScheduledInstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'scheduledInstanceId',
                            ),
                            'InstanceType' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceType',
                            ),
                            'Platform' => array(
                                'type' => 'string',
                                'sentAs' => 'platform',
                            ),
                            'NetworkPlatform' => array(
                                'type' => 'string',
                                'sentAs' => 'networkPlatform',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'SlotDurationInHours' => array(
                                'type' => 'numeric',
                                'sentAs' => 'slotDurationInHours',
                            ),
                            'Recurrence' => array(
                                'type' => 'object',
                                'sentAs' => 'recurrence',
                                'properties' => array(
                                    'Frequency' => array(
                                        'type' => 'string',
                                        'sentAs' => 'frequency',
                                    ),
                                    'Interval' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'interval',
                                    ),
                                    'OccurrenceDaySet' => array(
                                        'type' => 'array',
                                        'sentAs' => 'occurrenceDaySet',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'numeric',
                                            'sentAs' => 'item',
                                        ),
                                    ),
                                    'OccurrenceRelativeToEnd' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'occurrenceRelativeToEnd',
                                    ),
                                    'OccurrenceUnit' => array(
                                        'type' => 'string',
                                        'sentAs' => 'occurrenceUnit',
                                    ),
                                ),
                            ),
                            'PreviousSlotEndTime' => array(
                                'type' => 'string',
                                'sentAs' => 'previousSlotEndTime',
                            ),
                            'NextSlotStartTime' => array(
                                'type' => 'string',
                                'sentAs' => 'nextSlotStartTime',
                            ),
                            'HourlyPrice' => array(
                                'type' => 'string',
                                'sentAs' => 'hourlyPrice',
                            ),
                            'TotalScheduledInstanceHours' => array(
                                'type' => 'numeric',
                                'sentAs' => 'totalScheduledInstanceHours',
                            ),
                            'InstanceCount' => array(
                                'type' => 'numeric',
                                'sentAs' => 'instanceCount',
                            ),
                            'TermStartDate' => array(
                                'type' => 'string',
                                'sentAs' => 'termStartDate',
                            ),
                            'TermEndDate' => array(
                                'type' => 'string',
                                'sentAs' => 'termEndDate',
                            ),
                            'CreateDate' => array(
                                'type' => 'string',
                                'sentAs' => 'createDate',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RunScheduledInstancesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceIdSet' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'instanceIdSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'string',
                        'sentAs' => 'item',
                    ),
                ),
            ),
        ),
        'RequestSpotFleetResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SpotFleetRequestId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'spotFleetRequestId',
                ),
            ),
        ),
        'DescribeSpotFleetRequestsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SpotFleetRequestConfigs' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'spotFleetRequestConfigSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'SpotFleetRequestId' => array(
                                'type' => 'string',
                                'sentAs' => 'spotFleetRequestId',
                            ),
                            'SpotFleetRequestState' => array(
                                'type' => 'string',
                                'sentAs' => 'spotFleetRequestState',
                            ),
                            'SpotFleetRequestConfig' => array(
                                'type' => 'object',
                                'sentAs' => 'spotFleetRequestConfig',
                                'properties' => array(
                                    'ClientToken' => array(
                                        'type' => 'string',
                                        'sentAs' => 'clientToken',
                                    ),
                                    'SpotPrice' => array(
                                        'type' => 'string',
                                        'sentAs' => 'spotPrice',
                                    ),
                                    'TargetCapacity' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'targetCapacity',
                                    ),
                                    'ValidFrom' => array(
                                        'type' => 'string',
                                        'sentAs' => 'validFrom',
                                    ),
                                    'ValidUntil' => array(
                                        'type' => 'string',
                                        'sentAs' => 'validUntil',
                                    ),
                                    'TerminateInstancesWithExpiration' => array(
                                        'type' => 'boolean',
                                        'sentAs' => 'terminateInstancesWithExpiration',
                                    ),
                                    'IamFleetRole' => array(
                                        'type' => 'string',
                                        'sentAs' => 'iamFleetRole',
                                    ),
                                    'LaunchSpecifications' => array(
                                        'type' => 'array',
                                        'sentAs' => 'launchSpecifications',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'ImageId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'imageId',
                                                ),
                                                'KeyName' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'keyName',
                                                ),
                                                'SecurityGroups' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'groupSet',
                                                    'items' => array(
                                                        'name' => 'item',
                                                        'type' => 'object',
                                                        'sentAs' => 'item',
                                                        'properties' => array(
                                                            'GroupName' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'groupName',
                                                            ),
                                                            'GroupId' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'groupId',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'UserData' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'userData',
                                                ),
                                                'AddressingType' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'addressingType',
                                                ),
                                                'InstanceType' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'instanceType',
                                                ),
                                                'Placement' => array(
                                                    'type' => 'object',
                                                    'sentAs' => 'placement',
                                                    'properties' => array(
                                                        'AvailabilityZone' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'availabilityZone',
                                                        ),
                                                        'GroupName' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'groupName',
                                                        ),
                                                    ),
                                                ),
                                                'KernelId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'kernelId',
                                                ),
                                                'RamdiskId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'ramdiskId',
                                                ),
                                                'BlockDeviceMappings' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'blockDeviceMapping',
                                                    'items' => array(
                                                        'name' => 'item',
                                                        'type' => 'object',
                                                        'sentAs' => 'item',
                                                        'properties' => array(
                                                            'VirtualName' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'virtualName',
                                                            ),
                                                            'DeviceName' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'deviceName',
                                                            ),
                                                            'Ebs' => array(
                                                                'type' => 'object',
                                                                'sentAs' => 'ebs',
                                                                'properties' => array(
                                                                    'SnapshotId' => array(
                                                                        'type' => 'string',
                                                                        'sentAs' => 'snapshotId',
                                                                    ),
                                                                    'VolumeSize' => array(
                                                                        'type' => 'numeric',
                                                                        'sentAs' => 'volumeSize',
                                                                    ),
                                                                    'DeleteOnTermination' => array(
                                                                        'type' => 'boolean',
                                                                        'sentAs' => 'deleteOnTermination',
                                                                    ),
                                                                    'VolumeType' => array(
                                                                        'type' => 'string',
                                                                        'sentAs' => 'volumeType',
                                                                    ),
                                                                    'Iops' => array(
                                                                        'type' => 'numeric',
                                                                        'sentAs' => 'iops',
                                                                    ),
                                                                    'Encrypted' => array(
                                                                        'type' => 'boolean',
                                                                        'sentAs' => 'encrypted',
                                                                    ),
                                                                ),
                                                            ),
                                                            'NoDevice' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'noDevice',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'Monitoring' => array(
                                                    'type' => 'object',
                                                    'sentAs' => 'monitoring',
                                                    'properties' => array(
                                                        'Enabled' => array(
                                                            'type' => 'boolean',
                                                            'sentAs' => 'enabled',
                                                        ),
                                                    ),
                                                ),
                                                'SubnetId' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'subnetId',
                                                ),
                                                'NetworkInterfaces' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'networkInterfaceSet',
                                                    'items' => array(
                                                        'name' => 'item',
                                                        'type' => 'object',
                                                        'sentAs' => 'item',
                                                        'properties' => array(
                                                            'NetworkInterfaceId' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'networkInterfaceId',
                                                            ),
                                                            'DeviceIndex' => array(
                                                                'type' => 'numeric',
                                                                'sentAs' => 'deviceIndex',
                                                            ),
                                                            'SubnetId' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'subnetId',
                                                            ),
                                                            'Description' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'description',
                                                            ),
                                                            'PrivateIpAddress' => array(
                                                                'type' => 'string',
                                                                'sentAs' => 'privateIpAddress',
                                                            ),
                                                            'Groups' => array(
                                                                'type' => 'array',
                                                                'sentAs' => 'SecurityGroupId',
                                                                'items' => array(
                                                                    'name' => 'SecurityGroupId',
                                                                    'type' => 'string',
                                                                    'sentAs' => 'SecurityGroupId',
                                                                ),
                                                            ),
                                                            'DeleteOnTermination' => array(
                                                                'type' => 'boolean',
                                                                'sentAs' => 'deleteOnTermination',
                                                            ),
                                                            'PrivateIpAddresses' => array(
                                                                'type' => 'array',
                                                                'sentAs' => 'privateIpAddressesSet',
                                                                'items' => array(
                                                                    'name' => 'item',
                                                                    'type' => 'object',
                                                                    'sentAs' => 'item',
                                                                    'properties' => array(
                                                                        'PrivateIpAddress' => array(
                                                                            'type' => 'string',
                                                                            'sentAs' => 'privateIpAddress',
                                                                        ),
                                                                        'Primary' => array(
                                                                            'type' => 'boolean',
                                                                            'sentAs' => 'primary',
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                            'SecondaryPrivateIpAddressCount' => array(
                                                                'type' => 'numeric',
                                                                'sentAs' => 'secondaryPrivateIpAddressCount',
                                                            ),
                                                            'AssociatePublicIpAddress' => array(
                                                                'type' => 'boolean',
                                                                'sentAs' => 'associatePublicIpAddress',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'IamInstanceProfile' => array(
                                                    'type' => 'object',
                                                    'sentAs' => 'iamInstanceProfile',
                                                    'properties' => array(
                                                        'Arn' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'arn',
                                                        ),
                                                        'Name' => array(
                                                            'type' => 'string',
                                                            'sentAs' => 'name',
                                                        ),
                                                    ),
                                                ),
                                                'EbsOptimized' => array(
                                                    'type' => 'boolean',
                                                    'sentAs' => 'ebsOptimized',
                                                ),
                                                'WeightedCapacity' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'weightedCapacity',
                                                ),
                                                'SpotPrice' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'spotPrice',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'ExcessCapacityTerminationPolicy' => array(
                                        'type' => 'string',
                                        'sentAs' => 'excessCapacityTerminationPolicy',
                                    ),
                                    'AllocationStrategy' => array(
                                        'type' => 'string',
                                        'sentAs' => 'allocationStrategy',
                                    ),
                                ),
                            ),
                            'CreateTime' => array(
                                'type' => 'string',
                                'sentAs' => 'createTime',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DescribeSpotFleetInstancesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SpotFleetRequestId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'spotFleetRequestId',
                ),
                'ActiveInstances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'activeInstanceSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'InstanceType' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceType',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                                'sentAs' => 'instanceId',
                            ),
                            'SpotInstanceRequestId' => array(
                                'type' => 'string',
                                'sentAs' => 'spotInstanceRequestId',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'CancelSpotFleetRequestsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'UnsuccessfulFleetRequests' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'unsuccessfulFleetRequestSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'SpotFleetRequestId' => array(
                                'type' => 'string',
                                'sentAs' => 'spotFleetRequestId',
                            ),
                            'Error' => array(
                                'type' => 'object',
                                'sentAs' => 'error',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'SuccessfulFleetRequests' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'successfulFleetRequestSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'SpotFleetRequestId' => array(
                                'type' => 'string',
                                'sentAs' => 'spotFleetRequestId',
                            ),
                            'CurrentSpotFleetRequestState' => array(
                                'type' => 'string',
                                'sentAs' => 'currentSpotFleetRequestState',
                            ),
                            'PreviousSpotFleetRequestState' => array(
                                'type' => 'string',
                                'sentAs' => 'previousSpotFleetRequestState',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSpotFleetRequestHistoryResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SpotFleetRequestId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'spotFleetRequestId',
                ),
                'StartTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'startTime',
                ),
                'LastEvaluatedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'lastEvaluatedTime',
                ),
                'HistoryRecords' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'historyRecordSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'Timestamp' => array(
                                'type' => 'string',
                                'sentAs' => 'timestamp',
                            ),
                            'EventType' => array(
                                'type' => 'string',
                                'sentAs' => 'eventType',
                            ),
                            'EventInformation' => array(
                                'type' => 'object',
                                'sentAs' => 'eventInformation',
                                'properties' => array(
                                    'InstanceId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'instanceId',
                                    ),
                                    'EventSubType' => array(
                                        'type' => 'string',
                                        'sentAs' => 'eventSubType',
                                    ),
                                    'EventDescription' => array(
                                        'type' => 'string',
                                        'sentAs' => 'eventDescription',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'ModifySpotFleetRequestResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'CreateFlowLogsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'FlowLogIds' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'flowLogIdSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'string',
                        'sentAs' => 'item',
                    ),
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'clientToken',
                ),
                'Unsuccessful' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'unsuccessful',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                                'sentAs' => 'resourceId',
                            ),
                            'Error' => array(
                                'type' => 'object',
                                'sentAs' => 'error',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteFlowLogsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Unsuccessful' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'unsuccessful',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                                'sentAs' => 'resourceId',
                            ),
                            'Error' => array(
                                'type' => 'object',
                                'sentAs' => 'error',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeFlowLogsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'FlowLogs' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'flowLogSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'CreationTime' => array(
                                'type' => 'string',
                                'sentAs' => 'creationTime',
                            ),
                            'FlowLogId' => array(
                                'type' => 'string',
                                'sentAs' => 'flowLogId',
                            ),
                            'FlowLogStatus' => array(
                                'type' => 'string',
                                'sentAs' => 'flowLogStatus',
                            ),
                            'ResourceId' => array(
                                'type' => 'string',
                                'sentAs' => 'resourceId',
                            ),
                            'TrafficType' => array(
                                'type' => 'string',
                                'sentAs' => 'trafficType',
                            ),
                            'LogGroupName' => array(
                                'type' => 'string',
                                'sentAs' => 'logGroupName',
                            ),
                            'DeliverLogsStatus' => array(
                                'type' => 'string',
                                'sentAs' => 'deliverLogsStatus',
                            ),
                            'DeliverLogsErrorMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'deliverLogsErrorMessage',
                            ),
                            'DeliverLogsPermissionArn' => array(
                                'type' => 'string',
                                'sentAs' => 'deliverLogsPermissionArn',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'AllocateHostsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HostIds' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'hostIdSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'string',
                        'sentAs' => 'item',
                    ),
                ),
            ),
        ),
        'ModifyInstancePlacementResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Return' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                    'sentAs' => 'return',
                ),
            ),
        ),
        'ModifyHostsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Successful' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'successful',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'string',
                        'sentAs' => 'item',
                    ),
                ),
                'Unsuccessful' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'unsuccessful',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                                'sentAs' => 'resourceId',
                            ),
                            'Error' => array(
                                'type' => 'object',
                                'sentAs' => 'error',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeHostsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Hosts' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'hostSet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'HostId' => array(
                                'type' => 'string',
                                'sentAs' => 'hostId',
                            ),
                            'AutoPlacement' => array(
                                'type' => 'string',
                                'sentAs' => 'autoPlacement',
                            ),
                            'HostReservationId' => array(
                                'type' => 'string',
                                'sentAs' => 'hostReservationId',
                            ),
                            'ClientToken' => array(
                                'type' => 'string',
                                'sentAs' => 'clientToken',
                            ),
                            'HostProperties' => array(
                                'type' => 'object',
                                'sentAs' => 'hostProperties',
                                'properties' => array(
                                    'Sockets' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'sockets',
                                    ),
                                    'Cores' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'cores',
                                    ),
                                    'TotalVCpus' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'totalVCpus',
                                    ),
                                    'InstanceType' => array(
                                        'type' => 'string',
                                        'sentAs' => 'instanceType',
                                    ),
                                ),
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                                'sentAs' => 'availabilityZone',
                            ),
                            'Instances' => array(
                                'type' => 'array',
                                'sentAs' => 'instances',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'InstanceId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'instanceId',
                                        ),
                                        'InstanceType' => array(
                                            'type' => 'string',
                                            'sentAs' => 'instanceType',
                                        ),
                                    ),
                                ),
                            ),
                            'AvailableCapacity' => array(
                                'type' => 'object',
                                'sentAs' => 'availableCapacity',
                                'properties' => array(
                                    'AvailableInstanceCapacity' => array(
                                        'type' => 'array',
                                        'sentAs' => 'availableInstanceCapacity',
                                        'items' => array(
                                            'name' => 'item',
                                            'type' => 'object',
                                            'sentAs' => 'item',
                                            'properties' => array(
                                                'InstanceType' => array(
                                                    'type' => 'string',
                                                    'sentAs' => 'instanceType',
                                                ),
                                                'AvailableCapacity' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'availableCapacity',
                                                ),
                                                'TotalCapacity' => array(
                                                    'type' => 'numeric',
                                                    'sentAs' => 'totalCapacity',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'AvailableVCpus' => array(
                                        'type' => 'numeric',
                                        'sentAs' => 'availableVCpus',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'ReleaseHostsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Successful' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'successful',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'string',
                        'sentAs' => 'item',
                    ),
                ),
                'Unsuccessful' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'unsuccessful',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                                'sentAs' => 'resourceId',
                            ),
                            'Error' => array(
                                'type' => 'object',
                                'sentAs' => 'error',
                                'properties' => array(
                                    'Code' => array(
                                        'type' => 'string',
                                        'sentAs' => 'code',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                        'sentAs' => 'message',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateNatGatewayResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NatGateway' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'sentAs' => 'natGateway',
                    'properties' => array(
                        'VpcId' => array(
                            'type' => 'string',
                            'sentAs' => 'vpcId',
                        ),
                        'SubnetId' => array(
                            'type' => 'string',
                            'sentAs' => 'subnetId',
                        ),
                        'NatGatewayId' => array(
                            'type' => 'string',
                            'sentAs' => 'natGatewayId',
                        ),
                        'CreateTime' => array(
                            'type' => 'string',
                            'sentAs' => 'createTime',
                        ),
                        'DeleteTime' => array(
                            'type' => 'string',
                            'sentAs' => 'deleteTime',
                        ),
                        'NatGatewayAddresses' => array(
                            'type' => 'array',
                            'sentAs' => 'natGatewayAddressSet',
                            'items' => array(
                                'name' => 'item',
                                'type' => 'object',
                                'sentAs' => 'item',
                                'properties' => array(
                                    'PublicIp' => array(
                                        'type' => 'string',
                                        'sentAs' => 'publicIp',
                                    ),
                                    'AllocationId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'allocationId',
                                    ),
                                    'PrivateIp' => array(
                                        'type' => 'string',
                                        'sentAs' => 'privateIp',
                                    ),
                                    'NetworkInterfaceId' => array(
                                        'type' => 'string',
                                        'sentAs' => 'networkInterfaceId',
                                    ),
                                ),
                            ),
                        ),
                        'State' => array(
                            'type' => 'string',
                            'sentAs' => 'state',
                        ),
                        'FailureCode' => array(
                            'type' => 'string',
                            'sentAs' => 'failureCode',
                        ),
                        'FailureMessage' => array(
                            'type' => 'string',
                            'sentAs' => 'failureMessage',
                        ),
                    ),
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'clientToken',
                ),
            ),
        ),
        'DescribeNatGatewaysResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NatGateways' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'natGatewaySet',
                    'items' => array(
                        'name' => 'item',
                        'type' => 'object',
                        'sentAs' => 'item',
                        'properties' => array(
                            'VpcId' => array(
                                'type' => 'string',
                                'sentAs' => 'vpcId',
                            ),
                            'SubnetId' => array(
                                'type' => 'string',
                                'sentAs' => 'subnetId',
                            ),
                            'NatGatewayId' => array(
                                'type' => 'string',
                                'sentAs' => 'natGatewayId',
                            ),
                            'CreateTime' => array(
                                'type' => 'string',
                                'sentAs' => 'createTime',
                            ),
                            'DeleteTime' => array(
                                'type' => 'string',
                                'sentAs' => 'deleteTime',
                            ),
                            'NatGatewayAddresses' => array(
                                'type' => 'array',
                                'sentAs' => 'natGatewayAddressSet',
                                'items' => array(
                                    'name' => 'item',
                                    'type' => 'object',
                                    'sentAs' => 'item',
                                    'properties' => array(
                                        'PublicIp' => array(
                                            'type' => 'string',
                                            'sentAs' => 'publicIp',
                                        ),
                                        'AllocationId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'allocationId',
                                        ),
                                        'PrivateIp' => array(
                                            'type' => 'string',
                                            'sentAs' => 'privateIp',
                                        ),
                                        'NetworkInterfaceId' => array(
                                            'type' => 'string',
                                            'sentAs' => 'networkInterfaceId',
                                        ),
                                    ),
                                ),
                            ),
                            'State' => array(
                                'type' => 'string',
                                'sentAs' => 'state',
                            ),
                            'FailureCode' => array(
                                'type' => 'string',
                                'sentAs' => 'failureCode',
                            ),
                            'FailureMessage' => array(
                                'type' => 'string',
                                'sentAs' => 'failureMessage',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'nextToken',
                ),
            ),
        ),
        'DeleteNatGatewayResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NatGatewayId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                    'sentAs' => 'natGatewayId',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'DescribeAccountAttributes' => array(
            'result_key' => 'AccountAttributes',
        ),
        'DescribeAddresses' => array(
            'result_key' => 'Addresses',
        ),
        'DescribeAvailabilityZones' => array(
            'result_key' => 'AvailabilityZones',
        ),
        'DescribeBundleTasks' => array(
            'result_key' => 'BundleTasks',
        ),
        'DescribeConversionTasks' => array(
            'result_key' => 'ConversionTasks',
        ),
        'DescribeCustomerGateways' => array(
            'result_key' => 'CustomerGateways',
        ),
        'DescribeDhcpOptions' => array(
            'result_key' => 'DhcpOptions',
        ),
        'DescribeExportTasks' => array(
            'result_key' => 'ExportTasks',
        ),
        'DescribeImages' => array(
            'result_key' => 'Images',
        ),
        'DescribeInstanceStatus' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxResults',
            'result_key' => 'InstanceStatuses',
        ),
        'DescribeInstances' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxResults',
            'result_key' => 'Reservations',
        ),
        'DescribeInternetGateways' => array(
            'result_key' => 'InternetGateways',
        ),
        'DescribeKeyPairs' => array(
            'result_key' => 'KeyPairs',
        ),
        'DescribeNetworkAcls' => array(
            'result_key' => 'NetworkAcls',
        ),
        'DescribeNetworkInterfaces' => array(
            'result_key' => 'NetworkInterfaces',
        ),
        'DescribePlacementGroups' => array(
            'result_key' => 'PlacementGroups',
        ),
        'DescribeRegions' => array(
            'result_key' => 'Regions',
        ),
        'DescribeReservedInstances' => array(
            'result_key' => 'ReservedInstances',
        ),
        'DescribeReservedInstancesListings' => array(
            'result_key' => 'ReservedInstancesListings',
        ),
        'DescribeReservedInstancesOfferings' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxResults',
            'result_key' => 'ReservedInstancesOfferings',
        ),
        'DescribeReservedInstancesModifications' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'result_key' => 'ReservedInstancesModifications',
        ),
        'DescribeRouteTables' => array(
            'result_key' => 'RouteTables',
        ),
        'DescribeSecurityGroups' => array(
            'result_key' => 'SecurityGroups',
        ),
        'DescribeSnapshots' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxResults',
            'result_key' => 'Snapshots',
        ),
        'DescribeSpotInstanceRequests' => array(
            'result_key' => 'SpotInstanceRequests',
        ),
        'DescribeSpotPriceHistory' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxResults',
            'result_key' => 'SpotPriceHistory',
        ),
        'DescribeSubnets' => array(
            'result_key' => 'Subnets',
        ),
        'DescribeTags' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxResults',
            'result_key' => 'Tags',
        ),
        'DescribeVolumeStatus' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxResults',
            'result_key' => 'VolumeStatuses',
        ),
        'DescribeVolumes' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxResults',
            'result_key' => 'Volumes',
        ),
        'DescribeVpcs' => array(
            'result_key' => 'Vpcs',
        ),
        'DescribeVpnConnections' => array(
            'result_key' => 'VpnConnections',
        ),
        'DescribeVpnGateways' => array(
            'result_key' => 'VpnGateways',
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'interval' => 15,
            'max_attempts' => 40,
            'acceptor.type' => 'output',
        ),
        '__InstanceState' => array(
            'operation' => 'DescribeInstances',
            'acceptor.path' => 'Reservations/*/Instances/*/State/Name',
        ),
        'InstanceRunning' => array(
            'extends' => '__InstanceState',
            'success.value' => 'running',
            'failure.value' => array(
                'shutting-down',
                'terminated',
                'stopping',
            ),
        ),
        'InstanceStopped' => array(
            'extends' => '__InstanceState',
            'success.value' => 'stopped',
            'failure.value' => array(
                'pending',
                'terminated',
            ),
        ),
        'InstanceTerminated' => array(
            'extends' => '__InstanceState',
            'success.value' => 'terminated',
            'failure.value' => array(
                'pending',
                'stopping',
            ),
        ),
        '__ExportTaskState' => array(
            'operation' => 'DescribeExportTasks',
            'acceptor.path' => 'ExportTasks/*/State',
        ),
        'ExportTaskCompleted' => array(
            'extends' => '__ExportTaskState',
            'success.value' => 'completed',
        ),
        'ExportTaskCancelled' => array(
            'extends' => '__ExportTaskState',
            'success.value' => 'cancelled',
        ),
        'SnapshotCompleted' => array(
            'operation' => 'DescribeSnapshots',
            'success.path' => 'Snapshots/*/State',
            'success.value' => 'completed',
        ),
        'SubnetAvailable' => array(
            'operation' => 'DescribeSubnets',
            'success.path' => 'Subnets/*/State',
            'success.value' => 'available',
        ),
        '__VolumeStatus' => array(
            'operation' => 'DescribeVolumes',
            'acceptor.key' => 'VolumeStatuses/*/VolumeStatus/Status',
        ),
        'VolumeAvailable' => array(
            'extends' => '__VolumeStatus',
            'success.value' => 'available',
            'failure.value' => array(
                'deleted',
            ),
        ),
        'VolumeInUse' => array(
            'extends' => '__VolumeStatus',
            'success.value' => 'in-use',
            'failure.value' => array(
                'deleted',
            ),
        ),
        'VolumeDeleted' => array(
            'extends' => '__VolumeStatus',
            'success.value' => 'deleted',
        ),
        'VpcAvailable' => array(
            'operation' => 'DescribeVpcs',
            'success.path' => 'Vpcs/*/State',
            'success.value' => 'available',
        ),
        '__VpnConnectionState' => array(
            'operation' => 'DescribeVpnConnections',
            'acceptor.path' => 'VpnConnections/*/State',
        ),
        'VpnConnectionAvailable' => array(
            'extends' => '__VpnConnectionState',
            'success.value' => 'available',
            'failure.value' => array(
                'deleting',
                'deleted',
            ),
        ),
        'VpnConnectionDeleted' => array(
            'extends' => '__VpnConnectionState',
            'success.value' => 'deleted',
            'failure.value' => array(
                'pending',
            ),
        ),
        'BundleTaskComplete' => array(
            'operation' => 'DescribeBundleTasks',
            'acceptor.path' => 'BundleTasks/*/State',
            'success.value' => 'complete',
            'failure.value' => array(
                'failed',
            ),
        ),
        '__ConversionTaskState' => array(
            'operation' => 'DescribeConversionTasks',
            'acceptor.path' => 'ConversionTasks/*/State',
        ),
        'ConversionTaskCompleted' => array(
            'extends' => '__ConversionTaskState',
            'success.value' => 'completed',
            'failure.value' => array(
                'cancelled',
                'cancelling',
            ),
        ),
        'ConversionTaskCancelled' => array(
            'extends' => '__ConversionTaskState',
            'success.value' => 'cancelled',
        ),
        '__CustomerGatewayState' => array(
            'operation' => 'DescribeCustomerGateways',
            'acceptor.path' => 'CustomerGateways/*/State',
        ),
        'CustomerGatewayAvailable' => array(
            'extends' => '__CustomerGatewayState',
            'success.value' => 'available',
            'failure.value' => array(
                'deleted',
                'deleting',
            ),
        ),
        'ConversionTaskDeleted' => array(
            'extends' => '__CustomerGatewayState',
            'success.value' => 'deleted',
        ),
    ),
);
