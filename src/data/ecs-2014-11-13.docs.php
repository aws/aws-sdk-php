<?php return [
  'operations' => [
    'CreateCluster' => '<p>Creates a new Amazon ECS cluster. By default, your account will receive a <code>default</code> cluster when you launch your first container instance. However, you can create your own cluster with a unique name with the <code>CreateCluster</code> action.</p> <important> <p>During the preview, each account is limited to two clusters.</p> </important>',
    'DeleteCluster' => '<p>Deletes the specified cluster. You must deregister all container instances from this cluster before you may delete it. You can list the container instances in a cluster with <a>ListContainerInstances</a> and deregister them with <a>DeregisterContainerInstance</a>.</p>',
    'DeregisterContainerInstance' => '<p>Deregisters an Amazon ECS container instance from the specified cluster. This instance will no longer be available to run tasks.</p>',
    'DeregisterTaskDefinition' => '<p>Deregisters the specified task definition. You will no longer be able to run tasks from this definition after deregistration.</p>',
    'DescribeClusters' => '<p>Describes one or more of your clusters.</p>',
    'DescribeContainerInstances' => '<p>Describes Amazon EC2 Container Service container instances. Returns metadata about registered and remaining resources on each container instance requested.</p>',
    'DescribeTaskDefinition' => '<p>Describes a task definition.</p>',
    'DescribeTasks' => '<p>Describes a specified task or tasks.</p>',
    'DiscoverPollEndpoint' => '<note><p>This action is only used by the Amazon EC2 Container Service agent, and it is not intended for use outside of the agent.</p></note> <p>Returns an endpoint for the Amazon EC2 Container Service agent to poll for updates.</p>',
    'ListClusters' => '<p>Returns a list of existing clusters.</p>',
    'ListContainerInstances' => '<p>Returns a list of container instances in a specified cluster.</p>',
    'ListTaskDefinitions' => '<p>Returns a list of task definitions that are registered to your account. You can filter the results by family name with the <code>familyPrefix</code> parameter.</p>',
    'ListTasks' => '<p>Returns a list of tasks for a specified cluster. You can filter the results by family name or by a particular container instance with the <code>family</code> and <code>containerInstance</code> parameters.</p>',
    'RegisterContainerInstance' => '<note><p>This action is only used by the Amazon EC2 Container Service agent, and it is not intended for use outside of the agent.</p></note> <p>Registers an Amazon EC2 instance into the specified cluster. This instance will become available to place containers on.</p>',
    'RegisterTaskDefinition' => '<p>Registers a new task definition from the supplied <code>family</code> and <code>containerDefinitions</code>.</p>',
    'RunTask' => '<p>Start a task using random placement and the default Amazon ECS scheduler. If you want to use your own scheduler or place a task on a specific container instance, use <code>StartTask</code> instead.</p>',
    'StartTask' => '<p>Starts a new task from the specified task definition on the specified container instance or instances. If you want to use the default Amazon ECS scheduler to place your task, use <code>RunTask</code> instead.</p>',
    'StopTask' => '<p>Stops a running task.</p>',
    'SubmitContainerStateChange' => '<note><p>This action is only used by the Amazon EC2 Container Service agent, and it is not intended for use outside of the agent.</p></note> <p>Sent to acknowledge that a container changed states.</p>',
    'SubmitTaskStateChange' => '<note><p>This action is only used by the Amazon EC2 Container Service agent, and it is not intended for use outside of the agent.</p></note> <p>Sent to acknowledge that a task changed states.</p>',
  ],
  'service' => '<p>Amazon EC2 Container Service (Amazon ECS] is a highly scalable, fast, container management service that makes it easy to run, stop, and manage Docker containers on a cluster of Amazon EC2 instances. Amazon ECS lets you launch and stop container-enabled applications with simple API calls, allows you to get the state of your cluster from a centralized service, and gives you access to many familiar Amazon EC2 features like security groups, Amazon EBS volumes, and IAM roles.</p> <p>You can use Amazon ECS to schedule the placement of containers across your cluster based on your resource needs, isolation policies, and availability requirements. Amazon EC2 Container Service eliminates the need for you to operate your own cluster management and configuration management systems or worry about scaling your management infrastructure.</p>',
  'shapes' => [
    'Boolean' => [
      'base' => NULL,
      'refs' => [
        'ContainerInstance$agentConnected' => '<p>This parameter returns <code>true</code> if the agent is actually connected to Amazon ECS. Registered instances with an agent that may be unhealthy or stopped will return <code>false</code>, and instances without a connected agent cannot accept placement request.</p>',
      ],
    ],
    'BoxedBoolean' => [
      'base' => NULL,
      'refs' => [
        'ContainerDefinition$essential' => '<p>If the <code>essential</code> parameter of a container is marked as <code>true</code>, the failure of that container will stop the task. If the <code>essential</code> parameter of a container is marked as <code>false</code>, then its failure will not affect the rest of the containers in a task.</p>',
        'DeregisterContainerInstanceRequest$force' => '<p>Force the deregistration of the container instance. You can use the <code>force</code> parameter if you have several tasks running on a container instance and you don\'t want to run <code>StopTask</code> for each task before deregistering the container instance.</p>',
      ],
    ],
    'BoxedInteger' => [
      'base' => NULL,
      'refs' => [
        'Container$exitCode' => '<p>The exit code returned from the container.</p>',
        'ListClustersRequest$maxResults' => '<p>The maximum number of cluster results returned by <code>ListClusters</code> in paginated output. When this parameter is used, <code>ListClusters</code> only returns <code>maxResults</code> results in a single page along with a <code>nextToken</code> response element. The remaining results of the initial request can be seen by sending another <code>ListClusters</code> request with the returned <code>nextToken</code> value. This value can be between 1 and 100. If this parameter is not used, then <code>ListClusters</code> returns up to 100 results and a <code>nextToken</code> value if applicable.</p>',
        'ListContainerInstancesRequest$maxResults' => '<p>The maximum number of container instance results returned by <code>ListContainerInstances</code> in paginated output. When this parameter is used, <code>ListContainerInstances</code> only returns <code>maxResults</code> results in a single page along with a <code>nextToken</code> response element. The remaining results of the initial request can be seen by sending another <code>ListContainerInstances</code> request with the returned <code>nextToken</code> value. This value can be between 1 and 100. If this parameter is not used, then <code>ListContainerInstances</code> returns up to 100 results and a <code>nextToken</code> value if applicable.</p>',
        'ListTaskDefinitionsRequest$maxResults' => '<p>The maximum number of task definition results returned by <code>ListTaskDefinitions</code> in paginated output. When this parameter is used, <code>ListTaskDefinitions</code> only returns <code>maxResults</code> results in a single page along with a <code>nextToken</code> response element. The remaining results of the initial request can be seen by sending another <code>ListTaskDefinitions</code> request with the returned <code>nextToken</code> value. This value can be between 1 and 100. If this parameter is not used, then <code>ListTaskDefinitions</code> returns up to 100 results and a <code>nextToken</code> value if applicable.</p>',
        'ListTasksRequest$maxResults' => '<p>The maximum number of task results returned by <code>ListTasks</code> in paginated output. When this parameter is used, <code>ListTasks</code> only returns <code>maxResults</code> results in a single page along with a <code>nextToken</code> response element. The remaining results of the initial request can be seen by sending another <code>ListTasks</code> request with the returned <code>nextToken</code> value. This value can be between 1 and 100. If this parameter is not used, then <code>ListTasks</code> returns up to 100 results and a <code>nextToken</code> value if applicable.</p>',
        'NetworkBinding$containerPort' => '<p>The port number on the container that should be used with the network binding.</p>',
        'NetworkBinding$hostPort' => '<p>The port number on the host that should be used with the network binding.</p>',
        'RunTaskRequest$count' => '<p>The number of instances of the specified task that you would like to place on your cluster.</p>',
        'SubmitContainerStateChangeRequest$exitCode' => '<p>The exit code returned for the state change request.</p>',
      ],
    ],
    'ClientException' => [
      'base' => '<p>These errors are usually caused by something the client did, such as use an action or resource on behalf of a user that doesn\'t have permission to use the action or resource, or specify an identifier that is not valid.</p>',
      'refs' => [],
    ],
    'Cluster' => [
      'base' => '<p>A regional grouping of one or more container instances on which you can run task requests. Each account receives a default cluster the first time you use the Amazon ECS service, but you may also create other clusters. Clusters may contain more than one instance type simultaneously.</p> <important> <p>During the preview, each account is limited to two clusters.</p> </important>',
      'refs' => [
        'Clusters$member' => NULL,
        'CreateClusterResponse$cluster' => '<p>The full description of your new cluster.</p>',
        'DeleteClusterResponse$cluster' => '<p>The full description of the deleted cluster.</p>',
      ],
    ],
    'Clusters' => [
      'base' => NULL,
      'refs' => [
        'DescribeClustersResponse$clusters' => '<p>The list of clusters.</p>',
      ],
    ],
    'Container' => [
      'base' => NULL,
      'refs' => [
        'Containers$member' => NULL,
      ],
    ],
    'ContainerDefinition' => [
      'base' => '<p>Container definitions are used in task definitions to describe the different containers that are launched as part of a task.</p>',
      'refs' => [
        'ContainerDefinitions$member' => NULL,
      ],
    ],
    'ContainerDefinitions' => [
      'base' => NULL,
      'refs' => [
        'RegisterTaskDefinitionRequest$containerDefinitions' => '<p>A list of container definitions in JSON format that describe the different containers that make up your task.</p>',
        'TaskDefinition$containerDefinitions' => '<p>A list of container definitions in JSON format that describe the different containers that make up your task.</p>',
      ],
    ],
    'ContainerInstance' => [
      'base' => '<p>An Amazon EC2 instance that is running the Amazon ECS agent and has been registered with a cluster.</p>',
      'refs' => [
        'ContainerInstances$member' => NULL,
        'DeregisterContainerInstanceResponse$containerInstance' => NULL,
        'RegisterContainerInstanceResponse$containerInstance' => NULL,
      ],
    ],
    'ContainerInstances' => [
      'base' => NULL,
      'refs' => [
        'DescribeContainerInstancesResponse$containerInstances' => '<p>The list of container instances.</p>',
      ],
    ],
    'ContainerOverride' => [
      'base' => NULL,
      'refs' => [
        'ContainerOverrides$member' => NULL,
      ],
    ],
    'ContainerOverrides' => [
      'base' => NULL,
      'refs' => [
        'TaskOverride$containerOverrides' => '<p>One or more container overrides to send when running a task.</p>',
      ],
    ],
    'Containers' => [
      'base' => NULL,
      'refs' => [
        'Task$containers' => '<p>The containers associated with the task.</p>',
      ],
    ],
    'CreateClusterRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateClusterResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteClusterRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteClusterResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeregisterContainerInstanceRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeregisterContainerInstanceResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeregisterTaskDefinitionRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeregisterTaskDefinitionResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeClustersRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeClustersResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeContainerInstancesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeContainerInstancesResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeTaskDefinitionRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeTaskDefinitionResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeTasksRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeTasksResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DiscoverPollEndpointRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DiscoverPollEndpointResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'Double' => [
      'base' => NULL,
      'refs' => [
        'Resource$doubleValue' => '<p>When the <code>doubleValue</code> type is set, the value of the resource must be a double precision floating-point type.</p>',
      ],
    ],
    'EnvironmentVariables' => [
      'base' => NULL,
      'refs' => [
        'ContainerDefinition$environment' => '<p>The environment variables to pass to a container.</p>',
      ],
    ],
    'Failure' => [
      'base' => NULL,
      'refs' => [
        'Failures$member' => NULL,
      ],
    ],
    'Failures' => [
      'base' => NULL,
      'refs' => [
        'DescribeClustersResponse$failures' => NULL,
        'DescribeContainerInstancesResponse$failures' => NULL,
        'DescribeTasksResponse$failures' => NULL,
        'RunTaskResponse$failures' => '<p>Any failed tasks from your <code>RunTask</code> action are listed here.</p>',
        'StartTaskResponse$failures' => '<p>Any failed tasks from your <code>StartTask</code> action are listed here.</p>',
      ],
    ],
    'Integer' => [
      'base' => NULL,
      'refs' => [
        'ContainerDefinition$cpu' => '<p>The number of <code>cpu</code> units reserved for the container. A container instance has 1,024 <code>cpu</code> units for every CPU core.</p>',
        'ContainerDefinition$memory' => '<p>The number of MiB of memory reserved for the container. Docker will allocate a minimum of 4 MiB of memory to a container.</p>',
        'PortMapping$containerPort' => '<p>The port number on the container that should be used with the port mapping.</p>',
        'PortMapping$hostPort' => '<p>The port number on the host that should be used with the port mapping.</p>',
        'Resource$integerValue' => '<p>When the <code>integerValue</code> type is set, the value of the resource must be an integer.</p>',
        'TaskDefinition$revision' => '<p>The revision of the task in a particular family. You can think of the revision as a version number of a task definition in a family. When you register a task definition for the first time, the revision is <code>1</code>, and each time you register a task definition in the same family, the revision value increases by one.</p>',
      ],
    ],
    'KeyValuePair' => [
      'base' => NULL,
      'refs' => [
        'EnvironmentVariables$member' => NULL,
      ],
    ],
    'ListClustersRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListClustersResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListContainerInstancesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListContainerInstancesResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListTaskDefinitionsRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListTaskDefinitionsResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListTasksRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListTasksResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'Long' => [
      'base' => NULL,
      'refs' => [
        'Resource$longValue' => '<p>When the <code>longValue</code> type is set, the value of the resource must be an extended precision floating-point type.</p>',
      ],
    ],
    'NetworkBinding' => [
      'base' => NULL,
      'refs' => [
        'NetworkBindings$member' => NULL,
      ],
    ],
    'NetworkBindings' => [
      'base' => NULL,
      'refs' => [
        'Container$networkBindings' => NULL,
        'SubmitContainerStateChangeRequest$networkBindings' => '<p>The network bindings of the container.</p>',
      ],
    ],
    'PortMapping' => [
      'base' => '<p>Port mappings allow containers to access ports on the host container instance to send or receive traffic. Port mappings are specified as part of the container definition.</p>',
      'refs' => [
        'PortMappingList$member' => NULL,
      ],
    ],
    'PortMappingList' => [
      'base' => NULL,
      'refs' => [
        'ContainerDefinition$portMappings' => '<p>The list of port mappings for the container.</p>',
      ],
    ],
    'RegisterContainerInstanceRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'RegisterContainerInstanceResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'RegisterTaskDefinitionRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'RegisterTaskDefinitionResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'Resource' => [
      'base' => '<p>Describes the resources available for a container instance.</p>',
      'refs' => [
        'Resources$member' => NULL,
      ],
    ],
    'Resources' => [
      'base' => NULL,
      'refs' => [
        'ContainerInstance$remainingResources' => '<p>The remaining resources of the container instance that are available for new tasks.</p>',
        'ContainerInstance$registeredResources' => '<p>The registered resources on the container instance that are in use by current tasks.</p>',
        'RegisterContainerInstanceRequest$totalResources' => NULL,
      ],
    ],
    'RunTaskRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'RunTaskResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ServerException' => [
      'base' => NULL,
      'refs' => [],
    ],
    'StartTaskRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'StartTaskResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'StopTaskRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'StopTaskResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'String' => [
      'base' => NULL,
      'refs' => [
        'ClientException$message' => '<p>These errors are usually caused by something the client did, such as use an action or resource on behalf of a user that doesn\'t have permission to use the action or resource, or specify an identifier that is not valid.</p>',
        'Cluster$clusterArn' => '<p>The Amazon Resource Name (ARN] that identifies the cluster. The ARN contains the <code>arn:aws:ecs</code> namespace, followed by the region of the cluster, the AWS account ID of the cluster owner, the <code>cluster</code> namespace, and then the cluster name. For example, arn:aws:ecs:<i>region</i>:<i>012345678910</i>:cluster/<i>test</i>.</p>',
        'Cluster$clusterName' => '<p>A user-generated string that you can use to identify your cluster.</p>',
        'Cluster$status' => '<p>The status of the cluster. The valid values are <code>ACTIVE</code> or <code>INACTIVE</code>. <code>ACTIVE</code> indicates that you can register container instances with the cluster and the associated instances can accept tasks.</p>',
        'Container$containerArn' => '<p>The Amazon Resource Name (ARN] of the container.</p>',
        'Container$taskArn' => '<p>The Amazon Resource Name (ARN] of the task.</p>',
        'Container$name' => '<p>The name of the container.</p>',
        'Container$lastStatus' => '<p>The last known status of the container.</p>',
        'Container$reason' => '<p>A short (255 max characters] human-readable string to provide additional detail about a running or stopped container.</p>',
        'ContainerDefinition$name' => '<p>The name of a container. If you are linking multiple containers together in a task definition, the <code>name</code> of one container can be entered in the <code>links</code> of another container to connect the containers.</p>',
        'ContainerDefinition$image' => '<p>The image used to start a container. This string is passed directly to the Docker daemon. Images in the Docker Hub registry are available by default. Other repositories are specified with <code><i>repository-url</i>/<i>image</i>:<i>tag</i></code>.</p>',
        'ContainerInstance$containerInstanceArn' => '<p>The Amazon Resource Name (ARN] of the container instance. The ARN contains the <code>arn:aws:ecs</code> namespace, followed by the region of the container instance, the AWS account ID of the container instance owner, the <code>container-instance</code> namespace, and then the container instance UUID. For example, arn:aws:ecs:<i>region</i>:<i>aws_account_id</i>:container-instance/<i>container_instance_UUID</i>.</p>',
        'ContainerInstance$ec2InstanceId' => '<p>The Amazon EC2 instance ID of the container instance.</p>',
        'ContainerInstance$status' => '<p>The status of the container instance. The valid values are <code>ACTIVE</code> or <code>INACTIVE</code>. <code>ACTIVE</code> indicates that the container instance can accept tasks.</p>',
        'ContainerOverride$name' => '<p>The name of the container that receives the override.</p>',
        'CreateClusterRequest$clusterName' => '<p>The name of your cluster. If you do not specify a name for your cluster, you will create a cluster named <code>default</code>.</p>',
        'DeleteClusterRequest$cluster' => '<p>The cluster you want to delete.</p>',
        'DeregisterContainerInstanceRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that hosts the container instance you want to deregister. If you do not specify a cluster, the default cluster is assumed.</p>',
        'DeregisterContainerInstanceRequest$containerInstance' => '<p>The container instance UUID or full Amazon Resource Name (ARN] of the container instance you want to deregister. The ARN contains the <code>arn:aws:ecs</code> namespace, followed by the region of the container instance, the AWS account ID of the container instance owner, the <code>container-instance</code> namespace, and then the container instance UUID. For example, arn:aws:ecs:<i>region</i>:<i>aws_account_id</i>:container-instance/<i>container_instance_UUID</i>.</p>',
        'DeregisterTaskDefinitionRequest$taskDefinition' => '<p>The <code>family</code> and <code>revision</code> (<code>family:revision</code>] or full Amazon Resource Name (ARN] of the task definition that you want to deregister.</p>',
        'DescribeContainerInstancesRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that hosts the container instances you want to describe. If you do not specify a cluster, the default cluster is assumed.</p>',
        'DescribeTaskDefinitionRequest$taskDefinition' => '<p>The <code>family</code> and <code>revision</code> (<code>family:revision</code>] or full Amazon Resource Name (ARN] of the task definition that you want to describe.</p>',
        'DescribeTasksRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that hosts the task you want to describe. If you do not specify a cluster, the default cluster is assumed.</p>',
        'DiscoverPollEndpointRequest$containerInstance' => '<p>The container instance UUID or full Amazon Resource Name (ARN] of the container instance. The ARN contains the <code>arn:aws:ecs</code> namespace, followed by the region of the container instance, the AWS account ID of the container instance owner, the <code>container-instance</code> namespace, and then the container instance UUID. For example, arn:aws:ecs:<i>region</i>:<i>aws_account_id</i>:container-instance/<i>container_instance_UUID</i>.</p>',
        'DiscoverPollEndpointResponse$endpoint' => '<p>The endpoint for the Amazon ECS agent to poll.</p>',
        'Failure$arn' => '<p>The Amazon Resource Name (ARN] of the failed resource.</p>',
        'Failure$reason' => '<p>The reason for the failure.</p>',
        'KeyValuePair$name' => '<p>The name of the key value pair.</p>',
        'KeyValuePair$value' => '<p>The value of the key value pair.</p>',
        'ListClustersRequest$nextToken' => '<p>The <code>nextToken</code> value returned from a previous paginated <code>ListClusters</code> request where <code>maxResults</code> was used and the results exceeded the value of that parameter. Pagination continues from the end of the previous results that returned the <code>nextToken</code> value. This value is <code>null</code> when there are no more results to return.</p>',
        'ListClustersResponse$nextToken' => '<p>The <code>nextToken</code> value to include in a future <code>ListClusters</code> request. When the results of a <code>ListClusters</code> request exceed <code>maxResults</code>, this value can be used to retrieve the next page of results. This value is <code>null</code> when there are no more results to return.</p>',
        'ListContainerInstancesRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that hosts the container instances you want to list. If you do not specify a cluster, the default cluster is assumed..</p>',
        'ListContainerInstancesRequest$nextToken' => '<p>The <code>nextToken</code> value returned from a previous paginated <code>ListContainerInstances</code> request where <code>maxResults</code> was used and the results exceeded the value of that parameter. Pagination continues from the end of the previous results that returned the <code>nextToken</code> value. This value is <code>null</code> when there are no more results to return.</p>',
        'ListContainerInstancesResponse$nextToken' => '<p>The <code>nextToken</code> value to include in a future <code>ListContainerInstances</code> request. When the results of a <code>ListContainerInstances</code> request exceed <code>maxResults</code>, this value can be used to retrieve the next page of results. This value is <code>null</code> when there are no more results to return.</p>',
        'ListTaskDefinitionsRequest$familyPrefix' => '<p>The name of the family that you want to filter the <code>ListTaskDefinitions</code> results with. Specifying a <code>familyPrefix</code> will limit the listed task definitions to definitions that belong to that family.</p>',
        'ListTaskDefinitionsRequest$nextToken' => '<p>The <code>nextToken</code> value returned from a previous paginated <code>ListTaskDefinitions</code> request where <code>maxResults</code> was used and the results exceeded the value of that parameter. Pagination continues from the end of the previous results that returned the <code>nextToken</code> value. This value is <code>null</code> when there are no more results to return.</p>',
        'ListTaskDefinitionsResponse$nextToken' => '<p>The <code>nextToken</code> value to include in a future <code>ListTaskDefinitions</code> request. When the results of a <code>ListTaskDefinitions</code> request exceed <code>maxResults</code>, this value can be used to retrieve the next page of results. This value is <code>null</code> when there are no more results to return.</p>',
        'ListTasksRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that hosts the tasks you want to list. If you do not specify a cluster, the default cluster is assumed..</p>',
        'ListTasksRequest$containerInstance' => '<p>The container instance UUID or full Amazon Resource Name (ARN] of the container instance that you want to filter the <code>ListTasks</code> results with. Specifying a <code>containerInstance</code> will limit the results to tasks that belong to that container instance.</p>',
        'ListTasksRequest$family' => '<p>The name of the family that you want to filter the <code>ListTasks</code> results with. Specifying a <code>family</code> will limit the results to tasks that belong to that family.</p>',
        'ListTasksRequest$nextToken' => '<p>The <code>nextToken</code> value returned from a previous paginated <code>ListTasks</code> request where <code>maxResults</code> was used and the results exceeded the value of that parameter. Pagination continues from the end of the previous results that returned the <code>nextToken</code> value. This value is <code>null</code> when there are no more results to return.</p>',
        'ListTasksResponse$nextToken' => '<p>The <code>nextToken</code> value to include in a future <code>ListTasks</code> request. When the results of a <code>ListTasks</code> request exceed <code>maxResults</code>, this value can be used to retrieve the next page of results. This value is <code>null</code> when there are no more results to return.</p>',
        'NetworkBinding$bindIP' => '<p>The IP address that the container is bound to on the container instance.</p>',
        'RegisterContainerInstanceRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that you want to register your container instance with. If you do not specify a cluster, the default cluster is assumed..</p>',
        'RegisterContainerInstanceRequest$instanceIdentityDocument' => NULL,
        'RegisterContainerInstanceRequest$instanceIdentityDocumentSignature' => NULL,
        'RegisterTaskDefinitionRequest$family' => '<p>You can specify a <code>family</code> for a task definition, which allows you to track multiple versions of the same task definition. You can think of the <code>family</code> as a name for your task definition.</p>',
        'Resource$name' => '<p>The name of the resource, such as <code>CPU</code>, <code>MEMORY</code>, <code>PORTS</code>, or a user-defined resource.</p>',
        'Resource$type' => '<p>The type of the resource, such as <code>INTEGER</code>, <code>DOUBLE</code>, <code>LONG</code>, or <code>STRINGSET</code>.</p>',
        'RunTaskRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that you want to run your task on. If you do not specify a cluster, the default cluster is assumed..</p>',
        'RunTaskRequest$taskDefinition' => '<p>The <code>family</code> and <code>revision</code> (<code>family:revision</code>] or full Amazon Resource Name (ARN] of the task definition that you want to run.</p>',
        'ServerException$message' => '<p>These errors are usually caused by a server-side issue.</p>',
        'StartTaskRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that you want to start your task on. If you do not specify a cluster, the default cluster is assumed..</p>',
        'StartTaskRequest$taskDefinition' => '<p>The <code>family</code> and <code>revision</code> (<code>family:revision</code>] or full Amazon Resource Name (ARN] of the task definition that you want to start.</p>',
        'StopTaskRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that hosts the task you want to stop. If you do not specify a cluster, the default cluster is assumed..</p>',
        'StopTaskRequest$task' => '<p>The task UUIDs or full Amazon Resource Name (ARN] entry of the task you would like to stop.</p>',
        'StringList$member' => NULL,
        'SubmitContainerStateChangeRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that hosts the container.</p>',
        'SubmitContainerStateChangeRequest$task' => '<p>The task UUID or full Amazon Resource Name (ARN] of the task that hosts the container.</p>',
        'SubmitContainerStateChangeRequest$containerName' => '<p>The name of the container.</p>',
        'SubmitContainerStateChangeRequest$status' => '<p>The status of the state change request.</p>',
        'SubmitContainerStateChangeRequest$reason' => '<p>The reason for the state change request.</p>',
        'SubmitContainerStateChangeResponse$acknowledgment' => '<p>Acknowledgement of the state change.</p>',
        'SubmitTaskStateChangeRequest$cluster' => '<p>The short name or full Amazon Resource Name (ARN] of the cluster that hosts the task.</p>',
        'SubmitTaskStateChangeRequest$task' => '<p>The task UUID or full Amazon Resource Name (ARN] of the task in the state change request.</p>',
        'SubmitTaskStateChangeRequest$status' => '<p>The status of the state change request.</p>',
        'SubmitTaskStateChangeRequest$reason' => '<p>The reason for the state change request.</p>',
        'SubmitTaskStateChangeResponse$acknowledgment' => '<p>Acknowledgement of the state change.</p>',
        'Task$taskArn' => '<p>The Amazon Resource Name (ARN] of the task.</p>',
        'Task$clusterArn' => '<p>The Amazon Resource Name (ARN] of the of the cluster that hosts the task.</p>',
        'Task$taskDefinitionArn' => '<p>The Amazon Resource Name (ARN] of the of the task definition that creates the task.</p>',
        'Task$containerInstanceArn' => '<p>The Amazon Resource Name (ARN] of the container instances that host the task.</p>',
        'Task$lastStatus' => '<p>The last known status of the task.</p>',
        'Task$desiredStatus' => '<p>The desired status of the task.</p>',
        'TaskDefinition$taskDefinitionArn' => '<p>The full Amazon Resource Name (ARN] of the of the task definition.</p>',
        'TaskDefinition$family' => '<p>The family of your task definition. You can think of the <code>family</code> as the name of your task definition.</p>',
      ],
    ],
    'StringList' => [
      'base' => NULL,
      'refs' => [
        'ContainerDefinition$links' => '<p>The <code>link</code> parameter allows containers to communicate with each other without the need for port mappings, using the <code>name</code> parameter. For more information on linking Docker containers, see <a href="https://docs.docker.com/userguide/dockerlinks/">https://docs.docker.com/userguide/dockerlinks/</a>.</p>',
        'ContainerDefinition$entryPoint' => '<p>The <code>ENTRYPOINT</code> that is passed to the container. For more information on the Docker <code>ENTRYPOINT</code> parameter, see <a href="https://docs.docker.com/reference/builder/#entrypoint">https://docs.docker.com/reference/builder/#entrypoint</a>.</p>',
        'ContainerDefinition$command' => '<p>The <code>CMD</code> that is passed to the container. For more information on the Docker <code>CMD</code> parameter, see <a href="https://docs.docker.com/reference/builder/#cmd">https://docs.docker.com/reference/builder/#cmd</a>.</p>',
        'ContainerOverride$command' => '<p>The command to send to the container that receives the override.</p>',
        'DescribeClustersRequest$clusters' => '<p>A space-separated list of cluster names or full cluster Amazon Resource Name (ARN] entries. If you do not specify a cluster, the default cluster is assumed.</p>',
        'DescribeContainerInstancesRequest$containerInstances' => '<p>A space-separated list of container instance UUIDs or full Amazon Resource Name (ARN] entries.</p>',
        'DescribeTasksRequest$tasks' => '<p>A space-separated list of task UUIDs or full Amazon Resource Name (ARN] entries.</p>',
        'ListClustersResponse$clusterArns' => '<p>The list of full Amazon Resource Name (ARN] entries for each cluster associated with your account.</p>',
        'ListContainerInstancesResponse$containerInstanceArns' => '<p>The list of container instance full Amazon Resource Name (ARN] entries for each container instance associated with the specified cluster.</p>',
        'ListTaskDefinitionsResponse$taskDefinitionArns' => '<p>The list of task definition Amazon Resource Name (ARN] entries for the <code>ListTaskDefintions</code> request.</p>',
        'ListTasksResponse$taskArns' => '<p>The list of task Amazon Resource Name (ARN] entries for the <code>ListTasks</code> request.</p>',
        'Resource$stringSetValue' => '<p>When the <code>stringSetValue</code> type is set, the value of the resource must be a string type.</p>',
        'StartTaskRequest$containerInstances' => '<p>The container instance UUIDs or full Amazon Resource Name (ARN] entries for the container instances on which you would like to place your task.</p>',
      ],
    ],
    'SubmitContainerStateChangeRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'SubmitContainerStateChangeResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'SubmitTaskStateChangeRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'SubmitTaskStateChangeResponse' => [
      'base' => NULL,
      'refs' => [],
    ],
    'Task' => [
      'base' => NULL,
      'refs' => [
        'StopTaskResponse$task' => NULL,
        'Tasks$member' => NULL,
      ],
    ],
    'TaskDefinition' => [
      'base' => NULL,
      'refs' => [
        'DeregisterTaskDefinitionResponse$taskDefinition' => '<p>The full description of the deregistered task.</p>',
        'DescribeTaskDefinitionResponse$taskDefinition' => '<p>The full task definition description.</p>',
        'RegisterTaskDefinitionResponse$taskDefinition' => NULL,
      ],
    ],
    'TaskOverride' => [
      'base' => NULL,
      'refs' => [
        'RunTaskRequest$overrides' => NULL,
        'StartTaskRequest$overrides' => NULL,
        'Task$overrides' => '<p>One or more container overrides.</p>',
      ],
    ],
    'Tasks' => [
      'base' => NULL,
      'refs' => [
        'DescribeTasksResponse$tasks' => '<p>The list of tasks.</p>',
        'RunTaskResponse$tasks' => '<p>A full description of the tasks that were run. Each task that was successfully placed on your cluster will be described here.</p>',
        'StartTaskResponse$tasks' => '<p>A full description of the tasks that were started. Each task that was successfully placed on your container instances will be described here.</p>',
      ],
    ],
  ],
];
