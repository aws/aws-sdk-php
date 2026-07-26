<?php
namespace Aws\ConnectParticipant;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Connect Participant Service** service.
 * @method \Aws\Result cancelParticipantAuthentication(array $args = [])
 * @phpstan-method \Aws\Result cancelParticipantAuthentication(array{SessionId?: string, ConnectionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelParticipantAuthenticationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelParticipantAuthenticationAsync(array{SessionId?: string, ConnectionToken?: string, ...} $args = [])
 * @method \Aws\Result completeAttachmentUpload(array $args = [])
 * @phpstan-method \Aws\Result completeAttachmentUpload(array{AttachmentIds?: list<string>, ClientToken?: string, ConnectionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise completeAttachmentUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeAttachmentUploadAsync(array{AttachmentIds?: list<string>, ClientToken?: string, ConnectionToken?: string, ...} $args = [])
 * @method \Aws\Result createParticipantConnection(array $args = [])
 * @phpstan-method \Aws\Result createParticipantConnection(array{
 *     Type?: list<'CONNECTION_CREDENTIALS'|'WEBRTC_CONNECTION'|'WEBSOCKET'>,
 *     ParticipantToken?: string,
 *     ConnectParticipant?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createParticipantConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createParticipantConnectionAsync(array{
 *     Type?: list<'CONNECTION_CREDENTIALS'|'WEBRTC_CONNECTION'|'WEBSOCKET'>,
 *     ParticipantToken?: string,
 *     ConnectParticipant?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeView(array $args = [])
 * @phpstan-method \Aws\Result describeView(array{ViewToken?: string, ConnectionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeViewAsync(array{ViewToken?: string, ConnectionToken?: string, ...} $args = [])
 * @method \Aws\Result disconnectParticipant(array $args = [])
 * @phpstan-method \Aws\Result disconnectParticipant(array{ClientToken?: string, ConnectionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disconnectParticipantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disconnectParticipantAsync(array{ClientToken?: string, ConnectionToken?: string, ...} $args = [])
 * @method \Aws\Result getAttachment(array $args = [])
 * @phpstan-method \Aws\Result getAttachment(array{AttachmentId?: string, ConnectionToken?: string, UrlExpiryInSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAttachmentAsync(array{AttachmentId?: string, ConnectionToken?: string, UrlExpiryInSeconds?: int, ...} $args = [])
 * @method \Aws\Result getAuthenticationUrl(array $args = [])
 * @phpstan-method \Aws\Result getAuthenticationUrl(array{SessionId?: string, RedirectUri?: string, ConnectionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAuthenticationUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAuthenticationUrlAsync(array{SessionId?: string, RedirectUri?: string, ConnectionToken?: string, ...} $args = [])
 * @method \Aws\Result getTranscript(array $args = [])
 * @phpstan-method \Aws\Result getTranscript(array{
 *     ContactId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ScanDirection?: 'BACKWARD'|'FORWARD',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     StartPosition?: array{Id?: string, AbsoluteTime?: string, MostRecent?: int, ...},
 *     ConnectionToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTranscriptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTranscriptAsync(array{
 *     ContactId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ScanDirection?: 'BACKWARD'|'FORWARD',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     StartPosition?: array{Id?: string, AbsoluteTime?: string, MostRecent?: int, ...},
 *     ConnectionToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendEvent(array $args = [])
 * @phpstan-method \Aws\Result sendEvent(array{ContentType?: string, Content?: string, ClientToken?: string, ConnectionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendEventAsync(array{ContentType?: string, Content?: string, ClientToken?: string, ConnectionToken?: string, ...} $args = [])
 * @method \Aws\Result sendMessage(array $args = [])
 * @phpstan-method \Aws\Result sendMessage(array{ContentType?: string, Content?: string, ClientToken?: string, ConnectionToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendMessageAsync(array{ContentType?: string, Content?: string, ClientToken?: string, ConnectionToken?: string, ...} $args = [])
 * @method \Aws\Result startAttachmentUpload(array $args = [])
 * @phpstan-method \Aws\Result startAttachmentUpload(array{
 *     ContentType?: string,
 *     AttachmentSizeInBytes?: int,
 *     AttachmentName?: string,
 *     ClientToken?: string,
 *     ConnectionToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAttachmentUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAttachmentUploadAsync(array{
 *     ContentType?: string,
 *     AttachmentSizeInBytes?: int,
 *     AttachmentName?: string,
 *     ClientToken?: string,
 *     ConnectionToken?: string,
 *     ...,
 * } $args = [])
 */
class ConnectParticipantClient extends AwsClient {}
