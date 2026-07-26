<?php
namespace Aws\Cloud9;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Cloud9** service.
 * @method \Aws\Result createEnvironmentEC2(array $args = [])
 * @phpstan-method \Aws\Result createEnvironmentEC2(array{
 *     name?: string,
 *     description?: string,
 *     clientRequestToken?: string,
 *     instanceType?: string,
 *     subnetId?: string,
 *     imageId?: string,
 *     automaticStopTimeMinutes?: int,
 *     ownerArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     connectionType?: 'CONNECT_SSH'|'CONNECT_SSM',
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentEC2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentEC2Async(array{
 *     name?: string,
 *     description?: string,
 *     clientRequestToken?: string,
 *     instanceType?: string,
 *     subnetId?: string,
 *     imageId?: string,
 *     automaticStopTimeMinutes?: int,
 *     ownerArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     connectionType?: 'CONNECT_SSH'|'CONNECT_SSM',
 *     dryRun?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironmentMembership(array $args = [])
 * @phpstan-method \Aws\Result createEnvironmentMembership(array{environmentId?: string, userArn?: string, permissions?: 'read-only'|'read-write', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentMembershipAsync(array{environmentId?: string, userArn?: string, permissions?: 'read-only'|'read-write', ...} $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{environmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentMembership(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentMembership(array{environmentId?: string, userArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentMembershipAsync(array{environmentId?: string, userArn?: string, ...} $args = [])
 * @method \Aws\Result describeEnvironmentMemberships(array $args = [])
 * @phpstan-method \Aws\Result describeEnvironmentMemberships(array{
 *     userArn?: string,
 *     environmentId?: string,
 *     permissions?: list<'owner'|'read-only'|'read-write'>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEnvironmentMembershipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEnvironmentMembershipsAsync(array{
 *     userArn?: string,
 *     environmentId?: string,
 *     permissions?: list<'owner'|'read-only'|'read-write'>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEnvironmentStatus(array $args = [])
 * @phpstan-method \Aws\Result describeEnvironmentStatus(array{environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEnvironmentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEnvironmentStatusAsync(array{environmentId?: string, ...} $args = [])
 * @method \Aws\Result describeEnvironments(array $args = [])
 * @phpstan-method \Aws\Result describeEnvironments(array{environmentIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEnvironmentsAsync(array{environmentIds?: list<string>, ...} $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironment(array{
 *     environmentId?: string,
 *     name?: string,
 *     description?: string,
 *     managedCredentialsAction?: 'DISABLE'|'ENABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array{
 *     environmentId?: string,
 *     name?: string,
 *     description?: string,
 *     managedCredentialsAction?: 'DISABLE'|'ENABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnvironmentMembership(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironmentMembership(array{environmentId?: string, userArn?: string, permissions?: 'read-only'|'read-write', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentMembershipAsync(array{environmentId?: string, userArn?: string, permissions?: 'read-only'|'read-write', ...} $args = [])
 */
class Cloud9Client extends AwsClient {}
