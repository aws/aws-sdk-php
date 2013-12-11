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
    'apiVersion' => '2013-11-04',
    'endpointPrefix' => 'kinesis',
    'serviceFullName' => 'Amazon Kinesis',
    'serviceAbbreviation' => 'Kinesis',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'Kinesis_20131104.',
    'signatureVersion' => 'v4',
    'namespace' => 'Kinesis',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'kinesis.us-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CreateStream' => array(
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
                    'default' => 'Kinesis_20131104.CreateStream',
                ),
                'StreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'ShardCount' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
            ),
        ),
        'DeleteStream' => array(
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
                    'default' => 'Kinesis_20131104.DeleteStream',
                ),
                'StreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'DescribeStream' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeStreamOutput',
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
                    'default' => 'Kinesis_20131104.DescribeStream',
                ),
                'StreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
                'ExclusiveStartShardId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'GetNextRecords' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetNextRecordsOutput',
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
                    'default' => 'Kinesis_20131104.GetNextRecords',
                ),
                'ShardIterator' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'class' => 'ExpiredIteratorException',
                ),
            ),
        ),
        'GetShardIterator' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetShardIteratorOutput',
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
                    'default' => 'Kinesis_20131104.GetShardIterator',
                ),
                'StreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'ShardId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'ShardIteratorType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StartingSequenceNumber' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'ProvisionedThroughputExceededException',
                ),
            ),
        ),
        'ListStreams' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListStreamsOutput',
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
                    'default' => 'Kinesis_20131104.ListStreams',
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
                'ExclusiveStartStreamName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'MergeShards' => array(
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
                    'default' => 'Kinesis_20131104.MergeShards',
                ),
                'StreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'ShardToMerge' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'AdjacentShardToMerge' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'PutRecord' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PutRecordOutput',
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
                    'default' => 'Kinesis_20131104.PutRecord',
                ),
                'StreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Data' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_encode',
                    ),
                ),
                'PartitionKey' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'ExplicitHashKey' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ExclusiveMinimumSequenceNumber' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'ProvisionedThroughputExceededException',
                ),
            ),
        ),
        'SplitShard' => array(
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
                    'default' => 'Kinesis_20131104.SplitShard',
                ),
                'StreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'ShardToSplit' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'NewStartingHashKey' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DescribeStreamOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StreamDescription' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'StreamName' => array(
                            'type' => 'string',
                        ),
                        'StreamARN' => array(
                            'type' => 'string',
                        ),
                        'StreamStatus' => array(
                            'type' => 'string',
                        ),
                        'Shards' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Shard',
                                'type' => 'object',
                                'properties' => array(
                                    'ShardId' => array(
                                        'type' => 'string',
                                    ),
                                    'ParentShardId' => array(
                                        'type' => 'string',
                                    ),
                                    'AdjacentParentShardId' => array(
                                        'type' => 'string',
                                    ),
                                    'HashKeyRange' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'StartingHashKey' => array(
                                                'type' => 'string',
                                            ),
                                            'EndingHashKey' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'SequenceNumberRange' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'StartingSequenceNumber' => array(
                                                'type' => 'string',
                                            ),
                                            'EndingSequenceNumber' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'IsMoreDataAvailable' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
            ),
        ),
        'GetNextRecordsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Records' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Record',
                        'type' => 'object',
                        'properties' => array(
                            'SequenceNumber' => array(
                                'type' => 'string',
                            ),
                            'Data' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_decode',
                                ),
                            ),
                            'PartitionKey' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextShardIterator' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetShardIteratorOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ShardIterator' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListStreamsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StreamNames' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'StreamName',
                        'type' => 'string',
                    ),
                ),
                'IsMoreDataAvailable' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'PutRecordOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ShardId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SequenceNumber' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
);
