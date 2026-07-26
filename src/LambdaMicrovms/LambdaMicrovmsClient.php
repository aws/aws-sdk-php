<?php
namespace Aws\LambdaMicrovms;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Lambda MicroVMs** service.
 * @method \Aws\Result createMicrovmAuthToken(array $args = [])
 * @phpstan-method \Aws\Result createMicrovmAuthToken(array{
 *     microvmIdentifier?: string,
 *     expirationInMinutes?: int,
 *     allowedPorts?: list<array{port?: int, range?: array, allPorts?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMicrovmAuthTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMicrovmAuthTokenAsync(array{
 *     microvmIdentifier?: string,
 *     expirationInMinutes?: int,
 *     allowedPorts?: list<array{port?: int, range?: array, allPorts?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMicrovmImage(array $args = [])
 * @phpstan-method \Aws\Result createMicrovmImage(array{
 *     baseImageArn?: string,
 *     baseImageVersion?: string,
 *     buildRoleArn?: string,
 *     description?: string,
 *     codeArtifact?: array{uri?: string, ...},
 *     logging?: array{disabled?: array, cloudWatch?: array{logGroup?: string, logStream?: string, ...}, ...},
 *     egressNetworkConnectors?: list<string>,
 *     cpuConfigurations?: list<array{architecture?: 'ARM_64', ...}>,
 *     resources?: list<array{minimumMemoryInMiB?: int, ...}>,
 *     additionalOsCapabilities?: list<'ALL'>,
 *     hooks?: array{
 *         port?: int,
 *         microvmHooks?: array{
 *             run?: 'DISABLED'|'ENABLED',
 *             runTimeoutInSeconds?: int,
 *             resume?: 'DISABLED'|'ENABLED',
 *             resumeTimeoutInSeconds?: int,
 *             suspend?: 'DISABLED'|'ENABLED',
 *             suspendTimeoutInSeconds?: int,
 *             terminate?: 'DISABLED'|'ENABLED',
 *             terminateTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         microvmImageHooks?: array{
 *             ready?: 'DISABLED'|'ENABLED',
 *             readyTimeoutInSeconds?: int,
 *             validate?: 'DISABLED'|'ENABLED',
 *             validateTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     environmentVariables?: array<string, string>,
 *     name?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMicrovmImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMicrovmImageAsync(array{
 *     baseImageArn?: string,
 *     baseImageVersion?: string,
 *     buildRoleArn?: string,
 *     description?: string,
 *     codeArtifact?: array{uri?: string, ...},
 *     logging?: array{disabled?: array, cloudWatch?: array{logGroup?: string, logStream?: string, ...}, ...},
 *     egressNetworkConnectors?: list<string>,
 *     cpuConfigurations?: list<array{architecture?: 'ARM_64', ...}>,
 *     resources?: list<array{minimumMemoryInMiB?: int, ...}>,
 *     additionalOsCapabilities?: list<'ALL'>,
 *     hooks?: array{
 *         port?: int,
 *         microvmHooks?: array{
 *             run?: 'DISABLED'|'ENABLED',
 *             runTimeoutInSeconds?: int,
 *             resume?: 'DISABLED'|'ENABLED',
 *             resumeTimeoutInSeconds?: int,
 *             suspend?: 'DISABLED'|'ENABLED',
 *             suspendTimeoutInSeconds?: int,
 *             terminate?: 'DISABLED'|'ENABLED',
 *             terminateTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         microvmImageHooks?: array{
 *             ready?: 'DISABLED'|'ENABLED',
 *             readyTimeoutInSeconds?: int,
 *             validate?: 'DISABLED'|'ENABLED',
 *             validateTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     environmentVariables?: array<string, string>,
 *     name?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMicrovmShellAuthToken(array $args = [])
 * @phpstan-method \Aws\Result createMicrovmShellAuthToken(array{microvmIdentifier?: string, expirationInMinutes?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createMicrovmShellAuthTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMicrovmShellAuthTokenAsync(array{microvmIdentifier?: string, expirationInMinutes?: int, ...} $args = [])
 * @method \Aws\Result deleteMicrovmImage(array $args = [])
 * @phpstan-method \Aws\Result deleteMicrovmImage(array{imageIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMicrovmImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMicrovmImageAsync(array{imageIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteMicrovmImageVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteMicrovmImageVersion(array{imageIdentifier?: string, imageVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMicrovmImageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMicrovmImageVersionAsync(array{imageIdentifier?: string, imageVersion?: string, ...} $args = [])
 * @method \Aws\Result getMicrovm(array $args = [])
 * @phpstan-method \Aws\Result getMicrovm(array{microvmIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMicrovmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMicrovmAsync(array{microvmIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getMicrovmImage(array $args = [])
 * @phpstan-method \Aws\Result getMicrovmImage(array{imageIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMicrovmImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMicrovmImageAsync(array{imageIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getMicrovmImageBuild(array $args = [])
 * @phpstan-method \Aws\Result getMicrovmImageBuild(array{imageIdentifier?: string, imageVersion?: string, buildId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMicrovmImageBuildAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMicrovmImageBuildAsync(array{imageIdentifier?: string, imageVersion?: string, buildId?: string, ...} $args = [])
 * @method \Aws\Result getMicrovmImageVersion(array $args = [])
 * @phpstan-method \Aws\Result getMicrovmImageVersion(array{imageIdentifier?: string, imageVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMicrovmImageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMicrovmImageVersionAsync(array{imageIdentifier?: string, imageVersion?: string, ...} $args = [])
 * @method \Aws\Result listManagedMicrovmImageVersions(array $args = [])
 * @phpstan-method \Aws\Result listManagedMicrovmImageVersions(array{maxResults?: int, nextToken?: string, imageIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedMicrovmImageVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedMicrovmImageVersionsAsync(array{maxResults?: int, nextToken?: string, imageIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listManagedMicrovmImages(array $args = [])
 * @phpstan-method \Aws\Result listManagedMicrovmImages(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedMicrovmImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedMicrovmImagesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listMicrovmImageBuilds(array $args = [])
 * @phpstan-method \Aws\Result listMicrovmImageBuilds(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     imageIdentifier?: string,
 *     imageVersion?: string,
 *     architecture?: 'ARM_64',
 *     chipset?: 'GRAVITON',
 *     chipsetGeneration?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMicrovmImageBuildsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMicrovmImageBuildsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     imageIdentifier?: string,
 *     imageVersion?: string,
 *     architecture?: 'ARM_64',
 *     chipset?: 'GRAVITON',
 *     chipsetGeneration?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMicrovmImageVersions(array $args = [])
 * @phpstan-method \Aws\Result listMicrovmImageVersions(array{maxResults?: int, nextToken?: string, imageIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMicrovmImageVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMicrovmImageVersionsAsync(array{maxResults?: int, nextToken?: string, imageIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listMicrovmImages(array $args = [])
 * @phpstan-method \Aws\Result listMicrovmImages(array{maxResults?: int, nextToken?: string, nameFilter?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMicrovmImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMicrovmImagesAsync(array{maxResults?: int, nextToken?: string, nameFilter?: string, ...} $args = [])
 * @method \Aws\Result listMicrovms(array $args = [])
 * @phpstan-method \Aws\Result listMicrovms(array{maxResults?: int, nextToken?: string, imageIdentifier?: string, imageVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMicrovmsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMicrovmsAsync(array{maxResults?: int, nextToken?: string, imageIdentifier?: string, imageVersion?: string, ...} $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{Resource?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{Resource?: string, ...} $args = [])
 * @method \Aws\Result resumeMicrovm(array $args = [])
 * @phpstan-method \Aws\Result resumeMicrovm(array{microvmIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeMicrovmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeMicrovmAsync(array{microvmIdentifier?: string, ...} $args = [])
 * @method \Aws\Result runMicrovm(array $args = [])
 * @phpstan-method \Aws\Result runMicrovm(array{
 *     ingressNetworkConnectors?: list<string>,
 *     egressNetworkConnectors?: list<string>,
 *     imageIdentifier?: string,
 *     imageVersion?: string,
 *     executionRoleArn?: string,
 *     idlePolicy?: array{maxIdleDurationSeconds?: int, suspendedDurationSeconds?: int, autoResumeEnabled?: bool, ...},
 *     logging?: array{disabled?: array, cloudWatch?: array{logGroup?: string, logStream?: string, ...}, ...},
 *     runHookPayload?: string,
 *     maximumDurationInSeconds?: int,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise runMicrovmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise runMicrovmAsync(array{
 *     ingressNetworkConnectors?: list<string>,
 *     egressNetworkConnectors?: list<string>,
 *     imageIdentifier?: string,
 *     imageVersion?: string,
 *     executionRoleArn?: string,
 *     idlePolicy?: array{maxIdleDurationSeconds?: int, suspendedDurationSeconds?: int, autoResumeEnabled?: bool, ...},
 *     logging?: array{disabled?: array, cloudWatch?: array{logGroup?: string, logStream?: string, ...}, ...},
 *     runHookPayload?: string,
 *     maximumDurationInSeconds?: int,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result suspendMicrovm(array $args = [])
 * @phpstan-method \Aws\Result suspendMicrovm(array{microvmIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise suspendMicrovmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise suspendMicrovmAsync(array{microvmIdentifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{Resource?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{Resource?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result terminateMicrovm(array $args = [])
 * @phpstan-method \Aws\Result terminateMicrovm(array{microvmIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateMicrovmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateMicrovmAsync(array{microvmIdentifier?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{Resource?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{Resource?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateMicrovmImage(array $args = [])
 * @phpstan-method \Aws\Result updateMicrovmImage(array{
 *     baseImageArn?: string,
 *     baseImageVersion?: string,
 *     buildRoleArn?: string,
 *     description?: string,
 *     codeArtifact?: array{uri?: string, ...},
 *     logging?: array{disabled?: array, cloudWatch?: array{logGroup?: string, logStream?: string, ...}, ...},
 *     egressNetworkConnectors?: list<string>,
 *     cpuConfigurations?: list<array{architecture?: 'ARM_64', ...}>,
 *     resources?: list<array{minimumMemoryInMiB?: int, ...}>,
 *     additionalOsCapabilities?: list<'ALL'>,
 *     hooks?: array{
 *         port?: int,
 *         microvmHooks?: array{
 *             run?: 'DISABLED'|'ENABLED',
 *             runTimeoutInSeconds?: int,
 *             resume?: 'DISABLED'|'ENABLED',
 *             resumeTimeoutInSeconds?: int,
 *             suspend?: 'DISABLED'|'ENABLED',
 *             suspendTimeoutInSeconds?: int,
 *             terminate?: 'DISABLED'|'ENABLED',
 *             terminateTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         microvmImageHooks?: array{
 *             ready?: 'DISABLED'|'ENABLED',
 *             readyTimeoutInSeconds?: int,
 *             validate?: 'DISABLED'|'ENABLED',
 *             validateTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     environmentVariables?: array<string, string>,
 *     imageIdentifier?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMicrovmImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMicrovmImageAsync(array{
 *     baseImageArn?: string,
 *     baseImageVersion?: string,
 *     buildRoleArn?: string,
 *     description?: string,
 *     codeArtifact?: array{uri?: string, ...},
 *     logging?: array{disabled?: array, cloudWatch?: array{logGroup?: string, logStream?: string, ...}, ...},
 *     egressNetworkConnectors?: list<string>,
 *     cpuConfigurations?: list<array{architecture?: 'ARM_64', ...}>,
 *     resources?: list<array{minimumMemoryInMiB?: int, ...}>,
 *     additionalOsCapabilities?: list<'ALL'>,
 *     hooks?: array{
 *         port?: int,
 *         microvmHooks?: array{
 *             run?: 'DISABLED'|'ENABLED',
 *             runTimeoutInSeconds?: int,
 *             resume?: 'DISABLED'|'ENABLED',
 *             resumeTimeoutInSeconds?: int,
 *             suspend?: 'DISABLED'|'ENABLED',
 *             suspendTimeoutInSeconds?: int,
 *             terminate?: 'DISABLED'|'ENABLED',
 *             terminateTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         microvmImageHooks?: array{
 *             ready?: 'DISABLED'|'ENABLED',
 *             readyTimeoutInSeconds?: int,
 *             validate?: 'DISABLED'|'ENABLED',
 *             validateTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     environmentVariables?: array<string, string>,
 *     imageIdentifier?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMicrovmImageVersion(array $args = [])
 * @phpstan-method \Aws\Result updateMicrovmImageVersion(array{imageIdentifier?: string, imageVersion?: string, status?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMicrovmImageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMicrovmImageVersionAsync(array{imageIdentifier?: string, imageVersion?: string, status?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 */
class LambdaMicrovmsClient extends AwsClient {}
