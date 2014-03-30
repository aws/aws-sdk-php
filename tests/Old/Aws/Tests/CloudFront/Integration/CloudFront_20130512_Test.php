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

namespace Aws\Tests\CloudFront\Integration;

use Aws\CloudFront\CloudFrontClient;
use Guzzle\Http\Client as HttpClient;

/**
 * @group integration
 * @group slow
 * @group example
 */
class CloudFront_20130512_Test extends \Aws\Tests\IntegrationTestCase
{
    /** @var CloudFrontClient */
    public $client;
    protected static $originId;
    protected static $bucketName;
    protected static $distributionUrl;
    protected static $distributionId;

    public static function setUpBeforeClass()
    {
        $s3 = self::getServiceBuilder()->get('s3');
        self::$bucketName = crc32(gethostname()) . '_cftest';

        // Create the test bucket
        self::log('Creating bucket for testing distributions: ' . self::$bucketName);
        $s3->createBucket(array('Bucket' => self::$bucketName));
        $s3->waitUntil('bucket_exists', array('Bucket' => self::$bucketName));

        // Add the test object
        self::log('Bucket created, adding test object...');
        $s3->putObject(array(
            'Bucket' => self::$bucketName,
            'Key'    => 'foo.txt',
            'ACL'    => 'public-read',
            'Body'   => 'hello!'
        ));
        $s3->waitUntil('object_exists', array('Bucket' => self::$bucketName, 'Key' => 'foo.txt'));
    }

    public static function tearDownAfterClass()
    {
        $s3 = self::getServiceBuilder()->get('s3');
        self::log('Deleting test object');
        $s3->deleteObject(array(
            'Bucket' => self::$bucketName,
            'Key'    => 'foo.txt'
        ));
        sleep(1);
        self::log('Deleting test bucket');
        $s3->deleteBucket(array('Bucket' => self::$bucketName));

        /** @var \Aws\CloudFront\CloudFrontClient $cf */
        $cf = self::getServiceBuilder()->get('cloudfront');

        sleep(60);

        if (self::$originId) {
            self::log('Deleting origin access identity');
            try {
                $result = $cf->getCloudFrontOriginAccessIdentity(array('Id' => self::$originId));
                $cf->deleteCloudFrontOriginAccessIdentity(array(
                    'Id'      => self::$originId,
                    'IfMatch' => $result['ETag'],
                ));
            } catch (\Exception $e) {
                echo $e->getMessage() . "\n";
            }
        }

        if (self::$distributionId) {
            self::log('Deleting distribution');
            try {
                $cf->deleteDistribution(array(
                    'Id' => self::$distributionId,
                ));
            } catch (\Exception $e) {
                echo $e->getMessage() . "\n";
            }
        }
    }

    public function setUp()
    {
        $this->client = self::getServiceBuilder()->get('cloudfront', true);
    }

    /**
     * Create an origin access identity
     *
     * @example Aws\CloudFront\CloudFrontClient::createCloudFrontOriginAccessIdentity
     */
    public function testCreatesOrigins()
    {
        $client = $this->client;
        // @begin
        $result = $client->createCloudFrontOriginAccessIdentity(array(
            'CallerReference' => 'foo',
            'Comment'         => 'Hello!'
        ));

        echo $result['Id'] . ' - ' . $result['S3CanonicalUserId'];
        // @end

        $this->assertInstanceOf('Guzzle\Service\Resource\Model', $result);
        $result = $result->toArray();
        $this->assertArrayHasKey('Id', $result);
        self::$originId = $result['Id'];
        $this->assertArrayHasKey('S3CanonicalUserId', $result);
        $this->assertArrayHasKey('CloudFrontOriginAccessIdentityConfig', $result);
        $this->assertEquals(array(
            'CallerReference' => 'foo',
            'Comment'         => 'Hello!'
        ), $result['CloudFrontOriginAccessIdentityConfig']);
        $this->assertArrayHasKey('Location', $result);
        $this->assertArrayHasKey('ETag', $result);

        // Grant CF to read from the bucket
        $s3 = $this->getServiceBuilder()->get('s3');
        $s3->putObjectAcl(array(
            'Bucket'    => self::$bucketName,
            'Key'       => 'foo.txt',
            'GrantRead' => 'id="' . $result['S3CanonicalUserId'] . '"'
        ));
    }

    /**
     * Create a distribution
     *
     * @depends testCreatesOrigins
     * @example Aws\CloudFront\CloudFrontClient::createDistribution
     */
    public function testCreatesDistribution()
    {
        if (!self::$originId) {
            $this->fail('No originId was set');
        }

        self::log("Creating a distribution");

        $client = $this->client;
        $originId = self::$originId;
        $bucketName = self::$bucketName;

        // @begin
        $result = $client->createDistribution(array(
            'Aliases' => array('Quantity' => 0),
            'CacheBehaviors' => array('Quantity' => 0),
            'Comment' => 'Testing... 123',
            'Enabled' => true,
            'CallerReference' => 'BazBar-' . time(),
            'DefaultCacheBehavior' => array(
                'MinTTL' => 3600,
                'ViewerProtocolPolicy' => 'allow-all',
                'TargetOriginId' => $originId,
                'TrustedSigners' => array(
                    'Enabled'  => true,
                    'Quantity' => 1,
                    'Items'    => array('self')
                ),
                'ForwardedValues' => array(
                    'QueryString' => false,
                    'Cookies' => array(
                        'Forward' => 'all'
                    )
                )
            ),
            'DefaultRootObject' => 'foo.txt',
            'Logging' => array(
                'Enabled' => false,
                'Bucket' => '',
                'Prefix' => '',
                'IncludeCookies' => true,
            ),
            'Origins' => array(
                'Quantity' => 1,
                'Items' => array(
                    array(
                        'Id' => $originId,
                        'DomainName' => "{$bucketName}.s3.amazonaws.com",
                        'S3OriginConfig' => array(
                            'OriginAccessIdentity' => 'origin-access-identity/cloudfront/' . $originId
                        )
                    )
                )
            ),
            'PriceClass' => 'PriceClass_All',
        ));

        printf('%s - %s', $result['Status'], $result['Location']) . "\n";
        // @end

        $result = $result->toArray();
        self::$distributionId = $result['Id'];
        $this->assertArrayHasKey('Status', $result);
        $this->assertArrayHasKey('Location', $result);
        self::$distributionUrl = $result['DomainName'];
        $this->assertArrayHasKey('ETag', $result);
        $this->assertEquals(1, $result['DistributionConfig']['Origins']['Quantity']);
        $this->assertArrayHasKey(0, $result['DistributionConfig']['Origins']['Items']);
        $this->assertEquals(self::$bucketName . '.s3.amazonaws.com', $result['DistributionConfig']['Origins']['Items'][0]['DomainName']);

        return $result['Id'];
    }

    /**
     * List distributions
     *
     * @depends testCreatesDistribution
     */
    public function testListsDistributions($id)
    {
        $client = $this->client;
        // @begin
        $result = $client->listDistributions();
        foreach ($result['Items'] as $item) {
            echo $item['Id'] . "\n";
        }
        // @end
        $this->assertGreaterThan(0, $result['Quantity']);
        $this->assertContains($id, $this->getActualOutput());
    }

    /**
     * Create a pre-signed URL
     *
     * @depends testListsDistributions
     * @example Aws\CloudFront\CloudFrontClient::getSignedUrl
     */
    public function testCreatesSignedUrls()
    {
        $client = $this->client;
        self::log('Waiting until the distribution becomes active');
        $client->waitUntil('DistributionDeployed', array('Id' => self::$distributionId));
        $distributionUrl = self::$distributionUrl;

        // @begin
        // Create a signed URL that expires in 1 hour
        $url = $client->getSignedUrl(array(
            'url'     => 'https://' . $distributionUrl . '/foo.txt',
            'expires' => time() + 3600
        ));
        // @end

        self::log('URL: ' . $url);
        try {
            $c = new HttpClient();
            $this->assertEquals('hello!', $c->get($url)->send()->getBody(true));
        } catch (\Exception $e) {
            $this->markTestIncomplete($e->getMessage());
        }
    }
}
