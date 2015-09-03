<?php

return array (
    'apiVersion' => '2015-07-09',
    'endpointPrefix' => 'codepipeline',
    'serviceFullName' => 'AWS CodePipeline',
    'serviceAbbreviation' => 'CodePipeline',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'CodePipeline_20150709.',
    'signatureVersion' => 'v4',
    'namespace' => 'CodePipeline',
    'operations' => array(
        'AcknowledgeJob' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'AcknowledgeJobOutput',
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
                    'default' => 'CodePipeline_20150709.AcknowledgeJob',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'nonce' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified nonce was specified in an invalid format.',
                    'class' => 'InvalidNonceException',
                ),
                array(
                    'reason' => 'The specified job was specified in an invalid format or cannot be found.',
                    'class' => 'JobNotFoundException',
                ),
            ),
        ),
        'AcknowledgeThirdPartyJob' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'AcknowledgeThirdPartyJobOutput',
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
                    'default' => 'CodePipeline_20150709.AcknowledgeThirdPartyJob',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'nonce' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'clientToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified nonce was specified in an invalid format.',
                    'class' => 'InvalidNonceException',
                ),
                array(
                    'reason' => 'The specified job was specified in an invalid format or cannot be found.',
                    'class' => 'JobNotFoundException',
                ),
                array(
                    'reason' => 'The client token was specified in an invalid format',
                    'class' => 'InvalidClientTokenException',
                ),
            ),
        ),
        'CreateCustomActionType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateCustomActionTypeOutput',
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
                    'default' => 'CodePipeline_20150709.CreateCustomActionType',
                ),
                'category' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'provider' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 25,
                ),
                'version' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 9,
                ),
                'settings' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'thirdPartyConfigurationUrl' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 2048,
                        ),
                        'entityUrlTemplate' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 2048,
                        ),
                        'executionUrlTemplate' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 2048,
                        ),
                        'revisionUrlTemplate' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 2048,
                        ),
                    ),
                ),
                'configurationProperties' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'ActionConfigurationProperty',
                        'type' => 'object',
                        'properties' => array(
                            '' => array(
                                'required' => true,
                                'type' => 'object',
                            ),
                        ),
                    ),
                ),
                'inputArtifactDetails' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'minimumCount' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'maximum' => 5,
                        ),
                        'maximumCount' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'maximum' => 5,
                        ),
                    ),
                ),
                'outputArtifactDetails' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'minimumCount' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'maximum' => 5,
                        ),
                        'maximumCount' => array(
                            'required' => true,
                            'type' => 'numeric',
                            'maximum' => 5,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The number of pipelines associated with the AWS account has exceeded the limit allowed for the account.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'CreatePipeline' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreatePipelineOutput',
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
                    'default' => 'CodePipeline_20150709.CreatePipeline',
                ),
                'pipeline' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 100,
                        ),
                        'roleArn' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'artifactStore' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                '' => array(
                                    'type' => 'object',
                                    'location' => array(
                                        'shape_name' => 'ArtifactStoreLocation',
                                        'type' => 'string',
                                        'min_length' => 3,
                                        'max_length' => 63,
                                        'pattern' => '[a-zA-Z0-9\\-\\.]+',
                                        'documentation' => '
                <p>The location for storing the artifacts for a pipeline, such as an S3 bucket or folder.</p>
        ',
                                        'required' => true,
                                    ),
                                ),
                            ),
                        ),
                        'stages' => array(
                            'required' => true,
                            'type' => 'array',
                            'items' => array(
                                'name' => 'StageDeclaration',
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 100,
                                    ),
                                    'blockers' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BlockerDeclaration',
                                            'type' => 'object',
                                            'properties' => array(
                                                '' => array(
                                                    'type' => 'object',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'actions' => array(
                                        'required' => true,
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'ActionDeclaration',
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'required' => true,
                                                    'type' => 'string',
                                                    'minLength' => 1,
                                                    'maxLength' => 100,
                                                ),
                                                'actionTypeId' => array(
                                                    'required' => true,
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'category' => array(
                                                            'required' => true,
                                                            'type' => 'string',
                                                        ),
                                                        'owner' => array(
                                                            'required' => true,
                                                            'type' => 'string',
                                                        ),
                                                        'provider' => array(
                                                            'required' => true,
                                                            'type' => 'string',
                                                            'minLength' => 1,
                                                            'maxLength' => 25,
                                                        ),
                                                        'version' => array(
                                                            'required' => true,
                                                            'type' => 'string',
                                                            'minLength' => 1,
                                                            'maxLength' => 9,
                                                        ),
                                                    ),
                                                ),
                                                'runOrder' => array(
                                                    'type' => 'numeric',
                                                    'minimum' => 1,
                                                    'maximum' => 999,
                                                ),
                                                'configuration' => array(
                                                    'type' => 'object',
                                                    'additionalProperties' => array(
                                                        'type' => 'string',
                                                        'minLength' => 1,
                                                        'maxLength' => 250,
                                                        'data' => array(
                                                            'shape_name' => 'ActionConfigurationKey',
                                                        ),
                                                    ),
                                                ),
                                                'inputArtifacts' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'InputArtifact',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'name' => array(
                                                                'required' => true,
                                                                'type' => 'string',
                                                                'minLength' => 1,
                                                                'maxLength' => 100,
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'roleArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'version' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified pipeline name is already in use.',
                    'class' => 'PipelineNameInUseException',
                ),
                array(
                    'reason' => 'The specified stage declaration was specified in an invalid format.',
                    'class' => 'InvalidStageDeclarationException',
                ),
                array(
                    'reason' => 'The specified action declaration was specified in an invalid format.',
                    'class' => 'InvalidActionDeclarationException',
                ),
                array(
                    'reason' => 'The specified gate declaration was specified in an invalid format.',
                    'class' => 'InvalidBlockerDeclarationException',
                ),
                array(
                    'reason' => 'The specified structure was specified in an invalid format.',
                    'class' => 'InvalidStructureException',
                ),
                array(
                    'reason' => 'The number of pipelines associated with the AWS account has exceeded the limit allowed for the account.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'DeleteCustomActionType' => array(
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
                    'default' => 'CodePipeline_20150709.DeleteCustomActionType',
                ),
                'category' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'provider' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 25,
                ),
                'version' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 9,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'DeletePipeline' => array(
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
                    'default' => 'CodePipeline_20150709.DeletePipeline',
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'DisableStageTransition' => array(
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
                    'default' => 'CodePipeline_20150709.DisableStageTransition',
                ),
                'pipelineName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'stageName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'transitionType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'reason' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 300,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified pipeline was specified in an invalid format or cannot be found.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified stage was specified in an invalid format or cannot be found.',
                    'class' => 'StageNotFoundException',
                ),
            ),
        ),
        'EnableStageTransition' => array(
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
                    'default' => 'CodePipeline_20150709.EnableStageTransition',
                ),
                'pipelineName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'stageName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'transitionType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified pipeline was specified in an invalid format or cannot be found.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified stage was specified in an invalid format or cannot be found.',
                    'class' => 'StageNotFoundException',
                ),
            ),
        ),
        'GetJobDetails' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetJobDetailsOutput',
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
                    'default' => 'CodePipeline_20150709.GetJobDetails',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified job was specified in an invalid format or cannot be found.',
                    'class' => 'JobNotFoundException',
                ),
            ),
        ),
        'GetPipeline' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetPipelineOutput',
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
                    'default' => 'CodePipeline_20150709.GetPipeline',
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'version' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified pipeline was specified in an invalid format or cannot be found.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline version was specified in an invalid format or cannot be found.',
                    'class' => 'PipelineVersionNotFoundException',
                ),
            ),
        ),
        'GetPipelineState' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetPipelineStateOutput',
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
                    'default' => 'CodePipeline_20150709.GetPipelineState',
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified pipeline was specified in an invalid format or cannot be found.',
                    'class' => 'PipelineNotFoundException',
                ),
            ),
        ),
        'GetThirdPartyJobDetails' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetThirdPartyJobDetailsOutput',
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
                    'default' => 'CodePipeline_20150709.GetThirdPartyJobDetails',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'clientToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified job was specified in an invalid format or cannot be found.',
                    'class' => 'JobNotFoundException',
                ),
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The client token was specified in an invalid format',
                    'class' => 'InvalidClientTokenException',
                ),
                array(
                    'reason' => 'The specified job was specified in an invalid format or cannot be found.',
                    'class' => 'InvalidJobException',
                ),
            ),
        ),
        'ListActionTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListActionTypesOutput',
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
                    'default' => 'CodePipeline_20150709.ListActionTypes',
                ),
                'actionOwnerFilter' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The next token was specified in an invalid format. Make sure that the next token you provided is the token returned by a previous call.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'ListPipelines' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListPipelinesOutput',
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
                    'default' => 'CodePipeline_20150709.ListPipelines',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The next token was specified in an invalid format. Make sure that the next token you provided is the token returned by a previous call.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'PollForJobs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PollForJobsOutput',
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
                    'default' => 'CodePipeline_20150709.PollForJobs',
                ),
                'actionTypeId' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'category' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'owner' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'provider' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 25,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 9,
                        ),
                    ),
                ),
                'maxBatchSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
                'queryParam' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 20,
                        'data' => array(
                            'shape_name' => 'ActionConfigurationKey',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified action type cannot be found.',
                    'class' => 'ActionTypeNotFoundException',
                ),
            ),
        ),
        'PollForThirdPartyJobs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PollForThirdPartyJobsOutput',
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
                    'default' => 'CodePipeline_20150709.PollForThirdPartyJobs',
                ),
                'actionTypeId' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'category' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'owner' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'provider' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 25,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 9,
                        ),
                    ),
                ),
                'maxBatchSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified action type cannot be found.',
                    'class' => 'ActionTypeNotFoundException',
                ),
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'PutActionRevision' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PutActionRevisionOutput',
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
                    'default' => 'CodePipeline_20150709.PutActionRevision',
                ),
                'pipelineName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'stageName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'actionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
                'actionRevision' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'revisionId' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'revisionChangeId' => array(
                            'type' => 'string',
                        ),
                        'created' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'date-time',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified pipeline was specified in an invalid format or cannot be found.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified stage was specified in an invalid format or cannot be found.',
                    'class' => 'StageNotFoundException',
                ),
                array(
                    'reason' => 'The specified action cannot be found.',
                    'class' => 'ActionNotFoundException',
                ),
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
            ),
        ),
        'PutJobFailureResult' => array(
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
                    'default' => 'CodePipeline_20150709.PutJobFailureResult',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'failureDetails' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified job was specified in an invalid format or cannot be found.',
                    'class' => 'JobNotFoundException',
                ),
                array(
                    'reason' => 'The specified job state was specified in an invalid format.',
                    'class' => 'InvalidJobStateException',
                ),
            ),
        ),
        'PutJobSuccessResult' => array(
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
                    'default' => 'CodePipeline_20150709.PutJobSuccessResult',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'currentRevision' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'revision' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'changeIdentifier' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'continuationToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'executionDetails' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'summary' => array(
                            'type' => 'string',
                        ),
                        'externalExecutionId' => array(
                            'type' => 'string',
                        ),
                        'percentComplete' => array(
                            'type' => 'numeric',
                            'maximum' => 100,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified job was specified in an invalid format or cannot be found.',
                    'class' => 'JobNotFoundException',
                ),
                array(
                    'reason' => 'The specified job state was specified in an invalid format.',
                    'class' => 'InvalidJobStateException',
                ),
            ),
        ),
        'PutThirdPartyJobFailureResult' => array(
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
                    'default' => 'CodePipeline_20150709.PutThirdPartyJobFailureResult',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'clientToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'failureDetails' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        '' => array(
                            'type' => 'object',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified job was specified in an invalid format or cannot be found.',
                    'class' => 'JobNotFoundException',
                ),
                array(
                    'reason' => 'The specified job state was specified in an invalid format.',
                    'class' => 'InvalidJobStateException',
                ),
                array(
                    'reason' => 'The client token was specified in an invalid format',
                    'class' => 'InvalidClientTokenException',
                ),
            ),
        ),
        'PutThirdPartyJobSuccessResult' => array(
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
                    'default' => 'CodePipeline_20150709.PutThirdPartyJobSuccessResult',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'clientToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'currentRevision' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'revision' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'changeIdentifier' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'continuationToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'executionDetails' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'summary' => array(
                            'type' => 'string',
                        ),
                        'externalExecutionId' => array(
                            'type' => 'string',
                        ),
                        'percentComplete' => array(
                            'type' => 'numeric',
                            'maximum' => 100,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified job was specified in an invalid format or cannot be found.',
                    'class' => 'JobNotFoundException',
                ),
                array(
                    'reason' => 'The specified job state was specified in an invalid format.',
                    'class' => 'InvalidJobStateException',
                ),
                array(
                    'reason' => 'The client token was specified in an invalid format',
                    'class' => 'InvalidClientTokenException',
                ),
            ),
        ),
        'StartPipelineExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'StartPipelineExecutionOutput',
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
                    'default' => 'CodePipeline_20150709.StartPipelineExecution',
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified pipeline was specified in an invalid format or cannot be found.',
                    'class' => 'PipelineNotFoundException',
                ),
            ),
        ),
        'UpdatePipeline' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdatePipelineOutput',
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
                    'default' => 'CodePipeline_20150709.UpdatePipeline',
                ),
                'pipeline' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 100,
                        ),
                        'roleArn' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'artifactStore' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                '' => array(
                                    'type' => 'object',
                                    'location' => array(
                                        'shape_name' => 'ArtifactStoreLocation',
                                        'type' => 'string',
                                        'min_length' => 3,
                                        'max_length' => 63,
                                        'pattern' => '[a-zA-Z0-9\\-\\.]+',
                                        'documentation' => '
                <p>The location for storing the artifacts for a pipeline, such as an S3 bucket or folder.</p>
        ',
                                        'required' => true,
                                    ),
                                ),
                            ),
                        ),
                        'stages' => array(
                            'required' => true,
                            'type' => 'array',
                            'items' => array(
                                'name' => 'StageDeclaration',
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 100,
                                    ),
                                    'blockers' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BlockerDeclaration',
                                            'type' => 'object',
                                            'properties' => array(
                                                '' => array(
                                                    'type' => 'object',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'actions' => array(
                                        'required' => true,
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'ActionDeclaration',
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'required' => true,
                                                    'type' => 'string',
                                                    'minLength' => 1,
                                                    'maxLength' => 100,
                                                ),
                                                'actionTypeId' => array(
                                                    'required' => true,
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'category' => array(
                                                            'required' => true,
                                                            'type' => 'string',
                                                        ),
                                                        'owner' => array(
                                                            'required' => true,
                                                            'type' => 'string',
                                                        ),
                                                        'provider' => array(
                                                            'required' => true,
                                                            'type' => 'string',
                                                            'minLength' => 1,
                                                            'maxLength' => 25,
                                                        ),
                                                        'version' => array(
                                                            'required' => true,
                                                            'type' => 'string',
                                                            'minLength' => 1,
                                                            'maxLength' => 9,
                                                        ),
                                                    ),
                                                ),
                                                'runOrder' => array(
                                                    'type' => 'numeric',
                                                    'minimum' => 1,
                                                    'maximum' => 999,
                                                ),
                                                'configuration' => array(
                                                    'type' => 'object',
                                                    'additionalProperties' => array(
                                                        'type' => 'string',
                                                        'minLength' => 1,
                                                        'maxLength' => 250,
                                                        'data' => array(
                                                            'shape_name' => 'ActionConfigurationKey',
                                                        ),
                                                    ),
                                                ),
                                                'inputArtifacts' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'InputArtifact',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'name' => array(
                                                                'required' => true,
                                                                'type' => 'string',
                                                                'minLength' => 1,
                                                                'maxLength' => 100,
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'roleArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'version' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The validation was specified in an invalid format.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified stage declaration was specified in an invalid format.',
                    'class' => 'InvalidStageDeclarationException',
                ),
                array(
                    'reason' => 'The specified action declaration was specified in an invalid format.',
                    'class' => 'InvalidActionDeclarationException',
                ),
                array(
                    'reason' => 'The specified gate declaration was specified in an invalid format.',
                    'class' => 'InvalidBlockerDeclarationException',
                ),
                array(
                    'reason' => 'The specified structure was specified in an invalid format.',
                    'class' => 'InvalidStructureException',
                ),
            ),
        ),
    ),
    'models' => array(
        'AcknowledgeJobOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'AcknowledgeThirdPartyJobOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateCustomActionTypeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'actionType' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'id' => array(
                            'type' => 'object',
                            'properties' => array(
                                'category' => array(
                                    'type' => 'string',
                                ),
                                'owner' => array(
                                    'type' => 'string',
                                ),
                                'provider' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'settings' => array(
                            'type' => 'object',
                            'properties' => array(
                                'thirdPartyConfigurationUrl' => array(
                                    'type' => 'string',
                                ),
                                'entityUrlTemplate' => array(
                                    'type' => 'string',
                                ),
                                'executionUrlTemplate' => array(
                                    'type' => 'string',
                                ),
                                'revisionUrlTemplate' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'actionConfigurationProperties' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'ActionConfigurationProperty',
                                'type' => 'object',
                                'properties' => array(
                                    '' => array(
                                        'type' => 'object',
                                    ),
                                ),
                            ),
                        ),
                        'inputArtifactDetails' => array(
                            'type' => 'object',
                            'properties' => array(
                                'minimumCount' => array(
                                    'type' => 'numeric',
                                ),
                                'maximumCount' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'outputArtifactDetails' => array(
                            'type' => 'object',
                            'properties' => array(
                                'minimumCount' => array(
                                    'type' => 'numeric',
                                ),
                                'maximumCount' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreatePipelineOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipeline' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                        ),
                        'roleArn' => array(
                            'type' => 'string',
                        ),
                        'artifactStore' => array(
                            'type' => 'object',
                            'properties' => array(
                                '' => array(
                                    'type' => 'object',
                                    'location' => array(
                                        'shape_name' => 'ArtifactStoreLocation',
                                        'type' => 'string',
                                        'min_length' => 3,
                                        'max_length' => 63,
                                        'pattern' => '[a-zA-Z0-9\\-\\.]+',
                                        'documentation' => '
                <p>The location for storing the artifacts for a pipeline, such as an S3 bucket or folder.</p>
        ',
                                        'required' => true,
                                    ),
                                ),
                            ),
                        ),
                        'stages' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'StageDeclaration',
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'blockers' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BlockerDeclaration',
                                            'type' => 'object',
                                            'properties' => array(
                                                '' => array(
                                                    'type' => 'object',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'actions' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'ActionDeclaration',
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'actionTypeId' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'category' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'owner' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'provider' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'version' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                                'runOrder' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'configuration' => array(
                                                    'type' => 'object',
                                                    'additionalProperties' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                                'outputArtifacts' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'OutputArtifact',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'name' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'inputArtifacts' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'InputArtifact',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'name' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'roleArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'version' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'GetJobDetailsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'jobDetails' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'id' => array(
                            'type' => 'string',
                        ),
                        'data' => array(
                            'type' => 'object',
                            'properties' => array(
                                'actionTypeId' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'category' => array(
                                            'type' => 'string',
                                        ),
                                        'owner' => array(
                                            'type' => 'string',
                                        ),
                                        'provider' => array(
                                            'type' => 'string',
                                        ),
                                        'version' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'actionConfiguration' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'configuration' => array(
                                            'type' => 'object',
                                            'additionalProperties' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                                'pipelineContext' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'pipelineName' => array(
                                            'type' => 'string',
                                        ),
                                        'stage' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'action' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'inputArtifacts' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Artifact',
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'revision' => array(
                                                'type' => 'string',
                                            ),
                                            'location' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    '' => array(
                                                        'type' => 'object',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'outputArtifacts' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Artifact',
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'revision' => array(
                                                'type' => 'string',
                                            ),
                                            'location' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    '' => array(
                                                        'type' => 'object',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'artifactCredentials' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'accessKeyId' => array(
                                            'type' => 'string',
                                        ),
                                        'secretAccessKey' => array(
                                            'type' => 'string',
                                        ),
                                        'sessionToken' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'continuationToken' => array(
                                    'type' => 'string',
                                ),
                                'encryptionKey' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        '' => array(
                                            'type' => 'object',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'accountId' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'GetPipelineOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipeline' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                        ),
                        'roleArn' => array(
                            'type' => 'string',
                        ),
                        'artifactStore' => array(
                            'type' => 'object',
                            'properties' => array(
                                '' => array(
                                    'type' => 'object',
                                    'location' => array(
                                        'shape_name' => 'ArtifactStoreLocation',
                                        'type' => 'string',
                                        'min_length' => 3,
                                        'max_length' => 63,
                                        'pattern' => '[a-zA-Z0-9\\-\\.]+',
                                        'documentation' => '
                <p>The location for storing the artifacts for a pipeline, such as an S3 bucket or folder.</p>
        ',
                                        'required' => true,
                                    ),
                                ),
                            ),
                        ),
                        'stages' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'StageDeclaration',
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'blockers' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BlockerDeclaration',
                                            'type' => 'object',
                                            'properties' => array(
                                                '' => array(
                                                    'type' => 'object',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'actions' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'ActionDeclaration',
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'actionTypeId' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'category' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'owner' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'provider' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'version' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                                'runOrder' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'configuration' => array(
                                                    'type' => 'object',
                                                    'additionalProperties' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                                'outputArtifacts' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'OutputArtifact',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'name' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'inputArtifacts' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'InputArtifact',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'name' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'roleArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'version' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'GetPipelineStateOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipelineName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'pipelineVersion' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'stageStates' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'StageState',
                        'type' => 'object',
                        'properties' => array(
                            'stageName' => array(
                                'type' => 'string',
                            ),
                            'inboundTransitionState' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'enabled' => array(
                                        'type' => 'boolean',
                                    ),
                                    'lastChangedBy' => array(
                                        'type' => 'string',
                                    ),
                                    'lastChangedAt' => array(
                                        'type' => 'string',
                                    ),
                                    'disabledReason' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'actionStates' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ActionState',
                                    'type' => 'object',
                                    'properties' => array(
                                        'actionName' => array(
                                            'type' => 'string',
                                        ),
                                        'currentRevision' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'revisionId' => array(
                                                    'type' => 'string',
                                                ),
                                                'revisionChangeId' => array(
                                                    'type' => 'string',
                                                ),
                                                'created' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'latestExecution' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'status' => array(
                                                    'type' => 'string',
                                                ),
                                                'summary' => array(
                                                    'type' => 'string',
                                                ),
                                                'lastStatusChange' => array(
                                                    'type' => 'string',
                                                ),
                                                'externalExecutionId' => array(
                                                    'type' => 'string',
                                                ),
                                                'externalExecutionUrl' => array(
                                                    'type' => 'string',
                                                ),
                                                'percentComplete' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'errorDetails' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'code' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'message' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'entityUrl' => array(
                                            'type' => 'string',
                                        ),
                                        'revisionUrl' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'created' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'updated' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetThirdPartyJobDetailsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'jobDetails' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'id' => array(
                            'type' => 'string',
                        ),
                        'data' => array(
                            'type' => 'object',
                            'properties' => array(
                                'actionTypeId' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'category' => array(
                                            'type' => 'string',
                                        ),
                                        'owner' => array(
                                            'type' => 'string',
                                        ),
                                        'provider' => array(
                                            'type' => 'string',
                                        ),
                                        'version' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'actionConfiguration' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'configuration' => array(
                                            'type' => 'object',
                                            'additionalProperties' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                                'pipelineContext' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'pipelineName' => array(
                                            'type' => 'string',
                                        ),
                                        'stage' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                        'action' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'inputArtifacts' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Artifact',
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'revision' => array(
                                                'type' => 'string',
                                            ),
                                            'location' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    '' => array(
                                                        'type' => 'object',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'outputArtifacts' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Artifact',
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'revision' => array(
                                                'type' => 'string',
                                            ),
                                            'location' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    '' => array(
                                                        'type' => 'object',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'artifactCredentials' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'accessKeyId' => array(
                                            'type' => 'string',
                                        ),
                                        'secretAccessKey' => array(
                                            'type' => 'string',
                                        ),
                                        'sessionToken' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'continuationToken' => array(
                                    'type' => 'string',
                                ),
                                'encryptionKey' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        '' => array(
                                            'type' => 'object',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'nonce' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'ListActionTypesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'actionTypes' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ActionType',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'category' => array(
                                        'type' => 'string',
                                    ),
                                    'owner' => array(
                                        'type' => 'string',
                                    ),
                                    'provider' => array(
                                        'type' => 'string',
                                    ),
                                    'version' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'settings' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'thirdPartyConfigurationUrl' => array(
                                        'type' => 'string',
                                    ),
                                    'entityUrlTemplate' => array(
                                        'type' => 'string',
                                    ),
                                    'executionUrlTemplate' => array(
                                        'type' => 'string',
                                    ),
                                    'revisionUrlTemplate' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'actionConfigurationProperties' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ActionConfigurationProperty',
                                    'type' => 'object',
                                    'properties' => array(
                                        '' => array(
                                            'type' => 'object',
                                        ),
                                    ),
                                ),
                            ),
                            'inputArtifactDetails' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'minimumCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'maximumCount' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'outputArtifactDetails' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'minimumCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'maximumCount' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListPipelinesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipelines' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PipelineSummary',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'version' => array(
                                'type' => 'numeric',
                            ),
                            'created' => array(
                                'type' => 'string',
                            ),
                            'updated' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'PollForJobsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'jobs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Job',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'type' => 'string',
                            ),
                            'data' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'actionTypeId' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'category' => array(
                                                'type' => 'string',
                                            ),
                                            'owner' => array(
                                                'type' => 'string',
                                            ),
                                            'provider' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'actionConfiguration' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'configuration' => array(
                                                'type' => 'object',
                                                'additionalProperties' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'pipelineContext' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'pipelineName' => array(
                                                'type' => 'string',
                                            ),
                                            'stage' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'name' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'action' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'name' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'inputArtifacts' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Artifact',
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'revision' => array(
                                                    'type' => 'string',
                                                ),
                                                'location' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        '' => array(
                                                            'type' => 'object',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'outputArtifacts' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Artifact',
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'revision' => array(
                                                    'type' => 'string',
                                                ),
                                                'location' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        '' => array(
                                                            'type' => 'object',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'artifactCredentials' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'accessKeyId' => array(
                                                'type' => 'string',
                                            ),
                                            'secretAccessKey' => array(
                                                'type' => 'string',
                                            ),
                                            'sessionToken' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'continuationToken' => array(
                                        'type' => 'string',
                                    ),
                                    'encryptionKey' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            '' => array(
                                                'type' => 'object',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'nonce' => array(
                                'type' => 'string',
                            ),
                            'accountId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'PollForThirdPartyJobsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'jobs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ThirdPartyJob',
                        'type' => 'object',
                        'properties' => array(
                            'clientId' => array(
                                'type' => 'string',
                            ),
                            'jobId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'PutActionRevisionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'newRevision' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'pipelineExecutionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'StartPipelineExecutionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipelineExecutionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdatePipelineOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipeline' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                        ),
                        'roleArn' => array(
                            'type' => 'string',
                        ),
                        'artifactStore' => array(
                            'type' => 'object',
                            'properties' => array(
                                '' => array(
                                    'type' => 'object',
                                    'location' => array(
                                        'shape_name' => 'ArtifactStoreLocation',
                                        'type' => 'string',
                                        'min_length' => 3,
                                        'max_length' => 63,
                                        'pattern' => '[a-zA-Z0-9\\-\\.]+',
                                        'documentation' => '
                <p>The location for storing the artifacts for a pipeline, such as an S3 bucket or folder.</p>
        ',
                                        'required' => true,
                                    ),
                                ),
                            ),
                        ),
                        'stages' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'StageDeclaration',
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'blockers' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'BlockerDeclaration',
                                            'type' => 'object',
                                            'properties' => array(
                                                '' => array(
                                                    'type' => 'object',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'actions' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'ActionDeclaration',
                                            'type' => 'object',
                                            'properties' => array(
                                                'name' => array(
                                                    'type' => 'string',
                                                ),
                                                'actionTypeId' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'category' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'owner' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'provider' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'version' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                                'runOrder' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'configuration' => array(
                                                    'type' => 'object',
                                                    'additionalProperties' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                                'outputArtifacts' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'OutputArtifact',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'name' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'inputArtifacts' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'InputArtifact',
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'name' => array(
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'roleArn' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'version' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
