<?php
namespace Aws\OpenSearchServerless;

use Aws\AwsClient;

/**
 * This client is used to interact with the **OpenSearch Service Serverless** service.
 * @method \Aws\Result batchGetCollection(array $args = [])
 * @phpstan-method \Aws\Result batchGetCollection(array{ids?: list<string>, names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCollectionAsync(array{ids?: list<string>, names?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetCollectionGroup(array $args = [])
 * @phpstan-method \Aws\Result batchGetCollectionGroup(array{ids?: list<string>, names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCollectionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCollectionGroupAsync(array{ids?: list<string>, names?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetEffectiveLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result batchGetEffectiveLifecyclePolicy(array{resourceIdentifiers?: list<array{type?: 'retention', resource?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetEffectiveLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetEffectiveLifecyclePolicyAsync(array{resourceIdentifiers?: list<array{type?: 'retention', resource?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchGetLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result batchGetLifecyclePolicy(array{identifiers?: list<array{type?: 'retention', name?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetLifecyclePolicyAsync(array{identifiers?: list<array{type?: 'retention', name?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchGetVpcEndpoint(array $args = [])
 * @phpstan-method \Aws\Result batchGetVpcEndpoint(array{ids?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetVpcEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetVpcEndpointAsync(array{ids?: list<string>, ...} $args = [])
 * @method \Aws\Result createAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result createAccessPolicy(array{type?: 'data', name?: string, description?: string, policy?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessPolicyAsync(array{type?: 'data', name?: string, description?: string, policy?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createCollection(array $args = [])
 * @phpstan-method \Aws\Result createCollection(array{
 *     name?: string,
 *     type?: 'SEARCH'|'TIMESERIES'|'VECTORSEARCH',
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     standbyReplicas?: 'DISABLED'|'ENABLED',
 *     vectorOptions?: array{ServerlessVectorAcceleration?: 'ALLOWED'|'DISABLED'|'ENABLED', ...},
 *     collectionGroupName?: string,
 *     encryptionConfig?: array{aWSOwnedKey?: bool, kmsKeyArn?: string, ...},
 *     deletionProtection?: 'DISABLED'|'ENABLED',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCollectionAsync(array{
 *     name?: string,
 *     type?: 'SEARCH'|'TIMESERIES'|'VECTORSEARCH',
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     standbyReplicas?: 'DISABLED'|'ENABLED',
 *     vectorOptions?: array{ServerlessVectorAcceleration?: 'ALLOWED'|'DISABLED'|'ENABLED', ...},
 *     collectionGroupName?: string,
 *     encryptionConfig?: array{aWSOwnedKey?: bool, kmsKeyArn?: string, ...},
 *     deletionProtection?: 'DISABLED'|'ENABLED',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCollectionGroup(array $args = [])
 * @phpstan-method \Aws\Result createCollectionGroup(array{
 *     name?: string,
 *     standbyReplicas?: 'DISABLED'|'ENABLED',
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     capacityLimits?: array{
 *         maxIndexingCapacityInOCU?: float,
 *         maxSearchCapacityInOCU?: float,
 *         minIndexingCapacityInOCU?: float,
 *         minSearchCapacityInOCU?: float,
 *         ...,
 *     },
 *     generation?: 'CLASSIC'|'NEXTGEN',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCollectionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCollectionGroupAsync(array{
 *     name?: string,
 *     standbyReplicas?: 'DISABLED'|'ENABLED',
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     capacityLimits?: array{
 *         maxIndexingCapacityInOCU?: float,
 *         maxSearchCapacityInOCU?: float,
 *         minIndexingCapacityInOCU?: float,
 *         minSearchCapacityInOCU?: float,
 *         ...,
 *     },
 *     generation?: 'CLASSIC'|'NEXTGEN',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIndex(array $args = [])
 * @phpstan-method \Aws\Result createIndex(array{id?: string, indexName?: string, indexSchema?: array, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIndexAsync(array{id?: string, indexName?: string, indexSchema?: array, ...} $args = [])
 * @method \Aws\Result createLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result createLifecyclePolicy(array{type?: 'retention', name?: string, description?: string, policy?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLifecyclePolicyAsync(array{type?: 'retention', name?: string, description?: string, policy?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createSecurityConfig(array $args = [])
 * @phpstan-method \Aws\Result createSecurityConfig(array{
 *     type?: 'iamfederation'|'iamidentitycenter'|'saml',
 *     name?: string,
 *     description?: string,
 *     samlOptions?: array{
 *         metadata?: string,
 *         userAttribute?: string,
 *         groupAttribute?: string,
 *         openSearchServerlessEntityId?: string,
 *         sessionTimeout?: int,
 *         ...,
 *     },
 *     iamIdentityCenterOptions?: array{
 *         instanceArn?: string,
 *         userAttribute?: 'Email'|'UserId'|'UserName',
 *         groupAttribute?: 'GroupId'|'GroupName',
 *         ...,
 *     },
 *     iamFederationOptions?: array{groupAttribute?: string, userAttribute?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSecurityConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSecurityConfigAsync(array{
 *     type?: 'iamfederation'|'iamidentitycenter'|'saml',
 *     name?: string,
 *     description?: string,
 *     samlOptions?: array{
 *         metadata?: string,
 *         userAttribute?: string,
 *         groupAttribute?: string,
 *         openSearchServerlessEntityId?: string,
 *         sessionTimeout?: int,
 *         ...,
 *     },
 *     iamIdentityCenterOptions?: array{
 *         instanceArn?: string,
 *         userAttribute?: 'Email'|'UserId'|'UserName',
 *         groupAttribute?: 'GroupId'|'GroupName',
 *         ...,
 *     },
 *     iamFederationOptions?: array{groupAttribute?: string, userAttribute?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSecurityPolicy(array $args = [])
 * @phpstan-method \Aws\Result createSecurityPolicy(array{
 *     type?: 'encryption'|'network',
 *     name?: string,
 *     description?: string,
 *     policy?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSecurityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSecurityPolicyAsync(array{
 *     type?: 'encryption'|'network',
 *     name?: string,
 *     description?: string,
 *     policy?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createVpcEndpoint(array{
 *     name?: string,
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcEndpointAsync(array{
 *     name?: string,
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     securityGroupIds?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessPolicy(array{type?: 'data', name?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessPolicyAsync(array{type?: 'data', name?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteCollection(array $args = [])
 * @phpstan-method \Aws\Result deleteCollection(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCollectionAsync(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteCollectionGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteCollectionGroup(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCollectionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCollectionGroupAsync(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteIndex(array $args = [])
 * @phpstan-method \Aws\Result deleteIndex(array{id?: string, indexName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIndexAsync(array{id?: string, indexName?: string, ...} $args = [])
 * @method \Aws\Result deleteLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteLifecyclePolicy(array{type?: 'retention', name?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array{type?: 'retention', name?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteSecurityConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteSecurityConfig(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSecurityConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSecurityConfigAsync(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteSecurityPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteSecurityPolicy(array{type?: 'encryption'|'network', name?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSecurityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSecurityPolicyAsync(array{type?: 'encryption'|'network', name?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcEndpoint(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcEndpointAsync(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result getAccessPolicy(array{type?: 'data', name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPolicyAsync(array{type?: 'data', name?: string, ...} $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getIndex(array $args = [])
 * @phpstan-method \Aws\Result getIndex(array{id?: string, indexName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIndexAsync(array{id?: string, indexName?: string, ...} $args = [])
 * @method \Aws\Result getPoliciesStats(array $args = [])
 * @phpstan-method \Aws\Result getPoliciesStats(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPoliciesStatsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPoliciesStatsAsync(array{...} $args = [])
 * @method \Aws\Result getSecurityConfig(array $args = [])
 * @phpstan-method \Aws\Result getSecurityConfig(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSecurityConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSecurityConfigAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getSecurityPolicy(array $args = [])
 * @phpstan-method \Aws\Result getSecurityPolicy(array{type?: 'encryption'|'network', name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSecurityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSecurityPolicyAsync(array{type?: 'encryption'|'network', name?: string, ...} $args = [])
 * @method \Aws\Result listAccessPolicies(array $args = [])
 * @phpstan-method \Aws\Result listAccessPolicies(array{type?: 'data', resource?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessPoliciesAsync(array{type?: 'data', resource?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCollectionGroups(array $args = [])
 * @phpstan-method \Aws\Result listCollectionGroups(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollectionGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollectionGroupsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCollections(array $args = [])
 * @phpstan-method \Aws\Result listCollections(array{
 *     collectionFilters?: array{
 *         name?: string,
 *         status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATE_FAILED'|'UPDATING',
 *         collectionGroupName?: string,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollectionsAsync(array{
 *     collectionFilters?: array{
 *         name?: string,
 *         status?: 'ACTIVE'|'CREATING'|'DELETING'|'FAILED'|'UPDATE_FAILED'|'UPDATING',
 *         collectionGroupName?: string,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLifecyclePolicies(array $args = [])
 * @phpstan-method \Aws\Result listLifecyclePolicies(array{type?: 'retention', resources?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLifecyclePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLifecyclePoliciesAsync(array{type?: 'retention', resources?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSecurityConfigs(array $args = [])
 * @phpstan-method \Aws\Result listSecurityConfigs(array{type?: 'iamfederation'|'iamidentitycenter'|'saml', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityConfigsAsync(array{type?: 'iamfederation'|'iamidentitycenter'|'saml', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSecurityPolicies(array $args = [])
 * @phpstan-method \Aws\Result listSecurityPolicies(array{type?: 'encryption'|'network', resource?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityPoliciesAsync(array{type?: 'encryption'|'network', resource?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVpcEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listVpcEndpoints(array{
 *     vpcEndpointFilters?: array{status?: 'ACTIVE'|'DELETING'|'FAILED'|'PENDING', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVpcEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVpcEndpointsAsync(array{
 *     vpcEndpointFilters?: array{status?: 'ACTIVE'|'DELETING'|'FAILED'|'PENDING', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateAccessPolicy(array{
 *     type?: 'data',
 *     name?: string,
 *     policyVersion?: string,
 *     description?: string,
 *     policy?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessPolicyAsync(array{
 *     type?: 'data',
 *     name?: string,
 *     policyVersion?: string,
 *     description?: string,
 *     policy?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result updateAccountSettings(array{capacityLimits?: array{maxIndexingCapacityInOCU?: int, maxSearchCapacityInOCU?: int, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array{capacityLimits?: array{maxIndexingCapacityInOCU?: int, maxSearchCapacityInOCU?: int, ...}, ...} $args = [])
 * @method \Aws\Result updateCollection(array $args = [])
 * @phpstan-method \Aws\Result updateCollection(array{
 *     id?: string,
 *     description?: string,
 *     vectorOptions?: array{ServerlessVectorAcceleration?: 'ALLOWED'|'DISABLED'|'ENABLED', ...},
 *     deletionProtection?: 'DISABLED'|'ENABLED',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCollectionAsync(array{
 *     id?: string,
 *     description?: string,
 *     vectorOptions?: array{ServerlessVectorAcceleration?: 'ALLOWED'|'DISABLED'|'ENABLED', ...},
 *     deletionProtection?: 'DISABLED'|'ENABLED',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCollectionGroup(array $args = [])
 * @phpstan-method \Aws\Result updateCollectionGroup(array{
 *     id?: string,
 *     description?: string,
 *     capacityLimits?: array{
 *         maxIndexingCapacityInOCU?: float,
 *         maxSearchCapacityInOCU?: float,
 *         minIndexingCapacityInOCU?: float,
 *         minSearchCapacityInOCU?: float,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCollectionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCollectionGroupAsync(array{
 *     id?: string,
 *     description?: string,
 *     capacityLimits?: array{
 *         maxIndexingCapacityInOCU?: float,
 *         maxSearchCapacityInOCU?: float,
 *         minIndexingCapacityInOCU?: float,
 *         minSearchCapacityInOCU?: float,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIndex(array $args = [])
 * @phpstan-method \Aws\Result updateIndex(array{id?: string, indexName?: string, indexSchema?: array, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIndexAsync(array{id?: string, indexName?: string, indexSchema?: array, ...} $args = [])
 * @method \Aws\Result updateLifecyclePolicy(array $args = [])
 * @phpstan-method \Aws\Result updateLifecyclePolicy(array{
 *     type?: 'retention',
 *     name?: string,
 *     policyVersion?: string,
 *     description?: string,
 *     policy?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLifecyclePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLifecyclePolicyAsync(array{
 *     type?: 'retention',
 *     name?: string,
 *     policyVersion?: string,
 *     description?: string,
 *     policy?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSecurityConfig(array $args = [])
 * @phpstan-method \Aws\Result updateSecurityConfig(array{
 *     id?: string,
 *     configVersion?: string,
 *     description?: string,
 *     samlOptions?: array{
 *         metadata?: string,
 *         userAttribute?: string,
 *         groupAttribute?: string,
 *         openSearchServerlessEntityId?: string,
 *         sessionTimeout?: int,
 *         ...,
 *     },
 *     iamIdentityCenterOptionsUpdates?: array{userAttribute?: 'Email'|'UserId'|'UserName', groupAttribute?: 'GroupId'|'GroupName', ...},
 *     iamFederationOptions?: array{groupAttribute?: string, userAttribute?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecurityConfigAsync(array{
 *     id?: string,
 *     configVersion?: string,
 *     description?: string,
 *     samlOptions?: array{
 *         metadata?: string,
 *         userAttribute?: string,
 *         groupAttribute?: string,
 *         openSearchServerlessEntityId?: string,
 *         sessionTimeout?: int,
 *         ...,
 *     },
 *     iamIdentityCenterOptionsUpdates?: array{userAttribute?: 'Email'|'UserId'|'UserName', groupAttribute?: 'GroupId'|'GroupName', ...},
 *     iamFederationOptions?: array{groupAttribute?: string, userAttribute?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSecurityPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateSecurityPolicy(array{
 *     type?: 'encryption'|'network',
 *     name?: string,
 *     policyVersion?: string,
 *     description?: string,
 *     policy?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecurityPolicyAsync(array{
 *     type?: 'encryption'|'network',
 *     name?: string,
 *     policyVersion?: string,
 *     description?: string,
 *     policy?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVpcEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateVpcEndpoint(array{
 *     id?: string,
 *     addSubnetIds?: list<string>,
 *     removeSubnetIds?: list<string>,
 *     addSecurityGroupIds?: list<string>,
 *     removeSecurityGroupIds?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVpcEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVpcEndpointAsync(array{
 *     id?: string,
 *     addSubnetIds?: list<string>,
 *     removeSubnetIds?: list<string>,
 *     addSecurityGroupIds?: list<string>,
 *     removeSecurityGroupIds?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 */
class OpenSearchServerlessClient extends AwsClient {}
