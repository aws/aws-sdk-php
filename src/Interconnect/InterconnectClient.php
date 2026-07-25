<?php
namespace Aws\Interconnect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Interconnect** service.
 * @method \Aws\Result acceptConnectionProposal(array $args = [])
 * @phpstan-method \Aws\Result acceptConnectionProposal(array{
 *     attachPoint?: array{directConnectGateway?: string, arn?: string, ...},
 *     activationKey?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptConnectionProposalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptConnectionProposalAsync(array{
 *     attachPoint?: array{directConnectGateway?: string, arn?: string, ...},
 *     activationKey?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @phpstan-method \Aws\Result createConnection(array{
 *     description?: string,
 *     bandwidth?: string,
 *     attachPoint?: array{directConnectGateway?: string, arn?: string, ...},
 *     environmentId?: string,
 *     remoteAccount?: array{identifier?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionAsync(array{
 *     description?: string,
 *     bandwidth?: string,
 *     attachPoint?: array{directConnectGateway?: string, arn?: string, ...},
 *     environmentId?: string,
 *     remoteAccount?: array{identifier?: string, ...},
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{identifier?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{identifier?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result describeConnectionProposal(array $args = [])
 * @phpstan-method \Aws\Result describeConnectionProposal(array{activationKey?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionProposalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectionProposalAsync(array{activationKey?: string, ...} $args = [])
 * @method \Aws\Result getConnection(array $args = [])
 * @phpstan-method \Aws\Result getConnection(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result listAttachPoints(array $args = [])
 * @phpstan-method \Aws\Result listAttachPoints(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachPointsAsync(array{environmentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listConnections(array $args = [])
 * @phpstan-method \Aws\Result listConnections(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'available'|'deleted'|'deleting'|'down'|'failed'|'pending'|'requested'|'updating',
 *     environmentId?: string,
 *     provider?: array{cloudServiceProvider?: string, lastMileProvider?: string, ...},
 *     attachPoint?: array{directConnectGateway?: string, arn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectionsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'available'|'deleted'|'deleting'|'down'|'failed'|'pending'|'requested'|'updating',
 *     environmentId?: string,
 *     provider?: array{cloudServiceProvider?: string, lastMileProvider?: string, ...},
 *     attachPoint?: array{directConnectGateway?: string, arn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     provider?: array{cloudServiceProvider?: string, lastMileProvider?: string, ...},
 *     location?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     provider?: array{cloudServiceProvider?: string, lastMileProvider?: string, ...},
 *     location?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateConnection(array $args = [])
 * @phpstan-method \Aws\Result updateConnection(array{identifier?: string, description?: string, bandwidth?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionAsync(array{identifier?: string, description?: string, bandwidth?: string, clientToken?: string, ...} $args = [])
 */
class InterconnectClient extends AwsClient {}
