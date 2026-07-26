<?php
namespace Aws\CognitoIdentity;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Cognito Identity** service.
 *
 * @method \Aws\Result createIdentityPool(array $args = [])
 * @phpstan-method \Aws\Result createIdentityPool(array{
 *     IdentityPoolName?: string,
 *     AllowUnauthenticatedIdentities?: bool,
 *     AllowClassicFlow?: bool,
 *     SupportedLoginProviders?: array<string, string>,
 *     DeveloperProviderName?: string,
 *     OpenIdConnectProviderARNs?: list<string>,
 *     CognitoIdentityProviders?: list<array{ProviderName?: string, ClientId?: string, ServerSideTokenCheck?: bool, ...}>,
 *     SamlProviderARNs?: list<string>,
 *     IdentityPoolTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIdentityPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIdentityPoolAsync(array{
 *     IdentityPoolName?: string,
 *     AllowUnauthenticatedIdentities?: bool,
 *     AllowClassicFlow?: bool,
 *     SupportedLoginProviders?: array<string, string>,
 *     DeveloperProviderName?: string,
 *     OpenIdConnectProviderARNs?: list<string>,
 *     CognitoIdentityProviders?: list<array{ProviderName?: string, ClientId?: string, ServerSideTokenCheck?: bool, ...}>,
 *     SamlProviderARNs?: list<string>,
 *     IdentityPoolTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteIdentities(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentities(array{IdentityIdsToDelete?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdentitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentitiesAsync(array{IdentityIdsToDelete?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteIdentityPool(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentityPool(array{IdentityPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdentityPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentityPoolAsync(array{IdentityPoolId?: string, ...} $args = [])
 * @method \Aws\Result describeIdentity(array $args = [])
 * @phpstan-method \Aws\Result describeIdentity(array{IdentityId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIdentityAsync(array{IdentityId?: string, ...} $args = [])
 * @method \Aws\Result describeIdentityPool(array $args = [])
 * @phpstan-method \Aws\Result describeIdentityPool(array{IdentityPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIdentityPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIdentityPoolAsync(array{IdentityPoolId?: string, ...} $args = [])
 * @method \Aws\Result getCredentialsForIdentity(array $args = [])
 * @phpstan-method \Aws\Result getCredentialsForIdentity(array{IdentityId?: string, Logins?: array<string, string>, CustomRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCredentialsForIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCredentialsForIdentityAsync(array{IdentityId?: string, Logins?: array<string, string>, CustomRoleArn?: string, ...} $args = [])
 * @method \Aws\Result getId(array $args = [])
 * @phpstan-method \Aws\Result getId(array{AccountId?: string, IdentityPoolId?: string, Logins?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdAsync(array{AccountId?: string, IdentityPoolId?: string, Logins?: array<string, string>, ...} $args = [])
 * @method \Aws\Result getIdentityPoolRoles(array $args = [])
 * @phpstan-method \Aws\Result getIdentityPoolRoles(array{IdentityPoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityPoolRolesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityPoolRolesAsync(array{IdentityPoolId?: string, ...} $args = [])
 * @method \Aws\Result getOpenIdToken(array $args = [])
 * @phpstan-method \Aws\Result getOpenIdToken(array{IdentityId?: string, Logins?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOpenIdTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOpenIdTokenAsync(array{IdentityId?: string, Logins?: array<string, string>, ...} $args = [])
 * @method \Aws\Result getOpenIdTokenForDeveloperIdentity(array $args = [])
 * @phpstan-method \Aws\Result getOpenIdTokenForDeveloperIdentity(array{
 *     IdentityPoolId?: string,
 *     IdentityId?: string,
 *     Logins?: array<string, string>,
 *     PrincipalTags?: array<string, string>,
 *     TokenDuration?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getOpenIdTokenForDeveloperIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOpenIdTokenForDeveloperIdentityAsync(array{
 *     IdentityPoolId?: string,
 *     IdentityId?: string,
 *     Logins?: array<string, string>,
 *     PrincipalTags?: array<string, string>,
 *     TokenDuration?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPrincipalTagAttributeMap(array $args = [])
 * @phpstan-method \Aws\Result getPrincipalTagAttributeMap(array{IdentityPoolId?: string, IdentityProviderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPrincipalTagAttributeMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPrincipalTagAttributeMapAsync(array{IdentityPoolId?: string, IdentityProviderName?: string, ...} $args = [])
 * @method \Aws\Result listIdentities(array $args = [])
 * @phpstan-method \Aws\Result listIdentities(array{IdentityPoolId?: string, MaxResults?: int, NextToken?: string, HideDisabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentitiesAsync(array{IdentityPoolId?: string, MaxResults?: int, NextToken?: string, HideDisabled?: bool, ...} $args = [])
 * @method \Aws\Result listIdentityPools(array $args = [])
 * @phpstan-method \Aws\Result listIdentityPools(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentityPoolsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentityPoolsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result lookupDeveloperIdentity(array $args = [])
 * @phpstan-method \Aws\Result lookupDeveloperIdentity(array{
 *     IdentityPoolId?: string,
 *     IdentityId?: string,
 *     DeveloperUserIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise lookupDeveloperIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise lookupDeveloperIdentityAsync(array{
 *     IdentityPoolId?: string,
 *     IdentityId?: string,
 *     DeveloperUserIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result mergeDeveloperIdentities(array $args = [])
 * @phpstan-method \Aws\Result mergeDeveloperIdentities(array{
 *     SourceUserIdentifier?: string,
 *     DestinationUserIdentifier?: string,
 *     DeveloperProviderName?: string,
 *     IdentityPoolId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise mergeDeveloperIdentitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise mergeDeveloperIdentitiesAsync(array{
 *     SourceUserIdentifier?: string,
 *     DestinationUserIdentifier?: string,
 *     DeveloperProviderName?: string,
 *     IdentityPoolId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setIdentityPoolRoles(array $args = [])
 * @phpstan-method \Aws\Result setIdentityPoolRoles(array{
 *     IdentityPoolId?: string,
 *     Roles?: array<string, string>,
 *     RoleMappings?: array<string, array{
 *         Type?: 'Rules'|'Token',
 *         AmbiguousRoleResolution?: 'AuthenticatedRole'|'Deny',
 *         RulesConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setIdentityPoolRolesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setIdentityPoolRolesAsync(array{
 *     IdentityPoolId?: string,
 *     Roles?: array<string, string>,
 *     RoleMappings?: array<string, array{
 *         Type?: 'Rules'|'Token',
 *         AmbiguousRoleResolution?: 'AuthenticatedRole'|'Deny',
 *         RulesConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setPrincipalTagAttributeMap(array $args = [])
 * @phpstan-method \Aws\Result setPrincipalTagAttributeMap(array{
 *     IdentityPoolId?: string,
 *     IdentityProviderName?: string,
 *     UseDefaults?: bool,
 *     PrincipalTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setPrincipalTagAttributeMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setPrincipalTagAttributeMapAsync(array{
 *     IdentityPoolId?: string,
 *     IdentityProviderName?: string,
 *     UseDefaults?: bool,
 *     PrincipalTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result unlinkDeveloperIdentity(array $args = [])
 * @phpstan-method \Aws\Result unlinkDeveloperIdentity(array{
 *     IdentityId?: string,
 *     IdentityPoolId?: string,
 *     DeveloperProviderName?: string,
 *     DeveloperUserIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise unlinkDeveloperIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unlinkDeveloperIdentityAsync(array{
 *     IdentityId?: string,
 *     IdentityPoolId?: string,
 *     DeveloperProviderName?: string,
 *     DeveloperUserIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result unlinkIdentity(array $args = [])
 * @phpstan-method \Aws\Result unlinkIdentity(array{IdentityId?: string, Logins?: array<string, string>, LoginsToRemove?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unlinkIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unlinkIdentityAsync(array{IdentityId?: string, Logins?: array<string, string>, LoginsToRemove?: list<string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateIdentityPool(array $args = [])
 * @phpstan-method \Aws\Result updateIdentityPool(array{
 *     IdentityPoolId?: string,
 *     IdentityPoolName?: string,
 *     AllowUnauthenticatedIdentities?: bool,
 *     AllowClassicFlow?: bool,
 *     SupportedLoginProviders?: array<string, string>,
 *     DeveloperProviderName?: string,
 *     OpenIdConnectProviderARNs?: list<string>,
 *     CognitoIdentityProviders?: list<array{ProviderName?: string, ClientId?: string, ServerSideTokenCheck?: bool, ...}>,
 *     SamlProviderARNs?: list<string>,
 *     IdentityPoolTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIdentityPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIdentityPoolAsync(array{
 *     IdentityPoolId?: string,
 *     IdentityPoolName?: string,
 *     AllowUnauthenticatedIdentities?: bool,
 *     AllowClassicFlow?: bool,
 *     SupportedLoginProviders?: array<string, string>,
 *     DeveloperProviderName?: string,
 *     OpenIdConnectProviderARNs?: list<string>,
 *     CognitoIdentityProviders?: list<array{ProviderName?: string, ClientId?: string, ServerSideTokenCheck?: bool, ...}>,
 *     SamlProviderARNs?: list<string>,
 *     IdentityPoolTags?: array<string, string>,
 *     ...,
 * } $args = [])
 */
class CognitoIdentityClient extends AwsClient {}
