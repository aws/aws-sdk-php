<?php
namespace Aws\Ecs;

use Aws\AwsClient;

/**
 * This client is used to interact with **Amazon ECS**.
 *
 * @method \Aws\Result createCluster(array $args = [])
 * @method \Aws\Result createService(array $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @method \Aws\Result deleteService(array $args = [])
 * @method \Aws\Result deregisterContainerInstance(array $args = [])
 * @method \Aws\Result deregisterTaskDefinition(array $args = [])
 * @method \Aws\Result describeClusters(array $args = [])
 * @method \Aws\Result describeContainerInstances(array $args = [])
 * @method \Aws\Result describeServices(array $args = [])
 * @method \Aws\Result describeTaskDefinition(array $args = [])
 * @method \Aws\Result describeTasks(array $args = [])
 * @method \Aws\Result discoverPollEndpoint(array $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @method \Aws\Result listContainerInstances(array $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @method \Aws\Result listTaskDefinitionFamilies(array $args = [])
 * @method \Aws\Result listTaskDefinitions(array $args = [])
 * @method \Aws\Result listTasks(array $args = [])
 * @method \Aws\Result registerContainerInstance(array $args = [])
 * @method \Aws\Result registerTaskDefinition(array $args = [])
 * @method \Aws\Result runTask(array $args = [])
 * @method \Aws\Result startTask(array $args = [])
 * @method \Aws\Result stopTask(array $args = [])
 * @method \Aws\Result submitContainerStateChange(array $args = [])
 * @method \Aws\Result submitTaskStateChange(array $args = [])
 * @method \Aws\Result updateContainerAgent(array $args = [])
 * @method \Aws\Result updateService(array $args = [])
 */
class EcsClient extends AwsClient {}
