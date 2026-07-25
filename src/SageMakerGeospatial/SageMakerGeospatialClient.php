<?php
namespace Aws\SageMakerGeospatial;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker geospatial capabilities** service.
 * @method \Aws\Result deleteEarthObservationJob(array $args = [])
 * @phpstan-method \Aws\Result deleteEarthObservationJob(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEarthObservationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEarthObservationJobAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteVectorEnrichmentJob(array $args = [])
 * @phpstan-method \Aws\Result deleteVectorEnrichmentJob(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVectorEnrichmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVectorEnrichmentJobAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result exportEarthObservationJob(array $args = [])
 * @phpstan-method \Aws\Result exportEarthObservationJob(array{
 *     Arn?: string,
 *     ClientToken?: string,
 *     ExecutionRoleArn?: string,
 *     ExportSourceImages?: bool,
 *     OutputConfig?: array{S3Data?: array{KmsKeyId?: string, S3Uri?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportEarthObservationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportEarthObservationJobAsync(array{
 *     Arn?: string,
 *     ClientToken?: string,
 *     ExecutionRoleArn?: string,
 *     ExportSourceImages?: bool,
 *     OutputConfig?: array{S3Data?: array{KmsKeyId?: string, S3Uri?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result exportVectorEnrichmentJob(array $args = [])
 * @phpstan-method \Aws\Result exportVectorEnrichmentJob(array{
 *     Arn?: string,
 *     ClientToken?: string,
 *     ExecutionRoleArn?: string,
 *     OutputConfig?: array{S3Data?: array{KmsKeyId?: string, S3Uri?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise exportVectorEnrichmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportVectorEnrichmentJobAsync(array{
 *     Arn?: string,
 *     ClientToken?: string,
 *     ExecutionRoleArn?: string,
 *     OutputConfig?: array{S3Data?: array{KmsKeyId?: string, S3Uri?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEarthObservationJob(array $args = [])
 * @phpstan-method \Aws\Result getEarthObservationJob(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEarthObservationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEarthObservationJobAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getRasterDataCollection(array $args = [])
 * @phpstan-method \Aws\Result getRasterDataCollection(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRasterDataCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRasterDataCollectionAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getTile(array $args = [])
 * @phpstan-method \Aws\Result getTile(array{
 *     Arn?: string,
 *     ExecutionRoleArn?: string,
 *     ImageAssets?: list<string>,
 *     ImageMask?: bool,
 *     OutputDataType?: 'FLOAT32'|'FLOAT64'|'INT16'|'INT32'|'UINT16',
 *     OutputFormat?: string,
 *     PropertyFilters?: string,
 *     Target?: 'INPUT'|'OUTPUT',
 *     TimeRangeFilter?: string,
 *     x?: int,
 *     y?: int,
 *     z?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTileAsync(array{
 *     Arn?: string,
 *     ExecutionRoleArn?: string,
 *     ImageAssets?: list<string>,
 *     ImageMask?: bool,
 *     OutputDataType?: 'FLOAT32'|'FLOAT64'|'INT16'|'INT32'|'UINT16',
 *     OutputFormat?: string,
 *     PropertyFilters?: string,
 *     Target?: 'INPUT'|'OUTPUT',
 *     TimeRangeFilter?: string,
 *     x?: int,
 *     y?: int,
 *     z?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getVectorEnrichmentJob(array $args = [])
 * @phpstan-method \Aws\Result getVectorEnrichmentJob(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVectorEnrichmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVectorEnrichmentJobAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result listEarthObservationJobs(array $args = [])
 * @phpstan-method \Aws\Result listEarthObservationJobs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     StatusEquals?: 'COMPLETED'|'DELETED'|'DELETING'|'FAILED'|'INITIALIZING'|'IN_PROGRESS'|'STOPPED'|'STOPPING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEarthObservationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEarthObservationJobsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     StatusEquals?: 'COMPLETED'|'DELETED'|'DELETING'|'FAILED'|'INITIALIZING'|'IN_PROGRESS'|'STOPPED'|'STOPPING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRasterDataCollections(array $args = [])
 * @phpstan-method \Aws\Result listRasterDataCollections(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRasterDataCollectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRasterDataCollectionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVectorEnrichmentJobs(array $args = [])
 * @phpstan-method \Aws\Result listVectorEnrichmentJobs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     StatusEquals?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVectorEnrichmentJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVectorEnrichmentJobsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     StatusEquals?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchRasterDataCollection(array $args = [])
 * @phpstan-method \Aws\Result searchRasterDataCollection(array{
 *     Arn?: string,
 *     NextToken?: string,
 *     RasterDataCollectionQuery?: array{
 *         AreaOfInterest?: array{AreaOfInterestGeometry?: array, ...},
 *         BandFilter?: list<string>,
 *         PropertyFilters?: array{LogicalOperator?: 'AND', Properties?: list<array>, ...},
 *         TimeRangeFilter?: array{EndTime?: int|string|\DateTimeInterface, StartTime?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchRasterDataCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchRasterDataCollectionAsync(array{
 *     Arn?: string,
 *     NextToken?: string,
 *     RasterDataCollectionQuery?: array{
 *         AreaOfInterest?: array{AreaOfInterestGeometry?: array, ...},
 *         BandFilter?: list<string>,
 *         PropertyFilters?: array{LogicalOperator?: 'AND', Properties?: list<array>, ...},
 *         TimeRangeFilter?: array{EndTime?: int|string|\DateTimeInterface, StartTime?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startEarthObservationJob(array $args = [])
 * @phpstan-method \Aws\Result startEarthObservationJob(array{
 *     ClientToken?: string,
 *     ExecutionRoleArn?: string,
 *     InputConfig?: array{
 *         PreviousEarthObservationJobArn?: string,
 *         RasterDataCollectionQuery?: array{
 *             AreaOfInterest?: array,
 *             PropertyFilters?: array,
 *             RasterDataCollectionArn?: string,
 *             TimeRangeFilter?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     JobConfig?: array{
 *         BandMathConfig?: array{CustomIndices?: array, PredefinedIndices?: list<string>, ...},
 *         CloudMaskingConfig?: array,
 *         CloudRemovalConfig?: array{AlgorithmName?: 'INTERPOLATION', InterpolationValue?: string, TargetBands?: list<string>, ...},
 *         GeoMosaicConfig?: array{
 *             AlgorithmName?: 'AVERAGE'|'BILINEAR'|'CUBIC'|'CUBICSPLINE'|'LANCZOS'|'MAX'|'MED'|'MIN'|'MODE'|'NEAR'|'Q1'|'Q3'|'RMS'|'SUM',
 *             TargetBands?: list<string>,
 *             ...,
 *         },
 *         LandCoverSegmentationConfig?: array,
 *         ResamplingConfig?: array{
 *             AlgorithmName?: 'AVERAGE'|'BILINEAR'|'CUBIC'|'CUBICSPLINE'|'LANCZOS'|'MAX'|'MED'|'MIN'|'MODE'|'NEAR'|'Q1'|'Q3'|'RMS'|'SUM',
 *             OutputResolution?: array,
 *             TargetBands?: list<string>,
 *             ...,
 *         },
 *         StackConfig?: array{OutputResolution?: array, TargetBands?: list<string>, ...},
 *         TemporalStatisticsConfig?: array{
 *             GroupBy?: 'ALL'|'YEARLY',
 *             Statistics?: list<'MEAN'|'MEDIAN'|'STANDARD_DEVIATION'>,
 *             TargetBands?: list<string>,
 *             ...,
 *         },
 *         ZonalStatisticsConfig?: array{
 *             Statistics?: list<'MAX'|'MEAN'|'MEDIAN'|'MIN'|'STANDARD_DEVIATION'|'SUM'>,
 *             TargetBands?: list<string>,
 *             ZoneS3Path?: string,
 *             ZoneS3PathKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     KmsKeyId?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startEarthObservationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEarthObservationJobAsync(array{
 *     ClientToken?: string,
 *     ExecutionRoleArn?: string,
 *     InputConfig?: array{
 *         PreviousEarthObservationJobArn?: string,
 *         RasterDataCollectionQuery?: array{
 *             AreaOfInterest?: array,
 *             PropertyFilters?: array,
 *             RasterDataCollectionArn?: string,
 *             TimeRangeFilter?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     JobConfig?: array{
 *         BandMathConfig?: array{CustomIndices?: array, PredefinedIndices?: list<string>, ...},
 *         CloudMaskingConfig?: array,
 *         CloudRemovalConfig?: array{AlgorithmName?: 'INTERPOLATION', InterpolationValue?: string, TargetBands?: list<string>, ...},
 *         GeoMosaicConfig?: array{
 *             AlgorithmName?: 'AVERAGE'|'BILINEAR'|'CUBIC'|'CUBICSPLINE'|'LANCZOS'|'MAX'|'MED'|'MIN'|'MODE'|'NEAR'|'Q1'|'Q3'|'RMS'|'SUM',
 *             TargetBands?: list<string>,
 *             ...,
 *         },
 *         LandCoverSegmentationConfig?: array,
 *         ResamplingConfig?: array{
 *             AlgorithmName?: 'AVERAGE'|'BILINEAR'|'CUBIC'|'CUBICSPLINE'|'LANCZOS'|'MAX'|'MED'|'MIN'|'MODE'|'NEAR'|'Q1'|'Q3'|'RMS'|'SUM',
 *             OutputResolution?: array,
 *             TargetBands?: list<string>,
 *             ...,
 *         },
 *         StackConfig?: array{OutputResolution?: array, TargetBands?: list<string>, ...},
 *         TemporalStatisticsConfig?: array{
 *             GroupBy?: 'ALL'|'YEARLY',
 *             Statistics?: list<'MEAN'|'MEDIAN'|'STANDARD_DEVIATION'>,
 *             TargetBands?: list<string>,
 *             ...,
 *         },
 *         ZonalStatisticsConfig?: array{
 *             Statistics?: list<'MAX'|'MEAN'|'MEDIAN'|'MIN'|'STANDARD_DEVIATION'|'SUM'>,
 *             TargetBands?: list<string>,
 *             ZoneS3Path?: string,
 *             ZoneS3PathKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     KmsKeyId?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startVectorEnrichmentJob(array $args = [])
 * @phpstan-method \Aws\Result startVectorEnrichmentJob(array{
 *     ClientToken?: string,
 *     ExecutionRoleArn?: string,
 *     InputConfig?: array{DataSourceConfig?: array{S3Data?: array, ...}, DocumentType?: 'CSV', ...},
 *     JobConfig?: array{
 *         MapMatchingConfig?: array{
 *             IdAttributeName?: string,
 *             TimestampAttributeName?: string,
 *             XAttributeName?: string,
 *             YAttributeName?: string,
 *             ...,
 *         },
 *         ReverseGeocodingConfig?: array{XAttributeName?: string, YAttributeName?: string, ...},
 *         ...,
 *     },
 *     KmsKeyId?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startVectorEnrichmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startVectorEnrichmentJobAsync(array{
 *     ClientToken?: string,
 *     ExecutionRoleArn?: string,
 *     InputConfig?: array{DataSourceConfig?: array{S3Data?: array, ...}, DocumentType?: 'CSV', ...},
 *     JobConfig?: array{
 *         MapMatchingConfig?: array{
 *             IdAttributeName?: string,
 *             TimestampAttributeName?: string,
 *             XAttributeName?: string,
 *             YAttributeName?: string,
 *             ...,
 *         },
 *         ReverseGeocodingConfig?: array{XAttributeName?: string, YAttributeName?: string, ...},
 *         ...,
 *     },
 *     KmsKeyId?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopEarthObservationJob(array $args = [])
 * @phpstan-method \Aws\Result stopEarthObservationJob(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEarthObservationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopEarthObservationJobAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result stopVectorEnrichmentJob(array $args = [])
 * @phpstan-method \Aws\Result stopVectorEnrichmentJob(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopVectorEnrichmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopVectorEnrichmentJobAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 */
class SageMakerGeospatialClient extends AwsClient {}
