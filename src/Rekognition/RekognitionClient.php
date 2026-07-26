<?php
namespace Aws\Rekognition;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Rekognition** service.
 * @method \Aws\Result associateFaces(array $args = [])
 * @phpstan-method \Aws\Result associateFaces(array{
 *     CollectionId?: string,
 *     UserId?: string,
 *     FaceIds?: list<string>,
 *     UserMatchThreshold?: float,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateFacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateFacesAsync(array{
 *     CollectionId?: string,
 *     UserId?: string,
 *     FaceIds?: list<string>,
 *     UserMatchThreshold?: float,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result compareFaces(array $args = [])
 * @phpstan-method \Aws\Result compareFaces(array{
 *     SourceImage?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     TargetImage?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     SimilarityThreshold?: float,
 *     QualityFilter?: 'AUTO'|'HIGH'|'LOW'|'MEDIUM'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise compareFacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise compareFacesAsync(array{
 *     SourceImage?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     TargetImage?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     SimilarityThreshold?: float,
 *     QualityFilter?: 'AUTO'|'HIGH'|'LOW'|'MEDIUM'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyProjectVersion(array $args = [])
 * @phpstan-method \Aws\Result copyProjectVersion(array{
 *     SourceProjectArn?: string,
 *     SourceProjectVersionArn?: string,
 *     DestinationProjectArn?: string,
 *     VersionName?: string,
 *     OutputConfig?: array{S3Bucket?: string, S3KeyPrefix?: string, ...},
 *     Tags?: array<string, string>,
 *     KmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyProjectVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyProjectVersionAsync(array{
 *     SourceProjectArn?: string,
 *     SourceProjectVersionArn?: string,
 *     DestinationProjectArn?: string,
 *     VersionName?: string,
 *     OutputConfig?: array{S3Bucket?: string, S3KeyPrefix?: string, ...},
 *     Tags?: array<string, string>,
 *     KmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCollection(array $args = [])
 * @phpstan-method \Aws\Result createCollection(array{CollectionId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCollectionAsync(array{CollectionId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createDataset(array $args = [])
 * @phpstan-method \Aws\Result createDataset(array{
 *     DatasetSource?: array{GroundTruthManifest?: array{S3Object?: array, ...}, DatasetArn?: string, ...},
 *     DatasetType?: 'TEST'|'TRAIN',
 *     ProjectArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetAsync(array{
 *     DatasetSource?: array{GroundTruthManifest?: array{S3Object?: array, ...}, DatasetArn?: string, ...},
 *     DatasetType?: 'TEST'|'TRAIN',
 *     ProjectArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFaceLivenessSession(array $args = [])
 * @phpstan-method \Aws\Result createFaceLivenessSession(array{
 *     KmsKeyId?: string,
 *     Settings?: array{
 *         OutputConfig?: array{S3Bucket?: string, S3KeyPrefix?: string, ...},
 *         AuditImagesLimit?: int,
 *         ChallengePreferences?: list<array>,
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFaceLivenessSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFaceLivenessSessionAsync(array{
 *     KmsKeyId?: string,
 *     Settings?: array{
 *         OutputConfig?: array{S3Bucket?: string, S3KeyPrefix?: string, ...},
 *         AuditImagesLimit?: int,
 *         ChallengePreferences?: list<array>,
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @phpstan-method \Aws\Result createProject(array{
 *     ProjectName?: string,
 *     Feature?: 'CONTENT_MODERATION'|'CUSTOM_LABELS',
 *     AutoUpdate?: 'DISABLED'|'ENABLED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectAsync(array{
 *     ProjectName?: string,
 *     Feature?: 'CONTENT_MODERATION'|'CUSTOM_LABELS',
 *     AutoUpdate?: 'DISABLED'|'ENABLED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProjectVersion(array $args = [])
 * @phpstan-method \Aws\Result createProjectVersion(array{
 *     ProjectArn?: string,
 *     VersionName?: string,
 *     OutputConfig?: array{S3Bucket?: string, S3KeyPrefix?: string, ...},
 *     TrainingData?: array{Assets?: list<array>, ...},
 *     TestingData?: array{Assets?: list<array>, AutoCreate?: bool, ...},
 *     Tags?: array<string, string>,
 *     KmsKeyId?: string,
 *     VersionDescription?: string,
 *     FeatureConfig?: array{ContentModeration?: array{ConfidenceThreshold?: float, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectVersionAsync(array{
 *     ProjectArn?: string,
 *     VersionName?: string,
 *     OutputConfig?: array{S3Bucket?: string, S3KeyPrefix?: string, ...},
 *     TrainingData?: array{Assets?: list<array>, ...},
 *     TestingData?: array{Assets?: list<array>, AutoCreate?: bool, ...},
 *     Tags?: array<string, string>,
 *     KmsKeyId?: string,
 *     VersionDescription?: string,
 *     FeatureConfig?: array{ContentModeration?: array{ConfidenceThreshold?: float, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStreamProcessor(array $args = [])
 * @phpstan-method \Aws\Result createStreamProcessor(array{
 *     Input?: array{KinesisVideoStream?: array{Arn?: string, ...}, ...},
 *     Output?: array{
 *         KinesisDataStream?: array{Arn?: string, ...},
 *         S3Destination?: array{Bucket?: string, KeyPrefix?: string, ...},
 *         ...,
 *     },
 *     Name?: string,
 *     Settings?: array{
 *         FaceSearch?: array{CollectionId?: string, FaceMatchThreshold?: float, ...},
 *         ConnectedHome?: array{Labels?: list<string>, MinConfidence?: float, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     NotificationChannel?: array{SNSTopicArn?: string, ...},
 *     KmsKeyId?: string,
 *     RegionsOfInterest?: list<array{BoundingBox?: array, Polygon?: list<array>, ...}>,
 *     DataSharingPreference?: array{OptIn?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamProcessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamProcessorAsync(array{
 *     Input?: array{KinesisVideoStream?: array{Arn?: string, ...}, ...},
 *     Output?: array{
 *         KinesisDataStream?: array{Arn?: string, ...},
 *         S3Destination?: array{Bucket?: string, KeyPrefix?: string, ...},
 *         ...,
 *     },
 *     Name?: string,
 *     Settings?: array{
 *         FaceSearch?: array{CollectionId?: string, FaceMatchThreshold?: float, ...},
 *         ConnectedHome?: array{Labels?: list<string>, MinConfidence?: float, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     NotificationChannel?: array{SNSTopicArn?: string, ...},
 *     KmsKeyId?: string,
 *     RegionsOfInterest?: list<array{BoundingBox?: array, Polygon?: list<array>, ...}>,
 *     DataSharingPreference?: array{OptIn?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{CollectionId?: string, UserId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{CollectionId?: string, UserId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result deleteCollection(array $args = [])
 * @phpstan-method \Aws\Result deleteCollection(array{CollectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCollectionAsync(array{CollectionId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataset(array{DatasetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array{DatasetArn?: string, ...} $args = [])
 * @method \Aws\Result deleteFaces(array $args = [])
 * @phpstan-method \Aws\Result deleteFaces(array{CollectionId?: string, FaceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFacesAsync(array{CollectionId?: string, FaceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @phpstan-method \Aws\Result deleteProject(array{ProjectArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectAsync(array{ProjectArn?: string, ...} $args = [])
 * @method \Aws\Result deleteProjectPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteProjectPolicy(array{ProjectArn?: string, PolicyName?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectPolicyAsync(array{ProjectArn?: string, PolicyName?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \Aws\Result deleteProjectVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteProjectVersion(array{ProjectVersionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectVersionAsync(array{ProjectVersionArn?: string, ...} $args = [])
 * @method \Aws\Result deleteStreamProcessor(array $args = [])
 * @phpstan-method \Aws\Result deleteStreamProcessor(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStreamProcessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStreamProcessorAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{CollectionId?: string, UserId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{CollectionId?: string, UserId?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result describeCollection(array $args = [])
 * @phpstan-method \Aws\Result describeCollection(array{CollectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCollectionAsync(array{CollectionId?: string, ...} $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @phpstan-method \Aws\Result describeDataset(array{DatasetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetAsync(array{DatasetArn?: string, ...} $args = [])
 * @method \Aws\Result describeProjectVersions(array $args = [])
 * @phpstan-method \Aws\Result describeProjectVersions(array{ProjectArn?: string, VersionNames?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProjectVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProjectVersionsAsync(array{ProjectArn?: string, VersionNames?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeProjects(array $args = [])
 * @phpstan-method \Aws\Result describeProjects(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ProjectNames?: list<string>,
 *     Features?: list<'CONTENT_MODERATION'|'CUSTOM_LABELS'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProjectsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ProjectNames?: list<string>,
 *     Features?: list<'CONTENT_MODERATION'|'CUSTOM_LABELS'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeStreamProcessor(array $args = [])
 * @phpstan-method \Aws\Result describeStreamProcessor(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStreamProcessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStreamProcessorAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result detectCustomLabels(array $args = [])
 * @phpstan-method \Aws\Result detectCustomLabels(array{
 *     ProjectVersionArn?: string,
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     MinConfidence?: float,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detectCustomLabelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectCustomLabelsAsync(array{
 *     ProjectVersionArn?: string,
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     MinConfidence?: float,
 *     ...,
 * } $args = [])
 * @method \Aws\Result detectFaces(array $args = [])
 * @phpstan-method \Aws\Result detectFaces(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     Attributes?: list<'AGE_RANGE'|'ALL'|'BEARD'|'DEFAULT'|'EMOTIONS'|'EYEGLASSES'|'EYES_OPEN'|'EYE_DIRECTION'|'FACE_OCCLUDED'|'GENDER'|'MOUTH_OPEN'|'MUSTACHE'|'SMILE'|'SUNGLASSES'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detectFacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectFacesAsync(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     Attributes?: list<'AGE_RANGE'|'ALL'|'BEARD'|'DEFAULT'|'EMOTIONS'|'EYEGLASSES'|'EYES_OPEN'|'EYE_DIRECTION'|'FACE_OCCLUDED'|'GENDER'|'MOUTH_OPEN'|'MUSTACHE'|'SMILE'|'SUNGLASSES'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result detectLabels(array $args = [])
 * @phpstan-method \Aws\Result detectLabels(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     MaxLabels?: int,
 *     MinConfidence?: float,
 *     Features?: list<'GENERAL_LABELS'|'IMAGE_PROPERTIES'>,
 *     Settings?: array{
 *         GeneralLabels?: array{
 *             LabelInclusionFilters?: list<string>,
 *             LabelExclusionFilters?: list<string>,
 *             LabelCategoryInclusionFilters?: list<string>,
 *             LabelCategoryExclusionFilters?: list<string>,
 *             ...,
 *         },
 *         ImageProperties?: array{MaxDominantColors?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detectLabelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectLabelsAsync(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     MaxLabels?: int,
 *     MinConfidence?: float,
 *     Features?: list<'GENERAL_LABELS'|'IMAGE_PROPERTIES'>,
 *     Settings?: array{
 *         GeneralLabels?: array{
 *             LabelInclusionFilters?: list<string>,
 *             LabelExclusionFilters?: list<string>,
 *             LabelCategoryInclusionFilters?: list<string>,
 *             LabelCategoryExclusionFilters?: list<string>,
 *             ...,
 *         },
 *         ImageProperties?: array{MaxDominantColors?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result detectModerationLabels(array $args = [])
 * @phpstan-method \Aws\Result detectModerationLabels(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     MinConfidence?: float,
 *     HumanLoopConfig?: array{
 *         HumanLoopName?: string,
 *         FlowDefinitionArn?: string,
 *         DataAttributes?: array{ContentClassifiers?: list<'FreeOfAdultContent'|'FreeOfPersonallyIdentifiableInformation'>, ...},
 *         ...,
 *     },
 *     ProjectVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detectModerationLabelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectModerationLabelsAsync(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     MinConfidence?: float,
 *     HumanLoopConfig?: array{
 *         HumanLoopName?: string,
 *         FlowDefinitionArn?: string,
 *         DataAttributes?: array{ContentClassifiers?: list<'FreeOfAdultContent'|'FreeOfPersonallyIdentifiableInformation'>, ...},
 *         ...,
 *     },
 *     ProjectVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result detectProtectiveEquipment(array $args = [])
 * @phpstan-method \Aws\Result detectProtectiveEquipment(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     SummarizationAttributes?: array{MinConfidence?: float, RequiredEquipmentTypes?: list<'FACE_COVER'|'HAND_COVER'|'HEAD_COVER'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detectProtectiveEquipmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectProtectiveEquipmentAsync(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     SummarizationAttributes?: array{MinConfidence?: float, RequiredEquipmentTypes?: list<'FACE_COVER'|'HAND_COVER'|'HEAD_COVER'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result detectText(array $args = [])
 * @phpstan-method \Aws\Result detectText(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     Filters?: array{
 *         WordFilter?: array{MinConfidence?: float, MinBoundingBoxHeight?: float, MinBoundingBoxWidth?: float, ...},
 *         RegionsOfInterest?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detectTextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectTextAsync(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     Filters?: array{
 *         WordFilter?: array{MinConfidence?: float, MinBoundingBoxHeight?: float, MinBoundingBoxWidth?: float, ...},
 *         RegionsOfInterest?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateFaces(array $args = [])
 * @phpstan-method \Aws\Result disassociateFaces(array{CollectionId?: string, UserId?: string, ClientRequestToken?: string, FaceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFacesAsync(array{CollectionId?: string, UserId?: string, ClientRequestToken?: string, FaceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result distributeDatasetEntries(array $args = [])
 * @phpstan-method \Aws\Result distributeDatasetEntries(array{Datasets?: list<array{Arn?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise distributeDatasetEntriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise distributeDatasetEntriesAsync(array{Datasets?: list<array{Arn?: string, ...}>, ...} $args = [])
 * @method \Aws\Result getCelebrityInfo(array $args = [])
 * @phpstan-method \Aws\Result getCelebrityInfo(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCelebrityInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCelebrityInfoAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getCelebrityRecognition(array $args = [])
 * @phpstan-method \Aws\Result getCelebrityRecognition(array{JobId?: string, MaxResults?: int, NextToken?: string, SortBy?: 'ID'|'TIMESTAMP', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCelebrityRecognitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCelebrityRecognitionAsync(array{JobId?: string, MaxResults?: int, NextToken?: string, SortBy?: 'ID'|'TIMESTAMP', ...} $args = [])
 * @method \Aws\Result getContentModeration(array $args = [])
 * @phpstan-method \Aws\Result getContentModeration(array{
 *     JobId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'NAME'|'TIMESTAMP',
 *     AggregateBy?: 'SEGMENTS'|'TIMESTAMPS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getContentModerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContentModerationAsync(array{
 *     JobId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'NAME'|'TIMESTAMP',
 *     AggregateBy?: 'SEGMENTS'|'TIMESTAMPS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFaceDetection(array $args = [])
 * @phpstan-method \Aws\Result getFaceDetection(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFaceDetectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFaceDetectionAsync(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getFaceLivenessSessionResults(array $args = [])
 * @phpstan-method \Aws\Result getFaceLivenessSessionResults(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFaceLivenessSessionResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFaceLivenessSessionResultsAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result getFaceSearch(array $args = [])
 * @phpstan-method \Aws\Result getFaceSearch(array{JobId?: string, MaxResults?: int, NextToken?: string, SortBy?: 'INDEX'|'TIMESTAMP', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFaceSearchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFaceSearchAsync(array{JobId?: string, MaxResults?: int, NextToken?: string, SortBy?: 'INDEX'|'TIMESTAMP', ...} $args = [])
 * @method \Aws\Result getLabelDetection(array $args = [])
 * @phpstan-method \Aws\Result getLabelDetection(array{
 *     JobId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'NAME'|'TIMESTAMP',
 *     AggregateBy?: 'SEGMENTS'|'TIMESTAMPS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getLabelDetectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLabelDetectionAsync(array{
 *     JobId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'NAME'|'TIMESTAMP',
 *     AggregateBy?: 'SEGMENTS'|'TIMESTAMPS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMediaAnalysisJob(array $args = [])
 * @phpstan-method \Aws\Result getMediaAnalysisJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMediaAnalysisJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMediaAnalysisJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result getPersonTracking(array $args = [])
 * @phpstan-method \Aws\Result getPersonTracking(array{JobId?: string, MaxResults?: int, NextToken?: string, SortBy?: 'INDEX'|'TIMESTAMP', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPersonTrackingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPersonTrackingAsync(array{JobId?: string, MaxResults?: int, NextToken?: string, SortBy?: 'INDEX'|'TIMESTAMP', ...} $args = [])
 * @method \Aws\Result getSegmentDetection(array $args = [])
 * @phpstan-method \Aws\Result getSegmentDetection(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentDetectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentDetectionAsync(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getTextDetection(array $args = [])
 * @phpstan-method \Aws\Result getTextDetection(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTextDetectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTextDetectionAsync(array{JobId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result indexFaces(array $args = [])
 * @phpstan-method \Aws\Result indexFaces(array{
 *     CollectionId?: string,
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     ExternalImageId?: string,
 *     DetectionAttributes?: list<'AGE_RANGE'|'ALL'|'BEARD'|'DEFAULT'|'EMOTIONS'|'EYEGLASSES'|'EYES_OPEN'|'EYE_DIRECTION'|'FACE_OCCLUDED'|'GENDER'|'MOUTH_OPEN'|'MUSTACHE'|'SMILE'|'SUNGLASSES'>,
 *     MaxFaces?: int,
 *     QualityFilter?: 'AUTO'|'HIGH'|'LOW'|'MEDIUM'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise indexFacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise indexFacesAsync(array{
 *     CollectionId?: string,
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     ExternalImageId?: string,
 *     DetectionAttributes?: list<'AGE_RANGE'|'ALL'|'BEARD'|'DEFAULT'|'EMOTIONS'|'EYEGLASSES'|'EYES_OPEN'|'EYE_DIRECTION'|'FACE_OCCLUDED'|'GENDER'|'MOUTH_OPEN'|'MUSTACHE'|'SMILE'|'SUNGLASSES'>,
 *     MaxFaces?: int,
 *     QualityFilter?: 'AUTO'|'HIGH'|'LOW'|'MEDIUM'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCollections(array $args = [])
 * @phpstan-method \Aws\Result listCollections(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollectionsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDatasetEntries(array $args = [])
 * @phpstan-method \Aws\Result listDatasetEntries(array{
 *     DatasetArn?: string,
 *     ContainsLabels?: list<string>,
 *     Labeled?: bool,
 *     SourceRefContains?: string,
 *     HasErrors?: bool,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetEntriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetEntriesAsync(array{
 *     DatasetArn?: string,
 *     ContainsLabels?: list<string>,
 *     Labeled?: bool,
 *     SourceRefContains?: string,
 *     HasErrors?: bool,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDatasetLabels(array $args = [])
 * @phpstan-method \Aws\Result listDatasetLabels(array{DatasetArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetLabelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetLabelsAsync(array{DatasetArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFaces(array $args = [])
 * @phpstan-method \Aws\Result listFaces(array{
 *     CollectionId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     UserId?: string,
 *     FaceIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFacesAsync(array{
 *     CollectionId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     UserId?: string,
 *     FaceIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMediaAnalysisJobs(array $args = [])
 * @phpstan-method \Aws\Result listMediaAnalysisJobs(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMediaAnalysisJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMediaAnalysisJobsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listProjectPolicies(array $args = [])
 * @phpstan-method \Aws\Result listProjectPolicies(array{ProjectArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectPoliciesAsync(array{ProjectArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listStreamProcessors(array $args = [])
 * @phpstan-method \Aws\Result listStreamProcessors(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamProcessorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamProcessorsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{CollectionId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{CollectionId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result putProjectPolicy(array $args = [])
 * @phpstan-method \Aws\Result putProjectPolicy(array{ProjectArn?: string, PolicyName?: string, PolicyRevisionId?: string, PolicyDocument?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putProjectPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putProjectPolicyAsync(array{ProjectArn?: string, PolicyName?: string, PolicyRevisionId?: string, PolicyDocument?: string, ...} $args = [])
 * @method \Aws\Result recognizeCelebrities(array $args = [])
 * @phpstan-method \Aws\Result recognizeCelebrities(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise recognizeCelebritiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise recognizeCelebritiesAsync(array{
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchFaces(array $args = [])
 * @phpstan-method \Aws\Result searchFaces(array{CollectionId?: string, FaceId?: string, MaxFaces?: int, FaceMatchThreshold?: float, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise searchFacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchFacesAsync(array{CollectionId?: string, FaceId?: string, MaxFaces?: int, FaceMatchThreshold?: float, ...} $args = [])
 * @method \Aws\Result searchFacesByImage(array $args = [])
 * @phpstan-method \Aws\Result searchFacesByImage(array{
 *     CollectionId?: string,
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     MaxFaces?: int,
 *     FaceMatchThreshold?: float,
 *     QualityFilter?: 'AUTO'|'HIGH'|'LOW'|'MEDIUM'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchFacesByImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchFacesByImageAsync(array{
 *     CollectionId?: string,
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     MaxFaces?: int,
 *     FaceMatchThreshold?: float,
 *     QualityFilter?: 'AUTO'|'HIGH'|'LOW'|'MEDIUM'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchUsers(array $args = [])
 * @phpstan-method \Aws\Result searchUsers(array{
 *     CollectionId?: string,
 *     UserId?: string,
 *     FaceId?: string,
 *     UserMatchThreshold?: float,
 *     MaxUsers?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchUsersAsync(array{
 *     CollectionId?: string,
 *     UserId?: string,
 *     FaceId?: string,
 *     UserMatchThreshold?: float,
 *     MaxUsers?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchUsersByImage(array $args = [])
 * @phpstan-method \Aws\Result searchUsersByImage(array{
 *     CollectionId?: string,
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     UserMatchThreshold?: float,
 *     MaxUsers?: int,
 *     QualityFilter?: 'AUTO'|'HIGH'|'LOW'|'MEDIUM'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchUsersByImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchUsersByImageAsync(array{
 *     CollectionId?: string,
 *     Image?: array{
 *         Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...},
 *         ...,
 *     },
 *     UserMatchThreshold?: float,
 *     MaxUsers?: int,
 *     QualityFilter?: 'AUTO'|'HIGH'|'LOW'|'MEDIUM'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCelebrityRecognition(array $args = [])
 * @phpstan-method \Aws\Result startCelebrityRecognition(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCelebrityRecognitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCelebrityRecognitionAsync(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startContentModeration(array $args = [])
 * @phpstan-method \Aws\Result startContentModeration(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     MinConfidence?: float,
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startContentModerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startContentModerationAsync(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     MinConfidence?: float,
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startFaceDetection(array $args = [])
 * @phpstan-method \Aws\Result startFaceDetection(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     FaceAttributes?: 'ALL'|'DEFAULT',
 *     JobTag?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startFaceDetectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFaceDetectionAsync(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     FaceAttributes?: 'ALL'|'DEFAULT',
 *     JobTag?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startFaceSearch(array $args = [])
 * @phpstan-method \Aws\Result startFaceSearch(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     FaceMatchThreshold?: float,
 *     CollectionId?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startFaceSearchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFaceSearchAsync(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     FaceMatchThreshold?: float,
 *     CollectionId?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startLabelDetection(array $args = [])
 * @phpstan-method \Aws\Result startLabelDetection(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     MinConfidence?: float,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     Features?: list<'GENERAL_LABELS'>,
 *     Settings?: array{
 *         GeneralLabels?: array{
 *             LabelInclusionFilters?: list<string>,
 *             LabelExclusionFilters?: list<string>,
 *             LabelCategoryInclusionFilters?: list<string>,
 *             LabelCategoryExclusionFilters?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startLabelDetectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startLabelDetectionAsync(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     MinConfidence?: float,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     Features?: list<'GENERAL_LABELS'>,
 *     Settings?: array{
 *         GeneralLabels?: array{
 *             LabelInclusionFilters?: list<string>,
 *             LabelExclusionFilters?: list<string>,
 *             LabelCategoryInclusionFilters?: list<string>,
 *             LabelCategoryExclusionFilters?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMediaAnalysisJob(array $args = [])
 * @phpstan-method \Aws\Result startMediaAnalysisJob(array{
 *     ClientRequestToken?: string,
 *     JobName?: string,
 *     OperationsConfig?: array{DetectModerationLabels?: array{MinConfidence?: float, ProjectVersion?: string, ...}, ...},
 *     Input?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     OutputConfig?: array{S3Bucket?: string, S3KeyPrefix?: string, ...},
 *     KmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMediaAnalysisJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMediaAnalysisJobAsync(array{
 *     ClientRequestToken?: string,
 *     JobName?: string,
 *     OperationsConfig?: array{DetectModerationLabels?: array{MinConfidence?: float, ProjectVersion?: string, ...}, ...},
 *     Input?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     OutputConfig?: array{S3Bucket?: string, S3KeyPrefix?: string, ...},
 *     KmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startPersonTracking(array $args = [])
 * @phpstan-method \Aws\Result startPersonTracking(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startPersonTrackingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPersonTrackingAsync(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startProjectVersion(array $args = [])
 * @phpstan-method \Aws\Result startProjectVersion(array{ProjectVersionArn?: string, MinInferenceUnits?: int, MaxInferenceUnits?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startProjectVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startProjectVersionAsync(array{ProjectVersionArn?: string, MinInferenceUnits?: int, MaxInferenceUnits?: int, ...} $args = [])
 * @method \Aws\Result startSegmentDetection(array $args = [])
 * @phpstan-method \Aws\Result startSegmentDetection(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     Filters?: array{
 *         TechnicalCueFilter?: array{MinSegmentConfidence?: float, BlackFrame?: array, ...},
 *         ShotFilter?: array{MinSegmentConfidence?: float, ...},
 *         ...,
 *     },
 *     SegmentTypes?: list<'SHOT'|'TECHNICAL_CUE'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSegmentDetectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSegmentDetectionAsync(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     Filters?: array{
 *         TechnicalCueFilter?: array{MinSegmentConfidence?: float, BlackFrame?: array, ...},
 *         ShotFilter?: array{MinSegmentConfidence?: float, ...},
 *         ...,
 *     },
 *     SegmentTypes?: list<'SHOT'|'TECHNICAL_CUE'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startStreamProcessor(array $args = [])
 * @phpstan-method \Aws\Result startStreamProcessor(array{
 *     Name?: string,
 *     StartSelector?: array{KVSStreamStartSelector?: array{ProducerTimestamp?: int, FragmentNumber?: string, ...}, ...},
 *     StopSelector?: array{MaxDurationInSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startStreamProcessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startStreamProcessorAsync(array{
 *     Name?: string,
 *     StartSelector?: array{KVSStreamStartSelector?: array{ProducerTimestamp?: int, FragmentNumber?: string, ...}, ...},
 *     StopSelector?: array{MaxDurationInSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTextDetection(array $args = [])
 * @phpstan-method \Aws\Result startTextDetection(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     Filters?: array{
 *         WordFilter?: array{MinConfidence?: float, MinBoundingBoxHeight?: float, MinBoundingBoxWidth?: float, ...},
 *         RegionsOfInterest?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTextDetectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTextDetectionAsync(array{
 *     Video?: array{S3Object?: array{Bucket?: string, Name?: string, Version?: string, ...}, ...},
 *     ClientRequestToken?: string,
 *     NotificationChannel?: array{SNSTopicArn?: string, RoleArn?: string, ...},
 *     JobTag?: string,
 *     Filters?: array{
 *         WordFilter?: array{MinConfidence?: float, MinBoundingBoxHeight?: float, MinBoundingBoxWidth?: float, ...},
 *         RegionsOfInterest?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopProjectVersion(array $args = [])
 * @phpstan-method \Aws\Result stopProjectVersion(array{ProjectVersionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopProjectVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopProjectVersionAsync(array{ProjectVersionArn?: string, ...} $args = [])
 * @method \Aws\Result stopStreamProcessor(array $args = [])
 * @phpstan-method \Aws\Result stopStreamProcessor(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopStreamProcessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopStreamProcessorAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDatasetEntries(array $args = [])
 * @phpstan-method \Aws\Result updateDatasetEntries(array{
 *     DatasetArn?: string,
 *     Changes?: array{GroundTruth?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatasetEntriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatasetEntriesAsync(array{
 *     DatasetArn?: string,
 *     Changes?: array{GroundTruth?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStreamProcessor(array $args = [])
 * @phpstan-method \Aws\Result updateStreamProcessor(array{
 *     Name?: string,
 *     SettingsForUpdate?: array{ConnectedHomeForUpdate?: array{Labels?: list<string>, MinConfidence?: float, ...}, ...},
 *     RegionsOfInterestForUpdate?: list<array{BoundingBox?: array, Polygon?: list<array>, ...}>,
 *     DataSharingPreferenceForUpdate?: array{OptIn?: bool, ...},
 *     ParametersToDelete?: list<'ConnectedHomeMinConfidence'|'RegionsOfInterest'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStreamProcessorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStreamProcessorAsync(array{
 *     Name?: string,
 *     SettingsForUpdate?: array{ConnectedHomeForUpdate?: array{Labels?: list<string>, MinConfidence?: float, ...}, ...},
 *     RegionsOfInterestForUpdate?: list<array{BoundingBox?: array, Polygon?: list<array>, ...}>,
 *     DataSharingPreferenceForUpdate?: array{OptIn?: bool, ...},
 *     ParametersToDelete?: list<'ConnectedHomeMinConfidence'|'RegionsOfInterest'>,
 *     ...,
 * } $args = [])
 */
class RekognitionClient extends AwsClient {}
