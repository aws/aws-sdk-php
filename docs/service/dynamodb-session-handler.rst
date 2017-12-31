========================
DynamoDB Session Handler
========================

Introduction
------------

The **DynamoDB Session Handler** is a custom session handler for PHP that
allows developers to use Amazon DynamoDB as a session store. Using DynamoDB
for session storage alleviates issues that occur with session handling in a
distributed web application by moving sessions off of the local file system and
into a shared location. DynamoDB is fast, scalable, easy to setup, and handles
replication of your data automatically.

The DynamoDB Session Handler uses the ``session_set_save_handler()`` function
to hook DynamoDB operations into PHP's `native session functions <http://www.php.net/manual/en/ref.session.php>`_
to allow for a true drop in replacement. This includes support for features like
session locking and garbage collection which are a part of PHP's default
session handler.

For more information on the Amazon DynamoDB service, please visit the
`Amazon DynamoDB homepage <http://aws.amazon.com/dynamodb>`_.

Basic Usage
-----------

1. Register the handler
~~~~~~~~~~~~~~~~~~~~~~~

The first step is to instantiate and register the session handler.

.. code-block:: php

    use Aws\DynamoDb\SessionHandler;

    $sessionHandler = SessionHandler::fromClient($dynamoDb, [
        'table_name' => 'sessions'
    ]);

    $sessionHandler->register();

2. Create a table for storing your sessions
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Before you can actually use the session handler, you need to create a table in
which to store the sessions. This can be done ahead of time through the
`AWS Console for Amazon DynamoDB <https://console.aws.amazon.com/dynamodb/home>`_,
or using the SDK.

3. Use PHP sessions like normal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Once the session handler is registered and the table exists, you can write to
and read from the session using the ``$_SESSION`` superglobal, just like you
normally do with PHP's default session handler. The DynamoDB Session Handler
encapsulates and abstracts the interactions with Amazon DynamoDB and enables
you to simply use PHP's native session functions and interface.

.. code-block:: php

    // Start the session
    session_start();

    // Alter the session data
    $_SESSION['user.name'] = 'jeremy';
    $_SESSION['user.role'] = 'admin';

    // Close the session (optional, but recommended)
    session_write_close();

Configuration
-------------

You may configure the behavior of the session handler using the following
options. All options are optional, but you should make sure to understand
what the defaults are.

``table_name``
    The name of the DynamoDB table in which to store the sessions. This defaults to ``'sessions'``.

``hash_key``
    The name of the hash key in the DynamoDB sessions table. This defaults to ``'id'``.

``session_lifetime``
    The lifetime of an inactive session before it should be garbage collected. If it is not  provided, then the actual
    lifetime value that will be used is ``ini_get('session.gc_maxlifetime')``.

``consistent_read``
    Whether or not the session handler should use consistent reads for the ``GetItem`` operation. This defaults
    to ``true``.

``locking``
    Whether or not to use session locking. This defaults to ``false``.

``batch_config``
    Configuration used to batch deletes during garbage collection. These options are passed directly into `DynamoDB
    WriteRequestBatch <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Aws.DynamoDb.WriteRequestBatch.html>`_ objects.
    You must manually trigger garbage collection via ``SessionHandler::garbageCollect()``.

``max_lock_wait_time``
    Maximum time (in seconds) that the session handler should wait to acquire a lock before giving up. This defaults
    to ``10`` and is only used with session locking.

``min_lock_retry_microtime``
    Minimum time (in microseconds) that the session handler should wait between attempts to acquire a lock. This
    defaults to ``10000`` and is only used with session locking.

``max_lock_retry_microtime``
    Maximum time (in microseconds) that the session handler should wait between attempts to acquire a lock. This
    defaults to ``50000`` and is only used with session locking.

To configure the Session Handler, you must specify the configuration options when you instantiate the handler. The
following code is an example with all of the configuration options specified.

.. code-block:: php

    $sessionHandler = SessionHandler::fromClient($dynamoDb, [
        'table_name'               => 'sessions',
        'hash_key'                 => 'id',
        'session_lifetime'         => 3600,
        'consistent_read'          => true,
        'locking'                  => false,
        'batch_config'             => [],
        'max_lock_wait_time'       => 10,
        'min_lock_retry_microtime' => 5000,
        'max_lock_retry_microtime' => 50000,
    ]);

Pricing
-------

Aside from data storage and data transfer fees, the costs associated with using Amazon DynamoDB are calculated based on
the provisioned throughput capacity of your table (see the `Amazon DynamoDB pricing details
<http://aws.amazon.com/dynamodb/pricing/>`_). Throughput is measured in units of Write Capacity and Read Capacity. The
Amazon DynamoDB homepage says:

    A unit of read capacity represents one strongly consistent read per second (or two eventually consistent reads per
    second) for items as large as 4 KB. A unit of write capacity represents one write per second for items as large as
    1 KB.

Ultimately, the throughput and the costs required for your sessions table is going to correlate with your expected
traffic and session size. The following table explains the amount of read and write operations that are performed on
your DynamoDB table for each of the session functions.

+-------------------------------------+-----------------------------------------------------------------------------+
| Read via ``session_start()``        | * 1 read operation (only 0.5 if ``consistent_read`` is ``false``).          |
|                                     | * (Conditional) 1 write operation to delete the session if it is expired.   |
+-------------------------------------+-----------------------------------------------------------------------------+
| Read via ``session_start()``        | * A minimum of 1 *write* operation.                                         |
| (Using session locking)             | * (Conditional) Additional write operations for each attempt at acquiring a |
|                                     |   lock on the session. Based on configured lock wait time and retry options.|
|                                     | * (Conditional) 1 write operation to delete the session if it is expired.   |
+-------------------------------------+-----------------------------------------------------------------------------+
| Write via ``session_write_close()`` | * 1 write operation.                                                        |
+-------------------------------------+-----------------------------------------------------------------------------+
| Delete via ``session_destroy()``    | * 1 write operation.                                                        |
+-------------------------------------+-----------------------------------------------------------------------------+
| Garbage Collection                  | * 0.5 read operations **per 4 KB of data in the table** to scan for expired |
|                                     |   sessions.                                                                 |
|                                     | * 1 write operation **per expired item** to delete it.                      |
+-------------------------------------+-----------------------------------------------------------------------------+

.. _ddbsh-session-locking:

Session Locking
---------------

The DynamoDB Session Handler supports pessimistic session locking in order to mimic the behavior of PHP's default
session handler. By default the DynamoDB Session Handler has this feature *turned off* since it can become a performance
bottleneck and drive up costs, especially when an application accesses the session when using ajax requests or iframes.
You should carefully consider whether or not your application requires session locking or not before enabling it.

To enable session locking, set the ``'locking'`` option to ``true`` when you instantiate the ``SessionHandler``.

.. code-block:: php

    $sessionHandler = SessionHandler::fromClient($dynamoDb, [
        'table_name' => 'sessions',
        'locking'    => true,
    ]);

.. _ddbsh-garbage-collection:

Garbage Collection
------------------

The DynamoDB Session Handler supports session garbage collection by using a series of ``Scan`` and ``BatchWriteItem``
operations. Due to the nature of how the ``Scan`` operation works and in order to find all of the expired sessions and
delete them, the garbage collection process can require a lot of provisioned throughput.

For this reason, we do not support automated garbage collection . A better practice is to schedule the garbage
collection to occur during an off-peak time where a burst of consumed throughput will not disrupt the rest of the
application. For example, you could have a nightly cron job trigger a script to run the garbage collection. This script
would need to do something like the following:

.. code-block:: php

    $sessionHandler = SessionHandler::fromClient($dynamoDb, [
        'table_name'   => 'sessions',
        'batch_config' => [
            'batch_size' => 25,
            'before' => function ($command) {
                echo "About to delete a batch of expired sessions.\n";
            }
        ]
    ]);

    $sessionHandler->garbageCollect();

You can also use the ``'before'`` option within ``'batch_config'`` to introduce delays on the ``BatchWriteItem``
operations that are performed by the garbage collection process. This will increase the amount of time it takes the
garbage collection to complete, but it can help you spread out the requests made by the session handler in order to
help you stay close to or within your provisioned throughput capacity during garbage collection.

.. code-block:: php

    $sessionHandler = SessionHandler::fromClient($dynamoDb, [
        'table_name'   => 'sessions',
        'batch_config' => [
            'before' => function ($command) {
                $command['@http']['delay'] = 5000;
            }
        ]
    ]);

    $sessionHandler->garbageCollect();

Best Practices
--------------

#. Create your sessions table in a region that is geographically closest to or in the same region as your application
   servers. This will ensure the lowest latency between your application and DynamoDB database.
#. Choose the provisioned throughput capacity of your sessions table carefully, taking into account the expected traffic
   to your application and the expected size of your sessions.
#. Monitor your consumed throughput through the AWS Management Console or with Amazon CloudWatch and adjust your
   throughput settings as needed to meet the demands of your application.
#. Keep the size of your sessions small (ideally less than 1 KB). Small sessions will perform better and require less
   provisioned throughput capacity.
#. Do not use session locking unless your application requires it.
#. Instead of using PHP's built-in session garbage collection triggers, schedule your garbage collection via a cron job,
   or another scheduling mechanism, to run during off-peak hours. Use the ``'batch_config'`` option to your advantage.

Required IAM Permissions
------------------------

To use the DynamoDB session handler, your `configured credentials <https://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/credentials.html>`_
must have permission to use the DynamoDB table that `you created in a previous step <https://docs.aws.amazon.com/aws-sdk-php/v3/guide/service/dynamodb-session-handler.html#create-a-table-for-storing-your-sessions>`_.
The following IAM policy contains the minimum permissions that you need. To use this policy, replace the Resource value
with the Amazon Resource Name (ARN) of the table that you created previously. For more information about creating and
attaching IAM policies, see `Managing IAM Policies <https://docs.aws.amazon.com/IAM/latest/UserGuide/access_policies_manage.html>`_
in the *AWS Identity and Access Management User Guide*.

.. code-block:: js

    {
      "Version": "2012-10-17",
      "Statement": [
        {
          "Action": [
            "dynamodb:GetItem",
            "dynamodb:UpdateItem",
            "dynamodb:DeleteItem",
            "dynamodb:Scan",
            "dynamodb:BatchWriteItem"
          ],
          "Effect": "Allow",
          "Resource": "arn:aws:dynamodb:<region>:<account-id>:table/<table-name>"
        }
      ]
    }
