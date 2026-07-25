<?php
namespace Aws\Budgets;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Budgets** service.
 * @method \Aws\Result createBudget(array $args = [])
 * @phpstan-method \Aws\Result createBudget(array{
 *     AccountId?: string,
 *     Budget?: array{
 *         BudgetName?: string,
 *         BudgetLimit?: array{Amount?: string, Unit?: string, ...},
 *         PlannedBudgetLimits?: array<string, array>,
 *         CostFilters?: array<string, list<string>>,
 *         CostTypes?: array{
 *             IncludeTax?: bool,
 *             IncludeSubscription?: bool,
 *             UseBlended?: bool,
 *             IncludeRefund?: bool,
 *             IncludeCredit?: bool,
 *             IncludeUpfront?: bool,
 *             IncludeRecurring?: bool,
 *             IncludeOtherSubscription?: bool,
 *             IncludeSupport?: bool,
 *             IncludeDiscount?: bool,
 *             UseAmortized?: bool,
 *             ...,
 *         },
 *         TimeUnit?: 'ANNUALLY'|'CUSTOM'|'DAILY'|'MONTHLY'|'QUARTERLY',
 *         TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *         CalculatedSpend?: array{ActualSpend?: array, ForecastedSpend?: array, ...},
 *         BudgetType?: 'COST'|'RI_COVERAGE'|'RI_UTILIZATION'|'SAVINGS_PLANS_COVERAGE'|'SAVINGS_PLANS_UTILIZATION'|'USAGE',
 *         LastUpdatedTime?: int|string|\DateTimeInterface,
 *         AutoAdjustData?: array{
 *             AutoAdjustType?: 'FORECAST'|'HISTORICAL',
 *             HistoricalOptions?: array,
 *             LastAutoAdjustTime?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         FilterExpression?: array{
 *             Or?: list<array>,
 *             And?: list<array>,
 *             Not?: array,
 *             Dimensions?: array,
 *             Tags?: array,
 *             CostCategories?: array,
 *             ...,
 *         },
 *         Metrics?: list<'AmortizedCost'|'BlendedCost'|'Hours'|'NetAmortizedCost'|'NetUnblendedCost'|'NormalizedUsageAmount'|'UnblendedCost'|'UsageQuantity'>,
 *         BillingViewArn?: string,
 *         HealthStatus?: array{
 *             Status?: 'HEALTHY'|'UNHEALTHY',
 *             StatusReason?: 'BILLING_VIEW_NO_ACCESS'|'BILLING_VIEW_UNHEALTHY'|'FILTER_INVALID'|'MULTI_YEAR_HISTORICAL_DATA_DISABLED',
 *             LastUpdatedTime?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     NotificationsWithSubscribers?: list<array{Notification?: array, Subscribers?: list<array>, ...}>,
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBudgetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBudgetAsync(array{
 *     AccountId?: string,
 *     Budget?: array{
 *         BudgetName?: string,
 *         BudgetLimit?: array{Amount?: string, Unit?: string, ...},
 *         PlannedBudgetLimits?: array<string, array>,
 *         CostFilters?: array<string, list<string>>,
 *         CostTypes?: array{
 *             IncludeTax?: bool,
 *             IncludeSubscription?: bool,
 *             UseBlended?: bool,
 *             IncludeRefund?: bool,
 *             IncludeCredit?: bool,
 *             IncludeUpfront?: bool,
 *             IncludeRecurring?: bool,
 *             IncludeOtherSubscription?: bool,
 *             IncludeSupport?: bool,
 *             IncludeDiscount?: bool,
 *             UseAmortized?: bool,
 *             ...,
 *         },
 *         TimeUnit?: 'ANNUALLY'|'CUSTOM'|'DAILY'|'MONTHLY'|'QUARTERLY',
 *         TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *         CalculatedSpend?: array{ActualSpend?: array, ForecastedSpend?: array, ...},
 *         BudgetType?: 'COST'|'RI_COVERAGE'|'RI_UTILIZATION'|'SAVINGS_PLANS_COVERAGE'|'SAVINGS_PLANS_UTILIZATION'|'USAGE',
 *         LastUpdatedTime?: int|string|\DateTimeInterface,
 *         AutoAdjustData?: array{
 *             AutoAdjustType?: 'FORECAST'|'HISTORICAL',
 *             HistoricalOptions?: array,
 *             LastAutoAdjustTime?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         FilterExpression?: array{
 *             Or?: list<array>,
 *             And?: list<array>,
 *             Not?: array,
 *             Dimensions?: array,
 *             Tags?: array,
 *             CostCategories?: array,
 *             ...,
 *         },
 *         Metrics?: list<'AmortizedCost'|'BlendedCost'|'Hours'|'NetAmortizedCost'|'NetUnblendedCost'|'NormalizedUsageAmount'|'UnblendedCost'|'UsageQuantity'>,
 *         BillingViewArn?: string,
 *         HealthStatus?: array{
 *             Status?: 'HEALTHY'|'UNHEALTHY',
 *             StatusReason?: 'BILLING_VIEW_NO_ACCESS'|'BILLING_VIEW_UNHEALTHY'|'FILTER_INVALID'|'MULTI_YEAR_HISTORICAL_DATA_DISABLED',
 *             LastUpdatedTime?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     NotificationsWithSubscribers?: list<array{Notification?: array, Subscribers?: list<array>, ...}>,
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBudgetAction(array $args = [])
 * @phpstan-method \Aws\Result createBudgetAction(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     NotificationType?: 'ACTUAL'|'FORECASTED',
 *     ActionType?: 'APPLY_IAM_POLICY'|'APPLY_SCP_POLICY'|'RUN_SSM_DOCUMENTS',
 *     ActionThreshold?: array{ActionThresholdValue?: float, ActionThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE', ...},
 *     Definition?: array{
 *         IamActionDefinition?: array{PolicyArn?: string, Roles?: list<string>, Groups?: list<string>, Users?: list<string>, ...},
 *         ScpActionDefinition?: array{PolicyId?: string, TargetIds?: list<string>, ...},
 *         SsmActionDefinition?: array{
 *             ActionSubType?: 'STOP_EC2_INSTANCES'|'STOP_RDS_INSTANCES',
 *             Region?: string,
 *             InstanceIds?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ExecutionRoleArn?: string,
 *     ApprovalModel?: 'AUTOMATIC'|'MANUAL',
 *     Subscribers?: list<array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...}>,
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBudgetActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBudgetActionAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     NotificationType?: 'ACTUAL'|'FORECASTED',
 *     ActionType?: 'APPLY_IAM_POLICY'|'APPLY_SCP_POLICY'|'RUN_SSM_DOCUMENTS',
 *     ActionThreshold?: array{ActionThresholdValue?: float, ActionThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE', ...},
 *     Definition?: array{
 *         IamActionDefinition?: array{PolicyArn?: string, Roles?: list<string>, Groups?: list<string>, Users?: list<string>, ...},
 *         ScpActionDefinition?: array{PolicyId?: string, TargetIds?: list<string>, ...},
 *         SsmActionDefinition?: array{
 *             ActionSubType?: 'STOP_EC2_INSTANCES'|'STOP_RDS_INSTANCES',
 *             Region?: string,
 *             InstanceIds?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ExecutionRoleArn?: string,
 *     ApprovalModel?: 'AUTOMATIC'|'MANUAL',
 *     Subscribers?: list<array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...}>,
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNotification(array $args = [])
 * @phpstan-method \Aws\Result createNotification(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     Subscribers?: list<array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotificationAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     Subscribers?: list<array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubscriber(array $args = [])
 * @phpstan-method \Aws\Result createSubscriber(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     Subscriber?: array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriberAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     Subscriber?: array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBudget(array $args = [])
 * @phpstan-method \Aws\Result deleteBudget(array{AccountId?: string, BudgetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBudgetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBudgetAsync(array{AccountId?: string, BudgetName?: string, ...} $args = [])
 * @method \Aws\Result deleteBudgetAction(array $args = [])
 * @phpstan-method \Aws\Result deleteBudgetAction(array{AccountId?: string, BudgetName?: string, ActionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBudgetActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBudgetActionAsync(array{AccountId?: string, BudgetName?: string, ActionId?: string, ...} $args = [])
 * @method \Aws\Result deleteNotification(array $args = [])
 * @phpstan-method \Aws\Result deleteNotification(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotificationAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSubscriber(array $args = [])
 * @phpstan-method \Aws\Result deleteSubscriber(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     Subscriber?: array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubscriberAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     Subscriber?: array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeBudget(array $args = [])
 * @phpstan-method \Aws\Result describeBudget(array{AccountId?: string, BudgetName?: string, ShowFilterExpression?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBudgetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBudgetAsync(array{AccountId?: string, BudgetName?: string, ShowFilterExpression?: bool, ...} $args = [])
 * @method \Aws\Result describeBudgetAction(array $args = [])
 * @phpstan-method \Aws\Result describeBudgetAction(array{AccountId?: string, BudgetName?: string, ActionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBudgetActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBudgetActionAsync(array{AccountId?: string, BudgetName?: string, ActionId?: string, ...} $args = [])
 * @method \Aws\Result describeBudgetActionHistories(array $args = [])
 * @phpstan-method \Aws\Result describeBudgetActionHistories(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     ActionId?: string,
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBudgetActionHistoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBudgetActionHistoriesAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     ActionId?: string,
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeBudgetActionsForAccount(array $args = [])
 * @phpstan-method \Aws\Result describeBudgetActionsForAccount(array{AccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBudgetActionsForAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBudgetActionsForAccountAsync(array{AccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeBudgetActionsForBudget(array $args = [])
 * @phpstan-method \Aws\Result describeBudgetActionsForBudget(array{AccountId?: string, BudgetName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBudgetActionsForBudgetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBudgetActionsForBudgetAsync(array{AccountId?: string, BudgetName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeBudgetNotificationsForAccount(array $args = [])
 * @phpstan-method \Aws\Result describeBudgetNotificationsForAccount(array{AccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBudgetNotificationsForAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBudgetNotificationsForAccountAsync(array{AccountId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeBudgetPerformanceHistory(array $args = [])
 * @phpstan-method \Aws\Result describeBudgetPerformanceHistory(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBudgetPerformanceHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBudgetPerformanceHistoryAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeBudgets(array $args = [])
 * @phpstan-method \Aws\Result describeBudgets(array{AccountId?: string, MaxResults?: int, NextToken?: string, ShowFilterExpression?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBudgetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBudgetsAsync(array{AccountId?: string, MaxResults?: int, NextToken?: string, ShowFilterExpression?: bool, ...} $args = [])
 * @method \Aws\Result describeNotificationsForBudget(array $args = [])
 * @phpstan-method \Aws\Result describeNotificationsForBudget(array{AccountId?: string, BudgetName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNotificationsForBudgetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotificationsForBudgetAsync(array{AccountId?: string, BudgetName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeSubscribersForNotification(array $args = [])
 * @phpstan-method \Aws\Result describeSubscribersForNotification(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSubscribersForNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSubscribersForNotificationAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result executeBudgetAction(array $args = [])
 * @phpstan-method \Aws\Result executeBudgetAction(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     ActionId?: string,
 *     ExecutionType?: 'APPROVE_BUDGET_ACTION'|'RESET_BUDGET_ACTION'|'RETRY_BUDGET_ACTION'|'REVERSE_BUDGET_ACTION',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeBudgetActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeBudgetActionAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     ActionId?: string,
 *     ExecutionType?: 'APPROVE_BUDGET_ACTION'|'RESET_BUDGET_ACTION'|'RETRY_BUDGET_ACTION'|'REVERSE_BUDGET_ACTION',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, ResourceTags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, ResourceTags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, ResourceTagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, ResourceTagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBudget(array $args = [])
 * @phpstan-method \Aws\Result updateBudget(array{
 *     AccountId?: string,
 *     NewBudget?: array{
 *         BudgetName?: string,
 *         BudgetLimit?: array{Amount?: string, Unit?: string, ...},
 *         PlannedBudgetLimits?: array<string, array>,
 *         CostFilters?: array<string, list<string>>,
 *         CostTypes?: array{
 *             IncludeTax?: bool,
 *             IncludeSubscription?: bool,
 *             UseBlended?: bool,
 *             IncludeRefund?: bool,
 *             IncludeCredit?: bool,
 *             IncludeUpfront?: bool,
 *             IncludeRecurring?: bool,
 *             IncludeOtherSubscription?: bool,
 *             IncludeSupport?: bool,
 *             IncludeDiscount?: bool,
 *             UseAmortized?: bool,
 *             ...,
 *         },
 *         TimeUnit?: 'ANNUALLY'|'CUSTOM'|'DAILY'|'MONTHLY'|'QUARTERLY',
 *         TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *         CalculatedSpend?: array{ActualSpend?: array, ForecastedSpend?: array, ...},
 *         BudgetType?: 'COST'|'RI_COVERAGE'|'RI_UTILIZATION'|'SAVINGS_PLANS_COVERAGE'|'SAVINGS_PLANS_UTILIZATION'|'USAGE',
 *         LastUpdatedTime?: int|string|\DateTimeInterface,
 *         AutoAdjustData?: array{
 *             AutoAdjustType?: 'FORECAST'|'HISTORICAL',
 *             HistoricalOptions?: array,
 *             LastAutoAdjustTime?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         FilterExpression?: array{
 *             Or?: list<array>,
 *             And?: list<array>,
 *             Not?: array,
 *             Dimensions?: array,
 *             Tags?: array,
 *             CostCategories?: array,
 *             ...,
 *         },
 *         Metrics?: list<'AmortizedCost'|'BlendedCost'|'Hours'|'NetAmortizedCost'|'NetUnblendedCost'|'NormalizedUsageAmount'|'UnblendedCost'|'UsageQuantity'>,
 *         BillingViewArn?: string,
 *         HealthStatus?: array{
 *             Status?: 'HEALTHY'|'UNHEALTHY',
 *             StatusReason?: 'BILLING_VIEW_NO_ACCESS'|'BILLING_VIEW_UNHEALTHY'|'FILTER_INVALID'|'MULTI_YEAR_HISTORICAL_DATA_DISABLED',
 *             LastUpdatedTime?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBudgetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBudgetAsync(array{
 *     AccountId?: string,
 *     NewBudget?: array{
 *         BudgetName?: string,
 *         BudgetLimit?: array{Amount?: string, Unit?: string, ...},
 *         PlannedBudgetLimits?: array<string, array>,
 *         CostFilters?: array<string, list<string>>,
 *         CostTypes?: array{
 *             IncludeTax?: bool,
 *             IncludeSubscription?: bool,
 *             UseBlended?: bool,
 *             IncludeRefund?: bool,
 *             IncludeCredit?: bool,
 *             IncludeUpfront?: bool,
 *             IncludeRecurring?: bool,
 *             IncludeOtherSubscription?: bool,
 *             IncludeSupport?: bool,
 *             IncludeDiscount?: bool,
 *             UseAmortized?: bool,
 *             ...,
 *         },
 *         TimeUnit?: 'ANNUALLY'|'CUSTOM'|'DAILY'|'MONTHLY'|'QUARTERLY',
 *         TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *         CalculatedSpend?: array{ActualSpend?: array, ForecastedSpend?: array, ...},
 *         BudgetType?: 'COST'|'RI_COVERAGE'|'RI_UTILIZATION'|'SAVINGS_PLANS_COVERAGE'|'SAVINGS_PLANS_UTILIZATION'|'USAGE',
 *         LastUpdatedTime?: int|string|\DateTimeInterface,
 *         AutoAdjustData?: array{
 *             AutoAdjustType?: 'FORECAST'|'HISTORICAL',
 *             HistoricalOptions?: array,
 *             LastAutoAdjustTime?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         FilterExpression?: array{
 *             Or?: list<array>,
 *             And?: list<array>,
 *             Not?: array,
 *             Dimensions?: array,
 *             Tags?: array,
 *             CostCategories?: array,
 *             ...,
 *         },
 *         Metrics?: list<'AmortizedCost'|'BlendedCost'|'Hours'|'NetAmortizedCost'|'NetUnblendedCost'|'NormalizedUsageAmount'|'UnblendedCost'|'UsageQuantity'>,
 *         BillingViewArn?: string,
 *         HealthStatus?: array{
 *             Status?: 'HEALTHY'|'UNHEALTHY',
 *             StatusReason?: 'BILLING_VIEW_NO_ACCESS'|'BILLING_VIEW_UNHEALTHY'|'FILTER_INVALID'|'MULTI_YEAR_HISTORICAL_DATA_DISABLED',
 *             LastUpdatedTime?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBudgetAction(array $args = [])
 * @phpstan-method \Aws\Result updateBudgetAction(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     ActionId?: string,
 *     NotificationType?: 'ACTUAL'|'FORECASTED',
 *     ActionThreshold?: array{ActionThresholdValue?: float, ActionThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE', ...},
 *     Definition?: array{
 *         IamActionDefinition?: array{PolicyArn?: string, Roles?: list<string>, Groups?: list<string>, Users?: list<string>, ...},
 *         ScpActionDefinition?: array{PolicyId?: string, TargetIds?: list<string>, ...},
 *         SsmActionDefinition?: array{
 *             ActionSubType?: 'STOP_EC2_INSTANCES'|'STOP_RDS_INSTANCES',
 *             Region?: string,
 *             InstanceIds?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ExecutionRoleArn?: string,
 *     ApprovalModel?: 'AUTOMATIC'|'MANUAL',
 *     Subscribers?: list<array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBudgetActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBudgetActionAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     ActionId?: string,
 *     NotificationType?: 'ACTUAL'|'FORECASTED',
 *     ActionThreshold?: array{ActionThresholdValue?: float, ActionThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE', ...},
 *     Definition?: array{
 *         IamActionDefinition?: array{PolicyArn?: string, Roles?: list<string>, Groups?: list<string>, Users?: list<string>, ...},
 *         ScpActionDefinition?: array{PolicyId?: string, TargetIds?: list<string>, ...},
 *         SsmActionDefinition?: array{
 *             ActionSubType?: 'STOP_EC2_INSTANCES'|'STOP_RDS_INSTANCES',
 *             Region?: string,
 *             InstanceIds?: list<string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ExecutionRoleArn?: string,
 *     ApprovalModel?: 'AUTOMATIC'|'MANUAL',
 *     Subscribers?: list<array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNotification(array $args = [])
 * @phpstan-method \Aws\Result updateNotification(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     OldNotification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     NewNotification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotificationAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     OldNotification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     NewNotification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSubscriber(array $args = [])
 * @phpstan-method \Aws\Result updateSubscriber(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     OldSubscriber?: array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...},
 *     NewSubscriber?: array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriberAsync(array{
 *     AccountId?: string,
 *     BudgetName?: string,
 *     Notification?: array{
 *         NotificationType?: 'ACTUAL'|'FORECASTED',
 *         ComparisonOperator?: 'EQUAL_TO'|'GREATER_THAN'|'LESS_THAN',
 *         Threshold?: float,
 *         ThresholdType?: 'ABSOLUTE_VALUE'|'PERCENTAGE',
 *         NotificationState?: 'ALARM'|'OK',
 *         ...,
 *     },
 *     OldSubscriber?: array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...},
 *     NewSubscriber?: array{SubscriptionType?: 'EMAIL'|'SNS', Address?: string, ...},
 *     ...,
 * } $args = [])
 */
class BudgetsClient extends AwsClient {}
