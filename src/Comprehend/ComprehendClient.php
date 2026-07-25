<?php
namespace Aws\Comprehend;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Comprehend** service.
 * @method \Aws\Result batchDetectDominantLanguage(array $args = [])
 * @phpstan-method \Aws\Result batchDetectDominantLanguage(array{TextList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectDominantLanguageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDetectDominantLanguageAsync(array{TextList?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDetectEntities(array $args = [])
 * @phpstan-method \Aws\Result batchDetectEntities(array{
 *     TextList?: list<string>,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDetectEntitiesAsync(array{
 *     TextList?: list<string>,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDetectKeyPhrases(array $args = [])
 * @phpstan-method \Aws\Result batchDetectKeyPhrases(array{
 *     TextList?: list<string>,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectKeyPhrasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDetectKeyPhrasesAsync(array{
 *     TextList?: list<string>,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDetectSentiment(array $args = [])
 * @phpstan-method \Aws\Result batchDetectSentiment(array{
 *     TextList?: list<string>,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectSentimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDetectSentimentAsync(array{
 *     TextList?: list<string>,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDetectSyntax(array $args = [])
 * @phpstan-method \Aws\Result batchDetectSyntax(array{TextList?: list<string>, LanguageCode?: 'de'|'en'|'es'|'fr'|'it'|'pt', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectSyntaxAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDetectSyntaxAsync(array{TextList?: list<string>, LanguageCode?: 'de'|'en'|'es'|'fr'|'it'|'pt', ...} $args = [])
 * @method \Aws\Result batchDetectTargetedSentiment(array $args = [])
 * @phpstan-method \Aws\Result batchDetectTargetedSentiment(array{
 *     TextList?: list<string>,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectTargetedSentimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDetectTargetedSentimentAsync(array{
 *     TextList?: list<string>,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result classifyDocument(array $args = [])
 * @phpstan-method \Aws\Result classifyDocument(array{
 *     Text?: string,
 *     EndpointArn?: string,
 *     Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *     DocumentReaderConfig?: array{
 *         DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *         DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *         FeatureTypes?: list<'FORMS'|'TABLES'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise classifyDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise classifyDocumentAsync(array{
 *     Text?: string,
 *     EndpointArn?: string,
 *     Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *     DocumentReaderConfig?: array{
 *         DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *         DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *         FeatureTypes?: list<'FORMS'|'TABLES'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result containsPiiEntities(array $args = [])
 * @phpstan-method \Aws\Result containsPiiEntities(array{Text?: string, LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise containsPiiEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise containsPiiEntitiesAsync(array{Text?: string, LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW', ...} $args = [])
 * @method \Aws\Result createDataset(array $args = [])
 * @phpstan-method \Aws\Result createDataset(array{
 *     FlywheelArn?: string,
 *     DatasetName?: string,
 *     DatasetType?: 'TEST'|'TRAIN',
 *     Description?: string,
 *     InputDataConfig?: array{
 *         AugmentedManifests?: list<array>,
 *         DataFormat?: 'AUGMENTED_MANIFEST'|'COMPREHEND_CSV',
 *         DocumentClassifierInputDataConfig?: array{S3Uri?: string, LabelDelimiter?: string, ...},
 *         EntityRecognizerInputDataConfig?: array{Annotations?: array, Documents?: array, EntityList?: array, ...},
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetAsync(array{
 *     FlywheelArn?: string,
 *     DatasetName?: string,
 *     DatasetType?: 'TEST'|'TRAIN',
 *     Description?: string,
 *     InputDataConfig?: array{
 *         AugmentedManifests?: list<array>,
 *         DataFormat?: 'AUGMENTED_MANIFEST'|'COMPREHEND_CSV',
 *         DocumentClassifierInputDataConfig?: array{S3Uri?: string, LabelDelimiter?: string, ...},
 *         EntityRecognizerInputDataConfig?: array{Annotations?: array, Documents?: array, EntityList?: array, ...},
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDocumentClassifier(array $args = [])
 * @phpstan-method \Aws\Result createDocumentClassifier(array{
 *     DocumentClassifierName?: string,
 *     VersionName?: string,
 *     DataAccessRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     InputDataConfig?: array{
 *         DataFormat?: 'AUGMENTED_MANIFEST'|'COMPREHEND_CSV',
 *         S3Uri?: string,
 *         TestS3Uri?: string,
 *         LabelDelimiter?: string,
 *         AugmentedManifests?: list<array>,
 *         DocumentType?: 'PLAIN_TEXT_DOCUMENT'|'SEMI_STRUCTURED_DOCUMENT',
 *         Documents?: array{S3Uri?: string, TestS3Uri?: string, ...},
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, FlywheelStatsS3Prefix?: string, ...},
 *     ClientRequestToken?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Mode?: 'MULTI_CLASS'|'MULTI_LABEL',
 *     ModelKmsKeyId?: string,
 *     ModelPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDocumentClassifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDocumentClassifierAsync(array{
 *     DocumentClassifierName?: string,
 *     VersionName?: string,
 *     DataAccessRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     InputDataConfig?: array{
 *         DataFormat?: 'AUGMENTED_MANIFEST'|'COMPREHEND_CSV',
 *         S3Uri?: string,
 *         TestS3Uri?: string,
 *         LabelDelimiter?: string,
 *         AugmentedManifests?: list<array>,
 *         DocumentType?: 'PLAIN_TEXT_DOCUMENT'|'SEMI_STRUCTURED_DOCUMENT',
 *         Documents?: array{S3Uri?: string, TestS3Uri?: string, ...},
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, FlywheelStatsS3Prefix?: string, ...},
 *     ClientRequestToken?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Mode?: 'MULTI_CLASS'|'MULTI_LABEL',
 *     ModelKmsKeyId?: string,
 *     ModelPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createEndpoint(array{
 *     EndpointName?: string,
 *     ModelArn?: string,
 *     DesiredInferenceUnits?: int,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataAccessRoleArn?: string,
 *     FlywheelArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEndpointAsync(array{
 *     EndpointName?: string,
 *     ModelArn?: string,
 *     DesiredInferenceUnits?: int,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DataAccessRoleArn?: string,
 *     FlywheelArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEntityRecognizer(array $args = [])
 * @phpstan-method \Aws\Result createEntityRecognizer(array{
 *     RecognizerName?: string,
 *     VersionName?: string,
 *     DataAccessRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     InputDataConfig?: array{
 *         DataFormat?: 'AUGMENTED_MANIFEST'|'COMPREHEND_CSV',
 *         EntityTypes?: list<array>,
 *         Documents?: array{S3Uri?: string, TestS3Uri?: string, InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE', ...},
 *         Annotations?: array{S3Uri?: string, TestS3Uri?: string, ...},
 *         EntityList?: array{S3Uri?: string, ...},
 *         AugmentedManifests?: list<array>,
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     ModelKmsKeyId?: string,
 *     ModelPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEntityRecognizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEntityRecognizerAsync(array{
 *     RecognizerName?: string,
 *     VersionName?: string,
 *     DataAccessRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     InputDataConfig?: array{
 *         DataFormat?: 'AUGMENTED_MANIFEST'|'COMPREHEND_CSV',
 *         EntityTypes?: list<array>,
 *         Documents?: array{S3Uri?: string, TestS3Uri?: string, InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE', ...},
 *         Annotations?: array{S3Uri?: string, TestS3Uri?: string, ...},
 *         EntityList?: array{S3Uri?: string, ...},
 *         AugmentedManifests?: list<array>,
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     ModelKmsKeyId?: string,
 *     ModelPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFlywheel(array $args = [])
 * @phpstan-method \Aws\Result createFlywheel(array{
 *     FlywheelName?: string,
 *     ActiveModelArn?: string,
 *     DataAccessRoleArn?: string,
 *     TaskConfig?: array{
 *         LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *         DocumentClassificationConfig?: array{Mode?: 'MULTI_CLASS'|'MULTI_LABEL', Labels?: list<string>, ...},
 *         EntityRecognitionConfig?: array{EntityTypes?: list<array>, ...},
 *         ...,
 *     },
 *     ModelType?: 'DOCUMENT_CLASSIFIER'|'ENTITY_RECOGNIZER',
 *     DataLakeS3Uri?: string,
 *     DataSecurityConfig?: array{
 *         ModelKmsKeyId?: string,
 *         VolumeKmsKeyId?: string,
 *         DataLakeKmsKeyId?: string,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlywheelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFlywheelAsync(array{
 *     FlywheelName?: string,
 *     ActiveModelArn?: string,
 *     DataAccessRoleArn?: string,
 *     TaskConfig?: array{
 *         LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *         DocumentClassificationConfig?: array{Mode?: 'MULTI_CLASS'|'MULTI_LABEL', Labels?: list<string>, ...},
 *         EntityRecognitionConfig?: array{EntityTypes?: list<array>, ...},
 *         ...,
 *     },
 *     ModelType?: 'DOCUMENT_CLASSIFIER'|'ENTITY_RECOGNIZER',
 *     DataLakeS3Uri?: string,
 *     DataSecurityConfig?: array{
 *         ModelKmsKeyId?: string,
 *         VolumeKmsKeyId?: string,
 *         DataLakeKmsKeyId?: string,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDocumentClassifier(array $args = [])
 * @phpstan-method \Aws\Result deleteDocumentClassifier(array{DocumentClassifierArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDocumentClassifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDocumentClassifierAsync(array{DocumentClassifierArn?: string, ...} $args = [])
 * @method \Aws\Result deleteEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpoint(array{EndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array{EndpointArn?: string, ...} $args = [])
 * @method \Aws\Result deleteEntityRecognizer(array $args = [])
 * @phpstan-method \Aws\Result deleteEntityRecognizer(array{EntityRecognizerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEntityRecognizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEntityRecognizerAsync(array{EntityRecognizerArn?: string, ...} $args = [])
 * @method \Aws\Result deleteFlywheel(array $args = [])
 * @phpstan-method \Aws\Result deleteFlywheel(array{FlywheelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlywheelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFlywheelAsync(array{FlywheelArn?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @phpstan-method \Aws\Result describeDataset(array{DatasetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetAsync(array{DatasetArn?: string, ...} $args = [])
 * @method \Aws\Result describeDocumentClassificationJob(array $args = [])
 * @phpstan-method \Aws\Result describeDocumentClassificationJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDocumentClassificationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDocumentClassificationJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeDocumentClassifier(array $args = [])
 * @phpstan-method \Aws\Result describeDocumentClassifier(array{DocumentClassifierArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDocumentClassifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDocumentClassifierAsync(array{DocumentClassifierArn?: string, ...} $args = [])
 * @method \Aws\Result describeDominantLanguageDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result describeDominantLanguageDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDominantLanguageDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDominantLanguageDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result describeEndpoint(array{EndpointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointAsync(array{EndpointArn?: string, ...} $args = [])
 * @method \Aws\Result describeEntitiesDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result describeEntitiesDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntitiesDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEntitiesDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeEntityRecognizer(array $args = [])
 * @phpstan-method \Aws\Result describeEntityRecognizer(array{EntityRecognizerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntityRecognizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEntityRecognizerAsync(array{EntityRecognizerArn?: string, ...} $args = [])
 * @method \Aws\Result describeEventsDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result describeEventsDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventsDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeFlywheel(array $args = [])
 * @phpstan-method \Aws\Result describeFlywheel(array{FlywheelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlywheelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFlywheelAsync(array{FlywheelArn?: string, ...} $args = [])
 * @method \Aws\Result describeFlywheelIteration(array $args = [])
 * @phpstan-method \Aws\Result describeFlywheelIteration(array{FlywheelArn?: string, FlywheelIterationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlywheelIterationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFlywheelIterationAsync(array{FlywheelArn?: string, FlywheelIterationId?: string, ...} $args = [])
 * @method \Aws\Result describeKeyPhrasesDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result describeKeyPhrasesDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKeyPhrasesDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeKeyPhrasesDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describePiiEntitiesDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result describePiiEntitiesDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePiiEntitiesDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePiiEntitiesDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result describeResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeSentimentDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result describeSentimentDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSentimentDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSentimentDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeTargetedSentimentDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result describeTargetedSentimentDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTargetedSentimentDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTargetedSentimentDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result describeTopicsDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result describeTopicsDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTopicsDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTopicsDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result detectDominantLanguage(array $args = [])
 * @phpstan-method \Aws\Result detectDominantLanguage(array{Text?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectDominantLanguageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectDominantLanguageAsync(array{Text?: string, ...} $args = [])
 * @method \Aws\Result detectEntities(array $args = [])
 * @phpstan-method \Aws\Result detectEntities(array{
 *     Text?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     EndpointArn?: string,
 *     Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *     DocumentReaderConfig?: array{
 *         DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *         DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *         FeatureTypes?: list<'FORMS'|'TABLES'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detectEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectEntitiesAsync(array{
 *     Text?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     EndpointArn?: string,
 *     Bytes?: string|resource|\Psr\Http\Message\StreamInterface,
 *     DocumentReaderConfig?: array{
 *         DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *         DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *         FeatureTypes?: list<'FORMS'|'TABLES'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result detectKeyPhrases(array $args = [])
 * @phpstan-method \Aws\Result detectKeyPhrases(array{Text?: string, LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectKeyPhrasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectKeyPhrasesAsync(array{Text?: string, LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW', ...} $args = [])
 * @method \Aws\Result detectPiiEntities(array $args = [])
 * @phpstan-method \Aws\Result detectPiiEntities(array{Text?: string, LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectPiiEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectPiiEntitiesAsync(array{Text?: string, LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW', ...} $args = [])
 * @method \Aws\Result detectSentiment(array $args = [])
 * @phpstan-method \Aws\Result detectSentiment(array{Text?: string, LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectSentimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectSentimentAsync(array{Text?: string, LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW', ...} $args = [])
 * @method \Aws\Result detectSyntax(array $args = [])
 * @phpstan-method \Aws\Result detectSyntax(array{Text?: string, LanguageCode?: 'de'|'en'|'es'|'fr'|'it'|'pt', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectSyntaxAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectSyntaxAsync(array{Text?: string, LanguageCode?: 'de'|'en'|'es'|'fr'|'it'|'pt', ...} $args = [])
 * @method \Aws\Result detectTargetedSentiment(array $args = [])
 * @phpstan-method \Aws\Result detectTargetedSentiment(array{Text?: string, LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detectTargetedSentimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectTargetedSentimentAsync(array{Text?: string, LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW', ...} $args = [])
 * @method \Aws\Result detectToxicContent(array $args = [])
 * @phpstan-method \Aws\Result detectToxicContent(array{
 *     TextSegments?: list<array{Text?: string, ...}>,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detectToxicContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detectToxicContentAsync(array{
 *     TextSegments?: list<array{Text?: string, ...}>,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result importModel(array $args = [])
 * @phpstan-method \Aws\Result importModel(array{
 *     SourceModelArn?: string,
 *     ModelName?: string,
 *     VersionName?: string,
 *     ModelKmsKeyId?: string,
 *     DataAccessRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importModelAsync(array{
 *     SourceModelArn?: string,
 *     ModelName?: string,
 *     VersionName?: string,
 *     ModelKmsKeyId?: string,
 *     DataAccessRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @phpstan-method \Aws\Result listDatasets(array{
 *     FlywheelArn?: string,
 *     Filter?: array{
 *         Status?: 'COMPLETED'|'CREATING'|'FAILED',
 *         DatasetType?: 'TEST'|'TRAIN',
 *         CreationTimeAfter?: int|string|\DateTimeInterface,
 *         CreationTimeBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetsAsync(array{
 *     FlywheelArn?: string,
 *     Filter?: array{
 *         Status?: 'COMPLETED'|'CREATING'|'FAILED',
 *         DatasetType?: 'TEST'|'TRAIN',
 *         CreationTimeAfter?: int|string|\DateTimeInterface,
 *         CreationTimeBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDocumentClassificationJobs(array $args = [])
 * @phpstan-method \Aws\Result listDocumentClassificationJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentClassificationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDocumentClassificationJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDocumentClassifierSummaries(array $args = [])
 * @phpstan-method \Aws\Result listDocumentClassifierSummaries(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentClassifierSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDocumentClassifierSummariesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDocumentClassifiers(array $args = [])
 * @phpstan-method \Aws\Result listDocumentClassifiers(array{
 *     Filter?: array{
 *         Status?: 'DELETING'|'IN_ERROR'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED'|'TRAINED'|'TRAINED_WITH_WARNING'|'TRAINING',
 *         DocumentClassifierName?: string,
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentClassifiersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDocumentClassifiersAsync(array{
 *     Filter?: array{
 *         Status?: 'DELETING'|'IN_ERROR'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED'|'TRAINED'|'TRAINED_WITH_WARNING'|'TRAINING',
 *         DocumentClassifierName?: string,
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDominantLanguageDetectionJobs(array $args = [])
 * @phpstan-method \Aws\Result listDominantLanguageDetectionJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDominantLanguageDetectionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDominantLanguageDetectionJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listEndpoints(array{
 *     Filter?: array{
 *         ModelArn?: string,
 *         Status?: 'CREATING'|'DELETING'|'FAILED'|'IN_SERVICE'|'UPDATING',
 *         CreationTimeBefore?: int|string|\DateTimeInterface,
 *         CreationTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEndpointsAsync(array{
 *     Filter?: array{
 *         ModelArn?: string,
 *         Status?: 'CREATING'|'DELETING'|'FAILED'|'IN_SERVICE'|'UPDATING',
 *         CreationTimeBefore?: int|string|\DateTimeInterface,
 *         CreationTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEntitiesDetectionJobs(array $args = [])
 * @phpstan-method \Aws\Result listEntitiesDetectionJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitiesDetectionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntitiesDetectionJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEntityRecognizerSummaries(array $args = [])
 * @phpstan-method \Aws\Result listEntityRecognizerSummaries(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntityRecognizerSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntityRecognizerSummariesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEntityRecognizers(array $args = [])
 * @phpstan-method \Aws\Result listEntityRecognizers(array{
 *     Filter?: array{
 *         Status?: 'DELETING'|'IN_ERROR'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED'|'TRAINED'|'TRAINED_WITH_WARNING'|'TRAINING',
 *         RecognizerName?: string,
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntityRecognizersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntityRecognizersAsync(array{
 *     Filter?: array{
 *         Status?: 'DELETING'|'IN_ERROR'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED'|'TRAINED'|'TRAINED_WITH_WARNING'|'TRAINING',
 *         RecognizerName?: string,
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEventsDetectionJobs(array $args = [])
 * @phpstan-method \Aws\Result listEventsDetectionJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventsDetectionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventsDetectionJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFlywheelIterationHistory(array $args = [])
 * @phpstan-method \Aws\Result listFlywheelIterationHistory(array{
 *     FlywheelArn?: string,
 *     Filter?: array{
 *         CreationTimeAfter?: int|string|\DateTimeInterface,
 *         CreationTimeBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlywheelIterationHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlywheelIterationHistoryAsync(array{
 *     FlywheelArn?: string,
 *     Filter?: array{
 *         CreationTimeAfter?: int|string|\DateTimeInterface,
 *         CreationTimeBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFlywheels(array $args = [])
 * @phpstan-method \Aws\Result listFlywheels(array{
 *     Filter?: array{
 *         Status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING',
 *         CreationTimeAfter?: int|string|\DateTimeInterface,
 *         CreationTimeBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlywheelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlywheelsAsync(array{
 *     Filter?: array{
 *         Status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATING',
 *         CreationTimeAfter?: int|string|\DateTimeInterface,
 *         CreationTimeBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listKeyPhrasesDetectionJobs(array $args = [])
 * @phpstan-method \Aws\Result listKeyPhrasesDetectionJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeyPhrasesDetectionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeyPhrasesDetectionJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPiiEntitiesDetectionJobs(array $args = [])
 * @phpstan-method \Aws\Result listPiiEntitiesDetectionJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPiiEntitiesDetectionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPiiEntitiesDetectionJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSentimentDetectionJobs(array $args = [])
 * @phpstan-method \Aws\Result listSentimentDetectionJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSentimentDetectionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSentimentDetectionJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTargetedSentimentDetectionJobs(array $args = [])
 * @phpstan-method \Aws\Result listTargetedSentimentDetectionJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetedSentimentDetectionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetedSentimentDetectionJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTopicsDetectionJobs(array $args = [])
 * @phpstan-method \Aws\Result listTopicsDetectionJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicsDetectionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTopicsDetectionJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmitTimeBefore?: int|string|\DateTimeInterface,
 *         SubmitTimeAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, ResourcePolicy?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, ResourcePolicy?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \Aws\Result startDocumentClassificationJob(array $args = [])
 * @phpstan-method \Aws\Result startDocumentClassificationJob(array{
 *     JobName?: string,
 *     DocumentClassifierArn?: string,
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FlywheelArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDocumentClassificationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDocumentClassificationJobAsync(array{
 *     JobName?: string,
 *     DocumentClassifierArn?: string,
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FlywheelArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDominantLanguageDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result startDominantLanguageDetectionJob(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDominantLanguageDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDominantLanguageDetectionJobAsync(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startEntitiesDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result startEntitiesDetectionJob(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     EntityRecognizerArn?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FlywheelArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startEntitiesDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEntitiesDetectionJobAsync(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     EntityRecognizerArn?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FlywheelArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startEventsDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result startEventsDetectionJob(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     TargetEventTypes?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startEventsDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEventsDetectionJobAsync(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     TargetEventTypes?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startFlywheelIteration(array $args = [])
 * @phpstan-method \Aws\Result startFlywheelIteration(array{FlywheelArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startFlywheelIterationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFlywheelIterationAsync(array{FlywheelArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result startKeyPhrasesDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result startKeyPhrasesDetectionJob(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startKeyPhrasesDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startKeyPhrasesDetectionJobAsync(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startPiiEntitiesDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result startPiiEntitiesDetectionJob(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     Mode?: 'ONLY_OFFSETS'|'ONLY_REDACTION',
 *     RedactionConfig?: array{
 *         PiiEntityTypes?: list<'ADDRESS'|'AGE'|'ALL'|'AWS_ACCESS_KEY'|'AWS_SECRET_KEY'|'BANK_ACCOUNT_NUMBER'|'BANK_ROUTING'|'CA_HEALTH_NUMBER'|'CA_SOCIAL_INSURANCE_NUMBER'|'CREDIT_DEBIT_CVV'|'CREDIT_DEBIT_EXPIRY'|'CREDIT_DEBIT_NUMBER'|'DATE_TIME'|'DRIVER_ID'|'EMAIL'|'INTERNATIONAL_BANK_ACCOUNT_NUMBER'|'IN_AADHAAR'|'IN_NREGA'|'IN_PERMANENT_ACCOUNT_NUMBER'|'IN_VOTER_NUMBER'|'IP_ADDRESS'|'LICENSE_PLATE'|'MAC_ADDRESS'|'NAME'|'PASSPORT_NUMBER'|'PASSWORD'|'PHONE'|'PIN'|'SSN'|'SWIFT_CODE'|'UK_NATIONAL_HEALTH_SERVICE_NUMBER'|'UK_NATIONAL_INSURANCE_NUMBER'|'UK_UNIQUE_TAXPAYER_REFERENCE_NUMBER'|'URL'|'USERNAME'|'US_INDIVIDUAL_TAX_IDENTIFICATION_NUMBER'|'VEHICLE_IDENTIFICATION_NUMBER'>,
 *         MaskMode?: 'MASK'|'REPLACE_WITH_PII_ENTITY_TYPE',
 *         MaskCharacter?: string,
 *         ...,
 *     },
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startPiiEntitiesDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPiiEntitiesDetectionJobAsync(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     Mode?: 'ONLY_OFFSETS'|'ONLY_REDACTION',
 *     RedactionConfig?: array{
 *         PiiEntityTypes?: list<'ADDRESS'|'AGE'|'ALL'|'AWS_ACCESS_KEY'|'AWS_SECRET_KEY'|'BANK_ACCOUNT_NUMBER'|'BANK_ROUTING'|'CA_HEALTH_NUMBER'|'CA_SOCIAL_INSURANCE_NUMBER'|'CREDIT_DEBIT_CVV'|'CREDIT_DEBIT_EXPIRY'|'CREDIT_DEBIT_NUMBER'|'DATE_TIME'|'DRIVER_ID'|'EMAIL'|'INTERNATIONAL_BANK_ACCOUNT_NUMBER'|'IN_AADHAAR'|'IN_NREGA'|'IN_PERMANENT_ACCOUNT_NUMBER'|'IN_VOTER_NUMBER'|'IP_ADDRESS'|'LICENSE_PLATE'|'MAC_ADDRESS'|'NAME'|'PASSPORT_NUMBER'|'PASSWORD'|'PHONE'|'PIN'|'SSN'|'SWIFT_CODE'|'UK_NATIONAL_HEALTH_SERVICE_NUMBER'|'UK_NATIONAL_INSURANCE_NUMBER'|'UK_UNIQUE_TAXPAYER_REFERENCE_NUMBER'|'URL'|'USERNAME'|'US_INDIVIDUAL_TAX_IDENTIFICATION_NUMBER'|'VEHICLE_IDENTIFICATION_NUMBER'>,
 *         MaskMode?: 'MASK'|'REPLACE_WITH_PII_ENTITY_TYPE',
 *         MaskCharacter?: string,
 *         ...,
 *     },
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSentimentDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result startSentimentDetectionJob(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSentimentDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSentimentDetectionJobAsync(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTargetedSentimentDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result startTargetedSentimentDetectionJob(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTargetedSentimentDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTargetedSentimentDetectionJobAsync(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     LanguageCode?: 'ar'|'de'|'en'|'es'|'fr'|'hi'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTopicsDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result startTopicsDetectionJob(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     NumberOfTopics?: int,
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTopicsDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTopicsDetectionJobAsync(array{
 *     InputDataConfig?: array{
 *         S3Uri?: string,
 *         InputFormat?: 'ONE_DOC_PER_FILE'|'ONE_DOC_PER_LINE',
 *         DocumentReaderConfig?: array{
 *             DocumentReadAction?: 'TEXTRACT_ANALYZE_DOCUMENT'|'TEXTRACT_DETECT_DOCUMENT_TEXT',
 *             DocumentReadMode?: 'FORCE_DOCUMENT_READ_ACTION'|'SERVICE_DEFAULT',
 *             FeatureTypes?: list<'FORMS'|'TABLES'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OutputDataConfig?: array{S3Uri?: string, KmsKeyId?: string, ...},
 *     DataAccessRoleArn?: string,
 *     JobName?: string,
 *     NumberOfTopics?: int,
 *     ClientRequestToken?: string,
 *     VolumeKmsKeyId?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopDominantLanguageDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result stopDominantLanguageDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDominantLanguageDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDominantLanguageDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopEntitiesDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result stopEntitiesDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEntitiesDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopEntitiesDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopEventsDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result stopEventsDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEventsDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopEventsDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopKeyPhrasesDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result stopKeyPhrasesDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopKeyPhrasesDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopKeyPhrasesDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopPiiEntitiesDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result stopPiiEntitiesDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopPiiEntitiesDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopPiiEntitiesDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopSentimentDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result stopSentimentDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSentimentDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopSentimentDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopTargetedSentimentDetectionJob(array $args = [])
 * @phpstan-method \Aws\Result stopTargetedSentimentDetectionJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTargetedSentimentDetectionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTargetedSentimentDetectionJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result stopTrainingDocumentClassifier(array $args = [])
 * @phpstan-method \Aws\Result stopTrainingDocumentClassifier(array{DocumentClassifierArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTrainingDocumentClassifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTrainingDocumentClassifierAsync(array{DocumentClassifierArn?: string, ...} $args = [])
 * @method \Aws\Result stopTrainingEntityRecognizer(array $args = [])
 * @phpstan-method \Aws\Result stopTrainingEntityRecognizer(array{EntityRecognizerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTrainingEntityRecognizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTrainingEntityRecognizerAsync(array{EntityRecognizerArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateEndpoint(array{
 *     EndpointArn?: string,
 *     DesiredModelArn?: string,
 *     DesiredInferenceUnits?: int,
 *     DesiredDataAccessRoleArn?: string,
 *     FlywheelArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEndpointAsync(array{
 *     EndpointArn?: string,
 *     DesiredModelArn?: string,
 *     DesiredInferenceUnits?: int,
 *     DesiredDataAccessRoleArn?: string,
 *     FlywheelArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFlywheel(array $args = [])
 * @phpstan-method \Aws\Result updateFlywheel(array{
 *     FlywheelArn?: string,
 *     ActiveModelArn?: string,
 *     DataAccessRoleArn?: string,
 *     DataSecurityConfig?: array{
 *         ModelKmsKeyId?: string,
 *         VolumeKmsKeyId?: string,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlywheelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlywheelAsync(array{
 *     FlywheelArn?: string,
 *     ActiveModelArn?: string,
 *     DataAccessRoleArn?: string,
 *     DataSecurityConfig?: array{
 *         ModelKmsKeyId?: string,
 *         VolumeKmsKeyId?: string,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class ComprehendClient extends AwsClient {}
