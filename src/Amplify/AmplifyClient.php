<?php
namespace Aws\Amplify;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Amplify** service.
 * @method \Aws\Result createApp(array $args = [])
 * @phpstan-method \Aws\Result createApp(array{
 *     name?: string,
 *     description?: string,
 *     repository?: string,
 *     platform?: 'WEB'|'WEB_COMPUTE'|'WEB_DYNAMIC',
 *     computeRoleArn?: string,
 *     iamServiceRoleArn?: string,
 *     oauthToken?: string,
 *     accessToken?: string,
 *     environmentVariables?: array<string, string>,
 *     enableBranchAutoBuild?: bool,
 *     enableBranchAutoDeletion?: bool,
 *     enableBasicAuth?: bool,
 *     basicAuthCredentials?: string,
 *     customRules?: list<array{source?: string, target?: string, status?: string, condition?: string, ...}>,
 *     tags?: array<string, string>,
 *     buildSpec?: string,
 *     customHeaders?: string,
 *     enableAutoBranchCreation?: bool,
 *     autoBranchCreationPatterns?: list<string>,
 *     autoBranchCreationConfig?: array{
 *         stage?: 'BETA'|'DEVELOPMENT'|'EXPERIMENTAL'|'PRODUCTION'|'PULL_REQUEST',
 *         framework?: string,
 *         enableAutoBuild?: bool,
 *         environmentVariables?: array<string, string>,
 *         basicAuthCredentials?: string,
 *         enableBasicAuth?: bool,
 *         enablePerformanceMode?: bool,
 *         buildSpec?: string,
 *         enablePullRequestPreview?: bool,
 *         pullRequestEnvironmentName?: string,
 *         ...,
 *     },
 *     jobConfig?: array{buildComputeType?: 'LARGE_16GB'|'STANDARD_8GB'|'XLARGE_72GB', ...},
 *     cacheConfig?: array{type?: 'AMPLIFY_MANAGED'|'AMPLIFY_MANAGED_NO_COOKIES', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppAsync(array{
 *     name?: string,
 *     description?: string,
 *     repository?: string,
 *     platform?: 'WEB'|'WEB_COMPUTE'|'WEB_DYNAMIC',
 *     computeRoleArn?: string,
 *     iamServiceRoleArn?: string,
 *     oauthToken?: string,
 *     accessToken?: string,
 *     environmentVariables?: array<string, string>,
 *     enableBranchAutoBuild?: bool,
 *     enableBranchAutoDeletion?: bool,
 *     enableBasicAuth?: bool,
 *     basicAuthCredentials?: string,
 *     customRules?: list<array{source?: string, target?: string, status?: string, condition?: string, ...}>,
 *     tags?: array<string, string>,
 *     buildSpec?: string,
 *     customHeaders?: string,
 *     enableAutoBranchCreation?: bool,
 *     autoBranchCreationPatterns?: list<string>,
 *     autoBranchCreationConfig?: array{
 *         stage?: 'BETA'|'DEVELOPMENT'|'EXPERIMENTAL'|'PRODUCTION'|'PULL_REQUEST',
 *         framework?: string,
 *         enableAutoBuild?: bool,
 *         environmentVariables?: array<string, string>,
 *         basicAuthCredentials?: string,
 *         enableBasicAuth?: bool,
 *         enablePerformanceMode?: bool,
 *         buildSpec?: string,
 *         enablePullRequestPreview?: bool,
 *         pullRequestEnvironmentName?: string,
 *         ...,
 *     },
 *     jobConfig?: array{buildComputeType?: 'LARGE_16GB'|'STANDARD_8GB'|'XLARGE_72GB', ...},
 *     cacheConfig?: array{type?: 'AMPLIFY_MANAGED'|'AMPLIFY_MANAGED_NO_COOKIES', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBackendEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createBackendEnvironment(array{appId?: string, environmentName?: string, stackName?: string, deploymentArtifacts?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackendEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackendEnvironmentAsync(array{appId?: string, environmentName?: string, stackName?: string, deploymentArtifacts?: string, ...} $args = [])
 * @method \Aws\Result createBranch(array $args = [])
 * @phpstan-method \Aws\Result createBranch(array{
 *     appId?: string,
 *     branchName?: string,
 *     description?: string,
 *     stage?: 'BETA'|'DEVELOPMENT'|'EXPERIMENTAL'|'PRODUCTION'|'PULL_REQUEST',
 *     framework?: string,
 *     enableNotification?: bool,
 *     enableAutoBuild?: bool,
 *     enableSkewProtection?: bool,
 *     environmentVariables?: array<string, string>,
 *     basicAuthCredentials?: string,
 *     enableBasicAuth?: bool,
 *     enablePerformanceMode?: bool,
 *     tags?: array<string, string>,
 *     buildSpec?: string,
 *     ttl?: string,
 *     displayName?: string,
 *     enablePullRequestPreview?: bool,
 *     pullRequestEnvironmentName?: string,
 *     backendEnvironmentArn?: string,
 *     backend?: array{stackArn?: string, ...},
 *     computeRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBranchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBranchAsync(array{
 *     appId?: string,
 *     branchName?: string,
 *     description?: string,
 *     stage?: 'BETA'|'DEVELOPMENT'|'EXPERIMENTAL'|'PRODUCTION'|'PULL_REQUEST',
 *     framework?: string,
 *     enableNotification?: bool,
 *     enableAutoBuild?: bool,
 *     enableSkewProtection?: bool,
 *     environmentVariables?: array<string, string>,
 *     basicAuthCredentials?: string,
 *     enableBasicAuth?: bool,
 *     enablePerformanceMode?: bool,
 *     tags?: array<string, string>,
 *     buildSpec?: string,
 *     ttl?: string,
 *     displayName?: string,
 *     enablePullRequestPreview?: bool,
 *     pullRequestEnvironmentName?: string,
 *     backendEnvironmentArn?: string,
 *     backend?: array{stackArn?: string, ...},
 *     computeRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeployment(array $args = [])
 * @phpstan-method \Aws\Result createDeployment(array{appId?: string, branchName?: string, fileMap?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentAsync(array{appId?: string, branchName?: string, fileMap?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result createDomainAssociation(array{
 *     appId?: string,
 *     domainName?: string,
 *     enableAutoSubDomain?: bool,
 *     subDomainSettings?: list<array{prefix?: string, branchName?: string, ...}>,
 *     autoSubDomainCreationPatterns?: list<string>,
 *     autoSubDomainIAMRole?: string,
 *     certificateSettings?: array{type?: 'AMPLIFY_MANAGED'|'CUSTOM', customCertificateArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAssociationAsync(array{
 *     appId?: string,
 *     domainName?: string,
 *     enableAutoSubDomain?: bool,
 *     subDomainSettings?: list<array{prefix?: string, branchName?: string, ...}>,
 *     autoSubDomainCreationPatterns?: list<string>,
 *     autoSubDomainIAMRole?: string,
 *     certificateSettings?: array{type?: 'AMPLIFY_MANAGED'|'CUSTOM', customCertificateArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWebhook(array $args = [])
 * @phpstan-method \Aws\Result createWebhook(array{appId?: string, branchName?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebhookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebhookAsync(array{appId?: string, branchName?: string, description?: string, ...} $args = [])
 * @method \Aws\Result deleteApp(array $args = [])
 * @phpstan-method \Aws\Result deleteApp(array{appId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppAsync(array{appId?: string, ...} $args = [])
 * @method \Aws\Result deleteBackendEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteBackendEnvironment(array{appId?: string, environmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackendEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackendEnvironmentAsync(array{appId?: string, environmentName?: string, ...} $args = [])
 * @method \Aws\Result deleteBranch(array $args = [])
 * @phpstan-method \Aws\Result deleteBranch(array{appId?: string, branchName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBranchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBranchAsync(array{appId?: string, branchName?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainAssociation(array{appId?: string, domainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAssociationAsync(array{appId?: string, domainName?: string, ...} $args = [])
 * @method \Aws\Result deleteJob(array $args = [])
 * @phpstan-method \Aws\Result deleteJob(array{appId?: string, branchName?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobAsync(array{appId?: string, branchName?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result deleteWebhook(array $args = [])
 * @phpstan-method \Aws\Result deleteWebhook(array{webhookId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebhookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebhookAsync(array{webhookId?: string, ...} $args = [])
 * @method \Aws\Result generateAccessLogs(array $args = [])
 * @phpstan-method \Aws\Result generateAccessLogs(array{
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     domainName?: string,
 *     appId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateAccessLogsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateAccessLogsAsync(array{
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     domainName?: string,
 *     appId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getApp(array $args = [])
 * @phpstan-method \Aws\Result getApp(array{appId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAppAsync(array{appId?: string, ...} $args = [])
 * @method \Aws\Result getArtifactUrl(array $args = [])
 * @phpstan-method \Aws\Result getArtifactUrl(array{artifactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getArtifactUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getArtifactUrlAsync(array{artifactId?: string, ...} $args = [])
 * @method \Aws\Result getBackendEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getBackendEnvironment(array{appId?: string, environmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackendEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackendEnvironmentAsync(array{appId?: string, environmentName?: string, ...} $args = [])
 * @method \Aws\Result getBranch(array $args = [])
 * @phpstan-method \Aws\Result getBranch(array{appId?: string, branchName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBranchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBranchAsync(array{appId?: string, branchName?: string, ...} $args = [])
 * @method \Aws\Result getDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result getDomainAssociation(array{appId?: string, domainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainAssociationAsync(array{appId?: string, domainName?: string, ...} $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @phpstan-method \Aws\Result getJob(array{appId?: string, branchName?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobAsync(array{appId?: string, branchName?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result getWebhook(array $args = [])
 * @phpstan-method \Aws\Result getWebhook(array{webhookId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebhookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebhookAsync(array{webhookId?: string, ...} $args = [])
 * @method \Aws\Result listApps(array $args = [])
 * @phpstan-method \Aws\Result listApps(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listArtifacts(array $args = [])
 * @phpstan-method \Aws\Result listArtifacts(array{appId?: string, branchName?: string, jobId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listArtifactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listArtifactsAsync(array{appId?: string, branchName?: string, jobId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listBackendEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listBackendEnvironments(array{appId?: string, environmentName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBackendEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBackendEnvironmentsAsync(array{appId?: string, environmentName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listBranches(array $args = [])
 * @phpstan-method \Aws\Result listBranches(array{appId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBranchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBranchesAsync(array{appId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDomainAssociations(array $args = [])
 * @phpstan-method \Aws\Result listDomainAssociations(array{appId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainAssociationsAsync(array{appId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{appId?: string, branchName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{appId?: string, branchName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listWebhooks(array $args = [])
 * @phpstan-method \Aws\Result listWebhooks(array{appId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebhooksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebhooksAsync(array{appId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result startDeployment(array $args = [])
 * @phpstan-method \Aws\Result startDeployment(array{
 *     appId?: string,
 *     branchName?: string,
 *     jobId?: string,
 *     sourceUrl?: string,
 *     sourceUrlType?: 'BUCKET_PREFIX'|'ZIP',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDeploymentAsync(array{
 *     appId?: string,
 *     branchName?: string,
 *     jobId?: string,
 *     sourceUrl?: string,
 *     sourceUrlType?: 'BUCKET_PREFIX'|'ZIP',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startJob(array $args = [])
 * @phpstan-method \Aws\Result startJob(array{
 *     appId?: string,
 *     branchName?: string,
 *     jobId?: string,
 *     jobType?: 'MANUAL'|'RELEASE'|'RETRY'|'WEB_HOOK',
 *     jobReason?: string,
 *     commitId?: string,
 *     commitMessage?: string,
 *     commitTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startJobAsync(array{
 *     appId?: string,
 *     branchName?: string,
 *     jobId?: string,
 *     jobType?: 'MANUAL'|'RELEASE'|'RETRY'|'WEB_HOOK',
 *     jobReason?: string,
 *     commitId?: string,
 *     commitMessage?: string,
 *     commitTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopJob(array $args = [])
 * @phpstan-method \Aws\Result stopJob(array{appId?: string, branchName?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopJobAsync(array{appId?: string, branchName?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApp(array $args = [])
 * @phpstan-method \Aws\Result updateApp(array{
 *     appId?: string,
 *     name?: string,
 *     description?: string,
 *     platform?: 'WEB'|'WEB_COMPUTE'|'WEB_DYNAMIC',
 *     computeRoleArn?: string,
 *     iamServiceRoleArn?: string,
 *     environmentVariables?: array<string, string>,
 *     enableBranchAutoBuild?: bool,
 *     enableBranchAutoDeletion?: bool,
 *     enableBasicAuth?: bool,
 *     basicAuthCredentials?: string,
 *     customRules?: list<array{source?: string, target?: string, status?: string, condition?: string, ...}>,
 *     buildSpec?: string,
 *     customHeaders?: string,
 *     enableAutoBranchCreation?: bool,
 *     autoBranchCreationPatterns?: list<string>,
 *     autoBranchCreationConfig?: array{
 *         stage?: 'BETA'|'DEVELOPMENT'|'EXPERIMENTAL'|'PRODUCTION'|'PULL_REQUEST',
 *         framework?: string,
 *         enableAutoBuild?: bool,
 *         environmentVariables?: array<string, string>,
 *         basicAuthCredentials?: string,
 *         enableBasicAuth?: bool,
 *         enablePerformanceMode?: bool,
 *         buildSpec?: string,
 *         enablePullRequestPreview?: bool,
 *         pullRequestEnvironmentName?: string,
 *         ...,
 *     },
 *     repository?: string,
 *     oauthToken?: string,
 *     accessToken?: string,
 *     jobConfig?: array{buildComputeType?: 'LARGE_16GB'|'STANDARD_8GB'|'XLARGE_72GB', ...},
 *     cacheConfig?: array{type?: 'AMPLIFY_MANAGED'|'AMPLIFY_MANAGED_NO_COOKIES', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppAsync(array{
 *     appId?: string,
 *     name?: string,
 *     description?: string,
 *     platform?: 'WEB'|'WEB_COMPUTE'|'WEB_DYNAMIC',
 *     computeRoleArn?: string,
 *     iamServiceRoleArn?: string,
 *     environmentVariables?: array<string, string>,
 *     enableBranchAutoBuild?: bool,
 *     enableBranchAutoDeletion?: bool,
 *     enableBasicAuth?: bool,
 *     basicAuthCredentials?: string,
 *     customRules?: list<array{source?: string, target?: string, status?: string, condition?: string, ...}>,
 *     buildSpec?: string,
 *     customHeaders?: string,
 *     enableAutoBranchCreation?: bool,
 *     autoBranchCreationPatterns?: list<string>,
 *     autoBranchCreationConfig?: array{
 *         stage?: 'BETA'|'DEVELOPMENT'|'EXPERIMENTAL'|'PRODUCTION'|'PULL_REQUEST',
 *         framework?: string,
 *         enableAutoBuild?: bool,
 *         environmentVariables?: array<string, string>,
 *         basicAuthCredentials?: string,
 *         enableBasicAuth?: bool,
 *         enablePerformanceMode?: bool,
 *         buildSpec?: string,
 *         enablePullRequestPreview?: bool,
 *         pullRequestEnvironmentName?: string,
 *         ...,
 *     },
 *     repository?: string,
 *     oauthToken?: string,
 *     accessToken?: string,
 *     jobConfig?: array{buildComputeType?: 'LARGE_16GB'|'STANDARD_8GB'|'XLARGE_72GB', ...},
 *     cacheConfig?: array{type?: 'AMPLIFY_MANAGED'|'AMPLIFY_MANAGED_NO_COOKIES', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBranch(array $args = [])
 * @phpstan-method \Aws\Result updateBranch(array{
 *     appId?: string,
 *     branchName?: string,
 *     description?: string,
 *     framework?: string,
 *     stage?: 'BETA'|'DEVELOPMENT'|'EXPERIMENTAL'|'PRODUCTION'|'PULL_REQUEST',
 *     enableNotification?: bool,
 *     enableAutoBuild?: bool,
 *     enableSkewProtection?: bool,
 *     environmentVariables?: array<string, string>,
 *     basicAuthCredentials?: string,
 *     enableBasicAuth?: bool,
 *     enablePerformanceMode?: bool,
 *     buildSpec?: string,
 *     ttl?: string,
 *     displayName?: string,
 *     enablePullRequestPreview?: bool,
 *     pullRequestEnvironmentName?: string,
 *     backendEnvironmentArn?: string,
 *     backend?: array{stackArn?: string, ...},
 *     computeRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBranchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBranchAsync(array{
 *     appId?: string,
 *     branchName?: string,
 *     description?: string,
 *     framework?: string,
 *     stage?: 'BETA'|'DEVELOPMENT'|'EXPERIMENTAL'|'PRODUCTION'|'PULL_REQUEST',
 *     enableNotification?: bool,
 *     enableAutoBuild?: bool,
 *     enableSkewProtection?: bool,
 *     environmentVariables?: array<string, string>,
 *     basicAuthCredentials?: string,
 *     enableBasicAuth?: bool,
 *     enablePerformanceMode?: bool,
 *     buildSpec?: string,
 *     ttl?: string,
 *     displayName?: string,
 *     enablePullRequestPreview?: bool,
 *     pullRequestEnvironmentName?: string,
 *     backendEnvironmentArn?: string,
 *     backend?: array{stackArn?: string, ...},
 *     computeRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomainAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateDomainAssociation(array{
 *     appId?: string,
 *     domainName?: string,
 *     enableAutoSubDomain?: bool,
 *     subDomainSettings?: list<array{prefix?: string, branchName?: string, ...}>,
 *     autoSubDomainCreationPatterns?: list<string>,
 *     autoSubDomainIAMRole?: string,
 *     certificateSettings?: array{type?: 'AMPLIFY_MANAGED'|'CUSTOM', customCertificateArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainAssociationAsync(array{
 *     appId?: string,
 *     domainName?: string,
 *     enableAutoSubDomain?: bool,
 *     subDomainSettings?: list<array{prefix?: string, branchName?: string, ...}>,
 *     autoSubDomainCreationPatterns?: list<string>,
 *     autoSubDomainIAMRole?: string,
 *     certificateSettings?: array{type?: 'AMPLIFY_MANAGED'|'CUSTOM', customCertificateArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWebhook(array $args = [])
 * @phpstan-method \Aws\Result updateWebhook(array{webhookId?: string, branchName?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWebhookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWebhookAsync(array{webhookId?: string, branchName?: string, description?: string, ...} $args = [])
 */
class AmplifyClient extends AwsClient {}
