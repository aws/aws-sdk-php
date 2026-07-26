<?php
namespace Aws\PcaConnectorScep;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Private CA Connector for SCEP** service.
 * @method \Aws\Result createChallenge(array $args = [])
 * @phpstan-method \Aws\Result createChallenge(array{ConnectorArn?: string, ClientToken?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createChallengeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChallengeAsync(array{ConnectorArn?: string, ClientToken?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createConnector(array $args = [])
 * @phpstan-method \Aws\Result createConnector(array{
 *     CertificateAuthorityArn?: string,
 *     MobileDeviceManagement?: array{Intune?: array{AzureApplicationId?: string, Domain?: string, ...}, ...},
 *     VpcEndpointId?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorAsync(array{
 *     CertificateAuthorityArn?: string,
 *     MobileDeviceManagement?: array{Intune?: array{AzureApplicationId?: string, Domain?: string, ...}, ...},
 *     VpcEndpointId?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteChallenge(array $args = [])
 * @phpstan-method \Aws\Result deleteChallenge(array{ChallengeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChallengeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChallengeAsync(array{ChallengeArn?: string, ...} $args = [])
 * @method \Aws\Result deleteConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteConnector(array{ConnectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array{ConnectorArn?: string, ...} $args = [])
 * @method \Aws\Result getChallengeMetadata(array $args = [])
 * @phpstan-method \Aws\Result getChallengeMetadata(array{ChallengeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChallengeMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChallengeMetadataAsync(array{ChallengeArn?: string, ...} $args = [])
 * @method \Aws\Result getChallengePassword(array $args = [])
 * @phpstan-method \Aws\Result getChallengePassword(array{ChallengeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChallengePasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChallengePasswordAsync(array{ChallengeArn?: string, ...} $args = [])
 * @method \Aws\Result getConnector(array $args = [])
 * @phpstan-method \Aws\Result getConnector(array{ConnectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectorAsync(array{ConnectorArn?: string, ...} $args = [])
 * @method \Aws\Result listChallengeMetadata(array $args = [])
 * @phpstan-method \Aws\Result listChallengeMetadata(array{MaxResults?: int, NextToken?: string, ConnectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChallengeMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChallengeMetadataAsync(array{MaxResults?: int, NextToken?: string, ConnectorArn?: string, ...} $args = [])
 * @method \Aws\Result listConnectors(array $args = [])
 * @phpstan-method \Aws\Result listConnectors(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
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
 */
class PcaConnectorScepClient extends AwsClient {}
