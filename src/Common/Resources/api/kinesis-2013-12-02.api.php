<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2013-12-02',
    'endpointPrefix' => 'kinesis',
    'jsonVersion' => '1.1',
    'serviceAbbreviation' => 'Kinesis',
    'serviceFullName' => 'Amazon Kinesis',
    'signatureVersion' => 'v4',
    'targetPrefix' => 'Kinesis_20131202',
    'protocol' => 'json',
  ],
  'operations' =>
  [
    'CreateStream' =>
    [
      'name' => 'CreateStream',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateStreamInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceInUseException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidArgumentException',
          'exception' => true,
        ],
      ],
    ],
    'DeleteStream' =>
    [
      'name' => 'DeleteStream',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteStreamInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'exception' => true,
        ],
      ],
    ],
    'DescribeStream' =>
    [
      'name' => 'DescribeStream',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeStreamInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeStreamOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'LimitExceededException',
          'exception' => true,
        ],
      ],
    ],
    'GetRecords' =>
    [
      'name' => 'GetRecords',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetRecordsInput',
      ],
      'output' =>
      [
        'shape' => 'GetRecordsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidArgumentException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ExpiredIteratorException',
          'exception' => true,
        ],
      ],
    ],
    'GetShardIterator' =>
    [
      'name' => 'GetShardIterator',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetShardIteratorInput',
      ],
      'output' =>
      [
        'shape' => 'GetShardIteratorOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidArgumentException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
      ],
    ],
    'ListStreams' =>
    [
      'name' => 'ListStreams',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListStreamsInput',
      ],
      'output' =>
      [
        'shape' => 'ListStreamsOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'LimitExceededException',
          'exception' => true,
        ],
      ],
    ],
    'MergeShards' =>
    [
      'name' => 'MergeShards',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'MergeShardsInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceInUseException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidArgumentException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'LimitExceededException',
          'exception' => true,
        ],
      ],
    ],
    'PutRecord' =>
    [
      'name' => 'PutRecord',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutRecordInput',
      ],
      'output' =>
      [
        'shape' => 'PutRecordOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidArgumentException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
      ],
    ],
    'SplitShard' =>
    [
      'name' => 'SplitShard',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'SplitShardInput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceInUseException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidArgumentException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'LimitExceededException',
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'BooleanObject' =>
    [
      'type' => 'boolean',
    ],
    'CreateStreamInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamName',
        1 => 'ShardCount',
      ],
      'members' =>
      [
        'StreamName' =>
        [
          'shape' => 'StreamName',
        ],
        'ShardCount' =>
        [
          'shape' => 'PositiveIntegerObject',
        ],
      ],
    ],
    'Data' =>
    [
      'type' => 'blob',
      'min' => 0,
      'max' => 51200,
    ],
    'DeleteStreamInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamName',
      ],
      'members' =>
      [
        'StreamName' =>
        [
          'shape' => 'StreamName',
        ],
      ],
    ],
    'DescribeStreamInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamName',
      ],
      'members' =>
      [
        'StreamName' =>
        [
          'shape' => 'StreamName',
        ],
        'Limit' =>
        [
          'shape' => 'DescribeStreamInputLimit',
        ],
        'ExclusiveStartShardId' =>
        [
          'shape' => 'ShardId',
        ],
      ],
    ],
    'DescribeStreamInputLimit' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 10000,
    ],
    'DescribeStreamOutput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamDescription',
      ],
      'members' =>
      [
        'StreamDescription' =>
        [
          'shape' => 'StreamDescription',
        ],
      ],
    ],
    'ErrorMessage' =>
    [
      'type' => 'string',
    ],
    'ExpiredIteratorException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'GetRecordsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ShardIterator',
      ],
      'members' =>
      [
        'ShardIterator' =>
        [
          'shape' => 'ShardIterator',
        ],
        'Limit' =>
        [
          'shape' => 'GetRecordsInputLimit',
        ],
      ],
    ],
    'GetRecordsInputLimit' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 10000,
    ],
    'GetRecordsOutput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Records',
      ],
      'members' =>
      [
        'Records' =>
        [
          'shape' => 'RecordList',
        ],
        'NextShardIterator' =>
        [
          'shape' => 'ShardIterator',
        ],
      ],
    ],
    'GetShardIteratorInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamName',
        1 => 'ShardId',
        2 => 'ShardIteratorType',
      ],
      'members' =>
      [
        'StreamName' =>
        [
          'shape' => 'StreamName',
        ],
        'ShardId' =>
        [
          'shape' => 'ShardId',
        ],
        'ShardIteratorType' =>
        [
          'shape' => 'ShardIteratorType',
        ],
        'StartingSequenceNumber' =>
        [
          'shape' => 'SequenceNumber',
        ],
      ],
    ],
    'GetShardIteratorOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ShardIterator' =>
        [
          'shape' => 'ShardIterator',
        ],
      ],
    ],
    'HashKey' =>
    [
      'type' => 'string',
      'pattern' => '0|([1-9]\\d{0,38}]',
    ],
    'HashKeyRange' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StartingHashKey',
        1 => 'EndingHashKey',
      ],
      'members' =>
      [
        'StartingHashKey' =>
        [
          'shape' => 'HashKey',
        ],
        'EndingHashKey' =>
        [
          'shape' => 'HashKey',
        ],
      ],
    ],
    'InvalidArgumentException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'LimitExceededException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'ListStreamsInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Limit' =>
        [
          'shape' => 'ListStreamsInputLimit',
        ],
        'ExclusiveStartStreamName' =>
        [
          'shape' => 'StreamName',
        ],
      ],
    ],
    'ListStreamsInputLimit' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 10000,
    ],
    'ListStreamsOutput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamNames',
        1 => 'HasMoreStreams',
      ],
      'members' =>
      [
        'StreamNames' =>
        [
          'shape' => 'StreamNameList',
        ],
        'HasMoreStreams' =>
        [
          'shape' => 'BooleanObject',
        ],
      ],
    ],
    'MergeShardsInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamName',
        1 => 'ShardToMerge',
        2 => 'AdjacentShardToMerge',
      ],
      'members' =>
      [
        'StreamName' =>
        [
          'shape' => 'StreamName',
        ],
        'ShardToMerge' =>
        [
          'shape' => 'ShardId',
        ],
        'AdjacentShardToMerge' =>
        [
          'shape' => 'ShardId',
        ],
      ],
    ],
    'PartitionKey' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 256,
    ],
    'PositiveIntegerObject' =>
    [
      'type' => 'integer',
      'min' => 1,
    ],
    'ProvisionedThroughputExceededException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'PutRecordInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamName',
        1 => 'Data',
        2 => 'PartitionKey',
      ],
      'members' =>
      [
        'StreamName' =>
        [
          'shape' => 'StreamName',
        ],
        'Data' =>
        [
          'shape' => 'Data',
        ],
        'PartitionKey' =>
        [
          'shape' => 'PartitionKey',
        ],
        'ExplicitHashKey' =>
        [
          'shape' => 'HashKey',
        ],
        'SequenceNumberForOrdering' =>
        [
          'shape' => 'SequenceNumber',
        ],
      ],
    ],
    'PutRecordOutput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ShardId',
        1 => 'SequenceNumber',
      ],
      'members' =>
      [
        'ShardId' =>
        [
          'shape' => 'ShardId',
        ],
        'SequenceNumber' =>
        [
          'shape' => 'SequenceNumber',
        ],
      ],
    ],
    'Record' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'SequenceNumber',
        1 => 'Data',
        2 => 'PartitionKey',
      ],
      'members' =>
      [
        'SequenceNumber' =>
        [
          'shape' => 'SequenceNumber',
        ],
        'Data' =>
        [
          'shape' => 'Data',
        ],
        'PartitionKey' =>
        [
          'shape' => 'PartitionKey',
        ],
      ],
    ],
    'RecordList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Record',
      ],
    ],
    'ResourceInUseException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'ResourceNotFoundException' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'SequenceNumber' =>
    [
      'type' => 'string',
      'pattern' => '0|([1-9]\\d{0,128}]',
    ],
    'SequenceNumberRange' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StartingSequenceNumber',
      ],
      'members' =>
      [
        'StartingSequenceNumber' =>
        [
          'shape' => 'SequenceNumber',
        ],
        'EndingSequenceNumber' =>
        [
          'shape' => 'SequenceNumber',
        ],
      ],
    ],
    'Shard' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ShardId',
        1 => 'HashKeyRange',
        2 => 'SequenceNumberRange',
      ],
      'members' =>
      [
        'ShardId' =>
        [
          'shape' => 'ShardId',
        ],
        'ParentShardId' =>
        [
          'shape' => 'ShardId',
        ],
        'AdjacentParentShardId' =>
        [
          'shape' => 'ShardId',
        ],
        'HashKeyRange' =>
        [
          'shape' => 'HashKeyRange',
        ],
        'SequenceNumberRange' =>
        [
          'shape' => 'SequenceNumberRange',
        ],
      ],
    ],
    'ShardId' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
      'pattern' => '[a-zA-Z0-9_.-]+',
    ],
    'ShardIterator' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 512,
    ],
    'ShardIteratorType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'AT_SEQUENCE_NUMBER',
        1 => 'AFTER_SEQUENCE_NUMBER',
        2 => 'TRIM_HORIZON',
        3 => 'LATEST',
      ],
    ],
    'ShardList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Shard',
      ],
    ],
    'SplitShardInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamName',
        1 => 'ShardToSplit',
        2 => 'NewStartingHashKey',
      ],
      'members' =>
      [
        'StreamName' =>
        [
          'shape' => 'StreamName',
        ],
        'ShardToSplit' =>
        [
          'shape' => 'ShardId',
        ],
        'NewStartingHashKey' =>
        [
          'shape' => 'HashKey',
        ],
      ],
    ],
    'StreamARN' =>
    [
      'type' => 'string',
    ],
    'StreamDescription' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'StreamName',
        1 => 'StreamARN',
        2 => 'StreamStatus',
        3 => 'Shards',
        4 => 'HasMoreShards',
      ],
      'members' =>
      [
        'StreamName' =>
        [
          'shape' => 'StreamName',
        ],
        'StreamARN' =>
        [
          'shape' => 'StreamARN',
        ],
        'StreamStatus' =>
        [
          'shape' => 'StreamStatus',
        ],
        'Shards' =>
        [
          'shape' => 'ShardList',
        ],
        'HasMoreShards' =>
        [
          'shape' => 'BooleanObject',
        ],
      ],
    ],
    'StreamName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
      'pattern' => '[a-zA-Z0-9_.-]+',
    ],
    'StreamNameList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'StreamName',
      ],
    ],
    'StreamStatus' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'CREATING',
        1 => 'DELETING',
        2 => 'ACTIVE',
        3 => 'UPDATING',
      ],
    ],
  ],
];