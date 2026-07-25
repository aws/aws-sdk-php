<?php
namespace Aws\InternetMonitor;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Internet Monitor** service.
 * @method \Aws\Result createMonitor(array $args = [])
 * @phpstan-method \Aws\Result createMonitor(array{
 *     MonitorName?: string,
 *     Resources?: list<string>,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     MaxCityNetworksToMonitor?: int,
 *     InternetMeasurementsLogDelivery?: array{
 *         S3Config?: array{BucketName?: string, BucketPrefix?: string, LogDeliveryStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     TrafficPercentageToMonitor?: int,
 *     HealthEventsConfig?: array{
 *         AvailabilityScoreThreshold?: float,
 *         PerformanceScoreThreshold?: float,
 *         AvailabilityLocalHealthEventsConfig?: array{Status?: 'DISABLED'|'ENABLED', HealthScoreThreshold?: float, MinTrafficImpact?: float, ...},
 *         PerformanceLocalHealthEventsConfig?: array{Status?: 'DISABLED'|'ENABLED', HealthScoreThreshold?: float, MinTrafficImpact?: float, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMonitorAsync(array{
 *     MonitorName?: string,
 *     Resources?: list<string>,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     MaxCityNetworksToMonitor?: int,
 *     InternetMeasurementsLogDelivery?: array{
 *         S3Config?: array{BucketName?: string, BucketPrefix?: string, LogDeliveryStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     TrafficPercentageToMonitor?: int,
 *     HealthEventsConfig?: array{
 *         AvailabilityScoreThreshold?: float,
 *         PerformanceScoreThreshold?: float,
 *         AvailabilityLocalHealthEventsConfig?: array{Status?: 'DISABLED'|'ENABLED', HealthScoreThreshold?: float, MinTrafficImpact?: float, ...},
 *         PerformanceLocalHealthEventsConfig?: array{Status?: 'DISABLED'|'ENABLED', HealthScoreThreshold?: float, MinTrafficImpact?: float, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteMonitor(array $args = [])
 * @phpstan-method \Aws\Result deleteMonitor(array{MonitorName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMonitorAsync(array{MonitorName?: string, ...} $args = [])
 * @method \Aws\Result getHealthEvent(array $args = [])
 * @phpstan-method \Aws\Result getHealthEvent(array{MonitorName?: string, EventId?: string, LinkedAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHealthEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHealthEventAsync(array{MonitorName?: string, EventId?: string, LinkedAccountId?: string, ...} $args = [])
 * @method \Aws\Result getInternetEvent(array $args = [])
 * @phpstan-method \Aws\Result getInternetEvent(array{EventId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInternetEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInternetEventAsync(array{EventId?: string, ...} $args = [])
 * @method \Aws\Result getMonitor(array $args = [])
 * @phpstan-method \Aws\Result getMonitor(array{MonitorName?: string, LinkedAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMonitorAsync(array{MonitorName?: string, LinkedAccountId?: string, ...} $args = [])
 * @method \Aws\Result getQueryResults(array $args = [])
 * @phpstan-method \Aws\Result getQueryResults(array{MonitorName?: string, QueryId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryResultsAsync(array{MonitorName?: string, QueryId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getQueryStatus(array $args = [])
 * @phpstan-method \Aws\Result getQueryStatus(array{MonitorName?: string, QueryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryStatusAsync(array{MonitorName?: string, QueryId?: string, ...} $args = [])
 * @method \Aws\Result listHealthEvents(array $args = [])
 * @phpstan-method \Aws\Result listHealthEvents(array{
 *     MonitorName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     EventStatus?: 'ACTIVE'|'RESOLVED',
 *     LinkedAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHealthEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHealthEventsAsync(array{
 *     MonitorName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     EventStatus?: 'ACTIVE'|'RESOLVED',
 *     LinkedAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInternetEvents(array $args = [])
 * @phpstan-method \Aws\Result listInternetEvents(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     EventStatus?: string,
 *     EventType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInternetEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInternetEventsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     EventStatus?: string,
 *     EventType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMonitors(array $args = [])
 * @phpstan-method \Aws\Result listMonitors(array{NextToken?: string, MaxResults?: int, MonitorStatus?: string, IncludeLinkedAccounts?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMonitorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitorsAsync(array{NextToken?: string, MaxResults?: int, MonitorStatus?: string, IncludeLinkedAccounts?: bool, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result startQuery(array $args = [])
 * @phpstan-method \Aws\Result startQuery(array{
 *     MonitorName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     QueryType?: 'MEASUREMENTS'|'OVERALL_TRAFFIC_SUGGESTIONS'|'OVERALL_TRAFFIC_SUGGESTIONS_DETAILS'|'ROUTING_SUGGESTIONS'|'TOP_LOCATIONS'|'TOP_LOCATION_DETAILS',
 *     FilterParameters?: list<array{Field?: string, Operator?: 'EQUALS'|'NOT_EQUALS', Values?: list<string>, ...}>,
 *     LinkedAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQueryAsync(array{
 *     MonitorName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     QueryType?: 'MEASUREMENTS'|'OVERALL_TRAFFIC_SUGGESTIONS'|'OVERALL_TRAFFIC_SUGGESTIONS_DETAILS'|'ROUTING_SUGGESTIONS'|'TOP_LOCATIONS'|'TOP_LOCATION_DETAILS',
 *     FilterParameters?: list<array{Field?: string, Operator?: 'EQUALS'|'NOT_EQUALS', Values?: list<string>, ...}>,
 *     LinkedAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopQuery(array $args = [])
 * @phpstan-method \Aws\Result stopQuery(array{MonitorName?: string, QueryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopQueryAsync(array{MonitorName?: string, QueryId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateMonitor(array $args = [])
 * @phpstan-method \Aws\Result updateMonitor(array{
 *     MonitorName?: string,
 *     ResourcesToAdd?: list<string>,
 *     ResourcesToRemove?: list<string>,
 *     Status?: 'ACTIVE'|'ERROR'|'INACTIVE'|'PENDING',
 *     ClientToken?: string,
 *     MaxCityNetworksToMonitor?: int,
 *     InternetMeasurementsLogDelivery?: array{
 *         S3Config?: array{BucketName?: string, BucketPrefix?: string, LogDeliveryStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     TrafficPercentageToMonitor?: int,
 *     HealthEventsConfig?: array{
 *         AvailabilityScoreThreshold?: float,
 *         PerformanceScoreThreshold?: float,
 *         AvailabilityLocalHealthEventsConfig?: array{Status?: 'DISABLED'|'ENABLED', HealthScoreThreshold?: float, MinTrafficImpact?: float, ...},
 *         PerformanceLocalHealthEventsConfig?: array{Status?: 'DISABLED'|'ENABLED', HealthScoreThreshold?: float, MinTrafficImpact?: float, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMonitorAsync(array{
 *     MonitorName?: string,
 *     ResourcesToAdd?: list<string>,
 *     ResourcesToRemove?: list<string>,
 *     Status?: 'ACTIVE'|'ERROR'|'INACTIVE'|'PENDING',
 *     ClientToken?: string,
 *     MaxCityNetworksToMonitor?: int,
 *     InternetMeasurementsLogDelivery?: array{
 *         S3Config?: array{BucketName?: string, BucketPrefix?: string, LogDeliveryStatus?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     TrafficPercentageToMonitor?: int,
 *     HealthEventsConfig?: array{
 *         AvailabilityScoreThreshold?: float,
 *         PerformanceScoreThreshold?: float,
 *         AvailabilityLocalHealthEventsConfig?: array{Status?: 'DISABLED'|'ENABLED', HealthScoreThreshold?: float, MinTrafficImpact?: float, ...},
 *         PerformanceLocalHealthEventsConfig?: array{Status?: 'DISABLED'|'ENABLED', HealthScoreThreshold?: float, MinTrafficImpact?: float, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class InternetMonitorClient extends AwsClient {}
