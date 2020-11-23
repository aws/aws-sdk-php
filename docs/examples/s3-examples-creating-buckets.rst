.. Copyright 2010-2018 Amazon.com, Inc. or its affiliates. All Rights Reserved.

   This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0
   International License (the "License"). You may not use this file except in compliance with the
   License. A copy of the License is located at http://creativecommons.org/licenses/by-nc-sa/4.0/.

   This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
   either express or implied. See the License for the specific language governing permissions and
   limitations under the License.

====================================
Creating and Using Amazon S3 Buckets
====================================

.. meta::
   :description:
   :keywords: Amazon S3, AWS SDK for PHP examples

The examples below show how to:

* Return a list of buckets owned by the authenticated sender of the request using `ListBuckets <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#listbuckets>`_.
* Create a new bucket using `CreateBucket <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#createbucket>`_.
* Add an object to a bucket using `PutObject <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#putobject>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

List Buckets
------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\Exception\AwsException;

    //Create a S3Client
    $s3Client = new S3Client([
        'region' => 'us-west-2',
        'version' => '2006-03-01'
    ]);
    //Listing all S3 Bucket
    $buckets = $s3Client->listBuckets();
    foreach ($buckets['Buckets'] as $bucket){
    	echo $bucket['Name']."\n";
    }

Create a Bucket
---------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\Exception\AwsException;

    $BUCKET_NAME='<BUCKET-NAME>';
    //Create a S3Client
    $s3Client = new S3Client([
        'region' => 'us-west-2',
        'version' => '2006-03-01'
    ]);
    //Creating S3 Bucket
    try {
        $result = $s3Client->createBucket([
            'Bucket' => $BUCKET_NAME,
        ]);
    }catch (AwsException $e) {
        // output error message if fails
        echo $e->getMessage();
        echo "\n";
    }

Put an Object in a Bucket
-------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\Exception\AwsException;

    $USAGE = "\n" .
        "To run this example, supply the name of an S3 bucket and a file to\n" .
        "upload to it.\n" .
        "\n" .
        "Ex: php PutObject.php <bucketname> <filename>\n";
    if (count($argv) <= 2){
        echo $USAGE;
        exit();
    }
    $bucket = $argv[1];
    $file_Path = $argv[2];
    $key = basename($argv[2]);
    try{
        //Create a S3Client
        $s3Client = new S3Client([
            'region' => 'us-west-2',
            'version' => '2006-03-01'
        ]);
        $result = $s3Client->putObject([
            'Bucket'     => $bucket,
            'Key'        => $key,
            'SourceFile' => $file_Path,
        ]);
    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }
