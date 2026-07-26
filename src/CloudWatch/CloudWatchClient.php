<?php
namespace Aws\CloudWatch;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch** service.
 *
 * @method \Aws\Result associateDatasetKmsKey(array $args = [])
 * @phpstan-method \Aws\Result associateDatasetKmsKey(array{DatasetIdentifier?: string, KmsKeyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDatasetKmsKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDatasetKmsKeyAsync(array{DatasetIdentifier?: string, KmsKeyArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAlarmMuteRule(array $args = [])
 * @phpstan-method \Aws\Result deleteAlarmMuteRule(array{AlarmMuteRuleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAlarmMuteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAlarmMuteRuleAsync(array{AlarmMuteRuleName?: string, ...} $args = [])
 * @method \Aws\Result deleteAlarms(array $args = [])
 * @phpstan-method \Aws\Result deleteAlarms(array{AlarmNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAlarmsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAlarmsAsync(array{AlarmNames?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteAnomalyDetector(array $args = [])
 * @phpstan-method \Aws\Result deleteAnomalyDetector(array{
 *     AnomalyDetectorId?: string,
 *     Namespace?: string,
 *     MetricName?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     Stat?: string,
 *     SingleMetricAnomalyDetector?: array{
 *         AccountId?: string,
 *         Namespace?: string,
 *         MetricName?: string,
 *         Dimensions?: list<array>,
 *         Stat?: string,
 *         ...,
 *     },
 *     MetricMathAnomalyDetector?: array{MetricDataQueries?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnomalyDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnomalyDetectorAsync(array{
 *     AnomalyDetectorId?: string,
 *     Namespace?: string,
 *     MetricName?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     Stat?: string,
 *     SingleMetricAnomalyDetector?: array{
 *         AccountId?: string,
 *         Namespace?: string,
 *         MetricName?: string,
 *         Dimensions?: list<array>,
 *         Stat?: string,
 *         ...,
 *     },
 *     MetricMathAnomalyDetector?: array{MetricDataQueries?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDashboards(array $args = [])
 * @phpstan-method \Aws\Result deleteDashboards(array{DashboardNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDashboardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDashboardsAsync(array{DashboardNames?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteInsightRules(array $args = [])
 * @phpstan-method \Aws\Result deleteInsightRules(array{RuleNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInsightRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInsightRulesAsync(array{RuleNames?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteMetricStream(array $args = [])
 * @phpstan-method \Aws\Result deleteMetricStream(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMetricStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMetricStreamAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeAlarmContributors(array $args = [])
 * @phpstan-method \Aws\Result describeAlarmContributors(array{AlarmName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAlarmContributorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAlarmContributorsAsync(array{AlarmName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeAlarmHistory(array $args = [])
 * @phpstan-method \Aws\Result describeAlarmHistory(array{
 *     AlarmName?: string,
 *     AlarmContributorId?: string,
 *     AlarmTypes?: list<'CompositeAlarm'|'LogAlarm'|'MetricAlarm'>,
 *     HistoryItemType?: 'Action'|'AlarmContributorAction'|'AlarmContributorStateUpdate'|'ConfigurationUpdate'|'StateUpdate',
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ScanBy?: 'TimestampAscending'|'TimestampDescending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAlarmHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAlarmHistoryAsync(array{
 *     AlarmName?: string,
 *     AlarmContributorId?: string,
 *     AlarmTypes?: list<'CompositeAlarm'|'LogAlarm'|'MetricAlarm'>,
 *     HistoryItemType?: 'Action'|'AlarmContributorAction'|'AlarmContributorStateUpdate'|'ConfigurationUpdate'|'StateUpdate',
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ScanBy?: 'TimestampAscending'|'TimestampDescending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAlarms(array $args = [])
 * @phpstan-method \Aws\Result describeAlarms(array{
 *     AlarmNames?: list<string>,
 *     AlarmNamePrefix?: string,
 *     AlarmTypes?: list<'CompositeAlarm'|'LogAlarm'|'MetricAlarm'>,
 *     ChildrenOfAlarmName?: string,
 *     ParentsOfAlarmName?: string,
 *     StateValue?: 'ALARM'|'INSUFFICIENT_DATA'|'OK',
 *     ActionPrefix?: string,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAlarmsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAlarmsAsync(array{
 *     AlarmNames?: list<string>,
 *     AlarmNamePrefix?: string,
 *     AlarmTypes?: list<'CompositeAlarm'|'LogAlarm'|'MetricAlarm'>,
 *     ChildrenOfAlarmName?: string,
 *     ParentsOfAlarmName?: string,
 *     StateValue?: 'ALARM'|'INSUFFICIENT_DATA'|'OK',
 *     ActionPrefix?: string,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAlarmsForMetric(array $args = [])
 * @phpstan-method \Aws\Result describeAlarmsForMetric(array{
 *     MetricName?: string,
 *     Namespace?: string,
 *     Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *     ExtendedStatistic?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     Period?: int,
 *     Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAlarmsForMetricAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAlarmsForMetricAsync(array{
 *     MetricName?: string,
 *     Namespace?: string,
 *     Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *     ExtendedStatistic?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     Period?: int,
 *     Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAnomalyDetectors(array $args = [])
 * @phpstan-method \Aws\Result describeAnomalyDetectors(array{
 *     AnomalyDetectorIds?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Namespace?: string,
 *     MetricName?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     AnomalyDetectorTypes?: list<'METRIC_MATH'|'SINGLE_METRIC'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAnomalyDetectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAnomalyDetectorsAsync(array{
 *     AnomalyDetectorIds?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Namespace?: string,
 *     MetricName?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     AnomalyDetectorTypes?: list<'METRIC_MATH'|'SINGLE_METRIC'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInsightRules(array $args = [])
 * @phpstan-method \Aws\Result describeInsightRules(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInsightRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInsightRulesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result disableAlarmActions(array $args = [])
 * @phpstan-method \Aws\Result disableAlarmActions(array{AlarmNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableAlarmActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableAlarmActionsAsync(array{AlarmNames?: list<string>, ...} $args = [])
 * @method \Aws\Result disableInsightRules(array $args = [])
 * @phpstan-method \Aws\Result disableInsightRules(array{RuleNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableInsightRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableInsightRulesAsync(array{RuleNames?: list<string>, ...} $args = [])
 * @method \Aws\Result disassociateDatasetKmsKey(array $args = [])
 * @phpstan-method \Aws\Result disassociateDatasetKmsKey(array{DatasetIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateDatasetKmsKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDatasetKmsKeyAsync(array{DatasetIdentifier?: string, ...} $args = [])
 * @method \Aws\Result enableAlarmActions(array $args = [])
 * @phpstan-method \Aws\Result enableAlarmActions(array{AlarmNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableAlarmActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableAlarmActionsAsync(array{AlarmNames?: list<string>, ...} $args = [])
 * @method \Aws\Result enableInsightRules(array $args = [])
 * @phpstan-method \Aws\Result enableInsightRules(array{RuleNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableInsightRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableInsightRulesAsync(array{RuleNames?: list<string>, ...} $args = [])
 * @method \Aws\Result getAlarmMuteRule(array $args = [])
 * @phpstan-method \Aws\Result getAlarmMuteRule(array{AlarmMuteRuleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAlarmMuteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAlarmMuteRuleAsync(array{AlarmMuteRuleName?: string, ...} $args = [])
 * @method \Aws\Result getDashboard(array $args = [])
 * @phpstan-method \Aws\Result getDashboard(array{DashboardName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDashboardAsync(array{DashboardName?: string, ...} $args = [])
 * @method \Aws\Result getDataset(array $args = [])
 * @phpstan-method \Aws\Result getDataset(array{DatasetIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDatasetAsync(array{DatasetIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getInsightRuleReport(array $args = [])
 * @phpstan-method \Aws\Result getInsightRuleReport(array{
 *     RuleName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Period?: int,
 *     MaxContributorCount?: int,
 *     Metrics?: list<string>,
 *     OrderBy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightRuleReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInsightRuleReportAsync(array{
 *     RuleName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Period?: int,
 *     MaxContributorCount?: int,
 *     Metrics?: list<string>,
 *     OrderBy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMetricData(array $args = [])
 * @phpstan-method \Aws\Result getMetricData(array{
 *     MetricDataQueries?: list<array{
 *         Id?: string,
 *         MetricStat?: array,
 *         Expression?: string,
 *         Label?: string,
 *         ReturnData?: bool,
 *         Period?: int,
 *         AccountId?: string,
 *         ...,
 *     }>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     ScanBy?: 'TimestampAscending'|'TimestampDescending',
 *     MaxDatapoints?: int,
 *     LabelOptions?: array{Timezone?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetricDataAsync(array{
 *     MetricDataQueries?: list<array{
 *         Id?: string,
 *         MetricStat?: array,
 *         Expression?: string,
 *         Label?: string,
 *         ReturnData?: bool,
 *         Period?: int,
 *         AccountId?: string,
 *         ...,
 *     }>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     ScanBy?: 'TimestampAscending'|'TimestampDescending',
 *     MaxDatapoints?: int,
 *     LabelOptions?: array{Timezone?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMetricStatistics(array $args = [])
 * @phpstan-method \Aws\Result getMetricStatistics(array{
 *     Namespace?: string,
 *     MetricName?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Period?: int,
 *     Statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ExtendedStatistics?: list<string>,
 *     Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetricStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetricStatisticsAsync(array{
 *     Namespace?: string,
 *     MetricName?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Period?: int,
 *     Statistics?: list<'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum'>,
 *     ExtendedStatistics?: list<string>,
 *     Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMetricStream(array $args = [])
 * @phpstan-method \Aws\Result getMetricStream(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetricStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetricStreamAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getMetricWidgetImage(array $args = [])
 * @phpstan-method \Aws\Result getMetricWidgetImage(array{MetricWidget?: string, OutputFormat?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetricWidgetImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetricWidgetImageAsync(array{MetricWidget?: string, OutputFormat?: string, ...} $args = [])
 * @method \Aws\Result getOTelEnrichment(array $args = [])
 * @phpstan-method \Aws\Result getOTelEnrichment(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOTelEnrichmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOTelEnrichmentAsync(array{...} $args = [])
 * @method \Aws\Result listAlarmMuteRules(array $args = [])
 * @phpstan-method \Aws\Result listAlarmMuteRules(array{
 *     AlarmName?: string,
 *     Statuses?: list<'ACTIVE'|'EXPIRED'|'SCHEDULED'>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAlarmMuteRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAlarmMuteRulesAsync(array{
 *     AlarmName?: string,
 *     Statuses?: list<'ACTIVE'|'EXPIRED'|'SCHEDULED'>,
 *     MaxRecords?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDashboards(array $args = [])
 * @phpstan-method \Aws\Result listDashboards(array{DashboardNamePrefix?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDashboardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDashboardsAsync(array{DashboardNamePrefix?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listManagedInsightRules(array $args = [])
 * @phpstan-method \Aws\Result listManagedInsightRules(array{ResourceARN?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedInsightRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedInsightRulesAsync(array{ResourceARN?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMetricStreams(array $args = [])
 * @phpstan-method \Aws\Result listMetricStreams(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMetricStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMetricStreamsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMetrics(array $args = [])
 * @phpstan-method \Aws\Result listMetrics(array{
 *     Namespace?: string,
 *     MetricName?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     NextToken?: string,
 *     RecentlyActive?: 'PT3H',
 *     IncludeLinkedAccounts?: bool,
 *     OwningAccount?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMetricsAsync(array{
 *     Namespace?: string,
 *     MetricName?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     NextToken?: string,
 *     RecentlyActive?: 'PT3H',
 *     IncludeLinkedAccounts?: bool,
 *     OwningAccount?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result putAlarmMuteRule(array $args = [])
 * @phpstan-method \Aws\Result putAlarmMuteRule(array{
 *     Name?: string,
 *     Description?: string,
 *     Rule?: array{Schedule?: array{Expression?: string, Duration?: string, Timezone?: string, ...}, ...},
 *     MuteTargets?: array{AlarmNames?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StartDate?: int|string|\DateTimeInterface,
 *     ExpireDate?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAlarmMuteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAlarmMuteRuleAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Rule?: array{Schedule?: array{Expression?: string, Duration?: string, Timezone?: string, ...}, ...},
 *     MuteTargets?: array{AlarmNames?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StartDate?: int|string|\DateTimeInterface,
 *     ExpireDate?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAnomalyDetector(array $args = [])
 * @phpstan-method \Aws\Result putAnomalyDetector(array{
 *     Namespace?: string,
 *     MetricName?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     Stat?: string,
 *     Configuration?: array{ExcludedTimeRanges?: list<array>, MetricTimezone?: string, ...},
 *     MetricCharacteristics?: array{PeriodicSpikes?: bool, ...},
 *     SingleMetricAnomalyDetector?: array{
 *         AccountId?: string,
 *         Namespace?: string,
 *         MetricName?: string,
 *         Dimensions?: list<array>,
 *         Stat?: string,
 *         ...,
 *     },
 *     MetricMathAnomalyDetector?: array{MetricDataQueries?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAnomalyDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAnomalyDetectorAsync(array{
 *     Namespace?: string,
 *     MetricName?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     Stat?: string,
 *     Configuration?: array{ExcludedTimeRanges?: list<array>, MetricTimezone?: string, ...},
 *     MetricCharacteristics?: array{PeriodicSpikes?: bool, ...},
 *     SingleMetricAnomalyDetector?: array{
 *         AccountId?: string,
 *         Namespace?: string,
 *         MetricName?: string,
 *         Dimensions?: list<array>,
 *         Stat?: string,
 *         ...,
 *     },
 *     MetricMathAnomalyDetector?: array{MetricDataQueries?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putCompositeAlarm(array $args = [])
 * @phpstan-method \Aws\Result putCompositeAlarm(array{
 *     ActionsEnabled?: bool,
 *     AlarmActions?: list<string>,
 *     AlarmDescription?: string,
 *     AlarmName?: string,
 *     AlarmRule?: string,
 *     InsufficientDataActions?: list<string>,
 *     OKActions?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ActionsSuppressor?: string,
 *     ActionsSuppressorWaitPeriod?: int,
 *     ActionsSuppressorExtensionPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putCompositeAlarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putCompositeAlarmAsync(array{
 *     ActionsEnabled?: bool,
 *     AlarmActions?: list<string>,
 *     AlarmDescription?: string,
 *     AlarmName?: string,
 *     AlarmRule?: string,
 *     InsufficientDataActions?: list<string>,
 *     OKActions?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ActionsSuppressor?: string,
 *     ActionsSuppressorWaitPeriod?: int,
 *     ActionsSuppressorExtensionPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDashboard(array $args = [])
 * @phpstan-method \Aws\Result putDashboard(array{
 *     DashboardName?: string,
 *     DashboardBody?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDashboardAsync(array{
 *     DashboardName?: string,
 *     DashboardBody?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putInsightRule(array $args = [])
 * @phpstan-method \Aws\Result putInsightRule(array{
 *     RuleName?: string,
 *     RuleState?: string,
 *     RuleDefinition?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ApplyOnTransformedLogs?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putInsightRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putInsightRuleAsync(array{
 *     RuleName?: string,
 *     RuleState?: string,
 *     RuleDefinition?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ApplyOnTransformedLogs?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putLogAlarm(array $args = [])
 * @phpstan-method \Aws\Result putLogAlarm(array{
 *     AlarmName?: string,
 *     AlarmDescription?: string,
 *     ScheduledQueryConfiguration?: array{
 *         QueryString?: string,
 *         LogGroupIdentifiers?: list<string>,
 *         QueryARN?: string,
 *         ScheduledQueryRoleARN?: string,
 *         ScheduleConfiguration?: array{ScheduleExpression?: string, StartTimeOffset?: int, EndTimeOffset?: int, ...},
 *         AggregationExpression?: string,
 *         Tags?: list<array>,
 *         ...,
 *     },
 *     ActionLogLineCount?: int,
 *     ActionLogLineRoleArn?: string,
 *     ActionsEnabled?: bool,
 *     OKActions?: list<string>,
 *     AlarmActions?: list<string>,
 *     InsufficientDataActions?: list<string>,
 *     QueryResultsToEvaluate?: int,
 *     QueryResultsToAlarm?: int,
 *     Threshold?: float,
 *     ComparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'GreaterThanUpperThreshold'|'LessThanLowerOrGreaterThanUpperThreshold'|'LessThanLowerThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     TreatMissingData?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putLogAlarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLogAlarmAsync(array{
 *     AlarmName?: string,
 *     AlarmDescription?: string,
 *     ScheduledQueryConfiguration?: array{
 *         QueryString?: string,
 *         LogGroupIdentifiers?: list<string>,
 *         QueryARN?: string,
 *         ScheduledQueryRoleARN?: string,
 *         ScheduleConfiguration?: array{ScheduleExpression?: string, StartTimeOffset?: int, EndTimeOffset?: int, ...},
 *         AggregationExpression?: string,
 *         Tags?: list<array>,
 *         ...,
 *     },
 *     ActionLogLineCount?: int,
 *     ActionLogLineRoleArn?: string,
 *     ActionsEnabled?: bool,
 *     OKActions?: list<string>,
 *     AlarmActions?: list<string>,
 *     InsufficientDataActions?: list<string>,
 *     QueryResultsToEvaluate?: int,
 *     QueryResultsToAlarm?: int,
 *     Threshold?: float,
 *     ComparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'GreaterThanUpperThreshold'|'LessThanLowerOrGreaterThanUpperThreshold'|'LessThanLowerThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     TreatMissingData?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putManagedInsightRules(array $args = [])
 * @phpstan-method \Aws\Result putManagedInsightRules(array{ManagedRules?: list<array{TemplateName?: string, ResourceARN?: string, Tags?: list<array>, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putManagedInsightRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putManagedInsightRulesAsync(array{ManagedRules?: list<array{TemplateName?: string, ResourceARN?: string, Tags?: list<array>, ...}>, ...} $args = [])
 * @method \Aws\Result putMetricAlarm(array $args = [])
 * @phpstan-method \Aws\Result putMetricAlarm(array{
 *     AlarmName?: string,
 *     AlarmDescription?: string,
 *     ActionsEnabled?: bool,
 *     OKActions?: list<string>,
 *     AlarmActions?: list<string>,
 *     InsufficientDataActions?: list<string>,
 *     MetricName?: string,
 *     Namespace?: string,
 *     Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *     ExtendedStatistic?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     Period?: int,
 *     Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     EvaluationPeriods?: int,
 *     DatapointsToAlarm?: int,
 *     Threshold?: float,
 *     ComparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'GreaterThanUpperThreshold'|'LessThanLowerOrGreaterThanUpperThreshold'|'LessThanLowerThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     TreatMissingData?: string,
 *     EvaluateLowSampleCountPercentile?: string,
 *     Metrics?: list<array{
 *         Id?: string,
 *         MetricStat?: array,
 *         Expression?: string,
 *         Label?: string,
 *         ReturnData?: bool,
 *         Period?: int,
 *         AccountId?: string,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ThresholdMetricId?: string,
 *     EvaluationWindow?: array{WallClockWindow?: array{Timezone?: string, ...}, SlidingWindow?: array, ...},
 *     EvaluationCriteria?: array{PromQLCriteria?: array{Query?: string, PendingPeriod?: int, RecoveryPeriod?: int, ...}, ...},
 *     EvaluationInterval?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMetricAlarmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMetricAlarmAsync(array{
 *     AlarmName?: string,
 *     AlarmDescription?: string,
 *     ActionsEnabled?: bool,
 *     OKActions?: list<string>,
 *     AlarmActions?: list<string>,
 *     InsufficientDataActions?: list<string>,
 *     MetricName?: string,
 *     Namespace?: string,
 *     Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *     ExtendedStatistic?: string,
 *     Dimensions?: list<array{Name?: string, Value?: string, ...}>,
 *     Period?: int,
 *     Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     EvaluationPeriods?: int,
 *     DatapointsToAlarm?: int,
 *     Threshold?: float,
 *     ComparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'GreaterThanUpperThreshold'|'LessThanLowerOrGreaterThanUpperThreshold'|'LessThanLowerThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     TreatMissingData?: string,
 *     EvaluateLowSampleCountPercentile?: string,
 *     Metrics?: list<array{
 *         Id?: string,
 *         MetricStat?: array,
 *         Expression?: string,
 *         Label?: string,
 *         ReturnData?: bool,
 *         Period?: int,
 *         AccountId?: string,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ThresholdMetricId?: string,
 *     EvaluationWindow?: array{WallClockWindow?: array{Timezone?: string, ...}, SlidingWindow?: array, ...},
 *     EvaluationCriteria?: array{PromQLCriteria?: array{Query?: string, PendingPeriod?: int, RecoveryPeriod?: int, ...}, ...},
 *     EvaluationInterval?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putMetricData(array $args = [])
 * @phpstan-method \Aws\Result putMetricData(array{
 *     Namespace?: string,
 *     MetricData?: list<array{
 *         MetricName?: string,
 *         Dimensions?: list<array>,
 *         Timestamp?: int|string|\DateTimeInterface,
 *         Value?: float,
 *         StatisticValues?: array,
 *         Values?: list<float>,
 *         Counts?: list<float>,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         StorageResolution?: int,
 *         ...,
 *     }>,
 *     EntityMetricData?: list<array{Entity?: array, MetricData?: list<array>, ...}>,
 *     StrictEntityValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMetricDataAsync(array{
 *     Namespace?: string,
 *     MetricData?: list<array{
 *         MetricName?: string,
 *         Dimensions?: list<array>,
 *         Timestamp?: int|string|\DateTimeInterface,
 *         Value?: float,
 *         StatisticValues?: array,
 *         Values?: list<float>,
 *         Counts?: list<float>,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         StorageResolution?: int,
 *         ...,
 *     }>,
 *     EntityMetricData?: list<array{Entity?: array, MetricData?: list<array>, ...}>,
 *     StrictEntityValidation?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putMetricStream(array $args = [])
 * @phpstan-method \Aws\Result putMetricStream(array{
 *     Name?: string,
 *     IncludeFilters?: list<array{Namespace?: string, MetricNames?: list<string>, ...}>,
 *     ExcludeFilters?: list<array{Namespace?: string, MetricNames?: list<string>, ...}>,
 *     FirehoseArn?: string,
 *     RoleArn?: string,
 *     OutputFormat?: 'json'|'opentelemetry0.7'|'opentelemetry1.0',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StatisticsConfigurations?: list<array{IncludeMetrics?: list<array>, AdditionalStatistics?: list<string>, ...}>,
 *     IncludeLinkedAccountsMetrics?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMetricStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMetricStreamAsync(array{
 *     Name?: string,
 *     IncludeFilters?: list<array{Namespace?: string, MetricNames?: list<string>, ...}>,
 *     ExcludeFilters?: list<array{Namespace?: string, MetricNames?: list<string>, ...}>,
 *     FirehoseArn?: string,
 *     RoleArn?: string,
 *     OutputFormat?: 'json'|'opentelemetry0.7'|'opentelemetry1.0',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     StatisticsConfigurations?: list<array{IncludeMetrics?: list<array>, AdditionalStatistics?: list<string>, ...}>,
 *     IncludeLinkedAccountsMetrics?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setAlarmState(array $args = [])
 * @phpstan-method \Aws\Result setAlarmState(array{
 *     AlarmName?: string,
 *     StateValue?: 'ALARM'|'INSUFFICIENT_DATA'|'OK',
 *     StateReason?: string,
 *     StateReasonData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setAlarmStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setAlarmStateAsync(array{
 *     AlarmName?: string,
 *     StateValue?: 'ALARM'|'INSUFFICIENT_DATA'|'OK',
 *     StateReason?: string,
 *     StateReasonData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMetricStreams(array $args = [])
 * @phpstan-method \Aws\Result startMetricStreams(array{Names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMetricStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMetricStreamsAsync(array{Names?: list<string>, ...} $args = [])
 * @method \Aws\Result startOTelEnrichment(array $args = [])
 * @phpstan-method \Aws\Result startOTelEnrichment(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startOTelEnrichmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startOTelEnrichmentAsync(array{...} $args = [])
 * @method \Aws\Result stopMetricStreams(array $args = [])
 * @phpstan-method \Aws\Result stopMetricStreams(array{Names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopMetricStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopMetricStreamsAsync(array{Names?: list<string>, ...} $args = [])
 * @method \Aws\Result stopOTelEnrichment(array $args = [])
 * @phpstan-method \Aws\Result stopOTelEnrichment(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopOTelEnrichmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopOTelEnrichmentAsync(array{...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 */
class CloudWatchClient extends AwsClient {}
