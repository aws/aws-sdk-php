<?php
namespace Aws\DSQL;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Aurora DSQL** service.
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     deletionProtectionEnabled?: bool,
 *     kmsEncryptionKey?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     multiRegionProperties?: array{witnessRegion?: string, clusters?: list<string>, ...},
 *     policy?: string,
 *     bypassPolicyLockoutSafetyCheck?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     deletionProtectionEnabled?: bool,
 *     kmsEncryptionKey?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     multiRegionProperties?: array{witnessRegion?: string, clusters?: list<string>, ...},
 *     policy?: string,
 *     bypassPolicyLockoutSafetyCheck?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStream(array $args = [])
 * @phpstan-method \Aws\Result createStream(array{
 *     clusterIdentifier?: string,
 *     targetDefinition?: array{kinesis?: array{streamArn?: string, roleArn?: string, ...}, ...},
 *     ordering?: 'UNORDERED',
 *     format?: 'JSON',
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamAsync(array{
 *     clusterIdentifier?: string,
 *     targetDefinition?: array{kinesis?: array{streamArn?: string, roleArn?: string, ...}, ...},
 *     ordering?: 'UNORDERED',
 *     format?: 'JSON',
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{identifier?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{identifier?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteClusterPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteClusterPolicy(array{identifier?: string, expectedPolicyVersion?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterPolicyAsync(array{identifier?: string, expectedPolicyVersion?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteStream(array $args = [])
 * @phpstan-method \Aws\Result deleteStream(array{clusterIdentifier?: string, streamIdentifier?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStreamAsync(array{clusterIdentifier?: string, streamIdentifier?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getCluster(array $args = [])
 * @phpstan-method \Aws\Result getCluster(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClusterAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getClusterPolicy(array $args = [])
 * @phpstan-method \Aws\Result getClusterPolicy(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClusterPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClusterPolicyAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getStream(array $args = [])
 * @phpstan-method \Aws\Result getStream(array{clusterIdentifier?: string, streamIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStreamAsync(array{clusterIdentifier?: string, streamIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getVpcEndpointServiceName(array $args = [])
 * @phpstan-method \Aws\Result getVpcEndpointServiceName(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVpcEndpointServiceNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVpcEndpointServiceNameAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listStreams(array $args = [])
 * @phpstan-method \Aws\Result listStreams(array{clusterIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamsAsync(array{clusterIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putClusterPolicy(array $args = [])
 * @phpstan-method \Aws\Result putClusterPolicy(array{
 *     identifier?: string,
 *     policy?: string,
 *     bypassPolicyLockoutSafetyCheck?: bool,
 *     expectedPolicyVersion?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putClusterPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putClusterPolicyAsync(array{
 *     identifier?: string,
 *     policy?: string,
 *     bypassPolicyLockoutSafetyCheck?: bool,
 *     expectedPolicyVersion?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCluster(array $args = [])
 * @phpstan-method \Aws\Result updateCluster(array{
 *     identifier?: string,
 *     deletionProtectionEnabled?: bool,
 *     kmsEncryptionKey?: string,
 *     clientToken?: string,
 *     multiRegionProperties?: array{witnessRegion?: string, clusters?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterAsync(array{
 *     identifier?: string,
 *     deletionProtectionEnabled?: bool,
 *     kmsEncryptionKey?: string,
 *     clientToken?: string,
 *     multiRegionProperties?: array{witnessRegion?: string, clusters?: list<string>, ...},
 *     ...,
 * } $args = [])
 */
class DSQLClient extends AwsClient {}
