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
    'apiVersion' => '2014-11-13',
    'endpointPrefix' => 'ecs',
    'serviceFullName' => 'Amazon EC2 Container Service',
    'serviceAbbreviation' => 'Amazon ECS',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'Ecs',
    'operations' => array(
        'CreateCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateClusterResponse',
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
                    'default' => '2014-11-13',
                ),
                'clusterName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'DeregisterContainerInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeregisterContainerInstanceResponse',
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
                    'default' => '2014-11-13',
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
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'DeregisterTaskDefinition' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeregisterTaskDefinitionResponse',
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
                    'default' => '2014-11-13',
                ),
                'taskDefinition' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'DescribeClusters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeClustersResponse',
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
                    'default' => '2014-11-13',
                ),
                'clusters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'clusters.member',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'DescribeContainerInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeContainerInstancesResponse',
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
                    'default' => '2014-11-13',
                ),
                'cluster' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'containerInstances' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'containerInstances.member',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'DescribeTaskDefinition' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeTaskDefinitionResponse',
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
                    'default' => '2014-11-13',
                ),
                'taskDefinition' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'DescribeTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeTasksResponse',
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
                    'default' => '2014-11-13',
                ),
                'cluster' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'tasks' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'tasks.member',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'DiscoverPollEndpoint' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DiscoverPollEndpointResponse',
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
                    'default' => '2014-11-13',
                ),
                'containerInstance' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'ListClusters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListClustersResponse',
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
                    'default' => '2014-11-13',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'maxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'ListContainerInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListContainerInstancesResponse',
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
                    'default' => '2014-11-13',
                ),
                'cluster' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'maxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'ListTaskDefinitions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListTaskDefinitionsResponse',
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
                    'default' => '2014-11-13',
                ),
                'familyPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'maxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'ListTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListTasksResponse',
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
                    'default' => '2014-11-13',
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
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'maxResults' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'RegisterContainerInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RegisterContainerInstanceResponse',
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
                    'default' => '2014-11-13',
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
                'totalResources' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'totalResources.member',
                    'items' => array(
                        'name' => 'Resource',
                        'type' => 'object',
                        'properties' => array(
                            '' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'RegisterTaskDefinition' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RegisterTaskDefinitionResponse',
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
                    'default' => '2014-11-13',
                ),
                'family' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'containerDefinitions' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'containerDefinitions.member',
                    'items' => array(
                        'name' => 'ContainerDefinition',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'image' => array(
                                'type' => 'string',
                            ),
                            'cpu' => array(
                                'type' => 'numeric',
                            ),
                            'memory' => array(
                                'type' => 'numeric',
                            ),
                            'links' => array(
                                'type' => 'array',
                                'sentAs' => 'links.member',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'portMappings' => array(
                                'type' => 'array',
                                'sentAs' => 'portMappings.member',
                                'items' => array(
                                    'name' => 'PortMapping',
                                    'type' => 'object',
                                    'properties' => array(
                                        'containerPort' => array(
                                            'type' => 'numeric',
                                        ),
                                        'hostPort' => array(
                                            'type' => 'numeric',
                                        ),
                                    ),
                                ),
                            ),
                            'essential' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                            'entryPoint' => array(
                                'type' => 'array',
                                'sentAs' => 'entryPoint.member',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'command' => array(
                                'type' => 'array',
                                'sentAs' => 'command.member',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'environment' => array(
                                'type' => 'array',
                                'sentAs' => 'environment.member',
                                'items' => array(
                                    'name' => 'KeyValuePair',
                                    'type' => 'object',
                                    'properties' => array(
                                        'name' => array(
                                            'type' => 'string',
                                        ),
                                        'value' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'RunTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'RunTaskResponse',
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
                    'default' => '2014-11-13',
                ),
                'cluster' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'taskDefinition' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'overrides' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'containerOverrides' => array(
                            'type' => 'array',
                            'sentAs' => 'containerOverrides.member',
                            'items' => array(
                                'name' => 'ContainerOverride',
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'command' => array(
                                        'type' => 'array',
                                        'sentAs' => 'command.member',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'count' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'StartTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'StartTaskResponse',
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
                    'default' => '2014-11-13',
                ),
                'cluster' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'taskDefinition' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'overrides' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'containerOverrides' => array(
                            'type' => 'array',
                            'sentAs' => 'containerOverrides.member',
                            'items' => array(
                                'name' => 'ContainerOverride',
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'command' => array(
                                        'type' => 'array',
                                        'sentAs' => 'command.member',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'containerInstances' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'containerInstances.member',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'StopTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'StopTaskResponse',
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
                    'default' => '2014-11-13',
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
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'SubmitContainerStateChange' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SubmitContainerStateChangeResponse',
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
                    'default' => '2014-11-13',
                ),
                'cluster' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'task' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'containerName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'status' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'exitCode' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'reason' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'networkBindings' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'networkBindings.member',
                    'items' => array(
                        'name' => 'NetworkBinding',
                        'type' => 'object',
                        'properties' => array(
                            'bindIP' => array(
                                'type' => 'string',
                            ),
                            'containerPort' => array(
                                'type' => 'numeric',
                            ),
                            'hostPort' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
        'SubmitTaskStateChange' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SubmitTaskStateChangeResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SubmitTaskStateChange',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2014-11-13',
                ),
                'cluster' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'task' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'status' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'reason' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ServerException',
                ),
                array(
                    'class' => 'ClientException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CreateClusterResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'cluster' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'clusterArn' => array(
                            'type' => 'string',
                        ),
                        'clusterName' => array(
                            'type' => 'string',
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DeregisterContainerInstanceResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'containerInstance' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'containerInstanceArn' => array(
                            'type' => 'string',
                        ),
                        'ec2InstanceId' => array(
                            'type' => 'string',
                        ),
                        'remainingResources' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Resource',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    '' => array(
                                    ),
                                ),
                            ),
                        ),
                        'registeredResources' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Resource',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    '' => array(
                                    ),
                                ),
                            ),
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'agentConnected' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'DeregisterTaskDefinitionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'taskDefinition' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'taskDefinitionArn' => array(
                            'type' => 'string',
                        ),
                        'containerDefinitions' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ContainerDefinition',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'image' => array(
                                        'type' => 'string',
                                    ),
                                    'cpu' => array(
                                        'type' => 'numeric',
                                    ),
                                    'memory' => array(
                                        'type' => 'numeric',
                                    ),
                                    'links' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                    'portMappings' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'PortMapping',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'containerPort' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'hostPort' => array(
                                                    'type' => 'numeric',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'essential' => array(
                                        'type' => 'boolean',
                                    ),
                                    'entryPoint' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                    'command' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                    'environment' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeyValuePair',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'value' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'family' => array(
                            'type' => 'string',
                        ),
                        'revision' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeClustersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'clusters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Cluster',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'clusterArn' => array(
                                'type' => 'string',
                            ),
                            'clusterName' => array(
                                'type' => 'string',
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'failures' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Failure',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'arn' => array(
                                'type' => 'string',
                            ),
                            'reason' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeContainerInstancesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'containerInstances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ContainerInstance',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'containerInstanceArn' => array(
                                'type' => 'string',
                            ),
                            'ec2InstanceId' => array(
                                'type' => 'string',
                            ),
                            'remainingResources' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Resource',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        '' => array(
                                        ),
                                    ),
                                ),
                            ),
                            'registeredResources' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Resource',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        '' => array(
                                        ),
                                    ),
                                ),
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'agentConnected' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
                'failures' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Failure',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'arn' => array(
                                'type' => 'string',
                            ),
                            'reason' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTaskDefinitionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'taskDefinition' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'taskDefinitionArn' => array(
                            'type' => 'string',
                        ),
                        'containerDefinitions' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ContainerDefinition',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'image' => array(
                                        'type' => 'string',
                                    ),
                                    'cpu' => array(
                                        'type' => 'numeric',
                                    ),
                                    'memory' => array(
                                        'type' => 'numeric',
                                    ),
                                    'links' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                    'portMappings' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'PortMapping',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'containerPort' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'hostPort' => array(
                                                    'type' => 'numeric',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'essential' => array(
                                        'type' => 'boolean',
                                    ),
                                    'entryPoint' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                    'command' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                    'environment' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeyValuePair',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'value' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'family' => array(
                            'type' => 'string',
                        ),
                        'revision' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTasksResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'tasks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Task',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'taskArn' => array(
                                'type' => 'string',
                            ),
                            'clusterArn' => array(
                                'type' => 'string',
                            ),
                            'taskDefinitionArn' => array(
                                'type' => 'string',
                            ),
                            'containerInstanceArn' => array(
                                'type' => 'string',
                            ),
                            'overrides' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'containerOverrides' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'ContainerOverride',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'command' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'String',
                                                        'type' => 'string',
                                                        'sentAs' => 'member',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'lastStatus' => array(
                                'type' => 'string',
                            ),
                            'desiredStatus' => array(
                                'type' => 'string',
                            ),
                            'containers' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Container',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'containerArn' => array(
                                            'type' => 'string',
                                        ),
                                        'taskArn' => array(
                                            'type' => 'string',
                                        ),
                                        'name' => array(
                                            'type' => 'string',
                                        ),
                                        'lastStatus' => array(
                                            'type' => 'string',
                                        ),
                                        'exitCode' => array(
                                            'type' => 'numeric',
                                        ),
                                        'reason' => array(
                                            'type' => 'string',
                                        ),
                                        'networkBindings' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'NetworkBinding',
                                                'type' => 'object',
                                                'sentAs' => 'member',
                                                'properties' => array(
                                                    'bindIP' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'containerPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'hostPort' => array(
                                                        'type' => 'numeric',
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
                'failures' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Failure',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'arn' => array(
                                'type' => 'string',
                            ),
                            'reason' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DiscoverPollEndpointResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'endpoint' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListClustersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'clusterArns' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListContainerInstancesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'containerInstanceArns' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListTaskDefinitionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'taskDefinitionArns' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListTasksResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'taskArns' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'RegisterContainerInstanceResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'containerInstance' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'containerInstanceArn' => array(
                            'type' => 'string',
                        ),
                        'ec2InstanceId' => array(
                            'type' => 'string',
                        ),
                        'remainingResources' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Resource',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    '' => array(
                                    ),
                                ),
                            ),
                        ),
                        'registeredResources' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Resource',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    '' => array(
                                    ),
                                ),
                            ),
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'agentConnected' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'RegisterTaskDefinitionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'taskDefinition' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'taskDefinitionArn' => array(
                            'type' => 'string',
                        ),
                        'containerDefinitions' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ContainerDefinition',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'image' => array(
                                        'type' => 'string',
                                    ),
                                    'cpu' => array(
                                        'type' => 'numeric',
                                    ),
                                    'memory' => array(
                                        'type' => 'numeric',
                                    ),
                                    'links' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                    'portMappings' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'PortMapping',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'containerPort' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'hostPort' => array(
                                                    'type' => 'numeric',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'essential' => array(
                                        'type' => 'boolean',
                                    ),
                                    'entryPoint' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                    'command' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                            'sentAs' => 'member',
                                        ),
                                    ),
                                    'environment' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeyValuePair',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'value' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'family' => array(
                            'type' => 'string',
                        ),
                        'revision' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'RunTaskResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'tasks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Task',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'taskArn' => array(
                                'type' => 'string',
                            ),
                            'clusterArn' => array(
                                'type' => 'string',
                            ),
                            'taskDefinitionArn' => array(
                                'type' => 'string',
                            ),
                            'containerInstanceArn' => array(
                                'type' => 'string',
                            ),
                            'overrides' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'containerOverrides' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'ContainerOverride',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'command' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'String',
                                                        'type' => 'string',
                                                        'sentAs' => 'member',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'lastStatus' => array(
                                'type' => 'string',
                            ),
                            'desiredStatus' => array(
                                'type' => 'string',
                            ),
                            'containers' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Container',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'containerArn' => array(
                                            'type' => 'string',
                                        ),
                                        'taskArn' => array(
                                            'type' => 'string',
                                        ),
                                        'name' => array(
                                            'type' => 'string',
                                        ),
                                        'lastStatus' => array(
                                            'type' => 'string',
                                        ),
                                        'exitCode' => array(
                                            'type' => 'numeric',
                                        ),
                                        'reason' => array(
                                            'type' => 'string',
                                        ),
                                        'networkBindings' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'NetworkBinding',
                                                'type' => 'object',
                                                'sentAs' => 'member',
                                                'properties' => array(
                                                    'bindIP' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'containerPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'hostPort' => array(
                                                        'type' => 'numeric',
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
        ),
        'StartTaskResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'tasks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Task',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'taskArn' => array(
                                'type' => 'string',
                            ),
                            'clusterArn' => array(
                                'type' => 'string',
                            ),
                            'taskDefinitionArn' => array(
                                'type' => 'string',
                            ),
                            'containerInstanceArn' => array(
                                'type' => 'string',
                            ),
                            'overrides' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'containerOverrides' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'ContainerOverride',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'command' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'String',
                                                        'type' => 'string',
                                                        'sentAs' => 'member',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'lastStatus' => array(
                                'type' => 'string',
                            ),
                            'desiredStatus' => array(
                                'type' => 'string',
                            ),
                            'containers' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Container',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'containerArn' => array(
                                            'type' => 'string',
                                        ),
                                        'taskArn' => array(
                                            'type' => 'string',
                                        ),
                                        'name' => array(
                                            'type' => 'string',
                                        ),
                                        'lastStatus' => array(
                                            'type' => 'string',
                                        ),
                                        'exitCode' => array(
                                            'type' => 'numeric',
                                        ),
                                        'reason' => array(
                                            'type' => 'string',
                                        ),
                                        'networkBindings' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'NetworkBinding',
                                                'type' => 'object',
                                                'sentAs' => 'member',
                                                'properties' => array(
                                                    'bindIP' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'containerPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'hostPort' => array(
                                                        'type' => 'numeric',
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
                'failures' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Failure',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'arn' => array(
                                'type' => 'string',
                            ),
                            'reason' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'StopTaskResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'task' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'taskArn' => array(
                            'type' => 'string',
                        ),
                        'clusterArn' => array(
                            'type' => 'string',
                        ),
                        'taskDefinitionArn' => array(
                            'type' => 'string',
                        ),
                        'containerInstanceArn' => array(
                            'type' => 'string',
                        ),
                        'overrides' => array(
                            'type' => 'object',
                            'properties' => array(
                                'containerOverrides' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'ContainerOverride',
                                        'type' => 'object',
                                        'sentAs' => 'member',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'command' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'String',
                                                    'type' => 'string',
                                                    'sentAs' => 'member',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'lastStatus' => array(
                            'type' => 'string',
                        ),
                        'desiredStatus' => array(
                            'type' => 'string',
                        ),
                        'containers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Container',
                                'type' => 'object',
                                'sentAs' => 'member',
                                'properties' => array(
                                    'containerArn' => array(
                                        'type' => 'string',
                                    ),
                                    'taskArn' => array(
                                        'type' => 'string',
                                    ),
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'lastStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'exitCode' => array(
                                        'type' => 'numeric',
                                    ),
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'networkBindings' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'NetworkBinding',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'bindIP' => array(
                                                    'type' => 'string',
                                                ),
                                                'containerPort' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'hostPort' => array(
                                                    'type' => 'numeric',
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
        'SubmitContainerStateChangeResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'acknowledgment' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'SubmitTaskStateChangeResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'acknowledgment' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
    ),
);
