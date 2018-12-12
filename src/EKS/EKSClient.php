<?php
namespace Aws\EKS;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic Container Service for Kubernetes** service.
 * @method \Aws\Result createCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @method \Aws\Result describeCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @method \Aws\Result describeUpdate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUpdateAsync(array $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @method \Aws\Result listUpdates(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUpdatesAsync(array $args = [])
 * @method \Aws\Result updateClusterVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterVersionAsync(array $args = [])
 */
class EKSClient extends AwsClient {}
