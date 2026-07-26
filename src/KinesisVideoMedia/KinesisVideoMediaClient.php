<?php
namespace Aws\KinesisVideoMedia;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video Streams Media** service.
 * @method \Aws\Result getMedia(array $args = [])
 * @phpstan-method \Aws\Result getMedia(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     StartSelector?: array{
 *         StartSelectorType?: 'CONTINUATION_TOKEN'|'EARLIEST'|'FRAGMENT_NUMBER'|'NOW'|'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         AfterFragmentNumber?: string,
 *         StartTimestamp?: int|string|\DateTimeInterface,
 *         ContinuationToken?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMediaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMediaAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     StartSelector?: array{
 *         StartSelectorType?: 'CONTINUATION_TOKEN'|'EARLIEST'|'FRAGMENT_NUMBER'|'NOW'|'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         AfterFragmentNumber?: string,
 *         StartTimestamp?: int|string|\DateTimeInterface,
 *         ContinuationToken?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class KinesisVideoMediaClient extends AwsClient {}
