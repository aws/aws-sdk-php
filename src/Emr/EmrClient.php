<?php
namespace Aws\Emr;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic MapReduce (Amazon EMR)** service.
 *
 * @method \Aws\Result addInstanceFleet(array $args = [])
 * @phpstan-method \Aws\Result addInstanceFleet(array{
 *     ClusterId?: string,
 *     InstanceFleet?: array{
 *         Name?: string,
 *         InstanceFleetType?: 'CORE'|'MASTER'|'TASK',
 *         TargetOnDemandCapacity?: int,
 *         TargetSpotCapacity?: int,
 *         InstanceTypeConfigs?: list<array>,
 *         LaunchSpecifications?: array{SpotSpecification?: array, OnDemandSpecification?: array, ...},
 *         ResizeSpecifications?: array{SpotResizeSpecification?: array, OnDemandResizeSpecification?: array, ...},
 *         Context?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addInstanceFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addInstanceFleetAsync(array{
 *     ClusterId?: string,
 *     InstanceFleet?: array{
 *         Name?: string,
 *         InstanceFleetType?: 'CORE'|'MASTER'|'TASK',
 *         TargetOnDemandCapacity?: int,
 *         TargetSpotCapacity?: int,
 *         InstanceTypeConfigs?: list<array>,
 *         LaunchSpecifications?: array{SpotSpecification?: array, OnDemandSpecification?: array, ...},
 *         ResizeSpecifications?: array{SpotResizeSpecification?: array, OnDemandResizeSpecification?: array, ...},
 *         Context?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result addInstanceGroups(array $args = [])
 * @phpstan-method \Aws\Result addInstanceGroups(array{
 *     InstanceGroups?: list<array{
 *         Name?: string,
 *         Market?: 'ON_DEMAND'|'SPOT',
 *         InstanceRole?: 'CORE'|'MASTER'|'TASK',
 *         BidPrice?: string,
 *         InstanceType?: string,
 *         InstanceCount?: int,
 *         Configurations?: list<array>,
 *         EbsConfiguration?: array,
 *         AutoScalingPolicy?: array,
 *         CustomAmiId?: string,
 *         ...,
 *     }>,
 *     JobFlowId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addInstanceGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addInstanceGroupsAsync(array{
 *     InstanceGroups?: list<array{
 *         Name?: string,
 *         Market?: 'ON_DEMAND'|'SPOT',
 *         InstanceRole?: 'CORE'|'MASTER'|'TASK',
 *         BidPrice?: string,
 *         InstanceType?: string,
 *         InstanceCount?: int,
 *         Configurations?: list<array>,
 *         EbsConfiguration?: array,
 *         AutoScalingPolicy?: array,
 *         CustomAmiId?: string,
 *         ...,
 *     }>,
 *     JobFlowId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addJobFlowSteps(array $args = [])
 * @phpstan-method \Aws\Result addJobFlowSteps(array{
 *     JobFlowId?: string,
 *     Steps?: list<array{
 *         Name?: string,
 *         ActionOnFailure?: 'CANCEL_AND_WAIT'|'CONTINUE'|'TERMINATE_CLUSTER'|'TERMINATE_JOB_FLOW',
 *         HadoopJarStep?: array,
 *         StepMonitoringConfiguration?: array,
 *         ...,
 *     }>,
 *     ExecutionRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addJobFlowStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addJobFlowStepsAsync(array{
 *     JobFlowId?: string,
 *     Steps?: list<array{
 *         Name?: string,
 *         ActionOnFailure?: 'CANCEL_AND_WAIT'|'CONTINUE'|'TERMINATE_CLUSTER'|'TERMINATE_JOB_FLOW',
 *         HadoopJarStep?: array,
 *         StepMonitoringConfiguration?: array,
 *         ...,
 *     }>,
 *     ExecutionRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addTags(array $args = [])
 * @phpstan-method \Aws\Result addTags(array{ResourceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsAsync(array{ResourceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ClusterId?: string, ...} $args = [])
 * @method \Aws\Result cancelSteps(array $args = [])
 * @phpstan-method \Aws\Result cancelSteps(array{
 *     ClusterId?: string,
 *     StepIds?: list<string>,
 *     StepCancellationOption?: 'SEND_INTERRUPT'|'TERMINATE_PROCESS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelStepsAsync(array{
 *     ClusterId?: string,
 *     StepIds?: list<string>,
 *     StepCancellationOption?: 'SEND_INTERRUPT'|'TERMINATE_PROCESS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPersistentAppUI(array $args = [])
 * @phpstan-method \Aws\Result createPersistentAppUI(array{
 *     TargetResourceArn?: string,
 *     EMRContainersConfig?: array{JobRunId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     XReferer?: string,
 *     ProfilerType?: 'SHS'|'TEZUI'|'YTS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPersistentAppUIAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPersistentAppUIAsync(array{
 *     TargetResourceArn?: string,
 *     EMRContainersConfig?: array{JobRunId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     XReferer?: string,
 *     ProfilerType?: 'SHS'|'TEZUI'|'YTS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSecurityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createSecurityConfiguration(array{Name?: string, SecurityConfiguration?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSecurityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSecurityConfigurationAsync(array{Name?: string, SecurityConfiguration?: string, ...} $args = [])
 * @method \Aws\Result createStudio(array $args = [])
 * @phpstan-method \Aws\Result createStudio(array{
 *     Name?: string,
 *     Description?: string,
 *     AuthMode?: 'IAM'|'SSO',
 *     VpcId?: string,
 *     SubnetIds?: list<string>,
 *     ServiceRole?: string,
 *     UserRole?: string,
 *     WorkspaceSecurityGroupId?: string,
 *     EngineSecurityGroupId?: string,
 *     DefaultS3Location?: string,
 *     IdpAuthUrl?: string,
 *     IdpRelayStateParameterName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TrustedIdentityPropagationEnabled?: bool,
 *     IdcUserAssignment?: 'OPTIONAL'|'REQUIRED',
 *     IdcInstanceArn?: string,
 *     EncryptionKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStudioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStudioAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     AuthMode?: 'IAM'|'SSO',
 *     VpcId?: string,
 *     SubnetIds?: list<string>,
 *     ServiceRole?: string,
 *     UserRole?: string,
 *     WorkspaceSecurityGroupId?: string,
 *     EngineSecurityGroupId?: string,
 *     DefaultS3Location?: string,
 *     IdpAuthUrl?: string,
 *     IdpRelayStateParameterName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TrustedIdentityPropagationEnabled?: bool,
 *     IdcUserAssignment?: 'OPTIONAL'|'REQUIRED',
 *     IdcInstanceArn?: string,
 *     EncryptionKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStudioSessionMapping(array $args = [])
 * @phpstan-method \Aws\Result createStudioSessionMapping(array{
 *     StudioId?: string,
 *     IdentityId?: string,
 *     IdentityName?: string,
 *     IdentityType?: 'GROUP'|'USER',
 *     SessionPolicyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStudioSessionMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStudioSessionMappingAsync(array{
 *     StudioId?: string,
 *     IdentityId?: string,
 *     IdentityName?: string,
 *     IdentityType?: 'GROUP'|'USER',
 *     SessionPolicyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSecurityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteSecurityConfiguration(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSecurityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSecurityConfigurationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteStudio(array $args = [])
 * @phpstan-method \Aws\Result deleteStudio(array{StudioId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStudioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStudioAsync(array{StudioId?: string, ...} $args = [])
 * @method \Aws\Result deleteStudioSessionMapping(array $args = [])
 * @phpstan-method \Aws\Result deleteStudioSessionMapping(array{StudioId?: string, IdentityId?: string, IdentityName?: string, IdentityType?: 'GROUP'|'USER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStudioSessionMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStudioSessionMappingAsync(array{StudioId?: string, IdentityId?: string, IdentityName?: string, IdentityType?: 'GROUP'|'USER', ...} $args = [])
 * @method \Aws\Result describeCluster(array $args = [])
 * @phpstan-method \Aws\Result describeCluster(array{ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterAsync(array{ClusterId?: string, ...} $args = [])
 * @method \Aws\Result describeJobFlows(array $args = [])
 * @phpstan-method \Aws\Result describeJobFlows(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     JobFlowIds?: list<string>,
 *     JobFlowStates?: list<'BOOTSTRAPPING'|'COMPLETED'|'FAILED'|'RUNNING'|'SHUTTING_DOWN'|'STARTING'|'TERMINATED'|'WAITING'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobFlowsAsync(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     JobFlowIds?: list<string>,
 *     JobFlowStates?: list<'BOOTSTRAPPING'|'COMPLETED'|'FAILED'|'RUNNING'|'SHUTTING_DOWN'|'STARTING'|'TERMINATED'|'WAITING'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeNotebookExecution(array $args = [])
 * @phpstan-method \Aws\Result describeNotebookExecution(array{NotebookExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNotebookExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotebookExecutionAsync(array{NotebookExecutionId?: string, ...} $args = [])
 * @method \Aws\Result describePersistentAppUI(array $args = [])
 * @phpstan-method \Aws\Result describePersistentAppUI(array{PersistentAppUIId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePersistentAppUIAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePersistentAppUIAsync(array{PersistentAppUIId?: string, ...} $args = [])
 * @method \Aws\Result describeReleaseLabel(array $args = [])
 * @phpstan-method \Aws\Result describeReleaseLabel(array{ReleaseLabel?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReleaseLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReleaseLabelAsync(array{ReleaseLabel?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeSecurityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeSecurityConfiguration(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSecurityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSecurityConfigurationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeStep(array $args = [])
 * @phpstan-method \Aws\Result describeStep(array{ClusterId?: string, StepId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStepAsync(array{ClusterId?: string, StepId?: string, ...} $args = [])
 * @method \Aws\Result describeStudio(array $args = [])
 * @phpstan-method \Aws\Result describeStudio(array{StudioId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStudioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStudioAsync(array{StudioId?: string, ...} $args = [])
 * @method \Aws\Result getAutoTerminationPolicy(array $args = [])
 * @phpstan-method \Aws\Result getAutoTerminationPolicy(array{ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutoTerminationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutoTerminationPolicyAsync(array{ClusterId?: string, ...} $args = [])
 * @method \Aws\Result getBlockPublicAccessConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getBlockPublicAccessConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBlockPublicAccessConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBlockPublicAccessConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getClusterSessionCredentials(array $args = [])
 * @phpstan-method \Aws\Result getClusterSessionCredentials(array{ClusterId?: string, ExecutionRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClusterSessionCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClusterSessionCredentialsAsync(array{ClusterId?: string, ExecutionRoleArn?: string, ...} $args = [])
 * @method \Aws\Result getManagedScalingPolicy(array $args = [])
 * @phpstan-method \Aws\Result getManagedScalingPolicy(array{ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedScalingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedScalingPolicyAsync(array{ClusterId?: string, ...} $args = [])
 * @method \Aws\Result getOnClusterAppUIPresignedURL(array $args = [])
 * @phpstan-method \Aws\Result getOnClusterAppUIPresignedURL(array{
 *     ClusterId?: string,
 *     OnClusterAppUIType?: 'ApplicationMaster'|'JobHistoryServer'|'ResourceManager'|'SparkHistoryServer'|'TezUI'|'YarnTimelineService',
 *     ApplicationId?: string,
 *     DryRun?: bool,
 *     ExecutionRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getOnClusterAppUIPresignedURLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOnClusterAppUIPresignedURLAsync(array{
 *     ClusterId?: string,
 *     OnClusterAppUIType?: 'ApplicationMaster'|'JobHistoryServer'|'ResourceManager'|'SparkHistoryServer'|'TezUI'|'YarnTimelineService',
 *     ApplicationId?: string,
 *     DryRun?: bool,
 *     ExecutionRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPersistentAppUIPresignedURL(array $args = [])
 * @phpstan-method \Aws\Result getPersistentAppUIPresignedURL(array{
 *     PersistentAppUIId?: string,
 *     PersistentAppUIType?: 'SHS'|'TEZ'|'YTS',
 *     ApplicationId?: string,
 *     AuthProxyCall?: bool,
 *     ExecutionRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPersistentAppUIPresignedURLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPersistentAppUIPresignedURLAsync(array{
 *     PersistentAppUIId?: string,
 *     PersistentAppUIType?: 'SHS'|'TEZ'|'YTS',
 *     ApplicationId?: string,
 *     AuthProxyCall?: bool,
 *     ExecutionRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{ClusterId?: string, SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{ClusterId?: string, SessionId?: string, ...} $args = [])
 * @method \Aws\Result getSessionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getSessionEndpoint(array{ClusterId?: string, SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionEndpointAsync(array{ClusterId?: string, SessionId?: string, ...} $args = [])
 * @method \Aws\Result getStudioSessionMapping(array $args = [])
 * @phpstan-method \Aws\Result getStudioSessionMapping(array{StudioId?: string, IdentityId?: string, IdentityName?: string, IdentityType?: 'GROUP'|'USER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStudioSessionMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStudioSessionMappingAsync(array{StudioId?: string, IdentityId?: string, IdentityName?: string, IdentityType?: 'GROUP'|'USER', ...} $args = [])
 * @method \Aws\Result listBootstrapActions(array $args = [])
 * @phpstan-method \Aws\Result listBootstrapActions(array{ClusterId?: string, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBootstrapActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBootstrapActionsAsync(array{ClusterId?: string, Marker?: string, ...} $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     ClusterStates?: list<'BOOTSTRAPPING'|'RUNNING'|'STARTING'|'TERMINATED'|'TERMINATED_WITH_ERRORS'|'TERMINATING'|'WAITING'>,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     ClusterStates?: list<'BOOTSTRAPPING'|'RUNNING'|'STARTING'|'TERMINATED'|'TERMINATED_WITH_ERRORS'|'TERMINATING'|'WAITING'>,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInstanceFleets(array $args = [])
 * @phpstan-method \Aws\Result listInstanceFleets(array{ClusterId?: string, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceFleetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstanceFleetsAsync(array{ClusterId?: string, Marker?: string, ...} $args = [])
 * @method \Aws\Result listInstanceGroups(array $args = [])
 * @phpstan-method \Aws\Result listInstanceGroups(array{ClusterId?: string, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstanceGroupsAsync(array{ClusterId?: string, Marker?: string, ...} $args = [])
 * @method \Aws\Result listInstances(array $args = [])
 * @phpstan-method \Aws\Result listInstances(array{
 *     ClusterId?: string,
 *     InstanceGroupId?: string,
 *     InstanceGroupTypes?: list<'CORE'|'MASTER'|'TASK'>,
 *     InstanceFleetId?: string,
 *     InstanceFleetType?: 'CORE'|'MASTER'|'TASK',
 *     InstanceStates?: list<'AWAITING_FULFILLMENT'|'BOOTSTRAPPING'|'PROVISIONING'|'RUNNING'|'TERMINATED'>,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstancesAsync(array{
 *     ClusterId?: string,
 *     InstanceGroupId?: string,
 *     InstanceGroupTypes?: list<'CORE'|'MASTER'|'TASK'>,
 *     InstanceFleetId?: string,
 *     InstanceFleetType?: 'CORE'|'MASTER'|'TASK',
 *     InstanceStates?: list<'AWAITING_FULFILLMENT'|'BOOTSTRAPPING'|'PROVISIONING'|'RUNNING'|'TERMINATED'>,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotebookExecutions(array $args = [])
 * @phpstan-method \Aws\Result listNotebookExecutions(array{
 *     EditorId?: string,
 *     Status?: 'FAILED'|'FAILING'|'FINISHED'|'FINISHING'|'RUNNING'|'STARTING'|'START_PENDING'|'STOPPED'|'STOPPING'|'STOP_PENDING',
 *     From?: int|string|\DateTimeInterface,
 *     To?: int|string|\DateTimeInterface,
 *     Marker?: string,
 *     ExecutionEngineId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotebookExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotebookExecutionsAsync(array{
 *     EditorId?: string,
 *     Status?: 'FAILED'|'FAILING'|'FINISHED'|'FINISHING'|'RUNNING'|'STARTING'|'START_PENDING'|'STOPPED'|'STOPPING'|'STOP_PENDING',
 *     From?: int|string|\DateTimeInterface,
 *     To?: int|string|\DateTimeInterface,
 *     Marker?: string,
 *     ExecutionEngineId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReleaseLabels(array $args = [])
 * @phpstan-method \Aws\Result listReleaseLabels(array{Filters?: array{Prefix?: string, Application?: string, ...}, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReleaseLabelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReleaseLabelsAsync(array{Filters?: array{Prefix?: string, Application?: string, ...}, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listSecurityConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listSecurityConfigurations(array{Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityConfigurationsAsync(array{Marker?: string, ...} $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{
 *     ClusterId?: string,
 *     SessionStates?: list<'BUSY'|'FAILED'|'IDLE'|'STARTED'|'STARTING'|'SUBMITTED'|'TERMINATED'|'TERMINATING'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{
 *     ClusterId?: string,
 *     SessionStates?: list<'BUSY'|'FAILED'|'IDLE'|'STARTED'|'STARTING'|'SUBMITTED'|'TERMINATED'|'TERMINATING'>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSteps(array $args = [])
 * @phpstan-method \Aws\Result listSteps(array{
 *     ClusterId?: string,
 *     StepStates?: list<'CANCELLED'|'CANCEL_PENDING'|'COMPLETED'|'FAILED'|'INTERRUPTED'|'PENDING'|'RUNNING'>,
 *     StepIds?: list<string>,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStepsAsync(array{
 *     ClusterId?: string,
 *     StepStates?: list<'CANCELLED'|'CANCEL_PENDING'|'COMPLETED'|'FAILED'|'INTERRUPTED'|'PENDING'|'RUNNING'>,
 *     StepIds?: list<string>,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStudioSessionMappings(array $args = [])
 * @phpstan-method \Aws\Result listStudioSessionMappings(array{StudioId?: string, IdentityType?: 'GROUP'|'USER', Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStudioSessionMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStudioSessionMappingsAsync(array{StudioId?: string, IdentityType?: 'GROUP'|'USER', Marker?: string, ...} $args = [])
 * @method \Aws\Result listStudios(array $args = [])
 * @phpstan-method \Aws\Result listStudios(array{Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStudiosAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStudiosAsync(array{Marker?: string, ...} $args = [])
 * @method \Aws\Result listSupportedInstanceTypes(array $args = [])
 * @phpstan-method \Aws\Result listSupportedInstanceTypes(array{ReleaseLabel?: string, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSupportedInstanceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSupportedInstanceTypesAsync(array{ReleaseLabel?: string, Marker?: string, ...} $args = [])
 * @method \Aws\Result modifyCluster(array $args = [])
 * @phpstan-method \Aws\Result modifyCluster(array{ClusterId?: string, StepConcurrencyLevel?: int, ExtendedSupport?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClusterAsync(array{ClusterId?: string, StepConcurrencyLevel?: int, ExtendedSupport?: bool, ...} $args = [])
 * @method \Aws\Result modifyInstanceFleet(array $args = [])
 * @phpstan-method \Aws\Result modifyInstanceFleet(array{
 *     ClusterId?: string,
 *     InstanceFleet?: array{
 *         InstanceFleetId?: string,
 *         TargetOnDemandCapacity?: int,
 *         TargetSpotCapacity?: int,
 *         ResizeSpecifications?: array{SpotResizeSpecification?: array, OnDemandResizeSpecification?: array, ...},
 *         InstanceTypeConfigs?: list<array>,
 *         Context?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyInstanceFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyInstanceFleetAsync(array{
 *     ClusterId?: string,
 *     InstanceFleet?: array{
 *         InstanceFleetId?: string,
 *         TargetOnDemandCapacity?: int,
 *         TargetSpotCapacity?: int,
 *         ResizeSpecifications?: array{SpotResizeSpecification?: array, OnDemandResizeSpecification?: array, ...},
 *         InstanceTypeConfigs?: list<array>,
 *         Context?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyInstanceGroups(array $args = [])
 * @phpstan-method \Aws\Result modifyInstanceGroups(array{
 *     ClusterId?: string,
 *     InstanceGroups?: list<array{
 *         InstanceGroupId?: string,
 *         InstanceCount?: int,
 *         EC2InstanceIdsToTerminate?: list<string>,
 *         ShrinkPolicy?: array,
 *         ReconfigurationType?: 'MERGE'|'OVERWRITE',
 *         Configurations?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyInstanceGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyInstanceGroupsAsync(array{
 *     ClusterId?: string,
 *     InstanceGroups?: list<array{
 *         InstanceGroupId?: string,
 *         InstanceCount?: int,
 *         EC2InstanceIdsToTerminate?: list<string>,
 *         ShrinkPolicy?: array,
 *         ReconfigurationType?: 'MERGE'|'OVERWRITE',
 *         Configurations?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAutoScalingPolicy(array $args = [])
 * @phpstan-method \Aws\Result putAutoScalingPolicy(array{
 *     ClusterId?: string,
 *     InstanceGroupId?: string,
 *     AutoScalingPolicy?: array{Constraints?: array{MinCapacity?: int, MaxCapacity?: int, ...}, Rules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAutoScalingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAutoScalingPolicyAsync(array{
 *     ClusterId?: string,
 *     InstanceGroupId?: string,
 *     AutoScalingPolicy?: array{Constraints?: array{MinCapacity?: int, MaxCapacity?: int, ...}, Rules?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAutoTerminationPolicy(array $args = [])
 * @phpstan-method \Aws\Result putAutoTerminationPolicy(array{ClusterId?: string, AutoTerminationPolicy?: array{IdleTimeout?: int, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putAutoTerminationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAutoTerminationPolicyAsync(array{ClusterId?: string, AutoTerminationPolicy?: array{IdleTimeout?: int, ...}, ...} $args = [])
 * @method \Aws\Result putBlockPublicAccessConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putBlockPublicAccessConfiguration(array{
 *     BlockPublicAccessConfiguration?: array{BlockPublicSecurityGroupRules?: bool, PermittedPublicSecurityGroupRuleRanges?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBlockPublicAccessConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBlockPublicAccessConfigurationAsync(array{
 *     BlockPublicAccessConfiguration?: array{BlockPublicSecurityGroupRules?: bool, PermittedPublicSecurityGroupRuleRanges?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putManagedScalingPolicy(array $args = [])
 * @phpstan-method \Aws\Result putManagedScalingPolicy(array{
 *     ClusterId?: string,
 *     ManagedScalingPolicy?: array{
 *         ComputeLimits?: array{
 *             UnitType?: 'InstanceFleetUnits'|'Instances'|'VCPU',
 *             MinimumCapacityUnits?: int,
 *             MaximumCapacityUnits?: int,
 *             MaximumOnDemandCapacityUnits?: int,
 *             MaximumCoreCapacityUnits?: int,
 *             ...,
 *         },
 *         UtilizationPerformanceIndex?: int,
 *         ScalingStrategy?: 'ADVANCED'|'DEFAULT',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putManagedScalingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putManagedScalingPolicyAsync(array{
 *     ClusterId?: string,
 *     ManagedScalingPolicy?: array{
 *         ComputeLimits?: array{
 *             UnitType?: 'InstanceFleetUnits'|'Instances'|'VCPU',
 *             MinimumCapacityUnits?: int,
 *             MaximumCapacityUnits?: int,
 *             MaximumOnDemandCapacityUnits?: int,
 *             MaximumCoreCapacityUnits?: int,
 *             ...,
 *         },
 *         UtilizationPerformanceIndex?: int,
 *         ScalingStrategy?: 'ADVANCED'|'DEFAULT',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeAutoScalingPolicy(array $args = [])
 * @phpstan-method \Aws\Result removeAutoScalingPolicy(array{ClusterId?: string, InstanceGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeAutoScalingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeAutoScalingPolicyAsync(array{ClusterId?: string, InstanceGroupId?: string, ...} $args = [])
 * @method \Aws\Result removeAutoTerminationPolicy(array $args = [])
 * @phpstan-method \Aws\Result removeAutoTerminationPolicy(array{ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeAutoTerminationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeAutoTerminationPolicyAsync(array{ClusterId?: string, ...} $args = [])
 * @method \Aws\Result removeManagedScalingPolicy(array $args = [])
 * @phpstan-method \Aws\Result removeManagedScalingPolicy(array{ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeManagedScalingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeManagedScalingPolicyAsync(array{ClusterId?: string, ...} $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @phpstan-method \Aws\Result removeTags(array{ResourceId?: string, TagKeys?: list<string>, ClusterId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsAsync(array{ResourceId?: string, TagKeys?: list<string>, ClusterId?: string, ...} $args = [])
 * @method \Aws\Result runJobFlow(array $args = [])
 * @phpstan-method \Aws\Result runJobFlow(array{
 *     Name?: string,
 *     LogUri?: string,
 *     LogEncryptionKmsKeyId?: string,
 *     AdditionalInfo?: string,
 *     AmiVersion?: string,
 *     ReleaseLabel?: string,
 *     Instances?: array{
 *         MasterInstanceType?: string,
 *         SlaveInstanceType?: string,
 *         InstanceCount?: int,
 *         InstanceGroups?: list<array>,
 *         InstanceFleets?: list<array>,
 *         Ec2KeyName?: string,
 *         Placement?: array{AvailabilityZone?: string, AvailabilityZones?: list<string>, ...},
 *         KeepJobFlowAliveWhenNoSteps?: bool,
 *         TerminationProtected?: bool,
 *         UnhealthyNodeReplacement?: bool,
 *         HadoopVersion?: string,
 *         Ec2SubnetId?: string,
 *         Ec2SubnetIds?: list<string>,
 *         EmrManagedMasterSecurityGroup?: string,
 *         EmrManagedSlaveSecurityGroup?: string,
 *         ServiceAccessSecurityGroup?: string,
 *         AdditionalMasterSecurityGroups?: list<string>,
 *         AdditionalSlaveSecurityGroups?: list<string>,
 *         ...,
 *     },
 *     Steps?: list<array{
 *         Name?: string,
 *         ActionOnFailure?: 'CANCEL_AND_WAIT'|'CONTINUE'|'TERMINATE_CLUSTER'|'TERMINATE_JOB_FLOW',
 *         HadoopJarStep?: array,
 *         StepMonitoringConfiguration?: array,
 *         ...,
 *     }>,
 *     StepExecutionRoleArn?: string,
 *     BootstrapActions?: list<array{Name?: string, ScriptBootstrapAction?: array, ...}>,
 *     SupportedProducts?: list<string>,
 *     NewSupportedProducts?: list<array{Name?: string, Args?: list<string>, ...}>,
 *     Applications?: list<array{Name?: string, Version?: string, Args?: list<string>, AdditionalInfo?: array<string, string>, ...}>,
 *     Configurations?: list<array{Classification?: string, Configurations?: list<array>, Properties?: array<string, string>, ...}>,
 *     VisibleToAllUsers?: bool,
 *     JobFlowRole?: string,
 *     ServiceRole?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SecurityConfiguration?: string,
 *     AutoScalingRole?: string,
 *     ScaleDownBehavior?: 'TERMINATE_AT_INSTANCE_HOUR'|'TERMINATE_AT_TASK_COMPLETION',
 *     CustomAmiId?: string,
 *     EbsRootVolumeSize?: int,
 *     RepoUpgradeOnBoot?: 'NONE'|'SECURITY',
 *     KerberosAttributes?: array{
 *         Realm?: string,
 *         KdcAdminPassword?: string,
 *         CrossRealmTrustPrincipalPassword?: string,
 *         ADDomainJoinUser?: string,
 *         ADDomainJoinPassword?: string,
 *         ...,
 *     },
 *     StepConcurrencyLevel?: int,
 *     ManagedScalingPolicy?: array{
 *         ComputeLimits?: array{
 *             UnitType?: 'InstanceFleetUnits'|'Instances'|'VCPU',
 *             MinimumCapacityUnits?: int,
 *             MaximumCapacityUnits?: int,
 *             MaximumOnDemandCapacityUnits?: int,
 *             MaximumCoreCapacityUnits?: int,
 *             ...,
 *         },
 *         UtilizationPerformanceIndex?: int,
 *         ScalingStrategy?: 'ADVANCED'|'DEFAULT',
 *         ...,
 *     },
 *     PlacementGroupConfigs?: list<array{InstanceRole?: 'CORE'|'MASTER'|'TASK', PlacementStrategy?: 'CLUSTER'|'NONE'|'PARTITION'|'SPREAD', ...}>,
 *     AutoTerminationPolicy?: array{IdleTimeout?: int, ...},
 *     OSReleaseLabel?: string,
 *     EbsRootVolumeIops?: int,
 *     EbsRootVolumeThroughput?: int,
 *     ExtendedSupport?: bool,
 *     MonitoringConfiguration?: array{
 *         CloudWatchLogConfiguration?: array{
 *             Enabled?: bool,
 *             LogGroupName?: string,
 *             LogStreamNamePrefix?: string,
 *             EncryptionKeyArn?: string,
 *             LogTypes?: array<string, list<string>>,
 *             ...,
 *         },
 *         S3LoggingConfiguration?: array{LogTypeUploadPolicy?: array<string, 'disabled'|'emr-managed'|'on-customer-s3only'>, ...},
 *         ...,
 *     },
 *     SessionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise runJobFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise runJobFlowAsync(array{
 *     Name?: string,
 *     LogUri?: string,
 *     LogEncryptionKmsKeyId?: string,
 *     AdditionalInfo?: string,
 *     AmiVersion?: string,
 *     ReleaseLabel?: string,
 *     Instances?: array{
 *         MasterInstanceType?: string,
 *         SlaveInstanceType?: string,
 *         InstanceCount?: int,
 *         InstanceGroups?: list<array>,
 *         InstanceFleets?: list<array>,
 *         Ec2KeyName?: string,
 *         Placement?: array{AvailabilityZone?: string, AvailabilityZones?: list<string>, ...},
 *         KeepJobFlowAliveWhenNoSteps?: bool,
 *         TerminationProtected?: bool,
 *         UnhealthyNodeReplacement?: bool,
 *         HadoopVersion?: string,
 *         Ec2SubnetId?: string,
 *         Ec2SubnetIds?: list<string>,
 *         EmrManagedMasterSecurityGroup?: string,
 *         EmrManagedSlaveSecurityGroup?: string,
 *         ServiceAccessSecurityGroup?: string,
 *         AdditionalMasterSecurityGroups?: list<string>,
 *         AdditionalSlaveSecurityGroups?: list<string>,
 *         ...,
 *     },
 *     Steps?: list<array{
 *         Name?: string,
 *         ActionOnFailure?: 'CANCEL_AND_WAIT'|'CONTINUE'|'TERMINATE_CLUSTER'|'TERMINATE_JOB_FLOW',
 *         HadoopJarStep?: array,
 *         StepMonitoringConfiguration?: array,
 *         ...,
 *     }>,
 *     StepExecutionRoleArn?: string,
 *     BootstrapActions?: list<array{Name?: string, ScriptBootstrapAction?: array, ...}>,
 *     SupportedProducts?: list<string>,
 *     NewSupportedProducts?: list<array{Name?: string, Args?: list<string>, ...}>,
 *     Applications?: list<array{Name?: string, Version?: string, Args?: list<string>, AdditionalInfo?: array<string, string>, ...}>,
 *     Configurations?: list<array{Classification?: string, Configurations?: list<array>, Properties?: array<string, string>, ...}>,
 *     VisibleToAllUsers?: bool,
 *     JobFlowRole?: string,
 *     ServiceRole?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SecurityConfiguration?: string,
 *     AutoScalingRole?: string,
 *     ScaleDownBehavior?: 'TERMINATE_AT_INSTANCE_HOUR'|'TERMINATE_AT_TASK_COMPLETION',
 *     CustomAmiId?: string,
 *     EbsRootVolumeSize?: int,
 *     RepoUpgradeOnBoot?: 'NONE'|'SECURITY',
 *     KerberosAttributes?: array{
 *         Realm?: string,
 *         KdcAdminPassword?: string,
 *         CrossRealmTrustPrincipalPassword?: string,
 *         ADDomainJoinUser?: string,
 *         ADDomainJoinPassword?: string,
 *         ...,
 *     },
 *     StepConcurrencyLevel?: int,
 *     ManagedScalingPolicy?: array{
 *         ComputeLimits?: array{
 *             UnitType?: 'InstanceFleetUnits'|'Instances'|'VCPU',
 *             MinimumCapacityUnits?: int,
 *             MaximumCapacityUnits?: int,
 *             MaximumOnDemandCapacityUnits?: int,
 *             MaximumCoreCapacityUnits?: int,
 *             ...,
 *         },
 *         UtilizationPerformanceIndex?: int,
 *         ScalingStrategy?: 'ADVANCED'|'DEFAULT',
 *         ...,
 *     },
 *     PlacementGroupConfigs?: list<array{InstanceRole?: 'CORE'|'MASTER'|'TASK', PlacementStrategy?: 'CLUSTER'|'NONE'|'PARTITION'|'SPREAD', ...}>,
 *     AutoTerminationPolicy?: array{IdleTimeout?: int, ...},
 *     OSReleaseLabel?: string,
 *     EbsRootVolumeIops?: int,
 *     EbsRootVolumeThroughput?: int,
 *     ExtendedSupport?: bool,
 *     MonitoringConfiguration?: array{
 *         CloudWatchLogConfiguration?: array{
 *             Enabled?: bool,
 *             LogGroupName?: string,
 *             LogStreamNamePrefix?: string,
 *             EncryptionKeyArn?: string,
 *             LogTypes?: array<string, list<string>>,
 *             ...,
 *         },
 *         S3LoggingConfiguration?: array{LogTypeUploadPolicy?: array<string, 'disabled'|'emr-managed'|'on-customer-s3only'>, ...},
 *         ...,
 *     },
 *     SessionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setKeepJobFlowAliveWhenNoSteps(array $args = [])
 * @phpstan-method \Aws\Result setKeepJobFlowAliveWhenNoSteps(array{JobFlowIds?: list<string>, KeepJobFlowAliveWhenNoSteps?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setKeepJobFlowAliveWhenNoStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setKeepJobFlowAliveWhenNoStepsAsync(array{JobFlowIds?: list<string>, KeepJobFlowAliveWhenNoSteps?: bool, ...} $args = [])
 * @method \Aws\Result setTerminationProtection(array $args = [])
 * @phpstan-method \Aws\Result setTerminationProtection(array{JobFlowIds?: list<string>, TerminationProtected?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setTerminationProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setTerminationProtectionAsync(array{JobFlowIds?: list<string>, TerminationProtected?: bool, ...} $args = [])
 * @method \Aws\Result setUnhealthyNodeReplacement(array $args = [])
 * @phpstan-method \Aws\Result setUnhealthyNodeReplacement(array{JobFlowIds?: list<string>, UnhealthyNodeReplacement?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setUnhealthyNodeReplacementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setUnhealthyNodeReplacementAsync(array{JobFlowIds?: list<string>, UnhealthyNodeReplacement?: bool, ...} $args = [])
 * @method \Aws\Result setVisibleToAllUsers(array $args = [])
 * @phpstan-method \Aws\Result setVisibleToAllUsers(array{JobFlowIds?: list<string>, VisibleToAllUsers?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setVisibleToAllUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setVisibleToAllUsersAsync(array{JobFlowIds?: list<string>, VisibleToAllUsers?: bool, ...} $args = [])
 * @method \Aws\Result startNotebookExecution(array $args = [])
 * @phpstan-method \Aws\Result startNotebookExecution(array{
 *     EditorId?: string,
 *     RelativePath?: string,
 *     NotebookExecutionName?: string,
 *     NotebookParams?: string,
 *     ExecutionEngine?: array{Id?: string, Type?: 'EMR', MasterInstanceSecurityGroupId?: string, ExecutionRoleArn?: string, ...},
 *     ServiceRole?: string,
 *     NotebookInstanceSecurityGroupId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NotebookS3Location?: array{Bucket?: string, Key?: string, ...},
 *     OutputNotebookS3Location?: array{Bucket?: string, Key?: string, ...},
 *     OutputNotebookFormat?: 'HTML',
 *     EnvironmentVariables?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startNotebookExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNotebookExecutionAsync(array{
 *     EditorId?: string,
 *     RelativePath?: string,
 *     NotebookExecutionName?: string,
 *     NotebookParams?: string,
 *     ExecutionEngine?: array{Id?: string, Type?: 'EMR', MasterInstanceSecurityGroupId?: string, ExecutionRoleArn?: string, ...},
 *     ServiceRole?: string,
 *     NotebookInstanceSecurityGroupId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NotebookS3Location?: array{Bucket?: string, Key?: string, ...},
 *     OutputNotebookS3Location?: array{Bucket?: string, Key?: string, ...},
 *     OutputNotebookFormat?: 'HTML',
 *     EnvironmentVariables?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSession(array $args = [])
 * @phpstan-method \Aws\Result startSession(array{
 *     Name?: string,
 *     ClusterId?: string,
 *     ExecutionRoleArn?: string,
 *     EngineConfigurations?: list<array{Classification?: string, Configurations?: list<array>, Properties?: array<string, string>, ...}>,
 *     MonitoringConfiguration?: array{
 *         CloudWatchLoggingConfiguration?: array{
 *             Enabled?: bool,
 *             LogGroup?: string,
 *             LogStreamNamePrefix?: string,
 *             EncryptionKeyArn?: string,
 *             LogTypes?: array<string, list<string>>,
 *             ...,
 *         },
 *         ManagedLoggingConfiguration?: array{Enabled?: bool, EncryptionKeyArn?: string, ...},
 *         S3LoggingConfiguration?: array{Enabled?: bool, LogUri?: string, EncryptionKeyArn?: string, LogTypes?: array<string, list<string>>, ...},
 *         ...,
 *     },
 *     SessionIdleTimeoutInMinutes?: int,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSessionAsync(array{
 *     Name?: string,
 *     ClusterId?: string,
 *     ExecutionRoleArn?: string,
 *     EngineConfigurations?: list<array{Classification?: string, Configurations?: list<array>, Properties?: array<string, string>, ...}>,
 *     MonitoringConfiguration?: array{
 *         CloudWatchLoggingConfiguration?: array{
 *             Enabled?: bool,
 *             LogGroup?: string,
 *             LogStreamNamePrefix?: string,
 *             EncryptionKeyArn?: string,
 *             LogTypes?: array<string, list<string>>,
 *             ...,
 *         },
 *         ManagedLoggingConfiguration?: array{Enabled?: bool, EncryptionKeyArn?: string, ...},
 *         S3LoggingConfiguration?: array{Enabled?: bool, LogUri?: string, EncryptionKeyArn?: string, LogTypes?: array<string, list<string>>, ...},
 *         ...,
 *     },
 *     SessionIdleTimeoutInMinutes?: int,
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopNotebookExecution(array $args = [])
 * @phpstan-method \Aws\Result stopNotebookExecution(array{NotebookExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopNotebookExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopNotebookExecutionAsync(array{NotebookExecutionId?: string, ...} $args = [])
 * @method \Aws\Result terminateJobFlows(array $args = [])
 * @phpstan-method \Aws\Result terminateJobFlows(array{JobFlowIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateJobFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateJobFlowsAsync(array{JobFlowIds?: list<string>, ...} $args = [])
 * @method \Aws\Result terminateSession(array $args = [])
 * @phpstan-method \Aws\Result terminateSession(array{ClusterId?: string, SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateSessionAsync(array{ClusterId?: string, SessionId?: string, ...} $args = [])
 * @method \Aws\Result updateStudio(array $args = [])
 * @phpstan-method \Aws\Result updateStudio(array{
 *     StudioId?: string,
 *     Name?: string,
 *     Description?: string,
 *     SubnetIds?: list<string>,
 *     DefaultS3Location?: string,
 *     EncryptionKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStudioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStudioAsync(array{
 *     StudioId?: string,
 *     Name?: string,
 *     Description?: string,
 *     SubnetIds?: list<string>,
 *     DefaultS3Location?: string,
 *     EncryptionKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStudioSessionMapping(array $args = [])
 * @phpstan-method \Aws\Result updateStudioSessionMapping(array{
 *     StudioId?: string,
 *     IdentityId?: string,
 *     IdentityName?: string,
 *     IdentityType?: 'GROUP'|'USER',
 *     SessionPolicyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStudioSessionMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStudioSessionMappingAsync(array{
 *     StudioId?: string,
 *     IdentityId?: string,
 *     IdentityName?: string,
 *     IdentityType?: 'GROUP'|'USER',
 *     SessionPolicyArn?: string,
 *     ...,
 * } $args = [])
 */
class EmrClient extends AwsClient {}
