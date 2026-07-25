<?php
namespace Aws\Lambda;

use Aws\AwsClient;
use Aws\CommandInterface;
use Aws\Middleware;

/**
 * This client is used to interact with AWS Lambda
 *
 * @method \Aws\Result addLayerVersionPermission(array $args = [])
 * @phpstan-method \Aws\Result addLayerVersionPermission(array{
 *     LayerName?: string,
 *     VersionNumber?: int,
 *     StatementId?: string,
 *     Action?: string,
 *     Principal?: string,
 *     OrganizationId?: string,
 *     RevisionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addLayerVersionPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addLayerVersionPermissionAsync(array{
 *     LayerName?: string,
 *     VersionNumber?: int,
 *     StatementId?: string,
 *     Action?: string,
 *     Principal?: string,
 *     OrganizationId?: string,
 *     RevisionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addPermission(array $args = [])
 * @phpstan-method \Aws\Result addPermission(array{
 *     FunctionName?: string,
 *     StatementId?: string,
 *     Action?: string,
 *     Principal?: string,
 *     SourceArn?: string,
 *     FunctionUrlAuthType?: 'AWS_IAM'|'NONE',
 *     InvokedViaFunctionUrl?: bool,
 *     SourceAccount?: string,
 *     EventSourceToken?: string,
 *     Qualifier?: string,
 *     RevisionId?: string,
 *     PrincipalOrgID?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addPermissionAsync(array{
 *     FunctionName?: string,
 *     StatementId?: string,
 *     Action?: string,
 *     Principal?: string,
 *     SourceArn?: string,
 *     FunctionUrlAuthType?: 'AWS_IAM'|'NONE',
 *     InvokedViaFunctionUrl?: bool,
 *     SourceAccount?: string,
 *     EventSourceToken?: string,
 *     Qualifier?: string,
 *     RevisionId?: string,
 *     PrincipalOrgID?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result checkpointDurableExecution(array $args = [])
 * @phpstan-method \Aws\Result checkpointDurableExecution(array{
 *     DurableExecutionArn?: string,
 *     CheckpointToken?: string,
 *     Updates?: list<array{
 *         Id?: string,
 *         ParentId?: string,
 *         Name?: string,
 *         Type?: 'CALLBACK'|'CHAINED_INVOKE'|'CONTEXT'|'EXECUTION'|'STEP'|'WAIT',
 *         SubType?: string,
 *         Action?: 'CANCEL'|'FAIL'|'RETRY'|'START'|'SUCCEED',
 *         Payload?: string,
 *         Error?: array,
 *         ContextOptions?: array,
 *         StepOptions?: array,
 *         WaitOptions?: array,
 *         CallbackOptions?: array,
 *         ChainedInvokeOptions?: array,
 *         ...,
 *     }>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise checkpointDurableExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkpointDurableExecutionAsync(array{
 *     DurableExecutionArn?: string,
 *     CheckpointToken?: string,
 *     Updates?: list<array{
 *         Id?: string,
 *         ParentId?: string,
 *         Name?: string,
 *         Type?: 'CALLBACK'|'CHAINED_INVOKE'|'CONTEXT'|'EXECUTION'|'STEP'|'WAIT',
 *         SubType?: string,
 *         Action?: 'CANCEL'|'FAIL'|'RETRY'|'START'|'SUCCEED',
 *         Payload?: string,
 *         Error?: array,
 *         ContextOptions?: array,
 *         StepOptions?: array,
 *         WaitOptions?: array,
 *         CallbackOptions?: array,
 *         ChainedInvokeOptions?: array,
 *         ...,
 *     }>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @phpstan-method \Aws\Result createAlias(array{
 *     FunctionName?: string,
 *     Name?: string,
 *     FunctionVersion?: string,
 *     Description?: string,
 *     RoutingConfig?: array{AdditionalVersionWeights?: array<string, float>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAliasAsync(array{
 *     FunctionName?: string,
 *     Name?: string,
 *     FunctionVersion?: string,
 *     Description?: string,
 *     RoutingConfig?: array{AdditionalVersionWeights?: array<string, float>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCapacityProvider(array $args = [])
 * @phpstan-method \Aws\Result createCapacityProvider(array{
 *     CapacityProviderName?: string,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     PermissionsConfig?: array{CapacityProviderOperatorRoleArn?: string, ...},
 *     InstanceRequirements?: array{
 *         Architectures?: list<'arm64'|'x86_64'>,
 *         AllowedInstanceTypes?: list<string>,
 *         ExcludedInstanceTypes?: list<string>,
 *         ...,
 *     },
 *     CapacityProviderScalingConfig?: array{MaxVCpuCount?: int, ScalingMode?: 'Auto'|'Manual', ScalingPolicies?: list<array>, ...},
 *     KmsKeyArn?: string,
 *     Tags?: array<string, string>,
 *     PropagateTags?: array{Mode?: 'Explicit'|'None', ExplicitTags?: array<string, string>, ...},
 *     TelemetryConfig?: array{LoggingConfig?: array{SystemLogLevel?: 'DEBUG'|'INFO'|'WARN', LogGroup?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCapacityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCapacityProviderAsync(array{
 *     CapacityProviderName?: string,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     PermissionsConfig?: array{CapacityProviderOperatorRoleArn?: string, ...},
 *     InstanceRequirements?: array{
 *         Architectures?: list<'arm64'|'x86_64'>,
 *         AllowedInstanceTypes?: list<string>,
 *         ExcludedInstanceTypes?: list<string>,
 *         ...,
 *     },
 *     CapacityProviderScalingConfig?: array{MaxVCpuCount?: int, ScalingMode?: 'Auto'|'Manual', ScalingPolicies?: list<array>, ...},
 *     KmsKeyArn?: string,
 *     Tags?: array<string, string>,
 *     PropagateTags?: array{Mode?: 'Explicit'|'None', ExplicitTags?: array<string, string>, ...},
 *     TelemetryConfig?: array{LoggingConfig?: array{SystemLogLevel?: 'DEBUG'|'INFO'|'WARN', LogGroup?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCodeSigningConfig(array $args = [])
 * @phpstan-method \Aws\Result createCodeSigningConfig(array{
 *     Description?: string,
 *     AllowedPublishers?: array{SigningProfileVersionArns?: list<string>, ...},
 *     CodeSigningPolicies?: array{UntrustedArtifactOnDeployment?: 'Enforce'|'Warn', ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCodeSigningConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCodeSigningConfigAsync(array{
 *     Description?: string,
 *     AllowedPublishers?: array{SigningProfileVersionArns?: list<string>, ...},
 *     CodeSigningPolicies?: array{UntrustedArtifactOnDeployment?: 'Enforce'|'Warn', ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEventSourceMapping(array $args = [])
 * @phpstan-method \Aws\Result createEventSourceMapping(array{
 *     EventSourceArn?: string,
 *     FunctionName?: string,
 *     Enabled?: bool,
 *     BatchSize?: int,
 *     FilterCriteria?: array{Filters?: list<array>, ...},
 *     KMSKeyArn?: string,
 *     MetricsConfig?: array{Metrics?: list<'ErrorCount'|'EventCount'|'KafkaMetrics'>, ...},
 *     LoggingConfig?: array{SystemLogLevel?: 'DEBUG'|'INFO'|'WARN', ...},
 *     ScalingConfig?: array{MaximumConcurrency?: int, ...},
 *     MaximumBatchingWindowInSeconds?: int,
 *     ParallelizationFactor?: int,
 *     StartingPosition?: 'AT_TIMESTAMP'|'LATEST'|'TRIM_HORIZON',
 *     StartingPositionTimestamp?: int|string|\DateTimeInterface,
 *     DestinationConfig?: array{OnSuccess?: array{Destination?: string, ...}, OnFailure?: array{Destination?: string, ...}, ...},
 *     MaximumRecordAgeInSeconds?: int,
 *     BisectBatchOnFunctionError?: bool,
 *     MaximumRetryAttempts?: int,
 *     Tags?: array<string, string>,
 *     TumblingWindowInSeconds?: int,
 *     Topics?: list<string>,
 *     Queues?: list<string>,
 *     SourceAccessConfigurations?: list<array{
 *         Type?: 'BASIC_AUTH'|'CLIENT_CERTIFICATE_TLS_AUTH'|'SASL_SCRAM_256_AUTH'|'SASL_SCRAM_512_AUTH'|'SERVER_ROOT_CA_CERTIFICATE'|'VIRTUAL_HOST'|'VPC_SECURITY_GROUP'|'VPC_SUBNET',
 *         URI?: string,
 *         ...,
 *     }>,
 *     SelfManagedEventSource?: array{Endpoints?: array<string, list<string>>, ...},
 *     FunctionResponseTypes?: list<'ReportBatchItemFailures'>,
 *     AmazonManagedKafkaEventSourceConfig?: array{
 *         ConsumerGroupId?: string,
 *         SchemaRegistryConfig?: array{
 *             SchemaRegistryURI?: string,
 *             EventRecordFormat?: 'JSON'|'SOURCE',
 *             AccessConfigs?: list<array>,
 *             SchemaValidationConfigs?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SelfManagedKafkaEventSourceConfig?: array{
 *         ConsumerGroupId?: string,
 *         SchemaRegistryConfig?: array{
 *             SchemaRegistryURI?: string,
 *             EventRecordFormat?: 'JSON'|'SOURCE',
 *             AccessConfigs?: list<array>,
 *             SchemaValidationConfigs?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DocumentDBEventSourceConfig?: array{DatabaseName?: string, CollectionName?: string, FullDocument?: 'Default'|'UpdateLookup', ...},
 *     ProvisionedPollerConfig?: array{MinimumPollers?: int, MaximumPollers?: int, PollerGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventSourceMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventSourceMappingAsync(array{
 *     EventSourceArn?: string,
 *     FunctionName?: string,
 *     Enabled?: bool,
 *     BatchSize?: int,
 *     FilterCriteria?: array{Filters?: list<array>, ...},
 *     KMSKeyArn?: string,
 *     MetricsConfig?: array{Metrics?: list<'ErrorCount'|'EventCount'|'KafkaMetrics'>, ...},
 *     LoggingConfig?: array{SystemLogLevel?: 'DEBUG'|'INFO'|'WARN', ...},
 *     ScalingConfig?: array{MaximumConcurrency?: int, ...},
 *     MaximumBatchingWindowInSeconds?: int,
 *     ParallelizationFactor?: int,
 *     StartingPosition?: 'AT_TIMESTAMP'|'LATEST'|'TRIM_HORIZON',
 *     StartingPositionTimestamp?: int|string|\DateTimeInterface,
 *     DestinationConfig?: array{OnSuccess?: array{Destination?: string, ...}, OnFailure?: array{Destination?: string, ...}, ...},
 *     MaximumRecordAgeInSeconds?: int,
 *     BisectBatchOnFunctionError?: bool,
 *     MaximumRetryAttempts?: int,
 *     Tags?: array<string, string>,
 *     TumblingWindowInSeconds?: int,
 *     Topics?: list<string>,
 *     Queues?: list<string>,
 *     SourceAccessConfigurations?: list<array{
 *         Type?: 'BASIC_AUTH'|'CLIENT_CERTIFICATE_TLS_AUTH'|'SASL_SCRAM_256_AUTH'|'SASL_SCRAM_512_AUTH'|'SERVER_ROOT_CA_CERTIFICATE'|'VIRTUAL_HOST'|'VPC_SECURITY_GROUP'|'VPC_SUBNET',
 *         URI?: string,
 *         ...,
 *     }>,
 *     SelfManagedEventSource?: array{Endpoints?: array<string, list<string>>, ...},
 *     FunctionResponseTypes?: list<'ReportBatchItemFailures'>,
 *     AmazonManagedKafkaEventSourceConfig?: array{
 *         ConsumerGroupId?: string,
 *         SchemaRegistryConfig?: array{
 *             SchemaRegistryURI?: string,
 *             EventRecordFormat?: 'JSON'|'SOURCE',
 *             AccessConfigs?: list<array>,
 *             SchemaValidationConfigs?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SelfManagedKafkaEventSourceConfig?: array{
 *         ConsumerGroupId?: string,
 *         SchemaRegistryConfig?: array{
 *             SchemaRegistryURI?: string,
 *             EventRecordFormat?: 'JSON'|'SOURCE',
 *             AccessConfigs?: list<array>,
 *             SchemaValidationConfigs?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DocumentDBEventSourceConfig?: array{DatabaseName?: string, CollectionName?: string, FullDocument?: 'Default'|'UpdateLookup', ...},
 *     ProvisionedPollerConfig?: array{MinimumPollers?: int, MaximumPollers?: int, PollerGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFunction(array $args = [])
 * @phpstan-method \Aws\Result createFunction(array{
 *     FunctionName?: string,
 *     Runtime?: 'dotnet10'|'dotnet6'|'dotnet8'|'dotnetcore1.0'|'dotnetcore2.0'|'dotnetcore2.1'|'dotnetcore3.1'|'go1.x'|'java11'|'java11.al2023'|'java17'|'java17.al2023'|'java21'|'java25'|'java8'|'java8.al2'|'java8.al2023'|'nodejs'|'nodejs10.x'|'nodejs12.x'|'nodejs14.x'|'nodejs16.x'|'nodejs18.x'|'nodejs20.x'|'nodejs22.x'|'nodejs24.x'|'nodejs4.3'|'nodejs4.3-edge'|'nodejs6.10'|'nodejs8.10'|'provided'|'provided.al2'|'provided.al2023'|'python2.7'|'python3.10'|'python3.11'|'python3.12'|'python3.13'|'python3.14'|'python3.6'|'python3.7'|'python3.8'|'python3.9'|'ruby2.5'|'ruby2.7'|'ruby3.2'|'ruby3.3'|'ruby3.4'|'ruby4.0',
 *     Role?: string,
 *     Handler?: string,
 *     Code?: array{
 *         ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Bucket?: string,
 *         S3Key?: string,
 *         S3ObjectVersion?: string,
 *         S3ObjectStorageMode?: 'COPY'|'REFERENCE',
 *         ImageUri?: string,
 *         SourceKMSKeyArn?: string,
 *         ...,
 *     },
 *     Description?: string,
 *     Timeout?: int,
 *     MemorySize?: int,
 *     Publish?: bool,
 *     PublishTo?: 'LATEST_PUBLISHED',
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, Ipv6AllowedForDualStack?: bool, ...},
 *     PackageType?: 'Image'|'Zip',
 *     DeadLetterConfig?: array{TargetArn?: string, ...},
 *     Environment?: array{Variables?: array<string, string>, ...},
 *     KMSKeyArn?: string,
 *     TracingConfig?: array{Mode?: 'Active'|'PassThrough', ...},
 *     Tags?: array<string, string>,
 *     Layers?: list<string>,
 *     FileSystemConfigs?: list<array{Arn?: string, LocalMountPath?: string, ...}>,
 *     CodeSigningConfigArn?: string,
 *     ImageConfig?: array{EntryPoint?: list<string>, Command?: list<string>, WorkingDirectory?: string, ...},
 *     Architectures?: list<'arm64'|'x86_64'>,
 *     EphemeralStorage?: array{Size?: int, ...},
 *     SnapStart?: array{ApplyOn?: 'None'|'PublishedVersions', ...},
 *     LoggingConfig?: array{
 *         LogFormat?: 'JSON'|'Text',
 *         ApplicationLogLevel?: 'DEBUG'|'ERROR'|'FATAL'|'INFO'|'TRACE'|'WARN',
 *         SystemLogLevel?: 'DEBUG'|'INFO'|'WARN',
 *         LogGroup?: string,
 *         ...,
 *     },
 *     TenancyConfig?: array{TenantIsolationMode?: 'PER_TENANT', ...},
 *     CapacityProviderConfig?: array{
 *         LambdaManagedInstancesCapacityProviderConfig?: array{
 *             CapacityProviderArn?: string,
 *             PerExecutionEnvironmentMaxConcurrency?: int,
 *             ExecutionEnvironmentMemoryGiBPerVCpu?: float,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DurableConfig?: array{KMSKeyArn?: string, RetentionPeriodInDays?: int, ExecutionTimeout?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFunctionAsync(array{
 *     FunctionName?: string,
 *     Runtime?: 'dotnet10'|'dotnet6'|'dotnet8'|'dotnetcore1.0'|'dotnetcore2.0'|'dotnetcore2.1'|'dotnetcore3.1'|'go1.x'|'java11'|'java11.al2023'|'java17'|'java17.al2023'|'java21'|'java25'|'java8'|'java8.al2'|'java8.al2023'|'nodejs'|'nodejs10.x'|'nodejs12.x'|'nodejs14.x'|'nodejs16.x'|'nodejs18.x'|'nodejs20.x'|'nodejs22.x'|'nodejs24.x'|'nodejs4.3'|'nodejs4.3-edge'|'nodejs6.10'|'nodejs8.10'|'provided'|'provided.al2'|'provided.al2023'|'python2.7'|'python3.10'|'python3.11'|'python3.12'|'python3.13'|'python3.14'|'python3.6'|'python3.7'|'python3.8'|'python3.9'|'ruby2.5'|'ruby2.7'|'ruby3.2'|'ruby3.3'|'ruby3.4'|'ruby4.0',
 *     Role?: string,
 *     Handler?: string,
 *     Code?: array{
 *         ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *         S3Bucket?: string,
 *         S3Key?: string,
 *         S3ObjectVersion?: string,
 *         S3ObjectStorageMode?: 'COPY'|'REFERENCE',
 *         ImageUri?: string,
 *         SourceKMSKeyArn?: string,
 *         ...,
 *     },
 *     Description?: string,
 *     Timeout?: int,
 *     MemorySize?: int,
 *     Publish?: bool,
 *     PublishTo?: 'LATEST_PUBLISHED',
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, Ipv6AllowedForDualStack?: bool, ...},
 *     PackageType?: 'Image'|'Zip',
 *     DeadLetterConfig?: array{TargetArn?: string, ...},
 *     Environment?: array{Variables?: array<string, string>, ...},
 *     KMSKeyArn?: string,
 *     TracingConfig?: array{Mode?: 'Active'|'PassThrough', ...},
 *     Tags?: array<string, string>,
 *     Layers?: list<string>,
 *     FileSystemConfigs?: list<array{Arn?: string, LocalMountPath?: string, ...}>,
 *     CodeSigningConfigArn?: string,
 *     ImageConfig?: array{EntryPoint?: list<string>, Command?: list<string>, WorkingDirectory?: string, ...},
 *     Architectures?: list<'arm64'|'x86_64'>,
 *     EphemeralStorage?: array{Size?: int, ...},
 *     SnapStart?: array{ApplyOn?: 'None'|'PublishedVersions', ...},
 *     LoggingConfig?: array{
 *         LogFormat?: 'JSON'|'Text',
 *         ApplicationLogLevel?: 'DEBUG'|'ERROR'|'FATAL'|'INFO'|'TRACE'|'WARN',
 *         SystemLogLevel?: 'DEBUG'|'INFO'|'WARN',
 *         LogGroup?: string,
 *         ...,
 *     },
 *     TenancyConfig?: array{TenantIsolationMode?: 'PER_TENANT', ...},
 *     CapacityProviderConfig?: array{
 *         LambdaManagedInstancesCapacityProviderConfig?: array{
 *             CapacityProviderArn?: string,
 *             PerExecutionEnvironmentMaxConcurrency?: int,
 *             ExecutionEnvironmentMemoryGiBPerVCpu?: float,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DurableConfig?: array{KMSKeyArn?: string, RetentionPeriodInDays?: int, ExecutionTimeout?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFunctionUrlConfig(array $args = [])
 * @phpstan-method \Aws\Result createFunctionUrlConfig(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     AuthType?: 'AWS_IAM'|'NONE',
 *     Cors?: array{
 *         AllowCredentials?: bool,
 *         AllowHeaders?: list<string>,
 *         AllowMethods?: list<string>,
 *         AllowOrigins?: list<string>,
 *         ExposeHeaders?: list<string>,
 *         MaxAge?: int,
 *         ...,
 *     },
 *     InvokeMode?: 'BUFFERED'|'RESPONSE_STREAM',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFunctionUrlConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFunctionUrlConfigAsync(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     AuthType?: 'AWS_IAM'|'NONE',
 *     Cors?: array{
 *         AllowCredentials?: bool,
 *         AllowHeaders?: list<string>,
 *         AllowMethods?: list<string>,
 *         AllowOrigins?: list<string>,
 *         ExposeHeaders?: list<string>,
 *         MaxAge?: int,
 *         ...,
 *     },
 *     InvokeMode?: 'BUFFERED'|'RESPONSE_STREAM',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteAlias(array{FunctionName?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAliasAsync(array{FunctionName?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteCapacityProvider(array $args = [])
 * @phpstan-method \Aws\Result deleteCapacityProvider(array{CapacityProviderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCapacityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCapacityProviderAsync(array{CapacityProviderName?: string, ...} $args = [])
 * @method \Aws\Result deleteCodeSigningConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteCodeSigningConfig(array{CodeSigningConfigArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCodeSigningConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCodeSigningConfigAsync(array{CodeSigningConfigArn?: string, ...} $args = [])
 * @method \Aws\Result deleteEventSourceMapping(array $args = [])
 * @phpstan-method \Aws\Result deleteEventSourceMapping(array{UUID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventSourceMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventSourceMappingAsync(array{UUID?: string, ...} $args = [])
 * @method \Aws\Result deleteFunction(array $args = [])
 * @phpstan-method \Aws\Result deleteFunction(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFunctionAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result deleteFunctionCodeSigningConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteFunctionCodeSigningConfig(array{FunctionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFunctionCodeSigningConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFunctionCodeSigningConfigAsync(array{FunctionName?: string, ...} $args = [])
 * @method \Aws\Result deleteFunctionConcurrency(array $args = [])
 * @phpstan-method \Aws\Result deleteFunctionConcurrency(array{FunctionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFunctionConcurrencyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFunctionConcurrencyAsync(array{FunctionName?: string, ...} $args = [])
 * @method \Aws\Result deleteFunctionEventInvokeConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteFunctionEventInvokeConfig(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFunctionEventInvokeConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFunctionEventInvokeConfigAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result deleteFunctionUrlConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteFunctionUrlConfig(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFunctionUrlConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFunctionUrlConfigAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result deleteLayerVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteLayerVersion(array{LayerName?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLayerVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLayerVersionAsync(array{LayerName?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result deleteProvisionedConcurrencyConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteProvisionedConcurrencyConfig(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProvisionedConcurrencyConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProvisionedConcurrencyConfigAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getAccountSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getAlias(array $args = [])
 * @phpstan-method \Aws\Result getAlias(array{FunctionName?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAliasAsync(array{FunctionName?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getCapacityProvider(array $args = [])
 * @phpstan-method \Aws\Result getCapacityProvider(array{CapacityProviderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCapacityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCapacityProviderAsync(array{CapacityProviderName?: string, ...} $args = [])
 * @method \Aws\Result getCodeSigningConfig(array $args = [])
 * @phpstan-method \Aws\Result getCodeSigningConfig(array{CodeSigningConfigArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeSigningConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeSigningConfigAsync(array{CodeSigningConfigArn?: string, ...} $args = [])
 * @method \Aws\Result getDurableExecution(array $args = [])
 * @phpstan-method \Aws\Result getDurableExecution(array{DurableExecutionArn?: string, IncludeExecutionData?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDurableExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDurableExecutionAsync(array{DurableExecutionArn?: string, IncludeExecutionData?: bool, ...} $args = [])
 * @method \Aws\Result getDurableExecutionHistory(array $args = [])
 * @phpstan-method \Aws\Result getDurableExecutionHistory(array{
 *     DurableExecutionArn?: string,
 *     IncludeExecutionData?: bool,
 *     MaxItems?: int,
 *     Marker?: string,
 *     ReverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDurableExecutionHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDurableExecutionHistoryAsync(array{
 *     DurableExecutionArn?: string,
 *     IncludeExecutionData?: bool,
 *     MaxItems?: int,
 *     Marker?: string,
 *     ReverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDurableExecutionState(array $args = [])
 * @phpstan-method \Aws\Result getDurableExecutionState(array{DurableExecutionArn?: string, CheckpointToken?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDurableExecutionStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDurableExecutionStateAsync(array{DurableExecutionArn?: string, CheckpointToken?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result getEventSourceMapping(array $args = [])
 * @phpstan-method \Aws\Result getEventSourceMapping(array{UUID?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventSourceMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventSourceMappingAsync(array{UUID?: string, ...} $args = [])
 * @method \Aws\Result getFunction(array $args = [])
 * @phpstan-method \Aws\Result getFunction(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result getFunctionCodeSigningConfig(array $args = [])
 * @phpstan-method \Aws\Result getFunctionCodeSigningConfig(array{FunctionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionCodeSigningConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionCodeSigningConfigAsync(array{FunctionName?: string, ...} $args = [])
 * @method \Aws\Result getFunctionConcurrency(array $args = [])
 * @phpstan-method \Aws\Result getFunctionConcurrency(array{FunctionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionConcurrencyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionConcurrencyAsync(array{FunctionName?: string, ...} $args = [])
 * @method \Aws\Result getFunctionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getFunctionConfiguration(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionConfigurationAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result getFunctionEventInvokeConfig(array $args = [])
 * @phpstan-method \Aws\Result getFunctionEventInvokeConfig(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionEventInvokeConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionEventInvokeConfigAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result getFunctionRecursionConfig(array $args = [])
 * @phpstan-method \Aws\Result getFunctionRecursionConfig(array{FunctionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionRecursionConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionRecursionConfigAsync(array{FunctionName?: string, ...} $args = [])
 * @method \Aws\Result getFunctionScalingConfig(array $args = [])
 * @phpstan-method \Aws\Result getFunctionScalingConfig(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionScalingConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionScalingConfigAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result getFunctionUrlConfig(array $args = [])
 * @phpstan-method \Aws\Result getFunctionUrlConfig(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionUrlConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionUrlConfigAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result getLayerVersion(array $args = [])
 * @phpstan-method \Aws\Result getLayerVersion(array{LayerName?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLayerVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLayerVersionAsync(array{LayerName?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result getLayerVersionByArn(array $args = [])
 * @phpstan-method \Aws\Result getLayerVersionByArn(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLayerVersionByArnAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLayerVersionByArnAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result getLayerVersionPolicy(array $args = [])
 * @phpstan-method \Aws\Result getLayerVersionPolicy(array{LayerName?: string, VersionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLayerVersionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLayerVersionPolicyAsync(array{LayerName?: string, VersionNumber?: int, ...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result getProvisionedConcurrencyConfig(array $args = [])
 * @phpstan-method \Aws\Result getProvisionedConcurrencyConfig(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProvisionedConcurrencyConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProvisionedConcurrencyConfigAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result getRuntimeManagementConfig(array $args = [])
 * @phpstan-method \Aws\Result getRuntimeManagementConfig(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuntimeManagementConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuntimeManagementConfigAsync(array{FunctionName?: string, Qualifier?: string, ...} $args = [])
 * @method \Aws\Result invoke(array $args = [])
 * @phpstan-method \Aws\Result invoke(array{
 *     FunctionName?: string,
 *     InvocationType?: 'DryRun'|'Event'|'RequestResponse',
 *     LogType?: 'None'|'Tail',
 *     ClientContext?: string,
 *     DurableExecutionName?: string,
 *     Payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Qualifier?: string,
 *     TenantId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeAsync(array{
 *     FunctionName?: string,
 *     InvocationType?: 'DryRun'|'Event'|'RequestResponse',
 *     LogType?: 'None'|'Tail',
 *     ClientContext?: string,
 *     DurableExecutionName?: string,
 *     Payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     Qualifier?: string,
 *     TenantId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeAsynchronous(array $args = [])
 * @phpstan-method \Aws\Result invokeAsynchronous(array{FunctionName?: string, InvokeArgs?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeAsynchronousAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeAsynchronousAsync(array{FunctionName?: string, InvokeArgs?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \Aws\Result invokeWithResponseStream(array $args = [])
 * @phpstan-method \Aws\Result invokeWithResponseStream(array{
 *     FunctionName?: string,
 *     LogType?: 'None'|'Tail',
 *     ClientContext?: string,
 *     Qualifier?: string,
 *     Payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     TenantId?: string,
 *     InvocationType?: 'DryRun'|'RequestResponse',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeWithResponseStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeWithResponseStreamAsync(array{
 *     FunctionName?: string,
 *     LogType?: 'None'|'Tail',
 *     ClientContext?: string,
 *     Qualifier?: string,
 *     Payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     TenantId?: string,
 *     InvocationType?: 'DryRun'|'RequestResponse',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAliases(array $args = [])
 * @phpstan-method \Aws\Result listAliases(array{FunctionName?: string, FunctionVersion?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAliasesAsync(array{FunctionName?: string, FunctionVersion?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listCapacityProviders(array $args = [])
 * @phpstan-method \Aws\Result listCapacityProviders(array{State?: 'Active'|'Deleting'|'Failed'|'Pending', Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCapacityProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCapacityProvidersAsync(array{State?: 'Active'|'Deleting'|'Failed'|'Pending', Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listCodeSigningConfigs(array $args = [])
 * @phpstan-method \Aws\Result listCodeSigningConfigs(array{Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeSigningConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeSigningConfigsAsync(array{Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listDurableExecutionsByFunction(array $args = [])
 * @phpstan-method \Aws\Result listDurableExecutionsByFunction(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     DurableExecutionName?: string,
 *     Statuses?: list<'FAILED'|'RUNNING'|'STOPPED'|'SUCCEEDED'|'TIMED_OUT'>,
 *     StartedAfter?: int|string|\DateTimeInterface,
 *     StartedBefore?: int|string|\DateTimeInterface,
 *     ReverseOrder?: bool,
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDurableExecutionsByFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDurableExecutionsByFunctionAsync(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     DurableExecutionName?: string,
 *     Statuses?: list<'FAILED'|'RUNNING'|'STOPPED'|'SUCCEEDED'|'TIMED_OUT'>,
 *     StartedAfter?: int|string|\DateTimeInterface,
 *     StartedBefore?: int|string|\DateTimeInterface,
 *     ReverseOrder?: bool,
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEventSourceMappings(array $args = [])
 * @phpstan-method \Aws\Result listEventSourceMappings(array{EventSourceArn?: string, FunctionName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventSourceMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventSourceMappingsAsync(array{EventSourceArn?: string, FunctionName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listFunctionEventInvokeConfigs(array $args = [])
 * @phpstan-method \Aws\Result listFunctionEventInvokeConfigs(array{FunctionName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionEventInvokeConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionEventInvokeConfigsAsync(array{FunctionName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listFunctionUrlConfigs(array $args = [])
 * @phpstan-method \Aws\Result listFunctionUrlConfigs(array{FunctionName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionUrlConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionUrlConfigsAsync(array{FunctionName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listFunctionVersionsByCapacityProvider(array $args = [])
 * @phpstan-method \Aws\Result listFunctionVersionsByCapacityProvider(array{CapacityProviderName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionVersionsByCapacityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionVersionsByCapacityProviderAsync(array{CapacityProviderName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listFunctions(array $args = [])
 * @phpstan-method \Aws\Result listFunctions(array{MasterRegion?: string, FunctionVersion?: 'ALL', Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionsAsync(array{MasterRegion?: string, FunctionVersion?: 'ALL', Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listFunctionsByCodeSigningConfig(array $args = [])
 * @phpstan-method \Aws\Result listFunctionsByCodeSigningConfig(array{CodeSigningConfigArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionsByCodeSigningConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionsByCodeSigningConfigAsync(array{CodeSigningConfigArn?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listLayerVersions(array $args = [])
 * @phpstan-method \Aws\Result listLayerVersions(array{
 *     CompatibleArchitecture?: 'arm64'|'x86_64',
 *     CompatibleRuntime?: 'dotnet10'|'dotnet6'|'dotnet8'|'dotnetcore1.0'|'dotnetcore2.0'|'dotnetcore2.1'|'dotnetcore3.1'|'go1.x'|'java11'|'java11.al2023'|'java17'|'java17.al2023'|'java21'|'java25'|'java8'|'java8.al2'|'java8.al2023'|'nodejs'|'nodejs10.x'|'nodejs12.x'|'nodejs14.x'|'nodejs16.x'|'nodejs18.x'|'nodejs20.x'|'nodejs22.x'|'nodejs24.x'|'nodejs4.3'|'nodejs4.3-edge'|'nodejs6.10'|'nodejs8.10'|'provided'|'provided.al2'|'provided.al2023'|'python2.7'|'python3.10'|'python3.11'|'python3.12'|'python3.13'|'python3.14'|'python3.6'|'python3.7'|'python3.8'|'python3.9'|'ruby2.5'|'ruby2.7'|'ruby3.2'|'ruby3.3'|'ruby3.4'|'ruby4.0',
 *     LayerName?: string,
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLayerVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLayerVersionsAsync(array{
 *     CompatibleArchitecture?: 'arm64'|'x86_64',
 *     CompatibleRuntime?: 'dotnet10'|'dotnet6'|'dotnet8'|'dotnetcore1.0'|'dotnetcore2.0'|'dotnetcore2.1'|'dotnetcore3.1'|'go1.x'|'java11'|'java11.al2023'|'java17'|'java17.al2023'|'java21'|'java25'|'java8'|'java8.al2'|'java8.al2023'|'nodejs'|'nodejs10.x'|'nodejs12.x'|'nodejs14.x'|'nodejs16.x'|'nodejs18.x'|'nodejs20.x'|'nodejs22.x'|'nodejs24.x'|'nodejs4.3'|'nodejs4.3-edge'|'nodejs6.10'|'nodejs8.10'|'provided'|'provided.al2'|'provided.al2023'|'python2.7'|'python3.10'|'python3.11'|'python3.12'|'python3.13'|'python3.14'|'python3.6'|'python3.7'|'python3.8'|'python3.9'|'ruby2.5'|'ruby2.7'|'ruby3.2'|'ruby3.3'|'ruby3.4'|'ruby4.0',
 *     LayerName?: string,
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLayers(array $args = [])
 * @phpstan-method \Aws\Result listLayers(array{
 *     CompatibleArchitecture?: 'arm64'|'x86_64',
 *     CompatibleRuntime?: 'dotnet10'|'dotnet6'|'dotnet8'|'dotnetcore1.0'|'dotnetcore2.0'|'dotnetcore2.1'|'dotnetcore3.1'|'go1.x'|'java11'|'java11.al2023'|'java17'|'java17.al2023'|'java21'|'java25'|'java8'|'java8.al2'|'java8.al2023'|'nodejs'|'nodejs10.x'|'nodejs12.x'|'nodejs14.x'|'nodejs16.x'|'nodejs18.x'|'nodejs20.x'|'nodejs22.x'|'nodejs24.x'|'nodejs4.3'|'nodejs4.3-edge'|'nodejs6.10'|'nodejs8.10'|'provided'|'provided.al2'|'provided.al2023'|'python2.7'|'python3.10'|'python3.11'|'python3.12'|'python3.13'|'python3.14'|'python3.6'|'python3.7'|'python3.8'|'python3.9'|'ruby2.5'|'ruby2.7'|'ruby3.2'|'ruby3.3'|'ruby3.4'|'ruby4.0',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLayersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLayersAsync(array{
 *     CompatibleArchitecture?: 'arm64'|'x86_64',
 *     CompatibleRuntime?: 'dotnet10'|'dotnet6'|'dotnet8'|'dotnetcore1.0'|'dotnetcore2.0'|'dotnetcore2.1'|'dotnetcore3.1'|'go1.x'|'java11'|'java11.al2023'|'java17'|'java17.al2023'|'java21'|'java25'|'java8'|'java8.al2'|'java8.al2023'|'nodejs'|'nodejs10.x'|'nodejs12.x'|'nodejs14.x'|'nodejs16.x'|'nodejs18.x'|'nodejs20.x'|'nodejs22.x'|'nodejs24.x'|'nodejs4.3'|'nodejs4.3-edge'|'nodejs6.10'|'nodejs8.10'|'provided'|'provided.al2'|'provided.al2023'|'python2.7'|'python3.10'|'python3.11'|'python3.12'|'python3.13'|'python3.14'|'python3.6'|'python3.7'|'python3.8'|'python3.9'|'ruby2.5'|'ruby2.7'|'ruby3.2'|'ruby3.3'|'ruby3.4'|'ruby4.0',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProvisionedConcurrencyConfigs(array $args = [])
 * @phpstan-method \Aws\Result listProvisionedConcurrencyConfigs(array{FunctionName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProvisionedConcurrencyConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProvisionedConcurrencyConfigsAsync(array{FunctionName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{Resource?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{Resource?: string, ...} $args = [])
 * @method \Aws\Result listVersionsByFunction(array $args = [])
 * @phpstan-method \Aws\Result listVersionsByFunction(array{FunctionName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVersionsByFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVersionsByFunctionAsync(array{FunctionName?: string, Marker?: string, MaxItems?: int, ...} $args = [])
 * @method \Aws\Result publishLayerVersion(array $args = [])
 * @phpstan-method \Aws\Result publishLayerVersion(array{
 *     LayerName?: string,
 *     Description?: string,
 *     Content?: array{
 *         S3Bucket?: string,
 *         S3Key?: string,
 *         S3ObjectVersion?: string,
 *         S3ObjectStorageMode?: 'COPY'|'REFERENCE',
 *         ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     CompatibleArchitectures?: list<'arm64'|'x86_64'>,
 *     CompatibleRuntimes?: list<'dotnet10'|'dotnet6'|'dotnet8'|'dotnetcore1.0'|'dotnetcore2.0'|'dotnetcore2.1'|'dotnetcore3.1'|'go1.x'|'java11'|'java11.al2023'|'java17'|'java17.al2023'|'java21'|'java25'|'java8'|'java8.al2'|'java8.al2023'|'nodejs'|'nodejs10.x'|'nodejs12.x'|'nodejs14.x'|'nodejs16.x'|'nodejs18.x'|'nodejs20.x'|'nodejs22.x'|'nodejs24.x'|'nodejs4.3'|'nodejs4.3-edge'|'nodejs6.10'|'nodejs8.10'|'provided'|'provided.al2'|'provided.al2023'|'python2.7'|'python3.10'|'python3.11'|'python3.12'|'python3.13'|'python3.14'|'python3.6'|'python3.7'|'python3.8'|'python3.9'|'ruby2.5'|'ruby2.7'|'ruby3.2'|'ruby3.3'|'ruby3.4'|'ruby4.0'>,
 *     LicenseInfo?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise publishLayerVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishLayerVersionAsync(array{
 *     LayerName?: string,
 *     Description?: string,
 *     Content?: array{
 *         S3Bucket?: string,
 *         S3Key?: string,
 *         S3ObjectVersion?: string,
 *         S3ObjectStorageMode?: 'COPY'|'REFERENCE',
 *         ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *         ...,
 *     },
 *     CompatibleArchitectures?: list<'arm64'|'x86_64'>,
 *     CompatibleRuntimes?: list<'dotnet10'|'dotnet6'|'dotnet8'|'dotnetcore1.0'|'dotnetcore2.0'|'dotnetcore2.1'|'dotnetcore3.1'|'go1.x'|'java11'|'java11.al2023'|'java17'|'java17.al2023'|'java21'|'java25'|'java8'|'java8.al2'|'java8.al2023'|'nodejs'|'nodejs10.x'|'nodejs12.x'|'nodejs14.x'|'nodejs16.x'|'nodejs18.x'|'nodejs20.x'|'nodejs22.x'|'nodejs24.x'|'nodejs4.3'|'nodejs4.3-edge'|'nodejs6.10'|'nodejs8.10'|'provided'|'provided.al2'|'provided.al2023'|'python2.7'|'python3.10'|'python3.11'|'python3.12'|'python3.13'|'python3.14'|'python3.6'|'python3.7'|'python3.8'|'python3.9'|'ruby2.5'|'ruby2.7'|'ruby3.2'|'ruby3.3'|'ruby3.4'|'ruby4.0'>,
 *     LicenseInfo?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result publishVersion(array $args = [])
 * @phpstan-method \Aws\Result publishVersion(array{
 *     FunctionName?: string,
 *     CodeSha256?: string,
 *     Description?: string,
 *     RevisionId?: string,
 *     PublishTo?: 'LATEST_PUBLISHED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise publishVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishVersionAsync(array{
 *     FunctionName?: string,
 *     CodeSha256?: string,
 *     Description?: string,
 *     RevisionId?: string,
 *     PublishTo?: 'LATEST_PUBLISHED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putFunctionCodeSigningConfig(array $args = [])
 * @phpstan-method \Aws\Result putFunctionCodeSigningConfig(array{CodeSigningConfigArn?: string, FunctionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putFunctionCodeSigningConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFunctionCodeSigningConfigAsync(array{CodeSigningConfigArn?: string, FunctionName?: string, ...} $args = [])
 * @method \Aws\Result putFunctionConcurrency(array $args = [])
 * @phpstan-method \Aws\Result putFunctionConcurrency(array{FunctionName?: string, ReservedConcurrentExecutions?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putFunctionConcurrencyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFunctionConcurrencyAsync(array{FunctionName?: string, ReservedConcurrentExecutions?: int, ...} $args = [])
 * @method \Aws\Result putFunctionEventInvokeConfig(array $args = [])
 * @phpstan-method \Aws\Result putFunctionEventInvokeConfig(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     MaximumRetryAttempts?: int,
 *     MaximumEventAgeInSeconds?: int,
 *     DestinationConfig?: array{OnSuccess?: array{Destination?: string, ...}, OnFailure?: array{Destination?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putFunctionEventInvokeConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFunctionEventInvokeConfigAsync(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     MaximumRetryAttempts?: int,
 *     MaximumEventAgeInSeconds?: int,
 *     DestinationConfig?: array{OnSuccess?: array{Destination?: string, ...}, OnFailure?: array{Destination?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putFunctionRecursionConfig(array $args = [])
 * @phpstan-method \Aws\Result putFunctionRecursionConfig(array{FunctionName?: string, RecursiveLoop?: 'Allow'|'Terminate', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putFunctionRecursionConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFunctionRecursionConfigAsync(array{FunctionName?: string, RecursiveLoop?: 'Allow'|'Terminate', ...} $args = [])
 * @method \Aws\Result putFunctionScalingConfig(array $args = [])
 * @phpstan-method \Aws\Result putFunctionScalingConfig(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     FunctionScalingConfig?: array{MinExecutionEnvironments?: int, MaxExecutionEnvironments?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putFunctionScalingConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFunctionScalingConfigAsync(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     FunctionScalingConfig?: array{MinExecutionEnvironments?: int, MaxExecutionEnvironments?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putProvisionedConcurrencyConfig(array $args = [])
 * @phpstan-method \Aws\Result putProvisionedConcurrencyConfig(array{FunctionName?: string, Qualifier?: string, ProvisionedConcurrentExecutions?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putProvisionedConcurrencyConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putProvisionedConcurrencyConfigAsync(array{FunctionName?: string, Qualifier?: string, ProvisionedConcurrentExecutions?: int, ...} $args = [])
 * @method \Aws\Result putRuntimeManagementConfig(array $args = [])
 * @phpstan-method \Aws\Result putRuntimeManagementConfig(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     UpdateRuntimeOn?: 'Auto'|'FunctionUpdate'|'Manual',
 *     RuntimeVersionArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRuntimeManagementConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRuntimeManagementConfigAsync(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     UpdateRuntimeOn?: 'Auto'|'FunctionUpdate'|'Manual',
 *     RuntimeVersionArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeLayerVersionPermission(array $args = [])
 * @phpstan-method \Aws\Result removeLayerVersionPermission(array{LayerName?: string, VersionNumber?: int, StatementId?: string, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeLayerVersionPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeLayerVersionPermissionAsync(array{LayerName?: string, VersionNumber?: int, StatementId?: string, RevisionId?: string, ...} $args = [])
 * @method \Aws\Result removePermission(array $args = [])
 * @phpstan-method \Aws\Result removePermission(array{FunctionName?: string, StatementId?: string, Qualifier?: string, RevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removePermissionAsync(array{FunctionName?: string, StatementId?: string, Qualifier?: string, RevisionId?: string, ...} $args = [])
 * @method \Aws\Result sendDurableExecutionCallbackFailure(array $args = [])
 * @phpstan-method \Aws\Result sendDurableExecutionCallbackFailure(array{
 *     CallbackId?: string,
 *     Error?: array{ErrorMessage?: string, ErrorType?: string, ErrorData?: string, StackTrace?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendDurableExecutionCallbackFailureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendDurableExecutionCallbackFailureAsync(array{
 *     CallbackId?: string,
 *     Error?: array{ErrorMessage?: string, ErrorType?: string, ErrorData?: string, StackTrace?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendDurableExecutionCallbackHeartbeat(array $args = [])
 * @phpstan-method \Aws\Result sendDurableExecutionCallbackHeartbeat(array{CallbackId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendDurableExecutionCallbackHeartbeatAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendDurableExecutionCallbackHeartbeatAsync(array{CallbackId?: string, ...} $args = [])
 * @method \Aws\Result sendDurableExecutionCallbackSuccess(array $args = [])
 * @phpstan-method \Aws\Result sendDurableExecutionCallbackSuccess(array{CallbackId?: string, Result?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendDurableExecutionCallbackSuccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendDurableExecutionCallbackSuccessAsync(array{CallbackId?: string, Result?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \Aws\Result stopDurableExecution(array $args = [])
 * @phpstan-method \Aws\Result stopDurableExecution(array{
 *     DurableExecutionArn?: string,
 *     Error?: array{ErrorMessage?: string, ErrorType?: string, ErrorData?: string, StackTrace?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDurableExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopDurableExecutionAsync(array{
 *     DurableExecutionArn?: string,
 *     Error?: array{ErrorMessage?: string, ErrorType?: string, ErrorData?: string, StackTrace?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{Resource?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{Resource?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{Resource?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{Resource?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAlias(array $args = [])
 * @phpstan-method \Aws\Result updateAlias(array{
 *     FunctionName?: string,
 *     Name?: string,
 *     FunctionVersion?: string,
 *     Description?: string,
 *     RoutingConfig?: array{AdditionalVersionWeights?: array<string, float>, ...},
 *     RevisionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAliasAsync(array{
 *     FunctionName?: string,
 *     Name?: string,
 *     FunctionVersion?: string,
 *     Description?: string,
 *     RoutingConfig?: array{AdditionalVersionWeights?: array<string, float>, ...},
 *     RevisionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCapacityProvider(array $args = [])
 * @phpstan-method \Aws\Result updateCapacityProvider(array{
 *     CapacityProviderName?: string,
 *     CapacityProviderScalingConfig?: array{MaxVCpuCount?: int, ScalingMode?: 'Auto'|'Manual', ScalingPolicies?: list<array>, ...},
 *     PropagateTags?: array{Mode?: 'Explicit'|'None', ExplicitTags?: array<string, string>, ...},
 *     TelemetryConfig?: array{LoggingConfig?: array{SystemLogLevel?: 'DEBUG'|'INFO'|'WARN', LogGroup?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCapacityProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCapacityProviderAsync(array{
 *     CapacityProviderName?: string,
 *     CapacityProviderScalingConfig?: array{MaxVCpuCount?: int, ScalingMode?: 'Auto'|'Manual', ScalingPolicies?: list<array>, ...},
 *     PropagateTags?: array{Mode?: 'Explicit'|'None', ExplicitTags?: array<string, string>, ...},
 *     TelemetryConfig?: array{LoggingConfig?: array{SystemLogLevel?: 'DEBUG'|'INFO'|'WARN', LogGroup?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCodeSigningConfig(array $args = [])
 * @phpstan-method \Aws\Result updateCodeSigningConfig(array{
 *     CodeSigningConfigArn?: string,
 *     Description?: string,
 *     AllowedPublishers?: array{SigningProfileVersionArns?: list<string>, ...},
 *     CodeSigningPolicies?: array{UntrustedArtifactOnDeployment?: 'Enforce'|'Warn', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCodeSigningConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCodeSigningConfigAsync(array{
 *     CodeSigningConfigArn?: string,
 *     Description?: string,
 *     AllowedPublishers?: array{SigningProfileVersionArns?: list<string>, ...},
 *     CodeSigningPolicies?: array{UntrustedArtifactOnDeployment?: 'Enforce'|'Warn', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventSourceMapping(array $args = [])
 * @phpstan-method \Aws\Result updateEventSourceMapping(array{
 *     UUID?: string,
 *     FunctionName?: string,
 *     Enabled?: bool,
 *     BatchSize?: int,
 *     FilterCriteria?: array{Filters?: list<array>, ...},
 *     KMSKeyArn?: string,
 *     MetricsConfig?: array{Metrics?: list<'ErrorCount'|'EventCount'|'KafkaMetrics'>, ...},
 *     LoggingConfig?: array{SystemLogLevel?: 'DEBUG'|'INFO'|'WARN', ...},
 *     ScalingConfig?: array{MaximumConcurrency?: int, ...},
 *     MaximumBatchingWindowInSeconds?: int,
 *     ParallelizationFactor?: int,
 *     DestinationConfig?: array{OnSuccess?: array{Destination?: string, ...}, OnFailure?: array{Destination?: string, ...}, ...},
 *     MaximumRecordAgeInSeconds?: int,
 *     BisectBatchOnFunctionError?: bool,
 *     MaximumRetryAttempts?: int,
 *     TumblingWindowInSeconds?: int,
 *     SourceAccessConfigurations?: list<array{
 *         Type?: 'BASIC_AUTH'|'CLIENT_CERTIFICATE_TLS_AUTH'|'SASL_SCRAM_256_AUTH'|'SASL_SCRAM_512_AUTH'|'SERVER_ROOT_CA_CERTIFICATE'|'VIRTUAL_HOST'|'VPC_SECURITY_GROUP'|'VPC_SUBNET',
 *         URI?: string,
 *         ...,
 *     }>,
 *     FunctionResponseTypes?: list<'ReportBatchItemFailures'>,
 *     AmazonManagedKafkaEventSourceConfig?: array{
 *         ConsumerGroupId?: string,
 *         SchemaRegistryConfig?: array{
 *             SchemaRegistryURI?: string,
 *             EventRecordFormat?: 'JSON'|'SOURCE',
 *             AccessConfigs?: list<array>,
 *             SchemaValidationConfigs?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SelfManagedKafkaEventSourceConfig?: array{
 *         ConsumerGroupId?: string,
 *         SchemaRegistryConfig?: array{
 *             SchemaRegistryURI?: string,
 *             EventRecordFormat?: 'JSON'|'SOURCE',
 *             AccessConfigs?: list<array>,
 *             SchemaValidationConfigs?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DocumentDBEventSourceConfig?: array{DatabaseName?: string, CollectionName?: string, FullDocument?: 'Default'|'UpdateLookup', ...},
 *     ProvisionedPollerConfig?: array{MinimumPollers?: int, MaximumPollers?: int, PollerGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventSourceMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventSourceMappingAsync(array{
 *     UUID?: string,
 *     FunctionName?: string,
 *     Enabled?: bool,
 *     BatchSize?: int,
 *     FilterCriteria?: array{Filters?: list<array>, ...},
 *     KMSKeyArn?: string,
 *     MetricsConfig?: array{Metrics?: list<'ErrorCount'|'EventCount'|'KafkaMetrics'>, ...},
 *     LoggingConfig?: array{SystemLogLevel?: 'DEBUG'|'INFO'|'WARN', ...},
 *     ScalingConfig?: array{MaximumConcurrency?: int, ...},
 *     MaximumBatchingWindowInSeconds?: int,
 *     ParallelizationFactor?: int,
 *     DestinationConfig?: array{OnSuccess?: array{Destination?: string, ...}, OnFailure?: array{Destination?: string, ...}, ...},
 *     MaximumRecordAgeInSeconds?: int,
 *     BisectBatchOnFunctionError?: bool,
 *     MaximumRetryAttempts?: int,
 *     TumblingWindowInSeconds?: int,
 *     SourceAccessConfigurations?: list<array{
 *         Type?: 'BASIC_AUTH'|'CLIENT_CERTIFICATE_TLS_AUTH'|'SASL_SCRAM_256_AUTH'|'SASL_SCRAM_512_AUTH'|'SERVER_ROOT_CA_CERTIFICATE'|'VIRTUAL_HOST'|'VPC_SECURITY_GROUP'|'VPC_SUBNET',
 *         URI?: string,
 *         ...,
 *     }>,
 *     FunctionResponseTypes?: list<'ReportBatchItemFailures'>,
 *     AmazonManagedKafkaEventSourceConfig?: array{
 *         ConsumerGroupId?: string,
 *         SchemaRegistryConfig?: array{
 *             SchemaRegistryURI?: string,
 *             EventRecordFormat?: 'JSON'|'SOURCE',
 *             AccessConfigs?: list<array>,
 *             SchemaValidationConfigs?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SelfManagedKafkaEventSourceConfig?: array{
 *         ConsumerGroupId?: string,
 *         SchemaRegistryConfig?: array{
 *             SchemaRegistryURI?: string,
 *             EventRecordFormat?: 'JSON'|'SOURCE',
 *             AccessConfigs?: list<array>,
 *             SchemaValidationConfigs?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DocumentDBEventSourceConfig?: array{DatabaseName?: string, CollectionName?: string, FullDocument?: 'Default'|'UpdateLookup', ...},
 *     ProvisionedPollerConfig?: array{MinimumPollers?: int, MaximumPollers?: int, PollerGroupName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFunctionCode(array $args = [])
 * @phpstan-method \Aws\Result updateFunctionCode(array{
 *     FunctionName?: string,
 *     ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     S3Bucket?: string,
 *     S3Key?: string,
 *     S3ObjectVersion?: string,
 *     S3ObjectStorageMode?: 'COPY'|'REFERENCE',
 *     ImageUri?: string,
 *     Architectures?: list<'arm64'|'x86_64'>,
 *     Publish?: bool,
 *     PublishTo?: 'LATEST_PUBLISHED',
 *     DryRun?: bool,
 *     RevisionId?: string,
 *     SourceKMSKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFunctionCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFunctionCodeAsync(array{
 *     FunctionName?: string,
 *     ZipFile?: string|resource|\Psr\Http\Message\StreamInterface,
 *     S3Bucket?: string,
 *     S3Key?: string,
 *     S3ObjectVersion?: string,
 *     S3ObjectStorageMode?: 'COPY'|'REFERENCE',
 *     ImageUri?: string,
 *     Architectures?: list<'arm64'|'x86_64'>,
 *     Publish?: bool,
 *     PublishTo?: 'LATEST_PUBLISHED',
 *     DryRun?: bool,
 *     RevisionId?: string,
 *     SourceKMSKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFunctionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateFunctionConfiguration(array{
 *     FunctionName?: string,
 *     Role?: string,
 *     Handler?: string,
 *     Description?: string,
 *     Timeout?: int,
 *     MemorySize?: int,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, Ipv6AllowedForDualStack?: bool, ...},
 *     Environment?: array{Variables?: array<string, string>, ...},
 *     Runtime?: 'dotnet10'|'dotnet6'|'dotnet8'|'dotnetcore1.0'|'dotnetcore2.0'|'dotnetcore2.1'|'dotnetcore3.1'|'go1.x'|'java11'|'java11.al2023'|'java17'|'java17.al2023'|'java21'|'java25'|'java8'|'java8.al2'|'java8.al2023'|'nodejs'|'nodejs10.x'|'nodejs12.x'|'nodejs14.x'|'nodejs16.x'|'nodejs18.x'|'nodejs20.x'|'nodejs22.x'|'nodejs24.x'|'nodejs4.3'|'nodejs4.3-edge'|'nodejs6.10'|'nodejs8.10'|'provided'|'provided.al2'|'provided.al2023'|'python2.7'|'python3.10'|'python3.11'|'python3.12'|'python3.13'|'python3.14'|'python3.6'|'python3.7'|'python3.8'|'python3.9'|'ruby2.5'|'ruby2.7'|'ruby3.2'|'ruby3.3'|'ruby3.4'|'ruby4.0',
 *     DeadLetterConfig?: array{TargetArn?: string, ...},
 *     KMSKeyArn?: string,
 *     TracingConfig?: array{Mode?: 'Active'|'PassThrough', ...},
 *     RevisionId?: string,
 *     Layers?: list<string>,
 *     FileSystemConfigs?: list<array{Arn?: string, LocalMountPath?: string, ...}>,
 *     ImageConfig?: array{EntryPoint?: list<string>, Command?: list<string>, WorkingDirectory?: string, ...},
 *     EphemeralStorage?: array{Size?: int, ...},
 *     SnapStart?: array{ApplyOn?: 'None'|'PublishedVersions', ...},
 *     LoggingConfig?: array{
 *         LogFormat?: 'JSON'|'Text',
 *         ApplicationLogLevel?: 'DEBUG'|'ERROR'|'FATAL'|'INFO'|'TRACE'|'WARN',
 *         SystemLogLevel?: 'DEBUG'|'INFO'|'WARN',
 *         LogGroup?: string,
 *         ...,
 *     },
 *     CapacityProviderConfig?: array{
 *         LambdaManagedInstancesCapacityProviderConfig?: array{
 *             CapacityProviderArn?: string,
 *             PerExecutionEnvironmentMaxConcurrency?: int,
 *             ExecutionEnvironmentMemoryGiBPerVCpu?: float,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DurableConfig?: array{KMSKeyArn?: string, RetentionPeriodInDays?: int, ExecutionTimeout?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFunctionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFunctionConfigurationAsync(array{
 *     FunctionName?: string,
 *     Role?: string,
 *     Handler?: string,
 *     Description?: string,
 *     Timeout?: int,
 *     MemorySize?: int,
 *     VpcConfig?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, Ipv6AllowedForDualStack?: bool, ...},
 *     Environment?: array{Variables?: array<string, string>, ...},
 *     Runtime?: 'dotnet10'|'dotnet6'|'dotnet8'|'dotnetcore1.0'|'dotnetcore2.0'|'dotnetcore2.1'|'dotnetcore3.1'|'go1.x'|'java11'|'java11.al2023'|'java17'|'java17.al2023'|'java21'|'java25'|'java8'|'java8.al2'|'java8.al2023'|'nodejs'|'nodejs10.x'|'nodejs12.x'|'nodejs14.x'|'nodejs16.x'|'nodejs18.x'|'nodejs20.x'|'nodejs22.x'|'nodejs24.x'|'nodejs4.3'|'nodejs4.3-edge'|'nodejs6.10'|'nodejs8.10'|'provided'|'provided.al2'|'provided.al2023'|'python2.7'|'python3.10'|'python3.11'|'python3.12'|'python3.13'|'python3.14'|'python3.6'|'python3.7'|'python3.8'|'python3.9'|'ruby2.5'|'ruby2.7'|'ruby3.2'|'ruby3.3'|'ruby3.4'|'ruby4.0',
 *     DeadLetterConfig?: array{TargetArn?: string, ...},
 *     KMSKeyArn?: string,
 *     TracingConfig?: array{Mode?: 'Active'|'PassThrough', ...},
 *     RevisionId?: string,
 *     Layers?: list<string>,
 *     FileSystemConfigs?: list<array{Arn?: string, LocalMountPath?: string, ...}>,
 *     ImageConfig?: array{EntryPoint?: list<string>, Command?: list<string>, WorkingDirectory?: string, ...},
 *     EphemeralStorage?: array{Size?: int, ...},
 *     SnapStart?: array{ApplyOn?: 'None'|'PublishedVersions', ...},
 *     LoggingConfig?: array{
 *         LogFormat?: 'JSON'|'Text',
 *         ApplicationLogLevel?: 'DEBUG'|'ERROR'|'FATAL'|'INFO'|'TRACE'|'WARN',
 *         SystemLogLevel?: 'DEBUG'|'INFO'|'WARN',
 *         LogGroup?: string,
 *         ...,
 *     },
 *     CapacityProviderConfig?: array{
 *         LambdaManagedInstancesCapacityProviderConfig?: array{
 *             CapacityProviderArn?: string,
 *             PerExecutionEnvironmentMaxConcurrency?: int,
 *             ExecutionEnvironmentMemoryGiBPerVCpu?: float,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DurableConfig?: array{KMSKeyArn?: string, RetentionPeriodInDays?: int, ExecutionTimeout?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFunctionEventInvokeConfig(array $args = [])
 * @phpstan-method \Aws\Result updateFunctionEventInvokeConfig(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     MaximumRetryAttempts?: int,
 *     MaximumEventAgeInSeconds?: int,
 *     DestinationConfig?: array{OnSuccess?: array{Destination?: string, ...}, OnFailure?: array{Destination?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFunctionEventInvokeConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFunctionEventInvokeConfigAsync(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     MaximumRetryAttempts?: int,
 *     MaximumEventAgeInSeconds?: int,
 *     DestinationConfig?: array{OnSuccess?: array{Destination?: string, ...}, OnFailure?: array{Destination?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFunctionUrlConfig(array $args = [])
 * @phpstan-method \Aws\Result updateFunctionUrlConfig(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     AuthType?: 'AWS_IAM'|'NONE',
 *     Cors?: array{
 *         AllowCredentials?: bool,
 *         AllowHeaders?: list<string>,
 *         AllowMethods?: list<string>,
 *         AllowOrigins?: list<string>,
 *         ExposeHeaders?: list<string>,
 *         MaxAge?: int,
 *         ...,
 *     },
 *     InvokeMode?: 'BUFFERED'|'RESPONSE_STREAM',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFunctionUrlConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFunctionUrlConfigAsync(array{
 *     FunctionName?: string,
 *     Qualifier?: string,
 *     AuthType?: 'AWS_IAM'|'NONE',
 *     Cors?: array{
 *         AllowCredentials?: bool,
 *         AllowHeaders?: list<string>,
 *         AllowMethods?: list<string>,
 *         AllowOrigins?: list<string>,
 *         ExposeHeaders?: list<string>,
 *         MaxAge?: int,
 *         ...,
 *     },
 *     InvokeMode?: 'BUFFERED'|'RESPONSE_STREAM',
 *     ...,
 * } $args = [])
 */
class LambdaClient extends AwsClient
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $args)
    {
        parent::__construct($args);
        $list = $this->getHandlerList();
        if (extension_loaded('curl')) {
            $list->appendInit($this->getDefaultCurlOptionsMiddleware());
        }
    }

    /**
     * Provides a middleware that sets default Curl options for the command
     *
     * @return callable
     */
    public function getDefaultCurlOptionsMiddleware()
    {
        return Middleware::mapCommand(function (CommandInterface $cmd) {
            $defaultCurlOptions = [
                CURLOPT_TCP_KEEPALIVE => 1,
            ];
            if (!isset($cmd['@http']['curl'])) {
                $cmd['@http']['curl'] = $defaultCurlOptions;
            } else {
                $cmd['@http']['curl'] += $defaultCurlOptions;
            }
            return $cmd;
        });
    }
}
