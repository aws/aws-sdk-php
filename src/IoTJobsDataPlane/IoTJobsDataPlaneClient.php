<?php
namespace Aws\IoTJobsDataPlane;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Jobs Data Plane** service.
 * @method \Aws\Result describeJobExecution(array $args = [])
 * @phpstan-method \Aws\Result describeJobExecution(array{jobId?: string, thingName?: string, includeJobDocument?: bool, executionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobExecutionAsync(array{jobId?: string, thingName?: string, includeJobDocument?: bool, executionNumber?: int, ...} $args = [])
 * @method \Aws\Result getPendingJobExecutions(array $args = [])
 * @phpstan-method \Aws\Result getPendingJobExecutions(array{thingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPendingJobExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPendingJobExecutionsAsync(array{thingName?: string, ...} $args = [])
 * @method \Aws\Result startCommandExecution(array $args = [])
 * @phpstan-method \Aws\Result startCommandExecution(array{
 *     targetArn?: string,
 *     commandArn?: string,
 *     parameters?: array<string, array{
 *         S?: string,
 *         B?: bool,
 *         I?: int,
 *         L?: int,
 *         D?: float,
 *         BIN?: string|resource|\Psr\Http\Message\StreamInterface,
 *         UL?: string,
 *         ...,
 *     }>,
 *     executionTimeoutSeconds?: int,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCommandExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCommandExecutionAsync(array{
 *     targetArn?: string,
 *     commandArn?: string,
 *     parameters?: array<string, array{
 *         S?: string,
 *         B?: bool,
 *         I?: int,
 *         L?: int,
 *         D?: float,
 *         BIN?: string|resource|\Psr\Http\Message\StreamInterface,
 *         UL?: string,
 *         ...,
 *     }>,
 *     executionTimeoutSeconds?: int,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startNextPendingJobExecution(array $args = [])
 * @phpstan-method \Aws\Result startNextPendingJobExecution(array{thingName?: string, statusDetails?: array<string, string>, stepTimeoutInMinutes?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startNextPendingJobExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNextPendingJobExecutionAsync(array{thingName?: string, statusDetails?: array<string, string>, stepTimeoutInMinutes?: int, ...} $args = [])
 * @method \Aws\Result updateJobExecution(array $args = [])
 * @phpstan-method \Aws\Result updateJobExecution(array{
 *     jobId?: string,
 *     thingName?: string,
 *     status?: 'CANCELED'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'REJECTED'|'REMOVED'|'SUCCEEDED'|'TIMED_OUT',
 *     statusDetails?: array<string, string>,
 *     stepTimeoutInMinutes?: int,
 *     expectedVersion?: int,
 *     includeJobExecutionState?: bool,
 *     includeJobDocument?: bool,
 *     executionNumber?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJobExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobExecutionAsync(array{
 *     jobId?: string,
 *     thingName?: string,
 *     status?: 'CANCELED'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'REJECTED'|'REMOVED'|'SUCCEEDED'|'TIMED_OUT',
 *     statusDetails?: array<string, string>,
 *     stepTimeoutInMinutes?: int,
 *     expectedVersion?: int,
 *     includeJobExecutionState?: bool,
 *     includeJobDocument?: bool,
 *     executionNumber?: int,
 *     ...,
 * } $args = [])
 */
class IoTJobsDataPlaneClient extends AwsClient {}
