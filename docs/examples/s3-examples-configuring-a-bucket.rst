=============================
Configuring Amazon S3 Buckets
=============================

Cross-origin resource sharing (CORS) defines a way for client web applications that are loaded in one domain to interact with resources in a different domain. With CORS support in Amazon S3, you can build rich client-side web applications with Amazon S3 and selectively allow cross-origin access to your Amazon S3 resources.

For more information about using CORS configuration with an Amazon S3 bucket, see `Cross-Origin Resource Sharing (CORS) <http://docs.aws.amazon.com/AmazonS3/latest/dev/cors.html>`_.

The examples below show how to:

* Get the CORS configuration for a bucket using `GetBucketCors <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#getbucketcors>`_.
* Set the CORS configuration for a bucket using `PutBucketCors <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#putbucketcors>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Get the CORS Configuration
--------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\Exception\AwsException;

    $bucketName = 'BUCKET_NAME';
    $client = new S3Client([
        'region' => 'us-west-2',
        'version' => '2006-03-01'
    ]);
    try {
        $result = $client->getBucketCors([
            'Bucket' => $bucketName, // REQUIRED
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }

Set the CORS Configuration
--------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\Exception\AwsException;

    $bucketName = 'BUCKET_NAME';
    $client = new S3Client([
        'region' => 'us-west-2',
        'version' => '2006-03-01'
    ]);
    try {
        $result = $client->putBucketCors([
            'Bucket' => $bucketName, // REQUIRED
            'CORSConfiguration' => [ // REQUIRED
                'CORSRules' => [ // REQUIRED
                    [
                        'AllowedHeaders' => ['Authorization'],
                        'AllowedMethods' => ['POST', 'GET', 'PUT'], // REQUIRED
                        'AllowedOrigins' => ['*'], // REQUIRED
                        'ExposeHeaders' => [],
                        'MaxAgeSeconds' => 3000
                    ],
                ],
            ]
        ]);
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
