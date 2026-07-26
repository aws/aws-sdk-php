<?php
namespace Aws\BillingConductor;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWSBillingConductor** service.
 * @method \Aws\Result associateAccounts(array $args = [])
 * @phpstan-method \Aws\Result associateAccounts(array{Arn?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAccountsAsync(array{Arn?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result associatePricingRules(array $args = [])
 * @phpstan-method \Aws\Result associatePricingRules(array{Arn?: string, PricingRuleArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePricingRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePricingRulesAsync(array{Arn?: string, PricingRuleArns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchAssociateResourcesToCustomLineItem(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateResourcesToCustomLineItem(array{
 *     TargetArn?: string,
 *     ResourceArns?: list<string>,
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateResourcesToCustomLineItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateResourcesToCustomLineItemAsync(array{
 *     TargetArn?: string,
 *     ResourceArns?: list<string>,
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDisassociateResourcesFromCustomLineItem(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateResourcesFromCustomLineItem(array{
 *     TargetArn?: string,
 *     ResourceArns?: list<string>,
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateResourcesFromCustomLineItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateResourcesFromCustomLineItemAsync(array{
 *     TargetArn?: string,
 *     ResourceArns?: list<string>,
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBillingGroup(array $args = [])
 * @phpstan-method \Aws\Result createBillingGroup(array{
 *     ClientToken?: string,
 *     Name?: string,
 *     AccountGrouping?: array{LinkedAccountIds?: list<string>, AutoAssociate?: bool, ResponsibilityTransferArn?: string, ...},
 *     ComputationPreference?: array{PricingPlanArn?: string, ...},
 *     PrimaryAccountId?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBillingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBillingGroupAsync(array{
 *     ClientToken?: string,
 *     Name?: string,
 *     AccountGrouping?: array{LinkedAccountIds?: list<string>, AutoAssociate?: bool, ResponsibilityTransferArn?: string, ...},
 *     ComputationPreference?: array{PricingPlanArn?: string, ...},
 *     PrimaryAccountId?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomLineItem(array $args = [])
 * @phpstan-method \Aws\Result createCustomLineItem(array{
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     BillingGroupArn?: string,
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     Tags?: array<string, string>,
 *     ChargeDetails?: array{
 *         Flat?: array{ChargeValue?: float, ...},
 *         Percentage?: array{PercentageValue?: float, AssociatedValues?: list<string>, ...},
 *         Type?: 'CREDIT'|'FEE',
 *         LineItemFilters?: list<array>,
 *         ...,
 *     },
 *     AccountId?: string,
 *     ComputationRule?: 'CONSOLIDATED'|'ITEMIZED',
 *     PresentationDetails?: array{Service?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomLineItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomLineItemAsync(array{
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     BillingGroupArn?: string,
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     Tags?: array<string, string>,
 *     ChargeDetails?: array{
 *         Flat?: array{ChargeValue?: float, ...},
 *         Percentage?: array{PercentageValue?: float, AssociatedValues?: list<string>, ...},
 *         Type?: 'CREDIT'|'FEE',
 *         LineItemFilters?: list<array>,
 *         ...,
 *     },
 *     AccountId?: string,
 *     ComputationRule?: 'CONSOLIDATED'|'ITEMIZED',
 *     PresentationDetails?: array{Service?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPricingPlan(array $args = [])
 * @phpstan-method \Aws\Result createPricingPlan(array{
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     PricingRuleArns?: list<string>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPricingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPricingPlanAsync(array{
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     PricingRuleArns?: list<string>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPricingRule(array $args = [])
 * @phpstan-method \Aws\Result createPricingRule(array{
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     Scope?: 'BILLING_ENTITY'|'GLOBAL'|'SERVICE'|'SKU',
 *     Type?: 'DISCOUNT'|'MARKUP'|'TIERING',
 *     ModifierPercentage?: float,
 *     Service?: string,
 *     Tags?: array<string, string>,
 *     BillingEntity?: string,
 *     Tiering?: array{FreeTier?: array{Activated?: bool, ...}, ...},
 *     UsageType?: string,
 *     Operation?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPricingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPricingRuleAsync(array{
 *     ClientToken?: string,
 *     Name?: string,
 *     Description?: string,
 *     Scope?: 'BILLING_ENTITY'|'GLOBAL'|'SERVICE'|'SKU',
 *     Type?: 'DISCOUNT'|'MARKUP'|'TIERING',
 *     ModifierPercentage?: float,
 *     Service?: string,
 *     Tags?: array<string, string>,
 *     BillingEntity?: string,
 *     Tiering?: array{FreeTier?: array{Activated?: bool, ...}, ...},
 *     UsageType?: string,
 *     Operation?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBillingGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteBillingGroup(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBillingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBillingGroupAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomLineItem(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomLineItem(array{
 *     Arn?: string,
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomLineItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomLineItemAsync(array{
 *     Arn?: string,
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePricingPlan(array $args = [])
 * @phpstan-method \Aws\Result deletePricingPlan(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePricingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePricingPlanAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deletePricingRule(array $args = [])
 * @phpstan-method \Aws\Result deletePricingRule(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePricingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePricingRuleAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result disassociateAccounts(array $args = [])
 * @phpstan-method \Aws\Result disassociateAccounts(array{Arn?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAccountsAsync(array{Arn?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result disassociatePricingRules(array $args = [])
 * @phpstan-method \Aws\Result disassociatePricingRules(array{Arn?: string, PricingRuleArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePricingRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociatePricingRulesAsync(array{Arn?: string, PricingRuleArns?: list<string>, ...} $args = [])
 * @method \Aws\Result getBillingGroupCostReport(array $args = [])
 * @phpstan-method \Aws\Result getBillingGroupCostReport(array{
 *     Arn?: string,
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     GroupBy?: list<'BILLING_PERIOD'|'PRODUCT_NAME'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getBillingGroupCostReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBillingGroupCostReportAsync(array{
 *     Arn?: string,
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     GroupBy?: list<'BILLING_PERIOD'|'PRODUCT_NAME'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccountAssociations(array $args = [])
 * @phpstan-method \Aws\Result listAccountAssociations(array{
 *     BillingPeriod?: string,
 *     Filters?: array{Association?: string, AccountId?: string, AccountIds?: list<string>, ...},
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountAssociationsAsync(array{
 *     BillingPeriod?: string,
 *     Filters?: array{Association?: string, AccountId?: string, AccountIds?: list<string>, ...},
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBillingGroupCostReports(array $args = [])
 * @phpstan-method \Aws\Result listBillingGroupCostReports(array{
 *     BillingPeriod?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: array{BillingGroupArns?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillingGroupCostReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillingGroupCostReportsAsync(array{
 *     BillingPeriod?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: array{BillingGroupArns?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBillingGroups(array $args = [])
 * @phpstan-method \Aws\Result listBillingGroups(array{
 *     BillingPeriod?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: array{
 *         Arns?: list<string>,
 *         PricingPlan?: string,
 *         Statuses?: list<'ACTIVE'|'PENDING'|'PRIMARY_ACCOUNT_MISSING'>,
 *         AutoAssociate?: bool,
 *         PrimaryAccountIds?: list<string>,
 *         BillingGroupTypes?: list<'STANDARD'|'TRANSFER_BILLING'>,
 *         Names?: list<array>,
 *         ResponsibilityTransferArns?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillingGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillingGroupsAsync(array{
 *     BillingPeriod?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: array{
 *         Arns?: list<string>,
 *         PricingPlan?: string,
 *         Statuses?: list<'ACTIVE'|'PENDING'|'PRIMARY_ACCOUNT_MISSING'>,
 *         AutoAssociate?: bool,
 *         PrimaryAccountIds?: list<string>,
 *         BillingGroupTypes?: list<'STANDARD'|'TRANSFER_BILLING'>,
 *         Names?: list<array>,
 *         ResponsibilityTransferArns?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCustomLineItemVersions(array $args = [])
 * @phpstan-method \Aws\Result listCustomLineItemVersions(array{
 *     Arn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: array{BillingPeriodRange?: array{StartBillingPeriod?: string, EndBillingPeriod?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomLineItemVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomLineItemVersionsAsync(array{
 *     Arn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: array{BillingPeriodRange?: array{StartBillingPeriod?: string, EndBillingPeriod?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCustomLineItems(array $args = [])
 * @phpstan-method \Aws\Result listCustomLineItems(array{
 *     BillingPeriod?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: array{Names?: list<string>, BillingGroups?: list<string>, Arns?: list<string>, AccountIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomLineItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomLineItemsAsync(array{
 *     BillingPeriod?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: array{Names?: list<string>, BillingGroups?: list<string>, Arns?: list<string>, AccountIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPricingPlans(array $args = [])
 * @phpstan-method \Aws\Result listPricingPlans(array{
 *     BillingPeriod?: string,
 *     Filters?: array{Arns?: list<string>, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPricingPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPricingPlansAsync(array{
 *     BillingPeriod?: string,
 *     Filters?: array{Arns?: list<string>, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPricingPlansAssociatedWithPricingRule(array $args = [])
 * @phpstan-method \Aws\Result listPricingPlansAssociatedWithPricingRule(array{BillingPeriod?: string, PricingRuleArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPricingPlansAssociatedWithPricingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPricingPlansAssociatedWithPricingRuleAsync(array{BillingPeriod?: string, PricingRuleArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPricingRules(array $args = [])
 * @phpstan-method \Aws\Result listPricingRules(array{
 *     BillingPeriod?: string,
 *     Filters?: array{Arns?: list<string>, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPricingRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPricingRulesAsync(array{
 *     BillingPeriod?: string,
 *     Filters?: array{Arns?: list<string>, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPricingRulesAssociatedToPricingPlan(array $args = [])
 * @phpstan-method \Aws\Result listPricingRulesAssociatedToPricingPlan(array{BillingPeriod?: string, PricingPlanArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPricingRulesAssociatedToPricingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPricingRulesAssociatedToPricingPlanAsync(array{BillingPeriod?: string, PricingPlanArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listResourcesAssociatedToCustomLineItem(array $args = [])
 * @phpstan-method \Aws\Result listResourcesAssociatedToCustomLineItem(array{
 *     BillingPeriod?: string,
 *     Arn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: array{Relationship?: 'CHILD'|'PARENT', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcesAssociatedToCustomLineItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesAssociatedToCustomLineItemAsync(array{
 *     BillingPeriod?: string,
 *     Arn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: array{Relationship?: 'CHILD'|'PARENT', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBillingGroup(array $args = [])
 * @phpstan-method \Aws\Result updateBillingGroup(array{
 *     Arn?: string,
 *     Name?: string,
 *     Status?: 'ACTIVE'|'PENDING'|'PRIMARY_ACCOUNT_MISSING',
 *     ComputationPreference?: array{PricingPlanArn?: string, ...},
 *     Description?: string,
 *     AccountGrouping?: array{AutoAssociate?: bool, ResponsibilityTransferArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBillingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBillingGroupAsync(array{
 *     Arn?: string,
 *     Name?: string,
 *     Status?: 'ACTIVE'|'PENDING'|'PRIMARY_ACCOUNT_MISSING',
 *     ComputationPreference?: array{PricingPlanArn?: string, ...},
 *     Description?: string,
 *     AccountGrouping?: array{AutoAssociate?: bool, ResponsibilityTransferArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCustomLineItem(array $args = [])
 * @phpstan-method \Aws\Result updateCustomLineItem(array{
 *     Arn?: string,
 *     Name?: string,
 *     Description?: string,
 *     ChargeDetails?: array{
 *         Flat?: array{ChargeValue?: float, ...},
 *         Percentage?: array{PercentageValue?: float, ...},
 *         LineItemFilters?: list<array>,
 *         ...,
 *     },
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomLineItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomLineItemAsync(array{
 *     Arn?: string,
 *     Name?: string,
 *     Description?: string,
 *     ChargeDetails?: array{
 *         Flat?: array{ChargeValue?: float, ...},
 *         Percentage?: array{PercentageValue?: float, ...},
 *         LineItemFilters?: list<array>,
 *         ...,
 *     },
 *     BillingPeriodRange?: array{InclusiveStartBillingPeriod?: string, ExclusiveEndBillingPeriod?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePricingPlan(array $args = [])
 * @phpstan-method \Aws\Result updatePricingPlan(array{Arn?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePricingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePricingPlanAsync(array{Arn?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updatePricingRule(array $args = [])
 * @phpstan-method \Aws\Result updatePricingRule(array{
 *     Arn?: string,
 *     Name?: string,
 *     Description?: string,
 *     Type?: 'DISCOUNT'|'MARKUP'|'TIERING',
 *     ModifierPercentage?: float,
 *     Tiering?: array{FreeTier?: array{Activated?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePricingRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePricingRuleAsync(array{
 *     Arn?: string,
 *     Name?: string,
 *     Description?: string,
 *     Type?: 'DISCOUNT'|'MARKUP'|'TIERING',
 *     ModifierPercentage?: float,
 *     Tiering?: array{FreeTier?: array{Activated?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 */
class BillingConductorClient extends AwsClient {}
