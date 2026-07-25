<?php
namespace Aws\GeoMaps;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Location Service Maps V2** service.
 * @method \Aws\Result getGlyphs(array $args = [])
 * @phpstan-method \Aws\Result getGlyphs(array{FontStack?: string, FontUnicodeRange?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlyphsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlyphsAsync(array{FontStack?: string, FontUnicodeRange?: string, ...} $args = [])
 * @method \Aws\Result getSprites(array $args = [])
 * @phpstan-method \Aws\Result getSprites(array{
 *     FileName?: string,
 *     Style?: 'Hybrid'|'Monochrome'|'Satellite'|'Standard',
 *     ColorScheme?: 'Dark'|'Light',
 *     Variant?: 'Default',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSpritesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSpritesAsync(array{
 *     FileName?: string,
 *     Style?: 'Hybrid'|'Monochrome'|'Satellite'|'Standard',
 *     ColorScheme?: 'Dark'|'Light',
 *     Variant?: 'Default',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getStaticMap(array $args = [])
 * @phpstan-method \Aws\Result getStaticMap(array{
 *     BoundingBox?: string,
 *     BoundedPositions?: string,
 *     Center?: string,
 *     ColorScheme?: 'Dark'|'Light',
 *     CompactOverlay?: string,
 *     CropLabels?: bool,
 *     GeoJsonOverlay?: string,
 *     Height?: int,
 *     Key?: string,
 *     LabelSize?: 'Large'|'Small',
 *     Language?: string,
 *     Padding?: int,
 *     PoliticalView?: string,
 *     PointsOfInterests?: 'Disabled'|'Enabled',
 *     Radius?: int,
 *     FileName?: string,
 *     ScaleBarUnit?: 'Kilometers'|'KilometersMiles'|'Miles'|'MilesKilometers',
 *     Style?: 'Satellite'|'Standard',
 *     Width?: int,
 *     Zoom?: float,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getStaticMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStaticMapAsync(array{
 *     BoundingBox?: string,
 *     BoundedPositions?: string,
 *     Center?: string,
 *     ColorScheme?: 'Dark'|'Light',
 *     CompactOverlay?: string,
 *     CropLabels?: bool,
 *     GeoJsonOverlay?: string,
 *     Height?: int,
 *     Key?: string,
 *     LabelSize?: 'Large'|'Small',
 *     Language?: string,
 *     Padding?: int,
 *     PoliticalView?: string,
 *     PointsOfInterests?: 'Disabled'|'Enabled',
 *     Radius?: int,
 *     FileName?: string,
 *     ScaleBarUnit?: 'Kilometers'|'KilometersMiles'|'Miles'|'MilesKilometers',
 *     Style?: 'Satellite'|'Standard',
 *     Width?: int,
 *     Zoom?: float,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getStyleDescriptor(array $args = [])
 * @phpstan-method \Aws\Result getStyleDescriptor(array{
 *     Style?: 'Hybrid'|'Monochrome'|'Satellite'|'Standard',
 *     ColorScheme?: 'Dark'|'Light',
 *     PoliticalView?: string,
 *     Terrain?: 'Hillshade'|'Terrain3D',
 *     ContourDensity?: 'High'|'Low'|'Medium',
 *     Traffic?: 'All'|'Congestion',
 *     TravelModes?: list<'Transit'|'Truck'>,
 *     Buildings?: 'Buildings3D',
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getStyleDescriptorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStyleDescriptorAsync(array{
 *     Style?: 'Hybrid'|'Monochrome'|'Satellite'|'Standard',
 *     ColorScheme?: 'Dark'|'Light',
 *     PoliticalView?: string,
 *     Terrain?: 'Hillshade'|'Terrain3D',
 *     ContourDensity?: 'High'|'Low'|'Medium',
 *     Traffic?: 'All'|'Congestion',
 *     TravelModes?: list<'Transit'|'Truck'>,
 *     Buildings?: 'Buildings3D',
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTile(array $args = [])
 * @phpstan-method \Aws\Result getTile(array{
 *     AdditionalFeatures?: list<'ContourLines'|'Hillshade'|'Logistics'|'Transit'>,
 *     Tileset?: string,
 *     Z?: string,
 *     X?: string,
 *     Y?: string,
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTileAsync(array{
 *     AdditionalFeatures?: list<'ContourLines'|'Hillshade'|'Logistics'|'Transit'>,
 *     Tileset?: string,
 *     Z?: string,
 *     X?: string,
 *     Y?: string,
 *     Key?: string,
 *     ...,
 * } $args = [])
 */
class GeoMapsClient extends AwsClient {}
