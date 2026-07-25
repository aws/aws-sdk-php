<?php
namespace Aws\CodeStarconnections;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CodeStar connections** service.
 * @method \Aws\Result createConnection(array $args = [])
 * @phpstan-method \Aws\Result createConnection(array{
 *     ProviderType?: 'Bitbucket'|'GitHub'|'GitHubEnterpriseServer'|'GitLab'|'GitLabSelfManaged',
 *     ConnectionName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     HostArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionAsync(array{
 *     ProviderType?: 'Bitbucket'|'GitHub'|'GitHubEnterpriseServer'|'GitLab'|'GitLabSelfManaged',
 *     ConnectionName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     HostArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHost(array $args = [])
 * @phpstan-method \Aws\Result createHost(array{
 *     Name?: string,
 *     ProviderType?: 'Bitbucket'|'GitHub'|'GitHubEnterpriseServer'|'GitLab'|'GitLabSelfManaged',
 *     ProviderEndpoint?: string,
 *     VpcConfiguration?: array{VpcId?: string, SubnetIds?: list<string>, SecurityGroupIds?: list<string>, TlsCertificate?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHostAsync(array{
 *     Name?: string,
 *     ProviderType?: 'Bitbucket'|'GitHub'|'GitHubEnterpriseServer'|'GitLab'|'GitLabSelfManaged',
 *     ProviderEndpoint?: string,
 *     VpcConfiguration?: array{VpcId?: string, SubnetIds?: list<string>, SecurityGroupIds?: list<string>, TlsCertificate?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRepositoryLink(array $args = [])
 * @phpstan-method \Aws\Result createRepositoryLink(array{
 *     ConnectionArn?: string,
 *     OwnerId?: string,
 *     RepositoryName?: string,
 *     EncryptionKeyArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRepositoryLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRepositoryLinkAsync(array{
 *     ConnectionArn?: string,
 *     OwnerId?: string,
 *     RepositoryName?: string,
 *     EncryptionKeyArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSyncConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createSyncConfiguration(array{
 *     Branch?: string,
 *     ConfigFile?: string,
 *     RepositoryLinkId?: string,
 *     ResourceName?: string,
 *     RoleArn?: string,
 *     SyncType?: 'CFN_STACK_SYNC',
 *     PublishDeploymentStatus?: 'DISABLED'|'ENABLED',
 *     TriggerResourceUpdateOn?: 'ANY_CHANGE'|'FILE_CHANGE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSyncConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSyncConfigurationAsync(array{
 *     Branch?: string,
 *     ConfigFile?: string,
 *     RepositoryLinkId?: string,
 *     ResourceName?: string,
 *     RoleArn?: string,
 *     SyncType?: 'CFN_STACK_SYNC',
 *     PublishDeploymentStatus?: 'DISABLED'|'ENABLED',
 *     TriggerResourceUpdateOn?: 'ANY_CHANGE'|'FILE_CHANGE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{ConnectionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{ConnectionArn?: string, ...} $args = [])
 * @method \Aws\Result deleteHost(array $args = [])
 * @phpstan-method \Aws\Result deleteHost(array{HostArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHostAsync(array{HostArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRepositoryLink(array $args = [])
 * @phpstan-method \Aws\Result deleteRepositoryLink(array{RepositoryLinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRepositoryLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRepositoryLinkAsync(array{RepositoryLinkId?: string, ...} $args = [])
 * @method \Aws\Result deleteSyncConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteSyncConfiguration(array{SyncType?: 'CFN_STACK_SYNC', ResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSyncConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSyncConfigurationAsync(array{SyncType?: 'CFN_STACK_SYNC', ResourceName?: string, ...} $args = [])
 * @method \Aws\Result getConnection(array $args = [])
 * @phpstan-method \Aws\Result getConnection(array{ConnectionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionAsync(array{ConnectionArn?: string, ...} $args = [])
 * @method \Aws\Result getHost(array $args = [])
 * @phpstan-method \Aws\Result getHost(array{HostArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHostAsync(array{HostArn?: string, ...} $args = [])
 * @method \Aws\Result getRepositoryLink(array $args = [])
 * @phpstan-method \Aws\Result getRepositoryLink(array{RepositoryLinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRepositoryLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositoryLinkAsync(array{RepositoryLinkId?: string, ...} $args = [])
 * @method \Aws\Result getRepositorySyncStatus(array $args = [])
 * @phpstan-method \Aws\Result getRepositorySyncStatus(array{Branch?: string, RepositoryLinkId?: string, SyncType?: 'CFN_STACK_SYNC', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRepositorySyncStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositorySyncStatusAsync(array{Branch?: string, RepositoryLinkId?: string, SyncType?: 'CFN_STACK_SYNC', ...} $args = [])
 * @method \Aws\Result getResourceSyncStatus(array $args = [])
 * @phpstan-method \Aws\Result getResourceSyncStatus(array{ResourceName?: string, SyncType?: 'CFN_STACK_SYNC', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceSyncStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceSyncStatusAsync(array{ResourceName?: string, SyncType?: 'CFN_STACK_SYNC', ...} $args = [])
 * @method \Aws\Result getSyncBlockerSummary(array $args = [])
 * @phpstan-method \Aws\Result getSyncBlockerSummary(array{SyncType?: 'CFN_STACK_SYNC', ResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSyncBlockerSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSyncBlockerSummaryAsync(array{SyncType?: 'CFN_STACK_SYNC', ResourceName?: string, ...} $args = [])
 * @method \Aws\Result getSyncConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getSyncConfiguration(array{SyncType?: 'CFN_STACK_SYNC', ResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSyncConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSyncConfigurationAsync(array{SyncType?: 'CFN_STACK_SYNC', ResourceName?: string, ...} $args = [])
 * @method \Aws\Result listConnections(array $args = [])
 * @phpstan-method \Aws\Result listConnections(array{
 *     ProviderTypeFilter?: 'Bitbucket'|'GitHub'|'GitHubEnterpriseServer'|'GitLab'|'GitLabSelfManaged',
 *     HostArnFilter?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectionsAsync(array{
 *     ProviderTypeFilter?: 'Bitbucket'|'GitHub'|'GitHubEnterpriseServer'|'GitLab'|'GitLabSelfManaged',
 *     HostArnFilter?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listHosts(array $args = [])
 * @phpstan-method \Aws\Result listHosts(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHostsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHostsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRepositoryLinks(array $args = [])
 * @phpstan-method \Aws\Result listRepositoryLinks(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRepositoryLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRepositoryLinksAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRepositorySyncDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listRepositorySyncDefinitions(array{RepositoryLinkId?: string, SyncType?: 'CFN_STACK_SYNC', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRepositorySyncDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRepositorySyncDefinitionsAsync(array{RepositoryLinkId?: string, SyncType?: 'CFN_STACK_SYNC', ...} $args = [])
 * @method \Aws\Result listSyncConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listSyncConfigurations(array{MaxResults?: int, NextToken?: string, RepositoryLinkId?: string, SyncType?: 'CFN_STACK_SYNC', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSyncConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSyncConfigurationsAsync(array{MaxResults?: int, NextToken?: string, RepositoryLinkId?: string, SyncType?: 'CFN_STACK_SYNC', ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateHost(array $args = [])
 * @phpstan-method \Aws\Result updateHost(array{
 *     HostArn?: string,
 *     ProviderEndpoint?: string,
 *     VpcConfiguration?: array{VpcId?: string, SubnetIds?: list<string>, SecurityGroupIds?: list<string>, TlsCertificate?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHostAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHostAsync(array{
 *     HostArn?: string,
 *     ProviderEndpoint?: string,
 *     VpcConfiguration?: array{VpcId?: string, SubnetIds?: list<string>, SecurityGroupIds?: list<string>, TlsCertificate?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRepositoryLink(array $args = [])
 * @phpstan-method \Aws\Result updateRepositoryLink(array{ConnectionArn?: string, EncryptionKeyArn?: string, RepositoryLinkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRepositoryLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRepositoryLinkAsync(array{ConnectionArn?: string, EncryptionKeyArn?: string, RepositoryLinkId?: string, ...} $args = [])
 * @method \Aws\Result updateSyncBlocker(array $args = [])
 * @phpstan-method \Aws\Result updateSyncBlocker(array{Id?: string, SyncType?: 'CFN_STACK_SYNC', ResourceName?: string, ResolvedReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSyncBlockerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSyncBlockerAsync(array{Id?: string, SyncType?: 'CFN_STACK_SYNC', ResourceName?: string, ResolvedReason?: string, ...} $args = [])
 * @method \Aws\Result updateSyncConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateSyncConfiguration(array{
 *     Branch?: string,
 *     ConfigFile?: string,
 *     RepositoryLinkId?: string,
 *     ResourceName?: string,
 *     RoleArn?: string,
 *     SyncType?: 'CFN_STACK_SYNC',
 *     PublishDeploymentStatus?: 'DISABLED'|'ENABLED',
 *     TriggerResourceUpdateOn?: 'ANY_CHANGE'|'FILE_CHANGE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSyncConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSyncConfigurationAsync(array{
 *     Branch?: string,
 *     ConfigFile?: string,
 *     RepositoryLinkId?: string,
 *     ResourceName?: string,
 *     RoleArn?: string,
 *     SyncType?: 'CFN_STACK_SYNC',
 *     PublishDeploymentStatus?: 'DISABLED'|'ENABLED',
 *     TriggerResourceUpdateOn?: 'ANY_CHANGE'|'FILE_CHANGE',
 *     ...,
 * } $args = [])
 */
class CodeStarconnectionsClient extends AwsClient {}
