<?php
namespace Aws\IAMToolbox;

use Aws\AwsClient;

/**
 * This client is used to interact with the **IAM Toolbox (Preview)** service.
 * @method \Aws\Result getRequestAuthorizationDetails(array $args = [])
 * @phpstan-method \Aws\Result getRequestAuthorizationDetails(array{authorizationId?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRequestAuthorizationDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRequestAuthorizationDetailsAsync(array{authorizationId?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getRequestAuthorizationPolicy(array $args = [])
 * @phpstan-method \Aws\Result getRequestAuthorizationPolicy(array{authorizationId?: string, policyUri?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRequestAuthorizationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRequestAuthorizationPolicyAsync(array{authorizationId?: string, policyUri?: string, ...} $args = [])
 */
class IAMToolboxClient extends AwsClient {}
