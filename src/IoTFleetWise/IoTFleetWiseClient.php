<?php
namespace Aws\IoTFleetWise;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT FleetWise** service.
 * @method \Aws\Result associateVehicleFleet(array $args = [])
 * @phpstan-method \Aws\Result associateVehicleFleet(array{vehicleName?: string, fleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateVehicleFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateVehicleFleetAsync(array{vehicleName?: string, fleetId?: string, ...} $args = [])
 * @method \Aws\Result batchCreateVehicle(array $args = [])
 * @phpstan-method \Aws\Result batchCreateVehicle(array{
 *     vehicles?: list<array{
 *         vehicleName?: string,
 *         modelManifestArn?: string,
 *         decoderManifestArn?: string,
 *         attributes?: array<string, string>,
 *         associationBehavior?: 'CreateIotThing'|'ValidateIotThingExists',
 *         tags?: list<array>,
 *         stateTemplates?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateVehicleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateVehicleAsync(array{
 *     vehicles?: list<array{
 *         vehicleName?: string,
 *         modelManifestArn?: string,
 *         decoderManifestArn?: string,
 *         attributes?: array<string, string>,
 *         associationBehavior?: 'CreateIotThing'|'ValidateIotThingExists',
 *         tags?: list<array>,
 *         stateTemplates?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateVehicle(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateVehicle(array{
 *     vehicles?: list<array{
 *         vehicleName?: string,
 *         modelManifestArn?: string,
 *         decoderManifestArn?: string,
 *         attributes?: array<string, string>,
 *         attributeUpdateMode?: 'Merge'|'Overwrite',
 *         stateTemplatesToAdd?: list<array>,
 *         stateTemplatesToRemove?: list<string>,
 *         stateTemplatesToUpdate?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateVehicleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateVehicleAsync(array{
 *     vehicles?: list<array{
 *         vehicleName?: string,
 *         modelManifestArn?: string,
 *         decoderManifestArn?: string,
 *         attributes?: array<string, string>,
 *         attributeUpdateMode?: 'Merge'|'Overwrite',
 *         stateTemplatesToAdd?: list<array>,
 *         stateTemplatesToRemove?: list<string>,
 *         stateTemplatesToUpdate?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCampaign(array $args = [])
 * @phpstan-method \Aws\Result createCampaign(array{
 *     name?: string,
 *     description?: string,
 *     signalCatalogArn?: string,
 *     targetArn?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     expiryTime?: int|string|\DateTimeInterface,
 *     postTriggerCollectionDuration?: int,
 *     diagnosticsMode?: 'OFF'|'SEND_ACTIVE_DTCS',
 *     spoolingMode?: 'OFF'|'TO_DISK',
 *     compression?: 'OFF'|'SNAPPY',
 *     priority?: int,
 *     signalsToCollect?: list<array{name?: string, maxSampleCount?: int, minimumSamplingIntervalMs?: int, dataPartitionId?: string, ...}>,
 *     collectionScheme?: array{
 *         timeBasedCollectionScheme?: array{periodMs?: int, ...},
 *         conditionBasedCollectionScheme?: array{
 *             expression?: string,
 *             minimumTriggerIntervalMs?: int,
 *             triggerMode?: 'ALWAYS'|'RISING_EDGE',
 *             conditionLanguageVersion?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     dataExtraDimensions?: list<string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     dataDestinationConfigs?: list<array{s3Config?: array, timestreamConfig?: array, mqttTopicConfig?: array, ...}>,
 *     dataPartitions?: list<array{id?: string, storageOptions?: array, uploadOptions?: array, ...}>,
 *     signalsToFetch?: list<array{
 *         fullyQualifiedName?: string,
 *         signalFetchConfig?: array,
 *         conditionLanguageVersion?: int,
 *         actions?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCampaignAsync(array{
 *     name?: string,
 *     description?: string,
 *     signalCatalogArn?: string,
 *     targetArn?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     expiryTime?: int|string|\DateTimeInterface,
 *     postTriggerCollectionDuration?: int,
 *     diagnosticsMode?: 'OFF'|'SEND_ACTIVE_DTCS',
 *     spoolingMode?: 'OFF'|'TO_DISK',
 *     compression?: 'OFF'|'SNAPPY',
 *     priority?: int,
 *     signalsToCollect?: list<array{name?: string, maxSampleCount?: int, minimumSamplingIntervalMs?: int, dataPartitionId?: string, ...}>,
 *     collectionScheme?: array{
 *         timeBasedCollectionScheme?: array{periodMs?: int, ...},
 *         conditionBasedCollectionScheme?: array{
 *             expression?: string,
 *             minimumTriggerIntervalMs?: int,
 *             triggerMode?: 'ALWAYS'|'RISING_EDGE',
 *             conditionLanguageVersion?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     dataExtraDimensions?: list<string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     dataDestinationConfigs?: list<array{s3Config?: array, timestreamConfig?: array, mqttTopicConfig?: array, ...}>,
 *     dataPartitions?: list<array{id?: string, storageOptions?: array, uploadOptions?: array, ...}>,
 *     signalsToFetch?: list<array{
 *         fullyQualifiedName?: string,
 *         signalFetchConfig?: array,
 *         conditionLanguageVersion?: int,
 *         actions?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDecoderManifest(array $args = [])
 * @phpstan-method \Aws\Result createDecoderManifest(array{
 *     name?: string,
 *     description?: string,
 *     modelManifestArn?: string,
 *     signalDecoders?: list<array{
 *         fullyQualifiedName?: string,
 *         type?: 'CAN_SIGNAL'|'CUSTOM_DECODING_SIGNAL'|'MESSAGE_SIGNAL'|'OBD_SIGNAL',
 *         interfaceId?: string,
 *         canSignal?: array,
 *         obdSignal?: array,
 *         messageSignal?: array,
 *         customDecodingSignal?: array,
 *         ...,
 *     }>,
 *     networkInterfaces?: list<array{
 *         interfaceId?: string,
 *         type?: 'CAN_INTERFACE'|'CUSTOM_DECODING_INTERFACE'|'OBD_INTERFACE'|'VEHICLE_MIDDLEWARE',
 *         canInterface?: array,
 *         obdInterface?: array,
 *         vehicleMiddleware?: array,
 *         customDecodingInterface?: array,
 *         ...,
 *     }>,
 *     defaultForUnmappedSignals?: 'CUSTOM_DECODING',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDecoderManifestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDecoderManifestAsync(array{
 *     name?: string,
 *     description?: string,
 *     modelManifestArn?: string,
 *     signalDecoders?: list<array{
 *         fullyQualifiedName?: string,
 *         type?: 'CAN_SIGNAL'|'CUSTOM_DECODING_SIGNAL'|'MESSAGE_SIGNAL'|'OBD_SIGNAL',
 *         interfaceId?: string,
 *         canSignal?: array,
 *         obdSignal?: array,
 *         messageSignal?: array,
 *         customDecodingSignal?: array,
 *         ...,
 *     }>,
 *     networkInterfaces?: list<array{
 *         interfaceId?: string,
 *         type?: 'CAN_INTERFACE'|'CUSTOM_DECODING_INTERFACE'|'OBD_INTERFACE'|'VEHICLE_MIDDLEWARE',
 *         canInterface?: array,
 *         obdInterface?: array,
 *         vehicleMiddleware?: array,
 *         customDecodingInterface?: array,
 *         ...,
 *     }>,
 *     defaultForUnmappedSignals?: 'CUSTOM_DECODING',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFleet(array $args = [])
 * @phpstan-method \Aws\Result createFleet(array{
 *     fleetId?: string,
 *     description?: string,
 *     signalCatalogArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFleetAsync(array{
 *     fleetId?: string,
 *     description?: string,
 *     signalCatalogArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelManifest(array $args = [])
 * @phpstan-method \Aws\Result createModelManifest(array{
 *     name?: string,
 *     description?: string,
 *     nodes?: list<string>,
 *     signalCatalogArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelManifestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelManifestAsync(array{
 *     name?: string,
 *     description?: string,
 *     nodes?: list<string>,
 *     signalCatalogArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSignalCatalog(array $args = [])
 * @phpstan-method \Aws\Result createSignalCatalog(array{
 *     name?: string,
 *     description?: string,
 *     nodes?: list<array{
 *         branch?: array,
 *         sensor?: array,
 *         actuator?: array,
 *         attribute?: array,
 *         struct?: array,
 *         property?: array,
 *         ...,
 *     }>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSignalCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSignalCatalogAsync(array{
 *     name?: string,
 *     description?: string,
 *     nodes?: list<array{
 *         branch?: array,
 *         sensor?: array,
 *         actuator?: array,
 *         attribute?: array,
 *         struct?: array,
 *         property?: array,
 *         ...,
 *     }>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStateTemplate(array $args = [])
 * @phpstan-method \Aws\Result createStateTemplate(array{
 *     name?: string,
 *     description?: string,
 *     signalCatalogArn?: string,
 *     stateTemplateProperties?: list<string>,
 *     dataExtraDimensions?: list<string>,
 *     metadataExtraDimensions?: list<string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStateTemplateAsync(array{
 *     name?: string,
 *     description?: string,
 *     signalCatalogArn?: string,
 *     stateTemplateProperties?: list<string>,
 *     dataExtraDimensions?: list<string>,
 *     metadataExtraDimensions?: list<string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVehicle(array $args = [])
 * @phpstan-method \Aws\Result createVehicle(array{
 *     vehicleName?: string,
 *     modelManifestArn?: string,
 *     decoderManifestArn?: string,
 *     attributes?: array<string, string>,
 *     associationBehavior?: 'CreateIotThing'|'ValidateIotThingExists',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     stateTemplates?: list<array{identifier?: string, stateTemplateUpdateStrategy?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVehicleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVehicleAsync(array{
 *     vehicleName?: string,
 *     modelManifestArn?: string,
 *     decoderManifestArn?: string,
 *     attributes?: array<string, string>,
 *     associationBehavior?: 'CreateIotThing'|'ValidateIotThingExists',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     stateTemplates?: list<array{identifier?: string, stateTemplateUpdateStrategy?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCampaign(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaign(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteDecoderManifest(array $args = [])
 * @phpstan-method \Aws\Result deleteDecoderManifest(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDecoderManifestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDecoderManifestAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteFleet(array $args = [])
 * @phpstan-method \Aws\Result deleteFleet(array{fleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFleetAsync(array{fleetId?: string, ...} $args = [])
 * @method \Aws\Result deleteModelManifest(array $args = [])
 * @phpstan-method \Aws\Result deleteModelManifest(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelManifestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelManifestAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteSignalCatalog(array $args = [])
 * @phpstan-method \Aws\Result deleteSignalCatalog(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSignalCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSignalCatalogAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteStateTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteStateTemplate(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStateTemplateAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteVehicle(array $args = [])
 * @phpstan-method \Aws\Result deleteVehicle(array{vehicleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVehicleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVehicleAsync(array{vehicleName?: string, ...} $args = [])
 * @method \Aws\Result disassociateVehicleFleet(array $args = [])
 * @phpstan-method \Aws\Result disassociateVehicleFleet(array{vehicleName?: string, fleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateVehicleFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateVehicleFleetAsync(array{vehicleName?: string, fleetId?: string, ...} $args = [])
 * @method \Aws\Result getCampaign(array $args = [])
 * @phpstan-method \Aws\Result getCampaign(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getDecoderManifest(array $args = [])
 * @phpstan-method \Aws\Result getDecoderManifest(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDecoderManifestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDecoderManifestAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getEncryptionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getEncryptionConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEncryptionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEncryptionConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getFleet(array $args = [])
 * @phpstan-method \Aws\Result getFleet(array{fleetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFleetAsync(array{fleetId?: string, ...} $args = [])
 * @method \Aws\Result getLoggingOptions(array $args = [])
 * @phpstan-method \Aws\Result getLoggingOptions(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoggingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoggingOptionsAsync(array{...} $args = [])
 * @method \Aws\Result getModelManifest(array $args = [])
 * @phpstan-method \Aws\Result getModelManifest(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelManifestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelManifestAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getRegisterAccountStatus(array $args = [])
 * @phpstan-method \Aws\Result getRegisterAccountStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegisterAccountStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegisterAccountStatusAsync(array{...} $args = [])
 * @method \Aws\Result getSignalCatalog(array $args = [])
 * @phpstan-method \Aws\Result getSignalCatalog(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSignalCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSignalCatalogAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getStateTemplate(array $args = [])
 * @phpstan-method \Aws\Result getStateTemplate(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStateTemplateAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getVehicle(array $args = [])
 * @phpstan-method \Aws\Result getVehicle(array{vehicleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVehicleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVehicleAsync(array{vehicleName?: string, ...} $args = [])
 * @method \Aws\Result getVehicleStatus(array $args = [])
 * @phpstan-method \Aws\Result getVehicleStatus(array{nextToken?: string, maxResults?: int, vehicleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVehicleStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVehicleStatusAsync(array{nextToken?: string, maxResults?: int, vehicleName?: string, ...} $args = [])
 * @method \Aws\Result importDecoderManifest(array $args = [])
 * @phpstan-method \Aws\Result importDecoderManifest(array{name?: string, networkFileDefinitions?: list<array{canDbc?: array, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importDecoderManifestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importDecoderManifestAsync(array{name?: string, networkFileDefinitions?: list<array{canDbc?: array, ...}>, ...} $args = [])
 * @method \Aws\Result importSignalCatalog(array $args = [])
 * @phpstan-method \Aws\Result importSignalCatalog(array{
 *     name?: string,
 *     description?: string,
 *     vss?: array{vssJson?: string, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importSignalCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importSignalCatalogAsync(array{
 *     name?: string,
 *     description?: string,
 *     vss?: array{vssJson?: string, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCampaigns(array $args = [])
 * @phpstan-method \Aws\Result listCampaigns(array{nextToken?: string, maxResults?: int, status?: string, listResponseScope?: 'METADATA_ONLY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCampaignsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCampaignsAsync(array{nextToken?: string, maxResults?: int, status?: string, listResponseScope?: 'METADATA_ONLY', ...} $args = [])
 * @method \Aws\Result listDecoderManifestNetworkInterfaces(array $args = [])
 * @phpstan-method \Aws\Result listDecoderManifestNetworkInterfaces(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDecoderManifestNetworkInterfacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDecoderManifestNetworkInterfacesAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDecoderManifestSignals(array $args = [])
 * @phpstan-method \Aws\Result listDecoderManifestSignals(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDecoderManifestSignalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDecoderManifestSignalsAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDecoderManifests(array $args = [])
 * @phpstan-method \Aws\Result listDecoderManifests(array{
 *     modelManifestArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     listResponseScope?: 'METADATA_ONLY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDecoderManifestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDecoderManifestsAsync(array{
 *     modelManifestArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     listResponseScope?: 'METADATA_ONLY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFleets(array $args = [])
 * @phpstan-method \Aws\Result listFleets(array{nextToken?: string, maxResults?: int, listResponseScope?: 'METADATA_ONLY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFleetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFleetsAsync(array{nextToken?: string, maxResults?: int, listResponseScope?: 'METADATA_ONLY', ...} $args = [])
 * @method \Aws\Result listFleetsForVehicle(array $args = [])
 * @phpstan-method \Aws\Result listFleetsForVehicle(array{vehicleName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFleetsForVehicleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFleetsForVehicleAsync(array{vehicleName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listModelManifestNodes(array $args = [])
 * @phpstan-method \Aws\Result listModelManifestNodes(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelManifestNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelManifestNodesAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listModelManifests(array $args = [])
 * @phpstan-method \Aws\Result listModelManifests(array{
 *     signalCatalogArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     listResponseScope?: 'METADATA_ONLY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelManifestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelManifestsAsync(array{
 *     signalCatalogArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     listResponseScope?: 'METADATA_ONLY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSignalCatalogNodes(array $args = [])
 * @phpstan-method \Aws\Result listSignalCatalogNodes(array{
 *     name?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     signalNodeType?: 'ACTUATOR'|'ATTRIBUTE'|'BRANCH'|'CUSTOM_PROPERTY'|'CUSTOM_STRUCT'|'SENSOR',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSignalCatalogNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSignalCatalogNodesAsync(array{
 *     name?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     signalNodeType?: 'ACTUATOR'|'ATTRIBUTE'|'BRANCH'|'CUSTOM_PROPERTY'|'CUSTOM_STRUCT'|'SENSOR',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSignalCatalogs(array $args = [])
 * @phpstan-method \Aws\Result listSignalCatalogs(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSignalCatalogsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSignalCatalogsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listStateTemplates(array $args = [])
 * @phpstan-method \Aws\Result listStateTemplates(array{nextToken?: string, maxResults?: int, listResponseScope?: 'METADATA_ONLY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStateTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStateTemplatesAsync(array{nextToken?: string, maxResults?: int, listResponseScope?: 'METADATA_ONLY', ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result listVehicles(array $args = [])
 * @phpstan-method \Aws\Result listVehicles(array{
 *     modelManifestArn?: string,
 *     attributeNames?: list<string>,
 *     attributeValues?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     listResponseScope?: 'METADATA_ONLY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVehiclesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVehiclesAsync(array{
 *     modelManifestArn?: string,
 *     attributeNames?: list<string>,
 *     attributeValues?: list<string>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     listResponseScope?: 'METADATA_ONLY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listVehiclesInFleet(array $args = [])
 * @phpstan-method \Aws\Result listVehiclesInFleet(array{fleetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVehiclesInFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVehiclesInFleetAsync(array{fleetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putEncryptionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putEncryptionConfiguration(array{kmsKeyId?: string, encryptionType?: 'FLEETWISE_DEFAULT_ENCRYPTION'|'KMS_BASED_ENCRYPTION', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putEncryptionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEncryptionConfigurationAsync(array{kmsKeyId?: string, encryptionType?: 'FLEETWISE_DEFAULT_ENCRYPTION'|'KMS_BASED_ENCRYPTION', ...} $args = [])
 * @method \Aws\Result putLoggingOptions(array $args = [])
 * @phpstan-method \Aws\Result putLoggingOptions(array{cloudWatchLogDelivery?: array{logType?: 'ERROR'|'OFF', logGroupName?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putLoggingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLoggingOptionsAsync(array{cloudWatchLogDelivery?: array{logType?: 'ERROR'|'OFF', logGroupName?: string, ...}, ...} $args = [])
 * @method \Aws\Result registerAccount(array $args = [])
 * @phpstan-method \Aws\Result registerAccount(array{
 *     timestreamResources?: array{timestreamDatabaseName?: string, timestreamTableName?: string, ...},
 *     iamResources?: array{roleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerAccountAsync(array{
 *     timestreamResources?: array{timestreamDatabaseName?: string, timestreamTableName?: string, ...},
 *     iamResources?: array{roleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCampaign(array $args = [])
 * @phpstan-method \Aws\Result updateCampaign(array{
 *     name?: string,
 *     description?: string,
 *     dataExtraDimensions?: list<string>,
 *     action?: 'APPROVE'|'RESUME'|'SUSPEND'|'UPDATE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignAsync(array{
 *     name?: string,
 *     description?: string,
 *     dataExtraDimensions?: list<string>,
 *     action?: 'APPROVE'|'RESUME'|'SUSPEND'|'UPDATE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDecoderManifest(array $args = [])
 * @phpstan-method \Aws\Result updateDecoderManifest(array{
 *     name?: string,
 *     description?: string,
 *     signalDecodersToAdd?: list<array{
 *         fullyQualifiedName?: string,
 *         type?: 'CAN_SIGNAL'|'CUSTOM_DECODING_SIGNAL'|'MESSAGE_SIGNAL'|'OBD_SIGNAL',
 *         interfaceId?: string,
 *         canSignal?: array,
 *         obdSignal?: array,
 *         messageSignal?: array,
 *         customDecodingSignal?: array,
 *         ...,
 *     }>,
 *     signalDecodersToUpdate?: list<array{
 *         fullyQualifiedName?: string,
 *         type?: 'CAN_SIGNAL'|'CUSTOM_DECODING_SIGNAL'|'MESSAGE_SIGNAL'|'OBD_SIGNAL',
 *         interfaceId?: string,
 *         canSignal?: array,
 *         obdSignal?: array,
 *         messageSignal?: array,
 *         customDecodingSignal?: array,
 *         ...,
 *     }>,
 *     signalDecodersToRemove?: list<string>,
 *     networkInterfacesToAdd?: list<array{
 *         interfaceId?: string,
 *         type?: 'CAN_INTERFACE'|'CUSTOM_DECODING_INTERFACE'|'OBD_INTERFACE'|'VEHICLE_MIDDLEWARE',
 *         canInterface?: array,
 *         obdInterface?: array,
 *         vehicleMiddleware?: array,
 *         customDecodingInterface?: array,
 *         ...,
 *     }>,
 *     networkInterfacesToUpdate?: list<array{
 *         interfaceId?: string,
 *         type?: 'CAN_INTERFACE'|'CUSTOM_DECODING_INTERFACE'|'OBD_INTERFACE'|'VEHICLE_MIDDLEWARE',
 *         canInterface?: array,
 *         obdInterface?: array,
 *         vehicleMiddleware?: array,
 *         customDecodingInterface?: array,
 *         ...,
 *     }>,
 *     networkInterfacesToRemove?: list<string>,
 *     status?: 'ACTIVE'|'DRAFT'|'INVALID'|'VALIDATING',
 *     defaultForUnmappedSignals?: 'CUSTOM_DECODING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDecoderManifestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDecoderManifestAsync(array{
 *     name?: string,
 *     description?: string,
 *     signalDecodersToAdd?: list<array{
 *         fullyQualifiedName?: string,
 *         type?: 'CAN_SIGNAL'|'CUSTOM_DECODING_SIGNAL'|'MESSAGE_SIGNAL'|'OBD_SIGNAL',
 *         interfaceId?: string,
 *         canSignal?: array,
 *         obdSignal?: array,
 *         messageSignal?: array,
 *         customDecodingSignal?: array,
 *         ...,
 *     }>,
 *     signalDecodersToUpdate?: list<array{
 *         fullyQualifiedName?: string,
 *         type?: 'CAN_SIGNAL'|'CUSTOM_DECODING_SIGNAL'|'MESSAGE_SIGNAL'|'OBD_SIGNAL',
 *         interfaceId?: string,
 *         canSignal?: array,
 *         obdSignal?: array,
 *         messageSignal?: array,
 *         customDecodingSignal?: array,
 *         ...,
 *     }>,
 *     signalDecodersToRemove?: list<string>,
 *     networkInterfacesToAdd?: list<array{
 *         interfaceId?: string,
 *         type?: 'CAN_INTERFACE'|'CUSTOM_DECODING_INTERFACE'|'OBD_INTERFACE'|'VEHICLE_MIDDLEWARE',
 *         canInterface?: array,
 *         obdInterface?: array,
 *         vehicleMiddleware?: array,
 *         customDecodingInterface?: array,
 *         ...,
 *     }>,
 *     networkInterfacesToUpdate?: list<array{
 *         interfaceId?: string,
 *         type?: 'CAN_INTERFACE'|'CUSTOM_DECODING_INTERFACE'|'OBD_INTERFACE'|'VEHICLE_MIDDLEWARE',
 *         canInterface?: array,
 *         obdInterface?: array,
 *         vehicleMiddleware?: array,
 *         customDecodingInterface?: array,
 *         ...,
 *     }>,
 *     networkInterfacesToRemove?: list<string>,
 *     status?: 'ACTIVE'|'DRAFT'|'INVALID'|'VALIDATING',
 *     defaultForUnmappedSignals?: 'CUSTOM_DECODING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFleet(array $args = [])
 * @phpstan-method \Aws\Result updateFleet(array{fleetId?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFleetAsync(array{fleetId?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateModelManifest(array $args = [])
 * @phpstan-method \Aws\Result updateModelManifest(array{
 *     name?: string,
 *     description?: string,
 *     nodesToAdd?: list<string>,
 *     nodesToRemove?: list<string>,
 *     status?: 'ACTIVE'|'DRAFT'|'INVALID'|'VALIDATING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelManifestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateModelManifestAsync(array{
 *     name?: string,
 *     description?: string,
 *     nodesToAdd?: list<string>,
 *     nodesToRemove?: list<string>,
 *     status?: 'ACTIVE'|'DRAFT'|'INVALID'|'VALIDATING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSignalCatalog(array $args = [])
 * @phpstan-method \Aws\Result updateSignalCatalog(array{
 *     name?: string,
 *     description?: string,
 *     nodesToAdd?: list<array{
 *         branch?: array,
 *         sensor?: array,
 *         actuator?: array,
 *         attribute?: array,
 *         struct?: array,
 *         property?: array,
 *         ...,
 *     }>,
 *     nodesToUpdate?: list<array{
 *         branch?: array,
 *         sensor?: array,
 *         actuator?: array,
 *         attribute?: array,
 *         struct?: array,
 *         property?: array,
 *         ...,
 *     }>,
 *     nodesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSignalCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSignalCatalogAsync(array{
 *     name?: string,
 *     description?: string,
 *     nodesToAdd?: list<array{
 *         branch?: array,
 *         sensor?: array,
 *         actuator?: array,
 *         attribute?: array,
 *         struct?: array,
 *         property?: array,
 *         ...,
 *     }>,
 *     nodesToUpdate?: list<array{
 *         branch?: array,
 *         sensor?: array,
 *         actuator?: array,
 *         attribute?: array,
 *         struct?: array,
 *         property?: array,
 *         ...,
 *     }>,
 *     nodesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStateTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateStateTemplate(array{
 *     identifier?: string,
 *     description?: string,
 *     stateTemplatePropertiesToAdd?: list<string>,
 *     stateTemplatePropertiesToRemove?: list<string>,
 *     dataExtraDimensions?: list<string>,
 *     metadataExtraDimensions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStateTemplateAsync(array{
 *     identifier?: string,
 *     description?: string,
 *     stateTemplatePropertiesToAdd?: list<string>,
 *     stateTemplatePropertiesToRemove?: list<string>,
 *     dataExtraDimensions?: list<string>,
 *     metadataExtraDimensions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVehicle(array $args = [])
 * @phpstan-method \Aws\Result updateVehicle(array{
 *     vehicleName?: string,
 *     modelManifestArn?: string,
 *     decoderManifestArn?: string,
 *     attributes?: array<string, string>,
 *     attributeUpdateMode?: 'Merge'|'Overwrite',
 *     stateTemplatesToAdd?: list<array{identifier?: string, stateTemplateUpdateStrategy?: array, ...}>,
 *     stateTemplatesToRemove?: list<string>,
 *     stateTemplatesToUpdate?: list<array{identifier?: string, stateTemplateUpdateStrategy?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVehicleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVehicleAsync(array{
 *     vehicleName?: string,
 *     modelManifestArn?: string,
 *     decoderManifestArn?: string,
 *     attributes?: array<string, string>,
 *     attributeUpdateMode?: 'Merge'|'Overwrite',
 *     stateTemplatesToAdd?: list<array{identifier?: string, stateTemplateUpdateStrategy?: array, ...}>,
 *     stateTemplatesToRemove?: list<string>,
 *     stateTemplatesToUpdate?: list<array{identifier?: string, stateTemplateUpdateStrategy?: array, ...}>,
 *     ...,
 * } $args = [])
 */
class IoTFleetWiseClient extends AwsClient {}
