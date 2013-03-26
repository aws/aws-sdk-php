.. service:: DynamoDb

Creating tables
---------------

We first need to create a table that can be used to store items. While Amazon DynamoDB's tables do not use a fixed
schema, you do need to create a schema for the table’s hash key element, and the optional range key element. This is
explained in greater detail in Amazon DynamoDB's
`Data Model documentation <http://docs.amazonwebservices.com/amazondynamodb/latest/developerguide/DataModel.html>`_. You
will also need to specify the amount of
`provisioned throughput <http://docs.amazonwebservices.com/amazondynamodb/latest/developerguide/ProvisionedThroughputIntro.html>`_
that should be made availabe to the table.

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testCreateTable

The table will now have a status of ``CREATING`` while the table is being provisioned. You can use a waiter to poll the
table until it becomes ``ACTIVE``.

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testWaitUntilTableExists

A full list of the parameters available to the ``createTable()`` operation can be found in the
`API documentation <http://docs.amazonwebservices.com/aws-sdk-php-2/latest/class-Aws.DynamoDb.DynamoDbClient.html#_createTable>`_.

Describing a table
------------------

Now that the table is created, you can use the
`describeTable() <http://docs.amazonwebservices.com/aws-sdk-php-2/latest/class-Aws.DynamoDb.DynamoDbClient.html#_describeTable>`_
method to get information about the table.

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testDescribeTable

The return value of the ``describeTable()`` method is a ``Guzzle\Service\Resource\Model`` object that can be used like
an array. For example, you could retrieve the number of items in a table or the amount of provisioned read throughput.

Listing tables
--------------

You can retrieve a list of all of the tables associated with a specific endpoint using the
`listTables() <http://docs.amazonwebservices.com/aws-sdk-php-2/latest/class-Aws.DynamoDb.DynamoDbClient.html#_listTables>`_
method. Each Amazon DynamoDB endpoint is entirely independent. For example, if you have two tables called "MyTable," one
in US-EAST-1 and one in US-WEST-2, they are completely independent and do not share any data. The ListTables operation
returns all of the table names associated with the account making the request, for the endpoint that receives the
request.

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testListTables

Iterating over all tables
~~~~~~~~~~~~~~~~~~~~~~~~~

The result of a ``listTables()`` operation might be truncated. Because of this, it is usually better to use an iterator
to retrieve a complete list of all of the tables owned by your account in a specific region. The iterator will
automatically handle sending any necessary subsequent requests.

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testListTablesWithIterator

.. tip::

    You can convert an iterator to an array using the ``toArray()`` method of the iterator.

Adding items
------------

Let's add an item to our *errors* table using the
`putItem() <http://docs.amazonwebservices.com/aws-sdk-php-2/latest/class-Aws.DynamoDb.DynamoDbClient.html#_putItem>`_
method of the client.

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testAddItem

As you can see, we used the ``formatAttributes()`` method of the client to more easily format the attributes of the
item. Alternatively, you can provide the item attributes without using the helper method:

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testAddItemWithoutHelperMethod

Retrieving items
----------------

Let’s check if the item was added correctly using the
`getItem() <http://docs.amazonwebservices.com/aws-sdk-php-2/latest/class-Aws.DynamoDb.DynamoDbClient.html#_getItem>`_
method of the client. Because Amazon DynamoDB works under an 'eventual consistency' model, we need to specify that we
are performing a
`consistent read <http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/APISummary.html#DataReadConsistency>`_
operation.

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testGetItem

Query and scan
--------------

Once data is in an Amazon DynamoDB table, you have two APIs for searching the data:
`Query and Scan <http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/QueryAndScan.html>`_.

Query
~~~~~

A query operation searches only primary key attribute values and supports a subset of comparison operators on key
attribute values to refine the search process. A query returns all of the item data for the matching primary keys
(all of each item's attributes) up to 1MB of data per query operation.

Let's say we want a list of all "1201" errors that occurred in the last 15 minutes. We could issue a single query
that will search by the primary key of the table and retrieve up to 1MB of the items. However, a better approach is to
use the query iterator to retrieve the entire list of all items matching the query.

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testQuery

Scan
~~~~

A scan operation scans the entire table. You can specify filters to apply to the results to refine the values
returned to you, after the complete scan. Amazon DynamoDB puts a 1MB limit on the scan (the limit applies before
the results are filtered).

A scan can be useful for more complex searches. For example, we can retrieve all of the errors in the last 15
minutes that contain the word "overflow":

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testScan

Using the WriteRequestBatch
---------------------------

You can use the WriteRequestBatch if you need to write or delete many items as quickly as possible. The
WriteRequestBatch provides a high level of performance because it converts what would normally be a separate HTTP
request for each operation into HTTP requests containing up to 25 comparable requests per transaction.

Let's say you have a large array of errors you wish to add to your errors table. You can iterate over the errors array,
add each item to the batch object, and finally call flush after adding every item. The batch object will automatically
flush the batch and write items to Amazon DynamoDB after hitting a customizable threshold. A final call to the batch
object's ``flush()`` method is necessary to transfer any remaining items in the queue.

.. code-block:: php

    use Aws\DynamoDb\Model\BatchRequest\WriteRequestBatch;
    use Aws\DynamoDb\Model\BatchRequest\PutRequest;
    use Aws\DynamoDb\Model\Item;

    $batch = WriteRequestBatch::factory($client);

    foreach ($hugeArrayOfErrors as $error) {
        // Add each array entry to the batch object
        $batch->add(new PutRequest(Item::fromArray(array(
            'id'      => $error['id'],
            'error'   => $error['error'],
            'message' => $error['message'],
            'time'    => (string) $error['time']
        )), $table));
    }

    // Flush any remaining items in the queue
    $batch->flush();

Try adding some test data into your table using a WriteRequestBatch and run the scan and query examples again to see
some actual results come back in the response.

Deleting a table
----------------

.. warning::

    Deleting a table will also permanently delete all of its contents.

Now that you've taken a quick tour of the PHP client for Amazon DynamoDB, you will want to clean up by deleting the
resources you created.

.. example:: DynamoDb/Integration/DynamoDb_20111205_Test.php testDeleteTable
