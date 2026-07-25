<?php
namespace Aws\MediaPackageVod;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaPackage VOD** service.
 * @method \Aws\Result configureLogs(array $args = [])
 * @phpstan-method \Aws\Result configureLogs(array{EgressAccessLogs?: array{LogGroupName?: string, ...}, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise configureLogsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise configureLogsAsync(array{EgressAccessLogs?: array{LogGroupName?: string, ...}, Id?: string, ...} $args = [])
 * @method \Aws\Result createAsset(array $args = [])
 * @phpstan-method \Aws\Result createAsset(array{
 *     Id?: string,
 *     PackagingGroupId?: string,
 *     ResourceId?: string,
 *     SourceArn?: string,
 *     SourceRoleArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssetAsync(array{
 *     Id?: string,
 *     PackagingGroupId?: string,
 *     ResourceId?: string,
 *     SourceArn?: string,
 *     SourceRoleArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPackagingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createPackagingConfiguration(array{
 *     CmafPackage?: array{
 *         Encryption?: array{ConstantInitializationVector?: string, SpekeKeyProvider?: array, ...},
 *         HlsManifests?: list<array>,
 *         IncludeEncoderConfigurationInSegments?: bool,
 *         SegmentDurationSeconds?: int,
 *         ...,
 *     },
 *     DashPackage?: array{
 *         DashManifests?: list<array>,
 *         Encryption?: array{SpekeKeyProvider?: array, ...},
 *         IncludeEncoderConfigurationInSegments?: bool,
 *         IncludeIframeOnlyStream?: bool,
 *         PeriodTriggers?: list<'ADS'>,
 *         SegmentDurationSeconds?: int,
 *         SegmentTemplateFormat?: 'NUMBER_WITH_DURATION'|'NUMBER_WITH_TIMELINE'|'TIME_WITH_TIMELINE',
 *         ...,
 *     },
 *     HlsPackage?: array{
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: 'AES_128'|'SAMPLE_AES',
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         HlsManifests?: list<array>,
 *         IncludeDvbSubtitles?: bool,
 *         SegmentDurationSeconds?: int,
 *         UseAudioRenditionGroup?: bool,
 *         ...,
 *     },
 *     Id?: string,
 *     MssPackage?: array{
 *         Encryption?: array{SpekeKeyProvider?: array, ...},
 *         MssManifests?: list<array>,
 *         SegmentDurationSeconds?: int,
 *         ...,
 *     },
 *     PackagingGroupId?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPackagingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPackagingConfigurationAsync(array{
 *     CmafPackage?: array{
 *         Encryption?: array{ConstantInitializationVector?: string, SpekeKeyProvider?: array, ...},
 *         HlsManifests?: list<array>,
 *         IncludeEncoderConfigurationInSegments?: bool,
 *         SegmentDurationSeconds?: int,
 *         ...,
 *     },
 *     DashPackage?: array{
 *         DashManifests?: list<array>,
 *         Encryption?: array{SpekeKeyProvider?: array, ...},
 *         IncludeEncoderConfigurationInSegments?: bool,
 *         IncludeIframeOnlyStream?: bool,
 *         PeriodTriggers?: list<'ADS'>,
 *         SegmentDurationSeconds?: int,
 *         SegmentTemplateFormat?: 'NUMBER_WITH_DURATION'|'NUMBER_WITH_TIMELINE'|'TIME_WITH_TIMELINE',
 *         ...,
 *     },
 *     HlsPackage?: array{
 *         Encryption?: array{
 *             ConstantInitializationVector?: string,
 *             EncryptionMethod?: 'AES_128'|'SAMPLE_AES',
 *             SpekeKeyProvider?: array,
 *             ...,
 *         },
 *         HlsManifests?: list<array>,
 *         IncludeDvbSubtitles?: bool,
 *         SegmentDurationSeconds?: int,
 *         UseAudioRenditionGroup?: bool,
 *         ...,
 *     },
 *     Id?: string,
 *     MssPackage?: array{
 *         Encryption?: array{SpekeKeyProvider?: array, ...},
 *         MssManifests?: list<array>,
 *         SegmentDurationSeconds?: int,
 *         ...,
 *     },
 *     PackagingGroupId?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPackagingGroup(array $args = [])
 * @phpstan-method \Aws\Result createPackagingGroup(array{
 *     Authorization?: array{CdnIdentifierSecret?: string, SecretsRoleArn?: string, ...},
 *     EgressAccessLogs?: array{LogGroupName?: string, ...},
 *     Id?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPackagingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPackagingGroupAsync(array{
 *     Authorization?: array{CdnIdentifierSecret?: string, SecretsRoleArn?: string, ...},
 *     EgressAccessLogs?: array{LogGroupName?: string, ...},
 *     Id?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAsset(array $args = [])
 * @phpstan-method \Aws\Result deleteAsset(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deletePackagingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deletePackagingConfiguration(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePackagingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePackagingConfigurationAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deletePackagingGroup(array $args = [])
 * @phpstan-method \Aws\Result deletePackagingGroup(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePackagingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePackagingGroupAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describeAsset(array $args = [])
 * @phpstan-method \Aws\Result describeAsset(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssetAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describePackagingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describePackagingConfiguration(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePackagingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePackagingConfigurationAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describePackagingGroup(array $args = [])
 * @phpstan-method \Aws\Result describePackagingGroup(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePackagingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePackagingGroupAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result listAssets(array $args = [])
 * @phpstan-method \Aws\Result listAssets(array{MaxResults?: int, NextToken?: string, PackagingGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetsAsync(array{MaxResults?: int, NextToken?: string, PackagingGroupId?: string, ...} $args = [])
 * @method \Aws\Result listPackagingConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listPackagingConfigurations(array{MaxResults?: int, NextToken?: string, PackagingGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPackagingConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackagingConfigurationsAsync(array{MaxResults?: int, NextToken?: string, PackagingGroupId?: string, ...} $args = [])
 * @method \Aws\Result listPackagingGroups(array $args = [])
 * @phpstan-method \Aws\Result listPackagingGroups(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPackagingGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackagingGroupsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
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
 * @method \Aws\Result updatePackagingGroup(array $args = [])
 * @phpstan-method \Aws\Result updatePackagingGroup(array{Authorization?: array{CdnIdentifierSecret?: string, SecretsRoleArn?: string, ...}, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePackagingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePackagingGroupAsync(array{Authorization?: array{CdnIdentifierSecret?: string, SecretsRoleArn?: string, ...}, Id?: string, ...} $args = [])
 */
class MediaPackageVodClient extends AwsClient {}
