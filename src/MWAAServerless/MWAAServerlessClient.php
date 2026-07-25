<?php
namespace Aws\MWAAServerless;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonMWAAServerless** service.
 * @method \Aws\Result createWorkflow(array $args = [])
 * @phpstan-method \Aws\Result createWorkflow(array{
 *     Name?: string,
 *     ClientToken?: string,
 *     DefinitionS3Location?: array{Bucket?: string, ObjectKey?: string, VersionId?: string, ...},
 *     RoleArn?: string,
 *     Description?: string,
 *     EncryptionConfiguration?: array{Type?: 'AWS_MANAGED_KEY'|'CUSTOMER_MANAGED_KEY', KmsKeyId?: string, ...},
 *     LoggingConfiguration?: array{LogGroupName?: string, ...},
 *     EngineVersion?: int,
 *     NetworkConfiguration?: array{SecurityGroupIds?: list<string>, SubnetIds?: list<string>, ...},
 *     Tags?: array<string, string>,
 *     TriggerMode?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowAsync(array{
 *     Name?: string,
 *     ClientToken?: string,
 *     DefinitionS3Location?: array{Bucket?: string, ObjectKey?: string, VersionId?: string, ...},
 *     RoleArn?: string,
 *     Description?: string,
 *     EncryptionConfiguration?: array{Type?: 'AWS_MANAGED_KEY'|'CUSTOMER_MANAGED_KEY', KmsKeyId?: string, ...},
 *     LoggingConfiguration?: array{LogGroupName?: string, ...},
 *     EngineVersion?: int,
 *     NetworkConfiguration?: array{SecurityGroupIds?: list<string>, SubnetIds?: list<string>, ...},
 *     Tags?: array<string, string>,
 *     TriggerMode?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteWorkflow(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflow(array{WorkflowArn?: string, WorkflowVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array{WorkflowArn?: string, WorkflowVersion?: string, ...} $args = [])
 * @method \Aws\Result getTaskInstance(array $args = [])
 * @phpstan-method \Aws\Result getTaskInstance(array{WorkflowArn?: string, TaskInstanceId?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTaskInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTaskInstanceAsync(array{WorkflowArn?: string, TaskInstanceId?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result getWorkflow(array $args = [])
 * @phpstan-method \Aws\Result getWorkflow(array{WorkflowArn?: string, WorkflowVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowAsync(array{WorkflowArn?: string, WorkflowVersion?: string, ...} $args = [])
 * @method \Aws\Result getWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowRun(array{WorkflowArn?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowRunAsync(array{WorkflowArn?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTaskInstances(array $args = [])
 * @phpstan-method \Aws\Result listTaskInstances(array{WorkflowArn?: string, RunId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTaskInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTaskInstancesAsync(array{WorkflowArn?: string, RunId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listWorkflowRuns(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowRuns(array{MaxResults?: int, NextToken?: string, WorkflowArn?: string, WorkflowVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowRunsAsync(array{MaxResults?: int, NextToken?: string, WorkflowArn?: string, WorkflowVersion?: string, ...} $args = [])
 * @method \Aws\Result listWorkflowVersions(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowVersions(array{MaxResults?: int, NextToken?: string, WorkflowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowVersionsAsync(array{MaxResults?: int, NextToken?: string, WorkflowArn?: string, ...} $args = [])
 * @method \Aws\Result listWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listWorkflows(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result startWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result startWorkflowRun(array{
 *     WorkflowArn?: string,
 *     ClientToken?: string,
 *     OverrideParameters?: array<string, array>,
 *     WorkflowVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startWorkflowRunAsync(array{
 *     WorkflowArn?: string,
 *     ClientToken?: string,
 *     OverrideParameters?: array<string, array>,
 *     WorkflowVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result stopWorkflowRun(array{WorkflowArn?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopWorkflowRunAsync(array{WorkflowArn?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateWorkflow(array $args = [])
 * @phpstan-method \Aws\Result updateWorkflow(array{
 *     WorkflowArn?: string,
 *     DefinitionS3Location?: array{Bucket?: string, ObjectKey?: string, VersionId?: string, ...},
 *     RoleArn?: string,
 *     Description?: string,
 *     LoggingConfiguration?: array{LogGroupName?: string, ...},
 *     EngineVersion?: int,
 *     NetworkConfiguration?: array{SecurityGroupIds?: list<string>, SubnetIds?: list<string>, ...},
 *     TriggerMode?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkflowAsync(array{
 *     WorkflowArn?: string,
 *     DefinitionS3Location?: array{Bucket?: string, ObjectKey?: string, VersionId?: string, ...},
 *     RoleArn?: string,
 *     Description?: string,
 *     LoggingConfiguration?: array{LogGroupName?: string, ...},
 *     EngineVersion?: int,
 *     NetworkConfiguration?: array{SecurityGroupIds?: list<string>, SubnetIds?: list<string>, ...},
 *     TriggerMode?: string,
 *     ...,
 * } $args = [])
 */
class MWAAServerlessClient extends AwsClient {}
