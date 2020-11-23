===============
Migration Guide
===============

This guide shows how to migrate your code to use Version 3 of the AWS SDK for
PHP and how the new version differs from the Version 2 of the SDK.

.. note::

    The basic usage pattern of the SDK (i.e., ``$result = $client->operation($params);``)
    has not changed from Version 2 to Version 3, which should result in a fairly
    smooth migration.

Introduction
------------

Version 3 of the SDK represents a significant effort to improve the capabilities
of the SDK, incorporate over two years of customer feedback, upgrade our
dependencies, improve performance, and adopt the latest PHP standards.

What's New?
-----------

- Follows the `PSR-4 and PSR-7 standards <http://php-fig.org>`_.
- Decoupled HTTP layer.

  - `Guzzle 6 <http://guzzlephp.org>`_ is used by default to send requests, but
    Guzzle 5 is also supported out of the box.
  - The SDK will work in environments where cURL is not available.
  - Custom HTTP handlers are also supported.

- Asynchronous requests.

  - Features like *waiters* and *multipart uploaders* can also be used
    asynchronously.
  - Asynchronous workflows can be created using *promises* and *coroutines*.
  - Improved performance of concurrent/batched requests.

- Middleware system for customizing service client behavior.
- Flexible *paginators* for iterating through paginated results.
- Ability to query data from *result* and *paginator* objects with *JMESPath*.
- Easy debugging via the ``'debug'`` configuration option.
- Strictly follows the `SemVer <http://semver.org/>`_ standard going forward.

What's Different?
-----------------

Project dependencies have been updated
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The dependencies of the SDK have changed in this version.

- The SDK now requires PHP 5.5+. We use `generators <http://php.net/manual/en/language.generators.overview.php>`_
  liberally within the SDK code.
- We've upgraded the SDK to use `Guzzle 6 <http://guzzlephp.org>`_ (or 5), which
  provides the underlying HTTP client implementation used by the SDK to send
  requests to the AWS services. The latest version of Guzzle brings with it a
  number of improvements, including asynchronous requests, swappable HTTP
  handlers, PSR-7 compliance, better performance, and more.
- The PSR-7 package from the PHP-FIG (``psr/http-message``) defines interfaces
  for representing HTTP requests, HTTP responses, URLs, and streams. These
  interfaces are used across the SDK and Guzzle, which provides interoperability
  with other PSR-7 compliant packages.
- Guzzle's PSR-7 implementation (``guzzlehttp/psr7``) provides an implementation
  of the interfaces in PSR-7, as well as a number of helpful classes and
  functions to go along with it. Both the SDK and Guzzle 6 rely on this package
  heavily.
- Guzzle's `Promises/A+ <https://promisesaplus.com>`_ implementation
  (``guzzlehttp/promises``) is used throughout the SDK and Guzzle to provide
  interfaces for managing asynchronous requests and coroutines. While Guzzle's
  multi-cURL HTTP handler ultimately implements the non-blocking I/O model that
  allows for asynchronous requests, this package provides the ability to program
  within that paradigm. See :doc:`promises` for more details.
- The PHP implementation of `JMESPath <http://jmespath.org/>`_
  (``mtdowling/jmespath.php``) is used in the SDK to provide the data querying
  ability of the ``Aws\Result::search()`` and ``Aws\ResultPaginator::search()``
  methods. See :doc:`jmespath` for more details.

Region and version options are now required
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

When instantiating a client for any service, you must specify the ``'region'``
and ``'version'`` options. In version 2 of the SDK, ``'version'`` was completely
optional, and ``'region'`` was sometimes optional. In version 3, both are always
required. Being explicit about both of these options allows you to lock into the
API version and region you are coding against. When new API versions are created
or new regions become available, you will be isolated from potentially breaking
changes until you are ready to explicitly update your configuration.

.. note::

    If you are not concerned with which API version you are using, then you can
    just set the ``'version'`` option to ``'latest'``. However, it is
    recommended that you set the API version numbers explicitly for production
    code.

    Not all services are available in all regions. You can find a list of
    available regions using the `Regions and Endpoints
    <http://docs.aws.amazon.com/general/latest/gr/rande.html>`_ reference.

    For services only available via a single, global endpoint, e.g., Route53,
    IAM, and CloudFront, clients should be instantiated with their configured
    region set to ``us-east-1``.

.. important::

    The SDK also includes multi-region clients, which can dispatch requests to
    different regions based on a parameter (``@region``) supplied as a command
    parameter. The region used by default by these clients is specified with the
    ``region`` option supplied to the client constructor.

Client instantiation uses the constructor
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

In version 3 of the SDK, the way you instantiate a client has changed. Instead
of the ``factory`` methods in version 2, you can simply instantiate a client
with the ``new`` keyword.

.. code-block:: php

    use Aws\DynamoDb\DynamoDbClient;

    // Version 2 style
    $client = DynamoDbClient::factory([
        'region'  => 'us-east-2'
    ]);

    // Version 3 style
    $client = new DynamoDbClient([
        'region'  => 'us-east-2',
        'version' => '2012-08-10'
    ]);

.. note::

    Instantiating a client using the ``factory()`` method still works, it is
    just considered deprecated.

Client configuration has changed
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The client configuration options in Version 3 of the SDK have changed a little
from Version 2. See the :doc:`configuration` page for a description of all the
supported options.

.. note::

    One important change is that ``'key'`` and ``'secret'`` are no longer valid
    options at the root level, but you can pass them in as part of the
    ``'credentials'`` option. One reason this change was made was to discourage
    developers from hard-coding their AWS credentials into their projects.

The SDK Object
^^^^^^^^^^^^^^

Version 3 of the SDK introduces the ``Aws\Sdk`` object as a replacement to
``Aws\Common\Aws``. The ``Sdk`` object acts as a client factory and is used
to manage shared configuration options across multiple clients.

While Version 2's ``Aws`` class worked like a service locator (i.e., it always
returned the same instance of a client), the ``Sdk`` class returns a new
instance of a client every time it is used.

It also does not support the same configuration file format from Version 2 of
the SDK. That configuration format was specific to Guzzle 3 and is now obsolete.
Configuration can be done more simply with basic arrays, and is documented
in :ref:`sdk-class`.

Some API results have changed
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

In order to provide consistency in how the SDK parses the result of an API
operation, Amazon ElastiCache, Amazon RDS, and Amazon RedShift now have an
additional wrapping element on some API responses.

For example, calling Amazon RDS's `DescribeEngineDefaultParameters <http://docs.aws.amazon.com/AmazonRDS/latest/APIReference/API_DescribeEngineDefaultParameters.html>`_
result in Version 3 now includes a wrapping "EngineDefaults" element whereas in
Version 2 this element was not present.

.. code-block:: php

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

The following operations are affected and now contain a wrapping element in the
output of the result (provided below in parenthesis):

- **Amazon ElastiCache**

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

- **Amazon RDS**

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

- **Amazon Redshift**

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

Enum classes have been removed
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

We have removed the ``Enum`` classes (e.g., ``Aws\S3\Enum\CannedAcl``) that
existed in Version 2 of the SDK. Enums were concrete classes within the public
API of the SDK that contained constants representing groups of valid parameter
values. Since these enums are specific to API versions, can change over time,
can conflict with PHP reserved words, and ended up not being very useful, we
have removed them in Version 3. This supports the data-driven and API version
agnostic nature of Version 3.

Instead of using values from ``Enum`` objects, you should just use the literal
values directly (e.g., ``CannedAcl::PUBLIC_READ`` → ``'public-read'``).

Fine-grained Exception classes have been removed
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

We have removed the fine-grained exception classes that existed in the each of
the services' namespaces (e.g., ``Aws\Rds\Exception\{SpecificError}Exception``)
for very similar reasons that we removed Enums. The exceptions thrown by
service/operation are dependent on which API version is used (i.e., they can
change from version to version). Also, the complete list of what exceptions can
be thrown by a given operation is not available, which made Version 2's
fine-grained exception classes incomplete.

You should handle errors by catching the root exception class for each service
(e.g., ``Aws\Rds\Exception\RdsException``). You can use the ``getAwsErrorCode()``
method of the exception to check for specific error codes. This is functionally
equivalent to catching different exception classes, but provides that function
without adding bloat to the SDK.

Static Facade classes have been removed
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

In Version 2, there was an obscure feature inspired by Laravel that allowed you
to call ``enableFacades()`` on the ``Aws`` class to enable static access to the
various service clients. This feature goes against PHP best practices, and we
stopped documenting it over a year ago. In Version 3, this feature is gone
completely. You should retrieve your client objects from the ``Aws\Sdk`` object
and use them as object instances, not static classes.

Paginators supersede Iterators
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Version 2 of the SDK had a feature called *Iterators*, which were objects that
were used for iterating over paginated results. One complaint we had about these
was that they were not flexible enough, because the iterator only emitted
specific values from each result, and if there were other values you needed from
the results, you could only retrieve them via event listeners.

In Version 3, Iterators have been replaced with :doc:`Paginators <paginators>`.
They are similar in purpose, but Paginators are more flexible, because they
yield result objects instead of values from a response.

The following examples illustrate how Paginators are different from Iterators,
by showing how to retrieve paginated results for the S3 ListObjects operation
in both Version 2 and Version 3.

.. code-block:: php

    // Version 2
    $objects = $s3Client->getIterator('ListObjects', ['Bucket' => 'my-bucket']);
    foreach ($objects as $object) {
        echo $object['Key'] . "\n";
    }

.. code-block:: php

    // Version 3
    $results = $s3Client->getPaginator('ListObjects', ['Bucket' => 'my-bucket']);
    foreach ($results as $result) {
        // You can extract any data that you want from the result.
        foreach ($result['Contents'] as $object) {
            echo $object['Key'] . "\n";
        }
    }

Paginator objects have a ``search()`` method that allows you to use :doc:`JMESPath <jmespath>`
expressions to extract data more easily from the result set.

.. code-block:: php

    $results = $s3Client->getPaginator('ListObjects', ['Bucket' => 'my-bucket']);
    foreach ($results->search('Contents[].Key') as $key) {
        echo $key . "\n";
    }

.. note::

    The ``getIterator()`` method is still supported to allow for a smooth
    transition to Version 3, but encourage you to upgrade your code to use
    Paginators.

Many higher-level abstractions have changed
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

In general, many of the higher-level abstractions (service-specific helper
objects aside from the clients) have been improved or updated. Some have
even been removed.

* Updated:
    * The way you use the :doc:`S3 Multipart Uploader </service/s3-multipart-upload>`
      has changed. The Glacier Multipart Uploader has been changed in similar ways.
    * The way to create :doc:`S3 Presigned URLs </service/s3-presigned-url>` has changed.
    * The ``Aws\S3\Sync`` namespace have been replaced by the ``Aws\S3\Transfer``
      class. The ``S3Client::uploadDirectory()`` and ``S3Client::downloadBucket()``
      methods are still available, but have different options. See the docs for
      :doc:`/service/s3-transfer`.
    * The ``Aws\S3\Model\ClearBucket`` and ``Aws\S3\Model\DeleteObjectsBatch``
      have been replaced by ``Aws\S3\BatchDelete`` and ``S3Client::deleteMatchingObjects()``.
    * The options and behaviors for the :doc:`/service/dynamodb-session-handler`
      have changed slightly.
    * The ``Aws\DynamoDb\Model\BatchRequest`` namespace has been replaced by
      ``Aws\DynamoDb\WriteRequestBatch``. See the docs for
      `DynamoDB WriteRequestBatch <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Aws.DynamoDb.WriteRequestBatch.html>`_.

* Removed:
    * DynamoDB ``Item``, ``Attribute``, and ``ItemIterator`` classes - These
      were previously deprecated in `Version 2.7.0 <https://github.com/aws/aws-sdk-php/blob/3.0.0/CHANGELOG.md#270---2014-10-08>`_.
    * SNS Message Validator - This is now `a separate, light-weight project
      <https://github.com/aws/aws-php-sns-message-validator>`_ that does not
      require the SDK as a dependency. This project is, however, included in the
      Phar and Zip distributions of the SDK. A getting started guide can be
      found `on the AWS PHP Development blog <https://aws.amazon.com/blogs/developer/receiving-amazon-sns-messages-in-php/>`_.
    * S3 ``AcpBuilder`` and related objects were removed.

Comparing Code Samples from Both SDKs
-------------------------------------

The following examples illustrate some of the ways in which using Version 3 of
the SDK may differ from Version 2.

Example: Amazon S3 ListObjects operation
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

From Version 2 of the SDK
^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: php

    <?php

    require '/path/to/vendor/autoload.php';

    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    $s3 = S3Client::factory([
        'profile' => 'my-credential-profile',
        'region'  => 'us-east-1'
    ]);

    try {
        $result = $s3->listObjects([
            'Bucket' => 'my-bucket-name',
            'Key'    => 'my-object-key'
        ]);

        foreach ($result['Contents'] as $object) {
            echo $object['Key'] . "\n";
        }
    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }

From Version 3 of the SDK
^^^^^^^^^^^^^^^^^^^^^^^^^

Key differences:

- Use ``new`` instead of ``factory()`` to instantiate the client.
- The ``'version'`` and ``'region'`` options are required during instantiation.

.. code-block:: php

    <?php

    require '/path/to/vendor/autoload.php';

    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    $s3 = new S3Client([
        'profile' => 'my-credential-profile',
        'region'  => 'us-east-1',
        'version' => '2006-03-01'
    ]);

    try {
        $result = $s3->listObjects([
            'Bucket' => 'my-bucket-name',
            'Key'    => 'my-object-key'
        ]);

        foreach ($result['Contents'] as $object) {
            echo $object['Key'] . "\n";
        }
    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }

Example: Instantiating a client with global configuration
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

From Version 2 of the SDK
^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: php

    <?php return array(
        'includes' => array('_aws'),
        'services' => array(
            'default_settings' => array(
                'params' => array(
                    'profile' => 'my_profile',
                    'region'  => 'us-east-1'
                )
            ),
            'dynamodb' => array(
                'extends' => 'dynamodb',
                'params' => array(
                    'region'  => 'us-west-2'
                )
            ),
        )
    );

.. code-block:: php

    <?php

    require '/path/to/vendor/autoload.php';

    use Aws\Common\Aws;

    $aws = Aws::factory('path/to/my/config.php');

    $sqs = $aws->get('sqs');
    // Note: SQS client will be configured for us-east-1.

    $dynamodb = $aws->get('dynamodb');
    // Note: DynamoDB client will be configured for us-west-2.

From Version 3 of the SDK
^^^^^^^^^^^^^^^^^^^^^^^^^

Key differences:

- Use the ``Aws\Sdk`` class instead of ``Aws\Common\Aws``.
- No configuration file. Use an array for configuration instead.
- The ``'version'`` option is required during instantiation.
- Use the ``create<Service>()`` methods instead of ``get('<service>')``.

.. code-block:: php

    <?php

    require '/path/to/vendor/autoload.php';

    $sdk = new Aws\Sdk([
        'profile' => 'my_profile',
        'region' => 'us-east-1',
        'version' => 'latest',
        'DynamoDb' => [
            'region' => 'us-west-2',
        ],
    ]);

    $sqs = $sdk->createSqs();
    // Note: SQS client will be configured for us-east-1.

    $dynamodb = $sdk->createDynamoDb();
    // Note: DynamoDB client will be configured for us-west-2.
