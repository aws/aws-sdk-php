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
                    'minLength' => 3,
                    'maxLength' => 64,
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 10,
                    'maxLength' => 10,
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
                    'reason' => 'The configuration document is not valid.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'You must specify the ID of a running instance.',
                    'class' => 'InvalidInstanceIdException',
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
                                'minLength' => 3,
                                'maxLength' => 64,
                            ),
                            'InstanceId' => array(
                                'type' => 'string',
                                'minLength' => 10,
                                'maxLength' => 10,
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
                    'reason' => 'The configuration document is not valid.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'You must specify the ID of a running instance.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'You cannot specify an instance ID in more than one association.',
                    'class' => 'DuplicateInstanceIdException',
                ),
                array(
                    'reason' => 'You can have at most 2,000 active associations.',
                    'class' => 'AssociationLimitExceededException',
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
                    'minLength' => 3,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified configuration document already exists.',
                    'class' => 'DocumentAlreadyExistsException',
                ),
                array(
                    'reason' => 'The size limit of a configuration document is 64 KB.',
                    'class' => 'MaxDocumentSizeExceededException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The content for the configuration document is not valid.',
                    'class' => 'InvalidDocumentContentException',
                ),
                array(
                    'reason' => 'You can have at most 100 active configuration documents.',
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
                    'minLength' => 3,
                    'maxLength' => 64,
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 10,
                    'maxLength' => 10,
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
                    'reason' => 'The configuration document is not valid.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'You must specify the ID of a running instance.',
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
                    'minLength' => 3,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The configuration document is not valid.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'You must disassociate a configuration document from all instances before you can delete it.',
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
                    'minLength' => 3,
                    'maxLength' => 64,
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 10,
                    'maxLength' => 10,
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
                    'reason' => 'The configuration document is not valid.',
                    'class' => 'InvalidDocumentException',
                ),
                array(
                    'reason' => 'You must specify the ID of a running instance.',
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
                    'minLength' => 3,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The configuration document is not valid.',
                    'class' => 'InvalidDocumentException',
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
                    'minLength' => 3,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'The configuration document is not valid.',
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
                    'minLength' => 3,
                    'maxLength' => 64,
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 10,
                    'maxLength' => 10,
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
                            'maxLength' => 1024,
                        ),
                        'AdditionalInfo' => array(
                            'type' => 'string',
                            'maxLength' => 1024,
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
                    'reason' => 'You must specify the ID of a running instance.',
                    'class' => 'InvalidInstanceIdException',
                ),
                array(
                    'reason' => 'The configuration document is not valid.',
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
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
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
                    ),
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
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
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
                    ),
                ),
            ),
        ),
    ),
);
