<?php

return array (
    'apiVersion' => '2015-04-16',
    'endpointPrefix' => 'ds',
    'serviceFullName' => 'AWS Directory Service',
    'serviceAbbreviation' => 'Directory Service',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'DirectoryService_20150416.',
    'signatureVersion' => 'v4',
    'namespace' => 'DirectoryService',
    'operations' => array(
        'ConnectDirectory' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ConnectDirectoryResult',
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
                    'default' => 'DirectoryService_20150416.ConnectDirectory',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ShortName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Password' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Size' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ConnectSettings' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'VpcId' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'SubnetIds' => array(
                            'required' => true,
                            'type' => 'array',
                            'items' => array(
                                'name' => 'SubnetId',
                                'type' => 'string',
                            ),
                        ),
                        'CustomerDnsIps' => array(
                            'required' => true,
                            'type' => 'array',
                            'items' => array(
                                'name' => 'IpAddr',
                                'type' => 'string',
                            ),
                        ),
                        'CustomerUserName' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The maximum number of directories in the region has been reached. You can use the GetDirectoryLimits operation to determine your directory limits in the region.',
                    'class' => 'DirectoryLimitExceededException',
                ),
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'CreateAlias' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateAliasResult',
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
                    'default' => 'DirectoryService_20150416.CreateAlias',
                ),
                'DirectoryId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Alias' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'CreateComputer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateComputerResult',
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
                    'default' => 'DirectoryService_20150416.CreateComputer',
                ),
                'DirectoryId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ComputerName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Password' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 8,
                ),
                'OrganizationalUnitDistinguishedName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'ComputerAttributes' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Attribute',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                                'minLength' => 1,
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
                    'reason' => 'An authentication error occurred.',
                    'class' => 'AuthenticationFailedException',
                ),
                array(
                    'reason' => 'The specified directory is unavailable or could not be found.',
                    'class' => 'DirectoryUnavailableException',
                ),
                array(
                    'reason' => 'The specified entity already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'The operation is not supported.',
                    'class' => 'UnsupportedOperationException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'CreateDirectory' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDirectoryResult',
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
                    'default' => 'DirectoryService_20150416.CreateDirectory',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ShortName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Password' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Size' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VpcSettings' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'VpcId' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'SubnetIds' => array(
                            'required' => true,
                            'type' => 'array',
                            'items' => array(
                                'name' => 'SubnetId',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The maximum number of directories in the region has been reached. You can use the GetDirectoryLimits operation to determine your directory limits in the region.',
                    'class' => 'DirectoryLimitExceededException',
                ),
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'CreateSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateSnapshotResult',
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
                    'default' => 'DirectoryService_20150416.CreateSnapshot',
                ),
                'DirectoryId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'The maximum number of manual snapshots for the directory has been reached. You can use the GetSnapshotLimits operation to determine the snapshot limits for a directory.',
                    'class' => 'SnapshotLimitExceededException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'DeleteDirectory' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteDirectoryResult',
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
                    'default' => 'DirectoryService_20150416.DeleteDirectory',
                ),
                'DirectoryId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'DeleteSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteSnapshotResult',
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
                    'default' => 'DirectoryService_20150416.DeleteSnapshot',
                ),
                'SnapshotId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'DescribeDirectories' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeDirectoriesResult',
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
                    'default' => 'DirectoryService_20150416.DescribeDirectories',
                ),
                'DirectoryIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DirectoryId',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'The NextToken value is not valid.',
                    'class' => 'InvalidNextTokenException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'DescribeSnapshots' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeSnapshotsResult',
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
                    'default' => 'DirectoryService_20150416.DescribeSnapshots',
                ),
                'DirectoryId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SnapshotIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'SnapshotId',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'The NextToken value is not valid.',
                    'class' => 'InvalidNextTokenException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'DisableRadius' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
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
                    'default' => 'DirectoryService_20150416.DisableRadius',
                ),
                'DirectoryId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'DisableSso' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
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
                    'default' => 'DirectoryService_20150416.DisableSso',
                ),
                'DirectoryId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Password' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'The account does not have sufficient permission to perform the operation.',
                    'class' => 'InsufficientPermissionsException',
                ),
                array(
                    'reason' => 'An authentication error occurred.',
                    'class' => 'AuthenticationFailedException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'EnableRadius' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
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
                    'default' => 'DirectoryService_20150416.EnableRadius',
                ),
                'DirectoryId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RadiusSettings' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'RadiusServers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Server',
                                'type' => 'string',
                                'minLength' => 1,
                            ),
                        ),
                        'RadiusPort' => array(
                            'type' => 'numeric',
                            'minimum' => 1025,
                            'maximum' => 65535,
                        ),
                        'RadiusTimeout' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 20,
                        ),
                        'RadiusRetries' => array(
                            'type' => 'numeric',
                            'maximum' => 10,
                        ),
                        'SharedSecret' => array(
                            'type' => 'string',
                            'minLength' => 8,
                        ),
                        'AuthenticationProtocol' => array(
                            'type' => 'string',
                        ),
                        'DisplayLabel' => array(
                            'type' => 'string',
                            'minLength' => 1,
                        ),
                        'UseSameUsername' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'The specified entity already exists.',
                    'class' => 'EntityAlreadyExistsException',
                ),
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'EnableSso' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
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
                    'default' => 'DirectoryService_20150416.EnableSso',
                ),
                'DirectoryId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'UserName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Password' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'The account does not have sufficient permission to perform the operation.',
                    'class' => 'InsufficientPermissionsException',
                ),
                array(
                    'reason' => 'An authentication error occurred.',
                    'class' => 'AuthenticationFailedException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'GetDirectoryLimits' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDirectoryLimitsResult',
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
                    'default' => 'DirectoryService_20150416.GetDirectoryLimits',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'GetSnapshotLimits' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetSnapshotLimitsResult',
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
                    'default' => 'DirectoryService_20150416.GetSnapshotLimits',
                ),
                'DirectoryId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'RestoreFromSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
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
                    'default' => 'DirectoryService_20150416.RestoreFromSnapshot',
                ),
                'SnapshotId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'UpdateRadius' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
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
                    'default' => 'DirectoryService_20150416.UpdateRadius',
                ),
                'DirectoryId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RadiusSettings' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'RadiusServers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Server',
                                'type' => 'string',
                                'minLength' => 1,
                            ),
                        ),
                        'RadiusPort' => array(
                            'type' => 'numeric',
                            'minimum' => 1025,
                            'maximum' => 65535,
                        ),
                        'RadiusTimeout' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 20,
                        ),
                        'RadiusRetries' => array(
                            'type' => 'numeric',
                            'maximum' => 10,
                        ),
                        'SharedSecret' => array(
                            'type' => 'string',
                            'minLength' => 8,
                        ),
                        'AuthenticationProtocol' => array(
                            'type' => 'string',
                        ),
                        'DisplayLabel' => array(
                            'type' => 'string',
                            'minLength' => 1,
                        ),
                        'UseSameUsername' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more parameters are not valid.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'The specified entity could not be found.',
                    'class' => 'EntityDoesNotExistException',
                ),
                array(
                    'reason' => 'A client exception has occurred.',
                    'class' => 'ClientException',
                ),
                array(
                    'reason' => 'An exception has occurred in AWS Directory Service.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
    ),
    'models' => array(
        'ConnectDirectoryResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DirectoryId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateAliasResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DirectoryId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Alias' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateComputerResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Computer' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ComputerId' => array(
                            'type' => 'string',
                        ),
                        'ComputerName' => array(
                            'type' => 'string',
                        ),
                        'ComputerAttributes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Attribute',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
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
        'CreateDirectoryResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DirectoryId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateSnapshotResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteDirectoryResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DirectoryId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteSnapshotResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeDirectoriesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DirectoryDescriptions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DirectoryDescription',
                        'type' => 'object',
                        'properties' => array(
                            'DirectoryId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'ShortName' => array(
                                'type' => 'string',
                            ),
                            'Size' => array(
                                'type' => 'string',
                            ),
                            'Alias' => array(
                                'type' => 'string',
                            ),
                            'AccessUrl' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'DnsIpAddrs' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IpAddr',
                                    'type' => 'string',
                                ),
                            ),
                            'Stage' => array(
                                'type' => 'string',
                            ),
                            'LaunchTime' => array(
                                'type' => 'string',
                            ),
                            'StageLastUpdatedDateTime' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'VpcSettings' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'VpcId' => array(
                                        'type' => 'string',
                                    ),
                                    'SubnetIds' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'SubnetId',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'SecurityGroupId' => array(
                                        'type' => 'string',
                                    ),
                                    'AvailabilityZones' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'AvailabilityZone',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'ConnectSettings' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'VpcId' => array(
                                        'type' => 'string',
                                    ),
                                    'SubnetIds' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'SubnetId',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'CustomerUserName' => array(
                                        'type' => 'string',
                                    ),
                                    'SecurityGroupId' => array(
                                        'type' => 'string',
                                    ),
                                    'AvailabilityZones' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'AvailabilityZone',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'ConnectIps' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'IpAddr',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'RadiusSettings' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'RadiusServers' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Server',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'RadiusPort' => array(
                                        'type' => 'numeric',
                                    ),
                                    'RadiusTimeout' => array(
                                        'type' => 'numeric',
                                    ),
                                    'RadiusRetries' => array(
                                        'type' => 'numeric',
                                    ),
                                    'SharedSecret' => array(
                                        'type' => 'string',
                                    ),
                                    'AuthenticationProtocol' => array(
                                        'type' => 'string',
                                    ),
                                    'DisplayLabel' => array(
                                        'type' => 'string',
                                    ),
                                    'UseSameUsername' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                            'RadiusStatus' => array(
                                'type' => 'string',
                            ),
                            'StageReason' => array(
                                'type' => 'string',
                            ),
                            'SsoEnabled' => array(
                                'type' => 'boolean',
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
        'DescribeSnapshotsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Snapshots' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Snapshot',
                        'type' => 'object',
                        'properties' => array(
                            'DirectoryId' => array(
                                'type' => 'string',
                            ),
                            'SnapshotId' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'StartTime' => array(
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
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'GetDirectoryLimitsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DirectoryLimits' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'CloudOnlyDirectoriesLimit' => array(
                            'type' => 'numeric',
                        ),
                        'CloudOnlyDirectoriesCurrentCount' => array(
                            'type' => 'numeric',
                        ),
                        'CloudOnlyDirectoriesLimitReached' => array(
                            'type' => 'boolean',
                        ),
                        'ConnectedDirectoriesLimit' => array(
                            'type' => 'numeric',
                        ),
                        'ConnectedDirectoriesCurrentCount' => array(
                            'type' => 'numeric',
                        ),
                        'ConnectedDirectoriesLimitReached' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'GetSnapshotLimitsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SnapshotLimits' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ManualSnapshotsLimit' => array(
                            'type' => 'numeric',
                        ),
                        'ManualSnapshotsCurrentCount' => array(
                            'type' => 'numeric',
                        ),
                        'ManualSnapshotsLimitReached' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
