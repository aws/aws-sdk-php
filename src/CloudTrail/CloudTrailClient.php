<?php
namespace Aws\CloudTrail;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudTrail** service.
 *
 * @method \Aws\Result createTrail(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrailAsync(array $args = [])
 * @method \Aws\Result deleteTrail(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrailAsync(array $args = [])
 * @method \Aws\Result describeTrails(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrailsAsync(array $args = [])
 * @method \Aws\Result getTrailStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrailStatusAsync(array $args = [])
 * @method \Aws\Result lookupEvents(array $args = [])
 * @method \GuzzleHttp\Promise\Promise lookupEventsAsync(array $args = [])
 * @method \Aws\Result startLogging(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startLoggingAsync(array $args = [])
 * @method \Aws\Result stopLogging(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopLoggingAsync(array $args = [])
 * @method \Aws\Result updateTrail(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrailAsync(array $args = [])
 */
class CloudTrailClient extends AwsClient {}
