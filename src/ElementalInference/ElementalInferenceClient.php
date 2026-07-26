<?php
namespace Aws\ElementalInference;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental Inference** service.
 * @method \Aws\Result associateFeed(array $args = [])
 * @phpstan-method \Aws\Result associateFeed(array{
 *     id?: string,
 *     associatedResourceName?: string,
 *     outputs?: list<array{name?: string, outputConfig?: array, status?: 'DISABLED'|'ENABLED', description?: string, ...}>,
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateFeedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateFeedAsync(array{
 *     id?: string,
 *     associatedResourceName?: string,
 *     outputs?: list<array{name?: string, outputConfig?: array, status?: 'DISABLED'|'ENABLED', description?: string, ...}>,
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDictionary(array $args = [])
 * @phpstan-method \Aws\Result createDictionary(array{
 *     name?: string,
 *     language?: 'deu'|'eng'|'fra'|'ita'|'por'|'spa',
 *     entries?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDictionaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDictionaryAsync(array{
 *     name?: string,
 *     language?: 'deu'|'eng'|'fra'|'ita'|'por'|'spa',
 *     entries?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFeed(array $args = [])
 * @phpstan-method \Aws\Result createFeed(array{
 *     name?: string,
 *     outputs?: list<array{name?: string, outputConfig?: array, status?: 'DISABLED'|'ENABLED', description?: string, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFeedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFeedAsync(array{
 *     name?: string,
 *     outputs?: list<array{name?: string, outputConfig?: array, status?: 'DISABLED'|'ENABLED', description?: string, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDictionary(array $args = [])
 * @phpstan-method \Aws\Result deleteDictionary(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDictionaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDictionaryAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteFeed(array $args = [])
 * @phpstan-method \Aws\Result deleteFeed(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFeedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFeedAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result disassociateFeed(array $args = [])
 * @phpstan-method \Aws\Result disassociateFeed(array{id?: string, associatedResourceName?: string, dryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFeedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFeedAsync(array{id?: string, associatedResourceName?: string, dryRun?: bool, ...} $args = [])
 * @method \Aws\Result exportDictionaryEntries(array $args = [])
 * @phpstan-method \Aws\Result exportDictionaryEntries(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportDictionaryEntriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportDictionaryEntriesAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getDictionary(array $args = [])
 * @phpstan-method \Aws\Result getDictionary(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDictionaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDictionaryAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getFeed(array $args = [])
 * @phpstan-method \Aws\Result getFeed(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFeedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFeedAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result listDictionaries(array $args = [])
 * @phpstan-method \Aws\Result listDictionaries(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDictionariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDictionariesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFeeds(array $args = [])
 * @phpstan-method \Aws\Result listFeeds(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFeedsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFeedsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDictionary(array $args = [])
 * @phpstan-method \Aws\Result updateDictionary(array{id?: string, name?: string, language?: 'deu'|'eng'|'fra'|'ita'|'por'|'spa', entries?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDictionaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDictionaryAsync(array{id?: string, name?: string, language?: 'deu'|'eng'|'fra'|'ita'|'por'|'spa', entries?: string, ...} $args = [])
 * @method \Aws\Result updateFeed(array $args = [])
 * @phpstan-method \Aws\Result updateFeed(array{
 *     name?: string,
 *     id?: string,
 *     outputs?: list<array{
 *         name?: string,
 *         outputConfig?: array,
 *         status?: 'DISABLED'|'ENABLED',
 *         description?: string,
 *         fromAssociation?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFeedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFeedAsync(array{
 *     name?: string,
 *     id?: string,
 *     outputs?: list<array{
 *         name?: string,
 *         outputConfig?: array,
 *         status?: 'DISABLED'|'ENABLED',
 *         description?: string,
 *         fromAssociation?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 */
class ElementalInferenceClient extends AwsClient {}
