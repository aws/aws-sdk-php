Upgrading Guide
===============

Upgrade from 2.x to 3.x
-----------------------

Version 3 is a new major version of the SDK that represents a lot of new work
and refactoring. While the fundamental way the you use the SDK has not changed,
there are changes in several parts to accomplish our goals, including adding
new functionality, improving performance, simplifying interfaces, and
reducing bloat.

### Dependencies

* **PHP 5.5+** - PHP version 5.5 or higher is now required, because the SDK and
  its dependencies use various PHP 5.4/5.5 features including traits,
  generators, and `callable` typehints,
* **[Guzzle 5](http://guzzlephp.org/)** - The underlying HTTP library for the
  SDK. The update from Guzzle 3 to Guzzle 5 provides many of the new features of
  the SDK, including async requests, the new event system, the "debug" client
  option, and more.
* **[jmespath.php](https://github.com/jmespath/jmespath.php)** - Provides the
  ability to query Result data, especially deeply nested results. It implements
  the [JMESPath specification](http://jmespath.org/), which is also supported
  by the [AWS CLI](https://github.com/aws/aws-cli).

### SDK instantiation and configuration

Version 3 of the SDK introduces the `Aws\Sdk` class to replace `Aws\Common\Aws`.
The `Sdk` class does extend from Guzzle and does not act as a service locator.
It does act as a client factory though, and you can use it to create a service
client.

```php
$aws = new \Aws\Sdk();

// Use the getClient method to instantiate a client.
$aws->getClient('s3', [
    // Provide client options.
    'region'  => 'us-west-2',
    'version' => '2006-03-01',
]);

// OR... you can use the magic methods that have IDE autocompletion.
$aws->getS3([
    // Provide client options.
    'region'  => 'us-west-2',
    'version' => 'latest',
]);
```

The client options are a little different from the Version 2 options. Please see
the [API docs for `Aws\Sdk::getClient()`](http://docs.aws.amazon.com/aws-sdk-php/v3/api/Aws/Sdk.html#method_getClient)
for a list of the client options.

You can also, pass client options to the constructor of `Aws\Sdk`. These options
will be global options to all clients created with this instance of the `Sdk`
object. They can be overwritten when calling the `getClient()` method as above.

```php
$aws = new \Aws\Sdk([
    'region'  => 'us-west-2',
    'version' => 'latest',
]);

// Will use global client options.
$dynamoDb = $aws->getDynamoDb();

// Will use global client options, but will overwrite the region.
$dynamoDb = $aws->getDynamoDb([
    'region' => 'ap-northeast-1',
]);
```

You can add service-specific global options by using the service name as a key
in the options.

```php
$aws = new \Aws\Sdk([
    'region'   => 'us-west-2',
    'version'  => 'latest',
    'dynamodb' => [
        'region' => 'ap-northeast-1',
    ]
]);
```

#### Creating clients

Using the `factory()` method of a client is now deprecated. v3 of the SDK now
allows you to create clients using the `new` operator:

```php
$client = new \Aws\S3\S3Client([
    'region'  => 'us-west-2',
    'version' => '2006-03-01'
]);
```

#### The `version` client option

You are required to provide the API version when you instantiate a client. This
is important, because it allows you to lock-in to the API versions of the
services you are using. This helps the SDK and you maintain backward
compatibility between future SDK releases, because you will be in control of
which API versions you are using. Your code will never be impacted by new
service API versions until you update your version setting. If this is not a
concern for you, you can default to the latest API version by setting
`'version'` to `'latest'` (this is essentially the default behavior of V2).

### Removal of Enum classes

Enums in Version 2 of the SDK (e.g., `Aws\S3\Enum\CannedAcl`) were concrete
classes within the public API of the SDK that contained constants representing
groups of valid parameter values to use when making calls to various service
operations. We thought at the time, that these would be helpful to customers,
but we quickly ran into issues.

1. **Enum values change over time** - Services add and remove enum values from
   their APIs over time. Sometimes services make backward-incompatible changes
   to their API (they change their API version, and the SDK has to support both
   versions). We have to make sure the Enum classes are backward-compatible,
   even if the services' APIs change. Because of this, many Enum classes in
   Version 2 contain constants that may or may not be valid, depending on which
   version of the API you are using.

2. **Some Enum values are reserved words in PHP** - Some service APIs end up
   declaring Enum values that are named the same as a reserved word in PHP. In
   those cases, we have to change the name to something else in order to put it
   in an enum class. This makes some of the Version 2 enum classes inconsistent
   with the actual service's API.

3. **Enum classes add bloat to the SDK** - There are over 150 Enum classes in
   Version 2.

4. **Statically generated enum classes conflict with our dynamically driven API
   model approach.** - The SDK currently supports multiple API versions based on
   a user-supplied "version" parameter. By statically generating enum classes,
   we are locking those enum classes to a specific API version, while at the
   same time, promising that you can change the API version of a client at
   runtime. These two things are not compatible with one another.

5. **Enum classes provide little to no value**

    1. Enum classes required you to know about and import (via use) them before
       you could actually use them.
    2. They provided autocomplete support, but only for IDE-using customers, and
       only in the case where you know which enum to use for nested API
       parameters.
    3. There is no way to indicate which Enums are used with each operation and
       to which parameters.
    4. Writing out an Enum value is longer than writing the actual value (e.g.,
       `CannedAcl::PUBLIC_READ` vs. ``'public-read'``).
    5. The constant name is basically the same as the literal string value, so
       the constant isn't actually abstracting anything.

Because of these issues, we decided that we needed to remove Enums. For V2, we
stopped updating them and stopped documenting them, and in V3, we have
removed them completely.

### Removal of fine-grained Exception classes

We have removed the fine-grained exception classes that lived in the each of the
services namespaces (e.g., `Aws\Rds\Exception\{SpecificErrorCase}Exception`) for
very similar reasons that we removed Enums. The exceptions thrown by a
service/operation are dependent on which API version (i.e, they can change from
version to version) is used. Also, we are not technically able to provide the
complete list of what exceptions can be thrown by a given operation (long
story). This makes the fine-grained exception classes fairly useless.

Similarly to Enums, we have not been updating these classes in V2 for several
months, and have already removed them from our documentation.

You should handle errors by catching the root exception class for each service
(e.g. `Aws\Rds\Exception\RdsException`). You can use the `getAwsErrorCode()`
method (formerly called `getExceptionCode()` in V2) of the exception to check
for specific error codes. This is functionally equivalent to catching different
exception classes, but provides that function without adding bloat to the SDK or
setting false expectations.

### Some API results have changed

In order to provide consistency in how the SDK parses the result of an API
operation, Amazon ElastiCache, Amazon RDS, and Amazon RedShift now have an
additional wrapping element on some API responses.

For example, calling Amazon RDS's [DescribeEngineDefaultParameters](http://docs.aws.amazon.com/AmazonRDS/latest/APIReference/API_DescribeEngineDefaultParameters.html)
result in v3 now includes a wrapping "EngineDefaults" element whereas in v2
this element was not present.

```php
$client = new Aws\Rds\RdsClient([
    'region'  => 'us-west-1',
    'version' => '2014-09-01'
]);

// Version 2:
$result = $client->describeEngineDefaultParameters();
$family = $result['DBParameterGroupFamily'];
$marker = $result['Marker'];

// Version 3:
$result = $client->describeEngineDefaultParameters();
$family = $result['EngineDefaults']['DBParameterGroupFamily'];
$marker = $result['EngineDefaults']['Marker'];
```

The following operations are affected and now contain a wrapping element in the
output of the result (provided below in parenthesis):

- Amazon ElastiCache
  - AuthorizeCacheSecurityGroupIngress (CacheSecurityGroup)
  - CopySnapshot (Snapshot)
  - CreateCacheCluster (CacheCluster)
  - CreateCacheParameterGroup (CacheParameterGroup)
  - CreateCacheSecurityGroup (CacheSecurityGroup)
  - CreateCacheSubnetGroup (CacheSubnetGroup)
  - CreateReplicationGroup (ReplicationGroup)
  - CreateSnapshot (Snapshot)
  - DeleteCacheCluster (CacheCluster)
  - DeleteReplicationGroup (ReplicationGroup)
  - DeleteSnapshot (Snapshot)
  - DescribeEngineDefaultParameters (EngineDefaults)
  - ModifyCacheCluster (CacheCluster)
  - ModifyCacheSubnetGroup (CacheSubnetGroup)
  - ModifyReplicationGroup (ReplicationGroup)
  - PurchaseReservedCacheNodesOffering (ReservedCacheNode)
  - RebootCacheCluster (CacheCluster)
  - RevokeCacheSecurityGroupIngress (CacheSecurityGroup)
- Amazon RDS
  - AddSourceIdentifierToSubscription (EventSubscription)
  - AuthorizeDBSecurityGroupIngress (DBSecurityGroup)
  - CopyDBParameterGroup (DBParameterGroup)
  - CopyDBSnapshot (DBSnapshot)
  - CopyOptionGroup (OptionGroup)
  - CreateDBInstance (DBInstance)
  - CreateDBInstanceReadReplica (DBInstance)
  - CreateDBParameterGroup (DBParameterGroup)
  - CreateDBSecurityGroup (DBSecurityGroup)
  - CreateDBSnapshot (DBSnapshot)
  - CreateDBSubnetGroup (DBSubnetGroup)
  - CreateEventSubscription (EventSubscription)
  - CreateOptionGroup (OptionGroup)
  - DeleteDBInstance (DBInstance)
  - DeleteDBSnapshot (DBSnapshot)
  - DeleteEventSubscription (EventSubscription)
  - DescribeEngineDefaultParameters (EngineDefaults)
  - ModifyDBInstance (DBInstance)
  - ModifyDBSubnetGroup (DBSubnetGroup)
  - ModifyEventSubscription (EventSubscription)
  - ModifyOptionGroup (OptionGroup)
  - PromoteReadReplica (DBInstance)
  - PurchaseReservedDBInstancesOffering (ReservedDBInstance)
  - RebootDBInstance (DBInstance)
  - RemoveSourceIdentifierFromSubscription (EventSubscription)
  - RestoreDBInstanceFromDBSnapshot (DBInstance)
  - RestoreDBInstanceToPointInTime (DBInstance)
  - RevokeDBSecurityGroupIngress (DBSecurityGroup)
- Amazon Redshift
  - AuthorizeClusterSecurityGroupIngress (ClusterSecurityGroup)
  - AuthorizeSnapshotAccess (Snapshot)
  - CopyClusterSnapshot (Snapshot)
  - CreateCluster (Cluster)
  - CreateClusterParameterGroup (ClusterParameterGroup)
  - CreateClusterSecurityGroup (ClusterSecurityGroup)
  - CreateClusterSnapshot (Snapshot)
  - CreateClusterSubnetGroup (ClusterSubnetGroup)
  - CreateEventSubscription (EventSubscription)
  - CreateHsmClientCertificate (HsmClientCertificate)
  - CreateHsmConfiguration (HsmConfiguration)
  - DeleteCluster (Cluster)
  - DeleteClusterSnapshot (Snapshot)
  - DescribeDefaultClusterParameters (DefaultClusterParameters)
  - DisableSnapshotCopy (Cluster)
  - EnableSnapshotCopy (Cluster)
  - ModifyCluster (Cluster)
  - ModifyClusterSubnetGroup (ClusterSubnetGroup)
  - ModifyEventSubscription (EventSubscription)
  - ModifySnapshotCopyRetentionPeriod (Cluster)
  - PurchaseReservedNodeOffering (ReservedNode)
  - RebootCluster (Cluster)
  - RestoreFromClusterSnapshot (Cluster)
  - RevokeClusterSecurityGroupIngress (ClusterSecurityGroup)
  - RevokeSnapshotAccess (Snapshot)
  - RotateEncryptionKey (Cluster)

### @TODO

More will be added to the UPGRADING guide soon about:

- Client objects
- Waiters and Iterators
- Service descriptions
- Result objects
- Service-specific changes

Upgrade from 2.6 to 2.7
-----------------------

Version 2.7 is backward-compatible with version 2.6. The version bump was
necessary in order to mark some things in the DynamoDb namespace as deprecated.
See the [CHANGELOG entry for 2.7.0](https://github.com/aws/aws-sdk-php/blob/v3/CHANGELOG.md#270-2014-10-08)
for more details.

Upgrade from 2.5 to 2.6
-----------------------

**IMPORTANT:** Version 2.6 *is* backward-compatible with version 2.5, *unless* you are using the Amazon CloudSearch
client. If you are using CloudSearch, please read the next section carefully.

### Amazon CloudSearch

Version 2.6 of the AWS SDK for PHP has been updated to use the 2013-01-01 API version of Amazon CloudSearch by default.

The 2013-01-01 API marks a significant upgrade of Amazon CloudSearch, but includes numerous breaking changes to the API.
CloudSearch now supports 33 languages, highlighting, autocomplete suggestions, geospatial search, AWS IAM integration to
control access to domain configuration actions, and user configurable scaling and availability options. These new
features are reflected in the changes to the method and parameters of the CloudSearch client.

For details about the new API and how to update your usage of CloudSearch, please consult the [Configuration API
Reference for Amazon CloudSearch](http://docs.aws.amazon.com/cloudsearch/latest/developerguide/configuration-api.html)
and the guide for [Migrating to the Amazon CloudSearch 2013-01-01 API](http://docs.aws.amazon.com/cloudsearch/latest/developerguide/migrating.html).

If you would like to continue using the older 2011-02-01 API, you can configure this when you instantiate the
`CloudSearchClient`:

```php
use Aws\CloudSearch\CloudSearchClient;

$client = CloudSearchClient::factory(array(
    'key'     => '<aws access key>',
    'secret'  => '<aws secret key>',
    'region'  => '<region name>',
    'version' => '2011-02-01',
));
```

Upgrade from 2.4 to 2.5
-----------------------

### Amazon EC2

A small, backwards-incompatible change has been made to the Amazon EC2 API. The `LaunchConfiguration.MonitoringEnabled`
parameter of the `RequestSpotInstances` operation has been change to `LaunchConfiguration.Monitoring.Enabled` See [this
commit](https://github.com/aws/aws-sdk-php/commit/36ae0f68d2a6dcc3bc28222f60ecb318449c4092#diff-bad2f6eac12565bb684f2015364c22bd)
for the exact change. You are only affected by this change if you are using this specific parameter. To fix your code to
work with the updated parameter, you will need to change the structure of your request slightly.

```php
// The OLD way
$result = $ec2->requestSpotInstances(array(
    // ...
    'LaunchSpecification' => array(
        // ...
        'MonitoringEnabled' => true,
        // ...
    ),
    // ...
));

// The NEW way
$result = $ec2->requestSpotInstances(array(
    // ...
    'LaunchSpecification' => array(
        // ...
        'Monitoring' => array(
            'Enabled' => true,
        ),
        // ...
    ),
    // ...
));
```

### AWS CloudTrail

AWS CloudTrail has made changes to their API. If you are not using the CloudTrail service, then you will not be
affected by this change.

Here is an excerpt (with minor modifications) directly from the [CloudTrail team's
announcement](https://forums.aws.amazon.com/ann.jspa?annID=2286) regarding this change:

> [...] We have made some minor improvements/fixes to the service API, based on early feedback. The impact of these
> changes to you depends on how you are currently interacting with the CloudTrail service. [...] If you have code that
> calls the APIs below, you will need to make minor changes.
>
> There are two changes:
>
> 1) `CreateTrail` / `UpdateTrail`: These APIs originally took a single parameter, a `Trail` object. [...] We have
> changed this so that you can now simply pass individual parameters directly to these APIs. The same applies to the
> responses of these APIs, namely the APIs return individual fields directly [...]
> 2) `GetTrailStatus`: The actual values of the fields returned and their data types were not all as intended. As such,
> we are deprecating a set of fields, and adding a new set of replacement fields. The following fields are now
> deprecated, and should no longer be used:
>
> * `LatestDeliveryAttemptTime` (String): Time CloudTrail most recently attempted to deliver a file to S3 configured
>   bucket.
> * `LatestNotificationAttemptTime` (String): As above, but for publishing a notification to configured SNS topic.
> * `LatestDeliveryAttemptSucceeded` (String): This one had a mismatch between implementation and documentation. As
>   documented: whether or not the latest file delivery was successful. As implemented: Time of most recent successful
>   file delivery.
> * `LatestNotificationAttemptSucceeded` (String): As above, but for SNS notifications.
> * `TimeLoggingStarted` (String): Time `StartLogging` was most recently called. [...]
> * `TimeLoggingStarted` (String): Time `StopLogging` was most recently called.
>
> The following fields are new, and replace the fields above:
>
> * `LatestDeliveryTime` (Date): Date/Time that CloudTrail most recently delivered a log file.
> * `LatestNotificationTime` (Date): As above, for SNS notifications.
> * `StartLoggingTime` (Date): Same as `TimeLoggingStarted`, but with more consistent naming, and correct data type.
> * `StopLoggingTime` (Date): Same as `TimeLoggingStopped`, but with more consistent naming, and correct data type.
>
> Note that `LatestDeliveryAttemptSucceeded` and `LatestNotificationAttemptSucceeded` have no direct replacement. To
> query whether everything is configured correctly for log file delivery, it is sufficient to query LatestDeliveryError,
> and if non-empty that means that there is a configuration problem preventing CloudTrail from being able to deliver
> logs successfully. Basically either the bucket doesn’t exist, or CloudTrail doesn’t have sufficient permissions to
> write to the configured path in the bucket. Likewise for `LatestNotificationAttemptSucceeded`.
>
> The deprecated fields will be removed in the future, no earlier than February 15. Both set of fields will coexist on
> the service during this period to give those who are using the deprecated fields time to switch over to the use the
> new fields. However new SDKs and CLIs will remove the deprecated fields sooner than that. Previous SDK and CLI
> versions will continue to work until the deprecated fields are removed from the service.
>
> We apologize for any inconvenience, and appreciate your understanding as we make these adjustments to improve the
> long-term usability of the CloudTrail APIs.

We are marking this as a breaking change now, preemptive of the February 15th cutoff, and we encourage everyone to
update their code now. The changes to how you use `createTrail()` and `updateTrail()` are easy changes:

```php
// The OLD way
$cloudTrail->createTrail(array(
    'trail' => array(
        'Name'         => 'TRAIL_NAME',
        'S3BucketName' => 'BUCKET_NAME',
    )
));

// The NEW way
$cloudTrail->createTrail(array(
    'Name'         => 'TRAIL_NAME',
    'S3BucketName' => 'BUCKET_NAME',
));
```

### China (Beijing) Region / Signatures

This release adds support for the new China (Beijing) Region. This region requires that Signature V4 be used for both
Amazon S3 and Amazon EC2 requests. We've added support for Signature V4 in both of these services for clients
configured for this region. While doing this work, we did some refactoring to the signature classes and also removed
support for Signature V3, as it is no longer needed. Unless you are explicitly referencing Signature V3 or explicitly
interacting with signature objects, these changes should not affect you.

Upgrade from 2.3 to 2.4
-----------------------

### Amazon CloudFront Client

The new 2013-05-12 API version of Amazon CloudFront includes support for custom SSL certificates via the
`ViewerCertificate` parameter, but also introduces breaking changes to the API. Version 2.4 of the SDK now ships with
two versions of the Amazon CloudFront service description, one for the new 2013-05-12 API and one for the next most
recent 2012-05-05 API. The SDK defaults to using the newest API version, so CloudFront users may experience a breaking
change to their projects when upgrading. This can be easily circumvented by switching back to the 2012-05-05 API by
using the `version` option when instantiating the CloudFront client.

### Guzzle 3.7

Version 2.4 of the AWS SDK for PHP requires at least version 3.7 of Guzzle.

Upgrade from 2.2 to 2.3
-----------------------

### Amazon DynamoDB Client

The newly released 2012-08-10 API version of the Amazon DynamoDB service includes the new Local Secondary Indexes
feature, but also introduces breaking changes to the API. The most notable change is in the way that you specify keys
when creating tables and retrieving items. Version 2.3 of the SDK now ships with 2 versions of the DynamoDB service
description, one for the new 2012-08-10 API and one for the next most recent 2011-12-05 API. The SDK defaults to using
the newest API version, so DynamoDB users may experience a breaking change to their projects when upgrading. This can be
easily fixed by switching back to the 2011-12-05 API by using the new `version` configuration setting when instantiating
the DynamoDB client.

```php
use Aws\DynamoDb\DynamoDbClient;

$client = DynamoDbClient::factory(array(
    'key'     => '<aws access key>',
    'secret'  => '<aws secret key>',
    'region'  => '<region name>',
    'version' => '2011-12-05'
));
```

If you are using a config file with `Aws\Common\Aws`, then you can modify your file like the following.

```json
{
    "includes": ["_aws"],
    "services": {
        "default_settings": {
            "params": {
                "key": "<aws access key>",
                "secret": "<aws secret key>",
                "region": "<region name>"
            }
        },
        "dynamodb": {
            "extends": "dynamodb",
            "params": {
                "version": "2011-12-05"
            }
        }
    }
}
```

The [SDK user guide](http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html) has a guide and examples for both
versions of the API.

### Guzzle 3.4.1

Version 2.3 of the AWS SDK for PHP requires at least version 3.4.1 of Guzzle.

Upgrade from 2.1 to 2.2
-----------------------

### Full Service Coverage

The AWS SDK for PHP now supports the full set of AWS services.

### Guzzle 3.3

Version 2.2 of the AWS SDK for PHP requires at least version 3.3 of Guzzle.

Upgrade from 2.0 to 2.1
-----------------------

### General

Service descriptions are now versioned under the Resources/ directory of each client.

### Waiters

Waiters now require an associative array as input for the underlying operation performed by a waiter. The configuration
system for waiters under 2.0.x utilized strings to determine the parameters used to create an operation. For example,
when waiting for an object to exist with Amazon S3, you would pass a string containing the bucket name concatenated
with the object name using a '/' separator (e.g. 'foo/baz'). In the 2.1 release, these parameters are now more
explicitly tied to the underlying operation utilized by a waiter. For example, to use the ObjectExists waiter of
Amazon S3 pass an associative array of `array('Bucket' => 'foo', 'Key' => 'baz')`. These options match the option names
and rules associated with the HeadObject operation performed by the waiter. The API documentation of each client
describes the waiters associated with the client and what underlying operation is responsible for waiting on the
resource. Waiter specific options like the maximum number of attempts (max_attempts) or interval to wait between
retries (interval) can be specified in this same configuration array by prefixing the keys with `waiter.`.

Waiters can also be invoked using magic methods on the client. These magic methods are listed in each client's docblock
using `@method` tags.

```php
$s3Client->waitUntilObjectExists(array(
    'Bucket' => 'foo',
    'Key' => 'bar',
    'waiter.max_attempts' => 3
));
```
