<?php
namespace Aws\DirectoryServiceData;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Directory Service Data** service.
 * @method \Aws\Result addGroupMember(array $args = [])
 * @phpstan-method \Aws\Result addGroupMember(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     GroupName?: string,
 *     MemberName?: string,
 *     MemberRealm?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addGroupMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addGroupMemberAsync(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     GroupName?: string,
 *     MemberName?: string,
 *     MemberRealm?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @phpstan-method \Aws\Result createGroup(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     GroupScope?: 'BuiltinLocal'|'DomainLocal'|'Global'|'Universal',
 *     GroupType?: 'Distribution'|'Security',
 *     OtherAttributes?: array<string, array{BOOL?: bool, N?: int, S?: string, SS?: list<string>, ...}>,
 *     SAMAccountName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupAsync(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     GroupScope?: 'BuiltinLocal'|'DomainLocal'|'Global'|'Universal',
 *     GroupType?: 'Distribution'|'Security',
 *     OtherAttributes?: array<string, array{BOOL?: bool, N?: int, S?: string, SS?: list<string>, ...}>,
 *     SAMAccountName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     EmailAddress?: string,
 *     GivenName?: string,
 *     OtherAttributes?: array<string, array{BOOL?: bool, N?: int, S?: string, SS?: list<string>, ...}>,
 *     SAMAccountName?: string,
 *     Surname?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     EmailAddress?: string,
 *     GivenName?: string,
 *     OtherAttributes?: array<string, array{BOOL?: bool, N?: int, S?: string, SS?: list<string>, ...}>,
 *     SAMAccountName?: string,
 *     Surname?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteGroup(array{ClientToken?: string, DirectoryId?: string, SAMAccountName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGroupAsync(array{ClientToken?: string, DirectoryId?: string, SAMAccountName?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{ClientToken?: string, DirectoryId?: string, SAMAccountName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{ClientToken?: string, DirectoryId?: string, SAMAccountName?: string, ...} $args = [])
 * @method \Aws\Result describeGroup(array $args = [])
 * @phpstan-method \Aws\Result describeGroup(array{DirectoryId?: string, OtherAttributes?: list<string>, Realm?: string, SAMAccountName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGroupAsync(array{DirectoryId?: string, OtherAttributes?: list<string>, Realm?: string, SAMAccountName?: string, ...} $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @phpstan-method \Aws\Result describeUser(array{DirectoryId?: string, OtherAttributes?: list<string>, Realm?: string, SAMAccountName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserAsync(array{DirectoryId?: string, OtherAttributes?: list<string>, Realm?: string, SAMAccountName?: string, ...} $args = [])
 * @method \Aws\Result disableUser(array $args = [])
 * @phpstan-method \Aws\Result disableUser(array{ClientToken?: string, DirectoryId?: string, SAMAccountName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableUserAsync(array{ClientToken?: string, DirectoryId?: string, SAMAccountName?: string, ...} $args = [])
 * @method \Aws\Result listGroupMembers(array $args = [])
 * @phpstan-method \Aws\Result listGroupMembers(array{
 *     DirectoryId?: string,
 *     MaxResults?: int,
 *     MemberRealm?: string,
 *     NextToken?: string,
 *     Realm?: string,
 *     SAMAccountName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupMembersAsync(array{
 *     DirectoryId?: string,
 *     MaxResults?: int,
 *     MemberRealm?: string,
 *     NextToken?: string,
 *     Realm?: string,
 *     SAMAccountName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @phpstan-method \Aws\Result listGroups(array{DirectoryId?: string, MaxResults?: int, NextToken?: string, Realm?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsAsync(array{DirectoryId?: string, MaxResults?: int, NextToken?: string, Realm?: string, ...} $args = [])
 * @method \Aws\Result listGroupsForMember(array $args = [])
 * @phpstan-method \Aws\Result listGroupsForMember(array{
 *     DirectoryId?: string,
 *     MaxResults?: int,
 *     MemberRealm?: string,
 *     NextToken?: string,
 *     Realm?: string,
 *     SAMAccountName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsForMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroupsForMemberAsync(array{
 *     DirectoryId?: string,
 *     MaxResults?: int,
 *     MemberRealm?: string,
 *     NextToken?: string,
 *     Realm?: string,
 *     SAMAccountName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{DirectoryId?: string, MaxResults?: int, NextToken?: string, Realm?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{DirectoryId?: string, MaxResults?: int, NextToken?: string, Realm?: string, ...} $args = [])
 * @method \Aws\Result removeGroupMember(array $args = [])
 * @phpstan-method \Aws\Result removeGroupMember(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     GroupName?: string,
 *     MemberName?: string,
 *     MemberRealm?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeGroupMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeGroupMemberAsync(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     GroupName?: string,
 *     MemberName?: string,
 *     MemberRealm?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchGroups(array $args = [])
 * @phpstan-method \Aws\Result searchGroups(array{
 *     DirectoryId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Realm?: string,
 *     SearchAttributes?: list<string>,
 *     SearchString?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchGroupsAsync(array{
 *     DirectoryId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Realm?: string,
 *     SearchAttributes?: list<string>,
 *     SearchString?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchUsers(array $args = [])
 * @phpstan-method \Aws\Result searchUsers(array{
 *     DirectoryId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Realm?: string,
 *     SearchAttributes?: list<string>,
 *     SearchString?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchUsersAsync(array{
 *     DirectoryId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Realm?: string,
 *     SearchAttributes?: list<string>,
 *     SearchString?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateGroup(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     GroupScope?: 'BuiltinLocal'|'DomainLocal'|'Global'|'Universal',
 *     GroupType?: 'Distribution'|'Security',
 *     OtherAttributes?: array<string, array{BOOL?: bool, N?: int, S?: string, SS?: list<string>, ...}>,
 *     SAMAccountName?: string,
 *     UpdateType?: 'ADD'|'REMOVE'|'REPLACE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupAsync(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     GroupScope?: 'BuiltinLocal'|'DomainLocal'|'Global'|'Universal',
 *     GroupType?: 'Distribution'|'Security',
 *     OtherAttributes?: array<string, array{BOOL?: bool, N?: int, S?: string, SS?: list<string>, ...}>,
 *     SAMAccountName?: string,
 *     UpdateType?: 'ADD'|'REMOVE'|'REPLACE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     EmailAddress?: string,
 *     GivenName?: string,
 *     OtherAttributes?: array<string, array{BOOL?: bool, N?: int, S?: string, SS?: list<string>, ...}>,
 *     SAMAccountName?: string,
 *     Surname?: string,
 *     UpdateType?: 'ADD'|'REMOVE'|'REPLACE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     ClientToken?: string,
 *     DirectoryId?: string,
 *     EmailAddress?: string,
 *     GivenName?: string,
 *     OtherAttributes?: array<string, array{BOOL?: bool, N?: int, S?: string, SS?: list<string>, ...}>,
 *     SAMAccountName?: string,
 *     Surname?: string,
 *     UpdateType?: 'ADD'|'REMOVE'|'REPLACE',
 *     ...,
 * } $args = [])
 */
class DirectoryServiceDataClient extends AwsClient {}
