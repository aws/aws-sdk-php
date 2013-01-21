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

namespace Aws\Tests\Common\Waiter;

use Aws\Common\Waiter\WaiterConfig;

/**
 * @covers Aws\Common\Waiter\WaiterConfig
 */
class WaiterConfigTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testExtractConfig()
    {
        $config = new WaiterConfig(array(
            'acceptor.foo' => 'baz',
            'acceptor.bar' => 'baz',
            'success.foo' => 'bar',
            'failure.test' => 'bam'
        ));
        $this->assertEquals(array(
            'success.foo' => 'bar',
            'failure.test' => 'bam',
            'failure.foo' => 'baz',
            'success.bar' => 'baz',
            'failure.bar' => 'baz'
        ), $config->toArray());
    }
}
