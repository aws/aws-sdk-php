<?php
namespace Aws\BCMDashboards;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Billing and Cost Management Dashboards** service.
 * @method \Aws\Result createDashboard(array $args = [])
 * @phpstan-method \Aws\Result createDashboard(array{
 *     name?: string,
 *     description?: string,
 *     widgets?: list<array{
 *         id?: string,
 *         title?: string,
 *         description?: string,
 *         width?: int,
 *         height?: int,
 *         horizontalOffset?: int,
 *         configs?: list<array>,
 *         ...,
 *     }>,
 *     resourceTags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDashboardAsync(array{
 *     name?: string,
 *     description?: string,
 *     widgets?: list<array{
 *         id?: string,
 *         title?: string,
 *         description?: string,
 *         width?: int,
 *         height?: int,
 *         horizontalOffset?: int,
 *         configs?: list<array>,
 *         ...,
 *     }>,
 *     resourceTags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createScheduledReport(array $args = [])
 * @phpstan-method \Aws\Result createScheduledReport(array{
 *     scheduledReport?: array{
 *         name?: string,
 *         dashboardArn?: string,
 *         scheduledReportExecutionRoleArn?: string,
 *         scheduleConfig?: array{
 *             scheduleExpression?: string,
 *             scheduleExpressionTimeZone?: string,
 *             schedulePeriod?: array,
 *             state?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         description?: string,
 *         widgetIds?: list<string>,
 *         widgetDateRangeOverride?: array{startTime?: array, endTime?: array, ...},
 *         ...,
 *     },
 *     resourceTags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduledReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduledReportAsync(array{
 *     scheduledReport?: array{
 *         name?: string,
 *         dashboardArn?: string,
 *         scheduledReportExecutionRoleArn?: string,
 *         scheduleConfig?: array{
 *             scheduleExpression?: string,
 *             scheduleExpressionTimeZone?: string,
 *             schedulePeriod?: array,
 *             state?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         description?: string,
 *         widgetIds?: list<string>,
 *         widgetDateRangeOverride?: array{startTime?: array, endTime?: array, ...},
 *         ...,
 *     },
 *     resourceTags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDashboard(array $args = [])
 * @phpstan-method \Aws\Result deleteDashboard(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDashboardAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteScheduledReport(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduledReport(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduledReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduledReportAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result executeScheduledReport(array $args = [])
 * @phpstan-method \Aws\Result executeScheduledReport(array{arn?: string, clientToken?: string, dryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeScheduledReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeScheduledReportAsync(array{arn?: string, clientToken?: string, dryRun?: bool, ...} $args = [])
 * @method \Aws\Result getDashboard(array $args = [])
 * @phpstan-method \Aws\Result getDashboard(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDashboardAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result getScheduledReport(array $args = [])
 * @phpstan-method \Aws\Result getScheduledReport(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getScheduledReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScheduledReportAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result listDashboards(array $args = [])
 * @phpstan-method \Aws\Result listDashboards(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDashboardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDashboardsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listScheduledReports(array $args = [])
 * @phpstan-method \Aws\Result listScheduledReports(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScheduledReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScheduledReportsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, resourceTags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, resourceTags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, resourceTagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, resourceTagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDashboard(array $args = [])
 * @phpstan-method \Aws\Result updateDashboard(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     widgets?: list<array{
 *         id?: string,
 *         title?: string,
 *         description?: string,
 *         width?: int,
 *         height?: int,
 *         horizontalOffset?: int,
 *         configs?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDashboardAsync(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     widgets?: list<array{
 *         id?: string,
 *         title?: string,
 *         description?: string,
 *         width?: int,
 *         height?: int,
 *         horizontalOffset?: int,
 *         configs?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateScheduledReport(array $args = [])
 * @phpstan-method \Aws\Result updateScheduledReport(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     dashboardArn?: string,
 *     scheduledReportExecutionRoleArn?: string,
 *     scheduleConfig?: array{
 *         scheduleExpression?: string,
 *         scheduleExpressionTimeZone?: string,
 *         schedulePeriod?: array{startTime?: int|string|\DateTimeInterface, endTime?: int|string|\DateTimeInterface, ...},
 *         state?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     widgetIds?: list<string>,
 *     widgetDateRangeOverride?: array{
 *         startTime?: array{type?: 'ABSOLUTE'|'RELATIVE', value?: string, ...},
 *         endTime?: array{type?: 'ABSOLUTE'|'RELATIVE', value?: string, ...},
 *         ...,
 *     },
 *     clearWidgetIds?: bool,
 *     clearWidgetDateRangeOverride?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScheduledReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScheduledReportAsync(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     dashboardArn?: string,
 *     scheduledReportExecutionRoleArn?: string,
 *     scheduleConfig?: array{
 *         scheduleExpression?: string,
 *         scheduleExpressionTimeZone?: string,
 *         schedulePeriod?: array{startTime?: int|string|\DateTimeInterface, endTime?: int|string|\DateTimeInterface, ...},
 *         state?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     widgetIds?: list<string>,
 *     widgetDateRangeOverride?: array{
 *         startTime?: array{type?: 'ABSOLUTE'|'RELATIVE', value?: string, ...},
 *         endTime?: array{type?: 'ABSOLUTE'|'RELATIVE', value?: string, ...},
 *         ...,
 *     },
 *     clearWidgetIds?: bool,
 *     clearWidgetDateRangeOverride?: bool,
 *     ...,
 * } $args = [])
 */
class BCMDashboardsClient extends AwsClient {}
