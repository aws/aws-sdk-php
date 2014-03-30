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

namespace Aws\Tests\Iam;

use Aws\Iam\IamClient;

/**
 * @covers Aws\Iam\IamClient
 */
class IamClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIsGlobal()
    {
        $c = IamClient::factory(array(
            'key' => 'foo',
            'secret' => 'bar'
        ));
        $this->assertEquals('https://iam.amazonaws.com', $c->getBaseUrl());
        $this->assertNotNull($c->getDescription());
    }
}
