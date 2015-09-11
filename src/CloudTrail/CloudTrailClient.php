<?php
namespace Aws\CloudTrail;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudTrail** service.
 *
 * @method \Aws\Result createTrail(array $args = [])
 * @method \Aws\Result deleteTrail(array $args = [])
 * @method \Aws\Result describeTrails(array $args = [])
 * @method \Aws\Result getTrailStatus(array $args = [])
 * @method \Aws\Result lookupEvents(array $args = [])
 * @method \Aws\Result startLogging(array $args = [])
 * @method \Aws\Result stopLogging(array $args = [])
 * @method \Aws\Result updateTrail(array $args = [])
 */
class CloudTrailClient extends AwsClient {}
