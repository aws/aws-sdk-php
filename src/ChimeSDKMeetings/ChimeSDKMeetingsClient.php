<?php
namespace Aws\ChimeSDKMeetings;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime SDK Meetings** service.
 * @method \Aws\Result batchCreateAttendee(array $args = [])
 * @phpstan-method \Aws\Result batchCreateAttendee(array{MeetingId?: string, Attendees?: list<array{ExternalUserId?: string, Capabilities?: array, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateAttendeeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateAttendeeAsync(array{MeetingId?: string, Attendees?: list<array{ExternalUserId?: string, Capabilities?: array, ...}>, ...} $args = [])
 * @method \Aws\Result batchUpdateAttendeeCapabilitiesExcept(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateAttendeeCapabilitiesExcept(array{
 *     MeetingId?: string,
 *     ExcludedAttendeeIds?: list<array{AttendeeId?: string, ...}>,
 *     Capabilities?: array{
 *         Audio?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Video?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Content?: 'None'|'Receive'|'Send'|'SendReceive',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateAttendeeCapabilitiesExceptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateAttendeeCapabilitiesExceptAsync(array{
 *     MeetingId?: string,
 *     ExcludedAttendeeIds?: list<array{AttendeeId?: string, ...}>,
 *     Capabilities?: array{
 *         Audio?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Video?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Content?: 'None'|'Receive'|'Send'|'SendReceive',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAttendee(array $args = [])
 * @phpstan-method \Aws\Result createAttendee(array{
 *     MeetingId?: string,
 *     ExternalUserId?: string,
 *     Capabilities?: array{
 *         Audio?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Video?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Content?: 'None'|'Receive'|'Send'|'SendReceive',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAttendeeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAttendeeAsync(array{
 *     MeetingId?: string,
 *     ExternalUserId?: string,
 *     Capabilities?: array{
 *         Audio?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Video?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Content?: 'None'|'Receive'|'Send'|'SendReceive',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMeeting(array $args = [])
 * @phpstan-method \Aws\Result createMeeting(array{
 *     ClientRequestToken?: string,
 *     MediaRegion?: string,
 *     MeetingHostId?: string,
 *     ExternalMeetingId?: string,
 *     NotificationsConfiguration?: array{LambdaFunctionArn?: string, SnsTopicArn?: string, SqsQueueArn?: string, ...},
 *     MeetingFeatures?: array{
 *         Audio?: array{EchoReduction?: 'AVAILABLE'|'UNAVAILABLE', ...},
 *         Video?: array{MaxResolution?: 'FHD'|'HD'|'None', ...},
 *         Content?: array{MaxResolution?: 'FHD'|'None'|'UHD', ...},
 *         Attendee?: array{MaxCount?: int, ...},
 *         ...,
 *     },
 *     PrimaryMeetingId?: string,
 *     TenantIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MediaPlacementNetworkType?: 'DualStack'|'Ipv4Only',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMeetingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMeetingAsync(array{
 *     ClientRequestToken?: string,
 *     MediaRegion?: string,
 *     MeetingHostId?: string,
 *     ExternalMeetingId?: string,
 *     NotificationsConfiguration?: array{LambdaFunctionArn?: string, SnsTopicArn?: string, SqsQueueArn?: string, ...},
 *     MeetingFeatures?: array{
 *         Audio?: array{EchoReduction?: 'AVAILABLE'|'UNAVAILABLE', ...},
 *         Video?: array{MaxResolution?: 'FHD'|'HD'|'None', ...},
 *         Content?: array{MaxResolution?: 'FHD'|'None'|'UHD', ...},
 *         Attendee?: array{MaxCount?: int, ...},
 *         ...,
 *     },
 *     PrimaryMeetingId?: string,
 *     TenantIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MediaPlacementNetworkType?: 'DualStack'|'Ipv4Only',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMeetingWithAttendees(array $args = [])
 * @phpstan-method \Aws\Result createMeetingWithAttendees(array{
 *     ClientRequestToken?: string,
 *     MediaRegion?: string,
 *     MeetingHostId?: string,
 *     ExternalMeetingId?: string,
 *     MeetingFeatures?: array{
 *         Audio?: array{EchoReduction?: 'AVAILABLE'|'UNAVAILABLE', ...},
 *         Video?: array{MaxResolution?: 'FHD'|'HD'|'None', ...},
 *         Content?: array{MaxResolution?: 'FHD'|'None'|'UHD', ...},
 *         Attendee?: array{MaxCount?: int, ...},
 *         ...,
 *     },
 *     NotificationsConfiguration?: array{LambdaFunctionArn?: string, SnsTopicArn?: string, SqsQueueArn?: string, ...},
 *     Attendees?: list<array{ExternalUserId?: string, Capabilities?: array, ...}>,
 *     PrimaryMeetingId?: string,
 *     TenantIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MediaPlacementNetworkType?: 'DualStack'|'Ipv4Only',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMeetingWithAttendeesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMeetingWithAttendeesAsync(array{
 *     ClientRequestToken?: string,
 *     MediaRegion?: string,
 *     MeetingHostId?: string,
 *     ExternalMeetingId?: string,
 *     MeetingFeatures?: array{
 *         Audio?: array{EchoReduction?: 'AVAILABLE'|'UNAVAILABLE', ...},
 *         Video?: array{MaxResolution?: 'FHD'|'HD'|'None', ...},
 *         Content?: array{MaxResolution?: 'FHD'|'None'|'UHD', ...},
 *         Attendee?: array{MaxCount?: int, ...},
 *         ...,
 *     },
 *     NotificationsConfiguration?: array{LambdaFunctionArn?: string, SnsTopicArn?: string, SqsQueueArn?: string, ...},
 *     Attendees?: list<array{ExternalUserId?: string, Capabilities?: array, ...}>,
 *     PrimaryMeetingId?: string,
 *     TenantIds?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MediaPlacementNetworkType?: 'DualStack'|'Ipv4Only',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAttendee(array $args = [])
 * @phpstan-method \Aws\Result deleteAttendee(array{MeetingId?: string, AttendeeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAttendeeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAttendeeAsync(array{MeetingId?: string, AttendeeId?: string, ...} $args = [])
 * @method \Aws\Result deleteMeeting(array $args = [])
 * @phpstan-method \Aws\Result deleteMeeting(array{MeetingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMeetingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMeetingAsync(array{MeetingId?: string, ...} $args = [])
 * @method \Aws\Result getAttendee(array $args = [])
 * @phpstan-method \Aws\Result getAttendee(array{MeetingId?: string, AttendeeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAttendeeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAttendeeAsync(array{MeetingId?: string, AttendeeId?: string, ...} $args = [])
 * @method \Aws\Result getMeeting(array $args = [])
 * @phpstan-method \Aws\Result getMeeting(array{MeetingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMeetingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMeetingAsync(array{MeetingId?: string, ...} $args = [])
 * @method \Aws\Result listAttendees(array $args = [])
 * @phpstan-method \Aws\Result listAttendees(array{MeetingId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttendeesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttendeesAsync(array{MeetingId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result startMeetingTranscription(array $args = [])
 * @phpstan-method \Aws\Result startMeetingTranscription(array{
 *     MeetingId?: string,
 *     TranscriptionConfiguration?: array{
 *         EngineTranscribeSettings?: array{
 *             LanguageCode?: 'de-DE'|'en-AU'|'en-GB'|'en-US'|'es-US'|'fr-CA'|'fr-FR'|'hi-IN'|'it-IT'|'ja-JP'|'ko-KR'|'pt-BR'|'th-TH'|'zh-CN',
 *             VocabularyFilterMethod?: 'mask'|'remove'|'tag',
 *             VocabularyFilterName?: string,
 *             VocabularyName?: string,
 *             Region?: 'ap-northeast-1'|'ap-northeast-2'|'ap-southeast-2'|'auto'|'ca-central-1'|'eu-central-1'|'eu-west-1'|'eu-west-2'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-west-1'|'us-west-2',
 *             EnablePartialResultsStabilization?: bool,
 *             PartialResultsStability?: 'high'|'low'|'medium',
 *             ContentIdentificationType?: 'PII',
 *             ContentRedactionType?: 'PII',
 *             PiiEntityTypes?: string,
 *             LanguageModelName?: string,
 *             IdentifyLanguage?: bool,
 *             LanguageOptions?: string,
 *             PreferredLanguage?: 'de-DE'|'en-AU'|'en-GB'|'en-US'|'es-US'|'fr-CA'|'fr-FR'|'hi-IN'|'it-IT'|'ja-JP'|'ko-KR'|'pt-BR'|'th-TH'|'zh-CN',
 *             VocabularyNames?: string,
 *             VocabularyFilterNames?: string,
 *             ...,
 *         },
 *         EngineTranscribeMedicalSettings?: array{
 *             LanguageCode?: 'en-US',
 *             Specialty?: 'CARDIOLOGY'|'NEUROLOGY'|'ONCOLOGY'|'PRIMARYCARE'|'RADIOLOGY'|'UROLOGY',
 *             Type?: 'CONVERSATION'|'DICTATION',
 *             VocabularyName?: string,
 *             Region?: 'ap-southeast-2'|'auto'|'ca-central-1'|'eu-west-1'|'us-east-1'|'us-east-2'|'us-west-2',
 *             ContentIdentificationType?: 'PHI',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMeetingTranscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMeetingTranscriptionAsync(array{
 *     MeetingId?: string,
 *     TranscriptionConfiguration?: array{
 *         EngineTranscribeSettings?: array{
 *             LanguageCode?: 'de-DE'|'en-AU'|'en-GB'|'en-US'|'es-US'|'fr-CA'|'fr-FR'|'hi-IN'|'it-IT'|'ja-JP'|'ko-KR'|'pt-BR'|'th-TH'|'zh-CN',
 *             VocabularyFilterMethod?: 'mask'|'remove'|'tag',
 *             VocabularyFilterName?: string,
 *             VocabularyName?: string,
 *             Region?: 'ap-northeast-1'|'ap-northeast-2'|'ap-southeast-2'|'auto'|'ca-central-1'|'eu-central-1'|'eu-west-1'|'eu-west-2'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-west-1'|'us-west-2',
 *             EnablePartialResultsStabilization?: bool,
 *             PartialResultsStability?: 'high'|'low'|'medium',
 *             ContentIdentificationType?: 'PII',
 *             ContentRedactionType?: 'PII',
 *             PiiEntityTypes?: string,
 *             LanguageModelName?: string,
 *             IdentifyLanguage?: bool,
 *             LanguageOptions?: string,
 *             PreferredLanguage?: 'de-DE'|'en-AU'|'en-GB'|'en-US'|'es-US'|'fr-CA'|'fr-FR'|'hi-IN'|'it-IT'|'ja-JP'|'ko-KR'|'pt-BR'|'th-TH'|'zh-CN',
 *             VocabularyNames?: string,
 *             VocabularyFilterNames?: string,
 *             ...,
 *         },
 *         EngineTranscribeMedicalSettings?: array{
 *             LanguageCode?: 'en-US',
 *             Specialty?: 'CARDIOLOGY'|'NEUROLOGY'|'ONCOLOGY'|'PRIMARYCARE'|'RADIOLOGY'|'UROLOGY',
 *             Type?: 'CONVERSATION'|'DICTATION',
 *             VocabularyName?: string,
 *             Region?: 'ap-southeast-2'|'auto'|'ca-central-1'|'eu-west-1'|'us-east-1'|'us-east-2'|'us-west-2',
 *             ContentIdentificationType?: 'PHI',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopMeetingTranscription(array $args = [])
 * @phpstan-method \Aws\Result stopMeetingTranscription(array{MeetingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopMeetingTranscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopMeetingTranscriptionAsync(array{MeetingId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAttendeeCapabilities(array $args = [])
 * @phpstan-method \Aws\Result updateAttendeeCapabilities(array{
 *     MeetingId?: string,
 *     AttendeeId?: string,
 *     Capabilities?: array{
 *         Audio?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Video?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Content?: 'None'|'Receive'|'Send'|'SendReceive',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAttendeeCapabilitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAttendeeCapabilitiesAsync(array{
 *     MeetingId?: string,
 *     AttendeeId?: string,
 *     Capabilities?: array{
 *         Audio?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Video?: 'None'|'Receive'|'Send'|'SendReceive',
 *         Content?: 'None'|'Receive'|'Send'|'SendReceive',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class ChimeSDKMeetingsClient extends AwsClient {}
