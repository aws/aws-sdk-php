<?php
namespace Aws\DataExchange;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Data Exchange** service.
 * @method \Aws\Result acceptDataGrant(array $args = [])
 * @phpstan-method \Aws\Result acceptDataGrant(array{DataGrantArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptDataGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptDataGrantAsync(array{DataGrantArn?: string, ...} $args = [])
 * @method \Aws\Result cancelJob(array $args = [])
 * @phpstan-method \Aws\Result cancelJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result createDataGrant(array $args = [])
 * @phpstan-method \Aws\Result createDataGrant(array{
 *     Name?: string,
 *     GrantDistributionScope?: 'AWS_ORGANIZATION'|'NONE',
 *     ReceiverPrincipal?: string,
 *     SourceDataSetId?: string,
 *     EndsAt?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataGrantAsync(array{
 *     Name?: string,
 *     GrantDistributionScope?: 'AWS_ORGANIZATION'|'NONE',
 *     ReceiverPrincipal?: string,
 *     SourceDataSetId?: string,
 *     EndsAt?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSet(array $args = [])
 * @phpstan-method \Aws\Result createDataSet(array{
 *     AssetType?: 'API_GATEWAY_API'|'LAKE_FORMATION_DATA_PERMISSION'|'REDSHIFT_DATA_SHARE'|'S3_DATA_ACCESS'|'S3_SNAPSHOT',
 *     Description?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSetAsync(array{
 *     AssetType?: 'API_GATEWAY_API'|'LAKE_FORMATION_DATA_PERMISSION'|'REDSHIFT_DATA_SHARE'|'S3_DATA_ACCESS'|'S3_SNAPSHOT',
 *     Description?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventAction(array $args = [])
 * @phpstan-method \Aws\Result createEventAction(array{
 *     Action?: array{ExportRevisionToS3?: array{Encryption?: array, RevisionDestination?: array, ...}, ...},
 *     Event?: array{RevisionPublished?: array{DataSetId?: string, ...}, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventActionAsync(array{
 *     Action?: array{ExportRevisionToS3?: array{Encryption?: array, RevisionDestination?: array, ...}, ...},
 *     Event?: array{RevisionPublished?: array{DataSetId?: string, ...}, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @phpstan-method \Aws\Result createJob(array{
 *     AssetConfiguration?: array{Tags?: list<array>, ...},
 *     Details?: array{
 *         ExportAssetToSignedUrl?: array{AssetId?: string, DataSetId?: string, RevisionId?: string, ...},
 *         ExportAssetsToS3?: array{AssetDestinations?: list<array>, DataSetId?: string, Encryption?: array, RevisionId?: string, ...},
 *         ExportRevisionsToS3?: array{DataSetId?: string, Encryption?: array, RevisionDestinations?: list<array>, ...},
 *         ImportAssetFromSignedUrl?: array{AssetName?: string, DataSetId?: string, Md5Hash?: string, RevisionId?: string, ...},
 *         ImportAssetsFromS3?: array{AssetSources?: list<array>, DataSetId?: string, RevisionId?: string, ...},
 *         ImportAssetsFromRedshiftDataShares?: array{AssetSources?: list<array>, DataSetId?: string, RevisionId?: string, ...},
 *         ImportAssetFromApiGatewayApi?: array{
 *             ApiDescription?: string,
 *             ApiId?: string,
 *             ApiKey?: string,
 *             ApiName?: string,
 *             ApiSpecificationMd5Hash?: string,
 *             DataSetId?: string,
 *             ProtocolType?: 'REST',
 *             RevisionId?: string,
 *             Stage?: string,
 *             ...,
 *         },
 *         CreateS3DataAccessFromS3Bucket?: array{AssetSource?: array, DataSetId?: string, RevisionId?: string, ...},
 *         ImportAssetsFromLakeFormationTagPolicy?: array{
 *             CatalogId?: string,
 *             Database?: array,
 *             Table?: array,
 *             RoleArn?: string,
 *             DataSetId?: string,
 *             RevisionId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Type?: 'CREATE_S3_DATA_ACCESS_FROM_S3_BUCKET'|'EXPORT_ASSETS_TO_S3'|'EXPORT_ASSET_TO_SIGNED_URL'|'EXPORT_REVISIONS_TO_S3'|'IMPORT_ASSETS_FROM_LAKE_FORMATION_TAG_POLICY'|'IMPORT_ASSETS_FROM_REDSHIFT_DATA_SHARES'|'IMPORT_ASSETS_FROM_S3'|'IMPORT_ASSET_FROM_API_GATEWAY_API'|'IMPORT_ASSET_FROM_SIGNED_URL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobAsync(array{
 *     AssetConfiguration?: array{Tags?: list<array>, ...},
 *     Details?: array{
 *         ExportAssetToSignedUrl?: array{AssetId?: string, DataSetId?: string, RevisionId?: string, ...},
 *         ExportAssetsToS3?: array{AssetDestinations?: list<array>, DataSetId?: string, Encryption?: array, RevisionId?: string, ...},
 *         ExportRevisionsToS3?: array{DataSetId?: string, Encryption?: array, RevisionDestinations?: list<array>, ...},
 *         ImportAssetFromSignedUrl?: array{AssetName?: string, DataSetId?: string, Md5Hash?: string, RevisionId?: string, ...},
 *         ImportAssetsFromS3?: array{AssetSources?: list<array>, DataSetId?: string, RevisionId?: string, ...},
 *         ImportAssetsFromRedshiftDataShares?: array{AssetSources?: list<array>, DataSetId?: string, RevisionId?: string, ...},
 *         ImportAssetFromApiGatewayApi?: array{
 *             ApiDescription?: string,
 *             ApiId?: string,
 *             ApiKey?: string,
 *             ApiName?: string,
 *             ApiSpecificationMd5Hash?: string,
 *             DataSetId?: string,
 *             ProtocolType?: 'REST',
 *             RevisionId?: string,
 *             Stage?: string,
 *             ...,
 *         },
 *         CreateS3DataAccessFromS3Bucket?: array{AssetSource?: array, DataSetId?: string, RevisionId?: string, ...},
 *         ImportAssetsFromLakeFormationTagPolicy?: array{
 *             CatalogId?: string,
 *             Database?: array,
 *             Table?: array,
 *             RoleArn?: string,
 *             DataSetId?: string,
 *             RevisionId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Type?: 'CREATE_S3_DATA_ACCESS_FROM_S3_BUCKET'|'EXPORT_ASSETS_TO_S3'|'EXPORT_ASSET_TO_SIGNED_URL'|'EXPORT_REVISIONS_TO_S3'|'IMPORT_ASSETS_FROM_LAKE_FORMATION_TAG_POLICY'|'IMPORT_ASSETS_FROM_REDSHIFT_DATA_SHARES'|'IMPORT_ASSETS_FROM_S3'|'IMPORT_ASSET_FROM_API_GATEWAY_API'|'IMPORT_ASSET_FROM_SIGNED_URL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRevision(array $args = [])
 * @phpstan-method \Aws\Result createRevision(array{Comment?: string, DataSetId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRevisionAsync(array{Comment?: string, DataSetId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteAsset(array $args = [])
 * @phpstan-method \Aws\Result deleteAsset(array{AssetId?: string, DataSetId?: string, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetAsync(array{AssetId?: string, DataSetId?: string, RevisionId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataGrant(array $args = [])
 * @phpstan-method \Aws\Result deleteDataGrant(array{DataGrantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataGrantAsync(array{DataGrantId?: string, ...} $args = [])
 * @method \Aws\Result deleteDataSet(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSet(array{DataSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSetAsync(array{DataSetId?: string, ...} $args = [])
 * @method \Aws\Result deleteEventAction(array $args = [])
 * @phpstan-method \Aws\Result deleteEventAction(array{EventActionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventActionAsync(array{EventActionId?: string, ...} $args = [])
 * @method \Aws\Result deleteRevision(array $args = [])
 * @phpstan-method \Aws\Result deleteRevision(array{DataSetId?: string, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRevisionAsync(array{DataSetId?: string, RevisionId?: string, ...} $args = [])
 * @method \Aws\Result getAsset(array $args = [])
 * @phpstan-method \Aws\Result getAsset(array{AssetId?: string, DataSetId?: string, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetAsync(array{AssetId?: string, DataSetId?: string, RevisionId?: string, ...} $args = [])
 * @method \Aws\Result getDataGrant(array $args = [])
 * @phpstan-method \Aws\Result getDataGrant(array{DataGrantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataGrantAsync(array{DataGrantId?: string, ...} $args = [])
 * @method \Aws\Result getDataSet(array $args = [])
 * @phpstan-method \Aws\Result getDataSet(array{DataSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSetAsync(array{DataSetId?: string, ...} $args = [])
 * @method \Aws\Result getEventAction(array $args = [])
 * @phpstan-method \Aws\Result getEventAction(array{EventActionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventActionAsync(array{EventActionId?: string, ...} $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @phpstan-method \Aws\Result getJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result getReceivedDataGrant(array $args = [])
 * @phpstan-method \Aws\Result getReceivedDataGrant(array{DataGrantArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReceivedDataGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReceivedDataGrantAsync(array{DataGrantArn?: string, ...} $args = [])
 * @method \Aws\Result getRevision(array $args = [])
 * @phpstan-method \Aws\Result getRevision(array{DataSetId?: string, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevisionAsync(array{DataSetId?: string, RevisionId?: string, ...} $args = [])
 * @method \Aws\Result listDataGrants(array $args = [])
 * @phpstan-method \Aws\Result listDataGrants(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataGrantsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDataSetRevisions(array $args = [])
 * @phpstan-method \Aws\Result listDataSetRevisions(array{DataSetId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSetRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSetRevisionsAsync(array{DataSetId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDataSets(array $args = [])
 * @phpstan-method \Aws\Result listDataSets(array{MaxResults?: int, NextToken?: string, Origin?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSetsAsync(array{MaxResults?: int, NextToken?: string, Origin?: string, ...} $args = [])
 * @method \Aws\Result listEventActions(array $args = [])
 * @phpstan-method \Aws\Result listEventActions(array{EventSourceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventActionsAsync(array{EventSourceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{DataSetId?: string, MaxResults?: int, NextToken?: string, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{DataSetId?: string, MaxResults?: int, NextToken?: string, RevisionId?: string, ...} $args = [])
 * @method \Aws\Result listReceivedDataGrants(array $args = [])
 * @phpstan-method \Aws\Result listReceivedDataGrants(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AcceptanceState?: list<'ACCEPTED'|'PENDING_RECEIVER_ACCEPTANCE'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReceivedDataGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReceivedDataGrantsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     AcceptanceState?: list<'ACCEPTED'|'PENDING_RECEIVER_ACCEPTANCE'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRevisionAssets(array $args = [])
 * @phpstan-method \Aws\Result listRevisionAssets(array{DataSetId?: string, MaxResults?: int, NextToken?: string, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRevisionAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRevisionAssetsAsync(array{DataSetId?: string, MaxResults?: int, NextToken?: string, RevisionId?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result revokeRevision(array $args = [])
 * @phpstan-method \Aws\Result revokeRevision(array{DataSetId?: string, RevisionId?: string, RevocationComment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeRevisionAsync(array{DataSetId?: string, RevisionId?: string, RevocationComment?: string, ...} $args = [])
 * @method \Aws\Result sendApiAsset(array $args = [])
 * @phpstan-method \Aws\Result sendApiAsset(array{
 *     Body?: string,
 *     QueryStringParameters?: array<string, string>,
 *     AssetId?: string,
 *     DataSetId?: string,
 *     RequestHeaders?: array<string, string>,
 *     Method?: string,
 *     Path?: string,
 *     RevisionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendApiAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendApiAssetAsync(array{
 *     Body?: string,
 *     QueryStringParameters?: array<string, string>,
 *     AssetId?: string,
 *     DataSetId?: string,
 *     RequestHeaders?: array<string, string>,
 *     Method?: string,
 *     Path?: string,
 *     RevisionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendDataSetNotification(array $args = [])
 * @phpstan-method \Aws\Result sendDataSetNotification(array{
 *     Scope?: array{
 *         LakeFormationTagPolicies?: list<array>,
 *         RedshiftDataShares?: list<array>,
 *         S3DataAccesses?: list<array>,
 *         ...,
 *     },
 *     ClientToken?: string,
 *     Comment?: string,
 *     DataSetId?: string,
 *     Details?: array{
 *         DataUpdate?: array{DataUpdatedAt?: int|string|\DateTimeInterface, ...},
 *         Deprecation?: array{DeprecationAt?: int|string|\DateTimeInterface, ...},
 *         SchemaChange?: array{Changes?: list<array>, SchemaChangeAt?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     Type?: 'DATA_DELAY'|'DATA_UPDATE'|'DEPRECATION'|'SCHEMA_CHANGE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendDataSetNotificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendDataSetNotificationAsync(array{
 *     Scope?: array{
 *         LakeFormationTagPolicies?: list<array>,
 *         RedshiftDataShares?: list<array>,
 *         S3DataAccesses?: list<array>,
 *         ...,
 *     },
 *     ClientToken?: string,
 *     Comment?: string,
 *     DataSetId?: string,
 *     Details?: array{
 *         DataUpdate?: array{DataUpdatedAt?: int|string|\DateTimeInterface, ...},
 *         Deprecation?: array{DeprecationAt?: int|string|\DateTimeInterface, ...},
 *         SchemaChange?: array{Changes?: list<array>, SchemaChangeAt?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     Type?: 'DATA_DELAY'|'DATA_UPDATE'|'DEPRECATION'|'SCHEMA_CHANGE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startJob(array $args = [])
 * @phpstan-method \Aws\Result startJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAsset(array $args = [])
 * @phpstan-method \Aws\Result updateAsset(array{AssetId?: string, DataSetId?: string, Name?: string, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssetAsync(array{AssetId?: string, DataSetId?: string, Name?: string, RevisionId?: string, ...} $args = [])
 * @method \Aws\Result updateDataSet(array $args = [])
 * @phpstan-method \Aws\Result updateDataSet(array{DataSetId?: string, Description?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSetAsync(array{DataSetId?: string, Description?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateEventAction(array $args = [])
 * @phpstan-method \Aws\Result updateEventAction(array{
 *     Action?: array{ExportRevisionToS3?: array{Encryption?: array, RevisionDestination?: array, ...}, ...},
 *     EventActionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventActionAsync(array{
 *     Action?: array{ExportRevisionToS3?: array{Encryption?: array, RevisionDestination?: array, ...}, ...},
 *     EventActionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRevision(array $args = [])
 * @phpstan-method \Aws\Result updateRevision(array{Comment?: string, DataSetId?: string, Finalized?: bool, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRevisionAsync(array{Comment?: string, DataSetId?: string, Finalized?: bool, RevisionId?: string, ...} $args = [])
 */
class DataExchangeClient extends AwsClient {}
