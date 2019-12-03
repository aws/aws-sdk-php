# CHANGELOG

## 3.126.0 - 2019-12-03

* `Aws\AugmentedAIRuntime` - This release adds support for Amazon Augmented AI, which makes it easy to build workflows for human review of machine learning predictions.
* `Aws\CodeGuruProfiler` - (New Service) Amazon CodeGuru Profiler analyzes application CPU utilization and latency characteristics to show you where you are spending the most cycles in your application. This analysis is presented in an interactive flame graph that helps you easily understand which paths consume the most resources, verify that your application is performing as expected, and uncover areas that can be optimized further.
* `Aws\CodeGuruReviewer` - This is the preview release of Amazon CodeGuru Reviewer.
* `Aws\ComputeOptimizer` - Initial release of AWS Compute Optimizer. AWS Compute Optimizer recommends optimal AWS Compute resources to reduce costs and improve performance for your workloads.
* `Aws\EC2` - This release adds support for the following features: 1. An option to enable acceleration for Site-to-Site VPN connections, to improve connection performance by leveraging AWS Global Accelerator; 2. Inf1 instances featuring up to 16 AWS Inferentia chips, custom-built for ML inference applications to deliver low latency and high throughput performance. Use Inf1 instances to run high scale ML inference applications such as image recognition, speech recognition, natural language processing, personalization, and fraud detection at the lowest cost in the cloud. Inf1 instances will soon be available for use with Amazon SageMaker, Amazon EKS and Amazon ECS. To get started, see https://aws.amazon.com/ec2/instance-types/Inf1; 3. The ability to associate route tables with internet gateways and virtual private gateways, and define routes to insert network and security virtual appliances in the path of inbound and outbound traffic. For more information on Amazon VPC Ingress Routing, see https://docs.aws.amazon.com/vpc/latest/userguide/VPC_Route_Tables.html#gateway-route-table; 4. AWS Local Zones that place compute, storage, database, and other select services closer to you for applications that require very low latency to your end-users. AWS Local Zones also allow you to seamlessly connect to the full range of services in the AWS Region through the same APIs and tool sets; 5. Launching and viewing EC2 instances and EBS volumes running locally in Outposts. This release also introduces a new local gateway (LGW) with Outposts to enable connectivity between Outposts and local on-premises networks as well as the internet; 6. Peering Transit Gateways between regions simplifying creation of secure and private global networks on AWS; 7. Transit Gateway Multicast, enabling multicast routing within and between VPCs using Transit Gateway as a multicast router.
* `Aws\ECS` - This release supports ECS Capacity Providers, Fargate Spot, and ECS Cluster Auto Scaling. These features enable new ways for ECS to manage compute capacity used by tasks.
* `Aws\EKS` - Introducing Amazon EKS with Fargate. Customers can now use Amazon EKS to launch pods directly onto AWS Fargate, the serverless compute engine built for containers on AWS. 
* `Aws\ElasticsearchService` - UltraWarm storage provides a cost-effective way to store large amounts of read-only data on Amazon Elasticsearch Service. Rather than attached storage, UltraWarm nodes use Amazon S3 and a sophisticated caching solution to improve performance. For indices that you are not actively writing to and query less frequently, UltraWarm storage offers significantly lower costs per GiB. In Elasticsearch, these warm indices behave just like any other index. You can query them using the same APIs or use them to create dashboards in Kibana.
* `Aws\FraudDetector` - Amazon Fraud Detector is a fully managed service that makes it easy to identify potentially fraudulent online activities such as online payment fraud and the creation of fake accounts. Amazon Fraud Detector uses your data, machine learning (ML), and more than 20 years of fraud detection expertise from Amazon to automatically identify potentially fraudulent online activity so you can catch more fraud faster.
* `Aws\NetworkManager` - This is the initial SDK release for AWS Network Manager.
* `Aws\Outposts` - This is the initial release for AWS Outposts, a fully managed service that extends AWS infrastructure, services, APIs, and tools to customer sites. AWS Outposts enables you to launch and run EC2 instances and EBS volumes locally at your on-premises location. This release introduces new APIs for creating and viewing Outposts. 
* `Aws\S3` - Amazon S3 Access Points is a new S3 feature that simplifies managing data access at scale for shared data sets on Amazon S3. Access Points provide a customizable way to access the objects in a bucket, with a unique hostname and access policy that enforces the specific permissions and network controls for any request made through the access point. This represents a new way of provisioning access to shared data sets.
* `Aws\S3Control` - Amazon S3 Access Points is a new S3 feature that simplifies managing data access at scale for shared data sets on Amazon S3. Access Points provide a customizable way to access the objects in a bucket, with a unique hostname and access policy that enforces the specific permissions and network controls for any request made through the access point. This represents a new way of provisioning access to shared data sets.
* `Aws\Textract` - This SDK Release introduces Amazon Augmented AI support for Amazon Textract AnalyzeDocument API. Image byte payloads for synchronous operations have increased from 5 MB to 10 MB.
* `Aws\kendra` - It is a preview launch of Amazon Kendra. Amazon Kendra is a managed, highly accurate and easy to use enterprise search service that is powered by machine learning.

## 3.125.0 - 2019-12-02

* `Aws\AccessAnalyzer` - Introducing AWS IAM Access Analyzer, an IAM feature that makes it easy for AWS customers to ensure that their resource-based policies provide only the intended access to resources outside their AWS accounts.

## 3.124.0 - 2019-12-02

* `Aws\EC2` - AWS now provides a new BYOL experience for software licenses, such as Windows and SQL Server, that require a dedicated physical server. You can now enjoy the flexibility and cost effectiveness of using your own licenses on Amazon EC2 Dedicated Hosts, but with the simplicity, resiliency, and elasticity of AWS. You can specify your Dedicated Host management preferences, such as host allocation, host capacity utilization, and instance placement in AWS License Manager. Once set up, AWS takes care of these administrative tasks on your behalf, so that you can seamlessly launch virtual machines (instances) on Dedicated Hosts just like you would launch an EC2 instance with AWS provided licenses.
* `Aws\LicenseManager` - AWS License Manager now automates discovery of bring-your-own-license usage across the customers organization. With few simple settings, customers can add bring your own license product information along with licensing rules, which would enable License Manager to automatically track the instances that have the specified products installed. If License Manager detects any violation of licensing rules, it would notify the customers designated license administrator to take corrective action.
* `Aws\Schemas` - This release introduces support for Amazon EventBridge schema registry, making it easy to discover and write code for events in EventBridge.
* `Aws\imagebuilder` - This is the first release of EC2 Image Builder, a service that provides a managed experience for automating the creation of EC2 AMIs.

## 3.123.0 - 2019-11-26

* `Aws\CognitoIdentityProvider` - This release adds a new setting for a user pool to configure which recovery methods a user can use to recover their account via the forgot password operation.
* `Aws\DirectoryService` - This release will introduce optional encryption over LDAP network traffic using SSL certificates between customer's self-managed AD and AWS Directory Services instances. The release also provides APIs for Certificate management.
* `Aws\DynamoDB` - 1) Amazon Contributor Insights for Amazon DynamoDB is a diagnostic tool for identifying frequently accessed keys and understanding database traffic trends. 2) Support for displaying new fields when a table's encryption state is Inaccessible or the table have been Archived.
* `Aws\ElasticInference` - Amazon Elastic Inference allows customers to attach Elastic Inference Accelerators to Amazon EC2 and Amazon ECS tasks, thus providing low-cost GPU-powered acceleration and reducing the cost of running deep learning inference. This release allows customers to add or remove tags for their Elastic Inference Accelerators.
* `Aws\MediaTailor` - AWS Elemental MediaTailor SDK now allows configuration of the Live Pre-Roll feature for HLS and DASH streams.
* `Aws\Organizations` - Introduces the DescribeEffectivePolicy action, which returns the contents of the policy that's in effect for the account.
* `Aws\QuickSight` - Documentation updates for QuickSight
* `Aws\RDSDataService` - Type hints to improve handling of some specific parameter types (date/time, decimal etc) for ExecuteStatement and BatchExecuteStatement APIs
* `Aws\ResourceGroupsTaggingAPI` - You can use tag policies to help standardize on tags across your organization's resources.
* `Aws\ServerlessApplicationRepository` - AWS Serverless Application Repository now supports verified authors. Verified means that AWS has made a good faith review, as a reasonable and prudent service provider, of the information provided by the requester and has confirmed that the requester's identity is as claimed.
* `Aws\WorkSpaces` - For the WorkspaceBundle API, added the image identifier and the time of the last update.

## 3.122.0 - 2019-11-25

* `Aws\AlexaForBusiness` - API update for Alexa for Business: This update enables the use of meeting room configuration that can be applied to a room profile. These settings help improve and measure utilization on Alexa for Business enabled rooms. New features include end meeting reminders, intelligent room release and room utilization analytics report.
* `Aws\AppConfig` - Introducing AWS AppConfig, a new service that enables customers to quickly deploy validated configurations to applications of any size in a controlled and monitored fashion.
* `Aws\ApplicationAutoScaling` - This release supports auto scaling of document classifier endpoints for Comprehend; and supports target tracking based on the average capacity utilization metric for AppStream 2.0 fleets. 
* `Aws\ApplicationInsights` - CloudWatch Application Insights for .NET and SQL Server includes the follwing features: -Tagging Create and manage tags for your applications.-Custom log pattern matching. Define custom log patterns to be detected and monitored.-Resource-level permissions. Specify applications users can access.
* `Aws\Athena` - This release adds additional query lifecycle metrics to the QueryExecutionStatistics object in GetQueryExecution response.
* `Aws\CloudWatch` - This release adds a new feature called "Contributor Insights". "Contributor Insights" supports the following 6 new APIs (PutInsightRule, DeleteInsightRules, EnableInsightRules, DisableInsightRules, DescribeInsightRules and GetInsightRuleReport). 
* `Aws\CodeBuild` - CodeBuild adds support for test reporting
* `Aws\CognitoIdentityProvider` - Amazon Cognito Userpools now supports Sign in with Apple as an Identity Provider.
* `Aws\Comprehend` - Amazon Comprehend now supports real-time analysis with Custom Classification
* `Aws\CostExplorer` - This launch provides customers with access to Cost Category Public Beta APIs.
* `Aws\DLM` - You can now set time based retention policies on Data Lifecycle Manager. With this launch, DLM allows you to set snapshot retention period in the following interval units: days, weeks, months and years.
* `Aws\EC2` - This release adds two new APIs: 1. ModifyDefaultCreditSpecification, which allows you to set default credit specification at the account level per AWS Region, per burstable performance instance family, so that all new burstable performance instances in the account launch using the new default credit specification. 2. GetDefaultCreditSpecification, which allows you to get current default credit specification per AWS Region, per burstable performance instance family. This release also adds new client exceptions for StartInstances and StopInstances.
* `Aws\ElasticLoadBalancingv2` - This release of Elastic Load Balancing V2 adds new subnet features for Network Load Balancers and a new routing algorithm for Application Load Balancers. 
* `Aws\Greengrass` - IoT Greengrass supports machine learning resources in 'No container' mode.
* `Aws\IoT` - This release adds: 1) APIs for fleet provisioning claim and template, 2) endpoint configuration and custom domains, 3) support for enhanced custom authentication, d) support for 4 additional audit checks: Device and CA certificate key quality checks, IoT role alias over-permissive check and IoT role alias access to unused services check, 5) extended capability of AWS IoT Rules Engine to support IoT SiteWise rule action. The IoT SiteWise rule action lets you send messages from IoT sensors and applications to IoT SiteWise asset properties
* `Aws\IoTSecureTunneling` - This release adds support for IoT Secure Tunneling to remote access devices behind restricted firewalls.
* `Aws\KMS` - AWS Key Management Service (KMS) now enables creation and use of asymmetric Customer Master Keys (CMKs) and the generation of asymmetric data key pairs.
* `Aws\KinesisAnalyticsV2` - Kinesis Data Analytics service adds support to configure Java applications to access resources in a VPC. Also releasing support to configure Java applications to set allowNonRestoreState flag through the service APIs.
* `Aws\Lambda` - Added the function state and update status to the output of GetFunctionConfiguration and other actions. Check the state information to ensure that a function is ready before you perform operations on it. Functions take time to become ready when you connect them to a VPC.Added the EventInvokeConfig type and operations to configure error handling options for asynchronous invocation. Use PutFunctionEventInvokeConfig to configure the number of retries and the maximum age of events when you invoke the function asynchronously.Added on-failure and on-success destination settings for asynchronous invocation. Configure destinations to send an invocation record to an SNS topic, an SQS queue, an EventBridge event bus, or a Lambda function.Added error handling options to event source mappings. This enables you to configure the number of retries, configure the maximum age of records, or retry with smaller batches when an error occurs when a function processes a Kinesis or DynamoDB stream.Added the on-failure destination setting to event source mappings. This enables you to send discarded events to an SNS topic or SQS queue when all retries fail or when the maximum record age is exceeded when a function processes a Kinesis or DynamoDB stream.Added the ParallelizationFactor option to event source mappings to increase concurrency per shard when a function processes a Kinesis or DynamoDB stream.
* `Aws\LexRuntimeService` - Amazon Lex adds "sessionId" attribute to the PostText and PostContent response.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for 8K outputs and support for QuickTime Animation Codec (RLE) inputs.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports the ability to create a multiple program transport stream (MPTS).
* `Aws\MediaPackageVod` - Adds a domain name to PackagingGroups, representing the fully qualified domain name for Assets created in the group.
* `Aws\RAM` - AWS RAM provides new APIs to view the permissions granted to principals in a resource share. This release also creates corresponding resource shares for supported services that use resource policies, as well as an API to promote them to standard shares that can be managed in RAM.
* `Aws\RDS` - Cluster Endpoints can now be tagged by using --tags in the create-db-cluster-endpoint API
* `Aws\Redshift` - This release contains changes for 1. Redshift Scheduler 2. Update to the DescribeNodeConfigurationOptions to include a new action type recommend-node-config
* `Aws\SSM` - AWS Systems Manager Documents now supports more Document Types: ApplicationConfiguration, ApplicationConfigurationSchema and DeploymentStrategy. This release also extends Document Permissions capabilities and introduces a new Force flag for DeleteDocument API.
* `Aws\SesV2` - This release includes support for automatically suppressing email addresses that result in hard bounce or complaint events at the account level, and for managing addresses on this account-level suppression list.
* `Aws\WAFV2` - This release introduces new set of APIs ("wafv2") for AWS WAF. Major changes include single set of APIs for creating/updating resources in global and regional scope, and rules are configured directly into web ACL instead of being referenced. The previous APIs ("waf" and "waf-regional") are now referred as AWS WAF Classic. For more information visit: https://docs.aws.amazon.com/waf/latest/APIReference/Welcome.html

## 3.121.1 - 2019-11-22

* `Aws\ACM` - This release adds support for Tag-Based IAM for AWS Certificate Manager and adding tags to certificates upon creation.
* `Aws\ApplicationAutoScaling` - Update default endpoint for Application Auto Scaling.
* `Aws\AutoScalingPlans` - Update default endpoint for AWS Auto Scaling.
* `Aws\CodeBuild` - Add Canonical ARN to LogsLocation.
* `Aws\EC2` - This release adds two new APIs (DescribeInstanceTypes and DescribeInstanceTypeOfferings) that give customers access to instance type attributes and regional and zonal offerings.
* `Aws\EMR` - Amazon EMR adds support for concurrent step execution and cancelling running steps. Amazon EMR has added a new Outpost ARN field in the ListCluster and DescribeCluster API responses that is populated for clusters launched in an AWS Outpost subnet.
* `Aws\ForecastService` - This release adds two key updates to existing APIs. 1. Amazon Forecast can now generate forecasts in any quantile using the optional parameter forecastTypes in the CreateForecast API and 2. You can get additional details (metrics and relevant error messages) on your AutoML runs using the DescribePredictor and GetAccuracyMetrics APIs.
* `Aws\MediaPackageVod` - Includes the submission time of Asset ingestion request in the API response for Create/List/Describe Assets.
* `Aws\Rekognition` - This release adds enhanced face filtering support to the IndexFaces API operation, and introduces face filtering for CompareFaces and SearchFacesByImage API operations.
* `Aws\SNS` - Added documentation for the dead-letter queue feature.
* `Aws\SSM` - Add RebootOption and LastNoRebootInstallOperationTime for DescribeInstancePatchStates and DescribeInstancePatchStatesForPatchGroup API
* `Aws\STS` - Support tagging for STS sessions and tag based access control for the STS APIs

## 3.121.0 - 2019-11-21

* `Aws\Amplify` - This release of AWS Amplify Console introduces support for backend environments. Backend environments are containers for AWS deployments. Each environment is a collection of AWS resources.
* `Aws\AppSync` - AppSync: AWS AppSync now supports the ability to add, configure, and maintain caching for your AWS AppSync GraphQL API.
* `Aws\ConfigService` - AWS Config launches Custom Configuration Items. A new feature which allows customers to publish resource configuration for third-party resources, custom, or on-premises servers.
* `Aws\Connect` - This release adds a new API: StartChatContact. You can use it to programmatically start a chat on the specified Amazon Connect instance. Learn more here: https://docs.aws.amazon.com/connect/latest/APIReference/Welcome.html 
* `Aws\ConnectParticipant` - This release adds 5 new APIs: CreateParticipantConnection, DisconnectParticipant, GetTranscript, SendEvent, and SendMessage. For Amazon Connect chat, you can use them to programmatically perform participant actions on the configured Amazon Connect instance. Learn more here: https://docs.aws.amazon.com/connect-participant/latest/APIReference/Welcome.html
* `Aws\DynamoDB` - With this release, you can convert an existing Amazon DynamoDB table to a global table by adding replicas in other AWS Regions.
* `Aws\EC2` - This release adds support for attaching AWS License Manager Configurations to Amazon Machine Image (AMI) using ImportImage API; and adds support for running different instance sizes on EC2 Dedicated Hosts
* `Aws\Glue` - This release adds support for Glue 1.0 compatible ML Transforms.
* `Aws\LexModelBuildingService` - Amazon Lex now supports Sentiment Analysis
* `Aws\LexRuntimeService` - Amazon Lex now supports Sentiment Analysis
* `Aws\MarketplaceMetering` - Documentation updates for the AWS Marketplace Metering Service.
* `Aws\SSM` - The release contains new API and API changes for AWS Systems Manager Explorer product.
* `Aws\TranscribeService` - With this release, Amazon Transcribe now supports transcriptions from audio sources in Hebrew (he-IL), Swiss German (de-CH), Japanese (ja-JP), Turkish (tr-TR), Arabic-Gulf (ar-AE), Malay (ms-MY), Telugu (te-IN)

## 3.120.0 - 2019-11-20

* `Aws\ApplicationDiscoveryService` - New exception type for use with Migration Hub home region
* `Aws\Chime` - Adds APIs to create and manage meeting session resources for the Amazon Chime SDK
* `Aws\CloudTrail` -  1. This release adds two new APIs, GetInsightSelectors and PutInsightSelectors, which let you configure CloudTrail Insights event delivery on a trail. An Insights event is a new type of event that is generated when CloudTrail detects unusual activity in your AWS account. In this release, only "ApiCallRateInsight" is a supported Insights event type. 2. This release also adds the new "ExcludeManagementEventSource" option to the existing PutEventSelectors API. This field currently supports only AWS Key Management Services.
* `Aws\CodeCommit` - This release adds support for creating pull request approval rules and pull request approval rule templates in AWS CodeCommit. This allows developers to block merges of pull requests, contingent on the approval rules being satisfiied.
* `Aws\Credentials` - Tweak instance profile provider fallback behavior.
* `Aws\DLM` - DLM now supports Fast Snapshot Restore. You can enable Fast Restore on snapshots created by DLM, provide the AZs and the number of snapshots to be enabled with this capability.
* `Aws\DataSync` - Update to configure task to run periodically on a schedule
* `Aws\EC2` - This release of Amazon Elastic Compute Cloud (Amazon EC2) introduces support for Amazon Elastic Block Store (Amazon EBS) fast snapshot restores.
* `Aws\ECS` - Added support for CPU and memory task-level overrides on the RunTask and StartTask APIs. Added location information to Tasks.
* `Aws\FSx` - Announcing a Multi-AZ deployment type for Amazon FSx for Windows File Server, providing fully-managed Windows file storage with high availability and redundancy across multiple AWS Availability Zones.
* `Aws\Firehose` - With this release, Amazon Kinesis Data Firehose allows server side encryption with customer managed CMKs. Customer managed CMKs ( "Customer Master Keys") are AWS Key Management Service (KMS) keys that are fully managed by the customer. With customer managed CMKs, customers can establish and maintain their key policies, IAM policies, rotating policies and add tags. For more information about AWS KMS and CMKs, please refer to: https://docs.aws.amazon.com/kms/latest/developerguide/concepts.html. Please refer to the following link to create CMKs: https://docs.aws.amazon.com/kms/latest/developerguide/importing-keys-create-cmk.html
* `Aws\MediaStore` - This release fixes a broken link in the SDK documentation.
* `Aws\MigrationHub` - New exception type for use with Migration Hub home region
* `Aws\MigrationHubConfig` - AWS Migration Hub Config Service allows you to get and set the Migration Hub home region for use with AWS Migration Hub and Application Discovery Service
* `Aws\QuickSight` - Amazon QuickSight now supports programmatic creation and management of data sources, data sets, dashboards and templates with new APIs. Templates hold dashboard metadata, and can be used to create copies connected to the same or different dataset as required. Also included in this release are APIs for SPICE ingestions, fine-grained access control over AWS resources using AWS Identity and Access Management (IAM) policies, as well AWS tagging. APIs are supported for both Standard and Enterprise Edition, with edition-specific support for specific functionality.
* `Aws\S3` - This release introduces support for Amazon S3 Replication Time Control, a new feature of S3 Replication that provides a predictable replication time backed by a Service Level Agreement. S3 Replication Time Control helps customers meet compliance or business requirements for data replication, and provides visibility into the replication process with new Amazon CloudWatch Metrics.
* `Aws\StorageGateway` - The new DescribeAvailabilityMonitorTest API provides the results of the most recent High Availability monitoring test. The new StartAvailabilityMonitorTest API verifies the storage gateway is configured for High Availability monitoring. The new ActiveDirectoryStatus response element has been added to the DescribeSMBSettings and JoinDomain APIs to indicate the status of the gateway after the most recent JoinDomain operation. The new TimeoutInSeconds parameter of the JoinDomain API allows for the configuration of the timeout in which the JoinDomain operation must complete.
* `Aws\TranscribeService` - With this release Amazon Transcribe enables alternative transcriptions so that you can see different interpretations of transcribed audio.

## 3.119.0 - 2019-11-19

* `Aws\AutoScaling` - Amazon EC2 Auto Scaling now supports Instance Weighting and Max Instance Lifetime. Instance Weighting allows specifying the capacity units for each instance type included in the MixedInstancesPolicy and how they would contribute to your application's performance. Max Instance Lifetime allows specifying the maximum length of time that an instance can be in service. If any instances are approaching this limit, Amazon EC2 Auto Scaling gradually replaces them.
* `Aws\CloudFormation` - This release of AWS CloudFormation StackSets enables users to detect drift on a stack set and the stack instances that belong to that stack set.
* `Aws\CodeBuild` - Add support for ARM and GPU-enhanced build environments and a new SSD-backed Linux compute type with additional CPU and memory in CodeBuild
* `Aws\ConfigService` - AWSConfig launches support for conformance packs. A conformance pack is a new resource type that allows you to package a collection of Config rules and remediation actions into a single entity. You can create and deploy conformance packs into your account or across all accounts in your organization
* `Aws\Credentials` - Support new secure data flow for the calls to the Instance Metadata Service.
* `Aws\EC2` - This release adds support for RunInstances to specify the metadata options for new instances; adds a new API, ModifyInstanceMetadataOptions, which lets you modify the metadata options for a running or stopped instance; and adds support for CreateCustomerGateway to specify a device name.
* `Aws\ElasticLoadBalancingv2` - This release allows forward actions on Application Load Balancers to route requests to multiple target groups, based on the weight you specify for each target group.
* `Aws\IAM` - IAM reports the timestamp when a role's credentials were last used to make an AWS request. This helps you identify unused roles and remove them confidently from your AWS accounts.
* `Aws\IoT` - As part of this release, we are extending the capability of AWS IoT Rules Engine to send messages directly to customer's own web services/applications. Customers can now create topic rules with HTTP actions to route messages from IoT Core directly to URL's that they own. Ownership is proved by creating and confirming topic rule destinations.
* `Aws\Lambda` - This release provides three new runtimes to support Node.js 12 (initially 12.13.0), Python 3.8 and Java 11. 
* `Aws\S3` - Added support for S3 us-east-1 regional endpoint setting and corresponding configuration.

## 3.118.0 - 2019-11-18

* `Aws\CloudFormation` - This release introduces APIs for the CloudFormation Registry, a new service to submit and discover resource providers with which you can manage third-party resources natively in CloudFormation.
* `Aws\CostExplorer` - add EstimatedOnDemandCostWithCurrentCommitment to GetSavingsPlansPurchaseRecommendationRequest API
* `Aws\Pinpoint` - This release of the Amazon Pinpoint API introduces support for using and managing message templates for messages that are sent through the voice channel. It also introduces support for specifying default values for message variables in message templates. 
* `Aws\RDS` - Documentation updates for rds
* `Aws\S3` - Added support for S3 Replication for existing objects. This release allows customers who have requested and been granted access to replicate existing S3 objects across buckets.
* `Aws\SSM` - The release contains new API and API changes for AWS Systems Manager Explorer product.
* `Aws\SageMaker` - Amazon SageMaker now supports multi-model endpoints to host multiple models on an endpoint using a single inference container.
* `Aws\SageMakerRuntime` - Amazon SageMaker Runtime now supports a new TargetModel header to invoke a specific model hosted on multi model endpoints.

## 3.117.2 - 2019-11-15

* `Aws\Chime` - This release adds support for Chime Room Management APIs
* `Aws\CloudWatchLogs` - Documentation updates for logs
* `Aws\CognitoIdentityProvider` - This release adds a new option in the User Pool to allow specifying sender's name in the emails sent by Amazon Cognito. This release also adds support to add SES Configuration Set to the emails sent by Amazon Cognito.
* `Aws\EC2` - You can now add tags while copying snapshots. Previously, a user had to first copy the snapshot and then add tags to the copied snapshot manually. Moving forward, you can specify the list of tags you wish to be applied to the copied snapshot as a parameter on the Copy Snapshot API. 
* `Aws\EKS` - Introducing Amazon EKS managed node groups, a new feature that lets you easily provision worker nodes for Amazon EKS clusters and keep them up to date using the Amazon EKS management console, CLI, and APIs.
* `Aws\EMR` - Access to the cluster ARN makes it easier for you to author resource-level permissions policies in AWS Identity and Access Management. To simplify the process of obtaining the cluster ARN, Amazon EMR has added a new field containing the cluster ARN to all API responses that include the cluster ID.
* `Aws\ElasticLoadBalancingv2` - Documentation-only change to the default value of the routing.http.drop_invalid_header_fields.enabled attribute.
* `Aws\GuardDuty` - This release includes new operations related to findings export, including: CreatePublishingDestination, UpdatePublishingDestination, DescribePublishingDestination, DeletePublishingDestination and ListPublishingDestinations.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for DolbyVision encoding, and SCTE35 & ESAM insertion to DASH ISO EMSG.
* `Aws\SSM` - This release updates AWS Systems Manager Parameter Store documentation for the enhanced search capability.
* `Aws\WorkSpaces` - Added APIs to register your directories with Amazon WorkSpaces and to modify directory details. 

## 3.117.1 - 2019-11-14

* `Aws\CognitoIdentityProvider` - This release adds a new setting at user pool client to prevent user existence related errors during authentication, confirmation, and password recovery related operations. This release also adds support to enable or disable specific authentication flows for a user pool client.
* `Aws\Connect` - This release enhances the existing user management APIs and adds 3 new APIs - TagResource, UntagResource, and ListTagsForResource to support tagging Amazon Connect users, which facilitates more granular access controls for Amazon Connect users within an Amazon Connect instance. You can learn more about the new APIs here: https://docs.aws.amazon.com/connect/latest/APIReference/Welcome.html.
* `Aws\MarketplaceMetering` - Added CustomerNotEntitledException in MeterUsage API for Container use case.
* `Aws\Personalize` - Amazon Personalize: Adds ability to get batch recommendations by creating a batch inference job.
* `Aws\SSM` - Updates support for adding attachments to Systems Manager Automation documents

## 3.117.0 - 2019-11-13

* `Aws\CloudSearch` - Amazon CloudSearch domains let you require that all traffic to the domain arrive over HTTPS. This security feature helps you block clients that send unencrypted requests to the domain.
* `Aws\Credentials` - Adds extra catch block in AssumeRoleWithWebIdentityCredentialProvider to account for non-AWS exceptions.
* `Aws\DLM` - You can now add tags to a lifecycle policy in Data Lifecycle Manager (DLM). Tags allow you to categorize your policies in different ways, such as by department, purpose or owner. You can also enable resource level permissions based on tags to set access control on ability to modify or delete a tagged policy.
* `Aws\DataExchange` - Introducing AWS Data Exchange, a service that makes it easy for AWS customers to securely create, manage, access, and exchange data sets in the cloud.
* `Aws\IoT` - This release adds the custom fields definition support in the index definition for AWS IoT Fleet Indexing Service. Custom fields can be used as an aggregation field to run aggregations with both existing GetStatistics API and newly added GetCardinality, GetPercentiles APIs. GetStatistics will return all statistics (min/max/sum/avg/count...) with this release. For more information, please refer to our latest documentation: https://docs.aws.amazon.com/iot/latest/developerguide/iot-indexing.html
* `Aws\SesV2` - This is the first release of version 2 of the Amazon SES API. You can use this API to configure your Amazon SES account, and to send email. This API extends the functionality that exists in the previous version of the Amazon SES API.

## 3.116.0 - 2019-11-12

* `Aws\CodePipeline` - AWS CodePipeline now supports the use of variables in action configuration.
* `Aws\DynamoDB` - Amazon DynamoDB enables you to restore your data to a new DynamoDB table using a point-in-time or on-demand backup. You now can modify the settings on the new restored table. Specifically, you can exclude some or all of the local and global secondary indexes from being created with the restored table. In addition, you can change the billing mode and provisioned capacity settings.
* `Aws\ElasticLoadBalancingv2` - You can configure your Application Load Balancer to either drop invalid header fields or forward them to targets.
* `Aws\MarketplaceCatalog` - This is the first release for the AWS Marketplace Catalog service which allows you to list, describe and manage change requests on your published entities on AWS Marketplace. 
* `Aws\TranscribeService` - With this release, Amazon Transcribe now supports transcriptions from audio sources in Welsh English (en-WL), Scottish English(en-AB), Irish English(en-IE), Farsi(fa-IR), Tamil(ta-IN), Indonesian(id-ID), Portuguese (pt-PT), Dutch(nl-NL).

## 3.115.2 - 2019-11-11

* `Aws\CloudFormation` - The Resource Import feature enables customers to import existing AWS resources into new or existing CloudFormation Stacks.
* `Aws\CostExplorer` - This launch provides customers with access to GetCostAndUsageWithResources API.

## 3.115.1 - 2019-11-08

* `Aws\CognitoIdentity` - This release adds support for disabling classic flow.
* `Aws\ECR` - This release contains ticket fixes for Amazon ECR.

## 3.115.0 - 2019-11-07

* `Aws\Comprehend` - This release adds new languages (ar, hi, ko, ja, zh, zh-TW) for Amazon Comprehend's DetectSentiment, DetectEntities, DetectKeyPhrases, BatchDetectSentiment, BatchDetectEntities and BatchDetectKeyPhrases APIs
* `Aws\SSM` - AWS Systems Manager Session Manager target length increased to 400.
* `Aws\SSO` - This is an initial release of AWS Single Sign-On (SSO) end-user access. This release adds support for accessing AWS accounts assigned in AWS SSO using short term credentials.
* `Aws\SSOOIDC` - This is an initial release of AWS Single Sign-On OAuth device code authorization service.

## 3.114.1 - 2019-11-06

* `Aws\SavingsPlans` - This is the first release of Savings Plans, a new flexible pricing model that offers low prices on Amazon EC2 and AWS Fargate usage.

## 3.114.0 - 2019-11-06

* `Aws\Budgets` - Documentation updates for budgets to track Savings Plans utilization and coverage
* `Aws\CodeBuild` - Add support for Build Number, Secrets Manager and Exported Environment Variables.
* `Aws\CostExplorer` - This launch provides customers with access to Savings Plans management APIs.
* `Aws\EFS` - EFS customers can select a lifecycle policy that automatically moves files that have not been accessed for 7 days into the EFS Infrequent Access (EFS IA) storage class. EFS IA provides price/performance that is cost-optimized for files that are not accessed every day.
* `Aws\SavingsPlans` - This is the first release of Savings Plans, a new flexible pricing model that offers low prices on Amazon EC2 and AWS Fargate usage.
* `Aws\signer` - This release adds support for tagging code-signing profiles in AWS Signer.

## 3.113.0 - 2019-11-05

* `Aws\CodeStarNotifications` - This release adds a notification manager for events in repositories, build projects, deployments, and pipelines. You can now configure rules and receive notifications about events that occur for resources. Each notification includes a status message as well as a link to the resource (repository, build project, deployment application, or pipeline) whose event generated the notification.
* `Aws\RDS` - Documentation updates for Amazon RDS

## 3.112.35 - 2019-11-04

* `Aws\DAX` - Documentation updates for dax
* `Aws\EC2` - Documentation updates for ec2
* `Aws\RoboMaker` - RoboMaker Fleet Management launch a feature to verify your robot is ready to download and install the new robot application using a download condition file, which is a script run on the robot prior to downloading the new deployment. 

## 3.112.34 - 2019-11-01

* `Aws\CloudTrail` - This release adds two new APIs, GetTrail and ListTrails, and support for adding tags when you create a trail by using a new TagsList parameter on CreateTrail operations.
* `Aws\DatabaseMigrationService` - This release contains task timeline attributes in replication task statistics. This release also adds a note to the documentation for the CdcStartPosition task request parameter. This note describes how to enable the use of native CDC start points for a PostgreSQL source by setting the new slotName extra connection attribute on the source endpoint to the name of an existing logical replication slot.
* `Aws\Pinpoint` - This release of the Amazon Pinpoint API introduces support for using and managing journeys, and querying analytics data for journeys.

## 3.112.33 - 2019-10-31

* `Aws\Amplify` - This release of AWS Amplify Console introduces support for Web Previews. This feature allows user to create ephemeral branch deployments from pull request submissions made to a connected repository. A pull-request preview deploys every pull request made to your Git repository to a unique preview URL.
* `Aws\S3` - S3 Inventory now supports a new field 'IntelligentTieringAccessTier' that reports the access tier (frequent or infrequent) of objects stored in Intelligent-Tiering storage class.
* `Aws\Support` - The status descriptions for TrustedAdvisorCheckRefreshStatus have been updated

## 3.112.32 - 2019-10-30

* `Aws\ElastiCache` - Amazon ElastiCache for Redis 5.0.5 now allows you to modify authentication tokens by setting and rotating new tokens. You can now modify active tokens while in use, or add brand-new tokens to existing encryption-in-transit enabled clusters that were previously setup without authentication tokens. This is a two-step process that allows you to set and rotate the token without interrupting client requests.

## 3.112.31 - 2019-10-29

* `Aws\AppStream` - Adds support for providing domain names that can embed streaming sessions
* `Aws\Cloud9` - Added CREATING and CREATE_FAILED environment lifecycle statuses. 

## 3.112.30 - 2019-10-28

* `Aws\S3` - Adding support in SelectObjectContent for scanning a portion of an object specified by a scan range.

## 3.112.29 - 2019-10-28

* `Aws\ECR` - This release of Amazon Elastic Container Registry Service (Amazon ECR) introduces support for image scanning. This identifies the software vulnerabilities in the container image based on the Common Vulnerabilities and Exposures (CVE) database.
* `Aws\ElastiCache` - Amazon ElastiCache adds support for migrating Redis workloads hosted on Amazon EC2 into ElastiCache by syncing the data between the source Redis cluster and target ElastiCache for Redis cluster in real time. For more information, see https://docs.aws.amazon.com/AmazonElastiCache/latest/red-ug/migrate-to-elasticache.html.
* `Aws\Transfer` - This release adds logical directories support to your AWS SFTP server endpoint, so you can now create logical directory structures mapped to Amazon Simple Storage Service (Amazon S3) bucket paths for users created and stored within the service. Amazon S3 bucket names and paths can now be hidden from AWS SFTP users, providing an additional level of privacy to meet security requirements. You can lock down your SFTP users' access to designated folders (commonly referred to as 'chroot'), and simplify complex folder structures for data distribution through SFTP without replicating files across multiple users.

## 3.112.28 - 2019-10-24

* `Aws\AppMesh` - This release adds support for the gRPC and HTTP/2 protocols.
* `Aws\Chime` - * This release introduces Voice Connector PDX region and defaults previously created Voice Connectors to IAD. You can create Voice Connector Groups and add region specific Voice Connectors to direct telephony traffic across AWS regions in case of regional failures. With this release you can add phone numbers to Voice Connector Groups and can bulk move phone numbers between Voice Connectors, between Voice Connector and Voice Connector Groups and between Voice Connector Groups. Voice Connector now supports additional settings to enable SIP Log capture. This is in addition to the launch of Voice Connector Cloud Watch metrics in this release. This release also supports assigning outbound calling name (CNAM) to AWS account and individual phone numbers assigned to Voice Connectors. * Voice Connector now supports a setting to enable real time audio streaming delivered via Kinesis Audio streams. Please note that recording Amazon Chime Voice Connector calls with this feature maybe be subject to laws or regulations regarding the recording of telephone calls and other electronic communications. AWS Customer and their end users' have the responsibility to comply with all applicable laws regarding the recording, including properly notifying all participants in a recorded session or to a recorded communication that the session or communication is being recorded and obtain their consent.
* `Aws\EC2` - This release updates CreateFpgaImage to support tagging FPGA images on creation
* `Aws\GameLift` - Amazon GameLift offers expanded hardware options for game hosting: Custom game builds can use the Amazon Linux 2 operating system, and fleets for both custom builds and Realtime servers can now use C5, M5, and R5 instance types.
* `Aws\SageMaker` - Adds support for the new family of Elastic Inference Accelerators (eia2) for SageMaker Hosting and Notebook Services

## 3.112.27 - 2019-10-23

* `Aws\Connect` - This release adds 4 new APIs ListQueues, ListPhoneNumbers, ListContactFlows, and ListHoursOfOperations, which can be used to programmatically list Queues, PhoneNumbers, ContactFlows, and HoursOfOperations configured for an Amazon Connect instance respectively. You can learn more about the new APIs here: https://docs.aws.amazon.com/connect/latest/APIReference/Welcome.html.
* `Aws\Polly` - Amazon Polly adds new female voices: US Spanish - Lupe and Brazilian Portuguese - Camila; both voices are available in Standard and Neural engine.
* `Aws\STS` - AWS Security Token Service (STS) now supports a regional configuration flag to make the client respect the region without the need for the endpoint parameter. 

## 3.112.26 - 2019-10-22

* `Aws\IoTEvents` - Add support for new serial evaluation method for events in a detector model.
* `Aws\OpsWorksCM` - AWS OpsWorks for Chef Automate (OWCA) now allows customers to use a custom domain and respective certificate, for their AWS OpsWorks For Chef Automate servers. Customers can now provide a CustomDomain, CustomCertificate and CustomPrivateKey in CreateServer API to configure their Chef Automate servers with a custom domain and certificate.

## 3.112.25 - 2019-10-18

* `Aws\CloudWatch` - New Period parameter added to MetricDataQuery structure.

## 3.112.24 - 2019-10-17

* `Aws\Batch` - Adding support for Compute Environment Allocation Strategies 
* `Aws\RDS` - Amazon RDS now supports Amazon RDS on VMware with the introduction of APIs related to Custom Availability Zones and Media installation.
* `Aws\WorkSpaces` - Updates Smoke Test

## 3.112.23 - 2019-10-16

* `Aws\Kafka` - AWS MSK has added support for adding brokers to a cluster.
* `Aws\MarketplaceCommerceAnalytics` - add 2 more values for the supporting sections - age of past due funds + uncollected funds breakdown
* `Aws\RoboMaker` - This release adds support for ROS2 Dashing as a beta feature

## 3.112.22 - 2019-10-15

* `Aws\KinesisVideoArchivedMedia` - Add ON_DISCONTINUITY mode to the GetHLSStreamingSessionURL API

## 3.112.21 - 2019-10-14

* `Aws\Personalize` - AWS Personalize: Adds ability to create a solution version using FULL or UPDATE training mode
* `Aws\WorkSpaces` - Documentation updates for WorkSpaces

## 3.112.20 - 2019-10-11

* `Aws\Greengrass` - Greengrass OTA service supports Raspbian/Armv6l platforms.

## 3.112.19 - 2019-10-10

* `Aws\EC2` - New EC2 M5n, M5dn, R5n, R5dn instances with 100 Gbps network performance and Elastic Fabric Adapter (EFA) for ultra low latency; New A1.metal bare metal instance powered by AWS Graviton Processors
* `Aws\FMS` - Firewall Manager now supports Amazon VPC security groups, making it easier to configure and manage security groups across multiple accounts from a single place.
* `Aws\IoTAnalytics` - Add `completionTime` to API call ListDatasetContents.
* `Aws\LexRuntimeService` - Amazon Lex now supports Session API checkpoints

## 3.112.18 - 2019-10-09

* `Aws\ElastiCache` - Amazon ElastiCache now allows you to apply available service updates on demand to your Memcached and Redis Cache Clusters. Features included: (1) Access to the list of applicable service updates and their priorities. (2) Service update monitoring and regular status updates. (3) Recommended apply-by-dates for scheduling the service updates. (4) Ability to stop and later re-apply updates. For more information, see https://docs.aws.amazon.com/AmazonElastiCache/latest/mem-ug/Self-Service-Updates.html and https://docs.aws.amazon.com/AmazonElastiCache/latest/red-ug/Self-Service-Updates.html
* `Aws\Kafka` - Updated documentation for Amazon Managed Streaming for Kafka service.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for Dolby Atmos encoding, up to 36 outputs, accelerated transcoding with frame capture and preferred acceleration feature.

## 3.112.17 - 2019-10-08

* `Aws\DataSync` - Add Sync options to enable/disable TaskQueueing
* `Aws\EventBridge` - Documentation updates for Amazon EventBridge.
* `Aws\Firehose` - With this release, you can use Amazon Kinesis Firehose delivery streams to deliver streaming data to Amazon Elasticsearch Service version 7.x clusters. For technical documentation, look for CreateDeliveryStream operation in Amazon Kinesis Firehose API reference.
* `Aws\Organizations` - Documentation updates for organizations

## 3.112.16 - 2019-10-07

* `Aws\DirectConnect` - This release adds a service provider field for physical connection creation and provides a list of available partner providers for each Direct Connect location.
* `Aws\Firehose` - Amazon Kinesis Data Firehose now allows delivering data to Elasticsearch clusters set up in a different AWS account than the Firehose AWS account. For technical documentation, look for ElasticsearchDestinationConfiguration in the Amazon Kinesis Firehose API reference.
* `Aws\Glue` - AWS Glue now provides ability to use custom certificates for JDBC Connections.
* `Aws\Pinpoint` - This release of the Amazon Pinpoint API introduces support for using and managing message templates.
* `Aws\PinpointEmail` - This release of the Amazon Pinpoint Email API introduces support for using and managing message templates.
* `Aws\Snowball` - AWS Snowball Edge now allows you to perform an offline update to the software of your Snowball Edge device when your device is not connected to the internet. Previously, updating your Snowball Edge's software required that the device be connected to the internet or be sent back to AWS. Now, you can keep your Snowball Edge software up to date even if your device(s) cannot connect to the internet, or are required to run in an air-gapped environment. To complete offline updates, download the software update from a client machine with connection to the internet using the AWS Command Line Interface (CLI). Then, have the Snowball Edge device download and install the software update using the Snowball Edge device API. For more information about offline updates, visit the Snowball Edge documentation page.

## 3.112.15 - 2019-10-04

* `Aws\CognitoIdentityProvider` - This release adds ClientMetadata input parameter to multiple Cognito User Pools operations, making this parameter available to the customer configured lambda triggers as applicable. 
* `Aws\MediaPackage` - New Harvest Job APIs to export segment-accurate content windows from MediaPackage Origin Endpoints to S3. See https://docs.aws.amazon.com/mediapackage/latest/ug/harvest-jobs.html for more info
* `Aws\SSM` - Documentation updates for Systems Manager / StartSession.

## 3.112.14 - 2019-10-03

* `Aws\ApplicationAutoScaling` - Documentation updates for Application Auto Scaling
* `Aws\Credentials` - Fixed an issue that the credentials by process provider won't cache.
* `Aws\DeviceFarm` - Documentation updates for devicefarm
* `Aws\EC2` - This release allows customers to purchase regional EC2 RIs on a future date.
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service now supports configuring additional options for domain endpoint, such as whether to require HTTPS for all traffic.

## 3.112.13 - 2019-10-02

* `Aws\Lightsail` - This release adds support for the automatic snapshots add-on for instances and block storage disks.

## 3.112.12 - 2019-10-01

* `Aws\DocDB` - This release provides support for describe and modify CA certificates.

## 3.112.11 - 2019-09-30

* `Aws\MQ` - Amazon MQ now includes the ability to scale your brokers by changing the host instance type. See the hostInstanceType property of UpdateBrokerInput (https://docs.aws.amazon.com/amazon-mq/latest/api-reference/brokers-broker-id.html#brokers-broker-id-model-updatebrokerinput), and pendingHostInstanceType property of DescribeBrokerOutput (https://docs.aws.amazon.com/amazon-mq/latest/api-reference/brokers-broker-id.html#brokers-broker-id-model-describebrokeroutput).
* `Aws\RDS` - This release adds support for creating a Read Replica with Active Directory domain information. This release updates RDS API to indicate whether an OrderableDBInstanceOption supports Kerberos Authentication.
* `Aws\WAF` - Lowering the threshold for Rate Based rule from 2000 to 100.

## 3.112.10 - 2019-09-27

* `Aws\Amplify` - This release adds access logs APIs and artifact APIs for AWS Amplify Console.
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) removes FirelensConfiguration from the DescribeTask output during the FireLens public preview.

## 3.112.9 - 2019-09-26

* `Aws\CodePipeline` - Documentation updates for CodePipeline
* `Aws\SSM` - This release updates the AWS Systems Manager Parameter Store PutParameter and LabelParameterVersion APIs to return the "Tier" of parameter created/updated and the "parameter version" labeled respectively. 

## 3.112.8 - 2019-09-25

* `Aws\DatabaseMigrationService` - This release adds a new DeleteConnection API to delete the connection between a replication instance and an endpoint. It also adds an optional S3 setting to specify the precision of any TIMESTAMP column values written to an S3 object file in .parquet format.
* `Aws\GlobalAccelerator` - API Update for AWS Global Accelerator to support for DNS aliasing.
* `Aws\SageMaker` - Enable G4D and R5 instances in SageMaker Hosting Services

## 3.112.7 - 2019-09-24

* `Aws\ComprehendMedical` - Use Amazon Comprehend Medical to analyze medical text stored in the specified Amazon S3 bucket. Use the console to create and manage batch analysis jobs, or use the batch APIs to detect both medical entities and protected health information (PHI). The batch APIs start, stop, list, and retrieve information about batch analysis jobs. This release also includes DetectEntitiesV2 operation which returns the Acuity and Direction entities as attributes instead of types.
* `Aws\DataSync` - Added S3StorageClass, OverwriteMode sync option, and ONLY_FILES_TRANSFERRED setting for the VerifyMode sync option.
* `Aws\S3` - Tweak S3 stream wrapper size logic for seekable streams.
* `Aws\TranscribeService` - With this update Amazon Transcribe enables you to provide an AWS KMS key to encrypt your transcription output.

## 3.112.6 - 2019-09-23

* `Aws\RDSDataService` - RDS Data API now supports Amazon Aurora Serverless PostgreSQL databases.
* `Aws\Redshift` - Adds API operation DescribeNodeConfigurationOptions and associated data structures.

## 3.112.5 - 2019-09-20

* `Aws\EC2` - G4 instances are Amazon EC2 instances based on NVIDIA T4 GPUs and are designed to provide cost-effective machine learning inference for applications, like image classification, object detection, recommender systems, automated speech recognition, and language translation. G4 instances are also a cost-effective platform for building and running graphics-intensive applications, such as remote graphics workstations, video transcoding, photo-realistic design, and game streaming in the cloud. To get started with G4 instances visit https://aws.amazon.com/ec2/instance-types/g4.
* `Aws\Greengrass` - Greengrass OTA service now returns the updated software version in the PlatformSoftwareVersion parameter of a CreateSoftwareUpdateJob response
* `Aws\RDS` - Add a new LeaseID output field to DescribeReservedDBInstances, which shows the unique identifier for the lease associated with the reserved DB instance. AWS Support might request the lease ID for an issue related to a reserved DB instance.
* `Aws\WorkSpaces` - Adds the WorkSpaces restore feature

## 3.112.4 - 2019-09-19

* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for container image manifest digests. This enables you to identify all tasks launched using a container image pulled from ECR in order to correlate what was built with where it is running.
* `Aws\Glue` - AWS Glue DevEndpoints now supports GlueVersion, enabling you to choose Apache Spark 2.4.3 (in addition to Apache Spark 2.2.1). In addition to supporting the latest version of Spark, you will also have the ability to choose between Python 2 and Python 3.
* `Aws\MediaConnect` - When you grant an entitlement, you can now specify the percentage of the entitlement data transfer that you want the subscriber to be responsible for.

## 3.112.3 - 2019-09-18

* `Aws\APIGateway` - Amazon API Gateway simplifies accessing PRIVATE APIs by allowing you to associate one or more Amazon Virtual Private Cloud (VPC) Endpoints to a private API. API Gateway will create and manage DNS alias records necessary for easily invoking the private APIs. With this feature, you can leverage private APIs in web applications hosted within your VPCs.
* `Aws\RAM` - AWS RAM provides a new ListPendingInvitationResources API action that lists the resources in a resource share that is shared with you but that the invitation is still pending for
* `Aws\WAFRegional` - Lowering the threshold for Rate Based rule from 2000 to 100.

## 3.112.2 - 2019-09-17

* `Aws\` - Respect client region when assuming credential role via web identity token.
* `Aws\Athena` - This release adds DataManifestLocation field indicating the location and file name of the data manifest file. Users can get a list of files that the Athena query wrote or intended to write from the manifest file.
* `Aws\IAM` - Documentation updates for iam
* `Aws\Personalize` - [Personalize] Adds trainingHours to solutionVersion properties.

## 3.112.1 - 2019-09-16

* `Aws\EKS` - This release lets customers add tags to an Amazon EKS cluster. These tags can be used to control access to the EKS API for managing the cluster using IAM. The Amazon EKS TagResource API allows customers to associate tags with their cluster. Customers can list tags for a cluster using the ListTagsForResource API and remove tags from a cluster with the UntagResource API. Note: tags are specific to the EKS cluster resource, they do not propagate to other AWS resources used by the cluster.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for multi-DRM SPEKE with CMAF outputs, MP3 ingest, and options for improved video quality.

## 3.112.0 - 2019-09-12

* `Aws\EC2` - Fix for FleetActivityStatus and FleetStateCode enum
* `Aws\ElasticLoadBalancingv2` - Documentation updates for elasticloadbalancingv2: This release adds support for TLS SNI on Network Load Balancers 
* `Aws\MediaLive` - AWS Elemental MediaLive now supports High Efficiency Video Coding (HEVC) for standard-definition (SD), high-definition (HD), and ultra-high-definition (UHD) encoding with HDR support.Encoding with HEVC offers a number of advantages. While UHD video requires an advanced codec beyond H.264 (AVC), high frame rate (HFR) or High Dynamic Range (HDR) content in HD also benefit from HEVC's advancements. In addition, benefits can be achieved with HD and SD content even if HDR and HFR are not needed.
* `Aws\WorkMailMessageFlow` - This release allows customers to access email messages as they flow to and from Amazon WorkMail.

## 3.111.2 - 2019-09-11

* `Aws\ConfigService` - Adding input validation for the OrganizationConfigRuleName string.
* `Aws\EC2` - This release adds support for new data fields and log format in VPC flow logs.
* `Aws\MediaConnect` - This release adds support for the RIST protocol on sources and outputs.
* `Aws\RDS` - This release allows customers to specify a custom parameter group when creating a Read Replica, for DB engines which support this feature.
* `Aws\SES` - Updated API documentation to correct broken links, and to update content based on customer feedback.
* `Aws\SFN` - Fixing letter case in Map history event details to be small case

## 3.111.1 - 2019-09-10

* `Aws\StorageGateway` - The CloudWatchLogGroupARN parameter of the UpdateGatewayInformation API allows for configuring the gateway to use a CloudWatch log-group where Storage Gateway health events will be logged. 

## 3.111.0 - 2019-09-09

* `Aws\AppMesh` - This release adds support for http retry policies.
* `Aws\AppStream` - IamRoleArn support in CreateFleet, UpdateFleet, CreateImageBuilder APIs
* `Aws\EC2` - This release expands Site-to-Site VPN tunnel options to allow customers to restrict security algorithms and configure timer settings for VPN connections. Customers can specify these new options while creating new VPN connections, or they can modify the tunnel options on existing connections using a new API.
* `Aws\MarketplaceCommerceAnalytics` - Add FDP+FPS (monthly_revenue_field_demonstration_usage + monthly_revenue_flexible_payment_schedule) to Marketplace Commerce Analytics Service
* `Aws\QLDB` - (New Service) Amazon QLDB is a fully managed ledger database that provides a transparent, immutable, and cryptographically verifiable transaction log owned by a central trusted authority. Amazon QLDB is a new class of serverless database that eliminates the need to engage in the complex development effort of building your own ledger-like applications and it automatically scales to support the demands of your application. Introduces Amazon QLDB API operations needed for managing Amazon QLDB ledgers. This includes the ability to manage Amazon QLDB ledgers, cryptographically verify documents, and export the journal in a ledger.
* `Aws\QLDBSession` - (New Service) Amazon QLDB is a fully managed ledger database that provides a transparent, immutable, and cryptographically verifiable transaction log owned by a central trusted authority. Amazon QLDB is a new class of serverless database that eliminates the need to engage in the complex development effort of building your own ledger-like applications and it automatically scales to support the demands of your application. Introduces Amazon QLDB API operations needed for interacting with data in Amazon QLDB ledgers.
* `Aws\RoboMaker` - Support for Connectivity to Simulation. When you need to interact with the applications in your simulation job, you can connect to your robot application or simulation application with port forwarding. When you configure port forwarding, traffic will be forwarded from the simulation job port to the application port. Port forwarding makes it easy to connect with tools such as ROS Bridge and other tools. This can be useful when you want to debug or run custom tools to interact with your applications. 

## 3.110.11 - 2019-09-06

* `Aws\KinesisAnalytics` - Documentation updates for kinesisanalytics

## 3.110.10 - 2019-09-05

* `Aws\ConfigService` - AWS Config now includes the option for marking RemediationConfigurations as automatic, removing the need to call the StartRemediationExecution API. Manual control over resource execution rate is also included, and RemediationConfigurations are now ARN addressable. Exceptions to exclude account resources from being remediated can be configured with the new PutRemediationExceptions, DescribeRemediationExceptions, and DeleteRemediationExceptions APIs.

## 3.110.9 - 2019-09-04

* `Aws\EKS` - Amazon EKS DescribeCluster API returns a new OIDC issuer field that can be used to create OIDC identity provider for IAM for Service Accounts feature.
* `Aws\SFN` - Added support for new history events
* `Aws\TranscribeService` - MediaFormat is now optional for StartTranscriptionJob API.

## 3.110.8 - 2019-09-03

* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for attaching Amazon Elastic Inference accelerators to your containers. This enables you to run deep learning inference workloads with hardware acceleration in a more efficient way.
* `Aws\GameLift` - You can now make use of PKI resources to provide more secure connections between your game clients and servers. To learn more, please refer to the public Amazon GameLift documentation.
* `Aws\ResourceGroupsTaggingAPI` - Documentation updates for resourcegroupstaggingapi

## 3.110.7 - 2019-08-30

* `Aws\ApiGatewayManagementApi` - You can use getConnection to return information about the connection (when it is connected, IP address, etc) and deleteConnection to disconnect the given connection
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for modifying the cluster settings for existing clusters, which enables you to toggle whether Container Insights is enabled or not. Support is also introduced for custom log routing using the ECS FireLens integration.
* `Aws\MQ` - Adds support for updating security groups selection of an Amazon MQ broker.

## 3.110.6 - 2019-08-29

* `Aws\ApplicationAutoScaling` - With the current release, you can suspend and later resume any of the following scaling actions in Application Auto Scaling: scheduled scaling actions, dynamic scaling in actions, dynamic scaling out actions.
* `Aws\CodePipeline` - Introducing pipeline execution trigger details in ListPipelineExecutions API.
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for including Docker container IDs in the API response when describing and stopping tasks. This enables customers to easily map containers to the tasks they are associated with.
* `Aws\ElastiCache` - Amazon ElastiCache for Redis now supports encryption at rest using customer managed customer master keys (CMKs) in AWS Key Management Service (KMS). Amazon ElastiCache now supports cluster names upto 40 characters for replicationGoups and upto 50 characters for cacheClusters.
* `Aws\Lambda` - Adds a "MaximumBatchingWindowInSeconds" parameter to event source mapping api's. Usable by Dynamodb and Kinesis event sources.

## 3.110.5 - 2019-08-28

* `Aws\GlobalAccelerator` - API Update for AWS Global Accelerator Client IP Preservation
* `Aws\MediaConvert` - This release adds the ability to send a job to an on-demand queue while simulating the performance of a job sent to a reserved queue. Use this setting to estimate the number of reserved transcoding slots (RTS) you need for a reserved queue.
* `Aws\SQS` - Added support for message system attributes, which currently lets you send AWS X-Ray trace IDs through Amazon SQS.

## 3.110.4 - 2019-08-27

* `Aws\Organizations` - Documentation updates for organizations

## 3.110.3 - 2019-08-26

* `Aws\` - Fixes EventParsingIterator example
* `Aws\SSM` - This feature adds "default tier" to the AWS Systems Manager Parameter Store for parameter creation and update. AWS customers can now set the "default tier" to one of the following values: Standard (default), Advanced or Intelligent-Tiering. This allows customers to create advanced parameters or parameters in corresponding tiers with one setting rather than code change to specify parameter tiers.
* `Aws\SecurityHub` - This release resolves an issue with the DescribeHub action, changes the MasterId and InvitationId parameters for AcceptInvitation to Required, and changes the AccountIds parameter for DeleteInvitations and DeclineInvitations to Required.

## 3.110.2 - 2019-08-23

* `Aws\EC2` - This release of EC2 VM Import Export adds support for exporting Amazon Machine Image(AMI)s to a VM file
* `Aws\MediaPackageVod` - Adds optional Constant Initialization Vector (IV) to HLS Encryption for MediaPackage VOD.
* `Aws\TranscribeService` - Amazon Transcribe - support transcriptions from audio sources in Russian (ru-RU) and Chinese (zh-CN).

## 3.110.1 - 2019-08-22

* `Aws\DataSync` - This release adds support for SMB location type.
* `Aws\RDS` - This release allows users to enable RDS Data API while creating Aurora Serverless databases. 
* `Aws\Test\Integ` - Modifies waiter settings for S3 integration test.

## 3.110.0 - 2019-08-21

* `Aws\ElastiCache` - ElastiCache extends support for Scale down for Redis Cluster-mode enabled and disabled replication groups 
* `Aws\ForecastQueryService` - Amazon Forecast is a fully managed machine learning service that makes it easy for customers to generate accurate forecasts using their historical time-series data
* `Aws\ForecastService` - Amazon Forecast is a fully managed machine learning service that makes it easy for customers to generate accurate forecasts using their historical time-series data
* `Aws\PersonalizeRuntime` - Increased limits on number of items recommended and reranked: The maximum number of results returned from getRecommendations API has been increased to 200. The maximum number of items which can be reranked via getPersonalizedRanking API has been increased to 200.
* `Aws\Rekognition` - Documentation updates for Amazon Rekognition.
* `Aws\SQS` - This release provides a way to add metadata tags to a queue when it is created. You can use tags to organize and identify your Amazon SQS queues for cost allocation.
* `Aws\SageMaker` - Amazon SageMaker now supports Amazon EFS and Amazon FSx for Lustre file systems as data sources for training machine learning models. Amazon SageMaker now supports running training jobs on ml.p3dn.24xlarge instance type. This instance type is offered as a limited private preview for certain SageMaker customers. If you are interested in joining the private preview, please reach out to the SageMaker Product Management team via AWS Support."

## 3.109.8 - 2019-08-20

* `Aws\AlexaForBusiness` - Adding support for optional locale input in CreateProfile and UpdateProfile APIs
* `Aws\AppStream` - Includes API updates to support streaming through VPC endpoints for image builders and stacks.
* `Aws\SageMaker` - Amazon SageMaker introduces Managed Spot Training. Increases the maximum number of metric definitions to 40 for SageMaker Training and Hyperparameter Tuning Jobs. SageMaker Neo adds support for Acer aiSage and Qualcomm QCS605 and QCS603. 
* `Aws\Transfer` - New field in response of TestIdentityProvider

## 3.109.7 - 2019-08-19

* `Aws\AppMesh` - Fix for HttpMethod enum
* `Aws\CostandUsageReportService` - New IAM permission required for editing AWS Cost and Usage Reports - Starting today, you can allow or deny IAM users permission to edit Cost & Usage Reports through the API and the Billing and Cost Management console. To allow users to edit Cost & Usage Reports, ensure that they have 'cur: ModifyReportDefinition' permission. Refer to the technical documentation (https://docs.aws.amazon.com/aws-cost-management/latest/APIReference/API_cur_ModifyReportDefinition.html) for additional details.

## 3.109.6 - 2019-08-16

* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for controlling the usage of swap space on a per-container basis for Linux containers.
* `Aws\EMR` - Amazon EMR has introduced an account level configuration called Block Public Access that allows you to block clusters with ports open to traffic from public IP sources (i.e. 0.0.0.0/0 for IPv4 and ::/0 for IPv6) from launching. Individual ports or port ranges can be added as exceptions to allow public access.
* `Aws\RoboMaker` - Two feature release: 1. AWS RoboMaker introduces log-based simulation. Log-based simulation allows you to play back pre-recorded log data such as sensor streams for testing robotic functions like localization, mapping, and object detection. Use the AWS RoboMaker SDK to test your robotic applications. 2. AWS RoboMaker allow customer to setup a robot deployment timeout when CreateDeploymentJob.

## 3.109.5 - 2019-08-15

* `Aws\AppMesh` - This release adds support for http header based routing and route prioritization.
* `Aws\Athena` - This release adds support for querying S3 Requester Pays buckets. Users can enable this feature through their Workgroup settings.
* `Aws\CodeCommit` - This release adds an API, BatchGetCommits, that allows retrieval of metadata for multiple commits in an AWS CodeCommit repository.
* `Aws\EC2` - This release adds an option to use private certificates from AWS Certificate Manager (ACM) to authenticate a Site-to-Site VPN connection's tunnel endpoints and customer gateway device. 
* `Aws\Glue` - GetJobBookmarks API is withdrawn.
* `Aws\StorageGateway` - CreateSnapshotFromVolumeRecoveryPoint API supports new parameter: Tags (to be attached to the created resource)

## 3.109.4 - 2019-08-14

* `Aws\EC2` - This release adds a new API called SendDiagnosticInterrupt, which allows you to send diagnostic interrupts to your EC2 instance.

## 3.109.3 - 2019-08-13

* `Aws\AppSync` - Adds a configuration option for AppSync GraphQL APIs

## 3.109.2 - 2019-08-12

* `Aws\ApplicationAutoScaling` - Documentation updates for Application Auto Scaling
* `Aws\AutoScaling` - Amazon EC2 Auto Scaling now supports a new Spot allocation strategy "capacity-optimized" that fulfills your request using Spot Instance pools that are optimally chosen based on the available Spot capacity.
* `Aws\CloudWatch` - Documentation updates for monitoring
* `Aws\Rekognition` - Adding new Emotion, Fear

## 3.109.1 - 2019-08-09

* `Aws\` - Retry InvalidIdentityToken errors for AssumeRoleWithWebIdentityCredentialProvider
* `Aws\GuardDuty` - New "evidence" field in the finding model to provide evidence information explaining why the finding has been triggered. Currently only threat-intelligence findings have this field. Some documentation updates.
* `Aws\IoT` - This release adds Quality of Service (QoS) support for AWS IoT rules engine republish action.
* `Aws\LexRuntimeService` - Manage Amazon Lex session state using APIs on the client
* `Aws\MediaConvert` - AWS Elemental MediaConvert has added support for multi-DRM SPEKE with CMAF outputs, MP3 ingest, and options for improved video quality. 
* `Aws\Redshift` - Add expectedNextSnapshotScheduleTime and expectedNextSnapshotScheduleTimeStatus to redshift cluster object.
* `Aws\Test\Integ` - Add waiter to S3 integration test to prevent failed bucket deletions on cleanup.

## 3.109.0 - 2019-08-08

* `Aws\CodeBuild` - CodeBuild adds CloudFormation support for SourceCredential
* `Aws\Glue` - You can now use AWS Glue to find matching records across dataset even without identifiers to join on by using the new FindMatches ML Transform. Find related products, places, suppliers, customers, and more by teaching a custom machine learning transformation that you can use to identify matching matching records as part of your analysis, data cleaning, or master data management project by adding the FindMatches transformation to your Glue ETL Jobs. If your problem is more along the lines of deduplication, you can use the FindMatches in much the same way to identify customers who have signed up more than ones, products that have accidentally been added to your product catalog more than once, and so forth. Using the FindMatches MLTransform, you can teach a Transform your definition of a duplicate through examples, and it will use machine learning to identify other potential duplicates in your dataset. As with data integration, you can then use your new Transform in your deduplication projects by adding the FindMatches transformation to your Glue ETL Jobs. This release also contains additional APIs that support AWS Lake Formation.
* `Aws\LakeFormation` - Lake Formation: (New Service) AWS Lake Formation is a fully managed service that makes it easier for customers to build, secure and manage data lakes. AWS Lake Formation simplifies and automates many of the complex manual steps usually required to create data lakes including collecting, cleaning and cataloging data and securely making that data available for analytics and machine learning.
* `Aws\OpsWorksCM` - This release adds support for Chef Automate 2 specific engine attributes.

## 3.108.6 - 2019-08-07

* `Aws\ApplicationInsights` - CloudWatch Application Insights for .NET and SQL Server now provides integration with AWS Systems Manager OpsCenter. This integration allows you to view and resolve problems and operational issues detected for selected applications.

## 3.108.5 - 2019-08-06

* `Aws\Batch` - Documentation updates for AWS Batch

## 3.108.4 - 2019-08-05

* `Aws\DataSync` - Support VPC endpoints.
* `Aws\EC2` - Amazon EC2 now supports a new Spot allocation strategy "Capacity-optimized" that fulfills your request using Spot Instance pools that are optimally chosen based on the available Spot capacity.
* `Aws\IoT` - In this release, AWS IoT Device Defender introduces audit mitigation actions that can be applied to audit findings to help mitigate security issues.

## 3.108.3 - 2019-08-02

* `Aws\` - Added static code analysis using PHPStan to Travis CI configuration.
* `Aws\STS` - Documentation updates for sts

## 3.108.2 - 2019-07-30

* `Aws\MediaConvert` - MediaConvert adds support for specifying priority (-50 to 50) on jobs submitted to on demand or reserved queues
* `Aws\Polly` - Amazon Polly adds support for Neural text-to-speech engine.
* `Aws\Route53` - Amazon Route 53 now supports the Middle East (Bahrain) Region (me-south-1) for latency records, geoproximity records, and private DNS for Amazon VPCs in that region.

## 3.108.1 - 2019-07-29

* `Aws\CodeCommit` - This release supports better exception handling for merges.

## 3.108.0 - 2019-07-26

* `Aws\Batch` - AWS Batch now supports SDK auto-pagination and Job-level docker devices.
* `Aws\CloudWatchLogs` - Allow for specifying multiple log groups in an Insights query, and deprecate storedByte field for LogStreams and interleaved field for FilterLogEventsRequest.
* `Aws\CostExplorer` - Adds support for resource optimization recommendations.
* `Aws\Credentials` - Update web identity provider to handle all exceptions.
* `Aws\EC2` - You can now create EC2 Capacity Reservations using Availability Zone ID or Availability Zone name. You can view usage of Amazon EC2 Capacity Reservations per AWS account.
* `Aws\Glue` - This release provides GetJobBookmark and GetJobBookmarks APIs. These APIs enable users to look at specific versions or all versions of the JobBookmark for a specific job. This release also enables resetting the job bookmark to a specific run via an enhancement of the ResetJobBookmark API.
* `Aws\Greengrass` - Greengrass OTA service supports openwrt/aarch64 and openwrt/armv7l platforms.
* `Aws\MediaConnect` - This release adds support for the Zixi pull protocol on outputs.
* `Aws\Sts` - Added support for STS regional endpoints and corresponding configuration.

## 3.107.8 - 2019-07-25

* `Aws\ECR` - This release adds support for immutable image tags.
* `Aws\MediaConvert` - AWS Elemental MediaConvert has added several features including support for: audio normalization using ITU BS.1770-3, 1770-4 algorithms, extension of job progress indicators, input cropping rectangle & output position rectangle filters per input, and dual SCC caption mapping to additional codecs and containers. 
* `Aws\MediaLive` - AWS Elemental MediaLive is adding Input Clipping, Immediate Mode Input Switching, and Dynamic Inputs.

## 3.107.7 - 2019-07-24

* `Aws\EC2` - This release introduces support for split tunnel with AWS Client VPN, and also adds support for opt-in Regions in DescribeRegions API. In addition, customers can now also tag Launch Templates on creation.
* `Aws\Glue` - This release provides GlueVersion option for Job APIs and WorkerType option for DevEndpoint APIs. Job APIs enable users to pick specific GlueVersion for a specific job and pin the job to a specific runtime environment. DevEndpoint APIs enable users to pick different WorkerType for memory intensive workload.
* `Aws\Pinpoint` - This release adds support for programmatic access to many of the same campaign metrics that are displayed on the Amazon Pinpoint console. You can now use the Amazon Pinpoint API to monitor and assess performance data for campaigns, and integrate metrics data with other reporting tools. We update the metrics data continuously, resulting in a data latency timeframe that is limited to approximately two hours.
* `Aws\STS` - New STS GetAccessKeyInfo API operation that returns the account identifier for the specified access key ID.

## 3.107.6 - 2019-07-23

* `Aws\SSM` - You can now use Maintenance Windows to select a resource group as the target. By selecting a resource group as the target of a Maintenance Window, customers can perform routine tasks across different resources such as Amazon Elastic Compute Cloud (AmazonEC2) instances, Amazon Elastic Block Store (Amazon EBS) volumes, and Amazon Simple Storage Service(Amazon S3) buckets within the same recurring time window.
* `Aws\SecretsManager` - This release increases the maximum allowed size of SecretString or SecretBinary from 7KB to 10KB in the CreateSecret, UpdateSecret, PutSecretValue and GetSecretValue APIs. This release also increases the maximum allowed size of ResourcePolicy from 4KB to 20KB in the GetResourcePolicy and PutResourcePolicy APIs.

## 3.107.5 - 2019-07-22

* `Aws\MQ` - Adds support for AWS Key Management Service (KMS) to offer server-side encryption. You can now select your own customer managed CMK, or use an AWS managed CMK in your KMS account.
* `Aws\Shield` - Adding new VectorType (HTTP_Reflection) and related top contributor types to describe WordPress Pingback DDoS attacks.

## 3.107.4 - 2019-07-19

* `Aws\IoTEvents` - Adds support for IoT Events, Lambda, SQS and Kinesis Firehose actions.
* `Aws\SQS` - This release updates the information about the availability of FIFO queues and includes miscellaneous fixes.

## 3.107.3 - 2019-07-18

* `Aws\CodeDeploy` - Documentation updates for codedeploy
* `Aws\Comprehend` - Amazon Comprehend now supports multiple entities for custom entity recognition
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for cluster settings. Cluster settings specify whether CloudWatch Container Insights is enabled or disabled for the cluster.
* `Aws\ElastiCache` - Updates for Elasticache

## 3.107.2 - 2019-07-17

* `Aws\AutoScaling` - Documentation updates for autoscaling
* `Aws\ConfigService` - This release adds more granularity to the status of an OrganizationConfigRule by adding a new status. It also adds an exception when organization access is denied.
* `Aws\Credentials` - Adds retry option for invalid json returned to instance profile credential provider.
* `Aws\DatabaseMigrationService` - S3 endpoint settings update: 1) Option to append operation column to full-load files. 2) Option to add a commit timestamp column to full-load and cdc files. Updated DescribeAccountAttributes to include UniqueAccountIdentifier.

## 3.107.1 - 2019-07-12

* `Aws\ApiGatewayV2` - Bug fix (Add tags field to Update Stage , Api and DomainName Responses )
* `Aws\Build` - Adds API documentation generation for modeled exception error shapes.
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service now supports M5, C5, and R5 instance types.
* `Aws\IAM` - Removed exception that was indicated but never thrown for IAM GetAccessKeyLastUsed API
* `Aws\RoboMaker` - Added Melodic as a supported Robot Software Suite Version
* `Aws\Test` - Add back partition endpoint tests for DynamoDb local endpoints.

## 3.107.0 - 2019-07-11

* `Aws\CloudWatchEvents` - Adds APIs for partner event sources, partner event buses, and custom event buses. These new features are managed in the EventBridge service.
* `Aws\EventBridge` - Amazon EventBridge is a serverless event bus service that makes it easy to connect your applications with data from a variety of sources, including AWS services, partner applications, and your own applications.

## 3.106.1 - 2019-07-10

* `Aws\Credentials` - Fixes empty or unknown profile name causing error in default chain.
* `Aws\Glacier` - Documentation updates for glacier
* `Aws\QuickSight` - Amazon QuickSight now supports embedding dashboards for all non-federated QuickSight users. This includes IAM users, AD users and users from the QuickSight user pool. The get-dashboard-embed-url API accepts QUICKSIGHT as identity type with a user ARN to authenticate the embeddable dashboard viewer as a non-federated user.
* `Aws\ServiceCatalog` - This release adds support for Parameters in ExecuteProvisionedProductServiceAction and adds functionality to get the default parameter values for a Self-Service Action execution against a Provisioned Product via DescribeServiceActionExecutionParameters

## 3.106.0 - 2019-07-09

* `Aws\` - Added support for assuming credential role via web identity token.
* `Aws\Amplify` - This release adds webhook APIs and manual deployment APIs for AWS Amplify Console.
* `Aws\CloudWatch` - This release adds three new APIs (PutAnomalyDetector, DeleteAnomalyDetector, and DescribeAnomalyDetectors) to support the new feature, CloudWatch Anomaly Detection. In addition, PutMetricAlarm and DescribeAlarms APIs are updated to support management of Anomaly Detection based alarms.
* `Aws\ConfigService` - AWS Config now supports a new set of APIs to manage AWS Config rules across your organization in AWS Organizations. Using this capability, you can centrally create, update, and delete AWS Config rules across all accounts in your organization. This capability is particularly useful if you have a need to deploy a common set of AWS Config rules across all accounts. You can also specify accounts where AWS Config rules should not be created. In addition, you can use these APIs from the master account in AWS Organizations to enforce governance by ensuring that the underlying AWS Config rules are not modifiable by your organization member accounts.These APIs work for both managed and custom AWS Config rules. For more information, see Enabling AWS Config Rules Across all Accounts in Your Organization in the AWS Config Developer Guide.The new APIs are available in all commercial AWS Regions where AWS Config and AWS Organizations are supported. For the full list of supported Regions, see AWS Regions and Endpoints in the AWS General Reference. To learn more about AWS Config, visit the AWS Config webpage. To learn more about AWS Organizations, visit the AWS Organizations webpage.
* `Aws\EFS` - EFS customers can now enable Lifecycle Management for all file systems. You can also now select from one of four Lifecycle Management policies (14, 30, 60 and 90 days), to automatically move files that have not been accessed for the period of time defined by the policy, from the EFS Standard storage class to the EFS Infrequent Access (IA) storage class. EFS IA provides price/performance that is cost-optimized for files that are not accessed every day.
* `Aws\Functions` - Avoid repeatedly loading compiled JSON.
* `Aws\GameLift` - GameLift FlexMatch now supports matchmaking of up to 200 players per game session, and FlexMatch can now automatically backfill your game sessions whenever there is an open slot.
* `Aws\KinesisVideo` - Add "GET_DASH_STREAMING_SESSION_URL" as an API name to the GetDataEndpoint API.
* `Aws\KinesisVideoArchivedMedia` - Adds support for the GetDASHStreamingSessionURL API. Also adds support for the Live Replay playback mode of the GetHLSStreamingSessionURL API.
* `Aws\WAF` - Updated SDK APIs to add tags to WAF Resources: WebACL, Rule, Rulegroup and RateBasedRule. Tags can also be added during creation of these resources.
* `Aws\WAFRegional` - Updated SDK APIs to add tags to WAF Resources: WebACL, Rule, Rulegroup and RateBasedRule. Tags can also be added during creation of these resources.

## 3.105.0 - 2019-07-08

* `Aws\Api` - Added support for unmarshalling modeled exception data returned by services.
* `Aws\CostExplorer` - This release introduces a new operation called GetUsageForecast, which allows you to programmatically access AWS Cost Explorer's forecasting engine on usage data (running hours, data transfer, etc).
* `Aws\DynamoDb` - Added support configuring data attribute type as 'binary', defaults to 'string'.
* `Aws\S3` - Added support for passing options to presign via createPresignedRequest.

## 3.104.1 - 2019-07-03

* `Aws\EC2` - AssignPrivateIpAddresses response includes two new fields: AssignedPrivateIpAddresses, NetworkInterfaceId
* `Aws\RDS` - This release supports Cross-Account Cloning for Amazon Aurora clusters.
* `Aws\S3` - Add S3 x-amz-server-side-encryption-context support.
* `Aws\SWF` - This release adds APIs that allow adding and removing tags to a SWF domain, and viewing tags for a domain. It also enables adding tags when creating a domain.

## 3.104.0 - 2019-07-02

* `Aws\AppStream` - Adding ImageBuilderName in Fleet API and Documentation updates for AppStream. 
* `Aws\ClientSideMonitoring` - Added client configuration options for client-side monitoring.
* `Aws\MediaStore` - This release adds support for tagging, untagging, and listing tags for AWS Elemental MediaStore containers.

## 3.103.2 - 2019-07-01

* `Aws\DocDB` - This release provides support for cluster delete protection and the ability to stop and start clusters.
* `Aws\EC2` - This release adds support for specifying a maximum hourly price for all On-Demand and Spot instances in both Spot Fleet and EC2 Fleet.
* `Aws\Organizations` - Specifying the tag key and tag value is required for tagging requests.
* `Aws\RDS` - This release adds support for RDS DB Cluster major version upgrade 

## 3.103.1 - 2019-06-28

* `Aws\AlexaForBusiness` - This release allows developers and customers to add SIP addresses and international phone numbers to contacts.
* `Aws\EC2` - You can now launch 8xlarge and 16xlarge instance sizes on the general purpose M5 and memory optimized R5 instance types.
* `Aws\Redshift` - ClusterAvailabilityStatus: The availability status of the cluster for queries. Possible values are the following: Available, Unavailable, Maintenance, Modifying, Failed.
* `Aws\WorkSpaces` - Minor API fixes for WorkSpaces.

## 3.103.0 - 2019-06-27

* `Aws\DirectConnect` - Tags will now be included in the API responses of all supported resources (Virtual interfaces, Connections, Interconnects and LAGs). You can also add tags while creating these resources.
* `Aws\EC2InstanceConnect` - Amazon EC2 Instance Connect is a simple and secure way to connect to your instances using Secure Shell (SSH). With EC2 Instance Connect, you can control SSH access to your instances using AWS Identity and Access Management (IAM) policies as well as audit connection requests with AWS CloudTrail events. In addition, you can leverage your existing SSH keys or further enhance your security posture by generating one-time use SSH keys each time an authorized user connects.
* `Aws\Pinpoint` - This release includes editorial updates for the Amazon Pinpoint API documentation.
* `Aws\WorkSpaces` - Added support for the WorkSpaces restore feature and copying WorkSpaces Images across AWS Regions.

## 3.102.1 - 2019-06-27

* `Aws\DynamoDB` - Documentation updates for dynamodb
* `Aws\Test` - Removed outdated endpoints tests.

## 3.102.0 - 2019-06-26

* `Aws\` - Auto assume credential role using profile in `~/.aws/config`
* `Aws\ApiGatewayV2` - You can now perform tag operations on ApiGatewayV2 Resources (typically associated with WebSocket APIs)
* `Aws\CodeCommit` - This release supports better exception handling for merges.
* `Aws\Test` - Updated endpoints file with corresponding updated partition tests.

## 3.101.1 - 2019-06-25

* `Aws\EC2` - Starting today, you can use Traffic Mirroring to copy network traffic from an elastic network interface of Amazon EC2 instances and then send it to out-of-band security and monitoring appliances for content inspection, threat monitoring, and troubleshooting. These appliances can be deployed as individual instances, or as a fleet of instances behind a Network Load Balancer with a User Datagram Protocol (UDP) listener. Traffic Mirroring supports filters and packet truncation, so that you only extract the traffic of interest to monitor by using monitoring tools of your choice.
* `Aws\EKS` - Changing Amazon EKS full service name to Amazon Elastic Kubernetes Service.

## 3.101.0 - 2019-06-24

* `Aws\APIGateway` - Customers can pick different security policies (TLS version + cipher suite) for custom domains in API Gateway
* `Aws\ApiGatewayV2` - Customers can get information about security policies set on custom domain resources in API Gateway
* `Aws\ApplicationInsights` - CloudWatch Application Insights detects errors and exceptions from logs, including .NET custom application logs, SQL Server logs, IIS logs, and more, and uses a combination of built-in rules and machine learning, such as dynamic baselining, to identify common problems. You can then easily drill into specific issues with CloudWatch Automatic Dashboards that are dynamically generated. These dashboards contain the most recent alarms, a summary of relevant metrics, and log snippets to help you identify root cause.
* `Aws\ElasticLoadBalancingv2` - This release adds support for UDP on Network Load Balancers
* `Aws\FSx` - Starting today, you can join your Amazon FSx for Windows File Server file systems to your organization's self-managed Microsoft Active Directory while creating the file system. You can also perform in-place updates of file systems to keep your Active Directory configuration up to date.
* `Aws\ResourceGroupsTaggingAPI` - Updated service APIs and documentation.
* `Aws\SSM` - AWS Systems Manager now supports deleting a specific version of a SSM Document.
* `Aws\SecurityHub` - This release includes a new Tags parameter for the EnableSecurityHub operation, and the following new operations: DescribeHub, CreateActionTarget, DeleteActionTarget, DescribeActionTargets, UpdateActionTarget, TagResource, UntagResource, and ListTagsforResource. It removes the operation ListProductSubscribers, and makes Title and Description required attributes of AwsSecurityFinding.
* `Aws\ServiceQuotas` - Service Quotas enables you to view and manage your quotas for AWS services from a central location.

## 3.100.9 - 2019-06-21

* `Aws\DeviceFarm` - This release includes updated documentation about the default timeout value for test runs and remote access sessions. This release also includes miscellaneous bug fixes for the documentation.
* `Aws\IAM` - We are making it easier for you to manage your permission guardrails i.e. service control policies by enabling you to retrieve the last timestamp when an AWS service was accessed within an account or AWS Organizations entity.
* `Aws\KinesisVideoMedia` - Documentation updates for Amazon Kinesis Video Streams.
* `Aws\MediaPackage` - Added two new origin endpoint fields for configuring which SCTE-35 messages are treated as advertisements.

## 3.100.8 - 2019-06-20

* `Aws\ACMPCA` - ACM Private CA is launching Root CAs and hierarchy management, a new feature that expands the scope of ACM Private CA from supporting only subordinate issuing CAs, to now include a full CA hierarchy that includes root CAs - the cryptographic root of trust for an organization.
* `Aws\ClientSideMonitoring` - Support host configuration for CSM
* `Aws\Glue` - Starting today, you can now use workflows in AWS Glue to author directed acyclic graphs (DAGs) of Glue triggers, crawlers and jobs. Workflows enable orchestration of your ETL workloads by building dependencies between Glue entities (triggers, crawlers and jobs). You can visually track status of the different nodes in the workflows on the console making it easier to monitor progress and troubleshoot issues. Also, you can share parameters across entities in the workflow.
* `Aws\Health` - API improvements for the AWS Health service.
* `Aws\IoTEventsData` - "The colon character ':' is now permitted in Detector Model 'key' parameter values.
* `Aws\OpsWorks` - Documentation updates for OpsWorks Stacks.
* `Aws\RDS` - This release adds support for RDS storage autoscaling

## 3.100.7 - 2019-06-19

* `Aws\EKS` - Changing Amazon EKS full service name to Amazon Elastic Kubernetes Service.

## 3.100.6 - 2019-06-18

* `Aws\EC2` - You can now launch new 12xlarge, 24xlarge, and metal instance sizes on the Amazon EC2 compute optimized C5 instance types featuring 2nd Gen Intel Xeon Scalable Processors.
* `Aws\ResourceGroupsTaggingAPI` - You can use tag policies to help standardize on tags across your organization's resources.

## 3.100.5 - 2019-06-17

* `Aws\Neptune` - This release adds a feature to configure Amazon Neptune to publish audit logs to Amazon CloudWatch Logs.
* `Aws\RoboMaker` - Add the ServiceUnavailableException (503) into CreateSimulationJob API.
* `Aws\ServiceCatalog` - Restrict concurrent calls by a single customer account for CreatePortfolioShare and DeletePortfolioShare when sharing/unsharing to an Organization.

## 3.100.4 - 2019-06-14

* `Aws\AppStream` - Added 2 new values(WINDOWS_SERVER_2016, WINDOWS_SERVER_2019) for PlatformType enum.
* `Aws\CloudFront` - A new datatype in the CloudFront API, AliasICPRecordal, provides the ICP recordal status for CNAMEs associated with distributions. AWS services in China customers must file for an Internet Content Provider (ICP) recordal if they want to serve content publicly on an alternate domain name, also known as a CNAME, that they have added to CloudFront. The status value is returned in the CloudFront response; you cannot configure it yourself. The status is set to APPROVED for all CNAMEs (aliases) in regions outside of China.
* `Aws\EC2` - Correction to enumerations in EC2 client.
* `Aws\Personalize` - Documentation updates for Amazon Personalize.

## 3.100.3 - 2019-06-13

* `Aws\Api` - Fix json parse error when extracting header
* `Aws\AppMesh` - This release adds support for AWS Cloud Map as a service discovery method for virtual nodes.
* `Aws\EC2` - G4 instances are Amazon EC2 instances based on NVIDIA T4 GPUs and are designed to provide cost-effective machine learning inference for applications, like image classification, object detection, recommender systems, automated speech recognition, and language translation. G4 instances are also a cost-effective platform for building and running graphics-intensive applications, such as remote graphics workstations, video transcoding, photo-realistic design, and game streaming in the cloud. To get started with G4 instances visit https://aws.amazon.com/ec2/instance-types/g4.
* `Aws\ElastiCache` - This release is to add support for reader endpoint for cluster-mode disabled Amazon ElastiCache for Redis clusters.
* `Aws\GuardDuty` - Support for tagging functionality in Create and Get operations for Detector, IP Set, Threat Intel Set, and Finding Filter resources and 3 new tagging APIs: ListTagsForResource, TagResource, and UntagResource.

## 3.100.2 - 2019-06-12

* `Aws\ServiceCatalog` - This release adds a new field named Guidance to update provisioning artifact, this field can be set by the administrator to provide guidance to end users about which provisioning artifacts to use.

## 3.100.1 - 2019-06-11

* `Aws\SageMaker` - The default TaskTimeLimitInSeconds of labeling job is increased to 8 hours. Batch Transform introduces a new DataProcessing field which supports input and output filtering and data joining. Training job increases the max allowed input channels from 8 to 20.

## 3.100.0 - 2019-06-10

* `Aws\CodeBuild` - AWS CodeBuild adds support for source version on project level.
* `Aws\CodeCommit` - This release adds two merge strategies for merging pull requests: squash and three-way. It also adds functionality for resolving merge conflicts, testing merge outcomes, and for merging branches using one of the three supported merge strategies.
* `Aws\Personalize` - Amazon Personalize is a machine learning service that makes it easy for developers to create individualized recommendations for customers using their applications.
* `Aws\PersonalizeEvents` - Introducing Amazon Personalize - a machine learning service that makes it easy for developers to create individualized recommendations for customers using their applications.
* `Aws\PersonalizeRuntime` - Amazon Personalize is a machine learning service that makes it easy for developers to create individualized recommendations for customers using their applications.

## 3.99.4 - 2019-06-07

* `Aws\EC2` - Adds DNS entries and NLB ARNs to describe-vpc-endpoint-connections API response. Adds owner ID to describe-vpc-endpoints and create-vpc-endpoint API responses.

## 3.99.3 - 2019-06-06

* `Aws\CloudWatchLogs` - Documentation updates for logs
* `Aws\DynamoDB` - Documentation updates for dynamodb
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for launching container instances using supported Amazon EC2 instance types that have increased elastic network interface density. Using these instance types and opting in to the awsvpcTrunking account setting provides increased elastic network interface (ENI) density on newly launched container instances which allows you to place more tasks on each container instance.
* `Aws\GuardDuty` - Improve FindingCriteria Condition field names, support long-typed conditions and deprecate old Condition field names.
* `Aws\MediaConnect` - This release adds support for encrypting entitlements using Secure Packager and Encoder Key Exchange (SPEKE).
* `Aws\Organizations` - You can tag and untag accounts in your organization and view tags on an account in your organization.
* `Aws\SES` - You can now specify whether the Amazon Simple Email Service must deliver email over a connection that is encrypted using Transport Layer Security (TLS).
* `Aws\SSM` - OpsCenter is a new Systems Manager capability that allows you to view, diagnose, and remediate, operational issues, aka OpsItems, related to various AWS resources by bringing together contextually relevant investigation information. New APIs to create, update, describe, and get OpsItems as well as OpsItems summary API. 

## 3.99.2 - 2019-06-05

* `Aws\Glue` - Support specifying python version for Python shell jobs. A new parameter PythonVersion is added to the JobCommand data type.

## 3.99.1 - 2019-06-04

* `Aws\EC2` - This release adds support for Host Recovery feature which automatically restarts instances on to a new replacement host if failures are detected on Dedicated Host.
* `Aws\ElastiCache` - Amazon ElastiCache now allows you to apply available service updates on demand. Features included: (1) Access to the list of applicable service updates and their priorities. (2) Service update monitoring and regular status updates. (3) Recommended apply-by-dates for scheduling the service updates, which is critical if your cluster is in ElastiCache-supported compliance programs. (4) Ability to stop and later re-apply updates. For more information, see https://docs.aws.amazon.com/AmazonElastiCache/latest/red-ug/Self-Service-Updates.html
* `Aws\IAM` - This release adds validation for policy path field. This field is now restricted to be max 512 characters.
* `Aws\S3` - Documentation updates for s3
* `Aws\StorageGateway` - AWS Storage Gateway now supports AWS PrivateLink, enabling you to administer and use gateways without needing to use public IP addresses or a NAT/Internet Gateway, while avoiding traffic from going over the internet.

## 3.99.0 - 2019-06-03

* `Aws\` - Auto assume credential role from source_profile
* `Aws\ClientSideMonitoring` - Unwrapping errors for CSM options will default to disabling it.
* `Aws\EC2` - Amazon EC2 I3en instances are the new storage-optimized instances offering up to 60 TB NVMe SSD instance storage and up to 100 Gbps of network bandwidth.
* `Aws\RDS` - Amazon RDS Data API is generally available. Removing beta notes in the documentation.

## 3.98.0 - 2019-05-30

* `Aws\CodeCommit` - This release adds APIs that allow adding and removing tags to a repository, and viewing tags for a repository. It also enables adding tags when creating a repository.
* `Aws\IoTAnalytics` - IoT Analytics adds the option to use your own S3 bucket to store channel and data store resources. Previously, only service-managed storage was used.
* `Aws\IoTEvents` - The AWS IoT Events service allows customers to monitor their IoT devices and sensors to detect failures or changes in operation and to trigger actions when these events occur
* `Aws\IoTEventsData` - The AWS IoT Events service allows customers to monitor their IoT devices and sensors to detect failures or changes in operation and to trigger actions when these events occur
* `Aws\Kafka` - Updated APIs for Amazon MSK to enable new features such as encryption in transit, client authentication, and scaling storage.
* `Aws\PinpointEmail` - You can now specify whether the Amazon Pinpoint Email service must deliver email over a connection that is encrypted using Transport Layer Security (TLS).
* `Aws\RDS` - This release adds support for Activity Streams for database clusters.
* `Aws\RDSDataService` - The RDS Data API is generally available for the MySQL-compatible edition of Amazon Aurora Serverless in the US East (N. Virginia and Ohio), US West (Oregon), EU (Ireland), and Asia Pacific (Tokyo) regions. This service enables you to easily access Aurora Serverless clusters with web services-based applications including AWS Lambda and AWS AppSync. The new APIs included in this SDK release are ExecuteStatement, BatchExecuteStatement, BeginTransaction, CommitTransaction, and RollbackTransaction. The ExecuteSql API is deprecated; instead use ExecuteStatement which provides additional functionality including transaction support.
* `Aws\ServiceCatalog` - Service Catalog ListStackInstancesForProvisionedProduct API enables customers to get details of a provisioned product with type "CFN_STACKSET". By passing the provisioned product id, the API will list account, region and status of each stack instances that are associated with this provisioned product.

## 3.97.0 - 2019-05-29

* `Aws\DLM` - Customers can now simultaneously take snapshots of multiple EBS volumes attached to an EC2 instance. With this new capability, snapshots guarantee crash-consistency across multiple volumes by preserving the order of IO operations. This new feature is fully integrated with Amazon Data Lifecycle Manager (DLM) allowing customers to automatically manage snapshots by creating lifecycle policies. 
* `Aws\EC2` - Customers can now simultaneously take snapshots of multiple EBS volumes attached to an EC2 instance. With this new capability, snapshots guarantee crash-consistency across multiple volumes by preserving the order of IO operations. This new feature is fully integrated with Amazon Data Lifecycle Manager (DLM) allowing customers to automatically manage snapshots by creating lifecycle policies. 
* `Aws\IoTThingsGraph` - Initial release.
* `Aws\Pinpoint` - Removes aliases in favor of generic aliasing
* `Aws\RDS` - Documentation updates for rds
* `Aws\SSM` - Systems Manager - Documentation updates
* `Aws\SecurityHub` - This update adds the ListProductSubscribers API, DescribeProducts API, removes CONTAINS as a comparison value for the StringFilter, and only allows use of EQUALS instead of CONTAINS in MapFilter. 

## 3.96.0 - 2019-05-28

* `Aws\` - Adds general support for service operation aliasing defined in a JSON file.
* `Aws\Chime` - This release adds the ability to search and order toll free phone numbers for Voice Connectors.
* `Aws\GroundStation` - AWS Ground Station is a fully managed service that enables you to control satellite communications, downlink and process satellite data, and scale your satellite operations efficiently and cost-effectively without having to build or manage your own ground station infrastructure.
* `Aws\PinpointEmail` - This release adds support for programmatic access to Deliverability dashboard subscriptions and the deliverability data provided by the Deliverability dashboard for domains and IP addresses. The data includes placement metrics for campaigns that use subscribed domains to send email.
* `Aws\RDS` - Add a new output field Status to DBEngineVersion which shows the status of the engine version (either available or deprecated). Add a new parameter IncludeAll to DescribeDBEngineVersions to make it possible to return both available and deprecated engine versions. These changes enable a user to create a Read Replica of an DB instance on a deprecated engine version.
* `Aws\RoboMaker` - Added support for an additional robot software suite (Gazebo 9) and for cancelling deployment jobs.
* `Aws\STS` - Documentation updates for iam
* `Aws\StorageGateway` - Introduce AssignTapePool operation to allow customers to migrate tapes between pools.
* `Aws\TranscribeService` - Amazon Transcribe - support transcriptions from audio sources in Modern Standard Arabic (ar-SA).
* `Aws\WAF` - Documentation updates for waf

## 3.95.0 - 2019-05-24

* `Aws\` - Adds support for 'requiresLength' trait, adding headers as necessary for streaming operations.
* `Aws\CodeDeploy` - AWS CodeDeploy now supports tagging for the application and deployment group resources.
* `Aws\MediaStoreData` - MediaStore - This release adds support for chunked transfer of objects, which reduces latency by making an object available for downloading while it is still being uploaded.
* `Aws\OpsWorksCM` - Documentation updates for OpsWorks for Chef Automate; attribute values updated for Chef Automate 2.0 release.

## 3.94.3 - 2019-05-23

* `Aws\Api` - Preserve path on custom endpoints
* `Aws\EC2` - New APIs to enable EBS encryption by default feature. Once EBS encryption by default is enabled in a region within the account, all new EBS volumes and snapshot copies are always encrypted
* `Aws\WAFRegional` - Documentation updates for waf-regional

## 3.94.2 - 2019-05-22

* `Aws\APIGateway` - This release adds support for tagging of Amazon API Gateway resources.
* `Aws\Budgets` - Added new datatype PlannedBudgetLimits to Budget model, and updated examples for AWS Budgets API for UpdateBudget, CreateBudget, DescribeBudget, and DescribeBudgets
* `Aws\DeviceFarm` - This release introduces support for tagging, tag-based access control, and resource-based access control.
* `Aws\EC2` - This release adds idempotency support for associate, create route and authorization APIs for AWS Client VPN Endpoints.
* `Aws\EFS` - AWS EFS documentation updated to reflect the minimum required value for ProvisionedThroughputInMibps is 1 from the previously documented 0. The service has always required a minimum value of 1, therefor service behavior is not changed. 
* `Aws\RDS` - Documentation updates for rds
* `Aws\ServiceCatalog` - Service Catalog UpdateProvisionedProductProperties API enables customers to manage provisioned product ownership. Administrators can now update the user associated to a provisioned product to another user within the same account allowing the new user to describe, update, terminate and execute service actions in that Service Catalog resource. New owner will also be able to list and describe all past records executed for that provisioned product.
* `Aws\WorkLink` - Amazon WorkLink is a fully managed, cloud-based service that enables secure, one-click access to internal websites and web apps from mobile phones. This release introduces new APIs to associate and manage website authorization providers with Amazon WorkLink fleets.

## 3.94.1 - 2019-05-21

* `Aws\AlexaForBusiness` - This release contains API changes to allow customers to create and manage Network Profiles for their Shared devices
* `Aws\DataSync` - Documentation update and refine pagination token on Datasync List API's

## 3.94.0 - 2019-05-20

* `Aws\Api` - Fix XML body escaping
* `Aws\Kafka` - Updated APIs for the Managed Streaming for Kafka service that let customers create clusters with custom Kafka configuration. 
* `Aws\MarketplaceMetering` - Documentation updates for meteringmarketplace
* `Aws\MediaPackageVod` - AWS Elemental MediaPackage now supports Video-on-Demand (VOD) workflows. These new features allow you to easily deliver a vast library of source video Assets stored in your own S3 buckets using a small set of simple to set up Packaging Configurations and Packaging Groups.

## 3.93.12 - 2019-05-17

* `Aws\AppStream` - Includes APIs for managing subscriptions to AppStream 2.0 usage reports and configuring idle disconnect timeouts on AppStream 2.0 fleets.
* `Aws\Crypto` - Changed type hint to StreamInterface

## 3.93.11 - 2019-05-16

* `Aws\MediaLive` - Added channel state waiters to MediaLive.
* `Aws\S3` - This release updates the Amazon S3 PUT Bucket replication API to include a new optional field named token, which allows you to add a replication configuration to an S3 bucket that has Object Lock enabled.

## 3.93.10 - 2019-05-15

* `Aws\CodePipeline` - This feature includes new APIs to add, edit, remove and view tags for pipeline, custom action type and webhook resources. You can also add tags while creating these resources.
* `Aws\EC2` - Adding tagging support for VPC Endpoints and VPC Endpoint Services.
* `Aws\MediaPackage` - Adds optional configuration for DASH SegmentTemplateFormat to refer to segments by Number with Duration, rather than Number or Time with SegmentTimeline.
* `Aws\RDS` - In the RDS API and CLI documentation, corrections to the descriptions for Boolean parameters to avoid references to TRUE and FALSE. The RDS CLI does not allow TRUE and FALSE values values for Boolean parameters.
* `Aws\TranscribeService` - Amazon Transcribe - support transcriptions from audio sources in Indian English (en-IN) and Hindi (hi-IN).

## 3.93.9 - 2019-05-14

* `Aws\Chime` - Amazon Chime private bots GA release.
* `Aws\Comprehend` - With this release AWS Comprehend now supports Virtual Private Cloud for Asynchronous Batch Processing jobs
* `Aws\EC2` - Pagination support for ec2.DescribeSubnets, ec2.DescribeDhcpOptions 
* `Aws\StorageGateway` - Add Tags parameter to CreateSnapshot and UpdateSnapshotSchedule APIs, used for creating tags on create for one off snapshots and scheduled snapshots.

## 3.93.8 - 2019-05-13

* `Aws\DataSync` - AWS DataSync now enables exclude and include filters to control what files and directories will be copied as part of a task execution.
* `Aws\IoTAnalytics` - ContentDeliveryRule to support sending dataset to S3 and glue
* `Aws\Lambda` - AWS Lambda now supports Node.js v10

## 3.93.7 - 2019-05-10

* `Aws\Api` - Use application/json content-type on rest-json requests
* `Aws\Build` - Add newline character to generated changelog json files.
* `Aws\Glue` - AWS Glue now supports specifying existing catalog tables for a crawler to examine as a data source. A new parameter CatalogTargets is added to the CrawlerTargets data type. 
* `Aws\STS` - AWS Security Token Service (STS) now supports passing IAM Managed Policy ARNs as session policies when you programmatically create temporary sessions for a role or federated user. The Managed Policy ARNs can be passed via the PolicyArns parameter, which is now available in the AssumeRole, AssumeRoleWithWebIdentity, AssumeRoleWithSAML, and GetFederationToken APIs. The session policies referenced by the PolicyArn parameter will only further restrict the existing permissions of an IAM User or Role for individual sessions.

## 3.93.6 - 2019-05-08

* `Aws\Build` - Fix behat scalars on ~v4.0
* `Aws\EKS` - Documentation update for Amazon EKS to clarify allowed parameters in update-cluster-config.
* `Aws\IoT1ClickProjects` - Added automatic pagination support for ListProjects and ListPlacements APIs.
* `Aws\KinesisAnalytics` - Kinesis Data Analytics APIs now support tagging on applications.
* `Aws\KinesisAnalyticsV2` - Kinesis Data Analytics APIs now support tagging on applications.
* `Aws\SageMaker` - Workteams now supports notification configurations. Neo now supports Jetson Nano as a target device and NumberOfHumanWorkersPerDataObject is now included in the ListLabelingJobsForWorkteam response.
* `Aws\ServiceCatalog` - Adds "Parameters" field in UpdateConstraint API, which will allow Admin user to update "Parameters" in created Constraints.

## 3.93.5 - 2019-05-07

* `Aws\AlexaForBusiness` - This release adds an API allowing authorized users to delete a shared device's history of voice recordings and associated response data.
* `Aws\AppSync` - AWS AppSync now supports the ability to add additional authentication providers to your AWS AppSync GraphQL API as well as the ability to retrieve directives configured against fields or object type definitions during schema introspection.
* `Aws\Docs` - Add feedback link for API documentation.
* `Aws\SSM` - Patch Manager adds support for Microsoft Application Patching.
* `Aws\StorageGateway` - Add optional field AdminUserList to CreateSMBFileShare and UpdateSMBFileShare APIs.

## 3.93.4 - 2019-05-06

* `Aws\CodePipeline` - Documentation updates for codepipeline
* `Aws\ConfigService` - AWS Config now supports tagging on PutConfigRule, PutConfigurationAggregator and PutAggregationAuthorization APIs.
* `Aws\IAM` - Documentation updates for iam
* `Aws\STS` - Documentation updates for sts

## 3.93.3 - 2019-05-03

* `Aws\CognitoIdentityProvider` - This release of Amazon Cognito User Pools introduces the new AdminSetUserPassword API that allows administrators of a user pool to change a user's password. The new password can be temporary or permanent.
* `Aws\MediaConvert` - DASH output groups using DRM encryption can now enable a playback device compatibility mode to correct problems with playback on older devices. 
* `Aws\MediaLive` - You can now switch the channel mode of your channels from standard to single pipeline and from single pipeline to standard. In order to switch a channel from single pipeline to standard all inputs attached to the channel must support two encoder pipelines.
* `Aws\WorkMail` - Amazon WorkMail is releasing two new actions: 'GetMailboxDetails' and 'UpdateMailboxQuota'. They add insight into how much space is used by a given mailbox (size) and what its limit is (quota). A mailbox quota can be updated, but lowering the value will not influence WorkMail per user charges. For a closer look at the actions please visit https://docs.aws.amazon.com/workmail/latest/APIReference/API_Operations.html

## 3.93.2 - 2019-05-02

* `Aws\AlexaForBusiness` - This release allows developers and customers to send text and audio announcements to rooms.
* `Aws\KMS` - AWS Key Management Service (KMS) can return an INTERNAL_ERROR connection error code if it cannot connect a custom key store to its AWS CloudHSM cluster. INTERNAL_ERROR is one of several connection error codes that help you to diagnose and fix a problem with your custom key store.

## 3.93.1 - 2019-05-01

* `Aws\EC2` - This release adds an API for the modification of a VPN Connection, enabling migration from a Virtual Private Gateway (VGW) to a Transit Gateway (TGW), while preserving the VPN endpoint IP addresses on the AWS side as well as the tunnel options.
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces additional task definition parameters that enable you to define secret options for Docker log configuration, a per-container list contains secrets stored in AWS Systems Manager Parameter Store or AWS Secrets Manager.
* `Aws\XRay` - AWS X-Ray now includes Analytics, an interactive approach to analyzing user request paths (i.e., traces). Analytics will allow you to easily understand how your application and its underlying services are performing. With X-Ray Analytics, you can quickly detect application issues, pinpoint the root cause of the issue, determine the severity of the issues, and identify which end users were impacted. With AWS X-Ray Analytics you can explore, analyze, and visualize traces, allowing you to find increases in response time to user requests or increases in error rates. Metadata around peak periods, including frequency and actual times of occurrence, can be investigated by applying filters with a few clicks. You can then drill down on specific errors, faults, and response time root causes and view the associated traces. 

## 3.93.0 - 2019-04-30

* `Aws\CodePipeline` - This release contains an update to the PipelineContext object that includes the Pipeline ARN, and the Pipeline Execution Id. The ActionContext object is also updated to include the Action Execution Id.
* `Aws\DirectConnect` - This release adds support for AWS Direct Connect customers to use AWS Transit Gateway with AWS Direct Connect gateway to route traffic between on-premise networks and their VPCs.
* `Aws\ManagedBlockchain` - (New Service) Amazon Managed Blockchain is a fully managed service that makes it easy to create and manage scalable blockchain networks using popular open source frameworks.
* `Aws\Neptune` - Adds a feature to allow customers to specify a custom parameter group when restoring a database cluster.
* `Aws\S3Control` - Add support for Amazon S3 Batch Operations.
* `Aws\ServiceCatalog` - Admin users can now associate/disassociate aws budgets with a portfolio or product in Service Catalog. End users can see the association by listing it or as part of the describe portfolio/product output. A new optional boolean parameter, "DisableTemplateValidation", is added to ProvisioningArtifactProperties data type. The purpose of the parameter is to enable or disable the CloudFormation template validtion when creating a product or a provisioning artifact.

## 3.92.5 - 2019-04-29

* `Aws\` - Added simple cache (PSR-16) adapter.
* `Aws\Aws\Multipart` - Updated the coroutine promise catch to type-hint against `Throwable` for PHP 7+ while keeping `Exception` for backwards-compatibility.
* `Aws\EC2` - Adds support for Elastic Fabric Adapter (EFA) ENIs. 
* `Aws\Transfer` - This release adds support for per-server host-key management. You can now specify the SSH RSA private key used by your SFTP server.

## 3.92.4 - 2019-04-26

* `Aws\IAM` - AWS Security Token Service (STS) enables you to request session tokens from the global STS endpoint that work in all AWS Regions. You can configure the global STS endpoint to vend session tokens that are compatible with all AWS Regions using the new IAM SetSecurityTokenServicePreferences API. 
* `Aws\SNS` - With this release AWS SNS adds tagging support for Topics.

## 3.92.3 - 2019-04-25

* `Aws\Batch` - Documentation updates for AWS Batch.
* `Aws\DynamoDB` - This update allows you to tag Amazon DynamoDB tables when you create them. Tags are labels you can attach to AWS resources to make them easier to manage, search, and filter. 
* `Aws\GameLift` - This release introduces the new Realtime Servers feature, giving game developers a lightweight yet flexible solution that eliminates the need to build a fully custom game server. The AWS SDK updates provide support for scripts, which are used to configure and customize Realtime Servers.
* `Aws\Inspector` - AWS Inspector - Improve the ListFindings API response time and decreases the maximum number of agentIDs from 500 to 99.
* `Aws\Lambda` - AWS Lambda now supports the GetLayerVersionByArn API.
* `Aws\Organizations` - Add back the partitionEndpoint field for Organizations in the endpoints file.
* `Aws\WorkSpaces` - Documentation updates for workspaces

## 3.92.2 - 2019-04-24

* `Aws\AlexaForBusiness` - This release adds support for the Alexa for Business gateway and gateway group APIs.
* `Aws\CloudFormation` - Documentation updates for cloudformation
* `Aws\EC2` - You can now launch the new Amazon EC2 general purpose burstable instance types T3a that feature AMD EPYC processors.
* `Aws\MediaConnect` - Adds support for ListEntitlements pagination.
* `Aws\MediaTailor` - AWS Elemental MediaTailor SDK now includes a new parameter to support origin servers that produce single-period DASH manifests.
* `Aws\RDS` - A new parameter "feature-name" is added to the add-role and remove-role db cluster APIs. The value for the parameter is optional for Aurora MySQL compatible database clusters, but mandatory for Aurora PostgresQL. You can find the valid list of values using describe db engine versions API.
* `Aws\Route53` - Amazon Route 53 now supports the Asia Pacific (Hong Kong) Region (ap-east-1) for latency records, geoproximity records, and private DNS for Amazon VPCs in that region.
* `Aws\S3` - Updates ObjectLoader's requiresMultipart() to handle php://input streams without data loss.
* `Aws\SSM` - This release updates AWS Systems Manager APIs to allow customers to configure parameters to use either the standard-parameter tier (the default tier) or the advanced-parameter tier. It allows customers to create parameters with larger values and attach parameter policies to an Advanced Parameter. 
* `Aws\StorageGateway` - AWS Storage Gateway now supports Access Control Lists (ACLs) on File Gateway SMB shares, enabling you to apply fine grained access controls for Active Directory users and groups.
* `Aws\Textract` - This release adds support for checkbox also known as SELECTION_ELEMENT in Amazon Textract.

## 3.92.1 - 2019-04-19

* `Aws\ResourceGroups` - The AWS Resource Groups service increased the query size limit to 4096 bytes.
* `Aws\TranscribeService` - Amazon Transcribe - support transcriptions from audio sources in Spanish Spanish (es-ES).
* `Aws\WorkSpaces` - Added a new reserved field.

## 3.92.0 - 2019-04-18

* `Aws\ApplicationDiscoveryService` - The Application Discovery Service's DescribeImportTasks and BatchDeleteImportData APIs now return additional statuses for error reporting.
* `Aws\CognitoIdentityProvider` - Document updates for Amazon Cognito Identity Provider.
* `Aws\Credentials` - This update adds a process credential provider. Credetentials can be sourced from a command returning json on stdout.
* `Aws\Kafka` - Amazon Kafka - Added tagging APIs
* `Aws\Organizations` - AWS Organizations is now available in the AWS GovCloud (US) Regions, and we added a new API action for creating accounts in those Regions. For more information, see CreateGovCloudAccount in the AWS Organizations API Reference. 
* `Aws\RDS` - This release adds the TimeoutAction parameter to the ScalingConfiguration of an Aurora Serverless DB cluster. You can now configure the behavior when an auto-scaling capacity change can't find a scaling point.
* `Aws\WorkLink` - Amazon WorkLink is a fully managed, cloud-based service that enables secure, one-click access to internal websites and web apps from mobile phones. This release introduces new APIs to link and manage internal websites and web apps with Amazon WorkLink fleets. 
* `Aws\WorkSpaces` - Documentation updates for workspaces

## 3.91.6 - 2019-04-17

* `Aws\EC2` - This release adds support for requester-managed Interface VPC Endpoints (powered by AWS PrivateLink). The feature prevents VPC endpoint owners from accidentally deleting or otherwise mismanaging the VPC endpoints of some AWS VPC endpoint services.
* `Aws\Polly` - Amazon Polly adds Arabic language support with new female voice - "Zeina"

## 3.91.5 - 2019-04-16

* `Aws\CloudWatch` - Documentation updates for monitoring
* `Aws\CognitoIdentityProvider` - This release adds support for the new email configuration in Amazon Cognito User Pools. You can now specify whether Amazon Cognito emails your users by using its built-in email functionality or your Amazon SES email configuration.
* `Aws\MQ` - This release adds the ability to retrieve information about broker engines and broker instance options. See Broker Engine Types and Broker Instance Options in the Amazon MQ REST API Reference.
* `Aws\Organizations` - Documentation updates for organizations
* `Aws\Redshift` - DescribeResize can now return percent of data transferred from source cluster to target cluster for a classic resize.
* `Aws\StorageGateway` - This change allows you to select either a weekly or monthly maintenance window for your volume or tape gateway. It also allows you to tag your tape and volume resources on creation by adding a Tag value on calls to the respective api endpoints.

## 3.91.4 - 2019-04-05

* `Aws\` - Enables Expect http config to be passed through GuzzleV5 Handler.
* `Aws\Comprehend` - With this release AWS Comprehend provides confusion matrix for custom document classifier.
* `Aws\Glue` - AWS Glue now supports workerType choices in the CreateJob, UpdateJob, and StartJobRun APIs, to be used for memory-intensive jobs.
* `Aws\IoT1ClickDevicesService` - Documentation updates for 1-Click: improved descriptions of resource tagging APIs.
* `Aws\MediaConvert` - Rectify incorrect modelling of DisassociateCertificate method
* `Aws\MediaLive` - Today AWS Elemental MediaLive (https://aws.amazon.com/medialive/) adds the option to create "Single Pipeline" channels, which offers a lower-cost option compared to Standard channels. MediaLive Single Pipeline channels have a single encoding pipeline rather than the redundant dual Availability Zone (AZ) pipelines that MediaLive provides with a "Standard" channel.

## 3.91.3 - 2019-04-04

* `Aws\EKS` - Added support to enable or disable publishing Kubernetes cluster logs in AWS CloudWatch
* `Aws\IAM` - Documentation updates for iam

## 3.91.2 - 2019-04-03

* `Aws\Batch` - Support for GPU resource requirement in RegisterJobDefinition and SubmitJob
* `Aws\Comprehend` - With this release AWS Comprehend adds tagging support for document-classifiers and entity-recognizers.

## 3.91.1 - 2019-04-02

* `Aws\ACM` - Documentation updates for acm
* `Aws\EC2` - Add paginators.
* `Aws\SecurityHub` - This update includes 3 additional error codes: AccessDeniedException, InvalidAccessException, and ResourceConflictException. This update also removes the error code ResourceNotFoundException from the GetFindings, GetInvitationsCount, ListInvitations, and ListMembers operations. 

## 3.91.0 - 2019-04-01

* `Aws\` - Adds helper function to parse full-line hash comments for credentials and config files, which was removed in PHP 7's implemention of parse_ini_file.
* `Aws\EMR` - Amazon EMR adds the ability to modify instance group configurations on a running cluster through the new "configurations" field in the ModifyInstanceGroups API.
* `Aws\SSM` - March 2019 documentation updates for Systems Manager.

## 3.90.13 - 2019-03-29

* `Aws\CloudWatch` - Added 3 new APIs, and one additional parameter to PutMetricAlarm API, to support tagging of CloudWatch Alarms.
* `Aws\Comprehend` - With this release AWS Comprehend supports encryption of output results of analysis jobs and volume data on the storage volume attached to the compute instance that processes the analysis job.
* `Aws\Greengrass` - Greengrass APIs now support tagging operations on resources

## 3.90.12 - 2019-03-28

* `Aws\CloudFront` - Parse the private key used to sign Cloudfront Urls once during construction instead of on every call to ->sign(). For a 2048bit key, this dropped the signing time from 1.3ms to 0.7ms. For a 1024bit key, the time went from 0.40ms to 0.16ms.
* `Aws\MediaLive` - This release adds a new output locking mode synchronized to the Unix epoch.
* `Aws\PinpointEmail` - This release adds support for using the Amazon Pinpoint Email API to tag the following types of Amazon Pinpoint resources: configuration sets; dedicated IP pools; deliverability dashboard reports; and, email identities. A tag is a label that you optionally define and associate with these types of resources. Tags can help you categorize and manage these resources in different ways, such as by purpose, owner, environment, or other criteria. A resource can have as many as 50 tags. For more information, see the Amazon Pinpoint Email API Reference.
* `Aws\ServiceCatalog` - Adds "Tags" field in UpdateProvisionedProduct API. The product should have a new RESOURCE_UPDATE Constraint with TagUpdateOnProvisionedProduct field set to ALLOWED for it to work. See API docs for CreateConstraint for more information
* `Aws\WorkSpaces` - Amazon WorkSpaces adds tagging support for WorkSpaces Images, WorkSpaces directories, WorkSpaces bundles and IP Access control groups.

## 3.90.11 - 2019-03-27

* `Aws\AppMesh` - This release includes AWS Tagging integration for App Mesh, VirtualNode access logging, TCP routing, and Mesh-wide external traffic egress control. See https://docs.aws.amazon.com/app-mesh/latest/APIReference/Welcome.html for more details.
* `Aws\EC2` - You can now launch the new Amazon EC2 R5ad and M5ad instances that feature local NVMe attached SSD instance storage (up to 3600 GB). M5ad and R5ad feature AMD EPYC processors that offer a 10% cost savings over the M5d and R5d EC2 instances.
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for external deployment controllers for ECS services with the launch of task set management APIs. Task sets are a new primitive for controlled management of application deployments within a single ECS service.
* `Aws\ElasticLoadBalancingv2` - This release adds support for routing based on HTTP headers, methods, query string or query parameters and source IP addresses in Application Load Balancer.
* `Aws\S3` - S3 Glacier Deep Archive provides secure, durable object storage class for long term data archival. This SDK release provides API support for this new storage class.
* `Aws\StorageGateway` - This change allows you to select a pool for archiving virtual tapes. Pools are associated with S3 storage classes. You can now choose to archive virtual tapes in either S3 Glacier or S3 Glacier Deep Archive storage class. CreateTapes API now takes a new PoolId parameter which can either be GLACIER or DEEP_ARCHIVE. Tapes created with this parameter will be archived in the corresponding storage class.
* `Aws\Transfer` -  This release adds PrivateLink support to your AWS SFTP server endpoint, enabling the customer to access their SFTP server within a VPC, without having to traverse the internet. Customers can now can create a server and specify an option whether they want the endpoint to be hosted as public or in their VPC, and with the in VPC option, SFTP clients and users can access the server only from the customer's VPC or from their on-premises environments using DX or VPN. This release also relaxes the SFTP user name requirements to allow underscores and hyphens.

## 3.90.10 - 2019-03-26

* `Aws\Glue` - This new feature will now allow customers to add a customized csv classifier with classifier API. They can specify a custom delimiter, quote symbol and control other behavior they'd like crawlers to have while recognizing csv files
* `Aws\WorkMail` - Documentation updates for Amazon WorkMail.

## 3.90.9 - 2019-03-25

* `Aws\DirectConnect` - Direct Connect gateway enables you to establish connectivity between your on-premise networks and Amazon Virtual Private Clouds (VPCs) in any commercial AWS Region (except in China) using AWS Direct Connect connections at any AWS Direct Connect location. This release enables multi-account support for Direct Connect gateway, with multi-account support for Direct Connect gateway, you can associate up to ten VPCs from any AWS account with a Direct Connect gateway. The AWS accounts owning VPCs and the Direct Connect gateway must belong to the same AWS payer account ID. This release also enables Direct Connect Gateway owners to allocate allowed prefixes from each associated VPCs.
* `Aws\FMS` - AWS Firewall Manager now allows customer to centrally enable AWS Shield Advanced DDoS protection for their entire AWS infrastructure, across accounts and applications.
* `Aws\IoT1ClickDevicesService` - This release adds tagging support for AWS IoT 1-Click Device resources. Use these APIs to add, remove, or list tags on Devices, and leverage the tags for various authorization and billing scenarios. This release also adds the ARN property for DescribeDevice response object.
* `Aws\IoTAnalytics` - This change allows you to specify the number of versions of IoT Analytics data set content to be retained. Previously, the number of versions was managed implicitly via the setting of the data set's retention period.
* `Aws\MediaConvert` - This release adds support for detailed job progress status and S3 server-side output encryption. In addition, the anti-alias filter will now be automatically applied to all outputs
* `Aws\RoboMaker` - Added additional progress metadata fields for robot deployments
* `Aws\TranscribeService` - Amazon Transcribe - With this release Amazon Transcribe enhances the custom vocabulary feature to improve accuracy by providing customization on pronunciations and output formatting. 

## 3.90.8 - 2019-03-22

* `Aws\IoT1ClickProjects` - This release adds tagging support for AWS IoT 1-Click Project resources. Use these APIs to add, remove, or list tags on Projects, and leverage the tags for various authorization and billing scenarios. This release also adds the ARN property to projects for DescribeProject and ListProject responses.
* `Aws\TranscribeService` - Amazon Transcribe - support transcriptions from audio sources in German (de-DE) and Korean (ko-KR).

## 3.90.7 - 2019-03-21

* `Aws\AutoScaling` - Documentation updates for Amazon EC2 Auto Scaling
* `Aws\CloudWatchEvents` - Added 3 new APIs, and one additional parameter to the PutRule API, to support tagging of CloudWatch Events rules.
* `Aws\CognitoIdentityProvider` - This release adds tags and tag-based access control support to Amazon Cognito User Pools.
* `Aws\IoT` - This release adds the GetStatistics API for the AWS IoT Fleet Indexing Service, which allows customers to query for statistics about registered devices that match a search query. This release only supports the count statistics. For more information about this API, see https://docs.aws.amazon.com/iot/latest/apireference/API_GetStatistics.html
* `Aws\Lightsail` - This release adds the DeleteKnownHostKeys API, which enables Lightsail's browser-based SSH or RDP clients to connect to the instance after a host key mismatch.

## 3.90.6 - 2019-03-20

* `Aws\CodePipeline` - Add support for viewing details of each action execution belonging to past and latest pipeline executions that have occurred in customer's pipeline. The details include start/updated times, action execution results, input/output artifacts information, etc. Customers also have the option to add pipelineExecutionId in the input to filter the results down to a single pipeline execution.
* `Aws\CognitoIdentity` - This release adds tags and tag-based access control support to Amazon Cognito Identity Pools (Federated Identities). 
* `Aws\MarketplaceMetering` - This release increases AWS Marketplace Metering Service maximum usage quantity to 2147483647 and makes parameters usage quantity and dryrun optional.

## 3.90.5 - 2019-03-19

* `Aws\ConfigService` - AWS Config adds a new API called SelectResourceConfig to run advanced queries based on resource configuration properties.
* `Aws\EKS` - Added support to control private/public access to the Kubernetes API-server endpoint

## 3.90.4 - 2019-03-18

* `Aws\Chime` - This release adds support for the Amazon Chime Business Calling and Voice Connector features.
* `Aws\DatabaseMigrationService` - S3 Endpoint Settings added support for 1) Migrating to Amazon S3 as a target in Parquet format 2) Encrypting S3 objects after migration with custom KMS Server-Side encryption. Redshift Endpoint Settings added support for encrypting intermediate S3 objects during migration with custom KMS Server-Side encryption. 
* `Aws\EC2` - DescribeFpgaImages API now returns a new DataRetentionSupport attribute to indicate if the AFI meets the requirements to support DRAM data retention. DataRetentionSupport is a read-only attribute.

## 3.90.3 - 2019-03-14

* `Aws\ACM` - AWS Certificate Manager has added a new API action, RenewCertificate. RenewCertificate causes ACM to force the renewal of any private certificate which has been exported.
* `Aws\ACMPCA` - AWS Certificate Manager (ACM) Private CA allows customers to manage permissions on their CAs. Customers can grant or deny AWS Certificate Manager permission to renew exported private certificates.
* `Aws\CloudWatch` - New Messages parameter for the output of GetMetricData, to support new metric search functionality.
* `Aws\ConfigService` - AWS Config - add ability to tag, untag and list tags for ConfigRule, ConfigurationAggregator and AggregationAuthorization resource types. Tags can be used for various scenarios including tag based authorization.
* `Aws\EC2` - This release adds tagging support for Dedicated Host Reservations.
* `Aws\IoT` - In this release, AWS IoT introduces support for tagging OTA Update and Stream resources. For more information about tagging, see the AWS IoT Developer Guide.
* `Aws\SageMaker` - Amazon SageMaker Automatic Model Tuning now supports random search and hyperparameter scaling.

## 3.90.2 - 2019-03-13

* `Aws\CloudWatchLogs` - Documentation updates for logs
* `Aws\ConfigService` - Config released Remediation APIs allowing Remediation of Config Rules

## 3.90.1 - 2019-03-12

* `Aws\ServerlessApplicationRepository` - The AWS Serverless Application Repository now supports associating a ZIP source code archive with versions of an application.

## 3.90.0 - 2019-03-11

* `Aws\` - Adds ability to clone existing Sdk instance with extra arguments.
* `Aws\CostExplorer` - The only change in this release is to make TimePeriod a required parameter in GetCostAndUsageRequest.
* `Aws\ElasticBeanstalk` - Elastic Beanstalk added support for tagging, and tag-based access control, of all Elastic Beanstalk resources.
* `Aws\Glue` - CreateDevEndpoint and UpdateDevEndpoint now support Arguments to configure the DevEndpoint. 
* `Aws\IoT` - Documentation updates for iot
* `Aws\QuickSight` - Amazon QuickSight user and group operation results now include group principal IDs and user principal IDs. This release also adds "DeleteUserByPrincipalId", which deletes users given their principal ID. The update also improves role session name validation.
* `Aws\Rekognition` - Documentation updates for Amazon Rekognition

## 3.89.1 - 2019-03-08

* `Aws\CodeBuild` - CodeBuild also now supports Git Submodules. CodeBuild now supports opting out of Encryption for S3 Build Logs. By default these logs are encrypted.
* `Aws\S3` - Documentation updates for s3
* `Aws\SageMaker` - SageMaker notebook instances now support enabling or disabling root access for notebook users. SageMaker Neo now supports rk3399 and rk3288 as compilation target devices.

## 3.89.0 - 2019-03-07

* `Aws\AppMesh` - This release includes a new version of the AWS App Mesh APIs. You can read more about the new APIs here: https://docs.aws.amazon.com/app-mesh/latest/APIReference/Welcome.html.
* `Aws\AutoScaling` - Documentation updates for autoscaling
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces additional task definition parameters that enable you to define dependencies for container startup and shutdown, a per-container start and stop timeout value, as well as an AWS App Mesh proxy configuration which eases the integration between Amazon ECS and AWS App Mesh.
* `Aws\GameLift` - Amazon GameLift-hosted instances can now securely access resources on other AWS services using IAM roles. See more details at https://aws.amazon.com/releasenotes/amazon-gamelift/.
* `Aws\Greengrass` - Greengrass group UID and GID settings can now be configured to use a provided default via FunctionDefaultConfig. If configured, all Lambda processes in your deployed Greengrass group will by default start with the provided UID and/or GID, rather than by default starting with UID "ggc_user" and GID "ggc_group" as they would if not configured. Individual Lambdas can also be configured to override the defaults if desired via each object in the Functions list of your FunctionDefinitionVersion.
* `Aws\MediaLive` - This release adds a MediaPackage output group, simplifying configuration of outputs to AWS Elemental MediaPackage.
* `Aws\RDS` - You can configure your Aurora database cluster to automatically copy tags on the cluster to any automated or manual database cluster snapshots that are created from the cluster. This allows you to easily set metadata on your snapshots to match the parent cluster, including access policies. You may enable or disable this functionality while creating a new cluster, or by modifying an existing database cluster.
* `Aws\S3` - Updates the S3 stream wrapper to be able to write empty files for PHP 7+.

## 3.88.1 - 2019-03-06

* `Aws\DirectConnect` - Exposed a new available port speeds field in the DescribeLocation api call.
* `Aws\EC2` - This release adds pagination support for ec2.DescribeVpcs, ec2.DescribeInternetGateways and ec2.DescribeNetworkAcls APIs
* `Aws\EFS` - Documentation updates for elasticfilesystem adding new examples for EFS Lifecycle Management feature.

## 3.88.0 - 2019-03-05

* `Aws\CodeDeploy` - Documentation updates for codedeploy
* `Aws\MediaLive` - This release adds support for pausing and unpausing one or both pipelines at scheduled times.
* `Aws\StorageGateway` - ActivateGateway, CreateNFSFileShare and CreateSMBFileShare APIs support a new parameter: Tags (to be attached to the created resource). Output for DescribeNFSFileShare, DescribeSMBFileShare and DescribeGatewayInformation APIs now also list the Tags associated with the resource. Minimum length of a KMSKey is now 7 characters.
* `Aws\Test` - Refactor client iterator tests to use mocked model data.
* `Aws\Textract` - This release is intended ONLY for customers that are officially part of the Amazon Textract Preview program. If you are not officially part of the Amazon Textract program THIS WILL NOT WORK. Our two main regions for Amazon Textract Preview are N. Virginia and Dublin. Also some members have been added to Oregon and Ohio. If you are outside of any of these AWS regions, Amazon Textract Preview definitely will not work. If you would like to be part of the Amazon Textract program, you can officially request sign up here - https://pages.awscloud.com/textract-preview.html. To set expectations appropriately, we are aiming to admit new preview participants once a week until General Availability.

## 3.87.23 - 2019-03-04

* `Aws\MediaPackage` - This release adds support for user-defined tagging of MediaPackage resources. Users may now call operations to list, add and remove tags from channels and origin-endpoints. Users can also specify tags to be attached to these resources during their creation. Describe and list operations on these resources will now additionally return any tags associated with them.
* `Aws\SSM` - This release updates AWS Systems Manager APIs to support service settings for AWS customers. A service setting is a key-value pair that defines how a user interacts with or uses an AWS service, and is typically created and consumed by the AWS service team. AWS customers can read a service setting via GetServiceSetting API and update the setting via UpdateServiceSetting API or ResetServiceSetting API, which are introduced in this release. For example, if an AWS service charges money to the account based on a feature or service usage, then the AWS service team might create a setting with the default value of "false". This means the user can't use this feature unless they update the setting to "true" and intentionally opt in for a paid feature.

## 3.87.22 - 2019-03-01

* `Aws\AutoScalingPlans` - Documentation updates for autoscaling-plans
* `Aws\EC2` - This release adds support for modifying instance event start time which allows users to reschedule EC2 events.

## 3.87.21 - 2019-02-28

* `Aws\AlexaForBusiness` - This release adds the PutInvitationConfiguration API to configure the user invitation email template with custom attributes, and the GetInvitationConfiguration API to retrieve the configured values.
* `Aws\ApiGatewayV2` - Marking certain properties as explicitly required and fixing an issue with the GetApiMappings operation for ApiMapping resources.
* `Aws\ApplicationAutoScaling` - Documentation updates for application-autoscaling
* `Aws\SSM` - AWS Systems Manager State Manager now supports associations using documents shared by other AWS accounts.

## 3.87.20 - 2019-02-27

* `Aws\WAF` - Documentation updates for waf
* `Aws\WAFRegional` - Documentation updates for waf-regional

## 3.87.19 - 2019-02-26

* `Aws\ApplicationDiscoveryService` - Documentation updates for discovery
* `Aws\CostandUsageReportService` - Adding support for Athena and new report preferences to the Cost and Usage Report API.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added several features including support for: auto-rotation or user-specified rotation of 0, 90, 180, or 270 degrees; multiple output groups with DRM; ESAM XML documents to specify ad insertion points; Offline Apple HLS FairPlay content protection. 
* `Aws\OpsWorksCM` - Documentation updates for opsworkscm
* `Aws\Organizations` - Documentation updates for AWS Organizations
* `Aws\Pinpoint` - This release adds support for the Amazon Resource Groups Tagging API to Amazon Pinpoint, which means that you can now add and manage tags for Amazon Pinpoint projects (apps), campaigns, and segments. A tag is a label that you optionally define and associate with Amazon Pinpoint resource. Tags can help you categorize and manage these types of resources in different ways, such as by purpose, owner, environment, or other criteria. For example, you can use tags to apply policies or automation, or to identify resources that are subject to certain compliance requirements. A project, campaign, or segment can have as many as 50 tags. For more information about using and managing tags in Amazon Pinpoint, see the Amazon Pinpoint Developer Guide at https://docs.aws.amazon.com/pinpoint/latest/developerguide/welcome.html. For more information about the Amazon Resource Group Tagging API, see the Amazon Resource Group Tagging API Reference at https://docs.aws.amazon.com/resourcegroupstagging/latest/APIReference/Welcome.html.
* `Aws\ResourceGroups` - Documentation updates for Resource Groups API; updating description of Tag API.

## 3.87.18 - 2019-02-25

* `Aws\Api` - Fixes validation on assoc arrays having a 0 index.
* `Aws\AutoScaling` - Added support for passing an empty SpotMaxPrice parameter to remove a value previously set when updating an Amazon EC2 Auto Scaling group.
* `Aws\CostExplorer` - Added metrics to normalized units.
* `Aws\ElasticLoadBalancingv2` - This release enables you to use the existing client secret when modifying a rule with an action of type authenticate-oidc.
* `Aws\MediaStore` - This release adds support for access logging, which provides detailed records for the requests that are made to objects in a container.

## 3.87.17 - 2019-02-22

* `Aws\Athena` - This release adds tagging support for Workgroups to Amazon Athena. Use these APIs to add, remove, or list tags on Workgroups, and leverage the tags for various authorization and billing scenarios.
* `Aws\Cloud9` - Adding EnvironmentLifecycle to the Environment data type.
* `Aws\Glue` - AWS Glue adds support for assigning AWS resource tags to jobs, triggers, development endpoints, and crawlers. Each tag consists of a key and an optional value, both of which you define. With this capacity, customers can use tags in AWS Glue to easily organize and identify your resources, create cost allocation reports, and control access to resources. 
* `Aws\SFN` - This release adds support for tag-on-create. You can now add tags when you create AWS Step Functions activity and state machine resources. For more information about tagging, see AWS Tagging Strategies.

## 3.87.16 - 2019-02-21

* `Aws\CloudWatch` - Documentation updates for monitoring
* `Aws\CodeBuild` - Add support for CodeBuild local caching feature
* `Aws\KinesisVideo` - Documentation updates for Kinesis Video Streams
* `Aws\KinesisVideoArchivedMedia` - In this release, HLS playback of KVS streams can be configured to output MPEG TS fragments using the ContainerFormat parameter. HLS playback of KVS streams can also be configured to include the EXT-X-PROGRAM-DATE-TIME field using the DisplayFragmentTimestamp parameter.
* `Aws\KinesisVideoMedia` - Documentation updates for Kinesis Video Streams
* `Aws\Organizations` - Documentation updates for organizations
* `Aws\Transfer` - Bug fix: increased the max length allowed for request parameter NextToken when paginating List operations
* `Aws\WorkDocs` - Documentation updates for workdocs

## 3.87.15 - 2019-02-20

* `Aws\CodeCommit` - This release adds an API for adding / updating / deleting / copying / moving / setting file modes for one or more files directly to an AWS CodeCommit repository without requiring a Git client.
* `Aws\DirectConnect` - Documentation updates for AWS Direct Connect
* `Aws\MediaLive` - This release adds support for VPC inputs, allowing you to push content from your Amazon VPC directly to MediaLive.

## 3.87.14 - 2019-02-19

* `Aws\DirectoryService` - This release adds support for tags during directory creation (CreateDirectory, CreateMicrosoftAd, ConnectDirectory).
* `Aws\EFS` - Amazon EFS now supports adding tags to file system resources as part of the CreateFileSystem API . Using this capability, customers can now more easily enforce tag-based authorization for EFS file system resources.
* `Aws\IoT` - AWS IoT - AWS IoT Device Defender adds support for configuring behaviors in a security profile with statistical thresholds. Device Defender also adds support for configuring multiple data-point evaluations before a violation is either created or cleared.
* `Aws\SSM` - AWS Systems Manager now supports adding tags when creating Activations, Patch Baselines, Documents, Parameters, and Maintenance Windows

## 3.87.13 - 2019-02-18

* `Aws\Athena` - This release adds support for Workgroups to Amazon Athena. Use Workgroups to isolate users, teams, applications or workloads in the same account, control costs by setting up query limits and creating Amazon SNS alarms, and publish query-related metrics to Amazon CloudWatch. 
* `Aws\SecretsManager` - This release increases the maximum allowed size of SecretString or SecretBinary from 4KB to 7KB in the CreateSecret, UpdateSecret, PutSecretValue and GetSecretValue APIs.

## 3.87.12 - 2019-02-15

* `Aws\ApplicationAutoScaling` - Documentation updates for Application Auto Scaling
* `Aws\Chime` - Documentation updates for Amazon Chime
* `Aws\IoT` - In this release, IoT Device Defender introduces support for tagging Scheduled Audit resources.

## 3.87.11 - 2019-02-14

* `Aws\EC2` - This release adds tagging and ARN support for AWS Client VPN Endpoints.You can now run bare metal workloads on EC2 M5 and M5d instances. m5.metal and m5d.metal instances are powered by custom Intel Xeon Scalable Processors with a sustained all core frequency of up to 3.1 GHz. m5.metal and m5d.metal offer 96 vCPUs and 384 GiB of memory. With m5d.metal, you also have access to 3.6 TB of NVMe SSD-backed instance storage. m5.metal and m5d.metal instances deliver 25 Gbps of aggregate network bandwidth using Elastic Network Adapter (ENA)-based Enhanced Networking, as well as 14 Gbps of bandwidth to EBS.You can now run bare metal workloads on EC2 z1d instances. z1d.metal instances are powered by custom Intel Xeon Scalable Processors with a sustained all core frequency of up to 4.0 GHz. z1d.metal offers 48 vCPUs, 384 GiB of memory, and 1.8 TB of NVMe SSD-backed instance storage. z1d.metal instances deliver 25 Gbps of aggregate network bandwidth using Elastic Network Adapter (ENA)-based Enhanced Networking, as well as 14 Gbps of bandwidth to EBS.
* `Aws\KinesisVideo` - Adds support for Tag-On-Create for Kinesis Video Streams. A list of tags associated with the stream can be created at the same time as the stream creation.

## 3.87.10 - 2019-02-13

* `Aws\EFS` - Customers can now use the EFS Infrequent Access (IA) storage class to more cost-effectively store larger amounts of data in their file systems. EFS IA is cost-optimized storage for files that are not accessed every day. You can create a new file system and enable Lifecycle Management to automatically move files that have not been accessed for 30 days from the Standard storage class to the IA storage class.
* `Aws\MediaTailor` - This release adds support for tagging AWS Elemental MediaTailor resources.
* `Aws\Rekognition` - GetContentModeration now returns the version of the moderation detection model used to detect unsafe content.

## 3.87.9 - 2019-02-12

* `Aws\Lambda` - Documentation updates for AWS Lambda

## 3.87.8 - 2019-02-11

* `Aws\AppStream` - This update enables customers to find the start time, max expiration time, and connection status associated with AppStream streaming session.
* `Aws\CodeBuild` - Add customized webhook filter support
* `Aws\MediaPackage` - Adds optional configuration for DASH to compact the manifest by combining duplicate SegmentTemplate tags. Adds optional configuration for DASH SegmentTemplate format to refer to segments by "Number" (default) or by "Time".

## 3.87.7 - 2019-02-08

* `Aws\ApplicationDiscoveryService` - Documentation updates for the AWS Application Discovery Service.
* `Aws\DLM` - This release is to correct the timestamp format to ISO8601 for the DateCreated and DateModified files in the GetLifecyclePolicy response object.
* `Aws\ECS` - Amazon ECS introduces the PutAccountSettingDefault API, an API that allows a user to set the default ARN/ID format opt-in status for all the roles and users in the account. Previously, setting the account's default opt-in status required the use of the root user with the PutAccountSetting API.

## 3.87.6 - 2019-02-07

* `Aws\ElasticsearchService` - Feature: Support for three Availability Zone deployments
* `Aws\GameLift` - This release delivers a new API action for deleting unused matchmaking rule sets. More details are available at https://aws.amazon.com/releasenotes/?tag=releasenotes%23keywords%23amazon-gamelift.
* `Aws\MediaLive` - This release adds tagging of channels, inputs, and input security groups.
* `Aws\RoboMaker` - Added support for tagging and tag-based access control for AWS RoboMaker resources. Also, DescribeSimulationJob now includes a new failureReason field to help debug simulation job failures

## 3.87.5 - 2019-02-06

* `Aws\EC2` - Add Linux with SQL Server Standard, Linux with SQL Server Web, and Linux with SQL Server Enterprise to the list of allowed instance platforms for On-Demand Capacity Reservations.
* `Aws\FSx` - New optional ExportPath parameter added to the CreateFileSystemLustreConfiguration object for user-defined export paths. Used with the CreateFileSystem action when creating an Amazon FSx for Lustre file system.

## 3.87.4 - 2019-02-05

* `Aws\Aws` - Remove requirement of the always available SPL extension in composer.json.
* `Aws\Credentials` - This update adds the default SDK user agent to requests made to the instance metadata service.
* `Aws\EC2` - ec2.DescribeVpcPeeringConnections pagination support
* `Aws\ServiceCatalog` - Service Catalog Documentation Update for ProvisionedProductDetail
* `Aws\Shield` - The DescribeProtection request now accepts resource ARN as valid parameter.

## 3.87.3 - 2019-02-04

* `Aws\ApplicationAutoScaling` - Documentation updates for application-autoscaling
* `Aws\CodeCommit` - This release supports a more graceful handling of the error case when a repository is not associated with a pull request ID in a merge request in AWS CodeCommit.
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for GPU workloads by enabling you to create clusters with GPU-enabled container instances.
* `Aws\WorkSpaces` - This release sets ClientProperties as a required parameter.

## 3.87.2 - 2019-01-25

* `Aws\CodeCommit` - The PutFile API will now throw new exception FilePathConflictsWithSubmodulePathException when a submodule exists at the input file path; PutFile API will also throw FolderContentSizeLimitExceededException when the total size of any folder on the path exceeds the limit as a result of the operation.
* `Aws\DeviceFarm` - Introduces a new rule in Device Pools - "Availability". Customers can now ensure they pick devices that are available (i.e., not being used by other customers).
* `Aws\MediaConnect` - This release adds support for tagging, untagging, and listing tags for existing AWS Elemental MediaConnect resources.
* `Aws\MediaLive` - This release adds support for Frame Capture output groups and for I-frame only manifests (playlists) in HLS output groups.

## 3.87.1 - 2019-01-24

* `Aws\CloudWatchLogs` - Documentation updates for CloudWatch Logs
* `Aws\CodeBuild` - This release adds support for cross-account ECR images and private registry authentication. 
* `Aws\ECR` - Amazon ECR updated the default endpoint URL to support AWS Private Link.
* `Aws\ElasticLoadBalancingv2` - Elastic Load Balancing now supports TLS termination on Network Load Balancers. With this launch, you can offload the decryption/encryption of TLS traffic from your application servers to the Network Load Balancer. This enables you to run your backend servers optimally and keep your workloads secure. Additionally, Network Load Balancers preserve the source IP of the clients to the back-end applications, while terminating TLS on the load balancer. When TLS is enabled on an NLB, Access Logs can be enabled for the load balancer, and log entries will be emitted for all TLS connections.
* `Aws\PinpointSMSVoice` - Added the ListConfigurationSets operation, which returns a list of the configuration sets that are associated with your account.
* `Aws\RDS` - The Amazon RDS API allows you to add or remove Identity and Access Management (IAM) role associated with a specific feature name with an RDS database instance. This helps with capabilities such as invoking Lambda functions from within a trigger in the database, load data from Amazon S3 and so on

## 3.87.0 - 2019-01-23

* `Aws\ACMPCA` - Added TagOnCreate parameter to the CreateCertificateAuthority operation, updated the Tag regex pattern to align with AWS tagging APIs, and added RevokeCertificate limit.
* `Aws\ApiGatewayManagementApi` - Fixes a typo in the 'max' constraint.
* `Aws\WorkLink` - This is the initial SDK release for Amazon WorkLink. Amazon WorkLink is a fully managed, cloud-based service that enables secure, one-click access to internal websites and web apps from mobile phones. With Amazon WorkLink, employees can access internal websites as seamlessly as they access any other website. IT administrators can manage users, devices, and domains by enforcing their own security and access policies via the AWS Console or the AWS SDK.

## 3.86.3 - 2019-01-21

* `Aws\AppStream` - This API update includes support for tagging Stack, Fleet, and ImageBuilder resources at creation time.
* `Aws\ApplicationDiscoveryService` - The Application Discovery Service's import APIs allow you to import information about your on-premises servers and applications into ADS so that you can track the status of your migrations through the Migration Hub console.
* `Aws\DatabaseMigrationService` - Update for DMS TestConnectionSucceeds waiter
* `Aws\FMS` - This release provides support for cleaning up web ACLs during Firewall Management policy deletion. You can now enable the DeleteAllPolicyResources flag and it will delete all system-generated web ACLs.
* `Aws\SSM` - AWS Systems Manager State Manager now supports configuration management of all AWS resources through integration with Automation. 

## 3.86.2 - 2019-01-18

* `Aws\EC2` - Adjust EC2's available instance types.
* `Aws\Glue` - AllocatedCapacity field is being deprecated and replaced with MaxCapacity field

## 3.86.1 - 2019-01-17

* `Aws\Lambda` - Documentation updates for AWS Lambda
* `Aws\Lightsail` - This release adds functionality to the CreateDiskSnapshot API that allows users to snapshot instance root volumes. It also adds various documentation updates.
* `Aws\Pinpoint` - This release updates the PutEvents operation. AppPackageName, AppTitle, AppVersionCode, SdkName fields will now be accepted as a part of the event when submitting events.
* `Aws\Rekognition` - GetLabelDetection now returns bounding box information for common objects and a hierarchical taxonomy of detected labels. The version of the model used for video label detection is also returned. DetectModerationLabels now returns the version of the model used for detecting unsafe content.

## 3.86.0 - 2019-01-16

* `Aws\Backup` - AWS Backup is a unified backup service designed to protect AWS services and their associated data. AWS Backup simplifies the creation, migration, restoration, and deletion of backups, while also providing reporting and auditing
* `Aws\CostExplorer` - Removed Tags from the list of GroupBy dimensions available for GetReservationCoverage.
* `Aws\DynamoDB` - Amazon DynamoDB now integrates with AWS Backup, a centralized backup service that makes it easy for customers to configure and audit the AWS resources they want to backup, automate backup scheduling, set retention policies, and monitor all recent backup and restore activity. AWS Backup provides a fully managed, policy-based backup solution, simplifying your backup management, and helping you meet your business and regulatory backup compliance requirements. For more information, see the Amazon DynamoDB Developer Guide.

## 3.85.2 - 2019-01-14

* `Aws\MediaConvert` - IMF decode from a Composition Playlist for IMF specializations App #2 and App #2e; up to 99 input clippings; caption channel selection for MXF; and updated rate control for CBR jobs. Added support for acceleration in preview
* `Aws\StorageGateway` - JoinDomain API supports two more parameters: organizational unit(OU) and domain controllers. Two new APIs are introduced: DetachVolume and AttachVolume.

## 3.85.1 - 2019-01-11

* `Aws\EMR` - Documentation updates for Amazon EMR
* `Aws\RDSDataService` - Documentation updates for RDS Data API.

## 3.85.0 - 2019-01-10

* `Aws\CodeDeploy` - Documentation updates for codedeploy
* `Aws\EC2` - EC2 Spot: a) CreateFleet support for Single AvailabilityZone requests and b) support for paginated DescribeSpotInstanceRequests.
* `Aws\EndpointDiscovery` - This feature adds SDK support for discovering the correct endpoint for a customer by making requests against a service-provided API, for operations specified by the service.
* `Aws\IoT` - This release adds tagging support for rules of AWS IoT Rules Engine. Tags enable you to categorize your rules in different ways, for example, by purpose, owner, or environment. For more information about tagging, see AWS Tagging Strategies (https://aws.amazon.com/answers/account-management/aws-tagging-strategies/). For technical documentation, look for the tagging operations in the AWS IoT Core API reference or User Guide (https://docs.aws.amazon.com/iot/latest/developerguide/tagging-iot.html).
* `Aws\SageMaker` - SageMaker Training Jobs now support Inter-Container traffic encryption.

## 3.84.0 - 2019-01-09

* `Aws\Credentials` - Fixes a failure loop if InstanceProfileProvider fails.
* `Aws\DocDB` - Amazon DocumentDB (with MongoDB compatibility) is a fast, reliable, and fully-managed database service. Amazon DocumentDB makes it easy for developers to set up, run, and scale MongoDB-compatible databases in the cloud.
* `Aws\Redshift` - DescribeSnapshotSchedules returns a list of snapshot schedules. With this release, this API will have a list of clusters and number of clusters associated with the schedule.

## 3.83.0 - 2019-01-07

* `Aws\AppMesh` - AWS App Mesh now supports active health checks. You can specify TCP or HTTP health checks with custom thresholds and intervals on your VirtualNode definitions. See the AWS App Mesh HealthCheckPolicy documentation for more information.
* `Aws\ClientSideMonitoring` - Adds User-Agent and final API call attempt entries to API call event.

## 3.82.6 - 2019-01-04

* `Aws\DeviceFarm` - "This release provides support for running Appium Node.js and Appium Ruby tests on AWS Device Farm.
* `Aws\ECS` - Documentation updates for Amazon ECS tagging feature.

## 3.82.5 - 2019-01-03

* `Aws\IoTAnalytics` - ListDatasetContents now has a filter to limit results by date scheduled.

## 3.82.4 - 2019-01-03

* `Aws\OpsWorksCM` - Documentation updates for opsworkscm

## 3.82.3 - 2018-12-21

* `Aws\ACMPCA` - This release marks the introduction of waiters in ACM PCA, which allow you to control the progression of your code based on the presence or state of certain resources. Waiters can be implemented in the DescribeCertificateAuthorityAuditReport, GetCertificate, and GetCertificateAuthorityCsr API operations.
* `Aws\DynamoDB` - Added provisionedThroughPut exception on the request level for transaction APIs.
* `Aws\PinpointSMSVoice` - Configuration sets can now use Amazon SNS as an event destination.
* `Aws\SFN` - This release adds support for cost allocation tagging. You can now create, delete, and list tags for AWS Step Functions activity and state machine resources. For more information about tagging, see AWS Tagging Strategies.

## 3.82.2 - 2018-12-20

* `Aws\CognitoIdentityProvider` - Amazon Cognito now has API support for updating the Secure Sockets Layer (SSL) certificate for the custom domain for your user pool.
* `Aws\Comprehend` - This SDK release adds functionality to stop training Custom Document Classifier or Custom Entity Recognizer in Amazon Comprehend.
* `Aws\Firehose` - Support for specifying customized s3 keys and supplying a separate prefix for failed-records
* `Aws\MediaLive` - This release provides support for ID3 tags and video quality setting for subgop_length.
* `Aws\TranscribeService` - With this release, Amazon Transcribe now supports transcriptions from audio sources in Italian (it-IT).

## 3.82.1 - 2018-12-19

* `Aws\EC2` - This release adds support for specifying partition as a strategy for EC2 Placement Groups. This new strategy allows one to launch instances into partitions that do not share certain underlying hardware between partitions, to assist with building and deploying highly available replicated applications. 
* `Aws\SageMaker` - Batch Transform Jobs now supports TFRecord as a Split Type. ListCompilationJobs API action now supports SortOrder and SortBy inputs.
* `Aws\WAF` - This release adds rule-level control for rule group. If a rule group contains a rule that blocks legitimate traffic, previously you had to override the entire rule group to COUNT in order to allow the traffic. You can now use the UpdateWebACL API to exclude specific rules within a rule group. Excluding rules changes the action for the individual rules to COUNT. Excluded rules will be recorded in the new "excludedRules" attribute of the WAF logs.
* `Aws\WAFRegional` - This release adds rule-level control for rule group. If a rule group contains a rule that blocks legitimate traffic, previously you had to override the entire rule group to COUNT in order to allow the traffic. You can now use the UpdateWebACL API to exclude specific rules within a rule group. Excluding rules changes the action for the individual rules to COUNT. Excluded rules will be recorded in the new "excludedRules" attribute of the WAF logs.

## 3.82.0 - 2018-12-18

* `Aws\ApiGatewayManagementApi` - This is the initial SDK release for the Amazon API Gateway Management API, which allows you to directly manage runtime aspects of your APIs. This release makes it easy to send data directly to clients connected to your WebSocket-based APIs.
* `Aws\ApiGatewayV2` - This is the initial SDK release for the Amazon API Gateway v2 APIs. This SDK will allow you to manage and configure APIs in Amazon API Gateway; this first release provides the capabilities that allow you to programmatically setup and manage WebSocket APIs end to end. 
* `Aws\EC2` - Client VPN, is a client-based VPN service. With Client VPN, you can securely access resources in AWS as well as access resources in on-premises from any location using OpenVPN based devices. With Client VPN, you can set network based firewall rules that can restrict access to networks based on Active Directory groups.
* `Aws\ElasticBeanstalk` - This release adds a new resource that Elastic Beanstalk will soon support, EC2 launch template, to environment resource descriptions.
* `Aws\GlobalAccelerator` - Documentation updates for Ubiquity

## 3.81.7 - 2018-12-17

* `Aws\ECR` - This release adds support for ECR repository tagging.
* `Aws\QuickSight` - Amazon QuickSight's RegisterUser API now generates a user invitation URL when registering a user with the QuickSight identity type. This URL can then be used by the registered QuickSight user to complete the user registration process. This release also corrects some HTTP return status codes.

## 3.81.6 - 2018-12-14

* `Aws\AlexaForBusiness` - Released new APIs for managing private skill access to Enrolled Users. These API's are the equivalent of the A4B console for Private Skills checkbox "Available for Users".
* `Aws\CloudFormation` - Documentation updates for cloudformation
* `Aws\Redshift` - Documentation updates for Amazon Redshift

## 3.81.5 - 2018-12-13

* `Aws\Organizations` - Documentation updates for AWS Organizations
* `Aws\PinpointEmail` - This release adds new operations for the Amazon Pinpoint Deliverability Dashboard. You can use the Deliverability Dashboard to view response and inbox placement metrics for the domains that you use to send email. You can also perform tests on individual email messages to determine how often your messages are delivered to the inbox on several major email providers.

## 3.81.4 - 2018-12-12

* `Aws\EKS` - Added support for updating kubernetes version of Amazon EKS clusters.
* `Aws\Glue` - API Update for Glue: this update enables encryption of password inside connection objects stored in AWS Glue Data Catalog using DataCatalogEncryptionSettings. In addition, a new "HidePassword" flag is added to GetConnection and GetConnections to return connections without passwords.
* `Aws\Route53` - You can now specify a new region, eu-north-1 (in Stockholm, Sweden), as a region for latency-based or geoproximity routing.
* `Aws\SageMaker` - Amazon SageMaker Automatic Model Tuning now supports early stopping of training jobs. With early stopping, training jobs that are unlikely to generate good models will be automatically stopped during a Hyperparameter Tuning Job.

## 3.81.3 - 2018-12-11

* `Aws\Connect` - This update adds the GetContactAttributes operation to retrieve the attributes associated with a contact.
* `Aws\ECS` - Documentation updates for Amazon ECS.
* `Aws\MediaStore` - This release adds Delete Object Lifecycling to AWS MediaStore Containers.

## 3.81.2 - 2018-12-07

* `Aws\AlexaForBusiness` - Alexa for Business now allows IT administrators to create ad-hoc or scheduled usage reports, which help customers understand how Alexa is used in their workplace. To learn how to create usage reports, see https://docs.aws.amazon.com/a4b/latest/ag/creating-reports.html
* `Aws\EC2` - You can now launch the larger-sized P3dn.24xlarge instance that features NVIDIA Tesla V100s with double the GPU memory, 100Gbps networking and local NVMe storage.
* `Aws\IAM` - We are making it easier for you to manage your AWS Identity and Access Management (IAM) policy permissions by enabling you to retrieve the last timestamp when an IAM entity (e.g., user, role, or a group) accessed an AWS service. This feature also allows you to audit service access for your entities.
* `Aws\ServiceCatalog` - Documentation updates for servicecatalog.

## 3.81.1 - 2018-12-06

* `Aws\CodeBuild` - Support personal access tokens for GitHub source and app passwords for Bitbucket source
* `Aws\ElasticLoadBalancingv2` - This release allows Application Load Balancers to route traffic to Lambda functions, in addition to instances and IP addresses.
* `Aws\MediaLive` - This release enables the AWS Elemental MediaConnect input type in AWS Elemental MediaLive. This can then be used to automatically create and manage AWS Elemental MediaConnect Flow Outputs when you create a channel using those inputs.
* `Aws\RDS` - Documentation updates for Amazon RDS

## 3.81.0 - 2018-12-05

* `Aws\CostExplorer` - Add normalized unit support for both GetReservationUtilization and GetReservationCoverage API.
* `Aws\Functions` - This update refactors an unnecessary error suppression operator used in a global function.
* `Aws\MQ` - This release adds support for cost allocation tagging. You can now create, delete, and list tags for AmazonMQ resources. For more information about tagging, see AWS Tagging Strategies.
* `Aws\MediaTailor` - AWS Elemental MediaTailor SDK now includes a new parameter to control the Location tag of DASH manifests.

## 3.80.3 - 2018-12-04

* `Aws\Health` - AWS Health API DescribeAffectedEntities operation now includes a field that returns the URL of the affected entity.
* `Aws\S3` - S3 Inventory reports can now be generated in Parquet format by setting the Destination Format to be 'Parquet'.
* `Aws\Test` - Use dedicated PHPUnit assertions for better error messages.
* `Aws\Waiter` - Simplify foreach with in_array function.

## 3.80.2 - 2018-12-03

* `Aws\DeviceFarm` - Customers can now schedule runs without a need to create a Device Pool. They also get realtime information on public device availability.
* `Aws\MediaConvert` - Documentation updates for mediaconvert
* `Aws\ServiceCatalog` - Documentation updates for servicecatalog
* `Aws\StorageGateway` - API list-local-disks returns a list of the gateway's local disks. This release adds a field DiskAttributeList to these disks.

## 3.80.1 - 2018-11-30

* `Aws\S3` - Fixed issue with Content-MD5 for S3 PutObjectLegalHold, PutObjectRetention and PutObjectLockConfiguration.
* `Aws\S3` - Add MD5 header to PutObjectLegalHold, PutObjectRetention, and PutObjectLockConfiguration.

## 3.80.0 - 2018-11-29

* `Aws\CloudWatchEvents` - Support for Managed Rules (rules that are created and maintained by the AWS services in your account) is added.
* `Aws\ElasticLoadBalancingv2` - This release allows Application Load Balancers to route traffic to Lambda functions, in addition to instances and IP addresses.
* `Aws\Kafka` - This is the initial SDK release for Amazon Managed Streaming for Kafka (Amazon MSK). Amazon MSK is a service that you can use to easily build, monitor, and manage Apache Kafka clusters in the cloud.
* `Aws\Lambda` - AWS Lambda now supports Lambda Layers and Ruby as a runtime. Lambda Layers are a new type of artifact that contains arbitrary code and data, and may be referenced by zero, one, or more functions at the same time. You can also now develop your AWS Lambda function code using the Ruby programming language.
* `Aws\S3` - Fixed issue with ObjectLockRetainUntilDate in S3 PutObject
* `Aws\SFN` - AWS Step Functions is now integrated with eight additional AWS services: Amazon ECS, AWS Fargate, Amazon DynamoDB, Amazon SNS, Amazon SQS, AWS Batch, AWS Glue, and Amazon SageMaker. To learn more, please see https://docs.aws.amazon.com/step-functions/index.html
* `Aws\ServerlessApplicationRepository` - AWS Serverless Application Repository now supports nested applications. You can nest individual applications as components of a larger application to make it easy to assemble and deploy new serverless architectures. 
* `Aws\XRay` - GetTraceSummaries - Now provides additional information regarding your application traces such as Availability Zone, Instance ID, Resource ARN details, Revision, Entry Point, Root Cause Exceptions and Root Causes for Fault, Error and Response Time.

## 3.79.0 - 2018-11-29

* `Aws\AppMesh` - AWS App Mesh is a service mesh that makes it easy to monitor and control communications between microservices of an application. AWS App Mesh APIs are available for preview in eu-west-1, us-east-1, us-east-2, and us-west-2 regions.
* `Aws\EC2` - Adds the following updates: 1. You can now hibernate and resume Amazon-EBS backed instances using the StopInstances and StartInstances APIs. For more information about using this feature and supported instance types and operating systems, visit the user guide. 2. Amazon Elastic Inference accelerators are resources that you can attach to current generation EC2 instances to accelerate your deep learning inference workloads. With Amazon Elastic Inference, you can configure the right amount of inference acceleration to your deep learning application without being constrained by fixed hardware configurations and limited GPU selection. 3. AWS License Manager makes it easier to manage licenses in AWS and on premises when customers run applications using existing licenses from a variety of software vendors including Microsoft, SAP, Oracle, and IBM.
* `Aws\LicenseManager` - AWS License Manager makes it easier to manage licenses in AWS and on premises when customers run applications using existing licenses from a variety of software vendors including Microsoft, SAP, Oracle, and IBM. AWS License Manager automatically tracks and controls license usage once administrators have created and enforced rules that emulate the terms of their licensing agreements. The capabilities of AWS License Manager are available through SDK and Tools, besides the management console and CLI.
* `Aws\Lightsail` - This update adds the following features: 1. Copy instance and disk snapshots within the same AWS Region or from one region to another in Amazon Lightsail. 2. Export Lightsail instance and disk snapshots to Amazon Elastic Compute Cloud (Amazon EC2). 3. Create an Amazon EC2 instance from an exported Lightsail instance snapshot using AWS CloudFormation stacks. 4. Apply tags to filter your Lightsail resources, or organize your costs, or control access.
* `Aws\SageMaker` - Amazon SageMaker now has Algorithm and Model Package entities that can be used to create Training Jobs, Hyperparameter Tuning Jobs and hosted Models. Subscribed Marketplace products can be used on SageMaker to create Training Jobs, Hyperparameter Tuning Jobs and Models. Notebook Instances and Endpoints can leverage Elastic Inference accelerator types for on-demand GPU computing. Model optimizations can be performed with Compilation Jobs. Labeling Jobs can be created and supported by a Workforce. Models can now contain up to 5 containers allowing for inference pipelines within Endpoints. Code Repositories (such as Git) can be linked with SageMaker and loaded into Notebook Instances. Network isolation is now possible on Models, Training Jobs, and Hyperparameter Tuning Jobs, which restricts inbound/outbound network calls for the container. However, containers can talk to their peers in distributed training mode within the same security group. A Public Beta Search API was added that currently supports Training Jobs.
* `Aws\ServiceDiscovery` - AWS Cloud Map lets you define friendly names for your cloud resources so that your applications can quickly and dynamically discover them. When a resource becomes available (for example, an Amazon EC2 instance running a web server), you can register a Cloud Map service instance. Then your application can discover service instances by submitting DNS queries or API calls.

## 3.78.0 - 2018-11-28

* `Aws\DynamoDB` - Amazon DynamoDB now supports the following features: DynamoDB on-demand and transactions. DynamoDB on-demand is a flexible new billing option for DynamoDB capable of serving thousands of requests per second without capacity planning. DynamoDB on-demand offers simple pay-per-request pricing for read and write requests so that you only pay for what you use, making it easy to balance costs and performance. Transactions simplify the developer experience of making coordinated, all-or-nothing changes to multiple items both within and across tables. The new transactional APIs provide atomicity, consistency, isolation, and durability (ACID) in DynamoDB, helping developers support sophisticated workflows and business logic that requires adding, updating, or deleting multiple items using native, server-side transactions. For more information, see the Amazon DynamoDB Developer Guide.
* `Aws\FSx` - Amazon FSx provides fully-managed third-party file systems optimized for a variety of enterprise and compute-intensive workloads.
* `Aws\RDS` - Amazon Aurora Global Database. This release introduces support for Global Database, a feature that allows a single Amazon Aurora database to span multiple AWS regions. Customers can use the feature to replicate data with no impact on database performance, enable fast local reads with low latency in each region, and improve disaster recovery from region-wide outages. You can create, modify and describe an Aurora Global Database, as well as add or remove regions from your Global Database.
* `Aws\RetryMiddleware` - Adds support for custom retryable status and error codes.
* `Aws\SecurityHub` - AWS Security Hub is a security and compliance center that correlates AWS security findings and performs automated compliance checks

## 3.77.0 - 2018-11-28

* `Aws\CloudWatchLogs` - Six new APIs added to support CloudWatch Logs Insights. The APIs are StartQuery, StopQuery, GetQueryResults, GetLogRecord, GetLogGroupFields, and DescribeQueries.
* `Aws\CodeDeploy` - Support for Amazon ECS service deployment - AWS CodeDeploy now supports the deployment of Amazon ECS services. An Amazon ECS deployment uses an Elastic Load Balancer, two Amazon ECS target groups, and a listener to reroute production traffic from your Amazon ECS service's original task set to a new replacement task set. The original task set is terminated when the deployment is complete. Success of a deployment can be validated using Lambda functions that are referenced by the deployment. This provides the opportunity to rollback if necessary. You can use the new ECSService, ECSTarget, and ECSTaskSet data types in the updated SDK to create or retrieve an Amazon ECS deployment.
* `Aws\ComprehendMedical` - The first release of Comprehend Medical includes two APIs, detectPHI and detectEntities. DetectPHI extracts PHI from your clinical text, and detectEntities extracts entities such as medication, medical conditions, or anatomy. DetectEntities also extracts attributes (e.g. dosage for medication) and identifies contextual traits (e.g. negation) for each entity.
* `Aws\EC2` - With VPC sharing, you can now allow multiple accounts in the same AWS Organization to launch their application resources, like EC2 instances, RDS databases, and Redshift clusters into shared, centrally managed VPCs.
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for blue/green deployment feature. Customers can now update their ECS services in a blue/green deployment pattern via using AWS CodeDeploy.
* `Aws\KinesisAnalytics` - Improvements to error messages, validations, and more to the Kinesis Data Analytics APIs.
* `Aws\KinesisAnalyticsV2` - Amazon Kinesis Data Analytics now supports Java-based stream processing applications, in addition to the previously supported SQL. Now, you can use your own Java code in Amazon Kinesis Data Analytics to build and run stream processing applications. This new capability also comes with an update to the previous Amazon Kinesis Data Analytics APIs to enable support for different runtime environments and more.
* `Aws\MarketplaceMetering` - RegisterUsage operation added to AWS Marketplace Metering Service, allowing sellers to meter and entitle Docker container software use with AWS Marketplace. For details on integrating Docker containers with RegisterUsage see: https://docs.aws.amazon.com/marketplace/latest/userguide/entitlement-and-metering-for-paid-products.html
* `Aws\MediaConnect` - This is the initial release for AWS Elemental MediaConnect, an ingest and transport service for live video. This new AWS service allows broadcasters and content owners to send high-value live content into the cloud, securely transmit it to partners for distribution, and replicate it to multiple destinations around the globe.
* `Aws\Translate` - This release includes the new custom terminology feature. Using custom terminology with your translation requests enables you to make sure that your brand names, character names, model names, and other unique content is translated exactly the way you need it, regardless of its context and the Amazon Translate algorithm's decision. See the documentation for more information.

## 3.76.0 - 2018-11-27

* `Aws\EC2` - Adds the following updates: 1. Transit Gateway helps easily scale connectivity across thousands of Amazon VPCs, AWS accounts, and on-premises networks. 2. Amazon EC2 A1 instance is a new Arm architecture based general purpose instance. 3. You can now launch the new Amazon EC2 compute optimized C5n instances that can utilize up to 100 Gbps of network bandwidth.
* `Aws\GlobalAccelerator` - AWS Global Accelerator is a network layer service that helps you improve the availability and performance of the applications that you offer to your global customers. Global Accelerator uses the AWS global network to direct internet traffic from your users to your applications running in AWS Regions. Global Accelerator creates a fixed entry point for your applications through static anycast IP addresses, and routes user traffic to the optimal endpoint based on performance, application health and routing policies that you can configure. Global Accelerator supports the following features at launch: static anycast IP addresses, support for TCP and UDP, support for Network Load Balancers, Application Load Balancers and Elastic-IP address endpoints, continuous health checking, instant regional failover, fault isolating Network Zones, granular traffic controls, and client affinity.
* `Aws\Greengrass` - Support Greengrass Connectors and allow Lambda functions to run without Greengrass containers.
* `Aws\IoT` - As part of this release, we are extending capability of AWS IoT Rules Engine to support IoT Events rule action. The IoT Events rule action lets you send messages from IoT sensors and applications to IoT Events for pattern recognition and event detection.
* `Aws\IoTAnalytics` - Added an optional list of dataset content delivery configuration for CreateDataset and UpdateDataset. DescribeDataset will now include the list of delivery configuration, and will be an empty array if none exist.
* `Aws\KMS` - AWS Key Management Service (KMS) now enables customers to create and manage dedicated, single-tenant key stores in addition to the default KMS key store. These are known as custom key stores and are deployed using AWS CloudHSM clusters. Keys that are created in a KMS custom key store can be used like any other customer master key in KMS.
* `Aws\S3` - Four new Amazon S3 Glacier features help you reduce your storage costs by making it even easier to build archival applications using the Amazon S3 Glacier storage class. S3 Object Lock enables customers to apply Write Once Read Many (WORM) protection to objects in S3 in order to prevent object deletion for a customer-defined retention period. S3 Inventory now supports fields for reporting on S3 Object Lock. "ObjectLockRetainUntilDate", "ObjectLockMode", and "ObjectLockLegalHoldStatus" are now available as valid optional fields.
* `Aws\SMS` - In this release, AWS Server Migration Service (SMS) has added multi-server migration support to simplify the application migration process. Customers can migrate all their application-specific servers together as a single unit as opposed to moving individual server one at a time. The new functionality includes - 1. Ability to group on-premises servers into applications and application tiers. 2. Auto-generated CloudFormation Template and Stacks for launching migrated servers into EC2. 3. Ability to run post-launch configuration scripts to configure servers and applications in EC2. In order for SMS to launch servers into your AWS account using CloudFormation Templates, we have also updated the ServerMigrationServiceRole IAM policy to include appropriate permissions. Refer to Server Migration Service documentation for more details. 

## 3.75.0 - 2018-11-26

* `Aws\Amplify` - Release of AWS Amplify: Everything you need to develop & deploy cloud-powered mobile and web apps.
* `Aws\DataSync` - AWS DataSync simplifies, automates, and accelerates moving and replicating data between on-premises storage and AWS services over the network.
* `Aws\RoboMaker` - (New Service) AWS RoboMaker is a service that makes it easy to develop, simulate, and deploy intelligent robotics applications at scale. 
* `Aws\S3` - The INTELLIGENT_TIERING storage class is designed to optimize storage costs by automatically moving data to the most cost effective storage access tier, without performance impact or operational overhead. This SDK release provides API support for this new storage class.
* `Aws\Snowball` - AWS announces the availability of AWS Snowball Edge Compute Optimized to run compute-intensive applications is disconnected and physically harsh environments. It comes with 52 vCPUs, 208GB memory, 8TB NVMe SSD, and 42TB S3-compatible storage to accelerate local processing and is well suited for use cases such as full motion video processing, deep IoT analytics, and continuous machine learning in bandwidth-constrained locations. It features new instances types called SBE-C instances that are available in eight sizes and multiple instances can be run on the device at the same time. Optionally, developers can choose the compute optimized device to include a GPU and use SBE-G instances for accelerating their application performance. 
* `Aws\Transfer` - AWS Transfer for SFTP is a fully managed service that enables transfer of secure data over the internet into and out of Amazon S3. SFTP is deeply embedded in data exchange workflows across different industries such as financial services, healthcare, advertising, and retail, among others.

## 3.74.1 - 2018-11-21

* `Aws\Rekognition` - This release updates the DetectFaces and IndexFaces operation. When the Attributes input parameter is set to ALL, the face location landmarks includes 5 new landmarks: upperJawlineLeft, midJawlineLeft, chinBottom, midJawlineRight, upperJawlineRight.

## 3.74.0 - 2018-11-20

* `Aws\AppSync` - AWS AppSync now supports: 1. Pipeline Resolvers - Enables execution of one or more operations against multiple data sources in order, on a single GraphQL field. This allows orchestration of actions by composing code into a single Resolver, or share code across Resolvers. 2. Aurora Serverless Data Source - Built-in resolver for executing GraphQL operations with the new Aurora Serverless Data API, including connection management functionality.
* `Aws\AutoScalingPlans` - In this release, AWS Auto Scaling adds three features: 1) Predictive scaling for EC2 Auto Scaling, which analyzes your application workload history to forecast future capacity requirements, 2) an option to replace existing scaling policies that are associated with the resources in your scaling plan, and 3) an option that allows you to use predictive scaling with or without your plan's dynamic scaling feature.
* `Aws\CloudFront` - With Origin Failover capability in CloudFront, you can setup two origins for your distributions - primary and secondary, such that your content is served from your secondary origin if CloudFront detects that your primary origin is unavailable. These origins can be any combination of AWS origins or non-AWS custom HTTP origins. For example, you can have two Amazon S3 buckets that serve as your origin that you independently upload your content to. If an object that CloudFront requests from your primary bucket is not present or if connection to your primary bucket times-out, CloudFront will request the object from your secondary bucket. So, you can configure CloudFront to trigger a failover in response to either HTTP 4xx or 5xx status codes.
* `Aws\CloudWatch` - Amazon CloudWatch now supports alarms on metric math expressions.
* `Aws\DeviceFarm` - Disabling device filters
* `Aws\MediaLive` - You can now include the media playlist(s) from both pipelines in the HLS master manifest for seamless failover.
* `Aws\QuickSight` - Amazon QuickSight is a fully managed, serverless, cloud business intelligence system that allows you to extend data and insights to every user in your organization. The first release of APIs for Amazon QuickSight introduces embedding and user/group management capabilities. The get-dashboard-embed-url API allows you to obtain an authenticated dashboard URL that can be embedded in application domains whitelisted for QuickSight dashboard embedding. User APIs allow you to programmatically expand and manage your QuickSight deployments while group APIs allow easier permissions management for resources within QuickSight.
* `Aws\RDSDataService` - The RDS Data API Beta is available for the MySQL-compatible edition of Amazon Aurora Serverless in the US East (N. Virginia) Region. This API enables you to easily access Aurora Serverless with web services-based applications including AWS Lambda and AWS AppSync.
* `Aws\Redshift` - Documentation updates for redshift
* `Aws\SSM` - AWS Systems Manager Distributor helps you securely distribute and install software packages.
* `Aws\XRay` - Groups build upon X-Ray filter expressions to allow for fine tuning trace summaries and service graph results. You can configure groups by using the AWS X-Ray console or by using the CreateGroup API. The addition of groups has extended the available request fields to the GetServiceGraph API. You can now specify a group name or group ARN to retrieve its service graph.

## 3.73.0 - 2018-11-20

* `Aws\Batch` - Adding multinode parallel jobs, placement group support for compute environments.
* `Aws\CloudFormation` - Use the CAPABILITY_AUTO_EXPAND capability to create or update a stack directly from a stack template that contains macros, without first reviewing the resulting changes in a change set first.
* `Aws\CloudTrail` - This release supports creating a trail in CloudTrail that logs events for all AWS accounts in an organization in AWS Organizations. This helps enable you to define a uniform event logging strategy for your organization. An organization trail is applied automatically to each account in the organization and cannot be modified by member accounts. To learn more, please see the AWS CloudTrail User Guide https://docs.aws.amazon.com/awscloudtrail/latest/userguide/cloudtrail-user-guide.html
* `Aws\ConfigService` - In this release, AWS Config adds support for aggregating the configuration data of AWS resources into multi-account and multi-region aggregators. AWS Config adds four APIs to query and retrieve aggregated resource configurations. 1) BatchGetAggregateResourceConfig, returns the current configuration items for resources that are present in your AWS Config aggregator. 2) GetAggregateDiscoveredResourceCounts, returns the resource counts across accounts and regions that are present in your AWS Config aggregator. 3) GetAggregateResourceConfig, returns current configuration item that is aggregated for your specific resource in a specific source account and region. 4) ListAggregateDiscoveredResources, accepts a resource type and returns a list of resource identifiers that are aggregated for a specific resource type across accounts and regions.
* `Aws\DeviceFarm` - Customers can now schedule runs without a need to create a Device Pool. They also get realtime information on public device availability.
* `Aws\EC2` - Adding AvailabilityZoneId to DescribeAvailabilityZones
* `Aws\EndpointParameterMiddleware` - Adds support for services using modeled endpoint prefixes, both static and user-defined.
* `Aws\IoT` - IoT now supports resource tagging and tag based access control for Billing Groups, Thing Groups, Thing Types, Jobs, and Security Profiles. IoT Billing Groups help you group devices to categorize and track your costs. AWS IoT Device Management also introduces three new features: 1. Dynamic thing groups. 2. Jobs dynamic rollouts. 3. Device connectivity indexing. Dynamic thing groups lets you to create a group of devices using a Fleet Indexing query. The devices in your group will be automatically added or removed when they match your specified query criteria. Jobs dynamic rollout allows you to configure an exponentially increasing rate of deployment for device updates and define failure criteria to cancel your job. Device connectivity indexing allows you to index your devices' lifecycle events to discover whether devices are connected or disconnected to AWS IoT.
* `Aws\Lambda` - AWS Lambda now supports python3.7 and the Kinesis Data Streams (KDS) enhanced fan-out and HTTP/2 data retrieval features for Kinesis event sources.
* `Aws\Lightsail` - Add Managed Database operations to OperationType enum.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added several features including support for: SPEKE full document encryption, up to 150 elements for input stitching, input and motion image insertion, AWS CLI path arguments in S3 links including special characters, AFD signaling, additional caption types, and client-side encrypted input files.
* `Aws\RDS` - This release adds a new parameter to specify VPC security groups for restore from DB snapshot, restore to point int time and create read replica operations. For more information, see Amazon RDS Documentation.
* `Aws\WorkDocs` - With this release, clients can now use the GetResources API to fetch files and folders from the user's SharedWithMe collection. And also through this release, the existing DescribeActivities API has been enhanced to support additional filters such as the ActivityType and the ResourceId.
* `Aws\WorkSpaces` - Added new APIs to Modify and Describe WorkSpaces client properties for users in a directory. With the new APIs, you can enable/disable remember me option in WorkSpaces client for users in a directory.

## 3.72.1 - 2018-11-16

* `Aws\Comprehend` - Amazon Comprehend Custom Entities automatically trains entity recognition models using your entities and noun-based phrases. 
* `Aws\CostExplorer` - This release introduces a new operation called GetCostForecast operation, which allows you to programmatically access AWS Cost Explorer's forecasting engine and is now generally available.
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for additional Docker flags as Task Definition parameters. Customers can now configure their ECS Tasks to use pidMode (pid) and ipcMode (ipc) Docker flags.
* `Aws\SSM` - AWS Systems Manager Automation now allows you to execute and manage Automation workflows across multiple accounts and regions. 
* `Aws\WorkSpaces` - Added new Bring Your Own License (BYOL) automation APIs. With the new APIs, you can list available management CIDR ranges for dedicated tenancy, enable your account for BYOL, describe BYOL status of your account, and import BYOL images. Added new APIs to also describe and delete WorkSpaces images. 

## 3.72.0 - 2018-11-15

* `Aws\CodeBuild` - Adding queue phase and configurable queue timeout to CodeBuild.
* `Aws\Comprehend` - Amazon Comprehend Custom Classification automatically trains classification models using your text and custom labels.
* `Aws\DatabaseMigrationService` - Settings structures have been added to our DMS endpoint APIs to support Kinesis and Elasticsearch as targets. We are introducing the ability to configure custom DNS name servers on a replication instance as a beta feature. 
* `Aws\DirectConnect` - This release enables DirectConnect customers to have logical redundancy on virtual interfaces within supported DirectConnect locations.
* `Aws\ECS` - In this release, Amazon ECS introduces multiple features. First, ECS now supports integration with Systems Manager Parameter Store for injecting runtime secrets. Second, ECS introduces support for resources tagging. Finally, ECS introduces a new ARN and ID Format for its resources, and provides new APIs for opt-in to the new formats. 
* `Aws\IAM` - We are making it easier for you to manage your AWS Identity and Access Management (IAM) resources by enabling you to add tags to your IAM principals (users and roles). Adding tags on IAM principals will enable you to write fewer policies for permissions management and make policies easier to comprehend. Additionally, tags will also make it easier for you to grant access to AWS resources.
* `Aws\Pinpoint` - 1. With Amazon Pinpoint Voice, you can use text-to-speech technology to deliver personalized voice messages to your customers. Amazon Pinpoint Voice is a great way to deliver transactional messages -- such as one-time passwords and identity confirmations -- to customers. 2. Adding support for Campaign Event Triggers. With Campaign Event Triggers you can now schedule campaigns to execute based on incoming event data and target just the source of the event.
* `Aws\PinpointSMSVoice` - With Amazon Pinpoint Voice, you can use text-to-speech technology to deliver personalized voice messages to your customers. Amazon Pinpoint Voice is a way to deliver transactional messages -- such as one-time passwords and appointment confirmations to customers.
* `Aws\RAM` - This is the initial release of AWS Resource Access Manager (RAM) which provides you the ability to share your resources across AWS accounts or within your AWS Organization. You can now create resources centrally and use AWS RAM to share those resources with other accounts, eliminating the need to provision and manage resources in every account. When you share a resource with another account, that account is granted access. Any policies and permissions in that account apply to the shared resource. 
* `Aws\RDS` - Introduces DB Instance Automated Backups for the MySQL, MariaDB, PostgreSQL, Oracle and Microsoft SQL Server database engines. You can now retain Amazon RDS automated backups (system snapshots and transaction logs) when you delete a database instance. This allows you to restore a deleted database instance to a specified point in time within the backup retention period even after it has been deleted, protecting you against accidental deletion of data. For more information, see Amazon RDS Documentation.
* `Aws\Redshift` - With this release, Redshift is providing API's for better snapshot management by supporting user defined automated snapshot schedules, retention periods for manual snapshots, and aggregate snapshot actions including batch deleting user snapshots, viewing account level snapshot storage metrics, and better filtering and sorting on the describe-cluster-snapshots API. Automated snapshots can be scheduled to be taken at a custom interval and the schedule created can be reused across clusters. Manual snapshot retention periods can be set at the cluster, snapshot, and cross-region-copy level. The retention period set on a manual snapshot indicates how many days the snapshot will be retained before being automatically deleted.
* `Aws\Route53Resolver` - This is the first release of the Amazon Route 53 Resolver API. Customers now have the ability to create and manage Amazon Route 53 Resolver endpoints and Amazon Route 53 Resolver rules. 
* `Aws\S3` - Add support for new S3 Block Public Access bucket-level APIs. The new Block Public Access settings allow bucket owners to prevent public access to S3 data via bucket/object ACLs or bucket policies.
* `Aws\S3Control` - Add support for new S3 Block Public Access account-level APIs. The Block Public Access settings allow account owners to prevent public access to S3 data via bucket/object ACLs or bucket policies.
* `Aws\TranscribeService` - With this release, Amazon Transcribe now publicly supports transcriptions from audio sources in British English (en-GB), Australian English (en-AU), and Canadian French (fr-CA). Amazon Transcribe now also supports the following languages in Private beta: Germany German (de-DE), Brazil Portuguese (pt-BR), France French (fr-FR).

## 3.71.6 - 2018-11-14

* `Aws\AutoScaling` - EC2 Auto Scaling now allows users to provision and automatically scale instances across purchase options (Spot, On-Demand, and RIs) and instance types in a single Auto Scaling group (ASG).
* `Aws\EC2` - Amazon EC2 Fleet now supports a new request type "Instant" that you can use to provision capacity synchronously across instance types & purchase models and CreateFleet will return the instances launched in the API response.
* `Aws\MediaTailor` - AWS Elemental MediaTailor SDK now returns a manifest endpoint prefix for clients to initiate a DASH playback session.
* `Aws\ResourceGroups` - The AWS Resource Groups service added support for AWS CloudFormation stack-based groups.
* `Aws\SNS` - Added an optional request parameter, named Attributes, to the Amazon SNS CreateTopic API action. For more information, see the Amazon SNS API Reference (https://docs.aws.amazon.com/sns/latest/api/API_CreateTopic.html).
* `Aws\SageMaker` - SageMaker now makes the final set of metrics published from training jobs available in the DescribeTrainingJob results. Automatic Model Tuning now supports warm start of hyperparameter tuning jobs. Notebook instances now support a larger number of instance types to include instances from the ml.t3, ml.m5, ml.c4, ml.c5 families.
* `Aws\ServiceCatalog` - Adds support for Cloudformation StackSets in Service Catalog

## 3.71.5 - 2018-11-13

* `Aws\Budgets` - Doc Update: 1. Available monthly-budgets maximal history data points from 12 to 13. 2. Added 'Amazon Elasticsearch' costfilters support.
* `Aws\Chime` - This release adds support in ListUsers API to filter the list by an email address.
* `Aws\Redshift` - Amazon Redshift provides the option to defer non-mandatory maintenance updates to a later date.

## 3.71.4 - 2018-11-12

* `Aws\Batch` - Adding EC2 Launch Template support in AWS Batch Compute Environments.
* `Aws\Budgets` - 1. Added budget performance history, enabling you to see how well your budgets matched your actual costs and usage. 2. Added budget performance history, notification state, and last updated time, enabling you to see how well your budgets matched your actual costs and usage, how often your budget alerts triggered, and when your budget was last updated.
* `Aws\CloudFormation` - The Drift Detection feature enables customers to detect whether a stack's actual configuration differs, or has drifted, from its expected configuration as defined within AWS CloudFormation.
* `Aws\CodePipeline` - Add support for cross-region pipeline with accompanying definitions as needed in the AWS CodePipeline API Guide.
* `Aws\Firehose` - With this release, Amazon Kinesis Data Firehose allows you to enable/disable server-side encryption(SSE) for your delivery streams ensuring encryption of data at rest. For technical documentation, look at https://docs.aws.amazon.com/firehose/latest/dev/encryption.html
* `Aws\Polly` - Amazon Polly adds new female voices: Italian - Bianca, Castilian Spanish - Lucia and new language: Mexican Spanish with new female voice - Mia.
* `Aws\RDS` - API Update for RDS: this update enables Custom Endpoints, a new feature compatible with Aurora Mysql, Aurora PostgreSQL and Neptune that allows users to configure a customizable endpoint that will provide access to their instances in a cluster. 

## 3.71.3 - 2018-11-09

* `Aws\MediaPackage` - As a part of SPEKE DRM encryption, MediaPackage now supports encrypted content keys. You can enable this enhanced content protection in an OriginEndpoint's encryption settings. When this is enabled, MediaPackage indicates to the key server that it requires an encrypted response. To use this, your DRM key provider must support content key encryption. For details on this feature, see the AWS MediaPackage User Guide at https://docs.aws.amazon.com/mediapackage/latest/ug/what-is.html.

## 3.71.2 - 2018-11-08

* `Aws\CloudWatchEvents` - Documentation updates for events
* `Aws\DLM` - Amazon Data Lifecycle Manager adds support for copying EBS volume tags to EBS snapshots. AWS resource tags allow customers to add metadata and apply access policies to your Amazon Elastic Block Store (Amazon EBS) resources. Starting today, customers can use Amazon Data Lifecycle Manager (DLM) to copy tags on EBS volumes to EBS snapshots. This allows customers to easily set snapshot metadata, such as access policies, to match the parent volume. Customers can enable this functionality on new or existing lifecycle policies. They can also choose to disable it at a future date. 
* `Aws\MediaLive` - You can now switch a live channel between preconfigured inputs. This means assigned inputs for a running channel can be changed according to a defined schedule. You can also use MP4 files as inputs.

## 3.71.1 - 2018-11-07

* `Aws\CostExplorer` - Enable Payer Accounts to View Linked Account Recommendations. Payer Accounts can specify "LINKED" as scope in the request now. In the response, there is a new filed called AccountId in ReservationPurchaseRecommendationDetail for indicating which account is this recommendation detail belongs to.
* `Aws\DatabaseMigrationService` - Update the DMS TestConnectionSucceeds waiter.
* `Aws\EC2` - VM Import/Export now supports generating encrypted EBS snapshots, as well as AMIs backed by encrypted EBS snapshots during the import process.

## 3.71.0 - 2018-11-06

* `Aws\APIGateway` - AWS WAF integration with APIGW. Changes for adding webAclArn as a part of Stage output. When the user calls a get-stage or get-stages, webAclArn will also be returned as a part of the output.
* `Aws\CodeBuild` - Documentation updates for codebuild
* `Aws\EC2` - You can now launch the new Amazon EC2 memory optimized R5a and general purpose M5a instances families that feature AMD EPYC processors.
* `Aws\Pinpoint` - This update adds the ability to send transactional email by using the SendMessage API. Transactional emails are emails that you send directly to specific email addresses. Unlike campaign-based email that you send from Amazon Pinpoint, you don't have to create segments and campaigns in order to send transactional email.
* `Aws\PinpointEmail` - This is the first release of the Amazon Pinpoint Email API. You can use this API to configure and send transactional email from your Amazon Pinpoint account to specific email addresses. Unlike campaign-based email that you send from Amazon Pinpoint, you don't have to create segments and campaigns in order to send transactional email. 
* `Aws\WAFRegional` - You can now use AWS WAF to configure protections for your Amazon API Gateway APIs. This will enable you to block (or count) undesired traffic to your APIs based on the different AWS WAF rules and conditions you create. For more information about AWS WAF, see the AWS WAF Developer Guide.

## 3.70.4 - 2018-11-05

* `Aws\EKS` - Adds waiters for ClusterActive and ClusterDeleted
* `Aws\ServerlessApplicationRepository` - New AWS Serverless Application Repository APIs that support creating and reading a broader set of AWS CloudFormation templates, as well as enhancements to our existing APIs.

## 3.70.3 - 2018-11-02

* `Aws\CloudDirectory` - ListObjectParents API now supports a bool parameter IncludeAllLinksToEachParent, which if set to true, will return a ParentLinks list instead of a Parents map; BatchRead API now supports ListObjectParents operation.
* `Aws\Rekognition` - This release updates the DetectLabels operation. Bounding boxes are now returned for certain objects, a hierarchical taxonomy is now available for labels, and you can now get the version of the detection model used for detection.

## 3.70.2 - 2018-11-01

* `Aws\ServiceCatalog` - Service Catalog integration with AWS Organizations, enables customers to more easily create and manage a portfolio of IT services across an organization. Administrators can now take advantage of the AWS account structure and account groupings configured in AWS Organizations to share Service Catalog Portfolios increasing agility and reducing risk. With this integration the admin user will leverage the trust relationship that exists within the accounts of the Organization to share portfolios to the entire Organization, a specific Organizational Unit or a specific Account.

## 3.70.1 - 2018-10-31

* `Aws\ConfigService` - With this release, AWS Config updated the ResourceType values. The updated list includes AWS Systems Manager AssociationCompliance and PatchCompliance, AWS Shield regional Protection, AWS Config ResourceCompliance, and AWS CodePipeline Pipeline.
* `Aws\Greengrass` - Greengrass APIs now support bulk deployment operations, and APIs that list definition versions now support pagination.
* `Aws\MediaStoreData` - The object size limit is increased from 10MB to 25MB and the content type is more permissive.
* `Aws\SecretsManager` - Documentation updates for AWS Secrets Manager.

## 3.70.0 - 2018-10-30

* `Aws\Chime` - This is the initial release for the Amazon Chime AWS SDK. In this release, Amazon Chime adds support for administrative actions on users and accounts. API Documentation is also updated on https://docs.aws.amazon.com/chime/index.html
* `Aws\DatabaseMigrationService` - Add waiters for TestConnectionSucceeds, EndpointDeleted, ReplicationInstanceAvailable, ReplicationInstanceDeleted, ReplicationTaskReady, ReplicationTaskStopped, ReplicationTaskRunning and ReplicationTaskDeleted.
* `Aws\RDS` - This release adds the listener connection endpoint for SQL Server Always On to the list of fields returned when performing a describe-db-instances operation.

## 3.69.16 - 2018-10-26

* `Aws\AlexaForBusiness` - Documentation updates for AWS Alexa for Business
* `Aws\SSM` - Compliance Severity feature release for State Manager. Users now have the ability to select compliance severity to their association in state manager console or CLI.
* `Aws\SageMaker` - SageMaker notebook instances can now have a volume size configured.

## 3.69.15 - 2018-10-25

* `Aws\EC2` - As part of this release we are introducing EC2 On-Demand Capacity Reservations. With On-Demand Capacity Reservations, customers can reserve the exact EC2 capacity they need, and can keep it only for as long as they need it.

## 3.69.14 - 2018-10-24

* `Aws\AlexaForBusiness` - We extended the functionality of the Alexa for Business SDK, including additional support for third-party Alexa built-in devices, managing private and public skills, and conferencing setup.
* `Aws\CodeStar` - This release lets you create projects from source code and a toolchain definition that you provide.

## 3.69.13 - 2018-10-23

* `Aws\EC2` - Provides customers the ability to Bring Your Own IP (BYOIP) prefix. You can bring part or all of your public IPv4 address range from your on-premises network to your AWS account. You continue to own the address range, but AWS advertises it on the internet.

## 3.69.12 - 2018-10-22

* `Aws\Inspector` - Finding will be decorated with ec2 related metadata
* `Aws\Shield` - AWS Shield Advanced API introduced a new service-specific AccessDeniedException which will be thrown when accessing individual attack information without sufficient permission.

## 3.69.11 - 2018-10-19

* `Aws\Aws` - Bump Guzzle HTTP patch version for PHP 7.3 compatibility.
* `Aws\SSM` - Rate Control feature release for State Manager. Users now have the ability to apply rate control parameters similar to run command to their association in state manager console or CLI.
* `Aws\WorkSpaces` - Added support for PowerPro and GraphicsPro WorkSpaces bundles.

## 3.69.10 - 2018-10-18

* `Aws\AppStream` - This API update adds support for creating, managing, and deleting users in the AppStream 2.0 user pool.
* `Aws\MediaLive` - This release allows you to now turn on Quality-Defined Variable Bitrate (QVBR) encoding for your AWS Elemental MediaLive channels. You can now deliver a consistently high-quality video viewing experience while reducing overall distribution bitrates by using Quality-Defined Variable Bitrate (QVBR) encoding with AWS Elemental MediaLive. QVBR is a video compression technique that automatically adjusts output bitrates to the complexity of source content and only use the bits required to maintain a defined level of quality. This means using QVBR encoding, you can save on distribution cost, while maintaining, or increasing video quality for your viewers.
* `Aws\Route53` - This change allows customers to disable health checks.

## 3.69.9 - 2018-10-17

* `Aws\APIGateway` - Documentation updates for API Gateway
* `Aws\CloudWatchEvents` - AWS Events - AWS Organizations Support in Event-Bus Policies. This release introduces a new parameter in the PutPermission API named Condition. Using the Condition parameter, customers can allow one or more AWS Organizations to access their CloudWatch Events Event-Bus resource.

## 3.69.8 - 2018-10-16

* `Aws\Glue` - New Glue APIs for creating, updating, reading and deleting Data Catalog resource-based policies.
* `Aws\Lightsail` - Adds support for Lightsail managed databases.
* `Aws\ResourceGroups` - AWS Resource Groups service added a new feature to filter resource groups by resource-type when using the ListGroups operation.

## 3.69.7 - 2018-10-15

* `Aws\Lambda` - Documentation updates for lambda
* `Aws\RDS` - This release adds a new parameter to specify the DB instance or cluster parameter group for restore from DB snapshot and restore to point int time operations. For more information, see Amazon RDS Documentation.
* `Aws\ServiceCatalog` - AWS Service Catalog enables you to reduce administrative maintenance and end-user training while adhering to compliance and security measures. With service actions, you as the administrator can enable end users to perform operational tasks, troubleshoot issues, run approved commands, or request permissions within Service Catalog. Service actions are defined using AWS Systems Manager documents, where you have access to pre-defined actions that implement AWS best practices, such asEC2 stop and reboot, as well as the ability to define custom actions.

## 3.69.6 - 2018-10-12

* `Aws\ClientSideMonitoring` - Adds MaxRetriesExceeded entry to ApiCall events.
* `Aws\CloudTrail` - The LookupEvents API now supports two new attribute keys: ReadOnly and AccessKeyId

## 3.69.5 - 2018-10-11

* `Aws\Api/Serializer` - Fix to correctly format 'structure' options into JSON, when they have no valid values.
* `Aws\Athena` - 1. GetQueryExecution API changes to return statementType of a submitted Athena query. 2. GetQueryResults API changes to return the number of rows added to a table when a CTAS query is executed.
* `Aws\ClientSideMonitoring` - Updates to client-side monitoring event entry and config settings to match updated specification.
* `Aws\DirectConnect` - This release adds support for Jumbo Frames over AWS Direct Connect. You can now set MTU value when creating new virtual interfaces. This release also includes a new API to modify MTU value of existing virtual interfaces.
* `Aws\EC2` - You can now launch the smaller-sized G3 instance called g3s.xlarge. G3s.xlarge provides 4 vCPU, 30.5 GB RAM and a NVIDIA Tesla M60 GPU. It is ideal for remote workstations, engineering and architectural applications, and 3D visualizations and rendering for visual effects.
* `Aws\MediaConvert` - Added Paginators for all the MediaConvert list operations
* `Aws\TranscribeService` - With this release, Amazon Transcribe now supports transcriptions from audio sources in British English (en-UK), Australian English (en-AU), and Canadian French (fr-CA).

## 3.69.4 - 2018-10-10

* `Aws\Build/Docs` - Fixes API docs issue with required members in shapes.
* `Aws\ClientSideMonitoring` - Avoids issue with late static bindings in closures in earlier versions of PHP 5.5.x.
* `Aws\Comprehend` - This release adds French, Italian, German and Portuguese language support for all existing synchronous and asynchronous APIs
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service now supports customer-scheduled service software updates. When new service software becomes available, you can request an update to your domain and benefit from new features more quickly. If you take no action, we update the service software automatically after a certain time frame.
* `Aws\TranscribeService` - With this update Amazon Transcribe now supports deleting completed transcription jobs. 

## 3.69.3 - 2018-10-09

* `Aws\SSM` - Adds StartDate, EndDate, and ScheduleTimezone to CreateMaintenanceWindow and UpdateMaintenanceWindow; Adds NextExecutionTime to GetMaintenanceWindow and DescribeMaintenanceWindows; Adds CancelMaintenanceWindowExecution, DescribeMaintenanceWindowSchedule and DescribeMaintenanceWindowsForTarget APIs.

## 3.69.2 - 2018-10-08

* `Aws\IoT` - We are releasing job execution timeout functionalities to customers. Customer now can set job execution timeout on the job level when creating a job. 
* `Aws\IoTJobsDataPlane` - We are releasing job execution timeout functionalities to customers. Device can now set and update their job execution timeout. 

## 3.69.1 - 2018-10-05

* `Aws\DirectoryService` - SDK changes to create a new type of trust for active directory

## 3.69.0 - 2018-10-04

* `Aws\APIGateway` - Adding support for multi-value parameters in TestInvokeMethod and TestInvokeAuthorizer.
* `Aws\ClientSideMonitoring` - Code for future SDK instrumentation and telemetry.
* `Aws\CodeBuild` - Add resolved source version field in build output
* `Aws\Neptune` - Update neptune command for support in the EU (London) region
* `Aws\SSM` -  Adds RejectedPatchesAction to baseline to enable stricted validation of the rejected Patches List ; Add InstalledRejected and InstallOverrideList to compliance reporting
* `Aws\StorageGateway` - AWS Storage Gateway now enables you to specify folders and subfolders when you update your file gateway's view of your S3 objects using the Refresh Cache API.

## 3.68.1 - 2018-10-02

* `Aws\SageMaker` - Waiter for SageMaker Batch Transform Jobs.
* `Aws\SecretsManager` - Documentation updates for secretsmanager

## 3.68.0 - 2018-10-01

* `Aws\GuardDuty` - Support optional FindingPublishingFrequency parameter in CreateDetector and UpdateDetector operations, and ClientToken on Create* operations
* `Aws\Lambda` - Added default TCP Keep-Alive Curl setting for the Lambda client.
* `Aws\Rekognition` - Documentation updates for Amazon Rekognition

## 3.67.22 - 2018-09-28

* `Aws\CodeStar` - This release enables tagging CodeStar Projects at creation. The CreateProject API now includes optional tags parameter.
* `Aws\EC2` - You can now use EC2 High Memory instances with 6 TiB memory (u-6tb1.metal), 9 TiB memory (u-9tb1.metal), and 12 TiB memory (u-12tb1.metal), which are ideal for running large in-memory databases, including production deployments of SAP HANA. These instances offer 448 logical processors, where each logical processor is a hyperthread on 224 cores. These instance deliver high networking throughput and lower latency with up to 25 Gbps of aggregate network bandwidth using Elastic Network Adapter (ENA)-based Enhanced Networking. These instances are EBS-Optimized by default, and support encrypted and unencrypted EBS volumes. This instance is only available in host-tenancy. You will need an EC2 Dedicated Host for this instance type to launch an instance.

## 3.67.21 - 2018-09-27

* `Aws\APIGateway` - Adding support for OpenAPI 3.0 import and export.
* `Aws\CodeCommit` - This release adds API support for getting the contents of a file, getting the contents of a folder, and for deleting a file in an AWS CodeCommit repository.
* `Aws\GameLift` - Amazon GameLift and Amazon GameLift FlexMatch are now available in the China cn-north-1 region.
* `Aws\MQ` - Amazon MQ supports ActiveMQ 5.15.6, in addition to 5.15.0. Automatic minor version upgrades can be toggled. Updated the documentation.
* `Aws\SageMaker` - SageMaker has added support for the AWS GovCloud (US) region.

## 3.67.20 - 2018-09-26

* `Aws\Glue` - AWS Glue now supports data encryption at rest for ETL jobs and development endpoints. With encryption enabled, when you run ETL jobs, or development endpoints, Glue will use AWS KMS keys to write encrypted data at rest. You can also encrypt the metadata stored in the Glue Data Catalog using keys that you manage with AWS KMS. Additionally, you can use AWS KMS keys to encrypt the logs generated by crawlers and ETL jobs as well as encrypt ETL job bookmarks. Encryption settings for Glue crawlers, ETL jobs, and development endpoints can be configured using the security configurations in Glue. Glue Data Catalog encryption can be enabled via the settings for the Glue Data Catalog.
* `Aws\OpsWorksCM` - This release introduces a new API called ExportServerEngineAttribute to Opsworks-CM. You can use this API call to export engine specific attributes like the UserData script used for unattended bootstrapping of new nodes that connect to the server. 
* `Aws\RDS` - This release includes Deletion Protection for RDS databases.
* `Aws\SQS` - Documentation updates for Amazon SQS.

## 3.67.19 - 2018-09-25

* `Aws\CloudFront` - Documentation updates for cloudfront
* `Aws\DirectoryService` - API changes related to launch of cross account for Directory Service.
* `Aws\EC2` - Add pagination support for ec2.describe-route-tables API. 

## 3.67.18 - 2018-09-24

* `Aws\Connect` - This update adds the Amazon Connect Metrics API, which lets you get current metric data and historical metric data within 24 hours for the queues in your Amazon Connect instance.
* `Aws\RDS` -  Adds DB engine version requirements for option group option settings, and specifies if an option setting requires a value.

## 3.67.17 - 2018-09-21

* `Aws\MediaConvert` - To offer lower prices for predictable, non-urgent workloads, we propose the concept of Reserved Transcode pricing. Reserved Transcode pricing Reserved Transcoding pricing would offer the customer access to a fixed parallel processing capacity for a fixed monthly rate. This capacity would be stated in terms of number of Reserved Transcode Slots (RTSs). One RTS would be able to process one job at a time for a fixed monthly fee.

## 3.67.16 - 2018-09-20

* `Aws\DirectoryService` - Added CreateLogSubscription, DeleteLogSubscription, and ListLogSubscriptions APIs for Microsoft AD. Customers can now opt in to have Windows security event logs from the domain controllers forwarded to a log group in their account.
* `Aws\EC2` - You can now launch f1.4xlarge, a new instance size within the existing f1 family which provides two Xilinx Virtex Field Programmable Arrays (FPGAs) for acceleration. FPGA acceleration provide additional performance and time sensitivity for specialized accelerated workloads such as clinical genomics and real-time video processing. F1.4xlarge instances are available in the US East (N. Virginia), US West (Oregon), GovCloud (US), and EU West (Dublin) AWS Regions.
* `Aws\RDS` - This launch enables RDS start-db-cluster and stop-db-cluster. Stopping and starting Amazon Aurora clusters helps you manage costs for development and test environments. You can temporarily stop all the DB instances in your cluster, instead of setting up and tearing down all the DB instances each time that you use the cluster.

## 3.67.15 - 2018-09-19

* `Aws\CloudWatch` - Amazon CloudWatch adds the ability to request png image snapshots of metric widgets using the GetMetricWidgetImage API.
* `Aws\Organizations` - Introducing a new exception - AccountOwnerNotVerifiedException which will be returned for InviteAccountToOrganization call for unverified accounts.
* `Aws\S3` - S3 Cross Region Replication now allows customers to use S3 object tags to filter the scope of replication. By using S3 object tags, customers can identify individual objects for replication across AWS Regions for compliance and data protection. Cross Region Replication for S3 enables automatic and asynchronous replication of objects to another AWS Region, and with this release customers can replicate at a bucket level, prefix level or by using object tags.

## 3.67.14 - 2018-09-18

* `Aws\ElasticsearchService` - Amazon Elasticsearch Service adds support for node-to-node encryption for new domains running Elasticsearch version 6.0 and above
* `Aws\Rekognition` - This release updates the Amazon Rekognition IndexFaces API operation. It introduces a QualityFilter parameter that allows you to automatically filter out detected faces that are deemed to be of low quality by Amazon Rekognition. The quality bar is based on a variety of common use cases. You can filter low-quality detected faces by setting QualityFilter to AUTO, which is also the default setting. To index all detected faces regardless of quality, you can specify NONE. This release also provides a MaxFaces parameter that is useful when you want to only index the most prominent and largest faces in an image and don't want to index other faces detected in the image, such as smaller faces belonging to people standing in the background.

## 3.67.13 - 2018-09-17

* `Aws\CloudWatch` - Amazon CloudWatch adds the ability to publish values and counts using PutMetricData
* `Aws\CodeBuild` - Support build logs configuration.
* `Aws\EC2` - Added support for customers to tag EC2 Dedicated Hosts on creation.
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for additional Docker flags as Task Definition parameters. Customers can now configure their ECS Tasks to use systemControls (sysctl), pseudoTerminal (tty), and interactive (i) Docker flags.
* `Aws\ElastiCache` - ElastiCache for Redis added support for adding and removing read-replicas from any cluster with no cluster downtime, Shard naming: ElastiCache for Redis customers have the option of allowing ElastiCache to create names for their node groups (shards) or generating their own node group names. For more information, see https:// docs.aws.amazon.com/AmazonElastiCache/latest/APIReference/API_NodeGroupConfiguration.html, ShardsToRetain: When reducing the number of node groups (shards) in an ElastiCache for Redis (cluster mode enabled) you have the option of specifying which node groups to retain or which node groups to remove. For more information, see https:// docs.aws.amazon.com/AmazonElastiCache/latest/APIReference/API_ModifyReplicationGroupShardConfiguration.html, ReservationARN: ReservedNode includes an ARN, ReservationARN, member which identifies the reserved node. For more information, see https:// docs.aws.amazon.com/AmazonElastiCache/latest/APIReference/API_ReservedCacheNode.html
* `Aws\ElasticTranscoder` - Added support for MP2 container
* `Aws\SecretsManager` - Documentation updates for secretsmanager

## 3.67.12 - 2018-09-13

* `Aws\Polly` - Amazon Polly adds Mandarin Chinese language support with new female voice - "Zhiyu"

## 3.67.11 - 2018-09-12

* `Aws\Connect` - This update adds the Amazon Connect Update Contact Attributes API, which lets you update contact attributes for contacts in your Amazon Connect instance.
* `Aws\EC2` - Pagination Support for DescribeNetworkInterfaces API
* `Aws\FMS` - This update of Amazon Fire Wall Manager adds the ability to scope down the policy as well as to get all the member accounts belonging to a certain Fire Wall Manager admin account.
* `Aws\SES` - Documentation updates for Amazon Simple Email Service
* `Aws\S3` - Support for S3Select in the AWS SDK for PHP.

## 3.67.10 - 2018-09-11

* `Aws\OpsWorksCM` - Documentation updates for opsworkscm
* `Aws\SSM` - Session Manager is a fully managed AWS Systems Manager capability that provides interactive one-click access to Amazon EC2 Linux and Windows instances.

## 3.67.9 - 2018-09-10

* `Aws\CloudHSMV2` - With this release, we are adding 2 new APIs. DeleteBackup deletes a specified AWS CloudHSM backup. A backup can be restored up to 7 days after the DeleteBackup request. During this 7-day period, the backup will be in state PENDING_DELETION. Backups can be restored using the RestoreBackup API, which will move the backup from state PENDING_DELETION back to ACTIVE.
* `Aws\Redshift` - Adding support to Redshift to change the encryption type after cluster creation completes.

## 3.67.8 - 2018-09-07

* `Aws\CloudWatchLogs` - * Adding a log prefix parameter for filter log events API and minor updates to the documentation
* `Aws\ConfigService` - Adding a new field "createdBy" to the ConfigRule data model. The field is populated only if the rule is service linked i.e the rule is created by a service. The field is empty for normal rules created by customer.

## 3.67.7 - 2018-09-06

* `Aws\APIGateway` - Add support for Active X-Ray with API Gateway
* `Aws\CodeCommit` - This release adds additional optional fields to the pull request APIs.
* `Aws\MediaConvert` - This release adds support for Cost Allocation through tagging and also enables adding, editing, and removal of tags from the MediaConvert console.

## 3.67.6 - 2018-09-05

* `Aws\AppStream` - Added support for enabling persistent application settings for a stack. When these settings are enabled, changes that users make to applications and Windows settings are automatically saved after each session and applied to the next session.
* `Aws\DynamoDB` - New feature for Amazon DynamoDB.
* `Aws\ElasticLoadBalancing` - Documentation update for DescribeAccountLimits API to include classic-registered-instances.
* `Aws\RDS` - Fix broken links in the RDS CLI Reference to the Aurora User Guide
* `Aws\S3` - Parquet input format support added for the SelectObjectContent API

## 3.67.5 - 2018-09-04

* `Aws\RDS` - Updating cross references for the new Aurora User Guide.
* `Aws\Rekognition` - This release introduces a new API called DescribeCollection to Amazon Rekognition. You can use DescribeCollection to get information about an existing face collection. Given the ID for a face collection, DescribeCollection returns the following information: the number of faces indexed into the collection, the version of the face detection model used by the collection, the Amazon Resource Name (ARN) of the collection and the creation date/time of the collection.

## 3.67.4 - 2018-08-31

* `Aws\EKS` - Amazon EKS DescribeCluster API returns a platformVersion attribute which allows you to identify the features that are currently enabled for your clusters. The Amazon EKS platform version represents capabilities of the cluster control plane, such as which Kubernetes API server flags are enabled, as well as the current Kubernetes patch version. 
* `Aws\WAF` - This change includes support for the WAF FullLogging feature through which Customers will have access to all the logs of requests that are inspected by a WAF WebACL. The new APIs allow Customers to manage association of a WebACL with one or more supported "LogDestination" and redact any request fields from the logs. 
* `Aws\WAFRegional` - This change includes support for the WAF FullLogging feature through which Customers will have access to all the logs of requests that are inspected by a WAF WebACL. The new APIs allow Customers to manage association of a WebACL with one or more supported "LogDestination" and redact any request fields from the logs. 

## 3.67.3 - 2018-08-30

* `Aws\CodeBuild` - Support multiple sources and artifacts for CodeBuild projects. 
* `Aws\SageMaker` - VolumeKmsKeyId now available in Batch Transform Job 

## 3.67.2 - 2018-08-29

* `Aws\Glue` - AWS Glue now supports data encryption at rest for ETL jobs and development endpoints. With encryption enabled, when you run ETL jobs, or development endpoints, Glue will use AWS KMS keys to write encrypted data at rest. You can also encrypt the metadata stored in the Glue Data Catalog using keys that you manage with AWS KMS. Additionally, you can use AWS KMS keys to encrypt the logs generated by crawlers and ETL jobs as well as encrypt ETL job bookmarks. Encryption settings for Glue crawlers, ETL jobs, and development endpoints can be configured using the security configurations in Glue. Glue Data Catalog encryption can be enabled via the settings for the Glue Data Catalog.
* `Aws\MediaPackage` - MediaPackage now provides input redundancy. Channels have two ingest endpoints that can receive input from encoders. OriginEndpoints pick one of the inputs receiving content for playback and automatically switch to the other input if the active input stops receiving content. Refer to the User Guide (https://docs.aws.amazon.com/mediapackage/latest/ug/what-is.html) for more details on this feature.
* `Aws\SageMakerRuntime` - SageMaker Runtime supports CustomAttributes header which allows customers provide additional information in a request for an inference submitted to a model or in the response about the inference returned by a model hosted at an Amazon SageMaker endpoint.

## 3.67.1 - 2018-08-28

* `Aws\Glue` - New Glue APIs for creating, updating, reading and deleting Data Catalog resource-based policies.
* `Aws\XRay` - Support for new APIs that enable management of sampling rules.

## 3.67.0 - 2018-08-27

* `Aws\IoT` - This release adds support to create a Stream and Code signing for Amazon FreeRTOS job along with Over-the-air updates.
* `Aws\IoTAnalytics` - Added new listDatasetContent API that shows you the list of dataset contents for the corresponding versions
* `Aws\Redshift` - Documentation updates for redshift
* `Aws\signer` - AWS Signer is a new feature that allows Amazon FreeRTOS (AFR) Over The Air (OTA) customers to cryptographically sign code using code-signing certificates managed by AWS Certificate Manager. 

## 3.66.2 - 2018-08-25

* `Aws\Glue` - AWS Glue now supports data encryption at rest for ETL jobs and development endpoints. With encryption enabled, when you run ETL jobs, or development endpoints, Glue will use AWS KMS keys to write encrypted data at rest. You can also encrypt the metadata stored in the Glue Data Catalog using keys that you manage with AWS KMS. Additionally, you can use AWS KMS keys to encrypt the logs generated by crawlers and ETL jobs as well as encrypt ETL job bookmarks. Encryption settings for Glue crawlers, ETL jobs, and development endpoints can be configured using the security configurations in Glue. Glue Data Catalog encryption can be enabled via the settings for the Glue Data Catalog.

## 3.66.1 - 2018-08-24

* `Aws\CloudWatchEvents` - Added Fargate and NetworkConfiguration support to EcsParameters.
* `Aws\CognitoIdentityProvider` - Amazon Cognito now has API support for creating custom domains for our hosted UI for User Pools.

## 3.66.0 - 2018-08-23

* `Aws\Credentials` - Update ini parsing to handle unquoted components that contain equals signs.
* `Aws\IoT` - This release adds support for IoT Thing Group Indexing and Searching functionality.
* `Aws\IoTAnalytics` - AWS IoT Analytics announces three new features: (1) Bring Your Custom Container - import your custom authored code containers. (2) Automate Container Execution - lets you automate the execution of containers hosting custom authored analytical code or Jupyter Notebooks to perform continuous analysis. (3) Incremental Data Capture with Customizable Time Windows - enables users to perform analysis on new incremental data captured since the last analysis.
* `Aws\LexModelBuildingService` - Amazon Lex builds bot in two stages. After the first it sets status to READY_BASIC_TESTING. In this state the bot will match user inputs that exactly match the utterances configured for the bot's intents and values in the slot types. 
* `Aws\MediaLive` - Adds two APIs for working with Channel Schedules: BatchUpdateSchedule and DescribeSchedule. These APIs allow scheduling actions for SCTE-35 message insertion and for static image overlays.
* `Aws\Rekognition` - This release introduces a new API called DescribeCollection to Amazon Rekognition. You can use DescribeCollection to get information about an existing face collection. Given the ID for a face collection, DescribeCollection returns the following information: the number of faces indexed into the collection, the version of the face detection model used by the collection, the Amazon Resource Name (ARN) of the collection and the creation date/time of the collection.

## 3.65.2 - 2018-08-22

* `Aws\Snowball` - Snowball job states allow customers to track the status of the Snowball job. We are launching a new Snowball job state "WithSortingFacility"! When customer returns the Snowball to AWS, the device first goes to a sorting facility before it reaches an AWS data center. Many customers have requested us to add a new state to reflect the presence of the device at the sorting facility for better tracking. Today when a customer returns the Snowball, the state first changes from "InTransitToAWS" to "WithAWS". With the addition of new state, the device will move from "InTransitToAWS" to "WithAWSSortingFacility", and then to "WithAWS". There are no other changes to the API at this time besides adding this new state.

## 3.65.1 - 2018-08-21

* `Aws\DLM` - Documentation updates for Lifecycle
* `Aws\EC2` - Added support for T3 Instance type in EC2. To learn more about T3 instances, please see https://aws.amazon.com/ec2/instance-types/t3/
* `Aws\ElasticBeanstalk` - Elastic Beanstalk adds the "Privileged" field to the "CPUUtilization" type, to support enhanced health reporting in Windows environments.
* `Aws\RDS` - Adds a paginator for the DescribeDBClusters operation.
* `Aws\Signature\SignatureV4` - Updates the SignatureV4 presigning process to not sign, and subsequently require on use, the X-Amz-Security-Token header when it's already signed in the query string.

## 3.65.0 - 2018-08-20

* `Aws\DynamoDB` - Added SSESpecification block to update-table command which allows users to modify table Server-Side Encryption. Added two new fields (SSEType and KMSMasterKeyId) to SSESpecification block used by create-table and update-table commands. Added new SSEDescription Status value UPDATING.
* `Aws\MediaConvert` - This release fixes backward-incompatible changes from a previous release. That previous release changed non-required job settings to required, which prevented jobs and job templates from merging correctly. The current change removes validation of required settings from the SDK and instead centralizes the validation in the service API. For information on required settings, see the Resources chapter of the AWS Elemental MediaConvert API Reference https://docs.aws.amazon.com/mediaconvert/latest/apireference/resources.html
* `Aws\Signature\SignatureV4` - Add support for pre-signing additional headers. Any additional headers that are supplied and signed must be included when sending the request.
* `Aws\Test` - Refactored namespaces of tests to prepare for PHPUnit6
* `Aws\Test` - Refactored exception tests to prepare for PHPUnit6

## 3.64.15 - 2018-08-17

* `Aws\DAX` - DAX CreateClusterRequest is updated to include IamRoleArn as a required request parameter. 
* `Aws\SageMaker` - Added an optional boolean parameter, 'DisassociateLifecycleConfig', to the UpdateNotebookInstance operation. When set to true, the lifecycle configuration associated with the notebook instance will be removed, allowing a new one to be set via a new 'LifecycleConfigName' parameter.
* `Aws\SecretsManager` - Documentation updates for Secrets Manager

## 3.64.14 - 2018-08-16

* `Aws\ApplicationDiscoveryService` - The Application Discovery Service's Continuous Export APIs allow you to analyze your on-premises server inventory data, including system performance and network dependencies, in Amazon Athena.
* `Aws\EC2` - The 'Attribute' parameter DescribeVolumeAttribute request has been marked as required - the API has always required this parameter, but up until now this wasn't reflected appropriately in the SDK.
* `Aws\MediaConvert` - Added WriteSegmentTimelineInRepresentation option for Dash Outputs
* `Aws\Redshift` - You can now resize your Amazon Redshift cluster quickly. With the new ResizeCluster action, your cluster is available for read and write operations within minutes
* `Aws\SSM` - AWS Systems Manager Inventory now supports groups to quickly see a count of which managed instances are and arent configured to collect one or more Inventory types
* `Aws\TraceMiddleware` - Removed potential PCRE vulnerability.

## 3.64.13 - 2018-08-15

* `Aws\` - We are launching AWS IoT Core and AWS IoT Device Mgmt in GovCloud (us-gov-west-1) region.
* `Aws\DeviceFarm` - Support for running tests in a custom environment with live logs/video streaming, full test features parity and reduction in overall test execution time.

## 3.64.12 - 2018-08-14

* `Aws\AutoScaling` - Add batch operations for creating/updating and deleting scheduled scaling actions.
* `Aws\CloudFront` - Lambda@Edge Now Provides You Access to the Request Body for HTTP POST/PUT Processing. With this feature, you can now offload more origin logic to the edge and improve end-user latency. Developers typically use Web/HTML forms or Web Beacons/Bugs as a mechanism to collect data from the end users and then process that data at their origins servers. For example, if you are collecting end user behavior data through a web beacon on your website, you can use this feature to access the user behavior data and directly log it to an Amazon Kinesis Firehose endpoint from the Lambda function, thereby simplifying your origin infrastructure.
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service adds support for no downtime, in-place upgrade for Elasticsearch version 5.1 and above.

## 3.64.11 - 2018-08-13

* `Aws\SageMaker` - SageMaker updated the default endpoint URL to support Private Link via the CLI/SDK.

## 3.64.10 - 2018-08-10

* `Aws\MediaConvert` - This release adds support for a new rate control mode, Quality-Defined Variable Bitrate (QVBR) encoding, includes updates to optimize transcoding performance, and resolves previously reported bugs.
* `Aws\MediaPackage` - Elemental MediaPackage is now available in the SFO region.
* `Aws\RDS` - Documentation updates for rds

## 3.64.9 - 2018-08-09

* `Aws\DAX` - Add the SSESpecification field to CreateCluster to allow creation of clusters with server-side encryption, and add the SSEDescription field to DescribeClusters to display the status of server-side encryption for a cluster. 
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for Docker volumes and Docker volume drivers. Customers can now configure their ECS Tasks to use Docker volumes, enabling stateful and storage-intensive applications to be deployed on ECS.
* `Aws\RDS` - Launch RDS Aurora Serverless

## 3.64.8 - 2018-08-08

* `Aws\SSM` - AWS Systems Manager Automation is launching two new features for Automation Execution Rate Control based on tags and customized parameter maps. With the first feature, customer can target their resources by specifying a Tag with Key/Value. With the second feature, Parameter maps rate control, customers can benefit from customization of input parameters.
* `Aws\SecretsManager` - This release introduces a ForceDeleteWithoutRecovery parameter to the DeleteSecret API enabling customers to force the deletion of a secret without any recovery window

## 3.64.7 - 2018-08-07

* `Aws\CloudWatchLogs` - Documentation Update
* `Aws\CodeBuild` - Release semantic versioning feature for CodeBuild
* `Aws\EC2` - Amazon VPC Flow Logs adds support for delivering flow logs directly to S3
* `Aws\Pinpoint` - This release includes a new batch API call for Amazon Pinpoint which can be used to update endpoints and submit events. This call will accept events from clients such as mobile devices and AWS SDKs. This call will accept requests which has multiple endpoints and multiple events attached to those endpoints in a single call. This call will update the endpoints attached and will ingest events for those endpoints. The response from this call will be a multipart response per endpoint/per event submitted.
* `Aws\SSM` - Two new filters ExecutionStage and DocumentName will be added to ListCommands so that customers will have more approaches to query their commands.

## 3.64.6 - 2018-08-06

* `Aws\DynamoDB` -  Amazon DynamoDB Point-in-time recovery (PITR) provides continuous backups of your table data. DynamoDB now supports the ability to self-restore a deleted PITR enabled table. Now, when a table with PITR enabled is deleted, a system backup is automatically created and retained for 35 days (at no additional cost). System backups allow you to restore the deleted PITR enabled table to the state it was just before the point of deletion. For more information, see the Amazon DynamoDB Developer Guide.
* `Aws\Health` - Updates the ARN structure vended by AWS Health API. All ARNs will now include the service and type code of the associated event, as vended by DescribeEventTypes.

## 3.64.5 - 2018-08-03

* `Aws\AlexaForBusiness` - Documentation updates for AWS Alexa For Business

## 3.64.4 - 2018-08-02

* `Aws\Greengrass` - AWS Greengrass is now available in the Dublin, Ireland (Europe) region, eu-west-1.
* `Aws\Kinesis` - This update introduces SubscribeToShard and RegisterStreamConsumer APIs which allows for retrieving records on a data stream over HTTP2 with enhanced fan-out capabilities. With this new feature the Java SDK now supports event streaming natively which will allow you to define payload and exception structures on the client over a persistent connection. For more information, see Developing Consumers with Enhanced Fan-Out in the Kinesis Developer Guide.
* `Aws\Polly` - Amazon Polly enables female voice Aditi to speak Hindi language
* `Aws\ResourceGroups` - AWS Resource Groups service added a new feature to filter group resources by resource-type when using the ListGroupResources operation.
* `Aws\SSM` - This release updates AWS Systems Manager APIs to let customers create and use service-linked roles to register and edit Maintenance Window tasks.

## 3.64.3 - 2018-08-01

* `Aws\StorageGateway` - AWS Storage Gateway now enables you to create stored volumes with AWS KMS support.
* `Aws\TranscribeService` - With this update Amazon Transcribe now supports channel identification. It transcribes audio from separate channels and combines them into a single transcription. 

## 3.64.2 - 2018-07-31

* `Aws\Connect` - This update includes the new User Management APIs and the Federation API used for SAML authentication. The User Management APIs let you create and manage users in your Amazon Connect instance programmatically. The Federation API enables authentication between AWS and your existing identity provider using tokens.
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service adds support for enabling Elasticsearch error logs, providing you valuable information for troubleshooting your Elasticsearch domains quickly and easily. These logs are published to the Amazon CloudWatch Logs service and can be turned on or off at will.
* `Aws\IoT` - As part of this release we are introducing a new IoT security service, AWS IoT Device Defender, and extending capability of AWS IoT to support Step Functions rule action. The AWS IoT Device Defender is a fully managed service that helps you secure your fleet of IoT devices. For more details on this new service, go to https://aws.amazon.com/iot-device-defender. The Step Functions rule action lets you start an execution of AWS Step Functions state machine from a rule.
* `Aws\KMS` - Added a KeyID parameter to the ListAliases operation. This parameter allows users to list only the aliases that refer to a particular AWS KMS customer master key. All other functionality remains intact.
* `Aws\MediaConvert` - Fixes an issue with modeled timestamps being labeled with the incorrect format.

## 3.64.1 - 2018-07-30

* `Aws\CloudHSMV2` - This update to the AWS CloudHSM API adds copy-backup-to-region, which allows you to copy a backup of a cluster from one region to another. The copied backup can be used in the destination region to create a new AWS CloudHSM cluster as a clone of the original cluster. 
* `Aws\DirectConnect` - 1. awsDeviceV2 field is introduced for Connection/Lag/Interconnect/VirtualInterface/Bgp Objects, while deprecating the awsDevice field for Connection/Lag/Interconnect Objects. 2. region field is introduced for VirtualInterface/Location objects 
* `Aws\Glacier` - Documentation updates for glacier
* `Aws\Glue` - Glue Development Endpoints now support association of multiple SSH public keys with a development endpoint.
* `Aws\IoT` - get rid of documentParameters field from CreateJob API
* `Aws\MQ` - Modified the CreateBroker, UpdateBroker, and DescribeBroker operations to support integration with Amazon CloudWatch Logs. Added a field to indicate the IP address(es) that correspond to wire-level endpoints of broker instances. While a single-instance broker has one IP address, an active/standby broker for high availability has 2 IP addresses. Added fields to indicate the time when resources were created. Updated documentation for Amazon MQ.
* `Aws\SageMaker` - Added SecondaryStatusTransitions to DescribeTrainingJob to provide more visibility into SageMaker training job progress and lifecycle.

## 3.64.0 - 2018-07-26

* `Aws\Api` - Updates parsers and serializers to handle the timestampFormat trait.
* `Aws\CodeBuild` - Add artifacts encryptionDisabled and build encryptionKey.
* `Aws\EC2` - This change provides the EC2/Spot customers with two new allocation strategies -- LowestN for Spot instances, and OD priority for on-demand instances.
* `Aws\Greengrass` - Documentation updates for Greengrass Local Resource Access feature
* `Aws\Inspector` - inspector will return ServiceTemporarilyUnavailableException when service is under stress
* `Aws\Redshift` - When we make a new version of Amazon Redshift available, we update your cluster during its maintenance window. By selecting a maintenance track, you control whether we update your cluster with the most recent approved release, or with the previous release. The two values for maintenance track are current and trailing. If you choose the current track, your cluster is updated with the latest approved release. If you choose the trailing track, your cluster is updated with the release that was approved previously.The new API operation for managing maintenance tracks for a cluster is DescribeClusterTracks. In addition, the following API operations have new MaintenanceTrackName parameters: Cluster, PendingModifiedValues, ModifyCluster, RestoreFromClusterSnapshot, CreateCluster, Snapshot
* `Aws\SSM` - This release updates AWS Systems Manager APIs to allow customers to attach labels to history parameter records and reference history parameter records via labels. It also adds Parameter Store integration with AWS Secrets Manager to allow referencing and retrieving AWS Secrets Manager's secrets from Parameter Store.

## 3.63.7 - 2018-07-25

* `Aws\EC2` - R5 is the successor to R4 in EC2's memory-optimized instance family. R5d is a variant of R5 that has local NVMe SSD. Z1d instances deliver both high compute and high memory. Z1d instances use custom Intel Xeon Scalable Processors running at up to 4.0 GHz, powered by sustained all-core Turbo Boost. They are available in 6 sizes, with up to 48 vCPUs, 384 GiB of memory, and 1.8 TB of local NVMe storage.
* `Aws\ECS` - This release of Amazon Elastic Container Service (Amazon ECS) introduces support for private registry authentication using AWS Secrets Manager. With private registry authentication, private Docker images can be used in a task definition.
* `Aws\ElasticLoadBalancingv2` - We are introducing two new actions in Application Load Balancer. Redirects and Fixed Response. These features will allow you to improve user experience and security posture. By using redirect actions in your Application Load Balancer, you can improve the security of your user requests and by using fixed-response, you can enhance the customer experience by displaying branded error pages during application maintenance or outages.

## 3.63.6 - 2018-07-24

* `Aws\DynamoDB` - With this SDK update, APIs UpdateGlobalTableSettings and DescribeGlobalTableSettings now allow consistently configuring AutoScaling settings for a DynamoDB global table. Previously, they would only allow consistently setting IOPS. Now new APIs are being released, existing APIs are being extended.

## 3.63.5 - 2018-07-20

* `Aws\ConfigService` - Setting internal length limits on resourceId for APIs. 
* `Aws\DLM` - Update documentation for Amazon Data Lifecycle Manager.

## 3.63.4 - 2018-07-19

* `Aws\MediaPackage` - Adds support for DASH OriginEnpoints with multiple media presentation description periods triggered by presence of SCTE-35 ad markers in Channel input streams.

## 3.63.3 - 2018-07-18

* `Aws\IoTAnalytics` - This change allows publishing of channel/datastore size as part of the describe-channel/describe-datastore APIs. We introduce an optional boolean parameter 'includeStatistics' in the Describe request. If the user sets this parameter to true, the describe response will return the resource size and timestamp at which the size was recorded. If the parameter is set to false, the size won't be computed or returned.

## 3.63.2 - 2018-07-17

* `Aws\Comprehend` - This release gives customers the ability to tokenize (find word boundaries) text and for each word provide a label for the part of speech, using the DetectSyntax operation. This API is useful to analyze text for specific conditions like for example finding nouns and the correlating adjectives to understand customer feedback. 
* `Aws\Polly` - Amazon Polly adds new API for asynchronous synthesis to S3
* `Aws\SageMaker` - Amazon SageMaker has added the capability for customers to run fully-managed, high-throughput batch transform machine learning models with a simple API call. Batch Transform is ideal for high-throughput workloads and predictions in non-real-time scenarios where data is accumulated over a period of time for offline processing.
* `Aws\Snowball` - AWS Snowball Edge announces the availability of Amazon EC2 compute instances that run on the device. AWS Snowball Edge is a 100-TB ruggedized device built to transfer data into and out of AWS with optional support for local Lambda-based compute functions. With this feature, developers and administrators can run their EC2-based applications on the device providing them with an end to end vertically integrated AWS experience. Designed for data pre-processing, compression, machine learning, and data collection applications, these new instances, called SBE1 instances, feature 1.8 GHz Intel Xeon D processors up to 16 vCPUs, and 32 GB of memory. The SBE1 instance type is available in four sizes and multiple instances can be run on the device at the same time. Customers can now run compute instances using the same Amazon Machine Images (AMIs) that are used in Amazon EC2.

## 3.63.1 - 2018-07-13

* `Aws\AppStream` - This API update adds support for sharing AppStream images across AWS accounts within the same region.
* `Aws\KinesisVideo` - Adds support for HLS video playback of Kinesis Video streams using the KinesisVideo client by including "GET_HLS_STREAMING_SESSION_URL" as an additional APIName parameter in the GetDataEndpoint input.
* `Aws\KinesisVideoArchivedMedia` - Adds support for HLS video playback of Kinesis Video streams by providing the GetHLSStreamingSessionURL function in the KinesisVideoArchivedMedia client.

## 3.63.0 - 2018-07-12

* `Aws\AppSync` - This release adds support for configuring HTTP endpoints as data sources for your AWS AppSync GraphQL API.
* `Aws\CodeBuild` - Update CodeBuild CreateProject API - serviceRole is a required input 
* `Aws\DLM` - Amazon Data Lifecycle Manager (DLM) for EBS Snapshots provides a simple, automated way to back up data stored on Amazon EBS volumes. You can define backup and retention schedules for EBS snapshots by creating lifecycle policies based on tags. With this feature, you no longer have to rely on custom scripts to create and manage your backups. This feature is now available in the US East (N. Virginia), US West (Oregon), and Europe (Ireland) AWS regions at no additional cost.
* `Aws\EFS` - Amazon EFS now allows you to instantly provision the throughput required for your applications independent of the amount of data stored in your file system, allowing you to optimize throughput for your applications performance needs. Starting today, you can provision the throughput your applications require quickly with a few simple steps using AWS Console, AWS CLI or AWS API to achieve consistent performance.
* `Aws\EMR` - Documentation updates for EMR.
* `Aws\IAM` - SDK release to support IAM delegated administrator feature. The feature lets customers attach permissions boundary to IAM principals. The IAM principals cannot operate exceeding the permission specified in permissions boundary.

## 3.62.14 - 2018-07-11

* `Aws\APIGateway` - Support for fine grain throttling for API gateway. 
* `Aws\CostExplorer` - Starting today, you can access custom Reserved Instance (RI) purchase recommendations for your Amazon Redshift, Amazon ElastiCache, and Amazon Elasticsearch reservations via AWS Cost Explorer API, in addition to accessing RI purchase recommendations for your Amazon EC2 and Amazon RDS reservations.
* `Aws\S3` - S3 Select support for BZIP2 compressed input files
* `Aws\SSM` - Support Conditional Branching OnFailure for SSM Automation
* `Aws\SageMaker` - SageMaker has added support for FRA and SYD regions.

## 3.62.13 - 2018-07-10

* `Aws\AppStream` - This API update adds pagination to the DescribeImages API to support future features and enhancements.
* `Aws\CodeBuild` - API changes to CodeBuild service, support report build status for Github sources
* `Aws\EC2` - Support CpuOptions field in Launch Template data and allow Launch Template name to contain hyphen.
* `Aws\Glue` - AWS Glue adds the ability to crawl DynamoDB tables.
* `Aws\OpsWorks` - Documentation updates for AWS OpsWorks Stacks.

## 3.62.12 - 2018-07-10

* `Aws\ApplicationAutoScaling` - Documentation updates for application-autoscaling

## 3.62.11 - 2018-07-09

* `Aws\ApplicationAutoScaling` - The release adds support for custom resource auto scaling.
* `Aws\CostExplorer` - AWS Cost Explorer provides you with Reserved Instance (RI) purchase recommendations based on your total cross-account Amazon EC2 and Amazon RDS usage. Starting today, linked accounts can also access custom RI purchase recommendations for specific linked accounts directly via AWS Cost Explorer API.
* `Aws\DatabaseMigrationService` - Added support for DmsTransfer endpoint type and support for re-validate option in table reload API.
* `Aws\Lambda` - Add support for .NET Core 2.1 to Lambda.
* `Aws\TranscribeService` - You can now specify an Amazon S3 output bucket to store the transcription of your audio file when you call the StartTranscriptionJob operation. 

## 3.62.10 - 2018-07-06

* `Aws\MediaConvert` - This release adds support for the following 1) users can specify tags to be attached to queues, presets, and templates during creation of those resources on MediaConvert. 2) users can now view the count of jobs in submitted state and in progressing state on a per queue basis.
* `Aws\ServerlessApplicationRepository` - Added required fields and documentation updates for AWS Serverless Application Repository.

## 3.62.9 - 2018-07-05

* `Aws\Pinpoint` - This release of the Amazon Pinpoint SDK adds the ability to create complex segments and validate phone numbers for SMS messages. It also adds the ability to get or delete endpoints based on user IDs, remove attributes from endpoints, and list the defined channels for an app.
* `Aws\SageMaker` - Amazon SageMaker NotebookInstances supports 'Updating' as a NotebookInstanceStatus. In addition, DescribeEndpointOutput now includes Docker repository digest of deployed Model images.

## 3.62.8 - 2018-07-03

* `Aws\ACM` - Adds a "CertificateValidated" waiter to AWS Certificate Manager clients, which polls on a new certificate's validation state.
* `Aws\EC2` - Added support for customers to tag EC2 Dedicated Hosts
* `Aws\Lambda` - General availability of AWS Lambda in the China Northwest (cn-northwest-1) region. For more information, see the AWS Lambda developer guide.
* `Aws\Redshift` - Feature 1 - On-demand cluster release version - When Amazon Redshift releases a new cluster version, you can choose to upgrade to that version immediately instead of waiting until your next maintenance window. You can also choose to roll back to a previous version. The two new APIs added for managing cluster release version are - ModifyClusterDbRevision, DescribeClusterDbRevisions. Feature 2 - Upgradeable reserved instance - You can now exchange one Reserved Instance for a new Reserved Instance with no changes to the terms of your existing Reserved Instance (term, payment type, or number of nodes). The two new APIs added for managing these upgrades are - AcceptReservedNodeExchange, GetReservedNodeExchangeOfferings. 

## 3.62.7 - 2018-07-02

* `Aws\SSM` - Execution History and StartAssociationOnce release for State Manager. Users now have the ability to view association execution history with DescribeAssociationExecutions and DescribeAssociationExecutionTargets. Users can also execute an association by calling StartAssociationOnce.

## 3.62.6 - 2018-06-29

* `Aws\SecretsManager` - New SDK code snippet examples for the new APIs released for the Resource-based Policy support in Secrets Manager

## 3.62.5 - 2018-06-28

* `Aws\ElasticBeanstalk` - Elastic Beanstalk adds "Suspended" health status to the EnvironmentHealthStatus enum type and updates document.
* `Aws\Lambda` - Support for SQS as an event source.
* `Aws\StorageGateway` - AWS Storage Gateway now enables you to use Server Message Block (SMB) protocol to store and access objects in Amazon Simple Storage Service (S3). 

## 3.62.4 - 2018-06-27

* `Aws\CloudFront` - Unpublish delete-service-linked-role API.
* `Aws\CodePipeline` - UpdatePipeline may now throw a LimitExceededException when adding or updating Source Actions that use periodic checks for change detection
* `Aws\Comprehend` - This release gives customers the option to batch process a set of documents stored within an S3 bucket in addition to the existing synchronous nature of the current Comprehend API.
* `Aws\SageMaker` - SageMaker has added support for the Asia Pacific (Seoul) region.
* `Aws\SecretsManager` - Documentation updates for secretsmanager

## 3.62.3 - 2018-06-26

* `Aws\Inspector` - Introduce four new APIs to view and preview Exclusions. Exclusions show which intended security checks are excluded from an assessment, along with reasons and recommendations to fix. The APIs are CreateExclusionsPreview, GetExclusionsPreview, ListExclusions, and DescribeExclusions.
* `Aws\S3` - Add AllowQuotedRecordDelimiter to Amazon S3 Select API. Please refer to https://docs.aws.amazon.com/AmazonS3/latest/API/RESTObjectSELECTContent.html for usage details.
* `Aws\SecretsManager` - This release adds support for resource-based policies that attach directly to your secrets. These policies provide an additional way to control who can access your secrets and what they can do with them. For more information, see https://docs.aws.amazon.com/secretsmanager/latest/userguide/auth-and-access_resource-based-policies.html in the Secrets Manager User Guide.

## 3.62.2 - 2018-06-22

* `Aws\AlexaForBusiness` -  Introduce DeviceNotRegisteredException for AWSMoneypenny
* `Aws\AppStream` - This API update enables customers to find their VPC private IP address and ENI ID associated with AppStream streaming sessions.
* `Aws\Translate` - General availability release of Amazon Translate in the GovCloud West (us-gov-west-1) region. For more information, see the Amazon Translate developer guide.

## 3.62.1 - 2018-06-21

* `Aws\CloudDirectory` - SDK release to support Flexible Schema initiative being carried out by Amazon Cloud Directory. This feature lets customers using new capabilities like: variant typed attributes, dynamic facets and AWS managed Cloud Directory schemas.

## 3.62.0 - 2018-06-21

* `Aws\Macie` - Amazon Macie is a security service that uses machine learning to automatically discover, classify, and protect sensitive data in AWS. With this release, we are launching the following Macie HTTPS API operations: AssociateMemberAccount, AssociateS3Resources, DisassociateMemberAccount, DisassociateS3Resources, ListMemberAccounts, ListS3Resources, and UpdateS3Resources. With these API operations you can issue HTTPS requests directly to the service.
* `Aws\Neptune` - Deprecates the PubliclyAccessible parameter that is not supported by Amazon Neptune.
* `Aws\SSM` - Adds Amazon Linux 2 support to Patch Manager

## 3.61.10 - 2018-06-20

* `Aws\ACMPCA` - CA Restore is a new feature within AWS Certificate Manager Private Certificate Authority (ACM PCA) that allows you to restore a private certificate authority that has been deleted. When you issue the DeleteCertificateAuthority call, you can now specify the number of days (7-30, with 30 being the default) in which the private certificate authority will remain in the DELETED state. During this time, the private certificate authority can be restored with the RestoreCertificateAuthority API call and then be returned to the PENDING_CERTIFICATE or DISABLED state, depending upon the state prior to deletion. Summary of API Changes: 1). Added RestoreCertificateAuthority API call; 2). Added optional PermanentDeletionTimeInDays parameter to DeleteCertificateAuthority API call. If this parameter is not specified, the DeleteCertificateAuthority API call will use a 30 day restore period as default.
* `Aws\MediaLive` - AWS Elemental MediaLive now makes Reserved Outputs and Inputs available through the AWS Management Console and API. You can reserve outputs and inputs with a 12 month commitment in exchange for discounted hourly rates. Pricing is available at https://aws.amazon.com/medialive/pricing/
* `Aws\RDS` - This release adds a new parameter to specify the retention period for Performance Insights data for RDS instances. You can either choose 7 days (default) or 731 days. For more information, see Amazon RDS Documentation.

## 3.61.9 - 2018-06-19

* `Aws\Aws\Api\Service` - Added a getter for the Service ID property.
* `Aws\Rekognition` - Documentation updates for rekognition

## 3.61.8 - 2018-06-15

* `Aws\Aws\Signature` - Added the ability for signatures to be generated off of \DateTimeInterface objects that are not based on \DateTime.
* `Aws\MediaConvert` - This release adds language code support according to the ISO-639-3 standard. Custom 3-character language codes are now supported on input and output for both audio and captions.

## 3.61.7 - 2018-06-14

* `Aws\APIGateway` - Support for PRIVATE endpoint configuration type
* `Aws\DynamoDB` - Added two new fields SSEType and KMSMasterKeyArn to SSEDescription block in describe-table output.
* `Aws\IoTAnalytics` - With this release, AWS IoT Analytics allows you to tag resources. Tags are metadata that you can create and use to manage your IoT Analytics resources. For more information about tagging, see AWS Tagging Strategies. For technical documentation, look for the tagging operations in the AWS IoT Analytics API reference or User Guide.

## 3.61.6 - 2018-06-13

* `Aws\CloudHSMV2` - We are launching CloudHSMv2 in LHR (eu-west-2).
* `Aws\Inspector` - Releases Amazon Inspector, a security assessment service, to the AWS GovCloud (US) region.
* `Aws\SSM` - Added support for new parameter, CloudWatchOutputConfig, for SendCommand API. Users can now have RunCommand output sent to CloudWatchLogs.
* `Aws\ServiceCatalog` - Introduced new length limitations for few of the product fields.

## 3.61.5 - 2018-06-12

* `Aws\DeviceFarm` - Adding VPCEndpoint support for Remote access. Allows customers to be able to access their private endpoints/services running in their VPC during remote access.
* `Aws\ECS` - Introduces daemon scheduling capability to deploy one task per instance on selected instances in a cluster. Adds a "force" flag to the DeleteService API to delete a service without requiring to scale down the number of tasks to zero.

## 3.61.4 - 2018-06-11

* `Aws\CloudDirectory` - Amazon Cloud Directory now supports optional attributes on Typed Links, giving users the ability to associate and manage data on Typed Links. 
* `Aws\RDS` - Changed lists of valid EngineVersion values to links to the RDS User Guide.
* `Aws\StorageGateway` -  AWS Storage Gateway now enables you to create cached volumes and tapes with AWS KMS support.

## 3.61.3 - 2018-06-08

* `Aws\MediaTailor` - Fixes a bug in the request URIs for MediaTailor PlaybackConfiguration operations.

## 3.61.2 - 2018-06-07

* `Aws\MediaLive` - AWS Elemental MediaLive now makes channel log information available through Amazon CloudWatch Logs. You can set up each MediaLive channel with a logging level; when the channel is run, logs will automatically be published to your account on Amazon CloudWatch Logs

## 3.61.1 - 2018-06-05

* `Aws\CostExplorer` - Cost Explorer API is providing programmatic access to RI saving metrics to enable customers to optimize their reservations.
* `Aws\Polly` - Amazon Polly adds new French voice - "Lea"
* `Aws\RDS` - This release adds customizable processor features for RDS instances.
* `Aws\SecretsManager` - Documentation updates for secretsmanager
* `Aws\Shield` - DDoS Response Team access management for AWS Shield

## 3.61.0 - 2018-06-04

* `Aws\AppStream` - Amazon AppStream 2.0 adds support for Google Drive for G Suite. With this feature, customers will be able to connect their G Suite accounts with AppStream 2.0 and enable Google Drive access for an AppStream 2.0 stack. Users of the stack can then link their Google Drive using their G Suite login credentials and use their existing files stored in Drive with their AppStream 2.0 applications. File changes will be synced automatically to Google cloud. 
* `Aws\EC2` - You are now able to use instance storage (up to 3600 GB of NVMe based SSD) on M5 instances, the next generation of EC2's General Purpose instances in us-east-1, us-west-2, us-east-2, eu-west-1 and ca-central-1. M5 instances offer up to 96 vCPUs, 384 GiB of DDR4 instance memory, 25 Gbps in Network bandwidth and improved EBS and Networking bandwidth on smaller instance sizes and provide a balance of compute, memory and network resources for many applications.
* `Aws\EKS` - Amazon Elastic Container Service for Kubernetes (Amazon EKS) is a fully managed service that makes it easy to deploy, manage, and scale containerized applications using Kubernetes on AWS. Amazon EKS runs the Kubernetes control plane for you across multiple AWS availability zones to eliminate a single point of failure. Amazon EKS is certified Kubernetes conformant so you can use existing tooling and plugins from partners and the Kubernetes community. Applications running on any standard Kubernetes environment are fully compatible and can be easily migrated to Amazon EKS. 
* `Aws\MediaConvert` - This release adds the support for Common Media Application Format (CMAF) fragmented outputs, RF64 WAV audio output format, and HEV1 or HEVC1 MP4 packaging types when using HEVC in DASH or CMAF outputs.
* `Aws\MigrationHub` - Documentation updates for AWS Migration Hub
* `Aws\SageMaker` - Amazon SageMaker has added the ability to run hyperparameter tuning jobs. A hyperparameter tuning job will create and evaluate multiple training jobs while tuning algorithm hyperparameters, to optimize a customer specified objective metric.

## 3.60.0 - 2018-06-01

* `Aws\DirectoryService` - Added ResetUserPassword API. Customers can now reset their users' passwords without providing the old passwords in Simple AD and Microsoft AD.
* `Aws\IoT` - We are releasing force CancelJob and CancelJobExecution functionalities to customers.
* `Aws\MediaTailor` - AWS Elemental MediaTailor is a personalization and monetization service that allows scalable server-side ad insertion. The service enables you to serve targeted ads to viewers while maintaining broadcast quality in over-the-top (OTT) video applications. This SDK allows user access to the AWS Elemental MediaTailor configuration interface.
* `Aws\Redshift` - Documentation updates for redshift
* `Aws\SNS` - The SNS Subscribe API has been updated with two new optional parameters: Attributes and ReturnSubscriptionArn. Attributes is a map of subscription attributes which can be one or more of: FilterPolicy, DeliveryPolicy, and RawMessageDelivery. ReturnSubscriptionArn is a boolean parameter that overrides the default behavior of returning "pending confirmation" for subscriptions that require confirmation instead of returning the subscription ARN.
* `Aws\SageMaker` - SageMaker has added support for the Asia Pacific (Tokyo) region.

## 3.59.0 - 2018-05-31

* `Aws\ElasticLoadBalancingv2` - This release of Elastic Load Balancing introduces user authentication on Application Load Balancer.
* `Aws\Neptune` - Amazon Neptune is a fast, reliable graph database service that makes it easy to build and run applications that work with highly connected datasets. Neptune supports popular graph models Property Graph and W3C's Resource Description Frame (RDF), and their respective query languages Apache TinkerPop Gremlin 3.3.2 and SPARQL 1.1. 

## 3.58.0 - 2018-05-29

* `Aws\PI` - Performance Insights is a feature of Amazon Relational Database Service (RDS) that helps you quickly assess the load on your database, and determine when and where to take action. You can use the SDK to retrieve Performance Insights data and integrate your monitoring solutions.

## 3.57.1 - 2018-05-25

* `Aws\AppStream` - This API update enables customers to control whether users can transfer data between their local devices and their streaming applications through file uploads and downloads, clipboard operations, or printing to local devices
* `Aws\ConfigService` - AWS Config adds support for retention period, allowing you to specify a retention period for your AWS Config configuration items.
* `Aws\Glue` - AWS Glue now sends a delay notification to Amazon CloudWatch Events when an ETL job runs longer than the specified delay notification threshold.
* `Aws\IoT` - We are exposing DELETION_IN_PROGRESS as a new job status in regards to the release of DeleteJob API.

## 3.57.0 - 2018-05-24

* `Aws\CodeBuild` - AWS CodeBuild Adds Support for Windows Builds.
* `Aws\Credentials\EcsCredentialProvider` - Disables proxies on EcsCredentialProvider credential lookups.
* `Aws\ElasticLoadBalancingv2` - Updated elasticloadbalancingV2 documentation with slow start mode details. The slow start mode can be used to gradually increase the number of requests forwarded by a load balancer to a newly added target in a target group. It provides a new target an opportunity to warm up before it can handle its fair share of requests received from the load balancer. Slow start mode is disabled by default and can be enabled on a per target group basis.
* `Aws\RDS` - This release adds CloudWatch Logs integration capabilities to RDS Aurora MySQL clusters
* `Aws\SecretsManager` - Documentation updates for secretsmanager
* `Aws\Test\S3` - Adds compliance tests for S3 addressing.

## 3.56.6 - 2018-05-22

* `Aws\ECS` - Amazon Elastic Container Service (ECS) adds service discovery for services that use host or bridged network mode. ECS can now also register instance IPs for active tasks using bridged and host networking with Route 53, making them available via DNS.
* `Aws\Inspector` - We are launching the ability to target all EC2 instances. With this launch, resourceGroupArn is now optional for CreateAssessmentTarget and UpdateAssessmentTarget. If resourceGroupArn is not specified, all EC2 instances in the account in the AWS region are included in the assessment target.

## 3.56.5 - 2018-05-21

* `Aws\CloudFormation` - 1) Filtered Update for StackSet based on Accounts and Regions: This feature will allow flexibility for the customers to roll out updates on a StackSet based on specific Accounts and Regions. 2) Support for customized ExecutionRoleName: This feature will allow customers to attach ExecutionRoleName to the StackSet thus ensuring more security and controlling the behavior of any AWS resources in the target accounts.

## 3.56.4 - 2018-05-18

* `Aws\IoT` - We are releasing DeleteJob and DeleteJobExecution APIs to allow customer to delete resources created using AWS IoT Jobs.
* `Aws\SES` - Fixed a broken link in the documentation for S3Action.

## 3.56.3 - 2018-05-17

* `Aws\CodeDeploy` - Documentation updates for codedeploy
* `Aws\CognitoIdentityProvider` - Amazon Cognito User Pools now supports federation for users to sign up and sign in with any identity provider following the OpenID Connect standard. Amazon Cognito User Pools now returns the User Pool's Amazon Resource Name (ARN) from the CreateUserPool, UpdateUserPool, and DescribeUserPool APIs.
* `Aws\EC2` - You are now able to use instance storage (up to 1800 GB of NVMe based SSD) on C5 instances, the next generation of EC2's compute optimized instances in us-east-1, us-west-2, us-east-2, eu-west-1 and ca-central-1. C5 instances offer up to 72 vCPUs, 144 GiB of DDR4 instance memory, 25 Gbps in Network bandwidth and improved EBS and Networking bandwidth on smaller instance sizes to deliver improved performance for compute-intensive workloads.You can now run bare metal workloads on EC2 with i3.metal instances. As a new instance size belonging to the I3 instance family, i3.metal instances have the same characteristics as other instances in the family, including NVMe SSD-backed instance storage optimized for low latency, very high random I/O performance, and high sequential read throughput. I3.metal instances are powered by 2.3 GHz Intel Xeon processors, offering 36 hyper-threaded cores (72 logical processors), 512 GiB of memory, and 15.2 TB of NVMe SSD-backed instance storage. These instances deliver high networking throughput and lower latency with up to 25 Gbps of aggregate network bandwidth using Elastic Network Adapter (ENA)-based Enhanced Networking.

## 3.56.2 - 2018-05-16

* `Aws\SecretsManager` - Documentation updates for secretsmanager
* `Aws\ServiceCatalog` - Users can now pass a new option to ListAcceptedPortfolioShares called portfolio-share-type with a value of AWS_SERVICECATALOG in order to access Getting Started Portfolios that contain selected products representing common customer use cases.

## 3.56.1 - 2018-05-15

* `Aws\ConfigService` - Update ResourceType enum with values for XRay resource

## 3.56.0 - 2018-05-14

* `Aws\CodeBuild` - Adding support for more override fields for StartBuild API, add support for idempotency token field for StartBuild API in AWS CodeBuild.
* `Aws\IoT1ClickDevicesService` - AWS IoT 1-Click makes it easy for customers to incorporate simple ready-to-use IoT devices into their workflows. These devices can trigger AWS Lambda functions that implement business logic. In order to build applications using AWS IoT 1-Click devices, programmers can use the AWS IoT 1-Click Devices API and the AWS IoT 1-Click Projects API. Learn more at https://aws.amazon.com/documentation/iot-1-click/
* `Aws\IoT1ClickProjects` - AWS IoT 1-Click makes it easy for customers to incorporate simple ready-to-use IoT devices into their workflows. These devices can trigger AWS Lambda functions that implement business logic. In order to build applications using AWS IoT 1-Click devices, programmers can use the AWS IoT 1-Click Devices API and the AWS IoT 1-Click Projects API. Learn more at https://aws.amazon.com/documentation/iot-1-click/.
* `Aws\Organizations` - Documentation updates for organizations

## 3.55.12 - 2018-05-10

* `Aws\Firehose` - With this release, Amazon Kinesis Data Firehose can convert the format of your input data from JSON to Apache Parquet or Apache ORC before storing the data in Amazon S3. Parquet and ORC are columnar data formats that save space and enable faster queries compared to row-oriented formats like JSON.

## 3.55.11 - 2018-05-10

* `Aws\GameLift` - AutoScaling Target Tracking scaling simplification along with StartFleetActions and StopFleetActions APIs to suspend and resume automatic scaling at will.

## 3.55.10 - 2018-05-10

* `Aws\Budgets` - Updating the regex for the NumericValue fields.
* `Aws\EC2` - Enable support for latest flag with Get Console Output
* `Aws\IotDataPlane` - With this release, we're adding support for ap-south-1 AWS region.
* `Aws\RDS` - Changes to support the Aurora MySQL Backtrack feature.

## 3.55.9 - 2018-05-08

* `Aws\EC2` - Enable support for specifying CPU options during instance launch.
* `Aws\Lightsail` - Lightsail is now available in regions eu-west-3, ap-northeast-2 and ca-central-1. 
* `Aws\RDS` - Correction to the documentation about copying unencrypted snapshots.

## 3.55.8 - 2018-05-07

* `Aws\AlexaForBusiness` - This release adds the new Device status "DEREGISTERED". This release also adds DEVICE_STATUS as the new DeviceEventType.
* `Aws\Budgets` - "With this release, customers can use AWS Budgets to monitor how much of their Amazon EC2, Amazon RDS, Amazon Redshift, and Amazon ElastiCache instance usage is covered by reservations, and receive alerts when their coverage falls below the threshold they define."
* `Aws\ElasticsearchService` - This change brings support for Reserved Instances to AWS Elasticsearch.
* `Aws\S3` - Added BytesReturned details for Progress and Stats Events for Amazon S3 Select . 

## 3.55.7 - 2018-05-04

* `Aws\GuardDuty` - Amazon GuardDuty is adding five new API operations for creating and managing filters. For each filter, you can specify a criteria and an action. The action you specify is applied to findings that match the specified criteria.

## 3.55.6 - 2018-05-03

* `Aws\AppSync` - This release adds support for authorizing your AWS AppSync endpoint with an OpenID Connect compliant service and also to configure your AWS AppSync endpoint to log requests to Amazon CloudWatch Logs.
* `Aws\ConfigService` - Update ResourceType enum with values for Lambda, ElasticBeanstalk, WAF and ElasticLoadBalancing resources
* `Aws\SecretsManager` - Documentation updates for secretsmanager
* `Aws\Test\Build\Changelog` - Add tests to validate location, naming, and JSON compilability of ChangelogDocuments.
* `Aws\WorkSpaces` - Amazon WorkSpaces is now available in ca-central-1

## 3.55.5 - 2018-05-02

* `Aws\ACM` - Documentation updates for acm
* `Aws\CodePipeline` - Added support for webhooks with accompanying definitions as needed in the AWS CodePipeline API Guide.
* `Aws\EC2` - Amazon EC2 Fleet is a new feature that simplifies the provisioning of Amazon EC2 capacity across different EC2 instance types, Availability Zones, and the On-Demand, Reserved Instance, and Spot Instance purchase models. With a single API call, you can now provision capacity to achieve desired scale, performance, and cost.
* `Aws\SSM` - Added support for new parameter, DocumentVersion, for SendCommand API. Users can now specify version of SSM document to be executed on the target(s).
* `Aws\Test\Integ` - Adds the ability for Integ/Smoke tests to check status codes. Updates ECS Handling errors to use a status code check.

## 3.55.4 - 2018-04-30

* `Aws\AlexaForBusiness` - Adds ListDeviceEvents API to get a paginated list of device events (such as ConnectionStatus). This release also adds ConnectionStatus field to GetDevice and SearchDevices API.
* `Aws\DynamoDB` - Adds two new APIs UpdateGlobalTableSettings and DescribeGlobalTableSettings. This update introduces new constraints in the CreateGlobalTable and UpdateGlobalTable APIs . Tables must have the same write capacity units. If Global Secondary Indexes exist then they must have the same write capacity units and key schema.
* `Aws\GuardDuty` - You can disable the email notification when inviting GuardDuty members using the disableEmailNotification parameter in the InviteMembers operation.
* `Aws\Route53Domains` - This release adds a SubmittedSince attribute to the ListOperations API, so you can list operations that were submitted after a specified date and time.
* `Aws\SageMaker` - SageMaker has added support for VPC configuration for both Endpoints and Training Jobs. This allows you to connect from the instances running the Endpoint or Training Job to your VPC and any resources reachable in the VPC rather than being restricted to resources that were internet accessible.
* `Aws\WorkSpaces` - Added new IP Access Control APIs, an API to change the state of a Workspace, and the ADMIN_MAINTENANCE WorkSpace state. With the new IP Access Control APIs, you can now create/delete IP Access Control Groups, add/delete/update rules for IP Access Control Groups, Associate/Disassociate IP Access Control Groups to/from a WorkSpaces Directory, and Describe IP Based Access Control Groups.

## 3.55.3 - 2018-04-26

* `Aws\CodeCommit` - AWS CodeCommit is now available in an additional region, EU (Paris).
* `Aws\Glacier` - Documentation updates for Glacier to fix a broken link
* `Aws\SecretsManager` - Documentation updates for secretsmanager

## 3.55.2 - 2018-04-25

* `Aws\CodeDeploy` - AWS CodeDeploy has a new exception that indicates when a GitHub token is not valid.
* `Aws\Rekognition` - Documentation updates for Amazon Rekognition.
* `Aws\XRay` - Added PutEncryptionConfig and GetEncryptionConfig APIs for managing data encryption settings. Use PutEncryptionConfig to configure X-Ray to use an AWS Key Management Service customer master key to encrypt trace data at rest.

## 3.55.1 - 2018-04-24

* `Aws\` - Fixes docblock @param tags to reference Result class with a consistent case
* `Aws\ElasticBeanstalk` - Support tracking Elastic Beanstalk resources in AWS Config.
* `Aws\SecretsManager` - Documentation updates for secretsmanager

## 3.55.0 - 2018-04-23

* `Aws\AutoScalingPlans` - The release adds the operation UpdateScalingPlan for updating a scaling plan and the support for tag filters as an application source.
* `Aws\IoT` - Add IotAnalyticsAction which sends message data to an AWS IoT Analytics channel
* `Aws\IoTAnalytics` - Introducing AWS IoT Analytics SDK. AWS IoT Analytics provides advanced data analysis for AWS IoT. It allows you to collect large amounts of device data, process messages, store them, and then query the data and run sophisticated analytics to make accurate decisions in your IoT applications and machine learning use cases. AWS IoT Analytics enables advanced data exploration through integration with Jupyter Notebooks and data visualization through integration with Amazon QuickSight.

## 3.54.6 - 2018-04-20

* `Aws\Firehose` - With this release, Amazon Kinesis Data Firehose allows you to tag your delivery streams. Tags are metadata that you can create and use to manage your delivery streams. For more information about tagging, see AWS Tagging Strategies. For technical documentation, look for the tagging operations in the Amazon Kinesis Firehose API reference.
* `Aws\MediaLive` - With AWS Elemental MediaLive you can now output live channels as RTMP (Real-Time Messaging Protocol) and RTMPS as the encrypted version of the protocol (Secure, over SSL/TLS). RTMP is the preferred protocol for sending live streams to popular social platforms which means you can send live channel content to social and sharing platforms in a secure and reliable way while continuing to stream to your own website, app or network.

## 3.54.5 - 2018-04-19

* `Aws\CloudHSMV2` - The new CloudHSM is now available in the AWS GovCloud (US).
* `Aws\CodePipeline` - Added new SourceRevision structure to Execution Summary with accompanying definitions as needed in the AWS CodePipeline API Guide.
* `Aws\CostExplorer` - Starting today, you can identify opportunities for Amazon RDS cost savings using AWS Cost Explorer's API to access your Amazon RDS Reserved Instance Purchase Recommendations
* `Aws\DeviceFarm` - Adding support for VPCEndpoint feature. Allows customers to be able to access their private endpoints/services running in their VPC during test automation.
* `Aws\EC2` - Added support for customers to see the time at which a Dedicated Host was allocated or released.
* `Aws\RDS` - The ModifyDBCluster operation now includes an EngineVersion parameter. You can use this to upgrade the engine for a clustered database.
* `Aws\SSM` - Added new APIs DeleteInventory and DescribeInventoryDeletions, for customers to delete their custom inventory data.
* `Aws\SecretsManager` - Documentation updates

## 3.54.4 - 2018-04-10

* `Aws\DatabaseMigrationService` - Native Change Data Capture start point and task recovery support in Database Migration Service. 
* `Aws\Glue` - "AWS Glue now supports timeout values for ETL jobs. With this release, all new ETL jobs have a default timeout value of 48 hours. AWS Glue also now supports the ability to start a schedule or job events trigger when it is created."
* `Aws\MediaPackage` - Adds a new OriginEndpoint package type CmafPackage in MediaPackage. Origin endpoints can now be configured to use the Common Media Application Format (CMAF) media streaming format. This version of CmafPackage only supports HTTP Live Streaming (HLS) manifests with fragmented MP4.
* `Aws\SSM` - Added TooManyUpdates exception for AddTagsToResource and RemoveTagsFromResource API
* `Aws\WorkMail` - Amazon WorkMail adds the ability to grant users and groups with "Full Access", "Send As" and "Send on Behalf" permissions on a given mailbox.

## 3.54.3 - 2018-04-09

* `Aws\CloudDirectory` - Cloud Directory customers can fetch attributes within a facet on an object with the new GetObjectAttributes API and can fetch attributes from multiple facets or objects with the BatchGetObjectAttributes operation.

## 3.54.2 - 2018-04-06

* `Aws\Batch` - Support for Timeout in SubmitJob and RegisterJobDefinition

## 3.54.1 - 2018-04-05

* `Aws\SSM` - Documentation updates for ec2

## 3.54.0 - 2018-04-04

* `Aws\ACM` - AWS Certificate Manager has added support for AWS Certificate Manager Private Certificate Authority (CA). Customers can now request private certificates with the RequestCertificate API, and also export private certificates with the ExportCertificate API.
* `Aws\ACMPCA` - AWS Certificate Manager (ACM) Private Certificate Authority (CA) is a managed private CA service that helps you easily and securely manage the lifecycle of your private certificates. ACM Private CA provides you a highly-available private CA service without the upfront investment and ongoing maintenance costs of operating your own private CA. ACM Private CA extends ACM's certificate management capabilities to private certificates, enabling you to manage public and private certificates centrally.
* `Aws\CloudWatch` - The new GetMetricData API enables you to collect batch amounts of metric data and optionally perform math expressions on the data. With one GetMetricData call you can retrieve as many as 100 different metrics and a total of 100,800 data points.
* `Aws\ConfigService` - AWS Config introduces multi-account multi-region data aggregation features. Customers can create an aggregator (a new resource type) in AWS Config that collects AWS Config data from multiple source accounts and regions into an aggregator account. Customers can aggregate data from individual account(s) or an organization and multiple regions. In this release, AWS Config adds several API's for multi-account multi-region data aggregation.
* `Aws\FMS` - This release is the initial release version for AWS Firewall Manager, a new AWS service that makes it easy for customers to centrally configure WAF rules across all their resources (ALBs and CloudFront distributions) and across accounts.
* `Aws\S3` - ONEZONE_IA storage class stores object data in only one Availability Zone at a lower price than STANDARD_IA. This SDK release provides API support for this new storage class.
* `Aws\SageMaker` - SageMaker is now supporting many additional instance types in previously supported families for Notebooks, Training Jobs, and Endpoints. Training Jobs and Endpoints now support instances in the m5 family in addition to the previously supported instance families. For specific instance types supported please see the documentation for the SageMaker API.
* `Aws\SecretsManager` - AWS Secrets Manager enables you to easily create and manage the secrets that you use in your customer-facing apps. Instead of embedding credentials into your source code, you can dynamically query Secrets Manager from your app whenever you need credentials. You can automatically and frequently rotate your secrets without having to deploy updates to your apps. All secret values are encrypted when they're at rest with AWS KMS, and while they're in transit with HTTPS and TLS.
* `Aws\TranscribeService` - Amazon Transcribe is an automatic speech recognition (ASR) service that makes it easy for developers to add speech to text capability to their applications. 

## 3.53.2 - 2018-04-03

* `Aws\DeviceFarm` - Added Private Device Management feature. Customers can now manage their private devices efficiently - view their status, set labels and apply profiles on them. Customers can also schedule automated tests and remote access sessions on individual instances in their private device fleet.
* `Aws\Lambda` - added nodejs8.10 as a valid runtime
* `Aws\Translate` - This release increases the maximum size of input text to 5,000 bytes. Amazon Translate now supports automatic language detection of the input text. The translation models have been improved to increase accuracy. See the documentation for more information.

## 3.53.1 - 2018-04-02

* `Aws\APIGateway` - Amazon API Gateway now supports resource policies for APIs making it easier to set access controls for invoking APIs.
* `Aws\CloudFront` - You can now use a new Amazon CloudFront capability called Field-Level Encryption to further enhance the security of sensitive data, such as credit card numbers or personally identifiable information (PII) like social security numbers. CloudFront's field-level encryption further encrypts sensitive data in an HTTPS form using field-specific encryption keys (which you supply) before a POST request is forwarded to your origin. This ensures that sensitive data can only be decrypted and viewed by certain components or services in your application stack. Field-level encryption is easy to setup. Simply configure the fields that have to be further encrypted by CloudFront using the public keys you specify and you can reduce attack surface for your sensitive data.
* `Aws\ElasticsearchService` - This adds Amazon Cognito authentication support to Kibana.

## 3.53.0 - 2018-03-30

* `Aws\ACM` - Documentation updates for acm
* `Aws\CodeBuild` - Adding FIPS endpoint for CodeBuild service
* `Aws\Connect` - Amazon Connect is a contact center as a service (CCaS) solution that offers easy, self-service configuration and enables dynamic, personal, and natural customer engagement at any scale. With this release of the Amazon Connect SDK, Outbound APIs (StartOutboundVoiceContact, StopContact) are now generally available. This release supports CTR generation for calls generated through the new APIs. Additionally IAM permissions are supported for the new APIs. 

## 3.52.36 - 2018-03-29

* `Aws\AlexaForBusiness` - Adds operations for creating and managing address books of phone contacts for use in A4B managed shared devices.
* `Aws\CloudFormation` - Enabling resource level permission control for StackSets APIs. Adding support for customers to use customized AdministrationRole to create security boundaries between different users.
* `Aws\Greengrass` - Greengrass APIs now support creating Machine Learning resource types and configuring binary data as the input payload for Greengrass Lambda functions.
* `Aws\SSM` - This Patch Manager release supports creating patch baselines for CentOS.

## 3.52.35 - 2018-03-28

* `Aws\GuardDuty` - Amazon GuardDuty API operations are now supported in the EU (Paris) region.
* `Aws\IAM` - Add support for Longer Role Sessions. Four APIs manage max session duration: GetRole, ListRoles, CreateRole, and the new API UpdateRole. The max session duration integer attribute is measured in seconds.
* `Aws\MTurk` - Added a new attribute "ActionsGuarded" to QualificationRequirement: This update allows MTurk Requester customers using the AWS SDK to control which Workers can see and preview their HITs. We now support hiding HITs from unqualified Workers' search results.
* `Aws\STS` - Change utilizes the Max Session Duration attribute introduced for IAM Roles and allows STS customers to request session duration up to the Max Session Duration of 12 hours from AssumeRole based APIs.
* `Aws\WorkSpaces` - Amazon Workspaces is now available in ap-northeast-2

## 3.52.34 - 2018-03-27

* `Aws\ACM` - AWS Certificate Manager has added support for customers to disable Certificate Transparency logging on a per-certificate basis.

## 3.52.33 - 2018-03-26

* `Aws\DynamoDB` - Point-in-time recovery (PITR) provides continuous backups of your DynamoDB table data. With PITR, you do not have to worry about creating, maintaining, or scheduling backups. You enable PITR on your table and your backup is available for restore at any point in time from the moment you enable it, up to a maximum of the 35 preceding days. PITR provides continuous backups until you explicitly disable it. For more information, see the Amazon DynamoDB Developer Guide.

## 3.52.32 - 2018-03-23

* `Aws\RDS` - Documentation updates for RDS

## 3.52.31 - 2018-03-22

* `Aws\AppStream` - Feedback URL allows admins to provide a feedback link or a survey link for collecting user feedback while streaming sessions. When a feedback link is provided, streaming users will see a "Send Feedback" choice in their streaming session toolbar. On selecting this choice, user will be redirected to the link provided in a new browser tab. If a feedback link is not provided, users will not see the "Send Feedback" option. 
* `Aws\CodeBuild` - Adding support for branch filtering when using webhooks with AWS CodeBuild. 
* `Aws\ECS` - Amazon Elastic Container Service (ECS) now includes integrated Service Discovery using Route 53 Auto Naming. Customers can now specify a Route 53 Auto Naming service as part of an ECS service. ECS will register task IPs with Route 53, making them available via DNS in your VPC.

## 3.52.30 - 2018-03-21

* `Aws\MediaPackage` - Elemental MediaPackage is now available in the ICN and GRU regions.
* `Aws\ServerlessApplicationRepository` - Documentation updates for Serverless Application Respository

## 3.52.29 - 2018-03-20

* `Aws\CloudWatchEvents` - Added SQS FIFO queue target support
* `Aws\ConfigService` - AWS Config adds support for BatchGetResourceConfig API, allowing you to batch-retrieve the current state of one or more of your resources.
* `Aws\CostExplorer` - This launch will allow customers to access their Amazon EC2 Reserved Instance (RI) purchase recommendations programmatically via the AWS Cost Explorer API. 
* `Aws\ECS` - Amazon ECS users can now mount a temporary volume in memory in containers and specify the shared memory that a container can use through the use of docker's 'tmpfs' and 'shm-size' features respectively. These fields can be specified under linuxParameters in ContainerDefinition in the Task Definition Template.
* `Aws\ElasticBeanstalk` - Documentation updates for the new Elastic Beanstalk API DescribeAccountAttributes.
* `Aws\Glue` - API Updates for DevEndpoint: PublicKey is now optional for CreateDevEndpoint. The new DevEndpoint field PrivateAddress will be populated for DevEndpoints associated with a VPC.
* `Aws\MediaLive` - AWS Elemental MediaLive has added support for updating Inputs and Input Security Groups. You can update Input Security Groups at any time and it will update all channels using that Input Security Group. Inputs can be updated as long as they are not attached to a currently running channel.

## 3.52.28 - 2018-03-16

* `Aws\ElasticBeanstalk` - AWS Elastic Beanstalk is launching a new public API named DescribeAccountAttributes which allows customers to access account level attributes. In this release, the API will support quotas for resources such as applications, application versions, and environments.

## 3.52.27 - 2018-03-15

* `Aws\Organizations` - This release adds additional reason codes to improve clarity to exceptions that can occur.
* `Aws\Pinpoint` - With this release, you can delete endpoints from your Amazon Pinpoint projects. Customers can now specify one of their leased dedicated long or short codes to send text messages.
* `Aws\SageMaker` - This release provides support for ml.p3.xlarge instance types for notebook instances. Lifecycle configuration is now available to customize your notebook instances on start; the configuration can be reused between multiple notebooks. If a notebook instance is attached to a VPC you can now opt out of internet access that by default is provided by SageMaker.

## 3.52.26 - 2018-03-14

* `Aws\Lightsail` - Updates to existing Lightsail documentation

## 3.52.25 - 2018-03-13

* `Aws\ServiceDiscovery` - This release adds support for custom health checks, which let you check the health of resources that aren't accessible over the internet. For example, you can use a custom health check when the instance is in an Amazon VPC.

## 3.52.24 - 2018-03-12

* `Aws\ApplicationDiscoveryService` - Documentation updates for discovery
* `Aws\CloudHSMV2` - CreateCluster can now take both 8 and 17 character Subnet IDs. DeleteHsm can now take both 8 and 17 character ENI IDs.
* `Aws\IoT` - We added new fields to the response of the following APIs. (1) describe-certificate: added new generationId, customerVersion fields (2) describe-ca-certificate: added new generationId, customerVersion and lastModifiedDate fields (3) get-policy: added generationId, creationDate and lastModifiedDate fields
* `Aws\Redshift` - DescribeClusterSnapshotsMessage with ClusterExists flag returns snapshots of existing clusters. Else both existing and deleted cluster snapshots are returned

## 3.52.23 - 2018-03-08

* `Aws\ECS` - Amazon Elastic Container Service (ECS) now supports container health checks. Customers can now specify a docker container health check command and parameters in their task definition. ECS will monitor, report and take scheduling action based on the health status.
* `Aws\MigrationHub` - Unused key LABEL removed from ResourceAttrbute
* `Aws\Pinpoint` - With this release, you can export endpoints from your Amazon Pinpoint projects. You can export a) all of the endpoints assigned to a project or b) the subset of endpoints assigned to a segment.
* `Aws\RDS` - Documentation updates for RDS

## 3.52.22 - 2018-03-07

* `Aws\MediaLive` - Updates API to model required traits and minimum/maximum constraints.
* `Aws\S3/S3SignatureV4` - Fixes an issue that would strip a preceding slash from a key during the signing process on virtual host style pathing, resulting in an invalid signature.

## 3.52.21 - 2018-03-06

* `Aws\ECS` - Documentation updates for Amazon ECS
* `Aws\RetryMiddleware` - Fixes an undefined index issue.
* `Aws\RetryMiddleware` - Retries CURLE_RECV_ERROR on all RequestException, not just ConnectException.

## 3.52.20 - 2018-03-01

* `Aws\CloudWatchEvents` - Added BatchParameters to the PutTargets API
* `Aws\EC2` - Added support for modifying Placement Group association of instances via ModifyInstancePlacement API.
* `Aws\SSM` - This Inventory release supports the status message details reported by the last sync for the resource data sync API.
* `Aws\ServiceCatalog` - This release of ServiceCatalog adds the DeleteTagOption API.
* `Aws\StorageGateway` - AWS Storage Gateway (File) support for two new file share attributes are added. 1. Users can specify the S3 Canned ACL to use for new objects created in the file share. 2. Users can create file shares for requester-pays buckets.

## 3.52.19 - 2018-02-28

* `Aws\ApplicationAutoScaling` - Application Auto Scaling now supports automatic scaling of SageMaker Production Variants on an Endpoint.
* `Aws\CloudFront` - Updates the `Signer` to force expire timestamps to match CloudFront required unquoted integers.

## 3.52.18 - 2018-02-27

* `Aws\ECR` - Documentation updates for Amazon ECR.

## 3.52.17 - 2018-02-26

* `Aws\Route53` - Added support for creating LBR rules using ap-northeast-3 region.
* `Aws\STS` - Increased SAMLAssertion parameter size from 50000 to 100000 for AWS Security Token Service AssumeRoleWithSAML API to allow customers to pass bigger SAML assertions

## 3.52.16 - 2018-02-23

* `Aws\AppStream` - This API update is to enable customers to copy their Amazon AppStream 2.0 images within and between AWS Regions

## 3.52.15 - 2018-02-22

* `Aws\CostExplorer` - Added GetReservationCoverage API for retrieving reservation coverage information.
* `Aws\ElasticLoadBalancingv2` - Added a new load balancer attribute related to Network Load Balancers that enables cross zone capabilities. This feature allows Network Load Balancers to distribute requests regardless of Availability Zone.

## 3.52.14 - 2018-02-21

* `Aws\CodeCommit` - This release adds an API for adding a file directly to an AWS CodeCommit repository without requiring a Git client.
* `Aws\EC2` - Adds support for tagging an EBS snapshot as part of the API call that creates the EBS snapshot
* `Aws\MediaPackage` - Mediapackage expands their service to FRA and CDG regions.
* `Aws\ServerlessApplicationRepository` - Added support for delete-application API and the ability for developers to set a homepage for their application. The homepage is a URL with more information about the application, for example the location of your GitHub repository for the application. 

## 3.52.13 - 2018-02-20

* `Aws\AutoScaling` - Amazon EC2 Auto Scaling support for service-linked roles
* `Aws\WAF` - The new PermissionPolicy APIs in AWS WAF Regional allow customers to attach resource-based policies to their entities.
* `Aws\WAFRegional` - The new PermissionPolicy APIs in AWS WAF Regional allow customers to attach resource-based policies to their entities.

## 3.52.12 - 2018-02-19

* `Aws\ConfigService` - With this release, AWS Config updated the ConfigurationItemStatus enum values. The values prior to this update did not represent appropriate values returned by GetResourceConfigHistory. You must update your code to enumerate the new enum values so this is a breaking change. To map old properties to new properties, use the following descriptions: New discovered resource - Old property: Discovered, New property: ResourceDiscovered. Updated resource - Old property: Ok, New property: OK. Deleted resource - Old property: Deleted, New property: ResourceDeleted or ResourceDeletedNotRecorded. Not-recorded resource - Old property: N/A, New property: ResourceNotRecorded or ResourceDeletedNotRecorded.

## 3.52.11 - 2018-02-16

* `Aws\RDS` - Updates RDS API to indicate whether a DBEngine supports read replicas.

## 3.52.10 - 2018-02-15

* `Aws\CodeStar` - Launch AWS CodeStar in the Asia Pacific Northeast 2 (ICN) region.
* `Aws\GameLift` - Updates to allow Fleets to run on On-Demand or Spot instances.
* `Aws\MediaConvert` - Nielsen ID3 tags can now be inserted into transport stream (TS) and HLS outputs. For more information on Nielsen configuration you can go to https://docs.aws.amazon.com/mediaconvert/latest/apireference/jobs.html#jobs-nielsenconfiguration

## 3.52.9 - 2018-02-14

* `Aws\AppSync` - AWS AppSync now supports for None Data Source, CreateApiKey now supports setting expiration on API keys, new API UpdateApiKey supports updating expiration on API keys. 
* `Aws\LexModelBuildingService` - Amazon Lex now provides the ability to export and import your Amazon Lex chatbot definition as a JSON file.

## 3.52.8 - 2018-02-13

* `Aws\Glacier` - Documentation updates for glacier
* `Aws\Route53` - Added support for creating Private Hosted Zones and metric-based healthchecks in the ap-northeast-3 region for whitelisted customers.

## 3.52.7 - 2018-02-12

* `Aws\CognitoIdentityProvider` - Support for user migration using AWS Lambda trigger. Support to obtain signing certificate for user pools.
* `Aws\EC2` - Network interfaces now supply the following additional status of "associated" to better distinguish the current status.
* `Aws\GuardDuty` - Added PortProbeAction information to the Action section of the port probe-type finding.
* `Aws\KMS` - This release of AWS Key Management Service includes support for InvalidArnException in the RetireGrant API.
* `Aws\RDS` - Aurora MySQL now supports MySQL 5.7.

## 3.52.6 - 2018-02-09

* `Aws\EC2` - Users can now better understand the longer ID opt-in status of their account using the two new APIs DescribeAggregateIdFormat and DescribePrincipalIdFormat
* `Aws\LexModelBuildingService` - You can now define a response for your Amazon Lex chatbot directly from the AWS console. A response consists of messages dynamically selected from a group of pre-defined messages, populated by the developer.
* `Aws\LexRuntimeService` - You can now define a response for your Amazon Lex chatbot directly from the AWS console. A response consists of messages dynamically selected from a group of pre-defined messages, populated by the developer.

## 3.52.5 - 2018-02-08

* `Aws\AppStream` - Adds support for allowing customers to provide a redirect URL for a stack. Users will be redirected to the link provided by the admin at the end of their streaming session. 
* `Aws\Budgets` - Making budgetLimit and timePeriod optional, and updating budgets docs. 
* `Aws\DatabaseMigrationService` - This release includes the addition of two new APIs: describe replication instance task logs and reboot instance. The first allows user to see how much storage each log for a task on a given instance is occupying. The second gives users the option to reboot the application software on the instance and force a fail over for MAZ instances to test robustness of their integration with our service. 
* `Aws\DirectoryService` - Updated the regex of some input parameters to support longer EC2 identifiers.
* `Aws\DynamoDB` - Amazon DynamoDB now supports server-side encryption using a default service key (alias/aws/dynamodb) from the AWS Key Management Service (KMS). AWS KMS is a service that combines secure, highly available hardware and software to provide a key management system scaled for the cloud. AWS KMS is used via the AWS Management Console or APIs to centrally create encryption keys, define the policies that control how keys can be used, and audit key usage to prove they are being used correctly. For more information, see the Amazon DynamoDB Developer Guide.
* `Aws\GameLift` - Amazon GameLift FlexMatch added the StartMatchBackfill API. This API allows developers to add new players to an existing game session using the same matchmaking rules and player data that were used to initially create the session.
* `Aws\Inspector` - We marked Inspector GA yesterday. 2/.5/18.
* `Aws\MediaLive` - AWS Elemental MediaLive has added support for updating channel settings for idle channels. You can now update channel name, channel outputs and output destinations, encoder settings, user role ARN, and input specifications. Channel settings can be updated in the console or with API calls. Please note that running channels need to be stopped before they can be updated. We've also deprecated the 'Reserved' field.
* `Aws\MediaStore` - AWS Elemental MediaStore now supports per-container CORS configuration.

## 3.52.4 - 2018-02-06

* `Aws\Glue` - This new feature will now allow customers to add a customized json classifier. They can specify a json path to indicate the object, array or field of the json documents they'd like crawlers to inspect when they crawl json files. 
* `Aws\SSM` - This Patch Manager release supports configuring Linux repos as part of patch baselines, controlling updates of non-OS security packages and also creating patch baselines for SUSE12
* `Aws\ServiceCatalog` - This release of Service Catalog adds SearchProvisionedProducts API and ProvisionedProductPlan APIs.
* `Aws\ServiceDiscovery` - This release adds support for registering CNAME record types and creating Route 53 alias records that route traffic to Amazon Elastic Load Balancers using Amazon Route 53 Auto Naming APIs.

## 3.52.3 - 2018-02-05

* `Aws\ACM` - Documentation updates for acm
* `Aws\Cloud9` - API usage examples for AWS Cloud9.
* `Aws\Kinesis` - Using ListShards a Kinesis Data Streams customer or client can get information about shards in a data stream (including meta-data for each shard) without obtaining data stream level information.
* `Aws\OpsWorks` - AWS OpsWorks Stacks supports EBS encryption and HDD volume types. Also, a new DescribeOperatingSystems API is available, which lists all operating systems supported by OpsWorks Stacks.

## 3.52.2 - 2018-01-26

* `Aws\DeviceFarm` - Add InteractionMode in CreateRemoteAccessSession for DirectDeviceAccess feature.
* `Aws\MTurk` - Documentation updates for mturk-requester
* `Aws\MediaLive` - Add InputSpecification to CreateChannel (specification of input attributes is used for channel sizing and affects pricing); add NotFoundException to DeleteInputSecurityGroups.

## 3.52.1 - 2018-01-25

* `Aws\AlexaForBusiness` - Supports new field for DeviceStatusInfo which provides details about the DeviceStatus following a DeviceSync operation.
* `Aws\Appstream` - This API update is to support Amazon AppStream 2.0's launch into the Asia Pacific (Singapore) and Asia Pacific (Sydney) regions.
* `Aws\CloudHsm` - Added service signing name.
* `Aws\CodeBuild` - Adding support for Shallow Clone and GitHub Enterprise in AWS CodeBuild.
* `Aws\GuardDuty` - Added the missing AccessKeyDetails object to the resource shape.
* `Aws\Lambda` - AWS Lambda now supports Revision ID on your function versions and aliases, to track and apply conditional updates when you are updating your function version or alias resources.
* `Aws\RetryMiddleware` - Verify we have the curl extension before retrying on the CURLE_RECV_ERROR curl const.

## 3.52.0 - 2018-01-22

* `Aws\` - Retry on a set of CURLE_*_ERROR based failures. Currently, only CURLE_RECV_ERROR (errno 56) is retried.
* `Aws\Api\Parser` - Simplify return.
* `Aws\Budgets` - Add additional costTypes: IncludeDiscount, UseAmortized, to support finer control for different charges included in a cost budget.

## 3.51.0 - 2018-01-19

* `Aws\Credentials` - Add support for an AWS_EC2_METADATA_DISABLED environment variable to short-circuit requests for credentials via the InstanceProfileProvider.
* `Aws\Glue` - New AWS Glue DataCatalog APIs to manage table versions and a new feature to skip archiving of the old table version when updating table.
* `Aws\TranscribeService` - Amazon Transcribe Public Preview Release

## 3.50.0 - 2018-01-18

* `Aws\Rds` - Fixes a bug where DestinationRegion was not being added to automatically generated PreSignedUrl parameters for RDS operations.
* `Aws\S3` - Updates the type of the S3 Size object to long (from integer) to properly reflect objects over PHP_INT_MAX in size. This will affect ListObjects, ListObjectsV2, ListObjectVersions, and ListParts. This bug fix may be a breaking change for customers who relied on the previously PHP_INT_MAX capped behavior or on the type of the field. You may see objects at their full size, as a string, if they are over PHP_INT_MAX in size.
* `Aws\SageMaker` - CreateTrainingJob and CreateEndpointConfig now supports KMS Key for volume encryption. 

## 3.49.1 - 2018-01-17

* `Aws\AutoScalingPlans` - Documentation updates for autoscaling-plans
* `Aws\EC2` - Documentation updates for EC2

## 3.49.0 - 2018-01-16

* `Aws\ApplicationAutoScaling` - Application Auto Scaling is adding support for Target Tracking Scaling for ECS services.
* `Aws\AutoScalingPlans` - AWS Auto Scaling enables you to quickly discover all of the scalable resources underlying your application and set up application scaling in minutes using built-in scaling recommendations.
* `Aws\RDS` - With this release you can now integrate RDS DB instances with CloudWatch Logs. We have added parameters to the operations for creating and modifying DB instances (for example CreateDBInstance) to allow you to take advantage of this capability through the CLI and API. Once you enable this feature, a stream of log events will publish to CloudWatch Logs for each log type you enable.
* `Aws\WorkSpaces` - Amazon Workspaces is now available in sa-east-1

## 3.48.14 - 2018-01-15

* `Aws\Lambda` - Support for creating Lambda Functions using 'dotnetcore2.0' and 'go1.x'. 

## 3.48.13 - 2018-01-12

* `Aws\Glue` - Support is added to generate ETL scripts in Scala which can now be run by AWS Glue ETL jobs. In addition, the trigger API now supports firing when any conditions are met (in addition to all conditions). Also, jobs can be triggered based on a "failed" or "stopped" job run (in addition to a "succeeded" job run). 

## 3.48.12 - 2018-01-11

* `Aws\Aws` - Fix misspelling class PresignUrlMiddleware.
* `Aws\ElasticLoadBalancing` - Added OperationNotPermittedException to indicate that you cannot create a classic load balancer while deleting the Elastic Load Balancing service-linked role.
* `Aws\ElasticLoadBalancingv2` - Added OperationNotPermittedException to indicate that you cannot create a load balancer while deleting the Elastic Load Balancing service-linked role.
* `Aws\RDS` - Read Replicas for Amazon RDS for MySQL, MariaDB, and PostgreSQL now support Multi-AZ deployments.Amazon RDS Read Replicas enable you to create one or more read-only copies of your database instance within the same AWS Region or in a different AWS Region. Updates made to the source database are asynchronously copied to the Read Replicas. In addition to providing scalability for read-heavy workloads, you can choose to promote a Read Replica to become standalone a DB instance when needed.Amazon RDS Multi-AZ Deployments provide enhanced availability for database instances within a single AWS Region. With Multi-AZ, your data is synchronously replicated to a standby in a different Availability Zone (AZ). In case of an infrastructure failure, Amazon RDS performs an automatic failover to the standby, minimizing disruption to your applications.You can now combine Read Replicas with Multi-AZ as part of a disaster recovery strategy for your production databases. A well-designed and tested plan is critical for maintaining business continuity after a disaster. Since Read Replicas can also be created in different regions than the source database, your Read Replica can be promoted to become the new production database in case of a regional disruption.You can also combine Read Replicas with Multi-AZ for your database engine upgrade process. You can create a Read Replica of your production database instance and upgrade it to a new database engine version. When the upgrade is complete, you can stop applications, promote the Read Replica to a standalone database instance and switch over your applications. Since the database instance is already a Multi-AZ deployment, no additional steps are needed.For more information, see the Amazon RDS User Guide.
* `Aws\SSM` - Updates documentation for the HierarchyLevelLimitExceededException error.

## 3.48.11 - 2018-01-09

* `Aws\KMS` - Documentation updates for AWS KMS

## 3.48.10 - 2018-01-09

* `Aws\DirectoryService` - On October 24 we introduced AWS Directory Service for Microsoft Active Directory (Standard Edition), also known as AWS Microsoft AD (Standard Edition), which is a managed Microsoft Active Directory (AD) that is optimized for small and midsize businesses (SMBs). With this SDK release, you can now create an AWS Microsoft AD directory using API. This enables you to run typical SMB workloads using a cost-effective, highly available, and managed Microsoft AD in the AWS Cloud.

## 3.48.9 - 2018-01-08

* `Aws\ApplicationDiscoveryService` - Documentation updates for AWS Application Discovery Service.
* `Aws\CodeDeploy` - The AWS CodeDeploy API was updated to support DeleteGitHubAccountToken, a new method that deletes a GitHub account connection.
* `Aws\Route53` - This release adds an exception to the CreateTrafficPolicyVersion API operation.

## 3.48.8 - 2018-01-05

* `Aws\Inspector` - Added 2 new attributes to the DescribeAssessmentTemplate response, indicating the total number of assessment runs and last assessment run ARN (if present.)
* `Aws\SSM` - Documentation updates for ssm
* `Aws\Snowball` - Documentation updates for snowball

## 3.48.7 - 2018-01-02

* `Aws\Docs` - Clean up extra lines.
* `Aws\RDS` - Documentation updates for rds

## 3.48.6 - 2017-12-29

* `Aws\` - Clean elses when have already returned something.
* `Aws\` - Removed or adjusted unused imports.
* `Aws\WorkSpaces` - Modify WorkSpaces have been updated with flexible storage and switching of hardware bundles feature. The following configurations have been added to ModifyWorkSpacesProperties: storage and compute. This update provides the capability to configure the storage of a WorkSpace. It also adds the capability of switching hardware bundle of a WorkSpace by specifying an eligible compute (Value, Standard, Performance, Power).

## 3.48.5 - 2017-12-22

* `Aws\EC2` - This release fixes an issue with tags not showing in DescribeAddresses responses.
* `Aws\ECS` - Amazon ECS users can now set a health check initialization wait period of their ECS services, the services that are associated with an Elastic Load Balancer (ELB) will wait for a period of time before the ELB become healthy. You can now configure this in Create and Update Service.
* `Aws\Inspector` - PreviewAgents API now returns additional fields within the AgentPreview data type. The API now shows the agent health and availability status for all instances included in the assessment target. This allows users to check the health status of Inspector Agents before running an assessment. In addition, it shows the instance ID, hostname, and IP address of the targeted instances.
* `Aws\SageMaker` - SageMaker Models no longer support SupplementalContainers. API's that have been affected are CreateModel and DescribeModel.
* `Aws\Test` - Use fluent interface when defining mocks.

## 3.48.4 - 2017-12-21

* `Aws\CodeBuild` - Adding support allowing AWS CodeBuild customers to select specific curated image versions.
* `Aws\EC2` - Elastic IP tagging enables you to add key and value metadata to your Elastic IPs so that you can search, filter, and organize them according to your organization's needs.
* `Aws\KinesisAnalytics` - Kinesis Analytics now supports AWS Lambda functions as output.

## 3.48.3 - 2017-12-20

* `Aws\CodeStar` - Launch AWS CodeStar in the Asia Pacific (Tokyo) and Canada (Central) regions. 
* `Aws\ConfigService` - Update ResourceType enum with values for WAF, WAFRegional, and CloudFront resources
* `Aws\IoT` - This release adds support for code signed Over-the-air update functionality for Amazon FreeRTOS. Users can now create and schedule Over-the-air updates to their Amazon FreeRTOS devices using these new APIs. 

## 3.48.2 - 2017-12-19

* `Aws\` - Add support for retrying exception code RequestThrottledException.
* `Aws\APIGateway` - API Gateway now adds support for calling API with compressed payloads using one of the supported content codings, tagging an API stage for cost allocation, and returning API keys from a custom authorizer for use with a usage plan.
* `Aws\MediaStoreData` - Documentation updates for mediastore
* `Aws\Route53` - Route 53 added support for a new China (Ningxia) region, cn-northwest-1. You can now specify cn-northwest-1 as the region for latency-based or geoproximity routing. Route 53 also added support for a new EU (Paris) region, eu-west-3. You can now associate VPCs in eu-west-3 with private hosted zones and create alias records that route traffic to resources in eu-west-3.

## 3.48.1 - 2017-12-19

* `Aws\CloudWatch` - Documentation updates for monitoring
* `Aws\ServiceCatalog` - Region launch expansion of Service Catalog Service for new region EU-WEST-3

## 3.48.0 - 2017-12-15

* `Aws\AppStream` - This API update is to enable customers to add tags to their Amazon AppStream 2.0 resources
* `Aws\Inspector` - expand the region support of Inspector to FRA (eu-central-1)
* `Aws\S3\Crypto` - Adds the S3EncryptionMultipartUploader for performing client side encryption before performing a multipart upload operation.

## 3.47.1 - 2017-12-14

* `Aws\APIGateway` - Adds support for Cognito Authorizer scopes at the API method level.
* `Aws\SES` - Added information about the maximum number of transactions per second for the SendCustomVerificationEmail operation.

## 3.47.0 - 2017-12-12

* `Aws\CodeDeploy` - Documentation updates for CodeDeploy.
* `Aws\WorkMail` - Today, Amazon WorkMail released an administrative SDK and enabled AWS CloudTrail integration. With the administrative SDK, you can natively integrate WorkMail with your existing services. The SDK enables programmatic user, resource, and group management through API calls. This means your existing IT tools and workflows can now automate WorkMail management, and third party applications can streamline WorkMail migrations and account actions. 

## 3.46.0 - 2017-12-11

* `Aws\CognitoIdentityProvider` - Exposing the hosted UI domain name for a user pool that has a domain configured.
* `Aws\LexModelBuildingService` - The GetBotChannelAssociation API now returns the status and failure reason, if any, for a bot channel.
* `Aws\Pinpoint` - Resolves a naming collision with Pinpoint getEndpoint operation and AwsClient::getEndpoint. All Endpoint operations have aliases with UserEndpoint.
* `Aws\SageMaker` - CreateModel API Update: The request parameter 'ExecutionRoleArn' has changed from optional to required.
* `Aws\Test` - More refactored tests with PHPUnit assert methods.

## 3.45.3 - 2017-12-08

* `Aws\AppStream` - This API update is to support the feature that allows customers to automatically consume the latest Amazon AppStream 2.0 agent as and when published by AWS.
* `Aws\CloudWatch` - With this launch, you can now create a CloudWatch alarm that alerts you when M out of N datapoints of a metric are breaching your predefined threshold, such as three out of five times in any given five minutes interval or two out of six times in a thirty minutes interval. When M out of N datapoints are not breaching your threshold in an interval, the alarm will be in OK state. Please note that the M datapoints out of N datapoints in an interval can be of any order and does not need to be consecutive. Consequently, you can now get alerted even when the spikes in your metrics are intermittent over an interval.
* `Aws\ECS` - Documentation updates for Windows containers.

## 3.45.2 - 2017-12-07

* `Aws\ElasticsearchService` - Added support for encryption of data at rest on Amazon Elasticsearch Service using AWS KMS
* `Aws\SES` - Customers can customize the emails that Amazon SES sends when verifying new identities. This feature is helpful for developers whose applications send email through Amazon SES on behalf of their customers.

## 3.45.1 - 2017-12-06

* `Aws\CloudDirectory` - Amazon Cloud Directory makes it easier for you to apply schema changes across your directories with in-place schema upgrades. Your directories now remain available while backward-compatible schema changes are being applied, such as the addition of new fields. You also can view the history of your schema changes in Cloud Directory by using both major and minor version identifiers, which can help you track and audit schema versions across directories.
* `Aws\ElasticBeanstalk` - Documentation updates for AWS Elastic Beanstalk.
* `Aws\SageMaker` - Initial waiters for common SageMaker workflows.

## 3.45.0 - 2017-12-05

* `Aws\IoT` - Add error action API for RulesEngine. 
* `Aws\ServiceCatalog` - ServiceCatalog has two distinct personas for its use, an "admin" persona (who creates sets of products with different versions and prescribes who has access to them) and an "end-user" persona (who can launch cloud resources based on the configuration data their admins have given them access to). This API update will allow admin users to deactivate/activate product versions, end-user will only be able to access and launch active product versions. 
* `Aws\ServiceDiscovery` - Amazon Route 53 Auto Naming lets you configure public or private namespaces that your microservice applications run in. When instances of the service become available, you can call the Auto Naming API to register the instance, and Amazon Route 53 automatically creates up to five DNS records and an optional health check. Clients that submit DNS queries for the service receive an answer that contains up to eight healthy records.
* `Aws\Test` - Use PHPUnit\Framework\TestCase instead of PHPUnit_Framework_TestCase
* `Aws\Test` - Refactored some tests with PHPUnit assert methods.

## 3.44.2 - 2017-12-04

* `Aws\Budgets` - Add additional costTypes to support finer control for different charges included in a cost budget.
* `Aws\ECS` - Documentation updates for ecs

## 3.44.1 - 2017-12-01

* `Aws\SageMaker` - Preparing to release updated waiters week of December 4, 2017 for all supported SDKs.

## 3.44.0 - 2017-11-30

* `Aws\APIGateway` - Added support Private Integration and VPC Link features in API Gateway. This allows to create an API with the API Gateway private integration, thus providing clients access to HTTP/HTTPS resources in an Amazon VPC from outside of the VPC through a VpcLink resource.
* `Aws\AlexaForBusiness` - Alexa for Business is now generally available for production use. Alexa for Business makes it easy for you to use Alexa in your organization. The Alexa for Business SDK gives you APIs to manage Alexa devices, enroll users, and assign skills at scale. For more information about Alexa for Business, go to https://aws.amazon.com/alexaforbusiness 
* `Aws\Cloud9` - Adds support for creating and managing AWS Cloud9 development environments. AWS Cloud9 is a cloud-based integrated development environment (IDE) that you use to write, run, and debug code.
* `Aws\EC2` - Adds the following updates: 1. Spread Placement ensures that instances are placed on distinct hardware in order to reduce correlated failures. 2. Inter-region VPC Peering allows customers to peer VPCs across different AWS regions without requiring additional gateways, VPN connections or physical hardware 
* `Aws\Lambda` - AWS Lambda now supports the ability to set the concurrency limits for individual functions, and increasing memory to 3008 MB.
* `Aws\ServerlessApplicationRepository` - First release of the AWS Serverless Application Repository SDK

## 3.43.0 - 2017-11-30

* `Aws\AutoScaling` - You can now use Auto Scaling with EC2 Launch Templates via the CreateAutoScalingGroup and UpdateAutoScalingGroup APIs.
* `Aws\EC2` - Adds the following updates: 1. T2 Unlimited enables high CPU performance for any period of time whenever required 2. You are now able to create and launch EC2 m5 and h1 instances
* `Aws\Lightsail` - This release adds support for load balancer and TLS/SSL certificate management. This set of APIs allows customers to create, manage, and scale secure load balanced applications on Lightsail infrastructure. To provide support for customers who manage their DNS on Lightsail, we've added the ability create an Alias A type record which can point to a load balancer DNS name via the CreateDomainEntry API http://docs.aws.amazon.com/lightsail/2016-11-28/api-reference/API_CreateDomainEntry.html.
* `Aws\ResourceGroups` - AWS Resource Groups lets you search and group AWS resources from multiple services based on their tags.
* `Aws\SSM` - This release updates AWS Systems Manager APIs to enable executing automations at controlled rate, target resources in a resource groups and execute entire automation at once or single step at a time. It is now also possible to use YAML, in addition to JSON, when creating Systems Manager documents.
* `Aws\WAF` - This release adds support for rule group and managed rule group. Rule group is a container of rules that customers can create, put rules in it and associate the rule group to a WebACL. All rules in a rule group will function identically as they would if each rule was individually associated to the WebACL. Managed rule group is a pre-configured rule group composed by our security partners and made available via the AWS Marketplace. Customers can subscribe to these managed rule groups, associate the managed rule group to their WebACL and start using them immediately to protect their resources.
* `Aws\WAFRegional` - This release adds support for rule group and managed rule group. Rule group is a container of rules that customers can create, put rules in it and associate the rule group to a WebACL. All rules in a rule group will function identically as they would if each rule was individually associated to the WebACL. Managed rule group is a pre-configured rule group composed by our security partners and made available via the AWS Marketplace. Customers can subscribe to these managed rule groups, associate the managed rule group to their WebACL and start using them immediately to protect their resources.

## 3.42.0 - 2017-11-29

* `Aws\Comprehend` - Amazon Comprehend is an AWS service for gaining insight into the content of text and documents . It develops insights by recognizing the entities, key phrases, language, sentiments, and other common elements in a document. For more information, go to the Amazon Comprehend product page. To get started, see the Amazon Comprehend Developer Guide.
* `Aws\DynamoDB` - Amazon DynamoDB now supports the following features: Global Table and On-Demand Backup. Global Table is a fully-managed, multi-region, multi-master database. DynamoDB customers can now write anywhere and read anywhere with single-digit millisecond latency by performing database operations closest to where end users reside. Global Table also enables customers to disaster-proof their applications, keeping them running and data accessible even in the face of natural disasters or region disruptions. Customers can set up Global Table with just a few clicks in the AWS Management Console-no application rewrites required. On-Demand Backup capability is to protect data from loss due to application errors, and meet customers' archival needs for compliance and regulatory reasons. Customers can backup and restore their DynamoDB table data anytime, with a single-click in the AWS management console or a single API call. Backup and restore actions execute with zero impact on table performance or availability. For more information, see the Amazon DynamoDB Developer Guide.
* `Aws\ECS` - Amazon Elastic Container Service (Amazon ECS) released a new launch type for running containers on a serverless infrastructure. The Fargate launch type allows you to run your containerized applications without the need to provision and manage the backend infrastructure. Just register your task definition and Fargate launches the container for you. 
* `Aws\Glacier` - This release includes support for Glacier Select, a new feature that allows you to filter and analyze your Glacier archives and store the results in a user-specified S3 location.
* `Aws\Greengrass` - Greengrass OTA feature allows updating Greengrass Core and Greengrass OTA Agent. Local Resource Access feature allows Greengrass Lambdas to access local resources such as peripheral devices and volumes.
* `Aws\IoT` - This release adds support for a number of new IoT features, including AWS IoT Device Management (Jobs, Fleet Index and Thing Registration), Thing Groups, Policies on Thing Groups, Registry & Job Events, JSON Logs, Fine-Grained Logging Controls, Custom Authorization and AWS Service Authentication Using X.509 Certificates.
* `Aws\IoTJobsDataPlane` - This release adds support for new the service called Iot Jobs. This client is built for the device SDK to use Iot Jobs Device specific APIs.
* `Aws\KinesisVideo` - Announcing Amazon Kinesis Video Streams, a fully managed video ingestion and storage service. Kinesis Video Streams makes it easy to securely stream video from connected devices to AWS for machine learning, analytics, and processing. You can also stream other time-encoded data like RADAR and LIDAR signals using Kinesis Video Streams.
* `Aws\KinesisVideoArchivedMedia` - Announcing Amazon Kinesis Video Streams, a fully managed video ingestion and storage service. Kinesis Video Streams makes it easy to securely stream video from connected devices to AWS for machine learning, analytics, and processing. You can also stream other time-encoded data like RADAR and LIDAR signals using Kinesis Video Streams.
* `Aws\KinesisVideoMedia` - Announcing Amazon Kinesis Video Streams, a fully managed video ingestion and storage service. Kinesis Video Streams makes it easy to securely stream video from connected devices to AWS for machine learning, analytics, and processing. You can also stream other time-encoded data like RADAR and LIDAR signals using Kinesis Video Streams.
* `Aws\Rekognition` - This release introduces Amazon Rekognition support for video analysis.
* `Aws\S3` - This release includes support for Glacier Select, a new feature that allows you to filter and analyze your Glacier storage class objects and store the results in a user-specified S3 location.
* `Aws\SageMaker` - Amazon SageMaker is a fully-managed service that enables data scientists and developers to quickly and easily build, train, and deploy machine learning models, at scale.
* `Aws\SageMakerRuntime` - Amazon SageMaker is a fully-managed service that enables data scientists and developers to quickly and easily build, train, and deploy machine learning models, at scale.
* `Aws\Translate` - Public preview release of Amazon Translate and the Amazon Translate Developer Guide. For more information, see the Amazon Translate Developer Guide.

## 3.41.0 - 2017-11-29

* `Aws\APIGateway` - Changes related to CanaryReleaseDeployment feature. Enables API developer to create a deployment as canary deployment and test API changes with percentage of customers before promoting changes to all customers.
* `Aws\AppSync` - AWS AppSync is an enterprise-level, fully managed GraphQL service with real-time data synchronization and offline programming features.
* `Aws\Batch` - Add support for Array Jobs which allow users to easily submit many copies of a job with a single API call. This change also enhances the job dependency model to support N_TO_N and sequential dependency chains. The ListJobs and DescribeJobs APIs now have the ability to list or describe the status of entire Array Jobs or individual elements within the array.
* `Aws\CodeDeploy` - Support for AWS Lambda function deployment - AWS CodeDeploy now supports the deployment of AWS Lambda functions. A Lambda deployment uses a Lambda function alias to shift traffic to a new version. You select a deployment configuration that specifies exactly how traffic shifts to your new version. Success of a deployment can be validated using Lambda functions that are referenced by the deployment. This provides the opportunity to rollback if necessary.
* `Aws\CognitoIdentityProvider` - AWS Cognito SDK has been updated to support new Cognito user-pool objects and operations for advanced security
* `Aws\EC2` - Adds the following updates: 1. You are now able to host a service powered by AWS PrivateLink to provide private connectivity to other VPCs. You are now also able to create endpoints to other services powered by PrivateLink including AWS services, Marketplace Seller services or custom services created by yourself or other AWS VPC customers. 2. You are now able to save launch parameters in a single template that can be used with Auto Scaling, Spot Fleet, Spot, and On Demand instances. 3. You are now able to launch Spot instances via the RunInstances API, using a single additional parameter. RunInstances will response synchronously with an instance ID should capacity be available for your Spot request. 4. A simplified Spot pricing model which delivers low, predictable prices that adjust gradually, based on long-term trends in supply and demand. 5. Amazon EC2 Spot can now hibernate Amazon EBS-backed instances in the event of an interruption, so your workloads pick up from where they left off. Spot can fulfill your request by resuming instances from a hibernated state when capacity is available.
* `Aws\GuardDuty` - Enable Amazon GuardDuty to continuously monitor and process AWS data sources to identify threats to your AWS accounts and workloads. You can add customization by uploading additional threat intelligence lists and IP safe lists. You can list security findings, suspend, and disable the service. 
* `Aws\Lambda` - Lambda aliases can now shift traffic between two function versions, based on preassigned weights.
* `Aws\MQ` - This is the initial SDK release for Amazon MQ. Amazon MQ is a managed message broker service for Apache ActiveMQ that makes it easy to set up and operate message brokers in the cloud. 

## 3.40.0 - 2017-11-27

* `Aws\MediaConvert` - AWS Elemental MediaConvert is a file-based video conversion service that transforms media into formats required for traditional broadcast and for internet streaming to multi-screen devices.
* `Aws\MediaLive` - AWS Elemental MediaLive is a video service that lets you easily create live outputs for broadcast and streaming delivery.
* `Aws\MediaPackage` - AWS Elemental MediaPackage is a just-in-time video packaging and origination service that lets you format highly secure and reliable live outputs for a variety of devices.
* `Aws\MediaStore` - AWS Elemental MediaStore is an AWS storage service optimized for media. It gives you the performance, consistency, and low latency required to deliver live and on-demand video content. AWS Elemental MediaStore acts as the origin store in your video workflow.
* `Aws\MediaStoreData` - AWS Elemental MediaStore is an AWS storage service optimized for media. It gives you the performance, consistency, and low latency required to deliver live and on-demand video content. AWS Elemental MediaStore acts as the origin store in your video workflow.

## 3.39.2 - 2017-11-22

* `Aws\ACM` - AWS Certificate Manager now supports the ability to import domainless certs and additional Key Types as well as an additional validation method for DNS.
* `Aws\LexModelBuildingService` - Amazon Lex is now available in the EU (Ireland) region.
* `Aws\LexRuntimeService` - Amazon Lex is now available in the EU (Ireland) region.
* `Aws\S3\Crypto` - Fixes an issue with loading @CipherOptions on getObject[Async] decryption.

## 3.39.1 - 2017-11-22

* `Aws\APIGateway` - Add support for Access logs and customizable integration timeouts
* `Aws\CloudFormation` - 1) Instance-level parameter overrides (CloudFormation-StackSet feature): This feature will allow the customers to override the template parameters on specific stackInstances. Customers will also have ability to update their existing instances with/without parameter-overrides using a new API "UpdateStackInstances" 2) Add support for SSM parameters in CloudFormation - This feature will allow the customers to use Systems Manager parameters in CloudFormation templates. They will be able to see values for these parameters in Describe APIs.
* `Aws\CodeBuild` - Adding support for accessing Amazon VPC resources from AWS CodeBuild, dependency caching and build badges.
* `Aws\EMR` - Enable Kerberos on Amazon EMR. 
* `Aws\Rekognition` - This release includes updates to Amazon Rekognition for the following APIs. The new DetectText API allows you to recognize and extract textual content from images. Face Model Versioning has been added to operations that deal with face detection.
* `Aws\Shield` - The AWS Shield SDK has been updated in order to support Elastic IP address protections, the addition of AttackProperties objects in DescribeAttack responses, and a new GetSubscriptionState operation.
* `Aws\StorageGateway` - AWS Storage Gateway now enables you to get notification when all your files written to your NFS file share have been uploaded to Amazon S3. Storage Gateway also enables guessing of the MIME type for uploaded objects based on file extensions.
* `Aws\XRay` - Added automatic pagination support for AWS X-Ray APIs in the SDKs that support this feature.

## 3.39.0 - 2017-11-20

* `Aws\APIGateway` - Documentation updates for Apigateway
* `Aws\CodeCommit` - AWS CodeCommit now supports pull requests. You can use pull requests to collaboratively review code changes for minor changes or fixes, major feature additions, or new versions of your released software.
* `Aws\CostExplorer` - The AWS Cost Explorer API gives customers programmatic access to AWS cost and usage information, allowing them to perform adhoc queries and build interactive cost management applications that leverage this dataset.
* `Aws\Firehose` - This release includes a new Kinesis Firehose feature that supports Splunk as Kinesis Firehose delivery destination. You can now use Kinesis Firehose to ingest real-time data to Splunk in a serverless, reliable, and salable manner. This release also includes a new feature that allows you to configure Lambda buffer size in Kinesis Firehose data transformation feature. You can now customize the data buffer size before invoking Lambda function in Kinesis Firehose for data transformation. This feature allows you to flexibly trade-off processing and delivery latency with cost and efficiency based on your specific use cases and requirements. 
* `Aws\Kinesis` - Customers can now obtain the important characteristics of their stream with DescribeStreamSummary. The response will not include the shard list for the stream but will have the number of open shards, and all the other fields included in the DescribeStream response.
* `Aws\WorkDocs` - DescribeGroups API and miscellaneous enhancements

## 3.38.5 - 2017-11-17

* `Aws\ApplicationAutoScaling` - This SDK update contains support for Target Tracking scaling for EC2 Spot Fleet. It allows you to scale an EC2 Spot Fleet using a Target Tracking scaling policy.
* `Aws\DatabaseMigrationService` - Support for migration task assessment. Support for data validation after the migration.
* `Aws\ElasticLoadBalancingv2` - This release adds Proxy Protocol v2 support for Network Load Balancer. Proxy protocol provides a convenient way to transport connection information (such as a client's source IP address/port and destination IP address/port) for a TCP connection across multiple layers of NAT or TCP proxies.
* `Aws\RDS` - Amazon RDS now supports importing MySQL databases by using backup files from Amazon S3.
* `Aws\S3` - Added ORC to the supported S3 Inventory formats.

## 3.38.4 - 2017-11-16

* `Aws\ApplicationAutoScaling` - Application Auto Scaling now supports automatic scaling of Amazon Aurora replicas
* `Aws\EC2` - You are now able to create and launch EC2 x1e smaller instance sizes
* `Aws\Glue` - API update for AWS Glue. New crawler configuration attribute enables customers to specify crawler behavior. New XML classifier enables classification of XML data.
* `Aws\OpsWorksCM` - Documentation updates for OpsWorks-cm: a new feature, OpsWorks for Puppet Enterprise, that allows users to create and manage OpsWorks-hosted Puppet Enterprise servers.
* `Aws\Organizations` - This release adds APIs that you can use to enable and disable integration with AWS services designed to work with AWS Organizations. This integration allows the AWS service to perform operations on your behalf on all of the accounts in your organization. Although you can use these APIs yourself, we recommend that you instead use the commands provided in the other AWS service to enable integration with AWS Organizations.
* `Aws\Route53` - You can use Route 53's GetAccountLimit/GetHostedZoneLimit/GetReusableDelegationSetLimit APIs to view your current limits (including custom set limits) on Route 53 resources such as hosted zones and health checks. These APIs also return the number of each resource you're currently using to enable comparison against your current limits.

## 3.38.3 - 2017-11-15

* `Aws\APIGateway` - 1. Extended GetDocumentationParts operation to support retrieving documentation parts resources without contents. 2. Added hosted zone ID in the custom domain response.
* `Aws\Polly` - Amazon Polly adds Korean language support with new female voice - "Seoyeon" and new Indian English female voice - "Aditi"
* `Aws\SES` - SES launches Configuration Set Reputation Metrics and Email Pausing Today, two features that build upon the capabilities of the reputation dashboard. The first is the ability to export reputation metrics for individual configuration sets. The second is the ability to temporarily pause email sending, either at the configuration set level, or across your entire Amazon SES account.
* `Aws\SFN` - You can now use the UpdateStateMachine API to update your state machine definition and role ARN. Existing executions will continue to use the previous definition and role ARN. You can use the DescribeStateMachineForExecution API to determine which state machine definition and role ARN is associated with an execution

## 3.38.2 - 2017-11-14

* `Aws\ECS` - Added new mode for Task Networking in ECS, called awsvpc mode. Mode configuration parameters to be passed in via awsvpcConfiguration. Updated APIs now use/show this new mode - RegisterTaskDefinition, CreateService, UpdateService, RunTask, StartTask.
* `Aws\Lightsail` - Lightsail now supports attached block storage, which allows you to scale your applications and protect application data with additional SSD-backed storage disks. This feature allows Lightsail customers to attach secure storage disks to their Lightsail instances and manage their attached disks, including creating and deleting disks, attaching and detaching disks from instances, and backing up disks via snapshot.
* `Aws\Route53` - When a Route 53 health check or hosted zone is created by a linked AWS service, the object now includes information about the service that created it. Hosted zones or health checks that are created by a linked service can't be updated or deleted using Route 53.
* `Aws\SSM` - EC2 Systems Manager GetInventory API adds support for aggregation.

## 3.38.1 - 2017-11-09

* `Aws\EC2` - Introduces the following features: 1. Create a default subnet in an Availability Zone if no default subnet exists. 2. Spot Fleet integrates with Elastic Load Balancing to enable you to attach one or more load balancers to a Spot Fleet request. When you attach the load balancer, it automatically registers the instance in the Spot Fleet to the load balancers which distributes incoming traffic across the instances. 

## 3.38.0 - 2017-11-08

* `Aws\ApplicationAutoScaling` - Application Auto Scaling customers are now able to schedule adjustments to their MinCapacity and MaxCapacity, which makes it possible to pre-provision adequate capacity for anticipated demand and then reduce the provisioned capacity as demand lulls.
* `Aws\Batch` - Documentation updates for AWS Batch.
* `Aws\EC2` - AWS PrivateLink for Amazon Services - Customers can now privately access Amazon services from their Amazon Virtual Private Cloud (VPC), without using public IPs, and without requiring the traffic to traverse across the Internet.
* `Aws\ElastiCache` - This release adds online resharding for ElastiCache for Redis offering, providing the ability to add and remove shards from a running cluster. Developers can now dynamically scale-out or scale-in their Redis cluster workloads to adapt to changes in demand. ElastiCache will resize the cluster by adding or removing shards and redistribute hash slots uniformly across the new shard configuration, all while the cluster continues to stay online and serves requests.
* `Aws\Rds` - Update PresignUrlMiddleware to take an optional require_different_region, default false, for providing presigned urls only if the source and destination regions differ. Require this for RdsClient operations that use the middleware.
* `Aws\S3` - Updates several S3 endpoints.
* `Aws\S3` - Adds the S3EncryptionClient with CBC and GCM support. Uses pluggable strategies for handling a MetadataEnvelope in conjunction with a MaterialsProvider. Supports putObject[Async] and getObject[Async] operations.

## 3.37.1 - 2017-11-07

* `Aws\ElasticLoadBalancingv2` - Added a new limit related to Network Load Balancers on the number of targets per load balancer per AZ.
* `Aws\RDS` - DescribeOrderableDBInstanceOptions now returns the minimum and maximum allowed values for storage size, total provisioned IOPS, and provisioned IOPS per GiB for a DB instance.
* `Aws\S3` - This releases adds support for 4 features: 1. Default encryption for S3 Bucket, 2. Encryption status in inventory and Encryption support for inventory. 3. Cross region replication of KMS-encrypted objects, and 4. ownership overwrite for CRR. 
* `Aws\ServiceCatalog` - Region launch expansion of SCS for new region SA-EAST-1
* `Aws\ServiceCatalog` - Region launch expansion of Service Catalog Service for new region US-WEST-1
* `Aws\ServiceCatalog` - Region launch expansion for SCS in new region AP-SOUTH-1 BOM

## 3.37.0 - 2017-11-07

* `Aws\EC2` - You are now able to create and launch EC2 C5 instances, the next generation of EC2's compute-optimized instances, in us-east-1, us-west-2 and eu-west-1. C5 instances offer up to 72 vCPUs, 144 GiB of DDR4 instance memory, 25 Gbps in Network bandwidth and improved EBS and Networking bandwidth on smaller instance sizes to deliver improved performance for compute-intensive workloads.
* `Aws\KMS` - Documentation updates for AWS KMS. 
* `Aws\Organizations` - This release updates permission statements for several API operations, and corrects some other minor errors.
* `Aws\Pricing` - This is the initial release of AWS Price List Service.
* `Aws\SFN` - Documentation update.

## 3.36.37 - 2017-11-03

* `Aws\ECS` - Amazon ECS users can now add devices to their containers and enable init process in containers through the use of docker's 'devices' and 'init' features. These fields can be specified under linuxParameters in ContainerDefinition in the Task Definition Template. 

## 3.36.36 - 2017-11-02

* `Aws\APIGateway` - This release supports creating and managing Regional and Edge-Optimized API endpoints.

## 3.36.35 - 2017-11-01

* `Aws\ACM` - Documentation updates for acm
* `Aws\CloudHSMV2` - Minor documentation update for AWS CloudHSM (cloudhsmv2).
* `Aws\DirectConnect` - AWS DirectConnect now provides support for Global Access for Virtual Private Cloud (VPC) via a new feature called Direct Connect Gateway. A Direct Connect Gateway will allow you to group multiple Direct Connect Private Virtual Interfaces (DX-VIF) and Private Virtual Gateways (VGW) from different AWS regions (but belonging to the same AWS Account) and pass traffic from any DX-VIF to any VPC in the grouping.

## 3.36.34 - 2017-10-26

* `Aws\CloudFront` - You can now specify additional options for MinimumProtocolVersion, which controls the SSL/TLS protocol that CloudFront uses to communicate with viewers. The minimum protocol version that you choose also determines the ciphers that CloudFront uses to encrypt the content that it returns to viewers.
* `Aws\EC2` - You are now able to create and launch EC2 P3 instance, next generation GPU instances, optimized for machine learning and high performance computing applications. With up to eight NVIDIA Tesla V100 GPUs, P3 instances provide up to one petaflop of mixed-precision, 125 teraflops of single-precision, and 62 teraflops of double-precision floating point performance, as well as a 300 GB/s second-generation NVLink interconnect that enables high-speed, low-latency GPU-to-GPU communication. P3 instances also feature up to 64 vCPUs based on custom Intel Xeon E5 (Broadwell) processors, 488 GB of DRAM, and 25 Gbps of dedicated aggregate network bandwidth using the Elastic Network Adapter (ENA).

## 3.36.33 - 2017-10-24

* `Aws\ConfigService` - AWS Config support for CodeBuild Project resource type
* `Aws\ElastiCache` - Amazon ElastiCache for Redis today announced support for data encryption both for data in-transit and data at-rest. The new encryption in-transit functionality enables ElastiCache for Redis customers to encrypt data for all communication between clients and Redis engine, and all intra-cluster Redis communication. The encryption at-rest functionality allows customers to encrypt their S3 based backups. Customers can begin using the new functionality by simply enabling this functionality via AWS console, and a small configuration change in their Redis clients. The ElastiCache for Redis service automatically manages life cycle of the certificates required for encryption, including the issuance, renewal and expiration of certificates. Additionally, as part of this launch, customers will gain the ability to start using the Redis AUTH command that provides an added level of authentication.
* `Aws\Glue` - AWS Glue: Adding a new API, BatchStopJobRun, to stop one or more job runs for a specified Job. 
* `Aws\Pinpoint` - Added support for APNs VoIP messages. Added support for collapsible IDs, message priority, and TTL for APNs and FCM/GCM.

## 3.36.32 - 2017-10-23

* `Aws\` - Override passed in starting token for a ResultPaginator when moving to the next command.
* `Aws\Organizations` - This release supports integrating other AWS services with AWS Organizations through the use of an IAM service-linked role called AWSServiceRoleForOrganizations. Certain operations automatically create that role if it does not already exist.

## 3.36.31 - 2017-10-20

* `Aws\EC2` - Adding pagination support for DescribeSecurityGroups for EC2 Classic and VPC Security Groups

## 3.36.30 - 2017-10-19

* `Aws\S3` - PostObject[V4] classes now obey use_path_style_endpoint client configuration in form generation.
* `Aws\SQS` - Added support for tracking cost allocation by adding, updating, removing, and listing the metadata tags of Amazon SQS queues.
* `Aws\SSM` - EC2 Systems Manager versioning support for Parameter Store. Also support for referencing parameter versions in SSM Documents.

## 3.36.29 - 2017-10-18

* `Aws\Lightsail` - This release adds support for Windows Server-based Lightsail instances. The GetInstanceAccessDetails API now returns the password of your Windows Server-based instance when using the default key pair. GetInstanceAccessDetails also returns a PasswordData object for Windows Server instances containing the ciphertext and keyPairName. The Blueprint data type now includes a list of platform values (LINUX_UNIX or WINDOWS). The Bundle data type now includes a list of SupportedPlatforms values (LINUX_UNIX or WINDOWS).

## 3.36.28 - 2017-10-17

* `Aws\CloudHSMV2` - Service Region Launch.
* `Aws\ElasticsearchService` - This release adds support for VPC access to Amazon Elasticsearch Service.
* `Aws\S3` - No longer override supplied ContentType parameter when performing a multipart upload.

## 3.36.27 - 2017-10-16

* `Aws\CloudHSM` - Documentation updates for AWS CloudHSM Classic.
* `Aws\EC2` - You can now change the tenancy of your VPC from dedicated to default with a single API operation. For more details refer to the documentation for changing VPC tenancy.
* `Aws\ElasticsearchService` - AWS Elasticsearch adds support for enabling slow log publishing. Using slow log publishing options customers can configure and enable index/query slow log publishing of their domain to preferred AWS Cloudwatch log group.
* `Aws\RDS` - Adds waiters for DBSnapshotAvailable and DBSnapshotDeleted.
* `Aws\WAF` - This release adds support for regular expressions as match conditions in rules, and support for geographical location by country of request IP address as a match condition in rules.
* `Aws\WAFRegional` - This release adds support for regular expressions as match conditions in rules, and support for geographical location by country of request IP address as a match condition in rules.

## 3.36.26 - 2017-10-12

* `Aws\CodeCommit` - This release includes the DeleteBranch API and a change to the contents of a Commit object.
* `Aws\DatabaseMigrationService` - This change includes addition of new optional parameter to an existing API
* `Aws\ElasticBeanstalk` - Added the ability to add, delete or update Tags
* `Aws\Polly` - Amazon Polly exposes two new voices: "Matthew" (US English) and "Takumi" (Japanese)
* `Aws\RDS` - You can now call DescribeValidDBInstanceModifications to learn what modifications you can make to your DB instance. You can use this information when you call ModifyDBInstance.

## 3.36.25 - 2017-10-11

* `Aws\ECR` - Adds support for new API set used to manage Amazon ECR repository lifecycle policies. Amazon ECR lifecycle policies enable you to specify the lifecycle management of images in a repository. The configuration is a set of one or more rules, where each rule defines an action for Amazon ECR to apply to an image. This allows the automation of cleaning up unused images, for example expiring images based on age or status. A lifecycle policy preview API is provided as well, which allows you to see the impact of a lifecycle policy on an image repository before you execute it
* `Aws\SES` - Added content related to email template management and templated email sending operations.

## 3.36.24 - 2017-10-10

* `Aws\EC2` - This release includes updates to AWS Virtual Private Gateway.
* `Aws\ElasticLoadBalancingv2` - Server Name Indication (SNI) is an extension to the TLS protocol by which a client indicates the hostname to connect to at the start of the TLS handshake. The load balancer can present multiple certificates through the same secure listener, which enables it to support multiple secure websites using a single secure listener. Application Load Balancers also support a smart certificate selection algorithm with SNI. If the hostname indicated by a client matches multiple certificates, the load balancer determines the best certificate to use based on multiple factors including the capabilities of the client.
* `Aws\OpsWorksCM` - Provide engine specific information for node associations.

## 3.36.23 - 2017-10-06

* `Aws\ConfigService` - Revert: Added missing enumeration values for ConfigurationItemStatus
* `Aws\SQS` - Documentation updates regarding availability of FIFO queues and miscellaneous corrections.

## 3.36.22 - 2017-10-06

* `Aws\ConfigService` - Added missing enumeration values for ConfigurationItemStatus
* `Aws\SQS` - Documentation updates regarding availability of FIFO queues and miscellaneous corrections.

## 3.36.21 - 2017-10-05

* `Aws\Redshift` - DescribeEventSubscriptions API supports tag keys and tag values as request parameters. 
* `Aws\S3` - Properly parse s3:// uri used with StreamWrapper.

## 3.36.20 - 2017-10-04

* `Aws\` - Optionally preserve CommandPool keys during generation
* `Aws\KinesisAnalytics` - Kinesis Analytics now supports schema discovery on objects in S3. Additionally, Kinesis Analytics now supports input data preprocessing through Lambda.
* `Aws\Route53Domains` - Added a new API that checks whether a domain name can be transferred to Amazon Route 53.

## 3.36.19 - 2017-10-03

* `Aws\EC2` - This release includes service updates to AWS VPN.
* `Aws\SSM` - EC2 Systems Manager support for tagging SSM Documents. Also support for tag-based permissions to restrict access to SSM Documents based on these tags.

## 3.36.18 - 2017-10-02

* `Aws\CloudHSM` - Documentation updates for CloudHSM

## 3.36.17 - 2017-09-29

* `Aws\AppStream` - Includes APIs for managing and accessing image builders, and deleting images.
* `Aws\CodeBuild` - Adding support for Building GitHub Pull Requests in AWS CodeBuild
* `Aws\MTurk` - Today, Amazon Mechanical Turk (MTurk) supports SQS Notifications being delivered to Customers' SQS queues when different stages of the MTurk workflow are complete. We are going to create new functionality so that Customers can leverage SNS topics as a destination for notification messages when various stages of the MTurk workflow are complete. 
* `Aws\Organizations` - This release flags the HandshakeParty structure's Type and Id fields as 'required'. They effectively were required in the past, as you received an error if you did not include them. This is now reflected at the API definition level. 
* `Aws\Route53` - This change allows customers to reset elements of health check.
* `Aws\rds` - Introduce DBSnapshotAvailable and DBSnapshotDeleted waiters for DBSnapshot

## 3.36.16 - 2017-09-27

* `Aws\Pinpoint` - Added two new push notification channels: Amazon Device Messaging (ADM) and, for push notification support in China, Baidu Cloud Push. Added support for APNs auth via .p8 key file. Added operation for direct message deliveries to user IDs, enabling you to message an individual user on multiple endpoints.

## 3.36.15 - 2017-09-26

* `Aws\CloudFormation` - You can now prevent a stack from being accidentally deleted by enabling termination protection on the stack. If you attempt to delete a stack with termination protection enabled, the deletion fails and the stack, including its status, remains unchanged. You can enable termination protection on a stack when you create it. Termination protection on stacks is disabled by default. After creation, you can set termination protection on a stack whose status is CREATE_COMPLETE, UPDATE_COMPLETE, or UPDATE_ROLLBACK_COMPLETE.

## 3.36.14 - 2017-09-22

* `Aws\ConfigService` - AWS Config support for DynamoDB tables and Auto Scaling resource types
* `Aws\ECS` - Amazon ECS users can now add and drop Linux capabilities to their containers through the use of docker's cap-add and cap-drop features. Customers can specify the capabilities they wish to add or drop for each container in their task definition. 
* `Aws\RDS` - Documentation updates for rds

## 3.36.13 - 2017-09-21

* `Aws\Budgets` - Including "DuplicateRecordException" in UpdateNotification and UpdateSubscriber. 
* `Aws\CloudWatchLogs` - Adds support for associating LogGroups with KMS Keys.
* `Aws\EC2` - Add EC2 APIs to copy Amazon FPGA Images (AFIs) within the same region and across multiple regions, delete AFIs, and modify AFI attributes. AFI attributes include name, description and granting/denying other AWS accounts to load the AFI.

## 3.36.12 - 2017-09-20

* `Aws\AppStream` - API updates for supporting On-Demand fleets.
* `Aws\CodePipeline` - This change includes a PipelineMetadata object that is part of the output from the GetPipeline API that includes the Pipeline ARN, created, and updated timestamp.
* `Aws\Greengrass` - Reset Deployments feature allows you to clean-up the cloud resource so you can delete the group. It also cleans up the core so that it goes back to the pre-deployment state.
* `Aws\Greengrass` - AWS Greengrass is now available in the Asia Pacific (Tokyo) region, ap-northeast-1.
* `Aws\LexRuntimeService` - Request attributes can be used to pass client specific information from the client to Amazon Lex as part of each request.
* `Aws\RDS` - Introduces the --option-group-name parameter to the ModifyDBSnapshot CLI command. You can specify this parameter when you upgrade an Oracle DB snapshot. The same option group considerations apply when upgrading a DB snapshot as when upgrading a DB instance. For more information, see http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_UpgradeDBInstance.Oracle.html#USER_UpgradeDBInstance.Oracle.OGPG.OG

## 3.36.11 - 2017-09-19

* `Aws\EC2` - Fixed bug in EC2 clients preventing ElasticGpuSet from being set.

## 3.36.10 - 2017-09-18

* `Aws\EC2` - Amazon EC2 now lets you opt for Spot instances to be stopped in the event of an interruption instead of being terminated. Your Spot request can be fulfilled again by restarting instances from a previously stopped state, subject to availability of capacity at or below your preferred price. When you submit a persistent Spot request, you can choose from "terminate" or "stop" as the instance interruption behavior. Choosing "stop" will shutdown your Spot instances so you can continue from this stopped state later on. This feature is only available for instances with Amazon EBS volume as their root device.
* `Aws\IAM` - A new API, DeleteServiceLinkedRole, submits a service-linked role deletion request and returns a DeletionTaskId, which you can use to check the status of the deletion.
* `Aws\SES` - Amazon Simple Email Service (Amazon SES) now lets you customize the domains used for tracking open and click events. Previously, open and click tracking links referred to destinations hosted on domains operated by Amazon SES. With this feature, you can use your own branded domains for capturing open and click events.

## 3.36.9 - 2017-09-15

* `Aws\APIGateway` - Add a new enum "REQUEST" to '--type <value>' field in the current create-authorizer API, and make "identitySource" optional.

## 3.36.8 - 2017-09-14

* `Aws\CodeBuild` - Supporting Parameter Store in environment variables for AWS CodeBuild
* `Aws\Organizations` - Documentation updates for AWS Organizations
* `Aws\ServiceCatalog` - This release of Service Catalog adds API support to copy products.

## 3.36.7 - 2017-09-13

* `Aws\AutoScaling` - Customers can create Life Cycle Hooks at the time of creating Auto Scaling Groups through the CreateAutoScalingGroup API
* `Aws\Batch` - Documentation updates for batch
* `Aws\CloudWatchEvents` - Exposes ConcurrentModificationException as one of the valid exceptions for PutPermission and RemovePermission operation.
* `Aws\EC2` - You are now able to create and launch EC2 x1e.32xlarge instance, a new EC2 instance in the X1 family, in us-east-1, us-west-2, eu-west-1, and ap-northeast-1. x1e.32xlarge offers 128 vCPUs, 3,904 GiB of DDR4 instance memory, high memory bandwidth, large L3 caches, and leading reliability capabilities to boost the performance and reliability of in-memory applications.

## 3.36.6 - 2017-09-12

* `Aws\EC2` - Fixed bug in EC2 clients preventing HostOfferingSet from being set

## 3.36.5 - 2017-09-11

* `Aws\DeviceFarm` - DeviceFarm has added support for two features - RemoteDebugging and Customer Artifacts. Customers can now do remote Debugging on their Private Devices and can now retrieve custom files generated by their tests on the device and the device host (execution environment) on both public and private devices. 

## 3.36.4 - 2017-09-08

* `Aws\CloudWatchLogs` - Adds support for the PutResourcePolicy, DescribeResourcePolicy and DeleteResourcePolicy APIs.

## 3.36.3 - 2017-09-07

* `Aws\ApplicationAutoScaling` - Documentation updates for application-autoscaling
* `Aws\EC2` - With Tagging support, you can add Key and Value metadata to search, filter and organize your NAT Gateways according to your organization's needs.
* `Aws\ElasticLoadBalancingv2` - The feature enables the new Network Load Balancer that is optimized to handle volatile traffic patterns while using a single static IP address per Availability Zone. Network Load Balancer operates at the connection level (Layer 4), routing connections to Amazon EC2 instances and containers, within Amazon Virtual Private Cloud (Amazon VPC) based on IP protocol data.
* `Aws\LexModelBuildingService` - Amazon Lex provides the ability to export your Amazon Lex chatbot definition as a JSON file that can be added to the target platform. The JSON configuration file contains the structure of your Amazon Lex chatbot, including the intent schema with utterances, slots, prompts and slot-types.
* `Aws\Route53` - You can configure Amazon Route 53 to log information about the DNS queries that Amazon Route 53 receives for your domains and subdomains. When you configure query logging, Amazon Route 53 starts to send logs to CloudWatch Logs. You can use various tools, including the AWS console, to access the query logs.

## 3.36.2 - 2017-09-06

* `Aws\Budgets` - Add an optional "thresholdType" to notifications to support percentage or absolute value thresholds.

## 3.36.1 - 2017-09-05

* `Aws\CodeStar` - Added support to tag CodeStar projects. Tags can be used to organize and find CodeStar projects on key-value pairs that you can choose. For example, you could add a tag with a key of "Release" and a value of "Beta" to projects your organization is working on for an upcoming beta release.

## 3.36.0 - 2017-09-01

* `Aws\GameLift` - GameLift VPC resources can be peered with any other AWS VPC. R4 memory-optimized instances now available to deploy.
* `Aws\Mobile` - AWS Mobile Hub is an integrated experience designed to help developers build, test, configure and release cloud-based applications for mobile devices using Amazon Web Services. AWS Mobile Hub provides a console and API for developers, allowing them to quickly select desired features and integrate them into mobile applications. Features include NoSQL Database, Cloud Logic, Messaging and Analytics. With AWS Mobile Hub, you pay only for the underlying services that Mobile Hub provisions based on the features you choose in the Mobile Hub console.
* `Aws\SSM` - Adding KMS encryption support to SSM Inventory Resource Data Sync. Exposes the ClientToken parameter on SSM StartAutomationExecution to provide idempotent execution requests.

## 3.35.3 - 2017-08-31

* `Aws\CodeBuild` - The AWS CodeBuild HTTP API now provides the BatchDeleteBuilds operation, which enables you to delete existing builds.
* `Aws\EC2` - Descriptions for Security Group Rules enables customers to be able to define a description for ingress and egress security group rules . The Descriptions for Security Group Rules feature supports one description field per Security Group rule for both ingress and egress rules . Descriptions for Security Group Rules provides a simple way to describe the purpose or function of a Security Group Rule allowing for easier customer identification of configuration elements . Prior to the release of Descriptions for Security Group Rules , customers had to maintain a separate system outside of AWS if they wanted to track Security Group Rule mapping and their purpose for being implemented. If a security group rule has already been created and you would like to update or change your description for that security group rule you can use the UpdateSecurityGroupRuleDescription API.
* `Aws\ElasticLoadBalancingv2` - This change now allows Application Load Balancers to distribute traffic to AWS resources using their IP addresses as targets in addition to the instance IDs. You can also load balance to resources outside the VPC hosting the load balancer using their IP addresses as targets. This includes resources in peered VPCs, EC2-Classic, and on-premises locations reachable over AWS Direct Connect or a VPN connection.
* `Aws\LexModelBuildingService` - Amazon Lex now supports synonyms for slot type values. If the user inputs a synonym, it will be resolved to the corresponding slot value.

## 3.35.2 - 2017-08-30

* `Aws\ApplicationAutoScaling` - Application Auto Scaling now supports the DisableScaleIn option for Target Tracking Scaling Policies. This allows customers to create scaling policies that will only add capacity to the target.
* `Aws\Organizations` - The exception ConstraintViolationException now contains a new reason subcode MASTERACCOUNT_MISSING_CONTACT_INFO to make it easier to understand why attempting to remove an account from an Organization can fail. We also improved several other of the text descriptions and examples.

## 3.35.1 - 2017-08-29

* `Aws\ConfigService` - Increased the internal size limit of resourceId
* `Aws\EC2` - Provides capability to add secondary CIDR blocks to a VPC.

## 3.35.0 - 2017-08-25

* `Aws\` - Update CloudHSM smoke tests to CloudHSMV2
* `Aws\CloudFormation` - Rollback triggers enable you to have AWS CloudFormation monitor the state of your application during stack creation and updating, and to roll back that operation if the application breaches the threshold of any of the alarms you've specified.
* `Aws\GameLift` - Update spelling of MatchmakingTicket status values for internal consistency.
* `Aws\RDS` - Option group options now contain additional properties that identify requirements for certain options. Check these properties to determine if your DB instance must be in a VPC or have auto minor upgrade turned on before you can use an option. Check to see if you can downgrade the version of an option after you have installed it.

## 3.34.2 - 2017-08-24

* `Aws\Rekognition` - Update the enum value of LandmarkType and GenderType to be consistent with service response

## 3.34.1 - 2017-08-23

* `Aws\AppStream` - Documentation updates for appstream

## 3.34.0 - 2017-08-22

* `Aws\` - Fixes an issue where exceptions weren't being fully loaded when using a `SaveAs` parameter set to a file path on Guzzle v5.
* `Aws\` - Update Composer to add dependencies on `simplexml`, `pcre`, `spl` and `json`. This change will cause Composer updates to fail if you do not have these PHP extensions installed.
* `Aws\SSM` - Changes to associations in Systems Manager State Manager can now be recorded. Previously, when you edited associations, you could not go back and review older association settings. Now, associations are versioned, and can be named using human-readable strings, allowing you to see a trail of association changes. You can also perform rate-based scheduling, which allows you to schedule associations more granularly.

## 3.33.4 - 2017-08-21

* `Aws\Firehose` - This change will allow customers to attach a Firehose delivery stream to an existing Kinesis stream directly. You no longer need a forwarder to move data from a Kinesis stream to a Firehose delivery stream. You can now run your streaming applications on your Kinesis stream and easily attach a Firehose delivery stream to it for data delivery to S3, Redshift, or Elasticsearch concurrently.
* `Aws\Route53` - Amazon Route 53 now supports CAA resource record type. A CAA record controls which certificate authorities are allowed to issue certificates for the domain or subdomain.

## 3.33.3 - 2017-08-18

* `Aws\CodeStar` - Launch AWS CodeStar in the US West (N. California) and EU (London) regions.

## 3.33.2 - 2017-08-16

* `Aws\` - Fixes a bug in `ClientResolver` that would provide incorrect information on required parameters set to `null` when resolving a client.
* `Aws\GameLift` - The Matchmaking Grouping Service is a new feature that groups player match requests for a given game together into game sessions based on developer configured rules.

## 3.33.1 - 2017-08-15

* `Aws\EC2` - Fixed bug in EC2 clients preventing HostReservation from being set

## 3.33.0 - 2017-08-14

* `Aws\Batch` - This release enhances the DescribeJobs API to include the CloudWatch logStreamName attribute in ContainerDetail and ContainerDetailAttempt
* `Aws\CloudHSMV2` - CloudHSM provides hardware security modules for protecting sensitive data and cryptographic keys within an EC2 VPC, and enable the customer to maintain control over key access and use. This is a second-generation of the service that will improve security, lower cost and provide better customer usability.
* `Aws\EFS` - Customers can create encrypted EFS file systems and specify a KMS master key to encrypt it with.
* `Aws\Glue` - AWS Glue is a fully managed extract, transform, and load (ETL) service that makes it easy for customers to prepare and load their data for analytics. You can create and run an ETL job with a few clicks in the AWS Management Console. You simply point AWS Glue to your data stored on AWS, and AWS Glue discovers your data and stores the associated metadata (e.g. table definition and schema) in the AWS Glue Data Catalog. Once cataloged, your data is immediately searchable, queryable, and available for ETL. AWS Glue generates the code to execute your data transformations and data loading processes. AWS Glue generates Python code that is entirely customizable, reusable, and portable. Once your ETL job is ready, you can schedule it to run on AWS Glue's fully managed, scale-out Spark environment. AWS Glue provides a flexible scheduler with dependency resolution, job monitoring, and alerting. AWS Glue is serverless, so there is no infrastructure to buy, set up, or manage. It automatically provisions the environment needed to complete the job, and customers pay only for the compute resources consumed while running ETL jobs. With AWS Glue, data can be available for analytics in minutes.
* `Aws\MigrationHub` - AWS Migration Hub provides a single location to track migrations across multiple AWS and partner solutions. Using Migration Hub allows you to choose the AWS and partner migration tools that best fit your needs, while providing visibility into the status of your entire migration portfolio. Migration Hub also provides key metrics and progress for individual applications, regardless of which tools are being used to migrate them. For example, you might use AWS Database Migration Service, AWS Server Migration Service, and partner migration tools to migrate an application comprised of a database, virtualized web servers, and a bare metal server. Using Migration Hub will provide you with a single screen that shows the migration progress of all the resources in the application. This allows you to quickly get progress updates across all of your migrations, easily identify and troubleshoot any issues, and reduce the overall time and effort spent on your migration projects. Migration Hub is available to all AWS customers at no additional charge. You only pay for the cost of the migration tools you use, and any resources being consumed on AWS.
* `Aws\SSM` - Systems Manager Maintenance Windows include the following changes or enhancements: New task options using Systems Manager Automation, AWS Lambda, and AWS Step Functions; enhanced ability to edit the targets of a Maintenance Window, including specifying a target name and description, and ability to edit the owner field; enhanced ability to edits tasks; enhanced support for Run Command parameters; and you can now use a --safe flag when attempting to deregister a target. If this flag is enabled when you attempt to deregister a target, the system returns an error if the target is referenced by any task. Also, Systems Manager now includes Configuration Compliance to scan your fleet of managed instances for patch compliance and configuration inconsistencies. You can collect and aggregate data from multiple AWS accounts and Regions, and then drill down into specific resources that aren't compliant.
* `Aws\StorageGateway` - Add optional field ForceDelete to DeleteFileShare api.

## 3.32.7 - 2017-08-11

* `Aws\CodeDeploy` - Adds support for specifying Application Load Balancers in deployment groups, for both in-place and blue/green deployments.
* `Aws\CognitoIdentityProvider` - We have added support for features for Amazon Cognito User Pools that enable application developers to easily add and customize a sign-up and sign-in user experience, use OAuth 2.0, and integrate with Facebook, Google, Login with Amazon, and SAML-based identity providers.
* `Aws\EC2` - Provides customers an opportunity to recover an EIP that was released

## 3.32.6 - 2017-08-10

* `Aws\CloudDirectory` - Enable BatchDetachPolicy
* `Aws\CodeBuild` - Supporting Bitbucket as source type in AWS CodeBuild.

## 3.32.5 - 2017-08-09

* `Aws\RDS` - Documentation updates for RDS.

## 3.32.4 - 2017-08-08

* `Aws\ElasticBeanstalk` - Add support for paginating the result of DescribeEnvironments. Include the ARN of described environments in DescribeEnvironments output.
* `Aws\Signature` - Fixed edgecase in expiration duration check on signature when seconds roll between implicit startime and relative end time.

## 3.32.3 - 2017-08-01

* `Aws\CodeDeploy` - AWS CodeDeploy now supports the use of multiple tag groups in a single deployment group (an intersection of tags) to identify the instances for a deployment. When you create or update a deployment group, use the new ec2TagSet and onPremisesTagSet structures to specify up to three groups of tags. Only instances that are identified by at least one tag in each of the tag groups are included in the deployment group.
* `Aws\ConfigService` - Added new API, GetDiscoveredResourceCounts, which returns the resource types, the number of each resource type, and the total number of resources that AWS Config is recording in the given region for your AWS account.
* `Aws\EC2` - Ec2 SpotInstanceRequestFulfilled waiter update
* `Aws\ElasticLoadBalancingv2` - Add TargetInService and TargetDeregistered waiters 
* `Aws\Pinpoint` - This release of the Pinpoint SDK enables App management - create, delete, update operations, Raw Content delivery for APNs and GCM campaign messages and From Address override.
* `Aws\SES` - This update adds information about publishing email open and click events. This update also adds information about publishing email events to Amazon Simple Notification Service (Amazon SNS).

## 3.32.2 - 2017-07-31

* `Aws\CodeStar` -  AWS CodeStar is now available in the following regions: Asia Pacific (Singapore), Asia Pacific (Sydney), EU (Frankfurt)
* `Aws\Inspector` - Inspector's StopAssessmentRun API has been updated with a new input option - stopAction. This request parameter can be set to either START_EVALUATION or SKIP_EVALUATION. START_EVALUATION (the default value, and the previous behavior) stops the AWS agent data collection and begins the results evaluation for findings generation based on the data collected so far. SKIP_EVALUATION cancels the assessment run immediately, after which no findings are generated.
* `Aws\SSM` - Adds a SendAutomationSignal API to SSM Service. This API is used to send a signal to an automation execution to change the current behavior or status of the execution.

## 3.32.1 - 2017-07-27

* `Aws\EC2` - The CreateDefaultVPC API enables you to create a new default VPC . You no longer need to contact AWS support, if your default VPC has been deleted.
* `Aws\KinesisAnalytics` - Added additional exception types and clarified documentation.

## 3.32.0 - 2017-07-26

* `Aws\` - Support for changes regarding PHP 7.2 releases.
* `Aws\CloudWatch` - This release adds high resolution features to CloudWatch, with support for Custom Metrics down to 1 second and Alarms down to 10 seconds.
* `Aws\DynamoDB` - Corrected a typo.
* `Aws\EC2` - Amazon EC2 Elastic GPUs allow you to easily attach low-cost graphics acceleration to current generation EC2 instances. With Amazon EC2 Elastic GPUs, you can configure the right amount of graphics acceleration to your particular workload without being constrained by fixed hardware configurations and limited GPU selection.

## 3.31.10 - 2017-07-25

* `Aws\CloudDirectory` - Cloud Directory adds support for additional batch operations.
* `Aws\CloudFormation` - AWS CloudFormation StackSets enables you to manage stacks across multiple accounts and regions.

## 3.31.9 - 2017-07-24

* `Aws\AppStream` - Amazon AppStream 2.0 image builders and fleets can now access applications and network resources that rely on Microsoft Active Directory (AD) for authentication and permissions. This new feature allows you to join your streaming instances to your AD, so you can use your existing AD user management tools. 
* `Aws\EC2` - Spot Fleet tagging capability allows customers to automatically tag instances launched by Spot Fleet. You can use this feature to label or distinguish instances created by distinct Spot Fleets. Tagging your EC2 instances also enables you to see instance cost allocation by tag in your AWS bill.

## 3.31.8 - 2017-07-20

* `Aws\EMR` - Amazon EMR now includes the ability to use a custom Amazon Linux AMI and adjustable root volume size when launching a cluster.

## 3.31.7 - 2017-07-19

* `Aws\Budgets` - Update budget Management API's to list/create/update RI_UTILIZATION type budget. Update budget Management API's to support DAILY timeUnit for RI_UTILIZATION type budget.
* `Aws\S3` - Properly handle reading mismatched regions from S3's AuthorizationHeaderMalformed exception for S3MultiRegionClient.

## 3.31.6 - 2017-07-17

* `Aws\CognitoIdentityProvider` - Allows developers to configure user pools for email/phone based signup and sign-in.
* `Aws\Lambda` - Lambda@Edge lets you run code closer to your end users without provisioning or managing servers. With Lambda@Edge, your code runs in AWS edge locations, allowing you to respond to your end users at the lowest latency. Your code is triggered by Amazon CloudFront events, such as requests to and from origin servers and viewers, and it is ready to execute at every AWS edge location whenever a request for content is received. You just upload your Node.js code to AWS Lambda and Lambda takes care of everything required to run and scale your code with high availability. You only pay for the compute time you consume - there is no charge when your code is not running.

## 3.31.5 - 2017-07-14

* `Aws\ApplicationDiscoveryService` - Adding feature to the Export API for Discovery Service to allow filters for the export task to allow export based on per agent id.
* `Aws\EC2` - New EC2 GPU Graphics instance
* `Aws\MarketplaceCommerceAnalytics` - Update to Documentation Model For New Report Cadence / Reformat of Docs

## 3.31.4 - 2017-07-13

* `Aws\APIGateway` - Adds support for management of gateway responses.
* `Aws\EC2` - X-ENI (or Cross-Account ENI) is a new feature that allows the attachment or association of Elastic Network Interfaces (ENI) between VPCs in different AWS accounts located in the same availability zone. With this new capability, service providers and partners can deliver managed solutions in a variety of new architectural patterns where the provider and consumer of the service are in different AWS accounts.
* `Aws\LexModelBuildingService` - Fixed broken links to reference and conceptual content.

## 3.31.3 - 2017-07-12

* `Aws\AutoScaling` - Auto Scaling now supports a new type of scaling policy called target tracking scaling policies that you can use to set up dynamic scaling for your application.
* `Aws\S3` - Fixes an issue introduced in 3.31.0 that was not setting the ContentLength for all MultipartUploader::createPart streams, therefore potentially using an incorrect, $options['params'] value.
* `Aws\SWF` - Added support for attaching control data to Lambda tasks. Control data lets you attach arbitrary strings to your decisions and history events.

## 3.31.2 - 2017-07-06

* `Aws\DirectoryService` - You can now improve the resilience and performance of your Microsoft AD directory by deploying additional domain controllers. Added UpdateNumberofDomainControllers API that allows you to update the number of domain controllers you want for your directory, and DescribeDomainControllers API that allows you to describe the detailed information of each domain controller of your directory. Also added the 'DesiredNumberOfDomainControllers' field to the DescribeDirectories API output for Microsoft AD.
* `Aws\Ecs` - ECS/ECR now available in BJS
* `Aws\KMS` - This release of AWS Key Management Service introduces the ability to determine whether a key is AWS managed or customer managed.
* `Aws\Kinesis` - You can now encrypt your data at rest within an Amazon Kinesis Stream using server-side encryption. Server-side encryption via AWS KMS makes it easy for customers to meet strict data management requirements by encrypting their data at rest within the Amazon Kinesis Streams, a fully managed real-time data processing service.
* `Aws\SSM` - Amazon EC2 Systems Manager now expands Patching support to Amazon Linux, Red Hat and Ubuntu in addition to the already supported Windows Server.

## 3.31.1 - 2017-07-05

* `Aws\CloudWatch` - We are excited to announce the availability of APIs and CloudFormation support for CloudWatch Dashboards. You can use the new dashboard APIs or CloudFormation templates to dynamically build and maintain dashboards to monitor your infrastructure and applications. There are four new dashboard APIs - PutDashboard, GetDashboard, DeleteDashboards, and ListDashboards APIs. PutDashboard is used to create a new dashboard or modify an existing one whereas GetDashboard is the API to get the details of a specific dashboard. ListDashboards and DeleteDashboards are used to get the names or delete multiple dashboards respectively. Getting started with dashboard APIs is similar to any other AWS APIs. The APIs can be accessed through AWS SDK or through CLI tools.
* `Aws\Route53` - Bug fix for InvalidChangeBatch exception.

## 3.31.0 - 2017-06-30

* `Aws\MarketplaceCommerceAnalytics` - Documentation updates for AWS Marketplace Commerce Analytics.
* `Aws\S3` - API Update for S3: Adding Object Tagging Header to MultipartUpload Initialization
* `Aws\S3` - A new `params` option is available in the `MultipartUploader` and `MultipartCopy` classes for parameters that should be applied to all sub-commands of their upload functionality. This also improves functionality around passing `params` directly to `ObjectUploader` and `ObjectCopier`. A new `before_lookup` callback has been added to `ObjectCopier` for operating on the `HeadObject` command directly; `params` will be passed to HeadObject as well. Since these are changes to existing options, they may alter current functionality.

## 3.30.4 - 2017-06-29

* `Aws\CloudWatchEvents` - CloudWatch Events now allows different AWS accounts to share events with each other through a new resource called event bus. Event buses accept events from AWS services, other AWS accounts and PutEvents API calls. Currently all AWS accounts have one default event bus. To send events to another account, customers simply write rules to match the events of interest and attach an event bus in the receiving account as the target to the rule. The PutTargets API has been updated to allow adding cross account event buses as targets. In addition, we have released two new APIs - PutPermission and RemovePermission - that enables customers to add/remove permissions to their default event bus.
* `Aws\GameLift` - Allow developers to download GameLift fleet creation logs to assist with debugging.
* `Aws\SSM` - Adding Resource Data Sync support to SSM Inventory. New APIs: * CreateResourceDataSync - creates a new resource data sync configuration, * ListResourceDataSync - lists existing resource data sync configurations, * DeleteResourceDataSync - deletes an existing resource data sync configuration. 

## 3.30.3 - 2017-06-27

* `Aws\Greengrass` - AWS Greengrass is now available in new regions.
* `Aws\ServiceCatalog` - Proper tagging of resources is critical to post-launch operations such as billing, cost allocation, and resource management. By using Service Catalog's TagOption Library, administrators can define a library of re-usable TagOptions that conform to company standards, and associate these with Service Catalog portfolios and products. Learn how to move your current tags to the new library, create new TagOptions, and view and associate your library items with portfolios and products. Understand how to ensure that the right tags are created on products launched through Service Catalog and how to provide users with defined selectable tags.

## 3.30.2 - 2017-06-23

* `Aws\Lambda` - The Lambda Invoke API will now throw new exception InvalidRuntimeException (status code 502) for invokes with deprecated runtimes.

## 3.30.1 - 2017-06-22

* `Aws\CodePipeline` - A new API, ListPipelineExecutions, enables you to retrieve summary information about the most recent executions in a pipeline, including pipeline execution ID, status, start time, and last updated time. You can request information for a maximum of 100 executions. Pipeline execution data is available for the most recent 12 months of activity.
* `Aws\DatabaseMigrationService` - Added tagging for DMS certificates.
* `Aws\ElasticLoadBalancing` - Add retry error state to InstanceInService waiter for ElasticLoadBalancer
* `Aws\Lambda` - Lambda is now available in the Canada (Central) region.
* `Aws\Lightsail` - This release adds a new nextPageToken property to the result of the GetOperationsForResource API. Developers can now get the next set of items in a list by making subsequent calls to GetOperationsForResource API with the token from the previous call. This release also deprecates the nextPageCount property, which previously returned null (use the nextPageToken property instead). This release also deprecates the customImageName property on the CreateInstancesRequest class, which was previously ignored by the API.
* `Aws\Route53` - This release reintroduces the HealthCheckInUse exception.

## 3.30.0 - 2017-06-21

* `Aws\DAX` - Amazon DynamoDB Accelerator (DAX) is a fully managed, highly available, in-memory cache for DynamoDB that delivers up to a 10x performance improvement - from milliseconds to microseconds - even at millions of requests per second. DAX does all the heavy lifting required to add in-memory acceleration to your DynamoDB tables, without requiring developers to manage cache invalidation, data population, or cluster management.
* `Aws\Route53` - Amazon Route 53 now supports multivalue answers in response to DNS queries, which lets you route traffic approximately randomly to multiple resources, such as web servers. Create one multivalue answer record for each resource and, optionally, associate an Amazon Route 53 health check with each record, and Amazon Route 53 responds to DNS queries with up to eight healthy records.
* `Aws\SSM` - Adding hierarchy support to the SSM Parameter Store API. Added support tor tagging. New APIs: GetParameter - retrieves one parameter, DeleteParameters - deletes multiple parameters (max number 10), GetParametersByPath - retrieves parameters located in the hierarchy. Updated APIs: PutParameter - added ability to enforce parameter value by applying regex (AllowedPattern), DescribeParameters - modified to support Tag filtering.
* `Aws\WAF` - You can now create, edit, update, and delete a new type of WAF rule with a rate tracking component.

## 3.29.9 - 2017-06-20

* `Aws\WorkDocs` - This release provides a new API to retrieve the activities performed by WorkDocs users.

## 3.29.8 - 2017-06-19

* `Aws\Organizations` - Improvements to Exception Modeling

## 3.29.7 - 2017-06-16

* `Aws\Batch` - AWS Batch is now available in the ap-northeast-1 region.
* `Aws\XRay` - Add a response time histogram to the services in response of GetServiceGraph API.

## 3.29.6 - 2017-06-15

* `Aws\EC2` - Adds API to describe Amazon FPGA Images (AFIs) available to customers, which includes public AFIs, private AFIs that you own, and AFIs owned by other AWS accounts for which you have load permissions.
* `Aws\ECS` - Added support for cpu, memory, and memory reservation container overrides on the RunTask and StartTask APIs.
* `Aws\IoT` - Revert the last release: remove CertificatePem from DescribeCertificate API.
* `Aws\ServiceCatalog` - Added ProvisioningArtifactSummaries to DescribeProductAsAdmin's output to show the provisioning artifacts belong to the product. Allow filtering by SourceProductId in SearchProductsAsAdmin for AWS Marketplace products. Added a verbose option to DescribeProvisioningArtifact to display the CloudFormation template used to create the provisioning artifact.Added DescribeProvisionedProduct API. Changed the type of ProvisionedProduct's Status to be distinct from Record's Status. New ProvisionedProduct's Status are AVAILABLE, UNDER_CHANGE, TAINTED, ERROR. Changed Record's Status set of values to CREATED, IN_PROGRESS, IN_PROGRESS_IN_ERROR, SUCCEEDED, FAILED.

## 3.29.5 - 2017-06-14

* `Aws\ApplicationAutoScaling` - Application Auto Scaling now supports automatic scaling of read and write throughput capacity for DynamoDB tables and global secondary indexes.
* `Aws\CloudDirectory` - Documentation update for Cloud Directory

## 3.29.4 - 2017-06-13

* `Aws\ConfigService` - With this release AWS Config supports the Amazon CloudWatch alarm resource type.

## 3.29.3 - 2017-06-12

* `Aws\RDS` - API Update for RDS: this update enables copy-on-write, a new Aurora MySQL Compatible Edition feature that allows users to restore their database, and support copy of TDE enabled snapshot cross region.

## 3.29.2 - 2017-06-09

* `Aws\OpsWorks` - Tagging Support for AWS OpsWorks Stacks

## 3.29.1 - 2017-06-08

* `Aws\IoT` - In addition to using certificate ID, AWS IoT customers can now obtain the description of a certificate with the certificate PEM.
* `Aws\Pinpoint` - Starting today Amazon Pinpoint adds SMS Text and Email Messaging support in addition to Mobile Push Notifications, providing developers, product managers and marketers with multi-channel messaging capabilities to drive user engagement in their applications. Pinpoint also enables backend services and applications to message users directly and provides advanced user and app analytics to understand user behavior and messaging performance.
* `Aws\Rekognition` - API Update for AmazonRekognition: Adding RecognizeCelebrities API

## 3.29.0 - 2017-06-07

* `Aws\CodeBuild` - Add support to APIs for privileged containers. This change would allow performing privileged operations like starting the Docker daemon inside builds possible in custom docker images.
* `Aws\Greengrass` - AWS Greengrass is software that lets you run local compute, messaging, and device state synchronization for connected devices in a secure way. With AWS Greengrass, connected devices can run AWS Lambda functions, keep device data in sync, and communicate with other devices securely even when not connected to the Internet. Using AWS Lambda, Greengrass ensures your IoT devices can respond quickly to local events, operate with intermittent connections, and minimize the cost of transmitting IoT data to the cloud.

## 3.28.10 - 2017-06-06

* `Aws\ACM` - Documentation update for AWS Certificate Manager.
* `Aws\CloudFront` - Doc update to fix incorrect prefix in S3OriginConfig
* `Aws\IoT` - Update client side validation for SalesForce action.

## 3.28.9 - 2017-06-05

* `Aws\AppStream` - AppStream 2.0 Custom Security Groups allows you to easily control what network resources your streaming instances and images have access to. You can assign up to 5 security groups per Fleet to control the inbound and outbound network access to your streaming instances to specific IP ranges, network protocols, or ports.
* `Aws\AutoScaling` - Autoscaling resource model update.
* `Aws\IoT` -  Added Salesforce action to IoT Rules Engine.

## 3.28.8 - 2017-06-02

* `Aws\KinesisAnalytics` - Kinesis Analytics publishes error messages CloudWatch logs in case of application misconfigurations
* `Aws\WorkDocs` - This release includes new APIs to manage tags and custom metadata on resources and also new APIs to add and retrieve comments at the document level.

## 3.28.7 - 2017-06-01

* `Aws\CodeDeploy` - AWS CodeDeploy has improved how it manages connections to GitHub accounts and repositories. You can now create and store up to 25 connections to GitHub accounts in order to associate AWS CodeDeploy applications with GitHub repositories. Each connection can support multiple repositories. You can create connections to up to 25 different GitHub accounts, or create more than one connection to a single account. The ListGitHubAccountTokenNames command has been introduced to retrieve the names of stored connections to GitHub accounts that you have created. The name of the connection to GitHub used for an AWS CodeDeploy application is also included in the ApplicationInfo structure. Two new fields, lastAttemptedDeployment and lastSuccessfulDeployment, have been added to DeploymentGroupInfo to improve the handling of deployment group information in the AWS CodeDeploy console. Information about these latest deployments can also be retrieved using the GetDeploymentGroup and BatchGetDeployment group requests. Also includes a region update (us-gov-west-1).
* `Aws\CognitoIdentityProvider` - Added support within Amazon Cognito User Pools for 1) a customizable hosted UI for user sign up and sign in and 2) integration of external identity providers.
* `Aws\ElasticLoadBalancingv2` - Update the existing DescribeRules API to support pagination.
* `Aws\LexModelBuildingService` - Updated documentation and added examples for Amazon Lex Runtime Service.

## 3.28.6 - 2017-05-31

* `Aws\RDS` - Amazon RDS customers can now easily and quickly stop and start their DB instances.

## 3.28.5 - 2017-05-30

* `Aws\CloudDirectory` - Cloud Directory has launched support for Typed Links, enabling customers to create object-to-object relationships that are not hierarchical in nature. Typed Links enable customers to quickly query for data along these relationships. Customers can also enforce referential integrity using Typed Links, ensuring data in use is not inadvertently deleted.
* `Aws\S3` - New example snippets for Amazon S3.
* `Aws\S3` - S3 calls are now done with a host style URL by default. Options for path style on the client and command levels are available as `use_path_style_endpoint` and `@use_path_style_endpoint`, respectively. [More details on the differences between the styles can be found here.](http://docs.aws.amazon.com/AmazonS3/latest/dev/UsingBucket.html#access-bucket-intro)

## 3.28.4 - 2017-05-25

* `Aws\AppStream` - Support added for persistent user storage, backed by S3.
* `Aws\Rekognition` - Updated the CompareFaces API response to include orientation information, unmatched faces, landmarks, pose, and quality of the compared faces.

## 3.28.3 - 2017-05-24

* `Aws\IAM` - The unique ID and access key lengths were extended from 32 to 128
* `Aws\STS` - The unique ID and access key lengths were extended from 32 to 128.
* `Aws\StorageGateway` - Two Storage Gateway data types, Tape and TapeArchive, each have a new response element, TapeUsedInBytes. This element helps you manage your virtual tapes. By using TapeUsedInBytes, you can see the amount of data written to each virtual tape.

## 3.28.2 - 2017-05-23

* `Aws\DatabaseMigrationService` - This release adds support for using Amazon S3 and Amazon DynamoDB as targets for database migration, and using MongoDB as a source for database migration. For more information, see the AWS Database Migration Service documentation.

## 3.28.1 - 2017-05-22

* `Aws\ResourceGroupsTaggingAPI` - You can now specify the number of resources returned per page in GetResources operation, as an optional parameter, to easily manage the list of resources returned by your queries.
* `Aws\SQS` - MD5 Validation of `MessageAttributes` is now being performed on `ReceiveMessage` calls. SQS uses a custom encoding for generating the hash input, [details on that scheme are available here.](http://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSDeveloperGuide/sqs-message-attributes.html#sqs-attrib-md5)

## 3.28.0 - 2017-05-18

* `Aws\Athena` - This release adds support for Amazon Athena. Amazon Athena is an interactive query service that makes it easy to analyze data in Amazon S3 using standard SQL. Athena is serverless, so there is no infrastructure to manage, and you pay only for the queries that you run.
* `Aws\Lightsail` - This release adds new APIs that make it easier to set network port configurations on Lightsail instances. Developers can now make a single request to both open and close public ports on an instance using the PutInstancePublicPorts operation.

## 3.27.5 - 2017-05-17

* `Aws\AutoScaling` - Various Auto Scaling documentation updates
* `Aws\CloudWatchEvents` - Various CloudWatch Events documentation updates.
* `Aws\CloudWatchLogs` - Various CloudWatch Logs documentation updates.
* `Aws\Polly` - Amazon Polly adds new German voice "Vicki"

## 3.27.4 - 2017-05-16

* `Aws\CodeDeploy` - This release introduces the previousRevision field in the responses to the GetDeployment and BatchGetDeployments actions. previousRevision provides information about the application revision that was deployed to the deployment group before the most recent successful deployment. Also, the fileExistsBehavior parameter has been added for CreateDeployment action requests. In the past, if the AWS CodeDeploy agent detected files in a target location that weren't part of the application revision from the most recent successful deployment, it would fail the current deployment by default. This new parameter provides options for how the agent handles these files: fail the deployment, retain the content, or overwrite the content.
* `Aws\GameLift` - Allow developers to specify how metrics are grouped in CloudWatch for their GameLift fleets. Developers can also specify how many concurrent game sessions activate on a per-instance basis.
* `Aws\Inspector` - Adds ability to produce an assessment report that includes detailed and comprehensive results of a specified assessment run.
* `Aws\KMS` - Update documentation for KMS.

## 3.27.3 - 2017-05-15

* `Aws\SSM` - UpdateAssociation API now supports updating document name and targets of an association. GetAutomationExecution API can return FailureDetails as an optional field to the StepExecution Object, which contains failure type, failure stage as well as other failure related information for a failed step.

## 3.27.2 - 2017-05-11

* `Aws\ElasticLoadBalancing` - Add a new API to allow customers to describe their account limits, such as load balancer limit, target group limit etc.
* `Aws\ElasticLoadBalancingv2` - Add a new API to allow customers to describe their account limits, such as load balancer limit, target group limit etc.
* `Aws\LexModelBuildingService` - Releasing new DeleteBotVersion, DeleteIntentVersion and DeleteSlotTypeVersion APIs.
* `Aws\Organizations` - AWS Organizations APIs that return an Account object now include the email address associated with the account’s root user.

## 3.27.1 - 2017-05-09

* `Aws\CodeStar` - Updated documentation for AWS CodeStar.
* `Aws\WorkSpaces` - Doc-only Update for WorkSpaces

## 3.27.0 - 2017-05-04

* `Aws\ECS` - Exposes container instance registration time in ECS:DescribeContainerInstances.
* `Aws\Lambda` - Support for UpdateFunctionCode DryRun option
* `Aws\MarketplaceEntitlementService` - AWS Marketplace Entitlement Service enables AWS Marketplace sellers to determine the capacity purchased by their customers.
* `Aws\S3` - Fixed possible security issue in `Transfer`s download `transfer` operation where files could be downloaded to a directory outside the destination directory if the key contained relative paths. Ignoring files to continue with your transfer can be done through passing an iterator of files to download to `Transfer`s parameter: `$source`. These can be generated on `s3://` paths if you have registered the SDK's `StreamWrapper` via `\Aws\recursive_dir_iterator`.

## 3.26.5 - 2017-04-28

* `Aws\CloudFormation` - Adding back the removed waiters and paginators.

## 3.26.4 - 2017-04-28

* `Aws\CloudFormation` - API update for CloudFormation: New optional parameter ClientRequestToken which can be used as an idempotency token to safely retry certain operations as well as tagging StackEvents.
* `Aws\RDS` - The DescribeDBClusterSnapshots API now returns a SourceDBClusterSnapshotArn field which identifies the source DB cluster snapshot of a copied snapshot.
* `Aws\Rekognition` - Fix for missing file type check
* `Aws\SQS` - Adding server-side encryption (SSE) support to SQS by integrating with AWS KMS; adding new queue attributes to SQS CreateQueue, SetQueueAttributes and GetQueueAttributes APIs to support SSE.
* `Aws\Snowball` - The Snowball API has a new exception that can be thrown for list operation requests.

## 3.26.3 - 2017-04-26

* `Aws\RDS` - With Amazon Relational Database Service (Amazon RDS) running MySQL or Amazon Aurora, you can now authenticate to your DB instance using IAM database authentication.

## 3.26.2 - 2017-04-21

* `Aws\AppStream` - The new feature named "Default Internet Access" will enable Internet access from AppStream 2.0 instances - image builders and fleet instances. Admins will check a flag either through AWS management console for AppStream 2.0 or through API while creating an image builder or while creating/updating a fleet.
* `Aws\Kinesis` - Adds a new waiter, StreamNotExists, to Kinesis 

## 3.26.1 - 2017-04-20

* `Aws\DeviceFarm` - API Update for AWS Device Farm: Support for Deals and Promotions 
* `Aws\DirectConnect` - Documentation updates for AWS Direct Connect.
* `Aws\ElasticLoadBalancingv2` - Adding LoadBalancersDeleted waiter for Elasticloadbalancingv2
* `Aws\KMS` - Doc-only update for Key Management Service (KMS): Update docs for GrantConstraints and GenerateRandom
* `Aws\Route53` - Release notes: SDK documentation now includes examples for ChangeResourceRecordSets for all types of resource record set, such as weighted, alias, and failover.
* `Aws\Route53Domains` - Adding examples and other documentation updates.

## 3.26.0 - 2017-04-19

* `Aws\APIGateway` - Add support for "embed" property.
* `Aws\CodeStar` - AWS CodeStar is a cloud-based service for creating, managing, and working with software development projects on AWS. An AWS CodeStar project creates and integrates AWS services for your project development toolchain. AWS CodeStar also manages the permissions required for project users.
* `Aws\EC2` - Adds support for creating an Amazon FPGA Image (AFI) from a specified design checkpoint (DCP).
* `Aws\IAM` - This changes introduces a new IAM role type, Service Linked Role, which works like a normal role but must be managed via services' control. 
* `Aws\Lambda` - Lambda integration with CloudDebugger service to enable customers to enable tracing for the Lambda functions and send trace information to the CloudDebugger service.
* `Aws\LexModelBuildingService` - Amazon Lex is a service for building conversational interfaces into any application using voice and text.
* `Aws\Polly` - API Update for Amazon Polly: Add support for speech marks
* `Aws\Rekognition` - Given an image, the API detects explicit or suggestive adult content in the image and returns a list of corresponding labels with confidence scores, as well as a taxonomy (parent-child relation) for each label.

## 3.25.8 - 2017-04-18

* `Aws\Lambda` - You can use tags to group and filter your Lambda functions, making it easier to analyze them for billing allocation purposes. For more information, see Tagging Lambda Functions.  You can now write or upgrade your Lambda functions using Python version 3.6. For more information, see Programming Model for Authoring Lambda Functions in Python. Note: Features will be rolled out in the US regions on 4/19.

## 3.25.7 - 2017-04-11

* `Aws\APIGateway` - API Gateway request validators
* `Aws\Batch` - API Update for AWS Batch: Customer provided AMI for MANAGED Compute Environment 
* `Aws\GameLift` - Allows developers to utilize an improved workflow when calling our Queues API and introduces a new feature that allows developers to specify a maximum allowable latency per Queue.
* `Aws\OpsWorks` - Cloudwatch Logs agent configuration can now be attached to OpsWorks Layers using CreateLayer and UpdateLayer. OpsWorks will then automatically install and manage the CloudWatch Logs agent on the instances part of the OpsWorks Layer.

## 3.25.6 - 2017-04-07

* `Aws\Redshift` - This update adds the GetClusterCredentials API which is used to get temporary login credentials to the cluster. AccountWithRestoreAccess now has a new member AccountAlias, this is the identifier of the AWS support account authorized to restore the specified snapshot. This is added to support the feature where the customer can share their snapshot with the Amazon Redshift Support Account without having to manually specify the AWS Redshift Service account ID on the AWS Console/API.

## 3.25.5 - 2017-04-06

* `Aws\ElasticLoadBalancingv2` - Adds supports a new condition for host-header conditions to CreateRule and ModifyRule

## 3.25.4 - 2017-04-05

* `Aws\ElastiCache` - ElastiCache added support for testing the Elasticache Multi-AZ feature with Automatic Failover.

## 3.25.3 - 2017-04-04

* `Aws\CloudWatch` - Amazon Web Services announced the immediate availability of two additional alarm configuration rules for Amazon CloudWatch Alarms. The first rule is for configuring missing data treatment. Customers have the options to treat missing data as alarm threshold breached, alarm threshold not breached, maintain alarm state and the current default treatment. The second rule is for alarms based on percentiles metrics that can trigger unnecessarily if the percentile is calculated from a small number of samples. The new rule can treat percentiles with low sample counts as same as missing data. If the first rule is enabled, the same treatment will be applied when an alarm encounters a percentile with low sample counts.

## 3.25.2 - 2017-04-03

* `Aws\LexRuntimeService` - Adds support to PostContent for speech input

## 3.25.1 - 2017-03-31

* `Aws\CloudDirectory` - ListObjectAttributes now supports filtering by facet.

## 3.25.0 - 2017-03-31

* `Aws\CloudFormation` - Adding paginators for ListExports and ListImports
* `Aws\CloudFront` - Amazon CloudFront now supports user configurable HTTP Read and Keep-Alive Idle Timeouts for your Custom Origin Servers
* `Aws\ResourceGroupsTaggingAPI` - Resource Groups Tagging APIs can help you organize your resources and enable you to simplify resource management, access management, and cost allocation.
* `Aws\StorageGateway` - File gateway mode in AWS Storage gateway provides access to objects in S3 as files on a Network File System (NFS) mount point. Once a file share is created, any changes made externally to the S3 bucket will not be reflected by the gateway. Using the cache refresh feature in this update, the customer can trigger an on-demand scan of the keys in their S3 bucket and refresh the file namespace cached on the gateway. It takes as an input the fileShare ARN and refreshes the cache for only that file share. Additionally there is new functionality on file gateway that allows you configure what squash options they would like on their file share, this allows a customer to configure their gateway to not squash root permissions. This can be done by setting options in NfsOptions for CreateNfsFileShare and UpdateNfsFileShare APIs.

## 3.24.9 - 2017-03-28

* `Aws\Batch` - Customers can now provide a retryStrategy as part of the RegisterJobDefinition and SubmitJob API calls. The retryStrategy object has a number value for attempts. This is the number of non successful executions before a job is considered FAILED. In addition, the JobDetail object now has an attempts field and shows all execution attempts.
* `Aws\EC2` - Customers can now tag their Amazon EC2 Instances and Amazon EBS Volumes at the time of their creation. You can do this from the EC2 Instance launch wizard or through the RunInstances or CreateVolume APIs. By tagging resources at the time of creation, you can eliminate the need to run custom tagging scripts after resource creation. In addition, you can now set resource-level permissions on the CreateVolume, CreateTags, DeleteTags, and the RunInstances APIs. This allows you to implement stronger security policies by giving you more granular control over which users and groups have access to these APIs. You can also enforce the use of tagging and control what tag keys and values are set on your resources. When you combine tag usage and resource-level IAM policies together, you can ensure your instances and volumes are properly secured upon creation and achieve more accurate cost allocation reporting. These new features are provided at no additional cost. 

## 3.24.8 - 2017-03-27

* `Aws\SSM` - Updated validation rules for SendCommand and RegisterTaskWithMaintenanceWindow APIs

## 3.24.7 - 2017-03-23

* `Aws\ApplicationAutoScaling` - Application AutoScaling is launching support for a new target resource (AppStream 2.0 Fleets) as a scalable target.

## 3.24.6 - 2017-03-22

* `Aws\ApplicationDiscoveryService` - Adds export configuration options to the AWS Discovery Service API.
* `Aws\ElasticLoadBalancingv2` - Adding waiters for Elastic Load Balancing V2
* `Aws\Lambda` - Adds support for new runtime Node.js v6.10 for AWS Lambda service

## 3.24.5 - 2017-03-21

* `Aws\DirectConnect` - Deprecated DescribeConnectionLoa, DescribeInterconnectLoa, AllocateConnectionOnInterconnect and DescribeConnectionsOnInterconnect operations in favor of DescribeLoa, DescribeLoa, AllocateHostedConnection and DescribeHostedConnections respectively.
* `Aws\MarketplaceCommerceAnalytics` - This update adds a new data set, us_sales_and_use_tax_records, which enables AWS Marketplace sellers to programmatically access to their U.S. Sales and Use Tax report data.
* `Aws\Pinpoint` - Added support for segment endpoints by user attributes in addition to endpoint attributes, publishing raw app analytics and campaign events as events streams to Kinesis and Kinesis Firehose

## 3.24.4 - 2017-03-14
* `Aws\CloudWatchEvents` - Update documentation

## 3.24.3 - 2017-03-13

* `Aws\CloudWatchEvents` - This update extends Target Data Type for configuring Target behavior during invocation.
* `Aws\DeviceFarm` - Network shaping allows users to simulate network connections and conditions while testing their Android, iOS, and web apps with AWS Device Farm.

## 3.24.2 - 2017-03-10

* `Aws\CodeDeploy` - Add paginators for Codedeploy
* `Aws\EMR` - This release includes support for instance fleets in Amazon EMR.

## 3.24.1 - 2017-03-09

* `Aws\APIGateway` - API Gateway has added support for ACM certificates on custom domain names. Both Amazon-issued certificates and uploaded third-part certificates are supported.
* `Aws\CloudDirectory` - Introduces a new Cloud Directory API that enables you to retrieve all available parent paths for any type of object (a node, leaf node, policy node, and index node) in a hierarchy.

## 3.24.0 - 2017-03-08

* `Aws\WorkDocs` - The Administrative SDKs for Amazon WorkDocs provides full administrator level access to WorkDocs site resources, allowing developers to integrate their applications to manage WorkDocs users, content and permissions programmatically

## 3.23.3 - 2017-03-08

* `Aws\RDS` - Add support to using encrypted clusters as cross-region replication masters. Update CopyDBClusterSnapshot API to support encrypted cross region copy of Aurora cluster snapshots.

## 3.23.2 - 2017-03-06

* `Aws\Budgets` - When creating or editing a budget via the AWS Budgets API you can define notifications that are sent to subscribers when the actual or forecasted value for cost or usage exceeds the notificationThreshold associated with the budget notification object. Starting today, the maximum allowed value for the notificationThreshold was raised from 100 to 300. This change was made to give you more flexibility when setting budget notifications.
* `Aws\OpsWorksCM` - OpsWorks for Chef Automate has added a new field "AssociatePublicIpAddress" to the CreateServer request, "CloudFormationStackArn" to the Server model and "TERMINATED" server state.

## 3.23.1 - 2017-02-28

* `Aws\MTurk` - Update namespace for `Amazon Mechanical Turk`

## 3.23.0 - 2017-02-28

* `Aws\DynamoDB` - Time to Live (TTL) is a feature that allows you to define when items in a table expire and can be purged from the database, so that you don't have to track expired data and delete it manually. With TTL enabled on a DynamoDB table, you can set a timestamp for deletion on a per-item basis, allowing you to limit storage usage to only those records that are relevant.
* `Aws\DynamoDBStreams` - Added support for TTL on a DynamoDB tables
* `Aws\IAM` - Added support for AWS Organizations service control policies (SCPs) to SimulatePrincipalPolicy operation. If there are SCPs associated with the simulated user's account, their effect on the result is captured in the OrganizationDecisionDetail element in the EvaluationResult.
* `Aws\MechanicalTurkRequesterService` - Amazon Mechanical Turk is a web service that provides an on-demand, scalable, human workforce to complete jobs that humans can do better than computers, for example, recognizing objects in photos.
* `Aws\Organizations` - AWS Organizations is a web service that enables you to consolidate your multiple AWS accounts into an organization and centrally manage your accounts and their resources.

## 3.22.11 - 2017-02-24

* `Aws\ElasticsearchService` - Added three new API calls to existing Amazon Elasticsearch service to expose Amazon Elasticsearch imposed limits to customers.

## 3.22.10 - 2017-02-24

* `Aws\Ec2` - New EC2 I3 instance type

## 3.22.9 - 2017-02-22

* `Aws\CloudDirectory` - ListObjectAttributes documentation updated based on forum feedback
* `Aws\ElasticBeanstalk` - Elastic Beanstalk adds support for creating and managing custom platform.
* `Aws\GameLift` - Allow developers to configure global queues for creating GameSessions. Allow PlayerData on PlayerSessions to store player-specific data.
* `Aws\Route53` - Added support for operations CreateVPCAssociationAuthorization and DeleteVPCAssociationAuthorization to throw a ConcurrentModification error when a conflicting modification occurs in parallel to the authorizations in place for a given hosted zone.

## 3.22.8 - 2017-02-21

* `Aws\Ec2` - Added the billingProduct parameter to the RegisterImage API

## 3.22.7 - 2017-02-17

* `Aws\DirectConnect` - Adding operations to support new LAG feature

## 3.22.6 - 2017-02-17

* `Aws\CognitoIdentity` - Allow createIdentityPool and updateIdentityPool API to set server side token check value on identity pool
* `Aws\Config` - Enable customers to use dryrun mode for PutEvaluations

## 3.22.5 - 2017-02-15

* `Aws\Kms` - Added support for tagging

## 3.22.4 - 2017-02-14

* `Aws\Ec2` - Added support for new `ModifyVolume` API

## 3.22.3 - 2017-02-10

* Update endpoints.json with valid endpoints

## 3.22.2 - 2017-02-10

* `Aws\StorageGateway` - Added support for addition of clientList parameter to existing File share APIs

## 3.22.1 - 2017-02-09

* `Aws\Ec2` - Added support to associate `IAM profiles` to running instances API
* `Aws\Rekognition` - Added support for `age` to the face description from `DetectFaces` and `IndexFaces`

## 3.22.0 - 2017-02-08

* `Aws\LexRuntimeService` - Added support for new service `Amazon Lex Runtime Service`

## 3.21.6 - 2017-01-27

* `Aws\CloudDirectory` - Added support for new service `AWS Cloud Directory`
* `Aws\CodeDeploy` - Added support for blue/green deployments
* `Aws\Ec2` - Added support to Add instance health check functionality to replace unhealthy EC2 Spot fleet instances with fresh ones.
* `Aws\Rds` -  Upgraded Snapshot Engine Version

## 3.21.5 - 2017-01-25

* `Aws\ElasticLoadBalancing` - Added support for New load balancer type
* `Aws\Rds` - Added support for Cross Region Read Replica Copying

## 3.21.4 - 2017-01-25

* `Aws\CodeCommit` - Added a new API to list the different files between 2 commits 
* `Aws\Ecs` - Added support for Container instance draining

## 3.21.3 - 2017-01-20

* `Aws\Acm` - Updated response elements for DescribeCertificate API in support of managed renewal.

## 3.21.2 - 2017-01-19

* `Aws\Ec2` - Added support for new parameters to SpotPlacement in RequestSpotInstances API

## 3.21.1 - 2017-01-18

* `Aws\Rds` - Added support for `Mysql` to `Aurora` Replication

## 3.21.0 - 2017-01-17

* `Aws\Credentials` - Added support for AssumeRoleCredentialProvider and support for source ini credentials from ./aws/config file in defaultProvider
* `Aws\DynamoDb` - Added tagging Support for Amazon DynamoDB Tables and Indexes
* `Aws\Route53` - Added support for ca-central-1 and eu-west-2 enum values in CloudWatchRegion enum

## 3.20.16 - 2017-01-16

* Fix manifest

## 3.20.15 - 2017-01-16

* `Aws\Cur` - Added Support for new service `AWS CostAndUsageReport`

## 3.20.14 - 2017-01-16

* `Aws\Config` - Updated the models to include InvalidNextTokenException in API response

## 3.20.13 - 2017-01-04

* `Aws\Config` - Added support for customers to use/write rules based on OversizedConfigurationItemChangeNotification mesage type.
* `Aws\MarketplaceAnalytics` - Added support for data set disbursed_amount_by_instance_hours, with historical data available starting 2012-09-04

## 3.20.12 - 2016-12-29

* `Aws\CodeDeploy` - Added support for IAM Session Arns in addition to IAM User Arns for on premise host authentication.
* `Aws\Ecs` - Added the ability to customize the placement of tasks on container instances.

## 3.20.11 - 2016-12-22

* `Aws\ApiGateway` - Added support for generating SDKs in more languages.
* `Aws\ElasticBeanstalk` - Added Support for Resource Lifecycle Feature
* `Aws\Iam`- Added service-specific credentials to IAM service to make it easier to onboard CodeCommit customers

## 3.20.10 - 2016-12-21

* `Aws\Ecr` - Added implementation for Docker Image Manifest V2, Schema 2
* `Aws\Rds` - Added support for Cross Region Encrypted Snapshot Copying (CopyDBSnapshot) 

## 3.20.9 - 2016-12-20

* `Aws\Firehose` - Added Support for Processing Feature
* `Aws\Route53` - Enum updates for eu-west-2 and ca-central-1
* `Aws\StorageGateway` - Added new storage type for files to complement block and tape

## 3.20.8 - 2016-12-19

* `Aws\CognitoIdentity` - Added Groups to Cognito user pools. 
* `Aws\DiscoveryService` - Added new APIs to group discovered servers into Applications with get summary and neighbors. 
  Includes additional filters for `ListConfigurations` and `DescribeAgents` API.

## 3.20.7 - 2016-12-15

* `Aws\CognitoIdentityProvider` - Adding support for fine-grained role-based access control (RBAC)
* `Aws\Ssm` - Adding support for access to the Patch Baseline and Patch Compliance APIs

## 3.20.6 - 2016-12-14

* `Aws\Batch` - Added support for new service `AWS Batch`
* `Aws\CloudWatchLogs` - Added support for associating LogGroups with `AWSTagris` tags
* `Aws\Dms` - Added support for SSL enabled Oracle endpoints
* `Aws\MarketplaceCommerceAnalytics` -  Add new enum to `DataSetType`

## 3.20.5 - 2016-12-12

* `Aws\Credentials` - Fix `EcsCredential` latency issue

## 3.20.4 - 2016-12-08

* `Aws\Cloudfront` - Adding lambda function associations to cache behaviors
* `Aws\Rds` - Add cluster create time to DBCluster
* `Aws\WafRegional` - Adding support for new service `AWS WAF Regional`

## 3.20.3 - 2016-12-07

* `Aws\Config` - Adding support for Redshift resource types
* `Aws\S3` - Adding Version ID to Get/Put ObjectTagging

## 3.20.2 - 2016-12-06

* `Aws\Ec2` - Adding T2.xlarge, T2.2xlarge, and R4 instance type
* `Aws\Config` - Adding support for `DescribeConfigRuleEvaulationStatus`
* `Aws\Pinpoint` - Adding support for fixed type

## 3.20.1 - 2016-12-01

* `Aws\ApiGateway` - Added support for publishing your APIs on `Amazon API Gateway`
  as products on the `AWS Marketplace`
* `Aws\AppStream` - Added support for new service `AWS AppStream`
* `Aws\CodeBuild` - Added support for new service `AWS CodeBuild`
* `Aws\DirectConnect` - Added support for `Ipv6` support
* `Aws\Ec2` - Added support for native `IPv6` support for VPCs
* `Aws\ElasticBeanstalk` - Added support for `CodeBuild` Integration
* `Aws\Lambda` - Added support for new API `GetAccountSettings`
* `Aws\Health` - Added support for new service `AWS Health`
* `Aws\OpsWorksCM` - Added support for new service `AWS OpsWorks Managed Chef`
* `Aws\Pinpoint` - Added support for new service `AWS Pinpoint`
* `Aws\Sfn` - Added support for `AWS Step Functions`
* `Aws\Shield` - Added support for new service `AWS Shield`
* `Aws\SSm` - Added support for 6 new sets of APIs
* `Aws\XRay` - Added support for new service `AWS X-Ray`


## 3.20.0 - 2016-11-30

* `Aws\Lightsail` - Added support for new service `AWS Lightsail`
* `Aws\Polly` - Added support for new service `AWS Polly Service`
* `Aws\Rekognition` - Added support for new service `AWS Rekognition Service`
* `Aws\Snowball` - Added support for a new job type, new APIs, and
  the new `AWS Snowball` Edge device to support local compute and storage use cases

## 3.19.33 - 2016-11-29

* `Aws\S3` - Added support for Storage Insights, Object Tagging, Lifecycle Filtering

## 3.19.32 - 2016-11-22

* `Aws\Cloudformation` - Added support for List-imports API
* `Aws\Glacier` - Added support for retrieving data with different tiers
* `Aws\Route53` - Added support for expanding current IPAddress
  field to accept IPv6 address
* `Aws\S3` - Added support for Glacier retrieval tier information

## 3.19.31 - 2016-11-21

* `Aws\CloudTrail` - Added support for S3 data plane operations
* `Aws\Ecs` - Added support for new "version" field for tasks and container instances

## 3.19.30 - 2016-11-18

* `Aws\ApplicationAutoscaling` - Added  support for a new target resource
  (EMR Instance Groups) as a scalable target

## 3.19.29 - 2016-11-18

* `Aws\ElasticTranscoder` - Added support for multiple media input files
  that can be stitched together
* `Aws\Emr` - Added support for Automatic Scaling of EMR clusters based on metrics
* `Aws\Lambda` -  Added support for Environment variables
* `Aws\GameLift` - Added support for remote access into GameLift managed servers.

## 3.19.28 - 2016-11-17

* `Aws\ApiGateway` - Added support for custom encoding feature
* `Aws\CloudWatch` - Added support for percentile statistic (pN) to metrics and alarms
* `Aws\MarketplaceAnalytics` - Added support for third party metrics
* `Aws\Sqs` - Added support for creating FIFO (first-in-first-out) queues

## 3.19.27 - 2016-11-16

* `Aws\ServiceCatalog` - Added support for new operations
* `Aws\Route53` Added support for cross account VPC Association

## 3.19.26 - 2016-11-15

* `Aws\DirectoryService` - Added support for `SchemaExtensions`
* `Aws\Elasticache` - Added support for `AuthToken`
* `Aws\Kinesis` - Added support for Describe shard limit, open shard count
 and stream creation timestamp

## 3.19.25 - 2016-11-14

* `Aws\CognitoIdentityProvider` - Added support for schema attributes in `CreateUserPool`

## 3.19.24 - 2016-11-10

* `Aws\CloudWatchLogs` - Added support for capability that helps pivot from
 your logs-extracted metrics

## 3.19.23 - 2016-11-03

* `Aws\DirectConnect` - Added support for tagging on `DirectConnect` resources.

## 3.19.22 - 2016-11-02

* `Aws\Ses` - Adding support for `SES` Metrics

## 3.19.21 - 2016-11-01

* `Aws\CloudFormation` - Adding ResourcesToSkip parameter to `ContinueUpdateRollback` API,
  adding support for `ListExports`, new `ChangeSet` types and `Transforms`
* `Aws\Ecr` - Added support for updated paginators

## 3.19.20 - 2016-10-25

* Documentation update for `Autoscaling` and `ElasticloadbalancingV2`

## 3.19.19 - 2016-10-24

* `Aws\Sms` - Added support for new service `AWS Server Migration Service`

## 3.19.18 - 2016-10-20

* `Aws\Budgets` - Added support for new service `AWSBudgetService`

## 3.19.17 - 2016-10-18

* `Aws\Config` -  Added support for S3 Bucket resource type
* `Aws\CloudFront` - Added support for `isIPV6Enabled` property for http distributions
* `Aws\Iot` - Added DynamoActionV2 action to IoT Rules Engine
* `Aws\Rds` - Added support for AWS roles integration with `Aurora Cluster`

## 3.19.16 - 2016-10-17

* `Aws\Route53` - Added support for API updates

## 3.19.15 - 2016-10-13

* `Aws\Acm` - Added support for third-party `SSL/TLS` certificates
* `Aws\ElasticBeanstalk` - Added support for `Pagination` for `DescribeApplicationVersions`
* `Aws\Gamelift` - Added support for resource protection

## 3.19.14 - 2016-10-12

* `Aws\Elasticache` - Added support for Redis Cluster
* `Aws\Ecr` - Added support for new API `DescribeImages`
* `Aws\S3` - Added support for `s3-accelerate.dualstack` endpoint

## 3.19.13 - 2016-10-06

* `Aws\Kms` -  Add `InvalidMarkerException` as modeled exception in `ListKeys`
* `Aws\CognitoIdentityProvider` - Added new operation `AdminCreateUser`
* `Aws\Waf` - Added support for IPV6 in `IPSetDescriptorType`

## 3.19.12 - 2016-09-29

* `Aws\Ec2` - Added support for new Ec2 instance types and
  EC2 Convertible RIs and the EC2 RI regional benefit
* `Aws\S3` - Added support for `partNumber` extension

## 3.19.11 - 2016-09-27

* `Aws\CloudFormation` - Added support for `roleArn`
* `Aws\S3` - Fixed `PostObjectV4` with security token option

## 3.19.10 - 2016-09-22

* `Aws\ApiGateway` - Added new enum values to the service

## 3.19.9 - 2016-09-20

* `Aws\CodeDeploy` - Added support for Rollback deployment
* `Aws\Emr` - Added support for the new end-to-end encryption
* `Aws\Rds` - Added support for local time zone
* `Aws\Redshift` - Added support for `EnhancedVpcRouting` feature

## 3.19.8 - 2016-09-15

* `Aws\Iot` - Added support for changes in `RegisterCertificate` API &
  Adding a new field "cannedAcl" in S3 action
* `Aws\Rds` - Added support for Aurora cluster reader endpoint

## 3.19.7 - 2016-09-13

* `Aws\ServiceCatalog` - Added support for API Update for AWS Service Catalog

## 3.19.6 - 2016-09-08

* `Aws\CloudFront` - Added support for HTTP2

## 3.19.5 - 2016-09-06

* `Aws\Codepipeline` - Added support for pipeline execution details
* `Aws\Rds` - Added support for `DescribeSourceRegions` API
* `Aws\Sns` - Added new exceptions

## 3.19.4 - 2016-09-01

* `Aws\ApplicationAutoScaling` - Added support for automatically scaling an
  Amazon EC2 Spot fleet in order to manage application availability and
  costs during changes in demand based on conditions you define
* `Aws\CognitoIdentity` - Added support for bulk import of users
* `Aws\Rds` - Added support for the information about option conflicts
  to the describe-option-group-options api response
* `Aws\ConfigService` - Added support for a application loadbalancer type
* `Aws\GameLift` - Added support for Linux instance

## 3.19.3 - 2016-08-30

* `Aws\CloudFront` - Added support for QueryString Whitelisting
* `Aws\CodePipeline` - Added support for return pipeline execution details
* `Aws\Ecs` - Added support for simplified waiter
* `Aws\Route53` - Added support for `NAPTR` and new operation `TestDNSAnswer`

## 3.19.2 - 2016-08-23

* `Aws\Rds` - Added support for addition of resource ARNs to `Describe` APIs

## 3.19.1 - 2016-08-18

* `Aws\Ec2` - Added support for for Dedicated Host Reservations and
  API Update for `EC2-SpotFleet`
* `Aws\ElasticLoadBalancingV2` - Fix `ElasticLoadBalancingV2` endpoints
* `Aws\WorkSpaces` - Added support for Hourly WorkSpaces APIs

## 3.19.0 - 2016-08-16

* `Aws\Acm` - Added support for increased tagging limit
* `Aws\ApiGateway` - Added support for API usage plans
* `Aws\Ecs` - Added support for memory reservation and `networkMode` on task definitions

## 3.18.39 - 2016-08-11

* `Aws\AutoScaling` - Added support for `ELB` L7 integration
* `Aws\ElasticLoadBalancing` - Added support for `ELBv2` support
* `Aws\KinesisAnalytics` - Added support for new service that 9allows customers to perform SQL queries against streaming data
* `Aws\Kms` - Added support for importing customer-supplied cryptographic keys
* `Aws\S3` - Added support for IPv6
* `Aws\SnowBall` - Added support for new service `SnowBall`: snowball job management

## 3.18.38 - 2016-08-09

* `Aws\CloudFront` - Added support for tagging API
* `Aws\Ecr` - Added support for `ListImages` filtering
* `Aws\MarketplaceCommerceAnalytics` - Added support for `StartSupportDataExport`
* `Aws\Rds` - Fixing duplicate acceptors in waiters

## 3.18.37 - 2016-08-04

* `Aws\GameLift` - Added support for `GameSession` Search
* `Aws\Lambda` - Added support for throttling reasons, new exception for bad zip file,
  and Event Source Token field for add permission request
* `Aws\Rds` - Added support for `MoveToVpc` feature and S3 Snapshot Ingestion

## 3.18.36 - 2016-08-02

* `Aws\CloudWatchLogs` - Added support for Optional Parameter to PutMetricFilterRequest
* `Aws\Emr` - Added support for Enhanced Debugging
* `Aws\Iot` - Added support for `ListOutgoingCertificates` & `AutoRegistration` flag
* `Aws\MachineLearning` - Added support for computing time and entity timestamp
* `Aws\MarketplaceMetering` - API Constraint Update
* `Aws\Rds` - Added support for license migration between BYOL and LI API Update for `AWS-RDS`,
  Enable `version` with RDS Options

## 3.18.35 - 2016-07-28

* `Aws\Route53Domains` - API Updates

## 3.18.34 - 2016-07-28

* `Aws\CodeDeploy` - Added support for  `DeploymentSuccessful ` waiter
* `Aws\ApiGateway` - Added support for `Cognito`User Pools Auth Support
* `Aws\Ec2` - Added support for DNS for VPC Peering
* `Aws\DirectoryService` - Added support for new API for Microsoft AD to manage routing
* `Aws\Route53Domains` - Added support for `getDomainSuggestions` capability
* `Aws\CognitoIdentity` - Added support for `User Pools`
* `Aws\ElasticsearchService` - Added support for pipeline aggregations to perform advanced
  analytics like moving averages and derivatives, and enhancements to geospatial queries

## 3.18.33 - 2016-07-26

`Aws\Iot` - Added support for Thing Types, ":" in Thing Name, and
  `separator` in `Firehose` action
`Aws\CloudSearchDomain` - Fix query value in `POST` request

## 3.18.32 - 2016-07-21

`Aws\Acm` - Added support for additional field to return for `Describe Certificate `
`Aws\Config` - Added support for `ACM`, `RDS` resource types, introducing
  Hybrid Rules & Forced Evaluation feature
`Aws\CloudSearchDomain` - Convert long query request to `POST`
`Aws\CloudFormation` - Added support for enum value for API parameter :`Capabilities`
`Aws\ElasticTranscoder` - Added support for WAV file output format
`Aws\Ssm` - Fixing missing paginator for SSM `DescribeInstanceInformation`

## 3.18.31 - 2016-07-19

`Aws\Ssm` - Added support for notification
`Aws\DeviceFarm` - Added support for session based APIs

## 3.18.30 - 2016-07-18

Fix composer version constraints.

## 3.18.29 - 2016-07-18

Updating dependency to a version of Guzzle that addresses CVE-2016-5385.
Please upgrade your version of the SDK or Guzzle if you are using the AWS SDK for PHP
in a CGI process that connects to an `http` endpoint.

See https://httpoxy.org for more details on the vulnerability.

## 3.18.28 - 2016-07-13

* `Aws\DatabaseMigrationService` - Added support for SSL Endpoint and Replication
* `Aws\Ecs` - Added support for IAM roles for ECS Tasks
* `Aws\Rds` - Adds new method `CopyDBClusterParameterGroup` and
  new parameter `TargetDBInstanceIdentifier` to `FailoverDBCluster` API

## 3.18.27 - 2016-07-07

* `Aws\ServiceCatalog` - Added support for `Aws\ServiceCatalog`

## 3.18.26 - 2016-07-07

* `Aws\Config` - Added support for `DeleteConfigurationRecorder` API
* `Aws\DirectoryService` - Added support for tagging APIs

## 3.18.25 - 2016-07-05

* `Aws\CodePipeline` - Added support for manual approvals.

## 3.18.24 - 2016-07-01

* Update composer dependency `"guzzlehttp/psr7": "~1.3.1"`

## 3.18.23 - 2016-06-30

* `Aws\DatabaseMigrationService` - Added support for specify `VpcSecurityGroupId`
  for the replication instance
* `Aws\Ssm` - Added support for registering customer servers to enable command function

## 3.18.22 - 2016-06-28

* `Aws\Ec2` - Added support for ENA supported instances
* `Aws\Efs` - Added support for "PerformanceMode" parameter for
  CreateFileSystem and DescribeFileSystems
* `Aws\GameLift` - Added support for  declaring and inspecting game server
  runtime configurations on fleets, including server process launch path,
  parameters, and number of concurrent executions
* `Aws\Iot` - Added support for "update" and "delete" an item
  through Dynamo DB rule
* `Aws\Sns` - Added Worldwide SMS support
* `Aws\Route53` - Added support for BOM region

## 3.18.21 - 2016-06-27

## 3.18.20 - 2016-06-23

* `Aws\CognitoIdentity` - Added support for
  Security Assertion Markup Language (SAML) 2.0.
* `Aws\DirectConnect` - Added support for downloading the Letter of Authorization:
   Connecting Facility Assignment (LOA-CFA) for Connections and Interconnects
* `Aws\Ec2` - Added support for new operations DescribeIdentityIdFormat
  & ModifyIdentityIdFormat

## 3.18.19 - 2016-06-21

* `Aws\CodePipeline` - Added support for Retry Failed Actions
* `Aws\Ec2` - Added support for new VPC resource waiters

## 3.18.18 - 2016-06-14

* `Aws\Rds` - Added support for RDS Cross-region managed binlog replication
* `Aws\CloudTrail` - Added support for new exception to handle
  `KMS InvalidStateException`
* `Aws\Ses` - Added support for enhanced customer notifications

## 3.18.17 - 2016-06-09

* `Aws\S3` -  Fixed StartAfter option in ListObjectsV2 operation

## 3.18.16 - 2016-06-07

* `Aws\Iot` - Added support for string and numeric values in `hashKey`
  and `rangeKey`, update `ListPolicyPrincipals`
* `Aws\MachineLearning` - Added support for tagging operations
* `Aws\Ec2` - Added support for `DescribeSpotFleetRequests` paginator
* `Aws\DynamoDbStreams` - Added support for `ApproximationCreationDateTime`
* `Aws\CloudWatch` - Added support for Alarm waiter


## 3.18.15 - 2016-06-02

* `Aws\Ec2` - Added support for `type` parameter in RequestSpotFleet API
 and `fulfilledCapacity` in DescribeSpotFleetRequests API response

## 3.18.14 - 2016-05-26

* `Aws\ElastiCache` - Added support for exporting a Redis snapshot
  to an Amazon S3 bucket

## 3.18.13 - 2016-05-24

* `Aws\Ec2` - Added support for accessing instance console screenshot
* `Aws\Rds` - Added support for cross-account snapshot sharing

## 3.18.12 - 2016-05-19

* `Aws\ApplicationAutoScaling` - Added support for `Aws\ApplicationAutoScaling`
  service

## 3.18.11 - 2016-05-19

* `Aws\Firehose` - Added support for configurable retry window for
  loading data into Amazon Redshift
* `Aws\Ecs` - Added support for status of ListTaskDefinitionFamilies

## 3.18.10 - 2016-05-18

* `Aws\S3` - Fixed signature with S3 presign request

## 3.18.9 - 2016-05-17

* `Aws\ApplicationDiscoveryService` - Fixed an incorrect model from the previous
  release. To use `AWS Discovery` service, please upgrade to this version
* `Aws\WorkSpaces` - Added support for tagging to categorize `Amazon WorkSpaces`,
  which also allows allocating usage to cost centers from AWS account bill

## 3.18.8 - 2016-05-12

* `Aws\ApplicationDiscoveryService` - Added support for `Aws Discovery` service
* `Aws\CloudFormation` - Added support for `ExecutionStatus` in `ChangeSets`
* `Aws\Ec2` - Added support for identifying stale security groups in VPC
* `Aws\Ssm` - Added support for document sharing feature

## 3.18.7 - 2016-05-10

* `Aws\` - Added support for new region and endpoints
* `Aws\Emr` - Added support for ListInstances API having filter on instance state
* `Aws\ImportExport` - Added support for `Aws\ImportExport` service

## 3.18.6 - 2016-05-05

* `Aws\ApiGateway` - Added support for additional field on Integration to
  control passthrough behavior
* `Aws\CloudTrail` - Deprecates the `SnsTopicName` field in favor of `SnsTopicArn`
* `Aws\Ecs` - Added support for non-comprehensive logDriver enum
* `Aws\Kms` - Added support for "pro-lockout" flag
* `Aws\S3` - Amazon S3 Added a new list type to list objects in buckets
  with a large number of delete markers

## 3.18.5 - 2016-05-03

* `Aws\Api` - Fixed serialization of booleans in querystrings
 * `Aws\OpsWorks` - Added support for default tenancy selection

## 3.18.4 - 2016-04-28

* `Aws\OpsWorks` - Added support for default tenancy selection.
* `Aws\Route53Domains` - Added support for getting contact reachability status
  and resending contact reachability emails.

## 3.18.3 - 2016-04-27

* `Aws\Api` - Fixed parsing empty responses
* `Aws\CognitoIdentityProvider` - Remove non-JSON operations.
* `Aws\Ec2` - Added support for ClassicLink over VPC peering
* `Aws\Ecr` - This update makes it easier to find repository URIs,
  which are now appended to the `#describe_repositories`, `#create_repository`,
  and `#delete_repository` responses.
* `Aws\S3` - Added support for Post Object Signature V4
* `Aws\S3` - Fixed Content-MD5 header for PutBucketReplication

## 3.18.1 - 2016-04-21

* `Aws\Acm` - Added support for tagging.
* `Aws\CognitoIdentity` - Minor update to support some new features of
  `Aws\CognitoIdentityProvider`.
* `Aws\Emr` - Added support for smart targeted resizing.
* `Aws\Iot` - Added support for specifying the SQL rules engine to be used.

## 3.18.0 - 2016-04-19

* `Aws\CognitoIdentityProvider` - Added support for the **Amazon Cognito
  Identity Provider** service.
* `Aws\ElasticBeanstalk` - Added support for automatic platform version upgrades
  with managed updates.
* `Aws\Firehose` - Added support for delivery to AWS Elasticsearch Service.
* `Aws\Kinesis` - Added support for enhanced monitoring.
* `Aws\S3` - Added support for S3 Accelerate.
* `Aws\S3` - Fixed bug where stat cache was not being updated following writes.
* `Aws\Signature` - Fixed inefficiency in S3 presigner.

## 3.17.6 - 2016-04-11

* `Aws\Ec2` - Fixed error codes in EC2 waiters.
* `Aws\Iot` - Added support for registering your own signing CA certificates and
  the X.509 certificates signed by your signing CA certificate.

## 3.17.5 - 2016-04-07

* `Aws\DirectoryService` - Added support for conditional forwarders.
* `Aws\ElasticBeanstalk` - Update client to latest version.
* `Aws\Lambda` - Added support for setting the function runtime as Node.js 4.3,
  as well as updating function configuration to set the runtime.

## 3.17.4 - 2016-04-05

* `Aws\ApiGateway` - Added support for importing REST APIs.
* `Aws\Glacier` - Fixed tree hash bug caused when content was a single zero.
* `Aws\Route53` - Added support for metric-based and regional health checks.
* `Aws\Signature` - Fixed presigning bug where the signed headers query
  parameter value was not lowercased.
* `Aws\Sts` - Added support for getting the caller identity.

## 3.17.3 - 2016-03-29

* `Aws\CloudFormation` - Added support for change sets.
* `Aws\Inspector` - Updated model to latest preview version.
* `Aws\Redshift` - Added support for cluster IAM roles.
* `Aws\Waf` - Added support for XSS protection.

## 3.17.2 - 2016-03-24

* `Aws\ElastiCache` - Added support for vertical scaling.
* `Aws\Rds` - Added support for joining SQL Server DB instances to Active
  Directory domains.
* `Aws\StorageGateway` - Added support for setting the local console password.

## 3.17.1 - 2016-03-22

* `Aws\DeviceFarm` - Added support for managing and purchasing offerings.
* `Aws\Rds` - Added support for customizing failover order in Amazon Aurora
  clusters.

## 3.17.0 - 2016-03-17

* `Aws\CloudHsm` - Added support for adding tags to, removing tags from, and
  listing the tags for a given resource.
* `Aws\Iot` - Added support for new Amazon Elasticsearch Service and Amazon
  Cloudwatch rule actions when creating topic rules.
* `Aws\MarketplaceMetering` - Added support for the **AWSMarketplace Metering**
  service.
* `Aws\S3` - Added support for lifecycle expiration policy for incomplete
  multipart upload and lifecycle expiration policy for expired object delete
  marker.
* `Aws\S3` - Added support for automatically removing delete markers which have
  no non-current versions underneath them.
* Fixed error handling in the timer middleware. Previously, exceptions were
  passed to the success handler instead of any registered error handler.
* Added support for multi-region clients.

## 3.16.0 - 2016-03-15

* `Aws\CodeDeploy` - Added support for getting deployment groups in batches.
* `Aws\DatabaseMigrationService` - Added support for the **AWS Database
Migration Service**.
* `Aws\Ses` - Added support for custom MAIL FROM domains.
* Added support for collecting transfer statistics.

## 3.15.9 - 2016-03-10

* `Aws\GameLift` - Added support for new AutoScaling features.
* `Aws\Iam` - Added support for stable, unique identifying string identifiers on
  each entity returned from IAM:ListEntitiesForPolicy.
* `Aws\Redshift` - Added support for restoring a single table from an Amazon
  Redshift snapshot instead of restoring the entire cluster.

## 3.15.8 - 2016-03-08

* `Aws\CodeCommit` - Added support for repository triggers.

## 3.15.7 - 2016-03-03

* `Aws\DirectoryService` - Added support for SNS notifications.
* `Aws\Ec2` - Added support for Cross VPC Security Group References with VPC
  peering and ClassicLink traffic over VPC peering.

## 3.15.6 - 2016-03-01

* `Aws\ApiGateway` - Added support for flushing all authorizer cache entries on
  a stage.
* `Aws\CloudSearchDomain` - Added support for returning field statistics in the
  response to a search operation.
* `Aws\DynamoDb` - Added support for describing account limits.

## 3.15.5 - 2016-02-25

* `Aws\AutoScaling` - Added support for specifying an instance ID instead of an
  action token when completing lifecycle actions or recording lifecycle action
  heartbeats.
* `Aws\CloudFormation` - Added support for retaining specific resources when
  deleting stacks.
* `Aws\CloudFormation` - Added support for adding tags when updating stacks.
* `Aws\S3` - Fixed bug where `ContentEncoding` and `ContentLength` were not
  returned when calling `HeadObject` on GZipped or deflated objects.
* `Aws\S3` - Fixed iteration bug in `Transfer` encountered when downloading more
  than 1,000 objects.
* `Aws\Sns` - Added support for specifying an encoding on an SNS action.

## 3.15.4 - 2016-02-23

* `Aws\Route53` - Added support for SNI health checks.

## 3.15.3 - 2016-02-18

* `Aws\StorageGateway` - Added support for creating tapes with barcodes.
* `Aws\CodeDeploy` - Added support for setting up triggers for a deployment
  group.

## 3.15.2 - 2016-02-16

* `Aws\Emr` - Added support for adding EBS storage to an EMR instance.
* `Aws\Rds` - Added support for cross-account sharing of encrypted DB snapshots.

## 3.15.1 - 2016-02-11

* `Aws\ApiGateway` - Added support for custom request authorizers.
* `Aws\AutoScaling` - Added waiters for checking on a group's existence,
  deletion, and whether at least the minimum number of instance are in service.
* `Aws\Lambda` - Added support for accessing resources in a VPC from a Lambda
  function.

## 3.15.0 - 2016-02-09

* `Aws\Api` - Added support for specifying what kinds of model constraints to
  validate.
* `Aws\DynamoDb` - Fixed requeueing mechanism in `WriteRequestBatch`.
* `Aws\GameLift` - Added support for the **Amazon GameLift** service.
* `Aws\MarketplaceCommerceAnalytics` - Added support for customer defined values.
* Added an adapter for using an instance of  `Psr\Cache\CacheItemPoolInterface`
  as an instance of `Aws\CacheInterface`.
* Updated JsonCompiler to preserve closing parens in strings in source JSON.
* Updated `Aws\AwsClient` to throw a `RuntimeException` on a serialization
  attempt.

## 3.14.2 - 2016-01-28

* `Aws\Waf` - Added support for size constraints.
* `Aws\Ssm` - Added paginators for `ListAssociations`, `ListCommandInvocations`,
  `ListCommands`, and `ListDocuments`.

## 3.14.1 - 2016-01-22

* `Aws\Acm` - Reverted to standard class naming conventions.

## 3.14.0 - 2016-01-21

* `Aws\ACM` - Added support for the **AWS Certificate Manager** service.
* `Aws\CloudFormation` - Added support for continuing update rollbacks.
* `Aws\CloudFront` - Added support using AWS ACM certificates with CloudFront
  distributions.
* `Aws\IoT` - Added support for topic rules.
* `Aws\S3` - Added handler function to automatically request URL encoding and
  then decode affected fields when no specific encoding type was requested.

## 3.13.1 - 2016-01-19

* `Aws\DeviceFarm` - Added support for running Appium tests written in Python
  against your native, hybrid and browser-based apps on AWS Device Farm.
* `Aws\IotDataPlane` - Fixed handling of invalid JSON returned by the `Publish`
  command.
* `Aws\Sts` - Added support for the `RegionDisabledException` (now returned
  instead of an AccessDenied when an admin hasn't turned on an STS region).

## 3.13.0 - 2016-01-14

* `Aws\CloudFront` - Added support for new origin security features.
* `Aws\CloudWatchEvents` - Added support for the **Amazon CloudWatch Events**
  service.
* `Aws\Ec2` - Added support for scheduled instances.
* `Aws\S3` - Fixed support for using `Iterator`s as a source for `Transfer`
  objects.

## 3.12.2 - 2016-01-12

* `Aws\Ec2` - Added support for DNS resolution of public hostnames to private IP
  addresses when queried over ClassicLink. Additionally, private hosted zones
  associated with your VPC can now be accessed from a linked EC2-Classic
  instance.

## 3.12.1 - 2016-01-06

* `Aws\Route53` - Fixed pagination bug on ListResourceRecordSets command.
* `Aws\Sns` - Added the SNS inbound message validator package to the composer
  suggestions list to aid discoverability.
* Documentation improvements and additions.

## 3.12.0 - 2015-12-21

* `Aws\Ecr` - Added support for the Amazon EC2 Container Registry.
* `Aws\Emr` - Added support for specifying a service security group when calling
  the RunJobFlow API.

## 3.11.7 - 2015-12-17

* `Aws\CloudFront` - Added support for generating signed cookies.
* `Aws\CloudFront` - Added support for GZip compression.
* `Aws\CloudTrail` - Added support for multi-region trails.
* `Aws\Config` - Added for IAM resource types.
* `Aws\Ec2` - Added support for managed NATs.
* `Aws\Rds` - Added support for enhanced monitoring.

## 3.11.6 - 2015-12-15

* `Aws\Ec2` - Added support for specifying encryption on CopyImage commands.

## 3.11.5 - 2015-12-08

* `Aws\AutoScaling` - Added support for setting and describing instance
  protection status.
* `Aws\Emr` - Added support for using release labels instead of version numbers.
* `Aws\Rds` - Added support for Aurora encryption at rest.

## 3.11.4 - 2015-12-03

* `Aws\DirectoryService` - Added support for launching a fully managed Microsoft
  Active Directory.
* `Aws\Rds` - Added support for specifying a port number when modifying database
  instances.
* `Aws\Route53` - Added support for Traffic Flow, a traffic management service.
* `Aws\Ses` - Added support for generating SMTP passwords from credentials.

## 3.11.3 - 2015-12-01

* `Aws\Config` - Update documentation.

## 3.11.2 - 2015-11-23

* `Aws\Config` - Reverted doc model change.

## 3.11.1 - 2015-11-23

* `Aws\Ec2` - Added support for EC2 dedicated hosts.
* `Aws\Ecs` - Added support for task stopped reasons and task start and stop
  times.
* `Aws\ElasticBeanstalk` - Added support for composable web applications.
* `Aws\S3` - Added support for the `aws-exec-read` canned ACL on objects.

## 3.11.0 - 2015-11-19

* `Aws\CognitoIdentity` - Added a CognitoIdentity credentials provider.
* `Aws\DeviceFarm` - Marked app ARN as optional on `ScheduleRun` and
  `GetDevicePoolCompatibility` operations.
* `Aws\DynamoDb` - Fixed bug where calling `session_regenerate_id` without
  changing session data would prevent data from being carried over from the
  previous session ID.
* `Aws\Inspector` - Added support for client-side validation of required
  parameters throughout service.
* Fixed error parser bug where certain errors could throw an uncaught
  parsing exception.

## 3.10.1 - 2015-11-12

* `Aws\Config` - Fixed parsing of null responses.
* `Aws\Rds` - Added support for snapshot attributes.

## 3.10.0 - 2015-11-10

* `Aws\ApiGateway` - Added support for stage variables.
* `Aws\DynamoDb` - Updated the session handler to emit warnings on write and
  delete failures.
* `Aws\DynamoDb` - Fixed session ID assignment timing bug encountered in PHP 7.
* `Aws\S3` - Removed ServerSideEncryption parameter from UploadPart operation.
* Added jitter to the default retry delay algorithm.
* Updated the compatibility test script.

## 3.9.4 - 2015-11-03

* `Aws\DeviceFarm` - Added support for managing projects, device pools, runs,
  and uploads.
* `Aws\Sts` - Added support for 64-character role session names.

## 3.9.3 - 2015-11-02

* `Aws\Iam` - Added support for service-aware policy simulation.

## 3.9.2 - 2015-10-29

* `Aws\ApiGateway` - Fixed parameter name collision that occurred when calling
  `PutIntegration`.
* `Aws\S3` - Added support for asynchronous copy and upload.
* `Aws\S3` - Added support for setting a location constraint other than the
  region of the S3 client.

## 3.9.1 - 2015-10-26

* `Aws\ApiGateway` - Fixed erroneous version number. Previous version number
  support kept for backwards compatibility, but "2015-06-01" should be
  considered deprecated.

## 3.9.0 - 2015-10-26

* `Aws\ApiGateway` - Added support for the **AWS API Gateway** service.
* `Aws\Ssm` - Added support for EC2 Run Command, a new EC2 feature that enables
  you to securely and remotely manage the configuration of your Amazon EC2
  Windows instances.

## 3.8.2 - 2015-10-22

* `Aws\AutoScaling` - Added support for EBS encryption.
* `Aws\Iam` - Added support for resource-based policy simulations.

## 3.8.1 - 2015-10-15

* `Aws\Kms` - Added support for scheduling and cancelling key deletions and
  listing retirable grants.
* `Aws\S3` - Added support for specifying server side encryption on an when
  uploading a part of a multipart upload.

## 3.8.0 - 2015-10-08

* `Aws\Ecs` - Added support for more Docker options hostname, Docker labels,
  working directory, networking disabled, privileged execution, read-only root
  filesystem, DNS servers, DNS search domains, ulimits, log configuration, extra
  hosts (hosts to add to /etc/hosts), and security options (for MLS systems like
  SELinux).
* `Aws\Iot` - Added support for the **AWS IoT** service.
* `Aws\IotDataPlane` - Added support for the **AWS IoT Data Plane** service.
* `Aws\Lambda` - Added support for function versioning.

## 3.7.0 - 2015-10-07

* `Aws\ConfigService` - Added support for config rules, evaluation strategies,
  and compliance querying.
* `Aws\Firehose` - Added support for the **Amazon Kinesis Firehose** service.
* `Aws\Inspector` - Added support for the **Amazon Inspector** service.
* `Aws\Kinesis` - Added support for increasing and decreasing stream retention
  periods.
* `Aws\MarketplaceCommerceAnalytics` - Added support for the **AWS Marketplace
  Commerce Analytics** service.

## 3.6.0 - 2015-10-06

* `Aws\CloudFront` - Added support for WebACL identifiers and related
  operations.
* `Aws\CloudFront` - Fixed URL presigner to always sign URL-encoded URLs.
* `Aws\Ec2` - Added support for spot blocks.
* `Aws\S3` - Fixed byte range specified on multipart copies.
* `Aws\Waf` - Added support for AWS WAF.

## 3.5.0 - 2015-10-01

* `Aws\Cloudtrail` - Added support for log file integrity validation, log
  encryption with AWS KMS–Managed Keys (SSE-KMS), and trail tagging.
* `Aws\ElasticsearchService` - Added support for the Amazon Elasticsearch
  Service.
* `Aws\Rds` - Added support for resource tags.
* `Aws\S3` - Added support for copying objects of any size.
* `Aws\Workspaces` - Added support for storage volume encryption with AWS KMS.

## 3.4.1 - 2015-09-29

* `Aws\CloudFormation` - Added support for specifying affected resource types
  in `CreateStack` and `UpdateStack` operations.
* `Aws\CloudFormation` - Added support for the `DescribeAccountLimits` API.
* `Aws\Ec2` - Added support modifying previously created spot fleet requests.
* `Aws\Ses` - Added support for inbound email APIs.
* Fixed validation to allow using objects implementing `__toString` for string
  fields in serialized output.

## 3.4.0 - 2015-09-24

* `Aws\S3` - Fixed retry handling of networking errors and client socket timeout
  errors to ensure the client `retries` option is respected.
* Added `@method` annotations on all clients to support autocomplete and static
  analysis.
* Added performance tests to the acceptance test suite.
* Fixed error when `getIterator` was called on a paginator with no specified
  `output_token`.
* Added support for reading the `aws_session_token` parameter from credentials
  files.

## 3.3.8 - 2015-09-17

* `Aws\CloudWatchLogs` - Added support for export task operations.

## 3.3.7 - 2015-09-16

* `Aws\S3` - Added support for new `STANDARD_IA` storage class.
* `Aws\S3` - Added support for specifying storage class in cross-region
  replication configuration.
* `Aws\Sqs` - Added a 'QueueExists' waiter to create a queue and wait until it
  has been fully provisioned.

## 3.3.6 - 2015-09-15

* `Aws\Ec2` - Added support for the "diversified" SpotFleet allocation strategy.
* `Aws\Ec2` - Added support for reading `StateMessage` and `DataEncryptionKeyId`
  from a `DescribeSnapshots` response.
* `Aws\Efs` - Added support for using a `MountTargetId` parameter instead of a
  `FileSystemId` parameter with the `DescribeMountTargets` command.
* `Aws\Route53` - Added support for calculated and latency health checks.
* `Aws\S3` - Fixed warning emitted by `BatchDelete` when no matching objects
  were found to delete.

## 3.3.5 - 2015-09-10

* `Aws\Iam` - Added support for new policy simulation APIs.
* `Aws\Kinesis` - Added support for timestamped GetRecords call.
* `Aws\MachineLearning` - Fixed invalid validation constraint on `Predict`
  operation.
* `Aws\S3` - Added support for retrying special error cases with the
  `ListObjects`, `CompleteMultipartUpload`, `CopyObject`, and `UploadPartCopy`.

## 3.3.4 - 2015-09-03

* `Aws\StorageGateway` - Added support for tagging and untagging resources.

## 3.3.3 - 2015-08-31

* `Aws\Ec2` - Added support for using instance weights with the
  `RequestSpotFleet` API.

## 3.3.2 - 2015-08-27

* `Aws\ConfigService` - Added support for the `ListDiscoveredResources`
  operation and new resource types.

## 3.3.1 - 2015-08-25

* `Aws\CodePipeline` - Added support for using encryption keys with artifact
  stores.

## 3.3.0 - 2015-08-20

* `Aws\S3` - Added support for event notification filters.
* Fixed waiter logic to always retry connection errors.
* Added support for per-command retry count overrides.
* Added support for defining custom patterns for the client debug log to use
  to scrub sensitive data from the output logged.
* Moved the work being done by `Aws\JsonCompiler` from run time to build time.
* Fixed bug causing the phar autoloader not to be found when the phar was loaded
  from opcache instead of from the filesystem.

## 3.2.6 - 2015-08-12

* `Aws\ElasticBeanstalk` - Added support for enhanced health reporting.
* `Aws\S3` - Fixed retry middleware to ensure that S3 requests are retried
  following errors raised by the HTTP handler.
* `Aws\S3` - Made the keys of the configuration array passed to the constructor
  of `MultipartUploader` case-insensitive so that its configuration would not
  rely on differently-cased keys from that of the `S3Client::putObject`
  operation.
* Added an endpoint validation step to the `Aws\AwsClient` constructor so that
  invalid endpoint would be reported immediately.

## 3.2.5 - 2015-08-06

* `Aws\Swf` - Added support for invoking AWS Lambda tasks from an Amazon SWF
  workflow.

## 3.2.4 - 2015-08-04

* `Aws\DeviceFarm` - Added support for the `GetAccountSettings` operation and
  update documentation to reflect new iOS support.
* Made PHP7 test failures fail the build.
* Added support for custom user-agent additions.

## 3.2.3 - 2015-07-30

* `Aws\OpsWorks` - Added support for operations on ECS clusters.
* `Aws\Rds` - Added support for cluster operations for Amazon Aurora.

## 3.2.2 - 2015-07-28

* `Aws\S3` - Added support for receiving the storage class in the responses for
  `GetObject` and `HeadObject` operations.
* `Aws\CloudWatchLogs` - Added support for 4 new operations: `PutDestination`,
  `PutDestinationPolicy`, `DescribeDestinations`, and `DeleteDestination`.

## 3.2.1 - 2015-07-23

* **SECURITY FIX**: This release addresses a security issue associated with
  CVE-2015-5723, specifically, fixes improper default directory umask behavior
  that could potentially allow unauthorized modifications of PHP code.
* `Aws\Ec2` - Added support for SpotFleetLaunchSpecification.
* `Aws\Emr` - Added support for Amazon EMR release 4.0.0, which includes a new
  application installation and configuration experience, upgraded versions of
  Hadoop, Hive, and Spark, and now uses open source standards for ports and
  paths. To specify an Amazon EMR release, use the release label parameter (AMI
  versions 3.x and 2.x can still be specified with the AMI version parameter).
* `Aws\Glacier` - Added support for the InitiateVaultLock, GetVaultLock,
  AbortVaultLock, and CompleteVaultLock API operations.
* Fixed a memory leak that occurred when clients were created and never used.
* Updated JsonCompiler by addressing a potential race condition and ensuring
  that caches are invalidated when upgrading to a new version of the SDK.
* Updated protocol and acceptance tests.

## 3.2.0 - 2015-07-14

* `Aws\DeviceFarm` - Added support for AWS DeviceFarm, an app testing service
  that enables you to test your Android and Fire OS apps on real, physical
  phones and tablets that are hosted by AWS.
* `Aws\DynamoDb` - Added support for consistent scans and update streams.
* `Aws\DynamoDbStreams` - Added support for Amazon DynamoDB Streams, giving you
  the ability to subscribe to the transactional log of all changes transpiring
  in your DynamoDB table.
* `Aws\S3` - Fixed checksum encoding on multipart upload of non-seekable
  streams.
* `Aws\S3\StreamWrapper` - Added guard on rename functionality to ensure wrapper
  initialized.


## 3.1.0 - 2015-07-09

* `Aws\CodeCommit` - Added support for AWS CodeCommit, a secure, highly
  scalable, managed source control service that hosts private Git repositories.
* `Aws\CodePipeline` - Added support for AWS CodePipeline, a continuous delivery
  service that enables you to model, visualize, and automate the steps required
  to release your software.
* `Aws\Iam` - Added support for uploading SSH public keys for authentication
  with AWS CodeCommit.
* `Aws\Ses` - Added support for cross-account sending through the sending
  authorization feature.

## 3.0.7 - 2015-07-07

* `Aws\AutoScaling` - Added support for step policies.
* `Aws\CloudHsm` - Fixed a naming collision with the `GetConfig` operation. This
  operation is now available through the `GetConfigFiles` method.
* `Aws\DynamoDb` - Improved performance when unmarshalling complex documents.
* `Aws\DynamoDb` - Fixed checksum comparison of uncompressed responses.
* `Aws\Ec2` - Added support for encrypted snapshots.
* `Aws\S3` - Added support for user-provided SHA256 checksums for S3 uploads.
* `Aws\S3` - Added support for custom protocols in `Aws\S3\StreamWrapper`.
* Added cucumber integration tests.
* Updated the test suite to be compatible with PHP 7-alpha 2.

## 3.0.6 - 2015-06-24

* `Aws\CloudFront` - Added support for configurable `MaxTTL` and `DefaultTTL`.
* `Aws\ConfigService` - Added support for recording changes for specific
  resource types.
* `Aws\Ecs` - Added support for sorting, deregistering, and overriding
  environment variables for task definitions.
* `Aws\Glacier` - Added support for the `AddTagsToVault`, `ListTagsForVault`,
  and `RemoveTagsFromVault` API operations.
* `Aws\OpwWorks` - Added support for specifying agent versions to be used on
  instances.
* `Aws\Redshift` - Added support for the `CreateSnapshotCopyGrant`,
  `DescribeSnapshotCopyGrants`, and `DeleteSnapshotCopyGrant` API operations.
* Fixed XML attribute serialization.

## 3.0.5 - 2015-06-18

* `Aws\CognitoSync` - Fixed an issue in the Signature Version 4 implementation
  that was causing issues when signing requests to the Cognito Sync service.
* `Aws\ConfigService` - Fixed an issue that was preventing the
  `ConfigServiceClient` from working properly.
* `Aws\Ecs` - Added support for sorting, deregistering, and overriding
  environment variables for task definitions.
* `Aws\Iam` - Added new paginator and waiter configurations.
* `Aws\S3` - Added support for the `SaveAs` parameter that was in V2.
* `Aws\Sqs` - Fixed an issue that was preventing batch message deletion from
  working properly.
* `Aws` - The `Aws\Sdk::createClient()` method is no longer case-sensitive with
  service names.

## 3.0.4 - 2015-06-11

* `Aws\AutoScaling` - Added support for attaching and detaching load balancers.
* `Aws\CloudWatchLogs` - Added support for the PutSubscriptionFilter,
  DescribeSubscriptionFilters, and DeleteSubscriptionFilter operations.
* `Aws\CognitoIdentity` - Added support for the DeleteIdentities operation,
  and hiding disabled identities with the ListIdentities operation.
* `Aws\Ec2` - Added support for VPC flow logs and the M4 instance types.
* `Aws\Ecs` - Added support for the UpdateContainerAgent operation.
* `Aws\S3` - Improvements to how errors are handled in the `StreamWrapper`.
* `Aws\StorageGateway` - Added support for the ListVolumeInitiators operation.
* `Aws` - Fixes a bug such that empty maps are handled correctly in JSON
  requests.

## 3.0.3 - 2015-06-01

* `Aws\MachineLearning` - Fixed the `Predict` operation to use the provided
  `PredictEndpoint` as the host.

## 3.0.2 - 2015-05-29

* `Aws` - Fixed an issue preventing some clients from being instantiated via
  their constructors due to a mismatch between class name and endpoint prefix.

## 3.0.1 - 2015-05-28

* `Aws\Lambda` - Added Amazon S3 upload support.

## 3.0.0 - 2015-05-27

* Asynchronous requests.
    * Features like _waiters_ and _multipart uploaders_ can also be used
      asynchronously.
    * Asynchronous workflows can be created using _promises_ and _coroutines_.
    * Improved performance of concurrent/batched requests via _command pools_.
* Decoupled HTTP layer.
    * [Guzzle 6](http://guzzlephp.org) is used by default to send requests,
      but Guzzle 5 is also supported out of the box.
    * The SDK can now work in environments where cURL is not available.
    * Custom HTTP handlers are also supported.
* Follows the [PSR-4 and PSR-7 standards](http://php-fig.org).
* Middleware system for customizing service client behavior.
* Flexible _paginators_ for iterating through paginated results.
* Ability to query data from _result_ and _paginator_ objects with
  [JMESPath](http://jmespath.org/).
* Easy debugging via the `'debug'` client configuration option.
* Customizable retries via the `'retries'` client configuration option.
* More flexibility in credential loading via _credential providers_.
* Strictly follows the [SemVer](http://semver.org/) standard going forward.
* **For more details about what has changed, see the
  [Migration Guide](http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/migration.html)**.

## 2.8.7 - 2015-05-26

* `Aws\Efs` - Added support for the [Amazon Elastic File System (Amazon
  EFS)](http://aws.amazon.com/efs/)
* Failing to parse an XML error response will now fail gracefully as a
  `PhpInternalXmlParseError` AWS error code.

## 2.8.6 - 2015-05-21

* `Aws\ElasticBeanstalk` - Added support for ResourceName configuration.
* `Aws\ElasticTranscoder` - Added support for configuring AudioPackingMode and
  additional CodecOptions.
* `Aws\Kinesis` - Added support for MillisBehindLatest in the result of
  GetRecordsOutput.
* `Aws\Kms` - Added support for the UpdateAlias operation.
* `Aws\Lambda` - Fixed an issue with the UpdateFunctionCode operation.

## 2.8.5 - 2015-05-18

* `Aws\Ec2\Ec2Client` - Added support for the new spot fleet API operations.
* `Aws\OpsWorks\OpsWorksClient` - Added support for custom auto-scaling based
  on CloudWatch alarms.

## 2.8.4 - 2015-05-14

* `Aws\DirectoryService` - Added support for the AWS Directory Service.
* `Aws\CloudWatchLogs` - Adds support for the FilterLogEvents operation.
* `Aws\CloudFormation` - Adds additional data to the GetTemplateSummary
  operation.
* `Aws\Ec2` - Adds support for Amazon VPC endpoints for Amazon S3 and APIs for
  migrating Elastic IP Address from EC2-Classic to EC2-VPC.
* `Aws\Ec2` - Fixed an issue with cross-region CopySnapshot such that it now
  works with temporary credentials.
* `Aws\Common` - During credential discovery, an invalid credentials file now
  allows failover to Instance Profile credentials.

## 2.8.3 - 2015-05-07

* `Aws\Glacier` - Added support for vault access policies.
* `Aws\Route53` - Fixed a `GetCheckerIpRangesResponse` response parsing issue.
* `Aws\S3` - Retrying CompleteMultipartUpload failures by retrying the request.
* `Aws\S3` - Corrected some response handling in the S3 multipart upload
   abstraction.
* Expiring instance metadata credentials 30 minutes in advance for more eager
  refreshes before the credentials expire.

## 2.8.2 - 2015-04-23

* `Aws\Ec2` - Added support for new VM Import APIs, `including ImportImage`.
* `Aws\Iam` - Added support for the `GetAccessKeyLastUsed` operation.
* `Aws\CloudSearchDomain` - Search responses now include the expressions requested.

## 2.8.1 - 2015-04-16

* `Aws\ConfigService` - Added the 'GetResourceConfigHistory' iterator.
* `Aws\CognitoSync` - Added support for events.
* `Aws\Lambda` - Fixed an issue with the Invoke operation.

## 2.8.0 - 2015-04-09

See the [Upgrading Guide](https://github.com/aws/aws-sdk-php/blob/master/UPGRADING.md)
for details about any changes you may need to make to your code for this upgrade.

* `Aws\MachineLearning` - Added support for the Amazon Machine Learning service.
* `Aws\WorkSpaces` - Added support for the Amazon WorkSpaces service.
* `Aws\Ecs` - Added support for the ECS service scheduler operations.
* `Aws\S3` - Added support for the `getBucketNotificationConfiguration` and
  `putBucketNotificationConfiguration` operations to the `S3Client` to replace
  the, now deprecated, `getBucketNotification` and `putBucketNotification`
  operations.
* [BC] `Aws\Lambda` - Added support for the new AWS Lambda API, which has been
  changed based on customer feedback during Lambda's preview period.
* `Aws\Common` - Deprecated "facades". They will not be present in Version 3 of
  the SDK.
* `Aws\Common` - Added `getAwsErrorCode`, `getAwsErrorType` and `getAwsRequestId`
  methods to the `ServiceResponseException` to be forward-compatible with
  Version 3 of the SDK.

## 2.7.27 - 2015-04-07

* `Aws\DataPipeline` - Added support for `DeactivatePipeline`
* `Aws\ElasticBeanstalk` - Added support for `AbortEnvironmentUpdate`

## 2.7.26 - 2015-04-02

* `Aws\CodeDeploy` - Added support deployments to on-premises instances.
* `Aws\Rds` - Added support for the `DescribeCertificates` operation.
* `Aws\ElasticTranscoder` - Added support for protecting content with PlayReady
  Digital Rights Management (DRM).

## 2.7.25 - 2015-03-26

* `Aws\ElasticTranscoder` - Added support for job timing.
* `Aws\Iam` - Added `NamedPolicy` to `GetAccountAuthorizationDetails`.
* `Aws\OpsWorks` - Added `BlockDeviceMapping` support.

## 2.7.24 - 2015-03-24

* `Aws\S3` - Added support for cross-region replication.
* `Aws\S3` - Added support for ["Requester Pays" buckets](http://docs.aws.amazon.com/AmazonS3/latest/dev/RequesterPaysBuckets.html).

## 2.7.23 - 2015-03-19

* `Aws\ElasticTranscoder` - API update to support AppliedColorSpaceConversion.
* `Aws\CloudSearchDomain` - Adding 504 status code to retry list.

## 2.7.22 - 2015-03-12

* `Aws\CloudFront` - Fixed #482, which affected pre-signing CloudFront URLs.
* `Aws\CloudTrail` - Added support for the `LookupEvents` operation.
* `Aws\CloudWatchLogs` - Added ordering parameters to the `DescribeLogStreams`
* `Aws\Ec2` - Added pagination parameters to the `DescribeSnapshots` operation.
  operation.

## 2.7.21 - 2015-03-04

* `Aws\CognitoSync` - Added support for Amazon Cognito Streams.

## 2.7.20 - 2015-02-23

* `Aws\DataPipeline` - Added support for pipeline tagging via the `AddTags` and
  `RemoveTags` operations.
* `Aws\Route53` - Added support for the `GetHostedZoneCount` and
  `ListHostedZonesByName` operations.

## 2.7.19 - 2015-02-20

* `Aws\CloudFront` - Added support for origin paths in web distributions.
* `Aws\Ecs` - Added support for specifying volumes and mount points. Also
* `Aws\ElasticTranscoder` - Added support for cross-regional resource warnings.
* `Aws\Route53Domains` - Add iterators for `ListDomains` and `ListOperations`.
* `Aws\Ssm` - Added support for the **Amazon Simple Systems Management Service
  (SSM)**.
* `Aws\Sts` - Added support for regional endpoints.
  switched the client to use a JSON protocol.
* Changed our CHANGELOG format. ;-)

## 2.7.18 - 2015-02-12

* Added support for named and managed policies to the IAM client.
* Added support for tagging operations to the Route 53 Domains client.
* Added support for tagging operations to the ElastiCache client.
* Added support for the Scan API for secondary indexes to the DynamoDB client.
* Added forward compatibility for the `'credentials'`, `'endpoint'`, and
  `'http'` configuration options.
* Made the `marshalValue()` and `unmarshalValue()` methods public in the
  DynamoDB Marshaler.

## 2.7.17 - 2015-01-27

* Added support for `getShippingLabel` to the AWS Import/Export client.
* Added support for online indexing to the DynamoDB client.
* Updated the AWS Lambda client.

## 2.7.16 - 2015-01-20

* Added support for custom security groups to the Amazon EMR client.
* Added support for the latest APIs to the Amazon Cognito Identity client.
* Added support for ClassicLink to the Auto Scaling client.
* Added the ability to set a client's API version to "latest" for forwards
  compatibility with v3.

## 2.7.15 - 2015-01-15

* Added support for [HLS Content Protection](https://aws.amazon.com/releasenotes/3388917394239147)
  to the Elastic Transcoder client.
* Updated client factory logic to add the `SignatureListener`, even when
  `NullCredentials` have been specified. This way, you can update a client's
  credentials later if you want to begin signing requests.

## 2.7.14 - 2015-01-09

* Fixed a regression in the CloudSearch Domain client (#448).

## 2.7.13 - 2015-01-08

* Added the Amazon EC2 Container Service client.
* Added the Amazon CloudHSM client.
* Added support for dynamic fields to the Amazon CloudSearch client.
* Added support for the ClassicLink feature to the Amazon EC2 client.
* Updated the Amazon RDS client to use the latest 2014-10-31 API.
* Updated S3 signature so retries use a new Date header on each attempt.

## 2.7.12 - 2014-12-18

* Added support for task priorities to Amazon Simple Workflow Service.

## 2.7.11 - 2014-12-17

* Updated Amazon EMR to the latest API version.
* Added support for for the new ResetCache API operation to AWS Storage Gateway.

## 2.7.10 - 2014-12-12

* Added support for user data to Amazon Elastic Transcoder.
* Added support for data retrieval policies and audit logging to the Amazon
  Glacier client.
* Corrected the AWS Security Token Service endpoint.

## 2.7.9 - 2014-12-08

* The Amazon Simple Queue Service client adds support for the PurgeQueue
  operation.
* You can now use AWS OpsWorks with existing EC2 instances and on-premises
  servers.

## 2.7.8 - 2014-12-04

* Added support for the `PutRecords` batch operation to `KinesisClient`.
* Added support for the `GetAccountAuthorizationDetails` operation to the
  `IamClient`.
* Added support for the `UpdateHostedZoneComment` operation to `Route53Client`.
* Added iterators for `ListEventSources` and `ListFunctions` operations the
  `LambdaClient`.

## 2.7.7 - 2014-11-25

* Added a DynamoDB `Marshaler` class, that allows you to marshal JSON documents
  or native PHP arrays to the format that DynamoDB requires. You can also
  unmarshal item data from operation results back into JSON documents or native
  PHP arrays.
* Added support for media file encryption to Amazon Elastic Transcoder.
* Removing a few superfluous `x-amz-server-side-encryption-aws-kms-key-id` from
  the Amazon S3 model.
* Added support for using AWS Data Pipeline templates to create pipelines and
  bind values to parameters in the pipeline.

## 2.7.6 - 2014-11-20

* Added support for AWS KMS integration to the Amazon Redshift Client.
* Fixed cn-north-1 endpoint for AWS Identity and Access Management.
* Updated `S3Client::getBucketLocation` method to work cross-region regardless
  of the region's signature requirements.
* Fixed an issue with the DynamoDbClient that allows it to work better with
  with DynamoDB Local.

## 2.7.5 - 2014-11-13

* Added support for AWS Lambda.
* Added support for event notifications to the Amazon S3 client.
* Fixed an issue with S3 pre-signed URLs when using Signature V4.

## 2.7.4 - 2014-11-12

* Added support for the AWS Key Management Service (AWS KMS).
* Added support for AWS CodeDeploy.
* Added support for AWS Config.
* Added support for AWS KMS encryption to the Amazon S3 client.
* Added support for AWS KMS encryption to the Amazon EC2 client.
* Added support for Amazon CloudWatch Logs delivery to the AWS CloudTrail
  client.
* Added the GetTemplateSummary operation to the AWS CloudFormation client.
* Fixed an issue with sending signature version 4 Amazon S3 requests that
  contained a 0 length body.

## 2.7.3 - 2014-11-06

* Added support for private DNS for Amazon Virtual Private Clouds, health check
  failure reasons, and reusable delegation sets to the Amazon Route 53 client.
* Updated the CloudFront model.
* Added support for configuring push synchronization to the Cognito Sync client.
* Updated docblocks in a few S3 and Glacier classes to improve IDE experience.

## 3.0.0-beta.1 - 2014-10-14

* New requirements on Guzzle 5 and PHP 5.5.
* Event system now uses Guzzle 5 events and no longer utilizes Symfony2.
* `version` and `region` are now required parameter for each client
  constructor. You can op-into using the latest version of a service by
  setting `version` to `latest`.
* Removed `Aws\S3\ResumableDownload`.
* More information to follow.

## 2.7.2 - 2014-10-23

* Updated AWS Identity and Access Management (IAM) to the latest version.
* Updated Amazon Cognito Identity client to the latest version.
* Added auto-renew support to the Amazon Route 53 Domains client.
* Updated Amazon EC2 to the latest version.

## 2.7.1 - 2014-10-16

* Updated the Amazon RDS client to the 2014-09-01 API version.
* Added support for advanced Japanese language processing to the Amazon
  CloudSearch client.

## 2.7.0 - 2014-10-08

* Added document model support to the Amazon DynamoDB client, including support
  for the new data types (`L`, `M`, `BOOL`, and `NULL`), nested attributes, and
  expressions.
* Deprecated the `Aws\DynamoDb\Model\Attribute`, `Aws\DynamoDb\Model\Item`,
  and `Aws\DynamoDb\Iterator\ItemIterator` classes, and the
  `Aws\DynamoDb\DynamoDbClient::formatValue` and
  `Aws\DynamoDb\DynamoDbClient::formatAttribute` methods, since they do not
  support the new types in the DynamoDB document model. These deprecated classes
  and methods still work reliably with `S`, `N`, `B`, `SS`, `NS`, and `BS`
  attributes.
* Updated the Amazon DynamoDB client to permanently disable client-side
  parameter validation. This needed to be done in order to support the new
  document model features.
* Updated the Amazon EC2 client to sign requests with Signature V4.
* Fixed an issue in the S3 service description to make the `VersionId`
  work in `S3Client::restoreObject`.

## 2.6.16 - 2014-09-11

* Added support for tagging to the Amazon Kinesis client.
* Added support for setting environment variables to the AWS OpsWorks client.
* Fixed issue #334 to allow the `before_upload` callback to work in the
  `S3Client::upload` method.
* Fixed an issue in the Signature V4 signer that was causing an issue with some
  CloudSearch Domain operations.

## 2.6.15 - 2014-08-14

* Added support for signing requests to the Amazon CloudSearch Domain client.
* Added support for creating anonymous clients.

## 2.6.14 - 2014-08-11

* Added support for tagging to the Elastic Load Balancing client.

## 2.6.13 - 2014-07-31

* Added support for configurable idle timeouts to the Elastic Load Balancing
  client.
* Added support for Lifecycle Hooks, Detach Instances, and Standby to the
  AutoScaling client.
* Added support for creating Amazon ElastiCache for Memcached clusters with
  nodes in multiple availability zones.
* Added minor fixes to the Amazon EC2 model for ImportVolume,
  DescribeNetworkInterfaceAttribute, and DeleteVpcPeeringConnection
* Added support for getGeoLocation and listGeoLocations to the
  Amazon Route 53 client.
* Added support for Amazon Route 53 Domains.
* Fixed an issue with deleting nested folders in the Amazon S3 stream wrapper.
* Fixed an issue with the Amazon S3 sync abstraction to ensure that S3->S3
  communication works correctly.
* Added stricter validation to the Amazon SNS MessageValidator.

## 2.6.12 - 2014-07-16

* Added support for adding attachments to support case communications to the
  AWS Support API client.
* Added support for credential reports and password rotation features to the
  AWS IAM client.
* Added the `ap-northeast-1`, `ap-southeast-1`, and `ap-southeast-2` regions to
  the Amazon Kinesis client.
* Added a `listFilter` stream context option that can be used when using
  `opendir()` and the Amazon S3 stream wrapper. This option is used to filter
  out specific objects from the files yielded from the stream wrapper.
* Fixed #322 so that the download sync builder ignores objects that have a
  `GLACIER` storage class.
* Fixed an issue with the S3 SSE-C logic so that HTTPS is only required when
  the SSE-C parameters are provided.
* Updated the Travis configuration to include running HHVM tests.

## 2.6.11 - 2014-07-09

* Added support for **Amazon Cognito Identity**.
* Added support for **Amazon Cognito Sync**.
* Added support for **Amazon CloudWatch Logs**.
* Added support for editing existing health checks and associating health checks
  with tags to the Amazon Route 53 client.
* Added the ModifySubnetAttribute operation to the Amazon EC2 client.

## 2.6.10 - 2014-07-02

* Added the `ap-northeast-1`, `ap-southeast-1`, and `sa-east-1` regions to the
  Amazon CloudTrail client.
* Added the `eu-west-1` and `us-west-2` regions to the Amazon Kinesis client.
* Fixed an issue with the SignatureV4 implementation when used with Amazon S3.
* Fixed an issue with a test that was causing failures when run on EC2 instances
  that have associated Instance Metadata credentials.

## 2.6.9 - 2014-06-26

* Added support for the CloudSearchDomain client, which allows you to search and
  upload documents to your CloudSearch domains.
* Added support for delivery notifications to the Amazon SES client.
* Updated the CloudFront client to support the 2014-05-31 API.
* Merged PR #316 as a better solution for issue #309.

## 2.6.8 - 2014-06-20

* Added support for closed captions to the Elastic Transcoder client.
* Added support for IAM roles to the Elastic MapReduce client.
* Updated the S3 PostObject to ease customization.
* Fixed an issue in some EC2 waiters by merging PR #306.
* Fixed an issue with the DynamoDB `WriteRequestBatch` by merging PR #310.
* Fixed issue #309, where the `url_stat()` logic in the S3 Stream Wrapper was
  affected by a change in PHP 5.5.13.

## 2.6.7 - 2014-06-12

* Added support for Amazon S3 server-side encryption using customer-provided
  encryption keys.
* Updated Amazon SNS to support message attributes.
* Updated the Amazon Redshift model to support new cluster parameters.
* Updated PHPUnit dev dependency to 4.* to work around a PHP serializing bug.

## 2.6.6 - 2014-05-29

* Added support for the [Desired Partition Count scaling
  option](http://aws.amazon.com/releasenotes/2440176739861815) to the
  CloudSearch client. Hebrew is also now a supported language.
* Updated the STS service description to the latest version.
* [Docs] Updated some of the documentation about credential profiles.
* Fixed an issue with the regular expression in the `S3Client::isValidBucketName`
  method. See #298.

## 2.6.5 - 2014-05-22

* Added cross-region support for the Amazon EC2 CopySnapshot operation.
* Added AWS Relational Database (RDS) support to the AWS OpsWorks client.
* Added support for tagging environments to the AWS Elastic Beanstalk client.
* Refactored the signature version 4 implementation to be able to pre-sign
  most operations.

## 2.6.4 - 2014-05-20

* Added support for lifecycles on versioning enabled buckets to the Amazon S3
  client.
* Fixed an Amazon S3 sync issue which resulted in unnecessary transfers when no
  `$keyPrefix` argument was utilized.
* Corrected the `CopySourceIfMatch` and `CopySourceIfNoneMatch` parameter for
  Amazon S3 to not use a timestamp shape.
* Corrected the sending of Amazon S3 PutBucketVersioning requests that utilize
  the `MFADelete` parameter.

## 2.6.3 - 2014-05-14

* Added the ability to modify Amazon SNS topic settings to the UpdateStack
  operation of the AWS CloudFormation client.
* Added support for the us-west-1, ap-southeast-2, and eu-west-1 regions to the
  AWS CloudTrail client.
* Removed no longer utilized AWS CloudTrail shapes from the model.

## 2.6.2 - 2014-05-06

* Added support for Amazon SQS message attributes.
* Fixed Amazon S3 multi-part uploads so that manually set ContentType values are not overwritten.
* No longer recalculating file sizes when an Amazon S3 socket timeout occurs because this was causing issues with
  multi-part uploads and it is very unlikely ever the culprit of a socket timeout.
* Added better environment variable detection.

## 2.6.1 - 2014-04-25

* Added support for the `~/.aws/credentials` INI file and credential profiles (via the `profile` option) as a safer
  alternative to using explicit credentials with the `key` and `secret` options.
* Added support for query filters and improved conditional expressions to the Amazon DynamoDB client.
* Added support for the `ChefConfiguration` parameter to a few operations on the AWS OpsWorks Client.
* Added support for Redis cache cluster snapshots to the Amazon ElastiCache client.
* Added support for the `PlacementTenancy` parameter to the `CreateLaunchConfiguration` operation of the Auto Scaling
  client.
* Added support for the new R3 instance types to the Amazon EC2 client.
* Added the `SpotInstanceRequestFulfilled` waiter to the Amazon EC2 client (see #241).
* Improved the S3 Stream Wrapper by adding support for deleting pseudo directories (#264), updating error handling
  (#276), and fixing `is_link()` for non-existent keys (#268).
* Fixed #252 and updated the DynamoDB `WriteRequestBatch` abstraction to handle batches that were completely rejected
  due to exceeding provisioned throughput.
* Updated the SDK to support Guzzle 3.9.x

## 2.6.0 - 2014-03-25

* [BC] Updated the Amazon CloudSearch client to use the new 2013-01-01 API version (see [their release
  notes](http://aws.amazon.com/releasenotes/6125075708216342)). This API version of CloudSearch is significantly
  different than the previous one, and is not backwards compatible. See the
  [Upgrading Guide](https://github.com/aws/aws-sdk-php/blob/master/UPGRADING.md) for more details.
* Added support for the VPC peering features to the Amazon EC2 client.
* Updated the Amazon EC2 client to use the new 2014-02-01 API version.
* Added support for [resize progress data and the Cluster Revision Number
  parameter](http://aws.amazon.com/releasenotes/0485739709714318) to the Amazon Redshift client.
* Added the `ap-northeast-1`, `ap-southeast-2`, and `sa-east-1` regions to the Amazon CloudSearch client.

## 2.5.4 - 2014-03-20

* Added support for [access logs](http://docs.aws.amazon.com/ElasticLoadBalancing/latest/DeveloperGuide/access-log-collection.html)
  to the Elastic Load Balancing client.
* Updated the Elastic Load Balancing client to the latest API version.
* Added support for the `AWS_SECRET_ACCESS_KEY` environment variables.
* Updated the Amazon CloudFront client to use the 2014-01-31 API version. See [their release
  notes](http://aws.amazon.com/releasenotes/1900016175520505).
* Updates the AWS OpsWorks client to the latest API version.
* Amazon S3 Stream Wrapper now works correctly with pseudo folder keys created by the AWS Management Console.
* Amazon S3 Stream Wrapper now implements `mkdir()` for nested folders similar to the AWS Management Console.
* Addressed an issue with Amazon S3 presigned-URLs where X-Amz-* headers were not being added to the query string.
* Addressed an issue with the Amazon S3 directory sync where paths that contained dot-segments were not properly.
  resolved. Removing the dot segments consistently helps to ensure that files are uploaded to their intended.
  destinations and that file key comparisons are accurately performed when determining which files to upload.

## 2.5.3 - 2014-02-27

* Added support for HTTP and HTTPS string-match health checks and HTTPS health checks to the Amazon Route 53 client
* Added support for the UPSERT action for the Amazon Route 53 ChangeResourceRecordSets operation
* Added support for SerialNumber and TokenCode to the AssumeRole operation of the IAM Security Token Service (STS).
* Added support for RequestInterval and FailureThreshold to the Amazon Route53 client.
* Added support for smooth streaming to the Amazon CloudFront client.
* Added the us-west-2, eu-west-1, ap-southeast-2, and ap-northeast-1 regions to the AWS Data Pipeline client.
* Added iterators to the Amazon Kinesis client
* Updated iterator configurations for all services to match our new iterator config spec (care was taken to continue
  supporting manually-specified configurations in the old format to prevent BC)
* Updated the Amazon EC2 model to include the latest updates and documentation. Removed deprecated license-related
  operations (this is not considered a BC since we have confirmed that these operations are not used by customers)
* Updated the Amazon Route 53 client to use the 2013-04-01 API version
* Fixed several iterator configurations for various services to better support existing operations and parameters
* Fixed an issue with the Amazon S3 client where an exception was thrown when trying to add a default Content-MD5
  header to a request that uses a non-rewindable stream.
* Updated the Amazon S3 PostObject class to work with CNAME style buckets.

## 2.5.2 - 2014-01-29

* Added support for dead letter queues to Amazon SQS
* Added support for the new M3 medium and large instance types to the Amazon EC2 client
* Added support for using the `eu-west-1` and `us-west-2` regions to the Amazon SES client
* Adding content-type guessing to the Amazon S3 stream wrapper (see #210)
* Added an event to the Amazon S3 multipart upload helpers to allow granular customization of multipart uploads during
  a sync (see #209)
* Updated Signature V4 logic for Amazon S3 to throw an exception if you attempt to create a presigned URL that expires
  later than a week (see #215)
* Fixed the `downloadBucket` and `uploadDirectory` methods to support relative paths and better support
  Windows (see #207)
* Fixed issue #195 in the Amazon S3 multipart upload helpers to properly support additional parameters (see #211)
* [Docs] Expanded examples in the [API reference](http://docs.aws.amazon.com/aws-sdk-php/latest/index.html) by default
  so they don't get overlooked
* [Docs] Moved the API reference links in the [service-specific user guide
  pages](http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html#service-specific-guides) to the bottom so
  the page's content takes priority

## 2.5.1 - 2014-01-09

* Added support for attaching existing Amazon EC2 instances to an Auto Scaling group to the Auto Scaling client
* Added support for creating launch configurations from existing Amazon EC2 instances to the Auto Scaling client
* Added support for describing Auto Scaling account limits to the Auto Scaling client
* Added better support for block device mappings to the Amazon AutoScaling client when creating launch configurations
* Added support for [ranged inventory retrieval](http://docs.aws.amazon.com/amazonglacier/latest/dev/api-initiate-job-post.html#api-initiate-job-post-vault-inventory-list-filtering)
  to the Amazon Glacier client
* [Docs] Updated and added a lot of content in the [User Guide](http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html)
* Fixed a bug where the `KinesisClient::getShardIterator()` method was not working properly
* Fixed an issue with Amazon SimpleDB where the 'Value' attribute was marked as required on DeleteAttribute and BatchDeleteAttributes
* Fixed an issue with the Amazon S3 stream wrapper where empty place holder keys were being marked as files instead of directories
* Added the ability to specify a custom signature implementation using a string identifier (e.g., 'v4', 'v2', etc)

## 2.5.0 - 2013-12-20

* Added support for the new **China (Beijing) Region** to various services. This region is currently in limited preview.
  Please see <http://www.amazonaws.cn> for more information
* Added support for different audio compression schemes to the Elastic Transcoder client (includes AAC-LC, HE-AAC,
  and HE-AACv2)
* Added support for preset and pipeline pagination to the Elastic Transcoder client. You can now view more than the
  first 50 presets and pipelines with their corresponding list operations
* Added support for [geo restriction](http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithDownloadDistributions.html#georestrictions)
  to the Amazon CloudFront client
* [SDK] Added Signature V4 support to the Amazon S3 and Amazon EC2 clients for the new China (Beijing) Region
* [BC] Updated the AWS CloudTrail client to use their latest API changes due to early user feedback. Some parameters in
  the `CreateTrail`, `UpdateTrail`, and `GetTrailStatus` have been deprecated and will be completely unavailable as
  early as February 15th, 2014. Please see [this announcement on the CloudTrail
  forum](https://forums.aws.amazon.com/ann.jspa?annID=2286). We are calling this out as a breaking change now to
  encourage you to update your code at this time.
* Updated the Amazon CloudFront client to use the 2013-11-11 API version
* [BC] Updated the Amazon EC2 client to use the latest API. This resulted in a small change to a parameter in the
  `RequestSpotInstances` operation. See [this commit](https://github.com/aws/aws-sdk-php/commit/36ae0f68d2a6dcc3bc28222f60ecb318449c4092#diff-bad2f6eac12565bb684f2015364c22bd)
  for the change
* [BC] Removed Signature V3 support (no longer needed) and refactored parts of the signature-related classes

## 2.4.12 - 2013-12-12

* Added support for **Amazon Kinesis**
* Added the CloudTrail `LogRecordIterator`, `LogFileIterator`, and `LogFileReader` classes for reading log files
  generated by the CloudTrail service
* Added support for resource-level permissions to the AWS OpsWorks client
* Added support for worker environment tiers to the AWS Elastic Beanstalk client
* Added support for the new I2 instance types to the Amazon EC2 client
* Added support for resource tagging to the Amazon Elastic MapReduce client
* Added support for specifying a key encoding type to the Amazon S3 client
* Added support for global secondary indexes to the Amazon DynamoDB client
* Updated the Amazon ElastiCache client to use Signature Version 4
* Fixed an issue in the waiter factory that caused an error when getting the factory for service clients without any
  existing waiters
* Fixed issue #187, where the DynamoDB Session Handler would fail to save the session if all the data is removed

## 2.4.11 - 2013-11-26

* Added support for copying DB snapshots from one AWS region to another to the Amazon RDS client
* Added support for pagination of the `DescribeInstances` and `DescribeTags` operations to the Amazon EC2 client
* Added support for the new C3 instance types and the g2.2xlarge instance type to the Amazon EC2 client
* Added support for enabling *Single Root I/O Virtualization* (SR-IOV) support for the new C3 instance types to the
  Amazon EC2 client
* Updated the Amazon EC2 client to use the 2013-10-15 API version
* Updated the Amazon RDS client to use the 2013-09-09 API version
* Updated the Amazon CloudWatch client to use Signature Version 4

## 2.4.10 - 2013-11-14

* Added support for **AWS CloudTrail**
* Added support for identity federation using SAML 2.0 to the AWS STS client
* Added support for configuring SAML-compliant identity providers to the AWS IAM client
* Added support for event notifications to the Amazon Redshift client
* Added support for HSM storage for encryption keys to the Amazon Redshift client
* Added support for encryption key rotation to the Amazon Redshift client
* Added support for database audit logging to the Amazon Redshift client

## 2.4.9 - 2013-11-08

* Added support for [cross-zone load balancing](http://aws.amazon.com/about-aws/whats-new/2013/11/06/elastic-load-balancing-adds-cross-zone-load-balancing/)
  to the Elastic Load Balancing client.
* Added support for a [new gateway configuration](http://aws.amazon.com/about-aws/whats-new/2013/11/05/aws-storage-gateway-announces-gateway-virtual-tape-library/),
  Gateway-Virtual Tape Library, to the AWS Storage Gateway client.
* Added support for stack policies to the the AWS CloudFormation client.
* Fixed issue #176 where attempting to upload a direct to Amazon S3 using the `UploadBuilder` failed when using a custom
  iterator that needs to be rewound.

## 2.4.8 - 2013-10-31

* Updated the AWS Direct Connect client
* Updated the Amazon Elastic MapReduce client to add support for new EMR APIs, termination of specific cluster
  instances, and unlimited EMR steps.

## 2.4.7 - 2013-10-17

* Added support for audio transcoding features to the Amazon Elastic Transcoder client
* Added support for modifying Reserved Instances in a region to the Amazon EC2 client
* Added support for new resource management features to the AWS OpsWorks client
* Added support for additional HTTP methods to the Amazon CloudFront client
* Added support for custom error page configuration to the Amazon CloudFront client
* Added support for the public IP address association of instances in Auto Scaling group via the Auto Scaling client
* Added support for tags and filters to various operations in the Amazon RDS client
* Added the ability to easily specify event listeners on waiters
* Added support for using the `ap-southeast-2` region to the Amazon Glacier client
* Added support for using the `ap-southeast-1` and `ap-southeast-2` regions to the Amazon Redshift client
* Updated the Amazon EC2 client to use the 2013-09-11 API version
* Updated the Amazon CloudFront client to use the 2013-09-27 API version
* Updated the AWS OpsWorks client to use the 2013-07-15 API version
* Updated the Amazon CloudSearch client to use Signature Version 4
* Fixed an issue with the Amazon S3 Client so that the top-level XML element of the `CompleteMultipartUpload` operation
  is correctly sent as `CompleteMultipartUpload`
* Fixed an issue with the Amazon S3 Client so that you can now disable bucket logging using with the `PutBucketLogging`
  operation
* Fixed an issue with the Amazon CloudFront so that query string parameters in pre-signed URLs are correctly URL-encoded
* Fixed an issue with the Signature Version 4 implementation where headers with multiple values were sometimes sorted
  and signed incorrectly

## 2.4.6 - 2013-09-12

* Added support for modifying EC2 Reserved Instances to the Amazon EC2 client
* Added support for VPC features to the AWS OpsWorks client
* Updated the DynamoDB Session Handler to implement the SessionHandlerInterface of PHP 5.4 when available
* Updated the SNS Message Validator to throw an exception, instead of an error, when the raw post data is invalid
* Fixed an issue in the S3 signature which ensures that parameters are sorted correctly for signing
* Fixed an issue in the S3 client where the Sydney region was not allowed as a `LocationConstraint` for the
  `PutObject` operation

## 2.4.5 - 2013-09-04

* Added support for replication groups to the Amazon ElastiCache client
* Added support for using the `us-gov-west-1` region to the AWS CloudFormation client

## 2.4.4 - 2013-08-29

* Added support for assigning a public IP address to an instance at launch to the Amazon EC2 client
* Updated the Amazon EC2 client to use the 2013-07-15 API version
* Updated the Amazon SWF client to sign requests with Signature V4
* Updated the Instance Metadata client to allow for higher and more customizable connection timeouts
* Fixed an issue with the SDK where XML map structures were not being serialized correctly in some cases
* Fixed issue #136 where a few of the new Amazon SNS mobile push operations were not working properly
* Fixed an issue where the AWS STS `AssumeRoleWithWebIdentity` operation was requiring credentials and a signature
  unnecessarily
* Fixed and issue with the `S3Client::uploadDirectory` method so that true key prefixes can be used
* [Docs] Updated the API docs to include sample code for each operation that indicates the parameter structure
* [Docs] Updated the API docs to include more information in the descriptions of operations and parameters
* [Docs] Added a page about Iterators to the user guide

## 2.4.3 - 2013-08-12

* Added support for mobile push notifications to the Amazon SNS client
* Added support for progress reporting on snapshot restore operations to the the Amazon Redshift client
* Updated the Amazon Elastic MapReduce client to use JSON serialization
* Updated the Amazon Elastic MapReduce client to sign requests with Signature V4
* Updated the SDK to throw `Aws\Common\Exception\TransferException` exceptions when a network error occurs instead of a
  `Guzzle\Http\Exception\CurlException`. The TransferException class, however, extends from
  `Guzzle\Http\Exception\CurlException`. You can continue to catch the Guzzle `CurlException` or catch
  `Aws\Common\Exception\AwsExceptionInterface` to catch any exception that can be thrown by an AWS client
* Fixed an issue with the Amazon S3 stream wrapper where trailing slashes were being added when listing directories

## 2.4.2 - 2013-07-25

* Added support for cross-account snapshot access control to the Amazon Redshift client
* Added support for decoding authorization messages to the AWS STS client
* Added support for checking for required permissions via the `DryRun` parameter to the Amazon EC2 client
* Added support for custom Amazon Machine Images (AMIs) and Chef 11 to the AWS OpsWorks client
* Added an SDK compatibility test to allow users to quickly determine if their system meets the requirements of the SDK
* Updated the Amazon EC2 client to use the 2013-06-15 API version
* Fixed an unmarshalling error with the Amazon EC2 `CreateKeyPair` operation
* Fixed an unmarshalling error with the Amazon S3 `ListMultipartUploads` operation
* Fixed an issue with the Amazon S3 stream wrapper "x" fopen mode
* Fixed an issue with `Aws\S3\S3Client::downloadBucket` by removing leading slashes from the passed `$keyPrefix` argument

## 2.4.1 - 2013-06-08

* Added support for setting watermarks and max framerates to the Amazon Elastic Transcoder client
* Added the `Aws\DynamoDb\Iterator\ItemIterator` class to make it easier to get items from the results of DynamoDB
  operations in a simpler form
* Added support for the `cr1.8xlarge` EC2 instance type. Use `Aws\Ec2\Enum\InstanceType::CR1_8XLARGE`
* Added support for the suppression list SES mailbox simulator. Use `Aws\Ses\Enum\MailboxSimulator::SUPPRESSION_LIST`
* [SDK] Fixed an issue with data formats throughout the SDK due to a regression. Dates are now sent over the wire with
  the correct format. This issue affected the Amazon EC2, Amazon ElastiCache, AWS Elastic Beanstalk, Amazon EMR, and
  Amazon RDS clients
* Fixed an issue with the parameter serialization of the `ImportInstance` operation in the Amazon EC2 client
* Fixed an issue with the Amazon S3 client where the `RoutingRules.Redirect.HostName` parameter of the
  `PutBucketWebsite` operation was erroneously marked as required
* Fixed an issue with the Amazon S3 client where the `DeleteObject` operation was missing parameters
* Fixed an issue with the Amazon S3 client where the `Status` parameter of the `PutBucketVersioning` operation did not
  properly support the "Suspended" value
* Fixed an issue with the Amazon Glacier `UploadPartGenerator` class so that an exception is thrown if the provided body
  to upload is less than 1 byte
* Added MD5 validation to Amazon SQS ReceiveMessage operations

## 2.4.0 - 2013-06-18

* [BC] Updated the Amazon CloudFront client to use the new 2013-05-12 API version which includes changes in how you
  configure distributions. If you are not ready to upgrade to the new API, you can configure the SDK to use the previous
  version of the API by setting the `version` option to `2012-05-05` when you instantiate the client (See
  [`UPGRADING.md`](https://github.com/aws/aws-sdk-php/blob/master/UPGRADING.md))
* Added abstractions for uploading a local directory to an Amazon S3 bucket (`$s3->uploadDirectory()`)
* Added abstractions for downloading an Amazon S3 bucket to local directory (`$s3->downloadBucket()`)
* Added an easy to way to delete objects from an Amazon S3 bucket that match a regular expression or key prefix
* Added an easy to way to upload an object to Amazon S3 that automatically uses a multipart upload if the size of the
  object exceeds a customizable threshold (`$s3->upload()`)
* [SDK] Added facade classes for simple, static access to clients (e.g., `S3::putObject([...])`)
* Added the `Aws\S3\S3Client::getObjectUrl` convenience method for getting the URL of an Amazon S3 object. This works
  for both public and pre-signed URLs
* Added support for using the `ap-northeast-1` region to the Amazon Redshift client
* Added support for configuring custom SSL certificates to the Amazon CloudFront client via the `ViewerCertificate`
  parameter
* Added support for read replica status to the Amazon RDS client
* Added "magic" access to iterators to make using iterators more convenient (e.g., `$s3->getListBucketsIterator()`)
* Added the `waitUntilDBInstanceAvailable` and `waitUntilDBInstanceDeleted` waiters to the Amazon RDS client
* Added the `createCredentials` method to the AWS STS client to make it easier to create a credentials object from the
  results of an STS operation
* Updated the Amazon RDS client to use the 2013-05-15 API version
* Updated request retrying logic to automatically refresh expired credentials and retry with new ones
* Updated the Amazon CloudFront client to sign requests with Signature V4
* Updated the Amazon SNS client to sign requests with Signature V4, which enables larger payloads
* Updated the S3 Stream Wrapper so that you can use stream resources in any S3 operation without having to manually
  specify the `ContentLength` option
* Fixed issue #94 so that the `Aws\S3\BucketStyleListener` is invoked on `command.after_prepare` and presigned URLs
  are generated correctly from S3 commands
* Fixed an issue so that creating presigned URLs using the Amazon S3 client now works with temporary credentials
* Fixed an issue so that the `CORSRules.AllowedHeaders` parameter is now available when configuring CORS for Amazon S3
* Set the Guzzle dependency to ~3.7.0

## 2.3.4 - 2013-05-30

* Set the Guzzle dependency to ~3.6.0

## 2.3.3 - 2013-05-28

* Added support for web identity federation in the AWS Security Token Service (STS) API
* Fixed an issue with creating pre-signed Amazon CloudFront RTMP URLs
* Fixed issue #85 to correct the parameter serialization of NetworkInterfaces within the Amazon EC2 RequestSpotInstances
  operation

## 2.3.2 - 2013-05-15

* Added support for doing parallel scans to the Amazon DynamoDB client
* [OpsWorks] Added support for using Elastic Load Balancer to the AWS OpsWorks client
* Added support for using EBS-backed instances to the AWS OpsWorks client along with some other minor updates
* Added support for finer-grained error messages to the AWS Data Pipeline client and updated the service description
* Added the ability to set the `key_pair_id` and `private_key` options at the time of signing a CloudFront URL instead
  of when instantiating the client
* Added a new [Zip Download](http://pear.amazonwebservices.com/get/aws.zip) for installing the SDK
* Fixed the API version for the AWS Support client to be `2013-04-15`
* Fixed issue #78 by implementing `Aws\S3\StreamWrapper::stream_cast()` for the S3 stream wrapper
* Fixed issue #79 by updating the S3 `ClearBucket` object to work with the `ListObjects` operation
* Fixed issue #80 where the `ETag` was incorrectly labeled as a header value instead of being in the XML body for
  the S3 `CompleteMultipartUpload` operation response
* Fixed an issue where the `setCredentials()` method did not properly update the `SignatureListener`
* Updated the required version of Guzzle to `">=3.4.3,<4"` to support Guzzle 3.5 which provides the SDK with improved
  memory management

## 2.3.1 - 2013-04-30

* Added support for **AWS Support**
* Added support for using the `eu-west-1` region to the Amazon Redshift client
* Fixed an issue with the Amazon RDS client where the `DownloadDBLogFilePortion` operation was not being serialized
  properly
* Fixed an issue with the Amazon S3 client where the `PutObjectCopy` alias was interfering with the `CopyObject`
  operation
* Added the ability to manually set a Content-Length header when using the `PutObject` and `UploadPart` operations of
  the Amazon S3 client
* Fixed an issue where the Amazon S3 class was not throwing an exception for a non-followable 301 redirect response
* Fixed an issue where `fflush()` was called during the shutdown process of the stream handler for read-only streams

## 2.3.0 - 2013-04-18

* Added support for Local Secondary Indexes to the Amazon DynamoDB client
* [BC] Updated the Amazon DynamoDB client to use the new 2012-08-10 API version which includes changes in how you
  specify keys. If you are not ready to upgrade to the new API, you can configure the SDK to use the previous version of
  the API by setting the `version` option to `2011-12-05` when you instantiate the client (See
  [`UPGRADING.md`](https://github.com/aws/aws-sdk-php/blob/master/UPGRADING.md)).
* Added an Amazon S3 stream wrapper that allows PHP native file functions to be used to interact with S3 buckets and
  objects
* Added support for automatically retrying *throttled* requests with exponential backoff to all service clients
* Added a new config option (`version`) to client objects to specify the API version to use if multiple are supported
* Added a new config option (`gc_operation_delay`) to the DynamoDB Session Handler to specify a delay between requests
  to the service during garbage collection in order to help regulate the consumption of throughput
* Added support for using the `us-west-2` region to the Amazon Redshift client
* [Docs] Added a way to use marked integration test code as example code in the user guide and API docs
* Updated the Amazon RDS client to sign requests with Signature V4
* Updated the Amazon S3 client to automatically add the `Content-Type` to `PutObject` and other upload operations
* Fixed an issue where service clients with a global endpoint could have their region for signing set incorrectly if a
  region other than `us-east-1` was specified.
* Fixed an issue where reused command objects appended duplicate content to the user agent string
* [SDK] Fixed an issue in a few operations (including `SQS::receiveMessage`) where the `curl.options` could not be
  modified
* [Docs] Added key information to the DynamoDB service description to provide more accurate API docs for some operations
* [Docs] Added a page about Waiters to the user guide
* [Docs] Added a page about the DynamoDB Session Handler to the user guide
* [Docs] Added a page about response Models to the user guide
* Bumped the required version of Guzzle to ~3.4.1

## 2.2.1 - 2013-03-18

* Added support for viewing and downloading DB log files to the Amazon RDS client
* Added the ability to validate incoming Amazon SNS messages. See the `Aws\Sns\MessageValidator` namespace
* Added the ability to easily change the credentials that a client is configured to use via `$client->setCredentials()`
* Added the `client.region_changed` and `client.credentials_changed` events on the client that are triggered when the
  `setRegion()` and `setCredentials()` methods are called, respectively
* Added support for using the `ap-southeast-2` region with the Amazon ElastiCache client
* Added support for using the `us-gov-west-1` region with the Amazon SWF client
* Updated the Amazon RDS client to use the 2013-02-12 API version
* Fixed an issue in the Amazon EC2 service description that was affecting the use of the new `ModifyVpcAttribute` and
  `DescribeVpcAttribute` operations
* Added `ObjectURL` to the output of an Amazon S3 PutObject operation so that you can more easily retrieve the URL of an
  object after uploading
* Added a `createPresignedUrl()` method to any command object created by the Amazon S3 client to more easily create
  presigned URLs

## 2.2.0 - 2013-03-11

* Added support for **Amazon Elastic MapReduce (Amazon EMR)**
* Added support for **AWS Direct Connect**
* Added support for **Amazon ElastiCache**
* Added support for **AWS Storage Gateway**
* Added support for **AWS Import/Export**
* Added support for **AWS CloudFormation**
* Added support for **Amazon CloudSearch**
* Added support for [provisioned IOPS](http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/Overview.ProvisionedIOPS.html)
  to the the Amazon RDS client
* Added support for promoting [read replicas](http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_ReadRepl.html)
  to the Amazon RDS client
* Added support for [event notification subscriptions](http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_Events.html)
  to the Amazon RDS client
* Added support for enabling\disabling DNS Hostnames and DNS Resolution in Amazon VPC to the Amazon EC2 client
* Added support for enumerating account attributes to the Amazon EC2 client
* Added support for copying AMIs across regions to the Amazon EC2 client
* Added the ability to get a Waiter object from a client using the `getWaiter()` method
* [SDK] Added the ability to load credentials from environmental variables `AWS_ACCESS_KEY_ID` and `AWS_SECRET_KEY`.
  This is compatible with AWS Elastic Beanstalk environment configurations
* Added support for using the us-west-1, us-west-2, eu-west-1, and ap-southeast-1 regions with Amazon CloudSearch
* Updated the Amazon RDS client to use the 2013-01-10 API version
* Updated the Amazon EC2 client to use the 2013-02-01 API version
* Added support for using SecurityToken with signature version 2 services
* Added the client User-Agent header to exception messages for easier debugging
* Added an easier way to disable operation parameter validation by setting `validation` to false when creating clients
* Added the ability to disable the exponential backoff plugin
* Added the ability to easily fetch the region name that a client is configured to use via `$client->getRegion()`
* Added end-user guides available at http://docs.aws.amazon.com/aws-sdk-php/guide/latest/
* Fixed issue #48 where signing Amazon S3 requests with null or empty metadata resulted in a signature error
* Fixed issue #29 where Amazon S3 was intermittently closing a connection
* Updated the Amazon S3 client to parse the AcceptRanges header for HeadObject and GetObject output
* Updated the Amazon Glacier client to allow the `saveAs` parameter to be specified as an alias for `command.response_body`
* Various performance improvements throughout the SDK
* Removed endpoint providers and now placing service region information directly in service descriptions
* Removed client resolvers when creating clients in a client's factory method (this should not have any impact to end users)

## 2.1.2 - 2013-02-18

* Added support for **AWS OpsWorks**

## 2.1.1 - 2013-02-15

* Added support for **Amazon Redshift**
* Added support for **Amazon Simple Queue Service (Amazon SQS)**
* Added support for **Amazon Simple Notification Service (Amazon SNS)**
* Added support for **Amazon Simple Email Service (Amazon SES)**
* Added support for **Auto Scaling**
* Added support for **Amazon CloudWatch**
* Added support for **Amazon Simple Workflow Service (Amazon SWF)**
* Added support for **Amazon Relational Database Service (Amazon RDS)**
* Added support for health checks and failover in Amazon Route 53
* Updated the Amazon Route 53 client to use the 2012-12-12 API version
* Updated `AbstractWaiter` to dispatch `waiter.before_attempt` and `waiter.before_wait` events
* Updated `CallableWaiter` to allow for an array of context data to be passed to the callable
* Fixed issue #29 so that the stat cache is cleared before performing multipart uploads
* Fixed issue #38 so that Amazon CloudFront URLs are signed properly
* Fixed an issue with Amazon S3 website redirects
* Fixed a URL encoding inconsistency with Amazon S3 and pre-signed URLs
* Fixed issue #42 to eliminate cURL error 65 for JSON services
* Set Guzzle dependency to [~3.2.0](https://github.com/guzzle/guzzle/blob/master/CHANGELOG.md#320-2013-02-14)
* Minimum version of PHP is now 5.3.3

## 2.1.0 - 2013-01-28

* Waiters now require an associative array as input for the underlying operation performed by a waiter. See
  `UPGRADING.md` for details.
* Added support for **Amazon Elastic Compute Cloud (Amazon EC2)**
* Added support for **Amazon Elastic Transcoder**
* Added support for **Amazon SimpleDB**
* Added support for **Elastic Load Balancing**
* Added support for **AWS Elastic Beanstalk**
* Added support for **AWS Identity and Access Management (IAM)**
* Added support for Amazon S3 website redirection rules
* Added support for the `RetrieveByteRange` parameter of the `InitiateJob` operation in Amazon Glacier
* Added support for Signature Version 2
* Clients now gain more information from service descriptions rather than client factory methods
* Service descriptions are now versioned for clients
* Fixed an issue where Amazon S3 did not use "restore" as a signable resource
* Fixed an issue with Amazon S3 where `x-amz-meta-*` headers were not properly added with the CopyObject operation
* Fixed an issue where the Amazon Glacier client was not using the correct User-Agent header
* Fixed issue #13 in which constants defined by referencing other constants caused errors with early versions of PHP 5.3

## 2.0.3 - 2012-12-20

* Added support for **AWS Data Pipeline**
* Added support for **Amazon Route 53**
* Fixed an issue with the Amazon S3 client where object keys with slashes were causing errors
* Added a `SaveAs` parameter to the Amazon S3 `GetObject` operation to allow saving the object directly to a file
* Refactored iterators to remove code duplication and ease creation of future iterators

## 2.0.2 - 2012-12-10

* Fixed an issue with the Amazon S3 client where non-DNS compatible buckets that was previously causing a signature
  mismatch error
* Fixed an issue with the service description for the Amazon S3 `UploadPart` operation so that it works correctly
* Fixed an issue with the Amazon S3 service description dealing with `response-*` query parameters of `GetObject`
* Fixed an issue with the Amazon S3 client where object keys prefixed by the bucket name were being treated incorrectly
* Fixed an issue with `Aws\S3\Model\MultipartUpload\ParallelTransfer` class
* Added support for the `AssumeRole` operation for AWS STS
* Added a the `UploadBodyListener` which allows upload operations in Amazon S3 and Amazon Glacier to accept file handles
  in the `Body` parameter and file paths in the `SourceFile` parameter
* Added Content-Type guessing for uploads
* Added new region endpoints, including sa-east-1 and us-gov-west-1 for Amazon DynamoDB
* Added methods to `Aws\S3\Model\MultipartUpload\UploadBuilder` class to make setting ACL and Content-Type easier

## 2.0.1 - 2012-11-13

* Fixed a signature issue encountered when a request to Amazon S3 is redirected
* Added support for archiving Amazon S3 objects to Amazon Glacier
* Added CRC32 validation of Amazon DynamoDB responses
* Added ConsistentRead support to the `BatchGetItem` operation of Amazon DynamoDB
* Added new region endpoints, including Sydney

## 2.0.0 - 2012-11-02

* Initial release of the AWS SDK for PHP Version 2. See <http://aws.amazon.com/sdkforphp2/> for more information.
* Added support for **Amazon Simple Storage Service (Amazon S3)**
* Added support for **Amazon DynamoDB**
* Added support for **Amazon Glacier**
* Added support for **Amazon CloudFront**
* Added support for **AWS Security Token Service (AWS STS)**
