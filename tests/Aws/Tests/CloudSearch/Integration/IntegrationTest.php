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

namespace Aws\Tests\CloudSearch\Integration;

use Aws\CloudSearch\CloudSearchClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    const DOMAIN = 'integdomain';

    /**
     * @var CloudSearchClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('cloudsearch');
    }

    public static function tearDownAfterClass()
    {
        self::log('Cleaning up');
        $client = self::getServiceBuilder()->get('cloudsearch');
        try {
            $client->deleteDomain(array('DomainName' => self::DOMAIN));
        } catch (\Exception $e) {}
    }

    public function testCreatesDomains()
    {
        self::log('Creating test domain');
        $result = $this->client->createDomain(array(
            'DomainName' => self::DOMAIN
        ))->toArray();
        $this->assertArrayHasKey('DomainStatus', $result);
        $this->assertArrayHasKey('DomainId', $result['DomainStatus']);
        $this->assertArrayHasKey('DomainName', $result['DomainStatus']);
        $this->assertTrue($result['DomainStatus']['Created']);
    }

    public function testListsDomains()
    {
        self::log('Listing domains');
        $found = false;
        foreach ($this->client->getIterator('DescribeDomains') as $domain) {
            if ($domain['DomainName'] == self::DOMAIN) {
                $found = true;
                break;
            }
        }
        if (!$found) {
            $this->fail('Did not find the domain ' . self::DOMAIN);
        }
    }
}
