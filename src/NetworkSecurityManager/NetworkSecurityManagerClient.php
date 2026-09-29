<?php
namespace Aws\NetworkSecurityManager;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Network Security Manager Customer API** service.
 * @method \Aws\Result createDeployment(array $args = [])
 * @phpstan-method \Aws\Result createDeployment(array{
 *     clientToken?: string,
 *     deploymentName?: string,
 *     deploymentDescription?: string,
 *     deploymentConfiguration?: array{enableCrossAccountVisibility?: bool, ...},
 *     associatedPolicyList?: list<array{policyIdentifier?: string, ...}>,
 *     associatedScopeList?: list<array{scopeIdentifier?: string, ...}>,
 *     isPublished?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentAsync(array{
 *     clientToken?: string,
 *     deploymentName?: string,
 *     deploymentDescription?: string,
 *     deploymentConfiguration?: array{enableCrossAccountVisibility?: bool, ...},
 *     associatedPolicyList?: list<array{policyIdentifier?: string, ...}>,
 *     associatedScopeList?: list<array{scopeIdentifier?: string, ...}>,
 *     isPublished?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeploymentSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createDeploymentSnapshot(array{deploymentIdentifier?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeploymentSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeploymentSnapshotAsync(array{deploymentIdentifier?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createPolicy(array $args = [])
 * @phpstan-method \Aws\Result createPolicy(array{
 *     clientToken?: string,
 *     policyName?: string,
 *     policyDescription?: string,
 *     priority?: int,
 *     associatedTemplateAndRuleList?: list<array{templateIdentifier?: string, ruleIdentifier?: string, ...}>,
 *     firewallType?: 'SHIELD_ADVANCED'|'WAF',
 *     policyConfiguration?: array{
 *         remediationEnabled?: bool,
 *         resourcesCleanUp?: bool,
 *         wafConfig?: array{
 *             existingCustomerWebACLResolution?: 'NO_REMEDIATION'|'OVERRIDE_ASSOCIATION'|'RETROFIT',
 *             conflictResolution?: 'MERGE_WHERE_APPLICABLE',
 *             ...,
 *         },
 *         ...,
 *     },
 *     isPublished?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyAsync(array{
 *     clientToken?: string,
 *     policyName?: string,
 *     policyDescription?: string,
 *     priority?: int,
 *     associatedTemplateAndRuleList?: list<array{templateIdentifier?: string, ruleIdentifier?: string, ...}>,
 *     firewallType?: 'SHIELD_ADVANCED'|'WAF',
 *     policyConfiguration?: array{
 *         remediationEnabled?: bool,
 *         resourcesCleanUp?: bool,
 *         wafConfig?: array{
 *             existingCustomerWebACLResolution?: 'NO_REMEDIATION'|'OVERRIDE_ASSOCIATION'|'RETROFIT',
 *             conflictResolution?: 'MERGE_WHERE_APPLICABLE',
 *             ...,
 *         },
 *         ...,
 *     },
 *     isPublished?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicySnapshot(array $args = [])
 * @phpstan-method \Aws\Result createPolicySnapshot(array{policyIdentifier?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicySnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicySnapshotAsync(array{policyIdentifier?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createRule(array $args = [])
 * @phpstan-method \Aws\Result createRule(array{
 *     clientToken?: string,
 *     ruleName?: string,
 *     firewallType?: 'WAF',
 *     ruleType?: 'CONFIGURATION'|'INSPECTION',
 *     ruleDescription?: string,
 *     configuration?: array,
 *     isPublished?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleAsync(array{
 *     clientToken?: string,
 *     ruleName?: string,
 *     firewallType?: 'WAF',
 *     ruleType?: 'CONFIGURATION'|'INSPECTION',
 *     ruleDescription?: string,
 *     configuration?: array,
 *     isPublished?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRuleSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createRuleSnapshot(array{ruleIdentifier?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleSnapshotAsync(array{ruleIdentifier?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createScope(array $args = [])
 * @phpstan-method \Aws\Result createScope(array{
 *     clientToken?: string,
 *     scopeName?: string,
 *     scopeDescription?: string,
 *     scopeConfiguration?: array{
 *         accountFilter?: array{includeAll?: array, include?: array, exclude?: array, ...},
 *         resourceScopes?: array<string, array>,
 *         ...,
 *     },
 *     isPublished?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScopeAsync(array{
 *     clientToken?: string,
 *     scopeName?: string,
 *     scopeDescription?: string,
 *     scopeConfiguration?: array{
 *         accountFilter?: array{includeAll?: array, include?: array, exclude?: array, ...},
 *         resourceScopes?: array<string, array>,
 *         ...,
 *     },
 *     isPublished?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createScopeSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createScopeSnapshot(array{scopeIdentifier?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createScopeSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScopeSnapshotAsync(array{scopeIdentifier?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createTemplate(array $args = [])
 * @phpstan-method \Aws\Result createTemplate(array{
 *     clientToken?: string,
 *     templateName?: string,
 *     templateDescription?: string,
 *     associatedRuleList?: list<array{ruleIdentifier?: string, ...}>,
 *     firewallType?: 'WAF',
 *     isPublished?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateAsync(array{
 *     clientToken?: string,
 *     templateName?: string,
 *     templateDescription?: string,
 *     associatedRuleList?: list<array{ruleIdentifier?: string, ...}>,
 *     firewallType?: 'WAF',
 *     isPublished?: bool,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTemplateSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createTemplateSnapshot(array{templateIdentifier?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateSnapshotAsync(array{templateIdentifier?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result deleteAdminAccount(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAdminAccountAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result deleteDeployment(array $args = [])
 * @phpstan-method \Aws\Result deleteDeployment(array{deploymentIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array{deploymentIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{policyIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{policyIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRule(array{ruleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleAsync(array{ruleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteScope(array $args = [])
 * @phpstan-method \Aws\Result deleteScope(array{scopeIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScopeAsync(array{scopeIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteTemplate(array{templateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array{templateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result generateRuleConfiguration(array $args = [])
 * @phpstan-method \Aws\Result generateRuleConfiguration(array{
 *     prompt?: string,
 *     ruleFirewallType?: 'WAF',
 *     ruleType?: 'CONFIGURATION'|'INSPECTION',
 *     wafConfigDataType?: 'AssociationConfig'|'CaptchaConfig'|'ChallengeConfig'|'CustomResponseBodies'|'DataProtectionConfig'|'DefaultAction'|'LoggingConfiguration'|'OnSourceDDoSProtectionConfig'|'TokenDomains'|'VisibilityConfig',
 *     currentConfiguration?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateRuleConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateRuleConfigurationAsync(array{
 *     prompt?: string,
 *     ruleFirewallType?: 'WAF',
 *     ruleType?: 'CONFIGURATION'|'INSPECTION',
 *     wafConfigDataType?: 'AssociationConfig'|'CaptchaConfig'|'ChallengeConfig'|'CustomResponseBodies'|'DataProtectionConfig'|'DefaultAction'|'LoggingConfiguration'|'OnSourceDDoSProtectionConfig'|'TokenDomains'|'VisibilityConfig',
 *     currentConfiguration?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result getAdminAccount(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdminAccountAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @phpstan-method \Aws\Result getDeployment(array{deploymentIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentAsync(array{deploymentIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{policyIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{policyIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getRule(array $args = [])
 * @phpstan-method \Aws\Result getRule(array{ruleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuleAsync(array{ruleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getScope(array $args = [])
 * @phpstan-method \Aws\Result getScope(array{scopeIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScopeAsync(array{scopeIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getTemplate(array $args = [])
 * @phpstan-method \Aws\Result getTemplate(array{templateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateAsync(array{templateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listAdminAccounts(array $args = [])
 * @phpstan-method \Aws\Result listAdminAccounts(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAdminAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAdminAccountsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAggregateResourceSynchronizationStatuses(array $args = [])
 * @phpstan-method \Aws\Result listAggregateResourceSynchronizationStatuses(array{
 *     synchronizationStatus?: 'IN_SYNC'|'NOT_APPLICABLE'|'OUT_OF_SYNC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAggregateResourceSynchronizationStatusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAggregateResourceSynchronizationStatusesAsync(array{
 *     synchronizationStatus?: 'IN_SYNC'|'NOT_APPLICABLE'|'OUT_OF_SYNC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDeploymentSnapshots(array $args = [])
 * @phpstan-method \Aws\Result listDeploymentSnapshots(array{deploymentIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentSnapshotsAsync(array{deploymentIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeployments(array $args = [])
 * @phpstan-method \Aws\Result listDeployments(array{maxResults?: int, nextToken?: string, status?: 'ACTIVE'|'DISABLED'|'DRAFT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array{maxResults?: int, nextToken?: string, status?: 'ACTIVE'|'DISABLED'|'DRAFT', ...} $args = [])
 * @method \Aws\Result listPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPolicies(array{maxResults?: int, nextToken?: string, status?: 'ACTIVE'|'DISABLED'|'DRAFT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesAsync(array{maxResults?: int, nextToken?: string, status?: 'ACTIVE'|'DISABLED'|'DRAFT', ...} $args = [])
 * @method \Aws\Result listPolicySnapshots(array $args = [])
 * @phpstan-method \Aws\Result listPolicySnapshots(array{policyIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicySnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicySnapshotsAsync(array{policyIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listResourceAssociations(array $args = [])
 * @phpstan-method \Aws\Result listResourceAssociations(array{resourceIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceAssociationsAsync(array{resourceIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listResourceSynchronizationStatuses(array $args = [])
 * @phpstan-method \Aws\Result listResourceSynchronizationStatuses(array{
 *     deploymentIdentifier?: string,
 *     synchronizationStatus?: 'IN_SYNC'|'NOT_APPLICABLE'|'OUT_OF_SYNC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceSynchronizationStatusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceSynchronizationStatusesAsync(array{
 *     deploymentIdentifier?: string,
 *     synchronizationStatus?: 'IN_SYNC'|'NOT_APPLICABLE'|'OUT_OF_SYNC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRuleSnapshots(array $args = [])
 * @phpstan-method \Aws\Result listRuleSnapshots(array{ruleIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuleSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuleSnapshotsAsync(array{ruleIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRules(array $args = [])
 * @phpstan-method \Aws\Result listRules(array{maxResults?: int, nextToken?: string, status?: 'ACTIVE'|'DISABLED'|'DRAFT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRulesAsync(array{maxResults?: int, nextToken?: string, status?: 'ACTIVE'|'DISABLED'|'DRAFT', ...} $args = [])
 * @method \Aws\Result listScopeSnapshots(array $args = [])
 * @phpstan-method \Aws\Result listScopeSnapshots(array{scopeIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScopeSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScopeSnapshotsAsync(array{scopeIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listScopes(array $args = [])
 * @phpstan-method \Aws\Result listScopes(array{maxResults?: int, nextToken?: string, status?: 'ACTIVE'|'DISABLED'|'DRAFT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScopesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScopesAsync(array{maxResults?: int, nextToken?: string, status?: 'ACTIVE'|'DISABLED'|'DRAFT', ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTemplateSnapshots(array $args = [])
 * @phpstan-method \Aws\Result listTemplateSnapshots(array{templateIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplateSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplateSnapshotsAsync(array{templateIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTemplates(array $args = [])
 * @phpstan-method \Aws\Result listTemplates(array{maxResults?: int, nextToken?: string, status?: 'ACTIVE'|'DISABLED'|'DRAFT', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplatesAsync(array{maxResults?: int, nextToken?: string, status?: 'ACTIVE'|'DISABLED'|'DRAFT', ...} $args = [])
 * @method \Aws\Result putAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result putAdminAccount(array{
 *     accountId?: string,
 *     priority?: int,
 *     adminScope?: array{
 *         scopeFilter?: array{includeAll?: array, includeOnly?: array, excludeOnly?: array, ...},
 *         firewallTypeScope?: array{allFirewallTypesEnabled?: bool, firewallTypes?: list<'SHIELD_ADVANCED'|'WAF'>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAdminAccountAsync(array{
 *     accountId?: string,
 *     priority?: int,
 *     adminScope?: array{
 *         scopeFilter?: array{includeAll?: array, includeOnly?: array, excludeOnly?: array, ...},
 *         firewallTypeScope?: array{allFirewallTypesEnabled?: bool, firewallTypes?: list<'SHIELD_ADVANCED'|'WAF'>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDeployment(array $args = [])
 * @phpstan-method \Aws\Result updateDeployment(array{
 *     deploymentIdentifier?: string,
 *     updateToken?: string,
 *     deploymentDescription?: string,
 *     deploymentConfiguration?: array{enableCrossAccountVisibility?: bool, ...},
 *     associatedPolicyList?: list<array{policyIdentifier?: string, ...}>,
 *     associatedScopeList?: list<array{scopeIdentifier?: string, ...}>,
 *     isPublished?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeploymentAsync(array{
 *     deploymentIdentifier?: string,
 *     updateToken?: string,
 *     deploymentDescription?: string,
 *     deploymentConfiguration?: array{enableCrossAccountVisibility?: bool, ...},
 *     associatedPolicyList?: list<array{policyIdentifier?: string, ...}>,
 *     associatedScopeList?: list<array{scopeIdentifier?: string, ...}>,
 *     isPublished?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePolicy(array $args = [])
 * @phpstan-method \Aws\Result updatePolicy(array{
 *     policyIdentifier?: string,
 *     updateToken?: string,
 *     policyDescription?: string,
 *     priority?: int,
 *     associatedTemplateAndRuleList?: list<array{templateIdentifier?: string, ruleIdentifier?: string, ...}>,
 *     policyConfiguration?: array{
 *         remediationEnabled?: bool,
 *         resourcesCleanUp?: bool,
 *         wafConfig?: array{
 *             existingCustomerWebACLResolution?: 'NO_REMEDIATION'|'OVERRIDE_ASSOCIATION'|'RETROFIT',
 *             conflictResolution?: 'MERGE_WHERE_APPLICABLE',
 *             ...,
 *         },
 *         ...,
 *     },
 *     isPublished?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePolicyAsync(array{
 *     policyIdentifier?: string,
 *     updateToken?: string,
 *     policyDescription?: string,
 *     priority?: int,
 *     associatedTemplateAndRuleList?: list<array{templateIdentifier?: string, ruleIdentifier?: string, ...}>,
 *     policyConfiguration?: array{
 *         remediationEnabled?: bool,
 *         resourcesCleanUp?: bool,
 *         wafConfig?: array{
 *             existingCustomerWebACLResolution?: 'NO_REMEDIATION'|'OVERRIDE_ASSOCIATION'|'RETROFIT',
 *             conflictResolution?: 'MERGE_WHERE_APPLICABLE',
 *             ...,
 *         },
 *         ...,
 *     },
 *     isPublished?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRule(array $args = [])
 * @phpstan-method \Aws\Result updateRule(array{
 *     ruleIdentifier?: string,
 *     updateToken?: string,
 *     ruleType?: 'CONFIGURATION'|'INSPECTION',
 *     ruleDescription?: string,
 *     configuration?: array,
 *     isPublished?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleAsync(array{
 *     ruleIdentifier?: string,
 *     updateToken?: string,
 *     ruleType?: 'CONFIGURATION'|'INSPECTION',
 *     ruleDescription?: string,
 *     configuration?: array,
 *     isPublished?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateScope(array $args = [])
 * @phpstan-method \Aws\Result updateScope(array{
 *     scopeIdentifier?: string,
 *     updateToken?: string,
 *     scopeDescription?: string,
 *     scopeConfiguration?: array{
 *         accountFilter?: array{includeAll?: array, include?: array, exclude?: array, ...},
 *         resourceScopes?: array<string, array>,
 *         ...,
 *     },
 *     isPublished?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScopeAsync(array{
 *     scopeIdentifier?: string,
 *     updateToken?: string,
 *     scopeDescription?: string,
 *     scopeConfiguration?: array{
 *         accountFilter?: array{includeAll?: array, include?: array, exclude?: array, ...},
 *         resourceScopes?: array<string, array>,
 *         ...,
 *     },
 *     isPublished?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateTemplate(array{
 *     templateIdentifier?: string,
 *     updateToken?: string,
 *     templateDescription?: string,
 *     associatedRuleList?: list<array{ruleIdentifier?: string, ...}>,
 *     isPublished?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplateAsync(array{
 *     templateIdentifier?: string,
 *     updateToken?: string,
 *     templateDescription?: string,
 *     associatedRuleList?: list<array{ruleIdentifier?: string, ...}>,
 *     isPublished?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 */
class NetworkSecurityManagerClient extends AwsClient {}
