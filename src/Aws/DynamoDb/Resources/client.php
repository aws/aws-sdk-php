<?php
return array (
    'name' => 'dynamo_db',
    'apiVersion' => '2011-12-05',
    'description' => 'Amazon DynamoDB is a fast, highly scalable, highly available, cost-effective non-relational database service.',
    'operations' => array(
        'BatchGetItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.BatchGetItem',
                ),
                'RequestItems' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'min' => 1,
                    'max' => 100,
                    'additionalProperties' => array(
                        'type' => 'object',
                        'properties' => array(
                            'Keys' => array(
                                'required' => true,
                                'type' => 'array',
                                'min' => 1,
                                'max' => 100,
                                'items' => array(
                                    'description' => 'The primary key that uniquely identifies each item in a table. A primary key can be a one attribute (hash) primary key or a two attribute (hash-and-range) primary key.',
                                    'type' => 'object',
                                    'properties' => array(
                                        'HashKeyElement' => array(
                                            'required' => true,
                                            'description' => 'A hash key element is treated as the primary key, and can be a string or a number. Single attribute primary keys have one index value. The value can be String, Number, StringSet, NumberSet.',
                                            'type' => 'object',
                                            'properties' => array(
                                                'S' => array(
                                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                                    'type' => 'string',
                                                ),
                                                'N' => array(
                                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                                    'type' => 'string',
                                                ),
                                                'B' => array(
                                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                                    'type' => 'string',
                                                    'filters' => array(
                                                        'base64_encode',
                                                    ),
                                                ),
                                                'SS' => array(
                                                    'description' => 'A set of strings.',
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                                'NS' => array(
                                                    'description' => 'A set of numbers.',
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                                'BS' => array(
                                                    'description' => 'A set of binary attributes.',
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'type' => 'string',
                                                        'filters' => array(
                                                            'base64_encode',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'RangeKeyElement' => array(
                                            'description' => 'A range key element is treated as a secondary key (used in conjunction with the primary key), and can be a string or a number, and is only used for hash-and-range primary keys. The value can be String, Number, StringSet, NumberSet.',
                                            'type' => 'object',
                                            'properties' => array(
                                                'S' => array(
                                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                                    'type' => 'string',
                                                ),
                                                'N' => array(
                                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                                    'type' => 'string',
                                                ),
                                                'B' => array(
                                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                                    'type' => 'string',
                                                    'filters' => array(
                                                        'base64_encode',
                                                    ),
                                                ),
                                                'SS' => array(
                                                    'description' => 'A set of strings.',
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                                'NS' => array(
                                                    'description' => 'A set of numbers.',
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                                'BS' => array(
                                                    'description' => 'A set of binary attributes.',
                                                    'type' => 'array',
                                                    'items' => array(
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
                            'AttributesToGet' => array(
                                'type' => 'array',
                                'min' => 1,
                                'items' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the level of provisioned throughput defined for the table is exceeded.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'BatchWriteItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.BatchWriteItem',
                ),
                'RequestItems' => array(
                    'required' => true,
                    'description' => 'A map of table name to list-of-write-requests. Used as input to the BatchWriteItem API call',
                    'type' => 'object',
                    'location' => 'json',
                    'min' => 1,
                    'max' => 25,
                    'additionalProperties' => array(
                        'type' => 'array',
                        'min' => 1,
                        'max' => 25,
                        'items' => array(
                            'description' => 'This structure is a Union of PutRequest and DeleteRequest. It can contain exactly one of PutRequest or DeleteRequest. Never Both. This is enforced in the code.',
                            'type' => 'object',
                            'properties' => array(
                                'PutRequest' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Item' => array(
                                            'required' => true,
                                            'description' => 'The item to put',
                                            'type' => 'object',
                                            'additionalProperties' => array(
                                                'description' => 'AttributeValue can be String, Number, Binary, StringSet, NumberSet, BinarySet.',
                                                'type' => 'object',
                                                'properties' => array(
                                                    'S' => array(
                                                        'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                                        'type' => 'string',
                                                    ),
                                                    'N' => array(
                                                        'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                                        'type' => 'string',
                                                    ),
                                                    'B' => array(
                                                        'description' => 'Binary attributes are sequences of unsigned bytes.',
                                                        'type' => 'string',
                                                        'filters' => array(
                                                            'base64_encode',
                                                        ),
                                                    ),
                                                    'SS' => array(
                                                        'description' => 'A set of strings.',
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                    'NS' => array(
                                                        'description' => 'A set of numbers.',
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                    'BS' => array(
                                                        'description' => 'A set of binary attributes.',
                                                        'type' => 'array',
                                                        'items' => array(
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
                                            'description' => 'The item\'s key to be delete',
                                            'type' => 'object',
                                            'properties' => array(
                                                'HashKeyElement' => array(
                                                    'required' => true,
                                                    'description' => 'A hash key element is treated as the primary key, and can be a string or a number. Single attribute primary keys have one index value. The value can be String, Number, StringSet, NumberSet.',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'S' => array(
                                                            'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                                            'type' => 'string',
                                                        ),
                                                        'N' => array(
                                                            'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                                            'type' => 'string',
                                                        ),
                                                        'B' => array(
                                                            'description' => 'Binary attributes are sequences of unsigned bytes.',
                                                            'type' => 'string',
                                                            'filters' => array(
                                                                'base64_encode',
                                                            ),
                                                        ),
                                                        'SS' => array(
                                                            'description' => 'A set of strings.',
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                        'NS' => array(
                                                            'description' => 'A set of numbers.',
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                        'BS' => array(
                                                            'description' => 'A set of binary attributes.',
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'type' => 'string',
                                                                'filters' => array(
                                                                    'base64_encode',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'RangeKeyElement' => array(
                                                    'description' => 'A range key element is treated as a secondary key (used in conjunction with the primary key), and can be a string or a number, and is only used for hash-and-range primary keys. The value can be String, Number, StringSet, NumberSet.',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'S' => array(
                                                            'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                                            'type' => 'string',
                                                        ),
                                                        'N' => array(
                                                            'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                                            'type' => 'string',
                                                        ),
                                                        'B' => array(
                                                            'description' => 'Binary attributes are sequences of unsigned bytes.',
                                                            'type' => 'string',
                                                            'filters' => array(
                                                                'base64_encode',
                                                            ),
                                                        ),
                                                        'SS' => array(
                                                            'description' => 'A set of strings.',
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                        'NS' => array(
                                                            'description' => 'A set of numbers.',
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                        'BS' => array(
                                                            'description' => 'A set of binary attributes.',
                                                            'type' => 'array',
                                                            'items' => array(
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
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the level of provisioned throughput defined for the table is exceeded.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'CreateTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.CreateTable',
                ),
                'TableName' => array(
                    'required' => true,
                    'description' => 'The name of the table you want to create. Allowed characters are a-z, A-Z, 0-9, _ (underscore), - (hyphen) and . (period).',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
                'KeySchema' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'HashKeyElement' => array(
                            'required' => true,
                            'description' => 'A hash key element is treated as the primary key, and can be a string or a number. Single attribute primary keys have one index value. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'AttributeName' => array(
                                    'required' => true,
                                    'description' => 'The AttributeName of the KeySchemaElement.',
                                    'type' => 'string',
                                    'min' => 1,
                                    'max' => 255,
                                ),
                                'AttributeType' => array(
                                    'required' => true,
                                    'description' => 'The AttributeType of the KeySchemaElement which can be a String or a Number.',
                                    'type' => 'string',
                                    'enum' => array(
                                        'S',
                                        'N',
                                        'B',
                                    ),
                                ),
                            ),
                        ),
                        'RangeKeyElement' => array(
                            'description' => 'A range key element is treated as a secondary key (used in conjunction with the primary key), and can be a string or a number, and is only used for hash-and-range primary keys. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'AttributeName' => array(
                                    'required' => true,
                                    'description' => 'The AttributeName of the KeySchemaElement.',
                                    'type' => 'string',
                                    'min' => 1,
                                    'max' => 255,
                                ),
                                'AttributeType' => array(
                                    'required' => true,
                                    'description' => 'The AttributeType of the KeySchemaElement which can be a String or a Number.',
                                    'type' => 'string',
                                    'enum' => array(
                                        'S',
                                        'N',
                                        'B',
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
                            'description' => 'ReadCapacityUnits are in terms of strictly consistent reads, assuming items of 1k. 2k items require twice the ReadCapacityUnits. Eventually-consistent reads only require half the ReadCapacityUnits of stirctly consistent reads.',
                            'min' => 1,
                        ),
                        'WriteCapacityUnits' => array(
                            'required' => true,
                            'description' => 'WriteCapacityUnits are in terms of strictly consistent reads, assuming items of 1k. 2k items require twice the WriteCapacityUnits.',
                            'min' => 1,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'This exception is thrown when the subscriber exceeded the limits on the number of objects or operations.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.DeleteItem',
                ),
                'TableName' => array(
                    'required' => true,
                    'description' => 'The name of the table in which you want to delete an item. Allowed characters are a-z, A-Z, 0-9, _ (underscore), - (hyphen) and . (period).',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'HashKeyElement' => array(
                            'required' => true,
                            'description' => 'A hash key element is treated as the primary key, and can be a string or a number. Single attribute primary keys have one index value. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                                'SS' => array(
                                    'description' => 'A set of strings.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'description' => 'A set of numbers.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'description' => 'A set of binary attributes.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'RangeKeyElement' => array(
                            'description' => 'A range key element is treated as a secondary key (used in conjunction with the primary key), and can be a string or a number, and is only used for hash-and-range primary keys. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                                'SS' => array(
                                    'description' => 'A set of strings.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'description' => 'A set of numbers.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'description' => 'A set of binary attributes.',
                                    'type' => 'array',
                                    'items' => array(
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
                'Expected' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'description' => 'Allows you to provide an attribute name, and whether or not Amazon DynamoDB should check to see if the attribute value already exists; or if the attribute value exists and has a particular value before changing it.',
                        'type' => 'object',
                        'properties' => array(
                            'Value' => array(
                                'description' => 'Specify whether or not a value already exists and has a specific content for the attribute name-value pair.',
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'description' => 'Binary attributes are sequences of unsigned bytes.',
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'description' => 'A set of strings.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'description' => 'A set of numbers.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'description' => 'A set of binary attributes.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_encode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Exists' => array(
                                'description' => 'Specify whether or not a value already exists for the attribute name-value pair.',
                                'type' => 'bool',
                                'filters' => array(
                                    'Aws\\Common\\Command\\Filters::booleanString',
                                ),
                            ),
                        ),
                    ),
                ),
                'ReturnValues' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'NONE',
                        'ALL_OLD',
                        'UPDATED_OLD',
                        'ALL_NEW',
                        'UPDATED_NEW',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when an expected value does not match what was found in the system.',
                    'class' => 'ConditionalCheckFailedException',
                ),
                array(
                    'reason' => 'This exception is thrown when the level of provisioned throughput defined for the table is exceeded.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.DeleteTable',
                ),
                'TableName' => array(
                    'required' => true,
                    'description' => 'The name of the table you want to delete. Allowed characters are a-z, A-Z, 0-9, _ (underscore), - (hyphen) and . (period).',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the subscriber exceeded the limits on the number of objects or operations.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.DescribeTable',
                ),
                'TableName' => array(
                    'required' => true,
                    'description' => 'The name of the table you want to describe. Allowed characters are a-z, A-Z, 0-9, _ (underscore), - (hyphen) and . (period).',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'GetItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.GetItem',
                ),
                'TableName' => array(
                    'required' => true,
                    'description' => 'The name of the table in which you want to get an item. Allowed characters are a-z, A-Z, 0-9, _ (underscore), - (hyphen) and . (period).',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'HashKeyElement' => array(
                            'required' => true,
                            'description' => 'A hash key element is treated as the primary key, and can be a string or a number. Single attribute primary keys have one index value. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                                'SS' => array(
                                    'description' => 'A set of strings.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'description' => 'A set of numbers.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'description' => 'A set of binary attributes.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'RangeKeyElement' => array(
                            'description' => 'A range key element is treated as a secondary key (used in conjunction with the primary key), and can be a string or a number, and is only used for hash-and-range primary keys. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                                'SS' => array(
                                    'description' => 'A set of strings.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'description' => 'A set of numbers.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'description' => 'A set of binary attributes.',
                                    'type' => 'array',
                                    'items' => array(
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
                    'location' => 'json',
                    'min' => 1,
                    'items' => array(
                        'type' => 'string',
                    ),
                ),
                'ConsistentRead' => array(
                    'type' => 'bool',
                    'location' => 'json',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the level of provisioned throughput defined for the table is exceeded.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ListTables' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.ListTables',
                ),
                'ExclusiveStartTableName' => array(
                    'description' => 'The name of the table that starts the list. If you already ran a ListTables operation and received a LastEvaluatedTableName value in the response, use that value here to continue the list.',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'min' => 1,
                    'max' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'PutItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.PutItem',
                ),
                'TableName' => array(
                    'required' => true,
                    'description' => 'The name of the table in which you want to put an item. Allowed characters are a-z, A-Z, 0-9, _ (underscore), - (hyphen) and . (period).',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
                'Item' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'description' => 'AttributeValue can be String, Number, Binary, StringSet, NumberSet, BinarySet.',
                        'type' => 'object',
                        'properties' => array(
                            'S' => array(
                                'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                'type' => 'string',
                            ),
                            'N' => array(
                                'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                'type' => 'string',
                            ),
                            'B' => array(
                                'description' => 'Binary attributes are sequences of unsigned bytes.',
                                'type' => 'string',
                                'filters' => array(
                                    'base64_encode',
                                ),
                            ),
                            'SS' => array(
                                'description' => 'A set of strings.',
                                'type' => 'array',
                                'items' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'NS' => array(
                                'description' => 'A set of numbers.',
                                'type' => 'array',
                                'items' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'BS' => array(
                                'description' => 'A set of binary attributes.',
                                'type' => 'array',
                                'items' => array(
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
                        'description' => 'Allows you to provide an attribute name, and whether or not Amazon DynamoDB should check to see if the attribute value already exists; or if the attribute value exists and has a particular value before changing it.',
                        'type' => 'object',
                        'properties' => array(
                            'Value' => array(
                                'description' => 'Specify whether or not a value already exists and has a specific content for the attribute name-value pair.',
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'description' => 'Binary attributes are sequences of unsigned bytes.',
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'description' => 'A set of strings.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'description' => 'A set of numbers.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'description' => 'A set of binary attributes.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_encode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Exists' => array(
                                'description' => 'Specify whether or not a value already exists for the attribute name-value pair.',
                                'type' => 'bool',
                                'filters' => array(
                                    'Aws\\Common\\Command\\Filters::booleanString',
                                ),
                            ),
                        ),
                    ),
                ),
                'ReturnValues' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'NONE',
                        'ALL_OLD',
                        'UPDATED_OLD',
                        'ALL_NEW',
                        'UPDATED_NEW',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when an expected value does not match what was found in the system.',
                    'class' => 'ConditionalCheckFailedException',
                ),
                array(
                    'reason' => 'This exception is thrown when the level of provisioned throughput defined for the table is exceeded.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'Query' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.Query',
                ),
                'TableName' => array(
                    'required' => true,
                    'description' => 'The name of the table in which you want to query. Allowed characters are a-z, A-Z, 0-9, _ (underscore), - (hyphen) and . (period).',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
                'AttributesToGet' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'min' => 1,
                    'items' => array(
                        'type' => 'string',
                    ),
                ),
                'Limit' => array(
                    'description' => 'The maximum number of items to return. If Amazon DynamoDB hits this limit while querying the table, it stops the query and returns the matching values up to the limit, and a LastEvaluatedKey to apply in a subsequent operation to continue the query. Also, if the result set size exceeds 1MB before Amazon DynamoDB hits this limit, it stops the query and returns the matching values, and a LastEvaluatedKey to apply in a subsequent operation to continue the query.',
                    'type' => 'numeric',
                    'location' => 'json',
                    'min' => 1,
                ),
                'ConsistentRead' => array(
                    'type' => 'bool',
                    'location' => 'json',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'Count' => array(
                    'description' => 'If set to true, Amazon DynamoDB returns a total number of items that match the query parameters, instead of a list of the matching items and their attributes. Do not set Count to true while providing a list of AttributesToGet, otherwise Amazon DynamoDB returns a validation error.',
                    'type' => 'bool',
                    'location' => 'json',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'HashKeyValue' => array(
                    'required' => true,
                    'description' => 'Attribute value of the hash component of the composite primary key.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'S' => array(
                            'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                            'type' => 'string',
                        ),
                        'N' => array(
                            'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                            'type' => 'string',
                        ),
                        'B' => array(
                            'description' => 'Binary attributes are sequences of unsigned bytes.',
                            'type' => 'string',
                            'filters' => array(
                                'base64_encode',
                            ),
                        ),
                        'SS' => array(
                            'description' => 'A set of strings.',
                            'type' => 'array',
                            'items' => array(
                                'type' => 'string',
                            ),
                        ),
                        'NS' => array(
                            'description' => 'A set of numbers.',
                            'type' => 'array',
                            'items' => array(
                                'type' => 'string',
                            ),
                        ),
                        'BS' => array(
                            'description' => 'A set of binary attributes.',
                            'type' => 'array',
                            'items' => array(
                                'type' => 'string',
                                'filters' => array(
                                    'base64_encode',
                                ),
                            ),
                        ),
                    ),
                ),
                'RangeKeyCondition' => array(
                    'description' => 'A container for the attribute values and comparison operators to use for the query.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'AttributeValueList' => array(
                            'type' => 'array',
                            'items' => array(
                                'description' => 'AttributeValue can be String, Number, Binary, StringSet, NumberSet, BinarySet.',
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'description' => 'Binary attributes are sequences of unsigned bytes.',
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'description' => 'A set of strings.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'description' => 'A set of numbers.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'description' => 'A set of binary attributes.',
                                        'type' => 'array',
                                        'items' => array(
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
                            'enum' => array(
                                'EQ',
                                'NE',
                                'IN',
                                'LE',
                                'LT',
                                'GE',
                                'GT',
                                'BETWEEN',
                                'NOT_NULL',
                                'NULL',
                                'CONTAINS',
                                'NOT_CONTAINS',
                                'BEGINS_WITH',
                            ),
                        ),
                    ),
                ),
                'ScanIndexForward' => array(
                    'description' => 'Specifies forward or backward traversal of the index. Amazon DynamoDB returns results reflecting the requested order, determined by the range key. The default value is true (forward).',
                    'type' => 'bool',
                    'location' => 'json',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'ExclusiveStartKey' => array(
                    'description' => 'Primary key of the item from which to continue an earlier query. An earlier query might provide this value as the LastEvaluatedKey if that query operation was interrupted before completing the query; either because of the result set size or the Limit parameter. The LastEvaluatedKey can be passed back in a new query request to continue the operation from that point.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'HashKeyElement' => array(
                            'required' => true,
                            'description' => 'A hash key element is treated as the primary key, and can be a string or a number. Single attribute primary keys have one index value. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                                'SS' => array(
                                    'description' => 'A set of strings.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'description' => 'A set of numbers.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'description' => 'A set of binary attributes.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'RangeKeyElement' => array(
                            'description' => 'A range key element is treated as a secondary key (used in conjunction with the primary key), and can be a string or a number, and is only used for hash-and-range primary keys. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                                'SS' => array(
                                    'description' => 'A set of strings.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'description' => 'A set of numbers.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'description' => 'A set of binary attributes.',
                                    'type' => 'array',
                                    'items' => array(
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
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the level of provisioned throughput defined for the table is exceeded.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'Scan' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.Scan',
                ),
                'TableName' => array(
                    'required' => true,
                    'description' => 'The name of the table in which you want to scan. Allowed characters are a-z, A-Z, 0-9, _ (underscore), - (hyphen) and . (period).',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
                'AttributesToGet' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'min' => 1,
                    'items' => array(
                        'type' => 'string',
                    ),
                ),
                'Limit' => array(
                    'description' => 'The maximum number of items to return. If Amazon DynamoDB hits this limit while scanning the table, it stops the scan and returns the matching values up to the limit, and a LastEvaluatedKey to apply in a subsequent operation to continue the scan. Also, if the scanned data set size exceeds 1 MB before Amazon DynamoDB hits this limit, it stops the scan and returns the matching values up to the limit, and a LastEvaluatedKey to apply in a subsequent operation to continue the scan.',
                    'type' => 'numeric',
                    'location' => 'json',
                    'min' => 1,
                ),
                'Count' => array(
                    'description' => 'If set to true, Amazon DynamoDB returns a total number of items for the Scan operation, even if the operation has no matching items for the assigned filter. Do not set Count to true while providing a list of AttributesToGet, otherwise Amazon DynamoDB returns a validation error.',
                    'type' => 'bool',
                    'location' => 'json',
                    'filters' => array(
                        'Aws\\Common\\Command\\Filters::booleanString',
                    ),
                ),
                'ScanFilter' => array(
                    'description' => 'Evaluates the scan results and returns only the desired values.',
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'object',
                        'properties' => array(
                            'AttributeValueList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'description' => 'AttributeValue can be String, Number, Binary, StringSet, NumberSet, BinarySet.',
                                    'type' => 'object',
                                    'properties' => array(
                                        'S' => array(
                                            'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                            'type' => 'string',
                                        ),
                                        'N' => array(
                                            'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                            'type' => 'string',
                                        ),
                                        'B' => array(
                                            'description' => 'Binary attributes are sequences of unsigned bytes.',
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_encode',
                                            ),
                                        ),
                                        'SS' => array(
                                            'description' => 'A set of strings.',
                                            'type' => 'array',
                                            'items' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                        'NS' => array(
                                            'description' => 'A set of numbers.',
                                            'type' => 'array',
                                            'items' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                        'BS' => array(
                                            'description' => 'A set of binary attributes.',
                                            'type' => 'array',
                                            'items' => array(
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
                                'enum' => array(
                                    'EQ',
                                    'NE',
                                    'IN',
                                    'LE',
                                    'LT',
                                    'GE',
                                    'GT',
                                    'BETWEEN',
                                    'NOT_NULL',
                                    'NULL',
                                    'CONTAINS',
                                    'NOT_CONTAINS',
                                    'BEGINS_WITH',
                                ),
                            ),
                        ),
                    ),
                ),
                'ExclusiveStartKey' => array(
                    'description' => 'Primary key of the item from which to continue an earlier scan. An earlier scan might provide this value if that scan operation was interrupted before scanning the entire table; either because of the result set size or the Limit parameter. The LastEvaluatedKey can be passed back in a new scan request to continue the operation from that point.',
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'HashKeyElement' => array(
                            'required' => true,
                            'description' => 'A hash key element is treated as the primary key, and can be a string or a number. Single attribute primary keys have one index value. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                                'SS' => array(
                                    'description' => 'A set of strings.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'description' => 'A set of numbers.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'description' => 'A set of binary attributes.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'RangeKeyElement' => array(
                            'description' => 'A range key element is treated as a secondary key (used in conjunction with the primary key), and can be a string or a number, and is only used for hash-and-range primary keys. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                                'SS' => array(
                                    'description' => 'A set of strings.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'description' => 'A set of numbers.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'description' => 'A set of binary attributes.',
                                    'type' => 'array',
                                    'items' => array(
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
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the level of provisioned throughput defined for the table is exceeded.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.UpdateItem',
                ),
                'TableName' => array(
                    'required' => true,
                    'description' => 'The name of the table in which you want to update an item. Allowed characters are a-z, A-Z, 0-9, _ (underscore), - (hyphen) and . (period).',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
                'Key' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'HashKeyElement' => array(
                            'required' => true,
                            'description' => 'A hash key element is treated as the primary key, and can be a string or a number. Single attribute primary keys have one index value. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                                'SS' => array(
                                    'description' => 'A set of strings.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'description' => 'A set of numbers.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'description' => 'A set of binary attributes.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'RangeKeyElement' => array(
                            'description' => 'A range key element is treated as a secondary key (used in conjunction with the primary key), and can be a string or a number, and is only used for hash-and-range primary keys. The value can be String, Number, StringSet, NumberSet.',
                            'type' => 'object',
                            'properties' => array(
                                'S' => array(
                                    'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                    'type' => 'string',
                                ),
                                'N' => array(
                                    'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                    'type' => 'string',
                                ),
                                'B' => array(
                                    'description' => 'Binary attributes are sequences of unsigned bytes.',
                                    'type' => 'string',
                                    'filters' => array(
                                        'base64_encode',
                                    ),
                                ),
                                'SS' => array(
                                    'description' => 'A set of strings.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'NS' => array(
                                    'description' => 'A set of numbers.',
                                    'type' => 'array',
                                    'items' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'BS' => array(
                                    'description' => 'A set of binary attributes.',
                                    'type' => 'array',
                                    'items' => array(
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
                'AttributeUpdates' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'description' => 'Specifies the attribute to update and how to perform the update. Possible values: PUT (default), ADD or DELETE.',
                        'type' => 'object',
                        'properties' => array(
                            'Value' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'description' => 'Binary attributes are sequences of unsigned bytes.',
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'description' => 'A set of strings.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'description' => 'A set of numbers.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'description' => 'A set of binary attributes.',
                                        'type' => 'array',
                                        'items' => array(
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
                                'enum' => array(
                                    'ADD',
                                    'PUT',
                                    'DELETE',
                                ),
                            ),
                        ),
                    ),
                ),
                'Expected' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'description' => 'Allows you to provide an attribute name, and whether or not Amazon DynamoDB should check to see if the attribute value already exists; or if the attribute value exists and has a particular value before changing it.',
                        'type' => 'object',
                        'properties' => array(
                            'Value' => array(
                                'description' => 'Specify whether or not a value already exists and has a specific content for the attribute name-value pair.',
                                'type' => 'object',
                                'properties' => array(
                                    'S' => array(
                                        'description' => 'Strings are Unicode with UTF-8 binary encoding. The maximum size is limited by the size of the primary key (1024 bytes as a range part of a key or 2048 bytes as a single part hash key) or the item size (64k).',
                                        'type' => 'string',
                                    ),
                                    'N' => array(
                                        'description' => 'Numbers are positive or negative exact-value decimals and integers. A number can have up to 38 digits precision and can be between 10^-128 to 10^+126.',
                                        'type' => 'string',
                                    ),
                                    'B' => array(
                                        'description' => 'Binary attributes are sequences of unsigned bytes.',
                                        'type' => 'string',
                                        'filters' => array(
                                            'base64_encode',
                                        ),
                                    ),
                                    'SS' => array(
                                        'description' => 'A set of strings.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'NS' => array(
                                        'description' => 'A set of numbers.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'BS' => array(
                                        'description' => 'A set of binary attributes.',
                                        'type' => 'array',
                                        'items' => array(
                                            'type' => 'string',
                                            'filters' => array(
                                                'base64_encode',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Exists' => array(
                                'description' => 'Specify whether or not a value already exists for the attribute name-value pair.',
                                'type' => 'bool',
                                'filters' => array(
                                    'Aws\\Common\\Command\\Filters::booleanString',
                                ),
                            ),
                        ),
                    ),
                ),
                'ReturnValues' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'NONE',
                        'ALL_OLD',
                        'UPDATED_OLD',
                        'ALL_NEW',
                        'UPDATED_NEW',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when an expected value does not match what was found in the system.',
                    'class' => 'ConditionalCheckFailedException',
                ),
                array(
                    'reason' => 'This exception is thrown when the level of provisioned throughput defined for the table is exceeded.',
                    'class' => 'ProvisionedThroughputExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'array',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.content_type' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'DynamoDB_20111205.UpdateTable',
                ),
                'TableName' => array(
                    'required' => true,
                    'description' => 'The name of the table you want to update. Allowed characters are a-z, A-Z, 0-9, _ (underscore), - (hyphen) and . (period).',
                    'type' => 'string',
                    'location' => 'json',
                    'min' => 3,
                    'max' => 255,
                ),
                'ProvisionedThroughput' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'ReadCapacityUnits' => array(
                            'required' => true,
                            'description' => 'ReadCapacityUnits are in terms of strictly consistent reads, assuming items of 1k. 2k items require twice the ReadCapacityUnits. Eventually-consistent reads only require half the ReadCapacityUnits of stirctly consistent reads.',
                            'min' => 1,
                        ),
                        'WriteCapacityUnits' => array(
                            'required' => true,
                            'description' => 'WriteCapacityUnits are in terms of strictly consistent reads, assuming items of 1k. 2k items require twice the WriteCapacityUnits.',
                            'min' => 1,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'This exception is thrown when the resource which is being attempted to be changed is in use.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'This exception is thrown when the subscriber exceeded the limits on the number of objects or operations.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'This exception is thrown when the service has a problem when trying to process the request.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
    ),
);
