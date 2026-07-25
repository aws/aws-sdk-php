<?php
namespace Aws\ApiGatewayManagementApi;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonApiGatewayManagementApi** service.
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{ConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{ConnectionId?: string, ...} $args = [])
 * @method \Aws\Result getConnection(array $args = [])
 * @phpstan-method \Aws\Result getConnection(array{ConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionAsync(array{ConnectionId?: string, ...} $args = [])
 * @method \Aws\Result postToConnection(array $args = [])
 * @phpstan-method \Aws\Result postToConnection(array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ConnectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise postToConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postToConnectionAsync(array{Data?: string|resource|\Psr\Http\Message\StreamInterface, ConnectionId?: string, ...} $args = [])
 */
class ApiGatewayManagementApiClient extends AwsClient {}
