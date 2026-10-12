<?php
namespace Aws\SageMakerTrainingSessionRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **SageMaker Training Session Runtime** service.
 * @method \Aws\Result executeSamplingOperation(array $args = [])
 * @phpstan-method \Aws\Result executeSamplingOperation(array{
 *     trainingSessionName?: string,
 *     operationConfig?: array{
 *         sample?: array{
 *             prompt?: array,
 *             numSamples?: int,
 *             samplingParams?: array,
 *             includePromptLogprobs?: bool,
 *             topkPromptLogprobs?: int,
 *             modelPackageArn?: string,
 *             ...,
 *         },
 *         computeLogprobs?: array{prompt?: array, modelPackageArn?: string, ...},
 *         loadWeightsForSampling?: array{modelPackageArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeSamplingOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeSamplingOperationAsync(array{
 *     trainingSessionName?: string,
 *     operationConfig?: array{
 *         sample?: array{
 *             prompt?: array,
 *             numSamples?: int,
 *             samplingParams?: array,
 *             includePromptLogprobs?: bool,
 *             topkPromptLogprobs?: int,
 *             modelPackageArn?: string,
 *             ...,
 *         },
 *         computeLogprobs?: array{prompt?: array, modelPackageArn?: string, ...},
 *         loadWeightsForSampling?: array{modelPackageArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result executeTrainingOperation(array $args = [])
 * @phpstan-method \Aws\Result executeTrainingOperation(array{
 *     trainingSessionName?: string,
 *     sequenceNumber?: int,
 *     clientToken?: string,
 *     operationConfig?: array{
 *         forward?: array{
 *             lossFnName?: 'cispo'|'cross_entropy'|'importance_sampling'|'ppo',
 *             datumList?: list<array>,
 *             lossFnConfig?: array,
 *             ...,
 *         },
 *         forwardBackward?: array{
 *             lossFnName?: 'cispo'|'cross_entropy'|'importance_sampling'|'ppo',
 *             datumList?: list<array>,
 *             lossFnConfig?: array,
 *             ...,
 *         },
 *         optimizerStep?: array{adamParamsConfig?: array, ...},
 *         saveWeights?: array{mergeWeights?: bool, description?: string, ...},
 *         saveState?: array{description?: string, ...},
 *         loadState?: array{modelPackageArn?: string, loadOptimizer?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeTrainingOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeTrainingOperationAsync(array{
 *     trainingSessionName?: string,
 *     sequenceNumber?: int,
 *     clientToken?: string,
 *     operationConfig?: array{
 *         forward?: array{
 *             lossFnName?: 'cispo'|'cross_entropy'|'importance_sampling'|'ppo',
 *             datumList?: list<array>,
 *             lossFnConfig?: array,
 *             ...,
 *         },
 *         forwardBackward?: array{
 *             lossFnName?: 'cispo'|'cross_entropy'|'importance_sampling'|'ppo',
 *             datumList?: list<array>,
 *             lossFnConfig?: array,
 *             ...,
 *         },
 *         optimizerStep?: array{adamParamsConfig?: array, ...},
 *         saveWeights?: array{mergeWeights?: bool, description?: string, ...},
 *         saveState?: array{description?: string, ...},
 *         loadState?: array{modelPackageArn?: string, loadOptimizer?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSamplingOperationResult(array $args = [])
 * @phpstan-method \Aws\Result getSamplingOperationResult(array{trainingSessionName?: string, operationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSamplingOperationResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSamplingOperationResultAsync(array{trainingSessionName?: string, operationId?: string, ...} $args = [])
 * @method \Aws\Result getTrainingOperationResult(array $args = [])
 * @phpstan-method \Aws\Result getTrainingOperationResult(array{trainingSessionName?: string, operationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrainingOperationResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrainingOperationResultAsync(array{trainingSessionName?: string, operationId?: string, ...} $args = [])
 * @method \Aws\Result sampleTrainingSession(array $args = [])
 * @phpstan-method \Aws\Result sampleTrainingSession(array{
 *     trainingSessionName?: string,
 *     contentType?: string,
 *     accept?: string,
 *     modelPackageArn?: string,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sampleTrainingSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sampleTrainingSessionAsync(array{
 *     trainingSessionName?: string,
 *     contentType?: string,
 *     accept?: string,
 *     modelPackageArn?: string,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sampleTrainingSessionWithResponseStream(array $args = [])
 * @phpstan-method \Aws\Result sampleTrainingSessionWithResponseStream(array{
 *     trainingSessionName?: string,
 *     contentType?: string,
 *     accept?: string,
 *     modelPackageArn?: string,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sampleTrainingSessionWithResponseStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sampleTrainingSessionWithResponseStreamAsync(array{
 *     trainingSessionName?: string,
 *     contentType?: string,
 *     accept?: string,
 *     modelPackageArn?: string,
 *     body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 */
class SageMakerTrainingSessionRuntimeClient extends AwsClient {}
