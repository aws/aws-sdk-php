<?php
namespace Aws\ConnectContactLens;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Connect Contact Lens** service.
 * @method \Aws\Result listRealtimeContactAnalysisSegments(array $args = [])
 * @phpstan-method \Aws\Result listRealtimeContactAnalysisSegments(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ListFilter?: array{
 *         CategoriesAttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRealtimeContactAnalysisSegmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRealtimeContactAnalysisSegmentsAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ListFilter?: array{
 *         CategoriesAttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class ConnectContactLensClient extends AwsClient {}
