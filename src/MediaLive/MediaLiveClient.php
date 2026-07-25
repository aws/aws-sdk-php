<?php
namespace Aws\MediaLive;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaLive** service.
 * @method \Aws\Result acceptInputDeviceTransfer(array $args = [])
 * @phpstan-method \Aws\Result acceptInputDeviceTransfer(array{InputDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptInputDeviceTransferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptInputDeviceTransferAsync(array{InputDeviceId?: string, ...} $args = [])
 * @method \Aws\Result batchDelete(array $args = [])
 * @phpstan-method \Aws\Result batchDelete(array{
 *     ChannelIds?: list<string>,
 *     InputIds?: list<string>,
 *     InputSecurityGroupIds?: list<string>,
 *     MultiplexIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteAsync(array{
 *     ChannelIds?: list<string>,
 *     InputIds?: list<string>,
 *     InputSecurityGroupIds?: list<string>,
 *     MultiplexIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchStart(array $args = [])
 * @phpstan-method \Aws\Result batchStart(array{ChannelIds?: list<string>, MultiplexIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchStartAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchStartAsync(array{ChannelIds?: list<string>, MultiplexIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchStop(array $args = [])
 * @phpstan-method \Aws\Result batchStop(array{ChannelIds?: list<string>, MultiplexIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchStopAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchStopAsync(array{ChannelIds?: list<string>, MultiplexIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchUpdateSchedule(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateSchedule(array{
 *     ChannelId?: string,
 *     Creates?: array{ScheduleActions?: list<array>, ...},
 *     Deletes?: array{ActionNames?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateScheduleAsync(array{
 *     ChannelId?: string,
 *     Creates?: array{ScheduleActions?: list<array>, ...},
 *     Deletes?: array{ActionNames?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelInputDeviceTransfer(array $args = [])
 * @phpstan-method \Aws\Result cancelInputDeviceTransfer(array{InputDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelInputDeviceTransferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelInputDeviceTransferAsync(array{InputDeviceId?: string, ...} $args = [])
 * @method \Aws\Result claimDevice(array $args = [])
 * @phpstan-method \Aws\Result claimDevice(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise claimDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise claimDeviceAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result createChannel(array $args = [])
 * @phpstan-method \Aws\Result createChannel(array{
 *     CdiInputSpecification?: array{Resolution?: 'FHD'|'HD'|'SD'|'UHD', ...},
 *     ChannelClass?: 'SINGLE_PIPELINE'|'STANDARD',
 *     Destinations?: list<array{
 *         Id?: string,
 *         MediaPackageSettings?: list<array>,
 *         MultiplexSettings?: array,
 *         Settings?: list<array>,
 *         SrtSettings?: list<array>,
 *         LogicalInterfaceNames?: list<string>,
 *         MediaConnectRouterSettings?: list<array>,
 *         ...,
 *     }>,
 *     EncoderSettings?: array{
 *         AudioDescriptions?: list<array>,
 *         AvailBlanking?: array{AvailBlankingImage?: array, State?: 'DISABLED'|'ENABLED', ...},
 *         AvailConfiguration?: array{
 *             AvailSettings?: array,
 *             Scte35SegmentationScope?: 'ALL_OUTPUT_GROUPS'|'SCTE35_ENABLED_OUTPUT_GROUPS',
 *             ...,
 *         },
 *         BlackoutSlate?: array{
 *             BlackoutSlateImage?: array,
 *             NetworkEndBlackout?: 'DISABLED'|'ENABLED',
 *             NetworkEndBlackoutImage?: array,
 *             NetworkId?: string,
 *             State?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         CaptionDescriptions?: list<array>,
 *         FeatureActivations?: array{
 *             InputPrepareScheduleActions?: 'DISABLED'|'ENABLED',
 *             OutputStaticImageOverlayScheduleActions?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         GlobalConfiguration?: array{
 *             InitialAudioGain?: int,
 *             InputEndAction?: 'NONE'|'SWITCH_AND_LOOP_INPUTS',
 *             InputLossBehavior?: array,
 *             OutputLockingMode?: 'DISABLED'|'EPOCH_LOCKING'|'PIPELINE_LOCKING',
 *             OutputTimingSource?: 'INPUT_CLOCK'|'SYSTEM_CLOCK',
 *             SupportLowFramerateInputs?: 'DISABLED'|'ENABLED',
 *             OutputLockingSettings?: array,
 *             ...,
 *         },
 *         MotionGraphicsConfiguration?: array{MotionGraphicsInsertion?: 'DISABLED'|'ENABLED', MotionGraphicsSettings?: array, ...},
 *         NielsenConfiguration?: array{DistributorId?: string, NielsenPcmToId3Tagging?: 'DISABLED'|'ENABLED', ...},
 *         OutputGroups?: list<array>,
 *         TimecodeConfig?: array{Source?: 'EMBEDDED'|'SYSTEMCLOCK'|'ZEROBASED', SyncThreshold?: int, ...},
 *         VideoDescriptions?: list<array>,
 *         ThumbnailConfiguration?: array{State?: 'AUTO'|'DISABLED', ...},
 *         ColorCorrectionSettings?: array{GlobalColorCorrections?: list<array>, ...},
 *         ...,
 *     },
 *     InputAttachments?: list<array{
 *         AutomaticInputFailoverSettings?: array,
 *         InputAttachmentName?: string,
 *         InputId?: string,
 *         InputSettings?: array,
 *         LogicalInterfaceNames?: list<string>,
 *         ...,
 *     }>,
 *     InputSpecification?: array{
 *         Codec?: 'AVC'|'HEVC'|'MPEG2',
 *         MaximumBitrate?: 'MAX_10_MBPS'|'MAX_20_MBPS'|'MAX_50_MBPS',
 *         Resolution?: 'HD'|'SD'|'UHD',
 *         ...,
 *     },
 *     LogLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARNING',
 *     Maintenance?: array{
 *         MaintenanceDay?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         MaintenanceStartTime?: string,
 *         ...,
 *     },
 *     Name?: string,
 *     RequestId?: string,
 *     Reserved?: string,
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     Vpc?: array{
 *         PublicAddressAllocationIds?: list<string>,
 *         SecurityGroupIds?: list<string>,
 *         SubnetIds?: list<string>,
 *         ...,
 *     },
 *     AnywhereSettings?: array{ChannelPlacementGroupId?: string, ClusterId?: string, ...},
 *     ChannelEngineVersion?: array{Version?: string, ...},
 *     DryRun?: bool,
 *     LinkedChannelSettings?: array{
 *         FollowerChannelSettings?: array{LinkedChannelType?: 'FOLLOWING_CHANNEL'|'PRIMARY_CHANNEL', PrimaryChannelArn?: string, ...},
 *         PrimaryChannelSettings?: array{LinkedChannelType?: 'FOLLOWING_CHANNEL'|'PRIMARY_CHANNEL', ...},
 *         ...,
 *     },
 *     ChannelSecurityGroups?: list<string>,
 *     InferenceSettings?: array{FeedArn?: string, AudioFeedInputs?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelAsync(array{
 *     CdiInputSpecification?: array{Resolution?: 'FHD'|'HD'|'SD'|'UHD', ...},
 *     ChannelClass?: 'SINGLE_PIPELINE'|'STANDARD',
 *     Destinations?: list<array{
 *         Id?: string,
 *         MediaPackageSettings?: list<array>,
 *         MultiplexSettings?: array,
 *         Settings?: list<array>,
 *         SrtSettings?: list<array>,
 *         LogicalInterfaceNames?: list<string>,
 *         MediaConnectRouterSettings?: list<array>,
 *         ...,
 *     }>,
 *     EncoderSettings?: array{
 *         AudioDescriptions?: list<array>,
 *         AvailBlanking?: array{AvailBlankingImage?: array, State?: 'DISABLED'|'ENABLED', ...},
 *         AvailConfiguration?: array{
 *             AvailSettings?: array,
 *             Scte35SegmentationScope?: 'ALL_OUTPUT_GROUPS'|'SCTE35_ENABLED_OUTPUT_GROUPS',
 *             ...,
 *         },
 *         BlackoutSlate?: array{
 *             BlackoutSlateImage?: array,
 *             NetworkEndBlackout?: 'DISABLED'|'ENABLED',
 *             NetworkEndBlackoutImage?: array,
 *             NetworkId?: string,
 *             State?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         CaptionDescriptions?: list<array>,
 *         FeatureActivations?: array{
 *             InputPrepareScheduleActions?: 'DISABLED'|'ENABLED',
 *             OutputStaticImageOverlayScheduleActions?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         GlobalConfiguration?: array{
 *             InitialAudioGain?: int,
 *             InputEndAction?: 'NONE'|'SWITCH_AND_LOOP_INPUTS',
 *             InputLossBehavior?: array,
 *             OutputLockingMode?: 'DISABLED'|'EPOCH_LOCKING'|'PIPELINE_LOCKING',
 *             OutputTimingSource?: 'INPUT_CLOCK'|'SYSTEM_CLOCK',
 *             SupportLowFramerateInputs?: 'DISABLED'|'ENABLED',
 *             OutputLockingSettings?: array,
 *             ...,
 *         },
 *         MotionGraphicsConfiguration?: array{MotionGraphicsInsertion?: 'DISABLED'|'ENABLED', MotionGraphicsSettings?: array, ...},
 *         NielsenConfiguration?: array{DistributorId?: string, NielsenPcmToId3Tagging?: 'DISABLED'|'ENABLED', ...},
 *         OutputGroups?: list<array>,
 *         TimecodeConfig?: array{Source?: 'EMBEDDED'|'SYSTEMCLOCK'|'ZEROBASED', SyncThreshold?: int, ...},
 *         VideoDescriptions?: list<array>,
 *         ThumbnailConfiguration?: array{State?: 'AUTO'|'DISABLED', ...},
 *         ColorCorrectionSettings?: array{GlobalColorCorrections?: list<array>, ...},
 *         ...,
 *     },
 *     InputAttachments?: list<array{
 *         AutomaticInputFailoverSettings?: array,
 *         InputAttachmentName?: string,
 *         InputId?: string,
 *         InputSettings?: array,
 *         LogicalInterfaceNames?: list<string>,
 *         ...,
 *     }>,
 *     InputSpecification?: array{
 *         Codec?: 'AVC'|'HEVC'|'MPEG2',
 *         MaximumBitrate?: 'MAX_10_MBPS'|'MAX_20_MBPS'|'MAX_50_MBPS',
 *         Resolution?: 'HD'|'SD'|'UHD',
 *         ...,
 *     },
 *     LogLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARNING',
 *     Maintenance?: array{
 *         MaintenanceDay?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         MaintenanceStartTime?: string,
 *         ...,
 *     },
 *     Name?: string,
 *     RequestId?: string,
 *     Reserved?: string,
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     Vpc?: array{
 *         PublicAddressAllocationIds?: list<string>,
 *         SecurityGroupIds?: list<string>,
 *         SubnetIds?: list<string>,
 *         ...,
 *     },
 *     AnywhereSettings?: array{ChannelPlacementGroupId?: string, ClusterId?: string, ...},
 *     ChannelEngineVersion?: array{Version?: string, ...},
 *     DryRun?: bool,
 *     LinkedChannelSettings?: array{
 *         FollowerChannelSettings?: array{LinkedChannelType?: 'FOLLOWING_CHANNEL'|'PRIMARY_CHANNEL', PrimaryChannelArn?: string, ...},
 *         PrimaryChannelSettings?: array{LinkedChannelType?: 'FOLLOWING_CHANNEL'|'PRIMARY_CHANNEL', ...},
 *         ...,
 *     },
 *     ChannelSecurityGroups?: list<string>,
 *     InferenceSettings?: array{FeedArn?: string, AudioFeedInputs?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInput(array $args = [])
 * @phpstan-method \Aws\Result createInput(array{
 *     Destinations?: list<array{StreamName?: string, Network?: string, NetworkRoutes?: list<array>, StaticIpAddress?: string, ...}>,
 *     InputDevices?: list<array{Id?: string, ...}>,
 *     InputSecurityGroups?: list<string>,
 *     MediaConnectFlows?: list<array{FlowArn?: string, ...}>,
 *     Name?: string,
 *     RequestId?: string,
 *     RoleArn?: string,
 *     Sources?: list<array{PasswordParam?: string, Url?: string, Username?: string, ...}>,
 *     Tags?: array<string, string>,
 *     Type?: 'AWS_CDI'|'INPUT_DEVICE'|'MEDIACONNECT'|'MEDIACONNECT_ROUTER'|'MP4_FILE'|'MULTICAST'|'RTMP_PULL'|'RTMP_PUSH'|'RTP_PUSH'|'SDI'|'SMPTE_2110_RECEIVER_GROUP'|'SRT_CALLER'|'SRT_LISTENER'|'TS_FILE'|'UDP_PUSH'|'URL_PULL',
 *     Vpc?: array{SecurityGroupIds?: list<string>, SubnetIds?: list<string>, ...},
 *     SrtSettings?: array{
 *         SrtCallerSources?: list<array>,
 *         SrtListenerSettings?: array{Decryption?: array, MinimumLatency?: int, StreamId?: string, ...},
 *         ...,
 *     },
 *     InputNetworkLocation?: 'AWS'|'ON_PREMISES',
 *     MulticastSettings?: array{Sources?: list<array>, ...},
 *     Smpte2110ReceiverGroupSettings?: array{Smpte2110ReceiverGroups?: list<array>, ...},
 *     SdiSources?: list<string>,
 *     RouterSettings?: array{Destinations?: list<array>, EncryptionType?: 'AUTOMATIC'|'SECRETS_MANAGER', SecretArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInputAsync(array{
 *     Destinations?: list<array{StreamName?: string, Network?: string, NetworkRoutes?: list<array>, StaticIpAddress?: string, ...}>,
 *     InputDevices?: list<array{Id?: string, ...}>,
 *     InputSecurityGroups?: list<string>,
 *     MediaConnectFlows?: list<array{FlowArn?: string, ...}>,
 *     Name?: string,
 *     RequestId?: string,
 *     RoleArn?: string,
 *     Sources?: list<array{PasswordParam?: string, Url?: string, Username?: string, ...}>,
 *     Tags?: array<string, string>,
 *     Type?: 'AWS_CDI'|'INPUT_DEVICE'|'MEDIACONNECT'|'MEDIACONNECT_ROUTER'|'MP4_FILE'|'MULTICAST'|'RTMP_PULL'|'RTMP_PUSH'|'RTP_PUSH'|'SDI'|'SMPTE_2110_RECEIVER_GROUP'|'SRT_CALLER'|'SRT_LISTENER'|'TS_FILE'|'UDP_PUSH'|'URL_PULL',
 *     Vpc?: array{SecurityGroupIds?: list<string>, SubnetIds?: list<string>, ...},
 *     SrtSettings?: array{
 *         SrtCallerSources?: list<array>,
 *         SrtListenerSettings?: array{Decryption?: array, MinimumLatency?: int, StreamId?: string, ...},
 *         ...,
 *     },
 *     InputNetworkLocation?: 'AWS'|'ON_PREMISES',
 *     MulticastSettings?: array{Sources?: list<array>, ...},
 *     Smpte2110ReceiverGroupSettings?: array{Smpte2110ReceiverGroups?: list<array>, ...},
 *     SdiSources?: list<string>,
 *     RouterSettings?: array{Destinations?: list<array>, EncryptionType?: 'AUTOMATIC'|'SECRETS_MANAGER', SecretArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInputSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result createInputSecurityGroup(array{Tags?: array<string, string>, WhitelistRules?: list<array{Cidr?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createInputSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInputSecurityGroupAsync(array{Tags?: array<string, string>, WhitelistRules?: list<array{Cidr?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createMultiplex(array $args = [])
 * @phpstan-method \Aws\Result createMultiplex(array{
 *     AvailabilityZones?: list<string>,
 *     MultiplexSettings?: array{
 *         MaximumVideoBufferDelayMilliseconds?: int,
 *         TransportStreamBitrate?: int,
 *         TransportStreamId?: int,
 *         TransportStreamReservedBitrate?: int,
 *         ...,
 *     },
 *     Name?: string,
 *     RequestId?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMultiplexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMultiplexAsync(array{
 *     AvailabilityZones?: list<string>,
 *     MultiplexSettings?: array{
 *         MaximumVideoBufferDelayMilliseconds?: int,
 *         TransportStreamBitrate?: int,
 *         TransportStreamId?: int,
 *         TransportStreamReservedBitrate?: int,
 *         ...,
 *     },
 *     Name?: string,
 *     RequestId?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMultiplexProgram(array $args = [])
 * @phpstan-method \Aws\Result createMultiplexProgram(array{
 *     MultiplexId?: string,
 *     MultiplexProgramSettings?: array{
 *         PreferredChannelPipeline?: 'CURRENTLY_ACTIVE'|'PIPELINE_0'|'PIPELINE_1',
 *         ProgramNumber?: int,
 *         ServiceDescriptor?: array{ProviderName?: string, ServiceName?: string, ...},
 *         VideoSettings?: array{ConstantBitrate?: int, StatmuxSettings?: array, ...},
 *         ...,
 *     },
 *     ProgramName?: string,
 *     RequestId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMultiplexProgramAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMultiplexProgramAsync(array{
 *     MultiplexId?: string,
 *     MultiplexProgramSettings?: array{
 *         PreferredChannelPipeline?: 'CURRENTLY_ACTIVE'|'PIPELINE_0'|'PIPELINE_1',
 *         ProgramNumber?: int,
 *         ServiceDescriptor?: array{ProviderName?: string, ServiceName?: string, ...},
 *         VideoSettings?: array{ConstantBitrate?: int, StatmuxSettings?: array, ...},
 *         ...,
 *     },
 *     ProgramName?: string,
 *     RequestId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPartnerInput(array $args = [])
 * @phpstan-method \Aws\Result createPartnerInput(array{InputId?: string, RequestId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPartnerInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPartnerInputAsync(array{InputId?: string, RequestId?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createTags(array $args = [])
 * @phpstan-method \Aws\Result createTags(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTagsAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteChannel(array{ChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelAsync(array{ChannelId?: string, ...} $args = [])
 * @method \Aws\Result deleteInput(array $args = [])
 * @phpstan-method \Aws\Result deleteInput(array{InputId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInputAsync(array{InputId?: string, ...} $args = [])
 * @method \Aws\Result deleteInputSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteInputSecurityGroup(array{InputSecurityGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInputSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInputSecurityGroupAsync(array{InputSecurityGroupId?: string, ...} $args = [])
 * @method \Aws\Result deleteMultiplex(array $args = [])
 * @phpstan-method \Aws\Result deleteMultiplex(array{MultiplexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMultiplexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMultiplexAsync(array{MultiplexId?: string, ...} $args = [])
 * @method \Aws\Result deleteMultiplexProgram(array $args = [])
 * @phpstan-method \Aws\Result deleteMultiplexProgram(array{MultiplexId?: string, ProgramName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMultiplexProgramAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMultiplexProgramAsync(array{MultiplexId?: string, ProgramName?: string, ...} $args = [])
 * @method \Aws\Result deleteReservation(array $args = [])
 * @phpstan-method \Aws\Result deleteReservation(array{ReservationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReservationAsync(array{ReservationId?: string, ...} $args = [])
 * @method \Aws\Result deleteSchedule(array $args = [])
 * @phpstan-method \Aws\Result deleteSchedule(array{ChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduleAsync(array{ChannelId?: string, ...} $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @phpstan-method \Aws\Result deleteTags(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagsAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result describeAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeAccountConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result describeChannel(array $args = [])
 * @phpstan-method \Aws\Result describeChannel(array{ChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelAsync(array{ChannelId?: string, ...} $args = [])
 * @method \Aws\Result describeInput(array $args = [])
 * @phpstan-method \Aws\Result describeInput(array{InputId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInputAsync(array{InputId?: string, ...} $args = [])
 * @method \Aws\Result describeInputDevice(array $args = [])
 * @phpstan-method \Aws\Result describeInputDevice(array{InputDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInputDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInputDeviceAsync(array{InputDeviceId?: string, ...} $args = [])
 * @method \Aws\Result describeInputDeviceThumbnail(array $args = [])
 * @phpstan-method \Aws\Result describeInputDeviceThumbnail(array{InputDeviceId?: string, Accept?: 'image/jpeg', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInputDeviceThumbnailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInputDeviceThumbnailAsync(array{InputDeviceId?: string, Accept?: 'image/jpeg', ...} $args = [])
 * @method \Aws\Result describeInputSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result describeInputSecurityGroup(array{InputSecurityGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInputSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInputSecurityGroupAsync(array{InputSecurityGroupId?: string, ...} $args = [])
 * @method \Aws\Result describeMultiplex(array $args = [])
 * @phpstan-method \Aws\Result describeMultiplex(array{MultiplexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMultiplexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMultiplexAsync(array{MultiplexId?: string, ...} $args = [])
 * @method \Aws\Result describeMultiplexProgram(array $args = [])
 * @phpstan-method \Aws\Result describeMultiplexProgram(array{MultiplexId?: string, ProgramName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMultiplexProgramAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMultiplexProgramAsync(array{MultiplexId?: string, ProgramName?: string, ...} $args = [])
 * @method \Aws\Result describeOffering(array $args = [])
 * @phpstan-method \Aws\Result describeOffering(array{OfferingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOfferingAsync(array{OfferingId?: string, ...} $args = [])
 * @method \Aws\Result describeReservation(array $args = [])
 * @phpstan-method \Aws\Result describeReservation(array{ReservationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservationAsync(array{ReservationId?: string, ...} $args = [])
 * @method \Aws\Result describeSchedule(array $args = [])
 * @phpstan-method \Aws\Result describeSchedule(array{ChannelId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScheduleAsync(array{ChannelId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeThumbnails(array $args = [])
 * @phpstan-method \Aws\Result describeThumbnails(array{ChannelId?: string, PipelineId?: string, ThumbnailType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeThumbnailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeThumbnailsAsync(array{ChannelId?: string, PipelineId?: string, ThumbnailType?: string, ...} $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @phpstan-method \Aws\Result listChannels(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listInputDeviceTransfers(array $args = [])
 * @phpstan-method \Aws\Result listInputDeviceTransfers(array{MaxResults?: int, NextToken?: string, TransferType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInputDeviceTransfersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInputDeviceTransfersAsync(array{MaxResults?: int, NextToken?: string, TransferType?: string, ...} $args = [])
 * @method \Aws\Result listInputDevices(array $args = [])
 * @phpstan-method \Aws\Result listInputDevices(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInputDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInputDevicesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listInputSecurityGroups(array $args = [])
 * @phpstan-method \Aws\Result listInputSecurityGroups(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInputSecurityGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInputSecurityGroupsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listInputs(array $args = [])
 * @phpstan-method \Aws\Result listInputs(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInputsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMultiplexPrograms(array $args = [])
 * @phpstan-method \Aws\Result listMultiplexPrograms(array{MaxResults?: int, MultiplexId?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMultiplexProgramsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMultiplexProgramsAsync(array{MaxResults?: int, MultiplexId?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMultiplexes(array $args = [])
 * @phpstan-method \Aws\Result listMultiplexes(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMultiplexesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMultiplexesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listOfferings(array $args = [])
 * @phpstan-method \Aws\Result listOfferings(array{
 *     ChannelClass?: string,
 *     ChannelConfiguration?: string,
 *     Codec?: string,
 *     Duration?: string,
 *     MaxResults?: int,
 *     MaximumBitrate?: string,
 *     MaximumFramerate?: string,
 *     NextToken?: string,
 *     Resolution?: string,
 *     ResourceType?: string,
 *     SpecialFeature?: string,
 *     VideoQuality?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOfferingsAsync(array{
 *     ChannelClass?: string,
 *     ChannelConfiguration?: string,
 *     Codec?: string,
 *     Duration?: string,
 *     MaxResults?: int,
 *     MaximumBitrate?: string,
 *     MaximumFramerate?: string,
 *     NextToken?: string,
 *     Resolution?: string,
 *     ResourceType?: string,
 *     SpecialFeature?: string,
 *     VideoQuality?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReservations(array $args = [])
 * @phpstan-method \Aws\Result listReservations(array{
 *     ChannelClass?: string,
 *     Codec?: string,
 *     MaxResults?: int,
 *     MaximumBitrate?: string,
 *     MaximumFramerate?: string,
 *     NextToken?: string,
 *     Resolution?: string,
 *     ResourceType?: string,
 *     SpecialFeature?: string,
 *     VideoQuality?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReservationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReservationsAsync(array{
 *     ChannelClass?: string,
 *     Codec?: string,
 *     MaxResults?: int,
 *     MaximumBitrate?: string,
 *     MaximumFramerate?: string,
 *     NextToken?: string,
 *     Resolution?: string,
 *     ResourceType?: string,
 *     SpecialFeature?: string,
 *     VideoQuality?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result purchaseOffering(array $args = [])
 * @phpstan-method \Aws\Result purchaseOffering(array{
 *     Count?: int,
 *     Name?: string,
 *     OfferingId?: string,
 *     RenewalSettings?: array{AutomaticRenewal?: 'DISABLED'|'ENABLED'|'UNAVAILABLE', RenewalCount?: int, ...},
 *     RequestId?: string,
 *     Start?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseOfferingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise purchaseOfferingAsync(array{
 *     Count?: int,
 *     Name?: string,
 *     OfferingId?: string,
 *     RenewalSettings?: array{AutomaticRenewal?: 'DISABLED'|'ENABLED'|'UNAVAILABLE', RenewalCount?: int, ...},
 *     RequestId?: string,
 *     Start?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rebootInputDevice(array $args = [])
 * @phpstan-method \Aws\Result rebootInputDevice(array{Force?: 'NO'|'YES', InputDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootInputDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootInputDeviceAsync(array{Force?: 'NO'|'YES', InputDeviceId?: string, ...} $args = [])
 * @method \Aws\Result rejectInputDeviceTransfer(array $args = [])
 * @phpstan-method \Aws\Result rejectInputDeviceTransfer(array{InputDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectInputDeviceTransferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectInputDeviceTransferAsync(array{InputDeviceId?: string, ...} $args = [])
 * @method \Aws\Result startChannel(array $args = [])
 * @phpstan-method \Aws\Result startChannel(array{ChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startChannelAsync(array{ChannelId?: string, ...} $args = [])
 * @method \Aws\Result startInputDevice(array $args = [])
 * @phpstan-method \Aws\Result startInputDevice(array{InputDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startInputDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startInputDeviceAsync(array{InputDeviceId?: string, ...} $args = [])
 * @method \Aws\Result startInputDeviceMaintenanceWindow(array $args = [])
 * @phpstan-method \Aws\Result startInputDeviceMaintenanceWindow(array{InputDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startInputDeviceMaintenanceWindowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startInputDeviceMaintenanceWindowAsync(array{InputDeviceId?: string, ...} $args = [])
 * @method \Aws\Result startMultiplex(array $args = [])
 * @phpstan-method \Aws\Result startMultiplex(array{MultiplexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMultiplexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMultiplexAsync(array{MultiplexId?: string, ...} $args = [])
 * @method \Aws\Result stopChannel(array $args = [])
 * @phpstan-method \Aws\Result stopChannel(array{ChannelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopChannelAsync(array{ChannelId?: string, ...} $args = [])
 * @method \Aws\Result stopInputDevice(array $args = [])
 * @phpstan-method \Aws\Result stopInputDevice(array{InputDeviceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopInputDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopInputDeviceAsync(array{InputDeviceId?: string, ...} $args = [])
 * @method \Aws\Result stopMultiplex(array $args = [])
 * @phpstan-method \Aws\Result stopMultiplex(array{MultiplexId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopMultiplexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopMultiplexAsync(array{MultiplexId?: string, ...} $args = [])
 * @method \Aws\Result transferInputDevice(array $args = [])
 * @phpstan-method \Aws\Result transferInputDevice(array{InputDeviceId?: string, TargetCustomerId?: string, TargetRegion?: string, TransferMessage?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise transferInputDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise transferInputDeviceAsync(array{InputDeviceId?: string, TargetCustomerId?: string, TargetRegion?: string, TransferMessage?: string, ...} $args = [])
 * @method \Aws\Result updateAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateAccountConfiguration(array{AccountConfiguration?: array{KmsKeyId?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountConfigurationAsync(array{AccountConfiguration?: array{KmsKeyId?: string, ...}, ...} $args = [])
 * @method \Aws\Result updateChannel(array $args = [])
 * @phpstan-method \Aws\Result updateChannel(array{
 *     CdiInputSpecification?: array{Resolution?: 'FHD'|'HD'|'SD'|'UHD', ...},
 *     ChannelId?: string,
 *     Destinations?: list<array{
 *         Id?: string,
 *         MediaPackageSettings?: list<array>,
 *         MultiplexSettings?: array,
 *         Settings?: list<array>,
 *         SrtSettings?: list<array>,
 *         LogicalInterfaceNames?: list<string>,
 *         MediaConnectRouterSettings?: list<array>,
 *         ...,
 *     }>,
 *     EncoderSettings?: array{
 *         AudioDescriptions?: list<array>,
 *         AvailBlanking?: array{AvailBlankingImage?: array, State?: 'DISABLED'|'ENABLED', ...},
 *         AvailConfiguration?: array{
 *             AvailSettings?: array,
 *             Scte35SegmentationScope?: 'ALL_OUTPUT_GROUPS'|'SCTE35_ENABLED_OUTPUT_GROUPS',
 *             ...,
 *         },
 *         BlackoutSlate?: array{
 *             BlackoutSlateImage?: array,
 *             NetworkEndBlackout?: 'DISABLED'|'ENABLED',
 *             NetworkEndBlackoutImage?: array,
 *             NetworkId?: string,
 *             State?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         CaptionDescriptions?: list<array>,
 *         FeatureActivations?: array{
 *             InputPrepareScheduleActions?: 'DISABLED'|'ENABLED',
 *             OutputStaticImageOverlayScheduleActions?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         GlobalConfiguration?: array{
 *             InitialAudioGain?: int,
 *             InputEndAction?: 'NONE'|'SWITCH_AND_LOOP_INPUTS',
 *             InputLossBehavior?: array,
 *             OutputLockingMode?: 'DISABLED'|'EPOCH_LOCKING'|'PIPELINE_LOCKING',
 *             OutputTimingSource?: 'INPUT_CLOCK'|'SYSTEM_CLOCK',
 *             SupportLowFramerateInputs?: 'DISABLED'|'ENABLED',
 *             OutputLockingSettings?: array,
 *             ...,
 *         },
 *         MotionGraphicsConfiguration?: array{MotionGraphicsInsertion?: 'DISABLED'|'ENABLED', MotionGraphicsSettings?: array, ...},
 *         NielsenConfiguration?: array{DistributorId?: string, NielsenPcmToId3Tagging?: 'DISABLED'|'ENABLED', ...},
 *         OutputGroups?: list<array>,
 *         TimecodeConfig?: array{Source?: 'EMBEDDED'|'SYSTEMCLOCK'|'ZEROBASED', SyncThreshold?: int, ...},
 *         VideoDescriptions?: list<array>,
 *         ThumbnailConfiguration?: array{State?: 'AUTO'|'DISABLED', ...},
 *         ColorCorrectionSettings?: array{GlobalColorCorrections?: list<array>, ...},
 *         ...,
 *     },
 *     InputAttachments?: list<array{
 *         AutomaticInputFailoverSettings?: array,
 *         InputAttachmentName?: string,
 *         InputId?: string,
 *         InputSettings?: array,
 *         LogicalInterfaceNames?: list<string>,
 *         ...,
 *     }>,
 *     InputSpecification?: array{
 *         Codec?: 'AVC'|'HEVC'|'MPEG2',
 *         MaximumBitrate?: 'MAX_10_MBPS'|'MAX_20_MBPS'|'MAX_50_MBPS',
 *         Resolution?: 'HD'|'SD'|'UHD',
 *         ...,
 *     },
 *     LogLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARNING',
 *     Maintenance?: array{
 *         MaintenanceDay?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         MaintenanceScheduledDate?: string,
 *         MaintenanceStartTime?: string,
 *         ...,
 *     },
 *     Name?: string,
 *     RoleArn?: string,
 *     ChannelEngineVersion?: array{Version?: string, ...},
 *     DryRun?: bool,
 *     AnywhereSettings?: array{ChannelPlacementGroupId?: string, ClusterId?: string, ...},
 *     LinkedChannelSettings?: array{
 *         FollowerChannelSettings?: array{LinkedChannelType?: 'FOLLOWING_CHANNEL'|'PRIMARY_CHANNEL', PrimaryChannelArn?: string, ...},
 *         PrimaryChannelSettings?: array{LinkedChannelType?: 'FOLLOWING_CHANNEL'|'PRIMARY_CHANNEL', ...},
 *         ...,
 *     },
 *     ChannelSecurityGroups?: list<string>,
 *     InferenceSettings?: array{FeedArn?: string, AudioFeedInputs?: list<array>, ...},
 *     SpecialRouterSettings?: array{RouterArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelAsync(array{
 *     CdiInputSpecification?: array{Resolution?: 'FHD'|'HD'|'SD'|'UHD', ...},
 *     ChannelId?: string,
 *     Destinations?: list<array{
 *         Id?: string,
 *         MediaPackageSettings?: list<array>,
 *         MultiplexSettings?: array,
 *         Settings?: list<array>,
 *         SrtSettings?: list<array>,
 *         LogicalInterfaceNames?: list<string>,
 *         MediaConnectRouterSettings?: list<array>,
 *         ...,
 *     }>,
 *     EncoderSettings?: array{
 *         AudioDescriptions?: list<array>,
 *         AvailBlanking?: array{AvailBlankingImage?: array, State?: 'DISABLED'|'ENABLED', ...},
 *         AvailConfiguration?: array{
 *             AvailSettings?: array,
 *             Scte35SegmentationScope?: 'ALL_OUTPUT_GROUPS'|'SCTE35_ENABLED_OUTPUT_GROUPS',
 *             ...,
 *         },
 *         BlackoutSlate?: array{
 *             BlackoutSlateImage?: array,
 *             NetworkEndBlackout?: 'DISABLED'|'ENABLED',
 *             NetworkEndBlackoutImage?: array,
 *             NetworkId?: string,
 *             State?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         CaptionDescriptions?: list<array>,
 *         FeatureActivations?: array{
 *             InputPrepareScheduleActions?: 'DISABLED'|'ENABLED',
 *             OutputStaticImageOverlayScheduleActions?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         GlobalConfiguration?: array{
 *             InitialAudioGain?: int,
 *             InputEndAction?: 'NONE'|'SWITCH_AND_LOOP_INPUTS',
 *             InputLossBehavior?: array,
 *             OutputLockingMode?: 'DISABLED'|'EPOCH_LOCKING'|'PIPELINE_LOCKING',
 *             OutputTimingSource?: 'INPUT_CLOCK'|'SYSTEM_CLOCK',
 *             SupportLowFramerateInputs?: 'DISABLED'|'ENABLED',
 *             OutputLockingSettings?: array,
 *             ...,
 *         },
 *         MotionGraphicsConfiguration?: array{MotionGraphicsInsertion?: 'DISABLED'|'ENABLED', MotionGraphicsSettings?: array, ...},
 *         NielsenConfiguration?: array{DistributorId?: string, NielsenPcmToId3Tagging?: 'DISABLED'|'ENABLED', ...},
 *         OutputGroups?: list<array>,
 *         TimecodeConfig?: array{Source?: 'EMBEDDED'|'SYSTEMCLOCK'|'ZEROBASED', SyncThreshold?: int, ...},
 *         VideoDescriptions?: list<array>,
 *         ThumbnailConfiguration?: array{State?: 'AUTO'|'DISABLED', ...},
 *         ColorCorrectionSettings?: array{GlobalColorCorrections?: list<array>, ...},
 *         ...,
 *     },
 *     InputAttachments?: list<array{
 *         AutomaticInputFailoverSettings?: array,
 *         InputAttachmentName?: string,
 *         InputId?: string,
 *         InputSettings?: array,
 *         LogicalInterfaceNames?: list<string>,
 *         ...,
 *     }>,
 *     InputSpecification?: array{
 *         Codec?: 'AVC'|'HEVC'|'MPEG2',
 *         MaximumBitrate?: 'MAX_10_MBPS'|'MAX_20_MBPS'|'MAX_50_MBPS',
 *         Resolution?: 'HD'|'SD'|'UHD',
 *         ...,
 *     },
 *     LogLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARNING',
 *     Maintenance?: array{
 *         MaintenanceDay?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY',
 *         MaintenanceScheduledDate?: string,
 *         MaintenanceStartTime?: string,
 *         ...,
 *     },
 *     Name?: string,
 *     RoleArn?: string,
 *     ChannelEngineVersion?: array{Version?: string, ...},
 *     DryRun?: bool,
 *     AnywhereSettings?: array{ChannelPlacementGroupId?: string, ClusterId?: string, ...},
 *     LinkedChannelSettings?: array{
 *         FollowerChannelSettings?: array{LinkedChannelType?: 'FOLLOWING_CHANNEL'|'PRIMARY_CHANNEL', PrimaryChannelArn?: string, ...},
 *         PrimaryChannelSettings?: array{LinkedChannelType?: 'FOLLOWING_CHANNEL'|'PRIMARY_CHANNEL', ...},
 *         ...,
 *     },
 *     ChannelSecurityGroups?: list<string>,
 *     InferenceSettings?: array{FeedArn?: string, AudioFeedInputs?: list<array>, ...},
 *     SpecialRouterSettings?: array{RouterArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateChannelClass(array $args = [])
 * @phpstan-method \Aws\Result updateChannelClass(array{
 *     ChannelClass?: 'SINGLE_PIPELINE'|'STANDARD',
 *     ChannelId?: string,
 *     Destinations?: list<array{
 *         Id?: string,
 *         MediaPackageSettings?: list<array>,
 *         MultiplexSettings?: array,
 *         Settings?: list<array>,
 *         SrtSettings?: list<array>,
 *         LogicalInterfaceNames?: list<string>,
 *         MediaConnectRouterSettings?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelClassAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelClassAsync(array{
 *     ChannelClass?: 'SINGLE_PIPELINE'|'STANDARD',
 *     ChannelId?: string,
 *     Destinations?: list<array{
 *         Id?: string,
 *         MediaPackageSettings?: list<array>,
 *         MultiplexSettings?: array,
 *         Settings?: list<array>,
 *         SrtSettings?: list<array>,
 *         LogicalInterfaceNames?: list<string>,
 *         MediaConnectRouterSettings?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInput(array $args = [])
 * @phpstan-method \Aws\Result updateInput(array{
 *     Destinations?: list<array{StreamName?: string, Network?: string, NetworkRoutes?: list<array>, StaticIpAddress?: string, ...}>,
 *     InputDevices?: list<array{Id?: string, ...}>,
 *     InputId?: string,
 *     InputSecurityGroups?: list<string>,
 *     MediaConnectFlows?: list<array{FlowArn?: string, ...}>,
 *     Name?: string,
 *     RoleArn?: string,
 *     Sources?: list<array{PasswordParam?: string, Url?: string, Username?: string, ...}>,
 *     SrtSettings?: array{
 *         SrtCallerSources?: list<array>,
 *         SrtListenerSettings?: array{Decryption?: array, MinimumLatency?: int, StreamId?: string, ...},
 *         ...,
 *     },
 *     MulticastSettings?: array{Sources?: list<array>, ...},
 *     Smpte2110ReceiverGroupSettings?: array{Smpte2110ReceiverGroups?: list<array>, ...},
 *     SdiSources?: list<string>,
 *     SpecialRouterSettings?: array{RouterArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInputAsync(array{
 *     Destinations?: list<array{StreamName?: string, Network?: string, NetworkRoutes?: list<array>, StaticIpAddress?: string, ...}>,
 *     InputDevices?: list<array{Id?: string, ...}>,
 *     InputId?: string,
 *     InputSecurityGroups?: list<string>,
 *     MediaConnectFlows?: list<array{FlowArn?: string, ...}>,
 *     Name?: string,
 *     RoleArn?: string,
 *     Sources?: list<array{PasswordParam?: string, Url?: string, Username?: string, ...}>,
 *     SrtSettings?: array{
 *         SrtCallerSources?: list<array>,
 *         SrtListenerSettings?: array{Decryption?: array, MinimumLatency?: int, StreamId?: string, ...},
 *         ...,
 *     },
 *     MulticastSettings?: array{Sources?: list<array>, ...},
 *     Smpte2110ReceiverGroupSettings?: array{Smpte2110ReceiverGroups?: list<array>, ...},
 *     SdiSources?: list<string>,
 *     SpecialRouterSettings?: array{RouterArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInputDevice(array $args = [])
 * @phpstan-method \Aws\Result updateInputDevice(array{
 *     HdDeviceSettings?: array{
 *         ConfiguredInput?: 'AUTO'|'HDMI'|'SDI',
 *         MaxBitrate?: int,
 *         LatencyMs?: int,
 *         Codec?: 'AVC'|'HEVC',
 *         MediaconnectSettings?: array{FlowArn?: string, RoleArn?: string, SecretArn?: string, SourceName?: string, ...},
 *         AudioChannelPairs?: list<array>,
 *         InputResolution?: string,
 *         ...,
 *     },
 *     InputDeviceId?: string,
 *     Name?: string,
 *     UhdDeviceSettings?: array{
 *         ConfiguredInput?: 'AUTO'|'HDMI'|'SDI',
 *         MaxBitrate?: int,
 *         LatencyMs?: int,
 *         Codec?: 'AVC'|'HEVC',
 *         MediaconnectSettings?: array{FlowArn?: string, RoleArn?: string, SecretArn?: string, SourceName?: string, ...},
 *         AudioChannelPairs?: list<array>,
 *         InputResolution?: string,
 *         ...,
 *     },
 *     AvailabilityZone?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInputDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInputDeviceAsync(array{
 *     HdDeviceSettings?: array{
 *         ConfiguredInput?: 'AUTO'|'HDMI'|'SDI',
 *         MaxBitrate?: int,
 *         LatencyMs?: int,
 *         Codec?: 'AVC'|'HEVC',
 *         MediaconnectSettings?: array{FlowArn?: string, RoleArn?: string, SecretArn?: string, SourceName?: string, ...},
 *         AudioChannelPairs?: list<array>,
 *         InputResolution?: string,
 *         ...,
 *     },
 *     InputDeviceId?: string,
 *     Name?: string,
 *     UhdDeviceSettings?: array{
 *         ConfiguredInput?: 'AUTO'|'HDMI'|'SDI',
 *         MaxBitrate?: int,
 *         LatencyMs?: int,
 *         Codec?: 'AVC'|'HEVC',
 *         MediaconnectSettings?: array{FlowArn?: string, RoleArn?: string, SecretArn?: string, SourceName?: string, ...},
 *         AudioChannelPairs?: list<array>,
 *         InputResolution?: string,
 *         ...,
 *     },
 *     AvailabilityZone?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInputSecurityGroup(array $args = [])
 * @phpstan-method \Aws\Result updateInputSecurityGroup(array{
 *     InputSecurityGroupId?: string,
 *     Tags?: array<string, string>,
 *     WhitelistRules?: list<array{Cidr?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInputSecurityGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInputSecurityGroupAsync(array{
 *     InputSecurityGroupId?: string,
 *     Tags?: array<string, string>,
 *     WhitelistRules?: list<array{Cidr?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMultiplex(array $args = [])
 * @phpstan-method \Aws\Result updateMultiplex(array{
 *     MultiplexId?: string,
 *     MultiplexSettings?: array{
 *         MaximumVideoBufferDelayMilliseconds?: int,
 *         TransportStreamBitrate?: int,
 *         TransportStreamId?: int,
 *         TransportStreamReservedBitrate?: int,
 *         ...,
 *     },
 *     Name?: string,
 *     PacketIdentifiersMapping?: array<string, array{
 *         AudioPids?: list<int>,
 *         DvbSubPids?: list<int>,
 *         DvbTeletextPid?: int,
 *         EtvPlatformPid?: int,
 *         EtvSignalPid?: int,
 *         KlvDataPids?: list<int>,
 *         PcrPid?: int,
 *         PmtPid?: int,
 *         PrivateMetadataPid?: int,
 *         Scte27Pids?: list<int>,
 *         Scte35Pid?: int,
 *         TimedMetadataPid?: int,
 *         VideoPid?: int,
 *         AribCaptionsPid?: int,
 *         DvbTeletextPids?: list<int>,
 *         EcmPid?: int,
 *         Smpte2038Pid?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMultiplexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMultiplexAsync(array{
 *     MultiplexId?: string,
 *     MultiplexSettings?: array{
 *         MaximumVideoBufferDelayMilliseconds?: int,
 *         TransportStreamBitrate?: int,
 *         TransportStreamId?: int,
 *         TransportStreamReservedBitrate?: int,
 *         ...,
 *     },
 *     Name?: string,
 *     PacketIdentifiersMapping?: array<string, array{
 *         AudioPids?: list<int>,
 *         DvbSubPids?: list<int>,
 *         DvbTeletextPid?: int,
 *         EtvPlatformPid?: int,
 *         EtvSignalPid?: int,
 *         KlvDataPids?: list<int>,
 *         PcrPid?: int,
 *         PmtPid?: int,
 *         PrivateMetadataPid?: int,
 *         Scte27Pids?: list<int>,
 *         Scte35Pid?: int,
 *         TimedMetadataPid?: int,
 *         VideoPid?: int,
 *         AribCaptionsPid?: int,
 *         DvbTeletextPids?: list<int>,
 *         EcmPid?: int,
 *         Smpte2038Pid?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMultiplexProgram(array $args = [])
 * @phpstan-method \Aws\Result updateMultiplexProgram(array{
 *     MultiplexId?: string,
 *     MultiplexProgramSettings?: array{
 *         PreferredChannelPipeline?: 'CURRENTLY_ACTIVE'|'PIPELINE_0'|'PIPELINE_1',
 *         ProgramNumber?: int,
 *         ServiceDescriptor?: array{ProviderName?: string, ServiceName?: string, ...},
 *         VideoSettings?: array{ConstantBitrate?: int, StatmuxSettings?: array, ...},
 *         ...,
 *     },
 *     ProgramName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMultiplexProgramAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMultiplexProgramAsync(array{
 *     MultiplexId?: string,
 *     MultiplexProgramSettings?: array{
 *         PreferredChannelPipeline?: 'CURRENTLY_ACTIVE'|'PIPELINE_0'|'PIPELINE_1',
 *         ProgramNumber?: int,
 *         ServiceDescriptor?: array{ProviderName?: string, ServiceName?: string, ...},
 *         VideoSettings?: array{ConstantBitrate?: int, StatmuxSettings?: array, ...},
 *         ...,
 *     },
 *     ProgramName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReservation(array $args = [])
 * @phpstan-method \Aws\Result updateReservation(array{
 *     Name?: string,
 *     RenewalSettings?: array{AutomaticRenewal?: 'DISABLED'|'ENABLED'|'UNAVAILABLE', RenewalCount?: int, ...},
 *     ReservationId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReservationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReservationAsync(array{
 *     Name?: string,
 *     RenewalSettings?: array{AutomaticRenewal?: 'DISABLED'|'ENABLED'|'UNAVAILABLE', RenewalCount?: int, ...},
 *     ReservationId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result restartChannelPipelines(array $args = [])
 * @phpstan-method \Aws\Result restartChannelPipelines(array{ChannelId?: string, PipelineIds?: list<'PIPELINE_0'|'PIPELINE_1'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restartChannelPipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restartChannelPipelinesAsync(array{ChannelId?: string, PipelineIds?: list<'PIPELINE_0'|'PIPELINE_1'>, ...} $args = [])
 * @method \Aws\Result createCloudWatchAlarmTemplate(array $args = [])
 * @phpstan-method \Aws\Result createCloudWatchAlarmTemplate(array{
 *     ComparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     DatapointsToAlarm?: int,
 *     Description?: string,
 *     EvaluationPeriods?: int,
 *     GroupIdentifier?: string,
 *     MetricName?: string,
 *     Name?: string,
 *     Period?: int,
 *     Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *     Tags?: array<string, string>,
 *     TargetResourceType?: 'CLOUDFRONT_DISTRIBUTION'|'MEDIACONNECT_FLOW'|'MEDIALIVE_CHANNEL'|'MEDIALIVE_INPUT_DEVICE'|'MEDIALIVE_MULTIPLEX'|'MEDIAPACKAGE_CHANNEL'|'MEDIAPACKAGE_ORIGIN_ENDPOINT'|'MEDIATAILOR_PLAYBACK_CONFIGURATION'|'S3_BUCKET',
 *     Threshold?: float,
 *     TreatMissingData?: 'breaching'|'ignore'|'missing'|'notBreaching',
 *     RequestId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudWatchAlarmTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudWatchAlarmTemplateAsync(array{
 *     ComparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     DatapointsToAlarm?: int,
 *     Description?: string,
 *     EvaluationPeriods?: int,
 *     GroupIdentifier?: string,
 *     MetricName?: string,
 *     Name?: string,
 *     Period?: int,
 *     Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *     Tags?: array<string, string>,
 *     TargetResourceType?: 'CLOUDFRONT_DISTRIBUTION'|'MEDIACONNECT_FLOW'|'MEDIALIVE_CHANNEL'|'MEDIALIVE_INPUT_DEVICE'|'MEDIALIVE_MULTIPLEX'|'MEDIAPACKAGE_CHANNEL'|'MEDIAPACKAGE_ORIGIN_ENDPOINT'|'MEDIATAILOR_PLAYBACK_CONFIGURATION'|'S3_BUCKET',
 *     Threshold?: float,
 *     TreatMissingData?: 'breaching'|'ignore'|'missing'|'notBreaching',
 *     RequestId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCloudWatchAlarmTemplateGroup(array $args = [])
 * @phpstan-method \Aws\Result createCloudWatchAlarmTemplateGroup(array{Description?: string, Name?: string, Tags?: array<string, string>, RequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudWatchAlarmTemplateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudWatchAlarmTemplateGroupAsync(array{Description?: string, Name?: string, Tags?: array<string, string>, RequestId?: string, ...} $args = [])
 * @method \Aws\Result createEventBridgeRuleTemplate(array $args = [])
 * @phpstan-method \Aws\Result createEventBridgeRuleTemplate(array{
 *     Description?: string,
 *     EventTargets?: list<array{Arn?: string, ...}>,
 *     EventType?: 'MEDIACONNECT_ALERT'|'MEDIACONNECT_FLOW_STATUS_CHANGE'|'MEDIACONNECT_OUTPUT_HEALTH'|'MEDIACONNECT_SOURCE_HEALTH'|'MEDIALIVE_CHANNEL_ALERT'|'MEDIALIVE_CHANNEL_INPUT_CHANGE'|'MEDIALIVE_CHANNEL_STATE_CHANGE'|'MEDIALIVE_MULTIPLEX_ALERT'|'MEDIALIVE_MULTIPLEX_STATE_CHANGE'|'MEDIAPACKAGE_HARVEST_JOB_NOTIFICATION'|'MEDIAPACKAGE_INPUT_NOTIFICATION'|'MEDIAPACKAGE_KEY_PROVIDER_NOTIFICATION'|'SIGNAL_MAP_ACTIVE_ALARM',
 *     GroupIdentifier?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     RequestId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventBridgeRuleTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventBridgeRuleTemplateAsync(array{
 *     Description?: string,
 *     EventTargets?: list<array{Arn?: string, ...}>,
 *     EventType?: 'MEDIACONNECT_ALERT'|'MEDIACONNECT_FLOW_STATUS_CHANGE'|'MEDIACONNECT_OUTPUT_HEALTH'|'MEDIACONNECT_SOURCE_HEALTH'|'MEDIALIVE_CHANNEL_ALERT'|'MEDIALIVE_CHANNEL_INPUT_CHANGE'|'MEDIALIVE_CHANNEL_STATE_CHANGE'|'MEDIALIVE_MULTIPLEX_ALERT'|'MEDIALIVE_MULTIPLEX_STATE_CHANGE'|'MEDIAPACKAGE_HARVEST_JOB_NOTIFICATION'|'MEDIAPACKAGE_INPUT_NOTIFICATION'|'MEDIAPACKAGE_KEY_PROVIDER_NOTIFICATION'|'SIGNAL_MAP_ACTIVE_ALARM',
 *     GroupIdentifier?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     RequestId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventBridgeRuleTemplateGroup(array $args = [])
 * @phpstan-method \Aws\Result createEventBridgeRuleTemplateGroup(array{Description?: string, Name?: string, Tags?: array<string, string>, RequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventBridgeRuleTemplateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventBridgeRuleTemplateGroupAsync(array{Description?: string, Name?: string, Tags?: array<string, string>, RequestId?: string, ...} $args = [])
 * @method \Aws\Result createSignalMap(array $args = [])
 * @phpstan-method \Aws\Result createSignalMap(array{
 *     CloudWatchAlarmTemplateGroupIdentifiers?: list<string>,
 *     Description?: string,
 *     DiscoveryEntryPointArn?: string,
 *     EventBridgeRuleTemplateGroupIdentifiers?: list<string>,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     RequestId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSignalMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSignalMapAsync(array{
 *     CloudWatchAlarmTemplateGroupIdentifiers?: list<string>,
 *     Description?: string,
 *     DiscoveryEntryPointArn?: string,
 *     EventBridgeRuleTemplateGroupIdentifiers?: list<string>,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     RequestId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCloudWatchAlarmTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteCloudWatchAlarmTemplate(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCloudWatchAlarmTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCloudWatchAlarmTemplateAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteCloudWatchAlarmTemplateGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteCloudWatchAlarmTemplateGroup(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCloudWatchAlarmTemplateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCloudWatchAlarmTemplateGroupAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEventBridgeRuleTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteEventBridgeRuleTemplate(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventBridgeRuleTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventBridgeRuleTemplateAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEventBridgeRuleTemplateGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteEventBridgeRuleTemplateGroup(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventBridgeRuleTemplateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventBridgeRuleTemplateGroupAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteSignalMap(array $args = [])
 * @phpstan-method \Aws\Result deleteSignalMap(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSignalMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSignalMapAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getCloudWatchAlarmTemplate(array $args = [])
 * @phpstan-method \Aws\Result getCloudWatchAlarmTemplate(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudWatchAlarmTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudWatchAlarmTemplateAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getCloudWatchAlarmTemplateGroup(array $args = [])
 * @phpstan-method \Aws\Result getCloudWatchAlarmTemplateGroup(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudWatchAlarmTemplateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudWatchAlarmTemplateGroupAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getEventBridgeRuleTemplate(array $args = [])
 * @phpstan-method \Aws\Result getEventBridgeRuleTemplate(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventBridgeRuleTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventBridgeRuleTemplateAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getEventBridgeRuleTemplateGroup(array $args = [])
 * @phpstan-method \Aws\Result getEventBridgeRuleTemplateGroup(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventBridgeRuleTemplateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventBridgeRuleTemplateGroupAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getSignalMap(array $args = [])
 * @phpstan-method \Aws\Result getSignalMap(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSignalMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSignalMapAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result listCloudWatchAlarmTemplateGroups(array $args = [])
 * @phpstan-method \Aws\Result listCloudWatchAlarmTemplateGroups(array{MaxResults?: int, NextToken?: string, Scope?: string, SignalMapIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCloudWatchAlarmTemplateGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCloudWatchAlarmTemplateGroupsAsync(array{MaxResults?: int, NextToken?: string, Scope?: string, SignalMapIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listCloudWatchAlarmTemplates(array $args = [])
 * @phpstan-method \Aws\Result listCloudWatchAlarmTemplates(array{
 *     GroupIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Scope?: string,
 *     SignalMapIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCloudWatchAlarmTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCloudWatchAlarmTemplatesAsync(array{
 *     GroupIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Scope?: string,
 *     SignalMapIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEventBridgeRuleTemplateGroups(array $args = [])
 * @phpstan-method \Aws\Result listEventBridgeRuleTemplateGroups(array{MaxResults?: int, NextToken?: string, SignalMapIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventBridgeRuleTemplateGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventBridgeRuleTemplateGroupsAsync(array{MaxResults?: int, NextToken?: string, SignalMapIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listEventBridgeRuleTemplates(array $args = [])
 * @phpstan-method \Aws\Result listEventBridgeRuleTemplates(array{GroupIdentifier?: string, MaxResults?: int, NextToken?: string, SignalMapIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventBridgeRuleTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventBridgeRuleTemplatesAsync(array{GroupIdentifier?: string, MaxResults?: int, NextToken?: string, SignalMapIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listSignalMaps(array $args = [])
 * @phpstan-method \Aws\Result listSignalMaps(array{
 *     CloudWatchAlarmTemplateGroupIdentifier?: string,
 *     EventBridgeRuleTemplateGroupIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSignalMapsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSignalMapsAsync(array{
 *     CloudWatchAlarmTemplateGroupIdentifier?: string,
 *     EventBridgeRuleTemplateGroupIdentifier?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDeleteMonitorDeployment(array $args = [])
 * @phpstan-method \Aws\Result startDeleteMonitorDeployment(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDeleteMonitorDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDeleteMonitorDeploymentAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result startMonitorDeployment(array $args = [])
 * @phpstan-method \Aws\Result startMonitorDeployment(array{DryRun?: bool, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMonitorDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMonitorDeploymentAsync(array{DryRun?: bool, Identifier?: string, ...} $args = [])
 * @method \Aws\Result startUpdateSignalMap(array $args = [])
 * @phpstan-method \Aws\Result startUpdateSignalMap(array{
 *     CloudWatchAlarmTemplateGroupIdentifiers?: list<string>,
 *     Description?: string,
 *     DiscoveryEntryPointArn?: string,
 *     EventBridgeRuleTemplateGroupIdentifiers?: list<string>,
 *     ForceRediscovery?: bool,
 *     Identifier?: string,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startUpdateSignalMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startUpdateSignalMapAsync(array{
 *     CloudWatchAlarmTemplateGroupIdentifiers?: list<string>,
 *     Description?: string,
 *     DiscoveryEntryPointArn?: string,
 *     EventBridgeRuleTemplateGroupIdentifiers?: list<string>,
 *     ForceRediscovery?: bool,
 *     Identifier?: string,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCloudWatchAlarmTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateCloudWatchAlarmTemplate(array{
 *     ComparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     DatapointsToAlarm?: int,
 *     Description?: string,
 *     EvaluationPeriods?: int,
 *     GroupIdentifier?: string,
 *     Identifier?: string,
 *     MetricName?: string,
 *     Name?: string,
 *     Period?: int,
 *     Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *     TargetResourceType?: 'CLOUDFRONT_DISTRIBUTION'|'MEDIACONNECT_FLOW'|'MEDIALIVE_CHANNEL'|'MEDIALIVE_INPUT_DEVICE'|'MEDIALIVE_MULTIPLEX'|'MEDIAPACKAGE_CHANNEL'|'MEDIAPACKAGE_ORIGIN_ENDPOINT'|'MEDIATAILOR_PLAYBACK_CONFIGURATION'|'S3_BUCKET',
 *     Threshold?: float,
 *     TreatMissingData?: 'breaching'|'ignore'|'missing'|'notBreaching',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCloudWatchAlarmTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCloudWatchAlarmTemplateAsync(array{
 *     ComparisonOperator?: 'GreaterThanOrEqualToThreshold'|'GreaterThanThreshold'|'LessThanOrEqualToThreshold'|'LessThanThreshold',
 *     DatapointsToAlarm?: int,
 *     Description?: string,
 *     EvaluationPeriods?: int,
 *     GroupIdentifier?: string,
 *     Identifier?: string,
 *     MetricName?: string,
 *     Name?: string,
 *     Period?: int,
 *     Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *     TargetResourceType?: 'CLOUDFRONT_DISTRIBUTION'|'MEDIACONNECT_FLOW'|'MEDIALIVE_CHANNEL'|'MEDIALIVE_INPUT_DEVICE'|'MEDIALIVE_MULTIPLEX'|'MEDIAPACKAGE_CHANNEL'|'MEDIAPACKAGE_ORIGIN_ENDPOINT'|'MEDIATAILOR_PLAYBACK_CONFIGURATION'|'S3_BUCKET',
 *     Threshold?: float,
 *     TreatMissingData?: 'breaching'|'ignore'|'missing'|'notBreaching',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCloudWatchAlarmTemplateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateCloudWatchAlarmTemplateGroup(array{Description?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCloudWatchAlarmTemplateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCloudWatchAlarmTemplateGroupAsync(array{Description?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result updateEventBridgeRuleTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateEventBridgeRuleTemplate(array{
 *     Description?: string,
 *     EventTargets?: list<array{Arn?: string, ...}>,
 *     EventType?: 'MEDIACONNECT_ALERT'|'MEDIACONNECT_FLOW_STATUS_CHANGE'|'MEDIACONNECT_OUTPUT_HEALTH'|'MEDIACONNECT_SOURCE_HEALTH'|'MEDIALIVE_CHANNEL_ALERT'|'MEDIALIVE_CHANNEL_INPUT_CHANGE'|'MEDIALIVE_CHANNEL_STATE_CHANGE'|'MEDIALIVE_MULTIPLEX_ALERT'|'MEDIALIVE_MULTIPLEX_STATE_CHANGE'|'MEDIAPACKAGE_HARVEST_JOB_NOTIFICATION'|'MEDIAPACKAGE_INPUT_NOTIFICATION'|'MEDIAPACKAGE_KEY_PROVIDER_NOTIFICATION'|'SIGNAL_MAP_ACTIVE_ALARM',
 *     GroupIdentifier?: string,
 *     Identifier?: string,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventBridgeRuleTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventBridgeRuleTemplateAsync(array{
 *     Description?: string,
 *     EventTargets?: list<array{Arn?: string, ...}>,
 *     EventType?: 'MEDIACONNECT_ALERT'|'MEDIACONNECT_FLOW_STATUS_CHANGE'|'MEDIACONNECT_OUTPUT_HEALTH'|'MEDIACONNECT_SOURCE_HEALTH'|'MEDIALIVE_CHANNEL_ALERT'|'MEDIALIVE_CHANNEL_INPUT_CHANGE'|'MEDIALIVE_CHANNEL_STATE_CHANGE'|'MEDIALIVE_MULTIPLEX_ALERT'|'MEDIALIVE_MULTIPLEX_STATE_CHANGE'|'MEDIAPACKAGE_HARVEST_JOB_NOTIFICATION'|'MEDIAPACKAGE_INPUT_NOTIFICATION'|'MEDIAPACKAGE_KEY_PROVIDER_NOTIFICATION'|'SIGNAL_MAP_ACTIVE_ALARM',
 *     GroupIdentifier?: string,
 *     Identifier?: string,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventBridgeRuleTemplateGroup(array $args = [])
 * @phpstan-method \Aws\Result updateEventBridgeRuleTemplateGroup(array{Description?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventBridgeRuleTemplateGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventBridgeRuleTemplateGroupAsync(array{Description?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result createChannelPlacementGroup(array $args = [])
 * @phpstan-method \Aws\Result createChannelPlacementGroup(array{
 *     ClusterId?: string,
 *     Name?: string,
 *     Nodes?: list<string>,
 *     RequestId?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelPlacementGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelPlacementGroupAsync(array{
 *     ClusterId?: string,
 *     Name?: string,
 *     Nodes?: list<string>,
 *     RequestId?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     ClusterType?: 'ON_PREMISES',
 *     InstanceRoleArn?: string,
 *     Name?: string,
 *     NetworkSettings?: array{DefaultRoute?: string, InterfaceMappings?: list<array>, ...},
 *     RequestId?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     ClusterType?: 'ON_PREMISES',
 *     InstanceRoleArn?: string,
 *     Name?: string,
 *     NetworkSettings?: array{DefaultRoute?: string, InterfaceMappings?: list<array>, ...},
 *     RequestId?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNetwork(array $args = [])
 * @phpstan-method \Aws\Result createNetwork(array{
 *     IpPools?: list<array{Cidr?: string, ...}>,
 *     Name?: string,
 *     RequestId?: string,
 *     Routes?: list<array{Cidr?: string, Gateway?: string, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNetworkAsync(array{
 *     IpPools?: list<array{Cidr?: string, ...}>,
 *     Name?: string,
 *     RequestId?: string,
 *     Routes?: list<array{Cidr?: string, Gateway?: string, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNode(array $args = [])
 * @phpstan-method \Aws\Result createNode(array{
 *     ClusterId?: string,
 *     Name?: string,
 *     NodeInterfaceMappings?: list<array{
 *         LogicalInterfaceName?: string,
 *         NetworkInterfaceMode?: 'BRIDGE'|'NAT',
 *         PhysicalInterfaceName?: string,
 *         ...,
 *     }>,
 *     RequestId?: string,
 *     Role?: 'ACTIVE'|'BACKUP',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNodeAsync(array{
 *     ClusterId?: string,
 *     Name?: string,
 *     NodeInterfaceMappings?: list<array{
 *         LogicalInterfaceName?: string,
 *         NetworkInterfaceMode?: 'BRIDGE'|'NAT',
 *         PhysicalInterfaceName?: string,
 *         ...,
 *     }>,
 *     RequestId?: string,
 *     Role?: 'ACTIVE'|'BACKUP',
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNodeRegistrationScript(array $args = [])
 * @phpstan-method \Aws\Result createNodeRegistrationScript(array{
 *     ClusterId?: string,
 *     Id?: string,
 *     Name?: string,
 *     NodeInterfaceMappings?: list<array{
 *         LogicalInterfaceName?: string,
 *         NetworkInterfaceMode?: 'BRIDGE'|'NAT',
 *         PhysicalInterfaceName?: string,
 *         PhysicalInterfaceIpAddresses?: list<string>,
 *         ...,
 *     }>,
 *     RequestId?: string,
 *     Role?: 'ACTIVE'|'BACKUP',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNodeRegistrationScriptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNodeRegistrationScriptAsync(array{
 *     ClusterId?: string,
 *     Id?: string,
 *     Name?: string,
 *     NodeInterfaceMappings?: list<array{
 *         LogicalInterfaceName?: string,
 *         NetworkInterfaceMode?: 'BRIDGE'|'NAT',
 *         PhysicalInterfaceName?: string,
 *         PhysicalInterfaceIpAddresses?: list<string>,
 *         ...,
 *     }>,
 *     RequestId?: string,
 *     Role?: 'ACTIVE'|'BACKUP',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteChannelPlacementGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteChannelPlacementGroup(array{ChannelPlacementGroupId?: string, ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelPlacementGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelPlacementGroupAsync(array{ChannelPlacementGroupId?: string, ClusterId?: string, ...} $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{ClusterId?: string, ...} $args = [])
 * @method \Aws\Result deleteNetwork(array $args = [])
 * @phpstan-method \Aws\Result deleteNetwork(array{NetworkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNetworkAsync(array{NetworkId?: string, ...} $args = [])
 * @method \Aws\Result deleteNode(array $args = [])
 * @phpstan-method \Aws\Result deleteNode(array{ClusterId?: string, NodeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNodeAsync(array{ClusterId?: string, NodeId?: string, ...} $args = [])
 * @method \Aws\Result describeChannelPlacementGroup(array $args = [])
 * @phpstan-method \Aws\Result describeChannelPlacementGroup(array{ChannelPlacementGroupId?: string, ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelPlacementGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeChannelPlacementGroupAsync(array{ChannelPlacementGroupId?: string, ClusterId?: string, ...} $args = [])
 * @method \Aws\Result describeCluster(array $args = [])
 * @phpstan-method \Aws\Result describeCluster(array{ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterAsync(array{ClusterId?: string, ...} $args = [])
 * @method \Aws\Result describeNetwork(array $args = [])
 * @phpstan-method \Aws\Result describeNetwork(array{NetworkId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNetworkAsync(array{NetworkId?: string, ...} $args = [])
 * @method \Aws\Result describeNode(array $args = [])
 * @phpstan-method \Aws\Result describeNode(array{ClusterId?: string, NodeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNodeAsync(array{ClusterId?: string, NodeId?: string, ...} $args = [])
 * @method \Aws\Result listChannelPlacementGroups(array $args = [])
 * @phpstan-method \Aws\Result listChannelPlacementGroups(array{ClusterId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelPlacementGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelPlacementGroupsAsync(array{ClusterId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listNetworks(array $args = [])
 * @phpstan-method \Aws\Result listNetworks(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworksAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listNodes(array $args = [])
 * @phpstan-method \Aws\Result listNodes(array{ClusterId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNodesAsync(array{ClusterId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result updateChannelPlacementGroup(array $args = [])
 * @phpstan-method \Aws\Result updateChannelPlacementGroup(array{ChannelPlacementGroupId?: string, ClusterId?: string, Name?: string, Nodes?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelPlacementGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelPlacementGroupAsync(array{ChannelPlacementGroupId?: string, ClusterId?: string, Name?: string, Nodes?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCluster(array $args = [])
 * @phpstan-method \Aws\Result updateCluster(array{
 *     ClusterId?: string,
 *     Name?: string,
 *     NetworkSettings?: array{DefaultRoute?: string, InterfaceMappings?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterAsync(array{
 *     ClusterId?: string,
 *     Name?: string,
 *     NetworkSettings?: array{DefaultRoute?: string, InterfaceMappings?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNetwork(array $args = [])
 * @phpstan-method \Aws\Result updateNetwork(array{
 *     IpPools?: list<array{Cidr?: string, ...}>,
 *     Name?: string,
 *     NetworkId?: string,
 *     Routes?: list<array{Cidr?: string, Gateway?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkAsync(array{
 *     IpPools?: list<array{Cidr?: string, ...}>,
 *     Name?: string,
 *     NetworkId?: string,
 *     Routes?: list<array{Cidr?: string, Gateway?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNode(array $args = [])
 * @phpstan-method \Aws\Result updateNode(array{
 *     ClusterId?: string,
 *     Name?: string,
 *     NodeId?: string,
 *     Role?: 'ACTIVE'|'BACKUP',
 *     SdiSourceMappings?: list<array{CardNumber?: int, ChannelNumber?: int, SdiSource?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNodeAsync(array{
 *     ClusterId?: string,
 *     Name?: string,
 *     NodeId?: string,
 *     Role?: 'ACTIVE'|'BACKUP',
 *     SdiSourceMappings?: list<array{CardNumber?: int, ChannelNumber?: int, SdiSource?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNodeState(array $args = [])
 * @phpstan-method \Aws\Result updateNodeState(array{ClusterId?: string, NodeId?: string, State?: 'ACTIVE'|'DRAINING', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNodeStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNodeStateAsync(array{ClusterId?: string, NodeId?: string, State?: 'ACTIVE'|'DRAINING', ...} $args = [])
 * @method \Aws\Result listVersions(array $args = [])
 * @phpstan-method \Aws\Result listVersions(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVersionsAsync(array{...} $args = [])
 * @method \Aws\Result createSdiSource(array $args = [])
 * @phpstan-method \Aws\Result createSdiSource(array{
 *     Mode?: 'INTERLEAVE'|'QUADRANT',
 *     Name?: string,
 *     RequestId?: string,
 *     Tags?: array<string, string>,
 *     Type?: 'QUAD'|'SINGLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSdiSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSdiSourceAsync(array{
 *     Mode?: 'INTERLEAVE'|'QUADRANT',
 *     Name?: string,
 *     RequestId?: string,
 *     Tags?: array<string, string>,
 *     Type?: 'QUAD'|'SINGLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSdiSource(array $args = [])
 * @phpstan-method \Aws\Result deleteSdiSource(array{SdiSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSdiSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSdiSourceAsync(array{SdiSourceId?: string, ...} $args = [])
 * @method \Aws\Result describeSdiSource(array $args = [])
 * @phpstan-method \Aws\Result describeSdiSource(array{SdiSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSdiSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSdiSourceAsync(array{SdiSourceId?: string, ...} $args = [])
 * @method \Aws\Result listSdiSources(array $args = [])
 * @phpstan-method \Aws\Result listSdiSources(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSdiSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSdiSourcesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result updateSdiSource(array $args = [])
 * @phpstan-method \Aws\Result updateSdiSource(array{Mode?: 'INTERLEAVE'|'QUADRANT', Name?: string, SdiSourceId?: string, Type?: 'QUAD'|'SINGLE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSdiSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSdiSourceAsync(array{Mode?: 'INTERLEAVE'|'QUADRANT', Name?: string, SdiSourceId?: string, Type?: 'QUAD'|'SINGLE', ...} $args = [])
 * @method \Aws\Result listAlerts(array $args = [])
 * @phpstan-method \Aws\Result listAlerts(array{ChannelId?: string, MaxResults?: int, NextToken?: string, StateFilter?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAlertsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAlertsAsync(array{ChannelId?: string, MaxResults?: int, NextToken?: string, StateFilter?: string, ...} $args = [])
 * @method \Aws\Result listClusterAlerts(array $args = [])
 * @phpstan-method \Aws\Result listClusterAlerts(array{ClusterId?: string, MaxResults?: int, NextToken?: string, StateFilter?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClusterAlertsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClusterAlertsAsync(array{ClusterId?: string, MaxResults?: int, NextToken?: string, StateFilter?: string, ...} $args = [])
 * @method \Aws\Result listMultiplexAlerts(array $args = [])
 * @phpstan-method \Aws\Result listMultiplexAlerts(array{MaxResults?: int, MultiplexId?: string, NextToken?: string, StateFilter?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMultiplexAlertsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMultiplexAlertsAsync(array{MaxResults?: int, MultiplexId?: string, NextToken?: string, StateFilter?: string, ...} $args = [])
 */
class MediaLiveClient extends AwsClient {}
