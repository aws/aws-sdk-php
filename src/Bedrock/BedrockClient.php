<?php
namespace Aws\Bedrock;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Bedrock** service.
 * @method \Aws\Result batchDeleteAdvancedPromptOptimizationJob(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteAdvancedPromptOptimizationJob(array{jobIdentifiers?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteAdvancedPromptOptimizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteAdvancedPromptOptimizationJobAsync(array{jobIdentifiers?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDeleteEvaluationJob(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteEvaluationJob(array{jobIdentifiers?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteEvaluationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteEvaluationJobAsync(array{jobIdentifiers?: list<string>, ...} $args = [])
 * @method \Aws\Result cancelAutomatedReasoningPolicyBuildWorkflow(array $args = [])
 * @phpstan-method \Aws\Result cancelAutomatedReasoningPolicyBuildWorkflow(array{policyArn?: string, buildWorkflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelAutomatedReasoningPolicyBuildWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelAutomatedReasoningPolicyBuildWorkflowAsync(array{policyArn?: string, buildWorkflowId?: string, ...} $args = [])
 * @method \Aws\Result createAdvancedPromptOptimizationJob(array $args = [])
 * @phpstan-method \Aws\Result createAdvancedPromptOptimizationJob(array{
 *     jobName?: string,
 *     jobDescription?: string,
 *     clientToken?: string,
 *     inputConfig?: array{s3Uri?: string, ...},
 *     outputConfig?: array{s3Uri?: string, ...},
 *     encryptionKeyArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     modelConfigurations?: list<array{modelId?: string, inferenceConfig?: array, additionalModelRequestFields?: array<string, array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAdvancedPromptOptimizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAdvancedPromptOptimizationJobAsync(array{
 *     jobName?: string,
 *     jobDescription?: string,
 *     clientToken?: string,
 *     inputConfig?: array{s3Uri?: string, ...},
 *     outputConfig?: array{s3Uri?: string, ...},
 *     encryptionKeyArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     modelConfigurations?: list<array{modelId?: string, inferenceConfig?: array, additionalModelRequestFields?: array<string, array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAutomatedReasoningPolicy(array $args = [])
 * @phpstan-method \Aws\Result createAutomatedReasoningPolicy(array{
 *     name?: string,
 *     description?: string,
 *     clientRequestToken?: string,
 *     policyDefinition?: array{version?: string, types?: list<array>, rules?: list<array>, variables?: list<array>, ...},
 *     kmsKeyId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutomatedReasoningPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutomatedReasoningPolicyAsync(array{
 *     name?: string,
 *     description?: string,
 *     clientRequestToken?: string,
 *     policyDefinition?: array{version?: string, types?: list<array>, rules?: list<array>, variables?: list<array>, ...},
 *     kmsKeyId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAutomatedReasoningPolicyTestCase(array $args = [])
 * @phpstan-method \Aws\Result createAutomatedReasoningPolicyTestCase(array{
 *     policyArn?: string,
 *     guardContent?: string,
 *     queryContent?: string,
 *     expectedAggregatedFindingsResult?: 'IMPOSSIBLE'|'INVALID'|'NO_TRANSLATION'|'SATISFIABLE'|'TOO_COMPLEX'|'TRANSLATION_AMBIGUOUS'|'VALID',
 *     clientRequestToken?: string,
 *     confidenceThreshold?: float,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutomatedReasoningPolicyTestCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutomatedReasoningPolicyTestCaseAsync(array{
 *     policyArn?: string,
 *     guardContent?: string,
 *     queryContent?: string,
 *     expectedAggregatedFindingsResult?: 'IMPOSSIBLE'|'INVALID'|'NO_TRANSLATION'|'SATISFIABLE'|'TOO_COMPLEX'|'TRANSLATION_AMBIGUOUS'|'VALID',
 *     clientRequestToken?: string,
 *     confidenceThreshold?: float,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAutomatedReasoningPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result createAutomatedReasoningPolicyVersion(array{
 *     policyArn?: string,
 *     clientRequestToken?: string,
 *     lastUpdatedDefinitionHash?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutomatedReasoningPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutomatedReasoningPolicyVersionAsync(array{
 *     policyArn?: string,
 *     clientRequestToken?: string,
 *     lastUpdatedDefinitionHash?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomModel(array $args = [])
 * @phpstan-method \Aws\Result createCustomModel(array{
 *     modelName?: string,
 *     modelSourceConfig?: array{s3DataSource?: array{s3Uri?: string, ...}, ...},
 *     customModelDataSource?: array{modelPackageArnDataSource?: array{modelPackageArn?: string, ...}, ...},
 *     modelKmsKeyArn?: string,
 *     roleArn?: string,
 *     modelTags?: list<array{key?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomModelAsync(array{
 *     modelName?: string,
 *     modelSourceConfig?: array{s3DataSource?: array{s3Uri?: string, ...}, ...},
 *     customModelDataSource?: array{modelPackageArnDataSource?: array{modelPackageArn?: string, ...}, ...},
 *     modelKmsKeyArn?: string,
 *     roleArn?: string,
 *     modelTags?: list<array{key?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomModelDeployment(array $args = [])
 * @phpstan-method \Aws\Result createCustomModelDeployment(array{
 *     modelDeploymentName?: string,
 *     modelArn?: string,
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomModelDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomModelDeploymentAsync(array{
 *     modelDeploymentName?: string,
 *     modelArn?: string,
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEvaluationJob(array $args = [])
 * @phpstan-method \Aws\Result createEvaluationJob(array{
 *     jobName?: string,
 *     jobDescription?: string,
 *     clientRequestToken?: string,
 *     roleArn?: string,
 *     customerEncryptionKeyId?: string,
 *     jobTags?: list<array{key?: string, value?: string, ...}>,
 *     applicationType?: 'ModelEvaluation'|'RagEvaluation',
 *     evaluationConfig?: array{
 *         automated?: array{datasetMetricConfigs?: list<array>, evaluatorModelConfig?: array, customMetricConfig?: array, ...},
 *         human?: array{humanWorkflowConfig?: array, customMetrics?: list<array>, datasetMetricConfigs?: list<array>, ...},
 *         ...,
 *     },
 *     inferenceConfig?: array{models?: list<array>, ragConfigs?: list<array>, ...},
 *     outputDataConfig?: array{s3Uri?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEvaluationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEvaluationJobAsync(array{
 *     jobName?: string,
 *     jobDescription?: string,
 *     clientRequestToken?: string,
 *     roleArn?: string,
 *     customerEncryptionKeyId?: string,
 *     jobTags?: list<array{key?: string, value?: string, ...}>,
 *     applicationType?: 'ModelEvaluation'|'RagEvaluation',
 *     evaluationConfig?: array{
 *         automated?: array{datasetMetricConfigs?: list<array>, evaluatorModelConfig?: array, customMetricConfig?: array, ...},
 *         human?: array{humanWorkflowConfig?: array, customMetrics?: list<array>, datasetMetricConfigs?: list<array>, ...},
 *         ...,
 *     },
 *     inferenceConfig?: array{models?: list<array>, ragConfigs?: list<array>, ...},
 *     outputDataConfig?: array{s3Uri?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFoundationModelAgreement(array $args = [])
 * @phpstan-method \Aws\Result createFoundationModelAgreement(array{offerToken?: string, modelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createFoundationModelAgreementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFoundationModelAgreementAsync(array{offerToken?: string, modelId?: string, ...} $args = [])
 * @method \Aws\Result createGuardrail(array $args = [])
 * @phpstan-method \Aws\Result createGuardrail(array{
 *     name?: string,
 *     description?: string,
 *     topicPolicyConfig?: array{topicsConfig?: list<array>, tierConfig?: array{tierName?: 'CLASSIC'|'STANDARD', ...}, ...},
 *     contentPolicyConfig?: array{filtersConfig?: list<array>, tierConfig?: array{tierName?: 'CLASSIC'|'STANDARD', ...}, ...},
 *     wordPolicyConfig?: array{wordsConfig?: list<array>, managedWordListsConfig?: list<array>, ...},
 *     sensitiveInformationPolicyConfig?: array{piiEntitiesConfig?: list<array>, regexesConfig?: list<array>, ...},
 *     contextualGroundingPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     automatedReasoningPolicyConfig?: array{policies?: list<string>, confidenceThreshold?: float, ...},
 *     crossRegionConfig?: array{guardrailProfileIdentifier?: string, ...},
 *     blockedInputMessaging?: string,
 *     blockedOutputsMessaging?: string,
 *     kmsKeyId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGuardrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGuardrailAsync(array{
 *     name?: string,
 *     description?: string,
 *     topicPolicyConfig?: array{topicsConfig?: list<array>, tierConfig?: array{tierName?: 'CLASSIC'|'STANDARD', ...}, ...},
 *     contentPolicyConfig?: array{filtersConfig?: list<array>, tierConfig?: array{tierName?: 'CLASSIC'|'STANDARD', ...}, ...},
 *     wordPolicyConfig?: array{wordsConfig?: list<array>, managedWordListsConfig?: list<array>, ...},
 *     sensitiveInformationPolicyConfig?: array{piiEntitiesConfig?: list<array>, regexesConfig?: list<array>, ...},
 *     contextualGroundingPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     automatedReasoningPolicyConfig?: array{policies?: list<string>, confidenceThreshold?: float, ...},
 *     crossRegionConfig?: array{guardrailProfileIdentifier?: string, ...},
 *     blockedInputMessaging?: string,
 *     blockedOutputsMessaging?: string,
 *     kmsKeyId?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGuardrailVersion(array $args = [])
 * @phpstan-method \Aws\Result createGuardrailVersion(array{guardrailIdentifier?: string, description?: string, clientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGuardrailVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGuardrailVersionAsync(array{guardrailIdentifier?: string, description?: string, clientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createInferenceProfile(array $args = [])
 * @phpstan-method \Aws\Result createInferenceProfile(array{
 *     inferenceProfileName?: string,
 *     description?: string,
 *     clientRequestToken?: string,
 *     modelSource?: array{copyFrom?: string, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInferenceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInferenceProfileAsync(array{
 *     inferenceProfileName?: string,
 *     description?: string,
 *     clientRequestToken?: string,
 *     modelSource?: array{copyFrom?: string, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMarketplaceModelEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createMarketplaceModelEndpoint(array{
 *     modelSourceIdentifier?: string,
 *     endpointConfig?: array{
 *         sageMaker?: array{
 *             initialInstanceCount?: int,
 *             instanceType?: string,
 *             executionRole?: string,
 *             kmsEncryptionKey?: string,
 *             vpc?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     acceptEula?: bool,
 *     endpointName?: string,
 *     clientRequestToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMarketplaceModelEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMarketplaceModelEndpointAsync(array{
 *     modelSourceIdentifier?: string,
 *     endpointConfig?: array{
 *         sageMaker?: array{
 *             initialInstanceCount?: int,
 *             instanceType?: string,
 *             executionRole?: string,
 *             kmsEncryptionKey?: string,
 *             vpc?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     acceptEula?: bool,
 *     endpointName?: string,
 *     clientRequestToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelCopyJob(array $args = [])
 * @phpstan-method \Aws\Result createModelCopyJob(array{
 *     sourceModelArn?: string,
 *     targetModelName?: string,
 *     modelKmsKeyId?: string,
 *     targetModelTags?: list<array{key?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelCopyJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelCopyJobAsync(array{
 *     sourceModelArn?: string,
 *     targetModelName?: string,
 *     modelKmsKeyId?: string,
 *     targetModelTags?: list<array{key?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelCustomizationJob(array $args = [])
 * @phpstan-method \Aws\Result createModelCustomizationJob(array{
 *     jobName?: string,
 *     customModelName?: string,
 *     roleArn?: string,
 *     clientRequestToken?: string,
 *     baseModelIdentifier?: string,
 *     customizationType?: 'CONTINUED_PRE_TRAINING'|'DISTILLATION'|'FINE_TUNING'|'IMPORTED'|'REINFORCEMENT_FINE_TUNING',
 *     customModelKmsKeyId?: string,
 *     jobTags?: list<array{key?: string, value?: string, ...}>,
 *     customModelTags?: list<array{key?: string, value?: string, ...}>,
 *     trainingDataConfig?: array{
 *         s3Uri?: string,
 *         invocationLogsConfig?: array{usePromptResponse?: bool, invocationLogSource?: array, requestMetadataFilters?: array, ...},
 *         ...,
 *     },
 *     validationDataConfig?: array{validators?: list<array>, ...},
 *     outputDataConfig?: array{s3Uri?: string, ...},
 *     hyperParameters?: array<string, string>,
 *     vpcConfig?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     customizationConfig?: array{
 *         distillationConfig?: array{teacherModelConfig?: array, ...},
 *         rftConfig?: array{graderConfig?: array, hyperParameters?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelCustomizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelCustomizationJobAsync(array{
 *     jobName?: string,
 *     customModelName?: string,
 *     roleArn?: string,
 *     clientRequestToken?: string,
 *     baseModelIdentifier?: string,
 *     customizationType?: 'CONTINUED_PRE_TRAINING'|'DISTILLATION'|'FINE_TUNING'|'IMPORTED'|'REINFORCEMENT_FINE_TUNING',
 *     customModelKmsKeyId?: string,
 *     jobTags?: list<array{key?: string, value?: string, ...}>,
 *     customModelTags?: list<array{key?: string, value?: string, ...}>,
 *     trainingDataConfig?: array{
 *         s3Uri?: string,
 *         invocationLogsConfig?: array{usePromptResponse?: bool, invocationLogSource?: array, requestMetadataFilters?: array, ...},
 *         ...,
 *     },
 *     validationDataConfig?: array{validators?: list<array>, ...},
 *     outputDataConfig?: array{s3Uri?: string, ...},
 *     hyperParameters?: array<string, string>,
 *     vpcConfig?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     customizationConfig?: array{
 *         distillationConfig?: array{teacherModelConfig?: array, ...},
 *         rftConfig?: array{graderConfig?: array, hyperParameters?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelImportJob(array $args = [])
 * @phpstan-method \Aws\Result createModelImportJob(array{
 *     jobName?: string,
 *     importedModelName?: string,
 *     roleArn?: string,
 *     modelDataSource?: array{s3DataSource?: array{s3Uri?: string, ...}, ...},
 *     jobTags?: list<array{key?: string, value?: string, ...}>,
 *     importedModelTags?: list<array{key?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     vpcConfig?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     importedModelKmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelImportJobAsync(array{
 *     jobName?: string,
 *     importedModelName?: string,
 *     roleArn?: string,
 *     modelDataSource?: array{s3DataSource?: array{s3Uri?: string, ...}, ...},
 *     jobTags?: list<array{key?: string, value?: string, ...}>,
 *     importedModelTags?: list<array{key?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     vpcConfig?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     importedModelKmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelInvocationJob(array $args = [])
 * @phpstan-method \Aws\Result createModelInvocationJob(array{
 *     jobName?: string,
 *     roleArn?: string,
 *     clientRequestToken?: string,
 *     modelId?: string,
 *     inputDataConfig?: array{s3InputDataConfig?: array{s3InputFormat?: 'JSONL', s3Uri?: string, s3BucketOwner?: string, ...}, ...},
 *     outputDataConfig?: array{
 *         s3OutputDataConfig?: array{s3Uri?: string, s3EncryptionKeyId?: string, s3BucketOwner?: string, ...},
 *         ...,
 *     },
 *     vpcConfig?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     timeoutDurationInHours?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     modelInvocationType?: 'Converse'|'InvokeModel',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelInvocationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelInvocationJobAsync(array{
 *     jobName?: string,
 *     roleArn?: string,
 *     clientRequestToken?: string,
 *     modelId?: string,
 *     inputDataConfig?: array{s3InputDataConfig?: array{s3InputFormat?: 'JSONL', s3Uri?: string, s3BucketOwner?: string, ...}, ...},
 *     outputDataConfig?: array{
 *         s3OutputDataConfig?: array{s3Uri?: string, s3EncryptionKeyId?: string, s3BucketOwner?: string, ...},
 *         ...,
 *     },
 *     vpcConfig?: array{subnetIds?: list<string>, securityGroupIds?: list<string>, ...},
 *     timeoutDurationInHours?: int,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     modelInvocationType?: 'Converse'|'InvokeModel',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPromptRouter(array $args = [])
 * @phpstan-method \Aws\Result createPromptRouter(array{
 *     clientRequestToken?: string,
 *     promptRouterName?: string,
 *     models?: list<array{modelArn?: string, ...}>,
 *     description?: string,
 *     routingCriteria?: array{responseQualityDifference?: float, ...},
 *     fallbackModel?: array{modelArn?: string, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPromptRouterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPromptRouterAsync(array{
 *     clientRequestToken?: string,
 *     promptRouterName?: string,
 *     models?: list<array{modelArn?: string, ...}>,
 *     description?: string,
 *     routingCriteria?: array{responseQualityDifference?: float, ...},
 *     fallbackModel?: array{modelArn?: string, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProvisionedModelThroughput(array $args = [])
 * @phpstan-method \Aws\Result createProvisionedModelThroughput(array{
 *     clientRequestToken?: string,
 *     modelUnits?: int,
 *     provisionedModelName?: string,
 *     modelId?: string,
 *     commitmentDuration?: 'OneMonth'|'SixMonths',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProvisionedModelThroughputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProvisionedModelThroughputAsync(array{
 *     clientRequestToken?: string,
 *     modelUnits?: int,
 *     provisionedModelName?: string,
 *     modelId?: string,
 *     commitmentDuration?: 'OneMonth'|'SixMonths',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAutomatedReasoningPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAutomatedReasoningPolicy(array{policyArn?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutomatedReasoningPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutomatedReasoningPolicyAsync(array{policyArn?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result deleteAutomatedReasoningPolicyBuildWorkflow(array $args = [])
 * @phpstan-method \Aws\Result deleteAutomatedReasoningPolicyBuildWorkflow(array{policyArn?: string, buildWorkflowId?: string, lastUpdatedAt?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutomatedReasoningPolicyBuildWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutomatedReasoningPolicyBuildWorkflowAsync(array{policyArn?: string, buildWorkflowId?: string, lastUpdatedAt?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result deleteAutomatedReasoningPolicyTestCase(array $args = [])
 * @phpstan-method \Aws\Result deleteAutomatedReasoningPolicyTestCase(array{policyArn?: string, testCaseId?: string, lastUpdatedAt?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutomatedReasoningPolicyTestCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutomatedReasoningPolicyTestCaseAsync(array{policyArn?: string, testCaseId?: string, lastUpdatedAt?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result deleteCustomModel(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomModel(array{modelIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomModelAsync(array{modelIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomModelDeployment(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomModelDeployment(array{customModelDeploymentIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomModelDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomModelDeploymentAsync(array{customModelDeploymentIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEnforcedGuardrailConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteEnforcedGuardrailConfiguration(array{configId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnforcedGuardrailConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnforcedGuardrailConfigurationAsync(array{configId?: string, ...} $args = [])
 * @method \Aws\Result deleteFoundationModelAgreement(array $args = [])
 * @phpstan-method \Aws\Result deleteFoundationModelAgreement(array{modelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFoundationModelAgreementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFoundationModelAgreementAsync(array{modelId?: string, ...} $args = [])
 * @method \Aws\Result deleteGuardrail(array $args = [])
 * @phpstan-method \Aws\Result deleteGuardrail(array{guardrailIdentifier?: string, guardrailVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGuardrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGuardrailAsync(array{guardrailIdentifier?: string, guardrailVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteImportedModel(array $args = [])
 * @phpstan-method \Aws\Result deleteImportedModel(array{modelIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImportedModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImportedModelAsync(array{modelIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteInferenceProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteInferenceProfile(array{inferenceProfileIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInferenceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInferenceProfileAsync(array{inferenceProfileIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteMarketplaceModelEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteMarketplaceModelEndpoint(array{endpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMarketplaceModelEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMarketplaceModelEndpointAsync(array{endpointArn?: string, ...} $args = [])
 * @method \Aws\Result deleteModelInvocationLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteModelInvocationLoggingConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelInvocationLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelInvocationLoggingConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result deletePromptRouter(array $args = [])
 * @phpstan-method \Aws\Result deletePromptRouter(array{promptRouterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePromptRouterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePromptRouterAsync(array{promptRouterArn?: string, ...} $args = [])
 * @method \Aws\Result deleteProvisionedModelThroughput(array $args = [])
 * @phpstan-method \Aws\Result deleteProvisionedModelThroughput(array{provisionedModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProvisionedModelThroughputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProvisionedModelThroughputAsync(array{provisionedModelId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result deregisterMarketplaceModelEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deregisterMarketplaceModelEndpoint(array{endpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterMarketplaceModelEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterMarketplaceModelEndpointAsync(array{endpointArn?: string, ...} $args = [])
 * @method \Aws\Result exportAutomatedReasoningPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result exportAutomatedReasoningPolicyVersion(array{policyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportAutomatedReasoningPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportAutomatedReasoningPolicyVersionAsync(array{policyArn?: string, ...} $args = [])
 * @method \Aws\Result getAccountDataRetention(array $args = [])
 * @phpstan-method \Aws\Result getAccountDataRetention(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountDataRetentionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountDataRetentionAsync(array{...} $args = [])
 * @method \Aws\Result getAdvancedPromptOptimizationJob(array $args = [])
 * @phpstan-method \Aws\Result getAdvancedPromptOptimizationJob(array{jobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdvancedPromptOptimizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdvancedPromptOptimizationJobAsync(array{jobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getAutomatedReasoningPolicy(array $args = [])
 * @phpstan-method \Aws\Result getAutomatedReasoningPolicy(array{policyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyAsync(array{policyArn?: string, ...} $args = [])
 * @method \Aws\Result getAutomatedReasoningPolicyAnnotations(array $args = [])
 * @phpstan-method \Aws\Result getAutomatedReasoningPolicyAnnotations(array{policyArn?: string, buildWorkflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyAnnotationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyAnnotationsAsync(array{policyArn?: string, buildWorkflowId?: string, ...} $args = [])
 * @method \Aws\Result getAutomatedReasoningPolicyBuildWorkflow(array $args = [])
 * @phpstan-method \Aws\Result getAutomatedReasoningPolicyBuildWorkflow(array{policyArn?: string, buildWorkflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyBuildWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyBuildWorkflowAsync(array{policyArn?: string, buildWorkflowId?: string, ...} $args = [])
 * @method \Aws\Result getAutomatedReasoningPolicyBuildWorkflowResultAssets(array $args = [])
 * @phpstan-method \Aws\Result getAutomatedReasoningPolicyBuildWorkflowResultAssets(array{
 *     policyArn?: string,
 *     buildWorkflowId?: string,
 *     assetType?: 'ASSET_MANIFEST'|'BUILD_LOG'|'FIDELITY_REPORT'|'GENERATED_TEST_CASES'|'POLICY_DEFINITION'|'POLICY_SCENARIOS'|'QUALITY_REPORT'|'SOURCE_DOCUMENT',
 *     assetId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyBuildWorkflowResultAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyBuildWorkflowResultAssetsAsync(array{
 *     policyArn?: string,
 *     buildWorkflowId?: string,
 *     assetType?: 'ASSET_MANIFEST'|'BUILD_LOG'|'FIDELITY_REPORT'|'GENERATED_TEST_CASES'|'POLICY_DEFINITION'|'POLICY_SCENARIOS'|'QUALITY_REPORT'|'SOURCE_DOCUMENT',
 *     assetId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAutomatedReasoningPolicyNextScenario(array $args = [])
 * @phpstan-method \Aws\Result getAutomatedReasoningPolicyNextScenario(array{policyArn?: string, buildWorkflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyNextScenarioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyNextScenarioAsync(array{policyArn?: string, buildWorkflowId?: string, ...} $args = [])
 * @method \Aws\Result getAutomatedReasoningPolicyTestCase(array $args = [])
 * @phpstan-method \Aws\Result getAutomatedReasoningPolicyTestCase(array{policyArn?: string, testCaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyTestCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyTestCaseAsync(array{policyArn?: string, testCaseId?: string, ...} $args = [])
 * @method \Aws\Result getAutomatedReasoningPolicyTestResult(array $args = [])
 * @phpstan-method \Aws\Result getAutomatedReasoningPolicyTestResult(array{policyArn?: string, buildWorkflowId?: string, testCaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyTestResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomatedReasoningPolicyTestResultAsync(array{policyArn?: string, buildWorkflowId?: string, testCaseId?: string, ...} $args = [])
 * @method \Aws\Result getCustomModel(array $args = [])
 * @phpstan-method \Aws\Result getCustomModel(array{modelIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCustomModelAsync(array{modelIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCustomModelDeployment(array $args = [])
 * @phpstan-method \Aws\Result getCustomModelDeployment(array{customModelDeploymentIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomModelDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCustomModelDeploymentAsync(array{customModelDeploymentIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getEvaluationJob(array $args = [])
 * @phpstan-method \Aws\Result getEvaluationJob(array{jobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEvaluationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEvaluationJobAsync(array{jobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getFoundationModel(array $args = [])
 * @phpstan-method \Aws\Result getFoundationModel(array{modelIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFoundationModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFoundationModelAsync(array{modelIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getFoundationModelAvailability(array $args = [])
 * @phpstan-method \Aws\Result getFoundationModelAvailability(array{modelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFoundationModelAvailabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFoundationModelAvailabilityAsync(array{modelId?: string, ...} $args = [])
 * @method \Aws\Result getGuardrail(array $args = [])
 * @phpstan-method \Aws\Result getGuardrail(array{guardrailIdentifier?: string, guardrailVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGuardrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGuardrailAsync(array{guardrailIdentifier?: string, guardrailVersion?: string, ...} $args = [])
 * @method \Aws\Result getImportedModel(array $args = [])
 * @phpstan-method \Aws\Result getImportedModel(array{modelIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImportedModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImportedModelAsync(array{modelIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getInferenceProfile(array $args = [])
 * @phpstan-method \Aws\Result getInferenceProfile(array{inferenceProfileIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInferenceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInferenceProfileAsync(array{inferenceProfileIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getMarketplaceModelEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getMarketplaceModelEndpoint(array{endpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMarketplaceModelEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMarketplaceModelEndpointAsync(array{endpointArn?: string, ...} $args = [])
 * @method \Aws\Result getModelCopyJob(array $args = [])
 * @phpstan-method \Aws\Result getModelCopyJob(array{jobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelCopyJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelCopyJobAsync(array{jobArn?: string, ...} $args = [])
 * @method \Aws\Result getModelCustomizationJob(array $args = [])
 * @phpstan-method \Aws\Result getModelCustomizationJob(array{jobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelCustomizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelCustomizationJobAsync(array{jobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getModelImportJob(array $args = [])
 * @phpstan-method \Aws\Result getModelImportJob(array{jobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelImportJobAsync(array{jobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getModelInvocationJob(array $args = [])
 * @phpstan-method \Aws\Result getModelInvocationJob(array{jobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelInvocationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelInvocationJobAsync(array{jobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getModelInvocationLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getModelInvocationLoggingConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelInvocationLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelInvocationLoggingConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getPromptRouter(array $args = [])
 * @phpstan-method \Aws\Result getPromptRouter(array{promptRouterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPromptRouterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPromptRouterAsync(array{promptRouterArn?: string, ...} $args = [])
 * @method \Aws\Result getProvisionedModelThroughput(array $args = [])
 * @phpstan-method \Aws\Result getProvisionedModelThroughput(array{provisionedModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProvisionedModelThroughputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProvisionedModelThroughputAsync(array{provisionedModelId?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result getUseCaseForModelAccess(array $args = [])
 * @phpstan-method \Aws\Result getUseCaseForModelAccess(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUseCaseForModelAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUseCaseForModelAccessAsync(array{...} $args = [])
 * @method \Aws\Result listAdvancedPromptOptimizationJobs(array $args = [])
 * @phpstan-method \Aws\Result listAdvancedPromptOptimizationJobs(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAdvancedPromptOptimizationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAdvancedPromptOptimizationJobsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAutomatedReasoningPolicies(array $args = [])
 * @phpstan-method \Aws\Result listAutomatedReasoningPolicies(array{policyArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomatedReasoningPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomatedReasoningPoliciesAsync(array{policyArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAutomatedReasoningPolicyBuildWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listAutomatedReasoningPolicyBuildWorkflows(array{policyArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomatedReasoningPolicyBuildWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomatedReasoningPolicyBuildWorkflowsAsync(array{policyArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAutomatedReasoningPolicyTestCases(array $args = [])
 * @phpstan-method \Aws\Result listAutomatedReasoningPolicyTestCases(array{policyArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomatedReasoningPolicyTestCasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomatedReasoningPolicyTestCasesAsync(array{policyArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAutomatedReasoningPolicyTestResults(array $args = [])
 * @phpstan-method \Aws\Result listAutomatedReasoningPolicyTestResults(array{policyArn?: string, buildWorkflowId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomatedReasoningPolicyTestResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomatedReasoningPolicyTestResultsAsync(array{policyArn?: string, buildWorkflowId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCustomModelDeployments(array $args = [])
 * @phpstan-method \Aws\Result listCustomModelDeployments(array{
 *     createdBefore?: int|string|\DateTimeInterface,
 *     createdAfter?: int|string|\DateTimeInterface,
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     statusEquals?: 'Active'|'Creating'|'Failed',
 *     modelArnEquals?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomModelDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomModelDeploymentsAsync(array{
 *     createdBefore?: int|string|\DateTimeInterface,
 *     createdAfter?: int|string|\DateTimeInterface,
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     statusEquals?: 'Active'|'Creating'|'Failed',
 *     modelArnEquals?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCustomModels(array $args = [])
 * @phpstan-method \Aws\Result listCustomModels(array{
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     nameContains?: string,
 *     baseModelArnEquals?: string,
 *     foundationModelArnEquals?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     isOwned?: bool,
 *     modelStatus?: 'Active'|'Creating'|'Failed',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomModelsAsync(array{
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     nameContains?: string,
 *     baseModelArnEquals?: string,
 *     foundationModelArnEquals?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     isOwned?: bool,
 *     modelStatus?: 'Active'|'Creating'|'Failed',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnforcedGuardrailsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result listEnforcedGuardrailsConfiguration(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnforcedGuardrailsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnforcedGuardrailsConfigurationAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listEvaluationJobs(array $args = [])
 * @phpstan-method \Aws\Result listEvaluationJobs(array{
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Deleting'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     applicationTypeEquals?: 'ModelEvaluation'|'RagEvaluation',
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEvaluationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEvaluationJobsAsync(array{
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Deleting'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     applicationTypeEquals?: 'ModelEvaluation'|'RagEvaluation',
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFoundationModelAgreementOffers(array $args = [])
 * @phpstan-method \Aws\Result listFoundationModelAgreementOffers(array{modelId?: string, offerType?: 'ALL'|'PUBLIC', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFoundationModelAgreementOffersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFoundationModelAgreementOffersAsync(array{modelId?: string, offerType?: 'ALL'|'PUBLIC', ...} $args = [])
 * @method \Aws\Result listFoundationModels(array $args = [])
 * @phpstan-method \Aws\Result listFoundationModels(array{
 *     byProvider?: string,
 *     byCustomizationType?: 'CONTINUED_PRE_TRAINING'|'DISTILLATION'|'FINE_TUNING',
 *     byOutputModality?: 'EMBEDDING'|'IMAGE'|'TEXT',
 *     byInferenceType?: 'ON_DEMAND'|'PROVISIONED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFoundationModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFoundationModelsAsync(array{
 *     byProvider?: string,
 *     byCustomizationType?: 'CONTINUED_PRE_TRAINING'|'DISTILLATION'|'FINE_TUNING',
 *     byOutputModality?: 'EMBEDDING'|'IMAGE'|'TEXT',
 *     byInferenceType?: 'ON_DEMAND'|'PROVISIONED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGuardrails(array $args = [])
 * @phpstan-method \Aws\Result listGuardrails(array{guardrailIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGuardrailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGuardrailsAsync(array{guardrailIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listImportedModels(array $args = [])
 * @phpstan-method \Aws\Result listImportedModels(array{
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportedModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportedModelsAsync(array{
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInferenceProfiles(array $args = [])
 * @phpstan-method \Aws\Result listInferenceProfiles(array{maxResults?: int, nextToken?: string, typeEquals?: 'APPLICATION'|'SYSTEM_DEFINED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInferenceProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInferenceProfilesAsync(array{maxResults?: int, nextToken?: string, typeEquals?: 'APPLICATION'|'SYSTEM_DEFINED', ...} $args = [])
 * @method \Aws\Result listMarketplaceModelEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listMarketplaceModelEndpoints(array{maxResults?: int, nextToken?: string, modelSourceEquals?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMarketplaceModelEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMarketplaceModelEndpointsAsync(array{maxResults?: int, nextToken?: string, modelSourceEquals?: string, ...} $args = [])
 * @method \Aws\Result listModelCopyJobs(array $args = [])
 * @phpstan-method \Aws\Result listModelCopyJobs(array{
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Failed'|'InProgress',
 *     sourceAccountEquals?: string,
 *     sourceModelArnEquals?: string,
 *     targetModelNameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelCopyJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelCopyJobsAsync(array{
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Failed'|'InProgress',
 *     sourceAccountEquals?: string,
 *     sourceModelArnEquals?: string,
 *     targetModelNameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelCustomizationJobs(array $args = [])
 * @phpstan-method \Aws\Result listModelCustomizationJobs(array{
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelCustomizationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelCustomizationJobsAsync(array{
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listModelImportJobs(array{
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Failed'|'InProgress',
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelImportJobsAsync(array{
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Failed'|'InProgress',
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelInvocationJobs(array $args = [])
 * @phpstan-method \Aws\Result listModelInvocationJobs(array{
 *     submitTimeAfter?: int|string|\DateTimeInterface,
 *     submitTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Expired'|'Failed'|'InProgress'|'PartiallyCompleted'|'Scheduled'|'Stopped'|'Stopping'|'Submitted'|'Validating',
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelInvocationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelInvocationJobsAsync(array{
 *     submitTimeAfter?: int|string|\DateTimeInterface,
 *     submitTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Expired'|'Failed'|'InProgress'|'PartiallyCompleted'|'Scheduled'|'Stopped'|'Stopping'|'Submitted'|'Validating',
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPromptRouters(array $args = [])
 * @phpstan-method \Aws\Result listPromptRouters(array{maxResults?: int, nextToken?: string, type?: 'custom'|'default', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPromptRoutersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPromptRoutersAsync(array{maxResults?: int, nextToken?: string, type?: 'custom'|'default', ...} $args = [])
 * @method \Aws\Result listProvisionedModelThroughputs(array $args = [])
 * @phpstan-method \Aws\Result listProvisionedModelThroughputs(array{
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Creating'|'Failed'|'InService'|'Updating',
 *     modelArnEquals?: string,
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProvisionedModelThroughputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProvisionedModelThroughputsAsync(array{
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Creating'|'Failed'|'InService'|'Updating',
 *     modelArnEquals?: string,
 *     nameContains?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'CreationTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceARN?: string, ...} $args = [])
 * @method \Aws\Result putAccountDataRetention(array $args = [])
 * @phpstan-method \Aws\Result putAccountDataRetention(array{mode?: 'default'|'inherit'|'none'|'provider_data_share', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountDataRetentionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountDataRetentionAsync(array{mode?: 'default'|'inherit'|'none'|'provider_data_share', ...} $args = [])
 * @method \Aws\Result putEnforcedGuardrailConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putEnforcedGuardrailConfiguration(array{
 *     configId?: string,
 *     guardrailInferenceConfig?: array{
 *         guardrailIdentifier?: string,
 *         guardrailVersion?: string,
 *         selectiveContentGuarding?: array{system?: 'COMPREHENSIVE'|'SELECTIVE', messages?: 'COMPREHENSIVE'|'SELECTIVE', ...},
 *         modelEnforcement?: array{includedModels?: list<string>, excludedModels?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEnforcedGuardrailConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEnforcedGuardrailConfigurationAsync(array{
 *     configId?: string,
 *     guardrailInferenceConfig?: array{
 *         guardrailIdentifier?: string,
 *         guardrailVersion?: string,
 *         selectiveContentGuarding?: array{system?: 'COMPREHENSIVE'|'SELECTIVE', messages?: 'COMPREHENSIVE'|'SELECTIVE', ...},
 *         modelEnforcement?: array{includedModels?: list<string>, excludedModels?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putModelInvocationLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putModelInvocationLoggingConfiguration(array{
 *     loggingConfig?: array{
 *         cloudWatchConfig?: array{logGroupName?: string, roleArn?: string, largeDataDeliveryS3Config?: array, ...},
 *         s3Config?: array{bucketName?: string, keyPrefix?: string, ...},
 *         textDataDeliveryEnabled?: bool,
 *         imageDataDeliveryEnabled?: bool,
 *         embeddingDataDeliveryEnabled?: bool,
 *         videoDataDeliveryEnabled?: bool,
 *         audioDataDeliveryEnabled?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putModelInvocationLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putModelInvocationLoggingConfigurationAsync(array{
 *     loggingConfig?: array{
 *         cloudWatchConfig?: array{logGroupName?: string, roleArn?: string, largeDataDeliveryS3Config?: array, ...},
 *         s3Config?: array{bucketName?: string, keyPrefix?: string, ...},
 *         textDataDeliveryEnabled?: bool,
 *         imageDataDeliveryEnabled?: bool,
 *         embeddingDataDeliveryEnabled?: bool,
 *         videoDataDeliveryEnabled?: bool,
 *         audioDataDeliveryEnabled?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{resourceArn?: string, resourcePolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{resourceArn?: string, resourcePolicy?: string, ...} $args = [])
 * @method \Aws\Result putUseCaseForModelAccess(array $args = [])
 * @phpstan-method \Aws\Result putUseCaseForModelAccess(array{formData?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putUseCaseForModelAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putUseCaseForModelAccessAsync(array{formData?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \Aws\Result registerMarketplaceModelEndpoint(array $args = [])
 * @phpstan-method \Aws\Result registerMarketplaceModelEndpoint(array{endpointIdentifier?: string, modelSourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerMarketplaceModelEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerMarketplaceModelEndpointAsync(array{endpointIdentifier?: string, modelSourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result startAutomatedReasoningPolicyBuildWorkflow(array $args = [])
 * @phpstan-method \Aws\Result startAutomatedReasoningPolicyBuildWorkflow(array{
 *     policyArn?: string,
 *     buildWorkflowType?: 'GENERATE_FIDELITY_REPORT'|'GENERATE_POLICY_SCENARIOS'|'IMPORT_POLICY'|'INGEST_CONTENT'|'ITERATIVELY_REFINE_POLICY'|'REFINE_POLICY'|'RESOLVE_POLICY_AMBIGUITIES',
 *     clientRequestToken?: string,
 *     sourceContent?: array{
 *         policyDefinition?: array{version?: string, types?: list<array>, rules?: list<array>, variables?: list<array>, ...},
 *         workflowContent?: array{
 *             documents?: list<array>,
 *             policyRepairAssets?: array,
 *             generateFidelityReportContent?: array,
 *             iterativeRefinementContent?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAutomatedReasoningPolicyBuildWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAutomatedReasoningPolicyBuildWorkflowAsync(array{
 *     policyArn?: string,
 *     buildWorkflowType?: 'GENERATE_FIDELITY_REPORT'|'GENERATE_POLICY_SCENARIOS'|'IMPORT_POLICY'|'INGEST_CONTENT'|'ITERATIVELY_REFINE_POLICY'|'REFINE_POLICY'|'RESOLVE_POLICY_AMBIGUITIES',
 *     clientRequestToken?: string,
 *     sourceContent?: array{
 *         policyDefinition?: array{version?: string, types?: list<array>, rules?: list<array>, variables?: list<array>, ...},
 *         workflowContent?: array{
 *             documents?: list<array>,
 *             policyRepairAssets?: array,
 *             generateFidelityReportContent?: array,
 *             iterativeRefinementContent?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAutomatedReasoningPolicyTestWorkflow(array $args = [])
 * @phpstan-method \Aws\Result startAutomatedReasoningPolicyTestWorkflow(array{
 *     policyArn?: string,
 *     buildWorkflowId?: string,
 *     testCaseIds?: list<string>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAutomatedReasoningPolicyTestWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAutomatedReasoningPolicyTestWorkflowAsync(array{
 *     policyArn?: string,
 *     buildWorkflowId?: string,
 *     testCaseIds?: list<string>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopAdvancedPromptOptimizationJob(array $args = [])
 * @phpstan-method \Aws\Result stopAdvancedPromptOptimizationJob(array{jobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAdvancedPromptOptimizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAdvancedPromptOptimizationJobAsync(array{jobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result stopEvaluationJob(array $args = [])
 * @phpstan-method \Aws\Result stopEvaluationJob(array{jobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEvaluationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopEvaluationJobAsync(array{jobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result stopModelCustomizationJob(array $args = [])
 * @phpstan-method \Aws\Result stopModelCustomizationJob(array{jobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopModelCustomizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopModelCustomizationJobAsync(array{jobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result stopModelInvocationJob(array $args = [])
 * @phpstan-method \Aws\Result stopModelInvocationJob(array{jobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopModelInvocationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopModelInvocationJobAsync(array{jobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAutomatedReasoningPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateAutomatedReasoningPolicy(array{
 *     policyArn?: string,
 *     policyDefinition?: array{version?: string, types?: list<array>, rules?: list<array>, variables?: list<array>, ...},
 *     name?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutomatedReasoningPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutomatedReasoningPolicyAsync(array{
 *     policyArn?: string,
 *     policyDefinition?: array{version?: string, types?: list<array>, rules?: list<array>, variables?: list<array>, ...},
 *     name?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAutomatedReasoningPolicyAnnotations(array $args = [])
 * @phpstan-method \Aws\Result updateAutomatedReasoningPolicyAnnotations(array{
 *     policyArn?: string,
 *     buildWorkflowId?: string,
 *     annotations?: list<array{
 *         addType?: array,
 *         updateType?: array,
 *         deleteType?: array,
 *         addVariable?: array,
 *         updateVariable?: array,
 *         deleteVariable?: array,
 *         addRule?: array,
 *         updateRule?: array,
 *         deleteRule?: array,
 *         addRuleFromNaturalLanguage?: array,
 *         updateFromRulesFeedback?: array,
 *         updateFromScenarioFeedback?: array,
 *         ingestContent?: array,
 *         ...,
 *     }>,
 *     lastUpdatedAnnotationSetHash?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutomatedReasoningPolicyAnnotationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutomatedReasoningPolicyAnnotationsAsync(array{
 *     policyArn?: string,
 *     buildWorkflowId?: string,
 *     annotations?: list<array{
 *         addType?: array,
 *         updateType?: array,
 *         deleteType?: array,
 *         addVariable?: array,
 *         updateVariable?: array,
 *         deleteVariable?: array,
 *         addRule?: array,
 *         updateRule?: array,
 *         deleteRule?: array,
 *         addRuleFromNaturalLanguage?: array,
 *         updateFromRulesFeedback?: array,
 *         updateFromScenarioFeedback?: array,
 *         ingestContent?: array,
 *         ...,
 *     }>,
 *     lastUpdatedAnnotationSetHash?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAutomatedReasoningPolicyTestCase(array $args = [])
 * @phpstan-method \Aws\Result updateAutomatedReasoningPolicyTestCase(array{
 *     policyArn?: string,
 *     testCaseId?: string,
 *     guardContent?: string,
 *     queryContent?: string,
 *     lastUpdatedAt?: int|string|\DateTimeInterface,
 *     expectedAggregatedFindingsResult?: 'IMPOSSIBLE'|'INVALID'|'NO_TRANSLATION'|'SATISFIABLE'|'TOO_COMPLEX'|'TRANSLATION_AMBIGUOUS'|'VALID',
 *     confidenceThreshold?: float,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutomatedReasoningPolicyTestCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutomatedReasoningPolicyTestCaseAsync(array{
 *     policyArn?: string,
 *     testCaseId?: string,
 *     guardContent?: string,
 *     queryContent?: string,
 *     lastUpdatedAt?: int|string|\DateTimeInterface,
 *     expectedAggregatedFindingsResult?: 'IMPOSSIBLE'|'INVALID'|'NO_TRANSLATION'|'SATISFIABLE'|'TOO_COMPLEX'|'TRANSLATION_AMBIGUOUS'|'VALID',
 *     confidenceThreshold?: float,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCustomModelDeployment(array $args = [])
 * @phpstan-method \Aws\Result updateCustomModelDeployment(array{modelArn?: string, customModelDeploymentIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomModelDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomModelDeploymentAsync(array{modelArn?: string, customModelDeploymentIdentifier?: string, ...} $args = [])
 * @method \Aws\Result updateGuardrail(array $args = [])
 * @phpstan-method \Aws\Result updateGuardrail(array{
 *     guardrailIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     topicPolicyConfig?: array{topicsConfig?: list<array>, tierConfig?: array{tierName?: 'CLASSIC'|'STANDARD', ...}, ...},
 *     contentPolicyConfig?: array{filtersConfig?: list<array>, tierConfig?: array{tierName?: 'CLASSIC'|'STANDARD', ...}, ...},
 *     wordPolicyConfig?: array{wordsConfig?: list<array>, managedWordListsConfig?: list<array>, ...},
 *     sensitiveInformationPolicyConfig?: array{piiEntitiesConfig?: list<array>, regexesConfig?: list<array>, ...},
 *     contextualGroundingPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     automatedReasoningPolicyConfig?: array{policies?: list<string>, confidenceThreshold?: float, ...},
 *     crossRegionConfig?: array{guardrailProfileIdentifier?: string, ...},
 *     blockedInputMessaging?: string,
 *     blockedOutputsMessaging?: string,
 *     kmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGuardrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGuardrailAsync(array{
 *     guardrailIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     topicPolicyConfig?: array{topicsConfig?: list<array>, tierConfig?: array{tierName?: 'CLASSIC'|'STANDARD', ...}, ...},
 *     contentPolicyConfig?: array{filtersConfig?: list<array>, tierConfig?: array{tierName?: 'CLASSIC'|'STANDARD', ...}, ...},
 *     wordPolicyConfig?: array{wordsConfig?: list<array>, managedWordListsConfig?: list<array>, ...},
 *     sensitiveInformationPolicyConfig?: array{piiEntitiesConfig?: list<array>, regexesConfig?: list<array>, ...},
 *     contextualGroundingPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     automatedReasoningPolicyConfig?: array{policies?: list<string>, confidenceThreshold?: float, ...},
 *     crossRegionConfig?: array{guardrailProfileIdentifier?: string, ...},
 *     blockedInputMessaging?: string,
 *     blockedOutputsMessaging?: string,
 *     kmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMarketplaceModelEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateMarketplaceModelEndpoint(array{
 *     endpointArn?: string,
 *     endpointConfig?: array{
 *         sageMaker?: array{
 *             initialInstanceCount?: int,
 *             instanceType?: string,
 *             executionRole?: string,
 *             kmsEncryptionKey?: string,
 *             vpc?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMarketplaceModelEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMarketplaceModelEndpointAsync(array{
 *     endpointArn?: string,
 *     endpointConfig?: array{
 *         sageMaker?: array{
 *             initialInstanceCount?: int,
 *             instanceType?: string,
 *             executionRole?: string,
 *             kmsEncryptionKey?: string,
 *             vpc?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProvisionedModelThroughput(array $args = [])
 * @phpstan-method \Aws\Result updateProvisionedModelThroughput(array{provisionedModelId?: string, desiredProvisionedModelName?: string, desiredModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProvisionedModelThroughputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProvisionedModelThroughputAsync(array{provisionedModelId?: string, desiredProvisionedModelName?: string, desiredModelId?: string, ...} $args = [])
 */
class BedrockClient extends AwsClient {}
