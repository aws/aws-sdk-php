<?php
namespace Aws\AugmentedAIRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Augmented AI Runtime** service.
 * @method \Aws\Result deleteHumanLoop(array $args = [])
 * @phpstan-method \Aws\Result deleteHumanLoop(array{HumanLoopName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHumanLoopAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHumanLoopAsync(array{HumanLoopName?: string, ...} $args = [])
 * @method \Aws\Result describeHumanLoop(array $args = [])
 * @phpstan-method \Aws\Result describeHumanLoop(array{HumanLoopName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHumanLoopAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHumanLoopAsync(array{HumanLoopName?: string, ...} $args = [])
 * @method \Aws\Result listHumanLoops(array $args = [])
 * @phpstan-method \Aws\Result listHumanLoops(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     FlowDefinitionArn?: string,
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHumanLoopsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHumanLoopsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     FlowDefinitionArn?: string,
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startHumanLoop(array $args = [])
 * @phpstan-method \Aws\Result startHumanLoop(array{
 *     HumanLoopName?: string,
 *     FlowDefinitionArn?: string,
 *     HumanLoopInput?: array{InputContent?: string, ...},
 *     DataAttributes?: array{ContentClassifiers?: list<'FreeOfAdultContent'|'FreeOfPersonallyIdentifiableInformation'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startHumanLoopAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startHumanLoopAsync(array{
 *     HumanLoopName?: string,
 *     FlowDefinitionArn?: string,
 *     HumanLoopInput?: array{InputContent?: string, ...},
 *     DataAttributes?: array{ContentClassifiers?: list<'FreeOfAdultContent'|'FreeOfPersonallyIdentifiableInformation'>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopHumanLoop(array $args = [])
 * @phpstan-method \Aws\Result stopHumanLoop(array{HumanLoopName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopHumanLoopAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopHumanLoopAsync(array{HumanLoopName?: string, ...} $args = [])
 */
class AugmentedAIRuntimeClient extends AwsClient {}
