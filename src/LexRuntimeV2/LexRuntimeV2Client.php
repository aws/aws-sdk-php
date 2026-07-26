<?php
namespace Aws\LexRuntimeV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Lex Runtime V2** service.
 * @method \Aws\Result deleteSession(array $args = [])
 * @phpstan-method \Aws\Result deleteSession(array{botId?: string, botAliasId?: string, localeId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSessionAsync(array{botId?: string, botAliasId?: string, localeId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{botId?: string, botAliasId?: string, localeId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{botId?: string, botAliasId?: string, localeId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result putSession(array $args = [])
 * @phpstan-method \Aws\Result putSession(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     messages?: list<array{
 *         content?: string,
 *         contentType?: 'CustomPayload'|'ImageResponseCard'|'PlainText'|'SSML',
 *         imageResponseCard?: array,
 *         ...,
 *     }>,
 *     sessionState?: array{
 *         dialogAction?: array{
 *             type?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot'|'None',
 *             slotToElicit?: string,
 *             slotElicitationStyle?: 'Default'|'SpellByLetter'|'SpellByWord',
 *             subSlotToElicit?: array,
 *             ...,
 *         },
 *         intent?: array{
 *             name?: string,
 *             slots?: array<string, array>,
 *             state?: 'Failed'|'Fulfilled'|'FulfillmentInProgress'|'InProgress'|'ReadyForFulfillment'|'Waiting',
 *             confirmationState?: 'Confirmed'|'Denied'|'None',
 *             ...,
 *         },
 *         activeContexts?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         originatingRequestId?: string,
 *         runtimeHints?: array{slotHints?: array<string, array<string, array>>, ...},
 *         ...,
 *     },
 *     requestAttributes?: array<string, string>,
 *     responseContentType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSessionAsync(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     messages?: list<array{
 *         content?: string,
 *         contentType?: 'CustomPayload'|'ImageResponseCard'|'PlainText'|'SSML',
 *         imageResponseCard?: array,
 *         ...,
 *     }>,
 *     sessionState?: array{
 *         dialogAction?: array{
 *             type?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot'|'None',
 *             slotToElicit?: string,
 *             slotElicitationStyle?: 'Default'|'SpellByLetter'|'SpellByWord',
 *             subSlotToElicit?: array,
 *             ...,
 *         },
 *         intent?: array{
 *             name?: string,
 *             slots?: array<string, array>,
 *             state?: 'Failed'|'Fulfilled'|'FulfillmentInProgress'|'InProgress'|'ReadyForFulfillment'|'Waiting',
 *             confirmationState?: 'Confirmed'|'Denied'|'None',
 *             ...,
 *         },
 *         activeContexts?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         originatingRequestId?: string,
 *         runtimeHints?: array{slotHints?: array<string, array<string, array>>, ...},
 *         ...,
 *     },
 *     requestAttributes?: array<string, string>,
 *     responseContentType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result recognizeText(array $args = [])
 * @phpstan-method \Aws\Result recognizeText(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     text?: string,
 *     sessionState?: array{
 *         dialogAction?: array{
 *             type?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot'|'None',
 *             slotToElicit?: string,
 *             slotElicitationStyle?: 'Default'|'SpellByLetter'|'SpellByWord',
 *             subSlotToElicit?: array,
 *             ...,
 *         },
 *         intent?: array{
 *             name?: string,
 *             slots?: array<string, array>,
 *             state?: 'Failed'|'Fulfilled'|'FulfillmentInProgress'|'InProgress'|'ReadyForFulfillment'|'Waiting',
 *             confirmationState?: 'Confirmed'|'Denied'|'None',
 *             ...,
 *         },
 *         activeContexts?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         originatingRequestId?: string,
 *         runtimeHints?: array{slotHints?: array<string, array<string, array>>, ...},
 *         ...,
 *     },
 *     requestAttributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise recognizeTextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise recognizeTextAsync(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     text?: string,
 *     sessionState?: array{
 *         dialogAction?: array{
 *             type?: 'Close'|'ConfirmIntent'|'Delegate'|'ElicitIntent'|'ElicitSlot'|'None',
 *             slotToElicit?: string,
 *             slotElicitationStyle?: 'Default'|'SpellByLetter'|'SpellByWord',
 *             subSlotToElicit?: array,
 *             ...,
 *         },
 *         intent?: array{
 *             name?: string,
 *             slots?: array<string, array>,
 *             state?: 'Failed'|'Fulfilled'|'FulfillmentInProgress'|'InProgress'|'ReadyForFulfillment'|'Waiting',
 *             confirmationState?: 'Confirmed'|'Denied'|'None',
 *             ...,
 *         },
 *         activeContexts?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         originatingRequestId?: string,
 *         runtimeHints?: array{slotHints?: array<string, array<string, array>>, ...},
 *         ...,
 *     },
 *     requestAttributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result recognizeUtterance(array $args = [])
 * @phpstan-method \Aws\Result recognizeUtterance(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     sessionState?: string,
 *     requestAttributes?: string,
 *     requestContentType?: string,
 *     responseContentType?: string,
 *     inputStream?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise recognizeUtteranceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise recognizeUtteranceAsync(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     localeId?: string,
 *     sessionId?: string,
 *     sessionState?: string,
 *     requestAttributes?: string,
 *     requestContentType?: string,
 *     responseContentType?: string,
 *     inputStream?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 */
class LexRuntimeV2Client extends AwsClient {}
