<?php

namespace Aws\Test\Integ;

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Aws\Sts\StsClient;

trait S3ContextTrait
{
    private static function getResourceName()
    {
        static $bucketName;

        if (empty($bucketName)) {
            $bucketName =
                self::getResourcePrefix() . 'aws-test-integ-s3-context';
        }

        return $bucketName;
    }

    private static function doCreateTestBucket(): void {
        $client = self::getSdk()->createS3();
        if (!$client->doesBucketExistV2(self::getResourceName())) {
            $client->createBucket(['Bucket' => self::getResourceName()]);
            $client->waitUntil('BucketExists', [
                'Bucket' => self::getResourceName(),
            ]);
        }
    }

    private static function doDeleteTestBucket(): void {
        $client = self::getSdk()->createS3();
        $result = self::executeWithRetries(
            $client,
            'listObjectsV2',
            ['Bucket' => self::getResourceName()],
            10,
            [404]
        );

        // Delete objects & wait until no longer available before deleting bucket
        $client->deleteMatchingObjects(self::getResourceName(), '', '//');
        if (!empty($result['Contents']) && is_array($result['Contents'])) {
            foreach ($result['Contents'] as $object) {
                $client->waitUntil('ObjectNotExists', [
                    'Bucket' => self::getResourceName(),
                    'Key' => $object['Key'],
                    '@waiter' => [
                        'maxAttempts' => 60,
                        'delay' => 10,
                    ],
                ]);
            }
        }

        // Delete bucket
        $result = self::executeWithRetries(
            $client,
            'deleteBucket',
            ['Bucket' => self::getResourceName()],
            10,
            [404]
        );

        // Use account number to generate a unique bucket name
        $sts = new StsClient([
            'version' => 'latest',
            'region' => 'us-east-1'
        ]);
        $identity = $sts->getCallerIdentity([]);
        $logBucket = self::INTEG_LOG_BUCKET_PREFIX . "-{$identity['Account']}";

        // Log bucket deletion result
        if (!($client->doesBucketExistV2($logBucket))) {
            $client->createBucket([
                'Bucket' => $logBucket
            ]);
        }
        $client->putObject([
            'Bucket' => $logBucket,
            'Key' => self::getResourceName() . '-' . date('Y-M-d__H_i_s'),
            'Body' => print_r($result->toArray(), true)
        ]);

        // Wait until bucket is no longer available
        $client->waitUntil('BucketNotExists', [
            'Bucket' => self::getResourceName(),
        ]);
    }

    /**
     * Executes S3 client method, adding retries for specified status codes.
     * A practical work-around for the testing workflow, given eventual
     * consistency constraints.
     *
     * @param S3Client $client
     * @param string $command
     * @param array $args
     * @param int $retries
     * @param array $statusCodes
     * @return mixed
     */
    private static function executeWithRetries(
        $client,
        $command,
        $args,
        $retries,
        $statusCodes
    ) {
        $attempts = 0;

        while (true) {
            try {
                return call_user_func([$client, $command], $args);
            } catch (S3Exception $e) {
                if (!in_array($e->getStatusCode(), $statusCodes)
                    || $attempts >= $retries
                ) {
                    throw $e;
                }
                $attempts++;
                sleep((int) pow(1.2, $attempts));
            }
        }
    }
}