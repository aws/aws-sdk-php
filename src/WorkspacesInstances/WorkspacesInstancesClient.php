<?php
namespace Aws\WorkspacesInstances;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Workspaces Instances** service.
 * @method \Aws\Result associateVolume(array $args = [])
 * @phpstan-method \Aws\Result associateVolume(array{WorkspaceInstanceId?: string, VolumeId?: string, Device?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateVolumeAsync(array{WorkspaceInstanceId?: string, VolumeId?: string, Device?: string, ...} $args = [])
 * @method \Aws\Result createVolume(array $args = [])
 * @phpstan-method \Aws\Result createVolume(array{
 *     AvailabilityZone?: string,
 *     ClientToken?: string,
 *     Encrypted?: bool,
 *     Iops?: int,
 *     KmsKeyId?: string,
 *     SizeInGB?: int,
 *     SnapshotId?: string,
 *     TagSpecifications?: list<array{
 *         ResourceType?: 'instance'|'network-interface'|'spot-instances-request'|'volume',
 *         Tags?: list<array>,
 *         ...,
 *     }>,
 *     Throughput?: int,
 *     VolumeType?: 'gp2'|'gp3'|'io1'|'io2'|'sc1'|'st1'|'standard',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVolumeAsync(array{
 *     AvailabilityZone?: string,
 *     ClientToken?: string,
 *     Encrypted?: bool,
 *     Iops?: int,
 *     KmsKeyId?: string,
 *     SizeInGB?: int,
 *     SnapshotId?: string,
 *     TagSpecifications?: list<array{
 *         ResourceType?: 'instance'|'network-interface'|'spot-instances-request'|'volume',
 *         Tags?: list<array>,
 *         ...,
 *     }>,
 *     Throughput?: int,
 *     VolumeType?: 'gp2'|'gp3'|'io1'|'io2'|'sc1'|'st1'|'standard',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkspaceInstance(array $args = [])
 * @phpstan-method \Aws\Result createWorkspaceInstance(array{
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ManagedInstance?: array{
 *         BlockDeviceMappings?: list<array>,
 *         CapacityReservationSpecification?: array{
 *             CapacityReservationPreference?: 'capacity-reservations-only'|'none'|'open',
 *             CapacityReservationTarget?: array,
 *             ...,
 *         },
 *         CpuOptions?: array{AmdSevSnp?: 'disabled'|'enabled', CoreCount?: int, ThreadsPerCore?: int, ...},
 *         CreditSpecification?: array{CpuCredits?: 'standard'|'unlimited', ...},
 *         DisableApiStop?: bool,
 *         EbsOptimized?: bool,
 *         EnablePrimaryIpv6?: bool,
 *         EnclaveOptions?: array{Enabled?: bool, ...},
 *         HibernationOptions?: array{Configured?: bool, ...},
 *         IamInstanceProfile?: array{Arn?: string, Name?: string, ...},
 *         ImageId?: string,
 *         InstanceMarketOptions?: array{MarketType?: 'capacity-block'|'spot', SpotOptions?: array, ...},
 *         InstanceType?: string,
 *         Ipv6Addresses?: list<array>,
 *         Ipv6AddressCount?: int,
 *         KernelId?: string,
 *         KeyName?: string,
 *         LicenseSpecifications?: list<array>,
 *         MaintenanceOptions?: array{AutoRecovery?: 'default'|'disabled', ...},
 *         MetadataOptions?: array{
 *             HttpEndpoint?: 'disabled'|'enabled',
 *             HttpProtocolIpv6?: 'disabled'|'enabled',
 *             HttpPutResponseHopLimit?: int,
 *             HttpTokens?: 'optional'|'required',
 *             InstanceMetadataTags?: 'disabled'|'enabled',
 *             ...,
 *         },
 *         Monitoring?: array{Enabled?: bool, ...},
 *         NetworkInterfaces?: list<array>,
 *         NetworkPerformanceOptions?: array{BandwidthWeighting?: 'default'|'ebs-1'|'vpc-1', ...},
 *         Placement?: array{
 *             Affinity?: string,
 *             AvailabilityZone?: string,
 *             GroupId?: string,
 *             GroupName?: string,
 *             HostId?: string,
 *             HostResourceGroupArn?: string,
 *             PartitionNumber?: int,
 *             Tenancy?: 'dedicated'|'default'|'host',
 *             ...,
 *         },
 *         PrivateDnsNameOptions?: array{
 *             HostnameType?: 'ip-name'|'resource-name',
 *             EnableResourceNameDnsARecord?: bool,
 *             EnableResourceNameDnsAAAARecord?: bool,
 *             ...,
 *         },
 *         PrivateIpAddress?: string,
 *         RamdiskId?: string,
 *         SecurityGroupIds?: list<string>,
 *         SecurityGroups?: list<string>,
 *         SubnetId?: string,
 *         TagSpecifications?: list<array>,
 *         UserData?: string,
 *         ...,
 *     },
 *     BillingConfiguration?: array{BillingMode?: 'HOURLY'|'MONTHLY', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceInstanceAsync(array{
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ManagedInstance?: array{
 *         BlockDeviceMappings?: list<array>,
 *         CapacityReservationSpecification?: array{
 *             CapacityReservationPreference?: 'capacity-reservations-only'|'none'|'open',
 *             CapacityReservationTarget?: array,
 *             ...,
 *         },
 *         CpuOptions?: array{AmdSevSnp?: 'disabled'|'enabled', CoreCount?: int, ThreadsPerCore?: int, ...},
 *         CreditSpecification?: array{CpuCredits?: 'standard'|'unlimited', ...},
 *         DisableApiStop?: bool,
 *         EbsOptimized?: bool,
 *         EnablePrimaryIpv6?: bool,
 *         EnclaveOptions?: array{Enabled?: bool, ...},
 *         HibernationOptions?: array{Configured?: bool, ...},
 *         IamInstanceProfile?: array{Arn?: string, Name?: string, ...},
 *         ImageId?: string,
 *         InstanceMarketOptions?: array{MarketType?: 'capacity-block'|'spot', SpotOptions?: array, ...},
 *         InstanceType?: string,
 *         Ipv6Addresses?: list<array>,
 *         Ipv6AddressCount?: int,
 *         KernelId?: string,
 *         KeyName?: string,
 *         LicenseSpecifications?: list<array>,
 *         MaintenanceOptions?: array{AutoRecovery?: 'default'|'disabled', ...},
 *         MetadataOptions?: array{
 *             HttpEndpoint?: 'disabled'|'enabled',
 *             HttpProtocolIpv6?: 'disabled'|'enabled',
 *             HttpPutResponseHopLimit?: int,
 *             HttpTokens?: 'optional'|'required',
 *             InstanceMetadataTags?: 'disabled'|'enabled',
 *             ...,
 *         },
 *         Monitoring?: array{Enabled?: bool, ...},
 *         NetworkInterfaces?: list<array>,
 *         NetworkPerformanceOptions?: array{BandwidthWeighting?: 'default'|'ebs-1'|'vpc-1', ...},
 *         Placement?: array{
 *             Affinity?: string,
 *             AvailabilityZone?: string,
 *             GroupId?: string,
 *             GroupName?: string,
 *             HostId?: string,
 *             HostResourceGroupArn?: string,
 *             PartitionNumber?: int,
 *             Tenancy?: 'dedicated'|'default'|'host',
 *             ...,
 *         },
 *         PrivateDnsNameOptions?: array{
 *             HostnameType?: 'ip-name'|'resource-name',
 *             EnableResourceNameDnsARecord?: bool,
 *             EnableResourceNameDnsAAAARecord?: bool,
 *             ...,
 *         },
 *         PrivateIpAddress?: string,
 *         RamdiskId?: string,
 *         SecurityGroupIds?: list<string>,
 *         SecurityGroups?: list<string>,
 *         SubnetId?: string,
 *         TagSpecifications?: list<array>,
 *         UserData?: string,
 *         ...,
 *     },
 *     BillingConfiguration?: array{BillingMode?: 'HOURLY'|'MONTHLY', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteVolume(array $args = [])
 * @phpstan-method \Aws\Result deleteVolume(array{VolumeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVolumeAsync(array{VolumeId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkspaceInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspaceInstance(array{WorkspaceInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceInstanceAsync(array{WorkspaceInstanceId?: string, ...} $args = [])
 * @method \Aws\Result disassociateVolume(array $args = [])
 * @phpstan-method \Aws\Result disassociateVolume(array{
 *     WorkspaceInstanceId?: string,
 *     VolumeId?: string,
 *     Device?: string,
 *     DisassociateMode?: 'FORCE'|'NO_FORCE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateVolumeAsync(array{
 *     WorkspaceInstanceId?: string,
 *     VolumeId?: string,
 *     Device?: string,
 *     DisassociateMode?: 'FORCE'|'NO_FORCE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getWorkspaceInstance(array $args = [])
 * @phpstan-method \Aws\Result getWorkspaceInstance(array{WorkspaceInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkspaceInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkspaceInstanceAsync(array{WorkspaceInstanceId?: string, ...} $args = [])
 * @method \Aws\Result listInstanceTypes(array $args = [])
 * @phpstan-method \Aws\Result listInstanceTypes(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     InstanceConfigurationFilter?: array{
 *         BillingMode?: 'HOURLY'|'MONTHLY',
 *         PlatformType?: 'Linux/UNIX'|'Red Hat BYOL Linux'|'Red Hat Enterprise Linux'|'SUSE Linux'|'Ubuntu Pro Linux'|'Windows'|'Windows BYOL',
 *         Tenancy?: 'DEDICATED'|'SHARED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstanceTypesAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     InstanceConfigurationFilter?: array{
 *         BillingMode?: 'HOURLY'|'MONTHLY',
 *         PlatformType?: 'Linux/UNIX'|'Red Hat BYOL Linux'|'Red Hat Enterprise Linux'|'SUSE Linux'|'Ubuntu Pro Linux'|'Windows'|'Windows BYOL',
 *         Tenancy?: 'DEDICATED'|'SHARED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRegions(array $args = [])
 * @phpstan-method \Aws\Result listRegions(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{WorkspaceInstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{WorkspaceInstanceId?: string, ...} $args = [])
 * @method \Aws\Result listWorkspaceInstances(array $args = [])
 * @phpstan-method \Aws\Result listWorkspaceInstances(array{
 *     ProvisionStates?: list<'ALLOCATED'|'ALLOCATING'|'DEALLOCATED'|'DEALLOCATING'|'ERROR_ALLOCATING'|'ERROR_DEALLOCATING'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkspaceInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkspaceInstancesAsync(array{
 *     ProvisionStates?: list<'ALLOCATED'|'ALLOCATING'|'DEALLOCATED'|'DEALLOCATING'|'ERROR_ALLOCATING'|'ERROR_DEALLOCATING'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{WorkspaceInstanceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{WorkspaceInstanceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{WorkspaceInstanceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{WorkspaceInstanceId?: string, TagKeys?: list<string>, ...} $args = [])
 */
class WorkspacesInstancesClient extends AwsClient {}
