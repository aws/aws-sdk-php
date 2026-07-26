<?php
namespace Aws\CodePipeline;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CodePipeline** service.
 *
 * @method \Aws\Result acknowledgeJob(array $args = [])
 * @phpstan-method \Aws\Result acknowledgeJob(array{jobId?: string, nonce?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acknowledgeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acknowledgeJobAsync(array{jobId?: string, nonce?: string, ...} $args = [])
 * @method \Aws\Result acknowledgeThirdPartyJob(array $args = [])
 * @phpstan-method \Aws\Result acknowledgeThirdPartyJob(array{jobId?: string, nonce?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acknowledgeThirdPartyJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acknowledgeThirdPartyJobAsync(array{jobId?: string, nonce?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createCustomActionType(array $args = [])
 * @phpstan-method \Aws\Result createCustomActionType(array{
 *     category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *     provider?: string,
 *     version?: string,
 *     settings?: array{
 *         thirdPartyConfigurationUrl?: string,
 *         entityUrlTemplate?: string,
 *         executionUrlTemplate?: string,
 *         revisionUrlTemplate?: string,
 *         ...,
 *     },
 *     configurationProperties?: list<array{
 *         name?: string,
 *         required?: bool,
 *         key?: bool,
 *         secret?: bool,
 *         queryable?: bool,
 *         description?: string,
 *         type?: 'Boolean'|'Number'|'String',
 *         ...,
 *     }>,
 *     inputArtifactDetails?: array{minimumCount?: int, maximumCount?: int, ...},
 *     outputArtifactDetails?: array{minimumCount?: int, maximumCount?: int, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomActionTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomActionTypeAsync(array{
 *     category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *     provider?: string,
 *     version?: string,
 *     settings?: array{
 *         thirdPartyConfigurationUrl?: string,
 *         entityUrlTemplate?: string,
 *         executionUrlTemplate?: string,
 *         revisionUrlTemplate?: string,
 *         ...,
 *     },
 *     configurationProperties?: list<array{
 *         name?: string,
 *         required?: bool,
 *         key?: bool,
 *         secret?: bool,
 *         queryable?: bool,
 *         description?: string,
 *         type?: 'Boolean'|'Number'|'String',
 *         ...,
 *     }>,
 *     inputArtifactDetails?: array{minimumCount?: int, maximumCount?: int, ...},
 *     outputArtifactDetails?: array{minimumCount?: int, maximumCount?: int, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPipeline(array $args = [])
 * @phpstan-method \Aws\Result createPipeline(array{
 *     pipeline?: array{
 *         name?: string,
 *         roleArn?: string,
 *         artifactStore?: array{type?: 'S3', location?: string, encryptionKey?: array, ...},
 *         artifactStores?: array<string, array>,
 *         stages?: list<array>,
 *         version?: int,
 *         executionMode?: 'PARALLEL'|'QUEUED'|'SUPERSEDED',
 *         pipelineType?: 'V1'|'V2',
 *         variables?: list<array>,
 *         triggers?: list<array>,
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPipelineAsync(array{
 *     pipeline?: array{
 *         name?: string,
 *         roleArn?: string,
 *         artifactStore?: array{type?: 'S3', location?: string, encryptionKey?: array, ...},
 *         artifactStores?: array<string, array>,
 *         stages?: list<array>,
 *         version?: int,
 *         executionMode?: 'PARALLEL'|'QUEUED'|'SUPERSEDED',
 *         pipelineType?: 'V1'|'V2',
 *         variables?: list<array>,
 *         triggers?: list<array>,
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCustomActionType(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomActionType(array{
 *     category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *     provider?: string,
 *     version?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomActionTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomActionTypeAsync(array{
 *     category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *     provider?: string,
 *     version?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePipeline(array $args = [])
 * @phpstan-method \Aws\Result deletePipeline(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePipelineAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteWebhook(array $args = [])
 * @phpstan-method \Aws\Result deleteWebhook(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebhookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebhookAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deregisterWebhookWithThirdParty(array $args = [])
 * @phpstan-method \Aws\Result deregisterWebhookWithThirdParty(array{webhookName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterWebhookWithThirdPartyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterWebhookWithThirdPartyAsync(array{webhookName?: string, ...} $args = [])
 * @method \Aws\Result disableStageTransition(array $args = [])
 * @phpstan-method \Aws\Result disableStageTransition(array{pipelineName?: string, stageName?: string, transitionType?: 'Inbound'|'Outbound', reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableStageTransitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableStageTransitionAsync(array{pipelineName?: string, stageName?: string, transitionType?: 'Inbound'|'Outbound', reason?: string, ...} $args = [])
 * @method \Aws\Result enableStageTransition(array $args = [])
 * @phpstan-method \Aws\Result enableStageTransition(array{pipelineName?: string, stageName?: string, transitionType?: 'Inbound'|'Outbound', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableStageTransitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableStageTransitionAsync(array{pipelineName?: string, stageName?: string, transitionType?: 'Inbound'|'Outbound', ...} $args = [])
 * @method \Aws\Result getActionType(array $args = [])
 * @phpstan-method \Aws\Result getActionType(array{
 *     category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *     owner?: string,
 *     provider?: string,
 *     version?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getActionTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getActionTypeAsync(array{
 *     category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *     owner?: string,
 *     provider?: string,
 *     version?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getJobDetails(array $args = [])
 * @phpstan-method \Aws\Result getJobDetails(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobDetailsAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result getPipeline(array $args = [])
 * @phpstan-method \Aws\Result getPipeline(array{name?: string, version?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPipelineAsync(array{name?: string, version?: int, ...} $args = [])
 * @method \Aws\Result getPipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result getPipelineExecution(array{pipelineName?: string, pipelineExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPipelineExecutionAsync(array{pipelineName?: string, pipelineExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getPipelineState(array $args = [])
 * @phpstan-method \Aws\Result getPipelineState(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPipelineStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPipelineStateAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getThirdPartyJobDetails(array $args = [])
 * @phpstan-method \Aws\Result getThirdPartyJobDetails(array{jobId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getThirdPartyJobDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getThirdPartyJobDetailsAsync(array{jobId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result listActionExecutions(array $args = [])
 * @phpstan-method \Aws\Result listActionExecutions(array{
 *     pipelineName?: string,
 *     filter?: array{
 *         pipelineExecutionId?: string,
 *         latestInPipelineExecution?: array{pipelineExecutionId?: string, startTimeRange?: 'All'|'Latest', ...},
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listActionExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActionExecutionsAsync(array{
 *     pipelineName?: string,
 *     filter?: array{
 *         pipelineExecutionId?: string,
 *         latestInPipelineExecution?: array{pipelineExecutionId?: string, startTimeRange?: 'All'|'Latest', ...},
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listActionTypes(array $args = [])
 * @phpstan-method \Aws\Result listActionTypes(array{actionOwnerFilter?: 'AWS'|'Custom'|'ThirdParty', nextToken?: string, regionFilter?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listActionTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActionTypesAsync(array{actionOwnerFilter?: 'AWS'|'Custom'|'ThirdParty', nextToken?: string, regionFilter?: string, ...} $args = [])
 * @method \Aws\Result listDeployActionExecutionTargets(array $args = [])
 * @phpstan-method \Aws\Result listDeployActionExecutionTargets(array{
 *     pipelineName?: string,
 *     actionExecutionId?: string,
 *     filters?: list<array{name?: 'TARGET_STATUS', values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeployActionExecutionTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeployActionExecutionTargetsAsync(array{
 *     pipelineName?: string,
 *     actionExecutionId?: string,
 *     filters?: list<array{name?: 'TARGET_STATUS', values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPipelineExecutions(array $args = [])
 * @phpstan-method \Aws\Result listPipelineExecutions(array{
 *     pipelineName?: string,
 *     maxResults?: int,
 *     filter?: array{succeededInStage?: array{stageName?: string, ...}, ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPipelineExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelineExecutionsAsync(array{
 *     pipelineName?: string,
 *     maxResults?: int,
 *     filter?: array{succeededInStage?: array{stageName?: string, ...}, ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPipelines(array $args = [])
 * @phpstan-method \Aws\Result listPipelines(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelinesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listRuleExecutions(array $args = [])
 * @phpstan-method \Aws\Result listRuleExecutions(array{
 *     pipelineName?: string,
 *     filter?: array{
 *         pipelineExecutionId?: string,
 *         latestInPipelineExecution?: array{pipelineExecutionId?: string, startTimeRange?: 'All'|'Latest', ...},
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuleExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuleExecutionsAsync(array{
 *     pipelineName?: string,
 *     filter?: array{
 *         pipelineExecutionId?: string,
 *         latestInPipelineExecution?: array{pipelineExecutionId?: string, startTimeRange?: 'All'|'Latest', ...},
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRuleTypes(array $args = [])
 * @phpstan-method \Aws\Result listRuleTypes(array{ruleOwnerFilter?: 'AWS', regionFilter?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuleTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuleTypesAsync(array{ruleOwnerFilter?: 'AWS', regionFilter?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listWebhooks(array $args = [])
 * @phpstan-method \Aws\Result listWebhooks(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebhooksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebhooksAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result overrideStageCondition(array $args = [])
 * @phpstan-method \Aws\Result overrideStageCondition(array{
 *     pipelineName?: string,
 *     stageName?: string,
 *     pipelineExecutionId?: string,
 *     conditionType?: 'BEFORE_ENTRY'|'ON_SUCCESS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise overrideStageConditionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise overrideStageConditionAsync(array{
 *     pipelineName?: string,
 *     stageName?: string,
 *     pipelineExecutionId?: string,
 *     conditionType?: 'BEFORE_ENTRY'|'ON_SUCCESS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result pollForJobs(array $args = [])
 * @phpstan-method \Aws\Result pollForJobs(array{
 *     actionTypeId?: array{
 *         category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *         owner?: 'AWS'|'Custom'|'ThirdParty',
 *         provider?: string,
 *         version?: string,
 *         ...,
 *     },
 *     maxBatchSize?: int,
 *     queryParam?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise pollForJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pollForJobsAsync(array{
 *     actionTypeId?: array{
 *         category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *         owner?: 'AWS'|'Custom'|'ThirdParty',
 *         provider?: string,
 *         version?: string,
 *         ...,
 *     },
 *     maxBatchSize?: int,
 *     queryParam?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result pollForThirdPartyJobs(array $args = [])
 * @phpstan-method \Aws\Result pollForThirdPartyJobs(array{
 *     actionTypeId?: array{
 *         category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *         owner?: 'AWS'|'Custom'|'ThirdParty',
 *         provider?: string,
 *         version?: string,
 *         ...,
 *     },
 *     maxBatchSize?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise pollForThirdPartyJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pollForThirdPartyJobsAsync(array{
 *     actionTypeId?: array{
 *         category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *         owner?: 'AWS'|'Custom'|'ThirdParty',
 *         provider?: string,
 *         version?: string,
 *         ...,
 *     },
 *     maxBatchSize?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putActionRevision(array $args = [])
 * @phpstan-method \Aws\Result putActionRevision(array{
 *     pipelineName?: string,
 *     stageName?: string,
 *     actionName?: string,
 *     actionRevision?: array{revisionId?: string, revisionChangeId?: string, created?: int|string|\DateTimeInterface, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putActionRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putActionRevisionAsync(array{
 *     pipelineName?: string,
 *     stageName?: string,
 *     actionName?: string,
 *     actionRevision?: array{revisionId?: string, revisionChangeId?: string, created?: int|string|\DateTimeInterface, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putApprovalResult(array $args = [])
 * @phpstan-method \Aws\Result putApprovalResult(array{
 *     pipelineName?: string,
 *     stageName?: string,
 *     actionName?: string,
 *     result?: array{summary?: string, status?: 'Approved'|'Rejected', ...},
 *     token?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putApprovalResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putApprovalResultAsync(array{
 *     pipelineName?: string,
 *     stageName?: string,
 *     actionName?: string,
 *     result?: array{summary?: string, status?: 'Approved'|'Rejected', ...},
 *     token?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putJobFailureResult(array $args = [])
 * @phpstan-method \Aws\Result putJobFailureResult(array{
 *     jobId?: string,
 *     failureDetails?: array{
 *         type?: 'ConfigurationError'|'JobFailed'|'PermissionError'|'RevisionOutOfSync'|'RevisionUnavailable'|'SystemUnavailable',
 *         message?: string,
 *         externalExecutionId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putJobFailureResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putJobFailureResultAsync(array{
 *     jobId?: string,
 *     failureDetails?: array{
 *         type?: 'ConfigurationError'|'JobFailed'|'PermissionError'|'RevisionOutOfSync'|'RevisionUnavailable'|'SystemUnavailable',
 *         message?: string,
 *         externalExecutionId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putJobSuccessResult(array $args = [])
 * @phpstan-method \Aws\Result putJobSuccessResult(array{
 *     jobId?: string,
 *     currentRevision?: array{
 *         revision?: string,
 *         changeIdentifier?: string,
 *         created?: int|string|\DateTimeInterface,
 *         revisionSummary?: string,
 *         ...,
 *     },
 *     continuationToken?: string,
 *     executionDetails?: array{summary?: string, externalExecutionId?: string, percentComplete?: int, ...},
 *     outputVariables?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putJobSuccessResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putJobSuccessResultAsync(array{
 *     jobId?: string,
 *     currentRevision?: array{
 *         revision?: string,
 *         changeIdentifier?: string,
 *         created?: int|string|\DateTimeInterface,
 *         revisionSummary?: string,
 *         ...,
 *     },
 *     continuationToken?: string,
 *     executionDetails?: array{summary?: string, externalExecutionId?: string, percentComplete?: int, ...},
 *     outputVariables?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putThirdPartyJobFailureResult(array $args = [])
 * @phpstan-method \Aws\Result putThirdPartyJobFailureResult(array{
 *     jobId?: string,
 *     clientToken?: string,
 *     failureDetails?: array{
 *         type?: 'ConfigurationError'|'JobFailed'|'PermissionError'|'RevisionOutOfSync'|'RevisionUnavailable'|'SystemUnavailable',
 *         message?: string,
 *         externalExecutionId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putThirdPartyJobFailureResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putThirdPartyJobFailureResultAsync(array{
 *     jobId?: string,
 *     clientToken?: string,
 *     failureDetails?: array{
 *         type?: 'ConfigurationError'|'JobFailed'|'PermissionError'|'RevisionOutOfSync'|'RevisionUnavailable'|'SystemUnavailable',
 *         message?: string,
 *         externalExecutionId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putThirdPartyJobSuccessResult(array $args = [])
 * @phpstan-method \Aws\Result putThirdPartyJobSuccessResult(array{
 *     jobId?: string,
 *     clientToken?: string,
 *     currentRevision?: array{
 *         revision?: string,
 *         changeIdentifier?: string,
 *         created?: int|string|\DateTimeInterface,
 *         revisionSummary?: string,
 *         ...,
 *     },
 *     continuationToken?: string,
 *     executionDetails?: array{summary?: string, externalExecutionId?: string, percentComplete?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putThirdPartyJobSuccessResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putThirdPartyJobSuccessResultAsync(array{
 *     jobId?: string,
 *     clientToken?: string,
 *     currentRevision?: array{
 *         revision?: string,
 *         changeIdentifier?: string,
 *         created?: int|string|\DateTimeInterface,
 *         revisionSummary?: string,
 *         ...,
 *     },
 *     continuationToken?: string,
 *     executionDetails?: array{summary?: string, externalExecutionId?: string, percentComplete?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putWebhook(array $args = [])
 * @phpstan-method \Aws\Result putWebhook(array{
 *     webhook?: array{
 *         name?: string,
 *         targetPipeline?: string,
 *         targetAction?: string,
 *         filters?: list<array>,
 *         authentication?: 'GITHUB_HMAC'|'IP'|'UNAUTHENTICATED',
 *         authenticationConfiguration?: array{AllowedIPRange?: string, SecretToken?: string, ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putWebhookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putWebhookAsync(array{
 *     webhook?: array{
 *         name?: string,
 *         targetPipeline?: string,
 *         targetAction?: string,
 *         filters?: list<array>,
 *         authentication?: 'GITHUB_HMAC'|'IP'|'UNAUTHENTICATED',
 *         authenticationConfiguration?: array{AllowedIPRange?: string, SecretToken?: string, ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerWebhookWithThirdParty(array $args = [])
 * @phpstan-method \Aws\Result registerWebhookWithThirdParty(array{webhookName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerWebhookWithThirdPartyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerWebhookWithThirdPartyAsync(array{webhookName?: string, ...} $args = [])
 * @method \Aws\Result retryStageExecution(array $args = [])
 * @phpstan-method \Aws\Result retryStageExecution(array{
 *     pipelineName?: string,
 *     stageName?: string,
 *     pipelineExecutionId?: string,
 *     retryMode?: 'ALL_ACTIONS'|'FAILED_ACTIONS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise retryStageExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retryStageExecutionAsync(array{
 *     pipelineName?: string,
 *     stageName?: string,
 *     pipelineExecutionId?: string,
 *     retryMode?: 'ALL_ACTIONS'|'FAILED_ACTIONS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result rollbackStage(array $args = [])
 * @phpstan-method \Aws\Result rollbackStage(array{pipelineName?: string, stageName?: string, targetPipelineExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rollbackStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rollbackStageAsync(array{pipelineName?: string, stageName?: string, targetPipelineExecutionId?: string, ...} $args = [])
 * @method \Aws\Result startPipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result startPipelineExecution(array{
 *     name?: string,
 *     variables?: list<array{name?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     sourceRevisions?: list<array{
 *         actionName?: string,
 *         revisionType?: 'COMMIT_ID'|'IMAGE_DIGEST'|'S3_OBJECT_KEY'|'S3_OBJECT_VERSION_ID',
 *         revisionValue?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startPipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPipelineExecutionAsync(array{
 *     name?: string,
 *     variables?: list<array{name?: string, value?: string, ...}>,
 *     clientRequestToken?: string,
 *     sourceRevisions?: list<array{
 *         actionName?: string,
 *         revisionType?: 'COMMIT_ID'|'IMAGE_DIGEST'|'S3_OBJECT_KEY'|'S3_OBJECT_VERSION_ID',
 *         revisionValue?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopPipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result stopPipelineExecution(array{pipelineName?: string, pipelineExecutionId?: string, abandon?: bool, reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopPipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopPipelineExecutionAsync(array{pipelineName?: string, pipelineExecutionId?: string, abandon?: bool, reason?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateActionType(array $args = [])
 * @phpstan-method \Aws\Result updateActionType(array{
 *     actionType?: array{
 *         description?: string,
 *         executor?: array{
 *             configuration?: array,
 *             type?: 'JobWorker'|'Lambda',
 *             policyStatementsTemplate?: string,
 *             jobTimeout?: int,
 *             ...,
 *         },
 *         id?: array{
 *             category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *             owner?: string,
 *             provider?: string,
 *             version?: string,
 *             ...,
 *         },
 *         inputArtifactDetails?: array{minimumCount?: int, maximumCount?: int, ...},
 *         outputArtifactDetails?: array{minimumCount?: int, maximumCount?: int, ...},
 *         permissions?: array{allowedAccounts?: list<string>, ...},
 *         properties?: list<array>,
 *         urls?: array{
 *             configurationUrl?: string,
 *             entityUrlTemplate?: string,
 *             executionUrlTemplate?: string,
 *             revisionUrlTemplate?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateActionTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateActionTypeAsync(array{
 *     actionType?: array{
 *         description?: string,
 *         executor?: array{
 *             configuration?: array,
 *             type?: 'JobWorker'|'Lambda',
 *             policyStatementsTemplate?: string,
 *             jobTimeout?: int,
 *             ...,
 *         },
 *         id?: array{
 *             category?: 'Approval'|'Build'|'Compute'|'Deploy'|'Invoke'|'Source'|'Test',
 *             owner?: string,
 *             provider?: string,
 *             version?: string,
 *             ...,
 *         },
 *         inputArtifactDetails?: array{minimumCount?: int, maximumCount?: int, ...},
 *         outputArtifactDetails?: array{minimumCount?: int, maximumCount?: int, ...},
 *         permissions?: array{allowedAccounts?: list<string>, ...},
 *         properties?: list<array>,
 *         urls?: array{
 *             configurationUrl?: string,
 *             entityUrlTemplate?: string,
 *             executionUrlTemplate?: string,
 *             revisionUrlTemplate?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePipeline(array $args = [])
 * @phpstan-method \Aws\Result updatePipeline(array{
 *     pipeline?: array{
 *         name?: string,
 *         roleArn?: string,
 *         artifactStore?: array{type?: 'S3', location?: string, encryptionKey?: array, ...},
 *         artifactStores?: array<string, array>,
 *         stages?: list<array>,
 *         version?: int,
 *         executionMode?: 'PARALLEL'|'QUEUED'|'SUPERSEDED',
 *         pipelineType?: 'V1'|'V2',
 *         variables?: list<array>,
 *         triggers?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePipelineAsync(array{
 *     pipeline?: array{
 *         name?: string,
 *         roleArn?: string,
 *         artifactStore?: array{type?: 'S3', location?: string, encryptionKey?: array, ...},
 *         artifactStores?: array<string, array>,
 *         stages?: list<array>,
 *         version?: int,
 *         executionMode?: 'PARALLEL'|'QUEUED'|'SUPERSEDED',
 *         pipelineType?: 'V1'|'V2',
 *         variables?: list<array>,
 *         triggers?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class CodePipelineClient extends AwsClient {}