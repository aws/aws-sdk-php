<?php
namespace Aws\DeviceFarm;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon DeviceFarm** service.
 *
 * @method \Aws\Result createDevicePool(array $args = [])
 * @phpstan-method \Aws\Result createDevicePool(array{
 *     projectArn?: string,
 *     name?: string,
 *     description?: string,
 *     rules?: list<array{
 *         attribute?: 'APPIUM_VERSION'|'ARN'|'AVAILABILITY'|'FLEET_TYPE'|'FORM_FACTOR'|'INSTANCE_ARN'|'INSTANCE_LABELS'|'MANUFACTURER'|'MODEL'|'OS_VERSION'|'PLATFORM'|'REMOTE_ACCESS_ENABLED'|'REMOTE_DEBUG_ENABLED',
 *         operator?: 'CONTAINS'|'EQUALS'|'GREATER_THAN'|'GREATER_THAN_OR_EQUALS'|'IN'|'LESS_THAN'|'LESS_THAN_OR_EQUALS'|'NOT_IN',
 *         value?: string,
 *         ...,
 *     }>,
 *     maxDevices?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDevicePoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDevicePoolAsync(array{
 *     projectArn?: string,
 *     name?: string,
 *     description?: string,
 *     rules?: list<array{
 *         attribute?: 'APPIUM_VERSION'|'ARN'|'AVAILABILITY'|'FLEET_TYPE'|'FORM_FACTOR'|'INSTANCE_ARN'|'INSTANCE_LABELS'|'MANUFACTURER'|'MODEL'|'OS_VERSION'|'PLATFORM'|'REMOTE_ACCESS_ENABLED'|'REMOTE_DEBUG_ENABLED',
 *         operator?: 'CONTAINS'|'EQUALS'|'GREATER_THAN'|'GREATER_THAN_OR_EQUALS'|'IN'|'LESS_THAN'|'LESS_THAN_OR_EQUALS'|'NOT_IN',
 *         value?: string,
 *         ...,
 *     }>,
 *     maxDevices?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result createInstanceProfile(array{
 *     name?: string,
 *     description?: string,
 *     packageCleanup?: bool,
 *     excludeAppPackagesFromCleanup?: list<string>,
 *     rebootAfterUse?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstanceProfileAsync(array{
 *     name?: string,
 *     description?: string,
 *     packageCleanup?: bool,
 *     excludeAppPackagesFromCleanup?: list<string>,
 *     rebootAfterUse?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNetworkProfile(array $args = [])
 * @phpstan-method \Aws\Result createNetworkProfile(array{
 *     projectArn?: string,
 *     name?: string,
 *     description?: string,
 *     type?: 'CURATED'|'PRIVATE',
 *     uplinkBandwidthBits?: int,
 *     downlinkBandwidthBits?: int,
 *     uplinkDelayMs?: int,
 *     downlinkDelayMs?: int,
 *     uplinkJitterMs?: int,
 *     downlinkJitterMs?: int,
 *     uplinkLossPercent?: int,
 *     downlinkLossPercent?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNetworkProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNetworkProfileAsync(array{
 *     projectArn?: string,
 *     name?: string,
 *     description?: string,
 *     type?: 'CURATED'|'PRIVATE',
 *     uplinkBandwidthBits?: int,
 *     downlinkBandwidthBits?: int,
 *     uplinkDelayMs?: int,
 *     downlinkDelayMs?: int,
 *     uplinkJitterMs?: int,
 *     downlinkJitterMs?: int,
 *     uplinkLossPercent?: int,
 *     downlinkLossPercent?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @phpstan-method \Aws\Result createProject(array{
 *     name?: string,
 *     defaultJobTimeoutMinutes?: int,
 *     vpcConfig?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, vpcId?: string, ...},
 *     environmentVariables?: list<array{name?: string, value?: string, ...}>,
 *     executionRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectAsync(array{
 *     name?: string,
 *     defaultJobTimeoutMinutes?: int,
 *     vpcConfig?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, vpcId?: string, ...},
 *     environmentVariables?: list<array{name?: string, value?: string, ...}>,
 *     executionRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRemoteAccessSession(array $args = [])
 * @phpstan-method \Aws\Result createRemoteAccessSession(array{
 *     projectArn?: string,
 *     deviceArn?: string,
 *     appArn?: string,
 *     instanceArn?: string,
 *     name?: string,
 *     configuration?: array{
 *         auxiliaryApps?: list<string>,
 *         billingMethod?: 'METERED'|'UNMETERED',
 *         vpceConfigurationArns?: list<string>,
 *         deviceProxy?: array{host?: string, port?: int, ...},
 *         ...,
 *     },
 *     interactionMode?: 'INTERACTIVE'|'NO_VIDEO'|'VIDEO_ONLY',
 *     skipAppResign?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRemoteAccessSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRemoteAccessSessionAsync(array{
 *     projectArn?: string,
 *     deviceArn?: string,
 *     appArn?: string,
 *     instanceArn?: string,
 *     name?: string,
 *     configuration?: array{
 *         auxiliaryApps?: list<string>,
 *         billingMethod?: 'METERED'|'UNMETERED',
 *         vpceConfigurationArns?: list<string>,
 *         deviceProxy?: array{host?: string, port?: int, ...},
 *         ...,
 *     },
 *     interactionMode?: 'INTERACTIVE'|'NO_VIDEO'|'VIDEO_ONLY',
 *     skipAppResign?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTestGridProject(array $args = [])
 * @phpstan-method \Aws\Result createTestGridProject(array{
 *     name?: string,
 *     description?: string,
 *     vpcConfig?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, vpcId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTestGridProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTestGridProjectAsync(array{
 *     name?: string,
 *     description?: string,
 *     vpcConfig?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, vpcId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTestGridUrl(array $args = [])
 * @phpstan-method \Aws\Result createTestGridUrl(array{projectArn?: string, expiresInSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTestGridUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTestGridUrlAsync(array{projectArn?: string, expiresInSeconds?: int, ...} $args = [])
 * @method \Aws\Result createUpload(array $args = [])
 * @phpstan-method \Aws\Result createUpload(array{
 *     projectArn?: string,
 *     name?: string,
 *     type?: 'ANDROID_APP'|'APPIUM_JAVA_JUNIT_TEST_PACKAGE'|'APPIUM_JAVA_JUNIT_TEST_SPEC'|'APPIUM_JAVA_TESTNG_TEST_PACKAGE'|'APPIUM_JAVA_TESTNG_TEST_SPEC'|'APPIUM_NODE_TEST_PACKAGE'|'APPIUM_NODE_TEST_SPEC'|'APPIUM_PYTHON_TEST_PACKAGE'|'APPIUM_PYTHON_TEST_SPEC'|'APPIUM_RUBY_TEST_PACKAGE'|'APPIUM_RUBY_TEST_SPEC'|'APPIUM_WEB_JAVA_JUNIT_TEST_PACKAGE'|'APPIUM_WEB_JAVA_JUNIT_TEST_SPEC'|'APPIUM_WEB_JAVA_TESTNG_TEST_PACKAGE'|'APPIUM_WEB_JAVA_TESTNG_TEST_SPEC'|'APPIUM_WEB_NODE_TEST_PACKAGE'|'APPIUM_WEB_NODE_TEST_SPEC'|'APPIUM_WEB_PYTHON_TEST_PACKAGE'|'APPIUM_WEB_PYTHON_TEST_SPEC'|'APPIUM_WEB_RUBY_TEST_PACKAGE'|'APPIUM_WEB_RUBY_TEST_SPEC'|'CALABASH_TEST_PACKAGE'|'EXTERNAL_DATA'|'INSTRUMENTATION_TEST_PACKAGE'|'INSTRUMENTATION_TEST_SPEC'|'IOS_APP'|'UIAUTOMATION_TEST_PACKAGE'|'UIAUTOMATOR_TEST_PACKAGE'|'WEB_APP'|'XCTEST_TEST_PACKAGE'|'XCTEST_UI_TEST_PACKAGE'|'XCTEST_UI_TEST_SPEC',
 *     contentType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUploadAsync(array{
 *     projectArn?: string,
 *     name?: string,
 *     type?: 'ANDROID_APP'|'APPIUM_JAVA_JUNIT_TEST_PACKAGE'|'APPIUM_JAVA_JUNIT_TEST_SPEC'|'APPIUM_JAVA_TESTNG_TEST_PACKAGE'|'APPIUM_JAVA_TESTNG_TEST_SPEC'|'APPIUM_NODE_TEST_PACKAGE'|'APPIUM_NODE_TEST_SPEC'|'APPIUM_PYTHON_TEST_PACKAGE'|'APPIUM_PYTHON_TEST_SPEC'|'APPIUM_RUBY_TEST_PACKAGE'|'APPIUM_RUBY_TEST_SPEC'|'APPIUM_WEB_JAVA_JUNIT_TEST_PACKAGE'|'APPIUM_WEB_JAVA_JUNIT_TEST_SPEC'|'APPIUM_WEB_JAVA_TESTNG_TEST_PACKAGE'|'APPIUM_WEB_JAVA_TESTNG_TEST_SPEC'|'APPIUM_WEB_NODE_TEST_PACKAGE'|'APPIUM_WEB_NODE_TEST_SPEC'|'APPIUM_WEB_PYTHON_TEST_PACKAGE'|'APPIUM_WEB_PYTHON_TEST_SPEC'|'APPIUM_WEB_RUBY_TEST_PACKAGE'|'APPIUM_WEB_RUBY_TEST_SPEC'|'CALABASH_TEST_PACKAGE'|'EXTERNAL_DATA'|'INSTRUMENTATION_TEST_PACKAGE'|'INSTRUMENTATION_TEST_SPEC'|'IOS_APP'|'UIAUTOMATION_TEST_PACKAGE'|'UIAUTOMATOR_TEST_PACKAGE'|'WEB_APP'|'XCTEST_TEST_PACKAGE'|'XCTEST_UI_TEST_PACKAGE'|'XCTEST_UI_TEST_SPEC',
 *     contentType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVPCEConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createVPCEConfiguration(array{
 *     vpceConfigurationName?: string,
 *     vpceServiceName?: string,
 *     serviceDnsName?: string,
 *     vpceConfigurationDescription?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVPCEConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVPCEConfigurationAsync(array{
 *     vpceConfigurationName?: string,
 *     vpceServiceName?: string,
 *     serviceDnsName?: string,
 *     vpceConfigurationDescription?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDevicePool(array $args = [])
 * @phpstan-method \Aws\Result deleteDevicePool(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDevicePoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDevicePoolAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteInstanceProfile(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceProfileAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteNetworkProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteNetworkProfile(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNetworkProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNetworkProfileAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @phpstan-method \Aws\Result deleteProject(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteRemoteAccessSession(array $args = [])
 * @phpstan-method \Aws\Result deleteRemoteAccessSession(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRemoteAccessSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRemoteAccessSessionAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteRun(array $args = [])
 * @phpstan-method \Aws\Result deleteRun(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRunAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteTestGridProject(array $args = [])
 * @phpstan-method \Aws\Result deleteTestGridProject(array{projectArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTestGridProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTestGridProjectAsync(array{projectArn?: string, ...} $args = [])
 * @method \Aws\Result deleteUpload(array $args = [])
 * @phpstan-method \Aws\Result deleteUpload(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUploadAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteVPCEConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteVPCEConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVPCEConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVPCEConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getDevice(array $args = [])
 * @phpstan-method \Aws\Result getDevice(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getDeviceInstance(array $args = [])
 * @phpstan-method \Aws\Result getDeviceInstance(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceInstanceAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getDevicePool(array $args = [])
 * @phpstan-method \Aws\Result getDevicePool(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevicePoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDevicePoolAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getDevicePoolCompatibility(array $args = [])
 * @phpstan-method \Aws\Result getDevicePoolCompatibility(array{
 *     devicePoolArn?: string,
 *     appArn?: string,
 *     testType?: 'APPIUM_JAVA_JUNIT'|'APPIUM_JAVA_TESTNG'|'APPIUM_NODE'|'APPIUM_PYTHON'|'APPIUM_RUBY'|'APPIUM_WEB_JAVA_JUNIT'|'APPIUM_WEB_JAVA_TESTNG'|'APPIUM_WEB_NODE'|'APPIUM_WEB_PYTHON'|'APPIUM_WEB_RUBY'|'BUILTIN_FUZZ'|'INSTRUMENTATION'|'XCTEST'|'XCTEST_UI',
 *     test?: array{
 *         type?: 'APPIUM_JAVA_JUNIT'|'APPIUM_JAVA_TESTNG'|'APPIUM_NODE'|'APPIUM_PYTHON'|'APPIUM_RUBY'|'APPIUM_WEB_JAVA_JUNIT'|'APPIUM_WEB_JAVA_TESTNG'|'APPIUM_WEB_NODE'|'APPIUM_WEB_PYTHON'|'APPIUM_WEB_RUBY'|'BUILTIN_FUZZ'|'INSTRUMENTATION'|'XCTEST'|'XCTEST_UI',
 *         testPackageArn?: string,
 *         testSpecArn?: string,
 *         filter?: string,
 *         parameters?: array<string, string>,
 *         ...,
 *     },
 *     configuration?: array{
 *         extraDataPackageArn?: string,
 *         networkProfileArn?: string,
 *         locale?: string,
 *         location?: array{latitude?: float, longitude?: float, ...},
 *         vpceConfigurationArns?: list<string>,
 *         deviceProxy?: array{host?: string, port?: int, ...},
 *         customerArtifactPaths?: array{iosPaths?: list<string>, androidPaths?: list<string>, deviceHostPaths?: list<string>, ...},
 *         radios?: array{wifi?: bool, bluetooth?: bool, nfc?: bool, gps?: bool, ...},
 *         auxiliaryApps?: list<string>,
 *         billingMethod?: 'METERED'|'UNMETERED',
 *         environmentVariables?: list<array>,
 *         executionRoleArn?: string,
 *         ...,
 *     },
 *     projectArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevicePoolCompatibilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDevicePoolCompatibilityAsync(array{
 *     devicePoolArn?: string,
 *     appArn?: string,
 *     testType?: 'APPIUM_JAVA_JUNIT'|'APPIUM_JAVA_TESTNG'|'APPIUM_NODE'|'APPIUM_PYTHON'|'APPIUM_RUBY'|'APPIUM_WEB_JAVA_JUNIT'|'APPIUM_WEB_JAVA_TESTNG'|'APPIUM_WEB_NODE'|'APPIUM_WEB_PYTHON'|'APPIUM_WEB_RUBY'|'BUILTIN_FUZZ'|'INSTRUMENTATION'|'XCTEST'|'XCTEST_UI',
 *     test?: array{
 *         type?: 'APPIUM_JAVA_JUNIT'|'APPIUM_JAVA_TESTNG'|'APPIUM_NODE'|'APPIUM_PYTHON'|'APPIUM_RUBY'|'APPIUM_WEB_JAVA_JUNIT'|'APPIUM_WEB_JAVA_TESTNG'|'APPIUM_WEB_NODE'|'APPIUM_WEB_PYTHON'|'APPIUM_WEB_RUBY'|'BUILTIN_FUZZ'|'INSTRUMENTATION'|'XCTEST'|'XCTEST_UI',
 *         testPackageArn?: string,
 *         testSpecArn?: string,
 *         filter?: string,
 *         parameters?: array<string, string>,
 *         ...,
 *     },
 *     configuration?: array{
 *         extraDataPackageArn?: string,
 *         networkProfileArn?: string,
 *         locale?: string,
 *         location?: array{latitude?: float, longitude?: float, ...},
 *         vpceConfigurationArns?: list<string>,
 *         deviceProxy?: array{host?: string, port?: int, ...},
 *         customerArtifactPaths?: array{iosPaths?: list<string>, androidPaths?: list<string>, deviceHostPaths?: list<string>, ...},
 *         radios?: array{wifi?: bool, bluetooth?: bool, nfc?: bool, gps?: bool, ...},
 *         auxiliaryApps?: list<string>,
 *         billingMethod?: 'METERED'|'UNMETERED',
 *         environmentVariables?: list<array>,
 *         executionRoleArn?: string,
 *         ...,
 *     },
 *     projectArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result getInstanceProfile(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceProfileAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @phpstan-method \Aws\Result getJob(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getNetworkProfile(array $args = [])
 * @phpstan-method \Aws\Result getNetworkProfile(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkProfileAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getOfferingStatus(array $args = [])
 * @phpstan-method \Aws\Result getOfferingStatus(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOfferingStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOfferingStatusAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result getProject(array $args = [])
 * @phpstan-method \Aws\Result getProject(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProjectAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getRemoteAccessSession(array $args = [])
 * @phpstan-method \Aws\Result getRemoteAccessSession(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRemoteAccessSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRemoteAccessSessionAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getRun(array $args = [])
 * @phpstan-method \Aws\Result getRun(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRunAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getSuite(array $args = [])
 * @phpstan-method \Aws\Result getSuite(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSuiteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSuiteAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getTest(array $args = [])
 * @phpstan-method \Aws\Result getTest(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTestAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getTestGridProject(array $args = [])
 * @phpstan-method \Aws\Result getTestGridProject(array{projectArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTestGridProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTestGridProjectAsync(array{projectArn?: string, ...} $args = [])
 * @method \Aws\Result getTestGridSession(array $args = [])
 * @phpstan-method \Aws\Result getTestGridSession(array{projectArn?: string, sessionId?: string, sessionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTestGridSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTestGridSessionAsync(array{projectArn?: string, sessionId?: string, sessionArn?: string, ...} $args = [])
 * @method \Aws\Result getUpload(array $args = [])
 * @phpstan-method \Aws\Result getUpload(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUploadAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getVPCEConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getVPCEConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVPCEConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVPCEConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result installToRemoteAccessSession(array $args = [])
 * @phpstan-method \Aws\Result installToRemoteAccessSession(array{remoteAccessSessionArn?: string, appArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise installToRemoteAccessSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise installToRemoteAccessSessionAsync(array{remoteAccessSessionArn?: string, appArn?: string, ...} $args = [])
 * @method \Aws\Result listArtifacts(array $args = [])
 * @phpstan-method \Aws\Result listArtifacts(array{arn?: string, type?: 'FILE'|'LOG'|'SCREENSHOT', nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listArtifactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listArtifactsAsync(array{arn?: string, type?: 'FILE'|'LOG'|'SCREENSHOT', nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeviceInstances(array $args = [])
 * @phpstan-method \Aws\Result listDeviceInstances(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeviceInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeviceInstancesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDevicePools(array $args = [])
 * @phpstan-method \Aws\Result listDevicePools(array{arn?: string, type?: 'CURATED'|'PRIVATE', nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevicePoolsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevicePoolsAsync(array{arn?: string, type?: 'CURATED'|'PRIVATE', nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDevices(array $args = [])
 * @phpstan-method \Aws\Result listDevices(array{
 *     arn?: string,
 *     nextToken?: string,
 *     filters?: list<array{
 *         attribute?: 'ARN'|'AVAILABILITY'|'FLEET_TYPE'|'FORM_FACTOR'|'INSTANCE_ARN'|'INSTANCE_LABELS'|'MANUFACTURER'|'MODEL'|'OS_VERSION'|'PLATFORM'|'REMOTE_ACCESS_ENABLED'|'REMOTE_DEBUG_ENABLED',
 *         operator?: 'CONTAINS'|'EQUALS'|'GREATER_THAN'|'GREATER_THAN_OR_EQUALS'|'IN'|'LESS_THAN'|'LESS_THAN_OR_EQUALS'|'NOT_IN',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevicesAsync(array{
 *     arn?: string,
 *     nextToken?: string,
 *     filters?: list<array{
 *         attribute?: 'ARN'|'AVAILABILITY'|'FLEET_TYPE'|'FORM_FACTOR'|'INSTANCE_ARN'|'INSTANCE_LABELS'|'MANUFACTURER'|'MODEL'|'OS_VERSION'|'PLATFORM'|'REMOTE_ACCESS_ENABLED'|'REMOTE_DEBUG_ENABLED',
 *         operator?: 'CONTAINS'|'EQUALS'|'GREATER_THAN'|'GREATER_THAN_OR_EQUALS'|'IN'|'LESS_THAN'|'LESS_THAN_OR_EQUALS'|'NOT_IN',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInstanceProfiles(array $args = [])
 * @phpstan-method \Aws\Result listInstanceProfiles(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstanceProfilesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listNetworkProfiles(array $args = [])
 * @phpstan-method \Aws\Result listNetworkProfiles(array{arn?: string, type?: 'CURATED'|'PRIVATE', nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkProfilesAsync(array{arn?: string, type?: 'CURATED'|'PRIVATE', nextToken?: string, ...} $args = [])
 * @method \Aws\Result listOfferingPromotions(array $args = [])
 * @phpstan-method \Aws\Result listOfferingPromotions(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOfferingPromotionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOfferingPromotionsAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listOfferingTransactions(array $args = [])
 * @phpstan-method \Aws\Result listOfferingTransactions(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOfferingTransactionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOfferingTransactionsAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listOfferings(array $args = [])
 * @phpstan-method \Aws\Result listOfferings(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOfferingsAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @phpstan-method \Aws\Result listProjects(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectsAsync(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRemoteAccessSessions(array $args = [])
 * @phpstan-method \Aws\Result listRemoteAccessSessions(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRemoteAccessSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRemoteAccessSessionsAsync(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRuns(array $args = [])
 * @phpstan-method \Aws\Result listRuns(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRunsAsync(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSamples(array $args = [])
 * @phpstan-method \Aws\Result listSamples(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSamplesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSamplesAsync(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSuites(array $args = [])
 * @phpstan-method \Aws\Result listSuites(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSuitesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSuitesAsync(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result listTestGridProjects(array $args = [])
 * @phpstan-method \Aws\Result listTestGridProjects(array{maxResult?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestGridProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestGridProjectsAsync(array{maxResult?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTestGridSessionActions(array $args = [])
 * @phpstan-method \Aws\Result listTestGridSessionActions(array{sessionArn?: string, maxResult?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestGridSessionActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestGridSessionActionsAsync(array{sessionArn?: string, maxResult?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTestGridSessionArtifacts(array $args = [])
 * @phpstan-method \Aws\Result listTestGridSessionArtifacts(array{sessionArn?: string, type?: 'LOG'|'VIDEO', maxResult?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestGridSessionArtifactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestGridSessionArtifactsAsync(array{sessionArn?: string, type?: 'LOG'|'VIDEO', maxResult?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTestGridSessions(array $args = [])
 * @phpstan-method \Aws\Result listTestGridSessions(array{
 *     projectArn?: string,
 *     status?: 'ACTIVE'|'CLOSED'|'ERRORED',
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     endTimeAfter?: int|string|\DateTimeInterface,
 *     endTimeBefore?: int|string|\DateTimeInterface,
 *     maxResult?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestGridSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestGridSessionsAsync(array{
 *     projectArn?: string,
 *     status?: 'ACTIVE'|'CLOSED'|'ERRORED',
 *     creationTimeAfter?: int|string|\DateTimeInterface,
 *     creationTimeBefore?: int|string|\DateTimeInterface,
 *     endTimeAfter?: int|string|\DateTimeInterface,
 *     endTimeBefore?: int|string|\DateTimeInterface,
 *     maxResult?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTests(array $args = [])
 * @phpstan-method \Aws\Result listTests(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestsAsync(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listUniqueProblems(array $args = [])
 * @phpstan-method \Aws\Result listUniqueProblems(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUniqueProblemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUniqueProblemsAsync(array{arn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listUploads(array $args = [])
 * @phpstan-method \Aws\Result listUploads(array{
 *     arn?: string,
 *     type?: 'ANDROID_APP'|'APPIUM_JAVA_JUNIT_TEST_PACKAGE'|'APPIUM_JAVA_JUNIT_TEST_SPEC'|'APPIUM_JAVA_TESTNG_TEST_PACKAGE'|'APPIUM_JAVA_TESTNG_TEST_SPEC'|'APPIUM_NODE_TEST_PACKAGE'|'APPIUM_NODE_TEST_SPEC'|'APPIUM_PYTHON_TEST_PACKAGE'|'APPIUM_PYTHON_TEST_SPEC'|'APPIUM_RUBY_TEST_PACKAGE'|'APPIUM_RUBY_TEST_SPEC'|'APPIUM_WEB_JAVA_JUNIT_TEST_PACKAGE'|'APPIUM_WEB_JAVA_JUNIT_TEST_SPEC'|'APPIUM_WEB_JAVA_TESTNG_TEST_PACKAGE'|'APPIUM_WEB_JAVA_TESTNG_TEST_SPEC'|'APPIUM_WEB_NODE_TEST_PACKAGE'|'APPIUM_WEB_NODE_TEST_SPEC'|'APPIUM_WEB_PYTHON_TEST_PACKAGE'|'APPIUM_WEB_PYTHON_TEST_SPEC'|'APPIUM_WEB_RUBY_TEST_PACKAGE'|'APPIUM_WEB_RUBY_TEST_SPEC'|'CALABASH_TEST_PACKAGE'|'EXTERNAL_DATA'|'INSTRUMENTATION_TEST_PACKAGE'|'INSTRUMENTATION_TEST_SPEC'|'IOS_APP'|'UIAUTOMATION_TEST_PACKAGE'|'UIAUTOMATOR_TEST_PACKAGE'|'WEB_APP'|'XCTEST_TEST_PACKAGE'|'XCTEST_UI_TEST_PACKAGE'|'XCTEST_UI_TEST_SPEC',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUploadsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUploadsAsync(array{
 *     arn?: string,
 *     type?: 'ANDROID_APP'|'APPIUM_JAVA_JUNIT_TEST_PACKAGE'|'APPIUM_JAVA_JUNIT_TEST_SPEC'|'APPIUM_JAVA_TESTNG_TEST_PACKAGE'|'APPIUM_JAVA_TESTNG_TEST_SPEC'|'APPIUM_NODE_TEST_PACKAGE'|'APPIUM_NODE_TEST_SPEC'|'APPIUM_PYTHON_TEST_PACKAGE'|'APPIUM_PYTHON_TEST_SPEC'|'APPIUM_RUBY_TEST_PACKAGE'|'APPIUM_RUBY_TEST_SPEC'|'APPIUM_WEB_JAVA_JUNIT_TEST_PACKAGE'|'APPIUM_WEB_JAVA_JUNIT_TEST_SPEC'|'APPIUM_WEB_JAVA_TESTNG_TEST_PACKAGE'|'APPIUM_WEB_JAVA_TESTNG_TEST_SPEC'|'APPIUM_WEB_NODE_TEST_PACKAGE'|'APPIUM_WEB_NODE_TEST_SPEC'|'APPIUM_WEB_PYTHON_TEST_PACKAGE'|'APPIUM_WEB_PYTHON_TEST_SPEC'|'APPIUM_WEB_RUBY_TEST_PACKAGE'|'APPIUM_WEB_RUBY_TEST_SPEC'|'CALABASH_TEST_PACKAGE'|'EXTERNAL_DATA'|'INSTRUMENTATION_TEST_PACKAGE'|'INSTRUMENTATION_TEST_SPEC'|'IOS_APP'|'UIAUTOMATION_TEST_PACKAGE'|'UIAUTOMATOR_TEST_PACKAGE'|'WEB_APP'|'XCTEST_TEST_PACKAGE'|'XCTEST_UI_TEST_PACKAGE'|'XCTEST_UI_TEST_SPEC',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listVPCEConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listVPCEConfigurations(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVPCEConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVPCEConfigurationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result purchaseOffering(array $args = [])
 * @phpstan-method \Aws\Result purchaseOffering(array{offeringId?: string, quantity?: int, offeringPromotionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purchaseOfferingAsync(array{offeringId?: string, quantity?: int, offeringPromotionId?: string, ...} $args = [])
 * @method \Aws\Result renewOffering(array $args = [])
 * @phpstan-method \Aws\Result renewOffering(array{offeringId?: string, quantity?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise renewOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise renewOfferingAsync(array{offeringId?: string, quantity?: int, ...} $args = [])
 * @method \Aws\Result scheduleRun(array $args = [])
 * @phpstan-method \Aws\Result scheduleRun(array{
 *     projectArn?: string,
 *     appArn?: string,
 *     devicePoolArn?: string,
 *     deviceSelectionConfiguration?: array{filters?: list<array>, maxDevices?: int, ...},
 *     name?: string,
 *     test?: array{
 *         type?: 'APPIUM_JAVA_JUNIT'|'APPIUM_JAVA_TESTNG'|'APPIUM_NODE'|'APPIUM_PYTHON'|'APPIUM_RUBY'|'APPIUM_WEB_JAVA_JUNIT'|'APPIUM_WEB_JAVA_TESTNG'|'APPIUM_WEB_NODE'|'APPIUM_WEB_PYTHON'|'APPIUM_WEB_RUBY'|'BUILTIN_FUZZ'|'INSTRUMENTATION'|'XCTEST'|'XCTEST_UI',
 *         testPackageArn?: string,
 *         testSpecArn?: string,
 *         filter?: string,
 *         parameters?: array<string, string>,
 *         ...,
 *     },
 *     configuration?: array{
 *         extraDataPackageArn?: string,
 *         networkProfileArn?: string,
 *         locale?: string,
 *         location?: array{latitude?: float, longitude?: float, ...},
 *         vpceConfigurationArns?: list<string>,
 *         deviceProxy?: array{host?: string, port?: int, ...},
 *         customerArtifactPaths?: array{iosPaths?: list<string>, androidPaths?: list<string>, deviceHostPaths?: list<string>, ...},
 *         radios?: array{wifi?: bool, bluetooth?: bool, nfc?: bool, gps?: bool, ...},
 *         auxiliaryApps?: list<string>,
 *         billingMethod?: 'METERED'|'UNMETERED',
 *         environmentVariables?: list<array>,
 *         executionRoleArn?: string,
 *         ...,
 *     },
 *     executionConfiguration?: array{
 *         jobTimeoutMinutes?: int,
 *         accountsCleanup?: bool,
 *         appPackagesCleanup?: bool,
 *         videoCapture?: bool,
 *         skipAppResign?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise scheduleRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise scheduleRunAsync(array{
 *     projectArn?: string,
 *     appArn?: string,
 *     devicePoolArn?: string,
 *     deviceSelectionConfiguration?: array{filters?: list<array>, maxDevices?: int, ...},
 *     name?: string,
 *     test?: array{
 *         type?: 'APPIUM_JAVA_JUNIT'|'APPIUM_JAVA_TESTNG'|'APPIUM_NODE'|'APPIUM_PYTHON'|'APPIUM_RUBY'|'APPIUM_WEB_JAVA_JUNIT'|'APPIUM_WEB_JAVA_TESTNG'|'APPIUM_WEB_NODE'|'APPIUM_WEB_PYTHON'|'APPIUM_WEB_RUBY'|'BUILTIN_FUZZ'|'INSTRUMENTATION'|'XCTEST'|'XCTEST_UI',
 *         testPackageArn?: string,
 *         testSpecArn?: string,
 *         filter?: string,
 *         parameters?: array<string, string>,
 *         ...,
 *     },
 *     configuration?: array{
 *         extraDataPackageArn?: string,
 *         networkProfileArn?: string,
 *         locale?: string,
 *         location?: array{latitude?: float, longitude?: float, ...},
 *         vpceConfigurationArns?: list<string>,
 *         deviceProxy?: array{host?: string, port?: int, ...},
 *         customerArtifactPaths?: array{iosPaths?: list<string>, androidPaths?: list<string>, deviceHostPaths?: list<string>, ...},
 *         radios?: array{wifi?: bool, bluetooth?: bool, nfc?: bool, gps?: bool, ...},
 *         auxiliaryApps?: list<string>,
 *         billingMethod?: 'METERED'|'UNMETERED',
 *         environmentVariables?: list<array>,
 *         executionRoleArn?: string,
 *         ...,
 *     },
 *     executionConfiguration?: array{
 *         jobTimeoutMinutes?: int,
 *         accountsCleanup?: bool,
 *         appPackagesCleanup?: bool,
 *         videoCapture?: bool,
 *         skipAppResign?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopJob(array $args = [])
 * @phpstan-method \Aws\Result stopJob(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopJobAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result stopRemoteAccessSession(array $args = [])
 * @phpstan-method \Aws\Result stopRemoteAccessSession(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRemoteAccessSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopRemoteAccessSessionAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result stopRun(array $args = [])
 * @phpstan-method \Aws\Result stopRun(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopRunAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDeviceInstance(array $args = [])
 * @phpstan-method \Aws\Result updateDeviceInstance(array{arn?: string, profileArn?: string, labels?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeviceInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeviceInstanceAsync(array{arn?: string, profileArn?: string, labels?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDevicePool(array $args = [])
 * @phpstan-method \Aws\Result updateDevicePool(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     rules?: list<array{
 *         attribute?: 'APPIUM_VERSION'|'ARN'|'AVAILABILITY'|'FLEET_TYPE'|'FORM_FACTOR'|'INSTANCE_ARN'|'INSTANCE_LABELS'|'MANUFACTURER'|'MODEL'|'OS_VERSION'|'PLATFORM'|'REMOTE_ACCESS_ENABLED'|'REMOTE_DEBUG_ENABLED',
 *         operator?: 'CONTAINS'|'EQUALS'|'GREATER_THAN'|'GREATER_THAN_OR_EQUALS'|'IN'|'LESS_THAN'|'LESS_THAN_OR_EQUALS'|'NOT_IN',
 *         value?: string,
 *         ...,
 *     }>,
 *     maxDevices?: int,
 *     clearMaxDevices?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDevicePoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDevicePoolAsync(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     rules?: list<array{
 *         attribute?: 'APPIUM_VERSION'|'ARN'|'AVAILABILITY'|'FLEET_TYPE'|'FORM_FACTOR'|'INSTANCE_ARN'|'INSTANCE_LABELS'|'MANUFACTURER'|'MODEL'|'OS_VERSION'|'PLATFORM'|'REMOTE_ACCESS_ENABLED'|'REMOTE_DEBUG_ENABLED',
 *         operator?: 'CONTAINS'|'EQUALS'|'GREATER_THAN'|'GREATER_THAN_OR_EQUALS'|'IN'|'LESS_THAN'|'LESS_THAN_OR_EQUALS'|'NOT_IN',
 *         value?: string,
 *         ...,
 *     }>,
 *     maxDevices?: int,
 *     clearMaxDevices?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInstanceProfile(array $args = [])
 * @phpstan-method \Aws\Result updateInstanceProfile(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     packageCleanup?: bool,
 *     excludeAppPackagesFromCleanup?: list<string>,
 *     rebootAfterUse?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInstanceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInstanceProfileAsync(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     packageCleanup?: bool,
 *     excludeAppPackagesFromCleanup?: list<string>,
 *     rebootAfterUse?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNetworkProfile(array $args = [])
 * @phpstan-method \Aws\Result updateNetworkProfile(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     type?: 'CURATED'|'PRIVATE',
 *     uplinkBandwidthBits?: int,
 *     downlinkBandwidthBits?: int,
 *     uplinkDelayMs?: int,
 *     downlinkDelayMs?: int,
 *     uplinkJitterMs?: int,
 *     downlinkJitterMs?: int,
 *     uplinkLossPercent?: int,
 *     downlinkLossPercent?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkProfileAsync(array{
 *     arn?: string,
 *     name?: string,
 *     description?: string,
 *     type?: 'CURATED'|'PRIVATE',
 *     uplinkBandwidthBits?: int,
 *     downlinkBandwidthBits?: int,
 *     uplinkDelayMs?: int,
 *     downlinkDelayMs?: int,
 *     uplinkJitterMs?: int,
 *     downlinkJitterMs?: int,
 *     uplinkLossPercent?: int,
 *     downlinkLossPercent?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProject(array $args = [])
 * @phpstan-method \Aws\Result updateProject(array{
 *     arn?: string,
 *     name?: string,
 *     defaultJobTimeoutMinutes?: int,
 *     vpcConfig?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, vpcId?: string, ...},
 *     environmentVariables?: list<array{name?: string, value?: string, ...}>,
 *     executionRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProjectAsync(array{
 *     arn?: string,
 *     name?: string,
 *     defaultJobTimeoutMinutes?: int,
 *     vpcConfig?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, vpcId?: string, ...},
 *     environmentVariables?: list<array{name?: string, value?: string, ...}>,
 *     executionRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTestGridProject(array $args = [])
 * @phpstan-method \Aws\Result updateTestGridProject(array{
 *     projectArn?: string,
 *     name?: string,
 *     description?: string,
 *     vpcConfig?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, vpcId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTestGridProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTestGridProjectAsync(array{
 *     projectArn?: string,
 *     name?: string,
 *     description?: string,
 *     vpcConfig?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, vpcId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUpload(array $args = [])
 * @phpstan-method \Aws\Result updateUpload(array{arn?: string, name?: string, contentType?: string, editContent?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUploadAsync(array{arn?: string, name?: string, contentType?: string, editContent?: bool, ...} $args = [])
 * @method \Aws\Result updateVPCEConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateVPCEConfiguration(array{
 *     arn?: string,
 *     vpceConfigurationName?: string,
 *     vpceServiceName?: string,
 *     serviceDnsName?: string,
 *     vpceConfigurationDescription?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVPCEConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVPCEConfigurationAsync(array{
 *     arn?: string,
 *     vpceConfigurationName?: string,
 *     vpceServiceName?: string,
 *     serviceDnsName?: string,
 *     vpceConfigurationDescription?: string,
 *     ...,
 * } $args = [])
 */
class DeviceFarmClient extends AwsClient {}