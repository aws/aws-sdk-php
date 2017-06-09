.. Copyright 2010-2017 Amazon.com, Inc. or its affiliates. All Rights Reserved.

   This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0
   International License (the "License"). You may not use this file except in compliance with the
   License. A copy of the License is located at http://creativecommons.org/licenses/by-nc-sa/4.0/.

   This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
   either express or implied. See the License for the specific language governing permissions and
   limitations under the License.

======================================
Working with Amazon S3 Bucket Policies
======================================

.. meta::
   :description: Return, replace, or delete Amazon S3 bucket policies.
   :keywords: Amazon S3, AWS SDK for PHP examples

You can use a bucket policy to grant permission to your Amazon S3 resources. To learn more, see `Using Bucket Policies and User Policies <http://docs.aws.amazon.com/AmazonS3/latest/dev/using-iam-policies.html>`_.

The example below shows how to:

* Return the policy for a specified bucket using `GetBucketPolicy <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#getbucketpolicy>`_.
* Replace a policy on a bucket using `PutBucketPolicy <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#putbucketpolicy>`_.
* Delete a policy from a bucket using `DeleteBucketPolicy <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#deletebucketpolicy>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Get, Delete, and Replace a Policy on a Bucket
---------------------------------------------

.. code-block:: php

    require "vendor/autoload.php";
    use Aws\S3\S3Client;
    use Aws\Exception\AwsException;
    // Create a S3Client
    $s3Client = new S3Client([
        'region' => 'us-west-2',
        'version' => '2006-03-01'
    ]);
    $bucket = 'my-s3-bucket';
    // Get the policy of a specific bucket
    try {
        $resp = $s3Client->getBucketPolicy([
            'Bucket' => $bucket
        ]);
        echo "Succeed in receiving bucket policy:\n";
        echo $resp->get('Policy');
        echo "\n";
    } catch (AwsException $e) {
        // Display error message
        echo $e->getMessage();
        echo "\n";
    }
    // Deletes the policy from the bucket
    try {
        $resp = $s3Client->deleteBucketPolicy([
            'Bucket' => $bucket
        ]);
        echo "Succeed in deleting policy of bucket: " . $bucket . "\n";
    } catch (AwsException $e) {
        // Display error message
        echo $e->getMessage();
        echo "\n";
    }
    // Replaces a policy on the bucket
    try {
        $resp = $s3Client->putBucketPolicy([
            'Bucket' => $bucket,
            'Policy' => 'foo policy',
        ]);
        echo "Succeed in put a policy on bucket: " . $bucket . "\n";
    } catch (AwsException $e) {
        // Display error message
        echo $e->getMessage();
        echo "\n";
    }
