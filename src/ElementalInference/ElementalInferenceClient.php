<?php
namespace Aws\ElementalInference;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental Inference** service.
 * @method \Aws\Result associateFeed(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateFeedAsync(array $args = [])
 * @method \Aws\Result createFeed(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createFeedAsync(array $args = [])
 * @method \Aws\Result deleteFeed(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFeedAsync(array $args = [])
 * @method \Aws\Result disassociateFeed(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFeedAsync(array $args = [])
 * @method \Aws\Result getFeed(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFeedAsync(array $args = [])
 * @method \Aws\Result listFeeds(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFeedsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateFeed(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFeedAsync(array $args = [])
 */
class ElementalInferenceClient extends AwsClient {}
