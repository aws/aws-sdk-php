<?php
require __DIR__ . '/artifacts/aws.phar';
Aws\S3\S3Client::factory()->listBuckets();
echo 'Version=' . Aws\Common\Aws::VERSION;
