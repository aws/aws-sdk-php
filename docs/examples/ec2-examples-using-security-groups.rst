============================
Working with Security Groups
============================

An Amazon EC2 security group acts as a virtual firewall that controls the traffic for one or more instances. You add rules to each security group to allow traffic to or from its associated instances. You can modify the rules for a security group at any time; the new rules are automatically applied to all instances that are associated with the security group.

The examples below show how to:

* Describe one or more of your security groups using `DescribeSecurityGroups <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#describesecuritygroups>`_.
* Add an ingress rule to a security group using `AuthorizeSecurityGroupIngress <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#authorizesecuritygroupingress>`_.
* Create a security group using `CreateSecurityGroup <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#createsecuritygroup>`_.
* Delete a security group using `DeleteSecurityGroup <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#deletesecuritygroup>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Describe Security Groups
------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $result = $ec2Client->describeSecurityGroups();
    var_dump($result);

Add an Ingress Rule
--------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $result = $ec2Client->authorizeSecurityGroupIngress(array(
        'GroupName' => 'string',
        'SourceSecurityGroupName' => 'string'
    ));
    var_dump($result);

Create a Security Group
-----------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    // Create the security group
    $securityGroupName = 'my-security-group';
    $result = $ec2Client->createSecurityGroup(array(
        'GroupId' => $securityGroupName,
    ));
    // Get the security group ID (optional)
    $securityGroupId = $result->get('GroupId');
    echo "Security Group ID: " . $securityGroupId . '\n';

Delete a Security Group
-----------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $securityGroupId = 'my-security-group-id';
    $result = $ec2Client->deleteSecurityGroup(array(
        'GroupId' => $securityGroupId
    ));
    var_dump($result);
