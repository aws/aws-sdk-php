<?php
namespace Aws\SageMakerRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker Runtime** service.
 * @method \Aws\Result invokeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result invokeEndpoint(array{
 *     EndpointName?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     TargetModel?: string,
 *     TargetVariant?: string,
 *     TargetContainerHostname?: string,
 *     InferenceId?: string,
 *     EnableExplanations?: string,
 *     InferenceComponentName?: string,
 *     SessionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeEndpointAsync(array{
 *     EndpointName?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     TargetModel?: string,
 *     TargetVariant?: string,
 *     TargetContainerHostname?: string,
 *     InferenceId?: string,
 *     EnableExplanations?: string,
 *     InferenceComponentName?: string,
 *     SessionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeEndpointAsync(array $args = [])
 * @phpstan-method \Aws\Result invokeEndpointAsync(array{
 *     EndpointName?: string,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     InferenceId?: string,
 *     InputLocation?: string,
 *     S3OutputPathExtension?: string,
 *     Filename?: string,
 *     RequestTTLSeconds?: int,
 *     InvocationTimeoutSeconds?: int,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeEndpointAsyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeEndpointAsyncAsync(array{
 *     EndpointName?: string,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     InferenceId?: string,
 *     InputLocation?: string,
 *     S3OutputPathExtension?: string,
 *     Filename?: string,
 *     RequestTTLSeconds?: int,
 *     InvocationTimeoutSeconds?: int,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeEndpointWithResponseStream(array $args = [])
 * @phpstan-method \Aws\Result invokeEndpointWithResponseStream(array{
 *     EndpointName?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     TargetVariant?: string,
 *     TargetContainerHostname?: string,
 *     InferenceId?: string,
 *     InferenceComponentName?: string,
 *     SessionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeEndpointWithResponseStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeEndpointWithResponseStreamAsync(array{
 *     EndpointName?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     TargetVariant?: string,
 *     TargetContainerHostname?: string,
 *     InferenceId?: string,
 *     InferenceComponentName?: string,
 *     SessionId?: string,
 *     ...,
 * } $args = [])
 */
class SageMakerRuntimeClient extends AwsClient {}
