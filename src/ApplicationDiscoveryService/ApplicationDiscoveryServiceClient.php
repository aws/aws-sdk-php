<?php
namespace Aws\ApplicationDiscoveryService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Application Discovery Service** service.
 * @method \Aws\Result createTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @method \Aws\Result describeAgents(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAgentsAsync(array $args = [])
 * @method \Aws\Result describeConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationsAsync(array $args = [])
 * @method \Aws\Result describeExportConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExportConfigurationsAsync(array $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \Aws\Result exportConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise exportConfigurationsAsync(array $args = [])
 * @method \Aws\Result listConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationsAsync(array $args = [])
 * @method \Aws\Result startDataCollectionByAgentIds(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataCollectionByAgentIdsAsync(array $args = [])
 * @method \Aws\Result stopDataCollectionByAgentIds(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDataCollectionByAgentIdsAsync(array $args = [])
 */
class ApplicationDiscoveryServiceClient extends AwsClient {}
