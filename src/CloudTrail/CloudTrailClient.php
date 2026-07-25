<?php
namespace Aws\CloudTrail;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudTrail** service.
 *
 * @method \Aws\Result addTags(array $args = [])
 * @phpstan-method \Aws\Result addTags(array{ResourceId?: string, TagsList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsAsync(array{ResourceId?: string, TagsList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result cancelQuery(array $args = [])
 * @phpstan-method \Aws\Result cancelQuery(array{EventDataStore?: string, QueryId?: string, EventDataStoreOwnerAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelQueryAsync(array{EventDataStore?: string, QueryId?: string, EventDataStoreOwnerAccountId?: string, ...} $args = [])
 * @method \Aws\Result createChannel(array $args = [])
 * @phpstan-method \Aws\Result createChannel(array{
 *     Name?: string,
 *     Source?: string,
 *     Destinations?: list<array{Type?: 'AWS_SERVICE'|'EVENT_DATA_STORE', Location?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelAsync(array{
 *     Name?: string,
 *     Source?: string,
 *     Destinations?: list<array{Type?: 'AWS_SERVICE'|'EVENT_DATA_STORE', Location?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDashboard(array $args = [])
 * @phpstan-method \Aws\Result createDashboard(array{
 *     Name?: string,
 *     RefreshSchedule?: array{
 *         Frequency?: array{Unit?: 'DAYS'|'HOURS', Value?: int, ...},
 *         Status?: 'DISABLED'|'ENABLED',
 *         TimeOfDay?: string,
 *         ...,
 *     },
 *     TagsList?: list<array{Key?: string, Value?: string, ...}>,
 *     TerminationProtectionEnabled?: bool,
 *     Widgets?: list<array{QueryStatement?: string, QueryParameters?: list<string>, ViewProperties?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDashboardAsync(array{
 *     Name?: string,
 *     RefreshSchedule?: array{
 *         Frequency?: array{Unit?: 'DAYS'|'HOURS', Value?: int, ...},
 *         Status?: 'DISABLED'|'ENABLED',
 *         TimeOfDay?: string,
 *         ...,
 *     },
 *     TagsList?: list<array{Key?: string, Value?: string, ...}>,
 *     TerminationProtectionEnabled?: bool,
 *     Widgets?: list<array{QueryStatement?: string, QueryParameters?: list<string>, ViewProperties?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventDataStore(array $args = [])
 * @phpstan-method \Aws\Result createEventDataStore(array{
 *     Name?: string,
 *     AdvancedEventSelectors?: list<array{Name?: string, FieldSelectors?: list<array>, ...}>,
 *     MultiRegionEnabled?: bool,
 *     OrganizationEnabled?: bool,
 *     RetentionPeriod?: int,
 *     TerminationProtectionEnabled?: bool,
 *     TagsList?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     StartIngestion?: bool,
 *     BillingMode?: 'EXTENDABLE_RETENTION_PRICING'|'FIXED_RETENTION_PRICING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventDataStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventDataStoreAsync(array{
 *     Name?: string,
 *     AdvancedEventSelectors?: list<array{Name?: string, FieldSelectors?: list<array>, ...}>,
 *     MultiRegionEnabled?: bool,
 *     OrganizationEnabled?: bool,
 *     RetentionPeriod?: int,
 *     TerminationProtectionEnabled?: bool,
 *     TagsList?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     StartIngestion?: bool,
 *     BillingMode?: 'EXTENDABLE_RETENTION_PRICING'|'FIXED_RETENTION_PRICING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrail(array $args = [])
 * @phpstan-method \Aws\Result createTrail(array{
 *     Name?: string,
 *     S3BucketName?: string,
 *     S3KeyPrefix?: string,
 *     SnsTopicName?: string,
 *     IncludeGlobalServiceEvents?: bool,
 *     IsMultiRegionTrail?: bool,
 *     EnableLogFileValidation?: bool,
 *     CloudWatchLogsLogGroupArn?: string,
 *     CloudWatchLogsRoleArn?: string,
 *     KmsKeyId?: string,
 *     IsOrganizationTrail?: bool,
 *     TagsList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrailAsync(array{
 *     Name?: string,
 *     S3BucketName?: string,
 *     S3KeyPrefix?: string,
 *     SnsTopicName?: string,
 *     IncludeGlobalServiceEvents?: bool,
 *     IsMultiRegionTrail?: bool,
 *     EnableLogFileValidation?: bool,
 *     CloudWatchLogsLogGroupArn?: string,
 *     CloudWatchLogsRoleArn?: string,
 *     KmsKeyId?: string,
 *     IsOrganizationTrail?: bool,
 *     TagsList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteChannel(array{Channel?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelAsync(array{Channel?: string, ...} $args = [])
 * @method \Aws\Result deleteDashboard(array $args = [])
 * @phpstan-method \Aws\Result deleteDashboard(array{DashboardId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDashboardAsync(array{DashboardId?: string, ...} $args = [])
 * @method \Aws\Result deleteEventDataStore(array $args = [])
 * @phpstan-method \Aws\Result deleteEventDataStore(array{EventDataStore?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventDataStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventDataStoreAsync(array{EventDataStore?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTrail(array $args = [])
 * @phpstan-method \Aws\Result deleteTrail(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrailAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deregisterOrganizationDelegatedAdmin(array $args = [])
 * @phpstan-method \Aws\Result deregisterOrganizationDelegatedAdmin(array{DelegatedAdminAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterOrganizationDelegatedAdminAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterOrganizationDelegatedAdminAsync(array{DelegatedAdminAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeQuery(array $args = [])
 * @phpstan-method \Aws\Result describeQuery(array{
 *     EventDataStore?: string,
 *     QueryId?: string,
 *     QueryAlias?: string,
 *     RefreshId?: string,
 *     EventDataStoreOwnerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQueryAsync(array{
 *     EventDataStore?: string,
 *     QueryId?: string,
 *     QueryAlias?: string,
 *     RefreshId?: string,
 *     EventDataStoreOwnerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTrails(array $args = [])
 * @phpstan-method \Aws\Result describeTrails(array{trailNameList?: list<string>, includeShadowTrails?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrailsAsync(array{trailNameList?: list<string>, includeShadowTrails?: bool, ...} $args = [])
 * @method \Aws\Result disableFederation(array $args = [])
 * @phpstan-method \Aws\Result disableFederation(array{EventDataStore?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableFederationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableFederationAsync(array{EventDataStore?: string, ...} $args = [])
 * @method \Aws\Result enableFederation(array $args = [])
 * @phpstan-method \Aws\Result enableFederation(array{EventDataStore?: string, FederationRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableFederationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableFederationAsync(array{EventDataStore?: string, FederationRoleArn?: string, ...} $args = [])
 * @method \Aws\Result generateQuery(array $args = [])
 * @phpstan-method \Aws\Result generateQuery(array{EventDataStores?: list<string>, Prompt?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise generateQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateQueryAsync(array{EventDataStores?: list<string>, Prompt?: string, ...} $args = [])
 * @method \Aws\Result getChannel(array $args = [])
 * @phpstan-method \Aws\Result getChannel(array{Channel?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelAsync(array{Channel?: string, ...} $args = [])
 * @method \Aws\Result getDashboard(array $args = [])
 * @phpstan-method \Aws\Result getDashboard(array{DashboardId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDashboardAsync(array{DashboardId?: string, ...} $args = [])
 * @method \Aws\Result getEventConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getEventConfiguration(array{TrailName?: string, EventDataStore?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventConfigurationAsync(array{TrailName?: string, EventDataStore?: string, ...} $args = [])
 * @method \Aws\Result getEventDataStore(array $args = [])
 * @phpstan-method \Aws\Result getEventDataStore(array{EventDataStore?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventDataStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventDataStoreAsync(array{EventDataStore?: string, ...} $args = [])
 * @method \Aws\Result getEventSelectors(array $args = [])
 * @phpstan-method \Aws\Result getEventSelectors(array{TrailName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventSelectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventSelectorsAsync(array{TrailName?: string, ...} $args = [])
 * @method \Aws\Result getImport(array $args = [])
 * @phpstan-method \Aws\Result getImport(array{ImportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImportAsync(array{ImportId?: string, ...} $args = [])
 * @method \Aws\Result getInsightSelectors(array $args = [])
 * @phpstan-method \Aws\Result getInsightSelectors(array{TrailName?: string, EventDataStore?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightSelectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInsightSelectorsAsync(array{TrailName?: string, EventDataStore?: string, ...} $args = [])
 * @method \Aws\Result getQueryResults(array $args = [])
 * @phpstan-method \Aws\Result getQueryResults(array{
 *     EventDataStore?: string,
 *     QueryId?: string,
 *     NextToken?: string,
 *     MaxQueryResults?: int,
 *     EventDataStoreOwnerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryResultsAsync(array{
 *     EventDataStore?: string,
 *     QueryId?: string,
 *     NextToken?: string,
 *     MaxQueryResults?: int,
 *     EventDataStoreOwnerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getTrail(array $args = [])
 * @phpstan-method \Aws\Result getTrail(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrailAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getTrailStatus(array $args = [])
 * @phpstan-method \Aws\Result getTrailStatus(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrailStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrailStatusAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @phpstan-method \Aws\Result listChannels(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDashboards(array $args = [])
 * @phpstan-method \Aws\Result listDashboards(array{NamePrefix?: string, Type?: 'CUSTOM'|'MANAGED', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDashboardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDashboardsAsync(array{NamePrefix?: string, Type?: 'CUSTOM'|'MANAGED', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEventDataStores(array $args = [])
 * @phpstan-method \Aws\Result listEventDataStores(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventDataStoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventDataStoresAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listImportFailures(array $args = [])
 * @phpstan-method \Aws\Result listImportFailures(array{ImportId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportFailuresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportFailuresAsync(array{ImportId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listImports(array $args = [])
 * @phpstan-method \Aws\Result listImports(array{
 *     MaxResults?: int,
 *     Destination?: string,
 *     ImportStatus?: 'COMPLETED'|'FAILED'|'INITIALIZING'|'IN_PROGRESS'|'STOPPED',
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportsAsync(array{
 *     MaxResults?: int,
 *     Destination?: string,
 *     ImportStatus?: 'COMPLETED'|'FAILED'|'INITIALIZING'|'IN_PROGRESS'|'STOPPED',
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInsightsData(array $args = [])
 * @phpstan-method \Aws\Result listInsightsData(array{
 *     InsightSource?: string,
 *     DataType?: 'InsightsEvents',
 *     Dimensions?: array<string, string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInsightsDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInsightsDataAsync(array{
 *     InsightSource?: string,
 *     DataType?: 'InsightsEvents',
 *     Dimensions?: array<string, string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInsightsMetricData(array $args = [])
 * @phpstan-method \Aws\Result listInsightsMetricData(array{
 *     TrailName?: string,
 *     EventSource?: string,
 *     EventName?: string,
 *     InsightType?: 'ApiCallRateInsight'|'ApiErrorRateInsight',
 *     ErrorCode?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Period?: int,
 *     DataType?: 'FillWithZeros'|'NonZeroData',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInsightsMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInsightsMetricDataAsync(array{
 *     TrailName?: string,
 *     EventSource?: string,
 *     EventName?: string,
 *     InsightType?: 'ApiCallRateInsight'|'ApiErrorRateInsight',
 *     ErrorCode?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Period?: int,
 *     DataType?: 'FillWithZeros'|'NonZeroData',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPublicKeys(array $args = [])
 * @phpstan-method \Aws\Result listPublicKeys(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPublicKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPublicKeysAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listQueries(array $args = [])
 * @phpstan-method \Aws\Result listQueries(array{
 *     EventDataStore?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     QueryStatus?: 'CANCELLED'|'FAILED'|'FINISHED'|'QUEUED'|'RUNNING'|'TIMED_OUT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueriesAsync(array{
 *     EventDataStore?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     QueryStatus?: 'CANCELLED'|'FAILED'|'FINISHED'|'QUEUED'|'RUNNING'|'TIMED_OUT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{ResourceIdList?: list<string>, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{ResourceIdList?: list<string>, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTrails(array $args = [])
 * @phpstan-method \Aws\Result listTrails(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrailsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result lookupEvents(array $args = [])
 * @phpstan-method \Aws\Result lookupEvents(array{
 *     LookupAttributes?: list<array{
 *         AttributeKey?: 'AccessKeyId'|'EventId'|'EventName'|'EventSource'|'ReadOnly'|'ResourceName'|'ResourceType'|'Username',
 *         AttributeValue?: string,
 *         ...,
 *     }>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     EventCategory?: 'insight',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise lookupEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise lookupEventsAsync(array{
 *     LookupAttributes?: list<array{
 *         AttributeKey?: 'AccessKeyId'|'EventId'|'EventName'|'EventSource'|'ReadOnly'|'ResourceName'|'ResourceType'|'Username',
 *         AttributeValue?: string,
 *         ...,
 *     }>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     EventCategory?: 'insight',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putEventConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putEventConfiguration(array{
 *     TrailName?: string,
 *     EventDataStore?: string,
 *     MaxEventSize?: 'Large'|'Standard',
 *     ContextKeySelectors?: list<array{Type?: 'RequestContext'|'TagContext', Equals?: list<string>, ...}>,
 *     AggregationConfigurations?: list<array{Templates?: list<'API_ACTIVITY'|'RESOURCE_ACCESS'|'USER_ACTIONS'>, EventCategory?: 'Data', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEventConfigurationAsync(array{
 *     TrailName?: string,
 *     EventDataStore?: string,
 *     MaxEventSize?: 'Large'|'Standard',
 *     ContextKeySelectors?: list<array{Type?: 'RequestContext'|'TagContext', Equals?: list<string>, ...}>,
 *     AggregationConfigurations?: list<array{Templates?: list<'API_ACTIVITY'|'RESOURCE_ACCESS'|'USER_ACTIONS'>, EventCategory?: 'Data', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putEventSelectors(array $args = [])
 * @phpstan-method \Aws\Result putEventSelectors(array{
 *     TrailName?: string,
 *     EventSelectors?: list<array{
 *         ReadWriteType?: 'All'|'ReadOnly'|'WriteOnly',
 *         IncludeManagementEvents?: bool,
 *         DataResources?: list<array>,
 *         ExcludeManagementEventSources?: list<string>,
 *         ...,
 *     }>,
 *     AdvancedEventSelectors?: list<array{Name?: string, FieldSelectors?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventSelectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEventSelectorsAsync(array{
 *     TrailName?: string,
 *     EventSelectors?: list<array{
 *         ReadWriteType?: 'All'|'ReadOnly'|'WriteOnly',
 *         IncludeManagementEvents?: bool,
 *         DataResources?: list<array>,
 *         ExcludeManagementEventSources?: list<string>,
 *         ...,
 *     }>,
 *     AdvancedEventSelectors?: list<array{Name?: string, FieldSelectors?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putInsightSelectors(array $args = [])
 * @phpstan-method \Aws\Result putInsightSelectors(array{
 *     TrailName?: string,
 *     InsightSelectors?: list<array{
 *         InsightType?: 'ApiCallRateInsight'|'ApiErrorRateInsight',
 *         EventCategories?: list<'Data'|'Management'>,
 *         ...,
 *     }>,
 *     EventDataStore?: string,
 *     InsightsDestination?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putInsightSelectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putInsightSelectorsAsync(array{
 *     TrailName?: string,
 *     InsightSelectors?: list<array{
 *         InsightType?: 'ApiCallRateInsight'|'ApiErrorRateInsight',
 *         EventCategories?: list<'Data'|'Management'>,
 *         ...,
 *     }>,
 *     EventDataStore?: string,
 *     InsightsDestination?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, ResourcePolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, ResourcePolicy?: string, ...} $args = [])
 * @method \Aws\Result registerOrganizationDelegatedAdmin(array $args = [])
 * @phpstan-method \Aws\Result registerOrganizationDelegatedAdmin(array{MemberAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerOrganizationDelegatedAdminAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerOrganizationDelegatedAdminAsync(array{MemberAccountId?: string, ...} $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @phpstan-method \Aws\Result removeTags(array{ResourceId?: string, TagsList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsAsync(array{ResourceId?: string, TagsList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result restoreEventDataStore(array $args = [])
 * @phpstan-method \Aws\Result restoreEventDataStore(array{EventDataStore?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreEventDataStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreEventDataStoreAsync(array{EventDataStore?: string, ...} $args = [])
 * @method \Aws\Result searchSampleQueries(array $args = [])
 * @phpstan-method \Aws\Result searchSampleQueries(array{SearchPhrase?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise searchSampleQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchSampleQueriesAsync(array{SearchPhrase?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result startDashboardRefresh(array $args = [])
 * @phpstan-method \Aws\Result startDashboardRefresh(array{DashboardId?: string, QueryParameterValues?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDashboardRefreshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDashboardRefreshAsync(array{DashboardId?: string, QueryParameterValues?: array<string, string>, ...} $args = [])
 * @method \Aws\Result startEventDataStoreIngestion(array $args = [])
 * @phpstan-method \Aws\Result startEventDataStoreIngestion(array{EventDataStore?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startEventDataStoreIngestionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEventDataStoreIngestionAsync(array{EventDataStore?: string, ...} $args = [])
 * @method \Aws\Result startImport(array $args = [])
 * @phpstan-method \Aws\Result startImport(array{
 *     Destinations?: list<string>,
 *     ImportSource?: array{S3?: array{S3LocationUri?: string, S3BucketRegion?: string, S3BucketAccessRoleArn?: string, ...}, ...},
 *     StartEventTime?: int|string|\DateTimeInterface,
 *     EndEventTime?: int|string|\DateTimeInterface,
 *     ImportId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportAsync(array{
 *     Destinations?: list<string>,
 *     ImportSource?: array{S3?: array{S3LocationUri?: string, S3BucketRegion?: string, S3BucketAccessRoleArn?: string, ...}, ...},
 *     StartEventTime?: int|string|\DateTimeInterface,
 *     EndEventTime?: int|string|\DateTimeInterface,
 *     ImportId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startLogging(array $args = [])
 * @phpstan-method \Aws\Result startLogging(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startLoggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startLoggingAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result startQuery(array $args = [])
 * @phpstan-method \Aws\Result startQuery(array{
 *     QueryStatement?: string,
 *     DeliveryS3Uri?: string,
 *     QueryAlias?: string,
 *     QueryParameters?: list<string>,
 *     EventDataStoreOwnerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQueryAsync(array{
 *     QueryStatement?: string,
 *     DeliveryS3Uri?: string,
 *     QueryAlias?: string,
 *     QueryParameters?: list<string>,
 *     EventDataStoreOwnerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopEventDataStoreIngestion(array $args = [])
 * @phpstan-method \Aws\Result stopEventDataStoreIngestion(array{EventDataStore?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEventDataStoreIngestionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopEventDataStoreIngestionAsync(array{EventDataStore?: string, ...} $args = [])
 * @method \Aws\Result stopImport(array $args = [])
 * @phpstan-method \Aws\Result stopImport(array{ImportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopImportAsync(array{ImportId?: string, ...} $args = [])
 * @method \Aws\Result stopLogging(array $args = [])
 * @phpstan-method \Aws\Result stopLogging(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopLoggingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopLoggingAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result updateChannel(array $args = [])
 * @phpstan-method \Aws\Result updateChannel(array{
 *     Channel?: string,
 *     Destinations?: list<array{Type?: 'AWS_SERVICE'|'EVENT_DATA_STORE', Location?: string, ...}>,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelAsync(array{
 *     Channel?: string,
 *     Destinations?: list<array{Type?: 'AWS_SERVICE'|'EVENT_DATA_STORE', Location?: string, ...}>,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDashboard(array $args = [])
 * @phpstan-method \Aws\Result updateDashboard(array{
 *     DashboardId?: string,
 *     Widgets?: list<array{QueryStatement?: string, QueryParameters?: list<string>, ViewProperties?: array<string, string>, ...}>,
 *     RefreshSchedule?: array{
 *         Frequency?: array{Unit?: 'DAYS'|'HOURS', Value?: int, ...},
 *         Status?: 'DISABLED'|'ENABLED',
 *         TimeOfDay?: string,
 *         ...,
 *     },
 *     TerminationProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDashboardAsync(array{
 *     DashboardId?: string,
 *     Widgets?: list<array{QueryStatement?: string, QueryParameters?: list<string>, ViewProperties?: array<string, string>, ...}>,
 *     RefreshSchedule?: array{
 *         Frequency?: array{Unit?: 'DAYS'|'HOURS', Value?: int, ...},
 *         Status?: 'DISABLED'|'ENABLED',
 *         TimeOfDay?: string,
 *         ...,
 *     },
 *     TerminationProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventDataStore(array $args = [])
 * @phpstan-method \Aws\Result updateEventDataStore(array{
 *     EventDataStore?: string,
 *     Name?: string,
 *     AdvancedEventSelectors?: list<array{Name?: string, FieldSelectors?: list<array>, ...}>,
 *     MultiRegionEnabled?: bool,
 *     OrganizationEnabled?: bool,
 *     RetentionPeriod?: int,
 *     TerminationProtectionEnabled?: bool,
 *     KmsKeyId?: string,
 *     BillingMode?: 'EXTENDABLE_RETENTION_PRICING'|'FIXED_RETENTION_PRICING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventDataStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventDataStoreAsync(array{
 *     EventDataStore?: string,
 *     Name?: string,
 *     AdvancedEventSelectors?: list<array{Name?: string, FieldSelectors?: list<array>, ...}>,
 *     MultiRegionEnabled?: bool,
 *     OrganizationEnabled?: bool,
 *     RetentionPeriod?: int,
 *     TerminationProtectionEnabled?: bool,
 *     KmsKeyId?: string,
 *     BillingMode?: 'EXTENDABLE_RETENTION_PRICING'|'FIXED_RETENTION_PRICING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrail(array $args = [])
 * @phpstan-method \Aws\Result updateTrail(array{
 *     Name?: string,
 *     S3BucketName?: string,
 *     S3KeyPrefix?: string,
 *     SnsTopicName?: string,
 *     IncludeGlobalServiceEvents?: bool,
 *     IsMultiRegionTrail?: bool,
 *     EnableLogFileValidation?: bool,
 *     CloudWatchLogsLogGroupArn?: string,
 *     CloudWatchLogsRoleArn?: string,
 *     KmsKeyId?: string,
 *     IsOrganizationTrail?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrailAsync(array{
 *     Name?: string,
 *     S3BucketName?: string,
 *     S3KeyPrefix?: string,
 *     SnsTopicName?: string,
 *     IncludeGlobalServiceEvents?: bool,
 *     IsMultiRegionTrail?: bool,
 *     EnableLogFileValidation?: bool,
 *     CloudWatchLogsLogGroupArn?: string,
 *     CloudWatchLogsRoleArn?: string,
 *     KmsKeyId?: string,
 *     IsOrganizationTrail?: bool,
 *     ...,
 * } $args = [])
 */
class CloudTrailClient extends AwsClient {}
