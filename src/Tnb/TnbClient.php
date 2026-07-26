<?php
namespace Aws\Tnb;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Telco Network Builder** service.
 * @method \Aws\Result cancelSolNetworkOperation(array $args = [])
 * @phpstan-method \Aws\Result cancelSolNetworkOperation(array{nsLcmOpOccId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelSolNetworkOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelSolNetworkOperationAsync(array{nsLcmOpOccId?: string, ...} $args = [])
 * @method \Aws\Result createSolFunctionPackage(array $args = [])
 * @phpstan-method \Aws\Result createSolFunctionPackage(array{tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSolFunctionPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSolFunctionPackageAsync(array{tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createSolNetworkInstance(array $args = [])
 * @phpstan-method \Aws\Result createSolNetworkInstance(array{nsDescription?: string, nsName?: string, nsdInfoId?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSolNetworkInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSolNetworkInstanceAsync(array{nsDescription?: string, nsName?: string, nsdInfoId?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createSolNetworkPackage(array $args = [])
 * @phpstan-method \Aws\Result createSolNetworkPackage(array{tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSolNetworkPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSolNetworkPackageAsync(array{tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteSolFunctionPackage(array $args = [])
 * @phpstan-method \Aws\Result deleteSolFunctionPackage(array{vnfPkgId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSolFunctionPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSolFunctionPackageAsync(array{vnfPkgId?: string, ...} $args = [])
 * @method \Aws\Result deleteSolNetworkInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteSolNetworkInstance(array{nsInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSolNetworkInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSolNetworkInstanceAsync(array{nsInstanceId?: string, ...} $args = [])
 * @method \Aws\Result deleteSolNetworkPackage(array $args = [])
 * @phpstan-method \Aws\Result deleteSolNetworkPackage(array{nsdInfoId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSolNetworkPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSolNetworkPackageAsync(array{nsdInfoId?: string, ...} $args = [])
 * @method \Aws\Result getSolFunctionInstance(array $args = [])
 * @phpstan-method \Aws\Result getSolFunctionInstance(array{vnfInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSolFunctionInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSolFunctionInstanceAsync(array{vnfInstanceId?: string, ...} $args = [])
 * @method \Aws\Result getSolFunctionPackage(array $args = [])
 * @phpstan-method \Aws\Result getSolFunctionPackage(array{vnfPkgId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSolFunctionPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSolFunctionPackageAsync(array{vnfPkgId?: string, ...} $args = [])
 * @method \Aws\Result getSolFunctionPackageContent(array $args = [])
 * @phpstan-method \Aws\Result getSolFunctionPackageContent(array{accept?: 'application/zip', vnfPkgId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSolFunctionPackageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSolFunctionPackageContentAsync(array{accept?: 'application/zip', vnfPkgId?: string, ...} $args = [])
 * @method \Aws\Result getSolFunctionPackageDescriptor(array $args = [])
 * @phpstan-method \Aws\Result getSolFunctionPackageDescriptor(array{accept?: 'text/plain', vnfPkgId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSolFunctionPackageDescriptorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSolFunctionPackageDescriptorAsync(array{accept?: 'text/plain', vnfPkgId?: string, ...} $args = [])
 * @method \Aws\Result getSolNetworkInstance(array $args = [])
 * @phpstan-method \Aws\Result getSolNetworkInstance(array{nsInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSolNetworkInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSolNetworkInstanceAsync(array{nsInstanceId?: string, ...} $args = [])
 * @method \Aws\Result getSolNetworkOperation(array $args = [])
 * @phpstan-method \Aws\Result getSolNetworkOperation(array{nsLcmOpOccId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSolNetworkOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSolNetworkOperationAsync(array{nsLcmOpOccId?: string, ...} $args = [])
 * @method \Aws\Result getSolNetworkPackage(array $args = [])
 * @phpstan-method \Aws\Result getSolNetworkPackage(array{nsdInfoId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSolNetworkPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSolNetworkPackageAsync(array{nsdInfoId?: string, ...} $args = [])
 * @method \Aws\Result getSolNetworkPackageContent(array $args = [])
 * @phpstan-method \Aws\Result getSolNetworkPackageContent(array{accept?: 'application/zip', nsdInfoId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSolNetworkPackageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSolNetworkPackageContentAsync(array{accept?: 'application/zip', nsdInfoId?: string, ...} $args = [])
 * @method \Aws\Result getSolNetworkPackageDescriptor(array $args = [])
 * @phpstan-method \Aws\Result getSolNetworkPackageDescriptor(array{nsdInfoId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSolNetworkPackageDescriptorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSolNetworkPackageDescriptorAsync(array{nsdInfoId?: string, ...} $args = [])
 * @method \Aws\Result instantiateSolNetworkInstance(array $args = [])
 * @phpstan-method \Aws\Result instantiateSolNetworkInstance(array{additionalParamsForNs?: array, dryRun?: bool, nsInstanceId?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise instantiateSolNetworkInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise instantiateSolNetworkInstanceAsync(array{additionalParamsForNs?: array, dryRun?: bool, nsInstanceId?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result listSolFunctionInstances(array $args = [])
 * @phpstan-method \Aws\Result listSolFunctionInstances(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSolFunctionInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSolFunctionInstancesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSolFunctionPackages(array $args = [])
 * @phpstan-method \Aws\Result listSolFunctionPackages(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSolFunctionPackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSolFunctionPackagesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSolNetworkInstances(array $args = [])
 * @phpstan-method \Aws\Result listSolNetworkInstances(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSolNetworkInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSolNetworkInstancesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSolNetworkOperations(array $args = [])
 * @phpstan-method \Aws\Result listSolNetworkOperations(array{maxResults?: int, nextToken?: string, nsInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSolNetworkOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSolNetworkOperationsAsync(array{maxResults?: int, nextToken?: string, nsInstanceId?: string, ...} $args = [])
 * @method \Aws\Result listSolNetworkPackages(array $args = [])
 * @phpstan-method \Aws\Result listSolNetworkPackages(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSolNetworkPackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSolNetworkPackagesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putSolFunctionPackageContent(array $args = [])
 * @phpstan-method \Aws\Result putSolFunctionPackageContent(array{
 *     contentType?: 'application/zip',
 *     file?: string|resource|\Psr\Http\Message\StreamInterface,
 *     vnfPkgId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSolFunctionPackageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSolFunctionPackageContentAsync(array{
 *     contentType?: 'application/zip',
 *     file?: string|resource|\Psr\Http\Message\StreamInterface,
 *     vnfPkgId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putSolNetworkPackageContent(array $args = [])
 * @phpstan-method \Aws\Result putSolNetworkPackageContent(array{
 *     contentType?: 'application/zip',
 *     file?: string|resource|\Psr\Http\Message\StreamInterface,
 *     nsdInfoId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSolNetworkPackageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSolNetworkPackageContentAsync(array{
 *     contentType?: 'application/zip',
 *     file?: string|resource|\Psr\Http\Message\StreamInterface,
 *     nsdInfoId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result terminateSolNetworkInstance(array $args = [])
 * @phpstan-method \Aws\Result terminateSolNetworkInstance(array{nsInstanceId?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateSolNetworkInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateSolNetworkInstanceAsync(array{nsInstanceId?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateSolFunctionPackage(array $args = [])
 * @phpstan-method \Aws\Result updateSolFunctionPackage(array{operationalState?: 'DISABLED'|'ENABLED', vnfPkgId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSolFunctionPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSolFunctionPackageAsync(array{operationalState?: 'DISABLED'|'ENABLED', vnfPkgId?: string, ...} $args = [])
 * @method \Aws\Result updateSolNetworkInstance(array $args = [])
 * @phpstan-method \Aws\Result updateSolNetworkInstance(array{
 *     modifyVnfInfoData?: array{vnfConfigurableProperties?: array, vnfInstanceId?: string, ...},
 *     nsInstanceId?: string,
 *     tags?: array<string, string>,
 *     updateNs?: array{additionalParamsForNs?: array, nsdInfoId?: string, ...},
 *     updateType?: 'MODIFY_VNF_INFORMATION'|'UPDATE_NS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSolNetworkInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSolNetworkInstanceAsync(array{
 *     modifyVnfInfoData?: array{vnfConfigurableProperties?: array, vnfInstanceId?: string, ...},
 *     nsInstanceId?: string,
 *     tags?: array<string, string>,
 *     updateNs?: array{additionalParamsForNs?: array, nsdInfoId?: string, ...},
 *     updateType?: 'MODIFY_VNF_INFORMATION'|'UPDATE_NS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSolNetworkPackage(array $args = [])
 * @phpstan-method \Aws\Result updateSolNetworkPackage(array{nsdInfoId?: string, nsdOperationalState?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSolNetworkPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSolNetworkPackageAsync(array{nsdInfoId?: string, nsdOperationalState?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result validateSolFunctionPackageContent(array $args = [])
 * @phpstan-method \Aws\Result validateSolFunctionPackageContent(array{
 *     contentType?: 'application/zip',
 *     file?: string|resource|\Psr\Http\Message\StreamInterface,
 *     vnfPkgId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise validateSolFunctionPackageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateSolFunctionPackageContentAsync(array{
 *     contentType?: 'application/zip',
 *     file?: string|resource|\Psr\Http\Message\StreamInterface,
 *     vnfPkgId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result validateSolNetworkPackageContent(array $args = [])
 * @phpstan-method \Aws\Result validateSolNetworkPackageContent(array{
 *     contentType?: 'application/zip',
 *     file?: string|resource|\Psr\Http\Message\StreamInterface,
 *     nsdInfoId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise validateSolNetworkPackageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateSolNetworkPackageContentAsync(array{
 *     contentType?: 'application/zip',
 *     file?: string|resource|\Psr\Http\Message\StreamInterface,
 *     nsdInfoId?: string,
 *     ...,
 * } $args = [])
 */
class TnbClient extends AwsClient {}
