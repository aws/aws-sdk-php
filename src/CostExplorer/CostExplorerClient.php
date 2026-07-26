<?php
namespace Aws\CostExplorer;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Cost Explorer Service** service.
 * @method \Aws\Result createAnomalyMonitor(array $args = [])
 * @phpstan-method \Aws\Result createAnomalyMonitor(array{
 *     AnomalyMonitor?: array{
 *         MonitorArn?: string,
 *         MonitorName?: string,
 *         CreationDate?: string,
 *         LastUpdatedDate?: string,
 *         LastEvaluatedDate?: string,
 *         MonitorType?: 'CUSTOM'|'DIMENSIONAL',
 *         MonitorDimension?: 'COST_CATEGORY'|'LINKED_ACCOUNT'|'SERVICE'|'TAG',
 *         MonitorSpecification?: array{
 *             Or?: list<array>,
 *             And?: list<array>,
 *             Not?: array,
 *             Dimensions?: array,
 *             Tags?: array,
 *             CostCategories?: array,
 *             ...,
 *         },
 *         DimensionalValueCount?: int,
 *         ...,
 *     },
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAnomalyMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAnomalyMonitorAsync(array{
 *     AnomalyMonitor?: array{
 *         MonitorArn?: string,
 *         MonitorName?: string,
 *         CreationDate?: string,
 *         LastUpdatedDate?: string,
 *         LastEvaluatedDate?: string,
 *         MonitorType?: 'CUSTOM'|'DIMENSIONAL',
 *         MonitorDimension?: 'COST_CATEGORY'|'LINKED_ACCOUNT'|'SERVICE'|'TAG',
 *         MonitorSpecification?: array{
 *             Or?: list<array>,
 *             And?: list<array>,
 *             Not?: array,
 *             Dimensions?: array,
 *             Tags?: array,
 *             CostCategories?: array,
 *             ...,
 *         },
 *         DimensionalValueCount?: int,
 *         ...,
 *     },
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAnomalySubscription(array $args = [])
 * @phpstan-method \Aws\Result createAnomalySubscription(array{
 *     AnomalySubscription?: array{
 *         SubscriptionArn?: string,
 *         AccountId?: string,
 *         MonitorArnList?: list<string>,
 *         Subscribers?: list<array>,
 *         Threshold?: float,
 *         Frequency?: 'DAILY'|'IMMEDIATE'|'WEEKLY',
 *         SubscriptionName?: string,
 *         ThresholdExpression?: array{
 *             Or?: list<array>,
 *             And?: list<array>,
 *             Not?: array,
 *             Dimensions?: array,
 *             Tags?: array,
 *             CostCategories?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAnomalySubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAnomalySubscriptionAsync(array{
 *     AnomalySubscription?: array{
 *         SubscriptionArn?: string,
 *         AccountId?: string,
 *         MonitorArnList?: list<string>,
 *         Subscribers?: list<array>,
 *         Threshold?: float,
 *         Frequency?: 'DAILY'|'IMMEDIATE'|'WEEKLY',
 *         SubscriptionName?: string,
 *         ThresholdExpression?: array{
 *             Or?: list<array>,
 *             And?: list<array>,
 *             Not?: array,
 *             Dimensions?: array,
 *             Tags?: array,
 *             CostCategories?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCostCategoryDefinition(array $args = [])
 * @phpstan-method \Aws\Result createCostCategoryDefinition(array{
 *     Name?: string,
 *     EffectiveStart?: string,
 *     RuleVersion?: 'CostCategoryExpression.v1',
 *     Rules?: list<array{Value?: string, Rule?: array, InheritedValue?: array, Type?: 'INHERITED_VALUE'|'REGULAR', ...}>,
 *     DefaultValue?: string,
 *     SplitChargeRules?: list<array{
 *         Source?: string,
 *         Targets?: list<string>,
 *         Method?: 'EVEN'|'FIXED'|'PROPORTIONAL',
 *         Parameters?: list<array>,
 *         ...,
 *     }>,
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCostCategoryDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCostCategoryDefinitionAsync(array{
 *     Name?: string,
 *     EffectiveStart?: string,
 *     RuleVersion?: 'CostCategoryExpression.v1',
 *     Rules?: list<array{Value?: string, Rule?: array, InheritedValue?: array, Type?: 'INHERITED_VALUE'|'REGULAR', ...}>,
 *     DefaultValue?: string,
 *     SplitChargeRules?: list<array{
 *         Source?: string,
 *         Targets?: list<string>,
 *         Method?: 'EVEN'|'FIXED'|'PROPORTIONAL',
 *         Parameters?: list<array>,
 *         ...,
 *     }>,
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAnomalyMonitor(array $args = [])
 * @phpstan-method \Aws\Result deleteAnomalyMonitor(array{MonitorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnomalyMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnomalyMonitorAsync(array{MonitorArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAnomalySubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteAnomalySubscription(array{SubscriptionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnomalySubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnomalySubscriptionAsync(array{SubscriptionArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCostCategoryDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteCostCategoryDefinition(array{CostCategoryArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCostCategoryDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCostCategoryDefinitionAsync(array{CostCategoryArn?: string, ...} $args = [])
 * @method \Aws\Result describeCostCategoryDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeCostCategoryDefinition(array{CostCategoryArn?: string, EffectiveOn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCostCategoryDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCostCategoryDefinitionAsync(array{CostCategoryArn?: string, EffectiveOn?: string, ...} $args = [])
 * @method \Aws\Result getAnomalies(array $args = [])
 * @phpstan-method \Aws\Result getAnomalies(array{
 *     MonitorArn?: string,
 *     DateInterval?: array{StartDate?: string, EndDate?: string, ...},
 *     Feedback?: 'NO'|'PLANNED_ACTIVITY'|'YES',
 *     TotalImpact?: array{
 *         NumericOperator?: 'BETWEEN'|'EQUAL'|'GREATER_THAN'|'GREATER_THAN_OR_EQUAL'|'LESS_THAN'|'LESS_THAN_OR_EQUAL',
 *         StartValue?: float,
 *         EndValue?: float,
 *         ...,
 *     },
 *     NextPageToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnomaliesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnomaliesAsync(array{
 *     MonitorArn?: string,
 *     DateInterval?: array{StartDate?: string, EndDate?: string, ...},
 *     Feedback?: 'NO'|'PLANNED_ACTIVITY'|'YES',
 *     TotalImpact?: array{
 *         NumericOperator?: 'BETWEEN'|'EQUAL'|'GREATER_THAN'|'GREATER_THAN_OR_EQUAL'|'LESS_THAN'|'LESS_THAN_OR_EQUAL',
 *         StartValue?: float,
 *         EndValue?: float,
 *         ...,
 *     },
 *     NextPageToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAnomalyMonitors(array $args = [])
 * @phpstan-method \Aws\Result getAnomalyMonitors(array{MonitorArnList?: list<string>, NextPageToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnomalyMonitorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnomalyMonitorsAsync(array{MonitorArnList?: list<string>, NextPageToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getAnomalySubscriptions(array $args = [])
 * @phpstan-method \Aws\Result getAnomalySubscriptions(array{SubscriptionArnList?: list<string>, MonitorArn?: string, NextPageToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnomalySubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnomalySubscriptionsAsync(array{SubscriptionArnList?: list<string>, MonitorArn?: string, NextPageToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getApproximateUsageRecords(array $args = [])
 * @phpstan-method \Aws\Result getApproximateUsageRecords(array{
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Services?: list<string>,
 *     ApproximationDimension?: 'RESOURCE'|'SERVICE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getApproximateUsageRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApproximateUsageRecordsAsync(array{
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Services?: list<string>,
 *     ApproximationDimension?: 'RESOURCE'|'SERVICE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCommitmentPurchaseAnalysis(array $args = [])
 * @phpstan-method \Aws\Result getCommitmentPurchaseAnalysis(array{AnalysisId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCommitmentPurchaseAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCommitmentPurchaseAnalysisAsync(array{AnalysisId?: string, ...} $args = [])
 * @method \Aws\Result getCostAndUsage(array $args = [])
 * @phpstan-method \Aws\Result getCostAndUsage(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Metrics?: list<string>,
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     BillingViewArn?: string,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostAndUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCostAndUsageAsync(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Metrics?: list<string>,
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     BillingViewArn?: string,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCostAndUsageComparisons(array $args = [])
 * @phpstan-method \Aws\Result getCostAndUsageComparisons(array{
 *     BillingViewArn?: string,
 *     BaselineTimePeriod?: array{Start?: string, End?: string, ...},
 *     ComparisonTimePeriod?: array{Start?: string, End?: string, ...},
 *     MetricForComparison?: string,
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     MaxResults?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostAndUsageComparisonsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCostAndUsageComparisonsAsync(array{
 *     BillingViewArn?: string,
 *     BaselineTimePeriod?: array{Start?: string, End?: string, ...},
 *     ComparisonTimePeriod?: array{Start?: string, End?: string, ...},
 *     MetricForComparison?: string,
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     MaxResults?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCostAndUsageWithResources(array $args = [])
 * @phpstan-method \Aws\Result getCostAndUsageWithResources(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Metrics?: list<string>,
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     BillingViewArn?: string,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostAndUsageWithResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCostAndUsageWithResourcesAsync(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Metrics?: list<string>,
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     BillingViewArn?: string,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCostCategories(array $args = [])
 * @phpstan-method \Aws\Result getCostCategories(array{
 *     SearchString?: string,
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     CostCategoryName?: string,
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SortBy?: list<array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...}>,
 *     BillingViewArn?: string,
 *     MaxResults?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostCategoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCostCategoriesAsync(array{
 *     SearchString?: string,
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     CostCategoryName?: string,
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SortBy?: list<array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...}>,
 *     BillingViewArn?: string,
 *     MaxResults?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCostComparisonDrivers(array $args = [])
 * @phpstan-method \Aws\Result getCostComparisonDrivers(array{
 *     BillingViewArn?: string,
 *     BaselineTimePeriod?: array{Start?: string, End?: string, ...},
 *     ComparisonTimePeriod?: array{Start?: string, End?: string, ...},
 *     MetricForComparison?: string,
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     MaxResults?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostComparisonDriversAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCostComparisonDriversAsync(array{
 *     BillingViewArn?: string,
 *     BaselineTimePeriod?: array{Start?: string, End?: string, ...},
 *     ComparisonTimePeriod?: array{Start?: string, End?: string, ...},
 *     MetricForComparison?: string,
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     MaxResults?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCostForecast(array $args = [])
 * @phpstan-method \Aws\Result getCostForecast(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Metric?: 'AMORTIZED_COST'|'BLENDED_COST'|'NET_AMORTIZED_COST'|'NET_UNBLENDED_COST'|'NORMALIZED_USAGE_AMOUNT'|'UNBLENDED_COST'|'USAGE_QUANTITY',
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     BillingViewArn?: string,
 *     PredictionIntervalLevel?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCostForecastAsync(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Metric?: 'AMORTIZED_COST'|'BLENDED_COST'|'NET_AMORTIZED_COST'|'NET_UNBLENDED_COST'|'NORMALIZED_USAGE_AMOUNT'|'UNBLENDED_COST'|'USAGE_QUANTITY',
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     BillingViewArn?: string,
 *     PredictionIntervalLevel?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDimensionValues(array $args = [])
 * @phpstan-method \Aws\Result getDimensionValues(array{
 *     SearchString?: string,
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Dimension?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *     Context?: 'COST_AND_USAGE'|'RESERVATIONS'|'SAVINGS_PLANS',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SortBy?: list<array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...}>,
 *     BillingViewArn?: string,
 *     MaxResults?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDimensionValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDimensionValuesAsync(array{
 *     SearchString?: string,
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Dimension?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *     Context?: 'COST_AND_USAGE'|'RESERVATIONS'|'SAVINGS_PLANS',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SortBy?: list<array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...}>,
 *     BillingViewArn?: string,
 *     MaxResults?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getReservationCoverage(array $args = [])
 * @phpstan-method \Aws\Result getReservationCoverage(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Metrics?: list<string>,
 *     NextPageToken?: string,
 *     SortBy?: array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getReservationCoverageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReservationCoverageAsync(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Metrics?: list<string>,
 *     NextPageToken?: string,
 *     SortBy?: array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getReservationPurchaseRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getReservationPurchaseRecommendation(array{
 *     AccountId?: string,
 *     Service?: string,
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     AccountScope?: 'LINKED'|'PAYER',
 *     LookbackPeriodInDays?: 'SEVEN_DAYS'|'SIXTY_DAYS'|'THIRTY_DAYS',
 *     TermInYears?: 'ONE_YEAR'|'THREE_YEARS',
 *     PaymentOption?: 'ALL_UPFRONT'|'HEAVY_UTILIZATION'|'LIGHT_UTILIZATION'|'MEDIUM_UTILIZATION'|'NO_UPFRONT'|'PARTIAL_UPFRONT',
 *     ServiceSpecification?: array{EC2Specification?: array{OfferingClass?: 'CONVERTIBLE'|'STANDARD', ...}, ...},
 *     PageSize?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getReservationPurchaseRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReservationPurchaseRecommendationAsync(array{
 *     AccountId?: string,
 *     Service?: string,
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     AccountScope?: 'LINKED'|'PAYER',
 *     LookbackPeriodInDays?: 'SEVEN_DAYS'|'SIXTY_DAYS'|'THIRTY_DAYS',
 *     TermInYears?: 'ONE_YEAR'|'THREE_YEARS',
 *     PaymentOption?: 'ALL_UPFRONT'|'HEAVY_UTILIZATION'|'LIGHT_UTILIZATION'|'MEDIUM_UTILIZATION'|'NO_UPFRONT'|'PARTIAL_UPFRONT',
 *     ServiceSpecification?: array{EC2Specification?: array{OfferingClass?: 'CONVERTIBLE'|'STANDARD', ...}, ...},
 *     PageSize?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getReservationUtilization(array $args = [])
 * @phpstan-method \Aws\Result getReservationUtilization(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SortBy?: array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     NextPageToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getReservationUtilizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReservationUtilizationAsync(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SortBy?: array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     NextPageToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRightsizingRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getRightsizingRecommendation(array{
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Configuration?: array{RecommendationTarget?: 'CROSS_INSTANCE_FAMILY'|'SAME_INSTANCE_FAMILY', BenefitsConsidered?: bool, ...},
 *     Service?: string,
 *     PageSize?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRightsizingRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRightsizingRecommendationAsync(array{
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Configuration?: array{RecommendationTarget?: 'CROSS_INSTANCE_FAMILY'|'SAME_INSTANCE_FAMILY', BenefitsConsidered?: bool, ...},
 *     Service?: string,
 *     PageSize?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSavingsPlanPurchaseRecommendationDetails(array $args = [])
 * @phpstan-method \Aws\Result getSavingsPlanPurchaseRecommendationDetails(array{RecommendationDetailId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSavingsPlanPurchaseRecommendationDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSavingsPlanPurchaseRecommendationDetailsAsync(array{RecommendationDetailId?: string, ...} $args = [])
 * @method \Aws\Result getSavingsPlansCoverage(array $args = [])
 * @phpstan-method \Aws\Result getSavingsPlansCoverage(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Metrics?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortBy?: array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSavingsPlansCoverageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSavingsPlansCoverageAsync(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     GroupBy?: list<array{Type?: 'COST_CATEGORY'|'DIMENSION'|'TAG', Key?: string, ...}>,
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Metrics?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortBy?: array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSavingsPlansPurchaseRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getSavingsPlansPurchaseRecommendation(array{
 *     SavingsPlansType?: 'COMPUTE_SP'|'DATABASE_SP'|'EC2_INSTANCE_SP'|'SAGEMAKER_SP',
 *     TermInYears?: 'ONE_YEAR'|'THREE_YEARS',
 *     PaymentOption?: 'ALL_UPFRONT'|'HEAVY_UTILIZATION'|'LIGHT_UTILIZATION'|'MEDIUM_UTILIZATION'|'NO_UPFRONT'|'PARTIAL_UPFRONT',
 *     AccountScope?: 'LINKED'|'PAYER',
 *     NextPageToken?: string,
 *     PageSize?: int,
 *     LookbackPeriodInDays?: 'SEVEN_DAYS'|'SIXTY_DAYS'|'THIRTY_DAYS',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSavingsPlansPurchaseRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSavingsPlansPurchaseRecommendationAsync(array{
 *     SavingsPlansType?: 'COMPUTE_SP'|'DATABASE_SP'|'EC2_INSTANCE_SP'|'SAGEMAKER_SP',
 *     TermInYears?: 'ONE_YEAR'|'THREE_YEARS',
 *     PaymentOption?: 'ALL_UPFRONT'|'HEAVY_UTILIZATION'|'LIGHT_UTILIZATION'|'MEDIUM_UTILIZATION'|'NO_UPFRONT'|'PARTIAL_UPFRONT',
 *     AccountScope?: 'LINKED'|'PAYER',
 *     NextPageToken?: string,
 *     PageSize?: int,
 *     LookbackPeriodInDays?: 'SEVEN_DAYS'|'SIXTY_DAYS'|'THIRTY_DAYS',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSavingsPlansUtilization(array $args = [])
 * @phpstan-method \Aws\Result getSavingsPlansUtilization(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SortBy?: array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSavingsPlansUtilizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSavingsPlansUtilizationAsync(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SortBy?: array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSavingsPlansUtilizationDetails(array $args = [])
 * @phpstan-method \Aws\Result getSavingsPlansUtilizationDetails(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DataType?: list<'AMORTIZED_COMMITMENT'|'ATTRIBUTES'|'SAVINGS'|'UTILIZATION'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortBy?: array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSavingsPlansUtilizationDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSavingsPlansUtilizationDetailsAsync(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DataType?: list<'AMORTIZED_COMMITMENT'|'ATTRIBUTES'|'SAVINGS'|'UTILIZATION'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortBy?: array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTags(array $args = [])
 * @phpstan-method \Aws\Result getTags(array{
 *     SearchString?: string,
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     TagKey?: string,
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SortBy?: list<array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...}>,
 *     BillingViewArn?: string,
 *     MaxResults?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTagsAsync(array{
 *     SearchString?: string,
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     TagKey?: string,
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SortBy?: list<array{Key?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...}>,
 *     BillingViewArn?: string,
 *     MaxResults?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getUsageForecast(array $args = [])
 * @phpstan-method \Aws\Result getUsageForecast(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Metric?: 'AMORTIZED_COST'|'BLENDED_COST'|'NET_AMORTIZED_COST'|'NET_UNBLENDED_COST'|'NORMALIZED_USAGE_AMOUNT'|'UNBLENDED_COST'|'USAGE_QUANTITY',
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     BillingViewArn?: string,
 *     PredictionIntervalLevel?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsageForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsageForecastAsync(array{
 *     TimePeriod?: array{Start?: string, End?: string, ...},
 *     Metric?: 'AMORTIZED_COST'|'BLENDED_COST'|'NET_AMORTIZED_COST'|'NET_UNBLENDED_COST'|'NORMALIZED_USAGE_AMOUNT'|'UNBLENDED_COST'|'USAGE_QUANTITY',
 *     Granularity?: 'DAILY'|'HOURLY'|'MONTHLY',
 *     Filter?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     BillingViewArn?: string,
 *     PredictionIntervalLevel?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCommitmentPurchaseAnalyses(array $args = [])
 * @phpstan-method \Aws\Result listCommitmentPurchaseAnalyses(array{
 *     AnalysisStatus?: 'FAILED'|'PROCESSING'|'SUCCEEDED',
 *     NextPageToken?: string,
 *     PageSize?: int,
 *     AnalysisIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCommitmentPurchaseAnalysesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCommitmentPurchaseAnalysesAsync(array{
 *     AnalysisStatus?: 'FAILED'|'PROCESSING'|'SUCCEEDED',
 *     NextPageToken?: string,
 *     PageSize?: int,
 *     AnalysisIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCostAllocationTagBackfillHistory(array $args = [])
 * @phpstan-method \Aws\Result listCostAllocationTagBackfillHistory(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCostAllocationTagBackfillHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCostAllocationTagBackfillHistoryAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listCostAllocationTags(array $args = [])
 * @phpstan-method \Aws\Result listCostAllocationTags(array{
 *     Status?: 'Active'|'Inactive',
 *     TagKeys?: list<string>,
 *     Type?: 'AWSGenerated'|'UserDefined',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCostAllocationTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCostAllocationTagsAsync(array{
 *     Status?: 'Active'|'Inactive',
 *     TagKeys?: list<string>,
 *     Type?: 'AWSGenerated'|'UserDefined',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCostCategoryDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listCostCategoryDefinitions(array{EffectiveOn?: string, NextToken?: string, MaxResults?: int, SupportedResourceTypes?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCostCategoryDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCostCategoryDefinitionsAsync(array{EffectiveOn?: string, NextToken?: string, MaxResults?: int, SupportedResourceTypes?: list<string>, ...} $args = [])
 * @method \Aws\Result listCostCategoryResourceAssociations(array $args = [])
 * @phpstan-method \Aws\Result listCostCategoryResourceAssociations(array{CostCategoryArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCostCategoryResourceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCostCategoryResourceAssociationsAsync(array{CostCategoryArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSavingsPlansPurchaseRecommendationGeneration(array $args = [])
 * @phpstan-method \Aws\Result listSavingsPlansPurchaseRecommendationGeneration(array{
 *     GenerationStatus?: 'FAILED'|'PROCESSING'|'SUCCEEDED',
 *     RecommendationIds?: list<string>,
 *     PageSize?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSavingsPlansPurchaseRecommendationGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSavingsPlansPurchaseRecommendationGenerationAsync(array{
 *     GenerationStatus?: 'FAILED'|'PROCESSING'|'SUCCEEDED',
 *     RecommendationIds?: list<string>,
 *     PageSize?: int,
 *     NextPageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result provideAnomalyFeedback(array $args = [])
 * @phpstan-method \Aws\Result provideAnomalyFeedback(array{AnomalyId?: string, Feedback?: 'NO'|'PLANNED_ACTIVITY'|'YES', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise provideAnomalyFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise provideAnomalyFeedbackAsync(array{AnomalyId?: string, Feedback?: 'NO'|'PLANNED_ACTIVITY'|'YES', ...} $args = [])
 * @method \Aws\Result startCommitmentPurchaseAnalysis(array $args = [])
 * @phpstan-method \Aws\Result startCommitmentPurchaseAnalysis(array{
 *     CommitmentPurchaseAnalysisConfiguration?: array{
 *         SavingsPlansPurchaseAnalysisConfiguration?: array{
 *             AccountScope?: 'LINKED'|'PAYER',
 *             AccountId?: string,
 *             AnalysisType?: 'CUSTOM_COMMITMENT'|'MAX_SAVINGS'|'TARGET_AVERAGE_COVERAGE',
 *             SavingsPlansToAdd?: list<array>,
 *             SavingsPlansToExclude?: list<string>,
 *             LookBackTimePeriod?: array,
 *             SavingsPlansTargetCoverage?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCommitmentPurchaseAnalysisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCommitmentPurchaseAnalysisAsync(array{
 *     CommitmentPurchaseAnalysisConfiguration?: array{
 *         SavingsPlansPurchaseAnalysisConfiguration?: array{
 *             AccountScope?: 'LINKED'|'PAYER',
 *             AccountId?: string,
 *             AnalysisType?: 'CUSTOM_COMMITMENT'|'MAX_SAVINGS'|'TARGET_AVERAGE_COVERAGE',
 *             SavingsPlansToAdd?: list<array>,
 *             SavingsPlansToExclude?: list<string>,
 *             LookBackTimePeriod?: array,
 *             SavingsPlansTargetCoverage?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCostAllocationTagBackfill(array $args = [])
 * @phpstan-method \Aws\Result startCostAllocationTagBackfill(array{BackfillFrom?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCostAllocationTagBackfillAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCostAllocationTagBackfillAsync(array{BackfillFrom?: string, ...} $args = [])
 * @method \Aws\Result startSavingsPlansPurchaseRecommendationGeneration(array $args = [])
 * @phpstan-method \Aws\Result startSavingsPlansPurchaseRecommendationGeneration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startSavingsPlansPurchaseRecommendationGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSavingsPlansPurchaseRecommendationGenerationAsync(array{...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, ResourceTags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, ResourceTags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, ResourceTagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, ResourceTagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAnomalyMonitor(array $args = [])
 * @phpstan-method \Aws\Result updateAnomalyMonitor(array{MonitorArn?: string, MonitorName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnomalyMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnomalyMonitorAsync(array{MonitorArn?: string, MonitorName?: string, ...} $args = [])
 * @method \Aws\Result updateAnomalySubscription(array $args = [])
 * @phpstan-method \Aws\Result updateAnomalySubscription(array{
 *     SubscriptionArn?: string,
 *     Threshold?: float,
 *     Frequency?: 'DAILY'|'IMMEDIATE'|'WEEKLY',
 *     MonitorArnList?: list<string>,
 *     Subscribers?: list<array{Address?: string, Type?: 'EMAIL'|'SNS', Status?: 'CONFIRMED'|'DECLINED', ...}>,
 *     SubscriptionName?: string,
 *     ThresholdExpression?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnomalySubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnomalySubscriptionAsync(array{
 *     SubscriptionArn?: string,
 *     Threshold?: float,
 *     Frequency?: 'DAILY'|'IMMEDIATE'|'WEEKLY',
 *     MonitorArnList?: list<string>,
 *     Subscribers?: list<array{Address?: string, Type?: 'EMAIL'|'SNS', Status?: 'CONFIRMED'|'DECLINED', ...}>,
 *     SubscriptionName?: string,
 *     ThresholdExpression?: array{
 *         Or?: list<array>,
 *         And?: list<array>,
 *         Not?: array,
 *         Dimensions?: array{
 *             Key?: 'AGREEMENT_END_DATE_TIME_AFTER'|'AGREEMENT_END_DATE_TIME_BEFORE'|'ANOMALY_TOTAL_IMPACT_ABSOLUTE'|'ANOMALY_TOTAL_IMPACT_PERCENTAGE'|'AZ'|'BILLING_ENTITY'|'CACHE_ENGINE'|'DATABASE_ENGINE'|'DEPLOYMENT_OPTION'|'INSTANCE_TYPE'|'INSTANCE_TYPE_FAMILY'|'INVOICING_ENTITY'|'LEGAL_ENTITY_NAME'|'LINKED_ACCOUNT'|'LINKED_ACCOUNT_NAME'|'OPERATING_SYSTEM'|'OPERATION'|'PAYER_ACCOUNT'|'PAYMENT_OPTION'|'PLATFORM'|'PURCHASE_TYPE'|'RECORD_TYPE'|'REGION'|'RESERVATION_ID'|'RESOURCE_ID'|'RIGHTSIZING_TYPE'|'SAVINGS_PLANS_TYPE'|'SAVINGS_PLAN_ARN'|'SCOPE'|'SERVICE'|'SERVICE_CODE'|'SUBSCRIPTION_ID'|'TENANCY'|'USAGE_TYPE'|'USAGE_TYPE_GROUP',
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         Tags?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         CostCategories?: array{
 *             Key?: string,
 *             Values?: list<string>,
 *             MatchOptions?: list<'ABSENT'|'CASE_INSENSITIVE'|'CASE_SENSITIVE'|'CONTAINS'|'ENDS_WITH'|'EQUALS'|'GREATER_THAN_OR_EQUAL'|'STARTS_WITH'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCostAllocationTagsStatus(array $args = [])
 * @phpstan-method \Aws\Result updateCostAllocationTagsStatus(array{CostAllocationTagsStatus?: list<array{TagKey?: string, Status?: 'Active'|'Inactive', ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCostAllocationTagsStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCostAllocationTagsStatusAsync(array{CostAllocationTagsStatus?: list<array{TagKey?: string, Status?: 'Active'|'Inactive', ...}>, ...} $args = [])
 * @method \Aws\Result updateCostCategoryDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateCostCategoryDefinition(array{
 *     CostCategoryArn?: string,
 *     EffectiveStart?: string,
 *     RuleVersion?: 'CostCategoryExpression.v1',
 *     Rules?: list<array{Value?: string, Rule?: array, InheritedValue?: array, Type?: 'INHERITED_VALUE'|'REGULAR', ...}>,
 *     DefaultValue?: string,
 *     SplitChargeRules?: list<array{
 *         Source?: string,
 *         Targets?: list<string>,
 *         Method?: 'EVEN'|'FIXED'|'PROPORTIONAL',
 *         Parameters?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCostCategoryDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCostCategoryDefinitionAsync(array{
 *     CostCategoryArn?: string,
 *     EffectiveStart?: string,
 *     RuleVersion?: 'CostCategoryExpression.v1',
 *     Rules?: list<array{Value?: string, Rule?: array, InheritedValue?: array, Type?: 'INHERITED_VALUE'|'REGULAR', ...}>,
 *     DefaultValue?: string,
 *     SplitChargeRules?: list<array{
 *         Source?: string,
 *         Targets?: list<string>,
 *         Method?: 'EVEN'|'FIXED'|'PROPORTIONAL',
 *         Parameters?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 */
class CostExplorerClient extends AwsClient {}
