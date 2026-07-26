<?php
namespace Aws\ConnectCampaignService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonConnectCampaignService** service.
 * @method \Aws\Result createCampaign(array $args = [])
 * @phpstan-method \Aws\Result createCampaign(array{
 *     name?: string,
 *     connectInstanceId?: string,
 *     dialerConfig?: array{
 *         progressiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         predictiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         agentlessDialerConfig?: array{dialingCapacity?: float, ...},
 *         ...,
 *     },
 *     outboundCallConfig?: array{
 *         connectContactFlowId?: string,
 *         connectSourcePhoneNumber?: string,
 *         connectQueueId?: string,
 *         answerMachineDetectionConfig?: array{enableAnswerMachineDetection?: bool, awaitAnswerMachinePrompt?: bool, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCampaignAsync(array{
 *     name?: string,
 *     connectInstanceId?: string,
 *     dialerConfig?: array{
 *         progressiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         predictiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         agentlessDialerConfig?: array{dialingCapacity?: float, ...},
 *         ...,
 *     },
 *     outboundCallConfig?: array{
 *         connectContactFlowId?: string,
 *         connectSourcePhoneNumber?: string,
 *         connectQueueId?: string,
 *         answerMachineDetectionConfig?: array{enableAnswerMachineDetection?: bool, awaitAnswerMachinePrompt?: bool, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCampaign(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaign(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteConnectInstanceConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectInstanceConfig(array{connectInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectInstanceConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectInstanceConfigAsync(array{connectInstanceId?: string, ...} $args = [])
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
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result pauseCampaign(array $args = [])
 * @phpstan-method \Aws\Result pauseCampaign(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise pauseCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pauseCampaignAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result putDialRequestBatch(array $args = [])
 * @phpstan-method \Aws\Result putDialRequestBatch(array{
 *     id?: string,
 *     dialRequests?: list<array{
 *         clientToken?: string,
 *         phoneNumber?: string,
 *         expirationTime?: int|string|\DateTimeInterface,
 *         attributes?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDialRequestBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDialRequestBatchAsync(array{
 *     id?: string,
 *     dialRequests?: list<array{
 *         clientToken?: string,
 *         phoneNumber?: string,
 *         expirationTime?: int|string|\DateTimeInterface,
 *         attributes?: array<string, string>,
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
 * @method \Aws\Result updateCampaignDialerConfig(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignDialerConfig(array{
 *     id?: string,
 *     dialerConfig?: array{
 *         progressiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         predictiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         agentlessDialerConfig?: array{dialingCapacity?: float, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignDialerConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignDialerConfigAsync(array{
 *     id?: string,
 *     dialerConfig?: array{
 *         progressiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         predictiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         agentlessDialerConfig?: array{dialingCapacity?: float, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCampaignName(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignName(array{id?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignNameAsync(array{id?: string, name?: string, ...} $args = [])
 * @method \Aws\Result updateCampaignOutboundCallConfig(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignOutboundCallConfig(array{
 *     id?: string,
 *     connectContactFlowId?: string,
 *     connectSourcePhoneNumber?: string,
 *     answerMachineDetectionConfig?: array{enableAnswerMachineDetection?: bool, awaitAnswerMachinePrompt?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignOutboundCallConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignOutboundCallConfigAsync(array{
 *     id?: string,
 *     connectContactFlowId?: string,
 *     connectSourcePhoneNumber?: string,
 *     answerMachineDetectionConfig?: array{enableAnswerMachineDetection?: bool, awaitAnswerMachinePrompt?: bool, ...},
 *     ...,
 * } $args = [])
 */
class ConnectCampaignServiceClient extends AwsClient {}
