<?php
namespace Aws\CloudTrailData;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudTrail Data Service** service.
 * @method \Aws\Result putAuditEvents(array $args = [])
 * @phpstan-method \Aws\Result putAuditEvents(array{
 *     auditEvents?: list<array{eventData?: string, eventDataChecksum?: string, id?: string, ...}>,
 *     channelArn?: string,
 *     externalId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAuditEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAuditEventsAsync(array{
 *     auditEvents?: list<array{eventData?: string, eventDataChecksum?: string, id?: string, ...}>,
 *     channelArn?: string,
 *     externalId?: string,
 *     ...,
 * } $args = [])
 */
class CloudTrailDataClient extends AwsClient {}
