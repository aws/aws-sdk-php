<?php
namespace Aws\ChimeSDKMediaPipelines;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime SDK Media Pipelines** service.
 * @method \Aws\Result createMediaCapturePipeline(array $args = [])
 * @phpstan-method \Aws\Result createMediaCapturePipeline(array{
 *     SourceType?: 'ChimeSdkMeeting',
 *     SourceArn?: string,
 *     SinkType?: 'S3Bucket',
 *     SinkArn?: string,
 *     ClientRequestToken?: string,
 *     ChimeSdkMeetingConfiguration?: array{
 *         SourceConfiguration?: array{SelectedVideoStreams?: array, ...},
 *         ArtifactsConfiguration?: array{Audio?: array, Video?: array, Content?: array, CompositedVideo?: array, ...},
 *         ...,
 *     },
 *     SseAwsKeyManagementParams?: array{AwsKmsKeyId?: string, AwsKmsEncryptionContext?: string, ...},
 *     SinkIamRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMediaCapturePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMediaCapturePipelineAsync(array{
 *     SourceType?: 'ChimeSdkMeeting',
 *     SourceArn?: string,
 *     SinkType?: 'S3Bucket',
 *     SinkArn?: string,
 *     ClientRequestToken?: string,
 *     ChimeSdkMeetingConfiguration?: array{
 *         SourceConfiguration?: array{SelectedVideoStreams?: array, ...},
 *         ArtifactsConfiguration?: array{Audio?: array, Video?: array, Content?: array, CompositedVideo?: array, ...},
 *         ...,
 *     },
 *     SseAwsKeyManagementParams?: array{AwsKmsKeyId?: string, AwsKmsEncryptionContext?: string, ...},
 *     SinkIamRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMediaConcatenationPipeline(array $args = [])
 * @phpstan-method \Aws\Result createMediaConcatenationPipeline(array{
 *     Sources?: list<array{Type?: 'MediaCapturePipeline', MediaCapturePipelineSourceConfiguration?: array, ...}>,
 *     Sinks?: list<array{Type?: 'S3Bucket', S3BucketSinkConfiguration?: array, ...}>,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMediaConcatenationPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMediaConcatenationPipelineAsync(array{
 *     Sources?: list<array{Type?: 'MediaCapturePipeline', MediaCapturePipelineSourceConfiguration?: array, ...}>,
 *     Sinks?: list<array{Type?: 'S3Bucket', S3BucketSinkConfiguration?: array, ...}>,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMediaInsightsPipeline(array $args = [])
 * @phpstan-method \Aws\Result createMediaInsightsPipeline(array{
 *     MediaInsightsPipelineConfigurationArn?: string,
 *     KinesisVideoStreamSourceRuntimeConfiguration?: array{Streams?: list<array>, MediaEncoding?: 'pcm', MediaSampleRate?: int, ...},
 *     MediaInsightsRuntimeMetadata?: array<string, string>,
 *     KinesisVideoStreamRecordingSourceRuntimeConfiguration?: array{
 *         Streams?: list<array>,
 *         FragmentSelector?: array{FragmentSelectorType?: 'ProducerTimestamp'|'ServerTimestamp', TimestampRange?: array, ...},
 *         ...,
 *     },
 *     S3RecordingSinkRuntimeConfiguration?: array{Destination?: string, RecordingFileFormat?: 'Opus'|'Wav', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMediaInsightsPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMediaInsightsPipelineAsync(array{
 *     MediaInsightsPipelineConfigurationArn?: string,
 *     KinesisVideoStreamSourceRuntimeConfiguration?: array{Streams?: list<array>, MediaEncoding?: 'pcm', MediaSampleRate?: int, ...},
 *     MediaInsightsRuntimeMetadata?: array<string, string>,
 *     KinesisVideoStreamRecordingSourceRuntimeConfiguration?: array{
 *         Streams?: list<array>,
 *         FragmentSelector?: array{FragmentSelectorType?: 'ProducerTimestamp'|'ServerTimestamp', TimestampRange?: array, ...},
 *         ...,
 *     },
 *     S3RecordingSinkRuntimeConfiguration?: array{Destination?: string, RecordingFileFormat?: 'Opus'|'Wav', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMediaInsightsPipelineConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createMediaInsightsPipelineConfiguration(array{
 *     MediaInsightsPipelineConfigurationName?: string,
 *     ResourceAccessRoleArn?: string,
 *     RealTimeAlertConfiguration?: array{Disabled?: bool, Rules?: list<array>, ...},
 *     Elements?: list<array{
 *         Type?: 'AmazonTranscribeCallAnalyticsProcessor'|'AmazonTranscribeProcessor'|'KinesisDataStreamSink'|'LambdaFunctionSink'|'S3RecordingSink'|'SnsTopicSink'|'SqsQueueSink'|'VoiceAnalyticsProcessor'|'VoiceEnhancementSink',
 *         AmazonTranscribeCallAnalyticsProcessorConfiguration?: array,
 *         AmazonTranscribeProcessorConfiguration?: array,
 *         KinesisDataStreamSinkConfiguration?: array,
 *         S3RecordingSinkConfiguration?: array,
 *         VoiceAnalyticsProcessorConfiguration?: array,
 *         LambdaFunctionSinkConfiguration?: array,
 *         SqsQueueSinkConfiguration?: array,
 *         SnsTopicSinkConfiguration?: array,
 *         VoiceEnhancementSinkConfiguration?: array,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMediaInsightsPipelineConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMediaInsightsPipelineConfigurationAsync(array{
 *     MediaInsightsPipelineConfigurationName?: string,
 *     ResourceAccessRoleArn?: string,
 *     RealTimeAlertConfiguration?: array{Disabled?: bool, Rules?: list<array>, ...},
 *     Elements?: list<array{
 *         Type?: 'AmazonTranscribeCallAnalyticsProcessor'|'AmazonTranscribeProcessor'|'KinesisDataStreamSink'|'LambdaFunctionSink'|'S3RecordingSink'|'SnsTopicSink'|'SqsQueueSink'|'VoiceAnalyticsProcessor'|'VoiceEnhancementSink',
 *         AmazonTranscribeCallAnalyticsProcessorConfiguration?: array,
 *         AmazonTranscribeProcessorConfiguration?: array,
 *         KinesisDataStreamSinkConfiguration?: array,
 *         S3RecordingSinkConfiguration?: array,
 *         VoiceAnalyticsProcessorConfiguration?: array,
 *         LambdaFunctionSinkConfiguration?: array,
 *         SqsQueueSinkConfiguration?: array,
 *         SnsTopicSinkConfiguration?: array,
 *         VoiceEnhancementSinkConfiguration?: array,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMediaLiveConnectorPipeline(array $args = [])
 * @phpstan-method \Aws\Result createMediaLiveConnectorPipeline(array{
 *     Sources?: list<array{SourceType?: 'ChimeSdkMeeting', ChimeSdkMeetingLiveConnectorConfiguration?: array, ...}>,
 *     Sinks?: list<array{SinkType?: 'RTMP', RTMPConfiguration?: array, ...}>,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMediaLiveConnectorPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMediaLiveConnectorPipelineAsync(array{
 *     Sources?: list<array{SourceType?: 'ChimeSdkMeeting', ChimeSdkMeetingLiveConnectorConfiguration?: array, ...}>,
 *     Sinks?: list<array{SinkType?: 'RTMP', RTMPConfiguration?: array, ...}>,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMediaPipelineKinesisVideoStreamPool(array $args = [])
 * @phpstan-method \Aws\Result createMediaPipelineKinesisVideoStreamPool(array{
 *     StreamConfiguration?: array{Region?: string, DataRetentionInHours?: int, ...},
 *     PoolName?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMediaPipelineKinesisVideoStreamPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMediaPipelineKinesisVideoStreamPoolAsync(array{
 *     StreamConfiguration?: array{Region?: string, DataRetentionInHours?: int, ...},
 *     PoolName?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMediaStreamPipeline(array $args = [])
 * @phpstan-method \Aws\Result createMediaStreamPipeline(array{
 *     Sources?: list<array{SourceType?: 'ChimeSdkMeeting', SourceArn?: string, ...}>,
 *     Sinks?: list<array{
 *         SinkArn?: string,
 *         SinkType?: 'KinesisVideoStreamPool',
 *         ReservedStreamCapacity?: int,
 *         MediaStreamType?: 'IndividualAudio'|'MixedAudio',
 *         ...,
 *     }>,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMediaStreamPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMediaStreamPipelineAsync(array{
 *     Sources?: list<array{SourceType?: 'ChimeSdkMeeting', SourceArn?: string, ...}>,
 *     Sinks?: list<array{
 *         SinkArn?: string,
 *         SinkType?: 'KinesisVideoStreamPool',
 *         ReservedStreamCapacity?: int,
 *         MediaStreamType?: 'IndividualAudio'|'MixedAudio',
 *         ...,
 *     }>,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteMediaCapturePipeline(array $args = [])
 * @phpstan-method \Aws\Result deleteMediaCapturePipeline(array{MediaPipelineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMediaCapturePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMediaCapturePipelineAsync(array{MediaPipelineId?: string, ...} $args = [])
 * @method \Aws\Result deleteMediaInsightsPipelineConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteMediaInsightsPipelineConfiguration(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMediaInsightsPipelineConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMediaInsightsPipelineConfigurationAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteMediaPipeline(array $args = [])
 * @phpstan-method \Aws\Result deleteMediaPipeline(array{MediaPipelineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMediaPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMediaPipelineAsync(array{MediaPipelineId?: string, ...} $args = [])
 * @method \Aws\Result deleteMediaPipelineKinesisVideoStreamPool(array $args = [])
 * @phpstan-method \Aws\Result deleteMediaPipelineKinesisVideoStreamPool(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMediaPipelineKinesisVideoStreamPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMediaPipelineKinesisVideoStreamPoolAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getMediaCapturePipeline(array $args = [])
 * @phpstan-method \Aws\Result getMediaCapturePipeline(array{MediaPipelineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMediaCapturePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMediaCapturePipelineAsync(array{MediaPipelineId?: string, ...} $args = [])
 * @method \Aws\Result getMediaInsightsPipelineConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getMediaInsightsPipelineConfiguration(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMediaInsightsPipelineConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMediaInsightsPipelineConfigurationAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getMediaPipeline(array $args = [])
 * @phpstan-method \Aws\Result getMediaPipeline(array{MediaPipelineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMediaPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMediaPipelineAsync(array{MediaPipelineId?: string, ...} $args = [])
 * @method \Aws\Result getMediaPipelineKinesisVideoStreamPool(array $args = [])
 * @phpstan-method \Aws\Result getMediaPipelineKinesisVideoStreamPool(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMediaPipelineKinesisVideoStreamPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMediaPipelineKinesisVideoStreamPoolAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getSpeakerSearchTask(array $args = [])
 * @phpstan-method \Aws\Result getSpeakerSearchTask(array{Identifier?: string, SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSpeakerSearchTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSpeakerSearchTaskAsync(array{Identifier?: string, SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceToneAnalysisTask(array $args = [])
 * @phpstan-method \Aws\Result getVoiceToneAnalysisTask(array{Identifier?: string, VoiceToneAnalysisTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceToneAnalysisTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceToneAnalysisTaskAsync(array{Identifier?: string, VoiceToneAnalysisTaskId?: string, ...} $args = [])
 * @method \Aws\Result listMediaCapturePipelines(array $args = [])
 * @phpstan-method \Aws\Result listMediaCapturePipelines(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMediaCapturePipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMediaCapturePipelinesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMediaInsightsPipelineConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listMediaInsightsPipelineConfigurations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMediaInsightsPipelineConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMediaInsightsPipelineConfigurationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMediaPipelineKinesisVideoStreamPools(array $args = [])
 * @phpstan-method \Aws\Result listMediaPipelineKinesisVideoStreamPools(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMediaPipelineKinesisVideoStreamPoolsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMediaPipelineKinesisVideoStreamPoolsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMediaPipelines(array $args = [])
 * @phpstan-method \Aws\Result listMediaPipelines(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMediaPipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMediaPipelinesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result startSpeakerSearchTask(array $args = [])
 * @phpstan-method \Aws\Result startSpeakerSearchTask(array{
 *     Identifier?: string,
 *     VoiceProfileDomainArn?: string,
 *     KinesisVideoStreamSourceTaskConfiguration?: array{StreamArn?: string, ChannelId?: int, FragmentNumber?: string, ...},
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSpeakerSearchTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSpeakerSearchTaskAsync(array{
 *     Identifier?: string,
 *     VoiceProfileDomainArn?: string,
 *     KinesisVideoStreamSourceTaskConfiguration?: array{StreamArn?: string, ChannelId?: int, FragmentNumber?: string, ...},
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startVoiceToneAnalysisTask(array $args = [])
 * @phpstan-method \Aws\Result startVoiceToneAnalysisTask(array{
 *     Identifier?: string,
 *     LanguageCode?: 'en-US',
 *     KinesisVideoStreamSourceTaskConfiguration?: array{StreamArn?: string, ChannelId?: int, FragmentNumber?: string, ...},
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startVoiceToneAnalysisTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startVoiceToneAnalysisTaskAsync(array{
 *     Identifier?: string,
 *     LanguageCode?: 'en-US',
 *     KinesisVideoStreamSourceTaskConfiguration?: array{StreamArn?: string, ChannelId?: int, FragmentNumber?: string, ...},
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopSpeakerSearchTask(array $args = [])
 * @phpstan-method \Aws\Result stopSpeakerSearchTask(array{Identifier?: string, SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSpeakerSearchTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopSpeakerSearchTaskAsync(array{Identifier?: string, SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \Aws\Result stopVoiceToneAnalysisTask(array $args = [])
 * @phpstan-method \Aws\Result stopVoiceToneAnalysisTask(array{Identifier?: string, VoiceToneAnalysisTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopVoiceToneAnalysisTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopVoiceToneAnalysisTaskAsync(array{Identifier?: string, VoiceToneAnalysisTaskId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateMediaInsightsPipelineConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateMediaInsightsPipelineConfiguration(array{
 *     Identifier?: string,
 *     ResourceAccessRoleArn?: string,
 *     RealTimeAlertConfiguration?: array{Disabled?: bool, Rules?: list<array>, ...},
 *     Elements?: list<array{
 *         Type?: 'AmazonTranscribeCallAnalyticsProcessor'|'AmazonTranscribeProcessor'|'KinesisDataStreamSink'|'LambdaFunctionSink'|'S3RecordingSink'|'SnsTopicSink'|'SqsQueueSink'|'VoiceAnalyticsProcessor'|'VoiceEnhancementSink',
 *         AmazonTranscribeCallAnalyticsProcessorConfiguration?: array,
 *         AmazonTranscribeProcessorConfiguration?: array,
 *         KinesisDataStreamSinkConfiguration?: array,
 *         S3RecordingSinkConfiguration?: array,
 *         VoiceAnalyticsProcessorConfiguration?: array,
 *         LambdaFunctionSinkConfiguration?: array,
 *         SqsQueueSinkConfiguration?: array,
 *         SnsTopicSinkConfiguration?: array,
 *         VoiceEnhancementSinkConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMediaInsightsPipelineConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMediaInsightsPipelineConfigurationAsync(array{
 *     Identifier?: string,
 *     ResourceAccessRoleArn?: string,
 *     RealTimeAlertConfiguration?: array{Disabled?: bool, Rules?: list<array>, ...},
 *     Elements?: list<array{
 *         Type?: 'AmazonTranscribeCallAnalyticsProcessor'|'AmazonTranscribeProcessor'|'KinesisDataStreamSink'|'LambdaFunctionSink'|'S3RecordingSink'|'SnsTopicSink'|'SqsQueueSink'|'VoiceAnalyticsProcessor'|'VoiceEnhancementSink',
 *         AmazonTranscribeCallAnalyticsProcessorConfiguration?: array,
 *         AmazonTranscribeProcessorConfiguration?: array,
 *         KinesisDataStreamSinkConfiguration?: array,
 *         S3RecordingSinkConfiguration?: array,
 *         VoiceAnalyticsProcessorConfiguration?: array,
 *         LambdaFunctionSinkConfiguration?: array,
 *         SqsQueueSinkConfiguration?: array,
 *         SnsTopicSinkConfiguration?: array,
 *         VoiceEnhancementSinkConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMediaInsightsPipelineStatus(array $args = [])
 * @phpstan-method \Aws\Result updateMediaInsightsPipelineStatus(array{Identifier?: string, UpdateStatus?: 'Pause'|'Resume', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMediaInsightsPipelineStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMediaInsightsPipelineStatusAsync(array{Identifier?: string, UpdateStatus?: 'Pause'|'Resume', ...} $args = [])
 * @method \Aws\Result updateMediaPipelineKinesisVideoStreamPool(array $args = [])
 * @phpstan-method \Aws\Result updateMediaPipelineKinesisVideoStreamPool(array{Identifier?: string, StreamConfiguration?: array{DataRetentionInHours?: int, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMediaPipelineKinesisVideoStreamPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMediaPipelineKinesisVideoStreamPoolAsync(array{Identifier?: string, StreamConfiguration?: array{DataRetentionInHours?: int, ...}, ...} $args = [])
 */
class ChimeSDKMediaPipelinesClient extends AwsClient {}
