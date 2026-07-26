<?php
namespace Aws\IoTDeviceAdvisor;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Core Device Advisor** service.
 * @method \Aws\Result createSuiteDefinition(array $args = [])
 * @phpstan-method \Aws\Result createSuiteDefinition(array{
 *     suiteDefinitionConfiguration?: array{
 *         suiteDefinitionName?: string,
 *         devices?: list<array>,
 *         intendedForQualification?: bool,
 *         isLongDurationTest?: bool,
 *         rootGroup?: string,
 *         devicePermissionRoleArn?: string,
 *         protocol?: 'MqttV3_1_1'|'MqttV3_1_1_OverWebSocket'|'MqttV5'|'MqttV5_OverWebSocket',
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSuiteDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSuiteDefinitionAsync(array{
 *     suiteDefinitionConfiguration?: array{
 *         suiteDefinitionName?: string,
 *         devices?: list<array>,
 *         intendedForQualification?: bool,
 *         isLongDurationTest?: bool,
 *         rootGroup?: string,
 *         devicePermissionRoleArn?: string,
 *         protocol?: 'MqttV3_1_1'|'MqttV3_1_1_OverWebSocket'|'MqttV5'|'MqttV5_OverWebSocket',
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSuiteDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteSuiteDefinition(array{suiteDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSuiteDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSuiteDefinitionAsync(array{suiteDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result getDeviceAdvisorEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getDeviceAdvisorEndpoint(array{
 *     thingArn?: string,
 *     certificateArn?: string,
 *     deviceRoleArn?: string,
 *     authenticationMethod?: 'SignatureVersion4'|'X509ClientCertificate',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceAdvisorEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceAdvisorEndpointAsync(array{
 *     thingArn?: string,
 *     certificateArn?: string,
 *     deviceRoleArn?: string,
 *     authenticationMethod?: 'SignatureVersion4'|'X509ClientCertificate',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSuiteDefinition(array $args = [])
 * @phpstan-method \Aws\Result getSuiteDefinition(array{suiteDefinitionId?: string, suiteDefinitionVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSuiteDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSuiteDefinitionAsync(array{suiteDefinitionId?: string, suiteDefinitionVersion?: string, ...} $args = [])
 * @method \Aws\Result getSuiteRun(array $args = [])
 * @phpstan-method \Aws\Result getSuiteRun(array{suiteDefinitionId?: string, suiteRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSuiteRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSuiteRunAsync(array{suiteDefinitionId?: string, suiteRunId?: string, ...} $args = [])
 * @method \Aws\Result getSuiteRunReport(array $args = [])
 * @phpstan-method \Aws\Result getSuiteRunReport(array{suiteDefinitionId?: string, suiteRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSuiteRunReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSuiteRunReportAsync(array{suiteDefinitionId?: string, suiteRunId?: string, ...} $args = [])
 * @method \Aws\Result listSuiteDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listSuiteDefinitions(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSuiteDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSuiteDefinitionsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSuiteRuns(array $args = [])
 * @phpstan-method \Aws\Result listSuiteRuns(array{suiteDefinitionId?: string, suiteDefinitionVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSuiteRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSuiteRunsAsync(array{suiteDefinitionId?: string, suiteDefinitionVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result startSuiteRun(array $args = [])
 * @phpstan-method \Aws\Result startSuiteRun(array{
 *     suiteDefinitionId?: string,
 *     suiteDefinitionVersion?: string,
 *     suiteRunConfiguration?: array{
 *         primaryDevice?: array{thingArn?: string, certificateArn?: string, deviceRoleArn?: string, ...},
 *         selectedTestList?: list<string>,
 *         parallelRun?: bool,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSuiteRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSuiteRunAsync(array{
 *     suiteDefinitionId?: string,
 *     suiteDefinitionVersion?: string,
 *     suiteRunConfiguration?: array{
 *         primaryDevice?: array{thingArn?: string, certificateArn?: string, deviceRoleArn?: string, ...},
 *         selectedTestList?: list<string>,
 *         parallelRun?: bool,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopSuiteRun(array $args = [])
 * @phpstan-method \Aws\Result stopSuiteRun(array{suiteDefinitionId?: string, suiteRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSuiteRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopSuiteRunAsync(array{suiteDefinitionId?: string, suiteRunId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateSuiteDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateSuiteDefinition(array{
 *     suiteDefinitionId?: string,
 *     suiteDefinitionConfiguration?: array{
 *         suiteDefinitionName?: string,
 *         devices?: list<array>,
 *         intendedForQualification?: bool,
 *         isLongDurationTest?: bool,
 *         rootGroup?: string,
 *         devicePermissionRoleArn?: string,
 *         protocol?: 'MqttV3_1_1'|'MqttV3_1_1_OverWebSocket'|'MqttV5'|'MqttV5_OverWebSocket',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSuiteDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSuiteDefinitionAsync(array{
 *     suiteDefinitionId?: string,
 *     suiteDefinitionConfiguration?: array{
 *         suiteDefinitionName?: string,
 *         devices?: list<array>,
 *         intendedForQualification?: bool,
 *         isLongDurationTest?: bool,
 *         rootGroup?: string,
 *         devicePermissionRoleArn?: string,
 *         protocol?: 'MqttV3_1_1'|'MqttV3_1_1_OverWebSocket'|'MqttV5'|'MqttV5_OverWebSocket',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class IoTDeviceAdvisorClient extends AwsClient {}
