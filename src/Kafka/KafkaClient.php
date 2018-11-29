<?php
namespace Aws\Kafka;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Managed Streaming for Kafka** service.
 * @method \Aws\Result createCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @method \Aws\Result describeCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @method \Aws\Result getBootstrapBrokers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBootstrapBrokersAsync(array $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @method \Aws\Result listNodes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listNodesAsync(array $args = [])
 */
class KafkaClient extends AwsClient {}
