<?php
namespace Aws\CloudControlApi;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Cloud Control API** service.
 * @method \Aws\Result cancelResourceRequest(array $args = [])
 * @phpstan-method \Aws\Result cancelResourceRequest(array{RequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelResourceRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelResourceRequestAsync(array{RequestToken?: string, ...} $args = [])
 * @method \Aws\Result createResource(array $args = [])
 * @phpstan-method \Aws\Result createResource(array{
 *     TypeName?: string,
 *     TypeVersionId?: string,
 *     RoleArn?: string,
 *     ClientToken?: string,
 *     DesiredState?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceAsync(array{
 *     TypeName?: string,
 *     TypeVersionId?: string,
 *     RoleArn?: string,
 *     ClientToken?: string,
 *     DesiredState?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteResource(array $args = [])
 * @phpstan-method \Aws\Result deleteResource(array{
 *     TypeName?: string,
 *     TypeVersionId?: string,
 *     RoleArn?: string,
 *     ClientToken?: string,
 *     Identifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceAsync(array{
 *     TypeName?: string,
 *     TypeVersionId?: string,
 *     RoleArn?: string,
 *     ClientToken?: string,
 *     Identifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResource(array $args = [])
 * @phpstan-method \Aws\Result getResource(array{TypeName?: string, TypeVersionId?: string, RoleArn?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceAsync(array{TypeName?: string, TypeVersionId?: string, RoleArn?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getResourceRequestStatus(array $args = [])
 * @phpstan-method \Aws\Result getResourceRequestStatus(array{RequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceRequestStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceRequestStatusAsync(array{RequestToken?: string, ...} $args = [])
 * @method \Aws\Result listResourceRequests(array $args = [])
 * @phpstan-method \Aws\Result listResourceRequests(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ResourceRequestStatusFilter?: array{
 *         Operations?: list<'CREATE'|'DELETE'|'UPDATE'>,
 *         OperationStatuses?: list<'CANCEL_COMPLETE'|'CANCEL_IN_PROGRESS'|'FAILED'|'IN_PROGRESS'|'PENDING'|'SUCCESS'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceRequestsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ResourceRequestStatusFilter?: array{
 *         Operations?: list<'CREATE'|'DELETE'|'UPDATE'>,
 *         OperationStatuses?: list<'CANCEL_COMPLETE'|'CANCEL_IN_PROGRESS'|'FAILED'|'IN_PROGRESS'|'PENDING'|'SUCCESS'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResources(array $args = [])
 * @phpstan-method \Aws\Result listResources(array{
 *     TypeName?: string,
 *     TypeVersionId?: string,
 *     RoleArn?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ResourceModel?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesAsync(array{
 *     TypeName?: string,
 *     TypeVersionId?: string,
 *     RoleArn?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ResourceModel?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResource(array $args = [])
 * @phpstan-method \Aws\Result updateResource(array{
 *     TypeName?: string,
 *     TypeVersionId?: string,
 *     RoleArn?: string,
 *     ClientToken?: string,
 *     Identifier?: string,
 *     PatchDocument?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceAsync(array{
 *     TypeName?: string,
 *     TypeVersionId?: string,
 *     RoleArn?: string,
 *     ClientToken?: string,
 *     Identifier?: string,
 *     PatchDocument?: string,
 *     ...,
 * } $args = [])
 */
class CloudControlApiClient extends AwsClient {}
