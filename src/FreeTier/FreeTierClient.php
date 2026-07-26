<?php
namespace Aws\FreeTier;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Free Tier** service.
 * @method \Aws\Result getAccountActivity(array $args = [])
 * @phpstan-method \Aws\Result getAccountActivity(array{
 *     activityId?: string,
 *     languageCode?: 'de-DE'|'en-GB'|'en-US'|'es-ES'|'fr-FR'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'pt-PT'|'tr-TR'|'zh-CN'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountActivityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountActivityAsync(array{
 *     activityId?: string,
 *     languageCode?: 'de-DE'|'en-GB'|'en-US'|'es-ES'|'fr-FR'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'pt-PT'|'tr-TR'|'zh-CN'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAccountPlanState(array $args = [])
 * @phpstan-method \Aws\Result getAccountPlanState(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountPlanStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountPlanStateAsync(array{...} $args = [])
 * @method \Aws\Result getFreeTierUsage(array $args = [])
 * @phpstan-method \Aws\Result getFreeTierUsage(array{
 *     filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'DESCRIPTION'|'FREE_TIER_TYPE'|'OPERATION'|'REGION'|'SERVICE'|'USAGE_PERCENTAGE'|'USAGE_TYPE',
 *             Values?: list<string>,
 *             MatchOptions?: list<'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFreeTierUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFreeTierUsageAsync(array{
 *     filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'DESCRIPTION'|'FREE_TIER_TYPE'|'OPERATION'|'REGION'|'SERVICE'|'USAGE_PERCENTAGE'|'USAGE_TYPE',
 *             Values?: list<string>,
 *             MatchOptions?: list<'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccountActivities(array $args = [])
 * @phpstan-method \Aws\Result listAccountActivities(array{
 *     filterActivityStatuses?: list<'COMPLETED'|'EXPIRING'|'IN_PROGRESS'|'NOT_STARTED'>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     languageCode?: 'de-DE'|'en-GB'|'en-US'|'es-ES'|'fr-FR'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'pt-PT'|'tr-TR'|'zh-CN'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountActivitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountActivitiesAsync(array{
 *     filterActivityStatuses?: list<'COMPLETED'|'EXPIRING'|'IN_PROGRESS'|'NOT_STARTED'>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     languageCode?: 'de-DE'|'en-GB'|'en-US'|'es-ES'|'fr-FR'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'pt-PT'|'tr-TR'|'zh-CN'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result upgradeAccountPlan(array $args = [])
 * @phpstan-method \Aws\Result upgradeAccountPlan(array{accountPlanType?: 'FREE'|'PAID', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise upgradeAccountPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise upgradeAccountPlanAsync(array{accountPlanType?: 'FREE'|'PAID', ...} $args = [])
 */
class FreeTierClient extends AwsClient {}
