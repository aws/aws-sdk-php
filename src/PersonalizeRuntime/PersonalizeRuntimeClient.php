<?php
namespace Aws\PersonalizeRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Personalize Runtime** service.
 * @method \Aws\Result getActionRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getActionRecommendations(array{
 *     campaignArn?: string,
 *     userId?: string,
 *     numResults?: int,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getActionRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getActionRecommendationsAsync(array{
 *     campaignArn?: string,
 *     userId?: string,
 *     numResults?: int,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPersonalizedRanking(array $args = [])
 * @phpstan-method \Aws\Result getPersonalizedRanking(array{
 *     campaignArn?: string,
 *     inputList?: list<string>,
 *     userId?: string,
 *     context?: array<string, string>,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     metadataColumns?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPersonalizedRankingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPersonalizedRankingAsync(array{
 *     campaignArn?: string,
 *     inputList?: list<string>,
 *     userId?: string,
 *     context?: array<string, string>,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     metadataColumns?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getRecommendations(array{
 *     campaignArn?: string,
 *     itemId?: string,
 *     userId?: string,
 *     numResults?: int,
 *     context?: array<string, string>,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     recommenderArn?: string,
 *     promotions?: list<array{
 *         name?: string,
 *         percentPromotedItems?: int,
 *         filterArn?: string,
 *         filterValues?: array<string, string>,
 *         ...,
 *     }>,
 *     metadataColumns?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationsAsync(array{
 *     campaignArn?: string,
 *     itemId?: string,
 *     userId?: string,
 *     numResults?: int,
 *     context?: array<string, string>,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     recommenderArn?: string,
 *     promotions?: list<array{
 *         name?: string,
 *         percentPromotedItems?: int,
 *         filterArn?: string,
 *         filterValues?: array<string, string>,
 *         ...,
 *     }>,
 *     metadataColumns?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 */
class PersonalizeRuntimeClient extends AwsClient {}
