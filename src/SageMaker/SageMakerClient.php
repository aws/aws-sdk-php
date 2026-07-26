<?php
namespace Aws\SageMaker;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker Service** service.
 * @method \Aws\Result addAssociation(array $args = [])
 * @phpstan-method \Aws\Result addAssociation(array{
 *     SourceArn?: string,
 *     DestinationArn?: string,
 *     AssociationType?: 'AssociatedWith'|'ContributedTo'|'DerivedFrom'|'Produced'|'SameAs',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addAssociationAsync(array{
 *     SourceArn?: string,
 *     DestinationArn?: string,
 *     AssociationType?: 'AssociatedWith'|'ContributedTo'|'DerivedFrom'|'Produced'|'SameAs',
 *     ...,
 * } $args = [])
 * @method \Aws\Result addTags(array $args = [])
 * @phpstan-method \Aws\Result addTags(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result associateTrialComponent(array $args = [])
 * @phpstan-method \Aws\Result associateTrialComponent(array{TrialComponentName?: string, TrialName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateTrialComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateTrialComponentAsync(array{TrialComponentName?: string, TrialName?: string, ...} $args = [])
 * @method \Aws\Result attachClusterNodeVolume(array $args = [])
 * @phpstan-method \Aws\Result attachClusterNodeVolume(array{ClusterArn?: string, NodeId?: string, VolumeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachClusterNodeVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachClusterNodeVolumeAsync(array{ClusterArn?: string, NodeId?: string, VolumeId?: string, ...} $args = [])
 * @method \Aws\Result batchAddClusterNodes(array $args = [])
 * @phpstan-method \Aws\Result batchAddClusterNodes(array{
 *     ClusterName?: string,
 *     ClientToken?: string,
 *     NodesToAdd?: list<array{
 *         InstanceGroupName?: string,
 *         IncrementTargetCountBy?: int,
 *         AvailabilityZones?: list<string>,
 *         InstanceTypes?: list<'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.large'|'ml.c6a.12xlarge'|'ml.c6a.16xlarge'|'ml.c6a.24xlarge'|'ml.c6a.2xlarge'|'ml.c6a.32xlarge'|'ml.c6a.48xlarge'|'ml.c6a.4xlarge'|'ml.c6a.8xlarge'|'ml.c6a.large'|'ml.c6a.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.medium'|'ml.c6g.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.medium'|'ml.c7g.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.gr6.4xlarge'|'ml.gr6.8xlarge'|'ml.i3en.12xlarge'|'ml.i3en.24xlarge'|'ml.i3en.2xlarge'|'ml.i3en.3xlarge'|'ml.i3en.6xlarge'|'ml.i3en.large'|'ml.i3en.xlarge'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6a.12xlarge'|'ml.m6a.16xlarge'|'ml.m6a.24xlarge'|'ml.m6a.2xlarge'|'ml.m6a.32xlarge'|'ml.m6a.48xlarge'|'ml.m6a.4xlarge'|'ml.m6a.8xlarge'|'ml.m6a.large'|'ml.m6a.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.medium'|'ml.m6g.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7g.12xlarge'|'ml.m7g.16xlarge'|'ml.m7g.2xlarge'|'ml.m7g.4xlarge'|'ml.m7g.8xlarge'|'ml.m7g.large'|'ml.m7g.medium'|'ml.m7g.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5d.16xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.3xlarge'|'ml.trn2.48xlarge'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAddClusterNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAddClusterNodesAsync(array{
 *     ClusterName?: string,
 *     ClientToken?: string,
 *     NodesToAdd?: list<array{
 *         InstanceGroupName?: string,
 *         IncrementTargetCountBy?: int,
 *         AvailabilityZones?: list<string>,
 *         InstanceTypes?: list<'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.large'|'ml.c6a.12xlarge'|'ml.c6a.16xlarge'|'ml.c6a.24xlarge'|'ml.c6a.2xlarge'|'ml.c6a.32xlarge'|'ml.c6a.48xlarge'|'ml.c6a.4xlarge'|'ml.c6a.8xlarge'|'ml.c6a.large'|'ml.c6a.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.medium'|'ml.c6g.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.medium'|'ml.c7g.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.gr6.4xlarge'|'ml.gr6.8xlarge'|'ml.i3en.12xlarge'|'ml.i3en.24xlarge'|'ml.i3en.2xlarge'|'ml.i3en.3xlarge'|'ml.i3en.6xlarge'|'ml.i3en.large'|'ml.i3en.xlarge'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6a.12xlarge'|'ml.m6a.16xlarge'|'ml.m6a.24xlarge'|'ml.m6a.2xlarge'|'ml.m6a.32xlarge'|'ml.m6a.48xlarge'|'ml.m6a.4xlarge'|'ml.m6a.8xlarge'|'ml.m6a.large'|'ml.m6a.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.medium'|'ml.m6g.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7g.12xlarge'|'ml.m7g.16xlarge'|'ml.m7g.2xlarge'|'ml.m7g.4xlarge'|'ml.m7g.8xlarge'|'ml.m7g.large'|'ml.m7g.medium'|'ml.m7g.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5d.16xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.3xlarge'|'ml.trn2.48xlarge'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteClusterNodes(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteClusterNodes(array{ClusterName?: string, NodeIds?: list<string>, NodeLogicalIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteClusterNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteClusterNodesAsync(array{ClusterName?: string, NodeIds?: list<string>, NodeLogicalIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDescribeModelPackage(array $args = [])
 * @phpstan-method \Aws\Result batchDescribeModelPackage(array{ModelPackageArnList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDescribeModelPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDescribeModelPackageAsync(array{ModelPackageArnList?: list<string>, ...} $args = [])
 * @method \Aws\Result batchRebootClusterNodes(array $args = [])
 * @phpstan-method \Aws\Result batchRebootClusterNodes(array{ClusterName?: string, NodeIds?: list<string>, NodeLogicalIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchRebootClusterNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchRebootClusterNodesAsync(array{ClusterName?: string, NodeIds?: list<string>, NodeLogicalIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchReplaceClusterNodes(array $args = [])
 * @phpstan-method \Aws\Result batchReplaceClusterNodes(array{ClusterName?: string, NodeIds?: list<string>, NodeLogicalIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchReplaceClusterNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchReplaceClusterNodesAsync(array{ClusterName?: string, NodeIds?: list<string>, NodeLogicalIds?: list<string>, ...} $args = [])
 * @method \Aws\Result createAIBenchmarkJob(array $args = [])
 * @phpstan-method \Aws\Result createAIBenchmarkJob(array{
 *     AIBenchmarkJobName?: string,
 *     BenchmarkTarget?: array{
 *         Endpoint?: array{Identifier?: string, TargetContainerHostname?: string, InferenceComponents?: list<array>, ...},
 *         ...,
 *     },
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         MlflowConfig?: array{MlflowResourceArn?: string, MlflowExperimentName?: string, MlflowRunName?: string, ...},
 *         ...,
 *     },
 *     AIWorkloadConfigIdentifier?: string,
 *     RoleArn?: string,
 *     NetworkConfig?: array{VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAIBenchmarkJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAIBenchmarkJobAsync(array{
 *     AIBenchmarkJobName?: string,
 *     BenchmarkTarget?: array{
 *         Endpoint?: array{Identifier?: string, TargetContainerHostname?: string, InferenceComponents?: list<array>, ...},
 *         ...,
 *     },
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         MlflowConfig?: array{MlflowResourceArn?: string, MlflowExperimentName?: string, MlflowRunName?: string, ...},
 *         ...,
 *     },
 *     AIWorkloadConfigIdentifier?: string,
 *     RoleArn?: string,
 *     NetworkConfig?: array{VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAIRecommendationJob(array $args = [])
 * @phpstan-method \Aws\Result createAIRecommendationJob(array{
 *     AIRecommendationJobName?: string,
 *     ModelSource?: array{S3?: array{S3Uri?: string, ...}, ...},
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         ModelPackageGroupIdentifier?: string,
 *         MlflowConfig?: array{MlflowResourceArn?: string, MlflowExperimentName?: string, MlflowRunName?: string, ...},
 *         ...,
 *     },
 *     AIWorkloadConfigIdentifier?: string,
 *     PerformanceTarget?: array{Constraints?: list<array>, ...},
 *     RoleArn?: string,
 *     InferenceSpecification?: array{Framework?: 'LMI'|'VLLM', ...},
 *     OptimizeModel?: bool,
 *     ComputeSpec?: array{
 *         InstanceTypes?: list<'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'>,
 *         CapacityReservationConfig?: array{CapacityReservationPreference?: 'capacity-reservations-only', MlReservationArns?: list<string>, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAIRecommendationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAIRecommendationJobAsync(array{
 *     AIRecommendationJobName?: string,
 *     ModelSource?: array{S3?: array{S3Uri?: string, ...}, ...},
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         ModelPackageGroupIdentifier?: string,
 *         MlflowConfig?: array{MlflowResourceArn?: string, MlflowExperimentName?: string, MlflowRunName?: string, ...},
 *         ...,
 *     },
 *     AIWorkloadConfigIdentifier?: string,
 *     PerformanceTarget?: array{Constraints?: list<array>, ...},
 *     RoleArn?: string,
 *     InferenceSpecification?: array{Framework?: 'LMI'|'VLLM', ...},
 *     OptimizeModel?: bool,
 *     ComputeSpec?: array{
 *         InstanceTypes?: list<'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'>,
 *         CapacityReservationConfig?: array{CapacityReservationPreference?: 'capacity-reservations-only', MlReservationArns?: list<string>, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAIWorkloadConfig(array $args = [])
 * @phpstan-method \Aws\Result createAIWorkloadConfig(array{
 *     AIWorkloadConfigName?: string,
 *     DatasetConfig?: array{InputDataConfig?: list<array>, ...},
 *     AIWorkloadConfigs?: array{WorkloadSpec?: array{Inline?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAIWorkloadConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAIWorkloadConfigAsync(array{
 *     AIWorkloadConfigName?: string,
 *     DatasetConfig?: array{InputDataConfig?: list<array>, ...},
 *     AIWorkloadConfigs?: array{WorkloadSpec?: array{Inline?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAction(array $args = [])
 * @phpstan-method \Aws\Result createAction(array{
 *     ActionName?: string,
 *     Source?: array{SourceUri?: string, SourceType?: string, SourceId?: string, ...},
 *     ActionType?: string,
 *     Description?: string,
 *     Status?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping'|'Unknown',
 *     Properties?: array<string, string>,
 *     MetadataProperties?: array{CommitId?: string, Repository?: string, GeneratedBy?: string, ProjectId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createActionAsync(array{
 *     ActionName?: string,
 *     Source?: array{SourceUri?: string, SourceType?: string, SourceId?: string, ...},
 *     ActionType?: string,
 *     Description?: string,
 *     Status?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping'|'Unknown',
 *     Properties?: array<string, string>,
 *     MetadataProperties?: array{CommitId?: string, Repository?: string, GeneratedBy?: string, ProjectId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAlgorithm(array $args = [])
 * @phpstan-method \Aws\Result createAlgorithm(array{
 *     AlgorithmName?: string,
 *     AlgorithmDescription?: string,
 *     TrainingSpecification?: array{
 *         TrainingImage?: string,
 *         TrainingImageDigest?: string,
 *         SupportedHyperParameters?: list<array>,
 *         SupportedTrainingInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportsDistributedTraining?: bool,
 *         MetricDefinitions?: list<array>,
 *         TrainingChannels?: list<array>,
 *         SupportedTuningJobObjectiveMetrics?: list<array>,
 *         AdditionalS3DataSource?: array{S3DataType?: 'S3Object'|'S3Prefix', S3Uri?: string, CompressionType?: 'Gzip'|'None', ETag?: string, ...},
 *         ...,
 *     },
 *     InferenceSpecification?: array{
 *         Containers?: list<array>,
 *         SupportedTransformInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'>,
 *         SupportedRealtimeInferenceInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportedContentTypes?: list<string>,
 *         SupportedResponseMIMETypes?: list<string>,
 *         ...,
 *     },
 *     ValidationSpecification?: array{ValidationRole?: string, ValidationProfiles?: list<array>, ...},
 *     CertifyForMarketplace?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAlgorithmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAlgorithmAsync(array{
 *     AlgorithmName?: string,
 *     AlgorithmDescription?: string,
 *     TrainingSpecification?: array{
 *         TrainingImage?: string,
 *         TrainingImageDigest?: string,
 *         SupportedHyperParameters?: list<array>,
 *         SupportedTrainingInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportsDistributedTraining?: bool,
 *         MetricDefinitions?: list<array>,
 *         TrainingChannels?: list<array>,
 *         SupportedTuningJobObjectiveMetrics?: list<array>,
 *         AdditionalS3DataSource?: array{S3DataType?: 'S3Object'|'S3Prefix', S3Uri?: string, CompressionType?: 'Gzip'|'None', ETag?: string, ...},
 *         ...,
 *     },
 *     InferenceSpecification?: array{
 *         Containers?: list<array>,
 *         SupportedTransformInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'>,
 *         SupportedRealtimeInferenceInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportedContentTypes?: list<string>,
 *         SupportedResponseMIMETypes?: list<string>,
 *         ...,
 *     },
 *     ValidationSpecification?: array{ValidationRole?: string, ValidationProfiles?: list<array>, ...},
 *     CertifyForMarketplace?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApp(array $args = [])
 * @phpstan-method \Aws\Result createApp(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     SpaceName?: string,
 *     AppType?: 'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard',
 *     AppName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ResourceSpec?: array{
 *         SageMakerImageArn?: string,
 *         SageMakerImageVersionArn?: string,
 *         SageMakerImageVersionAlias?: string,
 *         InstanceType?: 'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.geospatial.interactive'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.micro'|'ml.t3.small'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'system',
 *         LifecycleConfigArn?: string,
 *         TrainingPlanArn?: string,
 *         ...,
 *     },
 *     RecoveryMode?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppAsync(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     SpaceName?: string,
 *     AppType?: 'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard',
 *     AppName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ResourceSpec?: array{
 *         SageMakerImageArn?: string,
 *         SageMakerImageVersionArn?: string,
 *         SageMakerImageVersionAlias?: string,
 *         InstanceType?: 'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.geospatial.interactive'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.micro'|'ml.t3.small'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'system',
 *         LifecycleConfigArn?: string,
 *         TrainingPlanArn?: string,
 *         ...,
 *     },
 *     RecoveryMode?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAppImageConfig(array $args = [])
 * @phpstan-method \Aws\Result createAppImageConfig(array{
 *     AppImageConfigName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KernelGatewayImageConfig?: array{
 *         KernelSpecs?: list<array>,
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ...,
 *     },
 *     JupyterLabAppImageConfig?: array{
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ContainerConfig?: array{
 *             ContainerArguments?: list<string>,
 *             ContainerEntrypoint?: list<string>,
 *             ContainerEnvironmentVariables?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     CodeEditorAppImageConfig?: array{
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ContainerConfig?: array{
 *             ContainerArguments?: list<string>,
 *             ContainerEntrypoint?: list<string>,
 *             ContainerEnvironmentVariables?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppImageConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppImageConfigAsync(array{
 *     AppImageConfigName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KernelGatewayImageConfig?: array{
 *         KernelSpecs?: list<array>,
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ...,
 *     },
 *     JupyterLabAppImageConfig?: array{
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ContainerConfig?: array{
 *             ContainerArguments?: list<string>,
 *             ContainerEntrypoint?: list<string>,
 *             ContainerEnvironmentVariables?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     CodeEditorAppImageConfig?: array{
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ContainerConfig?: array{
 *             ContainerArguments?: list<string>,
 *             ContainerEntrypoint?: list<string>,
 *             ContainerEnvironmentVariables?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createArtifact(array $args = [])
 * @phpstan-method \Aws\Result createArtifact(array{
 *     ArtifactName?: string,
 *     Source?: array{SourceUri?: string, SourceTypes?: list<array>, ...},
 *     ArtifactType?: string,
 *     Properties?: array<string, string>,
 *     MetadataProperties?: array{CommitId?: string, Repository?: string, GeneratedBy?: string, ProjectId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createArtifactAsync(array{
 *     ArtifactName?: string,
 *     Source?: array{SourceUri?: string, SourceTypes?: list<array>, ...},
 *     ArtifactType?: string,
 *     Properties?: array<string, string>,
 *     MetadataProperties?: array{CommitId?: string, Repository?: string, GeneratedBy?: string, ProjectId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAutoMLJob(array $args = [])
 * @phpstan-method \Aws\Result createAutoMLJob(array{
 *     AutoMLJobName?: string,
 *     InputDataConfig?: list<array{
 *         DataSource?: array,
 *         CompressionType?: 'Gzip'|'None',
 *         TargetAttributeName?: string,
 *         ContentType?: string,
 *         ChannelType?: 'training'|'validation',
 *         SampleWeightAttributeName?: string,
 *         ...,
 *     }>,
 *     OutputDataConfig?: array{KmsKeyId?: string, S3OutputPath?: string, ...},
 *     ProblemType?: 'BinaryClassification'|'MulticlassClassification'|'Regression',
 *     AutoMLJobObjective?: array{
 *         MetricName?: 'AUC'|'Accuracy'|'AverageWeightedQuantileLoss'|'BalancedAccuracy'|'F1'|'F1macro'|'MAE'|'MAPE'|'MASE'|'MSE'|'Precision'|'PrecisionMacro'|'R2'|'RMSE'|'Recall'|'RecallMacro'|'WAPE',
 *         ...,
 *     },
 *     AutoMLJobConfig?: array{
 *         CompletionCriteria?: array{MaxCandidates?: int, MaxRuntimePerTrainingJobInSeconds?: int, MaxAutoMLJobRuntimeInSeconds?: int, ...},
 *         SecurityConfig?: array{VolumeKmsKeyId?: string, EnableInterContainerTrafficEncryption?: bool, VpcConfig?: array, ...},
 *         CandidateGenerationConfig?: array{FeatureSpecificationS3Uri?: string, AlgorithmsConfig?: list<array>, ...},
 *         DataSplitConfig?: array{ValidationFraction?: float, ...},
 *         Mode?: 'AUTO'|'ENSEMBLING'|'HYPERPARAMETER_TUNING',
 *         ...,
 *     },
 *     RoleArn?: string,
 *     GenerateCandidateDefinitionsOnly?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ModelDeployConfig?: array{AutoGenerateEndpointName?: bool, EndpointName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutoMLJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutoMLJobAsync(array{
 *     AutoMLJobName?: string,
 *     InputDataConfig?: list<array{
 *         DataSource?: array,
 *         CompressionType?: 'Gzip'|'None',
 *         TargetAttributeName?: string,
 *         ContentType?: string,
 *         ChannelType?: 'training'|'validation',
 *         SampleWeightAttributeName?: string,
 *         ...,
 *     }>,
 *     OutputDataConfig?: array{KmsKeyId?: string, S3OutputPath?: string, ...},
 *     ProblemType?: 'BinaryClassification'|'MulticlassClassification'|'Regression',
 *     AutoMLJobObjective?: array{
 *         MetricName?: 'AUC'|'Accuracy'|'AverageWeightedQuantileLoss'|'BalancedAccuracy'|'F1'|'F1macro'|'MAE'|'MAPE'|'MASE'|'MSE'|'Precision'|'PrecisionMacro'|'R2'|'RMSE'|'Recall'|'RecallMacro'|'WAPE',
 *         ...,
 *     },
 *     AutoMLJobConfig?: array{
 *         CompletionCriteria?: array{MaxCandidates?: int, MaxRuntimePerTrainingJobInSeconds?: int, MaxAutoMLJobRuntimeInSeconds?: int, ...},
 *         SecurityConfig?: array{VolumeKmsKeyId?: string, EnableInterContainerTrafficEncryption?: bool, VpcConfig?: array, ...},
 *         CandidateGenerationConfig?: array{FeatureSpecificationS3Uri?: string, AlgorithmsConfig?: list<array>, ...},
 *         DataSplitConfig?: array{ValidationFraction?: float, ...},
 *         Mode?: 'AUTO'|'ENSEMBLING'|'HYPERPARAMETER_TUNING',
 *         ...,
 *     },
 *     RoleArn?: string,
 *     GenerateCandidateDefinitionsOnly?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ModelDeployConfig?: array{AutoGenerateEndpointName?: bool, EndpointName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAutoMLJobV2(array $args = [])
 * @phpstan-method \Aws\Result createAutoMLJobV2(array{
 *     AutoMLJobName?: string,
 *     AutoMLJobInputDataConfig?: list<array{
 *         ChannelType?: 'training'|'validation',
 *         ContentType?: string,
 *         CompressionType?: 'Gzip'|'None',
 *         DataSource?: array,
 *         ...,
 *     }>,
 *     OutputDataConfig?: array{KmsKeyId?: string, S3OutputPath?: string, ...},
 *     AutoMLProblemTypeConfig?: array{
 *         ImageClassificationJobConfig?: array{CompletionCriteria?: array, ...},
 *         TextClassificationJobConfig?: array{CompletionCriteria?: array, ContentColumn?: string, TargetLabelColumn?: string, ...},
 *         TimeSeriesForecastingJobConfig?: array{
 *             FeatureSpecificationS3Uri?: string,
 *             CompletionCriteria?: array,
 *             ForecastFrequency?: string,
 *             ForecastHorizon?: int,
 *             ForecastQuantiles?: list<string>,
 *             Transformations?: array,
 *             TimeSeriesConfig?: array,
 *             HolidayConfig?: list<array>,
 *             CandidateGenerationConfig?: array,
 *             ...,
 *         },
 *         TabularJobConfig?: array{
 *             CandidateGenerationConfig?: array,
 *             CompletionCriteria?: array,
 *             FeatureSpecificationS3Uri?: string,
 *             Mode?: 'AUTO'|'ENSEMBLING'|'HYPERPARAMETER_TUNING',
 *             GenerateCandidateDefinitionsOnly?: bool,
 *             ProblemType?: 'BinaryClassification'|'MulticlassClassification'|'Regression',
 *             TargetAttributeName?: string,
 *             SampleWeightAttributeName?: string,
 *             ...,
 *         },
 *         TextGenerationJobConfig?: array{
 *             CompletionCriteria?: array,
 *             BaseModelName?: string,
 *             TextGenerationHyperParameters?: array<string, string>,
 *             ModelAccessConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SecurityConfig?: array{
 *         VolumeKmsKeyId?: string,
 *         EnableInterContainerTrafficEncryption?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     AutoMLJobObjective?: array{
 *         MetricName?: 'AUC'|'Accuracy'|'AverageWeightedQuantileLoss'|'BalancedAccuracy'|'F1'|'F1macro'|'MAE'|'MAPE'|'MASE'|'MSE'|'Precision'|'PrecisionMacro'|'R2'|'RMSE'|'Recall'|'RecallMacro'|'WAPE',
 *         ...,
 *     },
 *     ModelDeployConfig?: array{AutoGenerateEndpointName?: bool, EndpointName?: string, ...},
 *     DataSplitConfig?: array{ValidationFraction?: float, ...},
 *     AutoMLComputeConfig?: array{EmrServerlessComputeConfig?: array{ExecutionRoleARN?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutoMLJobV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAutoMLJobV2Async(array{
 *     AutoMLJobName?: string,
 *     AutoMLJobInputDataConfig?: list<array{
 *         ChannelType?: 'training'|'validation',
 *         ContentType?: string,
 *         CompressionType?: 'Gzip'|'None',
 *         DataSource?: array,
 *         ...,
 *     }>,
 *     OutputDataConfig?: array{KmsKeyId?: string, S3OutputPath?: string, ...},
 *     AutoMLProblemTypeConfig?: array{
 *         ImageClassificationJobConfig?: array{CompletionCriteria?: array, ...},
 *         TextClassificationJobConfig?: array{CompletionCriteria?: array, ContentColumn?: string, TargetLabelColumn?: string, ...},
 *         TimeSeriesForecastingJobConfig?: array{
 *             FeatureSpecificationS3Uri?: string,
 *             CompletionCriteria?: array,
 *             ForecastFrequency?: string,
 *             ForecastHorizon?: int,
 *             ForecastQuantiles?: list<string>,
 *             Transformations?: array,
 *             TimeSeriesConfig?: array,
 *             HolidayConfig?: list<array>,
 *             CandidateGenerationConfig?: array,
 *             ...,
 *         },
 *         TabularJobConfig?: array{
 *             CandidateGenerationConfig?: array,
 *             CompletionCriteria?: array,
 *             FeatureSpecificationS3Uri?: string,
 *             Mode?: 'AUTO'|'ENSEMBLING'|'HYPERPARAMETER_TUNING',
 *             GenerateCandidateDefinitionsOnly?: bool,
 *             ProblemType?: 'BinaryClassification'|'MulticlassClassification'|'Regression',
 *             TargetAttributeName?: string,
 *             SampleWeightAttributeName?: string,
 *             ...,
 *         },
 *         TextGenerationJobConfig?: array{
 *             CompletionCriteria?: array,
 *             BaseModelName?: string,
 *             TextGenerationHyperParameters?: array<string, string>,
 *             ModelAccessConfig?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SecurityConfig?: array{
 *         VolumeKmsKeyId?: string,
 *         EnableInterContainerTrafficEncryption?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     AutoMLJobObjective?: array{
 *         MetricName?: 'AUC'|'Accuracy'|'AverageWeightedQuantileLoss'|'BalancedAccuracy'|'F1'|'F1macro'|'MAE'|'MAPE'|'MASE'|'MSE'|'Precision'|'PrecisionMacro'|'R2'|'RMSE'|'Recall'|'RecallMacro'|'WAPE',
 *         ...,
 *     },
 *     ModelDeployConfig?: array{AutoGenerateEndpointName?: bool, EndpointName?: string, ...},
 *     DataSplitConfig?: array{ValidationFraction?: float, ...},
 *     AutoMLComputeConfig?: array{EmrServerlessComputeConfig?: array{ExecutionRoleARN?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     ClusterName?: string,
 *     InstanceGroups?: list<array{
 *         InstanceCount?: int,
 *         MinInstanceCount?: int,
 *         InstanceGroupName?: string,
 *         InstanceType?: 'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.large'|'ml.c6a.12xlarge'|'ml.c6a.16xlarge'|'ml.c6a.24xlarge'|'ml.c6a.2xlarge'|'ml.c6a.32xlarge'|'ml.c6a.48xlarge'|'ml.c6a.4xlarge'|'ml.c6a.8xlarge'|'ml.c6a.large'|'ml.c6a.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.medium'|'ml.c6g.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.medium'|'ml.c7g.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.gr6.4xlarge'|'ml.gr6.8xlarge'|'ml.i3en.12xlarge'|'ml.i3en.24xlarge'|'ml.i3en.2xlarge'|'ml.i3en.3xlarge'|'ml.i3en.6xlarge'|'ml.i3en.large'|'ml.i3en.xlarge'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6a.12xlarge'|'ml.m6a.16xlarge'|'ml.m6a.24xlarge'|'ml.m6a.2xlarge'|'ml.m6a.32xlarge'|'ml.m6a.48xlarge'|'ml.m6a.4xlarge'|'ml.m6a.8xlarge'|'ml.m6a.large'|'ml.m6a.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.medium'|'ml.m6g.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7g.12xlarge'|'ml.m7g.16xlarge'|'ml.m7g.2xlarge'|'ml.m7g.4xlarge'|'ml.m7g.8xlarge'|'ml.m7g.large'|'ml.m7g.medium'|'ml.m7g.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5d.16xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.3xlarge'|'ml.trn2.48xlarge',
 *         InstanceRequirements?: array,
 *         LifeCycleConfig?: array,
 *         ExecutionRole?: string,
 *         ThreadsPerCore?: int,
 *         InstanceStorageConfigs?: list<array>,
 *         OnStartDeepHealthChecks?: list<'InstanceConnectivity'|'InstanceStress'>,
 *         TrainingPlanArn?: string,
 *         OverrideVpcConfig?: array,
 *         ScheduledUpdateConfig?: array,
 *         ImageId?: string,
 *         AutoPatchConfig?: array,
 *         ImageReleaseVersion?: string,
 *         KubernetesConfig?: array,
 *         SlurmConfig?: array,
 *         CapacityRequirements?: array,
 *         NetworkInterface?: array,
 *         ...,
 *     }>,
 *     RestrictedInstanceGroups?: list<array{
 *         InstanceCount?: int,
 *         InstanceGroupName?: string,
 *         InstanceType?: 'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.large'|'ml.c6a.12xlarge'|'ml.c6a.16xlarge'|'ml.c6a.24xlarge'|'ml.c6a.2xlarge'|'ml.c6a.32xlarge'|'ml.c6a.48xlarge'|'ml.c6a.4xlarge'|'ml.c6a.8xlarge'|'ml.c6a.large'|'ml.c6a.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.medium'|'ml.c6g.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.medium'|'ml.c7g.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.gr6.4xlarge'|'ml.gr6.8xlarge'|'ml.i3en.12xlarge'|'ml.i3en.24xlarge'|'ml.i3en.2xlarge'|'ml.i3en.3xlarge'|'ml.i3en.6xlarge'|'ml.i3en.large'|'ml.i3en.xlarge'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6a.12xlarge'|'ml.m6a.16xlarge'|'ml.m6a.24xlarge'|'ml.m6a.2xlarge'|'ml.m6a.32xlarge'|'ml.m6a.48xlarge'|'ml.m6a.4xlarge'|'ml.m6a.8xlarge'|'ml.m6a.large'|'ml.m6a.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.medium'|'ml.m6g.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7g.12xlarge'|'ml.m7g.16xlarge'|'ml.m7g.2xlarge'|'ml.m7g.4xlarge'|'ml.m7g.8xlarge'|'ml.m7g.large'|'ml.m7g.medium'|'ml.m7g.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5d.16xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.3xlarge'|'ml.trn2.48xlarge',
 *         ExecutionRole?: string,
 *         ThreadsPerCore?: int,
 *         InstanceStorageConfigs?: list<array>,
 *         OnStartDeepHealthChecks?: list<'InstanceConnectivity'|'InstanceStress'>,
 *         TrainingPlanArn?: string,
 *         OverrideVpcConfig?: array,
 *         ScheduledUpdateConfig?: array,
 *         EnvironmentConfig?: array,
 *         ...,
 *     }>,
 *     RestrictedInstanceGroupsConfig?: array{
 *         SharedEnvironmentConfig?: array{FSxLustreDeletionPolicy?: 'DeleteIfNotUsed'|'Keep', FSxLustreConfig?: array, ...},
 *         ...,
 *     },
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Orchestrator?: array{
 *         Eks?: array{ClusterArn?: string, ...},
 *         Slurm?: array{SlurmConfigStrategy?: 'Managed'|'Merge'|'Overwrite', ...},
 *         ...,
 *     },
 *     NodeRecovery?: 'Automatic'|'None',
 *     TieredStorageConfig?: array{Mode?: 'Disable'|'Enable', InstanceMemoryAllocationPercentage?: int, ...},
 *     NodeProvisioningMode?: 'Continuous',
 *     ClusterRole?: string,
 *     AutoScaling?: array{Mode?: 'Disable'|'Enable', AutoScalerType?: 'Karpenter', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     ClusterName?: string,
 *     InstanceGroups?: list<array{
 *         InstanceCount?: int,
 *         MinInstanceCount?: int,
 *         InstanceGroupName?: string,
 *         InstanceType?: 'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.large'|'ml.c6a.12xlarge'|'ml.c6a.16xlarge'|'ml.c6a.24xlarge'|'ml.c6a.2xlarge'|'ml.c6a.32xlarge'|'ml.c6a.48xlarge'|'ml.c6a.4xlarge'|'ml.c6a.8xlarge'|'ml.c6a.large'|'ml.c6a.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.medium'|'ml.c6g.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.medium'|'ml.c7g.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.gr6.4xlarge'|'ml.gr6.8xlarge'|'ml.i3en.12xlarge'|'ml.i3en.24xlarge'|'ml.i3en.2xlarge'|'ml.i3en.3xlarge'|'ml.i3en.6xlarge'|'ml.i3en.large'|'ml.i3en.xlarge'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6a.12xlarge'|'ml.m6a.16xlarge'|'ml.m6a.24xlarge'|'ml.m6a.2xlarge'|'ml.m6a.32xlarge'|'ml.m6a.48xlarge'|'ml.m6a.4xlarge'|'ml.m6a.8xlarge'|'ml.m6a.large'|'ml.m6a.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.medium'|'ml.m6g.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7g.12xlarge'|'ml.m7g.16xlarge'|'ml.m7g.2xlarge'|'ml.m7g.4xlarge'|'ml.m7g.8xlarge'|'ml.m7g.large'|'ml.m7g.medium'|'ml.m7g.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5d.16xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.3xlarge'|'ml.trn2.48xlarge',
 *         InstanceRequirements?: array,
 *         LifeCycleConfig?: array,
 *         ExecutionRole?: string,
 *         ThreadsPerCore?: int,
 *         InstanceStorageConfigs?: list<array>,
 *         OnStartDeepHealthChecks?: list<'InstanceConnectivity'|'InstanceStress'>,
 *         TrainingPlanArn?: string,
 *         OverrideVpcConfig?: array,
 *         ScheduledUpdateConfig?: array,
 *         ImageId?: string,
 *         AutoPatchConfig?: array,
 *         ImageReleaseVersion?: string,
 *         KubernetesConfig?: array,
 *         SlurmConfig?: array,
 *         CapacityRequirements?: array,
 *         NetworkInterface?: array,
 *         ...,
 *     }>,
 *     RestrictedInstanceGroups?: list<array{
 *         InstanceCount?: int,
 *         InstanceGroupName?: string,
 *         InstanceType?: 'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.large'|'ml.c6a.12xlarge'|'ml.c6a.16xlarge'|'ml.c6a.24xlarge'|'ml.c6a.2xlarge'|'ml.c6a.32xlarge'|'ml.c6a.48xlarge'|'ml.c6a.4xlarge'|'ml.c6a.8xlarge'|'ml.c6a.large'|'ml.c6a.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.medium'|'ml.c6g.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.medium'|'ml.c7g.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.gr6.4xlarge'|'ml.gr6.8xlarge'|'ml.i3en.12xlarge'|'ml.i3en.24xlarge'|'ml.i3en.2xlarge'|'ml.i3en.3xlarge'|'ml.i3en.6xlarge'|'ml.i3en.large'|'ml.i3en.xlarge'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6a.12xlarge'|'ml.m6a.16xlarge'|'ml.m6a.24xlarge'|'ml.m6a.2xlarge'|'ml.m6a.32xlarge'|'ml.m6a.48xlarge'|'ml.m6a.4xlarge'|'ml.m6a.8xlarge'|'ml.m6a.large'|'ml.m6a.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.medium'|'ml.m6g.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7g.12xlarge'|'ml.m7g.16xlarge'|'ml.m7g.2xlarge'|'ml.m7g.4xlarge'|'ml.m7g.8xlarge'|'ml.m7g.large'|'ml.m7g.medium'|'ml.m7g.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5d.16xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.3xlarge'|'ml.trn2.48xlarge',
 *         ExecutionRole?: string,
 *         ThreadsPerCore?: int,
 *         InstanceStorageConfigs?: list<array>,
 *         OnStartDeepHealthChecks?: list<'InstanceConnectivity'|'InstanceStress'>,
 *         TrainingPlanArn?: string,
 *         OverrideVpcConfig?: array,
 *         ScheduledUpdateConfig?: array,
 *         EnvironmentConfig?: array,
 *         ...,
 *     }>,
 *     RestrictedInstanceGroupsConfig?: array{
 *         SharedEnvironmentConfig?: array{FSxLustreDeletionPolicy?: 'DeleteIfNotUsed'|'Keep', FSxLustreConfig?: array, ...},
 *         ...,
 *     },
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Orchestrator?: array{
 *         Eks?: array{ClusterArn?: string, ...},
 *         Slurm?: array{SlurmConfigStrategy?: 'Managed'|'Merge'|'Overwrite', ...},
 *         ...,
 *     },
 *     NodeRecovery?: 'Automatic'|'None',
 *     TieredStorageConfig?: array{Mode?: 'Disable'|'Enable', InstanceMemoryAllocationPercentage?: int, ...},
 *     NodeProvisioningMode?: 'Continuous',
 *     ClusterRole?: string,
 *     AutoScaling?: array{Mode?: 'Disable'|'Enable', AutoScalerType?: 'Karpenter', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createClusterSchedulerConfig(array $args = [])
 * @phpstan-method \Aws\Result createClusterSchedulerConfig(array{
 *     Name?: string,
 *     ClusterArn?: string,
 *     SchedulerConfig?: array{
 *         PriorityClasses?: list<array>,
 *         FairShare?: 'Disabled'|'Enabled',
 *         IdleResourceSharing?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterSchedulerConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterSchedulerConfigAsync(array{
 *     Name?: string,
 *     ClusterArn?: string,
 *     SchedulerConfig?: array{
 *         PriorityClasses?: list<array>,
 *         FairShare?: 'Disabled'|'Enabled',
 *         IdleResourceSharing?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCodeRepository(array $args = [])
 * @phpstan-method \Aws\Result createCodeRepository(array{
 *     CodeRepositoryName?: string,
 *     GitConfig?: array{RepositoryUrl?: string, Branch?: string, SecretArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCodeRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCodeRepositoryAsync(array{
 *     CodeRepositoryName?: string,
 *     GitConfig?: array{RepositoryUrl?: string, Branch?: string, SecretArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCompilationJob(array $args = [])
 * @phpstan-method \Aws\Result createCompilationJob(array{
 *     CompilationJobName?: string,
 *     RoleArn?: string,
 *     ModelPackageVersionArn?: string,
 *     InputConfig?: array{
 *         S3Uri?: string,
 *         DataInputConfig?: string,
 *         Framework?: 'DARKNET'|'KERAS'|'MXNET'|'ONNX'|'PYTORCH'|'SKLEARN'|'TENSORFLOW'|'TFLITE'|'XGBOOST',
 *         FrameworkVersion?: string,
 *         ...,
 *     },
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         TargetDevice?: 'aisage'|'amba_cv2'|'amba_cv22'|'amba_cv25'|'coreml'|'deeplens'|'imx8mplus'|'imx8qm'|'jacinto_tda4vm'|'jetson_nano'|'jetson_tx1'|'jetson_tx2'|'jetson_xavier'|'lambda'|'ml_c4'|'ml_c5'|'ml_c6g'|'ml_eia2'|'ml_g4dn'|'ml_inf1'|'ml_inf2'|'ml_m4'|'ml_m5'|'ml_m6g'|'ml_p2'|'ml_p3'|'ml_trn1'|'qcs603'|'qcs605'|'rasp3b'|'rasp4b'|'rk3288'|'rk3399'|'sbe_c'|'sitara_am57x'|'x86_win32'|'x86_win64',
 *         TargetPlatform?: array{
 *             Os?: 'ANDROID'|'LINUX',
 *             Arch?: 'ARM64'|'ARM_EABI'|'ARM_EABIHF'|'X86'|'X86_64',
 *             Accelerator?: 'INTEL_GRAPHICS'|'MALI'|'NNA'|'NVIDIA',
 *             ...,
 *         },
 *         CompilerOptions?: string,
 *         KmsKeyId?: string,
 *         ...,
 *     },
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, MaxWaitTimeInSeconds?: int, MaxPendingTimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCompilationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCompilationJobAsync(array{
 *     CompilationJobName?: string,
 *     RoleArn?: string,
 *     ModelPackageVersionArn?: string,
 *     InputConfig?: array{
 *         S3Uri?: string,
 *         DataInputConfig?: string,
 *         Framework?: 'DARKNET'|'KERAS'|'MXNET'|'ONNX'|'PYTORCH'|'SKLEARN'|'TENSORFLOW'|'TFLITE'|'XGBOOST',
 *         FrameworkVersion?: string,
 *         ...,
 *     },
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         TargetDevice?: 'aisage'|'amba_cv2'|'amba_cv22'|'amba_cv25'|'coreml'|'deeplens'|'imx8mplus'|'imx8qm'|'jacinto_tda4vm'|'jetson_nano'|'jetson_tx1'|'jetson_tx2'|'jetson_xavier'|'lambda'|'ml_c4'|'ml_c5'|'ml_c6g'|'ml_eia2'|'ml_g4dn'|'ml_inf1'|'ml_inf2'|'ml_m4'|'ml_m5'|'ml_m6g'|'ml_p2'|'ml_p3'|'ml_trn1'|'qcs603'|'qcs605'|'rasp3b'|'rasp4b'|'rk3288'|'rk3399'|'sbe_c'|'sitara_am57x'|'x86_win32'|'x86_win64',
 *         TargetPlatform?: array{
 *             Os?: 'ANDROID'|'LINUX',
 *             Arch?: 'ARM64'|'ARM_EABI'|'ARM_EABIHF'|'X86'|'X86_64',
 *             Accelerator?: 'INTEL_GRAPHICS'|'MALI'|'NNA'|'NVIDIA',
 *             ...,
 *         },
 *         CompilerOptions?: string,
 *         KmsKeyId?: string,
 *         ...,
 *     },
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, MaxWaitTimeInSeconds?: int, MaxPendingTimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createComputeQuota(array $args = [])
 * @phpstan-method \Aws\Result createComputeQuota(array{
 *     Name?: string,
 *     Description?: string,
 *     ClusterArn?: string,
 *     ComputeQuotaConfig?: array{
 *         ComputeQuotaResources?: list<array>,
 *         ResourceSharingConfig?: array{
 *             Strategy?: 'DontLend'|'Lend'|'LendAndBorrow',
 *             BorrowLimit?: int,
 *             AbsoluteBorrowLimits?: list<array>,
 *             ...,
 *         },
 *         PreemptTeamTasks?: 'LowerPriority'|'Never',
 *         ...,
 *     },
 *     ComputeQuotaTarget?: array{TeamName?: string, FairShareWeight?: int, ...},
 *     ActivationState?: 'Disabled'|'Enabled',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createComputeQuotaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createComputeQuotaAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     ClusterArn?: string,
 *     ComputeQuotaConfig?: array{
 *         ComputeQuotaResources?: list<array>,
 *         ResourceSharingConfig?: array{
 *             Strategy?: 'DontLend'|'Lend'|'LendAndBorrow',
 *             BorrowLimit?: int,
 *             AbsoluteBorrowLimits?: list<array>,
 *             ...,
 *         },
 *         PreemptTeamTasks?: 'LowerPriority'|'Never',
 *         ...,
 *     },
 *     ComputeQuotaTarget?: array{TeamName?: string, FairShareWeight?: int, ...},
 *     ActivationState?: 'Disabled'|'Enabled',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContext(array $args = [])
 * @phpstan-method \Aws\Result createContext(array{
 *     ContextName?: string,
 *     Source?: array{SourceUri?: string, SourceType?: string, SourceId?: string, ...},
 *     ContextType?: string,
 *     Description?: string,
 *     Properties?: array<string, string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContextAsync(array{
 *     ContextName?: string,
 *     Source?: array{SourceUri?: string, SourceType?: string, SourceId?: string, ...},
 *     ContextType?: string,
 *     Description?: string,
 *     Properties?: array<string, string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataQualityJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result createDataQualityJobDefinition(array{
 *     JobDefinitionName?: string,
 *     DataQualityBaselineConfig?: array{
 *         BaseliningJobName?: string,
 *         ConstraintsResource?: array{S3Uri?: string, ...},
 *         StatisticsResource?: array{S3Uri?: string, ...},
 *         ...,
 *     },
 *     DataQualityAppSpecification?: array{
 *         ImageUri?: string,
 *         ContainerEntrypoint?: list<string>,
 *         ContainerArguments?: list<string>,
 *         RecordPreprocessorSourceUri?: string,
 *         PostAnalyticsProcessorSourceUri?: string,
 *         Environment?: array<string, string>,
 *         ...,
 *     },
 *     DataQualityJobInput?: array{
 *         EndpointInput?: array{
 *             EndpointName?: string,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         BatchTransformInput?: array{
 *             DataCapturedDestinationS3Uri?: string,
 *             DatasetFormat?: array,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DataQualityJobOutputConfig?: array{MonitoringOutputs?: list<array>, KmsKeyId?: string, ...},
 *     JobResources?: array{
 *         ClusterConfig?: array{
 *             InstanceCount?: int,
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     NetworkConfig?: array{
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableNetworkIsolation?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataQualityJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataQualityJobDefinitionAsync(array{
 *     JobDefinitionName?: string,
 *     DataQualityBaselineConfig?: array{
 *         BaseliningJobName?: string,
 *         ConstraintsResource?: array{S3Uri?: string, ...},
 *         StatisticsResource?: array{S3Uri?: string, ...},
 *         ...,
 *     },
 *     DataQualityAppSpecification?: array{
 *         ImageUri?: string,
 *         ContainerEntrypoint?: list<string>,
 *         ContainerArguments?: list<string>,
 *         RecordPreprocessorSourceUri?: string,
 *         PostAnalyticsProcessorSourceUri?: string,
 *         Environment?: array<string, string>,
 *         ...,
 *     },
 *     DataQualityJobInput?: array{
 *         EndpointInput?: array{
 *             EndpointName?: string,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         BatchTransformInput?: array{
 *             DataCapturedDestinationS3Uri?: string,
 *             DatasetFormat?: array,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     DataQualityJobOutputConfig?: array{MonitoringOutputs?: list<array>, KmsKeyId?: string, ...},
 *     JobResources?: array{
 *         ClusterConfig?: array{
 *             InstanceCount?: int,
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     NetworkConfig?: array{
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableNetworkIsolation?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDeviceFleet(array $args = [])
 * @phpstan-method \Aws\Result createDeviceFleet(array{
 *     DeviceFleetName?: string,
 *     RoleArn?: string,
 *     Description?: string,
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         KmsKeyId?: string,
 *         PresetDeploymentType?: 'GreengrassV2Component',
 *         PresetDeploymentConfig?: string,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EnableIotRoleAlias?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeviceFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeviceFleetAsync(array{
 *     DeviceFleetName?: string,
 *     RoleArn?: string,
 *     Description?: string,
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         KmsKeyId?: string,
 *         PresetDeploymentType?: 'GreengrassV2Component',
 *         PresetDeploymentConfig?: string,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EnableIotRoleAlias?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{
 *     DomainName?: string,
 *     AuthMode?: 'IAM'|'SSO',
 *     DefaultUserSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         SharingSettings?: array{NotebookOutputOption?: 'Allowed'|'Disabled', S3OutputPath?: string, S3KmsKeyId?: string, ...},
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         TensorBoardAppSettings?: array{DefaultResourceSpec?: array, ...},
 *         RStudioServerProAppSettings?: array{AccessStatus?: 'DISABLED'|'ENABLED', UserGroup?: 'R_STUDIO_ADMIN'|'R_STUDIO_USER', ...},
 *         RSessionAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, ...},
 *         CanvasAppSettings?: array{
 *             TimeSeriesForecastingSettings?: array,
 *             ModelRegisterSettings?: array,
 *             WorkspaceSettings?: array,
 *             IdentityProviderOAuthSettings?: list<array>,
 *             DirectDeploySettings?: array,
 *             KendraSettings?: array,
 *             GenerativeAiSettings?: array,
 *             EmrServerlessSettings?: array,
 *             ...,
 *         },
 *         CodeEditorAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             AppLifecycleManagement?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         DefaultLandingUri?: string,
 *         StudioWebPortal?: 'DISABLED'|'ENABLED',
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         StudioWebPortalSettings?: array{
 *             HiddenMlTools?: list<'AutoMl'|'Comet'|'DataWrangler'|'Datasets'|'DeepchecksLLMEvaluation'|'EmrClusters'|'Endpoints'|'Evaluators'|'Experiments'|'FeatureStore'|'Fiddler'|'HyperPodClusters'|'InferenceOptimization'|'InferenceRecommender'|'JumpStart'|'LakeraGuard'|'ModelEvaluation'|'Models'|'PerformanceEvaluation'|'Pipelines'|'Projects'|'RunningInstances'|'Training'>,
 *             HiddenAppTypes?: list<'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard'>,
 *             HiddenInstanceTypes?: list<'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.geospatial.interactive'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.micro'|'ml.t3.small'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'system'>,
 *             HiddenSageMakerImageVersionAliases?: list<array>,
 *             ExecutionRoleSessionNameMode?: 'STATIC'|'USER_IDENTITY',
 *             ...,
 *         },
 *         AutoMountHomeEFS?: 'DefaultAsDomain'|'Disabled'|'Enabled',
 *         ...,
 *     },
 *     DomainSettings?: array{
 *         SecurityGroupIds?: list<string>,
 *         RStudioServerProDomainSettings?: array{
 *             DomainExecutionRoleArn?: string,
 *             RStudioConnectUrl?: string,
 *             RStudioPackageManagerUrl?: string,
 *             DefaultResourceSpec?: array,
 *             ...,
 *         },
 *         ExecutionRoleIdentityConfig?: 'DISABLED'|'USER_PROFILE_NAME',
 *         TrustedIdentityPropagationSettings?: array{Status?: 'DISABLED'|'ENABLED', ...},
 *         DockerSettings?: array{
 *             EnableDockerAccess?: 'DISABLED'|'ENABLED',
 *             VpcOnlyTrustedAccounts?: list<string>,
 *             RootlessDocker?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         AmazonQSettings?: array{Status?: 'DISABLED'|'ENABLED', QProfileArn?: string, ...},
 *         UnifiedStudioSettings?: array{
 *             StudioWebPortalAccess?: 'DISABLED'|'ENABLED',
 *             DomainAccountId?: string,
 *             DomainRegion?: string,
 *             DomainId?: string,
 *             ProjectId?: string,
 *             EnvironmentId?: string,
 *             ProjectS3Path?: string,
 *             SingleSignOnApplicationArn?: string,
 *             ...,
 *         },
 *         IpAddressType?: 'dualstack'|'ipv4',
 *         ...,
 *     },
 *     SubnetIds?: list<string>,
 *     VpcId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AppNetworkAccessType?: 'PublicInternetOnly'|'VpcOnly',
 *     HomeEfsFileSystemKmsKeyId?: string,
 *     KmsKeyId?: string,
 *     AppSecurityGroupManagement?: 'Customer'|'Service',
 *     HomeEfsFileSystemCreation?: 'Disabled'|'Enabled',
 *     TagPropagation?: 'DISABLED'|'ENABLED',
 *     DefaultSpaceSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{
 *     DomainName?: string,
 *     AuthMode?: 'IAM'|'SSO',
 *     DefaultUserSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         SharingSettings?: array{NotebookOutputOption?: 'Allowed'|'Disabled', S3OutputPath?: string, S3KmsKeyId?: string, ...},
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         TensorBoardAppSettings?: array{DefaultResourceSpec?: array, ...},
 *         RStudioServerProAppSettings?: array{AccessStatus?: 'DISABLED'|'ENABLED', UserGroup?: 'R_STUDIO_ADMIN'|'R_STUDIO_USER', ...},
 *         RSessionAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, ...},
 *         CanvasAppSettings?: array{
 *             TimeSeriesForecastingSettings?: array,
 *             ModelRegisterSettings?: array,
 *             WorkspaceSettings?: array,
 *             IdentityProviderOAuthSettings?: list<array>,
 *             DirectDeploySettings?: array,
 *             KendraSettings?: array,
 *             GenerativeAiSettings?: array,
 *             EmrServerlessSettings?: array,
 *             ...,
 *         },
 *         CodeEditorAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             AppLifecycleManagement?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         DefaultLandingUri?: string,
 *         StudioWebPortal?: 'DISABLED'|'ENABLED',
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         StudioWebPortalSettings?: array{
 *             HiddenMlTools?: list<'AutoMl'|'Comet'|'DataWrangler'|'Datasets'|'DeepchecksLLMEvaluation'|'EmrClusters'|'Endpoints'|'Evaluators'|'Experiments'|'FeatureStore'|'Fiddler'|'HyperPodClusters'|'InferenceOptimization'|'InferenceRecommender'|'JumpStart'|'LakeraGuard'|'ModelEvaluation'|'Models'|'PerformanceEvaluation'|'Pipelines'|'Projects'|'RunningInstances'|'Training'>,
 *             HiddenAppTypes?: list<'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard'>,
 *             HiddenInstanceTypes?: list<'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.geospatial.interactive'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.micro'|'ml.t3.small'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'system'>,
 *             HiddenSageMakerImageVersionAliases?: list<array>,
 *             ExecutionRoleSessionNameMode?: 'STATIC'|'USER_IDENTITY',
 *             ...,
 *         },
 *         AutoMountHomeEFS?: 'DefaultAsDomain'|'Disabled'|'Enabled',
 *         ...,
 *     },
 *     DomainSettings?: array{
 *         SecurityGroupIds?: list<string>,
 *         RStudioServerProDomainSettings?: array{
 *             DomainExecutionRoleArn?: string,
 *             RStudioConnectUrl?: string,
 *             RStudioPackageManagerUrl?: string,
 *             DefaultResourceSpec?: array,
 *             ...,
 *         },
 *         ExecutionRoleIdentityConfig?: 'DISABLED'|'USER_PROFILE_NAME',
 *         TrustedIdentityPropagationSettings?: array{Status?: 'DISABLED'|'ENABLED', ...},
 *         DockerSettings?: array{
 *             EnableDockerAccess?: 'DISABLED'|'ENABLED',
 *             VpcOnlyTrustedAccounts?: list<string>,
 *             RootlessDocker?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         AmazonQSettings?: array{Status?: 'DISABLED'|'ENABLED', QProfileArn?: string, ...},
 *         UnifiedStudioSettings?: array{
 *             StudioWebPortalAccess?: 'DISABLED'|'ENABLED',
 *             DomainAccountId?: string,
 *             DomainRegion?: string,
 *             DomainId?: string,
 *             ProjectId?: string,
 *             EnvironmentId?: string,
 *             ProjectS3Path?: string,
 *             SingleSignOnApplicationArn?: string,
 *             ...,
 *         },
 *         IpAddressType?: 'dualstack'|'ipv4',
 *         ...,
 *     },
 *     SubnetIds?: list<string>,
 *     VpcId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AppNetworkAccessType?: 'PublicInternetOnly'|'VpcOnly',
 *     HomeEfsFileSystemKmsKeyId?: string,
 *     KmsKeyId?: string,
 *     AppSecurityGroupManagement?: 'Customer'|'Service',
 *     HomeEfsFileSystemCreation?: 'Disabled'|'Enabled',
 *     TagPropagation?: 'DISABLED'|'ENABLED',
 *     DefaultSpaceSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEdgeDeploymentPlan(array $args = [])
 * @phpstan-method \Aws\Result createEdgeDeploymentPlan(array{
 *     EdgeDeploymentPlanName?: string,
 *     ModelConfigs?: list<array{ModelHandle?: string, EdgePackagingJobName?: string, ...}>,
 *     DeviceFleetName?: string,
 *     Stages?: list<array{StageName?: string, DeviceSelectionConfig?: array, DeploymentConfig?: array, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEdgeDeploymentPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEdgeDeploymentPlanAsync(array{
 *     EdgeDeploymentPlanName?: string,
 *     ModelConfigs?: list<array{ModelHandle?: string, EdgePackagingJobName?: string, ...}>,
 *     DeviceFleetName?: string,
 *     Stages?: list<array{StageName?: string, DeviceSelectionConfig?: array, DeploymentConfig?: array, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEdgeDeploymentStage(array $args = [])
 * @phpstan-method \Aws\Result createEdgeDeploymentStage(array{
 *     EdgeDeploymentPlanName?: string,
 *     Stages?: list<array{StageName?: string, DeviceSelectionConfig?: array, DeploymentConfig?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEdgeDeploymentStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEdgeDeploymentStageAsync(array{
 *     EdgeDeploymentPlanName?: string,
 *     Stages?: list<array{StageName?: string, DeviceSelectionConfig?: array, DeploymentConfig?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEdgePackagingJob(array $args = [])
 * @phpstan-method \Aws\Result createEdgePackagingJob(array{
 *     EdgePackagingJobName?: string,
 *     CompilationJobName?: string,
 *     ModelName?: string,
 *     ModelVersion?: string,
 *     RoleArn?: string,
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         KmsKeyId?: string,
 *         PresetDeploymentType?: 'GreengrassV2Component',
 *         PresetDeploymentConfig?: string,
 *         ...,
 *     },
 *     ResourceKey?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEdgePackagingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEdgePackagingJobAsync(array{
 *     EdgePackagingJobName?: string,
 *     CompilationJobName?: string,
 *     ModelName?: string,
 *     ModelVersion?: string,
 *     RoleArn?: string,
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         KmsKeyId?: string,
 *         PresetDeploymentType?: 'GreengrassV2Component',
 *         PresetDeploymentConfig?: string,
 *         ...,
 *     },
 *     ResourceKey?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createEndpoint(array{
 *     EndpointName?: string,
 *     EndpointConfigName?: string,
 *     DeploymentConfig?: array{
 *         BlueGreenUpdatePolicy?: array{
 *             TrafficRoutingConfiguration?: array,
 *             TerminationWaitInSeconds?: int,
 *             MaximumExecutionTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         RollingUpdatePolicy?: array{
 *             MaximumBatchSize?: array,
 *             WaitIntervalInSeconds?: int,
 *             MaximumExecutionTimeoutInSeconds?: int,
 *             RollbackMaximumBatchSize?: array,
 *             ...,
 *         },
 *         AutoRollbackConfiguration?: array{Alarms?: list<array>, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEndpointAsync(array{
 *     EndpointName?: string,
 *     EndpointConfigName?: string,
 *     DeploymentConfig?: array{
 *         BlueGreenUpdatePolicy?: array{
 *             TrafficRoutingConfiguration?: array,
 *             TerminationWaitInSeconds?: int,
 *             MaximumExecutionTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         RollingUpdatePolicy?: array{
 *             MaximumBatchSize?: array,
 *             WaitIntervalInSeconds?: int,
 *             MaximumExecutionTimeoutInSeconds?: int,
 *             RollbackMaximumBatchSize?: array,
 *             ...,
 *         },
 *         AutoRollbackConfiguration?: array{Alarms?: list<array>, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEndpointConfig(array $args = [])
 * @phpstan-method \Aws\Result createEndpointConfig(array{
 *     EndpointConfigName?: string,
 *     ProductionVariants?: list<array{
 *         VariantName?: string,
 *         ModelName?: string,
 *         InitialInstanceCount?: int,
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         InstancePools?: list<array>,
 *         VariantInstanceProvisionTimeoutInSeconds?: int,
 *         InitialVariantWeight?: float,
 *         AcceleratorType?: 'ml.eia1.large'|'ml.eia1.medium'|'ml.eia1.xlarge'|'ml.eia2.large'|'ml.eia2.medium'|'ml.eia2.xlarge',
 *         CoreDumpConfig?: array,
 *         ServerlessConfig?: array,
 *         VolumeSizeInGB?: int,
 *         ModelDataDownloadTimeoutInSeconds?: int,
 *         ContainerStartupHealthCheckTimeoutInSeconds?: int,
 *         EnableSSMAccess?: bool,
 *         ManagedInstanceScaling?: array,
 *         RoutingConfig?: array,
 *         InferenceAmiVersion?: 'al2-ami-sagemaker-inference-gpu-2'|'al2-ami-sagemaker-inference-gpu-2-1'|'al2-ami-sagemaker-inference-gpu-3-1'|'al2-ami-sagemaker-inference-neuron-2'|'al2023-ami-sagemaker-inference-gpu-4-1',
 *         CapacityReservationConfig?: array,
 *         ...,
 *     }>,
 *     DataCaptureConfig?: array{
 *         EnableCapture?: bool,
 *         InitialSamplingPercentage?: int,
 *         DestinationS3Uri?: string,
 *         KmsKeyId?: string,
 *         CaptureOptions?: list<array>,
 *         CaptureContentTypeHeader?: array{CsvContentTypes?: list<string>, JsonContentTypes?: list<string>, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     AsyncInferenceConfig?: array{
 *         ClientConfig?: array{MaxConcurrentInvocationsPerInstance?: int, ...},
 *         OutputConfig?: array{KmsKeyId?: string, S3OutputPath?: string, NotificationConfig?: array, S3FailurePath?: string, ...},
 *         ...,
 *     },
 *     ExplainerConfig?: array{
 *         ClarifyExplainerConfig?: array{EnableExplanations?: string, InferenceConfig?: array, ShapConfig?: array, ...},
 *         ...,
 *     },
 *     ShadowProductionVariants?: list<array{
 *         VariantName?: string,
 *         ModelName?: string,
 *         InitialInstanceCount?: int,
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         InstancePools?: list<array>,
 *         VariantInstanceProvisionTimeoutInSeconds?: int,
 *         InitialVariantWeight?: float,
 *         AcceleratorType?: 'ml.eia1.large'|'ml.eia1.medium'|'ml.eia1.xlarge'|'ml.eia2.large'|'ml.eia2.medium'|'ml.eia2.xlarge',
 *         CoreDumpConfig?: array,
 *         ServerlessConfig?: array,
 *         VolumeSizeInGB?: int,
 *         ModelDataDownloadTimeoutInSeconds?: int,
 *         ContainerStartupHealthCheckTimeoutInSeconds?: int,
 *         EnableSSMAccess?: bool,
 *         ManagedInstanceScaling?: array,
 *         RoutingConfig?: array,
 *         InferenceAmiVersion?: 'al2-ami-sagemaker-inference-gpu-2'|'al2-ami-sagemaker-inference-gpu-2-1'|'al2-ami-sagemaker-inference-gpu-3-1'|'al2-ami-sagemaker-inference-neuron-2'|'al2023-ami-sagemaker-inference-gpu-4-1',
 *         CapacityReservationConfig?: array,
 *         ...,
 *     }>,
 *     ExecutionRoleArn?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     EnableNetworkIsolation?: bool,
 *     MetricsConfig?: array{
 *         EnableEnhancedMetrics?: bool,
 *         EnableDetailedObservability?: bool,
 *         MetricPublishFrequencyInSeconds?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEndpointConfigAsync(array{
 *     EndpointConfigName?: string,
 *     ProductionVariants?: list<array{
 *         VariantName?: string,
 *         ModelName?: string,
 *         InitialInstanceCount?: int,
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         InstancePools?: list<array>,
 *         VariantInstanceProvisionTimeoutInSeconds?: int,
 *         InitialVariantWeight?: float,
 *         AcceleratorType?: 'ml.eia1.large'|'ml.eia1.medium'|'ml.eia1.xlarge'|'ml.eia2.large'|'ml.eia2.medium'|'ml.eia2.xlarge',
 *         CoreDumpConfig?: array,
 *         ServerlessConfig?: array,
 *         VolumeSizeInGB?: int,
 *         ModelDataDownloadTimeoutInSeconds?: int,
 *         ContainerStartupHealthCheckTimeoutInSeconds?: int,
 *         EnableSSMAccess?: bool,
 *         ManagedInstanceScaling?: array,
 *         RoutingConfig?: array,
 *         InferenceAmiVersion?: 'al2-ami-sagemaker-inference-gpu-2'|'al2-ami-sagemaker-inference-gpu-2-1'|'al2-ami-sagemaker-inference-gpu-3-1'|'al2-ami-sagemaker-inference-neuron-2'|'al2023-ami-sagemaker-inference-gpu-4-1',
 *         CapacityReservationConfig?: array,
 *         ...,
 *     }>,
 *     DataCaptureConfig?: array{
 *         EnableCapture?: bool,
 *         InitialSamplingPercentage?: int,
 *         DestinationS3Uri?: string,
 *         KmsKeyId?: string,
 *         CaptureOptions?: list<array>,
 *         CaptureContentTypeHeader?: array{CsvContentTypes?: list<string>, JsonContentTypes?: list<string>, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     KmsKeyId?: string,
 *     AsyncInferenceConfig?: array{
 *         ClientConfig?: array{MaxConcurrentInvocationsPerInstance?: int, ...},
 *         OutputConfig?: array{KmsKeyId?: string, S3OutputPath?: string, NotificationConfig?: array, S3FailurePath?: string, ...},
 *         ...,
 *     },
 *     ExplainerConfig?: array{
 *         ClarifyExplainerConfig?: array{EnableExplanations?: string, InferenceConfig?: array, ShapConfig?: array, ...},
 *         ...,
 *     },
 *     ShadowProductionVariants?: list<array{
 *         VariantName?: string,
 *         ModelName?: string,
 *         InitialInstanceCount?: int,
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         InstancePools?: list<array>,
 *         VariantInstanceProvisionTimeoutInSeconds?: int,
 *         InitialVariantWeight?: float,
 *         AcceleratorType?: 'ml.eia1.large'|'ml.eia1.medium'|'ml.eia1.xlarge'|'ml.eia2.large'|'ml.eia2.medium'|'ml.eia2.xlarge',
 *         CoreDumpConfig?: array,
 *         ServerlessConfig?: array,
 *         VolumeSizeInGB?: int,
 *         ModelDataDownloadTimeoutInSeconds?: int,
 *         ContainerStartupHealthCheckTimeoutInSeconds?: int,
 *         EnableSSMAccess?: bool,
 *         ManagedInstanceScaling?: array,
 *         RoutingConfig?: array,
 *         InferenceAmiVersion?: 'al2-ami-sagemaker-inference-gpu-2'|'al2-ami-sagemaker-inference-gpu-2-1'|'al2-ami-sagemaker-inference-gpu-3-1'|'al2-ami-sagemaker-inference-neuron-2'|'al2023-ami-sagemaker-inference-gpu-4-1',
 *         CapacityReservationConfig?: array,
 *         ...,
 *     }>,
 *     ExecutionRoleArn?: string,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     EnableNetworkIsolation?: bool,
 *     MetricsConfig?: array{
 *         EnableEnhancedMetrics?: bool,
 *         EnableDetailedObservability?: bool,
 *         MetricPublishFrequencyInSeconds?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExperiment(array $args = [])
 * @phpstan-method \Aws\Result createExperiment(array{
 *     ExperimentName?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExperimentAsync(array{
 *     ExperimentName?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFeatureGroup(array $args = [])
 * @phpstan-method \Aws\Result createFeatureGroup(array{
 *     FeatureGroupName?: string,
 *     RecordIdentifierFeatureName?: string,
 *     EventTimeFeatureName?: string,
 *     FeatureDefinitions?: list<array{
 *         FeatureName?: string,
 *         FeatureType?: 'Fractional'|'Integral'|'String',
 *         CollectionType?: 'List'|'Set'|'Vector',
 *         CollectionConfig?: array,
 *         ...,
 *     }>,
 *     OnlineStoreConfig?: array{
 *         SecurityConfig?: array{KmsKeyId?: string, ...},
 *         EnableOnlineStore?: bool,
 *         TtlDuration?: array{Unit?: 'Days'|'Hours'|'Minutes'|'Seconds'|'Weeks', Value?: int, ...},
 *         StorageType?: 'InMemory'|'Standard',
 *         ...,
 *     },
 *     OfflineStoreConfig?: array{
 *         S3StorageConfig?: array{S3Uri?: string, KmsKeyId?: string, ResolvedOutputS3Uri?: string, ...},
 *         DisableGlueTableCreation?: bool,
 *         DataCatalogConfig?: array{TableName?: string, Catalog?: string, Database?: string, ...},
 *         TableFormat?: 'Default'|'Glue'|'Iceberg',
 *         ...,
 *     },
 *     ThroughputConfig?: array{
 *         ThroughputMode?: 'OnDemand'|'Provisioned',
 *         ProvisionedReadCapacityUnits?: int,
 *         ProvisionedWriteCapacityUnits?: int,
 *         ...,
 *     },
 *     RoleArn?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFeatureGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFeatureGroupAsync(array{
 *     FeatureGroupName?: string,
 *     RecordIdentifierFeatureName?: string,
 *     EventTimeFeatureName?: string,
 *     FeatureDefinitions?: list<array{
 *         FeatureName?: string,
 *         FeatureType?: 'Fractional'|'Integral'|'String',
 *         CollectionType?: 'List'|'Set'|'Vector',
 *         CollectionConfig?: array,
 *         ...,
 *     }>,
 *     OnlineStoreConfig?: array{
 *         SecurityConfig?: array{KmsKeyId?: string, ...},
 *         EnableOnlineStore?: bool,
 *         TtlDuration?: array{Unit?: 'Days'|'Hours'|'Minutes'|'Seconds'|'Weeks', Value?: int, ...},
 *         StorageType?: 'InMemory'|'Standard',
 *         ...,
 *     },
 *     OfflineStoreConfig?: array{
 *         S3StorageConfig?: array{S3Uri?: string, KmsKeyId?: string, ResolvedOutputS3Uri?: string, ...},
 *         DisableGlueTableCreation?: bool,
 *         DataCatalogConfig?: array{TableName?: string, Catalog?: string, Database?: string, ...},
 *         TableFormat?: 'Default'|'Glue'|'Iceberg',
 *         ...,
 *     },
 *     ThroughputConfig?: array{
 *         ThroughputMode?: 'OnDemand'|'Provisioned',
 *         ProvisionedReadCapacityUnits?: int,
 *         ProvisionedWriteCapacityUnits?: int,
 *         ...,
 *     },
 *     RoleArn?: string,
 *     Description?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFlowDefinition(array $args = [])
 * @phpstan-method \Aws\Result createFlowDefinition(array{
 *     FlowDefinitionName?: string,
 *     HumanLoopRequestSource?: array{
 *         AwsManagedHumanLoopRequestSource?: 'AWS/Rekognition/DetectModerationLabels/Image/V3'|'AWS/Textract/AnalyzeDocument/Forms/V1',
 *         ...,
 *     },
 *     HumanLoopActivationConfig?: array{HumanLoopActivationConditionsConfig?: array{HumanLoopActivationConditions?: string, ...}, ...},
 *     HumanLoopConfig?: array{
 *         WorkteamArn?: string,
 *         HumanTaskUiArn?: string,
 *         TaskTitle?: string,
 *         TaskDescription?: string,
 *         TaskCount?: int,
 *         TaskAvailabilityLifetimeInSeconds?: int,
 *         TaskTimeLimitInSeconds?: int,
 *         TaskKeywords?: list<string>,
 *         PublicWorkforceTaskPrice?: array{AmountInUsd?: array, ...},
 *         ...,
 *     },
 *     OutputConfig?: array{S3OutputPath?: string, KmsKeyId?: string, ...},
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlowDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFlowDefinitionAsync(array{
 *     FlowDefinitionName?: string,
 *     HumanLoopRequestSource?: array{
 *         AwsManagedHumanLoopRequestSource?: 'AWS/Rekognition/DetectModerationLabels/Image/V3'|'AWS/Textract/AnalyzeDocument/Forms/V1',
 *         ...,
 *     },
 *     HumanLoopActivationConfig?: array{HumanLoopActivationConditionsConfig?: array{HumanLoopActivationConditions?: string, ...}, ...},
 *     HumanLoopConfig?: array{
 *         WorkteamArn?: string,
 *         HumanTaskUiArn?: string,
 *         TaskTitle?: string,
 *         TaskDescription?: string,
 *         TaskCount?: int,
 *         TaskAvailabilityLifetimeInSeconds?: int,
 *         TaskTimeLimitInSeconds?: int,
 *         TaskKeywords?: list<string>,
 *         PublicWorkforceTaskPrice?: array{AmountInUsd?: array, ...},
 *         ...,
 *     },
 *     OutputConfig?: array{S3OutputPath?: string, KmsKeyId?: string, ...},
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHub(array $args = [])
 * @phpstan-method \Aws\Result createHub(array{
 *     HubName?: string,
 *     HubDescription?: string,
 *     HubDisplayName?: string,
 *     HubSearchKeywords?: list<string>,
 *     S3StorageConfig?: array{S3OutputPath?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHubAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHubAsync(array{
 *     HubName?: string,
 *     HubDescription?: string,
 *     HubDisplayName?: string,
 *     HubSearchKeywords?: list<string>,
 *     S3StorageConfig?: array{S3OutputPath?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHubContentPresignedUrls(array $args = [])
 * @phpstan-method \Aws\Result createHubContentPresignedUrls(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentName?: string,
 *     HubContentVersion?: string,
 *     AccessConfig?: array{AcceptEula?: bool, ExpectedS3Url?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHubContentPresignedUrlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHubContentPresignedUrlsAsync(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentName?: string,
 *     HubContentVersion?: string,
 *     AccessConfig?: array{AcceptEula?: bool, ExpectedS3Url?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHubContentReference(array $args = [])
 * @phpstan-method \Aws\Result createHubContentReference(array{
 *     HubName?: string,
 *     SageMakerPublicHubContentArn?: string,
 *     HubContentName?: string,
 *     MinVersion?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHubContentReferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHubContentReferenceAsync(array{
 *     HubName?: string,
 *     SageMakerPublicHubContentArn?: string,
 *     HubContentName?: string,
 *     MinVersion?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHumanTaskUi(array $args = [])
 * @phpstan-method \Aws\Result createHumanTaskUi(array{
 *     HumanTaskUiName?: string,
 *     UiTemplate?: array{Content?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHumanTaskUiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHumanTaskUiAsync(array{
 *     HumanTaskUiName?: string,
 *     UiTemplate?: array{Content?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createHyperParameterTuningJob(array $args = [])
 * @phpstan-method \Aws\Result createHyperParameterTuningJob(array{
 *     HyperParameterTuningJobName?: string,
 *     HyperParameterTuningJobConfig?: array{
 *         Strategy?: 'Bayesian'|'Grid'|'Hyperband'|'Random',
 *         StrategyConfig?: array{HyperbandStrategyConfig?: array, ...},
 *         HyperParameterTuningJobObjective?: array{Type?: 'Maximize'|'Minimize', MetricName?: string, ...},
 *         ResourceLimits?: array{MaxNumberOfTrainingJobs?: int, MaxParallelTrainingJobs?: int, MaxRuntimeInSeconds?: int, ...},
 *         ParameterRanges?: array{
 *             IntegerParameterRanges?: list<array>,
 *             ContinuousParameterRanges?: list<array>,
 *             CategoricalParameterRanges?: list<array>,
 *             AutoParameters?: list<array>,
 *             ...,
 *         },
 *         TrainingJobEarlyStoppingType?: 'Auto'|'Off',
 *         TuningJobCompletionCriteria?: array{TargetObjectiveMetricValue?: float, BestObjectiveNotImproving?: array, ConvergenceDetected?: array, ...},
 *         RandomSeed?: int,
 *         ...,
 *     },
 *     TrainingJobDefinition?: array{
 *         DefinitionName?: string,
 *         TuningObjective?: array{Type?: 'Maximize'|'Minimize', MetricName?: string, ...},
 *         HyperParameterRanges?: array{
 *             IntegerParameterRanges?: list<array>,
 *             ContinuousParameterRanges?: list<array>,
 *             CategoricalParameterRanges?: list<array>,
 *             AutoParameters?: list<array>,
 *             ...,
 *         },
 *         StaticHyperParameters?: array<string, string>,
 *         AlgorithmSpecification?: array{
 *             TrainingImage?: string,
 *             TrainingInputMode?: 'FastFile'|'File'|'Pipe',
 *             AlgorithmName?: string,
 *             MetricDefinitions?: list<array>,
 *             ...,
 *         },
 *         RoleArn?: string,
 *         InputDataConfig?: list<array>,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         OutputDataConfig?: array{KmsKeyId?: string, S3OutputPath?: string, CompressionType?: 'GZIP'|'NONE', ...},
 *         ResourceConfig?: array{
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *             InstanceCount?: int,
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             KeepAlivePeriodInSeconds?: int,
 *             InstanceGroups?: list<array>,
 *             TrainingPlanArn?: string,
 *             InstancePlacementConfig?: array,
 *             ...,
 *         },
 *         HyperParameterTuningResourceConfig?: array{
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *             InstanceCount?: int,
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             AllocationStrategy?: 'Prioritized',
 *             InstanceConfigs?: list<array>,
 *             ...,
 *         },
 *         StoppingCondition?: array{MaxRuntimeInSeconds?: int, MaxWaitTimeInSeconds?: int, MaxPendingTimeInSeconds?: int, ...},
 *         EnableNetworkIsolation?: bool,
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableManagedSpotTraining?: bool,
 *         CheckpointConfig?: array{S3Uri?: string, LocalPath?: string, ...},
 *         RetryStrategy?: array{MaximumRetryAttempts?: int, ...},
 *         Environment?: array<string, string>,
 *         ...,
 *     },
 *     TrainingJobDefinitions?: list<array{
 *         DefinitionName?: string,
 *         TuningObjective?: array,
 *         HyperParameterRanges?: array,
 *         StaticHyperParameters?: array<string, string>,
 *         AlgorithmSpecification?: array,
 *         RoleArn?: string,
 *         InputDataConfig?: list<array>,
 *         VpcConfig?: array,
 *         OutputDataConfig?: array,
 *         ResourceConfig?: array,
 *         HyperParameterTuningResourceConfig?: array,
 *         StoppingCondition?: array,
 *         EnableNetworkIsolation?: bool,
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableManagedSpotTraining?: bool,
 *         CheckpointConfig?: array,
 *         RetryStrategy?: array,
 *         Environment?: array<string, string>,
 *         ...,
 *     }>,
 *     WarmStartConfig?: array{
 *         ParentHyperParameterTuningJobs?: list<array>,
 *         WarmStartType?: 'IdenticalDataAndAlgorithm'|'TransferLearning',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Autotune?: array{Mode?: 'Enabled', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createHyperParameterTuningJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHyperParameterTuningJobAsync(array{
 *     HyperParameterTuningJobName?: string,
 *     HyperParameterTuningJobConfig?: array{
 *         Strategy?: 'Bayesian'|'Grid'|'Hyperband'|'Random',
 *         StrategyConfig?: array{HyperbandStrategyConfig?: array, ...},
 *         HyperParameterTuningJobObjective?: array{Type?: 'Maximize'|'Minimize', MetricName?: string, ...},
 *         ResourceLimits?: array{MaxNumberOfTrainingJobs?: int, MaxParallelTrainingJobs?: int, MaxRuntimeInSeconds?: int, ...},
 *         ParameterRanges?: array{
 *             IntegerParameterRanges?: list<array>,
 *             ContinuousParameterRanges?: list<array>,
 *             CategoricalParameterRanges?: list<array>,
 *             AutoParameters?: list<array>,
 *             ...,
 *         },
 *         TrainingJobEarlyStoppingType?: 'Auto'|'Off',
 *         TuningJobCompletionCriteria?: array{TargetObjectiveMetricValue?: float, BestObjectiveNotImproving?: array, ConvergenceDetected?: array, ...},
 *         RandomSeed?: int,
 *         ...,
 *     },
 *     TrainingJobDefinition?: array{
 *         DefinitionName?: string,
 *         TuningObjective?: array{Type?: 'Maximize'|'Minimize', MetricName?: string, ...},
 *         HyperParameterRanges?: array{
 *             IntegerParameterRanges?: list<array>,
 *             ContinuousParameterRanges?: list<array>,
 *             CategoricalParameterRanges?: list<array>,
 *             AutoParameters?: list<array>,
 *             ...,
 *         },
 *         StaticHyperParameters?: array<string, string>,
 *         AlgorithmSpecification?: array{
 *             TrainingImage?: string,
 *             TrainingInputMode?: 'FastFile'|'File'|'Pipe',
 *             AlgorithmName?: string,
 *             MetricDefinitions?: list<array>,
 *             ...,
 *         },
 *         RoleArn?: string,
 *         InputDataConfig?: list<array>,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         OutputDataConfig?: array{KmsKeyId?: string, S3OutputPath?: string, CompressionType?: 'GZIP'|'NONE', ...},
 *         ResourceConfig?: array{
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *             InstanceCount?: int,
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             KeepAlivePeriodInSeconds?: int,
 *             InstanceGroups?: list<array>,
 *             TrainingPlanArn?: string,
 *             InstancePlacementConfig?: array,
 *             ...,
 *         },
 *         HyperParameterTuningResourceConfig?: array{
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *             InstanceCount?: int,
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             AllocationStrategy?: 'Prioritized',
 *             InstanceConfigs?: list<array>,
 *             ...,
 *         },
 *         StoppingCondition?: array{MaxRuntimeInSeconds?: int, MaxWaitTimeInSeconds?: int, MaxPendingTimeInSeconds?: int, ...},
 *         EnableNetworkIsolation?: bool,
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableManagedSpotTraining?: bool,
 *         CheckpointConfig?: array{S3Uri?: string, LocalPath?: string, ...},
 *         RetryStrategy?: array{MaximumRetryAttempts?: int, ...},
 *         Environment?: array<string, string>,
 *         ...,
 *     },
 *     TrainingJobDefinitions?: list<array{
 *         DefinitionName?: string,
 *         TuningObjective?: array,
 *         HyperParameterRanges?: array,
 *         StaticHyperParameters?: array<string, string>,
 *         AlgorithmSpecification?: array,
 *         RoleArn?: string,
 *         InputDataConfig?: list<array>,
 *         VpcConfig?: array,
 *         OutputDataConfig?: array,
 *         ResourceConfig?: array,
 *         HyperParameterTuningResourceConfig?: array,
 *         StoppingCondition?: array,
 *         EnableNetworkIsolation?: bool,
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableManagedSpotTraining?: bool,
 *         CheckpointConfig?: array,
 *         RetryStrategy?: array,
 *         Environment?: array<string, string>,
 *         ...,
 *     }>,
 *     WarmStartConfig?: array{
 *         ParentHyperParameterTuningJobs?: list<array>,
 *         WarmStartType?: 'IdenticalDataAndAlgorithm'|'TransferLearning',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Autotune?: array{Mode?: 'Enabled', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createImage(array $args = [])
 * @phpstan-method \Aws\Result createImage(array{
 *     Description?: string,
 *     DisplayName?: string,
 *     ImageName?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImageAsync(array{
 *     Description?: string,
 *     DisplayName?: string,
 *     ImageName?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createImageVersion(array $args = [])
 * @phpstan-method \Aws\Result createImageVersion(array{
 *     BaseImage?: string,
 *     ClientToken?: string,
 *     ImageName?: string,
 *     Aliases?: list<string>,
 *     VendorGuidance?: 'ARCHIVED'|'NOT_PROVIDED'|'STABLE'|'TO_BE_ARCHIVED',
 *     JobType?: 'INFERENCE'|'NOTEBOOK_KERNEL'|'TRAINING',
 *     MLFramework?: string,
 *     ProgrammingLang?: string,
 *     Processor?: 'CPU'|'GPU',
 *     Horovod?: bool,
 *     ReleaseNotes?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImageVersionAsync(array{
 *     BaseImage?: string,
 *     ClientToken?: string,
 *     ImageName?: string,
 *     Aliases?: list<string>,
 *     VendorGuidance?: 'ARCHIVED'|'NOT_PROVIDED'|'STABLE'|'TO_BE_ARCHIVED',
 *     JobType?: 'INFERENCE'|'NOTEBOOK_KERNEL'|'TRAINING',
 *     MLFramework?: string,
 *     ProgrammingLang?: string,
 *     Processor?: 'CPU'|'GPU',
 *     Horovod?: bool,
 *     ReleaseNotes?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInferenceComponent(array $args = [])
 * @phpstan-method \Aws\Result createInferenceComponent(array{
 *     InferenceComponentName?: string,
 *     EndpointName?: string,
 *     VariantName?: string,
 *     Specification?: array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         ModelName?: string,
 *         Container?: array{
 *             Image?: string,
 *             ArtifactUrl?: string,
 *             Environment?: array<string, string>,
 *             ContainerMetricsConfig?: array,
 *             ...,
 *         },
 *         StartupParameters?: array{ModelDataDownloadTimeoutInSeconds?: int, ContainerStartupHealthCheckTimeoutInSeconds?: int, ...},
 *         ComputeResourceRequirements?: array{
 *             NumberOfCpuCoresRequired?: float,
 *             NumberOfAcceleratorDevicesRequired?: float,
 *             MinMemoryRequiredInMb?: int,
 *             MaxMemoryRequiredInMb?: int,
 *             ...,
 *         },
 *         BaseInferenceComponentName?: string,
 *         DataCacheConfig?: array{EnableCaching?: bool, ...},
 *         SchedulingConfig?: array{PlacementStrategy?: 'BINPACK'|'SPREAD', AvailabilityZoneBalance?: array, ...},
 *         ...,
 *     },
 *     Specifications?: list<array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         ModelName?: string,
 *         Container?: array,
 *         StartupParameters?: array,
 *         ComputeResourceRequirements?: array,
 *         BaseInferenceComponentName?: string,
 *         DataCacheConfig?: array,
 *         SchedulingConfig?: array,
 *         ...,
 *     }>,
 *     RuntimeConfig?: array{CopyCount?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInferenceComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInferenceComponentAsync(array{
 *     InferenceComponentName?: string,
 *     EndpointName?: string,
 *     VariantName?: string,
 *     Specification?: array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         ModelName?: string,
 *         Container?: array{
 *             Image?: string,
 *             ArtifactUrl?: string,
 *             Environment?: array<string, string>,
 *             ContainerMetricsConfig?: array,
 *             ...,
 *         },
 *         StartupParameters?: array{ModelDataDownloadTimeoutInSeconds?: int, ContainerStartupHealthCheckTimeoutInSeconds?: int, ...},
 *         ComputeResourceRequirements?: array{
 *             NumberOfCpuCoresRequired?: float,
 *             NumberOfAcceleratorDevicesRequired?: float,
 *             MinMemoryRequiredInMb?: int,
 *             MaxMemoryRequiredInMb?: int,
 *             ...,
 *         },
 *         BaseInferenceComponentName?: string,
 *         DataCacheConfig?: array{EnableCaching?: bool, ...},
 *         SchedulingConfig?: array{PlacementStrategy?: 'BINPACK'|'SPREAD', AvailabilityZoneBalance?: array, ...},
 *         ...,
 *     },
 *     Specifications?: list<array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         ModelName?: string,
 *         Container?: array,
 *         StartupParameters?: array,
 *         ComputeResourceRequirements?: array,
 *         BaseInferenceComponentName?: string,
 *         DataCacheConfig?: array,
 *         SchedulingConfig?: array,
 *         ...,
 *     }>,
 *     RuntimeConfig?: array{CopyCount?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInferenceExperiment(array $args = [])
 * @phpstan-method \Aws\Result createInferenceExperiment(array{
 *     Name?: string,
 *     Type?: 'ShadowMode',
 *     Schedule?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Description?: string,
 *     RoleArn?: string,
 *     EndpointName?: string,
 *     ModelVariants?: list<array{ModelName?: string, VariantName?: string, InfrastructureConfig?: array, ...}>,
 *     DataStorageConfig?: array{
 *         Destination?: string,
 *         KmsKey?: string,
 *         ContentType?: array{CsvContentTypes?: list<string>, JsonContentTypes?: list<string>, ...},
 *         ...,
 *     },
 *     ShadowModeConfig?: array{SourceModelVariantName?: string, ShadowModelVariants?: list<array>, ...},
 *     KmsKey?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInferenceExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInferenceExperimentAsync(array{
 *     Name?: string,
 *     Type?: 'ShadowMode',
 *     Schedule?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Description?: string,
 *     RoleArn?: string,
 *     EndpointName?: string,
 *     ModelVariants?: list<array{ModelName?: string, VariantName?: string, InfrastructureConfig?: array, ...}>,
 *     DataStorageConfig?: array{
 *         Destination?: string,
 *         KmsKey?: string,
 *         ContentType?: array{CsvContentTypes?: list<string>, JsonContentTypes?: list<string>, ...},
 *         ...,
 *     },
 *     ShadowModeConfig?: array{SourceModelVariantName?: string, ShadowModelVariants?: list<array>, ...},
 *     KmsKey?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInferenceRecommendationsJob(array $args = [])
 * @phpstan-method \Aws\Result createInferenceRecommendationsJob(array{
 *     JobName?: string,
 *     JobType?: 'Advanced'|'Default',
 *     RoleArn?: string,
 *     InputConfig?: array{
 *         ModelPackageVersionArn?: string,
 *         ModelName?: string,
 *         JobDurationInSeconds?: int,
 *         TrafficPattern?: array{TrafficType?: 'PHASES'|'STAIRS', Phases?: list<array>, Stairs?: array, ...},
 *         ResourceLimit?: array{MaxNumberOfTests?: int, MaxParallelOfTests?: int, ...},
 *         EndpointConfigurations?: list<array>,
 *         VolumeKmsKeyId?: string,
 *         ContainerConfig?: array{
 *             Domain?: string,
 *             Task?: string,
 *             Framework?: string,
 *             FrameworkVersion?: string,
 *             PayloadConfig?: array,
 *             NearestModelName?: string,
 *             SupportedInstanceTypes?: list<string>,
 *             SupportedEndpointType?: 'RealTime'|'Serverless',
 *             DataInputConfig?: string,
 *             SupportedResponseMIMETypes?: list<string>,
 *             ...,
 *         },
 *         Endpoints?: list<array>,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     JobDescription?: string,
 *     StoppingConditions?: array{MaxInvocations?: int, ModelLatencyThresholds?: list<array>, FlatInvocations?: 'Continue'|'Stop', ...},
 *     OutputConfig?: array{KmsKeyId?: string, CompiledOutputConfig?: array{S3OutputUri?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInferenceRecommendationsJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInferenceRecommendationsJobAsync(array{
 *     JobName?: string,
 *     JobType?: 'Advanced'|'Default',
 *     RoleArn?: string,
 *     InputConfig?: array{
 *         ModelPackageVersionArn?: string,
 *         ModelName?: string,
 *         JobDurationInSeconds?: int,
 *         TrafficPattern?: array{TrafficType?: 'PHASES'|'STAIRS', Phases?: list<array>, Stairs?: array, ...},
 *         ResourceLimit?: array{MaxNumberOfTests?: int, MaxParallelOfTests?: int, ...},
 *         EndpointConfigurations?: list<array>,
 *         VolumeKmsKeyId?: string,
 *         ContainerConfig?: array{
 *             Domain?: string,
 *             Task?: string,
 *             Framework?: string,
 *             FrameworkVersion?: string,
 *             PayloadConfig?: array,
 *             NearestModelName?: string,
 *             SupportedInstanceTypes?: list<string>,
 *             SupportedEndpointType?: 'RealTime'|'Serverless',
 *             DataInputConfig?: string,
 *             SupportedResponseMIMETypes?: list<string>,
 *             ...,
 *         },
 *         Endpoints?: list<array>,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     JobDescription?: string,
 *     StoppingConditions?: array{MaxInvocations?: int, ModelLatencyThresholds?: list<array>, FlatInvocations?: 'Continue'|'Stop', ...},
 *     OutputConfig?: array{KmsKeyId?: string, CompiledOutputConfig?: array{S3OutputUri?: string, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @phpstan-method \Aws\Result createJob(array{
 *     JobName?: string,
 *     RoleArn?: string,
 *     JobCategory?: 'AgentRFT'|'AgentRFTEvaluation',
 *     JobConfigSchemaVersion?: string,
 *     JobConfigDocument?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobAsync(array{
 *     JobName?: string,
 *     RoleArn?: string,
 *     JobCategory?: 'AgentRFT'|'AgentRFTEvaluation',
 *     JobConfigSchemaVersion?: string,
 *     JobConfigDocument?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLabelingJob(array $args = [])
 * @phpstan-method \Aws\Result createLabelingJob(array{
 *     LabelingJobName?: string,
 *     LabelAttributeName?: string,
 *     InputConfig?: array{
 *         DataSource?: array{S3DataSource?: array, SnsDataSource?: array, ...},
 *         DataAttributes?: array{ContentClassifiers?: list<'FreeOfAdultContent'|'FreeOfPersonallyIdentifiableInformation'>, ...},
 *         ...,
 *     },
 *     OutputConfig?: array{S3OutputPath?: string, KmsKeyId?: string, SnsTopicArn?: string, ...},
 *     RoleArn?: string,
 *     LabelCategoryConfigS3Uri?: string,
 *     StoppingConditions?: array{MaxHumanLabeledObjectCount?: int, MaxPercentageOfInputDatasetLabeled?: int, ...},
 *     LabelingJobAlgorithmsConfig?: array{
 *         LabelingJobAlgorithmSpecificationArn?: string,
 *         InitialActiveLearningModelArn?: string,
 *         LabelingJobResourceConfig?: array{VolumeKmsKeyId?: string, VpcConfig?: array, ...},
 *         ...,
 *     },
 *     HumanTaskConfig?: array{
 *         WorkteamArn?: string,
 *         UiConfig?: array{UiTemplateS3Uri?: string, HumanTaskUiArn?: string, ...},
 *         PreHumanTaskLambdaArn?: string,
 *         TaskKeywords?: list<string>,
 *         TaskTitle?: string,
 *         TaskDescription?: string,
 *         NumberOfHumanWorkersPerDataObject?: int,
 *         TaskTimeLimitInSeconds?: int,
 *         TaskAvailabilityLifetimeInSeconds?: int,
 *         MaxConcurrentTaskCount?: int,
 *         AnnotationConsolidationConfig?: array{AnnotationConsolidationLambdaArn?: string, ...},
 *         PublicWorkforceTaskPrice?: array{AmountInUsd?: array, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLabelingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLabelingJobAsync(array{
 *     LabelingJobName?: string,
 *     LabelAttributeName?: string,
 *     InputConfig?: array{
 *         DataSource?: array{S3DataSource?: array, SnsDataSource?: array, ...},
 *         DataAttributes?: array{ContentClassifiers?: list<'FreeOfAdultContent'|'FreeOfPersonallyIdentifiableInformation'>, ...},
 *         ...,
 *     },
 *     OutputConfig?: array{S3OutputPath?: string, KmsKeyId?: string, SnsTopicArn?: string, ...},
 *     RoleArn?: string,
 *     LabelCategoryConfigS3Uri?: string,
 *     StoppingConditions?: array{MaxHumanLabeledObjectCount?: int, MaxPercentageOfInputDatasetLabeled?: int, ...},
 *     LabelingJobAlgorithmsConfig?: array{
 *         LabelingJobAlgorithmSpecificationArn?: string,
 *         InitialActiveLearningModelArn?: string,
 *         LabelingJobResourceConfig?: array{VolumeKmsKeyId?: string, VpcConfig?: array, ...},
 *         ...,
 *     },
 *     HumanTaskConfig?: array{
 *         WorkteamArn?: string,
 *         UiConfig?: array{UiTemplateS3Uri?: string, HumanTaskUiArn?: string, ...},
 *         PreHumanTaskLambdaArn?: string,
 *         TaskKeywords?: list<string>,
 *         TaskTitle?: string,
 *         TaskDescription?: string,
 *         NumberOfHumanWorkersPerDataObject?: int,
 *         TaskTimeLimitInSeconds?: int,
 *         TaskAvailabilityLifetimeInSeconds?: int,
 *         MaxConcurrentTaskCount?: int,
 *         AnnotationConsolidationConfig?: array{AnnotationConsolidationLambdaArn?: string, ...},
 *         PublicWorkforceTaskPrice?: array{AmountInUsd?: array, ...},
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMlflowApp(array $args = [])
 * @phpstan-method \Aws\Result createMlflowApp(array{
 *     Name?: string,
 *     ArtifactStoreUri?: string,
 *     RoleArn?: string,
 *     ModelRegistrationMode?: 'AutoModelRegistrationDisabled'|'AutoModelRegistrationEnabled',
 *     WeeklyMaintenanceWindowStart?: string,
 *     AccountDefaultStatus?: 'DISABLED'|'ENABLED',
 *     DefaultDomainIdList?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMlflowAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMlflowAppAsync(array{
 *     Name?: string,
 *     ArtifactStoreUri?: string,
 *     RoleArn?: string,
 *     ModelRegistrationMode?: 'AutoModelRegistrationDisabled'|'AutoModelRegistrationEnabled',
 *     WeeklyMaintenanceWindowStart?: string,
 *     AccountDefaultStatus?: 'DISABLED'|'ENABLED',
 *     DefaultDomainIdList?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMlflowTrackingServer(array $args = [])
 * @phpstan-method \Aws\Result createMlflowTrackingServer(array{
 *     TrackingServerName?: string,
 *     ArtifactStoreUri?: string,
 *     TrackingServerSize?: 'Large'|'Medium'|'Small',
 *     MlflowVersion?: string,
 *     RoleArn?: string,
 *     AutomaticModelRegistration?: bool,
 *     WeeklyMaintenanceWindowStart?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     S3BucketOwnerAccountId?: string,
 *     S3BucketOwnerVerification?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMlflowTrackingServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMlflowTrackingServerAsync(array{
 *     TrackingServerName?: string,
 *     ArtifactStoreUri?: string,
 *     TrackingServerSize?: 'Large'|'Medium'|'Small',
 *     MlflowVersion?: string,
 *     RoleArn?: string,
 *     AutomaticModelRegistration?: bool,
 *     WeeklyMaintenanceWindowStart?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     S3BucketOwnerAccountId?: string,
 *     S3BucketOwnerVerification?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModel(array $args = [])
 * @phpstan-method \Aws\Result createModel(array{
 *     ModelName?: string,
 *     PrimaryContainer?: array{
 *         ContainerHostname?: string,
 *         Image?: string,
 *         ImageConfig?: array{RepositoryAccessMode?: 'Platform'|'Vpc', RepositoryAuthConfig?: array, ...},
 *         Mode?: 'MultiModel'|'SingleModel',
 *         ModelDataUrl?: string,
 *         ModelDataSource?: array{S3DataSource?: array, ...},
 *         AdditionalModelDataSources?: list<array>,
 *         Environment?: array<string, string>,
 *         ModelPackageName?: string,
 *         InferenceSpecificationName?: string,
 *         MultiModelConfig?: array{ModelCacheSetting?: 'Disabled'|'Enabled', ...},
 *         ContainerMetricsConfig?: array{MetricsEndpoints?: list<array>, ...},
 *         ...,
 *     },
 *     Containers?: list<array{
 *         ContainerHostname?: string,
 *         Image?: string,
 *         ImageConfig?: array,
 *         Mode?: 'MultiModel'|'SingleModel',
 *         ModelDataUrl?: string,
 *         ModelDataSource?: array,
 *         AdditionalModelDataSources?: list<array>,
 *         Environment?: array<string, string>,
 *         ModelPackageName?: string,
 *         InferenceSpecificationName?: string,
 *         MultiModelConfig?: array,
 *         ContainerMetricsConfig?: array,
 *         ...,
 *     }>,
 *     InferenceExecutionConfig?: array{Mode?: 'Direct'|'Serial', ...},
 *     ExecutionRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     EnableNetworkIsolation?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelAsync(array{
 *     ModelName?: string,
 *     PrimaryContainer?: array{
 *         ContainerHostname?: string,
 *         Image?: string,
 *         ImageConfig?: array{RepositoryAccessMode?: 'Platform'|'Vpc', RepositoryAuthConfig?: array, ...},
 *         Mode?: 'MultiModel'|'SingleModel',
 *         ModelDataUrl?: string,
 *         ModelDataSource?: array{S3DataSource?: array, ...},
 *         AdditionalModelDataSources?: list<array>,
 *         Environment?: array<string, string>,
 *         ModelPackageName?: string,
 *         InferenceSpecificationName?: string,
 *         MultiModelConfig?: array{ModelCacheSetting?: 'Disabled'|'Enabled', ...},
 *         ContainerMetricsConfig?: array{MetricsEndpoints?: list<array>, ...},
 *         ...,
 *     },
 *     Containers?: list<array{
 *         ContainerHostname?: string,
 *         Image?: string,
 *         ImageConfig?: array,
 *         Mode?: 'MultiModel'|'SingleModel',
 *         ModelDataUrl?: string,
 *         ModelDataSource?: array,
 *         AdditionalModelDataSources?: list<array>,
 *         Environment?: array<string, string>,
 *         ModelPackageName?: string,
 *         InferenceSpecificationName?: string,
 *         MultiModelConfig?: array,
 *         ContainerMetricsConfig?: array,
 *         ...,
 *     }>,
 *     InferenceExecutionConfig?: array{Mode?: 'Direct'|'Serial', ...},
 *     ExecutionRoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     EnableNetworkIsolation?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelBiasJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result createModelBiasJobDefinition(array{
 *     JobDefinitionName?: string,
 *     ModelBiasBaselineConfig?: array{BaseliningJobName?: string, ConstraintsResource?: array{S3Uri?: string, ...}, ...},
 *     ModelBiasAppSpecification?: array{ImageUri?: string, ConfigUri?: string, Environment?: array<string, string>, ...},
 *     ModelBiasJobInput?: array{
 *         EndpointInput?: array{
 *             EndpointName?: string,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         BatchTransformInput?: array{
 *             DataCapturedDestinationS3Uri?: string,
 *             DatasetFormat?: array,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         GroundTruthS3Input?: array{S3Uri?: string, ...},
 *         ...,
 *     },
 *     ModelBiasJobOutputConfig?: array{MonitoringOutputs?: list<array>, KmsKeyId?: string, ...},
 *     JobResources?: array{
 *         ClusterConfig?: array{
 *             InstanceCount?: int,
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     NetworkConfig?: array{
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableNetworkIsolation?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelBiasJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelBiasJobDefinitionAsync(array{
 *     JobDefinitionName?: string,
 *     ModelBiasBaselineConfig?: array{BaseliningJobName?: string, ConstraintsResource?: array{S3Uri?: string, ...}, ...},
 *     ModelBiasAppSpecification?: array{ImageUri?: string, ConfigUri?: string, Environment?: array<string, string>, ...},
 *     ModelBiasJobInput?: array{
 *         EndpointInput?: array{
 *             EndpointName?: string,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         BatchTransformInput?: array{
 *             DataCapturedDestinationS3Uri?: string,
 *             DatasetFormat?: array,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         GroundTruthS3Input?: array{S3Uri?: string, ...},
 *         ...,
 *     },
 *     ModelBiasJobOutputConfig?: array{MonitoringOutputs?: list<array>, KmsKeyId?: string, ...},
 *     JobResources?: array{
 *         ClusterConfig?: array{
 *             InstanceCount?: int,
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     NetworkConfig?: array{
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableNetworkIsolation?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelCard(array $args = [])
 * @phpstan-method \Aws\Result createModelCard(array{
 *     ModelCardName?: string,
 *     SecurityConfig?: array{KmsKeyId?: string, ...},
 *     Content?: string,
 *     ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelCardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelCardAsync(array{
 *     ModelCardName?: string,
 *     SecurityConfig?: array{KmsKeyId?: string, ...},
 *     Content?: string,
 *     ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelCardExportJob(array $args = [])
 * @phpstan-method \Aws\Result createModelCardExportJob(array{
 *     ModelCardName?: string,
 *     ModelCardVersion?: int,
 *     ModelCardExportJobName?: string,
 *     OutputConfig?: array{S3OutputPath?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelCardExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelCardExportJobAsync(array{
 *     ModelCardName?: string,
 *     ModelCardVersion?: int,
 *     ModelCardExportJobName?: string,
 *     OutputConfig?: array{S3OutputPath?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelExplainabilityJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result createModelExplainabilityJobDefinition(array{
 *     JobDefinitionName?: string,
 *     ModelExplainabilityBaselineConfig?: array{BaseliningJobName?: string, ConstraintsResource?: array{S3Uri?: string, ...}, ...},
 *     ModelExplainabilityAppSpecification?: array{ImageUri?: string, ConfigUri?: string, Environment?: array<string, string>, ...},
 *     ModelExplainabilityJobInput?: array{
 *         EndpointInput?: array{
 *             EndpointName?: string,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         BatchTransformInput?: array{
 *             DataCapturedDestinationS3Uri?: string,
 *             DatasetFormat?: array,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ModelExplainabilityJobOutputConfig?: array{MonitoringOutputs?: list<array>, KmsKeyId?: string, ...},
 *     JobResources?: array{
 *         ClusterConfig?: array{
 *             InstanceCount?: int,
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     NetworkConfig?: array{
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableNetworkIsolation?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelExplainabilityJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelExplainabilityJobDefinitionAsync(array{
 *     JobDefinitionName?: string,
 *     ModelExplainabilityBaselineConfig?: array{BaseliningJobName?: string, ConstraintsResource?: array{S3Uri?: string, ...}, ...},
 *     ModelExplainabilityAppSpecification?: array{ImageUri?: string, ConfigUri?: string, Environment?: array<string, string>, ...},
 *     ModelExplainabilityJobInput?: array{
 *         EndpointInput?: array{
 *             EndpointName?: string,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         BatchTransformInput?: array{
 *             DataCapturedDestinationS3Uri?: string,
 *             DatasetFormat?: array,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ModelExplainabilityJobOutputConfig?: array{MonitoringOutputs?: list<array>, KmsKeyId?: string, ...},
 *     JobResources?: array{
 *         ClusterConfig?: array{
 *             InstanceCount?: int,
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     NetworkConfig?: array{
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableNetworkIsolation?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelPackage(array $args = [])
 * @phpstan-method \Aws\Result createModelPackage(array{
 *     ModelPackageName?: string,
 *     ModelPackageGroupName?: string,
 *     ModelPackageDescription?: string,
 *     ModelPackageRegistrationType?: 'Logged'|'Registered',
 *     InferenceSpecification?: array{
 *         Containers?: list<array>,
 *         SupportedTransformInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'>,
 *         SupportedRealtimeInferenceInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportedContentTypes?: list<string>,
 *         SupportedResponseMIMETypes?: list<string>,
 *         ...,
 *     },
 *     ValidationSpecification?: array{ValidationRole?: string, ValidationProfiles?: list<array>, ...},
 *     SourceAlgorithmSpecification?: array{SourceAlgorithms?: list<array>, ...},
 *     CertifyForMarketplace?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ModelApprovalStatus?: 'Approved'|'PendingManualApproval'|'Rejected',
 *     MetadataProperties?: array{CommitId?: string, Repository?: string, GeneratedBy?: string, ProjectId?: string, ...},
 *     ModelMetrics?: array{
 *         ModelQuality?: array{Statistics?: array, Constraints?: array, ...},
 *         ModelDataQuality?: array{Statistics?: array, Constraints?: array, ...},
 *         Bias?: array{Report?: array, PreTrainingReport?: array, PostTrainingReport?: array, ...},
 *         Explainability?: array{Report?: array, ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     Domain?: string,
 *     Task?: string,
 *     SamplePayloadUrl?: string,
 *     CustomerMetadataProperties?: array<string, string>,
 *     DriftCheckBaselines?: array{
 *         Bias?: array{ConfigFile?: array, PreTrainingConstraints?: array, PostTrainingConstraints?: array, ...},
 *         Explainability?: array{Constraints?: array, ConfigFile?: array, ...},
 *         ModelQuality?: array{Statistics?: array, Constraints?: array, ...},
 *         ModelDataQuality?: array{Statistics?: array, Constraints?: array, ...},
 *         ...,
 *     },
 *     AdditionalInferenceSpecifications?: list<array{
 *         Name?: string,
 *         Description?: string,
 *         Containers?: list<array>,
 *         SupportedTransformInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'>,
 *         SupportedRealtimeInferenceInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportedContentTypes?: list<string>,
 *         SupportedResponseMIMETypes?: list<string>,
 *         ...,
 *     }>,
 *     SkipModelValidation?: 'All'|'None',
 *     SourceUri?: string,
 *     SecurityConfig?: array{KmsKeyId?: string, ...},
 *     ModelCard?: array{ModelCardContent?: string, ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview', ...},
 *     ModelLifeCycle?: array{Stage?: string, StageStatus?: string, StageDescription?: string, ...},
 *     ManagedStorageType?: 'Restricted',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelPackageAsync(array{
 *     ModelPackageName?: string,
 *     ModelPackageGroupName?: string,
 *     ModelPackageDescription?: string,
 *     ModelPackageRegistrationType?: 'Logged'|'Registered',
 *     InferenceSpecification?: array{
 *         Containers?: list<array>,
 *         SupportedTransformInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'>,
 *         SupportedRealtimeInferenceInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportedContentTypes?: list<string>,
 *         SupportedResponseMIMETypes?: list<string>,
 *         ...,
 *     },
 *     ValidationSpecification?: array{ValidationRole?: string, ValidationProfiles?: list<array>, ...},
 *     SourceAlgorithmSpecification?: array{SourceAlgorithms?: list<array>, ...},
 *     CertifyForMarketplace?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ModelApprovalStatus?: 'Approved'|'PendingManualApproval'|'Rejected',
 *     MetadataProperties?: array{CommitId?: string, Repository?: string, GeneratedBy?: string, ProjectId?: string, ...},
 *     ModelMetrics?: array{
 *         ModelQuality?: array{Statistics?: array, Constraints?: array, ...},
 *         ModelDataQuality?: array{Statistics?: array, Constraints?: array, ...},
 *         Bias?: array{Report?: array, PreTrainingReport?: array, PostTrainingReport?: array, ...},
 *         Explainability?: array{Report?: array, ...},
 *         ...,
 *     },
 *     ClientToken?: string,
 *     Domain?: string,
 *     Task?: string,
 *     SamplePayloadUrl?: string,
 *     CustomerMetadataProperties?: array<string, string>,
 *     DriftCheckBaselines?: array{
 *         Bias?: array{ConfigFile?: array, PreTrainingConstraints?: array, PostTrainingConstraints?: array, ...},
 *         Explainability?: array{Constraints?: array, ConfigFile?: array, ...},
 *         ModelQuality?: array{Statistics?: array, Constraints?: array, ...},
 *         ModelDataQuality?: array{Statistics?: array, Constraints?: array, ...},
 *         ...,
 *     },
 *     AdditionalInferenceSpecifications?: list<array{
 *         Name?: string,
 *         Description?: string,
 *         Containers?: list<array>,
 *         SupportedTransformInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'>,
 *         SupportedRealtimeInferenceInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportedContentTypes?: list<string>,
 *         SupportedResponseMIMETypes?: list<string>,
 *         ...,
 *     }>,
 *     SkipModelValidation?: 'All'|'None',
 *     SourceUri?: string,
 *     SecurityConfig?: array{KmsKeyId?: string, ...},
 *     ModelCard?: array{ModelCardContent?: string, ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview', ...},
 *     ModelLifeCycle?: array{Stage?: string, StageStatus?: string, StageDescription?: string, ...},
 *     ManagedStorageType?: 'Restricted',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelPackageGroup(array $args = [])
 * @phpstan-method \Aws\Result createModelPackageGroup(array{
 *     ModelPackageGroupName?: string,
 *     ModelPackageGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ManagedConfiguration?: array{ManagedStorageType?: 'Restricted', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelPackageGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelPackageGroupAsync(array{
 *     ModelPackageGroupName?: string,
 *     ModelPackageGroupDescription?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ManagedConfiguration?: array{ManagedStorageType?: 'Restricted', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createModelQualityJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result createModelQualityJobDefinition(array{
 *     JobDefinitionName?: string,
 *     ModelQualityBaselineConfig?: array{BaseliningJobName?: string, ConstraintsResource?: array{S3Uri?: string, ...}, ...},
 *     ModelQualityAppSpecification?: array{
 *         ImageUri?: string,
 *         ContainerEntrypoint?: list<string>,
 *         ContainerArguments?: list<string>,
 *         RecordPreprocessorSourceUri?: string,
 *         PostAnalyticsProcessorSourceUri?: string,
 *         ProblemType?: 'BinaryClassification'|'MulticlassClassification'|'Regression',
 *         Environment?: array<string, string>,
 *         ...,
 *     },
 *     ModelQualityJobInput?: array{
 *         EndpointInput?: array{
 *             EndpointName?: string,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         BatchTransformInput?: array{
 *             DataCapturedDestinationS3Uri?: string,
 *             DatasetFormat?: array,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         GroundTruthS3Input?: array{S3Uri?: string, ...},
 *         ...,
 *     },
 *     ModelQualityJobOutputConfig?: array{MonitoringOutputs?: list<array>, KmsKeyId?: string, ...},
 *     JobResources?: array{
 *         ClusterConfig?: array{
 *             InstanceCount?: int,
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     NetworkConfig?: array{
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableNetworkIsolation?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createModelQualityJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createModelQualityJobDefinitionAsync(array{
 *     JobDefinitionName?: string,
 *     ModelQualityBaselineConfig?: array{BaseliningJobName?: string, ConstraintsResource?: array{S3Uri?: string, ...}, ...},
 *     ModelQualityAppSpecification?: array{
 *         ImageUri?: string,
 *         ContainerEntrypoint?: list<string>,
 *         ContainerArguments?: list<string>,
 *         RecordPreprocessorSourceUri?: string,
 *         PostAnalyticsProcessorSourceUri?: string,
 *         ProblemType?: 'BinaryClassification'|'MulticlassClassification'|'Regression',
 *         Environment?: array<string, string>,
 *         ...,
 *     },
 *     ModelQualityJobInput?: array{
 *         EndpointInput?: array{
 *             EndpointName?: string,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         BatchTransformInput?: array{
 *             DataCapturedDestinationS3Uri?: string,
 *             DatasetFormat?: array,
 *             LocalPath?: string,
 *             S3InputMode?: 'File'|'Pipe',
 *             S3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *             FeaturesAttribute?: string,
 *             InferenceAttribute?: string,
 *             ProbabilityAttribute?: string,
 *             ProbabilityThresholdAttribute?: float,
 *             StartTimeOffset?: string,
 *             EndTimeOffset?: string,
 *             ExcludeFeaturesAttribute?: string,
 *             ...,
 *         },
 *         GroundTruthS3Input?: array{S3Uri?: string, ...},
 *         ...,
 *     },
 *     ModelQualityJobOutputConfig?: array{MonitoringOutputs?: list<array>, KmsKeyId?: string, ...},
 *     JobResources?: array{
 *         ClusterConfig?: array{
 *             InstanceCount?: int,
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     NetworkConfig?: array{
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableNetworkIsolation?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMonitoringSchedule(array $args = [])
 * @phpstan-method \Aws\Result createMonitoringSchedule(array{
 *     MonitoringScheduleName?: string,
 *     MonitoringScheduleConfig?: array{
 *         ScheduleConfig?: array{ScheduleExpression?: string, DataAnalysisStartTime?: string, DataAnalysisEndTime?: string, ...},
 *         MonitoringJobDefinition?: array{
 *             BaselineConfig?: array,
 *             MonitoringInputs?: list<array>,
 *             MonitoringOutputConfig?: array,
 *             MonitoringResources?: array,
 *             MonitoringAppSpecification?: array,
 *             StoppingCondition?: array,
 *             Environment?: array<string, string>,
 *             NetworkConfig?: array,
 *             RoleArn?: string,
 *             ...,
 *         },
 *         MonitoringJobDefinitionName?: string,
 *         MonitoringType?: 'DataQuality'|'ModelBias'|'ModelExplainability'|'ModelQuality',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMonitoringScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMonitoringScheduleAsync(array{
 *     MonitoringScheduleName?: string,
 *     MonitoringScheduleConfig?: array{
 *         ScheduleConfig?: array{ScheduleExpression?: string, DataAnalysisStartTime?: string, DataAnalysisEndTime?: string, ...},
 *         MonitoringJobDefinition?: array{
 *             BaselineConfig?: array,
 *             MonitoringInputs?: list<array>,
 *             MonitoringOutputConfig?: array,
 *             MonitoringResources?: array,
 *             MonitoringAppSpecification?: array,
 *             StoppingCondition?: array,
 *             Environment?: array<string, string>,
 *             NetworkConfig?: array,
 *             RoleArn?: string,
 *             ...,
 *         },
 *         MonitoringJobDefinitionName?: string,
 *         MonitoringType?: 'DataQuality'|'ModelBias'|'ModelExplainability'|'ModelQuality',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNotebookInstance(array $args = [])
 * @phpstan-method \Aws\Result createNotebookInstance(array{
 *     NotebookInstanceName?: string,
 *     InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge',
 *     SubnetId?: string,
 *     SecurityGroupIds?: list<string>,
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     RoleArn?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     LifecycleConfigName?: string,
 *     DirectInternetAccess?: 'Disabled'|'Enabled',
 *     VolumeSizeInGB?: int,
 *     AcceleratorTypes?: list<'ml.eia1.large'|'ml.eia1.medium'|'ml.eia1.xlarge'|'ml.eia2.large'|'ml.eia2.medium'|'ml.eia2.xlarge'>,
 *     DefaultCodeRepository?: string,
 *     AdditionalCodeRepositories?: list<string>,
 *     RootAccess?: 'Disabled'|'Enabled',
 *     PlatformIdentifier?: string,
 *     InstanceMetadataServiceConfiguration?: array{MinimumInstanceMetadataServiceVersion?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotebookInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotebookInstanceAsync(array{
 *     NotebookInstanceName?: string,
 *     InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge',
 *     SubnetId?: string,
 *     SecurityGroupIds?: list<string>,
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     RoleArn?: string,
 *     KmsKeyId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     LifecycleConfigName?: string,
 *     DirectInternetAccess?: 'Disabled'|'Enabled',
 *     VolumeSizeInGB?: int,
 *     AcceleratorTypes?: list<'ml.eia1.large'|'ml.eia1.medium'|'ml.eia1.xlarge'|'ml.eia2.large'|'ml.eia2.medium'|'ml.eia2.xlarge'>,
 *     DefaultCodeRepository?: string,
 *     AdditionalCodeRepositories?: list<string>,
 *     RootAccess?: 'Disabled'|'Enabled',
 *     PlatformIdentifier?: string,
 *     InstanceMetadataServiceConfiguration?: array{MinimumInstanceMetadataServiceVersion?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNotebookInstanceLifecycleConfig(array $args = [])
 * @phpstan-method \Aws\Result createNotebookInstanceLifecycleConfig(array{
 *     NotebookInstanceLifecycleConfigName?: string,
 *     OnCreate?: list<array{Content?: string, ...}>,
 *     OnStart?: list<array{Content?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotebookInstanceLifecycleConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotebookInstanceLifecycleConfigAsync(array{
 *     NotebookInstanceLifecycleConfigName?: string,
 *     OnCreate?: list<array{Content?: string, ...}>,
 *     OnStart?: list<array{Content?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOptimizationJob(array $args = [])
 * @phpstan-method \Aws\Result createOptimizationJob(array{
 *     OptimizationJobName?: string,
 *     RoleArn?: string,
 *     ModelSource?: array{
 *         S3?: array{S3Uri?: string, ModelAccessConfig?: array, ...},
 *         SageMakerModel?: array{ModelName?: string, ...},
 *         ...,
 *     },
 *     DeploymentInstanceType?: 'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge',
 *     MaxInstanceCount?: int,
 *     OptimizationEnvironment?: array<string, string>,
 *     OptimizationConfigs?: list<array{
 *         ModelQuantizationConfig?: array,
 *         ModelCompilationConfig?: array,
 *         ModelShardingConfig?: array,
 *         ModelSpeculativeDecodingConfig?: array,
 *         ...,
 *     }>,
 *     OutputConfig?: array{KmsKeyId?: string, S3OutputLocation?: string, SageMakerModel?: array{ModelName?: string, ...}, ...},
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, MaxWaitTimeInSeconds?: int, MaxPendingTimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOptimizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOptimizationJobAsync(array{
 *     OptimizationJobName?: string,
 *     RoleArn?: string,
 *     ModelSource?: array{
 *         S3?: array{S3Uri?: string, ModelAccessConfig?: array, ...},
 *         SageMakerModel?: array{ModelName?: string, ...},
 *         ...,
 *     },
 *     DeploymentInstanceType?: 'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge',
 *     MaxInstanceCount?: int,
 *     OptimizationEnvironment?: array<string, string>,
 *     OptimizationConfigs?: list<array{
 *         ModelQuantizationConfig?: array,
 *         ModelCompilationConfig?: array,
 *         ModelShardingConfig?: array,
 *         ModelSpeculativeDecodingConfig?: array,
 *         ...,
 *     }>,
 *     OutputConfig?: array{KmsKeyId?: string, S3OutputLocation?: string, SageMakerModel?: array{ModelName?: string, ...}, ...},
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, MaxWaitTimeInSeconds?: int, MaxPendingTimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPartnerApp(array $args = [])
 * @phpstan-method \Aws\Result createPartnerApp(array{
 *     Name?: string,
 *     Type?: 'comet'|'deepchecks-llm-evaluation'|'fiddler'|'lakera-guard',
 *     ExecutionRoleArn?: string,
 *     KmsKeyId?: string,
 *     MaintenanceConfig?: array{MaintenanceWindowStart?: string, ...},
 *     Tier?: string,
 *     ApplicationConfig?: array{
 *         AdminUsers?: list<string>,
 *         Arguments?: array<string, string>,
 *         AssignedGroupPatterns?: list<string>,
 *         RoleGroupAssignments?: list<array>,
 *         ...,
 *     },
 *     AuthType?: 'IAM',
 *     EnableIamSessionBasedIdentity?: bool,
 *     EnableAutoMinorVersionUpgrade?: bool,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPartnerAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPartnerAppAsync(array{
 *     Name?: string,
 *     Type?: 'comet'|'deepchecks-llm-evaluation'|'fiddler'|'lakera-guard',
 *     ExecutionRoleArn?: string,
 *     KmsKeyId?: string,
 *     MaintenanceConfig?: array{MaintenanceWindowStart?: string, ...},
 *     Tier?: string,
 *     ApplicationConfig?: array{
 *         AdminUsers?: list<string>,
 *         Arguments?: array<string, string>,
 *         AssignedGroupPatterns?: list<string>,
 *         RoleGroupAssignments?: list<array>,
 *         ...,
 *     },
 *     AuthType?: 'IAM',
 *     EnableIamSessionBasedIdentity?: bool,
 *     EnableAutoMinorVersionUpgrade?: bool,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPartnerAppPresignedUrl(array $args = [])
 * @phpstan-method \Aws\Result createPartnerAppPresignedUrl(array{Arn?: string, ExpiresInSeconds?: int, SessionExpirationDurationInSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPartnerAppPresignedUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPartnerAppPresignedUrlAsync(array{Arn?: string, ExpiresInSeconds?: int, SessionExpirationDurationInSeconds?: int, ...} $args = [])
 * @method \Aws\Result createPipeline(array $args = [])
 * @phpstan-method \Aws\Result createPipeline(array{
 *     PipelineName?: string,
 *     PipelineDisplayName?: string,
 *     PipelineDefinition?: string,
 *     PipelineDefinitionS3Location?: array{Bucket?: string, ObjectKey?: string, VersionId?: string, ...},
 *     PipelineDescription?: string,
 *     ClientRequestToken?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ParallelismConfiguration?: array{MaxParallelExecutionSteps?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPipelineAsync(array{
 *     PipelineName?: string,
 *     PipelineDisplayName?: string,
 *     PipelineDefinition?: string,
 *     PipelineDefinitionS3Location?: array{Bucket?: string, ObjectKey?: string, VersionId?: string, ...},
 *     PipelineDescription?: string,
 *     ClientRequestToken?: string,
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ParallelismConfiguration?: array{MaxParallelExecutionSteps?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPresignedDomainUrl(array $args = [])
 * @phpstan-method \Aws\Result createPresignedDomainUrl(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     SessionExpirationDurationInSeconds?: int,
 *     ExpiresInSeconds?: int,
 *     SpaceName?: string,
 *     LandingUri?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPresignedDomainUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPresignedDomainUrlAsync(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     SessionExpirationDurationInSeconds?: int,
 *     ExpiresInSeconds?: int,
 *     SpaceName?: string,
 *     LandingUri?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPresignedMlflowAppUrl(array $args = [])
 * @phpstan-method \Aws\Result createPresignedMlflowAppUrl(array{Arn?: string, ExpiresInSeconds?: int, SessionExpirationDurationInSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPresignedMlflowAppUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPresignedMlflowAppUrlAsync(array{Arn?: string, ExpiresInSeconds?: int, SessionExpirationDurationInSeconds?: int, ...} $args = [])
 * @method \Aws\Result createPresignedMlflowTrackingServerUrl(array $args = [])
 * @phpstan-method \Aws\Result createPresignedMlflowTrackingServerUrl(array{TrackingServerName?: string, ExpiresInSeconds?: int, SessionExpirationDurationInSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPresignedMlflowTrackingServerUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPresignedMlflowTrackingServerUrlAsync(array{TrackingServerName?: string, ExpiresInSeconds?: int, SessionExpirationDurationInSeconds?: int, ...} $args = [])
 * @method \Aws\Result createPresignedNotebookInstanceUrl(array $args = [])
 * @phpstan-method \Aws\Result createPresignedNotebookInstanceUrl(array{NotebookInstanceName?: string, SessionExpirationDurationInSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPresignedNotebookInstanceUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPresignedNotebookInstanceUrlAsync(array{NotebookInstanceName?: string, SessionExpirationDurationInSeconds?: int, ...} $args = [])
 * @method \Aws\Result createProcessingJob(array $args = [])
 * @phpstan-method \Aws\Result createProcessingJob(array{
 *     ProcessingInputs?: list<array{InputName?: string, AppManaged?: bool, S3Input?: array, DatasetDefinition?: array, ...}>,
 *     ProcessingOutputConfig?: array{Outputs?: list<array>, KmsKeyId?: string, ...},
 *     ProcessingJobName?: string,
 *     ProcessingResources?: array{
 *         ClusterConfig?: array{
 *             InstanceCount?: int,
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, ...},
 *     AppSpecification?: array{ImageUri?: string, ContainerEntrypoint?: list<string>, ContainerArguments?: list<string>, ...},
 *     Environment?: array<string, string>,
 *     NetworkConfig?: array{
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableNetworkIsolation?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ExperimentConfig?: array{ExperimentName?: string, TrialName?: string, TrialComponentDisplayName?: string, RunName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProcessingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProcessingJobAsync(array{
 *     ProcessingInputs?: list<array{InputName?: string, AppManaged?: bool, S3Input?: array, DatasetDefinition?: array, ...}>,
 *     ProcessingOutputConfig?: array{Outputs?: list<array>, KmsKeyId?: string, ...},
 *     ProcessingJobName?: string,
 *     ProcessingResources?: array{
 *         ClusterConfig?: array{
 *             InstanceCount?: int,
 *             InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *             VolumeSizeInGB?: int,
 *             VolumeKmsKeyId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, ...},
 *     AppSpecification?: array{ImageUri?: string, ContainerEntrypoint?: list<string>, ContainerArguments?: list<string>, ...},
 *     Environment?: array<string, string>,
 *     NetworkConfig?: array{
 *         EnableInterContainerTrafficEncryption?: bool,
 *         EnableNetworkIsolation?: bool,
 *         VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ExperimentConfig?: array{ExperimentName?: string, TrialName?: string, TrialComponentDisplayName?: string, RunName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @phpstan-method \Aws\Result createProject(array{
 *     ProjectName?: string,
 *     ProjectDescription?: string,
 *     ServiceCatalogProvisioningDetails?: array{
 *         ProductId?: string,
 *         ProvisioningArtifactId?: string,
 *         PathId?: string,
 *         ProvisioningParameters?: list<array>,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TemplateProviders?: list<array{CfnTemplateProvider?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectAsync(array{
 *     ProjectName?: string,
 *     ProjectDescription?: string,
 *     ServiceCatalogProvisioningDetails?: array{
 *         ProductId?: string,
 *         ProvisioningArtifactId?: string,
 *         PathId?: string,
 *         ProvisioningParameters?: list<array>,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TemplateProviders?: list<array{CfnTemplateProvider?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSpace(array $args = [])
 * @phpstan-method \Aws\Result createSpace(array{
 *     DomainId?: string,
 *     SpaceName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SpaceSettings?: array{
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         CodeEditorAppSettings?: array{DefaultResourceSpec?: array, AppLifecycleManagement?: array, ...},
 *         JupyterLabAppSettings?: array{DefaultResourceSpec?: array, CodeRepositories?: list<array>, AppLifecycleManagement?: array, ...},
 *         AppType?: 'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard',
 *         SpaceStorageSettings?: array{EbsStorageSettings?: array, ...},
 *         SpaceManagedResources?: 'DISABLED'|'ENABLED',
 *         CustomFileSystems?: list<array>,
 *         RemoteAccess?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     OwnershipSettings?: array{OwnerUserProfileName?: string, ...},
 *     SpaceSharingSettings?: array{SharingType?: 'Private'|'Shared', ...},
 *     SpaceDisplayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSpaceAsync(array{
 *     DomainId?: string,
 *     SpaceName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     SpaceSettings?: array{
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         CodeEditorAppSettings?: array{DefaultResourceSpec?: array, AppLifecycleManagement?: array, ...},
 *         JupyterLabAppSettings?: array{DefaultResourceSpec?: array, CodeRepositories?: list<array>, AppLifecycleManagement?: array, ...},
 *         AppType?: 'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard',
 *         SpaceStorageSettings?: array{EbsStorageSettings?: array, ...},
 *         SpaceManagedResources?: 'DISABLED'|'ENABLED',
 *         CustomFileSystems?: list<array>,
 *         RemoteAccess?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     OwnershipSettings?: array{OwnerUserProfileName?: string, ...},
 *     SpaceSharingSettings?: array{SharingType?: 'Private'|'Shared', ...},
 *     SpaceDisplayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStudioLifecycleConfig(array $args = [])
 * @phpstan-method \Aws\Result createStudioLifecycleConfig(array{
 *     StudioLifecycleConfigName?: string,
 *     StudioLifecycleConfigContent?: string,
 *     StudioLifecycleConfigAppType?: 'CodeEditor'|'JupyterLab'|'JupyterServer'|'KernelGateway',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStudioLifecycleConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStudioLifecycleConfigAsync(array{
 *     StudioLifecycleConfigName?: string,
 *     StudioLifecycleConfigContent?: string,
 *     StudioLifecycleConfigAppType?: 'CodeEditor'|'JupyterLab'|'JupyterServer'|'KernelGateway',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrainingJob(array $args = [])
 * @phpstan-method \Aws\Result createTrainingJob(array{
 *     TrainingJobName?: string,
 *     HyperParameters?: array<string, string>,
 *     AlgorithmSpecification?: array{
 *         TrainingImage?: string,
 *         AlgorithmName?: string,
 *         TrainingInputMode?: 'FastFile'|'File'|'Pipe',
 *         MetricDefinitions?: list<array>,
 *         EnableSageMakerMetricsTimeSeries?: bool,
 *         ContainerEntrypoint?: list<string>,
 *         ContainerArguments?: list<string>,
 *         TrainingImageConfig?: array{TrainingRepositoryAccessMode?: 'Platform'|'Vpc', TrainingRepositoryAuthConfig?: array, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     InputDataConfig?: list<array{
 *         ChannelName?: string,
 *         DataSource?: array,
 *         ContentType?: string,
 *         CompressionType?: 'Gzip'|'None',
 *         RecordWrapperType?: 'None'|'RecordIO',
 *         InputMode?: 'FastFile'|'File'|'Pipe',
 *         ShuffleConfig?: array,
 *         ...,
 *     }>,
 *     OutputDataConfig?: array{KmsKeyId?: string, S3OutputPath?: string, CompressionType?: 'GZIP'|'NONE', ...},
 *     ResourceConfig?: array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         InstanceCount?: int,
 *         VolumeSizeInGB?: int,
 *         VolumeKmsKeyId?: string,
 *         KeepAlivePeriodInSeconds?: int,
 *         InstanceGroups?: list<array>,
 *         TrainingPlanArn?: string,
 *         InstancePlacementConfig?: array{EnableMultipleJobs?: bool, PlacementSpecifications?: list<array>, ...},
 *         ...,
 *     },
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, MaxWaitTimeInSeconds?: int, MaxPendingTimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EnableNetworkIsolation?: bool,
 *     EnableInterContainerTrafficEncryption?: bool,
 *     EnableManagedSpotTraining?: bool,
 *     CheckpointConfig?: array{S3Uri?: string, LocalPath?: string, ...},
 *     DebugHookConfig?: array{
 *         LocalPath?: string,
 *         S3OutputPath?: string,
 *         HookParameters?: array<string, string>,
 *         CollectionConfigurations?: list<array>,
 *         ...,
 *     },
 *     DebugRuleConfigurations?: list<array{
 *         RuleConfigurationName?: string,
 *         LocalPath?: string,
 *         S3OutputPath?: string,
 *         RuleEvaluatorImage?: string,
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *         VolumeSizeInGB?: int,
 *         RuleParameters?: array<string, string>,
 *         ...,
 *     }>,
 *     TensorBoardOutputConfig?: array{LocalPath?: string, S3OutputPath?: string, ...},
 *     ExperimentConfig?: array{ExperimentName?: string, TrialName?: string, TrialComponentDisplayName?: string, RunName?: string, ...},
 *     ProfilerConfig?: array{
 *         S3OutputPath?: string,
 *         ProfilingIntervalInMilliseconds?: int,
 *         ProfilingParameters?: array<string, string>,
 *         DisableProfiler?: bool,
 *         ...,
 *     },
 *     ProfilerRuleConfigurations?: list<array{
 *         RuleConfigurationName?: string,
 *         LocalPath?: string,
 *         S3OutputPath?: string,
 *         RuleEvaluatorImage?: string,
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *         VolumeSizeInGB?: int,
 *         RuleParameters?: array<string, string>,
 *         ...,
 *     }>,
 *     Environment?: array<string, string>,
 *     RetryStrategy?: array{MaximumRetryAttempts?: int, ...},
 *     RemoteDebugConfig?: array{EnableRemoteDebug?: bool, ...},
 *     InfraCheckConfig?: array{EnableInfraCheck?: bool, ...},
 *     SessionChainingConfig?: array{EnableSessionTagChaining?: bool, ...},
 *     ServerlessJobConfig?: array{
 *         BaseModelArn?: string,
 *         AcceptEula?: bool,
 *         JobType?: 'Evaluation'|'FineTuning',
 *         CustomizationTechnique?: 'DPO'|'RLAIF'|'RLVR'|'SFT',
 *         Peft?: 'LORA',
 *         EvaluationType?: 'BenchmarkEvaluation'|'CustomScorerEvaluation'|'LLMAJEvaluation',
 *         EvaluatorArn?: string,
 *         ...,
 *     },
 *     MlflowConfig?: array{MlflowResourceArn?: string, MlflowExperimentName?: string, MlflowRunName?: string, ...},
 *     ModelPackageConfig?: array{ModelPackageGroupArn?: string, SourceModelPackageArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrainingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrainingJobAsync(array{
 *     TrainingJobName?: string,
 *     HyperParameters?: array<string, string>,
 *     AlgorithmSpecification?: array{
 *         TrainingImage?: string,
 *         AlgorithmName?: string,
 *         TrainingInputMode?: 'FastFile'|'File'|'Pipe',
 *         MetricDefinitions?: list<array>,
 *         EnableSageMakerMetricsTimeSeries?: bool,
 *         ContainerEntrypoint?: list<string>,
 *         ContainerArguments?: list<string>,
 *         TrainingImageConfig?: array{TrainingRepositoryAccessMode?: 'Platform'|'Vpc', TrainingRepositoryAuthConfig?: array, ...},
 *         ...,
 *     },
 *     RoleArn?: string,
 *     InputDataConfig?: list<array{
 *         ChannelName?: string,
 *         DataSource?: array,
 *         ContentType?: string,
 *         CompressionType?: 'Gzip'|'None',
 *         RecordWrapperType?: 'None'|'RecordIO',
 *         InputMode?: 'FastFile'|'File'|'Pipe',
 *         ShuffleConfig?: array,
 *         ...,
 *     }>,
 *     OutputDataConfig?: array{KmsKeyId?: string, S3OutputPath?: string, CompressionType?: 'GZIP'|'NONE', ...},
 *     ResourceConfig?: array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         InstanceCount?: int,
 *         VolumeSizeInGB?: int,
 *         VolumeKmsKeyId?: string,
 *         KeepAlivePeriodInSeconds?: int,
 *         InstanceGroups?: list<array>,
 *         TrainingPlanArn?: string,
 *         InstancePlacementConfig?: array{EnableMultipleJobs?: bool, PlacementSpecifications?: list<array>, ...},
 *         ...,
 *     },
 *     VpcConfig?: array{SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     StoppingCondition?: array{MaxRuntimeInSeconds?: int, MaxWaitTimeInSeconds?: int, MaxPendingTimeInSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     EnableNetworkIsolation?: bool,
 *     EnableInterContainerTrafficEncryption?: bool,
 *     EnableManagedSpotTraining?: bool,
 *     CheckpointConfig?: array{S3Uri?: string, LocalPath?: string, ...},
 *     DebugHookConfig?: array{
 *         LocalPath?: string,
 *         S3OutputPath?: string,
 *         HookParameters?: array<string, string>,
 *         CollectionConfigurations?: list<array>,
 *         ...,
 *     },
 *     DebugRuleConfigurations?: list<array{
 *         RuleConfigurationName?: string,
 *         LocalPath?: string,
 *         S3OutputPath?: string,
 *         RuleEvaluatorImage?: string,
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *         VolumeSizeInGB?: int,
 *         RuleParameters?: array<string, string>,
 *         ...,
 *     }>,
 *     TensorBoardOutputConfig?: array{LocalPath?: string, S3OutputPath?: string, ...},
 *     ExperimentConfig?: array{ExperimentName?: string, TrialName?: string, TrialComponentDisplayName?: string, RunName?: string, ...},
 *     ProfilerConfig?: array{
 *         S3OutputPath?: string,
 *         ProfilingIntervalInMilliseconds?: int,
 *         ProfilingParameters?: array<string, string>,
 *         DisableProfiler?: bool,
 *         ...,
 *     },
 *     ProfilerRuleConfigurations?: list<array{
 *         RuleConfigurationName?: string,
 *         LocalPath?: string,
 *         S3OutputPath?: string,
 *         RuleEvaluatorImage?: string,
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *         VolumeSizeInGB?: int,
 *         RuleParameters?: array<string, string>,
 *         ...,
 *     }>,
 *     Environment?: array<string, string>,
 *     RetryStrategy?: array{MaximumRetryAttempts?: int, ...},
 *     RemoteDebugConfig?: array{EnableRemoteDebug?: bool, ...},
 *     InfraCheckConfig?: array{EnableInfraCheck?: bool, ...},
 *     SessionChainingConfig?: array{EnableSessionTagChaining?: bool, ...},
 *     ServerlessJobConfig?: array{
 *         BaseModelArn?: string,
 *         AcceptEula?: bool,
 *         JobType?: 'Evaluation'|'FineTuning',
 *         CustomizationTechnique?: 'DPO'|'RLAIF'|'RLVR'|'SFT',
 *         Peft?: 'LORA',
 *         EvaluationType?: 'BenchmarkEvaluation'|'CustomScorerEvaluation'|'LLMAJEvaluation',
 *         EvaluatorArn?: string,
 *         ...,
 *     },
 *     MlflowConfig?: array{MlflowResourceArn?: string, MlflowExperimentName?: string, MlflowRunName?: string, ...},
 *     ModelPackageConfig?: array{ModelPackageGroupArn?: string, SourceModelPackageArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrainingPlan(array $args = [])
 * @phpstan-method \Aws\Result createTrainingPlan(array{
 *     TrainingPlanName?: string,
 *     TrainingPlanOfferingId?: string,
 *     SpareInstanceCountPerUltraServer?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrainingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrainingPlanAsync(array{
 *     TrainingPlanName?: string,
 *     TrainingPlanOfferingId?: string,
 *     SpareInstanceCountPerUltraServer?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTransformJob(array $args = [])
 * @phpstan-method \Aws\Result createTransformJob(array{
 *     TransformJobName?: string,
 *     ModelName?: string,
 *     MaxConcurrentTransforms?: int,
 *     ModelClientConfig?: array{InvocationsTimeoutInSeconds?: int, InvocationsMaxRetries?: int, ...},
 *     MaxPayloadInMB?: int,
 *     BatchStrategy?: 'MultiRecord'|'SingleRecord',
 *     Environment?: array<string, string>,
 *     TransformInput?: array{
 *         DataSource?: array{S3DataSource?: array, ...},
 *         ContentType?: string,
 *         CompressionType?: 'Gzip'|'None',
 *         SplitType?: 'Line'|'None'|'RecordIO'|'TFRecord',
 *         ...,
 *     },
 *     TransformOutput?: array{S3OutputPath?: string, Accept?: string, AssembleWith?: 'Line'|'None', KmsKeyId?: string, ...},
 *     DataCaptureConfig?: array{DestinationS3Uri?: string, KmsKeyId?: string, GenerateInferenceId?: bool, ...},
 *     TransformResources?: array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge',
 *         InstanceCount?: int,
 *         VolumeKmsKeyId?: string,
 *         TransformAmiVersion?: string,
 *         ...,
 *     },
 *     DataProcessing?: array{InputFilter?: string, OutputFilter?: string, JoinSource?: 'Input'|'None', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ExperimentConfig?: array{ExperimentName?: string, TrialName?: string, TrialComponentDisplayName?: string, RunName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTransformJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTransformJobAsync(array{
 *     TransformJobName?: string,
 *     ModelName?: string,
 *     MaxConcurrentTransforms?: int,
 *     ModelClientConfig?: array{InvocationsTimeoutInSeconds?: int, InvocationsMaxRetries?: int, ...},
 *     MaxPayloadInMB?: int,
 *     BatchStrategy?: 'MultiRecord'|'SingleRecord',
 *     Environment?: array<string, string>,
 *     TransformInput?: array{
 *         DataSource?: array{S3DataSource?: array, ...},
 *         ContentType?: string,
 *         CompressionType?: 'Gzip'|'None',
 *         SplitType?: 'Line'|'None'|'RecordIO'|'TFRecord',
 *         ...,
 *     },
 *     TransformOutput?: array{S3OutputPath?: string, Accept?: string, AssembleWith?: 'Line'|'None', KmsKeyId?: string, ...},
 *     DataCaptureConfig?: array{DestinationS3Uri?: string, KmsKeyId?: string, GenerateInferenceId?: bool, ...},
 *     TransformResources?: array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge',
 *         InstanceCount?: int,
 *         VolumeKmsKeyId?: string,
 *         TransformAmiVersion?: string,
 *         ...,
 *     },
 *     DataProcessing?: array{InputFilter?: string, OutputFilter?: string, JoinSource?: 'Input'|'None', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ExperimentConfig?: array{ExperimentName?: string, TrialName?: string, TrialComponentDisplayName?: string, RunName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrial(array $args = [])
 * @phpstan-method \Aws\Result createTrial(array{
 *     TrialName?: string,
 *     DisplayName?: string,
 *     ExperimentName?: string,
 *     MetadataProperties?: array{CommitId?: string, Repository?: string, GeneratedBy?: string, ProjectId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrialAsync(array{
 *     TrialName?: string,
 *     DisplayName?: string,
 *     ExperimentName?: string,
 *     MetadataProperties?: array{CommitId?: string, Repository?: string, GeneratedBy?: string, ProjectId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrialComponent(array $args = [])
 * @phpstan-method \Aws\Result createTrialComponent(array{
 *     TrialComponentName?: string,
 *     DisplayName?: string,
 *     Status?: array{PrimaryStatus?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping', Message?: string, ...},
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Parameters?: array<string, array{StringValue?: string, NumberValue?: float, ...}>,
 *     InputArtifacts?: array<string, array{MediaType?: string, Value?: string, ...}>,
 *     OutputArtifacts?: array<string, array{MediaType?: string, Value?: string, ...}>,
 *     MetadataProperties?: array{CommitId?: string, Repository?: string, GeneratedBy?: string, ProjectId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrialComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrialComponentAsync(array{
 *     TrialComponentName?: string,
 *     DisplayName?: string,
 *     Status?: array{PrimaryStatus?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping', Message?: string, ...},
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Parameters?: array<string, array{StringValue?: string, NumberValue?: float, ...}>,
 *     InputArtifacts?: array<string, array{MediaType?: string, Value?: string, ...}>,
 *     OutputArtifacts?: array<string, array{MediaType?: string, Value?: string, ...}>,
 *     MetadataProperties?: array{CommitId?: string, Repository?: string, GeneratedBy?: string, ProjectId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserProfile(array $args = [])
 * @phpstan-method \Aws\Result createUserProfile(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     SingleSignOnUserIdentifier?: string,
 *     SingleSignOnUserValue?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UserSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         SharingSettings?: array{NotebookOutputOption?: 'Allowed'|'Disabled', S3OutputPath?: string, S3KmsKeyId?: string, ...},
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         TensorBoardAppSettings?: array{DefaultResourceSpec?: array, ...},
 *         RStudioServerProAppSettings?: array{AccessStatus?: 'DISABLED'|'ENABLED', UserGroup?: 'R_STUDIO_ADMIN'|'R_STUDIO_USER', ...},
 *         RSessionAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, ...},
 *         CanvasAppSettings?: array{
 *             TimeSeriesForecastingSettings?: array,
 *             ModelRegisterSettings?: array,
 *             WorkspaceSettings?: array,
 *             IdentityProviderOAuthSettings?: list<array>,
 *             DirectDeploySettings?: array,
 *             KendraSettings?: array,
 *             GenerativeAiSettings?: array,
 *             EmrServerlessSettings?: array,
 *             ...,
 *         },
 *         CodeEditorAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             AppLifecycleManagement?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         DefaultLandingUri?: string,
 *         StudioWebPortal?: 'DISABLED'|'ENABLED',
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         StudioWebPortalSettings?: array{
 *             HiddenMlTools?: list<'AutoMl'|'Comet'|'DataWrangler'|'Datasets'|'DeepchecksLLMEvaluation'|'EmrClusters'|'Endpoints'|'Evaluators'|'Experiments'|'FeatureStore'|'Fiddler'|'HyperPodClusters'|'InferenceOptimization'|'InferenceRecommender'|'JumpStart'|'LakeraGuard'|'ModelEvaluation'|'Models'|'PerformanceEvaluation'|'Pipelines'|'Projects'|'RunningInstances'|'Training'>,
 *             HiddenAppTypes?: list<'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard'>,
 *             HiddenInstanceTypes?: list<'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.geospatial.interactive'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.micro'|'ml.t3.small'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'system'>,
 *             HiddenSageMakerImageVersionAliases?: list<array>,
 *             ExecutionRoleSessionNameMode?: 'STATIC'|'USER_IDENTITY',
 *             ...,
 *         },
 *         AutoMountHomeEFS?: 'DefaultAsDomain'|'Disabled'|'Enabled',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserProfileAsync(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     SingleSignOnUserIdentifier?: string,
 *     SingleSignOnUserValue?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UserSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         SharingSettings?: array{NotebookOutputOption?: 'Allowed'|'Disabled', S3OutputPath?: string, S3KmsKeyId?: string, ...},
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         TensorBoardAppSettings?: array{DefaultResourceSpec?: array, ...},
 *         RStudioServerProAppSettings?: array{AccessStatus?: 'DISABLED'|'ENABLED', UserGroup?: 'R_STUDIO_ADMIN'|'R_STUDIO_USER', ...},
 *         RSessionAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, ...},
 *         CanvasAppSettings?: array{
 *             TimeSeriesForecastingSettings?: array,
 *             ModelRegisterSettings?: array,
 *             WorkspaceSettings?: array,
 *             IdentityProviderOAuthSettings?: list<array>,
 *             DirectDeploySettings?: array,
 *             KendraSettings?: array,
 *             GenerativeAiSettings?: array,
 *             EmrServerlessSettings?: array,
 *             ...,
 *         },
 *         CodeEditorAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             AppLifecycleManagement?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         DefaultLandingUri?: string,
 *         StudioWebPortal?: 'DISABLED'|'ENABLED',
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         StudioWebPortalSettings?: array{
 *             HiddenMlTools?: list<'AutoMl'|'Comet'|'DataWrangler'|'Datasets'|'DeepchecksLLMEvaluation'|'EmrClusters'|'Endpoints'|'Evaluators'|'Experiments'|'FeatureStore'|'Fiddler'|'HyperPodClusters'|'InferenceOptimization'|'InferenceRecommender'|'JumpStart'|'LakeraGuard'|'ModelEvaluation'|'Models'|'PerformanceEvaluation'|'Pipelines'|'Projects'|'RunningInstances'|'Training'>,
 *             HiddenAppTypes?: list<'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard'>,
 *             HiddenInstanceTypes?: list<'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.geospatial.interactive'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.micro'|'ml.t3.small'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'system'>,
 *             HiddenSageMakerImageVersionAliases?: list<array>,
 *             ExecutionRoleSessionNameMode?: 'STATIC'|'USER_IDENTITY',
 *             ...,
 *         },
 *         AutoMountHomeEFS?: 'DefaultAsDomain'|'Disabled'|'Enabled',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkforce(array $args = [])
 * @phpstan-method \Aws\Result createWorkforce(array{
 *     CognitoConfig?: array{UserPool?: string, ClientId?: string, ...},
 *     OidcConfig?: array{
 *         ClientId?: string,
 *         ClientSecret?: string,
 *         Issuer?: string,
 *         AuthorizationEndpoint?: string,
 *         TokenEndpoint?: string,
 *         UserInfoEndpoint?: string,
 *         LogoutEndpoint?: string,
 *         JwksUri?: string,
 *         Scope?: string,
 *         AuthenticationRequestExtraParams?: array<string, string>,
 *         ...,
 *     },
 *     SourceIpConfig?: array{Cidrs?: list<string>, ...},
 *     WorkforceName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     WorkforceVpcConfig?: array{VpcId?: string, SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkforceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkforceAsync(array{
 *     CognitoConfig?: array{UserPool?: string, ClientId?: string, ...},
 *     OidcConfig?: array{
 *         ClientId?: string,
 *         ClientSecret?: string,
 *         Issuer?: string,
 *         AuthorizationEndpoint?: string,
 *         TokenEndpoint?: string,
 *         UserInfoEndpoint?: string,
 *         LogoutEndpoint?: string,
 *         JwksUri?: string,
 *         Scope?: string,
 *         AuthenticationRequestExtraParams?: array<string, string>,
 *         ...,
 *     },
 *     SourceIpConfig?: array{Cidrs?: list<string>, ...},
 *     WorkforceName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     WorkforceVpcConfig?: array{VpcId?: string, SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkteam(array $args = [])
 * @phpstan-method \Aws\Result createWorkteam(array{
 *     WorkteamName?: string,
 *     WorkforceName?: string,
 *     MemberDefinitions?: list<array{CognitoMemberDefinition?: array, OidcMemberDefinition?: array, ...}>,
 *     Description?: string,
 *     NotificationConfiguration?: array{NotificationTopicArn?: string, ...},
 *     WorkerAccessConfiguration?: array{S3Presign?: array{IamPolicyConstraints?: array, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkteamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkteamAsync(array{
 *     WorkteamName?: string,
 *     WorkforceName?: string,
 *     MemberDefinitions?: list<array{CognitoMemberDefinition?: array, OidcMemberDefinition?: array, ...}>,
 *     Description?: string,
 *     NotificationConfiguration?: array{NotificationTopicArn?: string, ...},
 *     WorkerAccessConfiguration?: array{S3Presign?: array{IamPolicyConstraints?: array, ...}, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAIBenchmarkJob(array $args = [])
 * @phpstan-method \Aws\Result deleteAIBenchmarkJob(array{AIBenchmarkJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAIBenchmarkJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAIBenchmarkJobAsync(array{AIBenchmarkJobName?: string, ...} $args = [])
 * @method \Aws\Result deleteAIRecommendationJob(array $args = [])
 * @phpstan-method \Aws\Result deleteAIRecommendationJob(array{AIRecommendationJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAIRecommendationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAIRecommendationJobAsync(array{AIRecommendationJobName?: string, ...} $args = [])
 * @method \Aws\Result deleteAIWorkloadConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteAIWorkloadConfig(array{AIWorkloadConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAIWorkloadConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAIWorkloadConfigAsync(array{AIWorkloadConfigName?: string, ...} $args = [])
 * @method \Aws\Result deleteAction(array $args = [])
 * @phpstan-method \Aws\Result deleteAction(array{ActionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteActionAsync(array{ActionName?: string, ...} $args = [])
 * @method \Aws\Result deleteAlgorithm(array $args = [])
 * @phpstan-method \Aws\Result deleteAlgorithm(array{AlgorithmName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAlgorithmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAlgorithmAsync(array{AlgorithmName?: string, ...} $args = [])
 * @method \Aws\Result deleteApp(array $args = [])
 * @phpstan-method \Aws\Result deleteApp(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     SpaceName?: string,
 *     AppType?: 'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard',
 *     AppName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppAsync(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     SpaceName?: string,
 *     AppType?: 'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard',
 *     AppName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAppImageConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteAppImageConfig(array{AppImageConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppImageConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppImageConfigAsync(array{AppImageConfigName?: string, ...} $args = [])
 * @method \Aws\Result deleteArtifact(array $args = [])
 * @phpstan-method \Aws\Result deleteArtifact(array{ArtifactArn?: string, Source?: array{SourceUri?: string, SourceTypes?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteArtifactAsync(array{ArtifactArn?: string, Source?: array{SourceUri?: string, SourceTypes?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result deleteAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteAssociation(array{SourceArn?: string, DestinationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssociationAsync(array{SourceArn?: string, DestinationArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{ClusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{ClusterName?: string, ...} $args = [])
 * @method \Aws\Result deleteClusterSchedulerConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteClusterSchedulerConfig(array{ClusterSchedulerConfigId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterSchedulerConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterSchedulerConfigAsync(array{ClusterSchedulerConfigId?: string, ...} $args = [])
 * @method \Aws\Result deleteCodeRepository(array $args = [])
 * @phpstan-method \Aws\Result deleteCodeRepository(array{CodeRepositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCodeRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCodeRepositoryAsync(array{CodeRepositoryName?: string, ...} $args = [])
 * @method \Aws\Result deleteCompilationJob(array $args = [])
 * @phpstan-method \Aws\Result deleteCompilationJob(array{CompilationJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCompilationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCompilationJobAsync(array{CompilationJobName?: string, ...} $args = [])
 * @method \Aws\Result deleteComputeQuota(array $args = [])
 * @phpstan-method \Aws\Result deleteComputeQuota(array{ComputeQuotaId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComputeQuotaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteComputeQuotaAsync(array{ComputeQuotaId?: string, ...} $args = [])
 * @method \Aws\Result deleteContext(array $args = [])
 * @phpstan-method \Aws\Result deleteContext(array{ContextName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContextAsync(array{ContextName?: string, ...} $args = [])
 * @method \Aws\Result deleteDataQualityJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteDataQualityJobDefinition(array{JobDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataQualityJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataQualityJobDefinitionAsync(array{JobDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result deleteDeviceFleet(array $args = [])
 * @phpstan-method \Aws\Result deleteDeviceFleet(array{DeviceFleetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeviceFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeviceFleetAsync(array{DeviceFleetName?: string, ...} $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{DomainId?: string, RetentionPolicy?: array{HomeEfsFileSystem?: 'Delete'|'Retain', ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{DomainId?: string, RetentionPolicy?: array{HomeEfsFileSystem?: 'Delete'|'Retain', ...}, ...} $args = [])
 * @method \Aws\Result deleteEdgeDeploymentPlan(array $args = [])
 * @phpstan-method \Aws\Result deleteEdgeDeploymentPlan(array{EdgeDeploymentPlanName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEdgeDeploymentPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEdgeDeploymentPlanAsync(array{EdgeDeploymentPlanName?: string, ...} $args = [])
 * @method \Aws\Result deleteEdgeDeploymentStage(array $args = [])
 * @phpstan-method \Aws\Result deleteEdgeDeploymentStage(array{EdgeDeploymentPlanName?: string, StageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEdgeDeploymentStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEdgeDeploymentStageAsync(array{EdgeDeploymentPlanName?: string, StageName?: string, ...} $args = [])
 * @method \Aws\Result deleteEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpoint(array{EndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array{EndpointName?: string, ...} $args = [])
 * @method \Aws\Result deleteEndpointConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteEndpointConfig(array{EndpointConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEndpointConfigAsync(array{EndpointConfigName?: string, ...} $args = [])
 * @method \Aws\Result deleteExperiment(array $args = [])
 * @phpstan-method \Aws\Result deleteExperiment(array{ExperimentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExperimentAsync(array{ExperimentName?: string, ...} $args = [])
 * @method \Aws\Result deleteFeatureGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteFeatureGroup(array{FeatureGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFeatureGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFeatureGroupAsync(array{FeatureGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteFlowDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteFlowDefinition(array{FlowDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlowDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFlowDefinitionAsync(array{FlowDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result deleteHub(array $args = [])
 * @phpstan-method \Aws\Result deleteHub(array{HubName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHubAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHubAsync(array{HubName?: string, ...} $args = [])
 * @method \Aws\Result deleteHubContent(array $args = [])
 * @phpstan-method \Aws\Result deleteHubContent(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentName?: string,
 *     HubContentVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHubContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHubContentAsync(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentName?: string,
 *     HubContentVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteHubContentReference(array $args = [])
 * @phpstan-method \Aws\Result deleteHubContentReference(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHubContentReferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHubContentReferenceAsync(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteHumanTaskUi(array $args = [])
 * @phpstan-method \Aws\Result deleteHumanTaskUi(array{HumanTaskUiName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHumanTaskUiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHumanTaskUiAsync(array{HumanTaskUiName?: string, ...} $args = [])
 * @method \Aws\Result deleteHyperParameterTuningJob(array $args = [])
 * @phpstan-method \Aws\Result deleteHyperParameterTuningJob(array{HyperParameterTuningJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHyperParameterTuningJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHyperParameterTuningJobAsync(array{HyperParameterTuningJobName?: string, ...} $args = [])
 * @method \Aws\Result deleteImage(array $args = [])
 * @phpstan-method \Aws\Result deleteImage(array{ImageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImageAsync(array{ImageName?: string, ...} $args = [])
 * @method \Aws\Result deleteImageVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteImageVersion(array{ImageName?: string, Version?: int, Alias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImageVersionAsync(array{ImageName?: string, Version?: int, Alias?: string, ...} $args = [])
 * @method \Aws\Result deleteInferenceComponent(array $args = [])
 * @phpstan-method \Aws\Result deleteInferenceComponent(array{InferenceComponentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInferenceComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInferenceComponentAsync(array{InferenceComponentName?: string, ...} $args = [])
 * @method \Aws\Result deleteInferenceExperiment(array $args = [])
 * @phpstan-method \Aws\Result deleteInferenceExperiment(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInferenceExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInferenceExperimentAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteJob(array $args = [])
 * @phpstan-method \Aws\Result deleteJob(array{JobName?: string, JobCategory?: 'AgentRFT'|'AgentRFTEvaluation', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobAsync(array{JobName?: string, JobCategory?: 'AgentRFT'|'AgentRFTEvaluation', ...} $args = [])
 * @method \Aws\Result deleteMlflowApp(array $args = [])
 * @phpstan-method \Aws\Result deleteMlflowApp(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMlflowAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMlflowAppAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteMlflowTrackingServer(array $args = [])
 * @phpstan-method \Aws\Result deleteMlflowTrackingServer(array{TrackingServerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMlflowTrackingServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMlflowTrackingServerAsync(array{TrackingServerName?: string, ...} $args = [])
 * @method \Aws\Result deleteModel(array $args = [])
 * @phpstan-method \Aws\Result deleteModel(array{ModelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelAsync(array{ModelName?: string, ...} $args = [])
 * @method \Aws\Result deleteModelBiasJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteModelBiasJobDefinition(array{JobDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelBiasJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelBiasJobDefinitionAsync(array{JobDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result deleteModelCard(array $args = [])
 * @phpstan-method \Aws\Result deleteModelCard(array{ModelCardName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelCardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelCardAsync(array{ModelCardName?: string, ...} $args = [])
 * @method \Aws\Result deleteModelExplainabilityJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteModelExplainabilityJobDefinition(array{JobDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelExplainabilityJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelExplainabilityJobDefinitionAsync(array{JobDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result deleteModelPackage(array $args = [])
 * @phpstan-method \Aws\Result deleteModelPackage(array{ModelPackageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelPackageAsync(array{ModelPackageName?: string, ...} $args = [])
 * @method \Aws\Result deleteModelPackageGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteModelPackageGroup(array{ModelPackageGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelPackageGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelPackageGroupAsync(array{ModelPackageGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteModelPackageGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteModelPackageGroupPolicy(array{ModelPackageGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelPackageGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelPackageGroupPolicyAsync(array{ModelPackageGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteModelQualityJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteModelQualityJobDefinition(array{JobDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteModelQualityJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteModelQualityJobDefinitionAsync(array{JobDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result deleteMonitoringSchedule(array $args = [])
 * @phpstan-method \Aws\Result deleteMonitoringSchedule(array{MonitoringScheduleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMonitoringScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMonitoringScheduleAsync(array{MonitoringScheduleName?: string, ...} $args = [])
 * @method \Aws\Result deleteNotebookInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteNotebookInstance(array{NotebookInstanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotebookInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotebookInstanceAsync(array{NotebookInstanceName?: string, ...} $args = [])
 * @method \Aws\Result deleteNotebookInstanceLifecycleConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteNotebookInstanceLifecycleConfig(array{NotebookInstanceLifecycleConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotebookInstanceLifecycleConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotebookInstanceLifecycleConfigAsync(array{NotebookInstanceLifecycleConfigName?: string, ...} $args = [])
 * @method \Aws\Result deleteOptimizationJob(array $args = [])
 * @phpstan-method \Aws\Result deleteOptimizationJob(array{OptimizationJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOptimizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOptimizationJobAsync(array{OptimizationJobName?: string, ...} $args = [])
 * @method \Aws\Result deletePartnerApp(array $args = [])
 * @phpstan-method \Aws\Result deletePartnerApp(array{Arn?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePartnerAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePartnerAppAsync(array{Arn?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result deletePipeline(array $args = [])
 * @phpstan-method \Aws\Result deletePipeline(array{PipelineName?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePipelineAsync(array{PipelineName?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result deleteProcessingJob(array $args = [])
 * @phpstan-method \Aws\Result deleteProcessingJob(array{ProcessingJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProcessingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProcessingJobAsync(array{ProcessingJobName?: string, ...} $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @phpstan-method \Aws\Result deleteProject(array{ProjectName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectAsync(array{ProjectName?: string, ...} $args = [])
 * @method \Aws\Result deleteSpace(array $args = [])
 * @phpstan-method \Aws\Result deleteSpace(array{DomainId?: string, SpaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSpaceAsync(array{DomainId?: string, SpaceName?: string, ...} $args = [])
 * @method \Aws\Result deleteStudioLifecycleConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteStudioLifecycleConfig(array{StudioLifecycleConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStudioLifecycleConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStudioLifecycleConfigAsync(array{StudioLifecycleConfigName?: string, ...} $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @phpstan-method \Aws\Result deleteTags(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagsAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteTrainingJob(array $args = [])
 * @phpstan-method \Aws\Result deleteTrainingJob(array{TrainingJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrainingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrainingJobAsync(array{TrainingJobName?: string, ...} $args = [])
 * @method \Aws\Result deleteTrial(array $args = [])
 * @phpstan-method \Aws\Result deleteTrial(array{TrialName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrialAsync(array{TrialName?: string, ...} $args = [])
 * @method \Aws\Result deleteTrialComponent(array $args = [])
 * @phpstan-method \Aws\Result deleteTrialComponent(array{TrialComponentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrialComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrialComponentAsync(array{TrialComponentName?: string, ...} $args = [])
 * @method \Aws\Result deleteUserProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteUserProfile(array{DomainId?: string, UserProfileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserProfileAsync(array{DomainId?: string, UserProfileName?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkforce(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkforce(array{WorkforceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkforceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkforceAsync(array{WorkforceName?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkteam(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkteam(array{WorkteamName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkteamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkteamAsync(array{WorkteamName?: string, ...} $args = [])
 * @method \Aws\Result deregisterDevices(array $args = [])
 * @phpstan-method \Aws\Result deregisterDevices(array{DeviceFleetName?: string, DeviceNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterDevicesAsync(array{DeviceFleetName?: string, DeviceNames?: list<string>, ...} $args = [])
 * @method \Aws\Result describeAIBenchmarkJob(array $args = [])
 * @phpstan-method \Aws\Result describeAIBenchmarkJob(array{AIBenchmarkJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAIBenchmarkJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAIBenchmarkJobAsync(array{AIBenchmarkJobName?: string, ...} $args = [])
 * @method \Aws\Result describeAIRecommendationJob(array $args = [])
 * @phpstan-method \Aws\Result describeAIRecommendationJob(array{AIRecommendationJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAIRecommendationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAIRecommendationJobAsync(array{AIRecommendationJobName?: string, ...} $args = [])
 * @method \Aws\Result describeAIWorkloadConfig(array $args = [])
 * @phpstan-method \Aws\Result describeAIWorkloadConfig(array{AIWorkloadConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAIWorkloadConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAIWorkloadConfigAsync(array{AIWorkloadConfigName?: string, ...} $args = [])
 * @method \Aws\Result describeAction(array $args = [])
 * @phpstan-method \Aws\Result describeAction(array{ActionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeActionAsync(array{ActionName?: string, ...} $args = [])
 * @method \Aws\Result describeAlgorithm(array $args = [])
 * @phpstan-method \Aws\Result describeAlgorithm(array{AlgorithmName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAlgorithmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAlgorithmAsync(array{AlgorithmName?: string, ...} $args = [])
 * @method \Aws\Result describeApp(array $args = [])
 * @phpstan-method \Aws\Result describeApp(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     SpaceName?: string,
 *     AppType?: 'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard',
 *     AppName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppAsync(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     SpaceName?: string,
 *     AppType?: 'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard',
 *     AppName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAppImageConfig(array $args = [])
 * @phpstan-method \Aws\Result describeAppImageConfig(array{AppImageConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppImageConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAppImageConfigAsync(array{AppImageConfigName?: string, ...} $args = [])
 * @method \Aws\Result describeArtifact(array $args = [])
 * @phpstan-method \Aws\Result describeArtifact(array{ArtifactArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeArtifactAsync(array{ArtifactArn?: string, ...} $args = [])
 * @method \Aws\Result describeAutoMLJob(array $args = [])
 * @phpstan-method \Aws\Result describeAutoMLJob(array{AutoMLJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutoMLJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAutoMLJobAsync(array{AutoMLJobName?: string, ...} $args = [])
 * @method \Aws\Result describeAutoMLJobV2(array $args = [])
 * @phpstan-method \Aws\Result describeAutoMLJobV2(array{AutoMLJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutoMLJobV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAutoMLJobV2Async(array{AutoMLJobName?: string, ...} $args = [])
 * @method \Aws\Result describeCluster(array $args = [])
 * @phpstan-method \Aws\Result describeCluster(array{ClusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterAsync(array{ClusterName?: string, ...} $args = [])
 * @method \Aws\Result describeClusterEvent(array $args = [])
 * @phpstan-method \Aws\Result describeClusterEvent(array{EventId?: string, ClusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterEventAsync(array{EventId?: string, ClusterName?: string, ...} $args = [])
 * @method \Aws\Result describeClusterNode(array $args = [])
 * @phpstan-method \Aws\Result describeClusterNode(array{ClusterName?: string, NodeId?: string, NodeLogicalId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterNodeAsync(array{ClusterName?: string, NodeId?: string, NodeLogicalId?: string, ...} $args = [])
 * @method \Aws\Result describeClusterSchedulerConfig(array $args = [])
 * @phpstan-method \Aws\Result describeClusterSchedulerConfig(array{ClusterSchedulerConfigId?: string, ClusterSchedulerConfigVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterSchedulerConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterSchedulerConfigAsync(array{ClusterSchedulerConfigId?: string, ClusterSchedulerConfigVersion?: int, ...} $args = [])
 * @method \Aws\Result describeCodeRepository(array $args = [])
 * @phpstan-method \Aws\Result describeCodeRepository(array{CodeRepositoryName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCodeRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCodeRepositoryAsync(array{CodeRepositoryName?: string, ...} $args = [])
 * @method \Aws\Result describeCompilationJob(array $args = [])
 * @phpstan-method \Aws\Result describeCompilationJob(array{CompilationJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCompilationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCompilationJobAsync(array{CompilationJobName?: string, ...} $args = [])
 * @method \Aws\Result describeComputeQuota(array $args = [])
 * @phpstan-method \Aws\Result describeComputeQuota(array{ComputeQuotaId?: string, ComputeQuotaVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComputeQuotaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeComputeQuotaAsync(array{ComputeQuotaId?: string, ComputeQuotaVersion?: int, ...} $args = [])
 * @method \Aws\Result describeContext(array $args = [])
 * @phpstan-method \Aws\Result describeContext(array{ContextName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeContextAsync(array{ContextName?: string, ...} $args = [])
 * @method \Aws\Result describeDataQualityJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeDataQualityJobDefinition(array{JobDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDataQualityJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDataQualityJobDefinitionAsync(array{JobDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result describeDevice(array $args = [])
 * @phpstan-method \Aws\Result describeDevice(array{NextToken?: string, DeviceName?: string, DeviceFleetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDeviceAsync(array{NextToken?: string, DeviceName?: string, DeviceFleetName?: string, ...} $args = [])
 * @method \Aws\Result describeDeviceFleet(array $args = [])
 * @phpstan-method \Aws\Result describeDeviceFleet(array{DeviceFleetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDeviceFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDeviceFleetAsync(array{DeviceFleetName?: string, ...} $args = [])
 * @method \Aws\Result describeDomain(array $args = [])
 * @phpstan-method \Aws\Result describeDomain(array{DomainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainAsync(array{DomainId?: string, ...} $args = [])
 * @method \Aws\Result describeEdgeDeploymentPlan(array $args = [])
 * @phpstan-method \Aws\Result describeEdgeDeploymentPlan(array{EdgeDeploymentPlanName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEdgeDeploymentPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEdgeDeploymentPlanAsync(array{EdgeDeploymentPlanName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeEdgePackagingJob(array $args = [])
 * @phpstan-method \Aws\Result describeEdgePackagingJob(array{EdgePackagingJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEdgePackagingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEdgePackagingJobAsync(array{EdgePackagingJobName?: string, ...} $args = [])
 * @method \Aws\Result describeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result describeEndpoint(array{EndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointAsync(array{EndpointName?: string, ...} $args = [])
 * @method \Aws\Result describeEndpointConfig(array $args = [])
 * @phpstan-method \Aws\Result describeEndpointConfig(array{EndpointConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointConfigAsync(array{EndpointConfigName?: string, ...} $args = [])
 * @method \Aws\Result describeExperiment(array $args = [])
 * @phpstan-method \Aws\Result describeExperiment(array{ExperimentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExperimentAsync(array{ExperimentName?: string, ...} $args = [])
 * @method \Aws\Result describeFeatureGroup(array $args = [])
 * @phpstan-method \Aws\Result describeFeatureGroup(array{FeatureGroupName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFeatureGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFeatureGroupAsync(array{FeatureGroupName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeFeatureMetadata(array $args = [])
 * @phpstan-method \Aws\Result describeFeatureMetadata(array{FeatureGroupName?: string, FeatureName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFeatureMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFeatureMetadataAsync(array{FeatureGroupName?: string, FeatureName?: string, ...} $args = [])
 * @method \Aws\Result describeFlowDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeFlowDefinition(array{FlowDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlowDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFlowDefinitionAsync(array{FlowDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result describeHub(array $args = [])
 * @phpstan-method \Aws\Result describeHub(array{HubName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHubAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHubAsync(array{HubName?: string, ...} $args = [])
 * @method \Aws\Result describeHubContent(array $args = [])
 * @phpstan-method \Aws\Result describeHubContent(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentName?: string,
 *     HubContentVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHubContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHubContentAsync(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentName?: string,
 *     HubContentVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeHumanTaskUi(array $args = [])
 * @phpstan-method \Aws\Result describeHumanTaskUi(array{HumanTaskUiName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHumanTaskUiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHumanTaskUiAsync(array{HumanTaskUiName?: string, ...} $args = [])
 * @method \Aws\Result describeHyperParameterTuningJob(array $args = [])
 * @phpstan-method \Aws\Result describeHyperParameterTuningJob(array{HyperParameterTuningJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHyperParameterTuningJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHyperParameterTuningJobAsync(array{HyperParameterTuningJobName?: string, ...} $args = [])
 * @method \Aws\Result describeImage(array $args = [])
 * @phpstan-method \Aws\Result describeImage(array{ImageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImageAsync(array{ImageName?: string, ...} $args = [])
 * @method \Aws\Result describeImageVersion(array $args = [])
 * @phpstan-method \Aws\Result describeImageVersion(array{ImageName?: string, Version?: int, Alias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImageVersionAsync(array{ImageName?: string, Version?: int, Alias?: string, ...} $args = [])
 * @method \Aws\Result describeInferenceComponent(array $args = [])
 * @phpstan-method \Aws\Result describeInferenceComponent(array{InferenceComponentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInferenceComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInferenceComponentAsync(array{InferenceComponentName?: string, ...} $args = [])
 * @method \Aws\Result describeInferenceExperiment(array $args = [])
 * @phpstan-method \Aws\Result describeInferenceExperiment(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInferenceExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInferenceExperimentAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeInferenceRecommendationsJob(array $args = [])
 * @phpstan-method \Aws\Result describeInferenceRecommendationsJob(array{JobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInferenceRecommendationsJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInferenceRecommendationsJobAsync(array{JobName?: string, ...} $args = [])
 * @method \Aws\Result describeJob(array $args = [])
 * @phpstan-method \Aws\Result describeJob(array{JobName?: string, JobCategory?: 'AgentRFT'|'AgentRFTEvaluation', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobAsync(array{JobName?: string, JobCategory?: 'AgentRFT'|'AgentRFTEvaluation', ...} $args = [])
 * @method \Aws\Result describeJobSchemaVersion(array $args = [])
 * @phpstan-method \Aws\Result describeJobSchemaVersion(array{JobCategory?: 'AgentRFT'|'AgentRFTEvaluation', JobConfigSchemaVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobSchemaVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobSchemaVersionAsync(array{JobCategory?: 'AgentRFT'|'AgentRFTEvaluation', JobConfigSchemaVersion?: string, ...} $args = [])
 * @method \Aws\Result describeLabelingJob(array $args = [])
 * @phpstan-method \Aws\Result describeLabelingJob(array{LabelingJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLabelingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLabelingJobAsync(array{LabelingJobName?: string, ...} $args = [])
 * @method \Aws\Result describeLineageGroup(array $args = [])
 * @phpstan-method \Aws\Result describeLineageGroup(array{LineageGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLineageGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLineageGroupAsync(array{LineageGroupName?: string, ...} $args = [])
 * @method \Aws\Result describeMlflowApp(array $args = [])
 * @phpstan-method \Aws\Result describeMlflowApp(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMlflowAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMlflowAppAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result describeMlflowTrackingServer(array $args = [])
 * @phpstan-method \Aws\Result describeMlflowTrackingServer(array{TrackingServerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMlflowTrackingServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMlflowTrackingServerAsync(array{TrackingServerName?: string, ...} $args = [])
 * @method \Aws\Result describeModel(array $args = [])
 * @phpstan-method \Aws\Result describeModel(array{ModelName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelAsync(array{ModelName?: string, ...} $args = [])
 * @method \Aws\Result describeModelBiasJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeModelBiasJobDefinition(array{JobDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelBiasJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelBiasJobDefinitionAsync(array{JobDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result describeModelCard(array $args = [])
 * @phpstan-method \Aws\Result describeModelCard(array{ModelCardName?: string, ModelCardVersion?: int, IncludedData?: 'AllData'|'MetadataOnly', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelCardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelCardAsync(array{ModelCardName?: string, ModelCardVersion?: int, IncludedData?: 'AllData'|'MetadataOnly', ...} $args = [])
 * @method \Aws\Result describeModelCardExportJob(array $args = [])
 * @phpstan-method \Aws\Result describeModelCardExportJob(array{ModelCardExportJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelCardExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelCardExportJobAsync(array{ModelCardExportJobArn?: string, ...} $args = [])
 * @method \Aws\Result describeModelExplainabilityJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeModelExplainabilityJobDefinition(array{JobDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelExplainabilityJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelExplainabilityJobDefinitionAsync(array{JobDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result describeModelPackage(array $args = [])
 * @phpstan-method \Aws\Result describeModelPackage(array{ModelPackageName?: string, IncludedData?: 'AllData'|'MetadataOnly', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelPackageAsync(array{ModelPackageName?: string, IncludedData?: 'AllData'|'MetadataOnly', ...} $args = [])
 * @method \Aws\Result describeModelPackageGroup(array $args = [])
 * @phpstan-method \Aws\Result describeModelPackageGroup(array{ModelPackageGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelPackageGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelPackageGroupAsync(array{ModelPackageGroupName?: string, ...} $args = [])
 * @method \Aws\Result describeModelQualityJobDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeModelQualityJobDefinition(array{JobDefinitionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeModelQualityJobDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeModelQualityJobDefinitionAsync(array{JobDefinitionName?: string, ...} $args = [])
 * @method \Aws\Result describeMonitoringSchedule(array $args = [])
 * @phpstan-method \Aws\Result describeMonitoringSchedule(array{MonitoringScheduleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMonitoringScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMonitoringScheduleAsync(array{MonitoringScheduleName?: string, ...} $args = [])
 * @method \Aws\Result describeNotebookInstance(array $args = [])
 * @phpstan-method \Aws\Result describeNotebookInstance(array{NotebookInstanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNotebookInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotebookInstanceAsync(array{NotebookInstanceName?: string, ...} $args = [])
 * @method \Aws\Result describeNotebookInstanceLifecycleConfig(array $args = [])
 * @phpstan-method \Aws\Result describeNotebookInstanceLifecycleConfig(array{NotebookInstanceLifecycleConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNotebookInstanceLifecycleConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotebookInstanceLifecycleConfigAsync(array{NotebookInstanceLifecycleConfigName?: string, ...} $args = [])
 * @method \Aws\Result describeOptimizationJob(array $args = [])
 * @phpstan-method \Aws\Result describeOptimizationJob(array{OptimizationJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOptimizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOptimizationJobAsync(array{OptimizationJobName?: string, ...} $args = [])
 * @method \Aws\Result describePartnerApp(array $args = [])
 * @phpstan-method \Aws\Result describePartnerApp(array{Arn?: string, IncludeAvailableUpgrade?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePartnerAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePartnerAppAsync(array{Arn?: string, IncludeAvailableUpgrade?: bool, ...} $args = [])
 * @method \Aws\Result describePipeline(array $args = [])
 * @phpstan-method \Aws\Result describePipeline(array{PipelineName?: string, PipelineVersionId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePipelineAsync(array{PipelineName?: string, PipelineVersionId?: int, ...} $args = [])
 * @method \Aws\Result describePipelineDefinitionForExecution(array $args = [])
 * @phpstan-method \Aws\Result describePipelineDefinitionForExecution(array{PipelineExecutionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePipelineDefinitionForExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePipelineDefinitionForExecutionAsync(array{PipelineExecutionArn?: string, ...} $args = [])
 * @method \Aws\Result describePipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result describePipelineExecution(array{PipelineExecutionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePipelineExecutionAsync(array{PipelineExecutionArn?: string, ...} $args = [])
 * @method \Aws\Result describeProcessingJob(array $args = [])
 * @phpstan-method \Aws\Result describeProcessingJob(array{ProcessingJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProcessingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProcessingJobAsync(array{ProcessingJobName?: string, ...} $args = [])
 * @method \Aws\Result describeProject(array $args = [])
 * @phpstan-method \Aws\Result describeProject(array{ProjectName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProjectAsync(array{ProjectName?: string, ...} $args = [])
 * @method \Aws\Result describeReservedCapacity(array $args = [])
 * @phpstan-method \Aws\Result describeReservedCapacity(array{ReservedCapacityArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReservedCapacityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReservedCapacityAsync(array{ReservedCapacityArn?: string, ...} $args = [])
 * @method \Aws\Result describeSpace(array $args = [])
 * @phpstan-method \Aws\Result describeSpace(array{DomainId?: string, SpaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSpaceAsync(array{DomainId?: string, SpaceName?: string, ...} $args = [])
 * @method \Aws\Result describeStudioLifecycleConfig(array $args = [])
 * @phpstan-method \Aws\Result describeStudioLifecycleConfig(array{StudioLifecycleConfigName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStudioLifecycleConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStudioLifecycleConfigAsync(array{StudioLifecycleConfigName?: string, ...} $args = [])
 * @method \Aws\Result describeSubscribedWorkteam(array $args = [])
 * @phpstan-method \Aws\Result describeSubscribedWorkteam(array{WorkteamArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSubscribedWorkteamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSubscribedWorkteamAsync(array{WorkteamArn?: string, ...} $args = [])
 * @method \Aws\Result describeTrainingJob(array $args = [])
 * @phpstan-method \Aws\Result describeTrainingJob(array{TrainingJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrainingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrainingJobAsync(array{TrainingJobName?: string, ...} $args = [])
 * @method \Aws\Result describeTrainingPlan(array $args = [])
 * @phpstan-method \Aws\Result describeTrainingPlan(array{TrainingPlanName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrainingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrainingPlanAsync(array{TrainingPlanName?: string, ...} $args = [])
 * @method \Aws\Result describeTrainingPlanExtensionHistory(array $args = [])
 * @phpstan-method \Aws\Result describeTrainingPlanExtensionHistory(array{TrainingPlanArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrainingPlanExtensionHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrainingPlanExtensionHistoryAsync(array{TrainingPlanArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeTransformJob(array $args = [])
 * @phpstan-method \Aws\Result describeTransformJob(array{TransformJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTransformJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTransformJobAsync(array{TransformJobName?: string, ...} $args = [])
 * @method \Aws\Result describeTrial(array $args = [])
 * @phpstan-method \Aws\Result describeTrial(array{TrialName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrialAsync(array{TrialName?: string, ...} $args = [])
 * @method \Aws\Result describeTrialComponent(array $args = [])
 * @phpstan-method \Aws\Result describeTrialComponent(array{TrialComponentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrialComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTrialComponentAsync(array{TrialComponentName?: string, ...} $args = [])
 * @method \Aws\Result describeUserProfile(array $args = [])
 * @phpstan-method \Aws\Result describeUserProfile(array{DomainId?: string, UserProfileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUserProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUserProfileAsync(array{DomainId?: string, UserProfileName?: string, ...} $args = [])
 * @method \Aws\Result describeWorkforce(array $args = [])
 * @phpstan-method \Aws\Result describeWorkforce(array{WorkforceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkforceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkforceAsync(array{WorkforceName?: string, ...} $args = [])
 * @method \Aws\Result describeWorkteam(array $args = [])
 * @phpstan-method \Aws\Result describeWorkteam(array{WorkteamName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkteamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkteamAsync(array{WorkteamName?: string, ...} $args = [])
 * @method \Aws\Result detachClusterNodeVolume(array $args = [])
 * @phpstan-method \Aws\Result detachClusterNodeVolume(array{ClusterArn?: string, NodeId?: string, VolumeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachClusterNodeVolumeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachClusterNodeVolumeAsync(array{ClusterArn?: string, NodeId?: string, VolumeId?: string, ...} $args = [])
 * @method \Aws\Result disableSagemakerServicecatalogPortfolio(array $args = [])
 * @phpstan-method \Aws\Result disableSagemakerServicecatalogPortfolio(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableSagemakerServicecatalogPortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableSagemakerServicecatalogPortfolioAsync(array{...} $args = [])
 * @method \Aws\Result disassociateTrialComponent(array $args = [])
 * @phpstan-method \Aws\Result disassociateTrialComponent(array{TrialComponentName?: string, TrialName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateTrialComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateTrialComponentAsync(array{TrialComponentName?: string, TrialName?: string, ...} $args = [])
 * @method \Aws\Result enableSagemakerServicecatalogPortfolio(array $args = [])
 * @phpstan-method \Aws\Result enableSagemakerServicecatalogPortfolio(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableSagemakerServicecatalogPortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableSagemakerServicecatalogPortfolioAsync(array{...} $args = [])
 * @method \Aws\Result extendTrainingPlan(array $args = [])
 * @phpstan-method \Aws\Result extendTrainingPlan(array{TrainingPlanExtensionOfferingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise extendTrainingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise extendTrainingPlanAsync(array{TrainingPlanExtensionOfferingId?: string, ...} $args = [])
 * @method \Aws\Result getDeviceFleetReport(array $args = [])
 * @phpstan-method \Aws\Result getDeviceFleetReport(array{DeviceFleetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceFleetReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceFleetReportAsync(array{DeviceFleetName?: string, ...} $args = [])
 * @method \Aws\Result getLineageGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result getLineageGroupPolicy(array{LineageGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLineageGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLineageGroupPolicyAsync(array{LineageGroupName?: string, ...} $args = [])
 * @method \Aws\Result getModelPackageGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result getModelPackageGroupPolicy(array{ModelPackageGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getModelPackageGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getModelPackageGroupPolicyAsync(array{ModelPackageGroupName?: string, ...} $args = [])
 * @method \Aws\Result getSagemakerServicecatalogPortfolioStatus(array $args = [])
 * @phpstan-method \Aws\Result getSagemakerServicecatalogPortfolioStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSagemakerServicecatalogPortfolioStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSagemakerServicecatalogPortfolioStatusAsync(array{...} $args = [])
 * @method \Aws\Result getScalingConfigurationRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getScalingConfigurationRecommendation(array{
 *     InferenceRecommendationsJobName?: string,
 *     RecommendationId?: string,
 *     EndpointName?: string,
 *     TargetCpuUtilizationPerCore?: int,
 *     ScalingPolicyObjective?: array{MinInvocationsPerMinute?: int, MaxInvocationsPerMinute?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getScalingConfigurationRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScalingConfigurationRecommendationAsync(array{
 *     InferenceRecommendationsJobName?: string,
 *     RecommendationId?: string,
 *     EndpointName?: string,
 *     TargetCpuUtilizationPerCore?: int,
 *     ScalingPolicyObjective?: array{MinInvocationsPerMinute?: int, MaxInvocationsPerMinute?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSearchSuggestions(array $args = [])
 * @phpstan-method \Aws\Result getSearchSuggestions(array{
 *     Resource?: 'Endpoint'|'Experiment'|'ExperimentTrial'|'ExperimentTrialComponent'|'FeatureGroup'|'FeatureMetadata'|'HyperParameterTuningJob'|'Image'|'ImageVersion'|'Job'|'Model'|'ModelCard'|'ModelPackage'|'ModelPackageGroup'|'Pipeline'|'PipelineExecution'|'PipelineVersion'|'Project'|'TrainingJob',
 *     SuggestionQuery?: array{PropertyNameQuery?: array{PropertyNameHint?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSearchSuggestionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSearchSuggestionsAsync(array{
 *     Resource?: 'Endpoint'|'Experiment'|'ExperimentTrial'|'ExperimentTrialComponent'|'FeatureGroup'|'FeatureMetadata'|'HyperParameterTuningJob'|'Image'|'ImageVersion'|'Job'|'Model'|'ModelCard'|'ModelPackage'|'ModelPackageGroup'|'Pipeline'|'PipelineExecution'|'PipelineVersion'|'Project'|'TrainingJob',
 *     SuggestionQuery?: array{PropertyNameQuery?: array{PropertyNameHint?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result importHubContent(array $args = [])
 * @phpstan-method \Aws\Result importHubContent(array{
 *     HubContentName?: string,
 *     HubContentVersion?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     DocumentSchemaVersion?: string,
 *     HubName?: string,
 *     HubContentDisplayName?: string,
 *     HubContentDescription?: string,
 *     HubContentMarkdown?: string,
 *     HubContentDocument?: string,
 *     SupportStatus?: 'Deprecated'|'Restricted'|'Supported',
 *     HubContentSearchKeywords?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importHubContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importHubContentAsync(array{
 *     HubContentName?: string,
 *     HubContentVersion?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     DocumentSchemaVersion?: string,
 *     HubName?: string,
 *     HubContentDisplayName?: string,
 *     HubContentDescription?: string,
 *     HubContentMarkdown?: string,
 *     HubContentDocument?: string,
 *     SupportStatus?: 'Deprecated'|'Restricted'|'Supported',
 *     HubContentSearchKeywords?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAIBenchmarkJobs(array $args = [])
 * @phpstan-method \Aws\Result listAIBenchmarkJobs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAIBenchmarkJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAIBenchmarkJobsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAIRecommendationJobs(array $args = [])
 * @phpstan-method \Aws\Result listAIRecommendationJobs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAIRecommendationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAIRecommendationJobsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAIWorkloadConfigs(array $args = [])
 * @phpstan-method \Aws\Result listAIWorkloadConfigs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAIWorkloadConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAIWorkloadConfigsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listActions(array $args = [])
 * @phpstan-method \Aws\Result listActions(array{
 *     SourceUri?: string,
 *     ActionType?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActionsAsync(array{
 *     SourceUri?: string,
 *     ActionType?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAlgorithms(array $args = [])
 * @phpstan-method \Aws\Result listAlgorithms(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAlgorithmsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAlgorithmsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAliases(array $args = [])
 * @phpstan-method \Aws\Result listAliases(array{ImageName?: string, Alias?: string, Version?: int, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAliasesAsync(array{ImageName?: string, Alias?: string, Version?: int, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAppImageConfigs(array $args = [])
 * @phpstan-method \Aws\Result listAppImageConfigs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     ModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'LastModifiedTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppImageConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppImageConfigsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     ModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'LastModifiedTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listApps(array $args = [])
 * @phpstan-method \Aws\Result listApps(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime',
 *     DomainIdEquals?: string,
 *     UserProfileNameEquals?: string,
 *     SpaceNameEquals?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime',
 *     DomainIdEquals?: string,
 *     UserProfileNameEquals?: string,
 *     SpaceNameEquals?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listArtifacts(array $args = [])
 * @phpstan-method \Aws\Result listArtifacts(array{
 *     SourceUri?: string,
 *     ArtifactType?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listArtifactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listArtifactsAsync(array{
 *     SourceUri?: string,
 *     ArtifactType?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssociations(array $args = [])
 * @phpstan-method \Aws\Result listAssociations(array{
 *     SourceArn?: string,
 *     DestinationArn?: string,
 *     SourceType?: string,
 *     DestinationType?: string,
 *     AssociationType?: 'AssociatedWith'|'ContributedTo'|'DerivedFrom'|'Produced'|'SameAs',
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'DestinationArn'|'DestinationType'|'SourceArn'|'SourceType',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociationsAsync(array{
 *     SourceArn?: string,
 *     DestinationArn?: string,
 *     SourceType?: string,
 *     DestinationType?: string,
 *     AssociationType?: 'AssociatedWith'|'ContributedTo'|'DerivedFrom'|'Produced'|'SameAs',
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'DestinationArn'|'DestinationType'|'SourceArn'|'SourceType',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAutoMLJobs(array $args = [])
 * @phpstan-method \Aws\Result listAutoMLJobs(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutoMLJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutoMLJobsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCandidatesForAutoMLJob(array $args = [])
 * @phpstan-method \Aws\Result listCandidatesForAutoMLJob(array{
 *     AutoMLJobName?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     CandidateNameEquals?: string,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime'|'FinalObjectiveMetricValue'|'Status',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCandidatesForAutoMLJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCandidatesForAutoMLJobAsync(array{
 *     AutoMLJobName?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     CandidateNameEquals?: string,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime'|'FinalObjectiveMetricValue'|'Status',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listClusterEvents(array $args = [])
 * @phpstan-method \Aws\Result listClusterEvents(array{
 *     ClusterName?: string,
 *     InstanceGroupName?: string,
 *     NodeId?: string,
 *     EventTimeAfter?: int|string|\DateTimeInterface,
 *     EventTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'EventTime',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ResourceType?: 'Cluster'|'Instance'|'InstanceGroup',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listClusterEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClusterEventsAsync(array{
 *     ClusterName?: string,
 *     InstanceGroupName?: string,
 *     NodeId?: string,
 *     EventTimeAfter?: int|string|\DateTimeInterface,
 *     EventTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'EventTime',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ResourceType?: 'Cluster'|'Instance'|'InstanceGroup',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listClusterNodes(array $args = [])
 * @phpstan-method \Aws\Result listClusterNodes(array{
 *     ClusterName?: string,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     InstanceGroupNameContains?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'CREATION_TIME'|'NAME',
 *     SortOrder?: 'Ascending'|'Descending',
 *     IncludeNodeLogicalIds?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listClusterNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClusterNodesAsync(array{
 *     ClusterName?: string,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     InstanceGroupNameContains?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'CREATION_TIME'|'NAME',
 *     SortOrder?: 'Ascending'|'Descending',
 *     IncludeNodeLogicalIds?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listClusterSchedulerConfigs(array $args = [])
 * @phpstan-method \Aws\Result listClusterSchedulerConfigs(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     ClusterArn?: string,
 *     Status?: 'CreateFailed'|'CreateRollbackFailed'|'Created'|'Creating'|'DeleteFailed'|'DeleteRollbackFailed'|'Deleted'|'Deleting'|'UpdateFailed'|'UpdateRollbackFailed'|'Updated'|'Updating',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listClusterSchedulerConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClusterSchedulerConfigsAsync(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     ClusterArn?: string,
 *     Status?: 'CreateFailed'|'CreateRollbackFailed'|'Created'|'Creating'|'DeleteFailed'|'DeleteRollbackFailed'|'Deleted'|'Deleting'|'UpdateFailed'|'UpdateRollbackFailed'|'Updated'|'Updating',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CREATION_TIME'|'NAME',
 *     SortOrder?: 'Ascending'|'Descending',
 *     TrainingPlanArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CREATION_TIME'|'NAME',
 *     SortOrder?: 'Ascending'|'Descending',
 *     TrainingPlanArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCodeRepositories(array $args = [])
 * @phpstan-method \Aws\Result listCodeRepositories(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'LastModifiedTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeRepositoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeRepositoriesAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'LastModifiedTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCompilationJobs(array $args = [])
 * @phpstan-method \Aws\Result listCompilationJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'COMPLETED'|'FAILED'|'INPROGRESS'|'STARTING'|'STOPPED'|'STOPPING',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCompilationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCompilationJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'COMPLETED'|'FAILED'|'INPROGRESS'|'STARTING'|'STOPPED'|'STOPPING',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listComputeQuotas(array $args = [])
 * @phpstan-method \Aws\Result listComputeQuotas(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     Status?: 'CreateFailed'|'CreateRollbackFailed'|'Created'|'Creating'|'DeleteFailed'|'DeleteRollbackFailed'|'Deleted'|'Deleting'|'UpdateFailed'|'UpdateRollbackFailed'|'Updated'|'Updating',
 *     ClusterArn?: string,
 *     SortBy?: 'ClusterArn'|'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listComputeQuotasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComputeQuotasAsync(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     Status?: 'CreateFailed'|'CreateRollbackFailed'|'Created'|'Creating'|'DeleteFailed'|'DeleteRollbackFailed'|'Deleted'|'Deleting'|'UpdateFailed'|'UpdateRollbackFailed'|'Updated'|'Updating',
 *     ClusterArn?: string,
 *     SortBy?: 'ClusterArn'|'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listContexts(array $args = [])
 * @phpstan-method \Aws\Result listContexts(array{
 *     SourceUri?: string,
 *     ContextType?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listContextsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContextsAsync(array{
 *     SourceUri?: string,
 *     ContextType?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataQualityJobDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listDataQualityJobDefinitions(array{
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataQualityJobDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataQualityJobDefinitionsAsync(array{
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDeviceFleets(array $args = [])
 * @phpstan-method \Aws\Result listDeviceFleets(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     SortBy?: 'CREATION_TIME'|'LAST_MODIFIED_TIME'|'NAME',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeviceFleetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDeviceFleetsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     SortBy?: 'CREATION_TIME'|'LAST_MODIFIED_TIME'|'NAME',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDevices(array $args = [])
 * @phpstan-method \Aws\Result listDevices(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     LatestHeartbeatAfter?: int|string|\DateTimeInterface,
 *     ModelName?: string,
 *     DeviceFleetName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevicesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     LatestHeartbeatAfter?: int|string|\DateTimeInterface,
 *     ModelName?: string,
 *     DeviceFleetName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listEdgeDeploymentPlans(array $args = [])
 * @phpstan-method \Aws\Result listEdgeDeploymentPlans(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     DeviceFleetNameContains?: string,
 *     SortBy?: 'CREATION_TIME'|'DEVICE_FLEET_NAME'|'LAST_MODIFIED_TIME'|'NAME',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEdgeDeploymentPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEdgeDeploymentPlansAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     DeviceFleetNameContains?: string,
 *     SortBy?: 'CREATION_TIME'|'DEVICE_FLEET_NAME'|'LAST_MODIFIED_TIME'|'NAME',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEdgePackagingJobs(array $args = [])
 * @phpstan-method \Aws\Result listEdgePackagingJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     ModelNameContains?: string,
 *     StatusEquals?: 'COMPLETED'|'FAILED'|'INPROGRESS'|'STARTING'|'STOPPED'|'STOPPING',
 *     SortBy?: 'CREATION_TIME'|'LAST_MODIFIED_TIME'|'MODEL_NAME'|'NAME'|'STATUS',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEdgePackagingJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEdgePackagingJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     ModelNameContains?: string,
 *     StatusEquals?: 'COMPLETED'|'FAILED'|'INPROGRESS'|'STARTING'|'STOPPED'|'STOPPING',
 *     SortBy?: 'CREATION_TIME'|'LAST_MODIFIED_TIME'|'MODEL_NAME'|'NAME'|'STATUS',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEndpointConfigs(array $args = [])
 * @phpstan-method \Aws\Result listEndpointConfigs(array{
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEndpointConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEndpointConfigsAsync(array{
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listEndpoints(array{
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Creating'|'Deleting'|'Failed'|'InService'|'OutOfService'|'RollingBack'|'SystemUpdating'|'UpdateRollbackFailed'|'Updating',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEndpointsAsync(array{
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Creating'|'Deleting'|'Failed'|'InService'|'OutOfService'|'RollingBack'|'SystemUpdating'|'UpdateRollbackFailed'|'Updating',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listExperiments(array $args = [])
 * @phpstan-method \Aws\Result listExperiments(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExperimentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExperimentsAsync(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFeatureGroups(array $args = [])
 * @phpstan-method \Aws\Result listFeatureGroups(array{
 *     NameContains?: string,
 *     FeatureGroupStatusEquals?: 'CreateFailed'|'Created'|'Creating'|'DeleteFailed'|'Deleting',
 *     OfflineStoreStatusEquals?: 'Active'|'Blocked'|'Disabled',
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime'|'FeatureGroupStatus'|'Name'|'OfflineStoreStatus',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFeatureGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFeatureGroupsAsync(array{
 *     NameContains?: string,
 *     FeatureGroupStatusEquals?: 'CreateFailed'|'Created'|'Creating'|'DeleteFailed'|'Deleting',
 *     OfflineStoreStatusEquals?: 'Active'|'Blocked'|'Disabled',
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime'|'FeatureGroupStatus'|'Name'|'OfflineStoreStatus',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFlowDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listFlowDefinitions(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowDefinitionsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listHubContentVersions(array $args = [])
 * @phpstan-method \Aws\Result listHubContentVersions(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentName?: string,
 *     MinVersion?: string,
 *     MaxSchemaVersion?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'HubContentName'|'HubContentStatus',
 *     SortOrder?: 'Ascending'|'Descending',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHubContentVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHubContentVersionsAsync(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentName?: string,
 *     MinVersion?: string,
 *     MaxSchemaVersion?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'HubContentName'|'HubContentStatus',
 *     SortOrder?: 'Ascending'|'Descending',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listHubContents(array $args = [])
 * @phpstan-method \Aws\Result listHubContents(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     NameContains?: string,
 *     MaxSchemaVersion?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'HubContentName'|'HubContentStatus',
 *     SortOrder?: 'Ascending'|'Descending',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHubContentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHubContentsAsync(array{
 *     HubName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     NameContains?: string,
 *     MaxSchemaVersion?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'HubContentName'|'HubContentStatus',
 *     SortOrder?: 'Ascending'|'Descending',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listHubs(array $args = [])
 * @phpstan-method \Aws\Result listHubs(array{
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     SortBy?: 'AccountIdOwner'|'CreationTime'|'HubName'|'HubStatus',
 *     SortOrder?: 'Ascending'|'Descending',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHubsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHubsAsync(array{
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     SortBy?: 'AccountIdOwner'|'CreationTime'|'HubName'|'HubStatus',
 *     SortOrder?: 'Ascending'|'Descending',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listHumanTaskUis(array $args = [])
 * @phpstan-method \Aws\Result listHumanTaskUis(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHumanTaskUisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHumanTaskUisAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listHyperParameterTuningJobs(array $args = [])
 * @phpstan-method \Aws\Result listHyperParameterTuningJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NameContains?: string,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Completed'|'DeleteFailed'|'Deleting'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listHyperParameterTuningJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listHyperParameterTuningJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NameContains?: string,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Completed'|'DeleteFailed'|'Deleting'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImageVersions(array $args = [])
 * @phpstan-method \Aws\Result listImageVersions(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     ImageName?: string,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'CREATION_TIME'|'LAST_MODIFIED_TIME'|'VERSION',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImageVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImageVersionsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     ImageName?: string,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     SortBy?: 'CREATION_TIME'|'LAST_MODIFIED_TIME'|'VERSION',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImages(array $args = [])
 * @phpstan-method \Aws\Result listImages(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CREATION_TIME'|'IMAGE_NAME'|'LAST_MODIFIED_TIME',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImagesAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CREATION_TIME'|'IMAGE_NAME'|'LAST_MODIFIED_TIME',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInferenceComponents(array $args = [])
 * @phpstan-method \Aws\Result listInferenceComponents(array{
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Creating'|'Deleting'|'Failed'|'InService'|'Updating',
 *     EndpointNameEquals?: string,
 *     VariantNameEquals?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInferenceComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInferenceComponentsAsync(array{
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Creating'|'Deleting'|'Failed'|'InService'|'Updating',
 *     EndpointNameEquals?: string,
 *     VariantNameEquals?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInferenceExperiments(array $args = [])
 * @phpstan-method \Aws\Result listInferenceExperiments(array{
 *     NameContains?: string,
 *     Type?: 'ShadowMode',
 *     StatusEquals?: 'Cancelled'|'Completed'|'Created'|'Creating'|'Running'|'Starting'|'Stopping'|'Updating',
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInferenceExperimentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInferenceExperimentsAsync(array{
 *     NameContains?: string,
 *     Type?: 'ShadowMode',
 *     StatusEquals?: 'Cancelled'|'Completed'|'Created'|'Creating'|'Running'|'Starting'|'Stopping'|'Updating',
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInferenceRecommendationsJobSteps(array $args = [])
 * @phpstan-method \Aws\Result listInferenceRecommendationsJobSteps(array{
 *     JobName?: string,
 *     Status?: 'COMPLETED'|'DELETED'|'DELETING'|'FAILED'|'IN_PROGRESS'|'PENDING'|'STOPPED'|'STOPPING',
 *     StepType?: 'BENCHMARK',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInferenceRecommendationsJobStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInferenceRecommendationsJobStepsAsync(array{
 *     JobName?: string,
 *     Status?: 'COMPLETED'|'DELETED'|'DELETING'|'FAILED'|'IN_PROGRESS'|'PENDING'|'STOPPED'|'STOPPING',
 *     StepType?: 'BENCHMARK',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInferenceRecommendationsJobs(array $args = [])
 * @phpstan-method \Aws\Result listInferenceRecommendationsJobs(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'COMPLETED'|'DELETED'|'DELETING'|'FAILED'|'IN_PROGRESS'|'PENDING'|'STOPPED'|'STOPPING',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ModelNameEquals?: string,
 *     ModelPackageVersionArnEquals?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInferenceRecommendationsJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInferenceRecommendationsJobsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'COMPLETED'|'DELETED'|'DELETING'|'FAILED'|'IN_PROGRESS'|'PENDING'|'STOPPED'|'STOPPING',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ModelNameEquals?: string,
 *     ModelPackageVersionArnEquals?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobSchemaVersions(array $args = [])
 * @phpstan-method \Aws\Result listJobSchemaVersions(array{JobCategory?: 'AgentRFT'|'AgentRFTEvaluation', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobSchemaVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobSchemaVersionsAsync(array{JobCategory?: 'AgentRFT'|'AgentRFTEvaluation', NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{
 *     JobCategory?: 'AgentRFT'|'AgentRFTEvaluation',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     StatusEquals?: 'Completed'|'DeleteFailed'|'Deleting'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{
 *     JobCategory?: 'AgentRFT'|'AgentRFTEvaluation',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     StatusEquals?: 'Completed'|'DeleteFailed'|'Deleting'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLabelingJobs(array $args = [])
 * @phpstan-method \Aws\Result listLabelingJobs(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Initializing'|'Stopped'|'Stopping',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLabelingJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLabelingJobsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Initializing'|'Stopped'|'Stopping',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLabelingJobsForWorkteam(array $args = [])
 * @phpstan-method \Aws\Result listLabelingJobsForWorkteam(array{
 *     WorkteamArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     JobReferenceCodeContains?: string,
 *     SortBy?: 'CreationTime',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLabelingJobsForWorkteamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLabelingJobsForWorkteamAsync(array{
 *     WorkteamArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     JobReferenceCodeContains?: string,
 *     SortBy?: 'CreationTime',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLineageGroups(array $args = [])
 * @phpstan-method \Aws\Result listLineageGroups(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLineageGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLineageGroupsAsync(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMlflowApps(array $args = [])
 * @phpstan-method \Aws\Result listMlflowApps(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     Status?: 'CreateFailed'|'Created'|'Creating'|'DeleteFailed'|'Deleted'|'Deleting'|'UpdateFailed'|'Updated'|'Updating',
 *     MlflowVersion?: string,
 *     DefaultForDomainId?: string,
 *     AccountDefaultStatus?: 'DISABLED'|'ENABLED',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMlflowAppsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMlflowAppsAsync(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     Status?: 'CreateFailed'|'Created'|'Creating'|'DeleteFailed'|'Deleted'|'Deleting'|'UpdateFailed'|'Updated'|'Updating',
 *     MlflowVersion?: string,
 *     DefaultForDomainId?: string,
 *     AccountDefaultStatus?: 'DISABLED'|'ENABLED',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMlflowTrackingServers(array $args = [])
 * @phpstan-method \Aws\Result listMlflowTrackingServers(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     TrackingServerStatus?: 'CreateFailed'|'Created'|'Creating'|'DeleteFailed'|'Deleting'|'MaintenanceComplete'|'MaintenanceFailed'|'MaintenanceInProgress'|'StartFailed'|'Started'|'Starting'|'StopFailed'|'Stopped'|'Stopping'|'UpdateFailed'|'Updated'|'Updating',
 *     MlflowVersion?: string,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMlflowTrackingServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMlflowTrackingServersAsync(array{
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     TrackingServerStatus?: 'CreateFailed'|'Created'|'Creating'|'DeleteFailed'|'Deleting'|'MaintenanceComplete'|'MaintenanceFailed'|'MaintenanceInProgress'|'StartFailed'|'Started'|'Starting'|'StopFailed'|'Stopped'|'Stopping'|'UpdateFailed'|'Updated'|'Updating',
 *     MlflowVersion?: string,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelBiasJobDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listModelBiasJobDefinitions(array{
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelBiasJobDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelBiasJobDefinitionsAsync(array{
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelCardExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listModelCardExportJobs(array{
 *     ModelCardName?: string,
 *     ModelCardVersion?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     ModelCardExportJobNameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelCardExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelCardExportJobsAsync(array{
 *     ModelCardName?: string,
 *     ModelCardVersion?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     ModelCardExportJobNameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelCardVersions(array $args = [])
 * @phpstan-method \Aws\Result listModelCardVersions(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     ModelCardName?: string,
 *     ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview',
 *     NextToken?: string,
 *     SortBy?: 'Version',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelCardVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelCardVersionsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     ModelCardName?: string,
 *     ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview',
 *     NextToken?: string,
 *     SortBy?: 'Version',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelCards(array $args = [])
 * @phpstan-method \Aws\Result listModelCards(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview',
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelCardsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelCardsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview',
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelExplainabilityJobDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listModelExplainabilityJobDefinitions(array{
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelExplainabilityJobDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelExplainabilityJobDefinitionsAsync(array{
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelMetadata(array $args = [])
 * @phpstan-method \Aws\Result listModelMetadata(array{SearchExpression?: array{Filters?: list<array>, ...}, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelMetadataAsync(array{SearchExpression?: array{Filters?: list<array>, ...}, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listModelPackageGroups(array $args = [])
 * @phpstan-method \Aws\Result listModelPackageGroups(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     CrossAccountFilterOption?: 'CrossAccount'|'SameAccount',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelPackageGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelPackageGroupsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     CrossAccountFilterOption?: 'CrossAccount'|'SameAccount',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelPackages(array $args = [])
 * @phpstan-method \Aws\Result listModelPackages(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     ModelApprovalStatus?: 'Approved'|'PendingManualApproval'|'Rejected',
 *     ModelPackageGroupName?: string,
 *     ModelPackageType?: 'Both'|'Unversioned'|'Versioned',
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelPackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelPackagesAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     ModelApprovalStatus?: 'Approved'|'PendingManualApproval'|'Rejected',
 *     ModelPackageGroupName?: string,
 *     ModelPackageType?: 'Both'|'Unversioned'|'Versioned',
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModelQualityJobDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listModelQualityJobDefinitions(array{
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelQualityJobDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelQualityJobDefinitionsAsync(array{
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModels(array $args = [])
 * @phpstan-method \Aws\Result listModels(array{
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelsAsync(array{
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMonitoringAlertHistory(array $args = [])
 * @phpstan-method \Aws\Result listMonitoringAlertHistory(array{
 *     MonitoringScheduleName?: string,
 *     MonitoringAlertName?: string,
 *     SortBy?: 'CreationTime'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'InAlert'|'OK',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMonitoringAlertHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitoringAlertHistoryAsync(array{
 *     MonitoringScheduleName?: string,
 *     MonitoringAlertName?: string,
 *     SortBy?: 'CreationTime'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'InAlert'|'OK',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMonitoringAlerts(array $args = [])
 * @phpstan-method \Aws\Result listMonitoringAlerts(array{MonitoringScheduleName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMonitoringAlertsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitoringAlertsAsync(array{MonitoringScheduleName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMonitoringExecutions(array $args = [])
 * @phpstan-method \Aws\Result listMonitoringExecutions(array{
 *     MonitoringScheduleName?: string,
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'ScheduledTime'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ScheduledTimeBefore?: int|string|\DateTimeInterface,
 *     ScheduledTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Completed'|'CompletedWithViolations'|'Failed'|'InProgress'|'Pending'|'Stopped'|'Stopping',
 *     MonitoringJobDefinitionName?: string,
 *     MonitoringTypeEquals?: 'DataQuality'|'ModelBias'|'ModelExplainability'|'ModelQuality',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMonitoringExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitoringExecutionsAsync(array{
 *     MonitoringScheduleName?: string,
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'ScheduledTime'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ScheduledTimeBefore?: int|string|\DateTimeInterface,
 *     ScheduledTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Completed'|'CompletedWithViolations'|'Failed'|'InProgress'|'Pending'|'Stopped'|'Stopping',
 *     MonitoringJobDefinitionName?: string,
 *     MonitoringTypeEquals?: 'DataQuality'|'ModelBias'|'ModelExplainability'|'ModelQuality',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMonitoringSchedules(array $args = [])
 * @phpstan-method \Aws\Result listMonitoringSchedules(array{
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Failed'|'Pending'|'Scheduled'|'Stopped',
 *     MonitoringJobDefinitionName?: string,
 *     MonitoringTypeEquals?: 'DataQuality'|'ModelBias'|'ModelExplainability'|'ModelQuality',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMonitoringSchedulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitoringSchedulesAsync(array{
 *     EndpointName?: string,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Failed'|'Pending'|'Scheduled'|'Stopped',
 *     MonitoringJobDefinitionName?: string,
 *     MonitoringTypeEquals?: 'DataQuality'|'ModelBias'|'ModelExplainability'|'ModelQuality',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotebookInstanceLifecycleConfigs(array $args = [])
 * @phpstan-method \Aws\Result listNotebookInstanceLifecycleConfigs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortBy?: 'CreationTime'|'LastModifiedTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotebookInstanceLifecycleConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotebookInstanceLifecycleConfigsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortBy?: 'CreationTime'|'LastModifiedTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotebookInstances(array $args = [])
 * @phpstan-method \Aws\Result listNotebookInstances(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Deleting'|'Failed'|'InService'|'Pending'|'Stopped'|'Stopping'|'Updating',
 *     NotebookInstanceLifecycleConfigNameContains?: string,
 *     DefaultCodeRepositoryContains?: string,
 *     AdditionalCodeRepositoryEquals?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotebookInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotebookInstancesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NameContains?: string,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     StatusEquals?: 'Deleting'|'Failed'|'InService'|'Pending'|'Stopped'|'Stopping'|'Updating',
 *     NotebookInstanceLifecycleConfigNameContains?: string,
 *     DefaultCodeRepositoryContains?: string,
 *     AdditionalCodeRepositoryEquals?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOptimizationJobs(array $args = [])
 * @phpstan-method \Aws\Result listOptimizationJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     OptimizationContains?: string,
 *     NameContains?: string,
 *     StatusEquals?: 'COMPLETED'|'FAILED'|'INPROGRESS'|'STARTING'|'STOPPED'|'STOPPING',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOptimizationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOptimizationJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     OptimizationContains?: string,
 *     NameContains?: string,
 *     StatusEquals?: 'COMPLETED'|'FAILED'|'INPROGRESS'|'STARTING'|'STOPPED'|'STOPPING',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPartnerApps(array $args = [])
 * @phpstan-method \Aws\Result listPartnerApps(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPartnerAppsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPartnerAppsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPipelineExecutionSteps(array $args = [])
 * @phpstan-method \Aws\Result listPipelineExecutionSteps(array{
 *     PipelineExecutionArn?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPipelineExecutionStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelineExecutionStepsAsync(array{
 *     PipelineExecutionArn?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPipelineExecutions(array $args = [])
 * @phpstan-method \Aws\Result listPipelineExecutions(array{
 *     PipelineName?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'PipelineExecutionArn',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPipelineExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelineExecutionsAsync(array{
 *     PipelineName?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'PipelineExecutionArn',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPipelineParametersForExecution(array $args = [])
 * @phpstan-method \Aws\Result listPipelineParametersForExecution(array{PipelineExecutionArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPipelineParametersForExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelineParametersForExecutionAsync(array{PipelineExecutionArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPipelineVersions(array $args = [])
 * @phpstan-method \Aws\Result listPipelineVersions(array{
 *     PipelineName?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPipelineVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelineVersionsAsync(array{
 *     PipelineName?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPipelines(array $args = [])
 * @phpstan-method \Aws\Result listPipelines(array{
 *     PipelineNamePrefix?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelinesAsync(array{
 *     PipelineNamePrefix?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProcessingJobs(array $args = [])
 * @phpstan-method \Aws\Result listProcessingJobs(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProcessingJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProcessingJobsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @phpstan-method \Aws\Result listProjects(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     MaxResults?: int,
 *     NameContains?: string,
 *     NextToken?: string,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceCatalogs(array $args = [])
 * @phpstan-method \Aws\Result listResourceCatalogs(array{
 *     NameContains?: string,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceCatalogsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceCatalogsAsync(array{
 *     NameContains?: string,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSpaces(array $args = [])
 * @phpstan-method \Aws\Result listSpaces(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime'|'LastModifiedTime',
 *     DomainIdEquals?: string,
 *     SpaceNameContains?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSpacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpacesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime'|'LastModifiedTime',
 *     DomainIdEquals?: string,
 *     SpaceNameContains?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStageDevices(array $args = [])
 * @phpstan-method \Aws\Result listStageDevices(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     EdgeDeploymentPlanName?: string,
 *     ExcludeDevicesDeployedInOtherStage?: bool,
 *     StageName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStageDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStageDevicesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     EdgeDeploymentPlanName?: string,
 *     ExcludeDevicesDeployedInOtherStage?: bool,
 *     StageName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStudioLifecycleConfigs(array $args = [])
 * @phpstan-method \Aws\Result listStudioLifecycleConfigs(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     AppTypeEquals?: 'CodeEditor'|'JupyterLab'|'JupyterServer'|'KernelGateway',
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     ModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'LastModifiedTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listStudioLifecycleConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStudioLifecycleConfigsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     NameContains?: string,
 *     AppTypeEquals?: 'CodeEditor'|'JupyterLab'|'JupyterServer'|'KernelGateway',
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     ModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     ModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'LastModifiedTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSubscribedWorkteams(array $args = [])
 * @phpstan-method \Aws\Result listSubscribedWorkteams(array{NameContains?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscribedWorkteamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscribedWorkteamsAsync(array{NameContains?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTrainingJobs(array $args = [])
 * @phpstan-method \Aws\Result listTrainingJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Deleting'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     WarmPoolStatusEquals?: 'Available'|'InUse'|'Reused'|'Terminated',
 *     TrainingPlanArnEquals?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainingJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrainingJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Deleting'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     WarmPoolStatusEquals?: 'Available'|'InUse'|'Reused'|'Terminated',
 *     TrainingPlanArnEquals?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTrainingJobsForHyperParameterTuningJob(array $args = [])
 * @phpstan-method \Aws\Result listTrainingJobsForHyperParameterTuningJob(array{
 *     HyperParameterTuningJobName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StatusEquals?: 'Completed'|'Deleting'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     SortBy?: 'CreationTime'|'FinalObjectiveMetricValue'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainingJobsForHyperParameterTuningJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrainingJobsForHyperParameterTuningJobAsync(array{
 *     HyperParameterTuningJobName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StatusEquals?: 'Completed'|'Deleting'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     SortBy?: 'CreationTime'|'FinalObjectiveMetricValue'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTrainingPlans(array $args = [])
 * @phpstan-method \Aws\Result listTrainingPlans(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StartTimeAfter?: int|string|\DateTimeInterface,
 *     StartTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'StartTime'|'Status'|'TrainingPlanName',
 *     SortOrder?: 'Ascending'|'Descending',
 *     Filters?: list<array{Name?: 'Status', Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainingPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrainingPlansAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StartTimeAfter?: int|string|\DateTimeInterface,
 *     StartTimeBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'StartTime'|'Status'|'TrainingPlanName',
 *     SortOrder?: 'Ascending'|'Descending',
 *     Filters?: list<array{Name?: 'Status', Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTransformJobs(array $args = [])
 * @phpstan-method \Aws\Result listTransformJobs(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTransformJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTransformJobsAsync(array{
 *     CreationTimeAfter?: int|string|\DateTimeInterface,
 *     CreationTimeBefore?: int|string|\DateTimeInterface,
 *     LastModifiedTimeAfter?: int|string|\DateTimeInterface,
 *     LastModifiedTimeBefore?: int|string|\DateTimeInterface,
 *     NameContains?: string,
 *     StatusEquals?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping',
 *     SortBy?: 'CreationTime'|'Name'|'Status',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTrialComponents(array $args = [])
 * @phpstan-method \Aws\Result listTrialComponents(array{
 *     ExperimentName?: string,
 *     TrialName?: string,
 *     SourceArn?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrialComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrialComponentsAsync(array{
 *     ExperimentName?: string,
 *     TrialName?: string,
 *     SourceArn?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTrials(array $args = [])
 * @phpstan-method \Aws\Result listTrials(array{
 *     ExperimentName?: string,
 *     TrialComponentName?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrialsAsync(array{
 *     ExperimentName?: string,
 *     TrialComponentName?: string,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     SortBy?: 'CreationTime'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listUltraServersByReservedCapacity(array $args = [])
 * @phpstan-method \Aws\Result listUltraServersByReservedCapacity(array{ReservedCapacityArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUltraServersByReservedCapacityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUltraServersByReservedCapacityAsync(array{ReservedCapacityArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listUserProfiles(array $args = [])
 * @phpstan-method \Aws\Result listUserProfiles(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime'|'LastModifiedTime',
 *     DomainIdEquals?: string,
 *     UserProfileNameContains?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserProfilesAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SortOrder?: 'Ascending'|'Descending',
 *     SortBy?: 'CreationTime'|'LastModifiedTime',
 *     DomainIdEquals?: string,
 *     UserProfileNameContains?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkforces(array $args = [])
 * @phpstan-method \Aws\Result listWorkforces(array{
 *     SortBy?: 'CreateDate'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkforcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkforcesAsync(array{
 *     SortBy?: 'CreateDate'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listWorkteams(array $args = [])
 * @phpstan-method \Aws\Result listWorkteams(array{
 *     SortBy?: 'CreateDate'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkteamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkteamsAsync(array{
 *     SortBy?: 'CreateDate'|'Name',
 *     SortOrder?: 'Ascending'|'Descending',
 *     NameContains?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putModelPackageGroupPolicy(array $args = [])
 * @phpstan-method \Aws\Result putModelPackageGroupPolicy(array{ModelPackageGroupName?: string, ResourcePolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putModelPackageGroupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putModelPackageGroupPolicyAsync(array{ModelPackageGroupName?: string, ResourcePolicy?: string, ...} $args = [])
 * @method \Aws\Result queryLineage(array $args = [])
 * @phpstan-method \Aws\Result queryLineage(array{
 *     StartArns?: list<string>,
 *     Direction?: 'Ascendants'|'Both'|'Descendants',
 *     IncludeEdges?: bool,
 *     Filters?: array{
 *         Types?: list<string>,
 *         LineageTypes?: list<'Action'|'Artifact'|'Context'|'TrialComponent'>,
 *         CreatedBefore?: int|string|\DateTimeInterface,
 *         CreatedAfter?: int|string|\DateTimeInterface,
 *         ModifiedBefore?: int|string|\DateTimeInterface,
 *         ModifiedAfter?: int|string|\DateTimeInterface,
 *         Properties?: array<string, string>,
 *         ...,
 *     },
 *     MaxDepth?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise queryLineageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryLineageAsync(array{
 *     StartArns?: list<string>,
 *     Direction?: 'Ascendants'|'Both'|'Descendants',
 *     IncludeEdges?: bool,
 *     Filters?: array{
 *         Types?: list<string>,
 *         LineageTypes?: list<'Action'|'Artifact'|'Context'|'TrialComponent'>,
 *         CreatedBefore?: int|string|\DateTimeInterface,
 *         CreatedAfter?: int|string|\DateTimeInterface,
 *         ModifiedBefore?: int|string|\DateTimeInterface,
 *         ModifiedAfter?: int|string|\DateTimeInterface,
 *         Properties?: array<string, string>,
 *         ...,
 *     },
 *     MaxDepth?: int,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerDevices(array $args = [])
 * @phpstan-method \Aws\Result registerDevices(array{
 *     DeviceFleetName?: string,
 *     Devices?: list<array{DeviceName?: string, Description?: string, IotThingName?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerDevicesAsync(array{
 *     DeviceFleetName?: string,
 *     Devices?: list<array{DeviceName?: string, Description?: string, IotThingName?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result renderUiTemplate(array $args = [])
 * @phpstan-method \Aws\Result renderUiTemplate(array{
 *     UiTemplate?: array{Content?: string, ...},
 *     Task?: array{Input?: string, ...},
 *     RoleArn?: string,
 *     HumanTaskUiArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise renderUiTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise renderUiTemplateAsync(array{
 *     UiTemplate?: array{Content?: string, ...},
 *     Task?: array{Input?: string, ...},
 *     RoleArn?: string,
 *     HumanTaskUiArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result retryPipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result retryPipelineExecution(array{
 *     PipelineExecutionArn?: string,
 *     ClientRequestToken?: string,
 *     ParallelismConfiguration?: array{MaxParallelExecutionSteps?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise retryPipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retryPipelineExecutionAsync(array{
 *     PipelineExecutionArn?: string,
 *     ClientRequestToken?: string,
 *     ParallelismConfiguration?: array{MaxParallelExecutionSteps?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result search(array $args = [])
 * @phpstan-method \Aws\Result search(array{
 *     Resource?: 'Endpoint'|'Experiment'|'ExperimentTrial'|'ExperimentTrialComponent'|'FeatureGroup'|'FeatureMetadata'|'HyperParameterTuningJob'|'Image'|'ImageVersion'|'Job'|'Model'|'ModelCard'|'ModelPackage'|'ModelPackageGroup'|'Pipeline'|'PipelineExecution'|'PipelineVersion'|'Project'|'TrainingJob',
 *     SearchExpression?: array{
 *         Filters?: list<array>,
 *         NestedFilters?: list<array>,
 *         SubExpressions?: list<array>,
 *         Operator?: 'And'|'Or',
 *         ...,
 *     },
 *     SortBy?: string,
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CrossAccountFilterOption?: 'CrossAccount'|'SameAccount',
 *     VisibilityConditions?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAsync(array{
 *     Resource?: 'Endpoint'|'Experiment'|'ExperimentTrial'|'ExperimentTrialComponent'|'FeatureGroup'|'FeatureMetadata'|'HyperParameterTuningJob'|'Image'|'ImageVersion'|'Job'|'Model'|'ModelCard'|'ModelPackage'|'ModelPackageGroup'|'Pipeline'|'PipelineExecution'|'PipelineVersion'|'Project'|'TrainingJob',
 *     SearchExpression?: array{
 *         Filters?: list<array>,
 *         NestedFilters?: list<array>,
 *         SubExpressions?: list<array>,
 *         Operator?: 'And'|'Or',
 *         ...,
 *     },
 *     SortBy?: string,
 *     SortOrder?: 'Ascending'|'Descending',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CrossAccountFilterOption?: 'CrossAccount'|'SameAccount',
 *     VisibilityConditions?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchTrainingPlanOfferings(array $args = [])
 * @phpstan-method \Aws\Result searchTrainingPlanOfferings(array{
 *     InstanceType?: 'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.trn1.32xlarge'|'ml.trn2.48xlarge',
 *     InstanceCount?: int,
 *     UltraServerType?: string,
 *     UltraServerCount?: int,
 *     StartTimeAfter?: int|string|\DateTimeInterface,
 *     EndTimeBefore?: int|string|\DateTimeInterface,
 *     DurationHours?: int,
 *     TargetResources?: list<'endpoint'|'hyperpod-cluster'|'studio-apps'|'training-job'>,
 *     TrainingPlanArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchTrainingPlanOfferingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchTrainingPlanOfferingsAsync(array{
 *     InstanceType?: 'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.trn1.32xlarge'|'ml.trn2.48xlarge',
 *     InstanceCount?: int,
 *     UltraServerType?: string,
 *     UltraServerCount?: int,
 *     StartTimeAfter?: int|string|\DateTimeInterface,
 *     EndTimeBefore?: int|string|\DateTimeInterface,
 *     DurationHours?: int,
 *     TargetResources?: list<'endpoint'|'hyperpod-cluster'|'studio-apps'|'training-job'>,
 *     TrainingPlanArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendPipelineExecutionStepFailure(array $args = [])
 * @phpstan-method \Aws\Result sendPipelineExecutionStepFailure(array{CallbackToken?: string, FailureReason?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendPipelineExecutionStepFailureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendPipelineExecutionStepFailureAsync(array{CallbackToken?: string, FailureReason?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result sendPipelineExecutionStepSuccess(array $args = [])
 * @phpstan-method \Aws\Result sendPipelineExecutionStepSuccess(array{
 *     CallbackToken?: string,
 *     OutputParameters?: list<array{Name?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendPipelineExecutionStepSuccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendPipelineExecutionStepSuccessAsync(array{
 *     CallbackToken?: string,
 *     OutputParameters?: list<array{Name?: string, Value?: string, ...}>,
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startClusterHealthCheck(array $args = [])
 * @phpstan-method \Aws\Result startClusterHealthCheck(array{
 *     ClusterName?: string,
 *     DeepHealthCheckConfigurations?: list<array{
 *         InstanceGroupName?: string,
 *         InstanceIds?: list<string>,
 *         DeepHealthChecks?: list<'InstanceConnectivity'|'InstanceStress'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startClusterHealthCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startClusterHealthCheckAsync(array{
 *     ClusterName?: string,
 *     DeepHealthCheckConfigurations?: list<array{
 *         InstanceGroupName?: string,
 *         InstanceIds?: list<string>,
 *         DeepHealthChecks?: list<'InstanceConnectivity'|'InstanceStress'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startEdgeDeploymentStage(array $args = [])
 * @phpstan-method \Aws\Result startEdgeDeploymentStage(array{EdgeDeploymentPlanName?: string, StageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startEdgeDeploymentStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEdgeDeploymentStageAsync(array{EdgeDeploymentPlanName?: string, StageName?: string, ...} $args = [])
 * @method \Aws\Result startInferenceExperiment(array $args = [])
 * @phpstan-method \Aws\Result startInferenceExperiment(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startInferenceExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startInferenceExperimentAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result startMlflowTrackingServer(array $args = [])
 * @phpstan-method \Aws\Result startMlflowTrackingServer(array{TrackingServerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMlflowTrackingServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMlflowTrackingServerAsync(array{TrackingServerName?: string, ...} $args = [])
 * @method \Aws\Result startMonitoringSchedule(array $args = [])
 * @phpstan-method \Aws\Result startMonitoringSchedule(array{MonitoringScheduleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMonitoringScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMonitoringScheduleAsync(array{MonitoringScheduleName?: string, ...} $args = [])
 * @method \Aws\Result startNotebookInstance(array $args = [])
 * @phpstan-method \Aws\Result startNotebookInstance(array{NotebookInstanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startNotebookInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNotebookInstanceAsync(array{NotebookInstanceName?: string, ...} $args = [])
 * @method \Aws\Result startPipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result startPipelineExecution(array{
 *     PipelineName?: string,
 *     PipelineExecutionDisplayName?: string,
 *     PipelineParameters?: list<array{Name?: string, Value?: string, ...}>,
 *     PipelineExecutionDescription?: string,
 *     ClientRequestToken?: string,
 *     ParallelismConfiguration?: array{MaxParallelExecutionSteps?: int, ...},
 *     SelectiveExecutionConfig?: array{SourcePipelineExecutionArn?: string, SelectedSteps?: list<array>, ...},
 *     PipelineVersionId?: int,
 *     MlflowExperimentName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startPipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPipelineExecutionAsync(array{
 *     PipelineName?: string,
 *     PipelineExecutionDisplayName?: string,
 *     PipelineParameters?: list<array{Name?: string, Value?: string, ...}>,
 *     PipelineExecutionDescription?: string,
 *     ClientRequestToken?: string,
 *     ParallelismConfiguration?: array{MaxParallelExecutionSteps?: int, ...},
 *     SelectiveExecutionConfig?: array{SourcePipelineExecutionArn?: string, SelectedSteps?: list<array>, ...},
 *     PipelineVersionId?: int,
 *     MlflowExperimentName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSession(array $args = [])
 * @phpstan-method \Aws\Result startSession(array{ResourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSessionAsync(array{ResourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result stopAIBenchmarkJob(array $args = [])
 * @phpstan-method \Aws\Result stopAIBenchmarkJob(array{AIBenchmarkJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAIBenchmarkJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAIBenchmarkJobAsync(array{AIBenchmarkJobName?: string, ...} $args = [])
 * @method \Aws\Result stopAIRecommendationJob(array $args = [])
 * @phpstan-method \Aws\Result stopAIRecommendationJob(array{AIRecommendationJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAIRecommendationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAIRecommendationJobAsync(array{AIRecommendationJobName?: string, ...} $args = [])
 * @method \Aws\Result stopAutoMLJob(array $args = [])
 * @phpstan-method \Aws\Result stopAutoMLJob(array{AutoMLJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAutoMLJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAutoMLJobAsync(array{AutoMLJobName?: string, ...} $args = [])
 * @method \Aws\Result stopCompilationJob(array $args = [])
 * @phpstan-method \Aws\Result stopCompilationJob(array{CompilationJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopCompilationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCompilationJobAsync(array{CompilationJobName?: string, ...} $args = [])
 * @method \Aws\Result stopEdgeDeploymentStage(array $args = [])
 * @phpstan-method \Aws\Result stopEdgeDeploymentStage(array{EdgeDeploymentPlanName?: string, StageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEdgeDeploymentStageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopEdgeDeploymentStageAsync(array{EdgeDeploymentPlanName?: string, StageName?: string, ...} $args = [])
 * @method \Aws\Result stopEdgePackagingJob(array $args = [])
 * @phpstan-method \Aws\Result stopEdgePackagingJob(array{EdgePackagingJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEdgePackagingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopEdgePackagingJobAsync(array{EdgePackagingJobName?: string, ...} $args = [])
 * @method \Aws\Result stopHyperParameterTuningJob(array $args = [])
 * @phpstan-method \Aws\Result stopHyperParameterTuningJob(array{HyperParameterTuningJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopHyperParameterTuningJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopHyperParameterTuningJobAsync(array{HyperParameterTuningJobName?: string, ...} $args = [])
 * @method \Aws\Result stopInferenceExperiment(array $args = [])
 * @phpstan-method \Aws\Result stopInferenceExperiment(array{
 *     Name?: string,
 *     ModelVariantActions?: array<string, 'Promote'|'Remove'|'Retain'>,
 *     DesiredModelVariants?: list<array{ModelName?: string, VariantName?: string, InfrastructureConfig?: array, ...}>,
 *     DesiredState?: 'Cancelled'|'Completed',
 *     Reason?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise stopInferenceExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopInferenceExperimentAsync(array{
 *     Name?: string,
 *     ModelVariantActions?: array<string, 'Promote'|'Remove'|'Retain'>,
 *     DesiredModelVariants?: list<array{ModelName?: string, VariantName?: string, InfrastructureConfig?: array, ...}>,
 *     DesiredState?: 'Cancelled'|'Completed',
 *     Reason?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopInferenceRecommendationsJob(array $args = [])
 * @phpstan-method \Aws\Result stopInferenceRecommendationsJob(array{JobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopInferenceRecommendationsJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopInferenceRecommendationsJobAsync(array{JobName?: string, ...} $args = [])
 * @method \Aws\Result stopJob(array $args = [])
 * @phpstan-method \Aws\Result stopJob(array{JobName?: string, JobCategory?: 'AgentRFT'|'AgentRFTEvaluation', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopJobAsync(array{JobName?: string, JobCategory?: 'AgentRFT'|'AgentRFTEvaluation', ...} $args = [])
 * @method \Aws\Result stopLabelingJob(array $args = [])
 * @phpstan-method \Aws\Result stopLabelingJob(array{LabelingJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopLabelingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopLabelingJobAsync(array{LabelingJobName?: string, ...} $args = [])
 * @method \Aws\Result stopMlflowTrackingServer(array $args = [])
 * @phpstan-method \Aws\Result stopMlflowTrackingServer(array{TrackingServerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopMlflowTrackingServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopMlflowTrackingServerAsync(array{TrackingServerName?: string, ...} $args = [])
 * @method \Aws\Result stopMonitoringSchedule(array $args = [])
 * @phpstan-method \Aws\Result stopMonitoringSchedule(array{MonitoringScheduleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopMonitoringScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopMonitoringScheduleAsync(array{MonitoringScheduleName?: string, ...} $args = [])
 * @method \Aws\Result stopNotebookInstance(array $args = [])
 * @phpstan-method \Aws\Result stopNotebookInstance(array{NotebookInstanceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopNotebookInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopNotebookInstanceAsync(array{NotebookInstanceName?: string, ...} $args = [])
 * @method \Aws\Result stopOptimizationJob(array $args = [])
 * @phpstan-method \Aws\Result stopOptimizationJob(array{OptimizationJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopOptimizationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopOptimizationJobAsync(array{OptimizationJobName?: string, ...} $args = [])
 * @method \Aws\Result stopPipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result stopPipelineExecution(array{PipelineExecutionArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopPipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopPipelineExecutionAsync(array{PipelineExecutionArn?: string, ClientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result stopProcessingJob(array $args = [])
 * @phpstan-method \Aws\Result stopProcessingJob(array{ProcessingJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopProcessingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopProcessingJobAsync(array{ProcessingJobName?: string, ...} $args = [])
 * @method \Aws\Result stopTrainingJob(array $args = [])
 * @phpstan-method \Aws\Result stopTrainingJob(array{TrainingJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTrainingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTrainingJobAsync(array{TrainingJobName?: string, ...} $args = [])
 * @method \Aws\Result stopTransformJob(array $args = [])
 * @phpstan-method \Aws\Result stopTransformJob(array{TransformJobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTransformJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTransformJobAsync(array{TransformJobName?: string, ...} $args = [])
 * @method \Aws\Result updateAction(array $args = [])
 * @phpstan-method \Aws\Result updateAction(array{
 *     ActionName?: string,
 *     Description?: string,
 *     Status?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping'|'Unknown',
 *     Properties?: array<string, string>,
 *     PropertiesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateActionAsync(array{
 *     ActionName?: string,
 *     Description?: string,
 *     Status?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping'|'Unknown',
 *     Properties?: array<string, string>,
 *     PropertiesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAppImageConfig(array $args = [])
 * @phpstan-method \Aws\Result updateAppImageConfig(array{
 *     AppImageConfigName?: string,
 *     KernelGatewayImageConfig?: array{
 *         KernelSpecs?: list<array>,
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ...,
 *     },
 *     JupyterLabAppImageConfig?: array{
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ContainerConfig?: array{
 *             ContainerArguments?: list<string>,
 *             ContainerEntrypoint?: list<string>,
 *             ContainerEnvironmentVariables?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     CodeEditorAppImageConfig?: array{
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ContainerConfig?: array{
 *             ContainerArguments?: list<string>,
 *             ContainerEntrypoint?: list<string>,
 *             ContainerEnvironmentVariables?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppImageConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppImageConfigAsync(array{
 *     AppImageConfigName?: string,
 *     KernelGatewayImageConfig?: array{
 *         KernelSpecs?: list<array>,
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ...,
 *     },
 *     JupyterLabAppImageConfig?: array{
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ContainerConfig?: array{
 *             ContainerArguments?: list<string>,
 *             ContainerEntrypoint?: list<string>,
 *             ContainerEnvironmentVariables?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     CodeEditorAppImageConfig?: array{
 *         FileSystemConfig?: array{MountPath?: string, DefaultUid?: int, DefaultGid?: int, ...},
 *         ContainerConfig?: array{
 *             ContainerArguments?: list<string>,
 *             ContainerEntrypoint?: list<string>,
 *             ContainerEnvironmentVariables?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateArtifact(array $args = [])
 * @phpstan-method \Aws\Result updateArtifact(array{
 *     ArtifactArn?: string,
 *     ArtifactName?: string,
 *     Properties?: array<string, string>,
 *     PropertiesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateArtifactAsync(array{
 *     ArtifactArn?: string,
 *     ArtifactName?: string,
 *     Properties?: array<string, string>,
 *     PropertiesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCluster(array $args = [])
 * @phpstan-method \Aws\Result updateCluster(array{
 *     ClusterName?: string,
 *     InstanceGroups?: list<array{
 *         InstanceCount?: int,
 *         MinInstanceCount?: int,
 *         InstanceGroupName?: string,
 *         InstanceType?: 'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.large'|'ml.c6a.12xlarge'|'ml.c6a.16xlarge'|'ml.c6a.24xlarge'|'ml.c6a.2xlarge'|'ml.c6a.32xlarge'|'ml.c6a.48xlarge'|'ml.c6a.4xlarge'|'ml.c6a.8xlarge'|'ml.c6a.large'|'ml.c6a.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.medium'|'ml.c6g.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.medium'|'ml.c7g.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.gr6.4xlarge'|'ml.gr6.8xlarge'|'ml.i3en.12xlarge'|'ml.i3en.24xlarge'|'ml.i3en.2xlarge'|'ml.i3en.3xlarge'|'ml.i3en.6xlarge'|'ml.i3en.large'|'ml.i3en.xlarge'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6a.12xlarge'|'ml.m6a.16xlarge'|'ml.m6a.24xlarge'|'ml.m6a.2xlarge'|'ml.m6a.32xlarge'|'ml.m6a.48xlarge'|'ml.m6a.4xlarge'|'ml.m6a.8xlarge'|'ml.m6a.large'|'ml.m6a.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.medium'|'ml.m6g.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7g.12xlarge'|'ml.m7g.16xlarge'|'ml.m7g.2xlarge'|'ml.m7g.4xlarge'|'ml.m7g.8xlarge'|'ml.m7g.large'|'ml.m7g.medium'|'ml.m7g.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5d.16xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.3xlarge'|'ml.trn2.48xlarge',
 *         InstanceRequirements?: array,
 *         LifeCycleConfig?: array,
 *         ExecutionRole?: string,
 *         ThreadsPerCore?: int,
 *         InstanceStorageConfigs?: list<array>,
 *         OnStartDeepHealthChecks?: list<'InstanceConnectivity'|'InstanceStress'>,
 *         TrainingPlanArn?: string,
 *         OverrideVpcConfig?: array,
 *         ScheduledUpdateConfig?: array,
 *         ImageId?: string,
 *         AutoPatchConfig?: array,
 *         ImageReleaseVersion?: string,
 *         KubernetesConfig?: array,
 *         SlurmConfig?: array,
 *         CapacityRequirements?: array,
 *         NetworkInterface?: array,
 *         ...,
 *     }>,
 *     RestrictedInstanceGroups?: list<array{
 *         InstanceCount?: int,
 *         InstanceGroupName?: string,
 *         InstanceType?: 'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.large'|'ml.c6a.12xlarge'|'ml.c6a.16xlarge'|'ml.c6a.24xlarge'|'ml.c6a.2xlarge'|'ml.c6a.32xlarge'|'ml.c6a.48xlarge'|'ml.c6a.4xlarge'|'ml.c6a.8xlarge'|'ml.c6a.large'|'ml.c6a.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.medium'|'ml.c6g.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.medium'|'ml.c7g.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.gr6.4xlarge'|'ml.gr6.8xlarge'|'ml.i3en.12xlarge'|'ml.i3en.24xlarge'|'ml.i3en.2xlarge'|'ml.i3en.3xlarge'|'ml.i3en.6xlarge'|'ml.i3en.large'|'ml.i3en.xlarge'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6a.12xlarge'|'ml.m6a.16xlarge'|'ml.m6a.24xlarge'|'ml.m6a.2xlarge'|'ml.m6a.32xlarge'|'ml.m6a.48xlarge'|'ml.m6a.4xlarge'|'ml.m6a.8xlarge'|'ml.m6a.large'|'ml.m6a.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.medium'|'ml.m6g.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7g.12xlarge'|'ml.m7g.16xlarge'|'ml.m7g.2xlarge'|'ml.m7g.4xlarge'|'ml.m7g.8xlarge'|'ml.m7g.large'|'ml.m7g.medium'|'ml.m7g.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5d.16xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.3xlarge'|'ml.trn2.48xlarge',
 *         ExecutionRole?: string,
 *         ThreadsPerCore?: int,
 *         InstanceStorageConfigs?: list<array>,
 *         OnStartDeepHealthChecks?: list<'InstanceConnectivity'|'InstanceStress'>,
 *         TrainingPlanArn?: string,
 *         OverrideVpcConfig?: array,
 *         ScheduledUpdateConfig?: array,
 *         EnvironmentConfig?: array,
 *         ...,
 *     }>,
 *     RestrictedInstanceGroupsConfig?: array{
 *         SharedEnvironmentConfig?: array{FSxLustreDeletionPolicy?: 'DeleteIfNotUsed'|'Keep', FSxLustreConfig?: array, ...},
 *         ...,
 *     },
 *     TieredStorageConfig?: array{Mode?: 'Disable'|'Enable', InstanceMemoryAllocationPercentage?: int, ...},
 *     NodeRecovery?: 'Automatic'|'None',
 *     InstanceGroupsToDelete?: list<string>,
 *     NodeProvisioningMode?: 'Continuous',
 *     ClusterRole?: string,
 *     AutoScaling?: array{Mode?: 'Disable'|'Enable', AutoScalerType?: 'Karpenter', ...},
 *     Orchestrator?: array{
 *         Eks?: array{ClusterArn?: string, ...},
 *         Slurm?: array{SlurmConfigStrategy?: 'Managed'|'Merge'|'Overwrite', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterAsync(array{
 *     ClusterName?: string,
 *     InstanceGroups?: list<array{
 *         InstanceCount?: int,
 *         MinInstanceCount?: int,
 *         InstanceGroupName?: string,
 *         InstanceType?: 'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.large'|'ml.c6a.12xlarge'|'ml.c6a.16xlarge'|'ml.c6a.24xlarge'|'ml.c6a.2xlarge'|'ml.c6a.32xlarge'|'ml.c6a.48xlarge'|'ml.c6a.4xlarge'|'ml.c6a.8xlarge'|'ml.c6a.large'|'ml.c6a.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.medium'|'ml.c6g.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.medium'|'ml.c7g.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.gr6.4xlarge'|'ml.gr6.8xlarge'|'ml.i3en.12xlarge'|'ml.i3en.24xlarge'|'ml.i3en.2xlarge'|'ml.i3en.3xlarge'|'ml.i3en.6xlarge'|'ml.i3en.large'|'ml.i3en.xlarge'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6a.12xlarge'|'ml.m6a.16xlarge'|'ml.m6a.24xlarge'|'ml.m6a.2xlarge'|'ml.m6a.32xlarge'|'ml.m6a.48xlarge'|'ml.m6a.4xlarge'|'ml.m6a.8xlarge'|'ml.m6a.large'|'ml.m6a.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.medium'|'ml.m6g.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7g.12xlarge'|'ml.m7g.16xlarge'|'ml.m7g.2xlarge'|'ml.m7g.4xlarge'|'ml.m7g.8xlarge'|'ml.m7g.large'|'ml.m7g.medium'|'ml.m7g.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5d.16xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.3xlarge'|'ml.trn2.48xlarge',
 *         InstanceRequirements?: array,
 *         LifeCycleConfig?: array,
 *         ExecutionRole?: string,
 *         ThreadsPerCore?: int,
 *         InstanceStorageConfigs?: list<array>,
 *         OnStartDeepHealthChecks?: list<'InstanceConnectivity'|'InstanceStress'>,
 *         TrainingPlanArn?: string,
 *         OverrideVpcConfig?: array,
 *         ScheduledUpdateConfig?: array,
 *         ImageId?: string,
 *         AutoPatchConfig?: array,
 *         ImageReleaseVersion?: string,
 *         KubernetesConfig?: array,
 *         SlurmConfig?: array,
 *         CapacityRequirements?: array,
 *         NetworkInterface?: array,
 *         ...,
 *     }>,
 *     RestrictedInstanceGroups?: list<array{
 *         InstanceCount?: int,
 *         InstanceGroupName?: string,
 *         InstanceType?: 'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.large'|'ml.c6a.12xlarge'|'ml.c6a.16xlarge'|'ml.c6a.24xlarge'|'ml.c6a.2xlarge'|'ml.c6a.32xlarge'|'ml.c6a.48xlarge'|'ml.c6a.4xlarge'|'ml.c6a.8xlarge'|'ml.c6a.large'|'ml.c6a.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.medium'|'ml.c6g.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.medium'|'ml.c7g.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.gr6.4xlarge'|'ml.gr6.8xlarge'|'ml.i3en.12xlarge'|'ml.i3en.24xlarge'|'ml.i3en.2xlarge'|'ml.i3en.3xlarge'|'ml.i3en.6xlarge'|'ml.i3en.large'|'ml.i3en.xlarge'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6a.12xlarge'|'ml.m6a.16xlarge'|'ml.m6a.24xlarge'|'ml.m6a.2xlarge'|'ml.m6a.32xlarge'|'ml.m6a.48xlarge'|'ml.m6a.4xlarge'|'ml.m6a.8xlarge'|'ml.m6a.large'|'ml.m6a.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.medium'|'ml.m6g.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7g.12xlarge'|'ml.m7g.16xlarge'|'ml.m7g.2xlarge'|'ml.m7g.4xlarge'|'ml.m7g.8xlarge'|'ml.m7g.large'|'ml.m7g.medium'|'ml.m7g.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5d.16xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.3xlarge'|'ml.trn2.48xlarge',
 *         ExecutionRole?: string,
 *         ThreadsPerCore?: int,
 *         InstanceStorageConfigs?: list<array>,
 *         OnStartDeepHealthChecks?: list<'InstanceConnectivity'|'InstanceStress'>,
 *         TrainingPlanArn?: string,
 *         OverrideVpcConfig?: array,
 *         ScheduledUpdateConfig?: array,
 *         EnvironmentConfig?: array,
 *         ...,
 *     }>,
 *     RestrictedInstanceGroupsConfig?: array{
 *         SharedEnvironmentConfig?: array{FSxLustreDeletionPolicy?: 'DeleteIfNotUsed'|'Keep', FSxLustreConfig?: array, ...},
 *         ...,
 *     },
 *     TieredStorageConfig?: array{Mode?: 'Disable'|'Enable', InstanceMemoryAllocationPercentage?: int, ...},
 *     NodeRecovery?: 'Automatic'|'None',
 *     InstanceGroupsToDelete?: list<string>,
 *     NodeProvisioningMode?: 'Continuous',
 *     ClusterRole?: string,
 *     AutoScaling?: array{Mode?: 'Disable'|'Enable', AutoScalerType?: 'Karpenter', ...},
 *     Orchestrator?: array{
 *         Eks?: array{ClusterArn?: string, ...},
 *         Slurm?: array{SlurmConfigStrategy?: 'Managed'|'Merge'|'Overwrite', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateClusterSchedulerConfig(array $args = [])
 * @phpstan-method \Aws\Result updateClusterSchedulerConfig(array{
 *     ClusterSchedulerConfigId?: string,
 *     TargetVersion?: int,
 *     SchedulerConfig?: array{
 *         PriorityClasses?: list<array>,
 *         FairShare?: 'Disabled'|'Enabled',
 *         IdleResourceSharing?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterSchedulerConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterSchedulerConfigAsync(array{
 *     ClusterSchedulerConfigId?: string,
 *     TargetVersion?: int,
 *     SchedulerConfig?: array{
 *         PriorityClasses?: list<array>,
 *         FairShare?: 'Disabled'|'Enabled',
 *         IdleResourceSharing?: 'Disabled'|'Enabled',
 *         ...,
 *     },
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateClusterSoftware(array $args = [])
 * @phpstan-method \Aws\Result updateClusterSoftware(array{
 *     ClusterName?: string,
 *     InstanceGroups?: list<array{InstanceGroupName?: string, ImageReleaseVersion?: string, ...}>,
 *     DeploymentConfig?: array{
 *         RollingUpdatePolicy?: array{MaximumBatchSize?: array, RollbackMaximumBatchSize?: array, ...},
 *         WaitIntervalInSeconds?: int,
 *         AutoRollbackConfiguration?: list<array>,
 *         ...,
 *     },
 *     ImageId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterSoftwareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterSoftwareAsync(array{
 *     ClusterName?: string,
 *     InstanceGroups?: list<array{InstanceGroupName?: string, ImageReleaseVersion?: string, ...}>,
 *     DeploymentConfig?: array{
 *         RollingUpdatePolicy?: array{MaximumBatchSize?: array, RollbackMaximumBatchSize?: array, ...},
 *         WaitIntervalInSeconds?: int,
 *         AutoRollbackConfiguration?: list<array>,
 *         ...,
 *     },
 *     ImageId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCodeRepository(array $args = [])
 * @phpstan-method \Aws\Result updateCodeRepository(array{CodeRepositoryName?: string, GitConfig?: array{SecretArn?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCodeRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCodeRepositoryAsync(array{CodeRepositoryName?: string, GitConfig?: array{SecretArn?: string, ...}, ...} $args = [])
 * @method \Aws\Result updateComputeQuota(array $args = [])
 * @phpstan-method \Aws\Result updateComputeQuota(array{
 *     ComputeQuotaId?: string,
 *     TargetVersion?: int,
 *     ComputeQuotaConfig?: array{
 *         ComputeQuotaResources?: list<array>,
 *         ResourceSharingConfig?: array{
 *             Strategy?: 'DontLend'|'Lend'|'LendAndBorrow',
 *             BorrowLimit?: int,
 *             AbsoluteBorrowLimits?: list<array>,
 *             ...,
 *         },
 *         PreemptTeamTasks?: 'LowerPriority'|'Never',
 *         ...,
 *     },
 *     ComputeQuotaTarget?: array{TeamName?: string, FairShareWeight?: int, ...},
 *     ActivationState?: 'Disabled'|'Enabled',
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComputeQuotaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateComputeQuotaAsync(array{
 *     ComputeQuotaId?: string,
 *     TargetVersion?: int,
 *     ComputeQuotaConfig?: array{
 *         ComputeQuotaResources?: list<array>,
 *         ResourceSharingConfig?: array{
 *             Strategy?: 'DontLend'|'Lend'|'LendAndBorrow',
 *             BorrowLimit?: int,
 *             AbsoluteBorrowLimits?: list<array>,
 *             ...,
 *         },
 *         PreemptTeamTasks?: 'LowerPriority'|'Never',
 *         ...,
 *     },
 *     ComputeQuotaTarget?: array{TeamName?: string, FairShareWeight?: int, ...},
 *     ActivationState?: 'Disabled'|'Enabled',
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContext(array $args = [])
 * @phpstan-method \Aws\Result updateContext(array{
 *     ContextName?: string,
 *     Description?: string,
 *     Properties?: array<string, string>,
 *     PropertiesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContextAsync(array{
 *     ContextName?: string,
 *     Description?: string,
 *     Properties?: array<string, string>,
 *     PropertiesToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDeviceFleet(array $args = [])
 * @phpstan-method \Aws\Result updateDeviceFleet(array{
 *     DeviceFleetName?: string,
 *     RoleArn?: string,
 *     Description?: string,
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         KmsKeyId?: string,
 *         PresetDeploymentType?: 'GreengrassV2Component',
 *         PresetDeploymentConfig?: string,
 *         ...,
 *     },
 *     EnableIotRoleAlias?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeviceFleetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeviceFleetAsync(array{
 *     DeviceFleetName?: string,
 *     RoleArn?: string,
 *     Description?: string,
 *     OutputConfig?: array{
 *         S3OutputLocation?: string,
 *         KmsKeyId?: string,
 *         PresetDeploymentType?: 'GreengrassV2Component',
 *         PresetDeploymentConfig?: string,
 *         ...,
 *     },
 *     EnableIotRoleAlias?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDevices(array $args = [])
 * @phpstan-method \Aws\Result updateDevices(array{
 *     DeviceFleetName?: string,
 *     Devices?: list<array{DeviceName?: string, Description?: string, IotThingName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDevicesAsync(array{
 *     DeviceFleetName?: string,
 *     Devices?: list<array{DeviceName?: string, Description?: string, IotThingName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomain(array $args = [])
 * @phpstan-method \Aws\Result updateDomain(array{
 *     DomainId?: string,
 *     DefaultUserSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         SharingSettings?: array{NotebookOutputOption?: 'Allowed'|'Disabled', S3OutputPath?: string, S3KmsKeyId?: string, ...},
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         TensorBoardAppSettings?: array{DefaultResourceSpec?: array, ...},
 *         RStudioServerProAppSettings?: array{AccessStatus?: 'DISABLED'|'ENABLED', UserGroup?: 'R_STUDIO_ADMIN'|'R_STUDIO_USER', ...},
 *         RSessionAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, ...},
 *         CanvasAppSettings?: array{
 *             TimeSeriesForecastingSettings?: array,
 *             ModelRegisterSettings?: array,
 *             WorkspaceSettings?: array,
 *             IdentityProviderOAuthSettings?: list<array>,
 *             DirectDeploySettings?: array,
 *             KendraSettings?: array,
 *             GenerativeAiSettings?: array,
 *             EmrServerlessSettings?: array,
 *             ...,
 *         },
 *         CodeEditorAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             AppLifecycleManagement?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         DefaultLandingUri?: string,
 *         StudioWebPortal?: 'DISABLED'|'ENABLED',
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         StudioWebPortalSettings?: array{
 *             HiddenMlTools?: list<'AutoMl'|'Comet'|'DataWrangler'|'Datasets'|'DeepchecksLLMEvaluation'|'EmrClusters'|'Endpoints'|'Evaluators'|'Experiments'|'FeatureStore'|'Fiddler'|'HyperPodClusters'|'InferenceOptimization'|'InferenceRecommender'|'JumpStart'|'LakeraGuard'|'ModelEvaluation'|'Models'|'PerformanceEvaluation'|'Pipelines'|'Projects'|'RunningInstances'|'Training'>,
 *             HiddenAppTypes?: list<'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard'>,
 *             HiddenInstanceTypes?: list<'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.geospatial.interactive'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.micro'|'ml.t3.small'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'system'>,
 *             HiddenSageMakerImageVersionAliases?: list<array>,
 *             ExecutionRoleSessionNameMode?: 'STATIC'|'USER_IDENTITY',
 *             ...,
 *         },
 *         AutoMountHomeEFS?: 'DefaultAsDomain'|'Disabled'|'Enabled',
 *         ...,
 *     },
 *     DomainSettingsForUpdate?: array{
 *         RStudioServerProDomainSettingsForUpdate?: array{
 *             DomainExecutionRoleArn?: string,
 *             DefaultResourceSpec?: array,
 *             RStudioConnectUrl?: string,
 *             RStudioPackageManagerUrl?: string,
 *             ...,
 *         },
 *         ExecutionRoleIdentityConfig?: 'DISABLED'|'USER_PROFILE_NAME',
 *         SecurityGroupIds?: list<string>,
 *         TrustedIdentityPropagationSettings?: array{Status?: 'DISABLED'|'ENABLED', ...},
 *         DockerSettings?: array{
 *             EnableDockerAccess?: 'DISABLED'|'ENABLED',
 *             VpcOnlyTrustedAccounts?: list<string>,
 *             RootlessDocker?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         AmazonQSettings?: array{Status?: 'DISABLED'|'ENABLED', QProfileArn?: string, ...},
 *         UnifiedStudioSettings?: array{
 *             StudioWebPortalAccess?: 'DISABLED'|'ENABLED',
 *             DomainAccountId?: string,
 *             DomainRegion?: string,
 *             DomainId?: string,
 *             ProjectId?: string,
 *             EnvironmentId?: string,
 *             ProjectS3Path?: string,
 *             SingleSignOnApplicationArn?: string,
 *             ...,
 *         },
 *         IpAddressType?: 'dualstack'|'ipv4',
 *         ...,
 *     },
 *     AppSecurityGroupManagement?: 'Customer'|'Service',
 *     DefaultSpaceSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         ...,
 *     },
 *     SubnetIds?: list<string>,
 *     AppNetworkAccessType?: 'PublicInternetOnly'|'VpcOnly',
 *     TagPropagation?: 'DISABLED'|'ENABLED',
 *     HomeEfsFileSystemCreation?: 'Disabled'|'Enabled',
 *     VpcId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainAsync(array{
 *     DomainId?: string,
 *     DefaultUserSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         SharingSettings?: array{NotebookOutputOption?: 'Allowed'|'Disabled', S3OutputPath?: string, S3KmsKeyId?: string, ...},
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         TensorBoardAppSettings?: array{DefaultResourceSpec?: array, ...},
 *         RStudioServerProAppSettings?: array{AccessStatus?: 'DISABLED'|'ENABLED', UserGroup?: 'R_STUDIO_ADMIN'|'R_STUDIO_USER', ...},
 *         RSessionAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, ...},
 *         CanvasAppSettings?: array{
 *             TimeSeriesForecastingSettings?: array,
 *             ModelRegisterSettings?: array,
 *             WorkspaceSettings?: array,
 *             IdentityProviderOAuthSettings?: list<array>,
 *             DirectDeploySettings?: array,
 *             KendraSettings?: array,
 *             GenerativeAiSettings?: array,
 *             EmrServerlessSettings?: array,
 *             ...,
 *         },
 *         CodeEditorAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             AppLifecycleManagement?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         DefaultLandingUri?: string,
 *         StudioWebPortal?: 'DISABLED'|'ENABLED',
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         StudioWebPortalSettings?: array{
 *             HiddenMlTools?: list<'AutoMl'|'Comet'|'DataWrangler'|'Datasets'|'DeepchecksLLMEvaluation'|'EmrClusters'|'Endpoints'|'Evaluators'|'Experiments'|'FeatureStore'|'Fiddler'|'HyperPodClusters'|'InferenceOptimization'|'InferenceRecommender'|'JumpStart'|'LakeraGuard'|'ModelEvaluation'|'Models'|'PerformanceEvaluation'|'Pipelines'|'Projects'|'RunningInstances'|'Training'>,
 *             HiddenAppTypes?: list<'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard'>,
 *             HiddenInstanceTypes?: list<'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.geospatial.interactive'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.micro'|'ml.t3.small'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'system'>,
 *             HiddenSageMakerImageVersionAliases?: list<array>,
 *             ExecutionRoleSessionNameMode?: 'STATIC'|'USER_IDENTITY',
 *             ...,
 *         },
 *         AutoMountHomeEFS?: 'DefaultAsDomain'|'Disabled'|'Enabled',
 *         ...,
 *     },
 *     DomainSettingsForUpdate?: array{
 *         RStudioServerProDomainSettingsForUpdate?: array{
 *             DomainExecutionRoleArn?: string,
 *             DefaultResourceSpec?: array,
 *             RStudioConnectUrl?: string,
 *             RStudioPackageManagerUrl?: string,
 *             ...,
 *         },
 *         ExecutionRoleIdentityConfig?: 'DISABLED'|'USER_PROFILE_NAME',
 *         SecurityGroupIds?: list<string>,
 *         TrustedIdentityPropagationSettings?: array{Status?: 'DISABLED'|'ENABLED', ...},
 *         DockerSettings?: array{
 *             EnableDockerAccess?: 'DISABLED'|'ENABLED',
 *             VpcOnlyTrustedAccounts?: list<string>,
 *             RootlessDocker?: 'DISABLED'|'ENABLED',
 *             ...,
 *         },
 *         AmazonQSettings?: array{Status?: 'DISABLED'|'ENABLED', QProfileArn?: string, ...},
 *         UnifiedStudioSettings?: array{
 *             StudioWebPortalAccess?: 'DISABLED'|'ENABLED',
 *             DomainAccountId?: string,
 *             DomainRegion?: string,
 *             DomainId?: string,
 *             ProjectId?: string,
 *             EnvironmentId?: string,
 *             ProjectS3Path?: string,
 *             SingleSignOnApplicationArn?: string,
 *             ...,
 *         },
 *         IpAddressType?: 'dualstack'|'ipv4',
 *         ...,
 *     },
 *     AppSecurityGroupManagement?: 'Customer'|'Service',
 *     DefaultSpaceSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         ...,
 *     },
 *     SubnetIds?: list<string>,
 *     AppNetworkAccessType?: 'PublicInternetOnly'|'VpcOnly',
 *     TagPropagation?: 'DISABLED'|'ENABLED',
 *     HomeEfsFileSystemCreation?: 'Disabled'|'Enabled',
 *     VpcId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateEndpoint(array{
 *     EndpointName?: string,
 *     EndpointConfigName?: string,
 *     RetainAllVariantProperties?: bool,
 *     ExcludeRetainedVariantProperties?: list<array{VariantPropertyType?: 'DataCaptureConfig'|'DesiredInstanceCount'|'DesiredWeight', ...}>,
 *     DeploymentConfig?: array{
 *         BlueGreenUpdatePolicy?: array{
 *             TrafficRoutingConfiguration?: array,
 *             TerminationWaitInSeconds?: int,
 *             MaximumExecutionTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         RollingUpdatePolicy?: array{
 *             MaximumBatchSize?: array,
 *             WaitIntervalInSeconds?: int,
 *             MaximumExecutionTimeoutInSeconds?: int,
 *             RollbackMaximumBatchSize?: array,
 *             ...,
 *         },
 *         AutoRollbackConfiguration?: array{Alarms?: list<array>, ...},
 *         ...,
 *     },
 *     RetainDeploymentConfig?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEndpointAsync(array{
 *     EndpointName?: string,
 *     EndpointConfigName?: string,
 *     RetainAllVariantProperties?: bool,
 *     ExcludeRetainedVariantProperties?: list<array{VariantPropertyType?: 'DataCaptureConfig'|'DesiredInstanceCount'|'DesiredWeight', ...}>,
 *     DeploymentConfig?: array{
 *         BlueGreenUpdatePolicy?: array{
 *             TrafficRoutingConfiguration?: array,
 *             TerminationWaitInSeconds?: int,
 *             MaximumExecutionTimeoutInSeconds?: int,
 *             ...,
 *         },
 *         RollingUpdatePolicy?: array{
 *             MaximumBatchSize?: array,
 *             WaitIntervalInSeconds?: int,
 *             MaximumExecutionTimeoutInSeconds?: int,
 *             RollbackMaximumBatchSize?: array,
 *             ...,
 *         },
 *         AutoRollbackConfiguration?: array{Alarms?: list<array>, ...},
 *         ...,
 *     },
 *     RetainDeploymentConfig?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEndpointWeightsAndCapacities(array $args = [])
 * @phpstan-method \Aws\Result updateEndpointWeightsAndCapacities(array{
 *     EndpointName?: string,
 *     DesiredWeightsAndCapacities?: list<array{
 *         VariantName?: string,
 *         DesiredWeight?: float,
 *         DesiredInstanceCount?: int,
 *         ServerlessUpdateConfig?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEndpointWeightsAndCapacitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEndpointWeightsAndCapacitiesAsync(array{
 *     EndpointName?: string,
 *     DesiredWeightsAndCapacities?: list<array{
 *         VariantName?: string,
 *         DesiredWeight?: float,
 *         DesiredInstanceCount?: int,
 *         ServerlessUpdateConfig?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateExperiment(array $args = [])
 * @phpstan-method \Aws\Result updateExperiment(array{ExperimentName?: string, DisplayName?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExperimentAsync(array{ExperimentName?: string, DisplayName?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result updateFeatureGroup(array $args = [])
 * @phpstan-method \Aws\Result updateFeatureGroup(array{
 *     FeatureGroupName?: string,
 *     FeatureAdditions?: list<array{
 *         FeatureName?: string,
 *         FeatureType?: 'Fractional'|'Integral'|'String',
 *         CollectionType?: 'List'|'Set'|'Vector',
 *         CollectionConfig?: array,
 *         ...,
 *     }>,
 *     OnlineStoreConfig?: array{TtlDuration?: array{Unit?: 'Days'|'Hours'|'Minutes'|'Seconds'|'Weeks', Value?: int, ...}, ...},
 *     ThroughputConfig?: array{
 *         ThroughputMode?: 'OnDemand'|'Provisioned',
 *         ProvisionedReadCapacityUnits?: int,
 *         ProvisionedWriteCapacityUnits?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFeatureGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFeatureGroupAsync(array{
 *     FeatureGroupName?: string,
 *     FeatureAdditions?: list<array{
 *         FeatureName?: string,
 *         FeatureType?: 'Fractional'|'Integral'|'String',
 *         CollectionType?: 'List'|'Set'|'Vector',
 *         CollectionConfig?: array,
 *         ...,
 *     }>,
 *     OnlineStoreConfig?: array{TtlDuration?: array{Unit?: 'Days'|'Hours'|'Minutes'|'Seconds'|'Weeks', Value?: int, ...}, ...},
 *     ThroughputConfig?: array{
 *         ThroughputMode?: 'OnDemand'|'Provisioned',
 *         ProvisionedReadCapacityUnits?: int,
 *         ProvisionedWriteCapacityUnits?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFeatureMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateFeatureMetadata(array{
 *     FeatureGroupName?: string,
 *     FeatureName?: string,
 *     Description?: string,
 *     ParameterAdditions?: list<array{Key?: string, Value?: string, ...}>,
 *     ParameterRemovals?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFeatureMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFeatureMetadataAsync(array{
 *     FeatureGroupName?: string,
 *     FeatureName?: string,
 *     Description?: string,
 *     ParameterAdditions?: list<array{Key?: string, Value?: string, ...}>,
 *     ParameterRemovals?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHub(array $args = [])
 * @phpstan-method \Aws\Result updateHub(array{
 *     HubName?: string,
 *     HubDescription?: string,
 *     HubDisplayName?: string,
 *     HubSearchKeywords?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHubAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHubAsync(array{
 *     HubName?: string,
 *     HubDescription?: string,
 *     HubDisplayName?: string,
 *     HubSearchKeywords?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHubContent(array $args = [])
 * @phpstan-method \Aws\Result updateHubContent(array{
 *     HubName?: string,
 *     HubContentName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentVersion?: string,
 *     HubContentDisplayName?: string,
 *     HubContentDescription?: string,
 *     HubContentMarkdown?: string,
 *     HubContentSearchKeywords?: list<string>,
 *     SupportStatus?: 'Deprecated'|'Restricted'|'Supported',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHubContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHubContentAsync(array{
 *     HubName?: string,
 *     HubContentName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     HubContentVersion?: string,
 *     HubContentDisplayName?: string,
 *     HubContentDescription?: string,
 *     HubContentMarkdown?: string,
 *     HubContentSearchKeywords?: list<string>,
 *     SupportStatus?: 'Deprecated'|'Restricted'|'Supported',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateHubContentReference(array $args = [])
 * @phpstan-method \Aws\Result updateHubContentReference(array{
 *     HubName?: string,
 *     HubContentName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     MinVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateHubContentReferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateHubContentReferenceAsync(array{
 *     HubName?: string,
 *     HubContentName?: string,
 *     HubContentType?: 'DataSet'|'JsonDoc'|'Model'|'ModelReference'|'Notebook',
 *     MinVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateImage(array $args = [])
 * @phpstan-method \Aws\Result updateImage(array{
 *     DeleteProperties?: list<string>,
 *     Description?: string,
 *     DisplayName?: string,
 *     ImageName?: string,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateImageAsync(array{
 *     DeleteProperties?: list<string>,
 *     Description?: string,
 *     DisplayName?: string,
 *     ImageName?: string,
 *     RoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateImageVersion(array $args = [])
 * @phpstan-method \Aws\Result updateImageVersion(array{
 *     ImageName?: string,
 *     Alias?: string,
 *     Version?: int,
 *     AliasesToAdd?: list<string>,
 *     AliasesToDelete?: list<string>,
 *     VendorGuidance?: 'ARCHIVED'|'NOT_PROVIDED'|'STABLE'|'TO_BE_ARCHIVED',
 *     JobType?: 'INFERENCE'|'NOTEBOOK_KERNEL'|'TRAINING',
 *     MLFramework?: string,
 *     ProgrammingLang?: string,
 *     Processor?: 'CPU'|'GPU',
 *     Horovod?: bool,
 *     ReleaseNotes?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateImageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateImageVersionAsync(array{
 *     ImageName?: string,
 *     Alias?: string,
 *     Version?: int,
 *     AliasesToAdd?: list<string>,
 *     AliasesToDelete?: list<string>,
 *     VendorGuidance?: 'ARCHIVED'|'NOT_PROVIDED'|'STABLE'|'TO_BE_ARCHIVED',
 *     JobType?: 'INFERENCE'|'NOTEBOOK_KERNEL'|'TRAINING',
 *     MLFramework?: string,
 *     ProgrammingLang?: string,
 *     Processor?: 'CPU'|'GPU',
 *     Horovod?: bool,
 *     ReleaseNotes?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInferenceComponent(array $args = [])
 * @phpstan-method \Aws\Result updateInferenceComponent(array{
 *     InferenceComponentName?: string,
 *     Specification?: array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         ModelName?: string,
 *         Container?: array{
 *             Image?: string,
 *             ArtifactUrl?: string,
 *             Environment?: array<string, string>,
 *             ContainerMetricsConfig?: array,
 *             ...,
 *         },
 *         StartupParameters?: array{ModelDataDownloadTimeoutInSeconds?: int, ContainerStartupHealthCheckTimeoutInSeconds?: int, ...},
 *         ComputeResourceRequirements?: array{
 *             NumberOfCpuCoresRequired?: float,
 *             NumberOfAcceleratorDevicesRequired?: float,
 *             MinMemoryRequiredInMb?: int,
 *             MaxMemoryRequiredInMb?: int,
 *             ...,
 *         },
 *         BaseInferenceComponentName?: string,
 *         DataCacheConfig?: array{EnableCaching?: bool, ...},
 *         SchedulingConfig?: array{PlacementStrategy?: 'BINPACK'|'SPREAD', AvailabilityZoneBalance?: array, ...},
 *         ...,
 *     },
 *     Specifications?: list<array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         ModelName?: string,
 *         Container?: array,
 *         StartupParameters?: array,
 *         ComputeResourceRequirements?: array,
 *         BaseInferenceComponentName?: string,
 *         DataCacheConfig?: array,
 *         SchedulingConfig?: array,
 *         ...,
 *     }>,
 *     RuntimeConfig?: array{CopyCount?: int, ...},
 *     DeploymentConfig?: array{
 *         RollingUpdatePolicy?: array{
 *             MaximumBatchSize?: array,
 *             WaitIntervalInSeconds?: int,
 *             MaximumExecutionTimeoutInSeconds?: int,
 *             RollbackMaximumBatchSize?: array,
 *             ...,
 *         },
 *         AutoRollbackConfiguration?: array{Alarms?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInferenceComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInferenceComponentAsync(array{
 *     InferenceComponentName?: string,
 *     Specification?: array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         ModelName?: string,
 *         Container?: array{
 *             Image?: string,
 *             ArtifactUrl?: string,
 *             Environment?: array<string, string>,
 *             ContainerMetricsConfig?: array,
 *             ...,
 *         },
 *         StartupParameters?: array{ModelDataDownloadTimeoutInSeconds?: int, ContainerStartupHealthCheckTimeoutInSeconds?: int, ...},
 *         ComputeResourceRequirements?: array{
 *             NumberOfCpuCoresRequired?: float,
 *             NumberOfAcceleratorDevicesRequired?: float,
 *             MinMemoryRequiredInMb?: int,
 *             MaxMemoryRequiredInMb?: int,
 *             ...,
 *         },
 *         BaseInferenceComponentName?: string,
 *         DataCacheConfig?: array{EnableCaching?: bool, ...},
 *         SchedulingConfig?: array{PlacementStrategy?: 'BINPACK'|'SPREAD', AvailabilityZoneBalance?: array, ...},
 *         ...,
 *     },
 *     Specifications?: list<array{
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge',
 *         ModelName?: string,
 *         Container?: array,
 *         StartupParameters?: array,
 *         ComputeResourceRequirements?: array,
 *         BaseInferenceComponentName?: string,
 *         DataCacheConfig?: array,
 *         SchedulingConfig?: array,
 *         ...,
 *     }>,
 *     RuntimeConfig?: array{CopyCount?: int, ...},
 *     DeploymentConfig?: array{
 *         RollingUpdatePolicy?: array{
 *             MaximumBatchSize?: array,
 *             WaitIntervalInSeconds?: int,
 *             MaximumExecutionTimeoutInSeconds?: int,
 *             RollbackMaximumBatchSize?: array,
 *             ...,
 *         },
 *         AutoRollbackConfiguration?: array{Alarms?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInferenceComponentRuntimeConfig(array $args = [])
 * @phpstan-method \Aws\Result updateInferenceComponentRuntimeConfig(array{InferenceComponentName?: string, DesiredRuntimeConfig?: array{CopyCount?: int, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInferenceComponentRuntimeConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInferenceComponentRuntimeConfigAsync(array{InferenceComponentName?: string, DesiredRuntimeConfig?: array{CopyCount?: int, ...}, ...} $args = [])
 * @method \Aws\Result updateInferenceExperiment(array $args = [])
 * @phpstan-method \Aws\Result updateInferenceExperiment(array{
 *     Name?: string,
 *     Schedule?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Description?: string,
 *     ModelVariants?: list<array{ModelName?: string, VariantName?: string, InfrastructureConfig?: array, ...}>,
 *     DataStorageConfig?: array{
 *         Destination?: string,
 *         KmsKey?: string,
 *         ContentType?: array{CsvContentTypes?: list<string>, JsonContentTypes?: list<string>, ...},
 *         ...,
 *     },
 *     ShadowModeConfig?: array{SourceModelVariantName?: string, ShadowModelVariants?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInferenceExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInferenceExperimentAsync(array{
 *     Name?: string,
 *     Schedule?: array{StartTime?: int|string|\DateTimeInterface, EndTime?: int|string|\DateTimeInterface, ...},
 *     Description?: string,
 *     ModelVariants?: list<array{ModelName?: string, VariantName?: string, InfrastructureConfig?: array, ...}>,
 *     DataStorageConfig?: array{
 *         Destination?: string,
 *         KmsKey?: string,
 *         ContentType?: array{CsvContentTypes?: list<string>, JsonContentTypes?: list<string>, ...},
 *         ...,
 *     },
 *     ShadowModeConfig?: array{SourceModelVariantName?: string, ShadowModelVariants?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMlflowApp(array $args = [])
 * @phpstan-method \Aws\Result updateMlflowApp(array{
 *     Arn?: string,
 *     Name?: string,
 *     ArtifactStoreUri?: string,
 *     ModelRegistrationMode?: 'AutoModelRegistrationDisabled'|'AutoModelRegistrationEnabled',
 *     WeeklyMaintenanceWindowStart?: string,
 *     DefaultDomainIdList?: list<string>,
 *     AccountDefaultStatus?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMlflowAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMlflowAppAsync(array{
 *     Arn?: string,
 *     Name?: string,
 *     ArtifactStoreUri?: string,
 *     ModelRegistrationMode?: 'AutoModelRegistrationDisabled'|'AutoModelRegistrationEnabled',
 *     WeeklyMaintenanceWindowStart?: string,
 *     DefaultDomainIdList?: list<string>,
 *     AccountDefaultStatus?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMlflowTrackingServer(array $args = [])
 * @phpstan-method \Aws\Result updateMlflowTrackingServer(array{
 *     TrackingServerName?: string,
 *     ArtifactStoreUri?: string,
 *     TrackingServerSize?: 'Large'|'Medium'|'Small',
 *     AutomaticModelRegistration?: bool,
 *     WeeklyMaintenanceWindowStart?: string,
 *     S3BucketOwnerAccountId?: string,
 *     S3BucketOwnerVerification?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMlflowTrackingServerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMlflowTrackingServerAsync(array{
 *     TrackingServerName?: string,
 *     ArtifactStoreUri?: string,
 *     TrackingServerSize?: 'Large'|'Medium'|'Small',
 *     AutomaticModelRegistration?: bool,
 *     WeeklyMaintenanceWindowStart?: string,
 *     S3BucketOwnerAccountId?: string,
 *     S3BucketOwnerVerification?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateModelCard(array $args = [])
 * @phpstan-method \Aws\Result updateModelCard(array{
 *     ModelCardName?: string,
 *     Content?: string,
 *     ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelCardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateModelCardAsync(array{
 *     ModelCardName?: string,
 *     Content?: string,
 *     ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateModelPackage(array $args = [])
 * @phpstan-method \Aws\Result updateModelPackage(array{
 *     ModelPackageArn?: string,
 *     ModelApprovalStatus?: 'Approved'|'PendingManualApproval'|'Rejected',
 *     ModelPackageRegistrationType?: 'Logged'|'Registered',
 *     ApprovalDescription?: string,
 *     CustomerMetadataProperties?: array<string, string>,
 *     CustomerMetadataPropertiesToRemove?: list<string>,
 *     AdditionalInferenceSpecificationsToAdd?: list<array{
 *         Name?: string,
 *         Description?: string,
 *         Containers?: list<array>,
 *         SupportedTransformInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'>,
 *         SupportedRealtimeInferenceInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportedContentTypes?: list<string>,
 *         SupportedResponseMIMETypes?: list<string>,
 *         ...,
 *     }>,
 *     InferenceSpecification?: array{
 *         Containers?: list<array>,
 *         SupportedTransformInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'>,
 *         SupportedRealtimeInferenceInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportedContentTypes?: list<string>,
 *         SupportedResponseMIMETypes?: list<string>,
 *         ...,
 *     },
 *     SourceUri?: string,
 *     ModelCard?: array{ModelCardContent?: string, ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview', ...},
 *     ModelLifeCycle?: array{Stage?: string, StageStatus?: string, StageDescription?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateModelPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateModelPackageAsync(array{
 *     ModelPackageArn?: string,
 *     ModelApprovalStatus?: 'Approved'|'PendingManualApproval'|'Rejected',
 *     ModelPackageRegistrationType?: 'Logged'|'Registered',
 *     ApprovalDescription?: string,
 *     CustomerMetadataProperties?: array<string, string>,
 *     CustomerMetadataPropertiesToRemove?: list<string>,
 *     AdditionalInferenceSpecificationsToAdd?: list<array{
 *         Name?: string,
 *         Description?: string,
 *         Containers?: list<array>,
 *         SupportedTransformInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'>,
 *         SupportedRealtimeInferenceInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportedContentTypes?: list<string>,
 *         SupportedResponseMIMETypes?: list<string>,
 *         ...,
 *     }>,
 *     InferenceSpecification?: array{
 *         Containers?: list<array>,
 *         SupportedTransformInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'>,
 *         SupportedRealtimeInferenceInstanceTypes?: list<'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.large'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.large'|'ml.c5d.xlarge'|'ml.c6g.12xlarge'|'ml.c6g.16xlarge'|'ml.c6g.2xlarge'|'ml.c6g.4xlarge'|'ml.c6g.8xlarge'|'ml.c6g.large'|'ml.c6g.xlarge'|'ml.c6gd.12xlarge'|'ml.c6gd.16xlarge'|'ml.c6gd.2xlarge'|'ml.c6gd.4xlarge'|'ml.c6gd.8xlarge'|'ml.c6gd.large'|'ml.c6gd.xlarge'|'ml.c6gn.12xlarge'|'ml.c6gn.16xlarge'|'ml.c6gn.2xlarge'|'ml.c6gn.4xlarge'|'ml.c6gn.8xlarge'|'ml.c6gn.large'|'ml.c6gn.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6in.12xlarge'|'ml.c6in.16xlarge'|'ml.c6in.24xlarge'|'ml.c6in.2xlarge'|'ml.c6in.32xlarge'|'ml.c6in.4xlarge'|'ml.c6in.8xlarge'|'ml.c6in.large'|'ml.c6in.xlarge'|'ml.c7g.12xlarge'|'ml.c7g.16xlarge'|'ml.c7g.2xlarge'|'ml.c7g.4xlarge'|'ml.c7g.8xlarge'|'ml.c7g.large'|'ml.c7g.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.c8g.12xlarge'|'ml.c8g.16xlarge'|'ml.c8g.24xlarge'|'ml.c8g.2xlarge'|'ml.c8g.48xlarge'|'ml.c8g.4xlarge'|'ml.c8g.8xlarge'|'ml.c8g.large'|'ml.c8g.medium'|'ml.c8g.xlarge'|'ml.dl1.24xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7.12xlarge'|'ml.g7.24xlarge'|'ml.g7.2xlarge'|'ml.g7.48xlarge'|'ml.g7.4xlarge'|'ml.g7.8xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6g.12xlarge'|'ml.m6g.16xlarge'|'ml.m6g.2xlarge'|'ml.m6g.4xlarge'|'ml.m6g.8xlarge'|'ml.m6g.large'|'ml.m6g.xlarge'|'ml.m6gd.12xlarge'|'ml.m6gd.16xlarge'|'ml.m6gd.2xlarge'|'ml.m6gd.4xlarge'|'ml.m6gd.8xlarge'|'ml.m6gd.large'|'ml.m6gd.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.m8g.12xlarge'|'ml.m8g.16xlarge'|'ml.m8g.24xlarge'|'ml.m8g.2xlarge'|'ml.m8g.48xlarge'|'ml.m8g.4xlarge'|'ml.m8g.8xlarge'|'ml.m8g.large'|'ml.m8g.medium'|'ml.m8g.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5e.48xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.p6-b300.48xlarge'|'ml.p6e-gb200.36xlarge'|'ml.r5.12xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r6g.12xlarge'|'ml.r6g.16xlarge'|'ml.r6g.2xlarge'|'ml.r6g.4xlarge'|'ml.r6g.8xlarge'|'ml.r6g.large'|'ml.r6g.xlarge'|'ml.r6gd.12xlarge'|'ml.r6gd.16xlarge'|'ml.r6gd.2xlarge'|'ml.r6gd.4xlarge'|'ml.r6gd.8xlarge'|'ml.r6gd.large'|'ml.r6gd.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7gd.12xlarge'|'ml.r7gd.16xlarge'|'ml.r7gd.2xlarge'|'ml.r7gd.4xlarge'|'ml.r7gd.8xlarge'|'ml.r7gd.large'|'ml.r7gd.medium'|'ml.r7gd.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.r8g.12xlarge'|'ml.r8g.16xlarge'|'ml.r8g.24xlarge'|'ml.r8g.2xlarge'|'ml.r8g.48xlarge'|'ml.r8g.4xlarge'|'ml.r8g.8xlarge'|'ml.r8g.large'|'ml.r8g.medium'|'ml.r8g.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'ml.trn2.48xlarge'>,
 *         SupportedContentTypes?: list<string>,
 *         SupportedResponseMIMETypes?: list<string>,
 *         ...,
 *     },
 *     SourceUri?: string,
 *     ModelCard?: array{ModelCardContent?: string, ModelCardStatus?: 'Approved'|'Archived'|'Draft'|'PendingReview', ...},
 *     ModelLifeCycle?: array{Stage?: string, StageStatus?: string, StageDescription?: string, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMonitoringAlert(array $args = [])
 * @phpstan-method \Aws\Result updateMonitoringAlert(array{
 *     MonitoringScheduleName?: string,
 *     MonitoringAlertName?: string,
 *     DatapointsToAlert?: int,
 *     EvaluationPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMonitoringAlertAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMonitoringAlertAsync(array{
 *     MonitoringScheduleName?: string,
 *     MonitoringAlertName?: string,
 *     DatapointsToAlert?: int,
 *     EvaluationPeriod?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMonitoringSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateMonitoringSchedule(array{
 *     MonitoringScheduleName?: string,
 *     MonitoringScheduleConfig?: array{
 *         ScheduleConfig?: array{ScheduleExpression?: string, DataAnalysisStartTime?: string, DataAnalysisEndTime?: string, ...},
 *         MonitoringJobDefinition?: array{
 *             BaselineConfig?: array,
 *             MonitoringInputs?: list<array>,
 *             MonitoringOutputConfig?: array,
 *             MonitoringResources?: array,
 *             MonitoringAppSpecification?: array,
 *             StoppingCondition?: array,
 *             Environment?: array<string, string>,
 *             NetworkConfig?: array,
 *             RoleArn?: string,
 *             ...,
 *         },
 *         MonitoringJobDefinitionName?: string,
 *         MonitoringType?: 'DataQuality'|'ModelBias'|'ModelExplainability'|'ModelQuality',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMonitoringScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMonitoringScheduleAsync(array{
 *     MonitoringScheduleName?: string,
 *     MonitoringScheduleConfig?: array{
 *         ScheduleConfig?: array{ScheduleExpression?: string, DataAnalysisStartTime?: string, DataAnalysisEndTime?: string, ...},
 *         MonitoringJobDefinition?: array{
 *             BaselineConfig?: array,
 *             MonitoringInputs?: list<array>,
 *             MonitoringOutputConfig?: array,
 *             MonitoringResources?: array,
 *             MonitoringAppSpecification?: array,
 *             StoppingCondition?: array,
 *             Environment?: array<string, string>,
 *             NetworkConfig?: array,
 *             RoleArn?: string,
 *             ...,
 *         },
 *         MonitoringJobDefinitionName?: string,
 *         MonitoringType?: 'DataQuality'|'ModelBias'|'ModelExplainability'|'ModelQuality',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNotebookInstance(array $args = [])
 * @phpstan-method \Aws\Result updateNotebookInstance(array{
 *     NotebookInstanceName?: string,
 *     InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge',
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     PlatformIdentifier?: string,
 *     RoleArn?: string,
 *     LifecycleConfigName?: string,
 *     DisassociateLifecycleConfig?: bool,
 *     VolumeSizeInGB?: int,
 *     DefaultCodeRepository?: string,
 *     AdditionalCodeRepositories?: list<string>,
 *     AcceleratorTypes?: list<'ml.eia1.large'|'ml.eia1.medium'|'ml.eia1.xlarge'|'ml.eia2.large'|'ml.eia2.medium'|'ml.eia2.xlarge'>,
 *     DisassociateAcceleratorTypes?: bool,
 *     DisassociateDefaultCodeRepository?: bool,
 *     DisassociateAdditionalCodeRepositories?: bool,
 *     RootAccess?: 'Disabled'|'Enabled',
 *     InstanceMetadataServiceConfiguration?: array{MinimumInstanceMetadataServiceVersion?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotebookInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotebookInstanceAsync(array{
 *     NotebookInstanceName?: string,
 *     InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5d.18xlarge'|'ml.c5d.2xlarge'|'ml.c5d.4xlarge'|'ml.c5d.9xlarge'|'ml.c5d.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.inf1.24xlarge'|'ml.inf1.2xlarge'|'ml.inf1.6xlarge'|'ml.inf1.xlarge'|'ml.inf2.24xlarge'|'ml.inf2.48xlarge'|'ml.inf2.8xlarge'|'ml.inf2.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t2.2xlarge'|'ml.t2.large'|'ml.t2.medium'|'ml.t2.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge',
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     PlatformIdentifier?: string,
 *     RoleArn?: string,
 *     LifecycleConfigName?: string,
 *     DisassociateLifecycleConfig?: bool,
 *     VolumeSizeInGB?: int,
 *     DefaultCodeRepository?: string,
 *     AdditionalCodeRepositories?: list<string>,
 *     AcceleratorTypes?: list<'ml.eia1.large'|'ml.eia1.medium'|'ml.eia1.xlarge'|'ml.eia2.large'|'ml.eia2.medium'|'ml.eia2.xlarge'>,
 *     DisassociateAcceleratorTypes?: bool,
 *     DisassociateDefaultCodeRepository?: bool,
 *     DisassociateAdditionalCodeRepositories?: bool,
 *     RootAccess?: 'Disabled'|'Enabled',
 *     InstanceMetadataServiceConfiguration?: array{MinimumInstanceMetadataServiceVersion?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNotebookInstanceLifecycleConfig(array $args = [])
 * @phpstan-method \Aws\Result updateNotebookInstanceLifecycleConfig(array{
 *     NotebookInstanceLifecycleConfigName?: string,
 *     OnCreate?: list<array{Content?: string, ...}>,
 *     OnStart?: list<array{Content?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotebookInstanceLifecycleConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotebookInstanceLifecycleConfigAsync(array{
 *     NotebookInstanceLifecycleConfigName?: string,
 *     OnCreate?: list<array{Content?: string, ...}>,
 *     OnStart?: list<array{Content?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePartnerApp(array $args = [])
 * @phpstan-method \Aws\Result updatePartnerApp(array{
 *     Arn?: string,
 *     MaintenanceConfig?: array{MaintenanceWindowStart?: string, ...},
 *     Tier?: string,
 *     ApplicationConfig?: array{
 *         AdminUsers?: list<string>,
 *         Arguments?: array<string, string>,
 *         AssignedGroupPatterns?: list<string>,
 *         RoleGroupAssignments?: list<array>,
 *         ...,
 *     },
 *     EnableIamSessionBasedIdentity?: bool,
 *     EnableAutoMinorVersionUpgrade?: bool,
 *     AppVersion?: string,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePartnerAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePartnerAppAsync(array{
 *     Arn?: string,
 *     MaintenanceConfig?: array{MaintenanceWindowStart?: string, ...},
 *     Tier?: string,
 *     ApplicationConfig?: array{
 *         AdminUsers?: list<string>,
 *         Arguments?: array<string, string>,
 *         AssignedGroupPatterns?: list<string>,
 *         RoleGroupAssignments?: list<array>,
 *         ...,
 *     },
 *     EnableIamSessionBasedIdentity?: bool,
 *     EnableAutoMinorVersionUpgrade?: bool,
 *     AppVersion?: string,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePipeline(array $args = [])
 * @phpstan-method \Aws\Result updatePipeline(array{
 *     PipelineName?: string,
 *     PipelineDisplayName?: string,
 *     PipelineDefinition?: string,
 *     PipelineDefinitionS3Location?: array{Bucket?: string, ObjectKey?: string, VersionId?: string, ...},
 *     PipelineDescription?: string,
 *     RoleArn?: string,
 *     ParallelismConfiguration?: array{MaxParallelExecutionSteps?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePipelineAsync(array{
 *     PipelineName?: string,
 *     PipelineDisplayName?: string,
 *     PipelineDefinition?: string,
 *     PipelineDefinitionS3Location?: array{Bucket?: string, ObjectKey?: string, VersionId?: string, ...},
 *     PipelineDescription?: string,
 *     RoleArn?: string,
 *     ParallelismConfiguration?: array{MaxParallelExecutionSteps?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePipelineExecution(array $args = [])
 * @phpstan-method \Aws\Result updatePipelineExecution(array{
 *     PipelineExecutionArn?: string,
 *     PipelineExecutionDescription?: string,
 *     PipelineExecutionDisplayName?: string,
 *     ParallelismConfiguration?: array{MaxParallelExecutionSteps?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePipelineExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePipelineExecutionAsync(array{
 *     PipelineExecutionArn?: string,
 *     PipelineExecutionDescription?: string,
 *     PipelineExecutionDisplayName?: string,
 *     ParallelismConfiguration?: array{MaxParallelExecutionSteps?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePipelineVersion(array $args = [])
 * @phpstan-method \Aws\Result updatePipelineVersion(array{
 *     PipelineArn?: string,
 *     PipelineVersionId?: int,
 *     PipelineVersionDisplayName?: string,
 *     PipelineVersionDescription?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePipelineVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePipelineVersionAsync(array{
 *     PipelineArn?: string,
 *     PipelineVersionId?: int,
 *     PipelineVersionDisplayName?: string,
 *     PipelineVersionDescription?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProject(array $args = [])
 * @phpstan-method \Aws\Result updateProject(array{
 *     ProjectName?: string,
 *     ProjectDescription?: string,
 *     ServiceCatalogProvisioningUpdateDetails?: array{ProvisioningArtifactId?: string, ProvisioningParameters?: list<array>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TemplateProvidersToUpdate?: list<array{CfnTemplateProvider?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProjectAsync(array{
 *     ProjectName?: string,
 *     ProjectDescription?: string,
 *     ServiceCatalogProvisioningUpdateDetails?: array{ProvisioningArtifactId?: string, ProvisioningParameters?: list<array>, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TemplateProvidersToUpdate?: list<array{CfnTemplateProvider?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSpace(array $args = [])
 * @phpstan-method \Aws\Result updateSpace(array{
 *     DomainId?: string,
 *     SpaceName?: string,
 *     SpaceSettings?: array{
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         CodeEditorAppSettings?: array{DefaultResourceSpec?: array, AppLifecycleManagement?: array, ...},
 *         JupyterLabAppSettings?: array{DefaultResourceSpec?: array, CodeRepositories?: list<array>, AppLifecycleManagement?: array, ...},
 *         AppType?: 'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard',
 *         SpaceStorageSettings?: array{EbsStorageSettings?: array, ...},
 *         SpaceManagedResources?: 'DISABLED'|'ENABLED',
 *         CustomFileSystems?: list<array>,
 *         RemoteAccess?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     SpaceDisplayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSpaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSpaceAsync(array{
 *     DomainId?: string,
 *     SpaceName?: string,
 *     SpaceSettings?: array{
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         CodeEditorAppSettings?: array{DefaultResourceSpec?: array, AppLifecycleManagement?: array, ...},
 *         JupyterLabAppSettings?: array{DefaultResourceSpec?: array, CodeRepositories?: list<array>, AppLifecycleManagement?: array, ...},
 *         AppType?: 'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard',
 *         SpaceStorageSettings?: array{EbsStorageSettings?: array, ...},
 *         SpaceManagedResources?: 'DISABLED'|'ENABLED',
 *         CustomFileSystems?: list<array>,
 *         RemoteAccess?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     SpaceDisplayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrainingJob(array $args = [])
 * @phpstan-method \Aws\Result updateTrainingJob(array{
 *     TrainingJobName?: string,
 *     ProfilerConfig?: array{
 *         S3OutputPath?: string,
 *         ProfilingIntervalInMilliseconds?: int,
 *         ProfilingParameters?: array<string, string>,
 *         DisableProfiler?: bool,
 *         ...,
 *     },
 *     ProfilerRuleConfigurations?: list<array{
 *         RuleConfigurationName?: string,
 *         LocalPath?: string,
 *         S3OutputPath?: string,
 *         RuleEvaluatorImage?: string,
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *         VolumeSizeInGB?: int,
 *         RuleParameters?: array<string, string>,
 *         ...,
 *     }>,
 *     ResourceConfig?: array{KeepAlivePeriodInSeconds?: int, ...},
 *     RemoteDebugConfig?: array{EnableRemoteDebug?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrainingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrainingJobAsync(array{
 *     TrainingJobName?: string,
 *     ProfilerConfig?: array{
 *         S3OutputPath?: string,
 *         ProfilingIntervalInMilliseconds?: int,
 *         ProfilingParameters?: array<string, string>,
 *         DisableProfiler?: bool,
 *         ...,
 *     },
 *     ProfilerRuleConfigurations?: list<array{
 *         RuleConfigurationName?: string,
 *         LocalPath?: string,
 *         S3OutputPath?: string,
 *         RuleEvaluatorImage?: string,
 *         InstanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p5.4xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge',
 *         VolumeSizeInGB?: int,
 *         RuleParameters?: array<string, string>,
 *         ...,
 *     }>,
 *     ResourceConfig?: array{KeepAlivePeriodInSeconds?: int, ...},
 *     RemoteDebugConfig?: array{EnableRemoteDebug?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrial(array $args = [])
 * @phpstan-method \Aws\Result updateTrial(array{TrialName?: string, DisplayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrialAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrialAsync(array{TrialName?: string, DisplayName?: string, ...} $args = [])
 * @method \Aws\Result updateTrialComponent(array $args = [])
 * @phpstan-method \Aws\Result updateTrialComponent(array{
 *     TrialComponentName?: string,
 *     DisplayName?: string,
 *     Status?: array{PrimaryStatus?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping', Message?: string, ...},
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Parameters?: array<string, array{StringValue?: string, NumberValue?: float, ...}>,
 *     ParametersToRemove?: list<string>,
 *     InputArtifacts?: array<string, array{MediaType?: string, Value?: string, ...}>,
 *     InputArtifactsToRemove?: list<string>,
 *     OutputArtifacts?: array<string, array{MediaType?: string, Value?: string, ...}>,
 *     OutputArtifactsToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrialComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrialComponentAsync(array{
 *     TrialComponentName?: string,
 *     DisplayName?: string,
 *     Status?: array{PrimaryStatus?: 'Completed'|'Failed'|'InProgress'|'Stopped'|'Stopping', Message?: string, ...},
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     Parameters?: array<string, array{StringValue?: string, NumberValue?: float, ...}>,
 *     ParametersToRemove?: list<string>,
 *     InputArtifacts?: array<string, array{MediaType?: string, Value?: string, ...}>,
 *     InputArtifactsToRemove?: list<string>,
 *     OutputArtifacts?: array<string, array{MediaType?: string, Value?: string, ...}>,
 *     OutputArtifactsToRemove?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserProfile(array $args = [])
 * @phpstan-method \Aws\Result updateUserProfile(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     UserSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         SharingSettings?: array{NotebookOutputOption?: 'Allowed'|'Disabled', S3OutputPath?: string, S3KmsKeyId?: string, ...},
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         TensorBoardAppSettings?: array{DefaultResourceSpec?: array, ...},
 *         RStudioServerProAppSettings?: array{AccessStatus?: 'DISABLED'|'ENABLED', UserGroup?: 'R_STUDIO_ADMIN'|'R_STUDIO_USER', ...},
 *         RSessionAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, ...},
 *         CanvasAppSettings?: array{
 *             TimeSeriesForecastingSettings?: array,
 *             ModelRegisterSettings?: array,
 *             WorkspaceSettings?: array,
 *             IdentityProviderOAuthSettings?: list<array>,
 *             DirectDeploySettings?: array,
 *             KendraSettings?: array,
 *             GenerativeAiSettings?: array,
 *             EmrServerlessSettings?: array,
 *             ...,
 *         },
 *         CodeEditorAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             AppLifecycleManagement?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         DefaultLandingUri?: string,
 *         StudioWebPortal?: 'DISABLED'|'ENABLED',
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         StudioWebPortalSettings?: array{
 *             HiddenMlTools?: list<'AutoMl'|'Comet'|'DataWrangler'|'Datasets'|'DeepchecksLLMEvaluation'|'EmrClusters'|'Endpoints'|'Evaluators'|'Experiments'|'FeatureStore'|'Fiddler'|'HyperPodClusters'|'InferenceOptimization'|'InferenceRecommender'|'JumpStart'|'LakeraGuard'|'ModelEvaluation'|'Models'|'PerformanceEvaluation'|'Pipelines'|'Projects'|'RunningInstances'|'Training'>,
 *             HiddenAppTypes?: list<'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard'>,
 *             HiddenInstanceTypes?: list<'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.geospatial.interactive'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.micro'|'ml.t3.small'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'system'>,
 *             HiddenSageMakerImageVersionAliases?: list<array>,
 *             ExecutionRoleSessionNameMode?: 'STATIC'|'USER_IDENTITY',
 *             ...,
 *         },
 *         AutoMountHomeEFS?: 'DefaultAsDomain'|'Disabled'|'Enabled',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserProfileAsync(array{
 *     DomainId?: string,
 *     UserProfileName?: string,
 *     UserSettings?: array{
 *         ExecutionRole?: string,
 *         SecurityGroups?: list<string>,
 *         SharingSettings?: array{NotebookOutputOption?: 'Allowed'|'Disabled', S3OutputPath?: string, S3KmsKeyId?: string, ...},
 *         JupyterServerAppSettings?: array{DefaultResourceSpec?: array, LifecycleConfigArns?: list<string>, CodeRepositories?: list<array>, ...},
 *         KernelGatewayAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, LifecycleConfigArns?: list<string>, ...},
 *         TensorBoardAppSettings?: array{DefaultResourceSpec?: array, ...},
 *         RStudioServerProAppSettings?: array{AccessStatus?: 'DISABLED'|'ENABLED', UserGroup?: 'R_STUDIO_ADMIN'|'R_STUDIO_USER', ...},
 *         RSessionAppSettings?: array{DefaultResourceSpec?: array, CustomImages?: list<array>, ...},
 *         CanvasAppSettings?: array{
 *             TimeSeriesForecastingSettings?: array,
 *             ModelRegisterSettings?: array,
 *             WorkspaceSettings?: array,
 *             IdentityProviderOAuthSettings?: list<array>,
 *             DirectDeploySettings?: array,
 *             KendraSettings?: array,
 *             GenerativeAiSettings?: array,
 *             EmrServerlessSettings?: array,
 *             ...,
 *         },
 *         CodeEditorAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             AppLifecycleManagement?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         JupyterLabAppSettings?: array{
 *             DefaultResourceSpec?: array,
 *             CustomImages?: list<array>,
 *             LifecycleConfigArns?: list<string>,
 *             CodeRepositories?: list<array>,
 *             AppLifecycleManagement?: array,
 *             EmrSettings?: array,
 *             BuiltInLifecycleConfigArn?: string,
 *             ...,
 *         },
 *         SpaceStorageSettings?: array{DefaultEbsStorageSettings?: array, ...},
 *         DefaultLandingUri?: string,
 *         StudioWebPortal?: 'DISABLED'|'ENABLED',
 *         CustomPosixUserConfig?: array{Uid?: int, Gid?: int, ...},
 *         CustomFileSystemConfigs?: list<array>,
 *         StudioWebPortalSettings?: array{
 *             HiddenMlTools?: list<'AutoMl'|'Comet'|'DataWrangler'|'Datasets'|'DeepchecksLLMEvaluation'|'EmrClusters'|'Endpoints'|'Evaluators'|'Experiments'|'FeatureStore'|'Fiddler'|'HyperPodClusters'|'InferenceOptimization'|'InferenceRecommender'|'JumpStart'|'LakeraGuard'|'ModelEvaluation'|'Models'|'PerformanceEvaluation'|'Pipelines'|'Projects'|'RunningInstances'|'Training'>,
 *             HiddenAppTypes?: list<'Canvas'|'CodeEditor'|'DetailedProfiler'|'JupyterLab'|'JupyterServer'|'KernelGateway'|'RSessionGateway'|'RStudioServerPro'|'TensorBoard'>,
 *             HiddenInstanceTypes?: list<'ml.c5.12xlarge'|'ml.c5.18xlarge'|'ml.c5.24xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.large'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c6id.12xlarge'|'ml.c6id.16xlarge'|'ml.c6id.24xlarge'|'ml.c6id.2xlarge'|'ml.c6id.32xlarge'|'ml.c6id.4xlarge'|'ml.c6id.8xlarge'|'ml.c6id.large'|'ml.c6id.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.g7e.12xlarge'|'ml.g7e.24xlarge'|'ml.g7e.2xlarge'|'ml.g7e.48xlarge'|'ml.g7e.4xlarge'|'ml.g7e.8xlarge'|'ml.geospatial.interactive'|'ml.m5.12xlarge'|'ml.m5.16xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.8xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m5d.12xlarge'|'ml.m5d.16xlarge'|'ml.m5d.24xlarge'|'ml.m5d.2xlarge'|'ml.m5d.4xlarge'|'ml.m5d.8xlarge'|'ml.m5d.large'|'ml.m5d.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m6id.12xlarge'|'ml.m6id.16xlarge'|'ml.m6id.24xlarge'|'ml.m6id.2xlarge'|'ml.m6id.32xlarge'|'ml.m6id.4xlarge'|'ml.m6id.8xlarge'|'ml.m6id.large'|'ml.m6id.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5.4xlarge'|'ml.p5en.48xlarge'|'ml.p6-b200.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r6id.12xlarge'|'ml.r6id.16xlarge'|'ml.r6id.24xlarge'|'ml.r6id.2xlarge'|'ml.r6id.32xlarge'|'ml.r6id.4xlarge'|'ml.r6id.8xlarge'|'ml.r6id.large'|'ml.r6id.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.micro'|'ml.t3.small'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge'|'system'>,
 *             HiddenSageMakerImageVersionAliases?: list<array>,
 *             ExecutionRoleSessionNameMode?: 'STATIC'|'USER_IDENTITY',
 *             ...,
 *         },
 *         AutoMountHomeEFS?: 'DefaultAsDomain'|'Disabled'|'Enabled',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkforce(array $args = [])
 * @phpstan-method \Aws\Result updateWorkforce(array{
 *     WorkforceName?: string,
 *     SourceIpConfig?: array{Cidrs?: list<string>, ...},
 *     OidcConfig?: array{
 *         ClientId?: string,
 *         ClientSecret?: string,
 *         Issuer?: string,
 *         AuthorizationEndpoint?: string,
 *         TokenEndpoint?: string,
 *         UserInfoEndpoint?: string,
 *         LogoutEndpoint?: string,
 *         JwksUri?: string,
 *         Scope?: string,
 *         AuthenticationRequestExtraParams?: array<string, string>,
 *         ...,
 *     },
 *     WorkforceVpcConfig?: array{VpcId?: string, SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkforceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkforceAsync(array{
 *     WorkforceName?: string,
 *     SourceIpConfig?: array{Cidrs?: list<string>, ...},
 *     OidcConfig?: array{
 *         ClientId?: string,
 *         ClientSecret?: string,
 *         Issuer?: string,
 *         AuthorizationEndpoint?: string,
 *         TokenEndpoint?: string,
 *         UserInfoEndpoint?: string,
 *         LogoutEndpoint?: string,
 *         JwksUri?: string,
 *         Scope?: string,
 *         AuthenticationRequestExtraParams?: array<string, string>,
 *         ...,
 *     },
 *     WorkforceVpcConfig?: array{VpcId?: string, SecurityGroupIds?: list<string>, Subnets?: list<string>, ...},
 *     IpAddressType?: 'dualstack'|'ipv4',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkteam(array $args = [])
 * @phpstan-method \Aws\Result updateWorkteam(array{
 *     WorkteamName?: string,
 *     MemberDefinitions?: list<array{CognitoMemberDefinition?: array, OidcMemberDefinition?: array, ...}>,
 *     Description?: string,
 *     NotificationConfiguration?: array{NotificationTopicArn?: string, ...},
 *     WorkerAccessConfiguration?: array{S3Presign?: array{IamPolicyConstraints?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkteamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkteamAsync(array{
 *     WorkteamName?: string,
 *     MemberDefinitions?: list<array{CognitoMemberDefinition?: array, OidcMemberDefinition?: array, ...}>,
 *     Description?: string,
 *     NotificationConfiguration?: array{NotificationTopicArn?: string, ...},
 *     WorkerAccessConfiguration?: array{S3Presign?: array{IamPolicyConstraints?: array, ...}, ...},
 *     ...,
 * } $args = [])
 */
class SageMakerClient extends AwsClient {}
