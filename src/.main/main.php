<?php
require '../../vendor/autoload.php';
//new DateTime("2021-11-04T18:32:34.078319496Z");
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\RejectedPromise;

$clientConfig = [
    'version' => 'latest',
    'region' => 'us-east-2',
    ];
$client = new \Aws\S3\S3Client($clientConfig);
$client->getObject(
    [
        'Bucket' => 'remis-test',
        'Key' => '001',
    ]
);

//$client = new \Aws\S3\S3Client($clientConfig);
//$client->listBuckets(
//);

//$client = new \Aws\Ec2\Ec2Client($clientConfig);
//$client->describeExportImageTasks(
//);

//$client = new \Aws\Iam\IamClient($clientConfig);
//$client->listPolicies(
//);
echo memory_get_usage();