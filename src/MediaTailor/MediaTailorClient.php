<?php
namespace Aws\MediaTailor;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS MediaTailor** service.
 * @method \Aws\Result configureLogsForChannel(array $args = [])
 * @phpstan-method \Aws\Result configureLogsForChannel(array{ChannelName?: string, LogTypes?: list<'AS_RUN'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise configureLogsForChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise configureLogsForChannelAsync(array{ChannelName?: string, LogTypes?: list<'AS_RUN'>, ...} $args = [])
 * @method \Aws\Result configureLogsForPlaybackConfiguration(array $args = [])
 * @phpstan-method \Aws\Result configureLogsForPlaybackConfiguration(array{
 *     PercentEnabled?: int,
 *     PlaybackConfigurationName?: string,
 *     EnabledLoggingStrategies?: list<'LEGACY_CLOUDWATCH'|'VENDED_LOGS'>,
 *     AdsInteractionLog?: array{
 *         PublishOptInEventTypes?: list<'PRE_ADS_REQUEST_FUNCTION_COMPLETED'|'PRE_ADS_REQUEST_HOOK_SUMMARY'|'RAW_ADS_REQUEST'|'RAW_ADS_RESPONSE'>,
 *         ExcludeEventTypes?: list<'AD_MARKER_FOUND'|'BEACON_FIRED'|'EMPTY_VAST_RESPONSE'|'EMPTY_VMAP_RESPONSE'|'ERROR_ADS_INVALID_RESPONSE'|'ERROR_ADS_IO'|'ERROR_ADS_RESPONSE_PARSE'|'ERROR_ADS_RESPONSE_UNKNOWN_ROOT_ELEMENT'|'ERROR_ADS_TIMEOUT'|'ERROR_DISALLOWED_HOST'|'ERROR_FIRING_BEACON_FAILED'|'ERROR_PERSONALIZATION_DISABLED'|'ERROR_UNKNOWN'|'ERROR_UNKNOWN_HOST'|'ERROR_VAST_INVALID_MEDIA_FILE'|'ERROR_VAST_INVALID_VAST_AD_TAG_URI'|'ERROR_VAST_MISSING_CREATIVES'|'ERROR_VAST_MISSING_IMPRESSION'|'ERROR_VAST_MISSING_MEDIAFILES'|'ERROR_VAST_MISSING_OVERLAYS'|'ERROR_VAST_MULTIPLE_LINEAR'|'ERROR_VAST_MULTIPLE_TRACKING_EVENTS'|'ERROR_VAST_REDIRECT_EMPTY_RESPONSE'|'ERROR_VAST_REDIRECT_FAILED'|'ERROR_VAST_REDIRECT_MULTIPLE_VAST'|'FILLED_AVAIL'|'FILLED_OVERLAY_AVAIL'|'INTERSTITIAL_VOD_FAILURE'|'INTERSTITIAL_VOD_SUCCESS'|'MAKING_ADS_REQUEST'|'MODIFIED_TARGET_URL'|'NON_AD_MARKER_FOUND'|'PRE_ADS_REQUEST_FUNCTION_ERROR'|'PRE_ADS_REQUEST_HOOK_ERROR'|'REDIRECTED_VAST_RESPONSE'|'VAST_REDIRECT'|'VAST_RESPONSE'|'VOD_TIME_BASED_AVAIL_PLAN_SUCCESS'|'VOD_TIME_BASED_AVAIL_PLAN_VAST_RESPONSE_FOR_OFFSET'|'VOD_TIME_BASED_AVAIL_PLAN_WARNING_NO_ADVERTISEMENTS'|'WARNING_NO_ADVERTISEMENTS'|'WARNING_URL_VARIABLE_SUBSTITUTION_FAILED'|'WARNING_VPAID_AD_DROPPED'>,
 *         ...,
 *     },
 *     ManifestServiceInteractionLog?: array{
 *         PublishOptInEventTypes?: list<'PRE_SESSION_INIT_FUNCTION_COMPLETED'|'PRE_SESSION_INIT_HOOK_SUMMARY'>,
 *         ExcludeEventTypes?: list<'CONFIG_SECURITY_ERROR'|'CONFIG_SYNTAX_ERROR'|'CONNECTION_ERROR'|'ERROR_ADS_INTERPOLATION'|'ERROR_BUMPER_END_INTERPOLATION'|'ERROR_BUMPER_START_INTERPOLATION'|'ERROR_CDN_AD_SEGMENT_INTERPOLATION'|'ERROR_CDN_CONTENT_SEGMENT_INTERPOLATION'|'ERROR_LIVE_PRE_ROLL_ADS_INTERPOLATION'|'ERROR_ORIGIN_PREFIX_INTERPOLATION'|'ERROR_PROFILE_NAME_INTERPOLATION'|'ERROR_SLATE_AD_URL_INTERPOLATION'|'GENERATED_MANIFEST'|'HOST_DISALLOWED'|'INCOMPATIBLE_HLS_VERSION'|'INVALID_SINGLE_PERIOD_DASH_MANIFEST'|'IO_ERROR'|'LAST_PERIOD_MISSING_AUDIO'|'LAST_PERIOD_MISSING_AUDIO_WARNING'|'MANIFEST_ERROR'|'NO_MASTER_OR_MEDIA_PLAYLIST'|'NO_MASTER_PLAYLIST'|'NO_MEDIA_PLAYLIST'|'ORIGIN_MANIFEST'|'PARSING_ERROR'|'PRE_SESSION_INIT_FUNCTION_ERROR'|'PRE_SESSION_INIT_HOOK_ERROR'|'SCTE35_PARSING_ERROR'|'SESSION_INITIALIZED'|'TIMEOUT_ERROR'|'TRACKING_RESPONSE'|'UNKNOWN_ERROR'|'UNKNOWN_HOST'|'UNSUPPORTED_SINGLE_PERIOD_DASH_MANIFEST'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise configureLogsForPlaybackConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise configureLogsForPlaybackConfigurationAsync(array{
 *     PercentEnabled?: int,
 *     PlaybackConfigurationName?: string,
 *     EnabledLoggingStrategies?: list<'LEGACY_CLOUDWATCH'|'VENDED_LOGS'>,
 *     AdsInteractionLog?: array{
 *         PublishOptInEventTypes?: list<'PRE_ADS_REQUEST_FUNCTION_COMPLETED'|'PRE_ADS_REQUEST_HOOK_SUMMARY'|'RAW_ADS_REQUEST'|'RAW_ADS_RESPONSE'>,
 *         ExcludeEventTypes?: list<'AD_MARKER_FOUND'|'BEACON_FIRED'|'EMPTY_VAST_RESPONSE'|'EMPTY_VMAP_RESPONSE'|'ERROR_ADS_INVALID_RESPONSE'|'ERROR_ADS_IO'|'ERROR_ADS_RESPONSE_PARSE'|'ERROR_ADS_RESPONSE_UNKNOWN_ROOT_ELEMENT'|'ERROR_ADS_TIMEOUT'|'ERROR_DISALLOWED_HOST'|'ERROR_FIRING_BEACON_FAILED'|'ERROR_PERSONALIZATION_DISABLED'|'ERROR_UNKNOWN'|'ERROR_UNKNOWN_HOST'|'ERROR_VAST_INVALID_MEDIA_FILE'|'ERROR_VAST_INVALID_VAST_AD_TAG_URI'|'ERROR_VAST_MISSING_CREATIVES'|'ERROR_VAST_MISSING_IMPRESSION'|'ERROR_VAST_MISSING_MEDIAFILES'|'ERROR_VAST_MISSING_OVERLAYS'|'ERROR_VAST_MULTIPLE_LINEAR'|'ERROR_VAST_MULTIPLE_TRACKING_EVENTS'|'ERROR_VAST_REDIRECT_EMPTY_RESPONSE'|'ERROR_VAST_REDIRECT_FAILED'|'ERROR_VAST_REDIRECT_MULTIPLE_VAST'|'FILLED_AVAIL'|'FILLED_OVERLAY_AVAIL'|'INTERSTITIAL_VOD_FAILURE'|'INTERSTITIAL_VOD_SUCCESS'|'MAKING_ADS_REQUEST'|'MODIFIED_TARGET_URL'|'NON_AD_MARKER_FOUND'|'PRE_ADS_REQUEST_FUNCTION_ERROR'|'PRE_ADS_REQUEST_HOOK_ERROR'|'REDIRECTED_VAST_RESPONSE'|'VAST_REDIRECT'|'VAST_RESPONSE'|'VOD_TIME_BASED_AVAIL_PLAN_SUCCESS'|'VOD_TIME_BASED_AVAIL_PLAN_VAST_RESPONSE_FOR_OFFSET'|'VOD_TIME_BASED_AVAIL_PLAN_WARNING_NO_ADVERTISEMENTS'|'WARNING_NO_ADVERTISEMENTS'|'WARNING_URL_VARIABLE_SUBSTITUTION_FAILED'|'WARNING_VPAID_AD_DROPPED'>,
 *         ...,
 *     },
 *     ManifestServiceInteractionLog?: array{
 *         PublishOptInEventTypes?: list<'PRE_SESSION_INIT_FUNCTION_COMPLETED'|'PRE_SESSION_INIT_HOOK_SUMMARY'>,
 *         ExcludeEventTypes?: list<'CONFIG_SECURITY_ERROR'|'CONFIG_SYNTAX_ERROR'|'CONNECTION_ERROR'|'ERROR_ADS_INTERPOLATION'|'ERROR_BUMPER_END_INTERPOLATION'|'ERROR_BUMPER_START_INTERPOLATION'|'ERROR_CDN_AD_SEGMENT_INTERPOLATION'|'ERROR_CDN_CONTENT_SEGMENT_INTERPOLATION'|'ERROR_LIVE_PRE_ROLL_ADS_INTERPOLATION'|'ERROR_ORIGIN_PREFIX_INTERPOLATION'|'ERROR_PROFILE_NAME_INTERPOLATION'|'ERROR_SLATE_AD_URL_INTERPOLATION'|'GENERATED_MANIFEST'|'HOST_DISALLOWED'|'INCOMPATIBLE_HLS_VERSION'|'INVALID_SINGLE_PERIOD_DASH_MANIFEST'|'IO_ERROR'|'LAST_PERIOD_MISSING_AUDIO'|'LAST_PERIOD_MISSING_AUDIO_WARNING'|'MANIFEST_ERROR'|'NO_MASTER_OR_MEDIA_PLAYLIST'|'NO_MASTER_PLAYLIST'|'NO_MEDIA_PLAYLIST'|'ORIGIN_MANIFEST'|'PARSING_ERROR'|'PRE_SESSION_INIT_FUNCTION_ERROR'|'PRE_SESSION_INIT_HOOK_ERROR'|'SCTE35_PARSING_ERROR'|'SESSION_INITIALIZED'|'TIMEOUT_ERROR'|'TRACKING_RESPONSE'|'UNKNOWN_ERROR'|'UNKNOWN_HOST'|'UNSUPPORTED_SINGLE_PERIOD_DASH_MANIFEST'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChannel(array $args = [])
 * @phpstan-method \Aws\Result createChannel(array{
 *     ChannelName?: string,
 *     FillerSlate?: array{SourceLocationName?: string, VodSourceName?: string, ...},
 *     Outputs?: list<array{
 *         DashPlaylistSettings?: array,
 *         HlsPlaylistSettings?: array,
 *         ManifestName?: string,
 *         SourceGroup?: string,
 *         ...,
 *     }>,
 *     PlaybackMode?: 'LINEAR'|'LOOP',
 *     Tags?: array<string, string>,
 *     Tier?: 'BASIC'|'STANDARD',
 *     TimeShiftConfiguration?: array{MaxTimeDelaySeconds?: int, ...},
 *     Audiences?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelAsync(array{
 *     ChannelName?: string,
 *     FillerSlate?: array{SourceLocationName?: string, VodSourceName?: string, ...},
 *     Outputs?: list<array{
 *         DashPlaylistSettings?: array,
 *         HlsPlaylistSettings?: array,
 *         ManifestName?: string,
 *         SourceGroup?: string,
 *         ...,
 *     }>,
 *     PlaybackMode?: 'LINEAR'|'LOOP',
 *     Tags?: array<string, string>,
 *     Tier?: 'BASIC'|'STANDARD',
 *     TimeShiftConfiguration?: array{MaxTimeDelaySeconds?: int, ...},
 *     Audiences?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLiveSource(array $args = [])
 * @phpstan-method \Aws\Result createLiveSource(array{
 *     HttpPackageConfigurations?: list<array{Path?: string, SourceGroup?: string, Type?: 'DASH'|'HLS', ...}>,
 *     LiveSourceName?: string,
 *     SourceLocationName?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLiveSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLiveSourceAsync(array{
 *     HttpPackageConfigurations?: list<array{Path?: string, SourceGroup?: string, Type?: 'DASH'|'HLS', ...}>,
 *     LiveSourceName?: string,
 *     SourceLocationName?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPrefetchSchedule(array $args = [])
 * @phpstan-method \Aws\Result createPrefetchSchedule(array{
 *     Consumption?: array{
 *         AvailMatchingCriteria?: list<array>,
 *         EndTime?: int|string|\DateTimeInterface,
 *         StartTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     Name?: string,
 *     PlaybackConfigurationName?: string,
 *     Retrieval?: array{
 *         DynamicVariables?: array<string, string>,
 *         EndTime?: int|string|\DateTimeInterface,
 *         StartTime?: int|string|\DateTimeInterface,
 *         TrafficShapingType?: 'RETRIEVAL_WINDOW'|'TPS',
 *         TrafficShapingRetrievalWindow?: array{RetrievalWindowDurationSeconds?: int, ...},
 *         TrafficShapingTpsConfiguration?: array{PeakTps?: int, PeakConcurrentUsers?: int, ...},
 *         ...,
 *     },
 *     RecurringPrefetchConfiguration?: array{
 *         StartTime?: int|string|\DateTimeInterface,
 *         EndTime?: int|string|\DateTimeInterface,
 *         RecurringConsumption?: array{RetrievedAdExpirationSeconds?: int, AvailMatchingCriteria?: list<array>, ...},
 *         RecurringRetrieval?: array{
 *             DynamicVariables?: array<string, string>,
 *             DelayAfterAvailEndSeconds?: int,
 *             TrafficShapingType?: 'RETRIEVAL_WINDOW'|'TPS',
 *             TrafficShapingRetrievalWindow?: array,
 *             TrafficShapingTpsConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ScheduleType?: 'RECURRING'|'SINGLE',
 *     StreamId?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPrefetchScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPrefetchScheduleAsync(array{
 *     Consumption?: array{
 *         AvailMatchingCriteria?: list<array>,
 *         EndTime?: int|string|\DateTimeInterface,
 *         StartTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     Name?: string,
 *     PlaybackConfigurationName?: string,
 *     Retrieval?: array{
 *         DynamicVariables?: array<string, string>,
 *         EndTime?: int|string|\DateTimeInterface,
 *         StartTime?: int|string|\DateTimeInterface,
 *         TrafficShapingType?: 'RETRIEVAL_WINDOW'|'TPS',
 *         TrafficShapingRetrievalWindow?: array{RetrievalWindowDurationSeconds?: int, ...},
 *         TrafficShapingTpsConfiguration?: array{PeakTps?: int, PeakConcurrentUsers?: int, ...},
 *         ...,
 *     },
 *     RecurringPrefetchConfiguration?: array{
 *         StartTime?: int|string|\DateTimeInterface,
 *         EndTime?: int|string|\DateTimeInterface,
 *         RecurringConsumption?: array{RetrievedAdExpirationSeconds?: int, AvailMatchingCriteria?: list<array>, ...},
 *         RecurringRetrieval?: array{
 *             DynamicVariables?: array<string, string>,
 *             DelayAfterAvailEndSeconds?: int,
 *             TrafficShapingType?: 'RETRIEVAL_WINDOW'|'TPS',
 *             TrafficShapingRetrievalWindow?: array,
 *             TrafficShapingTpsConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ScheduleType?: 'RECURRING'|'SINGLE',
 *     StreamId?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProgram(array $args = [])
 * @phpstan-method \Aws\Result createProgram(array{
 *     AdBreaks?: list<array{
 *         MessageType?: 'SPLICE_INSERT'|'TIME_SIGNAL',
 *         OffsetMillis?: int,
 *         Slate?: array,
 *         SpliceInsertMessage?: array,
 *         TimeSignalMessage?: array,
 *         AdBreakMetadata?: list<array>,
 *         ...,
 *     }>,
 *     ChannelName?: string,
 *     LiveSourceName?: string,
 *     ProgramName?: string,
 *     ScheduleConfiguration?: array{
 *         Transition?: array{
 *             DurationMillis?: int,
 *             RelativePosition?: 'AFTER_PROGRAM'|'BEFORE_PROGRAM',
 *             RelativeProgram?: string,
 *             ScheduledStartTimeMillis?: int,
 *             Type?: string,
 *             ...,
 *         },
 *         ClipRange?: array{EndOffsetMillis?: int, StartOffsetMillis?: int, ...},
 *         ...,
 *     },
 *     SourceLocationName?: string,
 *     VodSourceName?: string,
 *     AudienceMedia?: list<array{Audience?: string, AlternateMedia?: list<array>, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProgramAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProgramAsync(array{
 *     AdBreaks?: list<array{
 *         MessageType?: 'SPLICE_INSERT'|'TIME_SIGNAL',
 *         OffsetMillis?: int,
 *         Slate?: array,
 *         SpliceInsertMessage?: array,
 *         TimeSignalMessage?: array,
 *         AdBreakMetadata?: list<array>,
 *         ...,
 *     }>,
 *     ChannelName?: string,
 *     LiveSourceName?: string,
 *     ProgramName?: string,
 *     ScheduleConfiguration?: array{
 *         Transition?: array{
 *             DurationMillis?: int,
 *             RelativePosition?: 'AFTER_PROGRAM'|'BEFORE_PROGRAM',
 *             RelativeProgram?: string,
 *             ScheduledStartTimeMillis?: int,
 *             Type?: string,
 *             ...,
 *         },
 *         ClipRange?: array{EndOffsetMillis?: int, StartOffsetMillis?: int, ...},
 *         ...,
 *     },
 *     SourceLocationName?: string,
 *     VodSourceName?: string,
 *     AudienceMedia?: list<array{Audience?: string, AlternateMedia?: list<array>, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSourceLocation(array $args = [])
 * @phpstan-method \Aws\Result createSourceLocation(array{
 *     AccessConfiguration?: array{
 *         AccessType?: 'AUTODETECT_SIGV4'|'S3_SIGV4'|'SECRETS_MANAGER_ACCESS_TOKEN',
 *         SecretsManagerAccessTokenConfiguration?: array{HeaderName?: string, SecretArn?: string, SecretStringKey?: string, ...},
 *         ...,
 *     },
 *     DefaultSegmentDeliveryConfiguration?: array{BaseUrl?: string, ...},
 *     HttpConfiguration?: array{BaseUrl?: string, ...},
 *     SegmentDeliveryConfigurations?: list<array{BaseUrl?: string, Name?: string, ...}>,
 *     SourceLocationName?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSourceLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSourceLocationAsync(array{
 *     AccessConfiguration?: array{
 *         AccessType?: 'AUTODETECT_SIGV4'|'S3_SIGV4'|'SECRETS_MANAGER_ACCESS_TOKEN',
 *         SecretsManagerAccessTokenConfiguration?: array{HeaderName?: string, SecretArn?: string, SecretStringKey?: string, ...},
 *         ...,
 *     },
 *     DefaultSegmentDeliveryConfiguration?: array{BaseUrl?: string, ...},
 *     HttpConfiguration?: array{BaseUrl?: string, ...},
 *     SegmentDeliveryConfigurations?: list<array{BaseUrl?: string, Name?: string, ...}>,
 *     SourceLocationName?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVodSource(array $args = [])
 * @phpstan-method \Aws\Result createVodSource(array{
 *     HttpPackageConfigurations?: list<array{Path?: string, SourceGroup?: string, Type?: 'DASH'|'HLS', ...}>,
 *     SourceLocationName?: string,
 *     Tags?: array<string, string>,
 *     VodSourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVodSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVodSourceAsync(array{
 *     HttpPackageConfigurations?: list<array{Path?: string, SourceGroup?: string, Type?: 'DASH'|'HLS', ...}>,
 *     SourceLocationName?: string,
 *     Tags?: array<string, string>,
 *     VodSourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteChannel(array{ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelAsync(array{ChannelName?: string, ...} $args = [])
 * @method \Aws\Result deleteChannelPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteChannelPolicy(array{ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelPolicyAsync(array{ChannelName?: string, ...} $args = [])
 * @method \Aws\Result deleteFunction(array $args = [])
 * @phpstan-method \Aws\Result deleteFunction(array{FunctionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFunctionAsync(array{FunctionId?: string, ...} $args = [])
 * @method \Aws\Result deleteLiveSource(array $args = [])
 * @phpstan-method \Aws\Result deleteLiveSource(array{LiveSourceName?: string, SourceLocationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLiveSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLiveSourceAsync(array{LiveSourceName?: string, SourceLocationName?: string, ...} $args = [])
 * @method \Aws\Result deletePlaybackConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deletePlaybackConfiguration(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePlaybackConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePlaybackConfigurationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deletePrefetchSchedule(array $args = [])
 * @phpstan-method \Aws\Result deletePrefetchSchedule(array{Name?: string, PlaybackConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePrefetchScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePrefetchScheduleAsync(array{Name?: string, PlaybackConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result deleteProgram(array $args = [])
 * @phpstan-method \Aws\Result deleteProgram(array{ChannelName?: string, ProgramName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProgramAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProgramAsync(array{ChannelName?: string, ProgramName?: string, ...} $args = [])
 * @method \Aws\Result deleteSourceLocation(array $args = [])
 * @phpstan-method \Aws\Result deleteSourceLocation(array{SourceLocationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSourceLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSourceLocationAsync(array{SourceLocationName?: string, ...} $args = [])
 * @method \Aws\Result deleteVodSource(array $args = [])
 * @phpstan-method \Aws\Result deleteVodSource(array{SourceLocationName?: string, VodSourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVodSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVodSourceAsync(array{SourceLocationName?: string, VodSourceName?: string, ...} $args = [])
 * @method \Aws\Result describeChannel(array $args = [])
 * @phpstan-method \Aws\Result describeChannel(array{ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelAsync(array{ChannelName?: string, ...} $args = [])
 * @method \Aws\Result describeLiveSource(array $args = [])
 * @phpstan-method \Aws\Result describeLiveSource(array{LiveSourceName?: string, SourceLocationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLiveSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLiveSourceAsync(array{LiveSourceName?: string, SourceLocationName?: string, ...} $args = [])
 * @method \Aws\Result describeProgram(array $args = [])
 * @phpstan-method \Aws\Result describeProgram(array{ChannelName?: string, ProgramName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProgramAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProgramAsync(array{ChannelName?: string, ProgramName?: string, ...} $args = [])
 * @method \Aws\Result describeSourceLocation(array $args = [])
 * @phpstan-method \Aws\Result describeSourceLocation(array{SourceLocationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSourceLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSourceLocationAsync(array{SourceLocationName?: string, ...} $args = [])
 * @method \Aws\Result describeVodSource(array $args = [])
 * @phpstan-method \Aws\Result describeVodSource(array{SourceLocationName?: string, VodSourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVodSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVodSourceAsync(array{SourceLocationName?: string, VodSourceName?: string, ...} $args = [])
 * @method \Aws\Result getChannelPolicy(array $args = [])
 * @phpstan-method \Aws\Result getChannelPolicy(array{ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelPolicyAsync(array{ChannelName?: string, ...} $args = [])
 * @method \Aws\Result getChannelSchedule(array $args = [])
 * @phpstan-method \Aws\Result getChannelSchedule(array{
 *     ChannelName?: string,
 *     DurationMinutes?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Audience?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelScheduleAsync(array{
 *     ChannelName?: string,
 *     DurationMinutes?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Audience?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFunction(array $args = [])
 * @phpstan-method \Aws\Result getFunction(array{FunctionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionAsync(array{FunctionId?: string, ...} $args = [])
 * @method \Aws\Result getPlaybackConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getPlaybackConfiguration(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlaybackConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlaybackConfigurationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getPrefetchSchedule(array $args = [])
 * @phpstan-method \Aws\Result getPrefetchSchedule(array{Name?: string, PlaybackConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPrefetchScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPrefetchScheduleAsync(array{Name?: string, PlaybackConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result listAlerts(array $args = [])
 * @phpstan-method \Aws\Result listAlerts(array{MaxResults?: int, NextToken?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAlertsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAlertsAsync(array{MaxResults?: int, NextToken?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @phpstan-method \Aws\Result listChannels(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFunctions(array $args = [])
 * @phpstan-method \Aws\Result listFunctions(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listLiveSources(array $args = [])
 * @phpstan-method \Aws\Result listLiveSources(array{MaxResults?: int, NextToken?: string, SourceLocationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLiveSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLiveSourcesAsync(array{MaxResults?: int, NextToken?: string, SourceLocationName?: string, ...} $args = [])
 * @method \Aws\Result listPlaybackConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listPlaybackConfigurations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlaybackConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlaybackConfigurationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPrefetchSchedules(array $args = [])
 * @phpstan-method \Aws\Result listPrefetchSchedules(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     PlaybackConfigurationName?: string,
 *     ScheduleType?: 'ALL'|'RECURRING'|'SINGLE',
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrefetchSchedulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrefetchSchedulesAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     PlaybackConfigurationName?: string,
 *     ScheduleType?: 'ALL'|'RECURRING'|'SINGLE',
 *     StreamId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSourceLocations(array $args = [])
 * @phpstan-method \Aws\Result listSourceLocations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSourceLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSourceLocationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVodSources(array $args = [])
 * @phpstan-method \Aws\Result listVodSources(array{MaxResults?: int, NextToken?: string, SourceLocationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVodSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVodSourcesAsync(array{MaxResults?: int, NextToken?: string, SourceLocationName?: string, ...} $args = [])
 * @method \Aws\Result putChannelPolicy(array $args = [])
 * @phpstan-method \Aws\Result putChannelPolicy(array{ChannelName?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putChannelPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putChannelPolicyAsync(array{ChannelName?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result putFunction(array $args = [])
 * @phpstan-method \Aws\Result putFunction(array{
 *     FunctionId?: string,
 *     FunctionType?: 'CUSTOM_OUTPUT'|'HTTP_REQUEST'|'SEQUENTIAL_EXECUTOR',
 *     Description?: string,
 *     HttpRequestConfiguration?: array{
 *         Runtime?: 'JSONATA',
 *         Output?: array<string, string>,
 *         MethodType?: 'GET'|'POST',
 *         RequestTimeoutMilliseconds?: int,
 *         Url?: string,
 *         Body?: string,
 *         Headers?: array<string, string>,
 *         ...,
 *     },
 *     CustomOutputConfiguration?: array{Runtime?: 'JSONATA', Output?: array<string, string>, ...},
 *     SequentialExecutorConfiguration?: array{
 *         Runtime?: 'JSONATA',
 *         Output?: array<string, string>,
 *         FunctionList?: list<array>,
 *         TimeoutMilliseconds?: int,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFunctionAsync(array{
 *     FunctionId?: string,
 *     FunctionType?: 'CUSTOM_OUTPUT'|'HTTP_REQUEST'|'SEQUENTIAL_EXECUTOR',
 *     Description?: string,
 *     HttpRequestConfiguration?: array{
 *         Runtime?: 'JSONATA',
 *         Output?: array<string, string>,
 *         MethodType?: 'GET'|'POST',
 *         RequestTimeoutMilliseconds?: int,
 *         Url?: string,
 *         Body?: string,
 *         Headers?: array<string, string>,
 *         ...,
 *     },
 *     CustomOutputConfiguration?: array{Runtime?: 'JSONATA', Output?: array<string, string>, ...},
 *     SequentialExecutorConfiguration?: array{
 *         Runtime?: 'JSONATA',
 *         Output?: array<string, string>,
 *         FunctionList?: list<array>,
 *         TimeoutMilliseconds?: int,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putPlaybackConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putPlaybackConfiguration(array{
 *     AdDecisionServerUrl?: string,
 *     AvailSuppression?: array{
 *         Mode?: 'AFTER_LIVE_EDGE'|'BEHIND_LIVE_EDGE'|'OFF',
 *         Value?: string,
 *         FillPolicy?: 'FULL_AVAIL_ONLY'|'PARTIAL_AVAIL',
 *         ...,
 *     },
 *     Bumper?: array{EndUrl?: string, StartUrl?: string, ...},
 *     CdnConfiguration?: array{AdSegmentUrlPrefix?: string, ContentSegmentUrlPrefix?: string, ...},
 *     ConfigurationAliases?: array<string, array<string, string>>,
 *     DashConfiguration?: array{MpdLocation?: string, OriginManifestType?: 'MULTI_PERIOD'|'SINGLE_PERIOD', ...},
 *     InsertionMode?: 'PLAYER_SELECT'|'STITCHED_ONLY',
 *     LivePreRollConfiguration?: array{AdDecisionServerUrl?: string, MaxDurationSeconds?: int, ...},
 *     ManifestProcessingRules?: array{AdMarkerPassthrough?: array{Enabled?: bool, ...}, ...},
 *     Name?: string,
 *     PersonalizationThresholdSeconds?: int,
 *     SlateAdUrl?: string,
 *     Tags?: array<string, string>,
 *     TranscodeProfileName?: string,
 *     VideoContentSourceUrl?: string,
 *     AdConditioningConfiguration?: array{StreamingMediaFileConditioning?: 'NONE'|'TRANSCODE', ...},
 *     AdDecisionServerConfiguration?: array{
 *         HttpRequest?: array{
 *             Method?: 'GET'|'POST',
 *             Body?: string,
 *             Headers?: array<string, string>,
 *             CompressRequest?: 'GZIP'|'NONE',
 *             ...,
 *         },
 *         ...,
 *     },
 *     FunctionMapping?: array<string, string>,
 *     AdsPersonalizationTimeouts?: array{
 *         AdsRequestTimeoutMilliseconds?: int,
 *         LiveMaximumAdsPersonalizationTimeMilliseconds?: int,
 *         VodMaximumAdsPersonalizationTimeMilliseconds?: int,
 *         PrefetchAdsRequestTimeoutMilliseconds?: int,
 *         PrefetchMaximumAdsPersonalizationTimeMilliseconds?: int,
 *         ...,
 *     },
 *     AdsPersonalizationConcurrency?: array{MaxConcurrentAdsRequests?: int, EnableVodVastParallelization?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPlaybackConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPlaybackConfigurationAsync(array{
 *     AdDecisionServerUrl?: string,
 *     AvailSuppression?: array{
 *         Mode?: 'AFTER_LIVE_EDGE'|'BEHIND_LIVE_EDGE'|'OFF',
 *         Value?: string,
 *         FillPolicy?: 'FULL_AVAIL_ONLY'|'PARTIAL_AVAIL',
 *         ...,
 *     },
 *     Bumper?: array{EndUrl?: string, StartUrl?: string, ...},
 *     CdnConfiguration?: array{AdSegmentUrlPrefix?: string, ContentSegmentUrlPrefix?: string, ...},
 *     ConfigurationAliases?: array<string, array<string, string>>,
 *     DashConfiguration?: array{MpdLocation?: string, OriginManifestType?: 'MULTI_PERIOD'|'SINGLE_PERIOD', ...},
 *     InsertionMode?: 'PLAYER_SELECT'|'STITCHED_ONLY',
 *     LivePreRollConfiguration?: array{AdDecisionServerUrl?: string, MaxDurationSeconds?: int, ...},
 *     ManifestProcessingRules?: array{AdMarkerPassthrough?: array{Enabled?: bool, ...}, ...},
 *     Name?: string,
 *     PersonalizationThresholdSeconds?: int,
 *     SlateAdUrl?: string,
 *     Tags?: array<string, string>,
 *     TranscodeProfileName?: string,
 *     VideoContentSourceUrl?: string,
 *     AdConditioningConfiguration?: array{StreamingMediaFileConditioning?: 'NONE'|'TRANSCODE', ...},
 *     AdDecisionServerConfiguration?: array{
 *         HttpRequest?: array{
 *             Method?: 'GET'|'POST',
 *             Body?: string,
 *             Headers?: array<string, string>,
 *             CompressRequest?: 'GZIP'|'NONE',
 *             ...,
 *         },
 *         ...,
 *     },
 *     FunctionMapping?: array<string, string>,
 *     AdsPersonalizationTimeouts?: array{
 *         AdsRequestTimeoutMilliseconds?: int,
 *         LiveMaximumAdsPersonalizationTimeMilliseconds?: int,
 *         VodMaximumAdsPersonalizationTimeMilliseconds?: int,
 *         PrefetchAdsRequestTimeoutMilliseconds?: int,
 *         PrefetchMaximumAdsPersonalizationTimeMilliseconds?: int,
 *         ...,
 *     },
 *     AdsPersonalizationConcurrency?: array{MaxConcurrentAdsRequests?: int, EnableVodVastParallelization?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startChannel(array $args = [])
 * @phpstan-method \Aws\Result startChannel(array{ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startChannelAsync(array{ChannelName?: string, ...} $args = [])
 * @method \Aws\Result stopChannel(array $args = [])
 * @phpstan-method \Aws\Result stopChannel(array{ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopChannelAsync(array{ChannelName?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateChannel(array $args = [])
 * @phpstan-method \Aws\Result updateChannel(array{
 *     ChannelName?: string,
 *     FillerSlate?: array{SourceLocationName?: string, VodSourceName?: string, ...},
 *     Outputs?: list<array{
 *         DashPlaylistSettings?: array,
 *         HlsPlaylistSettings?: array,
 *         ManifestName?: string,
 *         SourceGroup?: string,
 *         ...,
 *     }>,
 *     TimeShiftConfiguration?: array{MaxTimeDelaySeconds?: int, ...},
 *     Audiences?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelAsync(array{
 *     ChannelName?: string,
 *     FillerSlate?: array{SourceLocationName?: string, VodSourceName?: string, ...},
 *     Outputs?: list<array{
 *         DashPlaylistSettings?: array,
 *         HlsPlaylistSettings?: array,
 *         ManifestName?: string,
 *         SourceGroup?: string,
 *         ...,
 *     }>,
 *     TimeShiftConfiguration?: array{MaxTimeDelaySeconds?: int, ...},
 *     Audiences?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLiveSource(array $args = [])
 * @phpstan-method \Aws\Result updateLiveSource(array{
 *     HttpPackageConfigurations?: list<array{Path?: string, SourceGroup?: string, Type?: 'DASH'|'HLS', ...}>,
 *     LiveSourceName?: string,
 *     SourceLocationName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLiveSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLiveSourceAsync(array{
 *     HttpPackageConfigurations?: list<array{Path?: string, SourceGroup?: string, Type?: 'DASH'|'HLS', ...}>,
 *     LiveSourceName?: string,
 *     SourceLocationName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProgram(array $args = [])
 * @phpstan-method \Aws\Result updateProgram(array{
 *     AdBreaks?: list<array{
 *         MessageType?: 'SPLICE_INSERT'|'TIME_SIGNAL',
 *         OffsetMillis?: int,
 *         Slate?: array,
 *         SpliceInsertMessage?: array,
 *         TimeSignalMessage?: array,
 *         AdBreakMetadata?: list<array>,
 *         ...,
 *     }>,
 *     ChannelName?: string,
 *     ProgramName?: string,
 *     ScheduleConfiguration?: array{
 *         Transition?: array{ScheduledStartTimeMillis?: int, DurationMillis?: int, ...},
 *         ClipRange?: array{EndOffsetMillis?: int, StartOffsetMillis?: int, ...},
 *         ...,
 *     },
 *     AudienceMedia?: list<array{Audience?: string, AlternateMedia?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProgramAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProgramAsync(array{
 *     AdBreaks?: list<array{
 *         MessageType?: 'SPLICE_INSERT'|'TIME_SIGNAL',
 *         OffsetMillis?: int,
 *         Slate?: array,
 *         SpliceInsertMessage?: array,
 *         TimeSignalMessage?: array,
 *         AdBreakMetadata?: list<array>,
 *         ...,
 *     }>,
 *     ChannelName?: string,
 *     ProgramName?: string,
 *     ScheduleConfiguration?: array{
 *         Transition?: array{ScheduledStartTimeMillis?: int, DurationMillis?: int, ...},
 *         ClipRange?: array{EndOffsetMillis?: int, StartOffsetMillis?: int, ...},
 *         ...,
 *     },
 *     AudienceMedia?: list<array{Audience?: string, AlternateMedia?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSourceLocation(array $args = [])
 * @phpstan-method \Aws\Result updateSourceLocation(array{
 *     AccessConfiguration?: array{
 *         AccessType?: 'AUTODETECT_SIGV4'|'S3_SIGV4'|'SECRETS_MANAGER_ACCESS_TOKEN',
 *         SecretsManagerAccessTokenConfiguration?: array{HeaderName?: string, SecretArn?: string, SecretStringKey?: string, ...},
 *         ...,
 *     },
 *     DefaultSegmentDeliveryConfiguration?: array{BaseUrl?: string, ...},
 *     HttpConfiguration?: array{BaseUrl?: string, ...},
 *     SegmentDeliveryConfigurations?: list<array{BaseUrl?: string, Name?: string, ...}>,
 *     SourceLocationName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSourceLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSourceLocationAsync(array{
 *     AccessConfiguration?: array{
 *         AccessType?: 'AUTODETECT_SIGV4'|'S3_SIGV4'|'SECRETS_MANAGER_ACCESS_TOKEN',
 *         SecretsManagerAccessTokenConfiguration?: array{HeaderName?: string, SecretArn?: string, SecretStringKey?: string, ...},
 *         ...,
 *     },
 *     DefaultSegmentDeliveryConfiguration?: array{BaseUrl?: string, ...},
 *     HttpConfiguration?: array{BaseUrl?: string, ...},
 *     SegmentDeliveryConfigurations?: list<array{BaseUrl?: string, Name?: string, ...}>,
 *     SourceLocationName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVodSource(array $args = [])
 * @phpstan-method \Aws\Result updateVodSource(array{
 *     HttpPackageConfigurations?: list<array{Path?: string, SourceGroup?: string, Type?: 'DASH'|'HLS', ...}>,
 *     SourceLocationName?: string,
 *     VodSourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVodSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVodSourceAsync(array{
 *     HttpPackageConfigurations?: list<array{Path?: string, SourceGroup?: string, Type?: 'DASH'|'HLS', ...}>,
 *     SourceLocationName?: string,
 *     VodSourceName?: string,
 *     ...,
 * } $args = [])
 */
class MediaTailorClient extends AwsClient {}
