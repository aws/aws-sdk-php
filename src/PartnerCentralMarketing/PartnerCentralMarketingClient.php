<?php
namespace Aws\PartnerCentralMarketing;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Partner Central Marketing API** service.
 * @method \Aws\Result batchCreateCampaignAsset(array $args = [])
 * @phpstan-method \Aws\Result batchCreateCampaignAsset(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     CampaignIdentifier?: string,
 *     Entries?: list<array{SourceAssetTemplateIdentifier?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateCampaignAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateCampaignAssetAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     CampaignIdentifier?: string,
 *     Entries?: list<array{SourceAssetTemplateIdentifier?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCampaign(array $args = [])
 * @phpstan-method \Aws\Result createCampaign(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     Name?: string,
 *     CampaignTemplateId?: string,
 *     SenderEmail?: string,
 *     PrivacyPolicyUrl?: string,
 *     PartnerAddress?: string,
 *     PartnerBadge?: array{S3Uri?: string, VersionId?: string, ...},
 *     EmailTarget?: array{S3Uri?: string, VersionId?: string, ...},
 *     EmailTargetEngagementGroupIds?: list<string>,
 *     TargetAudience?: array{
 *         Industries?: list<'AUTOMOTIVE'|'EDUCATION'|'ENERGY'|'FINANCIAL_SERVICES'|'GOVERNMENT'|'HEALTHCARE'|'INSURANCE'|'MANUFACTURING'|'MEDIA_ENTERTAINMENT'|'OTHER'|'RETAIL'|'TELECOMMUNICATIONS'>,
 *         CompanySizes?: list<'ENTERPRISE'|'GLOBAL_ENTERPRISE'|'MID_MARKET'|'SMALL_BUSINESS'|'STARTUP'>,
 *         Countries?: list<string>,
 *         ...,
 *     },
 *     EstimatedBudget?: array{Amount?: string, CurrencyCode?: string, ...},
 *     TotalBudget?: array{Amount?: string, CurrencyCode?: string, ...},
 *     StartOn?: string,
 *     EndOn?: string,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCampaignAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     Name?: string,
 *     CampaignTemplateId?: string,
 *     SenderEmail?: string,
 *     PrivacyPolicyUrl?: string,
 *     PartnerAddress?: string,
 *     PartnerBadge?: array{S3Uri?: string, VersionId?: string, ...},
 *     EmailTarget?: array{S3Uri?: string, VersionId?: string, ...},
 *     EmailTargetEngagementGroupIds?: list<string>,
 *     TargetAudience?: array{
 *         Industries?: list<'AUTOMOTIVE'|'EDUCATION'|'ENERGY'|'FINANCIAL_SERVICES'|'GOVERNMENT'|'HEALTHCARE'|'INSURANCE'|'MANUFACTURING'|'MEDIA_ENTERTAINMENT'|'OTHER'|'RETAIL'|'TELECOMMUNICATIONS'>,
 *         CompanySizes?: list<'ENTERPRISE'|'GLOBAL_ENTERPRISE'|'MID_MARKET'|'SMALL_BUSINESS'|'STARTUP'>,
 *         Countries?: list<string>,
 *         ...,
 *     },
 *     EstimatedBudget?: array{Amount?: string, CurrencyCode?: string, ...},
 *     TotalBudget?: array{Amount?: string, CurrencyCode?: string, ...},
 *     StartOn?: string,
 *     EndOn?: string,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSocialConnectionAuthorizationUrl(array $args = [])
 * @phpstan-method \Aws\Result createSocialConnectionAuthorizationUrl(array{Catalog?: 'AWS'|'Sandbox', Platform?: 'FACEBOOK'|'LINKEDIN'|'X', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSocialConnectionAuthorizationUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSocialConnectionAuthorizationUrlAsync(array{Catalog?: 'AWS'|'Sandbox', Platform?: 'FACEBOOK'|'LINKEDIN'|'X', ...} $args = [])
 * @method \Aws\Result deactivateCampaignAsset(array $args = [])
 * @phpstan-method \Aws\Result deactivateCampaignAsset(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, CampaignAssetIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateCampaignAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateCampaignAssetAsync(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, CampaignAssetIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteCampaign(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaign(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteCampaignAsset(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaignAsset(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, CampaignAssetIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCampaignAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignAssetAsync(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, CampaignAssetIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteSocialConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteSocialConnection(array{Catalog?: 'AWS'|'Sandbox', Identifier?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSocialConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSocialConnectionAsync(array{Catalog?: 'AWS'|'Sandbox', Identifier?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result getCampaign(array $args = [])
 * @phpstan-method \Aws\Result getCampaign(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignAsync(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCampaignAsset(array $args = [])
 * @phpstan-method \Aws\Result getCampaignAsset(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, CampaignAssetIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignAssetAsync(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, CampaignAssetIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCampaignAssetActivationTask(array $args = [])
 * @phpstan-method \Aws\Result getCampaignAssetActivationTask(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignAssetActivationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignAssetActivationTaskAsync(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCampaignAssetExportTask(array $args = [])
 * @phpstan-method \Aws\Result getCampaignAssetExportTask(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, CampaignAssetExportTaskIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignAssetExportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignAssetExportTaskAsync(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, CampaignAssetExportTaskIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCampaignTemplate(array $args = [])
 * @phpstan-method \Aws\Result getCampaignTemplate(array{Catalog?: 'AWS'|'Sandbox', Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignTemplateAsync(array{Catalog?: 'AWS'|'Sandbox', Identifier?: string, ...} $args = [])
 * @method \Aws\Result listCampaignAssets(array $args = [])
 * @phpstan-method \Aws\Result listCampaignAssets(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCampaignAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCampaignAssetsAsync(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCampaigns(array $args = [])
 * @phpstan-method \Aws\Result listCampaigns(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     CampaignIdentifiers?: list<string>,
 *     Name?: string,
 *     States?: list<'ACTIVE'|'COMPLETED'|'DRAFT'>,
 *     Sort?: array{SortBy?: 'CREATED_AT'|'NAME'|'START_ON'|'STATE', SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCampaignsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCampaignsAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     CampaignIdentifiers?: list<string>,
 *     Name?: string,
 *     States?: list<'ACTIVE'|'COMPLETED'|'DRAFT'>,
 *     Sort?: array{SortBy?: 'CREATED_AT'|'NAME'|'START_ON'|'STATE', SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSocialConnections(array $args = [])
 * @phpstan-method \Aws\Result listSocialConnections(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     Platform?: 'FACEBOOK'|'LINKEDIN'|'X',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSocialConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSocialConnectionsAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     Platform?: 'FACEBOOK'|'LINKEDIN'|'X',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result searchCampaignTemplates(array $args = [])
 * @phpstan-method \Aws\Result searchCampaignTemplates(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     SearchText?: string,
 *     Industry?: list<'AUTOMOTIVE'|'EDUCATION'|'ENERGY'|'FINANCIAL_SERVICES'|'GOVERNMENT'|'HEALTHCARE'|'INSURANCE'|'MANUFACTURING'|'MEDIA_ENTERTAINMENT'|'OTHER'|'RETAIL'|'TELECOMMUNICATIONS'>,
 *     UseCase?: list<string>,
 *     Language?: list<'ar'|'de'|'en'|'es'|'es-419'|'fr'|'id'|'it'|'ja'|'ko'|'pt-BR'|'tr'|'zh-Hans'|'zh-Hant'>,
 *     AwsServices?: list<string>,
 *     CustomerSegments?: list<'ENTERPRISE'|'ISV'|'PUBLIC_SECTOR'|'SMB'>,
 *     Themes?: list<'AI'|'AWS_MARKETPLACE'|'AWS_TRAINING_CERTIFICATION'|'CONNECT'|'DATA_ANALYTICS'|'EVENTS'|'MIGRATION_MODERNIZATION'|'SECURITY'>,
 *     Collection?: list<'BUILD_WITH_AI'|'GENERAL'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchCampaignTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchCampaignTemplatesAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     SearchText?: string,
 *     Industry?: list<'AUTOMOTIVE'|'EDUCATION'|'ENERGY'|'FINANCIAL_SERVICES'|'GOVERNMENT'|'HEALTHCARE'|'INSURANCE'|'MANUFACTURING'|'MEDIA_ENTERTAINMENT'|'OTHER'|'RETAIL'|'TELECOMMUNICATIONS'>,
 *     UseCase?: list<string>,
 *     Language?: list<'ar'|'de'|'en'|'es'|'es-419'|'fr'|'id'|'it'|'ja'|'ko'|'pt-BR'|'tr'|'zh-Hans'|'zh-Hant'>,
 *     AwsServices?: list<string>,
 *     CustomerSegments?: list<'ENTERPRISE'|'ISV'|'PUBLIC_SECTOR'|'SMB'>,
 *     Themes?: list<'AI'|'AWS_MARKETPLACE'|'AWS_TRAINING_CERTIFICATION'|'CONNECT'|'DATA_ANALYTICS'|'EVENTS'|'MIGRATION_MODERNIZATION'|'SECURITY'>,
 *     Collection?: list<'BUILD_WITH_AI'|'GENERAL'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCampaignAssetActivationTask(array $args = [])
 * @phpstan-method \Aws\Result startCampaignAssetActivationTask(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     CampaignIdentifier?: string,
 *     CampaignAssetIdentifiers?: list<string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCampaignAssetActivationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCampaignAssetActivationTaskAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     CampaignIdentifier?: string,
 *     CampaignAssetIdentifiers?: list<string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCampaignAssetExportTask(array $args = [])
 * @phpstan-method \Aws\Result startCampaignAssetExportTask(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCampaignAssetExportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCampaignAssetExportTaskAsync(array{Catalog?: 'AWS'|'Sandbox', CampaignIdentifier?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCampaign(array $args = [])
 * @phpstan-method \Aws\Result updateCampaign(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     CampaignIdentifier?: string,
 *     Name?: string,
 *     SenderEmail?: string,
 *     PrivacyPolicyUrl?: string,
 *     PartnerAddress?: string,
 *     PartnerBadge?: array{S3Uri?: string, VersionId?: string, ...},
 *     EmailTarget?: array{S3Uri?: string, VersionId?: string, ...},
 *     EmailTargetEngagementGroupIds?: list<string>,
 *     SocialConnections?: array<string, list<string>>,
 *     EstimatedBudget?: array{Amount?: string, CurrencyCode?: string, ...},
 *     TotalBudget?: array{Amount?: string, CurrencyCode?: string, ...},
 *     TargetAudience?: array{
 *         Industries?: list<'AUTOMOTIVE'|'EDUCATION'|'ENERGY'|'FINANCIAL_SERVICES'|'GOVERNMENT'|'HEALTHCARE'|'INSURANCE'|'MANUFACTURING'|'MEDIA_ENTERTAINMENT'|'OTHER'|'RETAIL'|'TELECOMMUNICATIONS'>,
 *         CompanySizes?: list<'ENTERPRISE'|'GLOBAL_ENTERPRISE'|'MID_MARKET'|'SMALL_BUSINESS'|'STARTUP'>,
 *         Countries?: list<string>,
 *         ...,
 *     },
 *     ClientToken?: string,
 *     StartOn?: string,
 *     EndOn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     CampaignIdentifier?: string,
 *     Name?: string,
 *     SenderEmail?: string,
 *     PrivacyPolicyUrl?: string,
 *     PartnerAddress?: string,
 *     PartnerBadge?: array{S3Uri?: string, VersionId?: string, ...},
 *     EmailTarget?: array{S3Uri?: string, VersionId?: string, ...},
 *     EmailTargetEngagementGroupIds?: list<string>,
 *     SocialConnections?: array<string, list<string>>,
 *     EstimatedBudget?: array{Amount?: string, CurrencyCode?: string, ...},
 *     TotalBudget?: array{Amount?: string, CurrencyCode?: string, ...},
 *     TargetAudience?: array{
 *         Industries?: list<'AUTOMOTIVE'|'EDUCATION'|'ENERGY'|'FINANCIAL_SERVICES'|'GOVERNMENT'|'HEALTHCARE'|'INSURANCE'|'MANUFACTURING'|'MEDIA_ENTERTAINMENT'|'OTHER'|'RETAIL'|'TELECOMMUNICATIONS'>,
 *         CompanySizes?: list<'ENTERPRISE'|'GLOBAL_ENTERPRISE'|'MID_MARKET'|'SMALL_BUSINESS'|'STARTUP'>,
 *         Countries?: list<string>,
 *         ...,
 *     },
 *     ClientToken?: string,
 *     StartOn?: string,
 *     EndOn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCampaignAsset(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignAsset(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     CampaignIdentifier?: string,
 *     CampaignAssetIdentifier?: string,
 *     FieldValues?: list<array{FieldId?: string, Value?: array, ...}>,
 *     Layout?: string,
 *     SendMode?: 'ON_ACTIVATION'|'SCHEDULED',
 *     ScheduledSendAt?: int|string|\DateTimeInterface,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignAssetAsync(array{
 *     Catalog?: 'AWS'|'Sandbox',
 *     CampaignIdentifier?: string,
 *     CampaignAssetIdentifier?: string,
 *     FieldValues?: list<array{FieldId?: string, Value?: array, ...}>,
 *     Layout?: string,
 *     SendMode?: 'ON_ACTIVATION'|'SCHEDULED',
 *     ScheduledSendAt?: int|string|\DateTimeInterface,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 */
class PartnerCentralMarketingClient extends AwsClient {}
