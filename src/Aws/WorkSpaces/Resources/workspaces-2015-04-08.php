<?php

return array (
    'apiVersion' => '2015-04-08',
    'endpointPrefix' => 'workspaces',
    'serviceFullName' => 'Amazon WorkSpaces',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'WorkspacesService.',
    'signatureVersion' => 'v4',
    'namespace' => 'WorkSpaces',
    'operations' => array(
        'CreateWorkspaces' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateWorkspacesResult',
            'responseType' => 'model',
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
                    'default' => 'WorkspacesService.CreateWorkspaces',
                ),
                'Workspaces' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 25,
                    'items' => array(
                        'name' => 'WorkspaceRequest',
                        'type' => 'object',
                        'properties' => array(
                            'DirectoryId' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'UserName' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 63,
                            ),
                            'BundleId' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Your resource limits have been exceeded.',
                    'class' => 'ResourceLimitExceededException',
                ),
            ),
        ),
        'DescribeWorkspaceBundles' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeWorkspaceBundlesResult',
            'responseType' => 'model',
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
                    'default' => 'WorkspacesService.DescribeWorkspaceBundles',
                ),
                'BundleIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 25,
                    'items' => array(
                        'name' => 'BundleId',
                        'type' => 'string',
                    ),
                ),
                'Owner' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 63,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more parameter values are not valid.',
                    'class' => 'InvalidParameterValuesException',
                ),
            ),
        ),
        'DescribeWorkspaceDirectories' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeWorkspaceDirectoriesResult',
            'responseType' => 'model',
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
                    'default' => 'WorkspacesService.DescribeWorkspaceDirectories',
                ),
                'DirectoryIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 25,
                    'items' => array(
                        'name' => 'DirectoryId',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 63,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more parameter values are not valid.',
                    'class' => 'InvalidParameterValuesException',
                ),
            ),
        ),
        'DescribeWorkspaces' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeWorkspacesResult',
            'responseType' => 'model',
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
                    'default' => 'WorkspacesService.DescribeWorkspaces',
                ),
                'WorkspaceIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 25,
                    'items' => array(
                        'name' => 'WorkspaceId',
                        'type' => 'string',
                    ),
                ),
                'DirectoryId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 63,
                ),
                'BundleId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 25,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 63,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more parameter values are not valid.',
                    'class' => 'InvalidParameterValuesException',
                ),
                array(
                    'reason' => 'The specified resource is not available.',
                    'class' => 'ResourceUnavailableException',
                ),
            ),
        ),
        'RebootWorkspaces' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RebootWorkspacesResult',
            'responseType' => 'model',
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
                    'default' => 'WorkspacesService.RebootWorkspaces',
                ),
                'RebootWorkspaceRequests' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 25,
                    'items' => array(
                        'name' => 'RebootRequest',
                        'type' => 'object',
                        'properties' => array(
                            'WorkspaceId' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RebuildWorkspaces' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RebuildWorkspacesResult',
            'responseType' => 'model',
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
                    'default' => 'WorkspacesService.RebuildWorkspaces',
                ),
                'RebuildWorkspaceRequests' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 1,
                    'items' => array(
                        'name' => 'RebuildRequest',
                        'type' => 'object',
                        'properties' => array(
                            'WorkspaceId' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'TerminateWorkspaces' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'TerminateWorkspacesResult',
            'responseType' => 'model',
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
                    'default' => 'WorkspacesService.TerminateWorkspaces',
                ),
                'TerminateWorkspaceRequests' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 25,
                    'items' => array(
                        'name' => 'TerminateRequest',
                        'type' => 'object',
                        'properties' => array(
                            'WorkspaceId' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'models' => array(
        'CreateWorkspacesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'FailedRequests' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'FailedCreateWorkspaceRequest',
                        'type' => 'object',
                        'properties' => array(
                            'WorkspaceRequest' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'DirectoryId' => array(
                                        'type' => 'string',
                                    ),
                                    'UserName' => array(
                                        'type' => 'string',
                                    ),
                                    'BundleId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'ErrorCode' => array(
                                'type' => 'string',
                            ),
                            'ErrorMessage' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'PendingRequests' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Workspace',
                        'type' => 'object',
                        'properties' => array(
                            'WorkspaceId' => array(
                                'type' => 'string',
                            ),
                            'DirectoryId' => array(
                                'type' => 'string',
                            ),
                            'UserName' => array(
                                'type' => 'string',
                            ),
                            'IpAddress' => array(
                                'type' => 'string',
                            ),
                            'State' => array(
                                'type' => 'string',
                            ),
                            'BundleId' => array(
                                'type' => 'string',
                            ),
                            'SubnetId' => array(
                                'type' => 'string',
                            ),
                            'ErrorMessage' => array(
                                'type' => 'string',
                            ),
                            'ErrorCode' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeWorkspaceBundlesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Bundles' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'WorkspaceBundle',
                        'type' => 'object',
                        'properties' => array(
                            'BundleId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Owner' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'UserStorage' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Capacity' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'ComputeType' => array(
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
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeWorkspaceDirectoriesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Directories' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'WorkspaceDirectory',
                        'type' => 'object',
                        'properties' => array(
                            'DirectoryId' => array(
                                'type' => 'string',
                            ),
                            'Alias' => array(
                                'type' => 'string',
                            ),
                            'DirectoryName' => array(
                                'type' => 'string',
                            ),
                            'RegistrationCode' => array(
                                'type' => 'string',
                            ),
                            'SubnetIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'SubnetId',
                                    'type' => 'string',
                                ),
                            ),
                            'DnsIpAddresses' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IpAddress',
                                    'type' => 'string',
                                ),
                            ),
                            'CustomerUserName' => array(
                                'type' => 'string',
                            ),
                            'IamRoleId' => array(
                                'type' => 'string',
                            ),
                            'DirectoryType' => array(
                                'type' => 'string',
                            ),
                            'WorkspaceSecurityGroupId' => array(
                                'type' => 'string',
                            ),
                            'State' => array(
                                'type' => 'string',
                            ),
                            'WorkspaceCreationProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'EnableWorkDocs' => array(
                                        'type' => 'boolean',
                                    ),
                                    'EnableInternetAccess' => array(
                                        'type' => 'boolean',
                                    ),
                                    'DefaultOu' => array(
                                        'type' => 'string',
                                    ),
                                    'CustomSecurityGroupId' => array(
                                        'type' => 'string',
                                    ),
                                    'UserEnabledAsLocalAdministrator' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeWorkspacesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Workspaces' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Workspace',
                        'type' => 'object',
                        'properties' => array(
                            'WorkspaceId' => array(
                                'type' => 'string',
                            ),
                            'DirectoryId' => array(
                                'type' => 'string',
                            ),
                            'UserName' => array(
                                'type' => 'string',
                            ),
                            'IpAddress' => array(
                                'type' => 'string',
                            ),
                            'State' => array(
                                'type' => 'string',
                            ),
                            'BundleId' => array(
                                'type' => 'string',
                            ),
                            'SubnetId' => array(
                                'type' => 'string',
                            ),
                            'ErrorMessage' => array(
                                'type' => 'string',
                            ),
                            'ErrorCode' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'RebootWorkspacesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'FailedRequests' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'FailedWorkspaceChangeRequest',
                        'type' => 'object',
                        'properties' => array(
                            'WorkspaceId' => array(
                                'type' => 'string',
                            ),
                            'ErrorCode' => array(
                                'type' => 'string',
                            ),
                            'ErrorMessage' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RebuildWorkspacesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'FailedRequests' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'FailedWorkspaceChangeRequest',
                        'type' => 'object',
                        'properties' => array(
                            'WorkspaceId' => array(
                                'type' => 'string',
                            ),
                            'ErrorCode' => array(
                                'type' => 'string',
                            ),
                            'ErrorMessage' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'TerminateWorkspacesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'FailedRequests' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'FailedWorkspaceChangeRequest',
                        'type' => 'object',
                        'properties' => array(
                            'WorkspaceId' => array(
                                'type' => 'string',
                            ),
                            'ErrorCode' => array(
                                'type' => 'string',
                            ),
                            'ErrorMessage' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
