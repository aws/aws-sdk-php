<?php
namespace Aws\Greengrass;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Greengrass** service.
 * @method \Aws\Result associateRoleToGroup(array $args = [])
 * @phpstan-method \Aws\Result associateRoleToGroup(array{GroupId?: string, RoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateRoleToGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateRoleToGroupAsync(array{GroupId?: string, RoleArn?: string, ...} $args = [])
 * @method \Aws\Result associateServiceRoleToAccount(array $args = [])
 * @phpstan-method \Aws\Result associateServiceRoleToAccount(array{RoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateServiceRoleToAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateServiceRoleToAccountAsync(array{RoleArn?: string, ...} $args = [])
 * @method \Aws\Result createConnectorDefinition(array $args = [])
 * @phpstan-method \Aws\Result createConnectorDefinition(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Connectors?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorDefinitionAsync(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Connectors?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnectorDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result createConnectorDefinitionVersion(array{
 *     AmznClientToken?: string,
 *     ConnectorDefinitionId?: string,
 *     Connectors?: list<array{ConnectorArn?: string, Id?: string, Parameters?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorDefinitionVersionAsync(array{
 *     AmznClientToken?: string,
 *     ConnectorDefinitionId?: string,
 *     Connectors?: list<array{ConnectorArn?: string, Id?: string, Parameters?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCoreDefinition(array $args = [])
 * @phpstan-method \Aws\Result createCoreDefinition(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Cores?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCoreDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCoreDefinitionAsync(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Cores?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCoreDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result createCoreDefinitionVersion(array{
 *     AmznClientToken?: string,
 *     CoreDefinitionId?: string,
 *     Cores?: list<array{CertificateArn?: string, Id?: string, SyncShadow?: bool, ThingArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCoreDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCoreDefinitionVersionAsync(array{
 *     AmznClientToken?: string,
 *     CoreDefinitionId?: string,
 *     Cores?: list<array{CertificateArn?: string, Id?: string, SyncShadow?: bool, ThingArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeployment(array $args = [])
 * @phpstan-method \Aws\Result createDeployment(array{
 *     AmznClientToken?: string,
 *     DeploymentId?: string,
 *     DeploymentType?: 'ForceResetDeployment'|'NewDeployment'|'Redeployment'|'ResetDeployment',
 *     GroupId?: string,
 *     GroupVersionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentAsync(array{
 *     AmznClientToken?: string,
 *     DeploymentId?: string,
 *     DeploymentType?: 'ForceResetDeployment'|'NewDeployment'|'Redeployment'|'ResetDeployment',
 *     GroupId?: string,
 *     GroupVersionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeviceDefinition(array $args = [])
 * @phpstan-method \Aws\Result createDeviceDefinition(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Devices?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeviceDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeviceDefinitionAsync(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Devices?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeviceDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result createDeviceDefinitionVersion(array{
 *     AmznClientToken?: string,
 *     DeviceDefinitionId?: string,
 *     Devices?: list<array{CertificateArn?: string, Id?: string, SyncShadow?: bool, ThingArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeviceDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeviceDefinitionVersionAsync(array{
 *     AmznClientToken?: string,
 *     DeviceDefinitionId?: string,
 *     Devices?: list<array{CertificateArn?: string, Id?: string, SyncShadow?: bool, ThingArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFunctionDefinition(array $args = [])
 * @phpstan-method \Aws\Result createFunctionDefinition(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{DefaultConfig?: array{Execution?: array, ...}, Functions?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFunctionDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFunctionDefinitionAsync(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{DefaultConfig?: array{Execution?: array, ...}, Functions?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFunctionDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result createFunctionDefinitionVersion(array{
 *     AmznClientToken?: string,
 *     DefaultConfig?: array{Execution?: array{IsolationMode?: 'GreengrassContainer'|'NoContainer', RunAs?: array, ...}, ...},
 *     FunctionDefinitionId?: string,
 *     Functions?: list<array{FunctionArn?: string, FunctionConfiguration?: array, Id?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFunctionDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFunctionDefinitionVersionAsync(array{
 *     AmznClientToken?: string,
 *     DefaultConfig?: array{Execution?: array{IsolationMode?: 'GreengrassContainer'|'NoContainer', RunAs?: array, ...}, ...},
 *     FunctionDefinitionId?: string,
 *     Functions?: list<array{FunctionArn?: string, FunctionConfiguration?: array, Id?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @phpstan-method \Aws\Result createGroup(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{
 *         ConnectorDefinitionVersionArn?: string,
 *         CoreDefinitionVersionArn?: string,
 *         DeviceDefinitionVersionArn?: string,
 *         FunctionDefinitionVersionArn?: string,
 *         LoggerDefinitionVersionArn?: string,
 *         ResourceDefinitionVersionArn?: string,
 *         SubscriptionDefinitionVersionArn?: string,
 *         ...,
 *     },
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupAsync(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{
 *         ConnectorDefinitionVersionArn?: string,
 *         CoreDefinitionVersionArn?: string,
 *         DeviceDefinitionVersionArn?: string,
 *         FunctionDefinitionVersionArn?: string,
 *         LoggerDefinitionVersionArn?: string,
 *         ResourceDefinitionVersionArn?: string,
 *         SubscriptionDefinitionVersionArn?: string,
 *         ...,
 *     },
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGroupCertificateAuthority(array $args = [])
 * @phpstan-method \Aws\Result createGroupCertificateAuthority(array{AmznClientToken?: string, GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupCertificateAuthorityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupCertificateAuthorityAsync(array{AmznClientToken?: string, GroupId?: string, ...} $args = [])
 * @method \Aws\Result createGroupVersion(array $args = [])
 * @phpstan-method \Aws\Result createGroupVersion(array{
 *     AmznClientToken?: string,
 *     ConnectorDefinitionVersionArn?: string,
 *     CoreDefinitionVersionArn?: string,
 *     DeviceDefinitionVersionArn?: string,
 *     FunctionDefinitionVersionArn?: string,
 *     GroupId?: string,
 *     LoggerDefinitionVersionArn?: string,
 *     ResourceDefinitionVersionArn?: string,
 *     SubscriptionDefinitionVersionArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupVersionAsync(array{
 *     AmznClientToken?: string,
 *     ConnectorDefinitionVersionArn?: string,
 *     CoreDefinitionVersionArn?: string,
 *     DeviceDefinitionVersionArn?: string,
 *     FunctionDefinitionVersionArn?: string,
 *     GroupId?: string,
 *     LoggerDefinitionVersionArn?: string,
 *     ResourceDefinitionVersionArn?: string,
 *     SubscriptionDefinitionVersionArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLoggerDefinition(array $args = [])
 * @phpstan-method \Aws\Result createLoggerDefinition(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Loggers?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoggerDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoggerDefinitionAsync(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Loggers?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLoggerDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result createLoggerDefinitionVersion(array{
 *     AmznClientToken?: string,
 *     LoggerDefinitionId?: string,
 *     Loggers?: list<array{
 *         Component?: 'GreengrassSystem'|'Lambda',
 *         Id?: string,
 *         Level?: 'DEBUG'|'ERROR'|'FATAL'|'INFO'|'WARN',
 *         Space?: int,
 *         Type?: 'AWSCloudWatch'|'FileSystem',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoggerDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoggerDefinitionVersionAsync(array{
 *     AmznClientToken?: string,
 *     LoggerDefinitionId?: string,
 *     Loggers?: list<array{
 *         Component?: 'GreengrassSystem'|'Lambda',
 *         Id?: string,
 *         Level?: 'DEBUG'|'ERROR'|'FATAL'|'INFO'|'WARN',
 *         Space?: int,
 *         Type?: 'AWSCloudWatch'|'FileSystem',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResourceDefinition(array $args = [])
 * @phpstan-method \Aws\Result createResourceDefinition(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Resources?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceDefinitionAsync(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Resources?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResourceDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result createResourceDefinitionVersion(array{
 *     AmznClientToken?: string,
 *     ResourceDefinitionId?: string,
 *     Resources?: list<array{Id?: string, Name?: string, ResourceDataContainer?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceDefinitionVersionAsync(array{
 *     AmznClientToken?: string,
 *     ResourceDefinitionId?: string,
 *     Resources?: list<array{Id?: string, Name?: string, ResourceDataContainer?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSoftwareUpdateJob(array $args = [])
 * @phpstan-method \Aws\Result createSoftwareUpdateJob(array{
 *     AmznClientToken?: string,
 *     S3UrlSignerRole?: string,
 *     SoftwareToUpdate?: 'core'|'ota_agent',
 *     UpdateAgentLogLevel?: 'DEBUG'|'ERROR'|'FATAL'|'INFO'|'NONE'|'TRACE'|'VERBOSE'|'WARN',
 *     UpdateTargets?: list<string>,
 *     UpdateTargetsArchitecture?: 'aarch64'|'armv6l'|'armv7l'|'x86_64',
 *     UpdateTargetsOperatingSystem?: 'amazon_linux'|'openwrt'|'raspbian'|'ubuntu',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSoftwareUpdateJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSoftwareUpdateJobAsync(array{
 *     AmznClientToken?: string,
 *     S3UrlSignerRole?: string,
 *     SoftwareToUpdate?: 'core'|'ota_agent',
 *     UpdateAgentLogLevel?: 'DEBUG'|'ERROR'|'FATAL'|'INFO'|'NONE'|'TRACE'|'VERBOSE'|'WARN',
 *     UpdateTargets?: list<string>,
 *     UpdateTargetsArchitecture?: 'aarch64'|'armv6l'|'armv7l'|'x86_64',
 *     UpdateTargetsOperatingSystem?: 'amazon_linux'|'openwrt'|'raspbian'|'ubuntu',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubscriptionDefinition(array $args = [])
 * @phpstan-method \Aws\Result createSubscriptionDefinition(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Subscriptions?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriptionDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriptionDefinitionAsync(array{
 *     AmznClientToken?: string,
 *     InitialVersion?: array{Subscriptions?: list<array>, ...},
 *     Name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubscriptionDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result createSubscriptionDefinitionVersion(array{
 *     AmznClientToken?: string,
 *     SubscriptionDefinitionId?: string,
 *     Subscriptions?: list<array{Id?: string, Source?: string, Subject?: string, Target?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriptionDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriptionDefinitionVersionAsync(array{
 *     AmznClientToken?: string,
 *     SubscriptionDefinitionId?: string,
 *     Subscriptions?: list<array{Id?: string, Source?: string, Subject?: string, Target?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteConnectorDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectorDefinition(array{ConnectorDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectorDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorDefinitionAsync(array{ConnectorDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result deleteCoreDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteCoreDefinition(array{CoreDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCoreDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCoreDefinitionAsync(array{CoreDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result deleteDeviceDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteDeviceDefinition(array{DeviceDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeviceDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeviceDefinitionAsync(array{DeviceDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result deleteFunctionDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteFunctionDefinition(array{FunctionDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFunctionDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFunctionDefinitionAsync(array{FunctionDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{GroupId?: string, ...} $args = [])
 * @method \Aws\Result deleteLoggerDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteLoggerDefinition(array{LoggerDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoggerDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoggerDefinitionAsync(array{LoggerDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourceDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceDefinition(array{ResourceDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceDefinitionAsync(array{ResourceDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result deleteSubscriptionDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteSubscriptionDefinition(array{SubscriptionDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriptionDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubscriptionDefinitionAsync(array{SubscriptionDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result disassociateRoleFromGroup(array $args = [])
 * @phpstan-method \Aws\Result disassociateRoleFromGroup(array{GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateRoleFromGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateRoleFromGroupAsync(array{GroupId?: string, ...} $args = [])
 * @method \Aws\Result disassociateServiceRoleFromAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateServiceRoleFromAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateServiceRoleFromAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateServiceRoleFromAccountAsync(array{...} $args = [])
 * @method \Aws\Result getAssociatedRole(array $args = [])
 * @phpstan-method \Aws\Result getAssociatedRole(array{GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssociatedRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssociatedRoleAsync(array{GroupId?: string, ...} $args = [])
 * @method \Aws\Result getBulkDeploymentStatus(array $args = [])
 * @phpstan-method \Aws\Result getBulkDeploymentStatus(array{BulkDeploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBulkDeploymentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBulkDeploymentStatusAsync(array{BulkDeploymentId?: string, ...} $args = [])
 * @method \Aws\Result getConnectivityInfo(array $args = [])
 * @phpstan-method \Aws\Result getConnectivityInfo(array{ThingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectivityInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectivityInfoAsync(array{ThingName?: string, ...} $args = [])
 * @method \Aws\Result getConnectorDefinition(array $args = [])
 * @phpstan-method \Aws\Result getConnectorDefinition(array{ConnectorDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectorDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectorDefinitionAsync(array{ConnectorDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result getConnectorDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result getConnectorDefinitionVersion(array{ConnectorDefinitionId?: string, ConnectorDefinitionVersionId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectorDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectorDefinitionVersionAsync(array{ConnectorDefinitionId?: string, ConnectorDefinitionVersionId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getCoreDefinition(array $args = [])
 * @phpstan-method \Aws\Result getCoreDefinition(array{CoreDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCoreDefinitionAsync(array{CoreDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result getCoreDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result getCoreDefinitionVersion(array{CoreDefinitionId?: string, CoreDefinitionVersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCoreDefinitionVersionAsync(array{CoreDefinitionId?: string, CoreDefinitionVersionId?: string, ...} $args = [])
 * @method \Aws\Result getDeploymentStatus(array $args = [])
 * @phpstan-method \Aws\Result getDeploymentStatus(array{DeploymentId?: string, GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentStatusAsync(array{DeploymentId?: string, GroupId?: string, ...} $args = [])
 * @method \Aws\Result getDeviceDefinition(array $args = [])
 * @phpstan-method \Aws\Result getDeviceDefinition(array{DeviceDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceDefinitionAsync(array{DeviceDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result getDeviceDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result getDeviceDefinitionVersion(array{DeviceDefinitionId?: string, DeviceDefinitionVersionId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceDefinitionVersionAsync(array{DeviceDefinitionId?: string, DeviceDefinitionVersionId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getFunctionDefinition(array $args = [])
 * @phpstan-method \Aws\Result getFunctionDefinition(array{FunctionDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionDefinitionAsync(array{FunctionDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result getFunctionDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result getFunctionDefinitionVersion(array{FunctionDefinitionId?: string, FunctionDefinitionVersionId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionDefinitionVersionAsync(array{FunctionDefinitionId?: string, FunctionDefinitionVersionId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getGroup(array $args = [])
 * @phpstan-method \Aws\Result getGroup(array{GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupAsync(array{GroupId?: string, ...} $args = [])
 * @method \Aws\Result getGroupCertificateAuthority(array $args = [])
 * @phpstan-method \Aws\Result getGroupCertificateAuthority(array{CertificateAuthorityId?: string, GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupCertificateAuthorityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupCertificateAuthorityAsync(array{CertificateAuthorityId?: string, GroupId?: string, ...} $args = [])
 * @method \Aws\Result getGroupCertificateConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getGroupCertificateConfiguration(array{GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupCertificateConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupCertificateConfigurationAsync(array{GroupId?: string, ...} $args = [])
 * @method \Aws\Result getGroupVersion(array $args = [])
 * @phpstan-method \Aws\Result getGroupVersion(array{GroupId?: string, GroupVersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupVersionAsync(array{GroupId?: string, GroupVersionId?: string, ...} $args = [])
 * @method \Aws\Result getLoggerDefinition(array $args = [])
 * @phpstan-method \Aws\Result getLoggerDefinition(array{LoggerDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoggerDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoggerDefinitionAsync(array{LoggerDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result getLoggerDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result getLoggerDefinitionVersion(array{LoggerDefinitionId?: string, LoggerDefinitionVersionId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoggerDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoggerDefinitionVersionAsync(array{LoggerDefinitionId?: string, LoggerDefinitionVersionId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getResourceDefinition(array $args = [])
 * @phpstan-method \Aws\Result getResourceDefinition(array{ResourceDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceDefinitionAsync(array{ResourceDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result getResourceDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result getResourceDefinitionVersion(array{ResourceDefinitionId?: string, ResourceDefinitionVersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceDefinitionVersionAsync(array{ResourceDefinitionId?: string, ResourceDefinitionVersionId?: string, ...} $args = [])
 * @method \Aws\Result getServiceRoleForAccount(array $args = [])
 * @phpstan-method \Aws\Result getServiceRoleForAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceRoleForAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceRoleForAccountAsync(array{...} $args = [])
 * @method \Aws\Result getSubscriptionDefinition(array $args = [])
 * @phpstan-method \Aws\Result getSubscriptionDefinition(array{SubscriptionDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriptionDefinitionAsync(array{SubscriptionDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result getSubscriptionDefinitionVersion(array $args = [])
 * @phpstan-method \Aws\Result getSubscriptionDefinitionVersion(array{NextToken?: string, SubscriptionDefinitionId?: string, SubscriptionDefinitionVersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionDefinitionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriptionDefinitionVersionAsync(array{NextToken?: string, SubscriptionDefinitionId?: string, SubscriptionDefinitionVersionId?: string, ...} $args = [])
 * @method \Aws\Result getThingRuntimeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getThingRuntimeConfiguration(array{ThingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getThingRuntimeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getThingRuntimeConfigurationAsync(array{ThingName?: string, ...} $args = [])
 * @method \Aws\Result listBulkDeploymentDetailedReports(array $args = [])
 * @phpstan-method \Aws\Result listBulkDeploymentDetailedReports(array{BulkDeploymentId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBulkDeploymentDetailedReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBulkDeploymentDetailedReportsAsync(array{BulkDeploymentId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listBulkDeployments(array $args = [])
 * @phpstan-method \Aws\Result listBulkDeployments(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBulkDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBulkDeploymentsAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConnectorDefinitionVersions(array $args = [])
 * @phpstan-method \Aws\Result listConnectorDefinitionVersions(array{ConnectorDefinitionId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorDefinitionVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorDefinitionVersionsAsync(array{ConnectorDefinitionId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConnectorDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listConnectorDefinitions(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorDefinitionsAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCoreDefinitionVersions(array $args = [])
 * @phpstan-method \Aws\Result listCoreDefinitionVersions(array{CoreDefinitionId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoreDefinitionVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCoreDefinitionVersionsAsync(array{CoreDefinitionId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCoreDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listCoreDefinitions(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoreDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCoreDefinitionsAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeployments(array $args = [])
 * @phpstan-method \Aws\Result listDeployments(array{GroupId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array{GroupId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeviceDefinitionVersions(array $args = [])
 * @phpstan-method \Aws\Result listDeviceDefinitionVersions(array{DeviceDefinitionId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeviceDefinitionVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeviceDefinitionVersionsAsync(array{DeviceDefinitionId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeviceDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listDeviceDefinitions(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeviceDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeviceDefinitionsAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFunctionDefinitionVersions(array $args = [])
 * @phpstan-method \Aws\Result listFunctionDefinitionVersions(array{FunctionDefinitionId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionDefinitionVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionDefinitionVersionsAsync(array{FunctionDefinitionId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFunctionDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listFunctionDefinitions(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionDefinitionsAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGroupCertificateAuthorities(array $args = [])
 * @phpstan-method \Aws\Result listGroupCertificateAuthorities(array{GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupCertificateAuthoritiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupCertificateAuthoritiesAsync(array{GroupId?: string, ...} $args = [])
 * @method \Aws\Result listGroupVersions(array $args = [])
 * @phpstan-method \Aws\Result listGroupVersions(array{GroupId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupVersionsAsync(array{GroupId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @phpstan-method \Aws\Result listGroups(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listLoggerDefinitionVersions(array $args = [])
 * @phpstan-method \Aws\Result listLoggerDefinitionVersions(array{LoggerDefinitionId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLoggerDefinitionVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLoggerDefinitionVersionsAsync(array{LoggerDefinitionId?: string, MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listLoggerDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listLoggerDefinitions(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLoggerDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLoggerDefinitionsAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listResourceDefinitionVersions(array $args = [])
 * @phpstan-method \Aws\Result listResourceDefinitionVersions(array{MaxResults?: string, NextToken?: string, ResourceDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceDefinitionVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceDefinitionVersionsAsync(array{MaxResults?: string, NextToken?: string, ResourceDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result listResourceDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listResourceDefinitions(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceDefinitionsAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSubscriptionDefinitionVersions(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptionDefinitionVersions(array{MaxResults?: string, NextToken?: string, SubscriptionDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionDefinitionVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionDefinitionVersionsAsync(array{MaxResults?: string, NextToken?: string, SubscriptionDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result listSubscriptionDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptionDefinitions(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionDefinitionsAsync(array{MaxResults?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result resetDeployments(array $args = [])
 * @phpstan-method \Aws\Result resetDeployments(array{AmznClientToken?: string, Force?: bool, GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetDeploymentsAsync(array{AmznClientToken?: string, Force?: bool, GroupId?: string, ...} $args = [])
 * @method \Aws\Result startBulkDeployment(array $args = [])
 * @phpstan-method \Aws\Result startBulkDeployment(array{
 *     AmznClientToken?: string,
 *     ExecutionRoleArn?: string,
 *     InputFileUri?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startBulkDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBulkDeploymentAsync(array{
 *     AmznClientToken?: string,
 *     ExecutionRoleArn?: string,
 *     InputFileUri?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopBulkDeployment(array $args = [])
 * @phpstan-method \Aws\Result stopBulkDeployment(array{BulkDeploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopBulkDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopBulkDeploymentAsync(array{BulkDeploymentId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateConnectivityInfo(array $args = [])
 * @phpstan-method \Aws\Result updateConnectivityInfo(array{
 *     ConnectivityInfo?: list<array{HostAddress?: string, Id?: string, Metadata?: string, PortNumber?: int, ...}>,
 *     ThingName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectivityInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectivityInfoAsync(array{
 *     ConnectivityInfo?: list<array{HostAddress?: string, Id?: string, Metadata?: string, PortNumber?: int, ...}>,
 *     ThingName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnectorDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateConnectorDefinition(array{ConnectorDefinitionId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectorDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorDefinitionAsync(array{ConnectorDefinitionId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateCoreDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateCoreDefinition(array{CoreDefinitionId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCoreDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCoreDefinitionAsync(array{CoreDefinitionId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateDeviceDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateDeviceDefinition(array{DeviceDefinitionId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeviceDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeviceDefinitionAsync(array{DeviceDefinitionId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateFunctionDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateFunctionDefinition(array{FunctionDefinitionId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFunctionDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFunctionDefinitionAsync(array{FunctionDefinitionId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateGroup(array{GroupId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupAsync(array{GroupId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateGroupCertificateConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateGroupCertificateConfiguration(array{CertificateExpiryInMilliseconds?: string, GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupCertificateConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupCertificateConfigurationAsync(array{CertificateExpiryInMilliseconds?: string, GroupId?: string, ...} $args = [])
 * @method \Aws\Result updateLoggerDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateLoggerDefinition(array{LoggerDefinitionId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLoggerDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLoggerDefinitionAsync(array{LoggerDefinitionId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateResourceDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateResourceDefinition(array{Name?: string, ResourceDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceDefinitionAsync(array{Name?: string, ResourceDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result updateSubscriptionDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateSubscriptionDefinition(array{Name?: string, SubscriptionDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriptionDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriptionDefinitionAsync(array{Name?: string, SubscriptionDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result updateThingRuntimeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateThingRuntimeConfiguration(array{TelemetryConfiguration?: array{Telemetry?: 'Off'|'On', ...}, ThingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThingRuntimeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThingRuntimeConfigurationAsync(array{TelemetryConfiguration?: array{Telemetry?: 'Off'|'On', ...}, ThingName?: string, ...} $args = [])
 */
class GreengrassClient extends AwsClient {}
