<?php
namespace Aws\IoTWireless;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Wireless** service.
 * @method \Aws\Result associateAwsAccountWithPartnerAccount(array $args = [])
 * @phpstan-method \Aws\Result associateAwsAccountWithPartnerAccount(array{
 *     Sidewalk?: array{AmazonId?: string, AppServerPrivateKey?: string, ...},
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAwsAccountWithPartnerAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAwsAccountWithPartnerAccountAsync(array{
 *     Sidewalk?: array{AmazonId?: string, AppServerPrivateKey?: string, ...},
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateMulticastGroupWithFuotaTask(array $args = [])
 * @phpstan-method \Aws\Result associateMulticastGroupWithFuotaTask(array{Id?: string, MulticastGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateMulticastGroupWithFuotaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateMulticastGroupWithFuotaTaskAsync(array{Id?: string, MulticastGroupId?: string, ...} $args = [])
 * @method \Aws\Result associateWirelessDeviceWithFuotaTask(array $args = [])
 * @phpstan-method \Aws\Result associateWirelessDeviceWithFuotaTask(array{Id?: string, WirelessDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateWirelessDeviceWithFuotaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateWirelessDeviceWithFuotaTaskAsync(array{Id?: string, WirelessDeviceId?: string, ...} $args = [])
 * @method \Aws\Result associateWirelessDeviceWithMulticastGroup(array $args = [])
 * @phpstan-method \Aws\Result associateWirelessDeviceWithMulticastGroup(array{Id?: string, WirelessDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateWirelessDeviceWithMulticastGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateWirelessDeviceWithMulticastGroupAsync(array{Id?: string, WirelessDeviceId?: string, ...} $args = [])
 * @method \Aws\Result associateWirelessDeviceWithThing(array $args = [])
 * @phpstan-method \Aws\Result associateWirelessDeviceWithThing(array{Id?: string, ThingArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateWirelessDeviceWithThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateWirelessDeviceWithThingAsync(array{Id?: string, ThingArn?: string, ...} $args = [])
 * @method \Aws\Result associateWirelessGatewayWithCertificate(array $args = [])
 * @phpstan-method \Aws\Result associateWirelessGatewayWithCertificate(array{Id?: string, IotCertificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateWirelessGatewayWithCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateWirelessGatewayWithCertificateAsync(array{Id?: string, IotCertificateId?: string, ...} $args = [])
 * @method \Aws\Result associateWirelessGatewayWithThing(array $args = [])
 * @phpstan-method \Aws\Result associateWirelessGatewayWithThing(array{Id?: string, ThingArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateWirelessGatewayWithThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateWirelessGatewayWithThingAsync(array{Id?: string, ThingArn?: string, ...} $args = [])
 * @method \Aws\Result cancelMulticastGroupSession(array $args = [])
 * @phpstan-method \Aws\Result cancelMulticastGroupSession(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMulticastGroupSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMulticastGroupSessionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result createDestination(array $args = [])
 * @phpstan-method \Aws\Result createDestination(array{
 *     Name?: string,
 *     ExpressionType?: 'MqttTopic'|'RuleName',
 *     Expression?: string,
 *     Description?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDestinationAsync(array{
 *     Name?: string,
 *     ExpressionType?: 'MqttTopic'|'RuleName',
 *     Expression?: string,
 *     Description?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeviceProfile(array $args = [])
 * @phpstan-method \Aws\Result createDeviceProfile(array{
 *     Name?: string,
 *     LoRaWAN?: array{
 *         SupportsClassB?: bool,
 *         ClassBTimeout?: int,
 *         PingSlotPeriod?: int,
 *         PingSlotDr?: int,
 *         PingSlotFreq?: int,
 *         SupportsClassC?: bool,
 *         ClassCTimeout?: int,
 *         MacVersion?: string,
 *         RegParamsRevision?: string,
 *         RxDelay1?: int,
 *         RxDrOffset1?: int,
 *         RxDataRate2?: int,
 *         RxFreq2?: int,
 *         FactoryPresetFreqsList?: list<int>,
 *         MaxEirp?: int,
 *         MaxDutyCycle?: int,
 *         RfRegion?: string,
 *         SupportsJoin?: bool,
 *         Supports32BitFCnt?: bool,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     Sidewalk?: array,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeviceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeviceProfileAsync(array{
 *     Name?: string,
 *     LoRaWAN?: array{
 *         SupportsClassB?: bool,
 *         ClassBTimeout?: int,
 *         PingSlotPeriod?: int,
 *         PingSlotDr?: int,
 *         PingSlotFreq?: int,
 *         SupportsClassC?: bool,
 *         ClassCTimeout?: int,
 *         MacVersion?: string,
 *         RegParamsRevision?: string,
 *         RxDelay1?: int,
 *         RxDrOffset1?: int,
 *         RxDataRate2?: int,
 *         RxFreq2?: int,
 *         FactoryPresetFreqsList?: list<int>,
 *         MaxEirp?: int,
 *         MaxDutyCycle?: int,
 *         RfRegion?: string,
 *         SupportsJoin?: bool,
 *         Supports32BitFCnt?: bool,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     Sidewalk?: array,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFuotaTask(array $args = [])
 * @phpstan-method \Aws\Result createFuotaTask(array{
 *     Name?: string,
 *     Description?: string,
 *     ClientRequestToken?: string,
 *     LoRaWAN?: array{
 *         RfRegion?: 'AS923-1'|'AS923-2'|'AS923-3'|'AS923-4'|'AU915'|'CN470'|'CN779'|'EU433'|'EU868'|'IN865'|'KR920'|'RU864'|'US915',
 *         ...,
 *     },
 *     FirmwareUpdateImage?: string,
 *     FirmwareUpdateRole?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     RedundancyPercent?: int,
 *     FragmentSizeBytes?: int,
 *     FragmentIntervalMS?: int,
 *     Descriptor?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFuotaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFuotaTaskAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     ClientRequestToken?: string,
 *     LoRaWAN?: array{
 *         RfRegion?: 'AS923-1'|'AS923-2'|'AS923-3'|'AS923-4'|'AU915'|'CN470'|'CN779'|'EU433'|'EU868'|'IN865'|'KR920'|'RU864'|'US915',
 *         ...,
 *     },
 *     FirmwareUpdateImage?: string,
 *     FirmwareUpdateRole?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     RedundancyPercent?: int,
 *     FragmentSizeBytes?: int,
 *     FragmentIntervalMS?: int,
 *     Descriptor?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMulticastGroup(array $args = [])
 * @phpstan-method \Aws\Result createMulticastGroup(array{
 *     Name?: string,
 *     Description?: string,
 *     ClientRequestToken?: string,
 *     LoRaWAN?: array{
 *         RfRegion?: 'AS923-1'|'AS923-2'|'AS923-3'|'AS923-4'|'AU915'|'CN470'|'CN779'|'EU433'|'EU868'|'IN865'|'KR920'|'RU864'|'US915',
 *         DlClass?: 'ClassB'|'ClassC',
 *         ParticipatingGateways?: array{GatewayList?: list<string>, TransmissionInterval?: int, ...},
 *         DefaultSessionParameters?: array{DlDr?: int, DlFreq?: int, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMulticastGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMulticastGroupAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     ClientRequestToken?: string,
 *     LoRaWAN?: array{
 *         RfRegion?: 'AS923-1'|'AS923-2'|'AS923-3'|'AS923-4'|'AU915'|'CN470'|'CN779'|'EU433'|'EU868'|'IN865'|'KR920'|'RU864'|'US915',
 *         DlClass?: 'ClassB'|'ClassC',
 *         ParticipatingGateways?: array{GatewayList?: list<string>, TransmissionInterval?: int, ...},
 *         DefaultSessionParameters?: array{DlDr?: int, DlFreq?: int, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNetworkAnalyzerConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createNetworkAnalyzerConfiguration(array{
 *     Name?: string,
 *     TraceContent?: array{
 *         WirelessDeviceFrameInfo?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'DISABLED'|'ERROR'|'INFO',
 *         MulticastFrameInfo?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     WirelessDevices?: list<string>,
 *     WirelessGateways?: list<string>,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     MulticastGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNetworkAnalyzerConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNetworkAnalyzerConfigurationAsync(array{
 *     Name?: string,
 *     TraceContent?: array{
 *         WirelessDeviceFrameInfo?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'DISABLED'|'ERROR'|'INFO',
 *         MulticastFrameInfo?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     WirelessDevices?: list<string>,
 *     WirelessGateways?: list<string>,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     MulticastGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceProfile(array $args = [])
 * @phpstan-method \Aws\Result createServiceProfile(array{
 *     Name?: string,
 *     LoRaWAN?: array{
 *         AddGwMetadata?: bool,
 *         DrMin?: int,
 *         DrMax?: int,
 *         PrAllowed?: bool,
 *         RaAllowed?: bool,
 *         TxPowerIndexMin?: int,
 *         TxPowerIndexMax?: int,
 *         NbTransMin?: int,
 *         NbTransMax?: int,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceProfileAsync(array{
 *     Name?: string,
 *     LoRaWAN?: array{
 *         AddGwMetadata?: bool,
 *         DrMin?: int,
 *         DrMax?: int,
 *         PrAllowed?: bool,
 *         RaAllowed?: bool,
 *         TxPowerIndexMin?: int,
 *         TxPowerIndexMax?: int,
 *         NbTransMin?: int,
 *         NbTransMax?: int,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWirelessDevice(array $args = [])
 * @phpstan-method \Aws\Result createWirelessDevice(array{
 *     Type?: 'LoRaWAN'|'Sidewalk',
 *     Name?: string,
 *     Description?: string,
 *     DestinationName?: string,
 *     ClientRequestToken?: string,
 *     LoRaWAN?: array{
 *         DevEui?: string,
 *         DeviceProfileId?: string,
 *         ServiceProfileId?: string,
 *         OtaaV1_1?: array{AppKey?: string, NwkKey?: string, JoinEui?: string, ...},
 *         OtaaV1_0_x?: array{AppKey?: string, AppEui?: string, JoinEui?: string, GenAppKey?: string, ...},
 *         AbpV1_1?: array{DevAddr?: string, SessionKeys?: array, FCntStart?: int, ...},
 *         AbpV1_0_x?: array{DevAddr?: string, SessionKeys?: array, FCntStart?: int, ...},
 *         FPorts?: array{Fuota?: int, Multicast?: int, ClockSync?: int, Positioning?: array, Applications?: list<array>, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Positioning?: 'Disabled'|'Enabled',
 *     Sidewalk?: array{
 *         DeviceProfileId?: string,
 *         Positioning?: array{DestinationName?: string, ...},
 *         SidewalkManufacturingSn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWirelessDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWirelessDeviceAsync(array{
 *     Type?: 'LoRaWAN'|'Sidewalk',
 *     Name?: string,
 *     Description?: string,
 *     DestinationName?: string,
 *     ClientRequestToken?: string,
 *     LoRaWAN?: array{
 *         DevEui?: string,
 *         DeviceProfileId?: string,
 *         ServiceProfileId?: string,
 *         OtaaV1_1?: array{AppKey?: string, NwkKey?: string, JoinEui?: string, ...},
 *         OtaaV1_0_x?: array{AppKey?: string, AppEui?: string, JoinEui?: string, GenAppKey?: string, ...},
 *         AbpV1_1?: array{DevAddr?: string, SessionKeys?: array, FCntStart?: int, ...},
 *         AbpV1_0_x?: array{DevAddr?: string, SessionKeys?: array, FCntStart?: int, ...},
 *         FPorts?: array{Fuota?: int, Multicast?: int, ClockSync?: int, Positioning?: array, Applications?: list<array>, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Positioning?: 'Disabled'|'Enabled',
 *     Sidewalk?: array{
 *         DeviceProfileId?: string,
 *         Positioning?: array{DestinationName?: string, ...},
 *         SidewalkManufacturingSn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWirelessGateway(array $args = [])
 * @phpstan-method \Aws\Result createWirelessGateway(array{
 *     Name?: string,
 *     Description?: string,
 *     LoRaWAN?: array{
 *         GatewayEui?: string,
 *         RfRegion?: string,
 *         JoinEuiFilters?: list<list<string>>,
 *         NetIdFilters?: list<string>,
 *         SubBands?: list<int>,
 *         Beaconing?: array{DataRate?: int, Frequencies?: list<int>, ...},
 *         MaxEirp?: float,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWirelessGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWirelessGatewayAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     LoRaWAN?: array{
 *         GatewayEui?: string,
 *         RfRegion?: string,
 *         JoinEuiFilters?: list<list<string>>,
 *         NetIdFilters?: list<string>,
 *         SubBands?: list<int>,
 *         Beaconing?: array{DataRate?: int, Frequencies?: list<int>, ...},
 *         MaxEirp?: float,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWirelessGatewayTask(array $args = [])
 * @phpstan-method \Aws\Result createWirelessGatewayTask(array{Id?: string, WirelessGatewayTaskDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWirelessGatewayTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWirelessGatewayTaskAsync(array{Id?: string, WirelessGatewayTaskDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result createWirelessGatewayTaskDefinition(array $args = [])
 * @phpstan-method \Aws\Result createWirelessGatewayTaskDefinition(array{
 *     AutoCreateTasks?: bool,
 *     Name?: string,
 *     Update?: array{
 *         UpdateDataSource?: string,
 *         UpdateDataRole?: string,
 *         LoRaWAN?: array{UpdateSignature?: string, SigKeyCrc?: int, CurrentVersion?: array, UpdateVersion?: array, ...},
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWirelessGatewayTaskDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWirelessGatewayTaskDefinitionAsync(array{
 *     AutoCreateTasks?: bool,
 *     Name?: string,
 *     Update?: array{
 *         UpdateDataSource?: string,
 *         UpdateDataRole?: string,
 *         LoRaWAN?: array{UpdateSignature?: string, SigKeyCrc?: int, CurrentVersion?: array, UpdateVersion?: array, ...},
 *         ...,
 *     },
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteDestination(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDestinationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteDeviceProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteDeviceProfile(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeviceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeviceProfileAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteFuotaTask(array $args = [])
 * @phpstan-method \Aws\Result deleteFuotaTask(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFuotaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFuotaTaskAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteMulticastGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteMulticastGroup(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMulticastGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMulticastGroupAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteNetworkAnalyzerConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteNetworkAnalyzerConfiguration(array{ConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNetworkAnalyzerConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNetworkAnalyzerConfigurationAsync(array{ConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result deleteQueuedMessages(array $args = [])
 * @phpstan-method \Aws\Result deleteQueuedMessages(array{Id?: string, MessageId?: string, WirelessDeviceType?: 'LoRaWAN'|'Sidewalk', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueuedMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueuedMessagesAsync(array{Id?: string, MessageId?: string, WirelessDeviceType?: 'LoRaWAN'|'Sidewalk', ...} $args = [])
 * @method \Aws\Result deleteServiceProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceProfile(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceProfileAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteWirelessDevice(array $args = [])
 * @phpstan-method \Aws\Result deleteWirelessDevice(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWirelessDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWirelessDeviceAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteWirelessDeviceImportTask(array $args = [])
 * @phpstan-method \Aws\Result deleteWirelessDeviceImportTask(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWirelessDeviceImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWirelessDeviceImportTaskAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteWirelessGateway(array $args = [])
 * @phpstan-method \Aws\Result deleteWirelessGateway(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWirelessGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWirelessGatewayAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteWirelessGatewayTask(array $args = [])
 * @phpstan-method \Aws\Result deleteWirelessGatewayTask(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWirelessGatewayTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWirelessGatewayTaskAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteWirelessGatewayTaskDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteWirelessGatewayTaskDefinition(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWirelessGatewayTaskDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWirelessGatewayTaskDefinitionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deregisterWirelessDevice(array $args = [])
 * @phpstan-method \Aws\Result deregisterWirelessDevice(array{Identifier?: string, WirelessDeviceType?: 'LoRaWAN'|'Sidewalk', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterWirelessDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterWirelessDeviceAsync(array{Identifier?: string, WirelessDeviceType?: 'LoRaWAN'|'Sidewalk', ...} $args = [])
 * @method \Aws\Result disassociateAwsAccountFromPartnerAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateAwsAccountFromPartnerAccount(array{PartnerAccountId?: string, PartnerType?: 'Sidewalk', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAwsAccountFromPartnerAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAwsAccountFromPartnerAccountAsync(array{PartnerAccountId?: string, PartnerType?: 'Sidewalk', ...} $args = [])
 * @method \Aws\Result disassociateMulticastGroupFromFuotaTask(array $args = [])
 * @phpstan-method \Aws\Result disassociateMulticastGroupFromFuotaTask(array{Id?: string, MulticastGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMulticastGroupFromFuotaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMulticastGroupFromFuotaTaskAsync(array{Id?: string, MulticastGroupId?: string, ...} $args = [])
 * @method \Aws\Result disassociateWirelessDeviceFromFuotaTask(array $args = [])
 * @phpstan-method \Aws\Result disassociateWirelessDeviceFromFuotaTask(array{Id?: string, WirelessDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateWirelessDeviceFromFuotaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateWirelessDeviceFromFuotaTaskAsync(array{Id?: string, WirelessDeviceId?: string, ...} $args = [])
 * @method \Aws\Result disassociateWirelessDeviceFromMulticastGroup(array $args = [])
 * @phpstan-method \Aws\Result disassociateWirelessDeviceFromMulticastGroup(array{Id?: string, WirelessDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateWirelessDeviceFromMulticastGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateWirelessDeviceFromMulticastGroupAsync(array{Id?: string, WirelessDeviceId?: string, ...} $args = [])
 * @method \Aws\Result disassociateWirelessDeviceFromThing(array $args = [])
 * @phpstan-method \Aws\Result disassociateWirelessDeviceFromThing(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateWirelessDeviceFromThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateWirelessDeviceFromThingAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result disassociateWirelessGatewayFromCertificate(array $args = [])
 * @phpstan-method \Aws\Result disassociateWirelessGatewayFromCertificate(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateWirelessGatewayFromCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateWirelessGatewayFromCertificateAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result disassociateWirelessGatewayFromThing(array $args = [])
 * @phpstan-method \Aws\Result disassociateWirelessGatewayFromThing(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateWirelessGatewayFromThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateWirelessGatewayFromThingAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getDestination(array $args = [])
 * @phpstan-method \Aws\Result getDestination(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDestinationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getDeviceProfile(array $args = [])
 * @phpstan-method \Aws\Result getDeviceProfile(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceProfileAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getEventConfigurationByResourceTypes(array $args = [])
 * @phpstan-method \Aws\Result getEventConfigurationByResourceTypes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventConfigurationByResourceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventConfigurationByResourceTypesAsync(array{...} $args = [])
 * @method \Aws\Result getFuotaTask(array $args = [])
 * @phpstan-method \Aws\Result getFuotaTask(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFuotaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFuotaTaskAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getLogLevelsByResourceTypes(array $args = [])
 * @phpstan-method \Aws\Result getLogLevelsByResourceTypes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLogLevelsByResourceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLogLevelsByResourceTypesAsync(array{...} $args = [])
 * @method \Aws\Result getMetricConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getMetricConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetricConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetricConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getMetrics(array $args = [])
 * @phpstan-method \Aws\Result getMetrics(array{
 *     SummaryMetricQueries?: list<array{
 *         QueryId?: string,
 *         MetricName?: 'AwsAccountActiveDeviceCount'|'AwsAccountActiveGatewayCount'|'AwsAccountDeviceCount'|'AwsAccountDownlinkCount'|'AwsAccountGatewayCount'|'AwsAccountJoinAcceptCount'|'AwsAccountJoinRequestCount'|'AwsAccountRoamingDownlinkCount'|'AwsAccountRoamingUplinkCount'|'AwsAccountUplinkCount'|'AwsAccountUplinkLostCount'|'AwsAccountUplinkLostRate'|'DeviceDownlinkCount'|'DeviceJoinAcceptCount'|'DeviceJoinRequestCount'|'DeviceRSSI'|'DeviceRoamingDownlinkCount'|'DeviceRoamingRSSI'|'DeviceRoamingSNR'|'DeviceRoamingUplinkCount'|'DeviceSNR'|'DeviceUplinkCount'|'DeviceUplinkLostCount'|'DeviceUplinkLostRate'|'GatewayDownTime'|'GatewayDownlinkCount'|'GatewayJoinAcceptCount'|'GatewayJoinRequestCount'|'GatewayRSSI'|'GatewaySNR'|'GatewayUpTime'|'GatewayUplinkCount',
 *         Dimensions?: list<array>,
 *         AggregationPeriod?: 'OneDay'|'OneHour'|'OneWeek',
 *         StartTimestamp?: int|string|\DateTimeInterface,
 *         EndTimestamp?: int|string|\DateTimeInterface,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetricsAsync(array{
 *     SummaryMetricQueries?: list<array{
 *         QueryId?: string,
 *         MetricName?: 'AwsAccountActiveDeviceCount'|'AwsAccountActiveGatewayCount'|'AwsAccountDeviceCount'|'AwsAccountDownlinkCount'|'AwsAccountGatewayCount'|'AwsAccountJoinAcceptCount'|'AwsAccountJoinRequestCount'|'AwsAccountRoamingDownlinkCount'|'AwsAccountRoamingUplinkCount'|'AwsAccountUplinkCount'|'AwsAccountUplinkLostCount'|'AwsAccountUplinkLostRate'|'DeviceDownlinkCount'|'DeviceJoinAcceptCount'|'DeviceJoinRequestCount'|'DeviceRSSI'|'DeviceRoamingDownlinkCount'|'DeviceRoamingRSSI'|'DeviceRoamingSNR'|'DeviceRoamingUplinkCount'|'DeviceSNR'|'DeviceUplinkCount'|'DeviceUplinkLostCount'|'DeviceUplinkLostRate'|'GatewayDownTime'|'GatewayDownlinkCount'|'GatewayJoinAcceptCount'|'GatewayJoinRequestCount'|'GatewayRSSI'|'GatewaySNR'|'GatewayUpTime'|'GatewayUplinkCount',
 *         Dimensions?: list<array>,
 *         AggregationPeriod?: 'OneDay'|'OneHour'|'OneWeek',
 *         StartTimestamp?: int|string|\DateTimeInterface,
 *         EndTimestamp?: int|string|\DateTimeInterface,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMulticastGroup(array $args = [])
 * @phpstan-method \Aws\Result getMulticastGroup(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMulticastGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMulticastGroupAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getMulticastGroupSession(array $args = [])
 * @phpstan-method \Aws\Result getMulticastGroupSession(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMulticastGroupSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMulticastGroupSessionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getNetworkAnalyzerConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getNetworkAnalyzerConfiguration(array{ConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkAnalyzerConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkAnalyzerConfigurationAsync(array{ConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result getPartnerAccount(array $args = [])
 * @phpstan-method \Aws\Result getPartnerAccount(array{PartnerAccountId?: string, PartnerType?: 'Sidewalk', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPartnerAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPartnerAccountAsync(array{PartnerAccountId?: string, PartnerType?: 'Sidewalk', ...} $args = [])
 * @method \Aws\Result getPosition(array $args = [])
 * @phpstan-method \Aws\Result getPosition(array{ResourceIdentifier?: string, ResourceType?: 'WirelessDevice'|'WirelessGateway', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPositionAsync(array{ResourceIdentifier?: string, ResourceType?: 'WirelessDevice'|'WirelessGateway', ...} $args = [])
 * @method \Aws\Result getPositionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getPositionConfiguration(array{ResourceIdentifier?: string, ResourceType?: 'WirelessDevice'|'WirelessGateway', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPositionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPositionConfigurationAsync(array{ResourceIdentifier?: string, ResourceType?: 'WirelessDevice'|'WirelessGateway', ...} $args = [])
 * @method \Aws\Result getPositionEstimate(array $args = [])
 * @phpstan-method \Aws\Result getPositionEstimate(array{
 *     WiFiAccessPoints?: list<array{MacAddress?: string, Rss?: int, ...}>,
 *     CellTowers?: array{
 *         Gsm?: list<array>,
 *         Wcdma?: list<array>,
 *         Tdscdma?: list<array>,
 *         Lte?: list<array>,
 *         Cdma?: list<array>,
 *         ...,
 *     },
 *     Ip?: array{IpAddress?: string, ...},
 *     Gnss?: array{
 *         Payload?: string,
 *         CaptureTime?: float,
 *         CaptureTimeAccuracy?: float,
 *         AssistPosition?: list<float>,
 *         AssistAltitude?: float,
 *         Use2DSolver?: bool,
 *         ...,
 *     },
 *     Timestamp?: int|string|\DateTimeInterface,
 *     AdvancedConfiguration?: array{WiFiCellular?: array{ConfidencePercent?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPositionEstimateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPositionEstimateAsync(array{
 *     WiFiAccessPoints?: list<array{MacAddress?: string, Rss?: int, ...}>,
 *     CellTowers?: array{
 *         Gsm?: list<array>,
 *         Wcdma?: list<array>,
 *         Tdscdma?: list<array>,
 *         Lte?: list<array>,
 *         Cdma?: list<array>,
 *         ...,
 *     },
 *     Ip?: array{IpAddress?: string, ...},
 *     Gnss?: array{
 *         Payload?: string,
 *         CaptureTime?: float,
 *         CaptureTimeAccuracy?: float,
 *         AssistPosition?: list<float>,
 *         AssistAltitude?: float,
 *         Use2DSolver?: bool,
 *         ...,
 *     },
 *     Timestamp?: int|string|\DateTimeInterface,
 *     AdvancedConfiguration?: array{WiFiCellular?: array{ConfidencePercent?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourceEventConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getResourceEventConfiguration(array{
 *     Identifier?: string,
 *     IdentifierType?: 'DevEui'|'GatewayEui'|'PartnerAccountId'|'WirelessDeviceId'|'WirelessGatewayId',
 *     PartnerType?: 'Sidewalk',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceEventConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceEventConfigurationAsync(array{
 *     Identifier?: string,
 *     IdentifierType?: 'DevEui'|'GatewayEui'|'PartnerAccountId'|'WirelessDeviceId'|'WirelessGatewayId',
 *     PartnerType?: 'Sidewalk',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourceLogLevel(array $args = [])
 * @phpstan-method \Aws\Result getResourceLogLevel(array{ResourceIdentifier?: string, ResourceType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceLogLevelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceLogLevelAsync(array{ResourceIdentifier?: string, ResourceType?: string, ...} $args = [])
 * @method \Aws\Result getResourcePosition(array $args = [])
 * @phpstan-method \Aws\Result getResourcePosition(array{ResourceIdentifier?: string, ResourceType?: 'WirelessDevice'|'WirelessGateway', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePositionAsync(array{ResourceIdentifier?: string, ResourceType?: 'WirelessDevice'|'WirelessGateway', ...} $args = [])
 * @method \Aws\Result getServiceEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getServiceEndpoint(array{ServiceType?: 'CUPS'|'LNS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceEndpointAsync(array{ServiceType?: 'CUPS'|'LNS', ...} $args = [])
 * @method \Aws\Result getServiceProfile(array $args = [])
 * @phpstan-method \Aws\Result getServiceProfile(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceProfileAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getWirelessDevice(array $args = [])
 * @phpstan-method \Aws\Result getWirelessDevice(array{
 *     Identifier?: string,
 *     IdentifierType?: 'DevEui'|'SidewalkManufacturingSn'|'ThingName'|'WirelessDeviceId',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getWirelessDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWirelessDeviceAsync(array{
 *     Identifier?: string,
 *     IdentifierType?: 'DevEui'|'SidewalkManufacturingSn'|'ThingName'|'WirelessDeviceId',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getWirelessDeviceImportTask(array $args = [])
 * @phpstan-method \Aws\Result getWirelessDeviceImportTask(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWirelessDeviceImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWirelessDeviceImportTaskAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getWirelessDeviceStatistics(array $args = [])
 * @phpstan-method \Aws\Result getWirelessDeviceStatistics(array{WirelessDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWirelessDeviceStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWirelessDeviceStatisticsAsync(array{WirelessDeviceId?: string, ...} $args = [])
 * @method \Aws\Result getWirelessGateway(array $args = [])
 * @phpstan-method \Aws\Result getWirelessGateway(array{Identifier?: string, IdentifierType?: 'GatewayEui'|'ThingName'|'WirelessGatewayId', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWirelessGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWirelessGatewayAsync(array{Identifier?: string, IdentifierType?: 'GatewayEui'|'ThingName'|'WirelessGatewayId', ...} $args = [])
 * @method \Aws\Result getWirelessGatewayCertificate(array $args = [])
 * @phpstan-method \Aws\Result getWirelessGatewayCertificate(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWirelessGatewayCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWirelessGatewayCertificateAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getWirelessGatewayFirmwareInformation(array $args = [])
 * @phpstan-method \Aws\Result getWirelessGatewayFirmwareInformation(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWirelessGatewayFirmwareInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWirelessGatewayFirmwareInformationAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getWirelessGatewayStatistics(array $args = [])
 * @phpstan-method \Aws\Result getWirelessGatewayStatistics(array{WirelessGatewayId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWirelessGatewayStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWirelessGatewayStatisticsAsync(array{WirelessGatewayId?: string, ...} $args = [])
 * @method \Aws\Result getWirelessGatewayTask(array $args = [])
 * @phpstan-method \Aws\Result getWirelessGatewayTask(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWirelessGatewayTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWirelessGatewayTaskAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getWirelessGatewayTaskDefinition(array $args = [])
 * @phpstan-method \Aws\Result getWirelessGatewayTaskDefinition(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWirelessGatewayTaskDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWirelessGatewayTaskDefinitionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result listDestinations(array $args = [])
 * @phpstan-method \Aws\Result listDestinations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDestinationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDeviceProfiles(array $args = [])
 * @phpstan-method \Aws\Result listDeviceProfiles(array{NextToken?: string, MaxResults?: int, DeviceProfileType?: 'LoRaWAN'|'Sidewalk', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeviceProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeviceProfilesAsync(array{NextToken?: string, MaxResults?: int, DeviceProfileType?: 'LoRaWAN'|'Sidewalk', ...} $args = [])
 * @method \Aws\Result listDevicesForWirelessDeviceImportTask(array $args = [])
 * @phpstan-method \Aws\Result listDevicesForWirelessDeviceImportTask(array{
 *     Id?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Status?: 'FAILED'|'INITIALIZED'|'ONBOARDED'|'PENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevicesForWirelessDeviceImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevicesForWirelessDeviceImportTaskAsync(array{
 *     Id?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Status?: 'FAILED'|'INITIALIZED'|'ONBOARDED'|'PENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEventConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listEventConfigurations(array{
 *     ResourceType?: 'SidewalkAccount'|'WirelessDevice'|'WirelessGateway',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventConfigurationsAsync(array{
 *     ResourceType?: 'SidewalkAccount'|'WirelessDevice'|'WirelessGateway',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFuotaTasks(array $args = [])
 * @phpstan-method \Aws\Result listFuotaTasks(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFuotaTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFuotaTasksAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMulticastGroups(array $args = [])
 * @phpstan-method \Aws\Result listMulticastGroups(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMulticastGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMulticastGroupsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMulticastGroupsByFuotaTask(array $args = [])
 * @phpstan-method \Aws\Result listMulticastGroupsByFuotaTask(array{Id?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMulticastGroupsByFuotaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMulticastGroupsByFuotaTaskAsync(array{Id?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listNetworkAnalyzerConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listNetworkAnalyzerConfigurations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkAnalyzerConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkAnalyzerConfigurationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPartnerAccounts(array $args = [])
 * @phpstan-method \Aws\Result listPartnerAccounts(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPartnerAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPartnerAccountsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPositionConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listPositionConfigurations(array{ResourceType?: 'WirelessDevice'|'WirelessGateway', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPositionConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPositionConfigurationsAsync(array{ResourceType?: 'WirelessDevice'|'WirelessGateway', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listQueuedMessages(array $args = [])
 * @phpstan-method \Aws\Result listQueuedMessages(array{Id?: string, NextToken?: string, MaxResults?: int, WirelessDeviceType?: 'LoRaWAN'|'Sidewalk', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueuedMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueuedMessagesAsync(array{Id?: string, NextToken?: string, MaxResults?: int, WirelessDeviceType?: 'LoRaWAN'|'Sidewalk', ...} $args = [])
 * @method \Aws\Result listServiceProfiles(array $args = [])
 * @phpstan-method \Aws\Result listServiceProfiles(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceProfilesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listWirelessDeviceImportTasks(array $args = [])
 * @phpstan-method \Aws\Result listWirelessDeviceImportTasks(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWirelessDeviceImportTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWirelessDeviceImportTasksAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listWirelessDevices(array $args = [])
 * @phpstan-method \Aws\Result listWirelessDevices(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     DestinationName?: string,
 *     DeviceProfileId?: string,
 *     ServiceProfileId?: string,
 *     WirelessDeviceType?: 'LoRaWAN'|'Sidewalk',
 *     FuotaTaskId?: string,
 *     MulticastGroupId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWirelessDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWirelessDevicesAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     DestinationName?: string,
 *     DeviceProfileId?: string,
 *     ServiceProfileId?: string,
 *     WirelessDeviceType?: 'LoRaWAN'|'Sidewalk',
 *     FuotaTaskId?: string,
 *     MulticastGroupId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWirelessGatewayTaskDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listWirelessGatewayTaskDefinitions(array{MaxResults?: int, NextToken?: string, TaskDefinitionType?: 'UPDATE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWirelessGatewayTaskDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWirelessGatewayTaskDefinitionsAsync(array{MaxResults?: int, NextToken?: string, TaskDefinitionType?: 'UPDATE', ...} $args = [])
 * @method \Aws\Result listWirelessGateways(array $args = [])
 * @phpstan-method \Aws\Result listWirelessGateways(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWirelessGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWirelessGatewaysAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result putPositionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putPositionConfiguration(array{
 *     ResourceIdentifier?: string,
 *     ResourceType?: 'WirelessDevice'|'WirelessGateway',
 *     Solvers?: array{SemtechGnss?: array{Status?: 'Disabled'|'Enabled', Fec?: 'NONE'|'ROSE', ...}, ...},
 *     Destination?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPositionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPositionConfigurationAsync(array{
 *     ResourceIdentifier?: string,
 *     ResourceType?: 'WirelessDevice'|'WirelessGateway',
 *     Solvers?: array{SemtechGnss?: array{Status?: 'Disabled'|'Enabled', Fec?: 'NONE'|'ROSE', ...}, ...},
 *     Destination?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourceLogLevel(array $args = [])
 * @phpstan-method \Aws\Result putResourceLogLevel(array{ResourceIdentifier?: string, ResourceType?: string, LogLevel?: 'DISABLED'|'ERROR'|'INFO', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourceLogLevelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourceLogLevelAsync(array{ResourceIdentifier?: string, ResourceType?: string, LogLevel?: 'DISABLED'|'ERROR'|'INFO', ...} $args = [])
 * @method \Aws\Result resetAllResourceLogLevels(array $args = [])
 * @phpstan-method \Aws\Result resetAllResourceLogLevels(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetAllResourceLogLevelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetAllResourceLogLevelsAsync(array{...} $args = [])
 * @method \Aws\Result resetResourceLogLevel(array $args = [])
 * @phpstan-method \Aws\Result resetResourceLogLevel(array{ResourceIdentifier?: string, ResourceType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetResourceLogLevelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetResourceLogLevelAsync(array{ResourceIdentifier?: string, ResourceType?: string, ...} $args = [])
 * @method \Aws\Result sendDataToMulticastGroup(array $args = [])
 * @phpstan-method \Aws\Result sendDataToMulticastGroup(array{
 *     Id?: string,
 *     PayloadData?: string,
 *     WirelessMetadata?: array{LoRaWAN?: array{FPort?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendDataToMulticastGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendDataToMulticastGroupAsync(array{
 *     Id?: string,
 *     PayloadData?: string,
 *     WirelessMetadata?: array{LoRaWAN?: array{FPort?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendDataToWirelessDevice(array $args = [])
 * @phpstan-method \Aws\Result sendDataToWirelessDevice(array{
 *     Id?: string,
 *     TransmitMode?: int,
 *     PayloadData?: string,
 *     WirelessMetadata?: array{
 *         LoRaWAN?: array{FPort?: int, ParticipatingGateways?: array, ...},
 *         Sidewalk?: array{
 *             Seq?: int,
 *             MessageType?: 'CUSTOM_COMMAND_ID_GET'|'CUSTOM_COMMAND_ID_NOTIFY'|'CUSTOM_COMMAND_ID_RESP'|'CUSTOM_COMMAND_ID_SET',
 *             AckModeRetryDurationSecs?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendDataToWirelessDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendDataToWirelessDeviceAsync(array{
 *     Id?: string,
 *     TransmitMode?: int,
 *     PayloadData?: string,
 *     WirelessMetadata?: array{
 *         LoRaWAN?: array{FPort?: int, ParticipatingGateways?: array, ...},
 *         Sidewalk?: array{
 *             Seq?: int,
 *             MessageType?: 'CUSTOM_COMMAND_ID_GET'|'CUSTOM_COMMAND_ID_NOTIFY'|'CUSTOM_COMMAND_ID_RESP'|'CUSTOM_COMMAND_ID_SET',
 *             AckModeRetryDurationSecs?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startBulkAssociateWirelessDeviceWithMulticastGroup(array $args = [])
 * @phpstan-method \Aws\Result startBulkAssociateWirelessDeviceWithMulticastGroup(array{Id?: string, QueryString?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startBulkAssociateWirelessDeviceWithMulticastGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBulkAssociateWirelessDeviceWithMulticastGroupAsync(array{Id?: string, QueryString?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result startBulkDisassociateWirelessDeviceFromMulticastGroup(array $args = [])
 * @phpstan-method \Aws\Result startBulkDisassociateWirelessDeviceFromMulticastGroup(array{Id?: string, QueryString?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startBulkDisassociateWirelessDeviceFromMulticastGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBulkDisassociateWirelessDeviceFromMulticastGroupAsync(array{Id?: string, QueryString?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result startFuotaTask(array $args = [])
 * @phpstan-method \Aws\Result startFuotaTask(array{Id?: string, LoRaWAN?: array{StartTime?: int|string|\DateTimeInterface, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startFuotaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFuotaTaskAsync(array{Id?: string, LoRaWAN?: array{StartTime?: int|string|\DateTimeInterface, ...}, ...} $args = [])
 * @method \Aws\Result startMulticastGroupSession(array $args = [])
 * @phpstan-method \Aws\Result startMulticastGroupSession(array{
 *     Id?: string,
 *     LoRaWAN?: array{
 *         DlDr?: int,
 *         DlFreq?: int,
 *         SessionStartTime?: int|string|\DateTimeInterface,
 *         SessionTimeout?: int,
 *         PingSlotPeriod?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMulticastGroupSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMulticastGroupSessionAsync(array{
 *     Id?: string,
 *     LoRaWAN?: array{
 *         DlDr?: int,
 *         DlFreq?: int,
 *         SessionStartTime?: int|string|\DateTimeInterface,
 *         SessionTimeout?: int,
 *         PingSlotPeriod?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSingleWirelessDeviceImportTask(array $args = [])
 * @phpstan-method \Aws\Result startSingleWirelessDeviceImportTask(array{
 *     DestinationName?: string,
 *     ClientRequestToken?: string,
 *     DeviceName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Positioning?: 'Disabled'|'Enabled',
 *     Sidewalk?: array{SidewalkManufacturingSn?: string, Positioning?: array{DestinationName?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSingleWirelessDeviceImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSingleWirelessDeviceImportTaskAsync(array{
 *     DestinationName?: string,
 *     ClientRequestToken?: string,
 *     DeviceName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Positioning?: 'Disabled'|'Enabled',
 *     Sidewalk?: array{SidewalkManufacturingSn?: string, Positioning?: array{DestinationName?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startWirelessDeviceImportTask(array $args = [])
 * @phpstan-method \Aws\Result startWirelessDeviceImportTask(array{
 *     DestinationName?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Positioning?: 'Disabled'|'Enabled',
 *     Sidewalk?: array{DeviceCreationFile?: string, Role?: string, Positioning?: array{DestinationName?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startWirelessDeviceImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startWirelessDeviceImportTaskAsync(array{
 *     DestinationName?: string,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Positioning?: 'Disabled'|'Enabled',
 *     Sidewalk?: array{DeviceCreationFile?: string, Role?: string, Positioning?: array{DestinationName?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result testWirelessDevice(array $args = [])
 * @phpstan-method \Aws\Result testWirelessDevice(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise testWirelessDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testWirelessDeviceAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDestination(array $args = [])
 * @phpstan-method \Aws\Result updateDestination(array{
 *     Name?: string,
 *     ExpressionType?: 'MqttTopic'|'RuleName',
 *     Expression?: string,
 *     Description?: string,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDestinationAsync(array{
 *     Name?: string,
 *     ExpressionType?: 'MqttTopic'|'RuleName',
 *     Expression?: string,
 *     Description?: string,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventConfigurationByResourceTypes(array $args = [])
 * @phpstan-method \Aws\Result updateEventConfigurationByResourceTypes(array{
 *     DeviceRegistrationState?: array{Sidewalk?: array{WirelessDeviceEventTopic?: 'Disabled'|'Enabled', ...}, ...},
 *     Proximity?: array{Sidewalk?: array{WirelessDeviceEventTopic?: 'Disabled'|'Enabled', ...}, ...},
 *     Join?: array{LoRaWAN?: array{WirelessDeviceEventTopic?: 'Disabled'|'Enabled', ...}, ...},
 *     ConnectionStatus?: array{LoRaWAN?: array{WirelessGatewayEventTopic?: 'Disabled'|'Enabled', ...}, ...},
 *     MessageDeliveryStatus?: array{Sidewalk?: array{WirelessDeviceEventTopic?: 'Disabled'|'Enabled', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventConfigurationByResourceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventConfigurationByResourceTypesAsync(array{
 *     DeviceRegistrationState?: array{Sidewalk?: array{WirelessDeviceEventTopic?: 'Disabled'|'Enabled', ...}, ...},
 *     Proximity?: array{Sidewalk?: array{WirelessDeviceEventTopic?: 'Disabled'|'Enabled', ...}, ...},
 *     Join?: array{LoRaWAN?: array{WirelessDeviceEventTopic?: 'Disabled'|'Enabled', ...}, ...},
 *     ConnectionStatus?: array{LoRaWAN?: array{WirelessGatewayEventTopic?: 'Disabled'|'Enabled', ...}, ...},
 *     MessageDeliveryStatus?: array{Sidewalk?: array{WirelessDeviceEventTopic?: 'Disabled'|'Enabled', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFuotaTask(array $args = [])
 * @phpstan-method \Aws\Result updateFuotaTask(array{
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     LoRaWAN?: array{
 *         RfRegion?: 'AS923-1'|'AS923-2'|'AS923-3'|'AS923-4'|'AU915'|'CN470'|'CN779'|'EU433'|'EU868'|'IN865'|'KR920'|'RU864'|'US915',
 *         ...,
 *     },
 *     FirmwareUpdateImage?: string,
 *     FirmwareUpdateRole?: string,
 *     RedundancyPercent?: int,
 *     FragmentSizeBytes?: int,
 *     FragmentIntervalMS?: int,
 *     Descriptor?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFuotaTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFuotaTaskAsync(array{
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     LoRaWAN?: array{
 *         RfRegion?: 'AS923-1'|'AS923-2'|'AS923-3'|'AS923-4'|'AU915'|'CN470'|'CN779'|'EU433'|'EU868'|'IN865'|'KR920'|'RU864'|'US915',
 *         ...,
 *     },
 *     FirmwareUpdateImage?: string,
 *     FirmwareUpdateRole?: string,
 *     RedundancyPercent?: int,
 *     FragmentSizeBytes?: int,
 *     FragmentIntervalMS?: int,
 *     Descriptor?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLogLevelsByResourceTypes(array $args = [])
 * @phpstan-method \Aws\Result updateLogLevelsByResourceTypes(array{
 *     DefaultLogLevel?: 'DISABLED'|'ERROR'|'INFO',
 *     FuotaTaskLogOptions?: list<array{Type?: 'LoRaWAN', LogLevel?: 'DISABLED'|'ERROR'|'INFO', Events?: list<array>, ...}>,
 *     WirelessDeviceLogOptions?: list<array{Type?: 'LoRaWAN'|'Sidewalk', LogLevel?: 'DISABLED'|'ERROR'|'INFO', Events?: list<array>, ...}>,
 *     WirelessGatewayLogOptions?: list<array{Type?: 'LoRaWAN', LogLevel?: 'DISABLED'|'ERROR'|'INFO', Events?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLogLevelsByResourceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLogLevelsByResourceTypesAsync(array{
 *     DefaultLogLevel?: 'DISABLED'|'ERROR'|'INFO',
 *     FuotaTaskLogOptions?: list<array{Type?: 'LoRaWAN', LogLevel?: 'DISABLED'|'ERROR'|'INFO', Events?: list<array>, ...}>,
 *     WirelessDeviceLogOptions?: list<array{Type?: 'LoRaWAN'|'Sidewalk', LogLevel?: 'DISABLED'|'ERROR'|'INFO', Events?: list<array>, ...}>,
 *     WirelessGatewayLogOptions?: list<array{Type?: 'LoRaWAN', LogLevel?: 'DISABLED'|'ERROR'|'INFO', Events?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMetricConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateMetricConfiguration(array{SummaryMetric?: array{Status?: 'Disabled'|'Enabled', ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMetricConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMetricConfigurationAsync(array{SummaryMetric?: array{Status?: 'Disabled'|'Enabled', ...}, ...} $args = [])
 * @method \Aws\Result updateMulticastGroup(array $args = [])
 * @phpstan-method \Aws\Result updateMulticastGroup(array{
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     LoRaWAN?: array{
 *         RfRegion?: 'AS923-1'|'AS923-2'|'AS923-3'|'AS923-4'|'AU915'|'CN470'|'CN779'|'EU433'|'EU868'|'IN865'|'KR920'|'RU864'|'US915',
 *         DlClass?: 'ClassB'|'ClassC',
 *         ParticipatingGateways?: array{GatewayList?: list<string>, TransmissionInterval?: int, ...},
 *         DefaultSessionParameters?: array{DlDr?: int, DlFreq?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMulticastGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMulticastGroupAsync(array{
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     LoRaWAN?: array{
 *         RfRegion?: 'AS923-1'|'AS923-2'|'AS923-3'|'AS923-4'|'AU915'|'CN470'|'CN779'|'EU433'|'EU868'|'IN865'|'KR920'|'RU864'|'US915',
 *         DlClass?: 'ClassB'|'ClassC',
 *         ParticipatingGateways?: array{GatewayList?: list<string>, TransmissionInterval?: int, ...},
 *         DefaultSessionParameters?: array{DlDr?: int, DlFreq?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNetworkAnalyzerConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateNetworkAnalyzerConfiguration(array{
 *     ConfigurationName?: string,
 *     TraceContent?: array{
 *         WirelessDeviceFrameInfo?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'DISABLED'|'ERROR'|'INFO',
 *         MulticastFrameInfo?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     WirelessDevicesToAdd?: list<string>,
 *     WirelessDevicesToRemove?: list<string>,
 *     WirelessGatewaysToAdd?: list<string>,
 *     WirelessGatewaysToRemove?: list<string>,
 *     Description?: string,
 *     MulticastGroupsToAdd?: list<string>,
 *     MulticastGroupsToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkAnalyzerConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkAnalyzerConfigurationAsync(array{
 *     ConfigurationName?: string,
 *     TraceContent?: array{
 *         WirelessDeviceFrameInfo?: 'DISABLED'|'ENABLED',
 *         LogLevel?: 'DISABLED'|'ERROR'|'INFO',
 *         MulticastFrameInfo?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     WirelessDevicesToAdd?: list<string>,
 *     WirelessDevicesToRemove?: list<string>,
 *     WirelessGatewaysToAdd?: list<string>,
 *     WirelessGatewaysToRemove?: list<string>,
 *     Description?: string,
 *     MulticastGroupsToAdd?: list<string>,
 *     MulticastGroupsToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePartnerAccount(array $args = [])
 * @phpstan-method \Aws\Result updatePartnerAccount(array{
 *     Sidewalk?: array{AppServerPrivateKey?: string, ...},
 *     PartnerAccountId?: string,
 *     PartnerType?: 'Sidewalk',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePartnerAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePartnerAccountAsync(array{
 *     Sidewalk?: array{AppServerPrivateKey?: string, ...},
 *     PartnerAccountId?: string,
 *     PartnerType?: 'Sidewalk',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePosition(array $args = [])
 * @phpstan-method \Aws\Result updatePosition(array{
 *     ResourceIdentifier?: string,
 *     ResourceType?: 'WirelessDevice'|'WirelessGateway',
 *     Position?: list<float>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePositionAsync(array{
 *     ResourceIdentifier?: string,
 *     ResourceType?: 'WirelessDevice'|'WirelessGateway',
 *     Position?: list<float>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResourceEventConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateResourceEventConfiguration(array{
 *     Identifier?: string,
 *     IdentifierType?: 'DevEui'|'GatewayEui'|'PartnerAccountId'|'WirelessDeviceId'|'WirelessGatewayId',
 *     PartnerType?: 'Sidewalk',
 *     DeviceRegistrationState?: array{
 *         Sidewalk?: array{AmazonIdEventTopic?: 'Disabled'|'Enabled', ...},
 *         WirelessDeviceIdEventTopic?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     Proximity?: array{
 *         Sidewalk?: array{AmazonIdEventTopic?: 'Disabled'|'Enabled', ...},
 *         WirelessDeviceIdEventTopic?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     Join?: array{
 *         LoRaWAN?: array{DevEuiEventTopic?: 'Disabled'|'Enabled', ...},
 *         WirelessDeviceIdEventTopic?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     ConnectionStatus?: array{
 *         LoRaWAN?: array{GatewayEuiEventTopic?: 'Disabled'|'Enabled', ...},
 *         WirelessGatewayIdEventTopic?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     MessageDeliveryStatus?: array{
 *         Sidewalk?: array{AmazonIdEventTopic?: 'Disabled'|'Enabled', ...},
 *         WirelessDeviceIdEventTopic?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceEventConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceEventConfigurationAsync(array{
 *     Identifier?: string,
 *     IdentifierType?: 'DevEui'|'GatewayEui'|'PartnerAccountId'|'WirelessDeviceId'|'WirelessGatewayId',
 *     PartnerType?: 'Sidewalk',
 *     DeviceRegistrationState?: array{
 *         Sidewalk?: array{AmazonIdEventTopic?: 'Disabled'|'Enabled', ...},
 *         WirelessDeviceIdEventTopic?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     Proximity?: array{
 *         Sidewalk?: array{AmazonIdEventTopic?: 'Disabled'|'Enabled', ...},
 *         WirelessDeviceIdEventTopic?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     Join?: array{
 *         LoRaWAN?: array{DevEuiEventTopic?: 'Disabled'|'Enabled', ...},
 *         WirelessDeviceIdEventTopic?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     ConnectionStatus?: array{
 *         LoRaWAN?: array{GatewayEuiEventTopic?: 'Disabled'|'Enabled', ...},
 *         WirelessGatewayIdEventTopic?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     MessageDeliveryStatus?: array{
 *         Sidewalk?: array{AmazonIdEventTopic?: 'Disabled'|'Enabled', ...},
 *         WirelessDeviceIdEventTopic?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResourcePosition(array $args = [])
 * @phpstan-method \Aws\Result updateResourcePosition(array{
 *     ResourceIdentifier?: string,
 *     ResourceType?: 'WirelessDevice'|'WirelessGateway',
 *     GeoJsonPayload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourcePositionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourcePositionAsync(array{
 *     ResourceIdentifier?: string,
 *     ResourceType?: 'WirelessDevice'|'WirelessGateway',
 *     GeoJsonPayload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWirelessDevice(array $args = [])
 * @phpstan-method \Aws\Result updateWirelessDevice(array{
 *     Id?: string,
 *     DestinationName?: string,
 *     Name?: string,
 *     Description?: string,
 *     LoRaWAN?: array{
 *         DeviceProfileId?: string,
 *         ServiceProfileId?: string,
 *         AbpV1_1?: array{FCntStart?: int, ...},
 *         AbpV1_0_x?: array{FCntStart?: int, ...},
 *         FPorts?: array{Positioning?: array, Applications?: list<array>, ...},
 *         ...,
 *     },
 *     Positioning?: 'Disabled'|'Enabled',
 *     Sidewalk?: array{Positioning?: array{DestinationName?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWirelessDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWirelessDeviceAsync(array{
 *     Id?: string,
 *     DestinationName?: string,
 *     Name?: string,
 *     Description?: string,
 *     LoRaWAN?: array{
 *         DeviceProfileId?: string,
 *         ServiceProfileId?: string,
 *         AbpV1_1?: array{FCntStart?: int, ...},
 *         AbpV1_0_x?: array{FCntStart?: int, ...},
 *         FPorts?: array{Positioning?: array, Applications?: list<array>, ...},
 *         ...,
 *     },
 *     Positioning?: 'Disabled'|'Enabled',
 *     Sidewalk?: array{Positioning?: array{DestinationName?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWirelessDeviceImportTask(array $args = [])
 * @phpstan-method \Aws\Result updateWirelessDeviceImportTask(array{Id?: string, Sidewalk?: array{DeviceCreationFile?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWirelessDeviceImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWirelessDeviceImportTaskAsync(array{Id?: string, Sidewalk?: array{DeviceCreationFile?: string, ...}, ...} $args = [])
 * @method \Aws\Result updateWirelessGateway(array $args = [])
 * @phpstan-method \Aws\Result updateWirelessGateway(array{
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     JoinEuiFilters?: list<list<string>>,
 *     NetIdFilters?: list<string>,
 *     MaxEirp?: float,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWirelessGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWirelessGatewayAsync(array{
 *     Id?: string,
 *     Name?: string,
 *     Description?: string,
 *     JoinEuiFilters?: list<list<string>>,
 *     NetIdFilters?: list<string>,
 *     MaxEirp?: float,
 *     ...,
 * } $args = [])
 */
class IoTWirelessClient extends AwsClient {}
