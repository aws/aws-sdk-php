.. Copyright 2010-2017 Amazon.com, Inc. or its affiliates. All Rights Reserved.

   This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0
   International License (the "License"). You may not use this file except in compliance with the
   License. A copy of the License is located at http://creativecommons.org/licenses/by-nc-sa/4.0/.

   This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
   either express or implied. See the License for the specific language governing permissions and
   limitations under the License.

============================================
Managing Amazon S3 Bucket Access Permissions
============================================

.. meta::
   :description: Get ACLs and set permissions for Amazon S3 buckets.
   :keywords: Amazon S3, AWS SDK for PHP examples

Access control lists (ACLs) are one of the resource-based access policy options you can use to manage access to your buckets and objects. You can use ACLs to grant basic read/write permissions to other AWS accounts. To learn more, see `Managing Access with ACLs <http://docs.aws.amazon.com/AmazonS3/latest/dev/S3_ACLs_UsingACLs.html>`_.

The example below shows how to:

* Get the access control policy for a bucket using `GetBucketAcl <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#getbucketacl>`_.
* Set the permissions on a bucket using access control lists, using `PutBucketAcl <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#putbucketacl>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Get and Set an Access Control List Policy
-----------------------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\Exception\AwsException;
    // Create a S3Client
    $s3Client = new S3Client([
        'region' => 'us-west-2',
        'version' => '2006-03-01'
    ]);
    // Gets the access control policy for a bucket
    $bucket = 'my-s3-bucket';
    try {
        $resp = $s3Client->getBucketAcl([
            'Bucket' => $bucket
        ]);
        echo "Succeed in retrieving bucket ACL as follows: \n";
        var_dump($resp);
    } catch (AwsException $e) {
        // output error message if fails
        echo $e->getMessage();
        echo "\n";
    }
    // Sets the permissions on a bucket using access control lists (ACL).
    $params = [
        'ACL' => 'public-read',
        'AccessControlPolicy' => [
            // Information can be retrieved from `getBucketAcl` response
            'Grants' => [
                [
                    'Grantee' => [
                        'DisplayName' => '<string>',
                        'EmailAddress' => '<string>',
                        'ID' => '<string>',
                        'Type' => 'CanonicalUser',
                        'URI' => '<string>',
                    ],
                    'Permission' => 'FULL_CONTROL',
                ],
                // ...
            ],
            'Owner' => [
                'DisplayName' => '<string>',
                'ID' => '<string>',
            ],
        ],
        'Bucket' => $bucket,
    ];
    try {
        $resp = $s3Client->putBucketAcl($params);
        echo "Succeed in setting bucket ACL.\n";
    } catch (AwsException $e) {
        // Display error message
        echo $e->getMessage();
        echo "\n";
    }
