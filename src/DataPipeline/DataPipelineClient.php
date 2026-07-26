<?php
namespace Aws\DataPipeline;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Data Pipeline** service.
 *
 * @method \Aws\Result activatePipeline(array $args = [])
 * @phpstan-method \Aws\Result activatePipeline(array{
 *     pipelineId?: string,
 *     parameterValues?: list<array{id?: string, stringValue?: string, ...}>,
 *     startTimestamp?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise activatePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activatePipelineAsync(array{
 *     pipelineId?: string,
 *     parameterValues?: list<array{id?: string, stringValue?: string, ...}>,
 *     startTimestamp?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addTags(array $args = [])
 * @phpstan-method \Aws\Result addTags(array{pipelineId?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsAsync(array{pipelineId?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createPipeline(array $args = [])
 * @phpstan-method \Aws\Result createPipeline(array{
 *     name?: string,
 *     uniqueId?: string,
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPipelineAsync(array{
 *     name?: string,
 *     uniqueId?: string,
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deactivatePipeline(array $args = [])
 * @phpstan-method \Aws\Result deactivatePipeline(array{pipelineId?: string, cancelActive?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivatePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivatePipelineAsync(array{pipelineId?: string, cancelActive?: bool, ...} $args = [])
 * @method \Aws\Result deletePipeline(array $args = [])
 * @phpstan-method \Aws\Result deletePipeline(array{pipelineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePipelineAsync(array{pipelineId?: string, ...} $args = [])
 * @method \Aws\Result describeObjects(array $args = [])
 * @phpstan-method \Aws\Result describeObjects(array{pipelineId?: string, objectIds?: list<string>, evaluateExpressions?: bool, marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeObjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeObjectsAsync(array{pipelineId?: string, objectIds?: list<string>, evaluateExpressions?: bool, marker?: string, ...} $args = [])
 * @method \Aws\Result describePipelines(array $args = [])
 * @phpstan-method \Aws\Result describePipelines(array{pipelineIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePipelinesAsync(array{pipelineIds?: list<string>, ...} $args = [])
 * @method \Aws\Result evaluateExpression(array $args = [])
 * @phpstan-method \Aws\Result evaluateExpression(array{pipelineId?: string, objectId?: string, expression?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise evaluateExpressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise evaluateExpressionAsync(array{pipelineId?: string, objectId?: string, expression?: string, ...} $args = [])
 * @method \Aws\Result getPipelineDefinition(array $args = [])
 * @phpstan-method \Aws\Result getPipelineDefinition(array{pipelineId?: string, version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPipelineDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPipelineDefinitionAsync(array{pipelineId?: string, version?: string, ...} $args = [])
 * @method \Aws\Result listPipelines(array $args = [])
 * @phpstan-method \Aws\Result listPipelines(array{marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelinesAsync(array{marker?: string, ...} $args = [])
 * @method \Aws\Result pollForTask(array $args = [])
 * @phpstan-method \Aws\Result pollForTask(array{
 *     workerGroup?: string,
 *     hostname?: string,
 *     instanceIdentity?: array{document?: string, signature?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise pollForTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pollForTaskAsync(array{
 *     workerGroup?: string,
 *     hostname?: string,
 *     instanceIdentity?: array{document?: string, signature?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putPipelineDefinition(array $args = [])
 * @phpstan-method \Aws\Result putPipelineDefinition(array{
 *     pipelineId?: string,
 *     pipelineObjects?: list<array{id?: string, name?: string, fields?: list<array>, ...}>,
 *     parameterObjects?: list<array{id?: string, attributes?: list<array>, ...}>,
 *     parameterValues?: list<array{id?: string, stringValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPipelineDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPipelineDefinitionAsync(array{
 *     pipelineId?: string,
 *     pipelineObjects?: list<array{id?: string, name?: string, fields?: list<array>, ...}>,
 *     parameterObjects?: list<array{id?: string, attributes?: list<array>, ...}>,
 *     parameterValues?: list<array{id?: string, stringValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result queryObjects(array $args = [])
 * @phpstan-method \Aws\Result queryObjects(array{
 *     pipelineId?: string,
 *     query?: array{selectors?: list<array>, ...},
 *     sphere?: string,
 *     marker?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise queryObjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryObjectsAsync(array{
 *     pipelineId?: string,
 *     query?: array{selectors?: list<array>, ...},
 *     sphere?: string,
 *     marker?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @phpstan-method \Aws\Result removeTags(array{pipelineId?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsAsync(array{pipelineId?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result reportTaskProgress(array $args = [])
 * @phpstan-method \Aws\Result reportTaskProgress(array{taskId?: string, fields?: list<array{key?: string, stringValue?: string, refValue?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise reportTaskProgressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reportTaskProgressAsync(array{taskId?: string, fields?: list<array{key?: string, stringValue?: string, refValue?: string, ...}>, ...} $args = [])
 * @method \Aws\Result reportTaskRunnerHeartbeat(array $args = [])
 * @phpstan-method \Aws\Result reportTaskRunnerHeartbeat(array{taskrunnerId?: string, workerGroup?: string, hostname?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise reportTaskRunnerHeartbeatAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reportTaskRunnerHeartbeatAsync(array{taskrunnerId?: string, workerGroup?: string, hostname?: string, ...} $args = [])
 * @method \Aws\Result setStatus(array $args = [])
 * @phpstan-method \Aws\Result setStatus(array{pipelineId?: string, objectIds?: list<string>, status?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setStatusAsync(array{pipelineId?: string, objectIds?: list<string>, status?: string, ...} $args = [])
 * @method \Aws\Result setTaskStatus(array $args = [])
 * @phpstan-method \Aws\Result setTaskStatus(array{
 *     taskId?: string,
 *     taskStatus?: 'FAILED'|'FALSE'|'FINISHED',
 *     errorId?: string,
 *     errorMessage?: string,
 *     errorStackTrace?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setTaskStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setTaskStatusAsync(array{
 *     taskId?: string,
 *     taskStatus?: 'FAILED'|'FALSE'|'FINISHED',
 *     errorId?: string,
 *     errorMessage?: string,
 *     errorStackTrace?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result validatePipelineDefinition(array $args = [])
 * @phpstan-method \Aws\Result validatePipelineDefinition(array{
 *     pipelineId?: string,
 *     pipelineObjects?: list<array{id?: string, name?: string, fields?: list<array>, ...}>,
 *     parameterObjects?: list<array{id?: string, attributes?: list<array>, ...}>,
 *     parameterValues?: list<array{id?: string, stringValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise validatePipelineDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validatePipelineDefinitionAsync(array{
 *     pipelineId?: string,
 *     pipelineObjects?: list<array{id?: string, name?: string, fields?: list<array>, ...}>,
 *     parameterObjects?: list<array{id?: string, attributes?: list<array>, ...}>,
 *     parameterValues?: list<array{id?: string, stringValue?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class DataPipelineClient extends AwsClient {}
