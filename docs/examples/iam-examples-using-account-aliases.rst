.. Copyright 2010-2017 Amazon.com, Inc. or its affiliates. All Rights Reserved.

   This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0
   International License (the "License"). You may not use this file except in compliance with the
   License. A copy of the License is located at http://creativecommons.org/licenses/by-nc-sa/4.0/.

   This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
   either express or implied. See the License for the specific language governing permissions and
   limitations under the License.

=========================
Using IAM Account Aliases
=========================

.. meta::
   :description: Create, list, and delete aliases for AWS accout IDs using IAM.
   :keywords: AWS Identity and Access Management, AWS SDK for PHP examples

If you want the URL for your sign-in page to contain your company name or other friendly identifier instead of your AWS account ID, you can create an alias for your AWS account ID. If you create an AWS account alias, your sign-in page URL changes to incorporate the alias.

The examples below show how to:

* Create an alias using `CreateAccountAlias <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#createaccountalias>`_.
* List the alias associated with the AWS account using `ListAccountAliases <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#listaccountaliases>`_.
* Delete an alias using `DeleteAccountAlias <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-iam-2010-05-08.html#deleteaccountalias>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Create an Alias
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
    try {
        $result = $client->createAccountAlias(array(
            // AccountAlias is required
            'AccountAlias' => 'string',
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

List Account Aliases
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
        $result = $client->listAccountAliases();
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Delete an Alias
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
    try {
        $result = $client->deleteAccountAlias(array(
            // AccountAlias is required
            'AccountAlias' => 'string',
        ));
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
