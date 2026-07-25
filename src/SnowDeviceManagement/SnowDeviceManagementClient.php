<?php
namespace Aws\SnowDeviceManagement;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Snow Device Management** service.
 * @method \Aws\Result cancelTask(array $args = [])
 * @phpstan-method \Aws\Result cancelTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result createTask(array $args = [])
 * @phpstan-method \Aws\Result createTask(array{
 *     clientToken?: string,
 *     command?: array{reboot?: array, unlock?: array, ...},
 *     description?: string,
 *     tags?: array<string, string>,
 *     targets?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTaskAsync(array{
 *     clientToken?: string,
 *     command?: array{reboot?: array, unlock?: array, ...},
 *     description?: string,
 *     tags?: array<string, string>,
 *     targets?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDevice(array $args = [])
 * @phpstan-method \Aws\Result describeDevice(array{managedDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDeviceAsync(array{managedDeviceId?: string, ...} $args = [])
 * @method \Aws\Result describeDeviceEc2Instances(array $args = [])
 * @phpstan-method \Aws\Result describeDeviceEc2Instances(array{instanceIds?: list<string>, managedDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDeviceEc2InstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDeviceEc2InstancesAsync(array{instanceIds?: list<string>, managedDeviceId?: string, ...} $args = [])
 * @method \Aws\Result describeExecution(array $args = [])
 * @phpstan-method \Aws\Result describeExecution(array{managedDeviceId?: string, taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExecutionAsync(array{managedDeviceId?: string, taskId?: string, ...} $args = [])
 * @method \Aws\Result describeTask(array $args = [])
 * @phpstan-method \Aws\Result describeTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result listDeviceResources(array $args = [])
 * @phpstan-method \Aws\Result listDeviceResources(array{managedDeviceId?: string, maxResults?: int, nextToken?: string, type?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeviceResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeviceResourcesAsync(array{managedDeviceId?: string, maxResults?: int, nextToken?: string, type?: string, ...} $args = [])
 * @method \Aws\Result listDevices(array $args = [])
 * @phpstan-method \Aws\Result listDevices(array{jobId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevicesAsync(array{jobId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listExecutions(array $args = [])
 * @phpstan-method \Aws\Result listExecutions(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'CANCELED'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'REJECTED'|'SUCCEEDED'|'TIMED_OUT',
 *     taskId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExecutionsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'CANCELED'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'REJECTED'|'SUCCEEDED'|'TIMED_OUT',
 *     taskId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTasks(array $args = [])
 * @phpstan-method \Aws\Result listTasks(array{maxResults?: int, nextToken?: string, state?: 'CANCELED'|'COMPLETED'|'IN_PROGRESS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTasksAsync(array{maxResults?: int, nextToken?: string, state?: 'CANCELED'|'COMPLETED'|'IN_PROGRESS', ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 */
class SnowDeviceManagementClient extends AwsClient {}
