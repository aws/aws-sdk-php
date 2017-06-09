.. Copyright 2010-2017 Amazon.com, Inc. or its affiliates. All Rights Reserved.

   This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0
   International License (the "License"). You may not use this file except in compliance with the
   License. A copy of the License is located at http://creativecommons.org/licenses/by-nc-sa/4.0/.

   This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
   either express or implied. See the License for the specific language governing permissions and
   limitations under the License.

========================
Managing IAM Access Keys
========================

.. meta::
   :description: Create, delete, and get information about IAM access keys.
   :keywords: AWS Identity and Access Management, AWS SDK for PHP examples

Users need their own access keys to make programmatic calls to AWS. To fill this need, you can create, modify, view, or rotate access keys (access key IDs and secret access keys) for IAM users. By default, when you create an access key, its status is Active, which means the user can use the access key for API calls.

The examples below show how to:

* Create a secret access key and corresponding access key ID using `CreateAccessKey <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#createaccesskey>`_.
* Return information about the access key IDs associated with an IAM user using `ListAccessKeys <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#listaccesskeys>`_.
* Retrieve information about when an access key was last used using `GetAccessKeyLastUsed <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#getaccesskeylastused>`_.
* Change the status of an access key from Active to Inactive, or vice versa, using `UpdateAccessKey <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#updateaccesskey>`_.
* Delete an access key pair associated with an IAM user using `DeleteAccessKey <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#deleteaccesskey>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Create an Access Key
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
        $result = $client->createAccessKey([
            'UserName' => 'IAM_USER_NAME',
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

List Access Keys
----------------

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
        $result = $client->listAccessKeys();
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Get Info about Access Key's Last Usage
--------------------------------------

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
        $result = $client->getAccessKeyLastUsed([
            'AccessKeyId' => 'ACCESS_KEY_ID', // REQUIRED
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Update an Access Key
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
        $result = $client->updateAccessKey([
            'AccessKeyId' => 'ACCESS_KEY_ID', // REQUIRED
            'Status' => 'Inactive', // REQUIRED
            'UserName' => 'IAM_USER_NAME',
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Delete an Access Key
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
        $result = $client->deleteAccessKey([
            'AccessKeyId' => 'ACCESS_KEY_ID', // REQUIRED
            'UserName' => 'IAM_USER_NAME',
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
