<?php
namespace Aws\Synthetics;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Synthetics** service.
 * @method \Aws\Result associateResource(array $args = [])
 * @phpstan-method \Aws\Result associateResource(array{GroupIdentifier?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateResourceAsync(array{GroupIdentifier?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result createCanary(array $args = [])
 * @phpstan-method \Aws\Result createCanary(array{
 *     Name?: string,
 *     Code?: array{
 *         S3Bucket?: string,
 *         S3Key?: string,
 *         S3Version?: string,
 *         ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Handler?: string,
 *         BlueprintTypes?: list<string>,
 *         Dependencies?: list<array>,
 *         ...,
 *     },
 *     ArtifactS3Location?: string,
 *     ExecutionRoleArn?: string,
 *     Schedule?: array{Expression?: string, DurationInSeconds?: int, RetryConfig?: array{MaxRetries?: int, ...}, ...},
 *     RunConfig?: array{
 *         TimeoutInSeconds?: int,
 *         MemoryInMB?: int,
 *         ActiveTracing?: bool,
 *         EnvironmentVariables?: array<string, string>,
 *         EphemeralStorage?: int,
 *         ...,
 *     },
 *     SuccessRetentionPeriodInDays?: int,
 *     FailureRetentionPeriodInDays?: int,
 *     RuntimeVersion?: string,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, Ipv6AllowedForDualStack?: bool, ...},
 *     ResourcesToReplicateTags?: list<'lambda-function'>,
 *     ProvisionedResourceCleanup?: 'AUTOMATIC'|'OFF',
 *     BrowserConfigs?: list<array{BrowserType?: 'CHROME'|'FIREFOX', ...}>,
 *     AddReplicaLocations?: list<array{Location?: string, VpcConfig?: array, KmsKeyArn?: string, ...}>,
 *     Tags?: array<string, string>,
 *     ArtifactConfig?: array{S3Encryption?: array{EncryptionMode?: 'SSE_KMS'|'SSE_S3', KmsKeyArn?: string, ...}, ...},
 *     KmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCanaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCanaryAsync(array{
 *     Name?: string,
 *     Code?: array{
 *         S3Bucket?: string,
 *         S3Key?: string,
 *         S3Version?: string,
 *         ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Handler?: string,
 *         BlueprintTypes?: list<string>,
 *         Dependencies?: list<array>,
 *         ...,
 *     },
 *     ArtifactS3Location?: string,
 *     ExecutionRoleArn?: string,
 *     Schedule?: array{Expression?: string, DurationInSeconds?: int, RetryConfig?: array{MaxRetries?: int, ...}, ...},
 *     RunConfig?: array{
 *         TimeoutInSeconds?: int,
 *         MemoryInMB?: int,
 *         ActiveTracing?: bool,
 *         EnvironmentVariables?: array<string, string>,
 *         EphemeralStorage?: int,
 *         ...,
 *     },
 *     SuccessRetentionPeriodInDays?: int,
 *     FailureRetentionPeriodInDays?: int,
 *     RuntimeVersion?: string,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, Ipv6AllowedForDualStack?: bool, ...},
 *     ResourcesToReplicateTags?: list<'lambda-function'>,
 *     ProvisionedResourceCleanup?: 'AUTOMATIC'|'OFF',
 *     BrowserConfigs?: list<array{BrowserType?: 'CHROME'|'FIREFOX', ...}>,
 *     AddReplicaLocations?: list<array{Location?: string, VpcConfig?: array, KmsKeyArn?: string, ...}>,
 *     Tags?: array<string, string>,
 *     ArtifactConfig?: array{S3Encryption?: array{EncryptionMode?: 'SSE_KMS'|'SSE_S3', KmsKeyArn?: string, ...}, ...},
 *     KmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @phpstan-method \Aws\Result createGroup(array{Name?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupAsync(array{Name?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteCanary(array $args = [])
 * @phpstan-method \Aws\Result deleteCanary(array{Name?: string, DeleteLambda?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCanaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCanaryAsync(array{Name?: string, DeleteLambda?: bool, ...} $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{GroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{GroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result describeCanaries(array $args = [])
 * @phpstan-method \Aws\Result describeCanaries(array{NextToken?: string, MaxResults?: int, Names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCanariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCanariesAsync(array{NextToken?: string, MaxResults?: int, Names?: list<string>, ...} $args = [])
 * @method \Aws\Result describeCanariesLastRun(array $args = [])
 * @phpstan-method \Aws\Result describeCanariesLastRun(array{NextToken?: string, MaxResults?: int, Names?: list<string>, BrowserType?: 'CHROME'|'FIREFOX', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCanariesLastRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCanariesLastRunAsync(array{NextToken?: string, MaxResults?: int, Names?: list<string>, BrowserType?: 'CHROME'|'FIREFOX', ...} $args = [])
 * @method \Aws\Result describeRuntimeVersions(array $args = [])
 * @phpstan-method \Aws\Result describeRuntimeVersions(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRuntimeVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRuntimeVersionsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result disassociateResource(array $args = [])
 * @phpstan-method \Aws\Result disassociateResource(array{GroupIdentifier?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateResourceAsync(array{GroupIdentifier?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getCanary(array $args = [])
 * @phpstan-method \Aws\Result getCanary(array{Name?: string, DryRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCanaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCanaryAsync(array{Name?: string, DryRunId?: string, ...} $args = [])
 * @method \Aws\Result getCanaryRuns(array $args = [])
 * @phpstan-method \Aws\Result getCanaryRuns(array{
 *     Name?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DryRunId?: string,
 *     RunType?: 'CANARY_RUN'|'DRY_RUN',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCanaryRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCanaryRunsAsync(array{
 *     Name?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     DryRunId?: string,
 *     RunType?: 'CANARY_RUN'|'DRY_RUN',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getGroup(array $args = [])
 * @phpstan-method \Aws\Result getGroup(array{GroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupAsync(array{GroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listAssociatedGroups(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedGroups(array{NextToken?: string, MaxResults?: int, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedGroupsAsync(array{NextToken?: string, MaxResults?: int, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listGroupResources(array $args = [])
 * @phpstan-method \Aws\Result listGroupResources(array{NextToken?: string, MaxResults?: int, GroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupResourcesAsync(array{NextToken?: string, MaxResults?: int, GroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @phpstan-method \Aws\Result listGroups(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result startCanary(array $args = [])
 * @phpstan-method \Aws\Result startCanary(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCanaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCanaryAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result startCanaryDryRun(array $args = [])
 * @phpstan-method \Aws\Result startCanaryDryRun(array{
 *     Name?: string,
 *     Code?: array{
 *         S3Bucket?: string,
 *         S3Key?: string,
 *         S3Version?: string,
 *         ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Handler?: string,
 *         BlueprintTypes?: list<string>,
 *         Dependencies?: list<array>,
 *         ...,
 *     },
 *     RuntimeVersion?: string,
 *     RunConfig?: array{
 *         TimeoutInSeconds?: int,
 *         MemoryInMB?: int,
 *         ActiveTracing?: bool,
 *         EnvironmentVariables?: array<string, string>,
 *         EphemeralStorage?: int,
 *         ...,
 *     },
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, Ipv6AllowedForDualStack?: bool, ...},
 *     ExecutionRoleArn?: string,
 *     SuccessRetentionPeriodInDays?: int,
 *     FailureRetentionPeriodInDays?: int,
 *     VisualReference?: array{BaseScreenshots?: list<array>, BaseCanaryRunId?: string, BrowserType?: 'CHROME'|'FIREFOX', ...},
 *     ArtifactS3Location?: string,
 *     ArtifactConfig?: array{S3Encryption?: array{EncryptionMode?: 'SSE_KMS'|'SSE_S3', KmsKeyArn?: string, ...}, ...},
 *     ProvisionedResourceCleanup?: 'AUTOMATIC'|'OFF',
 *     BrowserConfigs?: list<array{BrowserType?: 'CHROME'|'FIREFOX', ...}>,
 *     VisualReferences?: list<array{BaseScreenshots?: list<array>, BaseCanaryRunId?: string, BrowserType?: 'CHROME'|'FIREFOX', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCanaryDryRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCanaryDryRunAsync(array{
 *     Name?: string,
 *     Code?: array{
 *         S3Bucket?: string,
 *         S3Key?: string,
 *         S3Version?: string,
 *         ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Handler?: string,
 *         BlueprintTypes?: list<string>,
 *         Dependencies?: list<array>,
 *         ...,
 *     },
 *     RuntimeVersion?: string,
 *     RunConfig?: array{
 *         TimeoutInSeconds?: int,
 *         MemoryInMB?: int,
 *         ActiveTracing?: bool,
 *         EnvironmentVariables?: array<string, string>,
 *         EphemeralStorage?: int,
 *         ...,
 *     },
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, Ipv6AllowedForDualStack?: bool, ...},
 *     ExecutionRoleArn?: string,
 *     SuccessRetentionPeriodInDays?: int,
 *     FailureRetentionPeriodInDays?: int,
 *     VisualReference?: array{BaseScreenshots?: list<array>, BaseCanaryRunId?: string, BrowserType?: 'CHROME'|'FIREFOX', ...},
 *     ArtifactS3Location?: string,
 *     ArtifactConfig?: array{S3Encryption?: array{EncryptionMode?: 'SSE_KMS'|'SSE_S3', KmsKeyArn?: string, ...}, ...},
 *     ProvisionedResourceCleanup?: 'AUTOMATIC'|'OFF',
 *     BrowserConfigs?: list<array{BrowserType?: 'CHROME'|'FIREFOX', ...}>,
 *     VisualReferences?: list<array{BaseScreenshots?: list<array>, BaseCanaryRunId?: string, BrowserType?: 'CHROME'|'FIREFOX', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopCanary(array $args = [])
 * @phpstan-method \Aws\Result stopCanary(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopCanaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCanaryAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCanary(array $args = [])
 * @phpstan-method \Aws\Result updateCanary(array{
 *     Name?: string,
 *     Code?: array{
 *         S3Bucket?: string,
 *         S3Key?: string,
 *         S3Version?: string,
 *         ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Handler?: string,
 *         BlueprintTypes?: list<string>,
 *         Dependencies?: list<array>,
 *         ...,
 *     },
 *     ExecutionRoleArn?: string,
 *     RuntimeVersion?: string,
 *     Schedule?: array{Expression?: string, DurationInSeconds?: int, RetryConfig?: array{MaxRetries?: int, ...}, ...},
 *     RunConfig?: array{
 *         TimeoutInSeconds?: int,
 *         MemoryInMB?: int,
 *         ActiveTracing?: bool,
 *         EnvironmentVariables?: array<string, string>,
 *         EphemeralStorage?: int,
 *         ...,
 *     },
 *     SuccessRetentionPeriodInDays?: int,
 *     FailureRetentionPeriodInDays?: int,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, Ipv6AllowedForDualStack?: bool, ...},
 *     VisualReference?: array{BaseScreenshots?: list<array>, BaseCanaryRunId?: string, BrowserType?: 'CHROME'|'FIREFOX', ...},
 *     ArtifactS3Location?: string,
 *     ArtifactConfig?: array{S3Encryption?: array{EncryptionMode?: 'SSE_KMS'|'SSE_S3', KmsKeyArn?: string, ...}, ...},
 *     ProvisionedResourceCleanup?: 'AUTOMATIC'|'OFF',
 *     DryRunId?: string,
 *     VisualReferences?: list<array{BaseScreenshots?: list<array>, BaseCanaryRunId?: string, BrowserType?: 'CHROME'|'FIREFOX', ...}>,
 *     BrowserConfigs?: list<array{BrowserType?: 'CHROME'|'FIREFOX', ...}>,
 *     AddReplicaLocations?: list<array{Location?: string, VpcConfig?: array, KmsKeyArn?: string, ...}>,
 *     RemoveReplicaLocations?: list<string>,
 *     KmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCanaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCanaryAsync(array{
 *     Name?: string,
 *     Code?: array{
 *         S3Bucket?: string,
 *         S3Key?: string,
 *         S3Version?: string,
 *         ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Handler?: string,
 *         BlueprintTypes?: list<string>,
 *         Dependencies?: list<array>,
 *         ...,
 *     },
 *     ExecutionRoleArn?: string,
 *     RuntimeVersion?: string,
 *     Schedule?: array{Expression?: string, DurationInSeconds?: int, RetryConfig?: array{MaxRetries?: int, ...}, ...},
 *     RunConfig?: array{
 *         TimeoutInSeconds?: int,
 *         MemoryInMB?: int,
 *         ActiveTracing?: bool,
 *         EnvironmentVariables?: array<string, string>,
 *         EphemeralStorage?: int,
 *         ...,
 *     },
 *     SuccessRetentionPeriodInDays?: int,
 *     FailureRetentionPeriodInDays?: int,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, Ipv6AllowedForDualStack?: bool, ...},
 *     VisualReference?: array{BaseScreenshots?: list<array>, BaseCanaryRunId?: string, BrowserType?: 'CHROME'|'FIREFOX', ...},
 *     ArtifactS3Location?: string,
 *     ArtifactConfig?: array{S3Encryption?: array{EncryptionMode?: 'SSE_KMS'|'SSE_S3', KmsKeyArn?: string, ...}, ...},
 *     ProvisionedResourceCleanup?: 'AUTOMATIC'|'OFF',
 *     DryRunId?: string,
 *     VisualReferences?: list<array{BaseScreenshots?: list<array>, BaseCanaryRunId?: string, BrowserType?: 'CHROME'|'FIREFOX', ...}>,
 *     BrowserConfigs?: list<array{BrowserType?: 'CHROME'|'FIREFOX', ...}>,
 *     AddReplicaLocations?: list<array{Location?: string, VpcConfig?: array, KmsKeyArn?: string, ...}>,
 *     RemoveReplicaLocations?: list<string>,
 *     KmsKeyArn?: string,
 *     ...,
 * } $args = [])
 */
class SyntheticsClient extends AwsClient {}
