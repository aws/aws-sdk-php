<?php
namespace Aws\EKSAuth;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EKS Auth** service.
 * @method \Aws\Result assumeRoleForPodIdentity(array $args = [])
 * @phpstan-method \Aws\Result assumeRoleForPodIdentity(array{clusterName?: string, token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise assumeRoleForPodIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeRoleForPodIdentityAsync(array{clusterName?: string, token?: string, ...} $args = [])
 */
class EKSAuthClient extends AwsClient {}
