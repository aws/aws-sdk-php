<?php
namespace Aws\SupportApp;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Support App** service.
 * @method \Aws\Result createSlackChannelConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createSlackChannelConfiguration(array{
 *     channelId?: string,
 *     channelName?: string,
 *     channelRoleArn?: string,
 *     notifyOnAddCorrespondenceToCase?: bool,
 *     notifyOnCaseSeverity?: 'all'|'high'|'none',
 *     notifyOnCreateOrReopenCase?: bool,
 *     notifyOnResolveCase?: bool,
 *     teamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSlackChannelConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSlackChannelConfigurationAsync(array{
 *     channelId?: string,
 *     channelName?: string,
 *     channelRoleArn?: string,
 *     notifyOnAddCorrespondenceToCase?: bool,
 *     notifyOnCaseSeverity?: 'all'|'high'|'none',
 *     notifyOnCreateOrReopenCase?: bool,
 *     notifyOnResolveCase?: bool,
 *     teamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccountAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountAlias(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountAliasAsync(array{...} $args = [])
 * @method \Aws\Result deleteSlackChannelConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteSlackChannelConfiguration(array{channelId?: string, teamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlackChannelConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSlackChannelConfigurationAsync(array{channelId?: string, teamId?: string, ...} $args = [])
 * @method \Aws\Result deleteSlackWorkspaceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteSlackWorkspaceConfiguration(array{teamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlackWorkspaceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSlackWorkspaceConfigurationAsync(array{teamId?: string, ...} $args = [])
 * @method \Aws\Result getAccountAlias(array $args = [])
 * @phpstan-method \Aws\Result getAccountAlias(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountAliasAsync(array{...} $args = [])
 * @method \Aws\Result listSlackChannelConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listSlackChannelConfigurations(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSlackChannelConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSlackChannelConfigurationsAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSlackWorkspaceConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listSlackWorkspaceConfigurations(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSlackWorkspaceConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSlackWorkspaceConfigurationsAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result putAccountAlias(array $args = [])
 * @phpstan-method \Aws\Result putAccountAlias(array{accountAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountAliasAsync(array{accountAlias?: string, ...} $args = [])
 * @method \Aws\Result registerSlackWorkspaceForOrganization(array $args = [])
 * @phpstan-method \Aws\Result registerSlackWorkspaceForOrganization(array{teamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerSlackWorkspaceForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerSlackWorkspaceForOrganizationAsync(array{teamId?: string, ...} $args = [])
 * @method \Aws\Result updateSlackChannelConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateSlackChannelConfiguration(array{
 *     channelId?: string,
 *     channelName?: string,
 *     channelRoleArn?: string,
 *     notifyOnAddCorrespondenceToCase?: bool,
 *     notifyOnCaseSeverity?: 'all'|'high'|'none',
 *     notifyOnCreateOrReopenCase?: bool,
 *     notifyOnResolveCase?: bool,
 *     teamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSlackChannelConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSlackChannelConfigurationAsync(array{
 *     channelId?: string,
 *     channelName?: string,
 *     channelRoleArn?: string,
 *     notifyOnAddCorrespondenceToCase?: bool,
 *     notifyOnCaseSeverity?: 'all'|'high'|'none',
 *     notifyOnCreateOrReopenCase?: bool,
 *     notifyOnResolveCase?: bool,
 *     teamId?: string,
 *     ...,
 * } $args = [])
 */
class SupportAppClient extends AwsClient {}
