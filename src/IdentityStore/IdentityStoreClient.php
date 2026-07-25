<?php
namespace Aws\IdentityStore;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS SSO Identity Store** service.
 * @method \Aws\Result createGroup(array $args = [])
 * @phpstan-method \Aws\Result createGroup(array{IdentityStoreId?: string, DisplayName?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupAsync(array{IdentityStoreId?: string, DisplayName?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result createGroupMembership(array $args = [])
 * @phpstan-method \Aws\Result createGroupMembership(array{IdentityStoreId?: string, GroupId?: string, MemberId?: array{UserId?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupMembershipAsync(array{IdentityStoreId?: string, GroupId?: string, MemberId?: array{UserId?: string, ...}, ...} $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     IdentityStoreId?: string,
 *     UserName?: string,
 *     Name?: array{
 *         Formatted?: string,
 *         FamilyName?: string,
 *         GivenName?: string,
 *         MiddleName?: string,
 *         HonorificPrefix?: string,
 *         HonorificSuffix?: string,
 *         ...,
 *     },
 *     DisplayName?: string,
 *     NickName?: string,
 *     ProfileUrl?: string,
 *     Emails?: list<array{Value?: string, Type?: string, Primary?: bool, ...}>,
 *     Addresses?: list<array{
 *         StreetAddress?: string,
 *         Locality?: string,
 *         Region?: string,
 *         PostalCode?: string,
 *         Country?: string,
 *         Formatted?: string,
 *         Type?: string,
 *         Primary?: bool,
 *         ...,
 *     }>,
 *     PhoneNumbers?: list<array{Value?: string, Type?: string, Primary?: bool, ...}>,
 *     UserType?: string,
 *     Title?: string,
 *     PreferredLanguage?: string,
 *     Locale?: string,
 *     Timezone?: string,
 *     Photos?: list<array{Value?: string, Type?: string, Display?: string, Primary?: bool, ...}>,
 *     Website?: string,
 *     Birthdate?: string,
 *     Roles?: list<array{Value?: string, Type?: string, Primary?: bool, ...}>,
 *     Extensions?: array<string, array>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     IdentityStoreId?: string,
 *     UserName?: string,
 *     Name?: array{
 *         Formatted?: string,
 *         FamilyName?: string,
 *         GivenName?: string,
 *         MiddleName?: string,
 *         HonorificPrefix?: string,
 *         HonorificSuffix?: string,
 *         ...,
 *     },
 *     DisplayName?: string,
 *     NickName?: string,
 *     ProfileUrl?: string,
 *     Emails?: list<array{Value?: string, Type?: string, Primary?: bool, ...}>,
 *     Addresses?: list<array{
 *         StreetAddress?: string,
 *         Locality?: string,
 *         Region?: string,
 *         PostalCode?: string,
 *         Country?: string,
 *         Formatted?: string,
 *         Type?: string,
 *         Primary?: bool,
 *         ...,
 *     }>,
 *     PhoneNumbers?: list<array{Value?: string, Type?: string, Primary?: bool, ...}>,
 *     UserType?: string,
 *     Title?: string,
 *     PreferredLanguage?: string,
 *     Locale?: string,
 *     Timezone?: string,
 *     Photos?: list<array{Value?: string, Type?: string, Display?: string, Primary?: bool, ...}>,
 *     Website?: string,
 *     Birthdate?: string,
 *     Roles?: list<array{Value?: string, Type?: string, Primary?: bool, ...}>,
 *     Extensions?: array<string, array>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{IdentityStoreId?: string, GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{IdentityStoreId?: string, GroupId?: string, ...} $args = [])
 * @method \Aws\Result deleteGroupMembership(array $args = [])
 * @phpstan-method \Aws\Result deleteGroupMembership(array{IdentityStoreId?: string, MembershipId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupMembershipAsync(array{IdentityStoreId?: string, MembershipId?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{IdentityStoreId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{IdentityStoreId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result describeGroup(array $args = [])
 * @phpstan-method \Aws\Result describeGroup(array{IdentityStoreId?: string, GroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGroupAsync(array{IdentityStoreId?: string, GroupId?: string, ...} $args = [])
 * @method \Aws\Result describeGroupMembership(array $args = [])
 * @phpstan-method \Aws\Result describeGroupMembership(array{IdentityStoreId?: string, MembershipId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGroupMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGroupMembershipAsync(array{IdentityStoreId?: string, MembershipId?: string, ...} $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @phpstan-method \Aws\Result describeUser(array{IdentityStoreId?: string, UserId?: string, Extensions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserAsync(array{IdentityStoreId?: string, UserId?: string, Extensions?: list<string>, ...} $args = [])
 * @method \Aws\Result getGroupId(array $args = [])
 * @phpstan-method \Aws\Result getGroupId(array{
 *     IdentityStoreId?: string,
 *     AlternateIdentifier?: array{
 *         ExternalId?: array{Issuer?: string, Id?: string, ...},
 *         UniqueAttribute?: array{AttributePath?: string, AttributeValue?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupIdAsync(array{
 *     IdentityStoreId?: string,
 *     AlternateIdentifier?: array{
 *         ExternalId?: array{Issuer?: string, Id?: string, ...},
 *         UniqueAttribute?: array{AttributePath?: string, AttributeValue?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getGroupMembershipId(array $args = [])
 * @phpstan-method \Aws\Result getGroupMembershipId(array{IdentityStoreId?: string, GroupId?: string, MemberId?: array{UserId?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupMembershipIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupMembershipIdAsync(array{IdentityStoreId?: string, GroupId?: string, MemberId?: array{UserId?: string, ...}, ...} $args = [])
 * @method \Aws\Result getUserId(array $args = [])
 * @phpstan-method \Aws\Result getUserId(array{
 *     IdentityStoreId?: string,
 *     AlternateIdentifier?: array{
 *         ExternalId?: array{Issuer?: string, Id?: string, ...},
 *         UniqueAttribute?: array{AttributePath?: string, AttributeValue?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserIdAsync(array{
 *     IdentityStoreId?: string,
 *     AlternateIdentifier?: array{
 *         ExternalId?: array{Issuer?: string, Id?: string, ...},
 *         UniqueAttribute?: array{AttributePath?: string, AttributeValue?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result isMemberInGroups(array $args = [])
 * @phpstan-method \Aws\Result isMemberInGroups(array{IdentityStoreId?: string, MemberId?: array{UserId?: string, ...}, GroupIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise isMemberInGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise isMemberInGroupsAsync(array{IdentityStoreId?: string, MemberId?: array{UserId?: string, ...}, GroupIds?: list<string>, ...} $args = [])
 * @method \Aws\Result listGroupMemberships(array $args = [])
 * @phpstan-method \Aws\Result listGroupMemberships(array{IdentityStoreId?: string, GroupId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupMembershipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupMembershipsAsync(array{IdentityStoreId?: string, GroupId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGroupMembershipsForMember(array $args = [])
 * @phpstan-method \Aws\Result listGroupMembershipsForMember(array{
 *     IdentityStoreId?: string,
 *     MemberId?: array{UserId?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupMembershipsForMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupMembershipsForMemberAsync(array{
 *     IdentityStoreId?: string,
 *     MemberId?: array{UserId?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @phpstan-method \Aws\Result listGroups(array{
 *     IdentityStoreId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{AttributePath?: string, AttributeValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsAsync(array{
 *     IdentityStoreId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{AttributePath?: string, AttributeValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{
 *     IdentityStoreId?: string,
 *     Extensions?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{AttributePath?: string, AttributeValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{
 *     IdentityStoreId?: string,
 *     Extensions?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{AttributePath?: string, AttributeValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateGroup(array{
 *     IdentityStoreId?: string,
 *     GroupId?: string,
 *     Operations?: list<array{AttributePath?: string, AttributeValue?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupAsync(array{
 *     IdentityStoreId?: string,
 *     GroupId?: string,
 *     Operations?: list<array{AttributePath?: string, AttributeValue?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     IdentityStoreId?: string,
 *     UserId?: string,
 *     Operations?: list<array{AttributePath?: string, AttributeValue?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     IdentityStoreId?: string,
 *     UserId?: string,
 *     Operations?: list<array{AttributePath?: string, AttributeValue?: array, ...}>,
 *     ...,
 * } $args = [])
 */
class IdentityStoreClient extends AwsClient {}
