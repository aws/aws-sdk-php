<?php
namespace Aws\BCMPricingCalculator;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Billing and Cost Management Pricing Calculator** service.
 * @method \Aws\Result batchCreateBillScenarioCommitmentModification(array $args = [])
 * @phpstan-method \Aws\Result batchCreateBillScenarioCommitmentModification(array{
 *     billScenarioId?: string,
 *     commitmentModifications?: list<array{key?: string, group?: string, usageAccountId?: string, commitmentAction?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateBillScenarioCommitmentModificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateBillScenarioCommitmentModificationAsync(array{
 *     billScenarioId?: string,
 *     commitmentModifications?: list<array{key?: string, group?: string, usageAccountId?: string, commitmentAction?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchCreateBillScenarioUsageModification(array $args = [])
 * @phpstan-method \Aws\Result batchCreateBillScenarioUsageModification(array{
 *     billScenarioId?: string,
 *     usageModifications?: list<array{
 *         serviceCode?: string,
 *         usageType?: string,
 *         operation?: string,
 *         availabilityZone?: string,
 *         key?: string,
 *         group?: string,
 *         usageAccountId?: string,
 *         amounts?: list<array>,
 *         historicalUsage?: array,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateBillScenarioUsageModificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateBillScenarioUsageModificationAsync(array{
 *     billScenarioId?: string,
 *     usageModifications?: list<array{
 *         serviceCode?: string,
 *         usageType?: string,
 *         operation?: string,
 *         availabilityZone?: string,
 *         key?: string,
 *         group?: string,
 *         usageAccountId?: string,
 *         amounts?: list<array>,
 *         historicalUsage?: array,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchCreateWorkloadEstimateUsage(array $args = [])
 * @phpstan-method \Aws\Result batchCreateWorkloadEstimateUsage(array{
 *     workloadEstimateId?: string,
 *     usage?: list<array{
 *         serviceCode?: string,
 *         usageType?: string,
 *         operation?: string,
 *         key?: string,
 *         group?: string,
 *         usageAccountId?: string,
 *         amount?: float,
 *         historicalUsage?: array,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateWorkloadEstimateUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateWorkloadEstimateUsageAsync(array{
 *     workloadEstimateId?: string,
 *     usage?: list<array{
 *         serviceCode?: string,
 *         usageType?: string,
 *         operation?: string,
 *         key?: string,
 *         group?: string,
 *         usageAccountId?: string,
 *         amount?: float,
 *         historicalUsage?: array,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteBillScenarioCommitmentModification(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteBillScenarioCommitmentModification(array{billScenarioId?: string, ids?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteBillScenarioCommitmentModificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteBillScenarioCommitmentModificationAsync(array{billScenarioId?: string, ids?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDeleteBillScenarioUsageModification(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteBillScenarioUsageModification(array{billScenarioId?: string, ids?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteBillScenarioUsageModificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteBillScenarioUsageModificationAsync(array{billScenarioId?: string, ids?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDeleteWorkloadEstimateUsage(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteWorkloadEstimateUsage(array{workloadEstimateId?: string, ids?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteWorkloadEstimateUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteWorkloadEstimateUsageAsync(array{workloadEstimateId?: string, ids?: list<string>, ...} $args = [])
 * @method \Aws\Result batchUpdateBillScenarioCommitmentModification(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateBillScenarioCommitmentModification(array{billScenarioId?: string, commitmentModifications?: list<array{id?: string, group?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateBillScenarioCommitmentModificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateBillScenarioCommitmentModificationAsync(array{billScenarioId?: string, commitmentModifications?: list<array{id?: string, group?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchUpdateBillScenarioUsageModification(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateBillScenarioUsageModification(array{
 *     billScenarioId?: string,
 *     usageModifications?: list<array{id?: string, group?: string, amounts?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateBillScenarioUsageModificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateBillScenarioUsageModificationAsync(array{
 *     billScenarioId?: string,
 *     usageModifications?: list<array{id?: string, group?: string, amounts?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateWorkloadEstimateUsage(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateWorkloadEstimateUsage(array{workloadEstimateId?: string, usage?: list<array{id?: string, group?: string, amount?: float, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateWorkloadEstimateUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateWorkloadEstimateUsageAsync(array{workloadEstimateId?: string, usage?: list<array{id?: string, group?: string, amount?: float, ...}>, ...} $args = [])
 * @method \Aws\Result createBillEstimate(array $args = [])
 * @phpstan-method \Aws\Result createBillEstimate(array{billScenarioId?: string, name?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBillEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBillEstimateAsync(array{billScenarioId?: string, name?: string, clientToken?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createBillScenario(array $args = [])
 * @phpstan-method \Aws\Result createBillScenario(array{
 *     name?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     groupSharingPreference?: 'OPEN'|'PRIORITIZED'|'RESTRICTED',
 *     costCategoryGroupSharingPreferenceArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBillScenarioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBillScenarioAsync(array{
 *     name?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     groupSharingPreference?: 'OPEN'|'PRIORITIZED'|'RESTRICTED',
 *     costCategoryGroupSharingPreferenceArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkloadEstimate(array $args = [])
 * @phpstan-method \Aws\Result createWorkloadEstimate(array{
 *     name?: string,
 *     clientToken?: string,
 *     rateType?: 'AFTER_DISCOUNTS'|'AFTER_DISCOUNTS_AND_COMMITMENTS'|'BEFORE_DISCOUNTS',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkloadEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkloadEstimateAsync(array{
 *     name?: string,
 *     clientToken?: string,
 *     rateType?: 'AFTER_DISCOUNTS'|'AFTER_DISCOUNTS_AND_COMMITMENTS'|'BEFORE_DISCOUNTS',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBillEstimate(array $args = [])
 * @phpstan-method \Aws\Result deleteBillEstimate(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBillEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBillEstimateAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteBillScenario(array $args = [])
 * @phpstan-method \Aws\Result deleteBillScenario(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBillScenarioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBillScenarioAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkloadEstimate(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkloadEstimate(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkloadEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkloadEstimateAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getBillEstimate(array $args = [])
 * @phpstan-method \Aws\Result getBillEstimate(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBillEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBillEstimateAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getBillScenario(array $args = [])
 * @phpstan-method \Aws\Result getBillScenario(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBillScenarioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBillScenarioAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getPreferences(array $args = [])
 * @phpstan-method \Aws\Result getPreferences(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPreferencesAsync(array{...} $args = [])
 * @method \Aws\Result getWorkloadEstimate(array $args = [])
 * @phpstan-method \Aws\Result getWorkloadEstimate(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkloadEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkloadEstimateAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result listBillEstimateCommitments(array $args = [])
 * @phpstan-method \Aws\Result listBillEstimateCommitments(array{billEstimateId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillEstimateCommitmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillEstimateCommitmentsAsync(array{billEstimateId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listBillEstimateInputCommitmentModifications(array $args = [])
 * @phpstan-method \Aws\Result listBillEstimateInputCommitmentModifications(array{billEstimateId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillEstimateInputCommitmentModificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillEstimateInputCommitmentModificationsAsync(array{billEstimateId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listBillEstimateInputUsageModifications(array $args = [])
 * @phpstan-method \Aws\Result listBillEstimateInputUsageModifications(array{
 *     billEstimateId?: string,
 *     filters?: list<array{
 *         name?: 'HISTORICAL_LOCATION'|'HISTORICAL_OPERATION'|'HISTORICAL_SERVICE_CODE'|'HISTORICAL_USAGE_ACCOUNT_ID'|'HISTORICAL_USAGE_TYPE'|'LOCATION'|'OPERATION'|'SERVICE_CODE'|'USAGE_ACCOUNT_ID'|'USAGE_GROUP'|'USAGE_TYPE',
 *         values?: list<string>,
 *         matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillEstimateInputUsageModificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillEstimateInputUsageModificationsAsync(array{
 *     billEstimateId?: string,
 *     filters?: list<array{
 *         name?: 'HISTORICAL_LOCATION'|'HISTORICAL_OPERATION'|'HISTORICAL_SERVICE_CODE'|'HISTORICAL_USAGE_ACCOUNT_ID'|'HISTORICAL_USAGE_TYPE'|'LOCATION'|'OPERATION'|'SERVICE_CODE'|'USAGE_ACCOUNT_ID'|'USAGE_GROUP'|'USAGE_TYPE',
 *         values?: list<string>,
 *         matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBillEstimateLineItems(array $args = [])
 * @phpstan-method \Aws\Result listBillEstimateLineItems(array{
 *     billEstimateId?: string,
 *     filters?: list<array{
 *         name?: 'LINE_ITEM_TYPE'|'LOCATION'|'OPERATION'|'SERVICE_CODE'|'USAGE_ACCOUNT_ID'|'USAGE_TYPE',
 *         values?: list<string>,
 *         matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillEstimateLineItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillEstimateLineItemsAsync(array{
 *     billEstimateId?: string,
 *     filters?: list<array{
 *         name?: 'LINE_ITEM_TYPE'|'LOCATION'|'OPERATION'|'SERVICE_CODE'|'USAGE_ACCOUNT_ID'|'USAGE_TYPE',
 *         values?: list<string>,
 *         matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBillEstimates(array $args = [])
 * @phpstan-method \Aws\Result listBillEstimates(array{
 *     filters?: list<array{name?: 'NAME'|'STATUS', values?: list<string>, matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH', ...}>,
 *     createdAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     expiresAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillEstimatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillEstimatesAsync(array{
 *     filters?: list<array{name?: 'NAME'|'STATUS', values?: list<string>, matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH', ...}>,
 *     createdAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     expiresAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBillScenarioCommitmentModifications(array $args = [])
 * @phpstan-method \Aws\Result listBillScenarioCommitmentModifications(array{billScenarioId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillScenarioCommitmentModificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillScenarioCommitmentModificationsAsync(array{billScenarioId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listBillScenarioUsageModifications(array $args = [])
 * @phpstan-method \Aws\Result listBillScenarioUsageModifications(array{
 *     billScenarioId?: string,
 *     filters?: list<array{
 *         name?: 'HISTORICAL_LOCATION'|'HISTORICAL_OPERATION'|'HISTORICAL_SERVICE_CODE'|'HISTORICAL_USAGE_ACCOUNT_ID'|'HISTORICAL_USAGE_TYPE'|'LOCATION'|'OPERATION'|'SERVICE_CODE'|'USAGE_ACCOUNT_ID'|'USAGE_GROUP'|'USAGE_TYPE',
 *         values?: list<string>,
 *         matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillScenarioUsageModificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillScenarioUsageModificationsAsync(array{
 *     billScenarioId?: string,
 *     filters?: list<array{
 *         name?: 'HISTORICAL_LOCATION'|'HISTORICAL_OPERATION'|'HISTORICAL_SERVICE_CODE'|'HISTORICAL_USAGE_ACCOUNT_ID'|'HISTORICAL_USAGE_TYPE'|'LOCATION'|'OPERATION'|'SERVICE_CODE'|'USAGE_ACCOUNT_ID'|'USAGE_GROUP'|'USAGE_TYPE',
 *         values?: list<string>,
 *         matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBillScenarios(array $args = [])
 * @phpstan-method \Aws\Result listBillScenarios(array{
 *     filters?: list<array{
 *         name?: 'COST_CATEGORY_ARN'|'GROUP_SHARING_PREFERENCE'|'NAME'|'STATUS',
 *         values?: list<string>,
 *         matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH',
 *         ...,
 *     }>,
 *     createdAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     expiresAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillScenariosAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillScenariosAsync(array{
 *     filters?: list<array{
 *         name?: 'COST_CATEGORY_ARN'|'GROUP_SHARING_PREFERENCE'|'NAME'|'STATUS',
 *         values?: list<string>,
 *         matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH',
 *         ...,
 *     }>,
 *     createdAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     expiresAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result listWorkloadEstimateUsage(array $args = [])
 * @phpstan-method \Aws\Result listWorkloadEstimateUsage(array{
 *     workloadEstimateId?: string,
 *     filters?: list<array{
 *         name?: 'HISTORICAL_LOCATION'|'HISTORICAL_OPERATION'|'HISTORICAL_SERVICE_CODE'|'HISTORICAL_USAGE_ACCOUNT_ID'|'HISTORICAL_USAGE_TYPE'|'LOCATION'|'OPERATION'|'SERVICE_CODE'|'USAGE_ACCOUNT_ID'|'USAGE_GROUP'|'USAGE_TYPE',
 *         values?: list<string>,
 *         matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkloadEstimateUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkloadEstimateUsageAsync(array{
 *     workloadEstimateId?: string,
 *     filters?: list<array{
 *         name?: 'HISTORICAL_LOCATION'|'HISTORICAL_OPERATION'|'HISTORICAL_SERVICE_CODE'|'HISTORICAL_USAGE_ACCOUNT_ID'|'HISTORICAL_USAGE_TYPE'|'LOCATION'|'OPERATION'|'SERVICE_CODE'|'USAGE_ACCOUNT_ID'|'USAGE_GROUP'|'USAGE_TYPE',
 *         values?: list<string>,
 *         matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH',
 *         ...,
 *     }>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkloadEstimates(array $args = [])
 * @phpstan-method \Aws\Result listWorkloadEstimates(array{
 *     createdAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     expiresAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     filters?: list<array{name?: 'NAME'|'STATUS', values?: list<string>, matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH', ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkloadEstimatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkloadEstimatesAsync(array{
 *     createdAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     expiresAtFilter?: array{afterTimestamp?: int|string|\DateTimeInterface, beforeTimestamp?: int|string|\DateTimeInterface, ...},
 *     filters?: list<array{name?: 'NAME'|'STATUS', values?: list<string>, matchOption?: 'CONTAINS'|'EQUALS'|'STARTS_WITH', ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBillEstimate(array $args = [])
 * @phpstan-method \Aws\Result updateBillEstimate(array{identifier?: string, name?: string, expiresAt?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBillEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBillEstimateAsync(array{identifier?: string, name?: string, expiresAt?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result updateBillScenario(array $args = [])
 * @phpstan-method \Aws\Result updateBillScenario(array{
 *     identifier?: string,
 *     name?: string,
 *     expiresAt?: int|string|\DateTimeInterface,
 *     groupSharingPreference?: 'OPEN'|'PRIORITIZED'|'RESTRICTED',
 *     costCategoryGroupSharingPreferenceArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBillScenarioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBillScenarioAsync(array{
 *     identifier?: string,
 *     name?: string,
 *     expiresAt?: int|string|\DateTimeInterface,
 *     groupSharingPreference?: 'OPEN'|'PRIORITIZED'|'RESTRICTED',
 *     costCategoryGroupSharingPreferenceArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePreferences(array $args = [])
 * @phpstan-method \Aws\Result updatePreferences(array{
 *     managementAccountRateTypeSelections?: list<'AFTER_DISCOUNTS'|'AFTER_DISCOUNTS_AND_COMMITMENTS'|'BEFORE_DISCOUNTS'>,
 *     memberAccountRateTypeSelections?: list<'AFTER_DISCOUNTS'|'AFTER_DISCOUNTS_AND_COMMITMENTS'|'BEFORE_DISCOUNTS'>,
 *     standaloneAccountRateTypeSelections?: list<'AFTER_DISCOUNTS'|'AFTER_DISCOUNTS_AND_COMMITMENTS'|'BEFORE_DISCOUNTS'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePreferencesAsync(array{
 *     managementAccountRateTypeSelections?: list<'AFTER_DISCOUNTS'|'AFTER_DISCOUNTS_AND_COMMITMENTS'|'BEFORE_DISCOUNTS'>,
 *     memberAccountRateTypeSelections?: list<'AFTER_DISCOUNTS'|'AFTER_DISCOUNTS_AND_COMMITMENTS'|'BEFORE_DISCOUNTS'>,
 *     standaloneAccountRateTypeSelections?: list<'AFTER_DISCOUNTS'|'AFTER_DISCOUNTS_AND_COMMITMENTS'|'BEFORE_DISCOUNTS'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkloadEstimate(array $args = [])
 * @phpstan-method \Aws\Result updateWorkloadEstimate(array{identifier?: string, name?: string, expiresAt?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkloadEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkloadEstimateAsync(array{identifier?: string, name?: string, expiresAt?: int|string|\DateTimeInterface, ...} $args = [])
 */
class BCMPricingCalculatorClient extends AwsClient {}
