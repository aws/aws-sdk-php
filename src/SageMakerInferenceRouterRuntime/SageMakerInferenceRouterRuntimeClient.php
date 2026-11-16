<?php
namespace Aws\SageMakerInferenceRouterRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker Inference Router Runtime** service.
 * @method \Aws\Result invokeInferenceRouter(array $args = [])
 * @phpstan-method \Aws\Result invokeInferenceRouter(array{
 *     InferenceRouterName?: string,
 *     RoutingTargetName?: string,
 *     ContentType?: string,
 *     Accept?: string,
 *     InferenceId?: string,
 *     PrefixAwareId?: string,
 *     CustomAttributes?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeInferenceRouterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeInferenceRouterAsync(array{
 *     InferenceRouterName?: string,
 *     RoutingTargetName?: string,
 *     ContentType?: string,
 *     Accept?: string,
 *     InferenceId?: string,
 *     PrefixAwareId?: string,
 *     CustomAttributes?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeInferenceRouterAsync(array $args = [])
 * @phpstan-method \Aws\Result invokeInferenceRouterAsync(array{
 *     InferenceRouterName?: string,
 *     RoutingTargetName?: string,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     InferenceId?: string,
 *     InputLocation?: string,
 *     S3OutputPathExtension?: string,
 *     Filename?: string,
 *     RequestTTLSeconds?: int,
 *     InvocationTimeoutSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeInferenceRouterAsyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeInferenceRouterAsyncAsync(array{
 *     InferenceRouterName?: string,
 *     RoutingTargetName?: string,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     InferenceId?: string,
 *     InputLocation?: string,
 *     S3OutputPathExtension?: string,
 *     Filename?: string,
 *     RequestTTLSeconds?: int,
 *     InvocationTimeoutSeconds?: int,
 *     ...,
 * } $args = [])
 */
class SageMakerInferenceRouterRuntimeClient extends AwsClient {}
