===============================
JMESPath Expressions in the SDK
===============================

`JMESPath <http://jmespath.org/>`_ allows you to declaratively specify how to
extract elements from a JSON document. The AWS SDK for PHP has a dependency on
`jmespath.php <https://github.com/jmespath/jmespath.php>`_ to power some of the
high level abstractions like :doc:`paginators` and :doc:`waiters`, but also
exposes JMESPath searching on ``Aws\ResultInterface`` and
``Aws\ResultPaginator``.

You can play around with JMESPath in your browser by trying the online
`JMESPath examples <http://jmespath.org/examples.html>`_. You can learn more
about the language, including the available expressions and functions in the
`JMESPath specification <http://jmespath.org/specification.html>`_.

JMESPath is supported in the `AWS CLI <http://aws.amazon.com/cli/>`_.
Expressions you write for CLI output are 100% compatible with expressions
written for the AWS SDK for PHP.

Extracting data from results
----------------------------

The ``Aws\ResultInterface`` interface has a ``search($expression)`` method that
extracts data from a result model based on a JMESPath expression. Using
JMESPath expressions to query the data from a result object can help to remove
boilerplate conditional code and more concisely express the data that is being
extracted.

To demonstrate how it works, we'll first start with the default JSON output
below, which describes two EBS (Elastic Block Storage) volumes attached to
separate Amazon EC2 instances.

.. code-block:: php

    $result = $ec2Client->describeVolumes();
    // Output the result data as JSON (just so we can clearly visualize it)
    echo json_encode($result->toArray(), JSON_PRETTY_PRINT);

.. code-block:: json

    {
        "Volumes": [
            {
                "AvailabilityZone": "us-west-2a",
                "Attachments": [
                    {
                        "AttachTime": "2013-09-17T00:55:03.000Z",
                        "InstanceId": "i-a071c394",
                        "VolumeId": "vol-e11a5288",
                        "State": "attached",
                        "DeleteOnTermination": true,
                        "Device": "/dev/sda1"
                    }
                ],
                "VolumeType": "standard",
                "VolumeId": "vol-e11a5288",
                "State": "in-use",
                "SnapshotId": "snap-f23ec1c8",
                "CreateTime": "2013-09-17T00:55:03.000Z",
                "Size": 30
            },
            {
                "AvailabilityZone": "us-west-2a",
                "Attachments": [
                    {
                        "AttachTime": "2013-09-18T20:26:16.000Z",
                        "InstanceId": "i-4b41a37c",
                        "VolumeId": "vol-2e410a47",
                        "State": "attached",
                        "DeleteOnTermination": true,
                        "Device": "/dev/sda1"
                    }
                ],
                "VolumeType": "standard",
                "VolumeId": "vol-2e410a47",
                "State": "in-use",
                "SnapshotId": "snap-708e8348",
                "CreateTime": "2013-09-18T20:26:15.000Z",
                "Size": 8
            }
        ],
        "@metadata": {
            "statusCode": 200,
            "effectiveUri": "https:\/\/ec2.us-west-2.amazonaws.com",
            "headers": {
                "content-type": "text\/xml;charset=UTF-8",
                "transfer-encoding": "chunked",
                "vary": "Accept-Encoding",
                "date": "Wed, 06 May 2015 18:01:14 GMT",
                "server": "AmazonEC2"
            }
        }
    }

First, we can retrieve only the first volume from the Volumes list with the
following command.

.. code-block:: php

    $firstVolume = $result->search('Volumes[0]');

Now, we use the ``wildcard-index`` expression ``[*]`` to iterate over the
entire list and also extract and rename three elements: ``VolumeId`` renamed to
``ID``, ``AvailabilityZone`` renamed to ``AZ``, and ``Size`` will remain
``Size``. We can extract and rename these elements using a ``multi-hash``
expression placed after the ``wildcard-index`` expression.

.. code-block:: php

    $data = $result->search('Volumes[*].{ID: VolumeId, AZ: AvailabilityZone, Size: Size}');

This will give us an array of PHP data like the following::

    array(2) {
      [0] =>
      array(3) {
        'AZ' =>
        string(10) "us-west-2a"
        'ID' =>
        string(12) "vol-e11a5288"
        'Size' =>
        int(30)
      }
      [1] =>
      array(3) {
        'AZ' =>
        string(10) "us-west-2a"
        'ID' =>
        string(12) "vol-2e410a47"
        'Size' =>
        int(8)
      }
    }

In the ``multi-hash`` notation, you can also use chained keys such as
``key1.key2[0].key3`` to extract elements deeply nested within the structure.
The example below demonstrates this with the ``Attachments[0].InstanceId`` key,
aliased to simply ``InstanceId`` (also note that JMESPath expressions will
ignore whitespace in most cases).

.. code-block:: php

    $expr = 'Volumes[*].{ID: VolumeId,
                         InstanceId: Attachments[0].InstanceId,
                         AZ: AvailabilityZone,
                         Size: Size}';

    $data = $result->search($expr);
    var_dump($data);

The above expression will output the following data::

    array(2) {
      [0] =>
      array(4) {
        'ID' =>
        string(12) "vol-e11a5288"
        'InstanceId' =>
        string(10) "i-a071c394"
        'AZ' =>
        string(10) "us-west-2a"
        'Size' =>
        int(30)
      }
      [1] =>
      array(4) {
        'ID' =>
        string(12) "vol-2e410a47"
        'InstanceId' =>
        string(10) "i-4b41a37c"
        'AZ' =>
        string(10) "us-west-2a"
        'Size' =>
        int(8)
      }
    }

You can also filter multiple elements with the ``multi-list`` expression:\
``[key1, key2]``. This will format all filtered attributes into a single
ordered list per object, regardless of type.

.. code-block:: php

    $expr = 'Volumes[*].[VolumeId, Attachments[0].InstanceId, AvailabilityZone, Size]';
    $data = $result->search($expr);
    var_dump($data);

Running the above search will produce the following data::

    array(2) {
      [0] =>
      array(4) {
        [0] =>
        string(12) "vol-e11a5288"
        [1] =>
        string(10) "i-a071c394"
        [2] =>
        string(10) "us-west-2a"
        [3] =>
        int(30)
      }
      [1] =>
      array(4) {
        [0] =>
        string(12) "vol-2e410a47"
        [1] =>
        string(10) "i-4b41a37c"
        [2] =>
        string(10) "us-west-2a"
        [3] =>
        int(8)
      }
    }

Use a ``filter`` expression to filter results by the value of a specific field.
The following example query outputs only volumes in the ``us-west-2a``
availability zone:

.. code-block:: php

    $data = $result->search("Volumes[?AvailabilityZone == 'us-west-2a']");

JMESPath also supports function expressions. Let's say you wanted to run the
same query as above, but instead retrieve all volumes in which the volume is
in a region that starts with "us-". The following expression uses the
``starts_with`` function, passing in a string literal of ``us-``. The result
of this function is then compared against the JSON literal value of ``true``,
passing only results of the filter predicate that returned true through the
filter projection.

.. code-block:: php

    $data = $result->search('Volumes[?starts_with(AvailabilityZone, 'us-') == `true`]');

Extracting data from paginators
-------------------------------

As you know from the :doc:`paginators` guide, ``Aws\ResultPaginator`` objects
are used to yield results from a pageable API operation. The SDK allows you to
extract and iterate over filtered data from ``Aws\ResultPaginator`` objects
essentially implementing a `flat-map <http://martinfowler.com/articles/collection-pipeline/flat-map.html>`_
over the iterator in which the result of a JMESPath expression is the map
function.

Let's say you wanted to created an ``Iterator`` the yields only objects from a
bucket that are larger than 1 MB. This can be achieved by first creating a
``ListObjects`` paginator and then applying a ``search()`` function to the
paginator, creating a flat-mapped iterator over the paginated data.

.. code-block:: php

    $result = $s3Client->getPaginator('ListObjects', ['Bucket' => 't1234']);
    $filtered = $result->search('Contents[?Size > `1048576`]');

    // the result yielded as $data will be each individual match from
    // Contents in which the Size attribute is > 1048576.
    foreach ($filtered as $data) {
        var_dump($data);
    }
