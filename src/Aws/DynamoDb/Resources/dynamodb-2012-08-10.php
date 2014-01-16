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
    'apiVersion' => '2012-08-10',
    'endpointPrefix' => 'dynamodb',
    'serviceFullName' => 'Amazon DynamoDB',
    'serviceAbbreviation' => 'DynamoDB',
    'serviceType' => 'json',
    'jsonVersion' => '1.0',
    'targetPrefix' => 'DynamoDB_20120810.',
    'signatureVersion' => 'v4',
    'namespace' => 'DynamoDb',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.cn-north-1.amazonaws.com.cn',
        ),
        'us-gov-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'dynamodb.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'BatchGetItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'BatchGetItemOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.BatchGetItem',
                ),
                'RequestItems' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'TableName',
                            'key_pattern' => '/[a-zA-Z0-9_.-]+/',
                        ),
                        'properties' => array(
                            'Keys' => array(
                                'required' => true,
                                'type' => 'array',
                                'minItems' => 1,
                                'maxItems' => 100,
                                'items' => array(
                                    'name' => 'Key',
                                    'type' => 'object',
                                    'additionalProperties' => array(
                                        'type' => 'object',
                                        'data' => array(
                                            'shape_name' => 'AttributeName',
                                        ),
                                        'properties' => array(
                                            'S' => array(
                                                'type' => 'string',
                                            ),
                                            'N' => array(
                                                'type' => 'string',
                                            ),
                                            'B' => array(
                                                'type' => 'string',
                                                'filters' => array(
                                                    'base64_encode',
                                                ),
                                            ),
                                            'SS' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'StringAttributeValue',
                                                    'type' => 'string',
                                                ),
                                            ),
                                            'NS' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NumberAttributeValue',
                                                    'type' => 'string',
                                                ),
                                            ),
                                            'BS' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'BinaryAttributeValue',
                                                    'type' => 'string',
                                                    'filters' => array(
                                                        'base64_encode',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'AttributesToGet' => array(
                                'type' => 'array',
                                'minItems' => 1,
                                'items' => array(
                                    'name' => 'AttributeName',
                                    'type' => 'string',
                                ),
                            ),
                            'ConsistentRead' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
                'ReturnConsumedCapacity' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request rate is too high, or the request is too large, for the available throughput to accommodate. The AWS SDKs automatically retry requests that receive this exception; therefore, your request will eventually succeed, unless the request is too large or your retry queue is too large to finish. Reduce the frequency of requests by using the strategies listed in Error Retries and Exponential Backoff in the Amazon DynamoDB Developer Guide.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'BatchWriteItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'BatchWriteItemOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.BatchWriteItem',
                ),
                'RequestItems' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'array',
                        'minItems' => 1,
                        'maxItems' => 25,
                        'data' => array(
                            'shape_name' => 'TableName',
                            'key_pattern' => '/[a-zA-Z0-9_.-]+/',
                        ),
                        'items' => array(
                            'name' => 'WriteRequest',
                            'type' => 'object',
                            'properties' => array(
                                'PutRequest' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Item' => array(
                                            'required' => true,
                                            'type' => 'object',
                                            'additionalProperties' => array(
                                                'type' => 'object',
                                                'data' => array(
                                                    'shape_name' => 'AttributeName',
                                                ),
                                                'properties' => array(
                                                    'S' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'N' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'B' => array(
                                                        'type' => 'string',
                                                        'filters' => array(
                                                            'base64_encode',
                                                        ),
                                                    ),
                                                    'SS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'StringAttributeValue',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                    'NS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'NumberAttributeValue',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                    'BS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'BinaryAttributeValue',
                                                            'type' => 'string',
                                                            'filters' => array(
                                                                'base64_encode',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'DeleteRequest' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Key' => array(
                                            'required' => true,
                                            'type' => 'object',
                                            'additionalProperties' => array(
                                                'type' => 'object',
                                                'data' => array(
                                                    'shape_name' => 'AttributeName',
                                                ),
                                                'properties' => array(
                                                    'S' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'N' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'B' => array(
                                                        'type' => 'string',
                                                        'filters' => array(
                                                            'base64_encode',
                                                        ),
                                                    ),
                                                    'SS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'StringAttributeValue',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                    'NS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'NumberAttributeValue',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                    'BS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'BinaryAttributeValue',
                                                            'type' => 'string',
                                                            'filters' => array(
                                                                'base64_encode',
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
                'ReturnConsumedCapacity' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ReturnItemCollectionMetrics' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request rate is too high, or the request is too large, for the available throughput to accommodate. The AWS SDKs automatically retry requests that receive this exception; therefore, your request will eventually succeed, unless the request is too large or your retry queue is too large to finish. Reduce the frequency of requests by using the strategies listed in Error Retries and Exponential Backoff in the Amazon DynamoDB Developer Guide.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An item collection is too large. This exception is only returned for tables that have one or more local secondary indexes.',
                    'class' => 'ItemCollectionSizeLimitExceededException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'CreateTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateTableOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.CreateTable',
                ),
                'AttributeDefinitions' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AttributeDefinition',
                        'type' => 'object',
                        'properties' => array(
                            'AttributeName' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'AttributeType' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'TableName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
                'KeySchema' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 2,
                    'items' => array(
                        'name' => 'KeySchemaElement',
                        'type' => 'object',
                        'properties' => array(
                            'AttributeName' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'KeyType' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'LocalSecondaryIndexes' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'LocalSecondaryIndex',
                        'type' => 'object',
                        'properties' => array(
                            'IndexName' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 3,
                                'maxLength' => 255,
                            ),
                            'KeySchema' => array(
                                'required' => true,
                                'type' => 'array',
                                'minItems' => 1,
                                'maxItems' => 2,
                                'items' => array(
                                    'name' => 'KeySchemaElement',
                                    'type' => 'object',
                                    'properties' => array(
                                        'AttributeName' => array(
                                            'required' => true,
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 255,
                                        ),
                                        'KeyType' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'Projection' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'ProjectionType' => array(
                                        'type' => 'string',
                                    ),
                                    'NonKeyAttributes' => array(
                                        'type' => 'array',
                                        'minItems' => 1,
                                        'maxItems' => 20,
                                        'items' => array(
                                            'name' => 'NonKeyAttributeName',
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 255,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'GlobalSecondaryIndexes' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'GlobalSecondaryIndex',
                        'type' => 'object',
                        'properties' => array(
                            'IndexName' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 3,
                                'maxLength' => 255,
                            ),
                            'KeySchema' => array(
                                'required' => true,
                                'type' => 'array',
                                'minItems' => 1,
                                'maxItems' => 2,
                                'items' => array(
                                    'name' => 'KeySchemaElement',
                                    'type' => 'object',
                                    'properties' => array(
                                        'AttributeName' => array(
                                            'required' => true,
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 255,
                                        ),
                                        'KeyType' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'Projection' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'ProjectionType' => array(
                                        'type' => 'string',
                                    ),
                                    'NonKeyAttributes' => array(
                                        'type' => 'array',
                                        'minItems' => 1,
                                        'maxItems' => 20,
                                        'items' => array(
                                            'name' => 'NonKeyAttributeName',
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 255,
                                        ),
                                    ),
                                ),
                            ),
                            'ProvisionedThroughput' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'ReadCapacityUnits' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                        'minimum' => 1,
                                    ),
                                    'WriteCapacityUnits' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                        'minimum' => 1,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ProvisionedThroughput' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ReadCapacityUnits' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'minimum' => 1,
                        ),
                        'WriteCapacityUnits' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'minimum' => 1,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The operation conflicts with the resource\'s availability. For example, you attempted to recreate an existing table, or tried to delete a table currently in the CREATING state.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'The number of concurrent table requests (cumulative number of tables in the CREATING, DELETING or UPDATING state) exceeds the maximum allowed of 10. Also, for tables with secondary indexes, only one of those tables can be in the CREATING state at any point in time. Do not attempt to create more than one such table simultaneously. The total limit of tables in the ACTIVE state is 250.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteItemOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.DeleteItem',
                ),
                'TableName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_encode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Expected' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'Value' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'StringAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'NumberAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BinaryAttributeValue',
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_encode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Exists' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
                'ReturnValues' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ReturnConsumedCapacity' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ReturnItemCollectionMetrics' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A condition specified in the operation could not be evaluated.',
                    'class' => 'ConditionalCheckFailedException',
                ),
                array(
                    'reason' => 'The request rate is too high, or the request is too large, for the available throughput to accommodate. The AWS SDKs automatically retry requests that receive this exception; therefore, your request will eventually succeed, unless the request is too large or your retry queue is too large to finish. Reduce the frequency of requests by using the strategies listed in Error Retries and Exponential Backoff in the Amazon DynamoDB Developer Guide.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An item collection is too large. This exception is only returned for tables that have one or more local secondary indexes.',
                    'class' => 'ItemCollectionSizeLimitExceededException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteTableOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.DeleteTable',
                ),
                'TableName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The operation conflicts with the resource\'s availability. For example, you attempted to recreate an existing table, or tried to delete a table currently in the CREATING state.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The number of concurrent table requests (cumulative number of tables in the CREATING, DELETING or UPDATING state) exceeds the maximum allowed of 10. Also, for tables with secondary indexes, only one of those tables can be in the CREATING state at any point in time. Do not attempt to create more than one such table simultaneously. The total limit of tables in the ACTIVE state is 250.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTableOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.DescribeTable',
                ),
                'TableName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'GetItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetItemOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.GetItem',
                ),
                'TableName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_encode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'AttributesToGet' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'AttributeName',
                        'type' => 'string',
                    ),
                ),
                'ConsistentRead' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'ReturnConsumedCapacity' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request rate is too high, or the request is too large, for the available throughput to accommodate. The AWS SDKs automatically retry requests that receive this exception; therefore, your request will eventually succeed, unless the request is too large or your retry queue is too large to finish. Reduce the frequency of requests by using the strategies listed in Error Retries and Exponential Backoff in the Amazon DynamoDB Developer Guide.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ListTables' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListTablesOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.ListTables',
                ),
                'ExclusiveStartTableName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'PutItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PutItemOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.PutItem',
                ),
                'TableName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
                'Item' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_encode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Expected' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'Value' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'StringAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'NumberAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BinaryAttributeValue',
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_encode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Exists' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
                'ReturnValues' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ReturnConsumedCapacity' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ReturnItemCollectionMetrics' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A condition specified in the operation could not be evaluated.',
                    'class' => 'ConditionalCheckFailedException',
                ),
                array(
                    'reason' => 'The request rate is too high, or the request is too large, for the available throughput to accommodate. The AWS SDKs automatically retry requests that receive this exception; therefore, your request will eventually succeed, unless the request is too large or your retry queue is too large to finish. Reduce the frequency of requests by using the strategies listed in Error Retries and Exponential Backoff in the Amazon DynamoDB Developer Guide.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An item collection is too large. This exception is only returned for tables that have one or more local secondary indexes.',
                    'class' => 'ItemCollectionSizeLimitExceededException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'Query' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'QueryOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.Query',
                ),
                'TableName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
                'IndexName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
                'Select' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AttributesToGet' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'AttributeName',
                        'type' => 'string',
                    ),
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
                'ConsistentRead' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'KeyConditions' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'AttributeValueList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'AttributeValue',
                                    'type' => 'object',
                                    'properties' => array(
                                        'S' => array(
                                            'type' => 'string',
                                        ),
                                        'N' => array(
                                            'type' => 'string',
                                        ),
                                        'B' => array(
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_encode',
                                            ),
                                        ),
                                        'SS' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'StringAttributeValue',
                                                'type' => 'string',
                                            ),
                                        ),
                                        'NS' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'NumberAttributeValue',
                                                'type' => 'string',
                                            ),
                                        ),
                                        'BS' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'BinaryAttributeValue',
                                                'type' => 'string',
                                                'filters' => array(
                                                    'base64_encode',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'ComparisonOperator' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'ScanIndexForward' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'ExclusiveStartKey' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_encode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ReturnConsumedCapacity' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request rate is too high, or the request is too large, for the available throughput to accommodate. The AWS SDKs automatically retry requests that receive this exception; therefore, your request will eventually succeed, unless the request is too large or your retry queue is too large to finish. Reduce the frequency of requests by using the strategies listed in Error Retries and Exponential Backoff in the Amazon DynamoDB Developer Guide.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'Scan' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ScanOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.Scan',
                ),
                'TableName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
                'AttributesToGet' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'AttributeName',
                        'type' => 'string',
                    ),
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
                'Select' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ScanFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'AttributeValueList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'AttributeValue',
                                    'type' => 'object',
                                    'properties' => array(
                                        'S' => array(
                                            'type' => 'string',
                                        ),
                                        'N' => array(
                                            'type' => 'string',
                                        ),
                                        'B' => array(
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_encode',
                                            ),
                                        ),
                                        'SS' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'StringAttributeValue',
                                                'type' => 'string',
                                            ),
                                        ),
                                        'NS' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'NumberAttributeValue',
                                                'type' => 'string',
                                            ),
                                        ),
                                        'BS' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'BinaryAttributeValue',
                                                'type' => 'string',
                                                'filters' => array(
                                                    'base64_encode',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'ComparisonOperator' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'ExclusiveStartKey' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_encode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ReturnConsumedCapacity' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'TotalSegments' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 4096,
                ),
                'Segment' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 4095,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request rate is too high, or the request is too large, for the available throughput to accommodate. The AWS SDKs automatically retry requests that receive this exception; therefore, your request will eventually succeed, unless the request is too large or your retry queue is too large to finish. Reduce the frequency of requests by using the strategies listed in Error Retries and Exponential Backoff in the Amazon DynamoDB Developer Guide.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateItemOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.UpdateItem',
                ),
                'TableName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_encode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'AttributeUpdates' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'Value' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'StringAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'NumberAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BinaryAttributeValue',
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_encode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Action' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Expected' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'AttributeName',
                        ),
                        'properties' => array(
                            'Value' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'StringAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'NumberAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BinaryAttributeValue',
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_encode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Exists' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
                'ReturnValues' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ReturnConsumedCapacity' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ReturnItemCollectionMetrics' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A condition specified in the operation could not be evaluated.',
                    'class' => 'ConditionalCheckFailedException',
                ),
                array(
                    'reason' => 'The request rate is too high, or the request is too large, for the available throughput to accommodate. The AWS SDKs automatically retry requests that receive this exception; therefore, your request will eventually succeed, unless the request is too large or your retry queue is too large to finish. Reduce the frequency of requests by using the strategies listed in Error Retries and Exponential Backoff in the Amazon DynamoDB Developer Guide.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An item collection is too large. This exception is only returned for tables that have one or more local secondary indexes.',
                    'class' => 'ItemCollectionSizeLimitExceededException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateTableOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20120810.UpdateTable',
                ),
                'TableName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                    'maxLength' => 255,
                ),
                'ProvisionedThroughput' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ReadCapacityUnits' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'minimum' => 1,
                        ),
                        'WriteCapacityUnits' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'minimum' => 1,
                        ),
                    ),
                ),
                'GlobalSecondaryIndexUpdates' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'GlobalSecondaryIndexUpdate',
                        'type' => 'object',
                        'properties' => array(
                            'Update' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'IndexName' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 3,
                                        'maxLength' => 255,
                                    ),
                                    'ProvisionedThroughput' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'ReadCapacityUnits' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                                'minimum' => 1,
                                            ),
                                            'WriteCapacityUnits' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                                'minimum' => 1,
                                            ),
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
                    'reason' => 'The operation conflicts with the resource\'s availability. For example, you attempted to recreate an existing table, or tried to delete a table currently in the CREATING state.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'The operation tried to access a nonexistent table or index. The resource may not be specified correctly, or its status may not be ACTIVE.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The number of concurrent table requests (cumulative number of tables in the CREATING, DELETING or UPDATING state) exceeds the maximum allowed of 10. Also, for tables with secondary indexes, only one of those tables can be in the CREATING state at any point in time. Do not attempt to create more than one such table simultaneously. The total limit of tables in the ACTIVE state is 250.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'An error occurred on the server side.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
    ),
    'models' => array(
        'BatchGetItemOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Responses' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'array',
                        'items' => array(
                            'name' => 'AttributeMap',
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_decode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'StringAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'NumberAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BinaryAttributeValue',
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_decode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'UnprocessedKeys' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'properties' => array(
                            'Keys' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Key',
                                    'type' => 'object',
                                    'additionalProperties' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'S' => array(
                                                'type' => 'string',
                                            ),
                                            'N' => array(
                                                'type' => 'string',
                                            ),
                                            'B' => array(
                                                'type' => 'string',
                                                'filters' => array(
                                                    'base64_decode',
                                                ),
                                            ),
                                            'SS' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'StringAttributeValue',
                                                    'type' => 'string',
                                                ),
                                            ),
                                            'NS' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NumberAttributeValue',
                                                    'type' => 'string',
                                                ),
                                            ),
                                            'BS' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'BinaryAttributeValue',
                                                    'type' => 'string',
                                                    'filters' => array(
                                                        'base64_decode',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'AttributesToGet' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'AttributeName',
                                    'type' => 'string',
                                ),
                            ),
                            'ConsistentRead' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
                'ConsumedCapacity' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ConsumedCapacity',
                        'type' => 'object',
                        'properties' => array(
                            'TableName' => array(
                                'type' => 'string',
                            ),
                            'CapacityUnits' => array(
                                'type' => 'numeric',
                            ),
                            'Table' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'LocalSecondaryIndexes' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'CapacityUnits' => array(
                                            'type' => 'numeric',
                                        ),
                                    ),
                                ),
                            ),
                            'GlobalSecondaryIndexes' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'CapacityUnits' => array(
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
        'BatchWriteItemOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'UnprocessedItems' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'array',
                        'items' => array(
                            'name' => 'WriteRequest',
                            'type' => 'object',
                            'properties' => array(
                                'PutRequest' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Item' => array(
                                            'type' => 'object',
                                            'additionalProperties' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'S' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'N' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'B' => array(
                                                        'type' => 'string',
                                                        'filters' => array(
                                                            'base64_decode',
                                                        ),
                                                    ),
                                                    'SS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'StringAttributeValue',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                    'NS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'NumberAttributeValue',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                    'BS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'BinaryAttributeValue',
                                                            'type' => 'string',
                                                            'filters' => array(
                                                                'base64_decode',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'DeleteRequest' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Key' => array(
                                            'type' => 'object',
                                            'additionalProperties' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'S' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'N' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'B' => array(
                                                        'type' => 'string',
                                                        'filters' => array(
                                                            'base64_decode',
                                                        ),
                                                    ),
                                                    'SS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'StringAttributeValue',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                    'NS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'NumberAttributeValue',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                    'BS' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'BinaryAttributeValue',
                                                            'type' => 'string',
                                                            'filters' => array(
                                                                'base64_decode',
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
                'ItemCollectionMetrics' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'array',
                        'items' => array(
                            'name' => 'ItemCollectionMetrics',
                            'type' => 'object',
                            'properties' => array(
                                'ItemCollectionKey' => array(
                                    'type' => 'object',
                                    'additionalProperties' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'S' => array(
                                                'type' => 'string',
                                            ),
                                            'N' => array(
                                                'type' => 'string',
                                            ),
                                            'B' => array(
                                                'type' => 'string',
                                                'filters' => array(
                                                    'base64_decode',
                                                ),
                                            ),
                                            'SS' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'StringAttributeValue',
                                                    'type' => 'string',
                                                ),
                                            ),
                                            'NS' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NumberAttributeValue',
                                                    'type' => 'string',
                                                ),
                                            ),
                                            'BS' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'BinaryAttributeValue',
                                                    'type' => 'string',
                                                    'filters' => array(
                                                        'base64_decode',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'SizeEstimateRangeGB' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'ItemCollectionSizeEstimateBound',
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ConsumedCapacity' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ConsumedCapacity',
                        'type' => 'object',
                        'properties' => array(
                            'TableName' => array(
                                'type' => 'string',
                            ),
                            'CapacityUnits' => array(
                                'type' => 'numeric',
                            ),
                            'Table' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'LocalSecondaryIndexes' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'CapacityUnits' => array(
                                            'type' => 'numeric',
                                        ),
                                    ),
                                ),
                            ),
                            'GlobalSecondaryIndexes' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'CapacityUnits' => array(
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
        'CreateTableOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TableDescription' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'AttributeDefinitions' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AttributeDefinition',
                                'type' => 'object',
                                'properties' => array(
                                    'AttributeName' => array(
                                        'type' => 'string',
                                    ),
                                    'AttributeType' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'TableName' => array(
                            'type' => 'string',
                        ),
                        'KeySchema' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'KeySchemaElement',
                                'type' => 'object',
                                'properties' => array(
                                    'AttributeName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyType' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'TableStatus' => array(
                            'type' => 'string',
                        ),
                        'CreationDateTime' => array(
                            'type' => 'string',
                        ),
                        'ProvisionedThroughput' => array(
                            'type' => 'object',
                            'properties' => array(
                                'LastIncreaseDateTime' => array(
                                    'type' => 'string',
                                ),
                                'LastDecreaseDateTime' => array(
                                    'type' => 'string',
                                ),
                                'NumberOfDecreasesToday' => array(
                                    'type' => 'numeric',
                                ),
                                'ReadCapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                                'WriteCapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'TableSizeBytes' => array(
                            'type' => 'numeric',
                        ),
                        'ItemCount' => array(
                            'type' => 'numeric',
                        ),
                        'LocalSecondaryIndexes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'LocalSecondaryIndexDescription',
                                'type' => 'object',
                                'properties' => array(
                                    'IndexName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeySchema' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeySchemaElement',
                                            'type' => 'object',
                                            'properties' => array(
                                                'AttributeName' => array(
                                                    'type' => 'string',
                                                ),
                                                'KeyType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Projection' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'ProjectionType' => array(
                                                'type' => 'string',
                                            ),
                                            'NonKeyAttributes' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NonKeyAttributeName',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IndexSizeBytes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ItemCount' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'GlobalSecondaryIndexes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'GlobalSecondaryIndexDescription',
                                'type' => 'object',
                                'properties' => array(
                                    'IndexName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeySchema' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeySchemaElement',
                                            'type' => 'object',
                                            'properties' => array(
                                                'AttributeName' => array(
                                                    'type' => 'string',
                                                ),
                                                'KeyType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Projection' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'ProjectionType' => array(
                                                'type' => 'string',
                                            ),
                                            'NonKeyAttributes' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NonKeyAttributeName',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IndexStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'ProvisionedThroughput' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'LastIncreaseDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'LastDecreaseDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'NumberOfDecreasesToday' => array(
                                                'type' => 'numeric',
                                            ),
                                            'ReadCapacityUnits' => array(
                                                'type' => 'numeric',
                                            ),
                                            'WriteCapacityUnits' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                    'IndexSizeBytes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ItemCount' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteItemOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_decode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_decode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ConsumedCapacity' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'TableName' => array(
                            'type' => 'string',
                        ),
                        'CapacityUnits' => array(
                            'type' => 'numeric',
                        ),
                        'Table' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'LocalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'GlobalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ItemCollectionMetrics' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ItemCollectionKey' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_decode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'StringAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'NumberAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BinaryAttributeValue',
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_decode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'SizeEstimateRangeGB' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ItemCollectionSizeEstimateBound',
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteTableOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TableDescription' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'AttributeDefinitions' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AttributeDefinition',
                                'type' => 'object',
                                'properties' => array(
                                    'AttributeName' => array(
                                        'type' => 'string',
                                    ),
                                    'AttributeType' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'TableName' => array(
                            'type' => 'string',
                        ),
                        'KeySchema' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'KeySchemaElement',
                                'type' => 'object',
                                'properties' => array(
                                    'AttributeName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyType' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'TableStatus' => array(
                            'type' => 'string',
                        ),
                        'CreationDateTime' => array(
                            'type' => 'string',
                        ),
                        'ProvisionedThroughput' => array(
                            'type' => 'object',
                            'properties' => array(
                                'LastIncreaseDateTime' => array(
                                    'type' => 'string',
                                ),
                                'LastDecreaseDateTime' => array(
                                    'type' => 'string',
                                ),
                                'NumberOfDecreasesToday' => array(
                                    'type' => 'numeric',
                                ),
                                'ReadCapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                                'WriteCapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'TableSizeBytes' => array(
                            'type' => 'numeric',
                        ),
                        'ItemCount' => array(
                            'type' => 'numeric',
                        ),
                        'LocalSecondaryIndexes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'LocalSecondaryIndexDescription',
                                'type' => 'object',
                                'properties' => array(
                                    'IndexName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeySchema' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeySchemaElement',
                                            'type' => 'object',
                                            'properties' => array(
                                                'AttributeName' => array(
                                                    'type' => 'string',
                                                ),
                                                'KeyType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Projection' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'ProjectionType' => array(
                                                'type' => 'string',
                                            ),
                                            'NonKeyAttributes' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NonKeyAttributeName',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IndexSizeBytes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ItemCount' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'GlobalSecondaryIndexes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'GlobalSecondaryIndexDescription',
                                'type' => 'object',
                                'properties' => array(
                                    'IndexName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeySchema' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeySchemaElement',
                                            'type' => 'object',
                                            'properties' => array(
                                                'AttributeName' => array(
                                                    'type' => 'string',
                                                ),
                                                'KeyType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Projection' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'ProjectionType' => array(
                                                'type' => 'string',
                                            ),
                                            'NonKeyAttributes' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NonKeyAttributeName',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IndexStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'ProvisionedThroughput' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'LastIncreaseDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'LastDecreaseDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'NumberOfDecreasesToday' => array(
                                                'type' => 'numeric',
                                            ),
                                            'ReadCapacityUnits' => array(
                                                'type' => 'numeric',
                                            ),
                                            'WriteCapacityUnits' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                    'IndexSizeBytes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ItemCount' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTableOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Table' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'AttributeDefinitions' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AttributeDefinition',
                                'type' => 'object',
                                'properties' => array(
                                    'AttributeName' => array(
                                        'type' => 'string',
                                    ),
                                    'AttributeType' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'TableName' => array(
                            'type' => 'string',
                        ),
                        'KeySchema' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'KeySchemaElement',
                                'type' => 'object',
                                'properties' => array(
                                    'AttributeName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyType' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'TableStatus' => array(
                            'type' => 'string',
                        ),
                        'CreationDateTime' => array(
                            'type' => 'string',
                        ),
                        'ProvisionedThroughput' => array(
                            'type' => 'object',
                            'properties' => array(
                                'LastIncreaseDateTime' => array(
                                    'type' => 'string',
                                ),
                                'LastDecreaseDateTime' => array(
                                    'type' => 'string',
                                ),
                                'NumberOfDecreasesToday' => array(
                                    'type' => 'numeric',
                                ),
                                'ReadCapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                                'WriteCapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'TableSizeBytes' => array(
                            'type' => 'numeric',
                        ),
                        'ItemCount' => array(
                            'type' => 'numeric',
                        ),
                        'LocalSecondaryIndexes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'LocalSecondaryIndexDescription',
                                'type' => 'object',
                                'properties' => array(
                                    'IndexName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeySchema' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeySchemaElement',
                                            'type' => 'object',
                                            'properties' => array(
                                                'AttributeName' => array(
                                                    'type' => 'string',
                                                ),
                                                'KeyType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Projection' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'ProjectionType' => array(
                                                'type' => 'string',
                                            ),
                                            'NonKeyAttributes' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NonKeyAttributeName',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IndexSizeBytes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ItemCount' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'GlobalSecondaryIndexes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'GlobalSecondaryIndexDescription',
                                'type' => 'object',
                                'properties' => array(
                                    'IndexName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeySchema' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeySchemaElement',
                                            'type' => 'object',
                                            'properties' => array(
                                                'AttributeName' => array(
                                                    'type' => 'string',
                                                ),
                                                'KeyType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Projection' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'ProjectionType' => array(
                                                'type' => 'string',
                                            ),
                                            'NonKeyAttributes' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NonKeyAttributeName',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IndexStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'ProvisionedThroughput' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'LastIncreaseDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'LastDecreaseDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'NumberOfDecreasesToday' => array(
                                                'type' => 'numeric',
                                            ),
                                            'ReadCapacityUnits' => array(
                                                'type' => 'numeric',
                                            ),
                                            'WriteCapacityUnits' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                    'IndexSizeBytes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ItemCount' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetItemOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Item' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_decode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_decode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ConsumedCapacity' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'TableName' => array(
                            'type' => 'string',
                        ),
                        'CapacityUnits' => array(
                            'type' => 'numeric',
                        ),
                        'Table' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'LocalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'GlobalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListTablesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TableNames' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'TableName',
                        'type' => 'string',
                    ),
                ),
                'LastEvaluatedTableName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'PutItemOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_decode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_decode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ConsumedCapacity' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'TableName' => array(
                            'type' => 'string',
                        ),
                        'CapacityUnits' => array(
                            'type' => 'numeric',
                        ),
                        'Table' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'LocalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'GlobalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ItemCollectionMetrics' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ItemCollectionKey' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_decode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'StringAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'NumberAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BinaryAttributeValue',
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_decode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'SizeEstimateRangeGB' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ItemCollectionSizeEstimateBound',
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'QueryOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Items' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AttributeMap',
                        'type' => 'object',
                        'additionalProperties' => array(
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_decode',
                                    ),
                                ),
                                'SS' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'StringAttributeValue',
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'NumberAttributeValue',
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'BinaryAttributeValue',
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_decode',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Count' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'LastEvaluatedKey' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_decode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_decode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ConsumedCapacity' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'TableName' => array(
                            'type' => 'string',
                        ),
                        'CapacityUnits' => array(
                            'type' => 'numeric',
                        ),
                        'Table' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'LocalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'GlobalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ScanOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Items' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AttributeMap',
                        'type' => 'object',
                        'additionalProperties' => array(
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_decode',
                                    ),
                                ),
                                'SS' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'StringAttributeValue',
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'NumberAttributeValue',
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'BinaryAttributeValue',
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_decode',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Count' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'ScannedCount' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'LastEvaluatedKey' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_decode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_decode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ConsumedCapacity' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'TableName' => array(
                            'type' => 'string',
                        ),
                        'CapacityUnits' => array(
                            'type' => 'numeric',
                        ),
                        'Table' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'LocalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'GlobalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UpdateItemOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'properties' => array(
                            'S' => array(
                                'type' => 'string',
                            ),
                            'N' => array(
                                'type' => 'string',
                            ),
                            'B' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_decode',
                                ),
                            ),
                            'SS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StringAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'NumberAttributeValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BinaryAttributeValue',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_decode',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ConsumedCapacity' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'TableName' => array(
                            'type' => 'string',
                        ),
                        'CapacityUnits' => array(
                            'type' => 'numeric',
                        ),
                        'Table' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'LocalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'GlobalSecondaryIndexes' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CapacityUnits' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ItemCollectionMetrics' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ItemCollectionKey' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_decode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'StringAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'NumberAttributeValue',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BinaryAttributeValue',
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_decode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'SizeEstimateRangeGB' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ItemCollectionSizeEstimateBound',
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UpdateTableOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TableDescription' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'AttributeDefinitions' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AttributeDefinition',
                                'type' => 'object',
                                'properties' => array(
                                    'AttributeName' => array(
                                        'type' => 'string',
                                    ),
                                    'AttributeType' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'TableName' => array(
                            'type' => 'string',
                        ),
                        'KeySchema' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'KeySchemaElement',
                                'type' => 'object',
                                'properties' => array(
                                    'AttributeName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyType' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'TableStatus' => array(
                            'type' => 'string',
                        ),
                        'CreationDateTime' => array(
                            'type' => 'string',
                        ),
                        'ProvisionedThroughput' => array(
                            'type' => 'object',
                            'properties' => array(
                                'LastIncreaseDateTime' => array(
                                    'type' => 'string',
                                ),
                                'LastDecreaseDateTime' => array(
                                    'type' => 'string',
                                ),
                                'NumberOfDecreasesToday' => array(
                                    'type' => 'numeric',
                                ),
                                'ReadCapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                                'WriteCapacityUnits' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'TableSizeBytes' => array(
                            'type' => 'numeric',
                        ),
                        'ItemCount' => array(
                            'type' => 'numeric',
                        ),
                        'LocalSecondaryIndexes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'LocalSecondaryIndexDescription',
                                'type' => 'object',
                                'properties' => array(
                                    'IndexName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeySchema' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeySchemaElement',
                                            'type' => 'object',
                                            'properties' => array(
                                                'AttributeName' => array(
                                                    'type' => 'string',
                                                ),
                                                'KeyType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Projection' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'ProjectionType' => array(
                                                'type' => 'string',
                                            ),
                                            'NonKeyAttributes' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NonKeyAttributeName',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IndexSizeBytes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ItemCount' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'GlobalSecondaryIndexes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'GlobalSecondaryIndexDescription',
                                'type' => 'object',
                                'properties' => array(
                                    'IndexName' => array(
                                        'type' => 'string',
                                    ),
                                    'KeySchema' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeySchemaElement',
                                            'type' => 'object',
                                            'properties' => array(
                                                'AttributeName' => array(
                                                    'type' => 'string',
                                                ),
                                                'KeyType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Projection' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'ProjectionType' => array(
                                                'type' => 'string',
                                            ),
                                            'NonKeyAttributes' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'NonKeyAttributeName',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'IndexStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'ProvisionedThroughput' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'LastIncreaseDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'LastDecreaseDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'NumberOfDecreasesToday' => array(
                                                'type' => 'numeric',
                                            ),
                                            'ReadCapacityUnits' => array(
                                                'type' => 'numeric',
                                            ),
                                            'WriteCapacityUnits' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                    'IndexSizeBytes' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ItemCount' => array(
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
    'iterators' => array(
        'BatchGetItem' => array(
            'input_token' => 'RequestItems',
            'output_token' => 'UnprocessedKeys',
            'result_key' => 'Responses/*',
        ),
        'ListTables' => array(
            'input_token' => 'ExclusiveStartTableName',
            'output_token' => 'LastEvaluatedTableName',
            'limit_key' => 'Limit',
            'result_key' => 'TableNames',
        ),
        'Query' => array(
            'input_token' => 'ExclusiveStartKey',
            'output_token' => 'LastEvaluatedKey',
            'limit_key' => 'Limit',
            'result_key' => 'Items',
        ),
        'Scan' => array(
            'input_token' => 'ExclusiveStartKey',
            'output_token' => 'LastEvaluatedKey',
            'limit_key' => 'Limit',
            'result_key' => 'Items',
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'interval' => 20,
            'max_attempts' => 25,
        ),
        '__TableState' => array(
            'operation' => 'DescribeTable',
        ),
        'TableExists' => array(
            'extends' => '__TableState',
            'success.type' => 'output',
            'success.path' => 'Table/TableStatus',
            'success.value' => 'ACTIVE',
            'ignore_errors' => array(
                'ResourceNotFoundException',
            ),
        ),
        'TableNotExists' => array(
            'extends' => '__TableState',
            'success.type' => 'error',
            'success.value' => 'ResourceNotFoundException',
        ),
    ),
);
