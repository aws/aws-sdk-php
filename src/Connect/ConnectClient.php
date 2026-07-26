<?php
namespace Aws\Connect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Connect Service** service.
 * @method \Aws\Result activateEvaluationForm(array $args = [])
 * @phpstan-method \Aws\Result activateEvaluationForm(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise activateEvaluationFormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateEvaluationFormAsync(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \Aws\Result associateAnalyticsDataSet(array $args = [])
 * @phpstan-method \Aws\Result associateAnalyticsDataSet(array{InstanceId?: string, DataSetId?: string, TargetAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAnalyticsDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAnalyticsDataSetAsync(array{InstanceId?: string, DataSetId?: string, TargetAccountId?: string, ...} $args = [])
 * @method \Aws\Result associateApprovedOrigin(array $args = [])
 * @phpstan-method \Aws\Result associateApprovedOrigin(array{InstanceId?: string, Origin?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateApprovedOriginAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateApprovedOriginAsync(array{InstanceId?: string, Origin?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result associateBot(array $args = [])
 * @phpstan-method \Aws\Result associateBot(array{
 *     InstanceId?: string,
 *     LexBot?: array{Name?: string, LexRegion?: string, ...},
 *     LexV2Bot?: array{AliasArn?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateBotAsync(array{
 *     InstanceId?: string,
 *     LexBot?: array{Name?: string, LexRegion?: string, ...},
 *     LexV2Bot?: array{AliasArn?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateContactWithUser(array $args = [])
 * @phpstan-method \Aws\Result associateContactWithUser(array{InstanceId?: string, ContactId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateContactWithUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateContactWithUserAsync(array{InstanceId?: string, ContactId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result associateDefaultVocabulary(array $args = [])
 * @phpstan-method \Aws\Result associateDefaultVocabulary(array{
 *     InstanceId?: string,
 *     LanguageCode?: 'ar-AE'|'ca-ES'|'da-DK'|'de-CH'|'de-DE'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-US'|'fi-FI'|'fr-CA'|'fr-FR'|'hi-IN'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'ms-MY'|'nl-NL'|'no-NO'|'pl-PL'|'pt-BR'|'pt-PT'|'sv-SE'|'tl-PH'|'zh-CN',
 *     VocabularyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDefaultVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDefaultVocabularyAsync(array{
 *     InstanceId?: string,
 *     LanguageCode?: 'ar-AE'|'ca-ES'|'da-DK'|'de-CH'|'de-DE'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-US'|'fi-FI'|'fr-CA'|'fr-FR'|'hi-IN'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'ms-MY'|'nl-NL'|'no-NO'|'pl-PL'|'pt-BR'|'pt-PT'|'sv-SE'|'tl-PH'|'zh-CN',
 *     VocabularyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateEmailAddressAlias(array $args = [])
 * @phpstan-method \Aws\Result associateEmailAddressAlias(array{
 *     EmailAddressId?: string,
 *     InstanceId?: string,
 *     AliasConfiguration?: array{EmailAddressId?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateEmailAddressAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateEmailAddressAliasAsync(array{
 *     EmailAddressId?: string,
 *     InstanceId?: string,
 *     AliasConfiguration?: array{EmailAddressId?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateFlow(array $args = [])
 * @phpstan-method \Aws\Result associateFlow(array{
 *     InstanceId?: string,
 *     ResourceId?: string,
 *     FlowId?: string,
 *     ResourceType?: 'ANALYTICS_CONNECTOR'|'INBOUND_EMAIL'|'OUTBOUND_EMAIL'|'SMS_PHONE_NUMBER'|'WHATSAPP_MESSAGING_PHONE_NUMBER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateFlowAsync(array{
 *     InstanceId?: string,
 *     ResourceId?: string,
 *     FlowId?: string,
 *     ResourceType?: 'ANALYTICS_CONNECTOR'|'INBOUND_EMAIL'|'OUTBOUND_EMAIL'|'SMS_PHONE_NUMBER'|'WHATSAPP_MESSAGING_PHONE_NUMBER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateHoursOfOperations(array $args = [])
 * @phpstan-method \Aws\Result associateHoursOfOperations(array{
 *     InstanceId?: string,
 *     HoursOfOperationId?: string,
 *     ParentHoursOfOperationConfigs?: list<array{HoursOfOperationId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateHoursOfOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateHoursOfOperationsAsync(array{
 *     InstanceId?: string,
 *     HoursOfOperationId?: string,
 *     ParentHoursOfOperationConfigs?: list<array{HoursOfOperationId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateInstanceStorageConfig(array $args = [])
 * @phpstan-method \Aws\Result associateInstanceStorageConfig(array{
 *     InstanceId?: string,
 *     ResourceType?: 'AGENT_EVENTS'|'ATTACHMENTS'|'CALL_RECORDINGS'|'CHAT_TRANSCRIPTS'|'CONTACT_EVALUATIONS'|'CONTACT_TRACE_RECORDS'|'EMAIL_MESSAGES'|'MEDIA_STREAMS'|'REAL_TIME_CONTACT_ANALYSIS_CHAT_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_VOICE_SEGMENTS'|'SCHEDULED_REPORTS'|'SCREEN_RECORDINGS',
 *     StorageConfig?: array{
 *         AssociationId?: string,
 *         StorageType?: 'KINESIS_FIREHOSE'|'KINESIS_STREAM'|'KINESIS_VIDEO_STREAM'|'S3',
 *         S3Config?: array{BucketName?: string, BucketPrefix?: string, EncryptionConfig?: array, ...},
 *         KinesisVideoStreamConfig?: array{Prefix?: string, RetentionPeriodHours?: int, EncryptionConfig?: array, ...},
 *         KinesisStreamConfig?: array{StreamArn?: string, ...},
 *         KinesisFirehoseConfig?: array{FirehoseArn?: string, ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateInstanceStorageConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateInstanceStorageConfigAsync(array{
 *     InstanceId?: string,
 *     ResourceType?: 'AGENT_EVENTS'|'ATTACHMENTS'|'CALL_RECORDINGS'|'CHAT_TRANSCRIPTS'|'CONTACT_EVALUATIONS'|'CONTACT_TRACE_RECORDS'|'EMAIL_MESSAGES'|'MEDIA_STREAMS'|'REAL_TIME_CONTACT_ANALYSIS_CHAT_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_VOICE_SEGMENTS'|'SCHEDULED_REPORTS'|'SCREEN_RECORDINGS',
 *     StorageConfig?: array{
 *         AssociationId?: string,
 *         StorageType?: 'KINESIS_FIREHOSE'|'KINESIS_STREAM'|'KINESIS_VIDEO_STREAM'|'S3',
 *         S3Config?: array{BucketName?: string, BucketPrefix?: string, EncryptionConfig?: array, ...},
 *         KinesisVideoStreamConfig?: array{Prefix?: string, RetentionPeriodHours?: int, EncryptionConfig?: array, ...},
 *         KinesisStreamConfig?: array{StreamArn?: string, ...},
 *         KinesisFirehoseConfig?: array{FirehoseArn?: string, ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateLambdaFunction(array $args = [])
 * @phpstan-method \Aws\Result associateLambdaFunction(array{InstanceId?: string, FunctionArn?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateLambdaFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateLambdaFunctionAsync(array{InstanceId?: string, FunctionArn?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result associateLexBot(array $args = [])
 * @phpstan-method \Aws\Result associateLexBot(array{InstanceId?: string, LexBot?: array{Name?: string, LexRegion?: string, ...}, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateLexBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateLexBotAsync(array{InstanceId?: string, LexBot?: array{Name?: string, LexRegion?: string, ...}, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result associatePhoneNumberContactFlow(array $args = [])
 * @phpstan-method \Aws\Result associatePhoneNumberContactFlow(array{PhoneNumberId?: string, InstanceId?: string, ContactFlowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePhoneNumberContactFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePhoneNumberContactFlowAsync(array{PhoneNumberId?: string, InstanceId?: string, ContactFlowId?: string, ...} $args = [])
 * @method \Aws\Result associateQueueEmailAddresses(array $args = [])
 * @phpstan-method \Aws\Result associateQueueEmailAddresses(array{
 *     InstanceId?: string,
 *     QueueId?: string,
 *     EmailAddressesConfig?: list<array{EmailAddressId?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateQueueEmailAddressesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateQueueEmailAddressesAsync(array{
 *     InstanceId?: string,
 *     QueueId?: string,
 *     EmailAddressesConfig?: list<array{EmailAddressId?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateQueueQuickConnects(array $args = [])
 * @phpstan-method \Aws\Result associateQueueQuickConnects(array{InstanceId?: string, QueueId?: string, QuickConnectIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateQueueQuickConnectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateQueueQuickConnectsAsync(array{InstanceId?: string, QueueId?: string, QuickConnectIds?: list<string>, ...} $args = [])
 * @method \Aws\Result associateRoutingProfileQueues(array $args = [])
 * @phpstan-method \Aws\Result associateRoutingProfileQueues(array{
 *     InstanceId?: string,
 *     RoutingProfileId?: string,
 *     QueueConfigs?: list<array{QueueReference?: array, Priority?: int, Delay?: int, ...}>,
 *     ManualAssignmentQueueConfigs?: list<array{QueueReference?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateRoutingProfileQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateRoutingProfileQueuesAsync(array{
 *     InstanceId?: string,
 *     RoutingProfileId?: string,
 *     QueueConfigs?: list<array{QueueReference?: array, Priority?: int, Delay?: int, ...}>,
 *     ManualAssignmentQueueConfigs?: list<array{QueueReference?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateSecurityKey(array $args = [])
 * @phpstan-method \Aws\Result associateSecurityKey(array{InstanceId?: string, Key?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSecurityKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSecurityKeyAsync(array{InstanceId?: string, Key?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result associateSecurityProfiles(array $args = [])
 * @phpstan-method \Aws\Result associateSecurityProfiles(array{
 *     InstanceId?: string,
 *     SecurityProfiles?: list<array{Id?: string, ...}>,
 *     EntityType?: 'AI_AGENT'|'USER',
 *     EntityArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSecurityProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSecurityProfilesAsync(array{
 *     InstanceId?: string,
 *     SecurityProfiles?: list<array{Id?: string, ...}>,
 *     EntityType?: 'AI_AGENT'|'USER',
 *     EntityArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateTrafficDistributionGroupUser(array $args = [])
 * @phpstan-method \Aws\Result associateTrafficDistributionGroupUser(array{TrafficDistributionGroupId?: string, UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateTrafficDistributionGroupUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateTrafficDistributionGroupUserAsync(array{TrafficDistributionGroupId?: string, UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result associateUserProficiencies(array $args = [])
 * @phpstan-method \Aws\Result associateUserProficiencies(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     UserProficiencies?: list<array{AttributeName?: string, AttributeValue?: string, Level?: float, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateUserProficienciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateUserProficienciesAsync(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     UserProficiencies?: list<array{AttributeName?: string, AttributeValue?: string, Level?: float, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateWorkspace(array $args = [])
 * @phpstan-method \Aws\Result associateWorkspace(array{InstanceId?: string, WorkspaceId?: string, ResourceArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateWorkspaceAsync(array{InstanceId?: string, WorkspaceId?: string, ResourceArns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchAssociateAnalyticsDataSet(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateAnalyticsDataSet(array{InstanceId?: string, DataSetIds?: list<string>, TargetAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateAnalyticsDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateAnalyticsDataSetAsync(array{InstanceId?: string, DataSetIds?: list<string>, TargetAccountId?: string, ...} $args = [])
 * @method \Aws\Result batchCreateDataTableValue(array $args = [])
 * @phpstan-method \Aws\Result batchCreateDataTableValue(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Values?: list<array{
 *         PrimaryValues?: list<array>,
 *         AttributeName?: string,
 *         Value?: string,
 *         LockVersion?: array,
 *         LastModifiedTime?: int|string|\DateTimeInterface,
 *         LastModifiedRegion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateDataTableValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateDataTableValueAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Values?: list<array{
 *         PrimaryValues?: list<array>,
 *         AttributeName?: string,
 *         Value?: string,
 *         LockVersion?: array,
 *         LastModifiedTime?: int|string|\DateTimeInterface,
 *         LastModifiedRegion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteDataTableValue(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteDataTableValue(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Values?: list<array{PrimaryValues?: list<array>, AttributeName?: string, LockVersion?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteDataTableValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteDataTableValueAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Values?: list<array{PrimaryValues?: list<array>, AttributeName?: string, LockVersion?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDescribeDataTableValue(array $args = [])
 * @phpstan-method \Aws\Result batchDescribeDataTableValue(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Values?: list<array{PrimaryValues?: list<array>, AttributeName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDescribeDataTableValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDescribeDataTableValueAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Values?: list<array{PrimaryValues?: list<array>, AttributeName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDisassociateAnalyticsDataSet(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateAnalyticsDataSet(array{InstanceId?: string, DataSetIds?: list<string>, TargetAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateAnalyticsDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateAnalyticsDataSetAsync(array{InstanceId?: string, DataSetIds?: list<string>, TargetAccountId?: string, ...} $args = [])
 * @method \Aws\Result batchGetAttachedFileMetadata(array $args = [])
 * @phpstan-method \Aws\Result batchGetAttachedFileMetadata(array{FileIds?: list<string>, InstanceId?: string, AssociatedResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAttachedFileMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetAttachedFileMetadataAsync(array{FileIds?: list<string>, InstanceId?: string, AssociatedResourceArn?: string, ...} $args = [])
 * @method \Aws\Result batchGetFlowAssociation(array $args = [])
 * @phpstan-method \Aws\Result batchGetFlowAssociation(array{
 *     InstanceId?: string,
 *     ResourceIds?: list<string>,
 *     ResourceType?: 'ANALYTICS_CONNECTOR'|'INBOUND_EMAIL'|'OUTBOUND_EMAIL'|'VOICE_PHONE_NUMBER'|'WHATSAPP_MESSAGING_PHONE_NUMBER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetFlowAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetFlowAssociationAsync(array{
 *     InstanceId?: string,
 *     ResourceIds?: list<string>,
 *     ResourceType?: 'ANALYTICS_CONNECTOR'|'INBOUND_EMAIL'|'OUTBOUND_EMAIL'|'VOICE_PHONE_NUMBER'|'WHATSAPP_MESSAGING_PHONE_NUMBER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchPutContact(array $args = [])
 * @phpstan-method \Aws\Result batchPutContact(array{
 *     ClientToken?: string,
 *     InstanceId?: string,
 *     ContactDataRequestList?: list<array{
 *         SystemEndpoint?: array,
 *         CustomerEndpoint?: array,
 *         RequestIdentifier?: string,
 *         QueueId?: string,
 *         Attributes?: array<string, string>,
 *         Campaign?: array,
 *         OutboundStrategy?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutContactAsync(array{
 *     ClientToken?: string,
 *     InstanceId?: string,
 *     ContactDataRequestList?: list<array{
 *         SystemEndpoint?: array,
 *         CustomerEndpoint?: array,
 *         RequestIdentifier?: string,
 *         QueueId?: string,
 *         Attributes?: array<string, string>,
 *         Campaign?: array,
 *         OutboundStrategy?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateDataTableValue(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateDataTableValue(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Values?: list<array{
 *         PrimaryValues?: list<array>,
 *         AttributeName?: string,
 *         Value?: string,
 *         LockVersion?: array,
 *         LastModifiedTime?: int|string|\DateTimeInterface,
 *         LastModifiedRegion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateDataTableValueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateDataTableValueAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Values?: list<array{
 *         PrimaryValues?: list<array>,
 *         AttributeName?: string,
 *         Value?: string,
 *         LockVersion?: array,
 *         LastModifiedTime?: int|string|\DateTimeInterface,
 *         LastModifiedRegion?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result claimPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result claimPhoneNumber(array{
 *     TargetArn?: string,
 *     InstanceId?: string,
 *     PhoneNumber?: string,
 *     PhoneNumberDescription?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise claimPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise claimPhoneNumberAsync(array{
 *     TargetArn?: string,
 *     InstanceId?: string,
 *     PhoneNumber?: string,
 *     PhoneNumberDescription?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result completeAttachedFileUpload(array $args = [])
 * @phpstan-method \Aws\Result completeAttachedFileUpload(array{InstanceId?: string, FileId?: string, AssociatedResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise completeAttachedFileUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeAttachedFileUploadAsync(array{InstanceId?: string, FileId?: string, AssociatedResourceArn?: string, ...} $args = [])
 * @method \Aws\Result createAgentStatus(array $args = [])
 * @phpstan-method \Aws\Result createAgentStatus(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     DisplayOrder?: int,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentStatusAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     DisplayOrder?: int,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAttachedFile(array $args = [])
 * @phpstan-method \Aws\Result createAttachedFile(array{
 *     ClientToken?: string,
 *     InstanceId?: string,
 *     FileUseCaseType?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'VOICE_RECORDING',
 *     FileSourceUri?: string,
 *     AssociatedResourceArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAttachedFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAttachedFileAsync(array{
 *     ClientToken?: string,
 *     InstanceId?: string,
 *     FileUseCaseType?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'VOICE_RECORDING',
 *     FileSourceUri?: string,
 *     AssociatedResourceArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAuthCode(array $args = [])
 * @phpstan-method \Aws\Result createAuthCode(array{
 *     InstanceId?: string,
 *     Scope?: array{
 *         SecurityProfileIds?: list<string>,
 *         EntityType?: 'CUSTOMER_PROFILE',
 *         EntityId?: string,
 *         DomainName?: string,
 *         ...,
 *     },
 *     MaxSessionDurationMinutes?: int,
 *     SessionInactivityDurationMinutes?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAuthCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAuthCodeAsync(array{
 *     InstanceId?: string,
 *     Scope?: array{
 *         SecurityProfileIds?: list<string>,
 *         EntityType?: 'CUSTOMER_PROFILE',
 *         EntityId?: string,
 *         DomainName?: string,
 *         ...,
 *     },
 *     MaxSessionDurationMinutes?: int,
 *     SessionInactivityDurationMinutes?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContact(array $args = [])
 * @phpstan-method \Aws\Result createContact(array{
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     RelatedContactId?: string,
 *     Attributes?: array<string, string>,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *     InitiationMethod?: 'AGENT_REPLY'|'API'|'CALLBACK'|'DISCONNECT'|'EXTERNAL_OUTBOUND'|'FLOW'|'INBOUND'|'MONITOR'|'OUTBOUND'|'QUEUE_TRANSFER'|'TRANSFER'|'WEBRTC_API',
 *     ExpiryDurationInMinutes?: int,
 *     UserInfo?: array{UserId?: string, ...},
 *     InitiateAs?: 'COMPLETED'|'CONNECTED_TO_USER',
 *     Name?: string,
 *     Description?: string,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     PreviousContactId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactAsync(array{
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     RelatedContactId?: string,
 *     Attributes?: array<string, string>,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *     InitiationMethod?: 'AGENT_REPLY'|'API'|'CALLBACK'|'DISCONNECT'|'EXTERNAL_OUTBOUND'|'FLOW'|'INBOUND'|'MONITOR'|'OUTBOUND'|'QUEUE_TRANSFER'|'TRANSFER'|'WEBRTC_API',
 *     ExpiryDurationInMinutes?: int,
 *     UserInfo?: array{UserId?: string, ...},
 *     InitiateAs?: 'COMPLETED'|'CONNECTED_TO_USER',
 *     Name?: string,
 *     Description?: string,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     PreviousContactId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContactFlow(array $args = [])
 * @phpstan-method \Aws\Result createContactFlow(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Type?: 'AGENT_HOLD'|'AGENT_TRANSFER'|'AGENT_WHISPER'|'CAMPAIGN'|'CONTACT_FLOW'|'CUSTOMER_HOLD'|'CUSTOMER_QUEUE'|'CUSTOMER_WHISPER'|'OUTBOUND_WHISPER'|'QUEUE_TRANSFER',
 *     Description?: string,
 *     Content?: string,
 *     Status?: 'PUBLISHED'|'SAVED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactFlowAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Type?: 'AGENT_HOLD'|'AGENT_TRANSFER'|'AGENT_WHISPER'|'CAMPAIGN'|'CONTACT_FLOW'|'CUSTOMER_HOLD'|'CUSTOMER_QUEUE'|'CUSTOMER_WHISPER'|'OUTBOUND_WHISPER'|'QUEUE_TRANSFER',
 *     Description?: string,
 *     Content?: string,
 *     Status?: 'PUBLISHED'|'SAVED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContactFlowModule(array $args = [])
 * @phpstan-method \Aws\Result createContactFlowModule(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Content?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     Settings?: string,
 *     ExternalInvocationConfiguration?: array{Enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactFlowModuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactFlowModuleAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Content?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     Settings?: string,
 *     ExternalInvocationConfiguration?: array{Enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContactFlowModuleAlias(array $args = [])
 * @phpstan-method \Aws\Result createContactFlowModuleAlias(array{
 *     InstanceId?: string,
 *     Description?: string,
 *     ContactFlowModuleId?: string,
 *     ContactFlowModuleVersion?: int,
 *     AliasName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactFlowModuleAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactFlowModuleAliasAsync(array{
 *     InstanceId?: string,
 *     Description?: string,
 *     ContactFlowModuleId?: string,
 *     ContactFlowModuleVersion?: int,
 *     AliasName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContactFlowModuleVersion(array $args = [])
 * @phpstan-method \Aws\Result createContactFlowModuleVersion(array{
 *     InstanceId?: string,
 *     Description?: string,
 *     ContactFlowModuleId?: string,
 *     FlowModuleContentSha256?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactFlowModuleVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactFlowModuleVersionAsync(array{
 *     InstanceId?: string,
 *     Description?: string,
 *     ContactFlowModuleId?: string,
 *     FlowModuleContentSha256?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContactFlowVersion(array $args = [])
 * @phpstan-method \Aws\Result createContactFlowVersion(array{
 *     InstanceId?: string,
 *     Description?: string,
 *     ContactFlowId?: string,
 *     FlowContentSha256?: string,
 *     ContactFlowVersion?: int,
 *     LastModifiedTime?: int|string|\DateTimeInterface,
 *     LastModifiedRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContactFlowVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContactFlowVersionAsync(array{
 *     InstanceId?: string,
 *     Description?: string,
 *     ContactFlowId?: string,
 *     FlowContentSha256?: string,
 *     ContactFlowVersion?: int,
 *     LastModifiedTime?: int|string|\DateTimeInterface,
 *     LastModifiedRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataTable(array $args = [])
 * @phpstan-method \Aws\Result createDataTable(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     TimeZone?: string,
 *     ValueLockLevel?: 'ATTRIBUTE'|'DATA_TABLE'|'NONE'|'PRIMARY_VALUE'|'VALUE',
 *     Status?: 'PUBLISHED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataTableAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     TimeZone?: string,
 *     ValueLockLevel?: 'ATTRIBUTE'|'DATA_TABLE'|'NONE'|'PRIMARY_VALUE'|'VALUE',
 *     Status?: 'PUBLISHED',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataTableAttribute(array $args = [])
 * @phpstan-method \Aws\Result createDataTableAttribute(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Name?: string,
 *     ValueType?: 'BOOLEAN'|'NUMBER'|'NUMBER_LIST'|'TEXT'|'TEXT_LIST',
 *     Description?: string,
 *     Primary?: bool,
 *     Validation?: array{
 *         MinLength?: int,
 *         MaxLength?: int,
 *         MinValues?: int,
 *         MaxValues?: int,
 *         IgnoreCase?: bool,
 *         Minimum?: float,
 *         Maximum?: float,
 *         ExclusiveMinimum?: float,
 *         ExclusiveMaximum?: float,
 *         MultipleOf?: float,
 *         Enum?: array{Strict?: bool, Values?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataTableAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataTableAttributeAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Name?: string,
 *     ValueType?: 'BOOLEAN'|'NUMBER'|'NUMBER_LIST'|'TEXT'|'TEXT_LIST',
 *     Description?: string,
 *     Primary?: bool,
 *     Validation?: array{
 *         MinLength?: int,
 *         MaxLength?: int,
 *         MinValues?: int,
 *         MaxValues?: int,
 *         IgnoreCase?: bool,
 *         Minimum?: float,
 *         Maximum?: float,
 *         ExclusiveMinimum?: float,
 *         ExclusiveMaximum?: float,
 *         MultipleOf?: float,
 *         Enum?: array{Strict?: bool, Values?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEmailAddress(array $args = [])
 * @phpstan-method \Aws\Result createEmailAddress(array{
 *     Description?: string,
 *     InstanceId?: string,
 *     EmailAddress?: string,
 *     DisplayName?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEmailAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEmailAddressAsync(array{
 *     Description?: string,
 *     InstanceId?: string,
 *     EmailAddress?: string,
 *     DisplayName?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEvaluationForm(array $args = [])
 * @phpstan-method \Aws\Result createEvaluationForm(array{
 *     InstanceId?: string,
 *     Title?: string,
 *     Description?: string,
 *     Items?: list<array{Section?: array, Question?: array, ...}>,
 *     ScoringStrategy?: array{
 *         Mode?: 'POINTS_BASED'|'QUESTION_ONLY'|'SECTION_ONLY',
 *         Status?: 'DISABLED'|'ENABLED',
 *         ScoreThresholds?: list<array>,
 *         ...,
 *     },
 *     AutoEvaluationConfiguration?: array{Enabled?: bool, ...},
 *     ClientToken?: string,
 *     AsDraft?: bool,
 *     Tags?: array<string, string>,
 *     ReviewConfiguration?: array{ReviewNotificationRecipients?: list<array>, EligibilityDays?: int, ...},
 *     TargetConfiguration?: array{ContactInteractionType?: 'AGENT'|'AUTOMATED'|'CUSTOMER', ...},
 *     LanguageConfiguration?: array{FormLanguage?: 'de-DE'|'en-US'|'es-ES'|'fr-FR'|'it-IT'|'ja-JP'|'ko-KR'|'pt-BR'|'zh-CN', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEvaluationFormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEvaluationFormAsync(array{
 *     InstanceId?: string,
 *     Title?: string,
 *     Description?: string,
 *     Items?: list<array{Section?: array, Question?: array, ...}>,
 *     ScoringStrategy?: array{
 *         Mode?: 'POINTS_BASED'|'QUESTION_ONLY'|'SECTION_ONLY',
 *         Status?: 'DISABLED'|'ENABLED',
 *         ScoreThresholds?: list<array>,
 *         ...,
 *     },
 *     AutoEvaluationConfiguration?: array{Enabled?: bool, ...},
 *     ClientToken?: string,
 *     AsDraft?: bool,
 *     Tags?: array<string, string>,
 *     ReviewConfiguration?: array{ReviewNotificationRecipients?: list<array>, EligibilityDays?: int, ...},
 *     TargetConfiguration?: array{ContactInteractionType?: 'AGENT'|'AUTOMATED'|'CUSTOMER', ...},
 *     LanguageConfiguration?: array{FormLanguage?: 'de-DE'|'en-US'|'es-ES'|'fr-FR'|'it-IT'|'ja-JP'|'ko-KR'|'pt-BR'|'zh-CN', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHoursOfOperation(array $args = [])
 * @phpstan-method \Aws\Result createHoursOfOperation(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     TimeZone?: string,
 *     Config?: list<array{
 *         Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         StartTime?: array,
 *         EndTime?: array,
 *         ...,
 *     }>,
 *     ParentHoursOfOperationConfigs?: list<array{HoursOfOperationId?: string, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHoursOfOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHoursOfOperationAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     TimeZone?: string,
 *     Config?: list<array{
 *         Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         StartTime?: array,
 *         EndTime?: array,
 *         ...,
 *     }>,
 *     ParentHoursOfOperationConfigs?: list<array{HoursOfOperationId?: string, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHoursOfOperationOverride(array $args = [])
 * @phpstan-method \Aws\Result createHoursOfOperationOverride(array{
 *     InstanceId?: string,
 *     HoursOfOperationId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Config?: list<array{
 *         Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         StartTime?: array,
 *         EndTime?: array,
 *         ...,
 *     }>,
 *     EffectiveFrom?: string,
 *     EffectiveTill?: string,
 *     RecurrenceConfig?: array{
 *         RecurrencePattern?: array{
 *             Frequency?: 'MONTHLY'|'WEEKLY'|'YEARLY',
 *             Interval?: int,
 *             ByMonth?: list<int>,
 *             ByMonthDay?: list<int>,
 *             ByWeekdayOccurrence?: list<int>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OverrideType?: 'CLOSED'|'OPEN'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHoursOfOperationOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHoursOfOperationOverrideAsync(array{
 *     InstanceId?: string,
 *     HoursOfOperationId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Config?: list<array{
 *         Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         StartTime?: array,
 *         EndTime?: array,
 *         ...,
 *     }>,
 *     EffectiveFrom?: string,
 *     EffectiveTill?: string,
 *     RecurrenceConfig?: array{
 *         RecurrencePattern?: array{
 *             Frequency?: 'MONTHLY'|'WEEKLY'|'YEARLY',
 *             Interval?: int,
 *             ByMonth?: list<int>,
 *             ByMonthDay?: list<int>,
 *             ByWeekdayOccurrence?: list<int>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OverrideType?: 'CLOSED'|'OPEN'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInstance(array $args = [])
 * @phpstan-method \Aws\Result createInstance(array{
 *     ClientToken?: string,
 *     IdentityManagementType?: 'CONNECT_MANAGED'|'EXISTING_DIRECTORY'|'SAML',
 *     InstanceAlias?: string,
 *     DirectoryId?: string,
 *     InboundCallsEnabled?: bool,
 *     OutboundCallsEnabled?: bool,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstanceAsync(array{
 *     ClientToken?: string,
 *     IdentityManagementType?: 'CONNECT_MANAGED'|'EXISTING_DIRECTORY'|'SAML',
 *     InstanceAlias?: string,
 *     DirectoryId?: string,
 *     InboundCallsEnabled?: bool,
 *     OutboundCallsEnabled?: bool,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegrationAssociation(array $args = [])
 * @phpstan-method \Aws\Result createIntegrationAssociation(array{
 *     InstanceId?: string,
 *     IntegrationType?: 'ANALYTICS_CONNECTOR'|'APPLICATION'|'CALL_TRANSFER_CONNECTOR'|'CASES_DOMAIN'|'COGNITO_USER_POOL'|'EVENT'|'FILE_SCANNER'|'MESSAGE_PROCESSOR'|'PINPOINT_APP'|'Q_MESSAGE_TEMPLATES'|'SES_IDENTITY'|'VOICE_ID'|'WISDOM_ASSISTANT'|'WISDOM_KNOWLEDGE_BASE'|'WISDOM_QUICK_RESPONSES',
 *     IntegrationArn?: string,
 *     SourceApplicationUrl?: string,
 *     SourceApplicationName?: string,
 *     SourceType?: 'CASES'|'SALESFORCE'|'ZENDESK',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationAssociationAsync(array{
 *     InstanceId?: string,
 *     IntegrationType?: 'ANALYTICS_CONNECTOR'|'APPLICATION'|'CALL_TRANSFER_CONNECTOR'|'CASES_DOMAIN'|'COGNITO_USER_POOL'|'EVENT'|'FILE_SCANNER'|'MESSAGE_PROCESSOR'|'PINPOINT_APP'|'Q_MESSAGE_TEMPLATES'|'SES_IDENTITY'|'VOICE_ID'|'WISDOM_ASSISTANT'|'WISDOM_KNOWLEDGE_BASE'|'WISDOM_QUICK_RESPONSES',
 *     IntegrationArn?: string,
 *     SourceApplicationUrl?: string,
 *     SourceApplicationName?: string,
 *     SourceType?: 'CASES'|'SALESFORCE'|'ZENDESK',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNotification(array $args = [])
 * @phpstan-method \Aws\Result createNotification(array{
 *     InstanceId?: string,
 *     ExpiresAt?: int|string|\DateTimeInterface,
 *     Recipients?: list<string>,
 *     Priority?: 'HIGH'|'LOW',
 *     Content?: array<string, string>,
 *     Tags?: array<string, string>,
 *     PredefinedNotificationId?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotificationAsync(array{
 *     InstanceId?: string,
 *     ExpiresAt?: int|string|\DateTimeInterface,
 *     Recipients?: list<string>,
 *     Priority?: 'HIGH'|'LOW',
 *     Content?: array<string, string>,
 *     Tags?: array<string, string>,
 *     PredefinedNotificationId?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createParticipant(array $args = [])
 * @phpstan-method \Aws\Result createParticipant(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ClientToken?: string,
 *     ParticipantDetails?: array{
 *         ParticipantRole?: 'AGENT'|'CUSTOMER'|'CUSTOM_BOT'|'SUPERVISOR'|'SYSTEM',
 *         DisplayName?: string,
 *         ParticipantCapabilities?: array{Video?: 'SEND', ScreenShare?: 'SEND', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createParticipantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createParticipantAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ClientToken?: string,
 *     ParticipantDetails?: array{
 *         ParticipantRole?: 'AGENT'|'CUSTOMER'|'CUSTOM_BOT'|'SUPERVISOR'|'SYSTEM',
 *         DisplayName?: string,
 *         ParticipantCapabilities?: array{Video?: 'SEND', ScreenShare?: 'SEND', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPersistentContactAssociation(array $args = [])
 * @phpstan-method \Aws\Result createPersistentContactAssociation(array{
 *     InstanceId?: string,
 *     InitialContactId?: string,
 *     RehydrationType?: 'ENTIRE_PAST_SESSION'|'FROM_SEGMENT',
 *     SourceContactId?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPersistentContactAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPersistentContactAssociationAsync(array{
 *     InstanceId?: string,
 *     InitialContactId?: string,
 *     RehydrationType?: 'ENTIRE_PAST_SESSION'|'FROM_SEGMENT',
 *     SourceContactId?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPredefinedAttribute(array $args = [])
 * @phpstan-method \Aws\Result createPredefinedAttribute(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Values?: array{StringList?: list<string>, ...},
 *     Purposes?: list<string>,
 *     AttributeConfiguration?: array{EnableValueValidationOnAssociation?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPredefinedAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPredefinedAttributeAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Values?: array{StringList?: list<string>, ...},
 *     Purposes?: list<string>,
 *     AttributeConfiguration?: array{EnableValueValidationOnAssociation?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPrompt(array $args = [])
 * @phpstan-method \Aws\Result createPrompt(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     S3Uri?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPromptAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     S3Uri?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPushNotificationRegistration(array $args = [])
 * @phpstan-method \Aws\Result createPushNotificationRegistration(array{
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     PinpointAppArn?: string,
 *     DeviceToken?: string,
 *     DeviceType?: 'APNS'|'APNS_SANDBOX'|'GCM',
 *     ContactConfiguration?: array{
 *         ContactId?: string,
 *         ParticipantRole?: 'AGENT'|'CUSTOMER'|'CUSTOM_BOT'|'SUPERVISOR'|'SYSTEM',
 *         IncludeRawMessage?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPushNotificationRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPushNotificationRegistrationAsync(array{
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     PinpointAppArn?: string,
 *     DeviceToken?: string,
 *     DeviceType?: 'APNS'|'APNS_SANDBOX'|'GCM',
 *     ContactConfiguration?: array{
 *         ContactId?: string,
 *         ParticipantRole?: 'AGENT'|'CUSTOMER'|'CUSTOM_BOT'|'SUPERVISOR'|'SYSTEM',
 *         IncludeRawMessage?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQueue(array $args = [])
 * @phpstan-method \Aws\Result createQueue(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     OutboundCallerConfig?: array{OutboundCallerIdName?: string, OutboundCallerIdNumberId?: string, OutboundFlowId?: string, ...},
 *     OutboundEmailConfig?: array{OutboundEmailAddressId?: string, ...},
 *     HoursOfOperationId?: string,
 *     MaxContacts?: int,
 *     QuickConnectIds?: list<string>,
 *     EmailAddressesConfig?: list<array{EmailAddressId?: string, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQueueAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     OutboundCallerConfig?: array{OutboundCallerIdName?: string, OutboundCallerIdNumberId?: string, OutboundFlowId?: string, ...},
 *     OutboundEmailConfig?: array{OutboundEmailAddressId?: string, ...},
 *     HoursOfOperationId?: string,
 *     MaxContacts?: int,
 *     QuickConnectIds?: list<string>,
 *     EmailAddressesConfig?: list<array{EmailAddressId?: string, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQuickConnect(array $args = [])
 * @phpstan-method \Aws\Result createQuickConnect(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     QuickConnectConfig?: array{
 *         QuickConnectType?: 'FLOW'|'PHONE_NUMBER'|'QUEUE'|'USER',
 *         UserConfig?: array{UserId?: string, ContactFlowId?: string, ...},
 *         QueueConfig?: array{QueueId?: string, ContactFlowId?: string, ...},
 *         PhoneConfig?: array{PhoneNumber?: string, ...},
 *         FlowConfig?: array{ContactFlowId?: string, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQuickConnectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQuickConnectAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     QuickConnectConfig?: array{
 *         QuickConnectType?: 'FLOW'|'PHONE_NUMBER'|'QUEUE'|'USER',
 *         UserConfig?: array{UserId?: string, ContactFlowId?: string, ...},
 *         QueueConfig?: array{QueueId?: string, ContactFlowId?: string, ...},
 *         PhoneConfig?: array{PhoneNumber?: string, ...},
 *         FlowConfig?: array{ContactFlowId?: string, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRoutingProfile(array $args = [])
 * @phpstan-method \Aws\Result createRoutingProfile(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     DefaultOutboundQueueId?: string,
 *     QueueConfigs?: list<array{QueueReference?: array, Priority?: int, Delay?: int, ...}>,
 *     ManualAssignmentQueueConfigs?: list<array{QueueReference?: array, ...}>,
 *     MediaConcurrencies?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', Concurrency?: int, CrossChannelBehavior?: array, ...}>,
 *     Tags?: array<string, string>,
 *     AgentAvailabilityTimer?: 'TIME_SINCE_LAST_ACTIVITY'|'TIME_SINCE_LAST_INBOUND',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoutingProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRoutingProfileAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     DefaultOutboundQueueId?: string,
 *     QueueConfigs?: list<array{QueueReference?: array, Priority?: int, Delay?: int, ...}>,
 *     ManualAssignmentQueueConfigs?: list<array{QueueReference?: array, ...}>,
 *     MediaConcurrencies?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', Concurrency?: int, CrossChannelBehavior?: array, ...}>,
 *     Tags?: array<string, string>,
 *     AgentAvailabilityTimer?: 'TIME_SINCE_LAST_ACTIVITY'|'TIME_SINCE_LAST_INBOUND',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRule(array $args = [])
 * @phpstan-method \Aws\Result createRule(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     TriggerEventSource?: array{
 *         EventSourceName?: 'OnAlertUpdate'|'OnCaseCreate'|'OnCaseUpdate'|'OnContactEvaluationSubmit'|'OnEmailAnalysisAvailable'|'OnMetricDataUpdate'|'OnPostCallAnalysisAvailable'|'OnPostChatAnalysisAvailable'|'OnRealTimeCallAnalysisAvailable'|'OnRealTimeChatAnalysisAvailable'|'OnSalesforceCaseCreate'|'OnSchedulePublish'|'OnScheduleTimeOffRequestActivity'|'OnScheduleUpdate'|'OnSlaBreach'|'OnZendeskTicketCreate'|'OnZendeskTicketStatusUpdate',
 *         IntegrationAssociationId?: string,
 *         ...,
 *     },
 *     Function?: string,
 *     Actions?: list<array{
 *         ActionType?: 'ASSIGN_CONTACT_CATEGORY'|'ASSIGN_SLA'|'CREATE_CASE'|'CREATE_TASK'|'END_ASSOCIATED_TASKS'|'GENERATE_EVENTBRIDGE_EVENT'|'SEND_NOTIFICATION'|'SUBMIT_AUTO_EVALUATION'|'UPDATE_CASE',
 *         TaskAction?: array,
 *         EventBridgeAction?: array,
 *         AssignContactCategoryAction?: array,
 *         SendNotificationAction?: array,
 *         CreateCaseAction?: array,
 *         UpdateCaseAction?: array,
 *         AssignSlaAction?: array,
 *         EndAssociatedTasksAction?: array,
 *         SubmitAutoEvaluationAction?: array,
 *         ...,
 *     }>,
 *     PublishStatus?: 'DRAFT'|'PUBLISHED',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     TriggerEventSource?: array{
 *         EventSourceName?: 'OnAlertUpdate'|'OnCaseCreate'|'OnCaseUpdate'|'OnContactEvaluationSubmit'|'OnEmailAnalysisAvailable'|'OnMetricDataUpdate'|'OnPostCallAnalysisAvailable'|'OnPostChatAnalysisAvailable'|'OnRealTimeCallAnalysisAvailable'|'OnRealTimeChatAnalysisAvailable'|'OnSalesforceCaseCreate'|'OnSchedulePublish'|'OnScheduleTimeOffRequestActivity'|'OnScheduleUpdate'|'OnSlaBreach'|'OnZendeskTicketCreate'|'OnZendeskTicketStatusUpdate',
 *         IntegrationAssociationId?: string,
 *         ...,
 *     },
 *     Function?: string,
 *     Actions?: list<array{
 *         ActionType?: 'ASSIGN_CONTACT_CATEGORY'|'ASSIGN_SLA'|'CREATE_CASE'|'CREATE_TASK'|'END_ASSOCIATED_TASKS'|'GENERATE_EVENTBRIDGE_EVENT'|'SEND_NOTIFICATION'|'SUBMIT_AUTO_EVALUATION'|'UPDATE_CASE',
 *         TaskAction?: array,
 *         EventBridgeAction?: array,
 *         AssignContactCategoryAction?: array,
 *         SendNotificationAction?: array,
 *         CreateCaseAction?: array,
 *         UpdateCaseAction?: array,
 *         AssignSlaAction?: array,
 *         EndAssociatedTasksAction?: array,
 *         SubmitAutoEvaluationAction?: array,
 *         ...,
 *     }>,
 *     PublishStatus?: 'DRAFT'|'PUBLISHED',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result createSecurityProfile(array{
 *     SecurityProfileName?: string,
 *     Description?: string,
 *     Permissions?: list<string>,
 *     InstanceId?: string,
 *     Tags?: array<string, string>,
 *     AllowedAccessControlTags?: array<string, string>,
 *     TagRestrictedResources?: list<string>,
 *     Applications?: list<array{Namespace?: string, ApplicationPermissions?: list<string>, Type?: 'MCP'|'THIRD_PARTY_APPLICATION', ...}>,
 *     HierarchyRestrictedResources?: list<string>,
 *     AllowedAccessControlHierarchyGroupId?: string,
 *     AllowedFlowModules?: list<array{Type?: 'MCP', FlowModuleId?: string, ...}>,
 *     GranularAccessControlConfiguration?: array{
 *         DataTableAccessControlConfiguration?: array{PrimaryAttributeAccessControlConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSecurityProfileAsync(array{
 *     SecurityProfileName?: string,
 *     Description?: string,
 *     Permissions?: list<string>,
 *     InstanceId?: string,
 *     Tags?: array<string, string>,
 *     AllowedAccessControlTags?: array<string, string>,
 *     TagRestrictedResources?: list<string>,
 *     Applications?: list<array{Namespace?: string, ApplicationPermissions?: list<string>, Type?: 'MCP'|'THIRD_PARTY_APPLICATION', ...}>,
 *     HierarchyRestrictedResources?: list<string>,
 *     AllowedAccessControlHierarchyGroupId?: string,
 *     AllowedFlowModules?: list<array{Type?: 'MCP', FlowModuleId?: string, ...}>,
 *     GranularAccessControlConfiguration?: array{
 *         DataTableAccessControlConfiguration?: array{PrimaryAttributeAccessControlConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTaskTemplate(array $args = [])
 * @phpstan-method \Aws\Result createTaskTemplate(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     ContactFlowId?: string,
 *     SelfAssignFlowId?: string,
 *     Constraints?: array{RequiredFields?: list<array>, ReadOnlyFields?: list<array>, InvisibleFields?: list<array>, ...},
 *     Defaults?: array{DefaultFieldValues?: list<array>, ...},
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     Fields?: list<array{
 *         Id?: array,
 *         Description?: string,
 *         Type?: 'BOOLEAN'|'DATE_TIME'|'DESCRIPTION'|'EMAIL'|'EXPIRY_DURATION'|'NAME'|'NUMBER'|'QUICK_CONNECT'|'SCHEDULED_TIME'|'SELF_ASSIGN'|'SINGLE_SELECT'|'TEXT'|'TEXT_AREA'|'URL',
 *         SingleSelectOptions?: list<string>,
 *         ...,
 *     }>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTaskTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTaskTemplateAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     ContactFlowId?: string,
 *     SelfAssignFlowId?: string,
 *     Constraints?: array{RequiredFields?: list<array>, ReadOnlyFields?: list<array>, InvisibleFields?: list<array>, ...},
 *     Defaults?: array{DefaultFieldValues?: list<array>, ...},
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     Fields?: list<array{
 *         Id?: array,
 *         Description?: string,
 *         Type?: 'BOOLEAN'|'DATE_TIME'|'DESCRIPTION'|'EMAIL'|'EXPIRY_DURATION'|'NAME'|'NUMBER'|'QUICK_CONNECT'|'SCHEDULED_TIME'|'SELF_ASSIGN'|'SINGLE_SELECT'|'TEXT'|'TEXT_AREA'|'URL',
 *         SingleSelectOptions?: list<string>,
 *         ...,
 *     }>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTestCase(array $args = [])
 * @phpstan-method \Aws\Result createTestCase(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Content?: string,
 *     EntryPoint?: array{
 *         Type?: 'CHAT'|'VOICE_CALL',
 *         VoiceCallEntryPointParameters?: array{SourcePhoneNumber?: string, DestinationPhoneNumber?: string, FlowId?: string, ...},
 *         ChatEntryPointParameters?: array{FlowId?: string, ...},
 *         ...,
 *     },
 *     InitializationData?: string,
 *     Status?: 'PUBLISHED'|'SAVED',
 *     TestCaseId?: string,
 *     Tags?: array<string, string>,
 *     LastModifiedTime?: int|string|\DateTimeInterface,
 *     LastModifiedRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTestCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTestCaseAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Content?: string,
 *     EntryPoint?: array{
 *         Type?: 'CHAT'|'VOICE_CALL',
 *         VoiceCallEntryPointParameters?: array{SourcePhoneNumber?: string, DestinationPhoneNumber?: string, FlowId?: string, ...},
 *         ChatEntryPointParameters?: array{FlowId?: string, ...},
 *         ...,
 *     },
 *     InitializationData?: string,
 *     Status?: 'PUBLISHED'|'SAVED',
 *     TestCaseId?: string,
 *     Tags?: array<string, string>,
 *     LastModifiedTime?: int|string|\DateTimeInterface,
 *     LastModifiedRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrafficDistributionGroup(array $args = [])
 * @phpstan-method \Aws\Result createTrafficDistributionGroup(array{
 *     Name?: string,
 *     Description?: string,
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrafficDistributionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrafficDistributionGroupAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUseCase(array $args = [])
 * @phpstan-method \Aws\Result createUseCase(array{
 *     InstanceId?: string,
 *     IntegrationAssociationId?: string,
 *     UseCaseType?: 'CONNECT_CAMPAIGNS'|'RULES_EVALUATION',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUseCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUseCaseAsync(array{
 *     InstanceId?: string,
 *     IntegrationAssociationId?: string,
 *     UseCaseType?: 'CONNECT_CAMPAIGNS'|'RULES_EVALUATION',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     Username?: string,
 *     Password?: string,
 *     IdentityInfo?: array{FirstName?: string, LastName?: string, Email?: string, SecondaryEmail?: string, Mobile?: string, ...},
 *     PhoneConfig?: array{
 *         PhoneType?: 'DESK_PHONE'|'SOFT_PHONE',
 *         AutoAccept?: bool,
 *         AfterContactWorkTimeLimit?: int,
 *         DeskPhoneNumber?: string,
 *         PersistentConnection?: bool,
 *         ...,
 *     },
 *     DirectoryUserId?: string,
 *     SecurityProfileIds?: list<string>,
 *     RoutingProfileId?: string,
 *     HierarchyGroupId?: string,
 *     InstanceId?: string,
 *     AutoAcceptConfigs?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', AutoAccept?: bool, AgentFirstCallbackAutoAccept?: bool, ...}>,
 *     AfterContactWorkConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         AfterContactWorkConfig?: array,
 *         AgentFirstCallbackAfterContactWorkConfig?: array,
 *         ...,
 *     }>,
 *     PhoneNumberConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         PhoneType?: 'DESK_PHONE'|'SOFT_PHONE',
 *         PhoneNumber?: string,
 *         ...,
 *     }>,
 *     PersistentConnectionConfigs?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', PersistentConnection?: bool, ...}>,
 *     VoiceEnhancementConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         VoiceEnhancementMode?: 'NOISE_SUPPRESSION'|'NONE'|'VOICE_ISOLATION',
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     Username?: string,
 *     Password?: string,
 *     IdentityInfo?: array{FirstName?: string, LastName?: string, Email?: string, SecondaryEmail?: string, Mobile?: string, ...},
 *     PhoneConfig?: array{
 *         PhoneType?: 'DESK_PHONE'|'SOFT_PHONE',
 *         AutoAccept?: bool,
 *         AfterContactWorkTimeLimit?: int,
 *         DeskPhoneNumber?: string,
 *         PersistentConnection?: bool,
 *         ...,
 *     },
 *     DirectoryUserId?: string,
 *     SecurityProfileIds?: list<string>,
 *     RoutingProfileId?: string,
 *     HierarchyGroupId?: string,
 *     InstanceId?: string,
 *     AutoAcceptConfigs?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', AutoAccept?: bool, AgentFirstCallbackAutoAccept?: bool, ...}>,
 *     AfterContactWorkConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         AfterContactWorkConfig?: array,
 *         AgentFirstCallbackAfterContactWorkConfig?: array,
 *         ...,
 *     }>,
 *     PhoneNumberConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         PhoneType?: 'DESK_PHONE'|'SOFT_PHONE',
 *         PhoneNumber?: string,
 *         ...,
 *     }>,
 *     PersistentConnectionConfigs?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', PersistentConnection?: bool, ...}>,
 *     VoiceEnhancementConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         VoiceEnhancementMode?: 'NOISE_SUPPRESSION'|'NONE'|'VOICE_ISOLATION',
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserHierarchyGroup(array $args = [])
 * @phpstan-method \Aws\Result createUserHierarchyGroup(array{Name?: string, ParentGroupId?: string, InstanceId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserHierarchyGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserHierarchyGroupAsync(array{Name?: string, ParentGroupId?: string, InstanceId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createView(array $args = [])
 * @phpstan-method \Aws\Result createView(array{
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     Status?: 'PUBLISHED'|'SAVED',
 *     Content?: array{Template?: string, Actions?: list<string>, ...},
 *     Description?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createViewAsync(array{
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     Status?: 'PUBLISHED'|'SAVED',
 *     Content?: array{Template?: string, Actions?: list<string>, ...},
 *     Description?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createViewVersion(array $args = [])
 * @phpstan-method \Aws\Result createViewVersion(array{InstanceId?: string, ViewId?: string, VersionDescription?: string, ViewContentSha256?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createViewVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createViewVersionAsync(array{InstanceId?: string, ViewId?: string, VersionDescription?: string, ViewContentSha256?: string, ...} $args = [])
 * @method \Aws\Result createVocabulary(array $args = [])
 * @phpstan-method \Aws\Result createVocabulary(array{
 *     ClientToken?: string,
 *     InstanceId?: string,
 *     VocabularyName?: string,
 *     LanguageCode?: 'ar-AE'|'ca-ES'|'da-DK'|'de-CH'|'de-DE'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-US'|'fi-FI'|'fr-CA'|'fr-FR'|'hi-IN'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'ms-MY'|'nl-NL'|'no-NO'|'pl-PL'|'pt-BR'|'pt-PT'|'sv-SE'|'tl-PH'|'zh-CN',
 *     Content?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVocabularyAsync(array{
 *     ClientToken?: string,
 *     InstanceId?: string,
 *     VocabularyName?: string,
 *     LanguageCode?: 'ar-AE'|'ca-ES'|'da-DK'|'de-CH'|'de-DE'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-US'|'fi-FI'|'fr-CA'|'fr-FR'|'hi-IN'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'ms-MY'|'nl-NL'|'no-NO'|'pl-PL'|'pt-BR'|'pt-PT'|'sv-SE'|'tl-PH'|'zh-CN',
 *     Content?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkspace(array $args = [])
 * @phpstan-method \Aws\Result createWorkspace(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Theme?: array{
 *         Light?: array{Palette?: array, Images?: array, Typography?: array, ...},
 *         Dark?: array{Palette?: array, Images?: array, Typography?: array, ...},
 *         ...,
 *     },
 *     Title?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Theme?: array{
 *         Light?: array{Palette?: array, Images?: array, Typography?: array, ...},
 *         Dark?: array{Palette?: array, Images?: array, Typography?: array, ...},
 *         ...,
 *     },
 *     Title?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkspacePage(array $args = [])
 * @phpstan-method \Aws\Result createWorkspacePage(array{
 *     InstanceId?: string,
 *     WorkspaceId?: string,
 *     ResourceArn?: string,
 *     Page?: string,
 *     Slug?: string,
 *     InputData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspacePageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspacePageAsync(array{
 *     InstanceId?: string,
 *     WorkspaceId?: string,
 *     ResourceArn?: string,
 *     Page?: string,
 *     Slug?: string,
 *     InputData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deactivateEvaluationForm(array $args = [])
 * @phpstan-method \Aws\Result deactivateEvaluationForm(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateEvaluationFormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateEvaluationFormAsync(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteAttachedFile(array $args = [])
 * @phpstan-method \Aws\Result deleteAttachedFile(array{InstanceId?: string, FileId?: string, AssociatedResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAttachedFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAttachedFileAsync(array{InstanceId?: string, FileId?: string, AssociatedResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteContactData(array $args = [])
 * @phpstan-method \Aws\Result deleteContactData(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ContactFields?: list<'ADDITIONAL_EMAIL_RECIPIENTS'|'CUSTOMER_ENDPOINT'|'EMAIL_SUBJECT'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactDataAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ContactFields?: list<'ADDITIONAL_EMAIL_RECIPIENTS'|'CUSTOMER_ENDPOINT'|'EMAIL_SUBJECT'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteContactEvaluation(array $args = [])
 * @phpstan-method \Aws\Result deleteContactEvaluation(array{InstanceId?: string, EvaluationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactEvaluationAsync(array{InstanceId?: string, EvaluationId?: string, ...} $args = [])
 * @method \Aws\Result deleteContactFlow(array $args = [])
 * @phpstan-method \Aws\Result deleteContactFlow(array{InstanceId?: string, ContactFlowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactFlowAsync(array{InstanceId?: string, ContactFlowId?: string, ...} $args = [])
 * @method \Aws\Result deleteContactFlowModule(array $args = [])
 * @phpstan-method \Aws\Result deleteContactFlowModule(array{InstanceId?: string, ContactFlowModuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactFlowModuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactFlowModuleAsync(array{InstanceId?: string, ContactFlowModuleId?: string, ...} $args = [])
 * @method \Aws\Result deleteContactFlowModuleAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteContactFlowModuleAlias(array{InstanceId?: string, ContactFlowModuleId?: string, AliasId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactFlowModuleAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactFlowModuleAliasAsync(array{InstanceId?: string, ContactFlowModuleId?: string, AliasId?: string, ...} $args = [])
 * @method \Aws\Result deleteContactFlowModuleVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteContactFlowModuleVersion(array{InstanceId?: string, ContactFlowModuleId?: string, ContactFlowModuleVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactFlowModuleVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactFlowModuleVersionAsync(array{InstanceId?: string, ContactFlowModuleId?: string, ContactFlowModuleVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteContactFlowVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteContactFlowVersion(array{InstanceId?: string, ContactFlowId?: string, ContactFlowVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContactFlowVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContactFlowVersionAsync(array{InstanceId?: string, ContactFlowId?: string, ContactFlowVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteDataTable(array $args = [])
 * @phpstan-method \Aws\Result deleteDataTable(array{InstanceId?: string, DataTableId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataTableAsync(array{InstanceId?: string, DataTableId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataTableAttribute(array $args = [])
 * @phpstan-method \Aws\Result deleteDataTableAttribute(array{InstanceId?: string, DataTableId?: string, AttributeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataTableAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataTableAttributeAsync(array{InstanceId?: string, DataTableId?: string, AttributeName?: string, ...} $args = [])
 * @method \Aws\Result deleteEmailAddress(array $args = [])
 * @phpstan-method \Aws\Result deleteEmailAddress(array{InstanceId?: string, EmailAddressId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEmailAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEmailAddressAsync(array{InstanceId?: string, EmailAddressId?: string, ...} $args = [])
 * @method \Aws\Result deleteEvaluationForm(array $args = [])
 * @phpstan-method \Aws\Result deleteEvaluationForm(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEvaluationFormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEvaluationFormAsync(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteHoursOfOperation(array $args = [])
 * @phpstan-method \Aws\Result deleteHoursOfOperation(array{InstanceId?: string, HoursOfOperationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHoursOfOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHoursOfOperationAsync(array{InstanceId?: string, HoursOfOperationId?: string, ...} $args = [])
 * @method \Aws\Result deleteHoursOfOperationOverride(array $args = [])
 * @phpstan-method \Aws\Result deleteHoursOfOperationOverride(array{InstanceId?: string, HoursOfOperationId?: string, HoursOfOperationOverrideId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHoursOfOperationOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHoursOfOperationOverrideAsync(array{InstanceId?: string, HoursOfOperationId?: string, HoursOfOperationOverrideId?: string, ...} $args = [])
 * @method \Aws\Result deleteInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteInstance(array{InstanceId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceAsync(array{InstanceId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegrationAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegrationAssociation(array{InstanceId?: string, IntegrationAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAssociationAsync(array{InstanceId?: string, IntegrationAssociationId?: string, ...} $args = [])
 * @method \Aws\Result deleteNotification(array $args = [])
 * @phpstan-method \Aws\Result deleteNotification(array{InstanceId?: string, NotificationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotificationAsync(array{InstanceId?: string, NotificationId?: string, ...} $args = [])
 * @method \Aws\Result deletePredefinedAttribute(array $args = [])
 * @phpstan-method \Aws\Result deletePredefinedAttribute(array{InstanceId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePredefinedAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePredefinedAttributeAsync(array{InstanceId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deletePrompt(array $args = [])
 * @phpstan-method \Aws\Result deletePrompt(array{InstanceId?: string, PromptId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePromptAsync(array{InstanceId?: string, PromptId?: string, ...} $args = [])
 * @method \Aws\Result deletePushNotificationRegistration(array $args = [])
 * @phpstan-method \Aws\Result deletePushNotificationRegistration(array{InstanceId?: string, RegistrationId?: string, ContactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePushNotificationRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePushNotificationRegistrationAsync(array{InstanceId?: string, RegistrationId?: string, ContactId?: string, ...} $args = [])
 * @method \Aws\Result deleteQueue(array $args = [])
 * @phpstan-method \Aws\Result deleteQueue(array{InstanceId?: string, QueueId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueueAsync(array{InstanceId?: string, QueueId?: string, ...} $args = [])
 * @method \Aws\Result deleteQuickConnect(array $args = [])
 * @phpstan-method \Aws\Result deleteQuickConnect(array{InstanceId?: string, QuickConnectId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQuickConnectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQuickConnectAsync(array{InstanceId?: string, QuickConnectId?: string, ...} $args = [])
 * @method \Aws\Result deleteRoutingProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteRoutingProfile(array{InstanceId?: string, RoutingProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoutingProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRoutingProfileAsync(array{InstanceId?: string, RoutingProfileId?: string, ...} $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRule(array{InstanceId?: string, RuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleAsync(array{InstanceId?: string, RuleId?: string, ...} $args = [])
 * @method \Aws\Result deleteSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteSecurityProfile(array{InstanceId?: string, SecurityProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSecurityProfileAsync(array{InstanceId?: string, SecurityProfileId?: string, ...} $args = [])
 * @method \Aws\Result deleteSession(array $args = [])
 * @phpstan-method \Aws\Result deleteSession(array{InstanceId?: string, SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSessionAsync(array{InstanceId?: string, SessionId?: string, ...} $args = [])
 * @method \Aws\Result deleteTaskTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteTaskTemplate(array{InstanceId?: string, TaskTemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTaskTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTaskTemplateAsync(array{InstanceId?: string, TaskTemplateId?: string, ...} $args = [])
 * @method \Aws\Result deleteTestCase(array $args = [])
 * @phpstan-method \Aws\Result deleteTestCase(array{InstanceId?: string, TestCaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTestCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTestCaseAsync(array{InstanceId?: string, TestCaseId?: string, ...} $args = [])
 * @method \Aws\Result deleteTrafficDistributionGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteTrafficDistributionGroup(array{TrafficDistributionGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrafficDistributionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrafficDistributionGroupAsync(array{TrafficDistributionGroupId?: string, ...} $args = [])
 * @method \Aws\Result deleteUseCase(array $args = [])
 * @phpstan-method \Aws\Result deleteUseCase(array{InstanceId?: string, IntegrationAssociationId?: string, UseCaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUseCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUseCaseAsync(array{InstanceId?: string, IntegrationAssociationId?: string, UseCaseId?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{InstanceId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{InstanceId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result deleteUserHierarchyGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteUserHierarchyGroup(array{HierarchyGroupId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserHierarchyGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserHierarchyGroupAsync(array{HierarchyGroupId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result deleteView(array $args = [])
 * @phpstan-method \Aws\Result deleteView(array{InstanceId?: string, ViewId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteViewAsync(array{InstanceId?: string, ViewId?: string, ...} $args = [])
 * @method \Aws\Result deleteViewVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteViewVersion(array{InstanceId?: string, ViewId?: string, ViewVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteViewVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteViewVersionAsync(array{InstanceId?: string, ViewId?: string, ViewVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteVocabulary(array $args = [])
 * @phpstan-method \Aws\Result deleteVocabulary(array{InstanceId?: string, VocabularyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVocabularyAsync(array{InstanceId?: string, VocabularyId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkspace(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspace(array{InstanceId?: string, WorkspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array{InstanceId?: string, WorkspaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkspaceMedia(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspaceMedia(array{
 *     InstanceId?: string,
 *     WorkspaceId?: string,
 *     MediaType?: 'IMAGE_LOGO_DARK_FAVICON'|'IMAGE_LOGO_DARK_HORIZONTAL'|'IMAGE_LOGO_LIGHT_FAVICON'|'IMAGE_LOGO_LIGHT_HORIZONTAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceMediaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceMediaAsync(array{
 *     InstanceId?: string,
 *     WorkspaceId?: string,
 *     MediaType?: 'IMAGE_LOGO_DARK_FAVICON'|'IMAGE_LOGO_DARK_HORIZONTAL'|'IMAGE_LOGO_LIGHT_FAVICON'|'IMAGE_LOGO_LIGHT_HORIZONTAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteWorkspacePage(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspacePage(array{InstanceId?: string, WorkspaceId?: string, Page?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspacePageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspacePageAsync(array{InstanceId?: string, WorkspaceId?: string, Page?: string, ...} $args = [])
 * @method \Aws\Result describeAgentStatus(array $args = [])
 * @phpstan-method \Aws\Result describeAgentStatus(array{InstanceId?: string, AgentStatusId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAgentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAgentStatusAsync(array{InstanceId?: string, AgentStatusId?: string, ...} $args = [])
 * @method \Aws\Result describeAttachedFilesConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeAttachedFilesConfiguration(array{InstanceId?: string, AttachmentScope?: 'CASE'|'CHAT'|'EMAIL'|'TASK', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAttachedFilesConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAttachedFilesConfigurationAsync(array{InstanceId?: string, AttachmentScope?: 'CASE'|'CHAT'|'EMAIL'|'TASK', ...} $args = [])
 * @method \Aws\Result describeAuthenticationProfile(array $args = [])
 * @phpstan-method \Aws\Result describeAuthenticationProfile(array{AuthenticationProfileId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAuthenticationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAuthenticationProfileAsync(array{AuthenticationProfileId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result describeContact(array $args = [])
 * @phpstan-method \Aws\Result describeContact(array{InstanceId?: string, ContactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContactAsync(array{InstanceId?: string, ContactId?: string, ...} $args = [])
 * @method \Aws\Result describeContactEvaluation(array $args = [])
 * @phpstan-method \Aws\Result describeContactEvaluation(array{InstanceId?: string, EvaluationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContactEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContactEvaluationAsync(array{InstanceId?: string, EvaluationId?: string, ...} $args = [])
 * @method \Aws\Result describeContactFlow(array $args = [])
 * @phpstan-method \Aws\Result describeContactFlow(array{InstanceId?: string, ContactFlowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContactFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContactFlowAsync(array{InstanceId?: string, ContactFlowId?: string, ...} $args = [])
 * @method \Aws\Result describeContactFlowModule(array $args = [])
 * @phpstan-method \Aws\Result describeContactFlowModule(array{InstanceId?: string, ContactFlowModuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContactFlowModuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContactFlowModuleAsync(array{InstanceId?: string, ContactFlowModuleId?: string, ...} $args = [])
 * @method \Aws\Result describeContactFlowModuleAlias(array $args = [])
 * @phpstan-method \Aws\Result describeContactFlowModuleAlias(array{InstanceId?: string, ContactFlowModuleId?: string, AliasId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContactFlowModuleAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContactFlowModuleAliasAsync(array{InstanceId?: string, ContactFlowModuleId?: string, AliasId?: string, ...} $args = [])
 * @method \Aws\Result describeDataTable(array $args = [])
 * @phpstan-method \Aws\Result describeDataTable(array{InstanceId?: string, DataTableId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataTableAsync(array{InstanceId?: string, DataTableId?: string, ...} $args = [])
 * @method \Aws\Result describeDataTableAttribute(array $args = [])
 * @phpstan-method \Aws\Result describeDataTableAttribute(array{InstanceId?: string, DataTableId?: string, AttributeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataTableAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataTableAttributeAsync(array{InstanceId?: string, DataTableId?: string, AttributeName?: string, ...} $args = [])
 * @method \Aws\Result describeEmailAddress(array $args = [])
 * @phpstan-method \Aws\Result describeEmailAddress(array{InstanceId?: string, EmailAddressId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEmailAddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEmailAddressAsync(array{InstanceId?: string, EmailAddressId?: string, ...} $args = [])
 * @method \Aws\Result describeEvaluationForm(array $args = [])
 * @phpstan-method \Aws\Result describeEvaluationForm(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEvaluationFormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEvaluationFormAsync(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \Aws\Result describeHoursOfOperation(array $args = [])
 * @phpstan-method \Aws\Result describeHoursOfOperation(array{InstanceId?: string, HoursOfOperationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHoursOfOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHoursOfOperationAsync(array{InstanceId?: string, HoursOfOperationId?: string, ...} $args = [])
 * @method \Aws\Result describeHoursOfOperationOverride(array $args = [])
 * @phpstan-method \Aws\Result describeHoursOfOperationOverride(array{InstanceId?: string, HoursOfOperationId?: string, HoursOfOperationOverrideId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHoursOfOperationOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHoursOfOperationOverrideAsync(array{InstanceId?: string, HoursOfOperationId?: string, HoursOfOperationOverrideId?: string, ...} $args = [])
 * @method \Aws\Result describeInstance(array $args = [])
 * @phpstan-method \Aws\Result describeInstance(array{InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceAsync(array{InstanceId?: string, ...} $args = [])
 * @method \Aws\Result describeInstanceAttribute(array $args = [])
 * @phpstan-method \Aws\Result describeInstanceAttribute(array{
 *     InstanceId?: string,
 *     AttributeType?: 'AUTO_RESOLVE_BEST_VOICES'|'CONTACTFLOW_LOGS'|'CONTACT_LENS'|'EARLY_MEDIA'|'ENHANCED_CHAT_MONITORING'|'ENHANCED_CONTACT_MONITORING'|'HIGH_VOLUME_OUTBOUND'|'INBOUND_CALLS'|'MESSAGE_STREAMING'|'MULTI_PARTY_CHAT_CONFERENCE'|'MULTI_PARTY_CONFERENCE'|'OUTBOUND_CALLS'|'USE_CUSTOM_TTS_VOICES',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceAttributeAsync(array{
 *     InstanceId?: string,
 *     AttributeType?: 'AUTO_RESOLVE_BEST_VOICES'|'CONTACTFLOW_LOGS'|'CONTACT_LENS'|'EARLY_MEDIA'|'ENHANCED_CHAT_MONITORING'|'ENHANCED_CONTACT_MONITORING'|'HIGH_VOLUME_OUTBOUND'|'INBOUND_CALLS'|'MESSAGE_STREAMING'|'MULTI_PARTY_CHAT_CONFERENCE'|'MULTI_PARTY_CONFERENCE'|'OUTBOUND_CALLS'|'USE_CUSTOM_TTS_VOICES',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInstanceStorageConfig(array $args = [])
 * @phpstan-method \Aws\Result describeInstanceStorageConfig(array{
 *     InstanceId?: string,
 *     AssociationId?: string,
 *     ResourceType?: 'AGENT_EVENTS'|'ATTACHMENTS'|'CALL_RECORDINGS'|'CHAT_TRANSCRIPTS'|'CONTACT_EVALUATIONS'|'CONTACT_TRACE_RECORDS'|'EMAIL_MESSAGES'|'MEDIA_STREAMS'|'REAL_TIME_CONTACT_ANALYSIS_CHAT_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_VOICE_SEGMENTS'|'SCHEDULED_REPORTS'|'SCREEN_RECORDINGS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceStorageConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceStorageConfigAsync(array{
 *     InstanceId?: string,
 *     AssociationId?: string,
 *     ResourceType?: 'AGENT_EVENTS'|'ATTACHMENTS'|'CALL_RECORDINGS'|'CHAT_TRANSCRIPTS'|'CONTACT_EVALUATIONS'|'CONTACT_TRACE_RECORDS'|'EMAIL_MESSAGES'|'MEDIA_STREAMS'|'REAL_TIME_CONTACT_ANALYSIS_CHAT_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_VOICE_SEGMENTS'|'SCHEDULED_REPORTS'|'SCREEN_RECORDINGS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeNotification(array $args = [])
 * @phpstan-method \Aws\Result describeNotification(array{InstanceId?: string, NotificationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotificationAsync(array{InstanceId?: string, NotificationId?: string, ...} $args = [])
 * @method \Aws\Result describePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result describePhoneNumber(array{PhoneNumberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePhoneNumberAsync(array{PhoneNumberId?: string, ...} $args = [])
 * @method \Aws\Result describePredefinedAttribute(array $args = [])
 * @phpstan-method \Aws\Result describePredefinedAttribute(array{InstanceId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePredefinedAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePredefinedAttributeAsync(array{InstanceId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result describePrompt(array $args = [])
 * @phpstan-method \Aws\Result describePrompt(array{InstanceId?: string, PromptId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePromptAsync(array{InstanceId?: string, PromptId?: string, ...} $args = [])
 * @method \Aws\Result describeQueue(array $args = [])
 * @phpstan-method \Aws\Result describeQueue(array{InstanceId?: string, QueueId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQueueAsync(array{InstanceId?: string, QueueId?: string, ...} $args = [])
 * @method \Aws\Result describeQuickConnect(array $args = [])
 * @phpstan-method \Aws\Result describeQuickConnect(array{InstanceId?: string, QuickConnectId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQuickConnectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQuickConnectAsync(array{InstanceId?: string, QuickConnectId?: string, ...} $args = [])
 * @method \Aws\Result describeRoutingProfile(array $args = [])
 * @phpstan-method \Aws\Result describeRoutingProfile(array{InstanceId?: string, RoutingProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRoutingProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRoutingProfileAsync(array{InstanceId?: string, RoutingProfileId?: string, ...} $args = [])
 * @method \Aws\Result describeRule(array $args = [])
 * @phpstan-method \Aws\Result describeRule(array{InstanceId?: string, RuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRuleAsync(array{InstanceId?: string, RuleId?: string, ...} $args = [])
 * @method \Aws\Result describeSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result describeSecurityProfile(array{SecurityProfileId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSecurityProfileAsync(array{SecurityProfileId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result describeTestCase(array $args = [])
 * @phpstan-method \Aws\Result describeTestCase(array{InstanceId?: string, TestCaseId?: string, Status?: 'PUBLISHED'|'SAVED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTestCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTestCaseAsync(array{InstanceId?: string, TestCaseId?: string, Status?: 'PUBLISHED'|'SAVED', ...} $args = [])
 * @method \Aws\Result describeTrafficDistributionGroup(array $args = [])
 * @phpstan-method \Aws\Result describeTrafficDistributionGroup(array{TrafficDistributionGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrafficDistributionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrafficDistributionGroupAsync(array{TrafficDistributionGroupId?: string, ...} $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @phpstan-method \Aws\Result describeUser(array{UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserAsync(array{UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result describeUserHierarchyGroup(array $args = [])
 * @phpstan-method \Aws\Result describeUserHierarchyGroup(array{HierarchyGroupId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserHierarchyGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserHierarchyGroupAsync(array{HierarchyGroupId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result describeUserHierarchyStructure(array $args = [])
 * @phpstan-method \Aws\Result describeUserHierarchyStructure(array{InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserHierarchyStructureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserHierarchyStructureAsync(array{InstanceId?: string, ...} $args = [])
 * @method \Aws\Result describeView(array $args = [])
 * @phpstan-method \Aws\Result describeView(array{InstanceId?: string, ViewId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeViewAsync(array{InstanceId?: string, ViewId?: string, ...} $args = [])
 * @method \Aws\Result describeVocabulary(array $args = [])
 * @phpstan-method \Aws\Result describeVocabulary(array{InstanceId?: string, VocabularyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVocabularyAsync(array{InstanceId?: string, VocabularyId?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspace(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspace(array{InstanceId?: string, WorkspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceAsync(array{InstanceId?: string, WorkspaceId?: string, ...} $args = [])
 * @method \Aws\Result disassociateAnalyticsDataSet(array $args = [])
 * @phpstan-method \Aws\Result disassociateAnalyticsDataSet(array{InstanceId?: string, DataSetId?: string, TargetAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAnalyticsDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAnalyticsDataSetAsync(array{InstanceId?: string, DataSetId?: string, TargetAccountId?: string, ...} $args = [])
 * @method \Aws\Result disassociateApprovedOrigin(array $args = [])
 * @phpstan-method \Aws\Result disassociateApprovedOrigin(array{InstanceId?: string, Origin?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateApprovedOriginAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateApprovedOriginAsync(array{InstanceId?: string, Origin?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateBot(array $args = [])
 * @phpstan-method \Aws\Result disassociateBot(array{
 *     InstanceId?: string,
 *     LexBot?: array{Name?: string, LexRegion?: string, ...},
 *     LexV2Bot?: array{AliasArn?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateBotAsync(array{
 *     InstanceId?: string,
 *     LexBot?: array{Name?: string, LexRegion?: string, ...},
 *     LexV2Bot?: array{AliasArn?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateEmailAddressAlias(array $args = [])
 * @phpstan-method \Aws\Result disassociateEmailAddressAlias(array{
 *     EmailAddressId?: string,
 *     InstanceId?: string,
 *     AliasConfiguration?: array{EmailAddressId?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateEmailAddressAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateEmailAddressAliasAsync(array{
 *     EmailAddressId?: string,
 *     InstanceId?: string,
 *     AliasConfiguration?: array{EmailAddressId?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateFlow(array $args = [])
 * @phpstan-method \Aws\Result disassociateFlow(array{
 *     InstanceId?: string,
 *     ResourceId?: string,
 *     ResourceType?: 'ANALYTICS_CONNECTOR'|'INBOUND_EMAIL'|'OUTBOUND_EMAIL'|'SMS_PHONE_NUMBER'|'WHATSAPP_MESSAGING_PHONE_NUMBER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFlowAsync(array{
 *     InstanceId?: string,
 *     ResourceId?: string,
 *     ResourceType?: 'ANALYTICS_CONNECTOR'|'INBOUND_EMAIL'|'OUTBOUND_EMAIL'|'SMS_PHONE_NUMBER'|'WHATSAPP_MESSAGING_PHONE_NUMBER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateHoursOfOperations(array $args = [])
 * @phpstan-method \Aws\Result disassociateHoursOfOperations(array{InstanceId?: string, HoursOfOperationId?: string, ParentHoursOfOperationIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateHoursOfOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateHoursOfOperationsAsync(array{InstanceId?: string, HoursOfOperationId?: string, ParentHoursOfOperationIds?: list<string>, ...} $args = [])
 * @method \Aws\Result disassociateInstanceStorageConfig(array $args = [])
 * @phpstan-method \Aws\Result disassociateInstanceStorageConfig(array{
 *     InstanceId?: string,
 *     AssociationId?: string,
 *     ResourceType?: 'AGENT_EVENTS'|'ATTACHMENTS'|'CALL_RECORDINGS'|'CHAT_TRANSCRIPTS'|'CONTACT_EVALUATIONS'|'CONTACT_TRACE_RECORDS'|'EMAIL_MESSAGES'|'MEDIA_STREAMS'|'REAL_TIME_CONTACT_ANALYSIS_CHAT_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_VOICE_SEGMENTS'|'SCHEDULED_REPORTS'|'SCREEN_RECORDINGS',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateInstanceStorageConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateInstanceStorageConfigAsync(array{
 *     InstanceId?: string,
 *     AssociationId?: string,
 *     ResourceType?: 'AGENT_EVENTS'|'ATTACHMENTS'|'CALL_RECORDINGS'|'CHAT_TRANSCRIPTS'|'CONTACT_EVALUATIONS'|'CONTACT_TRACE_RECORDS'|'EMAIL_MESSAGES'|'MEDIA_STREAMS'|'REAL_TIME_CONTACT_ANALYSIS_CHAT_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_VOICE_SEGMENTS'|'SCHEDULED_REPORTS'|'SCREEN_RECORDINGS',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateLambdaFunction(array $args = [])
 * @phpstan-method \Aws\Result disassociateLambdaFunction(array{InstanceId?: string, FunctionArn?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateLambdaFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateLambdaFunctionAsync(array{InstanceId?: string, FunctionArn?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateLexBot(array $args = [])
 * @phpstan-method \Aws\Result disassociateLexBot(array{InstanceId?: string, BotName?: string, LexRegion?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateLexBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateLexBotAsync(array{InstanceId?: string, BotName?: string, LexRegion?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result disassociatePhoneNumberContactFlow(array $args = [])
 * @phpstan-method \Aws\Result disassociatePhoneNumberContactFlow(array{PhoneNumberId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePhoneNumberContactFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociatePhoneNumberContactFlowAsync(array{PhoneNumberId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result disassociateQueueEmailAddresses(array $args = [])
 * @phpstan-method \Aws\Result disassociateQueueEmailAddresses(array{InstanceId?: string, QueueId?: string, EmailAddressesId?: list<string>, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateQueueEmailAddressesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateQueueEmailAddressesAsync(array{InstanceId?: string, QueueId?: string, EmailAddressesId?: list<string>, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateQueueQuickConnects(array $args = [])
 * @phpstan-method \Aws\Result disassociateQueueQuickConnects(array{InstanceId?: string, QueueId?: string, QuickConnectIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateQueueQuickConnectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateQueueQuickConnectsAsync(array{InstanceId?: string, QueueId?: string, QuickConnectIds?: list<string>, ...} $args = [])
 * @method \Aws\Result disassociateRoutingProfileQueues(array $args = [])
 * @phpstan-method \Aws\Result disassociateRoutingProfileQueues(array{
 *     InstanceId?: string,
 *     RoutingProfileId?: string,
 *     QueueReferences?: list<array{QueueId?: string, Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', ...}>,
 *     ManualAssignmentQueueReferences?: list<array{QueueId?: string, Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateRoutingProfileQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateRoutingProfileQueuesAsync(array{
 *     InstanceId?: string,
 *     RoutingProfileId?: string,
 *     QueueReferences?: list<array{QueueId?: string, Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', ...}>,
 *     ManualAssignmentQueueReferences?: list<array{QueueId?: string, Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateSecurityKey(array $args = [])
 * @phpstan-method \Aws\Result disassociateSecurityKey(array{InstanceId?: string, AssociationId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSecurityKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSecurityKeyAsync(array{InstanceId?: string, AssociationId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateSecurityProfiles(array $args = [])
 * @phpstan-method \Aws\Result disassociateSecurityProfiles(array{
 *     InstanceId?: string,
 *     SecurityProfiles?: list<array{Id?: string, ...}>,
 *     EntityType?: 'AI_AGENT'|'USER',
 *     EntityArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSecurityProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSecurityProfilesAsync(array{
 *     InstanceId?: string,
 *     SecurityProfiles?: list<array{Id?: string, ...}>,
 *     EntityType?: 'AI_AGENT'|'USER',
 *     EntityArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateTrafficDistributionGroupUser(array $args = [])
 * @phpstan-method \Aws\Result disassociateTrafficDistributionGroupUser(array{TrafficDistributionGroupId?: string, UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateTrafficDistributionGroupUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateTrafficDistributionGroupUserAsync(array{TrafficDistributionGroupId?: string, UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result disassociateUserProficiencies(array $args = [])
 * @phpstan-method \Aws\Result disassociateUserProficiencies(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     UserProficiencies?: list<array{AttributeName?: string, AttributeValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateUserProficienciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateUserProficienciesAsync(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     UserProficiencies?: list<array{AttributeName?: string, AttributeValue?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateWorkspace(array $args = [])
 * @phpstan-method \Aws\Result disassociateWorkspace(array{InstanceId?: string, WorkspaceId?: string, ResourceArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateWorkspaceAsync(array{InstanceId?: string, WorkspaceId?: string, ResourceArns?: list<string>, ...} $args = [])
 * @method \Aws\Result dismissUserContact(array $args = [])
 * @phpstan-method \Aws\Result dismissUserContact(array{UserId?: string, InstanceId?: string, ContactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise dismissUserContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise dismissUserContactAsync(array{UserId?: string, InstanceId?: string, ContactId?: string, ...} $args = [])
 * @method \Aws\Result evaluateDataTableValues(array $args = [])
 * @phpstan-method \Aws\Result evaluateDataTableValues(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Values?: list<array{PrimaryValues?: list<array>, AttributeNames?: list<string>, ...}>,
 *     TimeZone?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise evaluateDataTableValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise evaluateDataTableValuesAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Values?: list<array{PrimaryValues?: list<array>, AttributeNames?: list<string>, ...}>,
 *     TimeZone?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAttachedFile(array $args = [])
 * @phpstan-method \Aws\Result getAttachedFile(array{InstanceId?: string, FileId?: string, UrlExpiryInSeconds?: int, AssociatedResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAttachedFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAttachedFileAsync(array{InstanceId?: string, FileId?: string, UrlExpiryInSeconds?: int, AssociatedResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getContactAttributes(array $args = [])
 * @phpstan-method \Aws\Result getContactAttributes(array{InstanceId?: string, InitialContactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactAttributesAsync(array{InstanceId?: string, InitialContactId?: string, ...} $args = [])
 * @method \Aws\Result getContactMetrics(array $args = [])
 * @phpstan-method \Aws\Result getContactMetrics(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     Metrics?: list<array{Name?: 'ESTIMATED_WAIT_TIME'|'POSITION_IN_QUEUE', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactMetricsAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     Metrics?: list<array{Name?: 'ESTIMATED_WAIT_TIME'|'POSITION_IN_QUEUE', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCurrentMetricData(array $args = [])
 * @phpstan-method \Aws\Result getCurrentMetricData(array{
 *     InstanceId?: string,
 *     Filters?: array{
 *         Queues?: list<string>,
 *         Channels?: list<'CHAT'|'EMAIL'|'TASK'|'VOICE'>,
 *         RoutingProfiles?: list<string>,
 *         RoutingStepExpressions?: list<string>,
 *         AgentStatuses?: list<string>,
 *         Subtypes?: list<string>,
 *         ValidationTestTypes?: list<string>,
 *         ...,
 *     },
 *     Groupings?: list<'AGENT_STATUS'|'CHANNEL'|'QUEUE'|'ROUTING_PROFILE'|'ROUTING_STEP_EXPRESSION'|'SUBTYPE'|'VALIDATION_TEST_TYPE'>,
 *     CurrentMetrics?: list<array{
 *         Name?: 'AGENTS_AFTER_CONTACT_WORK'|'AGENTS_AVAILABLE'|'AGENTS_ERROR'|'AGENTS_NON_PRODUCTIVE'|'AGENTS_ONLINE'|'AGENTS_ON_CALL'|'AGENTS_ON_CONTACT'|'AGENTS_STAFFED'|'CONTACTS_IN_QUEUE'|'CONTACTS_SCHEDULED'|'ESTIMATED_WAIT_TIME'|'OLDEST_CONTACT_AGE'|'SLOTS_ACTIVE'|'SLOTS_AVAILABLE',
 *         MetricId?: string,
 *         Unit?: 'COUNT'|'PERCENT'|'SECONDS',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortCriteria?: list<array{
 *         SortByMetric?: 'AGENTS_AFTER_CONTACT_WORK'|'AGENTS_AVAILABLE'|'AGENTS_ERROR'|'AGENTS_NON_PRODUCTIVE'|'AGENTS_ONLINE'|'AGENTS_ON_CALL'|'AGENTS_ON_CONTACT'|'AGENTS_STAFFED'|'CONTACTS_IN_QUEUE'|'CONTACTS_SCHEDULED'|'ESTIMATED_WAIT_TIME'|'OLDEST_CONTACT_AGE'|'SLOTS_ACTIVE'|'SLOTS_AVAILABLE',
 *         SortOrder?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCurrentMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCurrentMetricDataAsync(array{
 *     InstanceId?: string,
 *     Filters?: array{
 *         Queues?: list<string>,
 *         Channels?: list<'CHAT'|'EMAIL'|'TASK'|'VOICE'>,
 *         RoutingProfiles?: list<string>,
 *         RoutingStepExpressions?: list<string>,
 *         AgentStatuses?: list<string>,
 *         Subtypes?: list<string>,
 *         ValidationTestTypes?: list<string>,
 *         ...,
 *     },
 *     Groupings?: list<'AGENT_STATUS'|'CHANNEL'|'QUEUE'|'ROUTING_PROFILE'|'ROUTING_STEP_EXPRESSION'|'SUBTYPE'|'VALIDATION_TEST_TYPE'>,
 *     CurrentMetrics?: list<array{
 *         Name?: 'AGENTS_AFTER_CONTACT_WORK'|'AGENTS_AVAILABLE'|'AGENTS_ERROR'|'AGENTS_NON_PRODUCTIVE'|'AGENTS_ONLINE'|'AGENTS_ON_CALL'|'AGENTS_ON_CONTACT'|'AGENTS_STAFFED'|'CONTACTS_IN_QUEUE'|'CONTACTS_SCHEDULED'|'ESTIMATED_WAIT_TIME'|'OLDEST_CONTACT_AGE'|'SLOTS_ACTIVE'|'SLOTS_AVAILABLE',
 *         MetricId?: string,
 *         Unit?: 'COUNT'|'PERCENT'|'SECONDS',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortCriteria?: list<array{
 *         SortByMetric?: 'AGENTS_AFTER_CONTACT_WORK'|'AGENTS_AVAILABLE'|'AGENTS_ERROR'|'AGENTS_NON_PRODUCTIVE'|'AGENTS_ONLINE'|'AGENTS_ON_CALL'|'AGENTS_ON_CONTACT'|'AGENTS_STAFFED'|'CONTACTS_IN_QUEUE'|'CONTACTS_SCHEDULED'|'ESTIMATED_WAIT_TIME'|'OLDEST_CONTACT_AGE'|'SLOTS_ACTIVE'|'SLOTS_AVAILABLE',
 *         SortOrder?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCurrentUserData(array $args = [])
 * @phpstan-method \Aws\Result getCurrentUserData(array{
 *     InstanceId?: string,
 *     Filters?: array{
 *         Queues?: list<string>,
 *         ContactFilter?: array{
 *             ContactStates?: list<'CONNECTED'|'CONNECTED_ONHOLD'|'CONNECTING'|'ENDED'|'ERROR'|'INCOMING'|'MISSED'|'PENDING'|'REJECTED'>,
 *             ...,
 *         },
 *         RoutingProfiles?: list<string>,
 *         Agents?: list<string>,
 *         UserHierarchyGroups?: list<string>,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCurrentUserDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCurrentUserDataAsync(array{
 *     InstanceId?: string,
 *     Filters?: array{
 *         Queues?: list<string>,
 *         ContactFilter?: array{
 *             ContactStates?: list<'CONNECTED'|'CONNECTED_ONHOLD'|'CONNECTING'|'ENDED'|'ERROR'|'INCOMING'|'MISSED'|'PENDING'|'REJECTED'>,
 *             ...,
 *         },
 *         RoutingProfiles?: list<string>,
 *         Agents?: list<string>,
 *         UserHierarchyGroups?: list<string>,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEffectiveHoursOfOperations(array $args = [])
 * @phpstan-method \Aws\Result getEffectiveHoursOfOperations(array{InstanceId?: string, HoursOfOperationId?: string, FromDate?: string, ToDate?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEffectiveHoursOfOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEffectiveHoursOfOperationsAsync(array{InstanceId?: string, HoursOfOperationId?: string, FromDate?: string, ToDate?: string, ...} $args = [])
 * @method \Aws\Result getEvaluationFormValidation(array $args = [])
 * @phpstan-method \Aws\Result getEvaluationFormValidation(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEvaluationFormValidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEvaluationFormValidationAsync(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \Aws\Result getFederationToken(array $args = [])
 * @phpstan-method \Aws\Result getFederationToken(array{InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFederationTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFederationTokenAsync(array{InstanceId?: string, ...} $args = [])
 * @method \Aws\Result getFlowAssociation(array $args = [])
 * @phpstan-method \Aws\Result getFlowAssociation(array{
 *     InstanceId?: string,
 *     ResourceId?: string,
 *     ResourceType?: 'ANALYTICS_CONNECTOR'|'INBOUND_EMAIL'|'OUTBOUND_EMAIL'|'SMS_PHONE_NUMBER'|'WHATSAPP_MESSAGING_PHONE_NUMBER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFlowAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFlowAssociationAsync(array{
 *     InstanceId?: string,
 *     ResourceId?: string,
 *     ResourceType?: 'ANALYTICS_CONNECTOR'|'INBOUND_EMAIL'|'OUTBOUND_EMAIL'|'SMS_PHONE_NUMBER'|'WHATSAPP_MESSAGING_PHONE_NUMBER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMetricData(array $args = [])
 * @phpstan-method \Aws\Result getMetricData(array{
 *     InstanceId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Filters?: array{
 *         Queues?: list<string>,
 *         Channels?: list<'CHAT'|'EMAIL'|'TASK'|'VOICE'>,
 *         RoutingProfiles?: list<string>,
 *         RoutingStepExpressions?: list<string>,
 *         AgentStatuses?: list<string>,
 *         Subtypes?: list<string>,
 *         ValidationTestTypes?: list<string>,
 *         ...,
 *     },
 *     Groupings?: list<'AGENT_STATUS'|'CHANNEL'|'QUEUE'|'ROUTING_PROFILE'|'ROUTING_STEP_EXPRESSION'|'SUBTYPE'|'VALIDATION_TEST_TYPE'>,
 *     HistoricalMetrics?: list<array{
 *         Name?: 'ABANDON_TIME'|'AFTER_CONTACT_WORK_TIME'|'API_CONTACTS_HANDLED'|'CALLBACK_CONTACTS_HANDLED'|'CONTACTS_ABANDONED'|'CONTACTS_AGENT_HUNG_UP_FIRST'|'CONTACTS_CONSULTED'|'CONTACTS_HANDLED'|'CONTACTS_HANDLED_INCOMING'|'CONTACTS_HANDLED_OUTBOUND'|'CONTACTS_HOLD_ABANDONS'|'CONTACTS_MISSED'|'CONTACTS_QUEUED'|'CONTACTS_TRANSFERRED_IN'|'CONTACTS_TRANSFERRED_IN_FROM_QUEUE'|'CONTACTS_TRANSFERRED_OUT'|'CONTACTS_TRANSFERRED_OUT_FROM_QUEUE'|'HANDLE_TIME'|'HOLD_TIME'|'INTERACTION_AND_HOLD_TIME'|'INTERACTION_TIME'|'OCCUPANCY'|'QUEUED_TIME'|'QUEUE_ANSWER_TIME'|'SERVICE_LEVEL',
 *         Threshold?: array,
 *         Statistic?: 'AVG'|'MAX'|'SUM',
 *         Unit?: 'COUNT'|'PERCENT'|'SECONDS',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetricDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetricDataAsync(array{
 *     InstanceId?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Filters?: array{
 *         Queues?: list<string>,
 *         Channels?: list<'CHAT'|'EMAIL'|'TASK'|'VOICE'>,
 *         RoutingProfiles?: list<string>,
 *         RoutingStepExpressions?: list<string>,
 *         AgentStatuses?: list<string>,
 *         Subtypes?: list<string>,
 *         ValidationTestTypes?: list<string>,
 *         ...,
 *     },
 *     Groupings?: list<'AGENT_STATUS'|'CHANNEL'|'QUEUE'|'ROUTING_PROFILE'|'ROUTING_STEP_EXPRESSION'|'SUBTYPE'|'VALIDATION_TEST_TYPE'>,
 *     HistoricalMetrics?: list<array{
 *         Name?: 'ABANDON_TIME'|'AFTER_CONTACT_WORK_TIME'|'API_CONTACTS_HANDLED'|'CALLBACK_CONTACTS_HANDLED'|'CONTACTS_ABANDONED'|'CONTACTS_AGENT_HUNG_UP_FIRST'|'CONTACTS_CONSULTED'|'CONTACTS_HANDLED'|'CONTACTS_HANDLED_INCOMING'|'CONTACTS_HANDLED_OUTBOUND'|'CONTACTS_HOLD_ABANDONS'|'CONTACTS_MISSED'|'CONTACTS_QUEUED'|'CONTACTS_TRANSFERRED_IN'|'CONTACTS_TRANSFERRED_IN_FROM_QUEUE'|'CONTACTS_TRANSFERRED_OUT'|'CONTACTS_TRANSFERRED_OUT_FROM_QUEUE'|'HANDLE_TIME'|'HOLD_TIME'|'INTERACTION_AND_HOLD_TIME'|'INTERACTION_TIME'|'OCCUPANCY'|'QUEUED_TIME'|'QUEUE_ANSWER_TIME'|'SERVICE_LEVEL',
 *         Threshold?: array,
 *         Statistic?: 'AVG'|'MAX'|'SUM',
 *         Unit?: 'COUNT'|'PERCENT'|'SECONDS',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMetricDataV2(array $args = [])
 * @phpstan-method \Aws\Result getMetricDataV2(array{
 *     ResourceArn?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Interval?: array{TimeZone?: string, IntervalPeriod?: 'DAY'|'FIFTEEN_MIN'|'HOUR'|'THIRTY_MIN'|'TOTAL'|'WEEK', ...},
 *     Filters?: list<array{FilterKey?: string, FilterValues?: list<string>, StringCondition?: array, ...}>,
 *     Groupings?: list<string>,
 *     Metrics?: list<array{Name?: string, Threshold?: list<array>, MetricId?: string, MetricFilters?: list<array>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetricDataV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetricDataV2Async(array{
 *     ResourceArn?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Interval?: array{TimeZone?: string, IntervalPeriod?: 'DAY'|'FIFTEEN_MIN'|'HOUR'|'THIRTY_MIN'|'TOTAL'|'WEEK', ...},
 *     Filters?: list<array{FilterKey?: string, FilterValues?: list<string>, StringCondition?: array, ...}>,
 *     Groupings?: list<string>,
 *     Metrics?: list<array{Name?: string, Threshold?: list<array>, MetricId?: string, MetricFilters?: list<array>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPromptFile(array $args = [])
 * @phpstan-method \Aws\Result getPromptFile(array{InstanceId?: string, PromptId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPromptFileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPromptFileAsync(array{InstanceId?: string, PromptId?: string, ...} $args = [])
 * @method \Aws\Result getTaskTemplate(array $args = [])
 * @phpstan-method \Aws\Result getTaskTemplate(array{InstanceId?: string, TaskTemplateId?: string, SnapshotVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTaskTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTaskTemplateAsync(array{InstanceId?: string, TaskTemplateId?: string, SnapshotVersion?: string, ...} $args = [])
 * @method \Aws\Result getTestCaseExecutionSummary(array $args = [])
 * @phpstan-method \Aws\Result getTestCaseExecutionSummary(array{InstanceId?: string, TestCaseId?: string, TestCaseExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTestCaseExecutionSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTestCaseExecutionSummaryAsync(array{InstanceId?: string, TestCaseId?: string, TestCaseExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getTrafficDistribution(array $args = [])
 * @phpstan-method \Aws\Result getTrafficDistribution(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrafficDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrafficDistributionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result importPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result importPhoneNumber(array{
 *     InstanceId?: string,
 *     SourcePhoneNumberArn?: string,
 *     PhoneNumberDescription?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importPhoneNumberAsync(array{
 *     InstanceId?: string,
 *     SourcePhoneNumberArn?: string,
 *     PhoneNumberDescription?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importWorkspaceMedia(array $args = [])
 * @phpstan-method \Aws\Result importWorkspaceMedia(array{
 *     InstanceId?: string,
 *     WorkspaceId?: string,
 *     MediaType?: 'IMAGE_LOGO_DARK_FAVICON'|'IMAGE_LOGO_DARK_HORIZONTAL'|'IMAGE_LOGO_LIGHT_FAVICON'|'IMAGE_LOGO_LIGHT_HORIZONTAL',
 *     MediaSource?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importWorkspaceMediaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importWorkspaceMediaAsync(array{
 *     InstanceId?: string,
 *     WorkspaceId?: string,
 *     MediaType?: 'IMAGE_LOGO_DARK_FAVICON'|'IMAGE_LOGO_DARK_HORIZONTAL'|'IMAGE_LOGO_LIGHT_FAVICON'|'IMAGE_LOGO_LIGHT_HORIZONTAL',
 *     MediaSource?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAgentStatuses(array $args = [])
 * @phpstan-method \Aws\Result listAgentStatuses(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AgentStatusTypes?: list<'CUSTOM'|'OFFLINE'|'ROUTABLE'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentStatusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentStatusesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AgentStatusTypes?: list<'CUSTOM'|'OFFLINE'|'ROUTABLE'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAnalyticsDataAssociations(array $args = [])
 * @phpstan-method \Aws\Result listAnalyticsDataAssociations(array{InstanceId?: string, DataSetId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnalyticsDataAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnalyticsDataAssociationsAsync(array{InstanceId?: string, DataSetId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAnalyticsDataLakeDataSets(array $args = [])
 * @phpstan-method \Aws\Result listAnalyticsDataLakeDataSets(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnalyticsDataLakeDataSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnalyticsDataLakeDataSetsAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listApprovedOrigins(array $args = [])
 * @phpstan-method \Aws\Result listApprovedOrigins(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApprovedOriginsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApprovedOriginsAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssociatedContacts(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedContacts(array{InstanceId?: string, ContactId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedContactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedContactsAsync(array{InstanceId?: string, ContactId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAttachedFilesConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listAttachedFilesConfigurations(array{InstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachedFilesConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachedFilesConfigurationsAsync(array{InstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAuthenticationProfiles(array $args = [])
 * @phpstan-method \Aws\Result listAuthenticationProfiles(array{InstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAuthenticationProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAuthenticationProfilesAsync(array{InstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listBots(array $args = [])
 * @phpstan-method \Aws\Result listBots(array{InstanceId?: string, NextToken?: string, MaxResults?: int, LexVersion?: 'V1'|'V2', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotsAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, LexVersion?: 'V1'|'V2', ...} $args = [])
 * @method \Aws\Result listChildHoursOfOperations(array $args = [])
 * @phpstan-method \Aws\Result listChildHoursOfOperations(array{InstanceId?: string, HoursOfOperationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChildHoursOfOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChildHoursOfOperationsAsync(array{InstanceId?: string, HoursOfOperationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listContactEvaluations(array $args = [])
 * @phpstan-method \Aws\Result listContactEvaluations(array{InstanceId?: string, ContactId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactEvaluationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactEvaluationsAsync(array{InstanceId?: string, ContactId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listContactFlowModuleAliases(array $args = [])
 * @phpstan-method \Aws\Result listContactFlowModuleAliases(array{InstanceId?: string, ContactFlowModuleId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactFlowModuleAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactFlowModuleAliasesAsync(array{InstanceId?: string, ContactFlowModuleId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listContactFlowModuleVersions(array $args = [])
 * @phpstan-method \Aws\Result listContactFlowModuleVersions(array{InstanceId?: string, ContactFlowModuleId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactFlowModuleVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactFlowModuleVersionsAsync(array{InstanceId?: string, ContactFlowModuleId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listContactFlowModules(array $args = [])
 * @phpstan-method \Aws\Result listContactFlowModules(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ContactFlowModuleState?: 'ACTIVE'|'ARCHIVED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactFlowModulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactFlowModulesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ContactFlowModuleState?: 'ACTIVE'|'ARCHIVED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listContactFlowVersions(array $args = [])
 * @phpstan-method \Aws\Result listContactFlowVersions(array{InstanceId?: string, ContactFlowId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactFlowVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactFlowVersionsAsync(array{InstanceId?: string, ContactFlowId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listContactFlows(array $args = [])
 * @phpstan-method \Aws\Result listContactFlows(array{
 *     InstanceId?: string,
 *     ContactFlowTypes?: list<'AGENT_HOLD'|'AGENT_TRANSFER'|'AGENT_WHISPER'|'CAMPAIGN'|'CONTACT_FLOW'|'CUSTOMER_HOLD'|'CUSTOMER_QUEUE'|'CUSTOMER_WHISPER'|'OUTBOUND_WHISPER'|'QUEUE_TRANSFER'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactFlowsAsync(array{
 *     InstanceId?: string,
 *     ContactFlowTypes?: list<'AGENT_HOLD'|'AGENT_TRANSFER'|'AGENT_WHISPER'|'CAMPAIGN'|'CONTACT_FLOW'|'CUSTOMER_HOLD'|'CUSTOMER_QUEUE'|'CUSTOMER_WHISPER'|'OUTBOUND_WHISPER'|'QUEUE_TRANSFER'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listContactReferences(array $args = [])
 * @phpstan-method \Aws\Result listContactReferences(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ReferenceTypes?: list<'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL'>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactReferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactReferencesAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ReferenceTypes?: list<'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL'>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataTableAttributes(array $args = [])
 * @phpstan-method \Aws\Result listDataTableAttributes(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     AttributeIds?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataTableAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataTableAttributesAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     AttributeIds?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataTablePrimaryValues(array $args = [])
 * @phpstan-method \Aws\Result listDataTablePrimaryValues(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     RecordIds?: list<string>,
 *     PrimaryAttributeValues?: list<array{AttributeName?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataTablePrimaryValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataTablePrimaryValuesAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     RecordIds?: list<string>,
 *     PrimaryAttributeValues?: list<array{AttributeName?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataTableValues(array $args = [])
 * @phpstan-method \Aws\Result listDataTableValues(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     RecordIds?: list<string>,
 *     PrimaryAttributeValues?: list<array{AttributeName?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataTableValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataTableValuesAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     RecordIds?: list<string>,
 *     PrimaryAttributeValues?: list<array{AttributeName?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataTables(array $args = [])
 * @phpstan-method \Aws\Result listDataTables(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataTablesAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDefaultVocabularies(array $args = [])
 * @phpstan-method \Aws\Result listDefaultVocabularies(array{
 *     InstanceId?: string,
 *     LanguageCode?: 'ar-AE'|'ca-ES'|'da-DK'|'de-CH'|'de-DE'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-US'|'fi-FI'|'fr-CA'|'fr-FR'|'hi-IN'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'ms-MY'|'nl-NL'|'no-NO'|'pl-PL'|'pt-BR'|'pt-PT'|'sv-SE'|'tl-PH'|'zh-CN',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDefaultVocabulariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDefaultVocabulariesAsync(array{
 *     InstanceId?: string,
 *     LanguageCode?: 'ar-AE'|'ca-ES'|'da-DK'|'de-CH'|'de-DE'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-US'|'fi-FI'|'fr-CA'|'fr-FR'|'hi-IN'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'ms-MY'|'nl-NL'|'no-NO'|'pl-PL'|'pt-BR'|'pt-PT'|'sv-SE'|'tl-PH'|'zh-CN',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEntitySecurityProfiles(array $args = [])
 * @phpstan-method \Aws\Result listEntitySecurityProfiles(array{
 *     InstanceId?: string,
 *     EntityType?: 'AI_AGENT'|'USER',
 *     EntityArn?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitySecurityProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntitySecurityProfilesAsync(array{
 *     InstanceId?: string,
 *     EntityType?: 'AI_AGENT'|'USER',
 *     EntityArn?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEvaluationFormVersions(array $args = [])
 * @phpstan-method \Aws\Result listEvaluationFormVersions(array{InstanceId?: string, EvaluationFormId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEvaluationFormVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEvaluationFormVersionsAsync(array{InstanceId?: string, EvaluationFormId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listEvaluationForms(array $args = [])
 * @phpstan-method \Aws\Result listEvaluationForms(array{InstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEvaluationFormsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEvaluationFormsAsync(array{InstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFlowAssociations(array $args = [])
 * @phpstan-method \Aws\Result listFlowAssociations(array{
 *     InstanceId?: string,
 *     ResourceType?: 'ANALYTICS_CONNECTOR'|'INBOUND_EMAIL'|'OUTBOUND_EMAIL'|'VOICE_PHONE_NUMBER'|'WHATSAPP_MESSAGING_PHONE_NUMBER',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowAssociationsAsync(array{
 *     InstanceId?: string,
 *     ResourceType?: 'ANALYTICS_CONNECTOR'|'INBOUND_EMAIL'|'OUTBOUND_EMAIL'|'VOICE_PHONE_NUMBER'|'WHATSAPP_MESSAGING_PHONE_NUMBER',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listHoursOfOperationOverrides(array $args = [])
 * @phpstan-method \Aws\Result listHoursOfOperationOverrides(array{InstanceId?: string, HoursOfOperationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHoursOfOperationOverridesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHoursOfOperationOverridesAsync(array{InstanceId?: string, HoursOfOperationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listHoursOfOperations(array $args = [])
 * @phpstan-method \Aws\Result listHoursOfOperations(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHoursOfOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHoursOfOperationsAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listInstanceAttributes(array $args = [])
 * @phpstan-method \Aws\Result listInstanceAttributes(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstanceAttributesAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listInstanceStorageConfigs(array $args = [])
 * @phpstan-method \Aws\Result listInstanceStorageConfigs(array{
 *     InstanceId?: string,
 *     ResourceType?: 'AGENT_EVENTS'|'ATTACHMENTS'|'CALL_RECORDINGS'|'CHAT_TRANSCRIPTS'|'CONTACT_EVALUATIONS'|'CONTACT_TRACE_RECORDS'|'EMAIL_MESSAGES'|'MEDIA_STREAMS'|'REAL_TIME_CONTACT_ANALYSIS_CHAT_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_VOICE_SEGMENTS'|'SCHEDULED_REPORTS'|'SCREEN_RECORDINGS',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceStorageConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstanceStorageConfigsAsync(array{
 *     InstanceId?: string,
 *     ResourceType?: 'AGENT_EVENTS'|'ATTACHMENTS'|'CALL_RECORDINGS'|'CHAT_TRANSCRIPTS'|'CONTACT_EVALUATIONS'|'CONTACT_TRACE_RECORDS'|'EMAIL_MESSAGES'|'MEDIA_STREAMS'|'REAL_TIME_CONTACT_ANALYSIS_CHAT_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_VOICE_SEGMENTS'|'SCHEDULED_REPORTS'|'SCREEN_RECORDINGS',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInstances(array $args = [])
 * @phpstan-method \Aws\Result listInstances(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstancesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listIntegrationAssociations(array $args = [])
 * @phpstan-method \Aws\Result listIntegrationAssociations(array{
 *     InstanceId?: string,
 *     IntegrationType?: 'ANALYTICS_CONNECTOR'|'APPLICATION'|'CALL_TRANSFER_CONNECTOR'|'CASES_DOMAIN'|'COGNITO_USER_POOL'|'EVENT'|'FILE_SCANNER'|'MESSAGE_PROCESSOR'|'PINPOINT_APP'|'Q_MESSAGE_TEMPLATES'|'SES_IDENTITY'|'VOICE_ID'|'WISDOM_ASSISTANT'|'WISDOM_KNOWLEDGE_BASE'|'WISDOM_QUICK_RESPONSES',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     IntegrationArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntegrationAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntegrationAssociationsAsync(array{
 *     InstanceId?: string,
 *     IntegrationType?: 'ANALYTICS_CONNECTOR'|'APPLICATION'|'CALL_TRANSFER_CONNECTOR'|'CASES_DOMAIN'|'COGNITO_USER_POOL'|'EVENT'|'FILE_SCANNER'|'MESSAGE_PROCESSOR'|'PINPOINT_APP'|'Q_MESSAGE_TEMPLATES'|'SES_IDENTITY'|'VOICE_ID'|'WISDOM_ASSISTANT'|'WISDOM_KNOWLEDGE_BASE'|'WISDOM_QUICK_RESPONSES',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     IntegrationArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLambdaFunctions(array $args = [])
 * @phpstan-method \Aws\Result listLambdaFunctions(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLambdaFunctionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLambdaFunctionsAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listLexBots(array $args = [])
 * @phpstan-method \Aws\Result listLexBots(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLexBotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLexBotsAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listNotifications(array $args = [])
 * @phpstan-method \Aws\Result listNotifications(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotificationsAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPhoneNumbers(array $args = [])
 * @phpstan-method \Aws\Result listPhoneNumbers(array{
 *     InstanceId?: string,
 *     PhoneNumberTypes?: list<'DID'|'SHARED'|'SHORT_CODE'|'THIRD_PARTY_DID'|'THIRD_PARTY_TF'|'TOLL_FREE'|'UIFN'>,
 *     PhoneNumberCountryCodes?: list<'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BR'|'BS'|'BT'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GQ'|'GR'|'GT'|'GU'|'GW'|'GY'|'HK'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPhoneNumbersAsync(array{
 *     InstanceId?: string,
 *     PhoneNumberTypes?: list<'DID'|'SHARED'|'SHORT_CODE'|'THIRD_PARTY_DID'|'THIRD_PARTY_TF'|'TOLL_FREE'|'UIFN'>,
 *     PhoneNumberCountryCodes?: list<'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BR'|'BS'|'BT'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GQ'|'GR'|'GT'|'GU'|'GW'|'GY'|'HK'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPhoneNumbersV2(array $args = [])
 * @phpstan-method \Aws\Result listPhoneNumbersV2(array{
 *     TargetArn?: string,
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     PhoneNumberCountryCodes?: list<'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BR'|'BS'|'BT'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GQ'|'GR'|'GT'|'GU'|'GW'|'GY'|'HK'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW'>,
 *     PhoneNumberTypes?: list<'DID'|'SHARED'|'SHORT_CODE'|'THIRD_PARTY_DID'|'THIRD_PARTY_TF'|'TOLL_FREE'|'UIFN'>,
 *     PhoneNumberPrefix?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumbersV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPhoneNumbersV2Async(array{
 *     TargetArn?: string,
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     PhoneNumberCountryCodes?: list<'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BR'|'BS'|'BT'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GQ'|'GR'|'GT'|'GU'|'GW'|'GY'|'HK'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW'>,
 *     PhoneNumberTypes?: list<'DID'|'SHARED'|'SHORT_CODE'|'THIRD_PARTY_DID'|'THIRD_PARTY_TF'|'TOLL_FREE'|'UIFN'>,
 *     PhoneNumberPrefix?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPredefinedAttributes(array $args = [])
 * @phpstan-method \Aws\Result listPredefinedAttributes(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPredefinedAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPredefinedAttributesAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPrompts(array $args = [])
 * @phpstan-method \Aws\Result listPrompts(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPromptsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPromptsAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueueEmailAddresses(array $args = [])
 * @phpstan-method \Aws\Result listQueueEmailAddresses(array{InstanceId?: string, QueueId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueueEmailAddressesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueueEmailAddressesAsync(array{InstanceId?: string, QueueId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueueQuickConnects(array $args = [])
 * @phpstan-method \Aws\Result listQueueQuickConnects(array{InstanceId?: string, QueueId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueueQuickConnectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueueQuickConnectsAsync(array{InstanceId?: string, QueueId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueues(array $args = [])
 * @phpstan-method \Aws\Result listQueues(array{InstanceId?: string, QueueTypes?: list<'AGENT'|'STANDARD'>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueuesAsync(array{InstanceId?: string, QueueTypes?: list<'AGENT'|'STANDARD'>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listQuickConnects(array $args = [])
 * @phpstan-method \Aws\Result listQuickConnects(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuickConnectTypes?: list<'FLOW'|'PHONE_NUMBER'|'QUEUE'|'USER'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listQuickConnectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQuickConnectsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuickConnectTypes?: list<'FLOW'|'PHONE_NUMBER'|'QUEUE'|'USER'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRealtimeContactAnalysisSegmentsV2(array $args = [])
 * @phpstan-method \Aws\Result listRealtimeContactAnalysisSegmentsV2(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     OutputType?: 'Raw'|'Redacted',
 *     SegmentTypes?: list<'Attachments'|'Categories'|'Event'|'Issues'|'PostContactSummary'|'Transcript'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRealtimeContactAnalysisSegmentsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRealtimeContactAnalysisSegmentsV2Async(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     OutputType?: 'Raw'|'Redacted',
 *     SegmentTypes?: list<'Attachments'|'Categories'|'Event'|'Issues'|'PostContactSummary'|'Transcript'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRoutingProfileManualAssignmentQueues(array $args = [])
 * @phpstan-method \Aws\Result listRoutingProfileManualAssignmentQueues(array{InstanceId?: string, RoutingProfileId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoutingProfileManualAssignmentQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoutingProfileManualAssignmentQueuesAsync(array{InstanceId?: string, RoutingProfileId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRoutingProfileQueues(array $args = [])
 * @phpstan-method \Aws\Result listRoutingProfileQueues(array{InstanceId?: string, RoutingProfileId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoutingProfileQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoutingProfileQueuesAsync(array{InstanceId?: string, RoutingProfileId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRoutingProfiles(array $args = [])
 * @phpstan-method \Aws\Result listRoutingProfiles(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoutingProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoutingProfilesAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRules(array $args = [])
 * @phpstan-method \Aws\Result listRules(array{
 *     InstanceId?: string,
 *     PublishStatus?: 'DRAFT'|'PUBLISHED',
 *     EventSourceName?: 'OnAlertUpdate'|'OnCaseCreate'|'OnCaseUpdate'|'OnContactEvaluationSubmit'|'OnEmailAnalysisAvailable'|'OnMetricDataUpdate'|'OnPostCallAnalysisAvailable'|'OnPostChatAnalysisAvailable'|'OnRealTimeCallAnalysisAvailable'|'OnRealTimeChatAnalysisAvailable'|'OnSalesforceCaseCreate'|'OnSchedulePublish'|'OnScheduleTimeOffRequestActivity'|'OnScheduleUpdate'|'OnSlaBreach'|'OnZendeskTicketCreate'|'OnZendeskTicketStatusUpdate',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRulesAsync(array{
 *     InstanceId?: string,
 *     PublishStatus?: 'DRAFT'|'PUBLISHED',
 *     EventSourceName?: 'OnAlertUpdate'|'OnCaseCreate'|'OnCaseUpdate'|'OnContactEvaluationSubmit'|'OnEmailAnalysisAvailable'|'OnMetricDataUpdate'|'OnPostCallAnalysisAvailable'|'OnPostChatAnalysisAvailable'|'OnRealTimeCallAnalysisAvailable'|'OnRealTimeChatAnalysisAvailable'|'OnSalesforceCaseCreate'|'OnSchedulePublish'|'OnScheduleTimeOffRequestActivity'|'OnScheduleUpdate'|'OnSlaBreach'|'OnZendeskTicketCreate'|'OnZendeskTicketStatusUpdate',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSecurityKeys(array $args = [])
 * @phpstan-method \Aws\Result listSecurityKeys(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityKeysAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSecurityProfileApplications(array $args = [])
 * @phpstan-method \Aws\Result listSecurityProfileApplications(array{SecurityProfileId?: string, InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityProfileApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityProfileApplicationsAsync(array{SecurityProfileId?: string, InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSecurityProfileFlowModules(array $args = [])
 * @phpstan-method \Aws\Result listSecurityProfileFlowModules(array{SecurityProfileId?: string, InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityProfileFlowModulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityProfileFlowModulesAsync(array{SecurityProfileId?: string, InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSecurityProfilePermissions(array $args = [])
 * @phpstan-method \Aws\Result listSecurityProfilePermissions(array{SecurityProfileId?: string, InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityProfilePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityProfilePermissionsAsync(array{SecurityProfileId?: string, InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSecurityProfiles(array $args = [])
 * @phpstan-method \Aws\Result listSecurityProfiles(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityProfilesAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTaskTemplates(array $args = [])
 * @phpstan-method \Aws\Result listTaskTemplates(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTaskTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTaskTemplatesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTestCaseExecutionRecords(array $args = [])
 * @phpstan-method \Aws\Result listTestCaseExecutionRecords(array{
 *     InstanceId?: string,
 *     TestCaseId?: string,
 *     TestCaseExecutionId?: string,
 *     Status?: 'FAILED'|'INITIATED'|'IN_PROGRESS'|'PASSED'|'STOPPED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestCaseExecutionRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestCaseExecutionRecordsAsync(array{
 *     InstanceId?: string,
 *     TestCaseId?: string,
 *     TestCaseExecutionId?: string,
 *     Status?: 'FAILED'|'INITIATED'|'IN_PROGRESS'|'PASSED'|'STOPPED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTestCaseExecutions(array $args = [])
 * @phpstan-method \Aws\Result listTestCaseExecutions(array{
 *     InstanceId?: string,
 *     TestCaseId?: string,
 *     TestCaseName?: string,
 *     StartTime?: int,
 *     EndTime?: int,
 *     Status?: 'FAILED'|'INITIATED'|'IN_PROGRESS'|'PASSED'|'STOPPED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestCaseExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestCaseExecutionsAsync(array{
 *     InstanceId?: string,
 *     TestCaseId?: string,
 *     TestCaseName?: string,
 *     StartTime?: int,
 *     EndTime?: int,
 *     Status?: 'FAILED'|'INITIATED'|'IN_PROGRESS'|'PASSED'|'STOPPED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTestCases(array $args = [])
 * @phpstan-method \Aws\Result listTestCases(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestCasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestCasesAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTrafficDistributionGroupUsers(array $args = [])
 * @phpstan-method \Aws\Result listTrafficDistributionGroupUsers(array{TrafficDistributionGroupId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrafficDistributionGroupUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrafficDistributionGroupUsersAsync(array{TrafficDistributionGroupId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTrafficDistributionGroups(array $args = [])
 * @phpstan-method \Aws\Result listTrafficDistributionGroups(array{MaxResults?: int, NextToken?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrafficDistributionGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrafficDistributionGroupsAsync(array{MaxResults?: int, NextToken?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result listUseCases(array $args = [])
 * @phpstan-method \Aws\Result listUseCases(array{InstanceId?: string, IntegrationAssociationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUseCasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUseCasesAsync(array{InstanceId?: string, IntegrationAssociationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listUserHierarchyGroups(array $args = [])
 * @phpstan-method \Aws\Result listUserHierarchyGroups(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserHierarchyGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserHierarchyGroupsAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listUserNotifications(array $args = [])
 * @phpstan-method \Aws\Result listUserNotifications(array{InstanceId?: string, NextToken?: string, MaxResults?: int, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserNotificationsAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, UserId?: string, ...} $args = [])
 * @method \Aws\Result listUserProficiencies(array $args = [])
 * @phpstan-method \Aws\Result listUserProficiencies(array{InstanceId?: string, UserId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserProficienciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserProficienciesAsync(array{InstanceId?: string, UserId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listViewVersions(array $args = [])
 * @phpstan-method \Aws\Result listViewVersions(array{InstanceId?: string, ViewId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listViewVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listViewVersionsAsync(array{InstanceId?: string, ViewId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listViews(array $args = [])
 * @phpstan-method \Aws\Result listViews(array{InstanceId?: string, Type?: 'AWS_MANAGED'|'CUSTOMER_MANAGED', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listViewsAsync(array{InstanceId?: string, Type?: 'AWS_MANAGED'|'CUSTOMER_MANAGED', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listWorkspaceMedia(array $args = [])
 * @phpstan-method \Aws\Result listWorkspaceMedia(array{InstanceId?: string, WorkspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkspaceMediaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkspaceMediaAsync(array{InstanceId?: string, WorkspaceId?: string, ...} $args = [])
 * @method \Aws\Result listWorkspacePages(array $args = [])
 * @phpstan-method \Aws\Result listWorkspacePages(array{InstanceId?: string, WorkspaceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkspacePagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkspacePagesAsync(array{InstanceId?: string, WorkspaceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result listWorkspaces(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkspacesAsync(array{InstanceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result monitorContact(array $args = [])
 * @phpstan-method \Aws\Result monitorContact(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     UserId?: string,
 *     AllowedMonitorCapabilities?: list<'BARGE'|'SILENT_MONITOR'>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise monitorContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise monitorContactAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     UserId?: string,
 *     AllowedMonitorCapabilities?: list<'BARGE'|'SILENT_MONITOR'>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result pauseContact(array $args = [])
 * @phpstan-method \Aws\Result pauseContact(array{ContactId?: string, InstanceId?: string, ContactFlowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise pauseContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pauseContactAsync(array{ContactId?: string, InstanceId?: string, ContactFlowId?: string, ...} $args = [])
 * @method \Aws\Result putUserStatus(array $args = [])
 * @phpstan-method \Aws\Result putUserStatus(array{UserId?: string, InstanceId?: string, AgentStatusId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putUserStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putUserStatusAsync(array{UserId?: string, InstanceId?: string, AgentStatusId?: string, ...} $args = [])
 * @method \Aws\Result releasePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result releasePhoneNumber(array{PhoneNumberId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise releasePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise releasePhoneNumberAsync(array{PhoneNumberId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result replicateInstance(array $args = [])
 * @phpstan-method \Aws\Result replicateInstance(array{InstanceId?: string, ReplicaRegion?: string, ClientToken?: string, ReplicaAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise replicateInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise replicateInstanceAsync(array{InstanceId?: string, ReplicaRegion?: string, ClientToken?: string, ReplicaAlias?: string, ...} $args = [])
 * @method \Aws\Result resumeContact(array $args = [])
 * @phpstan-method \Aws\Result resumeContact(array{ContactId?: string, InstanceId?: string, ContactFlowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeContactAsync(array{ContactId?: string, InstanceId?: string, ContactFlowId?: string, ...} $args = [])
 * @method \Aws\Result resumeContactRecording(array $args = [])
 * @phpstan-method \Aws\Result resumeContactRecording(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     InitialContactId?: string,
 *     ContactRecordingType?: 'AGENT'|'IVR'|'SCREEN',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeContactRecordingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeContactRecordingAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     InitialContactId?: string,
 *     ContactRecordingType?: 'AGENT'|'IVR'|'SCREEN',
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchAgentStatuses(array $args = [])
 * @phpstan-method \Aws\Result searchAgentStatuses(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAgentStatusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAgentStatusesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchAvailablePhoneNumbers(array $args = [])
 * @phpstan-method \Aws\Result searchAvailablePhoneNumbers(array{
 *     TargetArn?: string,
 *     InstanceId?: string,
 *     PhoneNumberCountryCode?: 'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BR'|'BS'|'BT'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GQ'|'GR'|'GT'|'GU'|'GW'|'GY'|'HK'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *     PhoneNumberType?: 'DID'|'SHARED'|'SHORT_CODE'|'THIRD_PARTY_DID'|'THIRD_PARTY_TF'|'TOLL_FREE'|'UIFN',
 *     PhoneNumberPrefix?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAvailablePhoneNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAvailablePhoneNumbersAsync(array{
 *     TargetArn?: string,
 *     InstanceId?: string,
 *     PhoneNumberCountryCode?: 'AD'|'AE'|'AF'|'AG'|'AI'|'AL'|'AM'|'AN'|'AO'|'AQ'|'AR'|'AS'|'AT'|'AU'|'AW'|'AZ'|'BA'|'BB'|'BD'|'BE'|'BF'|'BG'|'BH'|'BI'|'BJ'|'BL'|'BM'|'BN'|'BO'|'BR'|'BS'|'BT'|'BW'|'BY'|'BZ'|'CA'|'CC'|'CD'|'CF'|'CG'|'CH'|'CI'|'CK'|'CL'|'CM'|'CN'|'CO'|'CR'|'CU'|'CV'|'CW'|'CX'|'CY'|'CZ'|'DE'|'DJ'|'DK'|'DM'|'DO'|'DZ'|'EC'|'EE'|'EG'|'EH'|'ER'|'ES'|'ET'|'FI'|'FJ'|'FK'|'FM'|'FO'|'FR'|'GA'|'GB'|'GD'|'GE'|'GG'|'GH'|'GI'|'GL'|'GM'|'GN'|'GQ'|'GR'|'GT'|'GU'|'GW'|'GY'|'HK'|'HN'|'HR'|'HT'|'HU'|'ID'|'IE'|'IL'|'IM'|'IN'|'IO'|'IQ'|'IR'|'IS'|'IT'|'JE'|'JM'|'JO'|'JP'|'KE'|'KG'|'KH'|'KI'|'KM'|'KN'|'KP'|'KR'|'KW'|'KY'|'KZ'|'LA'|'LB'|'LC'|'LI'|'LK'|'LR'|'LS'|'LT'|'LU'|'LV'|'LY'|'MA'|'MC'|'MD'|'ME'|'MF'|'MG'|'MH'|'MK'|'ML'|'MM'|'MN'|'MO'|'MP'|'MR'|'MS'|'MT'|'MU'|'MV'|'MW'|'MX'|'MY'|'MZ'|'NA'|'NC'|'NE'|'NG'|'NI'|'NL'|'NO'|'NP'|'NR'|'NU'|'NZ'|'OM'|'PA'|'PE'|'PF'|'PG'|'PH'|'PK'|'PL'|'PM'|'PN'|'PR'|'PT'|'PW'|'PY'|'QA'|'RE'|'RO'|'RS'|'RU'|'RW'|'SA'|'SB'|'SC'|'SD'|'SE'|'SG'|'SH'|'SI'|'SJ'|'SK'|'SL'|'SM'|'SN'|'SO'|'SR'|'ST'|'SV'|'SX'|'SY'|'SZ'|'TC'|'TD'|'TG'|'TH'|'TJ'|'TK'|'TL'|'TM'|'TN'|'TO'|'TR'|'TT'|'TV'|'TW'|'TZ'|'UA'|'UG'|'US'|'UY'|'UZ'|'VA'|'VC'|'VE'|'VG'|'VI'|'VN'|'VU'|'WF'|'WS'|'YE'|'YT'|'ZA'|'ZM'|'ZW',
 *     PhoneNumberType?: 'DID'|'SHARED'|'SHORT_CODE'|'THIRD_PARTY_DID'|'THIRD_PARTY_TF'|'TOLL_FREE'|'UIFN',
 *     PhoneNumberPrefix?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchContactEvaluations(array $args = [])
 * @phpstan-method \Aws\Result searchContactEvaluations(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         NumberCondition?: array{
 *             FieldName?: string,
 *             MinValue?: int,
 *             MaxValue?: int,
 *             ComparisonType?: 'EQUAL'|'GREATER'|'GREATER_OR_EQUAL'|'LESSER'|'LESSER_OR_EQUAL'|'NOT_EQUAL'|'RANGE',
 *             ...,
 *         },
 *         BooleanCondition?: array{FieldName?: string, ComparisonType?: 'IS_FALSE'|'IS_TRUE', ...},
 *         DateTimeCondition?: array{
 *             FieldName?: string,
 *             MinValue?: string,
 *             MaxValue?: string,
 *             ComparisonType?: 'EQUAL_TO'|'GREATER_THAN'|'GREATER_THAN_OR_EQUAL_TO'|'LESS_THAN'|'LESS_THAN_OR_EQUAL_TO'|'RANGE',
 *             ...,
 *         },
 *         DecimalCondition?: array{
 *             FieldName?: string,
 *             MinValue?: float,
 *             MaxValue?: float,
 *             ComparisonType?: 'EQUAL'|'GREATER'|'GREATER_OR_EQUAL'|'LESSER'|'LESSER_OR_EQUAL'|'NOT_EQUAL'|'RANGE',
 *             ...,
 *         },
 *         ...,
 *     },
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ContactEvaluationAttributeFilter?: array{
 *             OrConditions?: list<array>,
 *             AndCondition?: array,
 *             TagCondition?: array,
 *             ContactEvaluationAttributeCondition?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchContactEvaluationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchContactEvaluationsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         NumberCondition?: array{
 *             FieldName?: string,
 *             MinValue?: int,
 *             MaxValue?: int,
 *             ComparisonType?: 'EQUAL'|'GREATER'|'GREATER_OR_EQUAL'|'LESSER'|'LESSER_OR_EQUAL'|'NOT_EQUAL'|'RANGE',
 *             ...,
 *         },
 *         BooleanCondition?: array{FieldName?: string, ComparisonType?: 'IS_FALSE'|'IS_TRUE', ...},
 *         DateTimeCondition?: array{
 *             FieldName?: string,
 *             MinValue?: string,
 *             MaxValue?: string,
 *             ComparisonType?: 'EQUAL_TO'|'GREATER_THAN'|'GREATER_THAN_OR_EQUAL_TO'|'LESS_THAN'|'LESS_THAN_OR_EQUAL_TO'|'RANGE',
 *             ...,
 *         },
 *         DecimalCondition?: array{
 *             FieldName?: string,
 *             MinValue?: float,
 *             MaxValue?: float,
 *             ComparisonType?: 'EQUAL'|'GREATER'|'GREATER_OR_EQUAL'|'LESSER'|'LESSER_OR_EQUAL'|'NOT_EQUAL'|'RANGE',
 *             ...,
 *         },
 *         ...,
 *     },
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ContactEvaluationAttributeFilter?: array{
 *             OrConditions?: list<array>,
 *             AndCondition?: array,
 *             TagCondition?: array,
 *             ContactEvaluationAttributeCondition?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchContactFlowModules(array $args = [])
 * @phpstan-method \Aws\Result searchContactFlowModules(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         StateCondition?: 'ACTIVE'|'ARCHIVED',
 *         StatusCondition?: 'PUBLISHED'|'SAVED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchContactFlowModulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchContactFlowModulesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         StateCondition?: 'ACTIVE'|'ARCHIVED',
 *         StatusCondition?: 'PUBLISHED'|'SAVED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchContactFlows(array $args = [])
 * @phpstan-method \Aws\Result searchContactFlows(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         FlowAttributeFilter?: array{
 *             OrConditions?: list<array>,
 *             AndCondition?: array,
 *             TagCondition?: array,
 *             ContactFlowTypeCondition?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         TypeCondition?: 'AGENT_HOLD'|'AGENT_TRANSFER'|'AGENT_WHISPER'|'CAMPAIGN'|'CONTACT_FLOW'|'CUSTOMER_HOLD'|'CUSTOMER_QUEUE'|'CUSTOMER_WHISPER'|'OUTBOUND_WHISPER'|'QUEUE_TRANSFER',
 *         StateCondition?: 'ACTIVE'|'ARCHIVED',
 *         StatusCondition?: 'PUBLISHED'|'SAVED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchContactFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchContactFlowsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         FlowAttributeFilter?: array{
 *             OrConditions?: list<array>,
 *             AndCondition?: array,
 *             TagCondition?: array,
 *             ContactFlowTypeCondition?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         TypeCondition?: 'AGENT_HOLD'|'AGENT_TRANSFER'|'AGENT_WHISPER'|'CAMPAIGN'|'CONTACT_FLOW'|'CUSTOMER_HOLD'|'CUSTOMER_QUEUE'|'CUSTOMER_WHISPER'|'OUTBOUND_WHISPER'|'QUEUE_TRANSFER',
 *         StateCondition?: 'ACTIVE'|'ARCHIVED',
 *         StatusCondition?: 'PUBLISHED'|'SAVED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchContacts(array $args = [])
 * @phpstan-method \Aws\Result searchContacts(array{
 *     InstanceId?: string,
 *     TimeRange?: array{
 *         Type?: 'CONNECTED_TO_AGENT_TIMESTAMP'|'DISCONNECT_TIMESTAMP'|'ENQUEUE_TIMESTAMP'|'INITIATION_TIMESTAMP'|'SCHEDULED_TIMESTAMP',
 *         StartTime?: int|string|\DateTimeInterface,
 *         EndTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         Name?: array{SearchText?: list<string>, MatchType?: 'MATCH_ALL'|'MATCH_ANY'|'MATCH_EXACT'|'MATCH_NONE', ...},
 *         AgentIds?: list<string>,
 *         AgentHierarchyGroups?: array{
 *             L1Ids?: list<string>,
 *             L2Ids?: list<string>,
 *             L3Ids?: list<string>,
 *             L4Ids?: list<string>,
 *             L5Ids?: list<string>,
 *             ...,
 *         },
 *         Channels?: list<'CHAT'|'EMAIL'|'TASK'|'VOICE'>,
 *         ContactAnalysis?: array{Transcript?: array, ...},
 *         InitiationMethods?: list<'AGENT_REPLY'|'API'|'CALLBACK'|'DISCONNECT'|'EXTERNAL_OUTBOUND'|'FLOW'|'INBOUND'|'MONITOR'|'OUTBOUND'|'QUEUE_TRANSFER'|'TRANSFER'|'WEBRTC_API'>,
 *         QueueIds?: list<string>,
 *         RoutingCriteria?: array{Steps?: list<array>, ...},
 *         AdditionalTimeRange?: array{Criteria?: list<array>, MatchType?: 'MATCH_ALL'|'MATCH_ANY'|'MATCH_EXACT'|'MATCH_NONE', ...},
 *         SearchableContactAttributes?: array{Criteria?: list<array>, MatchType?: 'MATCH_ALL'|'MATCH_ANY'|'MATCH_EXACT'|'MATCH_NONE', ...},
 *         SearchableSegmentAttributes?: array{Criteria?: list<array>, MatchType?: 'MATCH_ALL'|'MATCH_ANY'|'MATCH_EXACT'|'MATCH_NONE', ...},
 *         ActiveRegions?: list<string>,
 *         ContactTags?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         AiAgents?: array{Criteria?: list<array>, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{
 *         FieldName?: 'CHANNEL'|'CONNECTED_TO_AGENT_TIMESTAMP'|'DISCONNECT_TIMESTAMP'|'EXPIRY_TIMESTAMP'|'INITIATION_METHOD'|'INITIATION_TIMESTAMP'|'SCHEDULED_TIMESTAMP',
 *         Order?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchContactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchContactsAsync(array{
 *     InstanceId?: string,
 *     TimeRange?: array{
 *         Type?: 'CONNECTED_TO_AGENT_TIMESTAMP'|'DISCONNECT_TIMESTAMP'|'ENQUEUE_TIMESTAMP'|'INITIATION_TIMESTAMP'|'SCHEDULED_TIMESTAMP',
 *         StartTime?: int|string|\DateTimeInterface,
 *         EndTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         Name?: array{SearchText?: list<string>, MatchType?: 'MATCH_ALL'|'MATCH_ANY'|'MATCH_EXACT'|'MATCH_NONE', ...},
 *         AgentIds?: list<string>,
 *         AgentHierarchyGroups?: array{
 *             L1Ids?: list<string>,
 *             L2Ids?: list<string>,
 *             L3Ids?: list<string>,
 *             L4Ids?: list<string>,
 *             L5Ids?: list<string>,
 *             ...,
 *         },
 *         Channels?: list<'CHAT'|'EMAIL'|'TASK'|'VOICE'>,
 *         ContactAnalysis?: array{Transcript?: array, ...},
 *         InitiationMethods?: list<'AGENT_REPLY'|'API'|'CALLBACK'|'DISCONNECT'|'EXTERNAL_OUTBOUND'|'FLOW'|'INBOUND'|'MONITOR'|'OUTBOUND'|'QUEUE_TRANSFER'|'TRANSFER'|'WEBRTC_API'>,
 *         QueueIds?: list<string>,
 *         RoutingCriteria?: array{Steps?: list<array>, ...},
 *         AdditionalTimeRange?: array{Criteria?: list<array>, MatchType?: 'MATCH_ALL'|'MATCH_ANY'|'MATCH_EXACT'|'MATCH_NONE', ...},
 *         SearchableContactAttributes?: array{Criteria?: list<array>, MatchType?: 'MATCH_ALL'|'MATCH_ANY'|'MATCH_EXACT'|'MATCH_NONE', ...},
 *         SearchableSegmentAttributes?: array{Criteria?: list<array>, MatchType?: 'MATCH_ALL'|'MATCH_ANY'|'MATCH_EXACT'|'MATCH_NONE', ...},
 *         ActiveRegions?: list<string>,
 *         ContactTags?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         AiAgents?: array{Criteria?: list<array>, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{
 *         FieldName?: 'CHANNEL'|'CONNECTED_TO_AGENT_TIMESTAMP'|'DISCONNECT_TIMESTAMP'|'EXPIRY_TIMESTAMP'|'INITIATION_METHOD'|'INITIATION_TIMESTAMP'|'SCHEDULED_TIMESTAMP',
 *         Order?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchDataTables(array $args = [])
 * @phpstan-method \Aws\Result searchDataTables(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchDataTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchDataTablesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchEmailAddresses(array $args = [])
 * @phpstan-method \Aws\Result searchEmailAddresses(array{
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchEmailAddressesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchEmailAddressesAsync(array{
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchEvaluationForms(array $args = [])
 * @phpstan-method \Aws\Result searchEvaluationForms(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         NumberCondition?: array{
 *             FieldName?: string,
 *             MinValue?: int,
 *             MaxValue?: int,
 *             ComparisonType?: 'EQUAL'|'GREATER'|'GREATER_OR_EQUAL'|'LESSER'|'LESSER_OR_EQUAL'|'NOT_EQUAL'|'RANGE',
 *             ...,
 *         },
 *         BooleanCondition?: array{FieldName?: string, ComparisonType?: 'IS_FALSE'|'IS_TRUE', ...},
 *         DateTimeCondition?: array{
 *             FieldName?: string,
 *             MinValue?: string,
 *             MaxValue?: string,
 *             ComparisonType?: 'EQUAL_TO'|'GREATER_THAN'|'GREATER_THAN_OR_EQUAL_TO'|'LESS_THAN'|'LESS_THAN_OR_EQUAL_TO'|'RANGE',
 *             ...,
 *         },
 *         ...,
 *     },
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchEvaluationFormsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchEvaluationFormsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         NumberCondition?: array{
 *             FieldName?: string,
 *             MinValue?: int,
 *             MaxValue?: int,
 *             ComparisonType?: 'EQUAL'|'GREATER'|'GREATER_OR_EQUAL'|'LESSER'|'LESSER_OR_EQUAL'|'NOT_EQUAL'|'RANGE',
 *             ...,
 *         },
 *         BooleanCondition?: array{FieldName?: string, ComparisonType?: 'IS_FALSE'|'IS_TRUE', ...},
 *         DateTimeCondition?: array{
 *             FieldName?: string,
 *             MinValue?: string,
 *             MaxValue?: string,
 *             ComparisonType?: 'EQUAL_TO'|'GREATER_THAN'|'GREATER_THAN_OR_EQUAL_TO'|'LESS_THAN'|'LESS_THAN_OR_EQUAL_TO'|'RANGE',
 *             ...,
 *         },
 *         ...,
 *     },
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchHoursOfOperationOverrides(array $args = [])
 * @phpstan-method \Aws\Result searchHoursOfOperationOverrides(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         DateCondition?: array{
 *             FieldName?: string,
 *             Value?: string,
 *             ComparisonType?: 'EQUAL_TO'|'GREATER_THAN'|'GREATER_THAN_OR_EQUAL_TO'|'LESS_THAN'|'LESS_THAN_OR_EQUAL_TO',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchHoursOfOperationOverridesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchHoursOfOperationOverridesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         DateCondition?: array{
 *             FieldName?: string,
 *             Value?: string,
 *             ComparisonType?: 'EQUAL_TO'|'GREATER_THAN'|'GREATER_THAN_OR_EQUAL_TO'|'LESS_THAN'|'LESS_THAN_OR_EQUAL_TO',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchHoursOfOperations(array $args = [])
 * @phpstan-method \Aws\Result searchHoursOfOperations(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchHoursOfOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchHoursOfOperationsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchNotifications(array $args = [])
 * @phpstan-method \Aws\Result searchNotifications(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchNotificationsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchPredefinedAttributes(array $args = [])
 * @phpstan-method \Aws\Result searchPredefinedAttributes(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchPredefinedAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchPredefinedAttributesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchPrompts(array $args = [])
 * @phpstan-method \Aws\Result searchPrompts(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchPromptsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchPromptsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchQueues(array $args = [])
 * @phpstan-method \Aws\Result searchQueues(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         QueueTypeCondition?: 'STANDARD',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchQueuesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         QueueTypeCondition?: 'STANDARD',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchQuickConnects(array $args = [])
 * @phpstan-method \Aws\Result searchQuickConnects(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchQuickConnectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchQuickConnectsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchResourceTags(array $args = [])
 * @phpstan-method \Aws\Result searchResourceTags(array{
 *     InstanceId?: string,
 *     ResourceTypes?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchCriteria?: array{
 *         TagSearchCondition?: array{
 *             tagKey?: string,
 *             tagValue?: string,
 *             tagKeyComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH',
 *             tagValueComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchResourceTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchResourceTagsAsync(array{
 *     InstanceId?: string,
 *     ResourceTypes?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchCriteria?: array{
 *         TagSearchCondition?: array{
 *             tagKey?: string,
 *             tagValue?: string,
 *             tagKeyComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH',
 *             tagValueComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchRoutingProfiles(array $args = [])
 * @phpstan-method \Aws\Result searchRoutingProfiles(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchRoutingProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchRoutingProfilesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchRules(array $args = [])
 * @phpstan-method \Aws\Result searchRules(array{
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchRulesAsync(array{
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchSecurityProfiles(array $args = [])
 * @phpstan-method \Aws\Result searchSecurityProfiles(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchSecurityProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchSecurityProfilesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchTestCases(array $args = [])
 * @phpstan-method \Aws\Result searchTestCases(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         StatusCondition?: 'PUBLISHED'|'SAVED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchTestCasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchTestCasesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         StatusCondition?: 'PUBLISHED'|'SAVED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchUserHierarchyGroups(array $args = [])
 * @phpstan-method \Aws\Result searchUserHierarchyGroups(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchUserHierarchyGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchUserHierarchyGroupsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchUsers(array $args = [])
 * @phpstan-method \Aws\Result searchUsers(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         UserAttributeFilter?: array{
 *             OrConditions?: list<array>,
 *             AndCondition?: array,
 *             TagCondition?: array,
 *             HierarchyGroupCondition?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ListCondition?: array{TargetListType?: 'PROFICIENCIES', Conditions?: list<array>, ...},
 *         HierarchyGroupCondition?: array{Value?: string, HierarchyGroupMatchType?: 'EXACT'|'WITH_CHILD_GROUPS', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchUsersAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         TagFilter?: array{OrConditions?: list<list<array>>, AndConditions?: list<array>, TagCondition?: array, ...},
 *         UserAttributeFilter?: array{
 *             OrConditions?: list<array>,
 *             AndCondition?: array,
 *             TagCondition?: array,
 *             HierarchyGroupCondition?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ListCondition?: array{TargetListType?: 'PROFICIENCIES', Conditions?: list<array>, ...},
 *         HierarchyGroupCondition?: array{Value?: string, HierarchyGroupMatchType?: 'EXACT'|'WITH_CHILD_GROUPS', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchViews(array $args = [])
 * @phpstan-method \Aws\Result searchViews(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ViewTypeCondition?: 'AWS_MANAGED'|'CUSTOMER_MANAGED',
 *         ViewStatusCondition?: 'PUBLISHED'|'SAVED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchViewsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ViewTypeCondition?: 'AWS_MANAGED'|'CUSTOMER_MANAGED',
 *         ViewStatusCondition?: 'PUBLISHED'|'SAVED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchVocabularies(array $args = [])
 * @phpstan-method \Aws\Result searchVocabularies(array{
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     State?: 'ACTIVE'|'CREATION_FAILED'|'CREATION_IN_PROGRESS'|'DELETE_IN_PROGRESS',
 *     NameStartsWith?: string,
 *     LanguageCode?: 'ar-AE'|'ca-ES'|'da-DK'|'de-CH'|'de-DE'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-US'|'fi-FI'|'fr-CA'|'fr-FR'|'hi-IN'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'ms-MY'|'nl-NL'|'no-NO'|'pl-PL'|'pt-BR'|'pt-PT'|'sv-SE'|'tl-PH'|'zh-CN',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchVocabulariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchVocabulariesAsync(array{
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     State?: 'ACTIVE'|'CREATION_FAILED'|'CREATION_IN_PROGRESS'|'DELETE_IN_PROGRESS',
 *     NameStartsWith?: string,
 *     LanguageCode?: 'ar-AE'|'ca-ES'|'da-DK'|'de-CH'|'de-DE'|'en-AB'|'en-AU'|'en-GB'|'en-IE'|'en-IN'|'en-NZ'|'en-US'|'en-WL'|'en-ZA'|'es-ES'|'es-US'|'fi-FI'|'fr-CA'|'fr-FR'|'hi-IN'|'id-ID'|'it-IT'|'ja-JP'|'ko-KR'|'ms-MY'|'nl-NL'|'no-NO'|'pl-PL'|'pt-BR'|'pt-PT'|'sv-SE'|'tl-PH'|'zh-CN',
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchWorkspaceAssociations(array $args = [])
 * @phpstan-method \Aws\Result searchWorkspaceAssociations(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchWorkspaceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchWorkspaceAssociationsAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result searchWorkspaces(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchWorkspacesAsync(array{
 *     InstanceId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SearchFilter?: array{
 *         AttributeFilter?: array{OrConditions?: list<array>, AndCondition?: array, TagCondition?: array, ...},
 *         ...,
 *     },
 *     SearchCriteria?: array{
 *         OrConditions?: list<array>,
 *         AndConditions?: list<array>,
 *         StringCondition?: array{FieldName?: string, Value?: string, ComparisonType?: 'CONTAINS'|'EXACT'|'STARTS_WITH', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendChatIntegrationEvent(array $args = [])
 * @phpstan-method \Aws\Result sendChatIntegrationEvent(array{
 *     SourceId?: string,
 *     DestinationId?: string,
 *     Subtype?: string,
 *     Event?: array{Type?: 'DISCONNECT'|'EVENT'|'MESSAGE', ContentType?: string, Content?: string, ...},
 *     NewSessionDetails?: array{
 *         SupportedMessagingContentTypes?: list<string>,
 *         ParticipantDetails?: array{DisplayName?: string, ...},
 *         Attributes?: array<string, string>,
 *         StreamingConfiguration?: array{StreamingEndpointArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendChatIntegrationEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendChatIntegrationEventAsync(array{
 *     SourceId?: string,
 *     DestinationId?: string,
 *     Subtype?: string,
 *     Event?: array{Type?: 'DISCONNECT'|'EVENT'|'MESSAGE', ContentType?: string, Content?: string, ...},
 *     NewSessionDetails?: array{
 *         SupportedMessagingContentTypes?: list<string>,
 *         ParticipantDetails?: array{DisplayName?: string, ...},
 *         Attributes?: array<string, string>,
 *         StreamingConfiguration?: array{StreamingEndpointArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendOutboundEmail(array $args = [])
 * @phpstan-method \Aws\Result sendOutboundEmail(array{
 *     InstanceId?: string,
 *     FromEmailAddress?: array{EmailAddress?: string, DisplayName?: string, ...},
 *     DestinationEmailAddress?: array{EmailAddress?: string, DisplayName?: string, ...},
 *     AdditionalRecipients?: array{CcEmailAddresses?: list<array>, ...},
 *     EmailMessage?: array{
 *         MessageSourceType?: 'RAW'|'TEMPLATE',
 *         TemplatedMessageConfig?: array{KnowledgeBaseId?: string, MessageTemplateId?: string, TemplateAttributes?: array, ...},
 *         RawMessage?: array{Subject?: string, Body?: string, ContentType?: string, ...},
 *         ...,
 *     },
 *     TrafficType?: 'CAMPAIGN'|'GENERAL',
 *     SourceCampaign?: array{CampaignId?: string, OutboundRequestId?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendOutboundEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendOutboundEmailAsync(array{
 *     InstanceId?: string,
 *     FromEmailAddress?: array{EmailAddress?: string, DisplayName?: string, ...},
 *     DestinationEmailAddress?: array{EmailAddress?: string, DisplayName?: string, ...},
 *     AdditionalRecipients?: array{CcEmailAddresses?: list<array>, ...},
 *     EmailMessage?: array{
 *         MessageSourceType?: 'RAW'|'TEMPLATE',
 *         TemplatedMessageConfig?: array{KnowledgeBaseId?: string, MessageTemplateId?: string, TemplateAttributes?: array, ...},
 *         RawMessage?: array{Subject?: string, Body?: string, ContentType?: string, ...},
 *         ...,
 *     },
 *     TrafficType?: 'CAMPAIGN'|'GENERAL',
 *     SourceCampaign?: array{CampaignId?: string, OutboundRequestId?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendOutboundWebNotification(array $args = [])
 * @phpstan-method \Aws\Result sendOutboundWebNotification(array{
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     BrowserId?: string,
 *     SessionId?: string,
 *     ExpiresAt?: int|string|\DateTimeInterface,
 *     Source?: array{SourceCampaign?: array{CampaignId?: string, OutboundRequestId?: string, ...}, ...},
 *     Destination?: array{WidgetId?: string, ProfileId?: string, ...},
 *     Content?: array{
 *         Type?: 'WIDGET_ACTION'|'WIDGET_VIEW',
 *         ViewArn?: string,
 *         Attributes?: array{RecommenderConfig?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendOutboundWebNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendOutboundWebNotificationAsync(array{
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     BrowserId?: string,
 *     SessionId?: string,
 *     ExpiresAt?: int|string|\DateTimeInterface,
 *     Source?: array{SourceCampaign?: array{CampaignId?: string, OutboundRequestId?: string, ...}, ...},
 *     Destination?: array{WidgetId?: string, ProfileId?: string, ...},
 *     Content?: array{
 *         Type?: 'WIDGET_ACTION'|'WIDGET_VIEW',
 *         ViewArn?: string,
 *         Attributes?: array{RecommenderConfig?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAttachedFileUpload(array $args = [])
 * @phpstan-method \Aws\Result startAttachedFileUpload(array{
 *     ClientToken?: string,
 *     InstanceId?: string,
 *     FileName?: string,
 *     FileSizeInBytes?: int,
 *     UrlExpiryInSeconds?: int,
 *     FileUseCaseType?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'VOICE_RECORDING',
 *     AssociatedResourceArn?: string,
 *     CreatedBy?: array{ConnectUserArn?: string, AWSIdentityArn?: string, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAttachedFileUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAttachedFileUploadAsync(array{
 *     ClientToken?: string,
 *     InstanceId?: string,
 *     FileName?: string,
 *     FileSizeInBytes?: int,
 *     UrlExpiryInSeconds?: int,
 *     FileUseCaseType?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'VOICE_RECORDING',
 *     AssociatedResourceArn?: string,
 *     CreatedBy?: array{ConnectUserArn?: string, AWSIdentityArn?: string, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startChatContact(array $args = [])
 * @phpstan-method \Aws\Result startChatContact(array{
 *     InstanceId?: string,
 *     ContactFlowId?: string,
 *     Attributes?: array<string, string>,
 *     ParticipantDetails?: array{DisplayName?: string, ...},
 *     ParticipantConfiguration?: array{ResponseMode?: 'COMPLETE'|'INCREMENTAL', ...},
 *     InitialMessage?: array{ContentType?: string, Content?: string, ...},
 *     ClientToken?: string,
 *     ChatDurationInMinutes?: int,
 *     SupportedMessagingContentTypes?: list<string>,
 *     PersistentChat?: array{RehydrationType?: 'ENTIRE_PAST_SESSION'|'FROM_SEGMENT', SourceContactId?: string, ...},
 *     RelatedContactId?: string,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     CustomerId?: string,
 *     DisconnectOnCustomerExit?: list<'AGENT'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startChatContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startChatContactAsync(array{
 *     InstanceId?: string,
 *     ContactFlowId?: string,
 *     Attributes?: array<string, string>,
 *     ParticipantDetails?: array{DisplayName?: string, ...},
 *     ParticipantConfiguration?: array{ResponseMode?: 'COMPLETE'|'INCREMENTAL', ...},
 *     InitialMessage?: array{ContentType?: string, Content?: string, ...},
 *     ClientToken?: string,
 *     ChatDurationInMinutes?: int,
 *     SupportedMessagingContentTypes?: list<string>,
 *     PersistentChat?: array{RehydrationType?: 'ENTIRE_PAST_SESSION'|'FROM_SEGMENT', SourceContactId?: string, ...},
 *     RelatedContactId?: string,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     CustomerId?: string,
 *     DisconnectOnCustomerExit?: list<'AGENT'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startContactConversationalAnalyticsJob(array $args = [])
 * @phpstan-method \Aws\Result startContactConversationalAnalyticsJob(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     AnalyticsModes?: list<'AutomatedInteraction'|'ContactLens'|'PostContact'|'RealTime'>,
 *     AnalyticsConfiguration?: array{
 *         LanguageConfiguration?: array{LanguageLocale?: string, ...},
 *         RedactionConfiguration?: array{
 *             Behavior?: 'Disable'|'Enable',
 *             Policy?: 'None'|'RedactedAndOriginal'|'RedactedOnly',
 *             Entities?: list<string>,
 *             MaskMode?: 'EntityType'|'PII',
 *             ...,
 *         },
 *         SentimentConfiguration?: array{Behavior?: 'Disable'|'Enable', ...},
 *         SummaryConfiguration?: array{SummaryModes?: list<'AutomatedInteraction'|'ContactChain'|'PostContact'>, ...},
 *         RulesConfiguration?: array{Behavior?: 'Disable'|'Enable', ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startContactConversationalAnalyticsJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startContactConversationalAnalyticsJobAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     AnalyticsModes?: list<'AutomatedInteraction'|'ContactLens'|'PostContact'|'RealTime'>,
 *     AnalyticsConfiguration?: array{
 *         LanguageConfiguration?: array{LanguageLocale?: string, ...},
 *         RedactionConfiguration?: array{
 *             Behavior?: 'Disable'|'Enable',
 *             Policy?: 'None'|'RedactedAndOriginal'|'RedactedOnly',
 *             Entities?: list<string>,
 *             MaskMode?: 'EntityType'|'PII',
 *             ...,
 *         },
 *         SentimentConfiguration?: array{Behavior?: 'Disable'|'Enable', ...},
 *         SummaryConfiguration?: array{SummaryModes?: list<'AutomatedInteraction'|'ContactChain'|'PostContact'>, ...},
 *         RulesConfiguration?: array{Behavior?: 'Disable'|'Enable', ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startContactEvaluation(array $args = [])
 * @phpstan-method \Aws\Result startContactEvaluation(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     EvaluationFormId?: string,
 *     AutoEvaluationConfiguration?: array{Enabled?: bool, ...},
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startContactEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startContactEvaluationAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     EvaluationFormId?: string,
 *     AutoEvaluationConfiguration?: array{Enabled?: bool, ...},
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startContactMediaProcessing(array $args = [])
 * @phpstan-method \Aws\Result startContactMediaProcessing(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ProcessorArn?: string,
 *     FailureMode?: 'DELIVER_UNPROCESSED_MESSAGE'|'DO_NOT_DELIVER_UNPROCESSED_MESSAGE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startContactMediaProcessingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startContactMediaProcessingAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ProcessorArn?: string,
 *     FailureMode?: 'DELIVER_UNPROCESSED_MESSAGE'|'DO_NOT_DELIVER_UNPROCESSED_MESSAGE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startContactRecording(array $args = [])
 * @phpstan-method \Aws\Result startContactRecording(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     InitialContactId?: string,
 *     VoiceRecordingConfiguration?: array{VoiceRecordingTrack?: 'ALL'|'FROM_AGENT'|'TO_AGENT', IvrRecordingTrack?: 'ALL', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startContactRecordingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startContactRecordingAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     InitialContactId?: string,
 *     VoiceRecordingConfiguration?: array{VoiceRecordingTrack?: 'ALL'|'FROM_AGENT'|'TO_AGENT', IvrRecordingTrack?: 'ALL', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startContactStreaming(array $args = [])
 * @phpstan-method \Aws\Result startContactStreaming(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ChatStreamingConfiguration?: array{StreamingEndpointArn?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startContactStreamingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startContactStreamingAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ChatStreamingConfiguration?: array{StreamingEndpointArn?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startEmailContact(array $args = [])
 * @phpstan-method \Aws\Result startEmailContact(array{
 *     InstanceId?: string,
 *     FromEmailAddress?: array{EmailAddress?: string, DisplayName?: string, ...},
 *     DestinationEmailAddress?: string,
 *     Description?: string,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     Name?: string,
 *     EmailMessage?: array{
 *         MessageSourceType?: 'RAW',
 *         RawMessage?: array{Subject?: string, Body?: string, ContentType?: string, Headers?: array<string, string>, ...},
 *         ...,
 *     },
 *     AdditionalRecipients?: array{ToAddresses?: list<array>, CcAddresses?: list<array>, ...},
 *     Attachments?: list<array{FileName?: string, S3Url?: string, ...}>,
 *     ContactFlowId?: string,
 *     RelatedContactId?: string,
 *     Attributes?: array<string, string>,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startEmailContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEmailContactAsync(array{
 *     InstanceId?: string,
 *     FromEmailAddress?: array{EmailAddress?: string, DisplayName?: string, ...},
 *     DestinationEmailAddress?: string,
 *     Description?: string,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     Name?: string,
 *     EmailMessage?: array{
 *         MessageSourceType?: 'RAW',
 *         RawMessage?: array{Subject?: string, Body?: string, ContentType?: string, Headers?: array<string, string>, ...},
 *         ...,
 *     },
 *     AdditionalRecipients?: array{ToAddresses?: list<array>, CcAddresses?: list<array>, ...},
 *     Attachments?: list<array{FileName?: string, S3Url?: string, ...}>,
 *     ContactFlowId?: string,
 *     RelatedContactId?: string,
 *     Attributes?: array<string, string>,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startEvaluationFormValidation(array $args = [])
 * @phpstan-method \Aws\Result startEvaluationFormValidation(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startEvaluationFormValidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEvaluationFormValidationAsync(array{InstanceId?: string, EvaluationFormId?: string, EvaluationFormVersion?: int, ...} $args = [])
 * @method \Aws\Result startOutboundChatContact(array $args = [])
 * @phpstan-method \Aws\Result startOutboundChatContact(array{
 *     SourceEndpoint?: array{
 *         Type?: 'CONNECT_PHONENUMBER_ARN'|'CONTACT_FLOW'|'EMAIL_ADDRESS'|'TELEPHONE_NUMBER'|'VOIP',
 *         Address?: string,
 *         ...,
 *     },
 *     DestinationEndpoint?: array{
 *         Type?: 'CONNECT_PHONENUMBER_ARN'|'CONTACT_FLOW'|'EMAIL_ADDRESS'|'TELEPHONE_NUMBER'|'VOIP',
 *         Address?: string,
 *         ...,
 *     },
 *     InstanceId?: string,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     Attributes?: array<string, string>,
 *     ContactFlowId?: string,
 *     ChatDurationInMinutes?: int,
 *     ParticipantDetails?: array{DisplayName?: string, ...},
 *     InitialSystemMessage?: array{ContentType?: string, Content?: string, ...},
 *     InitialTemplatedSystemMessage?: array{
 *         KnowledgeBaseId?: string,
 *         MessageTemplateId?: string,
 *         TemplateAttributes?: array{CustomAttributes?: array<string, string>, CustomerProfileAttributes?: string, ...},
 *         ...,
 *     },
 *     RelatedContactId?: string,
 *     SupportedMessagingContentTypes?: list<string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startOutboundChatContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startOutboundChatContactAsync(array{
 *     SourceEndpoint?: array{
 *         Type?: 'CONNECT_PHONENUMBER_ARN'|'CONTACT_FLOW'|'EMAIL_ADDRESS'|'TELEPHONE_NUMBER'|'VOIP',
 *         Address?: string,
 *         ...,
 *     },
 *     DestinationEndpoint?: array{
 *         Type?: 'CONNECT_PHONENUMBER_ARN'|'CONTACT_FLOW'|'EMAIL_ADDRESS'|'TELEPHONE_NUMBER'|'VOIP',
 *         Address?: string,
 *         ...,
 *     },
 *     InstanceId?: string,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     Attributes?: array<string, string>,
 *     ContactFlowId?: string,
 *     ChatDurationInMinutes?: int,
 *     ParticipantDetails?: array{DisplayName?: string, ...},
 *     InitialSystemMessage?: array{ContentType?: string, Content?: string, ...},
 *     InitialTemplatedSystemMessage?: array{
 *         KnowledgeBaseId?: string,
 *         MessageTemplateId?: string,
 *         TemplateAttributes?: array{CustomAttributes?: array<string, string>, CustomerProfileAttributes?: string, ...},
 *         ...,
 *     },
 *     RelatedContactId?: string,
 *     SupportedMessagingContentTypes?: list<string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startOutboundEmailContact(array $args = [])
 * @phpstan-method \Aws\Result startOutboundEmailContact(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     FromEmailAddress?: array{EmailAddress?: string, DisplayName?: string, ...},
 *     DestinationEmailAddress?: array{EmailAddress?: string, DisplayName?: string, ...},
 *     AdditionalRecipients?: array{CcEmailAddresses?: list<array>, ...},
 *     EmailMessage?: array{
 *         MessageSourceType?: 'RAW'|'TEMPLATE',
 *         TemplatedMessageConfig?: array{KnowledgeBaseId?: string, MessageTemplateId?: string, TemplateAttributes?: array, ...},
 *         RawMessage?: array{Subject?: string, Body?: string, ContentType?: string, ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startOutboundEmailContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startOutboundEmailContactAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     FromEmailAddress?: array{EmailAddress?: string, DisplayName?: string, ...},
 *     DestinationEmailAddress?: array{EmailAddress?: string, DisplayName?: string, ...},
 *     AdditionalRecipients?: array{CcEmailAddresses?: list<array>, ...},
 *     EmailMessage?: array{
 *         MessageSourceType?: 'RAW'|'TEMPLATE',
 *         TemplatedMessageConfig?: array{KnowledgeBaseId?: string, MessageTemplateId?: string, TemplateAttributes?: array, ...},
 *         RawMessage?: array{Subject?: string, Body?: string, ContentType?: string, ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startOutboundVoiceContact(array $args = [])
 * @phpstan-method \Aws\Result startOutboundVoiceContact(array{
 *     Name?: string,
 *     Description?: string,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     RelatedContactId?: string,
 *     DestinationPhoneNumber?: string,
 *     ContactFlowId?: string,
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     SourcePhoneNumber?: string,
 *     QueueId?: string,
 *     Attributes?: array<string, string>,
 *     AnswerMachineDetectionConfig?: array{EnableAnswerMachineDetection?: bool, AwaitAnswerMachinePrompt?: bool, ...},
 *     CampaignId?: string,
 *     TrafficType?: 'CAMPAIGN'|'GENERAL',
 *     OutboundStrategy?: array{Type?: 'AGENT_FIRST', Config?: array{AgentFirst?: array, ...}, ...},
 *     RingTimeoutInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startOutboundVoiceContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startOutboundVoiceContactAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     RelatedContactId?: string,
 *     DestinationPhoneNumber?: string,
 *     ContactFlowId?: string,
 *     InstanceId?: string,
 *     ClientToken?: string,
 *     SourcePhoneNumber?: string,
 *     QueueId?: string,
 *     Attributes?: array<string, string>,
 *     AnswerMachineDetectionConfig?: array{EnableAnswerMachineDetection?: bool, AwaitAnswerMachinePrompt?: bool, ...},
 *     CampaignId?: string,
 *     TrafficType?: 'CAMPAIGN'|'GENERAL',
 *     OutboundStrategy?: array{Type?: 'AGENT_FIRST', Config?: array{AgentFirst?: array, ...}, ...},
 *     RingTimeoutInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startScreenSharing(array $args = [])
 * @phpstan-method \Aws\Result startScreenSharing(array{ClientToken?: string, InstanceId?: string, ContactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startScreenSharingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startScreenSharingAsync(array{ClientToken?: string, InstanceId?: string, ContactId?: string, ...} $args = [])
 * @method \Aws\Result startTaskContact(array $args = [])
 * @phpstan-method \Aws\Result startTaskContact(array{
 *     InstanceId?: string,
 *     PreviousContactId?: string,
 *     ContactFlowId?: string,
 *     Attributes?: array<string, string>,
 *     Name?: string,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     Description?: string,
 *     ClientToken?: string,
 *     ScheduledTime?: int|string|\DateTimeInterface,
 *     TaskTemplateId?: string,
 *     QuickConnectId?: string,
 *     RelatedContactId?: string,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     Attachments?: list<array{FileName?: string, S3Url?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTaskContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTaskContactAsync(array{
 *     InstanceId?: string,
 *     PreviousContactId?: string,
 *     ContactFlowId?: string,
 *     Attributes?: array<string, string>,
 *     Name?: string,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     Description?: string,
 *     ClientToken?: string,
 *     ScheduledTime?: int|string|\DateTimeInterface,
 *     TaskTemplateId?: string,
 *     QuickConnectId?: string,
 *     RelatedContactId?: string,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     Attachments?: list<array{FileName?: string, S3Url?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTestCaseExecution(array $args = [])
 * @phpstan-method \Aws\Result startTestCaseExecution(array{InstanceId?: string, TestCaseId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startTestCaseExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTestCaseExecutionAsync(array{InstanceId?: string, TestCaseId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result startWebRTCContact(array $args = [])
 * @phpstan-method \Aws\Result startWebRTCContact(array{
 *     Attributes?: array<string, string>,
 *     ClientToken?: string,
 *     ContactFlowId?: string,
 *     InstanceId?: string,
 *     AllowedCapabilities?: array{
 *         Customer?: array{Video?: 'SEND', ScreenShare?: 'SEND', ...},
 *         Agent?: array{Video?: 'SEND', ScreenShare?: 'SEND', ...},
 *         ...,
 *     },
 *     ParticipantDetails?: array{DisplayName?: string, ...},
 *     RelatedContactId?: string,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startWebRTCContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startWebRTCContactAsync(array{
 *     Attributes?: array<string, string>,
 *     ClientToken?: string,
 *     ContactFlowId?: string,
 *     InstanceId?: string,
 *     AllowedCapabilities?: array{
 *         Customer?: array{Video?: 'SEND', ScreenShare?: 'SEND', ...},
 *         Agent?: array{Video?: 'SEND', ScreenShare?: 'SEND', ...},
 *         ...,
 *     },
 *     ParticipantDetails?: array{DisplayName?: string, ...},
 *     RelatedContactId?: string,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopContact(array $args = [])
 * @phpstan-method \Aws\Result stopContact(array{ContactId?: string, InstanceId?: string, DisconnectReason?: array{Code?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopContactAsync(array{ContactId?: string, InstanceId?: string, DisconnectReason?: array{Code?: string, ...}, ...} $args = [])
 * @method \Aws\Result stopContactMediaProcessing(array $args = [])
 * @phpstan-method \Aws\Result stopContactMediaProcessing(array{InstanceId?: string, ContactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopContactMediaProcessingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopContactMediaProcessingAsync(array{InstanceId?: string, ContactId?: string, ...} $args = [])
 * @method \Aws\Result stopContactRecording(array $args = [])
 * @phpstan-method \Aws\Result stopContactRecording(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     InitialContactId?: string,
 *     ContactRecordingType?: 'AGENT'|'IVR'|'SCREEN',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise stopContactRecordingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopContactRecordingAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     InitialContactId?: string,
 *     ContactRecordingType?: 'AGENT'|'IVR'|'SCREEN',
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopContactStreaming(array $args = [])
 * @phpstan-method \Aws\Result stopContactStreaming(array{InstanceId?: string, ContactId?: string, StreamingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopContactStreamingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopContactStreamingAsync(array{InstanceId?: string, ContactId?: string, StreamingId?: string, ...} $args = [])
 * @method \Aws\Result stopTestCaseExecution(array $args = [])
 * @phpstan-method \Aws\Result stopTestCaseExecution(array{InstanceId?: string, TestCaseExecutionId?: string, TestCaseId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTestCaseExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTestCaseExecutionAsync(array{InstanceId?: string, TestCaseExecutionId?: string, TestCaseId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result submitContactEvaluation(array $args = [])
 * @phpstan-method \Aws\Result submitContactEvaluation(array{
 *     InstanceId?: string,
 *     EvaluationId?: string,
 *     Answers?: array<string, array{Value?: array, ...}>,
 *     Notes?: array<string, array{Value?: string, ...}>,
 *     SubmittedBy?: array{ConnectUserArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise submitContactEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitContactEvaluationAsync(array{
 *     InstanceId?: string,
 *     EvaluationId?: string,
 *     Answers?: array<string, array{Value?: array, ...}>,
 *     Notes?: array<string, array{Value?: string, ...}>,
 *     SubmittedBy?: array{ConnectUserArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result suspendContactRecording(array $args = [])
 * @phpstan-method \Aws\Result suspendContactRecording(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     InitialContactId?: string,
 *     ContactRecordingType?: 'AGENT'|'IVR'|'SCREEN',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise suspendContactRecordingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise suspendContactRecordingAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     InitialContactId?: string,
 *     ContactRecordingType?: 'AGENT'|'IVR'|'SCREEN',
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagContact(array $args = [])
 * @phpstan-method \Aws\Result tagContact(array{ContactId?: string, InstanceId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagContactAsync(array{ContactId?: string, InstanceId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result transferContact(array $args = [])
 * @phpstan-method \Aws\Result transferContact(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     QueueId?: string,
 *     UserId?: string,
 *     ContactFlowId?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise transferContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise transferContactAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     QueueId?: string,
 *     UserId?: string,
 *     ContactFlowId?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagContact(array $args = [])
 * @phpstan-method \Aws\Result untagContact(array{ContactId?: string, InstanceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagContactAsync(array{ContactId?: string, InstanceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAgentStatus(array $args = [])
 * @phpstan-method \Aws\Result updateAgentStatus(array{
 *     InstanceId?: string,
 *     AgentStatusId?: string,
 *     Name?: string,
 *     Description?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     DisplayOrder?: int,
 *     ResetOrderNumber?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentStatusAsync(array{
 *     InstanceId?: string,
 *     AgentStatusId?: string,
 *     Name?: string,
 *     Description?: string,
 *     State?: 'DISABLED'|'ENABLED',
 *     DisplayOrder?: int,
 *     ResetOrderNumber?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAttachedFilesConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateAttachedFilesConfiguration(array{
 *     InstanceId?: string,
 *     AttachmentScope?: 'CASE'|'CHAT'|'EMAIL'|'TASK',
 *     MaximumSizeLimitInBytes?: int,
 *     ExtensionConfiguration?: array{AllowedExtensions?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAttachedFilesConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAttachedFilesConfigurationAsync(array{
 *     InstanceId?: string,
 *     AttachmentScope?: 'CASE'|'CHAT'|'EMAIL'|'TASK',
 *     MaximumSizeLimitInBytes?: int,
 *     ExtensionConfiguration?: array{AllowedExtensions?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAuthenticationProfile(array $args = [])
 * @phpstan-method \Aws\Result updateAuthenticationProfile(array{
 *     AuthenticationProfileId?: string,
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     AllowedIps?: list<string>,
 *     BlockedIps?: list<string>,
 *     PeriodicSessionDuration?: int,
 *     SessionInactivityDuration?: int,
 *     SessionInactivityHandlingEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAuthenticationProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAuthenticationProfileAsync(array{
 *     AuthenticationProfileId?: string,
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     AllowedIps?: list<string>,
 *     BlockedIps?: list<string>,
 *     PeriodicSessionDuration?: int,
 *     SessionInactivityDuration?: int,
 *     SessionInactivityHandlingEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContact(array $args = [])
 * @phpstan-method \Aws\Result updateContact(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     Name?: string,
 *     Description?: string,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     QueueInfo?: array{Id?: string, ...},
 *     UserInfo?: array{UserId?: string, ...},
 *     CustomerEndpoint?: array{
 *         Type?: 'CONNECT_PHONENUMBER_ARN'|'CONTACT_FLOW'|'EMAIL_ADDRESS'|'TELEPHONE_NUMBER'|'VOIP',
 *         Address?: string,
 *         ...,
 *     },
 *     SystemEndpoint?: array{
 *         Type?: 'CONNECT_PHONENUMBER_ARN'|'CONTACT_FLOW'|'EMAIL_ADDRESS'|'TELEPHONE_NUMBER'|'VOIP',
 *         Address?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     Name?: string,
 *     Description?: string,
 *     References?: array<string, array{
 *         Value?: string,
 *         Type?: 'ATTACHMENT'|'CONTACT_ANALYSIS'|'DATE'|'EMAIL'|'EMAIL_MESSAGE'|'EMAIL_MESSAGE_PLAIN_TEXT'|'EMAIL_MESSAGE_PLAIN_TEXT_REDACTED'|'EMAIL_MESSAGE_REDACTED'|'NUMBER'|'STRING'|'URL',
 *         Status?: 'APPROVED'|'AVAILABLE'|'DELETED'|'FAILED'|'PROCESSING'|'REJECTED',
 *         Arn?: string,
 *         StatusReason?: string,
 *         ...,
 *     }>,
 *     SegmentAttributes?: array<string, array{
 *         ValueString?: string,
 *         ValueMap?: array<string, array>,
 *         ValueInteger?: int,
 *         ValueList?: list<array>,
 *         ValueArn?: string,
 *         ...,
 *     }>,
 *     QueueInfo?: array{Id?: string, ...},
 *     UserInfo?: array{UserId?: string, ...},
 *     CustomerEndpoint?: array{
 *         Type?: 'CONNECT_PHONENUMBER_ARN'|'CONTACT_FLOW'|'EMAIL_ADDRESS'|'TELEPHONE_NUMBER'|'VOIP',
 *         Address?: string,
 *         ...,
 *     },
 *     SystemEndpoint?: array{
 *         Type?: 'CONNECT_PHONENUMBER_ARN'|'CONTACT_FLOW'|'EMAIL_ADDRESS'|'TELEPHONE_NUMBER'|'VOIP',
 *         Address?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContactAttributes(array $args = [])
 * @phpstan-method \Aws\Result updateContactAttributes(array{InitialContactId?: string, InstanceId?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactAttributesAsync(array{InitialContactId?: string, InstanceId?: string, Attributes?: array<string, string>, ...} $args = [])
 * @method \Aws\Result updateContactEvaluation(array $args = [])
 * @phpstan-method \Aws\Result updateContactEvaluation(array{
 *     InstanceId?: string,
 *     EvaluationId?: string,
 *     Answers?: array<string, array{Value?: array, ...}>,
 *     Notes?: array<string, array{Value?: string, ...}>,
 *     UpdatedBy?: array{ConnectUserArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactEvaluationAsync(array{
 *     InstanceId?: string,
 *     EvaluationId?: string,
 *     Answers?: array<string, array{Value?: array, ...}>,
 *     Notes?: array<string, array{Value?: string, ...}>,
 *     UpdatedBy?: array{ConnectUserArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContactFlowContent(array $args = [])
 * @phpstan-method \Aws\Result updateContactFlowContent(array{InstanceId?: string, ContactFlowId?: string, Content?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactFlowContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactFlowContentAsync(array{InstanceId?: string, ContactFlowId?: string, Content?: string, ...} $args = [])
 * @method \Aws\Result updateContactFlowMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateContactFlowMetadata(array{
 *     InstanceId?: string,
 *     ContactFlowId?: string,
 *     Name?: string,
 *     Description?: string,
 *     ContactFlowState?: 'ACTIVE'|'ARCHIVED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactFlowMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactFlowMetadataAsync(array{
 *     InstanceId?: string,
 *     ContactFlowId?: string,
 *     Name?: string,
 *     Description?: string,
 *     ContactFlowState?: 'ACTIVE'|'ARCHIVED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContactFlowModuleAlias(array $args = [])
 * @phpstan-method \Aws\Result updateContactFlowModuleAlias(array{
 *     InstanceId?: string,
 *     ContactFlowModuleId?: string,
 *     AliasId?: string,
 *     Name?: string,
 *     Description?: string,
 *     ContactFlowModuleVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactFlowModuleAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactFlowModuleAliasAsync(array{
 *     InstanceId?: string,
 *     ContactFlowModuleId?: string,
 *     AliasId?: string,
 *     Name?: string,
 *     Description?: string,
 *     ContactFlowModuleVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContactFlowModuleContent(array $args = [])
 * @phpstan-method \Aws\Result updateContactFlowModuleContent(array{InstanceId?: string, ContactFlowModuleId?: string, Content?: string, Settings?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactFlowModuleContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactFlowModuleContentAsync(array{InstanceId?: string, ContactFlowModuleId?: string, Content?: string, Settings?: string, ...} $args = [])
 * @method \Aws\Result updateContactFlowModuleMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateContactFlowModuleMetadata(array{
 *     InstanceId?: string,
 *     ContactFlowModuleId?: string,
 *     Name?: string,
 *     Description?: string,
 *     State?: 'ACTIVE'|'ARCHIVED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactFlowModuleMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactFlowModuleMetadataAsync(array{
 *     InstanceId?: string,
 *     ContactFlowModuleId?: string,
 *     Name?: string,
 *     Description?: string,
 *     State?: 'ACTIVE'|'ARCHIVED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContactFlowName(array $args = [])
 * @phpstan-method \Aws\Result updateContactFlowName(array{InstanceId?: string, ContactFlowId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactFlowNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactFlowNameAsync(array{InstanceId?: string, ContactFlowId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateContactRoutingData(array $args = [])
 * @phpstan-method \Aws\Result updateContactRoutingData(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     QueueTimeAdjustmentSeconds?: int,
 *     QueuePriority?: int,
 *     RoutingCriteria?: array{Steps?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactRoutingDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactRoutingDataAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     QueueTimeAdjustmentSeconds?: int,
 *     QueuePriority?: int,
 *     RoutingCriteria?: array{Steps?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContactSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateContactSchedule(array{InstanceId?: string, ContactId?: string, ScheduledTime?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactScheduleAsync(array{InstanceId?: string, ContactId?: string, ScheduledTime?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result updateDataTableAttribute(array $args = [])
 * @phpstan-method \Aws\Result updateDataTableAttribute(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     AttributeName?: string,
 *     Name?: string,
 *     ValueType?: 'BOOLEAN'|'NUMBER'|'NUMBER_LIST'|'TEXT'|'TEXT_LIST',
 *     Description?: string,
 *     Primary?: bool,
 *     Validation?: array{
 *         MinLength?: int,
 *         MaxLength?: int,
 *         MinValues?: int,
 *         MaxValues?: int,
 *         IgnoreCase?: bool,
 *         Minimum?: float,
 *         Maximum?: float,
 *         ExclusiveMinimum?: float,
 *         ExclusiveMaximum?: float,
 *         MultipleOf?: float,
 *         Enum?: array{Strict?: bool, Values?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataTableAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataTableAttributeAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     AttributeName?: string,
 *     Name?: string,
 *     ValueType?: 'BOOLEAN'|'NUMBER'|'NUMBER_LIST'|'TEXT'|'TEXT_LIST',
 *     Description?: string,
 *     Primary?: bool,
 *     Validation?: array{
 *         MinLength?: int,
 *         MaxLength?: int,
 *         MinValues?: int,
 *         MaxValues?: int,
 *         IgnoreCase?: bool,
 *         Minimum?: float,
 *         Maximum?: float,
 *         ExclusiveMinimum?: float,
 *         ExclusiveMaximum?: float,
 *         MultipleOf?: float,
 *         Enum?: array{Strict?: bool, Values?: list<string>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataTableMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateDataTableMetadata(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Name?: string,
 *     Description?: string,
 *     ValueLockLevel?: 'ATTRIBUTE'|'DATA_TABLE'|'NONE'|'PRIMARY_VALUE'|'VALUE',
 *     TimeZone?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataTableMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataTableMetadataAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     Name?: string,
 *     Description?: string,
 *     ValueLockLevel?: 'ATTRIBUTE'|'DATA_TABLE'|'NONE'|'PRIMARY_VALUE'|'VALUE',
 *     TimeZone?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataTablePrimaryValues(array $args = [])
 * @phpstan-method \Aws\Result updateDataTablePrimaryValues(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     PrimaryValues?: list<array{AttributeName?: string, Value?: string, ...}>,
 *     NewPrimaryValues?: list<array{AttributeName?: string, Value?: string, ...}>,
 *     LockVersion?: array{DataTable?: string, Attribute?: string, PrimaryValues?: string, Value?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataTablePrimaryValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataTablePrimaryValuesAsync(array{
 *     InstanceId?: string,
 *     DataTableId?: string,
 *     PrimaryValues?: list<array{AttributeName?: string, Value?: string, ...}>,
 *     NewPrimaryValues?: list<array{AttributeName?: string, Value?: string, ...}>,
 *     LockVersion?: array{DataTable?: string, Attribute?: string, PrimaryValues?: string, Value?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEmailAddressMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateEmailAddressMetadata(array{
 *     InstanceId?: string,
 *     EmailAddressId?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEmailAddressMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEmailAddressMetadataAsync(array{
 *     InstanceId?: string,
 *     EmailAddressId?: string,
 *     Description?: string,
 *     DisplayName?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEvaluationForm(array $args = [])
 * @phpstan-method \Aws\Result updateEvaluationForm(array{
 *     InstanceId?: string,
 *     EvaluationFormId?: string,
 *     EvaluationFormVersion?: int,
 *     CreateNewVersion?: bool,
 *     Title?: string,
 *     Description?: string,
 *     Items?: list<array{Section?: array, Question?: array, ...}>,
 *     ScoringStrategy?: array{
 *         Mode?: 'POINTS_BASED'|'QUESTION_ONLY'|'SECTION_ONLY',
 *         Status?: 'DISABLED'|'ENABLED',
 *         ScoreThresholds?: list<array>,
 *         ...,
 *     },
 *     AutoEvaluationConfiguration?: array{Enabled?: bool, ...},
 *     ReviewConfiguration?: array{ReviewNotificationRecipients?: list<array>, EligibilityDays?: int, ...},
 *     AsDraft?: bool,
 *     ClientToken?: string,
 *     TargetConfiguration?: array{ContactInteractionType?: 'AGENT'|'AUTOMATED'|'CUSTOMER', ...},
 *     LanguageConfiguration?: array{FormLanguage?: 'de-DE'|'en-US'|'es-ES'|'fr-FR'|'it-IT'|'ja-JP'|'ko-KR'|'pt-BR'|'zh-CN', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEvaluationFormAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEvaluationFormAsync(array{
 *     InstanceId?: string,
 *     EvaluationFormId?: string,
 *     EvaluationFormVersion?: int,
 *     CreateNewVersion?: bool,
 *     Title?: string,
 *     Description?: string,
 *     Items?: list<array{Section?: array, Question?: array, ...}>,
 *     ScoringStrategy?: array{
 *         Mode?: 'POINTS_BASED'|'QUESTION_ONLY'|'SECTION_ONLY',
 *         Status?: 'DISABLED'|'ENABLED',
 *         ScoreThresholds?: list<array>,
 *         ...,
 *     },
 *     AutoEvaluationConfiguration?: array{Enabled?: bool, ...},
 *     ReviewConfiguration?: array{ReviewNotificationRecipients?: list<array>, EligibilityDays?: int, ...},
 *     AsDraft?: bool,
 *     ClientToken?: string,
 *     TargetConfiguration?: array{ContactInteractionType?: 'AGENT'|'AUTOMATED'|'CUSTOMER', ...},
 *     LanguageConfiguration?: array{FormLanguage?: 'de-DE'|'en-US'|'es-ES'|'fr-FR'|'it-IT'|'ja-JP'|'ko-KR'|'pt-BR'|'zh-CN', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHoursOfOperation(array $args = [])
 * @phpstan-method \Aws\Result updateHoursOfOperation(array{
 *     InstanceId?: string,
 *     HoursOfOperationId?: string,
 *     Name?: string,
 *     Description?: string,
 *     TimeZone?: string,
 *     Config?: list<array{
 *         Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         StartTime?: array,
 *         EndTime?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHoursOfOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHoursOfOperationAsync(array{
 *     InstanceId?: string,
 *     HoursOfOperationId?: string,
 *     Name?: string,
 *     Description?: string,
 *     TimeZone?: string,
 *     Config?: list<array{
 *         Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         StartTime?: array,
 *         EndTime?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHoursOfOperationOverride(array $args = [])
 * @phpstan-method \Aws\Result updateHoursOfOperationOverride(array{
 *     InstanceId?: string,
 *     HoursOfOperationId?: string,
 *     HoursOfOperationOverrideId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Config?: list<array{
 *         Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         StartTime?: array,
 *         EndTime?: array,
 *         ...,
 *     }>,
 *     EffectiveFrom?: string,
 *     EffectiveTill?: string,
 *     RecurrenceConfig?: array{
 *         RecurrencePattern?: array{
 *             Frequency?: 'MONTHLY'|'WEEKLY'|'YEARLY',
 *             Interval?: int,
 *             ByMonth?: list<int>,
 *             ByMonthDay?: list<int>,
 *             ByWeekdayOccurrence?: list<int>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OverrideType?: 'CLOSED'|'OPEN'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHoursOfOperationOverrideAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHoursOfOperationOverrideAsync(array{
 *     InstanceId?: string,
 *     HoursOfOperationId?: string,
 *     HoursOfOperationOverrideId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Config?: list<array{
 *         Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         StartTime?: array,
 *         EndTime?: array,
 *         ...,
 *     }>,
 *     EffectiveFrom?: string,
 *     EffectiveTill?: string,
 *     RecurrenceConfig?: array{
 *         RecurrencePattern?: array{
 *             Frequency?: 'MONTHLY'|'WEEKLY'|'YEARLY',
 *             Interval?: int,
 *             ByMonth?: list<int>,
 *             ByMonthDay?: list<int>,
 *             ByWeekdayOccurrence?: list<int>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OverrideType?: 'CLOSED'|'OPEN'|'STANDARD',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInstanceAttribute(array $args = [])
 * @phpstan-method \Aws\Result updateInstanceAttribute(array{
 *     InstanceId?: string,
 *     AttributeType?: 'AUTO_RESOLVE_BEST_VOICES'|'CONTACTFLOW_LOGS'|'CONTACT_LENS'|'EARLY_MEDIA'|'ENHANCED_CHAT_MONITORING'|'ENHANCED_CONTACT_MONITORING'|'HIGH_VOLUME_OUTBOUND'|'INBOUND_CALLS'|'MESSAGE_STREAMING'|'MULTI_PARTY_CHAT_CONFERENCE'|'MULTI_PARTY_CONFERENCE'|'OUTBOUND_CALLS'|'USE_CUSTOM_TTS_VOICES',
 *     Value?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInstanceAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInstanceAttributeAsync(array{
 *     InstanceId?: string,
 *     AttributeType?: 'AUTO_RESOLVE_BEST_VOICES'|'CONTACTFLOW_LOGS'|'CONTACT_LENS'|'EARLY_MEDIA'|'ENHANCED_CHAT_MONITORING'|'ENHANCED_CONTACT_MONITORING'|'HIGH_VOLUME_OUTBOUND'|'INBOUND_CALLS'|'MESSAGE_STREAMING'|'MULTI_PARTY_CHAT_CONFERENCE'|'MULTI_PARTY_CONFERENCE'|'OUTBOUND_CALLS'|'USE_CUSTOM_TTS_VOICES',
 *     Value?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInstanceStorageConfig(array $args = [])
 * @phpstan-method \Aws\Result updateInstanceStorageConfig(array{
 *     InstanceId?: string,
 *     AssociationId?: string,
 *     ResourceType?: 'AGENT_EVENTS'|'ATTACHMENTS'|'CALL_RECORDINGS'|'CHAT_TRANSCRIPTS'|'CONTACT_EVALUATIONS'|'CONTACT_TRACE_RECORDS'|'EMAIL_MESSAGES'|'MEDIA_STREAMS'|'REAL_TIME_CONTACT_ANALYSIS_CHAT_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_VOICE_SEGMENTS'|'SCHEDULED_REPORTS'|'SCREEN_RECORDINGS',
 *     StorageConfig?: array{
 *         AssociationId?: string,
 *         StorageType?: 'KINESIS_FIREHOSE'|'KINESIS_STREAM'|'KINESIS_VIDEO_STREAM'|'S3',
 *         S3Config?: array{BucketName?: string, BucketPrefix?: string, EncryptionConfig?: array, ...},
 *         KinesisVideoStreamConfig?: array{Prefix?: string, RetentionPeriodHours?: int, EncryptionConfig?: array, ...},
 *         KinesisStreamConfig?: array{StreamArn?: string, ...},
 *         KinesisFirehoseConfig?: array{FirehoseArn?: string, ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInstanceStorageConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInstanceStorageConfigAsync(array{
 *     InstanceId?: string,
 *     AssociationId?: string,
 *     ResourceType?: 'AGENT_EVENTS'|'ATTACHMENTS'|'CALL_RECORDINGS'|'CHAT_TRANSCRIPTS'|'CONTACT_EVALUATIONS'|'CONTACT_TRACE_RECORDS'|'EMAIL_MESSAGES'|'MEDIA_STREAMS'|'REAL_TIME_CONTACT_ANALYSIS_CHAT_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_SEGMENTS'|'REAL_TIME_CONTACT_ANALYSIS_VOICE_SEGMENTS'|'SCHEDULED_REPORTS'|'SCREEN_RECORDINGS',
 *     StorageConfig?: array{
 *         AssociationId?: string,
 *         StorageType?: 'KINESIS_FIREHOSE'|'KINESIS_STREAM'|'KINESIS_VIDEO_STREAM'|'S3',
 *         S3Config?: array{BucketName?: string, BucketPrefix?: string, EncryptionConfig?: array, ...},
 *         KinesisVideoStreamConfig?: array{Prefix?: string, RetentionPeriodHours?: int, EncryptionConfig?: array, ...},
 *         KinesisStreamConfig?: array{StreamArn?: string, ...},
 *         KinesisFirehoseConfig?: array{FirehoseArn?: string, ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNotificationContent(array $args = [])
 * @phpstan-method \Aws\Result updateNotificationContent(array{InstanceId?: string, NotificationId?: string, Content?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotificationContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotificationContentAsync(array{InstanceId?: string, NotificationId?: string, Content?: array<string, string>, ...} $args = [])
 * @method \Aws\Result updateParticipantAuthentication(array $args = [])
 * @phpstan-method \Aws\Result updateParticipantAuthentication(array{State?: string, InstanceId?: string, Code?: string, Error?: string, ErrorDescription?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateParticipantAuthenticationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateParticipantAuthenticationAsync(array{State?: string, InstanceId?: string, Code?: string, Error?: string, ErrorDescription?: string, ...} $args = [])
 * @method \Aws\Result updateParticipantRoleConfig(array $args = [])
 * @phpstan-method \Aws\Result updateParticipantRoleConfig(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ChannelConfiguration?: array{Chat?: array{ParticipantTimerConfigList?: list<array>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateParticipantRoleConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateParticipantRoleConfigAsync(array{
 *     InstanceId?: string,
 *     ContactId?: string,
 *     ChannelConfiguration?: array{Chat?: array{ParticipantTimerConfigList?: list<array>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result updatePhoneNumber(array{PhoneNumberId?: string, TargetArn?: string, InstanceId?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePhoneNumberAsync(array{PhoneNumberId?: string, TargetArn?: string, InstanceId?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result updatePhoneNumberMetadata(array $args = [])
 * @phpstan-method \Aws\Result updatePhoneNumberMetadata(array{PhoneNumberId?: string, PhoneNumberDescription?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePhoneNumberMetadataAsync(array{PhoneNumberId?: string, PhoneNumberDescription?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result updatePredefinedAttribute(array $args = [])
 * @phpstan-method \Aws\Result updatePredefinedAttribute(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Values?: array{StringList?: list<string>, ...},
 *     Purposes?: list<string>,
 *     AttributeConfiguration?: array{EnableValueValidationOnAssociation?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePredefinedAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePredefinedAttributeAsync(array{
 *     InstanceId?: string,
 *     Name?: string,
 *     Values?: array{StringList?: list<string>, ...},
 *     Purposes?: list<string>,
 *     AttributeConfiguration?: array{EnableValueValidationOnAssociation?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePrompt(array $args = [])
 * @phpstan-method \Aws\Result updatePrompt(array{InstanceId?: string, PromptId?: string, Name?: string, Description?: string, S3Uri?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePromptAsync(array{InstanceId?: string, PromptId?: string, Name?: string, Description?: string, S3Uri?: string, ...} $args = [])
 * @method \Aws\Result updateQueueHoursOfOperation(array $args = [])
 * @phpstan-method \Aws\Result updateQueueHoursOfOperation(array{InstanceId?: string, QueueId?: string, HoursOfOperationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueHoursOfOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueHoursOfOperationAsync(array{InstanceId?: string, QueueId?: string, HoursOfOperationId?: string, ...} $args = [])
 * @method \Aws\Result updateQueueMaxContacts(array $args = [])
 * @phpstan-method \Aws\Result updateQueueMaxContacts(array{InstanceId?: string, QueueId?: string, MaxContacts?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueMaxContactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueMaxContactsAsync(array{InstanceId?: string, QueueId?: string, MaxContacts?: int, ...} $args = [])
 * @method \Aws\Result updateQueueName(array $args = [])
 * @phpstan-method \Aws\Result updateQueueName(array{InstanceId?: string, QueueId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueNameAsync(array{InstanceId?: string, QueueId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateQueueOutboundCallerConfig(array $args = [])
 * @phpstan-method \Aws\Result updateQueueOutboundCallerConfig(array{
 *     InstanceId?: string,
 *     QueueId?: string,
 *     OutboundCallerConfig?: array{OutboundCallerIdName?: string, OutboundCallerIdNumberId?: string, OutboundFlowId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueOutboundCallerConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueOutboundCallerConfigAsync(array{
 *     InstanceId?: string,
 *     QueueId?: string,
 *     OutboundCallerConfig?: array{OutboundCallerIdName?: string, OutboundCallerIdNumberId?: string, OutboundFlowId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQueueOutboundEmailConfig(array $args = [])
 * @phpstan-method \Aws\Result updateQueueOutboundEmailConfig(array{
 *     InstanceId?: string,
 *     QueueId?: string,
 *     OutboundEmailConfig?: array{OutboundEmailAddressId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueOutboundEmailConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueOutboundEmailConfigAsync(array{
 *     InstanceId?: string,
 *     QueueId?: string,
 *     OutboundEmailConfig?: array{OutboundEmailAddressId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQueueStatus(array $args = [])
 * @phpstan-method \Aws\Result updateQueueStatus(array{InstanceId?: string, QueueId?: string, Status?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueueStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueueStatusAsync(array{InstanceId?: string, QueueId?: string, Status?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result updateQuickConnectConfig(array $args = [])
 * @phpstan-method \Aws\Result updateQuickConnectConfig(array{
 *     InstanceId?: string,
 *     QuickConnectId?: string,
 *     QuickConnectConfig?: array{
 *         QuickConnectType?: 'FLOW'|'PHONE_NUMBER'|'QUEUE'|'USER',
 *         UserConfig?: array{UserId?: string, ContactFlowId?: string, ...},
 *         QueueConfig?: array{QueueId?: string, ContactFlowId?: string, ...},
 *         PhoneConfig?: array{PhoneNumber?: string, ...},
 *         FlowConfig?: array{ContactFlowId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQuickConnectConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQuickConnectConfigAsync(array{
 *     InstanceId?: string,
 *     QuickConnectId?: string,
 *     QuickConnectConfig?: array{
 *         QuickConnectType?: 'FLOW'|'PHONE_NUMBER'|'QUEUE'|'USER',
 *         UserConfig?: array{UserId?: string, ContactFlowId?: string, ...},
 *         QueueConfig?: array{QueueId?: string, ContactFlowId?: string, ...},
 *         PhoneConfig?: array{PhoneNumber?: string, ...},
 *         FlowConfig?: array{ContactFlowId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQuickConnectName(array $args = [])
 * @phpstan-method \Aws\Result updateQuickConnectName(array{InstanceId?: string, QuickConnectId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQuickConnectNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQuickConnectNameAsync(array{InstanceId?: string, QuickConnectId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateRoutingProfileAgentAvailabilityTimer(array $args = [])
 * @phpstan-method \Aws\Result updateRoutingProfileAgentAvailabilityTimer(array{
 *     InstanceId?: string,
 *     RoutingProfileId?: string,
 *     AgentAvailabilityTimer?: 'TIME_SINCE_LAST_ACTIVITY'|'TIME_SINCE_LAST_INBOUND',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoutingProfileAgentAvailabilityTimerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoutingProfileAgentAvailabilityTimerAsync(array{
 *     InstanceId?: string,
 *     RoutingProfileId?: string,
 *     AgentAvailabilityTimer?: 'TIME_SINCE_LAST_ACTIVITY'|'TIME_SINCE_LAST_INBOUND',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRoutingProfileConcurrency(array $args = [])
 * @phpstan-method \Aws\Result updateRoutingProfileConcurrency(array{
 *     InstanceId?: string,
 *     RoutingProfileId?: string,
 *     MediaConcurrencies?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', Concurrency?: int, CrossChannelBehavior?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoutingProfileConcurrencyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoutingProfileConcurrencyAsync(array{
 *     InstanceId?: string,
 *     RoutingProfileId?: string,
 *     MediaConcurrencies?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', Concurrency?: int, CrossChannelBehavior?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRoutingProfileDefaultOutboundQueue(array $args = [])
 * @phpstan-method \Aws\Result updateRoutingProfileDefaultOutboundQueue(array{InstanceId?: string, RoutingProfileId?: string, DefaultOutboundQueueId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoutingProfileDefaultOutboundQueueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoutingProfileDefaultOutboundQueueAsync(array{InstanceId?: string, RoutingProfileId?: string, DefaultOutboundQueueId?: string, ...} $args = [])
 * @method \Aws\Result updateRoutingProfileName(array $args = [])
 * @phpstan-method \Aws\Result updateRoutingProfileName(array{InstanceId?: string, RoutingProfileId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoutingProfileNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoutingProfileNameAsync(array{InstanceId?: string, RoutingProfileId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateRoutingProfileQueues(array $args = [])
 * @phpstan-method \Aws\Result updateRoutingProfileQueues(array{
 *     InstanceId?: string,
 *     RoutingProfileId?: string,
 *     QueueConfigs?: list<array{QueueReference?: array, Priority?: int, Delay?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoutingProfileQueuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoutingProfileQueuesAsync(array{
 *     InstanceId?: string,
 *     RoutingProfileId?: string,
 *     QueueConfigs?: list<array{QueueReference?: array, Priority?: int, Delay?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRule(array $args = [])
 * @phpstan-method \Aws\Result updateRule(array{
 *     RuleId?: string,
 *     InstanceId?: string,
 *     Name?: string,
 *     Function?: string,
 *     Actions?: list<array{
 *         ActionType?: 'ASSIGN_CONTACT_CATEGORY'|'ASSIGN_SLA'|'CREATE_CASE'|'CREATE_TASK'|'END_ASSOCIATED_TASKS'|'GENERATE_EVENTBRIDGE_EVENT'|'SEND_NOTIFICATION'|'SUBMIT_AUTO_EVALUATION'|'UPDATE_CASE',
 *         TaskAction?: array,
 *         EventBridgeAction?: array,
 *         AssignContactCategoryAction?: array,
 *         SendNotificationAction?: array,
 *         CreateCaseAction?: array,
 *         UpdateCaseAction?: array,
 *         AssignSlaAction?: array,
 *         EndAssociatedTasksAction?: array,
 *         SubmitAutoEvaluationAction?: array,
 *         ...,
 *     }>,
 *     PublishStatus?: 'DRAFT'|'PUBLISHED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleAsync(array{
 *     RuleId?: string,
 *     InstanceId?: string,
 *     Name?: string,
 *     Function?: string,
 *     Actions?: list<array{
 *         ActionType?: 'ASSIGN_CONTACT_CATEGORY'|'ASSIGN_SLA'|'CREATE_CASE'|'CREATE_TASK'|'END_ASSOCIATED_TASKS'|'GENERATE_EVENTBRIDGE_EVENT'|'SEND_NOTIFICATION'|'SUBMIT_AUTO_EVALUATION'|'UPDATE_CASE',
 *         TaskAction?: array,
 *         EventBridgeAction?: array,
 *         AssignContactCategoryAction?: array,
 *         SendNotificationAction?: array,
 *         CreateCaseAction?: array,
 *         UpdateCaseAction?: array,
 *         AssignSlaAction?: array,
 *         EndAssociatedTasksAction?: array,
 *         SubmitAutoEvaluationAction?: array,
 *         ...,
 *     }>,
 *     PublishStatus?: 'DRAFT'|'PUBLISHED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result updateSecurityProfile(array{
 *     Description?: string,
 *     Permissions?: list<string>,
 *     SecurityProfileId?: string,
 *     InstanceId?: string,
 *     AllowedAccessControlTags?: array<string, string>,
 *     TagRestrictedResources?: list<string>,
 *     Applications?: list<array{Namespace?: string, ApplicationPermissions?: list<string>, Type?: 'MCP'|'THIRD_PARTY_APPLICATION', ...}>,
 *     HierarchyRestrictedResources?: list<string>,
 *     AllowedAccessControlHierarchyGroupId?: string,
 *     AllowedFlowModules?: list<array{Type?: 'MCP', FlowModuleId?: string, ...}>,
 *     GranularAccessControlConfiguration?: array{
 *         DataTableAccessControlConfiguration?: array{PrimaryAttributeAccessControlConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecurityProfileAsync(array{
 *     Description?: string,
 *     Permissions?: list<string>,
 *     SecurityProfileId?: string,
 *     InstanceId?: string,
 *     AllowedAccessControlTags?: array<string, string>,
 *     TagRestrictedResources?: list<string>,
 *     Applications?: list<array{Namespace?: string, ApplicationPermissions?: list<string>, Type?: 'MCP'|'THIRD_PARTY_APPLICATION', ...}>,
 *     HierarchyRestrictedResources?: list<string>,
 *     AllowedAccessControlHierarchyGroupId?: string,
 *     AllowedFlowModules?: list<array{Type?: 'MCP', FlowModuleId?: string, ...}>,
 *     GranularAccessControlConfiguration?: array{
 *         DataTableAccessControlConfiguration?: array{PrimaryAttributeAccessControlConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTaskTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateTaskTemplate(array{
 *     TaskTemplateId?: string,
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     ContactFlowId?: string,
 *     SelfAssignFlowId?: string,
 *     Constraints?: array{RequiredFields?: list<array>, ReadOnlyFields?: list<array>, InvisibleFields?: list<array>, ...},
 *     Defaults?: array{DefaultFieldValues?: list<array>, ...},
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     Fields?: list<array{
 *         Id?: array,
 *         Description?: string,
 *         Type?: 'BOOLEAN'|'DATE_TIME'|'DESCRIPTION'|'EMAIL'|'EXPIRY_DURATION'|'NAME'|'NUMBER'|'QUICK_CONNECT'|'SCHEDULED_TIME'|'SELF_ASSIGN'|'SINGLE_SELECT'|'TEXT'|'TEXT_AREA'|'URL',
 *         SingleSelectOptions?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTaskTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTaskTemplateAsync(array{
 *     TaskTemplateId?: string,
 *     InstanceId?: string,
 *     Name?: string,
 *     Description?: string,
 *     ContactFlowId?: string,
 *     SelfAssignFlowId?: string,
 *     Constraints?: array{RequiredFields?: list<array>, ReadOnlyFields?: list<array>, InvisibleFields?: list<array>, ...},
 *     Defaults?: array{DefaultFieldValues?: list<array>, ...},
 *     Status?: 'ACTIVE'|'INACTIVE',
 *     Fields?: list<array{
 *         Id?: array,
 *         Description?: string,
 *         Type?: 'BOOLEAN'|'DATE_TIME'|'DESCRIPTION'|'EMAIL'|'EXPIRY_DURATION'|'NAME'|'NUMBER'|'QUICK_CONNECT'|'SCHEDULED_TIME'|'SELF_ASSIGN'|'SINGLE_SELECT'|'TEXT'|'TEXT_AREA'|'URL',
 *         SingleSelectOptions?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTestCase(array $args = [])
 * @phpstan-method \Aws\Result updateTestCase(array{
 *     InstanceId?: string,
 *     TestCaseId?: string,
 *     Content?: string,
 *     EntryPoint?: array{
 *         Type?: 'CHAT'|'VOICE_CALL',
 *         VoiceCallEntryPointParameters?: array{SourcePhoneNumber?: string, DestinationPhoneNumber?: string, FlowId?: string, ...},
 *         ChatEntryPointParameters?: array{FlowId?: string, ...},
 *         ...,
 *     },
 *     InitializationData?: string,
 *     Name?: string,
 *     Description?: string,
 *     Status?: 'PUBLISHED'|'SAVED',
 *     LastModifiedTime?: int|string|\DateTimeInterface,
 *     LastModifiedRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTestCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTestCaseAsync(array{
 *     InstanceId?: string,
 *     TestCaseId?: string,
 *     Content?: string,
 *     EntryPoint?: array{
 *         Type?: 'CHAT'|'VOICE_CALL',
 *         VoiceCallEntryPointParameters?: array{SourcePhoneNumber?: string, DestinationPhoneNumber?: string, FlowId?: string, ...},
 *         ChatEntryPointParameters?: array{FlowId?: string, ...},
 *         ...,
 *     },
 *     InitializationData?: string,
 *     Name?: string,
 *     Description?: string,
 *     Status?: 'PUBLISHED'|'SAVED',
 *     LastModifiedTime?: int|string|\DateTimeInterface,
 *     LastModifiedRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrafficDistribution(array $args = [])
 * @phpstan-method \Aws\Result updateTrafficDistribution(array{
 *     Id?: string,
 *     TelephonyConfig?: array{Distributions?: list<array>, ...},
 *     SignInConfig?: array{Distributions?: list<array>, ...},
 *     AgentConfig?: array{Distributions?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrafficDistributionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrafficDistributionAsync(array{
 *     Id?: string,
 *     TelephonyConfig?: array{Distributions?: list<array>, ...},
 *     SignInConfig?: array{Distributions?: list<array>, ...},
 *     AgentConfig?: array{Distributions?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserConfig(array $args = [])
 * @phpstan-method \Aws\Result updateUserConfig(array{
 *     AutoAcceptConfigs?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', AutoAccept?: bool, AgentFirstCallbackAutoAccept?: bool, ...}>,
 *     AfterContactWorkConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         AfterContactWorkConfig?: array,
 *         AgentFirstCallbackAfterContactWorkConfig?: array,
 *         ...,
 *     }>,
 *     PhoneNumberConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         PhoneType?: 'DESK_PHONE'|'SOFT_PHONE',
 *         PhoneNumber?: string,
 *         ...,
 *     }>,
 *     PersistentConnectionConfigs?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', PersistentConnection?: bool, ...}>,
 *     VoiceEnhancementConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         VoiceEnhancementMode?: 'NOISE_SUPPRESSION'|'NONE'|'VOICE_ISOLATION',
 *         ...,
 *     }>,
 *     UserId?: string,
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserConfigAsync(array{
 *     AutoAcceptConfigs?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', AutoAccept?: bool, AgentFirstCallbackAutoAccept?: bool, ...}>,
 *     AfterContactWorkConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         AfterContactWorkConfig?: array,
 *         AgentFirstCallbackAfterContactWorkConfig?: array,
 *         ...,
 *     }>,
 *     PhoneNumberConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         PhoneType?: 'DESK_PHONE'|'SOFT_PHONE',
 *         PhoneNumber?: string,
 *         ...,
 *     }>,
 *     PersistentConnectionConfigs?: list<array{Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE', PersistentConnection?: bool, ...}>,
 *     VoiceEnhancementConfigs?: list<array{
 *         Channel?: 'CHAT'|'EMAIL'|'TASK'|'VOICE',
 *         VoiceEnhancementMode?: 'NOISE_SUPPRESSION'|'NONE'|'VOICE_ISOLATION',
 *         ...,
 *     }>,
 *     UserId?: string,
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserHierarchy(array $args = [])
 * @phpstan-method \Aws\Result updateUserHierarchy(array{HierarchyGroupId?: string, UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserHierarchyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserHierarchyAsync(array{HierarchyGroupId?: string, UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result updateUserHierarchyGroupName(array $args = [])
 * @phpstan-method \Aws\Result updateUserHierarchyGroupName(array{Name?: string, HierarchyGroupId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserHierarchyGroupNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserHierarchyGroupNameAsync(array{Name?: string, HierarchyGroupId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result updateUserHierarchyStructure(array $args = [])
 * @phpstan-method \Aws\Result updateUserHierarchyStructure(array{
 *     HierarchyStructure?: array{
 *         LevelOne?: array{Name?: string, ...},
 *         LevelTwo?: array{Name?: string, ...},
 *         LevelThree?: array{Name?: string, ...},
 *         LevelFour?: array{Name?: string, ...},
 *         LevelFive?: array{Name?: string, ...},
 *         ...,
 *     },
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserHierarchyStructureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserHierarchyStructureAsync(array{
 *     HierarchyStructure?: array{
 *         LevelOne?: array{Name?: string, ...},
 *         LevelTwo?: array{Name?: string, ...},
 *         LevelThree?: array{Name?: string, ...},
 *         LevelFour?: array{Name?: string, ...},
 *         LevelFive?: array{Name?: string, ...},
 *         ...,
 *     },
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserIdentityInfo(array $args = [])
 * @phpstan-method \Aws\Result updateUserIdentityInfo(array{
 *     IdentityInfo?: array{FirstName?: string, LastName?: string, Email?: string, SecondaryEmail?: string, Mobile?: string, ...},
 *     UserId?: string,
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserIdentityInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserIdentityInfoAsync(array{
 *     IdentityInfo?: array{FirstName?: string, LastName?: string, Email?: string, SecondaryEmail?: string, Mobile?: string, ...},
 *     UserId?: string,
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserNotificationStatus(array $args = [])
 * @phpstan-method \Aws\Result updateUserNotificationStatus(array{
 *     InstanceId?: string,
 *     NotificationId?: string,
 *     UserId?: string,
 *     Status?: 'HIDDEN'|'READ'|'UNREAD',
 *     LastModifiedTime?: int|string|\DateTimeInterface,
 *     LastModifiedRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserNotificationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserNotificationStatusAsync(array{
 *     InstanceId?: string,
 *     NotificationId?: string,
 *     UserId?: string,
 *     Status?: 'HIDDEN'|'READ'|'UNREAD',
 *     LastModifiedTime?: int|string|\DateTimeInterface,
 *     LastModifiedRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserPhoneConfig(array $args = [])
 * @phpstan-method \Aws\Result updateUserPhoneConfig(array{
 *     PhoneConfig?: array{
 *         PhoneType?: 'DESK_PHONE'|'SOFT_PHONE',
 *         AutoAccept?: bool,
 *         AfterContactWorkTimeLimit?: int,
 *         DeskPhoneNumber?: string,
 *         PersistentConnection?: bool,
 *         ...,
 *     },
 *     UserId?: string,
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserPhoneConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserPhoneConfigAsync(array{
 *     PhoneConfig?: array{
 *         PhoneType?: 'DESK_PHONE'|'SOFT_PHONE',
 *         AutoAccept?: bool,
 *         AfterContactWorkTimeLimit?: int,
 *         DeskPhoneNumber?: string,
 *         PersistentConnection?: bool,
 *         ...,
 *     },
 *     UserId?: string,
 *     InstanceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserProficiencies(array $args = [])
 * @phpstan-method \Aws\Result updateUserProficiencies(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     UserProficiencies?: list<array{AttributeName?: string, AttributeValue?: string, Level?: float, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserProficienciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserProficienciesAsync(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     UserProficiencies?: list<array{AttributeName?: string, AttributeValue?: string, Level?: float, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserRoutingProfile(array $args = [])
 * @phpstan-method \Aws\Result updateUserRoutingProfile(array{RoutingProfileId?: string, UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserRoutingProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserRoutingProfileAsync(array{RoutingProfileId?: string, UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result updateUserSecurityProfiles(array $args = [])
 * @phpstan-method \Aws\Result updateUserSecurityProfiles(array{SecurityProfileIds?: list<string>, UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserSecurityProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserSecurityProfilesAsync(array{SecurityProfileIds?: list<string>, UserId?: string, InstanceId?: string, ...} $args = [])
 * @method \Aws\Result updateViewContent(array $args = [])
 * @phpstan-method \Aws\Result updateViewContent(array{
 *     InstanceId?: string,
 *     ViewId?: string,
 *     Status?: 'PUBLISHED'|'SAVED',
 *     Content?: array{Template?: string, Actions?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateViewContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateViewContentAsync(array{
 *     InstanceId?: string,
 *     ViewId?: string,
 *     Status?: 'PUBLISHED'|'SAVED',
 *     Content?: array{Template?: string, Actions?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateViewMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateViewMetadata(array{InstanceId?: string, ViewId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateViewMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateViewMetadataAsync(array{InstanceId?: string, ViewId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateWorkspaceMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspaceMetadata(array{InstanceId?: string, WorkspaceId?: string, Name?: string, Description?: string, Title?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceMetadataAsync(array{InstanceId?: string, WorkspaceId?: string, Name?: string, Description?: string, Title?: string, ...} $args = [])
 * @method \Aws\Result updateWorkspacePage(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspacePage(array{
 *     InstanceId?: string,
 *     WorkspaceId?: string,
 *     Page?: string,
 *     NewPage?: string,
 *     ResourceArn?: string,
 *     Slug?: string,
 *     InputData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspacePageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspacePageAsync(array{
 *     InstanceId?: string,
 *     WorkspaceId?: string,
 *     Page?: string,
 *     NewPage?: string,
 *     ResourceArn?: string,
 *     Slug?: string,
 *     InputData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkspaceTheme(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspaceTheme(array{
 *     InstanceId?: string,
 *     WorkspaceId?: string,
 *     Theme?: array{
 *         Light?: array{Palette?: array, Images?: array, Typography?: array, ...},
 *         Dark?: array{Palette?: array, Images?: array, Typography?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceThemeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceThemeAsync(array{
 *     InstanceId?: string,
 *     WorkspaceId?: string,
 *     Theme?: array{
 *         Light?: array{Palette?: array, Images?: array, Typography?: array, ...},
 *         Dark?: array{Palette?: array, Images?: array, Typography?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkspaceVisibility(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspaceVisibility(array{InstanceId?: string, WorkspaceId?: string, Visibility?: 'ALL'|'ASSIGNED'|'NONE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceVisibilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceVisibilityAsync(array{InstanceId?: string, WorkspaceId?: string, Visibility?: 'ALL'|'ASSIGNED'|'NONE', ...} $args = [])
 */
class ConnectClient extends AwsClient {}
