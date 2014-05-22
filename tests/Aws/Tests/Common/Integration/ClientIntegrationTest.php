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

namespace Aws\Tests\Common\Integration;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\DefaultClient;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Enum\Region;
use Aws\Common\Signature\EndpointSignatureInterface;
use Aws\Common\Signature\SignatureV4;
use Aws\DynamoDb\DynamoDbClient;
use Guzzle\Http\Url;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const REGION_MISSING   = 0;
    const REGION_ERROR     = 1;
    const REGION_NOT_SIGV4 = 2;

    public function testGenericClientCanAccessDynamoDb()
    {
        /** @var $dynamodb DynamoDbClient */
        $dynamodb = $this->getServiceBuilder()->get('dynamodb', true);
        $credentials = $dynamodb->getCredentials();
        $dynamodb = new \ReflectionClass('Aws\DynamoDb\DynamoDbClient');
        $description = require dirname($dynamodb->getFileName()) . '/Resources/dynamodb-2011-12-05.php';

        /** @var $client DefaultClient */
        $client = DefaultClient::factory(array(
            'credentials'         => $credentials,
            'signature'           => new SignatureV4(),
            'service.description' => $description,
            'service'             => 'dynamodb',
            'region'              => 'us-east-1',
        ));

        $command = $client->getCommand('ListTables');
        $command->execute();

        $this->assertEquals(200, $command->getResponse()->getStatusCode());
    }

    public function testCanChangeRegions()
    {
        /** @var $s3 \Aws\S3\S3Client */
        $s3 = $this->getServiceBuilder()->get('s3', true);
        $scheme = $s3->getConfig(Options::SCHEME);

        // Switch to 3 different regions and validate that each switch worked
        foreach (array(Region::US_EAST_1, Region::EU_WEST_1, Region::AP_NORTHEAST_1) as $region) {
            $s3->setRegion($region);
            $endpoint = Url::factory(AbstractClient::getEndpoint($s3->getDescription(), $region, 'https'));
            $command = $s3->getCommand('ListBuckets');
            $request = $command->prepare();
            $this->assertEquals((string) $endpoint, $request->getScheme() . '://' . $request->getHost());
            $this->assertEquals((string) $endpoint, $s3->getConfig(Options::BASE_URL));
            $this->assertEquals($region, $s3->getConfig(Options::REGION));
            $this->assertEquals(200, $command->getResponse()->getStatusCode());
        }
    }

    public function testCanInstantiateRegionlessClientsWithoutParameters()
    {
        $config = array('key' => 'foo', 'secret' => 'bar');

        try {
            // Instantiate all of the clients that do not require a region
            \Aws\S3\S3Client::factory($config);
            \Aws\CloudFront\CloudFrontClient::factory($config);
            \Aws\Route53\Route53Client::factory($config);
            \Aws\Sts\StsClient::factory($config);
        } catch (\InvalidArgumentException $e) {
            $this->fail('All of the above clients should have been instantiated without errors: ' . $e->getMessage());
        }
    }

    /**
     * @dataProvider dataForClientRegionSituationsTest
     */
    public function testClientRegionSituations($service, $region, $expectedGetRegion, $expectedGetSignatureRegion)
    {
        try {
            $config = array('key' => 'test-key', 'secret' => 'test-secret');
            if ($region) {
                $config['region'] = $region;
            }

            $clientFqcn = "Aws\\{$service}\\{$service}Client";
            $client = $clientFqcn::factory($config);

            // Get results
            $actualGetRegion = $client->getRegion();
            if ($client->getSignature() instanceof EndpointSignatureInterface) {
                $actualGetSignatureRegion = $this->readAttribute($client->getSignature(), 'regionName');
            } else {
                $actualGetSignatureRegion = self::REGION_NOT_SIGV4;
            }
        } catch (\InvalidArgumentException $e) {
            // Get results
            $actualGetRegion = self::REGION_ERROR;
            $actualGetSignatureRegion = self::REGION_ERROR;
        }

        $this->assertEquals($expectedGetRegion, $actualGetRegion);
        $this->assertEquals($expectedGetSignatureRegion, $actualGetSignatureRegion);
    }

    public function dataForClientRegionSituationsTest()
    {
        return array(
            // Services with multiple regional endpoints (e.g., DynamoDB, EC2, CloudFormation)
            array('DynamoDB', self::REGION_MISSING, self::REGION_ERROR, self::REGION_ERROR),
            array('DynamoDB', Region::US_EAST_1,    Region::US_EAST_1,  Region::US_EAST_1),
            array('DynamoDB', Region::US_WEST_2,    Region::US_WEST_2,  Region::US_WEST_2),
            array('Ec2',      self::REGION_MISSING, self::REGION_ERROR, self::REGION_ERROR),
            array('Ec2',      Region::US_EAST_1,    Region::US_EAST_1,  self::REGION_NOT_SIGV4),
            array('Ec2',      Region::US_WEST_2,    Region::US_WEST_2,  self::REGION_NOT_SIGV4),

            // Services with a single/few regional endpoint (e.g., Data Pipeline, SES, Redshift)
            array('DataPipeline', self::REGION_MISSING, self::REGION_ERROR, self::REGION_ERROR),
            array('DataPipeline', Region::US_EAST_1,    Region::US_EAST_1,  Region::US_EAST_1),
            array('Redshift',     self::REGION_MISSING, self::REGION_ERROR, self::REGION_ERROR),
            array('Redshift',     Region::US_EAST_1,    Region::US_EAST_1,  Region::US_EAST_1),

            // Services with a global endpoint (e.g., Sts, Iam, Route53)
            array('Sts',     self::REGION_MISSING, Region::US_EAST_1, Region::US_EAST_1),
            array('Sts',     Region::US_EAST_1,    Region::US_EAST_1, Region::US_EAST_1),
            array('Sts',     Region::US_WEST_2,    Region::US_EAST_1, Region::US_EAST_1),
            array('Route53', self::REGION_MISSING, Region::US_EAST_1, self::REGION_NOT_SIGV4),
            array('Route53', Region::US_EAST_1,    Region::US_EAST_1, self::REGION_NOT_SIGV4),
            array('Route53', Region::US_WEST_2,    Region::US_EAST_1, self::REGION_NOT_SIGV4),

            // Services with a global endpoint AND multiple regional endpoints (e.g., S3 only)
            array('S3', self::REGION_MISSING, Region::US_EAST_1, self::REGION_NOT_SIGV4),
            array('S3', Region::US_EAST_1,    Region::US_EAST_1, self::REGION_NOT_SIGV4),
            array('S3', Region::US_WEST_2,    Region::US_WEST_2, self::REGION_NOT_SIGV4),
        );
    }
}
