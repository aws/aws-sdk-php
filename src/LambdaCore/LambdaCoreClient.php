<?php
namespace Aws\LambdaCore;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Lambda Core** service.
 * @method \Aws\Result createNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result createNetworkConnector(array{
 *     Name?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNetworkConnectorAsync(array{
 *     Name?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteNetworkConnector(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNetworkConnectorAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result getNetworkConnector(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkConnectorAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result listNetworkConnectors(array $args = [])
 * @phpstan-method \Aws\Result listNetworkConnectors(array{
 *     State?: 'ACTIVE'|'DELETE_FAILED'|'DELETING'|'FAILED'|'INACTIVE'|'PENDING',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkConnectorsAsync(array{
 *     State?: 'ACTIVE'|'DELETE_FAILED'|'DELETING'|'FAILED'|'INACTIVE'|'PENDING',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result updateNetworkConnector(array{
 *     Identifier?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkConnectorAsync(array{
 *     Identifier?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 */
class LambdaCoreClient extends AwsClient {}
