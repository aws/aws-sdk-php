# CHANGELOG

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
* `version` and `region` are noww required parameter for each client
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
