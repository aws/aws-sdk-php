<?php
namespace Aws\CodeGuruProfiler;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CodeGuru Profiler** service.
 * @method \Aws\Result addNotificationChannels(array $args = [])
 * @phpstan-method \Aws\Result addNotificationChannels(array{
 *     channels?: list<array{eventPublishers?: list<'AnomalyDetection'>, id?: string, uri?: string, ...}>,
 *     profilingGroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addNotificationChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addNotificationChannelsAsync(array{
 *     channels?: list<array{eventPublishers?: list<'AnomalyDetection'>, id?: string, uri?: string, ...}>,
 *     profilingGroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetFrameMetricData(array $args = [])
 * @phpstan-method \Aws\Result batchGetFrameMetricData(array{
 *     endTime?: int|string|\DateTimeInterface,
 *     frameMetrics?: list<array{frameName?: string, threadStates?: list<string>, type?: 'AggregatedRelativeTotalTime', ...}>,
 *     period?: string,
 *     profilingGroupName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     targetResolution?: 'P1D'|'PT1H'|'PT5M',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetFrameMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetFrameMetricDataAsync(array{
 *     endTime?: int|string|\DateTimeInterface,
 *     frameMetrics?: list<array{frameName?: string, threadStates?: list<string>, type?: 'AggregatedRelativeTotalTime', ...}>,
 *     period?: string,
 *     profilingGroupName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     targetResolution?: 'P1D'|'PT1H'|'PT5M',
 *     ...,
 * } $args = [])
 * @method \Aws\Result configureAgent(array $args = [])
 * @phpstan-method \Aws\Result configureAgent(array{fleetInstanceId?: string, metadata?: array<string, string>, profilingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise configureAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise configureAgentAsync(array{fleetInstanceId?: string, metadata?: array<string, string>, profilingGroupName?: string, ...} $args = [])
 * @method \Aws\Result createProfilingGroup(array $args = [])
 * @phpstan-method \Aws\Result createProfilingGroup(array{
 *     agentOrchestrationConfig?: array{profilingEnabled?: bool, ...},
 *     clientToken?: string,
 *     computePlatform?: 'AWSLambda'|'Default',
 *     profilingGroupName?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProfilingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProfilingGroupAsync(array{
 *     agentOrchestrationConfig?: array{profilingEnabled?: bool, ...},
 *     clientToken?: string,
 *     computePlatform?: 'AWSLambda'|'Default',
 *     profilingGroupName?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteProfilingGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteProfilingGroup(array{profilingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProfilingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProfilingGroupAsync(array{profilingGroupName?: string, ...} $args = [])
 * @method \Aws\Result describeProfilingGroup(array $args = [])
 * @phpstan-method \Aws\Result describeProfilingGroup(array{profilingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProfilingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProfilingGroupAsync(array{profilingGroupName?: string, ...} $args = [])
 * @method \Aws\Result getFindingsReportAccountSummary(array $args = [])
 * @phpstan-method \Aws\Result getFindingsReportAccountSummary(array{dailyReportsOnly?: bool, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsReportAccountSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsReportAccountSummaryAsync(array{dailyReportsOnly?: bool, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getNotificationConfiguration(array{profilingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotificationConfigurationAsync(array{profilingGroupName?: string, ...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{profilingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{profilingGroupName?: string, ...} $args = [])
 * @method \Aws\Result getProfile(array $args = [])
 * @phpstan-method \Aws\Result getProfile(array{
 *     accept?: string,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxDepth?: int,
 *     period?: string,
 *     profilingGroupName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileAsync(array{
 *     accept?: string,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxDepth?: int,
 *     period?: string,
 *     profilingGroupName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getRecommendations(array{
 *     endTime?: int|string|\DateTimeInterface,
 *     locale?: string,
 *     profilingGroupName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationsAsync(array{
 *     endTime?: int|string|\DateTimeInterface,
 *     locale?: string,
 *     profilingGroupName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFindingsReports(array $args = [])
 * @phpstan-method \Aws\Result listFindingsReports(array{
 *     dailyReportsOnly?: bool,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     profilingGroupName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingsReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingsReportsAsync(array{
 *     dailyReportsOnly?: bool,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     profilingGroupName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProfileTimes(array $args = [])
 * @phpstan-method \Aws\Result listProfileTimes(array{
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     orderBy?: 'TimestampAscending'|'TimestampDescending',
 *     period?: 'P1D'|'PT1H'|'PT5M',
 *     profilingGroupName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfileTimesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfileTimesAsync(array{
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     orderBy?: 'TimestampAscending'|'TimestampDescending',
 *     period?: 'P1D'|'PT1H'|'PT5M',
 *     profilingGroupName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProfilingGroups(array $args = [])
 * @phpstan-method \Aws\Result listProfilingGroups(array{includeDescription?: bool, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProfilingGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProfilingGroupsAsync(array{includeDescription?: bool, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result postAgentProfile(array $args = [])
 * @phpstan-method \Aws\Result postAgentProfile(array{
 *     agentProfile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     contentType?: string,
 *     profileToken?: string,
 *     profilingGroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise postAgentProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postAgentProfileAsync(array{
 *     agentProfile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     contentType?: string,
 *     profileToken?: string,
 *     profilingGroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putPermission(array $args = [])
 * @phpstan-method \Aws\Result putPermission(array{
 *     actionGroup?: 'agentPermissions',
 *     principals?: list<string>,
 *     profilingGroupName?: string,
 *     revisionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPermissionAsync(array{
 *     actionGroup?: 'agentPermissions',
 *     principals?: list<string>,
 *     profilingGroupName?: string,
 *     revisionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeNotificationChannel(array $args = [])
 * @phpstan-method \Aws\Result removeNotificationChannel(array{channelId?: string, profilingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeNotificationChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeNotificationChannelAsync(array{channelId?: string, profilingGroupName?: string, ...} $args = [])
 * @method \Aws\Result removePermission(array $args = [])
 * @phpstan-method \Aws\Result removePermission(array{actionGroup?: 'agentPermissions', profilingGroupName?: string, revisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removePermissionAsync(array{actionGroup?: 'agentPermissions', profilingGroupName?: string, revisionId?: string, ...} $args = [])
 * @method \Aws\Result submitFeedback(array $args = [])
 * @phpstan-method \Aws\Result submitFeedback(array{
 *     anomalyInstanceId?: string,
 *     comment?: string,
 *     profilingGroupName?: string,
 *     type?: 'Negative'|'Positive',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise submitFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitFeedbackAsync(array{
 *     anomalyInstanceId?: string,
 *     comment?: string,
 *     profilingGroupName?: string,
 *     type?: 'Negative'|'Positive',
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateProfilingGroup(array $args = [])
 * @phpstan-method \Aws\Result updateProfilingGroup(array{agentOrchestrationConfig?: array{profilingEnabled?: bool, ...}, profilingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProfilingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProfilingGroupAsync(array{agentOrchestrationConfig?: array{profilingEnabled?: bool, ...}, profilingGroupName?: string, ...} $args = [])
 */
class CodeGuruProfilerClient extends AwsClient {}
