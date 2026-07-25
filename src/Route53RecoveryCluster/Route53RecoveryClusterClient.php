<?php
namespace Aws\Route53RecoveryCluster;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Route53 Recovery Cluster** service.
 * @method \Aws\Result getRoutingControlState(array $args = [])
 * @phpstan-method \Aws\Result getRoutingControlState(array{RoutingControlArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRoutingControlStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRoutingControlStateAsync(array{RoutingControlArn?: string, ...} $args = [])
 * @method \Aws\Result listRoutingControls(array $args = [])
 * @phpstan-method \Aws\Result listRoutingControls(array{ControlPanelArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoutingControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoutingControlsAsync(array{ControlPanelArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result updateRoutingControlState(array $args = [])
 * @phpstan-method \Aws\Result updateRoutingControlState(array{RoutingControlArn?: string, RoutingControlState?: 'Off'|'On', SafetyRulesToOverride?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoutingControlStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoutingControlStateAsync(array{RoutingControlArn?: string, RoutingControlState?: 'Off'|'On', SafetyRulesToOverride?: list<string>, ...} $args = [])
 * @method \Aws\Result updateRoutingControlStates(array $args = [])
 * @phpstan-method \Aws\Result updateRoutingControlStates(array{
 *     UpdateRoutingControlStateEntries?: list<array{RoutingControlArn?: string, RoutingControlState?: 'Off'|'On', ...}>,
 *     SafetyRulesToOverride?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoutingControlStatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoutingControlStatesAsync(array{
 *     UpdateRoutingControlStateEntries?: list<array{RoutingControlArn?: string, RoutingControlState?: 'Off'|'On', ...}>,
 *     SafetyRulesToOverride?: list<string>,
 *     ...,
 * } $args = [])
 */
class Route53RecoveryClusterClient extends AwsClient {}
