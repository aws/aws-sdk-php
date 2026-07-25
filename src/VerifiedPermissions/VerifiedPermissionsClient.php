<?php
namespace Aws\VerifiedPermissions;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Verified Permissions** service.
 * @method \Aws\Result batchGetPolicy(array $args = [])
 * @phpstan-method \Aws\Result batchGetPolicy(array{requests?: list<array{policyStoreId?: string, policyId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetPolicyAsync(array{requests?: list<array{policyStoreId?: string, policyId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchIsAuthorized(array $args = [])
 * @phpstan-method \Aws\Result batchIsAuthorized(array{
 *     policyStoreId?: string,
 *     entities?: array{entityList?: list<array>, cedarJson?: string, ...},
 *     requests?: list<array{principal?: array, action?: array, resource?: array, context?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchIsAuthorizedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchIsAuthorizedAsync(array{
 *     policyStoreId?: string,
 *     entities?: array{entityList?: list<array>, cedarJson?: string, ...},
 *     requests?: list<array{principal?: array, action?: array, resource?: array, context?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchIsAuthorizedWithToken(array $args = [])
 * @phpstan-method \Aws\Result batchIsAuthorizedWithToken(array{
 *     policyStoreId?: string,
 *     identityToken?: string,
 *     accessToken?: string,
 *     entities?: array{entityList?: list<array>, cedarJson?: string, ...},
 *     requests?: list<array{action?: array, resource?: array, context?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchIsAuthorizedWithTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchIsAuthorizedWithTokenAsync(array{
 *     policyStoreId?: string,
 *     identityToken?: string,
 *     accessToken?: string,
 *     entities?: array{entityList?: list<array>, cedarJson?: string, ...},
 *     requests?: list<array{action?: array, resource?: array, context?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIdentitySource(array $args = [])
 * @phpstan-method \Aws\Result createIdentitySource(array{
 *     clientToken?: string,
 *     policyStoreId?: string,
 *     configuration?: array{
 *         cognitoUserPoolConfiguration?: array{userPoolArn?: string, clientIds?: list<string>, groupConfiguration?: array, ...},
 *         openIdConnectConfiguration?: array{issuer?: string, entityIdPrefix?: string, groupConfiguration?: array, tokenSelection?: array, ...},
 *         ...,
 *     },
 *     principalEntityType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIdentitySourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIdentitySourceAsync(array{
 *     clientToken?: string,
 *     policyStoreId?: string,
 *     configuration?: array{
 *         cognitoUserPoolConfiguration?: array{userPoolArn?: string, clientIds?: list<string>, groupConfiguration?: array, ...},
 *         openIdConnectConfiguration?: array{issuer?: string, entityIdPrefix?: string, groupConfiguration?: array, tokenSelection?: array, ...},
 *         ...,
 *     },
 *     principalEntityType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicy(array $args = [])
 * @phpstan-method \Aws\Result createPolicy(array{
 *     clientToken?: string,
 *     policyStoreId?: string,
 *     definition?: array{
 *         static?: array{description?: string, statement?: string, ...},
 *         templateLinked?: array{policyTemplateId?: string, principal?: array, resource?: array, ...},
 *         ...,
 *     },
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyAsync(array{
 *     clientToken?: string,
 *     policyStoreId?: string,
 *     definition?: array{
 *         static?: array{description?: string, statement?: string, ...},
 *         templateLinked?: array{policyTemplateId?: string, principal?: array, resource?: array, ...},
 *         ...,
 *     },
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicyStore(array $args = [])
 * @phpstan-method \Aws\Result createPolicyStore(array{
 *     clientToken?: string,
 *     validationSettings?: array{mode?: 'OFF'|'STRICT', ...},
 *     description?: string,
 *     deletionProtection?: 'DISABLED'|'ENABLED',
 *     encryptionSettings?: array{
 *         kmsEncryptionSettings?: array{key?: string, encryptionContext?: array<string, string>, ...},
 *         default?: array,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyStoreAsync(array{
 *     clientToken?: string,
 *     validationSettings?: array{mode?: 'OFF'|'STRICT', ...},
 *     description?: string,
 *     deletionProtection?: 'DISABLED'|'ENABLED',
 *     encryptionSettings?: array{
 *         kmsEncryptionSettings?: array{key?: string, encryptionContext?: array<string, string>, ...},
 *         default?: array,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicyStoreAlias(array $args = [])
 * @phpstan-method \Aws\Result createPolicyStoreAlias(array{aliasName?: string, policyStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyStoreAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyStoreAliasAsync(array{aliasName?: string, policyStoreId?: string, ...} $args = [])
 * @method \Aws\Result createPolicyTemplate(array $args = [])
 * @phpstan-method \Aws\Result createPolicyTemplate(array{
 *     clientToken?: string,
 *     policyStoreId?: string,
 *     description?: string,
 *     statement?: string,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyTemplateAsync(array{
 *     clientToken?: string,
 *     policyStoreId?: string,
 *     description?: string,
 *     statement?: string,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteIdentitySource(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentitySource(array{policyStoreId?: string, identitySourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdentitySourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentitySourceAsync(array{policyStoreId?: string, identitySourceId?: string, ...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{policyStoreId?: string, policyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{policyStoreId?: string, policyId?: string, ...} $args = [])
 * @method \Aws\Result deletePolicyStore(array $args = [])
 * @phpstan-method \Aws\Result deletePolicyStore(array{policyStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyStoreAsync(array{policyStoreId?: string, ...} $args = [])
 * @method \Aws\Result deletePolicyStoreAlias(array $args = [])
 * @phpstan-method \Aws\Result deletePolicyStoreAlias(array{aliasName?: string, deletionMode?: 'HardDelete'|'SoftDelete', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyStoreAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyStoreAliasAsync(array{aliasName?: string, deletionMode?: 'HardDelete'|'SoftDelete', ...} $args = [])
 * @method \Aws\Result deletePolicyTemplate(array $args = [])
 * @phpstan-method \Aws\Result deletePolicyTemplate(array{policyStoreId?: string, policyTemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyTemplateAsync(array{policyStoreId?: string, policyTemplateId?: string, ...} $args = [])
 * @method \Aws\Result getIdentitySource(array $args = [])
 * @phpstan-method \Aws\Result getIdentitySource(array{policyStoreId?: string, identitySourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentitySourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentitySourceAsync(array{policyStoreId?: string, identitySourceId?: string, ...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{policyStoreId?: string, policyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{policyStoreId?: string, policyId?: string, ...} $args = [])
 * @method \Aws\Result getPolicyStore(array $args = [])
 * @phpstan-method \Aws\Result getPolicyStore(array{policyStoreId?: string, tags?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyStoreAsync(array{policyStoreId?: string, tags?: bool, ...} $args = [])
 * @method \Aws\Result getPolicyStoreAlias(array $args = [])
 * @phpstan-method \Aws\Result getPolicyStoreAlias(array{aliasName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyStoreAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyStoreAliasAsync(array{aliasName?: string, ...} $args = [])
 * @method \Aws\Result getPolicyTemplate(array $args = [])
 * @phpstan-method \Aws\Result getPolicyTemplate(array{policyStoreId?: string, policyTemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyTemplateAsync(array{policyStoreId?: string, policyTemplateId?: string, ...} $args = [])
 * @method \Aws\Result getSchema(array $args = [])
 * @phpstan-method \Aws\Result getSchema(array{policyStoreId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaAsync(array{policyStoreId?: string, ...} $args = [])
 * @method \Aws\Result isAuthorized(array $args = [])
 * @phpstan-method \Aws\Result isAuthorized(array{
 *     policyStoreId?: string,
 *     principal?: array{entityType?: string, entityId?: string, ...},
 *     action?: array{actionType?: string, actionId?: string, ...},
 *     resource?: array{entityType?: string, entityId?: string, ...},
 *     context?: array{contextMap?: array<string, array>, cedarJson?: string, ...},
 *     entities?: array{entityList?: list<array>, cedarJson?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise isAuthorizedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise isAuthorizedAsync(array{
 *     policyStoreId?: string,
 *     principal?: array{entityType?: string, entityId?: string, ...},
 *     action?: array{actionType?: string, actionId?: string, ...},
 *     resource?: array{entityType?: string, entityId?: string, ...},
 *     context?: array{contextMap?: array<string, array>, cedarJson?: string, ...},
 *     entities?: array{entityList?: list<array>, cedarJson?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result isAuthorizedWithToken(array $args = [])
 * @phpstan-method \Aws\Result isAuthorizedWithToken(array{
 *     policyStoreId?: string,
 *     identityToken?: string,
 *     accessToken?: string,
 *     action?: array{actionType?: string, actionId?: string, ...},
 *     resource?: array{entityType?: string, entityId?: string, ...},
 *     context?: array{contextMap?: array<string, array>, cedarJson?: string, ...},
 *     entities?: array{entityList?: list<array>, cedarJson?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise isAuthorizedWithTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise isAuthorizedWithTokenAsync(array{
 *     policyStoreId?: string,
 *     identityToken?: string,
 *     accessToken?: string,
 *     action?: array{actionType?: string, actionId?: string, ...},
 *     resource?: array{entityType?: string, entityId?: string, ...},
 *     context?: array{contextMap?: array<string, array>, cedarJson?: string, ...},
 *     entities?: array{entityList?: list<array>, cedarJson?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIdentitySources(array $args = [])
 * @phpstan-method \Aws\Result listIdentitySources(array{
 *     policyStoreId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{principalEntityType?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentitySourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentitySourcesAsync(array{
 *     policyStoreId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filters?: list<array{principalEntityType?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPolicies(array{
 *     policyStoreId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{
 *         principal?: array{unspecified?: bool, identifier?: array, ...},
 *         resource?: array{unspecified?: bool, identifier?: array, ...},
 *         policyType?: 'STATIC'|'TEMPLATE_LINKED',
 *         policyTemplateId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesAsync(array{
 *     policyStoreId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{
 *         principal?: array{unspecified?: bool, identifier?: array, ...},
 *         resource?: array{unspecified?: bool, identifier?: array, ...},
 *         policyType?: 'STATIC'|'TEMPLATE_LINKED',
 *         policyTemplateId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPolicyStoreAliases(array $args = [])
 * @phpstan-method \Aws\Result listPolicyStoreAliases(array{nextToken?: string, maxResults?: int, filter?: array{policyStoreId?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyStoreAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyStoreAliasesAsync(array{nextToken?: string, maxResults?: int, filter?: array{policyStoreId?: string, ...}, ...} $args = [])
 * @method \Aws\Result listPolicyStores(array $args = [])
 * @phpstan-method \Aws\Result listPolicyStores(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyStoresAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyStoresAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPolicyTemplates(array $args = [])
 * @phpstan-method \Aws\Result listPolicyTemplates(array{policyStoreId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyTemplatesAsync(array{policyStoreId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putSchema(array $args = [])
 * @phpstan-method \Aws\Result putSchema(array{policyStoreId?: string, definition?: array{cedarJson?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSchemaAsync(array{policyStoreId?: string, definition?: array{cedarJson?: string, ...}, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateIdentitySource(array $args = [])
 * @phpstan-method \Aws\Result updateIdentitySource(array{
 *     policyStoreId?: string,
 *     identitySourceId?: string,
 *     updateConfiguration?: array{
 *         cognitoUserPoolConfiguration?: array{userPoolArn?: string, clientIds?: list<string>, groupConfiguration?: array, ...},
 *         openIdConnectConfiguration?: array{issuer?: string, entityIdPrefix?: string, groupConfiguration?: array, tokenSelection?: array, ...},
 *         ...,
 *     },
 *     principalEntityType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIdentitySourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIdentitySourceAsync(array{
 *     policyStoreId?: string,
 *     identitySourceId?: string,
 *     updateConfiguration?: array{
 *         cognitoUserPoolConfiguration?: array{userPoolArn?: string, clientIds?: list<string>, groupConfiguration?: array, ...},
 *         openIdConnectConfiguration?: array{issuer?: string, entityIdPrefix?: string, groupConfiguration?: array, tokenSelection?: array, ...},
 *         ...,
 *     },
 *     principalEntityType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePolicy(array $args = [])
 * @phpstan-method \Aws\Result updatePolicy(array{
 *     policyStoreId?: string,
 *     policyId?: string,
 *     definition?: array{static?: array{description?: string, statement?: string, ...}, ...},
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePolicyAsync(array{
 *     policyStoreId?: string,
 *     policyId?: string,
 *     definition?: array{static?: array{description?: string, statement?: string, ...}, ...},
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePolicyStore(array $args = [])
 * @phpstan-method \Aws\Result updatePolicyStore(array{
 *     policyStoreId?: string,
 *     validationSettings?: array{mode?: 'OFF'|'STRICT', ...},
 *     deletionProtection?: 'DISABLED'|'ENABLED',
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePolicyStoreAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePolicyStoreAsync(array{
 *     policyStoreId?: string,
 *     validationSettings?: array{mode?: 'OFF'|'STRICT', ...},
 *     deletionProtection?: 'DISABLED'|'ENABLED',
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePolicyTemplate(array $args = [])
 * @phpstan-method \Aws\Result updatePolicyTemplate(array{
 *     policyStoreId?: string,
 *     policyTemplateId?: string,
 *     description?: string,
 *     statement?: string,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePolicyTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePolicyTemplateAsync(array{
 *     policyStoreId?: string,
 *     policyTemplateId?: string,
 *     description?: string,
 *     statement?: string,
 *     name?: string,
 *     ...,
 * } $args = [])
 */
class VerifiedPermissionsClient extends AwsClient {}
