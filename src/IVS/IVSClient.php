<?php
namespace Aws\IVS;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Interactive Video Service** service.
 * @method \Aws\Result batchGetChannel(array $args = [])
 * @phpstan-method \Aws\Result batchGetChannel(array{arns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetChannelAsync(array{arns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetStreamKey(array $args = [])
 * @phpstan-method \Aws\Result batchGetStreamKey(array{arns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetStreamKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetStreamKeyAsync(array{arns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchStartViewerSessionRevocation(array $args = [])
 * @phpstan-method \Aws\Result batchStartViewerSessionRevocation(array{
 *     viewerSessions?: list<array{channelArn?: string, viewerId?: string, viewerSessionVersionsLessThanOrEqualTo?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchStartViewerSessionRevocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchStartViewerSessionRevocationAsync(array{
 *     viewerSessions?: list<array{channelArn?: string, viewerId?: string, viewerSessionVersionsLessThanOrEqualTo?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAdConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createAdConfiguration(array{
 *     name?: string,
 *     mediaTailorPlaybackConfigurations?: list<array{playbackConfigurationArn?: string, ...}>,
 *     postRollConfiguration?: array{durationSeconds?: int, enabled?: bool, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAdConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAdConfigurationAsync(array{
 *     name?: string,
 *     mediaTailorPlaybackConfigurations?: list<array{playbackConfigurationArn?: string, ...}>,
 *     postRollConfiguration?: array{durationSeconds?: int, enabled?: bool, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createChannel(array $args = [])
 * @phpstan-method \Aws\Result createChannel(array{
 *     name?: string,
 *     latencyMode?: 'LOW'|'NORMAL',
 *     type?: 'ADVANCED_HD'|'ADVANCED_SD'|'BASIC'|'STANDARD',
 *     authorized?: bool,
 *     recordingConfigurationArn?: string,
 *     tags?: array<string, string>,
 *     insecureIngest?: bool,
 *     preset?: 'CONSTRAINED_BANDWIDTH_DELIVERY'|'HIGHER_BANDWIDTH_DELIVERY',
 *     playbackRestrictionPolicyArn?: string,
 *     multitrackInputConfiguration?: array{enabled?: bool, policy?: 'ALLOW'|'REQUIRE', maximumResolution?: 'FULL_HD'|'HD'|'SD', ...},
 *     containerFormat?: 'FRAGMENTED_MP4'|'TS',
 *     adConfigurationArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelAsync(array{
 *     name?: string,
 *     latencyMode?: 'LOW'|'NORMAL',
 *     type?: 'ADVANCED_HD'|'ADVANCED_SD'|'BASIC'|'STANDARD',
 *     authorized?: bool,
 *     recordingConfigurationArn?: string,
 *     tags?: array<string, string>,
 *     insecureIngest?: bool,
 *     preset?: 'CONSTRAINED_BANDWIDTH_DELIVERY'|'HIGHER_BANDWIDTH_DELIVERY',
 *     playbackRestrictionPolicyArn?: string,
 *     multitrackInputConfiguration?: array{enabled?: bool, policy?: 'ALLOW'|'REQUIRE', maximumResolution?: 'FULL_HD'|'HD'|'SD', ...},
 *     containerFormat?: 'FRAGMENTED_MP4'|'TS',
 *     adConfigurationArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPlaybackRestrictionPolicy(array $args = [])
 * @phpstan-method \Aws\Result createPlaybackRestrictionPolicy(array{
 *     allowedCountries?: list<string>,
 *     allowedOrigins?: list<string>,
 *     enableStrictOriginEnforcement?: bool,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlaybackRestrictionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPlaybackRestrictionPolicyAsync(array{
 *     allowedCountries?: list<string>,
 *     allowedOrigins?: list<string>,
 *     enableStrictOriginEnforcement?: bool,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRecordingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createRecordingConfiguration(array{
 *     name?: string,
 *     destinationConfiguration?: array{s3?: array{bucketName?: string, ...}, ...},
 *     tags?: array<string, string>,
 *     thumbnailConfiguration?: array{
 *         recordingMode?: 'DISABLED'|'INTERVAL',
 *         targetIntervalSeconds?: int,
 *         resolution?: 'FULL_HD'|'HD'|'LOWEST_RESOLUTION'|'SD',
 *         storage?: list<'LATEST'|'SEQUENTIAL'>,
 *         ...,
 *     },
 *     recordingReconnectWindowSeconds?: int,
 *     renditionConfiguration?: array{
 *         renditionSelection?: 'ALL'|'CUSTOM'|'NONE',
 *         renditions?: list<'FULL_HD'|'HD'|'LOWEST_RESOLUTION'|'SD'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRecordingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRecordingConfigurationAsync(array{
 *     name?: string,
 *     destinationConfiguration?: array{s3?: array{bucketName?: string, ...}, ...},
 *     tags?: array<string, string>,
 *     thumbnailConfiguration?: array{
 *         recordingMode?: 'DISABLED'|'INTERVAL',
 *         targetIntervalSeconds?: int,
 *         resolution?: 'FULL_HD'|'HD'|'LOWEST_RESOLUTION'|'SD',
 *         storage?: list<'LATEST'|'SEQUENTIAL'>,
 *         ...,
 *     },
 *     recordingReconnectWindowSeconds?: int,
 *     renditionConfiguration?: array{
 *         renditionSelection?: 'ALL'|'CUSTOM'|'NONE',
 *         renditions?: list<'FULL_HD'|'HD'|'LOWEST_RESOLUTION'|'SD'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStreamKey(array $args = [])
 * @phpstan-method \Aws\Result createStreamKey(array{channelArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamKeyAsync(array{channelArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteAdConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteAdConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAdConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAdConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteChannel(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deletePlaybackKeyPair(array $args = [])
 * @phpstan-method \Aws\Result deletePlaybackKeyPair(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePlaybackKeyPairAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePlaybackKeyPairAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deletePlaybackRestrictionPolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePlaybackRestrictionPolicy(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePlaybackRestrictionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePlaybackRestrictionPolicyAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteRecordingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteRecordingConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecordingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecordingConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteStreamKey(array $args = [])
 * @phpstan-method \Aws\Result deleteStreamKey(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStreamKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStreamKeyAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getAdConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getAdConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getChannel(array $args = [])
 * @phpstan-method \Aws\Result getChannel(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getPlaybackKeyPair(array $args = [])
 * @phpstan-method \Aws\Result getPlaybackKeyPair(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlaybackKeyPairAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlaybackKeyPairAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getPlaybackRestrictionPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPlaybackRestrictionPolicy(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlaybackRestrictionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlaybackRestrictionPolicyAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getRecordingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getRecordingConfiguration(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecordingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecordingConfigurationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getStream(array $args = [])
 * @phpstan-method \Aws\Result getStream(array{channelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStreamAsync(array{channelArn?: string, ...} $args = [])
 * @method \Aws\Result getStreamKey(array $args = [])
 * @phpstan-method \Aws\Result getStreamKey(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStreamKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStreamKeyAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getStreamSession(array $args = [])
 * @phpstan-method \Aws\Result getStreamSession(array{channelArn?: string, streamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStreamSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStreamSessionAsync(array{channelArn?: string, streamId?: string, ...} $args = [])
 * @method \Aws\Result importPlaybackKeyPair(array $args = [])
 * @phpstan-method \Aws\Result importPlaybackKeyPair(array{publicKeyMaterial?: string, name?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importPlaybackKeyPairAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importPlaybackKeyPairAsync(array{publicKeyMaterial?: string, name?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result insertAdBreak(array $args = [])
 * @phpstan-method \Aws\Result insertAdBreak(array{channelArn?: string, durationSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise insertAdBreakAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise insertAdBreakAsync(array{channelArn?: string, durationSeconds?: int, ...} $args = [])
 * @method \Aws\Result listAdConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listAdConfigurations(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAdConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAdConfigurationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @phpstan-method \Aws\Result listChannels(array{
 *     filterByName?: string,
 *     filterByRecordingConfigurationArn?: string,
 *     filterByPlaybackRestrictionPolicyArn?: string,
 *     filterByAdConfigurationArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsAsync(array{
 *     filterByName?: string,
 *     filterByRecordingConfigurationArn?: string,
 *     filterByPlaybackRestrictionPolicyArn?: string,
 *     filterByAdConfigurationArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPlaybackKeyPairs(array $args = [])
 * @phpstan-method \Aws\Result listPlaybackKeyPairs(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlaybackKeyPairsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlaybackKeyPairsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPlaybackRestrictionPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPlaybackRestrictionPolicies(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlaybackRestrictionPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlaybackRestrictionPoliciesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listRecordingConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listRecordingConfigurations(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecordingConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecordingConfigurationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listStreamKeys(array $args = [])
 * @phpstan-method \Aws\Result listStreamKeys(array{channelArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamKeysAsync(array{channelArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listStreamSessions(array $args = [])
 * @phpstan-method \Aws\Result listStreamSessions(array{channelArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamSessionsAsync(array{channelArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listStreams(array $args = [])
 * @phpstan-method \Aws\Result listStreams(array{
 *     filterBy?: array{health?: 'HEALTHY'|'STARVING'|'UNKNOWN', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamsAsync(array{
 *     filterBy?: array{health?: 'HEALTHY'|'STARVING'|'UNKNOWN', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putMetadata(array $args = [])
 * @phpstan-method \Aws\Result putMetadata(array{channelArn?: string, metadata?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMetadataAsync(array{channelArn?: string, metadata?: string, ...} $args = [])
 * @method \Aws\Result startViewerSessionRevocation(array $args = [])
 * @phpstan-method \Aws\Result startViewerSessionRevocation(array{channelArn?: string, viewerId?: string, viewerSessionVersionsLessThanOrEqualTo?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startViewerSessionRevocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startViewerSessionRevocationAsync(array{channelArn?: string, viewerId?: string, viewerSessionVersionsLessThanOrEqualTo?: int, ...} $args = [])
 * @method \Aws\Result stopStream(array $args = [])
 * @phpstan-method \Aws\Result stopStream(array{channelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopStreamAsync(array{channelArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAdConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateAdConfiguration(array{
 *     arn?: string,
 *     name?: string,
 *     mediaTailorPlaybackConfigurations?: list<array{playbackConfigurationArn?: string, ...}>,
 *     postRollConfiguration?: array{durationSeconds?: int, enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAdConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAdConfigurationAsync(array{
 *     arn?: string,
 *     name?: string,
 *     mediaTailorPlaybackConfigurations?: list<array{playbackConfigurationArn?: string, ...}>,
 *     postRollConfiguration?: array{durationSeconds?: int, enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateChannel(array $args = [])
 * @phpstan-method \Aws\Result updateChannel(array{
 *     arn?: string,
 *     name?: string,
 *     latencyMode?: 'LOW'|'NORMAL',
 *     type?: 'ADVANCED_HD'|'ADVANCED_SD'|'BASIC'|'STANDARD',
 *     authorized?: bool,
 *     recordingConfigurationArn?: string,
 *     insecureIngest?: bool,
 *     preset?: 'CONSTRAINED_BANDWIDTH_DELIVERY'|'HIGHER_BANDWIDTH_DELIVERY',
 *     playbackRestrictionPolicyArn?: string,
 *     multitrackInputConfiguration?: array{enabled?: bool, policy?: 'ALLOW'|'REQUIRE', maximumResolution?: 'FULL_HD'|'HD'|'SD', ...},
 *     containerFormat?: 'FRAGMENTED_MP4'|'TS',
 *     adConfigurationArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelAsync(array{
 *     arn?: string,
 *     name?: string,
 *     latencyMode?: 'LOW'|'NORMAL',
 *     type?: 'ADVANCED_HD'|'ADVANCED_SD'|'BASIC'|'STANDARD',
 *     authorized?: bool,
 *     recordingConfigurationArn?: string,
 *     insecureIngest?: bool,
 *     preset?: 'CONSTRAINED_BANDWIDTH_DELIVERY'|'HIGHER_BANDWIDTH_DELIVERY',
 *     playbackRestrictionPolicyArn?: string,
 *     multitrackInputConfiguration?: array{enabled?: bool, policy?: 'ALLOW'|'REQUIRE', maximumResolution?: 'FULL_HD'|'HD'|'SD', ...},
 *     containerFormat?: 'FRAGMENTED_MP4'|'TS',
 *     adConfigurationArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePlaybackRestrictionPolicy(array $args = [])
 * @phpstan-method \Aws\Result updatePlaybackRestrictionPolicy(array{
 *     arn?: string,
 *     allowedCountries?: list<string>,
 *     allowedOrigins?: list<string>,
 *     enableStrictOriginEnforcement?: bool,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePlaybackRestrictionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePlaybackRestrictionPolicyAsync(array{
 *     arn?: string,
 *     allowedCountries?: list<string>,
 *     allowedOrigins?: list<string>,
 *     enableStrictOriginEnforcement?: bool,
 *     name?: string,
 *     ...,
 * } $args = [])
 */
class IVSClient extends AwsClient {}
