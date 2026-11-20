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
 *     language?: 'ara'|'deu'|'eng'|'fra'|'ita'|'por'|'spa',
 *     entries?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDictionaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDictionaryAsync(array{
 *     name?: string,
 *     language?: 'ara'|'deu'|'eng'|'fra'|'ita'|'por'|'spa',
 *     entries?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFeed(array $args = [])
 * @phpstan-method \Aws\Result createFeed(array{
 *     name?: string,
 *     accessRoleArn?: string,
 *     outputs?: list<array{name?: string, outputConfig?: array, status?: 'DISABLED'|'ENABLED', description?: string, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFeedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFeedAsync(array{
 *     name?: string,
 *     accessRoleArn?: string,
 *     outputs?: list<array{name?: string, outputConfig?: array, status?: 'DISABLED'|'ENABLED', description?: string, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFunction(array $args = [])
 * @phpstan-method \Aws\Result createFunction(array{
 *     name?: string,
 *     target?: array{bedrock?: array{api?: 'INVOKE_MODEL', model?: string, ...}, passthrough?: array, ...},
 *     requestExpression?: string,
 *     responseExpression?: string,
 *     description?: string,
 *     eventBridgeDelivery?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFunctionAsync(array{
 *     name?: string,
 *     target?: array{bedrock?: array{api?: 'INVOKE_MODEL', model?: string, ...}, passthrough?: array, ...},
 *     requestExpression?: string,
 *     responseExpression?: string,
 *     description?: string,
 *     eventBridgeDelivery?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQuestionSet(array $args = [])
 * @phpstan-method \Aws\Result createQuestionSet(array{
 *     yesNo?: list<array{name?: string, question?: string, ...}>,
 *     yesNoPerOption?: list<array{name?: string, question?: string, options?: list<array>, ...}>,
 *     chooseOne?: list<array{name?: string, question?: string, options?: list<array>, ...}>,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQuestionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQuestionSetAsync(array{
 *     yesNo?: list<array{name?: string, question?: string, ...}>,
 *     yesNoPerOption?: list<array{name?: string, question?: string, options?: list<array>, ...}>,
 *     chooseOne?: list<array{name?: string, question?: string, options?: list<array>, ...}>,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQuestionSetVersion(array $args = [])
 * @phpstan-method \Aws\Result createQuestionSetVersion(array{id?: string, sha256?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createQuestionSetVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQuestionSetVersionAsync(array{id?: string, sha256?: string, description?: string, ...} $args = [])
 * @method \Aws\Result createScheduleAction(array $args = [])
 * @phpstan-method \Aws\Result createScheduleAction(array{
 *     id?: string,
 *     actionName?: string,
 *     startConfiguration?: array{fixedModeScheduleActionStartSettings?: array{scheduledAt?: int|string|\DateTimeInterface, ...}, ...},
 *     operations?: list<array{
 *         updateOutputStatus?: array,
 *         updateClippingDataSourceConfiguration?: array,
 *         removeClippingDataSourceConfiguration?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduleActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduleActionAsync(array{
 *     id?: string,
 *     actionName?: string,
 *     startConfiguration?: array{fixedModeScheduleActionStartSettings?: array{scheduledAt?: int|string|\DateTimeInterface, ...}, ...},
 *     operations?: list<array{
 *         updateOutputStatus?: array,
 *         updateClippingDataSourceConfiguration?: array,
 *         removeClippingDataSourceConfiguration?: array,
 *         ...,
 *     }>,
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
 * @method \Aws\Result deleteFeedPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteFeedPolicy(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFeedPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFeedPolicyAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteFunction(array $args = [])
 * @phpstan-method \Aws\Result deleteFunction(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFunctionAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteQuestionSet(array $args = [])
 * @phpstan-method \Aws\Result deleteQuestionSet(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQuestionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQuestionSetAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteQuestionSetVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteQuestionSetVersion(array{id?: string, questionSetVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQuestionSetVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQuestionSetVersionAsync(array{id?: string, questionSetVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteScheduleAction(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduleAction(array{id?: string, actionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduleActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduleActionAsync(array{id?: string, actionName?: string, ...} $args = [])
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
 * @method \Aws\Result getFeedPolicy(array $args = [])
 * @phpstan-method \Aws\Result getFeedPolicy(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFeedPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFeedPolicyAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getFixture(array $args = [])
 * @phpstan-method \Aws\Result getFixture(array{fixtureId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFixtureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFixtureAsync(array{fixtureId?: string, ...} $args = [])
 * @method \Aws\Result getFunction(array $args = [])
 * @phpstan-method \Aws\Result getFunction(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getQuestionSet(array $args = [])
 * @phpstan-method \Aws\Result getQuestionSet(array{id?: string, questionSetVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQuestionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQuestionSetAsync(array{id?: string, questionSetVersion?: string, ...} $args = [])
 * @method \Aws\Result listDictionaries(array $args = [])
 * @phpstan-method \Aws\Result listDictionaries(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDictionariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDictionariesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFeeds(array $args = [])
 * @phpstan-method \Aws\Result listFeeds(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFeedsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFeedsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFunctions(array $args = [])
 * @phpstan-method \Aws\Result listFunctions(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listQuestionSetVersions(array $args = [])
 * @phpstan-method \Aws\Result listQuestionSetVersions(array{id?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQuestionSetVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQuestionSetVersionsAsync(array{id?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listQuestionSets(array $args = [])
 * @phpstan-method \Aws\Result listQuestionSets(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQuestionSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQuestionSetsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listScheduleActions(array $args = [])
 * @phpstan-method \Aws\Result listScheduleActions(array{id?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScheduleActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScheduleActionsAsync(array{id?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putFeedPolicy(array $args = [])
 * @phpstan-method \Aws\Result putFeedPolicy(array{id?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putFeedPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFeedPolicyAsync(array{id?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result searchFixtures(array $args = [])
 * @phpstan-method \Aws\Result searchFixtures(array{
 *     sport?: 'american-football'|'basketball',
 *     startDate?: string,
 *     endDate?: string,
 *     filters?: list<array{name?: 'COMPETITOR', values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchFixturesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchFixturesAsync(array{
 *     sport?: 'american-football'|'basketball',
 *     startDate?: string,
 *     endDate?: string,
 *     filters?: list<array{name?: 'COMPETITOR', values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDictionary(array $args = [])
 * @phpstan-method \Aws\Result updateDictionary(array{id?: string, name?: string, language?: 'ara'|'deu'|'eng'|'fra'|'ita'|'por'|'spa', entries?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDictionaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDictionaryAsync(array{id?: string, name?: string, language?: 'ara'|'deu'|'eng'|'fra'|'ita'|'por'|'spa', entries?: string, ...} $args = [])
 * @method \Aws\Result updateFeed(array $args = [])
 * @phpstan-method \Aws\Result updateFeed(array{
 *     name?: string,
 *     accessRoleArn?: string,
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
 *     accessRoleArn?: string,
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
 * @method \Aws\Result updateFunction(array $args = [])
 * @phpstan-method \Aws\Result updateFunction(array{
 *     id?: string,
 *     name?: string,
 *     target?: array{bedrock?: array{api?: 'INVOKE_MODEL', model?: string, ...}, passthrough?: array, ...},
 *     requestExpression?: string,
 *     responseExpression?: string,
 *     description?: string,
 *     eventBridgeDelivery?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFunctionAsync(array{
 *     id?: string,
 *     name?: string,
 *     target?: array{bedrock?: array{api?: 'INVOKE_MODEL', model?: string, ...}, passthrough?: array, ...},
 *     requestExpression?: string,
 *     responseExpression?: string,
 *     description?: string,
 *     eventBridgeDelivery?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQuestionSet(array $args = [])
 * @phpstan-method \Aws\Result updateQuestionSet(array{
 *     id?: string,
 *     yesNo?: list<array{name?: string, question?: string, ...}>,
 *     yesNoPerOption?: list<array{name?: string, question?: string, options?: list<array>, ...}>,
 *     chooseOne?: list<array{name?: string, question?: string, options?: list<array>, ...}>,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQuestionSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQuestionSetAsync(array{
 *     id?: string,
 *     yesNo?: list<array{name?: string, question?: string, ...}>,
 *     yesNoPerOption?: list<array{name?: string, question?: string, options?: list<array>, ...}>,
 *     chooseOne?: list<array{name?: string, question?: string, options?: list<array>, ...}>,
 *     name?: string,
 *     ...,
 * } $args = [])
 */
class ElementalInferenceClient extends AwsClient {}
