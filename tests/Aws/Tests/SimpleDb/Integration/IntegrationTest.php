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

namespace Aws\Tests\SimpleDb\Integration;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var \Aws\SimpleDb\SimpleDbClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('sdb');
    }

    public function testListsDomainsResultIsProcessedCorrectly()
    {
        $result = $this->client->listDomains();
        $this->assertInternalType('array', $result['DomainNames']);
        $this->assertNull($result['DomainName']);
    }
}
