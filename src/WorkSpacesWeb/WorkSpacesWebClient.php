<?php
namespace Aws\WorkSpacesWeb;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon WorkSpaces Web** service.
 * @method \Aws\Result associateBrowserSettings(array $args = [])
 * @phpstan-method \Aws\Result associateBrowserSettings(array{portalArn?: string, browserSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateBrowserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateBrowserSettingsAsync(array{portalArn?: string, browserSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result associateDataProtectionSettings(array $args = [])
 * @phpstan-method \Aws\Result associateDataProtectionSettings(array{portalArn?: string, dataProtectionSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDataProtectionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDataProtectionSettingsAsync(array{portalArn?: string, dataProtectionSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result associateIpAccessSettings(array $args = [])
 * @phpstan-method \Aws\Result associateIpAccessSettings(array{portalArn?: string, ipAccessSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateIpAccessSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateIpAccessSettingsAsync(array{portalArn?: string, ipAccessSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result associateNetworkSettings(array $args = [])
 * @phpstan-method \Aws\Result associateNetworkSettings(array{portalArn?: string, networkSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateNetworkSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateNetworkSettingsAsync(array{portalArn?: string, networkSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result associateSessionLogger(array $args = [])
 * @phpstan-method \Aws\Result associateSessionLogger(array{portalArn?: string, sessionLoggerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSessionLoggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSessionLoggerAsync(array{portalArn?: string, sessionLoggerArn?: string, ...} $args = [])
 * @method \Aws\Result associateTrustStore(array $args = [])
 * @phpstan-method \Aws\Result associateTrustStore(array{portalArn?: string, trustStoreArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateTrustStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateTrustStoreAsync(array{portalArn?: string, trustStoreArn?: string, ...} $args = [])
 * @method \Aws\Result associateUserAccessLoggingSettings(array $args = [])
 * @phpstan-method \Aws\Result associateUserAccessLoggingSettings(array{portalArn?: string, userAccessLoggingSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateUserAccessLoggingSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateUserAccessLoggingSettingsAsync(array{portalArn?: string, userAccessLoggingSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result associateUserSettings(array $args = [])
 * @phpstan-method \Aws\Result associateUserSettings(array{portalArn?: string, userSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateUserSettingsAsync(array{portalArn?: string, userSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result createBrowserSettings(array $args = [])
 * @phpstan-method \Aws\Result createBrowserSettings(array{
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     browserPolicy?: string,
 *     clientToken?: string,
 *     webContentFilteringPolicy?: array{
 *         blockedCategories?: list<'Chat'|'CriminalActivity'|'Cults'|'DownloadSites'|'Gambling'|'Games'|'GenerativeAI'|'Hacking'|'HateAndIntolerance'|'IllegalDrug'|'IllegalSoftware'|'ImageSharing'|'InstantMessaging'|'Nudity'|'ParkedDomains'|'PeerToPeer'|'Pornography'|'ProfessionalNetwork'|'SchoolCheating'|'SelfHarm'|'SexEducation'|'SocialNetworking'|'StreamingMediaAndDownloads'|'Tasteless'|'Violence'|'Weapons'|'WebBasedEmail'>,
 *         allowedUrls?: list<string>,
 *         blockedUrls?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBrowserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBrowserSettingsAsync(array{
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     browserPolicy?: string,
 *     clientToken?: string,
 *     webContentFilteringPolicy?: array{
 *         blockedCategories?: list<'Chat'|'CriminalActivity'|'Cults'|'DownloadSites'|'Gambling'|'Games'|'GenerativeAI'|'Hacking'|'HateAndIntolerance'|'IllegalDrug'|'IllegalSoftware'|'ImageSharing'|'InstantMessaging'|'Nudity'|'ParkedDomains'|'PeerToPeer'|'Pornography'|'ProfessionalNetwork'|'SchoolCheating'|'SelfHarm'|'SexEducation'|'SocialNetworking'|'StreamingMediaAndDownloads'|'Tasteless'|'Violence'|'Weapons'|'WebBasedEmail'>,
 *         allowedUrls?: list<string>,
 *         blockedUrls?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataProtectionSettings(array $args = [])
 * @phpstan-method \Aws\Result createDataProtectionSettings(array{
 *     displayName?: string,
 *     description?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     inlineRedactionConfiguration?: array{
 *         inlineRedactionPatterns?: list<array>,
 *         globalEnforcedUrls?: list<string>,
 *         globalExemptUrls?: list<string>,
 *         globalConfidenceLevel?: int,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataProtectionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataProtectionSettingsAsync(array{
 *     displayName?: string,
 *     description?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     inlineRedactionConfiguration?: array{
 *         inlineRedactionPatterns?: list<array>,
 *         globalEnforcedUrls?: list<string>,
 *         globalExemptUrls?: list<string>,
 *         globalConfidenceLevel?: int,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result createIdentityProvider(array{
 *     portalArn?: string,
 *     identityProviderName?: string,
 *     identityProviderType?: 'Facebook'|'Google'|'LoginWithAmazon'|'OIDC'|'SAML'|'SignInWithApple',
 *     identityProviderDetails?: array<string, string>,
 *     clientToken?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIdentityProviderAsync(array{
 *     portalArn?: string,
 *     identityProviderName?: string,
 *     identityProviderType?: 'Facebook'|'Google'|'LoginWithAmazon'|'OIDC'|'SAML'|'SignInWithApple',
 *     identityProviderDetails?: array<string, string>,
 *     clientToken?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIpAccessSettings(array $args = [])
 * @phpstan-method \Aws\Result createIpAccessSettings(array{
 *     displayName?: string,
 *     description?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     ipRules?: list<array{ipRange?: string, description?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIpAccessSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIpAccessSettingsAsync(array{
 *     displayName?: string,
 *     description?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     ipRules?: list<array{ipRange?: string, description?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNetworkSettings(array $args = [])
 * @phpstan-method \Aws\Result createNetworkSettings(array{
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNetworkSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNetworkSettingsAsync(array{
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPortal(array $args = [])
 * @phpstan-method \Aws\Result createPortal(array{
 *     displayName?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     clientToken?: string,
 *     authenticationType?: 'IAM_Identity_Center'|'Standard',
 *     instanceType?: 'standard.large'|'standard.regular'|'standard.xlarge',
 *     maxConcurrentSessions?: int,
 *     portalCustomDomain?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPortalAsync(array{
 *     displayName?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     clientToken?: string,
 *     authenticationType?: 'IAM_Identity_Center'|'Standard',
 *     instanceType?: 'standard.large'|'standard.regular'|'standard.xlarge',
 *     maxConcurrentSessions?: int,
 *     portalCustomDomain?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSessionLogger(array $args = [])
 * @phpstan-method \Aws\Result createSessionLogger(array{
 *     eventFilter?: array{
 *         all?: array,
 *         include?: list<'ContentCopyFromWebsite'|'ContentPasteToWebsite'|'ContentTransferFromLocalToRemoteClipboard'|'FileDownloadFromSecureBrowserToRemoteDisk'|'FileTransferFromLocalToRemoteDisk'|'FileTransferFromRemoteToLocalDisk'|'FileUploadFromRemoteDiskToSecureBrowser'|'PrintJobSubmit'|'SessionConnect'|'SessionDisconnect'|'SessionEnd'|'SessionStart'|'TabClose'|'TabOpen'|'UrlBlockByContentFilter'|'UrlLoad'|'WebsiteInteract'>,
 *         ...,
 *     },
 *     logConfiguration?: array{
 *         s3?: array{
 *             bucket?: string,
 *             keyPrefix?: string,
 *             bucketOwner?: string,
 *             logFileFormat?: 'JSONLines'|'Json',
 *             folderStructure?: 'Flat'|'NestedByDate',
 *             ...,
 *         },
 *         ...,
 *     },
 *     displayName?: string,
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSessionLoggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSessionLoggerAsync(array{
 *     eventFilter?: array{
 *         all?: array,
 *         include?: list<'ContentCopyFromWebsite'|'ContentPasteToWebsite'|'ContentTransferFromLocalToRemoteClipboard'|'FileDownloadFromSecureBrowserToRemoteDisk'|'FileTransferFromLocalToRemoteDisk'|'FileTransferFromRemoteToLocalDisk'|'FileUploadFromRemoteDiskToSecureBrowser'|'PrintJobSubmit'|'SessionConnect'|'SessionDisconnect'|'SessionEnd'|'SessionStart'|'TabClose'|'TabOpen'|'UrlBlockByContentFilter'|'UrlLoad'|'WebsiteInteract'>,
 *         ...,
 *     },
 *     logConfiguration?: array{
 *         s3?: array{
 *             bucket?: string,
 *             keyPrefix?: string,
 *             bucketOwner?: string,
 *             logFileFormat?: 'JSONLines'|'Json',
 *             folderStructure?: 'Flat'|'NestedByDate',
 *             ...,
 *         },
 *         ...,
 *     },
 *     displayName?: string,
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrustStore(array $args = [])
 * @phpstan-method \Aws\Result createTrustStore(array{
 *     certificateList?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrustStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrustStoreAsync(array{
 *     certificateList?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserAccessLoggingSettings(array $args = [])
 * @phpstan-method \Aws\Result createUserAccessLoggingSettings(array{
 *     kinesisStreamArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAccessLoggingSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAccessLoggingSettingsAsync(array{
 *     kinesisStreamArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserSettings(array $args = [])
 * @phpstan-method \Aws\Result createUserSettings(array{
 *     copyAllowed?: 'Disabled'|'Enabled',
 *     pasteAllowed?: 'Disabled'|'Enabled',
 *     downloadAllowed?: 'Disabled'|'Enabled',
 *     uploadAllowed?: 'Disabled'|'Enabled',
 *     printAllowed?: 'Disabled'|'Enabled',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     disconnectTimeoutInMinutes?: int,
 *     idleDisconnectTimeoutInMinutes?: int,
 *     clientToken?: string,
 *     cookieSynchronizationConfiguration?: array{allowlist?: list<array>, blocklist?: list<array>, ...},
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     deepLinkAllowed?: 'Disabled'|'Enabled',
 *     toolbarConfiguration?: array{
 *         toolbarType?: 'Docked'|'Floating',
 *         visualMode?: 'Dark'|'Light',
 *         hiddenToolbarItems?: list<'DualMonitor'|'FullScreen'|'Microphone'|'Webcam'|'Windows'>,
 *         maxDisplayResolution?: 'size1024X768'|'size1280X720'|'size1920X1080'|'size2560X1440'|'size3440X1440'|'size3840X2160'|'size4096X2160'|'size800X600',
 *         ...,
 *     },
 *     brandingConfigurationInput?: array{
 *         logo?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         wallpaper?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         favicon?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         localizedStrings?: array<string, array>,
 *         colorTheme?: 'Dark'|'Light',
 *         termsOfService?: string,
 *         ...,
 *     },
 *     webAuthnAllowed?: 'Disabled'|'Enabled',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserSettingsAsync(array{
 *     copyAllowed?: 'Disabled'|'Enabled',
 *     pasteAllowed?: 'Disabled'|'Enabled',
 *     downloadAllowed?: 'Disabled'|'Enabled',
 *     uploadAllowed?: 'Disabled'|'Enabled',
 *     printAllowed?: 'Disabled'|'Enabled',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     disconnectTimeoutInMinutes?: int,
 *     idleDisconnectTimeoutInMinutes?: int,
 *     clientToken?: string,
 *     cookieSynchronizationConfiguration?: array{allowlist?: list<array>, blocklist?: list<array>, ...},
 *     customerManagedKey?: string,
 *     additionalEncryptionContext?: array<string, string>,
 *     deepLinkAllowed?: 'Disabled'|'Enabled',
 *     toolbarConfiguration?: array{
 *         toolbarType?: 'Docked'|'Floating',
 *         visualMode?: 'Dark'|'Light',
 *         hiddenToolbarItems?: list<'DualMonitor'|'FullScreen'|'Microphone'|'Webcam'|'Windows'>,
 *         maxDisplayResolution?: 'size1024X768'|'size1280X720'|'size1920X1080'|'size2560X1440'|'size3440X1440'|'size3840X2160'|'size4096X2160'|'size800X600',
 *         ...,
 *     },
 *     brandingConfigurationInput?: array{
 *         logo?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         wallpaper?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         favicon?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         localizedStrings?: array<string, array>,
 *         colorTheme?: 'Dark'|'Light',
 *         termsOfService?: string,
 *         ...,
 *     },
 *     webAuthnAllowed?: 'Disabled'|'Enabled',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBrowserSettings(array $args = [])
 * @phpstan-method \Aws\Result deleteBrowserSettings(array{browserSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBrowserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBrowserSettingsAsync(array{browserSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result deleteDataProtectionSettings(array $args = [])
 * @phpstan-method \Aws\Result deleteDataProtectionSettings(array{dataProtectionSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataProtectionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataProtectionSettingsAsync(array{dataProtectionSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result deleteIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentityProvider(array{identityProviderArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentityProviderAsync(array{identityProviderArn?: string, ...} $args = [])
 * @method \Aws\Result deleteIpAccessSettings(array $args = [])
 * @phpstan-method \Aws\Result deleteIpAccessSettings(array{ipAccessSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIpAccessSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIpAccessSettingsAsync(array{ipAccessSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result deleteNetworkSettings(array $args = [])
 * @phpstan-method \Aws\Result deleteNetworkSettings(array{networkSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNetworkSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNetworkSettingsAsync(array{networkSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result deletePortal(array $args = [])
 * @phpstan-method \Aws\Result deletePortal(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePortalAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSessionLogger(array $args = [])
 * @phpstan-method \Aws\Result deleteSessionLogger(array{sessionLoggerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSessionLoggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSessionLoggerAsync(array{sessionLoggerArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTrustStore(array $args = [])
 * @phpstan-method \Aws\Result deleteTrustStore(array{trustStoreArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrustStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrustStoreAsync(array{trustStoreArn?: string, ...} $args = [])
 * @method \Aws\Result deleteUserAccessLoggingSettings(array $args = [])
 * @phpstan-method \Aws\Result deleteUserAccessLoggingSettings(array{userAccessLoggingSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAccessLoggingSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAccessLoggingSettingsAsync(array{userAccessLoggingSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result deleteUserSettings(array $args = [])
 * @phpstan-method \Aws\Result deleteUserSettings(array{userSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserSettingsAsync(array{userSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateBrowserSettings(array $args = [])
 * @phpstan-method \Aws\Result disassociateBrowserSettings(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateBrowserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateBrowserSettingsAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateDataProtectionSettings(array $args = [])
 * @phpstan-method \Aws\Result disassociateDataProtectionSettings(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateDataProtectionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDataProtectionSettingsAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateIpAccessSettings(array $args = [])
 * @phpstan-method \Aws\Result disassociateIpAccessSettings(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateIpAccessSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateIpAccessSettingsAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateNetworkSettings(array $args = [])
 * @phpstan-method \Aws\Result disassociateNetworkSettings(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateNetworkSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateNetworkSettingsAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateSessionLogger(array $args = [])
 * @phpstan-method \Aws\Result disassociateSessionLogger(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSessionLoggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSessionLoggerAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateTrustStore(array $args = [])
 * @phpstan-method \Aws\Result disassociateTrustStore(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateTrustStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateTrustStoreAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateUserAccessLoggingSettings(array $args = [])
 * @phpstan-method \Aws\Result disassociateUserAccessLoggingSettings(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateUserAccessLoggingSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateUserAccessLoggingSettingsAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateUserSettings(array $args = [])
 * @phpstan-method \Aws\Result disassociateUserSettings(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateUserSettingsAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result expireSession(array $args = [])
 * @phpstan-method \Aws\Result expireSession(array{portalId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise expireSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise expireSessionAsync(array{portalId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getBrowserSettings(array $args = [])
 * @phpstan-method \Aws\Result getBrowserSettings(array{browserSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBrowserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBrowserSettingsAsync(array{browserSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result getDataProtectionSettings(array $args = [])
 * @phpstan-method \Aws\Result getDataProtectionSettings(array{dataProtectionSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataProtectionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataProtectionSettingsAsync(array{dataProtectionSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result getIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result getIdentityProvider(array{identityProviderArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityProviderAsync(array{identityProviderArn?: string, ...} $args = [])
 * @method \Aws\Result getIpAccessSettings(array $args = [])
 * @phpstan-method \Aws\Result getIpAccessSettings(array{ipAccessSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIpAccessSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIpAccessSettingsAsync(array{ipAccessSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result getNetworkSettings(array $args = [])
 * @phpstan-method \Aws\Result getNetworkSettings(array{networkSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkSettingsAsync(array{networkSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result getPortal(array $args = [])
 * @phpstan-method \Aws\Result getPortal(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPortalAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result getPortalServiceProviderMetadata(array $args = [])
 * @phpstan-method \Aws\Result getPortalServiceProviderMetadata(array{portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPortalServiceProviderMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPortalServiceProviderMetadataAsync(array{portalArn?: string, ...} $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{portalId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{portalId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getSessionLogger(array $args = [])
 * @phpstan-method \Aws\Result getSessionLogger(array{sessionLoggerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionLoggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionLoggerAsync(array{sessionLoggerArn?: string, ...} $args = [])
 * @method \Aws\Result getTrustStore(array $args = [])
 * @phpstan-method \Aws\Result getTrustStore(array{trustStoreArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrustStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrustStoreAsync(array{trustStoreArn?: string, ...} $args = [])
 * @method \Aws\Result getTrustStoreCertificate(array $args = [])
 * @phpstan-method \Aws\Result getTrustStoreCertificate(array{trustStoreArn?: string, thumbprint?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrustStoreCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrustStoreCertificateAsync(array{trustStoreArn?: string, thumbprint?: string, ...} $args = [])
 * @method \Aws\Result getUserAccessLoggingSettings(array $args = [])
 * @phpstan-method \Aws\Result getUserAccessLoggingSettings(array{userAccessLoggingSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAccessLoggingSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserAccessLoggingSettingsAsync(array{userAccessLoggingSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result getUserSettings(array $args = [])
 * @phpstan-method \Aws\Result getUserSettings(array{userSettingsArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserSettingsAsync(array{userSettingsArn?: string, ...} $args = [])
 * @method \Aws\Result listBrowserSettings(array $args = [])
 * @phpstan-method \Aws\Result listBrowserSettings(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBrowserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBrowserSettingsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataProtectionSettings(array $args = [])
 * @phpstan-method \Aws\Result listDataProtectionSettings(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataProtectionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataProtectionSettingsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listIdentityProviders(array $args = [])
 * @phpstan-method \Aws\Result listIdentityProviders(array{nextToken?: string, maxResults?: int, portalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentityProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentityProvidersAsync(array{nextToken?: string, maxResults?: int, portalArn?: string, ...} $args = [])
 * @method \Aws\Result listIpAccessSettings(array $args = [])
 * @phpstan-method \Aws\Result listIpAccessSettings(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIpAccessSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIpAccessSettingsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listNetworkSettings(array $args = [])
 * @phpstan-method \Aws\Result listNetworkSettings(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkSettingsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPortals(array $args = [])
 * @phpstan-method \Aws\Result listPortals(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPortalsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSessionLoggers(array $args = [])
 * @phpstan-method \Aws\Result listSessionLoggers(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionLoggersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionLoggersAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{
 *     portalId?: string,
 *     username?: string,
 *     sessionId?: string,
 *     sortBy?: 'StartTimeAscending'|'StartTimeDescending',
 *     status?: 'Active'|'Terminated',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{
 *     portalId?: string,
 *     username?: string,
 *     sessionId?: string,
 *     sortBy?: 'StartTimeAscending'|'StartTimeDescending',
 *     status?: 'Active'|'Terminated',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTrustStoreCertificates(array $args = [])
 * @phpstan-method \Aws\Result listTrustStoreCertificates(array{trustStoreArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrustStoreCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrustStoreCertificatesAsync(array{trustStoreArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTrustStores(array $args = [])
 * @phpstan-method \Aws\Result listTrustStores(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrustStoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrustStoresAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listUserAccessLoggingSettings(array $args = [])
 * @phpstan-method \Aws\Result listUserAccessLoggingSettings(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserAccessLoggingSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserAccessLoggingSettingsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listUserSettings(array $args = [])
 * @phpstan-method \Aws\Result listUserSettings(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserSettingsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBrowserSettings(array $args = [])
 * @phpstan-method \Aws\Result updateBrowserSettings(array{
 *     browserSettingsArn?: string,
 *     browserPolicy?: string,
 *     clientToken?: string,
 *     webContentFilteringPolicy?: array{
 *         blockedCategories?: list<'Chat'|'CriminalActivity'|'Cults'|'DownloadSites'|'Gambling'|'Games'|'GenerativeAI'|'Hacking'|'HateAndIntolerance'|'IllegalDrug'|'IllegalSoftware'|'ImageSharing'|'InstantMessaging'|'Nudity'|'ParkedDomains'|'PeerToPeer'|'Pornography'|'ProfessionalNetwork'|'SchoolCheating'|'SelfHarm'|'SexEducation'|'SocialNetworking'|'StreamingMediaAndDownloads'|'Tasteless'|'Violence'|'Weapons'|'WebBasedEmail'>,
 *         allowedUrls?: list<string>,
 *         blockedUrls?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrowserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrowserSettingsAsync(array{
 *     browserSettingsArn?: string,
 *     browserPolicy?: string,
 *     clientToken?: string,
 *     webContentFilteringPolicy?: array{
 *         blockedCategories?: list<'Chat'|'CriminalActivity'|'Cults'|'DownloadSites'|'Gambling'|'Games'|'GenerativeAI'|'Hacking'|'HateAndIntolerance'|'IllegalDrug'|'IllegalSoftware'|'ImageSharing'|'InstantMessaging'|'Nudity'|'ParkedDomains'|'PeerToPeer'|'Pornography'|'ProfessionalNetwork'|'SchoolCheating'|'SelfHarm'|'SexEducation'|'SocialNetworking'|'StreamingMediaAndDownloads'|'Tasteless'|'Violence'|'Weapons'|'WebBasedEmail'>,
 *         allowedUrls?: list<string>,
 *         blockedUrls?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataProtectionSettings(array $args = [])
 * @phpstan-method \Aws\Result updateDataProtectionSettings(array{
 *     dataProtectionSettingsArn?: string,
 *     inlineRedactionConfiguration?: array{
 *         inlineRedactionPatterns?: list<array>,
 *         globalEnforcedUrls?: list<string>,
 *         globalExemptUrls?: list<string>,
 *         globalConfidenceLevel?: int,
 *         ...,
 *     },
 *     displayName?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataProtectionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataProtectionSettingsAsync(array{
 *     dataProtectionSettingsArn?: string,
 *     inlineRedactionConfiguration?: array{
 *         inlineRedactionPatterns?: list<array>,
 *         globalEnforcedUrls?: list<string>,
 *         globalExemptUrls?: list<string>,
 *         globalConfidenceLevel?: int,
 *         ...,
 *     },
 *     displayName?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIdentityProvider(array $args = [])
 * @phpstan-method \Aws\Result updateIdentityProvider(array{
 *     identityProviderArn?: string,
 *     identityProviderName?: string,
 *     identityProviderType?: 'Facebook'|'Google'|'LoginWithAmazon'|'OIDC'|'SAML'|'SignInWithApple',
 *     identityProviderDetails?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIdentityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIdentityProviderAsync(array{
 *     identityProviderArn?: string,
 *     identityProviderName?: string,
 *     identityProviderType?: 'Facebook'|'Google'|'LoginWithAmazon'|'OIDC'|'SAML'|'SignInWithApple',
 *     identityProviderDetails?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIpAccessSettings(array $args = [])
 * @phpstan-method \Aws\Result updateIpAccessSettings(array{
 *     ipAccessSettingsArn?: string,
 *     displayName?: string,
 *     description?: string,
 *     ipRules?: list<array{ipRange?: string, description?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIpAccessSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIpAccessSettingsAsync(array{
 *     ipAccessSettingsArn?: string,
 *     displayName?: string,
 *     description?: string,
 *     ipRules?: list<array{ipRange?: string, description?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNetworkSettings(array $args = [])
 * @phpstan-method \Aws\Result updateNetworkSettings(array{
 *     networkSettingsArn?: string,
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkSettingsAsync(array{
 *     networkSettingsArn?: string,
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePortal(array $args = [])
 * @phpstan-method \Aws\Result updatePortal(array{
 *     portalArn?: string,
 *     displayName?: string,
 *     authenticationType?: 'IAM_Identity_Center'|'Standard',
 *     instanceType?: 'standard.large'|'standard.regular'|'standard.xlarge',
 *     maxConcurrentSessions?: int,
 *     portalCustomDomain?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePortalAsync(array{
 *     portalArn?: string,
 *     displayName?: string,
 *     authenticationType?: 'IAM_Identity_Center'|'Standard',
 *     instanceType?: 'standard.large'|'standard.regular'|'standard.xlarge',
 *     maxConcurrentSessions?: int,
 *     portalCustomDomain?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSessionLogger(array $args = [])
 * @phpstan-method \Aws\Result updateSessionLogger(array{
 *     sessionLoggerArn?: string,
 *     eventFilter?: array{
 *         all?: array,
 *         include?: list<'ContentCopyFromWebsite'|'ContentPasteToWebsite'|'ContentTransferFromLocalToRemoteClipboard'|'FileDownloadFromSecureBrowserToRemoteDisk'|'FileTransferFromLocalToRemoteDisk'|'FileTransferFromRemoteToLocalDisk'|'FileUploadFromRemoteDiskToSecureBrowser'|'PrintJobSubmit'|'SessionConnect'|'SessionDisconnect'|'SessionEnd'|'SessionStart'|'TabClose'|'TabOpen'|'UrlBlockByContentFilter'|'UrlLoad'|'WebsiteInteract'>,
 *         ...,
 *     },
 *     logConfiguration?: array{
 *         s3?: array{
 *             bucket?: string,
 *             keyPrefix?: string,
 *             bucketOwner?: string,
 *             logFileFormat?: 'JSONLines'|'Json',
 *             folderStructure?: 'Flat'|'NestedByDate',
 *             ...,
 *         },
 *         ...,
 *     },
 *     displayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSessionLoggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSessionLoggerAsync(array{
 *     sessionLoggerArn?: string,
 *     eventFilter?: array{
 *         all?: array,
 *         include?: list<'ContentCopyFromWebsite'|'ContentPasteToWebsite'|'ContentTransferFromLocalToRemoteClipboard'|'FileDownloadFromSecureBrowserToRemoteDisk'|'FileTransferFromLocalToRemoteDisk'|'FileTransferFromRemoteToLocalDisk'|'FileUploadFromRemoteDiskToSecureBrowser'|'PrintJobSubmit'|'SessionConnect'|'SessionDisconnect'|'SessionEnd'|'SessionStart'|'TabClose'|'TabOpen'|'UrlBlockByContentFilter'|'UrlLoad'|'WebsiteInteract'>,
 *         ...,
 *     },
 *     logConfiguration?: array{
 *         s3?: array{
 *             bucket?: string,
 *             keyPrefix?: string,
 *             bucketOwner?: string,
 *             logFileFormat?: 'JSONLines'|'Json',
 *             folderStructure?: 'Flat'|'NestedByDate',
 *             ...,
 *         },
 *         ...,
 *     },
 *     displayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrustStore(array $args = [])
 * @phpstan-method \Aws\Result updateTrustStore(array{
 *     trustStoreArn?: string,
 *     certificatesToAdd?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *     certificatesToDelete?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrustStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrustStoreAsync(array{
 *     trustStoreArn?: string,
 *     certificatesToAdd?: list<string|resource|\Psr\Http\Message\StreamInterface>,
 *     certificatesToDelete?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserAccessLoggingSettings(array $args = [])
 * @phpstan-method \Aws\Result updateUserAccessLoggingSettings(array{userAccessLoggingSettingsArn?: string, kinesisStreamArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAccessLoggingSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAccessLoggingSettingsAsync(array{userAccessLoggingSettingsArn?: string, kinesisStreamArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateUserSettings(array $args = [])
 * @phpstan-method \Aws\Result updateUserSettings(array{
 *     userSettingsArn?: string,
 *     copyAllowed?: 'Disabled'|'Enabled',
 *     pasteAllowed?: 'Disabled'|'Enabled',
 *     downloadAllowed?: 'Disabled'|'Enabled',
 *     uploadAllowed?: 'Disabled'|'Enabled',
 *     printAllowed?: 'Disabled'|'Enabled',
 *     disconnectTimeoutInMinutes?: int,
 *     idleDisconnectTimeoutInMinutes?: int,
 *     clientToken?: string,
 *     cookieSynchronizationConfiguration?: array{allowlist?: list<array>, blocklist?: list<array>, ...},
 *     deepLinkAllowed?: 'Disabled'|'Enabled',
 *     toolbarConfiguration?: array{
 *         toolbarType?: 'Docked'|'Floating',
 *         visualMode?: 'Dark'|'Light',
 *         hiddenToolbarItems?: list<'DualMonitor'|'FullScreen'|'Microphone'|'Webcam'|'Windows'>,
 *         maxDisplayResolution?: 'size1024X768'|'size1280X720'|'size1920X1080'|'size2560X1440'|'size3440X1440'|'size3840X2160'|'size4096X2160'|'size800X600',
 *         ...,
 *     },
 *     brandingConfigurationInput?: array{
 *         logo?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         wallpaper?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         favicon?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         localizedStrings?: array<string, array>,
 *         colorTheme?: 'Dark'|'Light',
 *         termsOfService?: string,
 *         ...,
 *     },
 *     webAuthnAllowed?: 'Disabled'|'Enabled',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserSettingsAsync(array{
 *     userSettingsArn?: string,
 *     copyAllowed?: 'Disabled'|'Enabled',
 *     pasteAllowed?: 'Disabled'|'Enabled',
 *     downloadAllowed?: 'Disabled'|'Enabled',
 *     uploadAllowed?: 'Disabled'|'Enabled',
 *     printAllowed?: 'Disabled'|'Enabled',
 *     disconnectTimeoutInMinutes?: int,
 *     idleDisconnectTimeoutInMinutes?: int,
 *     clientToken?: string,
 *     cookieSynchronizationConfiguration?: array{allowlist?: list<array>, blocklist?: list<array>, ...},
 *     deepLinkAllowed?: 'Disabled'|'Enabled',
 *     toolbarConfiguration?: array{
 *         toolbarType?: 'Docked'|'Floating',
 *         visualMode?: 'Dark'|'Light',
 *         hiddenToolbarItems?: list<'DualMonitor'|'FullScreen'|'Microphone'|'Webcam'|'Windows'>,
 *         maxDisplayResolution?: 'size1024X768'|'size1280X720'|'size1920X1080'|'size2560X1440'|'size3440X1440'|'size3840X2160'|'size4096X2160'|'size800X600',
 *         ...,
 *     },
 *     brandingConfigurationInput?: array{
 *         logo?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         wallpaper?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         favicon?: array{blob?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *         localizedStrings?: array<string, array>,
 *         colorTheme?: 'Dark'|'Light',
 *         termsOfService?: string,
 *         ...,
 *     },
 *     webAuthnAllowed?: 'Disabled'|'Enabled',
 *     ...,
 * } $args = [])
 */
class WorkSpacesWebClient extends AwsClient {}
