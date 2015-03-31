<?php

return array (
    'apiVersion' => '2014-12-12',
    'endpointPrefix' => 'machinelearning',
    'serviceFullName' => 'Amazon Machine Learning',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'AmazonML_20141212.',
    'signatureVersion' => 'v4',
    'namespace' => 'MachineLearning',
    'operations' => array(
        'CreateBatchPrediction' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateBatchPredictionOutput',
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
                    'default' => 'AmazonML_20141212.CreateBatchPrediction',
                ),
                'BatchPredictionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'BatchPredictionName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'MLModelId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'BatchPredictionDataSourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'OutputUri' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'A second request to use or change an object was not allowed. This can result from retrying a request using a parameter that was not present in the original request.',
                    'class' => 'IdempotentParameterMismatchException',
                ),
            ),
        ),
        'CreateDataSourceFromRDS' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDataSourceFromRDSOutput',
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
                    'default' => 'AmazonML_20141212.CreateDataSourceFromRDS',
                ),
                'DataSourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'DataSourceName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'RDSData' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'DatabaseInformation' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'InstanceIdentifier' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 63,
                                ),
                                'DatabaseName' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 64,
                                ),
                            ),
                        ),
                        'SelectSqlQuery' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 16777216,
                        ),
                        'DatabaseCredentials' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Username' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 128,
                                ),
                                'Password' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'minLength' => 8,
                                    'maxLength' => 128,
                                ),
                            ),
                        ),
                        'S3StagingLocation' => array(
                            'required' => true,
                            'type' => 'string',
                            'maxLength' => 2048,
                        ),
                        'DataRearrangement' => array(
                            'type' => 'string',
                        ),
                        'DataSchema' => array(
                            'type' => 'string',
                            'maxLength' => 131071,
                        ),
                        'DataSchemaUri' => array(
                            'type' => 'string',
                            'maxLength' => 2048,
                        ),
                        'ResourceRole' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                        'ServiceRole' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                        'SubnetId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 255,
                        ),
                        'SecurityGroupIds' => array(
                            'required' => true,
                            'type' => 'array',
                            'items' => array(
                                'name' => 'EDPSecurityGroupId',
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                        ),
                    ),
                ),
                'RoleARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'ComputeStatistics' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'A second request to use or change an object was not allowed. This can result from retrying a request using a parameter that was not present in the original request.',
                    'class' => 'IdempotentParameterMismatchException',
                ),
            ),
        ),
        'CreateDataSourceFromRedshift' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDataSourceFromRedshiftOutput',
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
                    'default' => 'AmazonML_20141212.CreateDataSourceFromRedshift',
                ),
                'DataSourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'DataSourceName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'DataSpec' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'DatabaseInformation' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'DatabaseName' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 64,
                                ),
                                'ClusterIdentifier' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 63,
                                ),
                            ),
                        ),
                        'SelectSqlQuery' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 16777216,
                        ),
                        'DatabaseCredentials' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Username' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 128,
                                ),
                                'Password' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'minLength' => 8,
                                    'maxLength' => 64,
                                ),
                            ),
                        ),
                        'S3StagingLocation' => array(
                            'required' => true,
                            'type' => 'string',
                            'maxLength' => 2048,
                        ),
                        'DataRearrangement' => array(
                            'type' => 'string',
                        ),
                        'DataSchema' => array(
                            'type' => 'string',
                            'maxLength' => 131071,
                        ),
                        'DataSchemaUri' => array(
                            'type' => 'string',
                            'maxLength' => 2048,
                        ),
                    ),
                ),
                'RoleARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'ComputeStatistics' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'A second request to use or change an object was not allowed. This can result from retrying a request using a parameter that was not present in the original request.',
                    'class' => 'IdempotentParameterMismatchException',
                ),
            ),
        ),
        'CreateDataSourceFromS3' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateDataSourceFromS3Output',
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
                    'default' => 'AmazonML_20141212.CreateDataSourceFromS3',
                ),
                'DataSourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'DataSourceName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'DataSpec' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'DataLocationS3' => array(
                            'required' => true,
                            'type' => 'string',
                            'maxLength' => 2048,
                        ),
                        'DataRearrangement' => array(
                            'type' => 'string',
                        ),
                        'DataSchema' => array(
                            'type' => 'string',
                            'maxLength' => 131071,
                        ),
                        'DataSchemaLocationS3' => array(
                            'type' => 'string',
                            'maxLength' => 2048,
                        ),
                    ),
                ),
                'ComputeStatistics' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'A second request to use or change an object was not allowed. This can result from retrying a request using a parameter that was not present in the original request.',
                    'class' => 'IdempotentParameterMismatchException',
                ),
            ),
        ),
        'CreateEvaluation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateEvaluationOutput',
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
                    'default' => 'AmazonML_20141212.CreateEvaluation',
                ),
                'EvaluationId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'EvaluationName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'MLModelId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'EvaluationDataSourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'A second request to use or change an object was not allowed. This can result from retrying a request using a parameter that was not present in the original request.',
                    'class' => 'IdempotentParameterMismatchException',
                ),
            ),
        ),
        'CreateMLModel' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateMLModelOutput',
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
                    'default' => 'AmazonML_20141212.CreateMLModel',
                ),
                'MLModelId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'MLModelName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'MLModelType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Parameters' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'StringType',
                        ),
                    ),
                ),
                'TrainingDataSourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Recipe' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 131071,
                ),
                'RecipeUri' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'A second request to use or change an object was not allowed. This can result from retrying a request using a parameter that was not present in the original request.',
                    'class' => 'IdempotentParameterMismatchException',
                ),
            ),
        ),
        'CreateRealtimeEndpoint' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateRealtimeEndpointOutput',
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
                    'default' => 'AmazonML_20141212.CreateRealtimeEndpoint',
                ),
                'MLModelId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'DeleteBatchPrediction' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteBatchPredictionOutput',
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
                    'default' => 'AmazonML_20141212.DeleteBatchPrediction',
                ),
                'BatchPredictionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'DeleteDataSource' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteDataSourceOutput',
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
                    'default' => 'AmazonML_20141212.DeleteDataSource',
                ),
                'DataSourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'DeleteEvaluation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteEvaluationOutput',
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
                    'default' => 'AmazonML_20141212.DeleteEvaluation',
                ),
                'EvaluationId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'DeleteMLModel' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteMLModelOutput',
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
                    'default' => 'AmazonML_20141212.DeleteMLModel',
                ),
                'MLModelId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'DeleteRealtimeEndpoint' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteRealtimeEndpointOutput',
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
                    'default' => 'AmazonML_20141212.DeleteRealtimeEndpoint',
                ),
                'MLModelId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'DescribeBatchPredictions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeBatchPredictionsOutput',
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
                    'default' => 'AmazonML_20141212.DescribeBatchPredictions',
                ),
                'FilterVariable' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EQ' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'GT' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'LT' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'GE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'LE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'NE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'SortOrder' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
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
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'DescribeDataSources' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeDataSourcesOutput',
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
                    'default' => 'AmazonML_20141212.DescribeDataSources',
                ),
                'FilterVariable' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EQ' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'GT' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'LT' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'GE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'LE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'NE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'SortOrder' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
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
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'DescribeEvaluations' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeEvaluationsOutput',
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
                    'default' => 'AmazonML_20141212.DescribeEvaluations',
                ),
                'FilterVariable' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EQ' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'GT' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'LT' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'GE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'LE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'NE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'SortOrder' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
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
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'DescribeMLModels' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeMLModelsOutput',
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
                    'default' => 'AmazonML_20141212.DescribeMLModels',
                ),
                'FilterVariable' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EQ' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'GT' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'LT' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'GE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'LE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'NE' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'Prefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'SortOrder' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
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
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'GetBatchPrediction' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetBatchPredictionOutput',
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
                    'default' => 'AmazonML_20141212.GetBatchPrediction',
                ),
                'BatchPredictionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'GetDataSource' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetDataSourceOutput',
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
                    'default' => 'AmazonML_20141212.GetDataSource',
                ),
                'DataSourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Verbose' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'GetEvaluation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetEvaluationOutput',
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
                    'default' => 'AmazonML_20141212.GetEvaluation',
                ),
                'EvaluationId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'GetMLModel' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetMLModelOutput',
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
                    'default' => 'AmazonML_20141212.GetMLModel',
                ),
                'MLModelId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Verbose' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'Predict' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PredictOutput',
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
                    'default' => 'AmazonML_20141212.Predict',
                ),
                'MLModelId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Record' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'maxLength' => 1024,
                        'data' => array(
                            'shape_name' => 'VariableName',
                        ),
                    ),
                ),
                'PredictEndpoint' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The subscriber exceeded the maximum number of operations. This exception can occur when listing objects such as DataSource.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'The exception is thrown when a predict request is made to an unmounted MLModel.',
                    'class' => 'PredictorNotMountedException',
                ),
            ),
        ),
        'UpdateBatchPrediction' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateBatchPredictionOutput',
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
                    'default' => 'AmazonML_20141212.UpdateBatchPrediction',
                ),
                'BatchPredictionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'BatchPredictionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'UpdateDataSource' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateDataSourceOutput',
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
                    'default' => 'AmazonML_20141212.UpdateDataSource',
                ),
                'DataSourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'DataSourceName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'UpdateEvaluation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateEvaluationOutput',
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
                    'default' => 'AmazonML_20141212.UpdateEvaluation',
                ),
                'EvaluationId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'EvaluationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
        'UpdateMLModel' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateMLModelOutput',
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
                    'default' => 'AmazonML_20141212.UpdateMLModel',
                ),
                'MLModelId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'MLModelName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'ScoreThreshold' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error on the client occurred. Typically, the cause is an invalid input value.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'A specified resource cannot be located.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'An error on the server occurred when trying to process a request.',
                    'class' => 'InternalServerException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CreateBatchPredictionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'BatchPredictionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateDataSourceFromRDSOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DataSourceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateDataSourceFromRedshiftOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DataSourceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateDataSourceFromS3Output' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DataSourceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateEvaluationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EvaluationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateMLModelOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MLModelId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateRealtimeEndpointOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MLModelId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RealtimeEndpointInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'PeakRequestsPerSecond' => array(
                            'type' => 'numeric',
                        ),
                        'CreatedAt' => array(
                            'type' => 'string',
                        ),
                        'EndpointUrl' => array(
                            'type' => 'string',
                        ),
                        'EndpointStatus' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DeleteBatchPredictionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'BatchPredictionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteDataSourceOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DataSourceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteEvaluationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EvaluationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteMLModelOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MLModelId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteRealtimeEndpointOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MLModelId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RealtimeEndpointInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'PeakRequestsPerSecond' => array(
                            'type' => 'numeric',
                        ),
                        'CreatedAt' => array(
                            'type' => 'string',
                        ),
                        'EndpointUrl' => array(
                            'type' => 'string',
                        ),
                        'EndpointStatus' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeBatchPredictionsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Results' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'BatchPrediction',
                        'type' => 'object',
                        'properties' => array(
                            'BatchPredictionId' => array(
                                'type' => 'string',
                            ),
                            'MLModelId' => array(
                                'type' => 'string',
                            ),
                            'BatchPredictionDataSourceId' => array(
                                'type' => 'string',
                            ),
                            'InputDataLocationS3' => array(
                                'type' => 'string',
                            ),
                            'CreatedByIamUser' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'LastUpdatedAt' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'OutputUri' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
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
        'DescribeDataSourcesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Results' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DataSource',
                        'type' => 'object',
                        'properties' => array(
                            'DataSourceId' => array(
                                'type' => 'string',
                            ),
                            'DataLocationS3' => array(
                                'type' => 'string',
                            ),
                            'DataRearrangement' => array(
                                'type' => 'string',
                            ),
                            'CreatedByIamUser' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'LastUpdatedAt' => array(
                                'type' => 'string',
                            ),
                            'DataSizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'NumberOfFiles' => array(
                                'type' => 'numeric',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                            'RedshiftMetadata' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'RedshiftDatabase' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DatabaseName' => array(
                                                'type' => 'string',
                                            ),
                                            'ClusterIdentifier' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'DatabaseUserName' => array(
                                        'type' => 'string',
                                    ),
                                    'SelectSqlQuery' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'RDSMetadata' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Database' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'InstanceIdentifier' => array(
                                                'type' => 'string',
                                            ),
                                            'DatabaseName' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'DatabaseUserName' => array(
                                        'type' => 'string',
                                    ),
                                    'SelectSqlQuery' => array(
                                        'type' => 'string',
                                    ),
                                    'ResourceRole' => array(
                                        'type' => 'string',
                                    ),
                                    'ServiceRole' => array(
                                        'type' => 'string',
                                    ),
                                    'DataPipelineId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'RoleARN' => array(
                                'type' => 'string',
                            ),
                            'ComputeStatistics' => array(
                                'type' => 'boolean',
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
        'DescribeEvaluationsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Results' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Evaluation',
                        'type' => 'object',
                        'properties' => array(
                            'EvaluationId' => array(
                                'type' => 'string',
                            ),
                            'MLModelId' => array(
                                'type' => 'string',
                            ),
                            'EvaluationDataSourceId' => array(
                                'type' => 'string',
                            ),
                            'InputDataLocationS3' => array(
                                'type' => 'string',
                            ),
                            'CreatedByIamUser' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'LastUpdatedAt' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'PerformanceMetrics' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Properties' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'Message' => array(
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
        'DescribeMLModelsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Results' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'MLModel',
                        'type' => 'object',
                        'properties' => array(
                            'MLModelId' => array(
                                'type' => 'string',
                            ),
                            'TrainingDataSourceId' => array(
                                'type' => 'string',
                            ),
                            'CreatedByIamUser' => array(
                                'type' => 'string',
                            ),
                            'CreatedAt' => array(
                                'type' => 'string',
                            ),
                            'LastUpdatedAt' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'SizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'EndpointInfo' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'PeakRequestsPerSecond' => array(
                                        'type' => 'numeric',
                                    ),
                                    'CreatedAt' => array(
                                        'type' => 'string',
                                    ),
                                    'EndpointUrl' => array(
                                        'type' => 'string',
                                    ),
                                    'EndpointStatus' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'TrainingParameters' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'InputDataLocationS3' => array(
                                'type' => 'string',
                            ),
                            'Algorithm' => array(
                                'type' => 'string',
                            ),
                            'MLModelType' => array(
                                'type' => 'string',
                            ),
                            'ScoreThreshold' => array(
                                'type' => 'numeric',
                            ),
                            'ScoreThresholdLastUpdatedAt' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
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
        'GetBatchPredictionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'BatchPredictionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'MLModelId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'BatchPredictionDataSourceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InputDataLocationS3' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreatedByIamUser' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreatedAt' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastUpdatedAt' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'OutputUri' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LogUri' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Message' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetDataSourceOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DataSourceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DataLocationS3' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DataRearrangement' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreatedByIamUser' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreatedAt' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastUpdatedAt' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DataSizeInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'NumberOfFiles' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LogUri' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Message' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RedshiftMetadata' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'RedshiftDatabase' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DatabaseName' => array(
                                    'type' => 'string',
                                ),
                                'ClusterIdentifier' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'DatabaseUserName' => array(
                            'type' => 'string',
                        ),
                        'SelectSqlQuery' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RDSMetadata' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Database' => array(
                            'type' => 'object',
                            'properties' => array(
                                'InstanceIdentifier' => array(
                                    'type' => 'string',
                                ),
                                'DatabaseName' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'DatabaseUserName' => array(
                            'type' => 'string',
                        ),
                        'SelectSqlQuery' => array(
                            'type' => 'string',
                        ),
                        'ResourceRole' => array(
                            'type' => 'string',
                        ),
                        'ServiceRole' => array(
                            'type' => 'string',
                        ),
                        'DataPipelineId' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RoleARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ComputeStatistics' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'DataSourceSchema' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetEvaluationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EvaluationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'MLModelId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EvaluationDataSourceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InputDataLocationS3' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreatedByIamUser' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreatedAt' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastUpdatedAt' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'PerformanceMetrics' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Properties' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'LogUri' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Message' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetMLModelOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MLModelId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'TrainingDataSourceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreatedByIamUser' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreatedAt' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastUpdatedAt' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Name' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SizeInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'EndpointInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'PeakRequestsPerSecond' => array(
                            'type' => 'numeric',
                        ),
                        'CreatedAt' => array(
                            'type' => 'string',
                        ),
                        'EndpointUrl' => array(
                            'type' => 'string',
                        ),
                        'EndpointStatus' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'TrainingParameters' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'InputDataLocationS3' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'MLModelType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ScoreThreshold' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'ScoreThresholdLastUpdatedAt' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LogUri' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Message' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Recipe' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Schema' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'PredictOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Prediction' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'predictedLabel' => array(
                            'type' => 'string',
                        ),
                        'predictedValue' => array(
                            'type' => 'numeric',
                        ),
                        'predictedScores' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'numeric',
                            ),
                        ),
                        'details' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UpdateBatchPredictionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'BatchPredictionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateDataSourceOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DataSourceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateEvaluationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'EvaluationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateMLModelOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MLModelId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'DescribeBatchPredictions' => array(
            'limit_key' => 'Limit',
            'output_token' => 'NextToken',
            'input_token' => 'NextToken',
            'result_key' => 'Results',
        ),
        'DescribeDataSources' => array(
            'limit_key' => 'Limit',
            'output_token' => 'NextToken',
            'input_token' => 'NextToken',
            'result_key' => 'Results',
        ),
        'DescribeEvaluations' => array(
            'limit_key' => 'Limit',
            'output_token' => 'NextToken',
            'input_token' => 'NextToken',
            'result_key' => 'Results',
        ),
        'DescribeMLModels' => array(
            'limit_key' => 'Limit',
            'output_token' => 'NextToken',
            'input_token' => 'NextToken',
            'result_key' => 'Results',
        ),
    ),
);
