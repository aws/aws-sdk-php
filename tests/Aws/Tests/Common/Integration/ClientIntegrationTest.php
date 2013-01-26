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

use Aws\Common\Client\DefaultClient;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Enum\Region;
use Aws\Common\Signature\SignatureV4;
use Aws\DynamoDb\DynamoDbClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
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
        $endpointProvider = $s3->getEndpointProvider();

        // Switch to 3 different regions and validate that each switch worked
        foreach (array(Region::US_EAST_1, Region::EU_WEST_1, Region::AP_NORTHEAST_1) as $region) {
            $s3->setRegion($region);
            $endpoint = $endpointProvider->getEndpoint('s3', $region);
            $command  = $s3->getCommand('ListBuckets');
            $request  = $command->prepare();
            $this->assertEquals($endpoint->getBaseUrl($scheme), $request->getScheme() . '://' . $request->getHost());
            $this->assertEquals($endpoint->getBaseUrl($scheme), $s3->getConfig(Options::BASE_URL));
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
}
