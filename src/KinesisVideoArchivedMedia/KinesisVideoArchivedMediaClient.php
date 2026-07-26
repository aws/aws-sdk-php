<?php
namespace Aws\KinesisVideoArchivedMedia;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video Streams Archived Media** service.
 * @method \Aws\Result getClip(array $args = [])
 * @phpstan-method \Aws\Result getClip(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     ClipFragmentSelector?: array{
 *         FragmentSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         TimestampRange?: array{StartTimestamp?: int|string|\DateTimeInterface, EndTimestamp?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getClipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClipAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     ClipFragmentSelector?: array{
 *         FragmentSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         TimestampRange?: array{StartTimestamp?: int|string|\DateTimeInterface, EndTimestamp?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDASHStreamingSessionURL(array $args = [])
 * @phpstan-method \Aws\Result getDASHStreamingSessionURL(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     PlaybackMode?: 'LIVE'|'LIVE_REPLAY'|'ON_DEMAND',
 *     DisplayFragmentTimestamp?: 'ALWAYS'|'NEVER',
 *     DisplayFragmentNumber?: 'ALWAYS'|'NEVER',
 *     DASHFragmentSelector?: array{
 *         FragmentSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         TimestampRange?: array{StartTimestamp?: int|string|\DateTimeInterface, EndTimestamp?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     Expires?: int,
 *     MaxManifestFragmentResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDASHStreamingSessionURLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDASHStreamingSessionURLAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     PlaybackMode?: 'LIVE'|'LIVE_REPLAY'|'ON_DEMAND',
 *     DisplayFragmentTimestamp?: 'ALWAYS'|'NEVER',
 *     DisplayFragmentNumber?: 'ALWAYS'|'NEVER',
 *     DASHFragmentSelector?: array{
 *         FragmentSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         TimestampRange?: array{StartTimestamp?: int|string|\DateTimeInterface, EndTimestamp?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     Expires?: int,
 *     MaxManifestFragmentResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getHLSStreamingSessionURL(array $args = [])
 * @phpstan-method \Aws\Result getHLSStreamingSessionURL(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     PlaybackMode?: 'LIVE'|'LIVE_REPLAY'|'ON_DEMAND',
 *     HLSFragmentSelector?: array{
 *         FragmentSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         TimestampRange?: array{StartTimestamp?: int|string|\DateTimeInterface, EndTimestamp?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ContainerFormat?: 'FRAGMENTED_MP4'|'MPEG_TS',
 *     DiscontinuityMode?: 'ALWAYS'|'NEVER'|'ON_DISCONTINUITY',
 *     DisplayFragmentTimestamp?: 'ALWAYS'|'NEVER',
 *     Expires?: int,
 *     MaxMediaPlaylistFragmentResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getHLSStreamingSessionURLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHLSStreamingSessionURLAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     PlaybackMode?: 'LIVE'|'LIVE_REPLAY'|'ON_DEMAND',
 *     HLSFragmentSelector?: array{
 *         FragmentSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         TimestampRange?: array{StartTimestamp?: int|string|\DateTimeInterface, EndTimestamp?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ContainerFormat?: 'FRAGMENTED_MP4'|'MPEG_TS',
 *     DiscontinuityMode?: 'ALWAYS'|'NEVER'|'ON_DISCONTINUITY',
 *     DisplayFragmentTimestamp?: 'ALWAYS'|'NEVER',
 *     Expires?: int,
 *     MaxMediaPlaylistFragmentResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getImages(array $args = [])
 * @phpstan-method \Aws\Result getImages(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     ImageSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *     StartTimestamp?: int|string|\DateTimeInterface,
 *     EndTimestamp?: int|string|\DateTimeInterface,
 *     SamplingInterval?: int,
 *     Format?: 'JPEG'|'PNG',
 *     FormatConfig?: array<string, string>,
 *     WidthPixels?: int,
 *     HeightPixels?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImagesAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     ImageSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *     StartTimestamp?: int|string|\DateTimeInterface,
 *     EndTimestamp?: int|string|\DateTimeInterface,
 *     SamplingInterval?: int,
 *     Format?: 'JPEG'|'PNG',
 *     FormatConfig?: array<string, string>,
 *     WidthPixels?: int,
 *     HeightPixels?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMediaForFragmentList(array $args = [])
 * @phpstan-method \Aws\Result getMediaForFragmentList(array{StreamName?: string, StreamARN?: string, Fragments?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMediaForFragmentListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMediaForFragmentListAsync(array{StreamName?: string, StreamARN?: string, Fragments?: list<string>, ...} $args = [])
 * @method \Aws\Result listFragments(array $args = [])
 * @phpstan-method \Aws\Result listFragments(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     FragmentSelector?: array{
 *         FragmentSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         TimestampRange?: array{StartTimestamp?: int|string|\DateTimeInterface, EndTimestamp?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFragmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFragmentsAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     FragmentSelector?: array{
 *         FragmentSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         TimestampRange?: array{StartTimestamp?: int|string|\DateTimeInterface, EndTimestamp?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class KinesisVideoArchivedMediaClient extends AwsClient {}
