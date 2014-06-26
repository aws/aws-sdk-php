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
 * "integdomain" is used as the test domain throughout this test
 * @group integration
 * @group example
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var CloudSearchClient */
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
            $client->deleteDomain(array('DomainName' => 'integdomain'));
        } catch (\Exception $e) {}
    }

    /**
     * Create a domain
     *
     * @example Aws\CloudSearch\CloudSearchClient::createDomain
     */
    public function testCreatesDomains()
    {
        $client = $this->client;
        self::log('Creating test domain');
        // @begin
        $result = $client->createDomain(array(
            'DomainName' => 'integdomain'
        ));
        // @end
        $result = $result->toArray();
        $this->assertArrayHasKey('DomainStatus', $result);
        $this->assertArrayHasKey('DomainId', $result['DomainStatus']);
        $this->assertArrayHasKey('DomainName', $result['DomainStatus']);
        $this->assertTrue($result['DomainStatus']['Created']);
    }

    /**
     * List domains
     *
     * @depends testCreatesDomains
     * @example Aws\CloudSearch\CloudSearchClient::describeDomains
     */
    public function testListsDomains()
    {
        self::log('Listing domains');
        $client = $this->client;

        // @begin
        $iterator = $client->getIterator('DescribeDomains');
        foreach ($iterator as $domain) {
            echo "{$domain['DomainName']}: {$domain['SearchService']['Endpoint']}\n";
        }
        // @end

        $this->assertContains('integdomain', $this->getActualOutput());
    }
}
