<?php
namespace Aws\LocationService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Location Service** service.
 * @method \Aws\Result associateTrackerConsumer(array $args = [])
 * @phpstan-method \Aws\Result associateTrackerConsumer(array{TrackerName?: string, ConsumerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateTrackerConsumerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateTrackerConsumerAsync(array{TrackerName?: string, ConsumerArn?: string, ...} $args = [])
 * @method \Aws\Result batchDeleteDevicePositionHistory(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteDevicePositionHistory(array{TrackerName?: string, DeviceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteDevicePositionHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteDevicePositionHistoryAsync(array{TrackerName?: string, DeviceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDeleteGeofence(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteGeofence(array{CollectionName?: string, GeofenceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteGeofenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteGeofenceAsync(array{CollectionName?: string, GeofenceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchEvaluateGeofences(array $args = [])
 * @phpstan-method \Aws\Result batchEvaluateGeofences(array{
 *     CollectionName?: string,
 *     DevicePositionUpdates?: list<array{
 *         DeviceId?: string,
 *         SampleTime?: int|string|\DateTimeInterface,
 *         Position?: list<float>,
 *         Accuracy?: array,
 *         PositionProperties?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchEvaluateGeofencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchEvaluateGeofencesAsync(array{
 *     CollectionName?: string,
 *     DevicePositionUpdates?: list<array{
 *         DeviceId?: string,
 *         SampleTime?: int|string|\DateTimeInterface,
 *         Position?: list<float>,
 *         Accuracy?: array,
 *         PositionProperties?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetDevicePosition(array $args = [])
 * @phpstan-method \Aws\Result batchGetDevicePosition(array{TrackerName?: string, DeviceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetDevicePositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetDevicePositionAsync(array{TrackerName?: string, DeviceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchPutGeofence(array $args = [])
 * @phpstan-method \Aws\Result batchPutGeofence(array{
 *     CollectionName?: string,
 *     Entries?: list<array{GeofenceId?: string, Geometry?: array, GeofenceProperties?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutGeofenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutGeofenceAsync(array{
 *     CollectionName?: string,
 *     Entries?: list<array{GeofenceId?: string, Geometry?: array, GeofenceProperties?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateDevicePosition(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateDevicePosition(array{
 *     TrackerName?: string,
 *     Updates?: list<array{
 *         DeviceId?: string,
 *         SampleTime?: int|string|\DateTimeInterface,
 *         Position?: list<float>,
 *         Accuracy?: array,
 *         PositionProperties?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateDevicePositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateDevicePositionAsync(array{
 *     TrackerName?: string,
 *     Updates?: list<array{
 *         DeviceId?: string,
 *         SampleTime?: int|string|\DateTimeInterface,
 *         Position?: list<float>,
 *         Accuracy?: array,
 *         PositionProperties?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result calculateRoute(array $args = [])
 * @phpstan-method \Aws\Result calculateRoute(array{
 *     CalculatorName?: string,
 *     DeparturePosition?: list<float>,
 *     DestinationPosition?: list<float>,
 *     WaypointPositions?: list<list<float>>,
 *     TravelMode?: 'Bicycle'|'Car'|'Motorcycle'|'Truck'|'Walking',
 *     DepartureTime?: int|string|\DateTimeInterface,
 *     DepartNow?: bool,
 *     DistanceUnit?: 'Kilometers'|'Miles',
 *     IncludeLegGeometry?: bool,
 *     CarModeOptions?: array{AvoidFerries?: bool, AvoidTolls?: bool, ...},
 *     TruckModeOptions?: array{
 *         AvoidFerries?: bool,
 *         AvoidTolls?: bool,
 *         Dimensions?: array{Length?: float, Height?: float, Width?: float, Unit?: 'Feet'|'Meters', ...},
 *         Weight?: array{Total?: float, Unit?: 'Kilograms'|'Pounds', ...},
 *         ...,
 *     },
 *     ArrivalTime?: int|string|\DateTimeInterface,
 *     OptimizeFor?: 'FastestRoute'|'ShortestRoute',
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise calculateRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise calculateRouteAsync(array{
 *     CalculatorName?: string,
 *     DeparturePosition?: list<float>,
 *     DestinationPosition?: list<float>,
 *     WaypointPositions?: list<list<float>>,
 *     TravelMode?: 'Bicycle'|'Car'|'Motorcycle'|'Truck'|'Walking',
 *     DepartureTime?: int|string|\DateTimeInterface,
 *     DepartNow?: bool,
 *     DistanceUnit?: 'Kilometers'|'Miles',
 *     IncludeLegGeometry?: bool,
 *     CarModeOptions?: array{AvoidFerries?: bool, AvoidTolls?: bool, ...},
 *     TruckModeOptions?: array{
 *         AvoidFerries?: bool,
 *         AvoidTolls?: bool,
 *         Dimensions?: array{Length?: float, Height?: float, Width?: float, Unit?: 'Feet'|'Meters', ...},
 *         Weight?: array{Total?: float, Unit?: 'Kilograms'|'Pounds', ...},
 *         ...,
 *     },
 *     ArrivalTime?: int|string|\DateTimeInterface,
 *     OptimizeFor?: 'FastestRoute'|'ShortestRoute',
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result calculateRouteMatrix(array $args = [])
 * @phpstan-method \Aws\Result calculateRouteMatrix(array{
 *     CalculatorName?: string,
 *     DeparturePositions?: list<list<float>>,
 *     DestinationPositions?: list<list<float>>,
 *     TravelMode?: 'Bicycle'|'Car'|'Motorcycle'|'Truck'|'Walking',
 *     DepartureTime?: int|string|\DateTimeInterface,
 *     DepartNow?: bool,
 *     DistanceUnit?: 'Kilometers'|'Miles',
 *     CarModeOptions?: array{AvoidFerries?: bool, AvoidTolls?: bool, ...},
 *     TruckModeOptions?: array{
 *         AvoidFerries?: bool,
 *         AvoidTolls?: bool,
 *         Dimensions?: array{Length?: float, Height?: float, Width?: float, Unit?: 'Feet'|'Meters', ...},
 *         Weight?: array{Total?: float, Unit?: 'Kilograms'|'Pounds', ...},
 *         ...,
 *     },
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise calculateRouteMatrixAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise calculateRouteMatrixAsync(array{
 *     CalculatorName?: string,
 *     DeparturePositions?: list<list<float>>,
 *     DestinationPositions?: list<list<float>>,
 *     TravelMode?: 'Bicycle'|'Car'|'Motorcycle'|'Truck'|'Walking',
 *     DepartureTime?: int|string|\DateTimeInterface,
 *     DepartNow?: bool,
 *     DistanceUnit?: 'Kilometers'|'Miles',
 *     CarModeOptions?: array{AvoidFerries?: bool, AvoidTolls?: bool, ...},
 *     TruckModeOptions?: array{
 *         AvoidFerries?: bool,
 *         AvoidTolls?: bool,
 *         Dimensions?: array{Length?: float, Height?: float, Width?: float, Unit?: 'Feet'|'Meters', ...},
 *         Weight?: array{Total?: float, Unit?: 'Kilograms'|'Pounds', ...},
 *         ...,
 *     },
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelJob(array $args = [])
 * @phpstan-method \Aws\Result cancelJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result createGeofenceCollection(array $args = [])
 * @phpstan-method \Aws\Result createGeofenceCollection(array{
 *     CollectionName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     PricingPlanDataSource?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     KmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGeofenceCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGeofenceCollectionAsync(array{
 *     CollectionName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     PricingPlanDataSource?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     KmsKeyId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKey(array $args = [])
 * @phpstan-method \Aws\Result createKey(array{
 *     KeyName?: string,
 *     Restrictions?: array{
 *         AllowActions?: list<string>,
 *         AllowResources?: list<string>,
 *         AllowReferers?: list<string>,
 *         AllowAndroidApps?: list<array>,
 *         AllowAppleApps?: list<array>,
 *         ...,
 *     },
 *     Description?: string,
 *     ExpireTime?: int|string|\DateTimeInterface,
 *     NoExpiry?: bool,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKeyAsync(array{
 *     KeyName?: string,
 *     Restrictions?: array{
 *         AllowActions?: list<string>,
 *         AllowResources?: list<string>,
 *         AllowReferers?: list<string>,
 *         AllowAndroidApps?: list<array>,
 *         AllowAppleApps?: list<array>,
 *         ...,
 *     },
 *     Description?: string,
 *     ExpireTime?: int|string|\DateTimeInterface,
 *     NoExpiry?: bool,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMap(array $args = [])
 * @phpstan-method \Aws\Result createMap(array{
 *     MapName?: string,
 *     Configuration?: array{Style?: string, PoliticalView?: string, CustomLayers?: list<string>, ...},
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMapAsync(array{
 *     MapName?: string,
 *     Configuration?: array{Style?: string, PoliticalView?: string, CustomLayers?: list<string>, ...},
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPlaceIndex(array $args = [])
 * @phpstan-method \Aws\Result createPlaceIndex(array{
 *     IndexName?: string,
 *     DataSource?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     DataSourceConfiguration?: array{IntendedUse?: 'SingleUse'|'Storage', ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPlaceIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPlaceIndexAsync(array{
 *     IndexName?: string,
 *     DataSource?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     DataSourceConfiguration?: array{IntendedUse?: 'SingleUse'|'Storage', ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRouteCalculator(array $args = [])
 * @phpstan-method \Aws\Result createRouteCalculator(array{
 *     CalculatorName?: string,
 *     DataSource?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRouteCalculatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRouteCalculatorAsync(array{
 *     CalculatorName?: string,
 *     DataSource?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTracker(array $args = [])
 * @phpstan-method \Aws\Result createTracker(array{
 *     TrackerName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     KmsKeyId?: string,
 *     PricingPlanDataSource?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     PositionFiltering?: 'AccuracyBased'|'DistanceBased'|'TimeBased',
 *     EventBridgeEnabled?: bool,
 *     KmsKeyEnableGeospatialQueries?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrackerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrackerAsync(array{
 *     TrackerName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     KmsKeyId?: string,
 *     PricingPlanDataSource?: string,
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     PositionFiltering?: 'AccuracyBased'|'DistanceBased'|'TimeBased',
 *     EventBridgeEnabled?: bool,
 *     KmsKeyEnableGeospatialQueries?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGeofenceCollection(array $args = [])
 * @phpstan-method \Aws\Result deleteGeofenceCollection(array{CollectionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGeofenceCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGeofenceCollectionAsync(array{CollectionName?: string, ...} $args = [])
 * @method \Aws\Result deleteKey(array $args = [])
 * @phpstan-method \Aws\Result deleteKey(array{KeyName?: string, ForceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKeyAsync(array{KeyName?: string, ForceDelete?: bool, ...} $args = [])
 * @method \Aws\Result deleteMap(array $args = [])
 * @phpstan-method \Aws\Result deleteMap(array{MapName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMapAsync(array{MapName?: string, ...} $args = [])
 * @method \Aws\Result deletePlaceIndex(array $args = [])
 * @phpstan-method \Aws\Result deletePlaceIndex(array{IndexName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePlaceIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePlaceIndexAsync(array{IndexName?: string, ...} $args = [])
 * @method \Aws\Result deleteRouteCalculator(array $args = [])
 * @phpstan-method \Aws\Result deleteRouteCalculator(array{CalculatorName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRouteCalculatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRouteCalculatorAsync(array{CalculatorName?: string, ...} $args = [])
 * @method \Aws\Result deleteTracker(array $args = [])
 * @phpstan-method \Aws\Result deleteTracker(array{TrackerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrackerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrackerAsync(array{TrackerName?: string, ...} $args = [])
 * @method \Aws\Result describeGeofenceCollection(array $args = [])
 * @phpstan-method \Aws\Result describeGeofenceCollection(array{CollectionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGeofenceCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGeofenceCollectionAsync(array{CollectionName?: string, ...} $args = [])
 * @method \Aws\Result describeKey(array $args = [])
 * @phpstan-method \Aws\Result describeKey(array{KeyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeKeyAsync(array{KeyName?: string, ...} $args = [])
 * @method \Aws\Result describeMap(array $args = [])
 * @phpstan-method \Aws\Result describeMap(array{MapName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMapAsync(array{MapName?: string, ...} $args = [])
 * @method \Aws\Result describePlaceIndex(array $args = [])
 * @phpstan-method \Aws\Result describePlaceIndex(array{IndexName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePlaceIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePlaceIndexAsync(array{IndexName?: string, ...} $args = [])
 * @method \Aws\Result describeRouteCalculator(array $args = [])
 * @phpstan-method \Aws\Result describeRouteCalculator(array{CalculatorName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRouteCalculatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRouteCalculatorAsync(array{CalculatorName?: string, ...} $args = [])
 * @method \Aws\Result describeTracker(array $args = [])
 * @phpstan-method \Aws\Result describeTracker(array{TrackerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrackerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrackerAsync(array{TrackerName?: string, ...} $args = [])
 * @method \Aws\Result disassociateTrackerConsumer(array $args = [])
 * @phpstan-method \Aws\Result disassociateTrackerConsumer(array{TrackerName?: string, ConsumerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateTrackerConsumerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateTrackerConsumerAsync(array{TrackerName?: string, ConsumerArn?: string, ...} $args = [])
 * @method \Aws\Result forecastGeofenceEvents(array $args = [])
 * @phpstan-method \Aws\Result forecastGeofenceEvents(array{
 *     CollectionName?: string,
 *     DeviceState?: array{Position?: list<float>, Speed?: float, ...},
 *     TimeHorizonMinutes?: float,
 *     DistanceUnit?: 'Kilometers'|'Miles',
 *     SpeedUnit?: 'KilometersPerHour'|'MilesPerHour',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise forecastGeofenceEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise forecastGeofenceEventsAsync(array{
 *     CollectionName?: string,
 *     DeviceState?: array{Position?: list<float>, Speed?: float, ...},
 *     TimeHorizonMinutes?: float,
 *     DistanceUnit?: 'Kilometers'|'Miles',
 *     SpeedUnit?: 'KilometersPerHour'|'MilesPerHour',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDevicePosition(array $args = [])
 * @phpstan-method \Aws\Result getDevicePosition(array{TrackerName?: string, DeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevicePositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDevicePositionAsync(array{TrackerName?: string, DeviceId?: string, ...} $args = [])
 * @method \Aws\Result getDevicePositionHistory(array $args = [])
 * @phpstan-method \Aws\Result getDevicePositionHistory(array{
 *     TrackerName?: string,
 *     DeviceId?: string,
 *     NextToken?: string,
 *     StartTimeInclusive?: int|string|\DateTimeInterface,
 *     EndTimeExclusive?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevicePositionHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDevicePositionHistoryAsync(array{
 *     TrackerName?: string,
 *     DeviceId?: string,
 *     NextToken?: string,
 *     StartTimeInclusive?: int|string|\DateTimeInterface,
 *     EndTimeExclusive?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getGeofence(array $args = [])
 * @phpstan-method \Aws\Result getGeofence(array{CollectionName?: string, GeofenceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGeofenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGeofenceAsync(array{CollectionName?: string, GeofenceId?: string, ...} $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @phpstan-method \Aws\Result getJob(array{JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobAsync(array{JobId?: string, ...} $args = [])
 * @method \Aws\Result getMapGlyphs(array $args = [])
 * @phpstan-method \Aws\Result getMapGlyphs(array{MapName?: string, FontStack?: string, FontUnicodeRange?: string, Key?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMapGlyphsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMapGlyphsAsync(array{MapName?: string, FontStack?: string, FontUnicodeRange?: string, Key?: string, ...} $args = [])
 * @method \Aws\Result getMapSprites(array $args = [])
 * @phpstan-method \Aws\Result getMapSprites(array{MapName?: string, FileName?: string, Key?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMapSpritesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMapSpritesAsync(array{MapName?: string, FileName?: string, Key?: string, ...} $args = [])
 * @method \Aws\Result getMapStyleDescriptor(array $args = [])
 * @phpstan-method \Aws\Result getMapStyleDescriptor(array{MapName?: string, Key?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMapStyleDescriptorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMapStyleDescriptorAsync(array{MapName?: string, Key?: string, ...} $args = [])
 * @method \Aws\Result getMapTile(array $args = [])
 * @phpstan-method \Aws\Result getMapTile(array{MapName?: string, Z?: string, X?: string, Y?: string, Key?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMapTileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMapTileAsync(array{MapName?: string, Z?: string, X?: string, Y?: string, Key?: string, ...} $args = [])
 * @method \Aws\Result getPlace(array $args = [])
 * @phpstan-method \Aws\Result getPlace(array{IndexName?: string, PlaceId?: string, Language?: string, Key?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlaceAsync(array{IndexName?: string, PlaceId?: string, Language?: string, Key?: string, ...} $args = [])
 * @method \Aws\Result listDevicePositions(array $args = [])
 * @phpstan-method \Aws\Result listDevicePositions(array{
 *     TrackerName?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     FilterGeometry?: array{Polygon?: list<list<list<float>>>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevicePositionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevicePositionsAsync(array{
 *     TrackerName?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     FilterGeometry?: array{Polygon?: list<list<list<float>>>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGeofenceCollections(array $args = [])
 * @phpstan-method \Aws\Result listGeofenceCollections(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGeofenceCollectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGeofenceCollectionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGeofences(array $args = [])
 * @phpstan-method \Aws\Result listGeofences(array{CollectionName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGeofencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGeofencesAsync(array{CollectionName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{
 *     Filter?: array{JobStatus?: 'Cancelled'|'Cancelling'|'Completed'|'Failed'|'Pending'|'Running', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{
 *     Filter?: array{JobStatus?: 'Cancelled'|'Cancelling'|'Completed'|'Failed'|'Pending'|'Running', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listKeys(array $args = [])
 * @phpstan-method \Aws\Result listKeys(array{MaxResults?: int, NextToken?: string, Filter?: array{KeyStatus?: 'Active'|'Expired', ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKeysAsync(array{MaxResults?: int, NextToken?: string, Filter?: array{KeyStatus?: 'Active'|'Expired', ...}, ...} $args = [])
 * @method \Aws\Result listMaps(array $args = [])
 * @phpstan-method \Aws\Result listMaps(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMapsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMapsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPlaceIndexes(array $args = [])
 * @phpstan-method \Aws\Result listPlaceIndexes(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPlaceIndexesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPlaceIndexesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRouteCalculators(array $args = [])
 * @phpstan-method \Aws\Result listRouteCalculators(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRouteCalculatorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRouteCalculatorsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTrackerConsumers(array $args = [])
 * @phpstan-method \Aws\Result listTrackerConsumers(array{TrackerName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrackerConsumersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrackerConsumersAsync(array{TrackerName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTrackers(array $args = [])
 * @phpstan-method \Aws\Result listTrackers(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrackersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrackersAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result putGeofence(array $args = [])
 * @phpstan-method \Aws\Result putGeofence(array{
 *     CollectionName?: string,
 *     GeofenceId?: string,
 *     Geometry?: array{
 *         Polygon?: list<list<list<float>>>,
 *         Circle?: array{Center?: list<float>, Radius?: float, ...},
 *         Geobuf?: string|resource|\Psr\Http\Message\StreamInterface,
 *         MultiPolygon?: list<list<list<list<float>>>>,
 *         ...,
 *     },
 *     GeofenceProperties?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putGeofenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putGeofenceAsync(array{
 *     CollectionName?: string,
 *     GeofenceId?: string,
 *     Geometry?: array{
 *         Polygon?: list<list<list<float>>>,
 *         Circle?: array{Center?: list<float>, Radius?: float, ...},
 *         Geobuf?: string|resource|\Psr\Http\Message\StreamInterface,
 *         MultiPolygon?: list<list<list<list<float>>>>,
 *         ...,
 *     },
 *     GeofenceProperties?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchPlaceIndexForPosition(array $args = [])
 * @phpstan-method \Aws\Result searchPlaceIndexForPosition(array{IndexName?: string, Position?: list<float>, MaxResults?: int, Language?: string, Key?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise searchPlaceIndexForPositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchPlaceIndexForPositionAsync(array{IndexName?: string, Position?: list<float>, MaxResults?: int, Language?: string, Key?: string, ...} $args = [])
 * @method \Aws\Result searchPlaceIndexForSuggestions(array $args = [])
 * @phpstan-method \Aws\Result searchPlaceIndexForSuggestions(array{
 *     IndexName?: string,
 *     Text?: string,
 *     BiasPosition?: list<float>,
 *     FilterBBox?: list<float>,
 *     FilterCountries?: list<string>,
 *     MaxResults?: int,
 *     Language?: string,
 *     FilterCategories?: list<string>,
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchPlaceIndexForSuggestionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchPlaceIndexForSuggestionsAsync(array{
 *     IndexName?: string,
 *     Text?: string,
 *     BiasPosition?: list<float>,
 *     FilterBBox?: list<float>,
 *     FilterCountries?: list<string>,
 *     MaxResults?: int,
 *     Language?: string,
 *     FilterCategories?: list<string>,
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchPlaceIndexForText(array $args = [])
 * @phpstan-method \Aws\Result searchPlaceIndexForText(array{
 *     IndexName?: string,
 *     Text?: string,
 *     BiasPosition?: list<float>,
 *     FilterBBox?: list<float>,
 *     FilterCountries?: list<string>,
 *     MaxResults?: int,
 *     Language?: string,
 *     FilterCategories?: list<string>,
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchPlaceIndexForTextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchPlaceIndexForTextAsync(array{
 *     IndexName?: string,
 *     Text?: string,
 *     BiasPosition?: list<float>,
 *     FilterBBox?: list<float>,
 *     FilterCountries?: list<string>,
 *     MaxResults?: int,
 *     Language?: string,
 *     FilterCategories?: list<string>,
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startJob(array $args = [])
 * @phpstan-method \Aws\Result startJob(array{
 *     ClientToken?: string,
 *     Action?: 'ValidateAddress',
 *     ActionOptions?: array{ValidateAddress?: array{AdditionalFeatures?: list<'CountrySpecificAttributes'|'Position'>, ...}, ...},
 *     ExecutionRoleArn?: string,
 *     InputOptions?: array{Location?: string, Format?: 'Parquet', ...},
 *     Name?: string,
 *     OutputOptions?: array{Format?: 'Parquet', Location?: string, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startJobAsync(array{
 *     ClientToken?: string,
 *     Action?: 'ValidateAddress',
 *     ActionOptions?: array{ValidateAddress?: array{AdditionalFeatures?: list<'CountrySpecificAttributes'|'Position'>, ...}, ...},
 *     ExecutionRoleArn?: string,
 *     InputOptions?: array{Location?: string, Format?: 'Parquet', ...},
 *     Name?: string,
 *     OutputOptions?: array{Format?: 'Parquet', Location?: string, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateGeofenceCollection(array $args = [])
 * @phpstan-method \Aws\Result updateGeofenceCollection(array{
 *     CollectionName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     PricingPlanDataSource?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGeofenceCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGeofenceCollectionAsync(array{
 *     CollectionName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     PricingPlanDataSource?: string,
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKey(array $args = [])
 * @phpstan-method \Aws\Result updateKey(array{
 *     KeyName?: string,
 *     Description?: string,
 *     ExpireTime?: int|string|\DateTimeInterface,
 *     NoExpiry?: bool,
 *     ForceUpdate?: bool,
 *     Restrictions?: array{
 *         AllowActions?: list<string>,
 *         AllowResources?: list<string>,
 *         AllowReferers?: list<string>,
 *         AllowAndroidApps?: list<array>,
 *         AllowAppleApps?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKeyAsync(array{
 *     KeyName?: string,
 *     Description?: string,
 *     ExpireTime?: int|string|\DateTimeInterface,
 *     NoExpiry?: bool,
 *     ForceUpdate?: bool,
 *     Restrictions?: array{
 *         AllowActions?: list<string>,
 *         AllowResources?: list<string>,
 *         AllowReferers?: list<string>,
 *         AllowAndroidApps?: list<array>,
 *         AllowAppleApps?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMap(array $args = [])
 * @phpstan-method \Aws\Result updateMap(array{
 *     MapName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     ConfigurationUpdate?: array{PoliticalView?: string, CustomLayers?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMapAsync(array{
 *     MapName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     ConfigurationUpdate?: array{PoliticalView?: string, CustomLayers?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePlaceIndex(array $args = [])
 * @phpstan-method \Aws\Result updatePlaceIndex(array{
 *     IndexName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     DataSourceConfiguration?: array{IntendedUse?: 'SingleUse'|'Storage', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePlaceIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePlaceIndexAsync(array{
 *     IndexName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     DataSourceConfiguration?: array{IntendedUse?: 'SingleUse'|'Storage', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRouteCalculator(array $args = [])
 * @phpstan-method \Aws\Result updateRouteCalculator(array{
 *     CalculatorName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRouteCalculatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRouteCalculatorAsync(array{
 *     CalculatorName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTracker(array $args = [])
 * @phpstan-method \Aws\Result updateTracker(array{
 *     TrackerName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     PricingPlanDataSource?: string,
 *     Description?: string,
 *     PositionFiltering?: 'AccuracyBased'|'DistanceBased'|'TimeBased',
 *     EventBridgeEnabled?: bool,
 *     KmsKeyEnableGeospatialQueries?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrackerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrackerAsync(array{
 *     TrackerName?: string,
 *     PricingPlan?: 'MobileAssetManagement'|'MobileAssetTracking'|'RequestBasedUsage',
 *     PricingPlanDataSource?: string,
 *     Description?: string,
 *     PositionFiltering?: 'AccuracyBased'|'DistanceBased'|'TimeBased',
 *     EventBridgeEnabled?: bool,
 *     KmsKeyEnableGeospatialQueries?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyDevicePosition(array $args = [])
 * @phpstan-method \Aws\Result verifyDevicePosition(array{
 *     TrackerName?: string,
 *     DeviceState?: array{
 *         DeviceId?: string,
 *         SampleTime?: int|string|\DateTimeInterface,
 *         Position?: list<float>,
 *         Accuracy?: array{Horizontal?: float, ...},
 *         Ipv4Address?: string,
 *         WiFiAccessPoints?: list<array>,
 *         CellSignals?: array{LteCellDetails?: list<array>, ...},
 *         ...,
 *     },
 *     DistanceUnit?: 'Kilometers'|'Miles',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyDevicePositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyDevicePositionAsync(array{
 *     TrackerName?: string,
 *     DeviceState?: array{
 *         DeviceId?: string,
 *         SampleTime?: int|string|\DateTimeInterface,
 *         Position?: list<float>,
 *         Accuracy?: array{Horizontal?: float, ...},
 *         Ipv4Address?: string,
 *         WiFiAccessPoints?: list<array>,
 *         CellSignals?: array{LteCellDetails?: list<array>, ...},
 *         ...,
 *     },
 *     DistanceUnit?: 'Kilometers'|'Miles',
 *     ...,
 * } $args = [])
 */
class LocationServiceClient extends AwsClient {}
