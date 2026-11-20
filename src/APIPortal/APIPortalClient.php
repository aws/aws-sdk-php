<?php
namespace Aws\APIPortal;

use Aws\AwsClient;

/**
 * This client is used to interact with the **APIPortal** service.
 * @method \Aws\Result associateManagedApis(array $args = [])
 * @phpstan-method \Aws\Result associateManagedApis(array{productId?: string, managedApiIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateManagedApisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateManagedApisAsync(array{productId?: string, managedApiIds?: list<string>, ...} $args = [])
 * @method \Aws\Result createManagedApi(array $args = [])
 * @phpstan-method \Aws\Result createManagedApi(array{
 *     apiSignature?: array{
 *         resourceArn?: string,
 *         method?: 'ANY'|'DELETE'|'GET'|'HEAD'|'OPTIONS'|'PATCH'|'POST'|'PUT',
 *         hostname?: string,
 *         port?: int,
 *         path?: string,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createManagedApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createManagedApiAsync(array{
 *     apiSignature?: array{
 *         resourceArn?: string,
 *         method?: 'ANY'|'DELETE'|'GET'|'HEAD'|'OPTIONS'|'PATCH'|'POST'|'PUT',
 *         hostname?: string,
 *         port?: int,
 *         path?: string,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPortal(array $args = [])
 * @phpstan-method \Aws\Result createPortal(array{
 *     portalContent?: array{
 *         displayName?: string,
 *         description?: string,
 *         theme?: array{customColors?: array, logoUploadedAt?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     endpointConfiguration?: array{none?: array, acmManaged?: array{domainName?: string, certificateArn?: string, ...}, ...},
 *     authorization?: array{
 *         authorizationConfig?: array{none?: array, cognitoConfig?: array, ...},
 *         fineGrainedAccessControl?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     includedProductArns?: list<string>,
 *     logoUri?: string,
 *     rumAppMonitorName?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPortalAsync(array{
 *     portalContent?: array{
 *         displayName?: string,
 *         description?: string,
 *         theme?: array{customColors?: array, logoUploadedAt?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     endpointConfiguration?: array{none?: array, acmManaged?: array{domainName?: string, certificateArn?: string, ...}, ...},
 *     authorization?: array{
 *         authorizationConfig?: array{none?: array, cognitoConfig?: array, ...},
 *         fineGrainedAccessControl?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     includedProductArns?: list<string>,
 *     logoUri?: string,
 *     rumAppMonitorName?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPortalPreview(array $args = [])
 * @phpstan-method \Aws\Result createPortalPreview(array{portalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortalPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPortalPreviewAsync(array{portalId?: string, ...} $args = [])
 * @method \Aws\Result createProduct(array $args = [])
 * @phpstan-method \Aws\Result createProduct(array{
 *     displayName?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     apiSelectionConfiguration?: array{apiSelectionMode?: 'CUSTOM'|'RULE_BASED', ruleFilters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProductAsync(array{
 *     displayName?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     apiSelectionConfiguration?: array{apiSelectionMode?: 'CUSTOM'|'RULE_BASED', ruleFilters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProductApiPage(array $args = [])
 * @phpstan-method \Aws\Result createProductApiPage(array{
 *     productId?: string,
 *     managedApiId?: string,
 *     displayContent?: array{none?: array, overrides?: array{operationName?: string, apiUrl?: string, body?: string, ...}, ...},
 *     tryItState?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProductApiPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProductApiPageAsync(array{
 *     productId?: string,
 *     managedApiId?: string,
 *     displayContent?: array{none?: array, overrides?: array{operationName?: string, apiUrl?: string, body?: string, ...}, ...},
 *     tryItState?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProductPage(array $args = [])
 * @phpstan-method \Aws\Result createProductPage(array{
 *     productId?: string,
 *     displayContent?: array{title?: string, body?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProductPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProductPageAsync(array{
 *     productId?: string,
 *     displayContent?: array{title?: string, body?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDiscoveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteDiscoveryConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDiscoveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDiscoveryConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result deleteManagedApi(array $args = [])
 * @phpstan-method \Aws\Result deleteManagedApi(array{managedApiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteManagedApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteManagedApiAsync(array{managedApiId?: string, ...} $args = [])
 * @method \Aws\Result deleteOrganizationDiscoveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteOrganizationDiscoveryConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOrganizationDiscoveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOrganizationDiscoveryConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result deletePortal(array $args = [])
 * @phpstan-method \Aws\Result deletePortal(array{portalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePortalAsync(array{portalId?: string, ...} $args = [])
 * @method \Aws\Result deleteProduct(array $args = [])
 * @phpstan-method \Aws\Result deleteProduct(array{productId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProductAsync(array{productId?: string, ...} $args = [])
 * @method \Aws\Result deleteProductApiPage(array $args = [])
 * @phpstan-method \Aws\Result deleteProductApiPage(array{productId?: string, productApiPageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProductApiPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProductApiPageAsync(array{productId?: string, productApiPageId?: string, ...} $args = [])
 * @method \Aws\Result deleteProductPage(array $args = [])
 * @phpstan-method \Aws\Result deleteProductPage(array{productId?: string, productPageId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProductPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProductPageAsync(array{productId?: string, productPageId?: string, ...} $args = [])
 * @method \Aws\Result deleteProductSharingPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteProductSharingPolicy(array{productId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProductSharingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProductSharingPolicyAsync(array{productId?: string, ...} $args = [])
 * @method \Aws\Result disassociateManagedApis(array $args = [])
 * @phpstan-method \Aws\Result disassociateManagedApis(array{productId?: string, managedApiIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateManagedApisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateManagedApisAsync(array{productId?: string, managedApiIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getApiInventoryItem(array $args = [])
 * @phpstan-method \Aws\Result getApiInventoryItem(array{
 *     method?: 'ANY'|'DELETE'|'GET'|'HEAD'|'OPTIONS'|'PATCH'|'POST'|'PUT',
 *     host?: string,
 *     port?: int,
 *     path?: string,
 *     resourceArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getApiInventoryItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApiInventoryItemAsync(array{
 *     method?: 'ANY'|'DELETE'|'GET'|'HEAD'|'OPTIONS'|'PATCH'|'POST'|'PUT',
 *     host?: string,
 *     port?: int,
 *     path?: string,
 *     resourceArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDiscoveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getDiscoveryConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDiscoveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDiscoveryConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getManagedApi(array $args = [])
 * @phpstan-method \Aws\Result getManagedApi(array{managedApiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedApiAsync(array{managedApiId?: string, ...} $args = [])
 * @method \Aws\Result getOrganizationDiscoveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getOrganizationDiscoveryConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOrganizationDiscoveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOrganizationDiscoveryConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getPortal(array $args = [])
 * @phpstan-method \Aws\Result getPortal(array{portalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPortalAsync(array{portalId?: string, ...} $args = [])
 * @method \Aws\Result getProduct(array $args = [])
 * @phpstan-method \Aws\Result getProduct(array{productId?: string, resourceOwnerAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProductAsync(array{productId?: string, resourceOwnerAccountId?: string, ...} $args = [])
 * @method \Aws\Result getProductApiPage(array $args = [])
 * @phpstan-method \Aws\Result getProductApiPage(array{
 *     productId?: string,
 *     productApiPageId?: string,
 *     resourceOwnerAccountId?: string,
 *     includeRawDisplayContent?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getProductApiPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProductApiPageAsync(array{
 *     productId?: string,
 *     productApiPageId?: string,
 *     resourceOwnerAccountId?: string,
 *     includeRawDisplayContent?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getProductPage(array $args = [])
 * @phpstan-method \Aws\Result getProductPage(array{productId?: string, productPageId?: string, resourceOwnerAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProductPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProductPageAsync(array{productId?: string, productPageId?: string, resourceOwnerAccountId?: string, ...} $args = [])
 * @method \Aws\Result getProductSharingPolicy(array $args = [])
 * @phpstan-method \Aws\Result getProductSharingPolicy(array{productId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProductSharingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProductSharingPolicyAsync(array{productId?: string, ...} $args = [])
 * @method \Aws\Result listApiInventoryItems(array $args = [])
 * @phpstan-method \Aws\Result listApiInventoryItems(array{
 *     filters?: array{discoverySource?: 'API_GATEWAY'|'CLOUDFRONT'|'ELB', resourceArn?: string, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listApiInventoryItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApiInventoryItemsAsync(array{
 *     filters?: array{discoverySource?: 'API_GATEWAY'|'CLOUDFRONT'|'ELB', resourceArn?: string, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDiscoveryStatuses(array $args = [])
 * @phpstan-method \Aws\Result listDiscoveryStatuses(array{discoverySource?: 'API_GATEWAY'|'CLOUDFRONT'|'ELB', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDiscoveryStatusesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDiscoveryStatusesAsync(array{discoverySource?: 'API_GATEWAY'|'CLOUDFRONT'|'ELB', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listManagedApiEvents(array $args = [])
 * @phpstan-method \Aws\Result listManagedApiEvents(array{
 *     managedApiId?: string,
 *     startedAfter?: int|string|\DateTimeInterface,
 *     startedBefore?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedApiEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedApiEventsAsync(array{
 *     managedApiId?: string,
 *     startedAfter?: int|string|\DateTimeInterface,
 *     startedBefore?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listManagedApis(array $args = [])
 * @phpstan-method \Aws\Result listManagedApis(array{maxResults?: int, nextToken?: string, productId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedApisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedApisAsync(array{maxResults?: int, nextToken?: string, productId?: string, ...} $args = [])
 * @method \Aws\Result listPortals(array $args = [])
 * @phpstan-method \Aws\Result listPortals(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPortalsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listProductApiPages(array $args = [])
 * @phpstan-method \Aws\Result listProductApiPages(array{productId?: string, nextToken?: string, maxResults?: int, resourceOwnerAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProductApiPagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProductApiPagesAsync(array{productId?: string, nextToken?: string, maxResults?: int, resourceOwnerAccountId?: string, ...} $args = [])
 * @method \Aws\Result listProductPages(array $args = [])
 * @phpstan-method \Aws\Result listProductPages(array{productId?: string, nextToken?: string, maxResults?: int, resourceOwnerAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProductPagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProductPagesAsync(array{productId?: string, nextToken?: string, maxResults?: int, resourceOwnerAccountId?: string, ...} $args = [])
 * @method \Aws\Result listProducts(array $args = [])
 * @phpstan-method \Aws\Result listProducts(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     resourceOwner?: 'ALL'|'OTHER_ACCOUNTS'|'SELF',
 *     managedApiId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProductsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProductsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     resourceOwner?: 'ALL'|'OTHER_ACCOUNTS'|'SELF',
 *     managedApiId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putDiscoveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putDiscoveryConfiguration(array{
 *     discoverySources?: list<'API_GATEWAY'|'CLOUDFRONT'|'ELB'>,
 *     excludedResources?: list<string>,
 *     features?: list<'AI_DISCOVERY'>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDiscoveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDiscoveryConfigurationAsync(array{
 *     discoverySources?: list<'API_GATEWAY'|'CLOUDFRONT'|'ELB'>,
 *     excludedResources?: list<string>,
 *     features?: list<'AI_DISCOVERY'>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putOrganizationDiscoveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putOrganizationDiscoveryConfiguration(array{
 *     discoverySources?: list<'API_GATEWAY'|'CLOUDFRONT'|'ELB'>,
 *     exclusionFilters?: array{organizationalUnitIds?: list<string>, accountIds?: list<string>, resourceArns?: list<string>, ...},
 *     discoveryFilters?: array{
 *         exclusionFilters?: array{organizationalUnitIds?: list<string>, accountIds?: list<string>, resourceArns?: list<string>, ...},
 *         inclusionFilters?: array{organizationalUnitIds?: list<string>, accountIds?: list<string>, ...},
 *         ...,
 *     },
 *     features?: list<'AI_DISCOVERY'>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putOrganizationDiscoveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putOrganizationDiscoveryConfigurationAsync(array{
 *     discoverySources?: list<'API_GATEWAY'|'CLOUDFRONT'|'ELB'>,
 *     exclusionFilters?: array{organizationalUnitIds?: list<string>, accountIds?: list<string>, resourceArns?: list<string>, ...},
 *     discoveryFilters?: array{
 *         exclusionFilters?: array{organizationalUnitIds?: list<string>, accountIds?: list<string>, resourceArns?: list<string>, ...},
 *         inclusionFilters?: array{organizationalUnitIds?: list<string>, accountIds?: list<string>, ...},
 *         ...,
 *     },
 *     features?: list<'AI_DISCOVERY'>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putProductSharingPolicy(array $args = [])
 * @phpstan-method \Aws\Result putProductSharingPolicy(array{productId?: string, policyDocument?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putProductSharingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putProductSharingPolicyAsync(array{productId?: string, policyDocument?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result startDiscovery(array $args = [])
 * @phpstan-method \Aws\Result startDiscovery(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDiscoveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDiscoveryAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result stopDiscovery(array $args = [])
 * @phpstan-method \Aws\Result stopDiscovery(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDiscoveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDiscoveryAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updatePortal(array $args = [])
 * @phpstan-method \Aws\Result updatePortal(array{
 *     portalId?: string,
 *     portalContent?: array{
 *         displayName?: string,
 *         description?: string,
 *         theme?: array{customColors?: array, logoUploadedAt?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     endpointConfiguration?: array{none?: array, acmManaged?: array{domainName?: string, certificateArn?: string, ...}, ...},
 *     authorization?: array{
 *         authorizationConfig?: array{none?: array, cognitoConfig?: array, ...},
 *         fineGrainedAccessControl?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     rumAppMonitorName?: string,
 *     includedProductArns?: list<string>,
 *     logoUri?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePortalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePortalAsync(array{
 *     portalId?: string,
 *     portalContent?: array{
 *         displayName?: string,
 *         description?: string,
 *         theme?: array{customColors?: array, logoUploadedAt?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     endpointConfiguration?: array{none?: array, acmManaged?: array{domainName?: string, certificateArn?: string, ...}, ...},
 *     authorization?: array{
 *         authorizationConfig?: array{none?: array, cognitoConfig?: array, ...},
 *         fineGrainedAccessControl?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     rumAppMonitorName?: string,
 *     includedProductArns?: list<string>,
 *     logoUri?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePortalPublishStatus(array $args = [])
 * @phpstan-method \Aws\Result updatePortalPublishStatus(array{portalId?: string, status?: 'DISABLED'|'PUBLISHED', description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePortalPublishStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePortalPublishStatusAsync(array{portalId?: string, status?: 'DISABLED'|'PUBLISHED', description?: string, ...} $args = [])
 * @method \Aws\Result updateProduct(array $args = [])
 * @phpstan-method \Aws\Result updateProduct(array{
 *     productId?: string,
 *     displayName?: string,
 *     description?: string,
 *     displayOrder?: array{overviewPageArn?: string, productPageArns?: list<string>, contents?: list<array>, ...},
 *     apiSelectionConfiguration?: array{apiSelectionMode?: 'CUSTOM'|'RULE_BASED', ruleFilters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProductAsync(array{
 *     productId?: string,
 *     displayName?: string,
 *     description?: string,
 *     displayOrder?: array{overviewPageArn?: string, productPageArns?: list<string>, contents?: list<array>, ...},
 *     apiSelectionConfiguration?: array{apiSelectionMode?: 'CUSTOM'|'RULE_BASED', ruleFilters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProductApiPage(array $args = [])
 * @phpstan-method \Aws\Result updateProductApiPage(array{
 *     productId?: string,
 *     productApiPageId?: string,
 *     displayContent?: array{none?: array, overrides?: array{operationName?: string, apiUrl?: string, body?: string, ...}, ...},
 *     tryItState?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProductApiPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProductApiPageAsync(array{
 *     productId?: string,
 *     productApiPageId?: string,
 *     displayContent?: array{none?: array, overrides?: array{operationName?: string, apiUrl?: string, body?: string, ...}, ...},
 *     tryItState?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProductPage(array $args = [])
 * @phpstan-method \Aws\Result updateProductPage(array{
 *     productId?: string,
 *     productPageId?: string,
 *     displayContent?: array{title?: string, body?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProductPageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProductPageAsync(array{
 *     productId?: string,
 *     productPageId?: string,
 *     displayContent?: array{title?: string, body?: string, ...},
 *     ...,
 * } $args = [])
 */
class APIPortalClient extends AwsClient {}
