<?php
namespace Aws\ApplicationAutoScaling;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Application Auto Scaling** service.
 * @method \Aws\Result deleteScalingPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteScalingPolicy(array{
 *     PolicyName?: string,
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScalingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScalingPolicyAsync(array{
 *     PolicyName?: string,
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduledAction(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ScheduledActionName?: string,
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduledActionAsync(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ScheduledActionName?: string,
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deregisterScalableTarget(array $args = [])
 * @phpstan-method \Aws\Result deregisterScalableTarget(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterScalableTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterScalableTargetAsync(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeScalableTargets(array $args = [])
 * @phpstan-method \Aws\Result describeScalableTargets(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceIds?: list<string>,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScalableTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalableTargetsAsync(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceIds?: list<string>,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeScalingActivities(array $args = [])
 * @phpstan-method \Aws\Result describeScalingActivities(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     IncludeNotScaledActivities?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScalingActivitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalingActivitiesAsync(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     IncludeNotScaledActivities?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeScalingPolicies(array $args = [])
 * @phpstan-method \Aws\Result describeScalingPolicies(array{
 *     PolicyNames?: list<string>,
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScalingPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalingPoliciesAsync(array{
 *     PolicyNames?: list<string>,
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeScheduledActions(array $args = [])
 * @phpstan-method \Aws\Result describeScheduledActions(array{
 *     ScheduledActionNames?: list<string>,
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScheduledActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScheduledActionsAsync(array{
 *     ScheduledActionNames?: list<string>,
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPredictiveScalingForecast(array $args = [])
 * @phpstan-method \Aws\Result getPredictiveScalingForecast(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     PolicyName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPredictiveScalingForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPredictiveScalingForecastAsync(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     PolicyName?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result putScalingPolicy(array $args = [])
 * @phpstan-method \Aws\Result putScalingPolicy(array{
 *     PolicyName?: string,
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     PolicyType?: 'PredictiveScaling'|'StepScaling'|'TargetTrackingScaling',
 *     StepScalingPolicyConfiguration?: array{
 *         AdjustmentType?: 'ChangeInCapacity'|'ExactCapacity'|'PercentChangeInCapacity',
 *         StepAdjustments?: list<array>,
 *         MinAdjustmentMagnitude?: int,
 *         Cooldown?: int,
 *         MetricAggregationType?: 'Average'|'Maximum'|'Minimum',
 *         ...,
 *     },
 *     TargetTrackingScalingPolicyConfiguration?: array{
 *         TargetValue?: float,
 *         PredefinedMetricSpecification?: array{
 *             PredefinedMetricType?: 'ALBRequestCountPerTarget'|'AppStreamAverageCapacityUtilization'|'CassandraReadCapacityUtilization'|'CassandraWriteCapacityUtilization'|'ComprehendInferenceUtilization'|'DynamoDBReadCapacityUtilization'|'DynamoDBWriteCapacityUtilization'|'EC2SpotFleetRequestAverageCPUUtilization'|'EC2SpotFleetRequestAverageNetworkIn'|'EC2SpotFleetRequestAverageNetworkOut'|'ECSServiceAverageCPUUtilization'|'ECSServiceAverageCPUUtilizationHighResolution'|'ECSServiceAverageMemoryUtilization'|'ECSServiceAverageMemoryUtilizationHighResolution'|'ElastiCacheDatabaseCapacityUsageCountedForEvictPercentage'|'ElastiCacheDatabaseMemoryUsageCountedForEvictPercentage'|'ElastiCacheDatabaseMemoryUsagePercentage'|'ElastiCacheEngineCPUUtilization'|'ElastiCachePrimaryEngineCPUUtilization'|'ElastiCacheReplicaEngineCPUUtilization'|'KafkaBrokerStorageUtilization'|'LambdaProvisionedConcurrencyUtilization'|'NeptuneReaderAverageCPUUtilization'|'RDSReaderAverageCPUUtilization'|'RDSReaderAverageDatabaseConnections'|'SageMakerInferenceComponentConcurrentRequestsPerCopyHighResolution'|'SageMakerInferenceComponentInvocationsPerCopy'|'SageMakerVariantConcurrentRequestsPerModelHighResolution'|'SageMakerVariantInvocationsPerInstance'|'SageMakerVariantProvisionedConcurrencyUtilization'|'WorkSpacesAverageUserSessionsCapacityUtilization',
 *             ResourceLabel?: string,
 *             ...,
 *         },
 *         CustomizedMetricSpecification?: array{
 *             MetricName?: string,
 *             Namespace?: string,
 *             Dimensions?: list<array>,
 *             Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *             Unit?: string,
 *             Metrics?: list<array>,
 *             ...,
 *         },
 *         ScaleOutCooldown?: int,
 *         ScaleInCooldown?: int,
 *         DisableScaleIn?: bool,
 *         ...,
 *     },
 *     PredictiveScalingPolicyConfiguration?: array{
 *         MetricSpecifications?: list<array>,
 *         Mode?: 'ForecastAndScale'|'ForecastOnly',
 *         SchedulingBufferTime?: int,
 *         MaxCapacityBreachBehavior?: 'HonorMaxCapacity'|'IncreaseMaxCapacity',
 *         MaxCapacityBuffer?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putScalingPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putScalingPolicyAsync(array{
 *     PolicyName?: string,
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     PolicyType?: 'PredictiveScaling'|'StepScaling'|'TargetTrackingScaling',
 *     StepScalingPolicyConfiguration?: array{
 *         AdjustmentType?: 'ChangeInCapacity'|'ExactCapacity'|'PercentChangeInCapacity',
 *         StepAdjustments?: list<array>,
 *         MinAdjustmentMagnitude?: int,
 *         Cooldown?: int,
 *         MetricAggregationType?: 'Average'|'Maximum'|'Minimum',
 *         ...,
 *     },
 *     TargetTrackingScalingPolicyConfiguration?: array{
 *         TargetValue?: float,
 *         PredefinedMetricSpecification?: array{
 *             PredefinedMetricType?: 'ALBRequestCountPerTarget'|'AppStreamAverageCapacityUtilization'|'CassandraReadCapacityUtilization'|'CassandraWriteCapacityUtilization'|'ComprehendInferenceUtilization'|'DynamoDBReadCapacityUtilization'|'DynamoDBWriteCapacityUtilization'|'EC2SpotFleetRequestAverageCPUUtilization'|'EC2SpotFleetRequestAverageNetworkIn'|'EC2SpotFleetRequestAverageNetworkOut'|'ECSServiceAverageCPUUtilization'|'ECSServiceAverageCPUUtilizationHighResolution'|'ECSServiceAverageMemoryUtilization'|'ECSServiceAverageMemoryUtilizationHighResolution'|'ElastiCacheDatabaseCapacityUsageCountedForEvictPercentage'|'ElastiCacheDatabaseMemoryUsageCountedForEvictPercentage'|'ElastiCacheDatabaseMemoryUsagePercentage'|'ElastiCacheEngineCPUUtilization'|'ElastiCachePrimaryEngineCPUUtilization'|'ElastiCacheReplicaEngineCPUUtilization'|'KafkaBrokerStorageUtilization'|'LambdaProvisionedConcurrencyUtilization'|'NeptuneReaderAverageCPUUtilization'|'RDSReaderAverageCPUUtilization'|'RDSReaderAverageDatabaseConnections'|'SageMakerInferenceComponentConcurrentRequestsPerCopyHighResolution'|'SageMakerInferenceComponentInvocationsPerCopy'|'SageMakerVariantConcurrentRequestsPerModelHighResolution'|'SageMakerVariantInvocationsPerInstance'|'SageMakerVariantProvisionedConcurrencyUtilization'|'WorkSpacesAverageUserSessionsCapacityUtilization',
 *             ResourceLabel?: string,
 *             ...,
 *         },
 *         CustomizedMetricSpecification?: array{
 *             MetricName?: string,
 *             Namespace?: string,
 *             Dimensions?: list<array>,
 *             Statistic?: 'Average'|'Maximum'|'Minimum'|'SampleCount'|'Sum',
 *             Unit?: string,
 *             Metrics?: list<array>,
 *             ...,
 *         },
 *         ScaleOutCooldown?: int,
 *         ScaleInCooldown?: int,
 *         DisableScaleIn?: bool,
 *         ...,
 *     },
 *     PredictiveScalingPolicyConfiguration?: array{
 *         MetricSpecifications?: list<array>,
 *         Mode?: 'ForecastAndScale'|'ForecastOnly',
 *         SchedulingBufferTime?: int,
 *         MaxCapacityBreachBehavior?: 'HonorMaxCapacity'|'IncreaseMaxCapacity',
 *         MaxCapacityBuffer?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putScheduledAction(array $args = [])
 * @phpstan-method \Aws\Result putScheduledAction(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     Schedule?: string,
 *     Timezone?: string,
 *     ScheduledActionName?: string,
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ScalableTargetAction?: array{MinCapacity?: int, MaxCapacity?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putScheduledActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putScheduledActionAsync(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     Schedule?: string,
 *     Timezone?: string,
 *     ScheduledActionName?: string,
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ScalableTargetAction?: array{MinCapacity?: int, MaxCapacity?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerScalableTarget(array $args = [])
 * @phpstan-method \Aws\Result registerScalableTarget(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     MinCapacity?: int,
 *     MaxCapacity?: int,
 *     RoleARN?: string,
 *     SuspendedState?: array{
 *         DynamicScalingInSuspended?: bool,
 *         DynamicScalingOutSuspended?: bool,
 *         ScheduledScalingSuspended?: bool,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerScalableTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerScalableTargetAsync(array{
 *     ServiceNamespace?: 'appstream'|'cassandra'|'comprehend'|'custom-resource'|'dynamodb'|'ec2'|'ecs'|'elasticache'|'elasticmapreduce'|'kafka'|'lambda'|'neptune'|'rds'|'sagemaker'|'workspaces',
 *     ResourceId?: string,
 *     ScalableDimension?: 'appstream:fleet:DesiredCapacity'|'cassandra:table:ReadCapacityUnits'|'cassandra:table:WriteCapacityUnits'|'comprehend:document-classifier-endpoint:DesiredInferenceUnits'|'comprehend:entity-recognizer-endpoint:DesiredInferenceUnits'|'custom-resource:ResourceType:Property'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'elasticache:cache-cluster:Nodes'|'elasticache:replication-group:NodeGroups'|'elasticache:replication-group:Replicas'|'elasticmapreduce:instancegroup:InstanceCount'|'kafka:broker-storage:VolumeSize'|'lambda:function:ProvisionedConcurrency'|'neptune:cluster:ReadReplicaCount'|'rds:cluster:ReadReplicaCount'|'sagemaker:inference-component:DesiredCopyCount'|'sagemaker:variant:DesiredInstanceCount'|'sagemaker:variant:DesiredProvisionedConcurrency'|'workspaces:workspacespool:DesiredUserSessions',
 *     MinCapacity?: int,
 *     MaxCapacity?: int,
 *     RoleARN?: string,
 *     SuspendedState?: array{
 *         DynamicScalingInSuspended?: bool,
 *         DynamicScalingOutSuspended?: bool,
 *         ScheduledScalingSuspended?: bool,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 */
class ApplicationAutoScalingClient extends AwsClient {}
