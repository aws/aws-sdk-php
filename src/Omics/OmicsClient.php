<?php
namespace Aws\Omics;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Omics** service.
 * @method \Aws\Result abortMultipartReadSetUpload(array $args = [])
 * @phpstan-method \Aws\Result abortMultipartReadSetUpload(array{sequenceStoreId?: string, uploadId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise abortMultipartReadSetUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise abortMultipartReadSetUploadAsync(array{sequenceStoreId?: string, uploadId?: string, ...} $args = [])
 * @method \Aws\Result acceptShare(array $args = [])
 * @phpstan-method \Aws\Result acceptShare(array{shareId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptShareAsync(array{shareId?: string, ...} $args = [])
 * @method \Aws\Result batchDeleteReadSet(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteReadSet(array{ids?: list<string>, sequenceStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteReadSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteReadSetAsync(array{ids?: list<string>, sequenceStoreId?: string, ...} $args = [])
 * @method \Aws\Result cancelAnnotationImportJob(array $args = [])
 * @phpstan-method \Aws\Result cancelAnnotationImportJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelAnnotationImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelAnnotationImportJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result cancelRun(array $args = [])
 * @phpstan-method \Aws\Result cancelRun(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelRunAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result cancelRunBatch(array $args = [])
 * @phpstan-method \Aws\Result cancelRunBatch(array{batchId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelRunBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelRunBatchAsync(array{batchId?: string, ...} $args = [])
 * @method \Aws\Result cancelVariantImportJob(array $args = [])
 * @phpstan-method \Aws\Result cancelVariantImportJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelVariantImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelVariantImportJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result completeMultipartReadSetUpload(array $args = [])
 * @phpstan-method \Aws\Result completeMultipartReadSetUpload(array{
 *     sequenceStoreId?: string,
 *     uploadId?: string,
 *     parts?: list<array{partNumber?: int, partSource?: 'SOURCE1'|'SOURCE2', checksum?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise completeMultipartReadSetUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeMultipartReadSetUploadAsync(array{
 *     sequenceStoreId?: string,
 *     uploadId?: string,
 *     parts?: list<array{partNumber?: int, partSource?: 'SOURCE1'|'SOURCE2', checksum?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAnnotationStore(array $args = [])
 * @phpstan-method \Aws\Result createAnnotationStore(array{
 *     reference?: array{referenceArn?: string, ...},
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     versionName?: string,
 *     sseConfig?: array{type?: 'KMS', keyArn?: string, ...},
 *     storeFormat?: 'GFF'|'TSV'|'VCF',
 *     storeOptions?: array{
 *         tsvStoreOptions?: array{
 *             annotationType?: 'CHR_POS'|'CHR_POS_REF_ALT'|'CHR_START_END_ONE_BASE'|'CHR_START_END_REF_ALT_ONE_BASE'|'CHR_START_END_REF_ALT_ZERO_BASE'|'CHR_START_END_ZERO_BASE'|'GENERIC',
 *             formatToHeader?: array<string, string>,
 *             schema?: list<array<string, 'BOOLEAN'|'DOUBLE'|'FLOAT'|'INT'|'LONG'|'STRING'>>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAnnotationStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAnnotationStoreAsync(array{
 *     reference?: array{referenceArn?: string, ...},
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     versionName?: string,
 *     sseConfig?: array{type?: 'KMS', keyArn?: string, ...},
 *     storeFormat?: 'GFF'|'TSV'|'VCF',
 *     storeOptions?: array{
 *         tsvStoreOptions?: array{
 *             annotationType?: 'CHR_POS'|'CHR_POS_REF_ALT'|'CHR_START_END_ONE_BASE'|'CHR_START_END_REF_ALT_ONE_BASE'|'CHR_START_END_REF_ALT_ZERO_BASE'|'CHR_START_END_ZERO_BASE'|'GENERIC',
 *             formatToHeader?: array<string, string>,
 *             schema?: list<array<string, 'BOOLEAN'|'DOUBLE'|'FLOAT'|'INT'|'LONG'|'STRING'>>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAnnotationStoreVersion(array $args = [])
 * @phpstan-method \Aws\Result createAnnotationStoreVersion(array{
 *     name?: string,
 *     versionName?: string,
 *     description?: string,
 *     versionOptions?: array{
 *         tsvVersionOptions?: array{
 *             annotationType?: 'CHR_POS'|'CHR_POS_REF_ALT'|'CHR_START_END_ONE_BASE'|'CHR_START_END_REF_ALT_ONE_BASE'|'CHR_START_END_REF_ALT_ZERO_BASE'|'CHR_START_END_ZERO_BASE'|'GENERIC',
 *             formatToHeader?: array<string, string>,
 *             schema?: list<array<string, 'BOOLEAN'|'DOUBLE'|'FLOAT'|'INT'|'LONG'|'STRING'>>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAnnotationStoreVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAnnotationStoreVersionAsync(array{
 *     name?: string,
 *     versionName?: string,
 *     description?: string,
 *     versionOptions?: array{
 *         tsvVersionOptions?: array{
 *             annotationType?: 'CHR_POS'|'CHR_POS_REF_ALT'|'CHR_START_END_ONE_BASE'|'CHR_START_END_REF_ALT_ONE_BASE'|'CHR_START_END_REF_ALT_ZERO_BASE'|'CHR_START_END_ZERO_BASE'|'GENERIC',
 *             formatToHeader?: array<string, string>,
 *             schema?: list<array<string, 'BOOLEAN'|'DOUBLE'|'FLOAT'|'INT'|'LONG'|'STRING'>>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createConfiguration(array{
 *     name?: string,
 *     description?: string,
 *     runConfigurations?: array{vpcConfig?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, ...}, ...},
 *     tags?: array<string, string>,
 *     requestId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationAsync(array{
 *     name?: string,
 *     description?: string,
 *     runConfigurations?: array{vpcConfig?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, ...}, ...},
 *     tags?: array<string, string>,
 *     requestId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMultipartReadSetUpload(array $args = [])
 * @phpstan-method \Aws\Result createMultipartReadSetUpload(array{
 *     sequenceStoreId?: string,
 *     clientToken?: string,
 *     sourceFileType?: 'BAM'|'CRAM'|'FASTQ'|'UBAM',
 *     subjectId?: string,
 *     sampleId?: string,
 *     generatedFrom?: string,
 *     referenceArn?: string,
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMultipartReadSetUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMultipartReadSetUploadAsync(array{
 *     sequenceStoreId?: string,
 *     clientToken?: string,
 *     sourceFileType?: 'BAM'|'CRAM'|'FASTQ'|'UBAM',
 *     subjectId?: string,
 *     sampleId?: string,
 *     generatedFrom?: string,
 *     referenceArn?: string,
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReferenceStore(array $args = [])
 * @phpstan-method \Aws\Result createReferenceStore(array{
 *     name?: string,
 *     description?: string,
 *     sseConfig?: array{type?: 'KMS', keyArn?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReferenceStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReferenceStoreAsync(array{
 *     name?: string,
 *     description?: string,
 *     sseConfig?: array{type?: 'KMS', keyArn?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRunCache(array $args = [])
 * @phpstan-method \Aws\Result createRunCache(array{
 *     cacheBehavior?: 'CACHE_ALWAYS'|'CACHE_ON_FAILURE',
 *     cacheS3Location?: string,
 *     description?: string,
 *     name?: string,
 *     requestId?: string,
 *     tags?: array<string, string>,
 *     cacheBucketOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRunCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRunCacheAsync(array{
 *     cacheBehavior?: 'CACHE_ALWAYS'|'CACHE_ON_FAILURE',
 *     cacheS3Location?: string,
 *     description?: string,
 *     name?: string,
 *     requestId?: string,
 *     tags?: array<string, string>,
 *     cacheBucketOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRunGroup(array $args = [])
 * @phpstan-method \Aws\Result createRunGroup(array{
 *     name?: string,
 *     maxCpus?: int,
 *     maxRuns?: int,
 *     maxDuration?: int,
 *     tags?: array<string, string>,
 *     requestId?: string,
 *     maxGpus?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRunGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRunGroupAsync(array{
 *     name?: string,
 *     maxCpus?: int,
 *     maxRuns?: int,
 *     maxDuration?: int,
 *     tags?: array<string, string>,
 *     requestId?: string,
 *     maxGpus?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSequenceStore(array $args = [])
 * @phpstan-method \Aws\Result createSequenceStore(array{
 *     name?: string,
 *     description?: string,
 *     sseConfig?: array{type?: 'KMS', keyArn?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     fallbackLocation?: string,
 *     eTagAlgorithmFamily?: 'MD5up'|'SHA256up'|'SHA512up',
 *     propagatedSetLevelTags?: list<string>,
 *     s3AccessConfig?: array{accessLogLocation?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSequenceStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSequenceStoreAsync(array{
 *     name?: string,
 *     description?: string,
 *     sseConfig?: array{type?: 'KMS', keyArn?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     fallbackLocation?: string,
 *     eTagAlgorithmFamily?: 'MD5up'|'SHA256up'|'SHA512up',
 *     propagatedSetLevelTags?: list<string>,
 *     s3AccessConfig?: array{accessLogLocation?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createShare(array $args = [])
 * @phpstan-method \Aws\Result createShare(array{resourceArn?: string, principalSubscriber?: string, shareName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createShareAsync(array{resourceArn?: string, principalSubscriber?: string, shareName?: string, ...} $args = [])
 * @method \Aws\Result createVariantStore(array $args = [])
 * @phpstan-method \Aws\Result createVariantStore(array{
 *     reference?: array{referenceArn?: string, ...},
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     sseConfig?: array{type?: 'KMS', keyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVariantStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVariantStoreAsync(array{
 *     reference?: array{referenceArn?: string, ...},
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     sseConfig?: array{type?: 'KMS', keyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkflow(array $args = [])
 * @phpstan-method \Aws\Result createWorkflow(array{
 *     name?: string,
 *     description?: string,
 *     engine?: 'CWL'|'NEXTFLOW'|'WDL'|'WDL_LENIENT',
 *     definitionZip?: string|resource|\Psr\Http\Message\StreamInterface,
 *     definitionUri?: string,
 *     main?: string,
 *     parameterTemplate?: array<string, array{description?: string, optional?: bool, ...}>,
 *     storageCapacity?: int,
 *     tags?: array<string, string>,
 *     requestId?: string,
 *     accelerators?: 'GPU',
 *     storageType?: 'DYNAMIC'|'STATIC',
 *     containerRegistryMap?: array{registryMappings?: list<array>, imageMappings?: list<array>, ...},
 *     containerRegistryMapUri?: string,
 *     readmeMarkdown?: string,
 *     parameterTemplatePath?: string,
 *     readmePath?: string,
 *     definitionRepository?: array{
 *         connectionArn?: string,
 *         fullRepositoryId?: string,
 *         sourceReference?: array{type?: 'BRANCH'|'COMMIT'|'TAG', value?: string, ...},
 *         excludeFilePatterns?: list<string>,
 *         ...,
 *     },
 *     workflowBucketOwnerId?: string,
 *     readmeUri?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowAsync(array{
 *     name?: string,
 *     description?: string,
 *     engine?: 'CWL'|'NEXTFLOW'|'WDL'|'WDL_LENIENT',
 *     definitionZip?: string|resource|\Psr\Http\Message\StreamInterface,
 *     definitionUri?: string,
 *     main?: string,
 *     parameterTemplate?: array<string, array{description?: string, optional?: bool, ...}>,
 *     storageCapacity?: int,
 *     tags?: array<string, string>,
 *     requestId?: string,
 *     accelerators?: 'GPU',
 *     storageType?: 'DYNAMIC'|'STATIC',
 *     containerRegistryMap?: array{registryMappings?: list<array>, imageMappings?: list<array>, ...},
 *     containerRegistryMapUri?: string,
 *     readmeMarkdown?: string,
 *     parameterTemplatePath?: string,
 *     readmePath?: string,
 *     definitionRepository?: array{
 *         connectionArn?: string,
 *         fullRepositoryId?: string,
 *         sourceReference?: array{type?: 'BRANCH'|'COMMIT'|'TAG', value?: string, ...},
 *         excludeFilePatterns?: list<string>,
 *         ...,
 *     },
 *     workflowBucketOwnerId?: string,
 *     readmeUri?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkflowVersion(array $args = [])
 * @phpstan-method \Aws\Result createWorkflowVersion(array{
 *     workflowId?: string,
 *     versionName?: string,
 *     definitionZip?: string|resource|\Psr\Http\Message\StreamInterface,
 *     definitionUri?: string,
 *     accelerators?: 'GPU',
 *     description?: string,
 *     engine?: 'CWL'|'NEXTFLOW'|'WDL'|'WDL_LENIENT',
 *     main?: string,
 *     parameterTemplate?: array<string, array{description?: string, optional?: bool, ...}>,
 *     requestId?: string,
 *     storageType?: 'DYNAMIC'|'STATIC',
 *     storageCapacity?: int,
 *     tags?: array<string, string>,
 *     workflowBucketOwnerId?: string,
 *     containerRegistryMap?: array{registryMappings?: list<array>, imageMappings?: list<array>, ...},
 *     containerRegistryMapUri?: string,
 *     readmeMarkdown?: string,
 *     parameterTemplatePath?: string,
 *     readmePath?: string,
 *     definitionRepository?: array{
 *         connectionArn?: string,
 *         fullRepositoryId?: string,
 *         sourceReference?: array{type?: 'BRANCH'|'COMMIT'|'TAG', value?: string, ...},
 *         excludeFilePatterns?: list<string>,
 *         ...,
 *     },
 *     readmeUri?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowVersionAsync(array{
 *     workflowId?: string,
 *     versionName?: string,
 *     definitionZip?: string|resource|\Psr\Http\Message\StreamInterface,
 *     definitionUri?: string,
 *     accelerators?: 'GPU',
 *     description?: string,
 *     engine?: 'CWL'|'NEXTFLOW'|'WDL'|'WDL_LENIENT',
 *     main?: string,
 *     parameterTemplate?: array<string, array{description?: string, optional?: bool, ...}>,
 *     requestId?: string,
 *     storageType?: 'DYNAMIC'|'STATIC',
 *     storageCapacity?: int,
 *     tags?: array<string, string>,
 *     workflowBucketOwnerId?: string,
 *     containerRegistryMap?: array{registryMappings?: list<array>, imageMappings?: list<array>, ...},
 *     containerRegistryMapUri?: string,
 *     readmeMarkdown?: string,
 *     parameterTemplatePath?: string,
 *     readmePath?: string,
 *     definitionRepository?: array{
 *         connectionArn?: string,
 *         fullRepositoryId?: string,
 *         sourceReference?: array{type?: 'BRANCH'|'COMMIT'|'TAG', value?: string, ...},
 *         excludeFilePatterns?: list<string>,
 *         ...,
 *     },
 *     readmeUri?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAnnotationStore(array $args = [])
 * @phpstan-method \Aws\Result deleteAnnotationStore(array{name?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnnotationStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnnotationStoreAsync(array{name?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result deleteAnnotationStoreVersions(array $args = [])
 * @phpstan-method \Aws\Result deleteAnnotationStoreVersions(array{name?: string, versions?: list<string>, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnnotationStoreVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnnotationStoreVersionsAsync(array{name?: string, versions?: list<string>, force?: bool, ...} $args = [])
 * @method \Aws\Result deleteBatch(array $args = [])
 * @phpstan-method \Aws\Result deleteBatch(array{batchId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBatchAsync(array{batchId?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguration(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteReference(array $args = [])
 * @phpstan-method \Aws\Result deleteReference(array{id?: string, referenceStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReferenceAsync(array{id?: string, referenceStoreId?: string, ...} $args = [])
 * @method \Aws\Result deleteReferenceStore(array $args = [])
 * @phpstan-method \Aws\Result deleteReferenceStore(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReferenceStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReferenceStoreAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteRun(array $args = [])
 * @phpstan-method \Aws\Result deleteRun(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRunAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteRunBatch(array $args = [])
 * @phpstan-method \Aws\Result deleteRunBatch(array{batchId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRunBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRunBatchAsync(array{batchId?: string, ...} $args = [])
 * @method \Aws\Result deleteRunCache(array $args = [])
 * @phpstan-method \Aws\Result deleteRunCache(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRunCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRunCacheAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteRunGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteRunGroup(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRunGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRunGroupAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteS3AccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteS3AccessPolicy(array{s3AccessPointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteS3AccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteS3AccessPolicyAsync(array{s3AccessPointArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSequenceStore(array $args = [])
 * @phpstan-method \Aws\Result deleteSequenceStore(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSequenceStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSequenceStoreAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteShare(array $args = [])
 * @phpstan-method \Aws\Result deleteShare(array{shareId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteShareAsync(array{shareId?: string, ...} $args = [])
 * @method \Aws\Result deleteVariantStore(array $args = [])
 * @phpstan-method \Aws\Result deleteVariantStore(array{name?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVariantStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVariantStoreAsync(array{name?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result deleteWorkflow(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflow(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkflowVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflowVersion(array{workflowId?: string, versionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowVersionAsync(array{workflowId?: string, versionName?: string, ...} $args = [])
 * @method \Aws\Result getAnnotationImportJob(array $args = [])
 * @phpstan-method \Aws\Result getAnnotationImportJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnnotationImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnnotationImportJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result getAnnotationStore(array $args = [])
 * @phpstan-method \Aws\Result getAnnotationStore(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnnotationStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnnotationStoreAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getAnnotationStoreVersion(array $args = [])
 * @phpstan-method \Aws\Result getAnnotationStoreVersion(array{name?: string, versionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnnotationStoreVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnnotationStoreVersionAsync(array{name?: string, versionName?: string, ...} $args = [])
 * @method \Aws\Result getBatch(array $args = [])
 * @phpstan-method \Aws\Result getBatch(array{batchId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBatchAsync(array{batchId?: string, ...} $args = [])
 * @method \Aws\Result getConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getConfiguration(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getReadSet(array $args = [])
 * @phpstan-method \Aws\Result getReadSet(array{id?: string, sequenceStoreId?: string, file?: 'INDEX'|'SOURCE1'|'SOURCE2', partNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReadSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReadSetAsync(array{id?: string, sequenceStoreId?: string, file?: 'INDEX'|'SOURCE1'|'SOURCE2', partNumber?: int, ...} $args = [])
 * @method \Aws\Result getReadSetActivationJob(array $args = [])
 * @phpstan-method \Aws\Result getReadSetActivationJob(array{id?: string, sequenceStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReadSetActivationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReadSetActivationJobAsync(array{id?: string, sequenceStoreId?: string, ...} $args = [])
 * @method \Aws\Result getReadSetExportJob(array $args = [])
 * @phpstan-method \Aws\Result getReadSetExportJob(array{sequenceStoreId?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReadSetExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReadSetExportJobAsync(array{sequenceStoreId?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getReadSetImportJob(array $args = [])
 * @phpstan-method \Aws\Result getReadSetImportJob(array{id?: string, sequenceStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReadSetImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReadSetImportJobAsync(array{id?: string, sequenceStoreId?: string, ...} $args = [])
 * @method \Aws\Result getReadSetMetadata(array $args = [])
 * @phpstan-method \Aws\Result getReadSetMetadata(array{id?: string, sequenceStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReadSetMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReadSetMetadataAsync(array{id?: string, sequenceStoreId?: string, ...} $args = [])
 * @method \Aws\Result getReference(array $args = [])
 * @phpstan-method \Aws\Result getReference(array{id?: string, referenceStoreId?: string, range?: string, partNumber?: int, file?: 'INDEX'|'SOURCE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReferenceAsync(array{id?: string, referenceStoreId?: string, range?: string, partNumber?: int, file?: 'INDEX'|'SOURCE', ...} $args = [])
 * @method \Aws\Result getReferenceImportJob(array $args = [])
 * @phpstan-method \Aws\Result getReferenceImportJob(array{id?: string, referenceStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReferenceImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReferenceImportJobAsync(array{id?: string, referenceStoreId?: string, ...} $args = [])
 * @method \Aws\Result getReferenceMetadata(array $args = [])
 * @phpstan-method \Aws\Result getReferenceMetadata(array{id?: string, referenceStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReferenceMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReferenceMetadataAsync(array{id?: string, referenceStoreId?: string, ...} $args = [])
 * @method \Aws\Result getReferenceStore(array $args = [])
 * @phpstan-method \Aws\Result getReferenceStore(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReferenceStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReferenceStoreAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getRun(array $args = [])
 * @phpstan-method \Aws\Result getRun(array{id?: string, export?: list<'DEFINITION'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRunAsync(array{id?: string, export?: list<'DEFINITION'>, ...} $args = [])
 * @method \Aws\Result getRunCache(array $args = [])
 * @phpstan-method \Aws\Result getRunCache(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRunCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRunCacheAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getRunGroup(array $args = [])
 * @phpstan-method \Aws\Result getRunGroup(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRunGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRunGroupAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getRunTask(array $args = [])
 * @phpstan-method \Aws\Result getRunTask(array{id?: string, taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRunTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRunTaskAsync(array{id?: string, taskId?: string, ...} $args = [])
 * @method \Aws\Result getS3AccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result getS3AccessPolicy(array{s3AccessPointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getS3AccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getS3AccessPolicyAsync(array{s3AccessPointArn?: string, ...} $args = [])
 * @method \Aws\Result getSequenceStore(array $args = [])
 * @phpstan-method \Aws\Result getSequenceStore(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSequenceStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSequenceStoreAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getShare(array $args = [])
 * @phpstan-method \Aws\Result getShare(array{shareId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getShareAsync(array{shareId?: string, ...} $args = [])
 * @method \Aws\Result getVariantImportJob(array $args = [])
 * @phpstan-method \Aws\Result getVariantImportJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVariantImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVariantImportJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result getVariantStore(array $args = [])
 * @phpstan-method \Aws\Result getVariantStore(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVariantStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVariantStoreAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getWorkflow(array $args = [])
 * @phpstan-method \Aws\Result getWorkflow(array{
 *     id?: string,
 *     type?: 'PRIVATE'|'READY2RUN',
 *     export?: list<'DEFINITION'|'README'>,
 *     workflowOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowAsync(array{
 *     id?: string,
 *     type?: 'PRIVATE'|'READY2RUN',
 *     export?: list<'DEFINITION'|'README'>,
 *     workflowOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getWorkflowVersion(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowVersion(array{
 *     workflowId?: string,
 *     versionName?: string,
 *     type?: 'PRIVATE'|'READY2RUN',
 *     export?: list<'DEFINITION'|'README'>,
 *     workflowOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowVersionAsync(array{
 *     workflowId?: string,
 *     versionName?: string,
 *     type?: 'PRIVATE'|'READY2RUN',
 *     export?: list<'DEFINITION'|'README'>,
 *     workflowOwnerId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAnnotationImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listAnnotationImportJobs(array{
 *     maxResults?: int,
 *     ids?: list<string>,
 *     nextToken?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         storeName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnnotationImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnnotationImportJobsAsync(array{
 *     maxResults?: int,
 *     ids?: list<string>,
 *     nextToken?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         storeName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAnnotationStoreVersions(array $args = [])
 * @phpstan-method \Aws\Result listAnnotationStoreVersions(array{
 *     name?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnnotationStoreVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnnotationStoreVersionsAsync(array{
 *     name?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAnnotationStores(array $args = [])
 * @phpstan-method \Aws\Result listAnnotationStores(array{
 *     ids?: list<string>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnnotationStoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnnotationStoresAsync(array{
 *     ids?: list<string>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBatch(array $args = [])
 * @phpstan-method \Aws\Result listBatch(array{
 *     maxItems?: int,
 *     startingToken?: string,
 *     status?: 'CANCELLED'|'CREATING'|'FAILED'|'INPROGRESS'|'PENDING'|'PROCESSED'|'RUNS_DELETED'|'RUNS_DELETING'|'STOPPING'|'SUBMITTING',
 *     name?: string,
 *     runGroupId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBatchAsync(array{
 *     maxItems?: int,
 *     startingToken?: string,
 *     status?: 'CANCELLED'|'CREATING'|'FAILED'|'INPROGRESS'|'PENDING'|'PROCESSED'|'RUNS_DELETED'|'RUNS_DELETING'|'STOPPING'|'SUBMITTING',
 *     name?: string,
 *     runGroupId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listConfigurations(array{maxResults?: int, startingToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationsAsync(array{maxResults?: int, startingToken?: string, ...} $args = [])
 * @method \Aws\Result listMultipartReadSetUploads(array $args = [])
 * @phpstan-method \Aws\Result listMultipartReadSetUploads(array{sequenceStoreId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMultipartReadSetUploadsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMultipartReadSetUploadsAsync(array{sequenceStoreId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listReadSetActivationJobs(array $args = [])
 * @phpstan-method \Aws\Result listReadSetActivationJobs(array{
 *     sequenceStoreId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReadSetActivationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReadSetActivationJobsAsync(array{
 *     sequenceStoreId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReadSetExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listReadSetExportJobs(array{
 *     sequenceStoreId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReadSetExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReadSetExportJobsAsync(array{
 *     sequenceStoreId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReadSetImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listReadSetImportJobs(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     sequenceStoreId?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReadSetImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReadSetImportJobsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     sequenceStoreId?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReadSetUploadParts(array $args = [])
 * @phpstan-method \Aws\Result listReadSetUploadParts(array{
 *     sequenceStoreId?: string,
 *     uploadId?: string,
 *     partSource?: 'SOURCE1'|'SOURCE2',
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{createdAfter?: int|string|\DateTimeInterface, createdBefore?: int|string|\DateTimeInterface, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReadSetUploadPartsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReadSetUploadPartsAsync(array{
 *     sequenceStoreId?: string,
 *     uploadId?: string,
 *     partSource?: 'SOURCE1'|'SOURCE2',
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{createdAfter?: int|string|\DateTimeInterface, createdBefore?: int|string|\DateTimeInterface, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReadSets(array $args = [])
 * @phpstan-method \Aws\Result listReadSets(array{
 *     sequenceStoreId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         name?: string,
 *         status?: 'ACTIVATING'|'ACTIVE'|'ARCHIVED'|'DELETED'|'DELETING'|'PROCESSING_UPLOAD'|'UPLOAD_FAILED',
 *         referenceArn?: string,
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         sampleId?: string,
 *         subjectId?: string,
 *         generatedFrom?: string,
 *         creationType?: 'IMPORT'|'UPLOAD',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReadSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReadSetsAsync(array{
 *     sequenceStoreId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         name?: string,
 *         status?: 'ACTIVATING'|'ACTIVE'|'ARCHIVED'|'DELETED'|'DELETING'|'PROCESSING_UPLOAD'|'UPLOAD_FAILED',
 *         referenceArn?: string,
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         sampleId?: string,
 *         subjectId?: string,
 *         generatedFrom?: string,
 *         creationType?: 'IMPORT'|'UPLOAD',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReferenceImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listReferenceImportJobs(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     referenceStoreId?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReferenceImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReferenceImportJobsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     referenceStoreId?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'CANCELLING'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReferenceStores(array $args = [])
 * @phpstan-method \Aws\Result listReferenceStores(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         name?: string,
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReferenceStoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReferenceStoresAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         name?: string,
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReferences(array $args = [])
 * @phpstan-method \Aws\Result listReferences(array{
 *     referenceStoreId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         name?: string,
 *         md5?: string,
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReferencesAsync(array{
 *     referenceStoreId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         name?: string,
 *         md5?: string,
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRunCaches(array $args = [])
 * @phpstan-method \Aws\Result listRunCaches(array{maxResults?: int, startingToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRunCachesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRunCachesAsync(array{maxResults?: int, startingToken?: string, ...} $args = [])
 * @method \Aws\Result listRunGroups(array $args = [])
 * @phpstan-method \Aws\Result listRunGroups(array{name?: string, startingToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRunGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRunGroupsAsync(array{name?: string, startingToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listRunTasks(array $args = [])
 * @phpstan-method \Aws\Result listRunTasks(array{
 *     id?: string,
 *     status?: 'CANCELLED'|'COMPLETED'|'FAILED'|'PENDING'|'RUNNING'|'STARTING'|'STOPPING',
 *     startingToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRunTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRunTasksAsync(array{
 *     id?: string,
 *     status?: 'CANCELLED'|'COMPLETED'|'FAILED'|'PENDING'|'RUNNING'|'STARTING'|'STOPPING',
 *     startingToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRuns(array $args = [])
 * @phpstan-method \Aws\Result listRuns(array{
 *     name?: string,
 *     runGroupId?: string,
 *     batchId?: string,
 *     startingToken?: string,
 *     maxResults?: int,
 *     status?: 'CANCELLED'|'COMPLETED'|'DELETED'|'FAILED'|'PENDING'|'RUNNING'|'STARTING'|'STOPPING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRunsAsync(array{
 *     name?: string,
 *     runGroupId?: string,
 *     batchId?: string,
 *     startingToken?: string,
 *     maxResults?: int,
 *     status?: 'CANCELLED'|'COMPLETED'|'DELETED'|'FAILED'|'PENDING'|'RUNNING'|'STARTING'|'STOPPING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRunsInBatch(array $args = [])
 * @phpstan-method \Aws\Result listRunsInBatch(array{
 *     batchId?: string,
 *     maxItems?: int,
 *     startingToken?: string,
 *     submissionStatus?: 'CANCEL_FAILED'|'CANCEL_SUCCESS'|'DELETE_FAILED'|'DELETE_SUCCESS'|'FAILED'|'SUCCESS',
 *     runSettingId?: string,
 *     runId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRunsInBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRunsInBatchAsync(array{
 *     batchId?: string,
 *     maxItems?: int,
 *     startingToken?: string,
 *     submissionStatus?: 'CANCEL_FAILED'|'CANCEL_SUCCESS'|'DELETE_FAILED'|'DELETE_SUCCESS'|'FAILED'|'SUCCESS',
 *     runSettingId?: string,
 *     runId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSequenceStores(array $args = [])
 * @phpstan-method \Aws\Result listSequenceStores(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         name?: string,
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING',
 *         updatedAfter?: int|string|\DateTimeInterface,
 *         updatedBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSequenceStoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSequenceStoresAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{
 *         name?: string,
 *         createdAfter?: int|string|\DateTimeInterface,
 *         createdBefore?: int|string|\DateTimeInterface,
 *         status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING',
 *         updatedAfter?: int|string|\DateTimeInterface,
 *         updatedBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listShares(array $args = [])
 * @phpstan-method \Aws\Result listShares(array{
 *     resourceOwner?: 'OTHER'|'SELF',
 *     filter?: array{
 *         resourceArns?: list<string>,
 *         status?: list<'ACTIVATING'|'ACTIVE'|'DELETED'|'DELETING'|'FAILED'|'PENDING'>,
 *         type?: list<'ANNOTATION_STORE'|'VARIANT_STORE'|'WORKFLOW'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSharesAsync(array{
 *     resourceOwner?: 'OTHER'|'SELF',
 *     filter?: array{
 *         resourceArns?: list<string>,
 *         status?: list<'ACTIVATING'|'ACTIVE'|'DELETED'|'DELETING'|'FAILED'|'PENDING'>,
 *         type?: list<'ANNOTATION_STORE'|'VARIANT_STORE'|'WORKFLOW'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVariantImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listVariantImportJobs(array{
 *     maxResults?: int,
 *     ids?: list<string>,
 *     nextToken?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         storeName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVariantImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVariantImportJobsAsync(array{
 *     maxResults?: int,
 *     ids?: list<string>,
 *     nextToken?: string,
 *     filter?: array{
 *         status?: 'CANCELLED'|'COMPLETED'|'COMPLETED_WITH_FAILURES'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *         storeName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listVariantStores(array $args = [])
 * @phpstan-method \Aws\Result listVariantStores(array{
 *     maxResults?: int,
 *     ids?: list<string>,
 *     nextToken?: string,
 *     filter?: array{status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVariantStoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVariantStoresAsync(array{
 *     maxResults?: int,
 *     ids?: list<string>,
 *     nextToken?: string,
 *     filter?: array{status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkflowVersions(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowVersions(array{
 *     workflowId?: string,
 *     type?: 'PRIVATE'|'READY2RUN',
 *     workflowOwnerId?: string,
 *     startingToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowVersionsAsync(array{
 *     workflowId?: string,
 *     type?: 'PRIVATE'|'READY2RUN',
 *     workflowOwnerId?: string,
 *     startingToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listWorkflows(array{type?: 'PRIVATE'|'READY2RUN', name?: string, startingToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array{type?: 'PRIVATE'|'READY2RUN', name?: string, startingToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putS3AccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result putS3AccessPolicy(array{s3AccessPointArn?: string, s3AccessPolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putS3AccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putS3AccessPolicyAsync(array{s3AccessPointArn?: string, s3AccessPolicy?: string, ...} $args = [])
 * @method \Aws\Result startAnnotationImportJob(array $args = [])
 * @phpstan-method \Aws\Result startAnnotationImportJob(array{
 *     destinationName?: string,
 *     roleArn?: string,
 *     items?: list<array{source?: string, ...}>,
 *     versionName?: string,
 *     formatOptions?: array{
 *         tsvOptions?: array{readOptions?: array, ...},
 *         vcfOptions?: array{ignoreQualField?: bool, ignoreFilterField?: bool, ...},
 *         ...,
 *     },
 *     runLeftNormalization?: bool,
 *     annotationFields?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAnnotationImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAnnotationImportJobAsync(array{
 *     destinationName?: string,
 *     roleArn?: string,
 *     items?: list<array{source?: string, ...}>,
 *     versionName?: string,
 *     formatOptions?: array{
 *         tsvOptions?: array{readOptions?: array, ...},
 *         vcfOptions?: array{ignoreQualField?: bool, ignoreFilterField?: bool, ...},
 *         ...,
 *     },
 *     runLeftNormalization?: bool,
 *     annotationFields?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startReadSetActivationJob(array $args = [])
 * @phpstan-method \Aws\Result startReadSetActivationJob(array{sequenceStoreId?: string, clientToken?: string, sources?: list<array{readSetId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startReadSetActivationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReadSetActivationJobAsync(array{sequenceStoreId?: string, clientToken?: string, sources?: list<array{readSetId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result startReadSetExportJob(array $args = [])
 * @phpstan-method \Aws\Result startReadSetExportJob(array{
 *     sequenceStoreId?: string,
 *     destination?: string,
 *     roleArn?: string,
 *     clientToken?: string,
 *     sources?: list<array{readSetId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startReadSetExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReadSetExportJobAsync(array{
 *     sequenceStoreId?: string,
 *     destination?: string,
 *     roleArn?: string,
 *     clientToken?: string,
 *     sources?: list<array{readSetId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startReadSetImportJob(array $args = [])
 * @phpstan-method \Aws\Result startReadSetImportJob(array{
 *     sequenceStoreId?: string,
 *     roleArn?: string,
 *     clientToken?: string,
 *     sources?: list<array{
 *         sourceFiles?: array,
 *         sourceFileType?: 'BAM'|'CRAM'|'FASTQ'|'UBAM',
 *         subjectId?: string,
 *         sampleId?: string,
 *         generatedFrom?: string,
 *         referenceArn?: string,
 *         name?: string,
 *         description?: string,
 *         tags?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startReadSetImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReadSetImportJobAsync(array{
 *     sequenceStoreId?: string,
 *     roleArn?: string,
 *     clientToken?: string,
 *     sources?: list<array{
 *         sourceFiles?: array,
 *         sourceFileType?: 'BAM'|'CRAM'|'FASTQ'|'UBAM',
 *         subjectId?: string,
 *         sampleId?: string,
 *         generatedFrom?: string,
 *         referenceArn?: string,
 *         name?: string,
 *         description?: string,
 *         tags?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startReferenceImportJob(array $args = [])
 * @phpstan-method \Aws\Result startReferenceImportJob(array{
 *     referenceStoreId?: string,
 *     roleArn?: string,
 *     clientToken?: string,
 *     sources?: list<array{sourceFile?: string, name?: string, description?: string, tags?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startReferenceImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReferenceImportJobAsync(array{
 *     referenceStoreId?: string,
 *     roleArn?: string,
 *     clientToken?: string,
 *     sources?: list<array{sourceFile?: string, name?: string, description?: string, tags?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startRun(array $args = [])
 * @phpstan-method \Aws\Result startRun(array{
 *     workflowId?: string,
 *     workflowType?: 'PRIVATE'|'READY2RUN',
 *     runId?: string,
 *     roleArn?: string,
 *     name?: string,
 *     cacheId?: string,
 *     cacheBehavior?: 'CACHE_ALWAYS'|'CACHE_ON_FAILURE',
 *     runGroupId?: string,
 *     priority?: int,
 *     parameters?: array,
 *     storageCapacity?: int,
 *     outputUri?: string,
 *     logLevel?: 'ALL'|'ERROR'|'FATAL'|'OFF',
 *     tags?: array<string, string>,
 *     requestId?: string,
 *     retentionMode?: 'REMOVE'|'RETAIN',
 *     storageType?: 'DYNAMIC'|'STATIC',
 *     workflowOwnerId?: string,
 *     workflowVersionName?: string,
 *     networkingMode?: 'RESTRICTED'|'VPC',
 *     scratchStorageMode?: 'LOCAL'|'SHARED',
 *     configurationName?: string,
 *     engineSettings?: array,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRunAsync(array{
 *     workflowId?: string,
 *     workflowType?: 'PRIVATE'|'READY2RUN',
 *     runId?: string,
 *     roleArn?: string,
 *     name?: string,
 *     cacheId?: string,
 *     cacheBehavior?: 'CACHE_ALWAYS'|'CACHE_ON_FAILURE',
 *     runGroupId?: string,
 *     priority?: int,
 *     parameters?: array,
 *     storageCapacity?: int,
 *     outputUri?: string,
 *     logLevel?: 'ALL'|'ERROR'|'FATAL'|'OFF',
 *     tags?: array<string, string>,
 *     requestId?: string,
 *     retentionMode?: 'REMOVE'|'RETAIN',
 *     storageType?: 'DYNAMIC'|'STATIC',
 *     workflowOwnerId?: string,
 *     workflowVersionName?: string,
 *     networkingMode?: 'RESTRICTED'|'VPC',
 *     scratchStorageMode?: 'LOCAL'|'SHARED',
 *     configurationName?: string,
 *     engineSettings?: array,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startRunBatch(array $args = [])
 * @phpstan-method \Aws\Result startRunBatch(array{
 *     batchName?: string,
 *     requestId?: string,
 *     tags?: array<string, string>,
 *     defaultRunSetting?: array{
 *         workflowId?: string,
 *         workflowType?: 'PRIVATE'|'READY2RUN',
 *         roleArn?: string,
 *         name?: string,
 *         cacheId?: string,
 *         cacheBehavior?: 'CACHE_ALWAYS'|'CACHE_ON_FAILURE',
 *         runGroupId?: string,
 *         priority?: int,
 *         parameters?: array,
 *         storageCapacity?: int,
 *         outputUri?: string,
 *         logLevel?: 'ALL'|'ERROR'|'FATAL'|'OFF',
 *         runTags?: array<string, string>,
 *         retentionMode?: 'REMOVE'|'RETAIN',
 *         storageType?: 'DYNAMIC'|'STATIC',
 *         workflowOwnerId?: string,
 *         outputBucketOwnerId?: string,
 *         workflowVersionName?: string,
 *         networkingMode?: 'RESTRICTED'|'VPC',
 *         configurationName?: string,
 *         engineSettings?: array,
 *         scratchStorageMode?: 'LOCAL'|'SHARED',
 *         ...,
 *     },
 *     batchRunSettings?: array{inlineSettings?: list<array>, s3UriSettings?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startRunBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRunBatchAsync(array{
 *     batchName?: string,
 *     requestId?: string,
 *     tags?: array<string, string>,
 *     defaultRunSetting?: array{
 *         workflowId?: string,
 *         workflowType?: 'PRIVATE'|'READY2RUN',
 *         roleArn?: string,
 *         name?: string,
 *         cacheId?: string,
 *         cacheBehavior?: 'CACHE_ALWAYS'|'CACHE_ON_FAILURE',
 *         runGroupId?: string,
 *         priority?: int,
 *         parameters?: array,
 *         storageCapacity?: int,
 *         outputUri?: string,
 *         logLevel?: 'ALL'|'ERROR'|'FATAL'|'OFF',
 *         runTags?: array<string, string>,
 *         retentionMode?: 'REMOVE'|'RETAIN',
 *         storageType?: 'DYNAMIC'|'STATIC',
 *         workflowOwnerId?: string,
 *         outputBucketOwnerId?: string,
 *         workflowVersionName?: string,
 *         networkingMode?: 'RESTRICTED'|'VPC',
 *         configurationName?: string,
 *         engineSettings?: array,
 *         scratchStorageMode?: 'LOCAL'|'SHARED',
 *         ...,
 *     },
 *     batchRunSettings?: array{inlineSettings?: list<array>, s3UriSettings?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startVariantImportJob(array $args = [])
 * @phpstan-method \Aws\Result startVariantImportJob(array{
 *     destinationName?: string,
 *     roleArn?: string,
 *     items?: list<array{source?: string, ...}>,
 *     runLeftNormalization?: bool,
 *     annotationFields?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startVariantImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startVariantImportJobAsync(array{
 *     destinationName?: string,
 *     roleArn?: string,
 *     items?: list<array{source?: string, ...}>,
 *     runLeftNormalization?: bool,
 *     annotationFields?: array<string, string>,
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
 * @method \Aws\Result updateAnnotationStore(array $args = [])
 * @phpstan-method \Aws\Result updateAnnotationStore(array{name?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnnotationStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnnotationStoreAsync(array{name?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateAnnotationStoreVersion(array $args = [])
 * @phpstan-method \Aws\Result updateAnnotationStoreVersion(array{name?: string, versionName?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnnotationStoreVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnnotationStoreVersionAsync(array{name?: string, versionName?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateRunCache(array $args = [])
 * @phpstan-method \Aws\Result updateRunCache(array{
 *     cacheBehavior?: 'CACHE_ALWAYS'|'CACHE_ON_FAILURE',
 *     description?: string,
 *     id?: string,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRunCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRunCacheAsync(array{
 *     cacheBehavior?: 'CACHE_ALWAYS'|'CACHE_ON_FAILURE',
 *     description?: string,
 *     id?: string,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRunGroup(array $args = [])
 * @phpstan-method \Aws\Result updateRunGroup(array{id?: string, name?: string, maxCpus?: int, maxRuns?: int, maxDuration?: int, maxGpus?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRunGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRunGroupAsync(array{id?: string, name?: string, maxCpus?: int, maxRuns?: int, maxDuration?: int, maxGpus?: int, ...} $args = [])
 * @method \Aws\Result updateSequenceStore(array $args = [])
 * @phpstan-method \Aws\Result updateSequenceStore(array{
 *     id?: string,
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     fallbackLocation?: string,
 *     propagatedSetLevelTags?: list<string>,
 *     s3AccessConfig?: array{accessLogLocation?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSequenceStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSequenceStoreAsync(array{
 *     id?: string,
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     fallbackLocation?: string,
 *     propagatedSetLevelTags?: list<string>,
 *     s3AccessConfig?: array{accessLogLocation?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVariantStore(array $args = [])
 * @phpstan-method \Aws\Result updateVariantStore(array{name?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVariantStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVariantStoreAsync(array{name?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateWorkflow(array $args = [])
 * @phpstan-method \Aws\Result updateWorkflow(array{
 *     id?: string,
 *     name?: string,
 *     description?: string,
 *     storageType?: 'DYNAMIC'|'STATIC',
 *     storageCapacity?: int,
 *     readmeMarkdown?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkflowAsync(array{
 *     id?: string,
 *     name?: string,
 *     description?: string,
 *     storageType?: 'DYNAMIC'|'STATIC',
 *     storageCapacity?: int,
 *     readmeMarkdown?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkflowVersion(array $args = [])
 * @phpstan-method \Aws\Result updateWorkflowVersion(array{
 *     workflowId?: string,
 *     versionName?: string,
 *     description?: string,
 *     storageType?: 'DYNAMIC'|'STATIC',
 *     storageCapacity?: int,
 *     readmeMarkdown?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkflowVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkflowVersionAsync(array{
 *     workflowId?: string,
 *     versionName?: string,
 *     description?: string,
 *     storageType?: 'DYNAMIC'|'STATIC',
 *     storageCapacity?: int,
 *     readmeMarkdown?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result uploadReadSetPart(array $args = [])
 * @phpstan-method \Aws\Result uploadReadSetPart(array{
 *     sequenceStoreId?: string,
 *     uploadId?: string,
 *     partSource?: 'SOURCE1'|'SOURCE2',
 *     partNumber?: int,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadReadSetPartAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadReadSetPartAsync(array{
 *     sequenceStoreId?: string,
 *     uploadId?: string,
 *     partSource?: 'SOURCE1'|'SOURCE2',
 *     partNumber?: int,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 */
class OmicsClient extends AwsClient {}
