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
    'apiVersion' => '2015-03-31',
    'endpointPrefix' => 'lambda',
    'serviceFullName' => 'AWS Lambda',
    'serviceType' => 'rest-json',
    'signatureVersion' => 'v4',
    'namespace' => 'Lambda',
    'operations' => array(
        'AddPermission' => array(
            'httpMethod' => 'POST',
            'uri' => '/2015-03-31/functions/{FunctionName}/policy',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'AddPermissionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'StatementId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Action' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Principal' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SourceArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SourceAccount' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Qualifier' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The resource already exists.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Lambda function access policy is limited to 20 KB.',
                    'class' => 'PolicyLengthExceededException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'CreateAlias' => array(
            'httpMethod' => 'POST',
            'uri' => '/2015-03-31/functions/{FunctionName}/aliases',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'AliasConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'FunctionVersion' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The resource already exists.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'CreateEventSourceMapping' => array(
            'httpMethod' => 'POST',
            'uri' => '/2015-03-31/event-source-mappings/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EventSourceMappingConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'EventSourceArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Enabled' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'BatchSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
                'StartingPosition' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The resource already exists.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'CreateFunction' => array(
            'httpMethod' => 'POST',
            'uri' => '/2015-03-31/functions',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'FunctionConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Runtime' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Role' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Handler' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Code' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ZipFile' => array(
                            'type' => array(
                                'string',
                                'object',
                            ),
                        ),
                        'S3Bucket' => array(
                            'type' => 'string',
                            'minLength' => 3,
                        ),
                        'S3Key' => array(
                            'type' => 'string',
                            'minLength' => 1,
                        ),
                        'S3ObjectVersion' => array(
                            'type' => 'string',
                            'minLength' => 1,
                        ),
                    ),
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Timeout' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
                'MemorySize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 128,
                    'maximum' => 1536,
                ),
                'Publish' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The resource already exists.',
                    'class' => 'ResourceConflictException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'You have exceeded your maximum total code size per account. Limits',
                    'class' => 'CodeStorageExceededException',
                ),
            ),
        ),
        'DeleteAlias' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2015-03-31/functions/{FunctionName}/aliases/{Name}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'DeleteEventSourceMapping' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2015-03-31/event-source-mappings/{UUID}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EventSourceMappingConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'UUID' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'DeleteFunction' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2015-03-31/functions/{FunctionName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Qualifier' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The resource already exists.',
                    'class' => 'ResourceConflictException',
                ),
            ),
        ),
        'GetAlias' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-03-31/functions/{FunctionName}/aliases/{Name}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'AliasConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'GetEventSourceMapping' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-03-31/event-source-mappings/{UUID}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EventSourceMappingConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'UUID' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'GetFunction' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-03-31/functions/{FunctionName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetFunctionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Qualifier' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'GetFunctionConfiguration' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-03-31/functions/{FunctionName}/configuration',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'FunctionConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Qualifier' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'GetPolicy' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-03-31/functions/{FunctionName}/policy',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetPolicyResponse',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Qualifier' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'Invoke' => array(
            'httpMethod' => 'POST',
            'uri' => '/2015-03-31/functions/{FunctionName}/invocations',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'InvocationResponse',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'InvocationType' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'X-Amz-Invocation-Type',
                ),
                'LogType' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'X-Amz-Log-Type',
                ),
                'ClientContext' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'X-Amz-Client-Context',
                ),
                'Payload' => array(
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'body',
                ),
                'Qualifier' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The request body could not be parsed as JSON.',
                    'class' => 'InvalidRequestContentException',
                ),
                array(
                    'reason' => 'The request payload exceeded the Invoke request body JSON input limit. For more information, see Limits',
                    'class' => 'RequestTooLargeException',
                ),
                array(
                    'reason' => 'The content type of the Invoke request body is not JSON.',
                    'class' => 'UnsupportedMediaTypeException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'InvokeAsync' => array(
            'httpMethod' => 'POST',
            'uri' => '/2014-11-13/functions/{FunctionName}/invoke-async/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'InvokeAsyncResponse',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'InvokeArgs' => array(
                    'required' => true,
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'body',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The request body could not be parsed as JSON.',
                    'class' => 'InvalidRequestContentException',
                ),
            ),
        ),
        'ListAliases' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-03-31/functions/{FunctionName}/aliases',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListAliasesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'FunctionVersion' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'ListEventSourceMappings' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-03-31/event-source-mappings/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListEventSourceMappingsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'EventSourceArn' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'FunctionName' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'ListFunctions' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-03-31/functions/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListFunctionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'ListVersionsByFunction' => array(
            'httpMethod' => 'GET',
            'uri' => '/2015-03-31/functions/{FunctionName}/versions',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListVersionsByFunctionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'PublishVersion' => array(
            'httpMethod' => 'POST',
            'uri' => '/2015-03-31/functions/{FunctionName}/versions',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'FunctionConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'CodeSha256' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'You have exceeded your maximum total code size per account. Limits',
                    'class' => 'CodeStorageExceededException',
                ),
            ),
        ),
        'RemovePermission' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2015-03-31/functions/{FunctionName}/policy/{StatementId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'StatementId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Qualifier' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'UpdateAlias' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2015-03-31/functions/{FunctionName}/aliases/{Name}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'AliasConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'FunctionVersion' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
        'UpdateEventSourceMapping' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2015-03-31/event-source-mappings/{UUID}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EventSourceMappingConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'UUID' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'FunctionName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Enabled' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'BatchSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'The resource already exists.',
                    'class' => 'ResourceConflictException',
                ),
            ),
        ),
        'UpdateFunctionCode' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2015-03-31/functions/{FunctionName}/code',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'FunctionConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'ZipFile' => array(
                    'type' => array(
                        'string',
                        'object',
                    ),
                ),
                'S3Bucket' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                ),
                'S3Key' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'S3ObjectVersion' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Publish' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
                array(
                    'reason' => 'You have exceeded your maximum total code size per account. Limits',
                    'class' => 'CodeStorageExceededException',
                ),
            ),
        ),
        'UpdateFunctionConfiguration' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2015-03-31/functions/{FunctionName}/configuration',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'FunctionConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                ),
                'Role' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Handler' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Timeout' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
                'MemorySize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 128,
                    'maximum' => 1536,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The resource (for example, a Lambda function or access policy statement) specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the CreateFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'class' => 'TooManyRequestsException',
                ),
            ),
        ),
    ),
    'models' => array(
        'AddPermissionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Statement' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'AliasConfiguration' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AliasArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FunctionVersion' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'EventSourceMappingConfiguration' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'UUID' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'BatchSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'EventSourceArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FunctionArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastModified' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastProcessingResult' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'State' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StateTransitionReason' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'FunctionConfiguration' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'FunctionName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FunctionArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Runtime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Role' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Handler' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CodeSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Timeout' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'MemorySize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'LastModified' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CodeSha256' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Version' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'GetFunctionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Configuration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FunctionName' => array(
                            'type' => 'string',
                        ),
                        'FunctionArn' => array(
                            'type' => 'string',
                        ),
                        'Runtime' => array(
                            'type' => 'string',
                        ),
                        'Role' => array(
                            'type' => 'string',
                        ),
                        'Handler' => array(
                            'type' => 'string',
                        ),
                        'CodeSize' => array(
                            'type' => 'numeric',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'Timeout' => array(
                            'type' => 'numeric',
                        ),
                        'MemorySize' => array(
                            'type' => 'numeric',
                        ),
                        'LastModified' => array(
                            'type' => 'string',
                        ),
                        'CodeSha256' => array(
                            'type' => 'string',
                        ),
                        'Version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Code' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'RepositoryType' => array(
                            'type' => 'string',
                        ),
                        'Location' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetPolicyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Policy' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'InvocationResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StatusCode' => array(
                    'type' => 'numeric',
                    'location' => 'statusCode',
                ),
                'FunctionError' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'X-Amz-Function-Error',
                ),
                'LogResult' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'X-Amz-Log-Result',
                ),
                'Payload' => array(
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'json',
                ),
            ),
        ),
        'InvokeAsyncResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Status' => array(
                    'type' => 'numeric',
                    'location' => 'statusCode',
                ),
            ),
        ),
        'ListAliasesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Aliases' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AliasConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'AliasArn' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'FunctionVersion' => array(
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
        'ListEventSourceMappingsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EventSourceMappings' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'EventSourceMappingConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'UUID' => array(
                                'type' => 'string',
                            ),
                            'BatchSize' => array(
                                'type' => 'numeric',
                            ),
                            'EventSourceArn' => array(
                                'type' => 'string',
                            ),
                            'FunctionArn' => array(
                                'type' => 'string',
                            ),
                            'LastModified' => array(
                                'type' => 'string',
                            ),
                            'LastProcessingResult' => array(
                                'type' => 'string',
                            ),
                            'State' => array(
                                'type' => 'string',
                            ),
                            'StateTransitionReason' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListFunctionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Functions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'FunctionConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'FunctionName' => array(
                                'type' => 'string',
                            ),
                            'FunctionArn' => array(
                                'type' => 'string',
                            ),
                            'Runtime' => array(
                                'type' => 'string',
                            ),
                            'Role' => array(
                                'type' => 'string',
                            ),
                            'Handler' => array(
                                'type' => 'string',
                            ),
                            'CodeSize' => array(
                                'type' => 'numeric',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Timeout' => array(
                                'type' => 'numeric',
                            ),
                            'MemorySize' => array(
                                'type' => 'numeric',
                            ),
                            'LastModified' => array(
                                'type' => 'string',
                            ),
                            'CodeSha256' => array(
                                'type' => 'string',
                            ),
                            'Version' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListVersionsByFunctionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Versions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'FunctionConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'FunctionName' => array(
                                'type' => 'string',
                            ),
                            'FunctionArn' => array(
                                'type' => 'string',
                            ),
                            'Runtime' => array(
                                'type' => 'string',
                            ),
                            'Role' => array(
                                'type' => 'string',
                            ),
                            'Handler' => array(
                                'type' => 'string',
                            ),
                            'CodeSize' => array(
                                'type' => 'numeric',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Timeout' => array(
                                'type' => 'numeric',
                            ),
                            'MemorySize' => array(
                                'type' => 'numeric',
                            ),
                            'LastModified' => array(
                                'type' => 'string',
                            ),
                            'CodeSha256' => array(
                                'type' => 'string',
                            ),
                            'Version' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListEventSourceMappings' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'limit_key' => 'MaxItems',
            'result_key' => 'EventSourceMappings',
        ),
        'ListFunctions' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'limit_key' => 'MaxItems',
            'result_key' => 'Functions',
        ),
    ),
);
