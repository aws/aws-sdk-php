<?php
namespace Aws\DevOpsGuru;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon DevOps Guru** service.
 * @method \Aws\Result addNotificationChannel(array $args = [])
 * @phpstan-method \Aws\Result addNotificationChannel(array{
 *     Config?: array{
 *         Sns?: array{TopicArn?: string, ...},
 *         Filters?: array{
 *             Severities?: list<'HIGH'|'LOW'|'MEDIUM'>,
 *             MessageTypes?: list<'CLOSED_INSIGHT'|'NEW_ASSOCIATION'|'NEW_INSIGHT'|'NEW_RECOMMENDATION'|'SEVERITY_UPGRADED'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addNotificationChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addNotificationChannelAsync(array{
 *     Config?: array{
 *         Sns?: array{TopicArn?: string, ...},
 *         Filters?: array{
 *             Severities?: list<'HIGH'|'LOW'|'MEDIUM'>,
 *             MessageTypes?: list<'CLOSED_INSIGHT'|'NEW_ASSOCIATION'|'NEW_INSIGHT'|'NEW_RECOMMENDATION'|'SEVERITY_UPGRADED'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteInsight(array $args = [])
 * @phpstan-method \Aws\Result deleteInsight(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInsightAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInsightAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describeAccountHealth(array $args = [])
 * @phpstan-method \Aws\Result describeAccountHealth(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountHealthAsync(array{...} $args = [])
 * @method \Aws\Result describeAccountOverview(array $args = [])
 * @phpstan-method \Aws\Result describeAccountOverview(array{FromTime?: int|string|\DateTimeInterface, ToTime?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountOverviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountOverviewAsync(array{FromTime?: int|string|\DateTimeInterface, ToTime?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result describeAnomaly(array $args = [])
 * @phpstan-method \Aws\Result describeAnomaly(array{Id?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAnomalyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAnomalyAsync(array{Id?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeEventSourcesConfig(array $args = [])
 * @phpstan-method \Aws\Result describeEventSourcesConfig(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventSourcesConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventSourcesConfigAsync(array{...} $args = [])
 * @method \Aws\Result describeFeedback(array $args = [])
 * @phpstan-method \Aws\Result describeFeedback(array{InsightId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFeedbackAsync(array{InsightId?: string, ...} $args = [])
 * @method \Aws\Result describeInsight(array $args = [])
 * @phpstan-method \Aws\Result describeInsight(array{Id?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInsightAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInsightAsync(array{Id?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result describeOrganizationHealth(array $args = [])
 * @phpstan-method \Aws\Result describeOrganizationHealth(array{AccountIds?: list<string>, OrganizationalUnitIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationHealthAsync(array{AccountIds?: list<string>, OrganizationalUnitIds?: list<string>, ...} $args = [])
 * @method \Aws\Result describeOrganizationOverview(array $args = [])
 * @phpstan-method \Aws\Result describeOrganizationOverview(array{
 *     FromTime?: int|string|\DateTimeInterface,
 *     ToTime?: int|string|\DateTimeInterface,
 *     AccountIds?: list<string>,
 *     OrganizationalUnitIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationOverviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationOverviewAsync(array{
 *     FromTime?: int|string|\DateTimeInterface,
 *     ToTime?: int|string|\DateTimeInterface,
 *     AccountIds?: list<string>,
 *     OrganizationalUnitIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOrganizationResourceCollectionHealth(array $args = [])
 * @phpstan-method \Aws\Result describeOrganizationResourceCollectionHealth(array{
 *     OrganizationResourceCollectionType?: 'AWS_ACCOUNT'|'AWS_CLOUD_FORMATION'|'AWS_SERVICE'|'AWS_TAGS',
 *     AccountIds?: list<string>,
 *     OrganizationalUnitIds?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationResourceCollectionHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationResourceCollectionHealthAsync(array{
 *     OrganizationResourceCollectionType?: 'AWS_ACCOUNT'|'AWS_CLOUD_FORMATION'|'AWS_SERVICE'|'AWS_TAGS',
 *     AccountIds?: list<string>,
 *     OrganizationalUnitIds?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeResourceCollectionHealth(array $args = [])
 * @phpstan-method \Aws\Result describeResourceCollectionHealth(array{ResourceCollectionType?: 'AWS_CLOUD_FORMATION'|'AWS_SERVICE'|'AWS_TAGS', NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourceCollectionHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourceCollectionHealthAsync(array{ResourceCollectionType?: 'AWS_CLOUD_FORMATION'|'AWS_SERVICE'|'AWS_TAGS', NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeServiceIntegration(array $args = [])
 * @phpstan-method \Aws\Result describeServiceIntegration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceIntegrationAsync(array{...} $args = [])
 * @method \Aws\Result getCostEstimation(array $args = [])
 * @phpstan-method \Aws\Result getCostEstimation(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCostEstimationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCostEstimationAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result getResourceCollection(array $args = [])
 * @phpstan-method \Aws\Result getResourceCollection(array{ResourceCollectionType?: 'AWS_CLOUD_FORMATION'|'AWS_SERVICE'|'AWS_TAGS', NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceCollectionAsync(array{ResourceCollectionType?: 'AWS_CLOUD_FORMATION'|'AWS_SERVICE'|'AWS_TAGS', NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAnomaliesForInsight(array $args = [])
 * @phpstan-method \Aws\Result listAnomaliesForInsight(array{
 *     InsightId?: string,
 *     StartTimeRange?: array{FromTime?: int|string|\DateTimeInterface, ToTime?: int|string|\DateTimeInterface, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AccountId?: string,
 *     Filters?: array{
 *         ServiceCollection?: array{
 *             ServiceNames?: list<'API_GATEWAY'|'APPLICATION_ELB'|'AUTO_SCALING_GROUP'|'CLOUD_FRONT'|'DYNAMO_DB'|'EC2'|'ECS'|'EKS'|'ELASTIC_BEANSTALK'|'ELASTI_CACHE'|'ELB'|'ES'|'KINESIS'|'LAMBDA'|'NAT_GATEWAY'|'NETWORK_ELB'|'RDS'|'REDSHIFT'|'ROUTE_53'|'S3'|'SAGE_MAKER'|'SNS'|'SQS'|'STEP_FUNCTIONS'|'SWF'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnomaliesForInsightAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnomaliesForInsightAsync(array{
 *     InsightId?: string,
 *     StartTimeRange?: array{FromTime?: int|string|\DateTimeInterface, ToTime?: int|string|\DateTimeInterface, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AccountId?: string,
 *     Filters?: array{
 *         ServiceCollection?: array{
 *             ServiceNames?: list<'API_GATEWAY'|'APPLICATION_ELB'|'AUTO_SCALING_GROUP'|'CLOUD_FRONT'|'DYNAMO_DB'|'EC2'|'ECS'|'EKS'|'ELASTIC_BEANSTALK'|'ELASTI_CACHE'|'ELB'|'ES'|'KINESIS'|'LAMBDA'|'NAT_GATEWAY'|'NETWORK_ELB'|'RDS'|'REDSHIFT'|'ROUTE_53'|'S3'|'SAGE_MAKER'|'SNS'|'SQS'|'STEP_FUNCTIONS'|'SWF'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAnomalousLogGroups(array $args = [])
 * @phpstan-method \Aws\Result listAnomalousLogGroups(array{InsightId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnomalousLogGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnomalousLogGroupsAsync(array{InsightId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listEvents(array $args = [])
 * @phpstan-method \Aws\Result listEvents(array{
 *     Filters?: array{
 *         InsightId?: string,
 *         EventTimeRange?: array{FromTime?: int|string|\DateTimeInterface, ToTime?: int|string|\DateTimeInterface, ...},
 *         EventClass?: 'CONFIG_CHANGE'|'DEPLOYMENT'|'INFRASTRUCTURE'|'SCHEMA_CHANGE'|'SECURITY_CHANGE',
 *         EventSource?: string,
 *         DataSource?: 'AWS_CLOUD_TRAIL'|'AWS_CODE_DEPLOY',
 *         ResourceCollection?: array{CloudFormation?: array, Tags?: list<array>, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventsAsync(array{
 *     Filters?: array{
 *         InsightId?: string,
 *         EventTimeRange?: array{FromTime?: int|string|\DateTimeInterface, ToTime?: int|string|\DateTimeInterface, ...},
 *         EventClass?: 'CONFIG_CHANGE'|'DEPLOYMENT'|'INFRASTRUCTURE'|'SCHEMA_CHANGE'|'SECURITY_CHANGE',
 *         EventSource?: string,
 *         DataSource?: 'AWS_CLOUD_TRAIL'|'AWS_CODE_DEPLOY',
 *         ResourceCollection?: array{CloudFormation?: array, Tags?: list<array>, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInsights(array $args = [])
 * @phpstan-method \Aws\Result listInsights(array{
 *     StatusFilter?: array{
 *         Ongoing?: array{Type?: 'PROACTIVE'|'REACTIVE', ...},
 *         Closed?: array{Type?: 'PROACTIVE'|'REACTIVE', EndTimeRange?: array, ...},
 *         Any?: array{Type?: 'PROACTIVE'|'REACTIVE', StartTimeRange?: array, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInsightsAsync(array{
 *     StatusFilter?: array{
 *         Ongoing?: array{Type?: 'PROACTIVE'|'REACTIVE', ...},
 *         Closed?: array{Type?: 'PROACTIVE'|'REACTIVE', EndTimeRange?: array, ...},
 *         Any?: array{Type?: 'PROACTIVE'|'REACTIVE', StartTimeRange?: array, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMonitoredResources(array $args = [])
 * @phpstan-method \Aws\Result listMonitoredResources(array{
 *     Filters?: array{
 *         ResourcePermission?: 'FULL_PERMISSION'|'MISSING_PERMISSION',
 *         ResourceTypeFilters?: list<'CLOUDFRONT_DISTRIBUTION'|'DYNAMODB_TABLE'|'EC2_NAT_GATEWAY'|'ECS_CLUSTER'|'ECS_SERVICE'|'EKS_CLUSTER'|'ELASTICACHE_CACHE_CLUSTER'|'ELASTICSEARCH_DOMAIN'|'ELASTIC_BEANSTALK_ENVIRONMENT'|'ELASTIC_LOAD_BALANCER_LOAD_BALANCER'|'ELASTIC_LOAD_BALANCING_V2_LOAD_BALANCER'|'ELASTIC_LOAD_BALANCING_V2_TARGET_GROUP'|'KINESIS_STREAM'|'LAMBDA_FUNCTION'|'LOG_GROUPS'|'OPEN_SEARCH_SERVICE_DOMAIN'|'RDS_DB_CLUSTER'|'RDS_DB_INSTANCE'|'REDSHIFT_CLUSTER'|'ROUTE53_HEALTH_CHECK'|'ROUTE53_HOSTED_ZONE'|'S3_BUCKET'|'SAGEMAKER_ENDPOINT'|'SNS_TOPIC'|'SQS_QUEUE'|'STEP_FUNCTIONS_ACTIVITY'|'STEP_FUNCTIONS_STATE_MACHINE'>,
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMonitoredResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitoredResourcesAsync(array{
 *     Filters?: array{
 *         ResourcePermission?: 'FULL_PERMISSION'|'MISSING_PERMISSION',
 *         ResourceTypeFilters?: list<'CLOUDFRONT_DISTRIBUTION'|'DYNAMODB_TABLE'|'EC2_NAT_GATEWAY'|'ECS_CLUSTER'|'ECS_SERVICE'|'EKS_CLUSTER'|'ELASTICACHE_CACHE_CLUSTER'|'ELASTICSEARCH_DOMAIN'|'ELASTIC_BEANSTALK_ENVIRONMENT'|'ELASTIC_LOAD_BALANCER_LOAD_BALANCER'|'ELASTIC_LOAD_BALANCING_V2_LOAD_BALANCER'|'ELASTIC_LOAD_BALANCING_V2_TARGET_GROUP'|'KINESIS_STREAM'|'LAMBDA_FUNCTION'|'LOG_GROUPS'|'OPEN_SEARCH_SERVICE_DOMAIN'|'RDS_DB_CLUSTER'|'RDS_DB_INSTANCE'|'REDSHIFT_CLUSTER'|'ROUTE53_HEALTH_CHECK'|'ROUTE53_HOSTED_ZONE'|'S3_BUCKET'|'SAGEMAKER_ENDPOINT'|'SNS_TOPIC'|'SQS_QUEUE'|'STEP_FUNCTIONS_ACTIVITY'|'STEP_FUNCTIONS_STATE_MACHINE'>,
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotificationChannels(array $args = [])
 * @phpstan-method \Aws\Result listNotificationChannels(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotificationChannelsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listOrganizationInsights(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationInsights(array{
 *     StatusFilter?: array{
 *         Ongoing?: array{Type?: 'PROACTIVE'|'REACTIVE', ...},
 *         Closed?: array{Type?: 'PROACTIVE'|'REACTIVE', EndTimeRange?: array, ...},
 *         Any?: array{Type?: 'PROACTIVE'|'REACTIVE', StartTimeRange?: array, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     AccountIds?: list<string>,
 *     OrganizationalUnitIds?: list<string>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationInsightsAsync(array{
 *     StatusFilter?: array{
 *         Ongoing?: array{Type?: 'PROACTIVE'|'REACTIVE', ...},
 *         Closed?: array{Type?: 'PROACTIVE'|'REACTIVE', EndTimeRange?: array, ...},
 *         Any?: array{Type?: 'PROACTIVE'|'REACTIVE', StartTimeRange?: array, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     AccountIds?: list<string>,
 *     OrganizationalUnitIds?: list<string>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listRecommendations(array{
 *     InsightId?: string,
 *     NextToken?: string,
 *     Locale?: 'DE_DE'|'EN_GB'|'EN_US'|'ES_ES'|'FR_FR'|'IT_IT'|'JA_JP'|'KO_KR'|'PT_BR'|'ZH_CN'|'ZH_TW',
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array{
 *     InsightId?: string,
 *     NextToken?: string,
 *     Locale?: 'DE_DE'|'EN_GB'|'EN_US'|'ES_ES'|'FR_FR'|'IT_IT'|'JA_JP'|'KO_KR'|'PT_BR'|'ZH_CN'|'ZH_TW',
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putFeedback(array $args = [])
 * @phpstan-method \Aws\Result putFeedback(array{
 *     InsightFeedback?: array{
 *         Id?: string,
 *         Feedback?: 'ALERT_TOO_SENSITIVE'|'DATA_INCORRECT'|'DATA_NOISY_ANOMALY'|'RECOMMENDATION_USEFUL'|'VALID_COLLECTION',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFeedbackAsync(array{
 *     InsightFeedback?: array{
 *         Id?: string,
 *         Feedback?: 'ALERT_TOO_SENSITIVE'|'DATA_INCORRECT'|'DATA_NOISY_ANOMALY'|'RECOMMENDATION_USEFUL'|'VALID_COLLECTION',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeNotificationChannel(array $args = [])
 * @phpstan-method \Aws\Result removeNotificationChannel(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeNotificationChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeNotificationChannelAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result searchInsights(array $args = [])
 * @phpstan-method \Aws\Result searchInsights(array{
 *     StartTimeRange?: array{FromTime?: int|string|\DateTimeInterface, ToTime?: int|string|\DateTimeInterface, ...},
 *     Filters?: array{
 *         Severities?: list<'HIGH'|'LOW'|'MEDIUM'>,
 *         Statuses?: list<'CLOSED'|'ONGOING'>,
 *         ResourceCollection?: array{CloudFormation?: array, Tags?: list<array>, ...},
 *         ServiceCollection?: array{
 *             ServiceNames?: list<'API_GATEWAY'|'APPLICATION_ELB'|'AUTO_SCALING_GROUP'|'CLOUD_FRONT'|'DYNAMO_DB'|'EC2'|'ECS'|'EKS'|'ELASTIC_BEANSTALK'|'ELASTI_CACHE'|'ELB'|'ES'|'KINESIS'|'LAMBDA'|'NAT_GATEWAY'|'NETWORK_ELB'|'RDS'|'REDSHIFT'|'ROUTE_53'|'S3'|'SAGE_MAKER'|'SNS'|'SQS'|'STEP_FUNCTIONS'|'SWF'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Type?: 'PROACTIVE'|'REACTIVE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchInsightsAsync(array{
 *     StartTimeRange?: array{FromTime?: int|string|\DateTimeInterface, ToTime?: int|string|\DateTimeInterface, ...},
 *     Filters?: array{
 *         Severities?: list<'HIGH'|'LOW'|'MEDIUM'>,
 *         Statuses?: list<'CLOSED'|'ONGOING'>,
 *         ResourceCollection?: array{CloudFormation?: array, Tags?: list<array>, ...},
 *         ServiceCollection?: array{
 *             ServiceNames?: list<'API_GATEWAY'|'APPLICATION_ELB'|'AUTO_SCALING_GROUP'|'CLOUD_FRONT'|'DYNAMO_DB'|'EC2'|'ECS'|'EKS'|'ELASTIC_BEANSTALK'|'ELASTI_CACHE'|'ELB'|'ES'|'KINESIS'|'LAMBDA'|'NAT_GATEWAY'|'NETWORK_ELB'|'RDS'|'REDSHIFT'|'ROUTE_53'|'S3'|'SAGE_MAKER'|'SNS'|'SQS'|'STEP_FUNCTIONS'|'SWF'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Type?: 'PROACTIVE'|'REACTIVE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchOrganizationInsights(array $args = [])
 * @phpstan-method \Aws\Result searchOrganizationInsights(array{
 *     AccountIds?: list<string>,
 *     StartTimeRange?: array{FromTime?: int|string|\DateTimeInterface, ToTime?: int|string|\DateTimeInterface, ...},
 *     Filters?: array{
 *         Severities?: list<'HIGH'|'LOW'|'MEDIUM'>,
 *         Statuses?: list<'CLOSED'|'ONGOING'>,
 *         ResourceCollection?: array{CloudFormation?: array, Tags?: list<array>, ...},
 *         ServiceCollection?: array{
 *             ServiceNames?: list<'API_GATEWAY'|'APPLICATION_ELB'|'AUTO_SCALING_GROUP'|'CLOUD_FRONT'|'DYNAMO_DB'|'EC2'|'ECS'|'EKS'|'ELASTIC_BEANSTALK'|'ELASTI_CACHE'|'ELB'|'ES'|'KINESIS'|'LAMBDA'|'NAT_GATEWAY'|'NETWORK_ELB'|'RDS'|'REDSHIFT'|'ROUTE_53'|'S3'|'SAGE_MAKER'|'SNS'|'SQS'|'STEP_FUNCTIONS'|'SWF'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Type?: 'PROACTIVE'|'REACTIVE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchOrganizationInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchOrganizationInsightsAsync(array{
 *     AccountIds?: list<string>,
 *     StartTimeRange?: array{FromTime?: int|string|\DateTimeInterface, ToTime?: int|string|\DateTimeInterface, ...},
 *     Filters?: array{
 *         Severities?: list<'HIGH'|'LOW'|'MEDIUM'>,
 *         Statuses?: list<'CLOSED'|'ONGOING'>,
 *         ResourceCollection?: array{CloudFormation?: array, Tags?: list<array>, ...},
 *         ServiceCollection?: array{
 *             ServiceNames?: list<'API_GATEWAY'|'APPLICATION_ELB'|'AUTO_SCALING_GROUP'|'CLOUD_FRONT'|'DYNAMO_DB'|'EC2'|'ECS'|'EKS'|'ELASTIC_BEANSTALK'|'ELASTI_CACHE'|'ELB'|'ES'|'KINESIS'|'LAMBDA'|'NAT_GATEWAY'|'NETWORK_ELB'|'RDS'|'REDSHIFT'|'ROUTE_53'|'S3'|'SAGE_MAKER'|'SNS'|'SQS'|'STEP_FUNCTIONS'|'SWF'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Type?: 'PROACTIVE'|'REACTIVE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCostEstimation(array $args = [])
 * @phpstan-method \Aws\Result startCostEstimation(array{
 *     ResourceCollection?: array{CloudFormation?: array{StackNames?: list<string>, ...}, Tags?: list<array>, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCostEstimationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCostEstimationAsync(array{
 *     ResourceCollection?: array{CloudFormation?: array{StackNames?: list<string>, ...}, Tags?: list<array>, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventSourcesConfig(array $args = [])
 * @phpstan-method \Aws\Result updateEventSourcesConfig(array{EventSources?: array{AmazonCodeGuruProfiler?: array{Status?: 'DISABLED'|'ENABLED', ...}, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventSourcesConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventSourcesConfigAsync(array{EventSources?: array{AmazonCodeGuruProfiler?: array{Status?: 'DISABLED'|'ENABLED', ...}, ...}, ...} $args = [])
 * @method \Aws\Result updateResourceCollection(array $args = [])
 * @phpstan-method \Aws\Result updateResourceCollection(array{
 *     Action?: 'ADD'|'REMOVE',
 *     ResourceCollection?: array{CloudFormation?: array{StackNames?: list<string>, ...}, Tags?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceCollectionAsync(array{
 *     Action?: 'ADD'|'REMOVE',
 *     ResourceCollection?: array{CloudFormation?: array{StackNames?: list<string>, ...}, Tags?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceIntegration(array $args = [])
 * @phpstan-method \Aws\Result updateServiceIntegration(array{
 *     ServiceIntegration?: array{
 *         OpsCenter?: array{OptInStatus?: 'DISABLED'|'ENABLED', ...},
 *         LogsAnomalyDetection?: array{OptInStatus?: 'DISABLED'|'ENABLED', ...},
 *         KMSServerSideEncryption?: array{
 *             KMSKeyId?: string,
 *             OptInStatus?: 'DISABLED'|'ENABLED',
 *             Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KEY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceIntegrationAsync(array{
 *     ServiceIntegration?: array{
 *         OpsCenter?: array{OptInStatus?: 'DISABLED'|'ENABLED', ...},
 *         LogsAnomalyDetection?: array{OptInStatus?: 'DISABLED'|'ENABLED', ...},
 *         KMSServerSideEncryption?: array{
 *             KMSKeyId?: string,
 *             OptInStatus?: 'DISABLED'|'ENABLED',
 *             Type?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KEY',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class DevOpsGuruClient extends AwsClient {}
