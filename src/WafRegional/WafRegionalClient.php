<?php
namespace Aws\WafRegional;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS WAF Regional** service.
 * @method \Aws\Result associateWebACL(array $args = [])
 * @phpstan-method \Aws\Result associateWebACL(array{WebACLId?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateWebACLAsync(array{WebACLId?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result createByteMatchSet(array $args = [])
 * @phpstan-method \Aws\Result createByteMatchSet(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createByteMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createByteMatchSetAsync(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result createGeoMatchSet(array $args = [])
 * @phpstan-method \Aws\Result createGeoMatchSet(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGeoMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGeoMatchSetAsync(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result createIPSet(array $args = [])
 * @phpstan-method \Aws\Result createIPSet(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIPSetAsync(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result createRateBasedRule(array $args = [])
 * @phpstan-method \Aws\Result createRateBasedRule(array{
 *     Name?: string,
 *     MetricName?: string,
 *     RateKey?: 'IP',
 *     RateLimit?: int,
 *     ChangeToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRateBasedRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRateBasedRuleAsync(array{
 *     Name?: string,
 *     MetricName?: string,
 *     RateKey?: 'IP',
 *     RateLimit?: int,
 *     ChangeToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRegexMatchSet(array $args = [])
 * @phpstan-method \Aws\Result createRegexMatchSet(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegexMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegexMatchSetAsync(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result createRegexPatternSet(array $args = [])
 * @phpstan-method \Aws\Result createRegexPatternSet(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegexPatternSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegexPatternSetAsync(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result createRule(array $args = [])
 * @phpstan-method \Aws\Result createRule(array{
 *     Name?: string,
 *     MetricName?: string,
 *     ChangeToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleAsync(array{
 *     Name?: string,
 *     MetricName?: string,
 *     ChangeToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result createRuleGroup(array{
 *     Name?: string,
 *     MetricName?: string,
 *     ChangeToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleGroupAsync(array{
 *     Name?: string,
 *     MetricName?: string,
 *     ChangeToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSizeConstraintSet(array $args = [])
 * @phpstan-method \Aws\Result createSizeConstraintSet(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSizeConstraintSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSizeConstraintSetAsync(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result createSqlInjectionMatchSet(array $args = [])
 * @phpstan-method \Aws\Result createSqlInjectionMatchSet(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSqlInjectionMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSqlInjectionMatchSetAsync(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result createWebACL(array $args = [])
 * @phpstan-method \Aws\Result createWebACL(array{
 *     Name?: string,
 *     MetricName?: string,
 *     DefaultAction?: array{Type?: 'ALLOW'|'BLOCK'|'COUNT', ...},
 *     ChangeToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebACLAsync(array{
 *     Name?: string,
 *     MetricName?: string,
 *     DefaultAction?: array{Type?: 'ALLOW'|'BLOCK'|'COUNT', ...},
 *     ChangeToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWebACLMigrationStack(array $args = [])
 * @phpstan-method \Aws\Result createWebACLMigrationStack(array{WebACLId?: string, S3BucketName?: string, IgnoreUnsupportedType?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebACLMigrationStackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebACLMigrationStackAsync(array{WebACLId?: string, S3BucketName?: string, IgnoreUnsupportedType?: bool, ...} $args = [])
 * @method \Aws\Result createXssMatchSet(array $args = [])
 * @phpstan-method \Aws\Result createXssMatchSet(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createXssMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createXssMatchSetAsync(array{Name?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteByteMatchSet(array $args = [])
 * @phpstan-method \Aws\Result deleteByteMatchSet(array{ByteMatchSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteByteMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteByteMatchSetAsync(array{ByteMatchSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteGeoMatchSet(array $args = [])
 * @phpstan-method \Aws\Result deleteGeoMatchSet(array{GeoMatchSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGeoMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGeoMatchSetAsync(array{GeoMatchSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteIPSet(array $args = [])
 * @phpstan-method \Aws\Result deleteIPSet(array{IPSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIPSetAsync(array{IPSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteLoggingConfiguration(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoggingConfigurationAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deletePermissionPolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePermissionPolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePermissionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePermissionPolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRateBasedRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRateBasedRule(array{RuleId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRateBasedRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRateBasedRuleAsync(array{RuleId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteRegexMatchSet(array $args = [])
 * @phpstan-method \Aws\Result deleteRegexMatchSet(array{RegexMatchSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegexMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegexMatchSetAsync(array{RegexMatchSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteRegexPatternSet(array $args = [])
 * @phpstan-method \Aws\Result deleteRegexPatternSet(array{RegexPatternSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegexPatternSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegexPatternSetAsync(array{RegexPatternSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRule(array{RuleId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleAsync(array{RuleId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteRuleGroup(array{RuleGroupId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleGroupAsync(array{RuleGroupId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteSizeConstraintSet(array $args = [])
 * @phpstan-method \Aws\Result deleteSizeConstraintSet(array{SizeConstraintSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSizeConstraintSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSizeConstraintSetAsync(array{SizeConstraintSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteSqlInjectionMatchSet(array $args = [])
 * @phpstan-method \Aws\Result deleteSqlInjectionMatchSet(array{SqlInjectionMatchSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSqlInjectionMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSqlInjectionMatchSetAsync(array{SqlInjectionMatchSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteWebACL(array $args = [])
 * @phpstan-method \Aws\Result deleteWebACL(array{WebACLId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWebACLAsync(array{WebACLId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result deleteXssMatchSet(array $args = [])
 * @phpstan-method \Aws\Result deleteXssMatchSet(array{XssMatchSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteXssMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteXssMatchSetAsync(array{XssMatchSetId?: string, ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateWebACL(array $args = [])
 * @phpstan-method \Aws\Result disassociateWebACL(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateWebACLAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getByteMatchSet(array $args = [])
 * @phpstan-method \Aws\Result getByteMatchSet(array{ByteMatchSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getByteMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getByteMatchSetAsync(array{ByteMatchSetId?: string, ...} $args = [])
 * @method \Aws\Result getChangeToken(array $args = [])
 * @phpstan-method \Aws\Result getChangeToken(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChangeTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChangeTokenAsync(array{...} $args = [])
 * @method \Aws\Result getChangeTokenStatus(array $args = [])
 * @phpstan-method \Aws\Result getChangeTokenStatus(array{ChangeToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChangeTokenStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChangeTokenStatusAsync(array{ChangeToken?: string, ...} $args = [])
 * @method \Aws\Result getGeoMatchSet(array $args = [])
 * @phpstan-method \Aws\Result getGeoMatchSet(array{GeoMatchSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGeoMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGeoMatchSetAsync(array{GeoMatchSetId?: string, ...} $args = [])
 * @method \Aws\Result getIPSet(array $args = [])
 * @phpstan-method \Aws\Result getIPSet(array{IPSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIPSetAsync(array{IPSetId?: string, ...} $args = [])
 * @method \Aws\Result getLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getLoggingConfiguration(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoggingConfigurationAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getPermissionPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPermissionPolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPermissionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPermissionPolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getRateBasedRule(array $args = [])
 * @phpstan-method \Aws\Result getRateBasedRule(array{RuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRateBasedRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRateBasedRuleAsync(array{RuleId?: string, ...} $args = [])
 * @method \Aws\Result getRateBasedRuleManagedKeys(array $args = [])
 * @phpstan-method \Aws\Result getRateBasedRuleManagedKeys(array{RuleId?: string, NextMarker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRateBasedRuleManagedKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRateBasedRuleManagedKeysAsync(array{RuleId?: string, NextMarker?: string, ...} $args = [])
 * @method \Aws\Result getRegexMatchSet(array $args = [])
 * @phpstan-method \Aws\Result getRegexMatchSet(array{RegexMatchSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegexMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegexMatchSetAsync(array{RegexMatchSetId?: string, ...} $args = [])
 * @method \Aws\Result getRegexPatternSet(array $args = [])
 * @phpstan-method \Aws\Result getRegexPatternSet(array{RegexPatternSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegexPatternSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegexPatternSetAsync(array{RegexPatternSetId?: string, ...} $args = [])
 * @method \Aws\Result getRule(array $args = [])
 * @phpstan-method \Aws\Result getRule(array{RuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuleAsync(array{RuleId?: string, ...} $args = [])
 * @method \Aws\Result getRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result getRuleGroup(array{RuleGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuleGroupAsync(array{RuleGroupId?: string, ...} $args = [])
 * @method \Aws\Result getSampledRequests(array $args = [])
 * @phpstan-method \Aws\Result getSampledRequests(array{
 *     WebAclId?: string,
 *     RuleId?: string,
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSampledRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSampledRequestsAsync(array{
 *     WebAclId?: string,
 *     RuleId?: string,
 *     TimeWindow?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSizeConstraintSet(array $args = [])
 * @phpstan-method \Aws\Result getSizeConstraintSet(array{SizeConstraintSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSizeConstraintSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSizeConstraintSetAsync(array{SizeConstraintSetId?: string, ...} $args = [])
 * @method \Aws\Result getSqlInjectionMatchSet(array $args = [])
 * @phpstan-method \Aws\Result getSqlInjectionMatchSet(array{SqlInjectionMatchSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSqlInjectionMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSqlInjectionMatchSetAsync(array{SqlInjectionMatchSetId?: string, ...} $args = [])
 * @method \Aws\Result getWebACL(array $args = [])
 * @phpstan-method \Aws\Result getWebACL(array{WebACLId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebACLAsync(array{WebACLId?: string, ...} $args = [])
 * @method \Aws\Result getWebACLForResource(array $args = [])
 * @phpstan-method \Aws\Result getWebACLForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebACLForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebACLForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getXssMatchSet(array $args = [])
 * @phpstan-method \Aws\Result getXssMatchSet(array{XssMatchSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getXssMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getXssMatchSetAsync(array{XssMatchSetId?: string, ...} $args = [])
 * @method \Aws\Result listActivatedRulesInRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result listActivatedRulesInRuleGroup(array{RuleGroupId?: string, NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listActivatedRulesInRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActivatedRulesInRuleGroupAsync(array{RuleGroupId?: string, NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listByteMatchSets(array $args = [])
 * @phpstan-method \Aws\Result listByteMatchSets(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listByteMatchSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listByteMatchSetsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listGeoMatchSets(array $args = [])
 * @phpstan-method \Aws\Result listGeoMatchSets(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGeoMatchSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGeoMatchSetsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listIPSets(array $args = [])
 * @phpstan-method \Aws\Result listIPSets(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIPSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIPSetsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listLoggingConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listLoggingConfigurations(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLoggingConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLoggingConfigurationsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listRateBasedRules(array $args = [])
 * @phpstan-method \Aws\Result listRateBasedRules(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRateBasedRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRateBasedRulesAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listRegexMatchSets(array $args = [])
 * @phpstan-method \Aws\Result listRegexMatchSets(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegexMatchSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegexMatchSetsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listRegexPatternSets(array $args = [])
 * @phpstan-method \Aws\Result listRegexPatternSets(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegexPatternSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegexPatternSetsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listResourcesForWebACL(array $args = [])
 * @phpstan-method \Aws\Result listResourcesForWebACL(array{WebACLId?: string, ResourceType?: 'API_GATEWAY'|'APPLICATION_LOAD_BALANCER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcesForWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesForWebACLAsync(array{WebACLId?: string, ResourceType?: 'API_GATEWAY'|'APPLICATION_LOAD_BALANCER', ...} $args = [])
 * @method \Aws\Result listRuleGroups(array $args = [])
 * @phpstan-method \Aws\Result listRuleGroups(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuleGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuleGroupsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listRules(array $args = [])
 * @phpstan-method \Aws\Result listRules(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRulesAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listSizeConstraintSets(array $args = [])
 * @phpstan-method \Aws\Result listSizeConstraintSets(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSizeConstraintSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSizeConstraintSetsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listSqlInjectionMatchSets(array $args = [])
 * @phpstan-method \Aws\Result listSqlInjectionMatchSets(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSqlInjectionMatchSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSqlInjectionMatchSetsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listSubscribedRuleGroups(array $args = [])
 * @phpstan-method \Aws\Result listSubscribedRuleGroups(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscribedRuleGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscribedRuleGroupsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{NextMarker?: string, Limit?: int, ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{NextMarker?: string, Limit?: int, ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result listWebACLs(array $args = [])
 * @phpstan-method \Aws\Result listWebACLs(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebACLsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWebACLsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result listXssMatchSets(array $args = [])
 * @phpstan-method \Aws\Result listXssMatchSets(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listXssMatchSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listXssMatchSetsAsync(array{NextMarker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result putLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putLoggingConfiguration(array{
 *     LoggingConfiguration?: array{ResourceArn?: string, LogDestinationConfigs?: list<string>, RedactedFields?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLoggingConfigurationAsync(array{
 *     LoggingConfiguration?: array{ResourceArn?: string, LogDestinationConfigs?: list<string>, RedactedFields?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putPermissionPolicy(array $args = [])
 * @phpstan-method \Aws\Result putPermissionPolicy(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putPermissionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPermissionPolicyAsync(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateByteMatchSet(array $args = [])
 * @phpstan-method \Aws\Result updateByteMatchSet(array{
 *     ByteMatchSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', ByteMatchTuple?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateByteMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateByteMatchSetAsync(array{
 *     ByteMatchSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', ByteMatchTuple?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGeoMatchSet(array $args = [])
 * @phpstan-method \Aws\Result updateGeoMatchSet(array{
 *     GeoMatchSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', GeoMatchConstraint?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGeoMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGeoMatchSetAsync(array{
 *     GeoMatchSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', GeoMatchConstraint?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIPSet(array $args = [])
 * @phpstan-method \Aws\Result updateIPSet(array{
 *     IPSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', IPSetDescriptor?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIPSetAsync(array{
 *     IPSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', IPSetDescriptor?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRateBasedRule(array $args = [])
 * @phpstan-method \Aws\Result updateRateBasedRule(array{
 *     RuleId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', Predicate?: array, ...}>,
 *     RateLimit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRateBasedRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRateBasedRuleAsync(array{
 *     RuleId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', Predicate?: array, ...}>,
 *     RateLimit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRegexMatchSet(array $args = [])
 * @phpstan-method \Aws\Result updateRegexMatchSet(array{
 *     RegexMatchSetId?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', RegexMatchTuple?: array, ...}>,
 *     ChangeToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegexMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegexMatchSetAsync(array{
 *     RegexMatchSetId?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', RegexMatchTuple?: array, ...}>,
 *     ChangeToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRegexPatternSet(array $args = [])
 * @phpstan-method \Aws\Result updateRegexPatternSet(array{
 *     RegexPatternSetId?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', RegexPatternString?: string, ...}>,
 *     ChangeToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegexPatternSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegexPatternSetAsync(array{
 *     RegexPatternSetId?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', RegexPatternString?: string, ...}>,
 *     ChangeToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRule(array $args = [])
 * @phpstan-method \Aws\Result updateRule(array{
 *     RuleId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', Predicate?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleAsync(array{
 *     RuleId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', Predicate?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuleGroup(array $args = [])
 * @phpstan-method \Aws\Result updateRuleGroup(array{
 *     RuleGroupId?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', ActivatedRule?: array, ...}>,
 *     ChangeToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleGroupAsync(array{
 *     RuleGroupId?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', ActivatedRule?: array, ...}>,
 *     ChangeToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSizeConstraintSet(array $args = [])
 * @phpstan-method \Aws\Result updateSizeConstraintSet(array{
 *     SizeConstraintSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', SizeConstraint?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSizeConstraintSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSizeConstraintSetAsync(array{
 *     SizeConstraintSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', SizeConstraint?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSqlInjectionMatchSet(array $args = [])
 * @phpstan-method \Aws\Result updateSqlInjectionMatchSet(array{
 *     SqlInjectionMatchSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', SqlInjectionMatchTuple?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSqlInjectionMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSqlInjectionMatchSetAsync(array{
 *     SqlInjectionMatchSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', SqlInjectionMatchTuple?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWebACL(array $args = [])
 * @phpstan-method \Aws\Result updateWebACL(array{
 *     WebACLId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', ActivatedRule?: array, ...}>,
 *     DefaultAction?: array{Type?: 'ALLOW'|'BLOCK'|'COUNT', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWebACLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWebACLAsync(array{
 *     WebACLId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', ActivatedRule?: array, ...}>,
 *     DefaultAction?: array{Type?: 'ALLOW'|'BLOCK'|'COUNT', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateXssMatchSet(array $args = [])
 * @phpstan-method \Aws\Result updateXssMatchSet(array{
 *     XssMatchSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', XssMatchTuple?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateXssMatchSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateXssMatchSetAsync(array{
 *     XssMatchSetId?: string,
 *     ChangeToken?: string,
 *     Updates?: list<array{Action?: 'DELETE'|'INSERT', XssMatchTuple?: array, ...}>,
 *     ...,
 * } $args = [])
 */
class WafRegionalClient extends AwsClient {}
