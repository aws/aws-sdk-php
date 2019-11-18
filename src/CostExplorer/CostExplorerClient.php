<?php
namespace Aws\CostExplorer;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Cost Explorer Service** service.
 * @method \Aws\Result getCostAndUsage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostAndUsageAsync(array $args = [])
 * @method \Aws\Result getCostAndUsageWithResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostAndUsageWithResourcesAsync(array $args = [])
 * @method \Aws\Result getCostForecast(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostForecastAsync(array $args = [])
 * @method \Aws\Result getDimensionValues(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDimensionValuesAsync(array $args = [])
 * @method \Aws\Result getReservationCoverage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getReservationCoverageAsync(array $args = [])
 * @method \Aws\Result getReservationPurchaseRecommendation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getReservationPurchaseRecommendationAsync(array $args = [])
 * @method \Aws\Result getReservationUtilization(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getReservationUtilizationAsync(array $args = [])
 * @method \Aws\Result getRightsizingRecommendation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRightsizingRecommendationAsync(array $args = [])
 * @method \Aws\Result getSavingsPlansCoverage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSavingsPlansCoverageAsync(array $args = [])
 * @method \Aws\Result getSavingsPlansPurchaseRecommendation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSavingsPlansPurchaseRecommendationAsync(array $args = [])
 * @method \Aws\Result getSavingsPlansUtilization(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSavingsPlansUtilizationAsync(array $args = [])
 * @method \Aws\Result getSavingsPlansUtilizationDetails(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSavingsPlansUtilizationDetailsAsync(array $args = [])
 * @method \Aws\Result getTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTagsAsync(array $args = [])
 * @method \Aws\Result getUsageForecast(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsageForecastAsync(array $args = [])
 */
class CostExplorerClient extends AwsClient {}
