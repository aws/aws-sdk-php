<?php
namespace Aws\PinpointSMSVoiceV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Pinpoint SMS Voice V2** service.
 * @method \Aws\Result associateOriginationIdentity(array $args = [])
 * @phpstan-method \Aws\Result associateOriginationIdentity(array{PoolId?: string, OriginationIdentity?: string, IsoCountryCode?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateOriginationIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateOriginationIdentityAsync(array{PoolId?: string, OriginationIdentity?: string, IsoCountryCode?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result associateProtectConfiguration(array $args = [])
 * @phpstan-method \Aws\Result associateProtectConfiguration(array{ProtectConfigurationId?: string, ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateProtectConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateProtectConfigurationAsync(array{ProtectConfigurationId?: string, ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result carrierLookup(array $args = [])
 * @phpstan-method \Aws\Result carrierLookup(array{PhoneNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise carrierLookupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise carrierLookupAsync(array{PhoneNumber?: string, ...} $args = [])
 * @method \Aws\Result createConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationSet(array{
 *     ConfigurationSetName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array{
 *     ConfigurationSetName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventDestination(array $args = [])
 * @phpstan-method \Aws\Result createEventDestination(array{
 *     ConfigurationSetName?: string,
 *     EventDestinationName?: string,
 *     MatchingEventTypes?: list<'ALL'|'MEDIA_ALL'|'MEDIA_BLOCKED'|'MEDIA_CARRIER_BLOCKED'|'MEDIA_CARRIER_UNREACHABLE'|'MEDIA_DELIVERED'|'MEDIA_FILE_INACCESSIBLE'|'MEDIA_FILE_SIZE_EXCEEDED'|'MEDIA_FILE_TYPE_UNSUPPORTED'|'MEDIA_INVALID'|'MEDIA_INVALID_MESSAGE'|'MEDIA_PENDING'|'MEDIA_QUEUED'|'MEDIA_SPAM'|'MEDIA_SUCCESSFUL'|'MEDIA_TTL_EXPIRED'|'MEDIA_UNKNOWN'|'MEDIA_UNREACHABLE'|'RCS_ALL'|'RCS_DELIVERED'|'RCS_FAILED'|'RCS_FALLEN_BACK_TO_SMS'|'RCS_PROTECT_BLOCKED'|'RCS_QUEUED'|'RCS_READ'|'RCS_SENT'|'RCS_TTL_EXPIRED'|'TEXT_ALL'|'TEXT_BLOCKED'|'TEXT_CARRIER_BLOCKED'|'TEXT_CARRIER_UNREACHABLE'|'TEXT_DELIVERED'|'TEXT_INVALID'|'TEXT_INVALID_MESSAGE'|'TEXT_PENDING'|'TEXT_PROTECT_BLOCKED'|'TEXT_QUEUED'|'TEXT_SENT'|'TEXT_SPAM'|'TEXT_SUCCESSFUL'|'TEXT_TTL_EXPIRED'|'TEXT_UNKNOWN'|'TEXT_UNREACHABLE'|'VOICE_ALL'|'VOICE_ANSWERED'|'VOICE_BUSY'|'VOICE_COMPLETED'|'VOICE_FAILED'|'VOICE_INITIATED'|'VOICE_NO_ANSWER'|'VOICE_RINGING'|'VOICE_TTL_EXPIRED'>,
 *     CloudWatchLogsDestination?: array{IamRoleArn?: string, LogGroupArn?: string, ...},
 *     KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *     SnsDestination?: array{TopicArn?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventDestinationAsync(array{
 *     ConfigurationSetName?: string,
 *     EventDestinationName?: string,
 *     MatchingEventTypes?: list<'ALL'|'MEDIA_ALL'|'MEDIA_BLOCKED'|'MEDIA_CARRIER_BLOCKED'|'MEDIA_CARRIER_UNREACHABLE'|'MEDIA_DELIVERED'|'MEDIA_FILE_INACCESSIBLE'|'MEDIA_FILE_SIZE_EXCEEDED'|'MEDIA_FILE_TYPE_UNSUPPORTED'|'MEDIA_INVALID'|'MEDIA_INVALID_MESSAGE'|'MEDIA_PENDING'|'MEDIA_QUEUED'|'MEDIA_SPAM'|'MEDIA_SUCCESSFUL'|'MEDIA_TTL_EXPIRED'|'MEDIA_UNKNOWN'|'MEDIA_UNREACHABLE'|'RCS_ALL'|'RCS_DELIVERED'|'RCS_FAILED'|'RCS_FALLEN_BACK_TO_SMS'|'RCS_PROTECT_BLOCKED'|'RCS_QUEUED'|'RCS_READ'|'RCS_SENT'|'RCS_TTL_EXPIRED'|'TEXT_ALL'|'TEXT_BLOCKED'|'TEXT_CARRIER_BLOCKED'|'TEXT_CARRIER_UNREACHABLE'|'TEXT_DELIVERED'|'TEXT_INVALID'|'TEXT_INVALID_MESSAGE'|'TEXT_PENDING'|'TEXT_PROTECT_BLOCKED'|'TEXT_QUEUED'|'TEXT_SENT'|'TEXT_SPAM'|'TEXT_SUCCESSFUL'|'TEXT_TTL_EXPIRED'|'TEXT_UNKNOWN'|'TEXT_UNREACHABLE'|'VOICE_ALL'|'VOICE_ANSWERED'|'VOICE_BUSY'|'VOICE_COMPLETED'|'VOICE_FAILED'|'VOICE_INITIATED'|'VOICE_NO_ANSWER'|'VOICE_RINGING'|'VOICE_TTL_EXPIRED'>,
 *     CloudWatchLogsDestination?: array{IamRoleArn?: string, LogGroupArn?: string, ...},
 *     KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *     SnsDestination?: array{TopicArn?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNotifyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createNotifyConfiguration(array{
 *     DisplayName?: string,
 *     UseCase?: 'CODE_VERIFICATION',
 *     DefaultTemplateId?: string,
 *     PoolId?: string,
 *     EnabledCountries?: list<string>,
 *     EnabledChannels?: list<'MMS'|'RCS'|'SMS'|'VOICE'>,
 *     DeletionProtectionEnabled?: bool,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotifyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotifyConfigurationAsync(array{
 *     DisplayName?: string,
 *     UseCase?: 'CODE_VERIFICATION',
 *     DefaultTemplateId?: string,
 *     PoolId?: string,
 *     EnabledCountries?: list<string>,
 *     EnabledChannels?: list<'MMS'|'RCS'|'SMS'|'VOICE'>,
 *     DeletionProtectionEnabled?: bool,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOptOutList(array $args = [])
 * @phpstan-method \Aws\Result createOptOutList(array{
 *     OptOutListName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOptOutListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOptOutListAsync(array{
 *     OptOutListName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPool(array $args = [])
 * @phpstan-method \Aws\Result createPool(array{
 *     OriginationIdentity?: string,
 *     IsoCountryCode?: string,
 *     MessageType?: 'PROMOTIONAL'|'TRANSACTIONAL',
 *     DeletionProtectionEnabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPoolAsync(array{
 *     OriginationIdentity?: string,
 *     IsoCountryCode?: string,
 *     MessageType?: 'PROMOTIONAL'|'TRANSACTIONAL',
 *     DeletionProtectionEnabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProtectConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createProtectConfiguration(array{
 *     ClientToken?: string,
 *     DeletionProtectionEnabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProtectConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProtectConfigurationAsync(array{
 *     ClientToken?: string,
 *     DeletionProtectionEnabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRcsAgent(array $args = [])
 * @phpstan-method \Aws\Result createRcsAgent(array{
 *     DeletionProtectionEnabled?: bool,
 *     OptOutListName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRcsAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRcsAgentAsync(array{
 *     DeletionProtectionEnabled?: bool,
 *     OptOutListName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRegistration(array $args = [])
 * @phpstan-method \Aws\Result createRegistration(array{
 *     RegistrationType?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistrationAsync(array{
 *     RegistrationType?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRegistrationAssociation(array $args = [])
 * @phpstan-method \Aws\Result createRegistrationAssociation(array{RegistrationId?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistrationAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistrationAssociationAsync(array{RegistrationId?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result createRegistrationAttachment(array $args = [])
 * @phpstan-method \Aws\Result createRegistrationAttachment(array{
 *     AttachmentBody?: string|resource|\Psr\Http\Message\StreamInterface,
 *     AttachmentUrl?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistrationAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistrationAttachmentAsync(array{
 *     AttachmentBody?: string|resource|\Psr\Http\Message\StreamInterface,
 *     AttachmentUrl?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRegistrationVersion(array $args = [])
 * @phpstan-method \Aws\Result createRegistrationVersion(array{RegistrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistrationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistrationVersionAsync(array{RegistrationId?: string, ...} $args = [])
 * @method \Aws\Result createVerifiedDestinationNumber(array $args = [])
 * @phpstan-method \Aws\Result createVerifiedDestinationNumber(array{
 *     DestinationPhoneNumber?: string,
 *     RcsAgentId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVerifiedDestinationNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVerifiedDestinationNumberAsync(array{
 *     DestinationPhoneNumber?: string,
 *     RcsAgentId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccountDefaultProtectConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountDefaultProtectConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountDefaultProtectConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountDefaultProtectConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result deleteConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationSet(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result deleteDefaultMessageType(array $args = [])
 * @phpstan-method \Aws\Result deleteDefaultMessageType(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDefaultMessageTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDefaultMessageTypeAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result deleteDefaultSenderId(array $args = [])
 * @phpstan-method \Aws\Result deleteDefaultSenderId(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDefaultSenderIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDefaultSenderIdAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result deleteEventDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteEventDestination(array{ConfigurationSetName?: string, EventDestinationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventDestinationAsync(array{ConfigurationSetName?: string, EventDestinationName?: string, ...} $args = [])
 * @method \Aws\Result deleteKeyword(array $args = [])
 * @phpstan-method \Aws\Result deleteKeyword(array{OriginationIdentity?: string, Keyword?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKeywordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKeywordAsync(array{OriginationIdentity?: string, Keyword?: string, ...} $args = [])
 * @method \Aws\Result deleteMediaMessageSpendLimitOverride(array $args = [])
 * @phpstan-method \Aws\Result deleteMediaMessageSpendLimitOverride(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMediaMessageSpendLimitOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMediaMessageSpendLimitOverrideAsync(array{...} $args = [])
 * @method \Aws\Result deleteNotifyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteNotifyConfiguration(array{NotifyConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotifyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotifyConfigurationAsync(array{NotifyConfigurationId?: string, ...} $args = [])
 * @method \Aws\Result deleteNotifyMessageSpendLimitOverride(array $args = [])
 * @phpstan-method \Aws\Result deleteNotifyMessageSpendLimitOverride(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotifyMessageSpendLimitOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotifyMessageSpendLimitOverrideAsync(array{...} $args = [])
 * @method \Aws\Result deleteOptOutList(array $args = [])
 * @phpstan-method \Aws\Result deleteOptOutList(array{OptOutListName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOptOutListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOptOutListAsync(array{OptOutListName?: string, ...} $args = [])
 * @method \Aws\Result deleteOptedOutNumber(array $args = [])
 * @phpstan-method \Aws\Result deleteOptedOutNumber(array{OptOutListName?: string, OptedOutNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOptedOutNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOptedOutNumberAsync(array{OptOutListName?: string, OptedOutNumber?: string, ...} $args = [])
 * @method \Aws\Result deletePool(array $args = [])
 * @phpstan-method \Aws\Result deletePool(array{PoolId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePoolAsync(array{PoolId?: string, ...} $args = [])
 * @method \Aws\Result deleteProtectConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteProtectConfiguration(array{ProtectConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProtectConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProtectConfigurationAsync(array{ProtectConfigurationId?: string, ...} $args = [])
 * @method \Aws\Result deleteProtectConfigurationRuleSetNumberOverride(array $args = [])
 * @phpstan-method \Aws\Result deleteProtectConfigurationRuleSetNumberOverride(array{ProtectConfigurationId?: string, DestinationPhoneNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProtectConfigurationRuleSetNumberOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProtectConfigurationRuleSetNumberOverrideAsync(array{ProtectConfigurationId?: string, DestinationPhoneNumber?: string, ...} $args = [])
 * @method \Aws\Result deleteRcsAgent(array $args = [])
 * @phpstan-method \Aws\Result deleteRcsAgent(array{RcsAgentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRcsAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRcsAgentAsync(array{RcsAgentId?: string, ...} $args = [])
 * @method \Aws\Result deleteRcsMessageSpendLimitOverride(array $args = [])
 * @phpstan-method \Aws\Result deleteRcsMessageSpendLimitOverride(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRcsMessageSpendLimitOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRcsMessageSpendLimitOverrideAsync(array{...} $args = [])
 * @method \Aws\Result deleteRegistration(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistration(array{RegistrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistrationAsync(array{RegistrationId?: string, ...} $args = [])
 * @method \Aws\Result deleteRegistrationAttachment(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistrationAttachment(array{RegistrationAttachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistrationAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistrationAttachmentAsync(array{RegistrationAttachmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteRegistrationFieldValue(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistrationFieldValue(array{RegistrationId?: string, FieldPath?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistrationFieldValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistrationFieldValueAsync(array{RegistrationId?: string, FieldPath?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTextMessageSpendLimitOverride(array $args = [])
 * @phpstan-method \Aws\Result deleteTextMessageSpendLimitOverride(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTextMessageSpendLimitOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTextMessageSpendLimitOverrideAsync(array{...} $args = [])
 * @method \Aws\Result deleteVerifiedDestinationNumber(array $args = [])
 * @phpstan-method \Aws\Result deleteVerifiedDestinationNumber(array{VerifiedDestinationNumberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVerifiedDestinationNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVerifiedDestinationNumberAsync(array{VerifiedDestinationNumberId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceMessageSpendLimitOverride(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceMessageSpendLimitOverride(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceMessageSpendLimitOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceMessageSpendLimitOverrideAsync(array{...} $args = [])
 * @method \Aws\Result describeAccountAttributes(array $args = [])
 * @phpstan-method \Aws\Result describeAccountAttributes(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeAccountLimits(array $args = [])
 * @phpstan-method \Aws\Result describeAccountLimits(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeConfigurationSets(array $args = [])
 * @phpstan-method \Aws\Result describeConfigurationSets(array{
 *     ConfigurationSetNames?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'default-message-feedback-enabled'|'default-message-type'|'default-sender-id'|'event-destination-name'|'matching-event-types'|'protect-configuration-id',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConfigurationSetsAsync(array{
 *     ConfigurationSetNames?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'default-message-feedback-enabled'|'default-message-type'|'default-sender-id'|'event-destination-name'|'matching-event-types'|'protect-configuration-id',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeKeywords(array $args = [])
 * @phpstan-method \Aws\Result describeKeywords(array{
 *     OriginationIdentity?: string,
 *     Keywords?: list<string>,
 *     Filters?: list<array{Name?: 'keyword-action', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKeywordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeKeywordsAsync(array{
 *     OriginationIdentity?: string,
 *     Keywords?: list<string>,
 *     Filters?: list<array{Name?: 'keyword-action', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeNotifyConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeNotifyConfigurations(array{
 *     NotifyConfigurationIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'default-pool'|'default-template'|'deletion-protection-enabled'|'display-name'|'enabled-channels'|'enabled-countries'|'status'|'tier-upgrade-status'|'use-case',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNotifyConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotifyConfigurationsAsync(array{
 *     NotifyConfigurationIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'default-pool'|'default-template'|'deletion-protection-enabled'|'display-name'|'enabled-channels'|'enabled-countries'|'status'|'tier-upgrade-status'|'use-case',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeNotifyTemplates(array $args = [])
 * @phpstan-method \Aws\Result describeNotifyTemplates(array{
 *     TemplateIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'channels'|'language-code'|'supported-countries'|'supported-voice-ids'|'template-type'|'tier-access',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNotifyTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotifyTemplatesAsync(array{
 *     TemplateIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'channels'|'language-code'|'supported-countries'|'supported-voice-ids'|'template-type'|'tier-access',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOptOutLists(array $args = [])
 * @phpstan-method \Aws\Result describeOptOutLists(array{OptOutListNames?: list<string>, NextToken?: string, MaxResults?: int, Owner?: 'SELF'|'SHARED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOptOutListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOptOutListsAsync(array{OptOutListNames?: list<string>, NextToken?: string, MaxResults?: int, Owner?: 'SELF'|'SHARED', ...} $args = [])
 * @method \Aws\Result describeOptedOutNumbers(array $args = [])
 * @phpstan-method \Aws\Result describeOptedOutNumbers(array{
 *     OptOutListName?: string,
 *     OptedOutNumbers?: list<string>,
 *     Filters?: list<array{Name?: 'end-user-opted-out', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOptedOutNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOptedOutNumbersAsync(array{
 *     OptOutListName?: string,
 *     OptedOutNumbers?: list<string>,
 *     Filters?: list<array{Name?: 'end-user-opted-out', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePhoneNumbers(array $args = [])
 * @phpstan-method \Aws\Result describePhoneNumbers(array{
 *     PhoneNumberIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'deletion-protection-enabled'|'iso-country-code'|'message-type'|'number-capability'|'number-type'|'opt-out-list-name'|'self-managed-opt-outs-enabled'|'status'|'two-way-channel-arn'|'two-way-enabled',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Owner?: 'SELF'|'SHARED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePhoneNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePhoneNumbersAsync(array{
 *     PhoneNumberIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'deletion-protection-enabled'|'iso-country-code'|'message-type'|'number-capability'|'number-type'|'opt-out-list-name'|'self-managed-opt-outs-enabled'|'status'|'two-way-channel-arn'|'two-way-enabled',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Owner?: 'SELF'|'SHARED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePools(array $args = [])
 * @phpstan-method \Aws\Result describePools(array{
 *     PoolIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'deletion-protection-enabled'|'message-type'|'opt-out-list-name'|'self-managed-opt-outs-enabled'|'shared-routes-enabled'|'status'|'two-way-channel-arn'|'two-way-enabled',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Owner?: 'SELF'|'SHARED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePoolsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePoolsAsync(array{
 *     PoolIds?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'deletion-protection-enabled'|'message-type'|'opt-out-list-name'|'self-managed-opt-outs-enabled'|'shared-routes-enabled'|'status'|'two-way-channel-arn'|'two-way-enabled',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Owner?: 'SELF'|'SHARED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeProtectConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeProtectConfigurations(array{
 *     ProtectConfigurationIds?: list<string>,
 *     Filters?: list<array{Name?: 'account-default'|'deletion-protection-enabled', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProtectConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProtectConfigurationsAsync(array{
 *     ProtectConfigurationIds?: list<string>,
 *     Filters?: list<array{Name?: 'account-default'|'deletion-protection-enabled', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRcsAgentCountryLaunchStatus(array $args = [])
 * @phpstan-method \Aws\Result describeRcsAgentCountryLaunchStatus(array{
 *     RcsAgentId?: string,
 *     IsoCountryCodes?: list<string>,
 *     Filters?: list<array{Name?: 'country-launch-status', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRcsAgentCountryLaunchStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRcsAgentCountryLaunchStatusAsync(array{
 *     RcsAgentId?: string,
 *     IsoCountryCodes?: list<string>,
 *     Filters?: list<array{Name?: 'country-launch-status', Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRcsAgents(array $args = [])
 * @phpstan-method \Aws\Result describeRcsAgents(array{
 *     RcsAgentIds?: list<string>,
 *     Owner?: 'SELF'|'SHARED',
 *     Filters?: list<array{
 *         Name?: 'deletion-protection-enabled'|'opt-out-list-name'|'self-managed-opt-outs-enabled'|'status'|'two-way-channel-arn'|'two-way-enabled',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRcsAgentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRcsAgentsAsync(array{
 *     RcsAgentIds?: list<string>,
 *     Owner?: 'SELF'|'SHARED',
 *     Filters?: list<array{
 *         Name?: 'deletion-protection-enabled'|'opt-out-list-name'|'self-managed-opt-outs-enabled'|'status'|'two-way-channel-arn'|'two-way-enabled',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRegistrationAttachments(array $args = [])
 * @phpstan-method \Aws\Result describeRegistrationAttachments(array{
 *     RegistrationAttachmentIds?: list<string>,
 *     Filters?: list<array{Name?: 'attachment-status', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegistrationAttachmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegistrationAttachmentsAsync(array{
 *     RegistrationAttachmentIds?: list<string>,
 *     Filters?: list<array{Name?: 'attachment-status', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRegistrationFieldDefinitions(array $args = [])
 * @phpstan-method \Aws\Result describeRegistrationFieldDefinitions(array{
 *     RegistrationType?: string,
 *     SectionPath?: string,
 *     FieldPaths?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegistrationFieldDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegistrationFieldDefinitionsAsync(array{
 *     RegistrationType?: string,
 *     SectionPath?: string,
 *     FieldPaths?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRegistrationFieldValues(array $args = [])
 * @phpstan-method \Aws\Result describeRegistrationFieldValues(array{
 *     RegistrationId?: string,
 *     VersionNumber?: int,
 *     SectionPath?: string,
 *     FieldPaths?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegistrationFieldValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegistrationFieldValuesAsync(array{
 *     RegistrationId?: string,
 *     VersionNumber?: int,
 *     SectionPath?: string,
 *     FieldPaths?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRegistrationSectionDefinitions(array $args = [])
 * @phpstan-method \Aws\Result describeRegistrationSectionDefinitions(array{RegistrationType?: string, SectionPaths?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegistrationSectionDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegistrationSectionDefinitionsAsync(array{RegistrationType?: string, SectionPaths?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeRegistrationTypeDefinitions(array $args = [])
 * @phpstan-method \Aws\Result describeRegistrationTypeDefinitions(array{
 *     RegistrationTypes?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'supported-association-iso-country-code'|'supported-association-resource-type',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegistrationTypeDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegistrationTypeDefinitionsAsync(array{
 *     RegistrationTypes?: list<string>,
 *     Filters?: list<array{
 *         Name?: 'supported-association-iso-country-code'|'supported-association-resource-type',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRegistrationVersions(array $args = [])
 * @phpstan-method \Aws\Result describeRegistrationVersions(array{
 *     RegistrationId?: string,
 *     VersionNumbers?: list<int>,
 *     Filters?: list<array{Name?: 'registration-version-status', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegistrationVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegistrationVersionsAsync(array{
 *     RegistrationId?: string,
 *     VersionNumbers?: list<int>,
 *     Filters?: list<array{Name?: 'registration-version-status', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRegistrations(array $args = [])
 * @phpstan-method \Aws\Result describeRegistrations(array{
 *     RegistrationIds?: list<string>,
 *     Filters?: list<array{Name?: 'registration-status'|'registration-type', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegistrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegistrationsAsync(array{
 *     RegistrationIds?: list<string>,
 *     Filters?: list<array{Name?: 'registration-status'|'registration-type', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSenderIds(array $args = [])
 * @phpstan-method \Aws\Result describeSenderIds(array{
 *     SenderIds?: list<array{SenderId?: string, IsoCountryCode?: string, ...}>,
 *     Filters?: list<array{
 *         Name?: 'deletion-protection-enabled'|'iso-country-code'|'message-type'|'registered'|'sender-id',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Owner?: 'SELF'|'SHARED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSenderIdsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSenderIdsAsync(array{
 *     SenderIds?: list<array{SenderId?: string, IsoCountryCode?: string, ...}>,
 *     Filters?: list<array{
 *         Name?: 'deletion-protection-enabled'|'iso-country-code'|'message-type'|'registered'|'sender-id',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Owner?: 'SELF'|'SHARED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSpendLimits(array $args = [])
 * @phpstan-method \Aws\Result describeSpendLimits(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSpendLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSpendLimitsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeVerifiedDestinationNumbers(array $args = [])
 * @phpstan-method \Aws\Result describeVerifiedDestinationNumbers(array{
 *     VerifiedDestinationNumberIds?: list<string>,
 *     DestinationPhoneNumbers?: list<string>,
 *     Filters?: list<array{Name?: 'rcs-agent-id'|'status', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVerifiedDestinationNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVerifiedDestinationNumbersAsync(array{
 *     VerifiedDestinationNumberIds?: list<string>,
 *     DestinationPhoneNumbers?: list<string>,
 *     Filters?: list<array{Name?: 'rcs-agent-id'|'status', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateOriginationIdentity(array $args = [])
 * @phpstan-method \Aws\Result disassociateOriginationIdentity(array{PoolId?: string, OriginationIdentity?: string, IsoCountryCode?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateOriginationIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateOriginationIdentityAsync(array{PoolId?: string, OriginationIdentity?: string, IsoCountryCode?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateProtectConfiguration(array $args = [])
 * @phpstan-method \Aws\Result disassociateProtectConfiguration(array{ProtectConfigurationId?: string, ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateProtectConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateProtectConfigurationAsync(array{ProtectConfigurationId?: string, ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result discardRegistrationVersion(array $args = [])
 * @phpstan-method \Aws\Result discardRegistrationVersion(array{RegistrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise discardRegistrationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise discardRegistrationVersionAsync(array{RegistrationId?: string, ...} $args = [])
 * @method \Aws\Result getProtectConfigurationCountryRuleSet(array $args = [])
 * @phpstan-method \Aws\Result getProtectConfigurationCountryRuleSet(array{ProtectConfigurationId?: string, NumberCapability?: 'MMS'|'RCS'|'SMS'|'VOICE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProtectConfigurationCountryRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProtectConfigurationCountryRuleSetAsync(array{ProtectConfigurationId?: string, NumberCapability?: 'MMS'|'RCS'|'SMS'|'VOICE', ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listNotifyCountries(array $args = [])
 * @phpstan-method \Aws\Result listNotifyCountries(array{
 *     Channels?: list<'MMS'|'RCS'|'SMS'|'VOICE'>,
 *     UseCases?: list<'CODE_VERIFICATION'>,
 *     Tier?: 'ADVANCED'|'BASIC',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotifyCountriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotifyCountriesAsync(array{
 *     Channels?: list<'MMS'|'RCS'|'SMS'|'VOICE'>,
 *     UseCases?: list<'CODE_VERIFICATION'>,
 *     Tier?: 'ADVANCED'|'BASIC',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPoolOriginationIdentities(array $args = [])
 * @phpstan-method \Aws\Result listPoolOriginationIdentities(array{
 *     PoolId?: string,
 *     Filters?: list<array{Name?: 'iso-country-code'|'number-capability', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoolOriginationIdentitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoolOriginationIdentitiesAsync(array{
 *     PoolId?: string,
 *     Filters?: list<array{Name?: 'iso-country-code'|'number-capability', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProtectConfigurationRuleSetNumberOverrides(array $args = [])
 * @phpstan-method \Aws\Result listProtectConfigurationRuleSetNumberOverrides(array{
 *     ProtectConfigurationId?: string,
 *     Filters?: list<array{
 *         Name?: 'action'|'created-after'|'created-before'|'destination-phone-number-begins-with'|'expires-after'|'expires-before'|'iso-country-code',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProtectConfigurationRuleSetNumberOverridesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProtectConfigurationRuleSetNumberOverridesAsync(array{
 *     ProtectConfigurationId?: string,
 *     Filters?: list<array{
 *         Name?: 'action'|'created-after'|'created-before'|'destination-phone-number-begins-with'|'expires-after'|'expires-before'|'iso-country-code',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRegistrationAssociations(array $args = [])
 * @phpstan-method \Aws\Result listRegistrationAssociations(array{
 *     RegistrationId?: string,
 *     Filters?: list<array{Name?: 'iso-country-code'|'resource-type', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegistrationAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegistrationAssociationsAsync(array{
 *     RegistrationId?: string,
 *     Filters?: list<array{Name?: 'iso-country-code'|'resource-type', Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putKeyword(array $args = [])
 * @phpstan-method \Aws\Result putKeyword(array{
 *     OriginationIdentity?: string,
 *     Keyword?: string,
 *     KeywordMessage?: string,
 *     KeywordAction?: 'AUTOMATIC_RESPONSE'|'OPT_IN'|'OPT_OUT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putKeywordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putKeywordAsync(array{
 *     OriginationIdentity?: string,
 *     Keyword?: string,
 *     KeywordMessage?: string,
 *     KeywordAction?: 'AUTOMATIC_RESPONSE'|'OPT_IN'|'OPT_OUT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putMessageFeedback(array $args = [])
 * @phpstan-method \Aws\Result putMessageFeedback(array{MessageId?: string, MessageFeedbackStatus?: 'FAILED'|'RECEIVED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putMessageFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMessageFeedbackAsync(array{MessageId?: string, MessageFeedbackStatus?: 'FAILED'|'RECEIVED', ...} $args = [])
 * @method \Aws\Result putOptedOutNumber(array $args = [])
 * @phpstan-method \Aws\Result putOptedOutNumber(array{OptOutListName?: string, OptedOutNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putOptedOutNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putOptedOutNumberAsync(array{OptOutListName?: string, OptedOutNumber?: string, ...} $args = [])
 * @method \Aws\Result putProtectConfigurationRuleSetNumberOverride(array $args = [])
 * @phpstan-method \Aws\Result putProtectConfigurationRuleSetNumberOverride(array{
 *     ClientToken?: string,
 *     ProtectConfigurationId?: string,
 *     DestinationPhoneNumber?: string,
 *     Action?: 'ALLOW'|'BLOCK',
 *     ExpirationTimestamp?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putProtectConfigurationRuleSetNumberOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putProtectConfigurationRuleSetNumberOverrideAsync(array{
 *     ClientToken?: string,
 *     ProtectConfigurationId?: string,
 *     DestinationPhoneNumber?: string,
 *     Action?: 'ALLOW'|'BLOCK',
 *     ExpirationTimestamp?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putRegistrationFieldValue(array $args = [])
 * @phpstan-method \Aws\Result putRegistrationFieldValue(array{
 *     RegistrationId?: string,
 *     FieldPath?: string,
 *     SelectChoices?: list<string>,
 *     TextValue?: string,
 *     RegistrationAttachmentId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRegistrationFieldValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRegistrationFieldValueAsync(array{
 *     RegistrationId?: string,
 *     FieldPath?: string,
 *     SelectChoices?: list<string>,
 *     TextValue?: string,
 *     RegistrationAttachmentId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result releasePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result releasePhoneNumber(array{PhoneNumberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise releasePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise releasePhoneNumberAsync(array{PhoneNumberId?: string, ...} $args = [])
 * @method \Aws\Result releaseSenderId(array $args = [])
 * @phpstan-method \Aws\Result releaseSenderId(array{SenderId?: string, IsoCountryCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise releaseSenderIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise releaseSenderIdAsync(array{SenderId?: string, IsoCountryCode?: string, ...} $args = [])
 * @method \Aws\Result requestPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result requestPhoneNumber(array{
 *     IsoCountryCode?: string,
 *     MessageType?: 'PROMOTIONAL'|'TRANSACTIONAL',
 *     NumberCapabilities?: list<'MMS'|'RCS'|'SMS'|'VOICE'>,
 *     NumberType?: 'LONG_CODE'|'SIMULATOR'|'TEN_DLC'|'TOLL_FREE',
 *     OptOutListName?: string,
 *     PoolId?: string,
 *     RegistrationId?: string,
 *     InternationalSendingEnabled?: bool,
 *     DeletionProtectionEnabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise requestPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise requestPhoneNumberAsync(array{
 *     IsoCountryCode?: string,
 *     MessageType?: 'PROMOTIONAL'|'TRANSACTIONAL',
 *     NumberCapabilities?: list<'MMS'|'RCS'|'SMS'|'VOICE'>,
 *     NumberType?: 'LONG_CODE'|'SIMULATOR'|'TEN_DLC'|'TOLL_FREE',
 *     OptOutListName?: string,
 *     PoolId?: string,
 *     RegistrationId?: string,
 *     InternationalSendingEnabled?: bool,
 *     DeletionProtectionEnabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result requestSenderId(array $args = [])
 * @phpstan-method \Aws\Result requestSenderId(array{
 *     SenderId?: string,
 *     IsoCountryCode?: string,
 *     MessageTypes?: list<'PROMOTIONAL'|'TRANSACTIONAL'>,
 *     DeletionProtectionEnabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise requestSenderIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise requestSenderIdAsync(array{
 *     SenderId?: string,
 *     IsoCountryCode?: string,
 *     MessageTypes?: list<'PROMOTIONAL'|'TRANSACTIONAL'>,
 *     DeletionProtectionEnabled?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendDestinationNumberVerificationCode(array $args = [])
 * @phpstan-method \Aws\Result sendDestinationNumberVerificationCode(array{
 *     VerifiedDestinationNumberId?: string,
 *     VerificationChannel?: 'TEXT'|'VOICE',
 *     LanguageCode?: 'DE_DE'|'EN_GB'|'EN_US'|'ES_419'|'ES_ES'|'FR_CA'|'FR_FR'|'IT_IT'|'JA_JP'|'KO_KR'|'PT_BR'|'ZH_CN'|'ZH_TW',
 *     OriginationIdentity?: string,
 *     ConfigurationSetName?: string,
 *     Context?: array<string, string>,
 *     DestinationCountryParameters?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendDestinationNumberVerificationCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendDestinationNumberVerificationCodeAsync(array{
 *     VerifiedDestinationNumberId?: string,
 *     VerificationChannel?: 'TEXT'|'VOICE',
 *     LanguageCode?: 'DE_DE'|'EN_GB'|'EN_US'|'ES_419'|'ES_ES'|'FR_CA'|'FR_FR'|'IT_IT'|'JA_JP'|'KO_KR'|'PT_BR'|'ZH_CN'|'ZH_TW',
 *     OriginationIdentity?: string,
 *     ConfigurationSetName?: string,
 *     Context?: array<string, string>,
 *     DestinationCountryParameters?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendMediaMessage(array $args = [])
 * @phpstan-method \Aws\Result sendMediaMessage(array{
 *     DestinationPhoneNumber?: string,
 *     OriginationIdentity?: string,
 *     MessageBody?: string,
 *     MediaUrls?: list<string>,
 *     ConfigurationSetName?: string,
 *     MaxPrice?: string,
 *     TimeToLive?: int,
 *     Context?: array<string, string>,
 *     DryRun?: bool,
 *     ProtectConfigurationId?: string,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendMediaMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendMediaMessageAsync(array{
 *     DestinationPhoneNumber?: string,
 *     OriginationIdentity?: string,
 *     MessageBody?: string,
 *     MediaUrls?: list<string>,
 *     ConfigurationSetName?: string,
 *     MaxPrice?: string,
 *     TimeToLive?: int,
 *     Context?: array<string, string>,
 *     DryRun?: bool,
 *     ProtectConfigurationId?: string,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendNotifyTextMessage(array $args = [])
 * @phpstan-method \Aws\Result sendNotifyTextMessage(array{
 *     NotifyConfigurationId?: string,
 *     DestinationPhoneNumber?: string,
 *     TemplateId?: string,
 *     TemplateVariables?: array<string, string>,
 *     TimeToLive?: int,
 *     Context?: array<string, string>,
 *     ConfigurationSetName?: string,
 *     DryRun?: bool,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendNotifyTextMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendNotifyTextMessageAsync(array{
 *     NotifyConfigurationId?: string,
 *     DestinationPhoneNumber?: string,
 *     TemplateId?: string,
 *     TemplateVariables?: array<string, string>,
 *     TimeToLive?: int,
 *     Context?: array<string, string>,
 *     ConfigurationSetName?: string,
 *     DryRun?: bool,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendNotifyVoiceMessage(array $args = [])
 * @phpstan-method \Aws\Result sendNotifyVoiceMessage(array{
 *     NotifyConfigurationId?: string,
 *     DestinationPhoneNumber?: string,
 *     TemplateId?: string,
 *     TemplateVariables?: array<string, string>,
 *     VoiceId?: 'AMY'|'ASTRID'|'BIANCA'|'BRIAN'|'CAMILA'|'CARLA'|'CARMEN'|'CELINE'|'CHANTAL'|'CONCHITA'|'CRISTIANO'|'DORA'|'EMMA'|'ENRIQUE'|'EWA'|'FILIZ'|'GERAINT'|'GIORGIO'|'GWYNETH'|'HANS'|'INES'|'IVY'|'JACEK'|'JAN'|'JOANNA'|'JOEY'|'JUSTIN'|'KARL'|'KENDRA'|'KIMBERLY'|'LEA'|'LIV'|'LOTTE'|'LUCIA'|'LUPE'|'MADS'|'MAJA'|'MARLENE'|'MATHIEU'|'MATTHEW'|'MAXIM'|'MIA'|'MIGUEL'|'MIZUKI'|'NAJA'|'NICOLE'|'PENELOPE'|'RAVEENA'|'RICARDO'|'RUBEN'|'RUSSELL'|'SALLI'|'SEOYEON'|'TAKUMI'|'TATYANA'|'VICKI'|'VITORIA'|'ZEINA'|'ZHIYU',
 *     TimeToLive?: int,
 *     Context?: array<string, string>,
 *     ConfigurationSetName?: string,
 *     DryRun?: bool,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendNotifyVoiceMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendNotifyVoiceMessageAsync(array{
 *     NotifyConfigurationId?: string,
 *     DestinationPhoneNumber?: string,
 *     TemplateId?: string,
 *     TemplateVariables?: array<string, string>,
 *     VoiceId?: 'AMY'|'ASTRID'|'BIANCA'|'BRIAN'|'CAMILA'|'CARLA'|'CARMEN'|'CELINE'|'CHANTAL'|'CONCHITA'|'CRISTIANO'|'DORA'|'EMMA'|'ENRIQUE'|'EWA'|'FILIZ'|'GERAINT'|'GIORGIO'|'GWYNETH'|'HANS'|'INES'|'IVY'|'JACEK'|'JAN'|'JOANNA'|'JOEY'|'JUSTIN'|'KARL'|'KENDRA'|'KIMBERLY'|'LEA'|'LIV'|'LOTTE'|'LUCIA'|'LUPE'|'MADS'|'MAJA'|'MARLENE'|'MATHIEU'|'MATTHEW'|'MAXIM'|'MIA'|'MIGUEL'|'MIZUKI'|'NAJA'|'NICOLE'|'PENELOPE'|'RAVEENA'|'RICARDO'|'RUBEN'|'RUSSELL'|'SALLI'|'SEOYEON'|'TAKUMI'|'TATYANA'|'VICKI'|'VITORIA'|'ZEINA'|'ZHIYU',
 *     TimeToLive?: int,
 *     Context?: array<string, string>,
 *     ConfigurationSetName?: string,
 *     DryRun?: bool,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendRcsMessage(array $args = [])
 * @phpstan-method \Aws\Result sendRcsMessage(array{
 *     DestinationPhoneNumber?: string,
 *     OriginationIdentity?: string,
 *     RcsMessageContent?: array{
 *         Content?: array{TextMessage?: array, FileMessage?: array, RichCard?: array, Carousel?: array, ...},
 *         Suggestions?: list<array>,
 *         ...,
 *     },
 *     TimeToLive?: int,
 *     MessageTrafficType?: string,
 *     FallbackConfiguration?: array{
 *         Channel?: 'MMS'|'SMS',
 *         MessageBody?: string,
 *         MediaUrls?: list<string>,
 *         OriginationIdentity?: string,
 *         ...,
 *     },
 *     ProtectConfigurationId?: string,
 *     ConfigurationSetName?: string,
 *     MaxPrice?: string,
 *     DryRun?: bool,
 *     Context?: array<string, string>,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendRcsMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendRcsMessageAsync(array{
 *     DestinationPhoneNumber?: string,
 *     OriginationIdentity?: string,
 *     RcsMessageContent?: array{
 *         Content?: array{TextMessage?: array, FileMessage?: array, RichCard?: array, Carousel?: array, ...},
 *         Suggestions?: list<array>,
 *         ...,
 *     },
 *     TimeToLive?: int,
 *     MessageTrafficType?: string,
 *     FallbackConfiguration?: array{
 *         Channel?: 'MMS'|'SMS',
 *         MessageBody?: string,
 *         MediaUrls?: list<string>,
 *         OriginationIdentity?: string,
 *         ...,
 *     },
 *     ProtectConfigurationId?: string,
 *     ConfigurationSetName?: string,
 *     MaxPrice?: string,
 *     DryRun?: bool,
 *     Context?: array<string, string>,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendTextMessage(array $args = [])
 * @phpstan-method \Aws\Result sendTextMessage(array{
 *     DestinationPhoneNumber?: string,
 *     OriginationIdentity?: string,
 *     MessageBody?: string,
 *     MessageType?: 'PROMOTIONAL'|'TRANSACTIONAL',
 *     Keyword?: string,
 *     ConfigurationSetName?: string,
 *     MaxPrice?: string,
 *     TimeToLive?: int,
 *     Context?: array<string, string>,
 *     DestinationCountryParameters?: array<string, string>,
 *     DryRun?: bool,
 *     ProtectConfigurationId?: string,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendTextMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendTextMessageAsync(array{
 *     DestinationPhoneNumber?: string,
 *     OriginationIdentity?: string,
 *     MessageBody?: string,
 *     MessageType?: 'PROMOTIONAL'|'TRANSACTIONAL',
 *     Keyword?: string,
 *     ConfigurationSetName?: string,
 *     MaxPrice?: string,
 *     TimeToLive?: int,
 *     Context?: array<string, string>,
 *     DestinationCountryParameters?: array<string, string>,
 *     DryRun?: bool,
 *     ProtectConfigurationId?: string,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendVoiceMessage(array $args = [])
 * @phpstan-method \Aws\Result sendVoiceMessage(array{
 *     DestinationPhoneNumber?: string,
 *     OriginationIdentity?: string,
 *     MessageBody?: string,
 *     MessageBodyTextType?: 'SSML'|'TEXT',
 *     VoiceId?: 'AMY'|'ASTRID'|'BIANCA'|'BRIAN'|'CAMILA'|'CARLA'|'CARMEN'|'CELINE'|'CHANTAL'|'CONCHITA'|'CRISTIANO'|'DORA'|'EMMA'|'ENRIQUE'|'EWA'|'FILIZ'|'GERAINT'|'GIORGIO'|'GWYNETH'|'HANS'|'INES'|'IVY'|'JACEK'|'JAN'|'JOANNA'|'JOEY'|'JUSTIN'|'KARL'|'KENDRA'|'KIMBERLY'|'LEA'|'LIV'|'LOTTE'|'LUCIA'|'LUPE'|'MADS'|'MAJA'|'MARLENE'|'MATHIEU'|'MATTHEW'|'MAXIM'|'MIA'|'MIGUEL'|'MIZUKI'|'NAJA'|'NICOLE'|'PENELOPE'|'RAVEENA'|'RICARDO'|'RUBEN'|'RUSSELL'|'SALLI'|'SEOYEON'|'TAKUMI'|'TATYANA'|'VICKI'|'VITORIA'|'ZEINA'|'ZHIYU',
 *     ConfigurationSetName?: string,
 *     MaxPricePerMinute?: string,
 *     TimeToLive?: int,
 *     Context?: array<string, string>,
 *     DryRun?: bool,
 *     ProtectConfigurationId?: string,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendVoiceMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendVoiceMessageAsync(array{
 *     DestinationPhoneNumber?: string,
 *     OriginationIdentity?: string,
 *     MessageBody?: string,
 *     MessageBodyTextType?: 'SSML'|'TEXT',
 *     VoiceId?: 'AMY'|'ASTRID'|'BIANCA'|'BRIAN'|'CAMILA'|'CARLA'|'CARMEN'|'CELINE'|'CHANTAL'|'CONCHITA'|'CRISTIANO'|'DORA'|'EMMA'|'ENRIQUE'|'EWA'|'FILIZ'|'GERAINT'|'GIORGIO'|'GWYNETH'|'HANS'|'INES'|'IVY'|'JACEK'|'JAN'|'JOANNA'|'JOEY'|'JUSTIN'|'KARL'|'KENDRA'|'KIMBERLY'|'LEA'|'LIV'|'LOTTE'|'LUCIA'|'LUPE'|'MADS'|'MAJA'|'MARLENE'|'MATHIEU'|'MATTHEW'|'MAXIM'|'MIA'|'MIGUEL'|'MIZUKI'|'NAJA'|'NICOLE'|'PENELOPE'|'RAVEENA'|'RICARDO'|'RUBEN'|'RUSSELL'|'SALLI'|'SEOYEON'|'TAKUMI'|'TATYANA'|'VICKI'|'VITORIA'|'ZEINA'|'ZHIYU',
 *     ConfigurationSetName?: string,
 *     MaxPricePerMinute?: string,
 *     TimeToLive?: int,
 *     Context?: array<string, string>,
 *     DryRun?: bool,
 *     ProtectConfigurationId?: string,
 *     MessageFeedbackEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setAccountDefaultProtectConfiguration(array $args = [])
 * @phpstan-method \Aws\Result setAccountDefaultProtectConfiguration(array{ProtectConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setAccountDefaultProtectConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setAccountDefaultProtectConfigurationAsync(array{ProtectConfigurationId?: string, ...} $args = [])
 * @method \Aws\Result setDefaultMessageFeedbackEnabled(array $args = [])
 * @phpstan-method \Aws\Result setDefaultMessageFeedbackEnabled(array{ConfigurationSetName?: string, MessageFeedbackEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setDefaultMessageFeedbackEnabledAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setDefaultMessageFeedbackEnabledAsync(array{ConfigurationSetName?: string, MessageFeedbackEnabled?: bool, ...} $args = [])
 * @method \Aws\Result setDefaultMessageType(array $args = [])
 * @phpstan-method \Aws\Result setDefaultMessageType(array{ConfigurationSetName?: string, MessageType?: 'PROMOTIONAL'|'TRANSACTIONAL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setDefaultMessageTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setDefaultMessageTypeAsync(array{ConfigurationSetName?: string, MessageType?: 'PROMOTIONAL'|'TRANSACTIONAL', ...} $args = [])
 * @method \Aws\Result setDefaultSenderId(array $args = [])
 * @phpstan-method \Aws\Result setDefaultSenderId(array{ConfigurationSetName?: string, SenderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setDefaultSenderIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setDefaultSenderIdAsync(array{ConfigurationSetName?: string, SenderId?: string, ...} $args = [])
 * @method \Aws\Result setMediaMessageSpendLimitOverride(array $args = [])
 * @phpstan-method \Aws\Result setMediaMessageSpendLimitOverride(array{MonthlyLimit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setMediaMessageSpendLimitOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setMediaMessageSpendLimitOverrideAsync(array{MonthlyLimit?: int, ...} $args = [])
 * @method \Aws\Result setNotifyMessageSpendLimitOverride(array $args = [])
 * @phpstan-method \Aws\Result setNotifyMessageSpendLimitOverride(array{MonthlyLimit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setNotifyMessageSpendLimitOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setNotifyMessageSpendLimitOverrideAsync(array{MonthlyLimit?: int, ...} $args = [])
 * @method \Aws\Result setRcsMessageSpendLimitOverride(array $args = [])
 * @phpstan-method \Aws\Result setRcsMessageSpendLimitOverride(array{MonthlyLimit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setRcsMessageSpendLimitOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setRcsMessageSpendLimitOverrideAsync(array{MonthlyLimit?: int, ...} $args = [])
 * @method \Aws\Result setTextMessageSpendLimitOverride(array $args = [])
 * @phpstan-method \Aws\Result setTextMessageSpendLimitOverride(array{MonthlyLimit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setTextMessageSpendLimitOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setTextMessageSpendLimitOverrideAsync(array{MonthlyLimit?: int, ...} $args = [])
 * @method \Aws\Result setVoiceMessageSpendLimitOverride(array $args = [])
 * @phpstan-method \Aws\Result setVoiceMessageSpendLimitOverride(array{MonthlyLimit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setVoiceMessageSpendLimitOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setVoiceMessageSpendLimitOverrideAsync(array{MonthlyLimit?: int, ...} $args = [])
 * @method \Aws\Result submitRegistrationVersion(array $args = [])
 * @phpstan-method \Aws\Result submitRegistrationVersion(array{RegistrationId?: string, AwsReview?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise submitRegistrationVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitRegistrationVersionAsync(array{RegistrationId?: string, AwsReview?: bool, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateEventDestination(array $args = [])
 * @phpstan-method \Aws\Result updateEventDestination(array{
 *     ConfigurationSetName?: string,
 *     EventDestinationName?: string,
 *     Enabled?: bool,
 *     MatchingEventTypes?: list<'ALL'|'MEDIA_ALL'|'MEDIA_BLOCKED'|'MEDIA_CARRIER_BLOCKED'|'MEDIA_CARRIER_UNREACHABLE'|'MEDIA_DELIVERED'|'MEDIA_FILE_INACCESSIBLE'|'MEDIA_FILE_SIZE_EXCEEDED'|'MEDIA_FILE_TYPE_UNSUPPORTED'|'MEDIA_INVALID'|'MEDIA_INVALID_MESSAGE'|'MEDIA_PENDING'|'MEDIA_QUEUED'|'MEDIA_SPAM'|'MEDIA_SUCCESSFUL'|'MEDIA_TTL_EXPIRED'|'MEDIA_UNKNOWN'|'MEDIA_UNREACHABLE'|'RCS_ALL'|'RCS_DELIVERED'|'RCS_FAILED'|'RCS_FALLEN_BACK_TO_SMS'|'RCS_PROTECT_BLOCKED'|'RCS_QUEUED'|'RCS_READ'|'RCS_SENT'|'RCS_TTL_EXPIRED'|'TEXT_ALL'|'TEXT_BLOCKED'|'TEXT_CARRIER_BLOCKED'|'TEXT_CARRIER_UNREACHABLE'|'TEXT_DELIVERED'|'TEXT_INVALID'|'TEXT_INVALID_MESSAGE'|'TEXT_PENDING'|'TEXT_PROTECT_BLOCKED'|'TEXT_QUEUED'|'TEXT_SENT'|'TEXT_SPAM'|'TEXT_SUCCESSFUL'|'TEXT_TTL_EXPIRED'|'TEXT_UNKNOWN'|'TEXT_UNREACHABLE'|'VOICE_ALL'|'VOICE_ANSWERED'|'VOICE_BUSY'|'VOICE_COMPLETED'|'VOICE_FAILED'|'VOICE_INITIATED'|'VOICE_NO_ANSWER'|'VOICE_RINGING'|'VOICE_TTL_EXPIRED'>,
 *     CloudWatchLogsDestination?: array{IamRoleArn?: string, LogGroupArn?: string, ...},
 *     KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *     SnsDestination?: array{TopicArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventDestinationAsync(array{
 *     ConfigurationSetName?: string,
 *     EventDestinationName?: string,
 *     Enabled?: bool,
 *     MatchingEventTypes?: list<'ALL'|'MEDIA_ALL'|'MEDIA_BLOCKED'|'MEDIA_CARRIER_BLOCKED'|'MEDIA_CARRIER_UNREACHABLE'|'MEDIA_DELIVERED'|'MEDIA_FILE_INACCESSIBLE'|'MEDIA_FILE_SIZE_EXCEEDED'|'MEDIA_FILE_TYPE_UNSUPPORTED'|'MEDIA_INVALID'|'MEDIA_INVALID_MESSAGE'|'MEDIA_PENDING'|'MEDIA_QUEUED'|'MEDIA_SPAM'|'MEDIA_SUCCESSFUL'|'MEDIA_TTL_EXPIRED'|'MEDIA_UNKNOWN'|'MEDIA_UNREACHABLE'|'RCS_ALL'|'RCS_DELIVERED'|'RCS_FAILED'|'RCS_FALLEN_BACK_TO_SMS'|'RCS_PROTECT_BLOCKED'|'RCS_QUEUED'|'RCS_READ'|'RCS_SENT'|'RCS_TTL_EXPIRED'|'TEXT_ALL'|'TEXT_BLOCKED'|'TEXT_CARRIER_BLOCKED'|'TEXT_CARRIER_UNREACHABLE'|'TEXT_DELIVERED'|'TEXT_INVALID'|'TEXT_INVALID_MESSAGE'|'TEXT_PENDING'|'TEXT_PROTECT_BLOCKED'|'TEXT_QUEUED'|'TEXT_SENT'|'TEXT_SPAM'|'TEXT_SUCCESSFUL'|'TEXT_TTL_EXPIRED'|'TEXT_UNKNOWN'|'TEXT_UNREACHABLE'|'VOICE_ALL'|'VOICE_ANSWERED'|'VOICE_BUSY'|'VOICE_COMPLETED'|'VOICE_FAILED'|'VOICE_INITIATED'|'VOICE_NO_ANSWER'|'VOICE_RINGING'|'VOICE_TTL_EXPIRED'>,
 *     CloudWatchLogsDestination?: array{IamRoleArn?: string, LogGroupArn?: string, ...},
 *     KinesisFirehoseDestination?: array{IamRoleArn?: string, DeliveryStreamArn?: string, ...},
 *     SnsDestination?: array{TopicArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNotifyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateNotifyConfiguration(array{
 *     NotifyConfigurationId?: string,
 *     DefaultTemplateId?: string,
 *     PoolId?: string,
 *     EnabledCountries?: list<string>,
 *     EnabledChannels?: list<'MMS'|'RCS'|'SMS'|'VOICE'>,
 *     DeletionProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotifyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotifyConfigurationAsync(array{
 *     NotifyConfigurationId?: string,
 *     DefaultTemplateId?: string,
 *     PoolId?: string,
 *     EnabledCountries?: list<string>,
 *     EnabledChannels?: list<'MMS'|'RCS'|'SMS'|'VOICE'>,
 *     DeletionProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result updatePhoneNumber(array{
 *     PhoneNumberId?: string,
 *     TwoWayEnabled?: bool,
 *     TwoWayChannelArn?: string,
 *     TwoWayChannelRole?: string,
 *     SelfManagedOptOutsEnabled?: bool,
 *     OptOutListName?: string,
 *     InternationalSendingEnabled?: bool,
 *     DeletionProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePhoneNumberAsync(array{
 *     PhoneNumberId?: string,
 *     TwoWayEnabled?: bool,
 *     TwoWayChannelArn?: string,
 *     TwoWayChannelRole?: string,
 *     SelfManagedOptOutsEnabled?: bool,
 *     OptOutListName?: string,
 *     InternationalSendingEnabled?: bool,
 *     DeletionProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePool(array $args = [])
 * @phpstan-method \Aws\Result updatePool(array{
 *     PoolId?: string,
 *     TwoWayEnabled?: bool,
 *     TwoWayChannelArn?: string,
 *     TwoWayChannelRole?: string,
 *     SelfManagedOptOutsEnabled?: bool,
 *     OptOutListName?: string,
 *     SharedRoutesEnabled?: bool,
 *     DeletionProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePoolAsync(array{
 *     PoolId?: string,
 *     TwoWayEnabled?: bool,
 *     TwoWayChannelArn?: string,
 *     TwoWayChannelRole?: string,
 *     SelfManagedOptOutsEnabled?: bool,
 *     OptOutListName?: string,
 *     SharedRoutesEnabled?: bool,
 *     DeletionProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProtectConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateProtectConfiguration(array{ProtectConfigurationId?: string, DeletionProtectionEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProtectConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProtectConfigurationAsync(array{ProtectConfigurationId?: string, DeletionProtectionEnabled?: bool, ...} $args = [])
 * @method \Aws\Result updateProtectConfigurationCountryRuleSet(array $args = [])
 * @phpstan-method \Aws\Result updateProtectConfigurationCountryRuleSet(array{
 *     ProtectConfigurationId?: string,
 *     NumberCapability?: 'MMS'|'RCS'|'SMS'|'VOICE',
 *     CountryRuleSetUpdates?: array<string, array{ProtectStatus?: 'ALLOW'|'BLOCK'|'FILTER'|'MONITOR', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProtectConfigurationCountryRuleSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProtectConfigurationCountryRuleSetAsync(array{
 *     ProtectConfigurationId?: string,
 *     NumberCapability?: 'MMS'|'RCS'|'SMS'|'VOICE',
 *     CountryRuleSetUpdates?: array<string, array{ProtectStatus?: 'ALLOW'|'BLOCK'|'FILTER'|'MONITOR', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRcsAgent(array $args = [])
 * @phpstan-method \Aws\Result updateRcsAgent(array{
 *     RcsAgentId?: string,
 *     DeletionProtectionEnabled?: bool,
 *     OptOutListName?: string,
 *     SelfManagedOptOutsEnabled?: bool,
 *     TwoWayChannelArn?: string,
 *     TwoWayChannelRole?: string,
 *     TwoWayEnabled?: bool,
 *     TwoWayMediaS3BucketName?: string,
 *     TwoWayMediaS3KeyPrefix?: string,
 *     TwoWayMediaS3Role?: string,
 *     TwoWayRcsEventsEnabled?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRcsAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRcsAgentAsync(array{
 *     RcsAgentId?: string,
 *     DeletionProtectionEnabled?: bool,
 *     OptOutListName?: string,
 *     SelfManagedOptOutsEnabled?: bool,
 *     TwoWayChannelArn?: string,
 *     TwoWayChannelRole?: string,
 *     TwoWayEnabled?: bool,
 *     TwoWayMediaS3BucketName?: string,
 *     TwoWayMediaS3KeyPrefix?: string,
 *     TwoWayMediaS3Role?: string,
 *     TwoWayRcsEventsEnabled?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSenderId(array $args = [])
 * @phpstan-method \Aws\Result updateSenderId(array{SenderId?: string, IsoCountryCode?: string, DeletionProtectionEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSenderIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSenderIdAsync(array{SenderId?: string, IsoCountryCode?: string, DeletionProtectionEnabled?: bool, ...} $args = [])
 * @method \Aws\Result verifyDestinationNumber(array $args = [])
 * @phpstan-method \Aws\Result verifyDestinationNumber(array{VerifiedDestinationNumberId?: string, VerificationCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyDestinationNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyDestinationNumberAsync(array{VerifiedDestinationNumberId?: string, VerificationCode?: string, ...} $args = [])
 */
class PinpointSMSVoiceV2Client extends AwsClient {}
