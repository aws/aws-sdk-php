<?php
namespace Aws\LambdaCore;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Lambda Core** service.
 * @method \Aws\Result createNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result createNetworkConnector(array{
 *     Name?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'|'WebFunction'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNetworkConnectorAsync(array{
 *     Name?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'|'WebFunction'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRuntime(array $args = [])
 * @phpstan-method \Aws\Result createRuntime(array{
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     Description?: string,
 *     LicenseInfo?: string,
 *     ReleaseLifecycle?: array{
 *         ReleaseState?: 'DEPRECATED'|'GA'|'PREVIEW',
 *         DeprecationDate?: string,
 *         FunctionCreateBlockDate?: string,
 *         FunctionUpdateBlockDate?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuntimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuntimeAsync(array{
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     Description?: string,
 *     LicenseInfo?: string,
 *     ReleaseLifecycle?: array{
 *         ReleaseState?: 'DEPRECATED'|'GA'|'PREVIEW',
 *         DeprecationDate?: string,
 *         FunctionCreateBlockDate?: string,
 *         FunctionUpdateBlockDate?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRuntimeAlias(array $args = [])
 * @phpstan-method \Aws\Result createRuntimeAlias(array{
 *     RuntimeName?: string,
 *     RuntimeVersion?: string,
 *     Name?: string,
 *     Description?: string,
 *     ReleaseLifecycle?: array{
 *         ReleaseState?: 'DEPRECATED'|'GA'|'PREVIEW',
 *         DeprecationDate?: string,
 *         FunctionCreateBlockDate?: string,
 *         FunctionUpdateBlockDate?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuntimeAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuntimeAliasAsync(array{
 *     RuntimeName?: string,
 *     RuntimeVersion?: string,
 *     Name?: string,
 *     Description?: string,
 *     ReleaseLifecycle?: array{
 *         ReleaseState?: 'DEPRECATED'|'GA'|'PREVIEW',
 *         DeprecationDate?: string,
 *         FunctionCreateBlockDate?: string,
 *         FunctionUpdateBlockDate?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRuntimeVersion(array $args = [])
 * @phpstan-method \Aws\Result createRuntimeVersion(array{RuntimeName?: string, ImageUri?: string, Name?: string, ReleaseNotes?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuntimeVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuntimeVersionAsync(array{RuntimeName?: string, ImageUri?: string, Name?: string, ReleaseNotes?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result deleteNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteNetworkConnector(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNetworkConnectorAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteRuntime(array $args = [])
 * @phpstan-method \Aws\Result deleteRuntime(array{RuntimeName?: string, RecoveryWindowInDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuntimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuntimeAsync(array{RuntimeName?: string, RecoveryWindowInDays?: int, ...} $args = [])
 * @method \Aws\Result deleteRuntimeAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteRuntimeAlias(array{RuntimeName?: string, Name?: string, RecoveryWindowInDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuntimeAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuntimeAliasAsync(array{RuntimeName?: string, Name?: string, RecoveryWindowInDays?: int, ...} $args = [])
 * @method \Aws\Result deleteRuntimeVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteRuntimeVersion(array{RuntimeName?: string, Name?: string, RecoveryWindowInDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuntimeVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuntimeVersionAsync(array{RuntimeName?: string, Name?: string, RecoveryWindowInDays?: int, ...} $args = [])
 * @method \Aws\Result getNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result getNetworkConnector(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkConnectorAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getRuntime(array $args = [])
 * @phpstan-method \Aws\Result getRuntime(array{RuntimeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuntimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuntimeAsync(array{RuntimeName?: string, ...} $args = [])
 * @method \Aws\Result getRuntimeAlias(array $args = [])
 * @phpstan-method \Aws\Result getRuntimeAlias(array{RuntimeName?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuntimeAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuntimeAliasAsync(array{RuntimeName?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getRuntimeVersion(array $args = [])
 * @phpstan-method \Aws\Result getRuntimeVersion(array{RuntimeName?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuntimeVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuntimeVersionAsync(array{RuntimeName?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result listNetworkConnectorVersions(array $args = [])
 * @phpstan-method \Aws\Result listNetworkConnectorVersions(array{
 *     Identifier?: string,
 *     State?: 'ACTIVE'|'DELETE_FAILED'|'DELETING'|'FAILED'|'INACTIVE'|'PENDING',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkConnectorVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkConnectorVersionsAsync(array{
 *     Identifier?: string,
 *     State?: 'ACTIVE'|'DELETE_FAILED'|'DELETING'|'FAILED'|'INACTIVE'|'PENDING',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNetworkConnectors(array $args = [])
 * @phpstan-method \Aws\Result listNetworkConnectors(array{
 *     State?: 'ACTIVE'|'DELETE_FAILED'|'DELETING'|'FAILED'|'INACTIVE'|'PENDING',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkConnectorsAsync(array{
 *     State?: 'ACTIVE'|'DELETE_FAILED'|'DELETING'|'FAILED'|'INACTIVE'|'PENDING',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRuntimeAliases(array $args = [])
 * @phpstan-method \Aws\Result listRuntimeAliases(array{RuntimeName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuntimeAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuntimeAliasesAsync(array{RuntimeName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRuntimeVersions(array $args = [])
 * @phpstan-method \Aws\Result listRuntimeVersions(array{RuntimeName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuntimeVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuntimeVersionsAsync(array{RuntimeName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRuntimes(array $args = [])
 * @phpstan-method \Aws\Result listRuntimes(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuntimesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuntimesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result restoreRuntime(array $args = [])
 * @phpstan-method \Aws\Result restoreRuntime(array{RuntimeName?: string, RuntimeVersion?: string, RuntimeAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreRuntimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreRuntimeAsync(array{RuntimeName?: string, RuntimeVersion?: string, RuntimeAlias?: string, ...} $args = [])
 * @method \Aws\Result updateNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result updateNetworkConnector(array{
 *     Identifier?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'|'WebFunction'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkConnectorAsync(array{
 *     Identifier?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'|'WebFunction'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuntime(array $args = [])
 * @phpstan-method \Aws\Result updateRuntime(array{
 *     RuntimeName?: string,
 *     Description?: string,
 *     LicenseInfo?: string,
 *     ReleaseLifecycle?: array{
 *         ReleaseState?: 'DEPRECATED'|'GA'|'PREVIEW',
 *         DeprecationDate?: string,
 *         FunctionCreateBlockDate?: string,
 *         FunctionUpdateBlockDate?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuntimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuntimeAsync(array{
 *     RuntimeName?: string,
 *     Description?: string,
 *     LicenseInfo?: string,
 *     ReleaseLifecycle?: array{
 *         ReleaseState?: 'DEPRECATED'|'GA'|'PREVIEW',
 *         DeprecationDate?: string,
 *         FunctionCreateBlockDate?: string,
 *         FunctionUpdateBlockDate?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuntimeAlias(array $args = [])
 * @phpstan-method \Aws\Result updateRuntimeAlias(array{
 *     RuntimeName?: string,
 *     Name?: string,
 *     RuntimeVersion?: string,
 *     Description?: string,
 *     ReleaseLifecycle?: array{
 *         ReleaseState?: 'DEPRECATED'|'GA'|'PREVIEW',
 *         DeprecationDate?: string,
 *         FunctionCreateBlockDate?: string,
 *         FunctionUpdateBlockDate?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuntimeAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuntimeAliasAsync(array{
 *     RuntimeName?: string,
 *     Name?: string,
 *     RuntimeVersion?: string,
 *     Description?: string,
 *     ReleaseLifecycle?: array{
 *         ReleaseState?: 'DEPRECATED'|'GA'|'PREVIEW',
 *         DeprecationDate?: string,
 *         FunctionCreateBlockDate?: string,
 *         FunctionUpdateBlockDate?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuntimeVersion(array $args = [])
 * @phpstan-method \Aws\Result updateRuntimeVersion(array{RuntimeName?: string, Name?: string, ReleaseNotes?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuntimeVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuntimeVersionAsync(array{RuntimeName?: string, Name?: string, ReleaseNotes?: string, ...} $args = [])
 */
class LambdaCoreClient extends AwsClient {}
