<?php
namespace Aws\WorkMailMessageFlow;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon WorkMail Message Flow** service.
 * @method \Aws\Result getRawMessageContent(array $args = [])
 * @phpstan-method \Aws\Result getRawMessageContent(array{messageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRawMessageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRawMessageContentAsync(array{messageId?: string, ...} $args = [])
 * @method \Aws\Result putRawMessageContent(array $args = [])
 * @phpstan-method \Aws\Result putRawMessageContent(array{
 *     messageId?: string,
 *     content?: array{s3Reference?: array{bucket?: string, key?: string, objectVersion?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRawMessageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRawMessageContentAsync(array{
 *     messageId?: string,
 *     content?: array{s3Reference?: array{bucket?: string, key?: string, objectVersion?: string, ...}, ...},
 *     ...,
 * } $args = [])
 */
class WorkMailMessageFlowClient extends AwsClient {}
