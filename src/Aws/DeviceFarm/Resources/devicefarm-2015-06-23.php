<?php

return array (
    'apiVersion' => '2015-06-23',
    'endpointPrefix' => 'devicefarm',
    'serviceFullName' => 'AWS Device Farm',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'DeviceFarm_20150623.',
    'signatureVersion' => 'v4',
    'namespace' => 'DeviceFarm',
    'operations' => array(
        'CreateDevicePool' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDevicePoolResult',
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
                    'default' => 'DeviceFarm_20150623.CreateDevicePool',
                ),
                'projectArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'rules' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Rule',
                        'type' => 'object',
                        'properties' => array(
                            'attribute' => array(
                                'type' => 'string',
                            ),
                            'operator' => array(
                                'type' => 'string',
                            ),
                            'value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'CreateProject' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateProjectResult',
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
                    'default' => 'DeviceFarm_20150623.CreateProject',
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'CreateUpload' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateUploadResult',
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
                    'default' => 'DeviceFarm_20150623.CreateUpload',
                ),
                '' => array(
                    'type' => 'object',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'DeleteDevicePool' => array(
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
                    'default' => 'DeviceFarm_20150623.DeleteDevicePool',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'DeleteProject' => array(
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
                    'default' => 'DeviceFarm_20150623.DeleteProject',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'DeleteRun' => array(
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
                    'default' => 'DeviceFarm_20150623.DeleteRun',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'DeleteUpload' => array(
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
                    'default' => 'DeviceFarm_20150623.DeleteUpload',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'GetAccountSettings' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetAccountSettingsResult',
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
                    'default' => 'DeviceFarm_20150623.GetAccountSettings',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'GetDevice' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDeviceResult',
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
                    'default' => 'DeviceFarm_20150623.GetDevice',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'GetDevicePool' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDevicePoolResult',
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
                    'default' => 'DeviceFarm_20150623.GetDevicePool',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'GetDevicePoolCompatibility' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDevicePoolCompatibilityResult',
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
                    'default' => 'DeviceFarm_20150623.GetDevicePoolCompatibility',
                ),
                'devicePoolArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'appArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'testType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'GetJob' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetJobResult',
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
                    'default' => 'DeviceFarm_20150623.GetJob',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'GetProject' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetProjectResult',
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
                    'default' => 'DeviceFarm_20150623.GetProject',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'GetRun' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetRunResult',
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
                    'default' => 'DeviceFarm_20150623.GetRun',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'GetSuite' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetSuiteResult',
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
                    'default' => 'DeviceFarm_20150623.GetSuite',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'GetTest' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetTestResult',
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
                    'default' => 'DeviceFarm_20150623.GetTest',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'GetUpload' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetUploadResult',
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
                    'default' => 'DeviceFarm_20150623.GetUpload',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListArtifacts' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListArtifactsResult',
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
                    'default' => 'DeviceFarm_20150623.ListArtifacts',
                ),
                '' => array(
                    'type' => 'object',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListDevicePools' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListDevicePoolsResult',
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
                    'default' => 'DeviceFarm_20150623.ListDevicePools',
                ),
                '' => array(
                    'type' => 'object',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListDevices' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListDevicesResult',
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
                    'default' => 'DeviceFarm_20150623.ListDevices',
                ),
                'arn' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 4,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListJobs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListJobsResult',
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
                    'default' => 'DeviceFarm_20150623.ListJobs',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 4,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListProjects' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListProjectsResult',
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
                    'default' => 'DeviceFarm_20150623.ListProjects',
                ),
                'arn' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 4,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListRuns' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListRunsResult',
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
                    'default' => 'DeviceFarm_20150623.ListRuns',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 4,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListSamples' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListSamplesResult',
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
                    'default' => 'DeviceFarm_20150623.ListSamples',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 4,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListSuites' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListSuitesResult',
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
                    'default' => 'DeviceFarm_20150623.ListSuites',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 4,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListTests' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListTestsResult',
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
                    'default' => 'DeviceFarm_20150623.ListTests',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 4,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListUniqueProblems' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListUniqueProblemsResult',
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
                    'default' => 'DeviceFarm_20150623.ListUniqueProblems',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 4,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ListUploads' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListUploadsResult',
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
                    'default' => 'DeviceFarm_20150623.ListUploads',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 4,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'ScheduleRun' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ScheduleRunResult',
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
                    'default' => 'DeviceFarm_20150623.ScheduleRun',
                ),
                'projectArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'appArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'devicePoolArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'test' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
                'configuration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'extraDataPackageArn' => array(
                            'type' => 'string',
                            'minLength' => 32,
                        ),
                        'networkProfileArn' => array(
                            'type' => 'string',
                            'minLength' => 32,
                        ),
                        'locale' => array(
                            'type' => 'string',
                        ),
                        'location' => array(
                            'type' => 'object',
                            'properties' => array(
                                'latitude' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                ),
                                'longitude' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'radios' => array(
                            'type' => 'object',
                            'properties' => array(
                                'wifi' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'bluetooth' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'nfc' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'gps' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'auxiliaryApps' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AmazonResourceName',
                                'type' => 'string',
                                'minLength' => 32,
                            ),
                        ),
                        'billingMethod' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'An entity with the same name already exists.',
                    'class' => 'IdempotencyException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'UpdateDevicePool' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateDevicePoolResult',
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
                    'default' => 'DeviceFarm_20150623.UpdateDevicePool',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'rules' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Rule',
                        'type' => 'object',
                        'properties' => array(
                            'attribute' => array(
                                'type' => 'string',
                            ),
                            'operator' => array(
                                'type' => 'string',
                            ),
                            'value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
        'UpdateProject' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateProjectResult',
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
                    'default' => 'DeviceFarm_20150623.UpdateProject',
                ),
                'arn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 32,
                ),
                'name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An invalid argument was specified.',
                    'class' => 'ArgumentException',
                ),
                array(
                    'reason' => 'The specified entity was not found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A limit was exceeded.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'There was a problem with the service account.',
                    'class' => 'ServiceAccountException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CreateDevicePoolResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'devicePool' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
        ),
        'CreateProjectResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'project' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'arn' => array(
                            'type' => 'string',
                        ),
                        'name' => array(
                            'type' => 'string',
                        ),
                        'created' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'CreateUploadResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'upload' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'GetAccountSettingsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'accountSettings' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'awsAccountNumber' => array(
                            'type' => 'string',
                        ),
                        'unmeteredDevices' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetDeviceResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'device' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'arn' => array(
                            'type' => 'string',
                        ),
                        'name' => array(
                            'type' => 'string',
                        ),
                        'manufacturer' => array(
                            'type' => 'string',
                        ),
                        'model' => array(
                            'type' => 'string',
                        ),
                        'formFactor' => array(
                            'type' => 'string',
                        ),
                        'platform' => array(
                            'type' => 'string',
                        ),
                        'os' => array(
                            'type' => 'string',
                        ),
                        'cpu' => array(
                            'type' => 'object',
                            'properties' => array(
                                'frequency' => array(
                                    'type' => 'string',
                                ),
                                'architecture' => array(
                                    'type' => 'string',
                                ),
                                'clock' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'resolution' => array(
                            'type' => 'object',
                            'properties' => array(
                                'width' => array(
                                    'type' => 'numeric',
                                ),
                                'height' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'heapSize' => array(
                            'type' => 'numeric',
                        ),
                        'memory' => array(
                            'type' => 'numeric',
                        ),
                        'image' => array(
                            'type' => 'string',
                        ),
                        'carrier' => array(
                            'type' => 'string',
                        ),
                        'radio' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetDevicePoolResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'devicePool' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
        ),
        'GetDevicePoolCompatibilityResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'compatibleDevices' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DevicePoolCompatibilityResult',
                        'type' => 'object',
                        'properties' => array(
                            'device' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'arn' => array(
                                        'type' => 'string',
                                    ),
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'manufacturer' => array(
                                        'type' => 'string',
                                    ),
                                    'model' => array(
                                        'type' => 'string',
                                    ),
                                    'formFactor' => array(
                                        'type' => 'string',
                                    ),
                                    'platform' => array(
                                        'type' => 'string',
                                    ),
                                    'os' => array(
                                        'type' => 'string',
                                    ),
                                    'cpu' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'frequency' => array(
                                                'type' => 'string',
                                            ),
                                            'architecture' => array(
                                                'type' => 'string',
                                            ),
                                            'clock' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                    'resolution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'width' => array(
                                                'type' => 'numeric',
                                            ),
                                            'height' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                    'heapSize' => array(
                                        'type' => 'numeric',
                                    ),
                                    'memory' => array(
                                        'type' => 'numeric',
                                    ),
                                    'image' => array(
                                        'type' => 'string',
                                    ),
                                    'carrier' => array(
                                        'type' => 'string',
                                    ),
                                    'radio' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'compatible' => array(
                                'type' => 'boolean',
                            ),
                            'incompatibilityMessages' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IncompatibilityMessage',
                                    'type' => 'object',
                                    'properties' => array(
                                        '' => array(
                                            'type' => 'object',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'incompatibleDevices' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DevicePoolCompatibilityResult',
                        'type' => 'object',
                        'properties' => array(
                            'device' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'arn' => array(
                                        'type' => 'string',
                                    ),
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'manufacturer' => array(
                                        'type' => 'string',
                                    ),
                                    'model' => array(
                                        'type' => 'string',
                                    ),
                                    'formFactor' => array(
                                        'type' => 'string',
                                    ),
                                    'platform' => array(
                                        'type' => 'string',
                                    ),
                                    'os' => array(
                                        'type' => 'string',
                                    ),
                                    'cpu' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'frequency' => array(
                                                'type' => 'string',
                                            ),
                                            'architecture' => array(
                                                'type' => 'string',
                                            ),
                                            'clock' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                    'resolution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'width' => array(
                                                'type' => 'numeric',
                                            ),
                                            'height' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                    'heapSize' => array(
                                        'type' => 'numeric',
                                    ),
                                    'memory' => array(
                                        'type' => 'numeric',
                                    ),
                                    'image' => array(
                                        'type' => 'string',
                                    ),
                                    'carrier' => array(
                                        'type' => 'string',
                                    ),
                                    'radio' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'compatible' => array(
                                'type' => 'boolean',
                            ),
                            'incompatibilityMessages' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'IncompatibilityMessage',
                                    'type' => 'object',
                                    'properties' => array(
                                        '' => array(
                                            'type' => 'object',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetJobResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'job' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
        ),
        'GetProjectResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'project' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'arn' => array(
                            'type' => 'string',
                        ),
                        'name' => array(
                            'type' => 'string',
                        ),
                        'created' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetRunResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'run' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
        ),
        'GetSuiteResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'suite' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
        ),
        'GetTestResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'test' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
        ),
        'GetUploadResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'upload' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
        ),
        'ListArtifactsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'artifacts' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Artifact',
                        'type' => 'object',
                        'properties' => array(
                            '' => array(
                                'type' => 'object',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListDevicePoolsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'devicePools' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DevicePool',
                        'type' => 'object',
                        'properties' => array(
                            '' => array(
                                'type' => 'object',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListDevicesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'devices' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Device',
                        'type' => 'object',
                        'properties' => array(
                            'arn' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                            'manufacturer' => array(
                                'type' => 'string',
                            ),
                            'model' => array(
                                'type' => 'string',
                            ),
                            'formFactor' => array(
                                'type' => 'string',
                            ),
                            'platform' => array(
                                'type' => 'string',
                            ),
                            'os' => array(
                                'type' => 'string',
                            ),
                            'cpu' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'frequency' => array(
                                        'type' => 'string',
                                    ),
                                    'architecture' => array(
                                        'type' => 'string',
                                    ),
                                    'clock' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'resolution' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'width' => array(
                                        'type' => 'numeric',
                                    ),
                                    'height' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'heapSize' => array(
                                'type' => 'numeric',
                            ),
                            'memory' => array(
                                'type' => 'numeric',
                            ),
                            'image' => array(
                                'type' => 'string',
                            ),
                            'carrier' => array(
                                'type' => 'string',
                            ),
                            'radio' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListJobsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'jobs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Job',
                        'type' => 'object',
                        'properties' => array(
                            '' => array(
                                'type' => 'object',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListProjectsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'projects' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Project',
                        'type' => 'object',
                        'properties' => array(
                            'arn' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                            'created' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListRunsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'runs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Run',
                        'type' => 'object',
                        'properties' => array(
                            '' => array(
                                'type' => 'object',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListSamplesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'samples' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Sample',
                        'type' => 'object',
                        'properties' => array(
                            '' => array(
                                'type' => 'object',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListSuitesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'suites' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Suite',
                        'type' => 'object',
                        'properties' => array(
                            '' => array(
                                'type' => 'object',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListTestsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'tests' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Test',
                        'type' => 'object',
                        'properties' => array(
                            '' => array(
                                'type' => 'object',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListUniqueProblemsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'uniqueProblems' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'array',
                        'items' => array(
                            'name' => 'UniqueProblem',
                            'type' => 'object',
                            'properties' => array(
                                'message' => array(
                                    'type' => 'string',
                                ),
                                'problems' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Problem',
                                        'type' => 'object',
                                        'properties' => array(
                                            'run' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'arn' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'name' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'job' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'arn' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'name' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'suite' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'arn' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'name' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'test' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'arn' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'name' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'device' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'arn' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'name' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'manufacturer' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'model' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'formFactor' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'platform' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'os' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'cpu' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'frequency' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'architecture' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'clock' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                        ),
                                                    ),
                                                    'resolution' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'width' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                            'height' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                        ),
                                                    ),
                                                    'heapSize' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'memory' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'image' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'carrier' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'radio' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'result' => array(
                                                'type' => 'string',
                                            ),
                                            'message' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListUploadsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'uploads' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Upload',
                        'type' => 'object',
                        'properties' => array(
                            '' => array(
                                'type' => 'object',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ScheduleRunResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'run' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
        ),
        'UpdateDevicePoolResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'devicePool' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
        ),
        'UpdateProjectResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'project' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'arn' => array(
                            'type' => 'string',
                        ),
                        'name' => array(
                            'type' => 'string',
                        ),
                        'created' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListArtifacts' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'artifacts',
        ),
        'ListDevicePools' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'devicePools',
        ),
        'ListDevices' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'devices',
        ),
        'ListJobs' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'jobs',
        ),
        'ListProjects' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'projects',
        ),
        'ListRuns' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'runs',
        ),
        'ListSamples' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'samples',
        ),
        'ListSuites' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'suites',
        ),
        'ListTests' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'tests',
        ),
        'ListUniqueProblems' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'uniqueProblems',
        ),
        'ListUploads' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'result_key' => 'uploads',
        ),
    ),
);
