<?php
namespace Aws\IotDataPlane;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Data Plane** service.
 *
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{clientId?: string, cleanSession?: bool, preventWillMessage?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{clientId?: string, cleanSession?: bool, preventWillMessage?: bool, ...} $args = [])
 * @method \Aws\Result deleteThingShadow(array $args = [])
 * @phpstan-method \Aws\Result deleteThingShadow(array{thingName?: string, shadowName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThingShadowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThingShadowAsync(array{thingName?: string, shadowName?: string, ...} $args = [])
 * @method \Aws\Result getConnection(array $args = [])
 * @phpstan-method \Aws\Result getConnection(array{clientId?: string, includeSocketInformation?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionAsync(array{clientId?: string, includeSocketInformation?: bool, ...} $args = [])
 * @method \Aws\Result getRetainedMessage(array $args = [])
 * @phpstan-method \Aws\Result getRetainedMessage(array{topic?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRetainedMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRetainedMessageAsync(array{topic?: string, ...} $args = [])
 * @method \Aws\Result getThingShadow(array $args = [])
 * @phpstan-method \Aws\Result getThingShadow(array{thingName?: string, shadowName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getThingShadowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getThingShadowAsync(array{thingName?: string, shadowName?: string, ...} $args = [])
 * @method \Aws\Result listNamedShadowsForThing(array $args = [])
 * @phpstan-method \Aws\Result listNamedShadowsForThing(array{thingName?: string, nextToken?: string, pageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNamedShadowsForThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNamedShadowsForThingAsync(array{thingName?: string, nextToken?: string, pageSize?: int, ...} $args = [])
 * @method \Aws\Result listRetainedMessages(array $args = [])
 * @phpstan-method \Aws\Result listRetainedMessages(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRetainedMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRetainedMessagesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptions(array{clientId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array{clientId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result publish(array $args = [])
 * @phpstan-method \Aws\Result publish(array{
 *     topic?: string,
 *     qos?: int,
 *     retain?: bool,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     userProperties?: string,
 *     payloadFormatIndicator?: 'UNSPECIFIED_BYTES'|'UTF8_DATA',
 *     contentType?: string,
 *     responseTopic?: string,
 *     correlationData?: string,
 *     messageExpiry?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise publishAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishAsync(array{
 *     topic?: string,
 *     qos?: int,
 *     retain?: bool,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     userProperties?: string,
 *     payloadFormatIndicator?: 'UNSPECIFIED_BYTES'|'UTF8_DATA',
 *     contentType?: string,
 *     responseTopic?: string,
 *     correlationData?: string,
 *     messageExpiry?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendDirectMessage(array $args = [])
 * @phpstan-method \Aws\Result sendDirectMessage(array{
 *     clientId?: string,
 *     topic?: string,
 *     contentType?: string,
 *     responseTopic?: string,
 *     confirmation?: bool,
 *     timeout?: int,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     userProperties?: string,
 *     payloadFormatIndicator?: 'UNSPECIFIED_BYTES'|'UTF8_DATA',
 *     correlationData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendDirectMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendDirectMessageAsync(array{
 *     clientId?: string,
 *     topic?: string,
 *     contentType?: string,
 *     responseTopic?: string,
 *     confirmation?: bool,
 *     timeout?: int,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     userProperties?: string,
 *     payloadFormatIndicator?: 'UNSPECIFIED_BYTES'|'UTF8_DATA',
 *     correlationData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThingShadow(array $args = [])
 * @phpstan-method \Aws\Result updateThingShadow(array{
 *     thingName?: string,
 *     shadowName?: string,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThingShadowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThingShadowAsync(array{
 *     thingName?: string,
 *     shadowName?: string,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 */
class IotDataPlaneClient extends AwsClient {}
