<?php
namespace Aws\SageMakerGatewayRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker Gateway Runtime** service.
 * @method \Aws\Result invokeGlobalInferenceGateway(array $args = [])
 * @phpstan-method \Aws\Result invokeGlobalInferenceGateway(array{
 *     GatewayId?: string,
 *     Accept?: string,
 *     ContentType?: string,
 *     CustomerIdentityToken?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeGlobalInferenceGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeGlobalInferenceGatewayAsync(array{
 *     GatewayId?: string,
 *     Accept?: string,
 *     ContentType?: string,
 *     CustomerIdentityToken?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeGlobalInferenceGatewayWithResponseStream(array $args = [])
 * @phpstan-method \Aws\Result invokeGlobalInferenceGatewayWithResponseStream(array{
 *     GatewayId?: string,
 *     Accept?: string,
 *     ContentType?: string,
 *     CustomerIdentityToken?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeGlobalInferenceGatewayWithResponseStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeGlobalInferenceGatewayWithResponseStreamAsync(array{
 *     GatewayId?: string,
 *     Accept?: string,
 *     ContentType?: string,
 *     CustomerIdentityToken?: string,
 *     Body?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 */
class SageMakerGatewayRuntimeClient extends AwsClient {}
