<?php
namespace Aws\PersonalizeEvents;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Personalize Events** service.
 * @method \Aws\Result putActionInteractions(array $args = [])
 * @phpstan-method \Aws\Result putActionInteractions(array{
 *     trackingId?: string,
 *     actionInteractions?: list<array{
 *         actionId?: string,
 *         userId?: string,
 *         sessionId?: string,
 *         timestamp?: int|string|\DateTimeInterface,
 *         eventType?: string,
 *         eventId?: string,
 *         recommendationId?: string,
 *         impression?: list<string>,
 *         properties?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putActionInteractionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putActionInteractionsAsync(array{
 *     trackingId?: string,
 *     actionInteractions?: list<array{
 *         actionId?: string,
 *         userId?: string,
 *         sessionId?: string,
 *         timestamp?: int|string|\DateTimeInterface,
 *         eventType?: string,
 *         eventId?: string,
 *         recommendationId?: string,
 *         impression?: list<string>,
 *         properties?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putActions(array $args = [])
 * @phpstan-method \Aws\Result putActions(array{datasetArn?: string, actions?: list<array{actionId?: string, properties?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putActionsAsync(array{datasetArn?: string, actions?: list<array{actionId?: string, properties?: string, ...}>, ...} $args = [])
 * @method \Aws\Result putEvents(array $args = [])
 * @phpstan-method \Aws\Result putEvents(array{
 *     trackingId?: string,
 *     userId?: string,
 *     sessionId?: string,
 *     eventList?: list<array{
 *         eventId?: string,
 *         eventType?: string,
 *         eventValue?: float,
 *         itemId?: string,
 *         properties?: string,
 *         sentAt?: int|string|\DateTimeInterface,
 *         recommendationId?: string,
 *         impression?: list<string>,
 *         metricAttribution?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEventsAsync(array{
 *     trackingId?: string,
 *     userId?: string,
 *     sessionId?: string,
 *     eventList?: list<array{
 *         eventId?: string,
 *         eventType?: string,
 *         eventValue?: float,
 *         itemId?: string,
 *         properties?: string,
 *         sentAt?: int|string|\DateTimeInterface,
 *         recommendationId?: string,
 *         impression?: list<string>,
 *         metricAttribution?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putItems(array $args = [])
 * @phpstan-method \Aws\Result putItems(array{datasetArn?: string, items?: list<array{itemId?: string, properties?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putItemsAsync(array{datasetArn?: string, items?: list<array{itemId?: string, properties?: string, ...}>, ...} $args = [])
 * @method \Aws\Result putUsers(array $args = [])
 * @phpstan-method \Aws\Result putUsers(array{datasetArn?: string, users?: list<array{userId?: string, properties?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putUsersAsync(array{datasetArn?: string, users?: list<array{userId?: string, properties?: string, ...}>, ...} $args = [])
 */
class PersonalizeEventsClient extends AwsClient {}
