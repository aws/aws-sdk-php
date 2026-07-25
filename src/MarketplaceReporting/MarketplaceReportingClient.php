<?php
namespace Aws\MarketplaceReporting;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Reporting Service** service.
 * @method \Aws\Result getBuyerDashboard(array $args = [])
 * @phpstan-method \Aws\Result getBuyerDashboard(array{dashboardIdentifier?: string, embeddingDomains?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBuyerDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBuyerDashboardAsync(array{dashboardIdentifier?: string, embeddingDomains?: list<string>, ...} $args = [])
 */
class MarketplaceReportingClient extends AwsClient {}
