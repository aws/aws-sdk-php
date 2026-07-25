<?php
namespace Aws\Pinpoint;

use Aws\Api\ApiProvider;
use Aws\Api\DocModel;
use Aws\Api\Service;
use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Pinpoint** service.
 * @method \Aws\Result createApp(array $args = [])
 * @phpstan-method \Aws\Result createApp(array{CreateApplicationRequest?: array{Name?: string, tags?: array<string, string>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppAsync(array{CreateApplicationRequest?: array{Name?: string, tags?: array<string, string>, ...}, ...} $args = [])
 * @method \Aws\Result createCampaign(array $args = [])
 * @phpstan-method \Aws\Result createCampaign(array{
 *     ApplicationId?: string,
 *     WriteCampaignRequest?: array{
 *         AdditionalTreatments?: list<array>,
 *         CustomDeliveryConfiguration?: array{
 *             DeliveryUri?: string,
 *             EndpointTypes?: list<'ADM'|'APNS'|'APNS_SANDBOX'|'APNS_VOIP'|'APNS_VOIP_SANDBOX'|'BAIDU'|'CUSTOM'|'EMAIL'|'GCM'|'IN_APP'|'PUSH'|'SMS'|'VOICE'>,
 *             ...,
 *         },
 *         Description?: string,
 *         HoldoutPercent?: int,
 *         Hook?: array{LambdaFunctionName?: string, Mode?: 'DELIVERY'|'FILTER', WebUrl?: string, ...},
 *         IsPaused?: bool,
 *         Limits?: array{Daily?: int, MaximumDuration?: int, MessagesPerSecond?: int, Total?: int, Session?: int, ...},
 *         MessageConfiguration?: array{
 *             ADMMessage?: array,
 *             APNSMessage?: array,
 *             BaiduMessage?: array,
 *             CustomMessage?: array,
 *             DefaultMessage?: array,
 *             EmailMessage?: array,
 *             GCMMessage?: array,
 *             SMSMessage?: array,
 *             InAppMessage?: array,
 *             ...,
 *         },
 *         Name?: string,
 *         Schedule?: array{
 *             EndTime?: string,
 *             EventFilter?: array,
 *             Frequency?: 'DAILY'|'EVENT'|'HOURLY'|'IN_APP_EVENT'|'MONTHLY'|'ONCE'|'WEEKLY',
 *             IsLocalTime?: bool,
 *             QuietTime?: array,
 *             StartTime?: string,
 *             Timezone?: string,
 *             ...,
 *         },
 *         SegmentId?: string,
 *         SegmentVersion?: int,
 *         tags?: array<string, string>,
 *         TemplateConfiguration?: array{
 *             EmailTemplate?: array,
 *             PushTemplate?: array,
 *             SMSTemplate?: array,
 *             VoiceTemplate?: array,
 *             InAppTemplate?: array,
 *             ...,
 *         },
 *         TreatmentDescription?: string,
 *         TreatmentName?: string,
 *         Priority?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCampaignAsync(array{
 *     ApplicationId?: string,
 *     WriteCampaignRequest?: array{
 *         AdditionalTreatments?: list<array>,
 *         CustomDeliveryConfiguration?: array{
 *             DeliveryUri?: string,
 *             EndpointTypes?: list<'ADM'|'APNS'|'APNS_SANDBOX'|'APNS_VOIP'|'APNS_VOIP_SANDBOX'|'BAIDU'|'CUSTOM'|'EMAIL'|'GCM'|'IN_APP'|'PUSH'|'SMS'|'VOICE'>,
 *             ...,
 *         },
 *         Description?: string,
 *         HoldoutPercent?: int,
 *         Hook?: array{LambdaFunctionName?: string, Mode?: 'DELIVERY'|'FILTER', WebUrl?: string, ...},
 *         IsPaused?: bool,
 *         Limits?: array{Daily?: int, MaximumDuration?: int, MessagesPerSecond?: int, Total?: int, Session?: int, ...},
 *         MessageConfiguration?: array{
 *             ADMMessage?: array,
 *             APNSMessage?: array,
 *             BaiduMessage?: array,
 *             CustomMessage?: array,
 *             DefaultMessage?: array,
 *             EmailMessage?: array,
 *             GCMMessage?: array,
 *             SMSMessage?: array,
 *             InAppMessage?: array,
 *             ...,
 *         },
 *         Name?: string,
 *         Schedule?: array{
 *             EndTime?: string,
 *             EventFilter?: array,
 *             Frequency?: 'DAILY'|'EVENT'|'HOURLY'|'IN_APP_EVENT'|'MONTHLY'|'ONCE'|'WEEKLY',
 *             IsLocalTime?: bool,
 *             QuietTime?: array,
 *             StartTime?: string,
 *             Timezone?: string,
 *             ...,
 *         },
 *         SegmentId?: string,
 *         SegmentVersion?: int,
 *         tags?: array<string, string>,
 *         TemplateConfiguration?: array{
 *             EmailTemplate?: array,
 *             PushTemplate?: array,
 *             SMSTemplate?: array,
 *             VoiceTemplate?: array,
 *             InAppTemplate?: array,
 *             ...,
 *         },
 *         TreatmentDescription?: string,
 *         TreatmentName?: string,
 *         Priority?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result createEmailTemplate(array{
 *     EmailTemplateRequest?: array{
 *         DefaultSubstitutions?: string,
 *         HtmlPart?: string,
 *         RecommenderId?: string,
 *         Subject?: string,
 *         Headers?: list<array>,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         TextPart?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEmailTemplateAsync(array{
 *     EmailTemplateRequest?: array{
 *         DefaultSubstitutions?: string,
 *         HtmlPart?: string,
 *         RecommenderId?: string,
 *         Subject?: string,
 *         Headers?: list<array>,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         TextPart?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExportJob(array $args = [])
 * @phpstan-method \Aws\Result createExportJob(array{
 *     ApplicationId?: string,
 *     ExportJobRequest?: array{RoleArn?: string, S3UrlPrefix?: string, SegmentId?: string, SegmentVersion?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExportJobAsync(array{
 *     ApplicationId?: string,
 *     ExportJobRequest?: array{RoleArn?: string, S3UrlPrefix?: string, SegmentId?: string, SegmentVersion?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createImportJob(array $args = [])
 * @phpstan-method \Aws\Result createImportJob(array{
 *     ApplicationId?: string,
 *     ImportJobRequest?: array{
 *         DefineSegment?: bool,
 *         ExternalId?: string,
 *         Format?: 'CSV'|'JSON',
 *         RegisterEndpoints?: bool,
 *         RoleArn?: string,
 *         S3Url?: string,
 *         SegmentId?: string,
 *         SegmentName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImportJobAsync(array{
 *     ApplicationId?: string,
 *     ImportJobRequest?: array{
 *         DefineSegment?: bool,
 *         ExternalId?: string,
 *         Format?: 'CSV'|'JSON',
 *         RegisterEndpoints?: bool,
 *         RoleArn?: string,
 *         S3Url?: string,
 *         SegmentId?: string,
 *         SegmentName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInAppTemplate(array $args = [])
 * @phpstan-method \Aws\Result createInAppTemplate(array{
 *     InAppTemplateRequest?: array{
 *         Content?: list<array>,
 *         CustomConfig?: array<string, string>,
 *         Layout?: 'BOTTOM_BANNER'|'CAROUSEL'|'MIDDLE_BANNER'|'MOBILE_FEED'|'OVERLAYS'|'TOP_BANNER',
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInAppTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInAppTemplateAsync(array{
 *     InAppTemplateRequest?: array{
 *         Content?: list<array>,
 *         CustomConfig?: array<string, string>,
 *         Layout?: 'BOTTOM_BANNER'|'CAROUSEL'|'MIDDLE_BANNER'|'MOBILE_FEED'|'OVERLAYS'|'TOP_BANNER',
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createJourney(array $args = [])
 * @phpstan-method \Aws\Result createJourney(array{
 *     ApplicationId?: string,
 *     WriteJourneyRequest?: array{
 *         Activities?: array<string, array>,
 *         CreationDate?: string,
 *         LastModifiedDate?: string,
 *         Limits?: array{
 *             DailyCap?: int,
 *             EndpointReentryCap?: int,
 *             MessagesPerSecond?: int,
 *             EndpointReentryInterval?: string,
 *             TimeframeCap?: array,
 *             TotalCap?: int,
 *             ...,
 *         },
 *         LocalTime?: bool,
 *         Name?: string,
 *         QuietTime?: array{End?: string, Start?: string, ...},
 *         RefreshFrequency?: string,
 *         Schedule?: array{
 *             EndTime?: int|string|\DateTimeInterface,
 *             StartTime?: int|string|\DateTimeInterface,
 *             Timezone?: string,
 *             ...,
 *         },
 *         StartActivity?: string,
 *         StartCondition?: array{Description?: string, EventStartCondition?: array, SegmentStartCondition?: array, ...},
 *         State?: 'ACTIVE'|'CANCELLED'|'CLOSED'|'COMPLETED'|'DRAFT'|'PAUSED',
 *         WaitForQuietTime?: bool,
 *         RefreshOnSegmentUpdate?: bool,
 *         JourneyChannelSettings?: array{ConnectCampaignArn?: string, ConnectCampaignExecutionRoleArn?: string, ...},
 *         SendingSchedule?: bool,
 *         OpenHours?: array{
 *             EMAIL?: array<string, list<array>>,
 *             SMS?: array<string, list<array>>,
 *             PUSH?: array<string, list<array>>,
 *             VOICE?: array<string, list<array>>,
 *             CUSTOM?: array<string, list<array>>,
 *             ...,
 *         },
 *         ClosedDays?: array{
 *             EMAIL?: list<array>,
 *             SMS?: list<array>,
 *             PUSH?: list<array>,
 *             VOICE?: list<array>,
 *             CUSTOM?: list<array>,
 *             ...,
 *         },
 *         TimezoneEstimationMethods?: list<'PHONE_NUMBER'|'POSTAL_CODE'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJourneyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJourneyAsync(array{
 *     ApplicationId?: string,
 *     WriteJourneyRequest?: array{
 *         Activities?: array<string, array>,
 *         CreationDate?: string,
 *         LastModifiedDate?: string,
 *         Limits?: array{
 *             DailyCap?: int,
 *             EndpointReentryCap?: int,
 *             MessagesPerSecond?: int,
 *             EndpointReentryInterval?: string,
 *             TimeframeCap?: array,
 *             TotalCap?: int,
 *             ...,
 *         },
 *         LocalTime?: bool,
 *         Name?: string,
 *         QuietTime?: array{End?: string, Start?: string, ...},
 *         RefreshFrequency?: string,
 *         Schedule?: array{
 *             EndTime?: int|string|\DateTimeInterface,
 *             StartTime?: int|string|\DateTimeInterface,
 *             Timezone?: string,
 *             ...,
 *         },
 *         StartActivity?: string,
 *         StartCondition?: array{Description?: string, EventStartCondition?: array, SegmentStartCondition?: array, ...},
 *         State?: 'ACTIVE'|'CANCELLED'|'CLOSED'|'COMPLETED'|'DRAFT'|'PAUSED',
 *         WaitForQuietTime?: bool,
 *         RefreshOnSegmentUpdate?: bool,
 *         JourneyChannelSettings?: array{ConnectCampaignArn?: string, ConnectCampaignExecutionRoleArn?: string, ...},
 *         SendingSchedule?: bool,
 *         OpenHours?: array{
 *             EMAIL?: array<string, list<array>>,
 *             SMS?: array<string, list<array>>,
 *             PUSH?: array<string, list<array>>,
 *             VOICE?: array<string, list<array>>,
 *             CUSTOM?: array<string, list<array>>,
 *             ...,
 *         },
 *         ClosedDays?: array{
 *             EMAIL?: list<array>,
 *             SMS?: list<array>,
 *             PUSH?: list<array>,
 *             VOICE?: list<array>,
 *             CUSTOM?: list<array>,
 *             ...,
 *         },
 *         TimezoneEstimationMethods?: list<'PHONE_NUMBER'|'POSTAL_CODE'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPushTemplate(array $args = [])
 * @phpstan-method \Aws\Result createPushTemplate(array{
 *     PushNotificationTemplateRequest?: array{
 *         ADM?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         APNS?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             MediaUrl?: string,
 *             RawContent?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         Baidu?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         Default?: array{Action?: 'DEEP_LINK'|'OPEN_APP'|'URL', Body?: string, Sound?: string, Title?: string, Url?: string, ...},
 *         DefaultSubstitutions?: string,
 *         GCM?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         RecommenderId?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPushTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPushTemplateAsync(array{
 *     PushNotificationTemplateRequest?: array{
 *         ADM?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         APNS?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             MediaUrl?: string,
 *             RawContent?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         Baidu?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         Default?: array{Action?: 'DEEP_LINK'|'OPEN_APP'|'URL', Body?: string, Sound?: string, Title?: string, Url?: string, ...},
 *         DefaultSubstitutions?: string,
 *         GCM?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         RecommenderId?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRecommenderConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createRecommenderConfiguration(array{
 *     CreateRecommenderConfiguration?: array{
 *         Attributes?: array<string, string>,
 *         Description?: string,
 *         Name?: string,
 *         RecommendationProviderIdType?: string,
 *         RecommendationProviderRoleArn?: string,
 *         RecommendationProviderUri?: string,
 *         RecommendationTransformerUri?: string,
 *         RecommendationsDisplayName?: string,
 *         RecommendationsPerMessage?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRecommenderConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRecommenderConfigurationAsync(array{
 *     CreateRecommenderConfiguration?: array{
 *         Attributes?: array<string, string>,
 *         Description?: string,
 *         Name?: string,
 *         RecommendationProviderIdType?: string,
 *         RecommendationProviderRoleArn?: string,
 *         RecommendationProviderUri?: string,
 *         RecommendationTransformerUri?: string,
 *         RecommendationsDisplayName?: string,
 *         RecommendationsPerMessage?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSegment(array $args = [])
 * @phpstan-method \Aws\Result createSegment(array{
 *     ApplicationId?: string,
 *     WriteSegmentRequest?: array{
 *         Dimensions?: array{
 *             Attributes?: array<string, array>,
 *             Behavior?: array,
 *             Demographic?: array,
 *             Location?: array,
 *             Metrics?: array<string, array>,
 *             UserAttributes?: array<string, array>,
 *             ...,
 *         },
 *         Name?: string,
 *         SegmentGroups?: array{Groups?: list<array>, Include?: 'ALL'|'ANY'|'NONE', ...},
 *         tags?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSegmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSegmentAsync(array{
 *     ApplicationId?: string,
 *     WriteSegmentRequest?: array{
 *         Dimensions?: array{
 *             Attributes?: array<string, array>,
 *             Behavior?: array,
 *             Demographic?: array,
 *             Location?: array,
 *             Metrics?: array<string, array>,
 *             UserAttributes?: array<string, array>,
 *             ...,
 *         },
 *         Name?: string,
 *         SegmentGroups?: array{Groups?: list<array>, Include?: 'ALL'|'ANY'|'NONE', ...},
 *         tags?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSmsTemplate(array $args = [])
 * @phpstan-method \Aws\Result createSmsTemplate(array{
 *     SMSTemplateRequest?: array{
 *         Body?: string,
 *         DefaultSubstitutions?: string,
 *         RecommenderId?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSmsTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSmsTemplateAsync(array{
 *     SMSTemplateRequest?: array{
 *         Body?: string,
 *         DefaultSubstitutions?: string,
 *         RecommenderId?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVoiceTemplate(array $args = [])
 * @phpstan-method \Aws\Result createVoiceTemplate(array{
 *     TemplateName?: string,
 *     VoiceTemplateRequest?: array{
 *         Body?: string,
 *         DefaultSubstitutions?: string,
 *         LanguageCode?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         VoiceId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVoiceTemplateAsync(array{
 *     TemplateName?: string,
 *     VoiceTemplateRequest?: array{
 *         Body?: string,
 *         DefaultSubstitutions?: string,
 *         LanguageCode?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         VoiceId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAdmChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteAdmChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAdmChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAdmChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteApnsChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteApnsChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApnsChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApnsChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteApnsSandboxChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteApnsSandboxChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApnsSandboxChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApnsSandboxChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteApnsVoipChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteApnsVoipChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApnsVoipChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApnsVoipChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteApnsVoipSandboxChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteApnsVoipSandboxChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApnsVoipSandboxChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApnsVoipSandboxChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteApp(array $args = [])
 * @phpstan-method \Aws\Result deleteApp(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteBaiduChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteBaiduChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBaiduChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBaiduChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteCampaign(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaign(array{ApplicationId?: string, CampaignId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array{ApplicationId?: string, CampaignId?: string, ...} $args = [])
 * @method \Aws\Result deleteEmailChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteEmailChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEmailChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEmailChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteEmailTemplate(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEmailTemplateAsync(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result deleteEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpoint(array{ApplicationId?: string, EndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array{ApplicationId?: string, EndpointId?: string, ...} $args = [])
 * @method \Aws\Result deleteEventStream(array $args = [])
 * @phpstan-method \Aws\Result deleteEventStream(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventStreamAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteGcmChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteGcmChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGcmChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGcmChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteInAppTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteInAppTemplate(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInAppTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInAppTemplateAsync(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result deleteJourney(array $args = [])
 * @phpstan-method \Aws\Result deleteJourney(array{ApplicationId?: string, JourneyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJourneyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJourneyAsync(array{ApplicationId?: string, JourneyId?: string, ...} $args = [])
 * @method \Aws\Result deletePushTemplate(array $args = [])
 * @phpstan-method \Aws\Result deletePushTemplate(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePushTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePushTemplateAsync(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result deleteRecommenderConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteRecommenderConfiguration(array{RecommenderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecommenderConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecommenderConfigurationAsync(array{RecommenderId?: string, ...} $args = [])
 * @method \Aws\Result deleteSegment(array $args = [])
 * @phpstan-method \Aws\Result deleteSegment(array{ApplicationId?: string, SegmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSegmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSegmentAsync(array{ApplicationId?: string, SegmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteSmsChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteSmsChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSmsChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSmsChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteSmsTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteSmsTemplate(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSmsTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSmsTemplateAsync(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result deleteUserEndpoints(array $args = [])
 * @phpstan-method \Aws\Result deleteUserEndpoints(array{ApplicationId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserEndpointsAsync(array{ApplicationId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceTemplate(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceTemplateAsync(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result getAdmChannel(array $args = [])
 * @phpstan-method \Aws\Result getAdmChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdmChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdmChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getApnsChannel(array $args = [])
 * @phpstan-method \Aws\Result getApnsChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApnsChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApnsChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getApnsSandboxChannel(array $args = [])
 * @phpstan-method \Aws\Result getApnsSandboxChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApnsSandboxChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApnsSandboxChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getApnsVoipChannel(array $args = [])
 * @phpstan-method \Aws\Result getApnsVoipChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApnsVoipChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApnsVoipChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getApnsVoipSandboxChannel(array $args = [])
 * @phpstan-method \Aws\Result getApnsVoipSandboxChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApnsVoipSandboxChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApnsVoipSandboxChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getApp(array $args = [])
 * @phpstan-method \Aws\Result getApp(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAppAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getApplicationDateRangeKpi(array $args = [])
 * @phpstan-method \Aws\Result getApplicationDateRangeKpi(array{
 *     ApplicationId?: string,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KpiName?: string,
 *     NextToken?: string,
 *     PageSize?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationDateRangeKpiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationDateRangeKpiAsync(array{
 *     ApplicationId?: string,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KpiName?: string,
 *     NextToken?: string,
 *     PageSize?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getApplicationSettings(array $args = [])
 * @phpstan-method \Aws\Result getApplicationSettings(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationSettingsAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getApps(array $args = [])
 * @phpstan-method \Aws\Result getApps(array{PageSize?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAppsAsync(array{PageSize?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getBaiduChannel(array $args = [])
 * @phpstan-method \Aws\Result getBaiduChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBaiduChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBaiduChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getCampaign(array $args = [])
 * @phpstan-method \Aws\Result getCampaign(array{ApplicationId?: string, CampaignId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignAsync(array{ApplicationId?: string, CampaignId?: string, ...} $args = [])
 * @method \Aws\Result getCampaignActivities(array $args = [])
 * @phpstan-method \Aws\Result getCampaignActivities(array{ApplicationId?: string, CampaignId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignActivitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignActivitiesAsync(array{ApplicationId?: string, CampaignId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getCampaignDateRangeKpi(array $args = [])
 * @phpstan-method \Aws\Result getCampaignDateRangeKpi(array{
 *     ApplicationId?: string,
 *     CampaignId?: string,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KpiName?: string,
 *     NextToken?: string,
 *     PageSize?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignDateRangeKpiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignDateRangeKpiAsync(array{
 *     ApplicationId?: string,
 *     CampaignId?: string,
 *     EndTime?: int|string|\DateTimeInterface,
 *     KpiName?: string,
 *     NextToken?: string,
 *     PageSize?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCampaignVersion(array $args = [])
 * @phpstan-method \Aws\Result getCampaignVersion(array{ApplicationId?: string, CampaignId?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignVersionAsync(array{ApplicationId?: string, CampaignId?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result getCampaignVersions(array $args = [])
 * @phpstan-method \Aws\Result getCampaignVersions(array{ApplicationId?: string, CampaignId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignVersionsAsync(array{ApplicationId?: string, CampaignId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getCampaigns(array $args = [])
 * @phpstan-method \Aws\Result getCampaigns(array{ApplicationId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignsAsync(array{ApplicationId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getChannels(array $args = [])
 * @phpstan-method \Aws\Result getChannels(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelsAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getEmailChannel(array $args = [])
 * @phpstan-method \Aws\Result getEmailChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEmailChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEmailChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result getEmailTemplate(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEmailTemplateAsync(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result getUserEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getUserEndpoint(array{ApplicationId?: string, EndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserEndpointAsync(array{ApplicationId?: string, EndpointId?: string, ...} $args = [])
 * @method \Aws\Result getEventStream(array $args = [])
 * @phpstan-method \Aws\Result getEventStream(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventStreamAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getExportJob(array $args = [])
 * @phpstan-method \Aws\Result getExportJob(array{ApplicationId?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportJobAsync(array{ApplicationId?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result getExportJobs(array $args = [])
 * @phpstan-method \Aws\Result getExportJobs(array{ApplicationId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportJobsAsync(array{ApplicationId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getGcmChannel(array $args = [])
 * @phpstan-method \Aws\Result getGcmChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGcmChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGcmChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getImportJob(array $args = [])
 * @phpstan-method \Aws\Result getImportJob(array{ApplicationId?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImportJobAsync(array{ApplicationId?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result getImportJobs(array $args = [])
 * @phpstan-method \Aws\Result getImportJobs(array{ApplicationId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImportJobsAsync(array{ApplicationId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getInAppMessages(array $args = [])
 * @phpstan-method \Aws\Result getInAppMessages(array{ApplicationId?: string, EndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInAppMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInAppMessagesAsync(array{ApplicationId?: string, EndpointId?: string, ...} $args = [])
 * @method \Aws\Result getInAppTemplate(array $args = [])
 * @phpstan-method \Aws\Result getInAppTemplate(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInAppTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInAppTemplateAsync(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result getJourney(array $args = [])
 * @phpstan-method \Aws\Result getJourney(array{ApplicationId?: string, JourneyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJourneyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJourneyAsync(array{ApplicationId?: string, JourneyId?: string, ...} $args = [])
 * @method \Aws\Result getJourneyDateRangeKpi(array $args = [])
 * @phpstan-method \Aws\Result getJourneyDateRangeKpi(array{
 *     ApplicationId?: string,
 *     EndTime?: int|string|\DateTimeInterface,
 *     JourneyId?: string,
 *     KpiName?: string,
 *     NextToken?: string,
 *     PageSize?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getJourneyDateRangeKpiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJourneyDateRangeKpiAsync(array{
 *     ApplicationId?: string,
 *     EndTime?: int|string|\DateTimeInterface,
 *     JourneyId?: string,
 *     KpiName?: string,
 *     NextToken?: string,
 *     PageSize?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getJourneyExecutionActivityMetrics(array $args = [])
 * @phpstan-method \Aws\Result getJourneyExecutionActivityMetrics(array{
 *     ApplicationId?: string,
 *     JourneyActivityId?: string,
 *     JourneyId?: string,
 *     NextToken?: string,
 *     PageSize?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getJourneyExecutionActivityMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJourneyExecutionActivityMetricsAsync(array{
 *     ApplicationId?: string,
 *     JourneyActivityId?: string,
 *     JourneyId?: string,
 *     NextToken?: string,
 *     PageSize?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getJourneyExecutionMetrics(array $args = [])
 * @phpstan-method \Aws\Result getJourneyExecutionMetrics(array{ApplicationId?: string, JourneyId?: string, NextToken?: string, PageSize?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJourneyExecutionMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJourneyExecutionMetricsAsync(array{ApplicationId?: string, JourneyId?: string, NextToken?: string, PageSize?: string, ...} $args = [])
 * @method \Aws\Result getJourneyRunExecutionActivityMetrics(array $args = [])
 * @phpstan-method \Aws\Result getJourneyRunExecutionActivityMetrics(array{
 *     ApplicationId?: string,
 *     JourneyActivityId?: string,
 *     JourneyId?: string,
 *     NextToken?: string,
 *     PageSize?: string,
 *     RunId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getJourneyRunExecutionActivityMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJourneyRunExecutionActivityMetricsAsync(array{
 *     ApplicationId?: string,
 *     JourneyActivityId?: string,
 *     JourneyId?: string,
 *     NextToken?: string,
 *     PageSize?: string,
 *     RunId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getJourneyRunExecutionMetrics(array $args = [])
 * @phpstan-method \Aws\Result getJourneyRunExecutionMetrics(array{ApplicationId?: string, JourneyId?: string, NextToken?: string, PageSize?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJourneyRunExecutionMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJourneyRunExecutionMetricsAsync(array{ApplicationId?: string, JourneyId?: string, NextToken?: string, PageSize?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result getJourneyRuns(array $args = [])
 * @phpstan-method \Aws\Result getJourneyRuns(array{ApplicationId?: string, JourneyId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJourneyRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJourneyRunsAsync(array{ApplicationId?: string, JourneyId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getPushTemplate(array $args = [])
 * @phpstan-method \Aws\Result getPushTemplate(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPushTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPushTemplateAsync(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result getRecommenderConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getRecommenderConfiguration(array{RecommenderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommenderConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommenderConfigurationAsync(array{RecommenderId?: string, ...} $args = [])
 * @method \Aws\Result getRecommenderConfigurations(array $args = [])
 * @phpstan-method \Aws\Result getRecommenderConfigurations(array{PageSize?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommenderConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommenderConfigurationsAsync(array{PageSize?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getSegment(array $args = [])
 * @phpstan-method \Aws\Result getSegment(array{ApplicationId?: string, SegmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentAsync(array{ApplicationId?: string, SegmentId?: string, ...} $args = [])
 * @method \Aws\Result getSegmentExportJobs(array $args = [])
 * @phpstan-method \Aws\Result getSegmentExportJobs(array{ApplicationId?: string, PageSize?: string, SegmentId?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentExportJobsAsync(array{ApplicationId?: string, PageSize?: string, SegmentId?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getSegmentImportJobs(array $args = [])
 * @phpstan-method \Aws\Result getSegmentImportJobs(array{ApplicationId?: string, PageSize?: string, SegmentId?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentImportJobsAsync(array{ApplicationId?: string, PageSize?: string, SegmentId?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getSegmentVersion(array $args = [])
 * @phpstan-method \Aws\Result getSegmentVersion(array{ApplicationId?: string, SegmentId?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentVersionAsync(array{ApplicationId?: string, SegmentId?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result getSegmentVersions(array $args = [])
 * @phpstan-method \Aws\Result getSegmentVersions(array{ApplicationId?: string, PageSize?: string, SegmentId?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentVersionsAsync(array{ApplicationId?: string, PageSize?: string, SegmentId?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getSegments(array $args = [])
 * @phpstan-method \Aws\Result getSegments(array{ApplicationId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSegmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSegmentsAsync(array{ApplicationId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result getSmsChannel(array $args = [])
 * @phpstan-method \Aws\Result getSmsChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSmsChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSmsChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getSmsTemplate(array $args = [])
 * @phpstan-method \Aws\Result getSmsTemplate(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSmsTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSmsTemplateAsync(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result getUserEndpoints(array $args = [])
 * @phpstan-method \Aws\Result getUserEndpoints(array{ApplicationId?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserEndpointsAsync(array{ApplicationId?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceChannel(array $args = [])
 * @phpstan-method \Aws\Result getVoiceChannel(array{ApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceChannelAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceTemplate(array $args = [])
 * @phpstan-method \Aws\Result getVoiceTemplate(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceTemplateAsync(array{TemplateName?: string, Version?: string, ...} $args = [])
 * @method \Aws\Result listJourneys(array $args = [])
 * @phpstan-method \Aws\Result listJourneys(array{ApplicationId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJourneysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJourneysAsync(array{ApplicationId?: string, PageSize?: string, Token?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTemplateVersions(array $args = [])
 * @phpstan-method \Aws\Result listTemplateVersions(array{NextToken?: string, PageSize?: string, TemplateName?: string, TemplateType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplateVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplateVersionsAsync(array{NextToken?: string, PageSize?: string, TemplateName?: string, TemplateType?: string, ...} $args = [])
 * @method \Aws\Result listTemplates(array $args = [])
 * @phpstan-method \Aws\Result listTemplates(array{NextToken?: string, PageSize?: string, Prefix?: string, TemplateType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplatesAsync(array{NextToken?: string, PageSize?: string, Prefix?: string, TemplateType?: string, ...} $args = [])
 * @method \Aws\Result phoneNumberValidate(array $args = [])
 * @phpstan-method \Aws\Result phoneNumberValidate(array{NumberValidateRequest?: array{IsoCountryCode?: string, PhoneNumber?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise phoneNumberValidateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise phoneNumberValidateAsync(array{NumberValidateRequest?: array{IsoCountryCode?: string, PhoneNumber?: string, ...}, ...} $args = [])
 * @method \Aws\Result putEventStream(array $args = [])
 * @phpstan-method \Aws\Result putEventStream(array{
 *     ApplicationId?: string,
 *     WriteEventStream?: array{DestinationStreamArn?: string, RoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEventStreamAsync(array{
 *     ApplicationId?: string,
 *     WriteEventStream?: array{DestinationStreamArn?: string, RoleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putEvents(array $args = [])
 * @phpstan-method \Aws\Result putEvents(array{ApplicationId?: string, EventsRequest?: array{BatchItem?: array<string, array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEventsAsync(array{ApplicationId?: string, EventsRequest?: array{BatchItem?: array<string, array>, ...}, ...} $args = [])
 * @method \Aws\Result removeAttributes(array $args = [])
 * @phpstan-method \Aws\Result removeAttributes(array{
 *     ApplicationId?: string,
 *     AttributeType?: string,
 *     UpdateAttributesRequest?: array{Blacklist?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeAttributesAsync(array{
 *     ApplicationId?: string,
 *     AttributeType?: string,
 *     UpdateAttributesRequest?: array{Blacklist?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendMessages(array $args = [])
 * @phpstan-method \Aws\Result sendMessages(array{
 *     ApplicationId?: string,
 *     MessageRequest?: array{
 *         Addresses?: array<string, array>,
 *         Context?: array<string, string>,
 *         Endpoints?: array<string, array>,
 *         MessageConfiguration?: array{
 *             ADMMessage?: array,
 *             APNSMessage?: array,
 *             BaiduMessage?: array,
 *             DefaultMessage?: array,
 *             DefaultPushNotificationMessage?: array,
 *             EmailMessage?: array,
 *             GCMMessage?: array,
 *             SMSMessage?: array,
 *             VoiceMessage?: array,
 *             ...,
 *         },
 *         TemplateConfiguration?: array{
 *             EmailTemplate?: array,
 *             PushTemplate?: array,
 *             SMSTemplate?: array,
 *             VoiceTemplate?: array,
 *             InAppTemplate?: array,
 *             ...,
 *         },
 *         TraceId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendMessagesAsync(array{
 *     ApplicationId?: string,
 *     MessageRequest?: array{
 *         Addresses?: array<string, array>,
 *         Context?: array<string, string>,
 *         Endpoints?: array<string, array>,
 *         MessageConfiguration?: array{
 *             ADMMessage?: array,
 *             APNSMessage?: array,
 *             BaiduMessage?: array,
 *             DefaultMessage?: array,
 *             DefaultPushNotificationMessage?: array,
 *             EmailMessage?: array,
 *             GCMMessage?: array,
 *             SMSMessage?: array,
 *             VoiceMessage?: array,
 *             ...,
 *         },
 *         TemplateConfiguration?: array{
 *             EmailTemplate?: array,
 *             PushTemplate?: array,
 *             SMSTemplate?: array,
 *             VoiceTemplate?: array,
 *             InAppTemplate?: array,
 *             ...,
 *         },
 *         TraceId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendOTPMessage(array $args = [])
 * @phpstan-method \Aws\Result sendOTPMessage(array{
 *     ApplicationId?: string,
 *     SendOTPMessageRequestParameters?: array{
 *         AllowedAttempts?: int,
 *         BrandName?: string,
 *         Channel?: string,
 *         CodeLength?: int,
 *         DestinationIdentity?: string,
 *         EntityId?: string,
 *         Language?: string,
 *         OriginationIdentity?: string,
 *         ReferenceId?: string,
 *         TemplateId?: string,
 *         ValidityPeriod?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendOTPMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendOTPMessageAsync(array{
 *     ApplicationId?: string,
 *     SendOTPMessageRequestParameters?: array{
 *         AllowedAttempts?: int,
 *         BrandName?: string,
 *         Channel?: string,
 *         CodeLength?: int,
 *         DestinationIdentity?: string,
 *         EntityId?: string,
 *         Language?: string,
 *         OriginationIdentity?: string,
 *         ReferenceId?: string,
 *         TemplateId?: string,
 *         ValidityPeriod?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendUsersMessages(array $args = [])
 * @phpstan-method \Aws\Result sendUsersMessages(array{
 *     ApplicationId?: string,
 *     SendUsersMessageRequest?: array{
 *         Context?: array<string, string>,
 *         MessageConfiguration?: array{
 *             ADMMessage?: array,
 *             APNSMessage?: array,
 *             BaiduMessage?: array,
 *             DefaultMessage?: array,
 *             DefaultPushNotificationMessage?: array,
 *             EmailMessage?: array,
 *             GCMMessage?: array,
 *             SMSMessage?: array,
 *             VoiceMessage?: array,
 *             ...,
 *         },
 *         TemplateConfiguration?: array{
 *             EmailTemplate?: array,
 *             PushTemplate?: array,
 *             SMSTemplate?: array,
 *             VoiceTemplate?: array,
 *             InAppTemplate?: array,
 *             ...,
 *         },
 *         TraceId?: string,
 *         Users?: array<string, array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendUsersMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendUsersMessagesAsync(array{
 *     ApplicationId?: string,
 *     SendUsersMessageRequest?: array{
 *         Context?: array<string, string>,
 *         MessageConfiguration?: array{
 *             ADMMessage?: array,
 *             APNSMessage?: array,
 *             BaiduMessage?: array,
 *             DefaultMessage?: array,
 *             DefaultPushNotificationMessage?: array,
 *             EmailMessage?: array,
 *             GCMMessage?: array,
 *             SMSMessage?: array,
 *             VoiceMessage?: array,
 *             ...,
 *         },
 *         TemplateConfiguration?: array{
 *             EmailTemplate?: array,
 *             PushTemplate?: array,
 *             SMSTemplate?: array,
 *             VoiceTemplate?: array,
 *             InAppTemplate?: array,
 *             ...,
 *         },
 *         TraceId?: string,
 *         Users?: array<string, array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, TagsModel?: array{tags?: array<string, string>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, TagsModel?: array{tags?: array<string, string>, ...}, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAdmChannel(array $args = [])
 * @phpstan-method \Aws\Result updateAdmChannel(array{
 *     ADMChannelRequest?: array{ClientId?: string, ClientSecret?: string, Enabled?: bool, ...},
 *     ApplicationId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAdmChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAdmChannelAsync(array{
 *     ADMChannelRequest?: array{ClientId?: string, ClientSecret?: string, Enabled?: bool, ...},
 *     ApplicationId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApnsChannel(array $args = [])
 * @phpstan-method \Aws\Result updateApnsChannel(array{
 *     APNSChannelRequest?: array{
 *         BundleId?: string,
 *         Certificate?: string,
 *         DefaultAuthenticationMethod?: string,
 *         Enabled?: bool,
 *         PrivateKey?: string,
 *         TeamId?: string,
 *         TokenKey?: string,
 *         TokenKeyId?: string,
 *         ...,
 *     },
 *     ApplicationId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApnsChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApnsChannelAsync(array{
 *     APNSChannelRequest?: array{
 *         BundleId?: string,
 *         Certificate?: string,
 *         DefaultAuthenticationMethod?: string,
 *         Enabled?: bool,
 *         PrivateKey?: string,
 *         TeamId?: string,
 *         TokenKey?: string,
 *         TokenKeyId?: string,
 *         ...,
 *     },
 *     ApplicationId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApnsSandboxChannel(array $args = [])
 * @phpstan-method \Aws\Result updateApnsSandboxChannel(array{
 *     APNSSandboxChannelRequest?: array{
 *         BundleId?: string,
 *         Certificate?: string,
 *         DefaultAuthenticationMethod?: string,
 *         Enabled?: bool,
 *         PrivateKey?: string,
 *         TeamId?: string,
 *         TokenKey?: string,
 *         TokenKeyId?: string,
 *         ...,
 *     },
 *     ApplicationId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApnsSandboxChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApnsSandboxChannelAsync(array{
 *     APNSSandboxChannelRequest?: array{
 *         BundleId?: string,
 *         Certificate?: string,
 *         DefaultAuthenticationMethod?: string,
 *         Enabled?: bool,
 *         PrivateKey?: string,
 *         TeamId?: string,
 *         TokenKey?: string,
 *         TokenKeyId?: string,
 *         ...,
 *     },
 *     ApplicationId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApnsVoipChannel(array $args = [])
 * @phpstan-method \Aws\Result updateApnsVoipChannel(array{
 *     APNSVoipChannelRequest?: array{
 *         BundleId?: string,
 *         Certificate?: string,
 *         DefaultAuthenticationMethod?: string,
 *         Enabled?: bool,
 *         PrivateKey?: string,
 *         TeamId?: string,
 *         TokenKey?: string,
 *         TokenKeyId?: string,
 *         ...,
 *     },
 *     ApplicationId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApnsVoipChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApnsVoipChannelAsync(array{
 *     APNSVoipChannelRequest?: array{
 *         BundleId?: string,
 *         Certificate?: string,
 *         DefaultAuthenticationMethod?: string,
 *         Enabled?: bool,
 *         PrivateKey?: string,
 *         TeamId?: string,
 *         TokenKey?: string,
 *         TokenKeyId?: string,
 *         ...,
 *     },
 *     ApplicationId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApnsVoipSandboxChannel(array $args = [])
 * @phpstan-method \Aws\Result updateApnsVoipSandboxChannel(array{
 *     APNSVoipSandboxChannelRequest?: array{
 *         BundleId?: string,
 *         Certificate?: string,
 *         DefaultAuthenticationMethod?: string,
 *         Enabled?: bool,
 *         PrivateKey?: string,
 *         TeamId?: string,
 *         TokenKey?: string,
 *         TokenKeyId?: string,
 *         ...,
 *     },
 *     ApplicationId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApnsVoipSandboxChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApnsVoipSandboxChannelAsync(array{
 *     APNSVoipSandboxChannelRequest?: array{
 *         BundleId?: string,
 *         Certificate?: string,
 *         DefaultAuthenticationMethod?: string,
 *         Enabled?: bool,
 *         PrivateKey?: string,
 *         TeamId?: string,
 *         TokenKey?: string,
 *         TokenKeyId?: string,
 *         ...,
 *     },
 *     ApplicationId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApplicationSettings(array $args = [])
 * @phpstan-method \Aws\Result updateApplicationSettings(array{
 *     ApplicationId?: string,
 *     WriteApplicationSettingsRequest?: array{
 *         CampaignHook?: array{LambdaFunctionName?: string, Mode?: 'DELIVERY'|'FILTER', WebUrl?: string, ...},
 *         CloudWatchMetricsEnabled?: bool,
 *         Limits?: array{Daily?: int, MaximumDuration?: int, MessagesPerSecond?: int, Total?: int, Session?: int, ...},
 *         QuietTime?: array{End?: string, Start?: string, ...},
 *         JourneyLimits?: array{DailyCap?: int, TimeframeCap?: array, TotalCap?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationSettingsAsync(array{
 *     ApplicationId?: string,
 *     WriteApplicationSettingsRequest?: array{
 *         CampaignHook?: array{LambdaFunctionName?: string, Mode?: 'DELIVERY'|'FILTER', WebUrl?: string, ...},
 *         CloudWatchMetricsEnabled?: bool,
 *         Limits?: array{Daily?: int, MaximumDuration?: int, MessagesPerSecond?: int, Total?: int, Session?: int, ...},
 *         QuietTime?: array{End?: string, Start?: string, ...},
 *         JourneyLimits?: array{DailyCap?: int, TimeframeCap?: array, TotalCap?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBaiduChannel(array $args = [])
 * @phpstan-method \Aws\Result updateBaiduChannel(array{
 *     ApplicationId?: string,
 *     BaiduChannelRequest?: array{ApiKey?: string, Enabled?: bool, SecretKey?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBaiduChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBaiduChannelAsync(array{
 *     ApplicationId?: string,
 *     BaiduChannelRequest?: array{ApiKey?: string, Enabled?: bool, SecretKey?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCampaign(array $args = [])
 * @phpstan-method \Aws\Result updateCampaign(array{
 *     ApplicationId?: string,
 *     CampaignId?: string,
 *     WriteCampaignRequest?: array{
 *         AdditionalTreatments?: list<array>,
 *         CustomDeliveryConfiguration?: array{
 *             DeliveryUri?: string,
 *             EndpointTypes?: list<'ADM'|'APNS'|'APNS_SANDBOX'|'APNS_VOIP'|'APNS_VOIP_SANDBOX'|'BAIDU'|'CUSTOM'|'EMAIL'|'GCM'|'IN_APP'|'PUSH'|'SMS'|'VOICE'>,
 *             ...,
 *         },
 *         Description?: string,
 *         HoldoutPercent?: int,
 *         Hook?: array{LambdaFunctionName?: string, Mode?: 'DELIVERY'|'FILTER', WebUrl?: string, ...},
 *         IsPaused?: bool,
 *         Limits?: array{Daily?: int, MaximumDuration?: int, MessagesPerSecond?: int, Total?: int, Session?: int, ...},
 *         MessageConfiguration?: array{
 *             ADMMessage?: array,
 *             APNSMessage?: array,
 *             BaiduMessage?: array,
 *             CustomMessage?: array,
 *             DefaultMessage?: array,
 *             EmailMessage?: array,
 *             GCMMessage?: array,
 *             SMSMessage?: array,
 *             InAppMessage?: array,
 *             ...,
 *         },
 *         Name?: string,
 *         Schedule?: array{
 *             EndTime?: string,
 *             EventFilter?: array,
 *             Frequency?: 'DAILY'|'EVENT'|'HOURLY'|'IN_APP_EVENT'|'MONTHLY'|'ONCE'|'WEEKLY',
 *             IsLocalTime?: bool,
 *             QuietTime?: array,
 *             StartTime?: string,
 *             Timezone?: string,
 *             ...,
 *         },
 *         SegmentId?: string,
 *         SegmentVersion?: int,
 *         tags?: array<string, string>,
 *         TemplateConfiguration?: array{
 *             EmailTemplate?: array,
 *             PushTemplate?: array,
 *             SMSTemplate?: array,
 *             VoiceTemplate?: array,
 *             InAppTemplate?: array,
 *             ...,
 *         },
 *         TreatmentDescription?: string,
 *         TreatmentName?: string,
 *         Priority?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignAsync(array{
 *     ApplicationId?: string,
 *     CampaignId?: string,
 *     WriteCampaignRequest?: array{
 *         AdditionalTreatments?: list<array>,
 *         CustomDeliveryConfiguration?: array{
 *             DeliveryUri?: string,
 *             EndpointTypes?: list<'ADM'|'APNS'|'APNS_SANDBOX'|'APNS_VOIP'|'APNS_VOIP_SANDBOX'|'BAIDU'|'CUSTOM'|'EMAIL'|'GCM'|'IN_APP'|'PUSH'|'SMS'|'VOICE'>,
 *             ...,
 *         },
 *         Description?: string,
 *         HoldoutPercent?: int,
 *         Hook?: array{LambdaFunctionName?: string, Mode?: 'DELIVERY'|'FILTER', WebUrl?: string, ...},
 *         IsPaused?: bool,
 *         Limits?: array{Daily?: int, MaximumDuration?: int, MessagesPerSecond?: int, Total?: int, Session?: int, ...},
 *         MessageConfiguration?: array{
 *             ADMMessage?: array,
 *             APNSMessage?: array,
 *             BaiduMessage?: array,
 *             CustomMessage?: array,
 *             DefaultMessage?: array,
 *             EmailMessage?: array,
 *             GCMMessage?: array,
 *             SMSMessage?: array,
 *             InAppMessage?: array,
 *             ...,
 *         },
 *         Name?: string,
 *         Schedule?: array{
 *             EndTime?: string,
 *             EventFilter?: array,
 *             Frequency?: 'DAILY'|'EVENT'|'HOURLY'|'IN_APP_EVENT'|'MONTHLY'|'ONCE'|'WEEKLY',
 *             IsLocalTime?: bool,
 *             QuietTime?: array,
 *             StartTime?: string,
 *             Timezone?: string,
 *             ...,
 *         },
 *         SegmentId?: string,
 *         SegmentVersion?: int,
 *         tags?: array<string, string>,
 *         TemplateConfiguration?: array{
 *             EmailTemplate?: array,
 *             PushTemplate?: array,
 *             SMSTemplate?: array,
 *             VoiceTemplate?: array,
 *             InAppTemplate?: array,
 *             ...,
 *         },
 *         TreatmentDescription?: string,
 *         TreatmentName?: string,
 *         Priority?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEmailChannel(array $args = [])
 * @phpstan-method \Aws\Result updateEmailChannel(array{
 *     ApplicationId?: string,
 *     EmailChannelRequest?: array{
 *         ConfigurationSet?: string,
 *         Enabled?: bool,
 *         FromAddress?: string,
 *         Identity?: string,
 *         RoleArn?: string,
 *         OrchestrationSendingRoleArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEmailChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEmailChannelAsync(array{
 *     ApplicationId?: string,
 *     EmailChannelRequest?: array{
 *         ConfigurationSet?: string,
 *         Enabled?: bool,
 *         FromAddress?: string,
 *         Identity?: string,
 *         RoleArn?: string,
 *         OrchestrationSendingRoleArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEmailTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateEmailTemplate(array{
 *     CreateNewVersion?: bool,
 *     EmailTemplateRequest?: array{
 *         DefaultSubstitutions?: string,
 *         HtmlPart?: string,
 *         RecommenderId?: string,
 *         Subject?: string,
 *         Headers?: list<array>,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         TextPart?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEmailTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEmailTemplateAsync(array{
 *     CreateNewVersion?: bool,
 *     EmailTemplateRequest?: array{
 *         DefaultSubstitutions?: string,
 *         HtmlPart?: string,
 *         RecommenderId?: string,
 *         Subject?: string,
 *         Headers?: list<array>,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         TextPart?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateUserEndpoint(array{
 *     ApplicationId?: string,
 *     EndpointId?: string,
 *     EndpointRequest?: array{
 *         Address?: string,
 *         Attributes?: array<string, list<string>>,
 *         ChannelType?: 'ADM'|'APNS'|'APNS_SANDBOX'|'APNS_VOIP'|'APNS_VOIP_SANDBOX'|'BAIDU'|'CUSTOM'|'EMAIL'|'GCM'|'IN_APP'|'PUSH'|'SMS'|'VOICE',
 *         Demographic?: array{
 *             AppVersion?: string,
 *             Locale?: string,
 *             Make?: string,
 *             Model?: string,
 *             ModelVersion?: string,
 *             Platform?: string,
 *             PlatformVersion?: string,
 *             Timezone?: string,
 *             ...,
 *         },
 *         EffectiveDate?: string,
 *         EndpointStatus?: string,
 *         Location?: array{
 *             City?: string,
 *             Country?: string,
 *             Latitude?: float,
 *             Longitude?: float,
 *             PostalCode?: string,
 *             Region?: string,
 *             ...,
 *         },
 *         Metrics?: array<string, float>,
 *         OptOut?: string,
 *         RequestId?: string,
 *         User?: array{UserAttributes?: array<string, list<string>>, UserId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserEndpointAsync(array{
 *     ApplicationId?: string,
 *     EndpointId?: string,
 *     EndpointRequest?: array{
 *         Address?: string,
 *         Attributes?: array<string, list<string>>,
 *         ChannelType?: 'ADM'|'APNS'|'APNS_SANDBOX'|'APNS_VOIP'|'APNS_VOIP_SANDBOX'|'BAIDU'|'CUSTOM'|'EMAIL'|'GCM'|'IN_APP'|'PUSH'|'SMS'|'VOICE',
 *         Demographic?: array{
 *             AppVersion?: string,
 *             Locale?: string,
 *             Make?: string,
 *             Model?: string,
 *             ModelVersion?: string,
 *             Platform?: string,
 *             PlatformVersion?: string,
 *             Timezone?: string,
 *             ...,
 *         },
 *         EffectiveDate?: string,
 *         EndpointStatus?: string,
 *         Location?: array{
 *             City?: string,
 *             Country?: string,
 *             Latitude?: float,
 *             Longitude?: float,
 *             PostalCode?: string,
 *             Region?: string,
 *             ...,
 *         },
 *         Metrics?: array<string, float>,
 *         OptOut?: string,
 *         RequestId?: string,
 *         User?: array{UserAttributes?: array<string, list<string>>, UserId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserEndpointsBatch(array $args = [])
 * @phpstan-method \Aws\Result updateUserEndpointsBatch(array{ApplicationId?: string, EndpointBatchRequest?: array{Item?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserEndpointsBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserEndpointsBatchAsync(array{ApplicationId?: string, EndpointBatchRequest?: array{Item?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result updateGcmChannel(array $args = [])
 * @phpstan-method \Aws\Result updateGcmChannel(array{
 *     ApplicationId?: string,
 *     GCMChannelRequest?: array{ApiKey?: string, DefaultAuthenticationMethod?: string, Enabled?: bool, ServiceJson?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGcmChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGcmChannelAsync(array{
 *     ApplicationId?: string,
 *     GCMChannelRequest?: array{ApiKey?: string, DefaultAuthenticationMethod?: string, Enabled?: bool, ServiceJson?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInAppTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateInAppTemplate(array{
 *     CreateNewVersion?: bool,
 *     InAppTemplateRequest?: array{
 *         Content?: list<array>,
 *         CustomConfig?: array<string, string>,
 *         Layout?: 'BOTTOM_BANNER'|'CAROUSEL'|'MIDDLE_BANNER'|'MOBILE_FEED'|'OVERLAYS'|'TOP_BANNER',
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInAppTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInAppTemplateAsync(array{
 *     CreateNewVersion?: bool,
 *     InAppTemplateRequest?: array{
 *         Content?: list<array>,
 *         CustomConfig?: array<string, string>,
 *         Layout?: 'BOTTOM_BANNER'|'CAROUSEL'|'MIDDLE_BANNER'|'MOBILE_FEED'|'OVERLAYS'|'TOP_BANNER',
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateJourney(array $args = [])
 * @phpstan-method \Aws\Result updateJourney(array{
 *     ApplicationId?: string,
 *     JourneyId?: string,
 *     WriteJourneyRequest?: array{
 *         Activities?: array<string, array>,
 *         CreationDate?: string,
 *         LastModifiedDate?: string,
 *         Limits?: array{
 *             DailyCap?: int,
 *             EndpointReentryCap?: int,
 *             MessagesPerSecond?: int,
 *             EndpointReentryInterval?: string,
 *             TimeframeCap?: array,
 *             TotalCap?: int,
 *             ...,
 *         },
 *         LocalTime?: bool,
 *         Name?: string,
 *         QuietTime?: array{End?: string, Start?: string, ...},
 *         RefreshFrequency?: string,
 *         Schedule?: array{
 *             EndTime?: int|string|\DateTimeInterface,
 *             StartTime?: int|string|\DateTimeInterface,
 *             Timezone?: string,
 *             ...,
 *         },
 *         StartActivity?: string,
 *         StartCondition?: array{Description?: string, EventStartCondition?: array, SegmentStartCondition?: array, ...},
 *         State?: 'ACTIVE'|'CANCELLED'|'CLOSED'|'COMPLETED'|'DRAFT'|'PAUSED',
 *         WaitForQuietTime?: bool,
 *         RefreshOnSegmentUpdate?: bool,
 *         JourneyChannelSettings?: array{ConnectCampaignArn?: string, ConnectCampaignExecutionRoleArn?: string, ...},
 *         SendingSchedule?: bool,
 *         OpenHours?: array{
 *             EMAIL?: array<string, list<array>>,
 *             SMS?: array<string, list<array>>,
 *             PUSH?: array<string, list<array>>,
 *             VOICE?: array<string, list<array>>,
 *             CUSTOM?: array<string, list<array>>,
 *             ...,
 *         },
 *         ClosedDays?: array{
 *             EMAIL?: list<array>,
 *             SMS?: list<array>,
 *             PUSH?: list<array>,
 *             VOICE?: list<array>,
 *             CUSTOM?: list<array>,
 *             ...,
 *         },
 *         TimezoneEstimationMethods?: list<'PHONE_NUMBER'|'POSTAL_CODE'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJourneyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJourneyAsync(array{
 *     ApplicationId?: string,
 *     JourneyId?: string,
 *     WriteJourneyRequest?: array{
 *         Activities?: array<string, array>,
 *         CreationDate?: string,
 *         LastModifiedDate?: string,
 *         Limits?: array{
 *             DailyCap?: int,
 *             EndpointReentryCap?: int,
 *             MessagesPerSecond?: int,
 *             EndpointReentryInterval?: string,
 *             TimeframeCap?: array,
 *             TotalCap?: int,
 *             ...,
 *         },
 *         LocalTime?: bool,
 *         Name?: string,
 *         QuietTime?: array{End?: string, Start?: string, ...},
 *         RefreshFrequency?: string,
 *         Schedule?: array{
 *             EndTime?: int|string|\DateTimeInterface,
 *             StartTime?: int|string|\DateTimeInterface,
 *             Timezone?: string,
 *             ...,
 *         },
 *         StartActivity?: string,
 *         StartCondition?: array{Description?: string, EventStartCondition?: array, SegmentStartCondition?: array, ...},
 *         State?: 'ACTIVE'|'CANCELLED'|'CLOSED'|'COMPLETED'|'DRAFT'|'PAUSED',
 *         WaitForQuietTime?: bool,
 *         RefreshOnSegmentUpdate?: bool,
 *         JourneyChannelSettings?: array{ConnectCampaignArn?: string, ConnectCampaignExecutionRoleArn?: string, ...},
 *         SendingSchedule?: bool,
 *         OpenHours?: array{
 *             EMAIL?: array<string, list<array>>,
 *             SMS?: array<string, list<array>>,
 *             PUSH?: array<string, list<array>>,
 *             VOICE?: array<string, list<array>>,
 *             CUSTOM?: array<string, list<array>>,
 *             ...,
 *         },
 *         ClosedDays?: array{
 *             EMAIL?: list<array>,
 *             SMS?: list<array>,
 *             PUSH?: list<array>,
 *             VOICE?: list<array>,
 *             CUSTOM?: list<array>,
 *             ...,
 *         },
 *         TimezoneEstimationMethods?: list<'PHONE_NUMBER'|'POSTAL_CODE'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateJourneyState(array $args = [])
 * @phpstan-method \Aws\Result updateJourneyState(array{
 *     ApplicationId?: string,
 *     JourneyId?: string,
 *     JourneyStateRequest?: array{State?: 'ACTIVE'|'CANCELLED'|'CLOSED'|'COMPLETED'|'DRAFT'|'PAUSED', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJourneyStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJourneyStateAsync(array{
 *     ApplicationId?: string,
 *     JourneyId?: string,
 *     JourneyStateRequest?: array{State?: 'ACTIVE'|'CANCELLED'|'CLOSED'|'COMPLETED'|'DRAFT'|'PAUSED', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePushTemplate(array $args = [])
 * @phpstan-method \Aws\Result updatePushTemplate(array{
 *     CreateNewVersion?: bool,
 *     PushNotificationTemplateRequest?: array{
 *         ADM?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         APNS?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             MediaUrl?: string,
 *             RawContent?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         Baidu?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         Default?: array{Action?: 'DEEP_LINK'|'OPEN_APP'|'URL', Body?: string, Sound?: string, Title?: string, Url?: string, ...},
 *         DefaultSubstitutions?: string,
 *         GCM?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         RecommenderId?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePushTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePushTemplateAsync(array{
 *     CreateNewVersion?: bool,
 *     PushNotificationTemplateRequest?: array{
 *         ADM?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         APNS?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             MediaUrl?: string,
 *             RawContent?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         Baidu?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         Default?: array{Action?: 'DEEP_LINK'|'OPEN_APP'|'URL', Body?: string, Sound?: string, Title?: string, Url?: string, ...},
 *         DefaultSubstitutions?: string,
 *         GCM?: array{
 *             Action?: 'DEEP_LINK'|'OPEN_APP'|'URL',
 *             Body?: string,
 *             ImageIconUrl?: string,
 *             ImageUrl?: string,
 *             RawContent?: string,
 *             SmallImageIconUrl?: string,
 *             Sound?: string,
 *             Title?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         RecommenderId?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRecommenderConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateRecommenderConfiguration(array{
 *     RecommenderId?: string,
 *     UpdateRecommenderConfiguration?: array{
 *         Attributes?: array<string, string>,
 *         Description?: string,
 *         Name?: string,
 *         RecommendationProviderIdType?: string,
 *         RecommendationProviderRoleArn?: string,
 *         RecommendationProviderUri?: string,
 *         RecommendationTransformerUri?: string,
 *         RecommendationsDisplayName?: string,
 *         RecommendationsPerMessage?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRecommenderConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecommenderConfigurationAsync(array{
 *     RecommenderId?: string,
 *     UpdateRecommenderConfiguration?: array{
 *         Attributes?: array<string, string>,
 *         Description?: string,
 *         Name?: string,
 *         RecommendationProviderIdType?: string,
 *         RecommendationProviderRoleArn?: string,
 *         RecommendationProviderUri?: string,
 *         RecommendationTransformerUri?: string,
 *         RecommendationsDisplayName?: string,
 *         RecommendationsPerMessage?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSegment(array $args = [])
 * @phpstan-method \Aws\Result updateSegment(array{
 *     ApplicationId?: string,
 *     SegmentId?: string,
 *     WriteSegmentRequest?: array{
 *         Dimensions?: array{
 *             Attributes?: array<string, array>,
 *             Behavior?: array,
 *             Demographic?: array,
 *             Location?: array,
 *             Metrics?: array<string, array>,
 *             UserAttributes?: array<string, array>,
 *             ...,
 *         },
 *         Name?: string,
 *         SegmentGroups?: array{Groups?: list<array>, Include?: 'ALL'|'ANY'|'NONE', ...},
 *         tags?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSegmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSegmentAsync(array{
 *     ApplicationId?: string,
 *     SegmentId?: string,
 *     WriteSegmentRequest?: array{
 *         Dimensions?: array{
 *             Attributes?: array<string, array>,
 *             Behavior?: array,
 *             Demographic?: array,
 *             Location?: array,
 *             Metrics?: array<string, array>,
 *             UserAttributes?: array<string, array>,
 *             ...,
 *         },
 *         Name?: string,
 *         SegmentGroups?: array{Groups?: list<array>, Include?: 'ALL'|'ANY'|'NONE', ...},
 *         tags?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSmsChannel(array $args = [])
 * @phpstan-method \Aws\Result updateSmsChannel(array{
 *     ApplicationId?: string,
 *     SMSChannelRequest?: array{Enabled?: bool, SenderId?: string, ShortCode?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSmsChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSmsChannelAsync(array{
 *     ApplicationId?: string,
 *     SMSChannelRequest?: array{Enabled?: bool, SenderId?: string, ShortCode?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSmsTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateSmsTemplate(array{
 *     CreateNewVersion?: bool,
 *     SMSTemplateRequest?: array{
 *         Body?: string,
 *         DefaultSubstitutions?: string,
 *         RecommenderId?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSmsTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSmsTemplateAsync(array{
 *     CreateNewVersion?: bool,
 *     SMSTemplateRequest?: array{
 *         Body?: string,
 *         DefaultSubstitutions?: string,
 *         RecommenderId?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         ...,
 *     },
 *     TemplateName?: string,
 *     Version?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTemplateActiveVersion(array $args = [])
 * @phpstan-method \Aws\Result updateTemplateActiveVersion(array{
 *     TemplateActiveVersionRequest?: array{Version?: string, ...},
 *     TemplateName?: string,
 *     TemplateType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateActiveVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplateActiveVersionAsync(array{
 *     TemplateActiveVersionRequest?: array{Version?: string, ...},
 *     TemplateName?: string,
 *     TemplateType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVoiceChannel(array $args = [])
 * @phpstan-method \Aws\Result updateVoiceChannel(array{ApplicationId?: string, VoiceChannelRequest?: array{Enabled?: bool, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVoiceChannelAsync(array{ApplicationId?: string, VoiceChannelRequest?: array{Enabled?: bool, ...}, ...} $args = [])
 * @method \Aws\Result updateVoiceTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateVoiceTemplate(array{
 *     CreateNewVersion?: bool,
 *     TemplateName?: string,
 *     Version?: string,
 *     VoiceTemplateRequest?: array{
 *         Body?: string,
 *         DefaultSubstitutions?: string,
 *         LanguageCode?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         VoiceId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVoiceTemplateAsync(array{
 *     CreateNewVersion?: bool,
 *     TemplateName?: string,
 *     Version?: string,
 *     VoiceTemplateRequest?: array{
 *         Body?: string,
 *         DefaultSubstitutions?: string,
 *         LanguageCode?: string,
 *         tags?: array<string, string>,
 *         TemplateDescription?: string,
 *         VoiceId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyOTPMessage(array $args = [])
 * @phpstan-method \Aws\Result verifyOTPMessage(array{
 *     ApplicationId?: string,
 *     VerifyOTPMessageRequestParameters?: array{DestinationIdentity?: string, Otp?: string, ReferenceId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyOTPMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyOTPMessageAsync(array{
 *     ApplicationId?: string,
 *     VerifyOTPMessageRequestParameters?: array{DestinationIdentity?: string, Otp?: string, ReferenceId?: string, ...},
 *     ...,
 * } $args = [])
 */
class PinpointClient extends AwsClient {}