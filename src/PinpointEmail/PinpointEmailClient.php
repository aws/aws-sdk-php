<?php
namespace Aws\PinpointEmail;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Pinpoint Email Service** service.
 * @method \Aws\Result createConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationSet(array{
 *     ConfigurationSetName?: string,
 *     TrackingOptions?: array{CustomRedirectDomain?: string, ...},
 *     DeliveryOptions?: array{TlsPolicy?: 'OPTIONAL'|'REQUIRE', SendingPoolName?: string, ...},
 *     ReputationOptions?: array{ReputationMetricsEnabled?: bool, LastFreshStart?: int|string|\DateTimeInterface, ...},
 *     SendingOptions?: array{SendingEnabled?: bool, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array{
 *     ConfigurationSetName?: string,
 *     TrackingOptions?: array{CustomRedirectDomain?: string, ...},
 *     DeliveryOptions?: array{TlsPolicy?: 'OPTIONAL'|'REQUIRE', SendingPoolName?: string, ...},
 *     ReputationOptions?: array{ReputationMetricsEnabled?: bool, LastFreshStart?: int|string|\DateTimeInterface, ...},
 *     SendingOptions?: array{SendingEnabled?: bool, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfigurationSetEventDestination(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationSetEventDestination(array{
 *     ConfigurationSetName?: string,
 *     EventDestinationName?: string,
 *     EventDestination?: array{
 *         Enabled?: bool,
 *         MatchingEventTypes?: list<'BOUNCE'|'CLICK'|'COMPLAINT'|'DELIVERY'|'OPEN'|'REJECT'|'RENDERING_FAILURE'|'SEND'>,
 *         KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SnsDestination?: array{TopicArn?: string, ...},
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
 *         MatchingEventTypes?: list<'BOUNCE'|'CLICK'|'COMPLAINT'|'DELIVERY'|'OPEN'|'REJECT'|'RENDERING_FAILURE'|'SEND'>,
 *         KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SnsDestination?: array{TopicArn?: string, ...},
 *         PinpointDestination?: array{ApplicationArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDedicatedIpPool(array $args = [])
 * @phpstan-method \Aws\Result createDedicatedIpPool(array{PoolName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDedicatedIpPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDedicatedIpPoolAsync(array{PoolName?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createDeliverabilityTestReport(array $args = [])
 * @phpstan-method \Aws\Result createDeliverabilityTestReport(array{
 *     ReportName?: string,
 *     FromEmailAddress?: string,
 *     Content?: array{
 *         Simple?: array{Subject?: array, Body?: array, ...},
 *         Raw?: array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         Template?: array{TemplateArn?: string, TemplateData?: string, ...},
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
 *         Simple?: array{Subject?: array, Body?: array, ...},
 *         Raw?: array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         Template?: array{TemplateArn?: string, TemplateData?: string, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEmailIdentity(array $args = [])
 * @phpstan-method \Aws\Result createEmailIdentity(array{EmailIdentity?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createEmailIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEmailIdentityAsync(array{EmailIdentity?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result deleteConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationSet(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result deleteConfigurationSetEventDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationSetEventDestination(array{ConfigurationSetName?: string, EventDestinationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationSetEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationSetEventDestinationAsync(array{ConfigurationSetName?: string, EventDestinationName?: string, ...} $args = [])
 * @method \Aws\Result deleteDedicatedIpPool(array $args = [])
 * @phpstan-method \Aws\Result deleteDedicatedIpPool(array{PoolName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDedicatedIpPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDedicatedIpPoolAsync(array{PoolName?: string, ...} $args = [])
 * @method \Aws\Result deleteEmailIdentity(array $args = [])
 * @phpstan-method \Aws\Result deleteEmailIdentity(array{EmailIdentity?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEmailIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEmailIdentityAsync(array{EmailIdentity?: string, ...} $args = [])
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
 * @method \Aws\Result getDedicatedIp(array $args = [])
 * @phpstan-method \Aws\Result getDedicatedIp(array{Ip?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDedicatedIpAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDedicatedIpAsync(array{Ip?: string, ...} $args = [])
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
 * @method \Aws\Result getEmailIdentity(array $args = [])
 * @phpstan-method \Aws\Result getEmailIdentity(array{EmailIdentity?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEmailIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEmailIdentityAsync(array{EmailIdentity?: string, ...} $args = [])
 * @method \Aws\Result listConfigurationSets(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationSets(array{NextToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array{NextToken?: string, PageSize?: int, ...} $args = [])
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
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putAccountDedicatedIpWarmupAttributes(array $args = [])
 * @phpstan-method \Aws\Result putAccountDedicatedIpWarmupAttributes(array{AutoWarmupEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountDedicatedIpWarmupAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountDedicatedIpWarmupAttributesAsync(array{AutoWarmupEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putAccountSendingAttributes(array $args = [])
 * @phpstan-method \Aws\Result putAccountSendingAttributes(array{SendingEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountSendingAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountSendingAttributesAsync(array{SendingEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putConfigurationSetDeliveryOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetDeliveryOptions(array{ConfigurationSetName?: string, TlsPolicy?: 'OPTIONAL'|'REQUIRE', SendingPoolName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetDeliveryOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetDeliveryOptionsAsync(array{ConfigurationSetName?: string, TlsPolicy?: 'OPTIONAL'|'REQUIRE', SendingPoolName?: string, ...} $args = [])
 * @method \Aws\Result putConfigurationSetReputationOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetReputationOptions(array{ConfigurationSetName?: string, ReputationMetricsEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetReputationOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetReputationOptionsAsync(array{ConfigurationSetName?: string, ReputationMetricsEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putConfigurationSetSendingOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetSendingOptions(array{ConfigurationSetName?: string, SendingEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetSendingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetSendingOptionsAsync(array{ConfigurationSetName?: string, SendingEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putConfigurationSetTrackingOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetTrackingOptions(array{ConfigurationSetName?: string, CustomRedirectDomain?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetTrackingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetTrackingOptionsAsync(array{ConfigurationSetName?: string, CustomRedirectDomain?: string, ...} $args = [])
 * @method \Aws\Result putDedicatedIpInPool(array $args = [])
 * @phpstan-method \Aws\Result putDedicatedIpInPool(array{Ip?: string, DestinationPoolName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDedicatedIpInPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDedicatedIpInPoolAsync(array{Ip?: string, DestinationPoolName?: string, ...} $args = [])
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
 * @method \Aws\Result putEmailIdentityDkimAttributes(array $args = [])
 * @phpstan-method \Aws\Result putEmailIdentityDkimAttributes(array{EmailIdentity?: string, SigningEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putEmailIdentityDkimAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEmailIdentityDkimAttributesAsync(array{EmailIdentity?: string, SigningEnabled?: bool, ...} $args = [])
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
 * @method \Aws\Result sendEmail(array $args = [])
 * @phpstan-method \Aws\Result sendEmail(array{
 *     FromEmailAddress?: string,
 *     Destination?: array{ToAddresses?: list<string>, CcAddresses?: list<string>, BccAddresses?: list<string>, ...},
 *     ReplyToAddresses?: list<string>,
 *     FeedbackForwardingEmailAddress?: string,
 *     Content?: array{
 *         Simple?: array{Subject?: array, Body?: array, ...},
 *         Raw?: array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         Template?: array{TemplateArn?: string, TemplateData?: string, ...},
 *         ...,
 *     },
 *     EmailTags?: list<array{Name?: string, Value?: string, ...}>,
 *     ConfigurationSetName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendEmailAsync(array{
 *     FromEmailAddress?: string,
 *     Destination?: array{ToAddresses?: list<string>, CcAddresses?: list<string>, BccAddresses?: list<string>, ...},
 *     ReplyToAddresses?: list<string>,
 *     FeedbackForwardingEmailAddress?: string,
 *     Content?: array{
 *         Simple?: array{Subject?: array, Body?: array, ...},
 *         Raw?: array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         Template?: array{TemplateArn?: string, TemplateData?: string, ...},
 *         ...,
 *     },
 *     EmailTags?: list<array{Name?: string, Value?: string, ...}>,
 *     ConfigurationSetName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
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
 *         MatchingEventTypes?: list<'BOUNCE'|'CLICK'|'COMPLAINT'|'DELIVERY'|'OPEN'|'REJECT'|'RENDERING_FAILURE'|'SEND'>,
 *         KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SnsDestination?: array{TopicArn?: string, ...},
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
 *         MatchingEventTypes?: list<'BOUNCE'|'CLICK'|'COMPLAINT'|'DELIVERY'|'OPEN'|'REJECT'|'RENDERING_FAILURE'|'SEND'>,
 *         KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SnsDestination?: array{TopicArn?: string, ...},
 *         PinpointDestination?: array{ApplicationArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class PinpointEmailClient extends AwsClient {}
