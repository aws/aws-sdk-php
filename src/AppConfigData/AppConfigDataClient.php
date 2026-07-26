<?php
namespace Aws\AppConfigData;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS AppConfig Data** service.
 * @method \Aws\Result getLatestConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getLatestConfiguration(array{ConfigurationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLatestConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLatestConfigurationAsync(array{ConfigurationToken?: string, ...} $args = [])
 * @method \Aws\Result startConfigurationSession(array $args = [])
 * @phpstan-method \Aws\Result startConfigurationSession(array{
 *     ApplicationIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     ConfigurationProfileIdentifier?: string,
 *     RequiredMinimumPollIntervalInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startConfigurationSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startConfigurationSessionAsync(array{
 *     ApplicationIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     ConfigurationProfileIdentifier?: string,
 *     RequiredMinimumPollIntervalInSeconds?: int,
 *     ...,
 * } $args = [])
 */
class AppConfigDataClient extends AwsClient {}
