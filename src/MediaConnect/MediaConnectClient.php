<?php
namespace Aws\MediaConnect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS MediaConnect** service.
 * @method \Aws\Result addBridgeOutputs(array $args = [])
 * @phpstan-method \Aws\Result addBridgeOutputs(array{BridgeArn?: string, Outputs?: list<array{NetworkOutput?: array, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addBridgeOutputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addBridgeOutputsAsync(array{BridgeArn?: string, Outputs?: list<array{NetworkOutput?: array, ...}>, ...} $args = [])
 * @method \Aws\Result addBridgeSources(array $args = [])
 * @phpstan-method \Aws\Result addBridgeSources(array{BridgeArn?: string, Sources?: list<array{FlowSource?: array, NetworkSource?: array, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addBridgeSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addBridgeSourcesAsync(array{BridgeArn?: string, Sources?: list<array{FlowSource?: array, NetworkSource?: array, ...}>, ...} $args = [])
 * @method \Aws\Result addFlowMediaStreams(array $args = [])
 * @phpstan-method \Aws\Result addFlowMediaStreams(array{
 *     FlowArn?: string,
 *     MediaStreams?: list<array{
 *         Attributes?: array,
 *         ClockRate?: int,
 *         Description?: string,
 *         MediaStreamId?: int,
 *         MediaStreamName?: string,
 *         MediaStreamType?: 'ancillary-data'|'audio'|'video',
 *         VideoFormat?: string,
 *         MediaStreamTags?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addFlowMediaStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addFlowMediaStreamsAsync(array{
 *     FlowArn?: string,
 *     MediaStreams?: list<array{
 *         Attributes?: array,
 *         ClockRate?: int,
 *         Description?: string,
 *         MediaStreamId?: int,
 *         MediaStreamName?: string,
 *         MediaStreamType?: 'ancillary-data'|'audio'|'video',
 *         VideoFormat?: string,
 *         MediaStreamTags?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addFlowOutputs(array $args = [])
 * @phpstan-method \Aws\Result addFlowOutputs(array{
 *     FlowArn?: string,
 *     Outputs?: list<array{
 *         CidrAllowList?: list<string>,
 *         Description?: string,
 *         Destination?: string,
 *         Encryption?: array,
 *         MaxLatency?: int,
 *         MediaStreamOutputConfigurations?: list<array>,
 *         MinLatency?: int,
 *         Name?: string,
 *         Port?: int,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         RemoteId?: string,
 *         SenderControlPort?: int,
 *         SmoothingLatency?: int,
 *         StreamId?: string,
 *         VpcInterfaceAttachment?: array,
 *         OutputStatus?: 'DISABLED'|'ENABLED',
 *         NdiSpeedHqQuality?: int,
 *         NdiProgramName?: string,
 *         OutputTags?: array<string, string>,
 *         RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *         RouterIntegrationTransitEncryption?: array,
 *         NdiOutputTimecodeSource?: 'EMBEDDED_TIMECODE'|'UTC_SYSTEM_TIME',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addFlowOutputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addFlowOutputsAsync(array{
 *     FlowArn?: string,
 *     Outputs?: list<array{
 *         CidrAllowList?: list<string>,
 *         Description?: string,
 *         Destination?: string,
 *         Encryption?: array,
 *         MaxLatency?: int,
 *         MediaStreamOutputConfigurations?: list<array>,
 *         MinLatency?: int,
 *         Name?: string,
 *         Port?: int,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         RemoteId?: string,
 *         SenderControlPort?: int,
 *         SmoothingLatency?: int,
 *         StreamId?: string,
 *         VpcInterfaceAttachment?: array,
 *         OutputStatus?: 'DISABLED'|'ENABLED',
 *         NdiSpeedHqQuality?: int,
 *         NdiProgramName?: string,
 *         OutputTags?: array<string, string>,
 *         RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *         RouterIntegrationTransitEncryption?: array,
 *         NdiOutputTimecodeSource?: 'EMBEDDED_TIMECODE'|'UTC_SYSTEM_TIME',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addFlowSources(array $args = [])
 * @phpstan-method \Aws\Result addFlowSources(array{
 *     FlowArn?: string,
 *     Sources?: list<array{
 *         Decryption?: array,
 *         Description?: string,
 *         EntitlementArn?: string,
 *         IngestPort?: int,
 *         MaxBitrate?: int,
 *         MaxLatency?: int,
 *         MaxSyncBuffer?: int,
 *         MediaStreamSourceConfigurations?: list<array>,
 *         MinLatency?: int,
 *         Name?: string,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         SenderControlPort?: int,
 *         SenderIpAddress?: string,
 *         SourceListenerAddress?: string,
 *         SourceListenerPort?: int,
 *         StreamId?: string,
 *         VpcInterfaceName?: string,
 *         WhitelistCidr?: string,
 *         GatewayBridgeSource?: array,
 *         NdiSourceSettings?: array,
 *         SourceTags?: array<string, string>,
 *         RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *         RouterIntegrationTransitDecryption?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addFlowSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addFlowSourcesAsync(array{
 *     FlowArn?: string,
 *     Sources?: list<array{
 *         Decryption?: array,
 *         Description?: string,
 *         EntitlementArn?: string,
 *         IngestPort?: int,
 *         MaxBitrate?: int,
 *         MaxLatency?: int,
 *         MaxSyncBuffer?: int,
 *         MediaStreamSourceConfigurations?: list<array>,
 *         MinLatency?: int,
 *         Name?: string,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         SenderControlPort?: int,
 *         SenderIpAddress?: string,
 *         SourceListenerAddress?: string,
 *         SourceListenerPort?: int,
 *         StreamId?: string,
 *         VpcInterfaceName?: string,
 *         WhitelistCidr?: string,
 *         GatewayBridgeSource?: array,
 *         NdiSourceSettings?: array,
 *         SourceTags?: array<string, string>,
 *         RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *         RouterIntegrationTransitDecryption?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addFlowVpcInterfaces(array $args = [])
 * @phpstan-method \Aws\Result addFlowVpcInterfaces(array{
 *     FlowArn?: string,
 *     VpcInterfaces?: list<array{
 *         Name?: string,
 *         NetworkInterfaceType?: 'efa'|'ena',
 *         RoleArn?: string,
 *         SecurityGroupIds?: list<string>,
 *         SubnetId?: string,
 *         VpcInterfaceTags?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addFlowVpcInterfacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addFlowVpcInterfacesAsync(array{
 *     FlowArn?: string,
 *     VpcInterfaces?: list<array{
 *         Name?: string,
 *         NetworkInterfaceType?: 'efa'|'ena',
 *         RoleArn?: string,
 *         SecurityGroupIds?: list<string>,
 *         SubnetId?: string,
 *         VpcInterfaceTags?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetRouterInput(array $args = [])
 * @phpstan-method \Aws\Result batchGetRouterInput(array{Arns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetRouterInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetRouterInputAsync(array{Arns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetRouterNetworkInterface(array $args = [])
 * @phpstan-method \Aws\Result batchGetRouterNetworkInterface(array{Arns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetRouterNetworkInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetRouterNetworkInterfaceAsync(array{Arns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetRouterOutput(array $args = [])
 * @phpstan-method \Aws\Result batchGetRouterOutput(array{Arns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetRouterOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetRouterOutputAsync(array{Arns?: list<string>, ...} $args = [])
 * @method \Aws\Result createBridge(array $args = [])
 * @phpstan-method \Aws\Result createBridge(array{
 *     EgressGatewayBridge?: array{MaxBitrate?: int, ...},
 *     IngressGatewayBridge?: array{MaxBitrate?: int, MaxOutputs?: int, ...},
 *     Name?: string,
 *     Outputs?: list<array{NetworkOutput?: array, ...}>,
 *     PlacementArn?: string,
 *     SourceFailoverConfig?: array{
 *         FailoverMode?: 'FAILOVER'|'MERGE',
 *         RecoveryWindow?: int,
 *         SourcePriority?: array{PrimarySource?: string, ...},
 *         State?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     Sources?: list<array{FlowSource?: array, NetworkSource?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBridgeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBridgeAsync(array{
 *     EgressGatewayBridge?: array{MaxBitrate?: int, ...},
 *     IngressGatewayBridge?: array{MaxBitrate?: int, MaxOutputs?: int, ...},
 *     Name?: string,
 *     Outputs?: list<array{NetworkOutput?: array, ...}>,
 *     PlacementArn?: string,
 *     SourceFailoverConfig?: array{
 *         FailoverMode?: 'FAILOVER'|'MERGE',
 *         RecoveryWindow?: int,
 *         SourcePriority?: array{PrimarySource?: string, ...},
 *         State?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     Sources?: list<array{FlowSource?: array, NetworkSource?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFlow(array $args = [])
 * @phpstan-method \Aws\Result createFlow(array{
 *     AvailabilityZone?: string,
 *     Entitlements?: list<array{
 *         DataTransferSubscriberFeePercent?: int,
 *         Description?: string,
 *         Encryption?: array,
 *         EntitlementStatus?: 'DISABLED'|'ENABLED',
 *         Name?: string,
 *         Subscribers?: list<string>,
 *         EntitlementTags?: array<string, string>,
 *         ...,
 *     }>,
 *     MediaStreams?: list<array{
 *         Attributes?: array,
 *         ClockRate?: int,
 *         Description?: string,
 *         MediaStreamId?: int,
 *         MediaStreamName?: string,
 *         MediaStreamType?: 'ancillary-data'|'audio'|'video',
 *         VideoFormat?: string,
 *         MediaStreamTags?: array<string, string>,
 *         ...,
 *     }>,
 *     Name?: string,
 *     Outputs?: list<array{
 *         CidrAllowList?: list<string>,
 *         Description?: string,
 *         Destination?: string,
 *         Encryption?: array,
 *         MaxLatency?: int,
 *         MediaStreamOutputConfigurations?: list<array>,
 *         MinLatency?: int,
 *         Name?: string,
 *         Port?: int,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         RemoteId?: string,
 *         SenderControlPort?: int,
 *         SmoothingLatency?: int,
 *         StreamId?: string,
 *         VpcInterfaceAttachment?: array,
 *         OutputStatus?: 'DISABLED'|'ENABLED',
 *         NdiSpeedHqQuality?: int,
 *         NdiProgramName?: string,
 *         OutputTags?: array<string, string>,
 *         RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *         RouterIntegrationTransitEncryption?: array,
 *         NdiOutputTimecodeSource?: 'EMBEDDED_TIMECODE'|'UTC_SYSTEM_TIME',
 *         ...,
 *     }>,
 *     Source?: array{
 *         Decryption?: array{
 *             Algorithm?: 'aes128'|'aes192'|'aes256',
 *             ConstantInitializationVector?: string,
 *             DeviceId?: string,
 *             KeyType?: 'speke'|'srt-password'|'static-key',
 *             Region?: string,
 *             ResourceId?: string,
 *             RoleArn?: string,
 *             SecretArn?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         Description?: string,
 *         EntitlementArn?: string,
 *         IngestPort?: int,
 *         MaxBitrate?: int,
 *         MaxLatency?: int,
 *         MaxSyncBuffer?: int,
 *         MediaStreamSourceConfigurations?: list<array>,
 *         MinLatency?: int,
 *         Name?: string,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         SenderControlPort?: int,
 *         SenderIpAddress?: string,
 *         SourceListenerAddress?: string,
 *         SourceListenerPort?: int,
 *         StreamId?: string,
 *         VpcInterfaceName?: string,
 *         WhitelistCidr?: string,
 *         GatewayBridgeSource?: array{BridgeArn?: string, VpcInterfaceAttachment?: array, ...},
 *         NdiSourceSettings?: array{SourceName?: string, ...},
 *         SourceTags?: array<string, string>,
 *         RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *         RouterIntegrationTransitDecryption?: array{EncryptionKeyType?: 'AUTOMATIC'|'SECRETS_MANAGER', EncryptionKeyConfiguration?: array, ...},
 *         ...,
 *     },
 *     SourceFailoverConfig?: array{
 *         FailoverMode?: 'FAILOVER'|'MERGE',
 *         RecoveryWindow?: int,
 *         SourcePriority?: array{PrimarySource?: string, ...},
 *         State?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     Sources?: list<array{
 *         Decryption?: array,
 *         Description?: string,
 *         EntitlementArn?: string,
 *         IngestPort?: int,
 *         MaxBitrate?: int,
 *         MaxLatency?: int,
 *         MaxSyncBuffer?: int,
 *         MediaStreamSourceConfigurations?: list<array>,
 *         MinLatency?: int,
 *         Name?: string,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         SenderControlPort?: int,
 *         SenderIpAddress?: string,
 *         SourceListenerAddress?: string,
 *         SourceListenerPort?: int,
 *         StreamId?: string,
 *         VpcInterfaceName?: string,
 *         WhitelistCidr?: string,
 *         GatewayBridgeSource?: array,
 *         NdiSourceSettings?: array,
 *         SourceTags?: array<string, string>,
 *         RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *         RouterIntegrationTransitDecryption?: array,
 *         ...,
 *     }>,
 *     VpcInterfaces?: list<array{
 *         Name?: string,
 *         NetworkInterfaceType?: 'efa'|'ena',
 *         RoleArn?: string,
 *         SecurityGroupIds?: list<string>,
 *         SubnetId?: string,
 *         VpcInterfaceTags?: array<string, string>,
 *         ...,
 *     }>,
 *     Maintenance?: array{
 *         MaintenanceDay?: 'Friday'|'Monday'|'Saturday'|'Sunday'|'Thursday'|'Tuesday'|'Wednesday',
 *         MaintenanceStartHour?: string,
 *         ...,
 *     },
 *     SourceMonitoringConfig?: array{
 *         ThumbnailState?: 'DISABLED'|'ENABLED',
 *         AudioMonitoringSettings?: list<array>,
 *         ContentQualityAnalysisState?: 'DISABLED'|'ENABLED',
 *         VideoMonitoringSettings?: list<array>,
 *         ...,
 *     },
 *     FlowSize?: 'LARGE'|'LARGE_4X'|'MEDIUM',
 *     NdiConfig?: array{NdiState?: 'DISABLED'|'ENABLED', MachineName?: string, NdiDiscoveryServers?: list<array>, ...},
 *     EncodingConfig?: array{EncodingProfile?: 'CONTRIBUTION_H264_DEFAULT'|'DISTRIBUTION_H264_DEFAULT', VideoMaxBitrate?: int, ...},
 *     FlowTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFlowAsync(array{
 *     AvailabilityZone?: string,
 *     Entitlements?: list<array{
 *         DataTransferSubscriberFeePercent?: int,
 *         Description?: string,
 *         Encryption?: array,
 *         EntitlementStatus?: 'DISABLED'|'ENABLED',
 *         Name?: string,
 *         Subscribers?: list<string>,
 *         EntitlementTags?: array<string, string>,
 *         ...,
 *     }>,
 *     MediaStreams?: list<array{
 *         Attributes?: array,
 *         ClockRate?: int,
 *         Description?: string,
 *         MediaStreamId?: int,
 *         MediaStreamName?: string,
 *         MediaStreamType?: 'ancillary-data'|'audio'|'video',
 *         VideoFormat?: string,
 *         MediaStreamTags?: array<string, string>,
 *         ...,
 *     }>,
 *     Name?: string,
 *     Outputs?: list<array{
 *         CidrAllowList?: list<string>,
 *         Description?: string,
 *         Destination?: string,
 *         Encryption?: array,
 *         MaxLatency?: int,
 *         MediaStreamOutputConfigurations?: list<array>,
 *         MinLatency?: int,
 *         Name?: string,
 *         Port?: int,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         RemoteId?: string,
 *         SenderControlPort?: int,
 *         SmoothingLatency?: int,
 *         StreamId?: string,
 *         VpcInterfaceAttachment?: array,
 *         OutputStatus?: 'DISABLED'|'ENABLED',
 *         NdiSpeedHqQuality?: int,
 *         NdiProgramName?: string,
 *         OutputTags?: array<string, string>,
 *         RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *         RouterIntegrationTransitEncryption?: array,
 *         NdiOutputTimecodeSource?: 'EMBEDDED_TIMECODE'|'UTC_SYSTEM_TIME',
 *         ...,
 *     }>,
 *     Source?: array{
 *         Decryption?: array{
 *             Algorithm?: 'aes128'|'aes192'|'aes256',
 *             ConstantInitializationVector?: string,
 *             DeviceId?: string,
 *             KeyType?: 'speke'|'srt-password'|'static-key',
 *             Region?: string,
 *             ResourceId?: string,
 *             RoleArn?: string,
 *             SecretArn?: string,
 *             Url?: string,
 *             ...,
 *         },
 *         Description?: string,
 *         EntitlementArn?: string,
 *         IngestPort?: int,
 *         MaxBitrate?: int,
 *         MaxLatency?: int,
 *         MaxSyncBuffer?: int,
 *         MediaStreamSourceConfigurations?: list<array>,
 *         MinLatency?: int,
 *         Name?: string,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         SenderControlPort?: int,
 *         SenderIpAddress?: string,
 *         SourceListenerAddress?: string,
 *         SourceListenerPort?: int,
 *         StreamId?: string,
 *         VpcInterfaceName?: string,
 *         WhitelistCidr?: string,
 *         GatewayBridgeSource?: array{BridgeArn?: string, VpcInterfaceAttachment?: array, ...},
 *         NdiSourceSettings?: array{SourceName?: string, ...},
 *         SourceTags?: array<string, string>,
 *         RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *         RouterIntegrationTransitDecryption?: array{EncryptionKeyType?: 'AUTOMATIC'|'SECRETS_MANAGER', EncryptionKeyConfiguration?: array, ...},
 *         ...,
 *     },
 *     SourceFailoverConfig?: array{
 *         FailoverMode?: 'FAILOVER'|'MERGE',
 *         RecoveryWindow?: int,
 *         SourcePriority?: array{PrimarySource?: string, ...},
 *         State?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     Sources?: list<array{
 *         Decryption?: array,
 *         Description?: string,
 *         EntitlementArn?: string,
 *         IngestPort?: int,
 *         MaxBitrate?: int,
 *         MaxLatency?: int,
 *         MaxSyncBuffer?: int,
 *         MediaStreamSourceConfigurations?: list<array>,
 *         MinLatency?: int,
 *         Name?: string,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         SenderControlPort?: int,
 *         SenderIpAddress?: string,
 *         SourceListenerAddress?: string,
 *         SourceListenerPort?: int,
 *         StreamId?: string,
 *         VpcInterfaceName?: string,
 *         WhitelistCidr?: string,
 *         GatewayBridgeSource?: array,
 *         NdiSourceSettings?: array,
 *         SourceTags?: array<string, string>,
 *         RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *         RouterIntegrationTransitDecryption?: array,
 *         ...,
 *     }>,
 *     VpcInterfaces?: list<array{
 *         Name?: string,
 *         NetworkInterfaceType?: 'efa'|'ena',
 *         RoleArn?: string,
 *         SecurityGroupIds?: list<string>,
 *         SubnetId?: string,
 *         VpcInterfaceTags?: array<string, string>,
 *         ...,
 *     }>,
 *     Maintenance?: array{
 *         MaintenanceDay?: 'Friday'|'Monday'|'Saturday'|'Sunday'|'Thursday'|'Tuesday'|'Wednesday',
 *         MaintenanceStartHour?: string,
 *         ...,
 *     },
 *     SourceMonitoringConfig?: array{
 *         ThumbnailState?: 'DISABLED'|'ENABLED',
 *         AudioMonitoringSettings?: list<array>,
 *         ContentQualityAnalysisState?: 'DISABLED'|'ENABLED',
 *         VideoMonitoringSettings?: list<array>,
 *         ...,
 *     },
 *     FlowSize?: 'LARGE'|'LARGE_4X'|'MEDIUM',
 *     NdiConfig?: array{NdiState?: 'DISABLED'|'ENABLED', MachineName?: string, NdiDiscoveryServers?: list<array>, ...},
 *     EncodingConfig?: array{EncodingProfile?: 'CONTRIBUTION_H264_DEFAULT'|'DISTRIBUTION_H264_DEFAULT', VideoMaxBitrate?: int, ...},
 *     FlowTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGateway(array $args = [])
 * @phpstan-method \Aws\Result createGateway(array{
 *     EgressCidrBlocks?: list<string>,
 *     Name?: string,
 *     Networks?: list<array{CidrBlock?: string, Name?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGatewayAsync(array{
 *     EgressCidrBlocks?: list<string>,
 *     Name?: string,
 *     Networks?: list<array{CidrBlock?: string, Name?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRouterInput(array $args = [])
 * @phpstan-method \Aws\Result createRouterInput(array{
 *     Name?: string,
 *     Configuration?: array{
 *         Standard?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfiguration?: array,
 *             Protocol?: 'RIST'|'RTP'|'SRT_CALLER'|'SRT_LISTENER',
 *             ...,
 *         },
 *         MediaLiveChannel?: array{
 *             MediaLiveChannelArn?: string,
 *             MediaLivePipelineId?: 'PIPELINE_0'|'PIPELINE_1',
 *             MediaLiveChannelOutputName?: string,
 *             SourceTransitDecryption?: array,
 *             ...,
 *         },
 *         Failover?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfigurations?: list<array>,
 *             SourcePriorityMode?: 'NO_PRIORITY'|'PRIMARY_SECONDARY',
 *             PrimarySourceIndex?: int,
 *             ...,
 *         },
 *         MediaConnectFlow?: array{FlowArn?: string, FlowOutputArn?: string, SourceTransitDecryption?: array, ...},
 *         Merge?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfigurations?: list<array>,
 *             MergeRecoveryWindowMilliseconds?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaximumBitrate?: int,
 *     RoutingScope?: 'GLOBAL'|'REGIONAL',
 *     Tier?: 'INPUT_100'|'INPUT_20'|'INPUT_50',
 *     RegionName?: string,
 *     AvailabilityZone?: string,
 *     TransitEncryption?: array{
 *         EncryptionKeyType?: 'AUTOMATIC'|'SECRETS_MANAGER',
 *         EncryptionKeyConfiguration?: array{SecretsManager?: array, Automatic?: array, ...},
 *         ...,
 *     },
 *     MaintenanceConfiguration?: array{
 *         PreferredDayTime?: array{Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY', Time?: string, ...},
 *         Default?: array,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ContentQualityAnalysisConfiguration?: array{ContentLevel?: array{BlackFrames?: array, FrozenFrames?: array, SilentAudio?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRouterInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRouterInputAsync(array{
 *     Name?: string,
 *     Configuration?: array{
 *         Standard?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfiguration?: array,
 *             Protocol?: 'RIST'|'RTP'|'SRT_CALLER'|'SRT_LISTENER',
 *             ...,
 *         },
 *         MediaLiveChannel?: array{
 *             MediaLiveChannelArn?: string,
 *             MediaLivePipelineId?: 'PIPELINE_0'|'PIPELINE_1',
 *             MediaLiveChannelOutputName?: string,
 *             SourceTransitDecryption?: array,
 *             ...,
 *         },
 *         Failover?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfigurations?: list<array>,
 *             SourcePriorityMode?: 'NO_PRIORITY'|'PRIMARY_SECONDARY',
 *             PrimarySourceIndex?: int,
 *             ...,
 *         },
 *         MediaConnectFlow?: array{FlowArn?: string, FlowOutputArn?: string, SourceTransitDecryption?: array, ...},
 *         Merge?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfigurations?: list<array>,
 *             MergeRecoveryWindowMilliseconds?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaximumBitrate?: int,
 *     RoutingScope?: 'GLOBAL'|'REGIONAL',
 *     Tier?: 'INPUT_100'|'INPUT_20'|'INPUT_50',
 *     RegionName?: string,
 *     AvailabilityZone?: string,
 *     TransitEncryption?: array{
 *         EncryptionKeyType?: 'AUTOMATIC'|'SECRETS_MANAGER',
 *         EncryptionKeyConfiguration?: array{SecretsManager?: array, Automatic?: array, ...},
 *         ...,
 *     },
 *     MaintenanceConfiguration?: array{
 *         PreferredDayTime?: array{Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY', Time?: string, ...},
 *         Default?: array,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ContentQualityAnalysisConfiguration?: array{ContentLevel?: array{BlackFrames?: array, FrozenFrames?: array, SilentAudio?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRouterNetworkInterface(array $args = [])
 * @phpstan-method \Aws\Result createRouterNetworkInterface(array{
 *     Name?: string,
 *     Configuration?: array{
 *         Public?: array{AllowRules?: list<array>, ...},
 *         Vpc?: array{SecurityGroupIds?: list<string>, SubnetId?: string, ...},
 *         ...,
 *     },
 *     RegionName?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRouterNetworkInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRouterNetworkInterfaceAsync(array{
 *     Name?: string,
 *     Configuration?: array{
 *         Public?: array{AllowRules?: list<array>, ...},
 *         Vpc?: array{SecurityGroupIds?: list<string>, SubnetId?: string, ...},
 *         ...,
 *     },
 *     RegionName?: string,
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRouterOutput(array $args = [])
 * @phpstan-method \Aws\Result createRouterOutput(array{
 *     Name?: string,
 *     Configuration?: array{
 *         Standard?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfiguration?: array,
 *             Protocol?: 'RIST'|'RTP'|'SRT_CALLER'|'SRT_LISTENER',
 *             ...,
 *         },
 *         MediaConnectFlow?: array{FlowArn?: string, FlowSourceArn?: string, DestinationTransitEncryption?: array, ...},
 *         MediaLiveInput?: array{
 *             MediaLiveInputArn?: string,
 *             MediaLivePipelineId?: 'PIPELINE_0'|'PIPELINE_1',
 *             DestinationTransitEncryption?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaximumBitrate?: int,
 *     RoutingScope?: 'GLOBAL'|'REGIONAL',
 *     Tier?: 'OUTPUT_100'|'OUTPUT_20'|'OUTPUT_50',
 *     RegionName?: string,
 *     AvailabilityZone?: string,
 *     MaintenanceConfiguration?: array{
 *         PreferredDayTime?: array{Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY', Time?: string, ...},
 *         Default?: array,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRouterOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRouterOutputAsync(array{
 *     Name?: string,
 *     Configuration?: array{
 *         Standard?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfiguration?: array,
 *             Protocol?: 'RIST'|'RTP'|'SRT_CALLER'|'SRT_LISTENER',
 *             ...,
 *         },
 *         MediaConnectFlow?: array{FlowArn?: string, FlowSourceArn?: string, DestinationTransitEncryption?: array, ...},
 *         MediaLiveInput?: array{
 *             MediaLiveInputArn?: string,
 *             MediaLivePipelineId?: 'PIPELINE_0'|'PIPELINE_1',
 *             DestinationTransitEncryption?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaximumBitrate?: int,
 *     RoutingScope?: 'GLOBAL'|'REGIONAL',
 *     Tier?: 'OUTPUT_100'|'OUTPUT_20'|'OUTPUT_50',
 *     RegionName?: string,
 *     AvailabilityZone?: string,
 *     MaintenanceConfiguration?: array{
 *         PreferredDayTime?: array{Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY', Time?: string, ...},
 *         Default?: array,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBridge(array $args = [])
 * @phpstan-method \Aws\Result deleteBridge(array{BridgeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBridgeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBridgeAsync(array{BridgeArn?: string, ...} $args = [])
 * @method \Aws\Result deleteFlow(array $args = [])
 * @phpstan-method \Aws\Result deleteFlow(array{FlowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFlowAsync(array{FlowArn?: string, ...} $args = [])
 * @method \Aws\Result deleteGateway(array $args = [])
 * @phpstan-method \Aws\Result deleteGateway(array{GatewayArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array{GatewayArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRouterInput(array $args = [])
 * @phpstan-method \Aws\Result deleteRouterInput(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRouterInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRouterInputAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteRouterNetworkInterface(array $args = [])
 * @phpstan-method \Aws\Result deleteRouterNetworkInterface(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRouterNetworkInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRouterNetworkInterfaceAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteRouterOutput(array $args = [])
 * @phpstan-method \Aws\Result deleteRouterOutput(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRouterOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRouterOutputAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deregisterGatewayInstance(array $args = [])
 * @phpstan-method \Aws\Result deregisterGatewayInstance(array{Force?: bool, GatewayInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterGatewayInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterGatewayInstanceAsync(array{Force?: bool, GatewayInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result describeBridge(array $args = [])
 * @phpstan-method \Aws\Result describeBridge(array{BridgeArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBridgeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBridgeAsync(array{BridgeArn?: string, ...} $args = [])
 * @method \Aws\Result describeFlow(array $args = [])
 * @phpstan-method \Aws\Result describeFlow(array{FlowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFlowAsync(array{FlowArn?: string, ...} $args = [])
 * @method \Aws\Result describeFlowSourceMetadata(array $args = [])
 * @phpstan-method \Aws\Result describeFlowSourceMetadata(array{FlowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlowSourceMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFlowSourceMetadataAsync(array{FlowArn?: string, ...} $args = [])
 * @method \Aws\Result describeFlowSourceThumbnail(array $args = [])
 * @phpstan-method \Aws\Result describeFlowSourceThumbnail(array{FlowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlowSourceThumbnailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFlowSourceThumbnailAsync(array{FlowArn?: string, ...} $args = [])
 * @method \Aws\Result describeGateway(array $args = [])
 * @phpstan-method \Aws\Result describeGateway(array{GatewayArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGatewayAsync(array{GatewayArn?: string, ...} $args = [])
 * @method \Aws\Result describeGatewayInstance(array $args = [])
 * @phpstan-method \Aws\Result describeGatewayInstance(array{GatewayInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGatewayInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGatewayInstanceAsync(array{GatewayInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result describeOffering(array $args = [])
 * @phpstan-method \Aws\Result describeOffering(array{OfferingArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOfferingAsync(array{OfferingArn?: string, ...} $args = [])
 * @method \Aws\Result describeReservation(array $args = [])
 * @phpstan-method \Aws\Result describeReservation(array{ReservationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservationAsync(array{ReservationArn?: string, ...} $args = [])
 * @method \Aws\Result getRouterInput(array $args = [])
 * @phpstan-method \Aws\Result getRouterInput(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouterInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRouterInputAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getRouterInputSourceMetadata(array $args = [])
 * @phpstan-method \Aws\Result getRouterInputSourceMetadata(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouterInputSourceMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRouterInputSourceMetadataAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getRouterInputThumbnail(array $args = [])
 * @phpstan-method \Aws\Result getRouterInputThumbnail(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouterInputThumbnailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRouterInputThumbnailAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getRouterNetworkInterface(array $args = [])
 * @phpstan-method \Aws\Result getRouterNetworkInterface(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouterNetworkInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRouterNetworkInterfaceAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getRouterOutput(array $args = [])
 * @phpstan-method \Aws\Result getRouterOutput(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRouterOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRouterOutputAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result grantFlowEntitlements(array $args = [])
 * @phpstan-method \Aws\Result grantFlowEntitlements(array{
 *     Entitlements?: list<array{
 *         DataTransferSubscriberFeePercent?: int,
 *         Description?: string,
 *         Encryption?: array,
 *         EntitlementStatus?: 'DISABLED'|'ENABLED',
 *         Name?: string,
 *         Subscribers?: list<string>,
 *         EntitlementTags?: array<string, string>,
 *         ...,
 *     }>,
 *     FlowArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise grantFlowEntitlementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise grantFlowEntitlementsAsync(array{
 *     Entitlements?: list<array{
 *         DataTransferSubscriberFeePercent?: int,
 *         Description?: string,
 *         Encryption?: array,
 *         EntitlementStatus?: 'DISABLED'|'ENABLED',
 *         Name?: string,
 *         Subscribers?: list<string>,
 *         EntitlementTags?: array<string, string>,
 *         ...,
 *     }>,
 *     FlowArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBridges(array $args = [])
 * @phpstan-method \Aws\Result listBridges(array{FilterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBridgesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBridgesAsync(array{FilterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listEntitlements(array $args = [])
 * @phpstan-method \Aws\Result listEntitlements(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitlementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntitlementsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFlows(array $args = [])
 * @phpstan-method \Aws\Result listFlows(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGatewayInstances(array $args = [])
 * @phpstan-method \Aws\Result listGatewayInstances(array{FilterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGatewayInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGatewayInstancesAsync(array{FilterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGateways(array $args = [])
 * @phpstan-method \Aws\Result listGateways(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGatewaysAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listOfferings(array $args = [])
 * @phpstan-method \Aws\Result listOfferings(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOfferingsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listReservations(array $args = [])
 * @phpstan-method \Aws\Result listReservations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReservationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReservationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRouterInputs(array $args = [])
 * @phpstan-method \Aws\Result listRouterInputs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         NameContains?: list<string>,
 *         RegionNames?: list<string>,
 *         NetworkInterfaceArns?: list<string>,
 *         RoutingScopes?: list<'GLOBAL'|'REGIONAL'>,
 *         InputTypes?: list<'FAILOVER'|'MEDIACONNECT_FLOW'|'MEDIALIVE_CHANNEL'|'MERGE'|'STANDARD'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRouterInputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRouterInputsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         NameContains?: list<string>,
 *         RegionNames?: list<string>,
 *         NetworkInterfaceArns?: list<string>,
 *         RoutingScopes?: list<'GLOBAL'|'REGIONAL'>,
 *         InputTypes?: list<'FAILOVER'|'MEDIACONNECT_FLOW'|'MEDIALIVE_CHANNEL'|'MERGE'|'STANDARD'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRouterNetworkInterfaces(array $args = [])
 * @phpstan-method \Aws\Result listRouterNetworkInterfaces(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         RegionNames?: list<string>,
 *         NetworkInterfaceTypes?: list<'PUBLIC'|'VPC'>,
 *         NameContains?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRouterNetworkInterfacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRouterNetworkInterfacesAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         RegionNames?: list<string>,
 *         NetworkInterfaceTypes?: list<'PUBLIC'|'VPC'>,
 *         NameContains?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRouterOutputs(array $args = [])
 * @phpstan-method \Aws\Result listRouterOutputs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         RegionNames?: list<string>,
 *         NetworkInterfaceArns?: list<string>,
 *         RoutingScopes?: list<'GLOBAL'|'REGIONAL'>,
 *         OutputTypes?: list<'MEDIACONNECT_FLOW'|'MEDIALIVE_INPUT'|'STANDARD'>,
 *         RoutedInputArns?: list<string>,
 *         NameContains?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRouterOutputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRouterOutputsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         RegionNames?: list<string>,
 *         NetworkInterfaceArns?: list<string>,
 *         RoutingScopes?: list<'GLOBAL'|'REGIONAL'>,
 *         OutputTypes?: list<'MEDIACONNECT_FLOW'|'MEDIALIVE_INPUT'|'STANDARD'>,
 *         RoutedInputArns?: list<string>,
 *         NameContains?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForGlobalResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForGlobalResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForGlobalResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForGlobalResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result purchaseOffering(array $args = [])
 * @phpstan-method \Aws\Result purchaseOffering(array{OfferingArn?: string, ReservationName?: string, Start?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purchaseOfferingAsync(array{OfferingArn?: string, ReservationName?: string, Start?: string, ...} $args = [])
 * @method \Aws\Result removeBridgeOutput(array $args = [])
 * @phpstan-method \Aws\Result removeBridgeOutput(array{BridgeArn?: string, OutputName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeBridgeOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeBridgeOutputAsync(array{BridgeArn?: string, OutputName?: string, ...} $args = [])
 * @method \Aws\Result removeBridgeSource(array $args = [])
 * @phpstan-method \Aws\Result removeBridgeSource(array{BridgeArn?: string, SourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeBridgeSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeBridgeSourceAsync(array{BridgeArn?: string, SourceName?: string, ...} $args = [])
 * @method \Aws\Result removeFlowMediaStream(array $args = [])
 * @phpstan-method \Aws\Result removeFlowMediaStream(array{FlowArn?: string, MediaStreamName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeFlowMediaStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeFlowMediaStreamAsync(array{FlowArn?: string, MediaStreamName?: string, ...} $args = [])
 * @method \Aws\Result removeFlowOutput(array $args = [])
 * @phpstan-method \Aws\Result removeFlowOutput(array{FlowArn?: string, OutputArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeFlowOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeFlowOutputAsync(array{FlowArn?: string, OutputArn?: string, ...} $args = [])
 * @method \Aws\Result removeFlowSource(array $args = [])
 * @phpstan-method \Aws\Result removeFlowSource(array{FlowArn?: string, SourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeFlowSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeFlowSourceAsync(array{FlowArn?: string, SourceArn?: string, ...} $args = [])
 * @method \Aws\Result removeFlowVpcInterface(array $args = [])
 * @phpstan-method \Aws\Result removeFlowVpcInterface(array{FlowArn?: string, VpcInterfaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeFlowVpcInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeFlowVpcInterfaceAsync(array{FlowArn?: string, VpcInterfaceName?: string, ...} $args = [])
 * @method \Aws\Result restartRouterInput(array $args = [])
 * @phpstan-method \Aws\Result restartRouterInput(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restartRouterInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restartRouterInputAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result restartRouterOutput(array $args = [])
 * @phpstan-method \Aws\Result restartRouterOutput(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restartRouterOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restartRouterOutputAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result revokeFlowEntitlement(array $args = [])
 * @phpstan-method \Aws\Result revokeFlowEntitlement(array{EntitlementArn?: string, FlowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeFlowEntitlementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeFlowEntitlementAsync(array{EntitlementArn?: string, FlowArn?: string, ...} $args = [])
 * @method \Aws\Result startFlow(array $args = [])
 * @phpstan-method \Aws\Result startFlow(array{FlowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFlowAsync(array{FlowArn?: string, ...} $args = [])
 * @method \Aws\Result startRouterInput(array $args = [])
 * @phpstan-method \Aws\Result startRouterInput(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startRouterInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRouterInputAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result startRouterOutput(array $args = [])
 * @phpstan-method \Aws\Result startRouterOutput(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startRouterOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRouterOutputAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result stopFlow(array $args = [])
 * @phpstan-method \Aws\Result stopFlow(array{FlowArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopFlowAsync(array{FlowArn?: string, ...} $args = [])
 * @method \Aws\Result stopRouterInput(array $args = [])
 * @phpstan-method \Aws\Result stopRouterInput(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRouterInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopRouterInputAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result stopRouterOutput(array $args = [])
 * @phpstan-method \Aws\Result stopRouterOutput(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRouterOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopRouterOutputAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result tagGlobalResource(array $args = [])
 * @phpstan-method \Aws\Result tagGlobalResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagGlobalResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagGlobalResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result takeRouterInput(array $args = [])
 * @phpstan-method \Aws\Result takeRouterInput(array{RouterOutputArn?: string, RouterInputArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise takeRouterInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise takeRouterInputAsync(array{RouterOutputArn?: string, RouterInputArn?: string, ...} $args = [])
 * @method \Aws\Result untagGlobalResource(array $args = [])
 * @phpstan-method \Aws\Result untagGlobalResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagGlobalResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagGlobalResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBridge(array $args = [])
 * @phpstan-method \Aws\Result updateBridge(array{
 *     BridgeArn?: string,
 *     EgressGatewayBridge?: array{MaxBitrate?: int, ...},
 *     IngressGatewayBridge?: array{MaxBitrate?: int, MaxOutputs?: int, ...},
 *     SourceFailoverConfig?: array{
 *         FailoverMode?: 'FAILOVER'|'MERGE',
 *         RecoveryWindow?: int,
 *         SourcePriority?: array{PrimarySource?: string, ...},
 *         State?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBridgeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBridgeAsync(array{
 *     BridgeArn?: string,
 *     EgressGatewayBridge?: array{MaxBitrate?: int, ...},
 *     IngressGatewayBridge?: array{MaxBitrate?: int, MaxOutputs?: int, ...},
 *     SourceFailoverConfig?: array{
 *         FailoverMode?: 'FAILOVER'|'MERGE',
 *         RecoveryWindow?: int,
 *         SourcePriority?: array{PrimarySource?: string, ...},
 *         State?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBridgeOutput(array $args = [])
 * @phpstan-method \Aws\Result updateBridgeOutput(array{
 *     BridgeArn?: string,
 *     NetworkOutput?: array{
 *         IpAddress?: string,
 *         NetworkName?: string,
 *         Port?: int,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         Ttl?: int,
 *         ...,
 *     },
 *     OutputName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBridgeOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBridgeOutputAsync(array{
 *     BridgeArn?: string,
 *     NetworkOutput?: array{
 *         IpAddress?: string,
 *         NetworkName?: string,
 *         Port?: int,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         Ttl?: int,
 *         ...,
 *     },
 *     OutputName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBridgeSource(array $args = [])
 * @phpstan-method \Aws\Result updateBridgeSource(array{
 *     BridgeArn?: string,
 *     FlowSource?: array{FlowArn?: string, FlowVpcInterfaceAttachment?: array{VpcInterfaceName?: string, ...}, ...},
 *     NetworkSource?: array{
 *         MulticastIp?: string,
 *         MulticastSourceSettings?: array{MulticastSourceIp?: string, ...},
 *         NetworkName?: string,
 *         Port?: int,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         ...,
 *     },
 *     SourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBridgeSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBridgeSourceAsync(array{
 *     BridgeArn?: string,
 *     FlowSource?: array{FlowArn?: string, FlowVpcInterfaceAttachment?: array{VpcInterfaceName?: string, ...}, ...},
 *     NetworkSource?: array{
 *         MulticastIp?: string,
 *         MulticastSourceSettings?: array{MulticastSourceIp?: string, ...},
 *         NetworkName?: string,
 *         Port?: int,
 *         Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *         ...,
 *     },
 *     SourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBridgeState(array $args = [])
 * @phpstan-method \Aws\Result updateBridgeState(array{BridgeArn?: string, DesiredState?: 'ACTIVE'|'DELETED'|'STANDBY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBridgeStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBridgeStateAsync(array{BridgeArn?: string, DesiredState?: 'ACTIVE'|'DELETED'|'STANDBY', ...} $args = [])
 * @method \Aws\Result updateFlow(array $args = [])
 * @phpstan-method \Aws\Result updateFlow(array{
 *     FlowArn?: string,
 *     SourceFailoverConfig?: array{
 *         FailoverMode?: 'FAILOVER'|'MERGE',
 *         RecoveryWindow?: int,
 *         SourcePriority?: array{PrimarySource?: string, ...},
 *         State?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     Maintenance?: array{
 *         MaintenanceDay?: 'Friday'|'Monday'|'Saturday'|'Sunday'|'Thursday'|'Tuesday'|'Wednesday',
 *         MaintenanceScheduledDate?: string,
 *         MaintenanceStartHour?: string,
 *         ...,
 *     },
 *     SourceMonitoringConfig?: array{
 *         ThumbnailState?: 'DISABLED'|'ENABLED',
 *         AudioMonitoringSettings?: list<array>,
 *         ContentQualityAnalysisState?: 'DISABLED'|'ENABLED',
 *         VideoMonitoringSettings?: list<array>,
 *         ...,
 *     },
 *     NdiConfig?: array{NdiState?: 'DISABLED'|'ENABLED', MachineName?: string, NdiDiscoveryServers?: list<array>, ...},
 *     FlowSize?: 'LARGE'|'LARGE_4X'|'MEDIUM',
 *     EncodingConfig?: array{EncodingProfile?: 'CONTRIBUTION_H264_DEFAULT'|'DISTRIBUTION_H264_DEFAULT', VideoMaxBitrate?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowAsync(array{
 *     FlowArn?: string,
 *     SourceFailoverConfig?: array{
 *         FailoverMode?: 'FAILOVER'|'MERGE',
 *         RecoveryWindow?: int,
 *         SourcePriority?: array{PrimarySource?: string, ...},
 *         State?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     Maintenance?: array{
 *         MaintenanceDay?: 'Friday'|'Monday'|'Saturday'|'Sunday'|'Thursday'|'Tuesday'|'Wednesday',
 *         MaintenanceScheduledDate?: string,
 *         MaintenanceStartHour?: string,
 *         ...,
 *     },
 *     SourceMonitoringConfig?: array{
 *         ThumbnailState?: 'DISABLED'|'ENABLED',
 *         AudioMonitoringSettings?: list<array>,
 *         ContentQualityAnalysisState?: 'DISABLED'|'ENABLED',
 *         VideoMonitoringSettings?: list<array>,
 *         ...,
 *     },
 *     NdiConfig?: array{NdiState?: 'DISABLED'|'ENABLED', MachineName?: string, NdiDiscoveryServers?: list<array>, ...},
 *     FlowSize?: 'LARGE'|'LARGE_4X'|'MEDIUM',
 *     EncodingConfig?: array{EncodingProfile?: 'CONTRIBUTION_H264_DEFAULT'|'DISTRIBUTION_H264_DEFAULT', VideoMaxBitrate?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFlowEntitlement(array $args = [])
 * @phpstan-method \Aws\Result updateFlowEntitlement(array{
 *     Description?: string,
 *     Encryption?: array{
 *         Algorithm?: 'aes128'|'aes192'|'aes256',
 *         ConstantInitializationVector?: string,
 *         DeviceId?: string,
 *         KeyType?: 'speke'|'srt-password'|'static-key',
 *         Region?: string,
 *         ResourceId?: string,
 *         RoleArn?: string,
 *         SecretArn?: string,
 *         Url?: string,
 *         ...,
 *     },
 *     EntitlementArn?: string,
 *     EntitlementStatus?: 'DISABLED'|'ENABLED',
 *     FlowArn?: string,
 *     Subscribers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowEntitlementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowEntitlementAsync(array{
 *     Description?: string,
 *     Encryption?: array{
 *         Algorithm?: 'aes128'|'aes192'|'aes256',
 *         ConstantInitializationVector?: string,
 *         DeviceId?: string,
 *         KeyType?: 'speke'|'srt-password'|'static-key',
 *         Region?: string,
 *         ResourceId?: string,
 *         RoleArn?: string,
 *         SecretArn?: string,
 *         Url?: string,
 *         ...,
 *     },
 *     EntitlementArn?: string,
 *     EntitlementStatus?: 'DISABLED'|'ENABLED',
 *     FlowArn?: string,
 *     Subscribers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFlowMediaStream(array $args = [])
 * @phpstan-method \Aws\Result updateFlowMediaStream(array{
 *     Attributes?: array{
 *         Fmtp?: array{
 *             ChannelOrder?: string,
 *             Colorimetry?: 'BT2020'|'BT2100'|'BT601'|'BT709'|'ST2065-1'|'ST2065-3'|'XYZ',
 *             ExactFramerate?: string,
 *             Par?: string,
 *             Range?: 'FULL'|'FULLPROTECT'|'NARROW',
 *             ScanMode?: 'interlace'|'progressive'|'progressive-segmented-frame',
 *             Tcs?: 'BT2100LINHLG'|'BT2100LINPQ'|'DENSITY'|'HLG'|'LINEAR'|'PQ'|'SDR'|'ST2065-1'|'ST428-1',
 *             ...,
 *         },
 *         Lang?: string,
 *         ...,
 *     },
 *     ClockRate?: int,
 *     Description?: string,
 *     FlowArn?: string,
 *     MediaStreamName?: string,
 *     MediaStreamType?: 'ancillary-data'|'audio'|'video',
 *     VideoFormat?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowMediaStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowMediaStreamAsync(array{
 *     Attributes?: array{
 *         Fmtp?: array{
 *             ChannelOrder?: string,
 *             Colorimetry?: 'BT2020'|'BT2100'|'BT601'|'BT709'|'ST2065-1'|'ST2065-3'|'XYZ',
 *             ExactFramerate?: string,
 *             Par?: string,
 *             Range?: 'FULL'|'FULLPROTECT'|'NARROW',
 *             ScanMode?: 'interlace'|'progressive'|'progressive-segmented-frame',
 *             Tcs?: 'BT2100LINHLG'|'BT2100LINPQ'|'DENSITY'|'HLG'|'LINEAR'|'PQ'|'SDR'|'ST2065-1'|'ST428-1',
 *             ...,
 *         },
 *         Lang?: string,
 *         ...,
 *     },
 *     ClockRate?: int,
 *     Description?: string,
 *     FlowArn?: string,
 *     MediaStreamName?: string,
 *     MediaStreamType?: 'ancillary-data'|'audio'|'video',
 *     VideoFormat?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFlowOutput(array $args = [])
 * @phpstan-method \Aws\Result updateFlowOutput(array{
 *     CidrAllowList?: list<string>,
 *     Description?: string,
 *     Destination?: string,
 *     Encryption?: array{
 *         Algorithm?: 'aes128'|'aes192'|'aes256',
 *         ConstantInitializationVector?: string,
 *         DeviceId?: string,
 *         KeyType?: 'speke'|'srt-password'|'static-key',
 *         Region?: string,
 *         ResourceId?: string,
 *         RoleArn?: string,
 *         SecretArn?: string,
 *         Url?: string,
 *         ...,
 *     },
 *     FlowArn?: string,
 *     MaxLatency?: int,
 *     MediaStreamOutputConfigurations?: list<array{
 *         DestinationConfigurations?: list<array>,
 *         EncodingName?: 'jxsv'|'pcm'|'raw'|'smpte291',
 *         EncodingParameters?: array,
 *         MediaStreamName?: string,
 *         ...,
 *     }>,
 *     MinLatency?: int,
 *     OutputArn?: string,
 *     Port?: int,
 *     Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *     RemoteId?: string,
 *     SenderControlPort?: int,
 *     SenderIpAddress?: string,
 *     SmoothingLatency?: int,
 *     StreamId?: string,
 *     VpcInterfaceAttachment?: array{VpcInterfaceName?: string, ...},
 *     OutputStatus?: 'DISABLED'|'ENABLED',
 *     NdiProgramName?: string,
 *     NdiSpeedHqQuality?: int,
 *     RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *     RouterIntegrationTransitEncryption?: array{
 *         EncryptionKeyType?: 'AUTOMATIC'|'SECRETS_MANAGER',
 *         EncryptionKeyConfiguration?: array{SecretsManager?: array, Automatic?: array, ...},
 *         ...,
 *     },
 *     NdiOutputTimecodeSource?: 'EMBEDDED_TIMECODE'|'UTC_SYSTEM_TIME',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowOutputAsync(array{
 *     CidrAllowList?: list<string>,
 *     Description?: string,
 *     Destination?: string,
 *     Encryption?: array{
 *         Algorithm?: 'aes128'|'aes192'|'aes256',
 *         ConstantInitializationVector?: string,
 *         DeviceId?: string,
 *         KeyType?: 'speke'|'srt-password'|'static-key',
 *         Region?: string,
 *         ResourceId?: string,
 *         RoleArn?: string,
 *         SecretArn?: string,
 *         Url?: string,
 *         ...,
 *     },
 *     FlowArn?: string,
 *     MaxLatency?: int,
 *     MediaStreamOutputConfigurations?: list<array{
 *         DestinationConfigurations?: list<array>,
 *         EncodingName?: 'jxsv'|'pcm'|'raw'|'smpte291',
 *         EncodingParameters?: array,
 *         MediaStreamName?: string,
 *         ...,
 *     }>,
 *     MinLatency?: int,
 *     OutputArn?: string,
 *     Port?: int,
 *     Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *     RemoteId?: string,
 *     SenderControlPort?: int,
 *     SenderIpAddress?: string,
 *     SmoothingLatency?: int,
 *     StreamId?: string,
 *     VpcInterfaceAttachment?: array{VpcInterfaceName?: string, ...},
 *     OutputStatus?: 'DISABLED'|'ENABLED',
 *     NdiProgramName?: string,
 *     NdiSpeedHqQuality?: int,
 *     RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *     RouterIntegrationTransitEncryption?: array{
 *         EncryptionKeyType?: 'AUTOMATIC'|'SECRETS_MANAGER',
 *         EncryptionKeyConfiguration?: array{SecretsManager?: array, Automatic?: array, ...},
 *         ...,
 *     },
 *     NdiOutputTimecodeSource?: 'EMBEDDED_TIMECODE'|'UTC_SYSTEM_TIME',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFlowSource(array $args = [])
 * @phpstan-method \Aws\Result updateFlowSource(array{
 *     Decryption?: array{
 *         Algorithm?: 'aes128'|'aes192'|'aes256',
 *         ConstantInitializationVector?: string,
 *         DeviceId?: string,
 *         KeyType?: 'speke'|'srt-password'|'static-key',
 *         Region?: string,
 *         ResourceId?: string,
 *         RoleArn?: string,
 *         SecretArn?: string,
 *         Url?: string,
 *         ...,
 *     },
 *     Description?: string,
 *     EntitlementArn?: string,
 *     FlowArn?: string,
 *     IngestPort?: int,
 *     MaxBitrate?: int,
 *     MaxLatency?: int,
 *     MaxSyncBuffer?: int,
 *     MediaStreamSourceConfigurations?: list<array{
 *         EncodingName?: 'jxsv'|'pcm'|'raw'|'smpte291',
 *         InputConfigurations?: list<array>,
 *         MediaStreamName?: string,
 *         ...,
 *     }>,
 *     MinLatency?: int,
 *     Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *     SenderControlPort?: int,
 *     SenderIpAddress?: string,
 *     SourceArn?: string,
 *     SourceListenerAddress?: string,
 *     SourceListenerPort?: int,
 *     StreamId?: string,
 *     VpcInterfaceName?: string,
 *     WhitelistCidr?: string,
 *     GatewayBridgeSource?: array{BridgeArn?: string, VpcInterfaceAttachment?: array{VpcInterfaceName?: string, ...}, ...},
 *     NdiSourceSettings?: array{SourceName?: string, ...},
 *     RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *     RouterIntegrationTransitDecryption?: array{
 *         EncryptionKeyType?: 'AUTOMATIC'|'SECRETS_MANAGER',
 *         EncryptionKeyConfiguration?: array{SecretsManager?: array, Automatic?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowSourceAsync(array{
 *     Decryption?: array{
 *         Algorithm?: 'aes128'|'aes192'|'aes256',
 *         ConstantInitializationVector?: string,
 *         DeviceId?: string,
 *         KeyType?: 'speke'|'srt-password'|'static-key',
 *         Region?: string,
 *         ResourceId?: string,
 *         RoleArn?: string,
 *         SecretArn?: string,
 *         Url?: string,
 *         ...,
 *     },
 *     Description?: string,
 *     EntitlementArn?: string,
 *     FlowArn?: string,
 *     IngestPort?: int,
 *     MaxBitrate?: int,
 *     MaxLatency?: int,
 *     MaxSyncBuffer?: int,
 *     MediaStreamSourceConfigurations?: list<array{
 *         EncodingName?: 'jxsv'|'pcm'|'raw'|'smpte291',
 *         InputConfigurations?: list<array>,
 *         MediaStreamName?: string,
 *         ...,
 *     }>,
 *     MinLatency?: int,
 *     Protocol?: 'cdi'|'fujitsu-qos'|'ndi-speed-hq'|'rist'|'rtp'|'rtp-fec'|'srt-caller'|'srt-listener'|'st2110-jpegxs'|'udp'|'zixi-pull'|'zixi-push',
 *     SenderControlPort?: int,
 *     SenderIpAddress?: string,
 *     SourceArn?: string,
 *     SourceListenerAddress?: string,
 *     SourceListenerPort?: int,
 *     StreamId?: string,
 *     VpcInterfaceName?: string,
 *     WhitelistCidr?: string,
 *     GatewayBridgeSource?: array{BridgeArn?: string, VpcInterfaceAttachment?: array{VpcInterfaceName?: string, ...}, ...},
 *     NdiSourceSettings?: array{SourceName?: string, ...},
 *     RouterIntegrationState?: 'DISABLED'|'ENABLED',
 *     RouterIntegrationTransitDecryption?: array{
 *         EncryptionKeyType?: 'AUTOMATIC'|'SECRETS_MANAGER',
 *         EncryptionKeyConfiguration?: array{SecretsManager?: array, Automatic?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGatewayInstance(array $args = [])
 * @phpstan-method \Aws\Result updateGatewayInstance(array{BridgePlacement?: 'AVAILABLE'|'LOCKED', GatewayInstanceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewayInstanceAsync(array{BridgePlacement?: 'AVAILABLE'|'LOCKED', GatewayInstanceArn?: string, ...} $args = [])
 * @method \Aws\Result updateRouterInput(array $args = [])
 * @phpstan-method \Aws\Result updateRouterInput(array{
 *     Arn?: string,
 *     Name?: string,
 *     Configuration?: array{
 *         Standard?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfiguration?: array,
 *             Protocol?: 'RIST'|'RTP'|'SRT_CALLER'|'SRT_LISTENER',
 *             ...,
 *         },
 *         MediaLiveChannel?: array{
 *             MediaLiveChannelArn?: string,
 *             MediaLivePipelineId?: 'PIPELINE_0'|'PIPELINE_1',
 *             MediaLiveChannelOutputName?: string,
 *             SourceTransitDecryption?: array,
 *             ...,
 *         },
 *         Failover?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfigurations?: list<array>,
 *             SourcePriorityMode?: 'NO_PRIORITY'|'PRIMARY_SECONDARY',
 *             PrimarySourceIndex?: int,
 *             ...,
 *         },
 *         MediaConnectFlow?: array{FlowArn?: string, FlowOutputArn?: string, SourceTransitDecryption?: array, ...},
 *         Merge?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfigurations?: list<array>,
 *             MergeRecoveryWindowMilliseconds?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaximumBitrate?: int,
 *     RoutingScope?: 'GLOBAL'|'REGIONAL',
 *     Tier?: 'INPUT_100'|'INPUT_20'|'INPUT_50',
 *     TransitEncryption?: array{
 *         EncryptionKeyType?: 'AUTOMATIC'|'SECRETS_MANAGER',
 *         EncryptionKeyConfiguration?: array{SecretsManager?: array, Automatic?: array, ...},
 *         ...,
 *     },
 *     MaintenanceConfiguration?: array{
 *         PreferredDayTime?: array{Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY', Time?: string, ...},
 *         Default?: array,
 *         ...,
 *     },
 *     ContentQualityAnalysisConfiguration?: array{ContentLevel?: array{BlackFrames?: array, FrozenFrames?: array, SilentAudio?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRouterInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRouterInputAsync(array{
 *     Arn?: string,
 *     Name?: string,
 *     Configuration?: array{
 *         Standard?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfiguration?: array,
 *             Protocol?: 'RIST'|'RTP'|'SRT_CALLER'|'SRT_LISTENER',
 *             ...,
 *         },
 *         MediaLiveChannel?: array{
 *             MediaLiveChannelArn?: string,
 *             MediaLivePipelineId?: 'PIPELINE_0'|'PIPELINE_1',
 *             MediaLiveChannelOutputName?: string,
 *             SourceTransitDecryption?: array,
 *             ...,
 *         },
 *         Failover?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfigurations?: list<array>,
 *             SourcePriorityMode?: 'NO_PRIORITY'|'PRIMARY_SECONDARY',
 *             PrimarySourceIndex?: int,
 *             ...,
 *         },
 *         MediaConnectFlow?: array{FlowArn?: string, FlowOutputArn?: string, SourceTransitDecryption?: array, ...},
 *         Merge?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfigurations?: list<array>,
 *             MergeRecoveryWindowMilliseconds?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaximumBitrate?: int,
 *     RoutingScope?: 'GLOBAL'|'REGIONAL',
 *     Tier?: 'INPUT_100'|'INPUT_20'|'INPUT_50',
 *     TransitEncryption?: array{
 *         EncryptionKeyType?: 'AUTOMATIC'|'SECRETS_MANAGER',
 *         EncryptionKeyConfiguration?: array{SecretsManager?: array, Automatic?: array, ...},
 *         ...,
 *     },
 *     MaintenanceConfiguration?: array{
 *         PreferredDayTime?: array{Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY', Time?: string, ...},
 *         Default?: array,
 *         ...,
 *     },
 *     ContentQualityAnalysisConfiguration?: array{ContentLevel?: array{BlackFrames?: array, FrozenFrames?: array, SilentAudio?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRouterNetworkInterface(array $args = [])
 * @phpstan-method \Aws\Result updateRouterNetworkInterface(array{
 *     Arn?: string,
 *     Name?: string,
 *     Configuration?: array{
 *         Public?: array{AllowRules?: list<array>, ...},
 *         Vpc?: array{SecurityGroupIds?: list<string>, SubnetId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRouterNetworkInterfaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRouterNetworkInterfaceAsync(array{
 *     Arn?: string,
 *     Name?: string,
 *     Configuration?: array{
 *         Public?: array{AllowRules?: list<array>, ...},
 *         Vpc?: array{SecurityGroupIds?: list<string>, SubnetId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRouterOutput(array $args = [])
 * @phpstan-method \Aws\Result updateRouterOutput(array{
 *     Arn?: string,
 *     Name?: string,
 *     Configuration?: array{
 *         Standard?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfiguration?: array,
 *             Protocol?: 'RIST'|'RTP'|'SRT_CALLER'|'SRT_LISTENER',
 *             ...,
 *         },
 *         MediaConnectFlow?: array{FlowArn?: string, FlowSourceArn?: string, DestinationTransitEncryption?: array, ...},
 *         MediaLiveInput?: array{
 *             MediaLiveInputArn?: string,
 *             MediaLivePipelineId?: 'PIPELINE_0'|'PIPELINE_1',
 *             DestinationTransitEncryption?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaximumBitrate?: int,
 *     RoutingScope?: 'GLOBAL'|'REGIONAL',
 *     Tier?: 'OUTPUT_100'|'OUTPUT_20'|'OUTPUT_50',
 *     MaintenanceConfiguration?: array{
 *         PreferredDayTime?: array{Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY', Time?: string, ...},
 *         Default?: array,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRouterOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRouterOutputAsync(array{
 *     Arn?: string,
 *     Name?: string,
 *     Configuration?: array{
 *         Standard?: array{
 *             NetworkInterfaceArn?: string,
 *             ProtocolConfiguration?: array,
 *             Protocol?: 'RIST'|'RTP'|'SRT_CALLER'|'SRT_LISTENER',
 *             ...,
 *         },
 *         MediaConnectFlow?: array{FlowArn?: string, FlowSourceArn?: string, DestinationTransitEncryption?: array, ...},
 *         MediaLiveInput?: array{
 *             MediaLiveInputArn?: string,
 *             MediaLivePipelineId?: 'PIPELINE_0'|'PIPELINE_1',
 *             DestinationTransitEncryption?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     MaximumBitrate?: int,
 *     RoutingScope?: 'GLOBAL'|'REGIONAL',
 *     Tier?: 'OUTPUT_100'|'OUTPUT_20'|'OUTPUT_50',
 *     MaintenanceConfiguration?: array{
 *         PreferredDayTime?: array{Day?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY', Time?: string, ...},
 *         Default?: array,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class MediaConnectClient extends AwsClient {}
