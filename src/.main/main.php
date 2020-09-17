<?php
use \Aws\S3\S3Client;
require '../../vendor/autoload.php';

$s3Client = new S3Client([
    'version' => 'latest',
    'region' => 'us-east-1',
]);

$s3Client->listBuckets();
$partNumber = 0;
$percentComplete = 0;
$partSize = 5242880;
$sourceBucket = 'remis-test';
$sourceKey = 'compressedExample/aws-php-developers-guide.gz';
$destinationBucket='remis-test-copy-here';
$destinationKey = $sourceKey;
$bytesToCopy = 3040870;

//            $percentComplete = intval(100.0 * round((float) ($partNumber * $partSize) / (float) $bytesToCopy, 2));
//
//            print_r([
//                'event' => 'debug_moveS3Object',
//                'level' => 'debug',
//                'bytesToCopy' => $bytesToCopy,
//                'percentComplete' => $percentComplete
//            ]);
//
//            $asset->setCopyProgress(intval($percentComplete));
//            $this->entityManager->flush();
//
//            $partNumber++;
while(true) {

$copier = new MultipartCopy(
$s3Client,
$sourceBucket . '/' . $sourceKey,
[
'bucket' => $destinationBucket,
'key' => $destinationKey,
'part_size' => $partSize,
'before_upload' => function () use ($bytesToCopy, $partSize, &$partNumber, &$asset) {
echo $partNumber . " ";
$partNumber++;
}
]
);
$attempts = 0;

$errorMsg = null;
$result = null;
$maxAttempts = 3;
do {
try {
$result = $copier->copy();
} catch (MultipartUploadException $e) {
$copier = new MultipartCopy(
$this->s3,
$sourceBucket . '/' . $sourceKey,
[
'state' => $e->getState(),
]
);

$errorMsg = $e->getMessage();

$this->logger->log([
'event' => 'multipartUploadFailed',
'level' => 'warning',
'attempts' => $attempts,
'error' => $errorMsg
]);

sleep(10 + ($attempts * 10));
}
} while (isset($result) !== true && $attempts <= $maxAttempts);
}
//$s3_transfer = new Aws\S3\Transfer(
//    $s3Client,
//    new GlobIterator("{$source_dir}/*.gz"),
//    "s3://remis-test/compressedExample/",
//    [
//        'base_dir' => $source_dir,
//        'debug' => true,
//        'mup_threshold'=> 5242880
//    ]
//);*/