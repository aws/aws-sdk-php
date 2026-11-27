<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3;

use Aws\Services\S3\Exception\AccessDeniedException;
use Aws\Services\S3\Exception\AnnotationLimitExceededException;
use Aws\Services\S3\Exception\AnnotationNameTooLongException;
use Aws\Services\S3\Exception\BucketAlreadyExistsException;
use Aws\Services\S3\Exception\BucketAlreadyOwnedByYouException;
use Aws\Services\S3\Exception\EncryptionTypeMismatchException;
use Aws\Services\S3\Exception\IdempotencyParameterMismatchException;
use Aws\Services\S3\Exception\InvalidAnnotationNameException;
use Aws\Services\S3\Exception\InvalidObjectStateException;
use Aws\Services\S3\Exception\InvalidPrefixException;
use Aws\Services\S3\Exception\InvalidRequestException;
use Aws\Services\S3\Exception\InvalidWriteOffsetException;
use Aws\Services\S3\Exception\NoSuchAnnotationException;
use Aws\Services\S3\Exception\NoSuchBucketException;
use Aws\Services\S3\Exception\NoSuchKeyException;
use Aws\Services\S3\Exception\NoSuchUploadException;
use Aws\Services\S3\Exception\NotFoundException;
use Aws\Services\S3\Exception\ObjectAlreadyInActiveTierErrorException;
use Aws\Services\S3\Exception\ObjectNotInActiveTierErrorException;
use Aws\Services\S3\Exception\TooManyPartsException;
use Aws\Services\S3\Exception\UnsupportedMediaTypeException;
use Aws\Services\S3\Input\AbortMultipartUploadRequest;
use Aws\Services\S3\Input\CompleteMultipartUploadRequest;
use Aws\Services\S3\Input\CopyObjectRequest;
use Aws\Services\S3\Input\CreateBucketMetadataConfigurationRequest;
use Aws\Services\S3\Input\CreateBucketMetadataTableConfigurationRequest;
use Aws\Services\S3\Input\CreateBucketRequest;
use Aws\Services\S3\Input\CreateMultipartUploadRequest;
use Aws\Services\S3\Input\CreateSessionRequest;
use Aws\Services\S3\Input\DeleteBucketAnalyticsConfigurationRequest;
use Aws\Services\S3\Input\DeleteBucketCorsRequest;
use Aws\Services\S3\Input\DeleteBucketEncryptionRequest;
use Aws\Services\S3\Input\DeleteBucketIntelligentTieringConfigurationRequest;
use Aws\Services\S3\Input\DeleteBucketInventoryConfigurationRequest;
use Aws\Services\S3\Input\DeleteBucketLifecycleRequest;
use Aws\Services\S3\Input\DeleteBucketMetadataConfigurationRequest;
use Aws\Services\S3\Input\DeleteBucketMetadataTableConfigurationRequest;
use Aws\Services\S3\Input\DeleteBucketMetricsConfigurationRequest;
use Aws\Services\S3\Input\DeleteBucketOwnershipControlsRequest;
use Aws\Services\S3\Input\DeleteBucketPolicyRequest;
use Aws\Services\S3\Input\DeleteBucketReplicationRequest;
use Aws\Services\S3\Input\DeleteBucketRequest;
use Aws\Services\S3\Input\DeleteBucketTaggingRequest;
use Aws\Services\S3\Input\DeleteBucketWebsiteRequest;
use Aws\Services\S3\Input\DeleteObjectAnnotationRequest;
use Aws\Services\S3\Input\DeleteObjectRequest;
use Aws\Services\S3\Input\DeleteObjectTaggingRequest;
use Aws\Services\S3\Input\DeleteObjectsRequest;
use Aws\Services\S3\Input\DeletePublicAccessBlockRequest;
use Aws\Services\S3\Input\GetBucketAbacRequest;
use Aws\Services\S3\Input\GetBucketAccelerateConfigurationRequest;
use Aws\Services\S3\Input\GetBucketAclRequest;
use Aws\Services\S3\Input\GetBucketAnalyticsConfigurationRequest;
use Aws\Services\S3\Input\GetBucketCorsRequest;
use Aws\Services\S3\Input\GetBucketEncryptionRequest;
use Aws\Services\S3\Input\GetBucketIntelligentTieringConfigurationRequest;
use Aws\Services\S3\Input\GetBucketInventoryConfigurationRequest;
use Aws\Services\S3\Input\GetBucketLifecycleConfigurationRequest;
use Aws\Services\S3\Input\GetBucketLocationRequest;
use Aws\Services\S3\Input\GetBucketLoggingRequest;
use Aws\Services\S3\Input\GetBucketMetadataConfigurationRequest;
use Aws\Services\S3\Input\GetBucketMetadataTableConfigurationRequest;
use Aws\Services\S3\Input\GetBucketMetricsConfigurationRequest;
use Aws\Services\S3\Input\GetBucketNotificationConfigurationRequest;
use Aws\Services\S3\Input\GetBucketOwnershipControlsRequest;
use Aws\Services\S3\Input\GetBucketPolicyRequest;
use Aws\Services\S3\Input\GetBucketPolicyStatusRequest;
use Aws\Services\S3\Input\GetBucketReplicationRequest;
use Aws\Services\S3\Input\GetBucketRequestPaymentRequest;
use Aws\Services\S3\Input\GetBucketTaggingRequest;
use Aws\Services\S3\Input\GetBucketVersioningRequest;
use Aws\Services\S3\Input\GetBucketWebsiteRequest;
use Aws\Services\S3\Input\GetObjectAclRequest;
use Aws\Services\S3\Input\GetObjectAnnotationRequest;
use Aws\Services\S3\Input\GetObjectAttributesRequest;
use Aws\Services\S3\Input\GetObjectLegalHoldRequest;
use Aws\Services\S3\Input\GetObjectLockConfigurationRequest;
use Aws\Services\S3\Input\GetObjectRequest;
use Aws\Services\S3\Input\GetObjectRetentionRequest;
use Aws\Services\S3\Input\GetObjectTaggingRequest;
use Aws\Services\S3\Input\GetObjectTorrentRequest;
use Aws\Services\S3\Input\GetPublicAccessBlockRequest;
use Aws\Services\S3\Input\HeadBucketRequest;
use Aws\Services\S3\Input\HeadObjectRequest;
use Aws\Services\S3\Input\ListBucketAnalyticsConfigurationsRequest;
use Aws\Services\S3\Input\ListBucketIntelligentTieringConfigurationsRequest;
use Aws\Services\S3\Input\ListBucketInventoryConfigurationsRequest;
use Aws\Services\S3\Input\ListBucketMetricsConfigurationsRequest;
use Aws\Services\S3\Input\ListBucketsRequest;
use Aws\Services\S3\Input\ListDirectoryBucketsRequest;
use Aws\Services\S3\Input\ListMultipartUploadsRequest;
use Aws\Services\S3\Input\ListObjectAnnotationsRequest;
use Aws\Services\S3\Input\ListObjectVersionsRequest;
use Aws\Services\S3\Input\ListObjectsRequest;
use Aws\Services\S3\Input\ListObjectsV2Request;
use Aws\Services\S3\Input\ListPartsRequest;
use Aws\Services\S3\Input\PutBucketAbacRequest;
use Aws\Services\S3\Input\PutBucketAccelerateConfigurationRequest;
use Aws\Services\S3\Input\PutBucketAclRequest;
use Aws\Services\S3\Input\PutBucketAnalyticsConfigurationRequest;
use Aws\Services\S3\Input\PutBucketCorsRequest;
use Aws\Services\S3\Input\PutBucketEncryptionRequest;
use Aws\Services\S3\Input\PutBucketIntelligentTieringConfigurationRequest;
use Aws\Services\S3\Input\PutBucketInventoryConfigurationRequest;
use Aws\Services\S3\Input\PutBucketLifecycleConfigurationRequest;
use Aws\Services\S3\Input\PutBucketLoggingRequest;
use Aws\Services\S3\Input\PutBucketMetricsConfigurationRequest;
use Aws\Services\S3\Input\PutBucketNotificationConfigurationRequest;
use Aws\Services\S3\Input\PutBucketOwnershipControlsRequest;
use Aws\Services\S3\Input\PutBucketPolicyRequest;
use Aws\Services\S3\Input\PutBucketReplicationRequest;
use Aws\Services\S3\Input\PutBucketRequestPaymentRequest;
use Aws\Services\S3\Input\PutBucketTaggingRequest;
use Aws\Services\S3\Input\PutBucketVersioningRequest;
use Aws\Services\S3\Input\PutBucketWebsiteRequest;
use Aws\Services\S3\Input\PutObjectAclRequest;
use Aws\Services\S3\Input\PutObjectAnnotationRequest;
use Aws\Services\S3\Input\PutObjectLegalHoldRequest;
use Aws\Services\S3\Input\PutObjectLockConfigurationRequest;
use Aws\Services\S3\Input\PutObjectRequest;
use Aws\Services\S3\Input\PutObjectRetentionRequest;
use Aws\Services\S3\Input\PutObjectTaggingRequest;
use Aws\Services\S3\Input\PutPublicAccessBlockRequest;
use Aws\Services\S3\Input\RenameObjectRequest;
use Aws\Services\S3\Input\RestoreObjectRequest;
use Aws\Services\S3\Input\SelectObjectContentRequest;
use Aws\Services\S3\Input\UpdateBucketMetadataAnnotationTableConfigurationRequest;
use Aws\Services\S3\Input\UpdateBucketMetadataInventoryTableConfigurationRequest;
use Aws\Services\S3\Input\UpdateBucketMetadataJournalTableConfigurationRequest;
use Aws\Services\S3\Input\UpdateObjectEncryptionRequest;
use Aws\Services\S3\Input\UploadPartCopyRequest;
use Aws\Services\S3\Input\UploadPartRequest;
use Aws\Services\S3\Input\WriteGetObjectResponseRequest;
use Aws\Services\S3\Output\AbortMultipartUploadOutput;
use Aws\Services\S3\Output\CompleteMultipartUploadOutput;
use Aws\Services\S3\Output\CopyObjectOutput;
use Aws\Services\S3\Output\CreateBucketOutput;
use Aws\Services\S3\Output\CreateMultipartUploadOutput;
use Aws\Services\S3\Output\CreateSessionOutput;
use Aws\Services\S3\Output\DeleteObjectAnnotationOutput;
use Aws\Services\S3\Output\DeleteObjectOutput;
use Aws\Services\S3\Output\DeleteObjectTaggingOutput;
use Aws\Services\S3\Output\DeleteObjectsOutput;
use Aws\Services\S3\Output\GetBucketAbacOutput;
use Aws\Services\S3\Output\GetBucketAccelerateConfigurationOutput;
use Aws\Services\S3\Output\GetBucketAclOutput;
use Aws\Services\S3\Output\GetBucketAnalyticsConfigurationOutput;
use Aws\Services\S3\Output\GetBucketCorsOutput;
use Aws\Services\S3\Output\GetBucketEncryptionOutput;
use Aws\Services\S3\Output\GetBucketIntelligentTieringConfigurationOutput;
use Aws\Services\S3\Output\GetBucketInventoryConfigurationOutput;
use Aws\Services\S3\Output\GetBucketLifecycleConfigurationOutput;
use Aws\Services\S3\Output\GetBucketLocationOutput;
use Aws\Services\S3\Output\GetBucketLoggingOutput;
use Aws\Services\S3\Output\GetBucketMetadataConfigurationOutput;
use Aws\Services\S3\Output\GetBucketMetadataTableConfigurationOutput;
use Aws\Services\S3\Output\GetBucketMetricsConfigurationOutput;
use Aws\Services\S3\Output\GetBucketOwnershipControlsOutput;
use Aws\Services\S3\Output\GetBucketPolicyOutput;
use Aws\Services\S3\Output\GetBucketPolicyStatusOutput;
use Aws\Services\S3\Output\GetBucketReplicationOutput;
use Aws\Services\S3\Output\GetBucketRequestPaymentOutput;
use Aws\Services\S3\Output\GetBucketTaggingOutput;
use Aws\Services\S3\Output\GetBucketVersioningOutput;
use Aws\Services\S3\Output\GetBucketWebsiteOutput;
use Aws\Services\S3\Output\GetObjectAclOutput;
use Aws\Services\S3\Output\GetObjectAnnotationOutput;
use Aws\Services\S3\Output\GetObjectAttributesOutput;
use Aws\Services\S3\Output\GetObjectLegalHoldOutput;
use Aws\Services\S3\Output\GetObjectLockConfigurationOutput;
use Aws\Services\S3\Output\GetObjectOutput;
use Aws\Services\S3\Output\GetObjectRetentionOutput;
use Aws\Services\S3\Output\GetObjectTaggingOutput;
use Aws\Services\S3\Output\GetObjectTorrentOutput;
use Aws\Services\S3\Output\GetPublicAccessBlockOutput;
use Aws\Services\S3\Output\HeadBucketOutput;
use Aws\Services\S3\Output\HeadObjectOutput;
use Aws\Services\S3\Output\ListBucketAnalyticsConfigurationsOutput;
use Aws\Services\S3\Output\ListBucketIntelligentTieringConfigurationsOutput;
use Aws\Services\S3\Output\ListBucketInventoryConfigurationsOutput;
use Aws\Services\S3\Output\ListBucketMetricsConfigurationsOutput;
use Aws\Services\S3\Output\ListBucketsOutput;
use Aws\Services\S3\Output\ListDirectoryBucketsOutput;
use Aws\Services\S3\Output\ListMultipartUploadsOutput;
use Aws\Services\S3\Output\ListObjectAnnotationsOutput;
use Aws\Services\S3\Output\ListObjectVersionsOutput;
use Aws\Services\S3\Output\ListObjectsOutput;
use Aws\Services\S3\Output\ListObjectsV2Output;
use Aws\Services\S3\Output\ListPartsOutput;
use Aws\Services\S3\Output\NotificationConfiguration;
use Aws\Services\S3\Output\PutBucketLifecycleConfigurationOutput;
use Aws\Services\S3\Output\PutObjectAclOutput;
use Aws\Services\S3\Output\PutObjectAnnotationOutput;
use Aws\Services\S3\Output\PutObjectLegalHoldOutput;
use Aws\Services\S3\Output\PutObjectLockConfigurationOutput;
use Aws\Services\S3\Output\PutObjectOutput;
use Aws\Services\S3\Output\PutObjectRetentionOutput;
use Aws\Services\S3\Output\PutObjectTaggingOutput;
use Aws\Services\S3\Output\RenameObjectOutput;
use Aws\Services\S3\Output\RestoreObjectOutput;
use Aws\Services\S3\Output\SelectObjectContentOutput;
use Aws\Services\S3\Output\UpdateObjectEncryptionResponse;
use Aws\Services\S3\Output\UploadPartCopyOutput;
use Aws\Services\S3\Output\UploadPartOutput;
use Aws\Services\S3\Shape\AbacStatus;
use Aws\Services\S3\Shape\AbortIncompleteMultipartUpload;
use Aws\Services\S3\Shape\AccelerateConfiguration;
use Aws\Services\S3\Shape\AccessControlPolicy;
use Aws\Services\S3\Shape\AccessControlTranslation;
use Aws\Services\S3\Shape\AnalyticsAndOperator;
use Aws\Services\S3\Shape\AnalyticsConfiguration;
use Aws\Services\S3\Shape\AnalyticsExportDestination;
use Aws\Services\S3\Shape\AnalyticsFilter;
use Aws\Services\S3\Shape\AnalyticsS3BucketDestination;
use Aws\Services\S3\Shape\AnalyticsS3ExportFileFormat;
use Aws\Services\S3\Shape\AnnotationConfigurationState;
use Aws\Services\S3\Shape\AnnotationDirective;
use Aws\Services\S3\Shape\AnnotationEntry;
use Aws\Services\S3\Shape\AnnotationTableConfiguration;
use Aws\Services\S3\Shape\AnnotationTableConfigurationResult;
use Aws\Services\S3\Shape\AnnotationTableConfigurationUpdates;
use Aws\Services\S3\Shape\ArchiveStatus;
use Aws\Services\S3\Shape\BlockedEncryptionTypes;
use Aws\Services\S3\Shape\Bucket;
use Aws\Services\S3\Shape\BucketAbacStatus;
use Aws\Services\S3\Shape\BucketAccelerateStatus;
use Aws\Services\S3\Shape\BucketCannedACL;
use Aws\Services\S3\Shape\BucketInfo;
use Aws\Services\S3\Shape\BucketLifecycleConfiguration;
use Aws\Services\S3\Shape\BucketLocationConstraint;
use Aws\Services\S3\Shape\BucketLoggingStatus;
use Aws\Services\S3\Shape\BucketLogsPermission;
use Aws\Services\S3\Shape\BucketNamespace;
use Aws\Services\S3\Shape\BucketType;
use Aws\Services\S3\Shape\BucketVersioningStatus;
use Aws\Services\S3\Shape\CORSConfiguration;
use Aws\Services\S3\Shape\CORSRule;
use Aws\Services\S3\Shape\CSVInput;
use Aws\Services\S3\Shape\CSVOutput;
use Aws\Services\S3\Shape\Checksum;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\ChecksumMode;
use Aws\Services\S3\Shape\ChecksumType;
use Aws\Services\S3\Shape\CommonPrefix;
use Aws\Services\S3\Shape\CompletedMultipartUpload;
use Aws\Services\S3\Shape\CompletedPart;
use Aws\Services\S3\Shape\CompressionType;
use Aws\Services\S3\Shape\Condition;
use Aws\Services\S3\Shape\ContinuationEvent;
use Aws\Services\S3\Shape\CopyObjectResult;
use Aws\Services\S3\Shape\CopyPartResult;
use Aws\Services\S3\Shape\CreateBucketConfiguration;
use Aws\Services\S3\Shape\DataRedundancy;
use Aws\Services\S3\Shape\DefaultRetention;
use Aws\Services\S3\Shape\Delete;
use Aws\Services\S3\Shape\DeleteMarkerEntry;
use Aws\Services\S3\Shape\DeleteMarkerReplication;
use Aws\Services\S3\Shape\DeleteMarkerReplicationStatus;
use Aws\Services\S3\Shape\DeletedObject;
use Aws\Services\S3\Shape\Destination;
use Aws\Services\S3\Shape\DestinationResult;
use Aws\Services\S3\Shape\EncodingType;
use Aws\Services\S3\Shape\Encryption;
use Aws\Services\S3\Shape\EncryptionConfiguration;
use Aws\Services\S3\Shape\EncryptionType;
use Aws\Services\S3\Shape\EndEvent;
use Aws\Services\S3\Shape\Error;
use Aws\Services\S3\Shape\ErrorDetails;
use Aws\Services\S3\Shape\ErrorDocument;
use Aws\Services\S3\Shape\Event;
use Aws\Services\S3\Shape\EventBridgeConfiguration;
use Aws\Services\S3\Shape\EventHoldDuration;
use Aws\Services\S3\Shape\ExistingObjectReplication;
use Aws\Services\S3\Shape\ExistingObjectReplicationStatus;
use Aws\Services\S3\Shape\ExpirationState;
use Aws\Services\S3\Shape\ExpirationStatus;
use Aws\Services\S3\Shape\ExpressionType;
use Aws\Services\S3\Shape\FileHeaderInfo;
use Aws\Services\S3\Shape\FilterRule;
use Aws\Services\S3\Shape\FilterRuleName;
use Aws\Services\S3\Shape\GetBucketMetadataConfigurationResult;
use Aws\Services\S3\Shape\GetBucketMetadataTableConfigurationResult;
use Aws\Services\S3\Shape\GetObjectAttributesParts;
use Aws\Services\S3\Shape\GlacierJobParameters;
use Aws\Services\S3\Shape\Grant;
use Aws\Services\S3\Shape\Grantee;
use Aws\Services\S3\Shape\IndexDocument;
use Aws\Services\S3\Shape\Initiator;
use Aws\Services\S3\Shape\InputSerialization;
use Aws\Services\S3\Shape\IntelligentTieringAccessTier;
use Aws\Services\S3\Shape\IntelligentTieringAndOperator;
use Aws\Services\S3\Shape\IntelligentTieringConfiguration;
use Aws\Services\S3\Shape\IntelligentTieringFilter;
use Aws\Services\S3\Shape\IntelligentTieringStatus;
use Aws\Services\S3\Shape\InventoryConfiguration;
use Aws\Services\S3\Shape\InventoryConfigurationState;
use Aws\Services\S3\Shape\InventoryDestination;
use Aws\Services\S3\Shape\InventoryEncryption;
use Aws\Services\S3\Shape\InventoryFilter;
use Aws\Services\S3\Shape\InventoryFormat;
use Aws\Services\S3\Shape\InventoryFrequency;
use Aws\Services\S3\Shape\InventoryIncludedObjectVersions;
use Aws\Services\S3\Shape\InventoryOptionalField;
use Aws\Services\S3\Shape\InventoryS3BucketDestination;
use Aws\Services\S3\Shape\InventorySchedule;
use Aws\Services\S3\Shape\InventoryTableConfiguration;
use Aws\Services\S3\Shape\InventoryTableConfigurationResult;
use Aws\Services\S3\Shape\InventoryTableConfigurationUpdates;
use Aws\Services\S3\Shape\JSONInput;
use Aws\Services\S3\Shape\JSONOutput;
use Aws\Services\S3\Shape\JSONType;
use Aws\Services\S3\Shape\JournalTableConfiguration;
use Aws\Services\S3\Shape\JournalTableConfigurationResult;
use Aws\Services\S3\Shape\JournalTableConfigurationUpdates;
use Aws\Services\S3\Shape\LambdaFunctionConfiguration;
use Aws\Services\S3\Shape\LifecycleExpiration;
use Aws\Services\S3\Shape\LifecycleRule;
use Aws\Services\S3\Shape\LifecycleRuleAndOperator;
use Aws\Services\S3\Shape\LifecycleRuleFilter;
use Aws\Services\S3\Shape\LocationInfo;
use Aws\Services\S3\Shape\LocationType;
use Aws\Services\S3\Shape\LoggingEnabled;
use Aws\Services\S3\Shape\MFADelete;
use Aws\Services\S3\Shape\MFADeleteStatus;
use Aws\Services\S3\Shape\MetadataConfiguration;
use Aws\Services\S3\Shape\MetadataConfigurationResult;
use Aws\Services\S3\Shape\MetadataDirective;
use Aws\Services\S3\Shape\MetadataEntry;
use Aws\Services\S3\Shape\MetadataTableConfiguration;
use Aws\Services\S3\Shape\MetadataTableConfigurationResult;
use Aws\Services\S3\Shape\MetadataTableEncryptionConfiguration;
use Aws\Services\S3\Shape\Metrics;
use Aws\Services\S3\Shape\MetricsAndOperator;
use Aws\Services\S3\Shape\MetricsConfiguration;
use Aws\Services\S3\Shape\MetricsFilter;
use Aws\Services\S3\Shape\MetricsStatus;
use Aws\Services\S3\Shape\MultipartUpload;
use Aws\Services\S3\Shape\NoncurrentVersionExpiration;
use Aws\Services\S3\Shape\NoncurrentVersionTransition;
use Aws\Services\S3\Shape\NotificationConfigurationFilter;
use Aws\Services\S3\Shape\ObjectAttributes;
use Aws\Services\S3\Shape\ObjectCannedACL;
use Aws\Services\S3\Shape\ObjectEncryption;
use Aws\Services\S3\Shape\ObjectIdentifier;
use Aws\Services\S3\Shape\ObjectLockConfiguration;
use Aws\Services\S3\Shape\ObjectLockEnabled;
use Aws\Services\S3\Shape\ObjectLockEventHold;
use Aws\Services\S3\Shape\ObjectLockLegalHold;
use Aws\Services\S3\Shape\ObjectLockLegalHoldStatus;
use Aws\Services\S3\Shape\ObjectLockMode;
use Aws\Services\S3\Shape\ObjectLockRetention;
use Aws\Services\S3\Shape\ObjectLockRetentionMode;
use Aws\Services\S3\Shape\ObjectLockRule;
use Aws\Services\S3\Shape\ObjectOwnership;
use Aws\Services\S3\Shape\ObjectPart;
use Aws\Services\S3\Shape\ObjectStorageClass;
use Aws\Services\S3\Shape\ObjectVersion;
use Aws\Services\S3\Shape\ObjectVersionStorageClass;
use Aws\Services\S3\Shape\OptionalObjectAttributes;
use Aws\Services\S3\Shape\OutputLocation;
use Aws\Services\S3\Shape\OutputSerialization;
use Aws\Services\S3\Shape\Owner;
use Aws\Services\S3\Shape\OwnerOverride;
use Aws\Services\S3\Shape\OwnershipControls;
use Aws\Services\S3\Shape\OwnershipControlsRule;
use Aws\Services\S3\Shape\ParquetInput;
use Aws\Services\S3\Shape\Part;
use Aws\Services\S3\Shape\PartitionDateSource;
use Aws\Services\S3\Shape\PartitionedPrefix;
use Aws\Services\S3\Shape\Payer;
use Aws\Services\S3\Shape\Permission;
use Aws\Services\S3\Shape\PolicyStatus;
use Aws\Services\S3\Shape\Progress;
use Aws\Services\S3\Shape\ProgressEvent;
use Aws\Services\S3\Shape\Protocol;
use Aws\Services\S3\Shape\PublicAccessBlockConfiguration;
use Aws\Services\S3\Shape\QueueConfiguration;
use Aws\Services\S3\Shape\QuoteFields;
use Aws\Services\S3\Shape\RecordExpiration;
use Aws\Services\S3\Shape\RecordsEvent;
use Aws\Services\S3\Shape\Redirect;
use Aws\Services\S3\Shape\RedirectAllRequestsTo;
use Aws\Services\S3\Shape\ReplicaModifications;
use Aws\Services\S3\Shape\ReplicaModificationsStatus;
use Aws\Services\S3\Shape\ReplicationConfiguration;
use Aws\Services\S3\Shape\ReplicationRule;
use Aws\Services\S3\Shape\ReplicationRuleAndOperator;
use Aws\Services\S3\Shape\ReplicationRuleFilter;
use Aws\Services\S3\Shape\ReplicationRuleNotOperator;
use Aws\Services\S3\Shape\ReplicationRuleOrOperator;
use Aws\Services\S3\Shape\ReplicationRuleStatus;
use Aws\Services\S3\Shape\ReplicationStatus;
use Aws\Services\S3\Shape\ReplicationTime;
use Aws\Services\S3\Shape\ReplicationTimeStatus;
use Aws\Services\S3\Shape\ReplicationTimeValue;
use Aws\Services\S3\Shape\RequestCharged;
use Aws\Services\S3\Shape\RequestPayer;
use Aws\Services\S3\Shape\RequestPaymentConfiguration;
use Aws\Services\S3\Shape\RequestProgress;
use Aws\Services\S3\Shape\RestoreRequest;
use Aws\Services\S3\Shape\RestoreRequestType;
use Aws\Services\S3\Shape\RestoreStatus;
use Aws\Services\S3\Shape\RoutingRule;
use Aws\Services\S3\Shape\S3KeyFilter;
use Aws\Services\S3\Shape\S3Location;
use Aws\Services\S3\Shape\S3Object;
use Aws\Services\S3\Shape\S3TablesBucketType;
use Aws\Services\S3\Shape\S3TablesDestination;
use Aws\Services\S3\Shape\S3TablesDestinationResult;
use Aws\Services\S3\Shape\SSEKMS;
use Aws\Services\S3\Shape\SSEKMSEncryption;
use Aws\Services\S3\Shape\SSES3;
use Aws\Services\S3\Shape\ScanRange;
use Aws\Services\S3\Shape\SelectObjectContentEventStream;
use Aws\Services\S3\Shape\SelectParameters;
use Aws\Services\S3\Shape\ServerSideEncryption;
use Aws\Services\S3\Shape\ServerSideEncryptionByDefault;
use Aws\Services\S3\Shape\ServerSideEncryptionConfiguration;
use Aws\Services\S3\Shape\ServerSideEncryptionRule;
use Aws\Services\S3\Shape\SessionCredentials;
use Aws\Services\S3\Shape\SessionMode;
use Aws\Services\S3\Shape\SimplePrefix;
use Aws\Services\S3\Shape\SourceSelectionCriteria;
use Aws\Services\S3\Shape\SseKmsEncryptedObjects;
use Aws\Services\S3\Shape\SseKmsEncryptedObjectsStatus;
use Aws\Services\S3\Shape\Stats;
use Aws\Services\S3\Shape\StatsEvent;
use Aws\Services\S3\Shape\StorageClass;
use Aws\Services\S3\Shape\StorageClassAnalysis;
use Aws\Services\S3\Shape\StorageClassAnalysisDataExport;
use Aws\Services\S3\Shape\StorageClassAnalysisSchemaVersion;
use Aws\Services\S3\Shape\TableSseAlgorithm;
use Aws\Services\S3\Shape\Tag;
use Aws\Services\S3\Shape\Tagging;
use Aws\Services\S3\Shape\TaggingDirective;
use Aws\Services\S3\Shape\TargetGrant;
use Aws\Services\S3\Shape\TargetObjectKeyFormat;
use Aws\Services\S3\Shape\Tier;
use Aws\Services\S3\Shape\Tiering;
use Aws\Services\S3\Shape\TopicConfiguration;
use Aws\Services\S3\Shape\Transition;
use Aws\Services\S3\Shape\TransitionDefaultMinimumObjectSize;
use Aws\Services\S3\Shape\TransitionStorageClass;
use Aws\Services\S3\Shape\Type;
use Aws\Services\S3\Shape\UseSourceMultiRegionKey;
use Aws\Services\S3\Shape\UseSourceMultiRegionKeyStatus;
use Aws\Services\S3\Shape\VersioningConfiguration;
use Aws\Services\S3\Shape\WebsiteConfiguration;
use Smithy\Core\Serde\Schema;
use Smithy\Core\Shape\ShapeType;

/**
 * Centralized schema registry for all shapes in this service.
 *
 * Stores Schema objects as lazy public static properties.
 * Each structure has a dedicated member initializer.
 */
final class Schemas
{
    public static Schema $AbacStatus;
    public static Schema $AbortIncompleteMultipartUpload;
    public static Schema $AbortMultipartUploadOutput;
    public static Schema $AbortMultipartUploadRequest;
    public static Schema $AccelerateConfiguration;
    public static Schema $AccessControlPolicy;
    public static Schema $AccessControlTranslation;
    public static Schema $AccessDeniedException;
    public static Schema $AnalyticsAndOperator;
    public static Schema $AnalyticsConfiguration;
    public static Schema $AnalyticsExportDestination;
    public static Schema $AnalyticsS3BucketDestination;
    public static Schema $AnnotationEntry;
    public static Schema $AnnotationLimitExceededException;
    public static Schema $AnnotationNameTooLongException;
    public static Schema $AnnotationTableConfiguration;
    public static Schema $AnnotationTableConfigurationResult;
    public static Schema $AnnotationTableConfigurationUpdates;
    public static Schema $BlockedEncryptionTypes;
    public static Schema $Bucket;
    public static Schema $BucketAlreadyExistsException;
    public static Schema $BucketAlreadyOwnedByYouException;
    public static Schema $BucketInfo;
    public static Schema $BucketLifecycleConfiguration;
    public static Schema $BucketLoggingStatus;
    public static Schema $CORSConfiguration;
    public static Schema $CORSRule;
    public static Schema $CSVInput;
    public static Schema $CSVOutput;
    public static Schema $Checksum;
    public static Schema $CommonPrefix;
    public static Schema $CompleteMultipartUploadOutput;
    public static Schema $CompleteMultipartUploadRequest;
    public static Schema $CompletedMultipartUpload;
    public static Schema $CompletedPart;
    public static Schema $Condition;
    public static Schema $ContinuationEvent;
    public static Schema $CopyObjectOutput;
    public static Schema $CopyObjectRequest;
    public static Schema $CopyObjectResult;
    public static Schema $CopyPartResult;
    public static Schema $CreateBucketConfiguration;
    public static Schema $CreateBucketMetadataConfigurationRequest;
    public static Schema $CreateBucketMetadataTableConfigurationRequest;
    public static Schema $CreateBucketOutput;
    public static Schema $CreateBucketRequest;
    public static Schema $CreateMultipartUploadOutput;
    public static Schema $CreateMultipartUploadRequest;
    public static Schema $CreateSessionOutput;
    public static Schema $CreateSessionRequest;
    public static Schema $DefaultRetention;
    public static Schema $Delete;
    public static Schema $DeleteBucketAnalyticsConfigurationRequest;
    public static Schema $DeleteBucketCorsRequest;
    public static Schema $DeleteBucketEncryptionRequest;
    public static Schema $DeleteBucketIntelligentTieringConfigurationRequest;
    public static Schema $DeleteBucketInventoryConfigurationRequest;
    public static Schema $DeleteBucketLifecycleRequest;
    public static Schema $DeleteBucketMetadataConfigurationRequest;
    public static Schema $DeleteBucketMetadataTableConfigurationRequest;
    public static Schema $DeleteBucketMetricsConfigurationRequest;
    public static Schema $DeleteBucketOwnershipControlsRequest;
    public static Schema $DeleteBucketPolicyRequest;
    public static Schema $DeleteBucketReplicationRequest;
    public static Schema $DeleteBucketRequest;
    public static Schema $DeleteBucketTaggingRequest;
    public static Schema $DeleteBucketWebsiteRequest;
    public static Schema $DeleteMarkerEntry;
    public static Schema $DeleteMarkerReplication;
    public static Schema $DeleteObjectAnnotationOutput;
    public static Schema $DeleteObjectAnnotationRequest;
    public static Schema $DeleteObjectOutput;
    public static Schema $DeleteObjectRequest;
    public static Schema $DeleteObjectTaggingOutput;
    public static Schema $DeleteObjectTaggingRequest;
    public static Schema $DeleteObjectsOutput;
    public static Schema $DeleteObjectsRequest;
    public static Schema $DeletePublicAccessBlockRequest;
    public static Schema $DeletedObject;
    public static Schema $Destination;
    public static Schema $DestinationResult;
    public static Schema $Encryption;
    public static Schema $EncryptionConfiguration;
    public static Schema $EncryptionTypeMismatchException;
    public static Schema $EndEvent;
    public static Schema $Error;
    public static Schema $ErrorDetails;
    public static Schema $ErrorDocument;
    public static Schema $EventBridgeConfiguration;
    public static Schema $EventHoldDuration;
    public static Schema $ExistingObjectReplication;
    public static Schema $FilterRule;
    public static Schema $GetBucketAbacOutput;
    public static Schema $GetBucketAbacRequest;
    public static Schema $GetBucketAccelerateConfigurationOutput;
    public static Schema $GetBucketAccelerateConfigurationRequest;
    public static Schema $GetBucketAclOutput;
    public static Schema $GetBucketAclRequest;
    public static Schema $GetBucketAnalyticsConfigurationOutput;
    public static Schema $GetBucketAnalyticsConfigurationRequest;
    public static Schema $GetBucketCorsOutput;
    public static Schema $GetBucketCorsRequest;
    public static Schema $GetBucketEncryptionOutput;
    public static Schema $GetBucketEncryptionRequest;
    public static Schema $GetBucketIntelligentTieringConfigurationOutput;
    public static Schema $GetBucketIntelligentTieringConfigurationRequest;
    public static Schema $GetBucketInventoryConfigurationOutput;
    public static Schema $GetBucketInventoryConfigurationRequest;
    public static Schema $GetBucketLifecycleConfigurationOutput;
    public static Schema $GetBucketLifecycleConfigurationRequest;
    public static Schema $GetBucketLocationOutput;
    public static Schema $GetBucketLocationRequest;
    public static Schema $GetBucketLoggingOutput;
    public static Schema $GetBucketLoggingRequest;
    public static Schema $GetBucketMetadataConfigurationOutput;
    public static Schema $GetBucketMetadataConfigurationRequest;
    public static Schema $GetBucketMetadataConfigurationResult;
    public static Schema $GetBucketMetadataTableConfigurationOutput;
    public static Schema $GetBucketMetadataTableConfigurationRequest;
    public static Schema $GetBucketMetadataTableConfigurationResult;
    public static Schema $GetBucketMetricsConfigurationOutput;
    public static Schema $GetBucketMetricsConfigurationRequest;
    public static Schema $GetBucketNotificationConfigurationRequest;
    public static Schema $GetBucketOwnershipControlsOutput;
    public static Schema $GetBucketOwnershipControlsRequest;
    public static Schema $GetBucketPolicyOutput;
    public static Schema $GetBucketPolicyRequest;
    public static Schema $GetBucketPolicyStatusOutput;
    public static Schema $GetBucketPolicyStatusRequest;
    public static Schema $GetBucketReplicationOutput;
    public static Schema $GetBucketReplicationRequest;
    public static Schema $GetBucketRequestPaymentOutput;
    public static Schema $GetBucketRequestPaymentRequest;
    public static Schema $GetBucketTaggingOutput;
    public static Schema $GetBucketTaggingRequest;
    public static Schema $GetBucketVersioningOutput;
    public static Schema $GetBucketVersioningRequest;
    public static Schema $GetBucketWebsiteOutput;
    public static Schema $GetBucketWebsiteRequest;
    public static Schema $GetObjectAclOutput;
    public static Schema $GetObjectAclRequest;
    public static Schema $GetObjectAnnotationOutput;
    public static Schema $GetObjectAnnotationRequest;
    public static Schema $GetObjectAttributesOutput;
    public static Schema $GetObjectAttributesParts;
    public static Schema $GetObjectAttributesRequest;
    public static Schema $GetObjectLegalHoldOutput;
    public static Schema $GetObjectLegalHoldRequest;
    public static Schema $GetObjectLockConfigurationOutput;
    public static Schema $GetObjectLockConfigurationRequest;
    public static Schema $GetObjectOutput;
    public static Schema $GetObjectRequest;
    public static Schema $GetObjectRetentionOutput;
    public static Schema $GetObjectRetentionRequest;
    public static Schema $GetObjectTaggingOutput;
    public static Schema $GetObjectTaggingRequest;
    public static Schema $GetObjectTorrentOutput;
    public static Schema $GetObjectTorrentRequest;
    public static Schema $GetPublicAccessBlockOutput;
    public static Schema $GetPublicAccessBlockRequest;
    public static Schema $GlacierJobParameters;
    public static Schema $Grant;
    public static Schema $Grantee;
    public static Schema $HeadBucketOutput;
    public static Schema $HeadBucketRequest;
    public static Schema $HeadObjectOutput;
    public static Schema $HeadObjectRequest;
    public static Schema $IdempotencyParameterMismatchException;
    public static Schema $IndexDocument;
    public static Schema $Initiator;
    public static Schema $InputSerialization;
    public static Schema $IntelligentTieringAndOperator;
    public static Schema $IntelligentTieringConfiguration;
    public static Schema $IntelligentTieringFilter;
    public static Schema $InvalidAnnotationNameException;
    public static Schema $InvalidObjectStateException;
    public static Schema $InvalidPrefixException;
    public static Schema $InvalidRequestException;
    public static Schema $InvalidWriteOffsetException;
    public static Schema $InventoryConfiguration;
    public static Schema $InventoryDestination;
    public static Schema $InventoryEncryption;
    public static Schema $InventoryFilter;
    public static Schema $InventoryS3BucketDestination;
    public static Schema $InventorySchedule;
    public static Schema $InventoryTableConfiguration;
    public static Schema $InventoryTableConfigurationResult;
    public static Schema $InventoryTableConfigurationUpdates;
    public static Schema $JSONInput;
    public static Schema $JSONOutput;
    public static Schema $JournalTableConfiguration;
    public static Schema $JournalTableConfigurationResult;
    public static Schema $JournalTableConfigurationUpdates;
    public static Schema $LambdaFunctionConfiguration;
    public static Schema $LifecycleExpiration;
    public static Schema $LifecycleRule;
    public static Schema $LifecycleRuleAndOperator;
    public static Schema $LifecycleRuleFilter;
    public static Schema $ListBucketAnalyticsConfigurationsOutput;
    public static Schema $ListBucketAnalyticsConfigurationsRequest;
    public static Schema $ListBucketIntelligentTieringConfigurationsOutput;
    public static Schema $ListBucketIntelligentTieringConfigurationsRequest;
    public static Schema $ListBucketInventoryConfigurationsOutput;
    public static Schema $ListBucketInventoryConfigurationsRequest;
    public static Schema $ListBucketMetricsConfigurationsOutput;
    public static Schema $ListBucketMetricsConfigurationsRequest;
    public static Schema $ListBucketsOutput;
    public static Schema $ListBucketsRequest;
    public static Schema $ListDirectoryBucketsOutput;
    public static Schema $ListDirectoryBucketsRequest;
    public static Schema $ListMultipartUploadsOutput;
    public static Schema $ListMultipartUploadsRequest;
    public static Schema $ListObjectAnnotationsOutput;
    public static Schema $ListObjectAnnotationsRequest;
    public static Schema $ListObjectVersionsOutput;
    public static Schema $ListObjectVersionsRequest;
    public static Schema $ListObjectsOutput;
    public static Schema $ListObjectsRequest;
    public static Schema $ListObjectsV2Output;
    public static Schema $ListObjectsV2Request;
    public static Schema $ListPartsOutput;
    public static Schema $ListPartsRequest;
    public static Schema $LocationInfo;
    public static Schema $LoggingEnabled;
    public static Schema $MetadataConfiguration;
    public static Schema $MetadataConfigurationResult;
    public static Schema $MetadataEntry;
    public static Schema $MetadataTableConfiguration;
    public static Schema $MetadataTableConfigurationResult;
    public static Schema $MetadataTableEncryptionConfiguration;
    public static Schema $Metrics;
    public static Schema $MetricsAndOperator;
    public static Schema $MetricsConfiguration;
    public static Schema $MultipartUpload;
    public static Schema $NoSuchAnnotationException;
    public static Schema $NoSuchBucketException;
    public static Schema $NoSuchKeyException;
    public static Schema $NoSuchUploadException;
    public static Schema $NoncurrentVersionExpiration;
    public static Schema $NoncurrentVersionTransition;
    public static Schema $NotFoundException;
    public static Schema $NotificationConfiguration;
    public static Schema $NotificationConfigurationFilter;
    public static Schema $S3Object;
    public static Schema $ObjectAlreadyInActiveTierErrorException;
    public static Schema $ObjectIdentifier;
    public static Schema $ObjectLockConfiguration;
    public static Schema $ObjectLockLegalHold;
    public static Schema $ObjectLockRetention;
    public static Schema $ObjectLockRule;
    public static Schema $ObjectNotInActiveTierErrorException;
    public static Schema $ObjectPart;
    public static Schema $ObjectVersion;
    public static Schema $OutputLocation;
    public static Schema $OutputSerialization;
    public static Schema $Owner;
    public static Schema $OwnershipControls;
    public static Schema $OwnershipControlsRule;
    public static Schema $ParquetInput;
    public static Schema $Part;
    public static Schema $PartitionedPrefix;
    public static Schema $PolicyStatus;
    public static Schema $Progress;
    public static Schema $ProgressEvent;
    public static Schema $PublicAccessBlockConfiguration;
    public static Schema $PutBucketAbacRequest;
    public static Schema $PutBucketAccelerateConfigurationRequest;
    public static Schema $PutBucketAclRequest;
    public static Schema $PutBucketAnalyticsConfigurationRequest;
    public static Schema $PutBucketCorsRequest;
    public static Schema $PutBucketEncryptionRequest;
    public static Schema $PutBucketIntelligentTieringConfigurationRequest;
    public static Schema $PutBucketInventoryConfigurationRequest;
    public static Schema $PutBucketLifecycleConfigurationOutput;
    public static Schema $PutBucketLifecycleConfigurationRequest;
    public static Schema $PutBucketLoggingRequest;
    public static Schema $PutBucketMetricsConfigurationRequest;
    public static Schema $PutBucketNotificationConfigurationRequest;
    public static Schema $PutBucketOwnershipControlsRequest;
    public static Schema $PutBucketPolicyRequest;
    public static Schema $PutBucketReplicationRequest;
    public static Schema $PutBucketRequestPaymentRequest;
    public static Schema $PutBucketTaggingRequest;
    public static Schema $PutBucketVersioningRequest;
    public static Schema $PutBucketWebsiteRequest;
    public static Schema $PutObjectAclOutput;
    public static Schema $PutObjectAclRequest;
    public static Schema $PutObjectAnnotationOutput;
    public static Schema $PutObjectAnnotationRequest;
    public static Schema $PutObjectLegalHoldOutput;
    public static Schema $PutObjectLegalHoldRequest;
    public static Schema $PutObjectLockConfigurationOutput;
    public static Schema $PutObjectLockConfigurationRequest;
    public static Schema $PutObjectOutput;
    public static Schema $PutObjectRequest;
    public static Schema $PutObjectRetentionOutput;
    public static Schema $PutObjectRetentionRequest;
    public static Schema $PutObjectTaggingOutput;
    public static Schema $PutObjectTaggingRequest;
    public static Schema $PutPublicAccessBlockRequest;
    public static Schema $QueueConfiguration;
    public static Schema $RecordExpiration;
    public static Schema $RecordsEvent;
    public static Schema $Redirect;
    public static Schema $RedirectAllRequestsTo;
    public static Schema $RenameObjectOutput;
    public static Schema $RenameObjectRequest;
    public static Schema $ReplicaModifications;
    public static Schema $ReplicationConfiguration;
    public static Schema $ReplicationRule;
    public static Schema $ReplicationRuleAndOperator;
    public static Schema $ReplicationRuleFilter;
    public static Schema $ReplicationRuleNotOperator;
    public static Schema $ReplicationRuleOrOperator;
    public static Schema $ReplicationTime;
    public static Schema $ReplicationTimeValue;
    public static Schema $RequestPaymentConfiguration;
    public static Schema $RequestProgress;
    public static Schema $RestoreObjectOutput;
    public static Schema $RestoreObjectRequest;
    public static Schema $RestoreRequest;
    public static Schema $RestoreStatus;
    public static Schema $RoutingRule;
    public static Schema $S3KeyFilter;
    public static Schema $S3Location;
    public static Schema $S3TablesDestination;
    public static Schema $S3TablesDestinationResult;
    public static Schema $SSEKMS;
    public static Schema $SSEKMSEncryption;
    public static Schema $SSES3;
    public static Schema $ScanRange;
    public static Schema $SelectObjectContentOutput;
    public static Schema $SelectObjectContentRequest;
    public static Schema $SelectParameters;
    public static Schema $ServerSideEncryptionByDefault;
    public static Schema $ServerSideEncryptionConfiguration;
    public static Schema $ServerSideEncryptionRule;
    public static Schema $SessionCredentials;
    public static Schema $SimplePrefix;
    public static Schema $SourceSelectionCriteria;
    public static Schema $SseKmsEncryptedObjects;
    public static Schema $Stats;
    public static Schema $StatsEvent;
    public static Schema $StorageClassAnalysis;
    public static Schema $StorageClassAnalysisDataExport;
    public static Schema $Tag;
    public static Schema $Tagging;
    public static Schema $TargetGrant;
    public static Schema $TargetObjectKeyFormat;
    public static Schema $Tiering;
    public static Schema $TooManyPartsException;
    public static Schema $TopicConfiguration;
    public static Schema $Transition;
    public static Schema $UnsupportedMediaTypeException;
    public static Schema $UpdateBucketMetadataAnnotationTableConfigurationRequest;
    public static Schema $UpdateBucketMetadataInventoryTableConfigurationRequest;
    public static Schema $UpdateBucketMetadataJournalTableConfigurationRequest;
    public static Schema $UpdateObjectEncryptionRequest;
    public static Schema $UpdateObjectEncryptionResponse;
    public static Schema $UploadPartCopyOutput;
    public static Schema $UploadPartCopyRequest;
    public static Schema $UploadPartOutput;
    public static Schema $UploadPartRequest;
    public static Schema $UseSourceMultiRegionKey;
    public static Schema $VersioningConfiguration;
    public static Schema $WebsiteConfiguration;
    public static Schema $WriteGetObjectResponseRequest;
    public static Schema $AnalyticsFilter;
    public static Schema $MetricsFilter;
    public static Schema $ObjectEncryption;
    public static Schema $SelectObjectContentEventStream;
    public static Schema $AnalyticsS3ExportFileFormat;
    public static Schema $AnnotationConfigurationState;
    public static Schema $AnnotationDirective;
    public static Schema $ArchiveStatus;
    public static Schema $BucketAbacStatus;
    public static Schema $BucketAccelerateStatus;
    public static Schema $BucketCannedACL;
    public static Schema $BucketLocationConstraint;
    public static Schema $BucketLogsPermission;
    public static Schema $BucketNamespace;
    public static Schema $BucketType;
    public static Schema $BucketVersioningStatus;
    public static Schema $ChecksumAlgorithm;
    public static Schema $ChecksumMode;
    public static Schema $ChecksumType;
    public static Schema $CompressionType;
    public static Schema $DataRedundancy;
    public static Schema $DeleteMarkerReplicationStatus;
    public static Schema $EncodingType;
    public static Schema $EncryptionType;
    public static Schema $Event;
    public static Schema $ExistingObjectReplicationStatus;
    public static Schema $ExpirationState;
    public static Schema $ExpirationStatus;
    public static Schema $ExpressionType;
    public static Schema $FileHeaderInfo;
    public static Schema $FilterRuleName;
    public static Schema $IntelligentTieringAccessTier;
    public static Schema $IntelligentTieringStatus;
    public static Schema $InventoryConfigurationState;
    public static Schema $InventoryFormat;
    public static Schema $InventoryFrequency;
    public static Schema $InventoryIncludedObjectVersions;
    public static Schema $InventoryOptionalField;
    public static Schema $JSONType;
    public static Schema $LocationType;
    public static Schema $MFADelete;
    public static Schema $MFADeleteStatus;
    public static Schema $MetadataDirective;
    public static Schema $MetricsStatus;
    public static Schema $ObjectAttributes;
    public static Schema $ObjectCannedACL;
    public static Schema $ObjectLockEnabled;
    public static Schema $ObjectLockEventHold;
    public static Schema $ObjectLockLegalHoldStatus;
    public static Schema $ObjectLockMode;
    public static Schema $ObjectLockRetentionMode;
    public static Schema $ObjectOwnership;
    public static Schema $ObjectStorageClass;
    public static Schema $ObjectVersionStorageClass;
    public static Schema $OptionalObjectAttributes;
    public static Schema $OwnerOverride;
    public static Schema $PartitionDateSource;
    public static Schema $Payer;
    public static Schema $Permission;
    public static Schema $Protocol;
    public static Schema $QuoteFields;
    public static Schema $ReplicaModificationsStatus;
    public static Schema $ReplicationRuleStatus;
    public static Schema $ReplicationStatus;
    public static Schema $ReplicationTimeStatus;
    public static Schema $RequestCharged;
    public static Schema $RequestPayer;
    public static Schema $RestoreRequestType;
    public static Schema $S3TablesBucketType;
    public static Schema $ServerSideEncryption;
    public static Schema $SessionMode;
    public static Schema $SseKmsEncryptedObjectsStatus;
    public static Schema $StorageClass;
    public static Schema $StorageClassAnalysisSchemaVersion;
    public static Schema $TableSseAlgorithm;
    public static Schema $TaggingDirective;
    public static Schema $Tier;
    public static Schema $TransitionDefaultMinimumObjectSize;
    public static Schema $TransitionStorageClass;
    public static Schema $Type;
    public static Schema $UseSourceMultiRegionKeyStatus;

    public static function abacStatus(): Schema
    {
        if (isset(self::$AbacStatus)) {
            return self::$AbacStatus;
        }

        return self::$AbacStatus = new Schema(
            id: 'com.amazonaws.s3#AbacStatus',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AbacStatus$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, targetClass: BucketAbacStatus::class)
            ],
            targetClass: AbacStatus::class
        );
    }

    public static function abortIncompleteMultipartUpload(): Schema
    {
        if (isset(self::$AbortIncompleteMultipartUpload)) {
            return self::$AbortIncompleteMultipartUpload;
        }

        return self::$AbortIncompleteMultipartUpload = new Schema(
            id: 'com.amazonaws.s3#AbortIncompleteMultipartUpload',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AbortIncompleteMultipartUpload$DaysAfterInitiation', type: ShapeType::Integer, memberName: 'DaysAfterInitiation', memberIndex: 0)
            ],
            targetClass: AbortIncompleteMultipartUpload::class
        );
    }

    public static function abortMultipartUploadOutput(): Schema
    {
        if (isset(self::$AbortMultipartUploadOutput)) {
            return self::$AbortMultipartUploadOutput;
        }

        return self::$AbortMultipartUploadOutput = new Schema(
            id: 'com.amazonaws.s3#AbortMultipartUploadOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AbortMultipartUploadOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 0, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#AbortMultipartUploadOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 1, traits: [5 => 'x-amz-version-id'])
            ],
            targetClass: AbortMultipartUploadOutput::class
        );
    }

    public static function abortMultipartUploadRequest(): Schema
    {
        if (isset(self::$AbortMultipartUploadRequest)) {
            return self::$AbortMultipartUploadRequest;
        }

        return self::$AbortMultipartUploadRequest = new Schema(
            id: 'com.amazonaws.s3#AbortMultipartUploadRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AbortMultipartUploadRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#AbortMultipartUploadRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#AbortMultipartUploadRequest$UploadId', type: ShapeType::String_, memberName: 'UploadId', memberIndex: 2, traits: [9 => 'uploadId', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#AbortMultipartUploadRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 3, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#AbortMultipartUploadRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#AbortMultipartUploadRequest$IfMatchInitiatedTime', type: ShapeType::Timestamp, memberName: 'IfMatchInitiatedTime', memberIndex: 5, traits: [4 => 'http-date', 5 => 'x-amz-if-match-initiated-time'])
            ],
            targetClass: AbortMultipartUploadRequest::class
        );
    }

    public static function accelerateConfiguration(): Schema
    {
        if (isset(self::$AccelerateConfiguration)) {
            return self::$AccelerateConfiguration;
        }

        return self::$AccelerateConfiguration = new Schema(
            id: 'com.amazonaws.s3#AccelerateConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AccelerateConfiguration$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, targetClass: BucketAccelerateStatus::class)
            ],
            targetClass: AccelerateConfiguration::class
        );
    }

    public static function accessControlPolicy(): Schema
    {
        if (isset(self::$AccessControlPolicy)) {
            return self::$AccessControlPolicy;
        }

        return self::$AccessControlPolicy = new Schema(
            id: 'com.amazonaws.s3#AccessControlPolicy',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AccessControlPolicy$Grants', type: ShapeType::List_, memberName: 'Grants', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#Grants$member'] ??= new Schema(id: 'com.amazonaws.s3#Grants$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::grant()->getMembers(), traits: [0 => 'Grant'], targetClass: Grant::class), traits: [0 => 'AccessControlList']),
                new Schema(id: 'com.amazonaws.s3#AccessControlPolicy$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 1, members: self::owner()->getMembers(), targetClass: Owner::class)
            ],
            targetClass: AccessControlPolicy::class
        );
    }

    public static function accessControlTranslation(): Schema
    {
        if (isset(self::$AccessControlTranslation)) {
            return self::$AccessControlTranslation;
        }

        return self::$AccessControlTranslation = new Schema(
            id: 'com.amazonaws.s3#AccessControlTranslation',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AccessControlTranslation$Owner', type: ShapeType::Enum, memberName: 'Owner', memberIndex: 0, traits: [14 => true], targetClass: OwnerOverride::class)
            ],
            targetClass: AccessControlTranslation::class
        );
    }

    public static function accessDeniedException(): Schema
    {
        if (isset(self::$AccessDeniedException)) {
            return self::$AccessDeniedException;
        }

        return self::$AccessDeniedException = new Schema(
            id: 'com.amazonaws.s3#AccessDenied',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: AccessDeniedException::class
        );
    }

    public static function analyticsAndOperator(): Schema
    {
        if (isset(self::$AnalyticsAndOperator)) {
            return self::$AnalyticsAndOperator;
        }

        return self::$AnalyticsAndOperator = new Schema(
            id: 'com.amazonaws.s3#AnalyticsAndOperator',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AnalyticsAndOperator$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#AnalyticsAndOperator$Tags', type: ShapeType::List_, memberName: 'Tags', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [0 => 'Tag', 3 => true])
            ],
            targetClass: AnalyticsAndOperator::class
        );
    }

    public static function analyticsConfiguration(): Schema
    {
        if (isset(self::$AnalyticsConfiguration)) {
            return self::$AnalyticsConfiguration;
        }

        return self::$AnalyticsConfiguration = new Schema(
            id: 'com.amazonaws.s3#AnalyticsConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$StorageClassAnalysis', type: ShapeType::Structure, memberName: 'StorageClassAnalysis', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#StorageClassAnalysis$DataExport', type: ShapeType::Structure, memberName: 'DataExport', memberIndex: 0, targetClass: StorageClassAnalysisDataExport::class)], traits: [14 => true], targetClass: StorageClassAnalysis::class),
                new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$Filter', type: ShapeType::Union, memberName: 'Filter', memberIndex: 2, members: self::analyticsFilter()->getMembers(), targetClass: AnalyticsFilter::class)
            ],
            targetClass: AnalyticsConfiguration::class
        );
    }

    public static function analyticsExportDestination(): Schema
    {
        if (isset(self::$AnalyticsExportDestination)) {
            return self::$AnalyticsExportDestination;
        }

        return self::$AnalyticsExportDestination = new Schema(
            id: 'com.amazonaws.s3#AnalyticsExportDestination',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AnalyticsExportDestination$S3BucketDestination', type: ShapeType::Structure, memberName: 'S3BucketDestination', memberIndex: 0, members: self::analyticsS3BucketDestination()->getMembers(), traits: [14 => true], targetClass: AnalyticsS3BucketDestination::class)
            ],
            targetClass: AnalyticsExportDestination::class
        );
    }

    public static function analyticsS3BucketDestination(): Schema
    {
        if (isset(self::$AnalyticsS3BucketDestination)) {
            return self::$AnalyticsS3BucketDestination;
        }

        return self::$AnalyticsS3BucketDestination = new Schema(
            id: 'com.amazonaws.s3#AnalyticsS3BucketDestination',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AnalyticsS3BucketDestination$Format', type: ShapeType::Enum, memberName: 'Format', memberIndex: 0, traits: [14 => true], targetClass: AnalyticsS3ExportFileFormat::class),
                new Schema(id: 'com.amazonaws.s3#AnalyticsS3BucketDestination$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 1, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#AnalyticsS3BucketDestination$BucketAccountId', type: ShapeType::String_, memberName: 'BucketAccountId', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#AnalyticsS3BucketDestination$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 3)
            ],
            targetClass: AnalyticsS3BucketDestination::class
        );
    }

    public static function annotationEntry(): Schema
    {
        if (isset(self::$AnnotationEntry)) {
            return self::$AnnotationEntry;
        }

        return self::$AnnotationEntry = new Schema(
            id: 'com.amazonaws.s3#AnnotationEntry',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AnnotationEntry$AnnotationName', type: ShapeType::String_, memberName: 'AnnotationName', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#AnnotationEntry$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 1, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#AnnotationEntry$Size', type: ShapeType::Long, memberName: 'Size', memberIndex: 2, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#AnnotationEntry$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#AnnotationEntry$ChecksumAlgorithm', type: ShapeType::List_, memberName: 'ChecksumAlgorithm', memberIndex: 4, listMember: SchemasMembers::$shared['com.amazonaws.s3#ChecksumAlgorithmList$member'] ??= new Schema(id: 'com.amazonaws.s3#ChecksumAlgorithmList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, targetClass: ChecksumAlgorithm::class), traits: [3 => true]),
                new Schema(id: 'com.amazonaws.s3#AnnotationEntry$ReplicationStatus', type: ShapeType::Enum, memberName: 'ReplicationStatus', memberIndex: 5, targetClass: ReplicationStatus::class)
            ],
            targetClass: AnnotationEntry::class
        );
    }

    public static function annotationLimitExceededException(): Schema
    {
        if (isset(self::$AnnotationLimitExceededException)) {
            return self::$AnnotationLimitExceededException;
        }

        return self::$AnnotationLimitExceededException = new Schema(
            id: 'com.amazonaws.s3#AnnotationLimitExceeded',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: AnnotationLimitExceededException::class
        );
    }

    public static function annotationNameTooLongException(): Schema
    {
        if (isset(self::$AnnotationNameTooLongException)) {
            return self::$AnnotationNameTooLongException;
        }

        return self::$AnnotationNameTooLongException = new Schema(
            id: 'com.amazonaws.s3#AnnotationNameTooLong',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: AnnotationNameTooLongException::class
        );
    }

    public static function annotationTableConfiguration(): Schema
    {
        if (isset(self::$AnnotationTableConfiguration)) {
            return self::$AnnotationTableConfiguration;
        }

        return self::$AnnotationTableConfiguration = new Schema(
            id: 'com.amazonaws.s3#AnnotationTableConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfiguration$ConfigurationState', type: ShapeType::Enum, memberName: 'ConfigurationState', memberIndex: 0, traits: [14 => true], targetClass: AnnotationConfigurationState::class),
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfiguration$EncryptionConfiguration', type: ShapeType::Structure, memberName: 'EncryptionConfiguration', memberIndex: 1, members: self::metadataTableEncryptionConfiguration()->getMembers(), targetClass: MetadataTableEncryptionConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfiguration$Role', type: ShapeType::String_, memberName: 'Role', memberIndex: 2)
            ],
            targetClass: AnnotationTableConfiguration::class
        );
    }

    public static function annotationTableConfigurationResult(): Schema
    {
        if (isset(self::$AnnotationTableConfigurationResult)) {
            return self::$AnnotationTableConfigurationResult;
        }

        return self::$AnnotationTableConfigurationResult = new Schema(
            id: 'com.amazonaws.s3#AnnotationTableConfigurationResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfigurationResult$ConfigurationState', type: ShapeType::Enum, memberName: 'ConfigurationState', memberIndex: 0, traits: [14 => true], targetClass: AnnotationConfigurationState::class),
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfigurationResult$TableStatus', type: ShapeType::String_, memberName: 'TableStatus', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfigurationResult$Error', type: ShapeType::Structure, memberName: 'Error', memberIndex: 2, members: self::errorDetails()->getMembers(), targetClass: ErrorDetails::class),
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfigurationResult$TableName', type: ShapeType::String_, memberName: 'TableName', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfigurationResult$TableArn', type: ShapeType::String_, memberName: 'TableArn', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfigurationResult$Role', type: ShapeType::String_, memberName: 'Role', memberIndex: 5)
            ],
            targetClass: AnnotationTableConfigurationResult::class
        );
    }

    public static function annotationTableConfigurationUpdates(): Schema
    {
        if (isset(self::$AnnotationTableConfigurationUpdates)) {
            return self::$AnnotationTableConfigurationUpdates;
        }

        return self::$AnnotationTableConfigurationUpdates = new Schema(
            id: 'com.amazonaws.s3#AnnotationTableConfigurationUpdates',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfigurationUpdates$ConfigurationState', type: ShapeType::Enum, memberName: 'ConfigurationState', memberIndex: 0, traits: [14 => true], targetClass: AnnotationConfigurationState::class),
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfigurationUpdates$EncryptionConfiguration', type: ShapeType::Structure, memberName: 'EncryptionConfiguration', memberIndex: 1, members: self::metadataTableEncryptionConfiguration()->getMembers(), targetClass: MetadataTableEncryptionConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#AnnotationTableConfigurationUpdates$Role', type: ShapeType::String_, memberName: 'Role', memberIndex: 2)
            ],
            targetClass: AnnotationTableConfigurationUpdates::class
        );
    }

    public static function blockedEncryptionTypes(): Schema
    {
        if (isset(self::$BlockedEncryptionTypes)) {
            return self::$BlockedEncryptionTypes;
        }

        return self::$BlockedEncryptionTypes = new Schema(
            id: 'com.amazonaws.s3#BlockedEncryptionTypes',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#BlockedEncryptionTypes$EncryptionType', type: ShapeType::List_, memberName: 'EncryptionType', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#EncryptionTypeList$member'] ??= new Schema(id: 'com.amazonaws.s3#EncryptionTypeList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, traits: [0 => 'EncryptionType'], targetClass: EncryptionType::class), traits: [3 => true])
            ],
            targetClass: BlockedEncryptionTypes::class
        );
    }

    public static function bucket(): Schema
    {
        if (isset(self::$Bucket)) {
            return self::$Bucket;
        }

        return self::$Bucket = new Schema(
            id: 'com.amazonaws.s3#Bucket',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Bucket$Name', type: ShapeType::String_, memberName: 'Name', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Bucket$CreationDate', type: ShapeType::Timestamp, memberName: 'CreationDate', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Bucket$BucketRegion', type: ShapeType::String_, memberName: 'BucketRegion', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#Bucket$BucketArn', type: ShapeType::String_, memberName: 'BucketArn', memberIndex: 3)
            ],
            targetClass: Bucket::class
        );
    }

    public static function bucketAlreadyExistsException(): Schema
    {
        if (isset(self::$BucketAlreadyExistsException)) {
            return self::$BucketAlreadyExistsException;
        }

        return self::$BucketAlreadyExistsException = new Schema(
            id: 'com.amazonaws.s3#BucketAlreadyExists',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: BucketAlreadyExistsException::class
        );
    }

    public static function bucketAlreadyOwnedByYouException(): Schema
    {
        if (isset(self::$BucketAlreadyOwnedByYouException)) {
            return self::$BucketAlreadyOwnedByYouException;
        }

        return self::$BucketAlreadyOwnedByYouException = new Schema(
            id: 'com.amazonaws.s3#BucketAlreadyOwnedByYou',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: BucketAlreadyOwnedByYouException::class
        );
    }

    public static function bucketInfo(): Schema
    {
        if (isset(self::$BucketInfo)) {
            return self::$BucketInfo;
        }

        return self::$BucketInfo = new Schema(
            id: 'com.amazonaws.s3#BucketInfo',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#BucketInfo$DataRedundancy', type: ShapeType::Enum, memberName: 'DataRedundancy', memberIndex: 0, targetClass: DataRedundancy::class),
                new Schema(id: 'com.amazonaws.s3#BucketInfo$Type', type: ShapeType::Enum, memberName: 'Type', memberIndex: 1, targetClass: BucketType::class)
            ],
            targetClass: BucketInfo::class
        );
    }

    public static function bucketLifecycleConfiguration(): Schema
    {
        if (isset(self::$BucketLifecycleConfiguration)) {
            return self::$BucketLifecycleConfiguration;
        }

        return self::$BucketLifecycleConfiguration = new Schema(
            id: 'com.amazonaws.s3#BucketLifecycleConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#BucketLifecycleConfiguration$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#LifecycleRules$member'] ??= new Schema(id: 'com.amazonaws.s3#LifecycleRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::lifecycleRule()->getMembers(), targetClass: LifecycleRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])
            ],
            targetClass: BucketLifecycleConfiguration::class
        );
    }

    public static function bucketLoggingStatus(): Schema
    {
        if (isset(self::$BucketLoggingStatus)) {
            return self::$BucketLoggingStatus;
        }

        return self::$BucketLoggingStatus = new Schema(
            id: 'com.amazonaws.s3#BucketLoggingStatus',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#BucketLoggingStatus$LoggingEnabled', type: ShapeType::Structure, memberName: 'LoggingEnabled', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetBucket', type: ShapeType::String_, memberName: 'TargetBucket', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetPrefix', type: ShapeType::String_, memberName: 'TargetPrefix', memberIndex: 1, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetGrants', type: ShapeType::List_, memberName: 'TargetGrants', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#TargetGrants$member'] ??= new Schema(id: 'com.amazonaws.s3#TargetGrants$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::targetGrant()->getMembers(), traits: [0 => 'Grant'], targetClass: TargetGrant::class)), new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetObjectKeyFormat', type: ShapeType::Structure, memberName: 'TargetObjectKeyFormat', memberIndex: 3, targetClass: TargetObjectKeyFormat::class)], targetClass: LoggingEnabled::class)
            ],
            targetClass: BucketLoggingStatus::class
        );
    }

    public static function cORSConfiguration(): Schema
    {
        if (isset(self::$CORSConfiguration)) {
            return self::$CORSConfiguration;
        }

        return self::$CORSConfiguration = new Schema(
            id: 'com.amazonaws.s3#CORSConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CORSConfiguration$CORSRules', type: ShapeType::List_, memberName: 'CORSRules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#CORSRules$member'] ??= new Schema(id: 'com.amazonaws.s3#CORSRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::cORSRule()->getMembers(), targetClass: CORSRule::class), traits: [0 => 'CORSRule', 3 => true, 14 => true])
            ],
            targetClass: CORSConfiguration::class
        );
    }

    public static function cORSRule(): Schema
    {
        if (isset(self::$CORSRule)) {
            return self::$CORSRule;
        }

        return self::$CORSRule = new Schema(
            id: 'com.amazonaws.s3#CORSRule',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CORSRule$AllowedMethods', type: ShapeType::List_, memberName: 'AllowedMethods', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#AllowedMethods$member'] ??= new Schema(id: 'com.amazonaws.s3#AllowedMethods$member', type: ShapeType::String_, memberName: 'member', memberIndex: 0), traits: [0 => 'AllowedMethod', 3 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#CORSRule$AllowedOrigins', type: ShapeType::List_, memberName: 'AllowedOrigins', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#AllowedOrigins$member'] ??= new Schema(id: 'com.amazonaws.s3#AllowedOrigins$member', type: ShapeType::String_, memberName: 'member', memberIndex: 0), traits: [0 => 'AllowedOrigin', 3 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#CORSRule$ID', type: ShapeType::String_, memberName: 'ID', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#CORSRule$AllowedHeaders', type: ShapeType::List_, memberName: 'AllowedHeaders', memberIndex: 3, listMember: SchemasMembers::$shared['com.amazonaws.s3#AllowedHeaders$member'] ??= new Schema(id: 'com.amazonaws.s3#AllowedHeaders$member', type: ShapeType::String_, memberName: 'member', memberIndex: 0), traits: [0 => 'AllowedHeader', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#CORSRule$ExposeHeaders', type: ShapeType::List_, memberName: 'ExposeHeaders', memberIndex: 4, listMember: SchemasMembers::$shared['com.amazonaws.s3#ExposeHeaders$member'] ??= new Schema(id: 'com.amazonaws.s3#ExposeHeaders$member', type: ShapeType::String_, memberName: 'member', memberIndex: 0), traits: [0 => 'ExposeHeader', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#CORSRule$MaxAgeSeconds', type: ShapeType::Integer, memberName: 'MaxAgeSeconds', memberIndex: 5)
            ],
            targetClass: CORSRule::class
        );
    }

    public static function cSVInput(): Schema
    {
        if (isset(self::$CSVInput)) {
            return self::$CSVInput;
        }

        return self::$CSVInput = new Schema(
            id: 'com.amazonaws.s3#CSVInput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CSVInput$FileHeaderInfo', type: ShapeType::Enum, memberName: 'FileHeaderInfo', memberIndex: 0, targetClass: FileHeaderInfo::class),
                new Schema(id: 'com.amazonaws.s3#CSVInput$Comments', type: ShapeType::String_, memberName: 'Comments', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#CSVInput$QuoteEscapeCharacter', type: ShapeType::String_, memberName: 'QuoteEscapeCharacter', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#CSVInput$RecordDelimiter', type: ShapeType::String_, memberName: 'RecordDelimiter', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#CSVInput$FieldDelimiter', type: ShapeType::String_, memberName: 'FieldDelimiter', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#CSVInput$QuoteCharacter', type: ShapeType::String_, memberName: 'QuoteCharacter', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#CSVInput$AllowQuotedRecordDelimiter', type: ShapeType::Boolean, memberName: 'AllowQuotedRecordDelimiter', memberIndex: 6)
            ],
            targetClass: CSVInput::class
        );
    }

    public static function cSVOutput(): Schema
    {
        if (isset(self::$CSVOutput)) {
            return self::$CSVOutput;
        }

        return self::$CSVOutput = new Schema(
            id: 'com.amazonaws.s3#CSVOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CSVOutput$QuoteFields', type: ShapeType::Enum, memberName: 'QuoteFields', memberIndex: 0, targetClass: QuoteFields::class),
                new Schema(id: 'com.amazonaws.s3#CSVOutput$QuoteEscapeCharacter', type: ShapeType::String_, memberName: 'QuoteEscapeCharacter', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#CSVOutput$RecordDelimiter', type: ShapeType::String_, memberName: 'RecordDelimiter', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#CSVOutput$FieldDelimiter', type: ShapeType::String_, memberName: 'FieldDelimiter', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#CSVOutput$QuoteCharacter', type: ShapeType::String_, memberName: 'QuoteCharacter', memberIndex: 4)
            ],
            targetClass: CSVOutput::class
        );
    }

    public static function checksum(): Schema
    {
        if (isset(self::$Checksum)) {
            return self::$Checksum;
        }

        return self::$Checksum = new Schema(
            id: 'com.amazonaws.s3#Checksum',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 9),
                new Schema(id: 'com.amazonaws.s3#Checksum$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 10, targetClass: ChecksumType::class)
            ],
            targetClass: Checksum::class
        );
    }

    public static function commonPrefix(): Schema
    {
        if (isset(self::$CommonPrefix)) {
            return self::$CommonPrefix;
        }

        return self::$CommonPrefix = new Schema(
            id: 'com.amazonaws.s3#CommonPrefix',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CommonPrefix$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0)
            ],
            targetClass: CommonPrefix::class
        );
    }

    public static function completeMultipartUploadOutput(): Schema
    {
        if (isset(self::$CompleteMultipartUploadOutput)) {
            return self::$CompleteMultipartUploadOutput;
        }

        return self::$CompleteMultipartUploadOutput = new Schema(
            id: 'com.amazonaws.s3#CompleteMultipartUploadOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$Location', type: ShapeType::String_, memberName: 'Location', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$Expiration', type: ShapeType::String_, memberName: 'Expiration', memberIndex: 3, traits: [5 => 'x-amz-expiration']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 9),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 10),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 11),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 12),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 13),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 14),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 15, targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 16, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 17, traits: [5 => 'x-amz-version-id']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 18, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 19, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 20, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ], traits: [0 => 'CompleteMultipartUploadResult'],
            targetClass: CompleteMultipartUploadOutput::class
        );
    }

    public static function completeMultipartUploadRequest(): Schema
    {
        if (isset(self::$CompleteMultipartUploadRequest)) {
            return self::$CompleteMultipartUploadRequest;
        }

        return self::$CompleteMultipartUploadRequest = new Schema(
            id: 'com.amazonaws.s3#CompleteMultipartUploadRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$UploadId', type: ShapeType::String_, memberName: 'UploadId', memberIndex: 2, traits: [9 => 'uploadId', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$MultipartUpload', type: ShapeType::Structure, memberName: 'MultipartUpload', memberIndex: 3, members: [new Schema(id: 'com.amazonaws.s3#CompletedMultipartUpload$Parts', type: ShapeType::List_, memberName: 'Parts', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#CompletedPartList$member'] ??= new Schema(id: 'com.amazonaws.s3#CompletedPartList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::completedPart()->getMembers(), targetClass: CompletedPart::class), traits: [0 => 'Part', 3 => true])], traits: [0 => 'CompleteMultipartUpload', 7 => true], targetClass: CompletedMultipartUpload::class),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 4, traits: [5 => 'x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 5, traits: [5 => 'x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 6, traits: [5 => 'x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 7, traits: [5 => 'x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 8, traits: [5 => 'x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 9, traits: [5 => 'x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 10, traits: [5 => 'x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 11, traits: [5 => 'x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 12, traits: [5 => 'x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 13, traits: [5 => 'x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 14, traits: [5 => 'x-amz-checksum-type'], targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$MpuObjectSize', type: ShapeType::Long, memberName: 'MpuObjectSize', memberIndex: 15, traits: [5 => 'x-amz-mp-object-size']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 16, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 17, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$IfMatch', type: ShapeType::String_, memberName: 'IfMatch', memberIndex: 18, traits: [5 => 'If-Match']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$IfNoneMatch', type: ShapeType::String_, memberName: 'IfNoneMatch', memberIndex: 19, traits: [5 => 'If-None-Match']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 20, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 21, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CompleteMultipartUploadRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 22, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5'])
            ],
            targetClass: CompleteMultipartUploadRequest::class
        );
    }

    public static function completedMultipartUpload(): Schema
    {
        if (isset(self::$CompletedMultipartUpload)) {
            return self::$CompletedMultipartUpload;
        }

        return self::$CompletedMultipartUpload = new Schema(
            id: 'com.amazonaws.s3#CompletedMultipartUpload',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CompletedMultipartUpload$Parts', type: ShapeType::List_, memberName: 'Parts', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#CompletedPartList$member'] ??= new Schema(id: 'com.amazonaws.s3#CompletedPartList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::completedPart()->getMembers(), targetClass: CompletedPart::class), traits: [0 => 'Part', 3 => true])
            ],
            targetClass: CompletedMultipartUpload::class
        );
    }

    public static function completedPart(): Schema
    {
        if (isset(self::$CompletedPart)) {
            return self::$CompletedPart;
        }

        return self::$CompletedPart = new Schema(
            id: 'com.amazonaws.s3#CompletedPart',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 9),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 10),
                new Schema(id: 'com.amazonaws.s3#CompletedPart$PartNumber', type: ShapeType::Integer, memberName: 'PartNumber', memberIndex: 11)
            ],
            targetClass: CompletedPart::class
        );
    }

    public static function condition(): Schema
    {
        if (isset(self::$Condition)) {
            return self::$Condition;
        }

        return self::$Condition = new Schema(
            id: 'com.amazonaws.s3#Condition',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Condition$HttpErrorCodeReturnedEquals', type: ShapeType::String_, memberName: 'HttpErrorCodeReturnedEquals', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Condition$KeyPrefixEquals', type: ShapeType::String_, memberName: 'KeyPrefixEquals', memberIndex: 1)
            ],
            targetClass: Condition::class
        );
    }

    public static function continuationEvent(): Schema
    {
        if (isset(self::$ContinuationEvent)) {
            return self::$ContinuationEvent;
        }

        return self::$ContinuationEvent = new Schema(
            id: 'com.amazonaws.s3#ContinuationEvent',
            type: ShapeType::Structure,
            members: [
            ],
            targetClass: ContinuationEvent::class
        );
    }

    public static function copyObjectOutput(): Schema
    {
        if (isset(self::$CopyObjectOutput)) {
            return self::$CopyObjectOutput;
        }

        return self::$CopyObjectOutput = new Schema(
            id: 'com.amazonaws.s3#CopyObjectOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$CopyObjectResult', type: ShapeType::Structure, memberName: 'CopyObjectResult', memberIndex: 0, members: self::copyObjectResult()->getMembers(), traits: [7 => true], targetClass: CopyObjectResult::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$Expiration', type: ShapeType::String_, memberName: 'Expiration', memberIndex: 1, traits: [5 => 'x-amz-expiration']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$CopySourceVersionId', type: ShapeType::String_, memberName: 'CopySourceVersionId', memberIndex: 2, traits: [5 => 'x-amz-copy-source-version-id']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 3, traits: [5 => 'x-amz-version-id']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 4, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 5, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 6, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 7, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$SSEKMSEncryptionContext', type: ShapeType::String_, memberName: 'SSEKMSEncryptionContext', memberIndex: 8, traits: [5 => 'x-amz-server-side-encryption-context', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 9, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 10, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: CopyObjectOutput::class
        );
    }

    public static function copyObjectRequest(): Schema
    {
        if (isset(self::$CopyObjectRequest)) {
            return self::$CopyObjectRequest;
        }

        return self::$CopyObjectRequest = new Schema(
            id: 'com.amazonaws.s3#CopyObjectRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$CopySource', type: ShapeType::String_, memberName: 'CopySource', memberIndex: 1, traits: [5 => 'x-amz-copy-source', 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'CopySource']]),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 2, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ACL', type: ShapeType::Enum, memberName: 'ACL', memberIndex: 3, traits: [5 => 'x-amz-acl'], targetClass: ObjectCannedACL::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$CacheControl', type: ShapeType::String_, memberName: 'CacheControl', memberIndex: 4, traits: [5 => 'Cache-Control']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 5, traits: [5 => 'x-amz-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ContentDisposition', type: ShapeType::String_, memberName: 'ContentDisposition', memberIndex: 6, traits: [5 => 'Content-Disposition']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ContentEncoding', type: ShapeType::String_, memberName: 'ContentEncoding', memberIndex: 7, traits: [5 => 'Content-Encoding']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ContentLanguage', type: ShapeType::String_, memberName: 'ContentLanguage', memberIndex: 8, traits: [5 => 'Content-Language']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ContentType', type: ShapeType::String_, memberName: 'ContentType', memberIndex: 9, traits: [5 => 'Content-Type']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$CopySourceIfMatch', type: ShapeType::String_, memberName: 'CopySourceIfMatch', memberIndex: 10, traits: [5 => 'x-amz-copy-source-if-match']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$CopySourceIfModifiedSince', type: ShapeType::Timestamp, memberName: 'CopySourceIfModifiedSince', memberIndex: 11, traits: [5 => 'x-amz-copy-source-if-modified-since']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$CopySourceIfNoneMatch', type: ShapeType::String_, memberName: 'CopySourceIfNoneMatch', memberIndex: 12, traits: [5 => 'x-amz-copy-source-if-none-match']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$CopySourceIfUnmodifiedSince', type: ShapeType::Timestamp, memberName: 'CopySourceIfUnmodifiedSince', memberIndex: 13, traits: [5 => 'x-amz-copy-source-if-unmodified-since']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$Expires', type: ShapeType::String_, memberName: 'Expires', memberIndex: 14, traits: [5 => 'Expires']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$GrantFullControl', type: ShapeType::String_, memberName: 'GrantFullControl', memberIndex: 15, traits: [5 => 'x-amz-grant-full-control']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$GrantRead', type: ShapeType::String_, memberName: 'GrantRead', memberIndex: 16, traits: [5 => 'x-amz-grant-read']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$GrantReadACP', type: ShapeType::String_, memberName: 'GrantReadACP', memberIndex: 17, traits: [5 => 'x-amz-grant-read-acp']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$GrantWriteACP', type: ShapeType::String_, memberName: 'GrantWriteACP', memberIndex: 18, traits: [5 => 'x-amz-grant-write-acp']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$IfMatch', type: ShapeType::String_, memberName: 'IfMatch', memberIndex: 19, traits: [5 => 'If-Match']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$IfNoneMatch', type: ShapeType::String_, memberName: 'IfNoneMatch', memberIndex: 20, traits: [5 => 'If-None-Match']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$Metadata', type: ShapeType::Map, memberName: 'Metadata', memberIndex: 21, mapKey: SchemasMembers::$shared['com.amazonaws.s3#Metadata$key'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$key', type: ShapeType::String_, memberName: 'key', memberIndex: 0), mapValue: SchemasMembers::$shared['com.amazonaws.s3#Metadata$value'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$value', type: ShapeType::String_, memberName: 'value', memberIndex: 1), traits: [8 => 'x-amz-meta-']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$MetadataDirective', type: ShapeType::Enum, memberName: 'MetadataDirective', memberIndex: 22, traits: [5 => 'x-amz-metadata-directive'], targetClass: MetadataDirective::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$TaggingDirective', type: ShapeType::Enum, memberName: 'TaggingDirective', memberIndex: 23, traits: [5 => 'x-amz-tagging-directive'], targetClass: TaggingDirective::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$AnnotationDirective', type: ShapeType::Enum, memberName: 'AnnotationDirective', memberIndex: 24, traits: [5 => 'x-amz-object-annotation-directive'], targetClass: AnnotationDirective::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 25, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 26, traits: [5 => 'x-amz-storage-class'], targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$WebsiteRedirectLocation', type: ShapeType::String_, memberName: 'WebsiteRedirectLocation', memberIndex: 27, traits: [5 => 'x-amz-website-redirect-location']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 28, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 29, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 30, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 31, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$SSEKMSEncryptionContext', type: ShapeType::String_, memberName: 'SSEKMSEncryptionContext', memberIndex: 32, traits: [5 => 'x-amz-server-side-encryption-context', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 33, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$CopySourceSSECustomerAlgorithm', type: ShapeType::String_, memberName: 'CopySourceSSECustomerAlgorithm', memberIndex: 34, traits: [5 => 'x-amz-copy-source-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$CopySourceSSECustomerKey', type: ShapeType::String_, memberName: 'CopySourceSSECustomerKey', memberIndex: 35, traits: [5 => 'x-amz-copy-source-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$CopySourceSSECustomerKeyMD5', type: ShapeType::String_, memberName: 'CopySourceSSECustomerKeyMD5', memberIndex: 36, traits: [5 => 'x-amz-copy-source-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 37, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$Tagging', type: ShapeType::String_, memberName: 'Tagging', memberIndex: 38, traits: [5 => 'x-amz-tagging']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ObjectLockMode', type: ShapeType::Enum, memberName: 'ObjectLockMode', memberIndex: 39, traits: [5 => 'x-amz-object-lock-mode'], targetClass: ObjectLockMode::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ObjectLockRetainUntilDate', type: ShapeType::Timestamp, memberName: 'ObjectLockRetainUntilDate', memberIndex: 40, traits: [4 => 'date-time', 5 => 'x-amz-object-lock-retain-until-date']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ObjectLockLegalHoldStatus', type: ShapeType::Enum, memberName: 'ObjectLockLegalHoldStatus', memberIndex: 41, traits: [5 => 'x-amz-object-lock-legal-hold'], targetClass: ObjectLockLegalHoldStatus::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ObjectLockEventHold', type: ShapeType::Enum, memberName: 'ObjectLockEventHold', memberIndex: 42, traits: [5 => 'x-amz-object-lock-event-hold'], targetClass: ObjectLockEventHold::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ObjectLockEventHoldDurationDays', type: ShapeType::Integer, memberName: 'ObjectLockEventHoldDurationDays', memberIndex: 43, traits: [5 => 'x-amz-object-lock-event-hold-duration-days']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ObjectLockEventHoldDurationYears', type: ShapeType::Integer, memberName: 'ObjectLockEventHoldDurationYears', memberIndex: 44, traits: [5 => 'x-amz-object-lock-event-hold-duration-years']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 45, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#CopyObjectRequest$ExpectedSourceBucketOwner', type: ShapeType::String_, memberName: 'ExpectedSourceBucketOwner', memberIndex: 46, traits: [5 => 'x-amz-source-expected-bucket-owner'])
            ],
            targetClass: CopyObjectRequest::class
        );
    }

    public static function copyObjectResult(): Schema
    {
        if (isset(self::$CopyObjectResult)) {
            return self::$CopyObjectResult;
        }

        return self::$CopyObjectResult = new Schema(
            id: 'com.amazonaws.s3#CopyObjectResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 2, targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 9),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 10),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 11),
                new Schema(id: 'com.amazonaws.s3#CopyObjectResult$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 12)
            ],
            targetClass: CopyObjectResult::class
        );
    }

    public static function copyPartResult(): Schema
    {
        if (isset(self::$CopyPartResult)) {
            return self::$CopyPartResult;
        }

        return self::$CopyPartResult = new Schema(
            id: 'com.amazonaws.s3#CopyPartResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 9),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 10),
                new Schema(id: 'com.amazonaws.s3#CopyPartResult$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 11)
            ],
            targetClass: CopyPartResult::class
        );
    }

    public static function createBucketConfiguration(): Schema
    {
        if (isset(self::$CreateBucketConfiguration)) {
            return self::$CreateBucketConfiguration;
        }

        return self::$CreateBucketConfiguration = new Schema(
            id: 'com.amazonaws.s3#CreateBucketConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CreateBucketConfiguration$LocationConstraint', type: ShapeType::Enum, memberName: 'LocationConstraint', memberIndex: 0, targetClass: BucketLocationConstraint::class),
                new Schema(id: 'com.amazonaws.s3#CreateBucketConfiguration$Location', type: ShapeType::Structure, memberName: 'Location', memberIndex: 1, members: self::locationInfo()->getMembers(), targetClass: LocationInfo::class),
                new Schema(id: 'com.amazonaws.s3#CreateBucketConfiguration$Bucket', type: ShapeType::Structure, memberName: 'Bucket', memberIndex: 2, members: self::bucketInfo()->getMembers(), targetClass: BucketInfo::class),
                new Schema(id: 'com.amazonaws.s3#CreateBucketConfiguration$Tags', type: ShapeType::List_, memberName: 'Tags', memberIndex: 3, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class))
            ],
            targetClass: CreateBucketConfiguration::class
        );
    }

    public static function createBucketMetadataConfigurationRequest(): Schema
    {
        if (isset(self::$CreateBucketMetadataConfigurationRequest)) {
            return self::$CreateBucketMetadataConfigurationRequest;
        }

        return self::$CreateBucketMetadataConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#CreateBucketMetadataConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CreateBucketMetadataConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#CreateBucketMetadataConfigurationRequest$MetadataConfiguration', type: ShapeType::Structure, memberName: 'MetadataConfiguration', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#MetadataConfiguration$JournalTableConfiguration', type: ShapeType::Structure, memberName: 'JournalTableConfiguration', memberIndex: 0, traits: [14 => true], targetClass: JournalTableConfiguration::class), new Schema(id: 'com.amazonaws.s3#MetadataConfiguration$InventoryTableConfiguration', type: ShapeType::Structure, memberName: 'InventoryTableConfiguration', memberIndex: 1, targetClass: InventoryTableConfiguration::class), new Schema(id: 'com.amazonaws.s3#MetadataConfiguration$AnnotationTableConfiguration', type: ShapeType::Structure, memberName: 'AnnotationTableConfiguration', memberIndex: 2, targetClass: AnnotationTableConfiguration::class)], traits: [0 => 'MetadataConfiguration', 7 => true, 14 => true], targetClass: MetadataConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#CreateBucketMetadataConfigurationRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#CreateBucketMetadataConfigurationRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#CreateBucketMetadataConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: CreateBucketMetadataConfigurationRequest::class
        );
    }

    public static function createBucketMetadataTableConfigurationRequest(): Schema
    {
        if (isset(self::$CreateBucketMetadataTableConfigurationRequest)) {
            return self::$CreateBucketMetadataTableConfigurationRequest;
        }

        return self::$CreateBucketMetadataTableConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#CreateBucketMetadataTableConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CreateBucketMetadataTableConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#CreateBucketMetadataTableConfigurationRequest$MetadataTableConfiguration', type: ShapeType::Structure, memberName: 'MetadataTableConfiguration', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#MetadataTableConfiguration$S3TablesDestination', type: ShapeType::Structure, memberName: 'S3TablesDestination', memberIndex: 0, traits: [14 => true], targetClass: S3TablesDestination::class)], traits: [0 => 'MetadataTableConfiguration', 7 => true, 14 => true], targetClass: MetadataTableConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#CreateBucketMetadataTableConfigurationRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#CreateBucketMetadataTableConfigurationRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#CreateBucketMetadataTableConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: CreateBucketMetadataTableConfigurationRequest::class
        );
    }

    public static function createBucketOutput(): Schema
    {
        if (isset(self::$CreateBucketOutput)) {
            return self::$CreateBucketOutput;
        }

        return self::$CreateBucketOutput = new Schema(
            id: 'com.amazonaws.s3#CreateBucketOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CreateBucketOutput$Location', type: ShapeType::String_, memberName: 'Location', memberIndex: 0, traits: [5 => 'Location']),
                new Schema(id: 'com.amazonaws.s3#CreateBucketOutput$BucketArn', type: ShapeType::String_, memberName: 'BucketArn', memberIndex: 1, traits: [5 => 'x-amz-bucket-arn'])
            ],
            targetClass: CreateBucketOutput::class
        );
    }

    public static function createBucketRequest(): Schema
    {
        if (isset(self::$CreateBucketRequest)) {
            return self::$CreateBucketRequest;
        }

        return self::$CreateBucketRequest = new Schema(
            id: 'com.amazonaws.s3#CreateBucketRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$ACL', type: ShapeType::Enum, memberName: 'ACL', memberIndex: 1, traits: [5 => 'x-amz-acl'], targetClass: BucketCannedACL::class),
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$CreateBucketConfiguration', type: ShapeType::Structure, memberName: 'CreateBucketConfiguration', memberIndex: 2, members: self::createBucketConfiguration()->getMembers(), traits: [0 => 'CreateBucketConfiguration', 7 => true], targetClass: CreateBucketConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$GrantFullControl', type: ShapeType::String_, memberName: 'GrantFullControl', memberIndex: 3, traits: [5 => 'x-amz-grant-full-control']),
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$GrantRead', type: ShapeType::String_, memberName: 'GrantRead', memberIndex: 4, traits: [5 => 'x-amz-grant-read']),
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$GrantReadACP', type: ShapeType::String_, memberName: 'GrantReadACP', memberIndex: 5, traits: [5 => 'x-amz-grant-read-acp']),
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$GrantWrite', type: ShapeType::String_, memberName: 'GrantWrite', memberIndex: 6, traits: [5 => 'x-amz-grant-write']),
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$GrantWriteACP', type: ShapeType::String_, memberName: 'GrantWriteACP', memberIndex: 7, traits: [5 => 'x-amz-grant-write-acp']),
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$ObjectLockEnabledForBucket', type: ShapeType::Boolean, memberName: 'ObjectLockEnabledForBucket', memberIndex: 8, traits: [5 => 'x-amz-bucket-object-lock-enabled']),
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$ObjectOwnership', type: ShapeType::Enum, memberName: 'ObjectOwnership', memberIndex: 9, traits: [5 => 'x-amz-object-ownership'], targetClass: ObjectOwnership::class),
                new Schema(id: 'com.amazonaws.s3#CreateBucketRequest$BucketNamespace', type: ShapeType::Enum, memberName: 'BucketNamespace', memberIndex: 10, traits: [5 => 'x-amz-bucket-namespace'], targetClass: BucketNamespace::class)
            ],
            targetClass: CreateBucketRequest::class
        );
    }

    public static function createMultipartUploadOutput(): Schema
    {
        if (isset(self::$CreateMultipartUploadOutput)) {
            return self::$CreateMultipartUploadOutput;
        }

        return self::$CreateMultipartUploadOutput = new Schema(
            id: 'com.amazonaws.s3#CreateMultipartUploadOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$AbortDate', type: ShapeType::Timestamp, memberName: 'AbortDate', memberIndex: 0, traits: [5 => 'x-amz-abort-date']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$AbortRuleId', type: ShapeType::String_, memberName: 'AbortRuleId', memberIndex: 1, traits: [5 => 'x-amz-abort-rule-id']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 2, traits: [0 => 'Bucket']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$UploadId', type: ShapeType::String_, memberName: 'UploadId', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 5, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 6, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 7, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 8, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$SSEKMSEncryptionContext', type: ShapeType::String_, memberName: 'SSEKMSEncryptionContext', memberIndex: 9, traits: [5 => 'x-amz-server-side-encryption-context', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 10, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 11, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 12, traits: [5 => 'x-amz-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 13, traits: [5 => 'x-amz-checksum-type'], targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 14, traits: [5 => 'x-amz-version-id'])
            ], traits: [0 => 'InitiateMultipartUploadResult'],
            targetClass: CreateMultipartUploadOutput::class
        );
    }

    public static function createMultipartUploadRequest(): Schema
    {
        if (isset(self::$CreateMultipartUploadRequest)) {
            return self::$CreateMultipartUploadRequest;
        }

        return self::$CreateMultipartUploadRequest = new Schema(
            id: 'com.amazonaws.s3#CreateMultipartUploadRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ACL', type: ShapeType::Enum, memberName: 'ACL', memberIndex: 2, traits: [5 => 'x-amz-acl'], targetClass: ObjectCannedACL::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$CacheControl', type: ShapeType::String_, memberName: 'CacheControl', memberIndex: 3, traits: [5 => 'Cache-Control']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ContentDisposition', type: ShapeType::String_, memberName: 'ContentDisposition', memberIndex: 4, traits: [5 => 'Content-Disposition']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ContentEncoding', type: ShapeType::String_, memberName: 'ContentEncoding', memberIndex: 5, traits: [5 => 'Content-Encoding']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ContentLanguage', type: ShapeType::String_, memberName: 'ContentLanguage', memberIndex: 6, traits: [5 => 'Content-Language']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ContentType', type: ShapeType::String_, memberName: 'ContentType', memberIndex: 7, traits: [5 => 'Content-Type']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$Expires', type: ShapeType::String_, memberName: 'Expires', memberIndex: 8, traits: [5 => 'Expires']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$GrantFullControl', type: ShapeType::String_, memberName: 'GrantFullControl', memberIndex: 9, traits: [5 => 'x-amz-grant-full-control']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$GrantRead', type: ShapeType::String_, memberName: 'GrantRead', memberIndex: 10, traits: [5 => 'x-amz-grant-read']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$GrantReadACP', type: ShapeType::String_, memberName: 'GrantReadACP', memberIndex: 11, traits: [5 => 'x-amz-grant-read-acp']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$GrantWriteACP', type: ShapeType::String_, memberName: 'GrantWriteACP', memberIndex: 12, traits: [5 => 'x-amz-grant-write-acp']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$Metadata', type: ShapeType::Map, memberName: 'Metadata', memberIndex: 13, mapKey: SchemasMembers::$shared['com.amazonaws.s3#Metadata$key'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$key', type: ShapeType::String_, memberName: 'key', memberIndex: 0), mapValue: SchemasMembers::$shared['com.amazonaws.s3#Metadata$value'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$value', type: ShapeType::String_, memberName: 'value', memberIndex: 1), traits: [8 => 'x-amz-meta-']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 14, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 15, traits: [5 => 'x-amz-storage-class'], targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$WebsiteRedirectLocation', type: ShapeType::String_, memberName: 'WebsiteRedirectLocation', memberIndex: 16, traits: [5 => 'x-amz-website-redirect-location']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 17, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 18, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 19, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 20, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$SSEKMSEncryptionContext', type: ShapeType::String_, memberName: 'SSEKMSEncryptionContext', memberIndex: 21, traits: [5 => 'x-amz-server-side-encryption-context', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 22, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 23, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$Tagging', type: ShapeType::String_, memberName: 'Tagging', memberIndex: 24, traits: [5 => 'x-amz-tagging']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ObjectLockMode', type: ShapeType::Enum, memberName: 'ObjectLockMode', memberIndex: 25, traits: [5 => 'x-amz-object-lock-mode'], targetClass: ObjectLockMode::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ObjectLockRetainUntilDate', type: ShapeType::Timestamp, memberName: 'ObjectLockRetainUntilDate', memberIndex: 26, traits: [4 => 'date-time', 5 => 'x-amz-object-lock-retain-until-date']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ObjectLockLegalHoldStatus', type: ShapeType::Enum, memberName: 'ObjectLockLegalHoldStatus', memberIndex: 27, traits: [5 => 'x-amz-object-lock-legal-hold'], targetClass: ObjectLockLegalHoldStatus::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ObjectLockEventHold', type: ShapeType::Enum, memberName: 'ObjectLockEventHold', memberIndex: 28, traits: [5 => 'x-amz-object-lock-event-hold'], targetClass: ObjectLockEventHold::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ObjectLockEventHoldDurationDays', type: ShapeType::Integer, memberName: 'ObjectLockEventHoldDurationDays', memberIndex: 29, traits: [5 => 'x-amz-object-lock-event-hold-duration-days']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ObjectLockEventHoldDurationYears', type: ShapeType::Integer, memberName: 'ObjectLockEventHoldDurationYears', memberIndex: 30, traits: [5 => 'x-amz-object-lock-event-hold-duration-years']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 31, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 32, traits: [5 => 'x-amz-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#CreateMultipartUploadRequest$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 33, traits: [5 => 'x-amz-checksum-type'], targetClass: ChecksumType::class)
            ],
            targetClass: CreateMultipartUploadRequest::class
        );
    }

    public static function createSessionOutput(): Schema
    {
        if (isset(self::$CreateSessionOutput)) {
            return self::$CreateSessionOutput;
        }

        return self::$CreateSessionOutput = new Schema(
            id: 'com.amazonaws.s3#CreateSessionOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CreateSessionOutput$Credentials', type: ShapeType::Structure, memberName: 'Credentials', memberIndex: 0, members: self::sessionCredentials()->getMembers(), traits: [0 => 'Credentials', 14 => true], targetClass: SessionCredentials::class),
                new Schema(id: 'com.amazonaws.s3#CreateSessionOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 1, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#CreateSessionOutput$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 2, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CreateSessionOutput$SSEKMSEncryptionContext', type: ShapeType::String_, memberName: 'SSEKMSEncryptionContext', memberIndex: 3, traits: [5 => 'x-amz-server-side-encryption-context', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CreateSessionOutput$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 4, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled'])
            ], traits: [0 => 'CreateSessionResult'],
            targetClass: CreateSessionOutput::class
        );
    }

    public static function createSessionRequest(): Schema
    {
        if (isset(self::$CreateSessionRequest)) {
            return self::$CreateSessionRequest;
        }

        return self::$CreateSessionRequest = new Schema(
            id: 'com.amazonaws.s3#CreateSessionRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#CreateSessionRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#CreateSessionRequest$SessionMode', type: ShapeType::Enum, memberName: 'SessionMode', memberIndex: 1, traits: [5 => 'x-amz-create-session-mode'], targetClass: SessionMode::class),
                new Schema(id: 'com.amazonaws.s3#CreateSessionRequest$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 2, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#CreateSessionRequest$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 3, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CreateSessionRequest$SSEKMSEncryptionContext', type: ShapeType::String_, memberName: 'SSEKMSEncryptionContext', memberIndex: 4, traits: [5 => 'x-amz-server-side-encryption-context', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#CreateSessionRequest$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 5, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled'])
            ],
            targetClass: CreateSessionRequest::class
        );
    }

    public static function defaultRetention(): Schema
    {
        if (isset(self::$DefaultRetention)) {
            return self::$DefaultRetention;
        }

        return self::$DefaultRetention = new Schema(
            id: 'com.amazonaws.s3#DefaultRetention',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DefaultRetention$Mode', type: ShapeType::Enum, memberName: 'Mode', memberIndex: 0, targetClass: ObjectLockRetentionMode::class),
                new Schema(id: 'com.amazonaws.s3#DefaultRetention$Days', type: ShapeType::Integer, memberName: 'Days', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#DefaultRetention$Years', type: ShapeType::Integer, memberName: 'Years', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#DefaultRetention$DefaultEventHold', type: ShapeType::Structure, memberName: 'DefaultEventHold', memberIndex: 3, members: self::eventHoldDuration()->getMembers(), targetClass: EventHoldDuration::class)
            ],
            targetClass: DefaultRetention::class
        );
    }

    public static function delete(): Schema
    {
        if (isset(self::$Delete)) {
            return self::$Delete;
        }

        return self::$Delete = new Schema(
            id: 'com.amazonaws.s3#Delete',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Delete$Objects', type: ShapeType::List_, memberName: 'Objects', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#ObjectIdentifierList$member'] ??= new Schema(id: 'com.amazonaws.s3#ObjectIdentifierList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::objectIdentifier()->getMembers(), targetClass: ObjectIdentifier::class), traits: [0 => 'Object', 3 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#Delete$Quiet', type: ShapeType::Boolean, memberName: 'Quiet', memberIndex: 1)
            ],
            targetClass: Delete::class
        );
    }

    public static function deleteBucketAnalyticsConfigurationRequest(): Schema
    {
        if (isset(self::$DeleteBucketAnalyticsConfigurationRequest)) {
            return self::$DeleteBucketAnalyticsConfigurationRequest;
        }

        return self::$DeleteBucketAnalyticsConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketAnalyticsConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketAnalyticsConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketAnalyticsConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketAnalyticsConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketAnalyticsConfigurationRequest::class
        );
    }

    public static function deleteBucketCorsRequest(): Schema
    {
        if (isset(self::$DeleteBucketCorsRequest)) {
            return self::$DeleteBucketCorsRequest;
        }

        return self::$DeleteBucketCorsRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketCorsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketCorsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketCorsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketCorsRequest::class
        );
    }

    public static function deleteBucketEncryptionRequest(): Schema
    {
        if (isset(self::$DeleteBucketEncryptionRequest)) {
            return self::$DeleteBucketEncryptionRequest;
        }

        return self::$DeleteBucketEncryptionRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketEncryptionRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketEncryptionRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketEncryptionRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketEncryptionRequest::class
        );
    }

    public static function deleteBucketIntelligentTieringConfigurationRequest(): Schema
    {
        if (isset(self::$DeleteBucketIntelligentTieringConfigurationRequest)) {
            return self::$DeleteBucketIntelligentTieringConfigurationRequest;
        }

        return self::$DeleteBucketIntelligentTieringConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketIntelligentTieringConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketIntelligentTieringConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketIntelligentTieringConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketIntelligentTieringConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketIntelligentTieringConfigurationRequest::class
        );
    }

    public static function deleteBucketInventoryConfigurationRequest(): Schema
    {
        if (isset(self::$DeleteBucketInventoryConfigurationRequest)) {
            return self::$DeleteBucketInventoryConfigurationRequest;
        }

        return self::$DeleteBucketInventoryConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketInventoryConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketInventoryConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketInventoryConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketInventoryConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketInventoryConfigurationRequest::class
        );
    }

    public static function deleteBucketLifecycleRequest(): Schema
    {
        if (isset(self::$DeleteBucketLifecycleRequest)) {
            return self::$DeleteBucketLifecycleRequest;
        }

        return self::$DeleteBucketLifecycleRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketLifecycleRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketLifecycleRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketLifecycleRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketLifecycleRequest::class
        );
    }

    public static function deleteBucketMetadataConfigurationRequest(): Schema
    {
        if (isset(self::$DeleteBucketMetadataConfigurationRequest)) {
            return self::$DeleteBucketMetadataConfigurationRequest;
        }

        return self::$DeleteBucketMetadataConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketMetadataConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketMetadataConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketMetadataConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketMetadataConfigurationRequest::class
        );
    }

    public static function deleteBucketMetadataTableConfigurationRequest(): Schema
    {
        if (isset(self::$DeleteBucketMetadataTableConfigurationRequest)) {
            return self::$DeleteBucketMetadataTableConfigurationRequest;
        }

        return self::$DeleteBucketMetadataTableConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketMetadataTableConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketMetadataTableConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketMetadataTableConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketMetadataTableConfigurationRequest::class
        );
    }

    public static function deleteBucketMetricsConfigurationRequest(): Schema
    {
        if (isset(self::$DeleteBucketMetricsConfigurationRequest)) {
            return self::$DeleteBucketMetricsConfigurationRequest;
        }

        return self::$DeleteBucketMetricsConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketMetricsConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketMetricsConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketMetricsConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketMetricsConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketMetricsConfigurationRequest::class
        );
    }

    public static function deleteBucketOwnershipControlsRequest(): Schema
    {
        if (isset(self::$DeleteBucketOwnershipControlsRequest)) {
            return self::$DeleteBucketOwnershipControlsRequest;
        }

        return self::$DeleteBucketOwnershipControlsRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketOwnershipControlsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketOwnershipControlsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketOwnershipControlsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketOwnershipControlsRequest::class
        );
    }

    public static function deleteBucketPolicyRequest(): Schema
    {
        if (isset(self::$DeleteBucketPolicyRequest)) {
            return self::$DeleteBucketPolicyRequest;
        }

        return self::$DeleteBucketPolicyRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketPolicyRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketPolicyRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketPolicyRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketPolicyRequest::class
        );
    }

    public static function deleteBucketReplicationRequest(): Schema
    {
        if (isset(self::$DeleteBucketReplicationRequest)) {
            return self::$DeleteBucketReplicationRequest;
        }

        return self::$DeleteBucketReplicationRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketReplicationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketReplicationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketReplicationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketReplicationRequest::class
        );
    }

    public static function deleteBucketRequest(): Schema
    {
        if (isset(self::$DeleteBucketRequest)) {
            return self::$DeleteBucketRequest;
        }

        return self::$DeleteBucketRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketRequest::class
        );
    }

    public static function deleteBucketTaggingRequest(): Schema
    {
        if (isset(self::$DeleteBucketTaggingRequest)) {
            return self::$DeleteBucketTaggingRequest;
        }

        return self::$DeleteBucketTaggingRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketTaggingRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketTaggingRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketTaggingRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketTaggingRequest::class
        );
    }

    public static function deleteBucketWebsiteRequest(): Schema
    {
        if (isset(self::$DeleteBucketWebsiteRequest)) {
            return self::$DeleteBucketWebsiteRequest;
        }

        return self::$DeleteBucketWebsiteRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteBucketWebsiteRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteBucketWebsiteRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteBucketWebsiteRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteBucketWebsiteRequest::class
        );
    }

    public static function deleteMarkerEntry(): Schema
    {
        if (isset(self::$DeleteMarkerEntry)) {
            return self::$DeleteMarkerEntry;
        }

        return self::$DeleteMarkerEntry = new Schema(
            id: 'com.amazonaws.s3#DeleteMarkerEntry',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteMarkerEntry$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 0, members: self::owner()->getMembers(), targetClass: Owner::class),
                new Schema(id: 'com.amazonaws.s3#DeleteMarkerEntry$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#DeleteMarkerEntry$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#DeleteMarkerEntry$IsLatest', type: ShapeType::Boolean, memberName: 'IsLatest', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#DeleteMarkerEntry$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 4)
            ],
            targetClass: DeleteMarkerEntry::class
        );
    }

    public static function deleteMarkerReplication(): Schema
    {
        if (isset(self::$DeleteMarkerReplication)) {
            return self::$DeleteMarkerReplication;
        }

        return self::$DeleteMarkerReplication = new Schema(
            id: 'com.amazonaws.s3#DeleteMarkerReplication',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteMarkerReplication$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, targetClass: DeleteMarkerReplicationStatus::class)
            ],
            targetClass: DeleteMarkerReplication::class
        );
    }

    public static function deleteObjectAnnotationOutput(): Schema
    {
        if (isset(self::$DeleteObjectAnnotationOutput)) {
            return self::$DeleteObjectAnnotationOutput;
        }

        return self::$DeleteObjectAnnotationOutput = new Schema(
            id: 'com.amazonaws.s3#DeleteObjectAnnotationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteObjectAnnotationOutput$ObjectVersionId', type: ShapeType::String_, memberName: 'ObjectVersionId', memberIndex: 0, traits: [5 => 'x-amz-object-version-id']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectAnnotationOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 1, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: DeleteObjectAnnotationOutput::class
        );
    }

    public static function deleteObjectAnnotationRequest(): Schema
    {
        if (isset(self::$DeleteObjectAnnotationRequest)) {
            return self::$DeleteObjectAnnotationRequest;
        }

        return self::$DeleteObjectAnnotationRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteObjectAnnotationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteObjectAnnotationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectAnnotationRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectAnnotationRequest$AnnotationName', type: ShapeType::String_, memberName: 'AnnotationName', memberIndex: 2, traits: [9 => 'annotationName', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectAnnotationRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 3, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectAnnotationRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 4, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectAnnotationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 5, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectAnnotationRequest$ObjectIfMatch', type: ShapeType::String_, memberName: 'ObjectIfMatch', memberIndex: 6, traits: [5 => 'x-amz-object-if-match'])
            ],
            targetClass: DeleteObjectAnnotationRequest::class
        );
    }

    public static function deleteObjectOutput(): Schema
    {
        if (isset(self::$DeleteObjectOutput)) {
            return self::$DeleteObjectOutput;
        }

        return self::$DeleteObjectOutput = new Schema(
            id: 'com.amazonaws.s3#DeleteObjectOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteObjectOutput$DeleteMarker', type: ShapeType::Boolean, memberName: 'DeleteMarker', memberIndex: 0, traits: [5 => 'x-amz-delete-marker']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 1, traits: [5 => 'x-amz-version-id']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 2, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: DeleteObjectOutput::class
        );
    }

    public static function deleteObjectRequest(): Schema
    {
        if (isset(self::$DeleteObjectRequest)) {
            return self::$DeleteObjectRequest;
        }

        return self::$DeleteObjectRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteObjectRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteObjectRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectRequest$MFA', type: ShapeType::String_, memberName: 'MFA', memberIndex: 2, traits: [5 => 'x-amz-mfa']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 3, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 4, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectRequest$BypassGovernanceRetention', type: ShapeType::Boolean, memberName: 'BypassGovernanceRetention', memberIndex: 5, traits: [5 => 'x-amz-bypass-governance-retention']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 6, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectRequest$IfMatch', type: ShapeType::String_, memberName: 'IfMatch', memberIndex: 7, traits: [5 => 'If-Match']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectRequest$IfMatchLastModifiedTime', type: ShapeType::Timestamp, memberName: 'IfMatchLastModifiedTime', memberIndex: 8, traits: [4 => 'http-date', 5 => 'x-amz-if-match-last-modified-time']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectRequest$IfMatchSize', type: ShapeType::Long, memberName: 'IfMatchSize', memberIndex: 9, traits: [5 => 'x-amz-if-match-size'])
            ],
            targetClass: DeleteObjectRequest::class
        );
    }

    public static function deleteObjectTaggingOutput(): Schema
    {
        if (isset(self::$DeleteObjectTaggingOutput)) {
            return self::$DeleteObjectTaggingOutput;
        }

        return self::$DeleteObjectTaggingOutput = new Schema(
            id: 'com.amazonaws.s3#DeleteObjectTaggingOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteObjectTaggingOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 0, traits: [5 => 'x-amz-version-id'])
            ],
            targetClass: DeleteObjectTaggingOutput::class
        );
    }

    public static function deleteObjectTaggingRequest(): Schema
    {
        if (isset(self::$DeleteObjectTaggingRequest)) {
            return self::$DeleteObjectTaggingRequest;
        }

        return self::$DeleteObjectTaggingRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteObjectTaggingRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteObjectTaggingRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectTaggingRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectTaggingRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 2, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectTaggingRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 3, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeleteObjectTaggingRequest::class
        );
    }

    public static function deleteObjectsOutput(): Schema
    {
        if (isset(self::$DeleteObjectsOutput)) {
            return self::$DeleteObjectsOutput;
        }

        return self::$DeleteObjectsOutput = new Schema(
            id: 'com.amazonaws.s3#DeleteObjectsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteObjectsOutput$Deleted', type: ShapeType::List_, memberName: 'Deleted', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#DeletedObjects$member'] ??= new Schema(id: 'com.amazonaws.s3#DeletedObjects$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::deletedObject()->getMembers(), targetClass: DeletedObject::class), traits: [3 => true]),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectsOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 1, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectsOutput$Errors', type: ShapeType::List_, memberName: 'Errors', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#Errors$member'] ??= new Schema(id: 'com.amazonaws.s3#Errors$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::error()->getMembers(), targetClass: Error::class), traits: [0 => 'Error', 3 => true])
            ], traits: [0 => 'DeleteResult'],
            targetClass: DeleteObjectsOutput::class
        );
    }

    public static function deleteObjectsRequest(): Schema
    {
        if (isset(self::$DeleteObjectsRequest)) {
            return self::$DeleteObjectsRequest;
        }

        return self::$DeleteObjectsRequest = new Schema(
            id: 'com.amazonaws.s3#DeleteObjectsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeleteObjectsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectsRequest$Delete', type: ShapeType::Structure, memberName: 'Delete', memberIndex: 1, members: self::delete()->getMembers(), traits: [0 => 'Delete', 7 => true, 14 => true], targetClass: Delete::class),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectsRequest$MFA', type: ShapeType::String_, memberName: 'MFA', memberIndex: 2, traits: [5 => 'x-amz-mfa']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectsRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 3, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectsRequest$BypassGovernanceRetention', type: ShapeType::Boolean, memberName: 'BypassGovernanceRetention', memberIndex: 4, traits: [5 => 'x-amz-bypass-governance-retention']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 5, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#DeleteObjectsRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 6, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class)
            ],
            targetClass: DeleteObjectsRequest::class
        );
    }

    public static function deletePublicAccessBlockRequest(): Schema
    {
        if (isset(self::$DeletePublicAccessBlockRequest)) {
            return self::$DeletePublicAccessBlockRequest;
        }

        return self::$DeletePublicAccessBlockRequest = new Schema(
            id: 'com.amazonaws.s3#DeletePublicAccessBlockRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeletePublicAccessBlockRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#DeletePublicAccessBlockRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: DeletePublicAccessBlockRequest::class
        );
    }

    public static function deletedObject(): Schema
    {
        if (isset(self::$DeletedObject)) {
            return self::$DeletedObject;
        }

        return self::$DeletedObject = new Schema(
            id: 'com.amazonaws.s3#DeletedObject',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DeletedObject$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#DeletedObject$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#DeletedObject$DeleteMarker', type: ShapeType::Boolean, memberName: 'DeleteMarker', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#DeletedObject$DeleteMarkerVersionId', type: ShapeType::String_, memberName: 'DeleteMarkerVersionId', memberIndex: 3)
            ],
            targetClass: DeletedObject::class
        );
    }

    public static function destination(): Schema
    {
        if (isset(self::$Destination)) {
            return self::$Destination;
        }

        return self::$Destination = new Schema(
            id: 'com.amazonaws.s3#Destination',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Destination$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#Destination$Account', type: ShapeType::String_, memberName: 'Account', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Destination$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 2, targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#Destination$AccessControlTranslation', type: ShapeType::Structure, memberName: 'AccessControlTranslation', memberIndex: 3, members: self::accessControlTranslation()->getMembers(), targetClass: AccessControlTranslation::class),
                new Schema(id: 'com.amazonaws.s3#Destination$EncryptionConfiguration', type: ShapeType::Structure, memberName: 'EncryptionConfiguration', memberIndex: 4, members: self::encryptionConfiguration()->getMembers(), targetClass: EncryptionConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#Destination$ReplicationTime', type: ShapeType::Structure, memberName: 'ReplicationTime', memberIndex: 5, members: self::replicationTime()->getMembers(), targetClass: ReplicationTime::class),
                new Schema(id: 'com.amazonaws.s3#Destination$Metrics', type: ShapeType::Structure, memberName: 'Metrics', memberIndex: 6, members: self::metrics()->getMembers(), targetClass: Metrics::class)
            ],
            targetClass: Destination::class
        );
    }

    public static function destinationResult(): Schema
    {
        if (isset(self::$DestinationResult)) {
            return self::$DestinationResult;
        }

        return self::$DestinationResult = new Schema(
            id: 'com.amazonaws.s3#DestinationResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#DestinationResult$TableBucketType', type: ShapeType::Enum, memberName: 'TableBucketType', memberIndex: 0, targetClass: S3TablesBucketType::class),
                new Schema(id: 'com.amazonaws.s3#DestinationResult$TableBucketArn', type: ShapeType::String_, memberName: 'TableBucketArn', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#DestinationResult$TableNamespace', type: ShapeType::String_, memberName: 'TableNamespace', memberIndex: 2)
            ],
            targetClass: DestinationResult::class
        );
    }

    public static function encryption(): Schema
    {
        if (isset(self::$Encryption)) {
            return self::$Encryption;
        }

        return self::$Encryption = new Schema(
            id: 'com.amazonaws.s3#Encryption',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Encryption$EncryptionType', type: ShapeType::Enum, memberName: 'EncryptionType', memberIndex: 0, traits: [14 => true], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#Encryption$KMSKeyId', type: ShapeType::String_, memberName: 'KMSKeyId', memberIndex: 1, traits: [20 => true]),
                new Schema(id: 'com.amazonaws.s3#Encryption$KMSContext', type: ShapeType::String_, memberName: 'KMSContext', memberIndex: 2)
            ],
            targetClass: Encryption::class
        );
    }

    public static function encryptionConfiguration(): Schema
    {
        if (isset(self::$EncryptionConfiguration)) {
            return self::$EncryptionConfiguration;
        }

        return self::$EncryptionConfiguration = new Schema(
            id: 'com.amazonaws.s3#EncryptionConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#EncryptionConfiguration$ReplicaKmsKeyID', type: ShapeType::String_, memberName: 'ReplicaKmsKeyID', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#EncryptionConfiguration$UseSourceMultiRegionKey', type: ShapeType::Structure, memberName: 'UseSourceMultiRegionKey', memberIndex: 1, members: self::useSourceMultiRegionKey()->getMembers(), targetClass: UseSourceMultiRegionKey::class)
            ],
            targetClass: EncryptionConfiguration::class
        );
    }

    public static function encryptionTypeMismatchException(): Schema
    {
        if (isset(self::$EncryptionTypeMismatchException)) {
            return self::$EncryptionTypeMismatchException;
        }

        return self::$EncryptionTypeMismatchException = new Schema(
            id: 'com.amazonaws.s3#EncryptionTypeMismatch',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: EncryptionTypeMismatchException::class
        );
    }

    public static function endEvent(): Schema
    {
        if (isset(self::$EndEvent)) {
            return self::$EndEvent;
        }

        return self::$EndEvent = new Schema(
            id: 'com.amazonaws.s3#EndEvent',
            type: ShapeType::Structure,
            members: [
            ],
            targetClass: EndEvent::class
        );
    }

    public static function error(): Schema
    {
        if (isset(self::$Error)) {
            return self::$Error;
        }

        return self::$Error = new Schema(
            id: 'com.amazonaws.s3#Error',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Error$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Error$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Error$Code', type: ShapeType::String_, memberName: 'Code', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#Error$Message', type: ShapeType::String_, memberName: 'Message', memberIndex: 3)
            ],
            targetClass: Error::class
        );
    }

    public static function errorDetails(): Schema
    {
        if (isset(self::$ErrorDetails)) {
            return self::$ErrorDetails;
        }

        return self::$ErrorDetails = new Schema(
            id: 'com.amazonaws.s3#ErrorDetails',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ErrorDetails$ErrorCode', type: ShapeType::String_, memberName: 'ErrorCode', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ErrorDetails$ErrorMessage', type: ShapeType::String_, memberName: 'ErrorMessage', memberIndex: 1)
            ],
            targetClass: ErrorDetails::class
        );
    }

    public static function errorDocument(): Schema
    {
        if (isset(self::$ErrorDocument)) {
            return self::$ErrorDocument;
        }

        return self::$ErrorDocument = new Schema(
            id: 'com.amazonaws.s3#ErrorDocument',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ErrorDocument$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 0, traits: [14 => true])
            ],
            targetClass: ErrorDocument::class
        );
    }

    public static function eventBridgeConfiguration(): Schema
    {
        if (isset(self::$EventBridgeConfiguration)) {
            return self::$EventBridgeConfiguration;
        }

        return self::$EventBridgeConfiguration = new Schema(
            id: 'com.amazonaws.s3#EventBridgeConfiguration',
            type: ShapeType::Structure,
            members: [
            ],
            targetClass: EventBridgeConfiguration::class
        );
    }

    public static function eventHoldDuration(): Schema
    {
        if (isset(self::$EventHoldDuration)) {
            return self::$EventHoldDuration;
        }

        return self::$EventHoldDuration = new Schema(
            id: 'com.amazonaws.s3#EventHoldDuration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#EventHoldDuration$Days', type: ShapeType::Integer, memberName: 'Days', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#EventHoldDuration$Years', type: ShapeType::Integer, memberName: 'Years', memberIndex: 1)
            ],
            targetClass: EventHoldDuration::class
        );
    }

    public static function existingObjectReplication(): Schema
    {
        if (isset(self::$ExistingObjectReplication)) {
            return self::$ExistingObjectReplication;
        }

        return self::$ExistingObjectReplication = new Schema(
            id: 'com.amazonaws.s3#ExistingObjectReplication',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ExistingObjectReplication$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: ExistingObjectReplicationStatus::class)
            ],
            targetClass: ExistingObjectReplication::class
        );
    }

    public static function filterRule(): Schema
    {
        if (isset(self::$FilterRule)) {
            return self::$FilterRule;
        }

        return self::$FilterRule = new Schema(
            id: 'com.amazonaws.s3#FilterRule',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#FilterRule$Name', type: ShapeType::Enum, memberName: 'Name', memberIndex: 0, targetClass: FilterRuleName::class),
                new Schema(id: 'com.amazonaws.s3#FilterRule$Value', type: ShapeType::String_, memberName: 'Value', memberIndex: 1)
            ],
            targetClass: FilterRule::class
        );
    }

    public static function getBucketAbacOutput(): Schema
    {
        if (isset(self::$GetBucketAbacOutput)) {
            return self::$GetBucketAbacOutput;
        }

        return self::$GetBucketAbacOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketAbacOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketAbacOutput$AbacStatus', type: ShapeType::Structure, memberName: 'AbacStatus', memberIndex: 0, members: self::abacStatus()->getMembers(), traits: [7 => true], targetClass: AbacStatus::class)
            ],
            targetClass: GetBucketAbacOutput::class
        );
    }

    public static function getBucketAbacRequest(): Schema
    {
        if (isset(self::$GetBucketAbacRequest)) {
            return self::$GetBucketAbacRequest;
        }

        return self::$GetBucketAbacRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketAbacRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketAbacRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketAbacRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketAbacRequest::class
        );
    }

    public static function getBucketAccelerateConfigurationOutput(): Schema
    {
        if (isset(self::$GetBucketAccelerateConfigurationOutput)) {
            return self::$GetBucketAccelerateConfigurationOutput;
        }

        return self::$GetBucketAccelerateConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketAccelerateConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketAccelerateConfigurationOutput$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, targetClass: BucketAccelerateStatus::class),
                new Schema(id: 'com.amazonaws.s3#GetBucketAccelerateConfigurationOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 1, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ], traits: [0 => 'AccelerateConfiguration'],
            targetClass: GetBucketAccelerateConfigurationOutput::class
        );
    }

    public static function getBucketAccelerateConfigurationRequest(): Schema
    {
        if (isset(self::$GetBucketAccelerateConfigurationRequest)) {
            return self::$GetBucketAccelerateConfigurationRequest;
        }

        return self::$GetBucketAccelerateConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketAccelerateConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketAccelerateConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketAccelerateConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#GetBucketAccelerateConfigurationRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 2, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class)
            ],
            targetClass: GetBucketAccelerateConfigurationRequest::class
        );
    }

    public static function getBucketAclOutput(): Schema
    {
        if (isset(self::$GetBucketAclOutput)) {
            return self::$GetBucketAclOutput;
        }

        return self::$GetBucketAclOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketAclOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketAclOutput$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 0, members: self::owner()->getMembers(), targetClass: Owner::class),
                new Schema(id: 'com.amazonaws.s3#GetBucketAclOutput$Grants', type: ShapeType::List_, memberName: 'Grants', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#Grants$member'] ??= new Schema(id: 'com.amazonaws.s3#Grants$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::grant()->getMembers(), traits: [0 => 'Grant'], targetClass: Grant::class), traits: [0 => 'AccessControlList'])
            ], traits: [0 => 'AccessControlPolicy'],
            targetClass: GetBucketAclOutput::class
        );
    }

    public static function getBucketAclRequest(): Schema
    {
        if (isset(self::$GetBucketAclRequest)) {
            return self::$GetBucketAclRequest;
        }

        return self::$GetBucketAclRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketAclRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketAclRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketAclRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketAclRequest::class
        );
    }

    public static function getBucketAnalyticsConfigurationOutput(): Schema
    {
        if (isset(self::$GetBucketAnalyticsConfigurationOutput)) {
            return self::$GetBucketAnalyticsConfigurationOutput;
        }

        return self::$GetBucketAnalyticsConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketAnalyticsConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketAnalyticsConfigurationOutput$AnalyticsConfiguration', type: ShapeType::Structure, memberName: 'AnalyticsConfiguration', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$StorageClassAnalysis', type: ShapeType::Structure, memberName: 'StorageClassAnalysis', memberIndex: 1, traits: [14 => true], targetClass: StorageClassAnalysis::class), new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$Filter', type: ShapeType::Union, memberName: 'Filter', memberIndex: 2, targetClass: AnalyticsFilter::class)], traits: [7 => true], targetClass: AnalyticsConfiguration::class)
            ],
            targetClass: GetBucketAnalyticsConfigurationOutput::class
        );
    }

    public static function getBucketAnalyticsConfigurationRequest(): Schema
    {
        if (isset(self::$GetBucketAnalyticsConfigurationRequest)) {
            return self::$GetBucketAnalyticsConfigurationRequest;
        }

        return self::$GetBucketAnalyticsConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketAnalyticsConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketAnalyticsConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketAnalyticsConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetBucketAnalyticsConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketAnalyticsConfigurationRequest::class
        );
    }

    public static function getBucketCorsOutput(): Schema
    {
        if (isset(self::$GetBucketCorsOutput)) {
            return self::$GetBucketCorsOutput;
        }

        return self::$GetBucketCorsOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketCorsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketCorsOutput$CORSRules', type: ShapeType::List_, memberName: 'CORSRules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#CORSRules$member'] ??= new Schema(id: 'com.amazonaws.s3#CORSRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::cORSRule()->getMembers(), targetClass: CORSRule::class), traits: [0 => 'CORSRule', 3 => true])
            ], traits: [0 => 'CORSConfiguration'],
            targetClass: GetBucketCorsOutput::class
        );
    }

    public static function getBucketCorsRequest(): Schema
    {
        if (isset(self::$GetBucketCorsRequest)) {
            return self::$GetBucketCorsRequest;
        }

        return self::$GetBucketCorsRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketCorsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketCorsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketCorsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketCorsRequest::class
        );
    }

    public static function getBucketEncryptionOutput(): Schema
    {
        if (isset(self::$GetBucketEncryptionOutput)) {
            return self::$GetBucketEncryptionOutput;
        }

        return self::$GetBucketEncryptionOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketEncryptionOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketEncryptionOutput$ServerSideEncryptionConfiguration', type: ShapeType::Structure, memberName: 'ServerSideEncryptionConfiguration', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionConfiguration$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#ServerSideEncryptionRules$member'] ??= new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::serverSideEncryptionRule()->getMembers(), targetClass: ServerSideEncryptionRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])], traits: [7 => true], targetClass: ServerSideEncryptionConfiguration::class)
            ],
            targetClass: GetBucketEncryptionOutput::class
        );
    }

    public static function getBucketEncryptionRequest(): Schema
    {
        if (isset(self::$GetBucketEncryptionRequest)) {
            return self::$GetBucketEncryptionRequest;
        }

        return self::$GetBucketEncryptionRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketEncryptionRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketEncryptionRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketEncryptionRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketEncryptionRequest::class
        );
    }

    public static function getBucketIntelligentTieringConfigurationOutput(): Schema
    {
        if (isset(self::$GetBucketIntelligentTieringConfigurationOutput)) {
            return self::$GetBucketIntelligentTieringConfigurationOutput;
        }

        return self::$GetBucketIntelligentTieringConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketIntelligentTieringConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketIntelligentTieringConfigurationOutput$IntelligentTieringConfiguration', type: ShapeType::Structure, memberName: 'IntelligentTieringConfiguration', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 1, traits: [14 => true], targetClass: IntelligentTieringStatus::class), new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Tierings', type: ShapeType::List_, memberName: 'Tierings', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#TieringList$member'] ??= new Schema(id: 'com.amazonaws.s3#TieringList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tiering()->getMembers(), targetClass: Tiering::class), traits: [0 => 'Tiering', 3 => true, 14 => true]), new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 3, targetClass: IntelligentTieringFilter::class)], traits: [7 => true], targetClass: IntelligentTieringConfiguration::class)
            ],
            targetClass: GetBucketIntelligentTieringConfigurationOutput::class
        );
    }

    public static function getBucketIntelligentTieringConfigurationRequest(): Schema
    {
        if (isset(self::$GetBucketIntelligentTieringConfigurationRequest)) {
            return self::$GetBucketIntelligentTieringConfigurationRequest;
        }

        return self::$GetBucketIntelligentTieringConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketIntelligentTieringConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketIntelligentTieringConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketIntelligentTieringConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetBucketIntelligentTieringConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketIntelligentTieringConfigurationRequest::class
        );
    }

    public static function getBucketInventoryConfigurationOutput(): Schema
    {
        if (isset(self::$GetBucketInventoryConfigurationOutput)) {
            return self::$GetBucketInventoryConfigurationOutput;
        }

        return self::$GetBucketInventoryConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketInventoryConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketInventoryConfigurationOutput$InventoryConfiguration', type: ShapeType::Structure, memberName: 'InventoryConfiguration', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Destination', type: ShapeType::Structure, memberName: 'Destination', memberIndex: 0, traits: [14 => true], targetClass: InventoryDestination::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$IsEnabled', type: ShapeType::Boolean, memberName: 'IsEnabled', memberIndex: 1, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 2, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$IncludedObjectVersions', type: ShapeType::Enum, memberName: 'IncludedObjectVersions', memberIndex: 3, traits: [14 => true], targetClass: InventoryIncludedObjectVersions::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Schedule', type: ShapeType::Structure, memberName: 'Schedule', memberIndex: 4, traits: [14 => true], targetClass: InventorySchedule::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 5, targetClass: InventoryFilter::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$OptionalFields', type: ShapeType::List_, memberName: 'OptionalFields', memberIndex: 6, listMember: SchemasMembers::$shared['com.amazonaws.s3#InventoryOptionalFields$member'] ??= new Schema(id: 'com.amazonaws.s3#InventoryOptionalFields$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, traits: [0 => 'Field'], targetClass: InventoryOptionalField::class))], traits: [7 => true], targetClass: InventoryConfiguration::class)
            ],
            targetClass: GetBucketInventoryConfigurationOutput::class
        );
    }

    public static function getBucketInventoryConfigurationRequest(): Schema
    {
        if (isset(self::$GetBucketInventoryConfigurationRequest)) {
            return self::$GetBucketInventoryConfigurationRequest;
        }

        return self::$GetBucketInventoryConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketInventoryConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketInventoryConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketInventoryConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetBucketInventoryConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketInventoryConfigurationRequest::class
        );
    }

    public static function getBucketLifecycleConfigurationOutput(): Schema
    {
        if (isset(self::$GetBucketLifecycleConfigurationOutput)) {
            return self::$GetBucketLifecycleConfigurationOutput;
        }

        return self::$GetBucketLifecycleConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketLifecycleConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketLifecycleConfigurationOutput$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#LifecycleRules$member'] ??= new Schema(id: 'com.amazonaws.s3#LifecycleRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::lifecycleRule()->getMembers(), targetClass: LifecycleRule::class), traits: [0 => 'Rule', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#GetBucketLifecycleConfigurationOutput$TransitionDefaultMinimumObjectSize', type: ShapeType::Enum, memberName: 'TransitionDefaultMinimumObjectSize', memberIndex: 1, traits: [5 => 'x-amz-transition-default-minimum-object-size'], targetClass: TransitionDefaultMinimumObjectSize::class)
            ], traits: [0 => 'LifecycleConfiguration'],
            targetClass: GetBucketLifecycleConfigurationOutput::class
        );
    }

    public static function getBucketLifecycleConfigurationRequest(): Schema
    {
        if (isset(self::$GetBucketLifecycleConfigurationRequest)) {
            return self::$GetBucketLifecycleConfigurationRequest;
        }

        return self::$GetBucketLifecycleConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketLifecycleConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketLifecycleConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketLifecycleConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketLifecycleConfigurationRequest::class
        );
    }

    public static function getBucketLocationOutput(): Schema
    {
        if (isset(self::$GetBucketLocationOutput)) {
            return self::$GetBucketLocationOutput;
        }

        return self::$GetBucketLocationOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketLocationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketLocationOutput$LocationConstraint', type: ShapeType::Enum, memberName: 'LocationConstraint', memberIndex: 0, targetClass: BucketLocationConstraint::class)
            ], traits: [0 => 'LocationConstraint'],
            targetClass: GetBucketLocationOutput::class
        );
    }

    public static function getBucketLocationRequest(): Schema
    {
        if (isset(self::$GetBucketLocationRequest)) {
            return self::$GetBucketLocationRequest;
        }

        return self::$GetBucketLocationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketLocationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketLocationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketLocationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketLocationRequest::class
        );
    }

    public static function getBucketLoggingOutput(): Schema
    {
        if (isset(self::$GetBucketLoggingOutput)) {
            return self::$GetBucketLoggingOutput;
        }

        return self::$GetBucketLoggingOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketLoggingOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketLoggingOutput$LoggingEnabled', type: ShapeType::Structure, memberName: 'LoggingEnabled', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetBucket', type: ShapeType::String_, memberName: 'TargetBucket', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetPrefix', type: ShapeType::String_, memberName: 'TargetPrefix', memberIndex: 1, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetGrants', type: ShapeType::List_, memberName: 'TargetGrants', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#TargetGrants$member'] ??= new Schema(id: 'com.amazonaws.s3#TargetGrants$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::targetGrant()->getMembers(), traits: [0 => 'Grant'], targetClass: TargetGrant::class)), new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetObjectKeyFormat', type: ShapeType::Structure, memberName: 'TargetObjectKeyFormat', memberIndex: 3, targetClass: TargetObjectKeyFormat::class)], targetClass: LoggingEnabled::class)
            ], traits: [0 => 'BucketLoggingStatus'],
            targetClass: GetBucketLoggingOutput::class
        );
    }

    public static function getBucketLoggingRequest(): Schema
    {
        if (isset(self::$GetBucketLoggingRequest)) {
            return self::$GetBucketLoggingRequest;
        }

        return self::$GetBucketLoggingRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketLoggingRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketLoggingRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketLoggingRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketLoggingRequest::class
        );
    }

    public static function getBucketMetadataConfigurationOutput(): Schema
    {
        if (isset(self::$GetBucketMetadataConfigurationOutput)) {
            return self::$GetBucketMetadataConfigurationOutput;
        }

        return self::$GetBucketMetadataConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketMetadataConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketMetadataConfigurationOutput$GetBucketMetadataConfigurationResult', type: ShapeType::Structure, memberName: 'GetBucketMetadataConfigurationResult', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#GetBucketMetadataConfigurationResult$MetadataConfigurationResult', type: ShapeType::Structure, memberName: 'MetadataConfigurationResult', memberIndex: 0, traits: [14 => true], targetClass: MetadataConfigurationResult::class)], traits: [7 => true], targetClass: GetBucketMetadataConfigurationResult::class)
            ],
            targetClass: GetBucketMetadataConfigurationOutput::class
        );
    }

    public static function getBucketMetadataConfigurationRequest(): Schema
    {
        if (isset(self::$GetBucketMetadataConfigurationRequest)) {
            return self::$GetBucketMetadataConfigurationRequest;
        }

        return self::$GetBucketMetadataConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketMetadataConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketMetadataConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketMetadataConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketMetadataConfigurationRequest::class
        );
    }

    public static function getBucketMetadataConfigurationResult(): Schema
    {
        if (isset(self::$GetBucketMetadataConfigurationResult)) {
            return self::$GetBucketMetadataConfigurationResult;
        }

        return self::$GetBucketMetadataConfigurationResult = new Schema(
            id: 'com.amazonaws.s3#GetBucketMetadataConfigurationResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketMetadataConfigurationResult$MetadataConfigurationResult', type: ShapeType::Structure, memberName: 'MetadataConfigurationResult', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#MetadataConfigurationResult$DestinationResult', type: ShapeType::Structure, memberName: 'DestinationResult', memberIndex: 0, traits: [14 => true], targetClass: DestinationResult::class), new Schema(id: 'com.amazonaws.s3#MetadataConfigurationResult$JournalTableConfigurationResult', type: ShapeType::Structure, memberName: 'JournalTableConfigurationResult', memberIndex: 1, targetClass: JournalTableConfigurationResult::class), new Schema(id: 'com.amazonaws.s3#MetadataConfigurationResult$InventoryTableConfigurationResult', type: ShapeType::Structure, memberName: 'InventoryTableConfigurationResult', memberIndex: 2, targetClass: InventoryTableConfigurationResult::class), new Schema(id: 'com.amazonaws.s3#MetadataConfigurationResult$AnnotationTableConfigurationResult', type: ShapeType::Structure, memberName: 'AnnotationTableConfigurationResult', memberIndex: 3, targetClass: AnnotationTableConfigurationResult::class)], traits: [14 => true], targetClass: MetadataConfigurationResult::class)
            ],
            targetClass: GetBucketMetadataConfigurationResult::class
        );
    }

    public static function getBucketMetadataTableConfigurationOutput(): Schema
    {
        if (isset(self::$GetBucketMetadataTableConfigurationOutput)) {
            return self::$GetBucketMetadataTableConfigurationOutput;
        }

        return self::$GetBucketMetadataTableConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationOutput$GetBucketMetadataTableConfigurationResult', type: ShapeType::Structure, memberName: 'GetBucketMetadataTableConfigurationResult', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationResult$MetadataTableConfigurationResult', type: ShapeType::Structure, memberName: 'MetadataTableConfigurationResult', memberIndex: 0, traits: [14 => true], targetClass: MetadataTableConfigurationResult::class), new Schema(id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationResult$Status', type: ShapeType::String_, memberName: 'Status', memberIndex: 1, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationResult$Error', type: ShapeType::Structure, memberName: 'Error', memberIndex: 2, targetClass: ErrorDetails::class)], traits: [7 => true], targetClass: GetBucketMetadataTableConfigurationResult::class)
            ],
            targetClass: GetBucketMetadataTableConfigurationOutput::class
        );
    }

    public static function getBucketMetadataTableConfigurationRequest(): Schema
    {
        if (isset(self::$GetBucketMetadataTableConfigurationRequest)) {
            return self::$GetBucketMetadataTableConfigurationRequest;
        }

        return self::$GetBucketMetadataTableConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketMetadataTableConfigurationRequest::class
        );
    }

    public static function getBucketMetadataTableConfigurationResult(): Schema
    {
        if (isset(self::$GetBucketMetadataTableConfigurationResult)) {
            return self::$GetBucketMetadataTableConfigurationResult;
        }

        return self::$GetBucketMetadataTableConfigurationResult = new Schema(
            id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationResult$MetadataTableConfigurationResult', type: ShapeType::Structure, memberName: 'MetadataTableConfigurationResult', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#MetadataTableConfigurationResult$S3TablesDestinationResult', type: ShapeType::Structure, memberName: 'S3TablesDestinationResult', memberIndex: 0, traits: [14 => true], targetClass: S3TablesDestinationResult::class)], traits: [14 => true], targetClass: MetadataTableConfigurationResult::class),
                new Schema(id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationResult$Status', type: ShapeType::String_, memberName: 'Status', memberIndex: 1, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetBucketMetadataTableConfigurationResult$Error', type: ShapeType::Structure, memberName: 'Error', memberIndex: 2, members: self::errorDetails()->getMembers(), targetClass: ErrorDetails::class)
            ],
            targetClass: GetBucketMetadataTableConfigurationResult::class
        );
    }

    public static function getBucketMetricsConfigurationOutput(): Schema
    {
        if (isset(self::$GetBucketMetricsConfigurationOutput)) {
            return self::$GetBucketMetricsConfigurationOutput;
        }

        return self::$GetBucketMetricsConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketMetricsConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketMetricsConfigurationOutput$MetricsConfiguration', type: ShapeType::Structure, memberName: 'MetricsConfiguration', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#MetricsConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#MetricsConfiguration$Filter', type: ShapeType::Union, memberName: 'Filter', memberIndex: 1, targetClass: MetricsFilter::class)], traits: [7 => true], targetClass: MetricsConfiguration::class)
            ],
            targetClass: GetBucketMetricsConfigurationOutput::class
        );
    }

    public static function getBucketMetricsConfigurationRequest(): Schema
    {
        if (isset(self::$GetBucketMetricsConfigurationRequest)) {
            return self::$GetBucketMetricsConfigurationRequest;
        }

        return self::$GetBucketMetricsConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketMetricsConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketMetricsConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketMetricsConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetBucketMetricsConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketMetricsConfigurationRequest::class
        );
    }

    public static function getBucketNotificationConfigurationRequest(): Schema
    {
        if (isset(self::$GetBucketNotificationConfigurationRequest)) {
            return self::$GetBucketNotificationConfigurationRequest;
        }

        return self::$GetBucketNotificationConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketNotificationConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketNotificationConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketNotificationConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketNotificationConfigurationRequest::class
        );
    }

    public static function getBucketOwnershipControlsOutput(): Schema
    {
        if (isset(self::$GetBucketOwnershipControlsOutput)) {
            return self::$GetBucketOwnershipControlsOutput;
        }

        return self::$GetBucketOwnershipControlsOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketOwnershipControlsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketOwnershipControlsOutput$OwnershipControls', type: ShapeType::Structure, memberName: 'OwnershipControls', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#OwnershipControls$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#OwnershipControlsRules$member'] ??= new Schema(id: 'com.amazonaws.s3#OwnershipControlsRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::ownershipControlsRule()->getMembers(), targetClass: OwnershipControlsRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])], traits: [7 => true], targetClass: OwnershipControls::class)
            ],
            targetClass: GetBucketOwnershipControlsOutput::class
        );
    }

    public static function getBucketOwnershipControlsRequest(): Schema
    {
        if (isset(self::$GetBucketOwnershipControlsRequest)) {
            return self::$GetBucketOwnershipControlsRequest;
        }

        return self::$GetBucketOwnershipControlsRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketOwnershipControlsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketOwnershipControlsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketOwnershipControlsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketOwnershipControlsRequest::class
        );
    }

    public static function getBucketPolicyOutput(): Schema
    {
        if (isset(self::$GetBucketPolicyOutput)) {
            return self::$GetBucketPolicyOutput;
        }

        return self::$GetBucketPolicyOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketPolicyOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketPolicyOutput$Policy', type: ShapeType::String_, memberName: 'Policy', memberIndex: 0, traits: [7 => true])
            ],
            targetClass: GetBucketPolicyOutput::class
        );
    }

    public static function getBucketPolicyRequest(): Schema
    {
        if (isset(self::$GetBucketPolicyRequest)) {
            return self::$GetBucketPolicyRequest;
        }

        return self::$GetBucketPolicyRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketPolicyRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketPolicyRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketPolicyRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketPolicyRequest::class
        );
    }

    public static function getBucketPolicyStatusOutput(): Schema
    {
        if (isset(self::$GetBucketPolicyStatusOutput)) {
            return self::$GetBucketPolicyStatusOutput;
        }

        return self::$GetBucketPolicyStatusOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketPolicyStatusOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketPolicyStatusOutput$PolicyStatus', type: ShapeType::Structure, memberName: 'PolicyStatus', memberIndex: 0, members: self::policyStatus()->getMembers(), traits: [7 => true], targetClass: PolicyStatus::class)
            ],
            targetClass: GetBucketPolicyStatusOutput::class
        );
    }

    public static function getBucketPolicyStatusRequest(): Schema
    {
        if (isset(self::$GetBucketPolicyStatusRequest)) {
            return self::$GetBucketPolicyStatusRequest;
        }

        return self::$GetBucketPolicyStatusRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketPolicyStatusRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketPolicyStatusRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketPolicyStatusRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketPolicyStatusRequest::class
        );
    }

    public static function getBucketReplicationOutput(): Schema
    {
        if (isset(self::$GetBucketReplicationOutput)) {
            return self::$GetBucketReplicationOutput;
        }

        return self::$GetBucketReplicationOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketReplicationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketReplicationOutput$ReplicationConfiguration', type: ShapeType::Structure, memberName: 'ReplicationConfiguration', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#ReplicationConfiguration$Role', type: ShapeType::String_, memberName: 'Role', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#ReplicationConfiguration$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#ReplicationRules$member'] ??= new Schema(id: 'com.amazonaws.s3#ReplicationRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#ReplicationRule$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: ReplicationRuleStatus::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Destination', type: ShapeType::Structure, memberName: 'Destination', memberIndex: 1, traits: [14 => true], targetClass: Destination::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$ID', type: ShapeType::String_, memberName: 'ID', memberIndex: 2), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Priority', type: ShapeType::Integer, memberName: 'Priority', memberIndex: 3), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 4), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 5, targetClass: ReplicationRuleFilter::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$SourceSelectionCriteria', type: ShapeType::Structure, memberName: 'SourceSelectionCriteria', memberIndex: 6, targetClass: SourceSelectionCriteria::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$ExistingObjectReplication', type: ShapeType::Structure, memberName: 'ExistingObjectReplication', memberIndex: 7, targetClass: ExistingObjectReplication::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$DeleteMarkerReplication', type: ShapeType::Structure, memberName: 'DeleteMarkerReplication', memberIndex: 8, targetClass: DeleteMarkerReplication::class)], targetClass: ReplicationRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])], traits: [7 => true], targetClass: ReplicationConfiguration::class)
            ],
            targetClass: GetBucketReplicationOutput::class
        );
    }

    public static function getBucketReplicationRequest(): Schema
    {
        if (isset(self::$GetBucketReplicationRequest)) {
            return self::$GetBucketReplicationRequest;
        }

        return self::$GetBucketReplicationRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketReplicationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketReplicationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketReplicationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketReplicationRequest::class
        );
    }

    public static function getBucketRequestPaymentOutput(): Schema
    {
        if (isset(self::$GetBucketRequestPaymentOutput)) {
            return self::$GetBucketRequestPaymentOutput;
        }

        return self::$GetBucketRequestPaymentOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketRequestPaymentOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketRequestPaymentOutput$Payer', type: ShapeType::Enum, memberName: 'Payer', memberIndex: 0, targetClass: Payer::class)
            ], traits: [0 => 'RequestPaymentConfiguration'],
            targetClass: GetBucketRequestPaymentOutput::class
        );
    }

    public static function getBucketRequestPaymentRequest(): Schema
    {
        if (isset(self::$GetBucketRequestPaymentRequest)) {
            return self::$GetBucketRequestPaymentRequest;
        }

        return self::$GetBucketRequestPaymentRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketRequestPaymentRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketRequestPaymentRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketRequestPaymentRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketRequestPaymentRequest::class
        );
    }

    public static function getBucketTaggingOutput(): Schema
    {
        if (isset(self::$GetBucketTaggingOutput)) {
            return self::$GetBucketTaggingOutput;
        }

        return self::$GetBucketTaggingOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketTaggingOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketTaggingOutput$TagSet', type: ShapeType::List_, memberName: 'TagSet', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [14 => true])
            ], traits: [0 => 'Tagging'],
            targetClass: GetBucketTaggingOutput::class
        );
    }

    public static function getBucketTaggingRequest(): Schema
    {
        if (isset(self::$GetBucketTaggingRequest)) {
            return self::$GetBucketTaggingRequest;
        }

        return self::$GetBucketTaggingRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketTaggingRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketTaggingRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketTaggingRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketTaggingRequest::class
        );
    }

    public static function getBucketVersioningOutput(): Schema
    {
        if (isset(self::$GetBucketVersioningOutput)) {
            return self::$GetBucketVersioningOutput;
        }

        return self::$GetBucketVersioningOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketVersioningOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketVersioningOutput$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, targetClass: BucketVersioningStatus::class),
                new Schema(id: 'com.amazonaws.s3#GetBucketVersioningOutput$MFADelete', type: ShapeType::Enum, memberName: 'MFADelete', memberIndex: 1, traits: [0 => 'MfaDelete'], targetClass: MFADeleteStatus::class)
            ], traits: [0 => 'VersioningConfiguration'],
            targetClass: GetBucketVersioningOutput::class
        );
    }

    public static function getBucketVersioningRequest(): Schema
    {
        if (isset(self::$GetBucketVersioningRequest)) {
            return self::$GetBucketVersioningRequest;
        }

        return self::$GetBucketVersioningRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketVersioningRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketVersioningRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketVersioningRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketVersioningRequest::class
        );
    }

    public static function getBucketWebsiteOutput(): Schema
    {
        if (isset(self::$GetBucketWebsiteOutput)) {
            return self::$GetBucketWebsiteOutput;
        }

        return self::$GetBucketWebsiteOutput = new Schema(
            id: 'com.amazonaws.s3#GetBucketWebsiteOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketWebsiteOutput$RedirectAllRequestsTo', type: ShapeType::Structure, memberName: 'RedirectAllRequestsTo', memberIndex: 0, members: self::redirectAllRequestsTo()->getMembers(), targetClass: RedirectAllRequestsTo::class),
                new Schema(id: 'com.amazonaws.s3#GetBucketWebsiteOutput$IndexDocument', type: ShapeType::Structure, memberName: 'IndexDocument', memberIndex: 1, members: self::indexDocument()->getMembers(), targetClass: IndexDocument::class),
                new Schema(id: 'com.amazonaws.s3#GetBucketWebsiteOutput$ErrorDocument', type: ShapeType::Structure, memberName: 'ErrorDocument', memberIndex: 2, members: self::errorDocument()->getMembers(), targetClass: ErrorDocument::class),
                new Schema(id: 'com.amazonaws.s3#GetBucketWebsiteOutput$RoutingRules', type: ShapeType::List_, memberName: 'RoutingRules', memberIndex: 3, listMember: SchemasMembers::$shared['com.amazonaws.s3#RoutingRules$member'] ??= new Schema(id: 'com.amazonaws.s3#RoutingRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#RoutingRule$Redirect', type: ShapeType::Structure, memberName: 'Redirect', memberIndex: 0, traits: [14 => true], targetClass: Redirect::class), new Schema(id: 'com.amazonaws.s3#RoutingRule$Condition', type: ShapeType::Structure, memberName: 'Condition', memberIndex: 1, targetClass: Condition::class)], traits: [0 => 'RoutingRule'], targetClass: RoutingRule::class))
            ], traits: [0 => 'WebsiteConfiguration'],
            targetClass: GetBucketWebsiteOutput::class
        );
    }

    public static function getBucketWebsiteRequest(): Schema
    {
        if (isset(self::$GetBucketWebsiteRequest)) {
            return self::$GetBucketWebsiteRequest;
        }

        return self::$GetBucketWebsiteRequest = new Schema(
            id: 'com.amazonaws.s3#GetBucketWebsiteRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetBucketWebsiteRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetBucketWebsiteRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetBucketWebsiteRequest::class
        );
    }

    public static function getObjectAclOutput(): Schema
    {
        if (isset(self::$GetObjectAclOutput)) {
            return self::$GetObjectAclOutput;
        }

        return self::$GetObjectAclOutput = new Schema(
            id: 'com.amazonaws.s3#GetObjectAclOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectAclOutput$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 0, members: self::owner()->getMembers(), targetClass: Owner::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAclOutput$Grants', type: ShapeType::List_, memberName: 'Grants', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#Grants$member'] ??= new Schema(id: 'com.amazonaws.s3#Grants$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::grant()->getMembers(), traits: [0 => 'Grant'], targetClass: Grant::class), traits: [0 => 'AccessControlList']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAclOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 2, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ], traits: [0 => 'AccessControlPolicy'],
            targetClass: GetObjectAclOutput::class
        );
    }

    public static function getObjectAclRequest(): Schema
    {
        if (isset(self::$GetObjectAclRequest)) {
            return self::$GetObjectAclRequest;
        }

        return self::$GetObjectAclRequest = new Schema(
            id: 'com.amazonaws.s3#GetObjectAclRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectAclRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectAclRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectAclRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 2, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAclRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 3, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAclRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetObjectAclRequest::class
        );
    }

    public static function getObjectAnnotationOutput(): Schema
    {
        if (isset(self::$GetObjectAnnotationOutput)) {
            return self::$GetObjectAnnotationOutput;
        }

        return self::$GetObjectAnnotationOutput = new Schema(
            id: 'com.amazonaws.s3#GetObjectAnnotationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$AnnotationPayload', type: ShapeType::Blob, memberName: 'AnnotationPayload', memberIndex: 0, traits: [7 => true, 16 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ObjectVersionId', type: ShapeType::String_, memberName: 'ObjectVersionId', memberIndex: 1, traits: [5 => 'x-amz-object-version-id']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 2, traits: [5 => 'Last-Modified']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ContentLength', type: ShapeType::Long, memberName: 'ContentLength', memberIndex: 3, traits: [5 => 'Content-Length']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 4, traits: [5 => 'ETag']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 5, traits: [5 => 'x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 6, traits: [5 => 'x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 7, traits: [5 => 'x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 8, traits: [5 => 'x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 9, traits: [5 => 'x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 10, traits: [5 => 'x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 11, traits: [5 => 'x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 12, traits: [5 => 'x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 13, traits: [5 => 'x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 14, traits: [5 => 'x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 15, traits: [5 => 'x-amz-checksum-type'], targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 16, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 17, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationOutput$ReplicationStatus', type: ShapeType::Enum, memberName: 'ReplicationStatus', memberIndex: 18, traits: [5 => 'x-amz-replication-status'], targetClass: ReplicationStatus::class)
            ],
            targetClass: GetObjectAnnotationOutput::class
        );
    }

    public static function getObjectAnnotationRequest(): Schema
    {
        if (isset(self::$GetObjectAnnotationRequest)) {
            return self::$GetObjectAnnotationRequest;
        }

        return self::$GetObjectAnnotationRequest = new Schema(
            id: 'com.amazonaws.s3#GetObjectAnnotationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationRequest$AnnotationName', type: ShapeType::String_, memberName: 'AnnotationName', memberIndex: 2, traits: [9 => 'annotationName', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 3, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 4, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 5, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAnnotationRequest$ChecksumMode', type: ShapeType::Enum, memberName: 'ChecksumMode', memberIndex: 6, traits: [5 => 'x-amz-checksum-mode'], targetClass: ChecksumMode::class)
            ],
            targetClass: GetObjectAnnotationRequest::class
        );
    }

    public static function getObjectAttributesOutput(): Schema
    {
        if (isset(self::$GetObjectAttributesOutput)) {
            return self::$GetObjectAttributesOutput;
        }

        return self::$GetObjectAttributesOutput = new Schema(
            id: 'com.amazonaws.s3#GetObjectAttributesOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesOutput$DeleteMarker', type: ShapeType::Boolean, memberName: 'DeleteMarker', memberIndex: 0, traits: [5 => 'x-amz-delete-marker']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesOutput$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 1, traits: [5 => 'Last-Modified']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 2, traits: [5 => 'x-amz-version-id']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 3, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesOutput$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesOutput$Checksum', type: ShapeType::Structure, memberName: 'Checksum', memberIndex: 5, members: self::checksum()->getMembers(), targetClass: Checksum::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesOutput$ObjectParts', type: ShapeType::Structure, memberName: 'ObjectParts', memberIndex: 6, members: self::getObjectAttributesParts()->getMembers(), targetClass: GetObjectAttributesParts::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesOutput$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 7, targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesOutput$ObjectSize', type: ShapeType::Long, memberName: 'ObjectSize', memberIndex: 8)
            ], traits: [0 => 'GetObjectAttributesResponse'],
            targetClass: GetObjectAttributesOutput::class
        );
    }

    public static function getObjectAttributesParts(): Schema
    {
        if (isset(self::$GetObjectAttributesParts)) {
            return self::$GetObjectAttributesParts;
        }

        return self::$GetObjectAttributesParts = new Schema(
            id: 'com.amazonaws.s3#GetObjectAttributesParts',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesParts$TotalPartsCount', type: ShapeType::Integer, memberName: 'TotalPartsCount', memberIndex: 0, traits: [0 => 'PartsCount']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesParts$PartNumberMarker', type: ShapeType::String_, memberName: 'PartNumberMarker', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesParts$NextPartNumberMarker', type: ShapeType::String_, memberName: 'NextPartNumberMarker', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesParts$MaxParts', type: ShapeType::Integer, memberName: 'MaxParts', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesParts$IsTruncated', type: ShapeType::Boolean, memberName: 'IsTruncated', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesParts$Parts', type: ShapeType::List_, memberName: 'Parts', memberIndex: 5, listMember: SchemasMembers::$shared['com.amazonaws.s3#PartsList$member'] ??= new Schema(id: 'com.amazonaws.s3#PartsList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::objectPart()->getMembers(), targetClass: ObjectPart::class), traits: [0 => 'Part', 3 => true])
            ],
            targetClass: GetObjectAttributesParts::class
        );
    }

    public static function getObjectAttributesRequest(): Schema
    {
        if (isset(self::$GetObjectAttributesRequest)) {
            return self::$GetObjectAttributesRequest;
        }

        return self::$GetObjectAttributesRequest = new Schema(
            id: 'com.amazonaws.s3#GetObjectAttributesRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$ObjectAttributes', type: ShapeType::List_, memberName: 'ObjectAttributes', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#ObjectAttributesList$member'] ??= new Schema(id: 'com.amazonaws.s3#ObjectAttributesList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, targetClass: ObjectAttributes::class), traits: [5 => 'x-amz-object-attributes', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 3, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$MaxParts', type: ShapeType::Integer, memberName: 'MaxParts', memberIndex: 4, traits: [5 => 'x-amz-max-parts']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$PartNumberMarker', type: ShapeType::String_, memberName: 'PartNumberMarker', memberIndex: 5, traits: [5 => 'x-amz-part-number-marker']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 6, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 7, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 8, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 9, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectAttributesRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 10, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetObjectAttributesRequest::class
        );
    }

    public static function getObjectLegalHoldOutput(): Schema
    {
        if (isset(self::$GetObjectLegalHoldOutput)) {
            return self::$GetObjectLegalHoldOutput;
        }

        return self::$GetObjectLegalHoldOutput = new Schema(
            id: 'com.amazonaws.s3#GetObjectLegalHoldOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectLegalHoldOutput$LegalHold', type: ShapeType::Structure, memberName: 'LegalHold', memberIndex: 0, members: self::objectLockLegalHold()->getMembers(), traits: [0 => 'LegalHold', 7 => true], targetClass: ObjectLockLegalHold::class)
            ],
            targetClass: GetObjectLegalHoldOutput::class
        );
    }

    public static function getObjectLegalHoldRequest(): Schema
    {
        if (isset(self::$GetObjectLegalHoldRequest)) {
            return self::$GetObjectLegalHoldRequest;
        }

        return self::$GetObjectLegalHoldRequest = new Schema(
            id: 'com.amazonaws.s3#GetObjectLegalHoldRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectLegalHoldRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectLegalHoldRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectLegalHoldRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 2, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#GetObjectLegalHoldRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 3, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectLegalHoldRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetObjectLegalHoldRequest::class
        );
    }

    public static function getObjectLockConfigurationOutput(): Schema
    {
        if (isset(self::$GetObjectLockConfigurationOutput)) {
            return self::$GetObjectLockConfigurationOutput;
        }

        return self::$GetObjectLockConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#GetObjectLockConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectLockConfigurationOutput$ObjectLockConfiguration', type: ShapeType::Structure, memberName: 'ObjectLockConfiguration', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#ObjectLockConfiguration$ObjectLockEnabled', type: ShapeType::Enum, memberName: 'ObjectLockEnabled', memberIndex: 0, targetClass: ObjectLockEnabled::class), new Schema(id: 'com.amazonaws.s3#ObjectLockConfiguration$Rule', type: ShapeType::Structure, memberName: 'Rule', memberIndex: 1, targetClass: ObjectLockRule::class)], traits: [7 => true], targetClass: ObjectLockConfiguration::class)
            ],
            targetClass: GetObjectLockConfigurationOutput::class
        );
    }

    public static function getObjectLockConfigurationRequest(): Schema
    {
        if (isset(self::$GetObjectLockConfigurationRequest)) {
            return self::$GetObjectLockConfigurationRequest;
        }

        return self::$GetObjectLockConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#GetObjectLockConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectLockConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectLockConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetObjectLockConfigurationRequest::class
        );
    }

    public static function getObjectOutput(): Schema
    {
        if (isset(self::$GetObjectOutput)) {
            return self::$GetObjectOutput;
        }

        return self::$GetObjectOutput = new Schema(
            id: 'com.amazonaws.s3#GetObjectOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$Body', type: ShapeType::Blob, memberName: 'Body', memberIndex: 0, traits: [7 => true, 16 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$DeleteMarker', type: ShapeType::Boolean, memberName: 'DeleteMarker', memberIndex: 1, traits: [5 => 'x-amz-delete-marker']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$AcceptRanges', type: ShapeType::String_, memberName: 'AcceptRanges', memberIndex: 2, traits: [5 => 'accept-ranges']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$Expiration', type: ShapeType::String_, memberName: 'Expiration', memberIndex: 3, traits: [5 => 'x-amz-expiration']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$Restore', type: ShapeType::String_, memberName: 'Restore', memberIndex: 4, traits: [5 => 'x-amz-restore']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 5, traits: [5 => 'Last-Modified']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ContentLength', type: ShapeType::Long, memberName: 'ContentLength', memberIndex: 6, traits: [5 => 'Content-Length']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 7, traits: [5 => 'ETag']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 8, traits: [5 => 'x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 9, traits: [5 => 'x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 10, traits: [5 => 'x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 11, traits: [5 => 'x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 12, traits: [5 => 'x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 13, traits: [5 => 'x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 14, traits: [5 => 'x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 15, traits: [5 => 'x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 16, traits: [5 => 'x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 17, traits: [5 => 'x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 18, traits: [5 => 'x-amz-checksum-type'], targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$MissingMeta', type: ShapeType::Integer, memberName: 'MissingMeta', memberIndex: 19, traits: [5 => 'x-amz-missing-meta']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 20, traits: [5 => 'x-amz-version-id']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$CacheControl', type: ShapeType::String_, memberName: 'CacheControl', memberIndex: 21, traits: [5 => 'Cache-Control']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ContentDisposition', type: ShapeType::String_, memberName: 'ContentDisposition', memberIndex: 22, traits: [5 => 'Content-Disposition']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ContentEncoding', type: ShapeType::String_, memberName: 'ContentEncoding', memberIndex: 23, traits: [5 => 'Content-Encoding']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ContentLanguage', type: ShapeType::String_, memberName: 'ContentLanguage', memberIndex: 24, traits: [5 => 'Content-Language']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ContentRange', type: ShapeType::String_, memberName: 'ContentRange', memberIndex: 25, traits: [5 => 'Content-Range']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ContentType', type: ShapeType::String_, memberName: 'ContentType', memberIndex: 26, traits: [5 => 'Content-Type']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$Expires', type: ShapeType::String_, memberName: 'Expires', memberIndex: 27, traits: [5 => 'Expires']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$WebsiteRedirectLocation', type: ShapeType::String_, memberName: 'WebsiteRedirectLocation', memberIndex: 28, traits: [5 => 'x-amz-website-redirect-location']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 29, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$Metadata', type: ShapeType::Map, memberName: 'Metadata', memberIndex: 30, mapKey: SchemasMembers::$shared['com.amazonaws.s3#Metadata$key'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$key', type: ShapeType::String_, memberName: 'key', memberIndex: 0), mapValue: SchemasMembers::$shared['com.amazonaws.s3#Metadata$value'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$value', type: ShapeType::String_, memberName: 'value', memberIndex: 1), traits: [8 => 'x-amz-meta-']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 31, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 32, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 33, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 34, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 35, traits: [5 => 'x-amz-storage-class'], targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 36, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ReplicationStatus', type: ShapeType::Enum, memberName: 'ReplicationStatus', memberIndex: 37, traits: [5 => 'x-amz-replication-status'], targetClass: ReplicationStatus::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$PartsCount', type: ShapeType::Integer, memberName: 'PartsCount', memberIndex: 38, traits: [5 => 'x-amz-mp-parts-count']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$TagCount', type: ShapeType::Integer, memberName: 'TagCount', memberIndex: 39, traits: [5 => 'x-amz-tagging-count']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ObjectLockMode', type: ShapeType::Enum, memberName: 'ObjectLockMode', memberIndex: 40, traits: [5 => 'x-amz-object-lock-mode'], targetClass: ObjectLockMode::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ObjectLockRetainUntilDate', type: ShapeType::Timestamp, memberName: 'ObjectLockRetainUntilDate', memberIndex: 41, traits: [4 => 'date-time', 5 => 'x-amz-object-lock-retain-until-date']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ObjectLockLegalHoldStatus', type: ShapeType::Enum, memberName: 'ObjectLockLegalHoldStatus', memberIndex: 42, traits: [5 => 'x-amz-object-lock-legal-hold'], targetClass: ObjectLockLegalHoldStatus::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ObjectLockEventHold', type: ShapeType::Enum, memberName: 'ObjectLockEventHold', memberIndex: 43, traits: [5 => 'x-amz-object-lock-event-hold'], targetClass: ObjectLockEventHold::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ObjectLockEventHoldDurationDays', type: ShapeType::Integer, memberName: 'ObjectLockEventHoldDurationDays', memberIndex: 44, traits: [5 => 'x-amz-object-lock-event-hold-duration-days']),
                new Schema(id: 'com.amazonaws.s3#GetObjectOutput$ObjectLockEventHoldDurationYears', type: ShapeType::Integer, memberName: 'ObjectLockEventHoldDurationYears', memberIndex: 45, traits: [5 => 'x-amz-object-lock-event-hold-duration-years'])
            ],
            targetClass: GetObjectOutput::class
        );
    }

    public static function getObjectRequest(): Schema
    {
        if (isset(self::$GetObjectRequest)) {
            return self::$GetObjectRequest;
        }

        return self::$GetObjectRequest = new Schema(
            id: 'com.amazonaws.s3#GetObjectRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$IfMatch', type: ShapeType::String_, memberName: 'IfMatch', memberIndex: 2, traits: [5 => 'If-Match']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$IfModifiedSince', type: ShapeType::Timestamp, memberName: 'IfModifiedSince', memberIndex: 3, traits: [5 => 'If-Modified-Since']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$IfNoneMatch', type: ShapeType::String_, memberName: 'IfNoneMatch', memberIndex: 4, traits: [5 => 'If-None-Match']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$IfUnmodifiedSince', type: ShapeType::Timestamp, memberName: 'IfUnmodifiedSince', memberIndex: 5, traits: [5 => 'If-Unmodified-Since']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$Range', type: ShapeType::String_, memberName: 'Range', memberIndex: 6, traits: [5 => 'Range']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$ResponseCacheControl', type: ShapeType::String_, memberName: 'ResponseCacheControl', memberIndex: 7, traits: [9 => 'response-cache-control']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$ResponseContentDisposition', type: ShapeType::String_, memberName: 'ResponseContentDisposition', memberIndex: 8, traits: [9 => 'response-content-disposition']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$ResponseContentEncoding', type: ShapeType::String_, memberName: 'ResponseContentEncoding', memberIndex: 9, traits: [9 => 'response-content-encoding']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$ResponseContentLanguage', type: ShapeType::String_, memberName: 'ResponseContentLanguage', memberIndex: 10, traits: [9 => 'response-content-language']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$ResponseContentType', type: ShapeType::String_, memberName: 'ResponseContentType', memberIndex: 11, traits: [9 => 'response-content-type']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$ResponseExpires', type: ShapeType::Timestamp, memberName: 'ResponseExpires', memberIndex: 12, traits: [4 => 'http-date', 9 => 'response-expires']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 13, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 14, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 15, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 16, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 17, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$PartNumber', type: ShapeType::Integer, memberName: 'PartNumber', memberIndex: 18, traits: [9 => 'partNumber']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 19, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRequest$ChecksumMode', type: ShapeType::Enum, memberName: 'ChecksumMode', memberIndex: 20, traits: [5 => 'x-amz-checksum-mode'], targetClass: ChecksumMode::class)
            ],
            targetClass: GetObjectRequest::class
        );
    }

    public static function getObjectRetentionOutput(): Schema
    {
        if (isset(self::$GetObjectRetentionOutput)) {
            return self::$GetObjectRetentionOutput;
        }

        return self::$GetObjectRetentionOutput = new Schema(
            id: 'com.amazonaws.s3#GetObjectRetentionOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectRetentionOutput$Retention', type: ShapeType::Structure, memberName: 'Retention', memberIndex: 0, members: self::objectLockRetention()->getMembers(), traits: [0 => 'Retention', 7 => true], targetClass: ObjectLockRetention::class)
            ],
            targetClass: GetObjectRetentionOutput::class
        );
    }

    public static function getObjectRetentionRequest(): Schema
    {
        if (isset(self::$GetObjectRetentionRequest)) {
            return self::$GetObjectRetentionRequest;
        }

        return self::$GetObjectRetentionRequest = new Schema(
            id: 'com.amazonaws.s3#GetObjectRetentionRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectRetentionRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectRetentionRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectRetentionRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 2, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#GetObjectRetentionRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 3, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectRetentionRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetObjectRetentionRequest::class
        );
    }

    public static function getObjectTaggingOutput(): Schema
    {
        if (isset(self::$GetObjectTaggingOutput)) {
            return self::$GetObjectTaggingOutput;
        }

        return self::$GetObjectTaggingOutput = new Schema(
            id: 'com.amazonaws.s3#GetObjectTaggingOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectTaggingOutput$TagSet', type: ShapeType::List_, memberName: 'TagSet', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectTaggingOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 1, traits: [5 => 'x-amz-version-id'])
            ], traits: [0 => 'Tagging'],
            targetClass: GetObjectTaggingOutput::class
        );
    }

    public static function getObjectTaggingRequest(): Schema
    {
        if (isset(self::$GetObjectTaggingRequest)) {
            return self::$GetObjectTaggingRequest;
        }

        return self::$GetObjectTaggingRequest = new Schema(
            id: 'com.amazonaws.s3#GetObjectTaggingRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectTaggingRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectTaggingRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectTaggingRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 2, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#GetObjectTaggingRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 3, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#GetObjectTaggingRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 4, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class)
            ],
            targetClass: GetObjectTaggingRequest::class
        );
    }

    public static function getObjectTorrentOutput(): Schema
    {
        if (isset(self::$GetObjectTorrentOutput)) {
            return self::$GetObjectTorrentOutput;
        }

        return self::$GetObjectTorrentOutput = new Schema(
            id: 'com.amazonaws.s3#GetObjectTorrentOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectTorrentOutput$Body', type: ShapeType::Blob, memberName: 'Body', memberIndex: 0, traits: [7 => true, 16 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectTorrentOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 1, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: GetObjectTorrentOutput::class
        );
    }

    public static function getObjectTorrentRequest(): Schema
    {
        if (isset(self::$GetObjectTorrentRequest)) {
            return self::$GetObjectTorrentRequest;
        }

        return self::$GetObjectTorrentRequest = new Schema(
            id: 'com.amazonaws.s3#GetObjectTorrentRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetObjectTorrentRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetObjectTorrentRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#GetObjectTorrentRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 2, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#GetObjectTorrentRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 3, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetObjectTorrentRequest::class
        );
    }

    public static function getPublicAccessBlockOutput(): Schema
    {
        if (isset(self::$GetPublicAccessBlockOutput)) {
            return self::$GetPublicAccessBlockOutput;
        }

        return self::$GetPublicAccessBlockOutput = new Schema(
            id: 'com.amazonaws.s3#GetPublicAccessBlockOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetPublicAccessBlockOutput$PublicAccessBlockConfiguration', type: ShapeType::Structure, memberName: 'PublicAccessBlockConfiguration', memberIndex: 0, members: self::publicAccessBlockConfiguration()->getMembers(), traits: [7 => true], targetClass: PublicAccessBlockConfiguration::class)
            ],
            targetClass: GetPublicAccessBlockOutput::class
        );
    }

    public static function getPublicAccessBlockRequest(): Schema
    {
        if (isset(self::$GetPublicAccessBlockRequest)) {
            return self::$GetPublicAccessBlockRequest;
        }

        return self::$GetPublicAccessBlockRequest = new Schema(
            id: 'com.amazonaws.s3#GetPublicAccessBlockRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GetPublicAccessBlockRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#GetPublicAccessBlockRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: GetPublicAccessBlockRequest::class
        );
    }

    public static function glacierJobParameters(): Schema
    {
        if (isset(self::$GlacierJobParameters)) {
            return self::$GlacierJobParameters;
        }

        return self::$GlacierJobParameters = new Schema(
            id: 'com.amazonaws.s3#GlacierJobParameters',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#GlacierJobParameters$Tier', type: ShapeType::Enum, memberName: 'Tier', memberIndex: 0, traits: [14 => true], targetClass: Tier::class)
            ],
            targetClass: GlacierJobParameters::class
        );
    }

    public static function grant(): Schema
    {
        if (isset(self::$Grant)) {
            return self::$Grant;
        }

        return self::$Grant = new Schema(
            id: 'com.amazonaws.s3#Grant',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Grant$Grantee', type: ShapeType::Structure, memberName: 'Grantee', memberIndex: 0, members: self::grantee()->getMembers(), traits: [1 => ['uri' => 'http://www.w3.org/2001/XMLSchema-instance', 'prefix' => 'xsi']], targetClass: Grantee::class),
                new Schema(id: 'com.amazonaws.s3#Grant$Permission', type: ShapeType::Enum, memberName: 'Permission', memberIndex: 1, targetClass: Permission::class)
            ],
            targetClass: Grant::class
        );
    }

    public static function grantee(): Schema
    {
        if (isset(self::$Grantee)) {
            return self::$Grantee;
        }

        return self::$Grantee = new Schema(
            id: 'com.amazonaws.s3#Grantee',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Grantee$Type', type: ShapeType::Enum, memberName: 'Type', memberIndex: 0, traits: [0 => 'xsi:type', 2 => true, 14 => true], targetClass: Type::class),
                new Schema(id: 'com.amazonaws.s3#Grantee$DisplayName', type: ShapeType::String_, memberName: 'DisplayName', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Grantee$EmailAddress', type: ShapeType::String_, memberName: 'EmailAddress', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#Grantee$ID', type: ShapeType::String_, memberName: 'ID', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#Grantee$URI', type: ShapeType::String_, memberName: 'URI', memberIndex: 4)
            ],
            targetClass: Grantee::class
        );
    }

    public static function headBucketOutput(): Schema
    {
        if (isset(self::$HeadBucketOutput)) {
            return self::$HeadBucketOutput;
        }

        return self::$HeadBucketOutput = new Schema(
            id: 'com.amazonaws.s3#HeadBucketOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#HeadBucketOutput$BucketArn', type: ShapeType::String_, memberName: 'BucketArn', memberIndex: 0, traits: [5 => 'x-amz-bucket-arn']),
                new Schema(id: 'com.amazonaws.s3#HeadBucketOutput$BucketLocationType', type: ShapeType::Enum, memberName: 'BucketLocationType', memberIndex: 1, traits: [5 => 'x-amz-bucket-location-type'], targetClass: LocationType::class),
                new Schema(id: 'com.amazonaws.s3#HeadBucketOutput$BucketLocationName', type: ShapeType::String_, memberName: 'BucketLocationName', memberIndex: 2, traits: [5 => 'x-amz-bucket-location-name']),
                new Schema(id: 'com.amazonaws.s3#HeadBucketOutput$BucketRegion', type: ShapeType::String_, memberName: 'BucketRegion', memberIndex: 3, traits: [5 => 'x-amz-bucket-region']),
                new Schema(id: 'com.amazonaws.s3#HeadBucketOutput$AccessPointAlias', type: ShapeType::Boolean, memberName: 'AccessPointAlias', memberIndex: 4, traits: [5 => 'x-amz-access-point-alias'])
            ],
            targetClass: HeadBucketOutput::class
        );
    }

    public static function headBucketRequest(): Schema
    {
        if (isset(self::$HeadBucketRequest)) {
            return self::$HeadBucketRequest;
        }

        return self::$HeadBucketRequest = new Schema(
            id: 'com.amazonaws.s3#HeadBucketRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#HeadBucketRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#HeadBucketRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 1, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: HeadBucketRequest::class
        );
    }

    public static function headObjectOutput(): Schema
    {
        if (isset(self::$HeadObjectOutput)) {
            return self::$HeadObjectOutput;
        }

        return self::$HeadObjectOutput = new Schema(
            id: 'com.amazonaws.s3#HeadObjectOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$DeleteMarker', type: ShapeType::Boolean, memberName: 'DeleteMarker', memberIndex: 0, traits: [5 => 'x-amz-delete-marker']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$AcceptRanges', type: ShapeType::String_, memberName: 'AcceptRanges', memberIndex: 1, traits: [5 => 'accept-ranges']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$Expiration', type: ShapeType::String_, memberName: 'Expiration', memberIndex: 2, traits: [5 => 'x-amz-expiration']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$Restore', type: ShapeType::String_, memberName: 'Restore', memberIndex: 3, traits: [5 => 'x-amz-restore']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ArchiveStatus', type: ShapeType::Enum, memberName: 'ArchiveStatus', memberIndex: 4, traits: [5 => 'x-amz-archive-status'], targetClass: ArchiveStatus::class),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 5, traits: [5 => 'Last-Modified']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ContentLength', type: ShapeType::Long, memberName: 'ContentLength', memberIndex: 6, traits: [5 => 'Content-Length']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 7, traits: [5 => 'x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 8, traits: [5 => 'x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 9, traits: [5 => 'x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 10, traits: [5 => 'x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 11, traits: [5 => 'x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 12, traits: [5 => 'x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 13, traits: [5 => 'x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 14, traits: [5 => 'x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 15, traits: [5 => 'x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 16, traits: [5 => 'x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 17, traits: [5 => 'x-amz-checksum-type'], targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 18, traits: [5 => 'ETag']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$MissingMeta', type: ShapeType::Integer, memberName: 'MissingMeta', memberIndex: 19, traits: [5 => 'x-amz-missing-meta']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 20, traits: [5 => 'x-amz-version-id']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$CacheControl', type: ShapeType::String_, memberName: 'CacheControl', memberIndex: 21, traits: [5 => 'Cache-Control']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ContentDisposition', type: ShapeType::String_, memberName: 'ContentDisposition', memberIndex: 22, traits: [5 => 'Content-Disposition']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ContentEncoding', type: ShapeType::String_, memberName: 'ContentEncoding', memberIndex: 23, traits: [5 => 'Content-Encoding']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ContentLanguage', type: ShapeType::String_, memberName: 'ContentLanguage', memberIndex: 24, traits: [5 => 'Content-Language']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ContentType', type: ShapeType::String_, memberName: 'ContentType', memberIndex: 25, traits: [5 => 'Content-Type']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ContentRange', type: ShapeType::String_, memberName: 'ContentRange', memberIndex: 26, traits: [5 => 'Content-Range']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$Expires', type: ShapeType::String_, memberName: 'Expires', memberIndex: 27, traits: [5 => 'Expires']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$WebsiteRedirectLocation', type: ShapeType::String_, memberName: 'WebsiteRedirectLocation', memberIndex: 28, traits: [5 => 'x-amz-website-redirect-location']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 29, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$Metadata', type: ShapeType::Map, memberName: 'Metadata', memberIndex: 30, mapKey: SchemasMembers::$shared['com.amazonaws.s3#Metadata$key'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$key', type: ShapeType::String_, memberName: 'key', memberIndex: 0), mapValue: SchemasMembers::$shared['com.amazonaws.s3#Metadata$value'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$value', type: ShapeType::String_, memberName: 'value', memberIndex: 1), traits: [8 => 'x-amz-meta-']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 31, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 32, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 33, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 34, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 35, traits: [5 => 'x-amz-storage-class'], targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 36, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ReplicationStatus', type: ShapeType::Enum, memberName: 'ReplicationStatus', memberIndex: 37, traits: [5 => 'x-amz-replication-status'], targetClass: ReplicationStatus::class),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$PartsCount', type: ShapeType::Integer, memberName: 'PartsCount', memberIndex: 38, traits: [5 => 'x-amz-mp-parts-count']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$TagCount', type: ShapeType::Integer, memberName: 'TagCount', memberIndex: 39, traits: [5 => 'x-amz-tagging-count']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ObjectLockMode', type: ShapeType::Enum, memberName: 'ObjectLockMode', memberIndex: 40, traits: [5 => 'x-amz-object-lock-mode'], targetClass: ObjectLockMode::class),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ObjectLockRetainUntilDate', type: ShapeType::Timestamp, memberName: 'ObjectLockRetainUntilDate', memberIndex: 41, traits: [4 => 'date-time', 5 => 'x-amz-object-lock-retain-until-date']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ObjectLockLegalHoldStatus', type: ShapeType::Enum, memberName: 'ObjectLockLegalHoldStatus', memberIndex: 42, traits: [5 => 'x-amz-object-lock-legal-hold'], targetClass: ObjectLockLegalHoldStatus::class),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ObjectLockEventHold', type: ShapeType::Enum, memberName: 'ObjectLockEventHold', memberIndex: 43, traits: [5 => 'x-amz-object-lock-event-hold'], targetClass: ObjectLockEventHold::class),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ObjectLockEventHoldDurationDays', type: ShapeType::Integer, memberName: 'ObjectLockEventHoldDurationDays', memberIndex: 44, traits: [5 => 'x-amz-object-lock-event-hold-duration-days']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectOutput$ObjectLockEventHoldDurationYears', type: ShapeType::Integer, memberName: 'ObjectLockEventHoldDurationYears', memberIndex: 45, traits: [5 => 'x-amz-object-lock-event-hold-duration-years'])
            ],
            targetClass: HeadObjectOutput::class
        );
    }

    public static function headObjectRequest(): Schema
    {
        if (isset(self::$HeadObjectRequest)) {
            return self::$HeadObjectRequest;
        }

        return self::$HeadObjectRequest = new Schema(
            id: 'com.amazonaws.s3#HeadObjectRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$IfMatch', type: ShapeType::String_, memberName: 'IfMatch', memberIndex: 2, traits: [5 => 'If-Match']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$IfModifiedSince', type: ShapeType::Timestamp, memberName: 'IfModifiedSince', memberIndex: 3, traits: [5 => 'If-Modified-Since']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$IfNoneMatch', type: ShapeType::String_, memberName: 'IfNoneMatch', memberIndex: 4, traits: [5 => 'If-None-Match']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$IfUnmodifiedSince', type: ShapeType::Timestamp, memberName: 'IfUnmodifiedSince', memberIndex: 5, traits: [5 => 'If-Unmodified-Since']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$Range', type: ShapeType::String_, memberName: 'Range', memberIndex: 6, traits: [5 => 'Range']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$ResponseCacheControl', type: ShapeType::String_, memberName: 'ResponseCacheControl', memberIndex: 7, traits: [9 => 'response-cache-control']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$ResponseContentDisposition', type: ShapeType::String_, memberName: 'ResponseContentDisposition', memberIndex: 8, traits: [9 => 'response-content-disposition']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$ResponseContentEncoding', type: ShapeType::String_, memberName: 'ResponseContentEncoding', memberIndex: 9, traits: [9 => 'response-content-encoding']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$ResponseContentLanguage', type: ShapeType::String_, memberName: 'ResponseContentLanguage', memberIndex: 10, traits: [9 => 'response-content-language']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$ResponseContentType', type: ShapeType::String_, memberName: 'ResponseContentType', memberIndex: 11, traits: [9 => 'response-content-type']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$ResponseExpires', type: ShapeType::Timestamp, memberName: 'ResponseExpires', memberIndex: 12, traits: [4 => 'http-date', 9 => 'response-expires']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 13, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 14, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 15, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 16, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 17, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$PartNumber', type: ShapeType::Integer, memberName: 'PartNumber', memberIndex: 18, traits: [9 => 'partNumber']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 19, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#HeadObjectRequest$ChecksumMode', type: ShapeType::Enum, memberName: 'ChecksumMode', memberIndex: 20, traits: [5 => 'x-amz-checksum-mode'], targetClass: ChecksumMode::class)
            ],
            targetClass: HeadObjectRequest::class
        );
    }

    public static function idempotencyParameterMismatchException(): Schema
    {
        if (isset(self::$IdempotencyParameterMismatchException)) {
            return self::$IdempotencyParameterMismatchException;
        }

        return self::$IdempotencyParameterMismatchException = new Schema(
            id: 'com.amazonaws.s3#IdempotencyParameterMismatch',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: IdempotencyParameterMismatchException::class
        );
    }

    public static function indexDocument(): Schema
    {
        if (isset(self::$IndexDocument)) {
            return self::$IndexDocument;
        }

        return self::$IndexDocument = new Schema(
            id: 'com.amazonaws.s3#IndexDocument',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#IndexDocument$Suffix', type: ShapeType::String_, memberName: 'Suffix', memberIndex: 0, traits: [14 => true])
            ],
            targetClass: IndexDocument::class
        );
    }

    public static function initiator(): Schema
    {
        if (isset(self::$Initiator)) {
            return self::$Initiator;
        }

        return self::$Initiator = new Schema(
            id: 'com.amazonaws.s3#Initiator',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Initiator$ID', type: ShapeType::String_, memberName: 'ID', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Initiator$DisplayName', type: ShapeType::String_, memberName: 'DisplayName', memberIndex: 1)
            ],
            targetClass: Initiator::class
        );
    }

    public static function inputSerialization(): Schema
    {
        if (isset(self::$InputSerialization)) {
            return self::$InputSerialization;
        }

        return self::$InputSerialization = new Schema(
            id: 'com.amazonaws.s3#InputSerialization',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InputSerialization$CSV', type: ShapeType::Structure, memberName: 'CSV', memberIndex: 0, members: self::cSVInput()->getMembers(), targetClass: CSVInput::class),
                new Schema(id: 'com.amazonaws.s3#InputSerialization$CompressionType', type: ShapeType::Enum, memberName: 'CompressionType', memberIndex: 1, targetClass: CompressionType::class),
                new Schema(id: 'com.amazonaws.s3#InputSerialization$JSON', type: ShapeType::Structure, memberName: 'JSON', memberIndex: 2, members: self::jSONInput()->getMembers(), targetClass: JSONInput::class),
                new Schema(id: 'com.amazonaws.s3#InputSerialization$Parquet', type: ShapeType::Structure, memberName: 'Parquet', memberIndex: 3, targetClass: ParquetInput::class)
            ],
            targetClass: InputSerialization::class
        );
    }

    public static function intelligentTieringAndOperator(): Schema
    {
        if (isset(self::$IntelligentTieringAndOperator)) {
            return self::$IntelligentTieringAndOperator;
        }

        return self::$IntelligentTieringAndOperator = new Schema(
            id: 'com.amazonaws.s3#IntelligentTieringAndOperator',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#IntelligentTieringAndOperator$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#IntelligentTieringAndOperator$Tags', type: ShapeType::List_, memberName: 'Tags', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [0 => 'Tag', 3 => true])
            ],
            targetClass: IntelligentTieringAndOperator::class
        );
    }

    public static function intelligentTieringConfiguration(): Schema
    {
        if (isset(self::$IntelligentTieringConfiguration)) {
            return self::$IntelligentTieringConfiguration;
        }

        return self::$IntelligentTieringConfiguration = new Schema(
            id: 'com.amazonaws.s3#IntelligentTieringConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 1, traits: [14 => true], targetClass: IntelligentTieringStatus::class),
                new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Tierings', type: ShapeType::List_, memberName: 'Tierings', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#TieringList$member'] ??= new Schema(id: 'com.amazonaws.s3#TieringList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tiering()->getMembers(), targetClass: Tiering::class), traits: [0 => 'Tiering', 3 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 3, members: self::intelligentTieringFilter()->getMembers(), targetClass: IntelligentTieringFilter::class)
            ],
            targetClass: IntelligentTieringConfiguration::class
        );
    }

    public static function intelligentTieringFilter(): Schema
    {
        if (isset(self::$IntelligentTieringFilter)) {
            return self::$IntelligentTieringFilter;
        }

        return self::$IntelligentTieringFilter = new Schema(
            id: 'com.amazonaws.s3#IntelligentTieringFilter',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#IntelligentTieringFilter$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#IntelligentTieringFilter$Tag', type: ShapeType::Structure, memberName: 'Tag', memberIndex: 1, members: self::tag()->getMembers(), targetClass: Tag::class),
                new Schema(id: 'com.amazonaws.s3#IntelligentTieringFilter$And', type: ShapeType::Structure, memberName: 'And', memberIndex: 2, members: self::intelligentTieringAndOperator()->getMembers(), targetClass: IntelligentTieringAndOperator::class)
            ],
            targetClass: IntelligentTieringFilter::class
        );
    }

    public static function invalidAnnotationNameException(): Schema
    {
        if (isset(self::$InvalidAnnotationNameException)) {
            return self::$InvalidAnnotationNameException;
        }

        return self::$InvalidAnnotationNameException = new Schema(
            id: 'com.amazonaws.s3#InvalidAnnotationName',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: InvalidAnnotationNameException::class
        );
    }

    public static function invalidObjectStateException(): Schema
    {
        if (isset(self::$InvalidObjectStateException)) {
            return self::$InvalidObjectStateException;
        }

        return self::$InvalidObjectStateException = new Schema(
            id: 'com.amazonaws.s3#InvalidObjectState',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InvalidObjectState$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 0, targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#InvalidObjectState$AccessTier', type: ShapeType::Enum, memberName: 'AccessTier', memberIndex: 1, targetClass: IntelligentTieringAccessTier::class)
            ], traits: [23 => 'client'],
            targetClass: InvalidObjectStateException::class
        );
    }

    public static function invalidPrefixException(): Schema
    {
        if (isset(self::$InvalidPrefixException)) {
            return self::$InvalidPrefixException;
        }

        return self::$InvalidPrefixException = new Schema(
            id: 'com.amazonaws.s3#InvalidPrefix',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: InvalidPrefixException::class
        );
    }

    public static function invalidRequestException(): Schema
    {
        if (isset(self::$InvalidRequestException)) {
            return self::$InvalidRequestException;
        }

        return self::$InvalidRequestException = new Schema(
            id: 'com.amazonaws.s3#InvalidRequest',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: InvalidRequestException::class
        );
    }

    public static function invalidWriteOffsetException(): Schema
    {
        if (isset(self::$InvalidWriteOffsetException)) {
            return self::$InvalidWriteOffsetException;
        }

        return self::$InvalidWriteOffsetException = new Schema(
            id: 'com.amazonaws.s3#InvalidWriteOffset',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: InvalidWriteOffsetException::class
        );
    }

    public static function inventoryConfiguration(): Schema
    {
        if (isset(self::$InventoryConfiguration)) {
            return self::$InventoryConfiguration;
        }

        return self::$InventoryConfiguration = new Schema(
            id: 'com.amazonaws.s3#InventoryConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Destination', type: ShapeType::Structure, memberName: 'Destination', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#InventoryDestination$S3BucketDestination', type: ShapeType::Structure, memberName: 'S3BucketDestination', memberIndex: 0, traits: [14 => true], targetClass: InventoryS3BucketDestination::class)], traits: [14 => true], targetClass: InventoryDestination::class),
                new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$IsEnabled', type: ShapeType::Boolean, memberName: 'IsEnabled', memberIndex: 1, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 2, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$IncludedObjectVersions', type: ShapeType::Enum, memberName: 'IncludedObjectVersions', memberIndex: 3, traits: [14 => true], targetClass: InventoryIncludedObjectVersions::class),
                new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Schedule', type: ShapeType::Structure, memberName: 'Schedule', memberIndex: 4, members: self::inventorySchedule()->getMembers(), traits: [14 => true], targetClass: InventorySchedule::class),
                new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 5, members: self::inventoryFilter()->getMembers(), targetClass: InventoryFilter::class),
                new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$OptionalFields', type: ShapeType::List_, memberName: 'OptionalFields', memberIndex: 6, listMember: SchemasMembers::$shared['com.amazonaws.s3#InventoryOptionalFields$member'] ??= new Schema(id: 'com.amazonaws.s3#InventoryOptionalFields$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, traits: [0 => 'Field'], targetClass: InventoryOptionalField::class))
            ],
            targetClass: InventoryConfiguration::class
        );
    }

    public static function inventoryDestination(): Schema
    {
        if (isset(self::$InventoryDestination)) {
            return self::$InventoryDestination;
        }

        return self::$InventoryDestination = new Schema(
            id: 'com.amazonaws.s3#InventoryDestination',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InventoryDestination$S3BucketDestination', type: ShapeType::Structure, memberName: 'S3BucketDestination', memberIndex: 0, members: self::inventoryS3BucketDestination()->getMembers(), traits: [14 => true], targetClass: InventoryS3BucketDestination::class)
            ],
            targetClass: InventoryDestination::class
        );
    }

    public static function inventoryEncryption(): Schema
    {
        if (isset(self::$InventoryEncryption)) {
            return self::$InventoryEncryption;
        }

        return self::$InventoryEncryption = new Schema(
            id: 'com.amazonaws.s3#InventoryEncryption',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InventoryEncryption$SSES3', type: ShapeType::Structure, memberName: 'SSES3', memberIndex: 0, traits: [0 => 'SSE-S3'], targetClass: SSES3::class),
                new Schema(id: 'com.amazonaws.s3#InventoryEncryption$SSEKMS', type: ShapeType::Structure, memberName: 'SSEKMS', memberIndex: 1, members: self::sSEKMS()->getMembers(), traits: [0 => 'SSE-KMS'], targetClass: SSEKMS::class)
            ],
            targetClass: InventoryEncryption::class
        );
    }

    public static function inventoryFilter(): Schema
    {
        if (isset(self::$InventoryFilter)) {
            return self::$InventoryFilter;
        }

        return self::$InventoryFilter = new Schema(
            id: 'com.amazonaws.s3#InventoryFilter',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InventoryFilter$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0, traits: [14 => true])
            ],
            targetClass: InventoryFilter::class
        );
    }

    public static function inventoryS3BucketDestination(): Schema
    {
        if (isset(self::$InventoryS3BucketDestination)) {
            return self::$InventoryS3BucketDestination;
        }

        return self::$InventoryS3BucketDestination = new Schema(
            id: 'com.amazonaws.s3#InventoryS3BucketDestination',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InventoryS3BucketDestination$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#InventoryS3BucketDestination$Format', type: ShapeType::Enum, memberName: 'Format', memberIndex: 1, traits: [14 => true], targetClass: InventoryFormat::class),
                new Schema(id: 'com.amazonaws.s3#InventoryS3BucketDestination$AccountId', type: ShapeType::String_, memberName: 'AccountId', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#InventoryS3BucketDestination$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#InventoryS3BucketDestination$Encryption', type: ShapeType::Structure, memberName: 'Encryption', memberIndex: 4, members: [new Schema(id: 'com.amazonaws.s3#InventoryEncryption$SSES3', type: ShapeType::Structure, memberName: 'SSES3', memberIndex: 0, traits: [0 => 'SSE-S3'], targetClass: SSES3::class), new Schema(id: 'com.amazonaws.s3#InventoryEncryption$SSEKMS', type: ShapeType::Structure, memberName: 'SSEKMS', memberIndex: 1, traits: [0 => 'SSE-KMS'], targetClass: SSEKMS::class)], targetClass: InventoryEncryption::class)
            ],
            targetClass: InventoryS3BucketDestination::class
        );
    }

    public static function inventorySchedule(): Schema
    {
        if (isset(self::$InventorySchedule)) {
            return self::$InventorySchedule;
        }

        return self::$InventorySchedule = new Schema(
            id: 'com.amazonaws.s3#InventorySchedule',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InventorySchedule$Frequency', type: ShapeType::Enum, memberName: 'Frequency', memberIndex: 0, traits: [14 => true], targetClass: InventoryFrequency::class)
            ],
            targetClass: InventorySchedule::class
        );
    }

    public static function inventoryTableConfiguration(): Schema
    {
        if (isset(self::$InventoryTableConfiguration)) {
            return self::$InventoryTableConfiguration;
        }

        return self::$InventoryTableConfiguration = new Schema(
            id: 'com.amazonaws.s3#InventoryTableConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InventoryTableConfiguration$ConfigurationState', type: ShapeType::Enum, memberName: 'ConfigurationState', memberIndex: 0, traits: [14 => true], targetClass: InventoryConfigurationState::class),
                new Schema(id: 'com.amazonaws.s3#InventoryTableConfiguration$EncryptionConfiguration', type: ShapeType::Structure, memberName: 'EncryptionConfiguration', memberIndex: 1, members: self::metadataTableEncryptionConfiguration()->getMembers(), targetClass: MetadataTableEncryptionConfiguration::class)
            ],
            targetClass: InventoryTableConfiguration::class
        );
    }

    public static function inventoryTableConfigurationResult(): Schema
    {
        if (isset(self::$InventoryTableConfigurationResult)) {
            return self::$InventoryTableConfigurationResult;
        }

        return self::$InventoryTableConfigurationResult = new Schema(
            id: 'com.amazonaws.s3#InventoryTableConfigurationResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InventoryTableConfigurationResult$ConfigurationState', type: ShapeType::Enum, memberName: 'ConfigurationState', memberIndex: 0, traits: [14 => true], targetClass: InventoryConfigurationState::class),
                new Schema(id: 'com.amazonaws.s3#InventoryTableConfigurationResult$TableStatus', type: ShapeType::String_, memberName: 'TableStatus', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#InventoryTableConfigurationResult$Error', type: ShapeType::Structure, memberName: 'Error', memberIndex: 2, members: self::errorDetails()->getMembers(), targetClass: ErrorDetails::class),
                new Schema(id: 'com.amazonaws.s3#InventoryTableConfigurationResult$TableName', type: ShapeType::String_, memberName: 'TableName', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#InventoryTableConfigurationResult$TableArn', type: ShapeType::String_, memberName: 'TableArn', memberIndex: 4)
            ],
            targetClass: InventoryTableConfigurationResult::class
        );
    }

    public static function inventoryTableConfigurationUpdates(): Schema
    {
        if (isset(self::$InventoryTableConfigurationUpdates)) {
            return self::$InventoryTableConfigurationUpdates;
        }

        return self::$InventoryTableConfigurationUpdates = new Schema(
            id: 'com.amazonaws.s3#InventoryTableConfigurationUpdates',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#InventoryTableConfigurationUpdates$ConfigurationState', type: ShapeType::Enum, memberName: 'ConfigurationState', memberIndex: 0, traits: [14 => true], targetClass: InventoryConfigurationState::class),
                new Schema(id: 'com.amazonaws.s3#InventoryTableConfigurationUpdates$EncryptionConfiguration', type: ShapeType::Structure, memberName: 'EncryptionConfiguration', memberIndex: 1, members: self::metadataTableEncryptionConfiguration()->getMembers(), targetClass: MetadataTableEncryptionConfiguration::class)
            ],
            targetClass: InventoryTableConfigurationUpdates::class
        );
    }

    public static function jSONInput(): Schema
    {
        if (isset(self::$JSONInput)) {
            return self::$JSONInput;
        }

        return self::$JSONInput = new Schema(
            id: 'com.amazonaws.s3#JSONInput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#JSONInput$Type', type: ShapeType::Enum, memberName: 'Type', memberIndex: 0, targetClass: JSONType::class)
            ],
            targetClass: JSONInput::class
        );
    }

    public static function jSONOutput(): Schema
    {
        if (isset(self::$JSONOutput)) {
            return self::$JSONOutput;
        }

        return self::$JSONOutput = new Schema(
            id: 'com.amazonaws.s3#JSONOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#JSONOutput$RecordDelimiter', type: ShapeType::String_, memberName: 'RecordDelimiter', memberIndex: 0)
            ],
            targetClass: JSONOutput::class
        );
    }

    public static function journalTableConfiguration(): Schema
    {
        if (isset(self::$JournalTableConfiguration)) {
            return self::$JournalTableConfiguration;
        }

        return self::$JournalTableConfiguration = new Schema(
            id: 'com.amazonaws.s3#JournalTableConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#JournalTableConfiguration$RecordExpiration', type: ShapeType::Structure, memberName: 'RecordExpiration', memberIndex: 0, members: self::recordExpiration()->getMembers(), traits: [14 => true], targetClass: RecordExpiration::class),
                new Schema(id: 'com.amazonaws.s3#JournalTableConfiguration$EncryptionConfiguration', type: ShapeType::Structure, memberName: 'EncryptionConfiguration', memberIndex: 1, members: self::metadataTableEncryptionConfiguration()->getMembers(), targetClass: MetadataTableEncryptionConfiguration::class)
            ],
            targetClass: JournalTableConfiguration::class
        );
    }

    public static function journalTableConfigurationResult(): Schema
    {
        if (isset(self::$JournalTableConfigurationResult)) {
            return self::$JournalTableConfigurationResult;
        }

        return self::$JournalTableConfigurationResult = new Schema(
            id: 'com.amazonaws.s3#JournalTableConfigurationResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#JournalTableConfigurationResult$TableStatus', type: ShapeType::String_, memberName: 'TableStatus', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#JournalTableConfigurationResult$TableName', type: ShapeType::String_, memberName: 'TableName', memberIndex: 1, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#JournalTableConfigurationResult$RecordExpiration', type: ShapeType::Structure, memberName: 'RecordExpiration', memberIndex: 2, members: self::recordExpiration()->getMembers(), traits: [14 => true], targetClass: RecordExpiration::class),
                new Schema(id: 'com.amazonaws.s3#JournalTableConfigurationResult$Error', type: ShapeType::Structure, memberName: 'Error', memberIndex: 3, members: self::errorDetails()->getMembers(), targetClass: ErrorDetails::class),
                new Schema(id: 'com.amazonaws.s3#JournalTableConfigurationResult$TableArn', type: ShapeType::String_, memberName: 'TableArn', memberIndex: 4)
            ],
            targetClass: JournalTableConfigurationResult::class
        );
    }

    public static function journalTableConfigurationUpdates(): Schema
    {
        if (isset(self::$JournalTableConfigurationUpdates)) {
            return self::$JournalTableConfigurationUpdates;
        }

        return self::$JournalTableConfigurationUpdates = new Schema(
            id: 'com.amazonaws.s3#JournalTableConfigurationUpdates',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#JournalTableConfigurationUpdates$RecordExpiration', type: ShapeType::Structure, memberName: 'RecordExpiration', memberIndex: 0, members: self::recordExpiration()->getMembers(), traits: [14 => true], targetClass: RecordExpiration::class)
            ],
            targetClass: JournalTableConfigurationUpdates::class
        );
    }

    public static function lambdaFunctionConfiguration(): Schema
    {
        if (isset(self::$LambdaFunctionConfiguration)) {
            return self::$LambdaFunctionConfiguration;
        }

        return self::$LambdaFunctionConfiguration = new Schema(
            id: 'com.amazonaws.s3#LambdaFunctionConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#LambdaFunctionConfiguration$LambdaFunctionArn', type: ShapeType::String_, memberName: 'LambdaFunctionArn', memberIndex: 0, traits: [0 => 'CloudFunction', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#LambdaFunctionConfiguration$Events', type: ShapeType::List_, memberName: 'Events', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#EventList$member'] ??= new Schema(id: 'com.amazonaws.s3#EventList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, targetClass: Event::class), traits: [0 => 'Event', 3 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#LambdaFunctionConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#LambdaFunctionConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 3, members: [new Schema(id: 'com.amazonaws.s3#NotificationConfigurationFilter$Key', type: ShapeType::Structure, memberName: 'Key', memberIndex: 0, traits: [0 => 'S3Key'], targetClass: S3KeyFilter::class)], targetClass: NotificationConfigurationFilter::class)
            ],
            targetClass: LambdaFunctionConfiguration::class
        );
    }

    public static function lifecycleExpiration(): Schema
    {
        if (isset(self::$LifecycleExpiration)) {
            return self::$LifecycleExpiration;
        }

        return self::$LifecycleExpiration = new Schema(
            id: 'com.amazonaws.s3#LifecycleExpiration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#LifecycleExpiration$Date', type: ShapeType::Timestamp, memberName: 'Date', memberIndex: 0, traits: [4 => 'date-time']),
                new Schema(id: 'com.amazonaws.s3#LifecycleExpiration$Days', type: ShapeType::Integer, memberName: 'Days', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#LifecycleExpiration$ExpiredObjectDeleteMarker', type: ShapeType::Boolean, memberName: 'ExpiredObjectDeleteMarker', memberIndex: 2)
            ],
            targetClass: LifecycleExpiration::class
        );
    }

    public static function lifecycleRule(): Schema
    {
        if (isset(self::$LifecycleRule)) {
            return self::$LifecycleRule;
        }

        return self::$LifecycleRule = new Schema(
            id: 'com.amazonaws.s3#LifecycleRule',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#LifecycleRule$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: ExpirationStatus::class),
                new Schema(id: 'com.amazonaws.s3#LifecycleRule$Expiration', type: ShapeType::Structure, memberName: 'Expiration', memberIndex: 1, members: self::lifecycleExpiration()->getMembers(), targetClass: LifecycleExpiration::class),
                new Schema(id: 'com.amazonaws.s3#LifecycleRule$ID', type: ShapeType::String_, memberName: 'ID', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#LifecycleRule$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#LifecycleRule$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 4, members: self::lifecycleRuleFilter()->getMembers(), targetClass: LifecycleRuleFilter::class),
                new Schema(id: 'com.amazonaws.s3#LifecycleRule$Transitions', type: ShapeType::List_, memberName: 'Transitions', memberIndex: 5, listMember: SchemasMembers::$shared['com.amazonaws.s3#TransitionList$member'] ??= new Schema(id: 'com.amazonaws.s3#TransitionList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::transition()->getMembers(), targetClass: Transition::class), traits: [0 => 'Transition', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#LifecycleRule$NoncurrentVersionTransitions', type: ShapeType::List_, memberName: 'NoncurrentVersionTransitions', memberIndex: 6, listMember: SchemasMembers::$shared['com.amazonaws.s3#NoncurrentVersionTransitionList$member'] ??= new Schema(id: 'com.amazonaws.s3#NoncurrentVersionTransitionList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::noncurrentVersionTransition()->getMembers(), targetClass: NoncurrentVersionTransition::class), traits: [0 => 'NoncurrentVersionTransition', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#LifecycleRule$NoncurrentVersionExpiration', type: ShapeType::Structure, memberName: 'NoncurrentVersionExpiration', memberIndex: 7, members: self::noncurrentVersionExpiration()->getMembers(), targetClass: NoncurrentVersionExpiration::class),
                new Schema(id: 'com.amazonaws.s3#LifecycleRule$AbortIncompleteMultipartUpload', type: ShapeType::Structure, memberName: 'AbortIncompleteMultipartUpload', memberIndex: 8, members: self::abortIncompleteMultipartUpload()->getMembers(), targetClass: AbortIncompleteMultipartUpload::class)
            ],
            targetClass: LifecycleRule::class
        );
    }

    public static function lifecycleRuleAndOperator(): Schema
    {
        if (isset(self::$LifecycleRuleAndOperator)) {
            return self::$LifecycleRuleAndOperator;
        }

        return self::$LifecycleRuleAndOperator = new Schema(
            id: 'com.amazonaws.s3#LifecycleRuleAndOperator',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#LifecycleRuleAndOperator$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#LifecycleRuleAndOperator$Tags', type: ShapeType::List_, memberName: 'Tags', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [0 => 'Tag', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#LifecycleRuleAndOperator$ObjectSizeGreaterThan', type: ShapeType::Long, memberName: 'ObjectSizeGreaterThan', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#LifecycleRuleAndOperator$ObjectSizeLessThan', type: ShapeType::Long, memberName: 'ObjectSizeLessThan', memberIndex: 3)
            ],
            targetClass: LifecycleRuleAndOperator::class
        );
    }

    public static function lifecycleRuleFilter(): Schema
    {
        if (isset(self::$LifecycleRuleFilter)) {
            return self::$LifecycleRuleFilter;
        }

        return self::$LifecycleRuleFilter = new Schema(
            id: 'com.amazonaws.s3#LifecycleRuleFilter',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#LifecycleRuleFilter$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#LifecycleRuleFilter$Tag', type: ShapeType::Structure, memberName: 'Tag', memberIndex: 1, members: self::tag()->getMembers(), targetClass: Tag::class),
                new Schema(id: 'com.amazonaws.s3#LifecycleRuleFilter$ObjectSizeGreaterThan', type: ShapeType::Long, memberName: 'ObjectSizeGreaterThan', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#LifecycleRuleFilter$ObjectSizeLessThan', type: ShapeType::Long, memberName: 'ObjectSizeLessThan', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#LifecycleRuleFilter$And', type: ShapeType::Structure, memberName: 'And', memberIndex: 4, members: self::lifecycleRuleAndOperator()->getMembers(), targetClass: LifecycleRuleAndOperator::class)
            ],
            targetClass: LifecycleRuleFilter::class
        );
    }

    public static function listBucketAnalyticsConfigurationsOutput(): Schema
    {
        if (isset(self::$ListBucketAnalyticsConfigurationsOutput)) {
            return self::$ListBucketAnalyticsConfigurationsOutput;
        }

        return self::$ListBucketAnalyticsConfigurationsOutput = new Schema(
            id: 'com.amazonaws.s3#ListBucketAnalyticsConfigurationsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListBucketAnalyticsConfigurationsOutput$IsTruncated', type: ShapeType::Boolean, memberName: 'IsTruncated', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ListBucketAnalyticsConfigurationsOutput$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#ListBucketAnalyticsConfigurationsOutput$NextContinuationToken', type: ShapeType::String_, memberName: 'NextContinuationToken', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListBucketAnalyticsConfigurationsOutput$AnalyticsConfigurationList', type: ShapeType::List_, memberName: 'AnalyticsConfigurationList', memberIndex: 3, listMember: SchemasMembers::$shared['com.amazonaws.s3#AnalyticsConfigurationList$member'] ??= new Schema(id: 'com.amazonaws.s3#AnalyticsConfigurationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$StorageClassAnalysis', type: ShapeType::Structure, memberName: 'StorageClassAnalysis', memberIndex: 1, traits: [14 => true], targetClass: StorageClassAnalysis::class), new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$Filter', type: ShapeType::Union, memberName: 'Filter', memberIndex: 2, targetClass: AnalyticsFilter::class)], targetClass: AnalyticsConfiguration::class), traits: [0 => 'AnalyticsConfiguration', 3 => true])
            ], traits: [0 => 'ListBucketAnalyticsConfigurationResult'],
            targetClass: ListBucketAnalyticsConfigurationsOutput::class
        );
    }

    public static function listBucketAnalyticsConfigurationsRequest(): Schema
    {
        if (isset(self::$ListBucketAnalyticsConfigurationsRequest)) {
            return self::$ListBucketAnalyticsConfigurationsRequest;
        }

        return self::$ListBucketAnalyticsConfigurationsRequest = new Schema(
            id: 'com.amazonaws.s3#ListBucketAnalyticsConfigurationsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListBucketAnalyticsConfigurationsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#ListBucketAnalyticsConfigurationsRequest$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 1, traits: [9 => 'continuation-token']),
                new Schema(id: 'com.amazonaws.s3#ListBucketAnalyticsConfigurationsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: ListBucketAnalyticsConfigurationsRequest::class
        );
    }

    public static function listBucketIntelligentTieringConfigurationsOutput(): Schema
    {
        if (isset(self::$ListBucketIntelligentTieringConfigurationsOutput)) {
            return self::$ListBucketIntelligentTieringConfigurationsOutput;
        }

        return self::$ListBucketIntelligentTieringConfigurationsOutput = new Schema(
            id: 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurationsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurationsOutput$IsTruncated', type: ShapeType::Boolean, memberName: 'IsTruncated', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurationsOutput$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurationsOutput$NextContinuationToken', type: ShapeType::String_, memberName: 'NextContinuationToken', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurationsOutput$IntelligentTieringConfigurationList', type: ShapeType::List_, memberName: 'IntelligentTieringConfigurationList', memberIndex: 3, listMember: SchemasMembers::$shared['com.amazonaws.s3#IntelligentTieringConfigurationList$member'] ??= new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfigurationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 1, traits: [14 => true], targetClass: IntelligentTieringStatus::class), new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Tierings', type: ShapeType::List_, memberName: 'Tierings', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#TieringList$member'] ??= new Schema(id: 'com.amazonaws.s3#TieringList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tiering()->getMembers(), targetClass: Tiering::class), traits: [0 => 'Tiering', 3 => true, 14 => true]), new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 3, targetClass: IntelligentTieringFilter::class)], targetClass: IntelligentTieringConfiguration::class), traits: [0 => 'IntelligentTieringConfiguration', 3 => true])
            ],
            targetClass: ListBucketIntelligentTieringConfigurationsOutput::class
        );
    }

    public static function listBucketIntelligentTieringConfigurationsRequest(): Schema
    {
        if (isset(self::$ListBucketIntelligentTieringConfigurationsRequest)) {
            return self::$ListBucketIntelligentTieringConfigurationsRequest;
        }

        return self::$ListBucketIntelligentTieringConfigurationsRequest = new Schema(
            id: 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurationsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurationsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurationsRequest$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 1, traits: [9 => 'continuation-token']),
                new Schema(id: 'com.amazonaws.s3#ListBucketIntelligentTieringConfigurationsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: ListBucketIntelligentTieringConfigurationsRequest::class
        );
    }

    public static function listBucketInventoryConfigurationsOutput(): Schema
    {
        if (isset(self::$ListBucketInventoryConfigurationsOutput)) {
            return self::$ListBucketInventoryConfigurationsOutput;
        }

        return self::$ListBucketInventoryConfigurationsOutput = new Schema(
            id: 'com.amazonaws.s3#ListBucketInventoryConfigurationsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListBucketInventoryConfigurationsOutput$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ListBucketInventoryConfigurationsOutput$InventoryConfigurationList', type: ShapeType::List_, memberName: 'InventoryConfigurationList', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#InventoryConfigurationList$member'] ??= new Schema(id: 'com.amazonaws.s3#InventoryConfigurationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Destination', type: ShapeType::Structure, memberName: 'Destination', memberIndex: 0, traits: [14 => true], targetClass: InventoryDestination::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$IsEnabled', type: ShapeType::Boolean, memberName: 'IsEnabled', memberIndex: 1, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 2, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$IncludedObjectVersions', type: ShapeType::Enum, memberName: 'IncludedObjectVersions', memberIndex: 3, traits: [14 => true], targetClass: InventoryIncludedObjectVersions::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Schedule', type: ShapeType::Structure, memberName: 'Schedule', memberIndex: 4, traits: [14 => true], targetClass: InventorySchedule::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 5, targetClass: InventoryFilter::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$OptionalFields', type: ShapeType::List_, memberName: 'OptionalFields', memberIndex: 6, listMember: SchemasMembers::$shared['com.amazonaws.s3#InventoryOptionalFields$member'] ??= new Schema(id: 'com.amazonaws.s3#InventoryOptionalFields$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, traits: [0 => 'Field'], targetClass: InventoryOptionalField::class))], targetClass: InventoryConfiguration::class), traits: [0 => 'InventoryConfiguration', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListBucketInventoryConfigurationsOutput$IsTruncated', type: ShapeType::Boolean, memberName: 'IsTruncated', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListBucketInventoryConfigurationsOutput$NextContinuationToken', type: ShapeType::String_, memberName: 'NextContinuationToken', memberIndex: 3)
            ], traits: [0 => 'ListInventoryConfigurationsResult'],
            targetClass: ListBucketInventoryConfigurationsOutput::class
        );
    }

    public static function listBucketInventoryConfigurationsRequest(): Schema
    {
        if (isset(self::$ListBucketInventoryConfigurationsRequest)) {
            return self::$ListBucketInventoryConfigurationsRequest;
        }

        return self::$ListBucketInventoryConfigurationsRequest = new Schema(
            id: 'com.amazonaws.s3#ListBucketInventoryConfigurationsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListBucketInventoryConfigurationsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#ListBucketInventoryConfigurationsRequest$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 1, traits: [9 => 'continuation-token']),
                new Schema(id: 'com.amazonaws.s3#ListBucketInventoryConfigurationsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: ListBucketInventoryConfigurationsRequest::class
        );
    }

    public static function listBucketMetricsConfigurationsOutput(): Schema
    {
        if (isset(self::$ListBucketMetricsConfigurationsOutput)) {
            return self::$ListBucketMetricsConfigurationsOutput;
        }

        return self::$ListBucketMetricsConfigurationsOutput = new Schema(
            id: 'com.amazonaws.s3#ListBucketMetricsConfigurationsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListBucketMetricsConfigurationsOutput$IsTruncated', type: ShapeType::Boolean, memberName: 'IsTruncated', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ListBucketMetricsConfigurationsOutput$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#ListBucketMetricsConfigurationsOutput$NextContinuationToken', type: ShapeType::String_, memberName: 'NextContinuationToken', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListBucketMetricsConfigurationsOutput$MetricsConfigurationList', type: ShapeType::List_, memberName: 'MetricsConfigurationList', memberIndex: 3, listMember: SchemasMembers::$shared['com.amazonaws.s3#MetricsConfigurationList$member'] ??= new Schema(id: 'com.amazonaws.s3#MetricsConfigurationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#MetricsConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#MetricsConfiguration$Filter', type: ShapeType::Union, memberName: 'Filter', memberIndex: 1, targetClass: MetricsFilter::class)], targetClass: MetricsConfiguration::class), traits: [0 => 'MetricsConfiguration', 3 => true])
            ], traits: [0 => 'ListMetricsConfigurationsResult'],
            targetClass: ListBucketMetricsConfigurationsOutput::class
        );
    }

    public static function listBucketMetricsConfigurationsRequest(): Schema
    {
        if (isset(self::$ListBucketMetricsConfigurationsRequest)) {
            return self::$ListBucketMetricsConfigurationsRequest;
        }

        return self::$ListBucketMetricsConfigurationsRequest = new Schema(
            id: 'com.amazonaws.s3#ListBucketMetricsConfigurationsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListBucketMetricsConfigurationsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#ListBucketMetricsConfigurationsRequest$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 1, traits: [9 => 'continuation-token']),
                new Schema(id: 'com.amazonaws.s3#ListBucketMetricsConfigurationsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: ListBucketMetricsConfigurationsRequest::class
        );
    }

    public static function listBucketsOutput(): Schema
    {
        if (isset(self::$ListBucketsOutput)) {
            return self::$ListBucketsOutput;
        }

        return self::$ListBucketsOutput = new Schema(
            id: 'com.amazonaws.s3#ListBucketsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListBucketsOutput$Buckets', type: ShapeType::List_, memberName: 'Buckets', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#Buckets$member'] ??= new Schema(id: 'com.amazonaws.s3#Buckets$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::bucket()->getMembers(), traits: [0 => 'Bucket'], targetClass: Bucket::class)),
                new Schema(id: 'com.amazonaws.s3#ListBucketsOutput$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 1, members: self::owner()->getMembers(), targetClass: Owner::class),
                new Schema(id: 'com.amazonaws.s3#ListBucketsOutput$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListBucketsOutput$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 3)
            ], traits: [0 => 'ListAllMyBucketsResult'],
            targetClass: ListBucketsOutput::class
        );
    }

    public static function listBucketsRequest(): Schema
    {
        if (isset(self::$ListBucketsRequest)) {
            return self::$ListBucketsRequest;
        }

        return self::$ListBucketsRequest = new Schema(
            id: 'com.amazonaws.s3#ListBucketsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListBucketsRequest$MaxBuckets', type: ShapeType::Integer, memberName: 'MaxBuckets', memberIndex: 0, traits: [9 => 'max-buckets']),
                new Schema(id: 'com.amazonaws.s3#ListBucketsRequest$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 1, traits: [9 => 'continuation-token']),
                new Schema(id: 'com.amazonaws.s3#ListBucketsRequest$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 2, traits: [9 => 'prefix']),
                new Schema(id: 'com.amazonaws.s3#ListBucketsRequest$BucketRegion', type: ShapeType::String_, memberName: 'BucketRegion', memberIndex: 3, traits: [9 => 'bucket-region'])
            ],
            targetClass: ListBucketsRequest::class
        );
    }

    public static function listDirectoryBucketsOutput(): Schema
    {
        if (isset(self::$ListDirectoryBucketsOutput)) {
            return self::$ListDirectoryBucketsOutput;
        }

        return self::$ListDirectoryBucketsOutput = new Schema(
            id: 'com.amazonaws.s3#ListDirectoryBucketsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListDirectoryBucketsOutput$Buckets', type: ShapeType::List_, memberName: 'Buckets', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#Buckets$member'] ??= new Schema(id: 'com.amazonaws.s3#Buckets$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::bucket()->getMembers(), traits: [0 => 'Bucket'], targetClass: Bucket::class)),
                new Schema(id: 'com.amazonaws.s3#ListDirectoryBucketsOutput$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 1)
            ], traits: [0 => 'ListAllMyDirectoryBucketsResult'],
            targetClass: ListDirectoryBucketsOutput::class
        );
    }

    public static function listDirectoryBucketsRequest(): Schema
    {
        if (isset(self::$ListDirectoryBucketsRequest)) {
            return self::$ListDirectoryBucketsRequest;
        }

        return self::$ListDirectoryBucketsRequest = new Schema(
            id: 'com.amazonaws.s3#ListDirectoryBucketsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListDirectoryBucketsRequest$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 0, traits: [9 => 'continuation-token']),
                new Schema(id: 'com.amazonaws.s3#ListDirectoryBucketsRequest$MaxDirectoryBuckets', type: ShapeType::Integer, memberName: 'MaxDirectoryBuckets', memberIndex: 1, traits: [9 => 'max-directory-buckets'])
            ],
            targetClass: ListDirectoryBucketsRequest::class
        );
    }

    public static function listMultipartUploadsOutput(): Schema
    {
        if (isset(self::$ListMultipartUploadsOutput)) {
            return self::$ListMultipartUploadsOutput;
        }

        return self::$ListMultipartUploadsOutput = new Schema(
            id: 'com.amazonaws.s3#ListMultipartUploadsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$KeyMarker', type: ShapeType::String_, memberName: 'KeyMarker', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$UploadIdMarker', type: ShapeType::String_, memberName: 'UploadIdMarker', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$NextKeyMarker', type: ShapeType::String_, memberName: 'NextKeyMarker', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$Delimiter', type: ShapeType::String_, memberName: 'Delimiter', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$NextUploadIdMarker', type: ShapeType::String_, memberName: 'NextUploadIdMarker', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$MaxUploads', type: ShapeType::Integer, memberName: 'MaxUploads', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$IsTruncated', type: ShapeType::Boolean, memberName: 'IsTruncated', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$Uploads', type: ShapeType::List_, memberName: 'Uploads', memberIndex: 9, listMember: SchemasMembers::$shared['com.amazonaws.s3#MultipartUploadList$member'] ??= new Schema(id: 'com.amazonaws.s3#MultipartUploadList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::multipartUpload()->getMembers(), targetClass: MultipartUpload::class), traits: [0 => 'Upload', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$CommonPrefixes', type: ShapeType::List_, memberName: 'CommonPrefixes', memberIndex: 10, listMember: SchemasMembers::$shared['com.amazonaws.s3#CommonPrefixList$member'] ??= new Schema(id: 'com.amazonaws.s3#CommonPrefixList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::commonPrefix()->getMembers(), targetClass: CommonPrefix::class), traits: [3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$EncodingType', type: ShapeType::Enum, memberName: 'EncodingType', memberIndex: 11, targetClass: EncodingType::class),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 12, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ], traits: [0 => 'ListMultipartUploadsResult'],
            targetClass: ListMultipartUploadsOutput::class
        );
    }

    public static function listMultipartUploadsRequest(): Schema
    {
        if (isset(self::$ListMultipartUploadsRequest)) {
            return self::$ListMultipartUploadsRequest;
        }

        return self::$ListMultipartUploadsRequest = new Schema(
            id: 'com.amazonaws.s3#ListMultipartUploadsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsRequest$Delimiter', type: ShapeType::String_, memberName: 'Delimiter', memberIndex: 1, traits: [9 => 'delimiter']),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsRequest$EncodingType', type: ShapeType::Enum, memberName: 'EncodingType', memberIndex: 2, traits: [9 => 'encoding-type'], targetClass: EncodingType::class),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsRequest$KeyMarker', type: ShapeType::String_, memberName: 'KeyMarker', memberIndex: 3, traits: [9 => 'key-marker']),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsRequest$MaxUploads', type: ShapeType::Integer, memberName: 'MaxUploads', memberIndex: 4, traits: [9 => 'max-uploads']),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsRequest$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 5, traits: [9 => 'prefix'], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Prefix']]),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsRequest$UploadIdMarker', type: ShapeType::String_, memberName: 'UploadIdMarker', memberIndex: 6, traits: [9 => 'upload-id-marker']),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 7, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#ListMultipartUploadsRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 8, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class)
            ],
            targetClass: ListMultipartUploadsRequest::class
        );
    }

    public static function listObjectAnnotationsOutput(): Schema
    {
        if (isset(self::$ListObjectAnnotationsOutput)) {
            return self::$ListObjectAnnotationsOutput;
        }

        return self::$ListObjectAnnotationsOutput = new Schema(
            id: 'com.amazonaws.s3#ListObjectAnnotationsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsOutput$Annotations', type: ShapeType::List_, memberName: 'Annotations', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#AnnotationList$member'] ??= new Schema(id: 'com.amazonaws.s3#AnnotationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::annotationEntry()->getMembers(), traits: [0 => 'AnnotationEntry'], targetClass: AnnotationEntry::class)),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsOutput$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsOutput$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsOutput$ObjectVersionId', type: ShapeType::String_, memberName: 'ObjectVersionId', memberIndex: 3, traits: [5 => 'x-amz-object-version-id']),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsOutput$AnnotationPrefix', type: ShapeType::String_, memberName: 'AnnotationPrefix', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsOutput$MaxAnnotationResults', type: ShapeType::Integer, memberName: 'MaxAnnotationResults', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsOutput$AnnotationCount', type: ShapeType::Integer, memberName: 'AnnotationCount', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsOutput$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsOutput$NextContinuationToken', type: ShapeType::String_, memberName: 'NextContinuationToken', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 9, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: ListObjectAnnotationsOutput::class
        );
    }

    public static function listObjectAnnotationsRequest(): Schema
    {
        if (isset(self::$ListObjectAnnotationsRequest)) {
            return self::$ListObjectAnnotationsRequest;
        }

        return self::$ListObjectAnnotationsRequest = new Schema(
            id: 'com.amazonaws.s3#ListObjectAnnotationsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 2, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsRequest$MaxAnnotationResults', type: ShapeType::Integer, memberName: 'MaxAnnotationResults', memberIndex: 3, traits: [9 => 'max-annotation-results']),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsRequest$AnnotationPrefix', type: ShapeType::String_, memberName: 'AnnotationPrefix', memberIndex: 4, traits: [9 => 'annotation-prefix']),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsRequest$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 5, traits: [9 => 'continuation-token']),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 6, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#ListObjectAnnotationsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 7, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: ListObjectAnnotationsRequest::class
        );
    }

    public static function listObjectVersionsOutput(): Schema
    {
        if (isset(self::$ListObjectVersionsOutput)) {
            return self::$ListObjectVersionsOutput;
        }

        return self::$ListObjectVersionsOutput = new Schema(
            id: 'com.amazonaws.s3#ListObjectVersionsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$IsTruncated', type: ShapeType::Boolean, memberName: 'IsTruncated', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$KeyMarker', type: ShapeType::String_, memberName: 'KeyMarker', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$VersionIdMarker', type: ShapeType::String_, memberName: 'VersionIdMarker', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$NextKeyMarker', type: ShapeType::String_, memberName: 'NextKeyMarker', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$NextVersionIdMarker', type: ShapeType::String_, memberName: 'NextVersionIdMarker', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$Versions', type: ShapeType::List_, memberName: 'Versions', memberIndex: 5, listMember: SchemasMembers::$shared['com.amazonaws.s3#ObjectVersionList$member'] ??= new Schema(id: 'com.amazonaws.s3#ObjectVersionList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::objectVersion()->getMembers(), targetClass: ObjectVersion::class), traits: [0 => 'Version', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$DeleteMarkers', type: ShapeType::List_, memberName: 'DeleteMarkers', memberIndex: 6, listMember: SchemasMembers::$shared['com.amazonaws.s3#DeleteMarkers$member'] ??= new Schema(id: 'com.amazonaws.s3#DeleteMarkers$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::deleteMarkerEntry()->getMembers(), targetClass: DeleteMarkerEntry::class), traits: [0 => 'DeleteMarker', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$Name', type: ShapeType::String_, memberName: 'Name', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$Delimiter', type: ShapeType::String_, memberName: 'Delimiter', memberIndex: 9),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$MaxKeys', type: ShapeType::Integer, memberName: 'MaxKeys', memberIndex: 10),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$CommonPrefixes', type: ShapeType::List_, memberName: 'CommonPrefixes', memberIndex: 11, listMember: SchemasMembers::$shared['com.amazonaws.s3#CommonPrefixList$member'] ??= new Schema(id: 'com.amazonaws.s3#CommonPrefixList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::commonPrefix()->getMembers(), targetClass: CommonPrefix::class), traits: [3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$EncodingType', type: ShapeType::Enum, memberName: 'EncodingType', memberIndex: 12, targetClass: EncodingType::class),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 13, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ], traits: [0 => 'ListVersionsResult'],
            targetClass: ListObjectVersionsOutput::class
        );
    }

    public static function listObjectVersionsRequest(): Schema
    {
        if (isset(self::$ListObjectVersionsRequest)) {
            return self::$ListObjectVersionsRequest;
        }

        return self::$ListObjectVersionsRequest = new Schema(
            id: 'com.amazonaws.s3#ListObjectVersionsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsRequest$Delimiter', type: ShapeType::String_, memberName: 'Delimiter', memberIndex: 1, traits: [9 => 'delimiter']),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsRequest$EncodingType', type: ShapeType::Enum, memberName: 'EncodingType', memberIndex: 2, traits: [9 => 'encoding-type'], targetClass: EncodingType::class),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsRequest$KeyMarker', type: ShapeType::String_, memberName: 'KeyMarker', memberIndex: 3, traits: [9 => 'key-marker']),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsRequest$MaxKeys', type: ShapeType::Integer, memberName: 'MaxKeys', memberIndex: 4, traits: [9 => 'max-keys']),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsRequest$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 5, traits: [9 => 'prefix'], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Prefix']]),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsRequest$VersionIdMarker', type: ShapeType::String_, memberName: 'VersionIdMarker', memberIndex: 6, traits: [9 => 'version-id-marker']),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 7, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 8, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#ListObjectVersionsRequest$OptionalObjectAttributes', type: ShapeType::List_, memberName: 'OptionalObjectAttributes', memberIndex: 9, listMember: SchemasMembers::$shared['com.amazonaws.s3#OptionalObjectAttributesList$member'] ??= new Schema(id: 'com.amazonaws.s3#OptionalObjectAttributesList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, targetClass: OptionalObjectAttributes::class), traits: [5 => 'x-amz-optional-object-attributes'])
            ],
            targetClass: ListObjectVersionsRequest::class
        );
    }

    public static function listObjectsOutput(): Schema
    {
        if (isset(self::$ListObjectsOutput)) {
            return self::$ListObjectsOutput;
        }

        return self::$ListObjectsOutput = new Schema(
            id: 'com.amazonaws.s3#ListObjectsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$IsTruncated', type: ShapeType::Boolean, memberName: 'IsTruncated', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$Marker', type: ShapeType::String_, memberName: 'Marker', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$NextMarker', type: ShapeType::String_, memberName: 'NextMarker', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$Contents', type: ShapeType::List_, memberName: 'Contents', memberIndex: 3, listMember: SchemasMembers::$shared['com.amazonaws.s3#ObjectList$member'] ??= new Schema(id: 'com.amazonaws.s3#ObjectList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::s3Object()->getMembers(), targetClass: S3Object::class), traits: [3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$Name', type: ShapeType::String_, memberName: 'Name', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$Delimiter', type: ShapeType::String_, memberName: 'Delimiter', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$MaxKeys', type: ShapeType::Integer, memberName: 'MaxKeys', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$CommonPrefixes', type: ShapeType::List_, memberName: 'CommonPrefixes', memberIndex: 8, listMember: SchemasMembers::$shared['com.amazonaws.s3#CommonPrefixList$member'] ??= new Schema(id: 'com.amazonaws.s3#CommonPrefixList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::commonPrefix()->getMembers(), targetClass: CommonPrefix::class), traits: [3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$EncodingType', type: ShapeType::Enum, memberName: 'EncodingType', memberIndex: 9, targetClass: EncodingType::class),
                new Schema(id: 'com.amazonaws.s3#ListObjectsOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 10, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ], traits: [0 => 'ListBucketResult'],
            targetClass: ListObjectsOutput::class
        );
    }

    public static function listObjectsRequest(): Schema
    {
        if (isset(self::$ListObjectsRequest)) {
            return self::$ListObjectsRequest;
        }

        return self::$ListObjectsRequest = new Schema(
            id: 'com.amazonaws.s3#ListObjectsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListObjectsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#ListObjectsRequest$Delimiter', type: ShapeType::String_, memberName: 'Delimiter', memberIndex: 1, traits: [9 => 'delimiter']),
                new Schema(id: 'com.amazonaws.s3#ListObjectsRequest$EncodingType', type: ShapeType::Enum, memberName: 'EncodingType', memberIndex: 2, traits: [9 => 'encoding-type'], targetClass: EncodingType::class),
                new Schema(id: 'com.amazonaws.s3#ListObjectsRequest$Marker', type: ShapeType::String_, memberName: 'Marker', memberIndex: 3, traits: [9 => 'marker']),
                new Schema(id: 'com.amazonaws.s3#ListObjectsRequest$MaxKeys', type: ShapeType::Integer, memberName: 'MaxKeys', memberIndex: 4, traits: [9 => 'max-keys']),
                new Schema(id: 'com.amazonaws.s3#ListObjectsRequest$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 5, traits: [9 => 'prefix'], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Prefix']]),
                new Schema(id: 'com.amazonaws.s3#ListObjectsRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 6, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#ListObjectsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 7, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#ListObjectsRequest$OptionalObjectAttributes', type: ShapeType::List_, memberName: 'OptionalObjectAttributes', memberIndex: 8, listMember: SchemasMembers::$shared['com.amazonaws.s3#OptionalObjectAttributesList$member'] ??= new Schema(id: 'com.amazonaws.s3#OptionalObjectAttributesList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, targetClass: OptionalObjectAttributes::class), traits: [5 => 'x-amz-optional-object-attributes'])
            ],
            targetClass: ListObjectsRequest::class
        );
    }

    public static function listObjectsV2Output(): Schema
    {
        if (isset(self::$ListObjectsV2Output)) {
            return self::$ListObjectsV2Output;
        }

        return self::$ListObjectsV2Output = new Schema(
            id: 'com.amazonaws.s3#ListObjectsV2Output',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$IsTruncated', type: ShapeType::Boolean, memberName: 'IsTruncated', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$Contents', type: ShapeType::List_, memberName: 'Contents', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#ObjectList$member'] ??= new Schema(id: 'com.amazonaws.s3#ObjectList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::s3Object()->getMembers(), targetClass: S3Object::class), traits: [3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$Name', type: ShapeType::String_, memberName: 'Name', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$Delimiter', type: ShapeType::String_, memberName: 'Delimiter', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$MaxKeys', type: ShapeType::Integer, memberName: 'MaxKeys', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$CommonPrefixes', type: ShapeType::List_, memberName: 'CommonPrefixes', memberIndex: 6, listMember: SchemasMembers::$shared['com.amazonaws.s3#CommonPrefixList$member'] ??= new Schema(id: 'com.amazonaws.s3#CommonPrefixList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::commonPrefix()->getMembers(), targetClass: CommonPrefix::class), traits: [3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$EncodingType', type: ShapeType::Enum, memberName: 'EncodingType', memberIndex: 7, targetClass: EncodingType::class),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$KeyCount', type: ShapeType::Integer, memberName: 'KeyCount', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 9),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$NextContinuationToken', type: ShapeType::String_, memberName: 'NextContinuationToken', memberIndex: 10),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$StartAfter', type: ShapeType::String_, memberName: 'StartAfter', memberIndex: 11),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Output$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 12, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ], traits: [0 => 'ListBucketResult'],
            targetClass: ListObjectsV2Output::class
        );
    }

    public static function listObjectsV2Request(): Schema
    {
        if (isset(self::$ListObjectsV2Request)) {
            return self::$ListObjectsV2Request;
        }

        return self::$ListObjectsV2Request = new Schema(
            id: 'com.amazonaws.s3#ListObjectsV2Request',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$Delimiter', type: ShapeType::String_, memberName: 'Delimiter', memberIndex: 1, traits: [9 => 'delimiter']),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$EncodingType', type: ShapeType::Enum, memberName: 'EncodingType', memberIndex: 2, traits: [9 => 'encoding-type'], targetClass: EncodingType::class),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$MaxKeys', type: ShapeType::Integer, memberName: 'MaxKeys', memberIndex: 3, traits: [9 => 'max-keys']),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 4, traits: [9 => 'prefix'], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Prefix']]),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$ContinuationToken', type: ShapeType::String_, memberName: 'ContinuationToken', memberIndex: 5, traits: [9 => 'continuation-token']),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$FetchOwner', type: ShapeType::Boolean, memberName: 'FetchOwner', memberIndex: 6, traits: [9 => 'fetch-owner']),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$StartAfter', type: ShapeType::String_, memberName: 'StartAfter', memberIndex: 7, traits: [9 => 'start-after']),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 8, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 9, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#ListObjectsV2Request$OptionalObjectAttributes', type: ShapeType::List_, memberName: 'OptionalObjectAttributes', memberIndex: 10, listMember: SchemasMembers::$shared['com.amazonaws.s3#OptionalObjectAttributesList$member'] ??= new Schema(id: 'com.amazonaws.s3#OptionalObjectAttributesList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, targetClass: OptionalObjectAttributes::class), traits: [5 => 'x-amz-optional-object-attributes'])
            ],
            targetClass: ListObjectsV2Request::class
        );
    }

    public static function listPartsOutput(): Schema
    {
        if (isset(self::$ListPartsOutput)) {
            return self::$ListPartsOutput;
        }

        return self::$ListPartsOutput = new Schema(
            id: 'com.amazonaws.s3#ListPartsOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$AbortDate', type: ShapeType::Timestamp, memberName: 'AbortDate', memberIndex: 0, traits: [5 => 'x-amz-abort-date']),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$AbortRuleId', type: ShapeType::String_, memberName: 'AbortRuleId', memberIndex: 1, traits: [5 => 'x-amz-abort-rule-id']),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$UploadId', type: ShapeType::String_, memberName: 'UploadId', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$PartNumberMarker', type: ShapeType::String_, memberName: 'PartNumberMarker', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$NextPartNumberMarker', type: ShapeType::String_, memberName: 'NextPartNumberMarker', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$MaxParts', type: ShapeType::Integer, memberName: 'MaxParts', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$IsTruncated', type: ShapeType::Boolean, memberName: 'IsTruncated', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$Parts', type: ShapeType::List_, memberName: 'Parts', memberIndex: 9, listMember: SchemasMembers::$shared['com.amazonaws.s3#Parts$member'] ??= new Schema(id: 'com.amazonaws.s3#Parts$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::part()->getMembers(), targetClass: Part::class), traits: [0 => 'Part', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$Initiator', type: ShapeType::Structure, memberName: 'Initiator', memberIndex: 10, members: self::initiator()->getMembers(), targetClass: Initiator::class),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 11, members: self::owner()->getMembers(), targetClass: Owner::class),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 12, targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 13, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 14, targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 15, targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#ListPartsOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 16, traits: [5 => 'x-amz-version-id'])
            ], traits: [0 => 'ListPartsResult'],
            targetClass: ListPartsOutput::class
        );
    }

    public static function listPartsRequest(): Schema
    {
        if (isset(self::$ListPartsRequest)) {
            return self::$ListPartsRequest;
        }

        return self::$ListPartsRequest = new Schema(
            id: 'com.amazonaws.s3#ListPartsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ListPartsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#ListPartsRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#ListPartsRequest$UploadId', type: ShapeType::String_, memberName: 'UploadId', memberIndex: 2, traits: [9 => 'uploadId', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#ListPartsRequest$MaxParts', type: ShapeType::Integer, memberName: 'MaxParts', memberIndex: 3, traits: [9 => 'max-parts']),
                new Schema(id: 'com.amazonaws.s3#ListPartsRequest$PartNumberMarker', type: ShapeType::String_, memberName: 'PartNumberMarker', memberIndex: 4, traits: [9 => 'part-number-marker']),
                new Schema(id: 'com.amazonaws.s3#ListPartsRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 5, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#ListPartsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 6, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#ListPartsRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 7, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#ListPartsRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 8, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#ListPartsRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 9, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5'])
            ],
            targetClass: ListPartsRequest::class
        );
    }

    public static function locationInfo(): Schema
    {
        if (isset(self::$LocationInfo)) {
            return self::$LocationInfo;
        }

        return self::$LocationInfo = new Schema(
            id: 'com.amazonaws.s3#LocationInfo',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#LocationInfo$Type', type: ShapeType::Enum, memberName: 'Type', memberIndex: 0, targetClass: LocationType::class),
                new Schema(id: 'com.amazonaws.s3#LocationInfo$Name', type: ShapeType::String_, memberName: 'Name', memberIndex: 1)
            ],
            targetClass: LocationInfo::class
        );
    }

    public static function loggingEnabled(): Schema
    {
        if (isset(self::$LoggingEnabled)) {
            return self::$LoggingEnabled;
        }

        return self::$LoggingEnabled = new Schema(
            id: 'com.amazonaws.s3#LoggingEnabled',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetBucket', type: ShapeType::String_, memberName: 'TargetBucket', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetPrefix', type: ShapeType::String_, memberName: 'TargetPrefix', memberIndex: 1, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetGrants', type: ShapeType::List_, memberName: 'TargetGrants', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#TargetGrants$member'] ??= new Schema(id: 'com.amazonaws.s3#TargetGrants$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::targetGrant()->getMembers(), traits: [0 => 'Grant'], targetClass: TargetGrant::class)),
                new Schema(id: 'com.amazonaws.s3#LoggingEnabled$TargetObjectKeyFormat', type: ShapeType::Structure, memberName: 'TargetObjectKeyFormat', memberIndex: 3, members: [new Schema(id: 'com.amazonaws.s3#TargetObjectKeyFormat$SimplePrefix', type: ShapeType::Structure, memberName: 'SimplePrefix', memberIndex: 0, traits: [0 => 'SimplePrefix'], targetClass: SimplePrefix::class), new Schema(id: 'com.amazonaws.s3#TargetObjectKeyFormat$PartitionedPrefix', type: ShapeType::Structure, memberName: 'PartitionedPrefix', memberIndex: 1, traits: [0 => 'PartitionedPrefix'], targetClass: PartitionedPrefix::class)], targetClass: TargetObjectKeyFormat::class)
            ],
            targetClass: LoggingEnabled::class
        );
    }

    public static function metadataConfiguration(): Schema
    {
        if (isset(self::$MetadataConfiguration)) {
            return self::$MetadataConfiguration;
        }

        return self::$MetadataConfiguration = new Schema(
            id: 'com.amazonaws.s3#MetadataConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#MetadataConfiguration$JournalTableConfiguration', type: ShapeType::Structure, memberName: 'JournalTableConfiguration', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#JournalTableConfiguration$RecordExpiration', type: ShapeType::Structure, memberName: 'RecordExpiration', memberIndex: 0, traits: [14 => true], targetClass: RecordExpiration::class), new Schema(id: 'com.amazonaws.s3#JournalTableConfiguration$EncryptionConfiguration', type: ShapeType::Structure, memberName: 'EncryptionConfiguration', memberIndex: 1, targetClass: MetadataTableEncryptionConfiguration::class)], traits: [14 => true], targetClass: JournalTableConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#MetadataConfiguration$InventoryTableConfiguration', type: ShapeType::Structure, memberName: 'InventoryTableConfiguration', memberIndex: 1, members: self::inventoryTableConfiguration()->getMembers(), targetClass: InventoryTableConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#MetadataConfiguration$AnnotationTableConfiguration', type: ShapeType::Structure, memberName: 'AnnotationTableConfiguration', memberIndex: 2, members: self::annotationTableConfiguration()->getMembers(), targetClass: AnnotationTableConfiguration::class)
            ],
            targetClass: MetadataConfiguration::class
        );
    }

    public static function metadataConfigurationResult(): Schema
    {
        if (isset(self::$MetadataConfigurationResult)) {
            return self::$MetadataConfigurationResult;
        }

        return self::$MetadataConfigurationResult = new Schema(
            id: 'com.amazonaws.s3#MetadataConfigurationResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#MetadataConfigurationResult$DestinationResult', type: ShapeType::Structure, memberName: 'DestinationResult', memberIndex: 0, members: self::destinationResult()->getMembers(), traits: [14 => true], targetClass: DestinationResult::class),
                new Schema(id: 'com.amazonaws.s3#MetadataConfigurationResult$JournalTableConfigurationResult', type: ShapeType::Structure, memberName: 'JournalTableConfigurationResult', memberIndex: 1, members: self::journalTableConfigurationResult()->getMembers(), targetClass: JournalTableConfigurationResult::class),
                new Schema(id: 'com.amazonaws.s3#MetadataConfigurationResult$InventoryTableConfigurationResult', type: ShapeType::Structure, memberName: 'InventoryTableConfigurationResult', memberIndex: 2, members: self::inventoryTableConfigurationResult()->getMembers(), targetClass: InventoryTableConfigurationResult::class),
                new Schema(id: 'com.amazonaws.s3#MetadataConfigurationResult$AnnotationTableConfigurationResult', type: ShapeType::Structure, memberName: 'AnnotationTableConfigurationResult', memberIndex: 3, members: self::annotationTableConfigurationResult()->getMembers(), targetClass: AnnotationTableConfigurationResult::class)
            ],
            targetClass: MetadataConfigurationResult::class
        );
    }

    public static function metadataEntry(): Schema
    {
        if (isset(self::$MetadataEntry)) {
            return self::$MetadataEntry;
        }

        return self::$MetadataEntry = new Schema(
            id: 'com.amazonaws.s3#MetadataEntry',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#MetadataEntry$Name', type: ShapeType::String_, memberName: 'Name', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#MetadataEntry$Value', type: ShapeType::String_, memberName: 'Value', memberIndex: 1)
            ],
            targetClass: MetadataEntry::class
        );
    }

    public static function metadataTableConfiguration(): Schema
    {
        if (isset(self::$MetadataTableConfiguration)) {
            return self::$MetadataTableConfiguration;
        }

        return self::$MetadataTableConfiguration = new Schema(
            id: 'com.amazonaws.s3#MetadataTableConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#MetadataTableConfiguration$S3TablesDestination', type: ShapeType::Structure, memberName: 'S3TablesDestination', memberIndex: 0, members: self::s3TablesDestination()->getMembers(), traits: [14 => true], targetClass: S3TablesDestination::class)
            ],
            targetClass: MetadataTableConfiguration::class
        );
    }

    public static function metadataTableConfigurationResult(): Schema
    {
        if (isset(self::$MetadataTableConfigurationResult)) {
            return self::$MetadataTableConfigurationResult;
        }

        return self::$MetadataTableConfigurationResult = new Schema(
            id: 'com.amazonaws.s3#MetadataTableConfigurationResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#MetadataTableConfigurationResult$S3TablesDestinationResult', type: ShapeType::Structure, memberName: 'S3TablesDestinationResult', memberIndex: 0, members: self::s3TablesDestinationResult()->getMembers(), traits: [14 => true], targetClass: S3TablesDestinationResult::class)
            ],
            targetClass: MetadataTableConfigurationResult::class
        );
    }

    public static function metadataTableEncryptionConfiguration(): Schema
    {
        if (isset(self::$MetadataTableEncryptionConfiguration)) {
            return self::$MetadataTableEncryptionConfiguration;
        }

        return self::$MetadataTableEncryptionConfiguration = new Schema(
            id: 'com.amazonaws.s3#MetadataTableEncryptionConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#MetadataTableEncryptionConfiguration$SseAlgorithm', type: ShapeType::Enum, memberName: 'SseAlgorithm', memberIndex: 0, traits: [14 => true], targetClass: TableSseAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#MetadataTableEncryptionConfiguration$KmsKeyArn', type: ShapeType::String_, memberName: 'KmsKeyArn', memberIndex: 1)
            ],
            targetClass: MetadataTableEncryptionConfiguration::class
        );
    }

    public static function metrics(): Schema
    {
        if (isset(self::$Metrics)) {
            return self::$Metrics;
        }

        return self::$Metrics = new Schema(
            id: 'com.amazonaws.s3#Metrics',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Metrics$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: MetricsStatus::class),
                new Schema(id: 'com.amazonaws.s3#Metrics$EventThreshold', type: ShapeType::Structure, memberName: 'EventThreshold', memberIndex: 1, members: self::replicationTimeValue()->getMembers(), targetClass: ReplicationTimeValue::class)
            ],
            targetClass: Metrics::class
        );
    }

    public static function metricsAndOperator(): Schema
    {
        if (isset(self::$MetricsAndOperator)) {
            return self::$MetricsAndOperator;
        }

        return self::$MetricsAndOperator = new Schema(
            id: 'com.amazonaws.s3#MetricsAndOperator',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#MetricsAndOperator$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#MetricsAndOperator$Tags', type: ShapeType::List_, memberName: 'Tags', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [0 => 'Tag', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#MetricsAndOperator$AccessPointArn', type: ShapeType::String_, memberName: 'AccessPointArn', memberIndex: 2)
            ],
            targetClass: MetricsAndOperator::class
        );
    }

    public static function metricsConfiguration(): Schema
    {
        if (isset(self::$MetricsConfiguration)) {
            return self::$MetricsConfiguration;
        }

        return self::$MetricsConfiguration = new Schema(
            id: 'com.amazonaws.s3#MetricsConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#MetricsConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#MetricsConfiguration$Filter', type: ShapeType::Union, memberName: 'Filter', memberIndex: 1, members: self::metricsFilter()->getMembers(), targetClass: MetricsFilter::class)
            ],
            targetClass: MetricsConfiguration::class
        );
    }

    public static function multipartUpload(): Schema
    {
        if (isset(self::$MultipartUpload)) {
            return self::$MultipartUpload;
        }

        return self::$MultipartUpload = new Schema(
            id: 'com.amazonaws.s3#MultipartUpload',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#MultipartUpload$UploadId', type: ShapeType::String_, memberName: 'UploadId', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#MultipartUpload$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#MultipartUpload$Initiated', type: ShapeType::Timestamp, memberName: 'Initiated', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#MultipartUpload$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 3, targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#MultipartUpload$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 4, members: self::owner()->getMembers(), targetClass: Owner::class),
                new Schema(id: 'com.amazonaws.s3#MultipartUpload$Initiator', type: ShapeType::Structure, memberName: 'Initiator', memberIndex: 5, members: self::initiator()->getMembers(), targetClass: Initiator::class),
                new Schema(id: 'com.amazonaws.s3#MultipartUpload$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 6, targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#MultipartUpload$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 7, targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#MultipartUpload$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 8)
            ],
            targetClass: MultipartUpload::class
        );
    }

    public static function noSuchAnnotationException(): Schema
    {
        if (isset(self::$NoSuchAnnotationException)) {
            return self::$NoSuchAnnotationException;
        }

        return self::$NoSuchAnnotationException = new Schema(
            id: 'com.amazonaws.s3#NoSuchAnnotation',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: NoSuchAnnotationException::class
        );
    }

    public static function noSuchBucketException(): Schema
    {
        if (isset(self::$NoSuchBucketException)) {
            return self::$NoSuchBucketException;
        }

        return self::$NoSuchBucketException = new Schema(
            id: 'com.amazonaws.s3#NoSuchBucket',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: NoSuchBucketException::class
        );
    }

    public static function noSuchKeyException(): Schema
    {
        if (isset(self::$NoSuchKeyException)) {
            return self::$NoSuchKeyException;
        }

        return self::$NoSuchKeyException = new Schema(
            id: 'com.amazonaws.s3#NoSuchKey',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: NoSuchKeyException::class
        );
    }

    public static function noSuchUploadException(): Schema
    {
        if (isset(self::$NoSuchUploadException)) {
            return self::$NoSuchUploadException;
        }

        return self::$NoSuchUploadException = new Schema(
            id: 'com.amazonaws.s3#NoSuchUpload',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: NoSuchUploadException::class
        );
    }

    public static function noncurrentVersionExpiration(): Schema
    {
        if (isset(self::$NoncurrentVersionExpiration)) {
            return self::$NoncurrentVersionExpiration;
        }

        return self::$NoncurrentVersionExpiration = new Schema(
            id: 'com.amazonaws.s3#NoncurrentVersionExpiration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#NoncurrentVersionExpiration$NoncurrentDays', type: ShapeType::Integer, memberName: 'NoncurrentDays', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#NoncurrentVersionExpiration$NewerNoncurrentVersions', type: ShapeType::Integer, memberName: 'NewerNoncurrentVersions', memberIndex: 1)
            ],
            targetClass: NoncurrentVersionExpiration::class
        );
    }

    public static function noncurrentVersionTransition(): Schema
    {
        if (isset(self::$NoncurrentVersionTransition)) {
            return self::$NoncurrentVersionTransition;
        }

        return self::$NoncurrentVersionTransition = new Schema(
            id: 'com.amazonaws.s3#NoncurrentVersionTransition',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#NoncurrentVersionTransition$NoncurrentDays', type: ShapeType::Integer, memberName: 'NoncurrentDays', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#NoncurrentVersionTransition$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 1, targetClass: TransitionStorageClass::class),
                new Schema(id: 'com.amazonaws.s3#NoncurrentVersionTransition$NewerNoncurrentVersions', type: ShapeType::Integer, memberName: 'NewerNoncurrentVersions', memberIndex: 2)
            ],
            targetClass: NoncurrentVersionTransition::class
        );
    }

    public static function notFoundException(): Schema
    {
        if (isset(self::$NotFoundException)) {
            return self::$NotFoundException;
        }

        return self::$NotFoundException = new Schema(
            id: 'com.amazonaws.s3#NotFound',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: NotFoundException::class
        );
    }

    public static function notificationConfiguration(): Schema
    {
        if (isset(self::$NotificationConfiguration)) {
            return self::$NotificationConfiguration;
        }

        return self::$NotificationConfiguration = new Schema(
            id: 'com.amazonaws.s3#NotificationConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#NotificationConfiguration$TopicConfigurations', type: ShapeType::List_, memberName: 'TopicConfigurations', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#TopicConfigurationList$member'] ??= new Schema(id: 'com.amazonaws.s3#TopicConfigurationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::topicConfiguration()->getMembers(), targetClass: TopicConfiguration::class), traits: [0 => 'TopicConfiguration', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#NotificationConfiguration$QueueConfigurations', type: ShapeType::List_, memberName: 'QueueConfigurations', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#QueueConfigurationList$member'] ??= new Schema(id: 'com.amazonaws.s3#QueueConfigurationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::queueConfiguration()->getMembers(), targetClass: QueueConfiguration::class), traits: [0 => 'QueueConfiguration', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#NotificationConfiguration$LambdaFunctionConfigurations', type: ShapeType::List_, memberName: 'LambdaFunctionConfigurations', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#LambdaFunctionConfigurationList$member'] ??= new Schema(id: 'com.amazonaws.s3#LambdaFunctionConfigurationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::lambdaFunctionConfiguration()->getMembers(), targetClass: LambdaFunctionConfiguration::class), traits: [0 => 'CloudFunctionConfiguration', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#NotificationConfiguration$EventBridgeConfiguration', type: ShapeType::Structure, memberName: 'EventBridgeConfiguration', memberIndex: 3, targetClass: EventBridgeConfiguration::class)
            ],
            targetClass: NotificationConfiguration::class
        );
    }

    public static function notificationConfigurationFilter(): Schema
    {
        if (isset(self::$NotificationConfigurationFilter)) {
            return self::$NotificationConfigurationFilter;
        }

        return self::$NotificationConfigurationFilter = new Schema(
            id: 'com.amazonaws.s3#NotificationConfigurationFilter',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#NotificationConfigurationFilter$Key', type: ShapeType::Structure, memberName: 'Key', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#S3KeyFilter$FilterRules', type: ShapeType::List_, memberName: 'FilterRules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#FilterRuleList$member'] ??= new Schema(id: 'com.amazonaws.s3#FilterRuleList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::filterRule()->getMembers(), targetClass: FilterRule::class), traits: [0 => 'FilterRule', 3 => true])], traits: [0 => 'S3Key'], targetClass: S3KeyFilter::class)
            ],
            targetClass: NotificationConfigurationFilter::class
        );
    }

    public static function s3Object(): Schema
    {
        if (isset(self::$S3Object)) {
            return self::$S3Object;
        }

        return self::$S3Object = new Schema(
            id: 'com.amazonaws.s3#Object',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Object$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Object$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Object$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#Object$ChecksumAlgorithm', type: ShapeType::List_, memberName: 'ChecksumAlgorithm', memberIndex: 3, listMember: SchemasMembers::$shared['com.amazonaws.s3#ChecksumAlgorithmList$member'] ??= new Schema(id: 'com.amazonaws.s3#ChecksumAlgorithmList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, targetClass: ChecksumAlgorithm::class), traits: [3 => true]),
                new Schema(id: 'com.amazonaws.s3#Object$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 4, targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#Object$Size', type: ShapeType::Long, memberName: 'Size', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#Object$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 6, targetClass: ObjectStorageClass::class),
                new Schema(id: 'com.amazonaws.s3#Object$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 7, members: self::owner()->getMembers(), targetClass: Owner::class),
                new Schema(id: 'com.amazonaws.s3#Object$RestoreStatus', type: ShapeType::Structure, memberName: 'RestoreStatus', memberIndex: 8, members: self::restoreStatus()->getMembers(), targetClass: RestoreStatus::class)
            ],
            targetClass: S3Object::class
        );
    }

    public static function objectAlreadyInActiveTierErrorException(): Schema
    {
        if (isset(self::$ObjectAlreadyInActiveTierErrorException)) {
            return self::$ObjectAlreadyInActiveTierErrorException;
        }

        return self::$ObjectAlreadyInActiveTierErrorException = new Schema(
            id: 'com.amazonaws.s3#ObjectAlreadyInActiveTierError',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: ObjectAlreadyInActiveTierErrorException::class
        );
    }

    public static function objectIdentifier(): Schema
    {
        if (isset(self::$ObjectIdentifier)) {
            return self::$ObjectIdentifier;
        }

        return self::$ObjectIdentifier = new Schema(
            id: 'com.amazonaws.s3#ObjectIdentifier',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ObjectIdentifier$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#ObjectIdentifier$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#ObjectIdentifier$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ObjectIdentifier$LastModifiedTime', type: ShapeType::Timestamp, memberName: 'LastModifiedTime', memberIndex: 3, traits: [4 => 'http-date']),
                new Schema(id: 'com.amazonaws.s3#ObjectIdentifier$Size', type: ShapeType::Long, memberName: 'Size', memberIndex: 4)
            ],
            targetClass: ObjectIdentifier::class
        );
    }

    public static function objectLockConfiguration(): Schema
    {
        if (isset(self::$ObjectLockConfiguration)) {
            return self::$ObjectLockConfiguration;
        }

        return self::$ObjectLockConfiguration = new Schema(
            id: 'com.amazonaws.s3#ObjectLockConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ObjectLockConfiguration$ObjectLockEnabled', type: ShapeType::Enum, memberName: 'ObjectLockEnabled', memberIndex: 0, targetClass: ObjectLockEnabled::class),
                new Schema(id: 'com.amazonaws.s3#ObjectLockConfiguration$Rule', type: ShapeType::Structure, memberName: 'Rule', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#ObjectLockRule$DefaultRetention', type: ShapeType::Structure, memberName: 'DefaultRetention', memberIndex: 0, targetClass: DefaultRetention::class)], targetClass: ObjectLockRule::class)
            ],
            targetClass: ObjectLockConfiguration::class
        );
    }

    public static function objectLockLegalHold(): Schema
    {
        if (isset(self::$ObjectLockLegalHold)) {
            return self::$ObjectLockLegalHold;
        }

        return self::$ObjectLockLegalHold = new Schema(
            id: 'com.amazonaws.s3#ObjectLockLegalHold',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ObjectLockLegalHold$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, targetClass: ObjectLockLegalHoldStatus::class)
            ],
            targetClass: ObjectLockLegalHold::class
        );
    }

    public static function objectLockRetention(): Schema
    {
        if (isset(self::$ObjectLockRetention)) {
            return self::$ObjectLockRetention;
        }

        return self::$ObjectLockRetention = new Schema(
            id: 'com.amazonaws.s3#ObjectLockRetention',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ObjectLockRetention$Mode', type: ShapeType::Enum, memberName: 'Mode', memberIndex: 0, targetClass: ObjectLockRetentionMode::class),
                new Schema(id: 'com.amazonaws.s3#ObjectLockRetention$RetainUntilDate', type: ShapeType::Timestamp, memberName: 'RetainUntilDate', memberIndex: 1, traits: [4 => 'date-time']),
                new Schema(id: 'com.amazonaws.s3#ObjectLockRetention$EventHold', type: ShapeType::Enum, memberName: 'EventHold', memberIndex: 2, targetClass: ObjectLockEventHold::class),
                new Schema(id: 'com.amazonaws.s3#ObjectLockRetention$EventHoldDuration', type: ShapeType::Structure, memberName: 'EventHoldDuration', memberIndex: 3, members: self::eventHoldDuration()->getMembers(), targetClass: EventHoldDuration::class)
            ],
            targetClass: ObjectLockRetention::class
        );
    }

    public static function objectLockRule(): Schema
    {
        if (isset(self::$ObjectLockRule)) {
            return self::$ObjectLockRule;
        }

        return self::$ObjectLockRule = new Schema(
            id: 'com.amazonaws.s3#ObjectLockRule',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ObjectLockRule$DefaultRetention', type: ShapeType::Structure, memberName: 'DefaultRetention', memberIndex: 0, members: self::defaultRetention()->getMembers(), targetClass: DefaultRetention::class)
            ],
            targetClass: ObjectLockRule::class
        );
    }

    public static function objectNotInActiveTierErrorException(): Schema
    {
        if (isset(self::$ObjectNotInActiveTierErrorException)) {
            return self::$ObjectNotInActiveTierErrorException;
        }

        return self::$ObjectNotInActiveTierErrorException = new Schema(
            id: 'com.amazonaws.s3#ObjectNotInActiveTierError',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: ObjectNotInActiveTierErrorException::class
        );
    }

    public static function objectPart(): Schema
    {
        if (isset(self::$ObjectPart)) {
            return self::$ObjectPart;
        }

        return self::$ObjectPart = new Schema(
            id: 'com.amazonaws.s3#ObjectPart',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ObjectPart$PartNumber', type: ShapeType::Integer, memberName: 'PartNumber', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$Size', type: ShapeType::Long, memberName: 'Size', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 9),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 10),
                new Schema(id: 'com.amazonaws.s3#ObjectPart$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 11)
            ],
            targetClass: ObjectPart::class
        );
    }

    public static function objectVersion(): Schema
    {
        if (isset(self::$ObjectVersion)) {
            return self::$ObjectVersion;
        }

        return self::$ObjectVersion = new Schema(
            id: 'com.amazonaws.s3#ObjectVersion',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$ChecksumAlgorithm', type: ShapeType::List_, memberName: 'ChecksumAlgorithm', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#ChecksumAlgorithmList$member'] ??= new Schema(id: 'com.amazonaws.s3#ChecksumAlgorithmList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, targetClass: ChecksumAlgorithm::class), traits: [3 => true]),
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 2, targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$Size', type: ShapeType::Long, memberName: 'Size', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 4, targetClass: ObjectVersionStorageClass::class),
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$IsLatest', type: ShapeType::Boolean, memberName: 'IsLatest', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 9, members: self::owner()->getMembers(), targetClass: Owner::class),
                new Schema(id: 'com.amazonaws.s3#ObjectVersion$RestoreStatus', type: ShapeType::Structure, memberName: 'RestoreStatus', memberIndex: 10, members: self::restoreStatus()->getMembers(), targetClass: RestoreStatus::class)
            ],
            targetClass: ObjectVersion::class
        );
    }

    public static function outputLocation(): Schema
    {
        if (isset(self::$OutputLocation)) {
            return self::$OutputLocation;
        }

        return self::$OutputLocation = new Schema(
            id: 'com.amazonaws.s3#OutputLocation',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#OutputLocation$S3', type: ShapeType::Structure, memberName: 'S3', memberIndex: 0, members: self::s3Location()->getMembers(), targetClass: S3Location::class)
            ],
            targetClass: OutputLocation::class
        );
    }

    public static function outputSerialization(): Schema
    {
        if (isset(self::$OutputSerialization)) {
            return self::$OutputSerialization;
        }

        return self::$OutputSerialization = new Schema(
            id: 'com.amazonaws.s3#OutputSerialization',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#OutputSerialization$CSV', type: ShapeType::Structure, memberName: 'CSV', memberIndex: 0, members: self::cSVOutput()->getMembers(), targetClass: CSVOutput::class),
                new Schema(id: 'com.amazonaws.s3#OutputSerialization$JSON', type: ShapeType::Structure, memberName: 'JSON', memberIndex: 1, members: self::jSONOutput()->getMembers(), targetClass: JSONOutput::class)
            ],
            targetClass: OutputSerialization::class
        );
    }

    public static function owner(): Schema
    {
        if (isset(self::$Owner)) {
            return self::$Owner;
        }

        return self::$Owner = new Schema(
            id: 'com.amazonaws.s3#Owner',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Owner$DisplayName', type: ShapeType::String_, memberName: 'DisplayName', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Owner$ID', type: ShapeType::String_, memberName: 'ID', memberIndex: 1)
            ],
            targetClass: Owner::class
        );
    }

    public static function ownershipControls(): Schema
    {
        if (isset(self::$OwnershipControls)) {
            return self::$OwnershipControls;
        }

        return self::$OwnershipControls = new Schema(
            id: 'com.amazonaws.s3#OwnershipControls',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#OwnershipControls$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#OwnershipControlsRules$member'] ??= new Schema(id: 'com.amazonaws.s3#OwnershipControlsRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::ownershipControlsRule()->getMembers(), targetClass: OwnershipControlsRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])
            ],
            targetClass: OwnershipControls::class
        );
    }

    public static function ownershipControlsRule(): Schema
    {
        if (isset(self::$OwnershipControlsRule)) {
            return self::$OwnershipControlsRule;
        }

        return self::$OwnershipControlsRule = new Schema(
            id: 'com.amazonaws.s3#OwnershipControlsRule',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#OwnershipControlsRule$ObjectOwnership', type: ShapeType::Enum, memberName: 'ObjectOwnership', memberIndex: 0, traits: [14 => true], targetClass: ObjectOwnership::class)
            ],
            targetClass: OwnershipControlsRule::class
        );
    }

    public static function parquetInput(): Schema
    {
        if (isset(self::$ParquetInput)) {
            return self::$ParquetInput;
        }

        return self::$ParquetInput = new Schema(
            id: 'com.amazonaws.s3#ParquetInput',
            type: ShapeType::Structure,
            members: [
            ],
            targetClass: ParquetInput::class
        );
    }

    public static function part(): Schema
    {
        if (isset(self::$Part)) {
            return self::$Part;
        }

        return self::$Part = new Schema(
            id: 'com.amazonaws.s3#Part',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Part$PartNumber', type: ShapeType::Integer, memberName: 'PartNumber', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Part$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Part$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#Part$Size', type: ShapeType::Long, memberName: 'Size', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#Part$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#Part$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 5),
                new Schema(id: 'com.amazonaws.s3#Part$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 6),
                new Schema(id: 'com.amazonaws.s3#Part$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 7),
                new Schema(id: 'com.amazonaws.s3#Part$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 8),
                new Schema(id: 'com.amazonaws.s3#Part$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 9),
                new Schema(id: 'com.amazonaws.s3#Part$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 10),
                new Schema(id: 'com.amazonaws.s3#Part$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 11),
                new Schema(id: 'com.amazonaws.s3#Part$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 12),
                new Schema(id: 'com.amazonaws.s3#Part$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 13)
            ],
            targetClass: Part::class
        );
    }

    public static function partitionedPrefix(): Schema
    {
        if (isset(self::$PartitionedPrefix)) {
            return self::$PartitionedPrefix;
        }

        return self::$PartitionedPrefix = new Schema(
            id: 'com.amazonaws.s3#PartitionedPrefix',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PartitionedPrefix$PartitionDateSource', type: ShapeType::Enum, memberName: 'PartitionDateSource', memberIndex: 0, targetClass: PartitionDateSource::class)
            ], traits: [0 => 'PartitionedPrefix'],
            targetClass: PartitionedPrefix::class
        );
    }

    public static function policyStatus(): Schema
    {
        if (isset(self::$PolicyStatus)) {
            return self::$PolicyStatus;
        }

        return self::$PolicyStatus = new Schema(
            id: 'com.amazonaws.s3#PolicyStatus',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PolicyStatus$IsPublic', type: ShapeType::Boolean, memberName: 'IsPublic', memberIndex: 0, traits: [0 => 'IsPublic'])
            ],
            targetClass: PolicyStatus::class
        );
    }

    public static function progress(): Schema
    {
        if (isset(self::$Progress)) {
            return self::$Progress;
        }

        return self::$Progress = new Schema(
            id: 'com.amazonaws.s3#Progress',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Progress$BytesScanned', type: ShapeType::Long, memberName: 'BytesScanned', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Progress$BytesProcessed', type: ShapeType::Long, memberName: 'BytesProcessed', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Progress$BytesReturned', type: ShapeType::Long, memberName: 'BytesReturned', memberIndex: 2)
            ],
            targetClass: Progress::class
        );
    }

    public static function progressEvent(): Schema
    {
        if (isset(self::$ProgressEvent)) {
            return self::$ProgressEvent;
        }

        return self::$ProgressEvent = new Schema(
            id: 'com.amazonaws.s3#ProgressEvent',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ProgressEvent$Details', type: ShapeType::Structure, memberName: 'Details', memberIndex: 0, members: self::progress()->getMembers(), targetClass: Progress::class)
            ],
            targetClass: ProgressEvent::class
        );
    }

    public static function publicAccessBlockConfiguration(): Schema
    {
        if (isset(self::$PublicAccessBlockConfiguration)) {
            return self::$PublicAccessBlockConfiguration;
        }

        return self::$PublicAccessBlockConfiguration = new Schema(
            id: 'com.amazonaws.s3#PublicAccessBlockConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PublicAccessBlockConfiguration$BlockPublicAcls', type: ShapeType::Boolean, memberName: 'BlockPublicAcls', memberIndex: 0, traits: [0 => 'BlockPublicAcls']),
                new Schema(id: 'com.amazonaws.s3#PublicAccessBlockConfiguration$IgnorePublicAcls', type: ShapeType::Boolean, memberName: 'IgnorePublicAcls', memberIndex: 1, traits: [0 => 'IgnorePublicAcls']),
                new Schema(id: 'com.amazonaws.s3#PublicAccessBlockConfiguration$BlockPublicPolicy', type: ShapeType::Boolean, memberName: 'BlockPublicPolicy', memberIndex: 2, traits: [0 => 'BlockPublicPolicy']),
                new Schema(id: 'com.amazonaws.s3#PublicAccessBlockConfiguration$RestrictPublicBuckets', type: ShapeType::Boolean, memberName: 'RestrictPublicBuckets', memberIndex: 3, traits: [0 => 'RestrictPublicBuckets'])
            ],
            targetClass: PublicAccessBlockConfiguration::class
        );
    }

    public static function putBucketAbacRequest(): Schema
    {
        if (isset(self::$PutBucketAbacRequest)) {
            return self::$PutBucketAbacRequest;
        }

        return self::$PutBucketAbacRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketAbacRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketAbacRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketAbacRequest$AbacStatus', type: ShapeType::Structure, memberName: 'AbacStatus', memberIndex: 1, members: self::abacStatus()->getMembers(), traits: [0 => 'AbacStatus', 7 => true, 14 => true], targetClass: AbacStatus::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketAbacRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketAbacRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketAbacRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketAbacRequest::class
        );
    }

    public static function putBucketAccelerateConfigurationRequest(): Schema
    {
        if (isset(self::$PutBucketAccelerateConfigurationRequest)) {
            return self::$PutBucketAccelerateConfigurationRequest;
        }

        return self::$PutBucketAccelerateConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketAccelerateConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketAccelerateConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketAccelerateConfigurationRequest$AccelerateConfiguration', type: ShapeType::Structure, memberName: 'AccelerateConfiguration', memberIndex: 1, members: self::accelerateConfiguration()->getMembers(), traits: [0 => 'AccelerateConfiguration', 7 => true, 14 => true], targetClass: AccelerateConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketAccelerateConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#PutBucketAccelerateConfigurationRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class)
            ],
            targetClass: PutBucketAccelerateConfigurationRequest::class
        );
    }

    public static function putBucketAclRequest(): Schema
    {
        if (isset(self::$PutBucketAclRequest)) {
            return self::$PutBucketAclRequest;
        }

        return self::$PutBucketAclRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketAclRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$ACL', type: ShapeType::Enum, memberName: 'ACL', memberIndex: 1, traits: [5 => 'x-amz-acl'], targetClass: BucketCannedACL::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$AccessControlPolicy', type: ShapeType::Structure, memberName: 'AccessControlPolicy', memberIndex: 2, members: [new Schema(id: 'com.amazonaws.s3#AccessControlPolicy$Grants', type: ShapeType::List_, memberName: 'Grants', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#Grants$member'] ??= new Schema(id: 'com.amazonaws.s3#Grants$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::grant()->getMembers(), traits: [0 => 'Grant'], targetClass: Grant::class), traits: [0 => 'AccessControlList']), new Schema(id: 'com.amazonaws.s3#AccessControlPolicy$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 1, targetClass: Owner::class)], traits: [0 => 'AccessControlPolicy', 7 => true], targetClass: AccessControlPolicy::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 3, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 4, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$GrantFullControl', type: ShapeType::String_, memberName: 'GrantFullControl', memberIndex: 5, traits: [5 => 'x-amz-grant-full-control']),
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$GrantRead', type: ShapeType::String_, memberName: 'GrantRead', memberIndex: 6, traits: [5 => 'x-amz-grant-read']),
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$GrantReadACP', type: ShapeType::String_, memberName: 'GrantReadACP', memberIndex: 7, traits: [5 => 'x-amz-grant-read-acp']),
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$GrantWrite', type: ShapeType::String_, memberName: 'GrantWrite', memberIndex: 8, traits: [5 => 'x-amz-grant-write']),
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$GrantWriteACP', type: ShapeType::String_, memberName: 'GrantWriteACP', memberIndex: 9, traits: [5 => 'x-amz-grant-write-acp']),
                new Schema(id: 'com.amazonaws.s3#PutBucketAclRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 10, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketAclRequest::class
        );
    }

    public static function putBucketAnalyticsConfigurationRequest(): Schema
    {
        if (isset(self::$PutBucketAnalyticsConfigurationRequest)) {
            return self::$PutBucketAnalyticsConfigurationRequest;
        }

        return self::$PutBucketAnalyticsConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketAnalyticsConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketAnalyticsConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketAnalyticsConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#PutBucketAnalyticsConfigurationRequest$AnalyticsConfiguration', type: ShapeType::Structure, memberName: 'AnalyticsConfiguration', memberIndex: 2, members: [new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$StorageClassAnalysis', type: ShapeType::Structure, memberName: 'StorageClassAnalysis', memberIndex: 1, traits: [14 => true], targetClass: StorageClassAnalysis::class), new Schema(id: 'com.amazonaws.s3#AnalyticsConfiguration$Filter', type: ShapeType::Union, memberName: 'Filter', memberIndex: 2, targetClass: AnalyticsFilter::class)], traits: [0 => 'AnalyticsConfiguration', 7 => true, 14 => true], targetClass: AnalyticsConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketAnalyticsConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 3, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketAnalyticsConfigurationRequest::class
        );
    }

    public static function putBucketCorsRequest(): Schema
    {
        if (isset(self::$PutBucketCorsRequest)) {
            return self::$PutBucketCorsRequest;
        }

        return self::$PutBucketCorsRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketCorsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketCorsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketCorsRequest$CORSConfiguration', type: ShapeType::Structure, memberName: 'CORSConfiguration', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#CORSConfiguration$CORSRules', type: ShapeType::List_, memberName: 'CORSRules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#CORSRules$member'] ??= new Schema(id: 'com.amazonaws.s3#CORSRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::cORSRule()->getMembers(), targetClass: CORSRule::class), traits: [0 => 'CORSRule', 3 => true, 14 => true])], traits: [0 => 'CORSConfiguration', 7 => true, 14 => true], targetClass: CORSConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketCorsRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketCorsRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketCorsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketCorsRequest::class
        );
    }

    public static function putBucketEncryptionRequest(): Schema
    {
        if (isset(self::$PutBucketEncryptionRequest)) {
            return self::$PutBucketEncryptionRequest;
        }

        return self::$PutBucketEncryptionRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketEncryptionRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketEncryptionRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketEncryptionRequest$ServerSideEncryptionConfiguration', type: ShapeType::Structure, memberName: 'ServerSideEncryptionConfiguration', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionConfiguration$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#ServerSideEncryptionRules$member'] ??= new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::serverSideEncryptionRule()->getMembers(), targetClass: ServerSideEncryptionRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])], traits: [0 => 'ServerSideEncryptionConfiguration', 7 => true, 14 => true], targetClass: ServerSideEncryptionConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketEncryptionRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketEncryptionRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketEncryptionRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketEncryptionRequest::class
        );
    }

    public static function putBucketIntelligentTieringConfigurationRequest(): Schema
    {
        if (isset(self::$PutBucketIntelligentTieringConfigurationRequest)) {
            return self::$PutBucketIntelligentTieringConfigurationRequest;
        }

        return self::$PutBucketIntelligentTieringConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketIntelligentTieringConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketIntelligentTieringConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketIntelligentTieringConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#PutBucketIntelligentTieringConfigurationRequest$IntelligentTieringConfiguration', type: ShapeType::Structure, memberName: 'IntelligentTieringConfiguration', memberIndex: 2, members: [new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 1, traits: [14 => true], targetClass: IntelligentTieringStatus::class), new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Tierings', type: ShapeType::List_, memberName: 'Tierings', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#TieringList$member'] ??= new Schema(id: 'com.amazonaws.s3#TieringList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tiering()->getMembers(), targetClass: Tiering::class), traits: [0 => 'Tiering', 3 => true, 14 => true]), new Schema(id: 'com.amazonaws.s3#IntelligentTieringConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 3, targetClass: IntelligentTieringFilter::class)], traits: [0 => 'IntelligentTieringConfiguration', 7 => true, 14 => true], targetClass: IntelligentTieringConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketIntelligentTieringConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 3, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketIntelligentTieringConfigurationRequest::class
        );
    }

    public static function putBucketInventoryConfigurationRequest(): Schema
    {
        if (isset(self::$PutBucketInventoryConfigurationRequest)) {
            return self::$PutBucketInventoryConfigurationRequest;
        }

        return self::$PutBucketInventoryConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketInventoryConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketInventoryConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketInventoryConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#PutBucketInventoryConfigurationRequest$InventoryConfiguration', type: ShapeType::Structure, memberName: 'InventoryConfiguration', memberIndex: 2, members: [new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Destination', type: ShapeType::Structure, memberName: 'Destination', memberIndex: 0, traits: [14 => true], targetClass: InventoryDestination::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$IsEnabled', type: ShapeType::Boolean, memberName: 'IsEnabled', memberIndex: 1, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 2, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$IncludedObjectVersions', type: ShapeType::Enum, memberName: 'IncludedObjectVersions', memberIndex: 3, traits: [14 => true], targetClass: InventoryIncludedObjectVersions::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Schedule', type: ShapeType::Structure, memberName: 'Schedule', memberIndex: 4, traits: [14 => true], targetClass: InventorySchedule::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 5, targetClass: InventoryFilter::class), new Schema(id: 'com.amazonaws.s3#InventoryConfiguration$OptionalFields', type: ShapeType::List_, memberName: 'OptionalFields', memberIndex: 6, listMember: SchemasMembers::$shared['com.amazonaws.s3#InventoryOptionalFields$member'] ??= new Schema(id: 'com.amazonaws.s3#InventoryOptionalFields$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, traits: [0 => 'Field'], targetClass: InventoryOptionalField::class))], traits: [0 => 'InventoryConfiguration', 7 => true, 14 => true], targetClass: InventoryConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketInventoryConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 3, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketInventoryConfigurationRequest::class
        );
    }

    public static function putBucketLifecycleConfigurationOutput(): Schema
    {
        if (isset(self::$PutBucketLifecycleConfigurationOutput)) {
            return self::$PutBucketLifecycleConfigurationOutput;
        }

        return self::$PutBucketLifecycleConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#PutBucketLifecycleConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketLifecycleConfigurationOutput$TransitionDefaultMinimumObjectSize', type: ShapeType::Enum, memberName: 'TransitionDefaultMinimumObjectSize', memberIndex: 0, traits: [5 => 'x-amz-transition-default-minimum-object-size'], targetClass: TransitionDefaultMinimumObjectSize::class)
            ],
            targetClass: PutBucketLifecycleConfigurationOutput::class
        );
    }

    public static function putBucketLifecycleConfigurationRequest(): Schema
    {
        if (isset(self::$PutBucketLifecycleConfigurationRequest)) {
            return self::$PutBucketLifecycleConfigurationRequest;
        }

        return self::$PutBucketLifecycleConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketLifecycleConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketLifecycleConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketLifecycleConfigurationRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 1, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketLifecycleConfigurationRequest$LifecycleConfiguration', type: ShapeType::Structure, memberName: 'LifecycleConfiguration', memberIndex: 2, members: [new Schema(id: 'com.amazonaws.s3#BucketLifecycleConfiguration$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#LifecycleRules$member'] ??= new Schema(id: 'com.amazonaws.s3#LifecycleRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::lifecycleRule()->getMembers(), targetClass: LifecycleRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])], traits: [0 => 'LifecycleConfiguration', 7 => true], targetClass: BucketLifecycleConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketLifecycleConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 3, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#PutBucketLifecycleConfigurationRequest$TransitionDefaultMinimumObjectSize', type: ShapeType::Enum, memberName: 'TransitionDefaultMinimumObjectSize', memberIndex: 4, traits: [5 => 'x-amz-transition-default-minimum-object-size'], targetClass: TransitionDefaultMinimumObjectSize::class)
            ],
            targetClass: PutBucketLifecycleConfigurationRequest::class
        );
    }

    public static function putBucketLoggingRequest(): Schema
    {
        if (isset(self::$PutBucketLoggingRequest)) {
            return self::$PutBucketLoggingRequest;
        }

        return self::$PutBucketLoggingRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketLoggingRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketLoggingRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketLoggingRequest$BucketLoggingStatus', type: ShapeType::Structure, memberName: 'BucketLoggingStatus', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#BucketLoggingStatus$LoggingEnabled', type: ShapeType::Structure, memberName: 'LoggingEnabled', memberIndex: 0, targetClass: LoggingEnabled::class)], traits: [0 => 'BucketLoggingStatus', 7 => true, 14 => true], targetClass: BucketLoggingStatus::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketLoggingRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketLoggingRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketLoggingRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketLoggingRequest::class
        );
    }

    public static function putBucketMetricsConfigurationRequest(): Schema
    {
        if (isset(self::$PutBucketMetricsConfigurationRequest)) {
            return self::$PutBucketMetricsConfigurationRequest;
        }

        return self::$PutBucketMetricsConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketMetricsConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketMetricsConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketMetricsConfigurationRequest$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 1, traits: [9 => 'id', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#PutBucketMetricsConfigurationRequest$MetricsConfiguration', type: ShapeType::Structure, memberName: 'MetricsConfiguration', memberIndex: 2, members: [new Schema(id: 'com.amazonaws.s3#MetricsConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#MetricsConfiguration$Filter', type: ShapeType::Union, memberName: 'Filter', memberIndex: 1, targetClass: MetricsFilter::class)], traits: [0 => 'MetricsConfiguration', 7 => true, 14 => true], targetClass: MetricsConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketMetricsConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 3, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketMetricsConfigurationRequest::class
        );
    }

    public static function putBucketNotificationConfigurationRequest(): Schema
    {
        if (isset(self::$PutBucketNotificationConfigurationRequest)) {
            return self::$PutBucketNotificationConfigurationRequest;
        }

        return self::$PutBucketNotificationConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketNotificationConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketNotificationConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketNotificationConfigurationRequest$NotificationConfiguration', type: ShapeType::Structure, memberName: 'NotificationConfiguration', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#NotificationConfiguration$TopicConfigurations', type: ShapeType::List_, memberName: 'TopicConfigurations', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#TopicConfigurationList$member'] ??= new Schema(id: 'com.amazonaws.s3#TopicConfigurationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::topicConfiguration()->getMembers(), targetClass: TopicConfiguration::class), traits: [0 => 'TopicConfiguration', 3 => true]), new Schema(id: 'com.amazonaws.s3#NotificationConfiguration$QueueConfigurations', type: ShapeType::List_, memberName: 'QueueConfigurations', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#QueueConfigurationList$member'] ??= new Schema(id: 'com.amazonaws.s3#QueueConfigurationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::queueConfiguration()->getMembers(), targetClass: QueueConfiguration::class), traits: [0 => 'QueueConfiguration', 3 => true]), new Schema(id: 'com.amazonaws.s3#NotificationConfiguration$LambdaFunctionConfigurations', type: ShapeType::List_, memberName: 'LambdaFunctionConfigurations', memberIndex: 2, listMember: SchemasMembers::$shared['com.amazonaws.s3#LambdaFunctionConfigurationList$member'] ??= new Schema(id: 'com.amazonaws.s3#LambdaFunctionConfigurationList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::lambdaFunctionConfiguration()->getMembers(), targetClass: LambdaFunctionConfiguration::class), traits: [0 => 'CloudFunctionConfiguration', 3 => true]), new Schema(id: 'com.amazonaws.s3#NotificationConfiguration$EventBridgeConfiguration', type: ShapeType::Structure, memberName: 'EventBridgeConfiguration', memberIndex: 3, targetClass: EventBridgeConfiguration::class)], traits: [0 => 'NotificationConfiguration', 7 => true, 14 => true], targetClass: NotificationConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketNotificationConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 2, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#PutBucketNotificationConfigurationRequest$SkipDestinationValidation', type: ShapeType::Boolean, memberName: 'SkipDestinationValidation', memberIndex: 3, traits: [5 => 'x-amz-skip-destination-validation'])
            ],
            targetClass: PutBucketNotificationConfigurationRequest::class
        );
    }

    public static function putBucketOwnershipControlsRequest(): Schema
    {
        if (isset(self::$PutBucketOwnershipControlsRequest)) {
            return self::$PutBucketOwnershipControlsRequest;
        }

        return self::$PutBucketOwnershipControlsRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketOwnershipControlsRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketOwnershipControlsRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketOwnershipControlsRequest$OwnershipControls', type: ShapeType::Structure, memberName: 'OwnershipControls', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#OwnershipControls$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#OwnershipControlsRules$member'] ??= new Schema(id: 'com.amazonaws.s3#OwnershipControlsRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::ownershipControlsRule()->getMembers(), targetClass: OwnershipControlsRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])], traits: [0 => 'OwnershipControls', 7 => true, 14 => true], targetClass: OwnershipControls::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketOwnershipControlsRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketOwnershipControlsRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 3, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#PutBucketOwnershipControlsRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 4, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class)
            ],
            targetClass: PutBucketOwnershipControlsRequest::class
        );
    }

    public static function putBucketPolicyRequest(): Schema
    {
        if (isset(self::$PutBucketPolicyRequest)) {
            return self::$PutBucketPolicyRequest;
        }

        return self::$PutBucketPolicyRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketPolicyRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketPolicyRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketPolicyRequest$Policy', type: ShapeType::String_, memberName: 'Policy', memberIndex: 1, traits: [7 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#PutBucketPolicyRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketPolicyRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketPolicyRequest$ConfirmRemoveSelfBucketAccess', type: ShapeType::Boolean, memberName: 'ConfirmRemoveSelfBucketAccess', memberIndex: 4, traits: [5 => 'x-amz-confirm-remove-self-bucket-access']),
                new Schema(id: 'com.amazonaws.s3#PutBucketPolicyRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 5, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketPolicyRequest::class
        );
    }

    public static function putBucketReplicationRequest(): Schema
    {
        if (isset(self::$PutBucketReplicationRequest)) {
            return self::$PutBucketReplicationRequest;
        }

        return self::$PutBucketReplicationRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketReplicationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketReplicationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketReplicationRequest$ReplicationConfiguration', type: ShapeType::Structure, memberName: 'ReplicationConfiguration', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#ReplicationConfiguration$Role', type: ShapeType::String_, memberName: 'Role', memberIndex: 0, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#ReplicationConfiguration$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#ReplicationRules$member'] ??= new Schema(id: 'com.amazonaws.s3#ReplicationRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#ReplicationRule$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: ReplicationRuleStatus::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Destination', type: ShapeType::Structure, memberName: 'Destination', memberIndex: 1, traits: [14 => true], targetClass: Destination::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$ID', type: ShapeType::String_, memberName: 'ID', memberIndex: 2), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Priority', type: ShapeType::Integer, memberName: 'Priority', memberIndex: 3), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 4), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 5, targetClass: ReplicationRuleFilter::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$SourceSelectionCriteria', type: ShapeType::Structure, memberName: 'SourceSelectionCriteria', memberIndex: 6, targetClass: SourceSelectionCriteria::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$ExistingObjectReplication', type: ShapeType::Structure, memberName: 'ExistingObjectReplication', memberIndex: 7, targetClass: ExistingObjectReplication::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$DeleteMarkerReplication', type: ShapeType::Structure, memberName: 'DeleteMarkerReplication', memberIndex: 8, targetClass: DeleteMarkerReplication::class)], targetClass: ReplicationRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])], traits: [0 => 'ReplicationConfiguration', 7 => true, 14 => true], targetClass: ReplicationConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketReplicationRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketReplicationRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketReplicationRequest$Token', type: ShapeType::String_, memberName: 'Token', memberIndex: 4, traits: [5 => 'x-amz-bucket-object-lock-token']),
                new Schema(id: 'com.amazonaws.s3#PutBucketReplicationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 5, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketReplicationRequest::class
        );
    }

    public static function putBucketRequestPaymentRequest(): Schema
    {
        if (isset(self::$PutBucketRequestPaymentRequest)) {
            return self::$PutBucketRequestPaymentRequest;
        }

        return self::$PutBucketRequestPaymentRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketRequestPaymentRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketRequestPaymentRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketRequestPaymentRequest$RequestPaymentConfiguration', type: ShapeType::Structure, memberName: 'RequestPaymentConfiguration', memberIndex: 1, members: self::requestPaymentConfiguration()->getMembers(), traits: [0 => 'RequestPaymentConfiguration', 7 => true, 14 => true], targetClass: RequestPaymentConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketRequestPaymentRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketRequestPaymentRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketRequestPaymentRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketRequestPaymentRequest::class
        );
    }

    public static function putBucketTaggingRequest(): Schema
    {
        if (isset(self::$PutBucketTaggingRequest)) {
            return self::$PutBucketTaggingRequest;
        }

        return self::$PutBucketTaggingRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketTaggingRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketTaggingRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketTaggingRequest$Tagging', type: ShapeType::Structure, memberName: 'Tagging', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#Tagging$TagSet', type: ShapeType::List_, memberName: 'TagSet', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [14 => true])], traits: [0 => 'Tagging', 7 => true, 14 => true], targetClass: Tagging::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketTaggingRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketTaggingRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketTaggingRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketTaggingRequest::class
        );
    }

    public static function putBucketVersioningRequest(): Schema
    {
        if (isset(self::$PutBucketVersioningRequest)) {
            return self::$PutBucketVersioningRequest;
        }

        return self::$PutBucketVersioningRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketVersioningRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketVersioningRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketVersioningRequest$VersioningConfiguration', type: ShapeType::Structure, memberName: 'VersioningConfiguration', memberIndex: 1, members: self::versioningConfiguration()->getMembers(), traits: [0 => 'VersioningConfiguration', 7 => true, 14 => true], targetClass: VersioningConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketVersioningRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketVersioningRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketVersioningRequest$MFA', type: ShapeType::String_, memberName: 'MFA', memberIndex: 4, traits: [5 => 'x-amz-mfa']),
                new Schema(id: 'com.amazonaws.s3#PutBucketVersioningRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 5, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketVersioningRequest::class
        );
    }

    public static function putBucketWebsiteRequest(): Schema
    {
        if (isset(self::$PutBucketWebsiteRequest)) {
            return self::$PutBucketWebsiteRequest;
        }

        return self::$PutBucketWebsiteRequest = new Schema(
            id: 'com.amazonaws.s3#PutBucketWebsiteRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutBucketWebsiteRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutBucketWebsiteRequest$WebsiteConfiguration', type: ShapeType::Structure, memberName: 'WebsiteConfiguration', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#WebsiteConfiguration$ErrorDocument', type: ShapeType::Structure, memberName: 'ErrorDocument', memberIndex: 0, targetClass: ErrorDocument::class), new Schema(id: 'com.amazonaws.s3#WebsiteConfiguration$IndexDocument', type: ShapeType::Structure, memberName: 'IndexDocument', memberIndex: 1, targetClass: IndexDocument::class), new Schema(id: 'com.amazonaws.s3#WebsiteConfiguration$RedirectAllRequestsTo', type: ShapeType::Structure, memberName: 'RedirectAllRequestsTo', memberIndex: 2, targetClass: RedirectAllRequestsTo::class), new Schema(id: 'com.amazonaws.s3#WebsiteConfiguration$RoutingRules', type: ShapeType::List_, memberName: 'RoutingRules', memberIndex: 3, listMember: SchemasMembers::$shared['com.amazonaws.s3#RoutingRules$member'] ??= new Schema(id: 'com.amazonaws.s3#RoutingRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#RoutingRule$Redirect', type: ShapeType::Structure, memberName: 'Redirect', memberIndex: 0, traits: [14 => true], targetClass: Redirect::class), new Schema(id: 'com.amazonaws.s3#RoutingRule$Condition', type: ShapeType::Structure, memberName: 'Condition', memberIndex: 1, targetClass: Condition::class)], traits: [0 => 'RoutingRule'], targetClass: RoutingRule::class))], traits: [0 => 'WebsiteConfiguration', 7 => true, 14 => true], targetClass: WebsiteConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketWebsiteRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutBucketWebsiteRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutBucketWebsiteRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutBucketWebsiteRequest::class
        );
    }

    public static function putObjectAclOutput(): Schema
    {
        if (isset(self::$PutObjectAclOutput)) {
            return self::$PutObjectAclOutput;
        }

        return self::$PutObjectAclOutput = new Schema(
            id: 'com.amazonaws.s3#PutObjectAclOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectAclOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 0, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: PutObjectAclOutput::class
        );
    }

    public static function putObjectAclRequest(): Schema
    {
        if (isset(self::$PutObjectAclRequest)) {
            return self::$PutObjectAclRequest;
        }

        return self::$PutObjectAclRequest = new Schema(
            id: 'com.amazonaws.s3#PutObjectAclRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$ACL', type: ShapeType::Enum, memberName: 'ACL', memberIndex: 2, traits: [5 => 'x-amz-acl'], targetClass: ObjectCannedACL::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$AccessControlPolicy', type: ShapeType::Structure, memberName: 'AccessControlPolicy', memberIndex: 3, members: [new Schema(id: 'com.amazonaws.s3#AccessControlPolicy$Grants', type: ShapeType::List_, memberName: 'Grants', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#Grants$member'] ??= new Schema(id: 'com.amazonaws.s3#Grants$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::grant()->getMembers(), traits: [0 => 'Grant'], targetClass: Grant::class), traits: [0 => 'AccessControlList']), new Schema(id: 'com.amazonaws.s3#AccessControlPolicy$Owner', type: ShapeType::Structure, memberName: 'Owner', memberIndex: 1, targetClass: Owner::class)], traits: [0 => 'AccessControlPolicy', 7 => true], targetClass: AccessControlPolicy::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 4, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 5, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$GrantFullControl', type: ShapeType::String_, memberName: 'GrantFullControl', memberIndex: 6, traits: [5 => 'x-amz-grant-full-control']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$GrantRead', type: ShapeType::String_, memberName: 'GrantRead', memberIndex: 7, traits: [5 => 'x-amz-grant-read']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$GrantReadACP', type: ShapeType::String_, memberName: 'GrantReadACP', memberIndex: 8, traits: [5 => 'x-amz-grant-read-acp']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$GrantWrite', type: ShapeType::String_, memberName: 'GrantWrite', memberIndex: 9, traits: [5 => 'x-amz-grant-write']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$GrantWriteACP', type: ShapeType::String_, memberName: 'GrantWriteACP', memberIndex: 10, traits: [5 => 'x-amz-grant-write-acp']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 11, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 12, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAclRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 13, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutObjectAclRequest::class
        );
    }

    public static function putObjectAnnotationOutput(): Schema
    {
        if (isset(self::$PutObjectAnnotationOutput)) {
            return self::$PutObjectAnnotationOutput;
        }

        return self::$PutObjectAnnotationOutput = new Schema(
            id: 'com.amazonaws.s3#PutObjectAnnotationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$AnnotationName', type: ShapeType::String_, memberName: 'AnnotationName', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ObjectVersionId', type: ShapeType::String_, memberName: 'ObjectVersionId', memberIndex: 2, traits: [5 => 'x-amz-object-version-id']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 3, traits: [5 => 'ETag']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 4, traits: [5 => 'x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 5, traits: [5 => 'x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 6, traits: [5 => 'x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 7, traits: [5 => 'x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 8, traits: [5 => 'x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 9, traits: [5 => 'x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 10, traits: [5 => 'x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 11, traits: [5 => 'x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 12, traits: [5 => 'x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 13, traits: [5 => 'x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 14, traits: [5 => 'x-amz-checksum-type'], targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 15, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 16, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: PutObjectAnnotationOutput::class
        );
    }

    public static function putObjectAnnotationRequest(): Schema
    {
        if (isset(self::$PutObjectAnnotationRequest)) {
            return self::$PutObjectAnnotationRequest;
        }

        return self::$PutObjectAnnotationRequest = new Schema(
            id: 'com.amazonaws.s3#PutObjectAnnotationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$AnnotationName', type: ShapeType::String_, memberName: 'AnnotationName', memberIndex: 2, traits: [9 => 'annotationName', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$AnnotationPayload', type: ShapeType::Blob, memberName: 'AnnotationPayload', memberIndex: 3, traits: [7 => true, 14 => true, 16 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 4, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ObjectIfMatch', type: ShapeType::String_, memberName: 'ObjectIfMatch', memberIndex: 5, traits: [5 => 'x-amz-object-if-match']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 6, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 7, traits: [5 => 'x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 8, traits: [5 => 'x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 9, traits: [5 => 'x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 10, traits: [5 => 'x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 11, traits: [5 => 'x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 12, traits: [5 => 'x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 13, traits: [5 => 'x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 14, traits: [5 => 'x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 15, traits: [5 => 'x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 16, traits: [5 => 'x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 17, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 18, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectAnnotationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 19, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutObjectAnnotationRequest::class
        );
    }

    public static function putObjectLegalHoldOutput(): Schema
    {
        if (isset(self::$PutObjectLegalHoldOutput)) {
            return self::$PutObjectLegalHoldOutput;
        }

        return self::$PutObjectLegalHoldOutput = new Schema(
            id: 'com.amazonaws.s3#PutObjectLegalHoldOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectLegalHoldOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 0, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: PutObjectLegalHoldOutput::class
        );
    }

    public static function putObjectLegalHoldRequest(): Schema
    {
        if (isset(self::$PutObjectLegalHoldRequest)) {
            return self::$PutObjectLegalHoldRequest;
        }

        return self::$PutObjectLegalHoldRequest = new Schema(
            id: 'com.amazonaws.s3#PutObjectLegalHoldRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectLegalHoldRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutObjectLegalHoldRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectLegalHoldRequest$LegalHold', type: ShapeType::Structure, memberName: 'LegalHold', memberIndex: 2, members: self::objectLockLegalHold()->getMembers(), traits: [0 => 'LegalHold', 7 => true], targetClass: ObjectLockLegalHold::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectLegalHoldRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 3, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectLegalHoldRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 4, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#PutObjectLegalHoldRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 5, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectLegalHoldRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 6, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectLegalHoldRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 7, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutObjectLegalHoldRequest::class
        );
    }

    public static function putObjectLockConfigurationOutput(): Schema
    {
        if (isset(self::$PutObjectLockConfigurationOutput)) {
            return self::$PutObjectLockConfigurationOutput;
        }

        return self::$PutObjectLockConfigurationOutput = new Schema(
            id: 'com.amazonaws.s3#PutObjectLockConfigurationOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectLockConfigurationOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 0, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: PutObjectLockConfigurationOutput::class
        );
    }

    public static function putObjectLockConfigurationRequest(): Schema
    {
        if (isset(self::$PutObjectLockConfigurationRequest)) {
            return self::$PutObjectLockConfigurationRequest;
        }

        return self::$PutObjectLockConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#PutObjectLockConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectLockConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutObjectLockConfigurationRequest$ObjectLockConfiguration', type: ShapeType::Structure, memberName: 'ObjectLockConfiguration', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#ObjectLockConfiguration$ObjectLockEnabled', type: ShapeType::Enum, memberName: 'ObjectLockEnabled', memberIndex: 0, targetClass: ObjectLockEnabled::class), new Schema(id: 'com.amazonaws.s3#ObjectLockConfiguration$Rule', type: ShapeType::Structure, memberName: 'Rule', memberIndex: 1, targetClass: ObjectLockRule::class)], traits: [0 => 'ObjectLockConfiguration', 7 => true], targetClass: ObjectLockConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectLockConfigurationRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 2, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectLockConfigurationRequest$Token', type: ShapeType::String_, memberName: 'Token', memberIndex: 3, traits: [5 => 'x-amz-bucket-object-lock-token']),
                new Schema(id: 'com.amazonaws.s3#PutObjectLockConfigurationRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 4, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectLockConfigurationRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 5, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectLockConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 6, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutObjectLockConfigurationRequest::class
        );
    }

    public static function putObjectOutput(): Schema
    {
        if (isset(self::$PutObjectOutput)) {
            return self::$PutObjectOutput;
        }

        return self::$PutObjectOutput = new Schema(
            id: 'com.amazonaws.s3#PutObjectOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$Expiration', type: ShapeType::String_, memberName: 'Expiration', memberIndex: 0, traits: [5 => 'x-amz-expiration']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 1, traits: [5 => 'ETag']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 2, traits: [5 => 'x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 3, traits: [5 => 'x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 4, traits: [5 => 'x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 5, traits: [5 => 'x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 6, traits: [5 => 'x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 7, traits: [5 => 'x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 8, traits: [5 => 'x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 9, traits: [5 => 'x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 10, traits: [5 => 'x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 11, traits: [5 => 'x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ChecksumType', type: ShapeType::Enum, memberName: 'ChecksumType', memberIndex: 12, traits: [5 => 'x-amz-checksum-type'], targetClass: ChecksumType::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 13, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 14, traits: [5 => 'x-amz-version-id']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 15, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 16, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 17, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$SSEKMSEncryptionContext', type: ShapeType::String_, memberName: 'SSEKMSEncryptionContext', memberIndex: 18, traits: [5 => 'x-amz-server-side-encryption-context', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 19, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$Size', type: ShapeType::Long, memberName: 'Size', memberIndex: 20, traits: [5 => 'x-amz-object-size']),
                new Schema(id: 'com.amazonaws.s3#PutObjectOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 21, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: PutObjectOutput::class
        );
    }

    public static function putObjectRequest(): Schema
    {
        if (isset(self::$PutObjectRequest)) {
            return self::$PutObjectRequest;
        }

        return self::$PutObjectRequest = new Schema(
            id: 'com.amazonaws.s3#PutObjectRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ACL', type: ShapeType::Enum, memberName: 'ACL', memberIndex: 2, traits: [5 => 'x-amz-acl'], targetClass: ObjectCannedACL::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$Body', type: ShapeType::Blob, memberName: 'Body', memberIndex: 3, traits: [7 => true, 16 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$CacheControl', type: ShapeType::String_, memberName: 'CacheControl', memberIndex: 4, traits: [5 => 'Cache-Control']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ContentDisposition', type: ShapeType::String_, memberName: 'ContentDisposition', memberIndex: 5, traits: [5 => 'Content-Disposition']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ContentEncoding', type: ShapeType::String_, memberName: 'ContentEncoding', memberIndex: 6, traits: [5 => 'Content-Encoding']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ContentLanguage', type: ShapeType::String_, memberName: 'ContentLanguage', memberIndex: 7, traits: [5 => 'Content-Language']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ContentLength', type: ShapeType::Long, memberName: 'ContentLength', memberIndex: 8, traits: [5 => 'Content-Length']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 9, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ContentType', type: ShapeType::String_, memberName: 'ContentType', memberIndex: 10, traits: [5 => 'Content-Type']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 11, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 12, traits: [5 => 'x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 13, traits: [5 => 'x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 14, traits: [5 => 'x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 15, traits: [5 => 'x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 16, traits: [5 => 'x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 17, traits: [5 => 'x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 18, traits: [5 => 'x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 19, traits: [5 => 'x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 20, traits: [5 => 'x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 21, traits: [5 => 'x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$Expires', type: ShapeType::String_, memberName: 'Expires', memberIndex: 22, traits: [5 => 'Expires']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$IfMatch', type: ShapeType::String_, memberName: 'IfMatch', memberIndex: 23, traits: [5 => 'If-Match']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$IfNoneMatch', type: ShapeType::String_, memberName: 'IfNoneMatch', memberIndex: 24, traits: [5 => 'If-None-Match']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$GrantFullControl', type: ShapeType::String_, memberName: 'GrantFullControl', memberIndex: 25, traits: [5 => 'x-amz-grant-full-control']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$GrantRead', type: ShapeType::String_, memberName: 'GrantRead', memberIndex: 26, traits: [5 => 'x-amz-grant-read']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$GrantReadACP', type: ShapeType::String_, memberName: 'GrantReadACP', memberIndex: 27, traits: [5 => 'x-amz-grant-read-acp']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$GrantWriteACP', type: ShapeType::String_, memberName: 'GrantWriteACP', memberIndex: 28, traits: [5 => 'x-amz-grant-write-acp']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$WriteOffsetBytes', type: ShapeType::Long, memberName: 'WriteOffsetBytes', memberIndex: 29, traits: [5 => 'x-amz-write-offset-bytes']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$Metadata', type: ShapeType::Map, memberName: 'Metadata', memberIndex: 30, mapKey: SchemasMembers::$shared['com.amazonaws.s3#Metadata$key'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$key', type: ShapeType::String_, memberName: 'key', memberIndex: 0), mapValue: SchemasMembers::$shared['com.amazonaws.s3#Metadata$value'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$value', type: ShapeType::String_, memberName: 'value', memberIndex: 1), traits: [8 => 'x-amz-meta-']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 31, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 32, traits: [5 => 'x-amz-storage-class'], targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$WebsiteRedirectLocation', type: ShapeType::String_, memberName: 'WebsiteRedirectLocation', memberIndex: 33, traits: [5 => 'x-amz-website-redirect-location']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 34, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 35, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 36, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 37, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$SSEKMSEncryptionContext', type: ShapeType::String_, memberName: 'SSEKMSEncryptionContext', memberIndex: 38, traits: [5 => 'x-amz-server-side-encryption-context', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 39, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 40, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$Tagging', type: ShapeType::String_, memberName: 'Tagging', memberIndex: 41, traits: [5 => 'x-amz-tagging']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ObjectLockMode', type: ShapeType::Enum, memberName: 'ObjectLockMode', memberIndex: 42, traits: [5 => 'x-amz-object-lock-mode'], targetClass: ObjectLockMode::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ObjectLockRetainUntilDate', type: ShapeType::Timestamp, memberName: 'ObjectLockRetainUntilDate', memberIndex: 43, traits: [4 => 'date-time', 5 => 'x-amz-object-lock-retain-until-date']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ObjectLockLegalHoldStatus', type: ShapeType::Enum, memberName: 'ObjectLockLegalHoldStatus', memberIndex: 44, traits: [5 => 'x-amz-object-lock-legal-hold'], targetClass: ObjectLockLegalHoldStatus::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ObjectLockEventHold', type: ShapeType::Enum, memberName: 'ObjectLockEventHold', memberIndex: 45, traits: [5 => 'x-amz-object-lock-event-hold'], targetClass: ObjectLockEventHold::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ObjectLockEventHoldDurationDays', type: ShapeType::Integer, memberName: 'ObjectLockEventHoldDurationDays', memberIndex: 46, traits: [5 => 'x-amz-object-lock-event-hold-duration-days']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ObjectLockEventHoldDurationYears', type: ShapeType::Integer, memberName: 'ObjectLockEventHoldDurationYears', memberIndex: 47, traits: [5 => 'x-amz-object-lock-event-hold-duration-years']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 48, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutObjectRequest::class
        );
    }

    public static function putObjectRetentionOutput(): Schema
    {
        if (isset(self::$PutObjectRetentionOutput)) {
            return self::$PutObjectRetentionOutput;
        }

        return self::$PutObjectRetentionOutput = new Schema(
            id: 'com.amazonaws.s3#PutObjectRetentionOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectRetentionOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 0, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: PutObjectRetentionOutput::class
        );
    }

    public static function putObjectRetentionRequest(): Schema
    {
        if (isset(self::$PutObjectRetentionRequest)) {
            return self::$PutObjectRetentionRequest;
        }

        return self::$PutObjectRetentionRequest = new Schema(
            id: 'com.amazonaws.s3#PutObjectRetentionRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectRetentionRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutObjectRetentionRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectRetentionRequest$Retention', type: ShapeType::Structure, memberName: 'Retention', memberIndex: 2, members: self::objectLockRetention()->getMembers(), traits: [0 => 'Retention', 7 => true], targetClass: ObjectLockRetention::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRetentionRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 3, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRetentionRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 4, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRetentionRequest$BypassGovernanceRetention', type: ShapeType::Boolean, memberName: 'BypassGovernanceRetention', memberIndex: 5, traits: [5 => 'x-amz-bypass-governance-retention']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRetentionRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 6, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectRetentionRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 7, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectRetentionRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 8, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutObjectRetentionRequest::class
        );
    }

    public static function putObjectTaggingOutput(): Schema
    {
        if (isset(self::$PutObjectTaggingOutput)) {
            return self::$PutObjectTaggingOutput;
        }

        return self::$PutObjectTaggingOutput = new Schema(
            id: 'com.amazonaws.s3#PutObjectTaggingOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectTaggingOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 0, traits: [5 => 'x-amz-version-id'])
            ],
            targetClass: PutObjectTaggingOutput::class
        );
    }

    public static function putObjectTaggingRequest(): Schema
    {
        if (isset(self::$PutObjectTaggingRequest)) {
            return self::$PutObjectTaggingRequest;
        }

        return self::$PutObjectTaggingRequest = new Schema(
            id: 'com.amazonaws.s3#PutObjectTaggingRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutObjectTaggingRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutObjectTaggingRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#PutObjectTaggingRequest$Tagging', type: ShapeType::Structure, memberName: 'Tagging', memberIndex: 2, members: [new Schema(id: 'com.amazonaws.s3#Tagging$TagSet', type: ShapeType::List_, memberName: 'TagSet', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [14 => true])], traits: [0 => 'Tagging', 7 => true, 14 => true], targetClass: Tagging::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectTaggingRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 3, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#PutObjectTaggingRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 4, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutObjectTaggingRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 5, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutObjectTaggingRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 6, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#PutObjectTaggingRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 7, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class)
            ],
            targetClass: PutObjectTaggingRequest::class
        );
    }

    public static function putPublicAccessBlockRequest(): Schema
    {
        if (isset(self::$PutPublicAccessBlockRequest)) {
            return self::$PutPublicAccessBlockRequest;
        }

        return self::$PutPublicAccessBlockRequest = new Schema(
            id: 'com.amazonaws.s3#PutPublicAccessBlockRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#PutPublicAccessBlockRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#PutPublicAccessBlockRequest$PublicAccessBlockConfiguration', type: ShapeType::Structure, memberName: 'PublicAccessBlockConfiguration', memberIndex: 1, members: self::publicAccessBlockConfiguration()->getMembers(), traits: [0 => 'PublicAccessBlockConfiguration', 7 => true, 14 => true], targetClass: PublicAccessBlockConfiguration::class),
                new Schema(id: 'com.amazonaws.s3#PutPublicAccessBlockRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#PutPublicAccessBlockRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#PutPublicAccessBlockRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: PutPublicAccessBlockRequest::class
        );
    }

    public static function queueConfiguration(): Schema
    {
        if (isset(self::$QueueConfiguration)) {
            return self::$QueueConfiguration;
        }

        return self::$QueueConfiguration = new Schema(
            id: 'com.amazonaws.s3#QueueConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#QueueConfiguration$QueueArn', type: ShapeType::String_, memberName: 'QueueArn', memberIndex: 0, traits: [0 => 'Queue', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#QueueConfiguration$Events', type: ShapeType::List_, memberName: 'Events', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#EventList$member'] ??= new Schema(id: 'com.amazonaws.s3#EventList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, targetClass: Event::class), traits: [0 => 'Event', 3 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#QueueConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#QueueConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 3, members: [new Schema(id: 'com.amazonaws.s3#NotificationConfigurationFilter$Key', type: ShapeType::Structure, memberName: 'Key', memberIndex: 0, traits: [0 => 'S3Key'], targetClass: S3KeyFilter::class)], targetClass: NotificationConfigurationFilter::class)
            ],
            targetClass: QueueConfiguration::class
        );
    }

    public static function recordExpiration(): Schema
    {
        if (isset(self::$RecordExpiration)) {
            return self::$RecordExpiration;
        }

        return self::$RecordExpiration = new Schema(
            id: 'com.amazonaws.s3#RecordExpiration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RecordExpiration$Expiration', type: ShapeType::Enum, memberName: 'Expiration', memberIndex: 0, traits: [14 => true], targetClass: ExpirationState::class),
                new Schema(id: 'com.amazonaws.s3#RecordExpiration$Days', type: ShapeType::Integer, memberName: 'Days', memberIndex: 1)
            ],
            targetClass: RecordExpiration::class
        );
    }

    public static function recordsEvent(): Schema
    {
        if (isset(self::$RecordsEvent)) {
            return self::$RecordsEvent;
        }

        return self::$RecordsEvent = new Schema(
            id: 'com.amazonaws.s3#RecordsEvent',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RecordsEvent$Payload', type: ShapeType::Blob, memberName: 'Payload', memberIndex: 0)
            ],
            targetClass: RecordsEvent::class
        );
    }

    public static function redirect(): Schema
    {
        if (isset(self::$Redirect)) {
            return self::$Redirect;
        }

        return self::$Redirect = new Schema(
            id: 'com.amazonaws.s3#Redirect',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Redirect$HostName', type: ShapeType::String_, memberName: 'HostName', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Redirect$HttpRedirectCode', type: ShapeType::String_, memberName: 'HttpRedirectCode', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Redirect$Protocol', type: ShapeType::Enum, memberName: 'Protocol', memberIndex: 2, targetClass: Protocol::class),
                new Schema(id: 'com.amazonaws.s3#Redirect$ReplaceKeyPrefixWith', type: ShapeType::String_, memberName: 'ReplaceKeyPrefixWith', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#Redirect$ReplaceKeyWith', type: ShapeType::String_, memberName: 'ReplaceKeyWith', memberIndex: 4)
            ],
            targetClass: Redirect::class
        );
    }

    public static function redirectAllRequestsTo(): Schema
    {
        if (isset(self::$RedirectAllRequestsTo)) {
            return self::$RedirectAllRequestsTo;
        }

        return self::$RedirectAllRequestsTo = new Schema(
            id: 'com.amazonaws.s3#RedirectAllRequestsTo',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RedirectAllRequestsTo$HostName', type: ShapeType::String_, memberName: 'HostName', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#RedirectAllRequestsTo$Protocol', type: ShapeType::Enum, memberName: 'Protocol', memberIndex: 1, targetClass: Protocol::class)
            ],
            targetClass: RedirectAllRequestsTo::class
        );
    }

    public static function renameObjectOutput(): Schema
    {
        if (isset(self::$RenameObjectOutput)) {
            return self::$RenameObjectOutput;
        }

        return self::$RenameObjectOutput = new Schema(
            id: 'com.amazonaws.s3#RenameObjectOutput',
            type: ShapeType::Structure,
            members: [
            ],
            targetClass: RenameObjectOutput::class
        );
    }

    public static function renameObjectRequest(): Schema
    {
        if (isset(self::$RenameObjectRequest)) {
            return self::$RenameObjectRequest;
        }

        return self::$RenameObjectRequest = new Schema(
            id: 'com.amazonaws.s3#RenameObjectRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$RenameSource', type: ShapeType::String_, memberName: 'RenameSource', memberIndex: 2, traits: [5 => 'x-amz-rename-source', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$DestinationIfMatch', type: ShapeType::String_, memberName: 'DestinationIfMatch', memberIndex: 3, traits: [5 => 'If-Match']),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$DestinationIfNoneMatch', type: ShapeType::String_, memberName: 'DestinationIfNoneMatch', memberIndex: 4, traits: [5 => 'If-None-Match']),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$DestinationIfModifiedSince', type: ShapeType::Timestamp, memberName: 'DestinationIfModifiedSince', memberIndex: 5, traits: [5 => 'If-Modified-Since']),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$DestinationIfUnmodifiedSince', type: ShapeType::Timestamp, memberName: 'DestinationIfUnmodifiedSince', memberIndex: 6, traits: [5 => 'If-Unmodified-Since']),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$SourceIfMatch', type: ShapeType::String_, memberName: 'SourceIfMatch', memberIndex: 7, traits: [5 => 'x-amz-rename-source-if-match']),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$SourceIfNoneMatch', type: ShapeType::String_, memberName: 'SourceIfNoneMatch', memberIndex: 8, traits: [5 => 'x-amz-rename-source-if-none-match']),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$SourceIfModifiedSince', type: ShapeType::Timestamp, memberName: 'SourceIfModifiedSince', memberIndex: 9, traits: [4 => 'http-date', 5 => 'x-amz-rename-source-if-modified-since']),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$SourceIfUnmodifiedSince', type: ShapeType::Timestamp, memberName: 'SourceIfUnmodifiedSince', memberIndex: 10, traits: [4 => 'http-date', 5 => 'x-amz-rename-source-if-unmodified-since']),
                new Schema(id: 'com.amazonaws.s3#RenameObjectRequest$ClientToken', type: ShapeType::String_, memberName: 'ClientToken', memberIndex: 11, traits: [5 => 'x-amz-client-token', 19 => true])
            ],
            targetClass: RenameObjectRequest::class
        );
    }

    public static function replicaModifications(): Schema
    {
        if (isset(self::$ReplicaModifications)) {
            return self::$ReplicaModifications;
        }

        return self::$ReplicaModifications = new Schema(
            id: 'com.amazonaws.s3#ReplicaModifications',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ReplicaModifications$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: ReplicaModificationsStatus::class)
            ],
            targetClass: ReplicaModifications::class
        );
    }

    public static function replicationConfiguration(): Schema
    {
        if (isset(self::$ReplicationConfiguration)) {
            return self::$ReplicationConfiguration;
        }

        return self::$ReplicationConfiguration = new Schema(
            id: 'com.amazonaws.s3#ReplicationConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ReplicationConfiguration$Role', type: ShapeType::String_, memberName: 'Role', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#ReplicationConfiguration$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#ReplicationRules$member'] ??= new Schema(id: 'com.amazonaws.s3#ReplicationRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#ReplicationRule$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: ReplicationRuleStatus::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Destination', type: ShapeType::Structure, memberName: 'Destination', memberIndex: 1, traits: [14 => true], targetClass: Destination::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$ID', type: ShapeType::String_, memberName: 'ID', memberIndex: 2), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Priority', type: ShapeType::Integer, memberName: 'Priority', memberIndex: 3), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 4), new Schema(id: 'com.amazonaws.s3#ReplicationRule$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 5, targetClass: ReplicationRuleFilter::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$SourceSelectionCriteria', type: ShapeType::Structure, memberName: 'SourceSelectionCriteria', memberIndex: 6, targetClass: SourceSelectionCriteria::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$ExistingObjectReplication', type: ShapeType::Structure, memberName: 'ExistingObjectReplication', memberIndex: 7, targetClass: ExistingObjectReplication::class), new Schema(id: 'com.amazonaws.s3#ReplicationRule$DeleteMarkerReplication', type: ShapeType::Structure, memberName: 'DeleteMarkerReplication', memberIndex: 8, targetClass: DeleteMarkerReplication::class)], targetClass: ReplicationRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])
            ],
            targetClass: ReplicationConfiguration::class
        );
    }

    public static function replicationRule(): Schema
    {
        if (isset(self::$ReplicationRule)) {
            return self::$ReplicationRule;
        }

        return self::$ReplicationRule = new Schema(
            id: 'com.amazonaws.s3#ReplicationRule',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ReplicationRule$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: ReplicationRuleStatus::class),
                new Schema(id: 'com.amazonaws.s3#ReplicationRule$Destination', type: ShapeType::Structure, memberName: 'Destination', memberIndex: 1, members: self::destination()->getMembers(), traits: [14 => true], targetClass: Destination::class),
                new Schema(id: 'com.amazonaws.s3#ReplicationRule$ID', type: ShapeType::String_, memberName: 'ID', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#ReplicationRule$Priority', type: ShapeType::Integer, memberName: 'Priority', memberIndex: 3),
                new Schema(id: 'com.amazonaws.s3#ReplicationRule$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#ReplicationRule$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 5, members: [new Schema(id: 'com.amazonaws.s3#ReplicationRuleFilter$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0), new Schema(id: 'com.amazonaws.s3#ReplicationRuleFilter$Tag', type: ShapeType::Structure, memberName: 'Tag', memberIndex: 1, targetClass: Tag::class), new Schema(id: 'com.amazonaws.s3#ReplicationRuleFilter$And', type: ShapeType::Structure, memberName: 'And', memberIndex: 2, targetClass: ReplicationRuleAndOperator::class), new Schema(id: 'com.amazonaws.s3#ReplicationRuleFilter$Not', type: ShapeType::Structure, memberName: 'Not', memberIndex: 3, targetClass: ReplicationRuleNotOperator::class)], targetClass: ReplicationRuleFilter::class),
                new Schema(id: 'com.amazonaws.s3#ReplicationRule$SourceSelectionCriteria', type: ShapeType::Structure, memberName: 'SourceSelectionCriteria', memberIndex: 6, members: [new Schema(id: 'com.amazonaws.s3#SourceSelectionCriteria$SseKmsEncryptedObjects', type: ShapeType::Structure, memberName: 'SseKmsEncryptedObjects', memberIndex: 0, targetClass: SseKmsEncryptedObjects::class), new Schema(id: 'com.amazonaws.s3#SourceSelectionCriteria$ReplicaModifications', type: ShapeType::Structure, memberName: 'ReplicaModifications', memberIndex: 1, targetClass: ReplicaModifications::class)], targetClass: SourceSelectionCriteria::class),
                new Schema(id: 'com.amazonaws.s3#ReplicationRule$ExistingObjectReplication', type: ShapeType::Structure, memberName: 'ExistingObjectReplication', memberIndex: 7, members: self::existingObjectReplication()->getMembers(), targetClass: ExistingObjectReplication::class),
                new Schema(id: 'com.amazonaws.s3#ReplicationRule$DeleteMarkerReplication', type: ShapeType::Structure, memberName: 'DeleteMarkerReplication', memberIndex: 8, members: self::deleteMarkerReplication()->getMembers(), targetClass: DeleteMarkerReplication::class)
            ],
            targetClass: ReplicationRule::class
        );
    }

    public static function replicationRuleAndOperator(): Schema
    {
        if (isset(self::$ReplicationRuleAndOperator)) {
            return self::$ReplicationRuleAndOperator;
        }

        return self::$ReplicationRuleAndOperator = new Schema(
            id: 'com.amazonaws.s3#ReplicationRuleAndOperator',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleAndOperator$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleAndOperator$Tags', type: ShapeType::List_, memberName: 'Tags', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [0 => 'Tag', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleAndOperator$Not', type: ShapeType::Structure, memberName: 'Not', memberIndex: 2, members: self::replicationRuleNotOperator()->getMembers(), targetClass: ReplicationRuleNotOperator::class)
            ],
            targetClass: ReplicationRuleAndOperator::class
        );
    }

    public static function replicationRuleFilter(): Schema
    {
        if (isset(self::$ReplicationRuleFilter)) {
            return self::$ReplicationRuleFilter;
        }

        return self::$ReplicationRuleFilter = new Schema(
            id: 'com.amazonaws.s3#ReplicationRuleFilter',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleFilter$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleFilter$Tag', type: ShapeType::Structure, memberName: 'Tag', memberIndex: 1, members: self::tag()->getMembers(), targetClass: Tag::class),
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleFilter$And', type: ShapeType::Structure, memberName: 'And', memberIndex: 2, members: [new Schema(id: 'com.amazonaws.s3#ReplicationRuleAndOperator$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0), new Schema(id: 'com.amazonaws.s3#ReplicationRuleAndOperator$Tags', type: ShapeType::List_, memberName: 'Tags', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [0 => 'Tag', 3 => true]), new Schema(id: 'com.amazonaws.s3#ReplicationRuleAndOperator$Not', type: ShapeType::Structure, memberName: 'Not', memberIndex: 2, targetClass: ReplicationRuleNotOperator::class)], targetClass: ReplicationRuleAndOperator::class),
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleFilter$Not', type: ShapeType::Structure, memberName: 'Not', memberIndex: 3, members: self::replicationRuleNotOperator()->getMembers(), targetClass: ReplicationRuleNotOperator::class)
            ],
            targetClass: ReplicationRuleFilter::class
        );
    }

    public static function replicationRuleNotOperator(): Schema
    {
        if (isset(self::$ReplicationRuleNotOperator)) {
            return self::$ReplicationRuleNotOperator;
        }

        return self::$ReplicationRuleNotOperator = new Schema(
            id: 'com.amazonaws.s3#ReplicationRuleNotOperator',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleNotOperator$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleNotOperator$Tag', type: ShapeType::Structure, memberName: 'Tag', memberIndex: 1, members: self::tag()->getMembers(), targetClass: Tag::class),
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleNotOperator$Or', type: ShapeType::Structure, memberName: 'Or', memberIndex: 2, members: self::replicationRuleOrOperator()->getMembers(), targetClass: ReplicationRuleOrOperator::class)
            ],
            targetClass: ReplicationRuleNotOperator::class
        );
    }

    public static function replicationRuleOrOperator(): Schema
    {
        if (isset(self::$ReplicationRuleOrOperator)) {
            return self::$ReplicationRuleOrOperator;
        }

        return self::$ReplicationRuleOrOperator = new Schema(
            id: 'com.amazonaws.s3#ReplicationRuleOrOperator',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleOrOperator$Prefixes', type: ShapeType::List_, memberName: 'Prefixes', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#ReplicationPrefixList$member'] ??= new Schema(id: 'com.amazonaws.s3#ReplicationPrefixList$member', type: ShapeType::String_, memberName: 'member', memberIndex: 0, traits: [0 => 'Prefix']), traits: [0 => 'Prefix', 3 => true]),
                new Schema(id: 'com.amazonaws.s3#ReplicationRuleOrOperator$Tags', type: ShapeType::List_, memberName: 'Tags', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [0 => 'Tag', 3 => true])
            ],
            targetClass: ReplicationRuleOrOperator::class
        );
    }

    public static function replicationTime(): Schema
    {
        if (isset(self::$ReplicationTime)) {
            return self::$ReplicationTime;
        }

        return self::$ReplicationTime = new Schema(
            id: 'com.amazonaws.s3#ReplicationTime',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ReplicationTime$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: ReplicationTimeStatus::class),
                new Schema(id: 'com.amazonaws.s3#ReplicationTime$Time', type: ShapeType::Structure, memberName: 'Time', memberIndex: 1, members: self::replicationTimeValue()->getMembers(), traits: [14 => true], targetClass: ReplicationTimeValue::class)
            ],
            targetClass: ReplicationTime::class
        );
    }

    public static function replicationTimeValue(): Schema
    {
        if (isset(self::$ReplicationTimeValue)) {
            return self::$ReplicationTimeValue;
        }

        return self::$ReplicationTimeValue = new Schema(
            id: 'com.amazonaws.s3#ReplicationTimeValue',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ReplicationTimeValue$Minutes', type: ShapeType::Integer, memberName: 'Minutes', memberIndex: 0)
            ],
            targetClass: ReplicationTimeValue::class
        );
    }

    public static function requestPaymentConfiguration(): Schema
    {
        if (isset(self::$RequestPaymentConfiguration)) {
            return self::$RequestPaymentConfiguration;
        }

        return self::$RequestPaymentConfiguration = new Schema(
            id: 'com.amazonaws.s3#RequestPaymentConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RequestPaymentConfiguration$Payer', type: ShapeType::Enum, memberName: 'Payer', memberIndex: 0, traits: [14 => true], targetClass: Payer::class)
            ],
            targetClass: RequestPaymentConfiguration::class
        );
    }

    public static function requestProgress(): Schema
    {
        if (isset(self::$RequestProgress)) {
            return self::$RequestProgress;
        }

        return self::$RequestProgress = new Schema(
            id: 'com.amazonaws.s3#RequestProgress',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RequestProgress$Enabled', type: ShapeType::Boolean, memberName: 'Enabled', memberIndex: 0)
            ],
            targetClass: RequestProgress::class
        );
    }

    public static function restoreObjectOutput(): Schema
    {
        if (isset(self::$RestoreObjectOutput)) {
            return self::$RestoreObjectOutput;
        }

        return self::$RestoreObjectOutput = new Schema(
            id: 'com.amazonaws.s3#RestoreObjectOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RestoreObjectOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 0, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#RestoreObjectOutput$RestoreOutputPath', type: ShapeType::String_, memberName: 'RestoreOutputPath', memberIndex: 1, traits: [5 => 'x-amz-restore-output-path'])
            ],
            targetClass: RestoreObjectOutput::class
        );
    }

    public static function restoreObjectRequest(): Schema
    {
        if (isset(self::$RestoreObjectRequest)) {
            return self::$RestoreObjectRequest;
        }

        return self::$RestoreObjectRequest = new Schema(
            id: 'com.amazonaws.s3#RestoreObjectRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RestoreObjectRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#RestoreObjectRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#RestoreObjectRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 2, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#RestoreObjectRequest$RestoreRequest', type: ShapeType::Structure, memberName: 'RestoreRequest', memberIndex: 3, members: [new Schema(id: 'com.amazonaws.s3#RestoreRequest$Days', type: ShapeType::Integer, memberName: 'Days', memberIndex: 0), new Schema(id: 'com.amazonaws.s3#RestoreRequest$GlacierJobParameters', type: ShapeType::Structure, memberName: 'GlacierJobParameters', memberIndex: 1, targetClass: GlacierJobParameters::class), new Schema(id: 'com.amazonaws.s3#RestoreRequest$Type', type: ShapeType::Enum, memberName: 'Type', memberIndex: 2, targetClass: RestoreRequestType::class), new Schema(id: 'com.amazonaws.s3#RestoreRequest$Tier', type: ShapeType::Enum, memberName: 'Tier', memberIndex: 3, targetClass: Tier::class), new Schema(id: 'com.amazonaws.s3#RestoreRequest$Description', type: ShapeType::String_, memberName: 'Description', memberIndex: 4), new Schema(id: 'com.amazonaws.s3#RestoreRequest$SelectParameters', type: ShapeType::Structure, memberName: 'SelectParameters', memberIndex: 5, targetClass: SelectParameters::class), new Schema(id: 'com.amazonaws.s3#RestoreRequest$OutputLocation', type: ShapeType::Structure, memberName: 'OutputLocation', memberIndex: 6, targetClass: OutputLocation::class)], traits: [0 => 'RestoreRequest', 7 => true], targetClass: RestoreRequest::class),
                new Schema(id: 'com.amazonaws.s3#RestoreObjectRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 4, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#RestoreObjectRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 5, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#RestoreObjectRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 6, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: RestoreObjectRequest::class
        );
    }

    public static function restoreRequest(): Schema
    {
        if (isset(self::$RestoreRequest)) {
            return self::$RestoreRequest;
        }

        return self::$RestoreRequest = new Schema(
            id: 'com.amazonaws.s3#RestoreRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RestoreRequest$Days', type: ShapeType::Integer, memberName: 'Days', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#RestoreRequest$GlacierJobParameters', type: ShapeType::Structure, memberName: 'GlacierJobParameters', memberIndex: 1, members: self::glacierJobParameters()->getMembers(), targetClass: GlacierJobParameters::class),
                new Schema(id: 'com.amazonaws.s3#RestoreRequest$Type', type: ShapeType::Enum, memberName: 'Type', memberIndex: 2, targetClass: RestoreRequestType::class),
                new Schema(id: 'com.amazonaws.s3#RestoreRequest$Tier', type: ShapeType::Enum, memberName: 'Tier', memberIndex: 3, targetClass: Tier::class),
                new Schema(id: 'com.amazonaws.s3#RestoreRequest$Description', type: ShapeType::String_, memberName: 'Description', memberIndex: 4),
                new Schema(id: 'com.amazonaws.s3#RestoreRequest$SelectParameters', type: ShapeType::Structure, memberName: 'SelectParameters', memberIndex: 5, members: [new Schema(id: 'com.amazonaws.s3#SelectParameters$InputSerialization', type: ShapeType::Structure, memberName: 'InputSerialization', memberIndex: 0, traits: [14 => true], targetClass: InputSerialization::class), new Schema(id: 'com.amazonaws.s3#SelectParameters$ExpressionType', type: ShapeType::Enum, memberName: 'ExpressionType', memberIndex: 1, traits: [14 => true], targetClass: ExpressionType::class), new Schema(id: 'com.amazonaws.s3#SelectParameters$Expression', type: ShapeType::String_, memberName: 'Expression', memberIndex: 2, traits: [14 => true]), new Schema(id: 'com.amazonaws.s3#SelectParameters$OutputSerialization', type: ShapeType::Structure, memberName: 'OutputSerialization', memberIndex: 3, traits: [14 => true], targetClass: OutputSerialization::class)], targetClass: SelectParameters::class),
                new Schema(id: 'com.amazonaws.s3#RestoreRequest$OutputLocation', type: ShapeType::Structure, memberName: 'OutputLocation', memberIndex: 6, members: [new Schema(id: 'com.amazonaws.s3#OutputLocation$S3', type: ShapeType::Structure, memberName: 'S3', memberIndex: 0, targetClass: S3Location::class)], targetClass: OutputLocation::class)
            ],
            targetClass: RestoreRequest::class
        );
    }

    public static function restoreStatus(): Schema
    {
        if (isset(self::$RestoreStatus)) {
            return self::$RestoreStatus;
        }

        return self::$RestoreStatus = new Schema(
            id: 'com.amazonaws.s3#RestoreStatus',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RestoreStatus$IsRestoreInProgress', type: ShapeType::Boolean, memberName: 'IsRestoreInProgress', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#RestoreStatus$RestoreExpiryDate', type: ShapeType::Timestamp, memberName: 'RestoreExpiryDate', memberIndex: 1)
            ],
            targetClass: RestoreStatus::class
        );
    }

    public static function routingRule(): Schema
    {
        if (isset(self::$RoutingRule)) {
            return self::$RoutingRule;
        }

        return self::$RoutingRule = new Schema(
            id: 'com.amazonaws.s3#RoutingRule',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#RoutingRule$Redirect', type: ShapeType::Structure, memberName: 'Redirect', memberIndex: 0, members: self::redirect()->getMembers(), traits: [14 => true], targetClass: Redirect::class),
                new Schema(id: 'com.amazonaws.s3#RoutingRule$Condition', type: ShapeType::Structure, memberName: 'Condition', memberIndex: 1, members: self::condition()->getMembers(), targetClass: Condition::class)
            ],
            targetClass: RoutingRule::class
        );
    }

    public static function s3KeyFilter(): Schema
    {
        if (isset(self::$S3KeyFilter)) {
            return self::$S3KeyFilter;
        }

        return self::$S3KeyFilter = new Schema(
            id: 'com.amazonaws.s3#S3KeyFilter',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#S3KeyFilter$FilterRules', type: ShapeType::List_, memberName: 'FilterRules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#FilterRuleList$member'] ??= new Schema(id: 'com.amazonaws.s3#FilterRuleList$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::filterRule()->getMembers(), targetClass: FilterRule::class), traits: [0 => 'FilterRule', 3 => true])
            ],
            targetClass: S3KeyFilter::class
        );
    }

    public static function s3Location(): Schema
    {
        if (isset(self::$S3Location)) {
            return self::$S3Location;
        }

        return self::$S3Location = new Schema(
            id: 'com.amazonaws.s3#S3Location',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#S3Location$BucketName', type: ShapeType::String_, memberName: 'BucketName', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#S3Location$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 1, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#S3Location$Encryption', type: ShapeType::Structure, memberName: 'Encryption', memberIndex: 2, members: self::encryption()->getMembers(), targetClass: Encryption::class),
                new Schema(id: 'com.amazonaws.s3#S3Location$CannedACL', type: ShapeType::Enum, memberName: 'CannedACL', memberIndex: 3, targetClass: ObjectCannedACL::class),
                new Schema(id: 'com.amazonaws.s3#S3Location$AccessControlList', type: ShapeType::List_, memberName: 'AccessControlList', memberIndex: 4, listMember: SchemasMembers::$shared['com.amazonaws.s3#Grants$member'] ??= new Schema(id: 'com.amazonaws.s3#Grants$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::grant()->getMembers(), traits: [0 => 'Grant'], targetClass: Grant::class)),
                new Schema(id: 'com.amazonaws.s3#S3Location$Tagging', type: ShapeType::Structure, memberName: 'Tagging', memberIndex: 5, members: [new Schema(id: 'com.amazonaws.s3#Tagging$TagSet', type: ShapeType::List_, memberName: 'TagSet', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [14 => true])], targetClass: Tagging::class),
                new Schema(id: 'com.amazonaws.s3#S3Location$UserMetadata', type: ShapeType::List_, memberName: 'UserMetadata', memberIndex: 6, listMember: SchemasMembers::$shared['com.amazonaws.s3#UserMetadata$member'] ??= new Schema(id: 'com.amazonaws.s3#UserMetadata$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::metadataEntry()->getMembers(), traits: [0 => 'MetadataEntry'], targetClass: MetadataEntry::class)),
                new Schema(id: 'com.amazonaws.s3#S3Location$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 7, targetClass: StorageClass::class)
            ],
            targetClass: S3Location::class
        );
    }

    public static function s3TablesDestination(): Schema
    {
        if (isset(self::$S3TablesDestination)) {
            return self::$S3TablesDestination;
        }

        return self::$S3TablesDestination = new Schema(
            id: 'com.amazonaws.s3#S3TablesDestination',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#S3TablesDestination$TableBucketArn', type: ShapeType::String_, memberName: 'TableBucketArn', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#S3TablesDestination$TableName', type: ShapeType::String_, memberName: 'TableName', memberIndex: 1, traits: [14 => true])
            ],
            targetClass: S3TablesDestination::class
        );
    }

    public static function s3TablesDestinationResult(): Schema
    {
        if (isset(self::$S3TablesDestinationResult)) {
            return self::$S3TablesDestinationResult;
        }

        return self::$S3TablesDestinationResult = new Schema(
            id: 'com.amazonaws.s3#S3TablesDestinationResult',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#S3TablesDestinationResult$TableBucketArn', type: ShapeType::String_, memberName: 'TableBucketArn', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#S3TablesDestinationResult$TableName', type: ShapeType::String_, memberName: 'TableName', memberIndex: 1, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#S3TablesDestinationResult$TableArn', type: ShapeType::String_, memberName: 'TableArn', memberIndex: 2, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#S3TablesDestinationResult$TableNamespace', type: ShapeType::String_, memberName: 'TableNamespace', memberIndex: 3, traits: [14 => true])
            ],
            targetClass: S3TablesDestinationResult::class
        );
    }

    public static function sSEKMS(): Schema
    {
        if (isset(self::$SSEKMS)) {
            return self::$SSEKMS;
        }

        return self::$SSEKMS = new Schema(
            id: 'com.amazonaws.s3#SSEKMS',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#SSEKMS$KeyId', type: ShapeType::String_, memberName: 'KeyId', memberIndex: 0, traits: [14 => true, 20 => true])
            ], traits: [0 => 'SSE-KMS'],
            targetClass: SSEKMS::class
        );
    }

    public static function sSEKMSEncryption(): Schema
    {
        if (isset(self::$SSEKMSEncryption)) {
            return self::$SSEKMSEncryption;
        }

        return self::$SSEKMSEncryption = new Schema(
            id: 'com.amazonaws.s3#SSEKMSEncryption',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#SSEKMSEncryption$KMSKeyArn', type: ShapeType::String_, memberName: 'KMSKeyArn', memberIndex: 0, traits: [14 => true, 20 => true]),
                new Schema(id: 'com.amazonaws.s3#SSEKMSEncryption$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 1)
            ], traits: [0 => 'SSE-KMS'],
            targetClass: SSEKMSEncryption::class
        );
    }

    public static function sSES3(): Schema
    {
        if (isset(self::$SSES3)) {
            return self::$SSES3;
        }

        return self::$SSES3 = new Schema(
            id: 'com.amazonaws.s3#SSES3',
            type: ShapeType::Structure,
            members: [
            ], traits: [0 => 'SSE-S3'],
            targetClass: SSES3::class
        );
    }

    public static function scanRange(): Schema
    {
        if (isset(self::$ScanRange)) {
            return self::$ScanRange;
        }

        return self::$ScanRange = new Schema(
            id: 'com.amazonaws.s3#ScanRange',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ScanRange$Start', type: ShapeType::Long, memberName: 'Start', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#ScanRange$End', type: ShapeType::Long, memberName: 'End', memberIndex: 1)
            ],
            targetClass: ScanRange::class
        );
    }

    public static function selectObjectContentOutput(): Schema
    {
        if (isset(self::$SelectObjectContentOutput)) {
            return self::$SelectObjectContentOutput;
        }

        return self::$SelectObjectContentOutput = new Schema(
            id: 'com.amazonaws.s3#SelectObjectContentOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentOutput$Payload', type: ShapeType::Union, memberName: 'Payload', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#SelectObjectContentEventStream$Records', type: ShapeType::Structure, memberName: 'Records', memberIndex: 0, targetClass: RecordsEvent::class), new Schema(id: 'com.amazonaws.s3#SelectObjectContentEventStream$Stats', type: ShapeType::Structure, memberName: 'Stats', memberIndex: 1, targetClass: StatsEvent::class), new Schema(id: 'com.amazonaws.s3#SelectObjectContentEventStream$Progress', type: ShapeType::Structure, memberName: 'Progress', memberIndex: 2, targetClass: ProgressEvent::class), new Schema(id: 'com.amazonaws.s3#SelectObjectContentEventStream$Cont', type: ShapeType::Structure, memberName: 'Cont', memberIndex: 3, targetClass: ContinuationEvent::class), new Schema(id: 'com.amazonaws.s3#SelectObjectContentEventStream$End', type: ShapeType::Structure, memberName: 'End', memberIndex: 4, targetClass: EndEvent::class)], traits: [7 => true, 16 => true], targetClass: SelectObjectContentEventStream::class)
            ],
            targetClass: SelectObjectContentOutput::class
        );
    }

    public static function selectObjectContentRequest(): Schema
    {
        if (isset(self::$SelectObjectContentRequest)) {
            return self::$SelectObjectContentRequest;
        }

        return self::$SelectObjectContentRequest = new Schema(
            id: 'com.amazonaws.s3#SelectObjectContentRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$Expression', type: ShapeType::String_, memberName: 'Expression', memberIndex: 2, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$ExpressionType', type: ShapeType::Enum, memberName: 'ExpressionType', memberIndex: 3, traits: [14 => true], targetClass: ExpressionType::class),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$InputSerialization', type: ShapeType::Structure, memberName: 'InputSerialization', memberIndex: 4, members: self::inputSerialization()->getMembers(), traits: [14 => true], targetClass: InputSerialization::class),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$OutputSerialization', type: ShapeType::Structure, memberName: 'OutputSerialization', memberIndex: 5, members: [new Schema(id: 'com.amazonaws.s3#OutputSerialization$CSV', type: ShapeType::Structure, memberName: 'CSV', memberIndex: 0, targetClass: CSVOutput::class), new Schema(id: 'com.amazonaws.s3#OutputSerialization$JSON', type: ShapeType::Structure, memberName: 'JSON', memberIndex: 1, targetClass: JSONOutput::class)], traits: [14 => true], targetClass: OutputSerialization::class),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 6, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 7, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 8, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$RequestProgress', type: ShapeType::Structure, memberName: 'RequestProgress', memberIndex: 9, members: self::requestProgress()->getMembers(), targetClass: RequestProgress::class),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$ScanRange', type: ShapeType::Structure, memberName: 'ScanRange', memberIndex: 10, members: self::scanRange()->getMembers(), targetClass: ScanRange::class),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 11, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: SelectObjectContentRequest::class
        );
    }

    public static function selectParameters(): Schema
    {
        if (isset(self::$SelectParameters)) {
            return self::$SelectParameters;
        }

        return self::$SelectParameters = new Schema(
            id: 'com.amazonaws.s3#SelectParameters',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#SelectParameters$InputSerialization', type: ShapeType::Structure, memberName: 'InputSerialization', memberIndex: 0, members: self::inputSerialization()->getMembers(), traits: [14 => true], targetClass: InputSerialization::class),
                new Schema(id: 'com.amazonaws.s3#SelectParameters$ExpressionType', type: ShapeType::Enum, memberName: 'ExpressionType', memberIndex: 1, traits: [14 => true], targetClass: ExpressionType::class),
                new Schema(id: 'com.amazonaws.s3#SelectParameters$Expression', type: ShapeType::String_, memberName: 'Expression', memberIndex: 2, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#SelectParameters$OutputSerialization', type: ShapeType::Structure, memberName: 'OutputSerialization', memberIndex: 3, members: [new Schema(id: 'com.amazonaws.s3#OutputSerialization$CSV', type: ShapeType::Structure, memberName: 'CSV', memberIndex: 0, targetClass: CSVOutput::class), new Schema(id: 'com.amazonaws.s3#OutputSerialization$JSON', type: ShapeType::Structure, memberName: 'JSON', memberIndex: 1, targetClass: JSONOutput::class)], traits: [14 => true], targetClass: OutputSerialization::class)
            ],
            targetClass: SelectParameters::class
        );
    }

    public static function serverSideEncryptionByDefault(): Schema
    {
        if (isset(self::$ServerSideEncryptionByDefault)) {
            return self::$ServerSideEncryptionByDefault;
        }

        return self::$ServerSideEncryptionByDefault = new Schema(
            id: 'com.amazonaws.s3#ServerSideEncryptionByDefault',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionByDefault$SSEAlgorithm', type: ShapeType::Enum, memberName: 'SSEAlgorithm', memberIndex: 0, traits: [14 => true], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionByDefault$KMSMasterKeyID', type: ShapeType::String_, memberName: 'KMSMasterKeyID', memberIndex: 1, traits: [20 => true])
            ],
            targetClass: ServerSideEncryptionByDefault::class
        );
    }

    public static function serverSideEncryptionConfiguration(): Schema
    {
        if (isset(self::$ServerSideEncryptionConfiguration)) {
            return self::$ServerSideEncryptionConfiguration;
        }

        return self::$ServerSideEncryptionConfiguration = new Schema(
            id: 'com.amazonaws.s3#ServerSideEncryptionConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionConfiguration$Rules', type: ShapeType::List_, memberName: 'Rules', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#ServerSideEncryptionRules$member'] ??= new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::serverSideEncryptionRule()->getMembers(), targetClass: ServerSideEncryptionRule::class), traits: [0 => 'Rule', 3 => true, 14 => true])
            ],
            targetClass: ServerSideEncryptionConfiguration::class
        );
    }

    public static function serverSideEncryptionRule(): Schema
    {
        if (isset(self::$ServerSideEncryptionRule)) {
            return self::$ServerSideEncryptionRule;
        }

        return self::$ServerSideEncryptionRule = new Schema(
            id: 'com.amazonaws.s3#ServerSideEncryptionRule',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionRule$ApplyServerSideEncryptionByDefault', type: ShapeType::Structure, memberName: 'ApplyServerSideEncryptionByDefault', memberIndex: 0, members: self::serverSideEncryptionByDefault()->getMembers(), targetClass: ServerSideEncryptionByDefault::class),
                new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionRule$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#ServerSideEncryptionRule$BlockedEncryptionTypes', type: ShapeType::Structure, memberName: 'BlockedEncryptionTypes', memberIndex: 2, members: self::blockedEncryptionTypes()->getMembers(), targetClass: BlockedEncryptionTypes::class)
            ],
            targetClass: ServerSideEncryptionRule::class
        );
    }

    public static function sessionCredentials(): Schema
    {
        if (isset(self::$SessionCredentials)) {
            return self::$SessionCredentials;
        }

        return self::$SessionCredentials = new Schema(
            id: 'com.amazonaws.s3#SessionCredentials',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#SessionCredentials$AccessKeyId', type: ShapeType::String_, memberName: 'AccessKeyId', memberIndex: 0, traits: [0 => 'AccessKeyId', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#SessionCredentials$SecretAccessKey', type: ShapeType::String_, memberName: 'SecretAccessKey', memberIndex: 1, traits: [0 => 'SecretAccessKey', 14 => true, 20 => true]),
                new Schema(id: 'com.amazonaws.s3#SessionCredentials$SessionToken', type: ShapeType::String_, memberName: 'SessionToken', memberIndex: 2, traits: [0 => 'SessionToken', 14 => true, 20 => true]),
                new Schema(id: 'com.amazonaws.s3#SessionCredentials$Expiration', type: ShapeType::Timestamp, memberName: 'Expiration', memberIndex: 3, traits: [0 => 'Expiration', 14 => true])
            ],
            targetClass: SessionCredentials::class
        );
    }

    public static function simplePrefix(): Schema
    {
        if (isset(self::$SimplePrefix)) {
            return self::$SimplePrefix;
        }

        return self::$SimplePrefix = new Schema(
            id: 'com.amazonaws.s3#SimplePrefix',
            type: ShapeType::Structure,
            members: [
            ], traits: [0 => 'SimplePrefix'],
            targetClass: SimplePrefix::class
        );
    }

    public static function sourceSelectionCriteria(): Schema
    {
        if (isset(self::$SourceSelectionCriteria)) {
            return self::$SourceSelectionCriteria;
        }

        return self::$SourceSelectionCriteria = new Schema(
            id: 'com.amazonaws.s3#SourceSelectionCriteria',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#SourceSelectionCriteria$SseKmsEncryptedObjects', type: ShapeType::Structure, memberName: 'SseKmsEncryptedObjects', memberIndex: 0, members: self::sseKmsEncryptedObjects()->getMembers(), targetClass: SseKmsEncryptedObjects::class),
                new Schema(id: 'com.amazonaws.s3#SourceSelectionCriteria$ReplicaModifications', type: ShapeType::Structure, memberName: 'ReplicaModifications', memberIndex: 1, members: self::replicaModifications()->getMembers(), targetClass: ReplicaModifications::class)
            ],
            targetClass: SourceSelectionCriteria::class
        );
    }

    public static function sseKmsEncryptedObjects(): Schema
    {
        if (isset(self::$SseKmsEncryptedObjects)) {
            return self::$SseKmsEncryptedObjects;
        }

        return self::$SseKmsEncryptedObjects = new Schema(
            id: 'com.amazonaws.s3#SseKmsEncryptedObjects',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#SseKmsEncryptedObjects$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: SseKmsEncryptedObjectsStatus::class)
            ],
            targetClass: SseKmsEncryptedObjects::class
        );
    }

    public static function stats(): Schema
    {
        if (isset(self::$Stats)) {
            return self::$Stats;
        }

        return self::$Stats = new Schema(
            id: 'com.amazonaws.s3#Stats',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Stats$BytesScanned', type: ShapeType::Long, memberName: 'BytesScanned', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#Stats$BytesProcessed', type: ShapeType::Long, memberName: 'BytesProcessed', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Stats$BytesReturned', type: ShapeType::Long, memberName: 'BytesReturned', memberIndex: 2)
            ],
            targetClass: Stats::class
        );
    }

    public static function statsEvent(): Schema
    {
        if (isset(self::$StatsEvent)) {
            return self::$StatsEvent;
        }

        return self::$StatsEvent = new Schema(
            id: 'com.amazonaws.s3#StatsEvent',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#StatsEvent$Details', type: ShapeType::Structure, memberName: 'Details', memberIndex: 0, members: self::stats()->getMembers(), targetClass: Stats::class)
            ],
            targetClass: StatsEvent::class
        );
    }

    public static function storageClassAnalysis(): Schema
    {
        if (isset(self::$StorageClassAnalysis)) {
            return self::$StorageClassAnalysis;
        }

        return self::$StorageClassAnalysis = new Schema(
            id: 'com.amazonaws.s3#StorageClassAnalysis',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#StorageClassAnalysis$DataExport', type: ShapeType::Structure, memberName: 'DataExport', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#StorageClassAnalysisDataExport$OutputSchemaVersion', type: ShapeType::Enum, memberName: 'OutputSchemaVersion', memberIndex: 0, traits: [14 => true], targetClass: StorageClassAnalysisSchemaVersion::class), new Schema(id: 'com.amazonaws.s3#StorageClassAnalysisDataExport$Destination', type: ShapeType::Structure, memberName: 'Destination', memberIndex: 1, traits: [14 => true], targetClass: AnalyticsExportDestination::class)], targetClass: StorageClassAnalysisDataExport::class)
            ],
            targetClass: StorageClassAnalysis::class
        );
    }

    public static function storageClassAnalysisDataExport(): Schema
    {
        if (isset(self::$StorageClassAnalysisDataExport)) {
            return self::$StorageClassAnalysisDataExport;
        }

        return self::$StorageClassAnalysisDataExport = new Schema(
            id: 'com.amazonaws.s3#StorageClassAnalysisDataExport',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#StorageClassAnalysisDataExport$OutputSchemaVersion', type: ShapeType::Enum, memberName: 'OutputSchemaVersion', memberIndex: 0, traits: [14 => true], targetClass: StorageClassAnalysisSchemaVersion::class),
                new Schema(id: 'com.amazonaws.s3#StorageClassAnalysisDataExport$Destination', type: ShapeType::Structure, memberName: 'Destination', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#AnalyticsExportDestination$S3BucketDestination', type: ShapeType::Structure, memberName: 'S3BucketDestination', memberIndex: 0, traits: [14 => true], targetClass: AnalyticsS3BucketDestination::class)], traits: [14 => true], targetClass: AnalyticsExportDestination::class)
            ],
            targetClass: StorageClassAnalysisDataExport::class
        );
    }

    public static function tag(): Schema
    {
        if (isset(self::$Tag)) {
            return self::$Tag;
        }

        return self::$Tag = new Schema(
            id: 'com.amazonaws.s3#Tag',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Tag$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#Tag$Value', type: ShapeType::String_, memberName: 'Value', memberIndex: 1, traits: [14 => true])
            ],
            targetClass: Tag::class
        );
    }

    public static function tagging(): Schema
    {
        if (isset(self::$Tagging)) {
            return self::$Tagging;
        }

        return self::$Tagging = new Schema(
            id: 'com.amazonaws.s3#Tagging',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Tagging$TagSet', type: ShapeType::List_, memberName: 'TagSet', memberIndex: 0, listMember: SchemasMembers::$shared['com.amazonaws.s3#TagSet$member'] ??= new Schema(id: 'com.amazonaws.s3#TagSet$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: self::tag()->getMembers(), traits: [0 => 'Tag'], targetClass: Tag::class), traits: [14 => true])
            ],
            targetClass: Tagging::class
        );
    }

    public static function targetGrant(): Schema
    {
        if (isset(self::$TargetGrant)) {
            return self::$TargetGrant;
        }

        return self::$TargetGrant = new Schema(
            id: 'com.amazonaws.s3#TargetGrant',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#TargetGrant$Grantee', type: ShapeType::Structure, memberName: 'Grantee', memberIndex: 0, members: self::grantee()->getMembers(), traits: [1 => ['uri' => 'http://www.w3.org/2001/XMLSchema-instance', 'prefix' => 'xsi']], targetClass: Grantee::class),
                new Schema(id: 'com.amazonaws.s3#TargetGrant$Permission', type: ShapeType::Enum, memberName: 'Permission', memberIndex: 1, targetClass: BucketLogsPermission::class)
            ],
            targetClass: TargetGrant::class
        );
    }

    public static function targetObjectKeyFormat(): Schema
    {
        if (isset(self::$TargetObjectKeyFormat)) {
            return self::$TargetObjectKeyFormat;
        }

        return self::$TargetObjectKeyFormat = new Schema(
            id: 'com.amazonaws.s3#TargetObjectKeyFormat',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#TargetObjectKeyFormat$SimplePrefix', type: ShapeType::Structure, memberName: 'SimplePrefix', memberIndex: 0, traits: [0 => 'SimplePrefix'], targetClass: SimplePrefix::class),
                new Schema(id: 'com.amazonaws.s3#TargetObjectKeyFormat$PartitionedPrefix', type: ShapeType::Structure, memberName: 'PartitionedPrefix', memberIndex: 1, members: self::partitionedPrefix()->getMembers(), traits: [0 => 'PartitionedPrefix'], targetClass: PartitionedPrefix::class)
            ],
            targetClass: TargetObjectKeyFormat::class
        );
    }

    public static function tiering(): Schema
    {
        if (isset(self::$Tiering)) {
            return self::$Tiering;
        }

        return self::$Tiering = new Schema(
            id: 'com.amazonaws.s3#Tiering',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Tiering$Days', type: ShapeType::Integer, memberName: 'Days', memberIndex: 0, traits: [14 => true]),
                new Schema(id: 'com.amazonaws.s3#Tiering$AccessTier', type: ShapeType::Enum, memberName: 'AccessTier', memberIndex: 1, traits: [14 => true], targetClass: IntelligentTieringAccessTier::class)
            ],
            targetClass: Tiering::class
        );
    }

    public static function tooManyPartsException(): Schema
    {
        if (isset(self::$TooManyPartsException)) {
            return self::$TooManyPartsException;
        }

        return self::$TooManyPartsException = new Schema(
            id: 'com.amazonaws.s3#TooManyParts',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: TooManyPartsException::class
        );
    }

    public static function topicConfiguration(): Schema
    {
        if (isset(self::$TopicConfiguration)) {
            return self::$TopicConfiguration;
        }

        return self::$TopicConfiguration = new Schema(
            id: 'com.amazonaws.s3#TopicConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#TopicConfiguration$TopicArn', type: ShapeType::String_, memberName: 'TopicArn', memberIndex: 0, traits: [0 => 'Topic', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#TopicConfiguration$Events', type: ShapeType::List_, memberName: 'Events', memberIndex: 1, listMember: SchemasMembers::$shared['com.amazonaws.s3#EventList$member'] ??= new Schema(id: 'com.amazonaws.s3#EventList$member', type: ShapeType::Enum, memberName: 'member', memberIndex: 0, targetClass: Event::class), traits: [0 => 'Event', 3 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#TopicConfiguration$Id', type: ShapeType::String_, memberName: 'Id', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#TopicConfiguration$Filter', type: ShapeType::Structure, memberName: 'Filter', memberIndex: 3, members: [new Schema(id: 'com.amazonaws.s3#NotificationConfigurationFilter$Key', type: ShapeType::Structure, memberName: 'Key', memberIndex: 0, traits: [0 => 'S3Key'], targetClass: S3KeyFilter::class)], targetClass: NotificationConfigurationFilter::class)
            ],
            targetClass: TopicConfiguration::class
        );
    }

    public static function transition(): Schema
    {
        if (isset(self::$Transition)) {
            return self::$Transition;
        }

        return self::$Transition = new Schema(
            id: 'com.amazonaws.s3#Transition',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#Transition$Date', type: ShapeType::Timestamp, memberName: 'Date', memberIndex: 0, traits: [4 => 'date-time']),
                new Schema(id: 'com.amazonaws.s3#Transition$Days', type: ShapeType::Integer, memberName: 'Days', memberIndex: 1),
                new Schema(id: 'com.amazonaws.s3#Transition$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 2, targetClass: TransitionStorageClass::class)
            ],
            targetClass: Transition::class
        );
    }

    public static function unsupportedMediaTypeException(): Schema
    {
        if (isset(self::$UnsupportedMediaTypeException)) {
            return self::$UnsupportedMediaTypeException;
        }

        return self::$UnsupportedMediaTypeException = new Schema(
            id: 'com.amazonaws.s3#UnsupportedMediaType',
            type: ShapeType::Structure,
            members: [
            ], traits: [23 => 'client'],
            targetClass: UnsupportedMediaTypeException::class
        );
    }

    public static function updateBucketMetadataAnnotationTableConfigurationRequest(): Schema
    {
        if (isset(self::$UpdateBucketMetadataAnnotationTableConfigurationRequest)) {
            return self::$UpdateBucketMetadataAnnotationTableConfigurationRequest;
        }

        return self::$UpdateBucketMetadataAnnotationTableConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#UpdateBucketMetadataAnnotationTableConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataAnnotationTableConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataAnnotationTableConfigurationRequest$AnnotationTableConfiguration', type: ShapeType::Structure, memberName: 'AnnotationTableConfiguration', memberIndex: 1, members: self::annotationTableConfigurationUpdates()->getMembers(), traits: [0 => 'AnnotationTableConfiguration', 7 => true, 14 => true], targetClass: AnnotationTableConfigurationUpdates::class),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataAnnotationTableConfigurationRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataAnnotationTableConfigurationRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataAnnotationTableConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: UpdateBucketMetadataAnnotationTableConfigurationRequest::class
        );
    }

    public static function updateBucketMetadataInventoryTableConfigurationRequest(): Schema
    {
        if (isset(self::$UpdateBucketMetadataInventoryTableConfigurationRequest)) {
            return self::$UpdateBucketMetadataInventoryTableConfigurationRequest;
        }

        return self::$UpdateBucketMetadataInventoryTableConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#UpdateBucketMetadataInventoryTableConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataInventoryTableConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataInventoryTableConfigurationRequest$InventoryTableConfiguration', type: ShapeType::Structure, memberName: 'InventoryTableConfiguration', memberIndex: 1, members: self::inventoryTableConfigurationUpdates()->getMembers(), traits: [0 => 'InventoryTableConfiguration', 7 => true, 14 => true], targetClass: InventoryTableConfigurationUpdates::class),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataInventoryTableConfigurationRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataInventoryTableConfigurationRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataInventoryTableConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: UpdateBucketMetadataInventoryTableConfigurationRequest::class
        );
    }

    public static function updateBucketMetadataJournalTableConfigurationRequest(): Schema
    {
        if (isset(self::$UpdateBucketMetadataJournalTableConfigurationRequest)) {
            return self::$UpdateBucketMetadataJournalTableConfigurationRequest;
        }

        return self::$UpdateBucketMetadataJournalTableConfigurationRequest = new Schema(
            id: 'com.amazonaws.s3#UpdateBucketMetadataJournalTableConfigurationRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataJournalTableConfigurationRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataJournalTableConfigurationRequest$JournalTableConfiguration', type: ShapeType::Structure, memberName: 'JournalTableConfiguration', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#JournalTableConfigurationUpdates$RecordExpiration', type: ShapeType::Structure, memberName: 'RecordExpiration', memberIndex: 0, traits: [14 => true], targetClass: RecordExpiration::class)], traits: [0 => 'JournalTableConfiguration', 7 => true, 14 => true], targetClass: JournalTableConfigurationUpdates::class),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataJournalTableConfigurationRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 2, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataJournalTableConfigurationRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#UpdateBucketMetadataJournalTableConfigurationRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 4, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: UpdateBucketMetadataJournalTableConfigurationRequest::class
        );
    }

    public static function updateObjectEncryptionRequest(): Schema
    {
        if (isset(self::$UpdateObjectEncryptionRequest)) {
            return self::$UpdateObjectEncryptionRequest;
        }

        return self::$UpdateObjectEncryptionRequest = new Schema(
            id: 'com.amazonaws.s3#UpdateObjectEncryptionRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#UpdateObjectEncryptionRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#UpdateObjectEncryptionRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#UpdateObjectEncryptionRequest$ObjectEncryption', type: ShapeType::Union, memberName: 'ObjectEncryption', memberIndex: 2, members: [new Schema(id: 'com.amazonaws.s3#ObjectEncryption$SSEKMS', type: ShapeType::Structure, memberName: 'SSEKMS', memberIndex: 0, traits: [0 => 'SSE-KMS'], targetClass: SSEKMSEncryption::class)], traits: [7 => true, 14 => true], targetClass: ObjectEncryption::class),
                new Schema(id: 'com.amazonaws.s3#UpdateObjectEncryptionRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 3, traits: [9 => 'versionId']),
                new Schema(id: 'com.amazonaws.s3#UpdateObjectEncryptionRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 4, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#UpdateObjectEncryptionRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 5, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#UpdateObjectEncryptionRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 6, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#UpdateObjectEncryptionRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 7, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class)
            ],
            targetClass: UpdateObjectEncryptionRequest::class
        );
    }

    public static function updateObjectEncryptionResponse(): Schema
    {
        if (isset(self::$UpdateObjectEncryptionResponse)) {
            return self::$UpdateObjectEncryptionResponse;
        }

        return self::$UpdateObjectEncryptionResponse = new Schema(
            id: 'com.amazonaws.s3#UpdateObjectEncryptionResponse',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#UpdateObjectEncryptionResponse$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 0, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class)
            ],
            targetClass: UpdateObjectEncryptionResponse::class
        );
    }

    public static function uploadPartCopyOutput(): Schema
    {
        if (isset(self::$UploadPartCopyOutput)) {
            return self::$UploadPartCopyOutput;
        }

        return self::$UploadPartCopyOutput = new Schema(
            id: 'com.amazonaws.s3#UploadPartCopyOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyOutput$CopySourceVersionId', type: ShapeType::String_, memberName: 'CopySourceVersionId', memberIndex: 0, traits: [5 => 'x-amz-copy-source-version-id']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyOutput$CopyPartResult', type: ShapeType::Structure, memberName: 'CopyPartResult', memberIndex: 1, members: self::copyPartResult()->getMembers(), traits: [7 => true], targetClass: CopyPartResult::class),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 2, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyOutput$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 3, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyOutput$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 4, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyOutput$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 5, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyOutput$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 6, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 7, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 8, traits: [5 => 'x-amz-version-id'])
            ],
            targetClass: UploadPartCopyOutput::class
        );
    }

    public static function uploadPartCopyRequest(): Schema
    {
        if (isset(self::$UploadPartCopyRequest)) {
            return self::$UploadPartCopyRequest;
        }

        return self::$UploadPartCopyRequest = new Schema(
            id: 'com.amazonaws.s3#UploadPartCopyRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$CopySource', type: ShapeType::String_, memberName: 'CopySource', memberIndex: 1, traits: [5 => 'x-amz-copy-source', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 2, traits: [6 => true, 14 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$PartNumber', type: ShapeType::Integer, memberName: 'PartNumber', memberIndex: 3, traits: [9 => 'partNumber', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$UploadId', type: ShapeType::String_, memberName: 'UploadId', memberIndex: 4, traits: [9 => 'uploadId', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$CopySourceIfMatch', type: ShapeType::String_, memberName: 'CopySourceIfMatch', memberIndex: 5, traits: [5 => 'x-amz-copy-source-if-match']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$CopySourceIfModifiedSince', type: ShapeType::Timestamp, memberName: 'CopySourceIfModifiedSince', memberIndex: 6, traits: [5 => 'x-amz-copy-source-if-modified-since']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$CopySourceIfNoneMatch', type: ShapeType::String_, memberName: 'CopySourceIfNoneMatch', memberIndex: 7, traits: [5 => 'x-amz-copy-source-if-none-match']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$CopySourceIfUnmodifiedSince', type: ShapeType::Timestamp, memberName: 'CopySourceIfUnmodifiedSince', memberIndex: 8, traits: [5 => 'x-amz-copy-source-if-unmodified-since']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$CopySourceRange', type: ShapeType::String_, memberName: 'CopySourceRange', memberIndex: 9, traits: [5 => 'x-amz-copy-source-range']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 10, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 11, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 12, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$CopySourceSSECustomerAlgorithm', type: ShapeType::String_, memberName: 'CopySourceSSECustomerAlgorithm', memberIndex: 13, traits: [5 => 'x-amz-copy-source-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$CopySourceSSECustomerKey', type: ShapeType::String_, memberName: 'CopySourceSSECustomerKey', memberIndex: 14, traits: [5 => 'x-amz-copy-source-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$CopySourceSSECustomerKeyMD5', type: ShapeType::String_, memberName: 'CopySourceSSECustomerKeyMD5', memberIndex: 15, traits: [5 => 'x-amz-copy-source-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 16, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 17, traits: [5 => 'x-amz-expected-bucket-owner']),
                new Schema(id: 'com.amazonaws.s3#UploadPartCopyRequest$ExpectedSourceBucketOwner', type: ShapeType::String_, memberName: 'ExpectedSourceBucketOwner', memberIndex: 18, traits: [5 => 'x-amz-source-expected-bucket-owner'])
            ],
            targetClass: UploadPartCopyRequest::class
        );
    }

    public static function uploadPartOutput(): Schema
    {
        if (isset(self::$UploadPartOutput)) {
            return self::$UploadPartOutput;
        }

        return self::$UploadPartOutput = new Schema(
            id: 'com.amazonaws.s3#UploadPartOutput',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 0, traits: [5 => 'x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 1, traits: [5 => 'ETag']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 2, traits: [5 => 'x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 3, traits: [5 => 'x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 4, traits: [5 => 'x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 5, traits: [5 => 'x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 6, traits: [5 => 'x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 7, traits: [5 => 'x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 8, traits: [5 => 'x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 9, traits: [5 => 'x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 10, traits: [5 => 'x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 11, traits: [5 => 'x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 12, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 13, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 14, traits: [5 => 'x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 15, traits: [5 => 'x-amz-server-side-encryption-bucket-key-enabled']),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 16, traits: [5 => 'x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#UploadPartOutput$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 17, traits: [5 => 'x-amz-version-id'])
            ],
            targetClass: UploadPartOutput::class
        );
    }

    public static function uploadPartRequest(): Schema
    {
        if (isset(self::$UploadPartRequest)) {
            return self::$UploadPartRequest;
        }

        return self::$UploadPartRequest = new Schema(
            id: 'com.amazonaws.s3#UploadPartRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$Bucket', type: ShapeType::String_, memberName: 'Bucket', memberIndex: 0, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Bucket']]),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$Key', type: ShapeType::String_, memberName: 'Key', memberIndex: 1, traits: [6 => true, 14 => true], directTraitsById: ['smithy.rules#contextParam' => ['name' => 'Key']]),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$PartNumber', type: ShapeType::Integer, memberName: 'PartNumber', memberIndex: 2, traits: [9 => 'partNumber', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$UploadId', type: ShapeType::String_, memberName: 'UploadId', memberIndex: 3, traits: [9 => 'uploadId', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$Body', type: ShapeType::Blob, memberName: 'Body', memberIndex: 4, traits: [7 => true, 16 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ContentLength', type: ShapeType::Long, memberName: 'ContentLength', memberIndex: 5, traits: [5 => 'Content-Length']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ContentMD5', type: ShapeType::String_, memberName: 'ContentMD5', memberIndex: 6, traits: [5 => 'Content-MD5']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumAlgorithm', type: ShapeType::Enum, memberName: 'ChecksumAlgorithm', memberIndex: 7, traits: [5 => 'x-amz-sdk-checksum-algorithm'], targetClass: ChecksumAlgorithm::class),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 8, traits: [5 => 'x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 9, traits: [5 => 'x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 10, traits: [5 => 'x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 11, traits: [5 => 'x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 12, traits: [5 => 'x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 13, traits: [5 => 'x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 14, traits: [5 => 'x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 15, traits: [5 => 'x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 16, traits: [5 => 'x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 17, traits: [5 => 'x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 18, traits: [5 => 'x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$SSECustomerKey', type: ShapeType::String_, memberName: 'SSECustomerKey', memberIndex: 19, traits: [5 => 'x-amz-server-side-encryption-customer-key', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 20, traits: [5 => 'x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$RequestPayer', type: ShapeType::Enum, memberName: 'RequestPayer', memberIndex: 21, traits: [5 => 'x-amz-request-payer'], targetClass: RequestPayer::class),
                new Schema(id: 'com.amazonaws.s3#UploadPartRequest$ExpectedBucketOwner', type: ShapeType::String_, memberName: 'ExpectedBucketOwner', memberIndex: 22, traits: [5 => 'x-amz-expected-bucket-owner'])
            ],
            targetClass: UploadPartRequest::class
        );
    }

    public static function useSourceMultiRegionKey(): Schema
    {
        if (isset(self::$UseSourceMultiRegionKey)) {
            return self::$UseSourceMultiRegionKey;
        }

        return self::$UseSourceMultiRegionKey = new Schema(
            id: 'com.amazonaws.s3#UseSourceMultiRegionKey',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#UseSourceMultiRegionKey$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 0, traits: [14 => true], targetClass: UseSourceMultiRegionKeyStatus::class)
            ],
            targetClass: UseSourceMultiRegionKey::class
        );
    }

    public static function versioningConfiguration(): Schema
    {
        if (isset(self::$VersioningConfiguration)) {
            return self::$VersioningConfiguration;
        }

        return self::$VersioningConfiguration = new Schema(
            id: 'com.amazonaws.s3#VersioningConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#VersioningConfiguration$MFADelete', type: ShapeType::Enum, memberName: 'MFADelete', memberIndex: 0, traits: [0 => 'MfaDelete'], targetClass: MFADelete::class),
                new Schema(id: 'com.amazonaws.s3#VersioningConfiguration$Status', type: ShapeType::Enum, memberName: 'Status', memberIndex: 1, targetClass: BucketVersioningStatus::class)
            ],
            targetClass: VersioningConfiguration::class
        );
    }

    public static function websiteConfiguration(): Schema
    {
        if (isset(self::$WebsiteConfiguration)) {
            return self::$WebsiteConfiguration;
        }

        return self::$WebsiteConfiguration = new Schema(
            id: 'com.amazonaws.s3#WebsiteConfiguration',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#WebsiteConfiguration$ErrorDocument', type: ShapeType::Structure, memberName: 'ErrorDocument', memberIndex: 0, members: self::errorDocument()->getMembers(), targetClass: ErrorDocument::class),
                new Schema(id: 'com.amazonaws.s3#WebsiteConfiguration$IndexDocument', type: ShapeType::Structure, memberName: 'IndexDocument', memberIndex: 1, members: self::indexDocument()->getMembers(), targetClass: IndexDocument::class),
                new Schema(id: 'com.amazonaws.s3#WebsiteConfiguration$RedirectAllRequestsTo', type: ShapeType::Structure, memberName: 'RedirectAllRequestsTo', memberIndex: 2, members: self::redirectAllRequestsTo()->getMembers(), targetClass: RedirectAllRequestsTo::class),
                new Schema(id: 'com.amazonaws.s3#WebsiteConfiguration$RoutingRules', type: ShapeType::List_, memberName: 'RoutingRules', memberIndex: 3, listMember: SchemasMembers::$shared['com.amazonaws.s3#RoutingRules$member'] ??= new Schema(id: 'com.amazonaws.s3#RoutingRules$member', type: ShapeType::Structure, memberName: 'member', memberIndex: 0, members: [new Schema(id: 'com.amazonaws.s3#RoutingRule$Redirect', type: ShapeType::Structure, memberName: 'Redirect', memberIndex: 0, traits: [14 => true], targetClass: Redirect::class), new Schema(id: 'com.amazonaws.s3#RoutingRule$Condition', type: ShapeType::Structure, memberName: 'Condition', memberIndex: 1, targetClass: Condition::class)], traits: [0 => 'RoutingRule'], targetClass: RoutingRule::class))
            ],
            targetClass: WebsiteConfiguration::class
        );
    }

    public static function writeGetObjectResponseRequest(): Schema
    {
        if (isset(self::$WriteGetObjectResponseRequest)) {
            return self::$WriteGetObjectResponseRequest;
        }

        return self::$WriteGetObjectResponseRequest = new Schema(
            id: 'com.amazonaws.s3#WriteGetObjectResponseRequest',
            type: ShapeType::Structure,
            members: [
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$RequestRoute', type: ShapeType::String_, memberName: 'RequestRoute', memberIndex: 0, traits: [5 => 'x-amz-request-route', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$RequestToken', type: ShapeType::String_, memberName: 'RequestToken', memberIndex: 1, traits: [5 => 'x-amz-request-token', 14 => true]),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$Body', type: ShapeType::Blob, memberName: 'Body', memberIndex: 2, traits: [7 => true, 16 => true]),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$StatusCode', type: ShapeType::Integer, memberName: 'StatusCode', memberIndex: 3, traits: [5 => 'x-amz-fwd-status']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ErrorCode', type: ShapeType::String_, memberName: 'ErrorCode', memberIndex: 4, traits: [5 => 'x-amz-fwd-error-code']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ErrorMessage', type: ShapeType::String_, memberName: 'ErrorMessage', memberIndex: 5, traits: [5 => 'x-amz-fwd-error-message']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$AcceptRanges', type: ShapeType::String_, memberName: 'AcceptRanges', memberIndex: 6, traits: [5 => 'x-amz-fwd-header-accept-ranges']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$CacheControl', type: ShapeType::String_, memberName: 'CacheControl', memberIndex: 7, traits: [5 => 'x-amz-fwd-header-Cache-Control']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ContentDisposition', type: ShapeType::String_, memberName: 'ContentDisposition', memberIndex: 8, traits: [5 => 'x-amz-fwd-header-Content-Disposition']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ContentEncoding', type: ShapeType::String_, memberName: 'ContentEncoding', memberIndex: 9, traits: [5 => 'x-amz-fwd-header-Content-Encoding']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ContentLanguage', type: ShapeType::String_, memberName: 'ContentLanguage', memberIndex: 10, traits: [5 => 'x-amz-fwd-header-Content-Language']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ContentLength', type: ShapeType::Long, memberName: 'ContentLength', memberIndex: 11, traits: [5 => 'Content-Length']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ContentRange', type: ShapeType::String_, memberName: 'ContentRange', memberIndex: 12, traits: [5 => 'x-amz-fwd-header-Content-Range']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ContentType', type: ShapeType::String_, memberName: 'ContentType', memberIndex: 13, traits: [5 => 'x-amz-fwd-header-Content-Type']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ChecksumCRC32', type: ShapeType::String_, memberName: 'ChecksumCRC32', memberIndex: 14, traits: [5 => 'x-amz-fwd-header-x-amz-checksum-crc32']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ChecksumCRC32C', type: ShapeType::String_, memberName: 'ChecksumCRC32C', memberIndex: 15, traits: [5 => 'x-amz-fwd-header-x-amz-checksum-crc32c']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ChecksumCRC64NVME', type: ShapeType::String_, memberName: 'ChecksumCRC64NVME', memberIndex: 16, traits: [5 => 'x-amz-fwd-header-x-amz-checksum-crc64nvme']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ChecksumSHA1', type: ShapeType::String_, memberName: 'ChecksumSHA1', memberIndex: 17, traits: [5 => 'x-amz-fwd-header-x-amz-checksum-sha1']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ChecksumSHA256', type: ShapeType::String_, memberName: 'ChecksumSHA256', memberIndex: 18, traits: [5 => 'x-amz-fwd-header-x-amz-checksum-sha256']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ChecksumSHA512', type: ShapeType::String_, memberName: 'ChecksumSHA512', memberIndex: 19, traits: [5 => 'x-amz-fwd-header-x-amz-checksum-sha512']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ChecksumMD5', type: ShapeType::String_, memberName: 'ChecksumMD5', memberIndex: 20, traits: [5 => 'x-amz-fwd-header-x-amz-checksum-md5']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ChecksumXXHASH64', type: ShapeType::String_, memberName: 'ChecksumXXHASH64', memberIndex: 21, traits: [5 => 'x-amz-fwd-header-x-amz-checksum-xxhash64']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ChecksumXXHASH3', type: ShapeType::String_, memberName: 'ChecksumXXHASH3', memberIndex: 22, traits: [5 => 'x-amz-fwd-header-x-amz-checksum-xxhash3']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ChecksumXXHASH128', type: ShapeType::String_, memberName: 'ChecksumXXHASH128', memberIndex: 23, traits: [5 => 'x-amz-fwd-header-x-amz-checksum-xxhash128']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$DeleteMarker', type: ShapeType::Boolean, memberName: 'DeleteMarker', memberIndex: 24, traits: [5 => 'x-amz-fwd-header-x-amz-delete-marker']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ETag', type: ShapeType::String_, memberName: 'ETag', memberIndex: 25, traits: [5 => 'x-amz-fwd-header-ETag']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$Expires', type: ShapeType::String_, memberName: 'Expires', memberIndex: 26, traits: [5 => 'x-amz-fwd-header-Expires']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$Expiration', type: ShapeType::String_, memberName: 'Expiration', memberIndex: 27, traits: [5 => 'x-amz-fwd-header-x-amz-expiration']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$LastModified', type: ShapeType::Timestamp, memberName: 'LastModified', memberIndex: 28, traits: [5 => 'x-amz-fwd-header-Last-Modified']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$MissingMeta', type: ShapeType::Integer, memberName: 'MissingMeta', memberIndex: 29, traits: [5 => 'x-amz-fwd-header-x-amz-missing-meta']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$Metadata', type: ShapeType::Map, memberName: 'Metadata', memberIndex: 30, mapKey: SchemasMembers::$shared['com.amazonaws.s3#Metadata$key'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$key', type: ShapeType::String_, memberName: 'key', memberIndex: 0), mapValue: SchemasMembers::$shared['com.amazonaws.s3#Metadata$value'] ??= new Schema(id: 'com.amazonaws.s3#Metadata$value', type: ShapeType::String_, memberName: 'value', memberIndex: 1), traits: [8 => 'x-amz-meta-']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ObjectLockMode', type: ShapeType::Enum, memberName: 'ObjectLockMode', memberIndex: 31, traits: [5 => 'x-amz-fwd-header-x-amz-object-lock-mode'], targetClass: ObjectLockMode::class),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ObjectLockLegalHoldStatus', type: ShapeType::Enum, memberName: 'ObjectLockLegalHoldStatus', memberIndex: 32, traits: [5 => 'x-amz-fwd-header-x-amz-object-lock-legal-hold'], targetClass: ObjectLockLegalHoldStatus::class),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ObjectLockRetainUntilDate', type: ShapeType::Timestamp, memberName: 'ObjectLockRetainUntilDate', memberIndex: 33, traits: [4 => 'date-time', 5 => 'x-amz-fwd-header-x-amz-object-lock-retain-until-date']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$PartsCount', type: ShapeType::Integer, memberName: 'PartsCount', memberIndex: 34, traits: [5 => 'x-amz-fwd-header-x-amz-mp-parts-count']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ReplicationStatus', type: ShapeType::Enum, memberName: 'ReplicationStatus', memberIndex: 35, traits: [5 => 'x-amz-fwd-header-x-amz-replication-status'], targetClass: ReplicationStatus::class),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$RequestCharged', type: ShapeType::Enum, memberName: 'RequestCharged', memberIndex: 36, traits: [5 => 'x-amz-fwd-header-x-amz-request-charged'], targetClass: RequestCharged::class),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$Restore', type: ShapeType::String_, memberName: 'Restore', memberIndex: 37, traits: [5 => 'x-amz-fwd-header-x-amz-restore']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$ServerSideEncryption', type: ShapeType::Enum, memberName: 'ServerSideEncryption', memberIndex: 38, traits: [5 => 'x-amz-fwd-header-x-amz-server-side-encryption'], targetClass: ServerSideEncryption::class),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$SSECustomerAlgorithm', type: ShapeType::String_, memberName: 'SSECustomerAlgorithm', memberIndex: 39, traits: [5 => 'x-amz-fwd-header-x-amz-server-side-encryption-customer-algorithm']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$SSEKMSKeyId', type: ShapeType::String_, memberName: 'SSEKMSKeyId', memberIndex: 40, traits: [5 => 'x-amz-fwd-header-x-amz-server-side-encryption-aws-kms-key-id', 20 => true]),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$SSECustomerKeyMD5', type: ShapeType::String_, memberName: 'SSECustomerKeyMD5', memberIndex: 41, traits: [5 => 'x-amz-fwd-header-x-amz-server-side-encryption-customer-key-MD5']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$StorageClass', type: ShapeType::Enum, memberName: 'StorageClass', memberIndex: 42, traits: [5 => 'x-amz-fwd-header-x-amz-storage-class'], targetClass: StorageClass::class),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$TagCount', type: ShapeType::Integer, memberName: 'TagCount', memberIndex: 43, traits: [5 => 'x-amz-fwd-header-x-amz-tagging-count']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$VersionId', type: ShapeType::String_, memberName: 'VersionId', memberIndex: 44, traits: [5 => 'x-amz-fwd-header-x-amz-version-id']),
                new Schema(id: 'com.amazonaws.s3#WriteGetObjectResponseRequest$BucketKeyEnabled', type: ShapeType::Boolean, memberName: 'BucketKeyEnabled', memberIndex: 45, traits: [5 => 'x-amz-fwd-header-x-amz-server-side-encryption-bucket-key-enabled'])
            ],
            targetClass: WriteGetObjectResponseRequest::class
        );
    }

    public static function analyticsFilter(): Schema
    {
        if (isset(self::$AnalyticsFilter)) {
            return self::$AnalyticsFilter;
        }

        return self::$AnalyticsFilter = new Schema(
            id: 'com.amazonaws.s3#AnalyticsFilter',
            type: ShapeType::Union,
            members: [
                new Schema(id: 'com.amazonaws.s3#AnalyticsFilter$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#AnalyticsFilter$Tag', type: ShapeType::Structure, memberName: 'Tag', memberIndex: 1, members: self::tag()->getMembers(), targetClass: Tag::class),
                new Schema(id: 'com.amazonaws.s3#AnalyticsFilter$And', type: ShapeType::Structure, memberName: 'And', memberIndex: 2, members: self::analyticsAndOperator()->getMembers(), targetClass: AnalyticsAndOperator::class)
            ],
            targetClass: AnalyticsFilter::class
        );
    }

    public static function metricsFilter(): Schema
    {
        if (isset(self::$MetricsFilter)) {
            return self::$MetricsFilter;
        }

        return self::$MetricsFilter = new Schema(
            id: 'com.amazonaws.s3#MetricsFilter',
            type: ShapeType::Union,
            members: [
                new Schema(id: 'com.amazonaws.s3#MetricsFilter$Prefix', type: ShapeType::String_, memberName: 'Prefix', memberIndex: 0),
                new Schema(id: 'com.amazonaws.s3#MetricsFilter$Tag', type: ShapeType::Structure, memberName: 'Tag', memberIndex: 1, members: self::tag()->getMembers(), targetClass: Tag::class),
                new Schema(id: 'com.amazonaws.s3#MetricsFilter$AccessPointArn', type: ShapeType::String_, memberName: 'AccessPointArn', memberIndex: 2),
                new Schema(id: 'com.amazonaws.s3#MetricsFilter$And', type: ShapeType::Structure, memberName: 'And', memberIndex: 3, members: self::metricsAndOperator()->getMembers(), targetClass: MetricsAndOperator::class)
            ],
            targetClass: MetricsFilter::class
        );
    }

    public static function objectEncryption(): Schema
    {
        if (isset(self::$ObjectEncryption)) {
            return self::$ObjectEncryption;
        }

        return self::$ObjectEncryption = new Schema(
            id: 'com.amazonaws.s3#ObjectEncryption',
            type: ShapeType::Union,
            members: [
                new Schema(id: 'com.amazonaws.s3#ObjectEncryption$SSEKMS', type: ShapeType::Structure, memberName: 'SSEKMS', memberIndex: 0, members: self::sSEKMSEncryption()->getMembers(), traits: [0 => 'SSE-KMS'], targetClass: SSEKMSEncryption::class)
            ],
            targetClass: ObjectEncryption::class
        );
    }

    public static function selectObjectContentEventStream(): Schema
    {
        if (isset(self::$SelectObjectContentEventStream)) {
            return self::$SelectObjectContentEventStream;
        }

        return self::$SelectObjectContentEventStream = new Schema(
            id: 'com.amazonaws.s3#SelectObjectContentEventStream',
            type: ShapeType::Union,
            members: [
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentEventStream$Records', type: ShapeType::Structure, memberName: 'Records', memberIndex: 0, members: self::recordsEvent()->getMembers(), targetClass: RecordsEvent::class),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentEventStream$Stats', type: ShapeType::Structure, memberName: 'Stats', memberIndex: 1, members: [new Schema(id: 'com.amazonaws.s3#StatsEvent$Details', type: ShapeType::Structure, memberName: 'Details', memberIndex: 0, targetClass: Stats::class)], targetClass: StatsEvent::class),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentEventStream$Progress', type: ShapeType::Structure, memberName: 'Progress', memberIndex: 2, members: [new Schema(id: 'com.amazonaws.s3#ProgressEvent$Details', type: ShapeType::Structure, memberName: 'Details', memberIndex: 0, targetClass: Progress::class)], targetClass: ProgressEvent::class),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentEventStream$Cont', type: ShapeType::Structure, memberName: 'Cont', memberIndex: 3, targetClass: ContinuationEvent::class),
                new Schema(id: 'com.amazonaws.s3#SelectObjectContentEventStream$End', type: ShapeType::Structure, memberName: 'End', memberIndex: 4, targetClass: EndEvent::class)
            ],
            targetClass: SelectObjectContentEventStream::class
        );
    }

    public static function analyticsS3ExportFileFormat(): Schema
    {
        if (isset(self::$AnalyticsS3ExportFileFormat)) {
            return self::$AnalyticsS3ExportFileFormat;
        }

        return self::$AnalyticsS3ExportFileFormat = new Schema(
            id: 'com.amazonaws.s3#AnalyticsS3ExportFileFormat',
            type: ShapeType::Enum,
            targetClass: AnalyticsS3ExportFileFormat::class
        );
    }

    public static function annotationConfigurationState(): Schema
    {
        if (isset(self::$AnnotationConfigurationState)) {
            return self::$AnnotationConfigurationState;
        }

        return self::$AnnotationConfigurationState = new Schema(
            id: 'com.amazonaws.s3#AnnotationConfigurationState',
            type: ShapeType::Enum,
            targetClass: AnnotationConfigurationState::class
        );
    }

    public static function annotationDirective(): Schema
    {
        if (isset(self::$AnnotationDirective)) {
            return self::$AnnotationDirective;
        }

        return self::$AnnotationDirective = new Schema(
            id: 'com.amazonaws.s3#AnnotationDirective',
            type: ShapeType::Enum,
            targetClass: AnnotationDirective::class
        );
    }

    public static function archiveStatus(): Schema
    {
        if (isset(self::$ArchiveStatus)) {
            return self::$ArchiveStatus;
        }

        return self::$ArchiveStatus = new Schema(
            id: 'com.amazonaws.s3#ArchiveStatus',
            type: ShapeType::Enum,
            targetClass: ArchiveStatus::class
        );
    }

    public static function bucketAbacStatus(): Schema
    {
        if (isset(self::$BucketAbacStatus)) {
            return self::$BucketAbacStatus;
        }

        return self::$BucketAbacStatus = new Schema(
            id: 'com.amazonaws.s3#BucketAbacStatus',
            type: ShapeType::Enum,
            targetClass: BucketAbacStatus::class
        );
    }

    public static function bucketAccelerateStatus(): Schema
    {
        if (isset(self::$BucketAccelerateStatus)) {
            return self::$BucketAccelerateStatus;
        }

        return self::$BucketAccelerateStatus = new Schema(
            id: 'com.amazonaws.s3#BucketAccelerateStatus',
            type: ShapeType::Enum,
            targetClass: BucketAccelerateStatus::class
        );
    }

    public static function bucketCannedACL(): Schema
    {
        if (isset(self::$BucketCannedACL)) {
            return self::$BucketCannedACL;
        }

        return self::$BucketCannedACL = new Schema(
            id: 'com.amazonaws.s3#BucketCannedACL',
            type: ShapeType::Enum,
            targetClass: BucketCannedACL::class
        );
    }

    public static function bucketLocationConstraint(): Schema
    {
        if (isset(self::$BucketLocationConstraint)) {
            return self::$BucketLocationConstraint;
        }

        return self::$BucketLocationConstraint = new Schema(
            id: 'com.amazonaws.s3#BucketLocationConstraint',
            type: ShapeType::Enum,
            targetClass: BucketLocationConstraint::class
        );
    }

    public static function bucketLogsPermission(): Schema
    {
        if (isset(self::$BucketLogsPermission)) {
            return self::$BucketLogsPermission;
        }

        return self::$BucketLogsPermission = new Schema(
            id: 'com.amazonaws.s3#BucketLogsPermission',
            type: ShapeType::Enum,
            targetClass: BucketLogsPermission::class
        );
    }

    public static function bucketNamespace(): Schema
    {
        if (isset(self::$BucketNamespace)) {
            return self::$BucketNamespace;
        }

        return self::$BucketNamespace = new Schema(
            id: 'com.amazonaws.s3#BucketNamespace',
            type: ShapeType::Enum,
            targetClass: BucketNamespace::class
        );
    }

    public static function bucketType(): Schema
    {
        if (isset(self::$BucketType)) {
            return self::$BucketType;
        }

        return self::$BucketType = new Schema(
            id: 'com.amazonaws.s3#BucketType',
            type: ShapeType::Enum,
            targetClass: BucketType::class
        );
    }

    public static function bucketVersioningStatus(): Schema
    {
        if (isset(self::$BucketVersioningStatus)) {
            return self::$BucketVersioningStatus;
        }

        return self::$BucketVersioningStatus = new Schema(
            id: 'com.amazonaws.s3#BucketVersioningStatus',
            type: ShapeType::Enum,
            targetClass: BucketVersioningStatus::class
        );
    }

    public static function checksumAlgorithm(): Schema
    {
        if (isset(self::$ChecksumAlgorithm)) {
            return self::$ChecksumAlgorithm;
        }

        return self::$ChecksumAlgorithm = new Schema(
            id: 'com.amazonaws.s3#ChecksumAlgorithm',
            type: ShapeType::Enum,
            targetClass: ChecksumAlgorithm::class
        );
    }

    public static function checksumMode(): Schema
    {
        if (isset(self::$ChecksumMode)) {
            return self::$ChecksumMode;
        }

        return self::$ChecksumMode = new Schema(
            id: 'com.amazonaws.s3#ChecksumMode',
            type: ShapeType::Enum,
            targetClass: ChecksumMode::class
        );
    }

    public static function checksumType(): Schema
    {
        if (isset(self::$ChecksumType)) {
            return self::$ChecksumType;
        }

        return self::$ChecksumType = new Schema(
            id: 'com.amazonaws.s3#ChecksumType',
            type: ShapeType::Enum,
            targetClass: ChecksumType::class
        );
    }

    public static function compressionType(): Schema
    {
        if (isset(self::$CompressionType)) {
            return self::$CompressionType;
        }

        return self::$CompressionType = new Schema(
            id: 'com.amazonaws.s3#CompressionType',
            type: ShapeType::Enum,
            targetClass: CompressionType::class
        );
    }

    public static function dataRedundancy(): Schema
    {
        if (isset(self::$DataRedundancy)) {
            return self::$DataRedundancy;
        }

        return self::$DataRedundancy = new Schema(
            id: 'com.amazonaws.s3#DataRedundancy',
            type: ShapeType::Enum,
            targetClass: DataRedundancy::class
        );
    }

    public static function deleteMarkerReplicationStatus(): Schema
    {
        if (isset(self::$DeleteMarkerReplicationStatus)) {
            return self::$DeleteMarkerReplicationStatus;
        }

        return self::$DeleteMarkerReplicationStatus = new Schema(
            id: 'com.amazonaws.s3#DeleteMarkerReplicationStatus',
            type: ShapeType::Enum,
            targetClass: DeleteMarkerReplicationStatus::class
        );
    }

    public static function encodingType(): Schema
    {
        if (isset(self::$EncodingType)) {
            return self::$EncodingType;
        }

        return self::$EncodingType = new Schema(
            id: 'com.amazonaws.s3#EncodingType',
            type: ShapeType::Enum,
            targetClass: EncodingType::class
        );
    }

    public static function encryptionType(): Schema
    {
        if (isset(self::$EncryptionType)) {
            return self::$EncryptionType;
        }

        return self::$EncryptionType = new Schema(
            id: 'com.amazonaws.s3#EncryptionType',
            type: ShapeType::Enum,
            targetClass: EncryptionType::class
        );
    }

    public static function event(): Schema
    {
        if (isset(self::$Event)) {
            return self::$Event;
        }

        return self::$Event = new Schema(
            id: 'com.amazonaws.s3#Event',
            type: ShapeType::Enum,
            targetClass: Event::class
        );
    }

    public static function existingObjectReplicationStatus(): Schema
    {
        if (isset(self::$ExistingObjectReplicationStatus)) {
            return self::$ExistingObjectReplicationStatus;
        }

        return self::$ExistingObjectReplicationStatus = new Schema(
            id: 'com.amazonaws.s3#ExistingObjectReplicationStatus',
            type: ShapeType::Enum,
            targetClass: ExistingObjectReplicationStatus::class
        );
    }

    public static function expirationState(): Schema
    {
        if (isset(self::$ExpirationState)) {
            return self::$ExpirationState;
        }

        return self::$ExpirationState = new Schema(
            id: 'com.amazonaws.s3#ExpirationState',
            type: ShapeType::Enum,
            targetClass: ExpirationState::class
        );
    }

    public static function expirationStatus(): Schema
    {
        if (isset(self::$ExpirationStatus)) {
            return self::$ExpirationStatus;
        }

        return self::$ExpirationStatus = new Schema(
            id: 'com.amazonaws.s3#ExpirationStatus',
            type: ShapeType::Enum,
            targetClass: ExpirationStatus::class
        );
    }

    public static function expressionType(): Schema
    {
        if (isset(self::$ExpressionType)) {
            return self::$ExpressionType;
        }

        return self::$ExpressionType = new Schema(
            id: 'com.amazonaws.s3#ExpressionType',
            type: ShapeType::Enum,
            targetClass: ExpressionType::class
        );
    }

    public static function fileHeaderInfo(): Schema
    {
        if (isset(self::$FileHeaderInfo)) {
            return self::$FileHeaderInfo;
        }

        return self::$FileHeaderInfo = new Schema(
            id: 'com.amazonaws.s3#FileHeaderInfo',
            type: ShapeType::Enum,
            targetClass: FileHeaderInfo::class
        );
    }

    public static function filterRuleName(): Schema
    {
        if (isset(self::$FilterRuleName)) {
            return self::$FilterRuleName;
        }

        return self::$FilterRuleName = new Schema(
            id: 'com.amazonaws.s3#FilterRuleName',
            type: ShapeType::Enum,
            targetClass: FilterRuleName::class
        );
    }

    public static function intelligentTieringAccessTier(): Schema
    {
        if (isset(self::$IntelligentTieringAccessTier)) {
            return self::$IntelligentTieringAccessTier;
        }

        return self::$IntelligentTieringAccessTier = new Schema(
            id: 'com.amazonaws.s3#IntelligentTieringAccessTier',
            type: ShapeType::Enum,
            targetClass: IntelligentTieringAccessTier::class
        );
    }

    public static function intelligentTieringStatus(): Schema
    {
        if (isset(self::$IntelligentTieringStatus)) {
            return self::$IntelligentTieringStatus;
        }

        return self::$IntelligentTieringStatus = new Schema(
            id: 'com.amazonaws.s3#IntelligentTieringStatus',
            type: ShapeType::Enum,
            targetClass: IntelligentTieringStatus::class
        );
    }

    public static function inventoryConfigurationState(): Schema
    {
        if (isset(self::$InventoryConfigurationState)) {
            return self::$InventoryConfigurationState;
        }

        return self::$InventoryConfigurationState = new Schema(
            id: 'com.amazonaws.s3#InventoryConfigurationState',
            type: ShapeType::Enum,
            targetClass: InventoryConfigurationState::class
        );
    }

    public static function inventoryFormat(): Schema
    {
        if (isset(self::$InventoryFormat)) {
            return self::$InventoryFormat;
        }

        return self::$InventoryFormat = new Schema(
            id: 'com.amazonaws.s3#InventoryFormat',
            type: ShapeType::Enum,
            targetClass: InventoryFormat::class
        );
    }

    public static function inventoryFrequency(): Schema
    {
        if (isset(self::$InventoryFrequency)) {
            return self::$InventoryFrequency;
        }

        return self::$InventoryFrequency = new Schema(
            id: 'com.amazonaws.s3#InventoryFrequency',
            type: ShapeType::Enum,
            targetClass: InventoryFrequency::class
        );
    }

    public static function inventoryIncludedObjectVersions(): Schema
    {
        if (isset(self::$InventoryIncludedObjectVersions)) {
            return self::$InventoryIncludedObjectVersions;
        }

        return self::$InventoryIncludedObjectVersions = new Schema(
            id: 'com.amazonaws.s3#InventoryIncludedObjectVersions',
            type: ShapeType::Enum,
            targetClass: InventoryIncludedObjectVersions::class
        );
    }

    public static function inventoryOptionalField(): Schema
    {
        if (isset(self::$InventoryOptionalField)) {
            return self::$InventoryOptionalField;
        }

        return self::$InventoryOptionalField = new Schema(
            id: 'com.amazonaws.s3#InventoryOptionalField',
            type: ShapeType::Enum,
            targetClass: InventoryOptionalField::class
        );
    }

    public static function jSONType(): Schema
    {
        if (isset(self::$JSONType)) {
            return self::$JSONType;
        }

        return self::$JSONType = new Schema(
            id: 'com.amazonaws.s3#JSONType',
            type: ShapeType::Enum,
            targetClass: JSONType::class
        );
    }

    public static function locationType(): Schema
    {
        if (isset(self::$LocationType)) {
            return self::$LocationType;
        }

        return self::$LocationType = new Schema(
            id: 'com.amazonaws.s3#LocationType',
            type: ShapeType::Enum,
            targetClass: LocationType::class
        );
    }

    public static function mFADelete(): Schema
    {
        if (isset(self::$MFADelete)) {
            return self::$MFADelete;
        }

        return self::$MFADelete = new Schema(
            id: 'com.amazonaws.s3#MFADelete',
            type: ShapeType::Enum,
            targetClass: MFADelete::class
        );
    }

    public static function mFADeleteStatus(): Schema
    {
        if (isset(self::$MFADeleteStatus)) {
            return self::$MFADeleteStatus;
        }

        return self::$MFADeleteStatus = new Schema(
            id: 'com.amazonaws.s3#MFADeleteStatus',
            type: ShapeType::Enum,
            targetClass: MFADeleteStatus::class
        );
    }

    public static function metadataDirective(): Schema
    {
        if (isset(self::$MetadataDirective)) {
            return self::$MetadataDirective;
        }

        return self::$MetadataDirective = new Schema(
            id: 'com.amazonaws.s3#MetadataDirective',
            type: ShapeType::Enum,
            targetClass: MetadataDirective::class
        );
    }

    public static function metricsStatus(): Schema
    {
        if (isset(self::$MetricsStatus)) {
            return self::$MetricsStatus;
        }

        return self::$MetricsStatus = new Schema(
            id: 'com.amazonaws.s3#MetricsStatus',
            type: ShapeType::Enum,
            targetClass: MetricsStatus::class
        );
    }

    public static function objectAttributes(): Schema
    {
        if (isset(self::$ObjectAttributes)) {
            return self::$ObjectAttributes;
        }

        return self::$ObjectAttributes = new Schema(
            id: 'com.amazonaws.s3#ObjectAttributes',
            type: ShapeType::Enum,
            targetClass: ObjectAttributes::class
        );
    }

    public static function objectCannedACL(): Schema
    {
        if (isset(self::$ObjectCannedACL)) {
            return self::$ObjectCannedACL;
        }

        return self::$ObjectCannedACL = new Schema(
            id: 'com.amazonaws.s3#ObjectCannedACL',
            type: ShapeType::Enum,
            targetClass: ObjectCannedACL::class
        );
    }

    public static function objectLockEnabled(): Schema
    {
        if (isset(self::$ObjectLockEnabled)) {
            return self::$ObjectLockEnabled;
        }

        return self::$ObjectLockEnabled = new Schema(
            id: 'com.amazonaws.s3#ObjectLockEnabled',
            type: ShapeType::Enum,
            targetClass: ObjectLockEnabled::class
        );
    }

    public static function objectLockEventHold(): Schema
    {
        if (isset(self::$ObjectLockEventHold)) {
            return self::$ObjectLockEventHold;
        }

        return self::$ObjectLockEventHold = new Schema(
            id: 'com.amazonaws.s3#ObjectLockEventHold',
            type: ShapeType::Enum,
            targetClass: ObjectLockEventHold::class
        );
    }

    public static function objectLockLegalHoldStatus(): Schema
    {
        if (isset(self::$ObjectLockLegalHoldStatus)) {
            return self::$ObjectLockLegalHoldStatus;
        }

        return self::$ObjectLockLegalHoldStatus = new Schema(
            id: 'com.amazonaws.s3#ObjectLockLegalHoldStatus',
            type: ShapeType::Enum,
            targetClass: ObjectLockLegalHoldStatus::class
        );
    }

    public static function objectLockMode(): Schema
    {
        if (isset(self::$ObjectLockMode)) {
            return self::$ObjectLockMode;
        }

        return self::$ObjectLockMode = new Schema(
            id: 'com.amazonaws.s3#ObjectLockMode',
            type: ShapeType::Enum,
            targetClass: ObjectLockMode::class
        );
    }

    public static function objectLockRetentionMode(): Schema
    {
        if (isset(self::$ObjectLockRetentionMode)) {
            return self::$ObjectLockRetentionMode;
        }

        return self::$ObjectLockRetentionMode = new Schema(
            id: 'com.amazonaws.s3#ObjectLockRetentionMode',
            type: ShapeType::Enum,
            targetClass: ObjectLockRetentionMode::class
        );
    }

    public static function objectOwnership(): Schema
    {
        if (isset(self::$ObjectOwnership)) {
            return self::$ObjectOwnership;
        }

        return self::$ObjectOwnership = new Schema(
            id: 'com.amazonaws.s3#ObjectOwnership',
            type: ShapeType::Enum,
            targetClass: ObjectOwnership::class
        );
    }

    public static function objectStorageClass(): Schema
    {
        if (isset(self::$ObjectStorageClass)) {
            return self::$ObjectStorageClass;
        }

        return self::$ObjectStorageClass = new Schema(
            id: 'com.amazonaws.s3#ObjectStorageClass',
            type: ShapeType::Enum,
            targetClass: ObjectStorageClass::class
        );
    }

    public static function objectVersionStorageClass(): Schema
    {
        if (isset(self::$ObjectVersionStorageClass)) {
            return self::$ObjectVersionStorageClass;
        }

        return self::$ObjectVersionStorageClass = new Schema(
            id: 'com.amazonaws.s3#ObjectVersionStorageClass',
            type: ShapeType::Enum,
            targetClass: ObjectVersionStorageClass::class
        );
    }

    public static function optionalObjectAttributes(): Schema
    {
        if (isset(self::$OptionalObjectAttributes)) {
            return self::$OptionalObjectAttributes;
        }

        return self::$OptionalObjectAttributes = new Schema(
            id: 'com.amazonaws.s3#OptionalObjectAttributes',
            type: ShapeType::Enum,
            targetClass: OptionalObjectAttributes::class
        );
    }

    public static function ownerOverride(): Schema
    {
        if (isset(self::$OwnerOverride)) {
            return self::$OwnerOverride;
        }

        return self::$OwnerOverride = new Schema(
            id: 'com.amazonaws.s3#OwnerOverride',
            type: ShapeType::Enum,
            targetClass: OwnerOverride::class
        );
    }

    public static function partitionDateSource(): Schema
    {
        if (isset(self::$PartitionDateSource)) {
            return self::$PartitionDateSource;
        }

        return self::$PartitionDateSource = new Schema(
            id: 'com.amazonaws.s3#PartitionDateSource',
            type: ShapeType::Enum,
            targetClass: PartitionDateSource::class
        );
    }

    public static function payer(): Schema
    {
        if (isset(self::$Payer)) {
            return self::$Payer;
        }

        return self::$Payer = new Schema(
            id: 'com.amazonaws.s3#Payer',
            type: ShapeType::Enum,
            targetClass: Payer::class
        );
    }

    public static function permission(): Schema
    {
        if (isset(self::$Permission)) {
            return self::$Permission;
        }

        return self::$Permission = new Schema(
            id: 'com.amazonaws.s3#Permission',
            type: ShapeType::Enum,
            targetClass: Permission::class
        );
    }

    public static function protocol(): Schema
    {
        if (isset(self::$Protocol)) {
            return self::$Protocol;
        }

        return self::$Protocol = new Schema(
            id: 'com.amazonaws.s3#Protocol',
            type: ShapeType::Enum,
            targetClass: Protocol::class
        );
    }

    public static function quoteFields(): Schema
    {
        if (isset(self::$QuoteFields)) {
            return self::$QuoteFields;
        }

        return self::$QuoteFields = new Schema(
            id: 'com.amazonaws.s3#QuoteFields',
            type: ShapeType::Enum,
            targetClass: QuoteFields::class
        );
    }

    public static function replicaModificationsStatus(): Schema
    {
        if (isset(self::$ReplicaModificationsStatus)) {
            return self::$ReplicaModificationsStatus;
        }

        return self::$ReplicaModificationsStatus = new Schema(
            id: 'com.amazonaws.s3#ReplicaModificationsStatus',
            type: ShapeType::Enum,
            targetClass: ReplicaModificationsStatus::class
        );
    }

    public static function replicationRuleStatus(): Schema
    {
        if (isset(self::$ReplicationRuleStatus)) {
            return self::$ReplicationRuleStatus;
        }

        return self::$ReplicationRuleStatus = new Schema(
            id: 'com.amazonaws.s3#ReplicationRuleStatus',
            type: ShapeType::Enum,
            targetClass: ReplicationRuleStatus::class
        );
    }

    public static function replicationStatus(): Schema
    {
        if (isset(self::$ReplicationStatus)) {
            return self::$ReplicationStatus;
        }

        return self::$ReplicationStatus = new Schema(
            id: 'com.amazonaws.s3#ReplicationStatus',
            type: ShapeType::Enum,
            targetClass: ReplicationStatus::class
        );
    }

    public static function replicationTimeStatus(): Schema
    {
        if (isset(self::$ReplicationTimeStatus)) {
            return self::$ReplicationTimeStatus;
        }

        return self::$ReplicationTimeStatus = new Schema(
            id: 'com.amazonaws.s3#ReplicationTimeStatus',
            type: ShapeType::Enum,
            targetClass: ReplicationTimeStatus::class
        );
    }

    public static function requestCharged(): Schema
    {
        if (isset(self::$RequestCharged)) {
            return self::$RequestCharged;
        }

        return self::$RequestCharged = new Schema(
            id: 'com.amazonaws.s3#RequestCharged',
            type: ShapeType::Enum,
            targetClass: RequestCharged::class
        );
    }

    public static function requestPayer(): Schema
    {
        if (isset(self::$RequestPayer)) {
            return self::$RequestPayer;
        }

        return self::$RequestPayer = new Schema(
            id: 'com.amazonaws.s3#RequestPayer',
            type: ShapeType::Enum,
            targetClass: RequestPayer::class
        );
    }

    public static function restoreRequestType(): Schema
    {
        if (isset(self::$RestoreRequestType)) {
            return self::$RestoreRequestType;
        }

        return self::$RestoreRequestType = new Schema(
            id: 'com.amazonaws.s3#RestoreRequestType',
            type: ShapeType::Enum,
            targetClass: RestoreRequestType::class
        );
    }

    public static function s3TablesBucketType(): Schema
    {
        if (isset(self::$S3TablesBucketType)) {
            return self::$S3TablesBucketType;
        }

        return self::$S3TablesBucketType = new Schema(
            id: 'com.amazonaws.s3#S3TablesBucketType',
            type: ShapeType::Enum,
            targetClass: S3TablesBucketType::class
        );
    }

    public static function serverSideEncryption(): Schema
    {
        if (isset(self::$ServerSideEncryption)) {
            return self::$ServerSideEncryption;
        }

        return self::$ServerSideEncryption = new Schema(
            id: 'com.amazonaws.s3#ServerSideEncryption',
            type: ShapeType::Enum,
            targetClass: ServerSideEncryption::class
        );
    }

    public static function sessionMode(): Schema
    {
        if (isset(self::$SessionMode)) {
            return self::$SessionMode;
        }

        return self::$SessionMode = new Schema(
            id: 'com.amazonaws.s3#SessionMode',
            type: ShapeType::Enum,
            targetClass: SessionMode::class
        );
    }

    public static function sseKmsEncryptedObjectsStatus(): Schema
    {
        if (isset(self::$SseKmsEncryptedObjectsStatus)) {
            return self::$SseKmsEncryptedObjectsStatus;
        }

        return self::$SseKmsEncryptedObjectsStatus = new Schema(
            id: 'com.amazonaws.s3#SseKmsEncryptedObjectsStatus',
            type: ShapeType::Enum,
            targetClass: SseKmsEncryptedObjectsStatus::class
        );
    }

    public static function storageClass(): Schema
    {
        if (isset(self::$StorageClass)) {
            return self::$StorageClass;
        }

        return self::$StorageClass = new Schema(
            id: 'com.amazonaws.s3#StorageClass',
            type: ShapeType::Enum,
            targetClass: StorageClass::class
        );
    }

    public static function storageClassAnalysisSchemaVersion(): Schema
    {
        if (isset(self::$StorageClassAnalysisSchemaVersion)) {
            return self::$StorageClassAnalysisSchemaVersion;
        }

        return self::$StorageClassAnalysisSchemaVersion = new Schema(
            id: 'com.amazonaws.s3#StorageClassAnalysisSchemaVersion',
            type: ShapeType::Enum,
            targetClass: StorageClassAnalysisSchemaVersion::class
        );
    }

    public static function tableSseAlgorithm(): Schema
    {
        if (isset(self::$TableSseAlgorithm)) {
            return self::$TableSseAlgorithm;
        }

        return self::$TableSseAlgorithm = new Schema(
            id: 'com.amazonaws.s3#TableSseAlgorithm',
            type: ShapeType::Enum,
            targetClass: TableSseAlgorithm::class
        );
    }

    public static function taggingDirective(): Schema
    {
        if (isset(self::$TaggingDirective)) {
            return self::$TaggingDirective;
        }

        return self::$TaggingDirective = new Schema(
            id: 'com.amazonaws.s3#TaggingDirective',
            type: ShapeType::Enum,
            targetClass: TaggingDirective::class
        );
    }

    public static function tier(): Schema
    {
        if (isset(self::$Tier)) {
            return self::$Tier;
        }

        return self::$Tier = new Schema(
            id: 'com.amazonaws.s3#Tier',
            type: ShapeType::Enum,
            targetClass: Tier::class
        );
    }

    public static function transitionDefaultMinimumObjectSize(): Schema
    {
        if (isset(self::$TransitionDefaultMinimumObjectSize)) {
            return self::$TransitionDefaultMinimumObjectSize;
        }

        return self::$TransitionDefaultMinimumObjectSize = new Schema(
            id: 'com.amazonaws.s3#TransitionDefaultMinimumObjectSize',
            type: ShapeType::Enum,
            targetClass: TransitionDefaultMinimumObjectSize::class
        );
    }

    public static function transitionStorageClass(): Schema
    {
        if (isset(self::$TransitionStorageClass)) {
            return self::$TransitionStorageClass;
        }

        return self::$TransitionStorageClass = new Schema(
            id: 'com.amazonaws.s3#TransitionStorageClass',
            type: ShapeType::Enum,
            targetClass: TransitionStorageClass::class
        );
    }

    public static function type(): Schema
    {
        if (isset(self::$Type)) {
            return self::$Type;
        }

        return self::$Type = new Schema(
            id: 'com.amazonaws.s3#Type',
            type: ShapeType::Enum,
            targetClass: Type::class
        );
    }

    public static function useSourceMultiRegionKeyStatus(): Schema
    {
        if (isset(self::$UseSourceMultiRegionKeyStatus)) {
            return self::$UseSourceMultiRegionKeyStatus;
        }

        return self::$UseSourceMultiRegionKeyStatus = new Schema(
            id: 'com.amazonaws.s3#UseSourceMultiRegionKeyStatus',
            type: ShapeType::Enum,
            targetClass: UseSourceMultiRegionKeyStatus::class
        );
    }

}

/**
 * Shared list and map member schemas for this service, keyed by member ID.
 *
 * Held here rather than on Schemas so no generated shape property can collide with it.
 */
final class SchemasMembers
{
    /** @var array<string, Schema> */
    public static array $shared = [];
}
