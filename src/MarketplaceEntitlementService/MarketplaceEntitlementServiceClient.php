<?php
namespace Aws\MarketplaceEntitlementService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Entitlement Service** service.
 * @method \Aws\Result getEntitlements(array $args = [])
 * @phpstan-method \Aws\Result getEntitlements(array{ProductCode?: string, Filter?: array<string, list<string>>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEntitlementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEntitlementsAsync(array{ProductCode?: string, Filter?: array<string, list<string>>, NextToken?: string, MaxResults?: int, ...} $args = [])
 */
class MarketplaceEntitlementServiceClient extends AwsClient {}
