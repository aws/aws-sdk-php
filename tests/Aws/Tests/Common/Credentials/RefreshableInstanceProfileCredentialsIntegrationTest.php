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

namespace Aws\Tests\Common\Credentials;

use Aws\Common\InstanceMetadata\InstanceMetadataClient;
use Aws\Common\Credentials\Credentials;
use Aws\DynamoDb\DynamoDbClient;
use Guzzle\Cache\DoctrineCacheAdapter;
use Doctrine\Common\Cache\ArrayCache;

/**
 * @group integration
 */
class RefreshableInstanceProfileCredentialsIntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * Ensures that instance profile credentials are used when no credentials are provided to a client
     */
    public function testUsesInstanceProfileCredentialsByDefault()
    {
        $client = InstanceMetadataClient::factory();
        $credentials = Credentials::factory(array(
            'credentials.client' => $client
        ));

        $this->assertInstanceOf('Aws\Common\Credentials\RefreshableInstanceProfileCredentials', $credentials);
        $this->assertSame($client, $this->readAttribute($credentials, 'client'));

        return array($credentials, $client);
    }

    /**
     * Ensures that instance profile credentials are refreshed when they expire
     *
     * @depends testUsesInstanceProfileCredentialsByDefault
     */
    public function testRefreshesExpiredCredentials(array $creds)
    {
        $this->skipIfNotEc2();

        list($credentials, $client) = $creds;

        // Expire the credentials
        $credentials->setExpiration(0);

        if ($this->useMocks()) {
            $this->setMockResponse($client, array('metadata/iam_security_credentials', 'metadata/iam_security_credentials_webapp'));
        }

        $this->assertNotEmpty($credentials->getAccessKeyId());

        if ($this->useMocks()) {
            $this->assertEquals(2, count($this->getMockedRequests()));
        }
    }

    /**
     * Ensures that clients use instance profile credentials by default
     */
    public function testClientsUseInstanceProfileCredentialsByDefault()
    {
        $client = DynamoDbClient::factory(array(
            'region' => 'us-east-1'
        ));
        $this->assertInstanceOf('Aws\Common\Credentials\RefreshableInstanceProfileCredentials', $client->getCredentials());
    }

    /**
     * @depends testUsesInstanceProfileCredentialsByDefault
     */
    public function testClientsUseInstanceProfileCredentials(array $creds)
    {
        $this->skipIfNotEc2();

        list($credentials, $client) = $creds;

        $dynamo = DynamoDbClient::factory(array(
            'credentials' => $credentials
        ));

        // Ensure that the correct credentials object and client are being used
        $this->assertSame($credentials, $dynamo->getCredentials());

        if ($this->useMocks()) {
            $this->setMockResponse($client, array('metadata/iam_security_credentials', 'metadata/iam_security_credentials_webapp'));
            $this->setMockResponse($dynamo, 'dynamodb/list_tables_final');
        }

        // Expire the credentials
        $credentials->setExpiration(0);
        // List a table, causing a credential refresh and list table request
        $this->assertInternalType('array', $dynamo->listTables());
    }

    public function testCredentialsUsesApcCacheWhenCacheIsTrue()
    {
        if (!extension_loaded('apc')) {
            $this->markTestSkipped('APC is not installed');
        }

        $client = InstanceMetadataClient::factory();
        $credentials = Credentials::factory(array(
            'credentials.client' => $client,
            'credentials.cache'  => true
        ));

        $this->assertInstanceOf('Aws\Common\Credentials\CacheableCredentials', $credentials);
        $this->assertInstanceOf('Guzzle\Cache\DoctrineCacheAdapter', $this->readAttribute($credentials, 'cache'));
    }

    public function testCredentialsCanInjectCacheAndUsesHostnameBasedKey()
    {
        $cache = new DoctrineCacheAdapter(new ArrayCache());
        $cache->save('credentials_' . crc32(gethostname()), new Credentials('ABC', '123', 'Listen to me', time() + 10000));
        $credentials = Credentials::factory(array(
            'credentials.cache' => $cache
        ));

        $this->assertInstanceOf('Aws\Common\Credentials\CacheableCredentials', $credentials);
        $this->assertSame($cache, $this->readAttribute($credentials, 'cache'));
        $this->assertEquals('ABC', $credentials->getAccessKeyId());
    }
}
