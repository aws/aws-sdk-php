<?php
namespace Aws\MediaPackageV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaPackage v2** service.
 * @method \Aws\Result cancelHarvestJob(array $args = [])
 * @phpstan-method \Aws\Result cancelHarvestJob(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     HarvestJobName?: string,
 *     ETag?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelHarvestJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelHarvestJobAsync(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     HarvestJobName?: string,
 *     ETag?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChannel(array $args = [])
 * @phpstan-method \Aws\Result createChannel(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     ClientToken?: string,
 *     InputType?: 'CMAF'|'HLS',
 *     Description?: string,
 *     InputSwitchConfiguration?: array{MQCSInputSwitching?: bool, PreferredInput?: int, ...},
 *     OutputHeaderConfiguration?: array{PublishMQCS?: bool, ...},
 *     OutputLockingMode?: 'EPOCH_LOCKED'|'NON_EPOCH_LOCKED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelAsync(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     ClientToken?: string,
 *     InputType?: 'CMAF'|'HLS',
 *     Description?: string,
 *     InputSwitchConfiguration?: array{MQCSInputSwitching?: bool, PreferredInput?: int, ...},
 *     OutputHeaderConfiguration?: array{PublishMQCS?: bool, ...},
 *     OutputLockingMode?: 'EPOCH_LOCKED'|'NON_EPOCH_LOCKED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChannelGroup(array $args = [])
 * @phpstan-method \Aws\Result createChannelGroup(array{
 *     ChannelGroupName?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelGroupAsync(array{
 *     ChannelGroupName?: string,
 *     ClientToken?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHarvestJob(array $args = [])
 * @phpstan-method \Aws\Result createHarvestJob(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     Description?: string,
 *     HarvestedManifests?: array{HlsManifests?: list<array>, DashManifests?: list<array>, LowLatencyHlsManifests?: list<array>, ...},
 *     ScheduleConfiguration?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Destination?: array{S3Destination?: array{BucketName?: string, DestinationPath?: string, ...}, ...},
 *     ClientToken?: string,
 *     HarvestJobName?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHarvestJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHarvestJobAsync(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     Description?: string,
 *     HarvestedManifests?: array{HlsManifests?: list<array>, DashManifests?: list<array>, LowLatencyHlsManifests?: list<array>, ...},
 *     ScheduleConfiguration?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Destination?: array{S3Destination?: array{BucketName?: string, DestinationPath?: string, ...}, ...},
 *     ClientToken?: string,
 *     HarvestJobName?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOriginEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createOriginEndpoint(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     ContainerType?: 'CMAF'|'ISM'|'TS',
 *     Segment?: array{
 *         SegmentDurationSeconds?: int,
 *         SegmentName?: string,
 *         TsUseAudioRenditionGroup?: bool,
 *         IncludeIframeOnlyStreams?: bool,
 *         TsIncludeDvbSubtitles?: bool,
 *         Scte?: array{
 *             ScteFilter?: list<'ALTERNATE_CONTENT_OPPORTUNITY'|'BREAK'|'CALL_AD_SERVER'|'CHAPTER'|'CONTENT_IDENTIFICATION'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_AD_BLOCK'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PROMO'|'NETWORK'|'PROGRAM'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_AD_BLOCK'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'PROVIDER_PROMO'|'SPLICE_INSERT'|'UNSCHEDULED_EVENT'>,
 *             ScteInSegments?: 'ALL'|'MATCHES_FILTER'|'NONE',
 *             CustomAdTypes?: list<'ALTERNATE_CONTENT_OPPORTUNITY'|'CHAPTER'|'NETWORK'|'PROGRAM'|'UNSCHEDULED_EVENT'>,
 *             ...,
 *         },
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: array,
 *             KeyRotationIntervalSeconds?: int,
 *             CmafExcludeSegmentDrmMetadata?: bool,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         OutputTimestampMode?: 'PASSTHROUGH'|'REBASED_TO_CHANNEL_START',
 *         ...,
 *     },
 *     ClientToken?: string,
 *     Description?: string,
 *     StartoverWindowSeconds?: int,
 *     HlsManifests?: list<array{
 *         ManifestName?: string,
 *         ChildManifestName?: string,
 *         ScteHls?: array,
 *         StartTag?: array,
 *         ManifestWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         FilterConfiguration?: array,
 *         UrlEncodeChildManifest?: bool,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         ...,
 *     }>,
 *     LowLatencyHlsManifests?: list<array{
 *         ManifestName?: string,
 *         ChildManifestName?: string,
 *         ScteHls?: array,
 *         StartTag?: array,
 *         ManifestWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         FilterConfiguration?: array,
 *         UrlEncodeChildManifest?: bool,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         ...,
 *     }>,
 *     DashManifests?: list<array{
 *         ManifestName?: string,
 *         ManifestWindowSeconds?: int,
 *         FilterConfiguration?: array,
 *         MinUpdatePeriodSeconds?: int,
 *         MinBufferTimeSeconds?: int,
 *         SuggestedPresentationDelaySeconds?: int,
 *         SegmentTemplateFormat?: 'NUMBER_WITH_TIMELINE',
 *         PeriodTriggers?: list<'AVAILS'|'DRM_KEY_ROTATION'|'NONE'|'SOURCE_CHANGES'|'SOURCE_DISRUPTIONS'>,
 *         ScteDash?: array,
 *         DrmSignaling?: 'INDIVIDUAL'|'REFERENCED',
 *         UtcTiming?: array,
 *         Profiles?: list<'DVB_DASH'>,
 *         BaseUrls?: list<array>,
 *         ProgramInformation?: array,
 *         DvbSettings?: array,
 *         Compactness?: 'NONE'|'STANDARD',
 *         AudioTimelinePattern?: 'NONE'|'PATTERNED',
 *         SubtitleConfiguration?: array,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         AvailabilityStartTimeConfiguration?: array,
 *         ...,
 *     }>,
 *     MssManifests?: list<array{
 *         ManifestName?: string,
 *         ManifestWindowSeconds?: int,
 *         FilterConfiguration?: array,
 *         ManifestLayout?: 'COMPACT'|'FULL',
 *         ...,
 *     }>,
 *     ForceEndpointErrorConfiguration?: array{
 *         EndpointErrorConditions?: list<'INCOMPLETE_MANIFEST'|'MISSING_DRM_KEY'|'SLATE_INPUT'|'STALE_MANIFEST'>,
 *         ...,
 *     },
 *     UriSeparator?: 'HYPHEN'|'UNDERSCORE',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOriginEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOriginEndpointAsync(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     ContainerType?: 'CMAF'|'ISM'|'TS',
 *     Segment?: array{
 *         SegmentDurationSeconds?: int,
 *         SegmentName?: string,
 *         TsUseAudioRenditionGroup?: bool,
 *         IncludeIframeOnlyStreams?: bool,
 *         TsIncludeDvbSubtitles?: bool,
 *         Scte?: array{
 *             ScteFilter?: list<'ALTERNATE_CONTENT_OPPORTUNITY'|'BREAK'|'CALL_AD_SERVER'|'CHAPTER'|'CONTENT_IDENTIFICATION'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_AD_BLOCK'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PROMO'|'NETWORK'|'PROGRAM'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_AD_BLOCK'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'PROVIDER_PROMO'|'SPLICE_INSERT'|'UNSCHEDULED_EVENT'>,
 *             ScteInSegments?: 'ALL'|'MATCHES_FILTER'|'NONE',
 *             CustomAdTypes?: list<'ALTERNATE_CONTENT_OPPORTUNITY'|'CHAPTER'|'NETWORK'|'PROGRAM'|'UNSCHEDULED_EVENT'>,
 *             ...,
 *         },
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: array,
 *             KeyRotationIntervalSeconds?: int,
 *             CmafExcludeSegmentDrmMetadata?: bool,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         OutputTimestampMode?: 'PASSTHROUGH'|'REBASED_TO_CHANNEL_START',
 *         ...,
 *     },
 *     ClientToken?: string,
 *     Description?: string,
 *     StartoverWindowSeconds?: int,
 *     HlsManifests?: list<array{
 *         ManifestName?: string,
 *         ChildManifestName?: string,
 *         ScteHls?: array,
 *         StartTag?: array,
 *         ManifestWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         FilterConfiguration?: array,
 *         UrlEncodeChildManifest?: bool,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         ...,
 *     }>,
 *     LowLatencyHlsManifests?: list<array{
 *         ManifestName?: string,
 *         ChildManifestName?: string,
 *         ScteHls?: array,
 *         StartTag?: array,
 *         ManifestWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         FilterConfiguration?: array,
 *         UrlEncodeChildManifest?: bool,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         ...,
 *     }>,
 *     DashManifests?: list<array{
 *         ManifestName?: string,
 *         ManifestWindowSeconds?: int,
 *         FilterConfiguration?: array,
 *         MinUpdatePeriodSeconds?: int,
 *         MinBufferTimeSeconds?: int,
 *         SuggestedPresentationDelaySeconds?: int,
 *         SegmentTemplateFormat?: 'NUMBER_WITH_TIMELINE',
 *         PeriodTriggers?: list<'AVAILS'|'DRM_KEY_ROTATION'|'NONE'|'SOURCE_CHANGES'|'SOURCE_DISRUPTIONS'>,
 *         ScteDash?: array,
 *         DrmSignaling?: 'INDIVIDUAL'|'REFERENCED',
 *         UtcTiming?: array,
 *         Profiles?: list<'DVB_DASH'>,
 *         BaseUrls?: list<array>,
 *         ProgramInformation?: array,
 *         DvbSettings?: array,
 *         Compactness?: 'NONE'|'STANDARD',
 *         AudioTimelinePattern?: 'NONE'|'PATTERNED',
 *         SubtitleConfiguration?: array,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         AvailabilityStartTimeConfiguration?: array,
 *         ...,
 *     }>,
 *     MssManifests?: list<array{
 *         ManifestName?: string,
 *         ManifestWindowSeconds?: int,
 *         FilterConfiguration?: array,
 *         ManifestLayout?: 'COMPACT'|'FULL',
 *         ...,
 *     }>,
 *     ForceEndpointErrorConfiguration?: array{
 *         EndpointErrorConditions?: list<'INCOMPLETE_MANIFEST'|'MISSING_DRM_KEY'|'SLATE_INPUT'|'STALE_MANIFEST'>,
 *         ...,
 *     },
 *     UriSeparator?: 'HYPHEN'|'UNDERSCORE',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteChannel(array{ChannelGroupName?: string, ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelAsync(array{ChannelGroupName?: string, ChannelName?: string, ...} $args = [])
 * @method \Aws\Result deleteChannelGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteChannelGroup(array{ChannelGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelGroupAsync(array{ChannelGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteChannelPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteChannelPolicy(array{ChannelGroupName?: string, ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelPolicyAsync(array{ChannelGroupName?: string, ChannelName?: string, ...} $args = [])
 * @method \Aws\Result deleteOriginEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteOriginEndpoint(array{ChannelGroupName?: string, ChannelName?: string, OriginEndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOriginEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOriginEndpointAsync(array{ChannelGroupName?: string, ChannelName?: string, OriginEndpointName?: string, ...} $args = [])
 * @method \Aws\Result deleteOriginEndpointPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteOriginEndpointPolicy(array{ChannelGroupName?: string, ChannelName?: string, OriginEndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOriginEndpointPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOriginEndpointPolicyAsync(array{ChannelGroupName?: string, ChannelName?: string, OriginEndpointName?: string, ...} $args = [])
 * @method \Aws\Result getChannel(array $args = [])
 * @phpstan-method \Aws\Result getChannel(array{ChannelGroupName?: string, ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelAsync(array{ChannelGroupName?: string, ChannelName?: string, ...} $args = [])
 * @method \Aws\Result getChannelGroup(array $args = [])
 * @phpstan-method \Aws\Result getChannelGroup(array{ChannelGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelGroupAsync(array{ChannelGroupName?: string, ...} $args = [])
 * @method \Aws\Result getChannelPolicy(array $args = [])
 * @phpstan-method \Aws\Result getChannelPolicy(array{ChannelGroupName?: string, ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelPolicyAsync(array{ChannelGroupName?: string, ChannelName?: string, ...} $args = [])
 * @method \Aws\Result getHarvestJob(array $args = [])
 * @phpstan-method \Aws\Result getHarvestJob(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     HarvestJobName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getHarvestJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHarvestJobAsync(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     HarvestJobName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getOriginEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getOriginEndpoint(array{ChannelGroupName?: string, ChannelName?: string, OriginEndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOriginEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOriginEndpointAsync(array{ChannelGroupName?: string, ChannelName?: string, OriginEndpointName?: string, ...} $args = [])
 * @method \Aws\Result getOriginEndpointPolicy(array $args = [])
 * @phpstan-method \Aws\Result getOriginEndpointPolicy(array{ChannelGroupName?: string, ChannelName?: string, OriginEndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOriginEndpointPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOriginEndpointPolicyAsync(array{ChannelGroupName?: string, ChannelName?: string, OriginEndpointName?: string, ...} $args = [])
 * @method \Aws\Result listChannelGroups(array $args = [])
 * @phpstan-method \Aws\Result listChannelGroups(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelGroupsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @phpstan-method \Aws\Result listChannels(array{ChannelGroupName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsAsync(array{ChannelGroupName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listHarvestJobs(array $args = [])
 * @phpstan-method \Aws\Result listHarvestJobs(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     Status?: 'CANCELLED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'QUEUED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHarvestJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHarvestJobsAsync(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     Status?: 'CANCELLED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'QUEUED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOriginEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listOriginEndpoints(array{ChannelGroupName?: string, ChannelName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOriginEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOriginEndpointsAsync(array{ChannelGroupName?: string, ChannelName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putChannelPolicy(array $args = [])
 * @phpstan-method \Aws\Result putChannelPolicy(array{ChannelGroupName?: string, ChannelName?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putChannelPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putChannelPolicyAsync(array{ChannelGroupName?: string, ChannelName?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result putOriginEndpointPolicy(array $args = [])
 * @phpstan-method \Aws\Result putOriginEndpointPolicy(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     Policy?: string,
 *     CdnAuthConfiguration?: array{CdnIdentifierSecretArns?: list<string>, SecretsRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putOriginEndpointPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putOriginEndpointPolicyAsync(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     Policy?: string,
 *     CdnAuthConfiguration?: array{CdnIdentifierSecretArns?: list<string>, SecretsRoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result resetChannelState(array $args = [])
 * @phpstan-method \Aws\Result resetChannelState(array{ChannelGroupName?: string, ChannelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetChannelStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetChannelStateAsync(array{ChannelGroupName?: string, ChannelName?: string, ...} $args = [])
 * @method \Aws\Result resetOriginEndpointState(array $args = [])
 * @phpstan-method \Aws\Result resetOriginEndpointState(array{ChannelGroupName?: string, ChannelName?: string, OriginEndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetOriginEndpointStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetOriginEndpointStateAsync(array{ChannelGroupName?: string, ChannelName?: string, OriginEndpointName?: string, ...} $args = [])
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
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     ETag?: string,
 *     Description?: string,
 *     InputSwitchConfiguration?: array{MQCSInputSwitching?: bool, PreferredInput?: int, ...},
 *     OutputHeaderConfiguration?: array{PublishMQCS?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelAsync(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     ETag?: string,
 *     Description?: string,
 *     InputSwitchConfiguration?: array{MQCSInputSwitching?: bool, PreferredInput?: int, ...},
 *     OutputHeaderConfiguration?: array{PublishMQCS?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateChannelGroup(array $args = [])
 * @phpstan-method \Aws\Result updateChannelGroup(array{ChannelGroupName?: string, ETag?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelGroupAsync(array{ChannelGroupName?: string, ETag?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateOriginEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateOriginEndpoint(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     ContainerType?: 'CMAF'|'ISM'|'TS',
 *     Segment?: array{
 *         SegmentDurationSeconds?: int,
 *         SegmentName?: string,
 *         TsUseAudioRenditionGroup?: bool,
 *         IncludeIframeOnlyStreams?: bool,
 *         TsIncludeDvbSubtitles?: bool,
 *         Scte?: array{
 *             ScteFilter?: list<'ALTERNATE_CONTENT_OPPORTUNITY'|'BREAK'|'CALL_AD_SERVER'|'CHAPTER'|'CONTENT_IDENTIFICATION'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_AD_BLOCK'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PROMO'|'NETWORK'|'PROGRAM'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_AD_BLOCK'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'PROVIDER_PROMO'|'SPLICE_INSERT'|'UNSCHEDULED_EVENT'>,
 *             ScteInSegments?: 'ALL'|'MATCHES_FILTER'|'NONE',
 *             CustomAdTypes?: list<'ALTERNATE_CONTENT_OPPORTUNITY'|'CHAPTER'|'NETWORK'|'PROGRAM'|'UNSCHEDULED_EVENT'>,
 *             ...,
 *         },
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: array,
 *             KeyRotationIntervalSeconds?: int,
 *             CmafExcludeSegmentDrmMetadata?: bool,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         OutputTimestampMode?: 'PASSTHROUGH'|'REBASED_TO_CHANNEL_START',
 *         ...,
 *     },
 *     Description?: string,
 *     StartoverWindowSeconds?: int,
 *     HlsManifests?: list<array{
 *         ManifestName?: string,
 *         ChildManifestName?: string,
 *         ScteHls?: array,
 *         StartTag?: array,
 *         ManifestWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         FilterConfiguration?: array,
 *         UrlEncodeChildManifest?: bool,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         ...,
 *     }>,
 *     LowLatencyHlsManifests?: list<array{
 *         ManifestName?: string,
 *         ChildManifestName?: string,
 *         ScteHls?: array,
 *         StartTag?: array,
 *         ManifestWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         FilterConfiguration?: array,
 *         UrlEncodeChildManifest?: bool,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         ...,
 *     }>,
 *     DashManifests?: list<array{
 *         ManifestName?: string,
 *         ManifestWindowSeconds?: int,
 *         FilterConfiguration?: array,
 *         MinUpdatePeriodSeconds?: int,
 *         MinBufferTimeSeconds?: int,
 *         SuggestedPresentationDelaySeconds?: int,
 *         SegmentTemplateFormat?: 'NUMBER_WITH_TIMELINE',
 *         PeriodTriggers?: list<'AVAILS'|'DRM_KEY_ROTATION'|'NONE'|'SOURCE_CHANGES'|'SOURCE_DISRUPTIONS'>,
 *         ScteDash?: array,
 *         DrmSignaling?: 'INDIVIDUAL'|'REFERENCED',
 *         UtcTiming?: array,
 *         Profiles?: list<'DVB_DASH'>,
 *         BaseUrls?: list<array>,
 *         ProgramInformation?: array,
 *         DvbSettings?: array,
 *         Compactness?: 'NONE'|'STANDARD',
 *         AudioTimelinePattern?: 'NONE'|'PATTERNED',
 *         SubtitleConfiguration?: array,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         AvailabilityStartTimeConfiguration?: array,
 *         ...,
 *     }>,
 *     MssManifests?: list<array{
 *         ManifestName?: string,
 *         ManifestWindowSeconds?: int,
 *         FilterConfiguration?: array,
 *         ManifestLayout?: 'COMPACT'|'FULL',
 *         ...,
 *     }>,
 *     ForceEndpointErrorConfiguration?: array{
 *         EndpointErrorConditions?: list<'INCOMPLETE_MANIFEST'|'MISSING_DRM_KEY'|'SLATE_INPUT'|'STALE_MANIFEST'>,
 *         ...,
 *     },
 *     UriSeparator?: 'HYPHEN'|'UNDERSCORE',
 *     ETag?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOriginEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOriginEndpointAsync(array{
 *     ChannelGroupName?: string,
 *     ChannelName?: string,
 *     OriginEndpointName?: string,
 *     ContainerType?: 'CMAF'|'ISM'|'TS',
 *     Segment?: array{
 *         SegmentDurationSeconds?: int,
 *         SegmentName?: string,
 *         TsUseAudioRenditionGroup?: bool,
 *         IncludeIframeOnlyStreams?: bool,
 *         TsIncludeDvbSubtitles?: bool,
 *         Scte?: array{
 *             ScteFilter?: list<'ALTERNATE_CONTENT_OPPORTUNITY'|'BREAK'|'CALL_AD_SERVER'|'CHAPTER'|'CONTENT_IDENTIFICATION'|'DISTRIBUTOR_ADVERTISEMENT'|'DISTRIBUTOR_AD_BLOCK'|'DISTRIBUTOR_OVERLAY_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PLACEMENT_OPPORTUNITY'|'DISTRIBUTOR_PROMO'|'NETWORK'|'PROGRAM'|'PROVIDER_ADVERTISEMENT'|'PROVIDER_AD_BLOCK'|'PROVIDER_OVERLAY_PLACEMENT_OPPORTUNITY'|'PROVIDER_PLACEMENT_OPPORTUNITY'|'PROVIDER_PROMO'|'SPLICE_INSERT'|'UNSCHEDULED_EVENT'>,
 *             ScteInSegments?: 'ALL'|'MATCHES_FILTER'|'NONE',
 *             CustomAdTypes?: list<'ALTERNATE_CONTENT_OPPORTUNITY'|'CHAPTER'|'NETWORK'|'PROGRAM'|'UNSCHEDULED_EVENT'>,
 *             ...,
 *         },
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: array,
 *             KeyRotationIntervalSeconds?: int,
 *             CmafExcludeSegmentDrmMetadata?: bool,
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         OutputTimestampMode?: 'PASSTHROUGH'|'REBASED_TO_CHANNEL_START',
 *         ...,
 *     },
 *     Description?: string,
 *     StartoverWindowSeconds?: int,
 *     HlsManifests?: list<array{
 *         ManifestName?: string,
 *         ChildManifestName?: string,
 *         ScteHls?: array,
 *         StartTag?: array,
 *         ManifestWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         FilterConfiguration?: array,
 *         UrlEncodeChildManifest?: bool,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         ...,
 *     }>,
 *     LowLatencyHlsManifests?: list<array{
 *         ManifestName?: string,
 *         ChildManifestName?: string,
 *         ScteHls?: array,
 *         StartTag?: array,
 *         ManifestWindowSeconds?: int,
 *         ProgramDateTimeIntervalSeconds?: int,
 *         FilterConfiguration?: array,
 *         UrlEncodeChildManifest?: bool,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         ...,
 *     }>,
 *     DashManifests?: list<array{
 *         ManifestName?: string,
 *         ManifestWindowSeconds?: int,
 *         FilterConfiguration?: array,
 *         MinUpdatePeriodSeconds?: int,
 *         MinBufferTimeSeconds?: int,
 *         SuggestedPresentationDelaySeconds?: int,
 *         SegmentTemplateFormat?: 'NUMBER_WITH_TIMELINE',
 *         PeriodTriggers?: list<'AVAILS'|'DRM_KEY_ROTATION'|'NONE'|'SOURCE_CHANGES'|'SOURCE_DISRUPTIONS'>,
 *         ScteDash?: array,
 *         DrmSignaling?: 'INDIVIDUAL'|'REFERENCED',
 *         UtcTiming?: array,
 *         Profiles?: list<'DVB_DASH'>,
 *         BaseUrls?: list<array>,
 *         ProgramInformation?: array,
 *         DvbSettings?: array,
 *         Compactness?: 'NONE'|'STANDARD',
 *         AudioTimelinePattern?: 'NONE'|'PATTERNED',
 *         SubtitleConfiguration?: array,
 *         UriPathType?: 'LEAF'|'ROOT',
 *         AvailabilityStartTimeConfiguration?: array,
 *         ...,
 *     }>,
 *     MssManifests?: list<array{
 *         ManifestName?: string,
 *         ManifestWindowSeconds?: int,
 *         FilterConfiguration?: array,
 *         ManifestLayout?: 'COMPACT'|'FULL',
 *         ...,
 *     }>,
 *     ForceEndpointErrorConfiguration?: array{
 *         EndpointErrorConditions?: list<'INCOMPLETE_MANIFEST'|'MISSING_DRM_KEY'|'SLATE_INPUT'|'STALE_MANIFEST'>,
 *         ...,
 *     },
 *     UriSeparator?: 'HYPHEN'|'UNDERSCORE',
 *     ETag?: string,
 *     ...,
 * } $args = [])
 */
class MediaPackageV2Client extends AwsClient {}
