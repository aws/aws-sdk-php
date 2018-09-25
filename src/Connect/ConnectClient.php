<?php
namespace Aws\Connect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Connect Service** service.
 * @method \Aws\Result createUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @method \Aws\Result describeUserHierarchyGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserHierarchyGroupAsync(array $args = [])
 * @method \Aws\Result describeUserHierarchyStructure(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserHierarchyStructureAsync(array $args = [])
 * @method \Aws\Result getCurrentMetricData(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCurrentMetricDataAsync(array $args = [])
 * @method \Aws\Result getFederationToken(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFederationTokenAsync(array $args = [])
 * @method \Aws\Result getMetricData(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetricDataAsync(array $args = [])
 * @method \Aws\Result listRoutingProfiles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoutingProfilesAsync(array $args = [])
 * @method \Aws\Result listSecurityProfiles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityProfilesAsync(array $args = [])
 * @method \Aws\Result listUserHierarchyGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserHierarchyGroupsAsync(array $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \Aws\Result startOutboundVoiceContact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startOutboundVoiceContactAsync(array $args = [])
 * @method \Aws\Result stopContact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopContactAsync(array $args = [])
 * @method \Aws\Result updateContactAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactAttributesAsync(array $args = [])
 * @method \Aws\Result updateUserHierarchy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserHierarchyAsync(array $args = [])
 * @method \Aws\Result updateUserIdentityInfo(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserIdentityInfoAsync(array $args = [])
 * @method \Aws\Result updateUserPhoneConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserPhoneConfigAsync(array $args = [])
 * @method \Aws\Result updateUserRoutingProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserRoutingProfileAsync(array $args = [])
 * @method \Aws\Result updateUserSecurityProfiles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserSecurityProfilesAsync(array $args = [])
 */
class ConnectClient extends AwsClient {}
