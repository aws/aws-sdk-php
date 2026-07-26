<?php
namespace Aws\BedrockDataAutomationRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Runtime for Amazon Bedrock Data Automation** service.
 * @method \Aws\Result getDataAutomationStatus(array $args = [])
 * @phpstan-method \Aws\Result getDataAutomationStatus(array{invocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataAutomationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataAutomationStatusAsync(array{invocationArn?: string, ...} $args = [])
 * @method \Aws\Result invokeDataAutomation(array $args = [])
 * @phpstan-method \Aws\Result invokeDataAutomation(array{
 *     inputConfiguration?: array{bytes?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *     dataAutomationConfiguration?: array{dataAutomationProjectArn?: string, stage?: 'DEVELOPMENT'|'LIVE', ...},
 *     blueprints?: list<array{blueprintArn?: string, version?: string, stage?: 'DEVELOPMENT'|'LIVE', ...}>,
 *     dataAutomationProfileArn?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     outputConfiguration?: array{s3Uri?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeDataAutomationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeDataAutomationAsync(array{
 *     inputConfiguration?: array{bytes?: string|resource|\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *     dataAutomationConfiguration?: array{dataAutomationProjectArn?: string, stage?: 'DEVELOPMENT'|'LIVE', ...},
 *     blueprints?: list<array{blueprintArn?: string, version?: string, stage?: 'DEVELOPMENT'|'LIVE', ...}>,
 *     dataAutomationProfileArn?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     outputConfiguration?: array{s3Uri?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeDataAutomationAsync(array $args = [])
 * @phpstan-method \Aws\Result invokeDataAutomationAsync(array{
 *     clientToken?: string,
 *     inputConfiguration?: array{s3Uri?: string, assetProcessingConfiguration?: array{video?: array, ...}, ...},
 *     outputConfiguration?: array{s3Uri?: string, ...},
 *     dataAutomationConfiguration?: array{dataAutomationProjectArn?: string, stage?: 'DEVELOPMENT'|'LIVE', ...},
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     notificationConfiguration?: array{eventBridgeConfiguration?: array{eventBridgeEnabled?: bool, ...}, ...},
 *     blueprints?: list<array{blueprintArn?: string, version?: string, stage?: 'DEVELOPMENT'|'LIVE', ...}>,
 *     dataAutomationProfileArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeDataAutomationAsyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeDataAutomationAsyncAsync(array{
 *     clientToken?: string,
 *     inputConfiguration?: array{s3Uri?: string, assetProcessingConfiguration?: array{video?: array, ...}, ...},
 *     outputConfiguration?: array{s3Uri?: string, ...},
 *     dataAutomationConfiguration?: array{dataAutomationProjectArn?: string, stage?: 'DEVELOPMENT'|'LIVE', ...},
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     notificationConfiguration?: array{eventBridgeConfiguration?: array{eventBridgeEnabled?: bool, ...}, ...},
 *     blueprints?: list<array{blueprintArn?: string, version?: string, stage?: 'DEVELOPMENT'|'LIVE', ...}>,
 *     dataAutomationProfileArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceARN?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 */
class BedrockDataAutomationRuntimeClient extends AwsClient {}
