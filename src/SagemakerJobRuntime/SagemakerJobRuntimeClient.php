<?php
namespace Aws\SagemakerJobRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Sagemaker Job Runtime Service** service.
 * @method \Aws\Result completeRollout(array $args = [])
 * @phpstan-method \Aws\Result completeRollout(array{JobArn?: string, TrajectoryId?: string, Status?: 'failed'|'ready', ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise completeRolloutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeRolloutAsync(array{JobArn?: string, TrajectoryId?: string, Status?: 'failed'|'ready', ClientToken?: string, ...} $args = [])
 * @method \Aws\Result sample(array $args = [])
 * @phpstan-method \Aws\Result sample(array{JobArn?: string, TrajectoryId?: string, Body?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sampleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sampleAsync(array{JobArn?: string, TrajectoryId?: string, Body?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \Aws\Result sampleWithResponseStream(array $args = [])
 * @phpstan-method \Aws\Result sampleWithResponseStream(array{JobArn?: string, TrajectoryId?: string, Body?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sampleWithResponseStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sampleWithResponseStreamAsync(array{JobArn?: string, TrajectoryId?: string, Body?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \Aws\Result updateReward(array $args = [])
 * @phpstan-method \Aws\Result updateReward(array{JobArn?: string, TrajectoryId?: string, Rewards?: list<float>, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRewardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRewardAsync(array{JobArn?: string, TrajectoryId?: string, Rewards?: list<float>, ClientToken?: string, ...} $args = [])
 */
class SagemakerJobRuntimeClient extends AwsClient {}
