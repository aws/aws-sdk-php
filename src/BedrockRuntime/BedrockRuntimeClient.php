<?php
namespace Aws\BedrockRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Bedrock Runtime** service.
 * @method \Aws\Result applyGuardrail(array $args = [])
 * @phpstan-method \Aws\Result applyGuardrail(array{
 *     guardrailIdentifier?: string,
 *     guardrailVersion?: string,
 *     source?: 'INPUT'|'OUTPUT',
 *     content?: list<array{text?: array, image?: array, ...}>,
 *     outputScope?: 'FULL'|'INTERVENTIONS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise applyGuardrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise applyGuardrailAsync(array{
 *     guardrailIdentifier?: string,
 *     guardrailVersion?: string,
 *     source?: 'INPUT'|'OUTPUT',
 *     content?: list<array{text?: array, image?: array, ...}>,
 *     outputScope?: 'FULL'|'INTERVENTIONS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result converse(array $args = [])
 * @phpstan-method \Aws\Result converse(array{
 *     modelId?: string,
 *     messages?: list<array{role?: 'assistant'|'system'|'user', content?: list<array>, ...}>,
 *     system?: list<array{text?: string, guardContent?: array, cachePoint?: array, ...}>,
 *     inferenceConfig?: array{maxTokens?: int, temperature?: float, topP?: float, stopSequences?: list<string>, ...},
 *     toolConfig?: array{tools?: list<array>, toolChoice?: array{auto?: array, any?: array, tool?: array, ...}, ...},
 *     guardrailConfig?: array{
 *         guardrailIdentifier?: string,
 *         guardrailVersion?: string,
 *         trace?: 'disabled'|'enabled'|'enabled_full',
 *         ...,
 *     },
 *     additionalModelRequestFields?: array,
 *     promptVariables?: array<string, array{text?: string, ...}>,
 *     additionalModelResponseFieldPaths?: list<string>,
 *     requestMetadata?: array<string, string>,
 *     performanceConfig?: array{latency?: 'optimized'|'standard', ...},
 *     serviceTier?: array{type?: 'default'|'flex'|'priority'|'reserved', ...},
 *     outputConfig?: array{textFormat?: array{type?: 'json_schema', structure?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise converseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise converseAsync(array{
 *     modelId?: string,
 *     messages?: list<array{role?: 'assistant'|'system'|'user', content?: list<array>, ...}>,
 *     system?: list<array{text?: string, guardContent?: array, cachePoint?: array, ...}>,
 *     inferenceConfig?: array{maxTokens?: int, temperature?: float, topP?: float, stopSequences?: list<string>, ...},
 *     toolConfig?: array{tools?: list<array>, toolChoice?: array{auto?: array, any?: array, tool?: array, ...}, ...},
 *     guardrailConfig?: array{
 *         guardrailIdentifier?: string,
 *         guardrailVersion?: string,
 *         trace?: 'disabled'|'enabled'|'enabled_full',
 *         ...,
 *     },
 *     additionalModelRequestFields?: array,
 *     promptVariables?: array<string, array{text?: string, ...}>,
 *     additionalModelResponseFieldPaths?: list<string>,
 *     requestMetadata?: array<string, string>,
 *     performanceConfig?: array{latency?: 'optimized'|'standard', ...},
 *     serviceTier?: array{type?: 'default'|'flex'|'priority'|'reserved', ...},
 *     outputConfig?: array{textFormat?: array{type?: 'json_schema', structure?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result converseStream(array $args = [])
 * @phpstan-method \Aws\Result converseStream(array{
 *     modelId?: string,
 *     messages?: list<array{role?: 'assistant'|'system'|'user', content?: list<array>, ...}>,
 *     system?: list<array{text?: string, guardContent?: array, cachePoint?: array, ...}>,
 *     inferenceConfig?: array{maxTokens?: int, temperature?: float, topP?: float, stopSequences?: list<string>, ...},
 *     toolConfig?: array{tools?: list<array>, toolChoice?: array{auto?: array, any?: array, tool?: array, ...}, ...},
 *     guardrailConfig?: array{
 *         guardrailIdentifier?: string,
 *         guardrailVersion?: string,
 *         trace?: 'disabled'|'enabled'|'enabled_full',
 *         streamProcessingMode?: 'async'|'sync',
 *         ...,
 *     },
 *     additionalModelRequestFields?: array,
 *     promptVariables?: array<string, array{text?: string, ...}>,
 *     additionalModelResponseFieldPaths?: list<string>,
 *     requestMetadata?: array<string, string>,
 *     performanceConfig?: array{latency?: 'optimized'|'standard', ...},
 *     serviceTier?: array{type?: 'default'|'flex'|'priority'|'reserved', ...},
 *     outputConfig?: array{textFormat?: array{type?: 'json_schema', structure?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise converseStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise converseStreamAsync(array{
 *     modelId?: string,
 *     messages?: list<array{role?: 'assistant'|'system'|'user', content?: list<array>, ...}>,
 *     system?: list<array{text?: string, guardContent?: array, cachePoint?: array, ...}>,
 *     inferenceConfig?: array{maxTokens?: int, temperature?: float, topP?: float, stopSequences?: list<string>, ...},
 *     toolConfig?: array{tools?: list<array>, toolChoice?: array{auto?: array, any?: array, tool?: array, ...}, ...},
 *     guardrailConfig?: array{
 *         guardrailIdentifier?: string,
 *         guardrailVersion?: string,
 *         trace?: 'disabled'|'enabled'|'enabled_full',
 *         streamProcessingMode?: 'async'|'sync',
 *         ...,
 *     },
 *     additionalModelRequestFields?: array,
 *     promptVariables?: array<string, array{text?: string, ...}>,
 *     additionalModelResponseFieldPaths?: list<string>,
 *     requestMetadata?: array<string, string>,
 *     performanceConfig?: array{latency?: 'optimized'|'standard', ...},
 *     serviceTier?: array{type?: 'default'|'flex'|'priority'|'reserved', ...},
 *     outputConfig?: array{textFormat?: array{type?: 'json_schema', structure?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result countTokens(array $args = [])
 * @phpstan-method \Aws\Result countTokens(array{
 *     modelId?: string,
 *     input?: array{
 *         invokeModel?: array{body?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         converse?: array{
 *             messages?: list<array>,
 *             system?: list<array>,
 *             toolConfig?: array,
 *             additionalModelRequestFields?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise countTokensAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise countTokensAsync(array{
 *     modelId?: string,
 *     input?: array{
 *         invokeModel?: array{body?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         converse?: array{
 *             messages?: list<array>,
 *             system?: list<array>,
 *             toolConfig?: array,
 *             additionalModelRequestFields?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAsyncInvoke(array $args = [])
 * @phpstan-method \Aws\Result getAsyncInvoke(array{invocationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAsyncInvokeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAsyncInvokeAsync(array{invocationArn?: string, ...} $args = [])
 * @method \Aws\Result invokeGuardrailChecks(array $args = [])
 * @phpstan-method \Aws\Result invokeGuardrailChecks(array{
 *     messages?: list<array{role?: 'assistant'|'system'|'user', content?: list<array>, ...}>,
 *     checks?: array{
 *         contentFilter?: array{categories?: list<array>, ...},
 *         promptAttack?: array{categories?: list<array>, ...},
 *         sensitiveInformation?: array{entities?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeGuardrailChecksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeGuardrailChecksAsync(array{
 *     messages?: list<array{role?: 'assistant'|'system'|'user', content?: list<array>, ...}>,
 *     checks?: array{
 *         contentFilter?: array{categories?: list<array>, ...},
 *         promptAttack?: array{categories?: list<array>, ...},
 *         sensitiveInformation?: array{entities?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeModel(array $args = [])
 * @phpstan-method \Aws\Result invokeModel(array{
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     contentType?: string,
 *     accept?: string,
 *     modelId?: string,
 *     trace?: 'DISABLED'|'ENABLED'|'ENABLED_FULL',
 *     guardrailIdentifier?: string,
 *     guardrailVersion?: string,
 *     performanceConfigLatency?: 'optimized'|'standard',
 *     serviceTier?: 'default'|'flex'|'priority'|'reserved',
 *     requestMetadata?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeModelAsync(array{
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     contentType?: string,
 *     accept?: string,
 *     modelId?: string,
 *     trace?: 'DISABLED'|'ENABLED'|'ENABLED_FULL',
 *     guardrailIdentifier?: string,
 *     guardrailVersion?: string,
 *     performanceConfigLatency?: 'optimized'|'standard',
 *     serviceTier?: 'default'|'flex'|'priority'|'reserved',
 *     requestMetadata?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeModelWithResponseStream(array $args = [])
 * @phpstan-method \Aws\Result invokeModelWithResponseStream(array{
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     contentType?: string,
 *     accept?: string,
 *     modelId?: string,
 *     trace?: 'DISABLED'|'ENABLED'|'ENABLED_FULL',
 *     guardrailIdentifier?: string,
 *     guardrailVersion?: string,
 *     performanceConfigLatency?: 'optimized'|'standard',
 *     serviceTier?: 'default'|'flex'|'priority'|'reserved',
 *     requestMetadata?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeModelWithResponseStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeModelWithResponseStreamAsync(array{
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     contentType?: string,
 *     accept?: string,
 *     modelId?: string,
 *     trace?: 'DISABLED'|'ENABLED'|'ENABLED_FULL',
 *     guardrailIdentifier?: string,
 *     guardrailVersion?: string,
 *     performanceConfigLatency?: 'optimized'|'standard',
 *     serviceTier?: 'default'|'flex'|'priority'|'reserved',
 *     requestMetadata?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAsyncInvokes(array $args = [])
 * @phpstan-method \Aws\Result listAsyncInvokes(array{
 *     submitTimeAfter?: int|string|\DateTimeInterface,
 *     submitTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Failed'|'InProgress',
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'SubmissionTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAsyncInvokesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAsyncInvokesAsync(array{
 *     submitTimeAfter?: int|string|\DateTimeInterface,
 *     submitTimeBefore?: int|string|\DateTimeInterface,
 *     statusEquals?: 'Completed'|'Failed'|'InProgress',
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'SubmissionTime',
 *     sortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAsyncInvoke(array $args = [])
 * @phpstan-method \Aws\Result startAsyncInvoke(array{
 *     clientRequestToken?: string,
 *     modelId?: string,
 *     modelInput?: array,
 *     outputDataConfig?: array{s3OutputDataConfig?: array{s3Uri?: string, kmsKeyId?: string, bucketOwner?: string, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAsyncInvokeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAsyncInvokeAsync(array{
 *     clientRequestToken?: string,
 *     modelId?: string,
 *     modelInput?: array,
 *     outputDataConfig?: array{s3OutputDataConfig?: array{s3Uri?: string, kmsKeyId?: string, bucketOwner?: string, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class BedrockRuntimeClient extends AwsClient {}
