<?php
namespace Aws\AgentDiscovery;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Agent Discovery** service.
 * @method \Aws\Result searchPublicRecords(array $args = [])
 * @phpstan-method \Aws\Result searchPublicRecords(array{searchQuery?: string, filters?: array, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise searchPublicRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchPublicRecordsAsync(array{searchQuery?: string, filters?: array, maxResults?: int, nextToken?: string, ...} $args = [])
 */
class AgentDiscoveryClient extends AwsClient {}
