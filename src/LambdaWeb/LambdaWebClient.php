<?php
namespace Aws\LambdaWeb;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Lambda Web** service.
 * @method \Aws\Result getWebAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getWebAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebAccountSettingsAsync(array{...} $args = [])
 */
class LambdaWebClient extends AwsClient {}
