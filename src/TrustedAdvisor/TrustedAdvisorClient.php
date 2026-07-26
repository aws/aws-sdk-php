<?php
namespace Aws\TrustedAdvisor;

use Aws\AwsClient;

/**
 * This client is used to interact with the **TrustedAdvisor Public API** service.
 * @method \Aws\Result batchUpdateRecommendationResourceExclusion(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateRecommendationResourceExclusion(array{recommendationResourceExclusions?: list<array{arn?: string, isExcluded?: bool, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateRecommendationResourceExclusionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateRecommendationResourceExclusionAsync(array{recommendationResourceExclusions?: list<array{arn?: string, isExcluded?: bool, ...}>, ...} $args = [])
 * @method \Aws\Result getOrganizationRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getOrganizationRecommendation(array{organizationRecommendationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOrganizationRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOrganizationRecommendationAsync(array{organizationRecommendationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getRecommendation(array{
 *     recommendationIdentifier?: string,
 *     language?: 'de'|'en'|'es'|'fr'|'id'|'it'|'ja'|'ko'|'pt_BR'|'zh'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationAsync(array{
 *     recommendationIdentifier?: string,
 *     language?: 'de'|'en'|'es'|'fr'|'id'|'it'|'ja'|'ko'|'pt_BR'|'zh'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listChecks(array $args = [])
 * @phpstan-method \Aws\Result listChecks(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     pillar?: 'cost_optimizing'|'fault_tolerance'|'operational_excellence'|'performance'|'security'|'service_limits',
 *     awsService?: string,
 *     source?: 'aws_config'|'compute_optimizer'|'cost_explorer'|'cost_optimization_hub'|'lse'|'manual'|'pse'|'rds'|'resilience'|'resilience_hub'|'security_hub'|'stir'|'ta_check'|'well_architected',
 *     language?: 'de'|'en'|'es'|'fr'|'id'|'it'|'ja'|'ko'|'pt_BR'|'zh'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listChecksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChecksAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     pillar?: 'cost_optimizing'|'fault_tolerance'|'operational_excellence'|'performance'|'security'|'service_limits',
 *     awsService?: string,
 *     source?: 'aws_config'|'compute_optimizer'|'cost_explorer'|'cost_optimization_hub'|'lse'|'manual'|'pse'|'rds'|'resilience'|'resilience_hub'|'security_hub'|'stir'|'ta_check'|'well_architected',
 *     language?: 'de'|'en'|'es'|'fr'|'id'|'it'|'ja'|'ko'|'pt_BR'|'zh'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOrganizationRecommendationAccounts(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationRecommendationAccounts(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     organizationRecommendationIdentifier?: string,
 *     affectedAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationRecommendationAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationRecommendationAccountsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     organizationRecommendationIdentifier?: string,
 *     affectedAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOrganizationRecommendationResources(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationRecommendationResources(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     status?: 'error'|'ok'|'warning',
 *     exclusionStatus?: 'excluded'|'included',
 *     regionCode?: string,
 *     organizationRecommendationIdentifier?: string,
 *     affectedAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationRecommendationResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationRecommendationResourcesAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     status?: 'error'|'ok'|'warning',
 *     exclusionStatus?: 'excluded'|'included',
 *     regionCode?: string,
 *     organizationRecommendationIdentifier?: string,
 *     affectedAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOrganizationRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationRecommendations(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     type?: 'priority'|'standard',
 *     status?: 'error'|'ok'|'warning',
 *     pillar?: 'cost_optimizing'|'fault_tolerance'|'operational_excellence'|'performance'|'security'|'service_limits',
 *     awsService?: string,
 *     source?: 'aws_config'|'compute_optimizer'|'cost_explorer'|'cost_optimization_hub'|'lse'|'manual'|'pse'|'rds'|'resilience'|'resilience_hub'|'security_hub'|'stir'|'ta_check'|'well_architected',
 *     checkIdentifier?: string,
 *     afterLastUpdatedAt?: int|string|\DateTimeInterface,
 *     beforeLastUpdatedAt?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationRecommendationsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     type?: 'priority'|'standard',
 *     status?: 'error'|'ok'|'warning',
 *     pillar?: 'cost_optimizing'|'fault_tolerance'|'operational_excellence'|'performance'|'security'|'service_limits',
 *     awsService?: string,
 *     source?: 'aws_config'|'compute_optimizer'|'cost_explorer'|'cost_optimization_hub'|'lse'|'manual'|'pse'|'rds'|'resilience'|'resilience_hub'|'security_hub'|'stir'|'ta_check'|'well_architected',
 *     checkIdentifier?: string,
 *     afterLastUpdatedAt?: int|string|\DateTimeInterface,
 *     beforeLastUpdatedAt?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendationResources(array $args = [])
 * @phpstan-method \Aws\Result listRecommendationResources(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     status?: 'error'|'ok'|'warning',
 *     exclusionStatus?: 'excluded'|'included',
 *     regionCode?: string,
 *     recommendationIdentifier?: string,
 *     language?: 'de'|'en'|'es'|'fr'|'id'|'it'|'ja'|'ko'|'pt_BR'|'zh'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationResourcesAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     status?: 'error'|'ok'|'warning',
 *     exclusionStatus?: 'excluded'|'included',
 *     regionCode?: string,
 *     recommendationIdentifier?: string,
 *     language?: 'de'|'en'|'es'|'fr'|'id'|'it'|'ja'|'ko'|'pt_BR'|'zh'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listRecommendations(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     type?: 'priority'|'standard',
 *     status?: 'error'|'ok'|'warning',
 *     pillar?: 'cost_optimizing'|'fault_tolerance'|'operational_excellence'|'performance'|'security'|'service_limits',
 *     awsService?: string,
 *     source?: 'aws_config'|'compute_optimizer'|'cost_explorer'|'cost_optimization_hub'|'lse'|'manual'|'pse'|'rds'|'resilience'|'resilience_hub'|'security_hub'|'stir'|'ta_check'|'well_architected',
 *     checkIdentifier?: string,
 *     afterLastUpdatedAt?: int|string|\DateTimeInterface,
 *     beforeLastUpdatedAt?: int|string|\DateTimeInterface,
 *     language?: 'de'|'en'|'es'|'fr'|'id'|'it'|'ja'|'ko'|'pt_BR'|'zh'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     type?: 'priority'|'standard',
 *     status?: 'error'|'ok'|'warning',
 *     pillar?: 'cost_optimizing'|'fault_tolerance'|'operational_excellence'|'performance'|'security'|'service_limits',
 *     awsService?: string,
 *     source?: 'aws_config'|'compute_optimizer'|'cost_explorer'|'cost_optimization_hub'|'lse'|'manual'|'pse'|'rds'|'resilience'|'resilience_hub'|'security_hub'|'stir'|'ta_check'|'well_architected',
 *     checkIdentifier?: string,
 *     afterLastUpdatedAt?: int|string|\DateTimeInterface,
 *     beforeLastUpdatedAt?: int|string|\DateTimeInterface,
 *     language?: 'de'|'en'|'es'|'fr'|'id'|'it'|'ja'|'ko'|'pt_BR'|'zh'|'zh_TW',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOrganizationRecommendationLifecycle(array $args = [])
 * @phpstan-method \Aws\Result updateOrganizationRecommendationLifecycle(array{
 *     lifecycleStage?: 'dismissed'|'in_progress'|'pending_response'|'resolved',
 *     updateReason?: string,
 *     updateReasonCode?: 'low_priority'|'non_critical_account'|'not_applicable'|'other'|'other_methods_available'|'temporary_account'|'valid_business_case',
 *     organizationRecommendationIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOrganizationRecommendationLifecycleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOrganizationRecommendationLifecycleAsync(array{
 *     lifecycleStage?: 'dismissed'|'in_progress'|'pending_response'|'resolved',
 *     updateReason?: string,
 *     updateReasonCode?: 'low_priority'|'non_critical_account'|'not_applicable'|'other'|'other_methods_available'|'temporary_account'|'valid_business_case',
 *     organizationRecommendationIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRecommendationLifecycle(array $args = [])
 * @phpstan-method \Aws\Result updateRecommendationLifecycle(array{
 *     lifecycleStage?: 'dismissed'|'in_progress'|'pending_response'|'resolved',
 *     updateReason?: string,
 *     updateReasonCode?: 'low_priority'|'non_critical_account'|'not_applicable'|'other'|'other_methods_available'|'temporary_account'|'valid_business_case',
 *     recommendationIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRecommendationLifecycleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecommendationLifecycleAsync(array{
 *     lifecycleStage?: 'dismissed'|'in_progress'|'pending_response'|'resolved',
 *     updateReason?: string,
 *     updateReasonCode?: 'low_priority'|'non_critical_account'|'not_applicable'|'other'|'other_methods_available'|'temporary_account'|'valid_business_case',
 *     recommendationIdentifier?: string,
 *     ...,
 * } $args = [])
 */
class TrustedAdvisorClient extends AwsClient {}
