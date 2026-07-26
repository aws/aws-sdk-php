<?php
namespace Aws\S3Outposts;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon S3 on Outposts** service.
 * @method \Aws\Result createEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createEndpoint(array{
 *     OutpostId?: string,
 *     SubnetId?: string,
 *     SecurityGroupId?: string,
 *     AccessType?: 'CustomerOwnedIp'|'Private',
 *     CustomerOwnedIpv4Pool?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEndpointAsync(array{
 *     OutpostId?: string,
 *     SubnetId?: string,
 *     SecurityGroupId?: string,
 *     AccessType?: 'CustomerOwnedIp'|'Private',
 *     CustomerOwnedIpv4Pool?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpoint(array{EndpointId?: string, OutpostId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array{EndpointId?: string, OutpostId?: string, ...} $args = [])
 * @method \Aws\Result listEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listEndpoints(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEndpointsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listOutpostsWithS3(array $args = [])
 * @phpstan-method \Aws\Result listOutpostsWithS3(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOutpostsWithS3Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOutpostsWithS3Async(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSharedEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listSharedEndpoints(array{NextToken?: string, MaxResults?: int, OutpostId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSharedEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSharedEndpointsAsync(array{NextToken?: string, MaxResults?: int, OutpostId?: string, ...} $args = [])
 */
class S3OutpostsClient extends AwsClient {}
