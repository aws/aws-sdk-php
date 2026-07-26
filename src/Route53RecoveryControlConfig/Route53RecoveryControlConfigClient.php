<?php
namespace Aws\Route53RecoveryControlConfig;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Route53 Recovery Control Config** service.
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     ClientToken?: string,
 *     ClusterName?: string,
 *     Tags?: array<string, string>,
 *     NetworkType?: 'DUALSTACK'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     ClientToken?: string,
 *     ClusterName?: string,
 *     Tags?: array<string, string>,
 *     NetworkType?: 'DUALSTACK'|'IPV4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createControlPanel(array $args = [])
 * @phpstan-method \Aws\Result createControlPanel(array{ClientToken?: string, ClusterArn?: string, ControlPanelName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createControlPanelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createControlPanelAsync(array{ClientToken?: string, ClusterArn?: string, ControlPanelName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createRoutingControl(array $args = [])
 * @phpstan-method \Aws\Result createRoutingControl(array{ClientToken?: string, ClusterArn?: string, ControlPanelArn?: string, RoutingControlName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoutingControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRoutingControlAsync(array{ClientToken?: string, ClusterArn?: string, ControlPanelArn?: string, RoutingControlName?: string, ...} $args = [])
 * @method \Aws\Result createSafetyRule(array $args = [])
 * @phpstan-method \Aws\Result createSafetyRule(array{
 *     AssertionRule?: array{
 *         AssertedControls?: list<string>,
 *         ControlPanelArn?: string,
 *         Name?: string,
 *         RuleConfig?: array{Inverted?: bool, Threshold?: int, Type?: 'AND'|'ATLEAST'|'OR', ...},
 *         WaitPeriodMs?: int,
 *         ...,
 *     },
 *     ClientToken?: string,
 *     GatingRule?: array{
 *         ControlPanelArn?: string,
 *         GatingControls?: list<string>,
 *         Name?: string,
 *         RuleConfig?: array{Inverted?: bool, Threshold?: int, Type?: 'AND'|'ATLEAST'|'OR', ...},
 *         TargetControls?: list<string>,
 *         WaitPeriodMs?: int,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSafetyRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSafetyRuleAsync(array{
 *     AssertionRule?: array{
 *         AssertedControls?: list<string>,
 *         ControlPanelArn?: string,
 *         Name?: string,
 *         RuleConfig?: array{Inverted?: bool, Threshold?: int, Type?: 'AND'|'ATLEAST'|'OR', ...},
 *         WaitPeriodMs?: int,
 *         ...,
 *     },
 *     ClientToken?: string,
 *     GatingRule?: array{
 *         ControlPanelArn?: string,
 *         GatingControls?: list<string>,
 *         Name?: string,
 *         RuleConfig?: array{Inverted?: bool, Threshold?: int, Type?: 'AND'|'ATLEAST'|'OR', ...},
 *         TargetControls?: list<string>,
 *         WaitPeriodMs?: int,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{ClusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{ClusterArn?: string, ...} $args = [])
 * @method \Aws\Result deleteControlPanel(array $args = [])
 * @phpstan-method \Aws\Result deleteControlPanel(array{ControlPanelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteControlPanelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteControlPanelAsync(array{ControlPanelArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRoutingControl(array $args = [])
 * @phpstan-method \Aws\Result deleteRoutingControl(array{RoutingControlArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoutingControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRoutingControlAsync(array{RoutingControlArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSafetyRule(array $args = [])
 * @phpstan-method \Aws\Result deleteSafetyRule(array{SafetyRuleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSafetyRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSafetyRuleAsync(array{SafetyRuleArn?: string, ...} $args = [])
 * @method \Aws\Result describeCluster(array $args = [])
 * @phpstan-method \Aws\Result describeCluster(array{ClusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterAsync(array{ClusterArn?: string, ...} $args = [])
 * @method \Aws\Result describeControlPanel(array $args = [])
 * @phpstan-method \Aws\Result describeControlPanel(array{ControlPanelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeControlPanelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeControlPanelAsync(array{ControlPanelArn?: string, ...} $args = [])
 * @method \Aws\Result describeRoutingControl(array $args = [])
 * @phpstan-method \Aws\Result describeRoutingControl(array{RoutingControlArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRoutingControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRoutingControlAsync(array{RoutingControlArn?: string, ...} $args = [])
 * @method \Aws\Result describeSafetyRule(array $args = [])
 * @phpstan-method \Aws\Result describeSafetyRule(array{SafetyRuleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSafetyRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSafetyRuleAsync(array{SafetyRuleArn?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listAssociatedRoute53HealthChecks(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedRoute53HealthChecks(array{MaxResults?: int, NextToken?: string, RoutingControlArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedRoute53HealthChecksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedRoute53HealthChecksAsync(array{MaxResults?: int, NextToken?: string, RoutingControlArn?: string, ...} $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listControlPanels(array $args = [])
 * @phpstan-method \Aws\Result listControlPanels(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listControlPanelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listControlPanelsAsync(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRoutingControls(array $args = [])
 * @phpstan-method \Aws\Result listRoutingControls(array{ControlPanelArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoutingControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoutingControlsAsync(array{ControlPanelArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSafetyRules(array $args = [])
 * @phpstan-method \Aws\Result listSafetyRules(array{ControlPanelArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSafetyRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSafetyRulesAsync(array{ControlPanelArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCluster(array $args = [])
 * @phpstan-method \Aws\Result updateCluster(array{ClusterArn?: string, NetworkType?: 'DUALSTACK'|'IPV4', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterAsync(array{ClusterArn?: string, NetworkType?: 'DUALSTACK'|'IPV4', ...} $args = [])
 * @method \Aws\Result updateControlPanel(array $args = [])
 * @phpstan-method \Aws\Result updateControlPanel(array{ControlPanelArn?: string, ControlPanelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateControlPanelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateControlPanelAsync(array{ControlPanelArn?: string, ControlPanelName?: string, ...} $args = [])
 * @method \Aws\Result updateRoutingControl(array $args = [])
 * @phpstan-method \Aws\Result updateRoutingControl(array{RoutingControlArn?: string, RoutingControlName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoutingControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoutingControlAsync(array{RoutingControlArn?: string, RoutingControlName?: string, ...} $args = [])
 * @method \Aws\Result updateSafetyRule(array $args = [])
 * @phpstan-method \Aws\Result updateSafetyRule(array{
 *     AssertionRuleUpdate?: array{Name?: string, SafetyRuleArn?: string, WaitPeriodMs?: int, ...},
 *     GatingRuleUpdate?: array{Name?: string, SafetyRuleArn?: string, WaitPeriodMs?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSafetyRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSafetyRuleAsync(array{
 *     AssertionRuleUpdate?: array{Name?: string, SafetyRuleArn?: string, WaitPeriodMs?: int, ...},
 *     GatingRuleUpdate?: array{Name?: string, SafetyRuleArn?: string, WaitPeriodMs?: int, ...},
 *     ...,
 * } $args = [])
 */
class Route53RecoveryControlConfigClient extends AwsClient {}
