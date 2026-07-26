<?php
namespace Aws\AIOps;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS AI Ops** service.
 * @method \Aws\Result createInvestigationGroup(array $args = [])
 * @phpstan-method \Aws\Result createInvestigationGroup(array{
 *     name?: string,
 *     roleArn?: string,
 *     encryptionConfiguration?: array{type?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KMS_KEY', kmsKeyId?: string, ...},
 *     retentionInDays?: int,
 *     tags?: array<string, string>,
 *     tagKeyBoundaries?: list<string>,
 *     chatbotNotificationChannel?: array<string, list<string>>,
 *     isCloudTrailEventHistoryEnabled?: bool,
 *     crossAccountConfigurations?: list<array{sourceRoleArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInvestigationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInvestigationGroupAsync(array{
 *     name?: string,
 *     roleArn?: string,
 *     encryptionConfiguration?: array{type?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KMS_KEY', kmsKeyId?: string, ...},
 *     retentionInDays?: int,
 *     tags?: array<string, string>,
 *     tagKeyBoundaries?: list<string>,
 *     chatbotNotificationChannel?: array<string, list<string>>,
 *     isCloudTrailEventHistoryEnabled?: bool,
 *     crossAccountConfigurations?: list<array{sourceRoleArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteInvestigationGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteInvestigationGroup(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInvestigationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInvestigationGroupAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteInvestigationGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteInvestigationGroupPolicy(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInvestigationGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInvestigationGroupPolicyAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getInvestigationGroup(array $args = [])
 * @phpstan-method \Aws\Result getInvestigationGroup(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvestigationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvestigationGroupAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getInvestigationGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result getInvestigationGroupPolicy(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvestigationGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvestigationGroupPolicyAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result listInvestigationGroups(array $args = [])
 * @phpstan-method \Aws\Result listInvestigationGroups(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvestigationGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvestigationGroupsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putInvestigationGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result putInvestigationGroupPolicy(array{identifier?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putInvestigationGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putInvestigationGroupPolicyAsync(array{identifier?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateInvestigationGroup(array $args = [])
 * @phpstan-method \Aws\Result updateInvestigationGroup(array{
 *     identifier?: string,
 *     roleArn?: string,
 *     encryptionConfiguration?: array{type?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KMS_KEY', kmsKeyId?: string, ...},
 *     tagKeyBoundaries?: list<string>,
 *     chatbotNotificationChannel?: array<string, list<string>>,
 *     isCloudTrailEventHistoryEnabled?: bool,
 *     crossAccountConfigurations?: list<array{sourceRoleArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInvestigationGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInvestigationGroupAsync(array{
 *     identifier?: string,
 *     roleArn?: string,
 *     encryptionConfiguration?: array{type?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KMS_KEY', kmsKeyId?: string, ...},
 *     tagKeyBoundaries?: list<string>,
 *     chatbotNotificationChannel?: array<string, list<string>>,
 *     isCloudTrailEventHistoryEnabled?: bool,
 *     crossAccountConfigurations?: list<array{sourceRoleArn?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class AIOpsClient extends AwsClient {}
