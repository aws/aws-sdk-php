<?php
namespace Aws\BackupGateway;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Backup Gateway** service.
 * @method \Aws\Result associateGatewayToServer(array $args = [])
 * @phpstan-method \Aws\Result associateGatewayToServer(array{GatewayArn?: string, ServerArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateGatewayToServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateGatewayToServerAsync(array{GatewayArn?: string, ServerArn?: string, ...} $args = [])
 * @method \Aws\Result createGateway(array $args = [])
 * @phpstan-method \Aws\Result createGateway(array{
 *     ActivationKey?: string,
 *     GatewayDisplayName?: string,
 *     GatewayType?: 'BACKUP_VM',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGatewayAsync(array{
 *     ActivationKey?: string,
 *     GatewayDisplayName?: string,
 *     GatewayType?: 'BACKUP_VM',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGateway(array $args = [])
 * @phpstan-method \Aws\Result deleteGateway(array{GatewayArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array{GatewayArn?: string, ...} $args = [])
 * @method \Aws\Result deleteHypervisor(array $args = [])
 * @phpstan-method \Aws\Result deleteHypervisor(array{HypervisorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHypervisorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHypervisorAsync(array{HypervisorArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateGatewayFromServer(array $args = [])
 * @phpstan-method \Aws\Result disassociateGatewayFromServer(array{GatewayArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateGatewayFromServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateGatewayFromServerAsync(array{GatewayArn?: string, ...} $args = [])
 * @method \Aws\Result getBandwidthRateLimitSchedule(array $args = [])
 * @phpstan-method \Aws\Result getBandwidthRateLimitSchedule(array{GatewayArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBandwidthRateLimitScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBandwidthRateLimitScheduleAsync(array{GatewayArn?: string, ...} $args = [])
 * @method \Aws\Result getGateway(array $args = [])
 * @phpstan-method \Aws\Result getGateway(array{GatewayArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGatewayAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGatewayAsync(array{GatewayArn?: string, ...} $args = [])
 * @method \Aws\Result getHypervisor(array $args = [])
 * @phpstan-method \Aws\Result getHypervisor(array{HypervisorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHypervisorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHypervisorAsync(array{HypervisorArn?: string, ...} $args = [])
 * @method \Aws\Result getHypervisorPropertyMappings(array $args = [])
 * @phpstan-method \Aws\Result getHypervisorPropertyMappings(array{HypervisorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHypervisorPropertyMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHypervisorPropertyMappingsAsync(array{HypervisorArn?: string, ...} $args = [])
 * @method \Aws\Result getVirtualMachine(array $args = [])
 * @phpstan-method \Aws\Result getVirtualMachine(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVirtualMachineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVirtualMachineAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result importHypervisorConfiguration(array $args = [])
 * @phpstan-method \Aws\Result importHypervisorConfiguration(array{
 *     Name?: string,
 *     Host?: string,
 *     Username?: string,
 *     Password?: string,
 *     KmsKeyArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importHypervisorConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importHypervisorConfigurationAsync(array{
 *     Name?: string,
 *     Host?: string,
 *     Username?: string,
 *     Password?: string,
 *     KmsKeyArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listGateways(array $args = [])
 * @phpstan-method \Aws\Result listGateways(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGatewaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGatewaysAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listHypervisors(array $args = [])
 * @phpstan-method \Aws\Result listHypervisors(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHypervisorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHypervisorsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVirtualMachines(array $args = [])
 * @phpstan-method \Aws\Result listVirtualMachines(array{HypervisorArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVirtualMachinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVirtualMachinesAsync(array{HypervisorArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result putBandwidthRateLimitSchedule(array $args = [])
 * @phpstan-method \Aws\Result putBandwidthRateLimitSchedule(array{
 *     GatewayArn?: string,
 *     BandwidthRateLimitIntervals?: list<array{
 *         AverageUploadRateLimitInBitsPerSec?: int,
 *         StartHourOfDay?: int,
 *         EndHourOfDay?: int,
 *         StartMinuteOfHour?: int,
 *         EndMinuteOfHour?: int,
 *         DaysOfWeek?: list<int>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBandwidthRateLimitScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBandwidthRateLimitScheduleAsync(array{
 *     GatewayArn?: string,
 *     BandwidthRateLimitIntervals?: list<array{
 *         AverageUploadRateLimitInBitsPerSec?: int,
 *         StartHourOfDay?: int,
 *         EndHourOfDay?: int,
 *         StartMinuteOfHour?: int,
 *         EndMinuteOfHour?: int,
 *         DaysOfWeek?: list<int>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putHypervisorPropertyMappings(array $args = [])
 * @phpstan-method \Aws\Result putHypervisorPropertyMappings(array{
 *     HypervisorArn?: string,
 *     VmwareToAwsTagMappings?: list<array{VmwareCategory?: string, VmwareTagName?: string, AwsTagKey?: string, AwsTagValue?: string, ...}>,
 *     IamRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putHypervisorPropertyMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putHypervisorPropertyMappingsAsync(array{
 *     HypervisorArn?: string,
 *     VmwareToAwsTagMappings?: list<array{VmwareCategory?: string, VmwareTagName?: string, AwsTagKey?: string, AwsTagValue?: string, ...}>,
 *     IamRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putMaintenanceStartTime(array $args = [])
 * @phpstan-method \Aws\Result putMaintenanceStartTime(array{GatewayArn?: string, HourOfDay?: int, MinuteOfHour?: int, DayOfWeek?: int, DayOfMonth?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putMaintenanceStartTimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMaintenanceStartTimeAsync(array{GatewayArn?: string, HourOfDay?: int, MinuteOfHour?: int, DayOfWeek?: int, DayOfMonth?: int, ...} $args = [])
 * @method \Aws\Result startVirtualMachinesMetadataSync(array $args = [])
 * @phpstan-method \Aws\Result startVirtualMachinesMetadataSync(array{HypervisorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startVirtualMachinesMetadataSyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startVirtualMachinesMetadataSyncAsync(array{HypervisorArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result testHypervisorConfiguration(array $args = [])
 * @phpstan-method \Aws\Result testHypervisorConfiguration(array{GatewayArn?: string, Host?: string, Username?: string, Password?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise testHypervisorConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testHypervisorConfigurationAsync(array{GatewayArn?: string, Host?: string, Username?: string, Password?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateGatewayInformation(array $args = [])
 * @phpstan-method \Aws\Result updateGatewayInformation(array{GatewayArn?: string, GatewayDisplayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewayInformationAsync(array{GatewayArn?: string, GatewayDisplayName?: string, ...} $args = [])
 * @method \Aws\Result updateGatewaySoftwareNow(array $args = [])
 * @phpstan-method \Aws\Result updateGatewaySoftwareNow(array{GatewayArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewaySoftwareNowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewaySoftwareNowAsync(array{GatewayArn?: string, ...} $args = [])
 * @method \Aws\Result updateHypervisor(array $args = [])
 * @phpstan-method \Aws\Result updateHypervisor(array{
 *     HypervisorArn?: string,
 *     Host?: string,
 *     Username?: string,
 *     Password?: string,
 *     Name?: string,
 *     LogGroupArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHypervisorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHypervisorAsync(array{
 *     HypervisorArn?: string,
 *     Host?: string,
 *     Username?: string,
 *     Password?: string,
 *     Name?: string,
 *     LogGroupArn?: string,
 *     ...,
 * } $args = [])
 */
class BackupGatewayClient extends AwsClient {}
