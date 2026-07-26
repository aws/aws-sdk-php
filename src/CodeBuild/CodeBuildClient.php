<?php
namespace Aws\CodeBuild;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CodeBuild** service.
 * @method \Aws\Result batchDeleteBuilds(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteBuilds(array{ids?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteBuildsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteBuildsAsync(array{ids?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetBuildBatches(array $args = [])
 * @phpstan-method \Aws\Result batchGetBuildBatches(array{ids?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetBuildBatchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetBuildBatchesAsync(array{ids?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetBuilds(array $args = [])
 * @phpstan-method \Aws\Result batchGetBuilds(array{ids?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetBuildsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetBuildsAsync(array{ids?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetCommandExecutions(array $args = [])
 * @phpstan-method \Aws\Result batchGetCommandExecutions(array{sandboxId?: string, commandExecutionIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCommandExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCommandExecutionsAsync(array{sandboxId?: string, commandExecutionIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetFleets(array $args = [])
 * @phpstan-method \Aws\Result batchGetFleets(array{names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetFleetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetFleetsAsync(array{names?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetProjects(array $args = [])
 * @phpstan-method \Aws\Result batchGetProjects(array{names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetProjectsAsync(array{names?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetReportGroups(array $args = [])
 * @phpstan-method \Aws\Result batchGetReportGroups(array{reportGroupArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetReportGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetReportGroupsAsync(array{reportGroupArns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetReports(array $args = [])
 * @phpstan-method \Aws\Result batchGetReports(array{reportArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetReportsAsync(array{reportArns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetSandboxes(array $args = [])
 * @phpstan-method \Aws\Result batchGetSandboxes(array{ids?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetSandboxesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetSandboxesAsync(array{ids?: list<string>, ...} $args = [])
 * @method \Aws\Result createFleet(array $args = [])
 * @phpstan-method \Aws\Result createFleet(array{
 *     name?: string,
 *     baseCapacity?: int,
 *     environmentType?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *     computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *     computeConfiguration?: array{vCpu?: int, memory?: int, disk?: int, machineType?: 'GENERAL'|'NVME', instanceType?: string, ...},
 *     scalingConfiguration?: array{
 *         scalingType?: 'TARGET_TRACKING_SCALING',
 *         targetTrackingScalingConfigs?: list<array>,
 *         maxCapacity?: int,
 *         ...,
 *     },
 *     overflowBehavior?: 'ON_DEMAND'|'QUEUE',
 *     vpcConfig?: array{vpcId?: string, subnets?: list<string>, securityGroupIds?: list<string>, ...},
 *     proxyConfiguration?: array{defaultBehavior?: 'ALLOW_ALL'|'DENY_ALL', orderedProxyRules?: list<array>, ...},
 *     imageId?: string,
 *     fleetServiceRole?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFleetAsync(array{
 *     name?: string,
 *     baseCapacity?: int,
 *     environmentType?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *     computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *     computeConfiguration?: array{vCpu?: int, memory?: int, disk?: int, machineType?: 'GENERAL'|'NVME', instanceType?: string, ...},
 *     scalingConfiguration?: array{
 *         scalingType?: 'TARGET_TRACKING_SCALING',
 *         targetTrackingScalingConfigs?: list<array>,
 *         maxCapacity?: int,
 *         ...,
 *     },
 *     overflowBehavior?: 'ON_DEMAND'|'QUEUE',
 *     vpcConfig?: array{vpcId?: string, subnets?: list<string>, securityGroupIds?: list<string>, ...},
 *     proxyConfiguration?: array{defaultBehavior?: 'ALLOW_ALL'|'DENY_ALL', orderedProxyRules?: list<array>, ...},
 *     imageId?: string,
 *     fleetServiceRole?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @phpstan-method \Aws\Result createProject(array{
 *     name?: string,
 *     description?: string,
 *     source?: array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array{fetchSubmodules?: bool, ...},
 *         buildspec?: string,
 *         auth?: array{type?: 'CODECONNECTIONS'|'OAUTH'|'SECRETS_MANAGER', resource?: string, ...},
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array{context?: string, targetUrl?: string, ...},
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     },
 *     secondarySources?: list<array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array,
 *         buildspec?: string,
 *         auth?: array,
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array,
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     }>,
 *     sourceVersion?: string,
 *     secondarySourceVersions?: list<array{sourceIdentifier?: string, sourceVersion?: string, ...}>,
 *     artifacts?: array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     },
 *     secondaryArtifacts?: list<array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     }>,
 *     cache?: array{
 *         type?: 'LOCAL'|'NO_CACHE'|'S3',
 *         location?: string,
 *         modes?: list<'LOCAL_CUSTOM_CACHE'|'LOCAL_DOCKER_LAYER_CACHE'|'LOCAL_SOURCE_CACHE'>,
 *         cacheNamespace?: string,
 *         ...,
 *     },
 *     environment?: array{
 *         type?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *         image?: string,
 *         computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *         computeConfiguration?: array{vCpu?: int, memory?: int, disk?: int, machineType?: 'GENERAL'|'NVME', instanceType?: string, ...},
 *         fleet?: array{fleetArn?: string, ...},
 *         environmentVariables?: list<array>,
 *         privilegedMode?: bool,
 *         certificate?: string,
 *         registryCredential?: array{credential?: string, credentialProvider?: 'SECRETS_MANAGER', ...},
 *         imagePullCredentialsType?: 'CODEBUILD'|'SERVICE_ROLE',
 *         dockerServer?: array{
 *             computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *             securityGroupIds?: list<string>,
 *             status?: array,
 *             ...,
 *         },
 *         hostKernel?: 'LINUX_KERNEL_4'|'LINUX_KERNEL_6'|'LINUX_KERNEL_LATEST',
 *         ...,
 *     },
 *     serviceRole?: string,
 *     timeoutInMinutes?: int,
 *     queuedTimeoutInMinutes?: int,
 *     encryptionKey?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     vpcConfig?: array{vpcId?: string, subnets?: list<string>, securityGroupIds?: list<string>, ...},
 *     badgeEnabled?: bool,
 *     logsConfig?: array{
 *         cloudWatchLogs?: array{status?: 'DISABLED'|'ENABLED', groupName?: string, streamName?: string, ...},
 *         s3Logs?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             location?: string,
 *             encryptionDisabled?: bool,
 *             bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     fileSystemLocations?: list<array{type?: 'EFS', location?: string, mountPoint?: string, identifier?: string, mountOptions?: string, ...}>,
 *     buildBatchConfig?: array{
 *         serviceRole?: string,
 *         combineArtifacts?: bool,
 *         restrictions?: array{maximumBuildsAllowed?: int, computeTypesAllowed?: list<string>, fleetsAllowed?: list<string>, ...},
 *         timeoutInMins?: int,
 *         batchReportMode?: 'REPORT_AGGREGATED_BATCH'|'REPORT_INDIVIDUAL_BUILDS',
 *         ...,
 *     },
 *     concurrentBuildLimit?: int,
 *     autoRetryLimit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectAsync(array{
 *     name?: string,
 *     description?: string,
 *     source?: array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array{fetchSubmodules?: bool, ...},
 *         buildspec?: string,
 *         auth?: array{type?: 'CODECONNECTIONS'|'OAUTH'|'SECRETS_MANAGER', resource?: string, ...},
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array{context?: string, targetUrl?: string, ...},
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     },
 *     secondarySources?: list<array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array,
 *         buildspec?: string,
 *         auth?: array,
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array,
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     }>,
 *     sourceVersion?: string,
 *     secondarySourceVersions?: list<array{sourceIdentifier?: string, sourceVersion?: string, ...}>,
 *     artifacts?: array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     },
 *     secondaryArtifacts?: list<array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     }>,
 *     cache?: array{
 *         type?: 'LOCAL'|'NO_CACHE'|'S3',
 *         location?: string,
 *         modes?: list<'LOCAL_CUSTOM_CACHE'|'LOCAL_DOCKER_LAYER_CACHE'|'LOCAL_SOURCE_CACHE'>,
 *         cacheNamespace?: string,
 *         ...,
 *     },
 *     environment?: array{
 *         type?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *         image?: string,
 *         computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *         computeConfiguration?: array{vCpu?: int, memory?: int, disk?: int, machineType?: 'GENERAL'|'NVME', instanceType?: string, ...},
 *         fleet?: array{fleetArn?: string, ...},
 *         environmentVariables?: list<array>,
 *         privilegedMode?: bool,
 *         certificate?: string,
 *         registryCredential?: array{credential?: string, credentialProvider?: 'SECRETS_MANAGER', ...},
 *         imagePullCredentialsType?: 'CODEBUILD'|'SERVICE_ROLE',
 *         dockerServer?: array{
 *             computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *             securityGroupIds?: list<string>,
 *             status?: array,
 *             ...,
 *         },
 *         hostKernel?: 'LINUX_KERNEL_4'|'LINUX_KERNEL_6'|'LINUX_KERNEL_LATEST',
 *         ...,
 *     },
 *     serviceRole?: string,
 *     timeoutInMinutes?: int,
 *     queuedTimeoutInMinutes?: int,
 *     encryptionKey?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     vpcConfig?: array{vpcId?: string, subnets?: list<string>, securityGroupIds?: list<string>, ...},
 *     badgeEnabled?: bool,
 *     logsConfig?: array{
 *         cloudWatchLogs?: array{status?: 'DISABLED'|'ENABLED', groupName?: string, streamName?: string, ...},
 *         s3Logs?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             location?: string,
 *             encryptionDisabled?: bool,
 *             bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     fileSystemLocations?: list<array{type?: 'EFS', location?: string, mountPoint?: string, identifier?: string, mountOptions?: string, ...}>,
 *     buildBatchConfig?: array{
 *         serviceRole?: string,
 *         combineArtifacts?: bool,
 *         restrictions?: array{maximumBuildsAllowed?: int, computeTypesAllowed?: list<string>, fleetsAllowed?: list<string>, ...},
 *         timeoutInMins?: int,
 *         batchReportMode?: 'REPORT_AGGREGATED_BATCH'|'REPORT_INDIVIDUAL_BUILDS',
 *         ...,
 *     },
 *     concurrentBuildLimit?: int,
 *     autoRetryLimit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReportGroup(array $args = [])
 * @phpstan-method \Aws\Result createReportGroup(array{
 *     name?: string,
 *     type?: 'CODE_COVERAGE'|'TEST',
 *     exportConfig?: array{
 *         exportConfigType?: 'NO_EXPORT'|'S3',
 *         s3Destination?: array{
 *             bucket?: string,
 *             bucketOwner?: string,
 *             path?: string,
 *             packaging?: 'NONE'|'ZIP',
 *             encryptionKey?: string,
 *             encryptionDisabled?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReportGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReportGroupAsync(array{
 *     name?: string,
 *     type?: 'CODE_COVERAGE'|'TEST',
 *     exportConfig?: array{
 *         exportConfigType?: 'NO_EXPORT'|'S3',
 *         s3Destination?: array{
 *             bucket?: string,
 *             bucketOwner?: string,
 *             path?: string,
 *             packaging?: 'NONE'|'ZIP',
 *             encryptionKey?: string,
 *             encryptionDisabled?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWebhook(array $args = [])
 * @phpstan-method \Aws\Result createWebhook(array{
 *     projectName?: string,
 *     branchFilter?: string,
 *     filterGroups?: list<list<array>>,
 *     buildType?: 'BUILD'|'BUILD_BATCH'|'RUNNER_BUILDKITE_BUILD',
 *     manualCreation?: bool,
 *     scopeConfiguration?: array{name?: string, domain?: string, scope?: 'GITHUB_GLOBAL'|'GITHUB_ORGANIZATION'|'GITLAB_GROUP', ...},
 *     pullRequestBuildPolicy?: array{
 *         requiresCommentApproval?: 'ALL_PULL_REQUESTS'|'DISABLED'|'FORK_PULL_REQUESTS',
 *         approverRoles?: list<'BITBUCKET_ADMIN'|'BITBUCKET_READ'|'BITBUCKET_WRITE'|'GITHUB_ADMIN'|'GITHUB_MAINTAIN'|'GITHUB_READ'|'GITHUB_TRIAGE'|'GITHUB_WRITE'|'GITLAB_DEVELOPER'|'GITLAB_GUEST'|'GITLAB_MAINTAINER'|'GITLAB_OWNER'|'GITLAB_PLANNER'|'GITLAB_REPORTER'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebhookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebhookAsync(array{
 *     projectName?: string,
 *     branchFilter?: string,
 *     filterGroups?: list<list<array>>,
 *     buildType?: 'BUILD'|'BUILD_BATCH'|'RUNNER_BUILDKITE_BUILD',
 *     manualCreation?: bool,
 *     scopeConfiguration?: array{name?: string, domain?: string, scope?: 'GITHUB_GLOBAL'|'GITHUB_ORGANIZATION'|'GITLAB_GROUP', ...},
 *     pullRequestBuildPolicy?: array{
 *         requiresCommentApproval?: 'ALL_PULL_REQUESTS'|'DISABLED'|'FORK_PULL_REQUESTS',
 *         approverRoles?: list<'BITBUCKET_ADMIN'|'BITBUCKET_READ'|'BITBUCKET_WRITE'|'GITHUB_ADMIN'|'GITHUB_MAINTAIN'|'GITHUB_READ'|'GITHUB_TRIAGE'|'GITHUB_WRITE'|'GITLAB_DEVELOPER'|'GITLAB_GUEST'|'GITLAB_MAINTAINER'|'GITLAB_OWNER'|'GITLAB_PLANNER'|'GITLAB_REPORTER'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBuildBatch(array $args = [])
 * @phpstan-method \Aws\Result deleteBuildBatch(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBuildBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBuildBatchAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteFleet(array $args = [])
 * @phpstan-method \Aws\Result deleteFleet(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFleetAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @phpstan-method \Aws\Result deleteProject(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteReport(array $args = [])
 * @phpstan-method \Aws\Result deleteReport(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReportAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteReportGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteReportGroup(array{arn?: string, deleteReports?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReportGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReportGroupAsync(array{arn?: string, deleteReports?: bool, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSourceCredentials(array $args = [])
 * @phpstan-method \Aws\Result deleteSourceCredentials(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSourceCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSourceCredentialsAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteWebhook(array $args = [])
 * @phpstan-method \Aws\Result deleteWebhook(array{projectName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebhookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebhookAsync(array{projectName?: string, ...} $args = [])
 * @method \Aws\Result describeCodeCoverages(array $args = [])
 * @phpstan-method \Aws\Result describeCodeCoverages(array{
 *     reportArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     sortBy?: 'FILE_PATH'|'LINE_COVERAGE_PERCENTAGE',
 *     minLineCoveragePercentage?: float,
 *     maxLineCoveragePercentage?: float,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCodeCoveragesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCodeCoveragesAsync(array{
 *     reportArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     sortBy?: 'FILE_PATH'|'LINE_COVERAGE_PERCENTAGE',
 *     minLineCoveragePercentage?: float,
 *     maxLineCoveragePercentage?: float,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeTestCases(array $args = [])
 * @phpstan-method \Aws\Result describeTestCases(array{
 *     reportArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{status?: string, keyword?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTestCasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTestCasesAsync(array{
 *     reportArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{status?: string, keyword?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getReportGroupTrend(array $args = [])
 * @phpstan-method \Aws\Result getReportGroupTrend(array{
 *     reportGroupArn?: string,
 *     numOfReports?: int,
 *     trendField?: 'BRANCHES_COVERED'|'BRANCHES_MISSED'|'BRANCH_COVERAGE'|'DURATION'|'LINES_COVERED'|'LINES_MISSED'|'LINE_COVERAGE'|'PASS_RATE'|'TOTAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getReportGroupTrendAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReportGroupTrendAsync(array{
 *     reportGroupArn?: string,
 *     numOfReports?: int,
 *     trendField?: 'BRANCHES_COVERED'|'BRANCHES_MISSED'|'BRANCH_COVERAGE'|'DURATION'|'LINES_COVERED'|'LINES_MISSED'|'LINE_COVERAGE'|'PASS_RATE'|'TOTAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result importSourceCredentials(array $args = [])
 * @phpstan-method \Aws\Result importSourceCredentials(array{
 *     username?: string,
 *     token?: string,
 *     serverType?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED',
 *     authType?: 'BASIC_AUTH'|'CODECONNECTIONS'|'OAUTH'|'PERSONAL_ACCESS_TOKEN'|'SECRETS_MANAGER',
 *     shouldOverwrite?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importSourceCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importSourceCredentialsAsync(array{
 *     username?: string,
 *     token?: string,
 *     serverType?: 'BITBUCKET'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED',
 *     authType?: 'BASIC_AUTH'|'CODECONNECTIONS'|'OAUTH'|'PERSONAL_ACCESS_TOKEN'|'SECRETS_MANAGER',
 *     shouldOverwrite?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result invalidateProjectCache(array $args = [])
 * @phpstan-method \Aws\Result invalidateProjectCache(array{projectName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise invalidateProjectCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invalidateProjectCacheAsync(array{projectName?: string, ...} $args = [])
 * @method \Aws\Result listBuildBatches(array $args = [])
 * @phpstan-method \Aws\Result listBuildBatches(array{
 *     filter?: array{status?: 'FAILED'|'FAULT'|'IN_PROGRESS'|'STOPPED'|'SUCCEEDED'|'TIMED_OUT', ...},
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBuildBatchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBuildBatchesAsync(array{
 *     filter?: array{status?: 'FAILED'|'FAULT'|'IN_PROGRESS'|'STOPPED'|'SUCCEEDED'|'TIMED_OUT', ...},
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBuildBatchesForProject(array $args = [])
 * @phpstan-method \Aws\Result listBuildBatchesForProject(array{
 *     projectName?: string,
 *     filter?: array{status?: 'FAILED'|'FAULT'|'IN_PROGRESS'|'STOPPED'|'SUCCEEDED'|'TIMED_OUT', ...},
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBuildBatchesForProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBuildBatchesForProjectAsync(array{
 *     projectName?: string,
 *     filter?: array{status?: 'FAILED'|'FAULT'|'IN_PROGRESS'|'STOPPED'|'SUCCEEDED'|'TIMED_OUT', ...},
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBuilds(array $args = [])
 * @phpstan-method \Aws\Result listBuilds(array{sortOrder?: 'ASCENDING'|'DESCENDING', nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBuildsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBuildsAsync(array{sortOrder?: 'ASCENDING'|'DESCENDING', nextToken?: string, ...} $args = [])
 * @method \Aws\Result listBuildsForProject(array $args = [])
 * @phpstan-method \Aws\Result listBuildsForProject(array{projectName?: string, sortOrder?: 'ASCENDING'|'DESCENDING', nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBuildsForProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBuildsForProjectAsync(array{projectName?: string, sortOrder?: 'ASCENDING'|'DESCENDING', nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCommandExecutionsForSandbox(array $args = [])
 * @phpstan-method \Aws\Result listCommandExecutionsForSandbox(array{sandboxId?: string, maxResults?: int, sortOrder?: 'ASCENDING'|'DESCENDING', nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCommandExecutionsForSandboxAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCommandExecutionsForSandboxAsync(array{sandboxId?: string, maxResults?: int, sortOrder?: 'ASCENDING'|'DESCENDING', nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCuratedEnvironmentImages(array $args = [])
 * @phpstan-method \Aws\Result listCuratedEnvironmentImages(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCuratedEnvironmentImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCuratedEnvironmentImagesAsync(array{...} $args = [])
 * @method \Aws\Result listFleets(array $args = [])
 * @phpstan-method \Aws\Result listFleets(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     sortBy?: 'CREATED_TIME'|'LAST_MODIFIED_TIME'|'NAME',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFleetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFleetsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     sortBy?: 'CREATED_TIME'|'LAST_MODIFIED_TIME'|'NAME',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @phpstan-method \Aws\Result listProjects(array{
 *     sortBy?: 'CREATED_TIME'|'LAST_MODIFIED_TIME'|'NAME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectsAsync(array{
 *     sortBy?: 'CREATED_TIME'|'LAST_MODIFIED_TIME'|'NAME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReportGroups(array $args = [])
 * @phpstan-method \Aws\Result listReportGroups(array{
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     sortBy?: 'CREATED_TIME'|'LAST_MODIFIED_TIME'|'NAME',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReportGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReportGroupsAsync(array{
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     sortBy?: 'CREATED_TIME'|'LAST_MODIFIED_TIME'|'NAME',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReports(array $args = [])
 * @phpstan-method \Aws\Result listReports(array{
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{status?: 'DELETING'|'FAILED'|'GENERATING'|'INCOMPLETE'|'SUCCEEDED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReportsAsync(array{
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{status?: 'DELETING'|'FAILED'|'GENERATING'|'INCOMPLETE'|'SUCCEEDED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReportsForReportGroup(array $args = [])
 * @phpstan-method \Aws\Result listReportsForReportGroup(array{
 *     reportGroupArn?: string,
 *     nextToken?: string,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     filter?: array{status?: 'DELETING'|'FAILED'|'GENERATING'|'INCOMPLETE'|'SUCCEEDED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReportsForReportGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReportsForReportGroupAsync(array{
 *     reportGroupArn?: string,
 *     nextToken?: string,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     filter?: array{status?: 'DELETING'|'FAILED'|'GENERATING'|'INCOMPLETE'|'SUCCEEDED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSandboxes(array $args = [])
 * @phpstan-method \Aws\Result listSandboxes(array{maxResults?: int, sortOrder?: 'ASCENDING'|'DESCENDING', nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSandboxesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSandboxesAsync(array{maxResults?: int, sortOrder?: 'ASCENDING'|'DESCENDING', nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSandboxesForProject(array $args = [])
 * @phpstan-method \Aws\Result listSandboxesForProject(array{projectName?: string, maxResults?: int, sortOrder?: 'ASCENDING'|'DESCENDING', nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSandboxesForProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSandboxesForProjectAsync(array{projectName?: string, maxResults?: int, sortOrder?: 'ASCENDING'|'DESCENDING', nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSharedProjects(array $args = [])
 * @phpstan-method \Aws\Result listSharedProjects(array{
 *     sortBy?: 'ARN'|'MODIFIED_TIME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSharedProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSharedProjectsAsync(array{
 *     sortBy?: 'ARN'|'MODIFIED_TIME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSharedReportGroups(array $args = [])
 * @phpstan-method \Aws\Result listSharedReportGroups(array{
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     sortBy?: 'ARN'|'MODIFIED_TIME',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSharedReportGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSharedReportGroupsAsync(array{
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     sortBy?: 'ARN'|'MODIFIED_TIME',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSourceCredentials(array $args = [])
 * @phpstan-method \Aws\Result listSourceCredentials(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSourceCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSourceCredentialsAsync(array{...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{policy?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{policy?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result retryBuild(array $args = [])
 * @phpstan-method \Aws\Result retryBuild(array{id?: string, idempotencyToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retryBuildAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retryBuildAsync(array{id?: string, idempotencyToken?: string, ...} $args = [])
 * @method \Aws\Result retryBuildBatch(array $args = [])
 * @phpstan-method \Aws\Result retryBuildBatch(array{id?: string, idempotencyToken?: string, retryType?: 'RETRY_ALL_BUILDS'|'RETRY_FAILED_BUILDS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retryBuildBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retryBuildBatchAsync(array{id?: string, idempotencyToken?: string, retryType?: 'RETRY_ALL_BUILDS'|'RETRY_FAILED_BUILDS', ...} $args = [])
 * @method \Aws\Result startBuild(array $args = [])
 * @phpstan-method \Aws\Result startBuild(array{
 *     projectName?: string,
 *     secondarySourcesOverride?: list<array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array,
 *         buildspec?: string,
 *         auth?: array,
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array,
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     }>,
 *     secondarySourcesVersionOverride?: list<array{sourceIdentifier?: string, sourceVersion?: string, ...}>,
 *     sourceVersion?: string,
 *     artifactsOverride?: array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     },
 *     secondaryArtifactsOverride?: list<array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     }>,
 *     environmentVariablesOverride?: list<array{name?: string, value?: string, type?: 'PARAMETER_STORE'|'PLAINTEXT'|'SECRETS_MANAGER', ...}>,
 *     sourceTypeOverride?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *     sourceLocationOverride?: string,
 *     sourceAuthOverride?: array{type?: 'CODECONNECTIONS'|'OAUTH'|'SECRETS_MANAGER', resource?: string, ...},
 *     gitCloneDepthOverride?: int,
 *     gitSubmodulesConfigOverride?: array{fetchSubmodules?: bool, ...},
 *     buildspecOverride?: string,
 *     insecureSslOverride?: bool,
 *     reportBuildStatusOverride?: bool,
 *     buildStatusConfigOverride?: array{context?: string, targetUrl?: string, ...},
 *     environmentTypeOverride?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *     imageOverride?: string,
 *     computeTypeOverride?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *     certificateOverride?: string,
 *     cacheOverride?: array{
 *         type?: 'LOCAL'|'NO_CACHE'|'S3',
 *         location?: string,
 *         modes?: list<'LOCAL_CUSTOM_CACHE'|'LOCAL_DOCKER_LAYER_CACHE'|'LOCAL_SOURCE_CACHE'>,
 *         cacheNamespace?: string,
 *         ...,
 *     },
 *     serviceRoleOverride?: string,
 *     privilegedModeOverride?: bool,
 *     timeoutInMinutesOverride?: int,
 *     queuedTimeoutInMinutesOverride?: int,
 *     encryptionKeyOverride?: string,
 *     idempotencyToken?: string,
 *     logsConfigOverride?: array{
 *         cloudWatchLogs?: array{status?: 'DISABLED'|'ENABLED', groupName?: string, streamName?: string, ...},
 *         s3Logs?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             location?: string,
 *             encryptionDisabled?: bool,
 *             bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     registryCredentialOverride?: array{credential?: string, credentialProvider?: 'SECRETS_MANAGER', ...},
 *     imagePullCredentialsTypeOverride?: 'CODEBUILD'|'SERVICE_ROLE',
 *     debugSessionEnabled?: bool,
 *     fleetOverride?: array{fleetArn?: string, ...},
 *     autoRetryLimitOverride?: int,
 *     hostKernelOverride?: 'LINUX_KERNEL_4'|'LINUX_KERNEL_6'|'LINUX_KERNEL_LATEST',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startBuildAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBuildAsync(array{
 *     projectName?: string,
 *     secondarySourcesOverride?: list<array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array,
 *         buildspec?: string,
 *         auth?: array,
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array,
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     }>,
 *     secondarySourcesVersionOverride?: list<array{sourceIdentifier?: string, sourceVersion?: string, ...}>,
 *     sourceVersion?: string,
 *     artifactsOverride?: array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     },
 *     secondaryArtifactsOverride?: list<array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     }>,
 *     environmentVariablesOverride?: list<array{name?: string, value?: string, type?: 'PARAMETER_STORE'|'PLAINTEXT'|'SECRETS_MANAGER', ...}>,
 *     sourceTypeOverride?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *     sourceLocationOverride?: string,
 *     sourceAuthOverride?: array{type?: 'CODECONNECTIONS'|'OAUTH'|'SECRETS_MANAGER', resource?: string, ...},
 *     gitCloneDepthOverride?: int,
 *     gitSubmodulesConfigOverride?: array{fetchSubmodules?: bool, ...},
 *     buildspecOverride?: string,
 *     insecureSslOverride?: bool,
 *     reportBuildStatusOverride?: bool,
 *     buildStatusConfigOverride?: array{context?: string, targetUrl?: string, ...},
 *     environmentTypeOverride?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *     imageOverride?: string,
 *     computeTypeOverride?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *     certificateOverride?: string,
 *     cacheOverride?: array{
 *         type?: 'LOCAL'|'NO_CACHE'|'S3',
 *         location?: string,
 *         modes?: list<'LOCAL_CUSTOM_CACHE'|'LOCAL_DOCKER_LAYER_CACHE'|'LOCAL_SOURCE_CACHE'>,
 *         cacheNamespace?: string,
 *         ...,
 *     },
 *     serviceRoleOverride?: string,
 *     privilegedModeOverride?: bool,
 *     timeoutInMinutesOverride?: int,
 *     queuedTimeoutInMinutesOverride?: int,
 *     encryptionKeyOverride?: string,
 *     idempotencyToken?: string,
 *     logsConfigOverride?: array{
 *         cloudWatchLogs?: array{status?: 'DISABLED'|'ENABLED', groupName?: string, streamName?: string, ...},
 *         s3Logs?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             location?: string,
 *             encryptionDisabled?: bool,
 *             bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     registryCredentialOverride?: array{credential?: string, credentialProvider?: 'SECRETS_MANAGER', ...},
 *     imagePullCredentialsTypeOverride?: 'CODEBUILD'|'SERVICE_ROLE',
 *     debugSessionEnabled?: bool,
 *     fleetOverride?: array{fleetArn?: string, ...},
 *     autoRetryLimitOverride?: int,
 *     hostKernelOverride?: 'LINUX_KERNEL_4'|'LINUX_KERNEL_6'|'LINUX_KERNEL_LATEST',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startBuildBatch(array $args = [])
 * @phpstan-method \Aws\Result startBuildBatch(array{
 *     projectName?: string,
 *     secondarySourcesOverride?: list<array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array,
 *         buildspec?: string,
 *         auth?: array,
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array,
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     }>,
 *     secondarySourcesVersionOverride?: list<array{sourceIdentifier?: string, sourceVersion?: string, ...}>,
 *     sourceVersion?: string,
 *     artifactsOverride?: array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     },
 *     secondaryArtifactsOverride?: list<array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     }>,
 *     environmentVariablesOverride?: list<array{name?: string, value?: string, type?: 'PARAMETER_STORE'|'PLAINTEXT'|'SECRETS_MANAGER', ...}>,
 *     sourceTypeOverride?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *     sourceLocationOverride?: string,
 *     sourceAuthOverride?: array{type?: 'CODECONNECTIONS'|'OAUTH'|'SECRETS_MANAGER', resource?: string, ...},
 *     gitCloneDepthOverride?: int,
 *     gitSubmodulesConfigOverride?: array{fetchSubmodules?: bool, ...},
 *     buildspecOverride?: string,
 *     insecureSslOverride?: bool,
 *     reportBuildBatchStatusOverride?: bool,
 *     environmentTypeOverride?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *     imageOverride?: string,
 *     computeTypeOverride?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *     certificateOverride?: string,
 *     cacheOverride?: array{
 *         type?: 'LOCAL'|'NO_CACHE'|'S3',
 *         location?: string,
 *         modes?: list<'LOCAL_CUSTOM_CACHE'|'LOCAL_DOCKER_LAYER_CACHE'|'LOCAL_SOURCE_CACHE'>,
 *         cacheNamespace?: string,
 *         ...,
 *     },
 *     serviceRoleOverride?: string,
 *     privilegedModeOverride?: bool,
 *     buildTimeoutInMinutesOverride?: int,
 *     queuedTimeoutInMinutesOverride?: int,
 *     encryptionKeyOverride?: string,
 *     idempotencyToken?: string,
 *     logsConfigOverride?: array{
 *         cloudWatchLogs?: array{status?: 'DISABLED'|'ENABLED', groupName?: string, streamName?: string, ...},
 *         s3Logs?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             location?: string,
 *             encryptionDisabled?: bool,
 *             bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     registryCredentialOverride?: array{credential?: string, credentialProvider?: 'SECRETS_MANAGER', ...},
 *     imagePullCredentialsTypeOverride?: 'CODEBUILD'|'SERVICE_ROLE',
 *     buildBatchConfigOverride?: array{
 *         serviceRole?: string,
 *         combineArtifacts?: bool,
 *         restrictions?: array{maximumBuildsAllowed?: int, computeTypesAllowed?: list<string>, fleetsAllowed?: list<string>, ...},
 *         timeoutInMins?: int,
 *         batchReportMode?: 'REPORT_AGGREGATED_BATCH'|'REPORT_INDIVIDUAL_BUILDS',
 *         ...,
 *     },
 *     debugSessionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startBuildBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBuildBatchAsync(array{
 *     projectName?: string,
 *     secondarySourcesOverride?: list<array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array,
 *         buildspec?: string,
 *         auth?: array,
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array,
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     }>,
 *     secondarySourcesVersionOverride?: list<array{sourceIdentifier?: string, sourceVersion?: string, ...}>,
 *     sourceVersion?: string,
 *     artifactsOverride?: array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     },
 *     secondaryArtifactsOverride?: list<array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     }>,
 *     environmentVariablesOverride?: list<array{name?: string, value?: string, type?: 'PARAMETER_STORE'|'PLAINTEXT'|'SECRETS_MANAGER', ...}>,
 *     sourceTypeOverride?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *     sourceLocationOverride?: string,
 *     sourceAuthOverride?: array{type?: 'CODECONNECTIONS'|'OAUTH'|'SECRETS_MANAGER', resource?: string, ...},
 *     gitCloneDepthOverride?: int,
 *     gitSubmodulesConfigOverride?: array{fetchSubmodules?: bool, ...},
 *     buildspecOverride?: string,
 *     insecureSslOverride?: bool,
 *     reportBuildBatchStatusOverride?: bool,
 *     environmentTypeOverride?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *     imageOverride?: string,
 *     computeTypeOverride?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *     certificateOverride?: string,
 *     cacheOverride?: array{
 *         type?: 'LOCAL'|'NO_CACHE'|'S3',
 *         location?: string,
 *         modes?: list<'LOCAL_CUSTOM_CACHE'|'LOCAL_DOCKER_LAYER_CACHE'|'LOCAL_SOURCE_CACHE'>,
 *         cacheNamespace?: string,
 *         ...,
 *     },
 *     serviceRoleOverride?: string,
 *     privilegedModeOverride?: bool,
 *     buildTimeoutInMinutesOverride?: int,
 *     queuedTimeoutInMinutesOverride?: int,
 *     encryptionKeyOverride?: string,
 *     idempotencyToken?: string,
 *     logsConfigOverride?: array{
 *         cloudWatchLogs?: array{status?: 'DISABLED'|'ENABLED', groupName?: string, streamName?: string, ...},
 *         s3Logs?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             location?: string,
 *             encryptionDisabled?: bool,
 *             bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     registryCredentialOverride?: array{credential?: string, credentialProvider?: 'SECRETS_MANAGER', ...},
 *     imagePullCredentialsTypeOverride?: 'CODEBUILD'|'SERVICE_ROLE',
 *     buildBatchConfigOverride?: array{
 *         serviceRole?: string,
 *         combineArtifacts?: bool,
 *         restrictions?: array{maximumBuildsAllowed?: int, computeTypesAllowed?: list<string>, fleetsAllowed?: list<string>, ...},
 *         timeoutInMins?: int,
 *         batchReportMode?: 'REPORT_AGGREGATED_BATCH'|'REPORT_INDIVIDUAL_BUILDS',
 *         ...,
 *     },
 *     debugSessionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCommandExecution(array $args = [])
 * @phpstan-method \Aws\Result startCommandExecution(array{sandboxId?: string, command?: string, type?: 'SHELL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCommandExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCommandExecutionAsync(array{sandboxId?: string, command?: string, type?: 'SHELL', ...} $args = [])
 * @method \Aws\Result startSandbox(array $args = [])
 * @phpstan-method \Aws\Result startSandbox(array{projectName?: string, idempotencyToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startSandboxAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSandboxAsync(array{projectName?: string, idempotencyToken?: string, ...} $args = [])
 * @method \Aws\Result startSandboxConnection(array $args = [])
 * @phpstan-method \Aws\Result startSandboxConnection(array{sandboxId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startSandboxConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSandboxConnectionAsync(array{sandboxId?: string, ...} $args = [])
 * @method \Aws\Result stopBuild(array $args = [])
 * @phpstan-method \Aws\Result stopBuild(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopBuildAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopBuildAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result stopBuildBatch(array $args = [])
 * @phpstan-method \Aws\Result stopBuildBatch(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopBuildBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopBuildBatchAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result stopSandbox(array $args = [])
 * @phpstan-method \Aws\Result stopSandbox(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSandboxAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopSandboxAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result updateFleet(array $args = [])
 * @phpstan-method \Aws\Result updateFleet(array{
 *     arn?: string,
 *     baseCapacity?: int,
 *     environmentType?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *     computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *     computeConfiguration?: array{vCpu?: int, memory?: int, disk?: int, machineType?: 'GENERAL'|'NVME', instanceType?: string, ...},
 *     scalingConfiguration?: array{
 *         scalingType?: 'TARGET_TRACKING_SCALING',
 *         targetTrackingScalingConfigs?: list<array>,
 *         maxCapacity?: int,
 *         ...,
 *     },
 *     overflowBehavior?: 'ON_DEMAND'|'QUEUE',
 *     vpcConfig?: array{vpcId?: string, subnets?: list<string>, securityGroupIds?: list<string>, ...},
 *     proxyConfiguration?: array{defaultBehavior?: 'ALLOW_ALL'|'DENY_ALL', orderedProxyRules?: list<array>, ...},
 *     imageId?: string,
 *     fleetServiceRole?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFleetAsync(array{
 *     arn?: string,
 *     baseCapacity?: int,
 *     environmentType?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *     computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *     computeConfiguration?: array{vCpu?: int, memory?: int, disk?: int, machineType?: 'GENERAL'|'NVME', instanceType?: string, ...},
 *     scalingConfiguration?: array{
 *         scalingType?: 'TARGET_TRACKING_SCALING',
 *         targetTrackingScalingConfigs?: list<array>,
 *         maxCapacity?: int,
 *         ...,
 *     },
 *     overflowBehavior?: 'ON_DEMAND'|'QUEUE',
 *     vpcConfig?: array{vpcId?: string, subnets?: list<string>, securityGroupIds?: list<string>, ...},
 *     proxyConfiguration?: array{defaultBehavior?: 'ALLOW_ALL'|'DENY_ALL', orderedProxyRules?: list<array>, ...},
 *     imageId?: string,
 *     fleetServiceRole?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProject(array $args = [])
 * @phpstan-method \Aws\Result updateProject(array{
 *     name?: string,
 *     description?: string,
 *     source?: array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array{fetchSubmodules?: bool, ...},
 *         buildspec?: string,
 *         auth?: array{type?: 'CODECONNECTIONS'|'OAUTH'|'SECRETS_MANAGER', resource?: string, ...},
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array{context?: string, targetUrl?: string, ...},
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     },
 *     secondarySources?: list<array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array,
 *         buildspec?: string,
 *         auth?: array,
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array,
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     }>,
 *     sourceVersion?: string,
 *     secondarySourceVersions?: list<array{sourceIdentifier?: string, sourceVersion?: string, ...}>,
 *     artifacts?: array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     },
 *     secondaryArtifacts?: list<array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     }>,
 *     cache?: array{
 *         type?: 'LOCAL'|'NO_CACHE'|'S3',
 *         location?: string,
 *         modes?: list<'LOCAL_CUSTOM_CACHE'|'LOCAL_DOCKER_LAYER_CACHE'|'LOCAL_SOURCE_CACHE'>,
 *         cacheNamespace?: string,
 *         ...,
 *     },
 *     environment?: array{
 *         type?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *         image?: string,
 *         computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *         computeConfiguration?: array{vCpu?: int, memory?: int, disk?: int, machineType?: 'GENERAL'|'NVME', instanceType?: string, ...},
 *         fleet?: array{fleetArn?: string, ...},
 *         environmentVariables?: list<array>,
 *         privilegedMode?: bool,
 *         certificate?: string,
 *         registryCredential?: array{credential?: string, credentialProvider?: 'SECRETS_MANAGER', ...},
 *         imagePullCredentialsType?: 'CODEBUILD'|'SERVICE_ROLE',
 *         dockerServer?: array{
 *             computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *             securityGroupIds?: list<string>,
 *             status?: array,
 *             ...,
 *         },
 *         hostKernel?: 'LINUX_KERNEL_4'|'LINUX_KERNEL_6'|'LINUX_KERNEL_LATEST',
 *         ...,
 *     },
 *     serviceRole?: string,
 *     timeoutInMinutes?: int,
 *     queuedTimeoutInMinutes?: int,
 *     encryptionKey?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     vpcConfig?: array{vpcId?: string, subnets?: list<string>, securityGroupIds?: list<string>, ...},
 *     badgeEnabled?: bool,
 *     logsConfig?: array{
 *         cloudWatchLogs?: array{status?: 'DISABLED'|'ENABLED', groupName?: string, streamName?: string, ...},
 *         s3Logs?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             location?: string,
 *             encryptionDisabled?: bool,
 *             bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     fileSystemLocations?: list<array{type?: 'EFS', location?: string, mountPoint?: string, identifier?: string, mountOptions?: string, ...}>,
 *     buildBatchConfig?: array{
 *         serviceRole?: string,
 *         combineArtifacts?: bool,
 *         restrictions?: array{maximumBuildsAllowed?: int, computeTypesAllowed?: list<string>, fleetsAllowed?: list<string>, ...},
 *         timeoutInMins?: int,
 *         batchReportMode?: 'REPORT_AGGREGATED_BATCH'|'REPORT_INDIVIDUAL_BUILDS',
 *         ...,
 *     },
 *     concurrentBuildLimit?: int,
 *     autoRetryLimit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProjectAsync(array{
 *     name?: string,
 *     description?: string,
 *     source?: array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array{fetchSubmodules?: bool, ...},
 *         buildspec?: string,
 *         auth?: array{type?: 'CODECONNECTIONS'|'OAUTH'|'SECRETS_MANAGER', resource?: string, ...},
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array{context?: string, targetUrl?: string, ...},
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     },
 *     secondarySources?: list<array{
 *         type?: 'BITBUCKET'|'CODECOMMIT'|'CODEPIPELINE'|'GITHUB'|'GITHUB_ENTERPRISE'|'GITLAB'|'GITLAB_SELF_MANAGED'|'NO_SOURCE'|'S3',
 *         location?: string,
 *         gitCloneDepth?: int,
 *         gitSubmodulesConfig?: array,
 *         buildspec?: string,
 *         auth?: array,
 *         reportBuildStatus?: bool,
 *         buildStatusConfig?: array,
 *         insecureSsl?: bool,
 *         sourceIdentifier?: string,
 *         ...,
 *     }>,
 *     sourceVersion?: string,
 *     secondarySourceVersions?: list<array{sourceIdentifier?: string, sourceVersion?: string, ...}>,
 *     artifacts?: array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     },
 *     secondaryArtifacts?: list<array{
 *         type?: 'CODEPIPELINE'|'NO_ARTIFACTS'|'S3',
 *         location?: string,
 *         path?: string,
 *         namespaceType?: 'BUILD_ID'|'NONE',
 *         name?: string,
 *         packaging?: 'NONE'|'ZIP',
 *         overrideArtifactName?: bool,
 *         encryptionDisabled?: bool,
 *         artifactIdentifier?: string,
 *         bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *         ...,
 *     }>,
 *     cache?: array{
 *         type?: 'LOCAL'|'NO_CACHE'|'S3',
 *         location?: string,
 *         modes?: list<'LOCAL_CUSTOM_CACHE'|'LOCAL_DOCKER_LAYER_CACHE'|'LOCAL_SOURCE_CACHE'>,
 *         cacheNamespace?: string,
 *         ...,
 *     },
 *     environment?: array{
 *         type?: 'ARM_CONTAINER'|'ARM_EC2'|'ARM_LAMBDA_CONTAINER'|'LINUX_CONTAINER'|'LINUX_EC2'|'LINUX_GPU_CONTAINER'|'LINUX_LAMBDA_CONTAINER'|'MAC_ARM'|'WINDOWS_CONTAINER'|'WINDOWS_EC2'|'WINDOWS_SERVER_2019_CONTAINER'|'WINDOWS_SERVER_2022_CONTAINER',
 *         image?: string,
 *         computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *         computeConfiguration?: array{vCpu?: int, memory?: int, disk?: int, machineType?: 'GENERAL'|'NVME', instanceType?: string, ...},
 *         fleet?: array{fleetArn?: string, ...},
 *         environmentVariables?: list<array>,
 *         privilegedMode?: bool,
 *         certificate?: string,
 *         registryCredential?: array{credential?: string, credentialProvider?: 'SECRETS_MANAGER', ...},
 *         imagePullCredentialsType?: 'CODEBUILD'|'SERVICE_ROLE',
 *         dockerServer?: array{
 *             computeType?: 'ATTRIBUTE_BASED_COMPUTE'|'BUILD_GENERAL1_2XLARGE'|'BUILD_GENERAL1_LARGE'|'BUILD_GENERAL1_MEDIUM'|'BUILD_GENERAL1_SMALL'|'BUILD_GENERAL1_XLARGE'|'BUILD_LAMBDA_10GB'|'BUILD_LAMBDA_1GB'|'BUILD_LAMBDA_2GB'|'BUILD_LAMBDA_4GB'|'BUILD_LAMBDA_8GB'|'CUSTOM_INSTANCE_TYPE',
 *             securityGroupIds?: list<string>,
 *             status?: array,
 *             ...,
 *         },
 *         hostKernel?: 'LINUX_KERNEL_4'|'LINUX_KERNEL_6'|'LINUX_KERNEL_LATEST',
 *         ...,
 *     },
 *     serviceRole?: string,
 *     timeoutInMinutes?: int,
 *     queuedTimeoutInMinutes?: int,
 *     encryptionKey?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     vpcConfig?: array{vpcId?: string, subnets?: list<string>, securityGroupIds?: list<string>, ...},
 *     badgeEnabled?: bool,
 *     logsConfig?: array{
 *         cloudWatchLogs?: array{status?: 'DISABLED'|'ENABLED', groupName?: string, streamName?: string, ...},
 *         s3Logs?: array{
 *             status?: 'DISABLED'|'ENABLED',
 *             location?: string,
 *             encryptionDisabled?: bool,
 *             bucketOwnerAccess?: 'FULL'|'NONE'|'READ_ONLY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     fileSystemLocations?: list<array{type?: 'EFS', location?: string, mountPoint?: string, identifier?: string, mountOptions?: string, ...}>,
 *     buildBatchConfig?: array{
 *         serviceRole?: string,
 *         combineArtifacts?: bool,
 *         restrictions?: array{maximumBuildsAllowed?: int, computeTypesAllowed?: list<string>, fleetsAllowed?: list<string>, ...},
 *         timeoutInMins?: int,
 *         batchReportMode?: 'REPORT_AGGREGATED_BATCH'|'REPORT_INDIVIDUAL_BUILDS',
 *         ...,
 *     },
 *     concurrentBuildLimit?: int,
 *     autoRetryLimit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProjectVisibility(array $args = [])
 * @phpstan-method \Aws\Result updateProjectVisibility(array{projectArn?: string, projectVisibility?: 'PRIVATE'|'PUBLIC_READ', resourceAccessRole?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectVisibilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProjectVisibilityAsync(array{projectArn?: string, projectVisibility?: 'PRIVATE'|'PUBLIC_READ', resourceAccessRole?: string, ...} $args = [])
 * @method \Aws\Result updateReportGroup(array $args = [])
 * @phpstan-method \Aws\Result updateReportGroup(array{
 *     arn?: string,
 *     exportConfig?: array{
 *         exportConfigType?: 'NO_EXPORT'|'S3',
 *         s3Destination?: array{
 *             bucket?: string,
 *             bucketOwner?: string,
 *             path?: string,
 *             packaging?: 'NONE'|'ZIP',
 *             encryptionKey?: string,
 *             encryptionDisabled?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReportGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReportGroupAsync(array{
 *     arn?: string,
 *     exportConfig?: array{
 *         exportConfigType?: 'NO_EXPORT'|'S3',
 *         s3Destination?: array{
 *             bucket?: string,
 *             bucketOwner?: string,
 *             path?: string,
 *             packaging?: 'NONE'|'ZIP',
 *             encryptionKey?: string,
 *             encryptionDisabled?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWebhook(array $args = [])
 * @phpstan-method \Aws\Result updateWebhook(array{
 *     projectName?: string,
 *     branchFilter?: string,
 *     rotateSecret?: bool,
 *     filterGroups?: list<list<array>>,
 *     buildType?: 'BUILD'|'BUILD_BATCH'|'RUNNER_BUILDKITE_BUILD',
 *     pullRequestBuildPolicy?: array{
 *         requiresCommentApproval?: 'ALL_PULL_REQUESTS'|'DISABLED'|'FORK_PULL_REQUESTS',
 *         approverRoles?: list<'BITBUCKET_ADMIN'|'BITBUCKET_READ'|'BITBUCKET_WRITE'|'GITHUB_ADMIN'|'GITHUB_MAINTAIN'|'GITHUB_READ'|'GITHUB_TRIAGE'|'GITHUB_WRITE'|'GITLAB_DEVELOPER'|'GITLAB_GUEST'|'GITLAB_MAINTAINER'|'GITLAB_OWNER'|'GITLAB_PLANNER'|'GITLAB_REPORTER'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWebhookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWebhookAsync(array{
 *     projectName?: string,
 *     branchFilter?: string,
 *     rotateSecret?: bool,
 *     filterGroups?: list<list<array>>,
 *     buildType?: 'BUILD'|'BUILD_BATCH'|'RUNNER_BUILDKITE_BUILD',
 *     pullRequestBuildPolicy?: array{
 *         requiresCommentApproval?: 'ALL_PULL_REQUESTS'|'DISABLED'|'FORK_PULL_REQUESTS',
 *         approverRoles?: list<'BITBUCKET_ADMIN'|'BITBUCKET_READ'|'BITBUCKET_WRITE'|'GITHUB_ADMIN'|'GITHUB_MAINTAIN'|'GITHUB_READ'|'GITHUB_TRIAGE'|'GITHUB_WRITE'|'GITLAB_DEVELOPER'|'GITLAB_GUEST'|'GITLAB_MAINTAINER'|'GITLAB_OWNER'|'GITLAB_PLANNER'|'GITLAB_REPORTER'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class CodeBuildClient extends AwsClient {}
