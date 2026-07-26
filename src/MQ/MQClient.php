<?php
namespace Aws\MQ;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonMQ** service.
 * @method \Aws\Result createBroker(array $args = [])
 * @phpstan-method \Aws\Result createBroker(array{
 *     AuthenticationStrategy?: 'CONFIG_MANAGED'|'LDAP'|'SIMPLE',
 *     AutoMinorVersionUpgrade?: bool,
 *     BrokerName?: string,
 *     Configuration?: array{Id?: string, Revision?: int, ...},
 *     CreatorRequestId?: string,
 *     DeploymentMode?: 'ACTIVE_STANDBY_MULTI_AZ'|'CLUSTER_MULTI_AZ'|'SINGLE_INSTANCE',
 *     EncryptionOptions?: array{KmsKeyId?: string, UseAwsOwnedKey?: bool, ...},
 *     EngineType?: 'ACTIVEMQ'|'RABBITMQ',
 *     EngineVersion?: string,
 *     HostInstanceType?: string,
 *     LdapServerMetadata?: array{
 *         Hosts?: list<string>,
 *         RoleBase?: string,
 *         RoleName?: string,
 *         RoleSearchMatching?: string,
 *         RoleSearchSubtree?: bool,
 *         ServiceAccountPassword?: string,
 *         ServiceAccountUsername?: string,
 *         UserBase?: string,
 *         UserRoleName?: string,
 *         UserSearchMatching?: string,
 *         UserSearchSubtree?: bool,
 *         ...,
 *     },
 *     Logs?: array{Audit?: bool, General?: bool, ...},
 *     MaintenanceWindowStartTime?: array{
 *         DayOfWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         TimeOfDay?: string,
 *         TimeZone?: string,
 *         ...,
 *     },
 *     PubliclyAccessible?: bool,
 *     SecurityGroups?: list<string>,
 *     StorageSize?: int,
 *     StorageType?: 'EBS'|'EFS',
 *     SubnetIds?: list<string>,
 *     Tags?: array<string, string>,
 *     Users?: list<array{
 *         ConsoleAccess?: bool,
 *         Groups?: list<string>,
 *         Password?: string,
 *         Username?: string,
 *         ReplicationUser?: bool,
 *         ...,
 *     }>,
 *     DataReplicationMode?: 'CRDR'|'NONE',
 *     DataReplicationPrimaryBrokerArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBrokerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBrokerAsync(array{
 *     AuthenticationStrategy?: 'CONFIG_MANAGED'|'LDAP'|'SIMPLE',
 *     AutoMinorVersionUpgrade?: bool,
 *     BrokerName?: string,
 *     Configuration?: array{Id?: string, Revision?: int, ...},
 *     CreatorRequestId?: string,
 *     DeploymentMode?: 'ACTIVE_STANDBY_MULTI_AZ'|'CLUSTER_MULTI_AZ'|'SINGLE_INSTANCE',
 *     EncryptionOptions?: array{KmsKeyId?: string, UseAwsOwnedKey?: bool, ...},
 *     EngineType?: 'ACTIVEMQ'|'RABBITMQ',
 *     EngineVersion?: string,
 *     HostInstanceType?: string,
 *     LdapServerMetadata?: array{
 *         Hosts?: list<string>,
 *         RoleBase?: string,
 *         RoleName?: string,
 *         RoleSearchMatching?: string,
 *         RoleSearchSubtree?: bool,
 *         ServiceAccountPassword?: string,
 *         ServiceAccountUsername?: string,
 *         UserBase?: string,
 *         UserRoleName?: string,
 *         UserSearchMatching?: string,
 *         UserSearchSubtree?: bool,
 *         ...,
 *     },
 *     Logs?: array{Audit?: bool, General?: bool, ...},
 *     MaintenanceWindowStartTime?: array{
 *         DayOfWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         TimeOfDay?: string,
 *         TimeZone?: string,
 *         ...,
 *     },
 *     PubliclyAccessible?: bool,
 *     SecurityGroups?: list<string>,
 *     StorageSize?: int,
 *     StorageType?: 'EBS'|'EFS',
 *     SubnetIds?: list<string>,
 *     Tags?: array<string, string>,
 *     Users?: list<array{
 *         ConsoleAccess?: bool,
 *         Groups?: list<string>,
 *         Password?: string,
 *         Username?: string,
 *         ReplicationUser?: bool,
 *         ...,
 *     }>,
 *     DataReplicationMode?: 'CRDR'|'NONE',
 *     DataReplicationPrimaryBrokerArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createConfiguration(array{
 *     AuthenticationStrategy?: 'CONFIG_MANAGED'|'LDAP'|'SIMPLE',
 *     EngineType?: 'ACTIVEMQ'|'RABBITMQ',
 *     EngineVersion?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationAsync(array{
 *     AuthenticationStrategy?: 'CONFIG_MANAGED'|'LDAP'|'SIMPLE',
 *     EngineType?: 'ACTIVEMQ'|'RABBITMQ',
 *     EngineVersion?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTags(array $args = [])
 * @phpstan-method \Aws\Result createTags(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTagsAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     BrokerId?: string,
 *     ConsoleAccess?: bool,
 *     Groups?: list<string>,
 *     Password?: string,
 *     Username?: string,
 *     ReplicationUser?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     BrokerId?: string,
 *     ConsoleAccess?: bool,
 *     Groups?: list<string>,
 *     Password?: string,
 *     Username?: string,
 *     ReplicationUser?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBroker(array $args = [])
 * @phpstan-method \Aws\Result deleteBroker(array{BrokerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBrokerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBrokerAsync(array{BrokerId?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguration(array{ConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationAsync(array{ConfigurationId?: string, ...} $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @phpstan-method \Aws\Result deleteTags(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagsAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{BrokerId?: string, Username?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{BrokerId?: string, Username?: string, ...} $args = [])
 * @method \Aws\Result describeBroker(array $args = [])
 * @phpstan-method \Aws\Result describeBroker(array{BrokerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBrokerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBrokerAsync(array{BrokerId?: string, ...} $args = [])
 * @method \Aws\Result describeBrokerEngineTypes(array $args = [])
 * @phpstan-method \Aws\Result describeBrokerEngineTypes(array{EngineType?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBrokerEngineTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBrokerEngineTypesAsync(array{EngineType?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeBrokerInstanceOptions(array $args = [])
 * @phpstan-method \Aws\Result describeBrokerInstanceOptions(array{
 *     EngineType?: string,
 *     HostInstanceType?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     StorageType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBrokerInstanceOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBrokerInstanceOptionsAsync(array{
 *     EngineType?: string,
 *     HostInstanceType?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     StorageType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeConfiguration(array{ConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConfigurationAsync(array{ConfigurationId?: string, ...} $args = [])
 * @method \Aws\Result describeConfigurationRevision(array $args = [])
 * @phpstan-method \Aws\Result describeConfigurationRevision(array{ConfigurationId?: string, ConfigurationRevision?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConfigurationRevisionAsync(array{ConfigurationId?: string, ConfigurationRevision?: string, ...} $args = [])
 * @method \Aws\Result describeSharedResources(array $args = [])
 * @phpstan-method \Aws\Result describeSharedResources(array{BrokerId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSharedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSharedResourcesAsync(array{BrokerId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @phpstan-method \Aws\Result describeUser(array{BrokerId?: string, Username?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserAsync(array{BrokerId?: string, Username?: string, ...} $args = [])
 * @method \Aws\Result listBrokers(array $args = [])
 * @phpstan-method \Aws\Result listBrokers(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBrokersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBrokersAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConfigurationRevisions(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationRevisions(array{ConfigurationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationRevisionsAsync(array{ConfigurationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listConfigurations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{BrokerId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{BrokerId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result promote(array $args = [])
 * @phpstan-method \Aws\Result promote(array{BrokerId?: string, Mode?: 'FAILOVER'|'SWITCHOVER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise promoteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise promoteAsync(array{BrokerId?: string, Mode?: 'FAILOVER'|'SWITCHOVER', ...} $args = [])
 * @method \Aws\Result rebootBroker(array $args = [])
 * @phpstan-method \Aws\Result rebootBroker(array{BrokerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootBrokerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootBrokerAsync(array{BrokerId?: string, ...} $args = [])
 * @method \Aws\Result updateBroker(array $args = [])
 * @phpstan-method \Aws\Result updateBroker(array{
 *     AuthenticationStrategy?: 'CONFIG_MANAGED'|'LDAP'|'SIMPLE',
 *     AutoMinorVersionUpgrade?: bool,
 *     BrokerId?: string,
 *     Configuration?: array{Id?: string, Revision?: int, ...},
 *     EngineVersion?: string,
 *     HostInstanceType?: string,
 *     LdapServerMetadata?: array{
 *         Hosts?: list<string>,
 *         RoleBase?: string,
 *         RoleName?: string,
 *         RoleSearchMatching?: string,
 *         RoleSearchSubtree?: bool,
 *         ServiceAccountPassword?: string,
 *         ServiceAccountUsername?: string,
 *         UserBase?: string,
 *         UserRoleName?: string,
 *         UserSearchMatching?: string,
 *         UserSearchSubtree?: bool,
 *         ...,
 *     },
 *     Logs?: array{Audit?: bool, General?: bool, ...},
 *     MaintenanceWindowStartTime?: array{
 *         DayOfWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         TimeOfDay?: string,
 *         TimeZone?: string,
 *         ...,
 *     },
 *     ResourceShareArns?: list<string>,
 *     SecurityGroups?: list<string>,
 *     StorageSize?: int,
 *     DataReplicationMode?: 'CRDR'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrokerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrokerAsync(array{
 *     AuthenticationStrategy?: 'CONFIG_MANAGED'|'LDAP'|'SIMPLE',
 *     AutoMinorVersionUpgrade?: bool,
 *     BrokerId?: string,
 *     Configuration?: array{Id?: string, Revision?: int, ...},
 *     EngineVersion?: string,
 *     HostInstanceType?: string,
 *     LdapServerMetadata?: array{
 *         Hosts?: list<string>,
 *         RoleBase?: string,
 *         RoleName?: string,
 *         RoleSearchMatching?: string,
 *         RoleSearchSubtree?: bool,
 *         ServiceAccountPassword?: string,
 *         ServiceAccountUsername?: string,
 *         UserBase?: string,
 *         UserRoleName?: string,
 *         UserSearchMatching?: string,
 *         UserSearchSubtree?: bool,
 *         ...,
 *     },
 *     Logs?: array{Audit?: bool, General?: bool, ...},
 *     MaintenanceWindowStartTime?: array{
 *         DayOfWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         TimeOfDay?: string,
 *         TimeZone?: string,
 *         ...,
 *     },
 *     ResourceShareArns?: list<string>,
 *     SecurityGroups?: list<string>,
 *     StorageSize?: int,
 *     DataReplicationMode?: 'CRDR'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateConfiguration(array{ConfigurationId?: string, Data?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationAsync(array{ConfigurationId?: string, Data?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     BrokerId?: string,
 *     ConsoleAccess?: bool,
 *     Groups?: list<string>,
 *     Password?: string,
 *     Username?: string,
 *     ReplicationUser?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     BrokerId?: string,
 *     ConsoleAccess?: bool,
 *     Groups?: list<string>,
 *     Password?: string,
 *     Username?: string,
 *     ReplicationUser?: bool,
 *     ...,
 * } $args = [])
 */
class MQClient extends AwsClient {}
