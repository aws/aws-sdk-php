<?php
namespace Aws\CloudHsm;

use Aws\Api\ApiProvider;
use Aws\Api\DocModel;
use Aws\Api\Service;
use Aws\AwsClient;

/**
 * This client is used to interact with **AWS CloudHSM**.
 *
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @phpstan-method \Aws\Result addTagsToResource(array{ResourceArn?: string, TagList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array{ResourceArn?: string, TagList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createHapg(array $args = [])
 * @phpstan-method \Aws\Result createHapg(array{Label?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createHapgAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHapgAsync(array{Label?: string, ...} $args = [])
 * @method \Aws\Result createHsm(array $args = [])
 * @phpstan-method \Aws\Result createHsm(array{
 *     SubnetId?: string,
 *     SshKey?: string,
 *     EniIp?: string,
 *     IamRoleArn?: string,
 *     ExternalId?: string,
 *     SubscriptionType?: 'PRODUCTION',
 *     ClientToken?: string,
 *     SyslogIp?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHsmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHsmAsync(array{
 *     SubnetId?: string,
 *     SshKey?: string,
 *     EniIp?: string,
 *     IamRoleArn?: string,
 *     ExternalId?: string,
 *     SubscriptionType?: 'PRODUCTION',
 *     ClientToken?: string,
 *     SyslogIp?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLunaClient(array $args = [])
 * @phpstan-method \Aws\Result createLunaClient(array{Label?: string, Certificate?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLunaClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLunaClientAsync(array{Label?: string, Certificate?: string, ...} $args = [])
 * @method \Aws\Result deleteHapg(array $args = [])
 * @phpstan-method \Aws\Result deleteHapg(array{HapgArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHapgAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHapgAsync(array{HapgArn?: string, ...} $args = [])
 * @method \Aws\Result deleteHsm(array $args = [])
 * @phpstan-method \Aws\Result deleteHsm(array{HsmArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHsmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHsmAsync(array{HsmArn?: string, ...} $args = [])
 * @method \Aws\Result deleteLunaClient(array $args = [])
 * @phpstan-method \Aws\Result deleteLunaClient(array{ClientArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLunaClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLunaClientAsync(array{ClientArn?: string, ...} $args = [])
 * @method \Aws\Result describeHapg(array $args = [])
 * @phpstan-method \Aws\Result describeHapg(array{HapgArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHapgAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHapgAsync(array{HapgArn?: string, ...} $args = [])
 * @method \Aws\Result describeHsm(array $args = [])
 * @phpstan-method \Aws\Result describeHsm(array{HsmArn?: string, HsmSerialNumber?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHsmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHsmAsync(array{HsmArn?: string, HsmSerialNumber?: string, ...} $args = [])
 * @method \Aws\Result describeLunaClient(array $args = [])
 * @phpstan-method \Aws\Result describeLunaClient(array{ClientArn?: string, CertificateFingerprint?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLunaClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLunaClientAsync(array{ClientArn?: string, CertificateFingerprint?: string, ...} $args = [])
 * @method \Aws\Result getConfigFiles(array $args = [])
 * @phpstan-method \Aws\Result getConfigFiles(array{ClientArn?: string, ClientVersion?: '5.1'|'5.3', HapgList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigFilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigFilesAsync(array{ClientArn?: string, ClientVersion?: '5.1'|'5.3', HapgList?: list<string>, ...} $args = [])
 * @method \Aws\Result listAvailableZones(array $args = [])
 * @phpstan-method \Aws\Result listAvailableZones(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailableZonesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAvailableZonesAsync(array{...} $args = [])
 * @method \Aws\Result listHapgs(array $args = [])
 * @phpstan-method \Aws\Result listHapgs(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHapgsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHapgsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listHsms(array $args = [])
 * @phpstan-method \Aws\Result listHsms(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHsmsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHsmsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listLunaClients(array $args = [])
 * @phpstan-method \Aws\Result listLunaClients(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLunaClientsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLunaClientsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result modifyHapg(array $args = [])
 * @phpstan-method \Aws\Result modifyHapg(array{HapgArn?: string, Label?: string, PartitionSerialList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyHapgAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyHapgAsync(array{HapgArn?: string, Label?: string, PartitionSerialList?: list<string>, ...} $args = [])
 * @method \Aws\Result modifyHsm(array $args = [])
 * @phpstan-method \Aws\Result modifyHsm(array{
 *     HsmArn?: string,
 *     SubnetId?: string,
 *     EniIp?: string,
 *     IamRoleArn?: string,
 *     ExternalId?: string,
 *     SyslogIp?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyHsmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyHsmAsync(array{
 *     HsmArn?: string,
 *     SubnetId?: string,
 *     EniIp?: string,
 *     IamRoleArn?: string,
 *     ExternalId?: string,
 *     SyslogIp?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyLunaClient(array $args = [])
 * @phpstan-method \Aws\Result modifyLunaClient(array{ClientArn?: string, Certificate?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyLunaClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyLunaClientAsync(array{ClientArn?: string, Certificate?: string, ...} $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromResource(array{ResourceArn?: string, TagKeyList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array{ResourceArn?: string, TagKeyList?: list<string>, ...} $args = [])
 */
class CloudHsmClient extends AwsClient {}
