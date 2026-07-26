<?php
namespace Aws\PinpointSMSVoice;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Pinpoint SMS and Voice Service** service.
 * @method \Aws\Result createConfigurationSet(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationSet(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result createConfigurationSetEventDestination(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationSetEventDestination(array{
 *     ConfigurationSetName?: string,
 *     EventDestination?: array{
 *         CloudWatchLogsDestination?: array{IamRoleArn?: string, LogGroupArn?: string, ...},
 *         Enabled?: bool,
 *         KinesisFirehoseDestination?: array{DeliveryStreamArn?: string, IamRoleArn?: string, ...},
 *         MatchingEventTypes?: list<'ANSWERED'|'BUSY'|'COMPLETED_CALL'|'FAILED'|'INITIATED_CALL'|'NO_ANSWER'|'RINGING'>,
 *         SnsDestination?: array{TopicArn?: string, ...},
 *         ...,
 *     },
 *     EventDestinationName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationSetEventDestinationAsync(array{
 *     ConfigurationSetName?: string,
 *     EventDestination?: array{
 *         CloudWatchLogsDestination?: array{IamRoleArn?: string, LogGroupArn?: string, ...},
 *         Enabled?: bool,
 *         KinesisFirehoseDestination?: array{DeliveryStreamArn?: string, IamRoleArn?: string, ...},
 *         MatchingEventTypes?: list<'ANSWERED'|'BUSY'|'COMPLETED_CALL'|'FAILED'|'INITIATED_CALL'|'NO_ANSWER'|'RINGING'>,
 *         SnsDestination?: array{TopicArn?: string, ...},
 *         ...,
 *     },
 *     EventDestinationName?: string,
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
 * @method \Aws\Result getConfigurationSetEventDestinations(array $args = [])
 * @phpstan-method \Aws\Result getConfigurationSetEventDestinations(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationSetEventDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationSetEventDestinationsAsync(array{ConfigurationSetName?: string, ...} $args = [])
 * @method \Aws\Result listConfigurationSets(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationSets(array{NextToken?: string, PageSize?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array{NextToken?: string, PageSize?: string, ...} $args = [])
 * @method \Aws\Result sendVoiceMessage(array $args = [])
 * @phpstan-method \Aws\Result sendVoiceMessage(array{
 *     CallerId?: string,
 *     ConfigurationSetName?: string,
 *     Content?: array{
 *         CallInstructionsMessage?: array{Text?: string, ...},
 *         PlainTextMessage?: array{LanguageCode?: string, Text?: string, VoiceId?: string, ...},
 *         SSMLMessage?: array{LanguageCode?: string, Text?: string, VoiceId?: string, ...},
 *         ...,
 *     },
 *     DestinationPhoneNumber?: string,
 *     OriginationPhoneNumber?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendVoiceMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendVoiceMessageAsync(array{
 *     CallerId?: string,
 *     ConfigurationSetName?: string,
 *     Content?: array{
 *         CallInstructionsMessage?: array{Text?: string, ...},
 *         PlainTextMessage?: array{LanguageCode?: string, Text?: string, VoiceId?: string, ...},
 *         SSMLMessage?: array{LanguageCode?: string, Text?: string, VoiceId?: string, ...},
 *         ...,
 *     },
 *     DestinationPhoneNumber?: string,
 *     OriginationPhoneNumber?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfigurationSetEventDestination(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationSetEventDestination(array{
 *     ConfigurationSetName?: string,
 *     EventDestination?: array{
 *         CloudWatchLogsDestination?: array{IamRoleArn?: string, LogGroupArn?: string, ...},
 *         Enabled?: bool,
 *         KinesisFirehoseDestination?: array{DeliveryStreamArn?: string, IamRoleArn?: string, ...},
 *         MatchingEventTypes?: list<'ANSWERED'|'BUSY'|'COMPLETED_CALL'|'FAILED'|'INITIATED_CALL'|'NO_ANSWER'|'RINGING'>,
 *         SnsDestination?: array{TopicArn?: string, ...},
 *         ...,
 *     },
 *     EventDestinationName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationSetEventDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationSetEventDestinationAsync(array{
 *     ConfigurationSetName?: string,
 *     EventDestination?: array{
 *         CloudWatchLogsDestination?: array{IamRoleArn?: string, LogGroupArn?: string, ...},
 *         Enabled?: bool,
 *         KinesisFirehoseDestination?: array{DeliveryStreamArn?: string, IamRoleArn?: string, ...},
 *         MatchingEventTypes?: list<'ANSWERED'|'BUSY'|'COMPLETED_CALL'|'FAILED'|'INITIATED_CALL'|'NO_ANSWER'|'RINGING'>,
 *         SnsDestination?: array{TopicArn?: string, ...},
 *         ...,
 *     },
 *     EventDestinationName?: string,
 *     ...,
 * } $args = [])
 */
class PinpointSMSVoiceClient extends AwsClient {}
