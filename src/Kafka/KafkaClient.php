<?php
namespace Aws\Kafka;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Managed Streaming for Kafka** service.
 * @method \Aws\Result batchAssociateScramSecret(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateScramSecret(array{ClusterArn?: string, SecretArnList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateScramSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateScramSecretAsync(array{ClusterArn?: string, SecretArnList?: list<string>, ...} $args = [])
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     BrokerNodeGroupInfo?: array{
 *         BrokerAZDistribution?: 'DEFAULT',
 *         ClientSubnets?: list<string>,
 *         InstanceType?: string,
 *         SecurityGroups?: list<string>,
 *         StorageInfo?: array{EbsStorageInfo?: array, ...},
 *         ConnectivityInfo?: array{PublicAccess?: array, VpcConnectivity?: array, NetworkType?: 'DUAL'|'IPV4', ...},
 *         ZoneIds?: list<string>,
 *         ...,
 *     },
 *     ClientAuthentication?: array{
 *         Sasl?: array{Scram?: array, Iam?: array, ...},
 *         Tls?: array{CertificateAuthorityArnList?: list<string>, Enabled?: bool, ...},
 *         Unauthenticated?: array{Enabled?: bool, ...},
 *         ...,
 *     },
 *     ClusterName?: string,
 *     ConfigurationInfo?: array{Arn?: string, Revision?: int, ...},
 *     EncryptionInfo?: array{
 *         EncryptionAtRest?: array{DataVolumeKMSKeyId?: string, ...},
 *         EncryptionInTransit?: array{ClientBroker?: 'PLAINTEXT'|'TLS'|'TLS_PLAINTEXT', InCluster?: bool, ...},
 *         ...,
 *     },
 *     EnhancedMonitoring?: 'DEFAULT'|'PER_BROKER'|'PER_TOPIC_PER_BROKER'|'PER_TOPIC_PER_PARTITION',
 *     KafkaVersion?: string,
 *     LoggingInfo?: array{BrokerLogs?: array{CloudWatchLogs?: array, Firehose?: array, S3?: array, ...}, ...},
 *     NumberOfBrokerNodes?: int,
 *     OpenMonitoring?: array{Prometheus?: array{JmxExporter?: array, NodeExporter?: array, ...}, ...},
 *     Tags?: array<string, string>,
 *     Rebalancing?: array{Status?: 'ACTIVE'|'PAUSED', ...},
 *     StorageMode?: 'LOCAL'|'TIERED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     BrokerNodeGroupInfo?: array{
 *         BrokerAZDistribution?: 'DEFAULT',
 *         ClientSubnets?: list<string>,
 *         InstanceType?: string,
 *         SecurityGroups?: list<string>,
 *         StorageInfo?: array{EbsStorageInfo?: array, ...},
 *         ConnectivityInfo?: array{PublicAccess?: array, VpcConnectivity?: array, NetworkType?: 'DUAL'|'IPV4', ...},
 *         ZoneIds?: list<string>,
 *         ...,
 *     },
 *     ClientAuthentication?: array{
 *         Sasl?: array{Scram?: array, Iam?: array, ...},
 *         Tls?: array{CertificateAuthorityArnList?: list<string>, Enabled?: bool, ...},
 *         Unauthenticated?: array{Enabled?: bool, ...},
 *         ...,
 *     },
 *     ClusterName?: string,
 *     ConfigurationInfo?: array{Arn?: string, Revision?: int, ...},
 *     EncryptionInfo?: array{
 *         EncryptionAtRest?: array{DataVolumeKMSKeyId?: string, ...},
 *         EncryptionInTransit?: array{ClientBroker?: 'PLAINTEXT'|'TLS'|'TLS_PLAINTEXT', InCluster?: bool, ...},
 *         ...,
 *     },
 *     EnhancedMonitoring?: 'DEFAULT'|'PER_BROKER'|'PER_TOPIC_PER_BROKER'|'PER_TOPIC_PER_PARTITION',
 *     KafkaVersion?: string,
 *     LoggingInfo?: array{BrokerLogs?: array{CloudWatchLogs?: array, Firehose?: array, S3?: array, ...}, ...},
 *     NumberOfBrokerNodes?: int,
 *     OpenMonitoring?: array{Prometheus?: array{JmxExporter?: array, NodeExporter?: array, ...}, ...},
 *     Tags?: array<string, string>,
 *     Rebalancing?: array{Status?: 'ACTIVE'|'PAUSED', ...},
 *     StorageMode?: 'LOCAL'|'TIERED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createClusterV2(array $args = [])
 * @phpstan-method \Aws\Result createClusterV2(array{
 *     ClusterName?: string,
 *     Tags?: array<string, string>,
 *     Provisioned?: array{
 *         BrokerNodeGroupInfo?: array{
 *             BrokerAZDistribution?: 'DEFAULT',
 *             ClientSubnets?: list<string>,
 *             InstanceType?: string,
 *             SecurityGroups?: list<string>,
 *             StorageInfo?: array,
 *             ConnectivityInfo?: array,
 *             ZoneIds?: list<string>,
 *             ...,
 *         },
 *         ClientAuthentication?: array{Sasl?: array, Tls?: array, Unauthenticated?: array, ...},
 *         ConfigurationInfo?: array{Arn?: string, Revision?: int, ...},
 *         EncryptionInfo?: array{EncryptionAtRest?: array, EncryptionInTransit?: array, ...},
 *         EnhancedMonitoring?: 'DEFAULT'|'PER_BROKER'|'PER_TOPIC_PER_BROKER'|'PER_TOPIC_PER_PARTITION',
 *         OpenMonitoring?: array{Prometheus?: array, ...},
 *         KafkaVersion?: string,
 *         LoggingInfo?: array{BrokerLogs?: array, ...},
 *         NumberOfBrokerNodes?: int,
 *         StorageMode?: 'LOCAL'|'TIERED',
 *         Rebalancing?: array{Status?: 'ACTIVE'|'PAUSED', ...},
 *         ...,
 *     },
 *     Serverless?: array{VpcConfigs?: list<array>, ClientAuthentication?: array{Sasl?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterV2Async(array{
 *     ClusterName?: string,
 *     Tags?: array<string, string>,
 *     Provisioned?: array{
 *         BrokerNodeGroupInfo?: array{
 *             BrokerAZDistribution?: 'DEFAULT',
 *             ClientSubnets?: list<string>,
 *             InstanceType?: string,
 *             SecurityGroups?: list<string>,
 *             StorageInfo?: array,
 *             ConnectivityInfo?: array,
 *             ZoneIds?: list<string>,
 *             ...,
 *         },
 *         ClientAuthentication?: array{Sasl?: array, Tls?: array, Unauthenticated?: array, ...},
 *         ConfigurationInfo?: array{Arn?: string, Revision?: int, ...},
 *         EncryptionInfo?: array{EncryptionAtRest?: array, EncryptionInTransit?: array, ...},
 *         EnhancedMonitoring?: 'DEFAULT'|'PER_BROKER'|'PER_TOPIC_PER_BROKER'|'PER_TOPIC_PER_PARTITION',
 *         OpenMonitoring?: array{Prometheus?: array, ...},
 *         KafkaVersion?: string,
 *         LoggingInfo?: array{BrokerLogs?: array, ...},
 *         NumberOfBrokerNodes?: int,
 *         StorageMode?: 'LOCAL'|'TIERED',
 *         Rebalancing?: array{Status?: 'ACTIVE'|'PAUSED', ...},
 *         ...,
 *     },
 *     Serverless?: array{VpcConfigs?: list<array>, ClientAuthentication?: array{Sasl?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createConfiguration(array{
 *     Description?: string,
 *     KafkaVersions?: list<string>,
 *     Name?: string,
 *     ServerProperties?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationAsync(array{
 *     Description?: string,
 *     KafkaVersions?: list<string>,
 *     Name?: string,
 *     ServerProperties?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReplicator(array $args = [])
 * @phpstan-method \Aws\Result createReplicator(array{
 *     Description?: string,
 *     KafkaClusters?: list<array{
 *         AmazonMskCluster?: array,
 *         ApacheKafkaCluster?: array,
 *         VpcConfig?: array,
 *         ClientAuthentication?: array,
 *         EncryptionInTransit?: array,
 *         ...,
 *     }>,
 *     LogDelivery?: array{ReplicatorLogDelivery?: array{CloudWatchLogs?: array, Firehose?: array, S3?: array, ...}, ...},
 *     ReplicationInfoList?: list<array{
 *         ConsumerGroupReplication?: array,
 *         SourceKafkaClusterArn?: string,
 *         SourceKafkaClusterId?: string,
 *         TargetCompressionType?: 'GZIP'|'LZ4'|'NONE'|'SNAPPY'|'ZSTD',
 *         TargetKafkaClusterArn?: string,
 *         TargetKafkaClusterId?: string,
 *         TopicReplication?: array,
 *         ...,
 *     }>,
 *     ReplicatorName?: string,
 *     ServiceExecutionRoleArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReplicatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReplicatorAsync(array{
 *     Description?: string,
 *     KafkaClusters?: list<array{
 *         AmazonMskCluster?: array,
 *         ApacheKafkaCluster?: array,
 *         VpcConfig?: array,
 *         ClientAuthentication?: array,
 *         EncryptionInTransit?: array,
 *         ...,
 *     }>,
 *     LogDelivery?: array{ReplicatorLogDelivery?: array{CloudWatchLogs?: array, Firehose?: array, S3?: array, ...}, ...},
 *     ReplicationInfoList?: list<array{
 *         ConsumerGroupReplication?: array,
 *         SourceKafkaClusterArn?: string,
 *         SourceKafkaClusterId?: string,
 *         TargetCompressionType?: 'GZIP'|'LZ4'|'NONE'|'SNAPPY'|'ZSTD',
 *         TargetKafkaClusterArn?: string,
 *         TargetKafkaClusterId?: string,
 *         TopicReplication?: array,
 *         ...,
 *     }>,
 *     ReplicatorName?: string,
 *     ServiceExecutionRoleArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTopic(array $args = [])
 * @phpstan-method \Aws\Result createTopic(array{
 *     ClusterArn?: string,
 *     TopicName?: string,
 *     PartitionCount?: int,
 *     ReplicationFactor?: int,
 *     Configs?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTopicAsync(array{
 *     ClusterArn?: string,
 *     TopicName?: string,
 *     PartitionCount?: int,
 *     ReplicationFactor?: int,
 *     Configs?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVpcConnection(array $args = [])
 * @phpstan-method \Aws\Result createVpcConnection(array{
 *     TargetClusterArn?: string,
 *     Authentication?: string,
 *     VpcId?: string,
 *     ClientSubnets?: list<string>,
 *     SecurityGroups?: list<string>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVpcConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVpcConnectionAsync(array{
 *     TargetClusterArn?: string,
 *     Authentication?: string,
 *     VpcId?: string,
 *     ClientSubnets?: list<string>,
 *     SecurityGroups?: list<string>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{ClusterArn?: string, CurrentVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{ClusterArn?: string, CurrentVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguration(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result deleteReplicator(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicator(array{CurrentVersion?: string, ReplicatorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReplicatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicatorAsync(array{CurrentVersion?: string, ReplicatorArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTopic(array $args = [])
 * @phpstan-method \Aws\Result deleteTopic(array{ClusterArn?: string, TopicName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTopicAsync(array{ClusterArn?: string, TopicName?: string, ...} $args = [])
 * @method \Aws\Result deleteVpcConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteVpcConnection(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVpcConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVpcConnectionAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result describeCluster(array $args = [])
 * @phpstan-method \Aws\Result describeCluster(array{ClusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterAsync(array{ClusterArn?: string, ...} $args = [])
 * @method \Aws\Result describeClusterV2(array $args = [])
 * @phpstan-method \Aws\Result describeClusterV2(array{ClusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterV2Async(array{ClusterArn?: string, ...} $args = [])
 * @method \Aws\Result describeClusterOperation(array $args = [])
 * @phpstan-method \Aws\Result describeClusterOperation(array{ClusterOperationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterOperationAsync(array{ClusterOperationArn?: string, ...} $args = [])
 * @method \Aws\Result describeClusterOperationV2(array $args = [])
 * @phpstan-method \Aws\Result describeClusterOperationV2(array{ClusterOperationArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterOperationV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterOperationV2Async(array{ClusterOperationArn?: string, ...} $args = [])
 * @method \Aws\Result describeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeConfiguration(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConfigurationAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result describeConfigurationRevision(array $args = [])
 * @phpstan-method \Aws\Result describeConfigurationRevision(array{Arn?: string, Revision?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConfigurationRevisionAsync(array{Arn?: string, Revision?: int, ...} $args = [])
 * @method \Aws\Result describeReplicator(array $args = [])
 * @phpstan-method \Aws\Result describeReplicator(array{ReplicatorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReplicatorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicatorAsync(array{ReplicatorArn?: string, ...} $args = [])
 * @method \Aws\Result describeTopic(array $args = [])
 * @phpstan-method \Aws\Result describeTopic(array{ClusterArn?: string, TopicName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTopicAsync(array{ClusterArn?: string, TopicName?: string, ...} $args = [])
 * @method \Aws\Result describeTopicPartitions(array $args = [])
 * @phpstan-method \Aws\Result describeTopicPartitions(array{ClusterArn?: string, TopicName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTopicPartitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTopicPartitionsAsync(array{ClusterArn?: string, TopicName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeVpcConnection(array $args = [])
 * @phpstan-method \Aws\Result describeVpcConnection(array{Arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVpcConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVpcConnectionAsync(array{Arn?: string, ...} $args = [])
 * @method \Aws\Result batchDisassociateScramSecret(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateScramSecret(array{ClusterArn?: string, SecretArnList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateScramSecretAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateScramSecretAsync(array{ClusterArn?: string, SecretArnList?: list<string>, ...} $args = [])
 * @method \Aws\Result getBootstrapBrokers(array $args = [])
 * @phpstan-method \Aws\Result getBootstrapBrokers(array{ClusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBootstrapBrokersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBootstrapBrokersAsync(array{ClusterArn?: string, ...} $args = [])
 * @method \Aws\Result getCompatibleKafkaVersions(array $args = [])
 * @phpstan-method \Aws\Result getCompatibleKafkaVersions(array{ClusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCompatibleKafkaVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCompatibleKafkaVersionsAsync(array{ClusterArn?: string, ...} $args = [])
 * @method \Aws\Result listClusterOperations(array $args = [])
 * @phpstan-method \Aws\Result listClusterOperations(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClusterOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClusterOperationsAsync(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listClusterOperationsV2(array $args = [])
 * @phpstan-method \Aws\Result listClusterOperationsV2(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClusterOperationsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClusterOperationsV2Async(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{ClusterNameFilter?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{ClusterNameFilter?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listClustersV2(array $args = [])
 * @phpstan-method \Aws\Result listClustersV2(array{ClusterNameFilter?: string, ClusterTypeFilter?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersV2Async(array{ClusterNameFilter?: string, ClusterTypeFilter?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConfigurationRevisions(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationRevisions(array{Arn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationRevisionsAsync(array{Arn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listConfigurations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listKafkaVersions(array $args = [])
 * @phpstan-method \Aws\Result listKafkaVersions(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKafkaVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKafkaVersionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listNodes(array $args = [])
 * @phpstan-method \Aws\Result listNodes(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNodesAsync(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listReplicators(array $args = [])
 * @phpstan-method \Aws\Result listReplicators(array{MaxResults?: int, NextToken?: string, ReplicatorNameFilter?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReplicatorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReplicatorsAsync(array{MaxResults?: int, NextToken?: string, ReplicatorNameFilter?: string, ...} $args = [])
 * @method \Aws\Result listScramSecrets(array $args = [])
 * @phpstan-method \Aws\Result listScramSecrets(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScramSecretsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScramSecretsAsync(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listClientVpcConnections(array $args = [])
 * @phpstan-method \Aws\Result listClientVpcConnections(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClientVpcConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClientVpcConnectionsAsync(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listVpcConnections(array $args = [])
 * @phpstan-method \Aws\Result listVpcConnections(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVpcConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVpcConnectionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTopics(array $args = [])
 * @phpstan-method \Aws\Result listTopics(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, TopicNameFilter?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTopicsAsync(array{ClusterArn?: string, MaxResults?: int, NextToken?: string, TopicNameFilter?: string, ...} $args = [])
 * @method \Aws\Result rejectClientVpcConnection(array $args = [])
 * @phpstan-method \Aws\Result rejectClientVpcConnection(array{ClusterArn?: string, VpcConnectionArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectClientVpcConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectClientVpcConnectionAsync(array{ClusterArn?: string, VpcConnectionArn?: string, ...} $args = [])
 * @method \Aws\Result deleteClusterPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteClusterPolicy(array{ClusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterPolicyAsync(array{ClusterArn?: string, ...} $args = [])
 * @method \Aws\Result getClusterPolicy(array $args = [])
 * @phpstan-method \Aws\Result getClusterPolicy(array{ClusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClusterPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClusterPolicyAsync(array{ClusterArn?: string, ...} $args = [])
 * @method \Aws\Result putClusterPolicy(array $args = [])
 * @phpstan-method \Aws\Result putClusterPolicy(array{ClusterArn?: string, CurrentVersion?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putClusterPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putClusterPolicyAsync(array{ClusterArn?: string, CurrentVersion?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result rebootBroker(array $args = [])
 * @phpstan-method \Aws\Result rebootBroker(array{BrokerIds?: list<string>, ClusterArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rebootBrokerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rebootBrokerAsync(array{BrokerIds?: list<string>, ClusterArn?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBrokerCount(array $args = [])
 * @phpstan-method \Aws\Result updateBrokerCount(array{ClusterArn?: string, CurrentVersion?: string, TargetNumberOfBrokerNodes?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrokerCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrokerCountAsync(array{ClusterArn?: string, CurrentVersion?: string, TargetNumberOfBrokerNodes?: int, ...} $args = [])
 * @method \Aws\Result updateBrokerType(array $args = [])
 * @phpstan-method \Aws\Result updateBrokerType(array{ClusterArn?: string, CurrentVersion?: string, TargetInstanceType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrokerTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrokerTypeAsync(array{ClusterArn?: string, CurrentVersion?: string, TargetInstanceType?: string, ...} $args = [])
 * @method \Aws\Result updateBrokerStorage(array $args = [])
 * @phpstan-method \Aws\Result updateBrokerStorage(array{
 *     ClusterArn?: string,
 *     CurrentVersion?: string,
 *     TargetBrokerEBSVolumeInfo?: list<array{KafkaBrokerNodeId?: string, ProvisionedThroughput?: array, VolumeSizeGB?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrokerStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrokerStorageAsync(array{
 *     ClusterArn?: string,
 *     CurrentVersion?: string,
 *     TargetBrokerEBSVolumeInfo?: list<array{KafkaBrokerNodeId?: string, ProvisionedThroughput?: array, VolumeSizeGB?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateConfiguration(array{
 *     Arn?: string,
 *     Description?: string,
 *     ServerProperties?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationAsync(array{
 *     Arn?: string,
 *     Description?: string,
 *     ServerProperties?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateClusterConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateClusterConfiguration(array{
 *     ClusterArn?: string,
 *     ConfigurationInfo?: array{Arn?: string, Revision?: int, ...},
 *     CurrentVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterConfigurationAsync(array{
 *     ClusterArn?: string,
 *     ConfigurationInfo?: array{Arn?: string, Revision?: int, ...},
 *     CurrentVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateClusterKafkaVersion(array $args = [])
 * @phpstan-method \Aws\Result updateClusterKafkaVersion(array{
 *     ClusterArn?: string,
 *     ConfigurationInfo?: array{Arn?: string, Revision?: int, ...},
 *     CurrentVersion?: string,
 *     TargetKafkaVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterKafkaVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterKafkaVersionAsync(array{
 *     ClusterArn?: string,
 *     ConfigurationInfo?: array{Arn?: string, Revision?: int, ...},
 *     CurrentVersion?: string,
 *     TargetKafkaVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnectivity(array $args = [])
 * @phpstan-method \Aws\Result updateConnectivity(array{
 *     ClusterArn?: string,
 *     ConnectivityInfo?: array{
 *         PublicAccess?: array{Type?: string, ...},
 *         VpcConnectivity?: array{ClientAuthentication?: array, ...},
 *         NetworkType?: 'DUAL'|'IPV4',
 *         ...,
 *     },
 *     CurrentVersion?: string,
 *     ZookeeperAccess?: array{Enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectivityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectivityAsync(array{
 *     ClusterArn?: string,
 *     ConnectivityInfo?: array{
 *         PublicAccess?: array{Type?: string, ...},
 *         VpcConnectivity?: array{ClientAuthentication?: array, ...},
 *         NetworkType?: 'DUAL'|'IPV4',
 *         ...,
 *     },
 *     CurrentVersion?: string,
 *     ZookeeperAccess?: array{Enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMonitoring(array $args = [])
 * @phpstan-method \Aws\Result updateMonitoring(array{
 *     ClusterArn?: string,
 *     CurrentVersion?: string,
 *     EnhancedMonitoring?: 'DEFAULT'|'PER_BROKER'|'PER_TOPIC_PER_BROKER'|'PER_TOPIC_PER_PARTITION',
 *     OpenMonitoring?: array{Prometheus?: array{JmxExporter?: array, NodeExporter?: array, ...}, ...},
 *     LoggingInfo?: array{BrokerLogs?: array{CloudWatchLogs?: array, Firehose?: array, S3?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMonitoringAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMonitoringAsync(array{
 *     ClusterArn?: string,
 *     CurrentVersion?: string,
 *     EnhancedMonitoring?: 'DEFAULT'|'PER_BROKER'|'PER_TOPIC_PER_BROKER'|'PER_TOPIC_PER_PARTITION',
 *     OpenMonitoring?: array{Prometheus?: array{JmxExporter?: array, NodeExporter?: array, ...}, ...},
 *     LoggingInfo?: array{BrokerLogs?: array{CloudWatchLogs?: array, Firehose?: array, S3?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRebalancing(array $args = [])
 * @phpstan-method \Aws\Result updateRebalancing(array{ClusterArn?: string, CurrentVersion?: string, Rebalancing?: array{Status?: 'ACTIVE'|'PAUSED', ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRebalancingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRebalancingAsync(array{ClusterArn?: string, CurrentVersion?: string, Rebalancing?: array{Status?: 'ACTIVE'|'PAUSED', ...}, ...} $args = [])
 * @method \Aws\Result updateReplicationInfo(array $args = [])
 * @phpstan-method \Aws\Result updateReplicationInfo(array{
 *     ConsumerGroupReplication?: array{
 *         ConsumerGroupsToExclude?: list<string>,
 *         ConsumerGroupsToReplicate?: list<string>,
 *         DetectAndCopyNewConsumerGroups?: bool,
 *         SynchroniseConsumerGroupOffsets?: bool,
 *         ...,
 *     },
 *     CurrentVersion?: string,
 *     LogDelivery?: array{ReplicatorLogDelivery?: array{CloudWatchLogs?: array, Firehose?: array, S3?: array, ...}, ...},
 *     ReplicatorArn?: string,
 *     SourceKafkaClusterArn?: string,
 *     SourceKafkaClusterId?: string,
 *     TargetKafkaClusterArn?: string,
 *     TargetKafkaClusterId?: string,
 *     TopicReplication?: array{
 *         CopyAccessControlListsForTopics?: bool,
 *         CopyTopicConfigurations?: bool,
 *         DetectAndCopyNewTopics?: bool,
 *         TopicsToExclude?: list<string>,
 *         TopicsToReplicate?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReplicationInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReplicationInfoAsync(array{
 *     ConsumerGroupReplication?: array{
 *         ConsumerGroupsToExclude?: list<string>,
 *         ConsumerGroupsToReplicate?: list<string>,
 *         DetectAndCopyNewConsumerGroups?: bool,
 *         SynchroniseConsumerGroupOffsets?: bool,
 *         ...,
 *     },
 *     CurrentVersion?: string,
 *     LogDelivery?: array{ReplicatorLogDelivery?: array{CloudWatchLogs?: array, Firehose?: array, S3?: array, ...}, ...},
 *     ReplicatorArn?: string,
 *     SourceKafkaClusterArn?: string,
 *     SourceKafkaClusterId?: string,
 *     TargetKafkaClusterArn?: string,
 *     TargetKafkaClusterId?: string,
 *     TopicReplication?: array{
 *         CopyAccessControlListsForTopics?: bool,
 *         CopyTopicConfigurations?: bool,
 *         DetectAndCopyNewTopics?: bool,
 *         TopicsToExclude?: list<string>,
 *         TopicsToReplicate?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSecurity(array $args = [])
 * @phpstan-method \Aws\Result updateSecurity(array{
 *     ClientAuthentication?: array{
 *         Sasl?: array{Scram?: array, Iam?: array, ...},
 *         Tls?: array{CertificateAuthorityArnList?: list<string>, Enabled?: bool, ...},
 *         Unauthenticated?: array{Enabled?: bool, ...},
 *         ...,
 *     },
 *     ClusterArn?: string,
 *     CurrentVersion?: string,
 *     EncryptionInfo?: array{
 *         EncryptionAtRest?: array{DataVolumeKMSKeyId?: string, ...},
 *         EncryptionInTransit?: array{ClientBroker?: 'PLAINTEXT'|'TLS'|'TLS_PLAINTEXT', InCluster?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecurityAsync(array{
 *     ClientAuthentication?: array{
 *         Sasl?: array{Scram?: array, Iam?: array, ...},
 *         Tls?: array{CertificateAuthorityArnList?: list<string>, Enabled?: bool, ...},
 *         Unauthenticated?: array{Enabled?: bool, ...},
 *         ...,
 *     },
 *     ClusterArn?: string,
 *     CurrentVersion?: string,
 *     EncryptionInfo?: array{
 *         EncryptionAtRest?: array{DataVolumeKMSKeyId?: string, ...},
 *         EncryptionInTransit?: array{ClientBroker?: 'PLAINTEXT'|'TLS'|'TLS_PLAINTEXT', InCluster?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStorage(array $args = [])
 * @phpstan-method \Aws\Result updateStorage(array{
 *     ClusterArn?: string,
 *     CurrentVersion?: string,
 *     ProvisionedThroughput?: array{Enabled?: bool, VolumeThroughput?: int, ...},
 *     StorageMode?: 'LOCAL'|'TIERED',
 *     VolumeSizeGB?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStorageAsync(array{
 *     ClusterArn?: string,
 *     CurrentVersion?: string,
 *     ProvisionedThroughput?: array{Enabled?: bool, VolumeThroughput?: int, ...},
 *     StorageMode?: 'LOCAL'|'TIERED',
 *     VolumeSizeGB?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTopic(array $args = [])
 * @phpstan-method \Aws\Result updateTopic(array{ClusterArn?: string, TopicName?: string, Configs?: string, PartitionCount?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTopicAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTopicAsync(array{ClusterArn?: string, TopicName?: string, Configs?: string, PartitionCount?: int, ...} $args = [])
 */
class KafkaClient extends AwsClient {}
