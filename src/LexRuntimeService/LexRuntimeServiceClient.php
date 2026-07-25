<?php
namespace Aws\LexRuntimeService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Lex Runtime Service** service.
 * @method \Aws\Result deleteSession(array $args = [])
 * @phpstan-method \Aws\Result deleteSession(array{botName?: string, botAlias?: string, userId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSessionAsync(array{botName?: string, botAlias?: string, userId?: string, ...} $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{botName?: string, botAlias?: string, userId?: string, checkpointLabelFilter?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{botName?: string, botAlias?: string, userId?: string, checkpointLabelFilter?: string, ...} $args = [])
 * @method \Aws\Result postContent(array $args = [])
 * @phpstan-method \Aws\Result postContent(array{
 *     botName?: string,
 *     botAlias?: string,
 *     userId?: string,
 *     sessionAttributes?: string,
 *     requestAttributes?: string,
 *     contentType?: string,
 *     accept?: string,
 *     inputStream?: string|resource|\Psr\Http\Message\StreamInterface,
 *     activeContexts?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise postContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postContentAsync(array{
 *     botName?: string,
 *     botAlias?: string,
 *     userId?: string,
 *     sessionAttributes?: string,
 *     requestAttributes?: string,
 *     contentType?: string,
 *     accept?: string,
 *     inputStream?: string|resource|\Psr\Http\Message\StreamInterface,
 *     activeContexts?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result postText(array $args = [])
 * @phpstan-method \Aws\Result postText(array{
 *     botName?: string,
 *     botAlias?: string,
 *     userId?: string,
 *     sessionAttributes?: array<string, string>,
 *     requestAttributes?: array<string, string>,
 *     inputText?: string,
 *     activeContexts?: list<array{name?: string, timeToLive?: array, parameters?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise postTextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postTextAsync(array{
 *     botName?: string,
 *     botAlias?: string,
 *     userId?: string,
 *     sessionAttributes?: array<string, string>,
 *     requestAttributes?: array<string, string>,
 *     inputText?: string,
 *     activeContexts?: list<array{name?: string, timeToLive?: array, parameters?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putSession(array $args = [])
 * @phpstan-method \Aws\Result putSession(array{
 *     botName?: string,
 *     botAlias?: string,
 *     userId?: string,
 *     sessionAttributes?: array<string, string>,
 *     dialogAction?: array{
 *         type?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot',
 *         intentName?: string,
 *         slots?: array<string, string>,
 *         slotToElicit?: string,
 *         fulfillmentState?: 'Failed'|'Fulfilled'|'ReadyForFulfillment',
 *         message?: string,
 *         messageFormat?: 'Composite'|'CustomPayload'|'PlainText'|'SSML',
 *         ...,
 *     },
 *     recentIntentSummaryView?: list<array{
 *         intentName?: string,
 *         checkpointLabel?: string,
 *         slots?: array<string, string>,
 *         confirmationStatus?: 'Confirmed'|'Denied'|'None',
 *         dialogActionType?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot',
 *         fulfillmentState?: 'Failed'|'Fulfilled'|'ReadyForFulfillment',
 *         slotToElicit?: string,
 *         ...,
 *     }>,
 *     accept?: string,
 *     activeContexts?: list<array{name?: string, timeToLive?: array, parameters?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSessionAsync(array{
 *     botName?: string,
 *     botAlias?: string,
 *     userId?: string,
 *     sessionAttributes?: array<string, string>,
 *     dialogAction?: array{
 *         type?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot',
 *         intentName?: string,
 *         slots?: array<string, string>,
 *         slotToElicit?: string,
 *         fulfillmentState?: 'Failed'|'Fulfilled'|'ReadyForFulfillment',
 *         message?: string,
 *         messageFormat?: 'Composite'|'CustomPayload'|'PlainText'|'SSML',
 *         ...,
 *     },
 *     recentIntentSummaryView?: list<array{
 *         intentName?: string,
 *         checkpointLabel?: string,
 *         slots?: array<string, string>,
 *         confirmationStatus?: 'Confirmed'|'Denied'|'None',
 *         dialogActionType?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot',
 *         fulfillmentState?: 'Failed'|'Fulfilled'|'ReadyForFulfillment',
 *         slotToElicit?: string,
 *         ...,
 *     }>,
 *     accept?: string,
 *     activeContexts?: list<array{name?: string, timeToLive?: array, parameters?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 */
class LexRuntimeServiceClient extends AwsClient {}
