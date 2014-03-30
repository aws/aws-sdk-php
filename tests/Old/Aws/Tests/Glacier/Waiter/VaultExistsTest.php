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

namespace Aws\Tests\Glacier\Waiter;

class VaultExistsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testReturnsTrueIfVaultExists()
    {
        $client = $this->getServiceBuilder()->get('glacier', true);
        $this->setMockResponse($client, 'glacier/describe_vault');
        $client->waitUntil('VaultExists', array('vaultName' => 'foo'));
        $this->assertEquals(1, count($this->getMockedRequests()));
    }

    public function testRetriesUntilVaultExists()
    {
        $client = $this->getServiceBuilder()->get('glacier', true);
        $this->setMockResponse($client, array('glacier/describe_vault_error', 'glacier/describe_vault_error', 'glacier/describe_vault'));
        $client->waitUntil('VaultExists', array('vaultName' => 'foo', 'waiter.interval' => 0));
        $this->assertEquals(3, count($this->getMockedRequests()));
    }
}
