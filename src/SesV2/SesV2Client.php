<?php
namespace Aws\SesV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Simple Email Service** service.
 * @method \Aws\Result batchGetMetricData(array $args = [])
 * @phpstan-method \Aws\Result batchGetMetricData(array{
 *     Queries?: list<array{
 *         Id?: string,
 *         Namespace?: 'VDM',
 *         Metric?: 'CLICK'|'COMPLAINT'|'DELIVERY'|'DELIVERY_CLICK'|'DELIVERY_COMPLAINT'|'DELIVERY_OPEN'|'OPEN'|'PERMANENT_BOUNCE'|'SEND'|'TRANSIENT_BOUNCE',
 *         Dimensions?: array<string, string>,
 *         StartDate?: int|string|\DateTimeInterface,
 *         EndDate?: int|string|\DateTimeInterface,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetMetricDataAsync(array{
 *     Queries?: list<array{
 *         Id?: string,
 *         Namespace?: 'VDM',
 *         Metric?: 'CLICK'|'COMPLAINT'|'DELIVERY'|'DELIVERY_CLICK'|'DELIVERY_COMPLAINT'|'DELIVERY_OPEN'|'OPEN'|'PERMANENT_BOUNCE'|'SEND'|'TRANSIENT_BOUNCE',
 *         Dimensions?: array<string, string>,
 *         StartDate?: int|string|\DateTimeInterface,
 *         EndDate?: int|string|\DateTimeInterface,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelExportJob(array $args = [])
 * @phpstan-method \Aws\Result cancelExportJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelExportJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result createConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationSet(array{
 *     ConfigurationSetName?: string,
 *     TrackingOptions?: array{CustomRedirectDomain?: string, HttpsPolicy?: 'OPTIONAL'|'REQUIRE'|'REQUIRE_OPEN_ONLY', ...},
 *     DeliveryOptions?: array{TlsPolicy?: 'OPTIONAL'|'REQUIRE', SendingPoolName?: string, MaxDeliverySeconds?: int, ...},
 *     ReputationOptions?: array{ReputationMetricsEnabled?: bool, LastFreshStart?: int|string|\DateTimeInterface, ...},
 *     SendingOptions?: array{SendingEnabled?: bool, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SuppressionOptions?: array{
 *         SuppressedReasons?: list<'BOUNCE'|'COMPLAINT'>,
 *         SuppressionScope?: 'ACCOUNT'|'TENANT',
 *         ValidationOptions?: array{ConditionThreshold?: array, ...},
 *         ...,
 *     },
 *     VdmOptions?: array{
 *         DashboardOptions?: array{EngagementMetrics?: 'DISABLED'|'ENABLED', ...},
 *         GuardianOptions?: array{OptimizedSharedDelivery?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ArchivingOptions?: array{ArchiveArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array{
 *     ConfigurationSetName?: string,
 *     TrackingOptions?: array{CustomRedirectDomain?: string, HttpsPolicy?: 'OPTIONAL'|'REQUIRE'|'REQUIRE_OPEN_ONLY', ...},
 *     DeliveryOptions?: array{TlsPolicy?: 'OPTIONAL'|'REQUIRE', SendingPoolName?: string, MaxDeliverySeconds?: int, ...},
 *     ReputationOptions?: array{ReputationMetricsEnabled?: bool, LastFreshStart?: int|string|\DateTimeInterface, ...},
 *     SendingOptions?: array{SendingEnabled?: bool, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SuppressionOptions?: array{
 *         SuppressedReasons?: list<'BOUNCE'|'COMPLAINT'>,
 *         SuppressionScope?: 'ACCOUNT'|'TENANT',
 *         ValidationOptions?: array{ConditionThreshold?: array, ...},
 *         ...,
 *     },
 *     VdmOptions?: array{
 *         DashboardOptions?: array{EngagementMetrics?: 'DISABLED'|'ENABLED', ...},
 *         GuardianOptions?: array{OptimizedSharedDelivery?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ArchivingOptions?: array{ArchiveArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfigurationSetEventDestination(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationSetEventDestination(array{
 *     ConfigurationSetName?: string,
 *     EventDestinationName?: string,
 *     EventDestination?: array{
 *         Enabled?: bool,
 *         MatchingEventTypes?: list<'BOUNCE'|'CLICK'|'COMPLAINT'|'DELIVERY'|'DELIVERY_DELAY'|'OPEN'|'REJECT'|'RENDERING_FAILURE'|'SEND'|'SUBSCRIPTION'>,
 *         KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SnsDestination?: array{TopicArn?: string, ...},
 *         EventBridgeDestination?: array{EventBusArn?: string, ...},
 *         PinpointDestination?: array{ApplicationArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationSetEventDestinationAsync(array{
 *     ConfigurationSetName?: string,
 *     EventDestinationName?: string,
 *     EventDestination?: array{
 *         Enabled?: bool,
 *         MatchingEventTypes?: list<'BOUNCE'|'CLICK'|'COMPLAINT'|'DELIVERY'|'DELIVERY_DELAY'|'OPEN'|'REJECT'|'RENDERING_FAILURE'|'SEND'|'SUBSCRIPTION'>,
 *         KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SnsDestination?: array{TopicArn?: string, ...},
 *         EventBridgeDestination?: array{EventBusArn?: string, ...},
 *         PinpointDestination?: array{ApplicationArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContact(array $args = [])
 * @phpstan-method \Aws\Result createContact(array{
 *     ContactListName?: string,
 *     EmailAddress?: string,
 *     TopicPreferences?: list<array{TopicName?: string, SubscriptionStatus?: 'OPT_IN'|'OPT_OUT', ...}>,
 *     UnsubscribeAll?: bool,
 *     AttributesData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactAsync(array{
 *     ContactListName?: string,
 *     EmailAddress?: string,
 *     TopicPreferences?: list<array{TopicName?: string, SubscriptionStatus?: 'OPT_IN'|'OPT_OUT', ...}>,
 *     UnsubscribeAll?: bool,
 *     AttributesData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContactList(array $args = [])
 * @phpstan-method \Aws\Result createContactList(array{
 *     ContactListName?: string,
 *     Topics?: list<array{
 *         TopicName?: string,
 *         DisplayName?: string,
 *         Description?: string,
 *         DefaultSubscriptionStatus?: 'OPT_IN'|'OPT_OUT',
 *         ...,
 *     }>,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactListAsync(array{
 *     ContactListName?: string,
 *     Topics?: list<array{
 *         TopicName?: string,
 *         DisplayName?: string,
 *         Description?: string,
 *         DefaultSubscriptionStatus?: 'OPT_IN'|'OPT_OUT',
 *         ...,
 *     }>,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomVerificationEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result createCustomVerificationEmailTemplate(array{
 *     TemplateName?: string,
 *     FromEmailAddress?: string,
 *     TemplateSubject?: string,
 *     TemplateContent?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SuccessRedirectionURL?: string,
 *     FailureRedirectionURL?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomVerificationEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomVerificationEmailTemplateAsync(array{
 *     TemplateName?: string,
 *     FromEmailAddress?: string,
 *     TemplateSubject?: string,
 *     TemplateContent?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SuccessRedirectionURL?: string,
 *     FailureRedirectionURL?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDedicatedIpPool(array $args = [])
 * @phpstan-method \Aws\Result createDedicatedIpPool(array{
 *     PoolName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ScalingMode?: 'MANAGED'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDedicatedIpPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDedicatedIpPoolAsync(array{
 *     PoolName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ScalingMode?: 'MANAGED'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeliverabilityTestReport(array $args = [])
 * @phpstan-method \Aws\Result createDeliverabilityTestReport(array{
 *     ReportName?: string,
 *     FromEmailAddress?: string,
 *     Content?: array{
 *         Simple?: array{Subject?: array, Body?: array, Headers?: list<array>, Attachments?: list<array>, ...},
 *         Raw?: array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         Template?: array{
 *             TemplateName?: string,
 *             TemplateArn?: string,
 *             TemplateContent?: array,
 *             TemplateData?: string,
 *             Headers?: list<array>,
 *             Attachments?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeliverabilityTestReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeliverabilityTestReportAsync(array{
 *     ReportName?: string,
 *     FromEmailAddress?: string,
 *     Content?: array{
 *         Simple?: array{Subject?: array, Body?: array, Headers?: list<array>, Attachments?: list<array>, ...},
 *         Raw?: array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         Template?: array{
 *             TemplateName?: string,
 *             TemplateArn?: string,
 *             TemplateContent?: array,
 *             TemplateData?: string,
 *             Headers?: list<array>,
 *             Attachments?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEmailIdentity(array $args = [])
 * @phpstan-method \Aws\Result createEmailIdentity(array{
 *     EmailIdentity?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DkimSigningAttributes?: array{
 *         DomainSigningSelector?: string,
 *         DomainSigningPrivateKey?: string,
 *         NextSigningKeyLength?: 'RSA_1024_BIT'|'RSA_2048_BIT',
 *         DomainSigningAttributesOrigin?: 'AWS_SES'|'AWS_SES_AF_SOUTH_1'|'AWS_SES_AP_NORTHEAST_1'|'AWS_SES_AP_NORTHEAST_2'|'AWS_SES_AP_NORTHEAST_3'|'AWS_SES_AP_SOUTHEAST_1'|'AWS_SES_AP_SOUTHEAST_2'|'AWS_SES_AP_SOUTHEAST_3'|'AWS_SES_AP_SOUTHEAST_5'|'AWS_SES_AP_SOUTH_1'|'AWS_SES_AP_SOUTH_2'|'AWS_SES_CA_CENTRAL_1'|'AWS_SES_CA_WEST_1'|'AWS_SES_EU_CENTRAL_1'|'AWS_SES_EU_CENTRAL_2'|'AWS_SES_EU_NORTH_1'|'AWS_SES_EU_SOUTH_1'|'AWS_SES_EU_WEST_1'|'AWS_SES_EU_WEST_2'|'AWS_SES_EU_WEST_3'|'AWS_SES_IL_CENTRAL_1'|'AWS_SES_ME_CENTRAL_1'|'AWS_SES_ME_SOUTH_1'|'AWS_SES_SA_EAST_1'|'AWS_SES_US_EAST_1'|'AWS_SES_US_EAST_2'|'AWS_SES_US_GOV_EAST_1'|'AWS_SES_US_GOV_WEST_1'|'AWS_SES_US_WEST_1'|'AWS_SES_US_WEST_2'|'EXTERNAL',
 *         ...,
 *     },
 *     ConfigurationSetName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEmailIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEmailIdentityAsync(array{
 *     EmailIdentity?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     DkimSigningAttributes?: array{
 *         DomainSigningSelector?: string,
 *         DomainSigningPrivateKey?: string,
 *         NextSigningKeyLength?: 'RSA_1024_BIT'|'RSA_2048_BIT',
 *         DomainSigningAttributesOrigin?: 'AWS_SES'|'AWS_SES_AF_SOUTH_1'|'AWS_SES_AP_NORTHEAST_1'|'AWS_SES_AP_NORTHEAST_2'|'AWS_SES_AP_NORTHEAST_3'|'AWS_SES_AP_SOUTHEAST_1'|'AWS_SES_AP_SOUTHEAST_2'|'AWS_SES_AP_SOUTHEAST_3'|'AWS_SES_AP_SOUTHEAST_5'|'AWS_SES_AP_SOUTH_1'|'AWS_SES_AP_SOUTH_2'|'AWS_SES_CA_CENTRAL_1'|'AWS_SES_CA_WEST_1'|'AWS_SES_EU_CENTRAL_1'|'AWS_SES_EU_CENTRAL_2'|'AWS_SES_EU_NORTH_1'|'AWS_SES_EU_SOUTH_1'|'AWS_SES_EU_WEST_1'|'AWS_SES_EU_WEST_2'|'AWS_SES_EU_WEST_3'|'AWS_SES_IL_CENTRAL_1'|'AWS_SES_ME_CENTRAL_1'|'AWS_SES_ME_SOUTH_1'|'AWS_SES_SA_EAST_1'|'AWS_SES_US_EAST_1'|'AWS_SES_US_EAST_2'|'AWS_SES_US_GOV_EAST_1'|'AWS_SES_US_GOV_WEST_1'|'AWS_SES_US_WEST_1'|'AWS_SES_US_WEST_2'|'EXTERNAL',
 *         ...,
 *     },
 *     ConfigurationSetName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEmailIdentityPolicy(array $args = [])
 * @phpstan-method \Aws\Result createEmailIdentityPolicy(array{EmailIdentity?: string, PolicyName?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createEmailIdentityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEmailIdentityPolicyAsync(array{EmailIdentity?: string, PolicyName?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result createEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result createEmailTemplate(array{
 *     TemplateName?: string,
 *     TemplateContent?: array{Subject?: string, Text?: string, Html?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEmailTemplateAsync(array{
 *     TemplateName?: string,
 *     TemplateContent?: array{Subject?: string, Text?: string, Html?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExportJob(array $args = [])
 * @phpstan-method \Aws\Result createExportJob(array{
 *     ExportDataSource?: array{
 *         MetricsDataSource?: array{
 *             Dimensions?: array<string, list<string>>,
 *             Namespace?: 'VDM',
 *             Metrics?: list<array>,
 *             StartDate?: int|string|\DateTimeInterface,
 *             EndDate?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         MessageInsightsDataSource?: array{
 *             StartDate?: int|string|\DateTimeInterface,
 *             EndDate?: int|string|\DateTimeInterface,
 *             Include?: array,
 *             Exclude?: array,
 *             MaxResults?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ExportDestination?: array{DataFormat?: 'CSV'|'JSON', S3Url?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExportJobAsync(array{
 *     ExportDataSource?: array{
 *         MetricsDataSource?: array{
 *             Dimensions?: array<string, list<string>>,
 *             Namespace?: 'VDM',
 *             Metrics?: list<array>,
 *             StartDate?: int|string|\DateTimeInterface,
 *             EndDate?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         MessageInsightsDataSource?: array{
 *             StartDate?: int|string|\DateTimeInterface,
 *             EndDate?: int|string|\DateTimeInterface,
 *             Include?: array,
 *             Exclude?: array,
 *             MaxResults?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ExportDestination?: array{DataFormat?: 'CSV'|'JSON', S3Url?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createImportJob(array $args = [])
 * @phpstan-method \Aws\Result createImportJob(array{
 *     ImportDestination?: array{
 *         SuppressionListDestination?: array{SuppressionListImportAction?: 'DELETE'|'PUT', ...},
 *         ContactListDestination?: array{ContactListName?: string, ContactListImportAction?: 'DELETE'|'PUT', ...},
 *         ...,
 *     },
 *     ImportDataSource?: array{S3Url?: string, DataFormat?: 'CSV'|'JSON', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImportJobAsync(array{
 *     ImportDestination?: array{
 *         SuppressionListDestination?: array{SuppressionListImportAction?: 'DELETE'|'PUT', ...},
 *         ContactListDestination?: array{ContactListName?: string, ContactListImportAction?: 'DELETE'|'PUT', ...},
 *         ...,
 *     },
 *     ImportDataSource?: array{S3Url?: string, DataFormat?: 'CSV'|'JSON', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMultiRegionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createMultiRegionEndpoint(array{
 *     EndpointName?: string,
 *     Details?: array{RoutesDetails?: list<array>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMultiRegionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMultiRegionEndpointAsync(array{
 *     EndpointName?: string,
 *     Details?: array{RoutesDetails?: list<array>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTenant(array $args = [])
 * @phpstan-method \Aws\Result createTenant(array{
 *     TenantName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SuppressionAttributes?: array{SuppressedReasons?: list<'BOUNCE'|'COMPLAINT'>, SuppressionScope?: 'ACCOUNT'|'TENANT', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTenantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTenantAsync(array{
 *     TenantName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SuppressionAttributes?: array{SuppressedReasons?: list<'BOUNCE'|'COMPLAINT'>, SuppressionScope?: 'ACCOUNT'|'TENANT', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTenantResourceAssociation(array $args = [])
 * @phpstan-method \Aws\Result createTenantResourceAssociation(array{TenantName?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTenantResourceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTenantResourceAssociationAsync(array{TenantName?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationSet(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result deleteConfigurationSetEventDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationSetEventDestination(array{ConfigurationSetName?: string, EventDestinationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationSetEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationSetEventDestinationAsync(array{ConfigurationSetName?: string, EventDestinationName?: string, ...} $args = [])
 * @method \Aws\Result deleteContact(array $args = [])
 * @phpstan-method \Aws\Result deleteContact(array{ContactListName?: string, EmailAddress?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactAsync(array{ContactListName?: string, EmailAddress?: string, ...} $args = [])
 * @method \Aws\Result deleteContactList(array $args = [])
 * @phpstan-method \Aws\Result deleteContactList(array{ContactListName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactListAsync(array{ContactListName?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomVerificationEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomVerificationEmailTemplate(array{TemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomVerificationEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomVerificationEmailTemplateAsync(array{TemplateName?: string, ...} $args = [])
 * @method \Aws\Result deleteDedicatedIpPool(array $args = [])
 * @phpstan-method \Aws\Result deleteDedicatedIpPool(array{PoolName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDedicatedIpPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDedicatedIpPoolAsync(array{PoolName?: string, ...} $args = [])
 * @method \Aws\Result deleteEmailIdentity(array $args = [])
 * @phpstan-method \Aws\Result deleteEmailIdentity(array{EmailIdentity?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEmailIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEmailIdentityAsync(array{EmailIdentity?: string, ...} $args = [])
 * @method \Aws\Result deleteEmailIdentityPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteEmailIdentityPolicy(array{EmailIdentity?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEmailIdentityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEmailIdentityPolicyAsync(array{EmailIdentity?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result deleteEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteEmailTemplate(array{TemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEmailTemplateAsync(array{TemplateName?: string, ...} $args = [])
 * @method \Aws\Result deleteMultiRegionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteMultiRegionEndpoint(array{EndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMultiRegionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMultiRegionEndpointAsync(array{EndpointName?: string, ...} $args = [])
 * @method \Aws\Result deleteSuppressedDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteSuppressedDestination(array{EmailAddress?: string, TenantName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSuppressedDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSuppressedDestinationAsync(array{EmailAddress?: string, TenantName?: string, ...} $args = [])
 * @method \Aws\Result deleteTenant(array $args = [])
 * @phpstan-method \Aws\Result deleteTenant(array{TenantName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTenantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTenantAsync(array{TenantName?: string, ...} $args = [])
 * @method \Aws\Result deleteTenantResourceAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteTenantResourceAssociation(array{TenantName?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTenantResourceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTenantResourceAssociationAsync(array{TenantName?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getAccount(array $args = [])
 * @phpstan-method \Aws\Result getAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountAsync(array{...} $args = [])
 * @method \Aws\Result getBlacklistReports(array $args = [])
 * @phpstan-method \Aws\Result getBlacklistReports(array{BlacklistItemNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBlacklistReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBlacklistReportsAsync(array{BlacklistItemNames?: list<string>, ...} $args = [])
 * @method \Aws\Result getConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result getConfigurationSet(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationSetAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result getConfigurationSetEventDestinations(array $args = [])
 * @phpstan-method \Aws\Result getConfigurationSetEventDestinations(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationSetEventDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationSetEventDestinationsAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result getContact(array $args = [])
 * @phpstan-method \Aws\Result getContact(array{ContactListName?: string, EmailAddress?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactAsync(array{ContactListName?: string, EmailAddress?: string, ...} $args = [])
 * @method \Aws\Result getContactList(array $args = [])
 * @phpstan-method \Aws\Result getContactList(array{ContactListName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactListAsync(array{ContactListName?: string, ...} $args = [])
 * @method \Aws\Result getCustomVerificationEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result getCustomVerificationEmailTemplate(array{TemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomVerificationEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCustomVerificationEmailTemplateAsync(array{TemplateName?: string, ...} $args = [])
 * @method \Aws\Result getDedicatedIp(array $args = [])
 * @phpstan-method \Aws\Result getDedicatedIp(array{Ip?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDedicatedIpAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDedicatedIpAsync(array{Ip?: string, ...} $args = [])
 * @method \Aws\Result getDedicatedIpPool(array $args = [])
 * @phpstan-method \Aws\Result getDedicatedIpPool(array{PoolName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDedicatedIpPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDedicatedIpPoolAsync(array{PoolName?: string, ...} $args = [])
 * @method \Aws\Result getDedicatedIps(array $args = [])
 * @phpstan-method \Aws\Result getDedicatedIps(array{PoolName?: string, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDedicatedIpsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDedicatedIpsAsync(array{PoolName?: string, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result getDeliverabilityDashboardOptions(array $args = [])
 * @phpstan-method \Aws\Result getDeliverabilityDashboardOptions(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeliverabilityDashboardOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeliverabilityDashboardOptionsAsync(array{...} $args = [])
 * @method \Aws\Result getDeliverabilityTestReport(array $args = [])
 * @phpstan-method \Aws\Result getDeliverabilityTestReport(array{ReportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeliverabilityTestReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeliverabilityTestReportAsync(array{ReportId?: string, ...} $args = [])
 * @method \Aws\Result getDomainDeliverabilityCampaign(array $args = [])
 * @phpstan-method \Aws\Result getDomainDeliverabilityCampaign(array{CampaignId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainDeliverabilityCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainDeliverabilityCampaignAsync(array{CampaignId?: string, ...} $args = [])
 * @method \Aws\Result getDomainStatisticsReport(array $args = [])
 * @phpstan-method \Aws\Result getDomainStatisticsReport(array{
 *     Domain?: string,
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainStatisticsReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainStatisticsReportAsync(array{
 *     Domain?: string,
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEmailAddressInsights(array $args = [])
 * @phpstan-method \Aws\Result getEmailAddressInsights(array{EmailAddress?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEmailAddressInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEmailAddressInsightsAsync(array{EmailAddress?: string, ...} $args = [])
 * @method \Aws\Result getEmailIdentity(array $args = [])
 * @phpstan-method \Aws\Result getEmailIdentity(array{EmailIdentity?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEmailIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEmailIdentityAsync(array{EmailIdentity?: string, ...} $args = [])
 * @method \Aws\Result getEmailIdentityPolicies(array $args = [])
 * @phpstan-method \Aws\Result getEmailIdentityPolicies(array{EmailIdentity?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEmailIdentityPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEmailIdentityPoliciesAsync(array{EmailIdentity?: string, ...} $args = [])
 * @method \Aws\Result getEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result getEmailTemplate(array{TemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEmailTemplateAsync(array{TemplateName?: string, ...} $args = [])
 * @method \Aws\Result getExportJob(array $args = [])
 * @phpstan-method \Aws\Result getExportJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result getImportJob(array $args = [])
 * @phpstan-method \Aws\Result getImportJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImportJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result getMessageInsights(array $args = [])
 * @phpstan-method \Aws\Result getMessageInsights(array{MessageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMessageInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMessageInsightsAsync(array{MessageId?: string, ...} $args = [])
 * @method \Aws\Result getMultiRegionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getMultiRegionEndpoint(array{EndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMultiRegionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMultiRegionEndpointAsync(array{EndpointName?: string, ...} $args = [])
 * @method \Aws\Result getReputationEntity(array $args = [])
 * @phpstan-method \Aws\Result getReputationEntity(array{ReputationEntityReference?: string, ReputationEntityType?: 'RESOURCE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReputationEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReputationEntityAsync(array{ReputationEntityReference?: string, ReputationEntityType?: 'RESOURCE', ...} $args = [])
 * @method \Aws\Result getSuppressedDestination(array $args = [])
 * @phpstan-method \Aws\Result getSuppressedDestination(array{EmailAddress?: string, TenantName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSuppressedDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSuppressedDestinationAsync(array{EmailAddress?: string, TenantName?: string, ...} $args = [])
 * @method \Aws\Result getTenant(array $args = [])
 * @phpstan-method \Aws\Result getTenant(array{TenantName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTenantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTenantAsync(array{TenantName?: string, ...} $args = [])
 * @method \Aws\Result listConfigurationSets(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationSets(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listContactLists(array $args = [])
 * @phpstan-method \Aws\Result listContactLists(array{PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactListsAsync(array{PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listContacts(array $args = [])
 * @phpstan-method \Aws\Result listContacts(array{
 *     ContactListName?: string,
 *     Filter?: array{
 *         FilteredStatus?: 'OPT_IN'|'OPT_OUT',
 *         TopicFilter?: array{TopicName?: string, UseDefaultIfPreferenceUnavailable?: bool, ...},
 *         ...,
 *     },
 *     PageSize?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactsAsync(array{
 *     ContactListName?: string,
 *     Filter?: array{
 *         FilteredStatus?: 'OPT_IN'|'OPT_OUT',
 *         TopicFilter?: array{TopicName?: string, UseDefaultIfPreferenceUnavailable?: bool, ...},
 *         ...,
 *     },
 *     PageSize?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCustomVerificationEmailTemplates(array $args = [])
 * @phpstan-method \Aws\Result listCustomVerificationEmailTemplates(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomVerificationEmailTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomVerificationEmailTemplatesAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listDedicatedIpPools(array $args = [])
 * @phpstan-method \Aws\Result listDedicatedIpPools(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDedicatedIpPoolsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDedicatedIpPoolsAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listDeliverabilityTestReports(array $args = [])
 * @phpstan-method \Aws\Result listDeliverabilityTestReports(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeliverabilityTestReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeliverabilityTestReportsAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listDomainDeliverabilityCampaigns(array $args = [])
 * @phpstan-method \Aws\Result listDomainDeliverabilityCampaigns(array{
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     SubscribedDomain?: string,
 *     NextToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainDeliverabilityCampaignsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainDeliverabilityCampaignsAsync(array{
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     SubscribedDomain?: string,
 *     NextToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEmailIdentities(array $args = [])
 * @phpstan-method \Aws\Result listEmailIdentities(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEmailIdentitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEmailIdentitiesAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listEmailTemplates(array $args = [])
 * @phpstan-method \Aws\Result listEmailTemplates(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEmailTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEmailTemplatesAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listExportJobs(array{
 *     NextToken?: string,
 *     PageSize?: int,
 *     ExportSourceType?: 'MESSAGE_INSIGHTS'|'METRICS_DATA',
 *     JobStatus?: 'CANCELLED'|'COMPLETED'|'CREATED'|'FAILED'|'PROCESSING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportJobsAsync(array{
 *     NextToken?: string,
 *     PageSize?: int,
 *     ExportSourceType?: 'MESSAGE_INSIGHTS'|'METRICS_DATA',
 *     JobStatus?: 'CANCELLED'|'COMPLETED'|'CREATED'|'FAILED'|'PROCESSING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listImportJobs(array{ImportDestinationType?: 'CONTACT_LIST'|'SUPPRESSION_LIST', NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportJobsAsync(array{ImportDestinationType?: 'CONTACT_LIST'|'SUPPRESSION_LIST', NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listMultiRegionEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listMultiRegionEndpoints(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMultiRegionEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMultiRegionEndpointsAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listRecommendations(array{Filter?: array<string, string>, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array{Filter?: array<string, string>, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listReputationEntities(array $args = [])
 * @phpstan-method \Aws\Result listReputationEntities(array{Filter?: array<string, string>, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReputationEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReputationEntitiesAsync(array{Filter?: array<string, string>, NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listResourceTenants(array $args = [])
 * @phpstan-method \Aws\Result listResourceTenants(array{ResourceArn?: string, PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceTenantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceTenantsAsync(array{ResourceArn?: string, PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSuppressedDestinations(array $args = [])
 * @phpstan-method \Aws\Result listSuppressedDestinations(array{
 *     TenantName?: string,
 *     Reasons?: list<'BOUNCE'|'COMPLAINT'>,
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSuppressedDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSuppressedDestinationsAsync(array{
 *     TenantName?: string,
 *     Reasons?: list<'BOUNCE'|'COMPLAINT'>,
 *     StartDate?: int|string|\DateTimeInterface,
 *     EndDate?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTenantResources(array $args = [])
 * @phpstan-method \Aws\Result listTenantResources(array{TenantName?: string, Filter?: array<string, string>, PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTenantResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTenantResourcesAsync(array{TenantName?: string, Filter?: array<string, string>, PageSize?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTenants(array $args = [])
 * @phpstan-method \Aws\Result listTenants(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTenantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTenantsAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result putAccountDedicatedIpWarmupAttributes(array $args = [])
 * @phpstan-method \Aws\Result putAccountDedicatedIpWarmupAttributes(array{AutoWarmupEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountDedicatedIpWarmupAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountDedicatedIpWarmupAttributesAsync(array{AutoWarmupEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putAccountDetails(array $args = [])
 * @phpstan-method \Aws\Result putAccountDetails(array{
 *     MailType?: 'MARKETING'|'TRANSACTIONAL',
 *     WebsiteURL?: string,
 *     ContactLanguage?: 'EN'|'JA',
 *     UseCaseDescription?: string,
 *     AdditionalContactEmailAddresses?: list<string>,
 *     ProductionAccessEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountDetailsAsync(array{
 *     MailType?: 'MARKETING'|'TRANSACTIONAL',
 *     WebsiteURL?: string,
 *     ContactLanguage?: 'EN'|'JA',
 *     UseCaseDescription?: string,
 *     AdditionalContactEmailAddresses?: list<string>,
 *     ProductionAccessEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAccountPricingAttributes(array $args = [])
 * @phpstan-method \Aws\Result putAccountPricingAttributes(array{Plan?: 'ENTERPRISE'|'ESSENTIALS'|'NONE'|'PRO', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountPricingAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountPricingAttributesAsync(array{Plan?: 'ENTERPRISE'|'ESSENTIALS'|'NONE'|'PRO', ...} $args = [])
 * @method \Aws\Result putAccountSendingAttributes(array $args = [])
 * @phpstan-method \Aws\Result putAccountSendingAttributes(array{SendingEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountSendingAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountSendingAttributesAsync(array{SendingEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putAccountSuppressionAttributes(array $args = [])
 * @phpstan-method \Aws\Result putAccountSuppressionAttributes(array{
 *     SuppressedReasons?: list<'BOUNCE'|'COMPLAINT'>,
 *     ValidationAttributes?: array{
 *         ConditionThreshold?: array{ConditionThresholdEnabled?: 'DISABLED'|'ENABLED', OverallConfidenceThreshold?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountSuppressionAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountSuppressionAttributesAsync(array{
 *     SuppressedReasons?: list<'BOUNCE'|'COMPLAINT'>,
 *     ValidationAttributes?: array{
 *         ConditionThreshold?: array{ConditionThresholdEnabled?: 'DISABLED'|'ENABLED', OverallConfidenceThreshold?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAccountVdmAttributes(array $args = [])
 * @phpstan-method \Aws\Result putAccountVdmAttributes(array{
 *     VdmAttributes?: array{
 *         VdmEnabled?: 'DISABLED'|'ENABLED',
 *         DashboardAttributes?: array{EngagementMetrics?: 'DISABLED'|'ENABLED', ...},
 *         GuardianAttributes?: array{OptimizedSharedDelivery?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountVdmAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountVdmAttributesAsync(array{
 *     VdmAttributes?: array{
 *         VdmEnabled?: 'DISABLED'|'ENABLED',
 *         DashboardAttributes?: array{EngagementMetrics?: 'DISABLED'|'ENABLED', ...},
 *         GuardianAttributes?: array{OptimizedSharedDelivery?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putConfigurationSetArchivingOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetArchivingOptions(array{ConfigurationSetName?: string, ArchiveArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetArchivingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetArchivingOptionsAsync(array{ConfigurationSetName?: string, ArchiveArn?: string, ...} $args = [])
 * @method \Aws\Result putConfigurationSetDeliveryOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetDeliveryOptions(array{
 *     ConfigurationSetName?: string,
 *     TlsPolicy?: 'OPTIONAL'|'REQUIRE',
 *     SendingPoolName?: string,
 *     MaxDeliverySeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetDeliveryOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetDeliveryOptionsAsync(array{
 *     ConfigurationSetName?: string,
 *     TlsPolicy?: 'OPTIONAL'|'REQUIRE',
 *     SendingPoolName?: string,
 *     MaxDeliverySeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putConfigurationSetReputationOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetReputationOptions(array{ConfigurationSetName?: string, ReputationMetricsEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetReputationOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetReputationOptionsAsync(array{ConfigurationSetName?: string, ReputationMetricsEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putConfigurationSetSendingOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetSendingOptions(array{ConfigurationSetName?: string, SendingEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetSendingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetSendingOptionsAsync(array{ConfigurationSetName?: string, SendingEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putConfigurationSetSuppressionOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetSuppressionOptions(array{
 *     ConfigurationSetName?: string,
 *     SuppressionScope?: 'ACCOUNT'|'TENANT',
 *     SuppressedReasons?: list<'BOUNCE'|'COMPLAINT'>,
 *     ValidationOptions?: array{
 *         ConditionThreshold?: array{ConditionThresholdEnabled?: 'DISABLED'|'ENABLED', OverallConfidenceThreshold?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetSuppressionOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetSuppressionOptionsAsync(array{
 *     ConfigurationSetName?: string,
 *     SuppressionScope?: 'ACCOUNT'|'TENANT',
 *     SuppressedReasons?: list<'BOUNCE'|'COMPLAINT'>,
 *     ValidationOptions?: array{
 *         ConditionThreshold?: array{ConditionThresholdEnabled?: 'DISABLED'|'ENABLED', OverallConfidenceThreshold?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putConfigurationSetTrackingOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetTrackingOptions(array{
 *     ConfigurationSetName?: string,
 *     CustomRedirectDomain?: string,
 *     HttpsPolicy?: 'OPTIONAL'|'REQUIRE'|'REQUIRE_OPEN_ONLY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetTrackingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetTrackingOptionsAsync(array{
 *     ConfigurationSetName?: string,
 *     CustomRedirectDomain?: string,
 *     HttpsPolicy?: 'OPTIONAL'|'REQUIRE'|'REQUIRE_OPEN_ONLY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putConfigurationSetVdmOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetVdmOptions(array{
 *     ConfigurationSetName?: string,
 *     VdmOptions?: array{
 *         DashboardOptions?: array{EngagementMetrics?: 'DISABLED'|'ENABLED', ...},
 *         GuardianOptions?: array{OptimizedSharedDelivery?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetVdmOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetVdmOptionsAsync(array{
 *     ConfigurationSetName?: string,
 *     VdmOptions?: array{
 *         DashboardOptions?: array{EngagementMetrics?: 'DISABLED'|'ENABLED', ...},
 *         GuardianOptions?: array{OptimizedSharedDelivery?: 'DISABLED'|'ENABLED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDedicatedIpInPool(array $args = [])
 * @phpstan-method \Aws\Result putDedicatedIpInPool(array{Ip?: string, DestinationPoolName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDedicatedIpInPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDedicatedIpInPoolAsync(array{Ip?: string, DestinationPoolName?: string, ...} $args = [])
 * @method \Aws\Result putDedicatedIpPoolScalingAttributes(array $args = [])
 * @phpstan-method \Aws\Result putDedicatedIpPoolScalingAttributes(array{PoolName?: string, ScalingMode?: 'MANAGED'|'STANDARD', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDedicatedIpPoolScalingAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDedicatedIpPoolScalingAttributesAsync(array{PoolName?: string, ScalingMode?: 'MANAGED'|'STANDARD', ...} $args = [])
 * @method \Aws\Result putDedicatedIpWarmupAttributes(array $args = [])
 * @phpstan-method \Aws\Result putDedicatedIpWarmupAttributes(array{Ip?: string, WarmupPercentage?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDedicatedIpWarmupAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDedicatedIpWarmupAttributesAsync(array{Ip?: string, WarmupPercentage?: int, ...} $args = [])
 * @method \Aws\Result putDeliverabilityDashboardOption(array $args = [])
 * @phpstan-method \Aws\Result putDeliverabilityDashboardOption(array{
 *     DashboardEnabled?: bool,
 *     SubscribedDomains?: list<array{
 *         Domain?: string,
 *         SubscriptionStartDate?: int|string|\DateTimeInterface,
 *         InboxPlacementTrackingOption?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDeliverabilityDashboardOptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDeliverabilityDashboardOptionAsync(array{
 *     DashboardEnabled?: bool,
 *     SubscribedDomains?: list<array{
 *         Domain?: string,
 *         SubscriptionStartDate?: int|string|\DateTimeInterface,
 *         InboxPlacementTrackingOption?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putEmailIdentityConfigurationSetAttributes(array $args = [])
 * @phpstan-method \Aws\Result putEmailIdentityConfigurationSetAttributes(array{EmailIdentity?: string, ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putEmailIdentityConfigurationSetAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEmailIdentityConfigurationSetAttributesAsync(array{EmailIdentity?: string, ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result putEmailIdentityDkimAttributes(array $args = [])
 * @phpstan-method \Aws\Result putEmailIdentityDkimAttributes(array{EmailIdentity?: string, SigningEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putEmailIdentityDkimAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEmailIdentityDkimAttributesAsync(array{EmailIdentity?: string, SigningEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putEmailIdentityDkimSigningAttributes(array $args = [])
 * @phpstan-method \Aws\Result putEmailIdentityDkimSigningAttributes(array{
 *     EmailIdentity?: string,
 *     SigningAttributesOrigin?: 'AWS_SES'|'AWS_SES_AF_SOUTH_1'|'AWS_SES_AP_NORTHEAST_1'|'AWS_SES_AP_NORTHEAST_2'|'AWS_SES_AP_NORTHEAST_3'|'AWS_SES_AP_SOUTHEAST_1'|'AWS_SES_AP_SOUTHEAST_2'|'AWS_SES_AP_SOUTHEAST_3'|'AWS_SES_AP_SOUTHEAST_5'|'AWS_SES_AP_SOUTH_1'|'AWS_SES_AP_SOUTH_2'|'AWS_SES_CA_CENTRAL_1'|'AWS_SES_CA_WEST_1'|'AWS_SES_EU_CENTRAL_1'|'AWS_SES_EU_CENTRAL_2'|'AWS_SES_EU_NORTH_1'|'AWS_SES_EU_SOUTH_1'|'AWS_SES_EU_WEST_1'|'AWS_SES_EU_WEST_2'|'AWS_SES_EU_WEST_3'|'AWS_SES_IL_CENTRAL_1'|'AWS_SES_ME_CENTRAL_1'|'AWS_SES_ME_SOUTH_1'|'AWS_SES_SA_EAST_1'|'AWS_SES_US_EAST_1'|'AWS_SES_US_EAST_2'|'AWS_SES_US_GOV_EAST_1'|'AWS_SES_US_GOV_WEST_1'|'AWS_SES_US_WEST_1'|'AWS_SES_US_WEST_2'|'EXTERNAL',
 *     SigningAttributes?: array{
 *         DomainSigningSelector?: string,
 *         DomainSigningPrivateKey?: string,
 *         NextSigningKeyLength?: 'RSA_1024_BIT'|'RSA_2048_BIT',
 *         DomainSigningAttributesOrigin?: 'AWS_SES'|'AWS_SES_AF_SOUTH_1'|'AWS_SES_AP_NORTHEAST_1'|'AWS_SES_AP_NORTHEAST_2'|'AWS_SES_AP_NORTHEAST_3'|'AWS_SES_AP_SOUTHEAST_1'|'AWS_SES_AP_SOUTHEAST_2'|'AWS_SES_AP_SOUTHEAST_3'|'AWS_SES_AP_SOUTHEAST_5'|'AWS_SES_AP_SOUTH_1'|'AWS_SES_AP_SOUTH_2'|'AWS_SES_CA_CENTRAL_1'|'AWS_SES_CA_WEST_1'|'AWS_SES_EU_CENTRAL_1'|'AWS_SES_EU_CENTRAL_2'|'AWS_SES_EU_NORTH_1'|'AWS_SES_EU_SOUTH_1'|'AWS_SES_EU_WEST_1'|'AWS_SES_EU_WEST_2'|'AWS_SES_EU_WEST_3'|'AWS_SES_IL_CENTRAL_1'|'AWS_SES_ME_CENTRAL_1'|'AWS_SES_ME_SOUTH_1'|'AWS_SES_SA_EAST_1'|'AWS_SES_US_EAST_1'|'AWS_SES_US_EAST_2'|'AWS_SES_US_GOV_EAST_1'|'AWS_SES_US_GOV_WEST_1'|'AWS_SES_US_WEST_1'|'AWS_SES_US_WEST_2'|'EXTERNAL',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEmailIdentityDkimSigningAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEmailIdentityDkimSigningAttributesAsync(array{
 *     EmailIdentity?: string,
 *     SigningAttributesOrigin?: 'AWS_SES'|'AWS_SES_AF_SOUTH_1'|'AWS_SES_AP_NORTHEAST_1'|'AWS_SES_AP_NORTHEAST_2'|'AWS_SES_AP_NORTHEAST_3'|'AWS_SES_AP_SOUTHEAST_1'|'AWS_SES_AP_SOUTHEAST_2'|'AWS_SES_AP_SOUTHEAST_3'|'AWS_SES_AP_SOUTHEAST_5'|'AWS_SES_AP_SOUTH_1'|'AWS_SES_AP_SOUTH_2'|'AWS_SES_CA_CENTRAL_1'|'AWS_SES_CA_WEST_1'|'AWS_SES_EU_CENTRAL_1'|'AWS_SES_EU_CENTRAL_2'|'AWS_SES_EU_NORTH_1'|'AWS_SES_EU_SOUTH_1'|'AWS_SES_EU_WEST_1'|'AWS_SES_EU_WEST_2'|'AWS_SES_EU_WEST_3'|'AWS_SES_IL_CENTRAL_1'|'AWS_SES_ME_CENTRAL_1'|'AWS_SES_ME_SOUTH_1'|'AWS_SES_SA_EAST_1'|'AWS_SES_US_EAST_1'|'AWS_SES_US_EAST_2'|'AWS_SES_US_GOV_EAST_1'|'AWS_SES_US_GOV_WEST_1'|'AWS_SES_US_WEST_1'|'AWS_SES_US_WEST_2'|'EXTERNAL',
 *     SigningAttributes?: array{
 *         DomainSigningSelector?: string,
 *         DomainSigningPrivateKey?: string,
 *         NextSigningKeyLength?: 'RSA_1024_BIT'|'RSA_2048_BIT',
 *         DomainSigningAttributesOrigin?: 'AWS_SES'|'AWS_SES_AF_SOUTH_1'|'AWS_SES_AP_NORTHEAST_1'|'AWS_SES_AP_NORTHEAST_2'|'AWS_SES_AP_NORTHEAST_3'|'AWS_SES_AP_SOUTHEAST_1'|'AWS_SES_AP_SOUTHEAST_2'|'AWS_SES_AP_SOUTHEAST_3'|'AWS_SES_AP_SOUTHEAST_5'|'AWS_SES_AP_SOUTH_1'|'AWS_SES_AP_SOUTH_2'|'AWS_SES_CA_CENTRAL_1'|'AWS_SES_CA_WEST_1'|'AWS_SES_EU_CENTRAL_1'|'AWS_SES_EU_CENTRAL_2'|'AWS_SES_EU_NORTH_1'|'AWS_SES_EU_SOUTH_1'|'AWS_SES_EU_WEST_1'|'AWS_SES_EU_WEST_2'|'AWS_SES_EU_WEST_3'|'AWS_SES_IL_CENTRAL_1'|'AWS_SES_ME_CENTRAL_1'|'AWS_SES_ME_SOUTH_1'|'AWS_SES_SA_EAST_1'|'AWS_SES_US_EAST_1'|'AWS_SES_US_EAST_2'|'AWS_SES_US_GOV_EAST_1'|'AWS_SES_US_GOV_WEST_1'|'AWS_SES_US_WEST_1'|'AWS_SES_US_WEST_2'|'EXTERNAL',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putEmailIdentityFeedbackAttributes(array $args = [])
 * @phpstan-method \Aws\Result putEmailIdentityFeedbackAttributes(array{EmailIdentity?: string, EmailForwardingEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putEmailIdentityFeedbackAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEmailIdentityFeedbackAttributesAsync(array{EmailIdentity?: string, EmailForwardingEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putEmailIdentityMailFromAttributes(array $args = [])
 * @phpstan-method \Aws\Result putEmailIdentityMailFromAttributes(array{
 *     EmailIdentity?: string,
 *     MailFromDomain?: string,
 *     BehaviorOnMxFailure?: 'REJECT_MESSAGE'|'USE_DEFAULT_VALUE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEmailIdentityMailFromAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEmailIdentityMailFromAttributesAsync(array{
 *     EmailIdentity?: string,
 *     MailFromDomain?: string,
 *     BehaviorOnMxFailure?: 'REJECT_MESSAGE'|'USE_DEFAULT_VALUE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putSuppressedDestination(array $args = [])
 * @phpstan-method \Aws\Result putSuppressedDestination(array{EmailAddress?: string, Reason?: 'BOUNCE'|'COMPLAINT', TenantName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putSuppressedDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSuppressedDestinationAsync(array{EmailAddress?: string, Reason?: 'BOUNCE'|'COMPLAINT', TenantName?: string, ...} $args = [])
 * @method \Aws\Result putTenantSuppressionAttributes(array $args = [])
 * @phpstan-method \Aws\Result putTenantSuppressionAttributes(array{
 *     TenantName?: string,
 *     SuppressedReasons?: list<'BOUNCE'|'COMPLAINT'>,
 *     SuppressionScope?: 'ACCOUNT'|'TENANT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTenantSuppressionAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTenantSuppressionAttributesAsync(array{
 *     TenantName?: string,
 *     SuppressedReasons?: list<'BOUNCE'|'COMPLAINT'>,
 *     SuppressionScope?: 'ACCOUNT'|'TENANT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendBulkEmail(array $args = [])
 * @phpstan-method \Aws\Result sendBulkEmail(array{
 *     FromEmailAddress?: string,
 *     FromEmailAddressIdentityArn?: string,
 *     ReplyToAddresses?: list<string>,
 *     FeedbackForwardingEmailAddress?: string,
 *     FeedbackForwardingEmailAddressIdentityArn?: string,
 *     DefaultEmailTags?: list<array{Name?: string, Value?: string, ...}>,
 *     DefaultContent?: array{
 *         Template?: array{
 *             TemplateName?: string,
 *             TemplateArn?: string,
 *             TemplateContent?: array,
 *             TemplateData?: string,
 *             Headers?: list<array>,
 *             Attachments?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     BulkEmailEntries?: list<array{
 *         Destination?: array,
 *         ReplacementTags?: list<array>,
 *         ReplacementEmailContent?: array,
 *         ReplacementHeaders?: list<array>,
 *         ...,
 *     }>,
 *     ConfigurationSetName?: string,
 *     EndpointId?: string,
 *     TenantName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendBulkEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendBulkEmailAsync(array{
 *     FromEmailAddress?: string,
 *     FromEmailAddressIdentityArn?: string,
 *     ReplyToAddresses?: list<string>,
 *     FeedbackForwardingEmailAddress?: string,
 *     FeedbackForwardingEmailAddressIdentityArn?: string,
 *     DefaultEmailTags?: list<array{Name?: string, Value?: string, ...}>,
 *     DefaultContent?: array{
 *         Template?: array{
 *             TemplateName?: string,
 *             TemplateArn?: string,
 *             TemplateContent?: array,
 *             TemplateData?: string,
 *             Headers?: list<array>,
 *             Attachments?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     BulkEmailEntries?: list<array{
 *         Destination?: array,
 *         ReplacementTags?: list<array>,
 *         ReplacementEmailContent?: array,
 *         ReplacementHeaders?: list<array>,
 *         ...,
 *     }>,
 *     ConfigurationSetName?: string,
 *     EndpointId?: string,
 *     TenantName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendCustomVerificationEmail(array $args = [])
 * @phpstan-method \Aws\Result sendCustomVerificationEmail(array{EmailAddress?: string, TemplateName?: string, ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendCustomVerificationEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendCustomVerificationEmailAsync(array{EmailAddress?: string, TemplateName?: string, ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result sendEmail(array $args = [])
 * @phpstan-method \Aws\Result sendEmail(array{
 *     FromEmailAddress?: string,
 *     FromEmailAddressIdentityArn?: string,
 *     Destination?: array{ToAddresses?: list<string>, CcAddresses?: list<string>, BccAddresses?: list<string>, ...},
 *     ReplyToAddresses?: list<string>,
 *     FeedbackForwardingEmailAddress?: string,
 *     FeedbackForwardingEmailAddressIdentityArn?: string,
 *     Content?: array{
 *         Simple?: array{Subject?: array, Body?: array, Headers?: list<array>, Attachments?: list<array>, ...},
 *         Raw?: array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         Template?: array{
 *             TemplateName?: string,
 *             TemplateArn?: string,
 *             TemplateContent?: array,
 *             TemplateData?: string,
 *             Headers?: list<array>,
 *             Attachments?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     EmailTags?: list<array{Name?: string, Value?: string, ...}>,
 *     ConfigurationSetName?: string,
 *     EndpointId?: string,
 *     TenantName?: string,
 *     ListManagementOptions?: array{ContactListName?: string, TopicName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendEmailAsync(array{
 *     FromEmailAddress?: string,
 *     FromEmailAddressIdentityArn?: string,
 *     Destination?: array{ToAddresses?: list<string>, CcAddresses?: list<string>, BccAddresses?: list<string>, ...},
 *     ReplyToAddresses?: list<string>,
 *     FeedbackForwardingEmailAddress?: string,
 *     FeedbackForwardingEmailAddressIdentityArn?: string,
 *     Content?: array{
 *         Simple?: array{Subject?: array, Body?: array, Headers?: list<array>, Attachments?: list<array>, ...},
 *         Raw?: array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         Template?: array{
 *             TemplateName?: string,
 *             TemplateArn?: string,
 *             TemplateContent?: array,
 *             TemplateData?: string,
 *             Headers?: list<array>,
 *             Attachments?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     EmailTags?: list<array{Name?: string, Value?: string, ...}>,
 *     ConfigurationSetName?: string,
 *     EndpointId?: string,
 *     TenantName?: string,
 *     ListManagementOptions?: array{ContactListName?: string, TopicName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result testRenderEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result testRenderEmailTemplate(array{TemplateName?: string, TemplateData?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise testRenderEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testRenderEmailTemplateAsync(array{TemplateName?: string, TemplateData?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateConfigurationSetEventDestination(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationSetEventDestination(array{
 *     ConfigurationSetName?: string,
 *     EventDestinationName?: string,
 *     EventDestination?: array{
 *         Enabled?: bool,
 *         MatchingEventTypes?: list<'BOUNCE'|'CLICK'|'COMPLAINT'|'DELIVERY'|'DELIVERY_DELAY'|'OPEN'|'REJECT'|'RENDERING_FAILURE'|'SEND'|'SUBSCRIPTION'>,
 *         KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SnsDestination?: array{TopicArn?: string, ...},
 *         EventBridgeDestination?: array{EventBusArn?: string, ...},
 *         PinpointDestination?: array{ApplicationArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationSetEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationSetEventDestinationAsync(array{
 *     ConfigurationSetName?: string,
 *     EventDestinationName?: string,
 *     EventDestination?: array{
 *         Enabled?: bool,
 *         MatchingEventTypes?: list<'BOUNCE'|'CLICK'|'COMPLAINT'|'DELIVERY'|'DELIVERY_DELAY'|'OPEN'|'REJECT'|'RENDERING_FAILURE'|'SEND'|'SUBSCRIPTION'>,
 *         KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SnsDestination?: array{TopicArn?: string, ...},
 *         EventBridgeDestination?: array{EventBusArn?: string, ...},
 *         PinpointDestination?: array{ApplicationArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContact(array $args = [])
 * @phpstan-method \Aws\Result updateContact(array{
 *     ContactListName?: string,
 *     EmailAddress?: string,
 *     TopicPreferences?: list<array{TopicName?: string, SubscriptionStatus?: 'OPT_IN'|'OPT_OUT', ...}>,
 *     UnsubscribeAll?: bool,
 *     AttributesData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactAsync(array{
 *     ContactListName?: string,
 *     EmailAddress?: string,
 *     TopicPreferences?: list<array{TopicName?: string, SubscriptionStatus?: 'OPT_IN'|'OPT_OUT', ...}>,
 *     UnsubscribeAll?: bool,
 *     AttributesData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContactList(array $args = [])
 * @phpstan-method \Aws\Result updateContactList(array{
 *     ContactListName?: string,
 *     Topics?: list<array{
 *         TopicName?: string,
 *         DisplayName?: string,
 *         Description?: string,
 *         DefaultSubscriptionStatus?: 'OPT_IN'|'OPT_OUT',
 *         ...,
 *     }>,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactListAsync(array{
 *     ContactListName?: string,
 *     Topics?: list<array{
 *         TopicName?: string,
 *         DisplayName?: string,
 *         Description?: string,
 *         DefaultSubscriptionStatus?: 'OPT_IN'|'OPT_OUT',
 *         ...,
 *     }>,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCustomVerificationEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateCustomVerificationEmailTemplate(array{
 *     TemplateName?: string,
 *     FromEmailAddress?: string,
 *     TemplateSubject?: string,
 *     TemplateContent?: string,
 *     SuccessRedirectionURL?: string,
 *     FailureRedirectionURL?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomVerificationEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomVerificationEmailTemplateAsync(array{
 *     TemplateName?: string,
 *     FromEmailAddress?: string,
 *     TemplateSubject?: string,
 *     TemplateContent?: string,
 *     SuccessRedirectionURL?: string,
 *     FailureRedirectionURL?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEmailIdentityPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateEmailIdentityPolicy(array{EmailIdentity?: string, PolicyName?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEmailIdentityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEmailIdentityPolicyAsync(array{EmailIdentity?: string, PolicyName?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result updateEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateEmailTemplate(array{
 *     TemplateName?: string,
 *     TemplateContent?: array{Subject?: string, Text?: string, Html?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEmailTemplateAsync(array{
 *     TemplateName?: string,
 *     TemplateContent?: array{Subject?: string, Text?: string, Html?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReputationEntityCustomerManagedStatus(array $args = [])
 * @phpstan-method \Aws\Result updateReputationEntityCustomerManagedStatus(array{
 *     ReputationEntityType?: 'RESOURCE',
 *     ReputationEntityReference?: string,
 *     SendingStatus?: 'DISABLED'|'ENABLED'|'REINSTATED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReputationEntityCustomerManagedStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReputationEntityCustomerManagedStatusAsync(array{
 *     ReputationEntityType?: 'RESOURCE',
 *     ReputationEntityReference?: string,
 *     SendingStatus?: 'DISABLED'|'ENABLED'|'REINSTATED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReputationEntityPolicy(array $args = [])
 * @phpstan-method \Aws\Result updateReputationEntityPolicy(array{
 *     ReputationEntityType?: 'RESOURCE',
 *     ReputationEntityReference?: string,
 *     ReputationEntityPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReputationEntityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReputationEntityPolicyAsync(array{
 *     ReputationEntityType?: 'RESOURCE',
 *     ReputationEntityReference?: string,
 *     ReputationEntityPolicy?: string,
 *     ...,
 * } $args = [])
 */
class SesV2Client extends AwsClient {}
