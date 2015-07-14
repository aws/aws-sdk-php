<?php

return array (
    'apiVersion' => '2012-08-10',
    'endpointPrefix' => 'streams.dynamodb',
    'serviceFullName' => 'Amazon DynamoDB Streams',
    'serviceType' => 'json',
    'jsonVersion' => '1.0',
    'targetPrefix' => 'DynamoDBStreams_20120810.',
    'signatureVersion' => 'v4',
    'signingName' => 'dynamodb',
    'namespace' => 'DynamoDbStreams',
    'operations' => array(
        'DescribeStream' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDBStreams_20120810.DescribeStream',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'GetRecords' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDBStreams_20120810.GetRecords',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'GetShardIterator' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDBStreams_20120810.GetShardIterator',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'ListStreams' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDBStreams_20120810.ListStreams',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
    ),
    'models' => array(
        'JsonOutput' => array(
            'type' => 'object',
            'additionalProperties' => array(
                'location' => 'json',
            )
        ),
    ),
    'iterators' => array(
        'DescribeStream' => array(
            'input_token' => 'ExclusiveStartShardId',
            'output_token' => 'StreamDescription.LastEvaluatedShardId',
            'limit_key' => 'Limit',
            'result_key' => 'StreamDescription.Shards',
        ),
        'ListStreams' => array(
            'input_token' => 'ExclusiveStartStreamId',
            'output_token' => 'LastEvaluatedStreamId',
            'limit_key' => 'Limit',
            'result_key' => 'StreamIds',
        ),
    ),
);
