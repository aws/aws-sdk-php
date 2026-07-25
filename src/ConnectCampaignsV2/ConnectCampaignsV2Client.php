<?php
namespace Aws\ConnectCampaignsV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonConnectCampaignServiceV2** service.
 * @method \Aws\Result createCampaign(array $args = [])
 * @phpstan-method \Aws\Result createCampaign(array{
 *     name?: string,
 *     connectInstanceId?: string,
 *     channelSubtypeConfig?: array{
 *         telephony?: array{capacity?: float, connectQueueId?: string, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         sms?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         email?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         whatsApp?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         ...,
 *     },
 *     type?: 'JOURNEY'|'MANAGED',
 *     source?: array{customerProfilesSegmentArn?: string, eventTrigger?: array{customerProfilesDomainArn?: string, ...}, ...},
 *     connectCampaignFlowArn?: string,
 *     schedule?: array{
 *         startTime?: int|string|\DateTimeInterface,
 *         endTime?: int|string|\DateTimeInterface,
 *         refreshFrequency?: string,
 *         ...,
 *     },
 *     entryLimitsConfig?: array{maxEntryCount?: int, minEntryInterval?: string, ...},
 *     communicationTimeConfig?: array{
 *         localTimeZoneConfig?: array{
 *             defaultTimeZone?: string,
 *             localTimeZoneDetection?: list<'AREA_CODE'|'ZIP_CODE'>,
 *             localTimeZoneDetectionScope?: 'ALL_AVAILABLE'|'PRIMARY_ONLY',
 *             ...,
 *         },
 *         telephony?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         sms?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         email?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         whatsApp?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         ...,
 *     },
 *     communicationLimitsOverride?: array{
 *         allChannelSubtypes?: array{communicationLimitsList?: list<array>, ...},
 *         instanceLimitsHandling?: 'OPT_IN'|'OPT_OUT',
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCampaignAsync(array{
 *     name?: string,
 *     connectInstanceId?: string,
 *     channelSubtypeConfig?: array{
 *         telephony?: array{capacity?: float, connectQueueId?: string, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         sms?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         email?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         whatsApp?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         ...,
 *     },
 *     type?: 'JOURNEY'|'MANAGED',
 *     source?: array{customerProfilesSegmentArn?: string, eventTrigger?: array{customerProfilesDomainArn?: string, ...}, ...},
 *     connectCampaignFlowArn?: string,
 *     schedule?: array{
 *         startTime?: int|string|\DateTimeInterface,
 *         endTime?: int|string|\DateTimeInterface,
 *         refreshFrequency?: string,
 *         ...,
 *     },
 *     entryLimitsConfig?: array{maxEntryCount?: int, minEntryInterval?: string, ...},
 *     communicationTimeConfig?: array{
 *         localTimeZoneConfig?: array{
 *             defaultTimeZone?: string,
 *             localTimeZoneDetection?: list<'AREA_CODE'|'ZIP_CODE'>,
 *             localTimeZoneDetectionScope?: 'ALL_AVAILABLE'|'PRIMARY_ONLY',
 *             ...,
 *         },
 *         telephony?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         sms?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         email?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         whatsApp?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         ...,
 *     },
 *     communicationLimitsOverride?: array{
 *         allChannelSubtypes?: array{communicationLimitsList?: list<array>, ...},
 *         instanceLimitsHandling?: 'OPT_IN'|'OPT_OUT',
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCampaign(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaign(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteCampaignChannelSubtypeConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaignChannelSubtypeConfig(array{id?: string, channelSubtype?: 'EMAIL'|'SMS'|'TELEPHONY'|'WHATSAPP', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCampaignChannelSubtypeConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignChannelSubtypeConfigAsync(array{id?: string, channelSubtype?: 'EMAIL'|'SMS'|'TELEPHONY'|'WHATSAPP', ...} $args = [])
 * @method \Aws\Result deleteCampaignCommunicationLimits(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaignCommunicationLimits(array{id?: string, config?: 'ALL_CHANNEL_SUBTYPES', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCampaignCommunicationLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignCommunicationLimitsAsync(array{id?: string, config?: 'ALL_CHANNEL_SUBTYPES', ...} $args = [])
 * @method \Aws\Result deleteCampaignCommunicationTime(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaignCommunicationTime(array{id?: string, config?: 'EMAIL'|'SMS'|'TELEPHONY'|'WHATSAPP', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCampaignCommunicationTimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignCommunicationTimeAsync(array{id?: string, config?: 'EMAIL'|'SMS'|'TELEPHONY'|'WHATSAPP', ...} $args = [])
 * @method \Aws\Result deleteCampaignEntryLimits(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaignEntryLimits(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCampaignEntryLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignEntryLimitsAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteConnectInstanceConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectInstanceConfig(array{connectInstanceId?: string, campaignDeletionPolicy?: 'DELETE_ALL'|'RETAIN_ALL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectInstanceConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectInstanceConfigAsync(array{connectInstanceId?: string, campaignDeletionPolicy?: 'DELETE_ALL'|'RETAIN_ALL', ...} $args = [])
 * @method \Aws\Result deleteConnectInstanceIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectInstanceIntegration(array{
 *     connectInstanceId?: string,
 *     integrationIdentifier?: array{
 *         customerProfiles?: array{domainArn?: string, ...},
 *         qConnect?: array{knowledgeBaseArn?: string, ...},
 *         lambda?: array{functionArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectInstanceIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectInstanceIntegrationAsync(array{
 *     connectInstanceId?: string,
 *     integrationIdentifier?: array{
 *         customerProfiles?: array{domainArn?: string, ...},
 *         qConnect?: array{knowledgeBaseArn?: string, ...},
 *         lambda?: array{functionArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteInstanceOnboardingJob(array $args = [])
 * @phpstan-method \Aws\Result deleteInstanceOnboardingJob(array{connectInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceOnboardingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceOnboardingJobAsync(array{connectInstanceId?: string, ...} $args = [])
 * @method \Aws\Result describeCampaign(array $args = [])
 * @phpstan-method \Aws\Result describeCampaign(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCampaignAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getCampaignState(array $args = [])
 * @phpstan-method \Aws\Result getCampaignState(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignStateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getCampaignStateBatch(array $args = [])
 * @phpstan-method \Aws\Result getCampaignStateBatch(array{campaignIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignStateBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignStateBatchAsync(array{campaignIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getConnectInstanceConfig(array $args = [])
 * @phpstan-method \Aws\Result getConnectInstanceConfig(array{connectInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectInstanceConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectInstanceConfigAsync(array{connectInstanceId?: string, ...} $args = [])
 * @method \Aws\Result getInstanceCommunicationLimits(array $args = [])
 * @phpstan-method \Aws\Result getInstanceCommunicationLimits(array{connectInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceCommunicationLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceCommunicationLimitsAsync(array{connectInstanceId?: string, ...} $args = [])
 * @method \Aws\Result getInstanceOnboardingJobStatus(array $args = [])
 * @phpstan-method \Aws\Result getInstanceOnboardingJobStatus(array{connectInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceOnboardingJobStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceOnboardingJobStatusAsync(array{connectInstanceId?: string, ...} $args = [])
 * @method \Aws\Result listCampaigns(array $args = [])
 * @phpstan-method \Aws\Result listCampaigns(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: array{instanceIdFilter?: array{value?: string, operator?: 'Eq', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCampaignsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCampaignsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: array{instanceIdFilter?: array{value?: string, operator?: 'Eq', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listConnectInstanceIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listConnectInstanceIntegrations(array{connectInstanceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectInstanceIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectInstanceIntegrationsAsync(array{connectInstanceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result pauseCampaign(array $args = [])
 * @phpstan-method \Aws\Result pauseCampaign(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise pauseCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pauseCampaignAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result putConnectInstanceIntegration(array $args = [])
 * @phpstan-method \Aws\Result putConnectInstanceIntegration(array{
 *     connectInstanceId?: string,
 *     integrationConfig?: array{
 *         customerProfiles?: array{domainArn?: string, objectTypeNames?: array<string, string>, ...},
 *         qConnect?: array{knowledgeBaseArn?: string, ...},
 *         lambda?: array{functionArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putConnectInstanceIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConnectInstanceIntegrationAsync(array{
 *     connectInstanceId?: string,
 *     integrationConfig?: array{
 *         customerProfiles?: array{domainArn?: string, objectTypeNames?: array<string, string>, ...},
 *         qConnect?: array{knowledgeBaseArn?: string, ...},
 *         lambda?: array{functionArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putInstanceCommunicationLimits(array $args = [])
 * @phpstan-method \Aws\Result putInstanceCommunicationLimits(array{
 *     connectInstanceId?: string,
 *     communicationLimitsConfig?: array{allChannelSubtypes?: array{communicationLimitsList?: list<array>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putInstanceCommunicationLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putInstanceCommunicationLimitsAsync(array{
 *     connectInstanceId?: string,
 *     communicationLimitsConfig?: array{allChannelSubtypes?: array{communicationLimitsList?: list<array>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putOutboundRequestBatch(array $args = [])
 * @phpstan-method \Aws\Result putOutboundRequestBatch(array{
 *     id?: string,
 *     outboundRequests?: list<array{
 *         clientToken?: string,
 *         expirationTime?: int|string|\DateTimeInterface,
 *         channelSubtypeParameters?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putOutboundRequestBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putOutboundRequestBatchAsync(array{
 *     id?: string,
 *     outboundRequests?: list<array{
 *         clientToken?: string,
 *         expirationTime?: int|string|\DateTimeInterface,
 *         channelSubtypeParameters?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putProfileOutboundRequestBatch(array $args = [])
 * @phpstan-method \Aws\Result putProfileOutboundRequestBatch(array{
 *     id?: string,
 *     profileOutboundRequests?: list<array{
 *         clientToken?: string,
 *         profileId?: string,
 *         expirationTime?: int|string|\DateTimeInterface,
 *         eventTriggerContext?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putProfileOutboundRequestBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putProfileOutboundRequestBatchAsync(array{
 *     id?: string,
 *     profileOutboundRequests?: list<array{
 *         clientToken?: string,
 *         profileId?: string,
 *         expirationTime?: int|string|\DateTimeInterface,
 *         eventTriggerContext?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result resumeCampaign(array $args = [])
 * @phpstan-method \Aws\Result resumeCampaign(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeCampaignAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result startCampaign(array $args = [])
 * @phpstan-method \Aws\Result startCampaign(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCampaignAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result startInstanceOnboardingJob(array $args = [])
 * @phpstan-method \Aws\Result startInstanceOnboardingJob(array{
 *     connectInstanceId?: string,
 *     encryptionConfig?: array{enabled?: bool, encryptionType?: 'KMS', keyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startInstanceOnboardingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startInstanceOnboardingJobAsync(array{
 *     connectInstanceId?: string,
 *     encryptionConfig?: array{enabled?: bool, encryptionType?: 'KMS', keyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopCampaign(array $args = [])
 * @phpstan-method \Aws\Result stopCampaign(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCampaignAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCampaignChannelSubtypeConfig(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignChannelSubtypeConfig(array{
 *     id?: string,
 *     channelSubtypeConfig?: array{
 *         telephony?: array{capacity?: float, connectQueueId?: string, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         sms?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         email?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         whatsApp?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignChannelSubtypeConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignChannelSubtypeConfigAsync(array{
 *     id?: string,
 *     channelSubtypeConfig?: array{
 *         telephony?: array{capacity?: float, connectQueueId?: string, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         sms?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         email?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         whatsApp?: array{capacity?: float, outboundMode?: array, defaultOutboundConfig?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCampaignCommunicationLimits(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignCommunicationLimits(array{
 *     id?: string,
 *     communicationLimitsOverride?: array{
 *         allChannelSubtypes?: array{communicationLimitsList?: list<array>, ...},
 *         instanceLimitsHandling?: 'OPT_IN'|'OPT_OUT',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignCommunicationLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignCommunicationLimitsAsync(array{
 *     id?: string,
 *     communicationLimitsOverride?: array{
 *         allChannelSubtypes?: array{communicationLimitsList?: list<array>, ...},
 *         instanceLimitsHandling?: 'OPT_IN'|'OPT_OUT',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCampaignCommunicationTime(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignCommunicationTime(array{
 *     id?: string,
 *     communicationTimeConfig?: array{
 *         localTimeZoneConfig?: array{
 *             defaultTimeZone?: string,
 *             localTimeZoneDetection?: list<'AREA_CODE'|'ZIP_CODE'>,
 *             localTimeZoneDetectionScope?: 'ALL_AVAILABLE'|'PRIMARY_ONLY',
 *             ...,
 *         },
 *         telephony?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         sms?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         email?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         whatsApp?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignCommunicationTimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignCommunicationTimeAsync(array{
 *     id?: string,
 *     communicationTimeConfig?: array{
 *         localTimeZoneConfig?: array{
 *             defaultTimeZone?: string,
 *             localTimeZoneDetection?: list<'AREA_CODE'|'ZIP_CODE'>,
 *             localTimeZoneDetectionScope?: 'ALL_AVAILABLE'|'PRIMARY_ONLY',
 *             ...,
 *         },
 *         telephony?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         sms?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         email?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         whatsApp?: array{openHours?: array, restrictedPeriods?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCampaignEntryLimits(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignEntryLimits(array{id?: string, entryLimitsConfig?: array{maxEntryCount?: int, minEntryInterval?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignEntryLimitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignEntryLimitsAsync(array{id?: string, entryLimitsConfig?: array{maxEntryCount?: int, minEntryInterval?: string, ...}, ...} $args = [])
 * @method \Aws\Result updateCampaignFlowAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignFlowAssociation(array{id?: string, connectCampaignFlowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignFlowAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignFlowAssociationAsync(array{id?: string, connectCampaignFlowArn?: string, ...} $args = [])
 * @method \Aws\Result updateCampaignName(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignName(array{id?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignNameAsync(array{id?: string, name?: string, ...} $args = [])
 * @method \Aws\Result updateCampaignSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignSchedule(array{
 *     id?: string,
 *     schedule?: array{
 *         startTime?: int|string|\DateTimeInterface,
 *         endTime?: int|string|\DateTimeInterface,
 *         refreshFrequency?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignScheduleAsync(array{
 *     id?: string,
 *     schedule?: array{
 *         startTime?: int|string|\DateTimeInterface,
 *         endTime?: int|string|\DateTimeInterface,
 *         refreshFrequency?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCampaignSource(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignSource(array{
 *     id?: string,
 *     source?: array{customerProfilesSegmentArn?: string, eventTrigger?: array{customerProfilesDomainArn?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignSourceAsync(array{
 *     id?: string,
 *     source?: array{customerProfilesSegmentArn?: string, eventTrigger?: array{customerProfilesDomainArn?: string, ...}, ...},
 *     ...,
 * } $args = [])
 */
class ConnectCampaignsV2Client extends AwsClient {}
