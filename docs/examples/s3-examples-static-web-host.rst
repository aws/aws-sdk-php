==============================================
Using an Amazon S3 Bucket as a Static Web Host
==============================================

You can host a static website on Amazon S3. To learn more, see `Hosting a Static Website on Amazon S3 <http://docs.aws.amazon.com/AmazonS3/latest/dev/WebsiteHosting.html>`_.

The example below shows how to:

* Get the website configuration for a bucket using `GetBucketWebsite <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#getbucketwebsite>`_.
* Set the website configuration for a bucket using `PutBucketWebsite <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#putbucketwebsite>`_.
* Remove the website configuration from a bucket using `DeleteBucketWebsite <http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-s3-2006-03-01.html#deletebucketwebsite>`_.

All the example code for the AWS SDK for PHP is available `here on GitHub <https://github.com/awsdocs/aws-doc-sdk-examples/tree/master/php/example_code>`_.

Credentials
-----------

Before running the example code, configure your AWS credentials, as described in :doc:`/guide/credentials`.

Get, Set, and Delete the Website Configuration for a Bucket
-----------------------------------------------------------

.. code-block:: php

    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\Exception\AwsException;
    // Create a S3Client
    $s3Client = new S3Client([
        'region' => 'us-west-2',
        'version' => '2006-03-01'
    ]);
    // Retrieving the Bucket Website Configuration
    $bucket = 'my-s3-bucket';
    try {
        $resp = $s3Client->getBucketWebsite([
            'Bucket' => $bucket
        ]);
        echo "Succeed in retrieving website configuration for bucket: ". $bucket ."\n";
    } catch (AwsException $e) {
        // output error message if fails
        echo $e->getMessage();
        echo "\n";
    }
    // Setting a Bucket Website Configuration
    $params = [
        'Bucket' => $bucket,
        'WebsiteConfiguration' => [
            'ErrorDocument' => [
                'Key' => 'foo',
            ],
            'IndexDocument' => [
                'Suffix' => 'bar',
            ],
        ]
    ];
    try {
        $resp = $s3Client->putBucketWebsite($params);
        echo "Succeed in setting bucket website configuration.\n";
    } catch (AwsException $e) {
        // Display error message
        echo $e->getMessage();
        echo "\n";
    }
    // Deleting a Bucket Website Configuration
    try {
        $resp = $s3Client->deleteBucketWebsite([
            'Bucket' => $bucket
        ]);
        echo "Succeed in deleting policy for bucket: ". $bucket ."\n";
    } catch (AwsException $e) {
        // output error message if fails
        echo $e->getMessage();
        echo "\n";
    }
