<?php
namespace Aws\Test\Integ;

use Aws\CognitoSync\Exception\CognitoSyncException;
use Aws\S3\Exception\S3Exception;

class SignaturePathEncodingTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public function testCognitoSyncRequestSucceedsWithColon()
    {
        $client = $this->getSdk()->createClient('CognitoSync');
        $error = null;
        try {
            $client->describeIdentityUsage([
                'IdentityId'     => 'aaa:bbb',
                'IdentityPoolId' => 'ccc:ddd',
            ]);
        } catch (CognitoSyncException $e) {
            $error = $e->getAwsErrorCode();
        }

        $this->assertEquals('ResourceNotFoundException', $error);
    }

    public function testS3RequestSucceedsWithColon()
    {
        $s3 = $this->getSdk()->createClient('S3');
        $bucket = self::getResourcePrefix() . '-php-sdk-colon-test-bucket';

        $s3->createBucketAsync(['Bucket' => $bucket])->then(function () use ($s3, $bucket) {
            return $s3->getWaiter('BucketExists', ['Bucket' => $bucket])->promise();
        })->wait();

        $error = null;
        try {
            $s3->getObject([
                'Bucket' => $bucket,
                'Key'    => 'aaa:bbb',
            ]);
        } catch (S3Exception $e) {
            $error = $e->getAwsErrorCode();
        }

        $s3->deleteBucket(['Bucket' => $bucket]);

        $this->assertEquals('NoSuchKey', $error);
    }
}
