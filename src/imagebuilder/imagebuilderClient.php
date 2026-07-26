<?php
namespace Aws\imagebuilder;

use Aws\AwsClient;

/**
 * This client is used to interact with the **EC2 Image Builder** service.
 * @method \Aws\Result cancelImageCreation(array $args = [])
 * @phpstan-method \Aws\Result cancelImageCreation(array{imageBuildVersionArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelImageCreationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelImageCreationAsync(array{imageBuildVersionArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result cancelLifecycleExecution(array $args = [])
 * @phpstan-method \Aws\Result cancelLifecycleExecution(array{lifecycleExecutionId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelLifecycleExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelLifecycleExecutionAsync(array{lifecycleExecutionId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createComponent(array $args = [])
 * @phpstan-method \Aws\Result createComponent(array{
 *     name?: string,
 *     semanticVersion?: string,
 *     description?: string,
 *     changeDescription?: string,
 *     platform?: 'Linux'|'Windows'|'macOS',
 *     supportedOsVersions?: list<string>,
 *     data?: string,
 *     uri?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComponentAsync(array{
 *     name?: string,
 *     semanticVersion?: string,
 *     description?: string,
 *     changeDescription?: string,
 *     platform?: 'Linux'|'Windows'|'macOS',
 *     supportedOsVersions?: list<string>,
 *     data?: string,
 *     uri?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContainerRecipe(array $args = [])
 * @phpstan-method \Aws\Result createContainerRecipe(array{
 *     containerType?: 'DOCKER',
 *     name?: string,
 *     description?: string,
 *     semanticVersion?: string,
 *     components?: list<array{componentArn?: string, parameters?: list<array>, ...}>,
 *     instanceConfiguration?: array{image?: string, blockDeviceMappings?: list<array>, ...},
 *     dockerfileTemplateData?: string,
 *     dockerfileTemplateUri?: string,
 *     platformOverride?: 'Linux'|'Windows'|'macOS',
 *     imageOsVersionOverride?: string,
 *     parentImage?: string,
 *     tags?: array<string, string>,
 *     workingDirectory?: string,
 *     targetRepository?: array{service?: 'ECR', repositoryName?: string, ...},
 *     kmsKeyId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContainerRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContainerRecipeAsync(array{
 *     containerType?: 'DOCKER',
 *     name?: string,
 *     description?: string,
 *     semanticVersion?: string,
 *     components?: list<array{componentArn?: string, parameters?: list<array>, ...}>,
 *     instanceConfiguration?: array{image?: string, blockDeviceMappings?: list<array>, ...},
 *     dockerfileTemplateData?: string,
 *     dockerfileTemplateUri?: string,
 *     platformOverride?: 'Linux'|'Windows'|'macOS',
 *     imageOsVersionOverride?: string,
 *     parentImage?: string,
 *     tags?: array<string, string>,
 *     workingDirectory?: string,
 *     targetRepository?: array{service?: 'ECR', repositoryName?: string, ...},
 *     kmsKeyId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDistributionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createDistributionConfiguration(array{
 *     name?: string,
 *     description?: string,
 *     distributions?: list<array{
 *         region?: string,
 *         amiDistributionConfiguration?: array,
 *         containerDistributionConfiguration?: array,
 *         licenseConfigurationArns?: list<string>,
 *         launchTemplateConfigurations?: list<array>,
 *         s3ExportConfiguration?: array,
 *         fastLaunchConfigurations?: list<array>,
 *         ssmParameterConfigurations?: list<array>,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDistributionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDistributionConfigurationAsync(array{
 *     name?: string,
 *     description?: string,
 *     distributions?: list<array{
 *         region?: string,
 *         amiDistributionConfiguration?: array,
 *         containerDistributionConfiguration?: array,
 *         licenseConfigurationArns?: list<string>,
 *         launchTemplateConfigurations?: list<array>,
 *         s3ExportConfiguration?: array,
 *         fastLaunchConfigurations?: list<array>,
 *         ssmParameterConfigurations?: list<array>,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createImage(array $args = [])
 * @phpstan-method \Aws\Result createImage(array{
 *     imageRecipeArn?: string,
 *     containerRecipeArn?: string,
 *     distributionConfigurationArn?: string,
 *     infrastructureConfigurationArn?: string,
 *     imageTestsConfiguration?: array{imageTestsEnabled?: bool, timeoutMinutes?: int, ...},
 *     enhancedImageMetadataEnabled?: bool,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     imageScanningConfiguration?: array{
 *         imageScanningEnabled?: bool,
 *         ecrConfiguration?: array{repositoryName?: string, containerTags?: list<string>, ...},
 *         ...,
 *     },
 *     workflows?: list<array{
 *         workflowArn?: string,
 *         parameters?: list<array>,
 *         parallelGroup?: string,
 *         onFailure?: 'ABORT'|'CONTINUE',
 *         ...,
 *     }>,
 *     executionRole?: string,
 *     loggingConfiguration?: array{logGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImageAsync(array{
 *     imageRecipeArn?: string,
 *     containerRecipeArn?: string,
 *     distributionConfigurationArn?: string,
 *     infrastructureConfigurationArn?: string,
 *     imageTestsConfiguration?: array{imageTestsEnabled?: bool, timeoutMinutes?: int, ...},
 *     enhancedImageMetadataEnabled?: bool,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     imageScanningConfiguration?: array{
 *         imageScanningEnabled?: bool,
 *         ecrConfiguration?: array{repositoryName?: string, containerTags?: list<string>, ...},
 *         ...,
 *     },
 *     workflows?: list<array{
 *         workflowArn?: string,
 *         parameters?: list<array>,
 *         parallelGroup?: string,
 *         onFailure?: 'ABORT'|'CONTINUE',
 *         ...,
 *     }>,
 *     executionRole?: string,
 *     loggingConfiguration?: array{logGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createImagePipeline(array $args = [])
 * @phpstan-method \Aws\Result createImagePipeline(array{
 *     name?: string,
 *     description?: string,
 *     imageRecipeArn?: string,
 *     containerRecipeArn?: string,
 *     infrastructureConfigurationArn?: string,
 *     distributionConfigurationArn?: string,
 *     imageTestsConfiguration?: array{imageTestsEnabled?: bool, timeoutMinutes?: int, ...},
 *     enhancedImageMetadataEnabled?: bool,
 *     schedule?: array{
 *         scheduleExpression?: string,
 *         timezone?: string,
 *         pipelineExecutionStartCondition?: 'EXPRESSION_MATCH_AND_DEPENDENCY_UPDATES_AVAILABLE'|'EXPRESSION_MATCH_ONLY',
 *         autoDisablePolicy?: array{failureCount?: int, ...},
 *         ...,
 *     },
 *     status?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     imageTags?: array<string, string>,
 *     clientToken?: string,
 *     imageScanningConfiguration?: array{
 *         imageScanningEnabled?: bool,
 *         ecrConfiguration?: array{repositoryName?: string, containerTags?: list<string>, ...},
 *         ...,
 *     },
 *     workflows?: list<array{
 *         workflowArn?: string,
 *         parameters?: list<array>,
 *         parallelGroup?: string,
 *         onFailure?: 'ABORT'|'CONTINUE',
 *         ...,
 *     }>,
 *     executionRole?: string,
 *     loggingConfiguration?: array{imageLogGroupName?: string, pipelineLogGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImagePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImagePipelineAsync(array{
 *     name?: string,
 *     description?: string,
 *     imageRecipeArn?: string,
 *     containerRecipeArn?: string,
 *     infrastructureConfigurationArn?: string,
 *     distributionConfigurationArn?: string,
 *     imageTestsConfiguration?: array{imageTestsEnabled?: bool, timeoutMinutes?: int, ...},
 *     enhancedImageMetadataEnabled?: bool,
 *     schedule?: array{
 *         scheduleExpression?: string,
 *         timezone?: string,
 *         pipelineExecutionStartCondition?: 'EXPRESSION_MATCH_AND_DEPENDENCY_UPDATES_AVAILABLE'|'EXPRESSION_MATCH_ONLY',
 *         autoDisablePolicy?: array{failureCount?: int, ...},
 *         ...,
 *     },
 *     status?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     imageTags?: array<string, string>,
 *     clientToken?: string,
 *     imageScanningConfiguration?: array{
 *         imageScanningEnabled?: bool,
 *         ecrConfiguration?: array{repositoryName?: string, containerTags?: list<string>, ...},
 *         ...,
 *     },
 *     workflows?: list<array{
 *         workflowArn?: string,
 *         parameters?: list<array>,
 *         parallelGroup?: string,
 *         onFailure?: 'ABORT'|'CONTINUE',
 *         ...,
 *     }>,
 *     executionRole?: string,
 *     loggingConfiguration?: array{imageLogGroupName?: string, pipelineLogGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createImageRecipe(array $args = [])
 * @phpstan-method \Aws\Result createImageRecipe(array{
 *     name?: string,
 *     description?: string,
 *     semanticVersion?: string,
 *     components?: list<array{componentArn?: string, parameters?: list<array>, ...}>,
 *     parentImage?: string,
 *     blockDeviceMappings?: list<array{deviceName?: string, ebs?: array, virtualName?: string, noDevice?: string, ...}>,
 *     tags?: array<string, string>,
 *     workingDirectory?: string,
 *     additionalInstanceConfiguration?: array{systemsManagerAgent?: array{uninstallAfterBuild?: bool, ...}, userDataOverride?: string, ...},
 *     amiTags?: array<string, string>,
 *     amiWatermarks?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImageRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImageRecipeAsync(array{
 *     name?: string,
 *     description?: string,
 *     semanticVersion?: string,
 *     components?: list<array{componentArn?: string, parameters?: list<array>, ...}>,
 *     parentImage?: string,
 *     blockDeviceMappings?: list<array{deviceName?: string, ebs?: array, virtualName?: string, noDevice?: string, ...}>,
 *     tags?: array<string, string>,
 *     workingDirectory?: string,
 *     additionalInstanceConfiguration?: array{systemsManagerAgent?: array{uninstallAfterBuild?: bool, ...}, userDataOverride?: string, ...},
 *     amiTags?: array<string, string>,
 *     amiWatermarks?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInfrastructureConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createInfrastructureConfiguration(array{
 *     name?: string,
 *     description?: string,
 *     instanceTypes?: list<string>,
 *     instanceProfileName?: string,
 *     securityGroupIds?: list<string>,
 *     subnetId?: string,
 *     logging?: array{s3Logs?: array{s3BucketName?: string, s3KeyPrefix?: string, ...}, ...},
 *     keyPair?: string,
 *     terminateInstanceOnFailure?: bool,
 *     snsTopicArn?: string,
 *     resourceTags?: array<string, string>,
 *     instanceMetadataOptions?: array{httpTokens?: string, httpPutResponseHopLimit?: int, ...},
 *     tags?: array<string, string>,
 *     placement?: array{
 *         availabilityZone?: string,
 *         tenancy?: 'dedicated'|'default'|'host',
 *         hostId?: string,
 *         hostResourceGroupArn?: string,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInfrastructureConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInfrastructureConfigurationAsync(array{
 *     name?: string,
 *     description?: string,
 *     instanceTypes?: list<string>,
 *     instanceProfileName?: string,
 *     securityGroupIds?: list<string>,
 *     subnetId?: string,
 *     logging?: array{s3Logs?: array{s3BucketName?: string, s3KeyPrefix?: string, ...}, ...},
 *     keyPair?: string,
 *     terminateInstanceOnFailure?: bool,
 *     snsTopicArn?: string,
 *     resourceTags?: array<string, string>,
 *     instanceMetadataOptions?: array{httpTokens?: string, httpPutResponseHopLimit?: int, ...},
 *     tags?: array<string, string>,
 *     placement?: array{
 *         availabilityZone?: string,
 *         tenancy?: 'dedicated'|'default'|'host',
 *         hostId?: string,
 *         hostResourceGroupArn?: string,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result createLifecyclePolicy(array{
 *     name?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     executionRole?: string,
 *     resourceType?: 'AMI_IMAGE'|'CONTAINER_IMAGE',
 *     policyDetails?: list<array{action?: array, filter?: array, exclusionRules?: array, ...}>,
 *     resourceSelection?: array{recipes?: list<array>, tagMap?: array<string, string>, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLifecyclePolicyAsync(array{
 *     name?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     executionRole?: string,
 *     resourceType?: 'AMI_IMAGE'|'CONTAINER_IMAGE',
 *     policyDetails?: list<array{action?: array, filter?: array, exclusionRules?: array, ...}>,
 *     resourceSelection?: array{recipes?: list<array>, tagMap?: array<string, string>, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkflow(array $args = [])
 * @phpstan-method \Aws\Result createWorkflow(array{
 *     name?: string,
 *     semanticVersion?: string,
 *     description?: string,
 *     changeDescription?: string,
 *     data?: string,
 *     uri?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     type?: 'BUILD'|'DISTRIBUTION'|'TEST',
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowAsync(array{
 *     name?: string,
 *     semanticVersion?: string,
 *     description?: string,
 *     changeDescription?: string,
 *     data?: string,
 *     uri?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     type?: 'BUILD'|'DISTRIBUTION'|'TEST',
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteComponent(array $args = [])
 * @phpstan-method \Aws\Result deleteComponent(array{componentBuildVersionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteComponentAsync(array{componentBuildVersionArn?: string, ...} $args = [])
 * @method \Aws\Result deleteContainerRecipe(array $args = [])
 * @phpstan-method \Aws\Result deleteContainerRecipe(array{containerRecipeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContainerRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContainerRecipeAsync(array{containerRecipeArn?: string, ...} $args = [])
 * @method \Aws\Result deleteDistributionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteDistributionConfiguration(array{distributionConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDistributionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDistributionConfigurationAsync(array{distributionConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteImage(array $args = [])
 * @phpstan-method \Aws\Result deleteImage(array{imageBuildVersionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImageAsync(array{imageBuildVersionArn?: string, ...} $args = [])
 * @method \Aws\Result deleteImagePipeline(array $args = [])
 * @phpstan-method \Aws\Result deleteImagePipeline(array{imagePipelineArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImagePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImagePipelineAsync(array{imagePipelineArn?: string, ...} $args = [])
 * @method \Aws\Result deleteImageRecipe(array $args = [])
 * @phpstan-method \Aws\Result deleteImageRecipe(array{imageRecipeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImageRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImageRecipeAsync(array{imageRecipeArn?: string, ...} $args = [])
 * @method \Aws\Result deleteInfrastructureConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteInfrastructureConfiguration(array{infrastructureConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInfrastructureConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInfrastructureConfigurationAsync(array{infrastructureConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteLifecyclePolicy(array{lifecyclePolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array{lifecyclePolicyArn?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkflow(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflow(array{workflowBuildVersionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array{workflowBuildVersionArn?: string, ...} $args = [])
 * @method \Aws\Result distributeImage(array $args = [])
 * @phpstan-method \Aws\Result distributeImage(array{
 *     sourceImage?: string,
 *     distributionConfigurationArn?: string,
 *     executionRole?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     loggingConfiguration?: array{logGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise distributeImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise distributeImageAsync(array{
 *     sourceImage?: string,
 *     distributionConfigurationArn?: string,
 *     executionRole?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     loggingConfiguration?: array{logGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getComponent(array $args = [])
 * @phpstan-method \Aws\Result getComponent(array{componentBuildVersionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComponentAsync(array{componentBuildVersionArn?: string, ...} $args = [])
 * @method \Aws\Result getComponentPolicy(array $args = [])
 * @phpstan-method \Aws\Result getComponentPolicy(array{componentArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getComponentPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComponentPolicyAsync(array{componentArn?: string, ...} $args = [])
 * @method \Aws\Result getContainerRecipe(array $args = [])
 * @phpstan-method \Aws\Result getContainerRecipe(array{containerRecipeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContainerRecipeAsync(array{containerRecipeArn?: string, ...} $args = [])
 * @method \Aws\Result getContainerRecipePolicy(array $args = [])
 * @phpstan-method \Aws\Result getContainerRecipePolicy(array{containerRecipeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContainerRecipePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContainerRecipePolicyAsync(array{containerRecipeArn?: string, ...} $args = [])
 * @method \Aws\Result getDistributionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getDistributionConfiguration(array{distributionConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDistributionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDistributionConfigurationAsync(array{distributionConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result getImage(array $args = [])
 * @phpstan-method \Aws\Result getImage(array{imageBuildVersionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImageAsync(array{imageBuildVersionArn?: string, ...} $args = [])
 * @method \Aws\Result getImagePipeline(array $args = [])
 * @phpstan-method \Aws\Result getImagePipeline(array{imagePipelineArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImagePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImagePipelineAsync(array{imagePipelineArn?: string, ...} $args = [])
 * @method \Aws\Result getImagePolicy(array $args = [])
 * @phpstan-method \Aws\Result getImagePolicy(array{imageArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImagePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImagePolicyAsync(array{imageArn?: string, ...} $args = [])
 * @method \Aws\Result getImageRecipe(array $args = [])
 * @phpstan-method \Aws\Result getImageRecipe(array{imageRecipeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImageRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImageRecipeAsync(array{imageRecipeArn?: string, ...} $args = [])
 * @method \Aws\Result getImageRecipePolicy(array $args = [])
 * @phpstan-method \Aws\Result getImageRecipePolicy(array{imageRecipeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImageRecipePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImageRecipePolicyAsync(array{imageRecipeArn?: string, ...} $args = [])
 * @method \Aws\Result getInfrastructureConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getInfrastructureConfiguration(array{infrastructureConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInfrastructureConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInfrastructureConfigurationAsync(array{infrastructureConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result getLifecycleExecution(array $args = [])
 * @phpstan-method \Aws\Result getLifecycleExecution(array{lifecycleExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLifecycleExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLifecycleExecutionAsync(array{lifecycleExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result getLifecyclePolicy(array{lifecyclePolicyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLifecyclePolicyAsync(array{lifecyclePolicyArn?: string, ...} $args = [])
 * @method \Aws\Result getMarketplaceResource(array $args = [])
 * @phpstan-method \Aws\Result getMarketplaceResource(array{
 *     resourceType?: 'COMPONENT_ARTIFACT'|'COMPONENT_DATA',
 *     resourceArn?: string,
 *     resourceLocation?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMarketplaceResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMarketplaceResourceAsync(array{
 *     resourceType?: 'COMPONENT_ARTIFACT'|'COMPONENT_DATA',
 *     resourceArn?: string,
 *     resourceLocation?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getWorkflow(array $args = [])
 * @phpstan-method \Aws\Result getWorkflow(array{workflowBuildVersionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowAsync(array{workflowBuildVersionArn?: string, ...} $args = [])
 * @method \Aws\Result getWorkflowExecution(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowExecution(array{workflowExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowExecutionAsync(array{workflowExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getWorkflowStepExecution(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowStepExecution(array{stepExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowStepExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowStepExecutionAsync(array{stepExecutionId?: string, ...} $args = [])
 * @method \Aws\Result importComponent(array $args = [])
 * @phpstan-method \Aws\Result importComponent(array{
 *     name?: string,
 *     semanticVersion?: string,
 *     description?: string,
 *     changeDescription?: string,
 *     type?: 'BUILD'|'TEST',
 *     format?: 'SHELL',
 *     platform?: 'Linux'|'Windows'|'macOS',
 *     data?: string,
 *     uri?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importComponentAsync(array{
 *     name?: string,
 *     semanticVersion?: string,
 *     description?: string,
 *     changeDescription?: string,
 *     type?: 'BUILD'|'TEST',
 *     format?: 'SHELL',
 *     platform?: 'Linux'|'Windows'|'macOS',
 *     data?: string,
 *     uri?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importDiskImage(array $args = [])
 * @phpstan-method \Aws\Result importDiskImage(array{
 *     name?: string,
 *     semanticVersion?: string,
 *     description?: string,
 *     platform?: string,
 *     osVersion?: string,
 *     executionRole?: string,
 *     infrastructureConfigurationArn?: string,
 *     uri?: string,
 *     loggingConfiguration?: array{logGroupName?: string, ...},
 *     tags?: array<string, string>,
 *     registerImageOptions?: array{secureBootEnabled?: bool, uefiData?: string, ...},
 *     windowsConfiguration?: array{imageIndex?: int, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importDiskImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importDiskImageAsync(array{
 *     name?: string,
 *     semanticVersion?: string,
 *     description?: string,
 *     platform?: string,
 *     osVersion?: string,
 *     executionRole?: string,
 *     infrastructureConfigurationArn?: string,
 *     uri?: string,
 *     loggingConfiguration?: array{logGroupName?: string, ...},
 *     tags?: array<string, string>,
 *     registerImageOptions?: array{secureBootEnabled?: bool, uefiData?: string, ...},
 *     windowsConfiguration?: array{imageIndex?: int, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importVmImage(array $args = [])
 * @phpstan-method \Aws\Result importVmImage(array{
 *     name?: string,
 *     semanticVersion?: string,
 *     description?: string,
 *     platform?: 'Linux'|'Windows'|'macOS',
 *     osVersion?: string,
 *     vmImportTaskId?: string,
 *     loggingConfiguration?: array{logGroupName?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importVmImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importVmImageAsync(array{
 *     name?: string,
 *     semanticVersion?: string,
 *     description?: string,
 *     platform?: 'Linux'|'Windows'|'macOS',
 *     osVersion?: string,
 *     vmImportTaskId?: string,
 *     loggingConfiguration?: array{logGroupName?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listComponentBuildVersions(array $args = [])
 * @phpstan-method \Aws\Result listComponentBuildVersions(array{componentVersionArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentBuildVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentBuildVersionsAsync(array{componentVersionArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listComponents(array $args = [])
 * @phpstan-method \Aws\Result listComponents(array{
 *     owner?: 'AWSMarketplace'|'Amazon'|'Self'|'Shared'|'ThirdParty',
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     byName?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentsAsync(array{
 *     owner?: 'AWSMarketplace'|'Amazon'|'Self'|'Shared'|'ThirdParty',
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     byName?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listContainerRecipes(array $args = [])
 * @phpstan-method \Aws\Result listContainerRecipes(array{
 *     owner?: 'AWSMarketplace'|'Amazon'|'Self'|'Shared'|'ThirdParty',
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listContainerRecipesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContainerRecipesAsync(array{
 *     owner?: 'AWSMarketplace'|'Amazon'|'Self'|'Shared'|'ThirdParty',
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDistributionConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listDistributionConfigurations(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDistributionConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDistributionConfigurationsAsync(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImageBuildVersions(array $args = [])
 * @phpstan-method \Aws\Result listImageBuildVersions(array{
 *     imageVersionArn?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImageBuildVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImageBuildVersionsAsync(array{
 *     imageVersionArn?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImagePackages(array $args = [])
 * @phpstan-method \Aws\Result listImagePackages(array{imageBuildVersionArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImagePackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImagePackagesAsync(array{imageBuildVersionArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listImagePipelineImages(array $args = [])
 * @phpstan-method \Aws\Result listImagePipelineImages(array{
 *     imagePipelineArn?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImagePipelineImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImagePipelineImagesAsync(array{
 *     imagePipelineArn?: string,
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImagePipelines(array $args = [])
 * @phpstan-method \Aws\Result listImagePipelines(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImagePipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImagePipelinesAsync(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImageRecipes(array $args = [])
 * @phpstan-method \Aws\Result listImageRecipes(array{
 *     owner?: 'AWSMarketplace'|'Amazon'|'Self'|'Shared'|'ThirdParty',
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImageRecipesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImageRecipesAsync(array{
 *     owner?: 'AWSMarketplace'|'Amazon'|'Self'|'Shared'|'ThirdParty',
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImageScanFindingAggregations(array $args = [])
 * @phpstan-method \Aws\Result listImageScanFindingAggregations(array{filter?: array{name?: string, values?: list<string>, ...}, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImageScanFindingAggregationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImageScanFindingAggregationsAsync(array{filter?: array{name?: string, values?: list<string>, ...}, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listImageScanFindings(array $args = [])
 * @phpstan-method \Aws\Result listImageScanFindings(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImageScanFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImageScanFindingsAsync(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImages(array $args = [])
 * @phpstan-method \Aws\Result listImages(array{
 *     owner?: 'AWSMarketplace'|'Amazon'|'Self'|'Shared'|'ThirdParty',
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     byName?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     includeDeprecated?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImagesAsync(array{
 *     owner?: 'AWSMarketplace'|'Amazon'|'Self'|'Shared'|'ThirdParty',
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     byName?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     includeDeprecated?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInfrastructureConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listInfrastructureConfigurations(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInfrastructureConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInfrastructureConfigurationsAsync(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLifecycleExecutionResources(array $args = [])
 * @phpstan-method \Aws\Result listLifecycleExecutionResources(array{lifecycleExecutionId?: string, parentResourceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLifecycleExecutionResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLifecycleExecutionResourcesAsync(array{lifecycleExecutionId?: string, parentResourceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listLifecycleExecutions(array $args = [])
 * @phpstan-method \Aws\Result listLifecycleExecutions(array{maxResults?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLifecycleExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLifecycleExecutionsAsync(array{maxResults?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listLifecyclePolicies(array $args = [])
 * @phpstan-method \Aws\Result listLifecyclePolicies(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLifecyclePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLifecyclePoliciesAsync(array{
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listWaitingWorkflowSteps(array $args = [])
 * @phpstan-method \Aws\Result listWaitingWorkflowSteps(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWaitingWorkflowStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWaitingWorkflowStepsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listWorkflowBuildVersions(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowBuildVersions(array{workflowVersionArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowBuildVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowBuildVersionsAsync(array{workflowVersionArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listWorkflowExecutions(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowExecutions(array{maxResults?: int, nextToken?: string, imageBuildVersionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowExecutionsAsync(array{maxResults?: int, nextToken?: string, imageBuildVersionArn?: string, ...} $args = [])
 * @method \Aws\Result listWorkflowStepExecutions(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowStepExecutions(array{maxResults?: int, nextToken?: string, workflowExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowStepExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowStepExecutionsAsync(array{maxResults?: int, nextToken?: string, workflowExecutionId?: string, ...} $args = [])
 * @method \Aws\Result listWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listWorkflows(array{
 *     owner?: 'AWSMarketplace'|'Amazon'|'Self'|'Shared'|'ThirdParty',
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     byName?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array{
 *     owner?: 'AWSMarketplace'|'Amazon'|'Self'|'Shared'|'ThirdParty',
 *     filters?: list<array{name?: string, values?: list<string>, ...}>,
 *     byName?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putComponentPolicy(array $args = [])
 * @phpstan-method \Aws\Result putComponentPolicy(array{componentArn?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putComponentPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putComponentPolicyAsync(array{componentArn?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result putContainerRecipePolicy(array $args = [])
 * @phpstan-method \Aws\Result putContainerRecipePolicy(array{containerRecipeArn?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putContainerRecipePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putContainerRecipePolicyAsync(array{containerRecipeArn?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result putImagePolicy(array $args = [])
 * @phpstan-method \Aws\Result putImagePolicy(array{imageArn?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putImagePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putImagePolicyAsync(array{imageArn?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result putImageRecipePolicy(array $args = [])
 * @phpstan-method \Aws\Result putImageRecipePolicy(array{imageRecipeArn?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putImageRecipePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putImageRecipePolicyAsync(array{imageRecipeArn?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result retryImage(array $args = [])
 * @phpstan-method \Aws\Result retryImage(array{imageBuildVersionArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retryImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retryImageAsync(array{imageBuildVersionArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result sendWorkflowStepAction(array $args = [])
 * @phpstan-method \Aws\Result sendWorkflowStepAction(array{
 *     stepExecutionId?: string,
 *     imageBuildVersionArn?: string,
 *     action?: 'RESUME'|'STOP',
 *     reason?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendWorkflowStepActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendWorkflowStepActionAsync(array{
 *     stepExecutionId?: string,
 *     imageBuildVersionArn?: string,
 *     action?: 'RESUME'|'STOP',
 *     reason?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startImagePipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result startImagePipelineExecution(array{imagePipelineArn?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startImagePipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImagePipelineExecutionAsync(array{imagePipelineArn?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result startResourceStateUpdate(array $args = [])
 * @phpstan-method \Aws\Result startResourceStateUpdate(array{
 *     resourceArn?: string,
 *     state?: array{status?: 'AVAILABLE'|'DELETED'|'DEPRECATED'|'DISABLED', ...},
 *     executionRole?: string,
 *     includeResources?: array{amis?: bool, snapshots?: bool, containers?: bool, ...},
 *     exclusionRules?: array{
 *         amis?: array{
 *             isPublic?: bool,
 *             regions?: list<string>,
 *             sharedAccounts?: list<string>,
 *             lastLaunched?: array,
 *             tagMap?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     updateAt?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startResourceStateUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startResourceStateUpdateAsync(array{
 *     resourceArn?: string,
 *     state?: array{status?: 'AVAILABLE'|'DELETED'|'DEPRECATED'|'DISABLED', ...},
 *     executionRole?: string,
 *     includeResources?: array{amis?: bool, snapshots?: bool, containers?: bool, ...},
 *     exclusionRules?: array{
 *         amis?: array{
 *             isPublic?: bool,
 *             regions?: list<string>,
 *             sharedAccounts?: list<string>,
 *             lastLaunched?: array,
 *             tagMap?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     updateAt?: int|string|\DateTimeInterface,
 *     clientToken?: string,
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
 * @method \Aws\Result updateDistributionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateDistributionConfiguration(array{
 *     distributionConfigurationArn?: string,
 *     description?: string,
 *     distributions?: list<array{
 *         region?: string,
 *         amiDistributionConfiguration?: array,
 *         containerDistributionConfiguration?: array,
 *         licenseConfigurationArns?: list<string>,
 *         launchTemplateConfigurations?: list<array>,
 *         s3ExportConfiguration?: array,
 *         fastLaunchConfigurations?: list<array>,
 *         ssmParameterConfigurations?: list<array>,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDistributionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDistributionConfigurationAsync(array{
 *     distributionConfigurationArn?: string,
 *     description?: string,
 *     distributions?: list<array{
 *         region?: string,
 *         amiDistributionConfiguration?: array,
 *         containerDistributionConfiguration?: array,
 *         licenseConfigurationArns?: list<string>,
 *         launchTemplateConfigurations?: list<array>,
 *         s3ExportConfiguration?: array,
 *         fastLaunchConfigurations?: list<array>,
 *         ssmParameterConfigurations?: list<array>,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateImagePipeline(array $args = [])
 * @phpstan-method \Aws\Result updateImagePipeline(array{
 *     imagePipelineArn?: string,
 *     description?: string,
 *     imageRecipeArn?: string,
 *     containerRecipeArn?: string,
 *     infrastructureConfigurationArn?: string,
 *     distributionConfigurationArn?: string,
 *     imageTestsConfiguration?: array{imageTestsEnabled?: bool, timeoutMinutes?: int, ...},
 *     enhancedImageMetadataEnabled?: bool,
 *     schedule?: array{
 *         scheduleExpression?: string,
 *         timezone?: string,
 *         pipelineExecutionStartCondition?: 'EXPRESSION_MATCH_AND_DEPENDENCY_UPDATES_AVAILABLE'|'EXPRESSION_MATCH_ONLY',
 *         autoDisablePolicy?: array{failureCount?: int, ...},
 *         ...,
 *     },
 *     status?: 'DISABLED'|'ENABLED',
 *     clientToken?: string,
 *     imageScanningConfiguration?: array{
 *         imageScanningEnabled?: bool,
 *         ecrConfiguration?: array{repositoryName?: string, containerTags?: list<string>, ...},
 *         ...,
 *     },
 *     workflows?: list<array{
 *         workflowArn?: string,
 *         parameters?: list<array>,
 *         parallelGroup?: string,
 *         onFailure?: 'ABORT'|'CONTINUE',
 *         ...,
 *     }>,
 *     loggingConfiguration?: array{imageLogGroupName?: string, pipelineLogGroupName?: string, ...},
 *     executionRole?: string,
 *     imageTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateImagePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateImagePipelineAsync(array{
 *     imagePipelineArn?: string,
 *     description?: string,
 *     imageRecipeArn?: string,
 *     containerRecipeArn?: string,
 *     infrastructureConfigurationArn?: string,
 *     distributionConfigurationArn?: string,
 *     imageTestsConfiguration?: array{imageTestsEnabled?: bool, timeoutMinutes?: int, ...},
 *     enhancedImageMetadataEnabled?: bool,
 *     schedule?: array{
 *         scheduleExpression?: string,
 *         timezone?: string,
 *         pipelineExecutionStartCondition?: 'EXPRESSION_MATCH_AND_DEPENDENCY_UPDATES_AVAILABLE'|'EXPRESSION_MATCH_ONLY',
 *         autoDisablePolicy?: array{failureCount?: int, ...},
 *         ...,
 *     },
 *     status?: 'DISABLED'|'ENABLED',
 *     clientToken?: string,
 *     imageScanningConfiguration?: array{
 *         imageScanningEnabled?: bool,
 *         ecrConfiguration?: array{repositoryName?: string, containerTags?: list<string>, ...},
 *         ...,
 *     },
 *     workflows?: list<array{
 *         workflowArn?: string,
 *         parameters?: list<array>,
 *         parallelGroup?: string,
 *         onFailure?: 'ABORT'|'CONTINUE',
 *         ...,
 *     }>,
 *     loggingConfiguration?: array{imageLogGroupName?: string, pipelineLogGroupName?: string, ...},
 *     executionRole?: string,
 *     imageTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInfrastructureConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateInfrastructureConfiguration(array{
 *     infrastructureConfigurationArn?: string,
 *     description?: string,
 *     instanceTypes?: list<string>,
 *     instanceProfileName?: string,
 *     securityGroupIds?: list<string>,
 *     subnetId?: string,
 *     logging?: array{s3Logs?: array{s3BucketName?: string, s3KeyPrefix?: string, ...}, ...},
 *     keyPair?: string,
 *     terminateInstanceOnFailure?: bool,
 *     snsTopicArn?: string,
 *     resourceTags?: array<string, string>,
 *     instanceMetadataOptions?: array{httpTokens?: string, httpPutResponseHopLimit?: int, ...},
 *     placement?: array{
 *         availabilityZone?: string,
 *         tenancy?: 'dedicated'|'default'|'host',
 *         hostId?: string,
 *         hostResourceGroupArn?: string,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInfrastructureConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInfrastructureConfigurationAsync(array{
 *     infrastructureConfigurationArn?: string,
 *     description?: string,
 *     instanceTypes?: list<string>,
 *     instanceProfileName?: string,
 *     securityGroupIds?: list<string>,
 *     subnetId?: string,
 *     logging?: array{s3Logs?: array{s3BucketName?: string, s3KeyPrefix?: string, ...}, ...},
 *     keyPair?: string,
 *     terminateInstanceOnFailure?: bool,
 *     snsTopicArn?: string,
 *     resourceTags?: array<string, string>,
 *     instanceMetadataOptions?: array{httpTokens?: string, httpPutResponseHopLimit?: int, ...},
 *     placement?: array{
 *         availabilityZone?: string,
 *         tenancy?: 'dedicated'|'default'|'host',
 *         hostId?: string,
 *         hostResourceGroupArn?: string,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result updateLifecyclePolicy(array{
 *     lifecyclePolicyArn?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     executionRole?: string,
 *     resourceType?: 'AMI_IMAGE'|'CONTAINER_IMAGE',
 *     policyDetails?: list<array{action?: array, filter?: array, exclusionRules?: array, ...}>,
 *     resourceSelection?: array{recipes?: list<array>, tagMap?: array<string, string>, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLifecyclePolicyAsync(array{
 *     lifecyclePolicyArn?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     executionRole?: string,
 *     resourceType?: 'AMI_IMAGE'|'CONTAINER_IMAGE',
 *     policyDetails?: list<array{action?: array, filter?: array, exclusionRules?: array, ...}>,
 *     resourceSelection?: array{recipes?: list<array>, tagMap?: array<string, string>, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 */
class imagebuilderClient extends AwsClient {}
