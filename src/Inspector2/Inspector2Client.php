<?php
namespace Aws\Inspector2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Inspector2** service.
 * @method \Aws\Result associateMember(array $args = [])
 * @phpstan-method \Aws\Result associateMember(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateMemberAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result batchAssociateCodeSecurityScanConfiguration(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateCodeSecurityScanConfiguration(array{associateConfigurationRequests?: list<array{scanConfigurationArn?: string, resource?: array, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateCodeSecurityScanConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateCodeSecurityScanConfigurationAsync(array{associateConfigurationRequests?: list<array{scanConfigurationArn?: string, resource?: array, ...}>, ...} $args = [])
 * @method \Aws\Result batchDisassociateCodeSecurityScanConfiguration(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateCodeSecurityScanConfiguration(array{
 *     disassociateConfigurationRequests?: list<array{scanConfigurationArn?: string, resource?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateCodeSecurityScanConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateCodeSecurityScanConfigurationAsync(array{
 *     disassociateConfigurationRequests?: list<array{scanConfigurationArn?: string, resource?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetAccountStatus(array $args = [])
 * @phpstan-method \Aws\Result batchGetAccountStatus(array{accountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAccountStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetAccountStatusAsync(array{accountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetCodeSnippet(array $args = [])
 * @phpstan-method \Aws\Result batchGetCodeSnippet(array{findingArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCodeSnippetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCodeSnippetAsync(array{findingArns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetFindingDetails(array $args = [])
 * @phpstan-method \Aws\Result batchGetFindingDetails(array{findingArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetFindingDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetFindingDetailsAsync(array{findingArns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetFreeTrialInfo(array $args = [])
 * @phpstan-method \Aws\Result batchGetFreeTrialInfo(array{accountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetFreeTrialInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetFreeTrialInfoAsync(array{accountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetMemberEc2DeepInspectionStatus(array $args = [])
 * @phpstan-method \Aws\Result batchGetMemberEc2DeepInspectionStatus(array{accountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetMemberEc2DeepInspectionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetMemberEc2DeepInspectionStatusAsync(array{accountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchUpdateMemberEc2DeepInspectionStatus(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateMemberEc2DeepInspectionStatus(array{accountIds?: list<array{accountId?: string, activateDeepInspection?: bool, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateMemberEc2DeepInspectionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateMemberEc2DeepInspectionStatusAsync(array{accountIds?: list<array{accountId?: string, activateDeepInspection?: bool, ...}>, ...} $args = [])
 * @method \Aws\Result cancelFindingsReport(array $args = [])
 * @phpstan-method \Aws\Result cancelFindingsReport(array{reportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelFindingsReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelFindingsReportAsync(array{reportId?: string, ...} $args = [])
 * @method \Aws\Result cancelSbomExport(array $args = [])
 * @phpstan-method \Aws\Result cancelSbomExport(array{reportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelSbomExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelSbomExportAsync(array{reportId?: string, ...} $args = [])
 * @method \Aws\Result createCisScanConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createCisScanConfiguration(array{
 *     scanName?: string,
 *     securityLevel?: 'LEVEL_1'|'LEVEL_2',
 *     schedule?: array{
 *         oneTime?: array,
 *         daily?: array{startTime?: array, ...},
 *         weekly?: array{startTime?: array, days?: list<'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED'>, ...},
 *         monthly?: array{startTime?: array, day?: 'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED', ...},
 *         ...,
 *     },
 *     targets?: array{accountIds?: list<string>, targetResourceTags?: array<string, list<string>>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCisScanConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCisScanConfigurationAsync(array{
 *     scanName?: string,
 *     securityLevel?: 'LEVEL_1'|'LEVEL_2',
 *     schedule?: array{
 *         oneTime?: array,
 *         daily?: array{startTime?: array, ...},
 *         weekly?: array{startTime?: array, days?: list<'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED'>, ...},
 *         monthly?: array{startTime?: array, day?: 'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED', ...},
 *         ...,
 *     },
 *     targets?: array{accountIds?: list<string>, targetResourceTags?: array<string, list<string>>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCodeSecurityIntegration(array $args = [])
 * @phpstan-method \Aws\Result createCodeSecurityIntegration(array{
 *     name?: string,
 *     type?: 'GITHUB'|'GITLAB_SELF_MANAGED',
 *     details?: array{gitlabSelfManaged?: array{instanceUrl?: string, accessToken?: string, ...}, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCodeSecurityIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCodeSecurityIntegrationAsync(array{
 *     name?: string,
 *     type?: 'GITHUB'|'GITLAB_SELF_MANAGED',
 *     details?: array{gitlabSelfManaged?: array{instanceUrl?: string, accessToken?: string, ...}, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCodeSecurityScanConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createCodeSecurityScanConfiguration(array{
 *     name?: string,
 *     level?: 'ACCOUNT'|'ORGANIZATION',
 *     configuration?: array{
 *         periodicScanConfiguration?: array{frequency?: 'MONTHLY'|'NEVER'|'WEEKLY', frequencyExpression?: string, ...},
 *         continuousIntegrationScanConfiguration?: array{supportedEvents?: list<'PULL_REQUEST'|'PUSH'>, ...},
 *         ruleSetCategories?: list<'IAC'|'SAST'|'SCA'>,
 *         ...,
 *     },
 *     scopeSettings?: array{projectSelectionScope?: 'ALL', ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCodeSecurityScanConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCodeSecurityScanConfigurationAsync(array{
 *     name?: string,
 *     level?: 'ACCOUNT'|'ORGANIZATION',
 *     configuration?: array{
 *         periodicScanConfiguration?: array{frequency?: 'MONTHLY'|'NEVER'|'WEEKLY', frequencyExpression?: string, ...},
 *         continuousIntegrationScanConfiguration?: array{supportedEvents?: list<'PULL_REQUEST'|'PUSH'>, ...},
 *         ruleSetCategories?: list<'IAC'|'SAST'|'SCA'>,
 *         ...,
 *     },
 *     scopeSettings?: array{projectSelectionScope?: 'ALL', ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnector(array $args = [])
 * @phpstan-method \Aws\Result createConnector(array{
 *     clientToken?: string,
 *     name?: string,
 *     provider?: 'AZURE',
 *     description?: string,
 *     providerDetail?: array{
 *         azure?: array{
 *             awsConfigConnectorArn?: string,
 *             scopeConfiguration?: array,
 *             azureRegions?: list<string>,
 *             autoInstallVMScanner?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     provider?: 'AZURE',
 *     description?: string,
 *     providerDetail?: array{
 *         azure?: array{
 *             awsConfigConnectorArn?: string,
 *             scopeConfiguration?: array,
 *             azureRegions?: list<string>,
 *             autoInstallVMScanner?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFilter(array $args = [])
 * @phpstan-method \Aws\Result createFilter(array{
 *     action?: 'NONE'|'SUPPRESS',
 *     description?: string,
 *     filterCriteria?: array{
 *         findingArn?: list<array>,
 *         awsAccountId?: list<array>,
 *         findingType?: list<array>,
 *         severity?: list<array>,
 *         firstObservedAt?: list<array>,
 *         lastObservedAt?: list<array>,
 *         updatedAt?: list<array>,
 *         findingStatus?: list<array>,
 *         title?: list<array>,
 *         inspectorScore?: list<array>,
 *         resourceType?: list<array>,
 *         resourceId?: list<array>,
 *         resourceTags?: list<array>,
 *         ec2InstanceImageId?: list<array>,
 *         ec2InstanceVpcId?: list<array>,
 *         ec2InstanceSubnetId?: list<array>,
 *         ecrImagePushedAt?: list<array>,
 *         ecrImageArchitecture?: list<array>,
 *         ecrImageRegistry?: list<array>,
 *         ecrImageRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ecrImageHash?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         portRange?: list<array>,
 *         networkProtocol?: list<array>,
 *         componentId?: list<array>,
 *         componentType?: list<array>,
 *         vulnerabilityId?: list<array>,
 *         vulnerabilitySource?: list<array>,
 *         vendorSeverity?: list<array>,
 *         vulnerablePackages?: list<array>,
 *         relatedVulnerabilities?: list<array>,
 *         fixAvailable?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionLayers?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lambdaFunctionLastModifiedAt?: list<array>,
 *         lambdaFunctionExecutionRoleArn?: list<array>,
 *         exploitAvailable?: list<array>,
 *         codeVulnerabilityDetectorName?: list<array>,
 *         codeVulnerabilityDetectorTags?: list<array>,
 *         codeVulnerabilityFilePath?: list<array>,
 *         epssScore?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         cloudVmImageReference?: list<array>,
 *         cloudVmNetworkId?: list<array>,
 *         cloudVmSubnetIds?: list<array>,
 *         cloudImageRepositoryName?: list<array>,
 *         cloudImageRegistry?: list<array>,
 *         cloudImageDigest?: list<array>,
 *         cloudImageTags?: list<array>,
 *         cloudImagePushedAt?: list<array>,
 *         cloudImageArchitecture?: list<array>,
 *         cloudImageLastInUseAt?: list<array>,
 *         cloudImageInUseCount?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionLastModifiedAt?: list<array>,
 *         cloudServerlessFunctionExecutionRole?: list<array>,
 *         ...,
 *     },
 *     name?: string,
 *     tags?: array<string, string>,
 *     reason?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFilterAsync(array{
 *     action?: 'NONE'|'SUPPRESS',
 *     description?: string,
 *     filterCriteria?: array{
 *         findingArn?: list<array>,
 *         awsAccountId?: list<array>,
 *         findingType?: list<array>,
 *         severity?: list<array>,
 *         firstObservedAt?: list<array>,
 *         lastObservedAt?: list<array>,
 *         updatedAt?: list<array>,
 *         findingStatus?: list<array>,
 *         title?: list<array>,
 *         inspectorScore?: list<array>,
 *         resourceType?: list<array>,
 *         resourceId?: list<array>,
 *         resourceTags?: list<array>,
 *         ec2InstanceImageId?: list<array>,
 *         ec2InstanceVpcId?: list<array>,
 *         ec2InstanceSubnetId?: list<array>,
 *         ecrImagePushedAt?: list<array>,
 *         ecrImageArchitecture?: list<array>,
 *         ecrImageRegistry?: list<array>,
 *         ecrImageRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ecrImageHash?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         portRange?: list<array>,
 *         networkProtocol?: list<array>,
 *         componentId?: list<array>,
 *         componentType?: list<array>,
 *         vulnerabilityId?: list<array>,
 *         vulnerabilitySource?: list<array>,
 *         vendorSeverity?: list<array>,
 *         vulnerablePackages?: list<array>,
 *         relatedVulnerabilities?: list<array>,
 *         fixAvailable?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionLayers?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lambdaFunctionLastModifiedAt?: list<array>,
 *         lambdaFunctionExecutionRoleArn?: list<array>,
 *         exploitAvailable?: list<array>,
 *         codeVulnerabilityDetectorName?: list<array>,
 *         codeVulnerabilityDetectorTags?: list<array>,
 *         codeVulnerabilityFilePath?: list<array>,
 *         epssScore?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         cloudVmImageReference?: list<array>,
 *         cloudVmNetworkId?: list<array>,
 *         cloudVmSubnetIds?: list<array>,
 *         cloudImageRepositoryName?: list<array>,
 *         cloudImageRegistry?: list<array>,
 *         cloudImageDigest?: list<array>,
 *         cloudImageTags?: list<array>,
 *         cloudImagePushedAt?: list<array>,
 *         cloudImageArchitecture?: list<array>,
 *         cloudImageLastInUseAt?: list<array>,
 *         cloudImageInUseCount?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionLastModifiedAt?: list<array>,
 *         cloudServerlessFunctionExecutionRole?: list<array>,
 *         ...,
 *     },
 *     name?: string,
 *     tags?: array<string, string>,
 *     reason?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFindingsReport(array $args = [])
 * @phpstan-method \Aws\Result createFindingsReport(array{
 *     filterCriteria?: array{
 *         findingArn?: list<array>,
 *         awsAccountId?: list<array>,
 *         findingType?: list<array>,
 *         severity?: list<array>,
 *         firstObservedAt?: list<array>,
 *         lastObservedAt?: list<array>,
 *         updatedAt?: list<array>,
 *         findingStatus?: list<array>,
 *         title?: list<array>,
 *         inspectorScore?: list<array>,
 *         resourceType?: list<array>,
 *         resourceId?: list<array>,
 *         resourceTags?: list<array>,
 *         ec2InstanceImageId?: list<array>,
 *         ec2InstanceVpcId?: list<array>,
 *         ec2InstanceSubnetId?: list<array>,
 *         ecrImagePushedAt?: list<array>,
 *         ecrImageArchitecture?: list<array>,
 *         ecrImageRegistry?: list<array>,
 *         ecrImageRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ecrImageHash?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         portRange?: list<array>,
 *         networkProtocol?: list<array>,
 *         componentId?: list<array>,
 *         componentType?: list<array>,
 *         vulnerabilityId?: list<array>,
 *         vulnerabilitySource?: list<array>,
 *         vendorSeverity?: list<array>,
 *         vulnerablePackages?: list<array>,
 *         relatedVulnerabilities?: list<array>,
 *         fixAvailable?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionLayers?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lambdaFunctionLastModifiedAt?: list<array>,
 *         lambdaFunctionExecutionRoleArn?: list<array>,
 *         exploitAvailable?: list<array>,
 *         codeVulnerabilityDetectorName?: list<array>,
 *         codeVulnerabilityDetectorTags?: list<array>,
 *         codeVulnerabilityFilePath?: list<array>,
 *         epssScore?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         cloudVmImageReference?: list<array>,
 *         cloudVmNetworkId?: list<array>,
 *         cloudVmSubnetIds?: list<array>,
 *         cloudImageRepositoryName?: list<array>,
 *         cloudImageRegistry?: list<array>,
 *         cloudImageDigest?: list<array>,
 *         cloudImageTags?: list<array>,
 *         cloudImagePushedAt?: list<array>,
 *         cloudImageArchitecture?: list<array>,
 *         cloudImageLastInUseAt?: list<array>,
 *         cloudImageInUseCount?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionLastModifiedAt?: list<array>,
 *         cloudServerlessFunctionExecutionRole?: list<array>,
 *         ...,
 *     },
 *     reportFormat?: 'CSV'|'JSON',
 *     s3Destination?: array{bucketName?: string, keyPrefix?: string, kmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFindingsReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFindingsReportAsync(array{
 *     filterCriteria?: array{
 *         findingArn?: list<array>,
 *         awsAccountId?: list<array>,
 *         findingType?: list<array>,
 *         severity?: list<array>,
 *         firstObservedAt?: list<array>,
 *         lastObservedAt?: list<array>,
 *         updatedAt?: list<array>,
 *         findingStatus?: list<array>,
 *         title?: list<array>,
 *         inspectorScore?: list<array>,
 *         resourceType?: list<array>,
 *         resourceId?: list<array>,
 *         resourceTags?: list<array>,
 *         ec2InstanceImageId?: list<array>,
 *         ec2InstanceVpcId?: list<array>,
 *         ec2InstanceSubnetId?: list<array>,
 *         ecrImagePushedAt?: list<array>,
 *         ecrImageArchitecture?: list<array>,
 *         ecrImageRegistry?: list<array>,
 *         ecrImageRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ecrImageHash?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         portRange?: list<array>,
 *         networkProtocol?: list<array>,
 *         componentId?: list<array>,
 *         componentType?: list<array>,
 *         vulnerabilityId?: list<array>,
 *         vulnerabilitySource?: list<array>,
 *         vendorSeverity?: list<array>,
 *         vulnerablePackages?: list<array>,
 *         relatedVulnerabilities?: list<array>,
 *         fixAvailable?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionLayers?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lambdaFunctionLastModifiedAt?: list<array>,
 *         lambdaFunctionExecutionRoleArn?: list<array>,
 *         exploitAvailable?: list<array>,
 *         codeVulnerabilityDetectorName?: list<array>,
 *         codeVulnerabilityDetectorTags?: list<array>,
 *         codeVulnerabilityFilePath?: list<array>,
 *         epssScore?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         cloudVmImageReference?: list<array>,
 *         cloudVmNetworkId?: list<array>,
 *         cloudVmSubnetIds?: list<array>,
 *         cloudImageRepositoryName?: list<array>,
 *         cloudImageRegistry?: list<array>,
 *         cloudImageDigest?: list<array>,
 *         cloudImageTags?: list<array>,
 *         cloudImagePushedAt?: list<array>,
 *         cloudImageArchitecture?: list<array>,
 *         cloudImageLastInUseAt?: list<array>,
 *         cloudImageInUseCount?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionLastModifiedAt?: list<array>,
 *         cloudServerlessFunctionExecutionRole?: list<array>,
 *         ...,
 *     },
 *     reportFormat?: 'CSV'|'JSON',
 *     s3Destination?: array{bucketName?: string, keyPrefix?: string, kmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSbomExport(array $args = [])
 * @phpstan-method \Aws\Result createSbomExport(array{
 *     resourceFilterCriteria?: array{
 *         accountId?: list<array>,
 *         resourceId?: list<array>,
 *         resourceType?: list<array>,
 *         ecrRepositoryName?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ec2InstanceTags?: list<array>,
 *         lambdaFunctionTags?: list<array>,
 *         ...,
 *     },
 *     reportFormat?: 'CYCLONEDX_1_4'|'SPDX_2_3',
 *     s3Destination?: array{bucketName?: string, keyPrefix?: string, kmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSbomExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSbomExportAsync(array{
 *     resourceFilterCriteria?: array{
 *         accountId?: list<array>,
 *         resourceId?: list<array>,
 *         resourceType?: list<array>,
 *         ecrRepositoryName?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ec2InstanceTags?: list<array>,
 *         lambdaFunctionTags?: list<array>,
 *         ...,
 *     },
 *     reportFormat?: 'CYCLONEDX_1_4'|'SPDX_2_3',
 *     s3Destination?: array{bucketName?: string, keyPrefix?: string, kmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCisScanConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteCisScanConfiguration(array{scanConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCisScanConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCisScanConfigurationAsync(array{scanConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCodeSecurityIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteCodeSecurityIntegration(array{integrationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCodeSecurityIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCodeSecurityIntegrationAsync(array{integrationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCodeSecurityScanConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteCodeSecurityScanConfiguration(array{scanConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCodeSecurityScanConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCodeSecurityScanConfigurationAsync(array{scanConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteConnector(array{connectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array{connectorArn?: string, ...} $args = [])
 * @method \Aws\Result deleteFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteFilter(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFilterAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result describeOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeOrganizationConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result disable(array $args = [])
 * @phpstan-method \Aws\Result disable(array{
 *     accountIds?: list<string>,
 *     resourceTypes?: list<'CODE_REPOSITORY'|'EC2'|'ECR'|'LAMBDA'|'LAMBDA_CODE'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableAsync(array{
 *     accountIds?: list<string>,
 *     resourceTypes?: list<'CODE_REPOSITORY'|'EC2'|'ECR'|'LAMBDA'|'LAMBDA_CODE'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disableDelegatedAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result disableDelegatedAdminAccount(array{delegatedAdminAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableDelegatedAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableDelegatedAdminAccountAsync(array{delegatedAdminAccountId?: string, ...} $args = [])
 * @method \Aws\Result disassociateMember(array $args = [])
 * @phpstan-method \Aws\Result disassociateMember(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMemberAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result enable(array $args = [])
 * @phpstan-method \Aws\Result enable(array{
 *     accountIds?: list<string>,
 *     resourceTypes?: list<'CODE_REPOSITORY'|'EC2'|'ECR'|'LAMBDA'|'LAMBDA_CODE'>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableAsync(array{
 *     accountIds?: list<string>,
 *     resourceTypes?: list<'CODE_REPOSITORY'|'EC2'|'ECR'|'LAMBDA'|'LAMBDA_CODE'>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableDelegatedAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result enableDelegatedAdminAccount(array{delegatedAdminAccountId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableDelegatedAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableDelegatedAdminAccountAsync(array{delegatedAdminAccountId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getCisScanReport(array $args = [])
 * @phpstan-method \Aws\Result getCisScanReport(array{scanArn?: string, targetAccounts?: list<string>, reportFormat?: 'CSV'|'PDF', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCisScanReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCisScanReportAsync(array{scanArn?: string, targetAccounts?: list<string>, reportFormat?: 'CSV'|'PDF', ...} $args = [])
 * @method \Aws\Result getCisScanResultDetails(array $args = [])
 * @phpstan-method \Aws\Result getCisScanResultDetails(array{
 *     scanArn?: string,
 *     targetResourceId?: string,
 *     accountId?: string,
 *     filterCriteria?: array{
 *         findingStatusFilters?: list<array>,
 *         checkIdFilters?: list<array>,
 *         titleFilters?: list<array>,
 *         securityLevelFilters?: list<array>,
 *         findingArnFilters?: list<array>,
 *         ...,
 *     },
 *     sortBy?: 'CHECK_ID'|'STATUS',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCisScanResultDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCisScanResultDetailsAsync(array{
 *     scanArn?: string,
 *     targetResourceId?: string,
 *     accountId?: string,
 *     filterCriteria?: array{
 *         findingStatusFilters?: list<array>,
 *         checkIdFilters?: list<array>,
 *         titleFilters?: list<array>,
 *         securityLevelFilters?: list<array>,
 *         findingArnFilters?: list<array>,
 *         ...,
 *     },
 *     sortBy?: 'CHECK_ID'|'STATUS',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getClustersForImage(array $args = [])
 * @phpstan-method \Aws\Result getClustersForImage(array{filter?: array{resourceId?: string, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClustersForImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClustersForImageAsync(array{filter?: array{resourceId?: string, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getCodeSecurityIntegration(array $args = [])
 * @phpstan-method \Aws\Result getCodeSecurityIntegration(array{integrationArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeSecurityIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeSecurityIntegrationAsync(array{integrationArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result getCodeSecurityScan(array $args = [])
 * @phpstan-method \Aws\Result getCodeSecurityScan(array{resource?: array{projectId?: string, ...}, scanId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeSecurityScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeSecurityScanAsync(array{resource?: array{projectId?: string, ...}, scanId?: string, ...} $args = [])
 * @method \Aws\Result getCodeSecurityScanConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getCodeSecurityScanConfiguration(array{scanConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeSecurityScanConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeSecurityScanConfigurationAsync(array{scanConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result getConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getConfiguration(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result getDelegatedAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result getDelegatedAdminAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDelegatedAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDelegatedAdminAccountAsync(array{...} $args = [])
 * @method \Aws\Result getEc2DeepInspectionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getEc2DeepInspectionConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEc2DeepInspectionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEc2DeepInspectionConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getEncryptionKey(array $args = [])
 * @phpstan-method \Aws\Result getEncryptionKey(array{
 *     scanType?: 'CODE'|'NETWORK'|'PACKAGE',
 *     resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_ECR_REPOSITORY'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEncryptionKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEncryptionKeyAsync(array{
 *     scanType?: 'CODE'|'NETWORK'|'PACKAGE',
 *     resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_ECR_REPOSITORY'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFindingsReportStatus(array $args = [])
 * @phpstan-method \Aws\Result getFindingsReportStatus(array{reportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsReportStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsReportStatusAsync(array{reportId?: string, ...} $args = [])
 * @method \Aws\Result getMember(array $args = [])
 * @phpstan-method \Aws\Result getMember(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMemberAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result getSbomExport(array $args = [])
 * @phpstan-method \Aws\Result getSbomExport(array{reportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSbomExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSbomExportAsync(array{reportId?: string, ...} $args = [])
 * @method \Aws\Result listAccountPermissions(array $args = [])
 * @phpstan-method \Aws\Result listAccountPermissions(array{service?: 'EC2'|'ECR'|'LAMBDA', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountPermissionsAsync(array{service?: 'EC2'|'ECR'|'LAMBDA', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCisScanConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listCisScanConfigurations(array{
 *     filterCriteria?: array{
 *         scanNameFilters?: list<array>,
 *         targetResourceTagFilters?: list<array>,
 *         scanConfigurationArnFilters?: list<array>,
 *         ...,
 *     },
 *     sortBy?: 'SCAN_CONFIGURATION_ARN'|'SCAN_NAME',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCisScanConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCisScanConfigurationsAsync(array{
 *     filterCriteria?: array{
 *         scanNameFilters?: list<array>,
 *         targetResourceTagFilters?: list<array>,
 *         scanConfigurationArnFilters?: list<array>,
 *         ...,
 *     },
 *     sortBy?: 'SCAN_CONFIGURATION_ARN'|'SCAN_NAME',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCisScanResultsAggregatedByChecks(array $args = [])
 * @phpstan-method \Aws\Result listCisScanResultsAggregatedByChecks(array{
 *     scanArn?: string,
 *     filterCriteria?: array{
 *         accountIdFilters?: list<array>,
 *         checkIdFilters?: list<array>,
 *         titleFilters?: list<array>,
 *         platformFilters?: list<array>,
 *         failedResourcesFilters?: list<array>,
 *         securityLevelFilters?: list<array>,
 *         ...,
 *     },
 *     sortBy?: 'CHECK_ID'|'FAILED_COUNTS'|'PLATFORM'|'SECURITY_LEVEL'|'TITLE',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCisScanResultsAggregatedByChecksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCisScanResultsAggregatedByChecksAsync(array{
 *     scanArn?: string,
 *     filterCriteria?: array{
 *         accountIdFilters?: list<array>,
 *         checkIdFilters?: list<array>,
 *         titleFilters?: list<array>,
 *         platformFilters?: list<array>,
 *         failedResourcesFilters?: list<array>,
 *         securityLevelFilters?: list<array>,
 *         ...,
 *     },
 *     sortBy?: 'CHECK_ID'|'FAILED_COUNTS'|'PLATFORM'|'SECURITY_LEVEL'|'TITLE',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCisScanResultsAggregatedByTargetResource(array $args = [])
 * @phpstan-method \Aws\Result listCisScanResultsAggregatedByTargetResource(array{
 *     scanArn?: string,
 *     filterCriteria?: array{
 *         accountIdFilters?: list<array>,
 *         statusFilters?: list<array>,
 *         checkIdFilters?: list<array>,
 *         targetResourceIdFilters?: list<array>,
 *         targetResourceTagFilters?: list<array>,
 *         platformFilters?: list<array>,
 *         targetStatusFilters?: list<array>,
 *         targetStatusReasonFilters?: list<array>,
 *         failedChecksFilters?: list<array>,
 *         ...,
 *     },
 *     sortBy?: 'ACCOUNT_ID'|'FAILED_COUNTS'|'PLATFORM'|'RESOURCE_ID'|'TARGET_STATUS'|'TARGET_STATUS_REASON',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCisScanResultsAggregatedByTargetResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCisScanResultsAggregatedByTargetResourceAsync(array{
 *     scanArn?: string,
 *     filterCriteria?: array{
 *         accountIdFilters?: list<array>,
 *         statusFilters?: list<array>,
 *         checkIdFilters?: list<array>,
 *         targetResourceIdFilters?: list<array>,
 *         targetResourceTagFilters?: list<array>,
 *         platformFilters?: list<array>,
 *         targetStatusFilters?: list<array>,
 *         targetStatusReasonFilters?: list<array>,
 *         failedChecksFilters?: list<array>,
 *         ...,
 *     },
 *     sortBy?: 'ACCOUNT_ID'|'FAILED_COUNTS'|'PLATFORM'|'RESOURCE_ID'|'TARGET_STATUS'|'TARGET_STATUS_REASON',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCisScans(array $args = [])
 * @phpstan-method \Aws\Result listCisScans(array{
 *     filterCriteria?: array{
 *         scanNameFilters?: list<array>,
 *         targetResourceTagFilters?: list<array>,
 *         targetResourceIdFilters?: list<array>,
 *         scanStatusFilters?: list<array>,
 *         scanAtFilters?: list<array>,
 *         scanConfigurationArnFilters?: list<array>,
 *         scanArnFilters?: list<array>,
 *         scheduledByFilters?: list<array>,
 *         failedChecksFilters?: list<array>,
 *         targetAccountIdFilters?: list<array>,
 *         ...,
 *     },
 *     detailLevel?: 'MEMBER'|'ORGANIZATION',
 *     sortBy?: 'FAILED_CHECKS'|'SCAN_START_DATE'|'SCHEDULED_BY'|'STATUS',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCisScansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCisScansAsync(array{
 *     filterCriteria?: array{
 *         scanNameFilters?: list<array>,
 *         targetResourceTagFilters?: list<array>,
 *         targetResourceIdFilters?: list<array>,
 *         scanStatusFilters?: list<array>,
 *         scanAtFilters?: list<array>,
 *         scanConfigurationArnFilters?: list<array>,
 *         scanArnFilters?: list<array>,
 *         scheduledByFilters?: list<array>,
 *         failedChecksFilters?: list<array>,
 *         targetAccountIdFilters?: list<array>,
 *         ...,
 *     },
 *     detailLevel?: 'MEMBER'|'ORGANIZATION',
 *     sortBy?: 'FAILED_CHECKS'|'SCAN_START_DATE'|'SCHEDULED_BY'|'STATUS',
 *     sortOrder?: 'ASC'|'DESC',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCodeSecurityIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listCodeSecurityIntegrations(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeSecurityIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeSecurityIntegrationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCodeSecurityScanConfigurationAssociations(array $args = [])
 * @phpstan-method \Aws\Result listCodeSecurityScanConfigurationAssociations(array{scanConfigurationArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeSecurityScanConfigurationAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeSecurityScanConfigurationAssociationsAsync(array{scanConfigurationArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCodeSecurityScanConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listCodeSecurityScanConfigurations(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeSecurityScanConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeSecurityScanConfigurationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listConnectorScanConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listConnectorScanConfigurations(array{awsConfigConnectorArns?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorScanConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorScanConfigurationsAsync(array{awsConfigConnectorArns?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listConnectors(array $args = [])
 * @phpstan-method \Aws\Result listConnectors(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filterCriteria?: array{
 *         connectorArns?: list<array>,
 *         accounts?: list<array>,
 *         awsConfigConnectorArns?: list<array>,
 *         connectorType?: list<array>,
 *         provider?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filterCriteria?: array{
 *         connectorArns?: list<array>,
 *         accounts?: list<array>,
 *         awsConfigConnectorArns?: list<array>,
 *         connectorType?: list<array>,
 *         provider?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCoverage(array $args = [])
 * @phpstan-method \Aws\Result listCoverage(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filterCriteria?: array{
 *         scanStatusCode?: list<array>,
 *         scanStatusReason?: list<array>,
 *         accountId?: list<array>,
 *         resourceId?: list<array>,
 *         resourceType?: list<array>,
 *         scanType?: list<array>,
 *         ecrRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ec2InstanceTags?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionTags?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lastScannedAt?: list<array>,
 *         scanMode?: list<array>,
 *         imagePulledAt?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         codeRepositoryProviderTypeVisibility?: list<array>,
 *         lastScannedCommitId?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudVmInstanceTags?: list<array>,
 *         cloudContainerImageTags?: list<array>,
 *         cloudContainerRepositoryName?: list<array>,
 *         cloudContainerRegistryName?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionTags?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoverageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCoverageAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filterCriteria?: array{
 *         scanStatusCode?: list<array>,
 *         scanStatusReason?: list<array>,
 *         accountId?: list<array>,
 *         resourceId?: list<array>,
 *         resourceType?: list<array>,
 *         scanType?: list<array>,
 *         ecrRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ec2InstanceTags?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionTags?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lastScannedAt?: list<array>,
 *         scanMode?: list<array>,
 *         imagePulledAt?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         codeRepositoryProviderTypeVisibility?: list<array>,
 *         lastScannedCommitId?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudVmInstanceTags?: list<array>,
 *         cloudContainerImageTags?: list<array>,
 *         cloudContainerRepositoryName?: list<array>,
 *         cloudContainerRegistryName?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionTags?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCoverageStatistics(array $args = [])
 * @phpstan-method \Aws\Result listCoverageStatistics(array{
 *     filterCriteria?: array{
 *         scanStatusCode?: list<array>,
 *         scanStatusReason?: list<array>,
 *         accountId?: list<array>,
 *         resourceId?: list<array>,
 *         resourceType?: list<array>,
 *         scanType?: list<array>,
 *         ecrRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ec2InstanceTags?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionTags?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lastScannedAt?: list<array>,
 *         scanMode?: list<array>,
 *         imagePulledAt?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         codeRepositoryProviderTypeVisibility?: list<array>,
 *         lastScannedCommitId?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudVmInstanceTags?: list<array>,
 *         cloudContainerImageTags?: list<array>,
 *         cloudContainerRepositoryName?: list<array>,
 *         cloudContainerRegistryName?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionTags?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         ...,
 *     },
 *     groupBy?: 'ACCOUNT_ID'|'ECR_REPOSITORY_NAME'|'PROVIDER'|'PROVIDER_ACCOUNT_ID'|'PROVIDER_ORG_ID'|'PROVIDER_REGION'|'RESOURCE_TYPE'|'SCAN_STATUS_CODE'|'SCAN_STATUS_REASON',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoverageStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCoverageStatisticsAsync(array{
 *     filterCriteria?: array{
 *         scanStatusCode?: list<array>,
 *         scanStatusReason?: list<array>,
 *         accountId?: list<array>,
 *         resourceId?: list<array>,
 *         resourceType?: list<array>,
 *         scanType?: list<array>,
 *         ecrRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ec2InstanceTags?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionTags?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lastScannedAt?: list<array>,
 *         scanMode?: list<array>,
 *         imagePulledAt?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         codeRepositoryProviderTypeVisibility?: list<array>,
 *         lastScannedCommitId?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudVmInstanceTags?: list<array>,
 *         cloudContainerImageTags?: list<array>,
 *         cloudContainerRepositoryName?: list<array>,
 *         cloudContainerRegistryName?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionTags?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         ...,
 *     },
 *     groupBy?: 'ACCOUNT_ID'|'ECR_REPOSITORY_NAME'|'PROVIDER'|'PROVIDER_ACCOUNT_ID'|'PROVIDER_ORG_ID'|'PROVIDER_REGION'|'RESOURCE_TYPE'|'SCAN_STATUS_CODE'|'SCAN_STATUS_REASON',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDelegatedAdminAccounts(array $args = [])
 * @phpstan-method \Aws\Result listDelegatedAdminAccounts(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDelegatedAdminAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDelegatedAdminAccountsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFilters(array $args = [])
 * @phpstan-method \Aws\Result listFilters(array{arns?: list<string>, action?: 'NONE'|'SUPPRESS', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFiltersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFiltersAsync(array{arns?: list<string>, action?: 'NONE'|'SUPPRESS', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listFindingAggregations(array $args = [])
 * @phpstan-method \Aws\Result listFindingAggregations(array{
 *     aggregationType?: 'ACCOUNT'|'AMI'|'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'CONTAINER_IMAGE'|'FINDING_TYPE'|'IMAGE_LAYER'|'LAMBDA_LAYER'|'PACKAGE'|'REPOSITORY'|'SERVERLESS_FUNCTION'|'TITLE'|'VM_INSTANCE',
 *     nextToken?: string,
 *     maxResults?: int,
 *     accountIds?: list<array{comparison?: 'EQUALS'|'NOT_EQUALS'|'PREFIX', value?: string, ...}>,
 *     aggregationRequest?: array{
 *         accountAggregation?: array{
 *             findingType?: 'CODE_VULNERABILITY'|'NETWORK_REACHABILITY'|'PACKAGE_VULNERABILITY',
 *             resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         amiAggregation?: array{
 *             amis?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'AFFECTED_INSTANCES'|'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         awsEcrContainerAggregation?: array{
 *             resourceIds?: list<array>,
 *             imageShas?: list<array>,
 *             repositories?: list<array>,
 *             architectures?: list<array>,
 *             imageTags?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             lastInUseAt?: list<array>,
 *             inUseCount?: list<array>,
 *             ...,
 *         },
 *         ec2InstanceAggregation?: array{
 *             amis?: list<array>,
 *             operatingSystems?: list<array>,
 *             instanceIds?: list<array>,
 *             instanceTags?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH'|'NETWORK_FINDINGS',
 *             ...,
 *         },
 *         findingTypeAggregation?: array{
 *             findingType?: 'CODE_VULNERABILITY'|'NETWORK_REACHABILITY'|'PACKAGE_VULNERABILITY',
 *             resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         imageLayerAggregation?: array{
 *             repositories?: list<array>,
 *             resourceIds?: list<array>,
 *             layerHashes?: list<array>,
 *             cloudProviders?: list<array>,
 *             cloudAccountIds?: list<array>,
 *             cloudOrgIds?: list<array>,
 *             cloudRegions?: list<array>,
 *             cloudPartitions?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         packageAggregation?: array{packageNames?: list<array>, sortOrder?: 'ASC'|'DESC', sortBy?: 'ALL'|'CRITICAL'|'HIGH', ...},
 *         repositoryAggregation?: array{
 *             repositories?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'AFFECTED_IMAGES'|'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         titleAggregation?: array{
 *             titles?: list<array>,
 *             vulnerabilityIds?: list<array>,
 *             resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *             findingType?: 'CODE_VULNERABILITY'|'NETWORK_REACHABILITY'|'PACKAGE_VULNERABILITY',
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         lambdaLayerAggregation?: array{
 *             functionNames?: list<array>,
 *             resourceIds?: list<array>,
 *             layerArns?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         lambdaFunctionAggregation?: array{
 *             resourceIds?: list<array>,
 *             functionNames?: list<array>,
 *             runtimes?: list<array>,
 *             functionTags?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         codeRepositoryAggregation?: array{
 *             projectNames?: list<array>,
 *             providerTypes?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             resourceIds?: list<array>,
 *             ...,
 *         },
 *         vmInstanceAggregation?: array{
 *             resourceIds?: list<array>,
 *             operatingSystems?: list<array>,
 *             instanceTags?: list<array>,
 *             vmImageReferences?: list<array>,
 *             cloudProviders?: list<array>,
 *             cloudPartitions?: list<array>,
 *             cloudRegions?: list<array>,
 *             cloudOrgIds?: list<array>,
 *             cloudAccountIds?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH'|'NETWORK_FINDINGS',
 *             ...,
 *         },
 *         containerImageAggregation?: array{
 *             resourceIds?: list<array>,
 *             imageDigests?: list<array>,
 *             repositories?: list<array>,
 *             registries?: list<array>,
 *             architectures?: list<array>,
 *             imageTags?: list<array>,
 *             cloudProviders?: list<array>,
 *             cloudPartitions?: list<array>,
 *             cloudRegions?: list<array>,
 *             cloudOrgIds?: list<array>,
 *             cloudAccountIds?: list<array>,
 *             lastInUseAt?: list<array>,
 *             inUseCount?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         serverlessFunctionAggregation?: array{
 *             resourceIds?: list<array>,
 *             functionNames?: list<array>,
 *             runtimes?: list<array>,
 *             functionTags?: list<array>,
 *             cloudProviders?: list<array>,
 *             cloudPartitions?: list<array>,
 *             cloudRegions?: list<array>,
 *             cloudOrgIds?: list<array>,
 *             cloudAccountIds?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingAggregationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingAggregationsAsync(array{
 *     aggregationType?: 'ACCOUNT'|'AMI'|'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'CONTAINER_IMAGE'|'FINDING_TYPE'|'IMAGE_LAYER'|'LAMBDA_LAYER'|'PACKAGE'|'REPOSITORY'|'SERVERLESS_FUNCTION'|'TITLE'|'VM_INSTANCE',
 *     nextToken?: string,
 *     maxResults?: int,
 *     accountIds?: list<array{comparison?: 'EQUALS'|'NOT_EQUALS'|'PREFIX', value?: string, ...}>,
 *     aggregationRequest?: array{
 *         accountAggregation?: array{
 *             findingType?: 'CODE_VULNERABILITY'|'NETWORK_REACHABILITY'|'PACKAGE_VULNERABILITY',
 *             resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         amiAggregation?: array{
 *             amis?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'AFFECTED_INSTANCES'|'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         awsEcrContainerAggregation?: array{
 *             resourceIds?: list<array>,
 *             imageShas?: list<array>,
 *             repositories?: list<array>,
 *             architectures?: list<array>,
 *             imageTags?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             lastInUseAt?: list<array>,
 *             inUseCount?: list<array>,
 *             ...,
 *         },
 *         ec2InstanceAggregation?: array{
 *             amis?: list<array>,
 *             operatingSystems?: list<array>,
 *             instanceIds?: list<array>,
 *             instanceTags?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH'|'NETWORK_FINDINGS',
 *             ...,
 *         },
 *         findingTypeAggregation?: array{
 *             findingType?: 'CODE_VULNERABILITY'|'NETWORK_REACHABILITY'|'PACKAGE_VULNERABILITY',
 *             resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         imageLayerAggregation?: array{
 *             repositories?: list<array>,
 *             resourceIds?: list<array>,
 *             layerHashes?: list<array>,
 *             cloudProviders?: list<array>,
 *             cloudAccountIds?: list<array>,
 *             cloudOrgIds?: list<array>,
 *             cloudRegions?: list<array>,
 *             cloudPartitions?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         packageAggregation?: array{packageNames?: list<array>, sortOrder?: 'ASC'|'DESC', sortBy?: 'ALL'|'CRITICAL'|'HIGH', ...},
 *         repositoryAggregation?: array{
 *             repositories?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'AFFECTED_IMAGES'|'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         titleAggregation?: array{
 *             titles?: list<array>,
 *             vulnerabilityIds?: list<array>,
 *             resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *             findingType?: 'CODE_VULNERABILITY'|'NETWORK_REACHABILITY'|'PACKAGE_VULNERABILITY',
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         lambdaLayerAggregation?: array{
 *             functionNames?: list<array>,
 *             resourceIds?: list<array>,
 *             layerArns?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         lambdaFunctionAggregation?: array{
 *             resourceIds?: list<array>,
 *             functionNames?: list<array>,
 *             runtimes?: list<array>,
 *             functionTags?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         codeRepositoryAggregation?: array{
 *             projectNames?: list<array>,
 *             providerTypes?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             resourceIds?: list<array>,
 *             ...,
 *         },
 *         vmInstanceAggregation?: array{
 *             resourceIds?: list<array>,
 *             operatingSystems?: list<array>,
 *             instanceTags?: list<array>,
 *             vmImageReferences?: list<array>,
 *             cloudProviders?: list<array>,
 *             cloudPartitions?: list<array>,
 *             cloudRegions?: list<array>,
 *             cloudOrgIds?: list<array>,
 *             cloudAccountIds?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH'|'NETWORK_FINDINGS',
 *             ...,
 *         },
 *         containerImageAggregation?: array{
 *             resourceIds?: list<array>,
 *             imageDigests?: list<array>,
 *             repositories?: list<array>,
 *             registries?: list<array>,
 *             architectures?: list<array>,
 *             imageTags?: list<array>,
 *             cloudProviders?: list<array>,
 *             cloudPartitions?: list<array>,
 *             cloudRegions?: list<array>,
 *             cloudOrgIds?: list<array>,
 *             cloudAccountIds?: list<array>,
 *             lastInUseAt?: list<array>,
 *             inUseCount?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         serverlessFunctionAggregation?: array{
 *             resourceIds?: list<array>,
 *             functionNames?: list<array>,
 *             runtimes?: list<array>,
 *             functionTags?: list<array>,
 *             cloudProviders?: list<array>,
 *             cloudPartitions?: list<array>,
 *             cloudRegions?: list<array>,
 *             cloudOrgIds?: list<array>,
 *             cloudAccountIds?: list<array>,
 *             sortOrder?: 'ASC'|'DESC',
 *             sortBy?: 'ALL'|'CRITICAL'|'HIGH',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFindings(array $args = [])
 * @phpstan-method \Aws\Result listFindings(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filterCriteria?: array{
 *         findingArn?: list<array>,
 *         awsAccountId?: list<array>,
 *         findingType?: list<array>,
 *         severity?: list<array>,
 *         firstObservedAt?: list<array>,
 *         lastObservedAt?: list<array>,
 *         updatedAt?: list<array>,
 *         findingStatus?: list<array>,
 *         title?: list<array>,
 *         inspectorScore?: list<array>,
 *         resourceType?: list<array>,
 *         resourceId?: list<array>,
 *         resourceTags?: list<array>,
 *         ec2InstanceImageId?: list<array>,
 *         ec2InstanceVpcId?: list<array>,
 *         ec2InstanceSubnetId?: list<array>,
 *         ecrImagePushedAt?: list<array>,
 *         ecrImageArchitecture?: list<array>,
 *         ecrImageRegistry?: list<array>,
 *         ecrImageRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ecrImageHash?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         portRange?: list<array>,
 *         networkProtocol?: list<array>,
 *         componentId?: list<array>,
 *         componentType?: list<array>,
 *         vulnerabilityId?: list<array>,
 *         vulnerabilitySource?: list<array>,
 *         vendorSeverity?: list<array>,
 *         vulnerablePackages?: list<array>,
 *         relatedVulnerabilities?: list<array>,
 *         fixAvailable?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionLayers?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lambdaFunctionLastModifiedAt?: list<array>,
 *         lambdaFunctionExecutionRoleArn?: list<array>,
 *         exploitAvailable?: list<array>,
 *         codeVulnerabilityDetectorName?: list<array>,
 *         codeVulnerabilityDetectorTags?: list<array>,
 *         codeVulnerabilityFilePath?: list<array>,
 *         epssScore?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         cloudVmImageReference?: list<array>,
 *         cloudVmNetworkId?: list<array>,
 *         cloudVmSubnetIds?: list<array>,
 *         cloudImageRepositoryName?: list<array>,
 *         cloudImageRegistry?: list<array>,
 *         cloudImageDigest?: list<array>,
 *         cloudImageTags?: list<array>,
 *         cloudImagePushedAt?: list<array>,
 *         cloudImageArchitecture?: list<array>,
 *         cloudImageLastInUseAt?: list<array>,
 *         cloudImageInUseCount?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionLastModifiedAt?: list<array>,
 *         cloudServerlessFunctionExecutionRole?: list<array>,
 *         ...,
 *     },
 *     sortCriteria?: array{
 *         field?: 'AWS_ACCOUNT_ID'|'COMPONENT_TYPE'|'ECR_IMAGE_PUSHED_AT'|'ECR_IMAGE_REGISTRY'|'ECR_IMAGE_REPOSITORY_NAME'|'EPSS_SCORE'|'FINDING_STATUS'|'FINDING_TYPE'|'FIRST_OBSERVED_AT'|'INSPECTOR_SCORE'|'LAST_OBSERVED_AT'|'NETWORK_PROTOCOL'|'RESOURCE_TYPE'|'SEVERITY'|'VENDOR_SEVERITY'|'VULNERABILITY_ID'|'VULNERABILITY_SOURCE',
 *         sortOrder?: 'ASC'|'DESC',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filterCriteria?: array{
 *         findingArn?: list<array>,
 *         awsAccountId?: list<array>,
 *         findingType?: list<array>,
 *         severity?: list<array>,
 *         firstObservedAt?: list<array>,
 *         lastObservedAt?: list<array>,
 *         updatedAt?: list<array>,
 *         findingStatus?: list<array>,
 *         title?: list<array>,
 *         inspectorScore?: list<array>,
 *         resourceType?: list<array>,
 *         resourceId?: list<array>,
 *         resourceTags?: list<array>,
 *         ec2InstanceImageId?: list<array>,
 *         ec2InstanceVpcId?: list<array>,
 *         ec2InstanceSubnetId?: list<array>,
 *         ecrImagePushedAt?: list<array>,
 *         ecrImageArchitecture?: list<array>,
 *         ecrImageRegistry?: list<array>,
 *         ecrImageRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ecrImageHash?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         portRange?: list<array>,
 *         networkProtocol?: list<array>,
 *         componentId?: list<array>,
 *         componentType?: list<array>,
 *         vulnerabilityId?: list<array>,
 *         vulnerabilitySource?: list<array>,
 *         vendorSeverity?: list<array>,
 *         vulnerablePackages?: list<array>,
 *         relatedVulnerabilities?: list<array>,
 *         fixAvailable?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionLayers?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lambdaFunctionLastModifiedAt?: list<array>,
 *         lambdaFunctionExecutionRoleArn?: list<array>,
 *         exploitAvailable?: list<array>,
 *         codeVulnerabilityDetectorName?: list<array>,
 *         codeVulnerabilityDetectorTags?: list<array>,
 *         codeVulnerabilityFilePath?: list<array>,
 *         epssScore?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         cloudVmImageReference?: list<array>,
 *         cloudVmNetworkId?: list<array>,
 *         cloudVmSubnetIds?: list<array>,
 *         cloudImageRepositoryName?: list<array>,
 *         cloudImageRegistry?: list<array>,
 *         cloudImageDigest?: list<array>,
 *         cloudImageTags?: list<array>,
 *         cloudImagePushedAt?: list<array>,
 *         cloudImageArchitecture?: list<array>,
 *         cloudImageLastInUseAt?: list<array>,
 *         cloudImageInUseCount?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionLastModifiedAt?: list<array>,
 *         cloudServerlessFunctionExecutionRole?: list<array>,
 *         ...,
 *     },
 *     sortCriteria?: array{
 *         field?: 'AWS_ACCOUNT_ID'|'COMPONENT_TYPE'|'ECR_IMAGE_PUSHED_AT'|'ECR_IMAGE_REGISTRY'|'ECR_IMAGE_REPOSITORY_NAME'|'EPSS_SCORE'|'FINDING_STATUS'|'FINDING_TYPE'|'FIRST_OBSERVED_AT'|'INSPECTOR_SCORE'|'LAST_OBSERVED_AT'|'NETWORK_PROTOCOL'|'RESOURCE_TYPE'|'SEVERITY'|'VENDOR_SEVERITY'|'VULNERABILITY_ID'|'VULNERABILITY_SOURCE',
 *         sortOrder?: 'ASC'|'DESC',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMembers(array $args = [])
 * @phpstan-method \Aws\Result listMembers(array{onlyAssociated?: bool, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembersAsync(array{onlyAssociated?: bool, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listUsageTotals(array $args = [])
 * @phpstan-method \Aws\Result listUsageTotals(array{maxResults?: int, nextToken?: string, accountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsageTotalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsageTotalsAsync(array{maxResults?: int, nextToken?: string, accountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result resetEncryptionKey(array $args = [])
 * @phpstan-method \Aws\Result resetEncryptionKey(array{
 *     scanType?: 'CODE'|'NETWORK'|'PACKAGE',
 *     resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_ECR_REPOSITORY'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resetEncryptionKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetEncryptionKeyAsync(array{
 *     scanType?: 'CODE'|'NETWORK'|'PACKAGE',
 *     resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_ECR_REPOSITORY'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchVulnerabilities(array $args = [])
 * @phpstan-method \Aws\Result searchVulnerabilities(array{filterCriteria?: array{vulnerabilityIds?: list<string>, ...}, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise searchVulnerabilitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchVulnerabilitiesAsync(array{filterCriteria?: array{vulnerabilityIds?: list<string>, ...}, nextToken?: string, ...} $args = [])
 * @method \Aws\Result sendCisSessionHealth(array $args = [])
 * @phpstan-method \Aws\Result sendCisSessionHealth(array{scanJobId?: string, sessionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendCisSessionHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendCisSessionHealthAsync(array{scanJobId?: string, sessionToken?: string, ...} $args = [])
 * @method \Aws\Result sendCisSessionTelemetry(array $args = [])
 * @phpstan-method \Aws\Result sendCisSessionTelemetry(array{
 *     scanJobId?: string,
 *     sessionToken?: string,
 *     messages?: list<array{
 *         ruleId?: string,
 *         status?: 'ERROR'|'FAILED'|'INFORMATIONAL'|'NOT_APPLICABLE'|'NOT_EVALUATED'|'PASSED'|'UNKNOWN',
 *         cisRuleDetails?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendCisSessionTelemetryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendCisSessionTelemetryAsync(array{
 *     scanJobId?: string,
 *     sessionToken?: string,
 *     messages?: list<array{
 *         ruleId?: string,
 *         status?: 'ERROR'|'FAILED'|'INFORMATIONAL'|'NOT_APPLICABLE'|'NOT_EVALUATED'|'PASSED'|'UNKNOWN',
 *         cisRuleDetails?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCisSession(array $args = [])
 * @phpstan-method \Aws\Result startCisSession(array{scanJobId?: string, message?: array{sessionToken?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCisSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCisSessionAsync(array{scanJobId?: string, message?: array{sessionToken?: string, ...}, ...} $args = [])
 * @method \Aws\Result startCodeSecurityScan(array $args = [])
 * @phpstan-method \Aws\Result startCodeSecurityScan(array{clientToken?: string, resource?: array{projectId?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCodeSecurityScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCodeSecurityScanAsync(array{clientToken?: string, resource?: array{projectId?: string, ...}, ...} $args = [])
 * @method \Aws\Result stopCisSession(array $args = [])
 * @phpstan-method \Aws\Result stopCisSession(array{
 *     scanJobId?: string,
 *     sessionToken?: string,
 *     message?: array{
 *         status?: 'FAILED'|'INTERRUPTED'|'SUCCESS'|'UNSUPPORTED_OS',
 *         reason?: string,
 *         progress?: array{
 *             totalChecks?: int,
 *             successfulChecks?: int,
 *             failedChecks?: int,
 *             notEvaluatedChecks?: int,
 *             unknownChecks?: int,
 *             notApplicableChecks?: int,
 *             informationalChecks?: int,
 *             errorChecks?: int,
 *             ...,
 *         },
 *         computePlatform?: array{vendor?: string, product?: string, version?: string, ...},
 *         benchmarkVersion?: string,
 *         benchmarkProfile?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise stopCisSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCisSessionAsync(array{
 *     scanJobId?: string,
 *     sessionToken?: string,
 *     message?: array{
 *         status?: 'FAILED'|'INTERRUPTED'|'SUCCESS'|'UNSUPPORTED_OS',
 *         reason?: string,
 *         progress?: array{
 *             totalChecks?: int,
 *             successfulChecks?: int,
 *             failedChecks?: int,
 *             notEvaluatedChecks?: int,
 *             unknownChecks?: int,
 *             notApplicableChecks?: int,
 *             informationalChecks?: int,
 *             errorChecks?: int,
 *             ...,
 *         },
 *         computePlatform?: array{vendor?: string, product?: string, version?: string, ...},
 *         benchmarkVersion?: string,
 *         benchmarkProfile?: string,
 *         ...,
 *     },
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
 * @method \Aws\Result updateCisScanConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateCisScanConfiguration(array{
 *     scanConfigurationArn?: string,
 *     scanName?: string,
 *     securityLevel?: 'LEVEL_1'|'LEVEL_2',
 *     schedule?: array{
 *         oneTime?: array,
 *         daily?: array{startTime?: array, ...},
 *         weekly?: array{startTime?: array, days?: list<'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED'>, ...},
 *         monthly?: array{startTime?: array, day?: 'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED', ...},
 *         ...,
 *     },
 *     targets?: array{accountIds?: list<string>, targetResourceTags?: array<string, list<string>>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCisScanConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCisScanConfigurationAsync(array{
 *     scanConfigurationArn?: string,
 *     scanName?: string,
 *     securityLevel?: 'LEVEL_1'|'LEVEL_2',
 *     schedule?: array{
 *         oneTime?: array,
 *         daily?: array{startTime?: array, ...},
 *         weekly?: array{startTime?: array, days?: list<'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED'>, ...},
 *         monthly?: array{startTime?: array, day?: 'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED', ...},
 *         ...,
 *     },
 *     targets?: array{accountIds?: list<string>, targetResourceTags?: array<string, list<string>>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCodeSecurityIntegration(array $args = [])
 * @phpstan-method \Aws\Result updateCodeSecurityIntegration(array{
 *     integrationArn?: string,
 *     details?: array{
 *         gitlabSelfManaged?: array{authCode?: string, ...},
 *         github?: array{code?: string, installationId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCodeSecurityIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCodeSecurityIntegrationAsync(array{
 *     integrationArn?: string,
 *     details?: array{
 *         gitlabSelfManaged?: array{authCode?: string, ...},
 *         github?: array{code?: string, installationId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCodeSecurityScanConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateCodeSecurityScanConfiguration(array{
 *     scanConfigurationArn?: string,
 *     configuration?: array{
 *         periodicScanConfiguration?: array{frequency?: 'MONTHLY'|'NEVER'|'WEEKLY', frequencyExpression?: string, ...},
 *         continuousIntegrationScanConfiguration?: array{supportedEvents?: list<'PULL_REQUEST'|'PUSH'>, ...},
 *         ruleSetCategories?: list<'IAC'|'SAST'|'SCA'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCodeSecurityScanConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCodeSecurityScanConfigurationAsync(array{
 *     scanConfigurationArn?: string,
 *     configuration?: array{
 *         periodicScanConfiguration?: array{frequency?: 'MONTHLY'|'NEVER'|'WEEKLY', frequencyExpression?: string, ...},
 *         continuousIntegrationScanConfiguration?: array{supportedEvents?: list<'PULL_REQUEST'|'PUSH'>, ...},
 *         ruleSetCategories?: list<'IAC'|'SAST'|'SCA'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateConfiguration(array{
 *     accountId?: string,
 *     ecrConfiguration?: array{
 *         rescanDuration?: 'DAYS_14'|'DAYS_180'|'DAYS_3'|'DAYS_30'|'DAYS_60'|'DAYS_7'|'DAYS_90'|'LIFETIME',
 *         pullDateRescanDuration?: 'DAYS_14'|'DAYS_180'|'DAYS_3'|'DAYS_30'|'DAYS_60'|'DAYS_7'|'DAYS_90',
 *         pullDateRescanMode?: 'LAST_IN_USE_AT'|'LAST_PULL_DATE',
 *         ...,
 *     },
 *     ec2Configuration?: array{scanMode?: 'EC2_HYBRID'|'EC2_SSM_AGENT_BASED', activateVMScanner?: bool, ...},
 *     updateConfigurationInheritance?: array{ec2Configuration?: 'INHERIT_FROM_ADMIN', ecrConfiguration?: 'INHERIT_FROM_ADMIN', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationAsync(array{
 *     accountId?: string,
 *     ecrConfiguration?: array{
 *         rescanDuration?: 'DAYS_14'|'DAYS_180'|'DAYS_3'|'DAYS_30'|'DAYS_60'|'DAYS_7'|'DAYS_90'|'LIFETIME',
 *         pullDateRescanDuration?: 'DAYS_14'|'DAYS_180'|'DAYS_3'|'DAYS_30'|'DAYS_60'|'DAYS_7'|'DAYS_90',
 *         pullDateRescanMode?: 'LAST_IN_USE_AT'|'LAST_PULL_DATE',
 *         ...,
 *     },
 *     ec2Configuration?: array{scanMode?: 'EC2_HYBRID'|'EC2_SSM_AGENT_BASED', activateVMScanner?: bool, ...},
 *     updateConfigurationInheritance?: array{ec2Configuration?: 'INHERIT_FROM_ADMIN', ecrConfiguration?: 'INHERIT_FROM_ADMIN', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnector(array $args = [])
 * @phpstan-method \Aws\Result updateConnector(array{
 *     connectorArn?: string,
 *     description?: string,
 *     providerDetail?: array{
 *         azure?: array{azureRegions?: list<string>, scopeConfiguration?: array, autoInstallVMScanner?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorAsync(array{
 *     connectorArn?: string,
 *     description?: string,
 *     providerDetail?: array{
 *         azure?: array{azureRegions?: list<string>, scopeConfiguration?: array, autoInstallVMScanner?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnectorScanConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateConnectorScanConfiguration(array{
 *     awsConfigConnectorArn?: string,
 *     scanConfiguration?: array{
 *         containerImageScanning?: array{
 *             pushDuration?: 'DAYS_14'|'DAYS_180'|'DAYS_3'|'DAYS_30'|'DAYS_60'|'DAYS_7'|'DAYS_90'|'LIFETIME',
 *             pullDuration?: 'DAYS_14'|'DAYS_180'|'DAYS_3'|'DAYS_30'|'DAYS_60'|'DAYS_7'|'DAYS_90',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectorScanConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorScanConfigurationAsync(array{
 *     awsConfigConnectorArn?: string,
 *     scanConfiguration?: array{
 *         containerImageScanning?: array{
 *             pushDuration?: 'DAYS_14'|'DAYS_180'|'DAYS_3'|'DAYS_30'|'DAYS_60'|'DAYS_7'|'DAYS_90'|'LIFETIME',
 *             pullDuration?: 'DAYS_14'|'DAYS_180'|'DAYS_3'|'DAYS_30'|'DAYS_60'|'DAYS_7'|'DAYS_90',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEc2DeepInspectionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateEc2DeepInspectionConfiguration(array{activateDeepInspection?: bool, packagePaths?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEc2DeepInspectionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEc2DeepInspectionConfigurationAsync(array{activateDeepInspection?: bool, packagePaths?: list<string>, ...} $args = [])
 * @method \Aws\Result updateEncryptionKey(array $args = [])
 * @phpstan-method \Aws\Result updateEncryptionKey(array{
 *     kmsKeyId?: string,
 *     scanType?: 'CODE'|'NETWORK'|'PACKAGE',
 *     resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_ECR_REPOSITORY'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEncryptionKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEncryptionKeyAsync(array{
 *     kmsKeyId?: string,
 *     scanType?: 'CODE'|'NETWORK'|'PACKAGE',
 *     resourceType?: 'AWS_EC2_INSTANCE'|'AWS_ECR_CONTAINER_IMAGE'|'AWS_ECR_REPOSITORY'|'AWS_LAMBDA_FUNCTION'|'CODE_REPOSITORY'|'Microsoft.Compute/virtualMachines'|'Microsoft.ContainerRegistry/registry/containerImage'|'Microsoft.Web/sites',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFilter(array $args = [])
 * @phpstan-method \Aws\Result updateFilter(array{
 *     action?: 'NONE'|'SUPPRESS',
 *     description?: string,
 *     filterCriteria?: array{
 *         findingArn?: list<array>,
 *         awsAccountId?: list<array>,
 *         findingType?: list<array>,
 *         severity?: list<array>,
 *         firstObservedAt?: list<array>,
 *         lastObservedAt?: list<array>,
 *         updatedAt?: list<array>,
 *         findingStatus?: list<array>,
 *         title?: list<array>,
 *         inspectorScore?: list<array>,
 *         resourceType?: list<array>,
 *         resourceId?: list<array>,
 *         resourceTags?: list<array>,
 *         ec2InstanceImageId?: list<array>,
 *         ec2InstanceVpcId?: list<array>,
 *         ec2InstanceSubnetId?: list<array>,
 *         ecrImagePushedAt?: list<array>,
 *         ecrImageArchitecture?: list<array>,
 *         ecrImageRegistry?: list<array>,
 *         ecrImageRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ecrImageHash?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         portRange?: list<array>,
 *         networkProtocol?: list<array>,
 *         componentId?: list<array>,
 *         componentType?: list<array>,
 *         vulnerabilityId?: list<array>,
 *         vulnerabilitySource?: list<array>,
 *         vendorSeverity?: list<array>,
 *         vulnerablePackages?: list<array>,
 *         relatedVulnerabilities?: list<array>,
 *         fixAvailable?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionLayers?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lambdaFunctionLastModifiedAt?: list<array>,
 *         lambdaFunctionExecutionRoleArn?: list<array>,
 *         exploitAvailable?: list<array>,
 *         codeVulnerabilityDetectorName?: list<array>,
 *         codeVulnerabilityDetectorTags?: list<array>,
 *         codeVulnerabilityFilePath?: list<array>,
 *         epssScore?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         cloudVmImageReference?: list<array>,
 *         cloudVmNetworkId?: list<array>,
 *         cloudVmSubnetIds?: list<array>,
 *         cloudImageRepositoryName?: list<array>,
 *         cloudImageRegistry?: list<array>,
 *         cloudImageDigest?: list<array>,
 *         cloudImageTags?: list<array>,
 *         cloudImagePushedAt?: list<array>,
 *         cloudImageArchitecture?: list<array>,
 *         cloudImageLastInUseAt?: list<array>,
 *         cloudImageInUseCount?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionLastModifiedAt?: list<array>,
 *         cloudServerlessFunctionExecutionRole?: list<array>,
 *         ...,
 *     },
 *     name?: string,
 *     filterArn?: string,
 *     reason?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFilterAsync(array{
 *     action?: 'NONE'|'SUPPRESS',
 *     description?: string,
 *     filterCriteria?: array{
 *         findingArn?: list<array>,
 *         awsAccountId?: list<array>,
 *         findingType?: list<array>,
 *         severity?: list<array>,
 *         firstObservedAt?: list<array>,
 *         lastObservedAt?: list<array>,
 *         updatedAt?: list<array>,
 *         findingStatus?: list<array>,
 *         title?: list<array>,
 *         inspectorScore?: list<array>,
 *         resourceType?: list<array>,
 *         resourceId?: list<array>,
 *         resourceTags?: list<array>,
 *         ec2InstanceImageId?: list<array>,
 *         ec2InstanceVpcId?: list<array>,
 *         ec2InstanceSubnetId?: list<array>,
 *         ecrImagePushedAt?: list<array>,
 *         ecrImageArchitecture?: list<array>,
 *         ecrImageRegistry?: list<array>,
 *         ecrImageRepositoryName?: list<array>,
 *         ecrImageTags?: list<array>,
 *         ecrImageHash?: list<array>,
 *         ecrImageLastInUseAt?: list<array>,
 *         ecrImageInUseCount?: list<array>,
 *         portRange?: list<array>,
 *         networkProtocol?: list<array>,
 *         componentId?: list<array>,
 *         componentType?: list<array>,
 *         vulnerabilityId?: list<array>,
 *         vulnerabilitySource?: list<array>,
 *         vendorSeverity?: list<array>,
 *         vulnerablePackages?: list<array>,
 *         relatedVulnerabilities?: list<array>,
 *         fixAvailable?: list<array>,
 *         lambdaFunctionName?: list<array>,
 *         lambdaFunctionLayers?: list<array>,
 *         lambdaFunctionRuntime?: list<array>,
 *         lambdaFunctionLastModifiedAt?: list<array>,
 *         lambdaFunctionExecutionRoleArn?: list<array>,
 *         exploitAvailable?: list<array>,
 *         codeVulnerabilityDetectorName?: list<array>,
 *         codeVulnerabilityDetectorTags?: list<array>,
 *         codeVulnerabilityFilePath?: list<array>,
 *         epssScore?: list<array>,
 *         codeRepositoryProjectName?: list<array>,
 *         codeRepositoryProviderType?: list<array>,
 *         cloudProvider?: list<array>,
 *         cloudProviderRegion?: list<array>,
 *         cloudProviderAccountId?: list<array>,
 *         cloudProviderOrgId?: list<array>,
 *         cloudVmImageReference?: list<array>,
 *         cloudVmNetworkId?: list<array>,
 *         cloudVmSubnetIds?: list<array>,
 *         cloudImageRepositoryName?: list<array>,
 *         cloudImageRegistry?: list<array>,
 *         cloudImageDigest?: list<array>,
 *         cloudImageTags?: list<array>,
 *         cloudImagePushedAt?: list<array>,
 *         cloudImageArchitecture?: list<array>,
 *         cloudImageLastInUseAt?: list<array>,
 *         cloudImageInUseCount?: list<array>,
 *         cloudServerlessFunctionName?: list<array>,
 *         cloudServerlessFunctionRuntime?: list<array>,
 *         cloudServerlessFunctionLastModifiedAt?: list<array>,
 *         cloudServerlessFunctionExecutionRole?: list<array>,
 *         ...,
 *     },
 *     name?: string,
 *     filterArn?: string,
 *     reason?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOrgEc2DeepInspectionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateOrgEc2DeepInspectionConfiguration(array{orgPackagePaths?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOrgEc2DeepInspectionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOrgEc2DeepInspectionConfigurationAsync(array{orgPackagePaths?: list<string>, ...} $args = [])
 * @method \Aws\Result updateOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateOrganizationConfiguration(array{
 *     autoEnable?: array{ec2?: bool, ecr?: bool, lambda?: bool, lambdaCode?: bool, codeRepository?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array{
 *     autoEnable?: array{ec2?: bool, ecr?: bool, lambda?: bool, lambdaCode?: bool, codeRepository?: bool, ...},
 *     ...,
 * } $args = [])
 */
class Inspector2Client extends AwsClient {}
