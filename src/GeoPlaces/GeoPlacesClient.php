<?php
namespace Aws\GeoPlaces;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Location Service Places V2** service.
 * @method \Aws\Result autocomplete(array $args = [])
 * @phpstan-method \Aws\Result autocomplete(array{
 *     QueryText?: string,
 *     MaxResults?: int,
 *     BiasPosition?: list<float>,
 *     Filter?: array{
 *         BoundingBox?: list<float>,
 *         Circle?: array{Center?: list<float>, Radius?: int, ...},
 *         IncludeCountries?: list<string>,
 *         IncludePlaceTypes?: list<'Country'|'InterpolatedAddress'|'Intersection'|'Locality'|'PointAddress'|'PostalCode'|'Region'|'Street'>,
 *         ...,
 *     },
 *     PostalCodeMode?: 'EnumerateSpannedDistricts'|'EnumerateSpannedLocalities'|'MergeAllSpannedLocalities',
 *     AdditionalFeatures?: list<'Core'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse',
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise autocompleteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise autocompleteAsync(array{
 *     QueryText?: string,
 *     MaxResults?: int,
 *     BiasPosition?: list<float>,
 *     Filter?: array{
 *         BoundingBox?: list<float>,
 *         Circle?: array{Center?: list<float>, Radius?: int, ...},
 *         IncludeCountries?: list<string>,
 *         IncludePlaceTypes?: list<'Country'|'InterpolatedAddress'|'Intersection'|'Locality'|'PointAddress'|'PostalCode'|'Region'|'Street'>,
 *         ...,
 *     },
 *     PostalCodeMode?: 'EnumerateSpannedDistricts'|'EnumerateSpannedLocalities'|'MergeAllSpannedLocalities',
 *     AdditionalFeatures?: list<'Core'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse',
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result geocode(array $args = [])
 * @phpstan-method \Aws\Result geocode(array{
 *     QueryText?: string,
 *     QueryComponents?: array{
 *         Country?: string,
 *         Region?: string,
 *         SubRegion?: string,
 *         Locality?: string,
 *         District?: string,
 *         Street?: string,
 *         AddressNumber?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     MaxResults?: int,
 *     BiasPosition?: list<float>,
 *     Filter?: array{
 *         IncludeCountries?: list<string>,
 *         IncludePlaceTypes?: list<'Country'|'InterpolatedAddress'|'Intersection'|'Locality'|'PointAddress'|'PointOfInterest'|'PostalCode'|'Region'|'SecondaryAddress'|'Street'>,
 *         ...,
 *     },
 *     AdditionalFeatures?: list<'Access'|'Intersections'|'SecondaryAddresses'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse'|'Storage',
 *     Key?: string,
 *     PostalCodeMode?: 'EnumerateSpannedDistricts'|'EnumerateSpannedLocalities'|'MergeAllSpannedLocalities',
 *     AddressTranslations?: list<'District'|'Locality'|'Region'|'SubRegion'>,
 *     AddressNamesMode?: 'Administrative'|'Matched',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise geocodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise geocodeAsync(array{
 *     QueryText?: string,
 *     QueryComponents?: array{
 *         Country?: string,
 *         Region?: string,
 *         SubRegion?: string,
 *         Locality?: string,
 *         District?: string,
 *         Street?: string,
 *         AddressNumber?: string,
 *         PostalCode?: string,
 *         ...,
 *     },
 *     MaxResults?: int,
 *     BiasPosition?: list<float>,
 *     Filter?: array{
 *         IncludeCountries?: list<string>,
 *         IncludePlaceTypes?: list<'Country'|'InterpolatedAddress'|'Intersection'|'Locality'|'PointAddress'|'PointOfInterest'|'PostalCode'|'Region'|'SecondaryAddress'|'Street'>,
 *         ...,
 *     },
 *     AdditionalFeatures?: list<'Access'|'Intersections'|'SecondaryAddresses'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse'|'Storage',
 *     Key?: string,
 *     PostalCodeMode?: 'EnumerateSpannedDistricts'|'EnumerateSpannedLocalities'|'MergeAllSpannedLocalities',
 *     AddressTranslations?: list<'District'|'Locality'|'Region'|'SubRegion'>,
 *     AddressNamesMode?: 'Administrative'|'Matched',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPlace(array $args = [])
 * @phpstan-method \Aws\Result getPlace(array{
 *     PlaceId?: string,
 *     AdditionalFeatures?: list<'Access'|'Contact'|'CrossReferences'|'Phonemes'|'SecondaryAddresses'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse'|'Storage',
 *     Key?: string,
 *     AddressNamesMode?: 'Administrative',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlaceAsync(array{
 *     PlaceId?: string,
 *     AdditionalFeatures?: list<'Access'|'Contact'|'CrossReferences'|'Phonemes'|'SecondaryAddresses'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse'|'Storage',
 *     Key?: string,
 *     AddressNamesMode?: 'Administrative',
 *     ...,
 * } $args = [])
 * @method \Aws\Result reverseGeocode(array $args = [])
 * @phpstan-method \Aws\Result reverseGeocode(array{
 *     QueryPosition?: list<float>,
 *     QueryRadius?: int,
 *     MaxResults?: int,
 *     Filter?: array{
 *         IncludePlaceTypes?: list<'InterpolatedAddress'|'Intersection'|'Locality'|'PointAddress'|'PointOfInterest'|'SecondaryAddress'|'Street'>,
 *         ...,
 *     },
 *     AdditionalFeatures?: list<'Access'|'Intersections'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse'|'Storage',
 *     Key?: string,
 *     Heading?: float,
 *     AddressNamesMode?: 'Administrative',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise reverseGeocodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reverseGeocodeAsync(array{
 *     QueryPosition?: list<float>,
 *     QueryRadius?: int,
 *     MaxResults?: int,
 *     Filter?: array{
 *         IncludePlaceTypes?: list<'InterpolatedAddress'|'Intersection'|'Locality'|'PointAddress'|'PointOfInterest'|'SecondaryAddress'|'Street'>,
 *         ...,
 *     },
 *     AdditionalFeatures?: list<'Access'|'Intersections'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse'|'Storage',
 *     Key?: string,
 *     Heading?: float,
 *     AddressNamesMode?: 'Administrative',
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchNearby(array $args = [])
 * @phpstan-method \Aws\Result searchNearby(array{
 *     QueryPosition?: list<float>,
 *     QueryRadius?: int,
 *     MaxResults?: int,
 *     Filter?: array{
 *         BoundingBox?: list<float>,
 *         IncludeCountries?: list<string>,
 *         IncludeCategories?: list<string>,
 *         ExcludeCategories?: list<string>,
 *         IncludeBusinessChains?: list<string>,
 *         ExcludeBusinessChains?: list<string>,
 *         IncludeFoodTypes?: list<string>,
 *         ExcludeFoodTypes?: list<string>,
 *         ...,
 *     },
 *     AdditionalFeatures?: list<'Access'|'Contact'|'CrossReferences'|'Phonemes'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse'|'Storage',
 *     NextToken?: string,
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchNearbyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchNearbyAsync(array{
 *     QueryPosition?: list<float>,
 *     QueryRadius?: int,
 *     MaxResults?: int,
 *     Filter?: array{
 *         BoundingBox?: list<float>,
 *         IncludeCountries?: list<string>,
 *         IncludeCategories?: list<string>,
 *         ExcludeCategories?: list<string>,
 *         IncludeBusinessChains?: list<string>,
 *         ExcludeBusinessChains?: list<string>,
 *         IncludeFoodTypes?: list<string>,
 *         ExcludeFoodTypes?: list<string>,
 *         ...,
 *     },
 *     AdditionalFeatures?: list<'Access'|'Contact'|'CrossReferences'|'Phonemes'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse'|'Storage',
 *     NextToken?: string,
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchText(array $args = [])
 * @phpstan-method \Aws\Result searchText(array{
 *     QueryText?: string,
 *     QueryId?: string,
 *     MaxResults?: int,
 *     BiasPosition?: list<float>,
 *     Filter?: array{
 *         BoundingBox?: list<float>,
 *         Circle?: array{Center?: list<float>, Radius?: int, ...},
 *         IncludeCountries?: list<string>,
 *         ...,
 *     },
 *     AdditionalFeatures?: list<'Access'|'Contact'|'CrossReferences'|'Phonemes'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse'|'Storage',
 *     NextToken?: string,
 *     TravelMode?: 'Car'|'Scooter'|'Truck',
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchTextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchTextAsync(array{
 *     QueryText?: string,
 *     QueryId?: string,
 *     MaxResults?: int,
 *     BiasPosition?: list<float>,
 *     Filter?: array{
 *         BoundingBox?: list<float>,
 *         Circle?: array{Center?: list<float>, Radius?: int, ...},
 *         IncludeCountries?: list<string>,
 *         ...,
 *     },
 *     AdditionalFeatures?: list<'Access'|'Contact'|'CrossReferences'|'Phonemes'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse'|'Storage',
 *     NextToken?: string,
 *     TravelMode?: 'Car'|'Scooter'|'Truck',
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result suggest(array $args = [])
 * @phpstan-method \Aws\Result suggest(array{
 *     QueryText?: string,
 *     MaxResults?: int,
 *     MaxQueryRefinements?: int,
 *     BiasPosition?: list<float>,
 *     Filter?: array{
 *         BoundingBox?: list<float>,
 *         Circle?: array{Center?: list<float>, Radius?: int, ...},
 *         IncludeCountries?: list<string>,
 *         ...,
 *     },
 *     AdditionalFeatures?: list<'Access'|'Core'|'CrossReferences'|'Phonemes'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse',
 *     TravelMode?: 'Car'|'Scooter'|'Truck',
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise suggestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise suggestAsync(array{
 *     QueryText?: string,
 *     MaxResults?: int,
 *     MaxQueryRefinements?: int,
 *     BiasPosition?: list<float>,
 *     Filter?: array{
 *         BoundingBox?: list<float>,
 *         Circle?: array{Center?: list<float>, Radius?: int, ...},
 *         IncludeCountries?: list<string>,
 *         ...,
 *     },
 *     AdditionalFeatures?: list<'Access'|'Core'|'CrossReferences'|'Phonemes'|'TimeZone'>,
 *     Language?: string,
 *     PoliticalView?: string,
 *     IntendedUse?: 'SingleUse',
 *     TravelMode?: 'Car'|'Scooter'|'Truck',
 *     Key?: string,
 *     ...,
 * } $args = [])
 */
class GeoPlacesClient extends AwsClient {}
