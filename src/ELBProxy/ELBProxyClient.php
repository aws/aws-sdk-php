<?php
namespace Aws\ELBProxy;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Elastic Load Balancing for Envoy** service.
 * @method \Aws\Result associateCertificate(array $args = [])
 * @phpstan-method \Aws\Result associateCertificate(array{proxyIdentifier?: string, certificateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateCertificateAsync(array{proxyIdentifier?: string, certificateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result createProxy(array $args = [])
 * @phpstan-method \Aws\Result createProxy(array{
 *     name?: string,
 *     type?: 'envoy',
 *     proxyVersion?: string,
 *     roleArn?: string,
 *     configuration?: array{
 *         configurationFile?: array{configurationBytes?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         configurationArchive?: array{configurationBytes?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         ...,
 *     },
 *     networkConfiguration?: array{
 *         ipConfiguration?: array{ipAddressingConfiguration?: array, ...},
 *         vpcConfiguration?: array{subnets?: list<array>, securityGroups?: list<array>, ...},
 *         ...,
 *     },
 *     attributes?: list<array{key?: string, value?: string, ...}>,
 *     customerKmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProxyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProxyAsync(array{
 *     name?: string,
 *     type?: 'envoy',
 *     proxyVersion?: string,
 *     roleArn?: string,
 *     configuration?: array{
 *         configurationFile?: array{configurationBytes?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         configurationArchive?: array{configurationBytes?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *         ...,
 *     },
 *     networkConfiguration?: array{
 *         ipConfiguration?: array{ipAddressingConfiguration?: array, ...},
 *         vpcConfiguration?: array{subnets?: list<array>, securityGroups?: list<array>, ...},
 *         ...,
 *     },
 *     attributes?: list<array{key?: string, value?: string, ...}>,
 *     customerKmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteProxy(array $args = [])
 * @phpstan-method \Aws\Result deleteProxy(array{proxyIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProxyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProxyAsync(array{proxyIdentifier?: string, ...} $args = [])
 * @method \Aws\Result disassociateCertificate(array $args = [])
 * @phpstan-method \Aws\Result disassociateCertificate(array{proxyIdentifier?: string, certificateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateCertificateAsync(array{proxyIdentifier?: string, certificateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getProxy(array $args = [])
 * @phpstan-method \Aws\Result getProxy(array{proxyIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProxyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProxyAsync(array{proxyIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getProxyAttributes(array $args = [])
 * @phpstan-method \Aws\Result getProxyAttributes(array{proxyIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProxyAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProxyAttributesAsync(array{proxyIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getProxyConfigurationContents(array $args = [])
 * @phpstan-method \Aws\Result getProxyConfigurationContents(array{proxyIdentifier?: string, includeConfigFile?: bool, includeConfigArchive?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProxyConfigurationContentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProxyConfigurationContentsAsync(array{proxyIdentifier?: string, includeConfigFile?: bool, includeConfigArchive?: bool, ...} $args = [])
 * @method \Aws\Result getProxyUpdate(array $args = [])
 * @phpstan-method \Aws\Result getProxyUpdate(array{proxyIdentifier?: string, updateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProxyUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProxyUpdateAsync(array{proxyIdentifier?: string, updateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listCertificateAssociations(array $args = [])
 * @phpstan-method \Aws\Result listCertificateAssociations(array{proxyIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCertificateAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCertificateAssociationsAsync(array{proxyIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listProxies(array $args = [])
 * @phpstan-method \Aws\Result listProxies(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProxiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProxiesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listProxyUpdates(array $args = [])
 * @phpstan-method \Aws\Result listProxyUpdates(array{proxyIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProxyUpdatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProxyUpdatesAsync(array{proxyIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listProxyVersions(array $args = [])
 * @phpstan-method \Aws\Result listProxyVersions(array{type?: 'envoy', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProxyVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProxyVersionsAsync(array{type?: 'envoy', maxResults?: int, nextToken?: string, ...} $args = [])
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
 * @method \Aws\Result updateProxyAttributes(array $args = [])
 * @phpstan-method \Aws\Result updateProxyAttributes(array{proxyIdentifier?: string, attributes?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxyAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProxyAttributesAsync(array{proxyIdentifier?: string, attributes?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result updateProxyConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateProxyConfiguration(array{
 *     proxyIdentifier?: string,
 *     configurationFile?: array{configurationBytes?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     configurationArchive?: array{configurationBytes?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     resetConfigurationArchive?: bool,
 *     customerKmsKeyArn?: string,
 *     resetCustomerKmsKeyArn?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxyConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProxyConfigurationAsync(array{
 *     proxyIdentifier?: string,
 *     configurationFile?: array{configurationBytes?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     configurationArchive?: array{configurationBytes?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     resetConfigurationArchive?: bool,
 *     customerKmsKeyArn?: string,
 *     resetCustomerKmsKeyArn?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProxyNetworkConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateProxyNetworkConfiguration(array{
 *     proxyIdentifier?: string,
 *     vpcConfiguration?: array{subnets?: list<array>, securityGroups?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxyNetworkConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProxyNetworkConfigurationAsync(array{
 *     proxyIdentifier?: string,
 *     vpcConfiguration?: array{subnets?: list<array>, securityGroups?: list<array>, ...},
 *     ...,
 * } $args = [])
 */
class ELBProxyClient extends AwsClient {}
