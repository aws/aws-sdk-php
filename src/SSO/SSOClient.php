<?php
namespace Aws\SSO;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Single Sign-On** service.
 * @method \Aws\Result getRoleCredentials(array $args = [])
 * @phpstan-method \Aws\Result getRoleCredentials(array{roleName?: string, accountId?: string, accessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRoleCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRoleCredentialsAsync(array{roleName?: string, accountId?: string, accessToken?: string, ...} $args = [])
 * @method \Aws\Result listAccountRoles(array $args = [])
 * @phpstan-method \Aws\Result listAccountRoles(array{nextToken?: string, maxResults?: int, accessToken?: string, accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountRolesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountRolesAsync(array{nextToken?: string, maxResults?: int, accessToken?: string, accountId?: string, ...} $args = [])
 * @method \Aws\Result listAccounts(array $args = [])
 * @phpstan-method \Aws\Result listAccounts(array{nextToken?: string, maxResults?: int, accessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountsAsync(array{nextToken?: string, maxResults?: int, accessToken?: string, ...} $args = [])
 * @method \Aws\Result logout(array $args = [])
 * @phpstan-method \Aws\Result logout(array{accessToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise logoutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise logoutAsync(array{accessToken?: string, ...} $args = [])
 */
class SSOClient extends AwsClient {}
