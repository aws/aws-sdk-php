<?php
namespace Aws\NetworkMonitor;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Network Monitor** service.
 * @method \Aws\Result createMonitor(array $args = [])
 * @phpstan-method \Aws\Result createMonitor(array{
 *     monitorName?: string,
 *     probes?: list<array{
 *         sourceArn?: string,
 *         destination?: string,
 *         destinationPort?: int,
 *         protocol?: 'ICMP'|'TCP',
 *         packetSize?: int,
 *         probeTags?: array<string, string>,
 *         ...,
 *     }>,
 *     aggregationPeriod?: int,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMonitorAsync(array{
 *     monitorName?: string,
 *     probes?: list<array{
 *         sourceArn?: string,
 *         destination?: string,
 *         destinationPort?: int,
 *         protocol?: 'ICMP'|'TCP',
 *         packetSize?: int,
 *         probeTags?: array<string, string>,
 *         ...,
 *     }>,
 *     aggregationPeriod?: int,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProbe(array $args = [])
 * @phpstan-method \Aws\Result createProbe(array{
 *     monitorName?: string,
 *     probe?: array{
 *         sourceArn?: string,
 *         destination?: string,
 *         destinationPort?: int,
 *         protocol?: 'ICMP'|'TCP',
 *         packetSize?: int,
 *         tags?: array<string, string>,
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProbeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProbeAsync(array{
 *     monitorName?: string,
 *     probe?: array{
 *         sourceArn?: string,
 *         destination?: string,
 *         destinationPort?: int,
 *         protocol?: 'ICMP'|'TCP',
 *         packetSize?: int,
 *         tags?: array<string, string>,
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteMonitor(array $args = [])
 * @phpstan-method \Aws\Result deleteMonitor(array{monitorName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMonitorAsync(array{monitorName?: string, ...} $args = [])
 * @method \Aws\Result deleteProbe(array $args = [])
 * @phpstan-method \Aws\Result deleteProbe(array{monitorName?: string, probeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProbeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProbeAsync(array{monitorName?: string, probeId?: string, ...} $args = [])
 * @method \Aws\Result getMonitor(array $args = [])
 * @phpstan-method \Aws\Result getMonitor(array{monitorName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMonitorAsync(array{monitorName?: string, ...} $args = [])
 * @method \Aws\Result getProbe(array $args = [])
 * @phpstan-method \Aws\Result getProbe(array{monitorName?: string, probeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProbeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProbeAsync(array{monitorName?: string, probeId?: string, ...} $args = [])
 * @method \Aws\Result listMonitors(array $args = [])
 * @phpstan-method \Aws\Result listMonitors(array{nextToken?: string, maxResults?: int, state?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMonitorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitorsAsync(array{nextToken?: string, maxResults?: int, state?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateMonitor(array $args = [])
 * @phpstan-method \Aws\Result updateMonitor(array{monitorName?: string, aggregationPeriod?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMonitorAsync(array{monitorName?: string, aggregationPeriod?: int, ...} $args = [])
 * @method \Aws\Result updateProbe(array $args = [])
 * @phpstan-method \Aws\Result updateProbe(array{
 *     monitorName?: string,
 *     probeId?: string,
 *     state?: 'ACTIVE'|'DELETED'|'DELETING'|'ERROR'|'INACTIVE'|'PENDING',
 *     destination?: string,
 *     destinationPort?: int,
 *     protocol?: 'ICMP'|'TCP',
 *     packetSize?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProbeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProbeAsync(array{
 *     monitorName?: string,
 *     probeId?: string,
 *     state?: 'ACTIVE'|'DELETED'|'DELETING'|'ERROR'|'INACTIVE'|'PENDING',
 *     destination?: string,
 *     destinationPort?: int,
 *     protocol?: 'ICMP'|'TCP',
 *     packetSize?: int,
 *     ...,
 * } $args = [])
 */
class NetworkMonitorClient extends AwsClient {}
