<?php
namespace Aws\CostOptimizationHub;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Cost Optimization Hub** service.
 * @method \Aws\Result getPreferences(array $args = [])
 * @phpstan-method \Aws\Result getPreferences(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPreferencesAsync(array{...} $args = [])
 * @method \Aws\Result getRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getRecommendation(array{recommendationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationAsync(array{recommendationId?: string, ...} $args = [])
 * @method \Aws\Result listEfficiencyMetrics(array $args = [])
 * @phpstan-method \Aws\Result listEfficiencyMetrics(array{
 *     groupBy?: string,
 *     granularity?: 'Daily'|'Monthly',
 *     timePeriod?: array{start?: string, end?: string, ...},
 *     maxResults?: int,
 *     orderBy?: array{dimension?: string, order?: 'Asc'|'Desc', ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEfficiencyMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEfficiencyMetricsAsync(array{
 *     groupBy?: string,
 *     granularity?: 'Daily'|'Monthly',
 *     timePeriod?: array{start?: string, end?: string, ...},
 *     maxResults?: int,
 *     orderBy?: array{dimension?: string, order?: 'Asc'|'Desc', ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnrollmentStatuses(array $args = [])
 * @phpstan-method \Aws\Result listEnrollmentStatuses(array{includeOrganizationInfo?: bool, accountId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnrollmentStatusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnrollmentStatusesAsync(array{includeOrganizationInfo?: bool, accountId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listRecommendationSummaries(array $args = [])
 * @phpstan-method \Aws\Result listRecommendationSummaries(array{
 *     filter?: array{
 *         restartNeeded?: bool,
 *         rollbackPossible?: bool,
 *         implementationEfforts?: list<'High'|'Low'|'Medium'|'VeryHigh'|'VeryLow'>,
 *         accountIds?: list<string>,
 *         regions?: list<string>,
 *         resourceTypes?: list<'AuroraDbClusterStorage'|'ComputeSavingsPlans'|'DocumentDBCluster'|'DynamoDBTable'|'DynamoDbReservedCapacity'|'EbsVolume'|'Ec2AutoScalingGroup'|'Ec2Instance'|'Ec2InstanceSavingsPlans'|'Ec2ReservedInstances'|'EcsService'|'ElastiCacheCluster'|'ElastiCacheReservedInstances'|'LambdaFunction'|'MemoryDBCluster'|'MemoryDbReservedInstances'|'NatGateway'|'OpenSearchReservedInstances'|'RdsDbInstance'|'RdsDbInstanceStorage'|'RdsReservedInstances'|'RedshiftReservedInstances'|'SageMakerEndpoint'|'SageMakerSavingsPlans'|'WorkSpaces'>,
 *         actionTypes?: list<'Delete'|'MigrateToGraviton'|'PurchaseReservedInstances'|'PurchaseSavingsPlans'|'Rightsize'|'ScaleIn'|'Stop'|'Upgrade'>,
 *         tags?: list<array>,
 *         resourceIds?: list<string>,
 *         resourceArns?: list<string>,
 *         recommendationIds?: list<string>,
 *         ...,
 *     },
 *     groupBy?: string,
 *     maxResults?: int,
 *     metrics?: list<'SavingsPercentage'>,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationSummariesAsync(array{
 *     filter?: array{
 *         restartNeeded?: bool,
 *         rollbackPossible?: bool,
 *         implementationEfforts?: list<'High'|'Low'|'Medium'|'VeryHigh'|'VeryLow'>,
 *         accountIds?: list<string>,
 *         regions?: list<string>,
 *         resourceTypes?: list<'AuroraDbClusterStorage'|'ComputeSavingsPlans'|'DocumentDBCluster'|'DynamoDBTable'|'DynamoDbReservedCapacity'|'EbsVolume'|'Ec2AutoScalingGroup'|'Ec2Instance'|'Ec2InstanceSavingsPlans'|'Ec2ReservedInstances'|'EcsService'|'ElastiCacheCluster'|'ElastiCacheReservedInstances'|'LambdaFunction'|'MemoryDBCluster'|'MemoryDbReservedInstances'|'NatGateway'|'OpenSearchReservedInstances'|'RdsDbInstance'|'RdsDbInstanceStorage'|'RdsReservedInstances'|'RedshiftReservedInstances'|'SageMakerEndpoint'|'SageMakerSavingsPlans'|'WorkSpaces'>,
 *         actionTypes?: list<'Delete'|'MigrateToGraviton'|'PurchaseReservedInstances'|'PurchaseSavingsPlans'|'Rightsize'|'ScaleIn'|'Stop'|'Upgrade'>,
 *         tags?: list<array>,
 *         resourceIds?: list<string>,
 *         resourceArns?: list<string>,
 *         recommendationIds?: list<string>,
 *         ...,
 *     },
 *     groupBy?: string,
 *     maxResults?: int,
 *     metrics?: list<'SavingsPercentage'>,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listRecommendations(array{
 *     filter?: array{
 *         restartNeeded?: bool,
 *         rollbackPossible?: bool,
 *         implementationEfforts?: list<'High'|'Low'|'Medium'|'VeryHigh'|'VeryLow'>,
 *         accountIds?: list<string>,
 *         regions?: list<string>,
 *         resourceTypes?: list<'AuroraDbClusterStorage'|'ComputeSavingsPlans'|'DocumentDBCluster'|'DynamoDBTable'|'DynamoDbReservedCapacity'|'EbsVolume'|'Ec2AutoScalingGroup'|'Ec2Instance'|'Ec2InstanceSavingsPlans'|'Ec2ReservedInstances'|'EcsService'|'ElastiCacheCluster'|'ElastiCacheReservedInstances'|'LambdaFunction'|'MemoryDBCluster'|'MemoryDbReservedInstances'|'NatGateway'|'OpenSearchReservedInstances'|'RdsDbInstance'|'RdsDbInstanceStorage'|'RdsReservedInstances'|'RedshiftReservedInstances'|'SageMakerEndpoint'|'SageMakerSavingsPlans'|'WorkSpaces'>,
 *         actionTypes?: list<'Delete'|'MigrateToGraviton'|'PurchaseReservedInstances'|'PurchaseSavingsPlans'|'Rightsize'|'ScaleIn'|'Stop'|'Upgrade'>,
 *         tags?: list<array>,
 *         resourceIds?: list<string>,
 *         resourceArns?: list<string>,
 *         recommendationIds?: list<string>,
 *         ...,
 *     },
 *     orderBy?: array{dimension?: string, order?: 'Asc'|'Desc', ...},
 *     includeAllRecommendations?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array{
 *     filter?: array{
 *         restartNeeded?: bool,
 *         rollbackPossible?: bool,
 *         implementationEfforts?: list<'High'|'Low'|'Medium'|'VeryHigh'|'VeryLow'>,
 *         accountIds?: list<string>,
 *         regions?: list<string>,
 *         resourceTypes?: list<'AuroraDbClusterStorage'|'ComputeSavingsPlans'|'DocumentDBCluster'|'DynamoDBTable'|'DynamoDbReservedCapacity'|'EbsVolume'|'Ec2AutoScalingGroup'|'Ec2Instance'|'Ec2InstanceSavingsPlans'|'Ec2ReservedInstances'|'EcsService'|'ElastiCacheCluster'|'ElastiCacheReservedInstances'|'LambdaFunction'|'MemoryDBCluster'|'MemoryDbReservedInstances'|'NatGateway'|'OpenSearchReservedInstances'|'RdsDbInstance'|'RdsDbInstanceStorage'|'RdsReservedInstances'|'RedshiftReservedInstances'|'SageMakerEndpoint'|'SageMakerSavingsPlans'|'WorkSpaces'>,
 *         actionTypes?: list<'Delete'|'MigrateToGraviton'|'PurchaseReservedInstances'|'PurchaseSavingsPlans'|'Rightsize'|'ScaleIn'|'Stop'|'Upgrade'>,
 *         tags?: list<array>,
 *         resourceIds?: list<string>,
 *         resourceArns?: list<string>,
 *         recommendationIds?: list<string>,
 *         ...,
 *     },
 *     orderBy?: array{dimension?: string, order?: 'Asc'|'Desc', ...},
 *     includeAllRecommendations?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnrollmentStatus(array $args = [])
 * @phpstan-method \Aws\Result updateEnrollmentStatus(array{status?: 'Active'|'Inactive', includeMemberAccounts?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnrollmentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnrollmentStatusAsync(array{status?: 'Active'|'Inactive', includeMemberAccounts?: bool, ...} $args = [])
 * @method \Aws\Result updatePreferences(array $args = [])
 * @phpstan-method \Aws\Result updatePreferences(array{
 *     savingsEstimationMode?: 'AfterDiscounts'|'BeforeDiscounts',
 *     memberAccountDiscountVisibility?: 'All'|'None',
 *     preferredCommitment?: array{term?: 'OneYear'|'ThreeYears', paymentOption?: 'AllUpfront'|'NoUpfront'|'PartialUpfront', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePreferencesAsync(array{
 *     savingsEstimationMode?: 'AfterDiscounts'|'BeforeDiscounts',
 *     memberAccountDiscountVisibility?: 'All'|'None',
 *     preferredCommitment?: array{term?: 'OneYear'|'ThreeYears', paymentOption?: 'AllUpfront'|'NoUpfront'|'PartialUpfront', ...},
 *     ...,
 * } $args = [])
 */
class CostOptimizationHubClient extends AwsClient {}
