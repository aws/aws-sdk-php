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
    'apiVersion' => '2013-02-18',
    'endpointPrefix' => 'opsworks',
    'serviceFullName' => 'AWS OpsWorks',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'signatureVersion' => 'v4',
    'namespace' => 'OpsWorks',
    'operations' => array(
        'CloneStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CloneStackResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CloneStack',
                ),
                'SourceStackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Region' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'ServiceRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultInstanceProfileArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultOs' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HostnameTheme' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultAvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CustomJson' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'UseCustomCookbooks' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CustomCookbooksSource' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'string',
                            'enum' => array(
                                'git',
                                'svn',
                                'archive',
                                's3',
                            ),
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'Username' => array(
                            'type' => 'string',
                        ),
                        'Password' => array(
                            'type' => 'string',
                        ),
                        'SshKey' => array(
                            'type' => 'string',
                        ),
                        'Revision' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'DefaultSshKeyName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'CreateApp' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateAppResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CreateApp',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Type' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'rails',
                        'php',
                        'nodejs',
                        'static',
                        'other',
                    ),
                ),
                'AppSource' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'string',
                            'enum' => array(
                                'git',
                                'svn',
                                'archive',
                                's3',
                            ),
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'Username' => array(
                            'type' => 'string',
                        ),
                        'Password' => array(
                            'type' => 'string',
                        ),
                        'SshKey' => array(
                            'type' => 'string',
                        ),
                        'Revision' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Domains' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'EnableSsl' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'SslConfiguration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Certificate' => array(
                            'type' => 'string',
                        ),
                        'PrivateKey' => array(
                            'type' => 'string',
                        ),
                        'Chain' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'CreateDeployment' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDeploymentResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CreateDeployment',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AppId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'Command' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                            'enum' => array(
                                'install_dependencies',
                                'update_dependencies',
                                'update_custom_cookbooks',
                                'execute_recipes',
                                'deploy',
                                'rollback',
                                'start',
                                'stop',
                                'restart',
                                'undeploy',
                            ),
                        ),
                        'Args' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CustomJson' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'CreateInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateInstanceResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CreateInstance',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'InstanceType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AutoScalingType' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'AlwaysRunning',
                        'TimeBasedAutoScaling',
                        'LoadBasedAutoScaling',
                    ),
                ),
                'Hostname' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Os' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshKeyName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'CreateLayer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateLayerResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CreateLayer',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Type' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'lb',
                        'web',
                        'php-app',
                        'rails-app',
                        'nodejs-app',
                        'memcached',
                        'db-master',
                        'monitoring-master',
                        'custom',
                    ),
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Shortname' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'InstanceProfileArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'Packages' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'VolumeConfigurations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VolumeConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'MountPoint' => array(
                                'type' => 'string',
                            ),
                            'RaidLevel' => array(
                                'type' => 'numeric',
                            ),
                            'NumberOfDisks' => array(
                                'type' => 'numeric',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'EnableAutoHealing' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AutoAssignElasticIps' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CustomRecipes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Setup' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Configure' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Deploy' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Undeploy' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Shutdown' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'CreateStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateStackResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CreateStack',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Region' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'ServiceRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultInstanceProfileArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultOs' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HostnameTheme' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultAvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CustomJson' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'UseCustomCookbooks' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CustomCookbooksSource' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'string',
                            'enum' => array(
                                'git',
                                'svn',
                                'archive',
                                's3',
                            ),
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'Username' => array(
                            'type' => 'string',
                        ),
                        'Password' => array(
                            'type' => 'string',
                        ),
                        'SshKey' => array(
                            'type' => 'string',
                        ),
                        'Revision' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'DefaultSshKeyName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'CreateUser' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateUserResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'CreateUser',
                ),
                'IamUserArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshUsername' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshPublicKey' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'DeleteApp' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DeleteApp',
                ),
                'AppId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeleteInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DeleteInstance',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeleteLayer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DeleteLayer',
                ),
                'LayerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeleteStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DeleteStack',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeleteUser' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DeleteUser',
                ),
                'IamUserArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeApps' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeAppsResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeApps',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AppIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeCommands' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeCommandsResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeCommands',
                ),
                'DeploymentId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CommandIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeDeployments' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeDeploymentsResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeDeployments',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AppId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DeploymentIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeElasticIps' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeElasticIpsResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeElasticIps',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Ips' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeInstancesResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeInstances',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AppId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeLayers' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeLayersResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeLayers',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeLoadBasedAutoScaling' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeLoadBasedAutoScalingResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeLoadBasedAutoScaling',
                ),
                'LayerIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribePermissions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribePermissionsResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribePermissions',
                ),
                'IamUserArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeRaidArrays' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeRaidArraysResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeRaidArrays',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RaidArrayIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeSshKeys' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeSshKeysResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeSshKeys',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshKeyIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeStacks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeStacksResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeStacks',
                ),
                'StackIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeTimeBasedAutoScaling' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTimeBasedAutoScalingResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeTimeBasedAutoScaling',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeUsers' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeUsersResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeUsers',
                ),
                'IamUserArns' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeVolumes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeVolumesResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DescribeVolumes',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RaidArrayId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VolumeIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'GetHostnameSuggestion' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetHostnameSuggestionResult',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'GetHostnameSuggestion',
                ),
                'LayerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'RebootInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'RebootInstance',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'SetLoadBasedAutoScaling' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SetLoadBasedAutoScaling',
                ),
                'LayerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Enable' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'UpScaling' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'InstanceCount' => array(
                            'type' => 'numeric',
                        ),
                        'ThresholdsWaitTime' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 100,
                        ),
                        'IgnoreMetricsTime' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 100,
                        ),
                        'CpuThreshold' => array(
                            'type' => 'numeric',
                        ),
                        'MemoryThreshold' => array(
                            'type' => 'numeric',
                        ),
                        'LoadThreshold' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'DownScaling' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'InstanceCount' => array(
                            'type' => 'numeric',
                        ),
                        'ThresholdsWaitTime' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 100,
                        ),
                        'IgnoreMetricsTime' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 100,
                        ),
                        'CpuThreshold' => array(
                            'type' => 'numeric',
                        ),
                        'MemoryThreshold' => array(
                            'type' => 'numeric',
                        ),
                        'LoadThreshold' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'SetPermission' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SetPermission',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IamUserArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Level' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'Deny',
                        'Show',
                        'Deploy',
                        'Manage',
                    ),
                ),
                'AllowSsh' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AllowSudo' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'SetTimeBasedAutoScaling' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SetTimeBasedAutoScaling',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Enable' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AutoScalingSchedule' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Monday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                            ),
                        ),
                        'Tuesday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                            ),
                        ),
                        'Wednesday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                            ),
                        ),
                        'Thursday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                            ),
                        ),
                        'Friday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                            ),
                        ),
                        'Saturday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                            ),
                        ),
                        'Sunday' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                            ),
                        ),
                        'All' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'StartInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StartInstance',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'StartStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StartStack',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'StopInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StopInstance',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'StopStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StopStack',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateApp' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'UpdateApp',
                ),
                'AppId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Type' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'rails',
                        'php',
                        'nodejs',
                        'static',
                        'other',
                    ),
                ),
                'AppSource' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'string',
                            'enum' => array(
                                'git',
                                'svn',
                                'archive',
                                's3',
                            ),
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'Username' => array(
                            'type' => 'string',
                        ),
                        'Password' => array(
                            'type' => 'string',
                        ),
                        'SshKey' => array(
                            'type' => 'string',
                        ),
                        'Revision' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Domains' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'EnableSsl' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'SslConfiguration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Certificate' => array(
                            'type' => 'string',
                        ),
                        'PrivateKey' => array(
                            'type' => 'string',
                        ),
                        'Chain' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateInstance' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'UpdateInstance',
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LayerIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'InstanceType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AutoScalingType' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'AlwaysRunning',
                        'TimeBasedAutoScaling',
                        'LoadBasedAutoScaling',
                    ),
                ),
                'Hostname' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Os' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshKeyName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateLayer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'UpdateLayer',
                ),
                'LayerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Shortname' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'InstanceProfileArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'Packages' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
                'VolumeConfigurations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VolumeConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'MountPoint' => array(
                                'type' => 'string',
                            ),
                            'RaidLevel' => array(
                                'type' => 'numeric',
                            ),
                            'NumberOfDisks' => array(
                                'type' => 'numeric',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'EnableAutoHealing' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'AutoAssignElasticIps' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CustomRecipes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Setup' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Configure' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Deploy' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Undeploy' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                        'Shutdown' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'String',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateStack' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'UpdateStack',
                ),
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'ServiceRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultInstanceProfileArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultOs' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HostnameTheme' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DefaultAvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CustomJson' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'UseCustomCookbooks' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'CustomCookbooksSource' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Type' => array(
                            'type' => 'string',
                            'enum' => array(
                                'git',
                                'svn',
                                'archive',
                                's3',
                            ),
                        ),
                        'Url' => array(
                            'type' => 'string',
                        ),
                        'Username' => array(
                            'type' => 'string',
                        ),
                        'Password' => array(
                            'type' => 'string',
                        ),
                        'SshKey' => array(
                            'type' => 'string',
                        ),
                        'Revision' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'DefaultSshKeyName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateUser' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'UpdateUser',
                ),
                'IamUserArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshUsername' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshPublicKey' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ValidationException',
                ),
                array(
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CloneStackResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateAppResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AppId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateDeploymentResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DeploymentId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateInstanceResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateLayerResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LayerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateStackResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StackId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateUserResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IamUserArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DescribeAppsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Apps' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'App',
                        'type' => 'object',
                        'properties' => array(
                            'AppId' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'AppSource' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Type' => array(
                                        'type' => 'string',
                                    ),
                                    'Url' => array(
                                        'type' => 'string',
                                    ),
                                    'Username' => array(
                                        'type' => 'string',
                                    ),
                                    'Password' => array(
                                        'type' => 'string',
                                    ),
                                    'SshKey' => array(
                                        'type' => 'string',
                                    ),
                                    'Revision' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Domains' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'EnableSsl' => array(
                                'type' => 'boolean',
                            ),
                            'SslConfiguration' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Certificate' => array(
                                        'type' => 'string',
                                    ),
                                    'PrivateKey' => array(
                                        'type' => 'string',
                                    ),
                                    'Chain' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Attributes' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeCommandsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Commands' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Command',
                        'type' => 'object',
                        'properties' => array(
                            'CommandId' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'DeploymentId' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'AcknowledgedAt' => array(
                                'type' => 'string',
                            ),
                            'CompletedAt' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'ExitCode' => array(
                                'type' => 'numeric',
                            ),
                            'LogUrl' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDeploymentsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Deployments' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Deployment',
                        'type' => 'object',
                        'properties' => array(
                            'DeploymentId' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'AppId' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'CompletedAt' => array(
                                'type' => 'string',
                            ),
                            'Duration' => array(
                                'type' => 'numeric',
                            ),
                            'IamUserArn' => array(
                                'type' => 'string',
                            ),
                            'Comment' => array(
                                'type' => 'string',
                            ),
                            'Command' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'Args' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'String',
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'CustomJson' => array(
                                'type' => 'string',
                            ),
                            'InstanceIds' => array(
                                'type' => 'array',
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
        'DescribeElasticIpsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ElasticIps' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ElasticIp',
                        'type' => 'object',
                        'properties' => array(
                            'Ip' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Region' => array(
                                'type' => 'string',
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
                'Instances' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Instance',
                        'type' => 'object',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Ec2InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Hostname' => array(
                                'type' => 'string',
                            ),
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'LayerIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'SecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'InstanceType' => array(
                                'type' => 'string',
                            ),
                            'InstanceProfileArn' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Os' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'PublicDns' => array(
                                'type' => 'string',
                            ),
                            'PrivateDns' => array(
                                'type' => 'string',
                            ),
                            'PublicIp' => array(
                                'type' => 'string',
                            ),
                            'PrivateIp' => array(
                                'type' => 'string',
                            ),
                            'ElasticIp' => array(
                                'type' => 'string',
                            ),
                            'AutoScalingType' => array(
                                'type' => 'string',
                            ),
                            'SshKeyName' => array(
                                'type' => 'string',
                            ),
                            'SshHostRsaKeyFingerprint' => array(
                                'type' => 'string',
                            ),
                            'SshHostDsaKeyFingerprint' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeLayersResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Layers' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Layer',
                        'type' => 'object',
                        'properties' => array(
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'LayerId' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Shortname' => array(
                                'type' => 'string',
                            ),
                            'Attributes' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'InstanceProfileArn' => array(
                                'type' => 'string',
                            ),
                            'SecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'Packages' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                            'VolumeConfigurations' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'VolumeConfiguration',
                                    'type' => 'object',
                                    'properties' => array(
                                        'MountPoint' => array(
                                            'type' => 'string',
                                        ),
                                        'RaidLevel' => array(
                                            'type' => 'numeric',
                                        ),
                                        'NumberOfDisks' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Size' => array(
                                            'type' => 'numeric',
                                        ),
                                    ),
                                ),
                            ),
                            'EnableAutoHealing' => array(
                                'type' => 'boolean',
                            ),
                            'AutoAssignElasticIps' => array(
                                'type' => 'boolean',
                            ),
                            'DefaultRecipes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Setup' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Configure' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Deploy' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Undeploy' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Shutdown' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'CustomRecipes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Setup' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Configure' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Deploy' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Undeploy' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Shutdown' => array(
                                        'type' => 'array',
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
            ),
        ),
        'DescribeLoadBasedAutoScalingResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LoadBasedAutoScalingConfigurations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'LoadBasedAutoScalingConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'LayerId' => array(
                                'type' => 'string',
                            ),
                            'Enable' => array(
                                'type' => 'boolean',
                            ),
                            'UpScaling' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'InstanceCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ThresholdsWaitTime' => array(
                                        'type' => 'numeric',
                                    ),
                                    'IgnoreMetricsTime' => array(
                                        'type' => 'numeric',
                                    ),
                                    'CpuThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                    'MemoryThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                    'LoadThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'DownScaling' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'InstanceCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ThresholdsWaitTime' => array(
                                        'type' => 'numeric',
                                    ),
                                    'IgnoreMetricsTime' => array(
                                        'type' => 'numeric',
                                    ),
                                    'CpuThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                    'MemoryThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                    'LoadThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribePermissionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Permissions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Permission',
                        'type' => 'object',
                        'properties' => array(
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'IamUserArn' => array(
                                'type' => 'string',
                            ),
                            'Level' => array(
                                'type' => 'string',
                            ),
                            'AllowSsh' => array(
                                'type' => 'boolean',
                            ),
                            'AllowSudo' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeRaidArraysResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RaidArrays' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RaidArray',
                        'type' => 'object',
                        'properties' => array(
                            'RaidArrayId' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'RaidLevel' => array(
                                'type' => 'numeric',
                            ),
                            'NumberOfDisks' => array(
                                'type' => 'numeric',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                            ),
                            'Device' => array(
                                'type' => 'string',
                            ),
                            'MountPoint' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSshKeysResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SshKeys' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'SshKey',
                        'type' => 'object',
                        'properties' => array(
                            'SshKeyId' => array(
                                'type' => 'string',
                            ),
                            'Region' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Fingerprint' => array(
                                'type' => 'string',
                            ),
                            'PrivateKey' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeStacksResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Stacks' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Stack',
                        'type' => 'object',
                        'properties' => array(
                            'StackId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Region' => array(
                                'type' => 'string',
                            ),
                            'Attributes' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'ServiceRoleArn' => array(
                                'type' => 'string',
                            ),
                            'DefaultInstanceProfileArn' => array(
                                'type' => 'string',
                            ),
                            'DefaultOs' => array(
                                'type' => 'string',
                            ),
                            'HostnameTheme' => array(
                                'type' => 'string',
                            ),
                            'DefaultAvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'CustomJson' => array(
                                'type' => 'string',
                            ),
                            'UseCustomCookbooks' => array(
                                'type' => 'boolean',
                            ),
                            'CustomCookbooksSource' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Type' => array(
                                        'type' => 'string',
                                    ),
                                    'Url' => array(
                                        'type' => 'string',
                                    ),
                                    'Username' => array(
                                        'type' => 'string',
                                    ),
                                    'Password' => array(
                                        'type' => 'string',
                                    ),
                                    'SshKey' => array(
                                        'type' => 'string',
                                    ),
                                    'Revision' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'DefaultSshKeyName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTimeBasedAutoScalingResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TimeBasedAutoScalingConfigurations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'TimeBasedAutoScalingConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Enable' => array(
                                'type' => 'boolean',
                            ),
                            'AutoScalingSchedule' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Monday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Tuesday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Wednesday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Thursday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Friday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Saturday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'Sunday' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'All' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
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
        'DescribeUsersResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Users' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'User',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Root' => array(
                                'type' => 'boolean',
                            ),
                            'IamUserArn' => array(
                                'type' => 'string',
                            ),
                            'SshUsername' => array(
                                'type' => 'string',
                            ),
                            'SshPublicKey' => array(
                                'type' => 'string',
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
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Volume',
                        'type' => 'object',
                        'properties' => array(
                            'VolumeId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'RaidArrayId' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Size' => array(
                                'type' => 'numeric',
                            ),
                            'Device' => array(
                                'type' => 'string',
                            ),
                            'MountPoint' => array(
                                'type' => 'string',
                            ),
                            'Region' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetHostnameSuggestionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LayerId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Hostname' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
);
