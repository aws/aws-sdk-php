<?php
namespace Aws\MedicalImaging;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Health Imaging** service.
 * @method \Aws\Result copyImageSet(array $args = [])
 * @phpstan-method \Aws\Result copyImageSet(array{
 *     datastoreId?: string,
 *     sourceImageSetId?: string,
 *     copyImageSetInformation?: array{
 *         sourceImageSet?: array{latestVersionId?: string, DICOMCopies?: array, ...},
 *         destinationImageSet?: array{imageSetId?: string, latestVersionId?: string, ...},
 *         ...,
 *     },
 *     force?: bool,
 *     promoteToPrimary?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyImageSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyImageSetAsync(array{
 *     datastoreId?: string,
 *     sourceImageSetId?: string,
 *     copyImageSetInformation?: array{
 *         sourceImageSet?: array{latestVersionId?: string, DICOMCopies?: array, ...},
 *         destinationImageSet?: array{imageSetId?: string, latestVersionId?: string, ...},
 *         ...,
 *     },
 *     force?: bool,
 *     promoteToPrimary?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDatastore(array $args = [])
 * @phpstan-method \Aws\Result createDatastore(array{
 *     datastoreName?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     kmsKeyArn?: string,
 *     lambdaAuthorizerArn?: string,
 *     losslessStorageFormat?: 'HTJ2K'|'JPEG_2000_LOSSLESS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatastoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatastoreAsync(array{
 *     datastoreName?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     kmsKeyArn?: string,
 *     lambdaAuthorizerArn?: string,
 *     losslessStorageFormat?: 'HTJ2K'|'JPEG_2000_LOSSLESS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDatastore(array $args = [])
 * @phpstan-method \Aws\Result deleteDatastore(array{datastoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatastoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatastoreAsync(array{datastoreId?: string, ...} $args = [])
 * @method \Aws\Result deleteImageSet(array $args = [])
 * @phpstan-method \Aws\Result deleteImageSet(array{datastoreId?: string, imageSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImageSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImageSetAsync(array{datastoreId?: string, imageSetId?: string, ...} $args = [])
 * @method \Aws\Result getDICOMImportJob(array $args = [])
 * @phpstan-method \Aws\Result getDICOMImportJob(array{datastoreId?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDICOMImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDICOMImportJobAsync(array{datastoreId?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result getDatastore(array $args = [])
 * @phpstan-method \Aws\Result getDatastore(array{datastoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDatastoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDatastoreAsync(array{datastoreId?: string, ...} $args = [])
 * @method \Aws\Result getImageFrame(array $args = [])
 * @phpstan-method \Aws\Result getImageFrame(array{
 *     datastoreId?: string,
 *     imageSetId?: string,
 *     imageFrameInformation?: array{imageFrameId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getImageFrameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImageFrameAsync(array{
 *     datastoreId?: string,
 *     imageSetId?: string,
 *     imageFrameInformation?: array{imageFrameId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getImageSet(array $args = [])
 * @phpstan-method \Aws\Result getImageSet(array{datastoreId?: string, imageSetId?: string, versionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImageSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImageSetAsync(array{datastoreId?: string, imageSetId?: string, versionId?: string, ...} $args = [])
 * @method \Aws\Result getImageSetMetadata(array $args = [])
 * @phpstan-method \Aws\Result getImageSetMetadata(array{datastoreId?: string, imageSetId?: string, versionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImageSetMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImageSetMetadataAsync(array{datastoreId?: string, imageSetId?: string, versionId?: string, ...} $args = [])
 * @method \Aws\Result listDICOMImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listDICOMImportJobs(array{
 *     datastoreId?: string,
 *     jobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDICOMImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDICOMImportJobsAsync(array{
 *     datastoreId?: string,
 *     jobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDatastores(array $args = [])
 * @phpstan-method \Aws\Result listDatastores(array{
 *     datastoreStatus?: 'ACTIVE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatastoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatastoresAsync(array{
 *     datastoreStatus?: 'ACTIVE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImageSetVersions(array $args = [])
 * @phpstan-method \Aws\Result listImageSetVersions(array{datastoreId?: string, imageSetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImageSetVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImageSetVersionsAsync(array{datastoreId?: string, imageSetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result searchImageSets(array $args = [])
 * @phpstan-method \Aws\Result searchImageSets(array{
 *     datastoreId?: string,
 *     searchCriteria?: array{
 *         filters?: list<array>,
 *         sort?: array{sortOrder?: 'ASC'|'DESC', sortField?: 'DICOMStudyDateAndTime'|'createdAt'|'updatedAt', ...},
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchImageSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchImageSetsAsync(array{
 *     datastoreId?: string,
 *     searchCriteria?: array{
 *         filters?: list<array>,
 *         sort?: array{sortOrder?: 'ASC'|'DESC', sortField?: 'DICOMStudyDateAndTime'|'createdAt'|'updatedAt', ...},
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDICOMImportJob(array $args = [])
 * @phpstan-method \Aws\Result startDICOMImportJob(array{
 *     jobName?: string,
 *     dataAccessRoleArn?: string,
 *     clientToken?: string,
 *     datastoreId?: string,
 *     inputS3Uri?: string,
 *     outputS3Uri?: string,
 *     inputOwnerAccountId?: string,
 *     importConfiguration?: array{dicomJsonMetadataImportConfiguration?: array{dicomMetadataMappings?: list<array>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDICOMImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDICOMImportJobAsync(array{
 *     jobName?: string,
 *     dataAccessRoleArn?: string,
 *     clientToken?: string,
 *     datastoreId?: string,
 *     inputS3Uri?: string,
 *     outputS3Uri?: string,
 *     inputOwnerAccountId?: string,
 *     importConfiguration?: array{dicomJsonMetadataImportConfiguration?: array{dicomMetadataMappings?: list<array>, ...}, ...},
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
 * @method \Aws\Result updateImageSetMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateImageSetMetadata(array{
 *     datastoreId?: string,
 *     imageSetId?: string,
 *     latestVersionId?: string,
 *     force?: bool,
 *     includeStudyImageSets?: bool,
 *     updateImageSetMetadataUpdates?: array{
 *         DICOMUpdates?: array{
 *             removableAttributes?: string|resource|\Psr\Http\Message\StreamInterface,
 *             updatableAttributes?: string|resource|\Psr\Http\Message\StreamInterface,
 *             ...,
 *         },
 *         revertToVersionId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateImageSetMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateImageSetMetadataAsync(array{
 *     datastoreId?: string,
 *     imageSetId?: string,
 *     latestVersionId?: string,
 *     force?: bool,
 *     includeStudyImageSets?: bool,
 *     updateImageSetMetadataUpdates?: array{
 *         DICOMUpdates?: array{
 *             removableAttributes?: string|resource|\Psr\Http\Message\StreamInterface,
 *             updatableAttributes?: string|resource|\Psr\Http\Message\StreamInterface,
 *             ...,
 *         },
 *         revertToVersionId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class MedicalImagingClient extends AwsClient {}
