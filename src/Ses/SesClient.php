<?php
namespace Aws\Ses;

use Aws\Api\ApiProvider;
use Aws\Api\DocModel;
use Aws\Api\Service;
use Aws\Credentials\CredentialsInterface;

/**
 * This client is used to interact with the **Amazon Simple Email Service (Amazon SES)**.
 *
 * @method \Aws\Result cloneReceiptRuleSet(array $args = [])
 * @phpstan-method \Aws\Result cloneReceiptRuleSet(array{RuleSetName?: string, OriginalRuleSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cloneReceiptRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cloneReceiptRuleSetAsync(array{RuleSetName?: string, OriginalRuleSetName?: string, ...} $args = [])
 * @method \Aws\Result createConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationSet(array{ConfigurationSet?: array{Name?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array{ConfigurationSet?: array{Name?: string, ...}, ...} $args = [])
 * @method \Aws\Result createConfigurationSetEventDestination(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationSetEventDestination(array{
 *     ConfigurationSetName?: string,
 *     EventDestination?: array{
 *         Name?: string,
 *         Enabled?: bool,
 *         MatchingEventTypes?: list<'bounce'|'click'|'complaint'|'delivery'|'open'|'reject'|'renderingFailure'|'send'>,
 *         KinesisFirehoseDestination?: array{IAMRoleARN?: string, DeliveryStreamARN?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SNSDestination?: array{TopicARN?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationSetEventDestinationAsync(array{
 *     ConfigurationSetName?: string,
 *     EventDestination?: array{
 *         Name?: string,
 *         Enabled?: bool,
 *         MatchingEventTypes?: list<'bounce'|'click'|'complaint'|'delivery'|'open'|'reject'|'renderingFailure'|'send'>,
 *         KinesisFirehoseDestination?: array{IAMRoleARN?: string, DeliveryStreamARN?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SNSDestination?: array{TopicARN?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfigurationSetTrackingOptions(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationSetTrackingOptions(array{ConfigurationSetName?: string, TrackingOptions?: array{CustomRedirectDomain?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetTrackingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationSetTrackingOptionsAsync(array{ConfigurationSetName?: string, TrackingOptions?: array{CustomRedirectDomain?: string, ...}, ...} $args = [])
 * @method \Aws\Result createCustomVerificationEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result createCustomVerificationEmailTemplate(array{
 *     TemplateName?: string,
 *     FromEmailAddress?: string,
 *     TemplateSubject?: string,
 *     TemplateContent?: string,
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
 *     SuccessRedirectionURL?: string,
 *     FailureRedirectionURL?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReceiptFilter(array $args = [])
 * @phpstan-method \Aws\Result createReceiptFilter(array{Filter?: array{Name?: string, IpFilter?: array{Policy?: 'Allow'|'Block', Cidr?: string, ...}, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createReceiptFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReceiptFilterAsync(array{Filter?: array{Name?: string, IpFilter?: array{Policy?: 'Allow'|'Block', Cidr?: string, ...}, ...}, ...} $args = [])
 * @method \Aws\Result createReceiptRule(array $args = [])
 * @phpstan-method \Aws\Result createReceiptRule(array{
 *     RuleSetName?: string,
 *     After?: string,
 *     Rule?: array{
 *         Name?: string,
 *         Enabled?: bool,
 *         TlsPolicy?: 'Optional'|'Require',
 *         Recipients?: list<string>,
 *         Actions?: list<array>,
 *         ScanEnabled?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReceiptRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReceiptRuleAsync(array{
 *     RuleSetName?: string,
 *     After?: string,
 *     Rule?: array{
 *         Name?: string,
 *         Enabled?: bool,
 *         TlsPolicy?: 'Optional'|'Require',
 *         Recipients?: list<string>,
 *         Actions?: list<array>,
 *         ScanEnabled?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReceiptRuleSet(array $args = [])
 * @phpstan-method \Aws\Result createReceiptRuleSet(array{RuleSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createReceiptRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReceiptRuleSetAsync(array{RuleSetName?: string, ...} $args = [])
 * @method \Aws\Result createTemplate(array $args = [])
 * @phpstan-method \Aws\Result createTemplate(array{
 *     Template?: array{TemplateName?: string, SubjectPart?: string, TextPart?: string, HtmlPart?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateAsync(array{
 *     Template?: array{TemplateName?: string, SubjectPart?: string, TextPart?: string, HtmlPart?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationSet(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result deleteConfigurationSetEventDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationSetEventDestination(array{ConfigurationSetName?: string, EventDestinationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationSetEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationSetEventDestinationAsync(array{ConfigurationSetName?: string, EventDestinationName?: string, ...} $args = [])
 * @method \Aws\Result deleteConfigurationSetTrackingOptions(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationSetTrackingOptions(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationSetTrackingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationSetTrackingOptionsAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomVerificationEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomVerificationEmailTemplate(array{TemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomVerificationEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomVerificationEmailTemplateAsync(array{TemplateName?: string, ...} $args = [])
 * @method \Aws\Result deleteIdentity(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentity(array{Identity?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentityAsync(array{Identity?: string, ...} $args = [])
 * @method \Aws\Result deleteIdentityPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentityPolicy(array{Identity?: string, PolicyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdentityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentityPolicyAsync(array{Identity?: string, PolicyName?: string, ...} $args = [])
 * @method \Aws\Result deleteReceiptFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteReceiptFilter(array{FilterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReceiptFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReceiptFilterAsync(array{FilterName?: string, ...} $args = [])
 * @method \Aws\Result deleteReceiptRule(array $args = [])
 * @phpstan-method \Aws\Result deleteReceiptRule(array{RuleSetName?: string, RuleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReceiptRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReceiptRuleAsync(array{RuleSetName?: string, RuleName?: string, ...} $args = [])
 * @method \Aws\Result deleteReceiptRuleSet(array $args = [])
 * @phpstan-method \Aws\Result deleteReceiptRuleSet(array{RuleSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReceiptRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReceiptRuleSetAsync(array{RuleSetName?: string, ...} $args = [])
 * @method \Aws\Result deleteTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteTemplate(array{TemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array{TemplateName?: string, ...} $args = [])
 * @method \Aws\Result deleteVerifiedEmailAddress(array $args = [])
 * @phpstan-method \Aws\Result deleteVerifiedEmailAddress(array{EmailAddress?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVerifiedEmailAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVerifiedEmailAddressAsync(array{EmailAddress?: string, ...} $args = [])
 * @method \Aws\Result describeActiveReceiptRuleSet(array $args = [])
 * @phpstan-method \Aws\Result describeActiveReceiptRuleSet(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActiveReceiptRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeActiveReceiptRuleSetAsync(array{...} $args = [])
 * @method \Aws\Result describeConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result describeConfigurationSet(array{
 *     ConfigurationSetName?: string,
 *     ConfigurationSetAttributeNames?: list<'deliveryOptions'|'eventDestinations'|'reputationOptions'|'trackingOptions'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConfigurationSetAsync(array{
 *     ConfigurationSetName?: string,
 *     ConfigurationSetAttributeNames?: list<'deliveryOptions'|'eventDestinations'|'reputationOptions'|'trackingOptions'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeReceiptRule(array $args = [])
 * @phpstan-method \Aws\Result describeReceiptRule(array{RuleSetName?: string, RuleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReceiptRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReceiptRuleAsync(array{RuleSetName?: string, RuleName?: string, ...} $args = [])
 * @method \Aws\Result describeReceiptRuleSet(array $args = [])
 * @phpstan-method \Aws\Result describeReceiptRuleSet(array{RuleSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReceiptRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReceiptRuleSetAsync(array{RuleSetName?: string, ...} $args = [])
 * @method \Aws\Result getAccountSendingEnabled(array $args = [])
 * @phpstan-method \Aws\Result getAccountSendingEnabled(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSendingEnabledAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSendingEnabledAsync(array{...} $args = [])
 * @method \Aws\Result getCustomVerificationEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result getCustomVerificationEmailTemplate(array{TemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomVerificationEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCustomVerificationEmailTemplateAsync(array{TemplateName?: string, ...} $args = [])
 * @method \Aws\Result getIdentityDkimAttributes(array $args = [])
 * @phpstan-method \Aws\Result getIdentityDkimAttributes(array{Identities?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityDkimAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityDkimAttributesAsync(array{Identities?: list<string>, ...} $args = [])
 * @method \Aws\Result getIdentityMailFromDomainAttributes(array $args = [])
 * @phpstan-method \Aws\Result getIdentityMailFromDomainAttributes(array{Identities?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityMailFromDomainAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityMailFromDomainAttributesAsync(array{Identities?: list<string>, ...} $args = [])
 * @method \Aws\Result getIdentityNotificationAttributes(array $args = [])
 * @phpstan-method \Aws\Result getIdentityNotificationAttributes(array{Identities?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityNotificationAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityNotificationAttributesAsync(array{Identities?: list<string>, ...} $args = [])
 * @method \Aws\Result getIdentityPolicies(array $args = [])
 * @phpstan-method \Aws\Result getIdentityPolicies(array{Identity?: string, PolicyNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityPoliciesAsync(array{Identity?: string, PolicyNames?: list<string>, ...} $args = [])
 * @method \Aws\Result getIdentityVerificationAttributes(array $args = [])
 * @phpstan-method \Aws\Result getIdentityVerificationAttributes(array{Identities?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdentityVerificationAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentityVerificationAttributesAsync(array{Identities?: list<string>, ...} $args = [])
 * @method \Aws\Result getSendQuota(array $args = [])
 * @phpstan-method \Aws\Result getSendQuota(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSendQuotaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSendQuotaAsync(array{...} $args = [])
 * @method \Aws\Result getSendStatistics(array $args = [])
 * @phpstan-method \Aws\Result getSendStatistics(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSendStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSendStatisticsAsync(array{...} $args = [])
 * @method \Aws\Result getTemplate(array $args = [])
 * @phpstan-method \Aws\Result getTemplate(array{TemplateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateAsync(array{TemplateName?: string, ...} $args = [])
 * @method \Aws\Result listConfigurationSets(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationSets(array{NextToken?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array{NextToken?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listCustomVerificationEmailTemplates(array $args = [])
 * @phpstan-method \Aws\Result listCustomVerificationEmailTemplates(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomVerificationEmailTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomVerificationEmailTemplatesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listIdentities(array $args = [])
 * @phpstan-method \Aws\Result listIdentities(array{IdentityType?: 'Domain'|'EmailAddress', NextToken?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentitiesAsync(array{IdentityType?: 'Domain'|'EmailAddress', NextToken?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listIdentityPolicies(array $args = [])
 * @phpstan-method \Aws\Result listIdentityPolicies(array{Identity?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentityPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentityPoliciesAsync(array{Identity?: string, ...} $args = [])
 * @method \Aws\Result listReceiptFilters(array $args = [])
 * @phpstan-method \Aws\Result listReceiptFilters(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReceiptFiltersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReceiptFiltersAsync(array{...} $args = [])
 * @method \Aws\Result listReceiptRuleSets(array $args = [])
 * @phpstan-method \Aws\Result listReceiptRuleSets(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReceiptRuleSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReceiptRuleSetsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTemplates(array $args = [])
 * @phpstan-method \Aws\Result listTemplates(array{NextToken?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplatesAsync(array{NextToken?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listVerifiedEmailAddresses(array $args = [])
 * @phpstan-method \Aws\Result listVerifiedEmailAddresses(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVerifiedEmailAddressesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVerifiedEmailAddressesAsync(array{...} $args = [])
 * @method \Aws\Result putConfigurationSetDeliveryOptions(array $args = [])
 * @phpstan-method \Aws\Result putConfigurationSetDeliveryOptions(array{ConfigurationSetName?: string, DeliveryOptions?: array{TlsPolicy?: 'Optional'|'Require', ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetDeliveryOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationSetDeliveryOptionsAsync(array{ConfigurationSetName?: string, DeliveryOptions?: array{TlsPolicy?: 'Optional'|'Require', ...}, ...} $args = [])
 * @method \Aws\Result putIdentityPolicy(array $args = [])
 * @phpstan-method \Aws\Result putIdentityPolicy(array{Identity?: string, PolicyName?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putIdentityPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putIdentityPolicyAsync(array{Identity?: string, PolicyName?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result reorderReceiptRuleSet(array $args = [])
 * @phpstan-method \Aws\Result reorderReceiptRuleSet(array{RuleSetName?: string, RuleNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise reorderReceiptRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reorderReceiptRuleSetAsync(array{RuleSetName?: string, RuleNames?: list<string>, ...} $args = [])
 * @method \Aws\Result sendBounce(array $args = [])
 * @phpstan-method \Aws\Result sendBounce(array{
 *     OriginalMessageId?: string,
 *     BounceSender?: string,
 *     Explanation?: string,
 *     MessageDsn?: array{ReportingMta?: string, ArrivalDate?: int|string|\DateTimeInterface, ExtensionFields?: list<array>, ...},
 *     BouncedRecipientInfoList?: list<array{
 *         Recipient?: string,
 *         RecipientArn?: string,
 *         BounceType?: 'ContentRejected'|'DoesNotExist'|'ExceededQuota'|'MessageTooLarge'|'TemporaryFailure'|'Undefined',
 *         RecipientDsnFields?: array,
 *         ...,
 *     }>,
 *     BounceSenderArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendBounceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendBounceAsync(array{
 *     OriginalMessageId?: string,
 *     BounceSender?: string,
 *     Explanation?: string,
 *     MessageDsn?: array{ReportingMta?: string, ArrivalDate?: int|string|\DateTimeInterface, ExtensionFields?: list<array>, ...},
 *     BouncedRecipientInfoList?: list<array{
 *         Recipient?: string,
 *         RecipientArn?: string,
 *         BounceType?: 'ContentRejected'|'DoesNotExist'|'ExceededQuota'|'MessageTooLarge'|'TemporaryFailure'|'Undefined',
 *         RecipientDsnFields?: array,
 *         ...,
 *     }>,
 *     BounceSenderArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendBulkTemplatedEmail(array $args = [])
 * @phpstan-method \Aws\Result sendBulkTemplatedEmail(array{
 *     Source?: string,
 *     SourceArn?: string,
 *     ReplyToAddresses?: list<string>,
 *     ReturnPath?: string,
 *     ReturnPathArn?: string,
 *     ConfigurationSetName?: string,
 *     DefaultTags?: list<array{Name?: string, Value?: string, ...}>,
 *     Template?: string,
 *     TemplateArn?: string,
 *     DefaultTemplateData?: string,
 *     Destinations?: list<array{Destination?: array, ReplacementTags?: list<array>, ReplacementTemplateData?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendBulkTemplatedEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendBulkTemplatedEmailAsync(array{
 *     Source?: string,
 *     SourceArn?: string,
 *     ReplyToAddresses?: list<string>,
 *     ReturnPath?: string,
 *     ReturnPathArn?: string,
 *     ConfigurationSetName?: string,
 *     DefaultTags?: list<array{Name?: string, Value?: string, ...}>,
 *     Template?: string,
 *     TemplateArn?: string,
 *     DefaultTemplateData?: string,
 *     Destinations?: list<array{Destination?: array, ReplacementTags?: list<array>, ReplacementTemplateData?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendCustomVerificationEmail(array $args = [])
 * @phpstan-method \Aws\Result sendCustomVerificationEmail(array{EmailAddress?: string, TemplateName?: string, ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendCustomVerificationEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendCustomVerificationEmailAsync(array{EmailAddress?: string, TemplateName?: string, ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result sendEmail(array $args = [])
 * @phpstan-method \Aws\Result sendEmail(array{
 *     Source?: string,
 *     Destination?: array{ToAddresses?: list<string>, CcAddresses?: list<string>, BccAddresses?: list<string>, ...},
 *     Message?: array{
 *         Subject?: array{Data?: string, Charset?: string, ...},
 *         Body?: array{Text?: array, Html?: array, ...},
 *         ...,
 *     },
 *     ReplyToAddresses?: list<string>,
 *     ReturnPath?: string,
 *     SourceArn?: string,
 *     ReturnPathArn?: string,
 *     Tags?: list<array{Name?: string, Value?: string, ...}>,
 *     ConfigurationSetName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendEmailAsync(array{
 *     Source?: string,
 *     Destination?: array{ToAddresses?: list<string>, CcAddresses?: list<string>, BccAddresses?: list<string>, ...},
 *     Message?: array{
 *         Subject?: array{Data?: string, Charset?: string, ...},
 *         Body?: array{Text?: array, Html?: array, ...},
 *         ...,
 *     },
 *     ReplyToAddresses?: list<string>,
 *     ReturnPath?: string,
 *     SourceArn?: string,
 *     ReturnPathArn?: string,
 *     Tags?: list<array{Name?: string, Value?: string, ...}>,
 *     ConfigurationSetName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendRawEmail(array $args = [])
 * @phpstan-method \Aws\Result sendRawEmail(array{
 *     Source?: string,
 *     Destinations?: list<string>,
 *     RawMessage?: array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     FromArn?: string,
 *     SourceArn?: string,
 *     ReturnPathArn?: string,
 *     Tags?: list<array{Name?: string, Value?: string, ...}>,
 *     ConfigurationSetName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendRawEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendRawEmailAsync(array{
 *     Source?: string,
 *     Destinations?: list<string>,
 *     RawMessage?: array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     FromArn?: string,
 *     SourceArn?: string,
 *     ReturnPathArn?: string,
 *     Tags?: list<array{Name?: string, Value?: string, ...}>,
 *     ConfigurationSetName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendTemplatedEmail(array $args = [])
 * @phpstan-method \Aws\Result sendTemplatedEmail(array{
 *     Source?: string,
 *     Destination?: array{ToAddresses?: list<string>, CcAddresses?: list<string>, BccAddresses?: list<string>, ...},
 *     ReplyToAddresses?: list<string>,
 *     ReturnPath?: string,
 *     SourceArn?: string,
 *     ReturnPathArn?: string,
 *     Tags?: list<array{Name?: string, Value?: string, ...}>,
 *     ConfigurationSetName?: string,
 *     Template?: string,
 *     TemplateArn?: string,
 *     TemplateData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendTemplatedEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendTemplatedEmailAsync(array{
 *     Source?: string,
 *     Destination?: array{ToAddresses?: list<string>, CcAddresses?: list<string>, BccAddresses?: list<string>, ...},
 *     ReplyToAddresses?: list<string>,
 *     ReturnPath?: string,
 *     SourceArn?: string,
 *     ReturnPathArn?: string,
 *     Tags?: list<array{Name?: string, Value?: string, ...}>,
 *     ConfigurationSetName?: string,
 *     Template?: string,
 *     TemplateArn?: string,
 *     TemplateData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setActiveReceiptRuleSet(array $args = [])
 * @phpstan-method \Aws\Result setActiveReceiptRuleSet(array{RuleSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setActiveReceiptRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setActiveReceiptRuleSetAsync(array{RuleSetName?: string, ...} $args = [])
 * @method \Aws\Result setIdentityDkimEnabled(array $args = [])
 * @phpstan-method \Aws\Result setIdentityDkimEnabled(array{Identity?: string, DkimEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setIdentityDkimEnabledAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setIdentityDkimEnabledAsync(array{Identity?: string, DkimEnabled?: bool, ...} $args = [])
 * @method \Aws\Result setIdentityFeedbackForwardingEnabled(array $args = [])
 * @phpstan-method \Aws\Result setIdentityFeedbackForwardingEnabled(array{Identity?: string, ForwardingEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setIdentityFeedbackForwardingEnabledAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setIdentityFeedbackForwardingEnabledAsync(array{Identity?: string, ForwardingEnabled?: bool, ...} $args = [])
 * @method \Aws\Result setIdentityHeadersInNotificationsEnabled(array $args = [])
 * @phpstan-method \Aws\Result setIdentityHeadersInNotificationsEnabled(array{Identity?: string, NotificationType?: 'Bounce'|'Complaint'|'Delivery', Enabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setIdentityHeadersInNotificationsEnabledAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setIdentityHeadersInNotificationsEnabledAsync(array{Identity?: string, NotificationType?: 'Bounce'|'Complaint'|'Delivery', Enabled?: bool, ...} $args = [])
 * @method \Aws\Result setIdentityMailFromDomain(array $args = [])
 * @phpstan-method \Aws\Result setIdentityMailFromDomain(array{
 *     Identity?: string,
 *     MailFromDomain?: string,
 *     BehaviorOnMXFailure?: 'RejectMessage'|'UseDefaultValue',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setIdentityMailFromDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setIdentityMailFromDomainAsync(array{
 *     Identity?: string,
 *     MailFromDomain?: string,
 *     BehaviorOnMXFailure?: 'RejectMessage'|'UseDefaultValue',
 *     ...,
 * } $args = [])
 * @method \Aws\Result setIdentityNotificationTopic(array $args = [])
 * @phpstan-method \Aws\Result setIdentityNotificationTopic(array{Identity?: string, NotificationType?: 'Bounce'|'Complaint'|'Delivery', SnsTopic?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setIdentityNotificationTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setIdentityNotificationTopicAsync(array{Identity?: string, NotificationType?: 'Bounce'|'Complaint'|'Delivery', SnsTopic?: string, ...} $args = [])
 * @method \Aws\Result setReceiptRulePosition(array $args = [])
 * @phpstan-method \Aws\Result setReceiptRulePosition(array{RuleSetName?: string, RuleName?: string, After?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setReceiptRulePositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setReceiptRulePositionAsync(array{RuleSetName?: string, RuleName?: string, After?: string, ...} $args = [])
 * @method \Aws\Result testRenderTemplate(array $args = [])
 * @phpstan-method \Aws\Result testRenderTemplate(array{TemplateName?: string, TemplateData?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise testRenderTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testRenderTemplateAsync(array{TemplateName?: string, TemplateData?: string, ...} $args = [])
 * @method \Aws\Result updateAccountSendingEnabled(array $args = [])
 * @phpstan-method \Aws\Result updateAccountSendingEnabled(array{Enabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSendingEnabledAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountSendingEnabledAsync(array{Enabled?: bool, ...} $args = [])
 * @method \Aws\Result updateConfigurationSetEventDestination(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationSetEventDestination(array{
 *     ConfigurationSetName?: string,
 *     EventDestination?: array{
 *         Name?: string,
 *         Enabled?: bool,
 *         MatchingEventTypes?: list<'bounce'|'click'|'complaint'|'delivery'|'open'|'reject'|'renderingFailure'|'send'>,
 *         KinesisFirehoseDestination?: array{IAMRoleARN?: string, DeliveryStreamARN?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SNSDestination?: array{TopicARN?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationSetEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationSetEventDestinationAsync(array{
 *     ConfigurationSetName?: string,
 *     EventDestination?: array{
 *         Name?: string,
 *         Enabled?: bool,
 *         MatchingEventTypes?: list<'bounce'|'click'|'complaint'|'delivery'|'open'|'reject'|'renderingFailure'|'send'>,
 *         KinesisFirehoseDestination?: array{IAMRoleARN?: string, DeliveryStreamARN?: string, ...},
 *         CloudWatchDestination?: array{DimensionConfigurations?: list<array>, ...},
 *         SNSDestination?: array{TopicARN?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfigurationSetReputationMetricsEnabled(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationSetReputationMetricsEnabled(array{ConfigurationSetName?: string, Enabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationSetReputationMetricsEnabledAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationSetReputationMetricsEnabledAsync(array{ConfigurationSetName?: string, Enabled?: bool, ...} $args = [])
 * @method \Aws\Result updateConfigurationSetSendingEnabled(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationSetSendingEnabled(array{ConfigurationSetName?: string, Enabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationSetSendingEnabledAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationSetSendingEnabledAsync(array{ConfigurationSetName?: string, Enabled?: bool, ...} $args = [])
 * @method \Aws\Result updateConfigurationSetTrackingOptions(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationSetTrackingOptions(array{ConfigurationSetName?: string, TrackingOptions?: array{CustomRedirectDomain?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationSetTrackingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationSetTrackingOptionsAsync(array{ConfigurationSetName?: string, TrackingOptions?: array{CustomRedirectDomain?: string, ...}, ...} $args = [])
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
 * @method \Aws\Result updateReceiptRule(array $args = [])
 * @phpstan-method \Aws\Result updateReceiptRule(array{
 *     RuleSetName?: string,
 *     Rule?: array{
 *         Name?: string,
 *         Enabled?: bool,
 *         TlsPolicy?: 'Optional'|'Require',
 *         Recipients?: list<string>,
 *         Actions?: list<array>,
 *         ScanEnabled?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReceiptRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReceiptRuleAsync(array{
 *     RuleSetName?: string,
 *     Rule?: array{
 *         Name?: string,
 *         Enabled?: bool,
 *         TlsPolicy?: 'Optional'|'Require',
 *         Recipients?: list<string>,
 *         Actions?: list<array>,
 *         ScanEnabled?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateTemplate(array{
 *     Template?: array{TemplateName?: string, SubjectPart?: string, TextPart?: string, HtmlPart?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplateAsync(array{
 *     Template?: array{TemplateName?: string, SubjectPart?: string, TextPart?: string, HtmlPart?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyDomainDkim(array $args = [])
 * @phpstan-method \Aws\Result verifyDomainDkim(array{Domain?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyDomainDkimAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyDomainDkimAsync(array{Domain?: string, ...} $args = [])
 * @method \Aws\Result verifyDomainIdentity(array $args = [])
 * @phpstan-method \Aws\Result verifyDomainIdentity(array{Domain?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyDomainIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyDomainIdentityAsync(array{Domain?: string, ...} $args = [])
 * @method \Aws\Result verifyEmailAddress(array $args = [])
 * @phpstan-method \Aws\Result verifyEmailAddress(array{EmailAddress?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyEmailAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyEmailAddressAsync(array{EmailAddress?: string, ...} $args = [])
 * @method \Aws\Result verifyEmailIdentity(array $args = [])
 * @phpstan-method \Aws\Result verifyEmailIdentity(array{EmailAddress?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyEmailIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyEmailIdentityAsync(array{EmailAddress?: string, ...} $args = [])
 */
class SesClient extends \Aws\AwsClient
{
    /**
     * @deprecated This method will no longer work due to the deprecation of
     *             V2 credentials with SES as of 03/25/2021
     * Create an SMTP password for a given IAM user's credentials.
     *
     * The SMTP username is the Access Key ID for the provided credentials.
     *
     * @link http://docs.aws.amazon.com/ses/latest/DeveloperGuide/smtp-credentials.html#smtp-credentials-convert
     *
     * @param CredentialsInterface $creds
     *
     * @return string
     */
    public static function generateSmtpPassword(CredentialsInterface $creds)
    {
        static $version = "\x02";
        static $algo = 'sha256';
        static $message = 'SendRawEmail';
        $signature = hash_hmac($algo, $message, $creds->getSecretKey(), true);

        return base64_encode($version . $signature);
    }

    /**
     * Create an SMTP password for a given IAM user's credentials.
     *
     * The SMTP username is the Access Key ID for the provided credentials. This
     * utility method is not guaranteed to work indefinitely and is provided as
     * a convenience to customers using the generateSmtpPassword method.  It is
     * not recommended for use in production
     *
     * @link https://docs.aws.amazon.com/ses/latest/DeveloperGuide/smtp-credentials.html#smtp-credentials-convert
     *
     * @param CredentialsInterface $creds
     * @param string $region
     *
     * @return string
     */
    public static function generateSmtpPasswordV4(CredentialsInterface $creds, $region)
    {
        $key = $creds->getSecretKey();

        $date = "11111111";
        $service = "ses";
        $terminal = "aws4_request";
        $message = "SendRawEmail";
        $version = 0x04;

        $signature = self::sign($date, "AWS4" . $key);
        $signature = self::sign($region, $signature);
        $signature = self::sign($service, $signature);
        $signature = self::sign($terminal, $signature);
        $signature = self::sign($message, $signature);
        $signatureAndVersion = pack('c', $version) . $signature;

        return  base64_encode($signatureAndVersion);
    }

    private static function sign($key, $message) {
        return hash_hmac('sha256', $key, $message, true);
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        $b64 = '<div class="alert alert-info">This value will be base64 encoded on your behalf.</div>';

        $docs['shapes']['RawMessage']['append'] = $b64;

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
