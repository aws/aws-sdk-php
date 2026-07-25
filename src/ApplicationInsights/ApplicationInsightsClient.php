<?php
namespace Aws\ApplicationInsights;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Application Insights** service.
 * @method \Aws\Result addWorkload(array $args = [])
 * @phpstan-method \Aws\Result addWorkload(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     WorkloadConfiguration?: array{
 *         WorkloadName?: string,
 *         Tier?: 'ACTIVE_DIRECTORY'|'CUSTOM'|'DEFAULT'|'DOT_NET_CORE'|'DOT_NET_WEB'|'DOT_NET_WEB_TIER'|'DOT_NET_WORKER'|'JAVA_JMX'|'MYSQL'|'ORACLE'|'POSTGRESQL'|'SAP_ASE_HIGH_AVAILABILITY'|'SAP_ASE_SINGLE_NODE'|'SAP_HANA_HIGH_AVAILABILITY'|'SAP_HANA_MULTI_NODE'|'SAP_HANA_SINGLE_NODE'|'SAP_NETWEAVER_DISTRIBUTED'|'SAP_NETWEAVER_HIGH_AVAILABILITY'|'SAP_NETWEAVER_STANDARD'|'SHAREPOINT'|'SQL_SERVER'|'SQL_SERVER_ALWAYSON_AVAILABILITY_GROUP'|'SQL_SERVER_FAILOVER_CLUSTER_INSTANCE',
 *         Configuration?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addWorkloadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addWorkloadAsync(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     WorkloadConfiguration?: array{
 *         WorkloadName?: string,
 *         Tier?: 'ACTIVE_DIRECTORY'|'CUSTOM'|'DEFAULT'|'DOT_NET_CORE'|'DOT_NET_WEB'|'DOT_NET_WEB_TIER'|'DOT_NET_WORKER'|'JAVA_JMX'|'MYSQL'|'ORACLE'|'POSTGRESQL'|'SAP_ASE_HIGH_AVAILABILITY'|'SAP_ASE_SINGLE_NODE'|'SAP_HANA_HIGH_AVAILABILITY'|'SAP_HANA_MULTI_NODE'|'SAP_HANA_SINGLE_NODE'|'SAP_NETWEAVER_DISTRIBUTED'|'SAP_NETWEAVER_HIGH_AVAILABILITY'|'SAP_NETWEAVER_STANDARD'|'SHAREPOINT'|'SQL_SERVER'|'SQL_SERVER_ALWAYSON_AVAILABILITY_GROUP'|'SQL_SERVER_FAILOVER_CLUSTER_INSTANCE',
 *         Configuration?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     ResourceGroupName?: string,
 *     OpsCenterEnabled?: bool,
 *     CWEMonitorEnabled?: bool,
 *     OpsItemSNSTopicArn?: string,
 *     SNSNotificationArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AutoConfigEnabled?: bool,
 *     AutoCreate?: bool,
 *     GroupingType?: 'ACCOUNT_BASED',
 *     AttachMissingPermission?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     ResourceGroupName?: string,
 *     OpsCenterEnabled?: bool,
 *     CWEMonitorEnabled?: bool,
 *     OpsItemSNSTopicArn?: string,
 *     SNSNotificationArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AutoConfigEnabled?: bool,
 *     AutoCreate?: bool,
 *     GroupingType?: 'ACCOUNT_BASED',
 *     AttachMissingPermission?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createComponent(array $args = [])
 * @phpstan-method \Aws\Result createComponent(array{ResourceGroupName?: string, ComponentName?: string, ResourceList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComponentAsync(array{ResourceGroupName?: string, ComponentName?: string, ResourceList?: list<string>, ...} $args = [])
 * @method \Aws\Result createLogPattern(array $args = [])
 * @phpstan-method \Aws\Result createLogPattern(array{
 *     ResourceGroupName?: string,
 *     PatternSetName?: string,
 *     PatternName?: string,
 *     Pattern?: string,
 *     Rank?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLogPatternAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLogPatternAsync(array{
 *     ResourceGroupName?: string,
 *     PatternSetName?: string,
 *     PatternName?: string,
 *     Pattern?: string,
 *     Rank?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{ResourceGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{ResourceGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteComponent(array $args = [])
 * @phpstan-method \Aws\Result deleteComponent(array{ResourceGroupName?: string, ComponentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteComponentAsync(array{ResourceGroupName?: string, ComponentName?: string, ...} $args = [])
 * @method \Aws\Result deleteLogPattern(array $args = [])
 * @phpstan-method \Aws\Result deleteLogPattern(array{ResourceGroupName?: string, PatternSetName?: string, PatternName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLogPatternAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLogPatternAsync(array{ResourceGroupName?: string, PatternSetName?: string, PatternName?: string, ...} $args = [])
 * @method \Aws\Result describeApplication(array $args = [])
 * @phpstan-method \Aws\Result describeApplication(array{ResourceGroupName?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationAsync(array{ResourceGroupName?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeComponent(array $args = [])
 * @phpstan-method \Aws\Result describeComponent(array{ResourceGroupName?: string, ComponentName?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeComponentAsync(array{ResourceGroupName?: string, ComponentName?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeComponentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeComponentConfiguration(array{ResourceGroupName?: string, ComponentName?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComponentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeComponentConfigurationAsync(array{ResourceGroupName?: string, ComponentName?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeComponentConfigurationRecommendation(array $args = [])
 * @phpstan-method \Aws\Result describeComponentConfigurationRecommendation(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     Tier?: 'ACTIVE_DIRECTORY'|'CUSTOM'|'DEFAULT'|'DOT_NET_CORE'|'DOT_NET_WEB'|'DOT_NET_WEB_TIER'|'DOT_NET_WORKER'|'JAVA_JMX'|'MYSQL'|'ORACLE'|'POSTGRESQL'|'SAP_ASE_HIGH_AVAILABILITY'|'SAP_ASE_SINGLE_NODE'|'SAP_HANA_HIGH_AVAILABILITY'|'SAP_HANA_MULTI_NODE'|'SAP_HANA_SINGLE_NODE'|'SAP_NETWEAVER_DISTRIBUTED'|'SAP_NETWEAVER_HIGH_AVAILABILITY'|'SAP_NETWEAVER_STANDARD'|'SHAREPOINT'|'SQL_SERVER'|'SQL_SERVER_ALWAYSON_AVAILABILITY_GROUP'|'SQL_SERVER_FAILOVER_CLUSTER_INSTANCE',
 *     WorkloadName?: string,
 *     RecommendationType?: 'ALL'|'INFRA_ONLY'|'WORKLOAD_ONLY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComponentConfigurationRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeComponentConfigurationRecommendationAsync(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     Tier?: 'ACTIVE_DIRECTORY'|'CUSTOM'|'DEFAULT'|'DOT_NET_CORE'|'DOT_NET_WEB'|'DOT_NET_WEB_TIER'|'DOT_NET_WORKER'|'JAVA_JMX'|'MYSQL'|'ORACLE'|'POSTGRESQL'|'SAP_ASE_HIGH_AVAILABILITY'|'SAP_ASE_SINGLE_NODE'|'SAP_HANA_HIGH_AVAILABILITY'|'SAP_HANA_MULTI_NODE'|'SAP_HANA_SINGLE_NODE'|'SAP_NETWEAVER_DISTRIBUTED'|'SAP_NETWEAVER_HIGH_AVAILABILITY'|'SAP_NETWEAVER_STANDARD'|'SHAREPOINT'|'SQL_SERVER'|'SQL_SERVER_ALWAYSON_AVAILABILITY_GROUP'|'SQL_SERVER_FAILOVER_CLUSTER_INSTANCE',
 *     WorkloadName?: string,
 *     RecommendationType?: 'ALL'|'INFRA_ONLY'|'WORKLOAD_ONLY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeLogPattern(array $args = [])
 * @phpstan-method \Aws\Result describeLogPattern(array{ResourceGroupName?: string, PatternSetName?: string, PatternName?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLogPatternAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLogPatternAsync(array{ResourceGroupName?: string, PatternSetName?: string, PatternName?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeObservation(array $args = [])
 * @phpstan-method \Aws\Result describeObservation(array{ObservationId?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeObservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeObservationAsync(array{ObservationId?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeProblem(array $args = [])
 * @phpstan-method \Aws\Result describeProblem(array{ProblemId?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProblemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProblemAsync(array{ProblemId?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeProblemObservations(array $args = [])
 * @phpstan-method \Aws\Result describeProblemObservations(array{ProblemId?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProblemObservationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProblemObservationsAsync(array{ProblemId?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeWorkload(array $args = [])
 * @phpstan-method \Aws\Result describeWorkload(array{ResourceGroupName?: string, ComponentName?: string, WorkloadId?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkloadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkloadAsync(array{ResourceGroupName?: string, ComponentName?: string, WorkloadId?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{MaxResults?: int, NextToken?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{MaxResults?: int, NextToken?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result listComponents(array $args = [])
 * @phpstan-method \Aws\Result listComponents(array{ResourceGroupName?: string, MaxResults?: int, NextToken?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentsAsync(array{ResourceGroupName?: string, MaxResults?: int, NextToken?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result listConfigurationHistory(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationHistory(array{
 *     ResourceGroupName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     EventStatus?: 'ERROR'|'INFO'|'WARN',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationHistoryAsync(array{
 *     ResourceGroupName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     EventStatus?: 'ERROR'|'INFO'|'WARN',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLogPatternSets(array $args = [])
 * @phpstan-method \Aws\Result listLogPatternSets(array{ResourceGroupName?: string, MaxResults?: int, NextToken?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLogPatternSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLogPatternSetsAsync(array{ResourceGroupName?: string, MaxResults?: int, NextToken?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result listLogPatterns(array $args = [])
 * @phpstan-method \Aws\Result listLogPatterns(array{
 *     ResourceGroupName?: string,
 *     PatternSetName?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLogPatternsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLogPatternsAsync(array{
 *     ResourceGroupName?: string,
 *     PatternSetName?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProblems(array $args = [])
 * @phpstan-method \Aws\Result listProblems(array{
 *     AccountId?: string,
 *     ResourceGroupName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ComponentName?: string,
 *     Visibility?: 'IGNORED'|'VISIBLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProblemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProblemsAsync(array{
 *     AccountId?: string,
 *     ResourceGroupName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ComponentName?: string,
 *     Visibility?: 'IGNORED'|'VISIBLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result listWorkloads(array $args = [])
 * @phpstan-method \Aws\Result listWorkloads(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkloadsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkloadsAsync(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeWorkload(array $args = [])
 * @phpstan-method \Aws\Result removeWorkload(array{ResourceGroupName?: string, ComponentName?: string, WorkloadId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeWorkloadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeWorkloadAsync(array{ResourceGroupName?: string, ComponentName?: string, WorkloadId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     ResourceGroupName?: string,
 *     OpsCenterEnabled?: bool,
 *     CWEMonitorEnabled?: bool,
 *     OpsItemSNSTopicArn?: string,
 *     SNSNotificationArn?: string,
 *     RemoveSNSTopic?: bool,
 *     AutoConfigEnabled?: bool,
 *     AttachMissingPermission?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     ResourceGroupName?: string,
 *     OpsCenterEnabled?: bool,
 *     CWEMonitorEnabled?: bool,
 *     OpsItemSNSTopicArn?: string,
 *     SNSNotificationArn?: string,
 *     RemoveSNSTopic?: bool,
 *     AutoConfigEnabled?: bool,
 *     AttachMissingPermission?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateComponent(array $args = [])
 * @phpstan-method \Aws\Result updateComponent(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     NewComponentName?: string,
 *     ResourceList?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateComponentAsync(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     NewComponentName?: string,
 *     ResourceList?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateComponentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateComponentConfiguration(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     Monitor?: bool,
 *     Tier?: 'ACTIVE_DIRECTORY'|'CUSTOM'|'DEFAULT'|'DOT_NET_CORE'|'DOT_NET_WEB'|'DOT_NET_WEB_TIER'|'DOT_NET_WORKER'|'JAVA_JMX'|'MYSQL'|'ORACLE'|'POSTGRESQL'|'SAP_ASE_HIGH_AVAILABILITY'|'SAP_ASE_SINGLE_NODE'|'SAP_HANA_HIGH_AVAILABILITY'|'SAP_HANA_MULTI_NODE'|'SAP_HANA_SINGLE_NODE'|'SAP_NETWEAVER_DISTRIBUTED'|'SAP_NETWEAVER_HIGH_AVAILABILITY'|'SAP_NETWEAVER_STANDARD'|'SHAREPOINT'|'SQL_SERVER'|'SQL_SERVER_ALWAYSON_AVAILABILITY_GROUP'|'SQL_SERVER_FAILOVER_CLUSTER_INSTANCE',
 *     ComponentConfiguration?: string,
 *     AutoConfigEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComponentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateComponentConfigurationAsync(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     Monitor?: bool,
 *     Tier?: 'ACTIVE_DIRECTORY'|'CUSTOM'|'DEFAULT'|'DOT_NET_CORE'|'DOT_NET_WEB'|'DOT_NET_WEB_TIER'|'DOT_NET_WORKER'|'JAVA_JMX'|'MYSQL'|'ORACLE'|'POSTGRESQL'|'SAP_ASE_HIGH_AVAILABILITY'|'SAP_ASE_SINGLE_NODE'|'SAP_HANA_HIGH_AVAILABILITY'|'SAP_HANA_MULTI_NODE'|'SAP_HANA_SINGLE_NODE'|'SAP_NETWEAVER_DISTRIBUTED'|'SAP_NETWEAVER_HIGH_AVAILABILITY'|'SAP_NETWEAVER_STANDARD'|'SHAREPOINT'|'SQL_SERVER'|'SQL_SERVER_ALWAYSON_AVAILABILITY_GROUP'|'SQL_SERVER_FAILOVER_CLUSTER_INSTANCE',
 *     ComponentConfiguration?: string,
 *     AutoConfigEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLogPattern(array $args = [])
 * @phpstan-method \Aws\Result updateLogPattern(array{
 *     ResourceGroupName?: string,
 *     PatternSetName?: string,
 *     PatternName?: string,
 *     Pattern?: string,
 *     Rank?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLogPatternAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLogPatternAsync(array{
 *     ResourceGroupName?: string,
 *     PatternSetName?: string,
 *     PatternName?: string,
 *     Pattern?: string,
 *     Rank?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProblem(array $args = [])
 * @phpstan-method \Aws\Result updateProblem(array{ProblemId?: string, UpdateStatus?: 'RESOLVED', Visibility?: 'IGNORED'|'VISIBLE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProblemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProblemAsync(array{ProblemId?: string, UpdateStatus?: 'RESOLVED', Visibility?: 'IGNORED'|'VISIBLE', ...} $args = [])
 * @method \Aws\Result updateWorkload(array $args = [])
 * @phpstan-method \Aws\Result updateWorkload(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     WorkloadId?: string,
 *     WorkloadConfiguration?: array{
 *         WorkloadName?: string,
 *         Tier?: 'ACTIVE_DIRECTORY'|'CUSTOM'|'DEFAULT'|'DOT_NET_CORE'|'DOT_NET_WEB'|'DOT_NET_WEB_TIER'|'DOT_NET_WORKER'|'JAVA_JMX'|'MYSQL'|'ORACLE'|'POSTGRESQL'|'SAP_ASE_HIGH_AVAILABILITY'|'SAP_ASE_SINGLE_NODE'|'SAP_HANA_HIGH_AVAILABILITY'|'SAP_HANA_MULTI_NODE'|'SAP_HANA_SINGLE_NODE'|'SAP_NETWEAVER_DISTRIBUTED'|'SAP_NETWEAVER_HIGH_AVAILABILITY'|'SAP_NETWEAVER_STANDARD'|'SHAREPOINT'|'SQL_SERVER'|'SQL_SERVER_ALWAYSON_AVAILABILITY_GROUP'|'SQL_SERVER_FAILOVER_CLUSTER_INSTANCE',
 *         Configuration?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkloadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkloadAsync(array{
 *     ResourceGroupName?: string,
 *     ComponentName?: string,
 *     WorkloadId?: string,
 *     WorkloadConfiguration?: array{
 *         WorkloadName?: string,
 *         Tier?: 'ACTIVE_DIRECTORY'|'CUSTOM'|'DEFAULT'|'DOT_NET_CORE'|'DOT_NET_WEB'|'DOT_NET_WEB_TIER'|'DOT_NET_WORKER'|'JAVA_JMX'|'MYSQL'|'ORACLE'|'POSTGRESQL'|'SAP_ASE_HIGH_AVAILABILITY'|'SAP_ASE_SINGLE_NODE'|'SAP_HANA_HIGH_AVAILABILITY'|'SAP_HANA_MULTI_NODE'|'SAP_HANA_SINGLE_NODE'|'SAP_NETWEAVER_DISTRIBUTED'|'SAP_NETWEAVER_HIGH_AVAILABILITY'|'SAP_NETWEAVER_STANDARD'|'SHAREPOINT'|'SQL_SERVER'|'SQL_SERVER_ALWAYSON_AVAILABILITY_GROUP'|'SQL_SERVER_FAILOVER_CLUSTER_INSTANCE',
 *         Configuration?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class ApplicationInsightsClient extends AwsClient {}
