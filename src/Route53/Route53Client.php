<?php
namespace Aws\Route53;

use Aws\AwsClient;
use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **Amazon Route 53** service.
 *
 * @method \Aws\Result activateKeySigningKey(array $args = [])
 * @phpstan-method \Aws\Result activateKeySigningKey(array{HostedZoneId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise activateKeySigningKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateKeySigningKeyAsync(array{HostedZoneId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result associateVPCWithHostedZone(array $args = [])
 * @phpstan-method \Aws\Result associateVPCWithHostedZone(array{
 *     HostedZoneId?: string,
 *     VPC?: array{
 *         VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         VPCId?: string,
 *         ...,
 *     },
 *     Comment?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateVPCWithHostedZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateVPCWithHostedZoneAsync(array{
 *     HostedZoneId?: string,
 *     VPC?: array{
 *         VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         VPCId?: string,
 *         ...,
 *     },
 *     Comment?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result changeCidrCollection(array $args = [])
 * @phpstan-method \Aws\Result changeCidrCollection(array{
 *     Id?: string,
 *     CollectionVersion?: int,
 *     Changes?: list<array{LocationName?: string, Action?: 'DELETE_IF_EXISTS'|'PUT', CidrList?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise changeCidrCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise changeCidrCollectionAsync(array{
 *     Id?: string,
 *     CollectionVersion?: int,
 *     Changes?: list<array{LocationName?: string, Action?: 'DELETE_IF_EXISTS'|'PUT', CidrList?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result changeResourceRecordSets(array $args = [])
 * @phpstan-method \Aws\Result changeResourceRecordSets(array{HostedZoneId?: string, ChangeBatch?: array{Comment?: string, Changes?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise changeResourceRecordSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise changeResourceRecordSetsAsync(array{HostedZoneId?: string, ChangeBatch?: array{Comment?: string, Changes?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result changeTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result changeTagsForResource(array{
 *     ResourceType?: 'healthcheck'|'hostedzone',
 *     ResourceId?: string,
 *     AddTags?: list<array{Key?: string, Value?: string, ...}>,
 *     RemoveTagKeys?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise changeTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise changeTagsForResourceAsync(array{
 *     ResourceType?: 'healthcheck'|'hostedzone',
 *     ResourceId?: string,
 *     AddTags?: list<array{Key?: string, Value?: string, ...}>,
 *     RemoveTagKeys?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCidrCollection(array $args = [])
 * @phpstan-method \Aws\Result createCidrCollection(array{Name?: string, CallerReference?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCidrCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCidrCollectionAsync(array{Name?: string, CallerReference?: string, ...} $args = [])
 * @method \Aws\Result createHealthCheck(array $args = [])
 * @phpstan-method \Aws\Result createHealthCheck(array{
 *     CallerReference?: string,
 *     HealthCheckConfig?: array{
 *         IPAddress?: string,
 *         Port?: int,
 *         Type?: 'CALCULATED'|'CLOUDWATCH_METRIC'|'HTTP'|'HTTPS'|'HTTPS_STR_MATCH'|'HTTP_STR_MATCH'|'RECOVERY_CONTROL'|'TCP',
 *         ResourcePath?: string,
 *         FullyQualifiedDomainName?: string,
 *         SearchString?: string,
 *         RequestInterval?: int,
 *         FailureThreshold?: int,
 *         MeasureLatency?: bool,
 *         Inverted?: bool,
 *         Disabled?: bool,
 *         HealthThreshold?: int,
 *         ChildHealthChecks?: list<string>,
 *         EnableSNI?: bool,
 *         Regions?: list<'ap-northeast-1'|'ap-southeast-1'|'ap-southeast-2'|'eu-west-1'|'sa-east-1'|'us-east-1'|'us-west-1'|'us-west-2'>,
 *         AlarmIdentifier?: array{
 *             Region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *             Name?: string,
 *             ...,
 *         },
 *         InsufficientDataHealthStatus?: 'Healthy'|'LastKnownStatus'|'Unhealthy',
 *         RoutingControlArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHealthCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHealthCheckAsync(array{
 *     CallerReference?: string,
 *     HealthCheckConfig?: array{
 *         IPAddress?: string,
 *         Port?: int,
 *         Type?: 'CALCULATED'|'CLOUDWATCH_METRIC'|'HTTP'|'HTTPS'|'HTTPS_STR_MATCH'|'HTTP_STR_MATCH'|'RECOVERY_CONTROL'|'TCP',
 *         ResourcePath?: string,
 *         FullyQualifiedDomainName?: string,
 *         SearchString?: string,
 *         RequestInterval?: int,
 *         FailureThreshold?: int,
 *         MeasureLatency?: bool,
 *         Inverted?: bool,
 *         Disabled?: bool,
 *         HealthThreshold?: int,
 *         ChildHealthChecks?: list<string>,
 *         EnableSNI?: bool,
 *         Regions?: list<'ap-northeast-1'|'ap-southeast-1'|'ap-southeast-2'|'eu-west-1'|'sa-east-1'|'us-east-1'|'us-west-1'|'us-west-2'>,
 *         AlarmIdentifier?: array{
 *             Region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *             Name?: string,
 *             ...,
 *         },
 *         InsufficientDataHealthStatus?: 'Healthy'|'LastKnownStatus'|'Unhealthy',
 *         RoutingControlArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHostedZone(array $args = [])
 * @phpstan-method \Aws\Result createHostedZone(array{
 *     Name?: string,
 *     VPC?: array{
 *         VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         VPCId?: string,
 *         ...,
 *     },
 *     CallerReference?: string,
 *     HostedZoneConfig?: array{Comment?: string, PrivateZone?: bool, ...},
 *     DelegationSetId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHostedZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHostedZoneAsync(array{
 *     Name?: string,
 *     VPC?: array{
 *         VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         VPCId?: string,
 *         ...,
 *     },
 *     CallerReference?: string,
 *     HostedZoneConfig?: array{Comment?: string, PrivateZone?: bool, ...},
 *     DelegationSetId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKeySigningKey(array $args = [])
 * @phpstan-method \Aws\Result createKeySigningKey(array{
 *     CallerReference?: string,
 *     HostedZoneId?: string,
 *     KeyManagementServiceArn?: string,
 *     Name?: string,
 *     Status?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKeySigningKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKeySigningKeyAsync(array{
 *     CallerReference?: string,
 *     HostedZoneId?: string,
 *     KeyManagementServiceArn?: string,
 *     Name?: string,
 *     Status?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQueryLoggingConfig(array $args = [])
 * @phpstan-method \Aws\Result createQueryLoggingConfig(array{HostedZoneId?: string, CloudWatchLogsLogGroupArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createQueryLoggingConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQueryLoggingConfigAsync(array{HostedZoneId?: string, CloudWatchLogsLogGroupArn?: string, ...} $args = [])
 * @method \Aws\Result createReusableDelegationSet(array $args = [])
 * @phpstan-method \Aws\Result createReusableDelegationSet(array{CallerReference?: string, HostedZoneId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createReusableDelegationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReusableDelegationSetAsync(array{CallerReference?: string, HostedZoneId?: string, ...} $args = [])
 * @method \Aws\Result createTrafficPolicy(array $args = [])
 * @phpstan-method \Aws\Result createTrafficPolicy(array{Name?: string, Document?: string, Comment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrafficPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrafficPolicyAsync(array{Name?: string, Document?: string, Comment?: string, ...} $args = [])
 * @method \Aws\Result createTrafficPolicyInstance(array $args = [])
 * @phpstan-method \Aws\Result createTrafficPolicyInstance(array{
 *     HostedZoneId?: string,
 *     Name?: string,
 *     TTL?: int,
 *     TrafficPolicyId?: string,
 *     TrafficPolicyVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrafficPolicyInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrafficPolicyInstanceAsync(array{
 *     HostedZoneId?: string,
 *     Name?: string,
 *     TTL?: int,
 *     TrafficPolicyId?: string,
 *     TrafficPolicyVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrafficPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result createTrafficPolicyVersion(array{Id?: string, Document?: string, Comment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrafficPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrafficPolicyVersionAsync(array{Id?: string, Document?: string, Comment?: string, ...} $args = [])
 * @method \Aws\Result createVPCAssociationAuthorization(array $args = [])
 * @phpstan-method \Aws\Result createVPCAssociationAuthorization(array{
 *     HostedZoneId?: string,
 *     VPC?: array{
 *         VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         VPCId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVPCAssociationAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVPCAssociationAuthorizationAsync(array{
 *     HostedZoneId?: string,
 *     VPC?: array{
 *         VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         VPCId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deactivateKeySigningKey(array $args = [])
 * @phpstan-method \Aws\Result deactivateKeySigningKey(array{HostedZoneId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateKeySigningKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateKeySigningKeyAsync(array{HostedZoneId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteCidrCollection(array $args = [])
 * @phpstan-method \Aws\Result deleteCidrCollection(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCidrCollectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCidrCollectionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteHealthCheck(array $args = [])
 * @phpstan-method \Aws\Result deleteHealthCheck(array{HealthCheckId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHealthCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHealthCheckAsync(array{HealthCheckId?: string, ...} $args = [])
 * @method \Aws\Result deleteHostedZone(array $args = [])
 * @phpstan-method \Aws\Result deleteHostedZone(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHostedZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHostedZoneAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteKeySigningKey(array $args = [])
 * @phpstan-method \Aws\Result deleteKeySigningKey(array{HostedZoneId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKeySigningKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKeySigningKeyAsync(array{HostedZoneId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteQueryLoggingConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteQueryLoggingConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueryLoggingConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueryLoggingConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteReusableDelegationSet(array $args = [])
 * @phpstan-method \Aws\Result deleteReusableDelegationSet(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReusableDelegationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReusableDelegationSetAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteTrafficPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteTrafficPolicy(array{Id?: string, Version?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrafficPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrafficPolicyAsync(array{Id?: string, Version?: int, ...} $args = [])
 * @method \Aws\Result deleteTrafficPolicyInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteTrafficPolicyInstance(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrafficPolicyInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrafficPolicyInstanceAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result deleteVPCAssociationAuthorization(array $args = [])
 * @phpstan-method \Aws\Result deleteVPCAssociationAuthorization(array{
 *     HostedZoneId?: string,
 *     VPC?: array{
 *         VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         VPCId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVPCAssociationAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVPCAssociationAuthorizationAsync(array{
 *     HostedZoneId?: string,
 *     VPC?: array{
 *         VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         VPCId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result disableHostedZoneDNSSEC(array $args = [])
 * @phpstan-method \Aws\Result disableHostedZoneDNSSEC(array{HostedZoneId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableHostedZoneDNSSECAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableHostedZoneDNSSECAsync(array{HostedZoneId?: string, ...} $args = [])
 * @method \Aws\Result disassociateVPCFromHostedZone(array $args = [])
 * @phpstan-method \Aws\Result disassociateVPCFromHostedZone(array{
 *     HostedZoneId?: string,
 *     VPC?: array{
 *         VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         VPCId?: string,
 *         ...,
 *     },
 *     Comment?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateVPCFromHostedZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateVPCFromHostedZoneAsync(array{
 *     HostedZoneId?: string,
 *     VPC?: array{
 *         VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         VPCId?: string,
 *         ...,
 *     },
 *     Comment?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableHostedZoneDNSSEC(array $args = [])
 * @phpstan-method \Aws\Result enableHostedZoneDNSSEC(array{HostedZoneId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableHostedZoneDNSSECAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableHostedZoneDNSSECAsync(array{HostedZoneId?: string, ...} $args = [])
 * @method \Aws\Result getAccountLimit(array $args = [])
 * @phpstan-method \Aws\Result getAccountLimit(array{
 *     Type?: 'MAX_HEALTH_CHECKS_BY_OWNER'|'MAX_HOSTED_ZONES_BY_OWNER'|'MAX_REUSABLE_DELEGATION_SETS_BY_OWNER'|'MAX_TRAFFIC_POLICIES_BY_OWNER'|'MAX_TRAFFIC_POLICY_INSTANCES_BY_OWNER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountLimitAsync(array{
 *     Type?: 'MAX_HEALTH_CHECKS_BY_OWNER'|'MAX_HOSTED_ZONES_BY_OWNER'|'MAX_REUSABLE_DELEGATION_SETS_BY_OWNER'|'MAX_TRAFFIC_POLICIES_BY_OWNER'|'MAX_TRAFFIC_POLICY_INSTANCES_BY_OWNER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getChange(array $args = [])
 * @phpstan-method \Aws\Result getChange(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChangeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChangeAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getCheckerIpRanges(array $args = [])
 * @phpstan-method \Aws\Result getCheckerIpRanges(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCheckerIpRangesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCheckerIpRangesAsync(array{...} $args = [])
 * @method \Aws\Result getDNSSEC(array $args = [])
 * @phpstan-method \Aws\Result getDNSSEC(array{HostedZoneId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDNSSECAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDNSSECAsync(array{HostedZoneId?: string, ...} $args = [])
 * @method \Aws\Result getGeoLocation(array $args = [])
 * @phpstan-method \Aws\Result getGeoLocation(array{ContinentCode?: string, CountryCode?: string, SubdivisionCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGeoLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGeoLocationAsync(array{ContinentCode?: string, CountryCode?: string, SubdivisionCode?: string, ...} $args = [])
 * @method \Aws\Result getHealthCheck(array $args = [])
 * @phpstan-method \Aws\Result getHealthCheck(array{HealthCheckId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHealthCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHealthCheckAsync(array{HealthCheckId?: string, ...} $args = [])
 * @method \Aws\Result getHealthCheckCount(array $args = [])
 * @phpstan-method \Aws\Result getHealthCheckCount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHealthCheckCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHealthCheckCountAsync(array{...} $args = [])
 * @method \Aws\Result getHealthCheckLastFailureReason(array $args = [])
 * @phpstan-method \Aws\Result getHealthCheckLastFailureReason(array{HealthCheckId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHealthCheckLastFailureReasonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHealthCheckLastFailureReasonAsync(array{HealthCheckId?: string, ...} $args = [])
 * @method \Aws\Result getHealthCheckStatus(array $args = [])
 * @phpstan-method \Aws\Result getHealthCheckStatus(array{HealthCheckId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHealthCheckStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHealthCheckStatusAsync(array{HealthCheckId?: string, ...} $args = [])
 * @method \Aws\Result getHostedZone(array $args = [])
 * @phpstan-method \Aws\Result getHostedZone(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHostedZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHostedZoneAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getHostedZoneCount(array $args = [])
 * @phpstan-method \Aws\Result getHostedZoneCount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHostedZoneCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHostedZoneCountAsync(array{...} $args = [])
 * @method \Aws\Result getHostedZoneLimit(array $args = [])
 * @phpstan-method \Aws\Result getHostedZoneLimit(array{Type?: 'MAX_RRSETS_BY_ZONE'|'MAX_VPCS_ASSOCIATED_BY_ZONE', HostedZoneId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getHostedZoneLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHostedZoneLimitAsync(array{Type?: 'MAX_RRSETS_BY_ZONE'|'MAX_VPCS_ASSOCIATED_BY_ZONE', HostedZoneId?: string, ...} $args = [])
 * @method \Aws\Result getQueryLoggingConfig(array $args = [])
 * @phpstan-method \Aws\Result getQueryLoggingConfig(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryLoggingConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryLoggingConfigAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getReusableDelegationSet(array $args = [])
 * @phpstan-method \Aws\Result getReusableDelegationSet(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReusableDelegationSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReusableDelegationSetAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getReusableDelegationSetLimit(array $args = [])
 * @phpstan-method \Aws\Result getReusableDelegationSetLimit(array{Type?: 'MAX_ZONES_BY_REUSABLE_DELEGATION_SET', DelegationSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getReusableDelegationSetLimitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReusableDelegationSetLimitAsync(array{Type?: 'MAX_ZONES_BY_REUSABLE_DELEGATION_SET', DelegationSetId?: string, ...} $args = [])
 * @method \Aws\Result getTrafficPolicy(array $args = [])
 * @phpstan-method \Aws\Result getTrafficPolicy(array{Id?: string, Version?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrafficPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrafficPolicyAsync(array{Id?: string, Version?: int, ...} $args = [])
 * @method \Aws\Result getTrafficPolicyInstance(array $args = [])
 * @phpstan-method \Aws\Result getTrafficPolicyInstance(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrafficPolicyInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrafficPolicyInstanceAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result getTrafficPolicyInstanceCount(array $args = [])
 * @phpstan-method \Aws\Result getTrafficPolicyInstanceCount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrafficPolicyInstanceCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrafficPolicyInstanceCountAsync(array{...} $args = [])
 * @method \Aws\Result listCidrBlocks(array $args = [])
 * @phpstan-method \Aws\Result listCidrBlocks(array{CollectionId?: string, LocationName?: string, NextToken?: string, MaxResults?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCidrBlocksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCidrBlocksAsync(array{CollectionId?: string, LocationName?: string, NextToken?: string, MaxResults?: string, ...} $args = [])
 * @method \Aws\Result listCidrCollections(array $args = [])
 * @phpstan-method \Aws\Result listCidrCollections(array{NextToken?: string, MaxResults?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCidrCollectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCidrCollectionsAsync(array{NextToken?: string, MaxResults?: string, ...} $args = [])
 * @method \Aws\Result listCidrLocations(array $args = [])
 * @phpstan-method \Aws\Result listCidrLocations(array{CollectionId?: string, NextToken?: string, MaxResults?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCidrLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCidrLocationsAsync(array{CollectionId?: string, NextToken?: string, MaxResults?: string, ...} $args = [])
 * @method \Aws\Result listGeoLocations(array $args = [])
 * @phpstan-method \Aws\Result listGeoLocations(array{
 *     StartContinentCode?: string,
 *     StartCountryCode?: string,
 *     StartSubdivisionCode?: string,
 *     MaxItems?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGeoLocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGeoLocationsAsync(array{
 *     StartContinentCode?: string,
 *     StartCountryCode?: string,
 *     StartSubdivisionCode?: string,
 *     MaxItems?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listHealthChecks(array $args = [])
 * @phpstan-method \Aws\Result listHealthChecks(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHealthChecksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHealthChecksAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listHostedZones(array $args = [])
 * @phpstan-method \Aws\Result listHostedZones(array{Marker?: string, MaxItems?: string, DelegationSetId?: string, HostedZoneType?: 'PrivateHostedZone', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHostedZonesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHostedZonesAsync(array{Marker?: string, MaxItems?: string, DelegationSetId?: string, HostedZoneType?: 'PrivateHostedZone', ...} $args = [])
 * @method \Aws\Result listHostedZonesByName(array $args = [])
 * @phpstan-method \Aws\Result listHostedZonesByName(array{DNSName?: string, HostedZoneId?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listHostedZonesByNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHostedZonesByNameAsync(array{DNSName?: string, HostedZoneId?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listHostedZonesByVPC(array $args = [])
 * @phpstan-method \Aws\Result listHostedZonesByVPC(array{
 *     VPCId?: string,
 *     VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *     MaxItems?: string,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHostedZonesByVPCAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHostedZonesByVPCAsync(array{
 *     VPCId?: string,
 *     VPCRegion?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *     MaxItems?: string,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listQueryLoggingConfigs(array $args = [])
 * @phpstan-method \Aws\Result listQueryLoggingConfigs(array{HostedZoneId?: string, NextToken?: string, MaxResults?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueryLoggingConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueryLoggingConfigsAsync(array{HostedZoneId?: string, NextToken?: string, MaxResults?: string, ...} $args = [])
 * @method \Aws\Result listResourceRecordSets(array $args = [])
 * @phpstan-method \Aws\Result listResourceRecordSets(array{
 *     HostedZoneId?: string,
 *     StartRecordName?: string,
 *     StartRecordType?: 'A'|'AAAA'|'CAA'|'CNAME'|'DS'|'HTTPS'|'MX'|'NAPTR'|'NS'|'PTR'|'SOA'|'SPF'|'SRV'|'SSHFP'|'SVCB'|'TLSA'|'TXT',
 *     StartRecordIdentifier?: string,
 *     MaxItems?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceRecordSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceRecordSetsAsync(array{
 *     HostedZoneId?: string,
 *     StartRecordName?: string,
 *     StartRecordType?: 'A'|'AAAA'|'CAA'|'CNAME'|'DS'|'HTTPS'|'MX'|'NAPTR'|'NS'|'PTR'|'SOA'|'SPF'|'SRV'|'SSHFP'|'SVCB'|'TLSA'|'TXT',
 *     StartRecordIdentifier?: string,
 *     MaxItems?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReusableDelegationSets(array $args = [])
 * @phpstan-method \Aws\Result listReusableDelegationSets(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReusableDelegationSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReusableDelegationSetsAsync(array{Marker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceType?: 'healthcheck'|'hostedzone', ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceType?: 'healthcheck'|'hostedzone', ResourceId?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResources(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResources(array{ResourceType?: 'healthcheck'|'hostedzone', ResourceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourcesAsync(array{ResourceType?: 'healthcheck'|'hostedzone', ResourceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result listTrafficPolicies(array $args = [])
 * @phpstan-method \Aws\Result listTrafficPolicies(array{TrafficPolicyIdMarker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrafficPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrafficPoliciesAsync(array{TrafficPolicyIdMarker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listTrafficPolicyInstances(array $args = [])
 * @phpstan-method \Aws\Result listTrafficPolicyInstances(array{
 *     HostedZoneIdMarker?: string,
 *     TrafficPolicyInstanceNameMarker?: string,
 *     TrafficPolicyInstanceTypeMarker?: 'A'|'AAAA'|'CAA'|'CNAME'|'DS'|'HTTPS'|'MX'|'NAPTR'|'NS'|'PTR'|'SOA'|'SPF'|'SRV'|'SSHFP'|'SVCB'|'TLSA'|'TXT',
 *     MaxItems?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrafficPolicyInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrafficPolicyInstancesAsync(array{
 *     HostedZoneIdMarker?: string,
 *     TrafficPolicyInstanceNameMarker?: string,
 *     TrafficPolicyInstanceTypeMarker?: 'A'|'AAAA'|'CAA'|'CNAME'|'DS'|'HTTPS'|'MX'|'NAPTR'|'NS'|'PTR'|'SOA'|'SPF'|'SRV'|'SSHFP'|'SVCB'|'TLSA'|'TXT',
 *     MaxItems?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTrafficPolicyInstancesByHostedZone(array $args = [])
 * @phpstan-method \Aws\Result listTrafficPolicyInstancesByHostedZone(array{
 *     HostedZoneId?: string,
 *     TrafficPolicyInstanceNameMarker?: string,
 *     TrafficPolicyInstanceTypeMarker?: 'A'|'AAAA'|'CAA'|'CNAME'|'DS'|'HTTPS'|'MX'|'NAPTR'|'NS'|'PTR'|'SOA'|'SPF'|'SRV'|'SSHFP'|'SVCB'|'TLSA'|'TXT',
 *     MaxItems?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrafficPolicyInstancesByHostedZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrafficPolicyInstancesByHostedZoneAsync(array{
 *     HostedZoneId?: string,
 *     TrafficPolicyInstanceNameMarker?: string,
 *     TrafficPolicyInstanceTypeMarker?: 'A'|'AAAA'|'CAA'|'CNAME'|'DS'|'HTTPS'|'MX'|'NAPTR'|'NS'|'PTR'|'SOA'|'SPF'|'SRV'|'SSHFP'|'SVCB'|'TLSA'|'TXT',
 *     MaxItems?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTrafficPolicyInstancesByPolicy(array $args = [])
 * @phpstan-method \Aws\Result listTrafficPolicyInstancesByPolicy(array{
 *     TrafficPolicyId?: string,
 *     TrafficPolicyVersion?: int,
 *     HostedZoneIdMarker?: string,
 *     TrafficPolicyInstanceNameMarker?: string,
 *     TrafficPolicyInstanceTypeMarker?: 'A'|'AAAA'|'CAA'|'CNAME'|'DS'|'HTTPS'|'MX'|'NAPTR'|'NS'|'PTR'|'SOA'|'SPF'|'SRV'|'SSHFP'|'SVCB'|'TLSA'|'TXT',
 *     MaxItems?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrafficPolicyInstancesByPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrafficPolicyInstancesByPolicyAsync(array{
 *     TrafficPolicyId?: string,
 *     TrafficPolicyVersion?: int,
 *     HostedZoneIdMarker?: string,
 *     TrafficPolicyInstanceNameMarker?: string,
 *     TrafficPolicyInstanceTypeMarker?: 'A'|'AAAA'|'CAA'|'CNAME'|'DS'|'HTTPS'|'MX'|'NAPTR'|'NS'|'PTR'|'SOA'|'SPF'|'SRV'|'SSHFP'|'SVCB'|'TLSA'|'TXT',
 *     MaxItems?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTrafficPolicyVersions(array $args = [])
 * @phpstan-method \Aws\Result listTrafficPolicyVersions(array{Id?: string, TrafficPolicyVersionMarker?: string, MaxItems?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrafficPolicyVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrafficPolicyVersionsAsync(array{Id?: string, TrafficPolicyVersionMarker?: string, MaxItems?: string, ...} $args = [])
 * @method \Aws\Result listVPCAssociationAuthorizations(array $args = [])
 * @phpstan-method \Aws\Result listVPCAssociationAuthorizations(array{HostedZoneId?: string, NextToken?: string, MaxResults?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVPCAssociationAuthorizationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVPCAssociationAuthorizationsAsync(array{HostedZoneId?: string, NextToken?: string, MaxResults?: string, ...} $args = [])
 * @method \Aws\Result testDNSAnswer(array $args = [])
 * @phpstan-method \Aws\Result testDNSAnswer(array{
 *     HostedZoneId?: string,
 *     RecordName?: string,
 *     RecordType?: 'A'|'AAAA'|'CAA'|'CNAME'|'DS'|'HTTPS'|'MX'|'NAPTR'|'NS'|'PTR'|'SOA'|'SPF'|'SRV'|'SSHFP'|'SVCB'|'TLSA'|'TXT',
 *     ResolverIP?: string,
 *     EDNS0ClientSubnetIP?: string,
 *     EDNS0ClientSubnetMask?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testDNSAnswerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testDNSAnswerAsync(array{
 *     HostedZoneId?: string,
 *     RecordName?: string,
 *     RecordType?: 'A'|'AAAA'|'CAA'|'CNAME'|'DS'|'HTTPS'|'MX'|'NAPTR'|'NS'|'PTR'|'SOA'|'SPF'|'SRV'|'SSHFP'|'SVCB'|'TLSA'|'TXT',
 *     ResolverIP?: string,
 *     EDNS0ClientSubnetIP?: string,
 *     EDNS0ClientSubnetMask?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHealthCheck(array $args = [])
 * @phpstan-method \Aws\Result updateHealthCheck(array{
 *     HealthCheckId?: string,
 *     HealthCheckVersion?: int,
 *     IPAddress?: string,
 *     Port?: int,
 *     ResourcePath?: string,
 *     FullyQualifiedDomainName?: string,
 *     SearchString?: string,
 *     FailureThreshold?: int,
 *     Inverted?: bool,
 *     Disabled?: bool,
 *     HealthThreshold?: int,
 *     ChildHealthChecks?: list<string>,
 *     EnableSNI?: bool,
 *     Regions?: list<'ap-northeast-1'|'ap-southeast-1'|'ap-southeast-2'|'eu-west-1'|'sa-east-1'|'us-east-1'|'us-west-1'|'us-west-2'>,
 *     AlarmIdentifier?: array{
 *         Region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         Name?: string,
 *         ...,
 *     },
 *     InsufficientDataHealthStatus?: 'Healthy'|'LastKnownStatus'|'Unhealthy',
 *     ResetElements?: list<'ChildHealthChecks'|'FullyQualifiedDomainName'|'Regions'|'ResourcePath'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHealthCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHealthCheckAsync(array{
 *     HealthCheckId?: string,
 *     HealthCheckVersion?: int,
 *     IPAddress?: string,
 *     Port?: int,
 *     ResourcePath?: string,
 *     FullyQualifiedDomainName?: string,
 *     SearchString?: string,
 *     FailureThreshold?: int,
 *     Inverted?: bool,
 *     Disabled?: bool,
 *     HealthThreshold?: int,
 *     ChildHealthChecks?: list<string>,
 *     EnableSNI?: bool,
 *     Regions?: list<'ap-northeast-1'|'ap-southeast-1'|'ap-southeast-2'|'eu-west-1'|'sa-east-1'|'us-east-1'|'us-west-1'|'us-west-2'>,
 *     AlarmIdentifier?: array{
 *         Region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-6'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'cn-north-1'|'cn-northwest-1'|'eu-central-1'|'eu-central-2'|'eu-isoe-west-1'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'eusc-de-east-1'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-gov-east-1'|'us-gov-west-1'|'us-iso-east-1'|'us-iso-west-1'|'us-isob-east-1'|'us-isob-west-1'|'us-isof-east-1'|'us-isof-south-1'|'us-west-1'|'us-west-2',
 *         Name?: string,
 *         ...,
 *     },
 *     InsufficientDataHealthStatus?: 'Healthy'|'LastKnownStatus'|'Unhealthy',
 *     ResetElements?: list<'ChildHealthChecks'|'FullyQualifiedDomainName'|'Regions'|'ResourcePath'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHostedZoneComment(array $args = [])
 * @phpstan-method \Aws\Result updateHostedZoneComment(array{Id?: string, Comment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHostedZoneCommentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHostedZoneCommentAsync(array{Id?: string, Comment?: string, ...} $args = [])
 * @method \Aws\Result updateHostedZoneFeatures(array $args = [])
 * @phpstan-method \Aws\Result updateHostedZoneFeatures(array{HostedZoneId?: string, EnableAcceleratedRecovery?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHostedZoneFeaturesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHostedZoneFeaturesAsync(array{HostedZoneId?: string, EnableAcceleratedRecovery?: bool, ...} $args = [])
 * @method \Aws\Result updateTrafficPolicyComment(array $args = [])
 * @phpstan-method \Aws\Result updateTrafficPolicyComment(array{Id?: string, Version?: int, Comment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrafficPolicyCommentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrafficPolicyCommentAsync(array{Id?: string, Version?: int, Comment?: string, ...} $args = [])
 * @method \Aws\Result updateTrafficPolicyInstance(array $args = [])
 * @phpstan-method \Aws\Result updateTrafficPolicyInstance(array{Id?: string, TTL?: int, TrafficPolicyId?: string, TrafficPolicyVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrafficPolicyInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrafficPolicyInstanceAsync(array{Id?: string, TTL?: int, TrafficPolicyId?: string, TrafficPolicyVersion?: int, ...} $args = [])
 */
class Route53Client extends AwsClient
{
    public function __construct(array $args)
    {
        parent::__construct($args);
        $this->getHandlerList()->appendInit($this->cleanIdFn(), 'route53.clean_id');
    }

    private function cleanIdFn()
    {
        return static function (callable $handler) {
            return static function (CommandInterface $c, ?RequestInterface $r = null) use ($handler) {
                foreach (['Id', 'HostedZoneId', 'DelegationSetId'] as $clean) {
                    if ($c->hasParam($clean)) {
                        $c[$clean] = self::cleanId($c[$clean]);
                    }
                }
                return $handler($c, $r);
            };
        };
    }

    private static function cleanId($id)
    {
        static $toClean = ['/hostedzone/', '/change/', '/delegationset/'];

        return str_replace($toClean, '', $id);
    }
}
