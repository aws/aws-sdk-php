<?php
namespace Aws\GameLiftStreams;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon GameLift Streams** service.
 * @method \Aws\Result addStreamGroupLocations(array $args = [])
 * @phpstan-method \Aws\Result addStreamGroupLocations(array{
 *     Identifier?: string,
 *     LocationConfigurations?: list<array{
 *         LocationName?: string,
 *         AlwaysOnCapacity?: int,
 *         OnDemandCapacity?: int,
 *         TargetIdleCapacity?: int,
 *         MaximumCapacity?: int,
 *         VpcTransitConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addStreamGroupLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addStreamGroupLocationsAsync(array{
 *     Identifier?: string,
 *     LocationConfigurations?: list<array{
 *         LocationName?: string,
 *         AlwaysOnCapacity?: int,
 *         OnDemandCapacity?: int,
 *         TargetIdleCapacity?: int,
 *         MaximumCapacity?: int,
 *         VpcTransitConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateApplications(array $args = [])
 * @phpstan-method \Aws\Result associateApplications(array{Identifier?: string, ApplicationIdentifiers?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateApplicationsAsync(array{Identifier?: string, ApplicationIdentifiers?: list<string>, ...} $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     Description?: string,
 *     RuntimeEnvironment?: array{Type?: 'PROTON'|'UBUNTU'|'WINDOWS', Version?: string, ...},
 *     ExecutablePath?: string,
 *     ApplicationSourceUri?: string,
 *     ApplicationLogPaths?: list<string>,
 *     ApplicationLogOutputUri?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     Description?: string,
 *     RuntimeEnvironment?: array{Type?: 'PROTON'|'UBUNTU'|'WINDOWS', Version?: string, ...},
 *     ExecutablePath?: string,
 *     ApplicationSourceUri?: string,
 *     ApplicationLogPaths?: list<string>,
 *     ApplicationLogOutputUri?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStreamGroup(array $args = [])
 * @phpstan-method \Aws\Result createStreamGroup(array{
 *     Description?: string,
 *     StreamClass?: 'gen4n_high'|'gen4n_ultra'|'gen4n_win2022'|'gen5n_high'|'gen5n_ultra'|'gen5n_win2022'|'gen6e_pro'|'gen6e_pro_win2022'|'gen6n_high'|'gen6n_medium'|'gen6n_medium_win2022'|'gen6n_pro'|'gen6n_pro_win2022'|'gen6n_small'|'gen6n_small_win2022'|'gen6n_ultra'|'gen6n_ultra_win2022',
 *     DefaultApplicationIdentifier?: string,
 *     LocationConfigurations?: list<array{
 *         LocationName?: string,
 *         AlwaysOnCapacity?: int,
 *         OnDemandCapacity?: int,
 *         TargetIdleCapacity?: int,
 *         MaximumCapacity?: int,
 *         VpcTransitConfiguration?: array,
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamGroupAsync(array{
 *     Description?: string,
 *     StreamClass?: 'gen4n_high'|'gen4n_ultra'|'gen4n_win2022'|'gen5n_high'|'gen5n_ultra'|'gen5n_win2022'|'gen6e_pro'|'gen6e_pro_win2022'|'gen6n_high'|'gen6n_medium'|'gen6n_medium_win2022'|'gen6n_pro'|'gen6n_pro_win2022'|'gen6n_small'|'gen6n_small_win2022'|'gen6n_ultra'|'gen6n_ultra_win2022',
 *     DefaultApplicationIdentifier?: string,
 *     LocationConfigurations?: list<array{
 *         LocationName?: string,
 *         AlwaysOnCapacity?: int,
 *         OnDemandCapacity?: int,
 *         TargetIdleCapacity?: int,
 *         MaximumCapacity?: int,
 *         VpcTransitConfiguration?: array,
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStreamSessionAdminShell(array $args = [])
 * @phpstan-method \Aws\Result createStreamSessionAdminShell(array{Identifier?: string, StreamSessionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamSessionAdminShellAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamSessionAdminShellAsync(array{Identifier?: string, StreamSessionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result createStreamSessionConnection(array $args = [])
 * @phpstan-method \Aws\Result createStreamSessionConnection(array{
 *     ClientToken?: string,
 *     Identifier?: string,
 *     StreamSessionIdentifier?: string,
 *     SignalRequest?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamSessionConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamSessionConnectionAsync(array{
 *     ClientToken?: string,
 *     Identifier?: string,
 *     StreamSessionIdentifier?: string,
 *     SignalRequest?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteStreamGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteStreamGroup(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStreamGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStreamGroupAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result disassociateApplications(array $args = [])
 * @phpstan-method \Aws\Result disassociateApplications(array{Identifier?: string, ApplicationIdentifiers?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateApplicationsAsync(array{Identifier?: string, ApplicationIdentifiers?: list<string>, ...} $args = [])
 * @method \Aws\Result exportStreamSessionFiles(array $args = [])
 * @phpstan-method \Aws\Result exportStreamSessionFiles(array{Identifier?: string, StreamSessionIdentifier?: string, OutputUri?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportStreamSessionFilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportStreamSessionFilesAsync(array{Identifier?: string, StreamSessionIdentifier?: string, OutputUri?: string, ...} $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getStreamGroup(array $args = [])
 * @phpstan-method \Aws\Result getStreamGroup(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStreamGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStreamGroupAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getStreamSession(array $args = [])
 * @phpstan-method \Aws\Result getStreamSession(array{Identifier?: string, StreamSessionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStreamSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStreamSessionAsync(array{Identifier?: string, StreamSessionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listStreamGroups(array $args = [])
 * @phpstan-method \Aws\Result listStreamGroups(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamGroupsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listStreamSessions(array $args = [])
 * @phpstan-method \Aws\Result listStreamSessions(array{
 *     Status?: 'ACTIVATING'|'ACTIVE'|'CONNECTED'|'ERROR'|'PENDING_CLIENT_RECONNECTION'|'RECONNECTING'|'TERMINATED'|'TERMINATING',
 *     ExportFilesStatus?: 'FAILED'|'PENDING'|'SUCCEEDED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Identifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamSessionsAsync(array{
 *     Status?: 'ACTIVATING'|'ACTIVE'|'CONNECTED'|'ERROR'|'PENDING_CLIENT_RECONNECTION'|'RECONNECTING'|'TERMINATED'|'TERMINATING',
 *     ExportFilesStatus?: 'FAILED'|'PENDING'|'SUCCEEDED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Identifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStreamSessionsByAccount(array $args = [])
 * @phpstan-method \Aws\Result listStreamSessionsByAccount(array{
 *     Status?: 'ACTIVATING'|'ACTIVE'|'CONNECTED'|'ERROR'|'PENDING_CLIENT_RECONNECTION'|'RECONNECTING'|'TERMINATED'|'TERMINATING',
 *     ExportFilesStatus?: 'FAILED'|'PENDING'|'SUCCEEDED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamSessionsByAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamSessionsByAccountAsync(array{
 *     Status?: 'ACTIVATING'|'ACTIVE'|'CONNECTED'|'ERROR'|'PENDING_CLIENT_RECONNECTION'|'RECONNECTING'|'TERMINATED'|'TERMINATING',
 *     ExportFilesStatus?: 'FAILED'|'PENDING'|'SUCCEEDED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result removeStreamGroupLocations(array $args = [])
 * @phpstan-method \Aws\Result removeStreamGroupLocations(array{Identifier?: string, Locations?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeStreamGroupLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeStreamGroupLocationsAsync(array{Identifier?: string, Locations?: list<string>, ...} $args = [])
 * @method \Aws\Result startStreamSession(array $args = [])
 * @phpstan-method \Aws\Result startStreamSession(array{
 *     ClientToken?: string,
 *     Description?: string,
 *     Identifier?: string,
 *     Protocol?: 'WebRTC',
 *     SignalRequest?: string,
 *     ApplicationIdentifier?: string,
 *     UserId?: string,
 *     Locations?: list<string>,
 *     ConnectionTimeoutSeconds?: int,
 *     SessionLengthSeconds?: int,
 *     AdditionalLaunchArgs?: list<string>,
 *     AdditionalEnvironmentVariables?: array<string, string>,
 *     PerformanceStatsConfiguration?: array{SharedWithClient?: bool, ...},
 *     RoleArn?: string,
 *     DisplayConfiguration?: array{Resolution?: array{Width?: int, Height?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startStreamSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startStreamSessionAsync(array{
 *     ClientToken?: string,
 *     Description?: string,
 *     Identifier?: string,
 *     Protocol?: 'WebRTC',
 *     SignalRequest?: string,
 *     ApplicationIdentifier?: string,
 *     UserId?: string,
 *     Locations?: list<string>,
 *     ConnectionTimeoutSeconds?: int,
 *     SessionLengthSeconds?: int,
 *     AdditionalLaunchArgs?: list<string>,
 *     AdditionalEnvironmentVariables?: array<string, string>,
 *     PerformanceStatsConfiguration?: array{SharedWithClient?: bool, ...},
 *     RoleArn?: string,
 *     DisplayConfiguration?: array{Resolution?: array{Width?: int, Height?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result terminateStreamSession(array $args = [])
 * @phpstan-method \Aws\Result terminateStreamSession(array{Identifier?: string, StreamSessionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateStreamSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateStreamSessionAsync(array{Identifier?: string, StreamSessionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     Identifier?: string,
 *     Description?: string,
 *     ApplicationLogPaths?: list<string>,
 *     ApplicationLogOutputUri?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     Identifier?: string,
 *     Description?: string,
 *     ApplicationLogPaths?: list<string>,
 *     ApplicationLogOutputUri?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStreamGroup(array $args = [])
 * @phpstan-method \Aws\Result updateStreamGroup(array{
 *     Identifier?: string,
 *     LocationConfigurations?: list<array{
 *         LocationName?: string,
 *         AlwaysOnCapacity?: int,
 *         OnDemandCapacity?: int,
 *         TargetIdleCapacity?: int,
 *         MaximumCapacity?: int,
 *         VpcTransitConfiguration?: array,
 *         ...,
 *     }>,
 *     Description?: string,
 *     DefaultApplicationIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStreamGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStreamGroupAsync(array{
 *     Identifier?: string,
 *     LocationConfigurations?: list<array{
 *         LocationName?: string,
 *         AlwaysOnCapacity?: int,
 *         OnDemandCapacity?: int,
 *         TargetIdleCapacity?: int,
 *         MaximumCapacity?: int,
 *         VpcTransitConfiguration?: array,
 *         ...,
 *     }>,
 *     Description?: string,
 *     DefaultApplicationIdentifier?: string,
 *     ...,
 * } $args = [])
 */
class GameLiftStreamsClient extends AwsClient {}
