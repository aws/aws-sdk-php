<?php
namespace Aws\GreengrassV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Greengrass V2** service.
 * @method \Aws\Result associateServiceRoleToAccount(array $args = [])
 * @phpstan-method \Aws\Result associateServiceRoleToAccount(array{roleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateServiceRoleToAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateServiceRoleToAccountAsync(array{roleArn?: string, ...} $args = [])
 * @method \Aws\Result batchAssociateClientDeviceWithCoreDevice(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateClientDeviceWithCoreDevice(array{entries?: list<array{thingName?: string, ...}>, coreDeviceThingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateClientDeviceWithCoreDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateClientDeviceWithCoreDeviceAsync(array{entries?: list<array{thingName?: string, ...}>, coreDeviceThingName?: string, ...} $args = [])
 * @method \Aws\Result batchDisassociateClientDeviceFromCoreDevice(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateClientDeviceFromCoreDevice(array{entries?: list<array{thingName?: string, ...}>, coreDeviceThingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateClientDeviceFromCoreDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateClientDeviceFromCoreDeviceAsync(array{entries?: list<array{thingName?: string, ...}>, coreDeviceThingName?: string, ...} $args = [])
 * @method \Aws\Result cancelDeployment(array $args = [])
 * @phpstan-method \Aws\Result cancelDeployment(array{deploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelDeploymentAsync(array{deploymentId?: string, ...} $args = [])
 * @method \Aws\Result createComponentVersion(array $args = [])
 * @phpstan-method \Aws\Result createComponentVersion(array{
 *     inlineRecipe?: string|resource|\Psr\Http\Message\StreamInterface,
 *     lambdaFunction?: array{
 *         lambdaArn?: string,
 *         componentName?: string,
 *         componentVersion?: string,
 *         componentPlatforms?: list<array>,
 *         componentDependencies?: array<string, array>,
 *         componentLambdaParameters?: array{
 *             eventSources?: list<array>,
 *             maxQueueSize?: int,
 *             maxInstancesCount?: int,
 *             maxIdleTimeInSeconds?: int,
 *             timeoutInSeconds?: int,
 *             statusTimeoutInSeconds?: int,
 *             pinned?: bool,
 *             inputPayloadEncodingType?: 'binary'|'json',
 *             execArgs?: list<string>,
 *             environmentVariables?: array<string, string>,
 *             linuxProcessParams?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComponentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComponentVersionAsync(array{
 *     inlineRecipe?: string|resource|\Psr\Http\Message\StreamInterface,
 *     lambdaFunction?: array{
 *         lambdaArn?: string,
 *         componentName?: string,
 *         componentVersion?: string,
 *         componentPlatforms?: list<array>,
 *         componentDependencies?: array<string, array>,
 *         componentLambdaParameters?: array{
 *             eventSources?: list<array>,
 *             maxQueueSize?: int,
 *             maxInstancesCount?: int,
 *             maxIdleTimeInSeconds?: int,
 *             timeoutInSeconds?: int,
 *             statusTimeoutInSeconds?: int,
 *             pinned?: bool,
 *             inputPayloadEncodingType?: 'binary'|'json',
 *             execArgs?: list<string>,
 *             environmentVariables?: array<string, string>,
 *             linuxProcessParams?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeployment(array $args = [])
 * @phpstan-method \Aws\Result createDeployment(array{
 *     targetArn?: string,
 *     deploymentName?: string,
 *     components?: array<string, array{componentVersion?: string, configurationUpdate?: array, runWith?: array, ...}>,
 *     iotJobConfiguration?: array{
 *         jobExecutionsRolloutConfig?: array{exponentialRate?: array, maximumPerMinute?: int, ...},
 *         abortConfig?: array{criteriaList?: list<array>, ...},
 *         timeoutConfig?: array{inProgressTimeoutInMinutes?: int, ...},
 *         ...,
 *     },
 *     deploymentPolicies?: array{
 *         failureHandlingPolicy?: 'DO_NOTHING'|'ROLLBACK',
 *         componentUpdatePolicy?: array{timeoutInSeconds?: int, action?: 'NOTIFY_COMPONENTS'|'SKIP_NOTIFY_COMPONENTS', ...},
 *         configurationValidationPolicy?: array{timeoutInSeconds?: int, ...},
 *         ...,
 *     },
 *     parentTargetArn?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentAsync(array{
 *     targetArn?: string,
 *     deploymentName?: string,
 *     components?: array<string, array{componentVersion?: string, configurationUpdate?: array, runWith?: array, ...}>,
 *     iotJobConfiguration?: array{
 *         jobExecutionsRolloutConfig?: array{exponentialRate?: array, maximumPerMinute?: int, ...},
 *         abortConfig?: array{criteriaList?: list<array>, ...},
 *         timeoutConfig?: array{inProgressTimeoutInMinutes?: int, ...},
 *         ...,
 *     },
 *     deploymentPolicies?: array{
 *         failureHandlingPolicy?: 'DO_NOTHING'|'ROLLBACK',
 *         componentUpdatePolicy?: array{timeoutInSeconds?: int, action?: 'NOTIFY_COMPONENTS'|'SKIP_NOTIFY_COMPONENTS', ...},
 *         configurationValidationPolicy?: array{timeoutInSeconds?: int, ...},
 *         ...,
 *     },
 *     parentTargetArn?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteComponent(array $args = [])
 * @phpstan-method \Aws\Result deleteComponent(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteComponentAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteCoreDevice(array $args = [])
 * @phpstan-method \Aws\Result deleteCoreDevice(array{coreDeviceThingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCoreDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCoreDeviceAsync(array{coreDeviceThingName?: string, ...} $args = [])
 * @method \Aws\Result deleteDeployment(array $args = [])
 * @phpstan-method \Aws\Result deleteDeployment(array{deploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array{deploymentId?: string, ...} $args = [])
 * @method \Aws\Result describeComponent(array $args = [])
 * @phpstan-method \Aws\Result describeComponent(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeComponentAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result disassociateServiceRoleFromAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateServiceRoleFromAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateServiceRoleFromAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateServiceRoleFromAccountAsync(array{...} $args = [])
 * @method \Aws\Result getComponent(array $args = [])
 * @phpstan-method \Aws\Result getComponent(array{recipeOutputFormat?: 'JSON'|'YAML', arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComponentAsync(array{recipeOutputFormat?: 'JSON'|'YAML', arn?: string, ...} $args = [])
 * @method \Aws\Result getComponentVersionArtifact(array $args = [])
 * @phpstan-method \Aws\Result getComponentVersionArtifact(array{
 *     arn?: string,
 *     artifactName?: string,
 *     s3EndpointType?: 'GLOBAL'|'REGIONAL',
 *     iotEndpointType?: 'fips'|'standard',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getComponentVersionArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComponentVersionArtifactAsync(array{
 *     arn?: string,
 *     artifactName?: string,
 *     s3EndpointType?: 'GLOBAL'|'REGIONAL',
 *     iotEndpointType?: 'fips'|'standard',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getConnectivityInfo(array $args = [])
 * @phpstan-method \Aws\Result getConnectivityInfo(array{thingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectivityInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectivityInfoAsync(array{thingName?: string, ...} $args = [])
 * @method \Aws\Result getCoreDevice(array $args = [])
 * @phpstan-method \Aws\Result getCoreDevice(array{coreDeviceThingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoreDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCoreDeviceAsync(array{coreDeviceThingName?: string, ...} $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @phpstan-method \Aws\Result getDeployment(array{deploymentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentAsync(array{deploymentId?: string, ...} $args = [])
 * @method \Aws\Result getServiceRoleForAccount(array $args = [])
 * @phpstan-method \Aws\Result getServiceRoleForAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceRoleForAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceRoleForAccountAsync(array{...} $args = [])
 * @method \Aws\Result listClientDevicesAssociatedWithCoreDevice(array $args = [])
 * @phpstan-method \Aws\Result listClientDevicesAssociatedWithCoreDevice(array{coreDeviceThingName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClientDevicesAssociatedWithCoreDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClientDevicesAssociatedWithCoreDeviceAsync(array{coreDeviceThingName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listComponentVersions(array $args = [])
 * @phpstan-method \Aws\Result listComponentVersions(array{arn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentVersionsAsync(array{arn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listComponents(array $args = [])
 * @phpstan-method \Aws\Result listComponents(array{scope?: 'PRIVATE'|'PUBLIC', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentsAsync(array{scope?: 'PRIVATE'|'PUBLIC', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCoreDevices(array $args = [])
 * @phpstan-method \Aws\Result listCoreDevices(array{
 *     thingGroupArn?: string,
 *     status?: 'HEALTHY'|'UNHEALTHY',
 *     maxResults?: int,
 *     nextToken?: string,
 *     runtime?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoreDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCoreDevicesAsync(array{
 *     thingGroupArn?: string,
 *     status?: 'HEALTHY'|'UNHEALTHY',
 *     maxResults?: int,
 *     nextToken?: string,
 *     runtime?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDeployments(array $args = [])
 * @phpstan-method \Aws\Result listDeployments(array{
 *     targetArn?: string,
 *     historyFilter?: 'ALL'|'LATEST_ONLY',
 *     parentTargetArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array{
 *     targetArn?: string,
 *     historyFilter?: 'ALL'|'LATEST_ONLY',
 *     parentTargetArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEffectiveDeployments(array $args = [])
 * @phpstan-method \Aws\Result listEffectiveDeployments(array{coreDeviceThingName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEffectiveDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEffectiveDeploymentsAsync(array{coreDeviceThingName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listInstalledComponents(array $args = [])
 * @phpstan-method \Aws\Result listInstalledComponents(array{coreDeviceThingName?: string, maxResults?: int, nextToken?: string, topologyFilter?: 'ALL'|'ROOT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstalledComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstalledComponentsAsync(array{coreDeviceThingName?: string, maxResults?: int, nextToken?: string, topologyFilter?: 'ALL'|'ROOT', ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result resolveComponentCandidates(array $args = [])
 * @phpstan-method \Aws\Result resolveComponentCandidates(array{
 *     platform?: array{name?: string, attributes?: array<string, string>, ...},
 *     componentCandidates?: list<array{componentName?: string, componentVersion?: string, versionRequirements?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resolveComponentCandidatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resolveComponentCandidatesAsync(array{
 *     platform?: array{name?: string, attributes?: array<string, string>, ...},
 *     componentCandidates?: list<array{componentName?: string, componentVersion?: string, versionRequirements?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateConnectivityInfo(array $args = [])
 * @phpstan-method \Aws\Result updateConnectivityInfo(array{
 *     thingName?: string,
 *     connectivityInfo?: list<array{id?: string, hostAddress?: string, portNumber?: int, metadata?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectivityInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectivityInfoAsync(array{
 *     thingName?: string,
 *     connectivityInfo?: list<array{id?: string, hostAddress?: string, portNumber?: int, metadata?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class GreengrassV2Client extends AwsClient {}
