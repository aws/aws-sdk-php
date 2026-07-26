<?php
namespace Aws\ApplicationSignals;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Application Signals** service.
 * @method \Aws\Result batchDeleteInstrumentationConfigurations(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteInstrumentationConfigurations(array{
 *     DeletionTarget?: array{
 *         Scope?: array{Service?: string, Environment?: string, InstrumentationType?: 'BREAKPOINT'|'PROBE', ...},
 *         ResourceArns?: array{ResourceArns?: list<string>, InstrumentationType?: 'BREAKPOINT'|'PROBE', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteInstrumentationConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteInstrumentationConfigurationsAsync(array{
 *     DeletionTarget?: array{
 *         Scope?: array{Service?: string, Environment?: string, InstrumentationType?: 'BREAKPOINT'|'PROBE', ...},
 *         ResourceArns?: array{ResourceArns?: list<string>, InstrumentationType?: 'BREAKPOINT'|'PROBE', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetServiceLevelObjectiveBudgetReport(array $args = [])
 * @phpstan-method \Aws\Result batchGetServiceLevelObjectiveBudgetReport(array{Timestamp?: int|string|\DateTimeInterface, SloIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetServiceLevelObjectiveBudgetReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetServiceLevelObjectiveBudgetReportAsync(array{Timestamp?: int|string|\DateTimeInterface, SloIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchUpdateExclusionWindows(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateExclusionWindows(array{
 *     SloIds?: list<string>,
 *     AddExclusionWindows?: list<array{Window?: array, StartTime?: int|string|\DateTimeInterface, RecurrenceRule?: array, Reason?: string, ...}>,
 *     RemoveExclusionWindows?: list<array{Window?: array, StartTime?: int|string|\DateTimeInterface, RecurrenceRule?: array, Reason?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateExclusionWindowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateExclusionWindowsAsync(array{
 *     SloIds?: list<string>,
 *     AddExclusionWindows?: list<array{Window?: array, StartTime?: int|string|\DateTimeInterface, RecurrenceRule?: array, Reason?: string, ...}>,
 *     RemoveExclusionWindows?: list<array{Window?: array, StartTime?: int|string|\DateTimeInterface, RecurrenceRule?: array, Reason?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInstrumentationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createInstrumentationConfiguration(array{
 *     InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *     Service?: string,
 *     Environment?: string,
 *     SignalType?: 'SNAPSHOT',
 *     Location?: array{
 *         CodeLocation?: array{
 *             Language?: 'Java'|'Javascript'|'Python',
 *             CodeUnit?: string,
 *             ClassName?: string,
 *             MethodName?: string,
 *             FilePath?: string,
 *             LineNumber?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     ExpiresAt?: int|string|\DateTimeInterface,
 *     AttributeFilters?: list<array<string, string>>,
 *     CaptureConfiguration?: array{
 *         CodeCapture?: array{
 *             CaptureArguments?: list<string>,
 *             CaptureReturn?: bool,
 *             CaptureStackTrace?: bool,
 *             CaptureLocals?: list<string>,
 *             CaptureLimits?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstrumentationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstrumentationConfigurationAsync(array{
 *     InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *     Service?: string,
 *     Environment?: string,
 *     SignalType?: 'SNAPSHOT',
 *     Location?: array{
 *         CodeLocation?: array{
 *             Language?: 'Java'|'Javascript'|'Python',
 *             CodeUnit?: string,
 *             ClassName?: string,
 *             MethodName?: string,
 *             FilePath?: string,
 *             LineNumber?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     ExpiresAt?: int|string|\DateTimeInterface,
 *     AttributeFilters?: list<array<string, string>>,
 *     CaptureConfiguration?: array{
 *         CodeCapture?: array{
 *             CaptureArguments?: list<string>,
 *             CaptureReturn?: bool,
 *             CaptureStackTrace?: bool,
 *             CaptureLocals?: list<string>,
 *             CaptureLimits?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceLevelObjective(array $args = [])
 * @phpstan-method \Aws\Result createServiceLevelObjective(array{
 *     Name?: string,
 *     Description?: string,
 *     SliConfig?: array{
 *         SliMetricConfig?: array{
 *             KeyAttributes?: array<string, string>,
 *             OperationName?: string,
 *             MetricType?: 'AVAILABILITY'|'LATENCY',
 *             MetricName?: string,
 *             Statistic?: string,
 *             PeriodSeconds?: int,
 *             MetricSource?: array,
 *             MetricDataQueries?: list<array>,
 *             DependencyConfig?: array,
 *             CompositeSliConfig?: array,
 *             ...,
 *         },
 *         MetricThreshold?: float,
 *         ComparisonOperator?: 'GreaterThan'|'GreaterThanOrEqualTo'|'LessThan'|'LessThanOrEqualTo',
 *         ...,
 *     },
 *     RequestBasedSliConfig?: array{
 *         RequestBasedSliMetricConfig?: array{
 *             KeyAttributes?: array<string, string>,
 *             OperationName?: string,
 *             MetricType?: 'AVAILABILITY'|'LATENCY',
 *             TotalRequestCountMetric?: list<array>,
 *             MonitoredRequestCountMetric?: array,
 *             DependencyConfig?: array,
 *             MetricSource?: array,
 *             MetricName?: string,
 *             CompositeSliConfig?: array,
 *             ...,
 *         },
 *         MetricThreshold?: float,
 *         ComparisonOperator?: 'GreaterThan'|'GreaterThanOrEqualTo'|'LessThan'|'LessThanOrEqualTo',
 *         ...,
 *     },
 *     Goal?: array{
 *         Interval?: array{RollingInterval?: array, CalendarInterval?: array, ...},
 *         AttainmentGoal?: float,
 *         WarningThreshold?: float,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     BurnRateConfigurations?: list<array{LookBackWindowMinutes?: int, ...}>,
 *     CreateRecommendedSlo?: bool,
 *     AutoInvestigationEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceLevelObjectiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceLevelObjectiveAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     SliConfig?: array{
 *         SliMetricConfig?: array{
 *             KeyAttributes?: array<string, string>,
 *             OperationName?: string,
 *             MetricType?: 'AVAILABILITY'|'LATENCY',
 *             MetricName?: string,
 *             Statistic?: string,
 *             PeriodSeconds?: int,
 *             MetricSource?: array,
 *             MetricDataQueries?: list<array>,
 *             DependencyConfig?: array,
 *             CompositeSliConfig?: array,
 *             ...,
 *         },
 *         MetricThreshold?: float,
 *         ComparisonOperator?: 'GreaterThan'|'GreaterThanOrEqualTo'|'LessThan'|'LessThanOrEqualTo',
 *         ...,
 *     },
 *     RequestBasedSliConfig?: array{
 *         RequestBasedSliMetricConfig?: array{
 *             KeyAttributes?: array<string, string>,
 *             OperationName?: string,
 *             MetricType?: 'AVAILABILITY'|'LATENCY',
 *             TotalRequestCountMetric?: list<array>,
 *             MonitoredRequestCountMetric?: array,
 *             DependencyConfig?: array,
 *             MetricSource?: array,
 *             MetricName?: string,
 *             CompositeSliConfig?: array,
 *             ...,
 *         },
 *         MetricThreshold?: float,
 *         ComparisonOperator?: 'GreaterThan'|'GreaterThanOrEqualTo'|'LessThan'|'LessThanOrEqualTo',
 *         ...,
 *     },
 *     Goal?: array{
 *         Interval?: array{RollingInterval?: array, CalendarInterval?: array, ...},
 *         AttainmentGoal?: float,
 *         WarningThreshold?: float,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     BurnRateConfigurations?: list<array{LookBackWindowMinutes?: int, ...}>,
 *     CreateRecommendedSlo?: bool,
 *     AutoInvestigationEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGroupingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteGroupingConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupingConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result deleteInstrumentationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteInstrumentationConfiguration(array{
 *     InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *     Service?: string,
 *     Environment?: string,
 *     SignalType?: 'SNAPSHOT',
 *     LocationIdentifier?: array{
 *         CodeLocation?: array{
 *             Language?: 'Java'|'Javascript'|'Python',
 *             CodeUnit?: string,
 *             ClassName?: string,
 *             MethodName?: string,
 *             FilePath?: string,
 *             LineNumber?: int,
 *             ...,
 *         },
 *         LocationHash?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstrumentationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstrumentationConfigurationAsync(array{
 *     InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *     Service?: string,
 *     Environment?: string,
 *     SignalType?: 'SNAPSHOT',
 *     LocationIdentifier?: array{
 *         CodeLocation?: array{
 *             Language?: 'Java'|'Javascript'|'Python',
 *             CodeUnit?: string,
 *             ClassName?: string,
 *             MethodName?: string,
 *             FilePath?: string,
 *             LineNumber?: int,
 *             ...,
 *         },
 *         LocationHash?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteServiceLevelObjective(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceLevelObjective(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceLevelObjectiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceLevelObjectiveAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getInstrumentationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getInstrumentationConfiguration(array{
 *     InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *     Service?: string,
 *     Environment?: string,
 *     SignalType?: 'SNAPSHOT',
 *     LocationIdentifier?: array{
 *         CodeLocation?: array{
 *             Language?: 'Java'|'Javascript'|'Python',
 *             CodeUnit?: string,
 *             ClassName?: string,
 *             MethodName?: string,
 *             FilePath?: string,
 *             LineNumber?: int,
 *             ...,
 *         },
 *         LocationHash?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstrumentationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstrumentationConfigurationAsync(array{
 *     InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *     Service?: string,
 *     Environment?: string,
 *     SignalType?: 'SNAPSHOT',
 *     LocationIdentifier?: array{
 *         CodeLocation?: array{
 *             Language?: 'Java'|'Javascript'|'Python',
 *             CodeUnit?: string,
 *             ClassName?: string,
 *             MethodName?: string,
 *             FilePath?: string,
 *             LineNumber?: int,
 *             ...,
 *         },
 *         LocationHash?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getInstrumentationConfigurationStatus(array $args = [])
 * @phpstan-method \Aws\Result getInstrumentationConfigurationStatus(array{
 *     InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *     Service?: string,
 *     Environment?: string,
 *     SignalType?: 'SNAPSHOT',
 *     LocationIdentifier?: array{
 *         CodeLocation?: array{
 *             Language?: 'Java'|'Javascript'|'Python',
 *             CodeUnit?: string,
 *             ClassName?: string,
 *             MethodName?: string,
 *             FilePath?: string,
 *             LineNumber?: int,
 *             ...,
 *         },
 *         LocationHash?: string,
 *         ...,
 *     },
 *     Status?: 'ACTIVE'|'DISABLED'|'ERROR'|'READY',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstrumentationConfigurationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstrumentationConfigurationStatusAsync(array{
 *     InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *     Service?: string,
 *     Environment?: string,
 *     SignalType?: 'SNAPSHOT',
 *     LocationIdentifier?: array{
 *         CodeLocation?: array{
 *             Language?: 'Java'|'Javascript'|'Python',
 *             CodeUnit?: string,
 *             ClassName?: string,
 *             MethodName?: string,
 *             FilePath?: string,
 *             LineNumber?: int,
 *             ...,
 *         },
 *         LocationHash?: string,
 *         ...,
 *     },
 *     Status?: 'ACTIVE'|'DISABLED'|'ERROR'|'READY',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getService(array $args = [])
 * @phpstan-method \Aws\Result getService(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KeyAttributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KeyAttributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getServiceLevelObjective(array $args = [])
 * @phpstan-method \Aws\Result getServiceLevelObjective(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceLevelObjectiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceLevelObjectiveAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result listAuditFindings(array $args = [])
 * @phpstan-method \Aws\Result listAuditFindings(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Auditors?: list<string>,
 *     AuditTargets?: list<array{Type?: string, Data?: array, ...}>,
 *     DetailLevel?: 'BRIEF'|'DETAILED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAuditFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAuditFindingsAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Auditors?: list<string>,
 *     AuditTargets?: list<array{Type?: string, Data?: array, ...}>,
 *     DetailLevel?: 'BRIEF'|'DETAILED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEntityEvents(array $args = [])
 * @phpstan-method \Aws\Result listEntityEvents(array{
 *     Entity?: array<string, string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntityEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntityEventsAsync(array{
 *     Entity?: array<string, string>,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroupingAttributeDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listGroupingAttributeDefinitions(array{NextToken?: string, AwsAccountId?: string, IncludeLinkedAccounts?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupingAttributeDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupingAttributeDefinitionsAsync(array{NextToken?: string, AwsAccountId?: string, IncludeLinkedAccounts?: bool, ...} $args = [])
 * @method \Aws\Result listInstrumentationConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listInstrumentationConfigurations(array{
 *     Service?: string,
 *     Environment?: string,
 *     InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *     SyncedAt?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstrumentationConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstrumentationConfigurationsAsync(array{
 *     Service?: string,
 *     Environment?: string,
 *     InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *     SyncedAt?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceDependencies(array $args = [])
 * @phpstan-method \Aws\Result listServiceDependencies(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KeyAttributes?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceDependenciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceDependenciesAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KeyAttributes?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceDependents(array $args = [])
 * @phpstan-method \Aws\Result listServiceDependents(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KeyAttributes?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceDependentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceDependentsAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KeyAttributes?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceLevelObjectiveExclusionWindows(array $args = [])
 * @phpstan-method \Aws\Result listServiceLevelObjectiveExclusionWindows(array{Id?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceLevelObjectiveExclusionWindowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceLevelObjectiveExclusionWindowsAsync(array{Id?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listServiceLevelObjectives(array $args = [])
 * @phpstan-method \Aws\Result listServiceLevelObjectives(array{
 *     KeyAttributes?: array<string, string>,
 *     OperationName?: string,
 *     DependencyConfig?: array{DependencyKeyAttributes?: array<string, string>, DependencyOperationName?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     MetricSourceTypes?: list<'AppMonitor'|'Canary'|'CloudWatchMetric'|'Service'|'ServiceDependency'|'ServiceOperation'>,
 *     IncludeLinkedAccounts?: bool,
 *     SloOwnerAwsAccountId?: string,
 *     MetricSource?: array{MetricSourceKeyAttributes?: array<string, string>, MetricSourceAttributes?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceLevelObjectivesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceLevelObjectivesAsync(array{
 *     KeyAttributes?: array<string, string>,
 *     OperationName?: string,
 *     DependencyConfig?: array{DependencyKeyAttributes?: array<string, string>, DependencyOperationName?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     MetricSourceTypes?: list<'AppMonitor'|'Canary'|'CloudWatchMetric'|'Service'|'ServiceDependency'|'ServiceOperation'>,
 *     IncludeLinkedAccounts?: bool,
 *     SloOwnerAwsAccountId?: string,
 *     MetricSource?: array{MetricSourceKeyAttributes?: array<string, string>, MetricSourceAttributes?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceOperations(array $args = [])
 * @phpstan-method \Aws\Result listServiceOperations(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KeyAttributes?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceOperationsAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KeyAttributes?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceStates(array $args = [])
 * @phpstan-method \Aws\Result listServiceStates(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     IncludeLinkedAccounts?: bool,
 *     AwsAccountId?: string,
 *     AttributeFilters?: list<array{AttributeFilterName?: string, AttributeFilterValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceStatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceStatesAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     IncludeLinkedAccounts?: bool,
 *     AwsAccountId?: string,
 *     AttributeFilters?: list<array{AttributeFilterName?: string, AttributeFilterValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     IncludeLinkedAccounts?: bool,
 *     AwsAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     IncludeLinkedAccounts?: bool,
 *     AwsAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putGroupingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putGroupingConfiguration(array{
 *     GroupingAttributeDefinitions?: list<array{GroupingName?: string, GroupingSourceKeys?: list<string>, DefaultGroupingValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putGroupingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putGroupingConfigurationAsync(array{
 *     GroupingAttributeDefinitions?: list<array{GroupingName?: string, GroupingSourceKeys?: list<string>, DefaultGroupingValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result reportInstrumentationConfigurationStatus(array $args = [])
 * @phpstan-method \Aws\Result reportInstrumentationConfigurationStatus(array{
 *     Service?: string,
 *     Environment?: string,
 *     Configurations?: list<array{
 *         InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *         SignalType?: 'SNAPSHOT',
 *         LocationHash?: string,
 *         Status?: 'ACTIVE'|'DISABLED'|'ERROR'|'READY',
 *         Time?: int|string|\DateTimeInterface,
 *         ErrorCause?: 'FILE_NOT_FOUND'|'LANGUAGE_MISMATCH'|'LINE_NOT_EXECUTABLE'|'METHOD_NOT_FOUND'|'OVERLOADED_METHODS'|'RUNTIME_ERROR',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise reportInstrumentationConfigurationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reportInstrumentationConfigurationStatusAsync(array{
 *     Service?: string,
 *     Environment?: string,
 *     Configurations?: list<array{
 *         InstrumentationType?: 'BREAKPOINT'|'PROBE',
 *         SignalType?: 'SNAPSHOT',
 *         LocationHash?: string,
 *         Status?: 'ACTIVE'|'DISABLED'|'ERROR'|'READY',
 *         Time?: int|string|\DateTimeInterface,
 *         ErrorCause?: 'FILE_NOT_FOUND'|'LANGUAGE_MISMATCH'|'LINE_NOT_EXECUTABLE'|'METHOD_NOT_FOUND'|'OVERLOADED_METHODS'|'RUNTIME_ERROR',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDiscovery(array $args = [])
 * @phpstan-method \Aws\Result startDiscovery(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDiscoveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDiscoveryAsync(array{...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateServiceLevelObjective(array $args = [])
 * @phpstan-method \Aws\Result updateServiceLevelObjective(array{
 *     Id?: string,
 *     Description?: string,
 *     SliConfig?: array{
 *         SliMetricConfig?: array{
 *             KeyAttributes?: array<string, string>,
 *             OperationName?: string,
 *             MetricType?: 'AVAILABILITY'|'LATENCY',
 *             MetricName?: string,
 *             Statistic?: string,
 *             PeriodSeconds?: int,
 *             MetricSource?: array,
 *             MetricDataQueries?: list<array>,
 *             DependencyConfig?: array,
 *             CompositeSliConfig?: array,
 *             ...,
 *         },
 *         MetricThreshold?: float,
 *         ComparisonOperator?: 'GreaterThan'|'GreaterThanOrEqualTo'|'LessThan'|'LessThanOrEqualTo',
 *         ...,
 *     },
 *     RequestBasedSliConfig?: array{
 *         RequestBasedSliMetricConfig?: array{
 *             KeyAttributes?: array<string, string>,
 *             OperationName?: string,
 *             MetricType?: 'AVAILABILITY'|'LATENCY',
 *             TotalRequestCountMetric?: list<array>,
 *             MonitoredRequestCountMetric?: array,
 *             DependencyConfig?: array,
 *             MetricSource?: array,
 *             MetricName?: string,
 *             CompositeSliConfig?: array,
 *             ...,
 *         },
 *         MetricThreshold?: float,
 *         ComparisonOperator?: 'GreaterThan'|'GreaterThanOrEqualTo'|'LessThan'|'LessThanOrEqualTo',
 *         ...,
 *     },
 *     Goal?: array{
 *         Interval?: array{RollingInterval?: array, CalendarInterval?: array, ...},
 *         AttainmentGoal?: float,
 *         WarningThreshold?: float,
 *         ...,
 *     },
 *     BurnRateConfigurations?: list<array{LookBackWindowMinutes?: int, ...}>,
 *     AutoInvestigationEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceLevelObjectiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceLevelObjectiveAsync(array{
 *     Id?: string,
 *     Description?: string,
 *     SliConfig?: array{
 *         SliMetricConfig?: array{
 *             KeyAttributes?: array<string, string>,
 *             OperationName?: string,
 *             MetricType?: 'AVAILABILITY'|'LATENCY',
 *             MetricName?: string,
 *             Statistic?: string,
 *             PeriodSeconds?: int,
 *             MetricSource?: array,
 *             MetricDataQueries?: list<array>,
 *             DependencyConfig?: array,
 *             CompositeSliConfig?: array,
 *             ...,
 *         },
 *         MetricThreshold?: float,
 *         ComparisonOperator?: 'GreaterThan'|'GreaterThanOrEqualTo'|'LessThan'|'LessThanOrEqualTo',
 *         ...,
 *     },
 *     RequestBasedSliConfig?: array{
 *         RequestBasedSliMetricConfig?: array{
 *             KeyAttributes?: array<string, string>,
 *             OperationName?: string,
 *             MetricType?: 'AVAILABILITY'|'LATENCY',
 *             TotalRequestCountMetric?: list<array>,
 *             MonitoredRequestCountMetric?: array,
 *             DependencyConfig?: array,
 *             MetricSource?: array,
 *             MetricName?: string,
 *             CompositeSliConfig?: array,
 *             ...,
 *         },
 *         MetricThreshold?: float,
 *         ComparisonOperator?: 'GreaterThan'|'GreaterThanOrEqualTo'|'LessThan'|'LessThanOrEqualTo',
 *         ...,
 *     },
 *     Goal?: array{
 *         Interval?: array{RollingInterval?: array, CalendarInterval?: array, ...},
 *         AttainmentGoal?: float,
 *         WarningThreshold?: float,
 *         ...,
 *     },
 *     BurnRateConfigurations?: list<array{LookBackWindowMinutes?: int, ...}>,
 *     AutoInvestigationEnabled?: bool,
 *     ...,
 * } $args = [])
 */
class ApplicationSignalsClient extends AwsClient {}
