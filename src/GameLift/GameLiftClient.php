<?php
namespace Aws\GameLift;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon GameLift** service.
 *
 * @method \Aws\Result acceptMatch(array $args = [])
 * @phpstan-method \Aws\Result acceptMatch(array{TicketId?: string, PlayerIds?: list<string>, AcceptanceType?: 'ACCEPT'|'REJECT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptMatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptMatchAsync(array{TicketId?: string, PlayerIds?: list<string>, AcceptanceType?: 'ACCEPT'|'REJECT', ...} $args = [])
 * @method \Aws\Result claimGameServer(array $args = [])
 * @phpstan-method \Aws\Result claimGameServer(array{
 *     GameServerGroupName?: string,
 *     GameServerId?: string,
 *     GameServerData?: string,
 *     FilterOption?: array{InstanceStatuses?: list<'ACTIVE'|'DRAINING'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise claimGameServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise claimGameServerAsync(array{
 *     GameServerGroupName?: string,
 *     GameServerId?: string,
 *     GameServerData?: string,
 *     FilterOption?: array{InstanceStatuses?: list<'ACTIVE'|'DRAINING'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @phpstan-method \Aws\Result createAlias(array{
 *     Name?: string,
 *     Description?: string,
 *     RoutingStrategy?: array{Type?: 'SIMPLE'|'TERMINAL', FleetId?: string, Message?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAliasAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     RoutingStrategy?: array{Type?: 'SIMPLE'|'TERMINAL', FleetId?: string, Message?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBuild(array $args = [])
 * @phpstan-method \Aws\Result createBuild(array{
 *     Name?: string,
 *     Version?: string,
 *     StorageLocation?: array{Bucket?: string, Key?: string, RoleArn?: string, ObjectVersion?: string, ...},
 *     OperatingSystem?: 'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2023'|'WINDOWS_2012'|'WINDOWS_2016'|'WINDOWS_2022',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ServerSdkVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBuildAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBuildAsync(array{
 *     Name?: string,
 *     Version?: string,
 *     StorageLocation?: array{Bucket?: string, Key?: string, RoleArn?: string, ObjectVersion?: string, ...},
 *     OperatingSystem?: 'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2023'|'WINDOWS_2012'|'WINDOWS_2016'|'WINDOWS_2022',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ServerSdkVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContainerFleet(array $args = [])
 * @phpstan-method \Aws\Result createContainerFleet(array{
 *     FleetRoleArn?: string,
 *     Description?: string,
 *     GameServerContainerGroupDefinitionName?: string,
 *     PerInstanceContainerGroupDefinitionName?: string,
 *     InstanceConnectionPortRange?: array{FromPort?: int, ToPort?: int, ...},
 *     InstanceInboundPermissions?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     GameServerContainerGroupsPerInstance?: int,
 *     InstanceType?: string,
 *     BillingType?: 'ON_DEMAND'|'SPOT',
 *     Locations?: list<array{Location?: string, ...}>,
 *     MetricGroups?: list<string>,
 *     NewGameSessionProtectionPolicy?: 'FullProtection'|'NoProtection',
 *     GameSessionCreationLimitPolicy?: array{NewGameSessionsPerCreator?: int, PolicyPeriodInMinutes?: int, ...},
 *     LogConfiguration?: array{LogDestination?: 'CLOUDWATCH'|'NONE'|'S3', S3BucketName?: string, LogGroupArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     PlayerGatewayMode?: 'DISABLED'|'ENABLED'|'REQUIRED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContainerFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContainerFleetAsync(array{
 *     FleetRoleArn?: string,
 *     Description?: string,
 *     GameServerContainerGroupDefinitionName?: string,
 *     PerInstanceContainerGroupDefinitionName?: string,
 *     InstanceConnectionPortRange?: array{FromPort?: int, ToPort?: int, ...},
 *     InstanceInboundPermissions?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     GameServerContainerGroupsPerInstance?: int,
 *     InstanceType?: string,
 *     BillingType?: 'ON_DEMAND'|'SPOT',
 *     Locations?: list<array{Location?: string, ...}>,
 *     MetricGroups?: list<string>,
 *     NewGameSessionProtectionPolicy?: 'FullProtection'|'NoProtection',
 *     GameSessionCreationLimitPolicy?: array{NewGameSessionsPerCreator?: int, PolicyPeriodInMinutes?: int, ...},
 *     LogConfiguration?: array{LogDestination?: 'CLOUDWATCH'|'NONE'|'S3', S3BucketName?: string, LogGroupArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     PlayerGatewayMode?: 'DISABLED'|'ENABLED'|'REQUIRED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContainerGroupDefinition(array $args = [])
 * @phpstan-method \Aws\Result createContainerGroupDefinition(array{
 *     Name?: string,
 *     ContainerGroupType?: 'GAME_SERVER'|'PER_INSTANCE',
 *     TotalMemoryLimitMebibytes?: int,
 *     TotalVcpuLimit?: float,
 *     GameServerContainerDefinition?: array{
 *         ContainerName?: string,
 *         DependsOn?: list<array>,
 *         MountPoints?: list<array>,
 *         EnvironmentOverride?: list<array>,
 *         ImageUri?: string,
 *         PortConfiguration?: array{ContainerPortRanges?: list<array>, ...},
 *         ServerSdkVersion?: string,
 *         LinuxCapabilities?: array{
 *             Include?: list<'AUDIT_CONTROL'|'AUDIT_WRITE'|'BLOCK_SUSPEND'|'CHOWN'|'DAC_OVERRIDE'|'DAC_READ_SEARCH'|'FOWNER'|'FSETID'|'IPC_LOCK'|'IPC_OWNER'|'KILL'|'LEASE'|'LINUX_IMMUTABLE'|'MAC_ADMIN'|'MAC_OVERRIDE'|'MKNOD'|'NET_ADMIN'|'NET_BIND_SERVICE'|'NET_BROADCAST'|'NET_RAW'|'SETFCAP'|'SETGID'|'SETPCAP'|'SETUID'|'SYSLOG'|'SYS_ADMIN'|'SYS_BOOT'|'SYS_CHROOT'|'SYS_MODULE'|'SYS_NICE'|'SYS_PACCT'|'SYS_PTRACE'|'SYS_RAWIO'|'SYS_RESOURCE'|'SYS_TIME'|'SYS_TTY_CONFIG'|'WAKE_ALARM'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SupportContainerDefinitions?: list<array{
 *         ContainerName?: string,
 *         DependsOn?: list<array>,
 *         MountPoints?: list<array>,
 *         EnvironmentOverride?: list<array>,
 *         Essential?: bool,
 *         HealthCheck?: array,
 *         ImageUri?: string,
 *         MemoryHardLimitMebibytes?: int,
 *         PortConfiguration?: array,
 *         Vcpu?: float,
 *         LinuxCapabilities?: array,
 *         ...,
 *     }>,
 *     OperatingSystem?: 'AMAZON_LINUX_2023',
 *     VersionDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContainerGroupDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContainerGroupDefinitionAsync(array{
 *     Name?: string,
 *     ContainerGroupType?: 'GAME_SERVER'|'PER_INSTANCE',
 *     TotalMemoryLimitMebibytes?: int,
 *     TotalVcpuLimit?: float,
 *     GameServerContainerDefinition?: array{
 *         ContainerName?: string,
 *         DependsOn?: list<array>,
 *         MountPoints?: list<array>,
 *         EnvironmentOverride?: list<array>,
 *         ImageUri?: string,
 *         PortConfiguration?: array{ContainerPortRanges?: list<array>, ...},
 *         ServerSdkVersion?: string,
 *         LinuxCapabilities?: array{
 *             Include?: list<'AUDIT_CONTROL'|'AUDIT_WRITE'|'BLOCK_SUSPEND'|'CHOWN'|'DAC_OVERRIDE'|'DAC_READ_SEARCH'|'FOWNER'|'FSETID'|'IPC_LOCK'|'IPC_OWNER'|'KILL'|'LEASE'|'LINUX_IMMUTABLE'|'MAC_ADMIN'|'MAC_OVERRIDE'|'MKNOD'|'NET_ADMIN'|'NET_BIND_SERVICE'|'NET_BROADCAST'|'NET_RAW'|'SETFCAP'|'SETGID'|'SETPCAP'|'SETUID'|'SYSLOG'|'SYS_ADMIN'|'SYS_BOOT'|'SYS_CHROOT'|'SYS_MODULE'|'SYS_NICE'|'SYS_PACCT'|'SYS_PTRACE'|'SYS_RAWIO'|'SYS_RESOURCE'|'SYS_TIME'|'SYS_TTY_CONFIG'|'WAKE_ALARM'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SupportContainerDefinitions?: list<array{
 *         ContainerName?: string,
 *         DependsOn?: list<array>,
 *         MountPoints?: list<array>,
 *         EnvironmentOverride?: list<array>,
 *         Essential?: bool,
 *         HealthCheck?: array,
 *         ImageUri?: string,
 *         MemoryHardLimitMebibytes?: int,
 *         PortConfiguration?: array,
 *         Vcpu?: float,
 *         LinuxCapabilities?: array,
 *         ...,
 *     }>,
 *     OperatingSystem?: 'AMAZON_LINUX_2023',
 *     VersionDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFleet(array $args = [])
 * @phpstan-method \Aws\Result createFleet(array{
 *     Name?: string,
 *     Description?: string,
 *     BuildId?: string,
 *     ScriptId?: string,
 *     ServerLaunchPath?: string,
 *     ServerLaunchParameters?: string,
 *     LogPaths?: list<string>,
 *     EC2InstanceType?: 'c3.2xlarge'|'c3.4xlarge'|'c3.8xlarge'|'c3.large'|'c3.xlarge'|'c4.2xlarge'|'c4.4xlarge'|'c4.8xlarge'|'c4.large'|'c4.xlarge'|'c5.12xlarge'|'c5.18xlarge'|'c5.24xlarge'|'c5.2xlarge'|'c5.4xlarge'|'c5.9xlarge'|'c5.large'|'c5.xlarge'|'c5a.12xlarge'|'c5a.16xlarge'|'c5a.24xlarge'|'c5a.2xlarge'|'c5a.4xlarge'|'c5a.8xlarge'|'c5a.large'|'c5a.xlarge'|'c5ad.12xlarge'|'c5ad.16xlarge'|'c5ad.24xlarge'|'c5ad.2xlarge'|'c5ad.4xlarge'|'c5ad.8xlarge'|'c5ad.large'|'c5ad.xlarge'|'c5d.12xlarge'|'c5d.18xlarge'|'c5d.24xlarge'|'c5d.2xlarge'|'c5d.4xlarge'|'c5d.9xlarge'|'c5d.large'|'c5d.xlarge'|'c5n.18xlarge'|'c5n.2xlarge'|'c5n.4xlarge'|'c5n.9xlarge'|'c5n.large'|'c5n.xlarge'|'c6a.12xlarge'|'c6a.16xlarge'|'c6a.24xlarge'|'c6a.2xlarge'|'c6a.32xlarge'|'c6a.48xlarge'|'c6a.4xlarge'|'c6a.8xlarge'|'c6a.large'|'c6a.xlarge'|'c6g.12xlarge'|'c6g.16xlarge'|'c6g.2xlarge'|'c6g.4xlarge'|'c6g.8xlarge'|'c6g.large'|'c6g.medium'|'c6g.xlarge'|'c6gd.12xlarge'|'c6gd.16xlarge'|'c6gd.2xlarge'|'c6gd.4xlarge'|'c6gd.8xlarge'|'c6gd.large'|'c6gd.medium'|'c6gd.xlarge'|'c6gn.12xlarge'|'c6gn.16xlarge'|'c6gn.2xlarge'|'c6gn.4xlarge'|'c6gn.8xlarge'|'c6gn.large'|'c6gn.medium'|'c6gn.xlarge'|'c6i.12xlarge'|'c6i.16xlarge'|'c6i.24xlarge'|'c6i.2xlarge'|'c6i.32xlarge'|'c6i.4xlarge'|'c6i.8xlarge'|'c6i.large'|'c6i.xlarge'|'c6id.12xlarge'|'c6id.16xlarge'|'c6id.24xlarge'|'c6id.2xlarge'|'c6id.32xlarge'|'c6id.4xlarge'|'c6id.8xlarge'|'c6id.large'|'c6id.xlarge'|'c6in.12xlarge'|'c6in.16xlarge'|'c6in.24xlarge'|'c6in.2xlarge'|'c6in.32xlarge'|'c6in.4xlarge'|'c6in.8xlarge'|'c6in.large'|'c6in.xlarge'|'c7a.12xlarge'|'c7a.16xlarge'|'c7a.24xlarge'|'c7a.2xlarge'|'c7a.32xlarge'|'c7a.48xlarge'|'c7a.4xlarge'|'c7a.8xlarge'|'c7a.large'|'c7a.medium'|'c7a.xlarge'|'c7g.12xlarge'|'c7g.16xlarge'|'c7g.2xlarge'|'c7g.4xlarge'|'c7g.8xlarge'|'c7g.large'|'c7g.medium'|'c7g.xlarge'|'c7gd.12xlarge'|'c7gd.16xlarge'|'c7gd.2xlarge'|'c7gd.4xlarge'|'c7gd.8xlarge'|'c7gd.large'|'c7gd.medium'|'c7gd.xlarge'|'c7gn.12xlarge'|'c7gn.16xlarge'|'c7gn.2xlarge'|'c7gn.4xlarge'|'c7gn.8xlarge'|'c7gn.large'|'c7gn.medium'|'c7gn.xlarge'|'c7i.12xlarge'|'c7i.16xlarge'|'c7i.24xlarge'|'c7i.2xlarge'|'c7i.48xlarge'|'c7i.4xlarge'|'c7i.8xlarge'|'c7i.large'|'c7i.xlarge'|'c8g.12xlarge'|'c8g.16xlarge'|'c8g.24xlarge'|'c8g.2xlarge'|'c8g.48xlarge'|'c8g.4xlarge'|'c8g.8xlarge'|'c8g.large'|'c8g.medium'|'c8g.xlarge'|'g5g.16xlarge'|'g5g.2xlarge'|'g5g.4xlarge'|'g5g.8xlarge'|'g5g.xlarge'|'m3.2xlarge'|'m3.large'|'m3.medium'|'m3.xlarge'|'m4.10xlarge'|'m4.16xlarge'|'m4.2xlarge'|'m4.4xlarge'|'m4.large'|'m4.xlarge'|'m5.12xlarge'|'m5.16xlarge'|'m5.24xlarge'|'m5.2xlarge'|'m5.4xlarge'|'m5.8xlarge'|'m5.large'|'m5.xlarge'|'m5a.12xlarge'|'m5a.16xlarge'|'m5a.24xlarge'|'m5a.2xlarge'|'m5a.4xlarge'|'m5a.8xlarge'|'m5a.large'|'m5a.xlarge'|'m5ad.12xlarge'|'m5ad.16xlarge'|'m5ad.24xlarge'|'m5ad.2xlarge'|'m5ad.4xlarge'|'m5ad.8xlarge'|'m5ad.large'|'m5ad.xlarge'|'m5d.12xlarge'|'m5d.16xlarge'|'m5d.24xlarge'|'m5d.2xlarge'|'m5d.4xlarge'|'m5d.8xlarge'|'m5d.large'|'m5d.xlarge'|'m5dn.12xlarge'|'m5dn.16xlarge'|'m5dn.24xlarge'|'m5dn.2xlarge'|'m5dn.4xlarge'|'m5dn.8xlarge'|'m5dn.large'|'m5dn.xlarge'|'m5n.12xlarge'|'m5n.16xlarge'|'m5n.24xlarge'|'m5n.2xlarge'|'m5n.4xlarge'|'m5n.8xlarge'|'m5n.large'|'m5n.xlarge'|'m6a.12xlarge'|'m6a.16xlarge'|'m6a.24xlarge'|'m6a.2xlarge'|'m6a.32xlarge'|'m6a.48xlarge'|'m6a.4xlarge'|'m6a.8xlarge'|'m6a.large'|'m6a.xlarge'|'m6g.12xlarge'|'m6g.16xlarge'|'m6g.2xlarge'|'m6g.4xlarge'|'m6g.8xlarge'|'m6g.large'|'m6g.medium'|'m6g.xlarge'|'m6gd.12xlarge'|'m6gd.16xlarge'|'m6gd.2xlarge'|'m6gd.4xlarge'|'m6gd.8xlarge'|'m6gd.large'|'m6gd.medium'|'m6gd.xlarge'|'m6i.12xlarge'|'m6i.16xlarge'|'m6i.24xlarge'|'m6i.2xlarge'|'m6i.32xlarge'|'m6i.4xlarge'|'m6i.8xlarge'|'m6i.large'|'m6i.xlarge'|'m6id.12xlarge'|'m6id.16xlarge'|'m6id.24xlarge'|'m6id.2xlarge'|'m6id.32xlarge'|'m6id.4xlarge'|'m6id.8xlarge'|'m6id.large'|'m6id.xlarge'|'m6idn.12xlarge'|'m6idn.16xlarge'|'m6idn.24xlarge'|'m6idn.2xlarge'|'m6idn.32xlarge'|'m6idn.4xlarge'|'m6idn.8xlarge'|'m6idn.large'|'m6idn.xlarge'|'m6in.12xlarge'|'m6in.16xlarge'|'m6in.24xlarge'|'m6in.2xlarge'|'m6in.32xlarge'|'m6in.4xlarge'|'m6in.8xlarge'|'m6in.large'|'m6in.xlarge'|'m7a.12xlarge'|'m7a.16xlarge'|'m7a.24xlarge'|'m7a.2xlarge'|'m7a.32xlarge'|'m7a.48xlarge'|'m7a.4xlarge'|'m7a.8xlarge'|'m7a.large'|'m7a.medium'|'m7a.xlarge'|'m7g.12xlarge'|'m7g.16xlarge'|'m7g.2xlarge'|'m7g.4xlarge'|'m7g.8xlarge'|'m7g.large'|'m7g.medium'|'m7g.xlarge'|'m7gd.12xlarge'|'m7gd.16xlarge'|'m7gd.2xlarge'|'m7gd.4xlarge'|'m7gd.8xlarge'|'m7gd.large'|'m7gd.medium'|'m7gd.xlarge'|'m7i.12xlarge'|'m7i.16xlarge'|'m7i.24xlarge'|'m7i.2xlarge'|'m7i.48xlarge'|'m7i.4xlarge'|'m7i.8xlarge'|'m7i.large'|'m7i.xlarge'|'m8g.12xlarge'|'m8g.16xlarge'|'m8g.24xlarge'|'m8g.2xlarge'|'m8g.48xlarge'|'m8g.4xlarge'|'m8g.8xlarge'|'m8g.large'|'m8g.medium'|'m8g.xlarge'|'r3.2xlarge'|'r3.4xlarge'|'r3.8xlarge'|'r3.large'|'r3.xlarge'|'r4.16xlarge'|'r4.2xlarge'|'r4.4xlarge'|'r4.8xlarge'|'r4.large'|'r4.xlarge'|'r5.12xlarge'|'r5.16xlarge'|'r5.24xlarge'|'r5.2xlarge'|'r5.4xlarge'|'r5.8xlarge'|'r5.large'|'r5.xlarge'|'r5a.12xlarge'|'r5a.16xlarge'|'r5a.24xlarge'|'r5a.2xlarge'|'r5a.4xlarge'|'r5a.8xlarge'|'r5a.large'|'r5a.xlarge'|'r5ad.12xlarge'|'r5ad.16xlarge'|'r5ad.24xlarge'|'r5ad.2xlarge'|'r5ad.4xlarge'|'r5ad.8xlarge'|'r5ad.large'|'r5ad.xlarge'|'r5d.12xlarge'|'r5d.16xlarge'|'r5d.24xlarge'|'r5d.2xlarge'|'r5d.4xlarge'|'r5d.8xlarge'|'r5d.large'|'r5d.xlarge'|'r5dn.12xlarge'|'r5dn.16xlarge'|'r5dn.24xlarge'|'r5dn.2xlarge'|'r5dn.4xlarge'|'r5dn.8xlarge'|'r5dn.large'|'r5dn.xlarge'|'r5n.12xlarge'|'r5n.16xlarge'|'r5n.24xlarge'|'r5n.2xlarge'|'r5n.4xlarge'|'r5n.8xlarge'|'r5n.large'|'r5n.xlarge'|'r6a.12xlarge'|'r6a.16xlarge'|'r6a.24xlarge'|'r6a.2xlarge'|'r6a.32xlarge'|'r6a.48xlarge'|'r6a.4xlarge'|'r6a.8xlarge'|'r6a.large'|'r6a.xlarge'|'r6g.12xlarge'|'r6g.16xlarge'|'r6g.2xlarge'|'r6g.4xlarge'|'r6g.8xlarge'|'r6g.large'|'r6g.medium'|'r6g.xlarge'|'r6gd.12xlarge'|'r6gd.16xlarge'|'r6gd.2xlarge'|'r6gd.4xlarge'|'r6gd.8xlarge'|'r6gd.large'|'r6gd.medium'|'r6gd.xlarge'|'r6i.12xlarge'|'r6i.16xlarge'|'r6i.24xlarge'|'r6i.2xlarge'|'r6i.32xlarge'|'r6i.4xlarge'|'r6i.8xlarge'|'r6i.large'|'r6i.xlarge'|'r6id.12xlarge'|'r6id.16xlarge'|'r6id.24xlarge'|'r6id.2xlarge'|'r6id.32xlarge'|'r6id.4xlarge'|'r6id.8xlarge'|'r6id.large'|'r6id.xlarge'|'r6idn.12xlarge'|'r6idn.16xlarge'|'r6idn.24xlarge'|'r6idn.2xlarge'|'r6idn.32xlarge'|'r6idn.4xlarge'|'r6idn.8xlarge'|'r6idn.large'|'r6idn.xlarge'|'r6in.12xlarge'|'r6in.16xlarge'|'r6in.24xlarge'|'r6in.2xlarge'|'r6in.32xlarge'|'r6in.4xlarge'|'r6in.8xlarge'|'r6in.large'|'r6in.xlarge'|'r7a.12xlarge'|'r7a.16xlarge'|'r7a.24xlarge'|'r7a.2xlarge'|'r7a.32xlarge'|'r7a.48xlarge'|'r7a.4xlarge'|'r7a.8xlarge'|'r7a.large'|'r7a.medium'|'r7a.xlarge'|'r7g.12xlarge'|'r7g.16xlarge'|'r7g.2xlarge'|'r7g.4xlarge'|'r7g.8xlarge'|'r7g.large'|'r7g.medium'|'r7g.xlarge'|'r7gd.12xlarge'|'r7gd.16xlarge'|'r7gd.2xlarge'|'r7gd.4xlarge'|'r7gd.8xlarge'|'r7gd.large'|'r7gd.medium'|'r7gd.xlarge'|'r7i.12xlarge'|'r7i.16xlarge'|'r7i.24xlarge'|'r7i.2xlarge'|'r7i.48xlarge'|'r7i.4xlarge'|'r7i.8xlarge'|'r7i.large'|'r7i.xlarge'|'r8g.12xlarge'|'r8g.16xlarge'|'r8g.24xlarge'|'r8g.2xlarge'|'r8g.48xlarge'|'r8g.4xlarge'|'r8g.8xlarge'|'r8g.large'|'r8g.medium'|'r8g.xlarge'|'t2.large'|'t2.medium'|'t2.micro'|'t2.small',
 *     EC2InboundPermissions?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     NewGameSessionProtectionPolicy?: 'FullProtection'|'NoProtection',
 *     RuntimeConfiguration?: array{
 *         ServerProcesses?: list<array>,
 *         MaxConcurrentGameSessionActivations?: int,
 *         GameSessionActivationTimeoutSeconds?: int,
 *         ...,
 *     },
 *     ResourceCreationLimitPolicy?: array{NewGameSessionsPerCreator?: int, PolicyPeriodInMinutes?: int, ...},
 *     MetricGroups?: list<string>,
 *     PeerVpcAwsAccountId?: string,
 *     PeerVpcId?: string,
 *     FleetType?: 'ON_DEMAND'|'SPOT',
 *     InstanceRoleArn?: string,
 *     CertificateConfiguration?: array{CertificateType?: 'DISABLED'|'GENERATED', ...},
 *     Locations?: list<array{Location?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ComputeType?: 'ANYWHERE'|'EC2',
 *     AnywhereConfiguration?: array{Cost?: string, ...},
 *     InstanceRoleCredentialsProvider?: 'SHARED_CREDENTIAL_FILE',
 *     PlayerGatewayMode?: 'DISABLED'|'ENABLED'|'REQUIRED',
 *     PlayerGatewayConfiguration?: array{GameServerIpProtocolSupported?: 'DUAL_STACK'|'IPv4', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFleetAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     BuildId?: string,
 *     ScriptId?: string,
 *     ServerLaunchPath?: string,
 *     ServerLaunchParameters?: string,
 *     LogPaths?: list<string>,
 *     EC2InstanceType?: 'c3.2xlarge'|'c3.4xlarge'|'c3.8xlarge'|'c3.large'|'c3.xlarge'|'c4.2xlarge'|'c4.4xlarge'|'c4.8xlarge'|'c4.large'|'c4.xlarge'|'c5.12xlarge'|'c5.18xlarge'|'c5.24xlarge'|'c5.2xlarge'|'c5.4xlarge'|'c5.9xlarge'|'c5.large'|'c5.xlarge'|'c5a.12xlarge'|'c5a.16xlarge'|'c5a.24xlarge'|'c5a.2xlarge'|'c5a.4xlarge'|'c5a.8xlarge'|'c5a.large'|'c5a.xlarge'|'c5ad.12xlarge'|'c5ad.16xlarge'|'c5ad.24xlarge'|'c5ad.2xlarge'|'c5ad.4xlarge'|'c5ad.8xlarge'|'c5ad.large'|'c5ad.xlarge'|'c5d.12xlarge'|'c5d.18xlarge'|'c5d.24xlarge'|'c5d.2xlarge'|'c5d.4xlarge'|'c5d.9xlarge'|'c5d.large'|'c5d.xlarge'|'c5n.18xlarge'|'c5n.2xlarge'|'c5n.4xlarge'|'c5n.9xlarge'|'c5n.large'|'c5n.xlarge'|'c6a.12xlarge'|'c6a.16xlarge'|'c6a.24xlarge'|'c6a.2xlarge'|'c6a.32xlarge'|'c6a.48xlarge'|'c6a.4xlarge'|'c6a.8xlarge'|'c6a.large'|'c6a.xlarge'|'c6g.12xlarge'|'c6g.16xlarge'|'c6g.2xlarge'|'c6g.4xlarge'|'c6g.8xlarge'|'c6g.large'|'c6g.medium'|'c6g.xlarge'|'c6gd.12xlarge'|'c6gd.16xlarge'|'c6gd.2xlarge'|'c6gd.4xlarge'|'c6gd.8xlarge'|'c6gd.large'|'c6gd.medium'|'c6gd.xlarge'|'c6gn.12xlarge'|'c6gn.16xlarge'|'c6gn.2xlarge'|'c6gn.4xlarge'|'c6gn.8xlarge'|'c6gn.large'|'c6gn.medium'|'c6gn.xlarge'|'c6i.12xlarge'|'c6i.16xlarge'|'c6i.24xlarge'|'c6i.2xlarge'|'c6i.32xlarge'|'c6i.4xlarge'|'c6i.8xlarge'|'c6i.large'|'c6i.xlarge'|'c6id.12xlarge'|'c6id.16xlarge'|'c6id.24xlarge'|'c6id.2xlarge'|'c6id.32xlarge'|'c6id.4xlarge'|'c6id.8xlarge'|'c6id.large'|'c6id.xlarge'|'c6in.12xlarge'|'c6in.16xlarge'|'c6in.24xlarge'|'c6in.2xlarge'|'c6in.32xlarge'|'c6in.4xlarge'|'c6in.8xlarge'|'c6in.large'|'c6in.xlarge'|'c7a.12xlarge'|'c7a.16xlarge'|'c7a.24xlarge'|'c7a.2xlarge'|'c7a.32xlarge'|'c7a.48xlarge'|'c7a.4xlarge'|'c7a.8xlarge'|'c7a.large'|'c7a.medium'|'c7a.xlarge'|'c7g.12xlarge'|'c7g.16xlarge'|'c7g.2xlarge'|'c7g.4xlarge'|'c7g.8xlarge'|'c7g.large'|'c7g.medium'|'c7g.xlarge'|'c7gd.12xlarge'|'c7gd.16xlarge'|'c7gd.2xlarge'|'c7gd.4xlarge'|'c7gd.8xlarge'|'c7gd.large'|'c7gd.medium'|'c7gd.xlarge'|'c7gn.12xlarge'|'c7gn.16xlarge'|'c7gn.2xlarge'|'c7gn.4xlarge'|'c7gn.8xlarge'|'c7gn.large'|'c7gn.medium'|'c7gn.xlarge'|'c7i.12xlarge'|'c7i.16xlarge'|'c7i.24xlarge'|'c7i.2xlarge'|'c7i.48xlarge'|'c7i.4xlarge'|'c7i.8xlarge'|'c7i.large'|'c7i.xlarge'|'c8g.12xlarge'|'c8g.16xlarge'|'c8g.24xlarge'|'c8g.2xlarge'|'c8g.48xlarge'|'c8g.4xlarge'|'c8g.8xlarge'|'c8g.large'|'c8g.medium'|'c8g.xlarge'|'g5g.16xlarge'|'g5g.2xlarge'|'g5g.4xlarge'|'g5g.8xlarge'|'g5g.xlarge'|'m3.2xlarge'|'m3.large'|'m3.medium'|'m3.xlarge'|'m4.10xlarge'|'m4.16xlarge'|'m4.2xlarge'|'m4.4xlarge'|'m4.large'|'m4.xlarge'|'m5.12xlarge'|'m5.16xlarge'|'m5.24xlarge'|'m5.2xlarge'|'m5.4xlarge'|'m5.8xlarge'|'m5.large'|'m5.xlarge'|'m5a.12xlarge'|'m5a.16xlarge'|'m5a.24xlarge'|'m5a.2xlarge'|'m5a.4xlarge'|'m5a.8xlarge'|'m5a.large'|'m5a.xlarge'|'m5ad.12xlarge'|'m5ad.16xlarge'|'m5ad.24xlarge'|'m5ad.2xlarge'|'m5ad.4xlarge'|'m5ad.8xlarge'|'m5ad.large'|'m5ad.xlarge'|'m5d.12xlarge'|'m5d.16xlarge'|'m5d.24xlarge'|'m5d.2xlarge'|'m5d.4xlarge'|'m5d.8xlarge'|'m5d.large'|'m5d.xlarge'|'m5dn.12xlarge'|'m5dn.16xlarge'|'m5dn.24xlarge'|'m5dn.2xlarge'|'m5dn.4xlarge'|'m5dn.8xlarge'|'m5dn.large'|'m5dn.xlarge'|'m5n.12xlarge'|'m5n.16xlarge'|'m5n.24xlarge'|'m5n.2xlarge'|'m5n.4xlarge'|'m5n.8xlarge'|'m5n.large'|'m5n.xlarge'|'m6a.12xlarge'|'m6a.16xlarge'|'m6a.24xlarge'|'m6a.2xlarge'|'m6a.32xlarge'|'m6a.48xlarge'|'m6a.4xlarge'|'m6a.8xlarge'|'m6a.large'|'m6a.xlarge'|'m6g.12xlarge'|'m6g.16xlarge'|'m6g.2xlarge'|'m6g.4xlarge'|'m6g.8xlarge'|'m6g.large'|'m6g.medium'|'m6g.xlarge'|'m6gd.12xlarge'|'m6gd.16xlarge'|'m6gd.2xlarge'|'m6gd.4xlarge'|'m6gd.8xlarge'|'m6gd.large'|'m6gd.medium'|'m6gd.xlarge'|'m6i.12xlarge'|'m6i.16xlarge'|'m6i.24xlarge'|'m6i.2xlarge'|'m6i.32xlarge'|'m6i.4xlarge'|'m6i.8xlarge'|'m6i.large'|'m6i.xlarge'|'m6id.12xlarge'|'m6id.16xlarge'|'m6id.24xlarge'|'m6id.2xlarge'|'m6id.32xlarge'|'m6id.4xlarge'|'m6id.8xlarge'|'m6id.large'|'m6id.xlarge'|'m6idn.12xlarge'|'m6idn.16xlarge'|'m6idn.24xlarge'|'m6idn.2xlarge'|'m6idn.32xlarge'|'m6idn.4xlarge'|'m6idn.8xlarge'|'m6idn.large'|'m6idn.xlarge'|'m6in.12xlarge'|'m6in.16xlarge'|'m6in.24xlarge'|'m6in.2xlarge'|'m6in.32xlarge'|'m6in.4xlarge'|'m6in.8xlarge'|'m6in.large'|'m6in.xlarge'|'m7a.12xlarge'|'m7a.16xlarge'|'m7a.24xlarge'|'m7a.2xlarge'|'m7a.32xlarge'|'m7a.48xlarge'|'m7a.4xlarge'|'m7a.8xlarge'|'m7a.large'|'m7a.medium'|'m7a.xlarge'|'m7g.12xlarge'|'m7g.16xlarge'|'m7g.2xlarge'|'m7g.4xlarge'|'m7g.8xlarge'|'m7g.large'|'m7g.medium'|'m7g.xlarge'|'m7gd.12xlarge'|'m7gd.16xlarge'|'m7gd.2xlarge'|'m7gd.4xlarge'|'m7gd.8xlarge'|'m7gd.large'|'m7gd.medium'|'m7gd.xlarge'|'m7i.12xlarge'|'m7i.16xlarge'|'m7i.24xlarge'|'m7i.2xlarge'|'m7i.48xlarge'|'m7i.4xlarge'|'m7i.8xlarge'|'m7i.large'|'m7i.xlarge'|'m8g.12xlarge'|'m8g.16xlarge'|'m8g.24xlarge'|'m8g.2xlarge'|'m8g.48xlarge'|'m8g.4xlarge'|'m8g.8xlarge'|'m8g.large'|'m8g.medium'|'m8g.xlarge'|'r3.2xlarge'|'r3.4xlarge'|'r3.8xlarge'|'r3.large'|'r3.xlarge'|'r4.16xlarge'|'r4.2xlarge'|'r4.4xlarge'|'r4.8xlarge'|'r4.large'|'r4.xlarge'|'r5.12xlarge'|'r5.16xlarge'|'r5.24xlarge'|'r5.2xlarge'|'r5.4xlarge'|'r5.8xlarge'|'r5.large'|'r5.xlarge'|'r5a.12xlarge'|'r5a.16xlarge'|'r5a.24xlarge'|'r5a.2xlarge'|'r5a.4xlarge'|'r5a.8xlarge'|'r5a.large'|'r5a.xlarge'|'r5ad.12xlarge'|'r5ad.16xlarge'|'r5ad.24xlarge'|'r5ad.2xlarge'|'r5ad.4xlarge'|'r5ad.8xlarge'|'r5ad.large'|'r5ad.xlarge'|'r5d.12xlarge'|'r5d.16xlarge'|'r5d.24xlarge'|'r5d.2xlarge'|'r5d.4xlarge'|'r5d.8xlarge'|'r5d.large'|'r5d.xlarge'|'r5dn.12xlarge'|'r5dn.16xlarge'|'r5dn.24xlarge'|'r5dn.2xlarge'|'r5dn.4xlarge'|'r5dn.8xlarge'|'r5dn.large'|'r5dn.xlarge'|'r5n.12xlarge'|'r5n.16xlarge'|'r5n.24xlarge'|'r5n.2xlarge'|'r5n.4xlarge'|'r5n.8xlarge'|'r5n.large'|'r5n.xlarge'|'r6a.12xlarge'|'r6a.16xlarge'|'r6a.24xlarge'|'r6a.2xlarge'|'r6a.32xlarge'|'r6a.48xlarge'|'r6a.4xlarge'|'r6a.8xlarge'|'r6a.large'|'r6a.xlarge'|'r6g.12xlarge'|'r6g.16xlarge'|'r6g.2xlarge'|'r6g.4xlarge'|'r6g.8xlarge'|'r6g.large'|'r6g.medium'|'r6g.xlarge'|'r6gd.12xlarge'|'r6gd.16xlarge'|'r6gd.2xlarge'|'r6gd.4xlarge'|'r6gd.8xlarge'|'r6gd.large'|'r6gd.medium'|'r6gd.xlarge'|'r6i.12xlarge'|'r6i.16xlarge'|'r6i.24xlarge'|'r6i.2xlarge'|'r6i.32xlarge'|'r6i.4xlarge'|'r6i.8xlarge'|'r6i.large'|'r6i.xlarge'|'r6id.12xlarge'|'r6id.16xlarge'|'r6id.24xlarge'|'r6id.2xlarge'|'r6id.32xlarge'|'r6id.4xlarge'|'r6id.8xlarge'|'r6id.large'|'r6id.xlarge'|'r6idn.12xlarge'|'r6idn.16xlarge'|'r6idn.24xlarge'|'r6idn.2xlarge'|'r6idn.32xlarge'|'r6idn.4xlarge'|'r6idn.8xlarge'|'r6idn.large'|'r6idn.xlarge'|'r6in.12xlarge'|'r6in.16xlarge'|'r6in.24xlarge'|'r6in.2xlarge'|'r6in.32xlarge'|'r6in.4xlarge'|'r6in.8xlarge'|'r6in.large'|'r6in.xlarge'|'r7a.12xlarge'|'r7a.16xlarge'|'r7a.24xlarge'|'r7a.2xlarge'|'r7a.32xlarge'|'r7a.48xlarge'|'r7a.4xlarge'|'r7a.8xlarge'|'r7a.large'|'r7a.medium'|'r7a.xlarge'|'r7g.12xlarge'|'r7g.16xlarge'|'r7g.2xlarge'|'r7g.4xlarge'|'r7g.8xlarge'|'r7g.large'|'r7g.medium'|'r7g.xlarge'|'r7gd.12xlarge'|'r7gd.16xlarge'|'r7gd.2xlarge'|'r7gd.4xlarge'|'r7gd.8xlarge'|'r7gd.large'|'r7gd.medium'|'r7gd.xlarge'|'r7i.12xlarge'|'r7i.16xlarge'|'r7i.24xlarge'|'r7i.2xlarge'|'r7i.48xlarge'|'r7i.4xlarge'|'r7i.8xlarge'|'r7i.large'|'r7i.xlarge'|'r8g.12xlarge'|'r8g.16xlarge'|'r8g.24xlarge'|'r8g.2xlarge'|'r8g.48xlarge'|'r8g.4xlarge'|'r8g.8xlarge'|'r8g.large'|'r8g.medium'|'r8g.xlarge'|'t2.large'|'t2.medium'|'t2.micro'|'t2.small',
 *     EC2InboundPermissions?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     NewGameSessionProtectionPolicy?: 'FullProtection'|'NoProtection',
 *     RuntimeConfiguration?: array{
 *         ServerProcesses?: list<array>,
 *         MaxConcurrentGameSessionActivations?: int,
 *         GameSessionActivationTimeoutSeconds?: int,
 *         ...,
 *     },
 *     ResourceCreationLimitPolicy?: array{NewGameSessionsPerCreator?: int, PolicyPeriodInMinutes?: int, ...},
 *     MetricGroups?: list<string>,
 *     PeerVpcAwsAccountId?: string,
 *     PeerVpcId?: string,
 *     FleetType?: 'ON_DEMAND'|'SPOT',
 *     InstanceRoleArn?: string,
 *     CertificateConfiguration?: array{CertificateType?: 'DISABLED'|'GENERATED', ...},
 *     Locations?: list<array{Location?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ComputeType?: 'ANYWHERE'|'EC2',
 *     AnywhereConfiguration?: array{Cost?: string, ...},
 *     InstanceRoleCredentialsProvider?: 'SHARED_CREDENTIAL_FILE',
 *     PlayerGatewayMode?: 'DISABLED'|'ENABLED'|'REQUIRED',
 *     PlayerGatewayConfiguration?: array{GameServerIpProtocolSupported?: 'DUAL_STACK'|'IPv4', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFleetLocations(array $args = [])
 * @phpstan-method \Aws\Result createFleetLocations(array{FleetId?: string, Locations?: list<array{Location?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createFleetLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFleetLocationsAsync(array{FleetId?: string, Locations?: list<array{Location?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createGameServerGroup(array $args = [])
 * @phpstan-method \Aws\Result createGameServerGroup(array{
 *     GameServerGroupName?: string,
 *     RoleArn?: string,
 *     MinSize?: int,
 *     MaxSize?: int,
 *     LaunchTemplate?: array{LaunchTemplateId?: string, LaunchTemplateName?: string, Version?: string, ...},
 *     InstanceDefinitions?: list<array{
 *         InstanceType?: 'c4.2xlarge'|'c4.4xlarge'|'c4.8xlarge'|'c4.large'|'c4.xlarge'|'c5.12xlarge'|'c5.18xlarge'|'c5.24xlarge'|'c5.2xlarge'|'c5.4xlarge'|'c5.9xlarge'|'c5.large'|'c5.xlarge'|'c5a.12xlarge'|'c5a.16xlarge'|'c5a.24xlarge'|'c5a.2xlarge'|'c5a.4xlarge'|'c5a.8xlarge'|'c5a.large'|'c5a.xlarge'|'c6g.12xlarge'|'c6g.16xlarge'|'c6g.2xlarge'|'c6g.4xlarge'|'c6g.8xlarge'|'c6g.large'|'c6g.medium'|'c6g.xlarge'|'m4.10xlarge'|'m4.2xlarge'|'m4.4xlarge'|'m4.large'|'m4.xlarge'|'m5.12xlarge'|'m5.16xlarge'|'m5.24xlarge'|'m5.2xlarge'|'m5.4xlarge'|'m5.8xlarge'|'m5.large'|'m5.xlarge'|'m5a.12xlarge'|'m5a.16xlarge'|'m5a.24xlarge'|'m5a.2xlarge'|'m5a.4xlarge'|'m5a.8xlarge'|'m5a.large'|'m5a.xlarge'|'m6g.12xlarge'|'m6g.16xlarge'|'m6g.2xlarge'|'m6g.4xlarge'|'m6g.8xlarge'|'m6g.large'|'m6g.medium'|'m6g.xlarge'|'r4.16xlarge'|'r4.2xlarge'|'r4.4xlarge'|'r4.8xlarge'|'r4.large'|'r4.xlarge'|'r5.12xlarge'|'r5.16xlarge'|'r5.24xlarge'|'r5.2xlarge'|'r5.4xlarge'|'r5.8xlarge'|'r5.large'|'r5.xlarge'|'r5a.12xlarge'|'r5a.16xlarge'|'r5a.24xlarge'|'r5a.2xlarge'|'r5a.4xlarge'|'r5a.8xlarge'|'r5a.large'|'r5a.xlarge'|'r6g.12xlarge'|'r6g.16xlarge'|'r6g.2xlarge'|'r6g.4xlarge'|'r6g.8xlarge'|'r6g.large'|'r6g.medium'|'r6g.xlarge',
 *         WeightedCapacity?: string,
 *         ...,
 *     }>,
 *     AutoScalingPolicy?: array{EstimatedInstanceWarmup?: int, TargetTrackingConfiguration?: array{TargetValue?: float, ...}, ...},
 *     BalancingStrategy?: 'ON_DEMAND_ONLY'|'SPOT_ONLY'|'SPOT_PREFERRED',
 *     GameServerProtectionPolicy?: 'FULL_PROTECTION'|'NO_PROTECTION',
 *     VpcSubnets?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGameServerGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGameServerGroupAsync(array{
 *     GameServerGroupName?: string,
 *     RoleArn?: string,
 *     MinSize?: int,
 *     MaxSize?: int,
 *     LaunchTemplate?: array{LaunchTemplateId?: string, LaunchTemplateName?: string, Version?: string, ...},
 *     InstanceDefinitions?: list<array{
 *         InstanceType?: 'c4.2xlarge'|'c4.4xlarge'|'c4.8xlarge'|'c4.large'|'c4.xlarge'|'c5.12xlarge'|'c5.18xlarge'|'c5.24xlarge'|'c5.2xlarge'|'c5.4xlarge'|'c5.9xlarge'|'c5.large'|'c5.xlarge'|'c5a.12xlarge'|'c5a.16xlarge'|'c5a.24xlarge'|'c5a.2xlarge'|'c5a.4xlarge'|'c5a.8xlarge'|'c5a.large'|'c5a.xlarge'|'c6g.12xlarge'|'c6g.16xlarge'|'c6g.2xlarge'|'c6g.4xlarge'|'c6g.8xlarge'|'c6g.large'|'c6g.medium'|'c6g.xlarge'|'m4.10xlarge'|'m4.2xlarge'|'m4.4xlarge'|'m4.large'|'m4.xlarge'|'m5.12xlarge'|'m5.16xlarge'|'m5.24xlarge'|'m5.2xlarge'|'m5.4xlarge'|'m5.8xlarge'|'m5.large'|'m5.xlarge'|'m5a.12xlarge'|'m5a.16xlarge'|'m5a.24xlarge'|'m5a.2xlarge'|'m5a.4xlarge'|'m5a.8xlarge'|'m5a.large'|'m5a.xlarge'|'m6g.12xlarge'|'m6g.16xlarge'|'m6g.2xlarge'|'m6g.4xlarge'|'m6g.8xlarge'|'m6g.large'|'m6g.medium'|'m6g.xlarge'|'r4.16xlarge'|'r4.2xlarge'|'r4.4xlarge'|'r4.8xlarge'|'r4.large'|'r4.xlarge'|'r5.12xlarge'|'r5.16xlarge'|'r5.24xlarge'|'r5.2xlarge'|'r5.4xlarge'|'r5.8xlarge'|'r5.large'|'r5.xlarge'|'r5a.12xlarge'|'r5a.16xlarge'|'r5a.24xlarge'|'r5a.2xlarge'|'r5a.4xlarge'|'r5a.8xlarge'|'r5a.large'|'r5a.xlarge'|'r6g.12xlarge'|'r6g.16xlarge'|'r6g.2xlarge'|'r6g.4xlarge'|'r6g.8xlarge'|'r6g.large'|'r6g.medium'|'r6g.xlarge',
 *         WeightedCapacity?: string,
 *         ...,
 *     }>,
 *     AutoScalingPolicy?: array{EstimatedInstanceWarmup?: int, TargetTrackingConfiguration?: array{TargetValue?: float, ...}, ...},
 *     BalancingStrategy?: 'ON_DEMAND_ONLY'|'SPOT_ONLY'|'SPOT_PREFERRED',
 *     GameServerProtectionPolicy?: 'FULL_PROTECTION'|'NO_PROTECTION',
 *     VpcSubnets?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGameSession(array $args = [])
 * @phpstan-method \Aws\Result createGameSession(array{
 *     FleetId?: string,
 *     AliasId?: string,
 *     MaximumPlayerSessionCount?: int,
 *     Name?: string,
 *     GameProperties?: list<array{Key?: string, Value?: string, ...}>,
 *     CreatorId?: string,
 *     GameSessionId?: string,
 *     IdempotencyToken?: string,
 *     GameSessionData?: string,
 *     Location?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGameSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGameSessionAsync(array{
 *     FleetId?: string,
 *     AliasId?: string,
 *     MaximumPlayerSessionCount?: int,
 *     Name?: string,
 *     GameProperties?: list<array{Key?: string, Value?: string, ...}>,
 *     CreatorId?: string,
 *     GameSessionId?: string,
 *     IdempotencyToken?: string,
 *     GameSessionData?: string,
 *     Location?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGameSessionQueue(array $args = [])
 * @phpstan-method \Aws\Result createGameSessionQueue(array{
 *     Name?: string,
 *     TimeoutInSeconds?: int,
 *     PlayerLatencyPolicies?: list<array{MaximumIndividualPlayerLatencyMilliseconds?: int, PolicyDurationSeconds?: int, ...}>,
 *     Destinations?: list<array{DestinationArn?: string, ...}>,
 *     FilterConfiguration?: array{AllowedLocations?: list<string>, ...},
 *     PriorityConfiguration?: array{PriorityOrder?: list<'COST'|'DESTINATION'|'LATENCY'|'LOCATION'>, LocationOrder?: list<string>, ...},
 *     CustomEventData?: string,
 *     NotificationTarget?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGameSessionQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGameSessionQueueAsync(array{
 *     Name?: string,
 *     TimeoutInSeconds?: int,
 *     PlayerLatencyPolicies?: list<array{MaximumIndividualPlayerLatencyMilliseconds?: int, PolicyDurationSeconds?: int, ...}>,
 *     Destinations?: list<array{DestinationArn?: string, ...}>,
 *     FilterConfiguration?: array{AllowedLocations?: list<string>, ...},
 *     PriorityConfiguration?: array{PriorityOrder?: list<'COST'|'DESTINATION'|'LATENCY'|'LOCATION'>, LocationOrder?: list<string>, ...},
 *     CustomEventData?: string,
 *     NotificationTarget?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLocation(array $args = [])
 * @phpstan-method \Aws\Result createLocation(array{LocationName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLocationAsync(array{LocationName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createMatchmakingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createMatchmakingConfiguration(array{
 *     Name?: string,
 *     Description?: string,
 *     GameSessionQueueArns?: list<string>,
 *     RequestTimeoutSeconds?: int,
 *     AcceptanceTimeoutSeconds?: int,
 *     AcceptanceRequired?: bool,
 *     RuleSetName?: string,
 *     NotificationTarget?: string,
 *     AdditionalPlayerCount?: int,
 *     CustomEventData?: string,
 *     GameProperties?: list<array{Key?: string, Value?: string, ...}>,
 *     GameSessionData?: string,
 *     BackfillMode?: 'AUTOMATIC'|'MANUAL',
 *     FlexMatchMode?: 'STANDALONE'|'WITH_QUEUE',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMatchmakingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMatchmakingConfigurationAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     GameSessionQueueArns?: list<string>,
 *     RequestTimeoutSeconds?: int,
 *     AcceptanceTimeoutSeconds?: int,
 *     AcceptanceRequired?: bool,
 *     RuleSetName?: string,
 *     NotificationTarget?: string,
 *     AdditionalPlayerCount?: int,
 *     CustomEventData?: string,
 *     GameProperties?: list<array{Key?: string, Value?: string, ...}>,
 *     GameSessionData?: string,
 *     BackfillMode?: 'AUTOMATIC'|'MANUAL',
 *     FlexMatchMode?: 'STANDALONE'|'WITH_QUEUE',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMatchmakingRuleSet(array $args = [])
 * @phpstan-method \Aws\Result createMatchmakingRuleSet(array{Name?: string, RuleSetBody?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createMatchmakingRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMatchmakingRuleSetAsync(array{Name?: string, RuleSetBody?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createPlayerSession(array $args = [])
 * @phpstan-method \Aws\Result createPlayerSession(array{GameSessionId?: string, PlayerId?: string, PlayerData?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlayerSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPlayerSessionAsync(array{GameSessionId?: string, PlayerId?: string, PlayerData?: string, ...} $args = [])
 * @method \Aws\Result createPlayerSessions(array $args = [])
 * @phpstan-method \Aws\Result createPlayerSessions(array{GameSessionId?: string, PlayerIds?: list<string>, PlayerDataMap?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlayerSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPlayerSessionsAsync(array{GameSessionId?: string, PlayerIds?: list<string>, PlayerDataMap?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createScript(array $args = [])
 * @phpstan-method \Aws\Result createScript(array{
 *     Name?: string,
 *     Version?: string,
 *     StorageLocation?: array{Bucket?: string, Key?: string, RoleArn?: string, ObjectVersion?: string, ...},
 *     ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NodeJsVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScriptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScriptAsync(array{
 *     Name?: string,
 *     Version?: string,
 *     StorageLocation?: array{Bucket?: string, Key?: string, RoleArn?: string, ObjectVersion?: string, ...},
 *     ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NodeJsVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcPeeringAuthorization(array $args = [])
 * @phpstan-method \Aws\Result createVpcPeeringAuthorization(array{GameLiftAwsAccountId?: string, PeerVpcId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcPeeringAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcPeeringAuthorizationAsync(array{GameLiftAwsAccountId?: string, PeerVpcId?: string, ...} $args = [])
 * @method \Aws\Result createVpcPeeringConnection(array $args = [])
 * @phpstan-method \Aws\Result createVpcPeeringConnection(array{FleetId?: string, PeerVpcAwsAccountId?: string, PeerVpcId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcPeeringConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcPeeringConnectionAsync(array{FleetId?: string, PeerVpcAwsAccountId?: string, PeerVpcId?: string, ...} $args = [])
 * @method \Aws\Result deleteAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteAlias(array{AliasId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAliasAsync(array{AliasId?: string, ...} $args = [])
 * @method \Aws\Result deleteBuild(array $args = [])
 * @phpstan-method \Aws\Result deleteBuild(array{BuildId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBuildAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBuildAsync(array{BuildId?: string, ...} $args = [])
 * @method \Aws\Result deleteContainerFleet(array $args = [])
 * @phpstan-method \Aws\Result deleteContainerFleet(array{FleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContainerFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContainerFleetAsync(array{FleetId?: string, ...} $args = [])
 * @method \Aws\Result deleteContainerGroupDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteContainerGroupDefinition(array{Name?: string, VersionNumber?: int, VersionCountToRetain?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContainerGroupDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContainerGroupDefinitionAsync(array{Name?: string, VersionNumber?: int, VersionCountToRetain?: int, ...} $args = [])
 * @method \Aws\Result deleteFleet(array $args = [])
 * @phpstan-method \Aws\Result deleteFleet(array{FleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFleetAsync(array{FleetId?: string, ...} $args = [])
 * @method \Aws\Result deleteFleetLocations(array $args = [])
 * @phpstan-method \Aws\Result deleteFleetLocations(array{FleetId?: string, Locations?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFleetLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFleetLocationsAsync(array{FleetId?: string, Locations?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteGameServerGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGameServerGroup(array{GameServerGroupName?: string, DeleteOption?: 'FORCE_DELETE'|'RETAIN'|'SAFE_DELETE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGameServerGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGameServerGroupAsync(array{GameServerGroupName?: string, DeleteOption?: 'FORCE_DELETE'|'RETAIN'|'SAFE_DELETE', ...} $args = [])
 * @method \Aws\Result deleteGameSessionQueue(array $args = [])
 * @phpstan-method \Aws\Result deleteGameSessionQueue(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGameSessionQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGameSessionQueueAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteLocation(array $args = [])
 * @phpstan-method \Aws\Result deleteLocation(array{LocationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLocationAsync(array{LocationName?: string, ...} $args = [])
 * @method \Aws\Result deleteMatchmakingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteMatchmakingConfiguration(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMatchmakingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMatchmakingConfigurationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteMatchmakingRuleSet(array $args = [])
 * @phpstan-method \Aws\Result deleteMatchmakingRuleSet(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMatchmakingRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMatchmakingRuleSetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteScalingPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteScalingPolicy(array{Name?: string, FleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScalingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScalingPolicyAsync(array{Name?: string, FleetId?: string, ...} $args = [])
 * @method \Aws\Result deleteScript(array $args = [])
 * @phpstan-method \Aws\Result deleteScript(array{ScriptId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScriptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScriptAsync(array{ScriptId?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcPeeringAuthorization(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcPeeringAuthorization(array{GameLiftAwsAccountId?: string, PeerVpcId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcPeeringAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcPeeringAuthorizationAsync(array{GameLiftAwsAccountId?: string, PeerVpcId?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcPeeringConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcPeeringConnection(array{FleetId?: string, VpcPeeringConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcPeeringConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcPeeringConnectionAsync(array{FleetId?: string, VpcPeeringConnectionId?: string, ...} $args = [])
 * @method \Aws\Result deregisterCompute(array $args = [])
 * @phpstan-method \Aws\Result deregisterCompute(array{FleetId?: string, ComputeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterComputeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterComputeAsync(array{FleetId?: string, ComputeName?: string, ...} $args = [])
 * @method \Aws\Result deregisterGameServer(array $args = [])
 * @phpstan-method \Aws\Result deregisterGameServer(array{GameServerGroupName?: string, GameServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterGameServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterGameServerAsync(array{GameServerGroupName?: string, GameServerId?: string, ...} $args = [])
 * @method \Aws\Result describeAlias(array $args = [])
 * @phpstan-method \Aws\Result describeAlias(array{AliasId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAliasAsync(array{AliasId?: string, ...} $args = [])
 * @method \Aws\Result describeBuild(array $args = [])
 * @phpstan-method \Aws\Result describeBuild(array{BuildId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBuildAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBuildAsync(array{BuildId?: string, ...} $args = [])
 * @method \Aws\Result describeCompute(array $args = [])
 * @phpstan-method \Aws\Result describeCompute(array{FleetId?: string, ComputeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComputeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeComputeAsync(array{FleetId?: string, ComputeName?: string, ...} $args = [])
 * @method \Aws\Result describeContainerFleet(array $args = [])
 * @phpstan-method \Aws\Result describeContainerFleet(array{FleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContainerFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContainerFleetAsync(array{FleetId?: string, ...} $args = [])
 * @method \Aws\Result describeContainerGroupDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeContainerGroupDefinition(array{Name?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContainerGroupDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContainerGroupDefinitionAsync(array{Name?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result describeContainerGroupPortMappings(array $args = [])
 * @phpstan-method \Aws\Result describeContainerGroupPortMappings(array{
 *     FleetId?: string,
 *     ContainerGroupType?: 'GAME_SERVER'|'PER_INSTANCE',
 *     ComputeName?: string,
 *     InstanceId?: string,
 *     ContainerName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContainerGroupPortMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContainerGroupPortMappingsAsync(array{
 *     FleetId?: string,
 *     ContainerGroupType?: 'GAME_SERVER'|'PER_INSTANCE',
 *     ComputeName?: string,
 *     InstanceId?: string,
 *     ContainerName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEC2InstanceLimits(array $args = [])
 * @phpstan-method \Aws\Result describeEC2InstanceLimits(array{
 *     EC2InstanceType?: 'c3.2xlarge'|'c3.4xlarge'|'c3.8xlarge'|'c3.large'|'c3.xlarge'|'c4.2xlarge'|'c4.4xlarge'|'c4.8xlarge'|'c4.large'|'c4.xlarge'|'c5.12xlarge'|'c5.18xlarge'|'c5.24xlarge'|'c5.2xlarge'|'c5.4xlarge'|'c5.9xlarge'|'c5.large'|'c5.xlarge'|'c5a.12xlarge'|'c5a.16xlarge'|'c5a.24xlarge'|'c5a.2xlarge'|'c5a.4xlarge'|'c5a.8xlarge'|'c5a.large'|'c5a.xlarge'|'c5ad.12xlarge'|'c5ad.16xlarge'|'c5ad.24xlarge'|'c5ad.2xlarge'|'c5ad.4xlarge'|'c5ad.8xlarge'|'c5ad.large'|'c5ad.xlarge'|'c5d.12xlarge'|'c5d.18xlarge'|'c5d.24xlarge'|'c5d.2xlarge'|'c5d.4xlarge'|'c5d.9xlarge'|'c5d.large'|'c5d.xlarge'|'c5n.18xlarge'|'c5n.2xlarge'|'c5n.4xlarge'|'c5n.9xlarge'|'c5n.large'|'c5n.xlarge'|'c6a.12xlarge'|'c6a.16xlarge'|'c6a.24xlarge'|'c6a.2xlarge'|'c6a.32xlarge'|'c6a.48xlarge'|'c6a.4xlarge'|'c6a.8xlarge'|'c6a.large'|'c6a.xlarge'|'c6g.12xlarge'|'c6g.16xlarge'|'c6g.2xlarge'|'c6g.4xlarge'|'c6g.8xlarge'|'c6g.large'|'c6g.medium'|'c6g.xlarge'|'c6gd.12xlarge'|'c6gd.16xlarge'|'c6gd.2xlarge'|'c6gd.4xlarge'|'c6gd.8xlarge'|'c6gd.large'|'c6gd.medium'|'c6gd.xlarge'|'c6gn.12xlarge'|'c6gn.16xlarge'|'c6gn.2xlarge'|'c6gn.4xlarge'|'c6gn.8xlarge'|'c6gn.large'|'c6gn.medium'|'c6gn.xlarge'|'c6i.12xlarge'|'c6i.16xlarge'|'c6i.24xlarge'|'c6i.2xlarge'|'c6i.32xlarge'|'c6i.4xlarge'|'c6i.8xlarge'|'c6i.large'|'c6i.xlarge'|'c6id.12xlarge'|'c6id.16xlarge'|'c6id.24xlarge'|'c6id.2xlarge'|'c6id.32xlarge'|'c6id.4xlarge'|'c6id.8xlarge'|'c6id.large'|'c6id.xlarge'|'c6in.12xlarge'|'c6in.16xlarge'|'c6in.24xlarge'|'c6in.2xlarge'|'c6in.32xlarge'|'c6in.4xlarge'|'c6in.8xlarge'|'c6in.large'|'c6in.xlarge'|'c7a.12xlarge'|'c7a.16xlarge'|'c7a.24xlarge'|'c7a.2xlarge'|'c7a.32xlarge'|'c7a.48xlarge'|'c7a.4xlarge'|'c7a.8xlarge'|'c7a.large'|'c7a.medium'|'c7a.xlarge'|'c7g.12xlarge'|'c7g.16xlarge'|'c7g.2xlarge'|'c7g.4xlarge'|'c7g.8xlarge'|'c7g.large'|'c7g.medium'|'c7g.xlarge'|'c7gd.12xlarge'|'c7gd.16xlarge'|'c7gd.2xlarge'|'c7gd.4xlarge'|'c7gd.8xlarge'|'c7gd.large'|'c7gd.medium'|'c7gd.xlarge'|'c7gn.12xlarge'|'c7gn.16xlarge'|'c7gn.2xlarge'|'c7gn.4xlarge'|'c7gn.8xlarge'|'c7gn.large'|'c7gn.medium'|'c7gn.xlarge'|'c7i.12xlarge'|'c7i.16xlarge'|'c7i.24xlarge'|'c7i.2xlarge'|'c7i.48xlarge'|'c7i.4xlarge'|'c7i.8xlarge'|'c7i.large'|'c7i.xlarge'|'c8g.12xlarge'|'c8g.16xlarge'|'c8g.24xlarge'|'c8g.2xlarge'|'c8g.48xlarge'|'c8g.4xlarge'|'c8g.8xlarge'|'c8g.large'|'c8g.medium'|'c8g.xlarge'|'g5g.16xlarge'|'g5g.2xlarge'|'g5g.4xlarge'|'g5g.8xlarge'|'g5g.xlarge'|'m3.2xlarge'|'m3.large'|'m3.medium'|'m3.xlarge'|'m4.10xlarge'|'m4.16xlarge'|'m4.2xlarge'|'m4.4xlarge'|'m4.large'|'m4.xlarge'|'m5.12xlarge'|'m5.16xlarge'|'m5.24xlarge'|'m5.2xlarge'|'m5.4xlarge'|'m5.8xlarge'|'m5.large'|'m5.xlarge'|'m5a.12xlarge'|'m5a.16xlarge'|'m5a.24xlarge'|'m5a.2xlarge'|'m5a.4xlarge'|'m5a.8xlarge'|'m5a.large'|'m5a.xlarge'|'m5ad.12xlarge'|'m5ad.16xlarge'|'m5ad.24xlarge'|'m5ad.2xlarge'|'m5ad.4xlarge'|'m5ad.8xlarge'|'m5ad.large'|'m5ad.xlarge'|'m5d.12xlarge'|'m5d.16xlarge'|'m5d.24xlarge'|'m5d.2xlarge'|'m5d.4xlarge'|'m5d.8xlarge'|'m5d.large'|'m5d.xlarge'|'m5dn.12xlarge'|'m5dn.16xlarge'|'m5dn.24xlarge'|'m5dn.2xlarge'|'m5dn.4xlarge'|'m5dn.8xlarge'|'m5dn.large'|'m5dn.xlarge'|'m5n.12xlarge'|'m5n.16xlarge'|'m5n.24xlarge'|'m5n.2xlarge'|'m5n.4xlarge'|'m5n.8xlarge'|'m5n.large'|'m5n.xlarge'|'m6a.12xlarge'|'m6a.16xlarge'|'m6a.24xlarge'|'m6a.2xlarge'|'m6a.32xlarge'|'m6a.48xlarge'|'m6a.4xlarge'|'m6a.8xlarge'|'m6a.large'|'m6a.xlarge'|'m6g.12xlarge'|'m6g.16xlarge'|'m6g.2xlarge'|'m6g.4xlarge'|'m6g.8xlarge'|'m6g.large'|'m6g.medium'|'m6g.xlarge'|'m6gd.12xlarge'|'m6gd.16xlarge'|'m6gd.2xlarge'|'m6gd.4xlarge'|'m6gd.8xlarge'|'m6gd.large'|'m6gd.medium'|'m6gd.xlarge'|'m6i.12xlarge'|'m6i.16xlarge'|'m6i.24xlarge'|'m6i.2xlarge'|'m6i.32xlarge'|'m6i.4xlarge'|'m6i.8xlarge'|'m6i.large'|'m6i.xlarge'|'m6id.12xlarge'|'m6id.16xlarge'|'m6id.24xlarge'|'m6id.2xlarge'|'m6id.32xlarge'|'m6id.4xlarge'|'m6id.8xlarge'|'m6id.large'|'m6id.xlarge'|'m6idn.12xlarge'|'m6idn.16xlarge'|'m6idn.24xlarge'|'m6idn.2xlarge'|'m6idn.32xlarge'|'m6idn.4xlarge'|'m6idn.8xlarge'|'m6idn.large'|'m6idn.xlarge'|'m6in.12xlarge'|'m6in.16xlarge'|'m6in.24xlarge'|'m6in.2xlarge'|'m6in.32xlarge'|'m6in.4xlarge'|'m6in.8xlarge'|'m6in.large'|'m6in.xlarge'|'m7a.12xlarge'|'m7a.16xlarge'|'m7a.24xlarge'|'m7a.2xlarge'|'m7a.32xlarge'|'m7a.48xlarge'|'m7a.4xlarge'|'m7a.8xlarge'|'m7a.large'|'m7a.medium'|'m7a.xlarge'|'m7g.12xlarge'|'m7g.16xlarge'|'m7g.2xlarge'|'m7g.4xlarge'|'m7g.8xlarge'|'m7g.large'|'m7g.medium'|'m7g.xlarge'|'m7gd.12xlarge'|'m7gd.16xlarge'|'m7gd.2xlarge'|'m7gd.4xlarge'|'m7gd.8xlarge'|'m7gd.large'|'m7gd.medium'|'m7gd.xlarge'|'m7i.12xlarge'|'m7i.16xlarge'|'m7i.24xlarge'|'m7i.2xlarge'|'m7i.48xlarge'|'m7i.4xlarge'|'m7i.8xlarge'|'m7i.large'|'m7i.xlarge'|'m8g.12xlarge'|'m8g.16xlarge'|'m8g.24xlarge'|'m8g.2xlarge'|'m8g.48xlarge'|'m8g.4xlarge'|'m8g.8xlarge'|'m8g.large'|'m8g.medium'|'m8g.xlarge'|'r3.2xlarge'|'r3.4xlarge'|'r3.8xlarge'|'r3.large'|'r3.xlarge'|'r4.16xlarge'|'r4.2xlarge'|'r4.4xlarge'|'r4.8xlarge'|'r4.large'|'r4.xlarge'|'r5.12xlarge'|'r5.16xlarge'|'r5.24xlarge'|'r5.2xlarge'|'r5.4xlarge'|'r5.8xlarge'|'r5.large'|'r5.xlarge'|'r5a.12xlarge'|'r5a.16xlarge'|'r5a.24xlarge'|'r5a.2xlarge'|'r5a.4xlarge'|'r5a.8xlarge'|'r5a.large'|'r5a.xlarge'|'r5ad.12xlarge'|'r5ad.16xlarge'|'r5ad.24xlarge'|'r5ad.2xlarge'|'r5ad.4xlarge'|'r5ad.8xlarge'|'r5ad.large'|'r5ad.xlarge'|'r5d.12xlarge'|'r5d.16xlarge'|'r5d.24xlarge'|'r5d.2xlarge'|'r5d.4xlarge'|'r5d.8xlarge'|'r5d.large'|'r5d.xlarge'|'r5dn.12xlarge'|'r5dn.16xlarge'|'r5dn.24xlarge'|'r5dn.2xlarge'|'r5dn.4xlarge'|'r5dn.8xlarge'|'r5dn.large'|'r5dn.xlarge'|'r5n.12xlarge'|'r5n.16xlarge'|'r5n.24xlarge'|'r5n.2xlarge'|'r5n.4xlarge'|'r5n.8xlarge'|'r5n.large'|'r5n.xlarge'|'r6a.12xlarge'|'r6a.16xlarge'|'r6a.24xlarge'|'r6a.2xlarge'|'r6a.32xlarge'|'r6a.48xlarge'|'r6a.4xlarge'|'r6a.8xlarge'|'r6a.large'|'r6a.xlarge'|'r6g.12xlarge'|'r6g.16xlarge'|'r6g.2xlarge'|'r6g.4xlarge'|'r6g.8xlarge'|'r6g.large'|'r6g.medium'|'r6g.xlarge'|'r6gd.12xlarge'|'r6gd.16xlarge'|'r6gd.2xlarge'|'r6gd.4xlarge'|'r6gd.8xlarge'|'r6gd.large'|'r6gd.medium'|'r6gd.xlarge'|'r6i.12xlarge'|'r6i.16xlarge'|'r6i.24xlarge'|'r6i.2xlarge'|'r6i.32xlarge'|'r6i.4xlarge'|'r6i.8xlarge'|'r6i.large'|'r6i.xlarge'|'r6id.12xlarge'|'r6id.16xlarge'|'r6id.24xlarge'|'r6id.2xlarge'|'r6id.32xlarge'|'r6id.4xlarge'|'r6id.8xlarge'|'r6id.large'|'r6id.xlarge'|'r6idn.12xlarge'|'r6idn.16xlarge'|'r6idn.24xlarge'|'r6idn.2xlarge'|'r6idn.32xlarge'|'r6idn.4xlarge'|'r6idn.8xlarge'|'r6idn.large'|'r6idn.xlarge'|'r6in.12xlarge'|'r6in.16xlarge'|'r6in.24xlarge'|'r6in.2xlarge'|'r6in.32xlarge'|'r6in.4xlarge'|'r6in.8xlarge'|'r6in.large'|'r6in.xlarge'|'r7a.12xlarge'|'r7a.16xlarge'|'r7a.24xlarge'|'r7a.2xlarge'|'r7a.32xlarge'|'r7a.48xlarge'|'r7a.4xlarge'|'r7a.8xlarge'|'r7a.large'|'r7a.medium'|'r7a.xlarge'|'r7g.12xlarge'|'r7g.16xlarge'|'r7g.2xlarge'|'r7g.4xlarge'|'r7g.8xlarge'|'r7g.large'|'r7g.medium'|'r7g.xlarge'|'r7gd.12xlarge'|'r7gd.16xlarge'|'r7gd.2xlarge'|'r7gd.4xlarge'|'r7gd.8xlarge'|'r7gd.large'|'r7gd.medium'|'r7gd.xlarge'|'r7i.12xlarge'|'r7i.16xlarge'|'r7i.24xlarge'|'r7i.2xlarge'|'r7i.48xlarge'|'r7i.4xlarge'|'r7i.8xlarge'|'r7i.large'|'r7i.xlarge'|'r8g.12xlarge'|'r8g.16xlarge'|'r8g.24xlarge'|'r8g.2xlarge'|'r8g.48xlarge'|'r8g.4xlarge'|'r8g.8xlarge'|'r8g.large'|'r8g.medium'|'r8g.xlarge'|'t2.large'|'t2.medium'|'t2.micro'|'t2.small',
 *     Location?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEC2InstanceLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEC2InstanceLimitsAsync(array{
 *     EC2InstanceType?: 'c3.2xlarge'|'c3.4xlarge'|'c3.8xlarge'|'c3.large'|'c3.xlarge'|'c4.2xlarge'|'c4.4xlarge'|'c4.8xlarge'|'c4.large'|'c4.xlarge'|'c5.12xlarge'|'c5.18xlarge'|'c5.24xlarge'|'c5.2xlarge'|'c5.4xlarge'|'c5.9xlarge'|'c5.large'|'c5.xlarge'|'c5a.12xlarge'|'c5a.16xlarge'|'c5a.24xlarge'|'c5a.2xlarge'|'c5a.4xlarge'|'c5a.8xlarge'|'c5a.large'|'c5a.xlarge'|'c5ad.12xlarge'|'c5ad.16xlarge'|'c5ad.24xlarge'|'c5ad.2xlarge'|'c5ad.4xlarge'|'c5ad.8xlarge'|'c5ad.large'|'c5ad.xlarge'|'c5d.12xlarge'|'c5d.18xlarge'|'c5d.24xlarge'|'c5d.2xlarge'|'c5d.4xlarge'|'c5d.9xlarge'|'c5d.large'|'c5d.xlarge'|'c5n.18xlarge'|'c5n.2xlarge'|'c5n.4xlarge'|'c5n.9xlarge'|'c5n.large'|'c5n.xlarge'|'c6a.12xlarge'|'c6a.16xlarge'|'c6a.24xlarge'|'c6a.2xlarge'|'c6a.32xlarge'|'c6a.48xlarge'|'c6a.4xlarge'|'c6a.8xlarge'|'c6a.large'|'c6a.xlarge'|'c6g.12xlarge'|'c6g.16xlarge'|'c6g.2xlarge'|'c6g.4xlarge'|'c6g.8xlarge'|'c6g.large'|'c6g.medium'|'c6g.xlarge'|'c6gd.12xlarge'|'c6gd.16xlarge'|'c6gd.2xlarge'|'c6gd.4xlarge'|'c6gd.8xlarge'|'c6gd.large'|'c6gd.medium'|'c6gd.xlarge'|'c6gn.12xlarge'|'c6gn.16xlarge'|'c6gn.2xlarge'|'c6gn.4xlarge'|'c6gn.8xlarge'|'c6gn.large'|'c6gn.medium'|'c6gn.xlarge'|'c6i.12xlarge'|'c6i.16xlarge'|'c6i.24xlarge'|'c6i.2xlarge'|'c6i.32xlarge'|'c6i.4xlarge'|'c6i.8xlarge'|'c6i.large'|'c6i.xlarge'|'c6id.12xlarge'|'c6id.16xlarge'|'c6id.24xlarge'|'c6id.2xlarge'|'c6id.32xlarge'|'c6id.4xlarge'|'c6id.8xlarge'|'c6id.large'|'c6id.xlarge'|'c6in.12xlarge'|'c6in.16xlarge'|'c6in.24xlarge'|'c6in.2xlarge'|'c6in.32xlarge'|'c6in.4xlarge'|'c6in.8xlarge'|'c6in.large'|'c6in.xlarge'|'c7a.12xlarge'|'c7a.16xlarge'|'c7a.24xlarge'|'c7a.2xlarge'|'c7a.32xlarge'|'c7a.48xlarge'|'c7a.4xlarge'|'c7a.8xlarge'|'c7a.large'|'c7a.medium'|'c7a.xlarge'|'c7g.12xlarge'|'c7g.16xlarge'|'c7g.2xlarge'|'c7g.4xlarge'|'c7g.8xlarge'|'c7g.large'|'c7g.medium'|'c7g.xlarge'|'c7gd.12xlarge'|'c7gd.16xlarge'|'c7gd.2xlarge'|'c7gd.4xlarge'|'c7gd.8xlarge'|'c7gd.large'|'c7gd.medium'|'c7gd.xlarge'|'c7gn.12xlarge'|'c7gn.16xlarge'|'c7gn.2xlarge'|'c7gn.4xlarge'|'c7gn.8xlarge'|'c7gn.large'|'c7gn.medium'|'c7gn.xlarge'|'c7i.12xlarge'|'c7i.16xlarge'|'c7i.24xlarge'|'c7i.2xlarge'|'c7i.48xlarge'|'c7i.4xlarge'|'c7i.8xlarge'|'c7i.large'|'c7i.xlarge'|'c8g.12xlarge'|'c8g.16xlarge'|'c8g.24xlarge'|'c8g.2xlarge'|'c8g.48xlarge'|'c8g.4xlarge'|'c8g.8xlarge'|'c8g.large'|'c8g.medium'|'c8g.xlarge'|'g5g.16xlarge'|'g5g.2xlarge'|'g5g.4xlarge'|'g5g.8xlarge'|'g5g.xlarge'|'m3.2xlarge'|'m3.large'|'m3.medium'|'m3.xlarge'|'m4.10xlarge'|'m4.16xlarge'|'m4.2xlarge'|'m4.4xlarge'|'m4.large'|'m4.xlarge'|'m5.12xlarge'|'m5.16xlarge'|'m5.24xlarge'|'m5.2xlarge'|'m5.4xlarge'|'m5.8xlarge'|'m5.large'|'m5.xlarge'|'m5a.12xlarge'|'m5a.16xlarge'|'m5a.24xlarge'|'m5a.2xlarge'|'m5a.4xlarge'|'m5a.8xlarge'|'m5a.large'|'m5a.xlarge'|'m5ad.12xlarge'|'m5ad.16xlarge'|'m5ad.24xlarge'|'m5ad.2xlarge'|'m5ad.4xlarge'|'m5ad.8xlarge'|'m5ad.large'|'m5ad.xlarge'|'m5d.12xlarge'|'m5d.16xlarge'|'m5d.24xlarge'|'m5d.2xlarge'|'m5d.4xlarge'|'m5d.8xlarge'|'m5d.large'|'m5d.xlarge'|'m5dn.12xlarge'|'m5dn.16xlarge'|'m5dn.24xlarge'|'m5dn.2xlarge'|'m5dn.4xlarge'|'m5dn.8xlarge'|'m5dn.large'|'m5dn.xlarge'|'m5n.12xlarge'|'m5n.16xlarge'|'m5n.24xlarge'|'m5n.2xlarge'|'m5n.4xlarge'|'m5n.8xlarge'|'m5n.large'|'m5n.xlarge'|'m6a.12xlarge'|'m6a.16xlarge'|'m6a.24xlarge'|'m6a.2xlarge'|'m6a.32xlarge'|'m6a.48xlarge'|'m6a.4xlarge'|'m6a.8xlarge'|'m6a.large'|'m6a.xlarge'|'m6g.12xlarge'|'m6g.16xlarge'|'m6g.2xlarge'|'m6g.4xlarge'|'m6g.8xlarge'|'m6g.large'|'m6g.medium'|'m6g.xlarge'|'m6gd.12xlarge'|'m6gd.16xlarge'|'m6gd.2xlarge'|'m6gd.4xlarge'|'m6gd.8xlarge'|'m6gd.large'|'m6gd.medium'|'m6gd.xlarge'|'m6i.12xlarge'|'m6i.16xlarge'|'m6i.24xlarge'|'m6i.2xlarge'|'m6i.32xlarge'|'m6i.4xlarge'|'m6i.8xlarge'|'m6i.large'|'m6i.xlarge'|'m6id.12xlarge'|'m6id.16xlarge'|'m6id.24xlarge'|'m6id.2xlarge'|'m6id.32xlarge'|'m6id.4xlarge'|'m6id.8xlarge'|'m6id.large'|'m6id.xlarge'|'m6idn.12xlarge'|'m6idn.16xlarge'|'m6idn.24xlarge'|'m6idn.2xlarge'|'m6idn.32xlarge'|'m6idn.4xlarge'|'m6idn.8xlarge'|'m6idn.large'|'m6idn.xlarge'|'m6in.12xlarge'|'m6in.16xlarge'|'m6in.24xlarge'|'m6in.2xlarge'|'m6in.32xlarge'|'m6in.4xlarge'|'m6in.8xlarge'|'m6in.large'|'m6in.xlarge'|'m7a.12xlarge'|'m7a.16xlarge'|'m7a.24xlarge'|'m7a.2xlarge'|'m7a.32xlarge'|'m7a.48xlarge'|'m7a.4xlarge'|'m7a.8xlarge'|'m7a.large'|'m7a.medium'|'m7a.xlarge'|'m7g.12xlarge'|'m7g.16xlarge'|'m7g.2xlarge'|'m7g.4xlarge'|'m7g.8xlarge'|'m7g.large'|'m7g.medium'|'m7g.xlarge'|'m7gd.12xlarge'|'m7gd.16xlarge'|'m7gd.2xlarge'|'m7gd.4xlarge'|'m7gd.8xlarge'|'m7gd.large'|'m7gd.medium'|'m7gd.xlarge'|'m7i.12xlarge'|'m7i.16xlarge'|'m7i.24xlarge'|'m7i.2xlarge'|'m7i.48xlarge'|'m7i.4xlarge'|'m7i.8xlarge'|'m7i.large'|'m7i.xlarge'|'m8g.12xlarge'|'m8g.16xlarge'|'m8g.24xlarge'|'m8g.2xlarge'|'m8g.48xlarge'|'m8g.4xlarge'|'m8g.8xlarge'|'m8g.large'|'m8g.medium'|'m8g.xlarge'|'r3.2xlarge'|'r3.4xlarge'|'r3.8xlarge'|'r3.large'|'r3.xlarge'|'r4.16xlarge'|'r4.2xlarge'|'r4.4xlarge'|'r4.8xlarge'|'r4.large'|'r4.xlarge'|'r5.12xlarge'|'r5.16xlarge'|'r5.24xlarge'|'r5.2xlarge'|'r5.4xlarge'|'r5.8xlarge'|'r5.large'|'r5.xlarge'|'r5a.12xlarge'|'r5a.16xlarge'|'r5a.24xlarge'|'r5a.2xlarge'|'r5a.4xlarge'|'r5a.8xlarge'|'r5a.large'|'r5a.xlarge'|'r5ad.12xlarge'|'r5ad.16xlarge'|'r5ad.24xlarge'|'r5ad.2xlarge'|'r5ad.4xlarge'|'r5ad.8xlarge'|'r5ad.large'|'r5ad.xlarge'|'r5d.12xlarge'|'r5d.16xlarge'|'r5d.24xlarge'|'r5d.2xlarge'|'r5d.4xlarge'|'r5d.8xlarge'|'r5d.large'|'r5d.xlarge'|'r5dn.12xlarge'|'r5dn.16xlarge'|'r5dn.24xlarge'|'r5dn.2xlarge'|'r5dn.4xlarge'|'r5dn.8xlarge'|'r5dn.large'|'r5dn.xlarge'|'r5n.12xlarge'|'r5n.16xlarge'|'r5n.24xlarge'|'r5n.2xlarge'|'r5n.4xlarge'|'r5n.8xlarge'|'r5n.large'|'r5n.xlarge'|'r6a.12xlarge'|'r6a.16xlarge'|'r6a.24xlarge'|'r6a.2xlarge'|'r6a.32xlarge'|'r6a.48xlarge'|'r6a.4xlarge'|'r6a.8xlarge'|'r6a.large'|'r6a.xlarge'|'r6g.12xlarge'|'r6g.16xlarge'|'r6g.2xlarge'|'r6g.4xlarge'|'r6g.8xlarge'|'r6g.large'|'r6g.medium'|'r6g.xlarge'|'r6gd.12xlarge'|'r6gd.16xlarge'|'r6gd.2xlarge'|'r6gd.4xlarge'|'r6gd.8xlarge'|'r6gd.large'|'r6gd.medium'|'r6gd.xlarge'|'r6i.12xlarge'|'r6i.16xlarge'|'r6i.24xlarge'|'r6i.2xlarge'|'r6i.32xlarge'|'r6i.4xlarge'|'r6i.8xlarge'|'r6i.large'|'r6i.xlarge'|'r6id.12xlarge'|'r6id.16xlarge'|'r6id.24xlarge'|'r6id.2xlarge'|'r6id.32xlarge'|'r6id.4xlarge'|'r6id.8xlarge'|'r6id.large'|'r6id.xlarge'|'r6idn.12xlarge'|'r6idn.16xlarge'|'r6idn.24xlarge'|'r6idn.2xlarge'|'r6idn.32xlarge'|'r6idn.4xlarge'|'r6idn.8xlarge'|'r6idn.large'|'r6idn.xlarge'|'r6in.12xlarge'|'r6in.16xlarge'|'r6in.24xlarge'|'r6in.2xlarge'|'r6in.32xlarge'|'r6in.4xlarge'|'r6in.8xlarge'|'r6in.large'|'r6in.xlarge'|'r7a.12xlarge'|'r7a.16xlarge'|'r7a.24xlarge'|'r7a.2xlarge'|'r7a.32xlarge'|'r7a.48xlarge'|'r7a.4xlarge'|'r7a.8xlarge'|'r7a.large'|'r7a.medium'|'r7a.xlarge'|'r7g.12xlarge'|'r7g.16xlarge'|'r7g.2xlarge'|'r7g.4xlarge'|'r7g.8xlarge'|'r7g.large'|'r7g.medium'|'r7g.xlarge'|'r7gd.12xlarge'|'r7gd.16xlarge'|'r7gd.2xlarge'|'r7gd.4xlarge'|'r7gd.8xlarge'|'r7gd.large'|'r7gd.medium'|'r7gd.xlarge'|'r7i.12xlarge'|'r7i.16xlarge'|'r7i.24xlarge'|'r7i.2xlarge'|'r7i.48xlarge'|'r7i.4xlarge'|'r7i.8xlarge'|'r7i.large'|'r7i.xlarge'|'r8g.12xlarge'|'r8g.16xlarge'|'r8g.24xlarge'|'r8g.2xlarge'|'r8g.48xlarge'|'r8g.4xlarge'|'r8g.8xlarge'|'r8g.large'|'r8g.medium'|'r8g.xlarge'|'t2.large'|'t2.medium'|'t2.micro'|'t2.small',
 *     Location?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeFleetAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeFleetAttributes(array{FleetIds?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetAttributesAsync(array{FleetIds?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeFleetCapacity(array $args = [])
 * @phpstan-method \Aws\Result describeFleetCapacity(array{FleetIds?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetCapacityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetCapacityAsync(array{FleetIds?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeFleetDeployment(array $args = [])
 * @phpstan-method \Aws\Result describeFleetDeployment(array{FleetId?: string, DeploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetDeploymentAsync(array{FleetId?: string, DeploymentId?: string, ...} $args = [])
 * @method \Aws\Result describeFleetEvents(array $args = [])
 * @phpstan-method \Aws\Result describeFleetEvents(array{
 *     FleetId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetEventsAsync(array{
 *     FleetId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeFleetLocationAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeFleetLocationAttributes(array{FleetId?: string, Locations?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetLocationAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetLocationAttributesAsync(array{FleetId?: string, Locations?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeFleetLocationCapacity(array $args = [])
 * @phpstan-method \Aws\Result describeFleetLocationCapacity(array{FleetId?: string, Location?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetLocationCapacityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetLocationCapacityAsync(array{FleetId?: string, Location?: string, ...} $args = [])
 * @method \Aws\Result describeFleetLocationUtilization(array $args = [])
 * @phpstan-method \Aws\Result describeFleetLocationUtilization(array{FleetId?: string, Location?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetLocationUtilizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetLocationUtilizationAsync(array{FleetId?: string, Location?: string, ...} $args = [])
 * @method \Aws\Result describeFleetPortSettings(array $args = [])
 * @phpstan-method \Aws\Result describeFleetPortSettings(array{FleetId?: string, Location?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetPortSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetPortSettingsAsync(array{FleetId?: string, Location?: string, ...} $args = [])
 * @method \Aws\Result describeFleetUtilization(array $args = [])
 * @phpstan-method \Aws\Result describeFleetUtilization(array{FleetIds?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetUtilizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetUtilizationAsync(array{FleetIds?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeGameServer(array $args = [])
 * @phpstan-method \Aws\Result describeGameServer(array{GameServerGroupName?: string, GameServerId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGameServerAsync(array{GameServerGroupName?: string, GameServerId?: string, ...} $args = [])
 * @method \Aws\Result describeGameServerGroup(array $args = [])
 * @phpstan-method \Aws\Result describeGameServerGroup(array{GameServerGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameServerGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGameServerGroupAsync(array{GameServerGroupName?: string, ...} $args = [])
 * @method \Aws\Result describeGameServerInstances(array $args = [])
 * @phpstan-method \Aws\Result describeGameServerInstances(array{GameServerGroupName?: string, InstanceIds?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameServerInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGameServerInstancesAsync(array{GameServerGroupName?: string, InstanceIds?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeGameSessionDetails(array $args = [])
 * @phpstan-method \Aws\Result describeGameSessionDetails(array{
 *     FleetId?: string,
 *     GameSessionId?: string,
 *     AliasId?: string,
 *     Location?: string,
 *     StatusFilter?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameSessionDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGameSessionDetailsAsync(array{
 *     FleetId?: string,
 *     GameSessionId?: string,
 *     AliasId?: string,
 *     Location?: string,
 *     StatusFilter?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeGameSessionPlacement(array $args = [])
 * @phpstan-method \Aws\Result describeGameSessionPlacement(array{PlacementId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameSessionPlacementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGameSessionPlacementAsync(array{PlacementId?: string, ...} $args = [])
 * @method \Aws\Result describeGameSessionQueues(array $args = [])
 * @phpstan-method \Aws\Result describeGameSessionQueues(array{Names?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameSessionQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGameSessionQueuesAsync(array{Names?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeGameSessions(array $args = [])
 * @phpstan-method \Aws\Result describeGameSessions(array{
 *     FleetId?: string,
 *     GameSessionId?: string,
 *     AliasId?: string,
 *     Location?: string,
 *     StatusFilter?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGameSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGameSessionsAsync(array{
 *     FleetId?: string,
 *     GameSessionId?: string,
 *     AliasId?: string,
 *     Location?: string,
 *     StatusFilter?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInstances(array $args = [])
 * @phpstan-method \Aws\Result describeInstances(array{FleetId?: string, InstanceId?: string, Limit?: int, NextToken?: string, Location?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstancesAsync(array{FleetId?: string, InstanceId?: string, Limit?: int, NextToken?: string, Location?: string, ...} $args = [])
 * @method \Aws\Result describeMatchmaking(array $args = [])
 * @phpstan-method \Aws\Result describeMatchmaking(array{TicketIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMatchmakingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMatchmakingAsync(array{TicketIds?: list<string>, ...} $args = [])
 * @method \Aws\Result describeMatchmakingConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeMatchmakingConfigurations(array{Names?: list<string>, RuleSetName?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMatchmakingConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMatchmakingConfigurationsAsync(array{Names?: list<string>, RuleSetName?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeMatchmakingRuleSets(array $args = [])
 * @phpstan-method \Aws\Result describeMatchmakingRuleSets(array{Names?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMatchmakingRuleSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMatchmakingRuleSetsAsync(array{Names?: list<string>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describePlayerSessions(array $args = [])
 * @phpstan-method \Aws\Result describePlayerSessions(array{
 *     GameSessionId?: string,
 *     PlayerId?: string,
 *     PlayerSessionId?: string,
 *     PlayerSessionStatusFilter?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePlayerSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePlayerSessionsAsync(array{
 *     GameSessionId?: string,
 *     PlayerId?: string,
 *     PlayerSessionId?: string,
 *     PlayerSessionStatusFilter?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRuntimeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeRuntimeConfiguration(array{FleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRuntimeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRuntimeConfigurationAsync(array{FleetId?: string, ...} $args = [])
 * @method \Aws\Result describeScalingPolicies(array $args = [])
 * @phpstan-method \Aws\Result describeScalingPolicies(array{
 *     FleetId?: string,
 *     StatusFilter?: 'ACTIVE'|'DELETED'|'DELETE_REQUESTED'|'DELETING'|'ERROR'|'UPDATE_REQUESTED'|'UPDATING',
 *     Limit?: int,
 *     NextToken?: string,
 *     Location?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScalingPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalingPoliciesAsync(array{
 *     FleetId?: string,
 *     StatusFilter?: 'ACTIVE'|'DELETED'|'DELETE_REQUESTED'|'DELETING'|'ERROR'|'UPDATE_REQUESTED'|'UPDATING',
 *     Limit?: int,
 *     NextToken?: string,
 *     Location?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeScript(array $args = [])
 * @phpstan-method \Aws\Result describeScript(array{ScriptId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScriptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScriptAsync(array{ScriptId?: string, ...} $args = [])
 * @method \Aws\Result describeVpcPeeringAuthorizations(array $args = [])
 * @phpstan-method \Aws\Result describeVpcPeeringAuthorizations(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVpcPeeringAuthorizationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVpcPeeringAuthorizationsAsync(array{...} $args = [])
 * @method \Aws\Result describeVpcPeeringConnections(array $args = [])
 * @phpstan-method \Aws\Result describeVpcPeeringConnections(array{FleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVpcPeeringConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVpcPeeringConnectionsAsync(array{FleetId?: string, ...} $args = [])
 * @method \Aws\Result getComputeAccess(array $args = [])
 * @phpstan-method \Aws\Result getComputeAccess(array{FleetId?: string, ComputeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComputeAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComputeAccessAsync(array{FleetId?: string, ComputeName?: string, ...} $args = [])
 * @method \Aws\Result getComputeAuthToken(array $args = [])
 * @phpstan-method \Aws\Result getComputeAuthToken(array{FleetId?: string, ComputeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComputeAuthTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComputeAuthTokenAsync(array{FleetId?: string, ComputeName?: string, ...} $args = [])
 * @method \Aws\Result getGameSessionLogUrl(array $args = [])
 * @phpstan-method \Aws\Result getGameSessionLogUrl(array{GameSessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGameSessionLogUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGameSessionLogUrlAsync(array{GameSessionId?: string, ...} $args = [])
 * @method \Aws\Result getInstanceAccess(array $args = [])
 * @phpstan-method \Aws\Result getInstanceAccess(array{FleetId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceAccessAsync(array{FleetId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result getPlayerConnectionDetails(array $args = [])
 * @phpstan-method \Aws\Result getPlayerConnectionDetails(array{GameSessionId?: string, PlayerIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlayerConnectionDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlayerConnectionDetailsAsync(array{GameSessionId?: string, PlayerIds?: list<string>, ...} $args = [])
 * @method \Aws\Result listAliases(array $args = [])
 * @phpstan-method \Aws\Result listAliases(array{RoutingStrategyType?: 'SIMPLE'|'TERMINAL', Name?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAliasesAsync(array{RoutingStrategyType?: 'SIMPLE'|'TERMINAL', Name?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listBuilds(array $args = [])
 * @phpstan-method \Aws\Result listBuilds(array{Status?: 'FAILED'|'INITIALIZED'|'READY', Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBuildsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBuildsAsync(array{Status?: 'FAILED'|'INITIALIZED'|'READY', Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCompute(array $args = [])
 * @phpstan-method \Aws\Result listCompute(array{
 *     FleetId?: string,
 *     Location?: string,
 *     ContainerGroupDefinitionName?: string,
 *     ComputeStatus?: 'ACTIVE'|'IMPAIRED',
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listComputeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComputeAsync(array{
 *     FleetId?: string,
 *     Location?: string,
 *     ContainerGroupDefinitionName?: string,
 *     ComputeStatus?: 'ACTIVE'|'IMPAIRED',
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listContainerFleets(array $args = [])
 * @phpstan-method \Aws\Result listContainerFleets(array{ContainerGroupDefinitionName?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContainerFleetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContainerFleetsAsync(array{ContainerGroupDefinitionName?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listContainerGroupDefinitionVersions(array $args = [])
 * @phpstan-method \Aws\Result listContainerGroupDefinitionVersions(array{Name?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContainerGroupDefinitionVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContainerGroupDefinitionVersionsAsync(array{Name?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listContainerGroupDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listContainerGroupDefinitions(array{ContainerGroupType?: 'GAME_SERVER'|'PER_INSTANCE', Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContainerGroupDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContainerGroupDefinitionsAsync(array{ContainerGroupType?: 'GAME_SERVER'|'PER_INSTANCE', Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFleetDeployments(array $args = [])
 * @phpstan-method \Aws\Result listFleetDeployments(array{FleetId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFleetDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFleetDeploymentsAsync(array{FleetId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFleets(array $args = [])
 * @phpstan-method \Aws\Result listFleets(array{BuildId?: string, ScriptId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFleetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFleetsAsync(array{BuildId?: string, ScriptId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGameServerGroups(array $args = [])
 * @phpstan-method \Aws\Result listGameServerGroups(array{Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGameServerGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGameServerGroupsAsync(array{Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGameServers(array $args = [])
 * @phpstan-method \Aws\Result listGameServers(array{
 *     GameServerGroupName?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGameServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGameServersAsync(array{
 *     GameServerGroupName?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLocations(array $args = [])
 * @phpstan-method \Aws\Result listLocations(array{Filters?: list<'AWS'|'CUSTOM'>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLocationsAsync(array{Filters?: list<'AWS'|'CUSTOM'>, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listScripts(array $args = [])
 * @phpstan-method \Aws\Result listScripts(array{Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScriptsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScriptsAsync(array{Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result putScalingPolicy(array $args = [])
 * @phpstan-method \Aws\Result putScalingPolicy(array{
 *     Name?: string,
 *     FleetId?: string,
 *     ScalingAdjustment?: int,
 *     ScalingAdjustmentType?: 'ChangeInCapacity'|'ExactCapacity'|'PercentChangeInCapacity',
 *     Threshold?: float,
 *     ComparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     EvaluationPeriods?: int,
 *     MetricName?: 'ActivatingGameSessions'|'ActiveGameSessions'|'ActiveInstances'|'AvailableGameSessions'|'AvailablePlayerSessions'|'ConcurrentActivatableGameSessions'|'CurrentPlayerSessions'|'IdleInstances'|'PercentAvailableGameSessions'|'PercentIdleInstances'|'QueueDepth'|'WaitTime',
 *     PolicyType?: 'RuleBased'|'TargetBased',
 *     TargetConfiguration?: array{TargetValue?: float, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putScalingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putScalingPolicyAsync(array{
 *     Name?: string,
 *     FleetId?: string,
 *     ScalingAdjustment?: int,
 *     ScalingAdjustmentType?: 'ChangeInCapacity'|'ExactCapacity'|'PercentChangeInCapacity',
 *     Threshold?: float,
 *     ComparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     EvaluationPeriods?: int,
 *     MetricName?: 'ActivatingGameSessions'|'ActiveGameSessions'|'ActiveInstances'|'AvailableGameSessions'|'AvailablePlayerSessions'|'ConcurrentActivatableGameSessions'|'CurrentPlayerSessions'|'IdleInstances'|'PercentAvailableGameSessions'|'PercentIdleInstances'|'QueueDepth'|'WaitTime',
 *     PolicyType?: 'RuleBased'|'TargetBased',
 *     TargetConfiguration?: array{TargetValue?: float, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerCompute(array $args = [])
 * @phpstan-method \Aws\Result registerCompute(array{
 *     FleetId?: string,
 *     ComputeName?: string,
 *     CertificatePath?: string,
 *     DnsName?: string,
 *     IpAddress?: string,
 *     Location?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerComputeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerComputeAsync(array{
 *     FleetId?: string,
 *     ComputeName?: string,
 *     CertificatePath?: string,
 *     DnsName?: string,
 *     IpAddress?: string,
 *     Location?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerGameServer(array $args = [])
 * @phpstan-method \Aws\Result registerGameServer(array{
 *     GameServerGroupName?: string,
 *     GameServerId?: string,
 *     InstanceId?: string,
 *     ConnectionInfo?: string,
 *     GameServerData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerGameServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerGameServerAsync(array{
 *     GameServerGroupName?: string,
 *     GameServerId?: string,
 *     InstanceId?: string,
 *     ConnectionInfo?: string,
 *     GameServerData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result requestUploadCredentials(array $args = [])
 * @phpstan-method \Aws\Result requestUploadCredentials(array{BuildId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise requestUploadCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise requestUploadCredentialsAsync(array{BuildId?: string, ...} $args = [])
 * @method \Aws\Result resolveAlias(array $args = [])
 * @phpstan-method \Aws\Result resolveAlias(array{AliasId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resolveAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resolveAliasAsync(array{AliasId?: string, ...} $args = [])
 * @method \Aws\Result resumeGameServerGroup(array $args = [])
 * @phpstan-method \Aws\Result resumeGameServerGroup(array{GameServerGroupName?: string, ResumeActions?: list<'REPLACE_INSTANCE_TYPES'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeGameServerGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeGameServerGroupAsync(array{GameServerGroupName?: string, ResumeActions?: list<'REPLACE_INSTANCE_TYPES'>, ...} $args = [])
 * @method \Aws\Result searchGameSessions(array $args = [])
 * @phpstan-method \Aws\Result searchGameSessions(array{
 *     FleetId?: string,
 *     AliasId?: string,
 *     Location?: string,
 *     FilterExpression?: string,
 *     SortExpression?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchGameSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchGameSessionsAsync(array{
 *     FleetId?: string,
 *     AliasId?: string,
 *     Location?: string,
 *     FilterExpression?: string,
 *     SortExpression?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startFleetActions(array $args = [])
 * @phpstan-method \Aws\Result startFleetActions(array{FleetId?: string, Actions?: list<'AUTO_SCALING'>, Location?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startFleetActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFleetActionsAsync(array{FleetId?: string, Actions?: list<'AUTO_SCALING'>, Location?: string, ...} $args = [])
 * @method \Aws\Result startGameSessionPlacement(array $args = [])
 * @phpstan-method \Aws\Result startGameSessionPlacement(array{
 *     PlacementId?: string,
 *     GameSessionQueueName?: string,
 *     GameProperties?: list<array{Key?: string, Value?: string, ...}>,
 *     MaximumPlayerSessionCount?: int,
 *     GameSessionName?: string,
 *     PlayerLatencies?: list<array{PlayerId?: string, RegionIdentifier?: string, LatencyInMilliseconds?: float, ...}>,
 *     DesiredPlayerSessions?: list<array{PlayerId?: string, PlayerData?: string, ...}>,
 *     GameSessionData?: string,
 *     PriorityConfigurationOverride?: array{PlacementFallbackStrategy?: 'DEFAULT_AFTER_SINGLE_PASS'|'NONE', LocationOrder?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startGameSessionPlacementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startGameSessionPlacementAsync(array{
 *     PlacementId?: string,
 *     GameSessionQueueName?: string,
 *     GameProperties?: list<array{Key?: string, Value?: string, ...}>,
 *     MaximumPlayerSessionCount?: int,
 *     GameSessionName?: string,
 *     PlayerLatencies?: list<array{PlayerId?: string, RegionIdentifier?: string, LatencyInMilliseconds?: float, ...}>,
 *     DesiredPlayerSessions?: list<array{PlayerId?: string, PlayerData?: string, ...}>,
 *     GameSessionData?: string,
 *     PriorityConfigurationOverride?: array{PlacementFallbackStrategy?: 'DEFAULT_AFTER_SINGLE_PASS'|'NONE', LocationOrder?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMatchBackfill(array $args = [])
 * @phpstan-method \Aws\Result startMatchBackfill(array{
 *     TicketId?: string,
 *     ConfigurationName?: string,
 *     GameSessionArn?: string,
 *     Players?: list<array{
 *         PlayerId?: string,
 *         PlayerAttributes?: array<string, array>,
 *         Team?: string,
 *         LatencyInMs?: array<string, int>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMatchBackfillAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMatchBackfillAsync(array{
 *     TicketId?: string,
 *     ConfigurationName?: string,
 *     GameSessionArn?: string,
 *     Players?: list<array{
 *         PlayerId?: string,
 *         PlayerAttributes?: array<string, array>,
 *         Team?: string,
 *         LatencyInMs?: array<string, int>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMatchmaking(array $args = [])
 * @phpstan-method \Aws\Result startMatchmaking(array{
 *     TicketId?: string,
 *     ConfigurationName?: string,
 *     Players?: list<array{
 *         PlayerId?: string,
 *         PlayerAttributes?: array<string, array>,
 *         Team?: string,
 *         LatencyInMs?: array<string, int>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMatchmakingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMatchmakingAsync(array{
 *     TicketId?: string,
 *     ConfigurationName?: string,
 *     Players?: list<array{
 *         PlayerId?: string,
 *         PlayerAttributes?: array<string, array>,
 *         Team?: string,
 *         LatencyInMs?: array<string, int>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopFleetActions(array $args = [])
 * @phpstan-method \Aws\Result stopFleetActions(array{FleetId?: string, Actions?: list<'AUTO_SCALING'>, Location?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopFleetActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopFleetActionsAsync(array{FleetId?: string, Actions?: list<'AUTO_SCALING'>, Location?: string, ...} $args = [])
 * @method \Aws\Result stopGameSessionPlacement(array $args = [])
 * @phpstan-method \Aws\Result stopGameSessionPlacement(array{PlacementId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopGameSessionPlacementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopGameSessionPlacementAsync(array{PlacementId?: string, ...} $args = [])
 * @method \Aws\Result stopMatchmaking(array $args = [])
 * @phpstan-method \Aws\Result stopMatchmaking(array{TicketId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopMatchmakingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopMatchmakingAsync(array{TicketId?: string, ...} $args = [])
 * @method \Aws\Result suspendGameServerGroup(array $args = [])
 * @phpstan-method \Aws\Result suspendGameServerGroup(array{GameServerGroupName?: string, SuspendActions?: list<'REPLACE_INSTANCE_TYPES'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise suspendGameServerGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise suspendGameServerGroupAsync(array{GameServerGroupName?: string, SuspendActions?: list<'REPLACE_INSTANCE_TYPES'>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result terminateGameSession(array $args = [])
 * @phpstan-method \Aws\Result terminateGameSession(array{GameSessionId?: string, TerminationMode?: 'FORCE_TERMINATE'|'TRIGGER_ON_PROCESS_TERMINATE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateGameSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateGameSessionAsync(array{GameSessionId?: string, TerminationMode?: 'FORCE_TERMINATE'|'TRIGGER_ON_PROCESS_TERMINATE', ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAlias(array $args = [])
 * @phpstan-method \Aws\Result updateAlias(array{
 *     AliasId?: string,
 *     Name?: string,
 *     Description?: string,
 *     RoutingStrategy?: array{Type?: 'SIMPLE'|'TERMINAL', FleetId?: string, Message?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAliasAsync(array{
 *     AliasId?: string,
 *     Name?: string,
 *     Description?: string,
 *     RoutingStrategy?: array{Type?: 'SIMPLE'|'TERMINAL', FleetId?: string, Message?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBuild(array $args = [])
 * @phpstan-method \Aws\Result updateBuild(array{BuildId?: string, Name?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBuildAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBuildAsync(array{BuildId?: string, Name?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result updateContainerFleet(array $args = [])
 * @phpstan-method \Aws\Result updateContainerFleet(array{
 *     FleetId?: string,
 *     GameServerContainerGroupDefinitionName?: string,
 *     PerInstanceContainerGroupDefinitionName?: string,
 *     GameServerContainerGroupsPerInstance?: int,
 *     InstanceConnectionPortRange?: array{FromPort?: int, ToPort?: int, ...},
 *     InstanceInboundPermissionAuthorizations?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     InstanceInboundPermissionRevocations?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     DeploymentConfiguration?: array{
 *         ProtectionStrategy?: 'IGNORE_PROTECTION'|'WITH_PROTECTION',
 *         MinimumHealthyPercentage?: int,
 *         ImpairmentStrategy?: 'MAINTAIN'|'ROLLBACK',
 *         ...,
 *     },
 *     Description?: string,
 *     MetricGroups?: list<string>,
 *     NewGameSessionProtectionPolicy?: 'FullProtection'|'NoProtection',
 *     GameSessionCreationLimitPolicy?: array{NewGameSessionsPerCreator?: int, PolicyPeriodInMinutes?: int, ...},
 *     LogConfiguration?: array{LogDestination?: 'CLOUDWATCH'|'NONE'|'S3', S3BucketName?: string, LogGroupArn?: string, ...},
 *     RemoveAttributes?: list<'PER_INSTANCE_CONTAINER_GROUP_DEFINITION'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContainerFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContainerFleetAsync(array{
 *     FleetId?: string,
 *     GameServerContainerGroupDefinitionName?: string,
 *     PerInstanceContainerGroupDefinitionName?: string,
 *     GameServerContainerGroupsPerInstance?: int,
 *     InstanceConnectionPortRange?: array{FromPort?: int, ToPort?: int, ...},
 *     InstanceInboundPermissionAuthorizations?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     InstanceInboundPermissionRevocations?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     DeploymentConfiguration?: array{
 *         ProtectionStrategy?: 'IGNORE_PROTECTION'|'WITH_PROTECTION',
 *         MinimumHealthyPercentage?: int,
 *         ImpairmentStrategy?: 'MAINTAIN'|'ROLLBACK',
 *         ...,
 *     },
 *     Description?: string,
 *     MetricGroups?: list<string>,
 *     NewGameSessionProtectionPolicy?: 'FullProtection'|'NoProtection',
 *     GameSessionCreationLimitPolicy?: array{NewGameSessionsPerCreator?: int, PolicyPeriodInMinutes?: int, ...},
 *     LogConfiguration?: array{LogDestination?: 'CLOUDWATCH'|'NONE'|'S3', S3BucketName?: string, LogGroupArn?: string, ...},
 *     RemoveAttributes?: list<'PER_INSTANCE_CONTAINER_GROUP_DEFINITION'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContainerGroupDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateContainerGroupDefinition(array{
 *     Name?: string,
 *     GameServerContainerDefinition?: array{
 *         ContainerName?: string,
 *         DependsOn?: list<array>,
 *         MountPoints?: list<array>,
 *         EnvironmentOverride?: list<array>,
 *         ImageUri?: string,
 *         PortConfiguration?: array{ContainerPortRanges?: list<array>, ...},
 *         ServerSdkVersion?: string,
 *         LinuxCapabilities?: array{
 *             Include?: list<'AUDIT_CONTROL'|'AUDIT_WRITE'|'BLOCK_SUSPEND'|'CHOWN'|'DAC_OVERRIDE'|'DAC_READ_SEARCH'|'FOWNER'|'FSETID'|'IPC_LOCK'|'IPC_OWNER'|'KILL'|'LEASE'|'LINUX_IMMUTABLE'|'MAC_ADMIN'|'MAC_OVERRIDE'|'MKNOD'|'NET_ADMIN'|'NET_BIND_SERVICE'|'NET_BROADCAST'|'NET_RAW'|'SETFCAP'|'SETGID'|'SETPCAP'|'SETUID'|'SYSLOG'|'SYS_ADMIN'|'SYS_BOOT'|'SYS_CHROOT'|'SYS_MODULE'|'SYS_NICE'|'SYS_PACCT'|'SYS_PTRACE'|'SYS_RAWIO'|'SYS_RESOURCE'|'SYS_TIME'|'SYS_TTY_CONFIG'|'WAKE_ALARM'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SupportContainerDefinitions?: list<array{
 *         ContainerName?: string,
 *         DependsOn?: list<array>,
 *         MountPoints?: list<array>,
 *         EnvironmentOverride?: list<array>,
 *         Essential?: bool,
 *         HealthCheck?: array,
 *         ImageUri?: string,
 *         MemoryHardLimitMebibytes?: int,
 *         PortConfiguration?: array,
 *         Vcpu?: float,
 *         LinuxCapabilities?: array,
 *         ...,
 *     }>,
 *     TotalMemoryLimitMebibytes?: int,
 *     TotalVcpuLimit?: float,
 *     VersionDescription?: string,
 *     SourceVersionNumber?: int,
 *     OperatingSystem?: 'AMAZON_LINUX_2023',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContainerGroupDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContainerGroupDefinitionAsync(array{
 *     Name?: string,
 *     GameServerContainerDefinition?: array{
 *         ContainerName?: string,
 *         DependsOn?: list<array>,
 *         MountPoints?: list<array>,
 *         EnvironmentOverride?: list<array>,
 *         ImageUri?: string,
 *         PortConfiguration?: array{ContainerPortRanges?: list<array>, ...},
 *         ServerSdkVersion?: string,
 *         LinuxCapabilities?: array{
 *             Include?: list<'AUDIT_CONTROL'|'AUDIT_WRITE'|'BLOCK_SUSPEND'|'CHOWN'|'DAC_OVERRIDE'|'DAC_READ_SEARCH'|'FOWNER'|'FSETID'|'IPC_LOCK'|'IPC_OWNER'|'KILL'|'LEASE'|'LINUX_IMMUTABLE'|'MAC_ADMIN'|'MAC_OVERRIDE'|'MKNOD'|'NET_ADMIN'|'NET_BIND_SERVICE'|'NET_BROADCAST'|'NET_RAW'|'SETFCAP'|'SETGID'|'SETPCAP'|'SETUID'|'SYSLOG'|'SYS_ADMIN'|'SYS_BOOT'|'SYS_CHROOT'|'SYS_MODULE'|'SYS_NICE'|'SYS_PACCT'|'SYS_PTRACE'|'SYS_RAWIO'|'SYS_RESOURCE'|'SYS_TIME'|'SYS_TTY_CONFIG'|'WAKE_ALARM'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SupportContainerDefinitions?: list<array{
 *         ContainerName?: string,
 *         DependsOn?: list<array>,
 *         MountPoints?: list<array>,
 *         EnvironmentOverride?: list<array>,
 *         Essential?: bool,
 *         HealthCheck?: array,
 *         ImageUri?: string,
 *         MemoryHardLimitMebibytes?: int,
 *         PortConfiguration?: array,
 *         Vcpu?: float,
 *         LinuxCapabilities?: array,
 *         ...,
 *     }>,
 *     TotalMemoryLimitMebibytes?: int,
 *     TotalVcpuLimit?: float,
 *     VersionDescription?: string,
 *     SourceVersionNumber?: int,
 *     OperatingSystem?: 'AMAZON_LINUX_2023',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFleetAttributes(array $args = [])
 * @phpstan-method \Aws\Result updateFleetAttributes(array{
 *     FleetId?: string,
 *     Name?: string,
 *     Description?: string,
 *     NewGameSessionProtectionPolicy?: 'FullProtection'|'NoProtection',
 *     ResourceCreationLimitPolicy?: array{NewGameSessionsPerCreator?: int, PolicyPeriodInMinutes?: int, ...},
 *     MetricGroups?: list<string>,
 *     AnywhereConfiguration?: array{Cost?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFleetAttributesAsync(array{
 *     FleetId?: string,
 *     Name?: string,
 *     Description?: string,
 *     NewGameSessionProtectionPolicy?: 'FullProtection'|'NoProtection',
 *     ResourceCreationLimitPolicy?: array{NewGameSessionsPerCreator?: int, PolicyPeriodInMinutes?: int, ...},
 *     MetricGroups?: list<string>,
 *     AnywhereConfiguration?: array{Cost?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFleetCapacity(array $args = [])
 * @phpstan-method \Aws\Result updateFleetCapacity(array{
 *     FleetId?: string,
 *     DesiredInstances?: int,
 *     MinSize?: int,
 *     MaxSize?: int,
 *     Location?: string,
 *     ManagedCapacityConfiguration?: array{ZeroCapacityStrategy?: 'MANUAL'|'SCALE_TO_AND_FROM_ZERO', ScaleInAfterInactivityMinutes?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetCapacityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFleetCapacityAsync(array{
 *     FleetId?: string,
 *     DesiredInstances?: int,
 *     MinSize?: int,
 *     MaxSize?: int,
 *     Location?: string,
 *     ManagedCapacityConfiguration?: array{ZeroCapacityStrategy?: 'MANUAL'|'SCALE_TO_AND_FROM_ZERO', ScaleInAfterInactivityMinutes?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFleetPortSettings(array $args = [])
 * @phpstan-method \Aws\Result updateFleetPortSettings(array{
 *     FleetId?: string,
 *     InboundPermissionAuthorizations?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     InboundPermissionRevocations?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetPortSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFleetPortSettingsAsync(array{
 *     FleetId?: string,
 *     InboundPermissionAuthorizations?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     InboundPermissionRevocations?: list<array{FromPort?: int, ToPort?: int, IpRange?: string, Protocol?: 'TCP'|'UDP', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGameServer(array $args = [])
 * @phpstan-method \Aws\Result updateGameServer(array{
 *     GameServerGroupName?: string,
 *     GameServerId?: string,
 *     GameServerData?: string,
 *     UtilizationStatus?: 'AVAILABLE'|'UTILIZED',
 *     HealthCheck?: 'HEALTHY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGameServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGameServerAsync(array{
 *     GameServerGroupName?: string,
 *     GameServerId?: string,
 *     GameServerData?: string,
 *     UtilizationStatus?: 'AVAILABLE'|'UTILIZED',
 *     HealthCheck?: 'HEALTHY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGameServerGroup(array $args = [])
 * @phpstan-method \Aws\Result updateGameServerGroup(array{
 *     GameServerGroupName?: string,
 *     RoleArn?: string,
 *     InstanceDefinitions?: list<array{
 *         InstanceType?: 'c4.2xlarge'|'c4.4xlarge'|'c4.8xlarge'|'c4.large'|'c4.xlarge'|'c5.12xlarge'|'c5.18xlarge'|'c5.24xlarge'|'c5.2xlarge'|'c5.4xlarge'|'c5.9xlarge'|'c5.large'|'c5.xlarge'|'c5a.12xlarge'|'c5a.16xlarge'|'c5a.24xlarge'|'c5a.2xlarge'|'c5a.4xlarge'|'c5a.8xlarge'|'c5a.large'|'c5a.xlarge'|'c6g.12xlarge'|'c6g.16xlarge'|'c6g.2xlarge'|'c6g.4xlarge'|'c6g.8xlarge'|'c6g.large'|'c6g.medium'|'c6g.xlarge'|'m4.10xlarge'|'m4.2xlarge'|'m4.4xlarge'|'m4.large'|'m4.xlarge'|'m5.12xlarge'|'m5.16xlarge'|'m5.24xlarge'|'m5.2xlarge'|'m5.4xlarge'|'m5.8xlarge'|'m5.large'|'m5.xlarge'|'m5a.12xlarge'|'m5a.16xlarge'|'m5a.24xlarge'|'m5a.2xlarge'|'m5a.4xlarge'|'m5a.8xlarge'|'m5a.large'|'m5a.xlarge'|'m6g.12xlarge'|'m6g.16xlarge'|'m6g.2xlarge'|'m6g.4xlarge'|'m6g.8xlarge'|'m6g.large'|'m6g.medium'|'m6g.xlarge'|'r4.16xlarge'|'r4.2xlarge'|'r4.4xlarge'|'r4.8xlarge'|'r4.large'|'r4.xlarge'|'r5.12xlarge'|'r5.16xlarge'|'r5.24xlarge'|'r5.2xlarge'|'r5.4xlarge'|'r5.8xlarge'|'r5.large'|'r5.xlarge'|'r5a.12xlarge'|'r5a.16xlarge'|'r5a.24xlarge'|'r5a.2xlarge'|'r5a.4xlarge'|'r5a.8xlarge'|'r5a.large'|'r5a.xlarge'|'r6g.12xlarge'|'r6g.16xlarge'|'r6g.2xlarge'|'r6g.4xlarge'|'r6g.8xlarge'|'r6g.large'|'r6g.medium'|'r6g.xlarge',
 *         WeightedCapacity?: string,
 *         ...,
 *     }>,
 *     GameServerProtectionPolicy?: 'FULL_PROTECTION'|'NO_PROTECTION',
 *     BalancingStrategy?: 'ON_DEMAND_ONLY'|'SPOT_ONLY'|'SPOT_PREFERRED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGameServerGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGameServerGroupAsync(array{
 *     GameServerGroupName?: string,
 *     RoleArn?: string,
 *     InstanceDefinitions?: list<array{
 *         InstanceType?: 'c4.2xlarge'|'c4.4xlarge'|'c4.8xlarge'|'c4.large'|'c4.xlarge'|'c5.12xlarge'|'c5.18xlarge'|'c5.24xlarge'|'c5.2xlarge'|'c5.4xlarge'|'c5.9xlarge'|'c5.large'|'c5.xlarge'|'c5a.12xlarge'|'c5a.16xlarge'|'c5a.24xlarge'|'c5a.2xlarge'|'c5a.4xlarge'|'c5a.8xlarge'|'c5a.large'|'c5a.xlarge'|'c6g.12xlarge'|'c6g.16xlarge'|'c6g.2xlarge'|'c6g.4xlarge'|'c6g.8xlarge'|'c6g.large'|'c6g.medium'|'c6g.xlarge'|'m4.10xlarge'|'m4.2xlarge'|'m4.4xlarge'|'m4.large'|'m4.xlarge'|'m5.12xlarge'|'m5.16xlarge'|'m5.24xlarge'|'m5.2xlarge'|'m5.4xlarge'|'m5.8xlarge'|'m5.large'|'m5.xlarge'|'m5a.12xlarge'|'m5a.16xlarge'|'m5a.24xlarge'|'m5a.2xlarge'|'m5a.4xlarge'|'m5a.8xlarge'|'m5a.large'|'m5a.xlarge'|'m6g.12xlarge'|'m6g.16xlarge'|'m6g.2xlarge'|'m6g.4xlarge'|'m6g.8xlarge'|'m6g.large'|'m6g.medium'|'m6g.xlarge'|'r4.16xlarge'|'r4.2xlarge'|'r4.4xlarge'|'r4.8xlarge'|'r4.large'|'r4.xlarge'|'r5.12xlarge'|'r5.16xlarge'|'r5.24xlarge'|'r5.2xlarge'|'r5.4xlarge'|'r5.8xlarge'|'r5.large'|'r5.xlarge'|'r5a.12xlarge'|'r5a.16xlarge'|'r5a.24xlarge'|'r5a.2xlarge'|'r5a.4xlarge'|'r5a.8xlarge'|'r5a.large'|'r5a.xlarge'|'r6g.12xlarge'|'r6g.16xlarge'|'r6g.2xlarge'|'r6g.4xlarge'|'r6g.8xlarge'|'r6g.large'|'r6g.medium'|'r6g.xlarge',
 *         WeightedCapacity?: string,
 *         ...,
 *     }>,
 *     GameServerProtectionPolicy?: 'FULL_PROTECTION'|'NO_PROTECTION',
 *     BalancingStrategy?: 'ON_DEMAND_ONLY'|'SPOT_ONLY'|'SPOT_PREFERRED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGameSession(array $args = [])
 * @phpstan-method \Aws\Result updateGameSession(array{
 *     GameSessionId?: string,
 *     MaximumPlayerSessionCount?: int,
 *     Name?: string,
 *     PlayerSessionCreationPolicy?: 'ACCEPT_ALL'|'DENY_ALL',
 *     ProtectionPolicy?: 'FullProtection'|'NoProtection',
 *     GameProperties?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGameSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGameSessionAsync(array{
 *     GameSessionId?: string,
 *     MaximumPlayerSessionCount?: int,
 *     Name?: string,
 *     PlayerSessionCreationPolicy?: 'ACCEPT_ALL'|'DENY_ALL',
 *     ProtectionPolicy?: 'FullProtection'|'NoProtection',
 *     GameProperties?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGameSessionQueue(array $args = [])
 * @phpstan-method \Aws\Result updateGameSessionQueue(array{
 *     Name?: string,
 *     TimeoutInSeconds?: int,
 *     PlayerLatencyPolicies?: list<array{MaximumIndividualPlayerLatencyMilliseconds?: int, PolicyDurationSeconds?: int, ...}>,
 *     Destinations?: list<array{DestinationArn?: string, ...}>,
 *     FilterConfiguration?: array{AllowedLocations?: list<string>, ...},
 *     PriorityConfiguration?: array{PriorityOrder?: list<'COST'|'DESTINATION'|'LATENCY'|'LOCATION'>, LocationOrder?: list<string>, ...},
 *     CustomEventData?: string,
 *     NotificationTarget?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGameSessionQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGameSessionQueueAsync(array{
 *     Name?: string,
 *     TimeoutInSeconds?: int,
 *     PlayerLatencyPolicies?: list<array{MaximumIndividualPlayerLatencyMilliseconds?: int, PolicyDurationSeconds?: int, ...}>,
 *     Destinations?: list<array{DestinationArn?: string, ...}>,
 *     FilterConfiguration?: array{AllowedLocations?: list<string>, ...},
 *     PriorityConfiguration?: array{PriorityOrder?: list<'COST'|'DESTINATION'|'LATENCY'|'LOCATION'>, LocationOrder?: list<string>, ...},
 *     CustomEventData?: string,
 *     NotificationTarget?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMatchmakingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateMatchmakingConfiguration(array{
 *     Name?: string,
 *     Description?: string,
 *     GameSessionQueueArns?: list<string>,
 *     RequestTimeoutSeconds?: int,
 *     AcceptanceTimeoutSeconds?: int,
 *     AcceptanceRequired?: bool,
 *     RuleSetName?: string,
 *     NotificationTarget?: string,
 *     AdditionalPlayerCount?: int,
 *     CustomEventData?: string,
 *     GameProperties?: list<array{Key?: string, Value?: string, ...}>,
 *     GameSessionData?: string,
 *     BackfillMode?: 'AUTOMATIC'|'MANUAL',
 *     FlexMatchMode?: 'STANDALONE'|'WITH_QUEUE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMatchmakingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMatchmakingConfigurationAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     GameSessionQueueArns?: list<string>,
 *     RequestTimeoutSeconds?: int,
 *     AcceptanceTimeoutSeconds?: int,
 *     AcceptanceRequired?: bool,
 *     RuleSetName?: string,
 *     NotificationTarget?: string,
 *     AdditionalPlayerCount?: int,
 *     CustomEventData?: string,
 *     GameProperties?: list<array{Key?: string, Value?: string, ...}>,
 *     GameSessionData?: string,
 *     BackfillMode?: 'AUTOMATIC'|'MANUAL',
 *     FlexMatchMode?: 'STANDALONE'|'WITH_QUEUE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuntimeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateRuntimeConfiguration(array{
 *     FleetId?: string,
 *     RuntimeConfiguration?: array{
 *         ServerProcesses?: list<array>,
 *         MaxConcurrentGameSessionActivations?: int,
 *         GameSessionActivationTimeoutSeconds?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuntimeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuntimeConfigurationAsync(array{
 *     FleetId?: string,
 *     RuntimeConfiguration?: array{
 *         ServerProcesses?: list<array>,
 *         MaxConcurrentGameSessionActivations?: int,
 *         GameSessionActivationTimeoutSeconds?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateScript(array $args = [])
 * @phpstan-method \Aws\Result updateScript(array{
 *     ScriptId?: string,
 *     Name?: string,
 *     Version?: string,
 *     StorageLocation?: array{Bucket?: string, Key?: string, RoleArn?: string, ObjectVersion?: string, ...},
 *     ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScriptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScriptAsync(array{
 *     ScriptId?: string,
 *     Name?: string,
 *     Version?: string,
 *     StorageLocation?: array{Bucket?: string, Key?: string, RoleArn?: string, ObjectVersion?: string, ...},
 *     ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result validateMatchmakingRuleSet(array $args = [])
 * @phpstan-method \Aws\Result validateMatchmakingRuleSet(array{RuleSetBody?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validateMatchmakingRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateMatchmakingRuleSetAsync(array{RuleSetBody?: string, ...} $args = [])
 */
class GameLiftClient extends AwsClient {}
