<?php
namespace Aws\OAM;

use Aws\AwsClient;

/**
 * This client is used to interact with the **CloudWatch Observability Access Manager** service.
 * @method \Aws\Result createLink(array $args = [])
 * @phpstan-method \Aws\Result createLink(array{
 *     LabelTemplate?: string,
 *     LinkConfiguration?: array{
 *         LogGroupConfiguration?: array{Filter?: string, ...},
 *         MetricConfiguration?: array{Filter?: string, ...},
 *         ...,
 *     },
 *     ResourceTypes?: list<'AWS::ApplicationInsights::Application'|'AWS::ApplicationSignals::Service'|'AWS::ApplicationSignals::ServiceLevelObjective'|'AWS::CloudWatch::Metric'|'AWS::InternetMonitor::Monitor'|'AWS::Logs::LogGroup'|'AWS::XRay::Trace'>,
 *     SinkIdentifier?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLinkAsync(array{
 *     LabelTemplate?: string,
 *     LinkConfiguration?: array{
 *         LogGroupConfiguration?: array{Filter?: string, ...},
 *         MetricConfiguration?: array{Filter?: string, ...},
 *         ...,
 *     },
 *     ResourceTypes?: list<'AWS::ApplicationInsights::Application'|'AWS::ApplicationSignals::Service'|'AWS::ApplicationSignals::ServiceLevelObjective'|'AWS::CloudWatch::Metric'|'AWS::InternetMonitor::Monitor'|'AWS::Logs::LogGroup'|'AWS::XRay::Trace'>,
 *     SinkIdentifier?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSink(array $args = [])
 * @phpstan-method \Aws\Result createSink(array{Name?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSinkAsync(array{Name?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteLink(array $args = [])
 * @phpstan-method \Aws\Result deleteLink(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLinkAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteSink(array $args = [])
 * @phpstan-method \Aws\Result deleteSink(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSinkAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getLink(array $args = [])
 * @phpstan-method \Aws\Result getLink(array{Identifier?: string, IncludeTags?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLinkAsync(array{Identifier?: string, IncludeTags?: bool, ...} $args = [])
 * @method \Aws\Result getSink(array $args = [])
 * @phpstan-method \Aws\Result getSink(array{Identifier?: string, IncludeTags?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSinkAsync(array{Identifier?: string, IncludeTags?: bool, ...} $args = [])
 * @method \Aws\Result getSinkPolicy(array $args = [])
 * @phpstan-method \Aws\Result getSinkPolicy(array{SinkIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSinkPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSinkPolicyAsync(array{SinkIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listAttachedLinks(array $args = [])
 * @phpstan-method \Aws\Result listAttachedLinks(array{MaxResults?: int, NextToken?: string, SinkIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachedLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachedLinksAsync(array{MaxResults?: int, NextToken?: string, SinkIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listLinks(array $args = [])
 * @phpstan-method \Aws\Result listLinks(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLinksAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSinks(array $args = [])
 * @phpstan-method \Aws\Result listSinks(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSinksAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putSinkPolicy(array $args = [])
 * @phpstan-method \Aws\Result putSinkPolicy(array{Policy?: string, SinkIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putSinkPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSinkPolicyAsync(array{Policy?: string, SinkIdentifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateLink(array $args = [])
 * @phpstan-method \Aws\Result updateLink(array{
 *     Identifier?: string,
 *     IncludeTags?: bool,
 *     LinkConfiguration?: array{
 *         LogGroupConfiguration?: array{Filter?: string, ...},
 *         MetricConfiguration?: array{Filter?: string, ...},
 *         ...,
 *     },
 *     ResourceTypes?: list<'AWS::ApplicationInsights::Application'|'AWS::ApplicationSignals::Service'|'AWS::ApplicationSignals::ServiceLevelObjective'|'AWS::CloudWatch::Metric'|'AWS::InternetMonitor::Monitor'|'AWS::Logs::LogGroup'|'AWS::XRay::Trace'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLinkAsync(array{
 *     Identifier?: string,
 *     IncludeTags?: bool,
 *     LinkConfiguration?: array{
 *         LogGroupConfiguration?: array{Filter?: string, ...},
 *         MetricConfiguration?: array{Filter?: string, ...},
 *         ...,
 *     },
 *     ResourceTypes?: list<'AWS::ApplicationInsights::Application'|'AWS::ApplicationSignals::Service'|'AWS::ApplicationSignals::ServiceLevelObjective'|'AWS::CloudWatch::Metric'|'AWS::InternetMonitor::Monitor'|'AWS::Logs::LogGroup'|'AWS::XRay::Trace'>,
 *     ...,
 * } $args = [])
 */
class OAMClient extends AwsClient {}
