<?php
namespace Aws\CodeStarNotifications;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CodeStar Notifications** service.
 * @method \Aws\Result createNotificationRule(array $args = [])
 * @phpstan-method \Aws\Result createNotificationRule(array{
 *     Name?: string,
 *     EventTypeIds?: list<string>,
 *     Resource?: string,
 *     Targets?: list<array{TargetType?: string, TargetAddress?: string, ...}>,
 *     DetailType?: 'BASIC'|'FULL',
 *     ClientRequestToken?: string,
 *     Tags?: array<string, string>,
 *     Status?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotificationRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotificationRuleAsync(array{
 *     Name?: string,
 *     EventTypeIds?: list<string>,
 *     Resource?: string,
 *     Targets?: list<array{TargetType?: string, TargetAddress?: string, ...}>,
 *     DetailType?: 'BASIC'|'FULL',
 *     ClientRequestToken?: string,
 *     Tags?: array<string, string>,
 *     Status?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteNotificationRule(array $args = [])
 * @phpstan-method \Aws\Result deleteNotificationRule(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotificationRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotificationRuleAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteTarget(array $args = [])
 * @phpstan-method \Aws\Result deleteTarget(array{TargetAddress?: string, ForceUnsubscribeAll?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTargetAsync(array{TargetAddress?: string, ForceUnsubscribeAll?: bool, ...} $args = [])
 * @method \Aws\Result describeNotificationRule(array $args = [])
 * @phpstan-method \Aws\Result describeNotificationRule(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNotificationRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotificationRuleAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result listEventTypes(array $args = [])
 * @phpstan-method \Aws\Result listEventTypes(array{
 *     Filters?: list<array{Name?: 'RESOURCE_TYPE'|'SERVICE_NAME', Value?: string, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventTypesAsync(array{
 *     Filters?: list<array{Name?: 'RESOURCE_TYPE'|'SERVICE_NAME', Value?: string, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotificationRules(array $args = [])
 * @phpstan-method \Aws\Result listNotificationRules(array{
 *     Filters?: list<array{Name?: 'CREATED_BY'|'EVENT_TYPE_ID'|'RESOURCE'|'TARGET_ADDRESS', Value?: string, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotificationRulesAsync(array{
 *     Filters?: list<array{Name?: 'CREATED_BY'|'EVENT_TYPE_ID'|'RESOURCE'|'TARGET_ADDRESS', Value?: string, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result listTargets(array $args = [])
 * @phpstan-method \Aws\Result listTargets(array{
 *     Filters?: list<array{Name?: 'TARGET_ADDRESS'|'TARGET_STATUS'|'TARGET_TYPE', Value?: string, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetsAsync(array{
 *     Filters?: list<array{Name?: 'TARGET_ADDRESS'|'TARGET_STATUS'|'TARGET_TYPE', Value?: string, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result subscribe(array $args = [])
 * @phpstan-method \Aws\Result subscribe(array{
 *     Arn?: string,
 *     Target?: array{TargetType?: string, TargetAddress?: string, ...},
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise subscribeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise subscribeAsync(array{
 *     Arn?: string,
 *     Target?: array{TargetType?: string, TargetAddress?: string, ...},
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{Arn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{Arn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result unsubscribe(array $args = [])
 * @phpstan-method \Aws\Result unsubscribe(array{Arn?: string, TargetAddress?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unsubscribeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unsubscribeAsync(array{Arn?: string, TargetAddress?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{Arn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{Arn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateNotificationRule(array $args = [])
 * @phpstan-method \Aws\Result updateNotificationRule(array{
 *     Arn?: string,
 *     Name?: string,
 *     Status?: 'DISABLED'|'ENABLED',
 *     EventTypeIds?: list<string>,
 *     Targets?: list<array{TargetType?: string, TargetAddress?: string, ...}>,
 *     DetailType?: 'BASIC'|'FULL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotificationRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotificationRuleAsync(array{
 *     Arn?: string,
 *     Name?: string,
 *     Status?: 'DISABLED'|'ENABLED',
 *     EventTypeIds?: list<string>,
 *     Targets?: list<array{TargetType?: string, TargetAddress?: string, ...}>,
 *     DetailType?: 'BASIC'|'FULL',
 *     ...,
 * } $args = [])
 */
class CodeStarNotificationsClient extends AwsClient {}
