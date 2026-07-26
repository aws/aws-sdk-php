<?php
namespace Aws\AppRunner;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS App Runner** service.
 * @method \Aws\Result associateCustomDomain(array $args = [])
 * @phpstan-method \Aws\Result associateCustomDomain(array{ServiceArn?: string, DomainName?: string, EnableWWWSubdomain?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateCustomDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateCustomDomainAsync(array{ServiceArn?: string, DomainName?: string, EnableWWWSubdomain?: bool, ...} $args = [])
 * @method \Aws\Result createAutoScalingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createAutoScalingConfiguration(array{
 *     AutoScalingConfigurationName?: string,
 *     MaxConcurrency?: int,
 *     MinSize?: int,
 *     MaxSize?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutoScalingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutoScalingConfigurationAsync(array{
 *     AutoScalingConfigurationName?: string,
 *     MaxConcurrency?: int,
 *     MinSize?: int,
 *     MaxSize?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @phpstan-method \Aws\Result createConnection(array{
 *     ConnectionName?: string,
 *     ProviderType?: 'BITBUCKET'|'GITHUB',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionAsync(array{
 *     ConnectionName?: string,
 *     ProviderType?: 'BITBUCKET'|'GITHUB',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createObservabilityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createObservabilityConfiguration(array{
 *     ObservabilityConfigurationName?: string,
 *     TraceConfiguration?: array{Vendor?: 'AWSXRAY', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createObservabilityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createObservabilityConfigurationAsync(array{
 *     ObservabilityConfigurationName?: string,
 *     TraceConfiguration?: array{Vendor?: 'AWSXRAY', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createService(array $args = [])
 * @phpstan-method \Aws\Result createService(array{
 *     ServiceName?: string,
 *     SourceConfiguration?: array{
 *         CodeRepository?: array{
 *             RepositoryUrl?: string,
 *             SourceCodeVersion?: array,
 *             CodeConfiguration?: array,
 *             SourceDirectory?: string,
 *             ...,
 *         },
 *         ImageRepository?: array{ImageIdentifier?: string, ImageConfiguration?: array, ImageRepositoryType?: 'ECR'|'ECR_PUBLIC', ...},
 *         AutoDeploymentsEnabled?: bool,
 *         AuthenticationConfiguration?: array{ConnectionArn?: string, AccessRoleArn?: string, ...},
 *         ...,
 *     },
 *     InstanceConfiguration?: array{Cpu?: string, Memory?: string, InstanceRoleArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EncryptionConfiguration?: array{KmsKey?: string, ...},
 *     HealthCheckConfiguration?: array{
 *         Protocol?: 'HTTP'|'TCP',
 *         Path?: string,
 *         Interval?: int,
 *         Timeout?: int,
 *         HealthyThreshold?: int,
 *         UnhealthyThreshold?: int,
 *         ...,
 *     },
 *     AutoScalingConfigurationArn?: string,
 *     NetworkConfiguration?: array{
 *         EgressConfiguration?: array{EgressType?: 'DEFAULT'|'VPC', VpcConnectorArn?: string, ...},
 *         IngressConfiguration?: array{IsPubliclyAccessible?: bool, ...},
 *         IpAddressType?: 'DUAL_STACK'|'IPV4',
 *         ...,
 *     },
 *     ObservabilityConfiguration?: array{ObservabilityEnabled?: bool, ObservabilityConfigurationArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceAsync(array{
 *     ServiceName?: string,
 *     SourceConfiguration?: array{
 *         CodeRepository?: array{
 *             RepositoryUrl?: string,
 *             SourceCodeVersion?: array,
 *             CodeConfiguration?: array,
 *             SourceDirectory?: string,
 *             ...,
 *         },
 *         ImageRepository?: array{ImageIdentifier?: string, ImageConfiguration?: array, ImageRepositoryType?: 'ECR'|'ECR_PUBLIC', ...},
 *         AutoDeploymentsEnabled?: bool,
 *         AuthenticationConfiguration?: array{ConnectionArn?: string, AccessRoleArn?: string, ...},
 *         ...,
 *     },
 *     InstanceConfiguration?: array{Cpu?: string, Memory?: string, InstanceRoleArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EncryptionConfiguration?: array{KmsKey?: string, ...},
 *     HealthCheckConfiguration?: array{
 *         Protocol?: 'HTTP'|'TCP',
 *         Path?: string,
 *         Interval?: int,
 *         Timeout?: int,
 *         HealthyThreshold?: int,
 *         UnhealthyThreshold?: int,
 *         ...,
 *     },
 *     AutoScalingConfigurationArn?: string,
 *     NetworkConfiguration?: array{
 *         EgressConfiguration?: array{EgressType?: 'DEFAULT'|'VPC', VpcConnectorArn?: string, ...},
 *         IngressConfiguration?: array{IsPubliclyAccessible?: bool, ...},
 *         IpAddressType?: 'DUAL_STACK'|'IPV4',
 *         ...,
 *     },
 *     ObservabilityConfiguration?: array{ObservabilityEnabled?: bool, ObservabilityConfigurationArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcConnector(array $args = [])
 * @phpstan-method \Aws\Result createVpcConnector(array{
 *     VpcConnectorName?: string,
 *     Subnets?: list<string>,
 *     SecurityGroups?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcConnectorAsync(array{
 *     VpcConnectorName?: string,
 *     Subnets?: list<string>,
 *     SecurityGroups?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcIngressConnection(array $args = [])
 * @phpstan-method \Aws\Result createVpcIngressConnection(array{
 *     ServiceArn?: string,
 *     VpcIngressConnectionName?: string,
 *     IngressVpcConfiguration?: array{VpcId?: string, VpcEndpointId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcIngressConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcIngressConnectionAsync(array{
 *     ServiceArn?: string,
 *     VpcIngressConnectionName?: string,
 *     IngressVpcConfiguration?: array{VpcId?: string, VpcEndpointId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAutoScalingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteAutoScalingConfiguration(array{AutoScalingConfigurationArn?: string, DeleteAllRevisions?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAutoScalingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAutoScalingConfigurationAsync(array{AutoScalingConfigurationArn?: string, DeleteAllRevisions?: bool, ...} $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{ConnectionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{ConnectionArn?: string, ...} $args = [])
 * @method \Aws\Result deleteObservabilityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteObservabilityConfiguration(array{ObservabilityConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteObservabilityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteObservabilityConfigurationAsync(array{ObservabilityConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteService(array $args = [])
 * @phpstan-method \Aws\Result deleteService(array{ServiceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceAsync(array{ServiceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcConnector(array{VpcConnectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcConnectorAsync(array{VpcConnectorArn?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcIngressConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcIngressConnection(array{VpcIngressConnectionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcIngressConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcIngressConnectionAsync(array{VpcIngressConnectionArn?: string, ...} $args = [])
 * @method \Aws\Result describeAutoScalingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeAutoScalingConfiguration(array{AutoScalingConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutoScalingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAutoScalingConfigurationAsync(array{AutoScalingConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result describeCustomDomains(array $args = [])
 * @phpstan-method \Aws\Result describeCustomDomains(array{ServiceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomDomainsAsync(array{ServiceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeObservabilityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeObservabilityConfiguration(array{ObservabilityConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeObservabilityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeObservabilityConfigurationAsync(array{ObservabilityConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result describeService(array $args = [])
 * @phpstan-method \Aws\Result describeService(array{ServiceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceAsync(array{ServiceArn?: string, ...} $args = [])
 * @method \Aws\Result describeVpcConnector(array $args = [])
 * @phpstan-method \Aws\Result describeVpcConnector(array{VpcConnectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVpcConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVpcConnectorAsync(array{VpcConnectorArn?: string, ...} $args = [])
 * @method \Aws\Result describeVpcIngressConnection(array $args = [])
 * @phpstan-method \Aws\Result describeVpcIngressConnection(array{VpcIngressConnectionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVpcIngressConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVpcIngressConnectionAsync(array{VpcIngressConnectionArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateCustomDomain(array $args = [])
 * @phpstan-method \Aws\Result disassociateCustomDomain(array{ServiceArn?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateCustomDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateCustomDomainAsync(array{ServiceArn?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result listAutoScalingConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listAutoScalingConfigurations(array{AutoScalingConfigurationName?: string, LatestOnly?: bool, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutoScalingConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutoScalingConfigurationsAsync(array{AutoScalingConfigurationName?: string, LatestOnly?: bool, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConnections(array $args = [])
 * @phpstan-method \Aws\Result listConnections(array{ConnectionName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectionsAsync(array{ConnectionName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listObservabilityConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listObservabilityConfigurations(array{ObservabilityConfigurationName?: string, LatestOnly?: bool, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listObservabilityConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObservabilityConfigurationsAsync(array{ObservabilityConfigurationName?: string, LatestOnly?: bool, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listOperations(array $args = [])
 * @phpstan-method \Aws\Result listOperations(array{ServiceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOperationsAsync(array{ServiceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listServicesForAutoScalingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result listServicesForAutoScalingConfiguration(array{AutoScalingConfigurationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesForAutoScalingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesForAutoScalingConfigurationAsync(array{AutoScalingConfigurationArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVpcConnectors(array $args = [])
 * @phpstan-method \Aws\Result listVpcConnectors(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVpcConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVpcConnectorsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listVpcIngressConnections(array $args = [])
 * @phpstan-method \Aws\Result listVpcIngressConnections(array{
 *     Filter?: array{ServiceArn?: string, VpcEndpointId?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listVpcIngressConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVpcIngressConnectionsAsync(array{
 *     Filter?: array{ServiceArn?: string, VpcEndpointId?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result pauseService(array $args = [])
 * @phpstan-method \Aws\Result pauseService(array{ServiceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise pauseServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pauseServiceAsync(array{ServiceArn?: string, ...} $args = [])
 * @method \Aws\Result resumeService(array $args = [])
 * @phpstan-method \Aws\Result resumeService(array{ServiceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeServiceAsync(array{ServiceArn?: string, ...} $args = [])
 * @method \Aws\Result startDeployment(array $args = [])
 * @phpstan-method \Aws\Result startDeployment(array{ServiceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDeploymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDeploymentAsync(array{ServiceArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDefaultAutoScalingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateDefaultAutoScalingConfiguration(array{AutoScalingConfigurationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDefaultAutoScalingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDefaultAutoScalingConfigurationAsync(array{AutoScalingConfigurationArn?: string, ...} $args = [])
 * @method \Aws\Result updateService(array $args = [])
 * @phpstan-method \Aws\Result updateService(array{
 *     ServiceArn?: string,
 *     SourceConfiguration?: array{
 *         CodeRepository?: array{
 *             RepositoryUrl?: string,
 *             SourceCodeVersion?: array,
 *             CodeConfiguration?: array,
 *             SourceDirectory?: string,
 *             ...,
 *         },
 *         ImageRepository?: array{ImageIdentifier?: string, ImageConfiguration?: array, ImageRepositoryType?: 'ECR'|'ECR_PUBLIC', ...},
 *         AutoDeploymentsEnabled?: bool,
 *         AuthenticationConfiguration?: array{ConnectionArn?: string, AccessRoleArn?: string, ...},
 *         ...,
 *     },
 *     InstanceConfiguration?: array{Cpu?: string, Memory?: string, InstanceRoleArn?: string, ...},
 *     AutoScalingConfigurationArn?: string,
 *     HealthCheckConfiguration?: array{
 *         Protocol?: 'HTTP'|'TCP',
 *         Path?: string,
 *         Interval?: int,
 *         Timeout?: int,
 *         HealthyThreshold?: int,
 *         UnhealthyThreshold?: int,
 *         ...,
 *     },
 *     NetworkConfiguration?: array{
 *         EgressConfiguration?: array{EgressType?: 'DEFAULT'|'VPC', VpcConnectorArn?: string, ...},
 *         IngressConfiguration?: array{IsPubliclyAccessible?: bool, ...},
 *         IpAddressType?: 'DUAL_STACK'|'IPV4',
 *         ...,
 *     },
 *     ObservabilityConfiguration?: array{ObservabilityEnabled?: bool, ObservabilityConfigurationArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceAsync(array{
 *     ServiceArn?: string,
 *     SourceConfiguration?: array{
 *         CodeRepository?: array{
 *             RepositoryUrl?: string,
 *             SourceCodeVersion?: array,
 *             CodeConfiguration?: array,
 *             SourceDirectory?: string,
 *             ...,
 *         },
 *         ImageRepository?: array{ImageIdentifier?: string, ImageConfiguration?: array, ImageRepositoryType?: 'ECR'|'ECR_PUBLIC', ...},
 *         AutoDeploymentsEnabled?: bool,
 *         AuthenticationConfiguration?: array{ConnectionArn?: string, AccessRoleArn?: string, ...},
 *         ...,
 *     },
 *     InstanceConfiguration?: array{Cpu?: string, Memory?: string, InstanceRoleArn?: string, ...},
 *     AutoScalingConfigurationArn?: string,
 *     HealthCheckConfiguration?: array{
 *         Protocol?: 'HTTP'|'TCP',
 *         Path?: string,
 *         Interval?: int,
 *         Timeout?: int,
 *         HealthyThreshold?: int,
 *         UnhealthyThreshold?: int,
 *         ...,
 *     },
 *     NetworkConfiguration?: array{
 *         EgressConfiguration?: array{EgressType?: 'DEFAULT'|'VPC', VpcConnectorArn?: string, ...},
 *         IngressConfiguration?: array{IsPubliclyAccessible?: bool, ...},
 *         IpAddressType?: 'DUAL_STACK'|'IPV4',
 *         ...,
 *     },
 *     ObservabilityConfiguration?: array{ObservabilityEnabled?: bool, ObservabilityConfigurationArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVpcIngressConnection(array $args = [])
 * @phpstan-method \Aws\Result updateVpcIngressConnection(array{
 *     VpcIngressConnectionArn?: string,
 *     IngressVpcConfiguration?: array{VpcId?: string, VpcEndpointId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVpcIngressConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVpcIngressConnectionAsync(array{
 *     VpcIngressConnectionArn?: string,
 *     IngressVpcConfiguration?: array{VpcId?: string, VpcEndpointId?: string, ...},
 *     ...,
 * } $args = [])
 */
class AppRunnerClient extends AwsClient {}
