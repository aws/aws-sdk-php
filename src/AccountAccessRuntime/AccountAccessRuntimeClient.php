<?php
namespace Aws\AccountAccessRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Account Access Runtime** service.
 * @method \Aws\Result getRoleCredentials(array $args = [])
 * @phpstan-method \Aws\Result getRoleCredentials(array{
 *     tenantId?: string,
 *     roleArn?: string,
 *     accessType?: 'PROGRAMMATIC_ACCESS',
 *     sessionName?: string,
 *     sessionDuration?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRoleCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRoleCredentialsAsync(array{
 *     tenantId?: string,
 *     roleArn?: string,
 *     accessType?: 'PROGRAMMATIC_ACCESS',
 *     sessionName?: string,
 *     sessionDuration?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRoles(array $args = [])
 * @phpstan-method \Aws\Result listRoles(array{tenantId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRolesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRolesAsync(array{tenantId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 */
class AccountAccessRuntimeClient extends AwsClient {}
