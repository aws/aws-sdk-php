<?php
namespace Aws\NovaAct;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Nova Act Service** service.
 * @method \Aws\Result createAct(array $args = [])
 * @phpstan-method \Aws\Result createAct(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     sessionId?: string,
 *     task?: string,
 *     toolSpecs?: list<array{name?: string, description?: string, inputSchema?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createActAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createActAsync(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     sessionId?: string,
 *     task?: string,
 *     toolSpecs?: list<array{name?: string, description?: string, inputSchema?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSession(array $args = [])
 * @phpstan-method \Aws\Result createSession(array{workflowDefinitionName?: string, workflowRunId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSessionAsync(array{workflowDefinitionName?: string, workflowRunId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createWorkflowDefinition(array $args = [])
 * @phpstan-method \Aws\Result createWorkflowDefinition(array{
 *     name?: string,
 *     description?: string,
 *     exportConfig?: array{s3BucketName?: string, s3KeyPrefix?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowDefinitionAsync(array{
 *     name?: string,
 *     description?: string,
 *     exportConfig?: array{s3BucketName?: string, s3KeyPrefix?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result createWorkflowRun(array{
 *     workflowDefinitionName?: string,
 *     modelId?: string,
 *     clientToken?: string,
 *     logGroupName?: string,
 *     clientInfo?: array{compatibilityVersion?: int, sdkVersion?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowRunAsync(array{
 *     workflowDefinitionName?: string,
 *     modelId?: string,
 *     clientToken?: string,
 *     logGroupName?: string,
 *     clientInfo?: array{compatibilityVersion?: int, sdkVersion?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteWorkflowDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflowDefinition(array{workflowDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowDefinitionAsync(array{workflowDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflowRun(array{workflowDefinitionName?: string, workflowRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowRunAsync(array{workflowDefinitionName?: string, workflowRunId?: string, ...} $args = [])
 * @method \Aws\Result getWorkflowDefinition(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowDefinition(array{workflowDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowDefinitionAsync(array{workflowDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result getWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowRun(array{workflowDefinitionName?: string, workflowRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowRunAsync(array{workflowDefinitionName?: string, workflowRunId?: string, ...} $args = [])
 * @method \Aws\Result invokeActStep(array $args = [])
 * @phpstan-method \Aws\Result invokeActStep(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     sessionId?: string,
 *     actId?: string,
 *     callResults?: list<array{callId?: string, content?: list<array>, ...}>,
 *     previousStepId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeActStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeActStepAsync(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     sessionId?: string,
 *     actId?: string,
 *     callResults?: list<array{callId?: string, content?: list<array>, ...}>,
 *     previousStepId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listActs(array $args = [])
 * @phpstan-method \Aws\Result listActs(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     sessionId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listActsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActsAsync(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     sessionId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModels(array $args = [])
 * @phpstan-method \Aws\Result listModels(array{clientCompatibilityVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelsAsync(array{clientCompatibilityVersion?: int, ...} $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkflowDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowDefinitions(array{maxResults?: int, nextToken?: string, sortOrder?: 'Ascending'|'Descending', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowDefinitionsAsync(array{maxResults?: int, nextToken?: string, sortOrder?: 'Ascending'|'Descending', ...} $args = [])
 * @method \Aws\Result listWorkflowRuns(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowRuns(array{
 *     workflowDefinitionName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowRunsAsync(array{
 *     workflowDefinitionName?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAct(array $args = [])
 * @phpstan-method \Aws\Result updateAct(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     sessionId?: string,
 *     actId?: string,
 *     status?: 'FAILED'|'PENDING_CLIENT_ACTION'|'PENDING_HUMAN_ACTION'|'RUNNING'|'SUCCEEDED'|'TIMED_OUT',
 *     error?: array{message?: string, type?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateActAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateActAsync(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     sessionId?: string,
 *     actId?: string,
 *     status?: 'FAILED'|'PENDING_CLIENT_ACTION'|'PENDING_HUMAN_ACTION'|'RUNNING'|'SUCCEEDED'|'TIMED_OUT',
 *     error?: array{message?: string, type?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result updateWorkflowRun(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     status?: 'DELETING'|'FAILED'|'RUNNING'|'SUCCEEDED'|'TIMED_OUT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkflowRunAsync(array{
 *     workflowDefinitionName?: string,
 *     workflowRunId?: string,
 *     status?: 'DELETING'|'FAILED'|'RUNNING'|'SUCCEEDED'|'TIMED_OUT',
 *     ...,
 * } $args = [])
 */
class NovaActClient extends AwsClient {}
