<?php
namespace Aws\AppIntegrationsService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon AppIntegrations Service** service.
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     Name?: string,
 *     Namespace?: string,
 *     Description?: string,
 *     ApplicationSourceConfig?: array{ExternalUrlConfig?: array{AccessUrl?: string, ApprovedOrigins?: list<string>, ...}, ...},
 *     Subscriptions?: list<array{Event?: string, Description?: string, ...}>,
 *     Publications?: list<array{Event?: string, Schema?: string, Description?: string, ...}>,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     Permissions?: list<string>,
 *     IsService?: bool,
 *     InitializationTimeout?: int,
 *     ApplicationConfig?: array{ContactHandling?: array{Scope?: 'CROSS_CONTACTS'|'PER_CONTACT', ...}, ...},
 *     IframeConfig?: array{Allow?: list<string>, Sandbox?: list<string>, ...},
 *     ApplicationType?: 'MCP_SERVER'|'SERVICE'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     Name?: string,
 *     Namespace?: string,
 *     Description?: string,
 *     ApplicationSourceConfig?: array{ExternalUrlConfig?: array{AccessUrl?: string, ApprovedOrigins?: list<string>, ...}, ...},
 *     Subscriptions?: list<array{Event?: string, Description?: string, ...}>,
 *     Publications?: list<array{Event?: string, Schema?: string, Description?: string, ...}>,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     Permissions?: list<string>,
 *     IsService?: bool,
 *     InitializationTimeout?: int,
 *     ApplicationConfig?: array{ContactHandling?: array{Scope?: 'CROSS_CONTACTS'|'PER_CONTACT', ...}, ...},
 *     IframeConfig?: array{Allow?: list<string>, Sandbox?: list<string>, ...},
 *     ApplicationType?: 'MCP_SERVER'|'SERVICE'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataIntegration(array $args = [])
 * @phpstan-method \Aws\Result createDataIntegration(array{
 *     Name?: string,
 *     Description?: string,
 *     KmsKey?: string,
 *     SourceURI?: string,
 *     ScheduleConfig?: array{FirstExecutionFrom?: string, Object?: string, ScheduleExpression?: string, ...},
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     FileConfiguration?: array{Folders?: list<string>, Filters?: array<string, list<string>>, ...},
 *     ObjectConfiguration?: array<string, array<string, list<string>>>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataIntegrationAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     KmsKey?: string,
 *     SourceURI?: string,
 *     ScheduleConfig?: array{FirstExecutionFrom?: string, Object?: string, ScheduleExpression?: string, ...},
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     FileConfiguration?: array{Folders?: list<string>, Filters?: array<string, list<string>>, ...},
 *     ObjectConfiguration?: array<string, array<string, list<string>>>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataIntegrationAssociation(array $args = [])
 * @phpstan-method \Aws\Result createDataIntegrationAssociation(array{
 *     DataIntegrationIdentifier?: string,
 *     ClientId?: string,
 *     ObjectConfiguration?: array<string, array<string, list<string>>>,
 *     DestinationURI?: string,
 *     ClientAssociationMetadata?: array<string, string>,
 *     ClientToken?: string,
 *     ExecutionConfiguration?: array{
 *         ExecutionMode?: 'ON_DEMAND'|'SCHEDULED',
 *         OnDemandConfiguration?: array{StartTime?: string, EndTime?: string, ...},
 *         ScheduleConfiguration?: array{FirstExecutionFrom?: string, Object?: string, ScheduleExpression?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataIntegrationAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataIntegrationAssociationAsync(array{
 *     DataIntegrationIdentifier?: string,
 *     ClientId?: string,
 *     ObjectConfiguration?: array<string, array<string, list<string>>>,
 *     DestinationURI?: string,
 *     ClientAssociationMetadata?: array<string, string>,
 *     ClientToken?: string,
 *     ExecutionConfiguration?: array{
 *         ExecutionMode?: 'ON_DEMAND'|'SCHEDULED',
 *         OnDemandConfiguration?: array{StartTime?: string, EndTime?: string, ...},
 *         ScheduleConfiguration?: array{FirstExecutionFrom?: string, Object?: string, ScheduleExpression?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventIntegration(array $args = [])
 * @phpstan-method \Aws\Result createEventIntegration(array{
 *     Name?: string,
 *     Description?: string,
 *     EventFilter?: array{Source?: string, ...},
 *     EventBridgeBus?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventIntegrationAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     EventFilter?: array{Source?: string, ...},
 *     EventBridgeBus?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteDataIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteDataIntegration(array{DataIntegrationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataIntegrationAsync(array{DataIntegrationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEventIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteEventIntegration(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventIntegrationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getDataIntegration(array $args = [])
 * @phpstan-method \Aws\Result getDataIntegration(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataIntegrationAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getEventIntegration(array $args = [])
 * @phpstan-method \Aws\Result getEventIntegration(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventIntegrationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result listApplicationAssociations(array $args = [])
 * @phpstan-method \Aws\Result listApplicationAssociations(array{ApplicationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationAssociationsAsync(array{ApplicationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{NextToken?: string, MaxResults?: int, ApplicationType?: 'MCP_SERVER'|'SERVICE'|'STANDARD', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{NextToken?: string, MaxResults?: int, ApplicationType?: 'MCP_SERVER'|'SERVICE'|'STANDARD', ...} $args = [])
 * @method \Aws\Result listDataIntegrationAssociations(array $args = [])
 * @phpstan-method \Aws\Result listDataIntegrationAssociations(array{DataIntegrationIdentifier?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataIntegrationAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataIntegrationAssociationsAsync(array{DataIntegrationIdentifier?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listDataIntegrations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataIntegrationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEventIntegrationAssociations(array $args = [])
 * @phpstan-method \Aws\Result listEventIntegrationAssociations(array{EventIntegrationName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventIntegrationAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventIntegrationAssociationsAsync(array{EventIntegrationName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEventIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listEventIntegrations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventIntegrationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     Arn?: string,
 *     Name?: string,
 *     Description?: string,
 *     ApplicationSourceConfig?: array{ExternalUrlConfig?: array{AccessUrl?: string, ApprovedOrigins?: list<string>, ...}, ...},
 *     Subscriptions?: list<array{Event?: string, Description?: string, ...}>,
 *     Publications?: list<array{Event?: string, Schema?: string, Description?: string, ...}>,
 *     Permissions?: list<string>,
 *     IsService?: bool,
 *     InitializationTimeout?: int,
 *     ApplicationConfig?: array{ContactHandling?: array{Scope?: 'CROSS_CONTACTS'|'PER_CONTACT', ...}, ...},
 *     IframeConfig?: array{Allow?: list<string>, Sandbox?: list<string>, ...},
 *     ApplicationType?: 'MCP_SERVER'|'SERVICE'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     Arn?: string,
 *     Name?: string,
 *     Description?: string,
 *     ApplicationSourceConfig?: array{ExternalUrlConfig?: array{AccessUrl?: string, ApprovedOrigins?: list<string>, ...}, ...},
 *     Subscriptions?: list<array{Event?: string, Description?: string, ...}>,
 *     Publications?: list<array{Event?: string, Schema?: string, Description?: string, ...}>,
 *     Permissions?: list<string>,
 *     IsService?: bool,
 *     InitializationTimeout?: int,
 *     ApplicationConfig?: array{ContactHandling?: array{Scope?: 'CROSS_CONTACTS'|'PER_CONTACT', ...}, ...},
 *     IframeConfig?: array{Allow?: list<string>, Sandbox?: list<string>, ...},
 *     ApplicationType?: 'MCP_SERVER'|'SERVICE'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataIntegration(array $args = [])
 * @phpstan-method \Aws\Result updateDataIntegration(array{Identifier?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataIntegrationAsync(array{Identifier?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateDataIntegrationAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateDataIntegrationAssociation(array{
 *     DataIntegrationIdentifier?: string,
 *     DataIntegrationAssociationIdentifier?: string,
 *     ExecutionConfiguration?: array{
 *         ExecutionMode?: 'ON_DEMAND'|'SCHEDULED',
 *         OnDemandConfiguration?: array{StartTime?: string, EndTime?: string, ...},
 *         ScheduleConfiguration?: array{FirstExecutionFrom?: string, Object?: string, ScheduleExpression?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataIntegrationAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataIntegrationAssociationAsync(array{
 *     DataIntegrationIdentifier?: string,
 *     DataIntegrationAssociationIdentifier?: string,
 *     ExecutionConfiguration?: array{
 *         ExecutionMode?: 'ON_DEMAND'|'SCHEDULED',
 *         OnDemandConfiguration?: array{StartTime?: string, EndTime?: string, ...},
 *         ScheduleConfiguration?: array{FirstExecutionFrom?: string, Object?: string, ScheduleExpression?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventIntegration(array $args = [])
 * @phpstan-method \Aws\Result updateEventIntegration(array{Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventIntegrationAsync(array{Name?: string, Description?: string, ...} $args = [])
 */
class AppIntegrationsServiceClient extends AwsClient {}
