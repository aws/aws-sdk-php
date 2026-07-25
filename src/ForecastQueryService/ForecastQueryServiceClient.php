<?php
namespace Aws\ForecastQueryService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Forecast Query Service** service.
 * @method \Aws\Result queryForecast(array $args = [])
 * @phpstan-method \Aws\Result queryForecast(array{
 *     ForecastArn?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Filters?: array<string, string>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise queryForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryForecastAsync(array{
 *     ForecastArn?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Filters?: array<string, string>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result queryWhatIfForecast(array $args = [])
 * @phpstan-method \Aws\Result queryWhatIfForecast(array{
 *     WhatIfForecastArn?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Filters?: array<string, string>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise queryWhatIfForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryWhatIfForecastAsync(array{
 *     WhatIfForecastArn?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Filters?: array<string, string>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 */
class ForecastQueryServiceClient extends AwsClient {}
