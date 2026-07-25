<?php
namespace Aws\MediaConvert;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaConvert** service.
 * @method \Aws\Result associateCertificate(array $args = [])
 * @phpstan-method \Aws\Result associateCertificate(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateCertificateAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result cancelJob(array $args = [])
 * @phpstan-method \Aws\Result cancelJob(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @phpstan-method \Aws\Result createJob(array{
 *     AccelerationSettings?: array{Mode?: 'DISABLED'|'ENABLED'|'PREFERRED', ...},
 *     BillingTagsSource?: 'JOB'|'JOB_TEMPLATE'|'PRESET'|'QUEUE',
 *     ClientRequestToken?: string,
 *     HopDestinations?: list<array{Priority?: int, Queue?: string, WaitMinutes?: int, ...}>,
 *     JobEngineVersion?: string,
 *     JobTemplate?: string,
 *     Priority?: int,
 *     Queue?: string,
 *     Role?: string,
 *     Settings?: array{
 *         AdAvailOffset?: int,
 *         AvailBlanking?: array{AvailBlankingImage?: string, ...},
 *         ColorConversion3DLUTSettings?: list<array>,
 *         Esam?: array{
 *             ManifestConfirmConditionNotification?: array,
 *             ResponseSignalPreroll?: int,
 *             SignalProcessingNotification?: array,
 *             ...,
 *         },
 *         ExtendedDataServices?: array{CopyProtectionAction?: 'PASSTHROUGH'|'STRIP', VchipAction?: 'PASSTHROUGH'|'STRIP', ...},
 *         FollowSource?: int,
 *         Inputs?: list<array>,
 *         KantarWatermark?: array{
 *             ChannelName?: string,
 *             ContentReference?: string,
 *             CredentialsSecretName?: string,
 *             FileOffset?: float,
 *             KantarLicenseId?: int,
 *             KantarServerUrl?: string,
 *             LogDestination?: string,
 *             Metadata3?: string,
 *             Metadata4?: string,
 *             Metadata5?: string,
 *             Metadata6?: string,
 *             Metadata7?: string,
 *             Metadata8?: string,
 *             ...,
 *         },
 *         MotionImageInserter?: array{
 *             Framerate?: array,
 *             Input?: string,
 *             InsertionMode?: 'MOV'|'PNG',
 *             Offset?: array,
 *             Playback?: 'ONCE'|'REPEAT',
 *             StartTime?: string,
 *             ...,
 *         },
 *         NielsenConfiguration?: array{BreakoutCode?: int, DistributorId?: string, ...},
 *         NielsenNonLinearWatermark?: array{
 *             ActiveWatermarkProcess?: 'CBET'|'NAES2_AND_NW'|'NAES2_AND_NW_AND_CBET',
 *             AdiFilename?: string,
 *             AssetId?: string,
 *             AssetName?: string,
 *             CbetSourceId?: string,
 *             EpisodeId?: string,
 *             MetadataDestination?: string,
 *             SourceId?: int,
 *             SourceWatermarkStatus?: 'CLEAN'|'WATERMARKED',
 *             TicServerUrl?: string,
 *             UniqueTicPerAudioTrack?: 'RESERVE_UNIQUE_TICS_PER_TRACK'|'SAME_TICS_PER_TRACK',
 *             ...,
 *         },
 *         OutputGroups?: list<array>,
 *         TimecodeConfig?: array{
 *             Anchor?: string,
 *             Source?: 'EMBEDDED'|'SPECIFIEDSTART'|'ZEROBASED',
 *             Start?: string,
 *             TimestampOffset?: string,
 *             ...,
 *         },
 *         TimedMetadataInsertion?: array{Id3Insertions?: list<array>, ...},
 *         ...,
 *     },
 *     SimulateReservedQueue?: 'DISABLED'|'ENABLED',
 *     StatusUpdateInterval?: 'SECONDS_10'|'SECONDS_12'|'SECONDS_120'|'SECONDS_15'|'SECONDS_180'|'SECONDS_20'|'SECONDS_240'|'SECONDS_30'|'SECONDS_300'|'SECONDS_360'|'SECONDS_420'|'SECONDS_480'|'SECONDS_540'|'SECONDS_60'|'SECONDS_600',
 *     Tags?: array<string, string>,
 *     UserMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobAsync(array{
 *     AccelerationSettings?: array{Mode?: 'DISABLED'|'ENABLED'|'PREFERRED', ...},
 *     BillingTagsSource?: 'JOB'|'JOB_TEMPLATE'|'PRESET'|'QUEUE',
 *     ClientRequestToken?: string,
 *     HopDestinations?: list<array{Priority?: int, Queue?: string, WaitMinutes?: int, ...}>,
 *     JobEngineVersion?: string,
 *     JobTemplate?: string,
 *     Priority?: int,
 *     Queue?: string,
 *     Role?: string,
 *     Settings?: array{
 *         AdAvailOffset?: int,
 *         AvailBlanking?: array{AvailBlankingImage?: string, ...},
 *         ColorConversion3DLUTSettings?: list<array>,
 *         Esam?: array{
 *             ManifestConfirmConditionNotification?: array,
 *             ResponseSignalPreroll?: int,
 *             SignalProcessingNotification?: array,
 *             ...,
 *         },
 *         ExtendedDataServices?: array{CopyProtectionAction?: 'PASSTHROUGH'|'STRIP', VchipAction?: 'PASSTHROUGH'|'STRIP', ...},
 *         FollowSource?: int,
 *         Inputs?: list<array>,
 *         KantarWatermark?: array{
 *             ChannelName?: string,
 *             ContentReference?: string,
 *             CredentialsSecretName?: string,
 *             FileOffset?: float,
 *             KantarLicenseId?: int,
 *             KantarServerUrl?: string,
 *             LogDestination?: string,
 *             Metadata3?: string,
 *             Metadata4?: string,
 *             Metadata5?: string,
 *             Metadata6?: string,
 *             Metadata7?: string,
 *             Metadata8?: string,
 *             ...,
 *         },
 *         MotionImageInserter?: array{
 *             Framerate?: array,
 *             Input?: string,
 *             InsertionMode?: 'MOV'|'PNG',
 *             Offset?: array,
 *             Playback?: 'ONCE'|'REPEAT',
 *             StartTime?: string,
 *             ...,
 *         },
 *         NielsenConfiguration?: array{BreakoutCode?: int, DistributorId?: string, ...},
 *         NielsenNonLinearWatermark?: array{
 *             ActiveWatermarkProcess?: 'CBET'|'NAES2_AND_NW'|'NAES2_AND_NW_AND_CBET',
 *             AdiFilename?: string,
 *             AssetId?: string,
 *             AssetName?: string,
 *             CbetSourceId?: string,
 *             EpisodeId?: string,
 *             MetadataDestination?: string,
 *             SourceId?: int,
 *             SourceWatermarkStatus?: 'CLEAN'|'WATERMARKED',
 *             TicServerUrl?: string,
 *             UniqueTicPerAudioTrack?: 'RESERVE_UNIQUE_TICS_PER_TRACK'|'SAME_TICS_PER_TRACK',
 *             ...,
 *         },
 *         OutputGroups?: list<array>,
 *         TimecodeConfig?: array{
 *             Anchor?: string,
 *             Source?: 'EMBEDDED'|'SPECIFIEDSTART'|'ZEROBASED',
 *             Start?: string,
 *             TimestampOffset?: string,
 *             ...,
 *         },
 *         TimedMetadataInsertion?: array{Id3Insertions?: list<array>, ...},
 *         ...,
 *     },
 *     SimulateReservedQueue?: 'DISABLED'|'ENABLED',
 *     StatusUpdateInterval?: 'SECONDS_10'|'SECONDS_12'|'SECONDS_120'|'SECONDS_15'|'SECONDS_180'|'SECONDS_20'|'SECONDS_240'|'SECONDS_30'|'SECONDS_300'|'SECONDS_360'|'SECONDS_420'|'SECONDS_480'|'SECONDS_540'|'SECONDS_60'|'SECONDS_600',
 *     Tags?: array<string, string>,
 *     UserMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result createJobTemplate(array{
 *     AccelerationSettings?: array{Mode?: 'DISABLED'|'ENABLED'|'PREFERRED', ...},
 *     Category?: string,
 *     Description?: string,
 *     HopDestinations?: list<array{Priority?: int, Queue?: string, WaitMinutes?: int, ...}>,
 *     Name?: string,
 *     Priority?: int,
 *     Queue?: string,
 *     Settings?: array{
 *         AdAvailOffset?: int,
 *         AvailBlanking?: array{AvailBlankingImage?: string, ...},
 *         ColorConversion3DLUTSettings?: list<array>,
 *         Esam?: array{
 *             ManifestConfirmConditionNotification?: array,
 *             ResponseSignalPreroll?: int,
 *             SignalProcessingNotification?: array,
 *             ...,
 *         },
 *         ExtendedDataServices?: array{CopyProtectionAction?: 'PASSTHROUGH'|'STRIP', VchipAction?: 'PASSTHROUGH'|'STRIP', ...},
 *         FollowSource?: int,
 *         Inputs?: list<array>,
 *         KantarWatermark?: array{
 *             ChannelName?: string,
 *             ContentReference?: string,
 *             CredentialsSecretName?: string,
 *             FileOffset?: float,
 *             KantarLicenseId?: int,
 *             KantarServerUrl?: string,
 *             LogDestination?: string,
 *             Metadata3?: string,
 *             Metadata4?: string,
 *             Metadata5?: string,
 *             Metadata6?: string,
 *             Metadata7?: string,
 *             Metadata8?: string,
 *             ...,
 *         },
 *         MotionImageInserter?: array{
 *             Framerate?: array,
 *             Input?: string,
 *             InsertionMode?: 'MOV'|'PNG',
 *             Offset?: array,
 *             Playback?: 'ONCE'|'REPEAT',
 *             StartTime?: string,
 *             ...,
 *         },
 *         NielsenConfiguration?: array{BreakoutCode?: int, DistributorId?: string, ...},
 *         NielsenNonLinearWatermark?: array{
 *             ActiveWatermarkProcess?: 'CBET'|'NAES2_AND_NW'|'NAES2_AND_NW_AND_CBET',
 *             AdiFilename?: string,
 *             AssetId?: string,
 *             AssetName?: string,
 *             CbetSourceId?: string,
 *             EpisodeId?: string,
 *             MetadataDestination?: string,
 *             SourceId?: int,
 *             SourceWatermarkStatus?: 'CLEAN'|'WATERMARKED',
 *             TicServerUrl?: string,
 *             UniqueTicPerAudioTrack?: 'RESERVE_UNIQUE_TICS_PER_TRACK'|'SAME_TICS_PER_TRACK',
 *             ...,
 *         },
 *         OutputGroups?: list<array>,
 *         TimecodeConfig?: array{
 *             Anchor?: string,
 *             Source?: 'EMBEDDED'|'SPECIFIEDSTART'|'ZEROBASED',
 *             Start?: string,
 *             TimestampOffset?: string,
 *             ...,
 *         },
 *         TimedMetadataInsertion?: array{Id3Insertions?: list<array>, ...},
 *         ...,
 *     },
 *     StatusUpdateInterval?: 'SECONDS_10'|'SECONDS_12'|'SECONDS_120'|'SECONDS_15'|'SECONDS_180'|'SECONDS_20'|'SECONDS_240'|'SECONDS_30'|'SECONDS_300'|'SECONDS_360'|'SECONDS_420'|'SECONDS_480'|'SECONDS_540'|'SECONDS_60'|'SECONDS_600',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobTemplateAsync(array{
 *     AccelerationSettings?: array{Mode?: 'DISABLED'|'ENABLED'|'PREFERRED', ...},
 *     Category?: string,
 *     Description?: string,
 *     HopDestinations?: list<array{Priority?: int, Queue?: string, WaitMinutes?: int, ...}>,
 *     Name?: string,
 *     Priority?: int,
 *     Queue?: string,
 *     Settings?: array{
 *         AdAvailOffset?: int,
 *         AvailBlanking?: array{AvailBlankingImage?: string, ...},
 *         ColorConversion3DLUTSettings?: list<array>,
 *         Esam?: array{
 *             ManifestConfirmConditionNotification?: array,
 *             ResponseSignalPreroll?: int,
 *             SignalProcessingNotification?: array,
 *             ...,
 *         },
 *         ExtendedDataServices?: array{CopyProtectionAction?: 'PASSTHROUGH'|'STRIP', VchipAction?: 'PASSTHROUGH'|'STRIP', ...},
 *         FollowSource?: int,
 *         Inputs?: list<array>,
 *         KantarWatermark?: array{
 *             ChannelName?: string,
 *             ContentReference?: string,
 *             CredentialsSecretName?: string,
 *             FileOffset?: float,
 *             KantarLicenseId?: int,
 *             KantarServerUrl?: string,
 *             LogDestination?: string,
 *             Metadata3?: string,
 *             Metadata4?: string,
 *             Metadata5?: string,
 *             Metadata6?: string,
 *             Metadata7?: string,
 *             Metadata8?: string,
 *             ...,
 *         },
 *         MotionImageInserter?: array{
 *             Framerate?: array,
 *             Input?: string,
 *             InsertionMode?: 'MOV'|'PNG',
 *             Offset?: array,
 *             Playback?: 'ONCE'|'REPEAT',
 *             StartTime?: string,
 *             ...,
 *         },
 *         NielsenConfiguration?: array{BreakoutCode?: int, DistributorId?: string, ...},
 *         NielsenNonLinearWatermark?: array{
 *             ActiveWatermarkProcess?: 'CBET'|'NAES2_AND_NW'|'NAES2_AND_NW_AND_CBET',
 *             AdiFilename?: string,
 *             AssetId?: string,
 *             AssetName?: string,
 *             CbetSourceId?: string,
 *             EpisodeId?: string,
 *             MetadataDestination?: string,
 *             SourceId?: int,
 *             SourceWatermarkStatus?: 'CLEAN'|'WATERMARKED',
 *             TicServerUrl?: string,
 *             UniqueTicPerAudioTrack?: 'RESERVE_UNIQUE_TICS_PER_TRACK'|'SAME_TICS_PER_TRACK',
 *             ...,
 *         },
 *         OutputGroups?: list<array>,
 *         TimecodeConfig?: array{
 *             Anchor?: string,
 *             Source?: 'EMBEDDED'|'SPECIFIEDSTART'|'ZEROBASED',
 *             Start?: string,
 *             TimestampOffset?: string,
 *             ...,
 *         },
 *         TimedMetadataInsertion?: array{Id3Insertions?: list<array>, ...},
 *         ...,
 *     },
 *     StatusUpdateInterval?: 'SECONDS_10'|'SECONDS_12'|'SECONDS_120'|'SECONDS_15'|'SECONDS_180'|'SECONDS_20'|'SECONDS_240'|'SECONDS_30'|'SECONDS_300'|'SECONDS_360'|'SECONDS_420'|'SECONDS_480'|'SECONDS_540'|'SECONDS_60'|'SECONDS_600',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPreset(array $args = [])
 * @phpstan-method \Aws\Result createPreset(array{
 *     Category?: string,
 *     Description?: string,
 *     Name?: string,
 *     Settings?: array{
 *         AudioDescriptions?: list<array>,
 *         CaptionDescriptions?: list<array>,
 *         ContainerSettings?: array{
 *             CmfcSettings?: array,
 *             Container?: 'CMFC'|'F4V'|'GIF'|'ISMV'|'M2TS'|'M3U8'|'MOV'|'MP4'|'MPD'|'MXF'|'OGG'|'RAW'|'WEBM'|'Y4M',
 *             F4vSettings?: array,
 *             M2tsSettings?: array,
 *             M3u8Settings?: array,
 *             MovSettings?: array,
 *             Mp4Settings?: array,
 *             MpdSettings?: array,
 *             MxfSettings?: array,
 *             ...,
 *         },
 *         VideoDescription?: array{
 *             AfdSignaling?: 'AUTO'|'FIXED'|'NONE',
 *             AntiAlias?: 'DISABLED'|'ENABLED',
 *             ChromaPositionMode?: 'AUTO'|'FORCE_CENTER'|'FORCE_TOP_LEFT',
 *             CodecSettings?: array,
 *             ColorMetadata?: 'IGNORE'|'INSERT',
 *             Crop?: array,
 *             DropFrameTimecode?: 'DISABLED'|'ENABLED',
 *             FixedAfd?: int,
 *             Height?: int,
 *             Position?: array,
 *             RespondToAfd?: 'NONE'|'PASSTHROUGH'|'RESPOND',
 *             ScalingBehavior?: 'DEFAULT'|'FILL'|'FIT'|'FIT_NO_UPSCALE'|'SMART_CROP'|'STRETCH_TO_OUTPUT',
 *             Sharpness?: int,
 *             TimecodeInsertion?: 'DISABLED'|'PIC_TIMING_SEI',
 *             TimecodeTrack?: 'DISABLED'|'ENABLED',
 *             VideoPreprocessors?: array,
 *             Width?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPresetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPresetAsync(array{
 *     Category?: string,
 *     Description?: string,
 *     Name?: string,
 *     Settings?: array{
 *         AudioDescriptions?: list<array>,
 *         CaptionDescriptions?: list<array>,
 *         ContainerSettings?: array{
 *             CmfcSettings?: array,
 *             Container?: 'CMFC'|'F4V'|'GIF'|'ISMV'|'M2TS'|'M3U8'|'MOV'|'MP4'|'MPD'|'MXF'|'OGG'|'RAW'|'WEBM'|'Y4M',
 *             F4vSettings?: array,
 *             M2tsSettings?: array,
 *             M3u8Settings?: array,
 *             MovSettings?: array,
 *             Mp4Settings?: array,
 *             MpdSettings?: array,
 *             MxfSettings?: array,
 *             ...,
 *         },
 *         VideoDescription?: array{
 *             AfdSignaling?: 'AUTO'|'FIXED'|'NONE',
 *             AntiAlias?: 'DISABLED'|'ENABLED',
 *             ChromaPositionMode?: 'AUTO'|'FORCE_CENTER'|'FORCE_TOP_LEFT',
 *             CodecSettings?: array,
 *             ColorMetadata?: 'IGNORE'|'INSERT',
 *             Crop?: array,
 *             DropFrameTimecode?: 'DISABLED'|'ENABLED',
 *             FixedAfd?: int,
 *             Height?: int,
 *             Position?: array,
 *             RespondToAfd?: 'NONE'|'PASSTHROUGH'|'RESPOND',
 *             ScalingBehavior?: 'DEFAULT'|'FILL'|'FIT'|'FIT_NO_UPSCALE'|'SMART_CROP'|'STRETCH_TO_OUTPUT',
 *             Sharpness?: int,
 *             TimecodeInsertion?: 'DISABLED'|'PIC_TIMING_SEI',
 *             TimecodeTrack?: 'DISABLED'|'ENABLED',
 *             VideoPreprocessors?: array,
 *             Width?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQueue(array $args = [])
 * @phpstan-method \Aws\Result createQueue(array{
 *     ConcurrentJobs?: int,
 *     Description?: string,
 *     MaximumConcurrentFeeds?: int,
 *     Name?: string,
 *     PricingPlan?: 'ON_DEMAND'|'RESERVED',
 *     ReservationPlanSettings?: array{Commitment?: 'ONE_YEAR', RenewalType?: 'AUTO_RENEW'|'EXPIRE', ReservedSlots?: int, ...},
 *     Status?: 'ACTIVE'|'PAUSED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQueueAsync(array{
 *     ConcurrentJobs?: int,
 *     Description?: string,
 *     MaximumConcurrentFeeds?: int,
 *     Name?: string,
 *     PricingPlan?: 'ON_DEMAND'|'RESERVED',
 *     ReservationPlanSettings?: array{Commitment?: 'ONE_YEAR', RenewalType?: 'AUTO_RENEW'|'EXPIRE', ReservedSlots?: int, ...},
 *     Status?: 'ACTIVE'|'PAUSED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResourceShare(array $args = [])
 * @phpstan-method \Aws\Result createResourceShare(array{JobId?: string, SupportCaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceShareAsync(array{JobId?: string, SupportCaseId?: string, ...} $args = [])
 * @method \Aws\Result deleteJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteJobTemplate(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobTemplateAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{...} $args = [])
 * @method \Aws\Result deletePreset(array $args = [])
 * @phpstan-method \Aws\Result deletePreset(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePresetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePresetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteQueue(array $args = [])
 * @phpstan-method \Aws\Result deleteQueue(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueueAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeEndpoints(array $args = [])
 * @phpstan-method \Aws\Result describeEndpoints(array{MaxResults?: int, Mode?: 'DEFAULT'|'GET_ONLY', NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointsAsync(array{MaxResults?: int, Mode?: 'DEFAULT'|'GET_ONLY', NextToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateCertificate(array $args = [])
 * @phpstan-method \Aws\Result disassociateCertificate(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateCertificateAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @phpstan-method \Aws\Result getJob(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result getJobTemplate(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobTemplateAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getJobsQueryResults(array $args = [])
 * @phpstan-method \Aws\Result getJobsQueryResults(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobsQueryResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobsQueryResultsAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{...} $args = [])
 * @method \Aws\Result getPreset(array $args = [])
 * @phpstan-method \Aws\Result getPreset(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPresetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPresetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getQueue(array $args = [])
 * @phpstan-method \Aws\Result getQueue(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueueAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result listJobTemplates(array $args = [])
 * @phpstan-method \Aws\Result listJobTemplates(array{
 *     Category?: string,
 *     ListBy?: 'CREATION_DATE'|'NAME'|'SYSTEM',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobTemplatesAsync(array{
 *     Category?: string,
 *     ListBy?: 'CREATION_DATE'|'NAME'|'SYSTEM',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     Queue?: string,
 *     Status?: 'CANCELED'|'COMPLETE'|'ERROR'|'PROGRESSING'|'SUBMITTED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     Queue?: string,
 *     Status?: 'CANCELED'|'COMPLETE'|'ERROR'|'PROGRESSING'|'SUBMITTED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPresets(array $args = [])
 * @phpstan-method \Aws\Result listPresets(array{
 *     Category?: string,
 *     ListBy?: 'CREATION_DATE'|'NAME'|'SYSTEM',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPresetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPresetsAsync(array{
 *     Category?: string,
 *     ListBy?: 'CREATION_DATE'|'NAME'|'SYSTEM',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listQueues(array $args = [])
 * @phpstan-method \Aws\Result listQueues(array{
 *     ListBy?: 'CREATION_DATE'|'NAME',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueuesAsync(array{
 *     ListBy?: 'CREATION_DATE'|'NAME',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result listVersions(array $args = [])
 * @phpstan-method \Aws\Result listVersions(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVersionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result probe(array $args = [])
 * @phpstan-method \Aws\Result probe(array{InputFiles?: list<array{FileUrl?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise probeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise probeAsync(array{InputFiles?: list<array{FileUrl?: string, ...}>, ...} $args = [])
 * @method \Aws\Result putPolicy(array $args = [])
 * @phpstan-method \Aws\Result putPolicy(array{
 *     Policy?: array{
 *         HttpInputs?: 'ALLOWED'|'DISALLOWED',
 *         HttpsInputs?: 'ALLOWED'|'DISALLOWED',
 *         S3Inputs?: 'ALLOWED'|'DISALLOWED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPolicyAsync(array{
 *     Policy?: array{
 *         HttpInputs?: 'ALLOWED'|'DISALLOWED',
 *         HttpsInputs?: 'ALLOWED'|'DISALLOWED',
 *         S3Inputs?: 'ALLOWED'|'DISALLOWED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchJobs(array $args = [])
 * @phpstan-method \Aws\Result searchJobs(array{
 *     InputFile?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     Queue?: string,
 *     Status?: 'CANCELED'|'COMPLETE'|'ERROR'|'PROGRESSING'|'SUBMITTED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchJobsAsync(array{
 *     InputFile?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     Queue?: string,
 *     Status?: 'CANCELED'|'COMPLETE'|'ERROR'|'PROGRESSING'|'SUBMITTED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startJobsQuery(array $args = [])
 * @phpstan-method \Aws\Result startJobsQuery(array{
 *     FilterList?: list<array{
 *         Key?: 'audioCodec'|'fileInput'|'jobEngineVersionRequested'|'jobEngineVersionUsed'|'queue'|'status'|'videoCodec',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startJobsQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startJobsQueryAsync(array{
 *     FilterList?: list<array{
 *         Key?: 'audioCodec'|'fileInput'|'jobEngineVersionRequested'|'jobEngineVersionUsed'|'queue'|'status'|'videoCodec',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{Arn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{Arn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{Arn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{Arn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateJobTemplate(array{
 *     AccelerationSettings?: array{Mode?: 'DISABLED'|'ENABLED'|'PREFERRED', ...},
 *     Category?: string,
 *     Description?: string,
 *     HopDestinations?: list<array{Priority?: int, Queue?: string, WaitMinutes?: int, ...}>,
 *     Name?: string,
 *     Priority?: int,
 *     Queue?: string,
 *     Settings?: array{
 *         AdAvailOffset?: int,
 *         AvailBlanking?: array{AvailBlankingImage?: string, ...},
 *         ColorConversion3DLUTSettings?: list<array>,
 *         Esam?: array{
 *             ManifestConfirmConditionNotification?: array,
 *             ResponseSignalPreroll?: int,
 *             SignalProcessingNotification?: array,
 *             ...,
 *         },
 *         ExtendedDataServices?: array{CopyProtectionAction?: 'PASSTHROUGH'|'STRIP', VchipAction?: 'PASSTHROUGH'|'STRIP', ...},
 *         FollowSource?: int,
 *         Inputs?: list<array>,
 *         KantarWatermark?: array{
 *             ChannelName?: string,
 *             ContentReference?: string,
 *             CredentialsSecretName?: string,
 *             FileOffset?: float,
 *             KantarLicenseId?: int,
 *             KantarServerUrl?: string,
 *             LogDestination?: string,
 *             Metadata3?: string,
 *             Metadata4?: string,
 *             Metadata5?: string,
 *             Metadata6?: string,
 *             Metadata7?: string,
 *             Metadata8?: string,
 *             ...,
 *         },
 *         MotionImageInserter?: array{
 *             Framerate?: array,
 *             Input?: string,
 *             InsertionMode?: 'MOV'|'PNG',
 *             Offset?: array,
 *             Playback?: 'ONCE'|'REPEAT',
 *             StartTime?: string,
 *             ...,
 *         },
 *         NielsenConfiguration?: array{BreakoutCode?: int, DistributorId?: string, ...},
 *         NielsenNonLinearWatermark?: array{
 *             ActiveWatermarkProcess?: 'CBET'|'NAES2_AND_NW'|'NAES2_AND_NW_AND_CBET',
 *             AdiFilename?: string,
 *             AssetId?: string,
 *             AssetName?: string,
 *             CbetSourceId?: string,
 *             EpisodeId?: string,
 *             MetadataDestination?: string,
 *             SourceId?: int,
 *             SourceWatermarkStatus?: 'CLEAN'|'WATERMARKED',
 *             TicServerUrl?: string,
 *             UniqueTicPerAudioTrack?: 'RESERVE_UNIQUE_TICS_PER_TRACK'|'SAME_TICS_PER_TRACK',
 *             ...,
 *         },
 *         OutputGroups?: list<array>,
 *         TimecodeConfig?: array{
 *             Anchor?: string,
 *             Source?: 'EMBEDDED'|'SPECIFIEDSTART'|'ZEROBASED',
 *             Start?: string,
 *             TimestampOffset?: string,
 *             ...,
 *         },
 *         TimedMetadataInsertion?: array{Id3Insertions?: list<array>, ...},
 *         ...,
 *     },
 *     StatusUpdateInterval?: 'SECONDS_10'|'SECONDS_12'|'SECONDS_120'|'SECONDS_15'|'SECONDS_180'|'SECONDS_20'|'SECONDS_240'|'SECONDS_30'|'SECONDS_300'|'SECONDS_360'|'SECONDS_420'|'SECONDS_480'|'SECONDS_540'|'SECONDS_60'|'SECONDS_600',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobTemplateAsync(array{
 *     AccelerationSettings?: array{Mode?: 'DISABLED'|'ENABLED'|'PREFERRED', ...},
 *     Category?: string,
 *     Description?: string,
 *     HopDestinations?: list<array{Priority?: int, Queue?: string, WaitMinutes?: int, ...}>,
 *     Name?: string,
 *     Priority?: int,
 *     Queue?: string,
 *     Settings?: array{
 *         AdAvailOffset?: int,
 *         AvailBlanking?: array{AvailBlankingImage?: string, ...},
 *         ColorConversion3DLUTSettings?: list<array>,
 *         Esam?: array{
 *             ManifestConfirmConditionNotification?: array,
 *             ResponseSignalPreroll?: int,
 *             SignalProcessingNotification?: array,
 *             ...,
 *         },
 *         ExtendedDataServices?: array{CopyProtectionAction?: 'PASSTHROUGH'|'STRIP', VchipAction?: 'PASSTHROUGH'|'STRIP', ...},
 *         FollowSource?: int,
 *         Inputs?: list<array>,
 *         KantarWatermark?: array{
 *             ChannelName?: string,
 *             ContentReference?: string,
 *             CredentialsSecretName?: string,
 *             FileOffset?: float,
 *             KantarLicenseId?: int,
 *             KantarServerUrl?: string,
 *             LogDestination?: string,
 *             Metadata3?: string,
 *             Metadata4?: string,
 *             Metadata5?: string,
 *             Metadata6?: string,
 *             Metadata7?: string,
 *             Metadata8?: string,
 *             ...,
 *         },
 *         MotionImageInserter?: array{
 *             Framerate?: array,
 *             Input?: string,
 *             InsertionMode?: 'MOV'|'PNG',
 *             Offset?: array,
 *             Playback?: 'ONCE'|'REPEAT',
 *             StartTime?: string,
 *             ...,
 *         },
 *         NielsenConfiguration?: array{BreakoutCode?: int, DistributorId?: string, ...},
 *         NielsenNonLinearWatermark?: array{
 *             ActiveWatermarkProcess?: 'CBET'|'NAES2_AND_NW'|'NAES2_AND_NW_AND_CBET',
 *             AdiFilename?: string,
 *             AssetId?: string,
 *             AssetName?: string,
 *             CbetSourceId?: string,
 *             EpisodeId?: string,
 *             MetadataDestination?: string,
 *             SourceId?: int,
 *             SourceWatermarkStatus?: 'CLEAN'|'WATERMARKED',
 *             TicServerUrl?: string,
 *             UniqueTicPerAudioTrack?: 'RESERVE_UNIQUE_TICS_PER_TRACK'|'SAME_TICS_PER_TRACK',
 *             ...,
 *         },
 *         OutputGroups?: list<array>,
 *         TimecodeConfig?: array{
 *             Anchor?: string,
 *             Source?: 'EMBEDDED'|'SPECIFIEDSTART'|'ZEROBASED',
 *             Start?: string,
 *             TimestampOffset?: string,
 *             ...,
 *         },
 *         TimedMetadataInsertion?: array{Id3Insertions?: list<array>, ...},
 *         ...,
 *     },
 *     StatusUpdateInterval?: 'SECONDS_10'|'SECONDS_12'|'SECONDS_120'|'SECONDS_15'|'SECONDS_180'|'SECONDS_20'|'SECONDS_240'|'SECONDS_30'|'SECONDS_300'|'SECONDS_360'|'SECONDS_420'|'SECONDS_480'|'SECONDS_540'|'SECONDS_60'|'SECONDS_600',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePreset(array $args = [])
 * @phpstan-method \Aws\Result updatePreset(array{
 *     Category?: string,
 *     Description?: string,
 *     Name?: string,
 *     Settings?: array{
 *         AudioDescriptions?: list<array>,
 *         CaptionDescriptions?: list<array>,
 *         ContainerSettings?: array{
 *             CmfcSettings?: array,
 *             Container?: 'CMFC'|'F4V'|'GIF'|'ISMV'|'M2TS'|'M3U8'|'MOV'|'MP4'|'MPD'|'MXF'|'OGG'|'RAW'|'WEBM'|'Y4M',
 *             F4vSettings?: array,
 *             M2tsSettings?: array,
 *             M3u8Settings?: array,
 *             MovSettings?: array,
 *             Mp4Settings?: array,
 *             MpdSettings?: array,
 *             MxfSettings?: array,
 *             ...,
 *         },
 *         VideoDescription?: array{
 *             AfdSignaling?: 'AUTO'|'FIXED'|'NONE',
 *             AntiAlias?: 'DISABLED'|'ENABLED',
 *             ChromaPositionMode?: 'AUTO'|'FORCE_CENTER'|'FORCE_TOP_LEFT',
 *             CodecSettings?: array,
 *             ColorMetadata?: 'IGNORE'|'INSERT',
 *             Crop?: array,
 *             DropFrameTimecode?: 'DISABLED'|'ENABLED',
 *             FixedAfd?: int,
 *             Height?: int,
 *             Position?: array,
 *             RespondToAfd?: 'NONE'|'PASSTHROUGH'|'RESPOND',
 *             ScalingBehavior?: 'DEFAULT'|'FILL'|'FIT'|'FIT_NO_UPSCALE'|'SMART_CROP'|'STRETCH_TO_OUTPUT',
 *             Sharpness?: int,
 *             TimecodeInsertion?: 'DISABLED'|'PIC_TIMING_SEI',
 *             TimecodeTrack?: 'DISABLED'|'ENABLED',
 *             VideoPreprocessors?: array,
 *             Width?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePresetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePresetAsync(array{
 *     Category?: string,
 *     Description?: string,
 *     Name?: string,
 *     Settings?: array{
 *         AudioDescriptions?: list<array>,
 *         CaptionDescriptions?: list<array>,
 *         ContainerSettings?: array{
 *             CmfcSettings?: array,
 *             Container?: 'CMFC'|'F4V'|'GIF'|'ISMV'|'M2TS'|'M3U8'|'MOV'|'MP4'|'MPD'|'MXF'|'OGG'|'RAW'|'WEBM'|'Y4M',
 *             F4vSettings?: array,
 *             M2tsSettings?: array,
 *             M3u8Settings?: array,
 *             MovSettings?: array,
 *             Mp4Settings?: array,
 *             MpdSettings?: array,
 *             MxfSettings?: array,
 *             ...,
 *         },
 *         VideoDescription?: array{
 *             AfdSignaling?: 'AUTO'|'FIXED'|'NONE',
 *             AntiAlias?: 'DISABLED'|'ENABLED',
 *             ChromaPositionMode?: 'AUTO'|'FORCE_CENTER'|'FORCE_TOP_LEFT',
 *             CodecSettings?: array,
 *             ColorMetadata?: 'IGNORE'|'INSERT',
 *             Crop?: array,
 *             DropFrameTimecode?: 'DISABLED'|'ENABLED',
 *             FixedAfd?: int,
 *             Height?: int,
 *             Position?: array,
 *             RespondToAfd?: 'NONE'|'PASSTHROUGH'|'RESPOND',
 *             ScalingBehavior?: 'DEFAULT'|'FILL'|'FIT'|'FIT_NO_UPSCALE'|'SMART_CROP'|'STRETCH_TO_OUTPUT',
 *             Sharpness?: int,
 *             TimecodeInsertion?: 'DISABLED'|'PIC_TIMING_SEI',
 *             TimecodeTrack?: 'DISABLED'|'ENABLED',
 *             VideoPreprocessors?: array,
 *             Width?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQueue(array $args = [])
 * @phpstan-method \Aws\Result updateQueue(array{
 *     ConcurrentJobs?: int,
 *     Description?: string,
 *     MaximumConcurrentFeeds?: int,
 *     Name?: string,
 *     ReservationPlanSettings?: array{Commitment?: 'ONE_YEAR', RenewalType?: 'AUTO_RENEW'|'EXPIRE', ReservedSlots?: int, ...},
 *     Status?: 'ACTIVE'|'PAUSED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueAsync(array{
 *     ConcurrentJobs?: int,
 *     Description?: string,
 *     MaximumConcurrentFeeds?: int,
 *     Name?: string,
 *     ReservationPlanSettings?: array{Commitment?: 'ONE_YEAR', RenewalType?: 'AUTO_RENEW'|'EXPIRE', ReservedSlots?: int, ...},
 *     Status?: 'ACTIVE'|'PAUSED',
 *     ...,
 * } $args = [])
 */
class MediaConvertClient extends AwsClient {}
