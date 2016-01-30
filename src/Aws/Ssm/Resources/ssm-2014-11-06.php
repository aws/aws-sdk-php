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
    'apiVersion' => '2014-11-06',
    'endpointPrefix' => 'ssm',
    'serviceFullName' => 'Amazon Simple Systems Management Service',
    'serviceAbbreviation' => 'Amazon SSM',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'AmazonSSM.',
    'signatureVersion' => 'v4',
    'namespace' => 'Ssm',
    'operations' => array(
        'CancelCommand' => array(
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
                    'default' => 'AmazonSSM.CancelCommand',
                ),
                'CommandId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 36,
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 50,
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidCommandIdException',
                ),
                array(
                    'reason' => 'The instance is not in valid state. Valid states are: Running, Pending, Stopped, Stopping. Invalid states are: Shutting-down and Terminated.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'You cannot specify an instance ID in more than one association.',
                    'class' => 'DuplicateInstanceIdException',
                ),
            ),
        ),
        'CreateAssociation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateAssociationResult',
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
                    'default' => 'AmazonSSM.CreateAssociation',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Parameters' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'array',
                        'data' => array(
                            'shape_name' => 'ParameterName',
                        ),
                        'items' => array(
                            'name' => 'ParameterValue',
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified association already exists.',
                    'class' => 'AssociationAlreadyExistsException',
                ),
                array(
                    'reason' => 'You can have at most 2,000 active associations.',
                    'class' => 'AssociationLimitExceededException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The specified document does not exist.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'The instance is not in valid state. Valid states are: Running, Pending, Stopped, Stopping. Invalid states are: Shutting-down and Terminated.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'The document does not support the platform type of the given instance ID(s).',
                    'class' => 'UnsupportedPlatformTypeException',
                ),
                array(
                    'reason' => 'You must specify values for all required parameters in the SSM document. You can only supply values to parameters defined in the SSM document.',
                    'class' => 'InvalidParametersException',
                ),
            ),
        ),
        'CreateAssociationBatch' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateAssociationBatchResult',
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
                    'default' => 'AmazonSSM.CreateAssociationBatch',
                ),
                'Entries' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'entries',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Parameters' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'array',
                                    'data' => array(
                                        'shape_name' => 'ParameterName',
                                    ),
                                    'items' => array(
                                        'name' => 'ParameterValue',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The specified document does not exist.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'The instance is not in valid state. Valid states are: Running, Pending, Stopped, Stopping. Invalid states are: Shutting-down and Terminated.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'You must specify values for all required parameters in the SSM document. You can only supply values to parameters defined in the SSM document.',
                    'class' => 'InvalidParametersException',
                ),
                array(
                    'reason' => 'You cannot specify an instance ID in more than one association.',
                    'class' => 'DuplicateInstanceIdException',
                ),
                array(
                    'reason' => 'You can have at most 2,000 active associations.',
                    'class' => 'AssociationLimitExceededException',
                ),
                array(
                    'reason' => 'The document does not support the platform type of the given instance ID(s).',
                    'class' => 'UnsupportedPlatformTypeException',
                ),
            ),
        ),
        'CreateDocument' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDocumentResult',
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
                    'default' => 'AmazonSSM.CreateDocument',
                ),
                'Content' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified SSM document already exists.',
                    'class' => 'DocumentAlreadyExistsException',
                ),
                array(
                    'reason' => 'The size limit of an SSM document is 64 KB.',
                    'class' => 'MaxDocumentSizeExceededException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The content for the SSM document is not valid.',
                    'class' => 'InvalidDocumentContentException',
                ),
                array(
                    'reason' => 'You can have at most 100 active SSM documents.',
                    'class' => 'DocumentLimitExceededException',
                ),
            ),
        ),
        'DeleteAssociation' => array(
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
                    'default' => 'AmazonSSM.DeleteAssociation',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified association does not exist.',
                    'class' => 'AssociationDoesNotExistException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The specified document does not exist.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'The instance is not in valid state. Valid states are: Running, Pending, Stopped, Stopping. Invalid states are: Shutting-down and Terminated.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'There are concurrent updates for a resource that supports one update at a time.',
                    'class' => 'TooManyUpdatesException',
                ),
            ),
        ),
        'DeleteDocument' => array(
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
                    'default' => 'AmazonSSM.DeleteDocument',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The specified document does not exist.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'You must disassociate an SSM document from all instances before you can delete it.',
                    'class' => 'AssociatedInstancesException',
                ),
            ),
        ),
        'DescribeAssociation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeAssociationResult',
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
                    'default' => 'AmazonSSM.DescribeAssociation',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified association does not exist.',
                    'class' => 'AssociationDoesNotExistException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The specified document does not exist.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'The instance is not in valid state. Valid states are: Running, Pending, Stopped, Stopping. Invalid states are: Shutting-down and Terminated.',
                    'class' => 'InvalidInstanceIdException',
                ),
            ),
        ),
        'DescribeDocument' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeDocumentResult',
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
                    'default' => 'AmazonSSM.DescribeDocument',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The specified document does not exist.',
                    'class' => 'InvalidDocumentException',
                ),
            ),
        ),
        'DescribeInstanceInformation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeInstanceInformationResult',
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
                    'default' => 'AmazonSSM.DescribeInstanceInformation',
                ),
                'InstanceInformationFilterList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'InstanceInformationFilter',
                        'type' => 'object',
                        'properties' => array(
                            'key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'valueSet' => array(
                                'required' => true,
                                'type' => 'array',
                                'minItems' => 1,
                                'maxItems' => 100,
                                'items' => array(
                                    'name' => 'InstanceInformationFilterValue',
                                    'type' => 'string',
                                    'minLength' => 1,
                                ),
                            ),
                        ),
                    ),
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 5,
                    'maximum' => 50,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The instance is not in valid state. Valid states are: Running, Pending, Stopped, Stopping. Invalid states are: Shutting-down and Terminated.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'The specified token is not valid.',
                    'class' => 'InvalidNextTokenException',
                ),
                array(
                    'reason' => 'The specified filter value is not valid.',
                    'class' => 'InvalidInstanceInformationFilterValueException',
                ),
                array(
                    'reason' => 'The specified key is not valid.',
                    'class' => 'InvalidFilterKeyException',
                ),
            ),
        ),
        'GetDocument' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDocumentResult',
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
                    'default' => 'AmazonSSM.GetDocument',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The specified document does not exist.',
                    'class' => 'InvalidDocumentException',
                ),
            ),
        ),
        'ListAssociations' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListAssociationsResult',
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
                    'default' => 'AmazonSSM.ListAssociations',
                ),
                'AssociationFilterList' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'AssociationFilter',
                        'type' => 'object',
                        'properties' => array(
                            'key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'value' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                            ),
                        ),
                    ),
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 25,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The specified token is not valid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'ListCommandInvocations' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListCommandInvocationsResult',
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
                    'default' => 'AmazonSSM.ListCommandInvocations',
                ),
                'CommandId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 36,
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 50,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 3,
                    'items' => array(
                        'name' => 'CommandFilter',
                        'type' => 'object',
                        'properties' => array(
                            'key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'value' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                            ),
                        ),
                    ),
                ),
                'Details' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidCommandIdException',
                ),
                array(
                    'reason' => 'The instance is not in valid state. Valid states are: Running, Pending, Stopped, Stopping. Invalid states are: Shutting-down and Terminated.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'The specified key is not valid.',
                    'class' => 'InvalidFilterKeyException',
                ),
                array(
                    'reason' => 'The specified token is not valid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'ListCommands' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListCommandsResult',
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
                    'default' => 'AmazonSSM.ListCommands',
                ),
                'CommandId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 36,
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 50,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 3,
                    'items' => array(
                        'name' => 'CommandFilter',
                        'type' => 'object',
                        'properties' => array(
                            'key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'value' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InvalidCommandIdException',
                ),
                array(
                    'reason' => 'The instance is not in valid state. Valid states are: Running, Pending, Stopped, Stopping. Invalid states are: Shutting-down and Terminated.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'The specified key is not valid.',
                    'class' => 'InvalidFilterKeyException',
                ),
                array(
                    'reason' => 'The specified token is not valid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'ListDocuments' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListDocumentsResult',
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
                    'default' => 'AmazonSSM.ListDocuments',
                ),
                'DocumentFilterList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'DocumentFilter',
                        'type' => 'object',
                        'properties' => array(
                            'key' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'value' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                            ),
                        ),
                    ),
                ),
                'MaxResults' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 25,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The specified token is not valid.',
                    'class' => 'InvalidNextTokenException',
                ),
                array(
                    'reason' => 'The specified key is not valid.',
                    'class' => 'InvalidFilterKeyException',
                ),
            ),
        ),
        'SendCommand' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'SendCommandResult',
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
                    'default' => 'AmazonSSM.SendCommand',
                ),
                'InstanceIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 50,
                    'items' => array(
                        'name' => 'InstanceId',
                        'type' => 'string',
                    ),
                ),
                'DocumentName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'TimeoutSeconds' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 30,
                    'maximum' => 2592000,
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Parameters' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'array',
                        'data' => array(
                            'shape_name' => 'ParameterName',
                        ),
                        'items' => array(
                            'name' => 'ParameterValue',
                            'type' => 'string',
                        ),
                    ),
                ),
                'OutputS3BucketName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                ),
                'OutputS3KeyPrefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You cannot specify an instance ID in more than one association.',
                    'class' => 'DuplicateInstanceIdException',
                ),
                array(
                    'reason' => 'The instance is not in valid state. Valid states are: Running, Pending, Stopped, Stopping. Invalid states are: Shutting-down and Terminated.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'The specified document does not exist.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'The S3 bucket does not exist.',
                    'class' => 'InvalidOutputFolderException',
                ),
                array(
                    'reason' => 'You must specify values for all required parameters in the SSM document. You can only supply values to parameters defined in the SSM document.',
                    'class' => 'InvalidParametersException',
                ),
                array(
                    'reason' => 'The document does not support the platform type of the given instance ID(s).',
                    'class' => 'UnsupportedPlatformTypeException',
                ),
            ),
        ),
        'UpdateAssociationStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateAssociationStatusResult',
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
                    'default' => 'AmazonSSM.UpdateAssociationStatus',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AssociationStatus' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Date' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                        'Name' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Message' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'AdditionalInfo' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The instance is not in valid state. Valid states are: Running, Pending, Stopped, Stopping. Invalid states are: Shutting-down and Terminated.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'The specified document does not exist.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'The specified association does not exist.',
                    'class' => 'AssociationDoesNotExistException',
                ),
                array(
                    'reason' => 'The updated status is the same as the current status.',
                    'class' => 'StatusUnchangedException',
                ),
                array(
                    'reason' => 'There are concurrent updates for a resource that supports one update at a time.',
                    'class' => 'TooManyUpdatesException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'CreateAssociationResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AssociationDescription' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'InstanceId' => array(
                            'type' => 'string',
                        ),
                        'Date' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Date' => array(
                                    'type' => 'string',
                                ),
                                'Name' => array(
                                    'type' => 'string',
                                ),
                                'Message' => array(
                                    'type' => 'string',
                                ),
                                'AdditionalInfo' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Parameters' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ParameterValue',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateAssociationBatchResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Successful' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AssociationDescription',
                        'type' => 'object',
                        'sentAs' => 'AssociationDescription',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Date' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Date' => array(
                                        'type' => 'string',
                                    ),
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'Message' => array(
                                        'type' => 'string',
                                    ),
                                    'AdditionalInfo' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Parameters' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'ParameterValue',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Failed' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'FailedCreateAssociationEntry',
                        'type' => 'object',
                        'sentAs' => 'FailedCreateAssociationEntry',
                        'properties' => array(
                            'Entry' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'InstanceId' => array(
                                        'type' => 'string',
                                    ),
                                    'Parameters' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'ParameterValue',
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                            'Fault' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateDocumentResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DocumentDescription' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Sha1' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'CreatedDate' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'Parameters' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'DocumentParameter',
                                'type' => 'object',
                                'sentAs' => 'DocumentParameter',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'Type' => array(
                                        'type' => 'string',
                                    ),
                                    'Description' => array(
                                        'type' => 'string',
                                    ),
                                    'DefaultValue' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'PlatformTypes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'PlatformType',
                                'type' => 'string',
                                'sentAs' => 'PlatformType',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeAssociationResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AssociationDescription' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'InstanceId' => array(
                            'type' => 'string',
                        ),
                        'Date' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Date' => array(
                                    'type' => 'string',
                                ),
                                'Name' => array(
                                    'type' => 'string',
                                ),
                                'Message' => array(
                                    'type' => 'string',
                                ),
                                'AdditionalInfo' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Parameters' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ParameterValue',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDocumentResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Document' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Sha1' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'CreatedDate' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'Parameters' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'DocumentParameter',
                                'type' => 'object',
                                'sentAs' => 'DocumentParameter',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'Type' => array(
                                        'type' => 'string',
                                    ),
                                    'Description' => array(
                                        'type' => 'string',
                                    ),
                                    'DefaultValue' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'PlatformTypes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'PlatformType',
                                'type' => 'string',
                                'sentAs' => 'PlatformType',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeInstanceInformationResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceInformationList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'InstanceInformation',
                        'type' => 'object',
                        'sentAs' => 'InstanceInformation',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'PingStatus' => array(
                                'type' => 'string',
                            ),
                            'LastPingDateTime' => array(
                                'type' => 'string',
                            ),
                            'AgentVersion' => array(
                                'type' => 'string',
                            ),
                            'IsLatestVersion' => array(
                                'type' => 'boolean',
                            ),
                            'PlatformType' => array(
                                'type' => 'string',
                            ),
                            'PlatformName' => array(
                                'type' => 'string',
                            ),
                            'PlatformVersion' => array(
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
        'GetDocumentResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Content' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListAssociationsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Associations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Association',
                        'type' => 'object',
                        'sentAs' => 'Association',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
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
        'ListCommandInvocationsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CommandInvocations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'CommandInvocation',
                        'type' => 'object',
                        'properties' => array(
                            'CommandId' => array(
                                'type' => 'string',
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'Comment' => array(
                                'type' => 'string',
                            ),
                            'DocumentName' => array(
                                'type' => 'string',
                            ),
                            'RequestedDateTime' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'TraceOutput' => array(
                                'type' => 'string',
                            ),
                            'CommandPlugins' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'CommandPlugin',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'Status' => array(
                                            'type' => 'string',
                                        ),
                                        'ResponseCode' => array(
                                            'type' => 'numeric',
                                        ),
                                        'ResponseStartDateTime' => array(
                                            'type' => 'string',
                                        ),
                                        'ResponseFinishDateTime' => array(
                                            'type' => 'string',
                                        ),
                                        'Output' => array(
                                            'type' => 'string',
                                        ),
                                        'OutputS3BucketName' => array(
                                            'type' => 'string',
                                        ),
                                        'OutputS3KeyPrefix' => array(
                                            'type' => 'string',
                                        ),
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
        'ListCommandsResult' => array(
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
                            'DocumentName' => array(
                                'type' => 'string',
                            ),
                            'Comment' => array(
                                'type' => 'string',
                            ),
                            'ExpiresAfter' => array(
                                'type' => 'string',
                            ),
                            'Parameters' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'ParameterValue',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'InstanceIds' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'InstanceId',
                                    'type' => 'string',
                                ),
                            ),
                            'RequestedDateTime' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'OutputS3BucketName' => array(
                                'type' => 'string',
                            ),
                            'OutputS3KeyPrefix' => array(
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
        'ListDocumentsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DocumentIdentifiers' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DocumentIdentifier',
                        'type' => 'object',
                        'sentAs' => 'DocumentIdentifier',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'PlatformTypes' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'PlatformType',
                                    'type' => 'string',
                                    'sentAs' => 'PlatformType',
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
        'SendCommandResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Command' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'CommandId' => array(
                            'type' => 'string',
                        ),
                        'DocumentName' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'ExpiresAfter' => array(
                            'type' => 'string',
                        ),
                        'Parameters' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ParameterValue',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'InstanceIds' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'InstanceId',
                                'type' => 'string',
                            ),
                        ),
                        'RequestedDateTime' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'OutputS3BucketName' => array(
                            'type' => 'string',
                        ),
                        'OutputS3KeyPrefix' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'UpdateAssociationStatusResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AssociationDescription' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'InstanceId' => array(
                            'type' => 'string',
                        ),
                        'Date' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Date' => array(
                                    'type' => 'string',
                                ),
                                'Name' => array(
                                    'type' => 'string',
                                ),
                                'Message' => array(
                                    'type' => 'string',
                                ),
                                'AdditionalInfo' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Parameters' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ParameterValue',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
