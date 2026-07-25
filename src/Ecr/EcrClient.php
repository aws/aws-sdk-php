<?php
namespace Aws\Ecr;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EC2 Container Registry** service.
 *
 * @method \Aws\Result batchCheckLayerAvailability(array $args = [])
 * @phpstan-method \Aws\Result batchCheckLayerAvailability(array{registryId?: string, repositoryName?: string, layerDigests?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCheckLayerAvailabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCheckLayerAvailabilityAsync(array{registryId?: string, repositoryName?: string, layerDigests?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDeleteImage(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteImage(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteImageAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetImage(array $args = [])
 * @phpstan-method \Aws\Result batchGetImage(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     acceptedMediaTypes?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetImageAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     acceptedMediaTypes?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetRepositoryScanningConfiguration(array $args = [])
 * @phpstan-method \Aws\Result batchGetRepositoryScanningConfiguration(array{repositoryNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetRepositoryScanningConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetRepositoryScanningConfigurationAsync(array{repositoryNames?: list<string>, ...} $args = [])
 * @method \Aws\Result completeLayerUpload(array $args = [])
 * @phpstan-method \Aws\Result completeLayerUpload(array{registryId?: string, repositoryName?: string, uploadId?: string, layerDigests?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise completeLayerUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeLayerUploadAsync(array{registryId?: string, repositoryName?: string, uploadId?: string, layerDigests?: list<string>, ...} $args = [])
 * @method \Aws\Result createPullThroughCacheRule(array $args = [])
 * @phpstan-method \Aws\Result createPullThroughCacheRule(array{
 *     ecrRepositoryPrefix?: string,
 *     upstreamRegistryUrl?: string,
 *     registryId?: string,
 *     upstreamRegistry?: 'azure-container-registry'|'chainguard'|'docker-hub'|'ecr'|'ecr-public'|'github-container-registry'|'gitlab-container-registry'|'k8s'|'quay',
 *     credentialArn?: string,
 *     customRoleArn?: string,
 *     upstreamRepositoryPrefix?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPullThroughCacheRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPullThroughCacheRuleAsync(array{
 *     ecrRepositoryPrefix?: string,
 *     upstreamRegistryUrl?: string,
 *     registryId?: string,
 *     upstreamRegistry?: 'azure-container-registry'|'chainguard'|'docker-hub'|'ecr'|'ecr-public'|'github-container-registry'|'gitlab-container-registry'|'k8s'|'quay',
 *     credentialArn?: string,
 *     customRoleArn?: string,
 *     upstreamRepositoryPrefix?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRepository(array $args = [])
 * @phpstan-method \Aws\Result createRepository(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     imageTagMutability?: 'IMMUTABLE'|'IMMUTABLE_WITH_EXCLUSION'|'MUTABLE'|'MUTABLE_WITH_EXCLUSION',
 *     imageTagMutabilityExclusionFilters?: list<array{filterType?: 'WILDCARD', filter?: string, ...}>,
 *     imageScanningConfiguration?: array{scanOnPush?: bool, ...},
 *     encryptionConfiguration?: array{encryptionType?: 'AES256'|'KMS'|'KMS_DSSE', kmsKey?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRepositoryAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     imageTagMutability?: 'IMMUTABLE'|'IMMUTABLE_WITH_EXCLUSION'|'MUTABLE'|'MUTABLE_WITH_EXCLUSION',
 *     imageTagMutabilityExclusionFilters?: list<array{filterType?: 'WILDCARD', filter?: string, ...}>,
 *     imageScanningConfiguration?: array{scanOnPush?: bool, ...},
 *     encryptionConfiguration?: array{encryptionType?: 'AES256'|'KMS'|'KMS_DSSE', kmsKey?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRepositoryCreationTemplate(array $args = [])
 * @phpstan-method \Aws\Result createRepositoryCreationTemplate(array{
 *     prefix?: string,
 *     description?: string,
 *     encryptionConfiguration?: array{encryptionType?: 'AES256'|'KMS'|'KMS_DSSE', kmsKey?: string, ...},
 *     resourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     imageTagMutability?: 'IMMUTABLE'|'IMMUTABLE_WITH_EXCLUSION'|'MUTABLE'|'MUTABLE_WITH_EXCLUSION',
 *     imageTagMutabilityExclusionFilters?: list<array{filterType?: 'WILDCARD', filter?: string, ...}>,
 *     repositoryPolicy?: string,
 *     lifecyclePolicy?: string,
 *     appliedFor?: list<'CREATE_ON_PUSH'|'PULL_THROUGH_CACHE'|'REPLICATION'>,
 *     customRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRepositoryCreationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRepositoryCreationTemplateAsync(array{
 *     prefix?: string,
 *     description?: string,
 *     encryptionConfiguration?: array{encryptionType?: 'AES256'|'KMS'|'KMS_DSSE', kmsKey?: string, ...},
 *     resourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     imageTagMutability?: 'IMMUTABLE'|'IMMUTABLE_WITH_EXCLUSION'|'MUTABLE'|'MUTABLE_WITH_EXCLUSION',
 *     imageTagMutabilityExclusionFilters?: list<array{filterType?: 'WILDCARD', filter?: string, ...}>,
 *     repositoryPolicy?: string,
 *     lifecyclePolicy?: string,
 *     appliedFor?: list<'CREATE_ON_PUSH'|'PULL_THROUGH_CACHE'|'REPLICATION'>,
 *     customRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteLifecyclePolicy(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \Aws\Result deletePullThroughCacheRule(array $args = [])
 * @phpstan-method \Aws\Result deletePullThroughCacheRule(array{ecrRepositoryPrefix?: string, registryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePullThroughCacheRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePullThroughCacheRuleAsync(array{ecrRepositoryPrefix?: string, registryId?: string, ...} $args = [])
 * @method \Aws\Result deleteRegistryPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistryPolicy(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistryPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistryPolicyAsync(array{...} $args = [])
 * @method \Aws\Result deleteRepository(array $args = [])
 * @phpstan-method \Aws\Result deleteRepository(array{registryId?: string, repositoryName?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRepositoryAsync(array{registryId?: string, repositoryName?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result deleteRepositoryCreationTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteRepositoryCreationTemplate(array{prefix?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRepositoryCreationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRepositoryCreationTemplateAsync(array{prefix?: string, ...} $args = [])
 * @method \Aws\Result deleteRepositoryPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteRepositoryPolicy(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRepositoryPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRepositoryPolicyAsync(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \Aws\Result deleteSigningConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteSigningConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSigningConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSigningConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result deregisterPullTimeUpdateExclusion(array $args = [])
 * @phpstan-method \Aws\Result deregisterPullTimeUpdateExclusion(array{principalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterPullTimeUpdateExclusionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterPullTimeUpdateExclusionAsync(array{principalArn?: string, ...} $args = [])
 * @method \Aws\Result describeImageReplicationStatus(array $args = [])
 * @phpstan-method \Aws\Result describeImageReplicationStatus(array{
 *     repositoryName?: string,
 *     imageId?: array{imageDigest?: string, imageTag?: string, ...},
 *     registryId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImageReplicationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImageReplicationStatusAsync(array{
 *     repositoryName?: string,
 *     imageId?: array{imageDigest?: string, imageTag?: string, ...},
 *     registryId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeImageScanFindings(array $args = [])
 * @phpstan-method \Aws\Result describeImageScanFindings(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageId?: array{imageDigest?: string, imageTag?: string, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImageScanFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImageScanFindingsAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageId?: array{imageDigest?: string, imageTag?: string, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeImageSigningStatus(array $args = [])
 * @phpstan-method \Aws\Result describeImageSigningStatus(array{
 *     repositoryName?: string,
 *     imageId?: array{imageDigest?: string, imageTag?: string, ...},
 *     registryId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImageSigningStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImageSigningStatusAsync(array{
 *     repositoryName?: string,
 *     imageId?: array{imageDigest?: string, imageTag?: string, ...},
 *     registryId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeImages(array $args = [])
 * @phpstan-method \Aws\Result describeImages(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{tagStatus?: 'ANY'|'TAGGED'|'UNTAGGED', imageStatus?: 'ACTIVATING'|'ACTIVE'|'ANY'|'ARCHIVED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImagesAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{tagStatus?: 'ANY'|'TAGGED'|'UNTAGGED', imageStatus?: 'ACTIVATING'|'ACTIVE'|'ANY'|'ARCHIVED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePullThroughCacheRules(array $args = [])
 * @phpstan-method \Aws\Result describePullThroughCacheRules(array{registryId?: string, ecrRepositoryPrefixes?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePullThroughCacheRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePullThroughCacheRulesAsync(array{registryId?: string, ecrRepositoryPrefixes?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result describeRegistry(array $args = [])
 * @phpstan-method \Aws\Result describeRegistry(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegistryAsync(array{...} $args = [])
 * @method \Aws\Result describeRepositories(array $args = [])
 * @phpstan-method \Aws\Result describeRepositories(array{registryId?: string, repositoryNames?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRepositoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRepositoriesAsync(array{registryId?: string, repositoryNames?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result describeRepositoryCreationTemplates(array $args = [])
 * @phpstan-method \Aws\Result describeRepositoryCreationTemplates(array{prefixes?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRepositoryCreationTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRepositoryCreationTemplatesAsync(array{prefixes?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getAccountSetting(array $args = [])
 * @phpstan-method \Aws\Result getAccountSetting(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSettingAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getAuthorizationToken(array $args = [])
 * @phpstan-method \Aws\Result getAuthorizationToken(array{registryIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAuthorizationTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAuthorizationTokenAsync(array{registryIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getDownloadUrlForLayer(array $args = [])
 * @phpstan-method \Aws\Result getDownloadUrlForLayer(array{registryId?: string, repositoryName?: string, layerDigest?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDownloadUrlForLayerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDownloadUrlForLayerAsync(array{registryId?: string, repositoryName?: string, layerDigest?: string, ...} $args = [])
 * @method \Aws\Result getLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result getLifecyclePolicy(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLifecyclePolicyAsync(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \Aws\Result getLifecyclePolicyPreview(array $args = [])
 * @phpstan-method \Aws\Result getLifecyclePolicyPreview(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{tagStatus?: 'ANY'|'TAGGED'|'UNTAGGED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getLifecyclePolicyPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLifecyclePolicyPreviewAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{tagStatus?: 'ANY'|'TAGGED'|'UNTAGGED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRegistryPolicy(array $args = [])
 * @phpstan-method \Aws\Result getRegistryPolicy(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegistryPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistryPolicyAsync(array{...} $args = [])
 * @method \Aws\Result getRegistryScanningConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getRegistryScanningConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegistryScanningConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistryScanningConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getRepositoryPolicy(array $args = [])
 * @phpstan-method \Aws\Result getRepositoryPolicy(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRepositoryPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositoryPolicyAsync(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \Aws\Result getSigningConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getSigningConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSigningConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSigningConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result initiateLayerUpload(array $args = [])
 * @phpstan-method \Aws\Result initiateLayerUpload(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise initiateLayerUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initiateLayerUploadAsync(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \Aws\Result listImageReferrers(array $args = [])
 * @phpstan-method \Aws\Result listImageReferrers(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     subjectId?: array{imageDigest?: string, ...},
 *     filter?: array{artifactTypes?: list<string>, artifactStatus?: 'ACTIVATING'|'ACTIVE'|'ANY'|'ARCHIVED', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImageReferrersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImageReferrersAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     subjectId?: array{imageDigest?: string, ...},
 *     filter?: array{artifactTypes?: list<string>, artifactStatus?: 'ACTIVATING'|'ACTIVE'|'ANY'|'ARCHIVED', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImages(array $args = [])
 * @phpstan-method \Aws\Result listImages(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{tagStatus?: 'ANY'|'TAGGED'|'UNTAGGED', imageStatus?: 'ACTIVATING'|'ACTIVE'|'ANY'|'ARCHIVED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImagesAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{tagStatus?: 'ANY'|'TAGGED'|'UNTAGGED', imageStatus?: 'ACTIVATING'|'ACTIVE'|'ANY'|'ARCHIVED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPullTimeUpdateExclusions(array $args = [])
 * @phpstan-method \Aws\Result listPullTimeUpdateExclusions(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPullTimeUpdateExclusionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPullTimeUpdateExclusionsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putAccountSetting(array $args = [])
 * @phpstan-method \Aws\Result putAccountSetting(array{name?: string, value?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountSettingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountSettingAsync(array{name?: string, value?: string, ...} $args = [])
 * @method \Aws\Result putImage(array $args = [])
 * @phpstan-method \Aws\Result putImage(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageManifest?: string,
 *     imageManifestMediaType?: string,
 *     imageTag?: string,
 *     imageDigest?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putImageAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageManifest?: string,
 *     imageManifestMediaType?: string,
 *     imageTag?: string,
 *     imageDigest?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putImageScanningConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putImageScanningConfiguration(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageScanningConfiguration?: array{scanOnPush?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putImageScanningConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putImageScanningConfigurationAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageScanningConfiguration?: array{scanOnPush?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putImageTagMutability(array $args = [])
 * @phpstan-method \Aws\Result putImageTagMutability(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageTagMutability?: 'IMMUTABLE'|'IMMUTABLE_WITH_EXCLUSION'|'MUTABLE'|'MUTABLE_WITH_EXCLUSION',
 *     imageTagMutabilityExclusionFilters?: list<array{filterType?: 'WILDCARD', filter?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putImageTagMutabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putImageTagMutabilityAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageTagMutability?: 'IMMUTABLE'|'IMMUTABLE_WITH_EXCLUSION'|'MUTABLE'|'MUTABLE_WITH_EXCLUSION',
 *     imageTagMutabilityExclusionFilters?: list<array{filterType?: 'WILDCARD', filter?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result putLifecyclePolicy(array{registryId?: string, repositoryName?: string, lifecyclePolicyText?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLifecyclePolicyAsync(array{registryId?: string, repositoryName?: string, lifecyclePolicyText?: string, ...} $args = [])
 * @method \Aws\Result putRegistryPolicy(array $args = [])
 * @phpstan-method \Aws\Result putRegistryPolicy(array{policyText?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putRegistryPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRegistryPolicyAsync(array{policyText?: string, ...} $args = [])
 * @method \Aws\Result putRegistryScanningConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putRegistryScanningConfiguration(array{
 *     scanType?: 'BASIC'|'ENHANCED',
 *     rules?: list<array{scanFrequency?: 'CONTINUOUS_SCAN'|'MANUAL'|'SCAN_ON_PUSH', repositoryFilters?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRegistryScanningConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRegistryScanningConfigurationAsync(array{
 *     scanType?: 'BASIC'|'ENHANCED',
 *     rules?: list<array{scanFrequency?: 'CONTINUOUS_SCAN'|'MANUAL'|'SCAN_ON_PUSH', repositoryFilters?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putReplicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putReplicationConfiguration(array{replicationConfiguration?: array{rules?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putReplicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putReplicationConfigurationAsync(array{replicationConfiguration?: array{rules?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result putSigningConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putSigningConfiguration(array{signingConfiguration?: array{rules?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putSigningConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSigningConfigurationAsync(array{signingConfiguration?: array{rules?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result registerPullTimeUpdateExclusion(array $args = [])
 * @phpstan-method \Aws\Result registerPullTimeUpdateExclusion(array{principalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerPullTimeUpdateExclusionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerPullTimeUpdateExclusionAsync(array{principalArn?: string, ...} $args = [])
 * @method \Aws\Result setRepositoryPolicy(array $args = [])
 * @phpstan-method \Aws\Result setRepositoryPolicy(array{registryId?: string, repositoryName?: string, policyText?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setRepositoryPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setRepositoryPolicyAsync(array{registryId?: string, repositoryName?: string, policyText?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result startImageScan(array $args = [])
 * @phpstan-method \Aws\Result startImageScan(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageId?: array{imageDigest?: string, imageTag?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startImageScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImageScanAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageId?: array{imageDigest?: string, imageTag?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startLifecyclePolicyPreview(array $args = [])
 * @phpstan-method \Aws\Result startLifecyclePolicyPreview(array{registryId?: string, repositoryName?: string, lifecyclePolicyText?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startLifecyclePolicyPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startLifecyclePolicyPreviewAsync(array{registryId?: string, repositoryName?: string, lifecyclePolicyText?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateImageStorageClass(array $args = [])
 * @phpstan-method \Aws\Result updateImageStorageClass(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageId?: array{imageDigest?: string, imageTag?: string, ...},
 *     targetStorageClass?: 'ARCHIVE'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateImageStorageClassAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateImageStorageClassAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageId?: array{imageDigest?: string, imageTag?: string, ...},
 *     targetStorageClass?: 'ARCHIVE'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePullThroughCacheRule(array $args = [])
 * @phpstan-method \Aws\Result updatePullThroughCacheRule(array{registryId?: string, ecrRepositoryPrefix?: string, credentialArn?: string, customRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePullThroughCacheRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePullThroughCacheRuleAsync(array{registryId?: string, ecrRepositoryPrefix?: string, credentialArn?: string, customRoleArn?: string, ...} $args = [])
 * @method \Aws\Result updateRepositoryCreationTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateRepositoryCreationTemplate(array{
 *     prefix?: string,
 *     description?: string,
 *     encryptionConfiguration?: array{encryptionType?: 'AES256'|'KMS'|'KMS_DSSE', kmsKey?: string, ...},
 *     resourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     imageTagMutability?: 'IMMUTABLE'|'IMMUTABLE_WITH_EXCLUSION'|'MUTABLE'|'MUTABLE_WITH_EXCLUSION',
 *     imageTagMutabilityExclusionFilters?: list<array{filterType?: 'WILDCARD', filter?: string, ...}>,
 *     repositoryPolicy?: string,
 *     lifecyclePolicy?: string,
 *     appliedFor?: list<'CREATE_ON_PUSH'|'PULL_THROUGH_CACHE'|'REPLICATION'>,
 *     customRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRepositoryCreationTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRepositoryCreationTemplateAsync(array{
 *     prefix?: string,
 *     description?: string,
 *     encryptionConfiguration?: array{encryptionType?: 'AES256'|'KMS'|'KMS_DSSE', kmsKey?: string, ...},
 *     resourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     imageTagMutability?: 'IMMUTABLE'|'IMMUTABLE_WITH_EXCLUSION'|'MUTABLE'|'MUTABLE_WITH_EXCLUSION',
 *     imageTagMutabilityExclusionFilters?: list<array{filterType?: 'WILDCARD', filter?: string, ...}>,
 *     repositoryPolicy?: string,
 *     lifecyclePolicy?: string,
 *     appliedFor?: list<'CREATE_ON_PUSH'|'PULL_THROUGH_CACHE'|'REPLICATION'>,
 *     customRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result uploadLayerPart(array $args = [])
 * @phpstan-method \Aws\Result uploadLayerPart(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     uploadId?: string,
 *     partFirstByte?: int,
 *     partLastByte?: int,
 *     layerPartBlob?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadLayerPartAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadLayerPartAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     uploadId?: string,
 *     partFirstByte?: int,
 *     partLastByte?: int,
 *     layerPartBlob?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result validatePullThroughCacheRule(array $args = [])
 * @phpstan-method \Aws\Result validatePullThroughCacheRule(array{ecrRepositoryPrefix?: string, registryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validatePullThroughCacheRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validatePullThroughCacheRuleAsync(array{ecrRepositoryPrefix?: string, registryId?: string, ...} $args = [])
 */
class EcrClient extends AwsClient {}
