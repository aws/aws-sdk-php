<?php
namespace Aws\Comprehend;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Comprehend** service.
 * @method \Aws\Result batchDetectDominantLanguage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectDominantLanguageAsync(array $args = [])
 * @method \Aws\Result batchDetectEntities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectEntitiesAsync(array $args = [])
 * @method \Aws\Result batchDetectKeyPhrases(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectKeyPhrasesAsync(array $args = [])
 * @method \Aws\Result batchDetectSentiment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectSentimentAsync(array $args = [])
 * @method \Aws\Result describeTopicsDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTopicsDetectionJobAsync(array $args = [])
 * @method \Aws\Result detectDominantLanguage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectDominantLanguageAsync(array $args = [])
 * @method \Aws\Result detectEntities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectEntitiesAsync(array $args = [])
 * @method \Aws\Result detectKeyPhrases(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectKeyPhrasesAsync(array $args = [])
 * @method \Aws\Result detectSentiment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectSentimentAsync(array $args = [])
 * @method \Aws\Result listTopicsDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicsDetectionJobsAsync(array $args = [])
 * @method \Aws\Result startTopicsDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startTopicsDetectionJobAsync(array $args = [])
 */
class ComprehendClient extends AwsClient {}
