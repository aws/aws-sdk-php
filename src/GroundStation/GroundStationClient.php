<?php
namespace Aws\GroundStation;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Ground Station** service.
 * @method \Aws\Result cancelContact(array $args = [])
 * @phpstan-method \Aws\Result cancelContact(array{contactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelContactAsync(array{contactId?: string, ...} $args = [])
 * @method \Aws\Result createConfig(array $args = [])
 * @phpstan-method \Aws\Result createConfig(array{
 *     name?: string,
 *     configData?: array{
 *         antennaDownlinkConfig?: array{spectrumConfig?: array, ...},
 *         trackingConfig?: array{autotrack?: 'PREFERRED'|'REMOVED'|'REQUIRED', ...},
 *         dataflowEndpointConfig?: array{dataflowEndpointName?: string, dataflowEndpointRegion?: string, ...},
 *         antennaDownlinkDemodDecodeConfig?: array{spectrumConfig?: array, demodulationConfig?: array, decodeConfig?: array, ...},
 *         antennaUplinkConfig?: array{transmitDisabled?: bool, spectrumConfig?: array, targetEirp?: array, ...},
 *         uplinkEchoConfig?: array{enabled?: bool, antennaUplinkConfigArn?: string, ...},
 *         s3RecordingConfig?: array{bucketArn?: string, roleArn?: string, prefix?: string, ...},
 *         telemetrySinkConfig?: array{telemetrySinkType?: 'KINESIS_DATA_STREAM', telemetrySinkData?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigAsync(array{
 *     name?: string,
 *     configData?: array{
 *         antennaDownlinkConfig?: array{spectrumConfig?: array, ...},
 *         trackingConfig?: array{autotrack?: 'PREFERRED'|'REMOVED'|'REQUIRED', ...},
 *         dataflowEndpointConfig?: array{dataflowEndpointName?: string, dataflowEndpointRegion?: string, ...},
 *         antennaDownlinkDemodDecodeConfig?: array{spectrumConfig?: array, demodulationConfig?: array, decodeConfig?: array, ...},
 *         antennaUplinkConfig?: array{transmitDisabled?: bool, spectrumConfig?: array, targetEirp?: array, ...},
 *         uplinkEchoConfig?: array{enabled?: bool, antennaUplinkConfigArn?: string, ...},
 *         s3RecordingConfig?: array{bucketArn?: string, roleArn?: string, prefix?: string, ...},
 *         telemetrySinkConfig?: array{telemetrySinkType?: 'KINESIS_DATA_STREAM', telemetrySinkData?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataflowEndpointGroup(array $args = [])
 * @phpstan-method \Aws\Result createDataflowEndpointGroup(array{
 *     endpointDetails?: list<array{
 *         securityDetails?: array,
 *         endpoint?: array,
 *         awsGroundStationAgentEndpoint?: array,
 *         uplinkAwsGroundStationAgentEndpoint?: array,
 *         downlinkAwsGroundStationAgentEndpoint?: array,
 *         healthStatus?: 'HEALTHY'|'UNHEALTHY',
 *         healthReasons?: list<'DATAPLANE_FAILURE'|'HEALTHY'|'INITIALIZING_DATAPLANE'|'INVALID_IP_OWNERSHIP'|'NOT_AUTHORIZED_TO_CREATE_SLR'|'NO_REGISTERED_AGENT'|'UNVERIFIED_IP_OWNERSHIP'>,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     contactPrePassDurationSeconds?: int,
 *     contactPostPassDurationSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataflowEndpointGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataflowEndpointGroupAsync(array{
 *     endpointDetails?: list<array{
 *         securityDetails?: array,
 *         endpoint?: array,
 *         awsGroundStationAgentEndpoint?: array,
 *         uplinkAwsGroundStationAgentEndpoint?: array,
 *         downlinkAwsGroundStationAgentEndpoint?: array,
 *         healthStatus?: 'HEALTHY'|'UNHEALTHY',
 *         healthReasons?: list<'DATAPLANE_FAILURE'|'HEALTHY'|'INITIALIZING_DATAPLANE'|'INVALID_IP_OWNERSHIP'|'NOT_AUTHORIZED_TO_CREATE_SLR'|'NO_REGISTERED_AGENT'|'UNVERIFIED_IP_OWNERSHIP'>,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     contactPrePassDurationSeconds?: int,
 *     contactPostPassDurationSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataflowEndpointGroupV2(array $args = [])
 * @phpstan-method \Aws\Result createDataflowEndpointGroupV2(array{
 *     endpoints?: list<array{uplinkAwsGroundStationAgentEndpoint?: array, downlinkAwsGroundStationAgentEndpoint?: array, ...}>,
 *     contactPrePassDurationSeconds?: int,
 *     contactPostPassDurationSeconds?: int,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataflowEndpointGroupV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataflowEndpointGroupV2Async(array{
 *     endpoints?: list<array{uplinkAwsGroundStationAgentEndpoint?: array, downlinkAwsGroundStationAgentEndpoint?: array, ...}>,
 *     contactPrePassDurationSeconds?: int,
 *     contactPostPassDurationSeconds?: int,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEphemeris(array $args = [])
 * @phpstan-method \Aws\Result createEphemeris(array{
 *     satelliteId?: string,
 *     enabled?: bool,
 *     priority?: int,
 *     expirationTime?: int|string|\DateTimeInterface,
 *     name?: string,
 *     kmsKeyArn?: string,
 *     ephemeris?: array{
 *         tle?: array{s3Object?: array, tleData?: list<array>, ...},
 *         oem?: array{s3Object?: array, oemData?: string, ...},
 *         azEl?: array{groundStation?: string, data?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEphemerisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEphemerisAsync(array{
 *     satelliteId?: string,
 *     enabled?: bool,
 *     priority?: int,
 *     expirationTime?: int|string|\DateTimeInterface,
 *     name?: string,
 *     kmsKeyArn?: string,
 *     ephemeris?: array{
 *         tle?: array{s3Object?: array, tleData?: list<array>, ...},
 *         oem?: array{s3Object?: array, oemData?: string, ...},
 *         azEl?: array{groundStation?: string, data?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMissionProfile(array $args = [])
 * @phpstan-method \Aws\Result createMissionProfile(array{
 *     name?: string,
 *     contactPrePassDurationSeconds?: int,
 *     contactPostPassDurationSeconds?: int,
 *     minimumViableContactDurationSeconds?: int,
 *     dataflowEdges?: list<list<string>>,
 *     trackingConfigArn?: string,
 *     telemetrySinkConfigArn?: string,
 *     tags?: array<string, string>,
 *     streamsKmsKey?: array{kmsKeyArn?: string, kmsAliasArn?: string, kmsAliasName?: string, ...},
 *     streamsKmsRole?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMissionProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMissionProfileAsync(array{
 *     name?: string,
 *     contactPrePassDurationSeconds?: int,
 *     contactPostPassDurationSeconds?: int,
 *     minimumViableContactDurationSeconds?: int,
 *     dataflowEdges?: list<list<string>>,
 *     trackingConfigArn?: string,
 *     telemetrySinkConfigArn?: string,
 *     tags?: array<string, string>,
 *     streamsKmsKey?: array{kmsKeyArn?: string, kmsAliasArn?: string, kmsAliasName?: string, ...},
 *     streamsKmsRole?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteConfig(array{
 *     configId?: string,
 *     configType?: 'antenna-downlink'|'antenna-downlink-demod-decode'|'antenna-uplink'|'dataflow-endpoint'|'s3-recording'|'telemetry-sink'|'tracking'|'uplink-echo',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigAsync(array{
 *     configId?: string,
 *     configType?: 'antenna-downlink'|'antenna-downlink-demod-decode'|'antenna-uplink'|'dataflow-endpoint'|'s3-recording'|'telemetry-sink'|'tracking'|'uplink-echo',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDataflowEndpointGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteDataflowEndpointGroup(array{dataflowEndpointGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataflowEndpointGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataflowEndpointGroupAsync(array{dataflowEndpointGroupId?: string, ...} $args = [])
 * @method \Aws\Result deleteEphemeris(array $args = [])
 * @phpstan-method \Aws\Result deleteEphemeris(array{ephemerisId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEphemerisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEphemerisAsync(array{ephemerisId?: string, ...} $args = [])
 * @method \Aws\Result deleteMissionProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteMissionProfile(array{missionProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMissionProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMissionProfileAsync(array{missionProfileId?: string, ...} $args = [])
 * @method \Aws\Result describeContact(array $args = [])
 * @phpstan-method \Aws\Result describeContact(array{contactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContactAsync(array{contactId?: string, ...} $args = [])
 * @method \Aws\Result describeContactVersion(array $args = [])
 * @phpstan-method \Aws\Result describeContactVersion(array{contactId?: string, versionId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContactVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContactVersionAsync(array{contactId?: string, versionId?: int, ...} $args = [])
 * @method \Aws\Result describeEphemeris(array $args = [])
 * @phpstan-method \Aws\Result describeEphemeris(array{ephemerisId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEphemerisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEphemerisAsync(array{ephemerisId?: string, ...} $args = [])
 * @method \Aws\Result getAgentConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getAgentConfiguration(array{agentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentConfigurationAsync(array{agentId?: string, ...} $args = [])
 * @method \Aws\Result getAgentTaskResponseUrl(array $args = [])
 * @phpstan-method \Aws\Result getAgentTaskResponseUrl(array{agentId?: string, taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentTaskResponseUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentTaskResponseUrlAsync(array{agentId?: string, taskId?: string, ...} $args = [])
 * @method \Aws\Result getMissionProfileConfig(array $args = [])
 * @phpstan-method \Aws\Result getMissionProfileConfig(array{
 *     configId?: string,
 *     configType?: 'antenna-downlink'|'antenna-downlink-demod-decode'|'antenna-uplink'|'dataflow-endpoint'|'s3-recording'|'telemetry-sink'|'tracking'|'uplink-echo',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMissionProfileConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMissionProfileConfigAsync(array{
 *     configId?: string,
 *     configType?: 'antenna-downlink'|'antenna-downlink-demod-decode'|'antenna-uplink'|'dataflow-endpoint'|'s3-recording'|'telemetry-sink'|'tracking'|'uplink-echo',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDataflowEndpointGroup(array $args = [])
 * @phpstan-method \Aws\Result getDataflowEndpointGroup(array{dataflowEndpointGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataflowEndpointGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataflowEndpointGroupAsync(array{dataflowEndpointGroupId?: string, ...} $args = [])
 * @method \Aws\Result getMinuteUsage(array $args = [])
 * @phpstan-method \Aws\Result getMinuteUsage(array{month?: int, year?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMinuteUsageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMinuteUsageAsync(array{month?: int, year?: int, ...} $args = [])
 * @method \Aws\Result getMissionProfile(array $args = [])
 * @phpstan-method \Aws\Result getMissionProfile(array{missionProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMissionProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMissionProfileAsync(array{missionProfileId?: string, ...} $args = [])
 * @method \Aws\Result getSatellite(array $args = [])
 * @phpstan-method \Aws\Result getSatellite(array{satelliteId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSatelliteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSatelliteAsync(array{satelliteId?: string, ...} $args = [])
 * @method \Aws\Result listAntennas(array $args = [])
 * @phpstan-method \Aws\Result listAntennas(array{groundStationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAntennasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAntennasAsync(array{groundStationId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listConfigs(array $args = [])
 * @phpstan-method \Aws\Result listConfigs(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listContactVersions(array $args = [])
 * @phpstan-method \Aws\Result listContactVersions(array{contactId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactVersionsAsync(array{contactId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listContacts(array $args = [])
 * @phpstan-method \Aws\Result listContacts(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     statusList?: list<'AVAILABLE'|'AWS_CANCELLED'|'AWS_FAILED'|'CANCELLED'|'CANCELLING'|'COMPLETED'|'FAILED'|'FAILED_TO_SCHEDULE'|'PASS'|'POSTPASS'|'PREPASS'|'SCHEDULED'|'SCHEDULING'>,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     groundStation?: string,
 *     satelliteArn?: string,
 *     missionProfileArn?: string,
 *     ephemeris?: array{azEl?: array{id?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listContactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContactsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     statusList?: list<'AVAILABLE'|'AWS_CANCELLED'|'AWS_FAILED'|'CANCELLED'|'CANCELLING'|'COMPLETED'|'FAILED'|'FAILED_TO_SCHEDULE'|'PASS'|'POSTPASS'|'PREPASS'|'SCHEDULED'|'SCHEDULING'>,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     groundStation?: string,
 *     satelliteArn?: string,
 *     missionProfileArn?: string,
 *     ephemeris?: array{azEl?: array{id?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataflowEndpointGroups(array $args = [])
 * @phpstan-method \Aws\Result listDataflowEndpointGroups(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataflowEndpointGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataflowEndpointGroupsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listEphemerides(array $args = [])
 * @phpstan-method \Aws\Result listEphemerides(array{
 *     satelliteId?: string,
 *     ephemerisType?: 'AZ_EL'|'OEM'|'SERVICE_MANAGED'|'TLE',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     statusList?: list<'DISABLED'|'ENABLED'|'ERROR'|'EXPIRED'|'INVALID'|'VALIDATING'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEphemeridesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEphemeridesAsync(array{
 *     satelliteId?: string,
 *     ephemerisType?: 'AZ_EL'|'OEM'|'SERVICE_MANAGED'|'TLE',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     statusList?: list<'DISABLED'|'ENABLED'|'ERROR'|'EXPIRED'|'INVALID'|'VALIDATING'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroundStationReservations(array $args = [])
 * @phpstan-method \Aws\Result listGroundStationReservations(array{
 *     groundStationId?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     reservationTypes?: list<'CONTACT'|'MAINTENANCE'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroundStationReservationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroundStationReservationsAsync(array{
 *     groundStationId?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     reservationTypes?: list<'CONTACT'|'MAINTENANCE'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGroundStations(array $args = [])
 * @phpstan-method \Aws\Result listGroundStations(array{satelliteId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroundStationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGroundStationsAsync(array{satelliteId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listMissionProfiles(array $args = [])
 * @phpstan-method \Aws\Result listMissionProfiles(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMissionProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMissionProfilesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSatellites(array $args = [])
 * @phpstan-method \Aws\Result listSatellites(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSatellitesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSatellitesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result registerAgent(array $args = [])
 * @phpstan-method \Aws\Result registerAgent(array{
 *     discoveryData?: array{publicIpAddresses?: list<string>, privateIpAddresses?: list<string>, capabilityArns?: list<string>, ...},
 *     agentDetails?: array{
 *         agentVersion?: string,
 *         instanceId?: string,
 *         instanceType?: string,
 *         reservedCpuCores?: list<int>,
 *         agentCpuCores?: list<int>,
 *         componentVersions?: list<array>,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerAgentAsync(array{
 *     discoveryData?: array{publicIpAddresses?: list<string>, privateIpAddresses?: list<string>, capabilityArns?: list<string>, ...},
 *     agentDetails?: array{
 *         agentVersion?: string,
 *         instanceId?: string,
 *         instanceType?: string,
 *         reservedCpuCores?: list<int>,
 *         agentCpuCores?: list<int>,
 *         componentVersions?: list<array>,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result reserveContact(array $args = [])
 * @phpstan-method \Aws\Result reserveContact(array{
 *     missionProfileArn?: string,
 *     satelliteArn?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     groundStation?: string,
 *     tags?: array<string, string>,
 *     trackingOverrides?: array{programTrackSettings?: array{azEl?: array, oem?: array, tle?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise reserveContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise reserveContactAsync(array{
 *     missionProfileArn?: string,
 *     satelliteArn?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     groundStation?: string,
 *     tags?: array<string, string>,
 *     trackingOverrides?: array{programTrackSettings?: array{azEl?: array, oem?: array, tle?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAgentStatus(array $args = [])
 * @phpstan-method \Aws\Result updateAgentStatus(array{
 *     agentId?: string,
 *     taskId?: string,
 *     aggregateStatus?: array{status?: 'ACTIVE'|'FAILED'|'INACTIVE'|'SUCCESS', signatureMap?: array<string, bool>, ...},
 *     componentStatuses?: list<array{
 *         componentType?: string,
 *         capabilityArn?: string,
 *         status?: 'ACTIVE'|'FAILED'|'INACTIVE'|'SUCCESS',
 *         bytesSent?: int,
 *         bytesReceived?: int,
 *         packetsDropped?: int,
 *         dataflowId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentStatusAsync(array{
 *     agentId?: string,
 *     taskId?: string,
 *     aggregateStatus?: array{status?: 'ACTIVE'|'FAILED'|'INACTIVE'|'SUCCESS', signatureMap?: array<string, bool>, ...},
 *     componentStatuses?: list<array{
 *         componentType?: string,
 *         capabilityArn?: string,
 *         status?: 'ACTIVE'|'FAILED'|'INACTIVE'|'SUCCESS',
 *         bytesSent?: int,
 *         bytesReceived?: int,
 *         packetsDropped?: int,
 *         dataflowId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfig(array $args = [])
 * @phpstan-method \Aws\Result updateConfig(array{
 *     configId?: string,
 *     name?: string,
 *     configType?: 'antenna-downlink'|'antenna-downlink-demod-decode'|'antenna-uplink'|'dataflow-endpoint'|'s3-recording'|'telemetry-sink'|'tracking'|'uplink-echo',
 *     configData?: array{
 *         antennaDownlinkConfig?: array{spectrumConfig?: array, ...},
 *         trackingConfig?: array{autotrack?: 'PREFERRED'|'REMOVED'|'REQUIRED', ...},
 *         dataflowEndpointConfig?: array{dataflowEndpointName?: string, dataflowEndpointRegion?: string, ...},
 *         antennaDownlinkDemodDecodeConfig?: array{spectrumConfig?: array, demodulationConfig?: array, decodeConfig?: array, ...},
 *         antennaUplinkConfig?: array{transmitDisabled?: bool, spectrumConfig?: array, targetEirp?: array, ...},
 *         uplinkEchoConfig?: array{enabled?: bool, antennaUplinkConfigArn?: string, ...},
 *         s3RecordingConfig?: array{bucketArn?: string, roleArn?: string, prefix?: string, ...},
 *         telemetrySinkConfig?: array{telemetrySinkType?: 'KINESIS_DATA_STREAM', telemetrySinkData?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigAsync(array{
 *     configId?: string,
 *     name?: string,
 *     configType?: 'antenna-downlink'|'antenna-downlink-demod-decode'|'antenna-uplink'|'dataflow-endpoint'|'s3-recording'|'telemetry-sink'|'tracking'|'uplink-echo',
 *     configData?: array{
 *         antennaDownlinkConfig?: array{spectrumConfig?: array, ...},
 *         trackingConfig?: array{autotrack?: 'PREFERRED'|'REMOVED'|'REQUIRED', ...},
 *         dataflowEndpointConfig?: array{dataflowEndpointName?: string, dataflowEndpointRegion?: string, ...},
 *         antennaDownlinkDemodDecodeConfig?: array{spectrumConfig?: array, demodulationConfig?: array, decodeConfig?: array, ...},
 *         antennaUplinkConfig?: array{transmitDisabled?: bool, spectrumConfig?: array, targetEirp?: array, ...},
 *         uplinkEchoConfig?: array{enabled?: bool, antennaUplinkConfigArn?: string, ...},
 *         s3RecordingConfig?: array{bucketArn?: string, roleArn?: string, prefix?: string, ...},
 *         telemetrySinkConfig?: array{telemetrySinkType?: 'KINESIS_DATA_STREAM', telemetrySinkData?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContact(array $args = [])
 * @phpstan-method \Aws\Result updateContact(array{
 *     contactId?: string,
 *     clientToken?: string,
 *     trackingOverrides?: array{programTrackSettings?: array{azEl?: array, oem?: array, tle?: array, ...}, ...},
 *     satelliteArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContactAsync(array{
 *     contactId?: string,
 *     clientToken?: string,
 *     trackingOverrides?: array{programTrackSettings?: array{azEl?: array, oem?: array, tle?: array, ...}, ...},
 *     satelliteArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEphemeris(array $args = [])
 * @phpstan-method \Aws\Result updateEphemeris(array{ephemerisId?: string, enabled?: bool, name?: string, priority?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEphemerisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEphemerisAsync(array{ephemerisId?: string, enabled?: bool, name?: string, priority?: int, ...} $args = [])
 * @method \Aws\Result updateMissionProfile(array $args = [])
 * @phpstan-method \Aws\Result updateMissionProfile(array{
 *     missionProfileId?: string,
 *     name?: string,
 *     contactPrePassDurationSeconds?: int,
 *     contactPostPassDurationSeconds?: int,
 *     minimumViableContactDurationSeconds?: int,
 *     dataflowEdges?: list<list<string>>,
 *     trackingConfigArn?: string,
 *     telemetrySinkConfigArn?: string,
 *     streamsKmsKey?: array{kmsKeyArn?: string, kmsAliasArn?: string, kmsAliasName?: string, ...},
 *     streamsKmsRole?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMissionProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMissionProfileAsync(array{
 *     missionProfileId?: string,
 *     name?: string,
 *     contactPrePassDurationSeconds?: int,
 *     contactPostPassDurationSeconds?: int,
 *     minimumViableContactDurationSeconds?: int,
 *     dataflowEdges?: list<list<string>>,
 *     trackingConfigArn?: string,
 *     telemetrySinkConfigArn?: string,
 *     streamsKmsKey?: array{kmsKeyArn?: string, kmsAliasArn?: string, kmsAliasName?: string, ...},
 *     streamsKmsRole?: string,
 *     ...,
 * } $args = [])
 */
class GroundStationClient extends AwsClient {}
