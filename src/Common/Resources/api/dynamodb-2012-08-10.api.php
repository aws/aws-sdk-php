<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2012-08-10',
    'endpointPrefix' => 'dynamodb',
    'jsonVersion' => '1.0',
    'serviceAbbreviation' => 'DynamoDB',
    'serviceFullName' => 'Amazon DynamoDB',
    'signatureVersion' => 'v4',
    'targetPrefix' => 'DynamoDB_20120810',
    'protocol' => 'json',
  ],
  'operations' =>
  [
    'BatchGetItem' =>
    [
      'name' => 'BatchGetItem',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'BatchGetItemInput',
      ],
      'output' =>
      [
        'shape' => 'BatchGetItemOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'BatchWriteItem' =>
    [
      'name' => 'BatchWriteItem',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'BatchWriteItemInput',
      ],
      'output' =>
      [
        'shape' => 'BatchWriteItemOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ItemCollectionSizeLimitExceededException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'CreateTable' =>
    [
      'name' => 'CreateTable',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CreateTableInput',
      ],
      'output' =>
      [
        'shape' => 'CreateTableOutput',
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
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'DeleteItem' =>
    [
      'name' => 'DeleteItem',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteItemInput',
      ],
      'output' =>
      [
        'shape' => 'DeleteItemOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ConditionalCheckFailedException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ItemCollectionSizeLimitExceededException',
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'DeleteTable' =>
    [
      'name' => 'DeleteTable',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DeleteTableInput',
      ],
      'output' =>
      [
        'shape' => 'DeleteTableOutput',
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
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'DescribeTable' =>
    [
      'name' => 'DescribeTable',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DescribeTableInput',
      ],
      'output' =>
      [
        'shape' => 'DescribeTableOutput',
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
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'GetItem' =>
    [
      'name' => 'GetItem',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetItemInput',
      ],
      'output' =>
      [
        'shape' => 'GetItemOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'ListTables' =>
    [
      'name' => 'ListTables',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListTablesInput',
      ],
      'output' =>
      [
        'shape' => 'ListTablesOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'PutItem' =>
    [
      'name' => 'PutItem',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'PutItemInput',
      ],
      'output' =>
      [
        'shape' => 'PutItemOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ConditionalCheckFailedException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ItemCollectionSizeLimitExceededException',
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'Query' =>
    [
      'name' => 'Query',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'QueryInput',
      ],
      'output' =>
      [
        'shape' => 'QueryOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'Scan' =>
    [
      'name' => 'Scan',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ScanInput',
      ],
      'output' =>
      [
        'shape' => 'ScanOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'UpdateItem' =>
    [
      'name' => 'UpdateItem',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateItemInput',
      ],
      'output' =>
      [
        'shape' => 'UpdateItemOutput',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'ConditionalCheckFailedException',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'ProvisionedThroughputExceededException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ItemCollectionSizeLimitExceededException',
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
    'UpdateTable' =>
    [
      'name' => 'UpdateTable',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateTableInput',
      ],
      'output' =>
      [
        'shape' => 'UpdateTableOutput',
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
          'shape' => 'ResourceNotFoundException',
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'LimitExceededException',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InternalServerError',
          'exception' => true,
          'fault' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'AttributeAction' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'ADD',
        1 => 'PUT',
        2 => 'DELETE',
      ],
    ],
    'AttributeDefinition' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AttributeName',
        1 => 'AttributeType',
      ],
      'members' =>
      [
        'AttributeName' =>
        [
          'shape' => 'KeySchemaAttributeName',
        ],
        'AttributeType' =>
        [
          'shape' => 'ScalarAttributeType',
        ],
      ],
    ],
    'AttributeDefinitions' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AttributeDefinition',
      ],
    ],
    'AttributeMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'AttributeName',
      ],
      'value' =>
      [
        'shape' => 'AttributeValue',
      ],
    ],
    'AttributeName' =>
    [
      'type' => 'string',
      'max' => 65535,
    ],
    'AttributeNameList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AttributeName',
      ],
      'min' => 1,
    ],
    'AttributeUpdates' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'AttributeName',
      ],
      'value' =>
      [
        'shape' => 'AttributeValueUpdate',
      ],
    ],
    'AttributeValue' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'S' =>
        [
          'shape' => 'StringAttributeValue',
        ],
        'N' =>
        [
          'shape' => 'NumberAttributeValue',
        ],
        'B' =>
        [
          'shape' => 'BinaryAttributeValue',
        ],
        'SS' =>
        [
          'shape' => 'StringSetAttributeValue',
        ],
        'NS' =>
        [
          'shape' => 'NumberSetAttributeValue',
        ],
        'BS' =>
        [
          'shape' => 'BinarySetAttributeValue',
        ],
        'M' =>
        [
          'shape' => 'MapAttributeValue',
        ],
        'L' =>
        [
          'shape' => 'ListAttributeValue',
        ],
        'NULL' =>
        [
          'shape' => 'NullAttributeValue',
        ],
        'BOOL' =>
        [
          'shape' => 'BooleanAttributeValue',
        ],
      ],
    ],
    'AttributeValueList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AttributeValue',
      ],
    ],
    'AttributeValueUpdate' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Value' =>
        [
          'shape' => 'AttributeValue',
        ],
        'Action' =>
        [
          'shape' => 'AttributeAction',
        ],
      ],
    ],
    'BatchGetItemInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RequestItems',
      ],
      'members' =>
      [
        'RequestItems' =>
        [
          'shape' => 'BatchGetRequestMap',
        ],
        'ReturnConsumedCapacity' =>
        [
          'shape' => 'ReturnConsumedCapacity',
        ],
      ],
    ],
    'BatchGetItemOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Responses' =>
        [
          'shape' => 'BatchGetResponseMap',
        ],
        'UnprocessedKeys' =>
        [
          'shape' => 'BatchGetRequestMap',
        ],
        'ConsumedCapacity' =>
        [
          'shape' => 'ConsumedCapacityMultiple',
        ],
      ],
    ],
    'BatchGetRequestMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'TableName',
      ],
      'value' =>
      [
        'shape' => 'KeysAndAttributes',
      ],
      'min' => 1,
      'max' => 100,
    ],
    'BatchGetResponseMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'TableName',
      ],
      'value' =>
      [
        'shape' => 'ItemList',
      ],
    ],
    'BatchWriteItemInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'RequestItems',
      ],
      'members' =>
      [
        'RequestItems' =>
        [
          'shape' => 'BatchWriteItemRequestMap',
        ],
        'ReturnConsumedCapacity' =>
        [
          'shape' => 'ReturnConsumedCapacity',
        ],
        'ReturnItemCollectionMetrics' =>
        [
          'shape' => 'ReturnItemCollectionMetrics',
        ],
      ],
    ],
    'BatchWriteItemOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'UnprocessedItems' =>
        [
          'shape' => 'BatchWriteItemRequestMap',
        ],
        'ItemCollectionMetrics' =>
        [
          'shape' => 'ItemCollectionMetricsPerTable',
        ],
        'ConsumedCapacity' =>
        [
          'shape' => 'ConsumedCapacityMultiple',
        ],
      ],
    ],
    'BatchWriteItemRequestMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'TableName',
      ],
      'value' =>
      [
        'shape' => 'WriteRequests',
      ],
      'min' => 1,
      'max' => 25,
    ],
    'BinaryAttributeValue' =>
    [
      'type' => 'blob',
    ],
    'BinarySetAttributeValue' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'BinaryAttributeValue',
      ],
    ],
    'BooleanAttributeValue' =>
    [
      'type' => 'boolean',
    ],
    'BooleanObject' =>
    [
      'type' => 'boolean',
    ],
    'Capacity' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'CapacityUnits' =>
        [
          'shape' => 'ConsumedCapacityUnits',
        ],
      ],
    ],
    'ComparisonOperator' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'EQ',
        1 => 'NE',
        2 => 'IN',
        3 => 'LE',
        4 => 'LT',
        5 => 'GE',
        6 => 'GT',
        7 => 'BETWEEN',
        8 => 'NOT_NULL',
        9 => 'NULL',
        10 => 'CONTAINS',
        11 => 'NOT_CONTAINS',
        12 => 'BEGINS_WITH',
      ],
    ],
    'Condition' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ComparisonOperator',
      ],
      'members' =>
      [
        'AttributeValueList' =>
        [
          'shape' => 'AttributeValueList',
        ],
        'ComparisonOperator' =>
        [
          'shape' => 'ComparisonOperator',
        ],
      ],
    ],
    'ConditionExpression' =>
    [
      'type' => 'string',
    ],
    'ConditionalCheckFailedException' =>
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
    'ConditionalOperator' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'AND',
        1 => 'OR',
      ],
    ],
    'ConsistentRead' =>
    [
      'type' => 'boolean',
    ],
    'ConsumedCapacity' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
        'CapacityUnits' =>
        [
          'shape' => 'ConsumedCapacityUnits',
        ],
        'Table' =>
        [
          'shape' => 'Capacity',
        ],
        'LocalSecondaryIndexes' =>
        [
          'shape' => 'SecondaryIndexesCapacityMap',
        ],
        'GlobalSecondaryIndexes' =>
        [
          'shape' => 'SecondaryIndexesCapacityMap',
        ],
      ],
    ],
    'ConsumedCapacityMultiple' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ConsumedCapacity',
      ],
    ],
    'ConsumedCapacityUnits' =>
    [
      'type' => 'double',
    ],
    'CreateTableInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AttributeDefinitions',
        1 => 'TableName',
        2 => 'KeySchema',
        3 => 'ProvisionedThroughput',
      ],
      'members' =>
      [
        'AttributeDefinitions' =>
        [
          'shape' => 'AttributeDefinitions',
        ],
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
        'KeySchema' =>
        [
          'shape' => 'KeySchema',
        ],
        'LocalSecondaryIndexes' =>
        [
          'shape' => 'LocalSecondaryIndexList',
        ],
        'GlobalSecondaryIndexes' =>
        [
          'shape' => 'GlobalSecondaryIndexList',
        ],
        'ProvisionedThroughput' =>
        [
          'shape' => 'ProvisionedThroughput',
        ],
      ],
    ],
    'CreateTableOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TableDescription' =>
        [
          'shape' => 'TableDescription',
        ],
      ],
    ],
    'Date' =>
    [
      'type' => 'timestamp',
    ],
    'DeleteItemInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TableName',
        1 => 'Key',
      ],
      'members' =>
      [
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
        'Key' =>
        [
          'shape' => 'Key',
        ],
        'Expected' =>
        [
          'shape' => 'ExpectedAttributeMap',
        ],
        'ConditionalOperator' =>
        [
          'shape' => 'ConditionalOperator',
        ],
        'ReturnValues' =>
        [
          'shape' => 'ReturnValue',
        ],
        'ReturnConsumedCapacity' =>
        [
          'shape' => 'ReturnConsumedCapacity',
        ],
        'ReturnItemCollectionMetrics' =>
        [
          'shape' => 'ReturnItemCollectionMetrics',
        ],
        'ConditionExpression' =>
        [
          'shape' => 'ConditionExpression',
        ],
        'ExpressionAttributeNames' =>
        [
          'shape' => 'ExpressionAttributeNameMap',
        ],
        'ExpressionAttributeValues' =>
        [
          'shape' => 'ExpressionAttributeValueMap',
        ],
      ],
    ],
    'DeleteItemOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Attributes' =>
        [
          'shape' => 'AttributeMap',
        ],
        'ConsumedCapacity' =>
        [
          'shape' => 'ConsumedCapacity',
        ],
        'ItemCollectionMetrics' =>
        [
          'shape' => 'ItemCollectionMetrics',
        ],
      ],
    ],
    'DeleteRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Key',
      ],
      'members' =>
      [
        'Key' =>
        [
          'shape' => 'Key',
        ],
      ],
    ],
    'DeleteTableInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TableName',
      ],
      'members' =>
      [
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
      ],
    ],
    'DeleteTableOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TableDescription' =>
        [
          'shape' => 'TableDescription',
        ],
      ],
    ],
    'DescribeTableInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TableName',
      ],
      'members' =>
      [
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
      ],
    ],
    'DescribeTableOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Table' =>
        [
          'shape' => 'TableDescription',
        ],
      ],
    ],
    'ErrorMessage' =>
    [
      'type' => 'string',
    ],
    'ExpectedAttributeMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'AttributeName',
      ],
      'value' =>
      [
        'shape' => 'ExpectedAttributeValue',
      ],
    ],
    'ExpectedAttributeValue' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Value' =>
        [
          'shape' => 'AttributeValue',
        ],
        'Exists' =>
        [
          'shape' => 'BooleanObject',
        ],
        'ComparisonOperator' =>
        [
          'shape' => 'ComparisonOperator',
        ],
        'AttributeValueList' =>
        [
          'shape' => 'AttributeValueList',
        ],
      ],
    ],
    'ExpressionAttributeNameMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'ExpressionAttributeNameVariable',
      ],
      'value' =>
      [
        'shape' => 'AttributeName',
      ],
    ],
    'ExpressionAttributeNameVariable' =>
    [
      'type' => 'string',
    ],
    'ExpressionAttributeValueMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'ExpressionAttributeValueVariable',
      ],
      'value' =>
      [
        'shape' => 'AttributeValue',
      ],
    ],
    'ExpressionAttributeValueVariable' =>
    [
      'type' => 'string',
    ],
    'FilterConditionMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'AttributeName',
      ],
      'value' =>
      [
        'shape' => 'Condition',
      ],
    ],
    'GetItemInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TableName',
        1 => 'Key',
      ],
      'members' =>
      [
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
        'Key' =>
        [
          'shape' => 'Key',
        ],
        'AttributesToGet' =>
        [
          'shape' => 'AttributeNameList',
        ],
        'ConsistentRead' =>
        [
          'shape' => 'ConsistentRead',
        ],
        'ReturnConsumedCapacity' =>
        [
          'shape' => 'ReturnConsumedCapacity',
        ],
        'ProjectionExpression' =>
        [
          'shape' => 'ProjectionExpression',
        ],
        'ExpressionAttributeNames' =>
        [
          'shape' => 'ExpressionAttributeNameMap',
        ],
      ],
    ],
    'GetItemOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Item' =>
        [
          'shape' => 'AttributeMap',
        ],
        'ConsumedCapacity' =>
        [
          'shape' => 'ConsumedCapacity',
        ],
      ],
    ],
    'GlobalSecondaryIndex' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'IndexName',
        1 => 'KeySchema',
        2 => 'Projection',
        3 => 'ProvisionedThroughput',
      ],
      'members' =>
      [
        'IndexName' =>
        [
          'shape' => 'IndexName',
        ],
        'KeySchema' =>
        [
          'shape' => 'KeySchema',
        ],
        'Projection' =>
        [
          'shape' => 'Projection',
        ],
        'ProvisionedThroughput' =>
        [
          'shape' => 'ProvisionedThroughput',
        ],
      ],
    ],
    'GlobalSecondaryIndexDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'IndexName' =>
        [
          'shape' => 'IndexName',
        ],
        'KeySchema' =>
        [
          'shape' => 'KeySchema',
        ],
        'Projection' =>
        [
          'shape' => 'Projection',
        ],
        'IndexStatus' =>
        [
          'shape' => 'IndexStatus',
        ],
        'ProvisionedThroughput' =>
        [
          'shape' => 'ProvisionedThroughputDescription',
        ],
        'IndexSizeBytes' =>
        [
          'shape' => 'Long',
        ],
        'ItemCount' =>
        [
          'shape' => 'Long',
        ],
      ],
    ],
    'GlobalSecondaryIndexDescriptionList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'GlobalSecondaryIndexDescription',
      ],
    ],
    'GlobalSecondaryIndexList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'GlobalSecondaryIndex',
      ],
    ],
    'GlobalSecondaryIndexUpdate' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Update' =>
        [
          'shape' => 'UpdateGlobalSecondaryIndexAction',
        ],
      ],
    ],
    'GlobalSecondaryIndexUpdateList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'GlobalSecondaryIndexUpdate',
      ],
    ],
    'IndexName' =>
    [
      'type' => 'string',
      'min' => 3,
      'max' => 255,
      'pattern' => '[a-zA-Z0-9_.-]+',
    ],
    'IndexStatus' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'CREATING',
        1 => 'UPDATING',
        2 => 'DELETING',
        3 => 'ACTIVE',
      ],
    ],
    'Integer' =>
    [
      'type' => 'integer',
    ],
    'InternalServerError' =>
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
      'fault' => true,
    ],
    'ItemCollectionKeyAttributeMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'AttributeName',
      ],
      'value' =>
      [
        'shape' => 'AttributeValue',
      ],
    ],
    'ItemCollectionMetrics' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ItemCollectionKey' =>
        [
          'shape' => 'ItemCollectionKeyAttributeMap',
        ],
        'SizeEstimateRangeGB' =>
        [
          'shape' => 'ItemCollectionSizeEstimateRange',
        ],
      ],
    ],
    'ItemCollectionMetricsMultiple' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ItemCollectionMetrics',
      ],
    ],
    'ItemCollectionMetricsPerTable' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'TableName',
      ],
      'value' =>
      [
        'shape' => 'ItemCollectionMetricsMultiple',
      ],
    ],
    'ItemCollectionSizeEstimateBound' =>
    [
      'type' => 'double',
    ],
    'ItemCollectionSizeEstimateRange' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ItemCollectionSizeEstimateBound',
      ],
    ],
    'ItemCollectionSizeLimitExceededException' =>
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
    'ItemList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AttributeMap',
      ],
    ],
    'Key' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'AttributeName',
      ],
      'value' =>
      [
        'shape' => 'AttributeValue',
      ],
    ],
    'KeyConditions' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'AttributeName',
      ],
      'value' =>
      [
        'shape' => 'Condition',
      ],
    ],
    'KeyList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Key',
      ],
      'min' => 1,
      'max' => 100,
    ],
    'KeySchema' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'KeySchemaElement',
      ],
      'min' => 1,
      'max' => 2,
    ],
    'KeySchemaAttributeName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'KeySchemaElement' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AttributeName',
        1 => 'KeyType',
      ],
      'members' =>
      [
        'AttributeName' =>
        [
          'shape' => 'KeySchemaAttributeName',
        ],
        'KeyType' =>
        [
          'shape' => 'KeyType',
        ],
      ],
    ],
    'KeyType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'HASH',
        1 => 'RANGE',
      ],
    ],
    'KeysAndAttributes' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Keys',
      ],
      'members' =>
      [
        'Keys' =>
        [
          'shape' => 'KeyList',
        ],
        'AttributesToGet' =>
        [
          'shape' => 'AttributeNameList',
        ],
        'ConsistentRead' =>
        [
          'shape' => 'ConsistentRead',
        ],
        'ProjectionExpression' =>
        [
          'shape' => 'ProjectionExpression',
        ],
        'ExpressionAttributeNames' =>
        [
          'shape' => 'ExpressionAttributeNameMap',
        ],
      ],
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
    'ListAttributeValue' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'AttributeValue',
      ],
    ],
    'ListTablesInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ExclusiveStartTableName' =>
        [
          'shape' => 'TableName',
        ],
        'Limit' =>
        [
          'shape' => 'ListTablesInputLimit',
        ],
      ],
    ],
    'ListTablesInputLimit' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 100,
    ],
    'ListTablesOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TableNames' =>
        [
          'shape' => 'TableNameList',
        ],
        'LastEvaluatedTableName' =>
        [
          'shape' => 'TableName',
        ],
      ],
    ],
    'LocalSecondaryIndex' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'IndexName',
        1 => 'KeySchema',
        2 => 'Projection',
      ],
      'members' =>
      [
        'IndexName' =>
        [
          'shape' => 'IndexName',
        ],
        'KeySchema' =>
        [
          'shape' => 'KeySchema',
        ],
        'Projection' =>
        [
          'shape' => 'Projection',
        ],
      ],
    ],
    'LocalSecondaryIndexDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'IndexName' =>
        [
          'shape' => 'IndexName',
        ],
        'KeySchema' =>
        [
          'shape' => 'KeySchema',
        ],
        'Projection' =>
        [
          'shape' => 'Projection',
        ],
        'IndexSizeBytes' =>
        [
          'shape' => 'Long',
        ],
        'ItemCount' =>
        [
          'shape' => 'Long',
        ],
      ],
    ],
    'LocalSecondaryIndexDescriptionList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'LocalSecondaryIndexDescription',
      ],
    ],
    'LocalSecondaryIndexList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'LocalSecondaryIndex',
      ],
    ],
    'Long' =>
    [
      'type' => 'long',
    ],
    'MapAttributeValue' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'AttributeName',
      ],
      'value' =>
      [
        'shape' => 'AttributeValue',
      ],
    ],
    'NonKeyAttributeName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 255,
    ],
    'NonKeyAttributeNameList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'NonKeyAttributeName',
      ],
      'min' => 1,
      'max' => 20,
    ],
    'NullAttributeValue' =>
    [
      'type' => 'boolean',
    ],
    'NumberAttributeValue' =>
    [
      'type' => 'string',
    ],
    'NumberSetAttributeValue' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'NumberAttributeValue',
      ],
    ],
    'PositiveIntegerObject' =>
    [
      'type' => 'integer',
      'min' => 1,
    ],
    'PositiveLongObject' =>
    [
      'type' => 'long',
      'min' => 1,
    ],
    'Projection' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ProjectionType' =>
        [
          'shape' => 'ProjectionType',
        ],
        'NonKeyAttributes' =>
        [
          'shape' => 'NonKeyAttributeNameList',
        ],
      ],
    ],
    'ProjectionExpression' =>
    [
      'type' => 'string',
    ],
    'ProjectionType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'ALL',
        1 => 'KEYS_ONLY',
        2 => 'INCLUDE',
      ],
    ],
    'ProvisionedThroughput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ReadCapacityUnits',
        1 => 'WriteCapacityUnits',
      ],
      'members' =>
      [
        'ReadCapacityUnits' =>
        [
          'shape' => 'PositiveLongObject',
        ],
        'WriteCapacityUnits' =>
        [
          'shape' => 'PositiveLongObject',
        ],
      ],
    ],
    'ProvisionedThroughputDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'LastIncreaseDateTime' =>
        [
          'shape' => 'Date',
        ],
        'LastDecreaseDateTime' =>
        [
          'shape' => 'Date',
        ],
        'NumberOfDecreasesToday' =>
        [
          'shape' => 'PositiveLongObject',
        ],
        'ReadCapacityUnits' =>
        [
          'shape' => 'PositiveLongObject',
        ],
        'WriteCapacityUnits' =>
        [
          'shape' => 'PositiveLongObject',
        ],
      ],
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
    'PutItemInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TableName',
        1 => 'Item',
      ],
      'members' =>
      [
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
        'Item' =>
        [
          'shape' => 'PutItemInputAttributeMap',
        ],
        'Expected' =>
        [
          'shape' => 'ExpectedAttributeMap',
        ],
        'ReturnValues' =>
        [
          'shape' => 'ReturnValue',
        ],
        'ReturnConsumedCapacity' =>
        [
          'shape' => 'ReturnConsumedCapacity',
        ],
        'ReturnItemCollectionMetrics' =>
        [
          'shape' => 'ReturnItemCollectionMetrics',
        ],
        'ConditionalOperator' =>
        [
          'shape' => 'ConditionalOperator',
        ],
        'ConditionExpression' =>
        [
          'shape' => 'ConditionExpression',
        ],
        'ExpressionAttributeNames' =>
        [
          'shape' => 'ExpressionAttributeNameMap',
        ],
        'ExpressionAttributeValues' =>
        [
          'shape' => 'ExpressionAttributeValueMap',
        ],
      ],
    ],
    'PutItemInputAttributeMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'AttributeName',
      ],
      'value' =>
      [
        'shape' => 'AttributeValue',
      ],
    ],
    'PutItemOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Attributes' =>
        [
          'shape' => 'AttributeMap',
        ],
        'ConsumedCapacity' =>
        [
          'shape' => 'ConsumedCapacity',
        ],
        'ItemCollectionMetrics' =>
        [
          'shape' => 'ItemCollectionMetrics',
        ],
      ],
    ],
    'PutRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Item',
      ],
      'members' =>
      [
        'Item' =>
        [
          'shape' => 'PutItemInputAttributeMap',
        ],
      ],
    ],
    'QueryInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TableName',
        1 => 'KeyConditions',
      ],
      'members' =>
      [
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
        'IndexName' =>
        [
          'shape' => 'IndexName',
        ],
        'Select' =>
        [
          'shape' => 'Select',
        ],
        'AttributesToGet' =>
        [
          'shape' => 'AttributeNameList',
        ],
        'Limit' =>
        [
          'shape' => 'PositiveIntegerObject',
        ],
        'ConsistentRead' =>
        [
          'shape' => 'ConsistentRead',
        ],
        'KeyConditions' =>
        [
          'shape' => 'KeyConditions',
        ],
        'QueryFilter' =>
        [
          'shape' => 'FilterConditionMap',
        ],
        'ConditionalOperator' =>
        [
          'shape' => 'ConditionalOperator',
        ],
        'ScanIndexForward' =>
        [
          'shape' => 'BooleanObject',
        ],
        'ExclusiveStartKey' =>
        [
          'shape' => 'Key',
        ],
        'ReturnConsumedCapacity' =>
        [
          'shape' => 'ReturnConsumedCapacity',
        ],
        'ProjectionExpression' =>
        [
          'shape' => 'ProjectionExpression',
        ],
        'FilterExpression' =>
        [
          'shape' => 'ConditionExpression',
        ],
        'ExpressionAttributeNames' =>
        [
          'shape' => 'ExpressionAttributeNameMap',
        ],
        'ExpressionAttributeValues' =>
        [
          'shape' => 'ExpressionAttributeValueMap',
        ],
      ],
    ],
    'QueryOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Items' =>
        [
          'shape' => 'ItemList',
        ],
        'Count' =>
        [
          'shape' => 'Integer',
        ],
        'ScannedCount' =>
        [
          'shape' => 'Integer',
        ],
        'LastEvaluatedKey' =>
        [
          'shape' => 'Key',
        ],
        'ConsumedCapacity' =>
        [
          'shape' => 'ConsumedCapacity',
        ],
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
    'ReturnConsumedCapacity' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'INDEXES',
        1 => 'TOTAL',
        2 => 'NONE',
      ],
    ],
    'ReturnItemCollectionMetrics' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'SIZE',
        1 => 'NONE',
      ],
    ],
    'ReturnValue' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'NONE',
        1 => 'ALL_OLD',
        2 => 'UPDATED_OLD',
        3 => 'ALL_NEW',
        4 => 'UPDATED_NEW',
      ],
    ],
    'ScalarAttributeType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'S',
        1 => 'N',
        2 => 'B',
      ],
    ],
    'ScanInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TableName',
      ],
      'members' =>
      [
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
        'AttributesToGet' =>
        [
          'shape' => 'AttributeNameList',
        ],
        'Limit' =>
        [
          'shape' => 'PositiveIntegerObject',
        ],
        'Select' =>
        [
          'shape' => 'Select',
        ],
        'ScanFilter' =>
        [
          'shape' => 'FilterConditionMap',
        ],
        'ConditionalOperator' =>
        [
          'shape' => 'ConditionalOperator',
        ],
        'ExclusiveStartKey' =>
        [
          'shape' => 'Key',
        ],
        'ReturnConsumedCapacity' =>
        [
          'shape' => 'ReturnConsumedCapacity',
        ],
        'TotalSegments' =>
        [
          'shape' => 'ScanTotalSegments',
        ],
        'Segment' =>
        [
          'shape' => 'ScanSegment',
        ],
        'ProjectionExpression' =>
        [
          'shape' => 'ProjectionExpression',
        ],
        'FilterExpression' =>
        [
          'shape' => 'ConditionExpression',
        ],
        'ExpressionAttributeNames' =>
        [
          'shape' => 'ExpressionAttributeNameMap',
        ],
        'ExpressionAttributeValues' =>
        [
          'shape' => 'ExpressionAttributeValueMap',
        ],
      ],
    ],
    'ScanOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Items' =>
        [
          'shape' => 'ItemList',
        ],
        'Count' =>
        [
          'shape' => 'Integer',
        ],
        'ScannedCount' =>
        [
          'shape' => 'Integer',
        ],
        'LastEvaluatedKey' =>
        [
          'shape' => 'Key',
        ],
        'ConsumedCapacity' =>
        [
          'shape' => 'ConsumedCapacity',
        ],
      ],
    ],
    'ScanSegment' =>
    [
      'type' => 'integer',
      'min' => 0,
      'max' => 999999,
    ],
    'ScanTotalSegments' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 1000000,
    ],
    'SecondaryIndexesCapacityMap' =>
    [
      'type' => 'map',
      'key' =>
      [
        'shape' => 'IndexName',
      ],
      'value' =>
      [
        'shape' => 'Capacity',
      ],
    ],
    'Select' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'ALL_ATTRIBUTES',
        1 => 'ALL_PROJECTED_ATTRIBUTES',
        2 => 'SPECIFIC_ATTRIBUTES',
        3 => 'COUNT',
      ],
    ],
    'StringAttributeValue' =>
    [
      'type' => 'string',
    ],
    'StringSetAttributeValue' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'StringAttributeValue',
      ],
    ],
    'TableDescription' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'AttributeDefinitions' =>
        [
          'shape' => 'AttributeDefinitions',
        ],
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
        'KeySchema' =>
        [
          'shape' => 'KeySchema',
        ],
        'TableStatus' =>
        [
          'shape' => 'TableStatus',
        ],
        'CreationDateTime' =>
        [
          'shape' => 'Date',
        ],
        'ProvisionedThroughput' =>
        [
          'shape' => 'ProvisionedThroughputDescription',
        ],
        'TableSizeBytes' =>
        [
          'shape' => 'Long',
        ],
        'ItemCount' =>
        [
          'shape' => 'Long',
        ],
        'LocalSecondaryIndexes' =>
        [
          'shape' => 'LocalSecondaryIndexDescriptionList',
        ],
        'GlobalSecondaryIndexes' =>
        [
          'shape' => 'GlobalSecondaryIndexDescriptionList',
        ],
      ],
    ],
    'TableName' =>
    [
      'type' => 'string',
      'min' => 3,
      'max' => 255,
      'pattern' => '[a-zA-Z0-9_.-]+',
    ],
    'TableNameList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'TableName',
      ],
    ],
    'TableStatus' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'CREATING',
        1 => 'UPDATING',
        2 => 'DELETING',
        3 => 'ACTIVE',
      ],
    ],
    'UpdateExpression' =>
    [
      'type' => 'string',
    ],
    'UpdateGlobalSecondaryIndexAction' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'IndexName',
        1 => 'ProvisionedThroughput',
      ],
      'members' =>
      [
        'IndexName' =>
        [
          'shape' => 'IndexName',
        ],
        'ProvisionedThroughput' =>
        [
          'shape' => 'ProvisionedThroughput',
        ],
      ],
    ],
    'UpdateItemInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TableName',
        1 => 'Key',
      ],
      'members' =>
      [
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
        'Key' =>
        [
          'shape' => 'Key',
        ],
        'AttributeUpdates' =>
        [
          'shape' => 'AttributeUpdates',
        ],
        'Expected' =>
        [
          'shape' => 'ExpectedAttributeMap',
        ],
        'ConditionalOperator' =>
        [
          'shape' => 'ConditionalOperator',
        ],
        'ReturnValues' =>
        [
          'shape' => 'ReturnValue',
        ],
        'ReturnConsumedCapacity' =>
        [
          'shape' => 'ReturnConsumedCapacity',
        ],
        'ReturnItemCollectionMetrics' =>
        [
          'shape' => 'ReturnItemCollectionMetrics',
        ],
        'UpdateExpression' =>
        [
          'shape' => 'UpdateExpression',
        ],
        'ConditionExpression' =>
        [
          'shape' => 'ConditionExpression',
        ],
        'ExpressionAttributeNames' =>
        [
          'shape' => 'ExpressionAttributeNameMap',
        ],
        'ExpressionAttributeValues' =>
        [
          'shape' => 'ExpressionAttributeValueMap',
        ],
      ],
    ],
    'UpdateItemOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Attributes' =>
        [
          'shape' => 'AttributeMap',
        ],
        'ConsumedCapacity' =>
        [
          'shape' => 'ConsumedCapacity',
        ],
        'ItemCollectionMetrics' =>
        [
          'shape' => 'ItemCollectionMetrics',
        ],
      ],
    ],
    'UpdateTableInput' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'TableName',
      ],
      'members' =>
      [
        'TableName' =>
        [
          'shape' => 'TableName',
        ],
        'ProvisionedThroughput' =>
        [
          'shape' => 'ProvisionedThroughput',
        ],
        'GlobalSecondaryIndexUpdates' =>
        [
          'shape' => 'GlobalSecondaryIndexUpdateList',
        ],
      ],
    ],
    'UpdateTableOutput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'TableDescription' =>
        [
          'shape' => 'TableDescription',
        ],
      ],
    ],
    'WriteRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'PutRequest' =>
        [
          'shape' => 'PutRequest',
        ],
        'DeleteRequest' =>
        [
          'shape' => 'DeleteRequest',
        ],
      ],
    ],
    'WriteRequests' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'WriteRequest',
      ],
      'min' => 1,
      'max' => 25,
    ],
  ],
];