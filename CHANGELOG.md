# CHANGELOG

## 3.209.17 - 2022-02-03

* `Aws\EC2` - adds support for AMIs in Recycle Bin
* `Aws\MarketplaceMetering` - Add CustomerAWSAccountId to ResolveCustomer API response and increase UsageAllocation limit to 2500.
* `Aws\RecycleBin` - Add EC2 Image recycle bin support.
* `Aws\RoboMaker` - The release deprecates the use various APIs of RoboMaker Deployment Service in favor of AWS IoT GreenGrass v2.0.

## 3.209.16 - 2022-02-02

* `Aws\Appflow` - Launching Amazon AppFlow Custom Connector SDK.
* `Aws\Comprehend` - Amazon Comprehend now supports sharing and importing custom trained models from one AWS account to another within the same region.
* `Aws\CostExplorer` - Doc-only update for Cost Explorer API that adds INVOICING_ENTITY dimensions
* `Aws\DynamoDB` - Documentation update for DynamoDB Java SDK.
* `Aws\EMR` - Documentation updates for Amazon EMR.
* `Aws\ElastiCache` - Documentation update for AWS ElastiCache
* `Aws\ElasticsearchService` - Allows customers to get progress updates for blue/green deployments
* `Aws\FIS` - Added GetTargetResourceType and ListTargetResourceTypesAPI actions. These actions return additional details about resource types and parameters that can be targeted by FIS actions. Added a parameters field for the targets that can be specified in experiment templates.
* `Aws\Glue` - Launch Protobuf support for AWS Glue Schema Registry
* `Aws\IoT` - This release adds support for configuring AWS IoT logging level per client ID, source IP, or principal ID.
* `Aws\Personalize` - Adding minRecommendationRequestsPerSecond attribute to recommender APIs.

## 3.209.15 - 2022-01-28

* `Aws\AppConfig` - Documentation updates for AWS AppConfig
* `Aws\AppConfigData` - Documentation updates for AWS AppConfig Data.
* `Aws\Athena` - This release adds a field, AthenaError, to the GetQueryExecution response object when a query fails.
* `Aws\CognitoIdentityProvider` - Doc updates for Cognito user pools API Reference.
* `Aws\SageMaker` - This release added a new NNA accelerator compilation support for Sagemaker Neo.
* `Aws\SecretsManager` - Feature are ready to release on Jan 28th

## 3.209.14 - 2022-01-27

* `Aws\Amplify` - Doc only update to the description of basicauthcredentials to describe the required encoding and format.
* `Aws\Connect` - This release adds support for configuring a custom chat duration when starting a new chat session via the StartChatContact API. The default value for chat duration is 25 hours, minimum configurable value is 1 hour (60 minutes) and maximum configurable value is 7 days (10,080 minutes).
* `Aws\EC2` - X2ezn instances are powered by Intel Cascade Lake CPUs that deliver turbo all core frequency of up to 4.5 GHz and up to 100 Gbps of networking bandwidth
* `Aws\Kafka` - Amazon MSK has updated the CreateCluster and UpdateBrokerStorage API that allows you to specify volume throughput during cluster creation and broker volume updates.
* `Aws\OpenSearchService` - Allows customers to get progress updates for blue/green deployments

## 3.209.13 - 2022-01-26

* `Aws\` - Update the API guide docs site to use the latest version of jquery and jquery-migrate.
* `Aws\CodeGuruReviewer` - Added failure state and adjusted timeout in waiter
* `Aws\EBS` - Documentation updates for Amazon EBS Direct APIs.
* `Aws\FraudDetector` - Added new APIs for viewing past predictions and obtaining prediction metadata including prediction explanations: ListEventPredictions and GetEventPredictionMetadata
* `Aws\SageMaker` - API changes relating to Fail steps in model building pipeline and add PipelineExecutionFailureReason in PipelineExecutionSummary.
* `Aws\SecurityHub` - Adding top level Sample boolean field

## 3.209.12 - 2022-01-25

* `Aws\Connect` - This release adds support for custom vocabularies to be used with Contact Lens. Custom vocabularies improve transcription accuracy for one or more specific words.
* `Aws\EFS` - Use Amazon EFS Replication to replicate your Amazon EFS file system in the AWS Region of your preference.
* `Aws\FSx` - This release adds support for growing SSD storage capacity and growing/shrinking SSD IOPS for FSx for ONTAP file systems.
* `Aws\GuardDuty` - Amazon GuardDuty expands threat detection coverage to protect Amazon Elastic Kubernetes Service (EKS) workloads.

## 3.209.11 - 2022-01-24

* `Aws\` - Suppress warning generated on is_readable calls to ini files
* `Aws\Route53RecoveryReadiness` - Updated documentation for Route53 Recovery Readiness APIs.

## 3.209.10 - 2022-01-21

* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for 4K AV1 output resolutions & 10-bit AV1 color, the ability to ingest sidecar Dolby Vision XML metadata files, and the ability to flag WebVTT and IMSC tracks for accessibility in HLS.
* `Aws\TranscribeService` - Add support for granular PIIEntityTypes when using Batch ContentRedaction.

## 3.209.9 - 2022-01-20

* `Aws\` - Add missing PHPDoc annotations for ArrayAccess and Countable implementations.
* `Aws\Connect` - This release adds tagging support for UserHierarchyGroups resource.
* `Aws\EC2` - C6i, M6i and R6i instances are powered by a third-generation Intel Xeon Scalable processor (Ice Lake) delivering all-core turbo frequency of 3.5 GHz
* `Aws\FIS` - Added action startTime and action endTime timestamp fields to the ExperimentAction object
* `Aws\GuardDuty` - Amazon GuardDuty findings now include remoteAccountDetails under AwsApiCallAction section if instance credential is exfiltrated.
* `Aws\MediaTailor` - This release adds support for multiple Segment Delivery Configurations. Users can provide a list of names and URLs when creating or editing a source location. When retrieving content, users can send a header to choose which URL should be used to serve content.

## 3.209.8 - 2022-01-19

* `Aws\EC2InstanceConnect` - Adds support for ED25519 keys. PushSSHPublicKey Availability Zone parameter is now optional. Adds EC2InstanceStateInvalidException for instances that are not running. This was previously a service exception, so this may require updating your code to handle this new exception.
* `Aws\Macie2` - This release of the Amazon Macie API introduces stricter validation of requests to create custom data identifiers.

## 3.209.7 - 2022-01-18

* `Aws\CloudTrail` - This release fixes a documentation bug in the description for the readOnly field selector in advanced event selectors. The description now clarifies that users omit the readOnly field selector to select both Read and Write management events.
* `Aws\EC2` - Add support for AWS Client VPN client login banner and session timeout.
* `Aws\IVS` - This release adds support for the new Thumbnail Configuration property for Recording Configurations. For more information see https://docs.aws.amazon.com/ivs/latest/userguide/record-to-s3.html
* `Aws\LocationService` - This release adds the CalculateRouteMatrix API which calculates routes for the provided departure and destination positions. The release also deprecates the use of pricing plan across all verticals.
* `Aws\StorageGateway` - Documentation update for adding bandwidth throttling support for S3 File Gateways.

## 3.209.6 - 2022-01-14

* `Aws\ApplicationInsights` - Application Insights support for Active Directory and SharePoint
* `Aws\ConfigService` - Update ResourceType enum with values for CodeDeploy, EC2 and Kinesis resources
* `Aws\Honeycode` - Added read and write api support for multi-select picklist. And added errorcode field to DescribeTableDataImportJob API output, when import job fails.
* `Aws\LookoutMetrics` - This release adds a new DeactivateAnomalyDetector API operation.
* `Aws\RAM` - This release adds the ListPermissionVersions API which lists the versions for a given permission.

## 3.209.5 - 2022-01-13

* `Aws\ElastiCache` - AWS ElastiCache for Redis has added a new Engine Log LogType in LogDelivery feature. You can now publish the Engine Log from your Amazon ElastiCache for Redis clusters to Amazon CloudWatch Logs and Amazon Kinesis Data Firehose.
* `Aws\Glue` - This SDK release adds support to pass run properties when starting a workflow run
* `Aws\LexRuntimeV2` - This release adds support for sending hints to Amazon Lex V2 runtime APIs. Bot developers can provide runtime hints to help improve the recognition of slot values.
* `Aws\NimbleStudio` - Amazon Nimble Studio now supports validation for Launch Profiles. Launch Profiles now report static validation results after create/update to detect errors in network or active directory configuration.
* `Aws\Pinpoint` - Adds JourneyChannelSettings to WriteJourneyRequest
* `Aws\SSM` - AWS Systems Manager adds category support for DescribeDocument API

## 3.209.4 - 2022-01-12

* `Aws\EC2` - Hpc6a instances are powered by a third-generation AMD EPYC processors (Milan) delivering all-core turbo frequency of 3.4 GHz
* `Aws\ElastiCache` - Doc only update for ElastiCache
* `Aws\FMS` - Shield Advanced policies for Amazon CloudFront resources now support automatic application layer DDoS mitigation. The max length for SecurityServicePolicyData ManagedServiceData is now 8192 characters, instead of 4096.
* `Aws\Honeycode` - Honeycode is releasing new APIs to allow user to create, delete and list tags on resources.
* `Aws\LexModelsV2` - This release adds support for Custom vocabulary in Amazon Lex V2 APIs for model building. Customers can give Amazon Lex V2 more information about how to process audio conversations with a bot by creating a custom vocabulary in a specific language.
* `Aws\PI` - This release adds three Performance Insights APIs. Use ListAvailableResourceMetrics to get available metrics, GetResourceMetadata to get feature metadata, and ListAvailableResourceDimensions to list available dimensions. The AdditionalMetrics field in DescribeDimensionKeys retrieves per-SQL metrics.

## 3.209.3 - 2022-01-11

* `Aws\CostExplorer` - Doc only update for Cost Explorer API that fixes missing clarifications for MatchOptions definitions
* `Aws\EC2` - EC2 Capacity Reservations now supports RHEL instance platforms (RHEL with SQL Server Standard, RHEL with SQL Server Enterprise, RHEL with SQL Server Web, RHEL with HA, RHEL with HA and SQL Server Standard, RHEL with HA and SQL Server Enterprise)
* `Aws\FinSpaceData` - Documentation updates for FinSpace.
* `Aws\IoTEventsData` - This release provides documentation updates for Timer.timestamp in the IoT Events API Reference Guide.
* `Aws\RDS` - This release adds the db-proxy event type to support subscribing to RDS Proxy events.
* `Aws\WorkSpaces` - Introducing new APIs for Workspaces audio optimization with Amazon Connect: CreateConnectClientAddIn, DescribeConnectClientAddIns, UpdateConnectClientAddIn and DeleteConnectClientAddIn.
* `Aws\kendra` - Amazon Kendra now supports advanced query language and query-less search.

## 3.209.2 - 2022-01-10

* `Aws\ComputeOptimizer` - Adds support for new Compute Optimizer capability that makes it easier for customers to optimize their EC2 instances by leveraging multiple CPU architectures.
* `Aws\EC2` - New feature: Updated EC2 API to support faster launching for Windows images. Optimized images are pre-provisioned, using snapshots to launch instances up to 65% faster.
* `Aws\GlueDataBrew` - This SDK release adds support for specifying a Bucket Owner for an S3 location.
* `Aws\LookoutMetrics` - This release adds FailureType in the response of DescribeAnomalyDetector.
* `Aws\TranscribeService` - Documentation updates for Amazon Transcribe.

## 3.209.1 - 2022-01-07

* `Aws\MediaLive` - This release adds support for selecting the Program Date Time (PDT) Clock source algorithm for HLS outputs.

## 3.209.0 - 2022-01-06

* `Aws\` - This commit adds defaults config: an opt-in feature which allows users to specify default configuration options to be loaded from a shared file
* `Aws\AppSync` - AppSync: AWS AppSync now supports configurable batching sizes for AWS Lambda resolvers, Direct AWS Lambda resolvers and pipeline functions
* `Aws\EC2` - This release introduces On-Demand Capacity Reservation support for Cluster Placement Groups, adds Tags on instance Metadata, and includes documentation updates for Amazon EC2.
* `Aws\ElasticsearchService` - Amazon OpenSearch Service adds support for Fine Grained Access Control for existing domains running Elasticsearch version 6.7 and above
* `Aws\IoTWireless` - Downlink Queue Management feature provides APIs for customers to manage the queued messages destined to device inside AWS IoT Core for LoRaWAN. Customer can view, delete or purge the queued message(s). It allows customer to preempt the queued messages and let more urgent messages go through.
* `Aws\MWAA` - This release adds a "Source" field that provides the initiator of an update, such as due to an automated patch from AWS or due to modification via Console or API.
* `Aws\MediaTailor` - This release adds support for filler slate when updating MediaTailor channels that use the linear playback mode.
* `Aws\OpenSearchService` - Amazon OpenSearch Service adds support for Fine Grained Access Control for existing domains running Elasticsearch version 6.7 and above

## 3.208.10 - 2022-01-05

* `Aws\AppStream` - Includes APIs for App Entitlement management regarding entitlement and entitled application association.
* `Aws\CloudTrail` - This release adds support for CloudTrail Lake, a new feature that lets you run SQL-based queries on events that you have aggregated into event data stores. New APIs have been added for creating and managing event data stores, and creating, running, and managing queries in CloudTrail Lake.
* `Aws\EC2` - This release adds a new API called ModifyVpcEndpointServicePayerResponsibility which allows VPC endpoint service owners to take payer responsibility of their VPC Endpoint connections.
* `Aws\ECS` - Documentation update for ticket fixes.
* `Aws\EKS` - Amazon EKS now supports running applications using IPv6 address space
* `Aws\Glue` - Add Delta Lake target support for Glue Crawler and 3rd Party Support for Lake Formation
* `Aws\IoT` - This release adds an automatic retry mechanism for AWS IoT Jobs. You can now define a maximum number of retries for each Job rollout, along with the criteria to trigger the retry for FAILED/TIMED_OUT/ALL(both FAILED an TIMED_OUT) job.
* `Aws\LakeFormation` - Add new APIs for 3rd Party Support for Lake Formation
* `Aws\QuickSight` - Multiple Doc-only updates for Amazon QuickSight.
* `Aws\SageMaker` - Amazon SageMaker now supports running training jobs on ml.g5 instance types.
* `Aws\Snowball` - Updating validation rules for interfaces used in the Snowball API to tighten security of service.

## 3.208.9 - 2022-01-04

* `Aws\Rekognition` - This release introduces a new field IndexFacesModelVersion, which is the version of the face detect and storage model that was used when indexing the face vector.
* `Aws\S3` - Minor doc-based updates based on feedback bugs received.
* `Aws\S3Control` - Documentation updates for the renaming of Glacier to Glacier Flexible Retrieval.

## 3.208.8 - 2022-01-03

* `Aws\Detective` - Added and updated API operations to support the Detective integration with AWS Organizations. New actions are used to manage the delegated administrator account and the integration configuration.
* `Aws\GreengrassV2` - This release adds the API operations to manage the Greengrass role associated with your account and to manage the core device connectivity information. Greengrass V2 customers can now depend solely on Greengrass V2 SDK for all the API operations needed to manage their fleets.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added strength levels to the Sharpness Filter and now permits OGG files to be specified as sidecar audio inputs.
* `Aws\RDS` - Multiple doc-only updates for Relational Database Service (RDS)
* `Aws\SageMaker` - The release allows users to pass pipeline definitions as Amazon S3 locations and control the pipeline execution concurrency using ParallelismConfiguration. It also adds support of EMR jobs as pipeline steps.

## 3.208.7 - 2021-12-21

* `Aws\ChimeSDKMessaging` - The Amazon Chime SDK now supports updating message attributes via channel flows
* `Aws\LookoutMetrics` - This release adds support for Causal Relationships. Added new ListAnomalyGroupRelatedMetrics API operation and InterMetricImpactDetails API data type
* `Aws\MediaConnect` - You can now use the Fujitsu-QoS protocol for your MediaConnect sources and outputs to transport content to and from Fujitsu devices.
* `Aws\NimbleStudio` - Amazon Nimble Studio adds support for users to upload files during a streaming session using NICE DCV native client or browser.
* `Aws\QLDB` - Amazon QLDB now supports journal exports in JSON and Ion Binary formats. This release adds an optional OutputFormat parameter to the ExportJournalToS3 API.
* `Aws\Transfer` - Property for Transfer Family used with the FTPS protocol. TLS Session Resumption provides a mechanism to resume or share a negotiated secret key between the control and data connection for an FTPS session.
* `Aws\WorkMail` - This release allows customers to change their email monitoring configuration in Amazon WorkMail.
* `Aws\imagebuilder` - Added a note to infrastructure configuration actions and data types concerning delivery of Image Builder event messages to encrypted SNS topics. The key that's used to encrypt the SNS topic must reside in the account that Image Builder runs under.

## 3.208.6 - 2021-12-20

* `Aws\APIGateway` - Documentation updates for Amazon API Gateway
* `Aws\CustomerProfiles` - This release adds an optional parameter, ObjectTypeNames to the PutIntegration API to support multiple object types per integration option. Besides, this release introduces Standard Order Objects which contain data from third party systems and each order object belongs to a specific profile.
* `Aws\DataSync` - AWS DataSync now supports FSx Lustre Locations.
* `Aws\DevOpsGuru` - Adds Tags support to DescribeOrganizationResourceCollectionHealth
* `Aws\FinSpaceData` - Make dataset description optional and allow s3 export for dataviews
* `Aws\ForecastService` - Adds ForecastDimensions field to the DescribeAutoPredictorResponse
* `Aws\LocationService` - Making PricingPlan optional as part of create resource API.
* `Aws\Redshift` - This release adds API support for managed Redshift datashares. Customers can now interact with a Redshift datashare that is managed by a different service, such as AWS Data Exchange.
* `Aws\SageMaker` - This release adds a new ContentType field in AutoMLChannel for SageMaker CreateAutoMLJob InputDataConfig.
* `Aws\SecurityHub` - Added new resource details objects to ASFF, including resources for Firewall, and RuleGroup, FirewallPolicy Added additional details for AutoScalingGroup, LaunchConfiguration, and S3 buckets.
* `Aws\imagebuilder` - This release adds support for importing and exporting VM Images as part of the Image Creation workflow via EC2 VM Import/Export.

## 3.208.5 - 2021-12-13

* `Aws\SecretsManager` - Documentation updates for Secrets Manager

## 3.208.4 - 2021-12-09

* `Aws\` - This release adds #[ReturnTypeWillChange] attribute where it is needed and fixes a deprecation notice when pass null to rawurlencode() for PHP 8.1 compatibility
* `Aws\EC2` - Adds waiters support for internet gateways.
* `Aws\LexModelsV2` - Added support for grammar slot type in Amazon Lex. You can author your own grammar in the XML format per the SRGS specification to collect information in a conversation.
* `Aws\NetworkFirewall` - This release adds support for managed rule groups.
* `Aws\Route53Domains` - Amazon Route 53 domain registration APIs now support filtering and sorting in the ListDomains API, deleting a domain by using the DeleteDomain API and getting domain pricing information by using the ListPrices API.
* `Aws\Route53RecoveryControlConfig` - This release adds tagging supports to Route53 Recovery Control Configuration. New APIs: TagResource, UntagResource and ListTagsForResource. Updates: add optional field `tags` to support tagging while calling CreateCluster, CreateControlPanel and CreateSafetyRule.
* `Aws\SMS` - This release adds SMS discontinuation information to the API and CLI references.
* `Aws\SavingsPlans` - Adds the ability to specify Savings Plans hourly commitments using five digits after the decimal point.

## 3.208.3 - 2021-12-08

* `Aws\CloudWatchLogs` - This release adds AWS Organizations support as condition key in destination policy for cross account Subscriptions in CloudWatch Logs.
* `Aws\ComprehendMedical` - This release adds a new set of APIs (synchronous and batch) to support the SNOMED-CT ontology.
* `Aws\Health` - Documentation updates for AWS Health
* `Aws\IoT` - This release allows customer to enable caching of custom authorizer on HTTP protocol for clients that use persistent or Keep-Alive connection in order to reduce the number of Lambda invocations.
* `Aws\LookoutforVision` - This release adds new APIs for packaging an Amazon Lookout for Vision model as an AWS IoT Greengrass component.
* `Aws\Outposts` - This release adds the UpdateOutpost API.
* `Aws\SageMaker` - This release added a new Ambarella device(amba_cv2) compilation support for Sagemaker Neo.
* `Aws\Support` - Documentation updates for AWS Support.

## 3.208.2 - 2021-12-06

* `Aws\AppSync` - AWS AppSync now supports custom domain names, allowing you to associate a domain name that you own with an AppSync API in your account.
* `Aws\LocationService` - This release adds support for Accuracy position filtering, position metadata and autocomplete for addresses and points of interest based on partial or misspelled free-form text.
* `Aws\Route53` - Add PriorRequestNotComplete exception to UpdateHostedZoneComment API

## 3.208.1 - 2021-12-03

* `Aws\Rekognition` - This release added new KnownGender types for Celebrity Recognition.

## 3.208.0 - 2021-12-02

* `Aws\AmplifyUIBuilder` - This release introduces the actions and data types for the new Amplify UI Builder API. The Amplify UI Builder API provides a programmatic interface for creating and configuring user interface (UI) component libraries and themes for use in Amplify applications.
* `Aws\NetworkManager` - This release adds API support for AWS Cloud WAN.
* `Aws\RAM` - This release adds the ability to use the new ResourceRegionScope parameter on List operations that return lists of resources or resource types. This new parameter filters the results by letting you differentiate between global or regional resource types.

## 3.207.1 - 2021-12-01

* `Aws\DevOpsGuru` - DevOps Guru now provides detailed, database-specific analyses of performance issues and recommends corrective actions for Amazon Aurora database instances with Performance Insights turned on. You can also use AWS tags to choose which resources to analyze and define your applications.
* `Aws\DirectConnect` - Adds SiteLink support to private and transit virtual interfaces. SiteLink is a new Direct Connect feature that allows routing between Direct Connect points of presence.
* `Aws\DynamoDB` - Add support for Table Classes and introduce the Standard Infrequent Access table class.
* `Aws\EC2` - This release adds support for Amazon VPC IP Address Manager (IPAM), which enables you to plan, track, and monitor IP addresses for your workloads. This release also adds support for VPC Network Access Analyzer, which enables you to analyze network access to resources in your Virtual Private Clouds.
* `Aws\LexModelsV2` - This release introduces a new feature, Automated Chatbot Designer, that helps customers automatically create a bot design from existing conversation transcripts. The feature uses machine learning to discover most common intents and the information needed to fulfill them.
* `Aws\SageMaker` - This release enables - 1/ Inference endpoint configuration recommendations and ability to run custom load tests to meet performance needs. 2/ Deploy serverless inference endpoints. 3/ Query, filter and retrieve end-to-end ML lineage graph, and incorporate model quality/bias detection in ML workflow.
* `Aws\SageMakerRuntime` - Adding new exception types for InvokeEndpoint
* `Aws\Shield` - This release adds API support for Automatic Application Layer DDoS Mitigation for AWS Shield Advanced. Customers can now enable automatic DDoS mitigation in count or block mode for layer 7 protected resources.
* `Aws\kendra` - Experience Builder allows customers to build search applications without writing code. Analytics Dashboard provides quality and usability metrics for Kendra indexes. Custom Document Enrichment allows customers to build a custom ingestion pipeline to pre-process documents and generate metadata.

## 3.207.0 - 2021-11-30

* `Aws\AccessAnalyzer` - AWS IAM Access Analyzer now supports policy validation for resource policies attached to S3 buckets and access points. You can run additional policy checks by specifying the S3 resource type you want to attach to your resource policy.
* `Aws\BackupGateway` - Initial release of AWS Backup gateway which enables you to centralize and automate protection of on-premises VMware and VMware Cloud on AWS workloads using AWS Backup.
* `Aws\EC2` - This release adds support for Is4gen and Im4gn instances. This release also adds a new subnet attribute, enableLniAtDeviceIndex, to support local network interfaces, which are logical networking components that connect an EC2 instance to your on-premises network.
* `Aws\FSx` - This release adds support for the FSx for OpenZFS file system type, FSx for Lustre file systems with the Persistent_2 deployment type, and FSx for Lustre file systems with Amazon S3 data repository associations and automatic export policies.
* `Aws\Glue` - Support for DataLake transactions
* `Aws\IoT` - Added the ability to enable/disable IoT Fleet Indexing for Device Defender and Named Shadow information, and search them through IoT Fleet Indexing APIs.
* `Aws\IoTTwinMaker` - AWS IoT TwinMaker makes it faster and easier to create, visualize and monitor digital twins of real-world systems like buildings, factories and industrial equipment to optimize operations. Learn more: https://docs.aws.amazon.com/iot-twinmaker/latest/apireference/Welcome.html (New Service) (Preview)
* `Aws\Kafka` - This release adds three new V2 APIs. CreateClusterV2 for creating both provisioned and serverless clusters. DescribeClusterV2 for getting information about provisioned and serverless clusters and ListClustersV2 for listing all clusters (both provisioned and serverless) in your account.
* `Aws\Kinesis` - Amazon Kinesis Data Streams now supports on demand streams.
* `Aws\LakeFormation` - This release adds support for row and cell-based access control in Lake Formation. It also adds support for Lake Formation Governed Tables, which support ACID transactions and automatic storage optimizations.
* `Aws\Outposts` - This release adds the SupportedHardwareType parameter to CreateOutpost.
* `Aws\RedshiftDataAPIService` - Data API now supports serverless queries.
* `Aws\S3` - Introduce Amazon S3 Glacier Instant Retrieval storage class and a new setting in S3 Object Ownership to disable ACLs for bucket and the objects in it.
* `Aws\Snowball` - Tapeball is to integrate tape gateway onto snowball, it enables customer to transfer local data on the tape to snowball,and then ingest the data into tape gateway on the cloud.
* `Aws\StorageGateway` - Added gateway type VTL_SNOW. Added new SNOWBALL HostEnvironment for gateways running on a Snowball device. Added new field HostEnvironmentId to serve as an identifier for the HostEnvironment on which the gateway is running.
* `Aws\WorkSpacesWeb` - This is the initial SDK release for Amazon WorkSpaces Web. Amazon WorkSpaces Web is a low-cost, fully managed WorkSpace built to deliver secure web-based workloads and software-as-a-service (SaaS) application access to users within existing web browsers.

## 3.206.0 - 2021-11-29

* `Aws\CloudWatchEvidently` - Introducing Amazon CloudWatch Evidently. This is the first public release of Amazon CloudWatch Evidently.
* `Aws\CloudWatchRUM` - This is the first public release of CloudWatch RUM
* `Aws\ComputeOptimizer` - Adds support for the enhanced infrastructure metrics paid feature. Also adds support for two new sets of resource efficiency metrics, including savings opportunity metrics and performance improvement opportunity metrics.
* `Aws\DataExchange` - This release enables providers and subscribers to use Data Set, Job, and Asset operations to work with API assets from Amazon API Gateway. In addition, this release enables subscribers to use the SendApiAsset operation to invoke a provider's Amazon API Gateway API that they are entitled to.
* `Aws\EC2` - This release adds support for G5g and M6a instances. This release also adds support for Amazon EBS Snapshots Archive, a feature that enables you to archive your EBS snapshots; and Recycle Bin, a feature that enables you to protect your EBS snapshots against accidental deletion.
* `Aws\ECR` - This release adds supports for pull through cache rules and enhanced scanning.
* `Aws\Inspector2` - This release adds support for the new Amazon Inspector API. The new Amazon Inspector can automatically discover and scan Amazon EC2 instances and Amazon ECR container images for software vulnerabilities and unintended network exposure, and report centralized findings across multiple AWS accounts.
* `Aws\IoTSiteWise` - AWS IoT SiteWise now supports retention configuration for the hot tier storage.
* `Aws\RecycleBin` - This release adds support for Recycle Bin.
* `Aws\S3` - Amazon S3 Event Notifications adds Amazon EventBridge as a destination and supports additional event types. The PutBucketNotificationConfiguration API can now skip validation of Amazon SQS, Amazon SNS and AWS Lambda destinations.
* `Aws\SSM` - Added two new attributes to DescribeInstanceInformation called SourceId and SourceType along with new string filters SourceIds and SourceTypes to filter instance records.
* `Aws\WellArchitected` - This update provides support for Well-Architected API users to use custom lens features.

## 3.205.0 - 2021-11-29

* `Aws\MigrationHubRefactorSpaces` - This is the initial SDK release for AWS Migration Hub Refactor Spaces
* `Aws\Personalize` - This release adds API support for Recommenders and BatchSegmentJobs.
* `Aws\PersonalizeRuntime` - This release adds inference support for Recommenders.
* `Aws\Textract` - This release adds support for synchronously analyzing identity documents through a new API: AnalyzeID

## 3.204.6 - 2021-11-26

* `Aws\AutoScaling` - Documentation updates for Amazon EC2 Auto Scaling.
* `Aws\EC2` - Documentation updates for EC2.
* `Aws\IoTDeviceAdvisor` - Documentation update for Device Advisor GetEndpoint API
* `Aws\Outposts` - This release adds new APIs for working with Outpost sites and orders.
* `Aws\Pinpoint` - Added a One-Time Password (OTP) management feature. You can use the Amazon Pinpoint API to generate OTP codes and send them to your users as SMS messages. Your apps can then call the API to verify the OTP codes that your users input
* `Aws\mgn` - Application Migration Service now supports an additional replication method that does not require agent installation on each source server. This option is available for source servers running on VMware vCenter versions 6.7 and 7.0.

## 3.204.5 - 2021-11-24

* `Aws\AutoScaling` - Customers can now configure predictive scaling policies to proactively scale EC2 Auto Scaling groups based on any CloudWatch metrics that more accurately represent the load on the group than the four predefined metrics. They can also use math expressions to further customize the metrics.
* `Aws\CustomerProfiles` - This release introduces a new auto-merging feature for profile matching. The auto-merging configurations can be set via CreateDomain API or UpdateDomain API. You can use GetIdentityResolutionJob API and ListIdentityResolutionJobs API to fetch job status.
* `Aws\ElastiCache` - Doc only update for ElastiCache
* `Aws\IoTSiteWise` - AWS IoT SiteWise now accepts data streams that aren't associated with any asset properties. You can organize data by updating data stream associations.
* `Aws\Lambda` - Remove Lambda function url apis
* `Aws\Proton` - This release adds APIs for getting the outputs and provisioned stacks for Environments, Pipelines, and ServiceInstances. You can now add tags to EnvironmentAccountConnections. It also adds APIs for working with PR-based provisioning. Also, it adds APIs for syncing templates with a git repository.
* `Aws\TimestreamQuery` - Releasing Amazon Timestream Scheduled Queries. It makes real-time analytics more performant and cost-effective for customers by calculating and storing frequently accessed aggregates, and other computations, typically used in operational dashboards, business reports, and other analytics applications
* `Aws\TimestreamWrite` - This release adds support for multi-measure records and magnetic store writes. Multi-measure records allow customers to store multiple measures in a single table row. Magnetic store writes enable customers to write late arrival data (data with timestamp in the past) directly into the magnetic store.
* `Aws\Translate` - This release enables customers to use translation settings to mask profane words and phrases in their translation output.
* `Aws\imagebuilder` - This release adds support for sharing AMIs with Organizations within an EC2 Image Builder Distribution Configuration.

## 3.204.4 - 2021-11-23

* `Aws\Backup` - This release adds new opt-in settings for advanced features for DynamoDB backups
* `Aws\DynamoDB` - DynamoDB PartiQL now supports ReturnConsumedCapacity, which returns capacity units consumed by PartiQL APIs if the request specified returnConsumedCapacity parameter. PartiQL APIs include ExecuteStatement, BatchExecuteStatement, and ExecuteTransaction.
* `Aws\EC2` - This release adds a new parameter ipv6Native to the allow creation of IPv6-only subnets using the CreateSubnet operation, and the operation ModifySubnetAttribute includes new parameters to modify subnet attributes to use resource-based naming and enable DNS resolutions for Private DNS name.
* `Aws\ECS` - Documentation update for ARM support on Amazon ECS.
* `Aws\ElastiCache` - Adding support for r6gd instances for Redis with data tiering. In a cluster with data tiering enabled, when available memory capacity is exhausted, the least recently used data is automatically tiered to solid state drives for cost-effective capacity scaling with minimal performance impact.
* `Aws\ElasticLoadBalancingv2` - This release allows you to create internal Application and Network Load Balancers in dualstack mode. This release also adds an attribute to block internet gateway (IGW) access to the load balancer, preventing unintended access to your internal load balancers through an internet gateway.
* `Aws\FinSpaceData` - Update documentation for createChangeset API.
* `Aws\IoT` - This release introduces a new feature, Managed Job Template, for AWS IoT Jobs Service. Customers can now use service provided managed job templates to easily create jobs for supported standard job actions.
* `Aws\IoTDeviceAdvisor` - This release introduces a new feature for Device Advisor: ability to execute multiple test suites in parallel for given customer account. You can use GetEndpoint API to get the device-level test endpoint and call StartSuiteRun with "parallelRun=true" to run suites in parallel.
* `Aws\IoTWireless` - Two new APIs, GetNetworkAnalyzerConfiguration and UpdateNetworkAnalyzerConfiguration, are added for the newly released Network Analyzer feature which enables customers to view real-time frame information and logs from LoRaWAN devices and gateways.
* `Aws\Lambda` - Release Lambda event source filtering for SQS, Kinesis Streams, and DynamoDB Streams.
* `Aws\Macie2` - Documentation updates for Amazon Macie
* `Aws\OpenSearchService` - This release adds an optional parameter dry-run for the UpdateDomainConfig API to perform basic validation checks, and detect the deployment type that will be required for the configuration change, without actually applying the change.
* `Aws\RDS` - Adds support for Multi-AZ DB clusters for RDS for MySQL and RDS for PostgreSQL.
* `Aws\Redshift` - This release adds support for reserved node exchange with restore/resize
* `Aws\S3` - Introduce two new Filters to S3 Lifecycle configurations - ObjectSizeGreaterThan and ObjectSizeLessThan. Introduce a new way to trigger actions on noncurrent versions by providing the number of newer noncurrent versions along with noncurrent days.
* `Aws\SQS` - Amazon SQS adds a new queue attribute, SqsManagedSseEnabled, which enables server-side queue encryption using SQS owned encryption keys.
* `Aws\STS` - Documentation updates for AWS Security Token Service.
* `Aws\WorkSpaces` - Documentation updates for Amazon WorkSpaces

## 3.204.3 - 2021-11-22

* `Aws\Braket` - This release adds support for Amazon Braket Hybrid Jobs.
* `Aws\ChimeSDKMeetings` - Added new APIs for enabling Echo Reduction with Voice Focus.
* `Aws\CloudFormation` - This release include SDK changes for the feature launch of Stack Import to Service Managed StackSet.
* `Aws\Connect` - This release adds support for UpdateContactFlowMetadata, DeleteContactFlow and module APIs. For details, see the Release Notes in the Amazon Connect Administrator Guide.
* `Aws\DatabaseMigrationService` - Added new S3 endpoint settings to allow to convert the current UTC time into a specified time zone when a date partition folder is created. Using with 'DatePartitionedEnabled'.
* `Aws\EKS` - Adding missing exceptions to RegisterCluster operation
* `Aws\ElasticsearchService` - This release adds an optional parameter dry-run for the UpdateElasticsearchDomainConfig API to perform basic validation checks, and detect the deployment type that will be required for the configuration change, without actually applying the change.
* `Aws\FinSpaceData` - Add new APIs for managing Datasets, Changesets, and Dataviews.
* `Aws\QuickSight` - Add support for Exasol data source, 1 click enterprise embedding and email customization.
* `Aws\RDS` - Adds local backup support to Amazon RDS on AWS Outposts.
* `Aws\S3Control` - Added Amazon CloudWatch publishing option for S3 Storage Lens metrics.
* `Aws\SSM` - Adds new parameter to CreateActivation API . This parameter is for "internal use only".
* `Aws\TranscribeStreamingService` - This release adds language identification support for streaming transcription.

## 3.204.2 - 2021-11-19

* `Aws\AppStream` - Includes APIs for managing resources for Elastic fleets: applications, app blocks, and application-fleet associations.
* `Aws\ApplicationInsights` - Application Insights now supports monitoring for HANA
* `Aws\Batch` - Documentation updates for AWS Batch.
* `Aws\CloudFormation` - The StackSets ManagedExecution feature will allow concurrency for non-conflicting StackSet operations and queuing the StackSet operations that conflict at a given time for later execution.
* `Aws\Endpoints` - Fixes exception that some customers were getting with the new fips configuration provider where it couldn't find the is_fips_pseudo_region function
* `Aws\Lambda` - Add support for Lambda Function URLs. Customers can use Function URLs to create built-in HTTPS endpoints on their functions.
* `Aws\LexRuntimeV2` - Now supports styled slots in Lex V2 runtime. Customers can provide inputs like "a as in apple b for beta" which will be resolved to "ab" as slot value.
* `Aws\MediaLive` - This release adds support for specifying a SCTE-35 PID on input. MediaLive now supports SCTE-35 PID selection on inputs containing one or more active SCTE-35 PIDs.
* `Aws\Redshift` - Added support of default IAM role for CreateCluster, RestoreFromClusterSnapshot and ModifyClusterIamRoles APIs

## 3.204.1 - 2021-11-18

* `Aws\AppConfig` - Add Type to support feature flag configuration profiles
* `Aws\AuditManager` - This release introduces a new feature for Audit Manager: Dashboard views. You can now view insights data for your active assessments, and quickly identify non-compliant evidence that needs to be remediated.
* `Aws\Chime` - Adds new Transcribe API parameters to StartMeetingTranscription, including support for content identification and redaction (PII & PHI), partial results stabilization, and custom language models.
* `Aws\ChimeSDKMeetings` - Adds new Transcribe API parameters to StartMeetingTranscription, including support for content identification and redaction (PII & PHI), partial results stabilization, and custom language models.
* `Aws\CloudWatch` - CloudWatch Anomaly Detection now supports anomaly detectors that use metric math as input.
* `Aws\ForecastService` - NEW CreateExplanability API that helps you understand how attributes such as price, promotion, etc. contributes to your forecasted values; NEW CreateAutoPredictor API that trains up to 40% more accurate forecasting model, saves up to 50% of retraining time, and provides model level explainability.
* `Aws\GlueDataBrew` - This SDK release adds the following new features: 1) PII detection in profile jobs, 2) Data quality rules, enabling validation of data quality in profile jobs, 3) SQL query-based datasets for Amazon Redshift and Snowflake data sources, and 4) Connecting DataBrew datasets with Amazon AppFlow flows.
* `Aws\IVS` - Add APIs for retrieving stream session information and support for filtering live streams by health. For more information, see https://docs.aws.amazon.com/ivs/latest/userguide/stream-health.html
* `Aws\Kafka` - Amazon MSK has added a new API that allows you to update the connectivity settings for an existing cluster to enable public accessibility.
* `Aws\Lambda` - Added support for CLIENT_CERTIFICATE_TLS_AUTH and SERVER_ROOT_CA_CERTIFICATE as SourceAccessType for MSK and Kafka event source mappings.
* `Aws\LexModelsV2` - Added support for Polly Neural TTS (NTTS) voices. Customers can choose between 'standard' and 'neural' for Polly Engine configuration per locale when creating or updating an Amazon Lex bot.
* `Aws\RedshiftDataAPIService` - Rolling back Data API serverless features until dependencies are live.

## 3.204.0 - 2021-11-17

* `Aws\APIGateway` - Documentation updates for Amazon API Gateway.
* `Aws\AmplifyBackend` - New APIs to support the Amplify Storage category. Add and manage file storage in your Amplify app backend.
* `Aws\AppConfigData` - AWS AppConfig Data is a new service that allows you to retrieve configuration deployed by AWS AppConfig. See the AppConfig user guide for more details on getting started. https://docs.aws.amazon.com/appconfig/latest/userguide/what-is-appconfig.html
* `Aws\DevOpsGuru` - Add paginator for DescribeResourceCollectionHealth
* `Aws\RedshiftDataAPIService` - Data API now supports serverless requests.
* `Aws\SNS` - Amazon SNS introduces the PublishBatch API, which enables customers to publish up to 10 messages per API request. The new API is valid for Standard and FIFO topics.
* `Aws\drs` - Introducing AWS Elastic Disaster Recovery (AWS DRS), a new service that minimizes downtime and data loss with fast, reliable recovery of on-premises and cloud-based applications using affordable storage, minimal compute, and point-in-time recovery.

## 3.203.1 - 2021-11-16

* `Aws\CloudTrail` - CloudTrail Insights now supports ApiErrorRateInsight, which enables customers to identify unusual activity in their AWS account based on API error codes and their rate.
* `Aws\LocationService` - This release adds the support for Relevance, Distance, Time Zone, Language and Interpolated Address for Geocoding and Reverse Geocoding.

## 3.203.0 - 2021-11-15

* `Aws\AppStream` - This release includes support for images of AmazonLinux2 platform type.
* `Aws\DatabaseMigrationService` - Add Settings in JSON format for the source GCP MySQL endpoint
* `Aws\EC2` - Adds a new VPC Subnet attribute "EnableDns64." When enabled on IPv6 Subnets, the Amazon-Provided DNS Resolver returns synthetic IPv6 addresses for IPv4-only destinations.
* `Aws\EKS` - Adding Tags support to Cluster Registrations.
* `Aws\MigrationHubStrategyRecommendations` - AWS SDK for Migration Hub Strategy Recommendations. It includes APIs to start the portfolio assessment, import portfolio data for assessment, and to retrieve recommendations. For more information, see the AWS Migration Hub documentation at https://docs.aws.amazon.com/migrationhub/index.html
* `Aws\SSM` - Adds support for Session Reason and Max Session Duration for Systems Manager Session Manager.
* `Aws\Transfer` - AWS Transfer Family now supports integrating a custom identity provider using AWS Lambda
* `Aws\WAFV2` - Your options for logging web ACL traffic now include Amazon CloudWatch Logs log groups and Amazon S3 buckets.

## 3.202.2 - 2021-11-12

* `Aws\Connect` - This release adds APIs for creating and managing scheduled tasks. Additionally, adds APIs to describe and update a contact and list associated references.
* `Aws\DevOpsGuru` - Add support for cross account APIs.
* `Aws\EC2` - C6i instances are powered by a third-generation Intel Xeon Scalable processor (Ice Lake) delivering all-core turbo frequency of 3.5 GHz. G5 instances feature up to 8 NVIDIA A10G Tensor Core GPUs and second generation AMD EPYC processors.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added automatic modes for GOP configuration and added the ability to ingest screen recordings generated by Safari on MacOS 12 Monterey.
* `Aws\SSM` - This Patch Manager release supports creating Patch Baselines for RaspberryPi OS (formerly Raspbian)

## 3.202.1 - 2021-11-11

* `Aws\DynamoDB` - Updated Help section for "dynamodb update-contributor-insights" API
* `Aws\EC2` - This release provides an additional route target for the VPC route table.
* `Aws\Translate` - This release enables customers to import Multi-Directional Custom Terminology and use Multi-Directional Custom Terminology in both real-time translation and asynchronous batch translation.

## 3.202.0 - 2021-11-10

* `Aws\Backup` - AWS Backup SDK provides new options when scheduling backups: select supported services and resources that are assigned to a particular tag, linked to a combination of tags, or can be identified by a partial tag value, and exclude resources from their assignments.
* `Aws\ECS` - This release adds support for container instance health.
* `Aws\ResilienceHub` - Initial release of AWS Resilience Hub, a managed service that enables you to define, validate, and track the resilience of your applications on AWS

## 3.201.0 - 2021-11-09

* `Aws\` - Added support for services to add fips and dualstack endpoint information to the endpoints.json file and have it resolve a custom endpoint.
* `Aws\Batch` - Adds support for scheduling policy APIs.
* `Aws\GreengrassV2` - This release adds support for Greengrass core devices running Windows. You can now specify name of a Windows user to run a component.
* `Aws\Health` - Documentation updates for AWS Health.

## 3.200.2 - 2021-11-08

* `Aws\ChimeSDKMeetings` - Updated format validation for ids and regions.
* `Aws\EC2` - This release adds internal validation on the GatewayAssociationState field
* `Aws\SageMaker` - SageMaker CreateEndpoint and UpdateEndpoint APIs now support additional deployment configuration to manage traffic shifting options and automatic rollback monitoring. DescribeEndpoint now shows new in-progress deployment details with stage status.
* `Aws\WAFV2` - You can now configure rules to run a CAPTCHA check against web requests and, as needed, send a CAPTCHA challenge to the client.

## 3.200.1 - 2021-11-05

* `Aws\Api` - Fixed issue where comma delimited unix timestamps could not be parsed
* `Aws\EC2` - DescribeInstances now returns customer-owned IP addresses for instances running on an AWS Outpost.
* `Aws\ResourceGroupsTaggingAPI` - Documentation updates and improvements.
* `Aws\Translate` - This release enable customers to use their own KMS keys to encrypt output files when they submit a batch transform job.

## 3.200.0 - 2021-11-04

* `Aws\ChimeSDKMeetings` - The Amazon Chime SDK Meetings APIs allow software developers to create meetings and attendees for interactive audio, video, screen and content sharing in custom meeting applications which use the Amazon Chime SDK.
* `Aws\Connect` - This release adds CRUD operation support for Security profile resource in Amazon Connect
* `Aws\EC2` - This release adds a new instance replacement strategy for EC2 Fleet, Spot Fleet. Now you can select an action to perform when your instance gets a rebalance notification. EC2 Fleet, Spot Fleet can launch a replacement then terminate the instance that received notification after a termination delay
* `Aws\IoTWireless` - Adding APIs for the FUOTA (firmware update over the air) and multicast for LoRaWAN devices and APIs to support event notification opt-in feature for Sidewalk related events. A few existing APIs need to be modified for this new feature.
* `Aws\SageMaker` - ListDevices and DescribeDevice now show Edge Manager agent version.

## 3.199.10 - 2021-11-03

* `Aws\ConnectParticipant` - This release adds a new boolean attribute - Connect Participant - to the CreateParticipantConnection API, which can be used to mark the participant as connected.
* `Aws\DataSync` - AWS DataSync now supports Hadoop Distributed File System (HDFS) Locations
* `Aws\Macie2` - This release adds support for specifying the severity of findings that a custom data identifier produces, based on the number of occurrences of text that matches the detection criteria.
* `Aws\finspace` - Adds superuser and data-bundle parameters to CreateEnvironment API

## 3.199.9 - 2021-11-02

* `Aws\CloudFront` - CloudFront now supports response headers policies to add HTTP headers to the responses that CloudFront sends to viewers. You can use these policies to add CORS headers, control browser caching, and more, without modifying your origin or writing any code.
* `Aws\Connect` - Amazon Connect Chat now supports real-time message streaming.
* `Aws\NimbleStudio` - Amazon Nimble Studio adds support for users to stop and start streaming sessions.

## 3.199.8 - 2021-11-01

* `Aws\Lightsail` - This release adds support to enable access logging for buckets in the Lightsail object storage service.
* `Aws\Neptune` - Adds support for major version upgrades to ModifyDbCluster API
* `Aws\NetworkManager` - This release adds API support to aggregate resources, routes, and telemetry data across a Global Network.
* `Aws\Rekognition` - This Amazon Rekognition Custom Labels release introduces the management of datasets with projects

## 3.199.7 - 2021-10-29

* `Aws\ApplicationInsights` - Added Monitoring support for SQL Server Failover Cluster Instance. Additionally, added a new API to allow one-click monitoring of containers resources.
* `Aws\Connect` - Amazon Connect Chat now supports real-time message streaming.
* `Aws\EC2` - Support added for AMI sharing with organizations and organizational units in ModifyImageAttribute API
* `Aws\Rekognition` - This release added new attributes to Rekognition Video GetCelebrityRecognition API operations.
* `Aws\TranscribeService` - Transcribe and Transcribe Call Analytics now support automatic language identification along with custom vocabulary, vocabulary filter, custom language model and PII redaction.

## 3.199.6 - 2021-10-28

* `Aws\ConnectParticipant` - This release adds a new boolean attribute - Connect Participant - to the CreateParticipantConnection API, which can be used to mark the participant as connected.
* `Aws\EC2` - Added new read-only DenyAllIGWTraffic network interface attribute. Added support for DL1 24xlarge instances powered by Habana Gaudi Accelerators for deep learning model training workloads
* `Aws\ECS` - Amazon ECS now supports running Fargate tasks on Windows Operating Systems Families which includes Windows Server 2019 Core and Windows Server 2019 Full.
* `Aws\GameLift` - Added support for Arm-based AWS Graviton2 instances, such as M6g, C6g, and R6g.
* `Aws\SSMIncidents` - Updating documentation, adding new field to ConflictException to indicate earliest retry timestamp for some operations, increase maximum length of nextToken fields
* `Aws\SageMaker` - This release adds support for RStudio on SageMaker.

## 3.199.5 - 2021-10-27

* `Aws\AutoScaling` - This release adds support for attribute-based instance type selection, a new EC2 Auto Scaling feature that lets customers express their instance requirements as a set of attributes, such as vCPU, memory, and storage.
* `Aws\Credentials` - Deletes an unused symlink that is breaking some containers.
* `Aws\EC2` - This release adds: attribute-based instance type selection for EC2 Fleet, Spot Fleet, a feature that lets customers express instance requirements as attributes like vCPU, memory, and storage; and Spot placement score, a feature that helps customers identify an optimal location to run Spot workloads.
* `Aws\EKS` - EKS managed node groups now support BOTTLEROCKET_x86_64 and BOTTLEROCKET_ARM_64 AMI types.
* `Aws\SageMaker` - This release allows customers to describe one or more versioned model packages through BatchDescribeModelPackage, update project via UpdateProject, modify and read customer metadata properties using Create, Update and Describe ModelPackage and enables cross account registration of model packages.
* `Aws\Textract` - This release adds support for asynchronously analyzing invoice and receipt documents through two new APIs: StartExpenseAnalysis and GetExpenseAnalysis

## 3.199.4 - 2021-10-26

* `Aws\ChimeSDKIdentity` - The Amazon Chime SDK now supports push notifications through Amazon Pinpoint
* `Aws\ChimeSDKMessaging` - The Amazon Chime SDK now supports push notifications through Amazon Pinpoint
* `Aws\Credentials` - Respect the AWS_PROFILE environment variable when using the default provider chain
* `Aws\EMRContainers` - This feature enables auto-generation of certificate to secure the managed-endpoint and removes the need for customer provided certificate-arn during managed-endpoint setup.

## 3.199.3 - 2021-10-25

* `Aws\AuditManager` - This release introduces a new feature for Audit Manager: Custom framework sharing. You can now share your custom frameworks with another AWS account, or replicate them into another AWS Region under your own account.
* `Aws\EC2` - This release adds support to create a VPN Connection that is not attached to a Gateway at the time of creation. Use this to create VPNs associated with Core Networks, or modify your VPN and attach a gateway using the modify API after creation.
* `Aws\RDS` - This release adds support for Amazon RDS Custom, which is a new RDS management type that gives you full access to your database and operating system. For more information, see https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/rds-custom.html
* `Aws\Route53Resolver` - New API for ResolverConfig, which allows autodefined rules for reverse DNS resolution to be disabled for a VPC

## 3.199.2 - 2021-10-22

* `Aws\` - Fixed bugs that would arise from sending an incorrect content-type header to some services.
* `Aws\AuditManager` - This release introduces character restrictions for ControlSet names. We updated regex patterns for the following attributes: ControlSet, CreateAssessmentFrameworkControlSet, and UpdateAssessmentFrameworkControlSet.
* `Aws\Chime` - Chime VoiceConnector and VoiceConnectorGroup APIs will now return an ARN.
* `Aws\QuickSight` - Added QSearchBar option for GenerateEmbedUrlForRegisteredUser ExperienceConfiguration to support Q search bar embedding

## 3.199.1 - 2021-10-21

* `Aws\Connect` - Released Amazon Connect hours of operation API for general availability (GA). This API also supports AWS CloudFormation. For more information, see Amazon Connect Resource Type Reference in the AWS CloudFormation User Guide.

## 3.199.0 - 2021-10-20

* `Aws\` - Adds support for guzzlehttp/psr7 V2
* `Aws\Appflow` - Feature to add support for JSON-L format for S3 as a source.
* `Aws\DirectConnect` - This release adds 4 new APIS, which needs to be public able
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for specifying caption time delta in milliseconds and the ability to apply color range legalization to source content other than AVC video.
* `Aws\MediaPackage` - When enabled, MediaPackage passes through digital video broadcasting (DVB) subtitles into the output.
* `Aws\MediaPackageVod` - MediaPackage passes through digital video broadcasting (DVB) subtitles into the output.
* `Aws\Panorama` - General availability for AWS Panorama. AWS SDK for Panorama includes APIs to manage your devices and nodes, and deploy computer vision applications to the edge. For more information, see the AWS Panorama documentation at http://docs.aws.amazon.com/panorama
* `Aws\SecurityHub` - Added support for cross-Region finding aggregation, which replicates findings from linked Regions to a single aggregation Region. Added operations to view, enable, update, and delete the finding aggregation.
* `Aws\TranscribeStreamingService` - This release adds custom language support for streaming transcription.

## 3.198.8 - 2021-10-19

* `Aws\ChimeSDKMessaging` - The Amazon Chime SDK now allows developers to execute business logic on in-flight messages before they are delivered to members of a messaging channel with channel flows.
* `Aws\DataExchange` - This release adds support for our public preview of AWS Data Exchange for Amazon Redshift. This enables data providers to list products including AWS Data Exchange datashares for Amazon Redshift, giving subscribers read-only access to provider data in Amazon Redshift.

## 3.198.7 - 2021-10-18

* `Aws\IVS` - Bug fix: remove unsupported maxResults and nextToken pagination parameters from ListTagsForResource
* `Aws\QuickSight` - AWS QuickSight Service Features - Add IP Restriction UI and public APIs support.

## 3.198.6 - 2021-10-15

* `Aws\EFS` - EFS adds documentation for a new exception for short identifiers to be thrown after its migration to long resource identifiers.
* `Aws\Glue` - Enable S3 event base crawler API.

## 3.198.5 - 2021-10-14

* `Aws\AutoScaling` - Amazon EC2 Auto Scaling now supports filtering describe Auto Scaling groups API using tags
* `Aws\ElasticLoadBalancingv2` - Adds new option to filter by availability on each type of load balancer when describing ssl policies.
* `Aws\RoboMaker` - Adding support to GPU simulation jobs as well as non-ROS simulation jobs.
* `Aws\SageMaker` - This release updates the provisioning artifact ID to an optional parameter in CreateProject API. The provisioning artifact ID defaults to the latest provisioning artifact ID of the product if you don't provide one.

## 3.198.4 - 2021-10-13

* `Aws\ConfigService` - Adding Config support for AWS::OpenSearch::Domain
* `Aws\EC2` - This release adds support for additional VPC Flow Logs delivery options to S3, such as Apache Parquet formatted files, Hourly partitions and Hive-compatible S3 prefixes
* `Aws\KinesisAnalyticsV2` - Support for Apache Flink 1.13 in Kinesis Data Analytics. Changed the required status of some Update properties to better fit the corresponding Create properties.
* `Aws\StorageGateway` - Adding support for Audit Logs on NFS shares and Force Closing Files on SMB shares.
* `Aws\WorkMail` - This release adds APIs for adding, removing and retrieving details of mail domains

## 3.198.3 - 2021-10-12

* `Aws\CloudSearch` - Adds an additional validation exception for Amazon CloudSearch configuration APIs for better error handling.
* `Aws\EC2` - EncryptionSupport for InstanceStorageInfo added to DescribeInstanceTypes API
* `Aws\ECS` - Documentation only update to address tickets.
* `Aws\MediaTailor` - MediaTailor now supports ad prefetching.

## 3.198.2 - 2021-10-11

* `Aws\EC2` - Documentation update for Amazon EC2.
* `Aws\ElasticLoadBalancingv2` - Enable support for ALB IPv6 Target Groups (IP Address Type)
* `Aws\FraudDetector` - New model type: Transaction Fraud Insights, which is optimized for online transaction fraud. Stored Events, which allows customers to send and store data directly within Amazon Fraud Detector. Batch Import, which allows customers to upload a CSV file of historic event data for processing and storage
* `Aws\MediaLive` - This release adds support for Transport Stream files as an input type to MediaLive encoders.

## 3.198.1 - 2021-10-08

* `Aws\EC2` - This release removes a requirement for filters on SearchLocalGatewayRoutes operations.
* `Aws\LexModelsV2` - Added configuration support for an Amazon Lex bot to provide fulfillment progress updates to users while their requests are being processed. See documentation for more details: https://docs.aws.amazon.com/lexv2/latest/dg/streaming-progress.html
* `Aws\LexRuntimeV2` - Added configuration support for an Amazon Lex bot to provide fulfillment progress updates to users while their requests are being processed. See documentation for more details: https://docs.aws.amazon.com/lexv2/latest/dg/streaming-progress.html
* `Aws\MediaConvert` - AWS Elemental MediaConvert has added the ability to set account policies which control access restrictions for HTTP, HTTPS, and S3 content sources.
* `Aws\SecretsManager` - Documentation updates for Secrets Manager
* `Aws\SecurityHub` - Added new resource details objects to ASFF, including resources for WAF rate-based rules, EC2 VPC endpoints, ECR repositories, EKS clusters, X-Ray encryption, and OpenSearch domains. Added additional details for CloudFront distributions, CodeBuild projects, ELB V2 load balancers, and S3 buckets.

## 3.198.0 - 2021-10-07

* `Aws\Backup` - Launch of AWS Backup Vault Lock, which protects your backups from malicious and accidental actions, works with existing backup policies, and helps you meet compliance requirements.
* `Aws\Chime` - This release enables customers to configure Chime MediaCapturePipeline via API.
* `Aws\Firehose` - Allow support for Amazon Opensearch Service(successor to Amazon Elasticsearch Service) as a Kinesis Data Firehose delivery destination.
* `Aws\ManagedGrafana` - Initial release of the SDK for Amazon Managed Grafana API.
* `Aws\Schemas` - Removing unused request/response objects.
* `Aws\kendra` - Amazon Kendra now supports indexing and querying documents in different languages.

## 3.197.1 - 2021-10-06

* `Aws\AmplifyBackend` - Adding a new field 'AmplifyFeatureFlags' to the response of the GetBackend operation. It will return a stringified version of the cli.json file for the given Amplify project.
* `Aws\FSx` - This release adds support for Lustre 2.12 to FSx for Lustre.
* `Aws\SageMaker` - This release adds a new TrainingInputMode FastFile for SageMaker Training APIs.
* `Aws\kendra` - Amazon Kendra now supports integration with AWS SSO

## 3.197.0 - 2021-10-05

* `Aws\` - Added support for internal union types, allowing services to specify that exactly one of a number of input options needs to be non null
* `Aws\ApplicationAutoScaling` - With this release, Application Auto Scaling adds support for Amazon Neptune. Customers can now automatically add or remove Read Replicas of their Neptune clusters to keep the average CPU Utilization at the target value specified by the customers.
* `Aws\Backup` - AWS Backup Audit Manager framework report.
* `Aws\EC2` - Released Capacity Reservation Fleet, a feature of Amazon EC2 Capacity Reservations, which provides a way to manage reserved capacity across instance types. For more information: https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/cr-fleets.html
* `Aws\Glue` - This release adds tag as an input of CreateConnection
* `Aws\LocationService` - Add support for PositionFiltering.
* `Aws\WorkMail` - This release allows customers to change their inbound DMARC settings in Amazon WorkMail.

## 3.196.2 - 2021-10-04

* `Aws\CodeBuild` - CodeBuild now allows you to select how batch build statuses are sent to the source provider for a project.
* `Aws\EFS` - EFS adds a new exception for short identifiers to be thrown after its migration to long resource identifiers.
* `Aws\KMS` - Added SDK examples for ConnectCustomKeyStore, CreateCustomKeyStore, CreateKey, DeleteCustomKeyStore, DescribeCustomKeyStores, DisconnectCustomKeyStore, GenerateDataKeyPair, GenerateDataKeyPairWithoutPlaintext, GetPublicKey, ReplicateKey, Sign, UpdateCustomKeyStore and Verify APIs

## 3.196.1 - 2021-10-01

* `Aws\AppRunner` - This release contains several minor bug fixes.
* `Aws\SSM` - When "AutoApprovable" is true for a Change Template, then specifying --auto-approve (boolean) in Start-Change-Request-Execution will create a change request that bypasses approver review. (except for change calendar restrictions)
* `Aws\Synthetics` - CloudWatch Synthetics now enables customers to choose a customer managed AWS KMS key or an Amazon S3-managed key instead of an AWS managed key (default) for the encryption of artifacts that the canary stores in Amazon S3. CloudWatch Synthetics also supports artifact S3 location updation now.

## 3.196.0 - 2021-09-30

* `Aws\Account` - This release of the Account Management API enables customers to manage the alternate contacts for their AWS accounts. For more information, see https://docs.aws.amazon.com/accounts/latest/reference/accounts-welcome.html
* `Aws\CloudControlApi` - Initial release of the SDK for AWS Cloud Control API
* `Aws\DataExchange` - This release enables subscribers to set up automatic exports of newly published revisions using the new EventAction API.
* `Aws\Macie2` - Amazon S3 bucket metadata now indicates whether an error or a bucket's permissions settings prevented Amazon Macie from retrieving data about the bucket or the bucket's objects.
* `Aws\NetworkFirewall` - This release adds support for strict ordering for stateful rule groups. Using strict ordering, stateful rules are evaluated in the exact order in which you provide them.
* `Aws\WorkMail` - This release adds support for mobile device access overrides management in Amazon WorkMail.
* `Aws\WorkSpaces` - Added CreateUpdatedWorkspaceImage API to update WorkSpace images with latest software and drivers. Updated DescribeWorkspaceImages API to display if there are updates available for WorkSpace images.

## 3.195.2 - 2021-09-29

* `Aws\Lambda` - Adds support for Lambda functions powered by AWS Graviton2 processors. Customers can now select the CPU architecture for their functions.
* `Aws\PrometheusService` - This release adds alert manager and rule group namespace APIs
* `Aws\SesV2` - This release includes the ability to use 2048 bits RSA key pairs for DKIM in SES, either with Easy DKIM or Bring Your Own DKIM.

## 3.195.1 - 2021-09-28

* `Aws\Transfer` - Added changes for managed workflows feature APIs.
* `Aws\imagebuilder` - Fix description for AmiDistributionConfiguration Name property, which actually refers to the output AMI name. Also updated for consistent terminology to use "base" image, and another update to fix description text.

## 3.195.0 - 2021-09-27

* `Aws\AppIntegrationsService` - The Amazon AppIntegrations service enables you to configure and reuse connections to external applications.
* `Aws\Connect` - This release updates a set of APIs: CreateIntegrationAssociation, ListIntegrationAssociations, CreateUseCase, and StartOutboundVoiceContact. You can use it to create integrations with Amazon Pinpoint for the Amazon Connect Campaigns use case, Amazon Connect Voice ID, and Amazon Connect Wisdom.
* `Aws\ConnectWisdomService` - Released Amazon Connect Wisdom, a feature of Amazon Connect, which provides real-time recommendations and search functionality in general availability (GA). For more information, see https://docs.aws.amazon.com/wisdom/latest/APIReference/Welcome.html.
* `Aws\ElasticLoadBalancingv2` - Adds new ALB-type target group to facilitate forwarding traffic from NLB to ALB
* `Aws\Pinpoint` - Added support for journey with contact center activity
* `Aws\VoiceID` - Released the Amazon Voice ID SDK, for usage with the Amazon Connect Voice ID feature released for Amazon Connect.

## 3.194.5 - 2021-09-24

* `Aws\EC2` - DescribeInstances now returns Platform Details, Usage Operation, and Usage Operation Update Time.
* `Aws\LicenseManager` - AWS License Manager now allows customers to get the LicenseArn in the Checkout API Response.

## 3.194.4 - 2021-09-23

* `Aws\AppSync` - Documented the new OpenSearchServiceDataSourceConfig data type. Added deprecation notes to the ElasticsearchDataSourceConfig data type.
* `Aws\MediaConvert` - This release adds style and positioning support for caption or subtitle burn-in from rich text sources such as TTML. This release also introduces configurable image-based trick play track generation.
* `Aws\SSM` - Added cutoff behavior support for preventing new task invocations from starting when the maintenance window cutoff time is reached.

## 3.194.3 - 2021-09-22

* `Aws\IAM` - Added changes to OIDC API about not using port numbers in the URL.
* `Aws\LexModelsV2` - This release adds support for utterances statistics for bots built using Lex V2 console and APIs. For details, see: https://docs.aws.amazon.com/lexv2/latest/dg/monitoring-utterances.html
* `Aws\LicenseManager` - AWS License Manager now allows customers to change their Windows Server or SQL license types from Bring-Your-Own-License (BYOL) to License Included or vice-versa (using the customer's media).
* `Aws\MediaPackageVod` - MediaPackage VOD will now return the current processing statuses of an asset's endpoints. The status can be QUEUED, PROCESSING, PLAYABLE, or FAILED.
* `Aws\MediaTailor` - This release adds support to configure logs for playback configuration.
* `Aws\WAFV2` - Added the regex match rule statement, for matching web requests against a single regular expression.
* `Aws\imagebuilder` - This feature adds support for specifying GP3 volume throughput and configuring instance metadata options for instances launched by EC2 Image Builder.

## 3.194.2 - 2021-09-21

* `Aws\Comprehend` - Amazon Comprehend now supports versioning of custom models, improved training with ONE_DOC_PER_FILE text documents for custom entity recognition, ability to provide specific test sets during training, and live migration to new model endpoints.
* `Aws\EC2` - This update adds support for downloading configuration templates using new APIs (GetVpnConnectionDeviceTypes and GetVpnConnectionDeviceSampleConfiguration) and Internet Key Exchange version 2 (IKEv2) parameters for many popular CGW devices.
* `Aws\ECR` - This release adds additional support for repository replication
* `Aws\IoT` - This release adds support for verifying, viewing and filtering AWS IoT Device Defender detect violations with four verification states.
* `Aws\Kafka` - Added StateInfo to ClusterInfo

## 3.194.1 - 2021-09-17

* `Aws\DatabaseMigrationService` - Optional flag force-planned-failover added to reboot-replication-instance API call. This flag can be used to test a planned failover scenario used during some maintenance operations.
* `Aws\ElasticsearchService` - This release adds an optional parameter in the ListDomainNames API to filter domains based on the engine type (OpenSearch/Elasticsearch).
* `Aws\OpenSearchService` - This release adds an optional parameter in the ListDomainNames API to filter domains based on the engine type (OpenSearch/Elasticsearch).

## 3.194.0 - 2021-09-16

* `Aws\KafkaConnect` - This is the initial SDK release for Amazon Managed Streaming for Apache Kafka Connect (MSK Connect).
* `Aws\Macie2` - This release adds support for specifying which managed data identifiers are used by a classification job, and retrieving a list of managed data identifiers that are available.
* `Aws\Pinpoint` - This SDK release adds a new feature for Pinpoint campaigns, in-app messaging.
* `Aws\RoboMaker` - Adding support to create container based Robot and Simulation applications by introducing an environment field
* `Aws\S3` - Add support for access point arn filtering in S3 CW Request Metrics
* `Aws\SageMaker` - Add API for users to retry a failed pipeline execution or resume a stopped one.
* `Aws\TranscribeService` - This release adds support for subtitling with Amazon Transcribe batch jobs.

## 3.193.4 - 2021-09-14

* `Aws\Chime` - Adds support for SipHeaders parameter for CreateSipMediaApplicationCall.
* `Aws\Comprehend` - Amazon Comprehend now allows you to train and run PDF and Word documents for custom entity recognition. With PDF and Word formats, you can extract information from documents containing headers, lists and tables.
* `Aws\EC2` - This release adds support for vt1 3xlarge, 6xlarge and 24xlarge instances powered by Xilinx Alveo U30 Media Accelerators for video transcoding workloads
* `Aws\SageMaker` - This release adds support for "Project Search"
* `Aws\TranscribeStreamingService` - Amazon Transcribe now supports PII Identification and Redaction for streaming transcription.
* `Aws\WAFV2` - This release adds support for including rate based rules in a rule group.

## 3.193.3 - 2021-09-13

* `Aws\EC2` - Adds support for T3 instances on Amazon EC2 Dedicated Hosts.
* `Aws\IoT` - AWS IoT Rules Engine adds OpenSearch action. The OpenSearch rule action lets you stream data from IoT sensors and applications to Amazon OpenSearch Service which is a successor to Amazon Elasticsearch Service.

## 3.193.2 - 2021-09-10

* `Aws\CloudFormation` - Doc only update for CloudFormation that fixes several customer-reported issues.
* `Aws\ECR` - This release updates terminology around KMS keys.
* `Aws\QuickSight` - Add new data source type for Amazon OpenSearch (successor to Amazon ElasticSearch).
* `Aws\RDS` - This release adds support for providing a custom timeout value for finding a scaling point during autoscaling in Aurora Serverless v1.
* `Aws\SageMaker` - This release adds support for "Lifecycle Configurations" to SageMaker Studio
* `Aws\TranscribeService` - This release adds an API option for startTranscriptionJob and startMedicalTranscriptionJob that allows the user to specify encryption context key value pairs for batch jobs.

## 3.193.1 - 2021-09-09

* `Aws\CodeGuruReviewer` - The Amazon CodeGuru Reviewer API now includes the RuleMetadata data object and a Severity attribute on a RecommendationSummary object. A RuleMetadata object contains information about a rule that generates a recommendation. Severity indicates how severe the issue associated with a recommendation is.
* `Aws\EMR` - This release enables customers to login to EMR Studio using AWS Identity and Access Management (IAM) identities or identities in their Identity Provider (IdP) via IAM.
* `Aws\LookoutEquipment` - Added OffCondition parameter to CreateModel API

## 3.193.0 - 2021-09-08

* `Aws\Kafka` - Amazon MSK has added a new API that allows you to update the encrypting and authentication settings for an existing cluster.
* `Aws\OpenSearchService` - Updated Configuration APIs for Amazon OpenSearch Service (successor to Amazon Elasticsearch Service)
* `Aws\RAM` - A minor text-only update that fixes several customer issues.
* `Aws\S3` - Option to overload parameter on multipart copy

## 3.192.1 - 2021-09-07

* `Aws\EKS` - Adding RegisterCluster and DeregisterCluster operations, to support connecting external clusters to EKS.
* `Aws\ElastiCache` - Doc only update for ElastiCache
* `Aws\ForecastService` - Predictor creation now supports selecting an accuracy metric to optimize in AutoML and hyperparameter optimization. This release adds additional accuracy metrics for predictors - AverageWeightedQuantileLoss, MAPE and MASE.
* `Aws\MediaPackage` - SPEKE v2 support for live CMAF packaging type. SPEKE v2 is an upgrade to the existing SPEKE API to support multiple encryption keys, it supports live DASH currently.
* `Aws\PrometheusService` - This release adds tagging support for Amazon Managed Service for Prometheus workspace.
* `Aws\SSMContacts` - Added SDK examples for SSM-Contacts.
* `Aws\XRay` - Updated references to AWS KMS keys and customer managed keys to reflect current terminology.

## 3.192.0 - 2021-09-03

* `Aws\ChimeSDKIdentity` - Documentation updates for Chime
* `Aws\ChimeSDKMessaging` - Documentation updates for Chime
* `Aws\CodeGuruReviewer` - Added support for CodeInconsistencies detectors
* `Aws\FraudDetector` - Enhanced GetEventPrediction API response to include risk scores from imported SageMaker models
* `Aws\Outposts` - This release adds a new API CreateOrder.
* `Aws\S3` - Added support for S3 multi-region access points

## 3.191.10 - 2021-09-02

* `Aws\ACMPCA` - Private Certificate Authority Service now allows customers to enable an online certificate status protocol (OCSP) responder service on their private certificate authorities. Customers can also optionally configure a custom CNAME for their OCSP responder.
* `Aws\AccessAnalyzer` - Updates service API, documentation, and paginators to support multi-region access points from Amazon S3.
* `Aws\EBS` - Documentation updates for Amazon EBS direct APIs.
* `Aws\EFS` - Adds support for EFS Intelligent-Tiering, which uses EFS Lifecycle Management to monitor file access patterns and is designed to automatically transition files to and from your corresponding Infrequent Access (IA) storage classes.
* `Aws\FSx` - Announcing Amazon FSx for NetApp ONTAP, a new service that provides fully managed shared storage in the AWS Cloud with the data access and management capabilities of ONTAP.
* `Aws\LexModelBuildingService` - Lex now supports Korean (ko-KR) locale.
* `Aws\QuickSight` - This release adds support for referencing parent datasets as sources in a child dataset.
* `Aws\S3Control` - S3 Multi-Region Access Points provide a single global endpoint to access a data set that spans multiple S3 buckets in different AWS Regions.
* `Aws\Schemas` - This update include the support for Schema Discoverer to discover the events sent to the bus from another account. The feature will be enabled by default when discoverer is created or updated but can also be opt-in or opt-out by specifying the value for crossAccount.
* `Aws\SecurityHub` - New ASFF Resources: AwsAutoScalingLaunchConfiguration, AwsEc2VpnConnection, AwsEcrContainerImage. Added KeyRotationStatus to AwsKmsKey. Added AccessControlList, BucketLoggingConfiguration,BucketNotificationConfiguration and BucketNotificationConfiguration to AwsS3Bucket.
* `Aws\Transfer` - AWS Transfer Family introduces Managed Workflows for creating, executing, monitoring, and standardizing post file transfer processing

## 3.191.9 - 2021-09-01

* `Aws\AppRegistry` - Introduction of GetAssociatedResource API and GetApplication response extension for Resource Groups support.
* `Aws\CloudTrail` - Documentation updates for CloudTrail
* `Aws\ConfigService` - Documentation updates for config
* `Aws\EC2` - Added LaunchTemplate support for the IMDS IPv6 endpoint
* `Aws\MediaTailor` - This release adds support for wall clock programs in LINEAR channels.

## 3.191.8 - 2021-08-31

* `Aws\ComputeOptimizer` - Documentation updates for Compute Optimizer
* `Aws\IoT` - Added Create/Update/Delete/Describe/List APIs for a new IoT resource named FleetMetric. Added a new Fleet Indexing query API named GetBucketsAggregation. Added a new field named DisconnectedReason in Fleet Indexing query response. Updated their related documentations.
* `Aws\MemoryDB` - Documentation updates for MemoryDB
* `Aws\Polly` - Amazon Polly adds new South African English voice - Ayanda. Ayanda is available as Neural voice only.
* `Aws\SQS` - Amazon SQS adds a new queue attribute, RedriveAllowPolicy, which includes the dead-letter queue redrive permission parameters. It defines which source queues can specify dead-letter queues as a JSON object.

## 3.191.7 - 2021-08-30

* `Aws\CloudFormation` - AWS CloudFormation allows you to iteratively develop your applications when failures are encountered without rolling back successfully provisioned resources. By specifying stack failure options, you can troubleshoot resources in a CREATE_FAILED or UPDATE_FAILED status.
* `Aws\CodeBuild` - Documentation updates for CodeBuild
* `Aws\Firehose` - This release adds the Dynamic Partitioning feature to Kinesis Data Firehose service for S3 destinations.
* `Aws\KMS` - This release has changes to KMS nomenclature to remove the word master from both the "Customer master key" and "CMK" abbreviation and replace those naming conventions with "KMS key".

## 3.191.6 - 2021-08-27

* `Aws\EC2` - This release adds the BootMode flag to the ImportImage API and showing the detected BootMode of an ImportImage task.
* `Aws\EMR` - Amazon EMR now supports auto-terminating idle EMR clusters. You can specify the idle timeout value when enabling auto-termination for both running and new clusters and Amazon EMR automatically terminates the cluster when idle timeout kicks in.
* `Aws\S3` - Documentation updates for Amazon S3.

## 3.191.5 - 2021-08-26

* `Aws\ComputeOptimizer` - Adds support for 1) the AWS Graviton (AWS_ARM64) recommendation preference for Amazon EC2 instance and Auto Scaling group recommendations, and 2) the ability to get the enrollment statuses for all member accounts of an organization.
* `Aws\EC2` - Support added for resizing VPC prefix lists
* `Aws\Rekognition` - This release added new attributes to Rekognition RecognizeCelebities and GetCelebrityInfo API operations.
* `Aws\TranscribeService` - This release adds support for batch transcription in six new languages - Afrikaans, Danish, Mandarin Chinese (Taiwan), New Zealand English, South African English, and Thai.

## 3.191.4 - 2021-08-25

* `Aws\CloudWatchEvents` - AWS CWEvents adds an enum of EXTERNAL for EcsParameters LaunchType for PutTargets API
* `Aws\DataSync` - Added include filters to CreateTask and UpdateTask, and added exclude filters to StartTaskExecution, giving customers more granular control over how DataSync transfers files, folders, and objects.
* `Aws\EC2` - Support added for IMDS IPv6 endpoint
* `Aws\EventBridge` - AWS EventBridge adds an enum of EXTERNAL for EcsParameters LaunchType for PutTargets API
* `Aws\FMS` - AWS Firewall Manager now supports triggering resource cleanup workflow when account or resource goes out of policy scope for AWS WAF, Security group, AWS Network Firewall, and Amazon Route 53 Resolver DNS Firewall policies.

## 3.191.3 - 2021-08-24

* `Aws\IoTDataPlane` - Updated Publish with support for new Retain flag and added two new API operations: GetRetainedMessage, ListRetainedMessages.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added MBAFF encoding support for AVC video and the ability to pass encryption context from the job settings to S3.
* `Aws\Polly` - Amazon Polly adds new New Zealand English voice - Aria. Aria is available as Neural voice only.
* `Aws\SSM` - Updated Parameter Store property for logging improvements.
* `Aws\TranscribeService` - This release adds support for feature tagging with Amazon Transcribe batch jobs.

## 3.191.2 - 2021-08-23

* `Aws\APIGateway` - Adding some of the pending releases (1) Adding WAF Filter to GatewayResponseType enum (2) Ensuring consistent error model for all operations (3) Add missing BRE to GetVpcLink operation
* `Aws\Backup` - AWS Backup - Features: Evaluate your backup activity and generate audit reports.
* `Aws\DLM` - Added AMI deprecation support for Amazon Data Lifecycle Manager EBS-backed AMI policies.
* `Aws\DatabaseMigrationService` - Amazon AWS DMS service now support Redis target endpoint migration. Now S3 endpoint setting is capable to setup features which are used to be configurable only in extract connection attributes.
* `Aws\FraudDetector` - Updated an element of the DescribeModelVersion API response (LogitMetrics -> logOddsMetrics) for clarity. Added new exceptions to several APIs to protect against unlikely scenarios.
* `Aws\Glue` - Add support for Custom Blueprints
* `Aws\IoTSiteWise` - Documentation updates for AWS IoT SiteWise

## 3.191.1 - 2021-08-20

* `Aws\Comprehend` - Add tagging support for Comprehend async inference job.
* `Aws\EC2` - encryptionInTransitSupported added to DescribeInstanceTypes API
* `Aws\EKS` - Adds support for EKS add-ons "preserve" flag, which allows customers to maintain software on their EKS clusters after removing it from EKS add-ons management.
* `Aws\RoboMaker` - Documentation updates for RoboMaker

## 3.191.0 - 2021-08-19

* `Aws\Appflow` - This release adds support for SAPOData connector and extends Veeva connector for document extraction.
* `Aws\ApplicationAutoScaling` - This release extends Application Auto Scaling support for replication group of Amazon ElastiCache Redis clusters. Auto Scaling monitors and automatically expands node group count and number of replicas per node group when a critical usage threshold is met or according to customer-defined schedule.
* `Aws\EC2` - The ImportImage API now supports the ability to create AMIs with AWS-managed licenses for Microsoft SQL Server for both Windows and Linux.
* `Aws\MemoryDB` - AWS MemoryDB SDK now supports all APIs for newly launched MemoryDB service.

## 3.190.5 - 2021-08-18

* `Aws\CodeBuild` - CodeBuild now allows you to make the build results for your build projects available to the public without requiring access to an AWS account.
* `Aws\Route53` - Documentation updates for route53
* `Aws\Route53Resolver` - Documentation updates for Route 53 Resolver
* `Aws\SageMaker` - Amazon SageMaker now supports Asynchronous Inference endpoints. Adds PlatformIdentifier field that allows Notebook Instance creation with different platform selections. Increases the maximum number of containers in multi-container endpoints to 15. Adds more instance types to InstanceType field.
* `Aws\SageMakerRuntime` - Amazon SageMaker Runtime now supports InvokeEndpointAsync to asynchronously invoke endpoints that were created with the AsyncInferenceConfig object in the EndpointConfig. Asynchronous invocations support larger payload sizes in Amazon S3 and longer processing times.

## 3.190.4 - 2021-08-17

* `Aws\Cloud9` - Added DryRun parameter to CreateEnvironmentEC2 API. Added ManagedCredentialsActions parameter to UpdateEnvironment API
* `Aws\CloudDirectory` - Documentation updates for clouddirectory
* `Aws\CloudWatchLogs` - Documentation-only update for CloudWatch Logs
* `Aws\CostExplorer` - This release is a new feature for Cost Categories: Split charge rules. Split charge rules enable you to allocate shared costs between your cost category values.
* `Aws\EC2` - This release adds support for EC2 ED25519 key pairs for authentication

## 3.190.3 - 2021-08-16

* `Aws\CodeBuild` - CodeBuild now allows you to select how batch build statuses are sent to the source provider for a project.
* `Aws\ConfigService` - Update ResourceType enum with values for Backup Plan, Selection, Vault, RecoveryPoint; ECS Cluster, Service, TaskDefinition; EFS AccessPoint, FileSystem; EKS Cluster; ECR Repository resources
* `Aws\DirectoryService` - This release adds support for describing client authentication settings.
* `Aws\IoTSiteWise` - AWS IoT SiteWise added query window for the interpolation interval. AWS IoT SiteWise computes each interpolated value by using data points from the timestamp of each interval minus the window to the timestamp of each interval plus the window.
* `Aws\LicenseManager` - AWS License Manager now allows end users to call CheckoutLicense API using new CheckoutType PERPETUAL. Perpetual checkouts allow sellers to check out a quantity of entitlements to be drawn down for consumption.
* `Aws\S3` - Documentation updates for Amazon S3

## 3.190.2 - 2021-08-13

* `Aws\CustomerProfiles` - This release introduces Standard Profile Objects, namely Asset and Case which contain values populated by data from third party systems and belong to a specific profile. This release adds an optional parameter, ObjectFilter to the ListProfileObjects API in order to search for these Standard Objects.
* `Aws\EMR` - Amazon EMR customers can now specify custom AMIs at the instance level in their clusters. This allows using custom AMIs in clusters that have instances with different instruction set architectures, e.g. m5.xlarge (x86) and m6g.xlarge (ARM).
* `Aws\ElastiCache` - This release adds ReplicationGroupCreateTime field to ReplicationGroup which indicates the UTC time when ElastiCache ReplicationGroup is created
* `Aws\QuickSight` - Documentation updates for QuickSight.

## 3.190.1 - 2021-08-12

* `Aws\APIGateway` - Adding support for ACM imported or private CA certificates for mTLS enabled domain names
* `Aws\ApiGatewayV2` - Adding support for ACM imported or private CA certificates for mTLS enabled domain names
* `Aws\GlueDataBrew` - This SDK release adds support for the output of a recipe job results to Tableau Hyper format.
* `Aws\Lambda` - Lambda Python 3.9 runtime launch
* `Aws\SageMaker` - Amazon SageMaker Autopilot adds new metrics for all candidate models generated by Autopilot experiments.

## 3.190.0 - 2021-08-11

* `Aws\CodeBuild` - CodeBuild now allows you to make the build results for your build projects available to the public without requiring access to an AWS account.
* `Aws\EBS` - Documentation updates for Amazon EBS direct APIs.
* `Aws\ECS` - Documentation updates for ECS.
* `Aws\NimbleStudio` - Add new attribute 'ownedBy' in Streaming Session APIs. 'ownedBy' represents the AWS SSO Identity Store User ID of the owner of the Streaming Session resource.
* `Aws\Route53` - Documentation updates for route53
* `Aws\SnowDeviceManagement` - AWS Snow Family customers can remotely monitor and operate their connected AWS Snowcone devices.

## 3.189.0 - 2021-08-10

* `Aws\` - Enable support for internal document model types to allow the sending of raw json directly to services
* `Aws\Chime` - Add support for "auto" in Region field of StartMeetingTranscription API request.

## 3.188.1 - 2021-08-09

* `Aws\Rekognition` - This release adds support for four new types of segments (opening credits, content segments, slates, and studio logos), improved accuracy for credits and shot detection and new filters to control black frame detection.
* `Aws\SSM` - Documentation updates for AWS Systems Manager.
* `Aws\WAFV2` - This release adds APIs to support versioning feature of AWS WAF Managed rule groups

## 3.188.0 - 2021-08-06

* `Aws\Athena` - Documentation updates for Athena.
* `Aws\ChimeSDKIdentity` - The Amazon Chime SDK Identity APIs allow software developers to create and manage unique instances of their messaging applications.
* `Aws\ChimeSDKMessaging` - The Amazon Chime SDK Messaging APIs allow software developers to send and receive messages in custom messaging applications.
* `Aws\Connect` - This release adds support for agent status and hours of operation. For details, see the Release Notes in the Amazon Connect Administrator Guide.
* `Aws\Lightsail` - This release adds support to track when a bucket access key was last used.
* `Aws\Synthetics` - Documentation updates for Visual Monitoring feature and other doc ticket fixes.

## 3.187.3 - 2021-08-05

* `Aws\AutoScaling` - EC2 Auto Scaling adds configuration checks and Launch Template validation to Instance Refresh.
* `Aws\LexModelsV2` - Customers can now toggle the active field on prompts and responses.

## 3.187.2 - 2021-08-04

* `Aws\EventBridge` - Documentation updates to add EC2 Image Builder as a target on PutTargets.
* `Aws\RDS` - This release adds AutomaticRestartTime to the DescribeDBInstances and DescribeDBClusters operations. AutomaticRestartTime indicates the time when a stopped DB instance or DB cluster is restarted automatically.
* `Aws\SSMIncidents` - Documentation updates for Incident Manager.
* `Aws\TranscribeService` - This release adds support for call analytics (batch) within Amazon Transcribe.
* `Aws\imagebuilder` - Updated list actions to include a list of valid filters that can be used in the request.

## 3.187.1 - 2021-08-04

* `Aws\` - Instance Profile Provider now has new input for IP version, taking IPv4 or IPv6.  Default behavior hasn't changed, but new defaults if IPv6 is explicitly enabled.
* `Aws\Glue` - Add ConcurrentModificationException to create-table, delete-table, create-database, update-database, delete-database
* `Aws\IoTSiteWise` - My AWS Service (placeholder) - This release introduces custom Intervals and offset for tumbling window in metric for AWS IoT SiteWise.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added control over the passthrough of XDS captions metadata to outputs.
* `Aws\Proton` - Docs only add idempotent create apis
* `Aws\Redshift` - API support for Redshift Data Sharing feature.

## 3.186.4 - 2021-08-02

* `Aws\GreengrassV2` - This release adds support for component system resource limits and idempotent Create operations. You can now specify the maximum amount of CPU and memory resources that each component can use.
* `Aws\SSMContacts` - Added new attribute in AcceptCode API. AcceptCodeValidation takes in two values - ENFORCE, IGNORE. ENFORCE forces validation of accept code and IGNORE ignores it which is also the default behavior; Corrected TagKeyList length from 200 to 50

## 3.186.3 - 2021-07-30

* `Aws\AppSync` - AWS AppSync now supports a new authorization mode allowing you to define your own authorization logic using an AWS Lambda function.
* `Aws\ElasticLoadBalancingv2` - Client Port Preservation ALB Attribute Launch
* `Aws\SageMaker` - API changes with respect to Lambda steps in model building pipelines. Adds several waiters to async Sagemaker Image APIs. Add more instance types to AppInstanceType field
* `Aws\SecretsManager` - Add support for KmsKeyIds in the ListSecretVersionIds API response

## 3.186.2 - 2021-07-29

* `Aws\Chime` - Adds support for live transcription of meetings with Amazon Transcribe and Amazon Transcribe Medical. The new APIs, StartMeetingTranscription and StopMeetingTranscription, control the generation of user-attributed transcriptions sent to meeting clients via Amazon Chime SDK data messages.
* `Aws\EC2` - This release adds support for G4ad xlarge and 2xlarge instances powered by AMD Radeon Pro V520 GPUs and AMD 2nd Generation EPYC processors
* `Aws\IoT` - Increase maximum credential duration of role alias to 12 hours.
* `Aws\IoTSiteWise` - Added support for AWS IoT SiteWise Edge. You can now create an AWS IoT SiteWise gateway that runs on AWS IoT Greengrass V2. With the gateway, you can collect local server and equipment data, process the data, and export the selected data from the edge to the AWS Cloud.
* `Aws\SavingsPlans` - Documentation update for valid Savings Plans offering ID pattern

## 3.186.1 - 2021-07-28

* `Aws\CloudFormation` - SDK update to support Importing existing Stacks to new/existing Self Managed StackSet - Stack Import feature.
* `Aws\SSOAdmin` - Documentation updates for arn:aws:trebuchet:::service:v1:03a2216d-1cda-4696-9ece-1387cb6f6952

## 3.186.0 - 2021-07-27

* `Aws\Batch` - Add support for ListJob filters
* `Aws\IoTAnalytics` - IoT Analytics now supports creating a dataset resource with IoT SiteWise MultiLayerStorage data stores, enabling customers to query industrial data within the service. This release includes adding JOIN functionality for customers to query multiple data sources in a dataset.
* `Aws\IoTWireless` - Add SidewalkManufacturingSn as an identifier to allow Customer to query WirelessDevice, in the response, AmazonId is added in the case that Sidewalk device is return.
* `Aws\LexModelsV2` - Add waiters that automatically poll for resource status for asynchronous operations, such as building a bot
* `Aws\QuickSight` - Add support to use row-level security with tags when embedding dashboards for users not provisioned in QuickSight
* `Aws\RedshiftDataAPIService` - Added structures to support new Data API operation BatchExecuteStatement, used to execute multiple SQL statements within a single transaction.
* `Aws\Route53` - This release adds support for the RECOVERY_CONTROL health check type to be used in conjunction with Route53 Application Recovery Controller.
* `Aws\Route53RecoveryCluster` - Amazon Route 53 Application Recovery Controller's routing control - Routing Control Data Plane APIs help you update the state (On/Off) of the routing controls to reroute traffic across application replicas in a 100% available manner.
* `Aws\Route53RecoveryControlConfig` - Amazon Route 53 Application Recovery Controller's routing control - Routing Control Configuration APIs help you create and delete clusters, control panels, routing controls and safety rules. State changes (On/Off) of routing controls are not part of configuration APIs.
* `Aws\Route53RecoveryReadiness` - Amazon Route 53 Application Recovery Controller's readiness check capability continually monitors resource quotas, capacity, and network routing policies to ensure that the recovery environment is scaled and configured to take over when needed.
* `Aws\Shield` - Change name of DDoS Response Team (DRT) to Shield Response Team (SRT)

## 3.185.21 - 2021-07-26

* `Aws\CloudWatch` - SDK update to support creation of Cross-Account Metric Alarms and update API documentation.
* `Aws\IdentityStore` - Documentation updates for SSO API Ref.
* `Aws\Proton` - Documentation-only update links
* `Aws\S3Control` - S3 Access Point aliases can be used anywhere you use S3 bucket names to access data in S3
* `Aws\Synthetics` - CloudWatch Synthetics now supports visual testing in its canaries.
* `Aws\Textract` - Adds support for AnalyzeExpense, a new API to extract relevant data such as contact information, items purchased, and vendor name, from almost any invoice or receipt without the need for any templates or configuration.

## 3.185.20 - 2021-07-23

* `Aws\S3Outposts` - Add on-premise access type support for endpoints
* `Aws\SecurityHub` - Added product name, company name, and Region fields for security findings. Added details objects for RDS event subscriptions and AWS ECS services. Added fields to the details for AWS Elasticsearch domains.
* `Aws\imagebuilder` - Update to documentation to reapply missing change to SSM uninstall switch default value and improve description.

## 3.185.19 - 2021-07-22

* `Aws\EC2` - This release allows customers to assign prefixes to their elastic network interface and to reserve IP blocks in their subnet CIDRs. These reserved blocks can be used to assign prefixes to elastic network interfaces or be excluded from auto-assignment.
* `Aws\ElasticLoadBalancingv2` - Adds support for enabling TLS protocol version and cipher suite headers to be sent to backend targets for Application Load Balancers.
* `Aws\GlueDataBrew` - This SDK release adds two new features: 1) Output to Native JDBC destinations and 2) Adding configurations to profile jobs
* `Aws\MediaLive` - MediaLive now supports passing through style data on WebVTT caption outputs.
* `Aws\QLDB` - Amazon QLDB now supports ledgers encrypted with customer managed KMS keys. Changes in CreateLedger, UpdateLedger and DescribeLedger APIs to support the changes.
* `Aws\S3Control` - Documentation updates for Amazon S3-control

## 3.185.18 - 2021-07-21

* `Aws\CodeBuild` - AWS CodeBuild now allows you to set the access permissions for build artifacts, project artifacts, and log files that are uploaded to an Amazon S3 bucket that is owned by another account.
* `Aws\EMR` - EMR now supports new DescribeReleaseLabel and ListReleaseLabel APIs. They can provide Amazon EMR release label details. You can programmatically list available releases and applications for a specific Amazon EMR release label.
* `Aws\ElasticLoadBalancingv2` - Adds support for enabling TLS protocol version and cipher suite headers to be sent to backend targets for Application Load Balancers.
* `Aws\IAM` - Documentation updates for AWS Identity and Access Management (IAM).
* `Aws\Lambda` - New ResourceConflictException error code for PutFunctionEventInvokeConfig, UpdateFunctionEventInvokeConfig, and DeleteFunctionEventInvokeConfig operations.
* `Aws\Personalize` - My AWS Service (placeholder) - Making minProvisionedTPS an optional parameter when creating a campaign. If not provided, it defaults to 1.
* `Aws\Proton` - Documentation updates for AWS Proton
* `Aws\RDS` - Adds the OriginalSnapshotCreateTime field to the DBSnapshot response object. This field timestamps the underlying data of a snapshot and doesn't change when the snapshot is copied.
* `Aws\kendra` - Amazon Kendra now provides a data source connector for Amazon WorkDocs. For more information, see https://docs.aws.amazon.com/kendra/latest/dg/data-source-workdocs.html

## 3.185.17 - 2021-07-20

* `Aws\ComputeOptimizer` - Documentation updates for Compute Optimizer
* `Aws\EC2` - Added idempotency to the CreateVolume API using the ClientToken request parameter

## 3.185.16 - 2021-07-19

* `Aws\DirectConnect` - Documentation updates for directconnect
* `Aws\EMRContainers` - Updated DescribeManagedEndpoint and ListManagedEndpoints to return failureReason and stateDetails in API response.
* `Aws\Health` - In the Health API, the maximum number of entities for the EventFilter and EntityFilter data types has changed from 100 to 99. This change is related to an internal optimization of the AWS Health service.
* `Aws\LocationService` - Add five new API operations: UpdateGeofenceCollection, UpdateMap, UpdatePlaceIndex, UpdateRouteCalculator, UpdateTracker.
* `Aws\RoboMaker` - This release allows customers to create a new version of WorldTemplates with support for Doors.
* `Aws\imagebuilder` - Documentation updates for reversal of default value for additional instance configuration SSM switch, plus improved descriptions for semantic versioning.

## 3.185.15 - 2021-07-16

* `Aws\AppIntegrationsService` - Documentation update for AppIntegrations Service
* `Aws\AuditManager` - This release relaxes the S3 URL character restrictions in AWS Audit Manager. Regex patterns have been updated for the following attributes: s3RelativePath, destination, and s3ResourcePath. 'AWS' terms have also been replaced with entities to align with China Rebrand documentation efforts.
* `Aws\Chime` - This SDK release adds Account Status as one of the attributes in Account API response

## 3.185.14 - 2021-07-15

* `Aws\CognitoIdentityProvider` - Documentation updates for cognito-idp
* `Aws\EC2` - This feature enables customers to specify weekly recurring time window(s) for scheduled events that reboot, stop or terminate EC2 instances.
* `Aws\ECS` - Documentation updates for support of awsvpc mode on Windows.
* `Aws\Endpoint` - Fixed bug where the wrong endpoint was being generated for FIPS endpoints with object lambdas
* `Aws\IoTSiteWise` - Update the default endpoint for the APIs used to manage asset models, assets, gateways, tags, and account configurations. If you have firewalls with strict egress rules, configure the rules to grant you access to api.iotsitewise.[region].amazonaws.com or api.iotsitewise.[cn-region].amazonaws.com.cn.
* `Aws\LexModelBuildingService` - Lex now supports the en-IN locale

## 3.185.13 - 2021-07-14

* `Aws\ACM` - Added support for RSA 3072 SSL certificate import
* `Aws\DatabaseMigrationService` - Release of feature needed for ECA-Endpoint settings. This allows customer to delete a field in endpoint settings by using --exact-settings flag in modify-endpoint api. This also displays default values for certain required fields of endpoint settings in describe-endpoint-settings api.
* `Aws\Glue` - Add support for Event Driven Workflows
* `Aws\HealthLake` - General availability for Amazon HealthLake. StartFHIRImportJob and StartFHIRExportJob APIs now require AWS KMS parameter. For more information, see the Amazon HealthLake Documentation https://docs.aws.amazon.com/healthlake/index.html.
* `Aws\Lightsail` - This release adds support for the Amazon Lightsail object storage service, which allows you to create buckets and store objects.
* `Aws\WellArchitected` - This update provides support for Well-Architected API users to mark answer choices as not applicable.

## 3.185.12 - 2021-07-13

* `Aws\` - Removes a broken smoke test for device farms
* `Aws\AmplifyBackend` - Added Sign in with Apple OAuth provider.
* `Aws\DevOpsGuru` - Add paginator for GetCostEstimation
* `Aws\DirectConnect` - This release adds a new filed named awsLogicalDeviceId that it displays the AWS Direct Connect endpoint which terminates a physical connection's BGP Sessions.
* `Aws\LexModelBuildingService` - Customers can now migrate bots built with Lex V1 APIs to V2 APIs. This release adds APIs to initiate and manage the migration of a bot.
* `Aws\Pricing` - Documentation updates for api.pricing
* `Aws\Redshift` - Release new APIs to support new Redshift feature - Authentication Profile
* `Aws\SSM` - Changes to OpsCenter APIs to support a new feature, operational insights.

## 3.185.11 - 2021-07-12

* `Aws\EKS` - Documentation updates for Wesley to support the parallel node upgrade feature.
* `Aws\kendra` - Amazon Kendra now supports Principal Store

## 3.185.10 - 2021-07-09

* `Aws\FraudDetector` - This release adds support for ML Explainability to display model variable importance value in Amazon Fraud Detector.
* `Aws\MediaConvert` - MediaConvert now supports color, style and position information passthrough from 608 and Teletext to SRT and WebVTT subtitles. MediaConvert now also supports Automatic QVBR quality levels for QVBR RateControlMode.
* `Aws\SageMaker` - Releasing new APIs related to Tuning steps in model building pipelines.

## 3.185.9 - 2021-07-08

* `Aws\DevOpsGuru` - Add AnomalyReportedTimeRange field to include open and close time of anomalies.
* `Aws\EKS` - Added waiters for EKS FargateProfiles.
* `Aws\FMS` - AWS Firewall Manager now supports route table monitoring, and provides remediation action recommendations to security administrators for AWS Network Firewall policies with misconfigured routes.
* `Aws\MediaTailor` - Add ListAlerts for Channel, Program, Source Location, and VOD Source to return alerts for resources.
* `Aws\Outposts` - Added property filters for listOutposts
* `Aws\SSMContacts` - Updated description for CreateContactChannel contactId.

## 3.185.8 - 2021-07-07

* `Aws\Chime` - Releasing new APIs for AWS Chime MediaCapturePipeline
* `Aws\CloudFront` - Amazon CloudFront now provides two new APIs, ListConflictingAliases and AssociateAlias, that help locate and move Alternate Domain Names (CNAMEs) if you encounter the CNAMEAlreadyExists error code.
* `Aws\EC2` - This release adds resource ids and tagging support for VPC security group rules.
* `Aws\IAM` - Documentation updates for AWS Identity and Access Management (IAM).
* `Aws\IoTSiteWise` - This release add storage configuration APIs for AWS IoT SiteWise.
* `Aws\MQ` - adds support for modifying the maintenance window for brokers.
* `Aws\STS` - Documentation updates for AWS Security Token Service.
* `Aws\StorageGateway` - Adding support for oplocks for SMB file shares, S3 Access Point and S3 Private Link for all file shares and IP address support for file system associations

## 3.185.7 - 2021-07-06

* `Aws\EKS` - Adding new error code UnsupportedAddonModification for Addons in EKS
* `Aws\Lambda` - Added support for AmazonMQRabbitMQ as an event source. Added support for VIRTUAL_HOST as SourceAccessType for streams event source mappings.
* `Aws\Macie2` - Sensitive data findings in Amazon Macie now include enhanced location data for JSON and JSON Lines files
* `Aws\SNS` - Documentation updates for Amazon SNS.
* `Aws\imagebuilder` - Adds support for specifying parameters to customize components for recipes. Expands configuration of the Amazon EC2 instances that are used for building and testing images, including the ability to specify commands to run on launch, and more control over installation and removal of the SSM agent.
* `Aws\mgn` - Bug fix: Remove not supported EBS encryption type "NONE"

## 3.185.6 - 2021-07-02

* `Aws\EC2` - This release removes network-insights-boundary
* `Aws\ElasticLoadBalancingv2` - Documentation updates for elasticloadbalancingv2

## 3.185.5 - 2021-07-01

* `Aws\EC2` - Adding a new reserved field to support future infrastructure improvements for Amazon EC2 Fleet.
* `Aws\SQS` - Documentation updates for Amazon SQS.
* `Aws\SageMaker` - SageMaker model registry now supports up to 5 containers and associated environment variables.

## 3.185.4 - 2021-06-30

* `Aws\AutoScaling` - Amazon EC2 Auto Scaling infrastructure improvements and optimizations.
* `Aws\GlueDataBrew` - Adds support for the output of job results to the AWS Glue Data Catalog.
* `Aws\MediaPackageVod` - Add support for Widevine DRM on CMAF packaging configurations. Both Widevine and FairPlay DRMs can now be used simultaneously, with CBCS encryption.
* `Aws\SSMContacts` - Fixes the tag key length range to 128 chars, tag value length to 256 chars; Adds support for UTF-8 chars for contact and channel names, Allows users to unset name in UpdateContact API; Adds throttling exception to StopEngagement API, validation exception to APIs UntagResource, ListTagsForResource
* `Aws\ServiceDiscovery` - AWS Cloud Map now allows configuring the TTL of the SOA record for a hosted zone to control the negative caching for new services.
* `Aws\kendra` - Amazon Kendra Enterprise Edition now offered in smaller more granular units to enable customers with smaller workloads. Virtual Storage Capacity units now offer scaling in increments of 100,000 documents (up to 30GB) per unit and Virtual Query Units offer scaling increments of 8,000 queries per day.

## 3.185.3 - 2021-06-28

* `Aws\Glue` - Add JSON Support for Glue Schema Registry
* `Aws\MediaConvert` - MediaConvert adds support for HDR10+, ProRes 4444, and XAVC outputs, ADM/DAMF support for Dolby Atmos ingest, and alternative audio and WebVTT caption ingest via HLS inputs. MediaConvert also now supports creating trickplay outputs for Roku devices for HLS, CMAF, and DASH output groups.
* `Aws\Redshift` - Added InvalidClusterStateFault to the DisableLogging API, thrown when calling the API on a non available cluster.
* `Aws\SageMaker` - Sagemaker Neo now supports running compilation jobs using customer's Amazon VPC

## 3.185.2 - 2021-06-25

* `Aws\AmplifyBackend` - Imports an existing backend authentication resource.
* `Aws\Proton` - Added waiters for template registration, service operations, and environment deployments.
* `Aws\Snowball` - AWS Snow Family customers can remotely monitor and operate their connected AWS Snowcone devices. AWS Snowball Edge Storage Optimized customers can now import and export their data using NFS.

## 3.185.1 - 2021-06-24

* `Aws\Chime` - Adds EventIngestionUrl field to MediaPlacement
* `Aws\Cloud9` - Minor update to AWS Cloud9 documentation to allow correct parsing of outputted text
* `Aws\CodeBuild` - BucketOwnerAccess is currently not supported
* `Aws\Connect` - Released Amazon Connect quick connects management API for general availability (GA). For more information, see https://docs.aws.amazon.com/connect/latest/APIReference/Welcome.html
* `Aws\DAX` - Add support for encryption in transit to DAX clusters.
* `Aws\SecurityHub` - Added new resource details for ECS clusters and ECS task definitions. Added additional information for S3 buckets, Elasticsearch domains, and API Gateway V2 stages.
* `Aws\Transfer` - Customers can successfully use legacy clients with Transfer Family endpoints enabled for FTPS and FTP behind routers, firewalls, and load balancers by providing a Custom IP address used for data channel communication.
* `Aws\WAFV2` - Added support for 15 new text transformation.
* `Aws\kendra` - Amazon Kendra now supports SharePoint 2013 and SharePoint 2016 when using a SharePoint data source.

## 3.185.0 - 2021-06-23

* `Aws\` - User agent header updated to include info on OS and language version
* `Aws\Cloud9` - Updated documentation for CreateEnvironmentEC2 to explain that because Amazon Linux AMI has ended standard support as of December 31, 2020, we recommend you choose Amazon Linux 2--which includes long term support through 2023--for new AWS Cloud9 environments.
* `Aws\CloudFront` - Amazon CloudFront adds support for a new security policy, TLSv1.2_2021.
* `Aws\CloudSearch` - This release replaces previous generation CloudSearch instances with equivalent new instances that provide better stability at the same price.
* `Aws\CloudWatchEvents` - Added the following parameters to ECS targets: CapacityProviderStrategy, EnableECSManagedTags, EnableExecuteCommand, PlacementConstraints, PlacementStrategy, PropagateTags, ReferenceId, and Tags
* `Aws\CodeGuruReviewer` - Adds support for S3 based full repository analysis and changed lines scan.
* `Aws\DocDB` - DocumentDB documentation-only edits
* `Aws\EC2` - This release adds support for provisioning your own IP (BYOIP) range in multiple regions. This feature is in limited Preview for this release. Contact your account manager if you are interested in this feature.
* `Aws\EventBridge` - Added the following parameters to ECS targets: CapacityProviderStrategy, EnableECSManagedTags, EnableExecuteCommand, PlacementConstraints, PlacementStrategy, PropagateTags, ReferenceId, and Tags
* `Aws\LicenseManager` - AWS License Manager now allows license administrators and end users to communicate to each other by setting custom status reasons when updating the status on a granted license.
* `Aws\MediaTailor` - Update GetChannelSchedule to return information on ad breaks.
* `Aws\QuickSight` - Releasing new APIs for AWS QuickSight Folders

## 3.184.7 - 2021-06-21

* `Aws\CloudFormation` - CloudFormation registry service now supports 3rd party public type sharing

## 3.184.6 - 2021-06-17

* `Aws\Chime` - This release adds a new API UpdateSipMediaApplicationCall, to update an in-progress call for SipMediaApplication.
* `Aws\RDS` - This release enables Database Activity Streams for RDS Oracle
* `Aws\SageMaker` - Enable ml.g4dn instance types for SageMaker Batch Transform and SageMaker Processing
* `Aws\kendra` - Amazon Kendra now supports the indexing of web documents for search through the web crawler.

## 3.184.5 - 2021-06-16

* `Aws\EC2` - This release adds support for VLAN-tagged network traffic over an Elastic Network Interface (ENI). This feature is in limited Preview for this release. Contact your account manager if you are interested in this feature.
* `Aws\KMS` - Adds support for multi-Region keys
* `Aws\MediaTailor` - Adds AWS Secrets Manager Access Token Authentication for Source Locations
* `Aws\RDS` - This release enables fast cloning in Aurora Serverless. You can now clone between Aurora Serverless clusters and Aurora Provisioned clusters.

## 3.184.4 - 2021-06-15

* `Aws\Connect` - This release adds new sets of APIs: AssociateBot, DisassociateBot, and ListBots. You can use it to programmatically add an Amazon Lex bot or Amazon Lex V2 bot on the specified Amazon Connect instance
* `Aws\EC2` - EC2 M5n, M5dn, R5n, R5dn metal instances with 100 Gbps network performance and Elastic Fabric Adapter (EFA) for ultra low latency
* `Aws\LexModelsV2` - This release adds support for Multi Valued slots in Amazon Lex V2 APIs for model building
* `Aws\LexRuntimeV2` - This release adds support for Multi Valued slots in Amazon Lex V2 APIs for runtime
* `Aws\RedshiftDataAPIService` - Redshift Data API service now supports SQL parameterization.

## 3.184.3 - 2021-06-14

* `Aws\GreengrassV2` - We have verified the APIs being released here and are ready to release
* `Aws\IoTAnalytics` - Adds support for data store partitions.
* `Aws\LookoutMetrics` - Added "LEARNING" status for anomaly detector and updated description for "Offset" parameter in MetricSet APIs.

## 3.184.2 - 2021-06-11

* `Aws\EC2` - Amazon EC2 adds new AMI property to flag outdated AMIs
* `Aws\MediaConnect` - When you enable source failover, you can now designate one of two sources as the primary source. You can choose between two failover modes to prevent any disruption to the video stream. Merge combines the sources into a single stream. Failover allows switching between a primary and a backup stream.
* `Aws\MediaLive` - AWS MediaLive now supports OCR-based conversion of DVB-Sub and SCTE-27 image-based source captions to WebVTT, and supports ingest of ad avail decorations in HLS input manifests.

## 3.184.1 - 2021-06-10

* `Aws\AppMesh` - AppMesh now supports additional routing capabilities in match and rewrites for Gateway Routes and Routes. Additionally, App Mesh also supports specifying DNS Response Types in Virtual Nodes.
* `Aws\Appflow` - Adding MAP_ALL task type support.
* `Aws\Chime` - This SDK release adds support for UpdateAccount API to allow users to update their default license on Chime account.
* `Aws\CognitoIdentityProvider` - Amazon Cognito now supports targeted sign out through refresh token revocation
* `Aws\EC2` - This release adds a new optional parameter connectivityType (public, private) for the CreateNatGateway API. Private NatGateway does not require customers to attach an InternetGateway to the VPC and can be used for communication with other VPCs and on-premise networks.
* `Aws\ManagedBlockchain` - This release supports KMS customer-managed Customer Master Keys (CMKs) on member-specific Hyperledger Fabric resources.
* `Aws\RAM` - AWS Resource Access Manager (RAM) is releasing new field isResourceTypeDefault in ListPermissions and GetPermission response, and adding permissionArn parameter to GetResourceShare request to filter by permission attached
* `Aws\Redshift` - Added InvalidClusterStateFault to the ModifyAquaConfiguration API, thrown when calling the API on a non available cluster.
* `Aws\SageMaker` - Using SageMaker Edge Manager with AWS IoT Greengrass v2 simplifies accessing, maintaining, and deploying models to your devices. You can now create deployable IoT Greengrass components during edge packaging jobs. You can choose to create a device fleet with or without creating an AWS IoT role alias.
* `Aws\SageMakerFeatureStoreRuntime` - Release BatchGetRecord API for AWS SageMaker Feature Store Runtime.

## 3.184.0 - 2021-06-09

* `Aws\PersonalizeEvents` - Support for unstructured text inputs in the items dataset to to automatically extract key information from product/content description as an input when creating solution versions.
* `Aws\Proton` - This is the initial SDK release for AWS Proton
* `Aws\Transfer` - Documentation updates for the AWS Transfer Family service.
* `Aws\kendra` - AWS Kendra now supports checking document status.

## 3.183.15 - 2021-06-08

* `Aws\CognitoIdentityProvider` - Documentation updates for cognito-idp
* `Aws\FSx` - This release adds support for auditing end-user access to files, folders, and file shares using Windows event logs, enabling customers to meet their security and compliance needs.
* `Aws\Macie2` - This release of the Amazon Macie API introduces stricter validation of S3 object criteria for classification jobs.
* `Aws\ServiceCatalog` - increase max pagesize for List/Search apis

## 3.183.14 - 2021-06-07

* `Aws\EKS` - Added updateConfig option that allows customers to control upgrade velocity in Managed Node Group.
* `Aws\Glue` - Add SampleSize variable to S3Target to enable s3-sampling feature through API.
* `Aws\Personalize` - Update regex validation in kmsKeyArn and s3 path API parameters for AWS Personalize APIs
* `Aws\SageMaker` - AWS SageMaker - Releasing new APIs related to Callback steps in model building pipelines. Adds experiment integration to model building pipelines.

## 3.183.13 - 2021-06-04

* `Aws\AutoScaling` - Documentation updates for Amazon EC2 Auto Scaling
* `Aws\CloudTrail` - AWS CloudTrail supports data events on new service resources, including Amazon DynamoDB tables and S3 Object Lambda access points.
* `Aws\MediaLive` - Add support for automatically setting the H.264 adaptive quantization and GOP B-frame fields.
* `Aws\PI` - The new GetDimensionKeyDetails action retrieves the attributes of the specified dimension group for a DB instance or data source.
* `Aws\QLDB` - Documentation updates for Amazon QLDB
* `Aws\RDS` - Documentation updates for RDS: fixing an outdated link to the RDS documentation in DBInstance$DBInstanceStatus

## 3.183.12 - 2021-06-03

* `Aws\ForecastService` - Added optional field AutoMLOverrideStrategy to CreatePredictor API that allows users to customize AutoML strategy. If provided in CreatePredictor request, this field is visible in DescribePredictor and GetAccuracyMetrics responses.
* `Aws\Route53Resolver` - Documentation updates for Route 53 Resolver
* `Aws\S3` - S3 Inventory now supports Bucket Key Status
* `Aws\S3Control` - Amazon S3 Batch Operations now supports S3 Bucket Keys.
* `Aws\SSM` - Documentation updates for ssm to fix customer reported issue

## 3.183.11 - 2021-06-02

* `Aws\AutoScaling` - You can now launch EC2 instances with GP3 volumes when using Auto Scaling groups with Launch Configurations
* `Aws\Braket` - Introduction of a RETIRED status for devices.
* `Aws\DocDB` - This SDK release adds support for DocDB global clusters.
* `Aws\ECS` - Documentation updates for Amazon ECS.
* `Aws\IAM` - Documentation updates for AWS Identity and Access Management (IAM).
* `Aws\Lightsail` - Documentation updates for Lightsail

## 3.183.10 - 2021-06-01

* `Aws\EC2` - Added idempotency to CreateNetworkInterface using the ClientToken parameter.
* `Aws\IoTWireless` - Added six new public customer logging APIs to allow customers to set/get/reset log levels at resource type and resource id level. The log level set from the APIs will be used to filter log messages that can be emitted to CloudWatch in customer accounts.
* `Aws\Polly` - Amazon Polly adds new Canadian French voice - Gabrielle. Gabrielle is available as Neural voice only.
* `Aws\SNS` - This release adds SMS sandbox in Amazon SNS and the ability to view all configured origination numbers. The SMS sandbox provides a safe environment for sending SMS messages, without risking your reputation as an SMS sender.
* `Aws\ServiceDiscovery` - Bugfixes - The DiscoverInstances API operation now provides an option to return all instances for health-checked services when there are no healthy instances available.

## 3.183.9 - 2021-05-28

* `Aws\DataSync` - Added SecurityDescriptorCopyFlags option that allows for control of which components of SMB security descriptors are copied from source to destination objects.
* `Aws\LocationService` - Adds support for calculation of routes, resource tagging and customer provided KMS keys.
* `Aws\LookoutMetrics` - Allowing dot(.) character in table name for RDS and Redshift as source connector.

## 3.183.8 - 2021-05-27

* `Aws\DeviceFarm` - Introduces support for using our desktop testing service with applications hosted within your Virtual Private Cloud (VPC).
* `Aws\FSx` - This release adds LZ4 data compression support to FSx for Lustre to reduce storage consumption of both file system storage and file system backups.
* `Aws\IoTEvents` - Releasing new APIs for AWS IoT Events Alarms
* `Aws\IoTEventsData` - Releasing new APIs for AWS IoT Events Alarms
* `Aws\IoTSiteWise` - IoT SiteWise Monitor Portal API updates to add alarms feature configuration.
* `Aws\Lightsail` - Documentation updates for Lightsail
* `Aws\ResourceGroups` - Documentation updates for Resource Groups.
* `Aws\SQS` - Documentation updates for Amazon SQS for General Availability of high throughput for FIFO queues.
* `Aws\kendra` - Amazon Kendra now suggests popular queries in order to help guide query typing and help overall accuracy.

## 3.183.7 - 2021-05-27

* `Aws\EC2` - This release removes resource ids and tagging support for VPC security group rules.

## 3.183.6 - 2021-05-26

* `Aws\ACMPCA` - This release enables customers to store CRLs in S3 buckets with Block Public Access enabled. The release adds the S3ObjectAcl parameter to the CreateCertificateAuthority and UpdateCertificateAuthority APIs to allow customers to choose whether their CRL will be publicly available.
* `Aws\CloudFront` - Documentation fix for CloudFront
* `Aws\EC2` - This release adds resource ids and tagging support for VPC security group rules.
* `Aws\ECS` - The release adds support for registering External instances to your Amazon ECS clusters.
* `Aws\MWAA` - Adds scheduler count selection for Environments using Airflow version 2.0.2 or later.
* `Aws\Outposts` - Add ConflictException to DeleteOutpost, CreateOutpost
* `Aws\QLDB` - Support STANDARD permissions mode in CreateLedger and DescribeLedger. Add UpdateLedgerPermissionsMode to update permissions mode on existing ledgers.

## 3.183.5 - 2021-05-25

* `Aws\IoT` - This release includes support for a new feature: Job templates for AWS IoT Device Management Jobs. The release includes job templates as a new resource and APIs for managing job templates.
* `Aws\Transfer` - AWS Transfer Family customers can now use AWS Managed Active Directory or AD Connector to authenticate their end users, enabling seamless migration of file transfer workflows that rely on AD authentication, without changing end users' credentials or needing a custom authorizer.
* `Aws\WorkSpaces` - Adds support for Linux device types in WorkspaceAccessProperties

## 3.183.4 - 2021-05-24

* `Aws\CloudWatchLogs` - This release provides dimensions and unit support for metric filters.
* `Aws\ComputeOptimizer` - Adds support for 1) additional instance types, 2) additional instance metrics, 3) finding reasons for instance recommendations, and 4) platform differences between a current instance and a recommended instance type.
* `Aws\CostExplorer` - Introduced FindingReasonCodes, PlatformDifferences, DiskResourceUtilization and NetworkResourceUtilization to GetRightsizingRecommendation action
* `Aws\EC2` - This release adds support for creating and managing EC2 On-Demand Capacity Reservations on Outposts.
* `Aws\QuickSight` - Add new parameters on RegisterUser and UpdateUser APIs to assign or update external ID associated to QuickSight users federated through web identity.

## 3.183.3 - 2021-05-21

* `Aws\EFS` - EFS now supports account preferences. Utilizing the new capability, users can customize some aspects of their experience using EFS APIs and the EFS Console. The first preference clients are able to set is whether to start using longer File System and Mount Target IDs before EFS migrates to such IDs.
* `Aws\ForecastService` - Updated attribute statistics in DescribeDatasetImportJob response to support Long values
* `Aws\OpsWorksCM` - New PUPPET_API_CRL attribute returned by DescribeServers API; new EngineVersion of 2019 available for Puppet Enterprise servers.
* `Aws\S3` - Documentation updates for Amazon S3

## 3.183.2 - 2021-05-20

* `Aws\IAM` - Documentation updates for AWS Identity and Access Management (IAM).
* `Aws\LexModelsV2` - Customers can now use resource-based policies to control access to their Lex V2 bots. This release adds APIs to attach and manage permissions for a bot or a bot alias. For details, see: https://docs.aws.amazon.com/lexv2/latest/dg/security_iam_service-with-iam.html
* `Aws\Personalize` - Added new API to stop a solution version creation that is pending or in progress for Amazon Personalize
* `Aws\QuickSight` - Add ARN based Row Level Security support to CreateDataSet/UpdateDataSet APIs.

## 3.183.1 - 2021-05-19

* `Aws\AutoScaling` - With this release, customers can easily use Predictive Scaling as a policy directly through Amazon EC2 Auto Scaling configurations to proactively scale their applications ahead of predicted demand.
* `Aws\EKS` - Update the EKS AddonActive waiter.
* `Aws\IAM` - Add pagination to ListUserTags operation
* `Aws\KinesisAnalyticsV2` - Kinesis Data Analytics now allows rapid iteration on Apache Flink stream processing through the Kinesis Data Analytics Studio feature.
* `Aws\Lightsail` - Documentation updates for Amazon Lightsail.
* `Aws\Rekognition` - Amazon Rekognition Custom Labels adds support for customer managed encryption, using AWS Key Management Service, of image files copied into the service and files written back to the customer.

## 3.183.0 - 2021-05-18

* `Aws\AppRunner` - AWS App Runner is a service that provides a fast, simple, and cost-effective way to deploy from source code or a container image directly to a scalable and secure web application in the AWS Cloud.
* `Aws\ComputeOptimizer` - This release enables compute optimizer to support exporting recommendations to Amazon S3 for EBS volumes and Lambda Functions.
* `Aws\IoTSiteWise` - Documentation updates for AWS IoT SiteWise.
* `Aws\LexModelsV2` - This release adds support for exporting and importing Lex V2 bots and bot locales. It also adds validations to enforce minimum number of tags on Lex V2 resources. For details, see https://docs.aws.amazon.com/lexv2/latest/dg/importing-exporting.html
* `Aws\LicenseManager` - AWS License Manager now supports periodic report generation.
* `Aws\Personalize` - Amazon Personalize now supports the ability to optimize a solution for a custom objective in addition to maximizing relevance.
* `Aws\Support` - Documentation updates for support

## 3.182.0 - 2021-05-17

* `Aws\` - Performed the migration to static API to in order to use the future versions Guzzle\Psr7 using the [migration guide](https://github.com/guzzle/psr7#upgrading-from-function-api).
* `Aws\Api` - Fixed a bug where certain characters weren't escaped in the XML encoding
* `Aws\ApplicationCostProfiler` - APIs for AWS Application Cost Profiler.
* `Aws\AugmentedAIRuntime` - Documentation updates for Amazon A2I Runtime model
* `Aws\ElastiCache` - Documentation updates for elasticache
* `Aws\IoTDeviceAdvisor` - AWS IoT Core Device Advisor is fully managed test capability for IoT devices. Device manufacturers can use Device Advisor to test their IoT devices for reliable and secure connectivity with AWS IoT.
* `Aws\MediaConnect` - MediaConnect now supports JPEG XS for AWS Cloud Digital Interface (AWS CDI) uncompressed workflows, allowing you to establish a bridge between your on-premises live video network and the AWS Cloud.
* `Aws\Neptune` - Neptune support for CopyTagsToSnapshots

## 3.181.2 - 2021-05-14

* `Aws\CloudWatchEvents` - Update InputTransformer variable limit from 10 to 100 variables.
* `Aws\Detective` - Updated descriptions of array parameters to add the restrictions on the array and value lengths.
* `Aws\ElasticsearchService` - Adds support for cold storage.
* `Aws\Endpoint` - Support for FIPS and handle global regions
* `Aws\EventBridge` - Update InputTransformer variable limit from 10 to 100 variables.
* `Aws\Macie2` - This release of the Amazon Macie API adds support for defining run-time, S3 bucket criteria for classification jobs. It also adds resources for querying data about AWS resources that Macie monitors.
* `Aws\SecurityHub` - Updated descriptions to add notes on array lengths.
* `Aws\TranscribeService` - Transcribe Medical now supports identification of PHI entities within transcripts
* `Aws\imagebuilder` - Text-only updates for bundled documentation feedback tickets - spring 2021.

## 3.181.1 - 2021-05-12

* `Aws\EC2` - High Memory virtual instances are powered by Intel Sky Lake CPUs and offer up to 12TB of memory.

## 3.181.0 - 2021-05-11

* `Aws\S3Control` - Documentation updates for Amazon S3-control
* `Aws\SSMContacts` - AWS Systems Manager Incident Manager enables faster resolution of critical application availability and performance issues, management of contacts and post incident analysis
* `Aws\SSMIncidents` - AWS Systems Manager Incident Manager enables faster resolution of critical application availability and performance issues, management of contacts and post-incident analysis
* `Aws\TranscribeStreamingService` - Amazon Transcribe supports partial results stabilization for streaming transcription.

## 3.180.6 - 2021-05-10

* `Aws\CodeArtifact` - Documentation updates for CodeArtifact
* `Aws\ConfigService` - Adds paginator to multiple APIs: By default, the paginator allows user to iterate over the results and allows the CLI to return up to 1000 results.
* `Aws\ECS` - This release contains updates for Amazon ECS.
* `Aws\EKS` - This release updates create-nodegroup and update-nodegroup-config APIs for adding/updating taints on managed nodegroups.
* `Aws\IoTWireless` - Add three new optional fields to support filtering and configurable sub-band in WirelessGateway APIs. The filtering is for all the RF region supported. The sub-band configuration is only applicable to LoRa gateways of US915 or AU915 RF region.
* `Aws\KinesisAnalyticsV2` - Amazon Kinesis Analytics now supports ListApplicationVersions and DescribeApplicationVersion API for Apache Flink applications
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for Kantar SNAP File Audio Watermarking with a Kantar Watermarking account, and Display Definition Segment(DDS) segment data controls for DVB-Sub caption outputs.
* `Aws\SSM` - This release adds new APIs to associate, disassociate and list related items in SSM OpsCenter; and this release adds DisplayName as a version-level attribute for SSM Documents and introduces two new document types: ProblemAnalysis, ProblemAnalysisTemplate.

## 3.180.5 - 2021-05-07

* `Aws\Connect` - Adds tagging support for Connect APIs CreateIntegrationAssociation and CreateUseCase.
* `Aws\LakeFormation` - This release adds Tag Based Access Control to AWS Lake Formation service
* `Aws\LookoutMetrics` - Enforcing UUID style for parameters that are already in UUID format today. Documentation specifying eventual consistency of lookoutmetrics resources.

## 3.180.4 - 2021-05-06

* `Aws\Kafka` - IAM Access Control for Amazon MSK enables you to create clusters that use IAM to authenticate clients and to allow or deny Apache Kafka actions for those clients.
* `Aws\SSM` - SSM feature release - ChangeCalendar integration with StateManager.
* `Aws\ServiceDiscovery` - Bugfix: Improved input validation for RegisterInstance action, InstanceId field
* `Aws\Snowball` - AWS Snow Family adds APIs for ordering and managing Snow jobs with long term pricing

## 3.180.3 - 2021-05-05

* `Aws\AuditManager` - This release updates the CreateAssessmentFrameworkControlSet and UpdateAssessmentFrameworkControlSet API data types. For both of these data types, the control set name is now a required attribute.
* `Aws\KinesisAnalyticsV2` - Amazon Kinesis Analytics now supports RollbackApplication for Apache Flink applications to revert the application to the previous running version
* `Aws\NimbleStudio` - Documentation Updates for Amazon Nimble Studio.
* `Aws\SageMaker` - Amazon SageMaker Autopilot now provides the ability to automatically deploy the best model to an endpoint

## 3.180.2 - 2021-05-05

* `Aws\FinSpaceData` - Documentation updates for FinSpaceData API.
* `Aws\finspace` - Documentation updates for FinSpace API.
* `Aws\finspace` - Fixed bug where incorrect Content-Type header was being sent to the Finspace and FinspaceData services

## 3.180.1 - 2021-05-04

* `Aws\ACMPCA` - This release adds the KeyStorageSecurityStandard parameter to the CreateCertificateAuthority API to allow customers to mandate a security standard to which the CA key will be stored within.
* `Aws\Chime` - This release adds the ability to search for and order international phone numbers for Amazon Chime SIP media applications.
* `Aws\DevOpsGuru` - Added GetCostEstimation and StartCostEstimation to get the monthly resource usage cost and added ability to view resource health by AWS service name and to search insights be AWS service name.
* `Aws\Health` - Documentation updates for health
* `Aws\SageMaker` - Enable retrying Training and Tuning Jobs that fail with InternalServerError by setting RetryStrategy.

## 3.180.0 - 2021-05-03

* `Aws\Chime` - Added new BatchCreateChannelMembership API to support multiple membership creation for channels
* `Aws\FinSpaceData` - This is the initial SDK release for the data APIs for Amazon FinSpace. Amazon FinSpace is a data management and analytics application for the financial services industry (FSI).
* `Aws\MTurk` - Documentation updates for Amazon Mechanical Turk, GetAccountBalanceOperation operation
* `Aws\SecurityHub` - Updated ASFF to add the following new resource details objects: AwsEc2NetworkAcl, AwsEc2Subnet, and AwsElasticBeanstalkEnvironment.
* `Aws\finspace` - This is the initial SDK release for the management APIs for Amazon FinSpace. Amazon FinSpace is a data management and analytics service for the financial services industry (FSI).

## 3.179.2 - 2021-04-30

* `Aws\CloudFront` - CloudFront now supports CloudFront Functions, a native feature of CloudFront that enables you to write lightweight functions in JavaScript for high-scale, latency-sensitive CDN customizations.
* `Aws\CustomerProfiles` - This release introduces GetMatches and MergeProfiles APIs to fetch and merge duplicate profiles
* `Aws\ForecastService` - Added new DeleteResourceTree operation that helps in deleting all the child resources of a given resource including the given resource.
* `Aws\MarketplaceCatalog` - Allows user defined names for Changes in a ChangeSet. Users can use ChangeNames to reference properties in another Change within a ChangeSet. This feature allows users to make changes to an entity when the entity identifier is not yet available while constructing the StartChangeSet request.
* `Aws\Personalize` - Update URL for dataset export job documentation.
* `Aws\RoboMaker` - Adds ROS2 Foxy as a supported Robot Software Suite Version and Gazebo 11 as a supported Simulation Software Suite Version
* `Aws\S3` - Generalized DateTime to DateTimeInterface in an S3Client's createPresignedRequest function and in Cloudfront/LogFileIterator's NormalizeDateValue function

## 3.179.1 - 2021-04-29

* `Aws\Chime` - Increase AppInstanceUserId length to 64 characters
* `Aws\ECS` - Add support for EphemeralStorage on TaskDefinition and TaskOverride
* `Aws\Macie2` - The Amazon Macie API now provides S3 bucket metadata that indicates whether a bucket policy requires server-side encryption of objects when objects are uploaded to the bucket.
* `Aws\Organizations` - Minor text updates for AWS Organizations API Reference

## 3.179.0 - 2021-04-28

* `Aws\CloudFormation` - Add CallAs parameter to GetTemplateSummary to enable use with StackSets delegated administrator integration
* `Aws\Connect` - Updated max number of tags that can be attached from 200 to 50. MaxContacts is now an optional parameter for the UpdateQueueMaxContact API.
* `Aws\IoTSiteWise` - AWS IoT SiteWise interpolation API will get interpolated values for an asset property per specified time interval during a period of time.
* `Aws\MediaPackageVod` - MediaPackage now offers the option to place your Sequence Parameter Set (SPS), Picture Parameter Set (PPS), and Video Parameter Set (VPS) encoder metadata in every video segment instead of in the init fragment for DASH and CMAF endpoints.
* `Aws\NimbleStudio` - Amazon Nimble Studio is a virtual studio service that empowers visual effects, animation, and interactive content teams to create content securely within a scalable, private cloud service.

## 3.178.11 - 2021-04-27

* `Aws\AuditManager` - This release restricts using backslashes in control, assessment, and framework names. The controlSetName field of the UpdateAssessmentFrameworkControlSet API now allows strings without backslashes.
* `Aws\S3` - Bugfix to apply the correct signature to certain functions in S3 object lambda requests

## 3.178.10 - 2021-04-26

* `Aws\CodeGuruReviewer` - Include KMS Key Details in Repository Association APIs to enable usage of customer managed KMS Keys.
* `Aws\EC2` - Adding support for Red Hat Enterprise Linux with HA for Reserved Instances.
* `Aws\EKS` - This release updates existing Amazon EKS input validation so customers will see an InvalidParameterException instead of a ParamValidationError when they enter 0 for minSize and/or desiredSize. It also adds LaunchTemplate information to update responses and a new "CUSTOM" value for AMIType.
* `Aws\Glue` - Adding Kafka Client Auth Related Parameters
* `Aws\IoTWireless` - Add a new optional field MessageType to support Sidewalk devices in SendDataToWirelessDevice API
* `Aws\KinesisAnalyticsV2` - Amazon Kinesis Data Analytics now supports custom application maintenance configuration using UpdateApplicationMaintenanceConfiguration API for Apache Flink applications. Customers will have visibility when their application is under maintenance status using 'MAINTENANCE' application status.
* `Aws\MediaConvert` - Documentation updates for mediaconvert
* `Aws\Personalize` - Added support for exporting data imported into an Amazon Personalize dataset to a specified data source (Amazon S3 bucket).

## 3.178.9 - 2021-04-23

* `Aws\MediaPackage` - Add support for Widevine DRM on CMAF origin endpoints. Both Widevine and FairPlay DRMs can now be used simultaneously, with CBCS encryption.
* `Aws\SNS` - Amazon SNS adds two new attributes, TemplateId and EntityId, for using sender IDs to send SMS messages to destinations in India.

## 3.178.8 - 2021-04-22

* `Aws\CognitoIdentityProvider` - Documentation updates for cognito-idp
* `Aws\ElastiCache` - This release introduces log delivery of Redis slow log from Amazon ElastiCache.
* `Aws\ForecastService` - This release adds EstimatedTimeRemaining minutes field to the DescribeDatasetImportJob, DescribePredictor, DescribeForecast API response which denotes the time remaining to complete the job IN_PROGRESS.
* `Aws\SecurityHub` - Replaced the term "master" with "administrator". Added new actions to replace AcceptInvitation, GetMasterAccount, and DisassociateFromMasterAccount. In Member, replaced MasterId with AdministratorId.

## 3.178.7 - 2021-04-21

* `Aws\CloudFormation` - Added support for creating and updating stack sets with self-managed permissions from templates that reference macros.
* `Aws\Detective` - Added parameters to track the data volume in bytes for a member account. Deprecated the existing parameters that tracked the volume as a percentage of the allowed volume for a behavior graph. Changes reflected in MemberDetails object.
* `Aws\GroundStation` - Support new S3 Recording Config allowing customers to write downlink data directly to S3.
* `Aws\Redshift` - Add operations: AddPartner, DescribePartners, DeletePartner, and UpdatePartnerStatus to support tracking integration status with data partners.
* `Aws\kendra` - Amazon Kendra now enables users to override index-level boosting configurations for each query.

## 3.178.6 - 2021-04-19

* `Aws\CostExplorer` - Adding support for Sagemaker savings plans in GetSavingsPlansPurchaseRecommendation API
* `Aws\SavingsPlans` - Added support for Amazon SageMaker in Machine Learning Savings Plans

## 3.178.5 - 2021-04-15

* `Aws\DatabaseMigrationService` - AWS DMS added support of TLS for Kafka endpoint. Added Describe endpoint setting API for DMS endpoints.
* `Aws\STS` - STS now supports assume role with Web Identity using JWT token length upto 20000 characters

## 3.178.4 - 2021-04-14

* `Aws\CodeStarconnections` - This release adds tagging support for CodeStar Connections Host resources
* `Aws\ConfigService` - Add exception for DeleteRemediationConfiguration and DescribeRemediationExecutionStatus
* `Aws\MediaConnect` - For flows that use Listener protocols, you can now easily locate an output's outbound IP address for a private internet. Additionally, MediaConnect now supports the Waiters feature that makes it easier to poll for the status of a flow until it reaches its desired state.
* `Aws\Route53` - Documentation updates for route53

## 3.178.3 - 2021-04-13

* `Aws\ComprehendMedical` - The InferICD10CM API now returns TIME_EXPRESSION entities that refer to medical conditions.
* `Aws\Lightsail` - Documentation updates for Amazon Lightsail.
* `Aws\RDS` - Clarify that enabling or disabling automated backups causes a brief downtime, not an outage.
* `Aws\Redshift` - Added support to enable AQUA in Amazon Redshift clusters.
* `Aws\STS` - This release adds the SourceIdentity parameter that can be set when assuming a role.

## 3.178.2 - 2021-04-12

* `Aws\CodeBuild` - AWS CodeBuild now allows you to set the access permissions for build artifacts, project artifacts, and log files that are uploaded to an Amazon S3 bucket that is owned by another account.
* `Aws\FSx` - Support for cross-region and cross-account backup copies

## 3.178.1 - 2021-04-09

* `Aws\EC2` - Add paginator support to DescribeStoreImageTasks and update documentation.
* `Aws\Redshift` - Add support for case sensitive table level restore
* `Aws\Shield` - CreateProtection now throws InvalidParameterException instead of InternalErrorException when system tags (tag with keys prefixed with "aws:") are passed in.

## 3.178.0 - 2021-04-08

* `Aws\AppStream` - This release provides support for image updates
* `Aws\AutoScaling` - Amazon EC2 Auto Scaling announces Warm Pools that help applications to scale out faster by pre-initializing EC2 instances and save money by requiring fewer continuously running instances
* `Aws\CustomerProfiles` - Documentation updates for Put-Integration API
* `Aws\KinesisVideoArchivedMedia` - Documentation updates for archived.kinesisvideo
* `Aws\LookoutEquipment` - This release introduces support for Amazon Lookout for Equipment.
* `Aws\RAM` - Documentation updates for AWS RAM resource sharing
* `Aws\RoboMaker` - This release allows RoboMaker customers to specify custom tools to run with their simulation job

## 3.177.0 - 2021-04-07

* `Aws\AccessAnalyzer` - IAM Access Analyzer now analyzes your CloudTrail events to identify actions and services that have been used by an IAM entity (user or role) and generates an IAM policy that is based on that activity.
* `Aws\ElastiCache` - This release adds tagging support for all AWS ElastiCache resources except Global Replication Groups.
* `Aws\IVS` - This release adds support for the Auto-Record to S3 feature. Amazon IVS now enables you to save your live video to Amazon S3.
* `Aws\StorageGateway` - File Gateway APIs now support FSx for Windows as a cloud storage.
* `Aws\mgn` - Add new service - Application Migration Service.

## 3.176.9 - 2021-04-06

* `Aws\Cloud9` - Documentation updates for Cloud9
* `Aws\EC2` - This release adds support for storing EBS-backed AMIs in S3 and restoring them from S3 to enable cross-partition copying of AMIs
* `Aws\MediaLive` - MediaLive VPC outputs update to include Availability Zones, Security groups, Elastic Network Interfaces, and Subnet Ids in channel response
* `Aws\SSM` - Supports removing a label or labels from a parameter, enables ScheduledEndTime and ChangeDetails for StartChangeRequestExecution API, supports critical/security/other noncompliant count for patch API.

## 3.176.8 - 2021-04-05

* `Aws\Appflow` - Added destination properties for Zendesk.
* `Aws\AuditManager` - AWS Audit Manager has updated the GetAssessment API operation to include a new response field called userRole. The userRole field indicates the role information and IAM ARN of the API caller.
* `Aws\MediaLive` - MediaLive now support HTML5 Motion Graphics overlay

## 3.176.7 - 2021-04-02

* `Aws\MediaPackage` - SPEKE v2 is an upgrade to the existing SPEKE API to support multiple encryption keys, based on an encryption contract selected by the customer.
* `Aws\imagebuilder` - This release adds support for Block Device Mappings for container image builds, and adds distribution configuration support for EC2 launch templates in AMI builds.

## 3.176.6 - 2021-04-01

* `Aws\EC2` - VPC Flow Logs Service adds a new API, GetFlowLogsIntegrationTemplate, which generates CloudFormation templates for Athena. For more info, see https://docs.aws.amazon.com/console/vpc/flow-logs/athena
* `Aws\FMS` - Added Firewall Manager policy support for AWS Route 53 Resolver DNS Firewall.
* `Aws\LexModelBuildingService` - Lex now supports the ja-JP locale
* `Aws\LexRuntimeService` - Amazon Lex now supports base64-encoded message and input transcript fields.
* `Aws\Lightsail` - - This release adds support for state detail for Amazon Lightsail container services.
* `Aws\MediaConvert` - MediaConvert now supports HLS ingest, sidecar WebVTT ingest, Teletext color & style passthrough to TTML subtitles, TTML to WebVTT subtitle conversion with style, & DRC profiles in AC3 audio.
* `Aws\Route53Resolver` - Route 53 Resolver DNS Firewall is a firewall service that allows you to filter and regulate outbound DNS traffic for your VPCs.
* `Aws\WAFV2` - Added support for ScopeDownStatement for ManagedRuleGroups, Labels, LabelMatchStatement, and LoggingFilter. For more information on these features, see the AWS WAF Developer Guide.
* `Aws\kendra` - AWS Kendra's ServiceNow data source now supports OAuth 2.0 authentication and knowledge article filtering via a ServiceNow query.

## 3.176.5 - 2021-03-31

* `Aws\Batch` - AWS Batch adds support for Amazon EFS File System
* `Aws\Cloud9` - Add ImageId input parameter to CreateEnvironmentEC2 endpoint. New parameter enables creation of environments with different AMIs.
* `Aws\CloudFormation` - 1. Added a new parameter "RegionConcurrencyType" in OperationPreferences. 2. Changed the name of "AccountUrl" to "AccountsUrl" in "DeploymentTargets" parameter.
* `Aws\CloudHSM` - Minor documentation and link updates.
* `Aws\CognitoSync` - Minor documentation updates and link updates.
* `Aws\Comprehend` - Support for customer managed KMS encryption of Comprehend custom models
* `Aws\DataPipeline` - Minor documentation updates and link updates.
* `Aws\Detective` - Added the ability to assign tag values to Detective behavior graphs. Tag values can be used for attribute-based access control, and for cost allocation for billing.
* `Aws\DirectConnect` - This release adds MACsec support to AWS Direct Connect
* `Aws\IoT` - Added ability to prefix search on attribute value for ListThings API.
* `Aws\IoTWireless` - Add Sidewalk support to APIs: GetWirelessDevice, ListWirelessDevices, GetWirelessDeviceStatistics. Add Gateway connection status in GetWirelessGatewayStatistics API.
* `Aws\MachineLearning` - Minor documentation updates and link updates.
* `Aws\Pricing` - Minor documentation and link updates.
* `Aws\Redshift` - Enable customers to share access to their Redshift clusters from other VPCs (including VPCs from other accounts).
* `Aws\TranscribeService` - Amazon Transcribe now supports creating custom language models in the following languages: British English (en-GB), Australian English (en-AU), Indian Hindi (hi-IN), and US Spanish (es-US).
* `Aws\WorkMail` - This release adds support for mobile device access rules management in Amazon WorkMail.

## 3.176.4 - 2021-03-30

* `Aws\CloudWatch` - SDK update for new Metric Streams feature
* `Aws\ConfigService` - Adding new APIs to support ConformancePack Compliance CI in Aggregators
* `Aws\EC2` - ReplaceRootVolume feature enables customers to replace the EBS root volume of a running instance to a previously known state. Add support to grant account-level access to the EC2 serial console
* `Aws\EC2InstanceConnect` - Adding support to push SSH keys to the EC2 serial console in order to allow an SSH connection to your Amazon EC2 instance's serial port.
* `Aws\FraudDetector` - This release adds support for Batch Predictions in Amazon Fraud Detector.
* `Aws\GlueDataBrew` - This SDK release adds two new dataset features: 1) support for specifying a database connection as a dataset input 2) support for dynamic datasets that accept configurable parameters in S3 path.
* `Aws\Pinpoint` - Added support for journey pause/resume, journey updatable import segment and journey quiet time wait.
* `Aws\SageMaker` - Amazon SageMaker Autopilot now supports 1) feature importance reports for AutoML jobs and 2) PartialFailures for AutoML jobs

## 3.176.3 - 2021-03-29

* `Aws\DocDB` - This release adds support for Event Subscriptions to DocumentDB.
* `Aws\Glue` - Allow Dots in Registry and Schema Names for CreateRegistry, CreateSchema; Fixed issue when duplicate keys are present and not returned as part of QuerySchemaVersionMetadata.
* `Aws\IAM` - AWS Identity and Access Management GetAccessKeyLastUsed API will throw a custom error if customer public key is not found for access keys.
* `Aws\LocationService` - Amazon Location added support for specifying pricing plan information on resources in alignment with our cost model.
* `Aws\WAFV2` - Added custom request handling and custom response support in rule actions and default action; Added the option to inspect the web request body as parsed and filtered JSON.

## 3.176.2 - 2021-03-26

* `Aws\CloudWatchEvents` - Add support for SageMaker Model Builder Pipelines Targets to EventBridge
* `Aws\CustomerProfiles` - This release adds an optional parameter named FlowDefinition in PutIntegrationRequest.
* `Aws\EventBridge` - Add support for SageMaker Model Builder Pipelines Targets to EventBridge
* `Aws\IoTWireless` - Support tag-on-create for WirelessDevice.
* `Aws\TranscribeService` - Amazon Transcribe now supports tagging words that match your vocabulary filter for batch transcription.

## 3.176.1 - 2021-03-26

* `Aws\LookoutMetrics` - Allowing uppercase alphabets for RDS and Redshift database names.
* `Aws\LookoutMetrics` - Fixed bug where incorrect Content-Type header was being sent to the LookoutMetrics service

## 3.176.0 - 2021-03-25

* `Aws\AlexaForBusiness` - Added support for enabling and disabling data retention in the CreateProfile and UpdateProfile APIs and retrieving the state of data retention for a profile in the GetProfile API.
* `Aws\LookoutMetrics` - Amazon Lookout for Metrics is now generally available. You can use Lookout for Metrics to monitor your data for anomalies. For more information, see the Amazon Lookout for Metrics Developer Guide.
* `Aws\MediaLive` - EML now supports handling HDR10 and HLG 2020 color space from a Link input.
* `Aws\Rekognition` - "This release introduces AWS tagging support for Amazon Rekognition collections, stream processors, and Custom Label models."
* `Aws\SQS` - Documentation updates for Amazon SQS
* `Aws\SageMaker` - This feature allows customer to specify the environment variables in their CreateTrainingJob requests.

## 3.175.3 - 2021-03-24

* `Aws\EC2` - maximumEfaInterfaces added to DescribeInstanceTypes API
* `Aws\Greengrass` - Updated the parameters to make name required for CreateGroup API.
* `Aws\Route53` - Documentation updates for route53
* `Aws\S3` - Documentation updates for Amazon S3
* `Aws\S3Control` - Documentation updates for s3-control
* `Aws\SES` - Adds support for generating V4 SMTP credentials for SES
* `Aws\SSM` - This release allows SSM Explorer customers to enable OpsData sources across their organization when creating a resource data sync.

## 3.175.2 - 2021-03-23

* `Aws\CostExplorer` - You can now create cost categories with inherited value rules and specify default values for any uncategorized costs.
* `Aws\FIS` - Updated maximum allowed size of action parameter from 64 to 1024
* `Aws\GameLift` - GameLift adds support for using event notifications to monitor game session placements. Specify an SNS topic or use CloudWatch Events to track activity for a game session queue.
* `Aws\IAM` - Documentation updates for IAM operations and descriptions.
* `Aws\Redshift` - Removed APIs to control AQUA on clusters.

## 3.175.1 - 2021-03-22

* `Aws\CodeArtifact` - Documentation updates for CodeArtifact
* `Aws\EC2` - This release adds support for UEFI boot on selected AMD- and Intel-based EC2 instances.
* `Aws\Macie2` - This release of the Amazon Macie API adds support for publishing sensitive data findings to AWS Security Hub and specifying which categories of findings to publish to Security Hub.
* `Aws\Redshift` - Added support to enable AQUA in Amazon Redshift clusters.

## 3.175.0 - 2021-03-19

* `Aws\EC2` - X2gd instances are the next generation of memory-optimized instances powered by AWS-designed, Arm-based AWS Graviton2 processors.
* `Aws\S3` - Added support for object lambda endpoints.
* `Aws\SageMaker` - Adding authentication support for pulling images stored in private Docker registries to build containers for real-time inference.

## 3.174.3 - 2021-03-18

* `Aws\AutoScaling` - Amazon EC2 Auto Scaling Instance Refresh now supports phased deployments.
* `Aws\Redshift` - Add new fields for additional information about VPC endpoint for clusters with reallocation enabled, and a new field for total storage capacity for all clusters.
* `Aws\S3` - S3 Object Lambda is a new S3 feature that enables users to apply their own custom code to process the output of a standard S3 GET request by automatically invoking a Lambda function with a GET request
* `Aws\S3Control` - S3 Object Lambda is a new S3 feature that enables users to apply their own custom code to process the output of a standard S3 GET request by automatically invoking a Lambda function with a GET request
* `Aws\SecurityHub` - New object for separate provider and customer values. New objects track S3 Public Access Block configuration and identify sensitive data. BatchImportFinding requests are limited to 100 findings.

## 3.174.2 - 2021-03-17

* `Aws\Batch` - Making serviceRole an optional parameter when creating a compute environment. If serviceRole is not provided then Service Linked Role will be created (or reused if it already exists).
* `Aws\SageMaker` - Support new target device ml_eia2 in SageMaker CreateCompilationJob API

## 3.174.1 - 2021-03-16

* `Aws\AccessAnalyzer` - This release adds support for the ValidatePolicy API. IAM Access Analyzer is adding over 100 policy checks and actionable recommendations that help you validate your policies during authoring.
* `Aws\GameLift` - GameLift expands to six new AWS Regions, adds support for multi-location fleets to streamline management of hosting resources, and lets you customize more of the game session placement process.
* `Aws\IAM` - Documentation updates for AWS Identity and Access Management (IAM).
* `Aws\Lambda` - Allow empty list for function response types
* `Aws\MWAA` - This release adds UPDATE_FAILED and UNAVAILABLE MWAA environment states.
* `Aws\MediaConnect` - This release adds support for the SRT-listener protocol on sources and outputs.
* `Aws\MediaTailor` - MediaTailor channel assembly is a new manifest-only service that allows you to assemble linear streams using your existing VOD content.

## 3.174.0 - 2021-03-15

* `Aws\CodeDeploy` - AWS CodeDeploy can now detect instances running an outdated revision of your application and automatically update them with the latest revision.
* `Aws\ECS` - This is for ecs exec feature release which includes two new APIs - execute-command and update-cluster and an AWS CLI customization for execute-command API
* `Aws\EMR` - Amazon EMR customers can now specify Resource Group to target Capacity Reservations in their EMR clusters with instance fleets using allocation strategy.
* `Aws\FIS` - Initial release of AWS Fault Injection Simulator, a managed service that enables you to perform fault injection experiments on your AWS workloads
* `Aws\TranscribeStreamingService` - AWS Transcribe now supports real-time transcription for Chinese (zh-CN) and confidence scores in the transcription output.

## 3.173.28 - 2021-03-12

* `Aws\CostandUsageReportService` - - Added optional billingViewArn field for OSG.
* `Aws\MediaTailor` - MediaTailor channel assembly is a new manifest-only service that allows you to assemble linear streams using your existing VOD content.
* `Aws\WorkSpaces` - Adds API support for WorkSpaces bundle management operations.

## 3.173.27 - 2021-03-11

* `Aws\Comprehend` - ContainsPiiEntities API analyzes the input text for the presence of personally identifiable information(PII) and returns the labels of identified PII entity types such as name, address etc.
* `Aws\MediaLive` - MediaLive supports the ability to apply a canned ACL to output sent to an AWS S3 bucket; supports ability to specify position for EBU-TT and TTML output captions converted from Teletext source.
* `Aws\NetworkFirewall` - Correct the documentation about how you can provide rule group rules
* `Aws\WAFV2` - Correct the documentation about JSON body parsing behavior and IP set update behavior

## 3.173.26 - 2021-03-10

* `Aws\AccessAnalyzer` - This release adds support to preview IAM Access Analyzer findings for a resource before deploying resource permission changes.
* `Aws\Backup` - Added support for enabling continuous backups.
* `Aws\S3` - Adding ID element to the CORSRule schema
* `Aws\SSM` - Systems Manager support for tagging OpsMetadata.

## 3.173.25 - 2021-03-09

* `Aws\AutoScaling` - EC2 Auto Scaling now supports setting a local time zone for cron expressions in scheduled actions, removing the need to adjust for Daylight Saving Time (DST)
* `Aws\CodeGuruProfiler` - Update documentation to include Python. Add ConflictException for DeleteProfilingGroup. Add FrameMetricValue.
* `Aws\EFS` - AWS EFS is introducing one-zone file systems.
* `Aws\IoTWireless` - Add max value to Seq in SendDataToWirelessDevice API"
* `Aws\RDS` - This release adds support for Amazon RDS Proxy endpoints.

## 3.173.24 - 2021-03-08

* `Aws\AutoScaling` - Documentation updates for autoscaling for capacity-optimized-prioritized SpotAllocationStrategy
* `Aws\EMR` - Amazon EMR customers can now specify how EC2 On-Demand Capacity Reservations are used in their EMR clusters with instance fleets using allocation strategy.
* `Aws\KinesisVideoArchivedMedia` - Increase the maximum HLS and MPEG-DASH manifest size from 1,000 to 5,000 fragments.
* `Aws\Lambda` - Documentation updates for Lambda. Constraint updates to AddLayerVersionPermission's Action and OrganizationId parameters, and AddPermission's Principal and SourceAccount parameters.
* `Aws\S3` - Amazon S3 Documentation updates
* `Aws\S3Control` - Documentation updates for Amazon S3

## 3.173.23 - 2021-03-05

* `Aws\Appflow` - Documentation updates for arn:aws:trebuchet:::service:v1:decb008d-e0d8-44a4-b93c-092f0355d523
* `Aws\Athena` - Adds APIs to create, list, update, and delete prepared SQL statements that have optional placeholder parameters. A prepared statement can use different values for these parameters each time it is run.
* `Aws\CodePipeline` - Updated the parameters to make actionType required for UpdateActionType
* `Aws\EC2` - Expands EC2/Spot Fleet capacity-optimized allocation strategy to allow users to prioritize instance pools. Fleet attempts to fulfill priorities on a best-effort basis but optimizes for capacity first.
* `Aws\LicenseManager` - License Manager Automated Discovery now supports Exclusion Filters.
* `Aws\MediaLive` - Medialive now supports the ability to transfer AWS Elemental Link devices to another region.
* `Aws\NetworkFirewall` - Added a new UpdateToken output field to the PerObjectStatus as part of firewall sync state. This is added to track which version of the object the firewall is in sync or pending synchronization.
* `Aws\Shield` - Add support for tagging of Shield protection and protection group resources.

## 3.173.22 - 2021-03-04

* `Aws\CloudWatchEvents` - Introducing support for EventBridge Api Destinations - any HTTP APIs as Targets, with managed authorization via EventBridge Connections.
* `Aws\EventBridge` - Introducing support for EventBridge Api Destinations - any HTTP APIs as Targets, with managed authorization via EventBridge Connections.
* `Aws\MWAA` - This release introduces a new MinWorker parameter to the CreateEnvironment and UpdateEnvironment APIs. MinWorker allows the users to set a minimum worker count for worker auto-scaling operations.
* `Aws\SageMaker` - This release adds the ResolvedOutputS3Uri to the DescribeFeatureGroup API to indicate the S3 prefix where offline data is stored in a feature group
* `Aws\ServiceDiscovery` - Supports creating API-only services under DNS namespace. Add namespace syntax validation.

## 3.173.21 - 2021-03-03

* `Aws\ACM` - Adds 2 new APIs to add and retrieve account configuration in AWS Certificate Manager.
* `Aws\CloudWatchEvents` - Adds TraceHeader to PutEventsRequestEntry to support AWS X-Ray trace-ids on events generated using the PutEvents operation.
* `Aws\CodeBuild` - AWS CodeBuild now supports Session Manager debugging for batch builds.
* `Aws\ElasticsearchService` - AWS ElasticSearch Feature : Support for adding tags in elastic search domain during domain creation
* `Aws\ForecastService` - Added new StopResource operation that stops Amazon Forecast resource jobs that are in progress.
* `Aws\Macie2` - This release of the Amazon Macie API includes miscellaneous updates and improvements to the documentation.
* `Aws\SecretsManager` - Added support for multi-Region secrets APIs ReplicateSecretToRegions, RemoveRegionsFromReplication, and StopReplicationToReplica
* `Aws\WellArchitected` - This release supports tagging on AWS Well-Architected workloads.

## 3.173.20 - 2021-03-02

* `Aws\ComputeOptimizer` - Documentation updates for Compute Optimizer
* `Aws\DataSync` - Additional API Support to update NFS/SMB/ObjectStorage locations
* `Aws\DirectConnect` - Doc only update for AWS Direct Connect that fixes several customer-reported issues
* `Aws\EventBridge` - Adds TraceHeader to PutEventsRequestEntry to support AWS X-Ray trace-ids on events generated using the PutEvents operation.
* `Aws\IoTWireless` - Add ARN & Tags for PartnerAccount related APIs and WirelessGatewayTaskDefinition related APIs
* `Aws\ManagedBlockchain` - Updates for Ethereum general availability release.

## 3.173.19 - 2021-03-01

* `Aws\AlexaForBusiness` - Added support for optional tags in CreateAddressBook, CreateConferenceProvider, CreateContact, CreateGatewayGroup, CreateNetworkProfile and RegisterAVSDevice APIs.
* `Aws\CodePipeline` - Added a new field to the ListPipelines API to allow maximum search results of 1000
* `Aws\EKS` - Adding new error code AdmissionRequestDenied for Addons in EKS
* `Aws\SSM` - Add Support for Patch Manger Baseline Override parameter.

## 3.173.18 - 2021-02-26

* `Aws\EKS` - Amazon EKS now supports adding KMS envelope encryption to existing clusters to enhance security for secrets
* `Aws\EMR` - Added UpdateStudio API that allows updating a few attributes of an EMR Studio.
* `Aws\S3` - Add RequestPayer to GetObjectTagging and PutObjectTagging.
* `Aws\SSOAdmin` - Relax constraint on List* API pagination tokens to include underscore character

## 3.173.17 - 2021-02-25

* `Aws\Detective` - Changed "master account" to "administrator account." A new AdministratorId field replaces the deprecated MasterId field. Added an option to disable email notifications for member account invitations.
* `Aws\GlueDataBrew` - This SDK release adds two new dataset features: 1) support for specifying the file format for a dataset, and 2) support for specifying whether the first row of a CSV or Excel file contains a header.
* `Aws\Lightsail` - Documentation updates for Lightsail
* `Aws\Transfer` - Corrected the upper limit for TestIdentityProvider input lengths to 1024 characters
* `Aws\imagebuilder` - This release introduces a new API (ListImagePackages) for listing packages installed on an image, and adds support for GP3 volume types, and for specifying a time zone in an image pipeline schedule.

## 3.173.16 - 2021-02-24

* `Aws\Appflow` - # Adding 'Amazon Honeycode' , 'Amazon Lookout for Metrics' and 'Amazon Connect Customer Profiles' as Destinations.
* `Aws\ComputeOptimizer` - Documentation updates for Compute Optimizer
* `Aws\ECRPublic` - This release adds support for AWS tags on Amazon ECR Public repositories.
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service now supports Auto-Tune, which monitors performance metrics and automatically optimizes domains
* `Aws\MediaPackageVod` - AWS Elemental MediaPackage provides access logs that capture detailed information about requests sent to a customer's MediaPackage VOD packaging group.

## 3.173.15 - 2021-02-23

* `Aws\AutoScaling` - Adds a new optional IncludeDeletedGroups parameter to the DescribeScalingActivities API.
* `Aws\Connect` - Documentation updates for AWS Connect (MediaConcurrency Limit).
* `Aws\Glue` - Updating the page size for Glue catalog getter APIs.
* `Aws\IoTEvents` - This release adds an Analyze feature to AWS IoT Events that lets customers analyze their detector models for runtime issues.
* `Aws\Pinpoint` - Enables AWS Pinpoint customers to use Entity Id and Template Id when sending SMS message. These parameters can be obtained from the regulatory body of the country where you are trying to send the SMS.
* `Aws\QuickSight` - Documentation updates for QuickSight Row Level Security
* `Aws\RedshiftDataAPIService` - This release adds an additional parameter 'ConnectedDatabase' into ListSchemasRequest, ListTablesRequest and DescribeTableRequest to support the metadata sharing across databases.
* `Aws\S3Control` - Documentation updates for s3-control

## 3.173.14 - 2021-02-22

* `Aws\SageMaker` - Amazon SageMaker now supports core dump for SageMaker Endpoints and direct invocation of a single container in a SageMaker Endpoint that hosts multiple containers.
* `Aws\SageMakerRuntime` - SageMaker Runtime now supports a new TargetContainerHostname header to invoke a model in a specific container if the endpoint hosts multiple containers and is configured to use direct invocation.

## 3.173.13 - 2021-02-19

* `Aws\RDS` - Added awsBackupRecoveryPointArn in ModifyDBInstanceRequest and in the response of ModifyDBInstance.

## 3.173.12 - 2021-02-18

* `Aws\CloudFormation` - Adding the 'callAs' parameter to all CloudFormation StackSets APIs except getTemplateSummary to support creating and managing service-managed StackSets with AWS Organizations Delegated Administrators
* `Aws\CodeBuild` - AWS CodeBuild now allows you to specify a separate bucket owner as part of the S3 destination in a report group.
* `Aws\Health` - Documentation updates for health
* `Aws\SageMaker` - This release adds expires-in-seconds parameter to the CreatePresignedDomainUrl API for support of a configurable TTL.

## 3.173.11 - 2021-02-17

* `Aws\ConfigService` - Added INSUFFICIENT_DATA in ConformancePackComplianceType.
* `Aws\EC2` - This release includes a new filter for describe-vpc-endpoint-services.
* `Aws\LookoutforVision` - This release for Amazon Lookout for Vision includes documentation updates and a correction to the Status field returned in the response from StartModel and StopModel.

## 3.173.10 - 2021-02-16

* `Aws\CodeBuild` - This release provides per-project limits for the number of concurrent builds
* `Aws\DevOpsGuru` - Amazon DevOps Guru is GA ready. This API update added a describeFeedback Api allows users to view submitted insight feedback. The release date is 02/16/2021

## 3.173.9 - 2021-02-15

* `Aws\ConfigService` - Added option to provide KMS key to AWS Config DeliveryChannel
* `Aws\KinesisVideoArchivedMedia` - The ListFragments and GetMediaForFragmentList APIs now support StreamName or StreamARN as input parameters.
* `Aws\Lightsail` - Documentation updates for Lightsail
* `Aws\MediaLive` - AWS MediaLive now supports Automatic-Input-Failover for CDI Inputs.
* `Aws\MediaTailor` - MediaTailor now supports specifying aliases for dynamic variables. This allows use cases such as binding multiple origin domains to a single MediaTailor playback configuration.
* `Aws\Pinpoint` - Lets customers use origination number when specifying SMS message configuration for Campaigns and Journeys.
* `Aws\RedshiftDataAPIService` - This release enables fine grant access control in ListStatements, GetStatementResult, CancelStatement and DescribeStatement.
* `Aws\WorkMailMessageFlow` - This release allows customers to update email messages as they flow in and out of Amazon WorkMail

## 3.173.8 - 2021-02-12

* `Aws\AppSync` - Approve release for appsync local on pipeline resolver
* `Aws\CodePipeline` - The release provides new GetActionType and UpdateActionType APIs for viewing and editing action types in CodePipeline.
* `Aws\Detective` - The API definition now indicates that the format for timestamps is an ISO 8601 date-time string
* `Aws\EKS` - Amazon EKS now supports OpenId Connect (OIDC) compatible identity providers as a user authentication option
* `Aws\ElasticLoadBalancingv2` - Adds a target group attribute for application-based stickiness for Application Load Balancers and an update to the client IP preservation attribute for Network Load Balancers.
* `Aws\IAM` - AWS Identity and Access Management now supports tagging for the following resources: customer managed policies, identity providers, instance profiles, server certificates, and virtual MFA devices.
* `Aws\Macie2` - This release of the Amazon Macie API replaces the term master account with the term administrator account, including deprecating APIs that use the previous term and adding APIs that use the new term.
* `Aws\PersonalizeEvents` - Increased maximum char size of PutUsers and PutItems properties.
* `Aws\RDS` - EngineMode in the response of DescribeDBClusterSnapshots. SupportedEngineModes, SupportsParallelQuery and SupportsGlobalDatabases in ValidUpgradeTarget of DBEngineVersions in DescribeDBEngineVersions.
* `Aws\WAFV2` - Added the option to inspect the web request body as parsed and filtered JSON (new FieldToMatch type JsonBody), in addition to the existing option to inspect the web request body as plain text.

## 3.173.7 - 2021-02-11

* `Aws\GlueDataBrew` - This release adds support for profile job sampling, which determines the number of rows on which the profile job will be executed.
* `Aws\RDS` - Adding support for RDS Aurora Global Database Failover

## 3.173.6 - 2021-02-09

* `Aws\GameLift` - GameLift FleetIQ users can now use AMD instance families in supported Regions. In addition, FlexMatch matchmaking notification now supports SNS FIFO topics.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for WMA audio only ingest, SMPTE-TT text and image caption ingest, and MPEG-2 video in MXF OP1a outputs.
* `Aws\QLDBSession` - This release adds CapacityExceededException to the AWS QLDBSession API.
* `Aws\QuickSight` - QuickSight now supports Python's paginators for Exploration APIs.
* `Aws\SageMaker` - Add a new optional FrameworkVersion field to Sagemaker Neo CreateCompilationJob API

## 3.173.5 - 2021-02-08

* `Aws\CloudTrail` - ConflictException is now thrown when certain operations are called on resources before CloudTrail has time to load the resources. Two new exceptions have been added to the PutInsightSelectors API.
* `Aws\DataExchange` - This release introduces the new ExportRevision job type, which allows for the export of an entire revision.
* `Aws\ElastiCache` - Documentation updates for elasticache
* `Aws\ElasticLoadBalancingv2` - Adds a target group attribute for application-based stickiness for Application Load Balancers.
* `Aws\GlobalAccelerator` - Global Accelerator now supports bringing your own IP addresses for custom routing accelerators
* `Aws\IVS` - Fixed an issue where StreamStartTime could not be unmarshalled from response. Changed DeleteChannel and DeleteStreamKey response codes to 204.
* `Aws\IoTSiteWise` - Recall CreatePresignedPortalUrl API
* `Aws\Macie2` - This release of the Amazon Macie API adds support for specifying a time range in queries for usage data.

## 3.173.4 - 2021-02-05

* `Aws\ElasticLoadBalancingv2` - Adds a target group attribute for client IP preservation for Network Load Balancers.
* `Aws\Macie` - Documentation updates for Amazon Macie Classic. We replaced the term "master account" with the term "administrator account." An administrator account is used to centrally manage multiple accounts.
* `Aws\Organizations` - Added support for a few additional exception codes for some AWS Organizations APIs.

## 3.173.3 - 2021-02-04

* `Aws\Appflow` - Adding schedule offset as an input for scheduled flows in CreateFlow API. Also, adding data pull start time and data pull end time for DescribeFlowExecutionRecords API response.
* `Aws\Athena` - Adds the Athena ListEngineVersions action and the EngineVersion data type. ListEngineVersions returns the available Athena engine versions, including Auto, as a list of EngineVersion objects.
* `Aws\DLM` - Provide support for EBS Local Snapshots on AWS Outpost in Data Lifecycle Manager (DLM).
* `Aws\EC2` - AWS Outposts now supports EBS local snapshots on Outposts that allows customers to store snapshots of EBS volumes and AMIs locally on S3 on Outposts.
* `Aws\EMRContainers` - This release is to correct the timestamp format to ISO8601 for the date parameters in the describe and list API response objects of Job Run and Virtual Clusters.
* `Aws\QuickSight` - API release for field folders feature.

## 3.173.2 - 2021-02-04

* `Aws\S3` - This release fixes an issue with URL generation

## 3.173.1 - 2021-02-03

* `Aws\AuditManager` - This release adds AccessDeniedException to GetServicesInScope API.
* `Aws\CodeBuild` - Documentation updates for codebuild
* `Aws\ComputeOptimizer` - Documentation updates for Compute Optimizer
* `Aws\CostExplorer` - Clarify valid values for the filter parameter for certain APIs.
* `Aws\EC2` - EC2 Public IP now supports API for setting PTR records on Elastic IP address.
* `Aws\GlueDataBrew` - This release adds the DescribeJobRun API to allow customers retrieve details of a given job run
* `Aws\IoTSiteWise` - Update AccessPolicy API input to support IAM role for IAM mode. Iam role is added as part of accessPolicyIdentity.
* `Aws\Lambda` - Support for creating Lambda Functions using 'nodejs14.x'
* `Aws\S3` - Fix issue with s3 request uri generation
* `Aws\SecurityHub` - Added a ProductArn parameter to DescribeProducts. ProductArn is used to identify the integration to return details for.
* `Aws\WorkMail` - Increased maximum length of ipRanges values for Access Control Rules from 10 to 1024.

## 3.173.0 - 2021-02-02

* `Aws\` - Added privatelink functionality
* `Aws\AppMesh` - App Mesh now supports mutual TLS with two-way peer authentication. You can specify client certificates, server-side TLS validation, and matching of Subject Alternative Names.
* `Aws\ApplicationAutoScaling` - With this release, scheduled actions of Application Auto Scaling can be created in the local time zone and automatically adjusted according to daylight saving changes.
* `Aws\IoTWireless` - Add enum value MqttTopic for Destination ExpressionType, add LoRaWANNetworkServerCertificateId for GetWirelessGatewayCertificate API
* `Aws\LocationService` - Doc only update for Amazon Location Maps that fixes a customer related issue regarding MapConfiguration
* `Aws\LookoutforVision` - This release includes the General Availability (GA) SDK for Amazon Lookout for Vision. New for GA is tagging support for Amazon Lookout for Vision models.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports Image Media Playlists on HLS outputs, version 0.4 (trick-mode).
* `Aws\Organizations` - Documentation updates for AWS Organizations.
* `Aws\RDSDataService` - With the Data API, you can now use UUID and JSON data types as input to your database. Also with the Data API, you can now have a LONG type value returned from your database as a STRING value.
* `Aws\Route53` - Documentation updates for Route 53
* `Aws\S3Control` - Amazon S3 Batch Operations now supports Delete Object Tagging

## 3.172.4 - 2021-01-29

* `Aws\Connect` - Added API to manage queues or get hours of operation for a queue programmatically, which can be used to create new/update queues, or take actions when skills are outside of their hours of operation.
* `Aws\LexModelsV2` - Fixed bug where incorrect Content-Type header was being sent to the LexModelsV2 service
* `Aws\Macie2` - This release of the Amazon Macie API adds support for using object prefixes to refine the scope of a classification job.
* `Aws\MediaLive` - "AWS Elemental MediaLive now supports output to a private VPC. When this property is specified, the output will egress from a user specified VPC."
* `Aws\TranscribeStreamingService` - Amazon Transcribe Streaming Medical now supports Protected Health Information (PHI) identification which enables you to identify PHI entities based on HIPAA Privacy Rule.

## 3.172.3 - 2021-01-28

* `Aws\CloudWatch` - Update to SDK to support label time zones in CloudWatch GetMetricData
* `Aws\GlueDataBrew` - This SDK release adds support for specifying a custom delimiter for input CSV datasets and for CSV job outputs.
* `Aws\IoT` - Documentation updates for IoT DeleteOTAUpdate API
* `Aws\ManagedBlockchain` - This release supports tagging on Amazon Managed Blockchain resources.
* `Aws\RoboMaker` - This release allows Robomaker customers to specify configuration for uploading logs and artifacts generated by their simulation jobs.
* `Aws\WellArchitected` - Documentation updates for AWS Well-Architected Tool

## 3.172.2 - 2021-01-27

* `Aws\AccessAnalyzer` - This release adds Secrets Manager secrets as a supported resource in IAM Access Analyzer to help you identify secrets that can be accessed from outside your account or AWS organization.
* `Aws\CustomerProfiles` - This release makes Uri a required parameter in GetIntegrationRequest and DeleteIntegrationRequest.
* `Aws\ElastiCache` - Add support to pass ParameterGroup name as part updating Engine Version of Global Datastore.
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service adds support for node-to-node encryption and encryption at rest for existing domains running Elasticsearch version 6.7 and above
* `Aws\Lightsail` - Documentation updates for Lightsail
* `Aws\SesV2` - This release includes the ability to assign a configuration set to an email identity (a domain or email address), which allows the settings from the configuration set to be applied to the identity.

## 3.172.1 - 2021-01-26

* `Aws\Backup` - Documentation updates for AWS Backup

## 3.172.0 - 2021-01-22

* `Aws\EC2` - Introducing startDate field for CapacityReservation object for the date and time which the reservation started and adding reserved parameter for ModifyCapacityReservation.
* `Aws\GreengrassV2` - Documentation updates that improve clarity and fix broken links.
* `Aws\LexModelsV2` - This release adds support for Amazon Lex V2 APIs for model building.
* `Aws\LexRuntimeV2` - This release adds support for Amazon Lex V2 APIs for runtime, including Streaming APIs for conversation management.
* `Aws\RDS` - Documentation updates for Amazon RDS
* `Aws\Redshift` - Update VPC endpoint field names.
* `Aws\SSM` - Documentation updates for the ListDocumentFilters API action.

## 3.171.21 - 2021-01-21

* `Aws\Kafka` - Amazon MSK has added a new API that allows you to update all the brokers in the cluster to the specified type.
* `Aws\ResourceGroupsTaggingAPI` - This release adds a new parameter ResourceARNList to Resource Groups Tagging api GetResources api to allow customers retrieve tag data for specific resources.
* `Aws\SecurityHub` - This release of ASFF adds a new Action object and a new resource details object - AwsSsmPatchCompliance. It also adds several new attributes for the AwsEc2NetworkInterface resource type.

## 3.171.20 - 2021-01-19

* `Aws\ACMPCA` - ACM Private CA is launching additional certificate templates and API parameters. This allows customers to create custom certificates for their identity and secure communication use cases.
* `Aws\Chime` - Add support for specifying ChimeBearer header as part of the request for Amazon Chime SDK messaging APIs. Documentation updates.
* `Aws\ECS` - This release adds support to include task definition metadata information such as registeredAt, deregisteredAt, registeredBy as part of DescribeTaskDefinition API.

## 3.171.19 - 2021-01-15

* `Aws\SNS` - Documentation updates for Amazon SNS.

## 3.171.18 - 2021-01-14

* `Aws\CognitoIdentity` - Add Attributes For Access Control support for Amazon Cognito Identity Pools to facilitate access to AWS resources based on attributes from social and corporate identity providers
* `Aws\Pinpoint` - Customers can create segments using 5 new filters. Filters can check for the presence of a substring in attributes and can perform time-based comparisons formatted as ISO_INSTANT datetimes.
* `Aws\S3Control` - Amazon S3 Batch Operations now supports restoring objects from the S3 Intelligent-Tiering Archive Access and Deep Archive Access tiers.
* `Aws\SageMaker` - This feature allows customers to enable/disable model caching on Multi-Model endpoints.

## 3.171.17 - 2021-01-13

* `Aws\FraudDetector` - Added support for cancelling a model version that is TRAINING_IN_PROGRESS.
* `Aws\Personalize` - Miscellaneous updates and improvements to the documentation

## 3.171.16 - 2021-01-12

* `Aws\AppStream` - Adds support for the Smart Card Redirection feature
* `Aws\AuditManager` - This release introduces tag support for assessment frameworks. You can now add, remove, and get tags from existing frameworks, and specify the tags to apply when creating a custom framework.
* `Aws\ElastiCache` - Documentation updates for elasticache
* `Aws\Lightsail` - This release adds IPv6 support for Amazon Lightsail instances, container services, CDN distributions, and load balancers.
* `Aws\SSM` - AWS Systems Manager adds pagination support for DescribeDocumentPermission API

## 3.171.15 - 2021-01-11

* `Aws\KMS` - Adds support for filtering grants by grant ID and grantee principal in ListGrants requests to AWS KMS.
* `Aws\RDS` - This releases adds support for Major Version Upgrades on Aurora MySQL Global Clusters. Customers will be able to upgrade their whole Aurora MySQL Global Cluster to a new major engine version.

## 3.171.14 - 2021-01-07

* `Aws\CodePipeline` - Adding cancelled status and summary for executions aborted by pipeline updates.
* `Aws\DevOpsGuru` - Add resourceHours field in GetAccountHealth API to show total number of resource hours AWS Dev Ops Guru has done work for in the last hour.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for I-Frame-only HLS manifest generation in CMAF outputs.

## 3.171.13 - 2021-01-06

* `Aws\AutoScaling` - This update increases the number of instance types that can be added to the overrides within an mixed instances group configuration.
* `Aws\AutoScalingPlans` - Documentation updates for AWS Auto Scaling
* `Aws\Transfer` - This release adds support for Amazon EFS, so customers can transfer files over SFTP, FTPS and FTP in and out of Amazon S3 as well as Amazon EFS.

## 3.171.12 - 2021-01-05

* `Aws\ApplicationAutoScaling` - Documentation updates for Application Auto Scaling
* `Aws\CostExplorer` - - ### Features - Add new GetCostcategories API - Support filter for GetDimensions, GetTags and GetCostcategories api - Support sortBy metrics for GetDimensions, GetTags and GetCostcategories api

## 3.171.11 - 2021-01-04

* `Aws\CloudSearch` - This release adds support for new Amazon CloudSearch instances.
* `Aws\HealthLake` - Amazon HealthLake now supports exporting data from FHIR Data Stores in Preview.

## 3.171.10 - 2020-12-31

* `Aws\ServiceCatalog` - Enhanced Service Catalog DescribeProvisioningParameters API to return new parameter constraints, i.e., MinLength, MaxLength, MinValue, MaxValue, ConstraintDescription and AllowedPattern

## 3.171.9 - 2020-12-30

* `Aws\ElastiCache` - Documentation updates for elasticache
* `Aws\Macie2` - This release of the Amazon Macie API includes miscellaneous updates and improvements to the documentation.

## 3.171.8 - 2020-12-29

* `Aws\ACMPCA` - This release adds a new parameter "CsrExtensions" in the "CertificateAuthorityConfiguration" data structure, which allows customers to add the addition of KU and SIA into the CA CSR.
* `Aws\ApiGatewayV2` - Amazon API Gateway now supports data mapping for HTTP APIs which allows customers to modify HTTP Request before sending it to their integration and HTTP Response before sending it to the invoker.

## 3.171.7 - 2020-12-28

* `Aws\CloudFront` - Amazon CloudFront has deprecated the CreateStreamingDistribution and CreateStreamingDistributionWithTags APIs as part of discontinuing support for Real-Time Messaging Protocol (RTMP) distributions.

## 3.171.6 - 2020-12-23

* `Aws\ComputeOptimizer` - This release enables AWS Compute Optimizer to analyze and generate optimization recommendations for lambda functions.
* `Aws\DatabaseMigrationService` - AWS DMS launches support for AWS Secrets Manager to manage Oracle ASM Database credentials
* `Aws\ResourceGroups` - Add operation `PutGroupConfiguration`. Support dedicated hosts and add `Pending` in operations `Un/GroupResources`. Add `Resources` in `ListGroupResources` and deprecate `ResourceIdentifiers`.

## 3.171.5 - 2020-12-22

* `Aws\Connect` - This release adds support for quick connects. For details, see the Release Notes in the Amazon Connect Administrator Guide.
* `Aws\CostExplorer` - This release adds additional metadata that may be applicable to the Rightsizing Recommendations.
* `Aws\ElastiCache` - Documentation updates for elasticache
* `Aws\Glue` - AWS Glue Find Matches machine learning transforms now support column importance scores.
* `Aws\IoTWireless` - Adding the ability to use Fingerprint in GetPartnerAccount and ListPartnerAccounts API responses to protect sensitive customer account information.
* `Aws\RDS` - Adds customer-owned IP address (CoIP) support to Amazon RDS on AWS Outposts.
* `Aws\SSM` - SSM Maintenance Window support for registering/updating maintenance window tasks without targets.

## 3.171.4 - 2020-12-22

* `Aws\Connect` - This release adds support for quick connects. For details, see the Release Notes in the Amazon Connect Administrator Guide.
* `Aws\CostExplorer` - This release adds additional metadata that may be applicable to the Rightsizing Recommendations.
* `Aws\ElastiCache` - Documentation updates for elasticache
* `Aws\Glue` - AWS Glue Find Matches machine learning transforms now support column importance scores.
* `Aws\IoTWireless` - Adding the ability to use Fingerprint in GetPartnerAccount and ListPartnerAccounts API responses to protect sensitive customer account information.
* `Aws\RDS` - Adds customer-owned IP address (CoIP) support to Amazon RDS on AWS Outposts.
* `Aws\SSM` - SSM Maintenance Window support for registering/updating maintenance window tasks without targets.

## 3.171.3 - 2020-12-21

* `Aws\APIGateway` - Documentation updates for Amazon API Gateway.
* `Aws\AppRegistry` - New API `SyncResouce` to update AppRegistry system tags.
* `Aws\Batch` - Documentation updates for batch
* `Aws\ConfigService` - AWS Config adds support to save advanced queries. New API operations - GetStoredQuery, PutStoredQuery, ListStoredQueries, DeleteStoredQuery
* `Aws\ConnectParticipant` - This release adds three new APIs: StartAttachmentUpload, CompleteAttachmentUpload, and GetAttachment. For Amazon Connect Chat, you can use these APIs to share files in chat conversations.
* `Aws\Credentials` - Bugfix to throw an exception on empty token file.
* `Aws\DatabaseMigrationService` - AWS DMS launches support for AWS Secrets Manager to manage source and target database credentials.
* `Aws\EC2` - This release adds Tag On Create feature support for the AllocateAddress API.
* `Aws\Glue` - Add 4 connection properties: SECRET_ID, CONNECTOR_URL, CONNECTOR_TYPE, CONNECTOR_CLASS_NAME. Add two connection types: MARKETPLACE, CUSTOM
* `Aws\ManagedBlockchain` - Added support for provisioning and managing public Ethereum nodes on main and test networks supporting secure access using Sigv4 and standard open-source Ethereum APIs.
* `Aws\Outposts` - In this release, AWS Outposts adds support for three new APIs: TagResource, UntagResource, and ListTagsForResource. Customers can now manage tags for their resources through the SDK.
* `Aws\QLDBSession` - Adds "TimingInformation" to all SendCommand API results and "IOUsage" to ExecuteStatementResult, FetchPageResult and CommitTransactionResult.
* `Aws\S3` - Format GetObject's Expires header to be an http-date instead of iso8601
* `Aws\SecurityHub` - Finding providers can now use BatchImportFindings to update Confidence, Criticality, RelatedFindings, Severity, and Types.
* `Aws\ServiceQuotas` - Added the ability to tag applied quotas.

## 3.171.2 - 2020-12-18

* `Aws\` - Removed dev guide from this repo and linked to the new repo where it is hosted
* `Aws\EC2` - EBS io2 volumes now supports Multi-Attach
* `Aws\PersonalizeRuntime` - Updated FilterValues regex pattern to align with Filter Expression.
* `Aws\RDS` - Adds IAM DB authentication information to the PendingModifiedValues output of the DescribeDBInstances API. Adds ClusterPendingModifiedValues information to the output of the DescribeDBClusters API.

## 3.171.1 - 2020-12-17

* `Aws\` - Fix using ecs credentials provider on multi-threaded servers
* `Aws\ConfigService` - Adding PutExternalEvaluation API which grants permission to deliver evaluation result to AWS Config
* `Aws\Credentials` - Aligns the credential resolver to the documentation and other SDK behaviors.
* `Aws\DLM` - Provide Cross-account copy event based policy support in DataLifecycleManager (DLM)
* `Aws\EC2` - C6gn instances are powered by AWS Graviton2 processors and offer 100 Gbps networking bandwidth. These instances deliver up to 40% better price-performance benefit versus comparable x86-based instances
* `Aws\Handler` - GuzzleHandler now accepts errors as well as exceptions on failure; errors are added to the body of the RejectionException from the promise
* `Aws\KMS` - Added CreationDate and LastUpdatedDate timestamps to ListAliases API response
* `Aws\Route53` - This release adds support for DNSSEC signing in Amazon Route 53.
* `Aws\Route53Resolver` - Route 53 Resolver adds support for enabling resolver DNSSEC validation in virtual private cloud (VPC).
* `Aws\SQS` - Amazon SQS adds queue attributes to enable high throughput FIFO.
* `Aws\ServiceCatalog` - Support TagOptions sharing with Service Catalog portfolio sharing.
* `Aws\imagebuilder` - This release adds support for building and distributing container images within EC2 Image Builder.

## 3.171.0 - 2020-12-16

* `Aws\CostExplorer` - This release updates the "MonitorArnList" from a list of String to be a list of Arn for both CreateAnomalySubscription and UpdateAnomalySubscription APIs
* `Aws\LocationService` - Initial release of Amazon Location Service. A new geospatial service providing capabilities to render maps, geocode/reverse geocode, track device locations, and detect geofence entry/exit events.
* `Aws\PrometheusService` - Documentation updates for Amazon Managed Service for Prometheus
* `Aws\QuickSight` - QuickSight now supports connecting to federated data sources of Athena
* `Aws\WellArchitected` - This is the first release of AWS Well-Architected Tool API support, use to review your workload and compare against the latest AWS architectural best practices.

## 3.170.0 - 2020-12-15

* `Aws\GreengrassV2` - AWS IoT Greengrass V2 is a new major version of AWS IoT Greengrass. This release adds several updates such as modular components, continuous deployments, and improved ease of use.
* `Aws\IoT` - AWS IoT Rules Engine adds Kafka Action that allows sending data to Apache Kafka clusters inside a VPC. AWS IoT Device Defender adds custom metrics and machine-learning based anomaly detection.
* `Aws\IoTAnalytics` - FileFormatConfiguration enables data store to save data in JSON or Parquet format. S3Paths enables you to specify the S3 objects that save your channel messages when you reprocess the pipeline.
* `Aws\IoTDeviceAdvisor` - AWS IoT Core Device Advisor is fully managed test capability for IoT devices. Device manufacturers can use Device Advisor to test their IoT devices for reliable and secure connectivity with AWS IoT.
* `Aws\IoTFleetHub` - AWS IoT Fleet Hub, a new feature of AWS IoT Device Management that provides a web application for monitoring and managing device fleets connected to AWS IoT at scale.
* `Aws\IoTWireless` - AWS IoT for LoRaWAN enables customers to setup a private LoRaWAN network by connecting their LoRaWAN devices and gateways to the AWS cloud without managing a LoRaWAN Network Server.
* `Aws\Lambda` - Added support for Apache Kafka as a event source. Added support for TumblingWindowInSeconds for streams event source mappings. Added support for FunctionResponseTypes for streams event source mappings
* `Aws\PrometheusService` - (New Service) Amazon Managed Service for Prometheus is a fully managed Prometheus-compatible monitoring service that makes it easy to monitor containerized applications securely and at scale.
* `Aws\SSM` - Adding support for Change Manager API content

## 3.169.0 - 2020-12-14

* `Aws\` - Added support for github actions
* `Aws\` - Fix using ecs credentials provider on multi-threaded servers
* `Aws\DevOpsGuru` - Documentation updates for DevOps Guru.
* `Aws\EC2` - Add c5n.metal to ec2 instance types list
* `Aws\GlobalAccelerator` - This release adds support for custom routing accelerators

## 3.168.3 - 2020-12-11

* `Aws\AutoScaling` - Documentation updates and corrections for Amazon EC2 Auto Scaling API Reference and SDKs.
* `Aws\CloudTrail` - CloudTrailInvalidClientTokenIdException is now thrown when a call results in the InvalidClientTokenId error code. The Name parameter of the AdvancedEventSelector data type is now optional.
* `Aws\CloudWatch` - Documentation updates for monitoring
* `Aws\GuardDuty` - Documentation updates for GuardDuty
* `Aws\IoTSiteWise` - Added the ListAssetRelationships operation and support for composite asset models, which represent structured sets of properties within asset models.
* `Aws\PI` - You can group DB load according to the dimension groups for database, application, and session type. Amazon RDS also supports the dimensions db.name, db.application.name, and db.session_type.name.

## 3.168.2 - 2020-12-10

* `Aws\EC2` - TGW connect simplifies connectivity of SD-WAN appliances; IGMP support for TGW multicast; VPC Reachability Analyzer for VPC resources connectivity analysis.
* `Aws\NetworkManager` - This release adds API support for Transit Gateway Connect integration into AWS Network Manager.
* `Aws\kendra` - Amazon Kendra now supports adding synonyms to an index through the new Thesaurus resource.

## 3.168.1 - 2020-12-09

* `Aws\EC2` - This release adds support for G4ad instances powered by AMD Radeon Pro V520 GPUs and AMD 2nd Generation EPYC processors
* `Aws\GlobalAccelerator` - This release adds support for custom routing accelerators
* `Aws\Redshift` - Add support for availability zone relocation feature.

## 3.168.0 - 2020-12-08

* `Aws\AuditManager` - AWS Audit Manager helps you continuously audit your AWS usage to simplify how you manage risk and compliance. This update releases the first version of the AWS Audit Manager APIs and SDK.
* `Aws\ECR` - This release adds support for configuring cross-region and cross-account replication of your Amazon ECR images.
* `Aws\EMRContainers` - This release adds support for Amazon EMR on EKS, a simple way to run Spark on Kubernetes.
* `Aws\ForecastService` - This release adds support for the Amazon Forecast Weather Index which can increase forecasting accuracy by automatically including weather forecasts in demand forecasts.
* `Aws\HealthLake` - This release introduces Amazon HealthLake (preview), a HIPAA-eligible service that enables healthcare and life sciences customers to store, transform, query, and analyze health data in the AWS Cloud.
* `Aws\QuickSight` - Added new parameters for join optimization.
* `Aws\Rds` - Added optional configurable lifetime value to Rds AuthTokenGenerator
* `Aws\SageMaker` - This feature helps you monitor model performance characteristics such as accuracy, identify undesired bias in your ML models, and explain model decisions better with explainability drift detection.
* `Aws\SageMakerRuntime` - This feature allows customers to invoke their endpoint with an inference ID. If used and data capture for the endpoint is enabled, this ID will be captured along with request data.
* `Aws\SagemakerEdgeManager` - Amazon SageMaker Edge Manager makes it easy to optimize, secure, monitor, and maintain machine learning (ML) models across fleets of edge devices such as smart cameras, smart speakers, and robots.
* `Aws\kendra` - 1. Amazon Kendra connector for Google Drive repositories 2. Amazon Kendra's relevance ranking models are regularly tuned for each customer by capturing end-user search patterns and feedback.

## 3.167.0 - 2020-12-07

* `Aws\` - Adds cross region pre-signing to various methods in DocDbClient, RdsClient, and NeptuneClient
* `Aws\AppRegistry` - AWS Service Catalog AppRegistry now supports adding, removing, and listing tags on resources after they are created.
* `Aws\DatabaseMigrationService` - Added PreserveTransaction setting to preserve order of CDC for S3 as target. Added CsvNoSupValue setting to replace empty value for columns not included in the supplemental log for S3 as target.

## 3.166.2 - 2020-12-04

* `Aws\DirectoryService` - Documentation updates for ds - updated descriptions
* `Aws\EC2` - This release introduces tag-on-create capability for the CreateImage API. A user can now specify tags that will be applied to the new resources (image, snapshots or both), during creation time.
* `Aws\Kafka` - Adding HEALING to ClusterState.
* `Aws\Lambda` - Added the additional enum InvalidImage to StateReasonCode and LastUpdateStatusReasonCode fields.
* `Aws\LicenseManager` - Automated Discovery now has support for custom tags, and detects software uninstalls.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports black video and audio silence as new conditions to trigger automatic input failover.
* `Aws\Multipart` - Added a validation that a file hasn't been corrupted
* `Aws\RDS` - Adds support for Amazon RDS Cross-Region Automated Backups, the ability to setup automatic replication of snapshots and transaction logs from a primary AWS Region to a secondary AWS Region.
* `Aws\SSM` - AWS Systems Manager Patch Manager MAC OS Support and OpsMetadata Store APIs to store operational metadata for an Application.
* `Aws\WorkSpaces` - Update the import-workspace-image API to have "BYOL_REGULAR_WSP" as a valid input string for ingestion-process.

## 3.166.1 - 2020-12-03

* `Aws\AmplifyBackend` - Regular documentation updates.
* `Aws\Batch` - This release adds support for customer to run Batch Jobs on ECS Fargate, the serverless compute engine built for containers on AWS. Customer can also propagate Job and Job Definition Tags to ECS Task.
* `Aws\ComputeOptimizer` - This release enables AWS Compute Optimizer to analyze and generate optimization recommendations for EBS volumes that are attached to instances.
* `Aws\LicenseManager` - AWS License Manager enables managed entitlements for AWS customers and Software Vendors (ISV). You can track and distribute license entitlements from AWS Marketplace and supported ISVs.

## 3.166.0 - 2020-12-01

* `Aws\CustomerProfiles` - This is the first release of Amazon Connect Customer Profiles, a unified customer profile for your Amazon Connect contact center.
* `Aws\Profile` - PR to remove profile folder from aws-models.

## 3.165.0 - 2020-12-01

* `Aws\AmplifyBackend` - (New Service) The Amplify Admin UI offers an accessible way to develop app backends and manage app content. We recommend that you use the Amplify Admin UI to manage the backend of your Amplify app.
* `Aws\AppIntegrationsService` - The Amazon AppIntegrations service (in preview release) enables you to configure and reuse connections to external applications.
* `Aws\Connect` - This release adds an Amazon Connect API that provides the ability to create tasks, and a set of APIs (in preview) to configure AppIntegrations associations with Amazon Connect instances.
* `Aws\ConnectContactLens` - Contact Lens for Amazon Connect analyzes conversations, both real-time and post-call. The ListRealtimeContactAnalysisSegments API returns a list of analysis segments for a real-time analysis session.
* `Aws\DevOpsGuru` - (New Service) Amazon DevOps Guru is available in public preview. It's a fully managed service that uses machine learning to analyze your operational solutions to help you find and troubleshoot issues.
* `Aws\DirectoryService` - Adding client authentication feature for AWS AD Connector
* `Aws\EC2` - This release adds support for: EBS gp3 volumes; and D3/D3en/R5b/M5zn instances powered by Intel Cascade Lake CPUs
* `Aws\ECRPublic` - Supports Amazon Elastic Container Registry (Amazon ECR) Public, a fully managed registry that makes it easy for a developer to publicly share container software worldwide for anyone to download.
* `Aws\EKS` - Amazon EKS now allows you to define and manage the lifecycle for Kubernetes add-ons for your clusters. This release adds support for the AWS VPC CNI (vpc-cni).
* `Aws\Honeycode` - Introducing APIs to read and write directly from Honeycode tables. Use APIs to pull table and column metadata, then use the read and write APIs to programmatically read and write from the tables.
* `Aws\Lambda` - This release includes support for a new feature: Container images support in AWS Lambda. This adds APIs for deploying functions as container images. AWS Lambda now supports memory up to 10240MB.
* `Aws\LookoutforVision` - This release introduces support for Amazon Lookout for Vision.
* `Aws\Profile` - This is the first release of Amazon Connect Customer Profiles, a unified customer profile for your Amazon Connect contact center.
* `Aws\S3` - S3 adds support for multiple-destination replication, option to sync replica modifications; S3 Bucket Keys to reduce cost of S3 SSE with AWS KMS
* `Aws\SageMaker` - Amazon SageMaker Pipelines for ML workflows. Amazon SageMaker Feature Store, a fully managed repository for ML features.
* `Aws\SageMakerFeatureStoreRuntime` - This release adds support for Amazon SageMaker Feature Store, which makes it easy for customers to create, version, share, and manage curated data for machine learning (ML) development.

## 3.164.1 - 2020-12-01

* `Aws\` - Use the assertSame to make assert equals strict, test namespace improvements
* `Aws\` - Code changes to mock exceptions correctly in mockhandler
* `Aws\EC2` - This release introduces Amazon EC2 Mac1 instances, a new Amazon EC2 instance family built on Apple Mac mini computers, powered by AWS Nitro System, and support running macOS workloads on Amazon EC2

## 3.164.0 - 2020-11-24

* `Aws\Appflow` - Upsolver as a destination connector and documentation update.
* `Aws\Batch` - Add Ec2Configuration in ComputeEnvironment.ComputeResources. Use in CreateComputeEnvironment API to enable AmazonLinux2 support.
* `Aws\CloudFormation` - Adds support for the new Modules feature for CloudFormation. A module encapsulates one or more resources and their respective configurations for reuse across your organization.
* `Aws\CloudTrail` - CloudTrail now includes advanced event selectors, which give you finer-grained control over the events that are logged to your trail.
* `Aws\CodeBuild` - Adding GetReportGroupTrend API for Test Reports.
* `Aws\CognitoIdentityProvider` - This release adds ability to configure Cognito User Pools with third party sms and email providers for sending notifications to users.
* `Aws\Comprehend` - Support Comprehend events detection APIs
* `Aws\ElasticBeanstalk` - Updates the Integer constraint of DescribeEnvironmentManagedActionHistory's MaxItems parameter to [1, 100].
* `Aws\FSx` - This release adds the capability to increase storage capacity of Amazon FSx for Lustre file systems, providing the flexibility to meet evolving storage needs over time.
* `Aws\GameLift` - GameLift FlexMatch is now available as a standalone matchmaking solution. FlexMatch now provides customizable matchmaking for games hosted peer-to-peer, on-premises, or on cloud compute primitives.
* `Aws\IoTSiteWise` - This release adds support for customer managed customer master key (CMK) based encryption in IoT SiteWise.
* `Aws\LexModelBuildingService` - Lex now supports es-419, de-DE locales
* `Aws\MWAA` - (New Service) Amazon MWAA is a managed service for Apache Airflow that makes it easy for data engineers and data scientists to execute data processing workflows in the cloud.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for Vorbis and Opus audio in OGG/OGA containers.
* `Aws\QuickSight` - Support for embedding without user registration. New enum EmbeddingIdentityType. A potential breaking change. Affects code that refers IdentityType enum type directly instead of literal string value.
* `Aws\SFN` - This release of the AWS Step Functions SDK introduces support for Synchronous Express Workflows
* `Aws\TimestreamWrite` - Adds support of upserts for idempotent updates to Timestream.
* `Aws\TranscribeStreamingService` - Amazon Transcribe Medical streaming added medical specialties and HTTP/2 support. Amazon Transcribe streaming supports additional languages. Both support OGG/OPUS and FLAC codecs for streaming.

## 3.163.3 - 2020-11-23

* `Aws\ApplicationInsights` - Add Detected Workload to ApplicationComponent which shows the workloads that installed in the component
* `Aws\AutoScaling` - Documentation updates and corrections for Amazon EC2 Auto Scaling API Reference and SDKs.
* `Aws\CodeArtifact` - Add support for the NuGet package format.
* `Aws\CodeStarconnections` - Added support for the UpdateHost API.
* `Aws\DynamoDB` - With this release, you can capture data changes in any Amazon DynamoDB table as an Amazon Kinesis data stream. You also can use PartiQL (SQL-compatible language) to manipulate data in DynamoDB tables.
* `Aws\EC2` - This release adds support for Multiple Private DNS names to DescribeVpcEndpointServices response.
* `Aws\ECS` - This release adds support for updating capacity providers, specifying custom instance warmup periods for capacity providers, and using deployment circuit breaker for your ECS Services.
* `Aws\EMR` - Add API support for EMR Studio, a new notebook-first IDE for data scientists and data engineers with single sign-on, Jupyter notebooks, automated infrastructure provisioning, and job diagnosis.
* `Aws\ElastiCache` - Documentation updates for elasticache
* `Aws\ForecastService` - Releasing the set of PredictorBacktestExportJob APIs which allow customers to export backtest values and item-level metrics data from Predictor training.
* `Aws\Glue` - Feature1 - Glue crawler adds data lineage configuration option. Feature2 - AWS Glue Data Catalog adds APIs for PartitionIndex creation and deletion as part of Enhancement Partition Management feature.
* `Aws\IoT` - This release enables users to identify different file types in the over-the-air update (OTA) functionality using fileType parameter for CreateOTAUpdate API
* `Aws\Kafka` - Adding MAINTENANCE and REBOOTING_BROKER to Cluster states.
* `Aws\Lambda` - This release includes support for new feature: Code Signing for AWS Lambda. This adds new resources and APIs to configure Lambda functions to accept and verify signed code artifacts at deployment.
* `Aws\LicenseManager` - AWS License Manager now provides the ability for license administrators to be able to associate license configurations to AMIs shared with their AWS account
* `Aws\Outposts` - Support specifying tags during the creation of the Outpost resource. Tags are now returned in the response body of Outpost APIs.
* `Aws\SSOAdmin` - AWS Single Sign-On now enables attribute-based access control for workforce identities to simplify permissions in AWS
* `Aws\SecurityHub` - Updated the account management API to support the integration with AWS Organizations. Added new methods to allow users to view and manage the delegated administrator account for Security Hub.
* `Aws\TimestreamQuery` - Amazon Timestream now supports "QueryStatus" in Query API which has information about cumulative bytes scanned, metered, as well as progress percentage for the query.
* `Aws\Translate` - This update adds new operations to create and manage parallel data in Amazon Translate. Parallel data is a resource that you can use to run Active Custom Translation jobs.
* `Aws\signer` - AWS Signer is launching code-signing for AWS Lambda. Now customers can cryptographically sign Lambda code to ensure trust, integrity, and functionality.

## 3.163.2 - 2020-11-20

* `Aws\AppMesh` - This release makes tag value a required attribute of the tag's key-value pair.
* `Aws\AppRegistry` - AWS Service Catalog AppRegistry Documentation update
* `Aws\Chime` - The Amazon Chime SDK for messaging provides the building blocks needed to build chat and other real-time collaboration features.
* `Aws\CloudHSMV2` - Added managed backup retention, a feature that enables customers to retain backups for a configurable period after which CloudHSM service will automatically delete them.
* `Aws\CodeGuruReviewer` - This release supports tagging repository association resources in Amazon CodeGuru Reviewer.
* `Aws\CognitoIdentity` - Added SDK pagination support for ListIdentityPools
* `Aws\Connect` - This release adds a set of Amazon Connect APIs to programmatically control instance creation, modification, description and deletion.
* `Aws\Kafka` - This release adds support for PER TOPIC PER PARTITION monitoring on AWS MSK clusters.
* `Aws\Macie2` - The Amazon Macie API now provides S3 bucket metadata that indicates whether any one-time or recurring classification jobs are configured to analyze data in a bucket.
* `Aws\S3` - Add new documentation regarding automatically generated Content-MD5 headers when using the SDK or CLI.

## 3.163.1 - 2020-11-19

* `Aws\AutoScaling` - You can now create Auto Scaling groups with multiple launch templates using a mixed instances policy, making it easy to deploy an AMI with an architecture that is different from the rest of the group.
* `Aws\CloudWatchEvents` - EventBridge now supports Resource-based policy authorization on event buses. This enables cross-account PutEvents API calls, creating cross-account rules, and simplifies permission management.
* `Aws\CostExplorer` - Additional metadata that may be applicable to the recommendation.
* `Aws\DirectoryService` - Adding multi-region replication feature for AWS Managed Microsoft AD
* `Aws\EventBridge` - EventBridge now supports Resource-based policy authorization on event buses. This enables cross-account PutEvents API calls, creating cross-account rules, and simplifies permission management.
* `Aws\Glue` - Adding support for Glue Schema Registry. The AWS Glue Schema Registry is a new feature that allows you to centrally discover, control, and evolve data stream schemas.
* `Aws\KinesisAnalyticsV2` - Amazon Kinesis Data Analytics now supports building and running streaming applications using Apache Flink 1.11 and provides a way to access the Apache Flink dashboard for supported Flink versions.
* `Aws\Lambda` - Added the starting position and starting position timestamp to ESM Configuration. Now customers will be able to view these fields for their ESM.
* `Aws\LexModelBuildingService` - Amazon Lex supports managing input and output contexts as well as default values for slots.
* `Aws\LexRuntimeService` - Amazon Lex now supports the ability to view and manage active contexts associated with a user session.
* `Aws\MediaLive` - The AWS Elemental MediaLive APIs and SDKs now support the ability to see the software update status on Link devices
* `Aws\Redshift` - Amazon Redshift support for returning ClusterNamespaceArn in describeClusters

## 3.163.0 - 2020-11-18

* `Aws\Backup` - AWS Backup now supports cross-account backup, enabling AWS customers to securely copy their backups across their AWS accounts within their AWS organizations.
* `Aws\CloudFormation` - This release adds ChangeSets support for Nested Stacks. ChangeSets offer a preview of how proposed changes to a stack might impact existing resources or create new ones.
* `Aws\CodeBuild` - AWS CodeBuild - Adding Status field for Report Group
* `Aws\Credentials` - Implements the AWS_SHARED_CREDENTIALS_FILE environment variable for specifying a file to retrieve credentials from
* `Aws\EC2` - EC2 Fleet adds support of DeleteFleets API for instant type fleets. Now you can delete an instant type fleet and terminate all associated instances with a single API call.
* `Aws\ElastiCache` - Adding Memcached 1.6 to parameter family
* `Aws\Outposts` - Mark the Name parameter in CreateOutpost as required.
* `Aws\S3Control` - AWS S3 Storage Lens provides visibility into your storage usage and activity trends at the organization or account level, with aggregations by Region, storage class, bucket, and prefix.

## 3.162.0 - 2020-11-17

* `Aws\Chime` - This release adds CRUD APIs for Amazon Chime SipMediaApplications and SipRules. It also adds the API for creating outbound PSTN calls for Amazon Chime meetings.
* `Aws\Connect` - This release adds support for user hierarchy group and user hierarchy structure. For details, see the Release Notes in the Amazon Connect Administrator Guide.
* `Aws\FMS` - Added Firewall Manager policy support for AWS Network Firewall resources.
* `Aws\Macie2` - The Amazon Macie API now has a lastRunErrorStatus property to indicate if account- or bucket-level errors occurred during the run of a one-time classification job or the latest run of a recurring job.
* `Aws\NetworkFirewall` - (New Service) AWS Network Firewall is a managed network layer firewall service that makes it easy to secure your virtual private cloud (VPC) networks and block malicious traffic.
* `Aws\RDS` - Support copy-db-snapshot in the one region on cross clusters and local cluster for RDSonVmware. Add target-custom-availability-zone parameter to specify where a snapshot should be copied.

## 3.161.2 - 2020-11-16

* `Aws\CodePipeline` - We show details about inbound executions and id of action executions in GetPipelineState API. We also add ConflictException to StartPipelineExecution, RetryStageExecution, StopPipelineExecution APIs.
* `Aws\DatabaseMigrationService` - Adding MoveReplicationTask feature to move replication tasks between instances
* `Aws\IoTSecureTunneling` - Support using multiple data streams per tunnel using the Secure Tunneling multiplexing feature.
* `Aws\IoTSiteWise` - This release supports Unicode characters for string operations in formulae computes in SiteWise. For more information, search for SiteWise in Amazon What's new or refer the SiteWise documentation.
* `Aws\QuickSight` - Adding new parameters for dashboard persistence
* `Aws\SNS` - Documentation updates for Amazon SNS.
* `Aws\SageMaker` - This feature enables customers to encrypt their Amazon SageMaker Studio storage volumes with customer master keys (CMKs) managed by them in AWS Key Management Service (KMS).
* `Aws\ServiceCatalog` - Support import of CloudFormation stacks into Service Catalog provisioned products.
* `Aws\Synthetics` - AWS Synthetics now supports Environment Variables to assign runtime parameters in the canary scripts.

## 3.161.1 - 2020-11-13

* `Aws\ElasticLoadBalancingv2` - Adds dualstack support for Network Load Balancers (TCP/TLS only), an attribute for WAF fail open for Application Load Balancers, and an attribute for connection draining for Network Load Balancers.
* `Aws\Shield` - This release adds APIs for two new features: 1) Allow customers to bundle resources into protection groups and treat as a single unit. 2) Provide per-account event summaries to all AWS customers.
* `Aws\Textract` - AWS Textract now allows customers to specify their own KMS key to be used for asynchronous jobs output results, AWS Textract now also recognizes handwritten text from English documents.

## 3.161.0 - 2020-11-12

* `Aws\AppRegistry` - AWS Service Catalog AppRegistry provides a repository of your applications, their resources, and the application metadata that you use within your enterprise.
* `Aws\IoT` - This release adds a batchMode parameter to the IotEvents, IotAnalytics, and Firehose actions which allows customers to send an array of messages to the corresponding services
* `Aws\LexModelBuildingService` - Lex now supports es-ES, it-IT, fr-FR and fr-CA locales
* `Aws\Lightsail` - This release adds support for Amazon Lightsail container services. You can now create a Lightsail container service, and deploy Docker images to it.
* `Aws\PersonalizeRuntime` - Adds support to use dynamic filters with Personalize.
* `Aws\Polly` - Amazon Polly adds new Australian English female voice - Olivia. Olivia is available as Neural voice only.
* `Aws\RoboMaker` - This release introduces Robomaker Worldforge TagsOnCreate which allows customers to tag worlds as they are being generated by providing the tags while configuring a world generation job.

## 3.160.0 - 2020-11-11

* `Aws\Amplify` - Whereas previously custom headers were set via the app's buildspec, custom headers can now be set directly on the Amplify app for both ci/cd and manual deploy apps.
* `Aws\ForecastService` - Providing support of custom quantiles in CreatePredictor API.
* `Aws\GlueDataBrew` - This is the initial SDK release for AWS Glue DataBrew. DataBrew is a visual data preparation tool that enables users to clean and normalize data without writing any code.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for Automated ABR encoding and improved the reliability of embedded captions in accelerated outputs.
* `Aws\QuickSight` - QuickSight now supports Column-level security and connecting to Oracle data source.
* `Aws\ServiceCatalog` - Adding support to remove a Provisioned Product launch role via UpdateProvisionedProductProperties

## 3.159.1 - 2020-11-10

* `Aws\AutoScaling` - Documentation updates and corrections for Amazon EC2 Auto Scaling API Reference and SDKs.
* `Aws\EC2` - This release adds support for Gateway Load Balancer VPC endpoints and VPC endpoint services
* `Aws\ElasticLoadBalancingv2` - Added support for Gateway Load Balancers, which make it easy to deploy, scale, and run third-party virtual networking appliances.
* `Aws\SSM` - Add SessionId as a filter for DescribeSessions API

## 3.159.0 - 2020-11-09

* `Aws\` - Removes sensitive data from debug logs
* `Aws\DataSync` - DataSync now enables customers to adjust the network bandwidth used by a running AWS DataSync task.
* `Aws\DynamoDB` - This release adds supports for exporting Amazon DynamoDB table data to Amazon S3 to perform analytics at any scale.
* `Aws\ECS` - This release provides native support for specifying Amazon FSx for Windows File Server file systems as volumes in your Amazon ECS task definitions.
* `Aws\ElasticsearchService` - Adding support for package versioning in Amazon Elasticsearch Service
* `Aws\FSx` - This release adds support for creating DNS aliases for Amazon FSx for Windows File Server, and using AWS Backup to automate scheduled, policy-driven backup plans for Amazon FSx file systems.
* `Aws\IoTAnalytics` - AWS IoT Analytics now supports Late Data Notifications for datasets, dataset content creation using previous version IDs, and includes the LastMessageArrivalTime attribute for channels and datastores.
* `Aws\Macie2` - Sensitive data findings in Amazon Macie now include enhanced location data for Apache Avro object containers and Apache Parquet files.
* `Aws\S3` - S3 Intelligent-Tiering adds support for Archive and Deep Archive Access tiers; S3 Replication adds replication metrics and failure notifications, brings feature parity for delete marker replication
* `Aws\SSM` - add a new filter to allow customer to filter automation executions by using resource-group which used for execute automation
* `Aws\StorageGateway` - Added bandwidth rate limit schedule for Tape and Volume Gateways

## 3.158.22 - 2020-11-06

* `Aws\DLM` - Amazon Data Lifecycle Manager now supports the creation and retention of EBS-backed Amazon Machine Images
* `Aws\EC2` - Network card support with four new attributes: NetworkCardIndex, NetworkPerformance, DefaultNetworkCardIndex, and MaximumNetworkInterfaces, added to the DescribeInstanceTypes API.
* `Aws\IoTSiteWise` - Remove the CreatePresignedPortalUrl API
* `Aws\MediaLive` - Support for SCTE35 ad markers in OnCuePoint style in RTMP outputs.
* `Aws\SSM` - Documentation updates for Systems Manager

## 3.158.21 - 2020-11-05

* `Aws\AppMesh` - This release adds circuit breaking capabilities to your mesh with connection pooling and outlier detection support.
* `Aws\CloudWatchEvents` - With this release, customers can now reprocess past events by storing the events published on event bus in an encrypted archive.
* `Aws\DynamoDB` - This release adds a new ReplicaStatus INACCESSIBLE_ENCRYPTION_CREDENTIALS for the Table description, indicating when a key used to encrypt a regional replica table is not accessible.
* `Aws\EC2` - Documentation updates for EC2.
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service now provides the ability to define a custom endpoint for your domain and link an SSL certificate from ACM, making it easier to refer to Kibana and the domain endpoint.
* `Aws\EventBridge` - With this release, customers can now reprocess past events by storing the events published on event bus in an encrypted archive.
* `Aws\FraudDetector` - Added support for deleting resources like Variables, ExternalModels, Outcomes, Models, ModelVersions, Labels, EventTypes and EntityTypes. Updated DeleteEvent operation to catch missing exceptions.
* `Aws\Lambda` - Support Amazon MQ as an Event Source.
* `Aws\RDS` - Supports a new parameter to set the max allocated storage in gigabytes for the CreateDBInstanceReadReplica API.
* `Aws\kendra` - Amazon Kendra now supports providing user context in your query requests, Tokens can be JSON or JWT format. This release also introduces support for Confluence cloud datasources.

## 3.158.20 - 2020-11-04

* `Aws\AutoScaling` - Capacity Rebalance helps you manage and maintain workload availability during Spot interruptions by proactively augmenting your Auto Scaling group with a new instance before interrupting an old one.
* `Aws\CloudWatch` - Documentation updates for monitoring
* `Aws\EC2` - Added support for Client Connect Handler for AWS Client VPN. Fleet supports launching replacement instances in response to Capacity Rebalance recommendation.
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service now supports native SAML authentication that seamlessly integrates with the customers' existing SAML 2.0 Identity Provider (IdP).
* `Aws\IoT` - Updated API documentation and added paginator for AWS Iot Registry ListThingPrincipals API.
* `Aws\MQ` - Amazon MQ introduces support for RabbitMQ, a popular message-broker with native support for AMQP 0.9.1. You can now create fully-managed RabbitMQ brokers in the cloud.
* `Aws\MarketplaceMetering` - Adding Vendor Tagging Support in MeterUsage and BatchMeterUsage API.
* `Aws\ServiceCatalog` - Service Catalog API ListPortfolioAccess can now support a maximum PageSize of 100.
* `Aws\TranscribeStreamingService` - With this release, Amazon Transcribe now supports real-time transcription from audio sources in Italian (it-IT) and German(de-DE).
* `Aws\XRay` - Releasing new APIs GetInsightSummaries, GetInsightEvents, GetInsight, GetInsightImpactGraph and updating GetTimeSeriesServiceStatistics API for AWS X-Ray Insights feature

## 3.158.19 - 2020-11-02

* `Aws\EC2` - This release adds support for the following features: 1. P4d instances based on NVIDIA A100 GPUs. 2. NetworkCardIndex attribute to support multiple network cards.

## 3.158.18 - 2020-10-30

* `Aws\Braket` - This release supports tagging for Amazon Braket quantum-task resources. It also supports tag-based access control for quantum-task APIs.
* `Aws\DatabaseMigrationService` - Adding DocDbSettings to support DocumentDB as a source.
* `Aws\ElastiCache` - Documentation updates for AWS ElastiCache
* `Aws\Macie2` - This release of the Amazon Macie API adds an eqExactMatch operator for filtering findings. With this operator you can increase the precision of your finding filters and suppression rules.
* `Aws\MediaLive` - Support for HLS discontinuity tags in the child manifests. Support for incomplete segment behavior in the media output. Support for automatic input failover condition settings.
* `Aws\SNS` - Documentation updates for Amazon SNS
* `Aws\imagebuilder` - This feature increases the number of accounts that can be added to the Launch permissions within an Image Builder Distribution configuration.

## 3.158.17 - 2020-10-29

* `Aws\APIGateway` - Support disabling the default execute-api endpoint for REST APIs.
* `Aws\CodeArtifact` - Add support for tagging of CodeArtifact domain and repository resources.
* `Aws\EC2` - Support for Appliance mode on Transit Gateway that simplifies deployment of stateful network appliances. Added support for AWS Client VPN Self-Service Portal.
* `Aws\ElasticLoadBalancingv2` - Application Load Balancer (ALB) now supports the gRPC protocol-version. With this release, customers can use ALB to route and load balance gRPC traffic between gRPC enabled clients and microservices.
* `Aws\MarketplaceCommerceAnalytics` - Documentation updates for marketplacecommerceanalytics to specify four data sets which are deprecated.
* `Aws\SesV2` - This release enables customers to manage their own contact lists and end-user subscription preferences.
* `Aws\StorageGateway` - Adding support for access based enumeration on SMB file shares, file share visibility on SMB file shares, and file upload notifications for all file shares

## 3.158.16 - 2020-10-28

* `Aws\EC2` - AWS Nitro Enclaves general availability. Added support to RunInstances for creating enclave-enabled EC2 instances. New APIs to associate an ACM certificate with an IAM role, for enclave consumption.
* `Aws\IoT` - This release adds support for GG-Managed Job Namespace
* `Aws\WorkMail` - Documentation update for Amazon WorkMail

## 3.158.15 - 2020-10-27

* `Aws\Glue` - AWS Glue machine learning transforms now support encryption-at-rest for labels and trained models.
* `Aws\S3` - Added validation that required S3 parameters are non empty

## 3.158.14 - 2020-10-26

* `Aws\Neptune` - This feature enables custom endpoints for Amazon Neptune clusters. Custom endpoints simplify connection management when clusters contain instances with different capacities and configuration settings.
* `Aws\SageMaker` - This release enables customers to bring custom images for use with SageMaker Studio notebooks.
* `Aws\kendra` - Amazon Kendra now supports indexing data from Confluence Server.

## 3.158.13 - 2020-10-23

* `Aws\Macie2` - This release of the Amazon Macie API includes miscellaneous updates and improvements to the documentation.
* `Aws\MediaTailor` - MediaTailor now supports ad marker passthrough for HLS. Use AdMarkerPassthrough to pass EXT-X-CUE-IN, EXT-X-CUE-OUT, and EXT-X-SPLICEPOINT-SCTE35 from origin manifests into personalized manifests.
* `Aws\QuickSight` - Support description on columns.

## 3.158.12 - 2020-10-22

* `Aws\AccessAnalyzer` - API Documentation updates for IAM Access Analyzer.
* `Aws\Appflow` - Salesforce connector creation with customer provided client id and client secret, incremental pull configuration, salesforce upsert write operations and execution ID when on-demand flows are executed.
* `Aws\SNS` - SNS now supports a new class of topics: FIFO (First-In-First-Out). FIFO topics provide strictly-ordered, deduplicated, filterable, encryptable, many-to-many messaging at scale.
* `Aws\ServiceCatalog` - Documentation updates for servicecatalog

## 3.158.11 - 2020-10-21

* `Aws\CloudFront` - CloudFront adds support for managing the public keys for signed URLs and signed cookies directly in CloudFront (it no longer requires the AWS root account).
* `Aws\EC2` - instance-storage-info nvmeSupport added to DescribeInstanceTypes API
* `Aws\GlobalAccelerator` - This release adds support for specifying port overrides on AWS Global Accelerator endpoint groups.
* `Aws\Glue` - AWS Glue crawlers now support incremental crawls for the Amazon Simple Storage Service (Amazon S3) data source.
* `Aws\Organizations` - AWS Organizations renamed the 'master account' to 'management account'.
* `Aws\kendra` - This release adds custom data sources: a new data source type that gives you full control of the documents added, modified or deleted during a data source sync while providing run history metrics.

## 3.158.10 - 2020-10-20

* `Aws\AppSync` - Documentation updates to AppSync to correct several typos.
* `Aws\Batch` - Adding evaluateOnExit to job retry strategies.
* `Aws\ElasticBeanstalk` - EnvironmentStatus enum update to include Aborting, LinkingFrom and LinkingTo

## 3.158.9 - 2020-10-19

* `Aws\` - Fixed issue with polyfill referencing to wrong IDN folder structure in generated zip file
* `Aws\Backup` - Documentation updates for Cryo
* `Aws\CloudFront` - Amazon CloudFront adds support for Origin Shield.
* `Aws\Credentials` - Suppressed a file access warning in AssumeRoleWithWebIdentityCredentialProvider
* `Aws\DocDB` - Documentation updates for docdb
* `Aws\SSM` - This Patch Manager release now supports Common Vulnerabilities and Exposure (CVE) Ids for missing packages via the DescribeInstancePatches API.
* `Aws\ServiceCatalog` - An Admin can now update the launch role associated with a Provisioned Product. Admins and End Users can now view the launch role associated with a Provisioned Product.

## 3.158.8 - 2020-10-16

* `Aws\MediaLive` - The AWS Elemental MediaLive APIs and SDKs now support the ability to transfer the ownership of MediaLive Link devices across AWS accounts.
* `Aws\Organizations` - Documentation updates for AWS Organizations.

## 3.158.7 - 2020-10-15

* `Aws\AccessAnalyzer` - This release adds support for the ApplyArchiveRule api in IAM Access Analyzer. The ApplyArchiveRule api allows users to apply an archive rule retroactively to existing findings in an analyzer.
* `Aws\Budgets` - This release introduces AWS Budgets Actions, allowing you to define an explicit response(or set of responses) to take when your budget exceeds it's action threshold.
* `Aws\CostExplorer` - This release improves email validation for subscriptions on the SDK endpoints.
* `Aws\DatabaseMigrationService` - When creating Endpoints, Replication Instances, and Replication Tasks, the feature provides you the option to specify friendly name to the resources.
* `Aws\Glue` - API Documentation updates for Glue Get-Plan API
* `Aws\GroundStation` - Adds error message attribute to DescribeContact DataflowDetails
* `Aws\IoT` - Add new variable, lastStatusChangeDate, to DescribeDomainConfiguration API
* `Aws\Macie2` - This release of the Amazon Macie API adds support for pausing and resuming classification jobs. Also, sensitive data findings now include location data for up to 15 occurrences of sensitive data.
* `Aws\RDS` - Return tags for all resources in the output of DescribeDBInstances, DescribeDBSnapshots, DescribeDBClusters, and DescribeDBClusterSnapshots API operations.
* `Aws\Rekognition` - This SDK Release introduces new API (DetectProtectiveEquipment) for Amazon Rekognition. This release also adds ServiceQuotaExceeded exception to Amazon Rekognition IndexFaces API.
* `Aws\SSM` - This Patch Manager release now supports searching for available packages from Amazon Linux and Amazon Linux 2 via the DescribeAvailablePatches API.
* `Aws\Transfer` - Add support to associate VPC Security Groups at server creation.
* `Aws\WorkMail` - Add CreateOrganization and DeleteOrganization API operations.
* `Aws\WorkSpaces` - Documentation updates for WorkSpaces
* `Aws\XRay` - Enhancing CreateGroup, UpdateGroup, GetGroup and GetGroups APIs to support configuring X-Ray Insights Notifications. Adding TraceLimit information into X-Ray BatchGetTraces API response.

## 3.158.6 - 2020-10-09

* `Aws\Amplify` - Performance mode optimizes for faster hosting performance by keeping content cached at the edge for a longer interval - enabling can make code changes can take up to 10 minutes to roll out.
* `Aws\EKS` - This release introduces a new Amazon EKS error code: "ClusterUnreachable"
* `Aws\MediaLive` - WAV audio output. Extracting ancillary captions in MP4 file inputs. Priority on channels feeding a multiplex (higher priority channels will tend to have higher video quality).
* `Aws\ServiceCatalog` - This new API takes either a ProvisonedProductId or a ProvisionedProductName, along with a list of 1 or more output keys and responds with the (key,value) pairs of those outputs.
* `Aws\Snowball` - We added new APIs to allow customers to better manage their device shipping. You can check if your shipping label expired, generate a new label, and tell us that you received or shipped your job.

## 3.158.5 - 2020-10-08

* `Aws\CloudWatchEvents` - Amazon EventBridge (formerly called CloudWatch Events) adds support for target Dead-letter Queues and custom retry policies.
* `Aws\CostExplorer` - You can now create hierarchical cost categories by choosing "Cost Category" as a dimension. You can also track the status of your cost category updates to your cost and usage information.
* `Aws\Credentials` - Fixes an issue involving outdated exceptions in Guzzle 7 with the InstanceProfileProvider workflow.
* `Aws\EC2` - AWS EC2 RevokeSecurityGroupIngress and RevokeSecurityGroupEgress APIs will return IpPermissions which do not match with any existing IpPermissions for security groups in default VPC and EC2-Classic.
* `Aws\EventBridge` - Amazon EventBridge adds support for target Dead Letter Queues (DLQs) and custom retry policies.
* `Aws\RDS` - Supports a new parameter to set the max allocated storage in gigabytes for restore database instance from S3 and restore database instance to a point in time APIs.
* `Aws\Rekognition` - This release provides location information for the manifest validation files.
* `Aws\SNS` - Documentation updates for SNS.
* `Aws\SageMaker` - This release enables Sagemaker customers to convert Tensorflow and PyTorch models to CoreML (ML Model) format.

## 3.158.4 - 2020-10-07

* `Aws\ComputeOptimizer` - This release enables AWS Compute Optimizer to analyze EC2 instance-level EBS read and write operations, and throughput when generating recommendations for your EC2 instances and Auto Scaling groups.
* `Aws\CostExplorer` - Enables Rightsizing Recommendations to analyze and present EC2 instance-level EBS metrics when generating recommendations. Returns AccessDeniedException if the account is not opted into Rightsizing
* `Aws\ElastiCache` - This release introduces User and UserGroup to allow customers to have access control list of the Redis resources for AWS ElastiCache. This release also adds support for Outposts for AWS ElastiCache.
* `Aws\MediaPackage` - AWS Elemental MediaPackage provides access logs that capture detailed information about requests sent to a customer's MediaPackage channel.

## 3.158.3 - 2020-10-06

* `Aws\DatabaseMigrationService` - Added new S3 endpoint settings to allow partitioning CDC data by date for S3 as target. Exposed some Extra Connection Attributes as endpoint settings for relational databases as target.
* `Aws\EC2` - This release supports returning additional information about local gateway virtual interfaces, and virtual interface groups.
* `Aws\KinesisAnalyticsV2` - Amazon Kinesis Analytics now supports StopApplication with 'force' option
* `Aws\MarketplaceCatalog` - AWS Marketplace Catalog now supports FailureCode for change workflows to help differentiate client errors and server faults.

## 3.158.2 - 2020-10-05

* `Aws\Credentials` - Added circular reference check on assume_role
* `Aws\DynamoDB` - This release adds a new ReplicaStatus REGION DISABLED for the Table description. This state indicates that the AWS Region for the replica is inaccessible because the AWS Region is disabled.
* `Aws\DynamoDBStreams` - Documentation updates for streams.dynamodb
* `Aws\Glue` - AWS Glue crawlers now support Amazon DocumentDB (with MongoDB compatibility) and MongoDB collections. You can choose to crawl the entire data set or only a small sample to reduce crawl time.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for AVC-I and VC3 encoding in the MXF OP1a container, Nielsen non-linear watermarking, and InSync FrameFormer frame rate conversion.
* `Aws\SageMaker` - This release adds support for launching Amazon SageMaker Studio in your VPC. Use AppNetworkAccessType in CreateDomain API to disable access to public internet and restrict the network traffic to VPC.

## 3.158.1 - 2020-10-02

* `Aws\Batch` - Support tagging for Batch resources (compute environment, job queue, job definition and job) and tag based access control on Batch APIs
* `Aws\Credentials` - Throws a more informative error when trying to read SSO from non existing profile
* `Aws\ElasticLoadBalancingv2` - This release adds support for tagging listeners, rules, and target groups on creation. This release also supported tagging operations through tagging api's for listeners and rules.
* `Aws\PersonalizeEvents` - Adds new APIs to write item and user records to Datasets.
* `Aws\RDS` - Adds the NCHAR Character Set ID parameter to the CreateDbInstance API for RDS Oracle.
* `Aws\S3` - Amazon S3 Object Ownership is a new S3 feature that enables bucket owners to automatically assume ownership of objects that are uploaded to their buckets by other AWS Accounts.
* `Aws\ServiceDiscovery` - Added support for optional parameters for DiscoverInstances API in AWS Cloud Map

## 3.158.0 - 2020-10-01

* `Aws\AppSync` - Exposes the wafWebAclArn field on GraphQL api records. The wafWebAclArn field contains the amazon resource name of a WAF Web ACL if the AWS AppSync API is associated with one.
* `Aws\EMR` - Documentation updates for elasticmapreduce
* `Aws\Glue` - Adding additional optional map parameter to get-plan api
* `Aws\Kafka` - Added support for Enabling Zookeeper Encryption in Transit for AWS MSK.
* `Aws\QuickSight` - QuickSight now supports connecting to AWS Timestream data source
* `Aws\S3` - Adds support to S3 and S3 Control clients for managing resources stored on S3 Outposts via Outposts-specific ARNs and endpoints.
* `Aws\WAFV2` - AWS WAF is now available for AWS AppSync GraphQL APIs. AWS WAF protects against malicious attacks with AWS Managed Rules or your own custom rules. For more information see the AWS WAF Developer Guide.

## 3.157.0 - 2020-09-30

* `Aws\ApplicationAutoScaling` - This release extends Auto Scaling support for cluster storage of Managed Streaming for Kafka. Auto Scaling monitors and automatically expands storage capacity when a critical usage threshold is met.
* `Aws\Credentials` - Fix credentialprovider error with undefined index source_profile when using credential_source
* `Aws\DataSync` - This release enables customers to create s3 location for S3 bucket's located on an AWS Outpost.
* `Aws\DirectConnect` - Documentation updates for AWS Direct Connect.
* `Aws\EMR` - Amazon EMR customers can now use EC2 placement group to influence the placement of master nodes in a high-availability (HA) cluster across distinct underlying hardware to improve cluster availability.
* `Aws\IoT` - AWS IoT Rules Engine adds Timestream action. The Timestream rule action lets you stream time-series data from IoT sensors and applications to Amazon Timestream databases for time series analysis.
* `Aws\MediaConnect` - MediaConnect now supports reservations to provide a discounted rate for a specific outbound bandwidth over a period of time.
* `Aws\Pinpoint` - Amazon Pinpoint - Features - Customers can start a journey based on an event being triggered by an endpoint or user.
* `Aws\S3` - Amazon S3 on Outposts expands object storage to on-premises AWS Outposts environments, enabling you to store and retrieve objects using S3 APIs and features.
* `Aws\S3Control` - Amazon S3 on Outposts expands object storage to on-premises AWS Outposts environments, enabling you to store and retrieve objects using S3 APIs and features.
* `Aws\S3Outposts` - Amazon S3 on Outposts expands object storage to on-premises AWS Outposts environments, enabling you to store and retrieve objects using S3 APIs and features.
* `Aws\SecurityHub` - Added several new resource details objects. Added additional details for CloudFront distributions, IAM roles, and IAM access keys. Added a new ResourceRole attribute for resources.
* `Aws\imagebuilder` - EC2 Image Builder adds support for copying AMIs created by Image Builder to accounts specific to each Region.

## 3.156.0 - 2020-09-29

* `Aws\Connect` - Update TagResource API documentation to include Contact Flows and Routing Profiles as supported resources.
* `Aws\EC2` - This release adds support for Client to Client routing for AWS Client VPN.
* `Aws\SSM` - Simple update to description of ComplianceItemStatus.
* `Aws\Schemas` - Added support for schemas of type JSONSchemaDraft4. Added ExportSchema API that converts schemas in AWS Events registry and Discovered schemas from OpenApi3 to JSONSchemaDraft4.
* `Aws\TimestreamQuery` - (New Service) Amazon Timestream is a fast, scalable, fully managed, purpose-built time series database that makes it easy to store and analyze trillions of time series data points per day.
* `Aws\TimestreamWrite` - (New Service) Amazon Timestream is a fast, scalable, fully managed, purpose-built time series database that makes it easy to store and analyze trillions of time series data points per day.

## 3.155.4 - 2020-09-28

* `Aws\ApplicationAutoScaling` - This release extends Application Auto Scaling support to AWS Comprehend Entity Recognizer endpoint, allowing automatic updates to provisioned Inference Units to maintain targeted utilization level.
* `Aws\RDS` - This release adds the InsufficientAvailableIPsInSubnetFault error for RDS Proxy.
* `Aws\S3` - Corrected urlencoding of CopySource key for MultipartCopy

## 3.155.3 - 2020-09-25

* `Aws\Batch` - Support custom logging, executionRole, secrets, and linuxParameters (initProcessEnabled, maxSwap, swappiness, sharedMemorySize, and tmpfs). Also, add new context keys for awslogs.
* `Aws\ConfigService` - Make the delivery-s3-bucket as an optional parameter for conformance packs and organizational conformance packs
* `Aws\DocDB` - Documentation updates for docdb
* `Aws\EC2` - This release supports returning additional information about local gateway resources, such as the local gateway route table.
* `Aws\FraudDetector` - Increased maximum length of eventVariables values for GetEventPrediction from 256 to 1024.
* `Aws\STS` - Documentation update for AssumeRole error

## 3.155.2 - 2020-09-24

* `Aws\Amplify` - Allow Oauth Token in CreateApp call to be a maximum of 1000 characters instead of 100
* `Aws\EKS` - Amazon EKS now supports configuring your cluster's service CIDR during cluster creation.
* `Aws\SavingsPlans` - Introducing Queued SavingsPlans that will enable customers to queue their purchase request of Savings Plans for future dates.
* `Aws\Synthetics` - AWS Synthetics now supports AWS X-Ray Active Tracing feature. RunConfig is now an optional parameter with timeout updated from (60 - 900 seconds) to (3 - 840 seconds).
* `Aws\Textract` - AWS Textract now supports output results for asynchronous jobs to customer specified s3 bucket.
* `Aws\TranscribeService` - Amazon Transcribe now supports WebM, OGG, AMR and AMR-WB as input formats. You can also specify an output key as a location within your S3 buckets to store the output of your transcription jobs.

## 3.155.1 - 2020-09-23

* `Aws\Backup` - This release allows customers to enable or disable advanced backup settings in backup plan. As part of this feature AWS Backup added support for Windows VSS backup option for EC2 resources.
* `Aws\CostExplorer` - This release provides access to Cost Anomaly Detection Public Preview APIs. Cost Anomaly Detection finds cost anomalies based on your historical cost and usage using Machine Learning models.
* `Aws\QuickSight` - Added Sheet information to DescribeDashboard, DescribeTemplate and DescribeAnalysis API response.
* `Aws\Translate` - Improvements to DeleteTerminology API.

## 3.155.0 - 2020-09-22

* `Aws\Comprehend` - Amazon Comprehend integrates with Amazon SageMaker GroundTruth to allow its customers to annotate their datasets using GroundTruth and train their models using Comprehend Custom APIs.
* `Aws\Credentials` - Added credential provider which retrieves cached SSO credentials from the CLI
* `Aws\Credentials` - Fixes a crash in PHP 8.0 by calling array_values on the default chain array passed into self::chain
* `Aws\DynamoDBStreams` - Documentation updates for streams.dynamodb
* `Aws\LexModelBuildingService` - Lex now supports es-US locales
* `Aws\WorkMail` - Adding support for Mailbox Export APIs

## 3.154.7 - 2020-09-21

* `Aws\CloudWatchEvents` - Add support for Redshift Data API Targets
* `Aws\EventBridge` - Add support for Redshift Data API Targets
* `Aws\Glue` - Adding support to update multiple partitions of a table in a single request
* `Aws\IoTSiteWise` - This release supports IAM mode for SiteWise Monitor portals
* `Aws\RDS` - Documentation updates for the RDS DescribeExportTasks API
* `Aws\ResourceGroups` - Documentation updates and corrections for Resource Groups API Reference and SDKs.
* `Aws\ResourceGroupsTaggingAPI` - Documentation updates for the Resource Groups Tagging API.

## 3.154.6 - 2020-09-18

* `Aws\CodeStarconnections` - New integration with the GitHub provider type.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports batch operations, which allow users to start, stop, and delete multiple MediaLive resources with a single request.
* `Aws\SSOAdmin` - Documentation updates for AWS SSO APIs.

## 3.154.5 - 2020-09-17

* `Aws\APIGateway` - Adds support for mutual TLS authentication for public regional REST Apis
* `Aws\ApiGatewayV2` - Adds support for mutual TLS authentication and disableAPIExecuteEndpoint for public regional HTTP Apis
* `Aws\CloudFront` - Documentation updates for CloudFront
* `Aws\Comprehend` - Amazon Comprehend now supports detecting Personally Identifiable Information (PII) entities in a document.
* `Aws\ElasticsearchService` - Adds support for data plane audit logging in Amazon Elasticsearch Service.
* `Aws\TranscribeStreamingService` - Amazon Transcribe now supports channel identification in real-time streaming, which enables you to transcribe multi-channel streaming audio.
* `Aws\kendra` - Amazon Kendra now supports additional file formats and metadata for FAQs.

## 3.154.4 - 2020-09-16

* `Aws\Connect` - This release adds support for contact flows and routing profiles. For details, see the Release Notes in the Amazon Connect Administrator Guide.
* `Aws\DLM` - Customers can now provide multiple schedules within a single Data Lifecycle Manager (DLM) policy. Each schedule supports tagging, Fast Snapshot Restore (FSR) and cross region copy individually.
* `Aws\Greengrass` - This release includes the ability to set run-time configuration for a Greengrass core. The Telemetry feature, also included in this release, can be configured via run-time configuration per core.
* `Aws\SSM` - The ComplianceItemEntry Status description was updated to address Windows patches that aren't applicable.
* `Aws\ServiceCatalog` - Enhance DescribeProvisionedProduct API to allow useProvisionedProduct Name as Input, so customer can provide ProvisionedProduct Name instead of ProvisionedProduct Id to describe a ProvisionedProduct.

## 3.154.3 - 2020-09-15

* `Aws\Budgets` - Documentation updates for Daily Cost and Usage budgets
* `Aws\EC2` - T4g instances are powered by AWS Graviton2 processors
* `Aws\Kafka` - Added new API's to support SASL SCRAM Authentication with MSK Clusters.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports CDI (Cloud Digital Interface) inputs which enable uncompressed video from applications on Elastic Cloud Compute (EC2), AWS Media Services, and from AWS partners
* `Aws\Organizations` - AWS Organizations now enables you to add tags to the AWS accounts, organizational units, organization root, and policies in your organization.
* `Aws\SageMaker` - Sagemaker Ground Truth: Added support for a new Streaming feature which helps to continuously feed data and receive labels in real time. This release adds a new input and output SNS data channel.
* `Aws\TranscribeService` - Amazon Transcribe now supports automatic language identification, which enables you to transcribe audio files without needing to know the language in advance.
* `Aws\kendra` - Amazon Kendra now returns confidence scores for 'document' query responses.

## 3.154.2 - 2020-09-14

* `Aws\DocDB` - Updated API documentation and added paginators for DescribeCertificates, DescribeDBClusterParameterGroups, DescribeDBClusterParameters, DescribeDBClusterSnapshots and DescribePendingMaintenanceActions
* `Aws\EC2` - This release adds support for the T4G instance family to the EC2 ModifyDefaultCreditSpecification and GetDefaultCreditSpecification APIs.
* `Aws\ManagedBlockchain` - Introducing support for Hyperledger Fabric 1.4. When using framework version 1.4, the state database may optionally be specified when creating peer nodes (defaults to CouchDB).
* `Aws\SFN` - This release of the AWS Step Functions SDK introduces support for AWS X-Ray.
* `Aws\Test` - Tweaks test for PartitionEndpointProvider to accomodate changed S3 endpoint.

## 3.154.1 - 2020-09-11

* `Aws\WorkSpaces` - Adds API support for WorkSpaces Cross-Region Redirection feature.

## 3.154.0 - 2020-09-10

* `Aws\CloudFront` - Cloudfront adds support for Brotli. You can enable brotli caching and compression support by enabling it in your Cache Policy.
* `Aws\EBS` - Documentation updates for Amazon EBS direct APIs.
* `Aws\Pinpoint` - Update SMS message model description to clearly indicate that the MediaUrl field is reserved for future use and is not supported by Pinpoint as of today.
* `Aws\S3` - Bucket owner verification feature added. This feature introduces the x-amz-expected-bucket-owner and x-amz-source-expected-bucket-owner headers.
* `Aws\SSOAdmin` - This is an initial release of AWS Single Sign-On (SSO) Access Management APIs. This release adds support for SSO operations which could be used for managing access to AWS accounts.

## 3.153.0 - 2020-09-09

* `Aws\Glue` - Adding support for partitionIndexes to improve GetPartitions performance.
* `Aws\KinesisAnalyticsV2` - Kinesis Data Analytics is adding new AUTOSCALING application status for applications during auto scaling and also adding FlinkRunConfigurationDescription in the ApplicationDetails.
* `Aws\RedshiftDataAPIService` - The Amazon Redshift Data API is generally available. This release enables querying Amazon Redshift data and listing various database objects.

## 3.152.1 - 2020-09-08

* `Aws\ApiGatewayV2` - You can now secure HTTP APIs using Lambda authorizers and IAM authorizers. These options enable you to make flexible auth decisions using a Lambda function, or using IAM policies, respectively.
* `Aws\CodeBuild` - AWS CodeBuild - Support keyword search for test cases in DecribeTestCases API . Allow deletion of reports in the report group, before deletion of report group using the deleteReports flag.
* `Aws\ElasticLoadBalancingv2` - Adds support for Application Load Balancers on Outposts.
* `Aws\LexModelBuildingService` - Amazon Lex supports en-AU locale
* `Aws\QuickSight` - Adds tagging support for QuickSight customization resources. A user can now specify a list of tags when creating a customization resource and use a customization ARN in QuickSight's tagging APIs.

## 3.152.0 - 2020-09-04

* `Aws\Credentials` - This change adds support for the credential_source option in the credential file.
* `Aws\SSM` - Documentation-only updates for AWS Systems Manager
* `Aws\WorkSpaces` - Adding support for Microsoft Office 2016 and Microsoft Office 2019 in BYOL Images
* `Aws\XRay` - Enhancing CreateGroup, UpdateGroup, GetGroup and GetGroups APIs to support configuring X-Ray Insights

## 3.151.6 - 2020-09-03

* `Aws\GuardDuty` - GuardDuty findings triggered by failed events now include the error code name within the AwsApiCallAction section.
* `Aws\MediaPackage` - Enables inserting a UTCTiming XML tag in the output manifest of a DASH endpoint which a media player will use to help with time synchronization.
* `Aws\SFN` - This release of the AWS Step Functions SDK introduces support for payloads up to 256KB for Standard and Express workflows
* `Aws\kendra` - Amazon Kendra now returns confidence scores for both 'answer' and 'question and answer' query responses.

## 3.151.5 - 2020-09-02

* `Aws\Credentials` - Web identity credential provider now clears cached path for web identity token if token file fails to load.
* `Aws\EC2` - This release adds a new transit gateway attachment state and resource type.
* `Aws\Macie2` - This release of the Amazon Macie API introduces additional statistics for the size and count of Amazon S3 objects that Macie can analyze as part of a classification job.

## 3.151.4 - 2020-09-01

* `Aws\CodeGuruReviewer` - Add support for repository analysis based code reviews
* `Aws\S3` - Fixes an issue where a stream would be created that uploaded a file name instead of the file for a multipart upload
* `Aws\SecurityHub` - Added a PatchSummary object for security findings. The PatchSummary object provides details about the patch compliance status of an instance.

## 3.151.3 - 2020-08-31

* `Aws\Backup` - Documentation updates for Cryo
* `Aws\CloudFront` - CloudFront now supports real-time logging for CloudFront distributions. CloudFront real-time logs are more detailed, configurable, and are available in real time.
* `Aws\EC2` - Amazon EC2 and Spot Fleet now support modification of launch template configs for a running fleet enabling instance type, instance weight, AZ, and AMI updates without losing the current fleet ID.
* `Aws\SQS` - Documentation updates for SQS.

## 3.151.2 - 2020-08-28

* `Aws\CloudFront` - You can now manage CloudFront's additional, real-time metrics with the CloudFront API.
* `Aws\CostandUsageReportService` - This release add MONTHLY as the new supported TimeUnit for ReportDefinition.
* `Aws\EMR` - Amazon EMR adds support for ICMP, port -1, in Block Public Access Exceptions and API access for EMR Notebooks execution. You can now non-interactively execute EMR Notebooks and pass input parameters.
* `Aws\Route53` - Documentation updates for Route 53

## 3.151.1 - 2020-08-27

* `Aws\EC2` - Introduces support to initiate Internet Key Exchange (IKE) negotiations for VPN connections from AWS. A user can now send the initial IKE message to their Customer Gateway (CGW) from VPN endpoints.
* `Aws\GameLift` - GameLift FleetIQ as a standalone feature is now generally available. FleetIQ makes low-cost Spot instances viable for game hosting. Use GameLift FleetIQ with your EC2 Auto Scaling groups.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for WebM DASH outputs as well as H.264 4:2:2 10-bit output in MOV and MP4.
* `Aws\Redshift` - Documentation updates for Amazon Redshift.

## 3.151.0 - 2020-08-26

* `Aws\Appflow` - Amazon AppFlow is a fully managed integration service that securely transfers data between AWS services and SaaS applications. This update releases the first version of Amazon AppFlow APIs and SDK.
* `Aws\Route53Resolver` - Route 53 Resolver adds support for resolver query logs
* `Aws\S3` - Documentation updates for S3 methods with ambiguous success

## 3.150.3 - 2020-08-24

* `Aws\CloudWatchLogs` - Documentation updates for CloudWatch Logs
* `Aws\DatabaseMigrationService` - Added new endpoint settings to include columns with Null and Empty value when using Kinesis and Kafka as target. Added a new endpoint setting to set maximum message size when using Kafka as target.
* `Aws\EC2` - This release enables customers to use VPC prefix lists in their transit gateway route tables, and it adds support for Provisioned IOPS SSD (io2) EBS volumes.
* `Aws\IoTSiteWise` - Add traversalDirection to ListAssociatedAssetsRequest and add portal status to ListPortalsResponse
* `Aws\Kafka` - Add UpdateConfiguration and DeleteConfiguration operations.
* `Aws\SSM` - Add string length constraints to OpsDataAttributeName and OpsFilterValue.
* `Aws\XRay` - AWS X-Ray now supports tagging on sampling rules and groups.

## 3.150.2 - 2020-08-20

* `Aws\ApiGatewayV2` - Customers can now create Amazon API Gateway HTTP APIs that route requests to AWS AppConfig, Amazon EventBridge, Amazon Kinesis Data Streams, Amazon SQS, and AWS Step Functions.
* `Aws\Chime` - Documentation updates for chime
* `Aws\FSx` - Documentation updates for Amazon FSx

## 3.150.1 - 2020-08-19

* `Aws\IVS` - Amazon Interactive Video Service (IVS) now offers customers the ability to create private channels, allowing customers to restrict their streams by channel or viewer.
* `Aws\LakeFormation` - Adding additional field in ListPermissions API response to return RAM resource share ARN if a resource were shared through AWS RAM service.
* `Aws\Organizations` - Minor documentation updates for AWS Organizations
* `Aws\ServiceCatalog` - Enhance SearchProvisionedProducts API to allow queries using productName and provisioningArtifactName. Added lastProvisioningRecordId and lastSuccessfulRecordId to Read ProvisionedProduct APIs
* `Aws\StorageGateway` - Added WORM, tape retention lock, and custom pool features for virtual tapes.
* `Aws\TranscribeStreamingService` - Amazon Transcribe and Amazon Transcribe Medical now enable you to identify different speakers in your real-time streams with speaker identification.

## 3.150.0 - 2020-08-18

* `Aws\CodeBuild` - Documentation updates for codebuild
* `Aws\CognitoIdentityProvider` - Adding the option to use a service linked role to publish events to Pinpoint.
* `Aws\DataSync` - DataSync support for filters as input arguments to the ListTasks and ListLocations API calls.
* `Aws\IdentityStore` - AWS Single Sign-On (SSO) Identity Store service provides an interface to retrieve all of your users and groups. It enables entitlement management per user or group for AWS SSO and other IDPs.
* `Aws\SecurityHub` - New details for DynamoDB tables, Elastic IP addresses, IAM policies and users, RDS DB clusters and snapshots, and Secrets Manager secrets. Added details for AWS KMS keys and RDS DB instances.
* `Aws\SesV2` - This release includes new APIs to allow customers to add or remove email addresses from their account-level suppression list in bulk.

## 3.149.2 - 2020-08-17

* `Aws\ACM` - ACM provides support for the new Private CA feature Cross-account CA sharing. ACM users can issue certificates signed by a private CA belonging to another account where the CA was shared with them.
* `Aws\ACMPCA` - ACM Private CA is launching cross-account support. This allows customers to share their private CAs with other accounts, AWS Organizations, and organizational units to issue end-entity certificates.
* `Aws\ECR` - This feature adds support for pushing and pulling Open Container Initiative (OCI) artifacts.
* `Aws\ElasticLoadBalancing` - Adds support for HTTP Desync Mitigation in Classic Load Balancers.
* `Aws\ElasticLoadBalancingv2` - Adds support for HTTP Desync Mitigation in Application Load Balancers.
* `Aws\Kinesis` - Introducing ShardFilter for ListShards API to filter the shards using a position in the stream, and ChildShards support for GetRecords and SubscribeToShard API to discover children shards on shard end
* `Aws\QuickSight` - Amazon QuickSight now supports programmatic creation and management of analyses with new APIs.
* `Aws\RoboMaker` - This release introduces RoboMaker Simulation WorldForge, a capability that automatically generates one or more simulation worlds.

## 3.149.1 - 2020-08-14

* `Aws\AppStream` - Adds support for the Desktop View feature
* `Aws\Braket` - Fixing bug in our SDK model where device status and device type had been flipped.
* `Aws\EC2` - New C5ad instances featuring AMD's 2nd Generation EPYC processors, offering up to 96 vCPUs, 192 GiB of instance memory, 3.8 TB of NVMe based SSD instance storage, and 20 Gbps in Network bandwidth
* `Aws\LicenseManager` - This release includes ability to enforce license assignment rules with EC2 Dedicated Hosts.
* `Aws\SageMaker` - Amazon SageMaker now supports 1) creating real-time inference endpoints using model container images from Docker registries in customers' VPC 2) AUC(Area under the curve) as AutoPilot objective metric

## 3.149.0 - 2020-08-13

* `Aws\AppSync` - Documentation update for AWS AppSync support for Direct Lambda Resolvers.
* `Aws\Braket` - Amazon Braket general availability with Device and Quantum Task operations.
* `Aws\CognitoIdentityProvider` - Adding ability to customize expiry for Refresh, Access and ID tokens.
* `Aws\EC2` - Added MapCustomerOwnedIpOnLaunch and CustomerOwnedIpv4Pool to ModifySubnetAttribute to allow CoIP auto assign. Fields are returned in DescribeSubnets and DescribeNetworkInterfaces responses.
* `Aws\EKS` - Adding support for customer provided EC2 launch templates and AMIs to EKS Managed Nodegroups. Also adds support for Arm-based instances to EKS Managed Nodegroups.
* `Aws\Macie2` - This release of the Amazon Macie API includes miscellaneous updates and improvements to the documentation.
* `Aws\RDS` - This release allows customers to specify a replica mode when creating or modifying a Read Replica, for DB engines which support this feature.

## 3.148.3 - 2020-08-12

* `Aws\Cloud9` - Add ConnectionType input parameter to CreateEnvironmentEC2 endpoint. New parameter enables creation of environments with SSM connection.
* `Aws\Comprehend` - Amazon Comprehend Custom Entity Recognition now supports Spanish, German, French, Italian and Portuguese and up to 25 entity types per model.
* `Aws\EC2` - Introduces support for IPv6-in-IPv4 IPsec tunnels. A user can now send traffic from their on-premise IPv6 network to AWS VPCs that have IPv6 support enabled.
* `Aws\FSx` - This release adds the capability to create persistent file systems for throughput-intensive workloads using Hard Disk Drive (HDD) storage and an optional read-only Solid-State Drive (SSD) cache.
* `Aws\IoT` - Audit finding suppressions: Device Defender enables customers to turn off non-compliant findings for specific resources on a per check basis.
* `Aws\Lambda` - Support for creating Lambda Functions using 'java8.al2' and 'provided.al2'
* `Aws\Transfer` - Adds security policies to control cryptographic algorithms advertised by your server, additional characters in usernames and length increase, and FIPS compliant endpoints in the US and Canada regions.
* `Aws\WorkSpaces` - Adds optional EnableWorkDocs property to WorkspaceCreationProperties in the ModifyWorkspaceCreationProperties API

## 3.148.2 - 2020-08-11

* `Aws\Build\Docs` - Moves cookie consent into footer
* `Aws\EC2` - This release rolls back the EC2 On-Demand Capacity Reservations (ODCRs) release 1.11.831 published on 2020-07-30, which was deployed in error.
* `Aws\Lambda` - Support Managed Streaming for Kafka as an Event Source. Support retry until record expiration for Kinesis and Dynamodb streams event source mappings.
* `Aws\Organizations` - Minor documentation update for AWS Organizations
* `Aws\S3` - Add support for in-region CopyObject and UploadPartCopy through S3 Access Points
* `Aws\S3` - Change cache clearing in StreamWrapper to account for custom protocol use.

## 3.148.1 - 2020-08-10

* `Aws\EC2` - Remove CoIP Auto-Assign feature references.
* `Aws\Glue` - Starting today, you can further control orchestration of your ETL workloads in AWS Glue by specifying the maximum number of concurrent runs for a Glue workflow.
* `Aws\SavingsPlans` - Updates to the list of services supported by this API.

## 3.148.0 - 2020-08-07

* `Aws\Glue` - AWS Glue now adds support for Network connection type enabling you to access resources inside your VPC using Glue crawlers and Glue ETL jobs.
* `Aws\Organizations` - Documentation updates for some new error reasons.
* `Aws\S3` - Updates Amazon S3 API reference documentation. 
* `Aws\S3\Crypto` - This change includes fixes for issues that were reported by Sophie Schmieg from the Google ISE team, and for issues that were discovered by AWS Cryptography.
* `Aws\SMS` - In this release, AWS Server Migration Service (SMS) has added new features: 1. APIs to work with application and instance level validation 2. Import application catalog from AWS Application Discovery Service 3. For an application you can start on-demand replication

## 3.147.14 - 2020-08-06

* `Aws\EC2` - This release supports Wavelength resources, including carrier gateways, and carrier IP addresses.
* `Aws\LexModelBuildingService` - Amazon Lex supports the option to enable accuracy improvements and specify an intent classification confidence score threshold.
* `Aws\LexRuntimeService` - Amazon Lex supports intent classification confidence scores along with a list of the top five intents.
* `Aws\Personalize` - Add 'exploration' functionality
* `Aws\PersonalizeEvents` - Adds support implicit and explicit impression input
* `Aws\PersonalizeRuntime` - Adds support for implicit impressions

## 3.147.13 - 2020-08-05

* `Aws\AppSync` - AWS AppSync releases support for Direct Lambda Resolvers.
* `Aws\FSx` - Documentation updates for StorageCapacity input value format.
* `Aws\ResourceGroupsTaggingAPI` - Documentation updates for the Resource Group Tagging API namespace.
* `Aws\SNS` - Documentation updates for SNS.
* `Aws\TranscribeService` - Amazon Transcribe now supports custom language models, which can improve transcription accuracy for your specific use case.

## 3.147.12 - 2020-08-04

* `Aws\Health` - Documentation updates for health

## 3.147.11 - 2020-08-03

* `Aws\` - Updates docs to comply with GDPR laws
* `Aws\SSM` - Adds a waiter for CommandExecuted and paginators for various other APIs.

## 3.147.10 - 2020-07-31

* `Aws\Chime` - This release increases the CreateMeetingWithAttendee max attendee limit to 10.
* `Aws\PersonalizeRuntime` - Adds support to use filters with Personalized Ranking recipe
* `Aws\ResourceGroupsTaggingAPI` - Updates to the list of services supported by this API.
* `Aws\StorageGateway` - Add support for gateway VM deprecation dates
* `Aws\WAFV2` - Add ManagedByFirewallManager flag to the logging configuration, which indicates whether AWS Firewall Manager controls the configuration.

## 3.147.9 - 2020-07-30

* `Aws\CloudFront` - Documentation updates for CloudFront
* `Aws\CodeBuild` - Adding support for BuildBatch, and CodeCoverage APIs. BuildBatch allows you to model your project environment in source, and helps start multiple builds with a single API call. CodeCoverage allows you to track your code coverage using AWS CodeBuild. 
* `Aws\EC2` - EC2 On-Demand Capacity Reservations now adds support to bring your own licenses (BYOL) of Windows operating system to launch EC2 instances. 
* `Aws\GuardDuty` - GuardDuty can now provide detailed cost metrics broken down by account, data source, and S3 resources, based on the past 30 days of usage. This new feature also supports viewing cost metrics for all member accounts as a GuardDuty master.
* `Aws\Kafka` - Amazon MSK has added a new API that allows you to reboot brokers within a cluster. 
* `Aws\Organizations` - Documentation updates for AWS Organizations
* `Aws\ResourceGroups` - Improved documentation for Resource Groups API operations.
* `Aws\ServiceCatalog` - This release adds support for ProvisionProduct, UpdateProvisionedProduct & DescribeProvisioningParameters by product name, provisioning artifact name and path name. In addition DescribeProvisioningParameters now returns a list of provisioning artifact outputs.
* `Aws\SesV2` - This release makes more API operations available to customers in version 2 of the Amazon SES API. With these additions, customers can now access sending authorization, custom verification email, and template API operations. With this release, Amazon SES is also providing new and updated APIs to allow customers to request production access.

## 3.147.8 - 2020-07-29

* `Aws\EC2` - Adding support to target EC2 On-Demand Capacity Reservations within an AWS Resource Group to launch EC2 instances.
* `Aws\ECR` - This release adds support for encrypting the contents of your Amazon ECR repository with customer master keys (CMKs) stored in AWS Key Management Service.
* `Aws\Firehose` - This release includes a new Kinesis Data Firehose feature that supports data delivery to Https endpoint and to partners. You can now use Kinesis Data Firehose to ingest real-time data and deliver to Https endpoint and partners in a serverless, reliable, and salable manner.
* `Aws\GuardDuty` - GuardDuty now supports S3 Data Events as a configurable data source type. This feature expands GuardDuty's monitoring scope to include S3 data plane operations, such as GetObject and PutObject. This data source is optional and can be enabled or disabled at anytime. Accounts already using GuardDuty must first enable the new feature to use it; new accounts will be enabled by default. GuardDuty masters can configure this data source for individual member accounts and GuardDuty masters associated through AWS Organizations can automatically enable the data source in member accounts.
* `Aws\ResourceGroups` - Resource Groups released a new feature that enables you to create a group with an associated configuration that specifies how other AWS services interact with the group. There are two new operations `GroupResources` and `UngroupResources` to work on a group with a configuration. In this release, you can associate EC2 Capacity Reservations with a resource group. Resource Groups also added a new request parameter `Group` to replace `GroupName` for all existing operations.
* `Aws\S3\Crypto` - Add crypto-specific user-agent string to encryption clients.
* `Aws\ServiceDiscovery` - Added new attribute AWS_EC2_INSTANCE_ID for RegisterInstance API 

## 3.147.7 - 2020-07-28

* `Aws\AutoScaling` - Now you can enable Instance Metadata Service Version 2 (IMDSv2) or disable the instance metadata endpoint with Launch Configurations.
* `Aws\EC2` - Introduces support for tag-on-create capability for the following APIs: CreateVpnConnection, CreateVpnGateway, and CreateCustomerGateway. A user can now add tags while creating these resources. For further detail, please see AWS Tagging Strategies.
* `Aws\IVS` - Added a new error code, PendingVerification, to differentiate between errors caused by insufficient IAM permissions and errors caused by account verification.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports several new features: EBU-TT-D captions in Microsoft Smooth outputs; interlaced video in HEVC outputs; video noise reduction (using temporal filtering) in HEVC outputs.
* `Aws\RDS` - Adds reporting of manual cluster snapshot quota to DescribeAccountAttributes API
* `Aws\SecurityHub` - Added UpdateSecurityHubConfiguration API. Security Hub now allows customers to choose whether to automatically enable new controls that are added to an existing standard that the customer enabled. For example, if you enabled Foundational Security Best Practices for an account, you can automatically enable new controls as we add them to that standard. By default, new controls are enabled.
* `Aws\imagebuilder` - This release updates distribution configurations to allow periods in AMI names.

## 3.147.6 - 2020-07-27

* `Aws\DataSync` - Today AWS DataSync releases support for self-managed object storage Locations and the new TransferMode Option.
* `Aws\DatabaseMigrationService` - Basic endpoint settings for relational databases, Preflight validation API.
* `Aws\EC2` - m6gd, c6gd, r6gd instances are powered by AWS Graviton2 processors and support local NVMe instance storage
* `Aws\FraudDetector` - Moved the eventTypeName attribute for PutExternalModel API to inputConfiguration. Model ID's no longer allow hyphens.
* `Aws\Glue` - Add ability to manually resume workflows in AWS Glue providing customers further control over the orchestration of ETL workloads.
* `Aws\SSM` - Assorted doc ticket-fix updates for Systems Manager.

## 3.147.5 - 2020-07-24

* `Aws\` - Adds region validation as a valid host label when region is being used to construct an endpoint. Note this does not take effect when a custom endpoint is supplied.
* `Aws\CloudWatch` - AWS CloudWatch ListMetrics now supports an optional parameter (RecentlyActive) to filter results by only metrics that have received new datapoints in the past 3 hours. This enables more targeted metric data retrieval through the Get APIs
* `Aws\FSx` - Documentation update for FSx for Lustre
* `Aws\FraudDetector` - GetPrediction has been replaced with GetEventPrediction. PutExternalModel has been simplified to accept a role ARN.
* `Aws\MQ` - Amazon MQ now supports LDAP (Lightweight Directory Access Protocol), providing authentication and authorization of Amazon MQ users via a customer designated LDAP server.
* `Aws\Macie2` - This release of the Amazon Macie API introduces additional criteria for sorting and filtering query results for account quotas and usage statistics.
* `Aws\MediaConnect` - You can now disable an entitlement to stop streaming content to the subscriber's flow temporarily. When you are ready to allow content to start streaming to the subscriber's flow again, you can enable the entitlement.
* `Aws\MediaPackage` - The release adds daterange as a new ad marker option. This option enables MediaPackage to insert EXT-X-DATERANGE tags in HLS and CMAF manifests. The EXT-X-DATERANGE tag is used to signal ad and program transition events.
* `Aws\SageMaker` - Sagemaker Ground Truth:Added support for OIDC (OpenID Connect) to authenticate workers via their own identity provider instead of through Amazon Cognito. This release adds new APIs (CreateWorkforce, DeleteWorkforce, and ListWorkforces) to SageMaker Ground Truth service. Sagemaker Neo: Added support for detailed target device description by using TargetPlatform fields - OS, architecture, and accelerator. Added support for additional compilation parameters by using JSON field CompilerOptions. Sagemaker Search: SageMaker Search supports transform job details in trial components.
* `Aws\kendra` - Amazon Kendra now supports sorting query results based on document attributes. Amazon Kendra also introduced an option to enclose table and column names with double quotes for database data sources. 

## 3.147.4 - 2020-07-23

* `Aws\ConfigService` - Adding service linked configuration aggregation support along with new enums for config resource coverage
* `Aws\DirectConnect` - Documentation updates for AWS Direct Connect
* `Aws\FSx` - Adds support for AutoImport, a new FSx for Lustre feature that allows customers to configure their FSx file system to automatically update its contents when new objects are added to S3 or existing objects are overwritten.
* `Aws\Glue` - Added new ConnectionProperties: "KAFKA_SSL_ENABLED" (to toggle SSL connections) and "KAFKA_CUSTOM_CERT" (import CA certificate file)
* `Aws\Lightsail` - This release adds support for Amazon Lightsail content delivery network (CDN) distributions and SSL/TLS certificates.
* `Aws\WorkSpaces` - Added UpdateWorkspaceImagePermission API to share Amazon WorkSpaces images across AWS accounts.

## 3.147.3 - 2020-07-22

* `Aws\MediaLive` - The AWS Elemental MediaLive APIs and SDKs now support the ability to get thumbnails for MediaLive devices that are attached or not attached to a channel. Previously, this thumbnail feature was available only on the console.
* `Aws\QuickSight` - New API operations - GetSessionEmbedUrl, CreateNamespace, DescribeNamespace, ListNamespaces, DeleteNamespace, DescribeAccountSettings, UpdateAccountSettings, CreateAccountCustomization, DescribeAccountCustomization, UpdateAccountCustomization, DeleteAccountCustomization. Modified API operations to support custom permissions restrictions - RegisterUser, UpdateUser, UpdateDashboardPermissions

## 3.147.2 - 2020-07-21

* `Aws\CodeGuruProfiler` - Amazon CodeGuru Profiler now supports resource tagging APIs, tags-on-create and tag-based access control features. You can now tag profiling groups for better resource and access control management.

## 3.147.1 - 2020-07-20

* `Aws\CloudFront` - CloudFront adds support for cache policies and origin request policies. With these new policies, you can now more granularly control the query string, header, and cookie values that are included in the cache key and in requests that CloudFront sends to your origin.
* `Aws\CodeBuild` - AWS CodeBuild adds support for Session Manager and Windows 2019 Environment type
* `Aws\EC2` - Added support for tag-on-create for CreateVpcPeeringConnection and CreateRouteTable. You can now specify tags when creating any of these resources. For more information about tagging, see AWS Tagging Strategies. Add poolArn to the response of DescribeCoipPools.
* `Aws\FMS` - Added managed policies for auditing security group rules, including the use of managed application and protocol lists.
* `Aws\FraudDetector` - Introduced flexible model training dataset requirements for Online Fraud Insights so that customers can choose any two inputs to train a model instead of being required to use 'email' and 'IP address' at minimum. Added support for resource ARNs, resource tags, resource-based IAM policies and identity-based policies that limit access to a resource based on tags. Added support for customer-managed customer master key (CMK) data encryption. Added new Event Type, Entity Type, and Label APIs. An event type defines the structure for an event sent to Amazon Fraud Detector, including the variables sent as part of the event, the entity performing the event, and the labels that classify the event. Introduced the GetEventPrediction API.
* `Aws\GroundStation` - Adds optional MTU property to DataflowEndpoint and adds contact source and destination details to DescribeContact response.
* `Aws\RDS` - Add a new SupportsParallelQuery output field to DescribeDBEngineVersions. This field shows whether the engine version supports parallelquery. Add a new SupportsGlobalDatabases output field to DescribeDBEngineVersions and DescribeOrderableDBInstanceOptions. This field shows whether global database is supported by engine version or the combination of engine version and instance class.

## 3.147.0 - 2020-07-17

* `Aws\` - Added the use_aws_shared_config_files client constructor option to not attempt to access shared config files.
* `Aws\AppSync` - Documentation update to Cachingconfig.cachingKeys to include $context.source as a valid value.
* `Aws\ApplicationAutoScaling` - Documentation updates for Application Auto Scaling
* `Aws\Connect` - This release adds a set of Amazon Connect APIs to programmatically control call recording with start, stop, pause and resume functions.
* `Aws\Crypto` - Tweaks the wrap algorithm name for KmsMaterialsProviderV2 for the sake of cross-SDK consistency.
* `Aws\EC2` - Documentation updates for EC2
* `Aws\ElasticBeanstalk` - Add waiters for `EnvironmentExists`, `EnvironmentUpdated`, and `EnvironmentTerminated`. Add paginators for `DescribeEnvironmentManagedActionHistory` and `ListPlatformVersions`.
* `Aws\Macie2` - This release of the Amazon Macie API includes miscellaneous updates and improvements to the documentation.

## 3.146.0 - 2020-07-15

* `Aws\` - Fixes issue with transfer stats not being populated for calls with retried exceptions.
* `Aws\IVS` - Introducing Amazon Interactive Video Service - a managed live streaming solution that is quick and easy to set up, and ideal for creating interactive video experiences.

## 3.145.4 - 2020-07-09

* `Aws\AlexaForBusiness` - Added support for registering an AVS device directly to a room using RegisterAVSDevice with a room ARN
* `Aws\Amplify` - Documentation update to the introduction text to specify that this is the Amplify Console API.
* `Aws\AppMesh` - AppMesh now supports Ingress which allows resources outside a mesh to communicate to resources that are inside the mesh. See https://docs.aws.amazon.com/app-mesh/latest/userguide/virtual_gateways.html
* `Aws\CloudHSMV2` - Documentation updates for cloudhsmv2
* `Aws\CloudWatchEvents` - Amazon CloudWatch Events/EventBridge adds support for API Gateway as a target.
* `Aws\Comprehend` - AWS Comprehend now supports Real-time Analysis with Custom Entity Recognition. 
* `Aws\EBS` - This release introduces the following set of actions for the EBS direct APIs: 1. StartSnapshot, which creates a new Amazon EBS snapshot. 2. PutSnapshotBlock, which writes a block of data to a snapshot. 3. CompleteSnapshot, which seals and completes a snapshot after blocks of data have been written to it.
* `Aws\EventBridge` - Amazon EventBridge adds support for API Gateway as a target.
* `Aws\SNS` - This release adds support for SMS origination number as an attribute in the MessageAttributes parameter for the SNS Publish API.
* `Aws\SageMaker` - This release adds the DeleteHumanTaskUi API to Amazon Augmented AI
* `Aws\SecretsManager` - Adds support for filters on the ListSecrets API to allow filtering results by name, tag key, tag value, or description. Adds support for the BlockPublicPolicy option on the PutResourcePolicy API to block resource policies which grant a wide range of IAM principals access to secrets. Adds support for the ValidateResourcePolicy API to validate resource policies for syntax and prevent lockout error scenarios and wide access to secrets. 
* `Aws\WAFV2` - Added the option to use IP addresses from an HTTP header that you specify, instead of using the web request origin. Available for IP set matching, geo matching, and rate-based rule count aggregation.

## 3.145.3 - 2020-07-08

* `Aws\CostExplorer` - Customers can now see Instance Name alongside each rightsizing recommendation.
* `Aws\EC2` - EC2 Spot now enables customers to tag their Spot Instances Requests on creation.
* `Aws\ForecastService` - With this release, Amazon Forecast now supports the ability to add a tag to any resource via the launch of three new APIs: TagResouce, UntagResource and ListTagsForResource. A tag is a simple label consisting of a customer-defined key and an optional value allowing for easier resource management.
* `Aws\Organizations` - We have launched a self-service option to make it easier for customers to manage the use of their content by AI services. Certain AI services (Amazon CodeGuru Profiler, Amazon Comprehend, Amazon Lex, Amazon Polly, Amazon Rekognition, Amazon Textract, Amazon Transcribe, and Amazon Translate) may use content to improve the service. Customers have been able to opt out of this use by contacting AWS Support, and now they can opt out on a self-service basis by setting an Organizations policy for all or an individual AI service listed above. Please refer to the technical documentation in the online AWS Organizations User Guide for more details.

## 3.145.2 - 2020-07-07

* `Aws\CloudFront` - Amazon CloudFront adds support for a new security policy, TLSv1.2_2019.
* `Aws\EC2` - DescribeAvailabilityZones now returns additional data about Availability Zones and Local Zones.
* `Aws\EFS` - This release adds support for automatic backups of Amazon EFS file systems to further simplify backup management. 
* `Aws\Glue` - AWS Glue Data Catalog supports cross account sharing of tables through AWS Lake Formation
* `Aws\LakeFormation` -  AWS Lake Formation supports sharing tables with other AWS accounts and organizations
* `Aws\StorageGateway` - Adding support for file-system driven directory refresh, Case Sensitivity toggle for SMB File Shares, and S3 Prefixes and custom File Share names

## 3.145.1 - 2020-07-06

* `Aws\IoTSiteWise` - This release supports optional start date and end date parameters for the GetAssetPropertyValueHistory API.
* `Aws\QuickSight` - Add Theme APIs and update Dashboard APIs to support theme overrides.
* `Aws\RDS` - Adds support for Amazon RDS on AWS Outposts.

## 3.145.0 - 2020-07-02

* `Aws\Api` - Fixed bug with marshalling empty strings from dynamodb
* `Aws\Build` - Updated packager code to work with Guzzle 7.
* `Aws\Connect` - Documentation updates for Amazon Connect.
* `Aws\ElastiCache` - Documentation updates for elasticache
* `Aws\S3` - Adds a V2 implementation for the S3 encryption client, which has an updated encryption workflow and should be used over the original encryption client when possible.

## 3.144.2 - 2020-07-01

* `Aws\AppSync` - AWS AppSync supports new 12xlarge instance for server-side API caching
* `Aws\Chime` - This release supports third party emergency call routing configuration for Amazon Chime Voice Connectors.
* `Aws\CodeBuild` - Support build status config in project source
* `Aws\RDS` - This release adds the exceptions KMSKeyNotAccessibleFault and InvalidDBClusterStateFault to the Amazon RDS ModifyDBInstance API.
* `Aws\SecurityHub` - This release adds additional details for findings. There are now finding details for auto scaling groups, EC2 volumes, and EC2 VPCs. You can identify detected vulnerabilities and provide related network paths.
* `Aws\imagebuilder` - EC2 Image Builder adds support for encrypted AMI distribution.

## 3.144.1 - 2020-06-30

* `Aws\CodeGuruReviewer` - Release GitHub Enterprise Server source provider integration
* `Aws\ComprehendMedical` - This release adds the relationships between MedicalCondition and Anatomy in DetectEntitiesV2 API.
* `Aws\EC2` - Added support for tag-on-create for CreateVpc, CreateEgressOnlyInternetGateway, CreateSecurityGroup, CreateSubnet, CreateNetworkInterface, CreateNetworkAcl, CreateDhcpOptions and CreateInternetGateway. You can now specify tags when creating any of these resources. For more information about tagging, see AWS Tagging Strategies.
* `Aws\ECR` - Add a new parameter (ImageDigest) and a new exception (ImageDigestDoesNotMatchException) to PutImage API to support pushing image by digest.
* `Aws\RDS` - Documentation updates for rds

## 3.144.0 - 2020-06-29

* `Aws\Api` - Added defensive parsing of timestamps so it can take epoch or ISO8601 without knowing the type.
* `Aws\AutoScaling` - Documentation updates for Amazon EC2 Auto Scaling.
* `Aws\CodeGuruProfiler` - Amazon CodeGuru Profiler is now generally available. The Profiler helps developers to optimize their software, troubleshoot issues in production, and identify their most expensive lines of code. As part of general availability, we are launching: Profiling of AWS Lambda functions, Anomaly detection in CPU profiles, Color My Code on flame graphs, Expanding presence to 10 AWS regions.
* `Aws\CodeStarconnections` - Updated and new APIs in support of hosts for connections to installed provider types. New integration with the GitHub Enterprise Server provider type.
* `Aws\EC2` - Virtual Private Cloud (VPC) customers can now create and manage their own Prefix Lists to simplify VPC configurations.
* `Aws\S3` - Allows for unicode character keys in multipart copy.

## 3.143.2 - 2020-06-26

* `Aws\CloudFormation` - ListStackInstances and DescribeStackInstance now return a new `StackInstanceStatus` object that contains `DetailedStatus` values: a disambiguation of the more generic `Status` value. ListStackInstances output can now be filtered on `DetailedStatus` using the new `Filters` parameter.
* `Aws\CognitoIdentityProvider` - Don't require Authorization for InitiateAuth and RespondToAuthChallenge.
* `Aws\DatabaseMigrationService` - This release contains miscellaneous API documentation updates for AWS DMS in response to several customer reported issues.
* `Aws\QuickSight` - Added support for cross-region DataSource credentials copying.
* `Aws\SageMaker` - The new 'ModelClientConfig' parameter being added for CreateTransformJob and DescribeTransformJob api actions enable customers to configure model invocation related parameters such as timeout and retry.

## 3.143.1 - 2020-06-25

* `Aws\EC2` - Added support for tag-on-create for Host Reservations in Dedicated Hosts. You can now specify tags when you create a Host Reservation for a Dedicated Host. For more information about tagging, see AWS Tagging Strategies.
* `Aws\Glue` - This release adds new APIs to support column level statistics in AWS Glue Data Catalog

## 3.143.0 - 2020-06-24

* `Aws\Amplify` - This release of AWS Amplify Console introduces support for automatically creating custom subdomains for branches based on user-defined glob patterns, as well as automatically cleaning up Amplify branches when their corresponding git branches are deleted.
* `Aws\AutoScaling` - Documentation updates for Amazon EC2 Auto Scaling.
* `Aws\Backup` - Customers can now manage and monitor their backups in a policied manner across their AWS accounts, via an integration between AWS Backup and AWS Organizations
* `Aws\CodeCommit` - This release introduces support for reactions to CodeCommit comments. Users will be able to select from a pre-defined list of emojis to express their reaction to any comments.
* `Aws\EMR` - Amazon EMR customers can now set allocation strategies for On-Demand and Spot instances in their EMR clusters with instance fleets. These allocation strategies use real-time capacity insights to provision clusters faster and make the most efficient use of available spare capacity to allocate Spot instances to reduce interruptions. 
* `Aws\FSx` - This release adds the capability to take highly-durable, incremental backups of your FSx for Lustre persistent file systems. This capability makes it easy to further protect your file system data and to meet business and regulatory compliance requirements.
* `Aws\Honeycode` - Introducing Amazon Honeycode - a fully managed service that allows you to quickly build mobile and web apps for teams without programming.
* `Aws\IAM` - Documentation updates for iam
* `Aws\Organizations` - This release adds support for a new backup policy type for AWS Organizations.

## 3.142.8 - 2020-06-23

* `Aws\MediaTailor` - AWS Elemental MediaTailor SDK now allows configuration of Bumper.
* `Aws\Organizations` - Added a new error message to support the requirement for a Business License on AWS accounts in China to create an organization.

## 3.142.7 - 2020-06-22

* `Aws\EC2` - This release adds Tag On Create feature support for the ImportImage, ImportSnapshot, ExportImage and CreateInstanceExportTask APIs.
* `Aws\EMR` - Adding support for MaximumCoreCapacityUnits parameter for EMR Managed Scaling. It allows users to control how many units/nodes are added to the CORE group/fleet. Remaining units/nodes are added to the TASK groups/fleet in the cluster.
* `Aws\RDS` - Added paginators for various APIs.
* `Aws\Rekognition` - This update adds the ability to detect black frames, end credits, shots, and color bars in stored videos
* `Aws\SQS` - AWS SQS adds pagination support for ListQueues and ListDeadLetterSourceQueues APIs

## 3.142.6 - 2020-06-19

* `Aws\EC2` - Adds support to tag elastic-gpu on the RunInstances api
* `Aws\ElastiCache` - Documentation updates for elasticache
* `Aws\MediaLive` - AWS Elemental MediaLive now supports Input Prepare schedule actions. This feature improves existing input switching by allowing users to prepare an input prior to switching to it.
* `Aws\OpsWorksCM` - Documentation updates for AWS OpsWorks CM.

## 3.142.5 - 2020-06-18

* `Aws\MarketplaceMetering` - Documentation updates for meteringmarketplace
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for NexGuard FileMarker SDK, which allows NexGuard partners to watermark proprietary content in mezzanine and OTT streaming contexts.
* `Aws\RDS` - Adding support for global write forwarding on secondary clusters in an Aurora global database.
* `Aws\Route53` - Added a new ListHostedZonesByVPC API for customers to list all the private hosted zones that a specified VPC is associated with.
* `Aws\SSM` - Added offset support for specifying the number of days to wait after the date and time specified by a CRON expression before running the maintenance window.
* `Aws\SesV2` - You can now configure Amazon SES to send event notifications when the delivery of an email is delayed because of a temporary issue. For example, you can receive a notification if the recipient's inbox is full, or if there's a temporary problem with the receiving email server.
* `Aws\Support` - Documentation updates for support

## 3.142.4 - 2020-06-17

* `Aws\AppMesh` - Adds support for route and virtual node listener timeouts.
* `Aws\EC2` - nvmeSupport added to DescribeInstanceTypes API
* `Aws\Macie2` - This is a documentation-only update to the Amazon Macie API. This update contains miscellaneous editorial improvements to various API descriptions.
* `Aws\Route53` - Add PriorRequestNotComplete exception to AssociateVPCWithHostedZone API
* `Aws\Snowball` - AWS Snowcone is a portable, rugged and secure device for edge computing and data transfer. You can use Snowcone to collect, process, and move data to AWS, either offline by shipping the device to AWS or online by using AWS DataSync. With 2 CPUs and 4 GB RAM of compute and 8 TB of storage, Snowcone can run edge computing workloads and store data securely. Snowcone's small size (8.94" x 5.85" x 3.25" / 227 mm x 148.6 mm x 82.65 mm) allows you to set it next to machinery in a factory. Snowcone weighs about 4.5 lbs. (2 kg), so you can carry one in a backpack, use it with battery-based operation, and use the Wi-Fi interface to gather sensor data. Snowcone supports a file interface with NFS support. 

## 3.142.3 - 2020-06-16

* `Aws\AutoScaling` - Introducing instance refresh, a feature that helps you update all instances in an Auto Scaling group in a rolling fashion (for example, to apply a new AMI or instance type). You can control the pace of the refresh by defining the percentage of the group that must remain running/healthy during the replacement process and the time for new instances to warm up between replacements.
* `Aws\CloudFront` - Documentation updates for CloudFront
* `Aws\DataExchange` - This release fixes a bug in the AWS Data Exchange Python and NodeJS SDKs. The 'KmsKeyArn' field in the create-job API was configured to be required instead of optional. We updated this field to be optional in this release.
* `Aws\Lambda` - Adds support for using Amazon Elastic File System (persistent storage) with AWS Lambda. This enables customers to share data across function invocations, read large reference data files, and write function output to a persistent and shared store.
* `Aws\Polly` - Amazon Polly adds new US English child voice - Kevin. Kevin is available as Neural voice only.
* `Aws\QLDB` - Documentation updates for Amazon QLDB

## 3.142.2 - 2020-06-15

* `Aws\AlexaForBusiness` - Adding support for optional tags in CreateBusinessReportSchedule, CreateProfile and CreateSkillGroup APIs
* `Aws\AppConfig` - This release adds a hosted configuration source provider. Customers can now store their application configurations directly in AppConfig, without the need for an external configuration source.
* `Aws\Chime` - feature: Chime: This release introduces the ability to create an AWS Chime SDK meeting with attendees.
* `Aws\CognitoIdentityProvider` - Updated all AuthParameters to be sensitive.
* `Aws\IoT` - Added support for job executions rollout configuration, job abort configuration, and job executions timeout configuration for AWS IoT Over-the-Air (OTA) Update Feature.

## 3.142.1 - 2020-06-12

* `Aws\APIGateway` - Documentation updates for Amazon API Gateway
* `Aws\CloudFormation` - The following parameters now return the organization root ID or organizational unit (OU) IDs that you specified for DeploymentTargets: the OrganizationalUnitIds parameter on StackSet and the OrganizationalUnitId parameter on StackInstance, StackInstanceSummary, and StackSetOperationResultSummary
* `Aws\Glue` - You can now choose to crawl the entire table or just a sample of records in DynamoDB when using AWS Glue crawlers. Additionally, you can also specify a scanning rate for crawling DynamoDB tables.
* `Aws\StorageGateway` - Display EndpointType in DescribeGatewayInformation

## 3.142.0 - 2020-06-11

* `Aws\Crypto` - This implements a pure-PHP implementation of GMAC, which, when combined with OpenSSL's AES implementations (both AES-ECB and AES-CTR) allows the support of AES-GCM on PHP versions older than 7.1.
* `Aws\DynamoDb` - Marshal empty strings.
* `Aws\ECS` - This release adds support for deleting capacity providers.
* `Aws\IoTDataPlane` - As part of this release, we are introducing a new feature called named shadow, which extends the capability of AWS IoT Device Shadow to support multiple shadows for a single IoT device. With this release, customers can store different device state data into different shadows, and as a result access only the required state data when needed and reduce individual shadow size.
* `Aws\LexModelBuildingService` - This change adds the built-in AMAZON.KendraSearchIntent that enables integration with Amazon Kendra.
* `Aws\imagebuilder` - EC2 Image Builder now supports specifying a custom working directory for your build and test workflows. In addition, Image Builder now supports defining tags that are applied to ephemeral resources created by EC2 Image Builder as part of the image creation workflow. 

## 3.141.0 - 2020-06-10

* `Aws\` - Made the getSignatureProvider method public.
* `Aws\AppConfig` - This release allows customers to choose from a list of predefined deployment strategies while starting deployments.
* `Aws\CodeArtifact` - Added support for AWS CodeArtifact.
* `Aws\ComputeOptimizer` - Compute Optimizer supports exporting recommendations to Amazon S3.
* `Aws\DLM` - Reducing the schedule name of DLM Lifecycle policy from 500 to 120 characters. 
* `Aws\EC2` - New C6g instances powered by AWS Graviton2 processors and ideal for running advanced, compute-intensive workloads; New R6g instances powered by AWS Graviton2 processors and ideal for running memory-intensive workloads.
* `Aws\Lightsail` - Documentation updates for lightsail
* `Aws\Macie2` - This release of the Amazon Macie API removes support for the ArchiveFindings and UnarchiveFindings operations. This release also adds UNKNOWN as an encryption type for S3 bucket metadata.
* `Aws\ServiceCatalog` - Service Catalog Documentation Update for Integration with AWS Organizations Delegated Administrator feature
* `Aws\Shield` - Corrections to the supported format for contact phone numbers and to the description for the create subscription action.

## 3.140.4 - 2020-06-09

* `Aws\Transfer` - This release updates the API so customers can test use of Source IP to allow, deny or limit access to data in their S3 buckets after integrating their identity provider.

## 3.140.3 - 2020-06-08

* `Aws\ServiceDiscovery` - Added support for tagging Service and Namespace type resources in Cloud Map
* `Aws\Shield` - This release adds the option for customers to identify a contact name and method that the DDoS Response Team can proactively engage when a Route 53 Health Check that is associated with a Shield protected resource fails.

## 3.140.2 - 2020-06-05

* `Aws\APIGateway` - Amazon API Gateway now allows customers of REST APIs to skip trust chain validation for backend server certificates for HTTP and VPC Link Integration. This feature enables customers to configure their REST APIs to integrate with backends that are secured with certificates vended from private certificate authorities (CA) or certificates that are self-signed.
* `Aws\CloudFront` - Amazon CloudFront adds support for configurable origin connection attempts and origin connection timeout.
* `Aws\ElasticBeanstalk` - These API changes enable an IAM user to associate an operations role with an Elastic Beanstalk environment, so that the IAM user can call Elastic Beanstalk actions without having access to underlying downstream AWS services that these actions call.
* `Aws\Personalize` - [Personalize] Adds ability to create and apply filters.
* `Aws\PersonalizeRuntime` - [Personalize] Adds ability to apply filter to real-time recommendations
* `Aws\Pinpoint` - This release enables additional functionality for the Amazon Pinpoint journeys feature. With this release, you can send messages through additional channels, including SMS, push notifications, and custom channels.
* `Aws\SageMakerRuntime` - You can now specify the production variant to send the inference request to, when invoking a SageMaker Endpoint that is running two or more variants.
* `Aws\ServiceCatalog` - This release adds support for DescribeProduct and DescribeProductAsAdmin by product name, DescribeProvisioningArtifact by product name or provisioning artifact name, returning launch paths as part of DescribeProduct output and adds maximum length for provisioning artifact name and provisioning artifact description.

## 3.140.1 - 2020-06-04

* `Aws\EC2` - New C5a instances, the latest generation of EC2's compute-optimized instances featuring AMD's 2nd Generation EPYC processors. C5a instances offer up to 96 vCPUs, 192 GiB of instance memory, 20 Gbps in Network bandwidth; New G4dn.metal bare metal instance with 8 NVIDIA T4 GPUs.
* `Aws\Lightsail` - This release adds the BurstCapacityPercentage and BurstCapacityTime instance metrics, which allow you to track the burst capacity available to your instance.
* `Aws\MarketplaceMetering` - Documentation updates for meteringmarketplace
* `Aws\MediaPackageVod` - You can now restrict direct access to AWS Elemental MediaPackage by securing requests for VOD content using CDN authorization. With CDN authorization, content requests require a specific HTTP header and authorization code.
* `Aws\SSM` - SSM State Manager support for executing an association only at specified CRON schedule after creating/updating an association.

## 3.140.0 - 2020-06-03

* `Aws\Build\Docs` - Tweak docs redirect logic to use uid if possible.
* `Aws\DirectConnect` - This release supports the virtual interface failover test, which allows you to verify that traffic routes over redundant virtual interfaces when you bring your primary virtual interface out of service.
* `Aws\ElastiCache` - This release improves the Multi-AZ feature in ElastiCache by adding a separate flag and proper validations.
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service now offers support for cross-cluster search, enabling you to perform searches, aggregations, and visualizations across multiple Amazon Elasticsearch Service domains with a single query or from a single Kibana interface. New feature includes the ability to setup connection, required to perform cross-cluster search, between domains using an approval workflow.
* `Aws\Glue` - Adding databaseName in the response for GetUserDefinedFunctions() API.
* `Aws\IAM` - GenerateServiceLastAccessedDetails will now return ActionLastAccessed details for certain S3 control plane actions
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for the encoding of VP8 or VP9 video in WebM container with Vorbis or Opus audio.
* `Aws\S3` - Modified Content-MD5 checksum logic to use modeled httpChecksumRequired trait instead of a hard-coded list of operations.

## 3.139.1 - 2020-06-02

* `Aws\GuardDuty` - Amazon GuardDuty findings now include S3 bucket details under the resource section if an S3 Bucket was one of the affected resources

## 3.139.0 - 2020-06-01

* `Aws\Athena` - This release adds support for connecting Athena to your own Apache Hive Metastores in addition to the AWS Glue Data Catalog. For more information, please see https://docs.aws.amazon.com/athena/latest/ug/connect-to-data-source-hive.html
* `Aws\EMR` - Amazon EMR now supports encrypting log files with AWS Key Management Service (KMS) customer managed keys.
* `Aws\EndpointDiscovery` - Endpoint discovery behavior is modified to be enabled by default if any operation in a service requires it. Disabling endpoint discovery in configuration will disable it even for required operations.
* `Aws\FSx` - New capabilities to update storage capacity and throughput capacity of your file systems, providing the flexibility to grow file storage and to scale up or down the available performance as needed to meet evolving storage needs over time.
* `Aws\KMS` - AWS Key Management Service (AWS KMS): If the GenerateDataKeyPair or GenerateDataKeyPairWithoutPlaintext APIs are called on a CMK in a custom key store (origin == AWS_CLOUDHSM), they return an UnsupportedOperationException. If a call to UpdateAlias causes a customer to exceed the Alias resource quota, the UpdateAlias API returns a LimitExceededException.
* `Aws\SageMaker` - We are releasing HumanTaskUiArn as a new parameter in CreateLabelingJob and RenderUiTemplate which can take an ARN for a system managed UI to render a task. 
* `Aws\WorkLink` - Amazon WorkLink now supports resource tagging for fleets.

## 3.138.10 - 2020-05-28

* `Aws\Kafka` - New APIs for upgrading the Apache Kafka version of a cluster and to find out compatible upgrade paths
* `Aws\MarketplaceCatalog` - AWS Marketplace Catalog now supports accessing initial change payloads with DescribeChangeSet operation.
* `Aws\QLDBSession` - Documentation updates for Amazon QLDB Session
* `Aws\WorkMail` - This release adds support for Amazon WorkMail organization-level retention policies.

## 3.138.9 - 2020-05-27

* `Aws\ElasticLoadBalancingv2` - This release added support for HTTP/2 ALPN preference lists for Network Load Balancers
* `Aws\GuardDuty` - Documentation updates for GuardDuty
* `Aws\build/packager` - Adds package symfony/polyfill-intl-idn to .zip and .phar releases if the package exists in vendor directory.

## 3.138.8 - 2020-05-26

* `Aws\DLM` - Allowing cron expression in the DLM policy creation schedule. 
* `Aws\EC2` - ebsOptimizedInfo, efaSupported and supportedVirtualizationTypes added to DescribeInstanceTypes API
* `Aws\ElastiCache` - Amazon ElastiCache now allows you to use resource based policies to manage access to operations performed on ElastiCache resources. Also, Amazon ElastiCache now exposes ARN (Amazon Resource Names) for ElastiCache resources such as Cache Clusters and Parameter Groups. ARNs can be used to apply IAM policies to ElastiCache resources.
* `Aws\Macie` - This is a documentation-only update to the Amazon Macie Classic API. This update corrects out-of-date references to the service name.
* `Aws\QuickSight` - Add DataSetArns to QuickSight DescribeDashboard API response.
* `Aws\SSM` - The AWS Systems Manager GetOpsSummary API action now supports multiple OpsResultAttributes in the request. Currently, this feature only supports OpsResultAttributes with the following TypeNames: [AWS:EC2InstanceComputeOptimizer] or [AWS:EC2InstanceInformation, AWS:EC2InstanceComputeOptimizer]. These TypeNames can be used along with either or both of the following: [AWS:EC2InstanceRecommendation, AWS:RecommendationSource]

## 3.138.7 - 2020-05-22

* `Aws\AutoScaling` - Documentation updates for Amazon EC2 Auto Scaling
* `Aws\IoTSiteWise` - This release adds support for the standard deviation auto-computed aggregate and improved support for portal logo images in SiteWise.

## 3.138.6 - 2020-05-21

* `Aws\CodeBuild` - CodeBuild adds support for tagging with report groups
* `Aws\EC2` - From this release onwards ProvisionByoipCidr publicly supports IPv6. Updated ProvisionByoipCidr API to support tags for public IPv4 and IPv6 pools. Added NetworkBorderGroup to the DescribePublicIpv4Pools response.
* `Aws\S3` - Deprecates unusable input members bound to Content-MD5 header. Updates example and documentation.
* `Aws\Synthetics` - AWS CloudWatch Synthetics now supports configuration of allocated memory for a canary.

## 3.138.5 - 2020-05-20

* `Aws\AppMesh` - List APIs for all resources now contain additional information: when a resource was created, last updated, and its current version number.
* `Aws\ApplicationAutoScaling` - Documentation updates for Application Auto Scaling
* `Aws\Backup` - This release allows customers to enable or disable AWS Backup support for an AWS resource type. This release also includes new APIs, update-region-settings and describe-region-settings, which can be used to opt in to a specific resource type. For all current AWS Backup customers, the default settings enable support for EBS, EC2, StorageGateway, EFS, DDB and RDS resource types. 
* `Aws\Chime` - Amazon Chime enterprise account administrators can now set custom retention policies on chat data in the Amazon Chime application.
* `Aws\CodeDeploy` - Amazon ECS customers using application and network load balancers can use CodeDeploy BlueGreen hook to invoke a CloudFormation stack update. With this update you can view CloudFormation deployment and target details via existing APIs and use your stack Id to list or delete all deployments associated with the stack.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports the ability to ingest the content that is streaming from an AWS Elemental Link device: https://aws.amazon.com/medialive/features/link/. This release also adds support for SMPTE-2038 and input state waiters.
* `Aws\S3` - Fixes incorrect host for dualstack and accelerate endpoints in non-AWS partitions.
* `Aws\SecurityHub` - For findings related to controls, the finding information now includes the reason behind the current status of the control. A new field for the findings original severity allows finding providers to use the severity values from the system they use to assign severity.
* `Aws\TranscribeStreamingService` - This release adds support for vocabulary filtering in streaming with which you can filter unwanted words from the real-time transcription results. Visit https://docs.aws.amazon.com/transcribe/latest/dg/how-it-works.html to learn more.

## 3.138.4 - 2020-05-19

* `Aws\Chime` - You can now receive Voice Connector call events through SNS or SQS.
* `Aws\EC2` - This release adds support for Federated Authentication via SAML-2.0 in AWS ClientVPN.
* `Aws\Health` - Feature: Health: AWS Health added a new field to differentiate Public events from Account-Specific events in the API request and response. Visit https://docs.aws.amazon.com/health/latest/APIReference/API_Event.html to learn more.
* `Aws\TranscribeService` - Documentation updates for Amazon Transcribe.

## 3.138.3 - 2020-05-18

* `Aws\Chime` - Amazon Chime now supports redacting chat messages.
* `Aws\DynamoDB` - Documentation updates for dynamodb 
* `Aws\EC2` - This release changes the RunInstances CLI and SDK's so that if you do not specify a client token, a randomly generated token is used for the request to ensure idempotency.
* `Aws\ECS` - This release adds support for specifying environment files to add environment variables to your containers.
* `Aws\Macie2` - Documentation updates for Amazon Macie
* `Aws\QLDB` - Amazon QLDB now supports Amazon Kinesis data streams. You can now emit QLDB journal data, via the new QLDB Streams feature, directly to Amazon Kinesis supporting event processing and analytics among related use cases.

## 3.138.2 - 2020-05-15

* `Aws\CloudFormation` - This release adds support for the following features: 1. DescribeType and ListTypeVersions APIs now output a field IsDefaultVersion, indicating if a version is the default version for its type; 2. Add StackRollbackComplete waiter feature to wait until stack status is UPDATE_ROLLBACK_COMPLETE; 3. Add paginators in DescribeAccountLimits, ListChangeSets, ListStackInstances, ListStackSetOperationResults, ListStackSetOperations, ListStackSets APIs.
* `Aws\ECR` - This release adds support for specifying an image manifest media type when pushing a manifest to Amazon ECR.
* `Aws\Glue` - Starting today, you can stop the execution of Glue workflows that are running. AWS Glue workflows are directed acyclic graphs (DAGs) of Glue triggers, crawlers and jobs. Using a workflow, you can design a complex multi-job extract, transform, and load (ETL) activity that AWS Glue can execute and track as single entity. 
* `Aws\STS` - API updates for STS

## 3.138.1 - 2020-05-14

* `Aws\EC2` - Amazon EC2 now supports adding AWS resource tags for associations between VPCs and local gateways, at creation time.
* `Aws\imagebuilder` - This release adds a new parameter (SupportedOsVersions) to the Components API. This parameter lists the OS versions supported by a component.

## 3.138.0 - 2020-05-13

* `Aws\ElastiCache` - Amazon ElastiCache now supports auto-update of ElastiCache clusters after the "recommended apply by date" of service update has passed. ElastiCache will use your maintenance window to schedule the auto-update of applicable clusters. For more information, see https://docs.aws.amazon.com/AmazonElastiCache/latest/mem-ug/Self-Service-Updates.html and https://docs.aws.amazon.com/AmazonElastiCache/latest/red-ug/Self-Service-Updates.html
* `Aws\Macie2` - This release introduces a new major version of the Amazon Macie API. You can use this version of the API to develop tools and applications that interact with the new Amazon Macie.

## 3.137.8 - 2020-05-12

* `Aws\IoTSiteWise` - Documentation updates for iot-bifrost
* `Aws\WorkMail` - Minor API fixes and updates to the documentation.

## 3.137.7 - 2020-05-11

* `Aws\CodeGuruReviewer` - Add Bitbucket integration APIs
* `Aws\EC2` - M6g instances are our next-generation general purpose instances powered by AWS Graviton2 processors
* `Aws\kendra` - Amazon Kendra is now generally available. As part of general availability, we are launching * Developer edition * Ability to scale your Amazon Kendra index with capacity units * Support for new connectors * Support for new tagging API's * Support for Deleting data source * Metrics for data source sync operations * Metrics for query & storage utilization

## 3.137.6 - 2020-05-08

* `Aws\GuardDuty` - Documentation updates for GuardDuty
* `Aws\ResourceGroupsTaggingAPI` - Documentation updates for resourcegroupstaggingapi
* `Aws\SageMaker` - This release adds a new parameter (EnableInterContainerTrafficEncryption) to CreateProcessingJob API to allow for enabling inter-container traffic encryption on processing jobs.

## 3.137.5 - 2020-05-07

* `Aws\AppConfig` - The description of the AWS AppConfig GetConfiguration API action was amended to include important information about calling ClientConfigurationVersion when you configure clients to call GetConfiguration.
* `Aws\CloudWatchLogs` - Amazon CloudWatch Logs now offers the ability to interact with Logs Insights queries via the new PutQueryDefinition, DescribeQueryDefinitions, and DeleteQueryDefinition APIs.
* `Aws\CodeBuild` - Add COMMIT_MESSAGE enum for webhook filter types
* `Aws\EC2` - Amazon EC2 now adds warnings to identify issues when creating a launch template or launch template version.
* `Aws\Lightsail` - This release adds support for the following options in instance public ports: Specify source IP addresses, specify ICMP protocol like PING, and enable/disable the Lightsail browser-based SSH and RDP clients' access to your instance.
* `Aws\Route53` - Amazon Route 53 now supports the EU (Milan) Region (eu-south-1) for latency records, geoproximity records, and private DNS for Amazon VPCs in that region.
* `Aws\SSM` - This Patch Manager release supports creating patch baselines for Oracle Linux and Debian

## 3.137.4 - 2020-05-06

* `Aws\CodeStarconnections` - Added support for tagging resources in AWS CodeStar Connections
* `Aws\ComprehendMedical` - New Batch Ontology APIs for ICD-10 and RxNorm will provide batch capability of linking the information extracted by Comprehend Medical to medical ontologies. The new ontology linking APIs make it easy to detect medications and medical conditions in unstructured clinical text and link them to RxNorm and ICD-10-CM codes respectively. This new feature can help you reduce the cost, time and effort of processing large amounts of unstructured medical text with high accuracy.

## 3.137.3 - 2020-05-05

* `Aws\EC2` - With this release, you can call ModifySubnetAttribute with two new parameters: MapCustomerOwnedIpOnLaunch and CustomerOwnedIpv4Pool, to map a customerOwnedIpv4Pool to a subnet. You will also see these two new fields in the DescribeSubnets response. If your subnet has a customerOwnedIpv4Pool mapped, your network interface will get an auto assigned customerOwnedIpv4 address when placed onto an instance.
* `Aws\SSM` - AWS Systems Manager Parameter Store launches new data type to support aliases in EC2 APIs
* `Aws\Support` - Documentation updates for support

## 3.137.2 - 2020-05-04

* `Aws\APIGateway` - Documentation updates for Amazon API Gateway
* `Aws\EC2` - With this release, you can include enriched metadata in Amazon Virtual Private Cloud (Amazon VPC) flow logs published to Amazon CloudWatch Logs or Amazon Simple Storage Service (S3). Prior to this, custom format VPC flow logs enriched with additional metadata could be published only to S3. With this launch, we are also adding additional metadata fields that provide insights about the location such as AWS Region, AWS Availability Zone, AWS Local Zone, AWS Wavelength Zone, or AWS Outpost where the network interface where flow logs are captured exists. 
* `Aws\S3Control` - Amazon S3 Batch Operations now supports Object Lock.

## 3.137.1 - 2020-05-01

* `Aws\EFS` - Change the TagKeys argument for UntagResource to a URL parameter to address an issue with the Java and .NET SDKs.
* `Aws\SSM` - Added TimeoutSeconds as part of ListCommands API response.

## 3.137.0 - 2020-04-30

* `Aws\IoT` - AWS IoT Core released Fleet Provisioning for scalable onboarding of IoT devices to the cloud. This release includes support for customer's Lambda functions to validate devices during onboarding. Fleet Provisioning also allows devices to send Certificate Signing Requests (CSR) to AWS IoT Core for signing and getting a unique certificate. Lastly, AWS IoT Core added a feature to register the same certificate for multiple accounts in the same region without needing to register the certificate authority (CA).
* `Aws\IoTEvents` - Doc only update to correct APIs and related descriptions
* `Aws\Lambda` - Documentation updates for Lambda
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for including AFD signaling in MXF wrapper.
* `Aws\S3` - Adds change to S3 parsing logic to correctly interpret certain 200 responses with a functionally empty body as connection errors.
* `Aws\Schemas` - Add support for resource policies for Amazon EventBridge Schema Registry, which is now generally available.
* `Aws\StorageGateway` - Adding support for S3_INTELLIGENT_TIERING as a storage class option

## 3.136.0 - 2020-04-29

* `Aws\IoTSiteWise` - AWS IoT SiteWise is a managed service that makes it easy to collect, store, organize and monitor data from industrial equipment at scale. You can use AWS IoT SiteWise to model your physical assets, processes and facilities, quickly compute common industrial performance metrics, and create fully managed web applications to help analyze industrial equipment data, prevent costly equipment issues, and reduce production inefficiencies.
* `Aws\ServiceDiscovery` - Documentation updates for servicediscovery
* `Aws\TranscribeService` - With this release, you can now use Amazon Transcribe to create medical custom vocabularies and use them in both medical real-time streaming and medical batch transcription jobs.
* `Aws\WAF` - This release add migration API for AWS WAF Classic ("waf" and "waf-regional"). The migration API will parse through your web ACL and generate a CloudFormation template into your S3 bucket. Deploying this template will create equivalent web ACL under new AWS WAF ("wafv2").
* `Aws\WAFRegional` - This release add migration API for AWS WAF Classic ("waf" and "waf-regional"). The migration API will parse through your web ACL and generate a CloudFormation template into your S3 bucket. Deploying this template will create equivalent web ACL under new AWS WAF ("wafv2").

## 3.135.6 - 2020-04-28

* `Aws\ECR` - This release adds support for multi-architecture images also known as a manifest list
* `Aws\KinesisVideo` - Add "GET_CLIP" to the list of supported API names for the GetDataEndpoint API.
* `Aws\KinesisVideoArchivedMedia` - Add support for the GetClip API for retrieving media from a video stream in the MP4 format.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports several new features: enhanced VQ for H.264 (AVC) output encodes; passthrough of timed metadata and of Nielsen ID3 metadata in fMP4 containers in HLS outputs; the ability to generate a SCTE-35 sparse track without additional segmentation, in Microsoft Smooth outputs; the ability to select the audio from a TS input by specifying the audio track; and conversion of HDR colorspace in the input to an SDR colorspace in the output.
* `Aws\Route53` - Amazon Route 53 now supports the Africa (Cape Town) Region (af-south-1) for latency records, geoproximity records, and private DNS for Amazon VPCs in that region.
* `Aws\SSM` - SSM State Manager support for adding list association filter for Resource Group and manual mode of managing compliance for an association. 

## 3.135.5 - 2020-04-27

* `Aws\AccessAnalyzer` - This release adds support for inclusion of S3 Access Point policies in IAM Access Analyzer evaluation of S3 bucket access. IAM Access Analyzer now reports findings for buckets shared through access points and identifies the access point that permits access.
* `Aws\DataExchange` - This release introduces AWS Data Exchange support for configurable encryption parameters when exporting data sets to Amazon S3. 
* `Aws\DatabaseMigrationService` - Adding minimum replication engine version for describe-endpoint-types api.
* `Aws\SageMaker` - Change to the input, ResourceSpec, changing EnvironmentArn to SageMakerImageArn. This affects the following preview APIs: CreateDomain, DescribeDomain, UpdateDomain, CreateUserProfile, DescribeUserProfile, UpdateUserProfile, CreateApp and DescribeApp.

## 3.135.4 - 2020-04-24

* `Aws\DLM` - Enable 1hour frequency in the schedule creation for Data LifeCycle Manager.
* `Aws\ElasticInference` - This feature allows customers to describe the accelerator types and offerings on any region where Elastic Inference is available.
* `Aws\IoT` - This release adds a new exception type to the AWS IoT SetV2LoggingLevel API.

## 3.135.3 - 2020-04-23

* `Aws\ApplicationAutoScaling` - This release supports Auto Scaling in Amazon Keyspaces for Apache Cassandra.
* `Aws\Endpoint` - Fix for partition endpoint history logic for keys with hyphens.
* `Aws\Firehose` - You can now deliver streaming data to an Amazon Elasticsearch Service domain in an Amazon VPC. You can now compress streaming data delivered to S3 using Hadoop-Snappy in addition to Gzip, Zip and Snappy formats.
* `Aws\MediaPackageVod` - Adds tagging support for PackagingGroups, PackagingConfigurations, and Assets
* `Aws\Pinpoint` - This release of the Amazon Pinpoint API enhances support for sending campaigns through custom channels to locations such as AWS Lambda functions or web applications. Campaigns can now use CustomDeliveryConfiguration and CampaignCustomMessage to configure custom channel settings for a campaign.
* `Aws\RAM` - AWS Resource Access Manager (RAM) provides a new ListResourceTypes action. This action lets you list the resource types that can be shared using AWS RAM.
* `Aws\RDS` - Adds support for AWS Local Zones, including a new optional parameter AvailabilityZoneGroup for the DescribeOrderableDBInstanceOptions operation.
* `Aws\StorageGateway` - Added AutomaticTapeCreation APIs
* `Aws\Transfer` - This release adds support for transfers over FTPS and FTP in and out of Amazon S3, which makes it easy to migrate File Transfer Protocol over SSL (FTPS) and FTP workloads to AWS, in addition to the existing support for Secure File Transfer Protocol (SFTP).

## 3.135.2 - 2020-04-22

* `Aws\CodeGuruReviewer` - Add support for code review and recommendation feedback APIs.
* `Aws\ElasticsearchService` - This change adds a new field 'OptionalDeployment' to ServiceSoftwareOptions to indicate whether a service software update is optional or mandatory. If True, it indicates that the update is optional, and the service software is not automatically updated. If False, the service software is automatically updated after AutomatedUpdateDate.
* `Aws\FMS` - This release is to support AWS Firewall Manager policy with Organizational Unit scope. 
* `Aws\Redshift` - Amazon Redshift support for usage limits
* `Aws\TranscribeStreamingService` - Adding ServiceUnavailableException as one of the expected exceptions

## 3.135.1 - 2020-04-21

* `Aws\CostExplorer` - Cost Explorer Rightsizing Recommendations integrates with Compute Optimizer and begins offering across instance family rightsizing recommendations, adding to existing support for within instance family rightsizing recommendations. 
* `Aws\EMR` - Amazon EMR adds support for configuring a managed scaling policy for an Amazon EMR cluster. This enables automatic resizing of a cluster to optimize for job execution speed and reduced cluster cost.
* `Aws\GuardDuty` - AWS GuardDuty now supports using AWS Organizations delegated administrators to create and manage GuardDuty master and member accounts. The feature also allows GuardDuty to be automatically enabled on associated organization accounts.
* `Aws\Route53Domains` - You can now programmatically transfer domains between AWS accounts without having to contact AWS Support

## 3.135.0 - 2020-04-20

* `Aws\ApiGatewayV2` - You can now export an OpenAPI 3.0 compliant API definition file for Amazon API Gateway HTTP APIs using the Export API.
* `Aws\CostExplorer` - Cost Categories API is now General Available with new dimensions and operations support. You can map costs by account name, service, and charge type dimensions as well as use contains, starts with, and ends with operations. Cost Categories can also be used in RI and SP coverage reports.
* `Aws\Glue` - Added a new ConnectionType "KAFKA" and a ConnectionProperty "KAFKA_BOOTSTRAP_SERVERS" to support Kafka connection.
* `Aws\IoTEvents` - API update that allows users to add AWS Iot SiteWise actions while creating Detector Model in AWS Iot Events
* `Aws\Synthetics` - Introducing CloudWatch Synthetics. This is the first public release of CloudWatch Synthetics.

## 3.134.8 - 2020-04-17

* `Aws\FraudDetector` - Added support for a new rule engine execution mode. Customers will be able to configure their detector versions to evaluate all rules and return outcomes from all 'matched' rules in the GetPrediction API response. Added support for deleting Detectors (DeleteDetector) and Rule Versions (DeleteRuleVersion).
* `Aws\OpsWorksCM` - Documentation updates for opsworkscm

## 3.134.7 - 2020-04-16

* `Aws\AugmentedAIRuntime` - This release updates Amazon Augmented AI ListHumanLoops and StartHumanLoop APIs.
* `Aws\EC2` - Amazon EC2 now supports adding AWS resource tags for placement groups and key pairs, at creation time. The CreatePlacementGroup API will now return placement group information when created successfully. The DeleteKeyPair API now supports deletion by resource ID.
* `Aws\Glue` - This release adds support for querying GetUserDefinedFunctions API without databaseName.
* `Aws\IoTEvents` - API update that allows users to customize event action payloads, and adds support for Amazon DynamoDB actions.
* `Aws\Lambda` - Sample code for AWS Lambda operations
* `Aws\MediaConvert` - AWS Elemental MediaConvert now allows you to specify your input captions frame rate for SCC captions sources.
* `Aws\MediaTailor` - AWS Elemental MediaTailor SDK now allows configuration of Avail Suppression.
* `Aws\MigrationHub` - Adding ThrottlingException
* `Aws\RDS` - This release adds support for Amazon RDS Proxy with PostgreSQL compatibility.
* `Aws\SageMaker` - Amazon SageMaker now supports running training jobs on ml.g4dn and ml.c5n instance types. Amazon SageMaker supports in "IN" operation for Search now.
* `Aws\SecurityHub` - Added a new BatchUpdateFindings action, which allows customers to update selected information about their findings. Security Hub customers use BatchUpdateFindings to track their investigation into a finding. BatchUpdateFindings is intended to replace the UpdateFindings action, which is deprecated.
* `Aws\Snowball` - An update to the Snowball Edge Storage Optimized device has been launched. Like the previous version, it has 80 TB of capacity for data transfer. Now it has 40 vCPUs, 80 GiB, and a 1 TiB SATA SSD of memory for EC2 compatible compute. The 80 TB of capacity can also be used for EBS-like volumes for AMIs.
* `Aws\imagebuilder` - This release includes support for additional OS Versions within EC2 Image Builder.

## 3.134.6 - 2020-04-08

* `Aws\Chime` - feature: Chime: This release introduces the ability to tag Amazon Chime SDK meeting resources. You can use tags to organize and identify your resources for cost allocation. 
* `Aws\CloudFormation` - The OrganizationalUnitIds parameter on StackSet and the OrganizationalUnitId parameter on StackInstance, StackInstanceSummary, and StackSetOperationResultSummary are now reserved for internal use. No data is returned for this parameter.
* `Aws\CodeGuruProfiler` - CodeGuruProfiler adds support for resource based authorization to submit profile data.
* `Aws\EC2` - This release provides the ability to include tags in EC2 event notifications. 
* `Aws\ECS` - This release provides native support for specifying Amazon EFS file systems as volumes in your Amazon ECS task definitions.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK adds support for queue hopping. Jobs can now hop from their original queue to a specified alternate queue, based on the maximum wait time that you specify in the job settings.
* `Aws\MigrationHubConfig` - Adding ThrottlingException

## 3.134.5 - 2020-04-07

* `Aws\APIGateway` - Documentation updates for Amazon API Gateway.
* `Aws\CodeGuruReviewer` - API updates for CodeGuruReviewer 
* `Aws\MediaConnect` - You can now send content from your MediaConnect flow to your virtual private cloud (VPC) without going over the public internet.

## 3.134.4 - 2020-04-06

* `Aws\Chime` - Amazon Chime proxy phone sessions let you provide two users with a shared phone number to communicate via voice or text for up to 12 hours without revealing personal phone numbers. When users call or message the provided phone number, they are connected to the other party and their private phone numbers are replaced with the shared number in Caller ID.
* `Aws\ElasticBeanstalk` - This release adds a new action, ListPlatformBranches, and updates two actions, ListPlatformVersions and DescribePlatformVersion, to support the concept of Elastic Beanstalk platform branches.
* `Aws\IAM` - Documentation updates for AWS Identity and Access Management (IAM).
* `Aws\TranscribeService` - This release adds support for batch transcription jobs within Amazon Transcribe Medical.

## 3.134.3 - 2020-04-03

* `Aws\PersonalizeRuntime` - Amazon Personalize: Add new response field "score" to each item returned by GetRecommendations and GetPersonalizedRanking (HRNN-based recipes only)
* `Aws\RoboMaker` - Added support for limiting simulation unit usage, giving more predictable control over simulation cost

## 3.134.2 - 2020-04-02

* `Aws\CloudWatch` - Amazon CloudWatch Contributor Insights adds support for tags and tagging on resource creation. 
* `Aws\GameLift` - Public preview of GameLift FleetIQ as a standalone feature. GameLift FleetIQ makes it possible to use low-cost Spot instances by limiting the chance of interruptions affecting game sessions. FleetIQ is a feature of the managed GameLift service, and can now be used with game hosting in EC2 Auto Scaling groups that you manage in your own account.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports Automatic Input Failover. This feature provides resiliency upstream of the channel, before ingest starts.
* `Aws\RDS` - Documentation updates for RDS: creating read replicas is now supported for SQL Server DB instances
* `Aws\Redshift` - Documentation updates for redshift

## 3.134.1 - 2020-04-01

* `Aws\IoT` - This release introduces Dimensions for AWS IoT Device Defender. Dimensions can be used in Security Profiles to collect and monitor fine-grained metrics.
* `Aws\MediaConnect` - You can now send content from your virtual private cloud (VPC) to your MediaConnect flow without going over the public internet.

## 3.134.0 - 2020-03-31

* `Aws\` - Adds support for standard and adaptive retry modes. Standard mode adds a retry quota system, while the experimental adaptive mode adds a client-side rate limiting feature on top of standard mode.
* `Aws\AppConfig` - This release adds an event log to deployments. In the case of a deployment rollback, the event log details the rollback reason.
* `Aws\Detective` - Removing the notes that Detective is in preview, in preparation for the Detective GA release.
* `Aws\ElasticInference` - This release includes improvements for the Amazon Elastic Inference service.
* `Aws\FMS` - This release contains FMS wafv2 support.
* `Aws\Glue` - Add two enums for MongoDB connection: Added "CONNECTION_URL" to "ConnectionPropertyKey" and added "MONGODB" to "ConnectionType"
* `Aws\Lambda` - AWS Lambda now supports .NET Core 3.1
* `Aws\MediaStore` - This release adds support for CloudWatch Metrics. You can now set a policy on your container to dictate which metrics MediaStore sends to CloudWatch.
* `Aws\OpsWorksCM` - Documentation updates for OpsWorks-CM CreateServer values.
* `Aws\Organizations` - Documentation updates for AWS Organizations
* `Aws\Pinpoint` - This release of the Amazon Pinpoint API introduces MMS support for SMS messages.
* `Aws\Rekognition` - This release adds DeleteProject and DeleteProjectVersion APIs to Amazon Rekognition Custom Labels.
* `Aws\StorageGateway` - Adding audit logging support for SMB File Shares
* `Aws\WAFV2` - Added support for AWS Firewall Manager for WAFv2 and PermissionPolicy APIs for WAFv2.

## 3.133.47 - 2020-03-30

* `Aws\AccessAnalyzer` - This release adds support for the creation and management of IAM Access Analyzer analyzers with type organization. An analyzer with type organization continuously monitors all supported resources within the AWS organization and reports findings when they allow access from outside the organization.

## 3.133.46 - 2020-03-27

* `Aws\GlobalAccelerator` - This update adds an event history to the ListByoipCidr API call. This enables you to see the changes that you've made for an IP address range that you bring to AWS Global Accelerator through bring your own IP address (BYOIP).
* `Aws\ServiceCatalog` - Added "LocalRoleName" as an acceptable Parameter for Launch type in CreateConstraint and UpdateConstraint APIs
* `Aws\kendra` - The Amazon Kendra Microsoft SharePoint data source now supports include and exclude regular expressions and change log features. Include and exclude regular expressions enable you to provide a list of regular expressions to match the display URL of SharePoint documents to either include or exclude documents respectively. When you enable the changelog feature it enables Amazon Kendra to use the SharePoint change log to determine which documents to update in the index.

## 3.133.45 - 2020-03-26

* `Aws\FSx` - This release includes two changes: a new lower-cost, storage type called HDD (Hard Disk Drive), and a new generation of the Single-AZ deployment type called Single AZ 2. The HDD storage type can be selected on Multi AZ 1 and Single AZ 2 deployment types.
* `Aws\SageMaker` - This release updates Amazon Augmented AI CreateFlowDefinition API and DescribeFlowDefinition response.
* `Aws\SecurityHub` - Security Hub has now made it easier to opt out of default standards when you enable Security Hub. We added a new Boolean parameter to EnableSecurityHub called EnableDefaultStandards. If that parameter is true, Security Hub's default standards are enabled. A new Boolean parameter for standards, EnabledByDefault, indicates whether a standard is a default standard. Today, the only default standard is CIS AWS Foundations Benchmark v1.2. Additional default standards will be added in the future.To learn more, visit our documentation on the EnableSecurityHub API action.

## 3.133.44 - 2020-03-25

* `Aws\ApplicationInsights` - Amazon CloudWatch Application Insights for .NET and SQL Server now integrates with Amazon CloudWatch Events (AWS CodeDeploy, AWS Health and Amazon EC2 state changes). This feature enables customers to view events related to problems detected by CloudWatch Application Insights, and reduce mean-time-to-resolution (MTTR).
* `Aws\CostExplorer` - Customers can now receive Savings Plans recommendations at the member (linked) account level.
* `Aws\Detective` - The new ACCEPTED_BUT_DISABLED member account status indicates that a member account that accepted the invitation is blocked from contributing data to the behavior graph. The reason is provided in the new DISABLED_REASON property. The new StartMonitoringMember operation enables a blocked member account.
* `Aws\ElasticsearchService` - Adding support for customer packages (dictionary files) to Amazon Elasticsearch Service
* `Aws\ManagedBlockchain` - Amazon Managed Blockchain now has support to publish Hyperledger Fabric peer node, chaincode, and certificate authority (CA) logs to Amazon CloudWatch Logs.
* `Aws\XRay` - GetTraceSummaries - Now provides additional root cause attribute ClientImpacting which indicates whether root cause impacted trace client.

## 3.133.43 - 2020-03-24

* `Aws\Athena` - Documentation updates for Athena, including QueryExecutionStatus QUEUED and RUNNING states. QUEUED now indicates that the query has been submitted to the service. RUNNING indicates that the query is in execution phase.
* `Aws\EKS` - Adding new error codes: Ec2SubnetInvalidConfiguration and NodeCreationFailure for Nodegroups in EKS
* `Aws\Organizations` - Introduces actions for giving a member account administrative Organizations permissions for an AWS service. You can run this action only for AWS services that support this feature.
* `Aws\RDSDataService` - Documentation updates for rds-data

## 3.133.42 - 2020-03-23

* `Aws\ApiGatewayV2` - Documentation updates to reflect that the default timeout for integrations is now 30 seconds for HTTP APIs.
* `Aws\EKS` - Adding new error code IamLimitExceeded for Nodegroups in EKS
* `Aws\Route53` - Documentation updates for Route 53.

## 3.133.41 - 2020-03-20

* `Aws\ServiceCatalog` - Added "productId" and "portfolioId" to responses from CreateConstraint, UpdateConstraint, ListConstraintsForPortfolio, and DescribeConstraint APIs

## 3.133.40 - 2020-03-19

* `Aws\ACM` - AWS Certificate Manager documentation updated on API calls ImportCertificate and ListCertificate. Specific updates included input constraints, private key size for import and next token size for list.
* `Aws\Outposts` - Documentation updates for AWS Outposts.

## 3.133.39 - 2020-03-18

* `Aws\MediaConnect` - Feature adds the ability for a flow to have multiple redundant sources that provides resiliency to a source failing. The new APIs added to enable the feature are, AddFlowSources, RemoveFlowSource and UpdateFlow.
* `Aws\Personalize` - [Personalize] Adds support for returning hyperparameter values of the best performing model in a HPO job.
* `Aws\RDS` - Updated the MaxRecords type in DescribeExportTasks to Integer.

## 3.133.38 - 2020-03-17

* `Aws\Crypto` - This release fixes a discrepancy between the Encryption/Decryption trait implementations and AbstractCryptoClient method signature.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for: AV1 encoding in File Group MP4, DASH and CMAF DASH outputs; PCM/WAV audio output in MPEG2-TS containers; and Opus audio in Webm inputs.

## 3.133.37 - 2020-03-16

* `Aws\CognitoIdentityProvider` - Additional response field "CompromisedCredentialsDetected" added to AdminListUserAuthEvents.
* `Aws\ECS` - This release adds the ability to update the task placement strategy and constraints for Amazon ECS services.
* `Aws\ElastiCache` - Amazon ElastiCache now supports Global Datastore for Redis. Global Datastore for Redis offers fully managed, fast, reliable and secure cross-region replication. Using Global Datastore for Redis, you can create cross-region read replica clusters for ElastiCache for Redis to enable low-latency reads and disaster recovery across regions. You can create, modify and describe a Global Datastore, as well as add or remove regions from your Global Datastore and promote a region as primary in Global Datastore.
* `Aws\S3Control` - Amazon S3 now supports Batch Operations job tagging.
* `Aws\SSM` - Resource data sync for AWS Systems Manager Inventory now includes destination data sharing. This feature enables you to synchronize inventory data from multiple AWS accounts into a central Amazon S3 bucket. To use this feature, all AWS accounts must be listed in AWS Organizations.

## 3.133.36 - 2020-03-13

* `Aws\AppConfig` - This release adds S3 as a configuration source provider.

## 3.133.35 - 2020-03-12

* `Aws\ApiGatewayV2` - Amazon API Gateway HTTP APIs is now generally available. HTTP APIs offer the core functionality of REST API at up to 71% lower price compared to REST API, 60% lower p99 latency, and is significantly easier to use. As part of general availability, we added new features to route requests to private backends such as private ALBs, NLBs, and IP/ports. We also brought over a set of features from REST API such as Stage Variables, and Stage/Route level throttling. Custom domain names can also now be used with both REST And HTTP APIs.
* `Aws\EC2` - Documentation updates for EC2
* `Aws\IoT` - As part of this release, we are extending capability of AWS IoT Rules Engine to support IoT Cloudwatch log action. The IoT Cloudwatch log rule action lets you send messages from IoT sensors and applications to Cloudwatch logs for troubleshooting and debugging.
* `Aws\LexModelBuildingService` - Amazon Lex now supports tagging for bots, bot aliases and bot channels. 
* `Aws\SecurityHub` - The AWS Security Finding Format is being augmented with the following changes. 21 new resource types without corresponding details objects are added. Another new resource type, AwsS3Object, has an accompanying details object. Severity.Label is a new string field that indicates the severity of a finding. The available values are: INFORMATIONAL, LOW, MEDIUM, HIGH, CRITICAL. The new string field Workflow.Status indicates the status of the investigation into a finding. The available values are: NEW, NOTIFIED, RESOLVED, SUPPRESSED.

## 3.133.34 - 2020-03-11

* `Aws\EFS` - Documentation updates for elasticfilesystem
* `Aws\Redshift` - Amazon Redshift now supports operations to pause and resume a cluster on demand or on a schedule.

## 3.133.33 - 2020-03-10

* `Aws\EC2` - Documentation updates for EC2
* `Aws\IoTEvents` - API update that adds a new parameter, durationExpression, to SetTimerAction, and deprecates seconds
* `Aws\MarketplaceCommerceAnalytics` - Change the disbursement data set to look past 31 days instead until the beginning of the month.
* `Aws\ServerlessApplicationRepository` - AWS Serverless Application Repository now supports sharing applications privately with AWS Organizations.
* `Aws\TranscribeService` - Amazon Transcribe's Automatic Content Redaction feature enables you to automatically redact sensitive personally identifiable information (PII) from transcription results. It replaces each instance of an identified PII utterance with a [PII] tag in the transcript.

## 3.133.32 - 2020-03-09

* `Aws\DatabaseMigrationService` - Added new settings for Kinesis target to include detailed transaction info; to capture table DDL details; to use single-line unformatted json, which can be directly queried by AWS Athena if data is streamed into S3 through AWS Kinesis Firehose. Added CdcInsertsAndUpdates in S3 target settings to allow capture ongoing insertions and updates only.
* `Aws\EC2` - Amazon Virtual Private Cloud (VPC) NAT Gateway adds support for tagging on resource creation.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports the ability to configure the Preferred Channel Pipeline for channels contributing to a Multiplex.

## 3.133.31 - 2020-03-06

* `Aws\AppMesh` - App Mesh now supports sharing a Mesh with other AWS accounts. Customers can use AWS Resource Access Manager to share their Mesh with other accounts in their organization to connection applications within a single service mesh. See https://docs.aws.amazon.com/app-mesh/latest/userguide/sharing.html for details.
* `Aws\EC2` - This release provides customers with a self-service option to enable Local Zones.
* `Aws\GuardDuty` - Amazon GuardDuty findings now include the OutpostArn if the finding is generated for an AWS Outposts EC2 host.
* `Aws\RoboMaker` - Added support for streaming a GUI from robot and simulation applications
* `Aws\signer` - This release enables signing image format override in PutSigningProfile requests, adding two more enum fields, JSONEmbedded and JSONDetached. This release also extends the length limit of SigningProfile name from 20 to 64.

## 3.133.30 - 2020-03-05

* `Aws\EC2` - You can now create AWS Client VPN Endpoints with a specified VPC and Security Group. Additionally, you can modify these attributes when modifying the endpoint. 
* `Aws\EKS` - Amazon EKS now supports adding a KMS key to your cluster for envelope encryption of Kubernetes secrets.
* `Aws\GuardDuty` - Add a new finding field for EC2 findings indicating the instance's local IP address involved in the threat.
* `Aws\OpsWorksCM` - Updated the Tag regex pattern to align with AWS tagging APIs.

## 3.133.29 - 2020-03-04

* `Aws\Build` - Add custom retry handling for github release artifact uploads to handle github API quirks.
* `Aws\Pinpoint` - This release of the Amazon Pinpoint API introduces support for integrating recommender models with email, push notification, and SMS message templates. You can now use these types of templates to connect to recommender models and add personalized recommendations to messages that you send from campaigns and journeys.

## 3.133.28 - 2020-03-03

* `Aws\EC2` - Amazon VPC Flow Logs adds support for tags and tagging on resource creation.

## 3.133.27 - 2020-03-02

* `Aws\CloudWatch` - Introducing Amazon CloudWatch Composite Alarms
* `Aws\ComprehendMedical` - New Time Expression feature, part of DetectEntitiesV2 API will provide temporal relations to existing NERe entities such as Medication, Test, Treatment, Procedure and Medical conditions. 

## 3.133.26 - 2020-02-29

* `Aws\ConfigService` - Correcting list of supported resource types.

## 3.133.25 - 2020-02-28

* `Aws\AccessAnalyzer` - This release includes improvements and fixes bugs for the IAM Access Analyzer feature.
* `Aws\AppMesh` - App Mesh now supports Transport Layer Security (TLS) between Virtual Nodes in a Mesh. Customers can use managed certificates from an AWS Certificate Manager Private Certificate Authority or bring their own certificates from the local file system to encrypt traffic between their workloads. See https://docs.aws.amazon.com/app-mesh/latest/userguide/virtual-node-tls.html for details.
* `Aws\AugmentedAIRuntime` - This release updates Amazon Augmented AI ListHumanLoops API, DescribeHumanLoop response, StartHumanLoop response and type names of SDK fields. 
* `Aws\CodeGuruProfiler` - Documentation updates for Amazon CodeGuru Profiler
* `Aws\ConfigService` - Accepts a structured query language (SQL) SELECT command and an aggregator name, performs the corresponding search on resources aggregated by the aggregator, and returns resource configurations matching the properties.
* `Aws\ElasticLoadBalancingv2` - Added a target group attribute to support sticky sessions for Network Load Balancers.
* `Aws\Glue` - AWS Glue adds resource tagging support for Machine Learning Transforms and adds a new API, ListMLTransforms to support tag filtering. With this feature, customers can use tags in AWS Glue to organize and control access to Machine Learning Transforms. 
* `Aws\QuickSight` - Added SearchDashboards API that allows listing of dashboards that a specific user has access to.
* `Aws\WorkDocs` - Documentation updates for workdocs

## 3.133.24 - 2020-02-27

* `Aws\GlobalAccelerator` - This release adds support for adding tags to accelerators and bringing your own IP address to AWS Global Accelerator (BYOIP).
* `Aws\Lightsail` - Adds support to create notification contacts in Amazon Lightsail, and to create instance, database, and load balancer metric alarms that notify you based on the value of a metric relative to a threshold that you specify.

## 3.133.23 - 2020-02-26

* `Aws\EC2` - This release changes the RunInstances CLI and SDK's so that if you do not specify a client token, a randomly generated token is used for the request to ensure idempotency.
* `Aws\SageMaker` - SageMaker UpdateEndpoint API now supports retained variant properties, e.g., instance count, variant weight. SageMaker ListTrials API filter by TrialComponentName. Make ExperimentConfig name length limits consistent with CreateExperiment, CreateTrial, and CreateTrialComponent APIs.
* `Aws\SecurityHub` - Security Hub has added to the DescribeProducts API operation a new response field called IntegrationTypes. The IntegrationTypes field lists the types of actions that a product performs relative to Security Hub such as send findings to Security Hub and receive findings from Security Hub.
* `Aws\TranscribeService` - Amazon Transcribe's Automatic Content Redaction feature enables you to automatically redact sensitive personally identifiable information (PII) from transcription results. It replaces each instance of an identified PII utterance with a [PII] tag in the transcript.

## 3.133.22 - 2020-02-25

* `Aws\Kafka` - Amazon MSK has added support for Broker Log delivery to CloudWatch, S3, and Firehose.
* `Aws\Outposts` - This release adds DeleteSite and DeleteOutpost. 
* `Aws\SFN` - This release adds support for CloudWatch Logs for Standard Workflows.
* `Aws\SecretsManager` - This release increases the maximum allowed size of SecretString or SecretBinary from 10KB to 64KB in the CreateSecret, UpdateSecret, PutSecretValue and GetSecretValue APIs.

## 3.133.21 - 2020-02-24

* `Aws\CloudWatchEvents` - This release allows you to create and manage tags for event buses.
* `Aws\DocDB` - Documentation updates for docdb
* `Aws\EventBridge` - This release allows you to create and manage tags for event buses.
* `Aws\FSx` - Announcing persistent file systems for Amazon FSx for Lustre that are ideal for longer-term storage and workloads, and a new generation of scratch file systems that offer higher burst throughput for spiky workloads.
* `Aws\IoTEvents` - Documentation updates for iotcolumbo
* `Aws\Snowball` - AWS Snowball adds a field for entering your GSTIN when creating AWS Snowball jobs in the Asia Pacific (Mumbai) region. 

## 3.133.20 - 2020-02-21

* `Aws\Redshift` - Extend elastic resize to support resizing clusters to different instance types.
* `Aws\WAFV2` - Documentation updates for AWS WAF (wafv2) to correct the guidance for associating a web ACL to a CloudFront distribution.
* `Aws\imagebuilder` - This release of EC2 Image Builder increases the maximum policy document size for Image Builder resource-based policy APIs.

## 3.133.19 - 2020-02-20

* `Aws\AppConfig` - This release adds exponential growth type support for deployment strategies.
* `Aws\Pinpoint` - As of this release of the Amazon Pinpoint API, the Title property is optional for the CampaignEmailMessage object. 
* `Aws\SavingsPlans` - Added support for AWS Lambda in Compute Savings Plans

## 3.133.18 - 2020-02-19

* `Aws\AutoScaling` - Doc update for EC2 Auto Scaling: Add Enabled parameter for PutScalingPolicy
* `Aws\Lambda` - AWS Lambda now supports Ruby 2.7
* `Aws\ServiceCatalog` - "ListPortfolioAccess" API now has a new optional parameter "OrganizationParentId". When it is provided and if the portfolio with the "PortfolioId" given was shared with an organization or organizational unit with "OrganizationParentId", all accounts in the organization sub-tree under parent which inherit an organizational portfolio share will be listed, rather than all accounts with external shares. To accommodate long lists returned from the new option, the API now supports pagination.

## 3.133.17 - 2020-02-18

* `Aws\AutoScaling` - Amazon EC2 Auto Scaling now supports the ability to enable/disable target tracking, step scaling, and simple scaling policies.
* `Aws\Chime` - Added AudioFallbackUrl to support Chime SDK client.
* `Aws\RDS` - This release supports Microsoft Active Directory authentication for Amazon Aurora.

## 3.133.16 - 2020-02-17

* `Aws\Cloud9` - AWS Cloud9 now supports the ability to tag Cloud9 development environments. 
* `Aws\DynamoDB` - Amazon DynamoDB enables you to restore your DynamoDB backup or table data across AWS Regions such that the restored table is created in a different AWS Region from where the source table or backup resides. You can do cross-region restores between AWS commercial Regions, AWS China Regions, and AWS GovCloud (US) Regions. 
* `Aws\EC2` - Documentation updates for EC2
* `Aws\Rekognition` - This update adds the ability to detect text in videos and adds filters to image and video text detection.

## 3.133.15 - 2020-02-14

* `Aws\Build\Docs` - Adds customization in docs redirect map builder to avoid service name conflict.
* `Aws\EC2` - You can now enable Multi-Attach on Provisioned IOPS io1 volumes through the create-volume API.
* `Aws\MediaTailor` - AWS Elemental MediaTailor SDK now allows configuration of Personalization Threshold for HLS and DASH streams.
* `Aws\SecurityHub` - Security Hub has released a new DescribeStandards API action. This API action allows a customer to list all of the standards available in an account. For each standard, the list provides the customer with the standard name, description, and ARN. Customers can use the ARN as an input to the BatchEnableStandards API action. To learn more, visit our API documentation.
* `Aws\Shield` - This release adds support for associating Amazon Route 53 health checks to AWS Shield Advanced protected resources.
* `Aws\Test\S3` - Adds a test to verify S3 CopyObject functionality with a bucket ARN for the CopySource.

## 3.133.14 - 2020-02-13

* `Aws\MediaPackageVod` - Adds support for DASH with multiple media presentation description periods triggered by presence of SCTE-35 ad markers in the manifest.Also adds optional configuration for DASH SegmentTemplateFormat to refer to segments by Number with Duration, Number with Timeline or Time with Timeline and compact the manifest by combining duplicate SegmentTemplate tags.

## 3.133.13 - 2020-02-12

* `Aws\Chime` - Documentation updates for Amazon Chime
* `Aws\DirectoryService` - Release to add the ExpirationDateTime as an output to ListCertificates so as to ease customers to look into their certificate lifetime and make timely decisions about renewing them.
* `Aws\EC2` - This release adds support for tagging public IPv4 pools.
* `Aws\ElasticsearchService` - Amazon Elasticsearch Service now offers fine-grained access control, which adds multiple capabilities to give tighter control over data. New features include the ability to use roles to define granular permissions for indices, documents, or fields and to extend Kibana with read-only views and secure multi-tenant support.
* `Aws\Glue` - Adding ability to add arguments that cannot be overridden to AWS Glue jobs
* `Aws\Neptune` - This launch enables Neptune start-db-cluster and stop-db-cluster. Stopping and starting Amazon Neptune clusters helps you manage costs for development and test environments. You can temporarily stop all the DB instances in your cluster, instead of setting up and tearing down all the DB instances each time that you use the cluster.
* `Aws\S3` - Fixing incorrect detection of host-style endpoint pattern while using IP address
* `Aws\S3\Transfer` - Fix handling of 'debug' values different than true and valid resources.
* `Aws\WorkMail` - This release adds support for access control rules management in Amazon WorkMail.

## 3.133.12 - 2020-02-11

* `Aws\CloudFormation` - This release of AWS CloudFormation StackSets allows you to centrally manage deployments to all the accounts in your organization or specific organizational units (OUs) in AWS Organizations. You will also be able to enable automatic deployments to any new accounts added to your organization or OUs. The permissions needed to deploy across accounts will automatically be taken care of by the StackSets service.
* `Aws\CognitoIdentityProvider` - Features:This release adds a new setting for a user pool to allow if customer wants their user signup/signin with case insensitive username. The current default setting is case sensitive, and for our next release we will change it to case insensitive.
* `Aws\EC2` - Amazon EC2 Now Supports Tagging Spot Fleet.

## 3.133.11 - 2020-02-10

* `Aws\DocDB` - Added clarifying information that Amazon DocumentDB shares operational technology with Amazon RDS and Amazon Neptune.
* `Aws\KMS` - The ConnectCustomKeyStore API now provides a new error code (SUBNET_NOT_FOUND) for customers to better troubleshoot if their "connect-custom-key-store" operation fails.

## 3.133.10 - 2020-02-07

* `Aws\RDS` - Documentation updates for RDS: when restoring a DB cluster from a snapshot, must create DB instances
* `Aws\RoboMaker` - This release adds support for simulation job batches
* `Aws\imagebuilder` - This version of the SDK includes bug fixes and documentation updates.

## 3.133.9 - 2020-02-06

* `Aws\AppSync` - AWS AppSync now supports X-Ray
* `Aws\CodeBuild` - AWS CodeBuild adds support for Amazon Elastic File Systems
* `Aws\EBS` - Documentation updates for EBS direct APIs.
* `Aws\EC2` - This release adds platform details and billing info to the DescribeImages API.
* `Aws\ECR` - This release contains updated text for the GetAuthorizationToken API.
* `Aws\LexModelBuildingService` - Amazon Lex now supports AMAZON.AlphaNumeric with regular expressions.

## 3.133.8 - 2020-02-05

* `Aws\DLM` - Updated the maximum number of tags that can be added to a snapshot using DLM to 45.
* `Aws\EC2` - This release provides support for tagging when you create a VPC endpoint, or VPC endpoint service.
* `Aws\ForecastQueryService` - Documentation updates for Amazon Forecast.
* `Aws\GroundStation` - Adds dataflowEndpointRegion property to DataflowEndpointConfig. The dateCreated, lastUpdated, and tags properties on GetSatellite have been deprecated.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for fine-tuned QVBR quality level.
* `Aws\ResourceGroupsTaggingAPI` - Documentation-only update that adds services to the list of supported services.
* `Aws\SecurityHub` - Additional resource types are now supported in the AWS Security Finding Format (ASFF). The following new resource types are added, each having an accompanying resource details object with fields for security finding providers to populate: AwsCodeBuildProject, AwsEc2NetworkInterface, AwsEc2SecurityGroup, AwsElasticsearchDomain, AwsLambdaLayerVersion, AwsRdsDbInstance, and AwsWafWebAcl. The following resource types are added without an accompanying details object: AutoscalingAutoscalingGroup, AwsDynamoDbTable, AwsEc2Eip, AwsEc2Snapshot, AwsEc2Volume, AwsRdsDbSnapshot, AwsRedshiftCluster, and AwsS3Object. The number of allowed resources per finding is increased from 10 to 32. A new field is added in the Compliance object, RelatedRequirements. To learn more, visit our documentation on the ASFF.

## 3.133.7 - 2020-02-04

* `Aws\CloudFront` - Documentation updates for CloudFront
* `Aws\EC2` - Amazon VPC Flow Logs adds support for 1-minute aggregation intervals.
* `Aws\IoT` - Updated ThrottlingException documentation to report that the error code is 400, and not 429, to reflect actual system behaviour.
* `Aws\Kafka` - This release enables AWS MSK customers to list Apache Kafka versions that are supported on AWS MSK clusters. Also includes changes to expose additional details of a cluster's state in DescribeCluster and ListClusters APIs.
* `Aws\SSM` - This feature ensures that an instance is patched up to the available patches on a particular date. It can be enabled by selecting the 'ApproveUntilDate' option as the auto-approval rule while creating the patch baseline. ApproveUntilDate - The cutoff date for auto approval of released patches. Any patches released on or before this date will be installed automatically.
* `Aws\StorageGateway` - Adding KVM as a support hypervisor
* `Aws\WorkMail` - This release adds support for tagging Amazon WorkMail organizations.

## 3.133.6 - 2020-01-24

* `Aws\DataSync` - AWS DataSync now supports FSx for Windows File Server Locations
* `Aws\ECS` - This release provides support for tagging Amazon ECS task sets for services using external deployment controllers.
* `Aws\EKS` - Adding new error codes for Nodegroups in EKS
* `Aws\OpsWorksCM` - AWS OpsWorks for Chef Automate now supports in-place upgrade to Chef Automate 2. Eligible servers can be updated through the management console, CLI and APIs.
* `Aws\WorkSpaces` - Documentation updates for WorkSpaces

## 3.133.5 - 2020-01-23

* `Aws\IAM` - This release enables the Identity and Access Management policy simulator to simulate permissions boundary policies.
* `Aws\RDS` - This SDK release introduces APIs that automate the export of Amazon RDS snapshot data to Amazon S3. The new APIs include: StartExportTask, CancelExportTask, DescribeExportTasks. These APIs automate the extraction of data from an RDS snapshot and export it to an Amazon S3 bucket. The data is stored in a compressed, consistent, and query-able format. After the data is exported, you can query it directly using tools such as Amazon Athena or Redshift Spectrum. You can also consume the data as part of a data lake solution. If you archive the data in S3 Infrequent Access or Glacier, you can reduce long term data storage costs by applying data lifecycle policies.

## 3.133.4 - 2020-01-21

* `Aws\ApplicationDiscoveryService` - Documentation updates for the AWS Application Discovery Service.
* `Aws\CodePipeline` - AWS CodePipeline enables an ability to stop pipeline executions.
* `Aws\EC2` - Add an enum value to the result of DescribeByoipCidrs to support CIDRs that are not publicly advertisable.
* `Aws\IoTEvents` - Documentation updates for iotcolumbo
* `Aws\MarketplaceCommerceAnalytics` - Remove 4 deprecated data sets, change some data sets available dates to 2017-09-15

## 3.133.3 - 2020-01-20

* `Aws\AlexaForBusiness` - Add support for CreatedTime and ConnectionStatusUpdatedTime in response of SearchDevices API.
* `Aws\ApplicationInsights` - This release adds support for a list API to retrieve the configuration events logged during periodic updates to an application by Amazon CloudWatch Application Insights. 
* `Aws\CloudWatch` - Updating DescribeAnomalyDetectors API to return AnomalyDetector Status value in response.
* `Aws\EC2` - This release provides support for a preview of bringing your own IPv6 addresses (BYOIP for IPv6) for use in AWS.
* `Aws\KMS` - The ConnectCustomKeyStore operation now provides new error codes (USER_LOGGED_IN and USER_NOT_FOUND) for customers to better troubleshoot if their connect custom key store operation fails. Password length validation during CreateCustomKeyStore now also occurs on the client side. 
* `Aws\Lambda` - Added reason codes to StateReasonCode (InvalidSubnet, InvalidSecurityGroup) and LastUpdateStatusReasonCode (SubnetOutOfIPAddresses, InvalidSubnet, InvalidSecurityGroup) for functions that connect to a VPC.

## 3.133.2 - 2020-01-17

* `Aws\Batch` - This release ensures INACTIVE job definitions are permanently deleted after 180 days.
* `Aws\CloudHSMV2` - This release introduces resource-level and tag-based access control for AWS CloudHSM resources. You can now tag CloudHSM backups, tag CloudHSM clusters on creation, and tag a backup as you copy it to another region.
* `Aws\ECS` - This release provides a public preview for specifying Amazon EFS file systems as volumes in your Amazon ECS task definitions.
* `Aws\MediaConvert` - AWS Elemental MediaConvert SDK has added support for MP3 audio only outputs.
* `Aws\Neptune` - This release includes Deletion Protection for Amazon Neptune databases.
* `Aws\Redshift` - Documentation updates for redshift

## 3.133.1 - 2020-01-16

* `Aws\DirectoryService` - To reduce the number of errors our customers are facing, we have modified the requirements of input parameters for two of Directory Service APIs.
* `Aws\EC2` - Client VPN now supports Port Configuration for VPN Endpoints, allowing usage of either port 443 or port 1194.
* `Aws\SageMaker` - This release adds two new APIs (UpdateWorkforce and DescribeWorkforce) to SageMaker Ground Truth service for workforce IP whitelisting.

## 3.133.0 - 2020-01-15

* `Aws\` - Added retry for EC2ThrottledException
* `Aws\EC2` - General Update to EC2 Docs and SDKs
* `Aws\Organizations` - Updated description for PolicyID parameter and ConstraintViolationException.
* `Aws\SSM` - Document updates for Patch Manager 'NoReboot' feature.
* `Aws\SecurityHub` - Add support for DescribeStandardsControls and UpdateStandardsControl. These new Security Hub API operations are used to track and manage whether a compliance standards control is enabled.
* `Aws\Test\Integ` - Modify S3 integration context event hooks, as well as retry logic to take into account S3 eventual consistency characteristics.

## 3.132.5 - 2020-01-14

* `Aws\EC2` - This release adds support for partition placement groups and instance metadata option in Launch Templates

## 3.132.4 - 2020-01-13

* `Aws\Backup` - Cross-region backup is a new AWS Backup feature that allows enterprises to copy backups across multiple AWS services to different regions. 
* `Aws\EC2` - Documentation updates for the StopInstances API. You can now stop and start an Amazon EBS-backed Spot Instance at will, instead of relying on the Stop interruption behavior to stop your Spot Instances when interrupted.
* `Aws\EFS` - This release adds support for managing EFS file system policies and EFS Access Points.

## 3.132.3 - 2020-01-10

* `Aws\Chime` - Add shared profile support to new and existing users
* `Aws\CloudFront` - CloudFront Signer now accepts PEM formatted private keys stored as variables in addition to the path to a key file.
* `Aws\EC2` - This release introduces the ability to tag egress only internet gateways, local gateways, local gateway route tables, local gateway virtual interfaces, local gateway virtual interface groups, local gateway route table VPC association and local gateway route table virtual interface group association. You can use tags to organize and identify your resources for cost allocation. 
* `Aws\RDS` - This release adds an operation that enables users to override the system-default SSL/TLS certificate for new Amazon RDS DB instances temporarily, or remove the customer override.
* `Aws\SageMaker` - SageMaker ListTrialComponents API filter by TrialName and ExperimentName.
* `Aws\Transfer` - This release introduces a new endpoint type that allows you to attach Elastic IP addresses from your AWS account with your server's endpoint directly and whitelist access to your server by client's internet IP address(es) using VPC Security Groups.
* `Aws\WorkSpaces` - Added the migrate feature to Amazon WorkSpaces.

## 3.132.2 - 2020-01-09

* `Aws\CloudWatchLogs` - Documentation updates for logs
* `Aws\STS` - Documentation updates for sts

## 3.132.1 - 2020-01-08

* `Aws\ApiGatewayV2` - Adds an alias 'GetApiResource' for the 'GetApi' operation to avoid a naming conflict with the generic AwsClient 'GetApi' method.
* `Aws\CostExplorer` - Documentation updates for CreateCostCategoryDefinition and UpdateCostCategoryDefinition API
* `Aws\FMS` - AWS Firewall Manager now supports tagging, and tag-based access control, of policies.
* `Aws\Translate` - This release adds a new family of APIs for asynchronous batch translation service that provides option to translate large collection of text or HTML documents stored in Amazon S3 folder. This service accepts a batch of up to 5 GB in size per API call with each document not exceeding 1 MB size and the number of documents not exceeding 1 million per batch. See documentation for more information. 

## 3.132.0 - 2020-01-07

* `Aws\` - Adds support for the 'AWS_CONFIG_FILE' environment variable to set the default config file location. This is implemented for all configuration provider classes extending AbstractConfigurationProvider.
* `Aws\CodeBuild` - Add encryption key override to StartBuild API in AWS CodeBuild.
* `Aws\MigrationHub` - ListApplicationStates API provides a list of all application migration states
* `Aws\XRay` - Documentation updates for xray

## 3.131.0 - 2020-01-06

* `Aws\` - Add support for Guzzle7.
* `Aws\CloudFront` - Modifies CloudFront Signer to accept a passphrase for the key file. Modifies Signer test to use a fixed test key file.
* `Aws\Comprehend` - Amazon Comprehend now supports Multilabel document classification
* `Aws\EC2` - This release supports service providers configuring a private DNS name for services other than AWS services and services available in the AWS marketplace. This feature allows consumers to access the service using an existing DNS name without making changes to their applications.
* `Aws\MediaPackage` - You can now restrict direct access to AWS Elemental MediaPackage by securing requests for live content using CDN authorization. With CDN authorization, content requests require a specific HTTP header and authorization code.

## 3.130.3 - 2020-01-02

* `Aws\CostExplorer` - Documentation updates for GetReservationUtilization for the Cost Explorer API.
* `Aws\ECR` - Adds waiters for ImageScanComplete and LifecyclePolicyPreviewComplete
* `Aws\LexModelBuildingService` - Documentation updates for Amazon Lex.
* `Aws\Lightsail` - This release adds support for Certificate Authority (CA) certificate identifier to managed databases in Amazon Lightsail.

## 3.130.2 - 2019-12-23

* `Aws\Detective` - Updated the documentation for Amazon Detective.
* `Aws\FSx` - This release adds a new family of APIs (create-data-repository-task, describe-data-repository-task, and cancel-data-repository-task) that allow users to perform operations between their file system and its linked data repository.
* `Aws\Health` - With this release, you can now centrally aggregate AWS Health events from all accounts in your AWS organization. Visit AWS Health documentation to learn more about enabling and using this feature: https://docs.aws.amazon.com/health/latest/ug/organizational-view-health.html. 

## 3.130.1 - 2019-12-20

* `Aws\DeviceFarm` - Introduced browser testing support through AWS Device Farm
* `Aws\EC2` - This release introduces the ability to tag key pairs, placement groups, export tasks, import image tasks, import snapshot tasks and export image tasks. You can use tags to organize and identify your resources for cost allocation. 
* `Aws\EKS` - Amazon EKS now supports restricting access to the API server public endpoint by applying CIDR blocks
* `Aws\Pinpoint` - This release of the Amazon Pinpoint API introduces versioning support for message templates.
* `Aws\RDS` - This release adds an operation that enables users to specify whether a database is restarted when its SSL/TLS certificate is rotated. Only customers who do not use SSL/TLS should use this operation.
* `Aws\Redshift` - Documentation updates for Amazon Redshift RA3 node types.
* `Aws\SSM` - This release updates the attachments support to include AttachmentReference source for Automation documents.
* `Aws\SecurityHub` - Additional resource types are now fully supported in the AWS Security Finding Format (ASFF). These resources include AwsElbv2LoadBalancer, AwsKmsKey, AwsIamRole, AwsSqsQueue, AwsLambdaFunction, AwsSnsTopic, and AwsCloudFrontDistribution. Each of these resource types includes an accompanying resource details object with fields for security finding providers to populate. Updates were made to the AwsIamAccessKey resource details object to include information on principal ID and name. To learn more, visit our documentation on the ASFF.
* `Aws\TranscribeService` - AWS Transcribe now supports vocabulary filtering that allows customers to input words to the service that they don't want to see in the output transcript.

## 3.130.0 - 2019-12-19

* `Aws\CodeStarconnections` - Public beta for Bitbucket Cloud support in AWS CodePipeline through integration with AWS CodeStar connections.
* `Aws\Credentials` - Brings PHP SDK inline with Python's boto3, allowing setting instance metadata timeout and retries from environment variables
* `Aws\DLM` - You can now copy snapshots across regions using Data Lifecycle Manager (DLM). You can enable policies which, along with create, can now also copy snapshots to one or more AWS region(s). Copies can be scheduled for up to three regions from a single policy and retention periods are set for each region separately. 
* `Aws\EC2` - We are updating the supportedRootDevices field to supportedRootDeviceTypes for DescribeInstanceTypes API to ensure that the actual value is returned, correcting a previous error in the model.
* `Aws\GameLift` - Amazon GameLift now supports ARNs for all key GameLift resources, tagging for GameLift resource authorization management, and updated documentation that articulates GameLift's resource authorization strategy.
* `Aws\LexModelBuildingService` - Amazon Lex now supports conversation logs and slot obfuscation.
* `Aws\PersonalizeRuntime` - Add context map to get-recommendations and get-personalized-ranking request objects to provide contextual metadata at inference time
* `Aws\SSM` - This release allows customers to add tags to Automation execution, enabling them to sort and filter executions in different ways, such as by resource, purpose, owner, or environment.
* `Aws\TranscribeService` - Amazon Transcribe supports job queuing for the StartTranscriptionJob API.

## 3.129.3 - 2019-12-18

* `Aws\Build\Docs` - Adds a hook for custom examples in API documentation generation.
* `Aws\CloudFront` - Documentation updates for CloudFront
* `Aws\EC2` - This release introduces the ability to tag Elastic Graphics accelerators. You can use tags to organize and identify your accelerators for cost allocation.
* `Aws\OpsWorksCM` - AWS OpsWorks CM now supports tagging, and tag-based access control, of servers and backups.
* `Aws\ResourceGroupsTaggingAPI` - Documentation updates for resourcegroupstaggingapi
* `Aws\S3` - Updates Amazon S3 endpoints allowing you to configure your client to opt-in to using S3 with the us-east-1 regional endpoint, instead of global.

## 3.129.2 - 2019-12-17

* `Aws\EC2` - Documentation updates for Amazon EC2
* `Aws\ECS` - Documentation updates for Amazon ECS.
* `Aws\IoT` - Added a new Over-the-Air (OTA) Update feature that allows you to use different, or multiple, protocols to transfer an image from the AWS cloud to IoT devices.
* `Aws\KinesisAnalyticsV2` - Kinesis Data Analytics service now supports running Java applications using Flink 1.8.
* `Aws\MediaLive` - AWS Elemental MediaLive now supports HLS ID3 segment tagging, HLS redundant manifests for CDNs that support different publishing/viewing endpoints, fragmented MP4 (fMP4), and frame capture intervals specified in milliseconds.
* `Aws\SSM` - Added support for Cloud Watch Output and Document Version to the Run Command tasks in Maintenance Windows.

## 3.129.1 - 2019-12-16

* `Aws\ComprehendMedical` - New Ontology linking APIs will provides medication concepts normalization and Diagnoses codes from input text. In this release we will provide two APIs - RxNorm and ICD10-CM. 
* `Aws\EC2` - You can now configure your EC2 Fleet to preferentially use EC2 Capacity Reservations for launching On-Demand instances, enabling you to fully utilize the available (and unused) Capacity Reservations before launching On-Demand instances on net new capacity.
* `Aws\MQ` - Amazon MQ now supports throughput-optimized message brokers, backed by Amazon EBS.

## 3.129.0 - 2019-12-13

* `Aws\Api\Parser` - Add support for parsing XML attributes for models using XML-based protocols.
* `Aws\CodeBuild` - CodeBuild adds support for cross account
* `Aws\Detective` - This is the initial release of Amazon Detective.
* `Aws\SesV2` - Added the ability to use your own public-private key pair to configure DKIM authentication for a domain identity.

## 3.128.4 - 2019-12-12

* `Aws\AccessAnalyzer` - This release includes improvements and fixes bugs for the IAM Access Analyzer feature.

## 3.128.3 - 2019-12-11

* `Aws\EC2` - This release allows customers to attach multiple Elastic Inference Accelerators to a single EC2 instance. It adds support for a Count parameter for each Elastic Inference Accelerator type you specify on the RunInstances and LaunchTemplate APIs.

## 3.128.2 - 2019-12-10

* `Aws\S3Control` - Adds AccountId validation for S3Control.
* `Aws\kendra` - 1. Adding DocumentTitleFieldName as an optional configuration for SharePoint. 2. updating s3 object pattern to support all s3 keys.

## 3.128.1 - 2019-12-09

* `Aws\KMS` - The Verify operation now returns KMSInvalidSignatureException on invalid signatures. The Sign and Verify operations now return KMSInvalidStateException when a request is made against a CMK pending deletion.
* `Aws\Kafka` - AWS MSK has added support for Open Monitoring with Prometheus.
* `Aws\QuickSight` - Documentation updates for QuickSight
* `Aws\SSM` - Adds the SSM GetCalendarState API and ChangeCalendar SSM Document type. These features enable the forthcoming Systems Manager Change Calendar feature, which will allow you to schedule events during which actions should (or should not) be performed.
* `Aws\Test` - Adds a test bootstrap patch for a PHPUnit class file that triggers deprecation warnings for PHP 7.4+. This is necessary because the SDK supports older versions of PHP and currently relies on older, now unsupported, versions of PHPUnit.

## 3.128.0 - 2019-12-05

* `Aws\ApiGatewayV2` - Amazon API Gateway now supports HTTP APIs (beta), enabling customers to quickly build high performance RESTful APIs that are up to 71% cheaper than REST APIs also available from API Gateway. HTTP APIs are optimized for building APIs that proxy to AWS Lambda functions or HTTP backends, making them ideal for serverless workloads. Using HTTP APIs, you can secure your APIs using OIDC and OAuth 2 out of box, quickly build web applications using a simple CORS experience, and get started immediately with automatic deployment and simple create workflows.
* `Aws\KinesisVideo` - Introduces management of signaling channels for Kinesis Video Streams.
* `Aws\KinesisVideoSignalingChannels` - Announcing support for WebRTC in Kinesis Video Streams, as fully managed capability. You can now use simple APIs to enable your connected devices, web, and mobile apps with real-time two-way media streaming capabilities.
* `Aws\Test\S3` - Fixes stream reading issue in TransferTest with PHP 7.4.

## 3.127.0 - 2019-12-04

* `Aws\` - Fixes array offset null issue and test stream class for PHP 7.4.
* `Aws\ApplicationAutoScaling` - This release supports auto scaling of provisioned concurrency for AWS Lambda.
* `Aws\EBS` - This release introduces the EBS direct APIs for Snapshots: 1. ListSnapshotBlocks, which lists the block indexes and block tokens for blocks in an Amazon EBS snapshot. 2. ListChangedBlocks, which lists the block indexes and block tokens for blocks that are different between two snapshots of the same volume/snapshot lineage. 3. GetSnapshotBlock, which returns the data in a block of an Amazon EBS snapshot.
* `Aws\Lambda` - - Added the ProvisionedConcurrency type and operations. Allocate provisioned concurrency to enable your function to scale up without fluctuations in latency. Use PutProvisionedConcurrencyConfig to configure provisioned concurrency on a version of a function, or on an alias.
* `Aws\RDS` - This release adds support for the Amazon RDS Proxy
* `Aws\Rekognition` - This SDK Release introduces APIs for Amazon Rekognition Custom Labels feature (CreateProjects, CreateProjectVersion,DescribeProjects, DescribeProjectVersions, StartProjectVersion, StopProjectVersion and DetectCustomLabels). Also new is AugmentedAI (Human In The Loop) Support for DetectModerationLabels in Amazon Rekognition.
* `Aws\S3` - Adds support for using S3 Access Point ARNs in Bucket fields for S3 operations and helper classes.
* `Aws\SFN` - This release of the AWS Step Functions SDK introduces support for Express Workflows.
* `Aws\SageMaker` - You can now use SageMaker Autopilot for automatically training and tuning candidate models using a combination of various feature engineering, ML algorithms, and hyperparameters determined from the user's input data. SageMaker Automatic Model Tuning now supports tuning across multiple algorithms. With Amazon SageMaker Experiments users can create Experiments, ExperimentTrials, and ExperimentTrialComponents to track, organize, and evaluate their ML training jobs. With Amazon SageMaker Debugger, users can easily debug training jobs using a number of pre-built rules provided by Amazon SageMaker, or build custom rules. With Amazon SageMaker Processing, users can run on-demand, distributed, and fully managed jobs for data pre- or post- processing or model evaluation. With Amazon SageMaker Model Monitor, a user can create MonitoringSchedules to automatically monitor endpoints to detect data drift and other issues and get alerted on them. This release also includes the preview version of Amazon SageMaker Studio with Domains, UserProfiles, and Apps. This release also includes the preview version of Amazon Augmented AI to easily implement human review of machine learning predictions by creating FlowDefinitions, HumanTaskUis, and HumanLoops.

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
