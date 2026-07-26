<?php
namespace Aws\ComprehendMedical;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Comprehend Medical** service.
 * @method \Aws\Result describeEntitiesDetectionV2Job(array $args = [])
 * @phpstan-method \Aws\Result describeEntitiesDetectionV2Job(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntitiesDetectionV2JobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEntitiesDetectionV2JobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeICD10CMInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result describeICD10CMInferenceJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeICD10CMInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeICD10CMInferenceJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describePHIDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result describePHIDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePHIDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePHIDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeRxNormInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result describeRxNormInferenceJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRxNormInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRxNormInferenceJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeSNOMEDCTInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result describeSNOMEDCTInferenceJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSNOMEDCTInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSNOMEDCTInferenceJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result detectEntities(array $args = [])
 * @phpstan-method \Aws\Result detectEntities(array{Text?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectEntitiesAsync(array{Text?: string, ...} $args = [])
 * @method \Aws\Result detectEntitiesV2(array $args = [])
 * @phpstan-method \Aws\Result detectEntitiesV2(array{Text?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectEntitiesV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectEntitiesV2Async(array{Text?: string, ...} $args = [])
 * @method \Aws\Result detectPHI(array $args = [])
 * @phpstan-method \Aws\Result detectPHI(array{Text?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectPHIAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectPHIAsync(array{Text?: string, ...} $args = [])
 * @method \Aws\Result inferICD10CM(array $args = [])
 * @phpstan-method \Aws\Result inferICD10CM(array{Text?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise inferICD10CMAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise inferICD10CMAsync(array{Text?: string, ...} $args = [])
 * @method \Aws\Result inferRxNorm(array $args = [])
 * @phpstan-method \Aws\Result inferRxNorm(array{Text?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise inferRxNormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise inferRxNormAsync(array{Text?: string, ...} $args = [])
 * @method \Aws\Result inferSNOMEDCT(array $args = [])
 * @phpstan-method \Aws\Result inferSNOMEDCT(array{Text?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise inferSNOMEDCTAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise inferSNOMEDCTAsync(array{Text?: string, ...} $args = [])
 * @method \Aws\Result listEntitiesDetectionV2Jobs(array $args = [])
 * @phpstan-method \Aws\Result listEntitiesDetectionV2Jobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PARTIAL_SUCCESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitiesDetectionV2JobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntitiesDetectionV2JobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PARTIAL_SUCCESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listICD10CMInferenceJobs(array $args = [])
 * @phpstan-method \Aws\Result listICD10CMInferenceJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PARTIAL_SUCCESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listICD10CMInferenceJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listICD10CMInferenceJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PARTIAL_SUCCESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPHIDetectionJobs(array $args = [])
 * @phpstan-method \Aws\Result listPHIDetectionJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PARTIAL_SUCCESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPHIDetectionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPHIDetectionJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PARTIAL_SUCCESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRxNormInferenceJobs(array $args = [])
 * @phpstan-method \Aws\Result listRxNormInferenceJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PARTIAL_SUCCESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRxNormInferenceJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRxNormInferenceJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PARTIAL_SUCCESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSNOMEDCTInferenceJobs(array $args = [])
 * @phpstan-method \Aws\Result listSNOMEDCTInferenceJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PARTIAL_SUCCESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSNOMEDCTInferenceJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSNOMEDCTInferenceJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PARTIAL_SUCCESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startEntitiesDetectionV2Job(array $args = [])
 * @phpstan-method \Aws\Result startEntitiesDetectionV2Job(array{
 *     InputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     OutputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     KMSKey?: string,
 *     LanguageCode?: 'en',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startEntitiesDetectionV2JobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEntitiesDetectionV2JobAsync(array{
 *     InputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     OutputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     KMSKey?: string,
 *     LanguageCode?: 'en',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startICD10CMInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result startICD10CMInferenceJob(array{
 *     InputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     OutputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     KMSKey?: string,
 *     LanguageCode?: 'en',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startICD10CMInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startICD10CMInferenceJobAsync(array{
 *     InputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     OutputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     KMSKey?: string,
 *     LanguageCode?: 'en',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startPHIDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result startPHIDetectionJob(array{
 *     InputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     OutputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     KMSKey?: string,
 *     LanguageCode?: 'en',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startPHIDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPHIDetectionJobAsync(array{
 *     InputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     OutputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     KMSKey?: string,
 *     LanguageCode?: 'en',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startRxNormInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result startRxNormInferenceJob(array{
 *     InputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     OutputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     KMSKey?: string,
 *     LanguageCode?: 'en',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startRxNormInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRxNormInferenceJobAsync(array{
 *     InputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     OutputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     KMSKey?: string,
 *     LanguageCode?: 'en',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSNOMEDCTInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result startSNOMEDCTInferenceJob(array{
 *     InputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     OutputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     KMSKey?: string,
 *     LanguageCode?: 'en',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSNOMEDCTInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSNOMEDCTInferenceJobAsync(array{
 *     InputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     OutputDataConfig?: array{S3Bucket?: string, S3Key?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     KMSKey?: string,
 *     LanguageCode?: 'en',
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopEntitiesDetectionV2Job(array $args = [])
 * @phpstan-method \Aws\Result stopEntitiesDetectionV2Job(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEntitiesDetectionV2JobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopEntitiesDetectionV2JobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopICD10CMInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result stopICD10CMInferenceJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopICD10CMInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopICD10CMInferenceJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopPHIDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result stopPHIDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopPHIDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopPHIDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopRxNormInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result stopRxNormInferenceJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRxNormInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopRxNormInferenceJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopSNOMEDCTInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result stopSNOMEDCTInferenceJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSNOMEDCTInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopSNOMEDCTInferenceJobAsync(array{JobId?: string, ...} $args = [])
 */
class ComprehendMedicalClient extends AwsClient {}
