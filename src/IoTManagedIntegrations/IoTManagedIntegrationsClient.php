<?php
namespace Aws\IoTManagedIntegrations;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Managed integrations for AWS IoT Device Management** service.
 * @method \Aws\Result createAccountAssociation(array $args = [])
 * @phpstan-method \Aws\Result createAccountAssociation(array{
 *     ClientToken?: string,
 *     ConnectorDestinationId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     GeneralAuthorization?: array{AuthMaterialName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccountAssociationAsync(array{
 *     ClientToken?: string,
 *     ConnectorDestinationId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     GeneralAuthorization?: array{AuthMaterialName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCloudConnector(array $args = [])
 * @phpstan-method \Aws\Result createCloudConnector(array{
 *     Name?: string,
 *     EndpointConfig?: array{lambda?: array{arn?: string, ...}, ...},
 *     Description?: string,
 *     EndpointType?: 'LAMBDA',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudConnectorAsync(array{
 *     Name?: string,
 *     EndpointConfig?: array{lambda?: array{arn?: string, ...}, ...},
 *     Description?: string,
 *     EndpointType?: 'LAMBDA',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnectorDestination(array $args = [])
 * @phpstan-method \Aws\Result createConnectorDestination(array{
 *     Name?: string,
 *     Description?: string,
 *     CloudConnectorId?: string,
 *     AuthType?: 'OAUTH',
 *     AuthConfig?: array{
 *         oAuth?: array{
 *             authUrl?: string,
 *             tokenUrl?: string,
 *             scope?: string,
 *             tokenEndpointAuthenticationScheme?: 'HTTP_BASIC'|'REQUEST_BODY_CREDENTIALS',
 *             oAuthCompleteRedirectUrl?: string,
 *             proactiveRefreshTokenRenewal?: array,
 *             ...,
 *         },
 *         GeneralAuthorization?: list<array>,
 *         ...,
 *     },
 *     SecretsManager?: array{arn?: string, versionId?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorDestinationAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     CloudConnectorId?: string,
 *     AuthType?: 'OAUTH',
 *     AuthConfig?: array{
 *         oAuth?: array{
 *             authUrl?: string,
 *             tokenUrl?: string,
 *             scope?: string,
 *             tokenEndpointAuthenticationScheme?: 'HTTP_BASIC'|'REQUEST_BODY_CREDENTIALS',
 *             oAuthCompleteRedirectUrl?: string,
 *             proactiveRefreshTokenRenewal?: array,
 *             ...,
 *         },
 *         GeneralAuthorization?: list<array>,
 *         ...,
 *     },
 *     SecretsManager?: array{arn?: string, versionId?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCredentialLocker(array $args = [])
 * @phpstan-method \Aws\Result createCredentialLocker(array{Name?: string, ClientToken?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCredentialLockerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCredentialLockerAsync(array{Name?: string, ClientToken?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createDestination(array $args = [])
 * @phpstan-method \Aws\Result createDestination(array{
 *     DeliveryDestinationArn?: string,
 *     DeliveryDestinationType?: 'KINESIS',
 *     Name?: string,
 *     RoleArn?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDestinationAsync(array{
 *     DeliveryDestinationArn?: string,
 *     DeliveryDestinationType?: 'KINESIS',
 *     Name?: string,
 *     RoleArn?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventLogConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createEventLogConfiguration(array{
 *     ResourceType?: string,
 *     ResourceId?: string,
 *     EventLogLevel?: 'DEBUG'|'ERROR'|'INFO'|'WARN',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventLogConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventLogConfigurationAsync(array{
 *     ResourceType?: string,
 *     ResourceId?: string,
 *     EventLogLevel?: 'DEBUG'|'ERROR'|'INFO'|'WARN',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createManagedThing(array $args = [])
 * @phpstan-method \Aws\Result createManagedThing(array{
 *     Role?: 'CONTROLLER'|'DEVICE',
 *     Owner?: string,
 *     CredentialLockerId?: string,
 *     AuthenticationMaterial?: string,
 *     AuthenticationMaterialType?: 'CUSTOM_PROTOCOL_QR_BAR_CODE'|'DISCOVERED_DEVICE'|'PRE_ONBOARDED_CLOUD'|'WIFI_SETUP_QR_BAR_CODE'|'ZIGBEE_QR_BAR_CODE'|'ZWAVE_QR_BAR_CODE',
 *     WiFiSimpleSetupConfiguration?: array{EnableAsProvisioner?: bool, EnableAsProvisionee?: bool, TimeoutInMinutes?: int, ...},
 *     SerialNumber?: string,
 *     Brand?: string,
 *     Model?: string,
 *     Name?: string,
 *     CapabilityReport?: array{version?: string, nodeId?: string, endpoints?: list<array>, ...},
 *     CapabilitySchemas?: list<array{
 *         Format?: 'AWS'|'CONNECTOR'|'ZCL',
 *         CapabilityId?: string,
 *         ExtrinsicId?: string,
 *         ExtrinsicVersion?: int,
 *         Schema?: array,
 *         ...,
 *     }>,
 *     Capabilities?: string,
 *     ClientToken?: string,
 *     Classification?: string,
 *     Tags?: array<string, string>,
 *     MetaData?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createManagedThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createManagedThingAsync(array{
 *     Role?: 'CONTROLLER'|'DEVICE',
 *     Owner?: string,
 *     CredentialLockerId?: string,
 *     AuthenticationMaterial?: string,
 *     AuthenticationMaterialType?: 'CUSTOM_PROTOCOL_QR_BAR_CODE'|'DISCOVERED_DEVICE'|'PRE_ONBOARDED_CLOUD'|'WIFI_SETUP_QR_BAR_CODE'|'ZIGBEE_QR_BAR_CODE'|'ZWAVE_QR_BAR_CODE',
 *     WiFiSimpleSetupConfiguration?: array{EnableAsProvisioner?: bool, EnableAsProvisionee?: bool, TimeoutInMinutes?: int, ...},
 *     SerialNumber?: string,
 *     Brand?: string,
 *     Model?: string,
 *     Name?: string,
 *     CapabilityReport?: array{version?: string, nodeId?: string, endpoints?: list<array>, ...},
 *     CapabilitySchemas?: list<array{
 *         Format?: 'AWS'|'CONNECTOR'|'ZCL',
 *         CapabilityId?: string,
 *         ExtrinsicId?: string,
 *         ExtrinsicVersion?: int,
 *         Schema?: array,
 *         ...,
 *     }>,
 *     Capabilities?: string,
 *     ClientToken?: string,
 *     Classification?: string,
 *     Tags?: array<string, string>,
 *     MetaData?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createNotificationConfiguration(array{
 *     EventType?: 'ACCOUNT_ASSOCIATION'|'CONNECTOR_ASSOCIATION'|'CONNECTOR_ERROR_REPORT'|'DEVICE_COMMAND'|'DEVICE_COMMAND_REQUEST'|'DEVICE_DISCOVERY_STATUS'|'DEVICE_EVENT'|'DEVICE_LIFE_CYCLE'|'DEVICE_OTA'|'DEVICE_STATE'|'DEVICE_WSS',
 *     DestinationName?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotificationConfigurationAsync(array{
 *     EventType?: 'ACCOUNT_ASSOCIATION'|'CONNECTOR_ASSOCIATION'|'CONNECTOR_ERROR_REPORT'|'DEVICE_COMMAND'|'DEVICE_COMMAND_REQUEST'|'DEVICE_DISCOVERY_STATUS'|'DEVICE_EVENT'|'DEVICE_LIFE_CYCLE'|'DEVICE_OTA'|'DEVICE_STATE'|'DEVICE_WSS',
 *     DestinationName?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOtaTask(array $args = [])
 * @phpstan-method \Aws\Result createOtaTask(array{
 *     Description?: string,
 *     S3Url?: string,
 *     Protocol?: 'HTTP',
 *     Target?: list<string>,
 *     TaskConfigurationId?: string,
 *     OtaMechanism?: 'PUSH',
 *     OtaType?: 'CONTINUOUS'|'ONE_TIME',
 *     OtaTargetQueryString?: string,
 *     ClientToken?: string,
 *     OtaSchedulingConfig?: array{
 *         EndBehavior?: 'CANCEL'|'FORCE_CANCEL'|'STOP_ROLLOUT',
 *         EndTime?: string,
 *         MaintenanceWindows?: list<array>,
 *         StartTime?: string,
 *         ...,
 *     },
 *     OtaTaskExecutionRetryConfig?: array{RetryConfigCriteria?: list<array>, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOtaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOtaTaskAsync(array{
 *     Description?: string,
 *     S3Url?: string,
 *     Protocol?: 'HTTP',
 *     Target?: list<string>,
 *     TaskConfigurationId?: string,
 *     OtaMechanism?: 'PUSH',
 *     OtaType?: 'CONTINUOUS'|'ONE_TIME',
 *     OtaTargetQueryString?: string,
 *     ClientToken?: string,
 *     OtaSchedulingConfig?: array{
 *         EndBehavior?: 'CANCEL'|'FORCE_CANCEL'|'STOP_ROLLOUT',
 *         EndTime?: string,
 *         MaintenanceWindows?: list<array>,
 *         StartTime?: string,
 *         ...,
 *     },
 *     OtaTaskExecutionRetryConfig?: array{RetryConfigCriteria?: list<array>, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOtaTaskConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createOtaTaskConfiguration(array{
 *     Description?: string,
 *     Name?: string,
 *     PushConfig?: array{
 *         AbortConfig?: array{AbortConfigCriteriaList?: list<array>, ...},
 *         RolloutConfig?: array{ExponentialRolloutRate?: array, MaximumPerMinute?: int, ...},
 *         TimeoutConfig?: array{InProgressTimeoutInMinutes?: int, ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOtaTaskConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOtaTaskConfigurationAsync(array{
 *     Description?: string,
 *     Name?: string,
 *     PushConfig?: array{
 *         AbortConfig?: array{AbortConfigCriteriaList?: list<array>, ...},
 *         RolloutConfig?: array{ExponentialRolloutRate?: array, MaximumPerMinute?: int, ...},
 *         TimeoutConfig?: array{InProgressTimeoutInMinutes?: int, ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProvisioningProfile(array $args = [])
 * @phpstan-method \Aws\Result createProvisioningProfile(array{
 *     ProvisioningType?: 'FLEET_PROVISIONING'|'JITR',
 *     CaCertificate?: string,
 *     ClaimCertificate?: string,
 *     Name?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProvisioningProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProvisioningProfileAsync(array{
 *     ProvisioningType?: 'FLEET_PROVISIONING'|'JITR',
 *     CaCertificate?: string,
 *     ClaimCertificate?: string,
 *     Name?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccountAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountAssociation(array{AccountAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountAssociationAsync(array{AccountAssociationId?: string, ...} $args = [])
 * @method \Aws\Result deleteCloudConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteCloudConnector(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCloudConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCloudConnectorAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteConnectorDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectorDestination(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectorDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorDestinationAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteCredentialLocker(array $args = [])
 * @phpstan-method \Aws\Result deleteCredentialLocker(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCredentialLockerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCredentialLockerAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteDestination(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDestinationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteEventLogConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteEventLogConfiguration(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventLogConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventLogConfigurationAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteManagedThing(array $args = [])
 * @phpstan-method \Aws\Result deleteManagedThing(array{Identifier?: string, Force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteManagedThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteManagedThingAsync(array{Identifier?: string, Force?: bool, ...} $args = [])
 * @method \Aws\Result deleteNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteNotificationConfiguration(array{
 *     EventType?: 'ACCOUNT_ASSOCIATION'|'CONNECTOR_ASSOCIATION'|'CONNECTOR_ERROR_REPORT'|'DEVICE_COMMAND'|'DEVICE_COMMAND_REQUEST'|'DEVICE_DISCOVERY_STATUS'|'DEVICE_EVENT'|'DEVICE_LIFE_CYCLE'|'DEVICE_OTA'|'DEVICE_STATE'|'DEVICE_WSS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotificationConfigurationAsync(array{
 *     EventType?: 'ACCOUNT_ASSOCIATION'|'CONNECTOR_ASSOCIATION'|'CONNECTOR_ERROR_REPORT'|'DEVICE_COMMAND'|'DEVICE_COMMAND_REQUEST'|'DEVICE_DISCOVERY_STATUS'|'DEVICE_EVENT'|'DEVICE_LIFE_CYCLE'|'DEVICE_OTA'|'DEVICE_STATE'|'DEVICE_WSS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteOtaTask(array $args = [])
 * @phpstan-method \Aws\Result deleteOtaTask(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOtaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOtaTaskAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteOtaTaskConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteOtaTaskConfiguration(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOtaTaskConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOtaTaskConfigurationAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteProvisioningProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteProvisioningProfile(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProvisioningProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProvisioningProfileAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deregisterAccountAssociation(array $args = [])
 * @phpstan-method \Aws\Result deregisterAccountAssociation(array{ManagedThingId?: string, AccountAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterAccountAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterAccountAssociationAsync(array{ManagedThingId?: string, AccountAssociationId?: string, ...} $args = [])
 * @method \Aws\Result getAccountAssociation(array $args = [])
 * @phpstan-method \Aws\Result getAccountAssociation(array{AccountAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountAssociationAsync(array{AccountAssociationId?: string, ...} $args = [])
 * @method \Aws\Result getCloudConnector(array $args = [])
 * @phpstan-method \Aws\Result getCloudConnector(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudConnectorAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getConnectorDestination(array $args = [])
 * @phpstan-method \Aws\Result getConnectorDestination(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectorDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectorDestinationAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getCredentialLocker(array $args = [])
 * @phpstan-method \Aws\Result getCredentialLocker(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCredentialLockerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCredentialLockerAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getCustomEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getCustomEndpoint(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCustomEndpointAsync(array{...} $args = [])
 * @method \Aws\Result getDefaultEncryptionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getDefaultEncryptionConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDefaultEncryptionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDefaultEncryptionConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getDestination(array $args = [])
 * @phpstan-method \Aws\Result getDestination(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDestinationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getDeviceDiscovery(array $args = [])
 * @phpstan-method \Aws\Result getDeviceDiscovery(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceDiscoveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceDiscoveryAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getEventLogConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getEventLogConfiguration(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventLogConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventLogConfigurationAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getHubConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getHubConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHubConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHubConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getManagedThing(array $args = [])
 * @phpstan-method \Aws\Result getManagedThing(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedThingAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getManagedThingCapabilities(array $args = [])
 * @phpstan-method \Aws\Result getManagedThingCapabilities(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedThingCapabilitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedThingCapabilitiesAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getManagedThingCertificate(array $args = [])
 * @phpstan-method \Aws\Result getManagedThingCertificate(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedThingCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedThingCertificateAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getManagedThingConnectivityData(array $args = [])
 * @phpstan-method \Aws\Result getManagedThingConnectivityData(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedThingConnectivityDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedThingConnectivityDataAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getManagedThingMetaData(array $args = [])
 * @phpstan-method \Aws\Result getManagedThingMetaData(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedThingMetaDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedThingMetaDataAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getManagedThingState(array $args = [])
 * @phpstan-method \Aws\Result getManagedThingState(array{ManagedThingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedThingStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedThingStateAsync(array{ManagedThingId?: string, ...} $args = [])
 * @method \Aws\Result getNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getNotificationConfiguration(array{
 *     EventType?: 'ACCOUNT_ASSOCIATION'|'CONNECTOR_ASSOCIATION'|'CONNECTOR_ERROR_REPORT'|'DEVICE_COMMAND'|'DEVICE_COMMAND_REQUEST'|'DEVICE_DISCOVERY_STATUS'|'DEVICE_EVENT'|'DEVICE_LIFE_CYCLE'|'DEVICE_OTA'|'DEVICE_STATE'|'DEVICE_WSS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotificationConfigurationAsync(array{
 *     EventType?: 'ACCOUNT_ASSOCIATION'|'CONNECTOR_ASSOCIATION'|'CONNECTOR_ERROR_REPORT'|'DEVICE_COMMAND'|'DEVICE_COMMAND_REQUEST'|'DEVICE_DISCOVERY_STATUS'|'DEVICE_EVENT'|'DEVICE_LIFE_CYCLE'|'DEVICE_OTA'|'DEVICE_STATE'|'DEVICE_WSS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getOtaTask(array $args = [])
 * @phpstan-method \Aws\Result getOtaTask(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOtaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOtaTaskAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getOtaTaskConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getOtaTaskConfiguration(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOtaTaskConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOtaTaskConfigurationAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getProvisioningProfile(array $args = [])
 * @phpstan-method \Aws\Result getProvisioningProfile(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProvisioningProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProvisioningProfileAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getRuntimeLogConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getRuntimeLogConfiguration(array{ManagedThingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuntimeLogConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuntimeLogConfigurationAsync(array{ManagedThingId?: string, ...} $args = [])
 * @method \Aws\Result getSchemaVersion(array $args = [])
 * @phpstan-method \Aws\Result getSchemaVersion(array{Type?: 'capability'|'definition', SchemaVersionedId?: string, Format?: 'AWS'|'CONNECTOR'|'ZCL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSchemaVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaVersionAsync(array{Type?: 'capability'|'definition', SchemaVersionedId?: string, Format?: 'AWS'|'CONNECTOR'|'ZCL', ...} $args = [])
 * @method \Aws\Result listAccountAssociations(array $args = [])
 * @phpstan-method \Aws\Result listAccountAssociations(array{ConnectorDestinationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountAssociationsAsync(array{ConnectorDestinationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCloudConnectors(array $args = [])
 * @phpstan-method \Aws\Result listCloudConnectors(array{Type?: 'LISTED'|'UNLISTED', LambdaArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCloudConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCloudConnectorsAsync(array{Type?: 'LISTED'|'UNLISTED', LambdaArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConnectorDestinations(array $args = [])
 * @phpstan-method \Aws\Result listConnectorDestinations(array{CloudConnectorId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorDestinationsAsync(array{CloudConnectorId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listCredentialLockers(array $args = [])
 * @phpstan-method \Aws\Result listCredentialLockers(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCredentialLockersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCredentialLockersAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDestinations(array $args = [])
 * @phpstan-method \Aws\Result listDestinations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDestinationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDeviceDiscoveries(array $args = [])
 * @phpstan-method \Aws\Result listDeviceDiscoveries(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     TypeFilter?: 'CLOUD'|'CONTROLLER_CAPABILITY_REDISCOVERY'|'CUSTOM'|'ZIGBEE'|'ZWAVE',
 *     StatusFilter?: 'FAILED'|'RUNNING'|'SUCCEEDED'|'TIMED_OUT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeviceDiscoveriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeviceDiscoveriesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     TypeFilter?: 'CLOUD'|'CONTROLLER_CAPABILITY_REDISCOVERY'|'CUSTOM'|'ZIGBEE'|'ZWAVE',
 *     StatusFilter?: 'FAILED'|'RUNNING'|'SUCCEEDED'|'TIMED_OUT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDiscoveredDevices(array $args = [])
 * @phpstan-method \Aws\Result listDiscoveredDevices(array{Identifier?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDiscoveredDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDiscoveredDevicesAsync(array{Identifier?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEventLogConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listEventLogConfigurations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventLogConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventLogConfigurationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listManagedThingAccountAssociations(array $args = [])
 * @phpstan-method \Aws\Result listManagedThingAccountAssociations(array{ManagedThingId?: string, AccountAssociationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedThingAccountAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedThingAccountAssociationsAsync(array{ManagedThingId?: string, AccountAssociationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listManagedThingSchemas(array $args = [])
 * @phpstan-method \Aws\Result listManagedThingSchemas(array{
 *     Identifier?: string,
 *     EndpointIdFilter?: string,
 *     CapabilityIdFilter?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedThingSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedThingSchemasAsync(array{
 *     Identifier?: string,
 *     EndpointIdFilter?: string,
 *     CapabilityIdFilter?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listManagedThings(array $args = [])
 * @phpstan-method \Aws\Result listManagedThings(array{
 *     OwnerFilter?: string,
 *     CredentialLockerFilter?: string,
 *     RoleFilter?: 'CONTROLLER'|'DEVICE',
 *     ParentControllerIdentifierFilter?: string,
 *     ConnectorPolicyIdFilter?: string,
 *     ConnectorDestinationIdFilter?: string,
 *     ConnectorDeviceIdFilter?: string,
 *     SerialNumberFilter?: string,
 *     ProvisioningStatusFilter?: 'ACTIVATED'|'DELETED'|'DELETE_IN_PROGRESS'|'DELETION_FAILED'|'DISCOVERED'|'ISOLATED'|'PRE_ASSOCIATED'|'UNASSOCIATED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedThingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedThingsAsync(array{
 *     OwnerFilter?: string,
 *     CredentialLockerFilter?: string,
 *     RoleFilter?: 'CONTROLLER'|'DEVICE',
 *     ParentControllerIdentifierFilter?: string,
 *     ConnectorPolicyIdFilter?: string,
 *     ConnectorDestinationIdFilter?: string,
 *     ConnectorDeviceIdFilter?: string,
 *     SerialNumberFilter?: string,
 *     ProvisioningStatusFilter?: 'ACTIVATED'|'DELETED'|'DELETE_IN_PROGRESS'|'DELETION_FAILED'|'DISCOVERED'|'ISOLATED'|'PRE_ASSOCIATED'|'UNASSOCIATED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotificationConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listNotificationConfigurations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotificationConfigurationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listOtaTaskConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listOtaTaskConfigurations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOtaTaskConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOtaTaskConfigurationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listOtaTaskExecutions(array $args = [])
 * @phpstan-method \Aws\Result listOtaTaskExecutions(array{Identifier?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOtaTaskExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOtaTaskExecutionsAsync(array{Identifier?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listOtaTasks(array $args = [])
 * @phpstan-method \Aws\Result listOtaTasks(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOtaTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOtaTasksAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listProvisioningProfiles(array $args = [])
 * @phpstan-method \Aws\Result listProvisioningProfiles(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProvisioningProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProvisioningProfilesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSchemaVersions(array $args = [])
 * @phpstan-method \Aws\Result listSchemaVersions(array{
 *     Type?: 'capability'|'definition',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SchemaId?: string,
 *     Namespace?: string,
 *     Visibility?: 'PRIVATE'|'PUBLIC',
 *     SemanticVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchemaVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchemaVersionsAsync(array{
 *     Type?: 'capability'|'definition',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SchemaId?: string,
 *     Namespace?: string,
 *     Visibility?: 'PRIVATE'|'PUBLIC',
 *     SemanticVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putDefaultEncryptionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putDefaultEncryptionConfiguration(array{
 *     encryptionType?: 'CUSTOMER_KEY_ENCRYPTION'|'MANAGED_INTEGRATIONS_DEFAULT_ENCRYPTION',
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDefaultEncryptionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDefaultEncryptionConfigurationAsync(array{
 *     encryptionType?: 'CUSTOMER_KEY_ENCRYPTION'|'MANAGED_INTEGRATIONS_DEFAULT_ENCRYPTION',
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putHubConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putHubConfiguration(array{HubTokenTimerExpirySettingInSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putHubConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putHubConfigurationAsync(array{HubTokenTimerExpirySettingInSeconds?: int, ...} $args = [])
 * @method \Aws\Result putRuntimeLogConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putRuntimeLogConfiguration(array{
 *     ManagedThingId?: string,
 *     RuntimeLogConfigurations?: array{
 *         LogLevel?: 'DEBUG'|'ERROR'|'INFO'|'WARN',
 *         LogFlushLevel?: 'DEBUG'|'ERROR'|'INFO'|'WARN',
 *         LocalStoreLocation?: string,
 *         LocalStoreFileRotationMaxFiles?: int,
 *         LocalStoreFileRotationMaxBytes?: int,
 *         UploadLog?: bool,
 *         UploadPeriodMinutes?: int,
 *         DeleteLocalStoreAfterUpload?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRuntimeLogConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRuntimeLogConfigurationAsync(array{
 *     ManagedThingId?: string,
 *     RuntimeLogConfigurations?: array{
 *         LogLevel?: 'DEBUG'|'ERROR'|'INFO'|'WARN',
 *         LogFlushLevel?: 'DEBUG'|'ERROR'|'INFO'|'WARN',
 *         LocalStoreLocation?: string,
 *         LocalStoreFileRotationMaxFiles?: int,
 *         LocalStoreFileRotationMaxBytes?: int,
 *         UploadLog?: bool,
 *         UploadPeriodMinutes?: int,
 *         DeleteLocalStoreAfterUpload?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerAccountAssociation(array $args = [])
 * @phpstan-method \Aws\Result registerAccountAssociation(array{ManagedThingId?: string, AccountAssociationId?: string, DeviceDiscoveryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerAccountAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerAccountAssociationAsync(array{ManagedThingId?: string, AccountAssociationId?: string, DeviceDiscoveryId?: string, ...} $args = [])
 * @method \Aws\Result registerCustomEndpoint(array $args = [])
 * @phpstan-method \Aws\Result registerCustomEndpoint(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerCustomEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerCustomEndpointAsync(array{...} $args = [])
 * @method \Aws\Result resetRuntimeLogConfiguration(array $args = [])
 * @phpstan-method \Aws\Result resetRuntimeLogConfiguration(array{ManagedThingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetRuntimeLogConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetRuntimeLogConfigurationAsync(array{ManagedThingId?: string, ...} $args = [])
 * @method \Aws\Result sendConnectorEvent(array $args = [])
 * @phpstan-method \Aws\Result sendConnectorEvent(array{
 *     ConnectorId?: string,
 *     UserId?: string,
 *     Operation?: 'DEVICE_COMMAND_REQUEST'|'DEVICE_COMMAND_RESPONSE'|'DEVICE_DISCOVERY'|'DEVICE_EVENT',
 *     OperationVersion?: string,
 *     StatusCode?: int,
 *     Message?: string,
 *     DeviceDiscoveryId?: string,
 *     ConnectorDeviceId?: string,
 *     TraceId?: string,
 *     Devices?: list<array{
 *         ConnectorDeviceId?: string,
 *         ConnectorDeviceName?: string,
 *         CapabilityReport?: array,
 *         CapabilitySchemas?: list<array>,
 *         DeviceMetadata?: array,
 *         ...,
 *     }>,
 *     MatterEndpoint?: array{id?: string, clusters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendConnectorEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendConnectorEventAsync(array{
 *     ConnectorId?: string,
 *     UserId?: string,
 *     Operation?: 'DEVICE_COMMAND_REQUEST'|'DEVICE_COMMAND_RESPONSE'|'DEVICE_DISCOVERY'|'DEVICE_EVENT',
 *     OperationVersion?: string,
 *     StatusCode?: int,
 *     Message?: string,
 *     DeviceDiscoveryId?: string,
 *     ConnectorDeviceId?: string,
 *     TraceId?: string,
 *     Devices?: list<array{
 *         ConnectorDeviceId?: string,
 *         ConnectorDeviceName?: string,
 *         CapabilityReport?: array,
 *         CapabilitySchemas?: list<array>,
 *         DeviceMetadata?: array,
 *         ...,
 *     }>,
 *     MatterEndpoint?: array{id?: string, clusters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendManagedThingCommand(array $args = [])
 * @phpstan-method \Aws\Result sendManagedThingCommand(array{
 *     ManagedThingId?: string,
 *     Endpoints?: list<array{endpointId?: string, capabilities?: list<array>, ...}>,
 *     ConnectorAssociationId?: string,
 *     AccountAssociationId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendManagedThingCommandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendManagedThingCommandAsync(array{
 *     ManagedThingId?: string,
 *     Endpoints?: list<array{endpointId?: string, capabilities?: list<array>, ...}>,
 *     ConnectorAssociationId?: string,
 *     AccountAssociationId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAccountAssociationRefresh(array $args = [])
 * @phpstan-method \Aws\Result startAccountAssociationRefresh(array{AccountAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAccountAssociationRefreshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAccountAssociationRefreshAsync(array{AccountAssociationId?: string, ...} $args = [])
 * @method \Aws\Result startDeviceDiscovery(array $args = [])
 * @phpstan-method \Aws\Result startDeviceDiscovery(array{
 *     DiscoveryType?: 'CLOUD'|'CONTROLLER_CAPABILITY_REDISCOVERY'|'CUSTOM'|'ZIGBEE'|'ZWAVE',
 *     CustomProtocolDetail?: array<string, string>,
 *     ControllerIdentifier?: string,
 *     ConnectorAssociationIdentifier?: string,
 *     AccountAssociationId?: string,
 *     AuthenticationMaterial?: string,
 *     AuthenticationMaterialType?: 'ZWAVE_INSTALL_CODE',
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ConnectorDeviceIdList?: list<string>,
 *     Protocol?: 'CUSTOM'|'ZIGBEE'|'ZWAVE',
 *     EndDeviceIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDeviceDiscoveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDeviceDiscoveryAsync(array{
 *     DiscoveryType?: 'CLOUD'|'CONTROLLER_CAPABILITY_REDISCOVERY'|'CUSTOM'|'ZIGBEE'|'ZWAVE',
 *     CustomProtocolDetail?: array<string, string>,
 *     ControllerIdentifier?: string,
 *     ConnectorAssociationIdentifier?: string,
 *     AccountAssociationId?: string,
 *     AuthenticationMaterial?: string,
 *     AuthenticationMaterialType?: 'ZWAVE_INSTALL_CODE',
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ConnectorDeviceIdList?: list<string>,
 *     Protocol?: 'CUSTOM'|'ZIGBEE'|'ZWAVE',
 *     EndDeviceIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccountAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateAccountAssociation(array{AccountAssociationId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountAssociationAsync(array{AccountAssociationId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateCloudConnector(array $args = [])
 * @phpstan-method \Aws\Result updateCloudConnector(array{Identifier?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCloudConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCloudConnectorAsync(array{Identifier?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateConnectorDestination(array $args = [])
 * @phpstan-method \Aws\Result updateConnectorDestination(array{
 *     Identifier?: string,
 *     Description?: string,
 *     Name?: string,
 *     AuthType?: 'OAUTH',
 *     AuthConfig?: array{
 *         oAuthUpdate?: array{oAuthCompleteRedirectUrl?: string, proactiveRefreshTokenRenewal?: array, ...},
 *         GeneralAuthorizationUpdate?: array{AuthMaterialsToAdd?: list<array>, AuthMaterialsToUpdate?: list<array>, ...},
 *         ...,
 *     },
 *     SecretsManager?: array{arn?: string, versionId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectorDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorDestinationAsync(array{
 *     Identifier?: string,
 *     Description?: string,
 *     Name?: string,
 *     AuthType?: 'OAUTH',
 *     AuthConfig?: array{
 *         oAuthUpdate?: array{oAuthCompleteRedirectUrl?: string, proactiveRefreshTokenRenewal?: array, ...},
 *         GeneralAuthorizationUpdate?: array{AuthMaterialsToAdd?: list<array>, AuthMaterialsToUpdate?: list<array>, ...},
 *         ...,
 *     },
 *     SecretsManager?: array{arn?: string, versionId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDestination(array $args = [])
 * @phpstan-method \Aws\Result updateDestination(array{
 *     Name?: string,
 *     DeliveryDestinationArn?: string,
 *     DeliveryDestinationType?: 'KINESIS',
 *     RoleArn?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDestinationAsync(array{
 *     Name?: string,
 *     DeliveryDestinationArn?: string,
 *     DeliveryDestinationType?: 'KINESIS',
 *     RoleArn?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventLogConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateEventLogConfiguration(array{Id?: string, EventLogLevel?: 'DEBUG'|'ERROR'|'INFO'|'WARN', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventLogConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventLogConfigurationAsync(array{Id?: string, EventLogLevel?: 'DEBUG'|'ERROR'|'INFO'|'WARN', ...} $args = [])
 * @method \Aws\Result updateManagedThing(array $args = [])
 * @phpstan-method \Aws\Result updateManagedThing(array{
 *     Identifier?: string,
 *     Owner?: string,
 *     CredentialLockerId?: string,
 *     SerialNumber?: string,
 *     WiFiSimpleSetupConfiguration?: array{EnableAsProvisioner?: bool, EnableAsProvisionee?: bool, TimeoutInMinutes?: int, ...},
 *     Brand?: string,
 *     Model?: string,
 *     Name?: string,
 *     CapabilityReport?: array{version?: string, nodeId?: string, endpoints?: list<array>, ...},
 *     CapabilitySchemas?: list<array{
 *         Format?: 'AWS'|'CONNECTOR'|'ZCL',
 *         CapabilityId?: string,
 *         ExtrinsicId?: string,
 *         ExtrinsicVersion?: int,
 *         Schema?: array,
 *         ...,
 *     }>,
 *     Capabilities?: string,
 *     Classification?: string,
 *     HubNetworkMode?: 'NETWORK_WIDE_EXCLUSION'|'STANDARD',
 *     MetaData?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateManagedThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateManagedThingAsync(array{
 *     Identifier?: string,
 *     Owner?: string,
 *     CredentialLockerId?: string,
 *     SerialNumber?: string,
 *     WiFiSimpleSetupConfiguration?: array{EnableAsProvisioner?: bool, EnableAsProvisionee?: bool, TimeoutInMinutes?: int, ...},
 *     Brand?: string,
 *     Model?: string,
 *     Name?: string,
 *     CapabilityReport?: array{version?: string, nodeId?: string, endpoints?: list<array>, ...},
 *     CapabilitySchemas?: list<array{
 *         Format?: 'AWS'|'CONNECTOR'|'ZCL',
 *         CapabilityId?: string,
 *         ExtrinsicId?: string,
 *         ExtrinsicVersion?: int,
 *         Schema?: array,
 *         ...,
 *     }>,
 *     Capabilities?: string,
 *     Classification?: string,
 *     HubNetworkMode?: 'NETWORK_WIDE_EXCLUSION'|'STANDARD',
 *     MetaData?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateNotificationConfiguration(array{
 *     EventType?: 'ACCOUNT_ASSOCIATION'|'CONNECTOR_ASSOCIATION'|'CONNECTOR_ERROR_REPORT'|'DEVICE_COMMAND'|'DEVICE_COMMAND_REQUEST'|'DEVICE_DISCOVERY_STATUS'|'DEVICE_EVENT'|'DEVICE_LIFE_CYCLE'|'DEVICE_OTA'|'DEVICE_STATE'|'DEVICE_WSS',
 *     DestinationName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotificationConfigurationAsync(array{
 *     EventType?: 'ACCOUNT_ASSOCIATION'|'CONNECTOR_ASSOCIATION'|'CONNECTOR_ERROR_REPORT'|'DEVICE_COMMAND'|'DEVICE_COMMAND_REQUEST'|'DEVICE_DISCOVERY_STATUS'|'DEVICE_EVENT'|'DEVICE_LIFE_CYCLE'|'DEVICE_OTA'|'DEVICE_STATE'|'DEVICE_WSS',
 *     DestinationName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOtaTask(array $args = [])
 * @phpstan-method \Aws\Result updateOtaTask(array{Identifier?: string, Description?: string, TaskConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOtaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOtaTaskAsync(array{Identifier?: string, Description?: string, TaskConfigurationId?: string, ...} $args = [])
 */
class IoTManagedIntegrationsClient extends AwsClient {}
