.. Copyright 2010-2017 Amazon.com, Inc. or its affiliates. All Rights Reserved.

   This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0
   International License (the "License"). You may not use this file except in compliance with the
   License. A copy of the License is located at http://creativecommons.org/licenses/by-nc-sa/4.0/.

   This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
   either express or implied. See the License for the specific language governing permissions and
   limitations under the License.

=============================
Managing Amazon EC2 Instances
=============================

.. meta::
   :description:
   :keywords: Amazon EC2, AWS SDK for PHP examples

The examples below show how to:

* Describe EC2 instances using `DescribeInstances <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#describeinstances>`_.
* Enable detailed monitoring for a running instance using `MonitorInstances <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#monitorinstances>`_.
* Disable monitoring for a running instance using `UnmonitorInstances <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#unmonitorinstances>`_.
* Start an Amazon EBS-backed AMI that you've previously stopped, using `StartInstances <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#startinstances>`_.
* Stop an Amazon EBS-backed instance using `StopInstances <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#stopinstances>`_.
* Request a reboot of one or more instances using `RebootInstances <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-ec2-2016-11-15.html#rebootinstances>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Describe Instances
------------------

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

Enable and Disable Monitoring
-----------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $instanceIds = array('InstanceID1', 'InstanceID2');
    $monitorInstance = 'ON';
    if ($monitorInstance == 'ON') {
        $result = $ec2Client->monitorInstances(array(
            'InstanceIds' => $instanceIds
        ));
    } else {
        $result = $ec2Client->unmonitorInstances(array(
            'InstanceIds' => $instanceIds
        ));
    }
    var_dump($result);

Start and Stop an Instance
--------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $action = 'START';
    $instanceIds = array('InstanceID1', 'InstanceID2');
    if ($action == 'START') {
        $result = $ec2Client->startInstances(array(
            'InstanceIds' => $instanceIds,
        ));
    } else {
        $result = $ec2Client->stopInstances(array(
            'InstanceIds' => $instanceIds,
        ));
    }
    var_dump($result);

Reboot an Instances
-------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Ec2\Ec2Client;

    $ec2Client = new Ec2Client([
        'region' => 'us-west-2',
        'version' => '2016-11-15',
        'profile' => 'default'
    ]);
    $instanceIds = array('InstanceID1', 'InstanceID2');
    $result = $ec2Client->rebootInstances(array(
        'InstanceIds' => $instanceIds
    ));
    var_dump($result);
