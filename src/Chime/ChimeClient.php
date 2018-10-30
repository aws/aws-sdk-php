<?php
namespace Aws\Chime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime** service.
 * @method \Aws\Result batchSuspendUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchSuspendUserAsync(array $args = [])
 * @method \Aws\Result batchUnsuspendUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUnsuspendUserAsync(array $args = [])
 * @method \Aws\Result batchUpdateUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateUserAsync(array $args = [])
 * @method \Aws\Result createAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountAsync(array $args = [])
 * @method \Aws\Result deleteAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountAsync(array $args = [])
 * @method \Aws\Result getAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountAsync(array $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @method \Aws\Result getUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAsync(array $args = [])
 * @method \Aws\Result inviteUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise inviteUsersAsync(array $args = [])
 * @method \Aws\Result listAccounts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountsAsync(array $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \Aws\Result logoutUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise logoutUserAsync(array $args = [])
 * @method \Aws\Result resetPersonalPIN(array $args = [])
 * @method \GuzzleHttp\Promise\Promise resetPersonalPINAsync(array $args = [])
 * @method \Aws\Result updateAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountAsync(array $args = [])
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 */
class ChimeClient extends AwsClient {}
