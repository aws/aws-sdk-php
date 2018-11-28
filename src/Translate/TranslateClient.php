<?php
namespace Aws\Translate;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Translate** service.
 * @method \Aws\Result deleteTerminology(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTerminologyAsync(array $args = [])
 * @method \Aws\Result getTerminology(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTerminologyAsync(array $args = [])
 * @method \Aws\Result importTerminology(array $args = [])
 * @method \GuzzleHttp\Promise\Promise importTerminologyAsync(array $args = [])
 * @method \Aws\Result listTerminologies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTerminologiesAsync(array $args = [])
 * @method \Aws\Result translateText(array $args = [])
 * @method \GuzzleHttp\Promise\Promise translateTextAsync(array $args = [])
 */
class TranslateClient extends AwsClient {}
