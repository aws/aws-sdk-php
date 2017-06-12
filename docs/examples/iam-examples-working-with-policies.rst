.. Copyright 2010-2017 Amazon.com, Inc. or its affiliates. All Rights Reserved.

   This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0
   International License (the "License"). You may not use this file except in compliance with the
   License. A copy of the License is located at http://creativecommons.org/licenses/by-nc-sa/4.0/.

   This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
   either express or implied. See the License for the specific language governing permissions and
   limitations under the License.

=========================
Working with IAM Policies
=========================

.. meta::
   :description: Create, attach, or remove IAM user policies.
   :keywords: AWS Identity and Access Management, AWS SDK for PHP examples

You grant permissions to a user by creating a policy, which is a document that lists the actions that a user can perform and the resources those actions can affect. Any actions or resources that are not explicitly allowed are denied by default. Policies can be created and attached to users, groups of users, roles assumed by users, and resources.

The examples below show how to:

* Create a managed policy using `CreatePolicy <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#createpolicy>`_.
* Attach a policy to a role using `AttachRolePolicy <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#attachrolepolicy>`_.
* Attach a policy to a user using `AttachUserPolicy <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#attachuserpolicy>`_.
* Remove a user policy using `DetachUserPolicy <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#detachuserpolicy>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Create a Policy
---------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Iam\IamClient;
    use Aws\Exception\AwsException;

    $client = new IamClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-05-08'
    ]);
    $myManagedPolicy = '{
        "Version": "2012-10-17",
        "Statement": [
            {
                "Effect": "Allow",
                "Action": "logs:CreateLogGroup",
                "Resource": "RESOURCE_ARN"
            },
            {
                "Effect": "Allow",
                "Action": [
                "dynamodb:DeleteItem",
                "dynamodb:GetItem",
                "dynamodb:PutItem",
                "dynamodb:Scan",
                "dynamodb:UpdateItem"
            ],
                "Resource": "RESOURCE_ARN"
            }
        ]
    }';
    try {
        $result = $client->createPolicy(array(
            // PolicyName is required
            'PolicyName' => 'myDynamoDBPolicy',
            // PolicyDocument is required
            'PolicyDocument' => $myManagedPolicy
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Attach a Policy to a Role
-------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Iam\IamClient;
    use Aws\Exception\AwsException;

    $client = new IamClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-05-08'
    ]);
    $roleName = 'ROLE_NAME';
    $policyName = 'AmazonDynamoDBFullAccess';
    $policyArn = 'arn:aws:iam::aws:policy/AmazonDynamoDBFullAccess';
    try {
        $attachedRolePolicies = $client->getIterator('ListAttachedRolePolicies', ([
            'RoleName' => $roleName,
        ]));
        if (count($attachedRolePolicies) > 0) {
            foreach ($attachedRolePolicies as $attachedRolePolicy) {
                if ($attachedRolePolicy['PolicyName'] == $policyName) {
                    echo $policyName . " is already attached to this role. \n";
                    exit();
                }
            }
        }
        $result = $client->attachRolePolicy(array(
            // RoleName is required
            'RoleName' => $roleName,
            // PolicyArn is required
            'PolicyArn' => $policyArn
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Attach a Policy to a User
-------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Iam\IamClient;
    use Aws\Exception\AwsException;

    $client = new IamClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-05-08'
    ]);
    $userName = 'USER_NAME';
    $policyName = 'AmazonDynamoDBFullAccess';
    $policyArn = 'arn:aws:iam::aws:policy/AmazonDynamoDBFullAccess';
    try {
        $attachedUserPolicies = $client->getIterator('ListAttachedUserPolicies', ([
            'UserName' => $userName,
        ]));
        if (count($attachedUserPolicies) > 0) {
            foreach ($attachedUserPolicies as $attachedUserPolicy) {
                if ($attachedUserPolicy['PolicyName'] == $policyName) {
                    echo $policyName . " is already attached to this role. \n";
                    exit();
                }
            }
        }
        $result = $client->attachUserPolicy(array(
            // UserName is required
            'UserName' => $userName,
            // PolicyArn is required
            'PolicyArn' => $policyArn,
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Detach a User Policy
--------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\Iam\IamClient;
    use Aws\Exception\AwsException;

    $client = new IamClient([
        'profile' => 'default',
        'region' => 'us-west-2',
        'version' => '2010-05-08'
    ]);
    try {
        $result = $client->detachUserPolicy(array(
            // UserName is required
            'UserName' => 'string',
            // PolicyArn is required
            'PolicyArn' => 'string',
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
