<?php
namespace Aws\QuickSight;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon QuickSight** service.
 * @method \Aws\Result createGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @method \Aws\Result createGroupMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupMembershipAsync(array $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @method \Aws\Result deleteGroupMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupMembershipAsync(array $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @method \Aws\Result deleteUserByPrincipalId(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserByPrincipalIdAsync(array $args = [])
 * @method \Aws\Result describeGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGroupAsync(array $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @method \Aws\Result getDashboardEmbedUrl(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDashboardEmbedUrlAsync(array $args = [])
 * @method \Aws\Result listGroupMemberships(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupMembershipsAsync(array $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @method \Aws\Result listUserGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserGroupsAsync(array $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \Aws\Result registerUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise registerUserAsync(array $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 */
class QuickSightClient extends AwsClient {}
