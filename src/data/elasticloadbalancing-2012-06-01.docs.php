<?php return [
  'operations' => [
    'AddTags' => '<p>Adds one or more tags for the specified load balancer. Each load balancer can have a maximum of 10 tags. Each tag consists of a key and an optional value.</p> <p>Tag keys must be unique for each load balancer. If a tag with the same key is already associated with the load balancer, this action will update the value of the key.</p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/TerminologyandKeyConcepts.html#tagging-elb">Tagging</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p>',
    'ApplySecurityGroupsToLoadBalancer' => '<p> Associates one or more security groups with your load balancer in Amazon Virtual Private Cloud (Amazon VPC]. The provided security group IDs will override any currently applied security groups. </p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/USVPC_ApplySG.html">Manage Security Groups in Amazon VPC</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p>',
    'AttachLoadBalancerToSubnets' => '<p> Adds one or more subnets to the set of configured subnets in the Amazon Virtual Private Cloud (Amazon VPC] for the load balancer. </p> <p> The load balancers evenly distribute requests across all of the registered subnets. For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/UserScenariosForVPC.html">Deploy Elastic Load Balancing in Amazon VPC</a> in the <i>Elastic Load Balancing Developer Guide</i>. </p>',
    'ConfigureHealthCheck' => '<p> Specifies the health check settings to use for evaluating the health state of your back-end instances. </p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/TerminologyandKeyConcepts.html#healthcheck">Health Check</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p>',
    'CreateAppCookieStickinessPolicy' => '<p> Generates a stickiness policy with sticky session lifetimes that follow that of an application-generated cookie. This policy can be associated only with HTTP/HTTPS listeners. </p> <p> This policy is similar to the policy created by <a>CreateLBCookieStickinessPolicy</a>, except that the lifetime of the special Elastic Load Balancing cookie follows the lifetime of the application-generated cookie specified in the policy configuration. The load balancer only inserts a new stickiness cookie when the application response includes a new application cookie. </p> <p> If the application cookie is explicitly removed or expires, the session stops being sticky until a new application cookie is issued. </p> <note> An application client must receive and send two cookies: the application-generated cookie and the special Elastic Load Balancing cookie named <code>AWSELB</code>. This is the default behavior for many common web browsers. </note> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/US_StickySessions.html#US_EnableStickySessionsAppCookies">Enabling Application-Controlled Session Stickiness</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p>',
    'CreateLBCookieStickinessPolicy' => '<p> Generates a stickiness policy with sticky session lifetimes controlled by the lifetime of the browser (user-agent] or a specified expiration period. This policy can be associated only with HTTP/HTTPS listeners. </p> <p> When a load balancer implements this policy, the load balancer uses a special cookie to track the backend server instance for each request. When the load balancer receives a request, it first checks to see if this cookie is present in the request. If so, the load balancer sends the request to the application server specified in the cookie. If not, the load balancer sends the request to a server that is chosen based on the existing load balancing algorithm. </p> <p> A cookie is inserted into the response for binding subsequent requests from the same user to that server. The validity of the cookie is based on the cookie expiration time, which is specified in the policy configuration. </p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/US_StickySessions.html#US_EnableStickySessionsLBCookies">Enabling Duration-Based Session Stickiness</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p>',
    'CreateLoadBalancer' => '<p> Creates a new load balancer. </p> <p> After the call has completed successfully, a new load balancer is created with a unique Domain Name Service (DNS] name. The DNS name includes the name of the AWS region in which the load balance was created. For example, if your load balancer was created in the United States, the DNS name might end with either of the following:</p> <ul> <li> <i>us-east-1.elb.amazonaws.com</i> (for the Northern Virginia region] </li> <li> <i>us-west-1.elb.amazonaws.com</i> (for the Northern California region] </li> </ul> <p>For information about the AWS regions supported by Elastic Load Balancing, see <a href="http://docs.aws.amazon.com/general/latest/gr/rande.html#elb_region">Regions and Endpoints</a>.</p> <p>You can create up to 20 load balancers per region per account.</p> <p>Elastic Load Balancing supports load balancing your Amazon EC2 instances launched within any one of the following platforms:</p> <ul> <li> <i>EC2-Classic</i> <p>For information on creating and managing your load balancers in EC2-Classic, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/UserScenariosForEC2.html">Deploy Elastic Load Balancing in Amazon EC2-Classic</a>.</p> </li> <li> <i>EC2-VPC</i> <p>For information on creating and managing your load balancers in EC2-VPC, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/UserScenariosForVPC.html">Deploy Elastic Load Balancing in Amazon VPC</a>.</p> </li> </ul>',
    'CreateLoadBalancerListeners' => '<p> Creates one or more listeners on a load balancer for the specified port. If a listener with the given port does not already exist, it will be created; otherwise, the properties of the new listener must match the properties of the existing listener. </p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/us-add-listener.html">Add a Listener to Your Load Balancer</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p>',
    'CreateLoadBalancerPolicy' => '<p> Creates a new policy that contains the necessary attributes depending on the policy type. Policies are settings that are saved for your load balancer and that can be applied to the front-end listener, or the back-end application server, depending on your policy type. </p>',
    'DeleteLoadBalancer' => '<p> Deletes the specified load balancer. </p> <p> If attempting to recreate the load balancer, you must reconfigure all the settings. The DNS name associated with a deleted load balancer will no longer be usable. Once deleted, the name and associated DNS record of the load balancer no longer exist and traffic sent to any of its IP addresses will no longer be delivered to back-end instances. </p> <p> To successfully call this API, you must provide the same account credentials as were used to create the load balancer. </p> <note> By design, if the load balancer does not exist or has already been deleted, a call to <code>DeleteLoadBalancer</code> action still succeeds. </note>',
    'DeleteLoadBalancerListeners' => '<p> Deletes listeners from the load balancer for the specified port. </p>',
    'DeleteLoadBalancerPolicy' => '<p> Deletes a policy from the load balancer. The specified policy must not be enabled for any listeners. </p>',
    'DeregisterInstancesFromLoadBalancer' => '<p> Deregisters instances from the load balancer. Once the instance is deregistered, it will stop receiving traffic from the load balancer. </p> <p> In order to successfully call this API, the same account credentials as those used to create the load balancer must be provided. </p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/US_DeReg_Reg_Instances.html">De-register and Register Amazon EC2 Instances</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p> <p>You can use <a>DescribeLoadBalancers</a> to verify if the instance is deregistered from the load balancer.</p>',
    'DescribeInstanceHealth' => '<p> Returns the current state of the specified instances registered with the specified load balancer. If no instances are specified, the state of all the instances registered with the load balancer is returned. </p> <note> You must provide the same account credentials as those that were used to create the load balancer. </note>',
    'DescribeLoadBalancerAttributes' => '<p>Returns detailed information about all of the attributes associated with the specified load balancer.</p>',
    'DescribeLoadBalancerPolicies' => '<p>Returns detailed descriptions of the policies. If you specify a load balancer name, the action returns the descriptions of all the policies created for the load balancer. If you specify a policy name associated with your load balancer, the action returns the description of that policy. If you don\'t specify a load balancer name, the action returns descriptions of the specified sample policies, or descriptions of all the sample policies. The names of the sample policies have the <code>ELBSample-</code> prefix. </p>',
    'DescribeLoadBalancerPolicyTypes' => '<p> Returns meta-information on the specified load balancer policies defined by the Elastic Load Balancing service. The policy types that are returned from this action can be used in a <a>CreateLoadBalancerPolicy</a> action to instantiate specific policy configurations that will be applied to a load balancer. </p>',
    'DescribeLoadBalancers' => '<p> Returns detailed configuration information for all the load balancers created for the account. If you specify load balancer names, the action returns configuration information of the specified load balancers. </p> <note> In order to retrieve this information, you must provide the same account credentials that was used to create the load balancer.</note>',
    'DescribeTags' => '<p>Describes the tags associated with one or more load balancers.</p>',
    'DetachLoadBalancerFromSubnets' => '<p> Removes subnets from the set of configured subnets in the Amazon Virtual Private Cloud (Amazon VPC] for the load balancer. </p> <p> After a subnet is removed all of the EC2 instances registered with the load balancer that are in the removed subnet will go into the <i>OutOfService</i> state. When a subnet is removed, the load balancer will balance the traffic among the remaining routable subnets for the load balancer. </p>',
    'DisableAvailabilityZonesForLoadBalancer' => '<p> Removes the specified EC2 Availability Zones from the set of configured Availability Zones for the load balancer. </p> <p> There must be at least one Availability Zone registered with a load balancer at all times. Once an Availability Zone is removed, all the instances registered with the load balancer that are in the removed Availability Zone go into the <i>OutOfService</i> state. Upon Availability Zone removal, the load balancer attempts to equally balance the traffic among its remaining usable Availability Zones. Trying to remove an Availability Zone that was not associated with the load balancer does nothing. </p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/US_ShrinkLBApp04.html">Disable an Availability Zone from a Load-Balanced Application</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p>',
    'EnableAvailabilityZonesForLoadBalancer' => '<p> Adds one or more EC2 Availability Zones to the load balancer. </p> <p> The load balancer evenly distributes requests across all its registered Availability Zones that contain instances. </p> <note> The new EC2 Availability Zones to be added must be in the same EC2 Region as the Availability Zones for which the load balancer was created. </note> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/US_AddLBAvailabilityZone.html">Expand a Load Balanced Application to an Additional Availability Zone</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p>',
    'ModifyLoadBalancerAttributes' => '<p>Modifies the attributes of a specified load balancer.</p> <p>You can modify the load balancer attributes, such as <code>AccessLogs</code>, <code>ConnectionDraining</code>, and <code>CrossZoneLoadBalancing</code> by either enabling or disabling them. Or, you can modify the load balancer attribute <code>ConnectionSettings</code> by specifying an idle connection timeout value for your load balancer.</p> <p>For more information, see the following:</p> <ul> <li><a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/TerminologyandKeyConcepts.html#request-routing">Cross-Zone Load Balancing</a></li> <li><a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/TerminologyandKeyConcepts.html#conn-drain">Connection Draining</a></li> <li><a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/access-log-collection.html">Access Logs</a></li> <li><a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/TerminologyandKeyConcepts.html#idle-timeout">Idle Connection Timeout</a></li> </ul>',
    'RegisterInstancesWithLoadBalancer' => '<p> Adds new instances to the load balancer. </p> <p> Once the instance is registered, it starts receiving traffic and requests from the load balancer. Any instance that is not in any of the Availability Zones registered for the load balancer will be moved to the <i>OutOfService</i> state. It will move to the <i>InService</i> state when the Availability Zone is added to the load balancer. </p> <p>When an instance registered with a load balancer is stopped and then restarted, the IP addresses associated with the instance changes. Elastic Load Balancing cannot recognize the new IP address, which prevents it from routing traffic to the instances. We recommend that you de-register your Amazon EC2 instances from your load balancer after you stop your instance, and then register the load balancer with your instance after you\'ve restarted. To de-register your instances from load balancer, use <a>DeregisterInstancesFromLoadBalancer</a> action.</p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/US_DeReg_Reg_Instances.html">De-register and Register Amazon EC2 Instances</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p> <note> In order for this call to be successful, you must provide the same account credentials as those that were used to create the load balancer. </note> <note> Completion of this API does not guarantee that operation has completed. Rather, it means that the request has been registered and the changes will happen shortly. </note> <p>You can use <a>DescribeLoadBalancers</a> or <a>DescribeInstanceHealth</a> action to check the state of the newly registered instances.</p>',
    'RemoveTags' => '<p>Removes one or more tags from the specified load balancer.</p>',
    'SetLoadBalancerListenerSSLCertificate' => '<p> Sets the certificate that terminates the specified listener\'s SSL connections. The specified certificate replaces any prior certificate that was used on the same load balancer and port. </p> <p>For more information on updating your SSL certificate, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/US_UpdatingLoadBalancerSSL.html">Updating an SSL Certificate for a Load Balancer</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p>',
    'SetLoadBalancerPoliciesForBackendServer' => '<p> Replaces the current set of policies associated with a port on which the back-end server is listening with a new set of policies. After the policies have been created using <a>CreateLoadBalancerPolicy</a>, they can be applied here as a list. At this time, only the back-end server authentication policy type can be applied to the back-end ports; this policy type is composed of multiple public key policies. </p> <note> <p>The <i>SetLoadBalancerPoliciesForBackendServer</i> replaces the current set of policies associated with the specified instance port. Every time you use this action to enable the policies, use the <code>PolicyNames</code> parameter to list all the policies you want to enable.</p> </note> <p>You can use <a>DescribeLoadBalancers</a> or <a>DescribeLoadBalancerPolicies</a> action to verify that the policy has been associated with the back-end server.</p>',
    'SetLoadBalancerPoliciesOfListener' => '<p> Associates, updates, or disables a policy with a listener on the load balancer. You can associate multiple policies with a listener. </p>',
  ],
  'service' => '<fullname>Elastic Load Balancing</fullname> <p>Elastic Load Balancing is a way to automatically distribute incoming web traffic across applications that run on multiple Amazon Elastic Compute Cloud (Amazon EC2] instances. </p> <p>You can create, access, and manage Elastic Load Balancing using the AWS Management Console, the AWS Command Line Interface (AWS CLI], the Query API, or the AWS SDKs. For more information about Elastic Load Balancing interfaces, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/SvcIntro_Interfaces.html">Accessing Elastic Load Balancing</a>.</p> <p>This reference guide contains documentation for the Query API and the AWS CLI commands, to manage Elastic Load Balancing. </p> <p>For detailed information about Elastic Load Balancing features and their associated actions or commands, go to <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/UserScenarios.html">Managing Load Balancers</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p> <p>This reference guide is based on the current WSDL, which is available at: <a href="http://ec2-downloads.s3.amazonaws.com/ElasticLoadBalancing.wsdl"></a>. </p> <p><b>Endpoints</b></p> <p>The examples in this guide assume that your load balancers are created in the US East (Northern Virginia] region and use us-east-1 as the endpoint.</p> <p>You can create your load balancers in other AWS regions. For information about regions and endpoints supported by Elastic Load Balancing, see <a href="http://docs.aws.amazon.com/general/latest/gr/index.html?rande.html">Regions and Endpoints</a> in the Amazon Web Services General Reference. </p> <p><b>Idempotency</b></p> <p>All Elastic Load Balancing Query API actions and AWS CLI commands are designed to be idempotent. An <i>idempotent</i> action or command completes no more than one time. If you repeat a request or a command using the same values the action will succeed with a 200 OK response code. </p>',
  'shapes' => [
    'AccessLog' => [
      'base' => '<p>The <code>AccessLog</code> data type.</p>',
      'refs' => [
        'LoadBalancerAttributes$AccessLog' => '<p>The name of the load balancer attribute. If enabled, the load balancer captures detailed information of all the requests and delivers the information to the Amazon S3 bucket that you specify.</p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/enable-access-logs.html">Enable Access Logs</a>.</p>',
      ],
    ],
    'AccessLogEnabled' => [
      'base' => NULL,
      'refs' => [
        'AccessLog$Enabled' => '<p>Specifies whether access log is enabled for the load balancer.</p>',
      ],
    ],
    'AccessLogInterval' => [
      'base' => NULL,
      'refs' => [
        'AccessLog$EmitInterval' => '<p>The interval for publishing the access logs. You can specify an interval of either 5 minutes or 60 minutes.</p> <p>Default: 60 minutes</p>',
      ],
    ],
    'AccessLogPrefix' => [
      'base' => NULL,
      'refs' => [
        'AccessLog$S3BucketPrefix' => '<p>The logical hierarchy you created for your Amazon S3 bucket, for example <code>my-bucket-prefix/prod</code>. If the prefix is not provided, the log is placed at the root level of the bucket.</p>',
      ],
    ],
    'AccessPointName' => [
      'base' => NULL,
      'refs' => [
        'AddAvailabilityZonesInput$LoadBalancerName' => '<p> The name associated with the load balancer. </p>',
        'ApplySecurityGroupsToLoadBalancerInput$LoadBalancerName' => '<p> The name associated with the load balancer. The name must be unique within the set of load balancers associated with your AWS account. </p>',
        'AttachLoadBalancerToSubnetsInput$LoadBalancerName' => '<p> The name associated with the load balancer. The name must be unique within the set of load balancers associated with your AWS account. </p>',
        'ConfigureHealthCheckInput$LoadBalancerName' => '<p> The mnemonic name associated with the load balancer. The name must be unique within the set of load balancers associated with your AWS account. </p>',
        'CreateAccessPointInput$LoadBalancerName' => '<p> The name associated with the load balancer. </p> <p> The name must be unique within your set of load balancers, must have a maximum of 32 characters, and must only contain alphanumeric characters or hyphens. </p>',
        'CreateAppCookieStickinessPolicyInput$LoadBalancerName' => '<p> The name of the load balancer. </p>',
        'CreateLBCookieStickinessPolicyInput$LoadBalancerName' => '<p> The name associated with the load balancer. </p>',
        'CreateLoadBalancerListenerInput$LoadBalancerName' => '<p> The name of the load balancer. </p>',
        'CreateLoadBalancerPolicyInput$LoadBalancerName' => '<p> The name associated with the LoadBalancer for which the policy is being created. </p>',
        'DeleteAccessPointInput$LoadBalancerName' => '<p> The name associated with the load balancer. </p>',
        'DeleteLoadBalancerListenerInput$LoadBalancerName' => '<p> The mnemonic name associated with the load balancer. </p>',
        'DeleteLoadBalancerPolicyInput$LoadBalancerName' => '<p> The mnemonic name associated with the load balancer. </p>',
        'DeregisterEndPointsInput$LoadBalancerName' => '<p> The name associated with the load balancer. </p>',
        'DescribeEndPointStateInput$LoadBalancerName' => '<p> The name of the load balancer. </p>',
        'DescribeLoadBalancerAttributesInput$LoadBalancerName' => '<p>The name of the load balancer.</p>',
        'DescribeLoadBalancerPoliciesInput$LoadBalancerName' => '<p> The mnemonic name associated with the load balancer. If no name is specified, the operation returns the attributes of either all the sample policies pre-defined by Elastic Load Balancing or the specified sample polices. </p>',
        'DetachLoadBalancerFromSubnetsInput$LoadBalancerName' => '<p> The name associated with the load balancer to be detached. </p>',
        'LoadBalancerDescription$LoadBalancerName' => '<p> Specifies the name associated with the load balancer. </p>',
        'LoadBalancerNames$member' => NULL,
        'LoadBalancerNamesMax20$member' => NULL,
        'ModifyLoadBalancerAttributesInput$LoadBalancerName' => '<p>The name of the load balancer.</p>',
        'ModifyLoadBalancerAttributesOutput$LoadBalancerName' => '<p>The name of the load balancer.</p>',
        'RegisterEndPointsInput$LoadBalancerName' => '<p> The name associated with the load balancer. The name must be unique within your set of load balancers. </p>',
        'RemoveAvailabilityZonesInput$LoadBalancerName' => '<p> The name associated with the load balancer. </p>',
        'SetLoadBalancerListenerSSLCertificateInput$LoadBalancerName' => '<p> The name of the load balancer. </p>',
        'SetLoadBalancerPoliciesForBackendServerInput$LoadBalancerName' => '<p> The mnemonic name associated with the load balancer. This name must be unique within the set of your load balancers. </p>',
        'SetLoadBalancerPoliciesOfListenerInput$LoadBalancerName' => '<p> The name of the load balancer. </p>',
        'TagDescription$LoadBalancerName' => '<p>The name of the load balancer.</p>',
      ],
    ],
    'AccessPointNotFoundException' => [
      'base' => '<p> The specified load balancer could not be found. </p>',
      'refs' => [],
    ],
    'AccessPointPort' => [
      'base' => NULL,
      'refs' => [
        'Listener$LoadBalancerPort' => '<p> Specifies the port on which the load balancer is listening - 25, 80, 443, 465, 587, or 1024-65535. This property cannot be modified for the life of the load balancer. </p>',
        'Ports$member' => NULL,
        'SetLoadBalancerListenerSSLCertificateInput$LoadBalancerPort' => '<p> The port that uses the specified SSL certificate. </p>',
        'SetLoadBalancerPoliciesOfListenerInput$LoadBalancerPort' => '<p> The external port of the load balancer to associate the policy. </p>',
      ],
    ],
    'AddAvailabilityZonesInput' => [
      'base' => '<p> The input for the <a>EnableAvailabilityZonesForLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'AddAvailabilityZonesOutput' => [
      'base' => '<p> The output for the <a>EnableAvailabilityZonesForLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'AddTagsInput' => [
      'base' => 'The input for the <a>AddTags</a> action',
      'refs' => [],
    ],
    'AddTagsOutput' => [
      'base' => 'The output for the <a>AddTags</a> action.',
      'refs' => [],
    ],
    'AdditionalAttribute' => [
      'base' => '<p>The <code>AdditionalAttribute</code> data type.</p>',
      'refs' => [
        'AdditionalAttributes$member' => NULL,
      ],
    ],
    'AdditionalAttributes' => [
      'base' => NULL,
      'refs' => [
        'LoadBalancerAttributes$AdditionalAttributes' => '<p>This parameter is reserved for future use.</p>',
      ],
    ],
    'AppCookieStickinessPolicies' => [
      'base' => NULL,
      'refs' => [
        'Policies$AppCookieStickinessPolicies' => '<p> A list of the <a>AppCookieStickinessPolicy</a> objects created with <a>CreateAppCookieStickinessPolicy</a>. </p>',
      ],
    ],
    'AppCookieStickinessPolicy' => [
      'base' => '<p>The AppCookieStickinessPolicy data type. </p>',
      'refs' => [
        'AppCookieStickinessPolicies$member' => NULL,
      ],
    ],
    'ApplySecurityGroupsToLoadBalancerInput' => [
      'base' => '<p> The input for the <a>ApplySecurityGroupsToLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'ApplySecurityGroupsToLoadBalancerOutput' => [
      'base' => '<p> The out for the <a>ApplySecurityGroupsToLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'AttachLoadBalancerToSubnetsInput' => [
      'base' => '<p> The input for the <a>AttachLoadBalancerToSubnets</a> action. </p>',
      'refs' => [],
    ],
    'AttachLoadBalancerToSubnetsOutput' => [
      'base' => '<p> The output for the <a>AttachLoadBalancerToSubnets</a> action. </p>',
      'refs' => [],
    ],
    'AttributeName' => [
      'base' => NULL,
      'refs' => [
        'PolicyAttribute$AttributeName' => '<p> The name of the attribute associated with the policy. </p>',
        'PolicyAttributeDescription$AttributeName' => '<p> The name of the attribute associated with the policy. </p>',
        'PolicyAttributeTypeDescription$AttributeName' => '<p> The name of the attribute associated with the policy type. </p>',
      ],
    ],
    'AttributeType' => [
      'base' => NULL,
      'refs' => [
        'PolicyAttributeTypeDescription$AttributeType' => '<p> The type of attribute. For example, Boolean, Integer, etc. </p>',
      ],
    ],
    'AttributeValue' => [
      'base' => NULL,
      'refs' => [
        'PolicyAttribute$AttributeValue' => '<p> The value of the attribute associated with the policy. </p>',
        'PolicyAttributeDescription$AttributeValue' => '<p> The value of the attribute associated with the policy. </p>',
      ],
    ],
    'AvailabilityZone' => [
      'base' => NULL,
      'refs' => [
        'AvailabilityZones$member' => NULL,
      ],
    ],
    'AvailabilityZones' => [
      'base' => NULL,
      'refs' => [
        'AddAvailabilityZonesInput$AvailabilityZones' => '<p> A list of new Availability Zones for the load balancer. Each Availability Zone must be in the same region as the load balancer. </p>',
        'AddAvailabilityZonesOutput$AvailabilityZones' => '<p> An updated list of Availability Zones for the load balancer. </p>',
        'CreateAccessPointInput$AvailabilityZones' => '<p> A list of Availability Zones. </p> <p> At least one Availability Zone must be specified. Specified Availability Zones must be in the same EC2 Region as the load balancer. Traffic will be equally distributed across all zones. </p> <p> You can later add more Availability Zones after the creation of the load balancer by calling <a>EnableAvailabilityZonesForLoadBalancer</a> action. </p>',
        'LoadBalancerDescription$AvailabilityZones' => '<p> Specifies a list of Availability Zones. </p>',
        'RemoveAvailabilityZonesInput$AvailabilityZones' => '<p> A list of Availability Zones to be removed from the load balancer. </p> <note> There must be at least one Availability Zone registered with a load balancer at all times. Specified Availability Zones must be in the same region. </note>',
        'RemoveAvailabilityZonesOutput$AvailabilityZones' => '<p> A list of updated Availability Zones for the load balancer. </p>',
      ],
    ],
    'BackendServerDescription' => [
      'base' => '<p> This data type is used as a response element in the <a>DescribeLoadBalancers</a> action to describe the configuration of the back-end server. </p>',
      'refs' => [
        'BackendServerDescriptions$member' => NULL,
      ],
    ],
    'BackendServerDescriptions' => [
      'base' => NULL,
      'refs' => [
        'LoadBalancerDescription$BackendServerDescriptions' => '<p> Contains a list of back-end server descriptions. </p>',
      ],
    ],
    'Cardinality' => [
      'base' => NULL,
      'refs' => [
        'PolicyAttributeTypeDescription$Cardinality' => '<p> The cardinality of the attribute. Valid Values: <ul> <li>ONE(1] : Single value required</li> <li>ZERO_OR_ONE(0..1] : Up to one value can be supplied</li> <li>ZERO_OR_MORE(0..*] : Optional. Multiple values are allowed</li> <li>ONE_OR_MORE(1..*0] : Required. Multiple values are allowed</li> </ul> </p>',
      ],
    ],
    'CertificateNotFoundException' => [
      'base' => '<p> The specified SSL ID does not refer to a valid SSL certificate in the AWS Identity and Access Management Service. </p>',
      'refs' => [],
    ],
    'ConfigureHealthCheckInput' => [
      'base' => '<p> Input for the <a>ConfigureHealthCheck</a> action. </p>',
      'refs' => [],
    ],
    'ConfigureHealthCheckOutput' => [
      'base' => '<p> The output for the <a>ConfigureHealthCheck</a> action. </p>',
      'refs' => [],
    ],
    'ConnectionDraining' => [
      'base' => '<p>The <code>ConnectionDraining</code> data type.</p>',
      'refs' => [
        'LoadBalancerAttributes$ConnectionDraining' => '<p>The name of the load balancer attribute. If enabled, the load balancer allows existing requests to complete before the load balancer shifts traffic away from a deregistered or unhealthy back-end instance. </p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/config-conn-drain.html">Enable Connection Draining</a>.</p>',
      ],
    ],
    'ConnectionDrainingEnabled' => [
      'base' => NULL,
      'refs' => [
        'ConnectionDraining$Enabled' => '<p>Specifies whether connection draining is enabled for the load balancer.</p>',
      ],
    ],
    'ConnectionDrainingTimeout' => [
      'base' => NULL,
      'refs' => [
        'ConnectionDraining$Timeout' => '<p>Specifies the maximum time (in seconds] to keep the existing connections open before deregistering the instances.</p>',
      ],
    ],
    'ConnectionSettings' => [
      'base' => '<p>The <code>ConnectionSettings</code> data type.</p>',
      'refs' => [
        'LoadBalancerAttributes$ConnectionSettings' => '<p>The name of the load balancer attribute. </p> <p>By default, Elastic Load Balancing maintains a 60-second idle connection timeout for both front-end and back-end connections of your load balancer. If the <code>ConnectionSettings</code> attribute is set, Elastic Load Balancing will allow the connections to remain idle (no data is sent over the connection] for the specified duration.</p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/config-idle-timeout.html">Configure Idle Connection Timeout</a>.</p>',
      ],
    ],
    'CookieExpirationPeriod' => [
      'base' => NULL,
      'refs' => [
        'CreateLBCookieStickinessPolicyInput$CookieExpirationPeriod' => '<p> The time period in seconds after which the cookie should be considered stale. Not specifying this parameter indicates that the sticky session will last for the duration of the browser session. </p>',
        'LBCookieStickinessPolicy$CookieExpirationPeriod' => '<p>The time period in seconds after which the cookie should be considered stale. Not specifying this parameter indicates that the stickiness session will last for the duration of the browser session. </p>',
      ],
    ],
    'CookieName' => [
      'base' => NULL,
      'refs' => [
        'AppCookieStickinessPolicy$CookieName' => '<p>The name of the application cookie used for stickiness. </p>',
        'CreateAppCookieStickinessPolicyInput$CookieName' => '<p> Name of the application cookie used for stickiness. </p>',
      ],
    ],
    'CreateAccessPointInput' => [
      'base' => '<p> The input for the <a>CreateLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'CreateAccessPointOutput' => [
      'base' => '<p> The output for the <a>CreateLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'CreateAppCookieStickinessPolicyInput' => [
      'base' => '<p> The input for the <a>CreateAppCookieStickinessPolicy</a> action. </p>',
      'refs' => [],
    ],
    'CreateAppCookieStickinessPolicyOutput' => [
      'base' => '<p> The output for the <a>CreateAppCookieStickinessPolicy</a> action. </p>',
      'refs' => [],
    ],
    'CreateLBCookieStickinessPolicyInput' => [
      'base' => '<p> The input for the <a>CreateLBCookieStickinessPolicy</a> action. </p>',
      'refs' => [],
    ],
    'CreateLBCookieStickinessPolicyOutput' => [
      'base' => '<p> The output for the <a>CreateLBCookieStickinessPolicy</a> action. </p>',
      'refs' => [],
    ],
    'CreateLoadBalancerListenerInput' => [
      'base' => '<p> The input for the <a>CreateLoadBalancerListeners</a> action. </p>',
      'refs' => [],
    ],
    'CreateLoadBalancerListenerOutput' => [
      'base' => '<p> The output for the <a>CreateLoadBalancerListeners</a> action. </p>',
      'refs' => [],
    ],
    'CreateLoadBalancerPolicyInput' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateLoadBalancerPolicyOutput' => [
      'base' => '<p>The output for the <a>CreateLoadBalancerPolicy</a> action. </p>',
      'refs' => [],
    ],
    'CreatedTime' => [
      'base' => NULL,
      'refs' => [
        'LoadBalancerDescription$CreatedTime' => '<p> Provides the date and time the load balancer was created. </p>',
      ],
    ],
    'CrossZoneLoadBalancing' => [
      'base' => '<p>The <code>CrossZoneLoadBalancing</code> data type.</p>',
      'refs' => [
        'LoadBalancerAttributes$CrossZoneLoadBalancing' => '<p>The name of the load balancer attribute. If enabled, the load balancer routes the request traffic evenly across all back-end instances regardless of the Availability Zones.</p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/enable-disable-crosszone-lb.html">Enable Cross-Zone Load Balancing</a>.</p>',
      ],
    ],
    'CrossZoneLoadBalancingEnabled' => [
      'base' => NULL,
      'refs' => [
        'CrossZoneLoadBalancing$Enabled' => '<p>Specifies whether cross-zone load balancing is enabled for the load balancer.</p>',
      ],
    ],
    'DNSName' => [
      'base' => NULL,
      'refs' => [
        'CreateAccessPointOutput$DNSName' => '<p> The DNS name for the load balancer. </p>',
        'LoadBalancerDescription$DNSName' => '<p> Specifies the external DNS name associated with the load balancer. </p>',
        'LoadBalancerDescription$CanonicalHostedZoneName' => '<p> Provides the name of the Amazon Route 53 hosted zone that is associated with the load balancer. For information on how to associate your load balancer with a hosted zone, go to <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/using-domain-names-with-elb.html">Using Domain Names With Elastic Load Balancing</a> in the <i>Elastic Load Balancing Developer Guide</i>. </p>',
        'LoadBalancerDescription$CanonicalHostedZoneNameID' => '<p> Provides the ID of the Amazon Route 53 hosted zone name that is associated with the load balancer. For information on how to associate or disassociate your load balancer with a hosted zone, go to <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/using-domain-names-with-elb.html">Using Domain Names With Elastic Load Balancing</a> in the <i>Elastic Load Balancing Developer Guide</i>. </p>',
      ],
    ],
    'DefaultValue' => [
      'base' => NULL,
      'refs' => [
        'PolicyAttributeTypeDescription$DefaultValue' => '<p> The default value of the attribute, if applicable. </p>',
      ],
    ],
    'DeleteAccessPointInput' => [
      'base' => '<p> The input for the <a>DeleteLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'DeleteAccessPointOutput' => [
      'base' => '<p> The output for the <a>DeleteLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'DeleteLoadBalancerListenerInput' => [
      'base' => '<p> The input for the <a>DeleteLoadBalancerListeners</a> action. </p>',
      'refs' => [],
    ],
    'DeleteLoadBalancerListenerOutput' => [
      'base' => '<p> The output for the <a>DeleteLoadBalancerListeners</a> action. </p>',
      'refs' => [],
    ],
    'DeleteLoadBalancerPolicyInput' => [
      'base' => '<p> The input for the <a>DeleteLoadBalancerPolicy</a> action. </p>',
      'refs' => [],
    ],
    'DeleteLoadBalancerPolicyOutput' => [
      'base' => '<p> The output for the <a>DeleteLoadBalancerPolicy</a> action. </p>',
      'refs' => [],
    ],
    'DeregisterEndPointsInput' => [
      'base' => '<p> The input for the <a>DeregisterInstancesFromLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'DeregisterEndPointsOutput' => [
      'base' => '<p> The output for the <a>DeregisterInstancesFromLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'DescribeAccessPointsInput' => [
      'base' => '<p> The input for the <a>DescribeLoadBalancers</a> action. </p>',
      'refs' => [],
    ],
    'DescribeAccessPointsOutput' => [
      'base' => '<p> The output for the <a>DescribeLoadBalancers</a> action. </p>',
      'refs' => [],
    ],
    'DescribeEndPointStateInput' => [
      'base' => '<p> The input for the <a>DescribeEndPointState</a> action. </p>',
      'refs' => [],
    ],
    'DescribeEndPointStateOutput' => [
      'base' => '<p> The output for the <a>DescribeInstanceHealth</a> action. </p>',
      'refs' => [],
    ],
    'DescribeLoadBalancerAttributesInput' => [
      'base' => '<p>The input for the <a>DescribeLoadBalancerAttributes</a> action.</p>',
      'refs' => [],
    ],
    'DescribeLoadBalancerAttributesOutput' => [
      'base' => '<p>The following element is returned in a structure named <code>DescribeLoadBalancerAttributesResult</code>.</p>',
      'refs' => [],
    ],
    'DescribeLoadBalancerPoliciesInput' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeLoadBalancerPoliciesOutput' => [
      'base' => '<p>The output for the <a>DescribeLoadBalancerPolicies</a> action. </p>',
      'refs' => [],
    ],
    'DescribeLoadBalancerPolicyTypesInput' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DescribeLoadBalancerPolicyTypesOutput' => [
      'base' => '<p> The output for the <a>DescribeLoadBalancerPolicyTypes</a> action. </p>',
      'refs' => [],
    ],
    'DescribeTagsInput' => [
      'base' => '<p> The input for the <a>DescribeTags</a> action. </p>',
      'refs' => [],
    ],
    'DescribeTagsOutput' => [
      'base' => '<p> The output for the <a>DescribeTags</a> action. </p>',
      'refs' => [],
    ],
    'Description' => [
      'base' => NULL,
      'refs' => [
        'InstanceState$Description' => '<p> Provides a description of the instance state. </p>',
        'PolicyAttributeTypeDescription$Description' => '<p> A human-readable description of the attribute. </p>',
        'PolicyTypeDescription$Description' => '<p> A human-readable description of the policy type. </p>',
      ],
    ],
    'DetachLoadBalancerFromSubnetsInput' => [
      'base' => '<p> The input for the <a>DetachLoadBalancerFromSubnets</a> action. </p>',
      'refs' => [],
    ],
    'DetachLoadBalancerFromSubnetsOutput' => [
      'base' => '<p> The output for the <a>DetachLoadBalancerFromSubnets</a> action. </p>',
      'refs' => [],
    ],
    'DuplicateAccessPointNameException' => [
      'base' => '<p> The load balancer name already exists for this account. Please choose another name. </p>',
      'refs' => [],
    ],
    'DuplicateListenerException' => [
      'base' => '<p> A <code>Listener</code> already exists for the given <code>LoadBalancerName</code> and <code>LoadBalancerPort</code>, but with a different <code>InstancePort</code>, <code>Protocol</code>, or <code>SSLCertificateId</code>. </p>',
      'refs' => [],
    ],
    'DuplicatePolicyNameException' => [
      'base' => '<p> Policy with the same name exists for this load balancer. Please choose another name. </p>',
      'refs' => [],
    ],
    'DuplicateTagKeysException' => [
      'base' => '<p>The same tag key specified multiple times.</p>',
      'refs' => [],
    ],
    'EndPointPort' => [
      'base' => NULL,
      'refs' => [
        'SetLoadBalancerPoliciesForBackendServerInput$InstancePort' => '<p> The port number associated with the back-end server. </p>',
      ],
    ],
    'HealthCheck' => [
      'base' => '<p> The HealthCheck data type. </p>',
      'refs' => [
        'ConfigureHealthCheckInput$HealthCheck' => '<p> A structure containing the configuration information for the new healthcheck. </p>',
        'ConfigureHealthCheckOutput$HealthCheck' => '<p> The updated healthcheck for the instances. </p>',
        'LoadBalancerDescription$HealthCheck' => '<p> Specifies information regarding the various health probes conducted on the load balancer. </p>',
      ],
    ],
    'HealthCheckInterval' => [
      'base' => NULL,
      'refs' => [
        'HealthCheck$Interval' => '<p> Specifies the approximate interval, in seconds, between health checks of an individual instance. </p>',
      ],
    ],
    'HealthCheckTarget' => [
      'base' => NULL,
      'refs' => [
        'HealthCheck$Target' => '<p> Specifies the instance being checked. The protocol is either TCP, HTTP, HTTPS, or SSL. The range of valid ports is one (1] through 65535. </p> <note> <p> TCP is the default, specified as a TCP: port pair, for example "TCP:5000". In this case a healthcheck simply attempts to open a TCP connection to the instance on the specified port. Failure to connect within the configured timeout is considered unhealthy. </p> <p>SSL is also specified as SSL: port pair, for example, SSL:5000.</p> <p> For HTTP or HTTPS protocol, the situation is different. You have to include a ping path in the string. HTTP is specified as a HTTP:port;/;PathToPing; grouping, for example "HTTP:80/weather/us/wa/seattle". In this case, a HTTP GET request is issued to the instance on the given port and path. Any answer other than "200 OK" within the timeout period is considered unhealthy. </p> <p> The total length of the HTTP ping target needs to be 1024 16-bit Unicode characters or less. </p> </note>',
      ],
    ],
    'HealthCheckTimeout' => [
      'base' => NULL,
      'refs' => [
        'HealthCheck$Timeout' => '<p> Specifies the amount of time, in seconds, during which no response means a failed health probe. </p> <note> This value must be less than the <i>Interval</i> value. </note>',
      ],
    ],
    'HealthyThreshold' => [
      'base' => NULL,
      'refs' => [
        'HealthCheck$HealthyThreshold' => '<p> Specifies the number of consecutive health probe successes required before moving the instance to the <i>Healthy</i> state. </p>',
      ],
    ],
    'IdleTimeout' => [
      'base' => NULL,
      'refs' => [
        'ConnectionSettings$IdleTimeout' => '<p>Specifies the time (in seconds] the connection is allowed to be idle (no data has been sent over the connection] before it is closed by the load balancer.</p>',
      ],
    ],
    'Instance' => [
      'base' => '<p> The Instance data type. </p>',
      'refs' => [
        'Instances$member' => NULL,
      ],
    ],
    'InstanceId' => [
      'base' => NULL,
      'refs' => [
        'Instance$InstanceId' => '<p> Provides an EC2 instance ID. </p>',
        'InstanceState$InstanceId' => '<p> Provides an EC2 instance ID. </p>',
      ],
    ],
    'InstancePort' => [
      'base' => NULL,
      'refs' => [
        'BackendServerDescription$InstancePort' => '<p> Provides the port on which the back-end server is listening. </p>',
        'Listener$InstancePort' => '<p> Specifies the port on which the instance server is listening - 25, 80, 443, 465, 587, or 1024-65535. This property cannot be modified for the life of the load balancer. </p>',
      ],
    ],
    'InstanceState' => [
      'base' => '<p> The InstanceState data type. </p>',
      'refs' => [
        'InstanceStates$member' => NULL,
      ],
    ],
    'InstanceStates' => [
      'base' => NULL,
      'refs' => [
        'DescribeEndPointStateOutput$InstanceStates' => '<p> A list containing health information for the specified instances. </p>',
      ],
    ],
    'Instances' => [
      'base' => NULL,
      'refs' => [
        'DeregisterEndPointsInput$Instances' => '<p> A list of EC2 instance IDs consisting of all instances to be deregistered. </p>',
        'DeregisterEndPointsOutput$Instances' => '<p> An updated list of remaining instances registered with the load balancer. </p>',
        'DescribeEndPointStateInput$Instances' => '<p> A list of instance IDs whose states are being queried. </p>',
        'LoadBalancerDescription$Instances' => '<p> Provides a list of EC2 instance IDs for the load balancer. </p>',
        'RegisterEndPointsInput$Instances' => '<p> A list of instance IDs that should be registered with the load balancer.</p>',
        'RegisterEndPointsOutput$Instances' => '<p> An updated list of instances for the load balancer. </p>',
      ],
    ],
    'InvalidConfigurationRequestException' => [
      'base' => '<p> Requested configuration change is invalid. </p>',
      'refs' => [],
    ],
    'InvalidEndPointException' => [
      'base' => '<p> The specified EndPoint is not valid. </p>',
      'refs' => [],
    ],
    'InvalidSchemeException' => [
      'base' => '<p> Invalid value for scheme. Scheme can only be specified for load balancers in VPC. </p>',
      'refs' => [],
    ],
    'InvalidSecurityGroupException' => [
      'base' => '<p> One or more specified security groups do not exist. </p>',
      'refs' => [],
    ],
    'InvalidSubnetException' => [
      'base' => '<p> The VPC has no Internet gateway. </p>',
      'refs' => [],
    ],
    'LBCookieStickinessPolicies' => [
      'base' => NULL,
      'refs' => [
        'Policies$LBCookieStickinessPolicies' => '<p> A list of <a>LBCookieStickinessPolicy</a> objects created with <a>CreateAppCookieStickinessPolicy</a>. </p>',
      ],
    ],
    'LBCookieStickinessPolicy' => [
      'base' => '<p>The LBCookieStickinessPolicy data type. </p>',
      'refs' => [
        'LBCookieStickinessPolicies$member' => NULL,
      ],
    ],
    'Listener' => [
      'base' => '<p> The Listener data type. </p> <p>For information about the protocols and the ports supported by Elastic Load Balancing, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/elb-listener-config.html">Listener Configurations for Elastic Load Balancing</a>.</p>',
      'refs' => [
        'ListenerDescription$Listener' => NULL,
        'Listeners$member' => NULL,
      ],
    ],
    'ListenerDescription' => [
      'base' => '<p> The ListenerDescription data type. </p>',
      'refs' => [
        'ListenerDescriptions$member' => NULL,
      ],
    ],
    'ListenerDescriptions' => [
      'base' => NULL,
      'refs' => [
        'LoadBalancerDescription$ListenerDescriptions' => '<p> LoadBalancerPort, InstancePort, Protocol, InstanceProtocol, and PolicyNames are returned in a list of tuples in the ListenerDescriptions element. </p>',
      ],
    ],
    'ListenerNotFoundException' => [
      'base' => '<p> Load balancer does not have a listener configured at the given port. </p>',
      'refs' => [],
    ],
    'Listeners' => [
      'base' => NULL,
      'refs' => [
        'CreateAccessPointInput$Listeners' => '<p> A list of the following tuples: Protocol, LoadBalancerPort, InstanceProtocol, InstancePort, and SSLCertificateId. </p> <p>For information about the protocols and the ports supported by Elastic Load Balancing, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/elb-listener-config.html">Listener Configurations for Elastic Load Balancing</a>.</p>',
        'CreateLoadBalancerListenerInput$Listeners' => '<p> A list of <code>LoadBalancerPort</code>, <code>InstancePort</code>, <code>Protocol</code>, <code>InstanceProtocol</code>, and <code>SSLCertificateId</code> items. </p>',
      ],
    ],
    'LoadBalancerAttributeNotFoundException' => [
      'base' => '<p>The specified load balancer attribute could not be found.</p>',
      'refs' => [],
    ],
    'LoadBalancerAttributes' => [
      'base' => '<p>The <code>LoadBalancerAttributes</code> data type.</p>',
      'refs' => [
        'DescribeLoadBalancerAttributesOutput$LoadBalancerAttributes' => '<p>The load balancer attributes structure.</p>',
        'ModifyLoadBalancerAttributesInput$LoadBalancerAttributes' => '<p>Attributes of the load balancer.</p>',
        'ModifyLoadBalancerAttributesOutput$LoadBalancerAttributes' => NULL,
      ],
    ],
    'LoadBalancerDescription' => [
      'base' => '<p> Contains the result of a successful invocation of <a>DescribeLoadBalancers</a>. </p>',
      'refs' => [
        'LoadBalancerDescriptions$member' => NULL,
      ],
    ],
    'LoadBalancerDescriptions' => [
      'base' => NULL,
      'refs' => [
        'DescribeAccessPointsOutput$LoadBalancerDescriptions' => '<p> A list of load balancer description structures. </p>',
      ],
    ],
    'LoadBalancerNames' => [
      'base' => NULL,
      'refs' => [
        'AddTagsInput$LoadBalancerNames' => '<p>The name of the load balancer to tag. You can specify a maximum of one load balancer name.</p>',
        'DescribeAccessPointsInput$LoadBalancerNames' => '<p> A list of load balancer names associated with the account. </p>',
        'RemoveTagsInput$LoadBalancerNames' => '<p>The name of the load balancer. You can specify a maximum of one load balancer name.</p>',
      ],
    ],
    'LoadBalancerNamesMax20' => [
      'base' => NULL,
      'refs' => [
        'DescribeTagsInput$LoadBalancerNames' => '<p> The names of the load balancers. </p>',
      ],
    ],
    'LoadBalancerScheme' => [
      'base' => NULL,
      'refs' => [
        'CreateAccessPointInput$Scheme' => '<p>The type of a load balancer. </p> <p>By default, Elastic Load Balancing creates an Internet-facing load balancer with a publicly resolvable DNS name, which resolves to public IP addresses. For more information about Internet-facing and Internal load balancers, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/vpc-loadbalancer-types.html">Internet-facing and Internal Load Balancers</a>.</p> <p>Specify the value <code>internal</code> for this option to create an internal load balancer with a DNS name that resolves to private IP addresses.</p> <note> <p>This option is only available for load balancers created within EC2-VPC.</p> </note>',
        'LoadBalancerDescription$Scheme' => '<p>Specifies the type of load balancer.</p> <p>If the <code>Scheme</code> is <code>internet-facing</code>, the load balancer has a publicly resolvable DNS name that resolves to public IP addresses.</p> <p>If the <code>Scheme</code> is <code>internal</code>, the load balancer has a publicly resolvable DNS name that resolves to private IP addresses.</p> <p> This option is only available for load balancers attached to an Amazon VPC. </p>',
      ],
    ],
    'Marker' => [
      'base' => NULL,
      'refs' => [
        'DescribeAccessPointsInput$Marker' => '<p> An optional parameter used for pagination of results from this call. If specified, the response includes only records beyond the marker. </p>',
        'DescribeAccessPointsOutput$NextMarker' => '<p> Specifies the value of next marker if the request returned more than one page of results. </p>',
      ],
    ],
    'ModifyLoadBalancerAttributesInput' => [
      'base' => '<p>The input for the <a>ModifyLoadBalancerAttributes</a> action.</p>',
      'refs' => [],
    ],
    'ModifyLoadBalancerAttributesOutput' => [
      'base' => '<p>The output for the <a>ModifyLoadBalancerAttributes</a> action.</p>',
      'refs' => [],
    ],
    'PageSize' => [
      'base' => NULL,
      'refs' => [
        'DescribeAccessPointsInput$PageSize' => '<p> The number of results returned in each page. The default is 400. You cannot specify a page size greater than 400 or less than 1. </p>',
      ],
    ],
    'Policies' => [
      'base' => '<p> The policies data type. </p>',
      'refs' => [
        'LoadBalancerDescription$Policies' => '<p> Provides a list of policies defined for the load balancer. </p>',
      ],
    ],
    'PolicyAttribute' => [
      'base' => '<p> The <a>PolicyAttribute</a> data type. This data type contains a key/value pair that defines properties of a specific policy. </p>',
      'refs' => [
        'PolicyAttributes$member' => NULL,
      ],
    ],
    'PolicyAttributeDescription' => [
      'base' => '<p> The <code>PolicyAttributeDescription</code> data type. This data type is used to describe the attributes and values associated with a policy. </p>',
      'refs' => [
        'PolicyAttributeDescriptions$member' => NULL,
      ],
    ],
    'PolicyAttributeDescriptions' => [
      'base' => NULL,
      'refs' => [
        'PolicyDescription$PolicyAttributeDescriptions' => '<p> A list of policy attribute description structures. </p>',
      ],
    ],
    'PolicyAttributeTypeDescription' => [
      'base' => '<p> The <code>PolicyAttributeTypeDescription</code> data type. This data type is used to describe values that are acceptable for the policy attribute. </p>',
      'refs' => [
        'PolicyAttributeTypeDescriptions$member' => NULL,
      ],
    ],
    'PolicyAttributeTypeDescriptions' => [
      'base' => NULL,
      'refs' => [
        'PolicyTypeDescription$PolicyAttributeTypeDescriptions' => '<p> The description of the policy attributes associated with the load balancer policies defined by the Elastic Load Balancing service. </p>',
      ],
    ],
    'PolicyAttributes' => [
      'base' => NULL,
      'refs' => [
        'CreateLoadBalancerPolicyInput$PolicyAttributes' => '<p> A list of attributes associated with the policy being created. </p>',
      ],
    ],
    'PolicyDescription' => [
      'base' => '<p> The <code>PolicyDescription</code> data type. </p>',
      'refs' => [
        'PolicyDescriptions$member' => NULL,
      ],
    ],
    'PolicyDescriptions' => [
      'base' => NULL,
      'refs' => [
        'DescribeLoadBalancerPoliciesOutput$PolicyDescriptions' => '<p> A list of policy description structures. </p>',
      ],
    ],
    'PolicyName' => [
      'base' => NULL,
      'refs' => [
        'AppCookieStickinessPolicy$PolicyName' => '<p>The mnemonic name for the policy being created. The name must be unique within a set of policies for this load balancer. </p>',
        'CreateAppCookieStickinessPolicyInput$PolicyName' => '<p> The name of the policy being created. The name must be unique within the set of policies for this load balancer. </p>',
        'CreateLBCookieStickinessPolicyInput$PolicyName' => '<p> The name of the policy being created. The name must be unique within the set of policies for this load balancer. </p>',
        'CreateLoadBalancerPolicyInput$PolicyName' => '<p> The name of the load balancer policy being created. The name must be unique within the set of policies for this load balancer. </p>',
        'DeleteLoadBalancerPolicyInput$PolicyName' => '<p> The mnemonic name for the policy being deleted. </p>',
        'LBCookieStickinessPolicy$PolicyName' => '<p>The name for the policy being created. The name must be unique within the set of policies for this load balancer. </p>',
        'PolicyDescription$PolicyName' => '<p> The name of the policy associated with the load balancer. </p>',
        'PolicyNames$member' => NULL,
      ],
    ],
    'PolicyNames' => [
      'base' => NULL,
      'refs' => [
        'BackendServerDescription$PolicyNames' => '<p> Provides a list of policy names enabled for the back-end server. </p>',
        'DescribeLoadBalancerPoliciesInput$PolicyNames' => '<p> The names of load balancer policies you\'ve created or Elastic Load Balancing sample policy names. </p>',
        'ListenerDescription$PolicyNames' => '<p> A list of policies enabled for this listener. An empty list indicates that no policies are enabled. </p>',
        'Policies$OtherPolicies' => '<p> A list of policy names other than the stickiness policies. </p>',
        'SetLoadBalancerPoliciesForBackendServerInput$PolicyNames' => '<p> List of policy names to be set. If the list is empty, then all current polices are removed from the back-end server. </p>',
        'SetLoadBalancerPoliciesOfListenerInput$PolicyNames' => '<p> List of policies to be associated with the listener. If the list is empty, the current policy is removed from the listener. </p>',
      ],
    ],
    'PolicyNotFoundException' => [
      'base' => '<p> One or more specified policies were not found. </p>',
      'refs' => [],
    ],
    'PolicyTypeDescription' => [
      'base' => '<p> The <a>PolicyTypeDescription</a> data type. </p>',
      'refs' => [
        'PolicyTypeDescriptions$member' => NULL,
      ],
    ],
    'PolicyTypeDescriptions' => [
      'base' => NULL,
      'refs' => [
        'DescribeLoadBalancerPolicyTypesOutput$PolicyTypeDescriptions' => '<p> List of policy type description structures of the specified policy type. If no policy type names are specified, returns the description of all the policy types defined by Elastic Load Balancing service. </p>',
      ],
    ],
    'PolicyTypeName' => [
      'base' => NULL,
      'refs' => [
        'CreateLoadBalancerPolicyInput$PolicyTypeName' => '<p> The name of the base policy type being used to create this policy. To get the list of policy types, use the <a>DescribeLoadBalancerPolicyTypes</a> action. </p>',
        'PolicyDescription$PolicyTypeName' => '<p> The name of the policy type associated with the load balancer. </p>',
        'PolicyTypeDescription$PolicyTypeName' => '<p> The name of the policy type. </p>',
        'PolicyTypeNames$member' => NULL,
      ],
    ],
    'PolicyTypeNames' => [
      'base' => NULL,
      'refs' => [
        'DescribeLoadBalancerPolicyTypesInput$PolicyTypeNames' => '<p> Specifies the name of the policy types. If no names are specified, returns the description of all the policy types defined by Elastic Load Balancing service. </p>',
      ],
    ],
    'PolicyTypeNotFoundException' => [
      'base' => '<p> One or more of the specified policy types do not exist. </p>',
      'refs' => [],
    ],
    'Ports' => [
      'base' => NULL,
      'refs' => [
        'DeleteLoadBalancerListenerInput$LoadBalancerPorts' => '<p> The client port number(s] of the load balancer listener(s] to be removed. </p>',
      ],
    ],
    'Protocol' => [
      'base' => NULL,
      'refs' => [
        'Listener$Protocol' => '<p> Specifies the load balancer transport protocol to use for routing - HTTP, HTTPS, TCP or SSL. This property cannot be modified for the life of the load balancer. </p>',
        'Listener$InstanceProtocol' => '<p> Specifies the protocol to use for routing traffic to back-end instances - HTTP, HTTPS, TCP, or SSL. This property cannot be modified for the life of the load balancer. </p> <note> If the front-end protocol is HTTP or HTTPS, <code>InstanceProtocol</code> has to be at the same protocol layer, i.e., HTTP or HTTPS. Likewise, if the front-end protocol is TCP or SSL, InstanceProtocol has to be TCP or SSL. </note> <note> If there is another listener with the same <code>InstancePort</code> whose <code>InstanceProtocol</code> is secure, i.e., HTTPS or SSL, the listener\'s <code>InstanceProtocol</code> has to be secure, i.e., HTTPS or SSL. If there is another listener with the same <code>InstancePort</code> whose <code>InstanceProtocol</code> is HTTP or TCP, the listener\'s <code>InstanceProtocol</code> must be either HTTP or TCP. </note>',
      ],
    ],
    'ReasonCode' => [
      'base' => NULL,
      'refs' => [
        'InstanceState$ReasonCode' => '<p> Provides information about the cause of <i>OutOfService</i> instances. Specifically, it indicates whether the cause is Elastic Load Balancing or the instance behind the load balancer. </p> <p>Valid value: <code>ELB</code>|<code>Instance</code>|<code>N/A</code></p>',
      ],
    ],
    'RegisterEndPointsInput' => [
      'base' => '<p> The input for the <a>RegisterInstancesWithLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'RegisterEndPointsOutput' => [
      'base' => '<p> The output for the <a>RegisterInstancesWithLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'RemoveAvailabilityZonesInput' => [
      'base' => '<p> The input for the <a>DisableAvailabilityZonesForLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'RemoveAvailabilityZonesOutput' => [
      'base' => '<p> The output for the <a>DisableAvailabilityZonesForLoadBalancer</a> action. </p>',
      'refs' => [],
    ],
    'RemoveTagsInput' => [
      'base' => '<p> The input for the <a>RemoveTags</a> action. </p>',
      'refs' => [],
    ],
    'RemoveTagsOutput' => [
      'base' => '<p> The output for the <a>RemoveTags</a> action. </p>',
      'refs' => [],
    ],
    'S3BucketName' => [
      'base' => NULL,
      'refs' => [
        'AccessLog$S3BucketName' => '<p>The name of the Amazon S3 bucket where the access logs are stored.</p>',
      ],
    ],
    'SSLCertificateId' => [
      'base' => NULL,
      'refs' => [
        'Listener$SSLCertificateId' => '<p> The ARN string of the server certificate. To get the ARN of the server certificate, call the AWS Identity and Access Management <a href="http://docs.aws.amazon.com/IAM/latest/APIReference/index.html?API_UploadServerCertificate.html">UploadServerCertificate </a> API. </p>',
        'SetLoadBalancerListenerSSLCertificateInput$SSLCertificateId' => '<p> The Amazon Resource Number (ARN] of the SSL certificate chain to use. For more information on SSL certificates, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/ManagingServerCerts.html"> Managing Server Certificates</a> in the <i>AWS Identity and Access Management User Guide</i>.</p>',
      ],
    ],
    'SecurityGroupId' => [
      'base' => NULL,
      'refs' => [
        'SecurityGroups$member' => NULL,
      ],
    ],
    'SecurityGroupName' => [
      'base' => NULL,
      'refs' => [
        'SourceSecurityGroup$GroupName' => '<p> Name of the source security group. Use this value for the <code>--source-group</code> parameter of the <code>ec2-authorize</code> command in the Amazon EC2 command line tool. </p>',
      ],
    ],
    'SecurityGroupOwnerAlias' => [
      'base' => NULL,
      'refs' => [
        'SourceSecurityGroup$OwnerAlias' => '<p> Owner of the source security group. Use this value for the <code>--source-group-user</code> parameter of the <code>ec2-authorize</code> command in the Amazon EC2 command line tool. </p>',
      ],
    ],
    'SecurityGroups' => [
      'base' => NULL,
      'refs' => [
        'ApplySecurityGroupsToLoadBalancerInput$SecurityGroups' => '<p> A list of security group IDs to associate with your load balancer in VPC. The security group IDs must be provided as the ID and not the security group name (For example, sg-1234]. </p>',
        'ApplySecurityGroupsToLoadBalancerOutput$SecurityGroups' => '<p> A list of security group IDs associated with your load balancer. </p>',
        'CreateAccessPointInput$SecurityGroups' => '<p> The security groups to assign to your load balancer within your VPC. </p>',
        'LoadBalancerDescription$SecurityGroups' => '<p> The security groups the load balancer is a member of (VPC only]. </p>',
      ],
    ],
    'SetLoadBalancerListenerSSLCertificateInput' => [
      'base' => '<p> The input for the <a>SetLoadBalancerListenerSSLCertificate</a> action. </p>',
      'refs' => [],
    ],
    'SetLoadBalancerListenerSSLCertificateOutput' => [
      'base' => '<p> The output for the <a>SetLoadBalancerListenerSSLCertificate</a> action. </p>',
      'refs' => [],
    ],
    'SetLoadBalancerPoliciesForBackendServerInput' => [
      'base' => '<p>The input for the <a>SetLoadBalancerPoliciesForBackendServer</a> action.</p>',
      'refs' => [],
    ],
    'SetLoadBalancerPoliciesForBackendServerOutput' => [
      'base' => '<p> The output for the <a>SetLoadBalancerPoliciesForBackendServer</a> action. </p>',
      'refs' => [],
    ],
    'SetLoadBalancerPoliciesOfListenerInput' => [
      'base' => '<p> The input for the <a>SetLoadBalancerPoliciesOfListener</a> action. </p>',
      'refs' => [],
    ],
    'SetLoadBalancerPoliciesOfListenerOutput' => [
      'base' => '<p> The output for the <a>SetLoadBalancerPoliciesOfListener</a> action. </p>',
      'refs' => [],
    ],
    'SourceSecurityGroup' => [
      'base' => '<p> This data type is used as a response element in the <a>DescribeLoadBalancers</a> action. For information about Elastic Load Balancing security groups, go to <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/elb-security-features.html#using-elb-security-groups">Using Security Groups With Elastic Load Balancing</a> in the <i>Elastic Load Balancing Developer Guide</i>. </p>',
      'refs' => [
        'LoadBalancerDescription$SourceSecurityGroup' => '<p> The security group that you can use as part of your inbound rules for your load balancer\'s back-end Amazon EC2 application instances. To only allow traffic from load balancers, add a security group rule to your back end instance that specifies this source security group as the inbound source. </p>',
      ],
    ],
    'State' => [
      'base' => NULL,
      'refs' => [
        'InstanceState$State' => '<p>Specifies the current state of the instance.</p> <p>Valid value: <code>InService</code>|<code>OutOfService</code>|<code>Unknown</code></p>',
      ],
    ],
    'StringVal' => [
      'base' => NULL,
      'refs' => [
        'AdditionalAttribute$Key' => '<p>Reserved for future use.</p>',
        'AdditionalAttribute$Value' => '<p>Reserved for future use.</p>',
      ],
    ],
    'SubnetId' => [
      'base' => NULL,
      'refs' => [
        'Subnets$member' => NULL,
      ],
    ],
    'SubnetNotFoundException' => [
      'base' => '<p> One or more subnets were not found. </p>',
      'refs' => [],
    ],
    'Subnets' => [
      'base' => NULL,
      'refs' => [
        'AttachLoadBalancerToSubnetsInput$Subnets' => '<p> A list of subnet IDs to add for the load balancer. You can add only one subnet per Availability Zone. </p>',
        'AttachLoadBalancerToSubnetsOutput$Subnets' => '<p> A list of subnet IDs attached to the load balancer. </p>',
        'CreateAccessPointInput$Subnets' => '<p> A list of subnet IDs in your VPC to attach to your load balancer. Specify one subnet per Availability Zone. </p>',
        'DetachLoadBalancerFromSubnetsInput$Subnets' => '<p> A list of subnet IDs to remove from the set of configured subnets for the load balancer. </p>',
        'DetachLoadBalancerFromSubnetsOutput$Subnets' => '<p> A list of subnet IDs the load balancer is now attached to. </p>',
        'LoadBalancerDescription$Subnets' => '<p> Provides a list of VPC subnet IDs for the load balancer. </p>',
      ],
    ],
    'Tag' => [
      'base' => '<p>Metadata assigned to a load balancer consisting of key-value pair.</p> <p>For more information, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/TerminologyandKeyConcepts.html#tagging-elb">Tagging</a> in the <i>Elastic Load Balancing Developer Guide</i>.</p>',
      'refs' => [
        'TagList$member' => NULL,
      ],
    ],
    'TagDescription' => [
      'base' => '<p>The descriptions of all the tags associated with load balancer.</p>',
      'refs' => [
        'TagDescriptions$member' => NULL,
      ],
    ],
    'TagDescriptions' => [
      'base' => NULL,
      'refs' => [
        'DescribeTagsOutput$TagDescriptions' => '<p> A list of tag description structures. </p>',
      ],
    ],
    'TagKey' => [
      'base' => NULL,
      'refs' => [
        'Tag$Key' => '<p>The key of the tag.</p>',
        'TagKeyOnly$Key' => '<p>The name of the key.</p>',
      ],
    ],
    'TagKeyList' => [
      'base' => NULL,
      'refs' => [
        'RemoveTagsInput$Tags' => '<p>A list of tag keys to remove.</p>',
      ],
    ],
    'TagKeyOnly' => [
      'base' => '<p>The key of a tag to be removed.</p>',
      'refs' => [
        'TagKeyList$member' => NULL,
      ],
    ],
    'TagList' => [
      'base' => NULL,
      'refs' => [
        'AddTagsInput$Tags' => '<p>A list of tags for each load balancer.</p>',
        'CreateAccessPointInput$Tags' => '<p>A list of tags to assign to the load balancer.</p> <p>For more information about setting tags for your load balancer, see <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/TerminologyandKeyConcepts.html#tagging-elb">Tagging</a>.</p>',
        'TagDescription$Tags' => '<p>List of tags associated with the load balancer.</p>',
      ],
    ],
    'TagValue' => [
      'base' => NULL,
      'refs' => [
        'Tag$Value' => '<p>The value of the tag.</p>',
      ],
    ],
    'TooManyAccessPointsException' => [
      'base' => '<p> The quota for the number of load balancers has already been reached. </p>',
      'refs' => [],
    ],
    'TooManyPoliciesException' => [
      'base' => '<p> Quota for number of policies for this load balancer has already been reached. </p>',
      'refs' => [],
    ],
    'TooManyTagsException' => [
      'base' => '<p>The quota for the number of tags that can be assigned to a load balancer has been reached.</p>',
      'refs' => [],
    ],
    'UnhealthyThreshold' => [
      'base' => NULL,
      'refs' => [
        'HealthCheck$UnhealthyThreshold' => '<p> Specifies the number of consecutive health probe failures required before moving the instance to the <i>Unhealthy</i> state. </p>',
      ],
    ],
    'VPCId' => [
      'base' => NULL,
      'refs' => [
        'LoadBalancerDescription$VPCId' => '<p> Provides the ID of the VPC attached to the load balancer. </p>',
      ],
    ],
  ],
];
