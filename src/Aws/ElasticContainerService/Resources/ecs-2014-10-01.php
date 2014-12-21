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
  'apiVersion' => '2014-10-01',
  'endpointPrefix' => 'ecs',
  'serviceFullName' => 'Amazon Elastic Container Service',
  'serviceAbbreviation' => 'Amazon ECS',
  'serviceType' => 'query',
  'signatureVersion' => 'preview',
  'namespace' => 'EVS',
  'regions' => array(
    'us-east-1' => array(
      'http' => true,
      'https' => true,
      'hostname' => 'ecs.us-east-1.amazonaws.com',
    ),
  ),
  'operations' => array(
    'CreateCluster' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'CreateClusterResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'CreateCluster',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'clusterName' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'DeleteCluster' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'DeleteClusterResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'DeleteCluster',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'required' => true,
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'DeregisterContainerInstance' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'DeregisterContainerInstanceResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'DeregisterContainerInstance',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'containerInstance' => array(
          'required' => true,
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'force' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'DeregisterTaskDefinition' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'DeregisterTaskDefinitionResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'DeregisterTaskDefinition',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'taskDefinition' => array(
          'required' => true,
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'DescribeClusters' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'DescribeClustersResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'DescribeClusters',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'clusters.member.N' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'DescribeContainerInstances' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'DescribeContainerInstancesResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'DescribeContainerInstances',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'containerInstances.member.N' => array(
          'required' => true,
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'DescribeTaskDefinition' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'DescribeTaskDefinitionResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'DescribeTaskDefinition',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'taskDefinition.member.N' => array(
          'required' => true,
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'DescribeTasks' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'DescribeTasksResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'DescribeTasks',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'tasks.member.N' => array(
          'required' => true,
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'DiscoverPollEndpoint' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'DiscoverPollEndpointResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'DiscoverPollEndpoint',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'containerInstance' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'ListClusters' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'ListClustersResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'ListClusters',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'maxResults' => array(
          'type' => 'integer',
          'location' => 'aws.query',
        ),
        'nextToken' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'ListContainerInstances' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'ListContainerInstancesResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'ListContainerInstances',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'maxResults' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'nextToken' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'ListTaskDefinitions' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'ListTaskDefinitionsResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'ListTaskDefinitions',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'familyPrefix' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'maxResults' => array(
          'type' => 'integer',
          'location' => 'aws.query',
        ),
        'nextToken' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'ListTasks' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'ListTasksResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'ListTasks',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'containerInstance' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'family' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'maxResults' => array(
          'type' => 'integer',
          'location' => 'aws.query',
        ),
        'nextToken' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'RegisterContainerInstance' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'RegisterContainerInstanceResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'RegisterContainerInstance',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'instanceIdentityDocument' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'instanceIdentityDocumentSignature' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'totalResources.member.N' => array(
          // @todo, is this right for resources?
          'type' => 'resource',
          'location' => 'aws.query',
        ),
      ),
    ),
    'RegisterTaskDefinition' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'RegisterTaskDefinitionResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'RegisterTaskDefinition',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'containerDefinitions.member.N' => array(
          // @todo, how to handle this?
          'required' => true,
          'type' => 'ContainerDefinition',
          'location' => 'aws.query',
        ),
        'family' => array(
          'required' => true,
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'RunTask' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'RunTaskResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'RunTask',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'count' => array(
          'type' => 'integer',
          'location' => 'aws.query',
        ),
        'overrides' => array(
          // @todo, How to do this.
          'type' => 'TaskOverride',
          'location' => 'aws.query',
        ),
        'taskDefinition' => array(
          'required' => true,
          'type' => 'integer',
          'location' => 'aws.query',
        ),
      ),
    ),
    'StartTask' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'StartTaskResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'StartTask',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'containerInstances.member.N' => array(
          'required' => true,
          'type' => 'integer',
          'location' => 'aws.query',
        ),
        'overrides' => array(
          // @todo, How to do this.
          'type' => 'TaskOverride',
          'location' => 'aws.query',
        ),
        'taskDefinition' => array(
          'required' => true,
          'type' => 'integer',
          'location' => 'aws.query',
        ),
      ),
    ),
    'StopTask' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'StopTaskResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'StopTask',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'task' => array(
          'required' => true,
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'SubmitContainerStateChange' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'SubmitContainerStateChangeResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'SubmitContainerStateChange',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'containerName' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'exitCode' => array(
          'type' => 'integer',
          'location' => 'aws.query',
        ),
        'networkBindings.member.N' => array(
          // @todo, How to do this.
          'type' => 'NetworkBinding',
          'location' => 'aws.query',
        ),
        'reason' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'status' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'task' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
    'SubmitTaskStateChange' => array(
      'httpMethod' => 'POST',
      'uri' => '/',
      'class' => 'Aws\\Common\\Command\\QueryCommand',
      'responseClass' => 'SubmitContainerStateChangeResult',
      'responseType' => 'model',
      'parameters' => array(
        'Action' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => 'SubmitContainerStateChange',
        ),
        'Version' => array(
          'static' => true,
          'location' => 'aws.query',
          'default' => '2014-10-01',
        ),
        'cluster' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'reason' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'status' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
        'task' => array(
          'type' => 'string',
          'location' => 'aws.query',
        ),
      ),
    ),
  ),
  'models' => array(
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
    'EmptyOutput' => array(
      'type' => 'object',
      'additionalProperties' => true,
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
    'ConfirmProductInstanceResult' => array(
      'type' => 'object',
      'additionalProperties' => true,
      'properties' => array(
        'OwnerId' => array(
          'type' => 'string',
          'location' => 'xml',
          'sentAs' => 'ownerId',
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
    'DescribeRouteTables' => array(
      'result_key' => 'RouteTables',
    ),
    'DescribeSecurityGroups' => array(
      'result_key' => 'SecurityGroups',
    ),
    'DescribeSnapshots' => array(
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
