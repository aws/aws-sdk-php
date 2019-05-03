<?php
namespace Aws\XRay;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS X-Ray** service.
 * @method \Aws\Result batchGetTraces(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetTracesAsync(array $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @method \Aws\Result createSamplingRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSamplingRuleAsync(array $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @method \Aws\Result deleteSamplingRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSamplingRuleAsync(array $args = [])
 * @method \Aws\Result getEncryptionConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEncryptionConfigAsync(array $args = [])
 * @method \Aws\Result getGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @method \Aws\Result getGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupsAsync(array $args = [])
 * @method \Aws\Result getSamplingRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSamplingRulesAsync(array $args = [])
 * @method \Aws\Result getSamplingStatisticSummaries(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSamplingStatisticSummariesAsync(array $args = [])
 * @method \Aws\Result getSamplingTargets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSamplingTargetsAsync(array $args = [])
 * @method \Aws\Result getServiceGraph(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceGraphAsync(array $args = [])
 * @method \Aws\Result getTimeSeriesServiceStatistics(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTimeSeriesServiceStatisticsAsync(array $args = [])
 * @method \Aws\Result getTraceGraph(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTraceGraphAsync(array $args = [])
 * @method \Aws\Result getTraceSummaries(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTraceSummariesAsync(array $args = [])
 * @method \Aws\Result putEncryptionConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putEncryptionConfigAsync(array $args = [])
 * @method \Aws\Result putTelemetryRecords(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putTelemetryRecordsAsync(array $args = [])
 * @method \Aws\Result putTraceSegments(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putTraceSegmentsAsync(array $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @method \Aws\Result updateSamplingRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSamplingRuleAsync(array $args = [])
 */
class XRayClient extends AwsClient {}
