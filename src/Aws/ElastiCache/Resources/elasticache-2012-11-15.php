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
    'apiVersion' => '2012-11-15',
    'endpointPrefix' => 'elasticache',
    'serviceFullName' => 'Amazon ElastiCache',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v2',
    'namespace' => 'ElastiCache',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'elasticache.sa-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AuthorizeCacheSecurityGroupIngress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AuthorizeCacheSecurityGroupIngress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupOwnerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'CacheSecurityGroupName does not refer to an existing Cache Security Group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'The state of the Cache Security Group does not allow deletion.',
                    'class' => 'InvalidCacheSecurityGroupStateException',
                ),
                array(
                    'reason' => 'The specified EC2 Security Group is already authorized for the specified Cache Security Group.',
                    'class' => 'AuthorizationAlreadyExistsException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'CreateCacheCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateCacheCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NumCacheNodes' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'CacheNodeType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
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
                'CacheParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheSubnetGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheSecurityGroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CacheSecurityGroupNames.member',
                    'items' => array(
                        'name' => 'CacheSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'SecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroupIds.member',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'PreferredAvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Port' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NotificationTopicArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AutoMinorVersionUpgrade' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'User already has a Cache Cluster with the given identifier.',
                    'class' => 'CacheClusterAlreadyExistsException',
                ),
                array(
                    'reason' => 'Specified Cache node type is not available in the specified Availability Zone.',
                    'class' => 'InsufficientCacheClusterCapacityException',
                ),
                array(
                    'reason' => 'CacheSecurityGroupName does not refer to an existing Cache Security Group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'CacheSubnetGroupName does not refer to an existing Cache Subnet Group.',
                    'class' => 'CacheSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of Cache Clusters per customer.',
                    'class' => 'ClusterQuotaForCustomerExceededException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of Cache Nodes in a single Cache Cluster.',
                    'class' => 'NodeQuotaForClusterExceededException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of Cache Nodes per customer.',
                    'class' => 'NodeQuotaForCustomerExceededException',
                ),
                array(
                    'reason' => 'CacheParameterGroupName does not refer to an existing Cache Parameter Group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'CreateCacheParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheParameterGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateCacheParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheParameterGroupFamily' => array(
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
                    'reason' => 'Request would result in user exceeding the allowed number of Cache Parameter Groups.',
                    'class' => 'CacheParameterGroupQuotaExceededException',
                ),
                array(
                    'reason' => 'A Cache Parameter Group with the name specified in CacheParameterGroupName already exists.',
                    'class' => 'CacheParameterGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'The state of the Cache Parameter Group does not allow for the requested action to occur.',
                    'class' => 'InvalidCacheParameterGroupStateException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'CreateCacheSecurityGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateCacheSecurityGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheSecurityGroupName' => array(
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
                    'reason' => 'A Cache Security Group with the name specified in CacheSecurityGroupName already exists.',
                    'class' => 'CacheSecurityGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of Cache Security Groups.',
                    'class' => 'CacheSecurityGroupQuotaExceededException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'CreateCacheSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSubnetGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateCacheSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheSubnetGroupDescription' => array(
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
                    'reason' => 'CacheSubnetGroupName is already used by an existing Cache Subnet Group.',
                    'class' => 'CacheSubnetGroupAlreadyExistsException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of Cache Subnet Groups.',
                    'class' => 'CacheSubnetGroupQuotaExceededException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of subnets in a Cache Subnet Group.',
                    'class' => 'CacheSubnetQuotaExceededException',
                ),
                array(
                    'reason' => 'Request subnet is invalid, or all subnets are not in the same VPC.',
                    'class' => 'InvalidSubnetException',
                ),
            ),
        ),
        'DeleteCacheCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteCacheCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'CacheClusterId does not refer to an existing Cache Cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
                array(
                    'reason' => 'The specified Cache Cluster is not in the available state.',
                    'class' => 'InvalidCacheClusterStateException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DeleteCacheParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteCacheParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The state of the Cache Parameter Group does not allow for the requested action to occur.',
                    'class' => 'InvalidCacheParameterGroupStateException',
                ),
                array(
                    'reason' => 'CacheParameterGroupName does not refer to an existing Cache Parameter Group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DeleteCacheSecurityGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteCacheSecurityGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The state of the Cache Security Group does not allow deletion.',
                    'class' => 'InvalidCacheSecurityGroupStateException',
                ),
                array(
                    'reason' => 'CacheSecurityGroupName does not refer to an existing Cache Security Group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DeleteCacheSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteCacheSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Request cache subnet group is currently in use.',
                    'class' => 'CacheSubnetGroupInUseException',
                ),
                array(
                    'reason' => 'CacheSubnetGroupName does not refer to an existing Cache Subnet Group.',
                    'class' => 'CacheSubnetGroupNotFoundException',
                ),
            ),
        ),
        'DescribeCacheClusters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheClusterMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheClusters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheClusterId' => array(
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
                'ShowCacheNodeInfo' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'CacheClusterId does not refer to an existing Cache Cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeCacheEngineVersions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheEngineVersionMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheEngineVersions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'Engine' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EngineVersion' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheParameterGroupFamily' => array(
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
            ),
        ),
        'DescribeCacheParameterGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheParameterGroupsMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheParameterGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheParameterGroupName' => array(
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
                    'reason' => 'CacheParameterGroupName does not refer to an existing Cache Parameter Group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeCacheParameters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheParameterGroupDetails',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheParameters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheParameterGroupName' => array(
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
                    'reason' => 'CacheParameterGroupName does not refer to an existing Cache Parameter Group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeCacheSecurityGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSecurityGroupMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheSecurityGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheSecurityGroupName' => array(
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
                    'reason' => 'CacheSecurityGroupName does not refer to an existing Cache Security Group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeCacheSubnetGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSubnetGroupMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeCacheSubnetGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheSubnetGroupName' => array(
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
                    'reason' => 'CacheSubnetGroupName does not refer to an existing Cache Subnet Group.',
                    'class' => 'CacheSubnetGroupNotFoundException',
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
                    'default' => '2012-11-15',
                ),
                'CacheParameterGroupFamily' => array(
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
            'errorResponses' => array(
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
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
                    'default' => '2012-11-15',
                ),
                'SourceIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SourceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'enum' => array(
                        'cache-cluster',
                        'cache-parameter-group',
                        'cache-security-group',
                        'cache-subnet-group',
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
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeReservedCacheNodes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedCacheNodeMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedCacheNodes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'ReservedCacheNodeId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReservedCacheNodesOfferingId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheNodeType' => array(
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
                    'reason' => 'The specified reserved Cache Node not found.',
                    'class' => 'ReservedCacheNodeNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'DescribeReservedCacheNodesOfferings' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedCacheNodesOfferingMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeReservedCacheNodesOfferings',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'ReservedCacheNodesOfferingId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheNodeType' => array(
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
                    'class' => 'ReservedCacheNodesOfferingNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'ModifyCacheCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyCacheCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NumCacheNodes' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'CacheNodeIdsToRemove' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CacheNodeIdsToRemove.member',
                    'items' => array(
                        'name' => 'CacheNodeId',
                        'type' => 'string',
                    ),
                ),
                'CacheSecurityGroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CacheSecurityGroupNames.member',
                    'items' => array(
                        'name' => 'CacheSecurityGroupName',
                        'type' => 'string',
                    ),
                ),
                'SecurityGroupIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroupIds.member',
                    'items' => array(
                        'name' => 'SecurityGroupId',
                        'type' => 'string',
                    ),
                ),
                'PreferredMaintenanceWindow' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NotificationTopicArn' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NotificationTopicStatus' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ApplyImmediately' => array(
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
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified Cache Cluster is not in the available state.',
                    'class' => 'InvalidCacheClusterStateException',
                ),
                array(
                    'reason' => 'The state of the Cache Security Group does not allow deletion.',
                    'class' => 'InvalidCacheSecurityGroupStateException',
                ),
                array(
                    'reason' => 'CacheClusterId does not refer to an existing Cache Cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of Cache Nodes in a single Cache Cluster.',
                    'class' => 'NodeQuotaForClusterExceededException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of Cache Nodes per customer.',
                    'class' => 'NodeQuotaForCustomerExceededException',
                ),
                array(
                    'reason' => 'CacheSecurityGroupName does not refer to an existing Cache Security Group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'CacheParameterGroupName does not refer to an existing Cache Parameter Group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'class' => 'InvalidVPCNetworkStateException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'ModifyCacheParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheParameterGroupNameMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyCacheParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ParameterNameValues' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ParameterNameValues.member',
                    'items' => array(
                        'name' => 'ParameterNameValue',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'CacheParameterGroupName does not refer to an existing Cache Parameter Group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'reason' => 'The state of the Cache Parameter Group does not allow for the requested action to occur.',
                    'class' => 'InvalidCacheParameterGroupStateException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'ModifyCacheSubnetGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSubnetGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ModifyCacheSubnetGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheSubnetGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheSubnetGroupDescription' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'SubnetIds' => array(
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
                    'reason' => 'CacheSubnetGroupName does not refer to an existing Cache Subnet Group.',
                    'class' => 'CacheSubnetGroupNotFoundException',
                ),
                array(
                    'reason' => 'Request would result in user exceeding the allowed number of subnets in a Cache Subnet Group.',
                    'class' => 'CacheSubnetQuotaExceededException',
                ),
                array(
                    'reason' => 'Request subnet is currently in use.',
                    'class' => 'SubnetInUseException',
                ),
                array(
                    'reason' => 'Request subnet is invalid, or all subnets are not in the same VPC.',
                    'class' => 'InvalidSubnetException',
                ),
            ),
        ),
        'PurchaseReservedCacheNodesOffering' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReservedCacheNodeWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PurchaseReservedCacheNodesOffering',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'ReservedCacheNodesOfferingId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReservedCacheNodeId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheNodeCount' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Specified offering does not exist.',
                    'class' => 'ReservedCacheNodesOfferingNotFoundException',
                ),
                array(
                    'reason' => 'User already has a reservation with the given identifier.',
                    'class' => 'ReservedCacheNodeAlreadyExistsException',
                ),
                array(
                    'reason' => 'Request would exceed the user\'s Cache Node quota.',
                    'class' => 'ReservedCacheNodeQuotaExceededException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'RebootCacheCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheClusterWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RebootCacheCluster',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'CacheNodeIdsToReboot' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'CacheNodeIdsToReboot.member',
                    'items' => array(
                        'name' => 'CacheNodeId',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified Cache Cluster is not in the available state.',
                    'class' => 'InvalidCacheClusterStateException',
                ),
                array(
                    'reason' => 'CacheClusterId does not refer to an existing Cache Cluster.',
                    'class' => 'CacheClusterNotFoundException',
                ),
            ),
        ),
        'ResetCacheParameterGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheParameterGroupNameMessage',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ResetCacheParameterGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheParameterGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ResetAllParameters' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'ParameterNameValues' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ParameterNameValues.member',
                    'items' => array(
                        'name' => 'ParameterNameValue',
                        'type' => 'object',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'ParameterValue' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The state of the Cache Parameter Group does not allow for the requested action to occur.',
                    'class' => 'InvalidCacheParameterGroupStateException',
                ),
                array(
                    'reason' => 'CacheParameterGroupName does not refer to an existing Cache Parameter Group.',
                    'class' => 'CacheParameterGroupNotFoundException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
        'RevokeCacheSecurityGroupIngress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CacheSecurityGroupWrapper',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RevokeCacheSecurityGroupIngress',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-15',
                ),
                'CacheSecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EC2SecurityGroupOwnerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'CacheSecurityGroupName does not refer to an existing Cache Security Group.',
                    'class' => 'CacheSecurityGroupNotFoundException',
                ),
                array(
                    'reason' => 'Specified EC2 Security Group is not authorized for the specified Cache Security Group.',
                    'class' => 'AuthorizationNotFoundException',
                ),
                array(
                    'reason' => 'The state of the Cache Security Group does not allow deletion.',
                    'class' => 'InvalidCacheSecurityGroupStateException',
                ),
                array(
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'InvalidParameterCombinationException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CacheSecurityGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CacheSecurityGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'OwnerId' => array(
                            'type' => 'string',
                        ),
                        'CacheSecurityGroupName' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
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
                                    'EC2SecurityGroupOwnerId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CacheClusterWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CacheCluster' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'CacheClusterId' => array(
                            'type' => 'string',
                        ),
                        'ConfigurationEndpoint' => array(
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
                        'ClientDownloadLandingPage' => array(
                            'type' => 'string',
                        ),
                        'CacheNodeType' => array(
                            'type' => 'string',
                        ),
                        'Engine' => array(
                            'type' => 'string',
                        ),
                        'EngineVersion' => array(
                            'type' => 'string',
                        ),
                        'CacheClusterStatus' => array(
                            'type' => 'string',
                        ),
                        'NumCacheNodes' => array(
                            'type' => 'numeric',
                        ),
                        'PreferredAvailabilityZone' => array(
                            'type' => 'string',
                        ),
                        'CacheClusterCreateTime' => array(
                            'type' => 'string',
                        ),
                        'PreferredMaintenanceWindow' => array(
                            'type' => 'string',
                        ),
                        'PendingModifiedValues' => array(
                            'type' => 'object',
                            'properties' => array(
                                'NumCacheNodes' => array(
                                    'type' => 'numeric',
                                ),
                                'CacheNodeIdsToRemove' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CacheNodeId',
                                        'type' => 'string',
                                        'sentAs' => 'CacheNodeId',
                                    ),
                                ),
                                'EngineVersion' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'NotificationConfiguration' => array(
                            'type' => 'object',
                            'properties' => array(
                                'TopicArn' => array(
                                    'type' => 'string',
                                ),
                                'TopicStatus' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'CacheSecurityGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheSecurityGroup',
                                'type' => 'object',
                                'sentAs' => 'CacheSecurityGroup',
                                'properties' => array(
                                    'CacheSecurityGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'Status' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'CacheParameterGroup' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CacheParameterGroupName' => array(
                                    'type' => 'string',
                                ),
                                'ParameterApplyStatus' => array(
                                    'type' => 'string',
                                ),
                                'CacheNodeIdsToReboot' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CacheNodeId',
                                        'type' => 'string',
                                        'sentAs' => 'CacheNodeId',
                                    ),
                                ),
                            ),
                        ),
                        'CacheSubnetGroupName' => array(
                            'type' => 'string',
                        ),
                        'CacheNodes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheNode',
                                'type' => 'object',
                                'sentAs' => 'CacheNode',
                                'properties' => array(
                                    'CacheNodeId' => array(
                                        'type' => 'string',
                                    ),
                                    'CacheNodeStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'CacheNodeCreateTime' => array(
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
                                    'ParameterGroupStatus' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'AutoMinorVersionUpgrade' => array(
                            'type' => 'boolean',
                        ),
                        'SecurityGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'SecurityGroupMembership',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'SecurityGroupId' => array(
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
        ),
        'CacheParameterGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CacheParameterGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'CacheParameterGroupName' => array(
                            'type' => 'string',
                        ),
                        'CacheParameterGroupFamily' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CacheSubnetGroupWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CacheSubnetGroup' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'CacheSubnetGroupName' => array(
                            'type' => 'string',
                        ),
                        'CacheSubnetGroupDescription' => array(
                            'type' => 'string',
                        ),
                        'VpcId' => array(
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
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'CacheClusterMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CacheClusters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheCluster',
                        'type' => 'object',
                        'sentAs' => 'CacheCluster',
                        'properties' => array(
                            'CacheClusterId' => array(
                                'type' => 'string',
                            ),
                            'ConfigurationEndpoint' => array(
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
                            'ClientDownloadLandingPage' => array(
                                'type' => 'string',
                            ),
                            'CacheNodeType' => array(
                                'type' => 'string',
                            ),
                            'Engine' => array(
                                'type' => 'string',
                            ),
                            'EngineVersion' => array(
                                'type' => 'string',
                            ),
                            'CacheClusterStatus' => array(
                                'type' => 'string',
                            ),
                            'NumCacheNodes' => array(
                                'type' => 'numeric',
                            ),
                            'PreferredAvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'CacheClusterCreateTime' => array(
                                'type' => 'string',
                            ),
                            'PreferredMaintenanceWindow' => array(
                                'type' => 'string',
                            ),
                            'PendingModifiedValues' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'NumCacheNodes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'CacheNodeIdsToRemove' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CacheNodeId',
                                            'type' => 'string',
                                            'sentAs' => 'CacheNodeId',
                                        ),
                                    ),
                                    'EngineVersion' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'NotificationConfiguration' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'TopicArn' => array(
                                        'type' => 'string',
                                    ),
                                    'TopicStatus' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'CacheSecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'CacheSecurityGroup',
                                    'type' => 'object',
                                    'sentAs' => 'CacheSecurityGroup',
                                    'properties' => array(
                                        'CacheSecurityGroupName' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'CacheParameterGroup' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CacheParameterGroupName' => array(
                                        'type' => 'string',
                                    ),
                                    'ParameterApplyStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'CacheNodeIdsToReboot' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CacheNodeId',
                                            'type' => 'string',
                                            'sentAs' => 'CacheNodeId',
                                        ),
                                    ),
                                ),
                            ),
                            'CacheSubnetGroupName' => array(
                                'type' => 'string',
                            ),
                            'CacheNodes' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'CacheNode',
                                    'type' => 'object',
                                    'sentAs' => 'CacheNode',
                                    'properties' => array(
                                        'CacheNodeId' => array(
                                            'type' => 'string',
                                        ),
                                        'CacheNodeStatus' => array(
                                            'type' => 'string',
                                        ),
                                        'CacheNodeCreateTime' => array(
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
                                        'ParameterGroupStatus' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'AutoMinorVersionUpgrade' => array(
                                'type' => 'boolean',
                            ),
                            'SecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'SecurityGroupMembership',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'SecurityGroupId' => array(
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
            ),
        ),
        'CacheEngineVersionMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CacheEngineVersions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheEngineVersion',
                        'type' => 'object',
                        'sentAs' => 'CacheEngineVersion',
                        'properties' => array(
                            'Engine' => array(
                                'type' => 'string',
                            ),
                            'EngineVersion' => array(
                                'type' => 'string',
                            ),
                            'CacheParameterGroupFamily' => array(
                                'type' => 'string',
                            ),
                            'CacheEngineDescription' => array(
                                'type' => 'string',
                            ),
                            'CacheEngineVersionDescription' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CacheParameterGroupsMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CacheParameterGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheParameterGroup',
                        'type' => 'object',
                        'sentAs' => 'CacheParameterGroup',
                        'properties' => array(
                            'CacheParameterGroupName' => array(
                                'type' => 'string',
                            ),
                            'CacheParameterGroupFamily' => array(
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
        'CacheParameterGroupDetails' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
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
                        ),
                    ),
                ),
                'CacheNodeTypeSpecificParameters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheNodeTypeSpecificParameter',
                        'type' => 'object',
                        'sentAs' => 'CacheNodeTypeSpecificParameter',
                        'properties' => array(
                            'ParameterName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Source' => array(
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
                            'CacheNodeTypeSpecificValues' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'CacheNodeTypeSpecificValue',
                                    'type' => 'object',
                                    'sentAs' => 'CacheNodeTypeSpecificValue',
                                    'properties' => array(
                                        'CacheNodeType' => array(
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
                ),
            ),
        ),
        'CacheSecurityGroupMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CacheSecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheSecurityGroup',
                        'type' => 'object',
                        'sentAs' => 'CacheSecurityGroup',
                        'properties' => array(
                            'OwnerId' => array(
                                'type' => 'string',
                            ),
                            'CacheSecurityGroupName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
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
                                        'EC2SecurityGroupOwnerId' => array(
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
        'CacheSubnetGroupMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CacheSubnetGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CacheSubnetGroup',
                        'type' => 'object',
                        'sentAs' => 'CacheSubnetGroup',
                        'properties' => array(
                            'CacheSubnetGroupName' => array(
                                'type' => 'string',
                            ),
                            'CacheSubnetGroupDescription' => array(
                                'type' => 'string',
                            ),
                            'VpcId' => array(
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
                                            ),
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
                        'CacheParameterGroupFamily' => array(
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
                                ),
                            ),
                        ),
                        'CacheNodeTypeSpecificParameters' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheNodeTypeSpecificParameter',
                                'type' => 'object',
                                'sentAs' => 'CacheNodeTypeSpecificParameter',
                                'properties' => array(
                                    'ParameterName' => array(
                                        'type' => 'string',
                                    ),
                                    'Description' => array(
                                        'type' => 'string',
                                    ),
                                    'Source' => array(
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
                                    'CacheNodeTypeSpecificValues' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CacheNodeTypeSpecificValue',
                                            'type' => 'object',
                                            'sentAs' => 'CacheNodeTypeSpecificValue',
                                            'properties' => array(
                                                'CacheNodeType' => array(
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
                            'Date' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ReservedCacheNodeMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ReservedCacheNodes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReservedCacheNode',
                        'type' => 'object',
                        'sentAs' => 'ReservedCacheNode',
                        'properties' => array(
                            'ReservedCacheNodeId' => array(
                                'type' => 'string',
                            ),
                            'ReservedCacheNodesOfferingId' => array(
                                'type' => 'string',
                            ),
                            'CacheNodeType' => array(
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
                            'CacheNodeCount' => array(
                                'type' => 'numeric',
                            ),
                            'ProductDescription' => array(
                                'type' => 'string',
                            ),
                            'OfferingType' => array(
                                'type' => 'string',
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
        'ReservedCacheNodesOfferingMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ReservedCacheNodesOfferings' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ReservedCacheNodesOffering',
                        'type' => 'object',
                        'sentAs' => 'ReservedCacheNodesOffering',
                        'properties' => array(
                            'ReservedCacheNodesOfferingId' => array(
                                'type' => 'string',
                            ),
                            'CacheNodeType' => array(
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
                            'ProductDescription' => array(
                                'type' => 'string',
                            ),
                            'OfferingType' => array(
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
        'CacheParameterGroupNameMessage' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CacheParameterGroupName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ReservedCacheNodeWrapper' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ReservedCacheNode' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'data' => array(
                        'wrapper' => true,
                    ),
                    'properties' => array(
                        'ReservedCacheNodeId' => array(
                            'type' => 'string',
                        ),
                        'ReservedCacheNodesOfferingId' => array(
                            'type' => 'string',
                        ),
                        'CacheNodeType' => array(
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
                        'CacheNodeCount' => array(
                            'type' => 'numeric',
                        ),
                        'ProductDescription' => array(
                            'type' => 'string',
                        ),
                        'OfferingType' => array(
                            'type' => 'string',
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
            'DescribeCacheClusters' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'CacheClusters',
            ),
            'DescribeCacheEngineVersions' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'CacheEngineVersions',
            ),
            'DescribeCacheParameterGroups' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'CacheParameterGroups',
            ),
            'DescribeCacheParameters' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'Parameters',
            ),
            'DescribeCacheSecurityGroups' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'CacheSecurityGroups',
            ),
            'DescribeCacheSubnetGroups' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'CacheSubnetGroups',
            ),
            'DescribeEngineDefaultParameters' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'Parameters',
            ),
            'DescribeEvents' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'Events',
            ),
            'DescribeReservedCacheNodes' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'ReservedCacheNodes',
            ),
            'DescribeReservedCacheNodesOfferings' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'MaxRecords',
                'result_key' => 'ReservedCacheNodesOfferings',
            ),
        ),
    ),
);
