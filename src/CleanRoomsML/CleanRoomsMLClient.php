<?php
namespace Aws\CleanRoomsML;

use Aws\AwsClient;

/**
 * This client is used to interact with the **cleanrooms-ml** service.
 * @method \Aws\Result cancelTrainedModel(array $args = [])
 * @phpstan-method \Aws\Result cancelTrainedModel(array{membershipIdentifier?: string, trainedModelArn?: string, versionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelTrainedModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelTrainedModelAsync(array{membershipIdentifier?: string, trainedModelArn?: string, versionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result cancelTrainedModelInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result cancelTrainedModelInferenceJob(array{membershipIdentifier?: string, trainedModelInferenceJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelTrainedModelInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelTrainedModelInferenceJobAsync(array{membershipIdentifier?: string, trainedModelInferenceJobArn?: string, ...} $args = [])
 * @method \Aws\Result createAudienceModel(array $args = [])
 * @phpstan-method \Aws\Result createAudienceModel(array{
 *     trainingDataStartTime?: int|string|\DateTimeInterface,
 *     trainingDataEndTime?: int|string|\DateTimeInterface,
 *     name?: string,
 *     trainingDatasetArn?: string,
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAudienceModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAudienceModelAsync(array{
 *     trainingDataStartTime?: int|string|\DateTimeInterface,
 *     trainingDataEndTime?: int|string|\DateTimeInterface,
 *     name?: string,
 *     trainingDatasetArn?: string,
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguredAudienceModel(array $args = [])
 * @phpstan-method \Aws\Result createConfiguredAudienceModel(array{
 *     name?: string,
 *     audienceModelArn?: string,
 *     outputConfig?: array{destination?: array{s3Destination?: array, ...}, roleArn?: string, ...},
 *     description?: string,
 *     sharedAudienceMetrics?: list<'ALL'|'NONE'>,
 *     minMatchingSeedSize?: int,
 *     audienceSizeConfig?: array{audienceSizeType?: 'ABSOLUTE'|'PERCENTAGE', audienceSizeBins?: list<int>, ...},
 *     tags?: array<string, string>,
 *     childResourceTagOnCreatePolicy?: 'FROM_PARENT_RESOURCE'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredAudienceModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfiguredAudienceModelAsync(array{
 *     name?: string,
 *     audienceModelArn?: string,
 *     outputConfig?: array{destination?: array{s3Destination?: array, ...}, roleArn?: string, ...},
 *     description?: string,
 *     sharedAudienceMetrics?: list<'ALL'|'NONE'>,
 *     minMatchingSeedSize?: int,
 *     audienceSizeConfig?: array{audienceSizeType?: 'ABSOLUTE'|'PERCENTAGE', audienceSizeBins?: list<int>, ...},
 *     tags?: array<string, string>,
 *     childResourceTagOnCreatePolicy?: 'FROM_PARENT_RESOURCE'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguredModelAlgorithm(array $args = [])
 * @phpstan-method \Aws\Result createConfiguredModelAlgorithm(array{
 *     name?: string,
 *     description?: string,
 *     roleArn?: string,
 *     trainingContainerConfig?: array{
 *         imageUri?: string,
 *         entrypoint?: list<string>,
 *         arguments?: list<string>,
 *         metricDefinitions?: list<array>,
 *         ...,
 *     },
 *     inferenceContainerConfig?: array{imageUri?: string, ...},
 *     tags?: array<string, string>,
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredModelAlgorithmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfiguredModelAlgorithmAsync(array{
 *     name?: string,
 *     description?: string,
 *     roleArn?: string,
 *     trainingContainerConfig?: array{
 *         imageUri?: string,
 *         entrypoint?: list<string>,
 *         arguments?: list<string>,
 *         metricDefinitions?: list<array>,
 *         ...,
 *     },
 *     inferenceContainerConfig?: array{imageUri?: string, ...},
 *     tags?: array<string, string>,
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguredModelAlgorithmAssociation(array $args = [])
 * @phpstan-method \Aws\Result createConfiguredModelAlgorithmAssociation(array{
 *     membershipIdentifier?: string,
 *     configuredModelAlgorithmArn?: string,
 *     name?: string,
 *     description?: string,
 *     privacyConfiguration?: array{
 *         policies?: array{trainedModels?: array, trainedModelExports?: array, trainedModelInferenceJobs?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredModelAlgorithmAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfiguredModelAlgorithmAssociationAsync(array{
 *     membershipIdentifier?: string,
 *     configuredModelAlgorithmArn?: string,
 *     name?: string,
 *     description?: string,
 *     privacyConfiguration?: array{
 *         policies?: array{trainedModels?: array, trainedModelExports?: array, trainedModelInferenceJobs?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMLInputChannel(array $args = [])
 * @phpstan-method \Aws\Result createMLInputChannel(array{
 *     membershipIdentifier?: string,
 *     configuredModelAlgorithmAssociations?: list<string>,
 *     inputChannel?: array{dataSource?: array{protectedQueryInputParameters?: array, ...}, roleArn?: string, ...},
 *     name?: string,
 *     retentionInDays?: int,
 *     description?: string,
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     payerConfiguration?: array{computePayerAccountId?: string, syntheticDataPayerAccountId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMLInputChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMLInputChannelAsync(array{
 *     membershipIdentifier?: string,
 *     configuredModelAlgorithmAssociations?: list<string>,
 *     inputChannel?: array{dataSource?: array{protectedQueryInputParameters?: array, ...}, roleArn?: string, ...},
 *     name?: string,
 *     retentionInDays?: int,
 *     description?: string,
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     payerConfiguration?: array{computePayerAccountId?: string, syntheticDataPayerAccountId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrainedModel(array $args = [])
 * @phpstan-method \Aws\Result createTrainedModel(array{
 *     membershipIdentifier?: string,
 *     name?: string,
 *     configuredModelAlgorithmAssociationArn?: string,
 *     hyperparameters?: array<string, string>,
 *     environment?: array<string, string>,
 *     resourceConfig?: array{
 *         instanceCount?: int,
 *         instanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5en.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge',
 *         volumeSizeInGB?: int,
 *         ...,
 *     },
 *     stoppingCondition?: array{maxRuntimeInSeconds?: int, ...},
 *     incrementalTrainingDataChannels?: list<array{trainedModelArn?: string, versionIdentifier?: string, channelName?: string, ...}>,
 *     dataChannels?: list<array{
 *         mlInputChannelArn?: string,
 *         channelName?: string,
 *         s3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *         ...,
 *     }>,
 *     trainingInputMode?: 'FastFile'|'File'|'Pipe',
 *     description?: string,
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     mlModelTrainingPayerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrainedModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrainedModelAsync(array{
 *     membershipIdentifier?: string,
 *     name?: string,
 *     configuredModelAlgorithmAssociationArn?: string,
 *     hyperparameters?: array<string, string>,
 *     environment?: array<string, string>,
 *     resourceConfig?: array{
 *         instanceCount?: int,
 *         instanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c5n.18xlarge'|'ml.c5n.2xlarge'|'ml.c5n.4xlarge'|'ml.c5n.9xlarge'|'ml.c5n.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.g6.12xlarge'|'ml.g6.16xlarge'|'ml.g6.24xlarge'|'ml.g6.2xlarge'|'ml.g6.48xlarge'|'ml.g6.4xlarge'|'ml.g6.8xlarge'|'ml.g6.xlarge'|'ml.g6e.12xlarge'|'ml.g6e.16xlarge'|'ml.g6e.24xlarge'|'ml.g6e.2xlarge'|'ml.g6e.48xlarge'|'ml.g6e.4xlarge'|'ml.g6e.8xlarge'|'ml.g6e.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.p3dn.24xlarge'|'ml.p4d.24xlarge'|'ml.p4de.24xlarge'|'ml.p5.48xlarge'|'ml.p5en.48xlarge'|'ml.r5.12xlarge'|'ml.r5.16xlarge'|'ml.r5.24xlarge'|'ml.r5.2xlarge'|'ml.r5.4xlarge'|'ml.r5.8xlarge'|'ml.r5.large'|'ml.r5.xlarge'|'ml.r5d.12xlarge'|'ml.r5d.16xlarge'|'ml.r5d.24xlarge'|'ml.r5d.2xlarge'|'ml.r5d.4xlarge'|'ml.r5d.8xlarge'|'ml.r5d.large'|'ml.r5d.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge'|'ml.t3.2xlarge'|'ml.t3.large'|'ml.t3.medium'|'ml.t3.xlarge'|'ml.trn1.2xlarge'|'ml.trn1.32xlarge'|'ml.trn1n.32xlarge',
 *         volumeSizeInGB?: int,
 *         ...,
 *     },
 *     stoppingCondition?: array{maxRuntimeInSeconds?: int, ...},
 *     incrementalTrainingDataChannels?: list<array{trainedModelArn?: string, versionIdentifier?: string, channelName?: string, ...}>,
 *     dataChannels?: list<array{
 *         mlInputChannelArn?: string,
 *         channelName?: string,
 *         s3DataDistributionType?: 'FullyReplicated'|'ShardedByS3Key',
 *         ...,
 *     }>,
 *     trainingInputMode?: 'FastFile'|'File'|'Pipe',
 *     description?: string,
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     mlModelTrainingPayerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrainingDataset(array $args = [])
 * @phpstan-method \Aws\Result createTrainingDataset(array{
 *     name?: string,
 *     roleArn?: string,
 *     trainingData?: list<array{type?: 'INTERACTIONS', inputConfig?: array, ...}>,
 *     tags?: array<string, string>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrainingDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrainingDatasetAsync(array{
 *     name?: string,
 *     roleArn?: string,
 *     trainingData?: list<array{type?: 'INTERACTIONS', inputConfig?: array, ...}>,
 *     tags?: array<string, string>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAudienceGenerationJob(array $args = [])
 * @phpstan-method \Aws\Result deleteAudienceGenerationJob(array{audienceGenerationJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAudienceGenerationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAudienceGenerationJobAsync(array{audienceGenerationJobArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAudienceModel(array $args = [])
 * @phpstan-method \Aws\Result deleteAudienceModel(array{audienceModelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAudienceModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAudienceModelAsync(array{audienceModelArn?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguredAudienceModel(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguredAudienceModel(array{configuredAudienceModelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredAudienceModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfiguredAudienceModelAsync(array{configuredAudienceModelArn?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguredAudienceModelPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguredAudienceModelPolicy(array{configuredAudienceModelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredAudienceModelPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfiguredAudienceModelPolicyAsync(array{configuredAudienceModelArn?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguredModelAlgorithm(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguredModelAlgorithm(array{configuredModelAlgorithmArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredModelAlgorithmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfiguredModelAlgorithmAsync(array{configuredModelAlgorithmArn?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguredModelAlgorithmAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguredModelAlgorithmAssociation(array{configuredModelAlgorithmAssociationArn?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredModelAlgorithmAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfiguredModelAlgorithmAssociationAsync(array{configuredModelAlgorithmAssociationArn?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteMLConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteMLConfiguration(array{membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMLConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMLConfigurationAsync(array{membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteMLInputChannelData(array $args = [])
 * @phpstan-method \Aws\Result deleteMLInputChannelData(array{mlInputChannelArn?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMLInputChannelDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMLInputChannelDataAsync(array{mlInputChannelArn?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteTrainedModelOutput(array $args = [])
 * @phpstan-method \Aws\Result deleteTrainedModelOutput(array{trainedModelArn?: string, membershipIdentifier?: string, versionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrainedModelOutputAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrainedModelOutputAsync(array{trainedModelArn?: string, membershipIdentifier?: string, versionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteTrainingDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteTrainingDataset(array{trainingDatasetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrainingDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrainingDatasetAsync(array{trainingDatasetArn?: string, ...} $args = [])
 * @method \Aws\Result getAudienceGenerationJob(array $args = [])
 * @phpstan-method \Aws\Result getAudienceGenerationJob(array{audienceGenerationJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAudienceGenerationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAudienceGenerationJobAsync(array{audienceGenerationJobArn?: string, ...} $args = [])
 * @method \Aws\Result getAudienceModel(array $args = [])
 * @phpstan-method \Aws\Result getAudienceModel(array{audienceModelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAudienceModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAudienceModelAsync(array{audienceModelArn?: string, ...} $args = [])
 * @method \Aws\Result getCollaborationConfiguredModelAlgorithmAssociation(array $args = [])
 * @phpstan-method \Aws\Result getCollaborationConfiguredModelAlgorithmAssociation(array{configuredModelAlgorithmAssociationArn?: string, collaborationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationConfiguredModelAlgorithmAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollaborationConfiguredModelAlgorithmAssociationAsync(array{configuredModelAlgorithmAssociationArn?: string, collaborationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCollaborationMLInputChannel(array $args = [])
 * @phpstan-method \Aws\Result getCollaborationMLInputChannel(array{mlInputChannelArn?: string, collaborationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationMLInputChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollaborationMLInputChannelAsync(array{mlInputChannelArn?: string, collaborationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCollaborationTrainedModel(array $args = [])
 * @phpstan-method \Aws\Result getCollaborationTrainedModel(array{trainedModelArn?: string, collaborationIdentifier?: string, versionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationTrainedModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollaborationTrainedModelAsync(array{trainedModelArn?: string, collaborationIdentifier?: string, versionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getConfiguredAudienceModel(array $args = [])
 * @phpstan-method \Aws\Result getConfiguredAudienceModel(array{configuredAudienceModelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredAudienceModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfiguredAudienceModelAsync(array{configuredAudienceModelArn?: string, ...} $args = [])
 * @method \Aws\Result getConfiguredAudienceModelPolicy(array $args = [])
 * @phpstan-method \Aws\Result getConfiguredAudienceModelPolicy(array{configuredAudienceModelArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredAudienceModelPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfiguredAudienceModelPolicyAsync(array{configuredAudienceModelArn?: string, ...} $args = [])
 * @method \Aws\Result getConfiguredModelAlgorithm(array $args = [])
 * @phpstan-method \Aws\Result getConfiguredModelAlgorithm(array{configuredModelAlgorithmArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredModelAlgorithmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfiguredModelAlgorithmAsync(array{configuredModelAlgorithmArn?: string, ...} $args = [])
 * @method \Aws\Result getConfiguredModelAlgorithmAssociation(array $args = [])
 * @phpstan-method \Aws\Result getConfiguredModelAlgorithmAssociation(array{configuredModelAlgorithmAssociationArn?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredModelAlgorithmAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfiguredModelAlgorithmAssociationAsync(array{configuredModelAlgorithmAssociationArn?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getMLConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getMLConfiguration(array{membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLConfigurationAsync(array{membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getMLInputChannel(array $args = [])
 * @phpstan-method \Aws\Result getMLInputChannel(array{mlInputChannelArn?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLInputChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLInputChannelAsync(array{mlInputChannelArn?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getTrainedModel(array $args = [])
 * @phpstan-method \Aws\Result getTrainedModel(array{trainedModelArn?: string, membershipIdentifier?: string, versionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrainedModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrainedModelAsync(array{trainedModelArn?: string, membershipIdentifier?: string, versionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getTrainedModelInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result getTrainedModelInferenceJob(array{membershipIdentifier?: string, trainedModelInferenceJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrainedModelInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrainedModelInferenceJobAsync(array{membershipIdentifier?: string, trainedModelInferenceJobArn?: string, ...} $args = [])
 * @method \Aws\Result getTrainingDataset(array $args = [])
 * @phpstan-method \Aws\Result getTrainingDataset(array{trainingDatasetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrainingDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrainingDatasetAsync(array{trainingDatasetArn?: string, ...} $args = [])
 * @method \Aws\Result listAudienceExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listAudienceExportJobs(array{nextToken?: string, maxResults?: int, audienceGenerationJobArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAudienceExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAudienceExportJobsAsync(array{nextToken?: string, maxResults?: int, audienceGenerationJobArn?: string, ...} $args = [])
 * @method \Aws\Result listAudienceGenerationJobs(array $args = [])
 * @phpstan-method \Aws\Result listAudienceGenerationJobs(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     configuredAudienceModelArn?: string,
 *     collaborationId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAudienceGenerationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAudienceGenerationJobsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     configuredAudienceModelArn?: string,
 *     collaborationId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAudienceModels(array $args = [])
 * @phpstan-method \Aws\Result listAudienceModels(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAudienceModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAudienceModelsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCollaborationConfiguredModelAlgorithmAssociations(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationConfiguredModelAlgorithmAssociations(array{nextToken?: string, maxResults?: int, collaborationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationConfiguredModelAlgorithmAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationConfiguredModelAlgorithmAssociationsAsync(array{nextToken?: string, maxResults?: int, collaborationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listCollaborationMLInputChannels(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationMLInputChannels(array{nextToken?: string, maxResults?: int, collaborationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationMLInputChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationMLInputChannelsAsync(array{nextToken?: string, maxResults?: int, collaborationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listCollaborationTrainedModelExportJobs(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationTrainedModelExportJobs(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     collaborationIdentifier?: string,
 *     trainedModelArn?: string,
 *     trainedModelVersionIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationTrainedModelExportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationTrainedModelExportJobsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     collaborationIdentifier?: string,
 *     trainedModelArn?: string,
 *     trainedModelVersionIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCollaborationTrainedModelInferenceJobs(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationTrainedModelInferenceJobs(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     collaborationIdentifier?: string,
 *     trainedModelArn?: string,
 *     trainedModelVersionIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationTrainedModelInferenceJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationTrainedModelInferenceJobsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     collaborationIdentifier?: string,
 *     trainedModelArn?: string,
 *     trainedModelVersionIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCollaborationTrainedModels(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationTrainedModels(array{nextToken?: string, maxResults?: int, collaborationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationTrainedModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationTrainedModelsAsync(array{nextToken?: string, maxResults?: int, collaborationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listConfiguredAudienceModels(array $args = [])
 * @phpstan-method \Aws\Result listConfiguredAudienceModels(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfiguredAudienceModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfiguredAudienceModelsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listConfiguredModelAlgorithmAssociations(array $args = [])
 * @phpstan-method \Aws\Result listConfiguredModelAlgorithmAssociations(array{nextToken?: string, maxResults?: int, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfiguredModelAlgorithmAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfiguredModelAlgorithmAssociationsAsync(array{nextToken?: string, maxResults?: int, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listConfiguredModelAlgorithms(array $args = [])
 * @phpstan-method \Aws\Result listConfiguredModelAlgorithms(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfiguredModelAlgorithmsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfiguredModelAlgorithmsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listMLInputChannels(array $args = [])
 * @phpstan-method \Aws\Result listMLInputChannels(array{nextToken?: string, maxResults?: int, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMLInputChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMLInputChannelsAsync(array{nextToken?: string, maxResults?: int, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTrainedModelInferenceJobs(array $args = [])
 * @phpstan-method \Aws\Result listTrainedModelInferenceJobs(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     membershipIdentifier?: string,
 *     trainedModelArn?: string,
 *     trainedModelVersionIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainedModelInferenceJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrainedModelInferenceJobsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     membershipIdentifier?: string,
 *     trainedModelArn?: string,
 *     trainedModelVersionIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTrainedModelVersions(array $args = [])
 * @phpstan-method \Aws\Result listTrainedModelVersions(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     membershipIdentifier?: string,
 *     trainedModelArn?: string,
 *     status?: 'ACTIVE'|'CANCEL_FAILED'|'CANCEL_IN_PROGRESS'|'CANCEL_PENDING'|'CREATE_FAILED'|'CREATE_IN_PROGRESS'|'CREATE_PENDING'|'DELETE_FAILED'|'DELETE_IN_PROGRESS'|'DELETE_PENDING'|'INACTIVE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainedModelVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrainedModelVersionsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     membershipIdentifier?: string,
 *     trainedModelArn?: string,
 *     status?: 'ACTIVE'|'CANCEL_FAILED'|'CANCEL_IN_PROGRESS'|'CANCEL_PENDING'|'CREATE_FAILED'|'CREATE_IN_PROGRESS'|'CREATE_PENDING'|'DELETE_FAILED'|'DELETE_IN_PROGRESS'|'DELETE_PENDING'|'INACTIVE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTrainedModels(array $args = [])
 * @phpstan-method \Aws\Result listTrainedModels(array{nextToken?: string, maxResults?: int, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainedModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrainedModelsAsync(array{nextToken?: string, maxResults?: int, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listTrainingDatasets(array $args = [])
 * @phpstan-method \Aws\Result listTrainingDatasets(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrainingDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrainingDatasetsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putConfiguredAudienceModelPolicy(array $args = [])
 * @phpstan-method \Aws\Result putConfiguredAudienceModelPolicy(array{
 *     configuredAudienceModelArn?: string,
 *     configuredAudienceModelPolicy?: string,
 *     previousPolicyHash?: string,
 *     policyExistenceCondition?: 'POLICY_MUST_EXIST'|'POLICY_MUST_NOT_EXIST',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfiguredAudienceModelPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfiguredAudienceModelPolicyAsync(array{
 *     configuredAudienceModelArn?: string,
 *     configuredAudienceModelPolicy?: string,
 *     previousPolicyHash?: string,
 *     policyExistenceCondition?: 'POLICY_MUST_EXIST'|'POLICY_MUST_NOT_EXIST',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putMLConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putMLConfiguration(array{
 *     membershipIdentifier?: string,
 *     defaultOutputLocation?: array{destination?: array{s3Destination?: array, ...}, roleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMLConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMLConfigurationAsync(array{
 *     membershipIdentifier?: string,
 *     defaultOutputLocation?: array{destination?: array{s3Destination?: array, ...}, roleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAudienceExportJob(array $args = [])
 * @phpstan-method \Aws\Result startAudienceExportJob(array{
 *     name?: string,
 *     audienceGenerationJobArn?: string,
 *     audienceSize?: array{type?: 'ABSOLUTE'|'PERCENTAGE', value?: int, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAudienceExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAudienceExportJobAsync(array{
 *     name?: string,
 *     audienceGenerationJobArn?: string,
 *     audienceSize?: array{type?: 'ABSOLUTE'|'PERCENTAGE', value?: int, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAudienceGenerationJob(array $args = [])
 * @phpstan-method \Aws\Result startAudienceGenerationJob(array{
 *     name?: string,
 *     configuredAudienceModelArn?: string,
 *     seedAudience?: array{
 *         dataSource?: array{s3Uri?: string, ...},
 *         roleArn?: string,
 *         sqlParameters?: array{queryString?: string, analysisTemplateArn?: string, parameters?: array<string, string>, ...},
 *         sqlComputeConfiguration?: array{worker?: array, ...},
 *         ...,
 *     },
 *     includeSeedInOutput?: bool,
 *     collaborationId?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAudienceGenerationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAudienceGenerationJobAsync(array{
 *     name?: string,
 *     configuredAudienceModelArn?: string,
 *     seedAudience?: array{
 *         dataSource?: array{s3Uri?: string, ...},
 *         roleArn?: string,
 *         sqlParameters?: array{queryString?: string, analysisTemplateArn?: string, parameters?: array<string, string>, ...},
 *         sqlComputeConfiguration?: array{worker?: array, ...},
 *         ...,
 *     },
 *     includeSeedInOutput?: bool,
 *     collaborationId?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTrainedModelExportJob(array $args = [])
 * @phpstan-method \Aws\Result startTrainedModelExportJob(array{
 *     name?: string,
 *     trainedModelArn?: string,
 *     trainedModelVersionIdentifier?: string,
 *     membershipIdentifier?: string,
 *     outputConfiguration?: array{members?: list<array>, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTrainedModelExportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTrainedModelExportJobAsync(array{
 *     name?: string,
 *     trainedModelArn?: string,
 *     trainedModelVersionIdentifier?: string,
 *     membershipIdentifier?: string,
 *     outputConfiguration?: array{members?: list<array>, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTrainedModelInferenceJob(array $args = [])
 * @phpstan-method \Aws\Result startTrainedModelInferenceJob(array{
 *     membershipIdentifier?: string,
 *     name?: string,
 *     trainedModelArn?: string,
 *     trainedModelVersionIdentifier?: string,
 *     configuredModelAlgorithmAssociationArn?: string,
 *     resourceConfig?: array{
 *         instanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge',
 *         instanceCount?: int,
 *         ...,
 *     },
 *     outputConfiguration?: array{accept?: string, members?: list<array>, ...},
 *     dataSource?: array{mlInputChannelArn?: string, ...},
 *     description?: string,
 *     containerExecutionParameters?: array{maxPayloadInMB?: int, ...},
 *     environment?: array<string, string>,
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     mlModelInferencePayerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTrainedModelInferenceJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTrainedModelInferenceJobAsync(array{
 *     membershipIdentifier?: string,
 *     name?: string,
 *     trainedModelArn?: string,
 *     trainedModelVersionIdentifier?: string,
 *     configuredModelAlgorithmAssociationArn?: string,
 *     resourceConfig?: array{
 *         instanceType?: 'ml.c4.2xlarge'|'ml.c4.4xlarge'|'ml.c4.8xlarge'|'ml.c4.xlarge'|'ml.c5.18xlarge'|'ml.c5.2xlarge'|'ml.c5.4xlarge'|'ml.c5.9xlarge'|'ml.c5.xlarge'|'ml.c6i.12xlarge'|'ml.c6i.16xlarge'|'ml.c6i.24xlarge'|'ml.c6i.2xlarge'|'ml.c6i.32xlarge'|'ml.c6i.4xlarge'|'ml.c6i.8xlarge'|'ml.c6i.large'|'ml.c6i.xlarge'|'ml.c7i.12xlarge'|'ml.c7i.16xlarge'|'ml.c7i.24xlarge'|'ml.c7i.2xlarge'|'ml.c7i.48xlarge'|'ml.c7i.4xlarge'|'ml.c7i.8xlarge'|'ml.c7i.large'|'ml.c7i.xlarge'|'ml.g4dn.12xlarge'|'ml.g4dn.16xlarge'|'ml.g4dn.2xlarge'|'ml.g4dn.4xlarge'|'ml.g4dn.8xlarge'|'ml.g4dn.xlarge'|'ml.g5.12xlarge'|'ml.g5.16xlarge'|'ml.g5.24xlarge'|'ml.g5.2xlarge'|'ml.g5.48xlarge'|'ml.g5.4xlarge'|'ml.g5.8xlarge'|'ml.g5.xlarge'|'ml.m4.10xlarge'|'ml.m4.16xlarge'|'ml.m4.2xlarge'|'ml.m4.4xlarge'|'ml.m4.xlarge'|'ml.m5.12xlarge'|'ml.m5.24xlarge'|'ml.m5.2xlarge'|'ml.m5.4xlarge'|'ml.m5.large'|'ml.m5.xlarge'|'ml.m6i.12xlarge'|'ml.m6i.16xlarge'|'ml.m6i.24xlarge'|'ml.m6i.2xlarge'|'ml.m6i.32xlarge'|'ml.m6i.4xlarge'|'ml.m6i.8xlarge'|'ml.m6i.large'|'ml.m6i.xlarge'|'ml.m7i.12xlarge'|'ml.m7i.16xlarge'|'ml.m7i.24xlarge'|'ml.m7i.2xlarge'|'ml.m7i.48xlarge'|'ml.m7i.4xlarge'|'ml.m7i.8xlarge'|'ml.m7i.large'|'ml.m7i.xlarge'|'ml.p2.16xlarge'|'ml.p2.8xlarge'|'ml.p2.xlarge'|'ml.p3.16xlarge'|'ml.p3.2xlarge'|'ml.p3.8xlarge'|'ml.r6i.12xlarge'|'ml.r6i.16xlarge'|'ml.r6i.24xlarge'|'ml.r6i.2xlarge'|'ml.r6i.32xlarge'|'ml.r6i.4xlarge'|'ml.r6i.8xlarge'|'ml.r6i.large'|'ml.r6i.xlarge'|'ml.r7i.12xlarge'|'ml.r7i.16xlarge'|'ml.r7i.24xlarge'|'ml.r7i.2xlarge'|'ml.r7i.48xlarge'|'ml.r7i.4xlarge'|'ml.r7i.8xlarge'|'ml.r7i.large'|'ml.r7i.xlarge',
 *         instanceCount?: int,
 *         ...,
 *     },
 *     outputConfiguration?: array{accept?: string, members?: list<array>, ...},
 *     dataSource?: array{mlInputChannelArn?: string, ...},
 *     description?: string,
 *     containerExecutionParameters?: array{maxPayloadInMB?: int, ...},
 *     environment?: array<string, string>,
 *     kmsKeyArn?: string,
 *     tags?: array<string, string>,
 *     mlModelInferencePayerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateConfiguredAudienceModel(array $args = [])
 * @phpstan-method \Aws\Result updateConfiguredAudienceModel(array{
 *     configuredAudienceModelArn?: string,
 *     outputConfig?: array{destination?: array{s3Destination?: array, ...}, roleArn?: string, ...},
 *     audienceModelArn?: string,
 *     sharedAudienceMetrics?: list<'ALL'|'NONE'>,
 *     minMatchingSeedSize?: int,
 *     audienceSizeConfig?: array{audienceSizeType?: 'ABSOLUTE'|'PERCENTAGE', audienceSizeBins?: list<int>, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfiguredAudienceModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfiguredAudienceModelAsync(array{
 *     configuredAudienceModelArn?: string,
 *     outputConfig?: array{destination?: array{s3Destination?: array, ...}, roleArn?: string, ...},
 *     audienceModelArn?: string,
 *     sharedAudienceMetrics?: list<'ALL'|'NONE'>,
 *     minMatchingSeedSize?: int,
 *     audienceSizeConfig?: array{audienceSizeType?: 'ABSOLUTE'|'PERCENTAGE', audienceSizeBins?: list<int>, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 */
class CleanRoomsMLClient extends AwsClient {}
