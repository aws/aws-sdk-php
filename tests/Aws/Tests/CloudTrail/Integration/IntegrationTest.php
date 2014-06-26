<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\CloudTrail\Integration;

use Aws\CloudTrail\CloudTrailClient;
use Aws\S3\S3Client;

/**
 * @group integration
 * @group example
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var CloudTrailClient */
    protected $cloudtrail;

    /** @var S3Client */
    protected $s3;

    public function setUp()
    {
        $aws = $this->getServiceBuilder();

        $this->cloudtrail = $aws->get('cloudtrail');
        $this->s3 = $aws->get('s3');
    }

    /**
     * Execute the CreateTrail operation
     *
     * @example Aws\CloudTrail\CloudTrailClient::createTrail
     * @example Aws\S3\S3Client::putBucketPolicy
     * @example Aws\S3\S3Client::waitUntilBucketExists
     */
    public function testCreateTrail()
    {
        $client = $this->cloudtrail;
        $s3 = $this->s3;
        $bucket = 'php-' . $this->getResourcePrefix() . '-cloudtrail';

        self::log('Delete existing trails.');
        foreach ($client->getIterator('DescribeTrails') as $trail) {
            $client->deleteTrail(array('Name' => $trail['Name']));
        }

        self::log('Create an S3 bucket and a CloudTrail trail that logs to that bucket.');

        // @begin
        // Create a bucket in S3 to store the logs and configure the policy
        $s3->createBucket(array('Bucket' => $bucket));
        $s3->waitUntil('BucketExists]', array('Bucket' => $bucket));
        $s3->putBucketPolicy(array(
            'Bucket' => $bucket,
            'Policy' => json_encode(array(
                'Statement' => array(
                    array(
                        'Sid' => 'cloudtrail-to-s3',
                        'Action' => array(
                            's3:GetBucketAcl',
                            's3:PutObject'
                        ),
                        'Effect' => 'Allow',
                        'Resource' => array(
                            "arn:aws:s3:::{$bucket}",
                            "arn:aws:s3:::{$bucket}/AWSLogs/*"
                        ),
                        'Principal' => array(
                            'AWS' => array(
                                // Documented CloudTrail Principal ARNs
                                'arn:aws:iam::086441151436:root',
                                'arn:aws:iam::113285607260:root'
                            )
                        )
                    )
                )
            ))
        ));

        // Create a CloudTrail trail and set the bucket to use
        $client->createTrail(array(
            'Name'         => 'test-trail',
            'S3BucketName' => $bucket,
        ));

        // @end
        return $bucket;
    }

    /**
     * Execute the StartLogging operations
     *
     * @example Aws\CloudTrail\CloudTrailClient::startLogging
     * @depends testCreateTrail
     */
    public function testStartLogging($bucket)
    {
        $client = $this->cloudtrail;

        // @begin
        $client->startLogging(array(
            'Name' => 'test-trail'
        ));

        // @end
        return $bucket;
    }

    /**
     * Execute the StopLogging operations
     *
     * @example Aws\CloudTrail\CloudTrailClient::stopLogging
     * @depends testStartLogging
     */
    public function testStopLogging($bucket)
    {
        $client = $this->cloudtrail;

        // @begin
        $client->stopLogging(array(
            'Name' => 'test-trail'
        ));

        // @end
        return $bucket;
    }

    /**
     * Execute the DescribeTrails and DeleteTrail operations
     *
     * @example Aws\CloudTrail\CloudTrailClient::deleteTrail
     * @example Aws\CloudTrail\CloudTrailClient::getDescribeTrailsIterator
     * @depends testStopLogging
     */
    public function testDeleteTrails($bucket)
    {
        $client = $this->cloudtrail;

        // @begin
        // List and delete all of the trails
        $trails = $client->getIterator('DescribeTrails');
        foreach ($trails as $trail) {
            $client->deleteTrail(array('Name' => $trail['Name']));
            echo "Deleted trail {$trail['Name']}.\n";
        }

        // @end
        $this->assertEquals("Deleted trail test-trail.\n", $this->getActualOutput());

        // Clean up test bucket
        sleep(5);
        if ($this->s3->doesBucketExist($bucket)) {
            $this->s3->clearBucket($bucket);
            $this->s3->deleteBucket(array('Bucket' => $bucket));
        }
    }
}
