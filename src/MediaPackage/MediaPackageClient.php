<?php
namespace Aws\MediaPackage;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaPackage** service.
 * @method \Aws\Result configureLogs(array $args = [])
 * @phpstan-method \Aws\Result configureLogs(array{
 *     EgressAccessLogs?: array{LogGroupName?: string, ...},
 *     Id?: string,
 *     IngressAccessLogs?: array{LogGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise configureLogsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise configureLogsAsync(array{
 *     EgressAccessLogs?: array{LogGroupName?: string, ...},
 *     Id?: string,
 *     IngressAccessLogs?: array{LogGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChannel(array $args = [])
 * @phpstan-method \Aws\Result createChannel(array{Description?: string, Id?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelAsync(array{Description?: string, Id?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createHarvestJob(array $args = [])
 * @phpstan-method \Aws\Result createHarvestJob(array{
 *     EndTime?: string,
 *     Id?: string,
 *     OriginEndpointId?: string,
 *     S3Destination?: array{BucketName?: string, ManifestKey?: string, RoleArn?: string, ...},
 *     StartTime?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHarvestJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHarvestJobAsync(array{
 *     EndTime?: string,
 *     Id?: string,
 *     OriginEndpointId?: string,
 *     S3Destination?: array{BucketName?: string, ManifestKey?: string, RoleArn?: string, ...},
 *     StartTime?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOriginEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createOriginEndpoint(array{
 *     Authorization?: array{CdnIdentifierSecret?: string, SecretsRoleArn?: string, ...},
 *     ChannelId?: string,
 *     CmafPackage?: array{
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: 'AES_CTR'|'SAMPLE_AES',
 *             KeyRotationIntervalSeconds?: int,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         HlsManifests?: list<array>,
 *         SegmentDurationSeconds?: int,
 *         SegmentPrefix?: string,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         ...,
 *     },
 *     DashPackage?: array{
 *         AdTriggers?: list<'BREAK'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'SPLICE_INSERT'>,
 *         AdsOnDeliveryRestrictions?: 'BOTH'|'NONE'|'RESTRICTED'|'UNRESTRICTED',
 *         Encryption?: array{KeyRotationIntervalSeconds?: int, SpekeKeyProvider?: array, ...},
 *         IncludeIframeOnlyStream?: bool,
 *         ManifestLayout?: 'COMPACT'|'DRM_TOP_LEVEL_COMPACT'|'FULL',
 *         ManifestWindowSeconds?: int,
 *         MinBufferTimeSeconds?: int,
 *         MinUpdatePeriodSeconds?: int,
 *         PeriodTriggers?: list<'ADS'>,
 *         Profile?: 'DVB_DASH_2014'|'HBBTV_1_5'|'HYBRIDCAST'|'NONE',
 *         SegmentDurationSeconds?: int,
 *         SegmentTemplateFormat?: 'NUMBER_WITH_DURATION'|'NUMBER_WITH_TIMELINE'|'TIME_WITH_TIMELINE',
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         SuggestedPresentationDelaySeconds?: int,
 *         UtcTiming?: 'HTTP-HEAD'|'HTTP-ISO'|'HTTP-XSDATE'|'NONE',
 *         UtcTimingUri?: string,
 *         ...,
 *     },
 *     Description?: string,
 *     HlsPackage?: array{
 *         AdMarkers?: 'DATERANGE'|'NONE'|'PASSTHROUGH'|'SCTE35_ENHANCED',
 *         AdTriggers?: list<'BREAK'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'SPLICE_INSERT'>,
 *         AdsOnDeliveryRestrictions?: 'BOTH'|'NONE'|'RESTRICTED'|'UNRESTRICTED',
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: 'AES_128'|'SAMPLE_AES',
 *             KeyRotationIntervalSeconds?: int,
 *             RepeatExtXKey?: bool,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         IncludeDvbSubtitles?: bool,
 *         IncludeIframeOnlyStream?: bool,
 *         PlaylistType?: 'EVENT'|'NONE'|'VOD',
 *         PlaylistWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         SegmentDurationSeconds?: int,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         UseAudioRenditionGroup?: bool,
 *         ...,
 *     },
 *     Id?: string,
 *     ManifestName?: string,
 *     MssPackage?: array{
 *         Encryption?: array{SpekeKeyProvider?: array, ...},
 *         ManifestWindowSeconds?: int,
 *         SegmentDurationSeconds?: int,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         ...,
 *     },
 *     Origination?: 'ALLOW'|'DENY',
 *     StartoverWindowSeconds?: int,
 *     Tags?: array<string, string>,
 *     TimeDelaySeconds?: int,
 *     Whitelist?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOriginEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOriginEndpointAsync(array{
 *     Authorization?: array{CdnIdentifierSecret?: string, SecretsRoleArn?: string, ...},
 *     ChannelId?: string,
 *     CmafPackage?: array{
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: 'AES_CTR'|'SAMPLE_AES',
 *             KeyRotationIntervalSeconds?: int,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         HlsManifests?: list<array>,
 *         SegmentDurationSeconds?: int,
 *         SegmentPrefix?: string,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         ...,
 *     },
 *     DashPackage?: array{
 *         AdTriggers?: list<'BREAK'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'SPLICE_INSERT'>,
 *         AdsOnDeliveryRestrictions?: 'BOTH'|'NONE'|'RESTRICTED'|'UNRESTRICTED',
 *         Encryption?: array{KeyRotationIntervalSeconds?: int, SpekeKeyProvider?: array, ...},
 *         IncludeIframeOnlyStream?: bool,
 *         ManifestLayout?: 'COMPACT'|'DRM_TOP_LEVEL_COMPACT'|'FULL',
 *         ManifestWindowSeconds?: int,
 *         MinBufferTimeSeconds?: int,
 *         MinUpdatePeriodSeconds?: int,
 *         PeriodTriggers?: list<'ADS'>,
 *         Profile?: 'DVB_DASH_2014'|'HBBTV_1_5'|'HYBRIDCAST'|'NONE',
 *         SegmentDurationSeconds?: int,
 *         SegmentTemplateFormat?: 'NUMBER_WITH_DURATION'|'NUMBER_WITH_TIMELINE'|'TIME_WITH_TIMELINE',
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         SuggestedPresentationDelaySeconds?: int,
 *         UtcTiming?: 'HTTP-HEAD'|'HTTP-ISO'|'HTTP-XSDATE'|'NONE',
 *         UtcTimingUri?: string,
 *         ...,
 *     },
 *     Description?: string,
 *     HlsPackage?: array{
 *         AdMarkers?: 'DATERANGE'|'NONE'|'PASSTHROUGH'|'SCTE35_ENHANCED',
 *         AdTriggers?: list<'BREAK'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'SPLICE_INSERT'>,
 *         AdsOnDeliveryRestrictions?: 'BOTH'|'NONE'|'RESTRICTED'|'UNRESTRICTED',
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: 'AES_128'|'SAMPLE_AES',
 *             KeyRotationIntervalSeconds?: int,
 *             RepeatExtXKey?: bool,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         IncludeDvbSubtitles?: bool,
 *         IncludeIframeOnlyStream?: bool,
 *         PlaylistType?: 'EVENT'|'NONE'|'VOD',
 *         PlaylistWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         SegmentDurationSeconds?: int,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         UseAudioRenditionGroup?: bool,
 *         ...,
 *     },
 *     Id?: string,
 *     ManifestName?: string,
 *     MssPackage?: array{
 *         Encryption?: array{SpekeKeyProvider?: array, ...},
 *         ManifestWindowSeconds?: int,
 *         SegmentDurationSeconds?: int,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         ...,
 *     },
 *     Origination?: 'ALLOW'|'DENY',
 *     StartoverWindowSeconds?: int,
 *     Tags?: array<string, string>,
 *     TimeDelaySeconds?: int,
 *     Whitelist?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteChannel(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteOriginEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteOriginEndpoint(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOriginEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOriginEndpointAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describeChannel(array $args = [])
 * @phpstan-method \Aws\Result describeChannel(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describeHarvestJob(array $args = [])
 * @phpstan-method \Aws\Result describeHarvestJob(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHarvestJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHarvestJobAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describeOriginEndpoint(array $args = [])
 * @phpstan-method \Aws\Result describeOriginEndpoint(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOriginEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOriginEndpointAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @phpstan-method \Aws\Result listChannels(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listHarvestJobs(array $args = [])
 * @phpstan-method \Aws\Result listHarvestJobs(array{IncludeChannelId?: string, IncludeStatus?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHarvestJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHarvestJobsAsync(array{IncludeChannelId?: string, IncludeStatus?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listOriginEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listOriginEndpoints(array{ChannelId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOriginEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOriginEndpointsAsync(array{ChannelId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result rotateChannelCredentials(array $args = [])
 * @phpstan-method \Aws\Result rotateChannelCredentials(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rotateChannelCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rotateChannelCredentialsAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result rotateIngestEndpointCredentials(array $args = [])
 * @phpstan-method \Aws\Result rotateIngestEndpointCredentials(array{Id?: string, IngestEndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rotateIngestEndpointCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rotateIngestEndpointCredentialsAsync(array{Id?: string, IngestEndpointId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateChannel(array $args = [])
 * @phpstan-method \Aws\Result updateChannel(array{Description?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelAsync(array{Description?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result updateOriginEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateOriginEndpoint(array{
 *     Authorization?: array{CdnIdentifierSecret?: string, SecretsRoleArn?: string, ...},
 *     CmafPackage?: array{
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: 'AES_CTR'|'SAMPLE_AES',
 *             KeyRotationIntervalSeconds?: int,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         HlsManifests?: list<array>,
 *         SegmentDurationSeconds?: int,
 *         SegmentPrefix?: string,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         ...,
 *     },
 *     DashPackage?: array{
 *         AdTriggers?: list<'BREAK'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'SPLICE_INSERT'>,
 *         AdsOnDeliveryRestrictions?: 'BOTH'|'NONE'|'RESTRICTED'|'UNRESTRICTED',
 *         Encryption?: array{KeyRotationIntervalSeconds?: int, SpekeKeyProvider?: array, ...},
 *         IncludeIframeOnlyStream?: bool,
 *         ManifestLayout?: 'COMPACT'|'DRM_TOP_LEVEL_COMPACT'|'FULL',
 *         ManifestWindowSeconds?: int,
 *         MinBufferTimeSeconds?: int,
 *         MinUpdatePeriodSeconds?: int,
 *         PeriodTriggers?: list<'ADS'>,
 *         Profile?: 'DVB_DASH_2014'|'HBBTV_1_5'|'HYBRIDCAST'|'NONE',
 *         SegmentDurationSeconds?: int,
 *         SegmentTemplateFormat?: 'NUMBER_WITH_DURATION'|'NUMBER_WITH_TIMELINE'|'TIME_WITH_TIMELINE',
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         SuggestedPresentationDelaySeconds?: int,
 *         UtcTiming?: 'HTTP-HEAD'|'HTTP-ISO'|'HTTP-XSDATE'|'NONE',
 *         UtcTimingUri?: string,
 *         ...,
 *     },
 *     Description?: string,
 *     HlsPackage?: array{
 *         AdMarkers?: 'DATERANGE'|'NONE'|'PASSTHROUGH'|'SCTE35_ENHANCED',
 *         AdTriggers?: list<'BREAK'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'SPLICE_INSERT'>,
 *         AdsOnDeliveryRestrictions?: 'BOTH'|'NONE'|'RESTRICTED'|'UNRESTRICTED',
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: 'AES_128'|'SAMPLE_AES',
 *             KeyRotationIntervalSeconds?: int,
 *             RepeatExtXKey?: bool,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         IncludeDvbSubtitles?: bool,
 *         IncludeIframeOnlyStream?: bool,
 *         PlaylistType?: 'EVENT'|'NONE'|'VOD',
 *         PlaylistWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         SegmentDurationSeconds?: int,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         UseAudioRenditionGroup?: bool,
 *         ...,
 *     },
 *     Id?: string,
 *     ManifestName?: string,
 *     MssPackage?: array{
 *         Encryption?: array{SpekeKeyProvider?: array, ...},
 *         ManifestWindowSeconds?: int,
 *         SegmentDurationSeconds?: int,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         ...,
 *     },
 *     Origination?: 'ALLOW'|'DENY',
 *     StartoverWindowSeconds?: int,
 *     TimeDelaySeconds?: int,
 *     Whitelist?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOriginEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOriginEndpointAsync(array{
 *     Authorization?: array{CdnIdentifierSecret?: string, SecretsRoleArn?: string, ...},
 *     CmafPackage?: array{
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: 'AES_CTR'|'SAMPLE_AES',
 *             KeyRotationIntervalSeconds?: int,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         HlsManifests?: list<array>,
 *         SegmentDurationSeconds?: int,
 *         SegmentPrefix?: string,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         ...,
 *     },
 *     DashPackage?: array{
 *         AdTriggers?: list<'BREAK'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'SPLICE_INSERT'>,
 *         AdsOnDeliveryRestrictions?: 'BOTH'|'NONE'|'RESTRICTED'|'UNRESTRICTED',
 *         Encryption?: array{KeyRotationIntervalSeconds?: int, SpekeKeyProvider?: array, ...},
 *         IncludeIframeOnlyStream?: bool,
 *         ManifestLayout?: 'COMPACT'|'DRM_TOP_LEVEL_COMPACT'|'FULL',
 *         ManifestWindowSeconds?: int,
 *         MinBufferTimeSeconds?: int,
 *         MinUpdatePeriodSeconds?: int,
 *         PeriodTriggers?: list<'ADS'>,
 *         Profile?: 'DVB_DASH_2014'|'HBBTV_1_5'|'HYBRIDCAST'|'NONE',
 *         SegmentDurationSeconds?: int,
 *         SegmentTemplateFormat?: 'NUMBER_WITH_DURATION'|'NUMBER_WITH_TIMELINE'|'TIME_WITH_TIMELINE',
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         SuggestedPresentationDelaySeconds?: int,
 *         UtcTiming?: 'HTTP-HEAD'|'HTTP-ISO'|'HTTP-XSDATE'|'NONE',
 *         UtcTimingUri?: string,
 *         ...,
 *     },
 *     Description?: string,
 *     HlsPackage?: array{
 *         AdMarkers?: 'DATERANGE'|'NONE'|'PASSTHROUGH'|'SCTE35_ENHANCED',
 *         AdTriggers?: list<'BREAK'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'SPLICE_INSERT'>,
 *         AdsOnDeliveryRestrictions?: 'BOTH'|'NONE'|'RESTRICTED'|'UNRESTRICTED',
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: 'AES_128'|'SAMPLE_AES',
 *             KeyRotationIntervalSeconds?: int,
 *             RepeatExtXKey?: bool,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         IncludeDvbSubtitles?: bool,
 *         IncludeIframeOnlyStream?: bool,
 *         PlaylistType?: 'EVENT'|'NONE'|'VOD',
 *         PlaylistWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         SegmentDurationSeconds?: int,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         UseAudioRenditionGroup?: bool,
 *         ...,
 *     },
 *     Id?: string,
 *     ManifestName?: string,
 *     MssPackage?: array{
 *         Encryption?: array{SpekeKeyProvider?: array, ...},
 *         ManifestWindowSeconds?: int,
 *         SegmentDurationSeconds?: int,
 *         StreamSelection?: array{
 *             MaxVideoBitsPerSecond?: int,
 *             MinVideoBitsPerSecond?: int,
 *             StreamOrder?: 'ORIGINAL'|'VIDEO_BITRATE_ASCENDING'|'VIDEO_BITRATE_DESCENDING',
 *             ...,
 *         },
 *         ...,
 *     },
 *     Origination?: 'ALLOW'|'DENY',
 *     StartoverWindowSeconds?: int,
 *     TimeDelaySeconds?: int,
 *     Whitelist?: list<string>,
 *     ...,
 * } $args = [])
 */
class MediaPackageClient extends AwsClient {}
