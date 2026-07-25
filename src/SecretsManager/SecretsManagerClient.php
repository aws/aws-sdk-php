<?php
namespace Aws\SecretsManager;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Secrets Manager** service.
 * @method \Aws\Result batchGetSecretValue(array $args = [])
 * @phpstan-method \Aws\Result batchGetSecretValue(array{
 *     SecretIdList?: list<string>,
 *     Filters?: list<array{
 *         Key?: 'all'|'description'|'name'|'owning-service'|'primary-region'|'tag-key'|'tag-value',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetSecretValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetSecretValueAsync(array{
 *     SecretIdList?: list<string>,
 *     Filters?: list<array{
 *         Key?: 'all'|'description'|'name'|'owning-service'|'primary-region'|'tag-key'|'tag-value',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelRotateSecret(array $args = [])
 * @phpstan-method \Aws\Result cancelRotateSecret(array{SecretId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelRotateSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelRotateSecretAsync(array{SecretId?: string, ...} $args = [])
 * @method \Aws\Result createSecret(array $args = [])
 * @phpstan-method \Aws\Result createSecret(array{
 *     Name?: string,
 *     ClientRequestToken?: string,
 *     Description?: string,
 *     KmsKeyId?: string,
 *     SecretBinary?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SecretString?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AddReplicaRegions?: list<array{Region?: string, KmsKeyId?: string, ...}>,
 *     ForceOverwriteReplicaSecret?: bool,
 *     Type?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSecretAsync(array{
 *     Name?: string,
 *     ClientRequestToken?: string,
 *     Description?: string,
 *     KmsKeyId?: string,
 *     SecretBinary?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SecretString?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AddReplicaRegions?: list<array{Region?: string, KmsKeyId?: string, ...}>,
 *     ForceOverwriteReplicaSecret?: bool,
 *     Type?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{SecretId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{SecretId?: string, ...} $args = [])
 * @method \Aws\Result deleteSecret(array $args = [])
 * @phpstan-method \Aws\Result deleteSecret(array{SecretId?: string, RecoveryWindowInDays?: int, ForceDeleteWithoutRecovery?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSecretAsync(array{SecretId?: string, RecoveryWindowInDays?: int, ForceDeleteWithoutRecovery?: bool, ...} $args = [])
 * @method \Aws\Result describeSecret(array $args = [])
 * @phpstan-method \Aws\Result describeSecret(array{SecretId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSecretAsync(array{SecretId?: string, ...} $args = [])
 * @method \Aws\Result getRandomPassword(array $args = [])
 * @phpstan-method \Aws\Result getRandomPassword(array{
 *     PasswordLength?: int,
 *     ExcludeCharacters?: string,
 *     ExcludeNumbers?: bool,
 *     ExcludePunctuation?: bool,
 *     ExcludeUppercase?: bool,
 *     ExcludeLowercase?: bool,
 *     IncludeSpace?: bool,
 *     RequireEachIncludedType?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRandomPasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRandomPasswordAsync(array{
 *     PasswordLength?: int,
 *     ExcludeCharacters?: string,
 *     ExcludeNumbers?: bool,
 *     ExcludePunctuation?: bool,
 *     ExcludeUppercase?: bool,
 *     ExcludeLowercase?: bool,
 *     IncludeSpace?: bool,
 *     RequireEachIncludedType?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{SecretId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{SecretId?: string, ...} $args = [])
 * @method \Aws\Result getSecretValue(array $args = [])
 * @phpstan-method \Aws\Result getSecretValue(array{SecretId?: string, VersionId?: string, VersionStage?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSecretValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSecretValueAsync(array{SecretId?: string, VersionId?: string, VersionStage?: string, ...} $args = [])
 * @method \Aws\Result listSecretVersionIds(array $args = [])
 * @phpstan-method \Aws\Result listSecretVersionIds(array{SecretId?: string, MaxResults?: int, NextToken?: string, IncludeDeprecated?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecretVersionIdsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecretVersionIdsAsync(array{SecretId?: string, MaxResults?: int, NextToken?: string, IncludeDeprecated?: bool, ...} $args = [])
 * @method \Aws\Result listSecrets(array $args = [])
 * @phpstan-method \Aws\Result listSecrets(array{
 *     IncludePlannedDeletion?: bool,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         Key?: 'all'|'description'|'name'|'owning-service'|'primary-region'|'tag-key'|'tag-value',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     SortOrder?: 'asc'|'desc',
 *     SortBy?: 'created-date'|'last-accessed-date'|'last-changed-date'|'name',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecretsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecretsAsync(array{
 *     IncludePlannedDeletion?: bool,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         Key?: 'all'|'description'|'name'|'owning-service'|'primary-region'|'tag-key'|'tag-value',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     SortOrder?: 'asc'|'desc',
 *     SortBy?: 'created-date'|'last-accessed-date'|'last-changed-date'|'name',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{SecretId?: string, ResourcePolicy?: string, BlockPublicPolicy?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{SecretId?: string, ResourcePolicy?: string, BlockPublicPolicy?: bool, ...} $args = [])
 * @method \Aws\Result putSecretValue(array $args = [])
 * @phpstan-method \Aws\Result putSecretValue(array{
 *     SecretId?: string,
 *     ClientRequestToken?: string,
 *     SecretBinary?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SecretString?: string,
 *     VersionStages?: list<string>,
 *     RotationToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSecretValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSecretValueAsync(array{
 *     SecretId?: string,
 *     ClientRequestToken?: string,
 *     SecretBinary?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SecretString?: string,
 *     VersionStages?: list<string>,
 *     RotationToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeRegionsFromReplication(array $args = [])
 * @phpstan-method \Aws\Result removeRegionsFromReplication(array{SecretId?: string, RemoveReplicaRegions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeRegionsFromReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeRegionsFromReplicationAsync(array{SecretId?: string, RemoveReplicaRegions?: list<string>, ...} $args = [])
 * @method \Aws\Result replicateSecretToRegions(array $args = [])
 * @phpstan-method \Aws\Result replicateSecretToRegions(array{
 *     SecretId?: string,
 *     AddReplicaRegions?: list<array{Region?: string, KmsKeyId?: string, ...}>,
 *     ForceOverwriteReplicaSecret?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise replicateSecretToRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise replicateSecretToRegionsAsync(array{
 *     SecretId?: string,
 *     AddReplicaRegions?: list<array{Region?: string, KmsKeyId?: string, ...}>,
 *     ForceOverwriteReplicaSecret?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreSecret(array $args = [])
 * @phpstan-method \Aws\Result restoreSecret(array{SecretId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreSecretAsync(array{SecretId?: string, ...} $args = [])
 * @method \Aws\Result rotateSecret(array $args = [])
 * @phpstan-method \Aws\Result rotateSecret(array{
 *     SecretId?: string,
 *     ClientRequestToken?: string,
 *     RotationLambdaARN?: string,
 *     RotationRules?: array{AutomaticallyAfterDays?: int, Duration?: string, ScheduleExpression?: string, ...},
 *     ExternalSecretRotationMetadata?: list<array{Key?: string, Value?: string, ...}>,
 *     ExternalSecretRotationRoleArn?: string,
 *     RotateImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise rotateSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rotateSecretAsync(array{
 *     SecretId?: string,
 *     ClientRequestToken?: string,
 *     RotationLambdaARN?: string,
 *     RotationRules?: array{AutomaticallyAfterDays?: int, Duration?: string, ScheduleExpression?: string, ...},
 *     ExternalSecretRotationMetadata?: list<array{Key?: string, Value?: string, ...}>,
 *     ExternalSecretRotationRoleArn?: string,
 *     RotateImmediately?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopReplicationToReplica(array $args = [])
 * @phpstan-method \Aws\Result stopReplicationToReplica(array{SecretId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopReplicationToReplicaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopReplicationToReplicaAsync(array{SecretId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{SecretId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{SecretId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{SecretId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{SecretId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateSecret(array $args = [])
 * @phpstan-method \Aws\Result updateSecret(array{
 *     SecretId?: string,
 *     ClientRequestToken?: string,
 *     Description?: string,
 *     KmsKeyId?: string,
 *     SecretBinary?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SecretString?: string,
 *     Type?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecretAsync(array{
 *     SecretId?: string,
 *     ClientRequestToken?: string,
 *     Description?: string,
 *     KmsKeyId?: string,
 *     SecretBinary?: string|resource|\Psr\Http\Message\StreamInterface,
 *     SecretString?: string,
 *     Type?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSecretVersionStage(array $args = [])
 * @phpstan-method \Aws\Result updateSecretVersionStage(array{SecretId?: string, VersionStage?: string, RemoveFromVersionId?: string, MoveToVersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecretVersionStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecretVersionStageAsync(array{SecretId?: string, VersionStage?: string, RemoveFromVersionId?: string, MoveToVersionId?: string, ...} $args = [])
 * @method \Aws\Result validateResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result validateResourcePolicy(array{SecretId?: string, ResourcePolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validateResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateResourcePolicyAsync(array{SecretId?: string, ResourcePolicy?: string, ...} $args = [])
 */
class SecretsManagerClient extends AwsClient {}
