<?php
namespace Aws\RAM;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Resource Access Manager** service.
 * @method \Aws\Result acceptResourceShareInvitation(array $args = [])
 * @phpstan-method \Aws\Result acceptResourceShareInvitation(array{resourceShareInvitationArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptResourceShareInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptResourceShareInvitationAsync(array{resourceShareInvitationArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result associateResourceShare(array $args = [])
 * @phpstan-method \Aws\Result associateResourceShare(array{
 *     resourceShareArn?: string,
 *     resourceArns?: list<string>,
 *     principals?: list<string>,
 *     clientToken?: string,
 *     sources?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateResourceShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateResourceShareAsync(array{
 *     resourceShareArn?: string,
 *     resourceArns?: list<string>,
 *     principals?: list<string>,
 *     clientToken?: string,
 *     sources?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateResourceSharePermission(array $args = [])
 * @phpstan-method \Aws\Result associateResourceSharePermission(array{
 *     resourceShareArn?: string,
 *     permissionArn?: string,
 *     replace?: bool,
 *     clientToken?: string,
 *     permissionVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateResourceSharePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateResourceSharePermissionAsync(array{
 *     resourceShareArn?: string,
 *     permissionArn?: string,
 *     replace?: bool,
 *     clientToken?: string,
 *     permissionVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPermission(array $args = [])
 * @phpstan-method \Aws\Result createPermission(array{
 *     name?: string,
 *     resourceType?: string,
 *     policyTemplate?: string,
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPermissionAsync(array{
 *     name?: string,
 *     resourceType?: string,
 *     policyTemplate?: string,
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPermissionVersion(array $args = [])
 * @phpstan-method \Aws\Result createPermissionVersion(array{permissionArn?: string, policyTemplate?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPermissionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPermissionVersionAsync(array{permissionArn?: string, policyTemplate?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createResourceShare(array $args = [])
 * @phpstan-method \Aws\Result createResourceShare(array{
 *     name?: string,
 *     resourceArns?: list<string>,
 *     principals?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     allowExternalPrincipals?: bool,
 *     clientToken?: string,
 *     permissionArns?: list<string>,
 *     sources?: list<string>,
 *     resourceShareConfiguration?: array{retainSharingOnAccountLeaveOrganization?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceShareAsync(array{
 *     name?: string,
 *     resourceArns?: list<string>,
 *     principals?: list<string>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     allowExternalPrincipals?: bool,
 *     clientToken?: string,
 *     permissionArns?: list<string>,
 *     sources?: list<string>,
 *     resourceShareConfiguration?: array{retainSharingOnAccountLeaveOrganization?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePermission(array $args = [])
 * @phpstan-method \Aws\Result deletePermission(array{permissionArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePermissionAsync(array{permissionArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deletePermissionVersion(array $args = [])
 * @phpstan-method \Aws\Result deletePermissionVersion(array{permissionArn?: string, permissionVersion?: int, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePermissionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePermissionVersionAsync(array{permissionArn?: string, permissionVersion?: int, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteResourceShare(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceShare(array{resourceShareArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceShareAsync(array{resourceShareArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateResourceShare(array $args = [])
 * @phpstan-method \Aws\Result disassociateResourceShare(array{
 *     resourceShareArn?: string,
 *     resourceArns?: list<string>,
 *     principals?: list<string>,
 *     clientToken?: string,
 *     sources?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateResourceShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateResourceShareAsync(array{
 *     resourceShareArn?: string,
 *     resourceArns?: list<string>,
 *     principals?: list<string>,
 *     clientToken?: string,
 *     sources?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateResourceSharePermission(array $args = [])
 * @phpstan-method \Aws\Result disassociateResourceSharePermission(array{resourceShareArn?: string, permissionArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateResourceSharePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateResourceSharePermissionAsync(array{resourceShareArn?: string, permissionArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result enableSharingWithAwsOrganization(array $args = [])
 * @phpstan-method \Aws\Result enableSharingWithAwsOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableSharingWithAwsOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableSharingWithAwsOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result getPermission(array $args = [])
 * @phpstan-method \Aws\Result getPermission(array{permissionArn?: string, permissionVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPermissionAsync(array{permissionArn?: string, permissionVersion?: int, ...} $args = [])
 * @method \Aws\Result getResourcePolicies(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicies(array{resourceArns?: list<string>, principal?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePoliciesAsync(array{resourceArns?: list<string>, principal?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getResourceShareAssociations(array $args = [])
 * @phpstan-method \Aws\Result getResourceShareAssociations(array{
 *     associationType?: 'PRINCIPAL'|'RESOURCE'|'SOURCE',
 *     resourceShareArns?: list<string>,
 *     resourceArn?: string,
 *     principal?: string,
 *     associationStatus?: 'ASSOCIATED'|'ASSOCIATING'|'DISASSOCIATED'|'DISASSOCIATING'|'FAILED'|'RESTORING'|'SUSPENDED'|'SUSPENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceShareAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceShareAssociationsAsync(array{
 *     associationType?: 'PRINCIPAL'|'RESOURCE'|'SOURCE',
 *     resourceShareArns?: list<string>,
 *     resourceArn?: string,
 *     principal?: string,
 *     associationStatus?: 'ASSOCIATED'|'ASSOCIATING'|'DISASSOCIATED'|'DISASSOCIATING'|'FAILED'|'RESTORING'|'SUSPENDED'|'SUSPENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourceShareInvitations(array $args = [])
 * @phpstan-method \Aws\Result getResourceShareInvitations(array{
 *     resourceShareInvitationArns?: list<string>,
 *     resourceShareArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceShareInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceShareInvitationsAsync(array{
 *     resourceShareInvitationArns?: list<string>,
 *     resourceShareArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourceShares(array $args = [])
 * @phpstan-method \Aws\Result getResourceShares(array{
 *     resourceShareArns?: list<string>,
 *     resourceShareStatus?: 'ACTIVE'|'DELETED'|'DELETING'|'FAILED'|'PENDING',
 *     resourceOwner?: 'OTHER-ACCOUNTS'|'SELF',
 *     name?: string,
 *     tagFilters?: list<array{tagKey?: string, tagValues?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     permissionArn?: string,
 *     permissionVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceSharesAsync(array{
 *     resourceShareArns?: list<string>,
 *     resourceShareStatus?: 'ACTIVE'|'DELETED'|'DELETING'|'FAILED'|'PENDING',
 *     resourceOwner?: 'OTHER-ACCOUNTS'|'SELF',
 *     name?: string,
 *     tagFilters?: list<array{tagKey?: string, tagValues?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     permissionArn?: string,
 *     permissionVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPendingInvitationResources(array $args = [])
 * @phpstan-method \Aws\Result listPendingInvitationResources(array{
 *     resourceShareInvitationArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     resourceRegionScope?: 'ALL'|'GLOBAL'|'REGIONAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPendingInvitationResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPendingInvitationResourcesAsync(array{
 *     resourceShareInvitationArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     resourceRegionScope?: 'ALL'|'GLOBAL'|'REGIONAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPermissionAssociations(array $args = [])
 * @phpstan-method \Aws\Result listPermissionAssociations(array{
 *     permissionArn?: string,
 *     permissionVersion?: int,
 *     associationStatus?: 'ASSOCIATED'|'ASSOCIATING'|'DISASSOCIATED'|'DISASSOCIATING'|'FAILED'|'RESTORING'|'SUSPENDED'|'SUSPENDING',
 *     resourceType?: string,
 *     featureSet?: 'CREATED_FROM_POLICY'|'PROMOTING_TO_STANDARD'|'STANDARD',
 *     defaultVersion?: bool,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionAssociationsAsync(array{
 *     permissionArn?: string,
 *     permissionVersion?: int,
 *     associationStatus?: 'ASSOCIATED'|'ASSOCIATING'|'DISASSOCIATED'|'DISASSOCIATING'|'FAILED'|'RESTORING'|'SUSPENDED'|'SUSPENDING',
 *     resourceType?: string,
 *     featureSet?: 'CREATED_FROM_POLICY'|'PROMOTING_TO_STANDARD'|'STANDARD',
 *     defaultVersion?: bool,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPermissionVersions(array $args = [])
 * @phpstan-method \Aws\Result listPermissionVersions(array{permissionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionVersionsAsync(array{permissionArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPermissions(array $args = [])
 * @phpstan-method \Aws\Result listPermissions(array{
 *     resourceType?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     permissionType?: 'ALL'|'AWS_MANAGED'|'CUSTOMER_MANAGED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionsAsync(array{
 *     resourceType?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     permissionType?: 'ALL'|'AWS_MANAGED'|'CUSTOMER_MANAGED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPrincipals(array $args = [])
 * @phpstan-method \Aws\Result listPrincipals(array{
 *     resourceOwner?: 'OTHER-ACCOUNTS'|'SELF',
 *     resourceArn?: string,
 *     principals?: list<string>,
 *     resourceType?: string,
 *     resourceShareArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrincipalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrincipalsAsync(array{
 *     resourceOwner?: 'OTHER-ACCOUNTS'|'SELF',
 *     resourceArn?: string,
 *     principals?: list<string>,
 *     resourceType?: string,
 *     resourceShareArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReplacePermissionAssociationsWork(array $args = [])
 * @phpstan-method \Aws\Result listReplacePermissionAssociationsWork(array{
 *     workIds?: list<string>,
 *     status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReplacePermissionAssociationsWorkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReplacePermissionAssociationsWorkAsync(array{
 *     workIds?: list<string>,
 *     status?: 'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceSharePermissions(array $args = [])
 * @phpstan-method \Aws\Result listResourceSharePermissions(array{resourceShareArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceSharePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceSharePermissionsAsync(array{resourceShareArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listResourceTypes(array $args = [])
 * @phpstan-method \Aws\Result listResourceTypes(array{nextToken?: string, maxResults?: int, resourceRegionScope?: 'ALL'|'GLOBAL'|'REGIONAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceTypesAsync(array{nextToken?: string, maxResults?: int, resourceRegionScope?: 'ALL'|'GLOBAL'|'REGIONAL', ...} $args = [])
 * @method \Aws\Result listResources(array $args = [])
 * @phpstan-method \Aws\Result listResources(array{
 *     resourceOwner?: 'OTHER-ACCOUNTS'|'SELF',
 *     principal?: string,
 *     resourceType?: string,
 *     resourceArns?: list<string>,
 *     resourceShareArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     resourceRegionScope?: 'ALL'|'GLOBAL'|'REGIONAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesAsync(array{
 *     resourceOwner?: 'OTHER-ACCOUNTS'|'SELF',
 *     principal?: string,
 *     resourceType?: string,
 *     resourceArns?: list<string>,
 *     resourceShareArns?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     resourceRegionScope?: 'ALL'|'GLOBAL'|'REGIONAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSourceAssociations(array $args = [])
 * @phpstan-method \Aws\Result listSourceAssociations(array{
 *     resourceShareArns?: list<string>,
 *     sourceId?: string,
 *     sourceType?: string,
 *     associationStatus?: 'ASSOCIATED'|'ASSOCIATING'|'DISASSOCIATED'|'DISASSOCIATING'|'FAILED'|'RESTORING'|'SUSPENDED'|'SUSPENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSourceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSourceAssociationsAsync(array{
 *     resourceShareArns?: list<string>,
 *     sourceId?: string,
 *     sourceType?: string,
 *     associationStatus?: 'ASSOCIATED'|'ASSOCIATING'|'DISASSOCIATED'|'DISASSOCIATING'|'FAILED'|'RESTORING'|'SUSPENDED'|'SUSPENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result promotePermissionCreatedFromPolicy(array $args = [])
 * @phpstan-method \Aws\Result promotePermissionCreatedFromPolicy(array{permissionArn?: string, name?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise promotePermissionCreatedFromPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise promotePermissionCreatedFromPolicyAsync(array{permissionArn?: string, name?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result promoteResourceShareCreatedFromPolicy(array $args = [])
 * @phpstan-method \Aws\Result promoteResourceShareCreatedFromPolicy(array{resourceShareArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise promoteResourceShareCreatedFromPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise promoteResourceShareCreatedFromPolicyAsync(array{resourceShareArn?: string, ...} $args = [])
 * @method \Aws\Result rejectResourceShareInvitation(array $args = [])
 * @phpstan-method \Aws\Result rejectResourceShareInvitation(array{resourceShareInvitationArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectResourceShareInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectResourceShareInvitationAsync(array{resourceShareInvitationArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result replacePermissionAssociations(array $args = [])
 * @phpstan-method \Aws\Result replacePermissionAssociations(array{
 *     fromPermissionArn?: string,
 *     fromPermissionVersion?: int,
 *     toPermissionArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise replacePermissionAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise replacePermissionAssociationsAsync(array{
 *     fromPermissionArn?: string,
 *     fromPermissionVersion?: int,
 *     toPermissionArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setDefaultPermissionVersion(array $args = [])
 * @phpstan-method \Aws\Result setDefaultPermissionVersion(array{permissionArn?: string, permissionVersion?: int, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setDefaultPermissionVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setDefaultPermissionVersionAsync(array{permissionArn?: string, permissionVersion?: int, clientToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{
 *     resourceShareArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     resourceArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{
 *     resourceShareArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     resourceArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceShareArn?: string, tagKeys?: list<string>, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceShareArn?: string, tagKeys?: list<string>, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result updateResourceShare(array $args = [])
 * @phpstan-method \Aws\Result updateResourceShare(array{resourceShareArn?: string, name?: string, allowExternalPrincipals?: bool, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceShareAsync(array{resourceShareArn?: string, name?: string, allowExternalPrincipals?: bool, clientToken?: string, ...} $args = [])
 */
class RAMClient extends AwsClient {}
