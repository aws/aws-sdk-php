<?php
namespace Aws\EventBridge;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EventBridge** service.
 * @method \Aws\Result activateEventSource(array $args = [])
 * @phpstan-method \Aws\Result activateEventSource(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise activateEventSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateEventSourceAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result cancelReplay(array $args = [])
 * @phpstan-method \Aws\Result cancelReplay(array{ReplayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelReplayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelReplayAsync(array{ReplayName?: string, ...} $args = [])
 * @method \Aws\Result createApiDestination(array $args = [])
 * @phpstan-method \Aws\Result createApiDestination(array{
 *     Name?: string,
 *     Description?: string,
 *     ConnectionArn?: string,
 *     InvocationEndpoint?: string,
 *     HttpMethod?: 'DELETE'|'GET'|'HEAD'|'OPTIONS'|'PATCH'|'POST'|'PUT',
 *     InvocationRateLimitPerSecond?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApiDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApiDestinationAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     ConnectionArn?: string,
 *     InvocationEndpoint?: string,
 *     HttpMethod?: 'DELETE'|'GET'|'HEAD'|'OPTIONS'|'PATCH'|'POST'|'PUT',
 *     InvocationRateLimitPerSecond?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createArchive(array $args = [])
 * @phpstan-method \Aws\Result createArchive(array{
 *     ArchiveName?: string,
 *     EventSourceArn?: string,
 *     Description?: string,
 *     EventPattern?: string,
 *     RetentionDays?: int,
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createArchiveAsync(array{
 *     ArchiveName?: string,
 *     EventSourceArn?: string,
 *     Description?: string,
 *     EventPattern?: string,
 *     RetentionDays?: int,
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @phpstan-method \Aws\Result createConnection(array{
 *     Name?: string,
 *     Description?: string,
 *     AuthorizationType?: 'API_KEY'|'BASIC'|'OAUTH_CLIENT_CREDENTIALS',
 *     AuthParameters?: array{
 *         BasicAuthParameters?: array{Username?: string, Password?: string, ...},
 *         OAuthParameters?: array{
 *             ClientParameters?: array,
 *             AuthorizationEndpoint?: string,
 *             HttpMethod?: 'GET'|'POST'|'PUT',
 *             OAuthHttpParameters?: array,
 *             ...,
 *         },
 *         ApiKeyAuthParameters?: array{ApiKeyName?: string, ApiKeyValue?: string, ...},
 *         InvocationHttpParameters?: array{HeaderParameters?: list<array>, QueryStringParameters?: list<array>, BodyParameters?: list<array>, ...},
 *         ConnectivityParameters?: array{ResourceParameters?: array, ...},
 *         ...,
 *     },
 *     InvocationConnectivityParameters?: array{ResourceParameters?: array{ResourceConfigurationArn?: string, ...}, ...},
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     AuthorizationType?: 'API_KEY'|'BASIC'|'OAUTH_CLIENT_CREDENTIALS',
 *     AuthParameters?: array{
 *         BasicAuthParameters?: array{Username?: string, Password?: string, ...},
 *         OAuthParameters?: array{
 *             ClientParameters?: array,
 *             AuthorizationEndpoint?: string,
 *             HttpMethod?: 'GET'|'POST'|'PUT',
 *             OAuthHttpParameters?: array,
 *             ...,
 *         },
 *         ApiKeyAuthParameters?: array{ApiKeyName?: string, ApiKeyValue?: string, ...},
 *         InvocationHttpParameters?: array{HeaderParameters?: list<array>, QueryStringParameters?: list<array>, BodyParameters?: list<array>, ...},
 *         ConnectivityParameters?: array{ResourceParameters?: array, ...},
 *         ...,
 *     },
 *     InvocationConnectivityParameters?: array{ResourceParameters?: array{ResourceConfigurationArn?: string, ...}, ...},
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createEndpoint(array{
 *     Name?: string,
 *     Description?: string,
 *     RoutingConfig?: array{FailoverConfig?: array{Primary?: array, Secondary?: array, ...}, ...},
 *     ReplicationConfig?: array{State?: 'DISABLED'|'ENABLED', ...},
 *     EventBuses?: list<array{EventBusArn?: string, ...}>,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEndpointAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     RoutingConfig?: array{FailoverConfig?: array{Primary?: array, Secondary?: array, ...}, ...},
 *     ReplicationConfig?: array{State?: 'DISABLED'|'ENABLED', ...},
 *     EventBuses?: list<array{EventBusArn?: string, ...}>,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventBus(array $args = [])
 * @phpstan-method \Aws\Result createEventBus(array{
 *     Name?: string,
 *     EventSourceName?: string,
 *     Description?: string,
 *     KmsKeyIdentifier?: string,
 *     DeadLetterConfig?: array{Arn?: string, ...},
 *     LogConfig?: array{IncludeDetail?: 'FULL'|'NONE', Level?: 'ERROR'|'INFO'|'OFF'|'TRACE', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventBusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventBusAsync(array{
 *     Name?: string,
 *     EventSourceName?: string,
 *     Description?: string,
 *     KmsKeyIdentifier?: string,
 *     DeadLetterConfig?: array{Arn?: string, ...},
 *     LogConfig?: array{IncludeDetail?: 'FULL'|'NONE', Level?: 'ERROR'|'INFO'|'OFF'|'TRACE', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPartnerEventSource(array $args = [])
 * @phpstan-method \Aws\Result createPartnerEventSource(array{Name?: string, Account?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPartnerEventSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPartnerEventSourceAsync(array{Name?: string, Account?: string, ...} $args = [])
 * @method \Aws\Result deactivateEventSource(array $args = [])
 * @phpstan-method \Aws\Result deactivateEventSource(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateEventSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateEventSourceAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deauthorizeConnection(array $args = [])
 * @phpstan-method \Aws\Result deauthorizeConnection(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deauthorizeConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deauthorizeConnectionAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteApiDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteApiDestination(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApiDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApiDestinationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteArchive(array $args = [])
 * @phpstan-method \Aws\Result deleteArchive(array{ArchiveName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteArchiveAsync(array{ArchiveName?: string, ...} $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpoint(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteEventBus(array $args = [])
 * @phpstan-method \Aws\Result deleteEventBus(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventBusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventBusAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deletePartnerEventSource(array $args = [])
 * @phpstan-method \Aws\Result deletePartnerEventSource(array{Name?: string, Account?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePartnerEventSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePartnerEventSourceAsync(array{Name?: string, Account?: string, ...} $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRule(array{Name?: string, EventBusName?: string, Force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleAsync(array{Name?: string, EventBusName?: string, Force?: bool, ...} $args = [])
 * @method \Aws\Result describeApiDestination(array $args = [])
 * @phpstan-method \Aws\Result describeApiDestination(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApiDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApiDestinationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeArchive(array $args = [])
 * @phpstan-method \Aws\Result describeArchive(array{ArchiveName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeArchiveAsync(array{ArchiveName?: string, ...} $args = [])
 * @method \Aws\Result describeConnection(array $args = [])
 * @phpstan-method \Aws\Result describeConnection(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectionAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result describeEndpoint(array{Name?: string, HomeRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointAsync(array{Name?: string, HomeRegion?: string, ...} $args = [])
 * @method \Aws\Result describeEventBus(array $args = [])
 * @phpstan-method \Aws\Result describeEventBus(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventBusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventBusAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeEventSource(array $args = [])
 * @phpstan-method \Aws\Result describeEventSource(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventSourceAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describePartnerEventSource(array $args = [])
 * @phpstan-method \Aws\Result describePartnerEventSource(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePartnerEventSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePartnerEventSourceAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeReplay(array $args = [])
 * @phpstan-method \Aws\Result describeReplay(array{ReplayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplayAsync(array{ReplayName?: string, ...} $args = [])
 * @method \Aws\Result describeRule(array $args = [])
 * @phpstan-method \Aws\Result describeRule(array{Name?: string, EventBusName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRuleAsync(array{Name?: string, EventBusName?: string, ...} $args = [])
 * @method \Aws\Result disableRule(array $args = [])
 * @phpstan-method \Aws\Result disableRule(array{Name?: string, EventBusName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableRuleAsync(array{Name?: string, EventBusName?: string, ...} $args = [])
 * @method \Aws\Result enableRule(array $args = [])
 * @phpstan-method \Aws\Result enableRule(array{Name?: string, EventBusName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableRuleAsync(array{Name?: string, EventBusName?: string, ...} $args = [])
 * @method \Aws\Result listApiDestinations(array $args = [])
 * @phpstan-method \Aws\Result listApiDestinations(array{NamePrefix?: string, ConnectionArn?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApiDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApiDestinationsAsync(array{NamePrefix?: string, ConnectionArn?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listArchives(array $args = [])
 * @phpstan-method \Aws\Result listArchives(array{
 *     NamePrefix?: string,
 *     EventSourceArn?: string,
 *     State?: 'CREATE_FAILED'|'CREATING'|'DISABLED'|'ENABLED'|'UPDATE_FAILED'|'UPDATING',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listArchivesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listArchivesAsync(array{
 *     NamePrefix?: string,
 *     EventSourceArn?: string,
 *     State?: 'CREATE_FAILED'|'CREATING'|'DISABLED'|'ENABLED'|'UPDATE_FAILED'|'UPDATING',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listConnections(array $args = [])
 * @phpstan-method \Aws\Result listConnections(array{
 *     NamePrefix?: string,
 *     ConnectionState?: 'ACTIVE'|'AUTHORIZED'|'AUTHORIZING'|'CREATING'|'DEAUTHORIZED'|'DEAUTHORIZING'|'DELETING'|'FAILED_CONNECTIVITY'|'UPDATING',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectionsAsync(array{
 *     NamePrefix?: string,
 *     ConnectionState?: 'ACTIVE'|'AUTHORIZED'|'AUTHORIZING'|'CREATING'|'DEAUTHORIZED'|'DEAUTHORIZING'|'DELETING'|'FAILED_CONNECTIVITY'|'UPDATING',
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listEndpoints(array{NamePrefix?: string, HomeRegion?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEndpointsAsync(array{NamePrefix?: string, HomeRegion?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEventBuses(array $args = [])
 * @phpstan-method \Aws\Result listEventBuses(array{NamePrefix?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventBusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventBusesAsync(array{NamePrefix?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listEventSources(array $args = [])
 * @phpstan-method \Aws\Result listEventSources(array{NamePrefix?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventSourcesAsync(array{NamePrefix?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listPartnerEventSourceAccounts(array $args = [])
 * @phpstan-method \Aws\Result listPartnerEventSourceAccounts(array{EventSourceName?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPartnerEventSourceAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPartnerEventSourceAccountsAsync(array{EventSourceName?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listPartnerEventSources(array $args = [])
 * @phpstan-method \Aws\Result listPartnerEventSources(array{NamePrefix?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPartnerEventSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPartnerEventSourcesAsync(array{NamePrefix?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listReplays(array $args = [])
 * @phpstan-method \Aws\Result listReplays(array{
 *     NamePrefix?: string,
 *     State?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'FAILED'|'RUNNING'|'STARTING',
 *     EventSourceArn?: string,
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReplaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReplaysAsync(array{
 *     NamePrefix?: string,
 *     State?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'FAILED'|'RUNNING'|'STARTING',
 *     EventSourceArn?: string,
 *     NextToken?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRuleNamesByTarget(array $args = [])
 * @phpstan-method \Aws\Result listRuleNamesByTarget(array{TargetArn?: string, EventBusName?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuleNamesByTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuleNamesByTargetAsync(array{TargetArn?: string, EventBusName?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listRules(array $args = [])
 * @phpstan-method \Aws\Result listRules(array{NamePrefix?: string, EventBusName?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRulesAsync(array{NamePrefix?: string, EventBusName?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result listTargetsByRule(array $args = [])
 * @phpstan-method \Aws\Result listTargetsByRule(array{Rule?: string, EventBusName?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetsByRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetsByRuleAsync(array{Rule?: string, EventBusName?: string, NextToken?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result putEvents(array $args = [])
 * @phpstan-method \Aws\Result putEvents(array{
 *     Entries?: list<array{
 *         Time?: int|string|\DateTimeInterface,
 *         Source?: string,
 *         Resources?: list<string>,
 *         DetailType?: string,
 *         Detail?: string,
 *         EventBusName?: string,
 *         TraceHeader?: string,
 *         ...,
 *     }>,
 *     EndpointId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEventsAsync(array{
 *     Entries?: list<array{
 *         Time?: int|string|\DateTimeInterface,
 *         Source?: string,
 *         Resources?: list<string>,
 *         DetailType?: string,
 *         Detail?: string,
 *         EventBusName?: string,
 *         TraceHeader?: string,
 *         ...,
 *     }>,
 *     EndpointId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putPartnerEvents(array $args = [])
 * @phpstan-method \Aws\Result putPartnerEvents(array{
 *     Entries?: list<array{
 *         Time?: int|string|\DateTimeInterface,
 *         Source?: string,
 *         Resources?: list<string>,
 *         DetailType?: string,
 *         Detail?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPartnerEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPartnerEventsAsync(array{
 *     Entries?: list<array{
 *         Time?: int|string|\DateTimeInterface,
 *         Source?: string,
 *         Resources?: list<string>,
 *         DetailType?: string,
 *         Detail?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putPermission(array $args = [])
 * @phpstan-method \Aws\Result putPermission(array{
 *     EventBusName?: string,
 *     Action?: string,
 *     Principal?: string,
 *     StatementId?: string,
 *     Condition?: array{Type?: string, Key?: string, Value?: string, ...},
 *     Policy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPermissionAsync(array{
 *     EventBusName?: string,
 *     Action?: string,
 *     Principal?: string,
 *     StatementId?: string,
 *     Condition?: array{Type?: string, Key?: string, Value?: string, ...},
 *     Policy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putRule(array $args = [])
 * @phpstan-method \Aws\Result putRule(array{
 *     Name?: string,
 *     ScheduleExpression?: string,
 *     EventPattern?: string,
 *     State?: 'DISABLED'|'ENABLED'|'ENABLED_WITH_ALL_CLOUDTRAIL_MANAGEMENT_EVENTS',
 *     Description?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EventBusName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRuleAsync(array{
 *     Name?: string,
 *     ScheduleExpression?: string,
 *     EventPattern?: string,
 *     State?: 'DISABLED'|'ENABLED'|'ENABLED_WITH_ALL_CLOUDTRAIL_MANAGEMENT_EVENTS',
 *     Description?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EventBusName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putTargets(array $args = [])
 * @phpstan-method \Aws\Result putTargets(array{
 *     Rule?: string,
 *     EventBusName?: string,
 *     Targets?: list<array{
 *         Id?: string,
 *         Arn?: string,
 *         RoleArn?: string,
 *         Input?: string,
 *         InputPath?: string,
 *         InputTransformer?: array,
 *         KinesisParameters?: array,
 *         RunCommandParameters?: array,
 *         EcsParameters?: array,
 *         BatchParameters?: array,
 *         SqsParameters?: array,
 *         HttpParameters?: array,
 *         RedshiftDataParameters?: array,
 *         SageMakerPipelineParameters?: array,
 *         DeadLetterConfig?: array,
 *         RetryPolicy?: array,
 *         AppSyncParameters?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTargetsAsync(array{
 *     Rule?: string,
 *     EventBusName?: string,
 *     Targets?: list<array{
 *         Id?: string,
 *         Arn?: string,
 *         RoleArn?: string,
 *         Input?: string,
 *         InputPath?: string,
 *         InputTransformer?: array,
 *         KinesisParameters?: array,
 *         RunCommandParameters?: array,
 *         EcsParameters?: array,
 *         BatchParameters?: array,
 *         SqsParameters?: array,
 *         HttpParameters?: array,
 *         RedshiftDataParameters?: array,
 *         SageMakerPipelineParameters?: array,
 *         DeadLetterConfig?: array,
 *         RetryPolicy?: array,
 *         AppSyncParameters?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removePermission(array $args = [])
 * @phpstan-method \Aws\Result removePermission(array{StatementId?: string, RemoveAllPermissions?: bool, EventBusName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removePermissionAsync(array{StatementId?: string, RemoveAllPermissions?: bool, EventBusName?: string, ...} $args = [])
 * @method \Aws\Result removeTargets(array $args = [])
 * @phpstan-method \Aws\Result removeTargets(array{Rule?: string, EventBusName?: string, Ids?: list<string>, Force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTargetsAsync(array{Rule?: string, EventBusName?: string, Ids?: list<string>, Force?: bool, ...} $args = [])
 * @method \Aws\Result startReplay(array $args = [])
 * @phpstan-method \Aws\Result startReplay(array{
 *     ReplayName?: string,
 *     Description?: string,
 *     EventSourceArn?: string,
 *     EventStartTime?: int|string|\DateTimeInterface,
 *     EventEndTime?: int|string|\DateTimeInterface,
 *     Destination?: array{Arn?: string, FilterArns?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startReplayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReplayAsync(array{
 *     ReplayName?: string,
 *     Description?: string,
 *     EventSourceArn?: string,
 *     EventStartTime?: int|string|\DateTimeInterface,
 *     EventEndTime?: int|string|\DateTimeInterface,
 *     Destination?: array{Arn?: string, FilterArns?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result testEventPattern(array $args = [])
 * @phpstan-method \Aws\Result testEventPattern(array{EventPattern?: string, Event?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise testEventPatternAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testEventPatternAsync(array{EventPattern?: string, Event?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApiDestination(array $args = [])
 * @phpstan-method \Aws\Result updateApiDestination(array{
 *     Name?: string,
 *     Description?: string,
 *     ConnectionArn?: string,
 *     InvocationEndpoint?: string,
 *     HttpMethod?: 'DELETE'|'GET'|'HEAD'|'OPTIONS'|'PATCH'|'POST'|'PUT',
 *     InvocationRateLimitPerSecond?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApiDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApiDestinationAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     ConnectionArn?: string,
 *     InvocationEndpoint?: string,
 *     HttpMethod?: 'DELETE'|'GET'|'HEAD'|'OPTIONS'|'PATCH'|'POST'|'PUT',
 *     InvocationRateLimitPerSecond?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateArchive(array $args = [])
 * @phpstan-method \Aws\Result updateArchive(array{
 *     ArchiveName?: string,
 *     Description?: string,
 *     EventPattern?: string,
 *     RetentionDays?: int,
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateArchiveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateArchiveAsync(array{
 *     ArchiveName?: string,
 *     Description?: string,
 *     EventPattern?: string,
 *     RetentionDays?: int,
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnection(array $args = [])
 * @phpstan-method \Aws\Result updateConnection(array{
 *     Name?: string,
 *     Description?: string,
 *     AuthorizationType?: 'API_KEY'|'BASIC'|'OAUTH_CLIENT_CREDENTIALS',
 *     AuthParameters?: array{
 *         BasicAuthParameters?: array{Username?: string, Password?: string, ...},
 *         OAuthParameters?: array{
 *             ClientParameters?: array,
 *             AuthorizationEndpoint?: string,
 *             HttpMethod?: 'GET'|'POST'|'PUT',
 *             OAuthHttpParameters?: array,
 *             ...,
 *         },
 *         ApiKeyAuthParameters?: array{ApiKeyName?: string, ApiKeyValue?: string, ...},
 *         InvocationHttpParameters?: array{HeaderParameters?: list<array>, QueryStringParameters?: list<array>, BodyParameters?: list<array>, ...},
 *         ConnectivityParameters?: array{ResourceParameters?: array, ...},
 *         ...,
 *     },
 *     InvocationConnectivityParameters?: array{ResourceParameters?: array{ResourceConfigurationArn?: string, ...}, ...},
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     AuthorizationType?: 'API_KEY'|'BASIC'|'OAUTH_CLIENT_CREDENTIALS',
 *     AuthParameters?: array{
 *         BasicAuthParameters?: array{Username?: string, Password?: string, ...},
 *         OAuthParameters?: array{
 *             ClientParameters?: array,
 *             AuthorizationEndpoint?: string,
 *             HttpMethod?: 'GET'|'POST'|'PUT',
 *             OAuthHttpParameters?: array,
 *             ...,
 *         },
 *         ApiKeyAuthParameters?: array{ApiKeyName?: string, ApiKeyValue?: string, ...},
 *         InvocationHttpParameters?: array{HeaderParameters?: list<array>, QueryStringParameters?: list<array>, BodyParameters?: list<array>, ...},
 *         ConnectivityParameters?: array{ResourceParameters?: array, ...},
 *         ...,
 *     },
 *     InvocationConnectivityParameters?: array{ResourceParameters?: array{ResourceConfigurationArn?: string, ...}, ...},
 *     KmsKeyIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateEndpoint(array{
 *     Name?: string,
 *     Description?: string,
 *     RoutingConfig?: array{FailoverConfig?: array{Primary?: array, Secondary?: array, ...}, ...},
 *     ReplicationConfig?: array{State?: 'DISABLED'|'ENABLED', ...},
 *     EventBuses?: list<array{EventBusArn?: string, ...}>,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEndpointAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     RoutingConfig?: array{FailoverConfig?: array{Primary?: array, Secondary?: array, ...}, ...},
 *     ReplicationConfig?: array{State?: 'DISABLED'|'ENABLED', ...},
 *     EventBuses?: list<array{EventBusArn?: string, ...}>,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventBus(array $args = [])
 * @phpstan-method \Aws\Result updateEventBus(array{
 *     Name?: string,
 *     KmsKeyIdentifier?: string,
 *     Description?: string,
 *     DeadLetterConfig?: array{Arn?: string, ...},
 *     LogConfig?: array{IncludeDetail?: 'FULL'|'NONE', Level?: 'ERROR'|'INFO'|'OFF'|'TRACE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventBusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventBusAsync(array{
 *     Name?: string,
 *     KmsKeyIdentifier?: string,
 *     Description?: string,
 *     DeadLetterConfig?: array{Arn?: string, ...},
 *     LogConfig?: array{IncludeDetail?: 'FULL'|'NONE', Level?: 'ERROR'|'INFO'|'OFF'|'TRACE', ...},
 *     ...,
 * } $args = [])
 */
class EventBridgeClient extends AwsClient {
    public function __construct(array $args)
    {
        parent::__construct($args);

        if ($this->isUseEndpointV2()) {
            $stack = $this->getHandlerList();
            $isCustomEndpoint = isset($args['endpoint']);
            $stack->appendBuild(
                EventBridgeEndpointMiddleware::wrap(
                    $this->getRegion(),
                    [
                        'use_fips_endpoint' =>
                            $this->getConfig('use_fips_endpoint')->isUseFipsEndpoint(),
                        'dual_stack' =>
                            $this->getConfig('use_dual_stack_endpoint')->isUseDualStackEndpoint(),
                    ],
                    $this->getConfig('endpoint_provider'),
                    $isCustomEndpoint
                ),
                'eventbridge.endpoint_middleware'
            );
        }
    }
}
