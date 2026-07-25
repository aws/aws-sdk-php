<?php
namespace Aws\ivschat;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Interactive Video Service Chat** service.
 * @method \Aws\Result createChatToken(array $args = [])
 * @phpstan-method \Aws\Result createChatToken(array{
 *     roomIdentifier?: string,
 *     userId?: string,
 *     capabilities?: list<'DELETE_MESSAGE'|'DISCONNECT_USER'|'SEND_MESSAGE'>,
 *     sessionDurationInMinutes?: int,
 *     attributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChatTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChatTokenAsync(array{
 *     roomIdentifier?: string,
 *     userId?: string,
 *     capabilities?: list<'DELETE_MESSAGE'|'DISCONNECT_USER'|'SEND_MESSAGE'>,
 *     sessionDurationInMinutes?: int,
 *     attributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createLoggingConfiguration(array{
 *     name?: string,
 *     destinationConfiguration?: array{
 *         s3?: array{bucketName?: string, ...},
 *         cloudWatchLogs?: array{logGroupName?: string, ...},
 *         firehose?: array{deliveryStreamName?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoggingConfigurationAsync(array{
 *     name?: string,
 *     destinationConfiguration?: array{
 *         s3?: array{bucketName?: string, ...},
 *         cloudWatchLogs?: array{logGroupName?: string, ...},
 *         firehose?: array{deliveryStreamName?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRoom(array $args = [])
 * @phpstan-method \Aws\Result createRoom(array{
 *     name?: string,
 *     maximumMessageRatePerSecond?: int,
 *     maximumMessageLength?: int,
 *     messageReviewHandler?: array{uri?: string, fallbackResult?: 'ALLOW'|'DENY', ...},
 *     tags?: array<string, string>,
 *     loggingConfigurationIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRoomAsync(array{
 *     name?: string,
 *     maximumMessageRatePerSecond?: int,
 *     maximumMessageLength?: int,
 *     messageReviewHandler?: array{uri?: string, fallbackResult?: 'ALLOW'|'DENY', ...},
 *     tags?: array<string, string>,
 *     loggingConfigurationIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteLoggingConfiguration(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoggingConfigurationAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteMessage(array $args = [])
 * @phpstan-method \Aws\Result deleteMessage(array{roomIdentifier?: string, id?: string, reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMessageAsync(array{roomIdentifier?: string, id?: string, reason?: string, ...} $args = [])
 * @method \Aws\Result deleteRoom(array $args = [])
 * @phpstan-method \Aws\Result deleteRoom(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRoomAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result disconnectUser(array $args = [])
 * @phpstan-method \Aws\Result disconnectUser(array{roomIdentifier?: string, userId?: string, reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disconnectUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disconnectUserAsync(array{roomIdentifier?: string, userId?: string, reason?: string, ...} $args = [])
 * @method \Aws\Result getLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getLoggingConfiguration(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoggingConfigurationAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getRoom(array $args = [])
 * @phpstan-method \Aws\Result getRoom(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRoomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRoomAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result listLoggingConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listLoggingConfigurations(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLoggingConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLoggingConfigurationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listRooms(array $args = [])
 * @phpstan-method \Aws\Result listRooms(array{
 *     name?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     messageReviewHandlerUri?: string,
 *     loggingConfigurationIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoomsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoomsAsync(array{
 *     name?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     messageReviewHandlerUri?: string,
 *     loggingConfigurationIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result sendEvent(array $args = [])
 * @phpstan-method \Aws\Result sendEvent(array{roomIdentifier?: string, eventName?: string, attributes?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendEventAsync(array{roomIdentifier?: string, eventName?: string, attributes?: array<string, string>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateLoggingConfiguration(array{
 *     identifier?: string,
 *     name?: string,
 *     destinationConfiguration?: array{
 *         s3?: array{bucketName?: string, ...},
 *         cloudWatchLogs?: array{logGroupName?: string, ...},
 *         firehose?: array{deliveryStreamName?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLoggingConfigurationAsync(array{
 *     identifier?: string,
 *     name?: string,
 *     destinationConfiguration?: array{
 *         s3?: array{bucketName?: string, ...},
 *         cloudWatchLogs?: array{logGroupName?: string, ...},
 *         firehose?: array{deliveryStreamName?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRoom(array $args = [])
 * @phpstan-method \Aws\Result updateRoom(array{
 *     identifier?: string,
 *     name?: string,
 *     maximumMessageRatePerSecond?: int,
 *     maximumMessageLength?: int,
 *     messageReviewHandler?: array{uri?: string, fallbackResult?: 'ALLOW'|'DENY', ...},
 *     loggingConfigurationIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoomAsync(array{
 *     identifier?: string,
 *     name?: string,
 *     maximumMessageRatePerSecond?: int,
 *     maximumMessageLength?: int,
 *     messageReviewHandler?: array{uri?: string, fallbackResult?: 'ALLOW'|'DENY', ...},
 *     loggingConfigurationIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 */
class ivschatClient extends AwsClient {}
