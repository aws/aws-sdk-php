<?php
namespace Aws\MarketplaceCatalog;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Catalog Service** service.
 * @method \Aws\Result batchDescribeEntities(array $args = [])
 * @phpstan-method \Aws\Result batchDescribeEntities(array{EntityRequestList?: list<array{Catalog?: string, EntityId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDescribeEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDescribeEntitiesAsync(array{EntityRequestList?: list<array{Catalog?: string, EntityId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result cancelChangeSet(array $args = [])
 * @phpstan-method \Aws\Result cancelChangeSet(array{Catalog?: string, ChangeSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelChangeSetAsync(array{Catalog?: string, ChangeSetId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeChangeSet(array $args = [])
 * @phpstan-method \Aws\Result describeChangeSet(array{Catalog?: string, ChangeSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChangeSetAsync(array{Catalog?: string, ChangeSetId?: string, ...} $args = [])
 * @method \Aws\Result describeEntity(array $args = [])
 * @phpstan-method \Aws\Result describeEntity(array{Catalog?: string, EntityId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEntityAsync(array{Catalog?: string, EntityId?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listChangeSets(array $args = [])
 * @phpstan-method \Aws\Result listChangeSets(array{
 *     Catalog?: string,
 *     FilterList?: list<array{Name?: string, ValueList?: list<string>, ...}>,
 *     Sort?: array{SortBy?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listChangeSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChangeSetsAsync(array{
 *     Catalog?: string,
 *     FilterList?: list<array{Name?: string, ValueList?: list<string>, ...}>,
 *     Sort?: array{SortBy?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEntities(array $args = [])
 * @phpstan-method \Aws\Result listEntities(array{
 *     Catalog?: string,
 *     EntityType?: string,
 *     FilterList?: list<array{Name?: string, ValueList?: list<string>, ...}>,
 *     Sort?: array{SortBy?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     OwnershipType?: 'SELF'|'SHARED',
 *     EntityTypeFilters?: array{
 *         DataProductFilters?: array{EntityId?: array, ProductTitle?: array, Visibility?: array, LastModifiedDate?: array, ...},
 *         SaaSProductFilters?: array{EntityId?: array, ProductTitle?: array, Visibility?: array, LastModifiedDate?: array, ...},
 *         AmiProductFilters?: array{EntityId?: array, LastModifiedDate?: array, ProductTitle?: array, Visibility?: array, ...},
 *         OfferFilters?: array{
 *             EntityId?: array,
 *             Name?: array,
 *             ProductId?: array,
 *             ResaleAuthorizationId?: array,
 *             ReleaseDate?: array,
 *             AvailabilityEndDate?: array,
 *             BuyerAccounts?: array,
 *             State?: array,
 *             Targeting?: array,
 *             LastModifiedDate?: array,
 *             OfferSetId?: array,
 *             ...,
 *         },
 *         ContainerProductFilters?: array{EntityId?: array, LastModifiedDate?: array, ProductTitle?: array, Visibility?: array, ...},
 *         ResaleAuthorizationFilters?: array{
 *             EntityId?: array,
 *             Name?: array,
 *             ProductId?: array,
 *             CreatedDate?: array,
 *             AvailabilityEndDate?: array,
 *             ManufacturerAccountId?: array,
 *             ProductName?: array,
 *             ManufacturerLegalName?: array,
 *             ResellerAccountID?: array,
 *             ResellerLegalName?: array,
 *             Status?: array,
 *             OfferExtendedStatus?: array,
 *             LastModifiedDate?: array,
 *             ResellerRole?: array,
 *             ...,
 *         },
 *         MachineLearningProductFilters?: array{EntityId?: array, LastModifiedDate?: array, ProductTitle?: array, Visibility?: array, ...},
 *         OfferSetFilters?: array{
 *             EntityId?: array,
 *             Name?: array,
 *             State?: array,
 *             ReleaseDate?: array,
 *             AssociatedOfferIds?: array,
 *             SolutionId?: array,
 *             LastModifiedDate?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     EntityTypeSort?: array{
 *         DataProductSort?: array{
 *             SortBy?: 'EntityId'|'LastModifiedDate'|'ProductTitle'|'Visibility',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         SaaSProductSort?: array{
 *             SortBy?: 'DeliveryOptionTypes'|'EntityId'|'LastModifiedDate'|'ProductTitle'|'Visibility',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         AmiProductSort?: array{
 *             SortBy?: 'EntityId'|'LastModifiedDate'|'ProductTitle'|'Visibility',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         OfferSort?: array{
 *             SortBy?: 'AvailabilityEndDate'|'BuyerAccounts'|'EntityId'|'LastModifiedDate'|'Name'|'OfferSetId'|'ProductId'|'ReleaseDate'|'ResaleAuthorizationId'|'State'|'Targeting',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         ContainerProductSort?: array{
 *             SortBy?: 'CompatibleAWSServices'|'EntityId'|'LastModifiedDate'|'ProductTitle'|'Visibility',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         ResaleAuthorizationSort?: array{
 *             SortBy?: 'AvailabilityEndDate'|'CreatedDate'|'EntityId'|'LastModifiedDate'|'ManufacturerAccountId'|'ManufacturerLegalName'|'Name'|'OfferExtendedStatus'|'ProductId'|'ProductName'|'ResellerAccountID'|'ResellerLegalName'|'Status',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         MachineLearningProductSort?: array{
 *             SortBy?: 'EntityId'|'LastModifiedDate'|'ProductTitle'|'Visibility',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         OfferSetSort?: array{
 *             SortBy?: 'EntityId'|'LastModifiedDate'|'Name'|'ReleaseDate'|'SolutionId'|'State',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntitiesAsync(array{
 *     Catalog?: string,
 *     EntityType?: string,
 *     FilterList?: list<array{Name?: string, ValueList?: list<string>, ...}>,
 *     Sort?: array{SortBy?: string, SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     OwnershipType?: 'SELF'|'SHARED',
 *     EntityTypeFilters?: array{
 *         DataProductFilters?: array{EntityId?: array, ProductTitle?: array, Visibility?: array, LastModifiedDate?: array, ...},
 *         SaaSProductFilters?: array{EntityId?: array, ProductTitle?: array, Visibility?: array, LastModifiedDate?: array, ...},
 *         AmiProductFilters?: array{EntityId?: array, LastModifiedDate?: array, ProductTitle?: array, Visibility?: array, ...},
 *         OfferFilters?: array{
 *             EntityId?: array,
 *             Name?: array,
 *             ProductId?: array,
 *             ResaleAuthorizationId?: array,
 *             ReleaseDate?: array,
 *             AvailabilityEndDate?: array,
 *             BuyerAccounts?: array,
 *             State?: array,
 *             Targeting?: array,
 *             LastModifiedDate?: array,
 *             OfferSetId?: array,
 *             ...,
 *         },
 *         ContainerProductFilters?: array{EntityId?: array, LastModifiedDate?: array, ProductTitle?: array, Visibility?: array, ...},
 *         ResaleAuthorizationFilters?: array{
 *             EntityId?: array,
 *             Name?: array,
 *             ProductId?: array,
 *             CreatedDate?: array,
 *             AvailabilityEndDate?: array,
 *             ManufacturerAccountId?: array,
 *             ProductName?: array,
 *             ManufacturerLegalName?: array,
 *             ResellerAccountID?: array,
 *             ResellerLegalName?: array,
 *             Status?: array,
 *             OfferExtendedStatus?: array,
 *             LastModifiedDate?: array,
 *             ResellerRole?: array,
 *             ...,
 *         },
 *         MachineLearningProductFilters?: array{EntityId?: array, LastModifiedDate?: array, ProductTitle?: array, Visibility?: array, ...},
 *         OfferSetFilters?: array{
 *             EntityId?: array,
 *             Name?: array,
 *             State?: array,
 *             ReleaseDate?: array,
 *             AssociatedOfferIds?: array,
 *             SolutionId?: array,
 *             LastModifiedDate?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     EntityTypeSort?: array{
 *         DataProductSort?: array{
 *             SortBy?: 'EntityId'|'LastModifiedDate'|'ProductTitle'|'Visibility',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         SaaSProductSort?: array{
 *             SortBy?: 'DeliveryOptionTypes'|'EntityId'|'LastModifiedDate'|'ProductTitle'|'Visibility',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         AmiProductSort?: array{
 *             SortBy?: 'EntityId'|'LastModifiedDate'|'ProductTitle'|'Visibility',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         OfferSort?: array{
 *             SortBy?: 'AvailabilityEndDate'|'BuyerAccounts'|'EntityId'|'LastModifiedDate'|'Name'|'OfferSetId'|'ProductId'|'ReleaseDate'|'ResaleAuthorizationId'|'State'|'Targeting',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         ContainerProductSort?: array{
 *             SortBy?: 'CompatibleAWSServices'|'EntityId'|'LastModifiedDate'|'ProductTitle'|'Visibility',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         ResaleAuthorizationSort?: array{
 *             SortBy?: 'AvailabilityEndDate'|'CreatedDate'|'EntityId'|'LastModifiedDate'|'ManufacturerAccountId'|'ManufacturerLegalName'|'Name'|'OfferExtendedStatus'|'ProductId'|'ProductName'|'ResellerAccountID'|'ResellerLegalName'|'Status',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         MachineLearningProductSort?: array{
 *             SortBy?: 'EntityId'|'LastModifiedDate'|'ProductTitle'|'Visibility',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         OfferSetSort?: array{
 *             SortBy?: 'EntityId'|'LastModifiedDate'|'Name'|'ReleaseDate'|'SolutionId'|'State',
 *             SortOrder?: 'ASCENDING'|'DESCENDING',
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result startChangeSet(array $args = [])
 * @phpstan-method \Aws\Result startChangeSet(array{
 *     Catalog?: string,
 *     ChangeSet?: list<array{
 *         ChangeType?: string,
 *         Entity?: array,
 *         EntityTags?: list<array>,
 *         Details?: string,
 *         DetailsDocument?: array,
 *         ChangeName?: string,
 *         ...,
 *     }>,
 *     ChangeSetName?: string,
 *     ClientRequestToken?: string,
 *     ChangeSetTags?: list<array{Key?: string, Value?: string, ...}>,
 *     Intent?: 'APPLY'|'VALIDATE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startChangeSetAsync(array{
 *     Catalog?: string,
 *     ChangeSet?: list<array{
 *         ChangeType?: string,
 *         Entity?: array,
 *         EntityTags?: list<array>,
 *         Details?: string,
 *         DetailsDocument?: array,
 *         ChangeName?: string,
 *         ...,
 *     }>,
 *     ChangeSetName?: string,
 *     ClientRequestToken?: string,
 *     ChangeSetTags?: list<array{Key?: string, Value?: string, ...}>,
 *     Intent?: 'APPLY'|'VALIDATE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 */
class MarketplaceCatalogClient extends AwsClient {}
