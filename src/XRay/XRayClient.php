<?php
namespace Aws\XRay;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS X-Ray** service.
 * @method \Aws\Result batchGetTraces(array $args = [])
 * @phpstan-method \Aws\Result batchGetTraces(array{TraceIds?: list<string>, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetTracesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetTracesAsync(array{TraceIds?: list<string>, NextToken?: string, ...} $args = [])
 * @method \Aws\Result cancelTraceRetrieval(array $args = [])
 * @phpstan-method \Aws\Result cancelTraceRetrieval(array{RetrievalToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelTraceRetrievalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelTraceRetrievalAsync(array{RetrievalToken?: string, ...} $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @phpstan-method \Aws\Result createGroup(array{
 *     GroupName?: string,
 *     FilterExpression?: string,
 *     InsightsConfiguration?: array{InsightsEnabled?: bool, NotificationsEnabled?: bool, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupAsync(array{
 *     GroupName?: string,
 *     FilterExpression?: string,
 *     InsightsConfiguration?: array{InsightsEnabled?: bool, NotificationsEnabled?: bool, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSamplingRule(array $args = [])
 * @phpstan-method \Aws\Result createSamplingRule(array{
 *     SamplingRule?: array{
 *         RuleName?: string,
 *         RuleARN?: string,
 *         ResourceARN?: string,
 *         Priority?: int,
 *         FixedRate?: float,
 *         ReservoirSize?: int,
 *         ServiceName?: string,
 *         ServiceType?: string,
 *         Host?: string,
 *         HTTPMethod?: string,
 *         URLPath?: string,
 *         Version?: int,
 *         Attributes?: array<string, string>,
 *         SamplingRateBoost?: array{MaxRate?: float, CooldownWindowMinutes?: int, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSamplingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSamplingRuleAsync(array{
 *     SamplingRule?: array{
 *         RuleName?: string,
 *         RuleARN?: string,
 *         ResourceARN?: string,
 *         Priority?: int,
 *         FixedRate?: float,
 *         ReservoirSize?: int,
 *         ServiceName?: string,
 *         ServiceType?: string,
 *         Host?: string,
 *         HTTPMethod?: string,
 *         URLPath?: string,
 *         Version?: int,
 *         Attributes?: array<string, string>,
 *         SamplingRateBoost?: array{MaxRate?: float, CooldownWindowMinutes?: int, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{GroupName?: string, GroupARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{GroupName?: string, GroupARN?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{PolicyName?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{PolicyName?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \Aws\Result deleteSamplingRule(array $args = [])
 * @phpstan-method \Aws\Result deleteSamplingRule(array{RuleName?: string, RuleARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSamplingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSamplingRuleAsync(array{RuleName?: string, RuleARN?: string, ...} $args = [])
 * @method \Aws\Result getEncryptionConfig(array $args = [])
 * @phpstan-method \Aws\Result getEncryptionConfig(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEncryptionConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEncryptionConfigAsync(array{...} $args = [])
 * @method \Aws\Result getGroup(array $args = [])
 * @phpstan-method \Aws\Result getGroup(array{GroupName?: string, GroupARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupAsync(array{GroupName?: string, GroupARN?: string, ...} $args = [])
 * @method \Aws\Result getGroups(array $args = [])
 * @phpstan-method \Aws\Result getGroups(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result getIndexingRules(array $args = [])
 * @phpstan-method \Aws\Result getIndexingRules(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIndexingRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIndexingRulesAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result getInsight(array $args = [])
 * @phpstan-method \Aws\Result getInsight(array{InsightId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInsightAsync(array{InsightId?: string, ...} $args = [])
 * @method \Aws\Result getInsightEvents(array $args = [])
 * @phpstan-method \Aws\Result getInsightEvents(array{InsightId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInsightEventsAsync(array{InsightId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getInsightImpactGraph(array $args = [])
 * @phpstan-method \Aws\Result getInsightImpactGraph(array{
 *     InsightId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightImpactGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInsightImpactGraphAsync(array{
 *     InsightId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getInsightSummaries(array $args = [])
 * @phpstan-method \Aws\Result getInsightSummaries(array{
 *     States?: list<'ACTIVE'|'CLOSED'>,
 *     GroupARN?: string,
 *     GroupName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInsightSummariesAsync(array{
 *     States?: list<'ACTIVE'|'CLOSED'>,
 *     GroupARN?: string,
 *     GroupName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRetrievedTracesGraph(array $args = [])
 * @phpstan-method \Aws\Result getRetrievedTracesGraph(array{RetrievalToken?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRetrievedTracesGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRetrievedTracesGraphAsync(array{RetrievalToken?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getSamplingRules(array $args = [])
 * @phpstan-method \Aws\Result getSamplingRules(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSamplingRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSamplingRulesAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result getSamplingStatisticSummaries(array $args = [])
 * @phpstan-method \Aws\Result getSamplingStatisticSummaries(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSamplingStatisticSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSamplingStatisticSummariesAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result getSamplingTargets(array $args = [])
 * @phpstan-method \Aws\Result getSamplingTargets(array{
 *     SamplingStatisticsDocuments?: list<array{
 *         RuleName?: string,
 *         ClientID?: string,
 *         Timestamp?: int|string|\DateTimeInterface,
 *         RequestCount?: int,
 *         SampledCount?: int,
 *         BorrowCount?: int,
 *         ...,
 *     }>,
 *     SamplingBoostStatisticsDocuments?: list<array{
 *         RuleName?: string,
 *         ServiceName?: string,
 *         Timestamp?: int|string|\DateTimeInterface,
 *         AnomalyCount?: int,
 *         TotalCount?: int,
 *         SampledAnomalyCount?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSamplingTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSamplingTargetsAsync(array{
 *     SamplingStatisticsDocuments?: list<array{
 *         RuleName?: string,
 *         ClientID?: string,
 *         Timestamp?: int|string|\DateTimeInterface,
 *         RequestCount?: int,
 *         SampledCount?: int,
 *         BorrowCount?: int,
 *         ...,
 *     }>,
 *     SamplingBoostStatisticsDocuments?: list<array{
 *         RuleName?: string,
 *         ServiceName?: string,
 *         Timestamp?: int|string|\DateTimeInterface,
 *         AnomalyCount?: int,
 *         TotalCount?: int,
 *         SampledAnomalyCount?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getServiceGraph(array $args = [])
 * @phpstan-method \Aws\Result getServiceGraph(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     GroupName?: string,
 *     GroupARN?: string,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceGraphAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     GroupName?: string,
 *     GroupARN?: string,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTimeSeriesServiceStatistics(array $args = [])
 * @phpstan-method \Aws\Result getTimeSeriesServiceStatistics(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     GroupName?: string,
 *     GroupARN?: string,
 *     EntitySelectorExpression?: string,
 *     Period?: int,
 *     ForecastStatistics?: bool,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTimeSeriesServiceStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTimeSeriesServiceStatisticsAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     GroupName?: string,
 *     GroupARN?: string,
 *     EntitySelectorExpression?: string,
 *     Period?: int,
 *     ForecastStatistics?: bool,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTraceGraph(array $args = [])
 * @phpstan-method \Aws\Result getTraceGraph(array{TraceIds?: list<string>, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTraceGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTraceGraphAsync(array{TraceIds?: list<string>, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getTraceSegmentDestination(array $args = [])
 * @phpstan-method \Aws\Result getTraceSegmentDestination(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTraceSegmentDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTraceSegmentDestinationAsync(array{...} $args = [])
 * @method \Aws\Result getTraceSummaries(array $args = [])
 * @phpstan-method \Aws\Result getTraceSummaries(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     TimeRangeType?: 'Event'|'Service'|'TraceId',
 *     Sampling?: bool,
 *     SamplingStrategy?: array{Name?: 'FixedRate'|'PartialScan', Value?: float, ...},
 *     FilterExpression?: string,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTraceSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTraceSummariesAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     TimeRangeType?: 'Event'|'Service'|'TraceId',
 *     Sampling?: bool,
 *     SamplingStrategy?: array{Name?: 'FixedRate'|'PartialScan', Value?: float, ...},
 *     FilterExpression?: string,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourcePolicies(array $args = [])
 * @phpstan-method \Aws\Result listResourcePolicies(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcePoliciesAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRetrievedTraces(array $args = [])
 * @phpstan-method \Aws\Result listRetrievedTraces(array{RetrievalToken?: string, TraceFormat?: 'OTEL'|'XRAY', NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRetrievedTracesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRetrievedTracesAsync(array{RetrievalToken?: string, TraceFormat?: 'OTEL'|'XRAY', NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result putEncryptionConfig(array $args = [])
 * @phpstan-method \Aws\Result putEncryptionConfig(array{KeyId?: string, Type?: 'KMS'|'NONE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putEncryptionConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEncryptionConfigAsync(array{KeyId?: string, Type?: 'KMS'|'NONE', ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{
 *     PolicyName?: string,
 *     PolicyDocument?: string,
 *     PolicyRevisionId?: string,
 *     BypassPolicyLockoutCheck?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{
 *     PolicyName?: string,
 *     PolicyDocument?: string,
 *     PolicyRevisionId?: string,
 *     BypassPolicyLockoutCheck?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTelemetryRecords(array $args = [])
 * @phpstan-method \Aws\Result putTelemetryRecords(array{
 *     TelemetryRecords?: list<array{
 *         Timestamp?: int|string|\DateTimeInterface,
 *         SegmentsReceivedCount?: int,
 *         SegmentsSentCount?: int,
 *         SegmentsSpilloverCount?: int,
 *         SegmentsRejectedCount?: int,
 *         BackendConnectionErrors?: array,
 *         ...,
 *     }>,
 *     EC2InstanceId?: string,
 *     Hostname?: string,
 *     ResourceARN?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTelemetryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTelemetryRecordsAsync(array{
 *     TelemetryRecords?: list<array{
 *         Timestamp?: int|string|\DateTimeInterface,
 *         SegmentsReceivedCount?: int,
 *         SegmentsSentCount?: int,
 *         SegmentsSpilloverCount?: int,
 *         SegmentsRejectedCount?: int,
 *         BackendConnectionErrors?: array,
 *         ...,
 *     }>,
 *     EC2InstanceId?: string,
 *     Hostname?: string,
 *     ResourceARN?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTraceSegments(array $args = [])
 * @phpstan-method \Aws\Result putTraceSegments(array{TraceSegmentDocuments?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putTraceSegmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTraceSegmentsAsync(array{TraceSegmentDocuments?: list<string>, ...} $args = [])
 * @method \Aws\Result startTraceRetrieval(array $args = [])
 * @phpstan-method \Aws\Result startTraceRetrieval(array{
 *     TraceIds?: list<string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTraceRetrievalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTraceRetrievalAsync(array{
 *     TraceIds?: list<string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateGroup(array{
 *     GroupName?: string,
 *     GroupARN?: string,
 *     FilterExpression?: string,
 *     InsightsConfiguration?: array{InsightsEnabled?: bool, NotificationsEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupAsync(array{
 *     GroupName?: string,
 *     GroupARN?: string,
 *     FilterExpression?: string,
 *     InsightsConfiguration?: array{InsightsEnabled?: bool, NotificationsEnabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIndexingRule(array $args = [])
 * @phpstan-method \Aws\Result updateIndexingRule(array{Name?: string, Rule?: array{Probabilistic?: array{DesiredSamplingPercentage?: float, ...}, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIndexingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIndexingRuleAsync(array{Name?: string, Rule?: array{Probabilistic?: array{DesiredSamplingPercentage?: float, ...}, ...}, ...} $args = [])
 * @method \Aws\Result updateSamplingRule(array $args = [])
 * @phpstan-method \Aws\Result updateSamplingRule(array{
 *     SamplingRuleUpdate?: array{
 *         RuleName?: string,
 *         RuleARN?: string,
 *         ResourceARN?: string,
 *         Priority?: int,
 *         FixedRate?: float,
 *         ReservoirSize?: int,
 *         Host?: string,
 *         ServiceName?: string,
 *         ServiceType?: string,
 *         HTTPMethod?: string,
 *         URLPath?: string,
 *         Attributes?: array<string, string>,
 *         SamplingRateBoost?: array{MaxRate?: float, CooldownWindowMinutes?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSamplingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSamplingRuleAsync(array{
 *     SamplingRuleUpdate?: array{
 *         RuleName?: string,
 *         RuleARN?: string,
 *         ResourceARN?: string,
 *         Priority?: int,
 *         FixedRate?: float,
 *         ReservoirSize?: int,
 *         Host?: string,
 *         ServiceName?: string,
 *         ServiceType?: string,
 *         HTTPMethod?: string,
 *         URLPath?: string,
 *         Attributes?: array<string, string>,
 *         SamplingRateBoost?: array{MaxRate?: float, CooldownWindowMinutes?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTraceSegmentDestination(array $args = [])
 * @phpstan-method \Aws\Result updateTraceSegmentDestination(array{Destination?: 'CloudWatchLogs'|'XRay', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTraceSegmentDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTraceSegmentDestinationAsync(array{Destination?: 'CloudWatchLogs'|'XRay', ...} $args = [])
 */
class XRayClient extends AwsClient {}
