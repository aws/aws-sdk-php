<?php
namespace Aws\ApplicationInsights;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Application Insights** service.
 * @method \Aws\Result createApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \Aws\Result createComponent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createComponentAsync(array $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @method \Aws\Result deleteComponent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @method \Aws\Result describeApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeApplicationAsync(array $args = [])
 * @method \Aws\Result describeComponent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComponentAsync(array $args = [])
 * @method \Aws\Result describeComponentConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComponentConfigurationAsync(array $args = [])
 * @method \Aws\Result describeComponentConfigurationRecommendation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComponentConfigurationRecommendationAsync(array $args = [])
 * @method \Aws\Result describeObservation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeObservationAsync(array $args = [])
 * @method \Aws\Result describeProblem(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProblemAsync(array $args = [])
 * @method \Aws\Result describeProblemObservations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProblemObservationsAsync(array $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \Aws\Result listComponents(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @method \Aws\Result listProblems(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listProblemsAsync(array $args = [])
 * @method \Aws\Result updateComponent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComponentAsync(array $args = [])
 * @method \Aws\Result updateComponentConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComponentConfigurationAsync(array $args = [])
 */
class ApplicationInsightsClient extends AwsClient {}
