<?php
namespace Aws\AgentRegistry;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Agent Registry** service.
 * @method \Aws\Result batchGetDiscoverableRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result batchGetDiscoverableRegistryRecord(array{entries?: list<array{registryId?: string, recordIds?: list<string>, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetDiscoverableRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetDiscoverableRegistryRecordAsync(array{entries?: list<array{registryId?: string, recordIds?: list<string>, ...}>, ...} $args = [])
 * @method \Aws\Result listDiscoverableRegistryRecords(array $args = [])
 * @phpstan-method \Aws\Result listDiscoverableRegistryRecords(array{
 *     registryId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: 'descriptorType'|'recordType', values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDiscoverableRegistryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDiscoverableRegistryRecordsAsync(array{
 *     registryId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: 'descriptorType'|'recordType', values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchDiscoverableRegistryRecords(array $args = [])
 * @phpstan-method \Aws\Result searchDiscoverableRegistryRecords(array{
 *     searchQuery?: string,
 *     registryIds?: list<string>,
 *     maxResults?: int,
 *     filters?: array,
 *     searchType?: 'HYBRID'|'KEYWORD'|'SEMANTIC',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchDiscoverableRegistryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchDiscoverableRegistryRecordsAsync(array{
 *     searchQuery?: string,
 *     registryIds?: list<string>,
 *     maxResults?: int,
 *     filters?: array,
 *     searchType?: 'HYBRID'|'KEYWORD'|'SEMANTIC',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 */
class AgentRegistryClient extends AwsClient {}
