<?php
namespace Aws\MediaConnect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS MediaConnect** service.
 * @method \Aws\Result addFlowOutputs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise addFlowOutputsAsync(array $args = [])
 * @method \Aws\Result addFlowSources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise addFlowSourcesAsync(array $args = [])
 * @method \Aws\Result createFlow(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlowAsync(array $args = [])
 * @method \Aws\Result deleteFlow(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlowAsync(array $args = [])
 * @method \Aws\Result describeFlow(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlowAsync(array $args = [])
 * @method \Aws\Result grantFlowEntitlements(array $args = [])
 * @method \GuzzleHttp\Promise\Promise grantFlowEntitlementsAsync(array $args = [])
 * @method \Aws\Result listEntitlements(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitlementsAsync(array $args = [])
 * @method \Aws\Result listFlows(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result removeFlowOutput(array $args = [])
 * @method \GuzzleHttp\Promise\Promise removeFlowOutputAsync(array $args = [])
 * @method \Aws\Result removeFlowSource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise removeFlowSourceAsync(array $args = [])
 * @method \Aws\Result revokeFlowEntitlement(array $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeFlowEntitlementAsync(array $args = [])
 * @method \Aws\Result startFlow(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startFlowAsync(array $args = [])
 * @method \Aws\Result stopFlow(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopFlowAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateFlow(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowAsync(array $args = [])
 * @method \Aws\Result updateFlowEntitlement(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowEntitlementAsync(array $args = [])
 * @method \Aws\Result updateFlowOutput(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowOutputAsync(array $args = [])
 * @method \Aws\Result updateFlowSource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowSourceAsync(array $args = [])
 */
class MediaConnectClient extends AwsClient {}
