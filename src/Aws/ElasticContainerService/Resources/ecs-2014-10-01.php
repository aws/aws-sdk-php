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
    'CreateClusterResult' => array(
      'type' => 'object',
      'additionalProperties' => true,
      'properties' => array(
        'ClusterArn' => array(
          'type' => 'string',
          'location' => 'json',
        ),
        'ClusterName' => array(
          'type' => 'string',
          'location' => 'json',
        ),
        'Status' => array(
          'type' => 'string',
          'location' => 'json',
        ),
      ),
    ),
    'DeleteClusterResult' => array(
      'type' => 'object',
      'additionalProperties' => true,
      'properties' => array(
        'ClusterArn' => array(
          'type' => 'string',
          'location' => 'json',
        ),
        'ClusterName' => array(
          'type' => 'string',
          'location' => 'json',
        ),
        'Status' => array(
          'type' => 'string',
          'location' => 'json',
        ),
      ),
    ),
    'DeregisterContainerInstanceResult' => array(
      'type' => 'object',
      'additionalProperties' => true,
      'properties' => array(
        'AgentConnected' => array(
          'type' => 'boolean',
          'location' => 'json',
        ),
        'ContainerInstanceArn' => array(
          'type' => 'string',
          'location' => 'json',
        ),
        'Ec2InstanceId' => array(
          'type' => 'string',
          'location' => 'json',
        ),
        'RegisteredResources' => array(
          // @todo, How to do resources?
          'type' => 'resource',
          'location' => 'json',
        ),
        'RemainingResources' => array(
          // @todo, How to do resources?
          'type' => 'resource',
          'location' => 'json',
        ),
        'Status' => array(
          'type' => 'string',
          'location' => 'json',
        ),
      ),
    ),
    'DeregisterTaskDefinitionResult' => array(
      'type' => 'object',
      'additionalProperties' => true,
      'properties' => array(
        'ContainerDefinitions' => array(
          // @todo, How to handle container definitions.
          'type' => 'ContainerDefinition',
          'location' => 'json',
        ),
        'Family' => array(
          'type' => 'string',
          'location' => 'json',
        ),
        'Revision' => array(
          'type' => 'integer',
          'location' => 'json',
        ),
        'TaskDefinitionArn' => array(
          'type' => 'string',
          'location' => 'json',
        ),
      ),
    ),
    'DescribeClustersResult' => array(

    ),
    'DescribeContainerInstancesResult' => array(

    ),
    'DescribeTaskDefinitionResult' => array(

    ),
    'DescribeTasksResult' => array(

    ),
    'DiscoverPollEndpointResult' => array(

    ),
    'ListClustersResult' => array(

    ),
    'ListContainerInstancesResult' => array(

    ),
    'ListTaskDefinitionsResult' => array(

    ),
    'ListTasksResult' => array(

    ),
    'RegisterContainerInstanceResult' => array(

    ),
    'RegisterTaskDefinitionResult' => array(

    ),
    'RunTaskResult' => array(

    ),
    'StartTaskResult' => array(

    ),
    'StopTaskResult' => array(

    ),
    'SubmitContainerStateChangeResult' => array(

    ),
    'SubmitTaskStateChangeResult' => array(

    ),
  ),
  'iterators' => array(

  ),
  'waiters' => array(

  ),
);
