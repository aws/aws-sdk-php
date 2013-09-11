CHANGELOG
=========

2.4.6 (2013-09-12)
------------------

* Added support for modifying EC2 Reserved Instances to the Amazon EC2 client
* Added support for VPC features to the AWS OpsWorks client
* Updated the DynamoDB Session Handler to implement the SessionHandlerInterface of PHP 5.4 when available
* Updated the SNS Message Validator to throw an exception, instead of an error, when the raw post data is invalid
* Fixed an issue in the S3 signature which ensures that parameters are sorted correctly for signing
* Fixed an issue in the S3 client where the Sydney region was not allowed as a `LocationConstraint` for the
  `PutObject` operation

2.4.5 (2013-09-04)
------------------

* Added support for replication groups to the Amazon ElastiCache client
* Added support for using the `us-gov-west-1` region to the AWS CloudFormation client

2.4.4 (2013-08-29)
------------------

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

2.4.3 (2013-08-12)
------------------

* Added support for mobile push notifications to the Amazon SNS client
* Added support for progress reporting on snapshot restore operations to the the Amazon Redshift client
* Updated the Amazon Elastic MapReduce client to use JSON serialization
* Updated the Amazon Elastic MapReduce client to sign requests with Signature V4
* Updated the SDK to throw `Aws\Common\Exception\TransferException` exceptions when a network error occurs instead of a
  `Guzzle\Http\Exception\CurlException`. The TransferException class, however, extends from
  `Guzzle\Http\Exception\CurlException`. You can continue to catch the Guzzle `CurlException` or catch
  `Aws\Common\Exception\AwsExceptionInterface` to catch any exception that can be thrown by an AWS client
* Fixed an issue with the Amazon S3 stream wrapper where trailing slashes were being added when listing directories

2.4.2 (2013-07-25)
------------------

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

2.4.1 (2013-06-08)
------------------

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

2.4.0 (2013-06-18)
------------------

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

2.3.4 (2013-05-30)
------------------

* Set the Guzzle dependency to ~3.6.0

2.3.3 (2013-05-28)
------------------

* Added support for web identity federation in the AWS Security Token Service (STS) API
* Fixed an issue with creating pre-signed Amazon CloudFront RTMP URLs
* Fixed issue #85 to correct the parameter serialization of NetworkInterfaces within the Amazon EC2 RequestSpotInstances
  operation

2.3.2 (2013-05-15)
------------------

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

2.3.1 (2013-04-30)
------------------

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

2.3.0 (2013-04-18)
------------------

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

2.2.1 (2013-03-18)
------------------

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

2.2.0 (2013-03-11)
------------------

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
* Added end-user guides available at http://aws-docs.integ.amazon.com/aws-sdk-php-2/guide/latest/
* Fixed issue #48 where signing Amazon S3 requests with null or empty metadata resulted in a signature error
* Fixed issue #29 where Amazon S3 was intermittently closing a connection
* Updated the Amazon S3 client to parse the AcceptRanges header for HeadObject and GetObject output
* Updated the Amazon Glacier client to allow the `saveAs` parameter to be specified as an alias for `command.response_body`
* Various performance improvements throughout the SDK
* Removed endpoint providers and now placing service region information directly in service descriptions
* Removed client resolvers when creating clients in a client's factory method (this should not have any impact to end users)

2.1.2 (2013-02-18)
------------------

* Added support for **AWS OpsWorks**

2.1.1 (2013-02-15)
------------------

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

2.1.0 (2013-01-28)
------------------

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

2.0.3 (2012-12-20)
------------------

* Added support for **AWS Data Pipeline**
* Added support for **Amazon Route 53**
* Fixed an issue with the Amazon S3 client where object keys with slashes were causing errors
* Added a `SaveAs` parameter to the Amazon S3 `GetObject` operation to allow saving the object directly to a file
* Refactored iterators to remove code duplication and ease creation of future iterators

2.0.2 (2012-12-10)
------------------

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

2.0.1 (2012-11-13)
------------------

* Fixed a signature issue encountered when a request to Amazon S3 is redirected
* Added support for archiving Amazon S3 objects to Amazon Glacier
* Added CRC32 validation of Amazon DynamoDB responses
* Added ConsistentRead support to the `BatchGetItem` operation of Amazon DynamoDB
* Added new region endpoints, including Sydney

2.0.0 (2012-11-02)
------------------

* Initial release of the AWS SDK for PHP Version 2. See <http://aws.amazon.com/sdkforphp2/> for more information.
* Added support for **Amazon Simple Storage Service (Amazon S3)**
* Added support for **Amazon DynamoDB**
* Added support for **Amazon Glacier**
* Added support for **Amazon CloudFront**
* Added support for **AWS Security Token Service (AWS STS)**
