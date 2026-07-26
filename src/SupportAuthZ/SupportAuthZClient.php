<?php
namespace Aws\SupportAuthZ;

use Aws\AwsClient;

/**
 * This client is used to interact with the **SupportAuthZ** service.
 * @method \Aws\Result createSupportPermit(array $args = [])
 * @phpstan-method \Aws\Result createSupportPermit(array{
 *     permit?: array{
 *         actions?: array{allActions?: array, actions?: list<string>, ...},
 *         resources?: array{allResourcesInRegion?: array, resources?: list<string>, ...},
 *         conditions?: list<array>,
 *         ...,
 *     },
 *     name?: string,
 *     description?: string,
 *     signingKeyInfo?: array{kmsKey?: string, ...},
 *     supportCaseDisplayId?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSupportPermitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSupportPermitAsync(array{
 *     permit?: array{
 *         actions?: array{allActions?: array, actions?: list<string>, ...},
 *         resources?: array{allResourcesInRegion?: array, resources?: list<string>, ...},
 *         conditions?: list<array>,
 *         ...,
 *     },
 *     name?: string,
 *     description?: string,
 *     signingKeyInfo?: array{kmsKey?: string, ...},
 *     supportCaseDisplayId?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSupportPermit(array $args = [])
 * @phpstan-method \Aws\Result deleteSupportPermit(array{supportPermitIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSupportPermitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSupportPermitAsync(array{supportPermitIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getAction(array $args = [])
 * @phpstan-method \Aws\Result getAction(array{action?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getActionAsync(array{action?: string, ...} $args = [])
 * @method \Aws\Result getSupportPermit(array $args = [])
 * @phpstan-method \Aws\Result getSupportPermit(array{supportPermitIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSupportPermitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSupportPermitAsync(array{supportPermitIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listActions(array $args = [])
 * @phpstan-method \Aws\Result listActions(array{nextToken?: string, maxResults?: int, service?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActionsAsync(array{nextToken?: string, maxResults?: int, service?: string, ...} $args = [])
 * @method \Aws\Result listSupportPermitRequests(array $args = [])
 * @phpstan-method \Aws\Result listSupportPermitRequests(array{nextToken?: string, maxResults?: int, supportCaseDisplayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSupportPermitRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSupportPermitRequestsAsync(array{nextToken?: string, maxResults?: int, supportCaseDisplayId?: string, ...} $args = [])
 * @method \Aws\Result listSupportPermits(array $args = [])
 * @phpstan-method \Aws\Result listSupportPermits(array{nextToken?: string, maxResults?: int, supportPermitStatuses?: list<'ACTIVE'|'DELETING'|'INACTIVE'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSupportPermitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSupportPermitsAsync(array{nextToken?: string, maxResults?: int, supportPermitStatuses?: list<'ACTIVE'|'DELETING'|'INACTIVE'>, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result rejectSupportPermitRequest(array $args = [])
 * @phpstan-method \Aws\Result rejectSupportPermitRequest(array{requestArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectSupportPermitRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectSupportPermitRequestAsync(array{requestArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 */
class SupportAuthZClient extends AwsClient {}
