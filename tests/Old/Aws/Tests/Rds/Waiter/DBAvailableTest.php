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

namespace Aws\Tests\Rds\Waiter;

class DBAvailableTest extends \Guzzle\Tests\GuzzleTestCase
{
	/**
     * @var RdsClient
     */
    public $client;

    public function testDBAvailable()
    {
        $this->client = $this->getServiceBuilder()->get('rds', true);
        $this->setMockResponse($this->client, 'rds/describe_db_instances');
        $this->client->waitUntil('__DBInstanceState', array(
        	'DBInstanceIdentifier' => 'foo',
        	'waiter.success.value' => "available",
        	'waiter.interval'      => 0));
    }
}
