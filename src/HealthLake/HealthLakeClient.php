<?php
namespace Aws\HealthLake;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon HealthLake** service.
 * @method \Aws\Result createDataTransformationProfile(array $args = [])
 * @phpstan-method \Aws\Result createDataTransformationProfile(array{
 *     SourceFormat?: 'CCDA'|'CSV',
 *     Source?: array{
 *         StarterProfile?: array{StarterProfileName?: string, ...},
 *         ExistingVersionedProfileId?: array{ProfileId?: string, Version?: int, ...},
 *         ProfileMapping?: array{ProfileMapping?: array<string, string>, ...},
 *         SampleData?: array{S3Uri?: string, ...},
 *         ...,
 *     },
 *     KmsKeyId?: string,
 *     ProfileDescription?: string,
 *     ProfileName?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataTransformationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataTransformationProfileAsync(array{
 *     SourceFormat?: 'CCDA'|'CSV',
 *     Source?: array{
 *         StarterProfile?: array{StarterProfileName?: string, ...},
 *         ExistingVersionedProfileId?: array{ProfileId?: string, Version?: int, ...},
 *         ProfileMapping?: array{ProfileMapping?: array<string, string>, ...},
 *         SampleData?: array{S3Uri?: string, ...},
 *         ...,
 *     },
 *     KmsKeyId?: string,
 *     ProfileDescription?: string,
 *     ProfileName?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFHIRDatastore(array $args = [])
 * @phpstan-method \Aws\Result createFHIRDatastore(array{
 *     DatastoreName?: string,
 *     DatastoreTypeVersion?: 'R4',
 *     SseConfiguration?: array{
 *         KmsEncryptionConfig?: array{CmkType?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KMS_KEY', KmsKeyId?: string, ...},
 *         ...,
 *     },
 *     PreloadDataConfig?: array{PreloadDataType?: 'SYNTHEA', ...},
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IdentityProviderConfiguration?: array{
 *         AuthorizationStrategy?: 'AWS_AUTH'|'SMART_ON_FHIR'|'SMART_ON_FHIR_V1',
 *         FineGrainedAuthorizationEnabled?: bool,
 *         Metadata?: string,
 *         IdpLambdaArn?: string,
 *         ...,
 *     },
 *     AnalyticsConfiguration?: array{Status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING'|'PAUSED'|'PAUSING', ...},
 *     NlpConfiguration?: array{Status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING', ...},
 *     ProfileConfiguration?: array{DefaultProfiles?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFHIRDatastoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFHIRDatastoreAsync(array{
 *     DatastoreName?: string,
 *     DatastoreTypeVersion?: 'R4',
 *     SseConfiguration?: array{
 *         KmsEncryptionConfig?: array{CmkType?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KMS_KEY', KmsKeyId?: string, ...},
 *         ...,
 *     },
 *     PreloadDataConfig?: array{PreloadDataType?: 'SYNTHEA', ...},
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IdentityProviderConfiguration?: array{
 *         AuthorizationStrategy?: 'AWS_AUTH'|'SMART_ON_FHIR'|'SMART_ON_FHIR_V1',
 *         FineGrainedAuthorizationEnabled?: bool,
 *         Metadata?: string,
 *         IdpLambdaArn?: string,
 *         ...,
 *     },
 *     AnalyticsConfiguration?: array{Status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING'|'PAUSED'|'PAUSING', ...},
 *     NlpConfiguration?: array{Status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING', ...},
 *     ProfileConfiguration?: array{DefaultProfiles?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDataTransformationProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteDataTransformationProfile(array{ProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataTransformationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataTransformationProfileAsync(array{ProfileId?: string, ...} $args = [])
 * @method \Aws\Result deleteFHIRDatastore(array $args = [])
 * @phpstan-method \Aws\Result deleteFHIRDatastore(array{DatastoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFHIRDatastoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFHIRDatastoreAsync(array{DatastoreId?: string, ...} $args = [])
 * @method \Aws\Result describeDataTransformationJob(array $args = [])
 * @phpstan-method \Aws\Result describeDataTransformationJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataTransformationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataTransformationJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeFHIRDatastore(array $args = [])
 * @phpstan-method \Aws\Result describeFHIRDatastore(array{DatastoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFHIRDatastoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFHIRDatastoreAsync(array{DatastoreId?: string, ...} $args = [])
 * @method \Aws\Result describeFHIRExportJob(array $args = [])
 * @phpstan-method \Aws\Result describeFHIRExportJob(array{DatastoreId?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFHIRExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFHIRExportJobAsync(array{DatastoreId?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result describeFHIRImportJob(array $args = [])
 * @phpstan-method \Aws\Result describeFHIRImportJob(array{DatastoreId?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFHIRImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFHIRImportJobAsync(array{DatastoreId?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result getDataTransformationProfile(array $args = [])
 * @phpstan-method \Aws\Result getDataTransformationProfile(array{ProfileId?: string, ProfileVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataTransformationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataTransformationProfileAsync(array{ProfileId?: string, ProfileVersion?: int, ...} $args = [])
 * @method \Aws\Result listDataTransformationJobs(array $args = [])
 * @phpstan-method \Aws\Result listDataTransformationJobs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     JobStatus?: 'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'SUBMITTED',
 *     JobName?: string,
 *     SubmittedAfter?: int|string|\DateTimeInterface,
 *     SubmittedBefore?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataTransformationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataTransformationJobsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     JobStatus?: 'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'SUBMITTED',
 *     JobName?: string,
 *     SubmittedAfter?: int|string|\DateTimeInterface,
 *     SubmittedBefore?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataTransformationProfileVersions(array $args = [])
 * @phpstan-method \Aws\Result listDataTransformationProfileVersions(array{ProfileId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataTransformationProfileVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataTransformationProfileVersionsAsync(array{ProfileId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDataTransformationProfiles(array $args = [])
 * @phpstan-method \Aws\Result listDataTransformationProfiles(array{SourceFormat?: 'CCDA'|'CSV', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataTransformationProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataTransformationProfilesAsync(array{SourceFormat?: 'CCDA'|'CSV', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFHIRDatastores(array $args = [])
 * @phpstan-method \Aws\Result listFHIRDatastores(array{
 *     Filter?: array{
 *         DatastoreName?: string,
 *         DatastoreStatus?: 'ACTIVE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING'|'UPDATE_FAILED'|'UPDATING',
 *         CreatedBefore?: int|string|\DateTimeInterface,
 *         CreatedAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFHIRDatastoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFHIRDatastoresAsync(array{
 *     Filter?: array{
 *         DatastoreName?: string,
 *         DatastoreStatus?: 'ACTIVE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETING'|'UPDATE_FAILED'|'UPDATING',
 *         CreatedBefore?: int|string|\DateTimeInterface,
 *         CreatedAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFHIRExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listFHIRExportJobs(array{
 *     DatastoreId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     JobName?: string,
 *     JobStatus?: 'CANCEL_COMPLETED'|'CANCEL_FAILED'|'CANCEL_IN_PROGRESS'|'CANCEL_SUBMITTED'|'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'SUBMITTED',
 *     SubmittedBefore?: int|string|\DateTimeInterface,
 *     SubmittedAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFHIRExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFHIRExportJobsAsync(array{
 *     DatastoreId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     JobName?: string,
 *     JobStatus?: 'CANCEL_COMPLETED'|'CANCEL_FAILED'|'CANCEL_IN_PROGRESS'|'CANCEL_SUBMITTED'|'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'SUBMITTED',
 *     SubmittedBefore?: int|string|\DateTimeInterface,
 *     SubmittedAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFHIRImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listFHIRImportJobs(array{
 *     DatastoreId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     JobName?: string,
 *     JobStatus?: 'CANCEL_COMPLETED'|'CANCEL_FAILED'|'CANCEL_IN_PROGRESS'|'CANCEL_SUBMITTED'|'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'SUBMITTED',
 *     SubmittedBefore?: int|string|\DateTimeInterface,
 *     SubmittedAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFHIRImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFHIRImportJobsAsync(array{
 *     DatastoreId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     JobName?: string,
 *     JobStatus?: 'CANCEL_COMPLETED'|'CANCEL_FAILED'|'CANCEL_IN_PROGRESS'|'CANCEL_SUBMITTED'|'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'SUBMITTED',
 *     SubmittedBefore?: int|string|\DateTimeInterface,
 *     SubmittedAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result publishDataTransformationProfile(array $args = [])
 * @phpstan-method \Aws\Result publishDataTransformationProfile(array{
 *     ProfileId?: string,
 *     SourceFormat?: 'CCDA'|'CSV',
 *     FromExistingVersion?: int,
 *     ChangeDescription?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise publishDataTransformationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishDataTransformationProfileAsync(array{
 *     ProfileId?: string,
 *     SourceFormat?: 'CCDA'|'CSV',
 *     FromExistingVersion?: int,
 *     ChangeDescription?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDataTransformationJob(array $args = [])
 * @phpstan-method \Aws\Result startDataTransformationJob(array{
 *     InputDataConfig?: array{S3Uri?: string, SourceFormat?: 'CCDA'|'CSV', ...},
 *     OutputDataConfig?: array{S3Configuration?: array{S3Uri?: string, KmsKeyId?: string, ...}, ...},
 *     DataAccessRoleArn?: string,
 *     ClientToken?: string,
 *     JobName?: string,
 *     ProfileId?: string,
 *     DriftDetectionEnabled?: bool,
 *     ProvenanceEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataTransformationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDataTransformationJobAsync(array{
 *     InputDataConfig?: array{S3Uri?: string, SourceFormat?: 'CCDA'|'CSV', ...},
 *     OutputDataConfig?: array{S3Configuration?: array{S3Uri?: string, KmsKeyId?: string, ...}, ...},
 *     DataAccessRoleArn?: string,
 *     ClientToken?: string,
 *     JobName?: string,
 *     ProfileId?: string,
 *     DriftDetectionEnabled?: bool,
 *     ProvenanceEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startFHIRExportJob(array $args = [])
 * @phpstan-method \Aws\Result startFHIRExportJob(array{
 *     JobName?: string,
 *     OutputDataConfig?: array{S3Configuration?: array{S3Uri?: string, KmsKeyId?: string, ...}, ...},
 *     DatastoreId?: string,
 *     DataAccessRoleArn?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startFHIRExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFHIRExportJobAsync(array{
 *     JobName?: string,
 *     OutputDataConfig?: array{S3Configuration?: array{S3Uri?: string, KmsKeyId?: string, ...}, ...},
 *     DatastoreId?: string,
 *     DataAccessRoleArn?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startFHIRImportJob(array $args = [])
 * @phpstan-method \Aws\Result startFHIRImportJob(array{
 *     JobName?: string,
 *     InputDataConfig?: array{S3Uri?: string, ...},
 *     JobOutputDataConfig?: array{S3Configuration?: array{S3Uri?: string, KmsKeyId?: string, ...}, ...},
 *     DatastoreId?: string,
 *     DataAccessRoleArn?: string,
 *     ClientToken?: string,
 *     ValidationLevel?: 'minimal'|'strict'|'structure-only',
 *     ProfileId?: string,
 *     InputFormat?: string,
 *     DriftDetectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startFHIRImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFHIRImportJobAsync(array{
 *     JobName?: string,
 *     InputDataConfig?: array{S3Uri?: string, ...},
 *     JobOutputDataConfig?: array{S3Configuration?: array{S3Uri?: string, KmsKeyId?: string, ...}, ...},
 *     DatastoreId?: string,
 *     DataAccessRoleArn?: string,
 *     ClientToken?: string,
 *     ValidationLevel?: 'minimal'|'strict'|'structure-only',
 *     ProfileId?: string,
 *     InputFormat?: string,
 *     DriftDetectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDataTransformationProfile(array $args = [])
 * @phpstan-method \Aws\Result updateDataTransformationProfile(array{ProfileId?: string, ProfileMapping?: array<string, string>, ChangeDescription?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataTransformationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataTransformationProfileAsync(array{ProfileId?: string, ProfileMapping?: array<string, string>, ChangeDescription?: string, ...} $args = [])
 * @method \Aws\Result updateFHIRDatastore(array $args = [])
 * @phpstan-method \Aws\Result updateFHIRDatastore(array{
 *     DatastoreId?: string,
 *     DatastoreName?: string,
 *     AnalyticsConfiguration?: array{Status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING'|'PAUSED'|'PAUSING', ...},
 *     NlpConfiguration?: array{Status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING', ...},
 *     ProfileConfiguration?: array{DefaultProfiles?: list<string>, ...},
 *     IdentityProviderConfiguration?: array{
 *         AuthorizationStrategy?: 'AWS_AUTH'|'SMART_ON_FHIR'|'SMART_ON_FHIR_V1',
 *         FineGrainedAuthorizationEnabled?: bool,
 *         Metadata?: string,
 *         IdpLambdaArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFHIRDatastoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFHIRDatastoreAsync(array{
 *     DatastoreId?: string,
 *     DatastoreName?: string,
 *     AnalyticsConfiguration?: array{Status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING'|'PAUSED'|'PAUSING', ...},
 *     NlpConfiguration?: array{Status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING', ...},
 *     ProfileConfiguration?: array{DefaultProfiles?: list<string>, ...},
 *     IdentityProviderConfiguration?: array{
 *         AuthorizationStrategy?: 'AWS_AUTH'|'SMART_ON_FHIR'|'SMART_ON_FHIR_V1',
 *         FineGrainedAuthorizationEnabled?: bool,
 *         Metadata?: string,
 *         IdpLambdaArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProfileWithAgent(array $args = [])
 * @phpstan-method \Aws\Result updateProfileWithAgent(array{
 *     ProfileId?: string,
 *     SourceFormat?: 'CCDA'|'CSV',
 *     InputMessage?: array{Body?: string, Type?: 'confirmation_response'|'normal', ...},
 *     ConversationId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProfileWithAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProfileWithAgentAsync(array{
 *     ProfileId?: string,
 *     SourceFormat?: 'CCDA'|'CSV',
 *     InputMessage?: array{Body?: string, Type?: 'confirmation_response'|'normal', ...},
 *     ConversationId?: string,
 *     ...,
 * } $args = [])
 */
class HealthLakeClient extends AwsClient {}
