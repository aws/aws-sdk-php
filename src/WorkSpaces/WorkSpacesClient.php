<?php
namespace Aws\WorkSpaces;

use Aws\AwsClient;

/**
 * Amazon WorkSpaces client.
 *
 * @method \Aws\Result acceptAccountLinkInvitation(array $args = [])
 * @phpstan-method \Aws\Result acceptAccountLinkInvitation(array{LinkId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptAccountLinkInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptAccountLinkInvitationAsync(array{LinkId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result associateConnectionAlias(array $args = [])
 * @phpstan-method \Aws\Result associateConnectionAlias(array{AliasId?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateConnectionAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateConnectionAliasAsync(array{AliasId?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result associateIpGroups(array $args = [])
 * @phpstan-method \Aws\Result associateIpGroups(array{DirectoryId?: string, GroupIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateIpGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateIpGroupsAsync(array{DirectoryId?: string, GroupIds?: list<string>, ...} $args = [])
 * @method \Aws\Result associateWorkspaceApplication(array $args = [])
 * @phpstan-method \Aws\Result associateWorkspaceApplication(array{WorkspaceId?: string, ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateWorkspaceApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateWorkspaceApplicationAsync(array{WorkspaceId?: string, ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result authorizeIpRules(array $args = [])
 * @phpstan-method \Aws\Result authorizeIpRules(array{GroupId?: string, UserRules?: list<array{ipRule?: string, ruleDesc?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise authorizeIpRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise authorizeIpRulesAsync(array{GroupId?: string, UserRules?: list<array{ipRule?: string, ruleDesc?: string, ...}>, ...} $args = [])
 * @method \Aws\Result copyWorkspaceImage(array $args = [])
 * @phpstan-method \Aws\Result copyWorkspaceImage(array{
 *     Name?: string,
 *     Description?: string,
 *     SourceImageId?: string,
 *     SourceRegion?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyWorkspaceImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyWorkspaceImageAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     SourceImageId?: string,
 *     SourceRegion?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAccountLinkInvitation(array $args = [])
 * @phpstan-method \Aws\Result createAccountLinkInvitation(array{TargetAccountId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountLinkInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccountLinkInvitationAsync(array{TargetAccountId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result createConnectClientAddIn(array $args = [])
 * @phpstan-method \Aws\Result createConnectClientAddIn(array{ResourceId?: string, Name?: string, URL?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectClientAddInAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectClientAddInAsync(array{ResourceId?: string, Name?: string, URL?: string, ...} $args = [])
 * @method \Aws\Result createConnectionAlias(array $args = [])
 * @phpstan-method \Aws\Result createConnectionAlias(array{ConnectionString?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionAliasAsync(array{ConnectionString?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createIpGroup(array $args = [])
 * @phpstan-method \Aws\Result createIpGroup(array{
 *     GroupName?: string,
 *     GroupDesc?: string,
 *     UserRules?: list<array{ipRule?: string, ruleDesc?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIpGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIpGroupAsync(array{
 *     GroupName?: string,
 *     GroupDesc?: string,
 *     UserRules?: list<array{ipRule?: string, ruleDesc?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStandbyWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result createStandbyWorkspaces(array{
 *     PrimaryRegion?: string,
 *     StandbyWorkspaces?: list<array{
 *         PrimaryWorkspaceId?: string,
 *         VolumeEncryptionKey?: string,
 *         DirectoryId?: string,
 *         Tags?: list<array>,
 *         DataReplication?: 'NO_REPLICATION'|'PRIMARY_AS_SOURCE',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStandbyWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStandbyWorkspacesAsync(array{
 *     PrimaryRegion?: string,
 *     StandbyWorkspaces?: list<array{
 *         PrimaryWorkspaceId?: string,
 *         VolumeEncryptionKey?: string,
 *         DirectoryId?: string,
 *         Tags?: list<array>,
 *         DataReplication?: 'NO_REPLICATION'|'PRIMARY_AS_SOURCE',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTags(array $args = [])
 * @phpstan-method \Aws\Result createTags(array{ResourceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTagsAsync(array{ResourceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createUpdatedWorkspaceImage(array $args = [])
 * @phpstan-method \Aws\Result createUpdatedWorkspaceImage(array{
 *     Name?: string,
 *     Description?: string,
 *     SourceImageId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUpdatedWorkspaceImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUpdatedWorkspaceImageAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     SourceImageId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkspaceBundle(array $args = [])
 * @phpstan-method \Aws\Result createWorkspaceBundle(array{
 *     BundleName?: string,
 *     BundleDescription?: string,
 *     ImageId?: string,
 *     ComputeType?: array{
 *         Name?: 'GENERALPURPOSE_4XLARGE'|'GENERALPURPOSE_8XLARGE'|'GRAPHICS'|'GRAPHICSPRO'|'GRAPHICSPRO_G4DN'|'GRAPHICS_G4DN'|'GRAPHICS_G6F_2XLARGE'|'GRAPHICS_G6F_4XLARGE'|'GRAPHICS_G6F_LARGE'|'GRAPHICS_G6F_XLARGE'|'GRAPHICS_G6_16XLARGE'|'GRAPHICS_G6_2XLARGE'|'GRAPHICS_G6_4XLARGE'|'GRAPHICS_G6_8XLARGE'|'GRAPHICS_G6_XLARGE'|'GRAPHICS_GR6F_4XLARGE'|'GRAPHICS_GR6_4XLARGE'|'GRAPHICS_GR6_8XLARGE'|'PERFORMANCE'|'POWER'|'POWERPRO'|'STANDARD'|'VALUE',
 *         ...,
 *     },
 *     UserStorage?: array{Capacity?: string, ...},
 *     RootStorage?: array{Capacity?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceBundleAsync(array{
 *     BundleName?: string,
 *     BundleDescription?: string,
 *     ImageId?: string,
 *     ComputeType?: array{
 *         Name?: 'GENERALPURPOSE_4XLARGE'|'GENERALPURPOSE_8XLARGE'|'GRAPHICS'|'GRAPHICSPRO'|'GRAPHICSPRO_G4DN'|'GRAPHICS_G4DN'|'GRAPHICS_G6F_2XLARGE'|'GRAPHICS_G6F_4XLARGE'|'GRAPHICS_G6F_LARGE'|'GRAPHICS_G6F_XLARGE'|'GRAPHICS_G6_16XLARGE'|'GRAPHICS_G6_2XLARGE'|'GRAPHICS_G6_4XLARGE'|'GRAPHICS_G6_8XLARGE'|'GRAPHICS_G6_XLARGE'|'GRAPHICS_GR6F_4XLARGE'|'GRAPHICS_GR6_4XLARGE'|'GRAPHICS_GR6_8XLARGE'|'PERFORMANCE'|'POWER'|'POWERPRO'|'STANDARD'|'VALUE',
 *         ...,
 *     },
 *     UserStorage?: array{Capacity?: string, ...},
 *     RootStorage?: array{Capacity?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkspaceImage(array $args = [])
 * @phpstan-method \Aws\Result createWorkspaceImage(array{
 *     Name?: string,
 *     Description?: string,
 *     WorkspaceId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceImageAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     WorkspaceId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result createWorkspaces(array{
 *     Workspaces?: list<array{
 *         DirectoryId?: string,
 *         UserName?: string,
 *         BundleId?: string,
 *         VolumeEncryptionKey?: string,
 *         UserVolumeEncryptionEnabled?: bool,
 *         RootVolumeEncryptionEnabled?: bool,
 *         WorkspaceProperties?: array,
 *         Tags?: list<array>,
 *         WorkspaceName?: string,
 *         Ipv6Address?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspacesAsync(array{
 *     Workspaces?: list<array{
 *         DirectoryId?: string,
 *         UserName?: string,
 *         BundleId?: string,
 *         VolumeEncryptionKey?: string,
 *         UserVolumeEncryptionEnabled?: bool,
 *         RootVolumeEncryptionEnabled?: bool,
 *         WorkspaceProperties?: array,
 *         Tags?: list<array>,
 *         WorkspaceName?: string,
 *         Ipv6Address?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkspacesPool(array $args = [])
 * @phpstan-method \Aws\Result createWorkspacesPool(array{
 *     PoolName?: string,
 *     Description?: string,
 *     BundleId?: string,
 *     DirectoryId?: string,
 *     Capacity?: array{DesiredUserSessions?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ApplicationSettings?: array{Status?: 'DISABLED'|'ENABLED', SettingsGroup?: string, ...},
 *     TimeoutSettings?: array{
 *         DisconnectTimeoutInSeconds?: int,
 *         IdleDisconnectTimeoutInSeconds?: int,
 *         MaxUserDurationInSeconds?: int,
 *         ...,
 *     },
 *     RunningMode?: 'ALWAYS_ON'|'AUTO_STOP',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspacesPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspacesPoolAsync(array{
 *     PoolName?: string,
 *     Description?: string,
 *     BundleId?: string,
 *     DirectoryId?: string,
 *     Capacity?: array{DesiredUserSessions?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ApplicationSettings?: array{Status?: 'DISABLED'|'ENABLED', SettingsGroup?: string, ...},
 *     TimeoutSettings?: array{
 *         DisconnectTimeoutInSeconds?: int,
 *         IdleDisconnectTimeoutInSeconds?: int,
 *         MaxUserDurationInSeconds?: int,
 *         ...,
 *     },
 *     RunningMode?: 'ALWAYS_ON'|'AUTO_STOP',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccountLinkInvitation(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountLinkInvitation(array{LinkId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountLinkInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountLinkInvitationAsync(array{LinkId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteClientBranding(array $args = [])
 * @phpstan-method \Aws\Result deleteClientBranding(array{
 *     ResourceId?: string,
 *     Platforms?: list<'DeviceTypeAndroid'|'DeviceTypeIos'|'DeviceTypeLinux'|'DeviceTypeOsx'|'DeviceTypeWeb'|'DeviceTypeWindows'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClientBrandingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClientBrandingAsync(array{
 *     ResourceId?: string,
 *     Platforms?: list<'DeviceTypeAndroid'|'DeviceTypeIos'|'DeviceTypeLinux'|'DeviceTypeOsx'|'DeviceTypeWeb'|'DeviceTypeWindows'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteConnectClientAddIn(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectClientAddIn(array{AddInId?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectClientAddInAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectClientAddInAsync(array{AddInId?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result deleteConnectionAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectionAlias(array{AliasId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAliasAsync(array{AliasId?: string, ...} $args = [])
 * @method \Aws\Result deleteIpGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteIpGroup(array{GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIpGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIpGroupAsync(array{GroupId?: string, ...} $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @phpstan-method \Aws\Result deleteTags(array{ResourceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagsAsync(array{ResourceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteWorkspaceBundle(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspaceBundle(array{BundleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceBundleAsync(array{BundleId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkspaceImage(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspaceImage(array{ImageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceImageAsync(array{ImageId?: string, ...} $args = [])
 * @method \Aws\Result deployWorkspaceApplications(array $args = [])
 * @phpstan-method \Aws\Result deployWorkspaceApplications(array{WorkspaceId?: string, Force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deployWorkspaceApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deployWorkspaceApplicationsAsync(array{WorkspaceId?: string, Force?: bool, ...} $args = [])
 * @method \Aws\Result deregisterWorkspaceDirectory(array $args = [])
 * @phpstan-method \Aws\Result deregisterWorkspaceDirectory(array{DirectoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterWorkspaceDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterWorkspaceDirectoryAsync(array{DirectoryId?: string, ...} $args = [])
 * @method \Aws\Result describeAccount(array $args = [])
 * @phpstan-method \Aws\Result describeAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountAsync(array{...} $args = [])
 * @method \Aws\Result describeAccountModifications(array $args = [])
 * @phpstan-method \Aws\Result describeAccountModifications(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountModificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountModificationsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeApplicationAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeApplicationAssociations(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ApplicationId?: string,
 *     AssociatedResourceTypes?: list<'BUNDLE'|'IMAGE'|'WORKSPACE'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationAssociationsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ApplicationId?: string,
 *     AssociatedResourceTypes?: list<'BUNDLE'|'IMAGE'|'WORKSPACE'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeApplications(array $args = [])
 * @phpstan-method \Aws\Result describeApplications(array{
 *     ApplicationIds?: list<string>,
 *     ComputeTypeNames?: list<'GENERALPURPOSE_4XLARGE'|'GENERALPURPOSE_8XLARGE'|'GRAPHICS'|'GRAPHICSPRO'|'GRAPHICSPRO_G4DN'|'GRAPHICS_G4DN'|'GRAPHICS_G6F_2XLARGE'|'GRAPHICS_G6F_4XLARGE'|'GRAPHICS_G6F_LARGE'|'GRAPHICS_G6F_XLARGE'|'GRAPHICS_G6_16XLARGE'|'GRAPHICS_G6_2XLARGE'|'GRAPHICS_G6_4XLARGE'|'GRAPHICS_G6_8XLARGE'|'GRAPHICS_G6_XLARGE'|'GRAPHICS_GR6F_4XLARGE'|'GRAPHICS_GR6_4XLARGE'|'GRAPHICS_GR6_8XLARGE'|'PERFORMANCE'|'POWER'|'POWERPRO'|'STANDARD'|'VALUE'>,
 *     LicenseType?: 'LICENSED'|'UNLICENSED',
 *     OperatingSystemNames?: list<'AMAZON_LINUX_2'|'RHEL_8'|'ROCKY_8'|'UBUNTU_18_04'|'UBUNTU_20_04'|'UBUNTU_22_04'|'UNKNOWN'|'WINDOWS_10'|'WINDOWS_11'|'WINDOWS_7'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025'>,
 *     Owner?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationsAsync(array{
 *     ApplicationIds?: list<string>,
 *     ComputeTypeNames?: list<'GENERALPURPOSE_4XLARGE'|'GENERALPURPOSE_8XLARGE'|'GRAPHICS'|'GRAPHICSPRO'|'GRAPHICSPRO_G4DN'|'GRAPHICS_G4DN'|'GRAPHICS_G6F_2XLARGE'|'GRAPHICS_G6F_4XLARGE'|'GRAPHICS_G6F_LARGE'|'GRAPHICS_G6F_XLARGE'|'GRAPHICS_G6_16XLARGE'|'GRAPHICS_G6_2XLARGE'|'GRAPHICS_G6_4XLARGE'|'GRAPHICS_G6_8XLARGE'|'GRAPHICS_G6_XLARGE'|'GRAPHICS_GR6F_4XLARGE'|'GRAPHICS_GR6_4XLARGE'|'GRAPHICS_GR6_8XLARGE'|'PERFORMANCE'|'POWER'|'POWERPRO'|'STANDARD'|'VALUE'>,
 *     LicenseType?: 'LICENSED'|'UNLICENSED',
 *     OperatingSystemNames?: list<'AMAZON_LINUX_2'|'RHEL_8'|'ROCKY_8'|'UBUNTU_18_04'|'UBUNTU_20_04'|'UBUNTU_22_04'|'UNKNOWN'|'WINDOWS_10'|'WINDOWS_11'|'WINDOWS_7'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025'>,
 *     Owner?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeBundleAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeBundleAssociations(array{BundleId?: string, AssociatedResourceTypes?: list<'APPLICATION'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBundleAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBundleAssociationsAsync(array{BundleId?: string, AssociatedResourceTypes?: list<'APPLICATION'>, ...} $args = [])
 * @method \Aws\Result describeClientBranding(array $args = [])
 * @phpstan-method \Aws\Result describeClientBranding(array{ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClientBrandingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClientBrandingAsync(array{ResourceId?: string, ...} $args = [])
 * @method \Aws\Result describeClientProperties(array $args = [])
 * @phpstan-method \Aws\Result describeClientProperties(array{ResourceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClientPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClientPropertiesAsync(array{ResourceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result describeConnectClientAddIns(array $args = [])
 * @phpstan-method \Aws\Result describeConnectClientAddIns(array{ResourceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectClientAddInsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectClientAddInsAsync(array{ResourceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeConnectionAliasPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeConnectionAliasPermissions(array{AliasId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionAliasPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectionAliasPermissionsAsync(array{AliasId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeConnectionAliases(array $args = [])
 * @phpstan-method \Aws\Result describeConnectionAliases(array{AliasIds?: list<string>, ResourceId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectionAliasesAsync(array{AliasIds?: list<string>, ResourceId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeCustomWorkspaceImageImport(array $args = [])
 * @phpstan-method \Aws\Result describeCustomWorkspaceImageImport(array{ImageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomWorkspaceImageImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomWorkspaceImageImportAsync(array{ImageId?: string, ...} $args = [])
 * @method \Aws\Result describeImageAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeImageAssociations(array{ImageId?: string, AssociatedResourceTypes?: list<'APPLICATION'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImageAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImageAssociationsAsync(array{ImageId?: string, AssociatedResourceTypes?: list<'APPLICATION'>, ...} $args = [])
 * @method \Aws\Result describeIpGroups(array $args = [])
 * @phpstan-method \Aws\Result describeIpGroups(array{GroupIds?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIpGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIpGroupsAsync(array{GroupIds?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @phpstan-method \Aws\Result describeTags(array{ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTagsAsync(array{ResourceId?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspaceAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspaceAssociations(array{WorkspaceId?: string, AssociatedResourceTypes?: list<'APPLICATION'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceAssociationsAsync(array{WorkspaceId?: string, AssociatedResourceTypes?: list<'APPLICATION'>, ...} $args = [])
 * @method \Aws\Result describeWorkspaceBundles(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspaceBundles(array{BundleIds?: list<string>, Owner?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceBundlesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceBundlesAsync(array{BundleIds?: list<string>, Owner?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspaceDirectories(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspaceDirectories(array{
 *     DirectoryIds?: list<string>,
 *     WorkspaceDirectoryNames?: list<string>,
 *     Limit?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: 'USER_IDENTITY_TYPE'|'WORKSPACE_TYPE', Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceDirectoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceDirectoriesAsync(array{
 *     DirectoryIds?: list<string>,
 *     WorkspaceDirectoryNames?: list<string>,
 *     Limit?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: 'USER_IDENTITY_TYPE'|'WORKSPACE_TYPE', Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeWorkspaceImagePermissions(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspaceImagePermissions(array{ImageId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceImagePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceImagePermissionsAsync(array{ImageId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeWorkspaceImages(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspaceImages(array{ImageIds?: list<string>, ImageType?: 'OWNED'|'SHARED', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceImagesAsync(array{ImageIds?: list<string>, ImageType?: 'OWNED'|'SHARED', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeWorkspaceSnapshots(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspaceSnapshots(array{WorkspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceSnapshotsAsync(array{WorkspaceId?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspaces(array{
 *     WorkspaceIds?: list<string>,
 *     DirectoryId?: string,
 *     UserName?: string,
 *     BundleId?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     WorkspaceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspacesAsync(array{
 *     WorkspaceIds?: list<string>,
 *     DirectoryId?: string,
 *     UserName?: string,
 *     BundleId?: string,
 *     Limit?: int,
 *     NextToken?: string,
 *     WorkspaceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeWorkspacesConnectionStatus(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspacesConnectionStatus(array{WorkspaceIds?: list<string>, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspacesConnectionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspacesConnectionStatusAsync(array{WorkspaceIds?: list<string>, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspacesPoolSessions(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspacesPoolSessions(array{PoolId?: string, UserId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspacesPoolSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspacesPoolSessionsAsync(array{PoolId?: string, UserId?: string, Limit?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspacesPools(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspacesPools(array{
 *     PoolIds?: list<string>,
 *     Filters?: list<array{Name?: 'PoolName', Values?: list<string>, Operator?: 'CONTAINS'|'EQUALS'|'NOTCONTAINS'|'NOTEQUALS', ...}>,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspacesPoolsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspacesPoolsAsync(array{
 *     PoolIds?: list<string>,
 *     Filters?: list<array{Name?: 'PoolName', Values?: list<string>, Operator?: 'CONTAINS'|'EQUALS'|'NOTCONTAINS'|'NOTEQUALS', ...}>,
 *     Limit?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateConnectionAlias(array $args = [])
 * @phpstan-method \Aws\Result disassociateConnectionAlias(array{AliasId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateConnectionAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateConnectionAliasAsync(array{AliasId?: string, ...} $args = [])
 * @method \Aws\Result disassociateIpGroups(array $args = [])
 * @phpstan-method \Aws\Result disassociateIpGroups(array{DirectoryId?: string, GroupIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateIpGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateIpGroupsAsync(array{DirectoryId?: string, GroupIds?: list<string>, ...} $args = [])
 * @method \Aws\Result disassociateWorkspaceApplication(array $args = [])
 * @phpstan-method \Aws\Result disassociateWorkspaceApplication(array{WorkspaceId?: string, ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateWorkspaceApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateWorkspaceApplicationAsync(array{WorkspaceId?: string, ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getAccountLink(array $args = [])
 * @phpstan-method \Aws\Result getAccountLink(array{LinkId?: string, LinkedAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountLinkAsync(array{LinkId?: string, LinkedAccountId?: string, ...} $args = [])
 * @method \Aws\Result importClientBranding(array $args = [])
 * @phpstan-method \Aws\Result importClientBranding(array{
 *     ResourceId?: string,
 *     DeviceTypeWindows?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     DeviceTypeOsx?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     DeviceTypeAndroid?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     DeviceTypeIos?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Logo2x?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Logo3x?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     DeviceTypeLinux?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     DeviceTypeWeb?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importClientBrandingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importClientBrandingAsync(array{
 *     ResourceId?: string,
 *     DeviceTypeWindows?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     DeviceTypeOsx?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     DeviceTypeAndroid?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     DeviceTypeIos?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Logo2x?: string|resource|\Psr\Http\Message\StreamInterface,
 *         Logo3x?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     DeviceTypeLinux?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     DeviceTypeWeb?: array{
 *         Logo?: string|resource|\Psr\Http\Message\StreamInterface,
 *         SupportEmail?: string,
 *         SupportLink?: string,
 *         ForgotPasswordLink?: string,
 *         LoginMessage?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result importCustomWorkspaceImage(array $args = [])
 * @phpstan-method \Aws\Result importCustomWorkspaceImage(array{
 *     ImageName?: string,
 *     ImageDescription?: string,
 *     ComputeType?: 'BASE'|'GRAPHICS_G4DN'|'GRAPHICS_G6',
 *     Protocol?: 'BYOP'|'DCV'|'PCOIP',
 *     ImageSource?: array{Ec2ImportTaskId?: string, ImageBuildVersionArn?: string, Ec2ImageId?: string, ...},
 *     InfrastructureConfigurationArn?: string,
 *     Platform?: 'WINDOWS',
 *     OsVersion?: 'Windows_10'|'Windows_11',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importCustomWorkspaceImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importCustomWorkspaceImageAsync(array{
 *     ImageName?: string,
 *     ImageDescription?: string,
 *     ComputeType?: 'BASE'|'GRAPHICS_G4DN'|'GRAPHICS_G6',
 *     Protocol?: 'BYOP'|'DCV'|'PCOIP',
 *     ImageSource?: array{Ec2ImportTaskId?: string, ImageBuildVersionArn?: string, Ec2ImageId?: string, ...},
 *     InfrastructureConfigurationArn?: string,
 *     Platform?: 'WINDOWS',
 *     OsVersion?: 'Windows_10'|'Windows_11',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importWorkspaceImage(array $args = [])
 * @phpstan-method \Aws\Result importWorkspaceImage(array{
 *     Ec2ImageId?: string,
 *     IngestionProcess?: 'BYOL_GRAPHICS'|'BYOL_GRAPHICSPRO'|'BYOL_GRAPHICS_G4DN'|'BYOL_GRAPHICS_G4DN_BYOP'|'BYOL_GRAPHICS_G4DN_WSP'|'BYOL_REGULAR'|'BYOL_REGULAR_BYOP'|'BYOL_REGULAR_WSP',
 *     ImageName?: string,
 *     ImageDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Applications?: list<'Microsoft_Office_2016'|'Microsoft_Office_2019'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importWorkspaceImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importWorkspaceImageAsync(array{
 *     Ec2ImageId?: string,
 *     IngestionProcess?: 'BYOL_GRAPHICS'|'BYOL_GRAPHICSPRO'|'BYOL_GRAPHICS_G4DN'|'BYOL_GRAPHICS_G4DN_BYOP'|'BYOL_GRAPHICS_G4DN_WSP'|'BYOL_REGULAR'|'BYOL_REGULAR_BYOP'|'BYOL_REGULAR_WSP',
 *     ImageName?: string,
 *     ImageDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Applications?: list<'Microsoft_Office_2016'|'Microsoft_Office_2019'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccountLinks(array $args = [])
 * @phpstan-method \Aws\Result listAccountLinks(array{
 *     LinkStatusFilter?: list<'LINKED'|'LINKING_FAILED'|'LINK_NOT_FOUND'|'PENDING_ACCEPTANCE_BY_TARGET_ACCOUNT'|'REJECTED'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountLinksAsync(array{
 *     LinkStatusFilter?: list<'LINKED'|'LINKING_FAILED'|'LINK_NOT_FOUND'|'PENDING_ACCEPTANCE_BY_TARGET_ACCOUNT'|'REJECTED'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAvailableManagementCidrRanges(array $args = [])
 * @phpstan-method \Aws\Result listAvailableManagementCidrRanges(array{ManagementCidrRangeConstraint?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailableManagementCidrRangesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAvailableManagementCidrRangesAsync(array{ManagementCidrRangeConstraint?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result migrateWorkspace(array $args = [])
 * @phpstan-method \Aws\Result migrateWorkspace(array{SourceWorkspaceId?: string, BundleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise migrateWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise migrateWorkspaceAsync(array{SourceWorkspaceId?: string, BundleId?: string, ...} $args = [])
 * @method \Aws\Result modifyAccount(array $args = [])
 * @phpstan-method \Aws\Result modifyAccount(array{DedicatedTenancySupport?: 'ENABLED', DedicatedTenancyManagementCidrRange?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyAccountAsync(array{DedicatedTenancySupport?: 'ENABLED', DedicatedTenancyManagementCidrRange?: string, ...} $args = [])
 * @method \Aws\Result modifyCertificateBasedAuthProperties(array $args = [])
 * @phpstan-method \Aws\Result modifyCertificateBasedAuthProperties(array{
 *     ResourceId?: string,
 *     CertificateBasedAuthProperties?: array{Status?: 'DISABLED'|'ENABLED', CertificateAuthorityArn?: string, ...},
 *     PropertiesToDelete?: list<'CERTIFICATE_BASED_AUTH_PROPERTIES_CERTIFICATE_AUTHORITY_ARN'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyCertificateBasedAuthPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyCertificateBasedAuthPropertiesAsync(array{
 *     ResourceId?: string,
 *     CertificateBasedAuthProperties?: array{Status?: 'DISABLED'|'ENABLED', CertificateAuthorityArn?: string, ...},
 *     PropertiesToDelete?: list<'CERTIFICATE_BASED_AUTH_PROPERTIES_CERTIFICATE_AUTHORITY_ARN'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyClientProperties(array $args = [])
 * @phpstan-method \Aws\Result modifyClientProperties(array{
 *     ResourceId?: string,
 *     ClientProperties?: array{ReconnectEnabled?: 'DISABLED'|'ENABLED', LogUploadEnabled?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClientPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClientPropertiesAsync(array{
 *     ResourceId?: string,
 *     ClientProperties?: array{ReconnectEnabled?: 'DISABLED'|'ENABLED', LogUploadEnabled?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyEndpointEncryptionMode(array $args = [])
 * @phpstan-method \Aws\Result modifyEndpointEncryptionMode(array{DirectoryId?: string, EndpointEncryptionMode?: 'FIPS_VALIDATED'|'STANDARD_TLS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyEndpointEncryptionModeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyEndpointEncryptionModeAsync(array{DirectoryId?: string, EndpointEncryptionMode?: 'FIPS_VALIDATED'|'STANDARD_TLS', ...} $args = [])
 * @method \Aws\Result modifySamlProperties(array $args = [])
 * @phpstan-method \Aws\Result modifySamlProperties(array{
 *     ResourceId?: string,
 *     SamlProperties?: array{
 *         Status?: 'DISABLED'|'ENABLED'|'ENABLED_WITH_DIRECTORY_LOGIN_FALLBACK',
 *         UserAccessUrl?: string,
 *         RelayStateParameterName?: string,
 *         ...,
 *     },
 *     PropertiesToDelete?: list<'SAML_PROPERTIES_RELAY_STATE_PARAMETER_NAME'|'SAML_PROPERTIES_USER_ACCESS_URL'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifySamlPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifySamlPropertiesAsync(array{
 *     ResourceId?: string,
 *     SamlProperties?: array{
 *         Status?: 'DISABLED'|'ENABLED'|'ENABLED_WITH_DIRECTORY_LOGIN_FALLBACK',
 *         UserAccessUrl?: string,
 *         RelayStateParameterName?: string,
 *         ...,
 *     },
 *     PropertiesToDelete?: list<'SAML_PROPERTIES_RELAY_STATE_PARAMETER_NAME'|'SAML_PROPERTIES_USER_ACCESS_URL'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifySelfservicePermissions(array $args = [])
 * @phpstan-method \Aws\Result modifySelfservicePermissions(array{
 *     ResourceId?: string,
 *     SelfservicePermissions?: array{
 *         RestartWorkspace?: 'DISABLED'|'ENABLED',
 *         IncreaseVolumeSize?: 'DISABLED'|'ENABLED',
 *         ChangeComputeType?: 'DISABLED'|'ENABLED',
 *         SwitchRunningMode?: 'DISABLED'|'ENABLED',
 *         RebuildWorkspace?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifySelfservicePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifySelfservicePermissionsAsync(array{
 *     ResourceId?: string,
 *     SelfservicePermissions?: array{
 *         RestartWorkspace?: 'DISABLED'|'ENABLED',
 *         IncreaseVolumeSize?: 'DISABLED'|'ENABLED',
 *         ChangeComputeType?: 'DISABLED'|'ENABLED',
 *         SwitchRunningMode?: 'DISABLED'|'ENABLED',
 *         RebuildWorkspace?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyStreamingProperties(array $args = [])
 * @phpstan-method \Aws\Result modifyStreamingProperties(array{
 *     ResourceId?: string,
 *     StreamingProperties?: array{
 *         StreamingExperiencePreferredProtocol?: 'TCP'|'UDP',
 *         UserSettings?: list<array>,
 *         StorageConnectors?: list<array>,
 *         GlobalAccelerator?: array{Mode?: 'DISABLED'|'ENABLED_AUTO', PreferredProtocol?: 'NONE'|'TCP', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyStreamingPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyStreamingPropertiesAsync(array{
 *     ResourceId?: string,
 *     StreamingProperties?: array{
 *         StreamingExperiencePreferredProtocol?: 'TCP'|'UDP',
 *         UserSettings?: list<array>,
 *         StorageConnectors?: list<array>,
 *         GlobalAccelerator?: array{Mode?: 'DISABLED'|'ENABLED_AUTO', PreferredProtocol?: 'NONE'|'TCP', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyWorkspaceAccessProperties(array $args = [])
 * @phpstan-method \Aws\Result modifyWorkspaceAccessProperties(array{
 *     ResourceId?: string,
 *     WorkspaceAccessProperties?: array{
 *         DeviceTypeWindows?: 'ALLOW'|'DENY',
 *         DeviceTypeOsx?: 'ALLOW'|'DENY',
 *         DeviceTypeWeb?: 'ALLOW'|'DENY',
 *         DeviceTypeIos?: 'ALLOW'|'DENY',
 *         DeviceTypeAndroid?: 'ALLOW'|'DENY',
 *         DeviceTypeChromeOs?: 'ALLOW'|'DENY',
 *         DeviceTypeZeroClient?: 'ALLOW'|'DENY',
 *         DeviceTypeLinux?: 'ALLOW'|'DENY',
 *         DeviceTypeWorkSpacesThinClient?: 'ALLOW'|'DENY',
 *         AccessEndpointConfig?: array{AccessEndpoints?: list<array>, InternetFallbackProtocols?: list<'PCOIP'>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyWorkspaceAccessPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyWorkspaceAccessPropertiesAsync(array{
 *     ResourceId?: string,
 *     WorkspaceAccessProperties?: array{
 *         DeviceTypeWindows?: 'ALLOW'|'DENY',
 *         DeviceTypeOsx?: 'ALLOW'|'DENY',
 *         DeviceTypeWeb?: 'ALLOW'|'DENY',
 *         DeviceTypeIos?: 'ALLOW'|'DENY',
 *         DeviceTypeAndroid?: 'ALLOW'|'DENY',
 *         DeviceTypeChromeOs?: 'ALLOW'|'DENY',
 *         DeviceTypeZeroClient?: 'ALLOW'|'DENY',
 *         DeviceTypeLinux?: 'ALLOW'|'DENY',
 *         DeviceTypeWorkSpacesThinClient?: 'ALLOW'|'DENY',
 *         AccessEndpointConfig?: array{AccessEndpoints?: list<array>, InternetFallbackProtocols?: list<'PCOIP'>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyWorkspaceCreationProperties(array $args = [])
 * @phpstan-method \Aws\Result modifyWorkspaceCreationProperties(array{
 *     ResourceId?: string,
 *     WorkspaceCreationProperties?: array{
 *         EnableInternetAccess?: bool,
 *         DefaultOu?: string,
 *         CustomSecurityGroupId?: string,
 *         UserEnabledAsLocalAdministrator?: bool,
 *         EnableMaintenanceMode?: bool,
 *         InstanceIamRoleArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyWorkspaceCreationPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyWorkspaceCreationPropertiesAsync(array{
 *     ResourceId?: string,
 *     WorkspaceCreationProperties?: array{
 *         EnableInternetAccess?: bool,
 *         DefaultOu?: string,
 *         CustomSecurityGroupId?: string,
 *         UserEnabledAsLocalAdministrator?: bool,
 *         EnableMaintenanceMode?: bool,
 *         InstanceIamRoleArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyWorkspaceProperties(array $args = [])
 * @phpstan-method \Aws\Result modifyWorkspaceProperties(array{
 *     WorkspaceId?: string,
 *     WorkspaceProperties?: array{
 *         RunningMode?: 'ALWAYS_ON'|'AUTO_STOP'|'MANUAL',
 *         RunningModeAutoStopTimeoutInMinutes?: int,
 *         RootVolumeSizeGib?: int,
 *         UserVolumeSizeGib?: int,
 *         ComputeTypeName?: 'GENERALPURPOSE_4XLARGE'|'GENERALPURPOSE_8XLARGE'|'GRAPHICS'|'GRAPHICSPRO'|'GRAPHICSPRO_G4DN'|'GRAPHICS_G4DN'|'GRAPHICS_G6F_2XLARGE'|'GRAPHICS_G6F_4XLARGE'|'GRAPHICS_G6F_LARGE'|'GRAPHICS_G6F_XLARGE'|'GRAPHICS_G6_16XLARGE'|'GRAPHICS_G6_2XLARGE'|'GRAPHICS_G6_4XLARGE'|'GRAPHICS_G6_8XLARGE'|'GRAPHICS_G6_XLARGE'|'GRAPHICS_GR6F_4XLARGE'|'GRAPHICS_GR6_4XLARGE'|'GRAPHICS_GR6_8XLARGE'|'PERFORMANCE'|'POWER'|'POWERPRO'|'STANDARD'|'VALUE',
 *         Protocols?: list<'PCOIP'|'WSP'>,
 *         OperatingSystemName?: 'AMAZON_LINUX_2'|'RHEL_8'|'ROCKY_8'|'UBUNTU_18_04'|'UBUNTU_20_04'|'UBUNTU_22_04'|'UNKNOWN'|'WINDOWS_10'|'WINDOWS_11'|'WINDOWS_7'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025',
 *         GlobalAccelerator?: array{Mode?: 'DISABLED'|'ENABLED_AUTO'|'INHERITED', PreferredProtocol?: 'INHERITED'|'NONE'|'TCP', ...},
 *         ...,
 *     },
 *     DataReplication?: 'NO_REPLICATION'|'PRIMARY_AS_SOURCE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyWorkspacePropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyWorkspacePropertiesAsync(array{
 *     WorkspaceId?: string,
 *     WorkspaceProperties?: array{
 *         RunningMode?: 'ALWAYS_ON'|'AUTO_STOP'|'MANUAL',
 *         RunningModeAutoStopTimeoutInMinutes?: int,
 *         RootVolumeSizeGib?: int,
 *         UserVolumeSizeGib?: int,
 *         ComputeTypeName?: 'GENERALPURPOSE_4XLARGE'|'GENERALPURPOSE_8XLARGE'|'GRAPHICS'|'GRAPHICSPRO'|'GRAPHICSPRO_G4DN'|'GRAPHICS_G4DN'|'GRAPHICS_G6F_2XLARGE'|'GRAPHICS_G6F_4XLARGE'|'GRAPHICS_G6F_LARGE'|'GRAPHICS_G6F_XLARGE'|'GRAPHICS_G6_16XLARGE'|'GRAPHICS_G6_2XLARGE'|'GRAPHICS_G6_4XLARGE'|'GRAPHICS_G6_8XLARGE'|'GRAPHICS_G6_XLARGE'|'GRAPHICS_GR6F_4XLARGE'|'GRAPHICS_GR6_4XLARGE'|'GRAPHICS_GR6_8XLARGE'|'PERFORMANCE'|'POWER'|'POWERPRO'|'STANDARD'|'VALUE',
 *         Protocols?: list<'PCOIP'|'WSP'>,
 *         OperatingSystemName?: 'AMAZON_LINUX_2'|'RHEL_8'|'ROCKY_8'|'UBUNTU_18_04'|'UBUNTU_20_04'|'UBUNTU_22_04'|'UNKNOWN'|'WINDOWS_10'|'WINDOWS_11'|'WINDOWS_7'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025',
 *         GlobalAccelerator?: array{Mode?: 'DISABLED'|'ENABLED_AUTO'|'INHERITED', PreferredProtocol?: 'INHERITED'|'NONE'|'TCP', ...},
 *         ...,
 *     },
 *     DataReplication?: 'NO_REPLICATION'|'PRIMARY_AS_SOURCE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyWorkspaceState(array $args = [])
 * @phpstan-method \Aws\Result modifyWorkspaceState(array{WorkspaceId?: string, WorkspaceState?: 'ADMIN_MAINTENANCE'|'AVAILABLE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyWorkspaceStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyWorkspaceStateAsync(array{WorkspaceId?: string, WorkspaceState?: 'ADMIN_MAINTENANCE'|'AVAILABLE', ...} $args = [])
 * @method \Aws\Result rebootWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result rebootWorkspaces(array{RebootWorkspaceRequests?: list<array{WorkspaceId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootWorkspacesAsync(array{RebootWorkspaceRequests?: list<array{WorkspaceId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result rebuildWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result rebuildWorkspaces(array{RebuildWorkspaceRequests?: list<array{WorkspaceId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebuildWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebuildWorkspacesAsync(array{RebuildWorkspaceRequests?: list<array{WorkspaceId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result registerWorkspaceDirectory(array $args = [])
 * @phpstan-method \Aws\Result registerWorkspaceDirectory(array{
 *     DirectoryId?: string,
 *     SubnetIds?: list<string>,
 *     EnableSelfService?: bool,
 *     Tenancy?: 'DEDICATED'|'SHARED',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     WorkspaceDirectoryName?: string,
 *     WorkspaceDirectoryDescription?: string,
 *     UserIdentityType?: 'AWS_DIRECTORY_SERVICE'|'AWS_IAM_IDENTITY_CENTER'|'CUSTOMER_MANAGED',
 *     IdcInstanceArn?: string,
 *     MicrosoftEntraConfig?: array{TenantId?: string, ApplicationConfigSecretArn?: string, ...},
 *     WorkspaceType?: 'PERSONAL'|'POOLS',
 *     ActiveDirectoryConfig?: array{DomainName?: string, ServiceAccountSecretArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerWorkspaceDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerWorkspaceDirectoryAsync(array{
 *     DirectoryId?: string,
 *     SubnetIds?: list<string>,
 *     EnableSelfService?: bool,
 *     Tenancy?: 'DEDICATED'|'SHARED',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     WorkspaceDirectoryName?: string,
 *     WorkspaceDirectoryDescription?: string,
 *     UserIdentityType?: 'AWS_DIRECTORY_SERVICE'|'AWS_IAM_IDENTITY_CENTER'|'CUSTOMER_MANAGED',
 *     IdcInstanceArn?: string,
 *     MicrosoftEntraConfig?: array{TenantId?: string, ApplicationConfigSecretArn?: string, ...},
 *     WorkspaceType?: 'PERSONAL'|'POOLS',
 *     ActiveDirectoryConfig?: array{DomainName?: string, ServiceAccountSecretArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectAccountLinkInvitation(array $args = [])
 * @phpstan-method \Aws\Result rejectAccountLinkInvitation(array{LinkId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectAccountLinkInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectAccountLinkInvitationAsync(array{LinkId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result restoreWorkspace(array $args = [])
 * @phpstan-method \Aws\Result restoreWorkspace(array{WorkspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreWorkspaceAsync(array{WorkspaceId?: string, ...} $args = [])
 * @method \Aws\Result revokeIpRules(array $args = [])
 * @phpstan-method \Aws\Result revokeIpRules(array{GroupId?: string, UserRules?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeIpRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeIpRulesAsync(array{GroupId?: string, UserRules?: list<string>, ...} $args = [])
 * @method \Aws\Result startWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result startWorkspaces(array{StartWorkspaceRequests?: list<array{WorkspaceId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startWorkspacesAsync(array{StartWorkspaceRequests?: list<array{WorkspaceId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result startWorkspacesPool(array $args = [])
 * @phpstan-method \Aws\Result startWorkspacesPool(array{PoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startWorkspacesPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startWorkspacesPoolAsync(array{PoolId?: string, ...} $args = [])
 * @method \Aws\Result stopWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result stopWorkspaces(array{StopWorkspaceRequests?: list<array{WorkspaceId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopWorkspacesAsync(array{StopWorkspaceRequests?: list<array{WorkspaceId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result stopWorkspacesPool(array $args = [])
 * @phpstan-method \Aws\Result stopWorkspacesPool(array{PoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopWorkspacesPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopWorkspacesPoolAsync(array{PoolId?: string, ...} $args = [])
 * @method \Aws\Result terminateWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result terminateWorkspaces(array{TerminateWorkspaceRequests?: list<array{WorkspaceId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateWorkspacesAsync(array{TerminateWorkspaceRequests?: list<array{WorkspaceId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result terminateWorkspacesPool(array $args = [])
 * @phpstan-method \Aws\Result terminateWorkspacesPool(array{PoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateWorkspacesPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateWorkspacesPoolAsync(array{PoolId?: string, ...} $args = [])
 * @method \Aws\Result terminateWorkspacesPoolSession(array $args = [])
 * @phpstan-method \Aws\Result terminateWorkspacesPoolSession(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateWorkspacesPoolSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateWorkspacesPoolSessionAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result updateConnectClientAddIn(array $args = [])
 * @phpstan-method \Aws\Result updateConnectClientAddIn(array{AddInId?: string, ResourceId?: string, Name?: string, URL?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectClientAddInAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectClientAddInAsync(array{AddInId?: string, ResourceId?: string, Name?: string, URL?: string, ...} $args = [])
 * @method \Aws\Result updateConnectionAliasPermission(array $args = [])
 * @phpstan-method \Aws\Result updateConnectionAliasPermission(array{
 *     AliasId?: string,
 *     ConnectionAliasPermission?: array{SharedAccountId?: string, AllowAssociation?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionAliasPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionAliasPermissionAsync(array{
 *     AliasId?: string,
 *     ConnectionAliasPermission?: array{SharedAccountId?: string, AllowAssociation?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRulesOfIpGroup(array $args = [])
 * @phpstan-method \Aws\Result updateRulesOfIpGroup(array{GroupId?: string, UserRules?: list<array{ipRule?: string, ruleDesc?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRulesOfIpGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRulesOfIpGroupAsync(array{GroupId?: string, UserRules?: list<array{ipRule?: string, ruleDesc?: string, ...}>, ...} $args = [])
 * @method \Aws\Result updateWorkspaceBundle(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspaceBundle(array{BundleId?: string, ImageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceBundleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceBundleAsync(array{BundleId?: string, ImageId?: string, ...} $args = [])
 * @method \Aws\Result updateWorkspaceImagePermission(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspaceImagePermission(array{ImageId?: string, AllowCopyImage?: bool, SharedAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceImagePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceImagePermissionAsync(array{ImageId?: string, AllowCopyImage?: bool, SharedAccountId?: string, ...} $args = [])
 * @method \Aws\Result updateWorkspacesPool(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspacesPool(array{
 *     PoolId?: string,
 *     Description?: string,
 *     BundleId?: string,
 *     DirectoryId?: string,
 *     Capacity?: array{DesiredUserSessions?: int, ...},
 *     ApplicationSettings?: array{Status?: 'DISABLED'|'ENABLED', SettingsGroup?: string, ...},
 *     TimeoutSettings?: array{
 *         DisconnectTimeoutInSeconds?: int,
 *         IdleDisconnectTimeoutInSeconds?: int,
 *         MaxUserDurationInSeconds?: int,
 *         ...,
 *     },
 *     RunningMode?: 'ALWAYS_ON'|'AUTO_STOP',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspacesPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspacesPoolAsync(array{
 *     PoolId?: string,
 *     Description?: string,
 *     BundleId?: string,
 *     DirectoryId?: string,
 *     Capacity?: array{DesiredUserSessions?: int, ...},
 *     ApplicationSettings?: array{Status?: 'DISABLED'|'ENABLED', SettingsGroup?: string, ...},
 *     TimeoutSettings?: array{
 *         DisconnectTimeoutInSeconds?: int,
 *         IdleDisconnectTimeoutInSeconds?: int,
 *         MaxUserDurationInSeconds?: int,
 *         ...,
 *     },
 *     RunningMode?: 'ALWAYS_ON'|'AUTO_STOP',
 *     ...,
 * } $args = [])
 */
class WorkSpacesClient extends AwsClient {}
