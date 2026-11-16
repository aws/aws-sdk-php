<?php
namespace Aws\OpenSearchMemory;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon OpenSearch Memory** service.
 * @method \Aws\Result batchGetEvent(array $args = [])
 * @phpstan-method \Aws\Result batchGetEvent(array{spaceId?: string, actorId?: string, sessionId?: string, eventIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetEventAsync(array{spaceId?: string, actorId?: string, sessionId?: string, eventIds?: list<string>, ...} $args = [])
 * @method \Aws\Result createEvent(array $args = [])
 * @phpstan-method \Aws\Result createEvent(array{
 *     spaceId?: string,
 *     actorId?: string,
 *     sessionId?: string,
 *     eventTimestamp?: int|string|\DateTimeInterface,
 *     payload?: array{
 *         conversational?: array{unified?: array, ...},
 *         structuredData?: array{source?: array, ...},
 *         blob?: array{contentType?: 'application/pdf'|'image/jpeg'|'image/png', source?: array, ...},
 *         ...,
 *     },
 *     metadata?: array<string, string>,
 *     clientToken?: string,
 *     infer?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventAsync(array{
 *     spaceId?: string,
 *     actorId?: string,
 *     sessionId?: string,
 *     eventTimestamp?: int|string|\DateTimeInterface,
 *     payload?: array{
 *         conversational?: array{unified?: array, ...},
 *         structuredData?: array{source?: array, ...},
 *         blob?: array{contentType?: 'application/pdf'|'image/jpeg'|'image/png', source?: array, ...},
 *         ...,
 *     },
 *     metadata?: array<string, string>,
 *     clientToken?: string,
 *     infer?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMemory(array $args = [])
 * @phpstan-method \Aws\Result createMemory(array{
 *     spaceId?: string,
 *     name?: string,
 *     content?: string,
 *     actorId?: string,
 *     sessionId?: string,
 *     metadata?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMemoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMemoryAsync(array{
 *     spaceId?: string,
 *     name?: string,
 *     content?: string,
 *     actorId?: string,
 *     sessionId?: string,
 *     metadata?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSpace(array $args = [])
 * @phpstan-method \Aws\Result createSpace(array{
 *     name?: string,
 *     memoryStrategies?: list<array{type?: 'CUSTOM'|'SEMANTIC'|'SUMMARY', name?: string, description?: string, configuration?: array, ...}>,
 *     eventExpiryDays?: int,
 *     memoryExpiryDays?: int,
 *     extractionModelId?: string,
 *     encryptionConfiguration?: array{kmsKeyArn?: string, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSpaceAsync(array{
 *     name?: string,
 *     memoryStrategies?: list<array{type?: 'CUSTOM'|'SEMANTIC'|'SUMMARY', name?: string, description?: string, configuration?: array, ...}>,
 *     eventExpiryDays?: int,
 *     memoryExpiryDays?: int,
 *     extractionModelId?: string,
 *     encryptionConfiguration?: array{kmsKeyArn?: string, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteEvent(array $args = [])
 * @phpstan-method \Aws\Result deleteEvent(array{spaceId?: string, eventId?: string, actorId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventAsync(array{spaceId?: string, eventId?: string, actorId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result deleteMemory(array $args = [])
 * @phpstan-method \Aws\Result deleteMemory(array{spaceId?: string, memoryId?: string, actorId?: string, strategyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMemoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMemoryAsync(array{spaceId?: string, memoryId?: string, actorId?: string, strategyName?: string, ...} $args = [])
 * @method \Aws\Result deleteSpace(array $args = [])
 * @phpstan-method \Aws\Result deleteSpace(array{spaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array{spaceId?: string, ...} $args = [])
 * @method \Aws\Result getEvent(array $args = [])
 * @phpstan-method \Aws\Result getEvent(array{spaceId?: string, eventId?: string, actorId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventAsync(array{spaceId?: string, eventId?: string, actorId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getMemory(array $args = [])
 * @phpstan-method \Aws\Result getMemory(array{spaceId?: string, memoryId?: string, actorId?: string, strategyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMemoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMemoryAsync(array{spaceId?: string, memoryId?: string, actorId?: string, strategyName?: string, ...} $args = [])
 * @method \Aws\Result getSpace(array $args = [])
 * @phpstan-method \Aws\Result getSpace(array{spaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSpaceAsync(array{spaceId?: string, ...} $args = [])
 * @method \Aws\Result listEvents(array $args = [])
 * @phpstan-method \Aws\Result listEvents(array{
 *     spaceId?: string,
 *     actorId?: string,
 *     sessionId?: string,
 *     eventTimestampBefore?: int|string|\DateTimeInterface,
 *     eventTimestampAfter?: int|string|\DateTimeInterface,
 *     sortOrder?: 'ASC'|'DESC',
 *     metadataFilters?: array<string, string>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventsAsync(array{
 *     spaceId?: string,
 *     actorId?: string,
 *     sessionId?: string,
 *     eventTimestampBefore?: int|string|\DateTimeInterface,
 *     eventTimestampAfter?: int|string|\DateTimeInterface,
 *     sortOrder?: 'ASC'|'DESC',
 *     metadataFilters?: array<string, string>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMemories(array $args = [])
 * @phpstan-method \Aws\Result listMemories(array{
 *     spaceId?: string,
 *     memoryStrategies?: list<array{memoryType?: 'CUSTOM'|'SEMANTIC'|'SUMMARY', memoryStrategyNames?: list<string>, ...}>,
 *     actorIds?: list<string>,
 *     sessionIds?: list<string>,
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     sortOrder?: 'ASC'|'DESC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMemoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMemoriesAsync(array{
 *     spaceId?: string,
 *     memoryStrategies?: list<array{memoryType?: 'CUSTOM'|'SEMANTIC'|'SUMMARY', memoryStrategyNames?: list<string>, ...}>,
 *     actorIds?: list<string>,
 *     sessionIds?: list<string>,
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     sortOrder?: 'ASC'|'DESC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSpaces(array $args = [])
 * @phpstan-method \Aws\Result listSpaces(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSpacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpacesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result searchEvents(array $args = [])
 * @phpstan-method \Aws\Result searchEvents(array{
 *     spaceId?: string,
 *     actorId?: string,
 *     sessionIds?: list<string>,
 *     query?: array,
 *     sort?: array,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchEventsAsync(array{
 *     spaceId?: string,
 *     actorId?: string,
 *     sessionIds?: list<string>,
 *     query?: array,
 *     sort?: array,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchMemories(array $args = [])
 * @phpstan-method \Aws\Result searchMemories(array{
 *     spaceId?: string,
 *     memoryStrategies?: list<array{memoryType?: 'CUSTOM'|'SEMANTIC'|'SUMMARY', memoryStrategyNames?: list<string>, ...}>,
 *     actorId?: string,
 *     query?: array,
 *     sort?: array,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchMemoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchMemoriesAsync(array{
 *     spaceId?: string,
 *     memoryStrategies?: list<array{memoryType?: 'CUSTOM'|'SEMANTIC'|'SUMMARY', memoryStrategyNames?: list<string>, ...}>,
 *     actorId?: string,
 *     query?: array,
 *     sort?: array,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateMemory(array $args = [])
 * @phpstan-method \Aws\Result updateMemory(array{
 *     spaceId?: string,
 *     memoryId?: string,
 *     content?: string,
 *     metadata?: array<string, string>,
 *     metadataMode?: 'MERGE'|'REPLACE',
 *     actorId?: string,
 *     strategyName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMemoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMemoryAsync(array{
 *     spaceId?: string,
 *     memoryId?: string,
 *     content?: string,
 *     metadata?: array<string, string>,
 *     metadataMode?: 'MERGE'|'REPLACE',
 *     actorId?: string,
 *     strategyName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSpace(array $args = [])
 * @phpstan-method \Aws\Result updateSpace(array{
 *     spaceId?: string,
 *     memoryStrategies?: list<array{type?: 'CUSTOM'|'SEMANTIC'|'SUMMARY', name?: string, description?: string, configuration?: array, ...}>,
 *     eventExpiryDays?: int,
 *     memoryExpiryDays?: int,
 *     extractionModelId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSpaceAsync(array{
 *     spaceId?: string,
 *     memoryStrategies?: list<array{type?: 'CUSTOM'|'SEMANTIC'|'SUMMARY', name?: string, description?: string, configuration?: array, ...}>,
 *     eventExpiryDays?: int,
 *     memoryExpiryDays?: int,
 *     extractionModelId?: string,
 *     ...,
 * } $args = [])
 */
class OpenSearchMemoryClient extends AwsClient {}
