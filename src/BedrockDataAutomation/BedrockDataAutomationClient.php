<?php
namespace Aws\BedrockDataAutomation;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Data Automation for Amazon Bedrock** service.
 * @method \Aws\Result copyBlueprintStage(array $args = [])
 * @phpstan-method \Aws\Result copyBlueprintStage(array{
 *     blueprintArn?: string,
 *     sourceStage?: 'DEVELOPMENT'|'LIVE',
 *     targetStage?: 'DEVELOPMENT'|'LIVE',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyBlueprintStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyBlueprintStageAsync(array{
 *     blueprintArn?: string,
 *     sourceStage?: 'DEVELOPMENT'|'LIVE',
 *     targetStage?: 'DEVELOPMENT'|'LIVE',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBlueprint(array $args = [])
 * @phpstan-method \Aws\Result createBlueprint(array{
 *     blueprintName?: string,
 *     type?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *     blueprintStage?: 'DEVELOPMENT'|'LIVE',
 *     schema?: string,
 *     clientToken?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBlueprintAsync(array{
 *     blueprintName?: string,
 *     type?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *     blueprintStage?: 'DEVELOPMENT'|'LIVE',
 *     schema?: string,
 *     clientToken?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBlueprintVersion(array $args = [])
 * @phpstan-method \Aws\Result createBlueprintVersion(array{blueprintArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBlueprintVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBlueprintVersionAsync(array{blueprintArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createDataAutomationLibrary(array $args = [])
 * @phpstan-method \Aws\Result createDataAutomationLibrary(array{
 *     libraryName?: string,
 *     libraryDescription?: string,
 *     clientToken?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataAutomationLibraryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataAutomationLibraryAsync(array{
 *     libraryName?: string,
 *     libraryDescription?: string,
 *     clientToken?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataAutomationProject(array $args = [])
 * @phpstan-method \Aws\Result createDataAutomationProject(array{
 *     projectName?: string,
 *     projectDescription?: string,
 *     projectStage?: 'DEVELOPMENT'|'LIVE',
 *     projectType?: 'ASYNC'|'SYNC',
 *     standardOutputConfiguration?: array{
 *         document?: array{extraction?: array, generativeField?: array, outputFormat?: array, ...},
 *         image?: array{extraction?: array, generativeField?: array, ...},
 *         video?: array{extraction?: array, generativeField?: array, ...},
 *         audio?: array{extraction?: array, generativeField?: array, ...},
 *         ...,
 *     },
 *     customOutputConfiguration?: array{blueprints?: list<array>, document?: array{fallbackBlueprints?: list<array>, ...}, ...},
 *     overrideConfiguration?: array{
 *         document?: array{splitter?: array, modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         image?: array{modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         video?: array{modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         audio?: array{modalityProcessing?: array, languageConfiguration?: array, sensitiveDataConfiguration?: array, ...},
 *         modalityRouting?: array{
 *             jpeg?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             png?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             mp4?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             mov?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             ...,
 *         },
 *         ...,
 *     },
 *     dataAutomationLibraryConfiguration?: array{libraries?: list<array>, ...},
 *     clientToken?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataAutomationProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataAutomationProjectAsync(array{
 *     projectName?: string,
 *     projectDescription?: string,
 *     projectStage?: 'DEVELOPMENT'|'LIVE',
 *     projectType?: 'ASYNC'|'SYNC',
 *     standardOutputConfiguration?: array{
 *         document?: array{extraction?: array, generativeField?: array, outputFormat?: array, ...},
 *         image?: array{extraction?: array, generativeField?: array, ...},
 *         video?: array{extraction?: array, generativeField?: array, ...},
 *         audio?: array{extraction?: array, generativeField?: array, ...},
 *         ...,
 *     },
 *     customOutputConfiguration?: array{blueprints?: list<array>, document?: array{fallbackBlueprints?: list<array>, ...}, ...},
 *     overrideConfiguration?: array{
 *         document?: array{splitter?: array, modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         image?: array{modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         video?: array{modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         audio?: array{modalityProcessing?: array, languageConfiguration?: array, sensitiveDataConfiguration?: array, ...},
 *         modalityRouting?: array{
 *             jpeg?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             png?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             mp4?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             mov?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             ...,
 *         },
 *         ...,
 *     },
 *     dataAutomationLibraryConfiguration?: array{libraries?: list<array>, ...},
 *     clientToken?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBlueprint(array $args = [])
 * @phpstan-method \Aws\Result deleteBlueprint(array{blueprintArn?: string, blueprintVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBlueprintAsync(array{blueprintArn?: string, blueprintVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteDataAutomationLibrary(array $args = [])
 * @phpstan-method \Aws\Result deleteDataAutomationLibrary(array{libraryArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataAutomationLibraryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataAutomationLibraryAsync(array{libraryArn?: string, ...} $args = [])
 * @method \Aws\Result deleteDataAutomationProject(array $args = [])
 * @phpstan-method \Aws\Result deleteDataAutomationProject(array{projectArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataAutomationProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataAutomationProjectAsync(array{projectArn?: string, ...} $args = [])
 * @method \Aws\Result getBlueprint(array $args = [])
 * @phpstan-method \Aws\Result getBlueprint(array{blueprintArn?: string, blueprintVersion?: string, blueprintStage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBlueprintAsync(array{blueprintArn?: string, blueprintVersion?: string, blueprintStage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \Aws\Result getBlueprintOptimizationStatus(array $args = [])
 * @phpstan-method \Aws\Result getBlueprintOptimizationStatus(array{invocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBlueprintOptimizationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBlueprintOptimizationStatusAsync(array{invocationArn?: string, ...} $args = [])
 * @method \Aws\Result getDataAutomationLibrary(array $args = [])
 * @phpstan-method \Aws\Result getDataAutomationLibrary(array{libraryArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataAutomationLibraryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataAutomationLibraryAsync(array{libraryArn?: string, ...} $args = [])
 * @method \Aws\Result getDataAutomationLibraryEntity(array $args = [])
 * @phpstan-method \Aws\Result getDataAutomationLibraryEntity(array{libraryArn?: string, entityType?: 'VOCABULARY', entityId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataAutomationLibraryEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataAutomationLibraryEntityAsync(array{libraryArn?: string, entityType?: 'VOCABULARY', entityId?: string, ...} $args = [])
 * @method \Aws\Result getDataAutomationLibraryIngestionJob(array $args = [])
 * @phpstan-method \Aws\Result getDataAutomationLibraryIngestionJob(array{libraryArn?: string, jobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataAutomationLibraryIngestionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataAutomationLibraryIngestionJobAsync(array{libraryArn?: string, jobArn?: string, ...} $args = [])
 * @method \Aws\Result getDataAutomationProject(array $args = [])
 * @phpstan-method \Aws\Result getDataAutomationProject(array{projectArn?: string, projectStage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataAutomationProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataAutomationProjectAsync(array{projectArn?: string, projectStage?: 'DEVELOPMENT'|'LIVE', ...} $args = [])
 * @method \Aws\Result invokeBlueprintOptimizationAsync(array $args = [])
 * @phpstan-method \Aws\Result invokeBlueprintOptimizationAsync(array{
 *     blueprint?: array{blueprintArn?: string, stage?: 'DEVELOPMENT'|'LIVE', ...},
 *     samples?: list<array{assetS3Object?: array, groundTruthS3Object?: array, ...}>,
 *     outputConfiguration?: array{s3Object?: array{s3Uri?: string, version?: string, ...}, ...},
 *     dataAutomationProfileArn?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeBlueprintOptimizationAsyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeBlueprintOptimizationAsyncAsync(array{
 *     blueprint?: array{blueprintArn?: string, stage?: 'DEVELOPMENT'|'LIVE', ...},
 *     samples?: list<array{assetS3Object?: array, groundTruthS3Object?: array, ...}>,
 *     outputConfiguration?: array{s3Object?: array{s3Uri?: string, version?: string, ...}, ...},
 *     dataAutomationProfileArn?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeDataAutomationLibraryIngestionJob(array $args = [])
 * @phpstan-method \Aws\Result invokeDataAutomationLibraryIngestionJob(array{
 *     libraryArn?: string,
 *     clientToken?: string,
 *     inputConfiguration?: array{
 *         s3Object?: array{s3Uri?: string, version?: string, ...},
 *         inlinePayload?: array{upsertEntitiesInfo?: list<array>, deleteEntitiesInfo?: array, ...},
 *         ...,
 *     },
 *     entityType?: 'VOCABULARY',
 *     operationType?: 'DELETE'|'UPSERT',
 *     outputConfiguration?: array{s3Uri?: string, ...},
 *     notificationConfiguration?: array{eventBridgeConfiguration?: array{eventBridgeEnabled?: bool, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeDataAutomationLibraryIngestionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeDataAutomationLibraryIngestionJobAsync(array{
 *     libraryArn?: string,
 *     clientToken?: string,
 *     inputConfiguration?: array{
 *         s3Object?: array{s3Uri?: string, version?: string, ...},
 *         inlinePayload?: array{upsertEntitiesInfo?: list<array>, deleteEntitiesInfo?: array, ...},
 *         ...,
 *     },
 *     entityType?: 'VOCABULARY',
 *     operationType?: 'DELETE'|'UPSERT',
 *     outputConfiguration?: array{s3Uri?: string, ...},
 *     notificationConfiguration?: array{eventBridgeConfiguration?: array{eventBridgeEnabled?: bool, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBlueprints(array $args = [])
 * @phpstan-method \Aws\Result listBlueprints(array{
 *     blueprintArn?: string,
 *     resourceOwner?: 'ACCOUNT'|'SERVICE',
 *     blueprintStageFilter?: 'ALL'|'DEVELOPMENT'|'LIVE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     projectFilter?: array{projectArn?: string, projectStage?: 'DEVELOPMENT'|'LIVE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBlueprintsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBlueprintsAsync(array{
 *     blueprintArn?: string,
 *     resourceOwner?: 'ACCOUNT'|'SERVICE',
 *     blueprintStageFilter?: 'ALL'|'DEVELOPMENT'|'LIVE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     projectFilter?: array{projectArn?: string, projectStage?: 'DEVELOPMENT'|'LIVE', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataAutomationLibraries(array $args = [])
 * @phpstan-method \Aws\Result listDataAutomationLibraries(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     projectFilter?: array{projectArn?: string, projectStage?: 'DEVELOPMENT'|'LIVE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataAutomationLibrariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataAutomationLibrariesAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     projectFilter?: array{projectArn?: string, projectStage?: 'DEVELOPMENT'|'LIVE', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataAutomationLibraryEntities(array $args = [])
 * @phpstan-method \Aws\Result listDataAutomationLibraryEntities(array{libraryArn?: string, entityType?: 'VOCABULARY', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataAutomationLibraryEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataAutomationLibraryEntitiesAsync(array{libraryArn?: string, entityType?: 'VOCABULARY', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDataAutomationLibraryIngestionJobs(array $args = [])
 * @phpstan-method \Aws\Result listDataAutomationLibraryIngestionJobs(array{libraryArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataAutomationLibraryIngestionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataAutomationLibraryIngestionJobsAsync(array{libraryArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDataAutomationProjects(array $args = [])
 * @phpstan-method \Aws\Result listDataAutomationProjects(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     projectStageFilter?: 'ALL'|'DEVELOPMENT'|'LIVE',
 *     blueprintFilter?: array{blueprintArn?: string, blueprintVersion?: string, blueprintStage?: 'DEVELOPMENT'|'LIVE', ...},
 *     resourceOwner?: 'ACCOUNT'|'SERVICE',
 *     libraryFilter?: array{libraryArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataAutomationProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataAutomationProjectsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     projectStageFilter?: 'ALL'|'DEVELOPMENT'|'LIVE',
 *     blueprintFilter?: array{blueprintArn?: string, blueprintVersion?: string, blueprintStage?: 'DEVELOPMENT'|'LIVE', ...},
 *     resourceOwner?: 'ACCOUNT'|'SERVICE',
 *     libraryFilter?: array{libraryArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceARN?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBlueprint(array $args = [])
 * @phpstan-method \Aws\Result updateBlueprint(array{
 *     blueprintArn?: string,
 *     schema?: string,
 *     blueprintStage?: 'DEVELOPMENT'|'LIVE',
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBlueprintAsync(array{
 *     blueprintArn?: string,
 *     schema?: string,
 *     blueprintStage?: 'DEVELOPMENT'|'LIVE',
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataAutomationLibrary(array $args = [])
 * @phpstan-method \Aws\Result updateDataAutomationLibrary(array{libraryArn?: string, libraryDescription?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataAutomationLibraryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataAutomationLibraryAsync(array{libraryArn?: string, libraryDescription?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateDataAutomationProject(array $args = [])
 * @phpstan-method \Aws\Result updateDataAutomationProject(array{
 *     projectArn?: string,
 *     projectStage?: 'DEVELOPMENT'|'LIVE',
 *     projectDescription?: string,
 *     standardOutputConfiguration?: array{
 *         document?: array{extraction?: array, generativeField?: array, outputFormat?: array, ...},
 *         image?: array{extraction?: array, generativeField?: array, ...},
 *         video?: array{extraction?: array, generativeField?: array, ...},
 *         audio?: array{extraction?: array, generativeField?: array, ...},
 *         ...,
 *     },
 *     customOutputConfiguration?: array{blueprints?: list<array>, document?: array{fallbackBlueprints?: list<array>, ...}, ...},
 *     overrideConfiguration?: array{
 *         document?: array{splitter?: array, modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         image?: array{modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         video?: array{modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         audio?: array{modalityProcessing?: array, languageConfiguration?: array, sensitiveDataConfiguration?: array, ...},
 *         modalityRouting?: array{
 *             jpeg?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             png?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             mp4?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             mov?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             ...,
 *         },
 *         ...,
 *     },
 *     dataAutomationLibraryConfiguration?: array{libraries?: list<array>, ...},
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataAutomationProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataAutomationProjectAsync(array{
 *     projectArn?: string,
 *     projectStage?: 'DEVELOPMENT'|'LIVE',
 *     projectDescription?: string,
 *     standardOutputConfiguration?: array{
 *         document?: array{extraction?: array, generativeField?: array, outputFormat?: array, ...},
 *         image?: array{extraction?: array, generativeField?: array, ...},
 *         video?: array{extraction?: array, generativeField?: array, ...},
 *         audio?: array{extraction?: array, generativeField?: array, ...},
 *         ...,
 *     },
 *     customOutputConfiguration?: array{blueprints?: list<array>, document?: array{fallbackBlueprints?: list<array>, ...}, ...},
 *     overrideConfiguration?: array{
 *         document?: array{splitter?: array, modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         image?: array{modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         video?: array{modalityProcessing?: array, sensitiveDataConfiguration?: array, ...},
 *         audio?: array{modalityProcessing?: array, languageConfiguration?: array, sensitiveDataConfiguration?: array, ...},
 *         modalityRouting?: array{
 *             jpeg?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             png?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             mp4?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             mov?: 'AUDIO'|'DOCUMENT'|'IMAGE'|'VIDEO',
 *             ...,
 *         },
 *         ...,
 *     },
 *     dataAutomationLibraryConfiguration?: array{libraries?: list<array>, ...},
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 */
class BedrockDataAutomationClient extends AwsClient {}
