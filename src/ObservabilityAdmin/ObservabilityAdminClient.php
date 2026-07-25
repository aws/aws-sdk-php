<?php
namespace Aws\ObservabilityAdmin;

use Aws\AwsClient;

/**
 * This client is used to interact with the **CloudWatch Observability Admin Service** service.
 * @method \Aws\Result createCentralizationRuleForOrganization(array $args = [])
 * @phpstan-method \Aws\Result createCentralizationRuleForOrganization(array{
 *     RuleName?: string,
 *     Rule?: array{
 *         Source?: array{
 *             Regions?: list<string>,
 *             Scope?: string,
 *             SourceLogsConfiguration?: array,
 *             SourceMetricsConfiguration?: array,
 *             ...,
 *         },
 *         Destination?: array{
 *             Region?: string,
 *             Account?: string,
 *             DestinationLogsConfiguration?: array,
 *             DestinationMetricsConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCentralizationRuleForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCentralizationRuleForOrganizationAsync(array{
 *     RuleName?: string,
 *     Rule?: array{
 *         Source?: array{
 *             Regions?: list<string>,
 *             Scope?: string,
 *             SourceLogsConfiguration?: array,
 *             SourceMetricsConfiguration?: array,
 *             ...,
 *         },
 *         Destination?: array{
 *             Region?: string,
 *             Account?: string,
 *             DestinationLogsConfiguration?: array,
 *             DestinationMetricsConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createS3TableIntegration(array $args = [])
 * @phpstan-method \Aws\Result createS3TableIntegration(array{
 *     Encryption?: array{SseAlgorithm?: 'AES256'|'aws:kms', KmsKeyArn?: string, ...},
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createS3TableIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createS3TableIntegrationAsync(array{
 *     Encryption?: array{SseAlgorithm?: 'AES256'|'aws:kms', KmsKeyArn?: string, ...},
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTelemetryPipeline(array $args = [])
 * @phpstan-method \Aws\Result createTelemetryPipeline(array{Name?: string, Configuration?: array{Body?: string, ...}, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTelemetryPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTelemetryPipelineAsync(array{Name?: string, Configuration?: array{Body?: string, ...}, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createTelemetryRule(array $args = [])
 * @phpstan-method \Aws\Result createTelemetryRule(array{
 *     RuleName?: string,
 *     Rule?: array{
 *         ResourceType?: 'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL',
 *         TelemetryType?: 'Logs'|'Metrics'|'Traces',
 *         TelemetrySourceTypes?: list<'EKS_API_LOGS'|'EKS_AUDIT_LOGS'|'EKS_AUTHENTICATOR_LOGS'|'EKS_CONTROLLER_MANAGER_LOGS'|'EKS_SCHEDULER_LOGS'|'ROUTE53_RESOLVER_QUERY_LOGS'|'VPC_FLOW_LOGS'>,
 *         DestinationConfiguration?: array{
 *             DestinationType?: 'cloud-watch-logs',
 *             DestinationPattern?: string,
 *             RetentionInDays?: int,
 *             VPCFlowLogParameters?: array,
 *             CloudtrailParameters?: array,
 *             ELBLoadBalancerLoggingParameters?: array,
 *             WAFLoggingParameters?: array,
 *             LogDeliveryParameters?: array,
 *             MskMonitoringParameters?: array,
 *             ...,
 *         },
 *         Scope?: string,
 *         SelectionCriteria?: string,
 *         AllowFieldUpdates?: bool,
 *         Regions?: list<string>,
 *         AllRegions?: bool,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTelemetryRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTelemetryRuleAsync(array{
 *     RuleName?: string,
 *     Rule?: array{
 *         ResourceType?: 'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL',
 *         TelemetryType?: 'Logs'|'Metrics'|'Traces',
 *         TelemetrySourceTypes?: list<'EKS_API_LOGS'|'EKS_AUDIT_LOGS'|'EKS_AUTHENTICATOR_LOGS'|'EKS_CONTROLLER_MANAGER_LOGS'|'EKS_SCHEDULER_LOGS'|'ROUTE53_RESOLVER_QUERY_LOGS'|'VPC_FLOW_LOGS'>,
 *         DestinationConfiguration?: array{
 *             DestinationType?: 'cloud-watch-logs',
 *             DestinationPattern?: string,
 *             RetentionInDays?: int,
 *             VPCFlowLogParameters?: array,
 *             CloudtrailParameters?: array,
 *             ELBLoadBalancerLoggingParameters?: array,
 *             WAFLoggingParameters?: array,
 *             LogDeliveryParameters?: array,
 *             MskMonitoringParameters?: array,
 *             ...,
 *         },
 *         Scope?: string,
 *         SelectionCriteria?: string,
 *         AllowFieldUpdates?: bool,
 *         Regions?: list<string>,
 *         AllRegions?: bool,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTelemetryRuleForOrganization(array $args = [])
 * @phpstan-method \Aws\Result createTelemetryRuleForOrganization(array{
 *     RuleName?: string,
 *     Rule?: array{
 *         ResourceType?: 'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL',
 *         TelemetryType?: 'Logs'|'Metrics'|'Traces',
 *         TelemetrySourceTypes?: list<'EKS_API_LOGS'|'EKS_AUDIT_LOGS'|'EKS_AUTHENTICATOR_LOGS'|'EKS_CONTROLLER_MANAGER_LOGS'|'EKS_SCHEDULER_LOGS'|'ROUTE53_RESOLVER_QUERY_LOGS'|'VPC_FLOW_LOGS'>,
 *         DestinationConfiguration?: array{
 *             DestinationType?: 'cloud-watch-logs',
 *             DestinationPattern?: string,
 *             RetentionInDays?: int,
 *             VPCFlowLogParameters?: array,
 *             CloudtrailParameters?: array,
 *             ELBLoadBalancerLoggingParameters?: array,
 *             WAFLoggingParameters?: array,
 *             LogDeliveryParameters?: array,
 *             MskMonitoringParameters?: array,
 *             ...,
 *         },
 *         Scope?: string,
 *         SelectionCriteria?: string,
 *         AllowFieldUpdates?: bool,
 *         Regions?: list<string>,
 *         AllRegions?: bool,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTelemetryRuleForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTelemetryRuleForOrganizationAsync(array{
 *     RuleName?: string,
 *     Rule?: array{
 *         ResourceType?: 'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL',
 *         TelemetryType?: 'Logs'|'Metrics'|'Traces',
 *         TelemetrySourceTypes?: list<'EKS_API_LOGS'|'EKS_AUDIT_LOGS'|'EKS_AUTHENTICATOR_LOGS'|'EKS_CONTROLLER_MANAGER_LOGS'|'EKS_SCHEDULER_LOGS'|'ROUTE53_RESOLVER_QUERY_LOGS'|'VPC_FLOW_LOGS'>,
 *         DestinationConfiguration?: array{
 *             DestinationType?: 'cloud-watch-logs',
 *             DestinationPattern?: string,
 *             RetentionInDays?: int,
 *             VPCFlowLogParameters?: array,
 *             CloudtrailParameters?: array,
 *             ELBLoadBalancerLoggingParameters?: array,
 *             WAFLoggingParameters?: array,
 *             LogDeliveryParameters?: array,
 *             MskMonitoringParameters?: array,
 *             ...,
 *         },
 *         Scope?: string,
 *         SelectionCriteria?: string,
 *         AllowFieldUpdates?: bool,
 *         Regions?: list<string>,
 *         AllRegions?: bool,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCentralizationRuleForOrganization(array $args = [])
 * @phpstan-method \Aws\Result deleteCentralizationRuleForOrganization(array{RuleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCentralizationRuleForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCentralizationRuleForOrganizationAsync(array{RuleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteS3TableIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteS3TableIntegration(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteS3TableIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteS3TableIntegrationAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteTelemetryPipeline(array $args = [])
 * @phpstan-method \Aws\Result deleteTelemetryPipeline(array{PipelineIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTelemetryPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTelemetryPipelineAsync(array{PipelineIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteTelemetryRule(array $args = [])
 * @phpstan-method \Aws\Result deleteTelemetryRule(array{RuleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTelemetryRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTelemetryRuleAsync(array{RuleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteTelemetryRuleForOrganization(array $args = [])
 * @phpstan-method \Aws\Result deleteTelemetryRuleForOrganization(array{RuleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTelemetryRuleForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTelemetryRuleForOrganizationAsync(array{RuleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCentralizationRuleForOrganization(array $args = [])
 * @phpstan-method \Aws\Result getCentralizationRuleForOrganization(array{RuleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCentralizationRuleForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCentralizationRuleForOrganizationAsync(array{RuleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getS3TableIntegration(array $args = [])
 * @phpstan-method \Aws\Result getS3TableIntegration(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getS3TableIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getS3TableIntegrationAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getTelemetryEnrichmentStatus(array $args = [])
 * @phpstan-method \Aws\Result getTelemetryEnrichmentStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTelemetryEnrichmentStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTelemetryEnrichmentStatusAsync(array{...} $args = [])
 * @method \Aws\Result getTelemetryEvaluationStatus(array $args = [])
 * @phpstan-method \Aws\Result getTelemetryEvaluationStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTelemetryEvaluationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTelemetryEvaluationStatusAsync(array{...} $args = [])
 * @method \Aws\Result getTelemetryEvaluationStatusForOrganization(array $args = [])
 * @phpstan-method \Aws\Result getTelemetryEvaluationStatusForOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTelemetryEvaluationStatusForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTelemetryEvaluationStatusForOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result getTelemetryPipeline(array $args = [])
 * @phpstan-method \Aws\Result getTelemetryPipeline(array{PipelineIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTelemetryPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTelemetryPipelineAsync(array{PipelineIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getTelemetryRule(array $args = [])
 * @phpstan-method \Aws\Result getTelemetryRule(array{RuleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTelemetryRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTelemetryRuleAsync(array{RuleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getTelemetryRuleForOrganization(array $args = [])
 * @phpstan-method \Aws\Result getTelemetryRuleForOrganization(array{RuleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTelemetryRuleForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTelemetryRuleForOrganizationAsync(array{RuleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listCentralizationRulesForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listCentralizationRulesForOrganization(array{RuleNamePrefix?: string, AllRegions?: bool, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCentralizationRulesForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCentralizationRulesForOrganizationAsync(array{RuleNamePrefix?: string, AllRegions?: bool, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listResourceTelemetry(array $args = [])
 * @phpstan-method \Aws\Result listResourceTelemetry(array{
 *     ResourceIdentifierPrefix?: string,
 *     ResourceTypes?: list<'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL'>,
 *     TelemetryConfigurationState?: array<string, 'Disabled'|'Enabled'|'NotApplicable'>,
 *     ResourceTags?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceTelemetryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceTelemetryAsync(array{
 *     ResourceIdentifierPrefix?: string,
 *     ResourceTypes?: list<'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL'>,
 *     TelemetryConfigurationState?: array<string, 'Disabled'|'Enabled'|'NotApplicable'>,
 *     ResourceTags?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceTelemetryForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listResourceTelemetryForOrganization(array{
 *     AccountIdentifiers?: list<string>,
 *     ResourceIdentifierPrefix?: string,
 *     ResourceTypes?: list<'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL'>,
 *     TelemetryConfigurationState?: array<string, 'Disabled'|'Enabled'|'NotApplicable'>,
 *     ResourceTags?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceTelemetryForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceTelemetryForOrganizationAsync(array{
 *     AccountIdentifiers?: list<string>,
 *     ResourceIdentifierPrefix?: string,
 *     ResourceTypes?: list<'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL'>,
 *     TelemetryConfigurationState?: array<string, 'Disabled'|'Enabled'|'NotApplicable'>,
 *     ResourceTags?: array<string, string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listS3TableIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listS3TableIntegrations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listS3TableIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listS3TableIntegrationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result listTelemetryPipelines(array $args = [])
 * @phpstan-method \Aws\Result listTelemetryPipelines(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTelemetryPipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTelemetryPipelinesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTelemetryRules(array $args = [])
 * @phpstan-method \Aws\Result listTelemetryRules(array{RuleNamePrefix?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTelemetryRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTelemetryRulesAsync(array{RuleNamePrefix?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTelemetryRulesForOrganization(array $args = [])
 * @phpstan-method \Aws\Result listTelemetryRulesForOrganization(array{
 *     RuleNamePrefix?: string,
 *     SourceAccountIds?: list<string>,
 *     SourceOrganizationUnitIds?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTelemetryRulesForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTelemetryRulesForOrganizationAsync(array{
 *     RuleNamePrefix?: string,
 *     SourceAccountIds?: list<string>,
 *     SourceOrganizationUnitIds?: list<string>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTelemetryEnrichment(array $args = [])
 * @phpstan-method \Aws\Result startTelemetryEnrichment(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startTelemetryEnrichmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTelemetryEnrichmentAsync(array{...} $args = [])
 * @method \Aws\Result startTelemetryEvaluation(array $args = [])
 * @phpstan-method \Aws\Result startTelemetryEvaluation(array{Regions?: list<string>, AllRegions?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startTelemetryEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTelemetryEvaluationAsync(array{Regions?: list<string>, AllRegions?: bool, ...} $args = [])
 * @method \Aws\Result startTelemetryEvaluationForOrganization(array $args = [])
 * @phpstan-method \Aws\Result startTelemetryEvaluationForOrganization(array{Regions?: list<string>, AllRegions?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startTelemetryEvaluationForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTelemetryEvaluationForOrganizationAsync(array{Regions?: list<string>, AllRegions?: bool, ...} $args = [])
 * @method \Aws\Result stopTelemetryEnrichment(array $args = [])
 * @phpstan-method \Aws\Result stopTelemetryEnrichment(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTelemetryEnrichmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTelemetryEnrichmentAsync(array{...} $args = [])
 * @method \Aws\Result stopTelemetryEvaluation(array $args = [])
 * @phpstan-method \Aws\Result stopTelemetryEvaluation(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTelemetryEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTelemetryEvaluationAsync(array{...} $args = [])
 * @method \Aws\Result stopTelemetryEvaluationForOrganization(array $args = [])
 * @phpstan-method \Aws\Result stopTelemetryEvaluationForOrganization(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTelemetryEvaluationForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTelemetryEvaluationForOrganizationAsync(array{...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result testTelemetryPipeline(array $args = [])
 * @phpstan-method \Aws\Result testTelemetryPipeline(array{
 *     Records?: list<array{Data?: string, Type?: 'JSON'|'STRING', ...}>,
 *     Configuration?: array{Body?: string, ...},
 *     SignalType?: 'LOG'|'METRIC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testTelemetryPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testTelemetryPipelineAsync(array{
 *     Records?: list<array{Data?: string, Type?: 'JSON'|'STRING', ...}>,
 *     Configuration?: array{Body?: string, ...},
 *     SignalType?: 'LOG'|'METRIC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCentralizationRuleForOrganization(array $args = [])
 * @phpstan-method \Aws\Result updateCentralizationRuleForOrganization(array{
 *     RuleIdentifier?: string,
 *     Rule?: array{
 *         Source?: array{
 *             Regions?: list<string>,
 *             Scope?: string,
 *             SourceLogsConfiguration?: array,
 *             SourceMetricsConfiguration?: array,
 *             ...,
 *         },
 *         Destination?: array{
 *             Region?: string,
 *             Account?: string,
 *             DestinationLogsConfiguration?: array,
 *             DestinationMetricsConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCentralizationRuleForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCentralizationRuleForOrganizationAsync(array{
 *     RuleIdentifier?: string,
 *     Rule?: array{
 *         Source?: array{
 *             Regions?: list<string>,
 *             Scope?: string,
 *             SourceLogsConfiguration?: array,
 *             SourceMetricsConfiguration?: array,
 *             ...,
 *         },
 *         Destination?: array{
 *             Region?: string,
 *             Account?: string,
 *             DestinationLogsConfiguration?: array,
 *             DestinationMetricsConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTelemetryPipeline(array $args = [])
 * @phpstan-method \Aws\Result updateTelemetryPipeline(array{PipelineIdentifier?: string, Configuration?: array{Body?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTelemetryPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTelemetryPipelineAsync(array{PipelineIdentifier?: string, Configuration?: array{Body?: string, ...}, ...} $args = [])
 * @method \Aws\Result updateTelemetryRule(array $args = [])
 * @phpstan-method \Aws\Result updateTelemetryRule(array{
 *     RuleIdentifier?: string,
 *     Rule?: array{
 *         ResourceType?: 'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL',
 *         TelemetryType?: 'Logs'|'Metrics'|'Traces',
 *         TelemetrySourceTypes?: list<'EKS_API_LOGS'|'EKS_AUDIT_LOGS'|'EKS_AUTHENTICATOR_LOGS'|'EKS_CONTROLLER_MANAGER_LOGS'|'EKS_SCHEDULER_LOGS'|'ROUTE53_RESOLVER_QUERY_LOGS'|'VPC_FLOW_LOGS'>,
 *         DestinationConfiguration?: array{
 *             DestinationType?: 'cloud-watch-logs',
 *             DestinationPattern?: string,
 *             RetentionInDays?: int,
 *             VPCFlowLogParameters?: array,
 *             CloudtrailParameters?: array,
 *             ELBLoadBalancerLoggingParameters?: array,
 *             WAFLoggingParameters?: array,
 *             LogDeliveryParameters?: array,
 *             MskMonitoringParameters?: array,
 *             ...,
 *         },
 *         Scope?: string,
 *         SelectionCriteria?: string,
 *         AllowFieldUpdates?: bool,
 *         Regions?: list<string>,
 *         AllRegions?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTelemetryRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTelemetryRuleAsync(array{
 *     RuleIdentifier?: string,
 *     Rule?: array{
 *         ResourceType?: 'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL',
 *         TelemetryType?: 'Logs'|'Metrics'|'Traces',
 *         TelemetrySourceTypes?: list<'EKS_API_LOGS'|'EKS_AUDIT_LOGS'|'EKS_AUTHENTICATOR_LOGS'|'EKS_CONTROLLER_MANAGER_LOGS'|'EKS_SCHEDULER_LOGS'|'ROUTE53_RESOLVER_QUERY_LOGS'|'VPC_FLOW_LOGS'>,
 *         DestinationConfiguration?: array{
 *             DestinationType?: 'cloud-watch-logs',
 *             DestinationPattern?: string,
 *             RetentionInDays?: int,
 *             VPCFlowLogParameters?: array,
 *             CloudtrailParameters?: array,
 *             ELBLoadBalancerLoggingParameters?: array,
 *             WAFLoggingParameters?: array,
 *             LogDeliveryParameters?: array,
 *             MskMonitoringParameters?: array,
 *             ...,
 *         },
 *         Scope?: string,
 *         SelectionCriteria?: string,
 *         AllowFieldUpdates?: bool,
 *         Regions?: list<string>,
 *         AllRegions?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTelemetryRuleForOrganization(array $args = [])
 * @phpstan-method \Aws\Result updateTelemetryRuleForOrganization(array{
 *     RuleIdentifier?: string,
 *     Rule?: array{
 *         ResourceType?: 'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL',
 *         TelemetryType?: 'Logs'|'Metrics'|'Traces',
 *         TelemetrySourceTypes?: list<'EKS_API_LOGS'|'EKS_AUDIT_LOGS'|'EKS_AUTHENTICATOR_LOGS'|'EKS_CONTROLLER_MANAGER_LOGS'|'EKS_SCHEDULER_LOGS'|'ROUTE53_RESOLVER_QUERY_LOGS'|'VPC_FLOW_LOGS'>,
 *         DestinationConfiguration?: array{
 *             DestinationType?: 'cloud-watch-logs',
 *             DestinationPattern?: string,
 *             RetentionInDays?: int,
 *             VPCFlowLogParameters?: array,
 *             CloudtrailParameters?: array,
 *             ELBLoadBalancerLoggingParameters?: array,
 *             WAFLoggingParameters?: array,
 *             LogDeliveryParameters?: array,
 *             MskMonitoringParameters?: array,
 *             ...,
 *         },
 *         Scope?: string,
 *         SelectionCriteria?: string,
 *         AllowFieldUpdates?: bool,
 *         Regions?: list<string>,
 *         AllRegions?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTelemetryRuleForOrganizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTelemetryRuleForOrganizationAsync(array{
 *     RuleIdentifier?: string,
 *     Rule?: array{
 *         ResourceType?: 'AWS::Bedrock::KnowledgeBase'|'AWS::BedrockAgentCore::Browser'|'AWS::BedrockAgentCore::CodeInterpreter'|'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Memory'|'AWS::BedrockAgentCore::Runtime'|'AWS::BedrockAgentCore::WorkloadIdentity'|'AWS::CloudFront::Distribution'|'AWS::CloudTrail'|'AWS::CloudWatch::OTelEnrichment'|'AWS::EC2::Instance'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::ElasticLoadBalancingV2::LoadBalancer'|'AWS::Lambda::Function'|'AWS::MSK::Cluster'|'AWS::Route53Resolver::ResolverEndpoint'|'AWS::S3::Bucket'|'AWS::SecurityHub::Hub'|'AWS::SecurityHub::HubV2'|'AWS::WAFv2::WebACL',
 *         TelemetryType?: 'Logs'|'Metrics'|'Traces',
 *         TelemetrySourceTypes?: list<'EKS_API_LOGS'|'EKS_AUDIT_LOGS'|'EKS_AUTHENTICATOR_LOGS'|'EKS_CONTROLLER_MANAGER_LOGS'|'EKS_SCHEDULER_LOGS'|'ROUTE53_RESOLVER_QUERY_LOGS'|'VPC_FLOW_LOGS'>,
 *         DestinationConfiguration?: array{
 *             DestinationType?: 'cloud-watch-logs',
 *             DestinationPattern?: string,
 *             RetentionInDays?: int,
 *             VPCFlowLogParameters?: array,
 *             CloudtrailParameters?: array,
 *             ELBLoadBalancerLoggingParameters?: array,
 *             WAFLoggingParameters?: array,
 *             LogDeliveryParameters?: array,
 *             MskMonitoringParameters?: array,
 *             ...,
 *         },
 *         Scope?: string,
 *         SelectionCriteria?: string,
 *         AllowFieldUpdates?: bool,
 *         Regions?: list<string>,
 *         AllRegions?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result validateTelemetryPipelineConfiguration(array $args = [])
 * @phpstan-method \Aws\Result validateTelemetryPipelineConfiguration(array{Configuration?: array{Body?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validateTelemetryPipelineConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateTelemetryPipelineConfigurationAsync(array{Configuration?: array{Body?: string, ...}, ...} $args = [])
 */
class ObservabilityAdminClient extends AwsClient {}
