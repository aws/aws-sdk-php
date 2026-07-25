<?php
namespace Aws\IVSRealTime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Interactive Video Service RealTime** service.
 * @method \Aws\Result createEncoderConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createEncoderConfiguration(array{
 *     name?: string,
 *     video?: array{width?: int, height?: int, framerate?: float, bitrate?: int, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEncoderConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEncoderConfigurationAsync(array{
 *     name?: string,
 *     video?: array{width?: int, height?: int, framerate?: float, bitrate?: int, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIngestConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createIngestConfiguration(array{
 *     name?: string,
 *     stageArn?: string,
 *     userId?: string,
 *     attributes?: array<string, string>,
 *     ingestProtocol?: 'RTMP'|'RTMPS',
 *     insecureIngest?: bool,
 *     redundantIngest?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIngestConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIngestConfigurationAsync(array{
 *     name?: string,
 *     stageArn?: string,
 *     userId?: string,
 *     attributes?: array<string, string>,
 *     ingestProtocol?: 'RTMP'|'RTMPS',
 *     insecureIngest?: bool,
 *     redundantIngest?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createParticipantToken(array $args = [])
 * @phpstan-method \Aws\Result createParticipantToken(array{
 *     stageArn?: string,
 *     duration?: int,
 *     userId?: string,
 *     attributes?: array<string, string>,
 *     capabilities?: list<'PUBLISH'|'SUBSCRIBE'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createParticipantTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createParticipantTokenAsync(array{
 *     stageArn?: string,
 *     duration?: int,
 *     userId?: string,
 *     attributes?: array<string, string>,
 *     capabilities?: list<'PUBLISH'|'SUBSCRIBE'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStage(array $args = [])
 * @phpstan-method \Aws\Result createStage(array{
 *     name?: string,
 *     participantTokenConfigurations?: list<array{
 *         duration?: int,
 *         userId?: string,
 *         attributes?: array<string, string>,
 *         capabilities?: list<'PUBLISH'|'SUBSCRIBE'>,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     autoParticipantRecordingConfiguration?: array{
 *         storageConfigurationArn?: string,
 *         mediaTypes?: list<'AUDIO_ONLY'|'AUDIO_VIDEO'|'NONE'>,
 *         thumbnailConfiguration?: array{
 *             targetIntervalSeconds?: int,
 *             storage?: list<'LATEST'|'SEQUENTIAL'>,
 *             recordingMode?: 'DISABLED'|'INTERVAL',
 *             ...,
 *         },
 *         recordingReconnectWindowSeconds?: int,
 *         hlsConfiguration?: array{targetSegmentDurationSeconds?: int, ...},
 *         recordParticipantReplicas?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStageAsync(array{
 *     name?: string,
 *     participantTokenConfigurations?: list<array{
 *         duration?: int,
 *         userId?: string,
 *         attributes?: array<string, string>,
 *         capabilities?: list<'PUBLISH'|'SUBSCRIBE'>,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     autoParticipantRecordingConfiguration?: array{
 *         storageConfigurationArn?: string,
 *         mediaTypes?: list<'AUDIO_ONLY'|'AUDIO_VIDEO'|'NONE'>,
 *         thumbnailConfiguration?: array{
 *             targetIntervalSeconds?: int,
 *             storage?: list<'LATEST'|'SEQUENTIAL'>,
 *             recordingMode?: 'DISABLED'|'INTERVAL',
 *             ...,
 *         },
 *         recordingReconnectWindowSeconds?: int,
 *         hlsConfiguration?: array{targetSegmentDurationSeconds?: int, ...},
 *         recordParticipantReplicas?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStorageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createStorageConfiguration(array{name?: string, s3?: array{bucketName?: string, ...}, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createStorageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStorageConfigurationAsync(array{name?: string, s3?: array{bucketName?: string, ...}, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteEncoderConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteEncoderConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEncoderConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEncoderConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteIngestConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteIngestConfiguration(array{arn?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIngestConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIngestConfigurationAsync(array{arn?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result deletePublicKey(array $args = [])
 * @phpstan-method \Aws\Result deletePublicKey(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePublicKeyAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteStage(array $args = [])
 * @phpstan-method \Aws\Result deleteStage(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStageAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteStorageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteStorageConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStorageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStorageConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result disconnectParticipant(array $args = [])
 * @phpstan-method \Aws\Result disconnectParticipant(array{stageArn?: string, participantId?: string, reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disconnectParticipantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disconnectParticipantAsync(array{stageArn?: string, participantId?: string, reason?: string, ...} $args = [])
 * @method \Aws\Result getComposition(array $args = [])
 * @phpstan-method \Aws\Result getComposition(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCompositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCompositionAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getEncoderConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getEncoderConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEncoderConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEncoderConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getIngestConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getIngestConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIngestConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIngestConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getParticipant(array $args = [])
 * @phpstan-method \Aws\Result getParticipant(array{stageArn?: string, sessionId?: string, participantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getParticipantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getParticipantAsync(array{stageArn?: string, sessionId?: string, participantId?: string, ...} $args = [])
 * @method \Aws\Result getPublicKey(array $args = [])
 * @phpstan-method \Aws\Result getPublicKey(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPublicKeyAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getStage(array $args = [])
 * @phpstan-method \Aws\Result getStage(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStageAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getStageSession(array $args = [])
 * @phpstan-method \Aws\Result getStageSession(array{stageArn?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStageSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStageSessionAsync(array{stageArn?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getStorageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getStorageConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStorageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStorageConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result importPublicKey(array $args = [])
 * @phpstan-method \Aws\Result importPublicKey(array{publicKeyMaterial?: string, name?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importPublicKeyAsync(array{publicKeyMaterial?: string, name?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result listCompositions(array $args = [])
 * @phpstan-method \Aws\Result listCompositions(array{
 *     filterByStageArn?: string,
 *     filterByEncoderConfigurationArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCompositionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCompositionsAsync(array{
 *     filterByStageArn?: string,
 *     filterByEncoderConfigurationArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEncoderConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listEncoderConfigurations(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEncoderConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEncoderConfigurationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listIngestConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listIngestConfigurations(array{
 *     filterByStageArn?: string,
 *     filterByState?: 'ACTIVE'|'INACTIVE',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIngestConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIngestConfigurationsAsync(array{
 *     filterByStageArn?: string,
 *     filterByState?: 'ACTIVE'|'INACTIVE',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listParticipantEvents(array $args = [])
 * @phpstan-method \Aws\Result listParticipantEvents(array{
 *     stageArn?: string,
 *     sessionId?: string,
 *     participantId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listParticipantEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listParticipantEventsAsync(array{
 *     stageArn?: string,
 *     sessionId?: string,
 *     participantId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listParticipantReplicas(array $args = [])
 * @phpstan-method \Aws\Result listParticipantReplicas(array{sourceStageArn?: string, participantId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listParticipantReplicasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listParticipantReplicasAsync(array{sourceStageArn?: string, participantId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listParticipants(array $args = [])
 * @phpstan-method \Aws\Result listParticipants(array{
 *     stageArn?: string,
 *     sessionId?: string,
 *     filterByUserId?: string,
 *     filterByPublished?: bool,
 *     filterByState?: 'CONNECTED'|'DISCONNECTED',
 *     nextToken?: string,
 *     maxResults?: int,
 *     filterByRecordingState?: 'ACTIVE'|'FAILED'|'STARTING'|'STOPPED'|'STOPPING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listParticipantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listParticipantsAsync(array{
 *     stageArn?: string,
 *     sessionId?: string,
 *     filterByUserId?: string,
 *     filterByPublished?: bool,
 *     filterByState?: 'CONNECTED'|'DISCONNECTED',
 *     nextToken?: string,
 *     maxResults?: int,
 *     filterByRecordingState?: 'ACTIVE'|'FAILED'|'STARTING'|'STOPPED'|'STOPPING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPublicKeys(array $args = [])
 * @phpstan-method \Aws\Result listPublicKeys(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPublicKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPublicKeysAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listStageSessions(array $args = [])
 * @phpstan-method \Aws\Result listStageSessions(array{stageArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStageSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStageSessionsAsync(array{stageArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listStages(array $args = [])
 * @phpstan-method \Aws\Result listStages(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStagesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listStorageConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listStorageConfigurations(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStorageConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStorageConfigurationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result startComposition(array $args = [])
 * @phpstan-method \Aws\Result startComposition(array{
 *     stageArn?: string,
 *     idempotencyToken?: string,
 *     layout?: array{
 *         grid?: array{
 *             featuredParticipantAttribute?: string,
 *             omitStoppedVideo?: bool,
 *             videoAspectRatio?: 'AUTO'|'PORTRAIT'|'SQUARE'|'VIDEO',
 *             videoFillMode?: 'CONTAIN'|'COVER'|'FILL',
 *             gridGap?: int,
 *             participantOrderAttribute?: string,
 *             ...,
 *         },
 *         pip?: array{
 *             featuredParticipantAttribute?: string,
 *             omitStoppedVideo?: bool,
 *             videoFillMode?: 'CONTAIN'|'COVER'|'FILL',
 *             gridGap?: int,
 *             pipParticipantAttribute?: string,
 *             pipBehavior?: 'DYNAMIC'|'STATIC',
 *             pipOffset?: int,
 *             pipPosition?: 'BOTTOM_LEFT'|'BOTTOM_RIGHT'|'TOP_LEFT'|'TOP_RIGHT',
 *             pipWidth?: int,
 *             pipHeight?: int,
 *             participantOrderAttribute?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     destinations?: list<array{name?: string, channel?: array, s3?: array, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCompositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCompositionAsync(array{
 *     stageArn?: string,
 *     idempotencyToken?: string,
 *     layout?: array{
 *         grid?: array{
 *             featuredParticipantAttribute?: string,
 *             omitStoppedVideo?: bool,
 *             videoAspectRatio?: 'AUTO'|'PORTRAIT'|'SQUARE'|'VIDEO',
 *             videoFillMode?: 'CONTAIN'|'COVER'|'FILL',
 *             gridGap?: int,
 *             participantOrderAttribute?: string,
 *             ...,
 *         },
 *         pip?: array{
 *             featuredParticipantAttribute?: string,
 *             omitStoppedVideo?: bool,
 *             videoFillMode?: 'CONTAIN'|'COVER'|'FILL',
 *             gridGap?: int,
 *             pipParticipantAttribute?: string,
 *             pipBehavior?: 'DYNAMIC'|'STATIC',
 *             pipOffset?: int,
 *             pipPosition?: 'BOTTOM_LEFT'|'BOTTOM_RIGHT'|'TOP_LEFT'|'TOP_RIGHT',
 *             pipWidth?: int,
 *             pipHeight?: int,
 *             participantOrderAttribute?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     destinations?: list<array{name?: string, channel?: array, s3?: array, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startParticipantReplication(array $args = [])
 * @phpstan-method \Aws\Result startParticipantReplication(array{
 *     sourceStageArn?: string,
 *     destinationStageArn?: string,
 *     participantId?: string,
 *     reconnectWindowSeconds?: int,
 *     attributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startParticipantReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startParticipantReplicationAsync(array{
 *     sourceStageArn?: string,
 *     destinationStageArn?: string,
 *     participantId?: string,
 *     reconnectWindowSeconds?: int,
 *     attributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopComposition(array $args = [])
 * @phpstan-method \Aws\Result stopComposition(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopCompositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCompositionAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result stopParticipantReplication(array $args = [])
 * @phpstan-method \Aws\Result stopParticipantReplication(array{sourceStageArn?: string, destinationStageArn?: string, participantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopParticipantReplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopParticipantReplicationAsync(array{sourceStageArn?: string, destinationStageArn?: string, participantId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateIngestConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateIngestConfiguration(array{arn?: string, stageArn?: string, redundantIngest?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIngestConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIngestConfigurationAsync(array{arn?: string, stageArn?: string, redundantIngest?: bool, ...} $args = [])
 * @method \Aws\Result updateStage(array $args = [])
 * @phpstan-method \Aws\Result updateStage(array{
 *     arn?: string,
 *     name?: string,
 *     autoParticipantRecordingConfiguration?: array{
 *         storageConfigurationArn?: string,
 *         mediaTypes?: list<'AUDIO_ONLY'|'AUDIO_VIDEO'|'NONE'>,
 *         thumbnailConfiguration?: array{
 *             targetIntervalSeconds?: int,
 *             storage?: list<'LATEST'|'SEQUENTIAL'>,
 *             recordingMode?: 'DISABLED'|'INTERVAL',
 *             ...,
 *         },
 *         recordingReconnectWindowSeconds?: int,
 *         hlsConfiguration?: array{targetSegmentDurationSeconds?: int, ...},
 *         recordParticipantReplicas?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStageAsync(array{
 *     arn?: string,
 *     name?: string,
 *     autoParticipantRecordingConfiguration?: array{
 *         storageConfigurationArn?: string,
 *         mediaTypes?: list<'AUDIO_ONLY'|'AUDIO_VIDEO'|'NONE'>,
 *         thumbnailConfiguration?: array{
 *             targetIntervalSeconds?: int,
 *             storage?: list<'LATEST'|'SEQUENTIAL'>,
 *             recordingMode?: 'DISABLED'|'INTERVAL',
 *             ...,
 *         },
 *         recordingReconnectWindowSeconds?: int,
 *         hlsConfiguration?: array{targetSegmentDurationSeconds?: int, ...},
 *         recordParticipantReplicas?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class IVSRealTimeClient extends AwsClient {}
