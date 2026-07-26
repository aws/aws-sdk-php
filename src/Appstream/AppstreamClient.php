<?php
namespace Aws\Appstream;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon AppStream** service.
 * @method \Aws\Result associateAppBlockBuilderAppBlock(array $args = [])
 * @phpstan-method \Aws\Result associateAppBlockBuilderAppBlock(array{AppBlockArn?: string, AppBlockBuilderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAppBlockBuilderAppBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAppBlockBuilderAppBlockAsync(array{AppBlockArn?: string, AppBlockBuilderName?: string, ...} $args = [])
 * @method \Aws\Result associateApplicationFleet(array $args = [])
 * @phpstan-method \Aws\Result associateApplicationFleet(array{FleetName?: string, ApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateApplicationFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateApplicationFleetAsync(array{FleetName?: string, ApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result associateApplicationToEntitlement(array $args = [])
 * @phpstan-method \Aws\Result associateApplicationToEntitlement(array{StackName?: string, EntitlementName?: string, ApplicationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateApplicationToEntitlementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateApplicationToEntitlementAsync(array{StackName?: string, EntitlementName?: string, ApplicationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result associateFleet(array $args = [])
 * @phpstan-method \Aws\Result associateFleet(array{FleetName?: string, StackName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateFleetAsync(array{FleetName?: string, StackName?: string, ...} $args = [])
 * @method \Aws\Result associateSoftwareToImageBuilder(array $args = [])
 * @phpstan-method \Aws\Result associateSoftwareToImageBuilder(array{ImageBuilderName?: string, SoftwareNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSoftwareToImageBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSoftwareToImageBuilderAsync(array{ImageBuilderName?: string, SoftwareNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchAssociateUserStack(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateUserStack(array{
 *     UserStackAssociations?: list<array{
 *         StackName?: string,
 *         UserName?: string,
 *         AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL',
 *         SendEmailNotification?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateUserStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateUserStackAsync(array{
 *     UserStackAssociations?: list<array{
 *         StackName?: string,
 *         UserName?: string,
 *         AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL',
 *         SendEmailNotification?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDisassociateUserStack(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateUserStack(array{
 *     UserStackAssociations?: list<array{
 *         StackName?: string,
 *         UserName?: string,
 *         AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL',
 *         SendEmailNotification?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateUserStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateUserStackAsync(array{
 *     UserStackAssociations?: list<array{
 *         StackName?: string,
 *         UserName?: string,
 *         AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL',
 *         SendEmailNotification?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyImage(array $args = [])
 * @phpstan-method \Aws\Result copyImage(array{
 *     SourceImageName?: string,
 *     DestinationImageName?: string,
 *     DestinationRegion?: string,
 *     DestinationImageDescription?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyImageAsync(array{
 *     SourceImageName?: string,
 *     DestinationImageName?: string,
 *     DestinationRegion?: string,
 *     DestinationImageDescription?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppBlock(array $args = [])
 * @phpstan-method \Aws\Result createAppBlock(array{
 *     Name?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     SourceS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     SetupScriptDetails?: array{
 *         ScriptS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *         ExecutablePath?: string,
 *         ExecutableParameters?: string,
 *         TimeoutInSeconds?: int,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     PostSetupScriptDetails?: array{
 *         ScriptS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *         ExecutablePath?: string,
 *         ExecutableParameters?: string,
 *         TimeoutInSeconds?: int,
 *         ...,
 *     },
 *     PackagingType?: 'APPSTREAM2'|'CUSTOM',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppBlockAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     SourceS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     SetupScriptDetails?: array{
 *         ScriptS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *         ExecutablePath?: string,
 *         ExecutableParameters?: string,
 *         TimeoutInSeconds?: int,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     PostSetupScriptDetails?: array{
 *         ScriptS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *         ExecutablePath?: string,
 *         ExecutableParameters?: string,
 *         TimeoutInSeconds?: int,
 *         ...,
 *     },
 *     PackagingType?: 'APPSTREAM2'|'CUSTOM',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppBlockBuilder(array $args = [])
 * @phpstan-method \Aws\Result createAppBlockBuilder(array{
 *     Name?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     Tags?: array<string, string>,
 *     Platform?: 'WINDOWS_SERVER_2019',
 *     InstanceType?: string,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     EnableDefaultInternetAccess?: bool,
 *     IamRoleArn?: string,
 *     AccessEndpoints?: list<array{EndpointType?: 'STREAMING', VpceId?: string, ...}>,
 *     DisableIMDSV1?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppBlockBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppBlockBuilderAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     Tags?: array<string, string>,
 *     Platform?: 'WINDOWS_SERVER_2019',
 *     InstanceType?: string,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     EnableDefaultInternetAccess?: bool,
 *     IamRoleArn?: string,
 *     AccessEndpoints?: list<array{EndpointType?: 'STREAMING', VpceId?: string, ...}>,
 *     DisableIMDSV1?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppBlockBuilderStreamingURL(array $args = [])
 * @phpstan-method \Aws\Result createAppBlockBuilderStreamingURL(array{AppBlockBuilderName?: string, Validity?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppBlockBuilderStreamingURLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppBlockBuilderStreamingURLAsync(array{AppBlockBuilderName?: string, Validity?: int, ...} $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{
 *     Name?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     IconS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     LaunchPath?: string,
 *     WorkingDirectory?: string,
 *     LaunchParameters?: string,
 *     Platforms?: list<'AMAZON_LINUX2'|'RHEL8'|'ROCKY_LINUX8'|'UBUNTU_PRO_2404'|'WINDOWS'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025'>,
 *     InstanceFamilies?: list<string>,
 *     AppBlockArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{
 *     Name?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     IconS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     LaunchPath?: string,
 *     WorkingDirectory?: string,
 *     LaunchParameters?: string,
 *     Platforms?: list<'AMAZON_LINUX2'|'RHEL8'|'ROCKY_LINUX8'|'UBUNTU_PRO_2404'|'WINDOWS'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025'>,
 *     InstanceFamilies?: list<string>,
 *     AppBlockArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDirectoryConfig(array $args = [])
 * @phpstan-method \Aws\Result createDirectoryConfig(array{
 *     DirectoryName?: string,
 *     OrganizationalUnitDistinguishedNames?: list<string>,
 *     ServiceAccountCredentials?: array{AccountName?: string, AccountPassword?: string, ...},
 *     CertificateBasedAuthProperties?: array{
 *         Status?: 'DISABLED'|'ENABLED'|'ENABLED_NO_DIRECTORY_LOGIN_FALLBACK',
 *         CertificateAuthorityArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectoryConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDirectoryConfigAsync(array{
 *     DirectoryName?: string,
 *     OrganizationalUnitDistinguishedNames?: list<string>,
 *     ServiceAccountCredentials?: array{AccountName?: string, AccountPassword?: string, ...},
 *     CertificateBasedAuthProperties?: array{
 *         Status?: 'DISABLED'|'ENABLED'|'ENABLED_NO_DIRECTORY_LOGIN_FALLBACK',
 *         CertificateAuthorityArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEntitlement(array $args = [])
 * @phpstan-method \Aws\Result createEntitlement(array{
 *     Name?: string,
 *     StackName?: string,
 *     Description?: string,
 *     AppVisibility?: 'ALL'|'ASSOCIATED',
 *     Attributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEntitlementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEntitlementAsync(array{
 *     Name?: string,
 *     StackName?: string,
 *     Description?: string,
 *     AppVisibility?: 'ALL'|'ASSOCIATED',
 *     Attributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExportImageTask(array $args = [])
 * @phpstan-method \Aws\Result createExportImageTask(array{
 *     ImageName?: string,
 *     AmiName?: string,
 *     IamRoleArn?: string,
 *     TagSpecifications?: array<string, string>,
 *     AmiDescription?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExportImageTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExportImageTaskAsync(array{
 *     ImageName?: string,
 *     AmiName?: string,
 *     IamRoleArn?: string,
 *     TagSpecifications?: array<string, string>,
 *     AmiDescription?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFleet(array $args = [])
 * @phpstan-method \Aws\Result createFleet(array{
 *     Name?: string,
 *     ImageName?: string,
 *     ImageArn?: string,
 *     InstanceType?: string,
 *     FleetType?: 'ALWAYS_ON'|'ELASTIC'|'ON_DEMAND',
 *     ComputeCapacity?: array{DesiredInstances?: int, DesiredSessions?: int, ...},
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     MaxUserDurationInSeconds?: int,
 *     DisconnectTimeoutInSeconds?: int,
 *     Description?: string,
 *     DisplayName?: string,
 *     EnableDefaultInternetAccess?: bool,
 *     DomainJoinInfo?: array{DirectoryName?: string, OrganizationalUnitDistinguishedName?: string, ...},
 *     Tags?: array<string, string>,
 *     IdleDisconnectTimeoutInSeconds?: int,
 *     IamRoleArn?: string,
 *     StreamView?: 'APP'|'DESKTOP',
 *     Platform?: 'AMAZON_LINUX2'|'RHEL8'|'ROCKY_LINUX8'|'UBUNTU_PRO_2404'|'WINDOWS'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025',
 *     MaxConcurrentSessions?: int,
 *     UsbDeviceFilterStrings?: list<string>,
 *     SessionScriptS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     MaxSessionsPerInstance?: int,
 *     RootVolumeConfig?: array{VolumeSizeInGb?: int, ...},
 *     DisableIMDSV1?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFleetAsync(array{
 *     Name?: string,
 *     ImageName?: string,
 *     ImageArn?: string,
 *     InstanceType?: string,
 *     FleetType?: 'ALWAYS_ON'|'ELASTIC'|'ON_DEMAND',
 *     ComputeCapacity?: array{DesiredInstances?: int, DesiredSessions?: int, ...},
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     MaxUserDurationInSeconds?: int,
 *     DisconnectTimeoutInSeconds?: int,
 *     Description?: string,
 *     DisplayName?: string,
 *     EnableDefaultInternetAccess?: bool,
 *     DomainJoinInfo?: array{DirectoryName?: string, OrganizationalUnitDistinguishedName?: string, ...},
 *     Tags?: array<string, string>,
 *     IdleDisconnectTimeoutInSeconds?: int,
 *     IamRoleArn?: string,
 *     StreamView?: 'APP'|'DESKTOP',
 *     Platform?: 'AMAZON_LINUX2'|'RHEL8'|'ROCKY_LINUX8'|'UBUNTU_PRO_2404'|'WINDOWS'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025',
 *     MaxConcurrentSessions?: int,
 *     UsbDeviceFilterStrings?: list<string>,
 *     SessionScriptS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     MaxSessionsPerInstance?: int,
 *     RootVolumeConfig?: array{VolumeSizeInGb?: int, ...},
 *     DisableIMDSV1?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createImageBuilder(array $args = [])
 * @phpstan-method \Aws\Result createImageBuilder(array{
 *     Name?: string,
 *     ImageName?: string,
 *     ImageArn?: string,
 *     InstanceType?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     IamRoleArn?: string,
 *     EnableDefaultInternetAccess?: bool,
 *     DomainJoinInfo?: array{DirectoryName?: string, OrganizationalUnitDistinguishedName?: string, ...},
 *     AppstreamAgentVersion?: string,
 *     Tags?: array<string, string>,
 *     AccessEndpoints?: list<array{EndpointType?: 'STREAMING', VpceId?: string, ...}>,
 *     RootVolumeConfig?: array{VolumeSizeInGb?: int, ...},
 *     SoftwaresToInstall?: list<string>,
 *     SoftwaresToUninstall?: list<string>,
 *     DisableIMDSV1?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImageBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImageBuilderAsync(array{
 *     Name?: string,
 *     ImageName?: string,
 *     ImageArn?: string,
 *     InstanceType?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     IamRoleArn?: string,
 *     EnableDefaultInternetAccess?: bool,
 *     DomainJoinInfo?: array{DirectoryName?: string, OrganizationalUnitDistinguishedName?: string, ...},
 *     AppstreamAgentVersion?: string,
 *     Tags?: array<string, string>,
 *     AccessEndpoints?: list<array{EndpointType?: 'STREAMING', VpceId?: string, ...}>,
 *     RootVolumeConfig?: array{VolumeSizeInGb?: int, ...},
 *     SoftwaresToInstall?: list<string>,
 *     SoftwaresToUninstall?: list<string>,
 *     DisableIMDSV1?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createImageBuilderStreamingURL(array $args = [])
 * @phpstan-method \Aws\Result createImageBuilderStreamingURL(array{Name?: string, Validity?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createImageBuilderStreamingURLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImageBuilderStreamingURLAsync(array{Name?: string, Validity?: int, ...} $args = [])
 * @method \Aws\Result createImportedImage(array $args = [])
 * @phpstan-method \Aws\Result createImportedImage(array{
 *     Name?: string,
 *     SourceAmiId?: string,
 *     WorkspaceImageId?: string,
 *     IamRoleArn?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     Tags?: array<string, string>,
 *     RuntimeValidationConfig?: array{IntendedInstanceType?: string, ...},
 *     AgentSoftwareVersion?: 'ALWAYS_LATEST'|'CURRENT_LATEST',
 *     AppCatalogConfig?: list<array{
 *         Name?: string,
 *         DisplayName?: string,
 *         AbsoluteAppPath?: string,
 *         AbsoluteIconPath?: string,
 *         AbsoluteManifestPath?: string,
 *         WorkingDirectory?: string,
 *         LaunchParameters?: string,
 *         ...,
 *     }>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImportedImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImportedImageAsync(array{
 *     Name?: string,
 *     SourceAmiId?: string,
 *     WorkspaceImageId?: string,
 *     IamRoleArn?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     Tags?: array<string, string>,
 *     RuntimeValidationConfig?: array{IntendedInstanceType?: string, ...},
 *     AgentSoftwareVersion?: 'ALWAYS_LATEST'|'CURRENT_LATEST',
 *     AppCatalogConfig?: list<array{
 *         Name?: string,
 *         DisplayName?: string,
 *         AbsoluteAppPath?: string,
 *         AbsoluteIconPath?: string,
 *         AbsoluteManifestPath?: string,
 *         WorkingDirectory?: string,
 *         LaunchParameters?: string,
 *         ...,
 *     }>,
 *     DryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStack(array $args = [])
 * @phpstan-method \Aws\Result createStack(array{
 *     Name?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     StorageConnectors?: list<array{
 *         ConnectorType?: 'GOOGLE_DRIVE'|'HOMEFOLDERS'|'ONE_DRIVE',
 *         ResourceIdentifier?: string,
 *         Domains?: list<string>,
 *         DomainsRequireAdminConsent?: list<string>,
 *         ...,
 *     }>,
 *     RedirectURL?: string,
 *     FeedbackURL?: string,
 *     UserSettings?: list<array{
 *         Action?: 'AUTO_TIME_ZONE_REDIRECTION'|'CLIPBOARD_COPY_FROM_LOCAL_DEVICE'|'CLIPBOARD_COPY_TO_LOCAL_DEVICE'|'DOMAIN_PASSWORD_SIGNIN'|'DOMAIN_SMART_CARD_SIGNIN'|'FILE_DOWNLOAD'|'FILE_UPLOAD'|'PRINTING_TO_LOCAL_DEVICE',
 *         Permission?: 'DISABLED'|'ENABLED',
 *         MaximumLength?: int,
 *         ...,
 *     }>,
 *     ApplicationSettings?: array{Enabled?: bool, SettingsGroup?: string, ...},
 *     Tags?: array<string, string>,
 *     AccessEndpoints?: list<array{EndpointType?: 'STREAMING', VpceId?: string, ...}>,
 *     EmbedHostDomains?: list<string>,
 *     StreamingExperienceSettings?: array{PreferredProtocol?: 'TCP'|'UDP', ...},
 *     ContentRedirection?: array{HostToClient?: array{Enabled?: bool, AllowedUrls?: list<string>, DeniedUrls?: list<string>, ...}, ...},
 *     AgentAccessConfig?: array{
 *         Settings?: list<array>,
 *         S3BucketArn?: string,
 *         ScreenshotsUploadEnabled?: bool,
 *         ScreenResolution?: 'W_1280xH_720',
 *         ScreenImageFormat?: 'JPEG'|'PNG',
 *         UserControlMode?: 'DISABLED'|'VIEW_ONLY'|'VIEW_STOP',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStackAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     StorageConnectors?: list<array{
 *         ConnectorType?: 'GOOGLE_DRIVE'|'HOMEFOLDERS'|'ONE_DRIVE',
 *         ResourceIdentifier?: string,
 *         Domains?: list<string>,
 *         DomainsRequireAdminConsent?: list<string>,
 *         ...,
 *     }>,
 *     RedirectURL?: string,
 *     FeedbackURL?: string,
 *     UserSettings?: list<array{
 *         Action?: 'AUTO_TIME_ZONE_REDIRECTION'|'CLIPBOARD_COPY_FROM_LOCAL_DEVICE'|'CLIPBOARD_COPY_TO_LOCAL_DEVICE'|'DOMAIN_PASSWORD_SIGNIN'|'DOMAIN_SMART_CARD_SIGNIN'|'FILE_DOWNLOAD'|'FILE_UPLOAD'|'PRINTING_TO_LOCAL_DEVICE',
 *         Permission?: 'DISABLED'|'ENABLED',
 *         MaximumLength?: int,
 *         ...,
 *     }>,
 *     ApplicationSettings?: array{Enabled?: bool, SettingsGroup?: string, ...},
 *     Tags?: array<string, string>,
 *     AccessEndpoints?: list<array{EndpointType?: 'STREAMING', VpceId?: string, ...}>,
 *     EmbedHostDomains?: list<string>,
 *     StreamingExperienceSettings?: array{PreferredProtocol?: 'TCP'|'UDP', ...},
 *     ContentRedirection?: array{HostToClient?: array{Enabled?: bool, AllowedUrls?: list<string>, DeniedUrls?: list<string>, ...}, ...},
 *     AgentAccessConfig?: array{
 *         Settings?: list<array>,
 *         S3BucketArn?: string,
 *         ScreenshotsUploadEnabled?: bool,
 *         ScreenResolution?: 'W_1280xH_720',
 *         ScreenImageFormat?: 'JPEG'|'PNG',
 *         UserControlMode?: 'DISABLED'|'VIEW_ONLY'|'VIEW_STOP',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStreamingURL(array $args = [])
 * @phpstan-method \Aws\Result createStreamingURL(array{
 *     StackName?: string,
 *     FleetName?: string,
 *     UserId?: string,
 *     ApplicationId?: string,
 *     Validity?: int,
 *     SessionContext?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamingURLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamingURLAsync(array{
 *     StackName?: string,
 *     FleetName?: string,
 *     UserId?: string,
 *     ApplicationId?: string,
 *     Validity?: int,
 *     SessionContext?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createThemeForStack(array $args = [])
 * @phpstan-method \Aws\Result createThemeForStack(array{
 *     StackName?: string,
 *     FooterLinks?: list<array{DisplayName?: string, FooterLinkURL?: string, ...}>,
 *     TitleText?: string,
 *     ThemeStyling?: 'BLUE'|'LIGHT_BLUE'|'PINK'|'RED',
 *     OrganizationLogoS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     FaviconS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThemeForStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThemeForStackAsync(array{
 *     StackName?: string,
 *     FooterLinks?: list<array{DisplayName?: string, FooterLinkURL?: string, ...}>,
 *     TitleText?: string,
 *     ThemeStyling?: 'BLUE'|'LIGHT_BLUE'|'PINK'|'RED',
 *     OrganizationLogoS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     FaviconS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUpdatedImage(array $args = [])
 * @phpstan-method \Aws\Result createUpdatedImage(array{
 *     existingImageName?: string,
 *     newImageName?: string,
 *     newImageDescription?: string,
 *     newImageDisplayName?: string,
 *     newImageTags?: array<string, string>,
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUpdatedImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUpdatedImageAsync(array{
 *     existingImageName?: string,
 *     newImageName?: string,
 *     newImageDescription?: string,
 *     newImageDisplayName?: string,
 *     newImageTags?: array<string, string>,
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUsageReportSubscription(array $args = [])
 * @phpstan-method \Aws\Result createUsageReportSubscription(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createUsageReportSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUsageReportSubscriptionAsync(array{...} $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     UserName?: string,
 *     MessageAction?: 'RESEND'|'SUPPRESS',
 *     FirstName?: string,
 *     LastName?: string,
 *     AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     UserName?: string,
 *     MessageAction?: 'RESEND'|'SUPPRESS',
 *     FirstName?: string,
 *     LastName?: string,
 *     AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAppBlock(array $args = [])
 * @phpstan-method \Aws\Result deleteAppBlock(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppBlockAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteAppBlockBuilder(array $args = [])
 * @phpstan-method \Aws\Result deleteAppBlockBuilder(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppBlockBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppBlockBuilderAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteDirectoryConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteDirectoryConfig(array{DirectoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectoryConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDirectoryConfigAsync(array{DirectoryName?: string, ...} $args = [])
 * @method \Aws\Result deleteEntitlement(array $args = [])
 * @phpstan-method \Aws\Result deleteEntitlement(array{Name?: string, StackName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEntitlementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEntitlementAsync(array{Name?: string, StackName?: string, ...} $args = [])
 * @method \Aws\Result deleteFleet(array $args = [])
 * @phpstan-method \Aws\Result deleteFleet(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFleetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteImage(array $args = [])
 * @phpstan-method \Aws\Result deleteImage(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImageAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteImageBuilder(array $args = [])
 * @phpstan-method \Aws\Result deleteImageBuilder(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImageBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImageBuilderAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteImagePermissions(array $args = [])
 * @phpstan-method \Aws\Result deleteImagePermissions(array{Name?: string, SharedAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImagePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImagePermissionsAsync(array{Name?: string, SharedAccountId?: string, ...} $args = [])
 * @method \Aws\Result deleteStack(array $args = [])
 * @phpstan-method \Aws\Result deleteStack(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStackAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteThemeForStack(array $args = [])
 * @phpstan-method \Aws\Result deleteThemeForStack(array{StackName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThemeForStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThemeForStackAsync(array{StackName?: string, ...} $args = [])
 * @method \Aws\Result deleteUsageReportSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteUsageReportSubscription(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUsageReportSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUsageReportSubscriptionAsync(array{...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{UserName?: string, AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{UserName?: string, AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL', ...} $args = [])
 * @method \Aws\Result describeAppBlockBuilderAppBlockAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeAppBlockBuilderAppBlockAssociations(array{AppBlockArn?: string, AppBlockBuilderName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppBlockBuilderAppBlockAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppBlockBuilderAppBlockAssociationsAsync(array{AppBlockArn?: string, AppBlockBuilderName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeAppBlockBuilders(array $args = [])
 * @phpstan-method \Aws\Result describeAppBlockBuilders(array{Names?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppBlockBuildersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppBlockBuildersAsync(array{Names?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeAppBlocks(array $args = [])
 * @phpstan-method \Aws\Result describeAppBlocks(array{Arns?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppBlocksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppBlocksAsync(array{Arns?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeAppLicenseUsage(array $args = [])
 * @phpstan-method \Aws\Result describeAppLicenseUsage(array{BillingPeriod?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppLicenseUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppLicenseUsageAsync(array{BillingPeriod?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeApplicationFleetAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeApplicationFleetAssociations(array{FleetName?: string, ApplicationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationFleetAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationFleetAssociationsAsync(array{FleetName?: string, ApplicationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeApplications(array $args = [])
 * @phpstan-method \Aws\Result describeApplications(array{Arns?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeApplicationsAsync(array{Arns?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeDirectoryConfigs(array $args = [])
 * @phpstan-method \Aws\Result describeDirectoryConfigs(array{DirectoryNames?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectoryConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDirectoryConfigsAsync(array{DirectoryNames?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeEntitlements(array $args = [])
 * @phpstan-method \Aws\Result describeEntitlements(array{Name?: string, StackName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntitlementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEntitlementsAsync(array{Name?: string, StackName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeFleets(array $args = [])
 * @phpstan-method \Aws\Result describeFleets(array{Names?: list<string>, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetsAsync(array{Names?: list<string>, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeImageBuilders(array $args = [])
 * @phpstan-method \Aws\Result describeImageBuilders(array{Names?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImageBuildersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImageBuildersAsync(array{Names?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeImagePermissions(array $args = [])
 * @phpstan-method \Aws\Result describeImagePermissions(array{Name?: string, MaxResults?: int, SharedAwsAccountIds?: list<string>, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImagePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImagePermissionsAsync(array{Name?: string, MaxResults?: int, SharedAwsAccountIds?: list<string>, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeImages(array $args = [])
 * @phpstan-method \Aws\Result describeImages(array{
 *     Names?: list<string>,
 *     Arns?: list<string>,
 *     Type?: 'PRIVATE'|'PUBLIC'|'SHARED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImagesAsync(array{
 *     Names?: list<string>,
 *     Arns?: list<string>,
 *     Type?: 'PRIVATE'|'PUBLIC'|'SHARED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSessions(array $args = [])
 * @phpstan-method \Aws\Result describeSessions(array{
 *     StackName?: string,
 *     FleetName?: string,
 *     UserId?: string,
 *     NextToken?: string,
 *     Limit?: int,
 *     AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL',
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSessionsAsync(array{
 *     StackName?: string,
 *     FleetName?: string,
 *     UserId?: string,
 *     NextToken?: string,
 *     Limit?: int,
 *     AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL',
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSoftwareAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeSoftwareAssociations(array{AssociatedResource?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSoftwareAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSoftwareAssociationsAsync(array{AssociatedResource?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeStacks(array $args = [])
 * @phpstan-method \Aws\Result describeStacks(array{Names?: list<string>, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStacksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStacksAsync(array{Names?: list<string>, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeThemeForStack(array $args = [])
 * @phpstan-method \Aws\Result describeThemeForStack(array{StackName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeThemeForStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeThemeForStackAsync(array{StackName?: string, ...} $args = [])
 * @method \Aws\Result describeUsageReportSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result describeUsageReportSubscriptions(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUsageReportSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUsageReportSubscriptionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeUserStackAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeUserStackAssociations(array{
 *     StackName?: string,
 *     UserName?: string,
 *     AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserStackAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserStackAssociationsAsync(array{
 *     StackName?: string,
 *     UserName?: string,
 *     AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeUsers(array $args = [])
 * @phpstan-method \Aws\Result describeUsers(array{AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUsersAsync(array{AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result disableUser(array $args = [])
 * @phpstan-method \Aws\Result disableUser(array{UserName?: string, AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableUserAsync(array{UserName?: string, AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL', ...} $args = [])
 * @method \Aws\Result disassociateAppBlockBuilderAppBlock(array $args = [])
 * @phpstan-method \Aws\Result disassociateAppBlockBuilderAppBlock(array{AppBlockArn?: string, AppBlockBuilderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAppBlockBuilderAppBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAppBlockBuilderAppBlockAsync(array{AppBlockArn?: string, AppBlockBuilderName?: string, ...} $args = [])
 * @method \Aws\Result disassociateApplicationFleet(array $args = [])
 * @phpstan-method \Aws\Result disassociateApplicationFleet(array{FleetName?: string, ApplicationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateApplicationFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateApplicationFleetAsync(array{FleetName?: string, ApplicationArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateApplicationFromEntitlement(array $args = [])
 * @phpstan-method \Aws\Result disassociateApplicationFromEntitlement(array{StackName?: string, EntitlementName?: string, ApplicationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateApplicationFromEntitlementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateApplicationFromEntitlementAsync(array{StackName?: string, EntitlementName?: string, ApplicationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result disassociateFleet(array $args = [])
 * @phpstan-method \Aws\Result disassociateFleet(array{FleetName?: string, StackName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFleetAsync(array{FleetName?: string, StackName?: string, ...} $args = [])
 * @method \Aws\Result disassociateSoftwareFromImageBuilder(array $args = [])
 * @phpstan-method \Aws\Result disassociateSoftwareFromImageBuilder(array{ImageBuilderName?: string, SoftwareNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSoftwareFromImageBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSoftwareFromImageBuilderAsync(array{ImageBuilderName?: string, SoftwareNames?: list<string>, ...} $args = [])
 * @method \Aws\Result drainSessionInstance(array $args = [])
 * @phpstan-method \Aws\Result drainSessionInstance(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise drainSessionInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise drainSessionInstanceAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result enableUser(array $args = [])
 * @phpstan-method \Aws\Result enableUser(array{UserName?: string, AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableUserAsync(array{UserName?: string, AuthenticationType?: 'API'|'AWS_AD'|'SAML'|'USERPOOL', ...} $args = [])
 * @method \Aws\Result expireSession(array $args = [])
 * @phpstan-method \Aws\Result expireSession(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise expireSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise expireSessionAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result getExportImageTask(array $args = [])
 * @phpstan-method \Aws\Result getExportImageTask(array{TaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExportImageTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportImageTaskAsync(array{TaskId?: string, ...} $args = [])
 * @method \Aws\Result listAssociatedFleets(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedFleets(array{StackName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedFleetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedFleetsAsync(array{StackName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAssociatedStacks(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedStacks(array{FleetName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedStacksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedStacksAsync(array{FleetName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listEntitledApplications(array $args = [])
 * @phpstan-method \Aws\Result listEntitledApplications(array{StackName?: string, EntitlementName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitledApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntitledApplicationsAsync(array{StackName?: string, EntitlementName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listExportImageTasks(array $args = [])
 * @phpstan-method \Aws\Result listExportImageTasks(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExportImageTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportImageTasksAsync(array{
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result startAppBlockBuilder(array $args = [])
 * @phpstan-method \Aws\Result startAppBlockBuilder(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAppBlockBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAppBlockBuilderAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result startFleet(array $args = [])
 * @phpstan-method \Aws\Result startFleet(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFleetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result startImageBuilder(array $args = [])
 * @phpstan-method \Aws\Result startImageBuilder(array{Name?: string, AppstreamAgentVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startImageBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImageBuilderAsync(array{Name?: string, AppstreamAgentVersion?: string, ...} $args = [])
 * @method \Aws\Result startSoftwareDeploymentToImageBuilder(array $args = [])
 * @phpstan-method \Aws\Result startSoftwareDeploymentToImageBuilder(array{ImageBuilderName?: string, RetryFailedDeployments?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startSoftwareDeploymentToImageBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSoftwareDeploymentToImageBuilderAsync(array{ImageBuilderName?: string, RetryFailedDeployments?: bool, ...} $args = [])
 * @method \Aws\Result stopAppBlockBuilder(array $args = [])
 * @phpstan-method \Aws\Result stopAppBlockBuilder(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAppBlockBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAppBlockBuilderAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result stopFleet(array $args = [])
 * @phpstan-method \Aws\Result stopFleet(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopFleetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result stopImageBuilder(array $args = [])
 * @phpstan-method \Aws\Result stopImageBuilder(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopImageBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopImageBuilderAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAppBlockBuilder(array $args = [])
 * @phpstan-method \Aws\Result updateAppBlockBuilder(array{
 *     Name?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     Platform?: 'AMAZON_LINUX2'|'RHEL8'|'ROCKY_LINUX8'|'UBUNTU_PRO_2404'|'WINDOWS'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025',
 *     InstanceType?: string,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     EnableDefaultInternetAccess?: bool,
 *     IamRoleArn?: string,
 *     AccessEndpoints?: list<array{EndpointType?: 'STREAMING', VpceId?: string, ...}>,
 *     AttributesToDelete?: list<'ACCESS_ENDPOINTS'|'IAM_ROLE_ARN'|'VPC_CONFIGURATION_SECURITY_GROUP_IDS'>,
 *     DisableIMDSV1?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppBlockBuilderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppBlockBuilderAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     Platform?: 'AMAZON_LINUX2'|'RHEL8'|'ROCKY_LINUX8'|'UBUNTU_PRO_2404'|'WINDOWS'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025',
 *     InstanceType?: string,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     EnableDefaultInternetAccess?: bool,
 *     IamRoleArn?: string,
 *     AccessEndpoints?: list<array{EndpointType?: 'STREAMING', VpceId?: string, ...}>,
 *     AttributesToDelete?: list<'ACCESS_ENDPOINTS'|'IAM_ROLE_ARN'|'VPC_CONFIGURATION_SECURITY_GROUP_IDS'>,
 *     DisableIMDSV1?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{
 *     Name?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     IconS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     LaunchPath?: string,
 *     WorkingDirectory?: string,
 *     LaunchParameters?: string,
 *     AppBlockArn?: string,
 *     AttributesToDelete?: list<'LAUNCH_PARAMETERS'|'WORKING_DIRECTORY'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{
 *     Name?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     IconS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     LaunchPath?: string,
 *     WorkingDirectory?: string,
 *     LaunchParameters?: string,
 *     AppBlockArn?: string,
 *     AttributesToDelete?: list<'LAUNCH_PARAMETERS'|'WORKING_DIRECTORY'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDirectoryConfig(array $args = [])
 * @phpstan-method \Aws\Result updateDirectoryConfig(array{
 *     DirectoryName?: string,
 *     OrganizationalUnitDistinguishedNames?: list<string>,
 *     ServiceAccountCredentials?: array{AccountName?: string, AccountPassword?: string, ...},
 *     CertificateBasedAuthProperties?: array{
 *         Status?: 'DISABLED'|'ENABLED'|'ENABLED_NO_DIRECTORY_LOGIN_FALLBACK',
 *         CertificateAuthorityArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDirectoryConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDirectoryConfigAsync(array{
 *     DirectoryName?: string,
 *     OrganizationalUnitDistinguishedNames?: list<string>,
 *     ServiceAccountCredentials?: array{AccountName?: string, AccountPassword?: string, ...},
 *     CertificateBasedAuthProperties?: array{
 *         Status?: 'DISABLED'|'ENABLED'|'ENABLED_NO_DIRECTORY_LOGIN_FALLBACK',
 *         CertificateAuthorityArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEntitlement(array $args = [])
 * @phpstan-method \Aws\Result updateEntitlement(array{
 *     Name?: string,
 *     StackName?: string,
 *     Description?: string,
 *     AppVisibility?: 'ALL'|'ASSOCIATED',
 *     Attributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEntitlementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEntitlementAsync(array{
 *     Name?: string,
 *     StackName?: string,
 *     Description?: string,
 *     AppVisibility?: 'ALL'|'ASSOCIATED',
 *     Attributes?: list<array{Name?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFleet(array $args = [])
 * @phpstan-method \Aws\Result updateFleet(array{
 *     ImageName?: string,
 *     ImageArn?: string,
 *     Name?: string,
 *     InstanceType?: string,
 *     ComputeCapacity?: array{DesiredInstances?: int, DesiredSessions?: int, ...},
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     MaxUserDurationInSeconds?: int,
 *     DisconnectTimeoutInSeconds?: int,
 *     DeleteVpcConfig?: bool,
 *     Description?: string,
 *     DisplayName?: string,
 *     EnableDefaultInternetAccess?: bool,
 *     DomainJoinInfo?: array{DirectoryName?: string, OrganizationalUnitDistinguishedName?: string, ...},
 *     IdleDisconnectTimeoutInSeconds?: int,
 *     AttributesToDelete?: list<'DOMAIN_JOIN_INFO'|'IAM_ROLE_ARN'|'MAX_SESSIONS_PER_INSTANCE'|'SESSION_SCRIPT_S3_LOCATION'|'USB_DEVICE_FILTER_STRINGS'|'VOLUME_CONFIGURATION'|'VPC_CONFIGURATION'|'VPC_CONFIGURATION_SECURITY_GROUP_IDS'>,
 *     IamRoleArn?: string,
 *     StreamView?: 'APP'|'DESKTOP',
 *     Platform?: 'AMAZON_LINUX2'|'RHEL8'|'ROCKY_LINUX8'|'UBUNTU_PRO_2404'|'WINDOWS'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025',
 *     MaxConcurrentSessions?: int,
 *     UsbDeviceFilterStrings?: list<string>,
 *     SessionScriptS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     MaxSessionsPerInstance?: int,
 *     RootVolumeConfig?: array{VolumeSizeInGb?: int, ...},
 *     DisableIMDSV1?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFleetAsync(array{
 *     ImageName?: string,
 *     ImageArn?: string,
 *     Name?: string,
 *     InstanceType?: string,
 *     ComputeCapacity?: array{DesiredInstances?: int, DesiredSessions?: int, ...},
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     MaxUserDurationInSeconds?: int,
 *     DisconnectTimeoutInSeconds?: int,
 *     DeleteVpcConfig?: bool,
 *     Description?: string,
 *     DisplayName?: string,
 *     EnableDefaultInternetAccess?: bool,
 *     DomainJoinInfo?: array{DirectoryName?: string, OrganizationalUnitDistinguishedName?: string, ...},
 *     IdleDisconnectTimeoutInSeconds?: int,
 *     AttributesToDelete?: list<'DOMAIN_JOIN_INFO'|'IAM_ROLE_ARN'|'MAX_SESSIONS_PER_INSTANCE'|'SESSION_SCRIPT_S3_LOCATION'|'USB_DEVICE_FILTER_STRINGS'|'VOLUME_CONFIGURATION'|'VPC_CONFIGURATION'|'VPC_CONFIGURATION_SECURITY_GROUP_IDS'>,
 *     IamRoleArn?: string,
 *     StreamView?: 'APP'|'DESKTOP',
 *     Platform?: 'AMAZON_LINUX2'|'RHEL8'|'ROCKY_LINUX8'|'UBUNTU_PRO_2404'|'WINDOWS'|'WINDOWS_SERVER_2016'|'WINDOWS_SERVER_2019'|'WINDOWS_SERVER_2022'|'WINDOWS_SERVER_2025',
 *     MaxConcurrentSessions?: int,
 *     UsbDeviceFilterStrings?: list<string>,
 *     SessionScriptS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     MaxSessionsPerInstance?: int,
 *     RootVolumeConfig?: array{VolumeSizeInGb?: int, ...},
 *     DisableIMDSV1?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateImagePermissions(array $args = [])
 * @phpstan-method \Aws\Result updateImagePermissions(array{
 *     Name?: string,
 *     SharedAccountId?: string,
 *     ImagePermissions?: array{allowFleet?: bool, allowImageBuilder?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateImagePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateImagePermissionsAsync(array{
 *     Name?: string,
 *     SharedAccountId?: string,
 *     ImagePermissions?: array{allowFleet?: bool, allowImageBuilder?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStack(array $args = [])
 * @phpstan-method \Aws\Result updateStack(array{
 *     DisplayName?: string,
 *     Description?: string,
 *     Name?: string,
 *     StorageConnectors?: list<array{
 *         ConnectorType?: 'GOOGLE_DRIVE'|'HOMEFOLDERS'|'ONE_DRIVE',
 *         ResourceIdentifier?: string,
 *         Domains?: list<string>,
 *         DomainsRequireAdminConsent?: list<string>,
 *         ...,
 *     }>,
 *     DeleteStorageConnectors?: bool,
 *     RedirectURL?: string,
 *     FeedbackURL?: string,
 *     AttributesToDelete?: list<'ACCESS_ENDPOINTS'|'AGENT_ACCESS_CONFIG'|'CONTENT_REDIRECTION'|'EMBED_HOST_DOMAINS'|'FEEDBACK_URL'|'IAM_ROLE_ARN'|'REDIRECT_URL'|'STORAGE_CONNECTORS'|'STORAGE_CONNECTOR_GOOGLE_DRIVE'|'STORAGE_CONNECTOR_HOMEFOLDERS'|'STORAGE_CONNECTOR_ONE_DRIVE'|'STREAMING_EXPERIENCE_SETTINGS'|'THEME_NAME'|'USER_SETTINGS'>,
 *     UserSettings?: list<array{
 *         Action?: 'AUTO_TIME_ZONE_REDIRECTION'|'CLIPBOARD_COPY_FROM_LOCAL_DEVICE'|'CLIPBOARD_COPY_TO_LOCAL_DEVICE'|'DOMAIN_PASSWORD_SIGNIN'|'DOMAIN_SMART_CARD_SIGNIN'|'FILE_DOWNLOAD'|'FILE_UPLOAD'|'PRINTING_TO_LOCAL_DEVICE',
 *         Permission?: 'DISABLED'|'ENABLED',
 *         MaximumLength?: int,
 *         ...,
 *     }>,
 *     ApplicationSettings?: array{Enabled?: bool, SettingsGroup?: string, ...},
 *     AccessEndpoints?: list<array{EndpointType?: 'STREAMING', VpceId?: string, ...}>,
 *     EmbedHostDomains?: list<string>,
 *     StreamingExperienceSettings?: array{PreferredProtocol?: 'TCP'|'UDP', ...},
 *     ContentRedirection?: array{HostToClient?: array{Enabled?: bool, AllowedUrls?: list<string>, DeniedUrls?: list<string>, ...}, ...},
 *     AgentAccessConfig?: array{
 *         Settings?: list<array>,
 *         S3BucketArn?: string,
 *         ScreenshotsUploadEnabled?: bool,
 *         ScreenResolution?: 'W_1280xH_720',
 *         ScreenImageFormat?: 'JPEG'|'PNG',
 *         UserControlMode?: 'DISABLED'|'VIEW_ONLY'|'VIEW_STOP',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStackAsync(array{
 *     DisplayName?: string,
 *     Description?: string,
 *     Name?: string,
 *     StorageConnectors?: list<array{
 *         ConnectorType?: 'GOOGLE_DRIVE'|'HOMEFOLDERS'|'ONE_DRIVE',
 *         ResourceIdentifier?: string,
 *         Domains?: list<string>,
 *         DomainsRequireAdminConsent?: list<string>,
 *         ...,
 *     }>,
 *     DeleteStorageConnectors?: bool,
 *     RedirectURL?: string,
 *     FeedbackURL?: string,
 *     AttributesToDelete?: list<'ACCESS_ENDPOINTS'|'AGENT_ACCESS_CONFIG'|'CONTENT_REDIRECTION'|'EMBED_HOST_DOMAINS'|'FEEDBACK_URL'|'IAM_ROLE_ARN'|'REDIRECT_URL'|'STORAGE_CONNECTORS'|'STORAGE_CONNECTOR_GOOGLE_DRIVE'|'STORAGE_CONNECTOR_HOMEFOLDERS'|'STORAGE_CONNECTOR_ONE_DRIVE'|'STREAMING_EXPERIENCE_SETTINGS'|'THEME_NAME'|'USER_SETTINGS'>,
 *     UserSettings?: list<array{
 *         Action?: 'AUTO_TIME_ZONE_REDIRECTION'|'CLIPBOARD_COPY_FROM_LOCAL_DEVICE'|'CLIPBOARD_COPY_TO_LOCAL_DEVICE'|'DOMAIN_PASSWORD_SIGNIN'|'DOMAIN_SMART_CARD_SIGNIN'|'FILE_DOWNLOAD'|'FILE_UPLOAD'|'PRINTING_TO_LOCAL_DEVICE',
 *         Permission?: 'DISABLED'|'ENABLED',
 *         MaximumLength?: int,
 *         ...,
 *     }>,
 *     ApplicationSettings?: array{Enabled?: bool, SettingsGroup?: string, ...},
 *     AccessEndpoints?: list<array{EndpointType?: 'STREAMING', VpceId?: string, ...}>,
 *     EmbedHostDomains?: list<string>,
 *     StreamingExperienceSettings?: array{PreferredProtocol?: 'TCP'|'UDP', ...},
 *     ContentRedirection?: array{HostToClient?: array{Enabled?: bool, AllowedUrls?: list<string>, DeniedUrls?: list<string>, ...}, ...},
 *     AgentAccessConfig?: array{
 *         Settings?: list<array>,
 *         S3BucketArn?: string,
 *         ScreenshotsUploadEnabled?: bool,
 *         ScreenResolution?: 'W_1280xH_720',
 *         ScreenImageFormat?: 'JPEG'|'PNG',
 *         UserControlMode?: 'DISABLED'|'VIEW_ONLY'|'VIEW_STOP',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThemeForStack(array $args = [])
 * @phpstan-method \Aws\Result updateThemeForStack(array{
 *     StackName?: string,
 *     FooterLinks?: list<array{DisplayName?: string, FooterLinkURL?: string, ...}>,
 *     TitleText?: string,
 *     ThemeStyling?: 'BLUE'|'LIGHT_BLUE'|'PINK'|'RED',
 *     OrganizationLogoS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     FaviconS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     State?: 'DISABLED'|'ENABLED',
 *     AttributesToDelete?: list<'FOOTER_LINKS'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThemeForStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThemeForStackAsync(array{
 *     StackName?: string,
 *     FooterLinks?: list<array{DisplayName?: string, FooterLinkURL?: string, ...}>,
 *     TitleText?: string,
 *     ThemeStyling?: 'BLUE'|'LIGHT_BLUE'|'PINK'|'RED',
 *     OrganizationLogoS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     FaviconS3Location?: array{S3Bucket?: string, S3Key?: string, ...},
 *     State?: 'DISABLED'|'ENABLED',
 *     AttributesToDelete?: list<'FOOTER_LINKS'>,
 *     ...,
 * } $args = [])
 */
class AppstreamClient extends AwsClient {}
