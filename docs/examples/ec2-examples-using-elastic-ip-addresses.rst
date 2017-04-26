==========================================
Using Elastic IP Addresses with Amazon EC2
==========================================

An Elastic IP address is a static IP address designed for dynamic cloud computing. An Elastic IP address is associated with your AWS account. It is a public IP address, which is reachable from the Internet. If your instance does not have a public IP address, you can associate an Elastic IP address with your instance to enable communication with the Internet.

The examples below show how to:

* Describes one or more of your instances using `DescribeInstances <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#describeinstances>`_.
* Acquires an Elastic IP address using `AllocateAddress <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#allocateaddress>`_.
* Associate an Elastic IP address with an instance using `AssociateAddress <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#associateaddress>`_.
* Release an Elastic IP address using `ReleaseAddress <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#releaseaddress>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Describe an Instance
--------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $result = $ec2Client->describeInstances();
    var_dump($result);

Allocate and Associate an Address
---------------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $instanceId = 'InstanceID';
    $allocation = $ec2Client->allocateAddress(array(
        'DryRun' => false,
        'Domain' => 'vpc',
    ));
    $result = $ec2Client->associateAddress(array(
        'DryRun' => false,
        'InstanceId' => $instanceId,
        'AllocationId' => $allocation->get('AllocationId')
    ));
    var_dump($result);

Release an Address
------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $associationID = 'AssociationID';
    $allocationID = 'AllocationID';
    $result = $ec2Client->disassociateAddress(array(
        'AssociationId' => $associationID,
    ));
    $result = $ec2Client->releaseAddress(array(
        'AllocationId' => $allocationID,
    ));
    var_dump($result);
