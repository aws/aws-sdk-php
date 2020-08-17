<?php
namespace Aws\Transfer;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Transfer for SFTP** service.
 * @method \Aws\Result createServer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createServerAsync(array $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @method \Aws\Result deleteServer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServerAsync(array $args = [])
 * @method \Aws\Result deleteSshPublicKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSshPublicKeyAsync(array $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @method \Aws\Result describeSecurityPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSecurityPolicyAsync(array $args = [])
 * @method \Aws\Result describeServer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServerAsync(array $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @method \Aws\Result importSshPublicKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise importSshPublicKeyAsync(array $args = [])
 * @method \Aws\Result listSecurityPolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityPoliciesAsync(array $args = [])
 * @method \Aws\Result listServers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServersAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \Aws\Result startServer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startServerAsync(array $args = [])
 * @method \Aws\Result stopServer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopServerAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result testIdentityProvider(array $args = [])
 * @method \GuzzleHttp\Promise\Promise testIdentityProviderAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateServer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServerAsync(array $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 */
class TransferClient extends AwsClient {}
