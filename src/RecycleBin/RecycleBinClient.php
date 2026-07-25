<?php
namespace Aws\RecycleBin;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Recycle Bin** service.
 * @method \Aws\Result createRule(array $args = [])
 * @phpstan-method \Aws\Result createRule(array{
 *     RetentionPeriod?: array{RetentionPeriodValue?: int, RetentionPeriodUnit?: 'DAYS', ...},
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ResourceType?: 'EBS_SNAPSHOT'|'EBS_VOLUME'|'EC2_IMAGE',
 *     ResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     LockConfiguration?: array{UnlockDelay?: array{UnlockDelayValue?: int, UnlockDelayUnit?: 'DAYS', ...}, ...},
 *     ExcludeResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleAsync(array{
 *     RetentionPeriod?: array{RetentionPeriodValue?: int, RetentionPeriodUnit?: 'DAYS', ...},
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ResourceType?: 'EBS_SNAPSHOT'|'EBS_VOLUME'|'EC2_IMAGE',
 *     ResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     LockConfiguration?: array{UnlockDelay?: array{UnlockDelayValue?: int, UnlockDelayUnit?: 'DAYS', ...}, ...},
 *     ExcludeResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRule(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getRule(array $args = [])
 * @phpstan-method \Aws\Result getRule(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuleAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result listRules(array $args = [])
 * @phpstan-method \Aws\Result listRules(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ResourceType?: 'EBS_SNAPSHOT'|'EBS_VOLUME'|'EC2_IMAGE',
 *     ResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     LockState?: 'locked'|'pending_unlock'|'unlocked',
 *     ExcludeResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRulesAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ResourceType?: 'EBS_SNAPSHOT'|'EBS_VOLUME'|'EC2_IMAGE',
 *     ResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     LockState?: 'locked'|'pending_unlock'|'unlocked',
 *     ExcludeResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result lockRule(array $args = [])
 * @phpstan-method \Aws\Result lockRule(array{
 *     Identifier?: string,
 *     LockConfiguration?: array{UnlockDelay?: array{UnlockDelayValue?: int, UnlockDelayUnit?: 'DAYS', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise lockRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise lockRuleAsync(array{
 *     Identifier?: string,
 *     LockConfiguration?: array{UnlockDelay?: array{UnlockDelayValue?: int, UnlockDelayUnit?: 'DAYS', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result unlockRule(array $args = [])
 * @phpstan-method \Aws\Result unlockRule(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unlockRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unlockRuleAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateRule(array $args = [])
 * @phpstan-method \Aws\Result updateRule(array{
 *     Identifier?: string,
 *     RetentionPeriod?: array{RetentionPeriodValue?: int, RetentionPeriodUnit?: 'DAYS', ...},
 *     Description?: string,
 *     ResourceType?: 'EBS_SNAPSHOT'|'EBS_VOLUME'|'EC2_IMAGE',
 *     ResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     ExcludeResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleAsync(array{
 *     Identifier?: string,
 *     RetentionPeriod?: array{RetentionPeriodValue?: int, RetentionPeriodUnit?: 'DAYS', ...},
 *     Description?: string,
 *     ResourceType?: 'EBS_SNAPSHOT'|'EBS_VOLUME'|'EC2_IMAGE',
 *     ResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     ExcludeResourceTags?: list<array{ResourceTagKey?: string, ResourceTagValue?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class RecycleBinClient extends AwsClient {}
