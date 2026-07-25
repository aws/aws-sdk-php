<?php
namespace Aws\BCMRecommendedActions;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Billing and Cost Management Recommended Actions** service.
 * @method \Aws\Result listRecommendedActions(array $args = [])
 * @phpstan-method \Aws\Result listRecommendedActions(array{filter?: array{actions?: list<array>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendedActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendedActionsAsync(array{filter?: array{actions?: list<array>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 */
class BCMRecommendedActionsClient extends AwsClient {}
