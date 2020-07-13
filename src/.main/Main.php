<?php

use Aws\S3\MultipartCopy;
use Aws\S3\S3Client;

require '../../vendor/autoload.php';

$s3Client = new S3Client([
    'profile' => 'default',
    'region' => 'us-east-2',
    'version' => 'latest'
]);

function my_callback_function() {
    echo 'this part complete';
}


// Use multipart upload
$source = 's3string.txt';
$copier = new MultipartCopy($s3Client, "remis-test/{$source}", [
    'Bucket' => 'copy-bucket-in-ireland',
    'Key' => 's3string.txt',
    'ci' => 'my_callback_function',
]);
//$s3Client->copyObject([
//    'Bucket'     => 'copy-bucket-in-ireland',
//    'Key'        => "{$source}",
//    'CopySource' => "remis-test/{$source}",
//]);
try {
    $result = $copier->copy();
    echo "Upload complete: {$result['ObjectURL']}\n";
} catch (MultipartUploadException $e) {
    echo $e->getMessage() . "\n";
}
