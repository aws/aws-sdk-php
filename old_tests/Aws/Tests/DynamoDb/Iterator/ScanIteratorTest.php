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

namespace Aws\Tests\DynamoDb\Iterator;

use Aws\DynamoDb\Iterator\ScanIterator;
use Guzzle\Common\Version;
use Guzzle\Service\Resource\Model;

/**
 * @covers Aws\DynamoDb\Iterator\ScanIterator
 */
class ScanIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testCanGetScannedCount()
    {
        $emitWarnings = Version::$emitWarnings;
        Version::$emitWarnings = false;

        $command = $this->getMock('Guzzle\Service\Command\CommandInterface');
        $iterator = new ScanIterator($command, array('result_key' => 'Items'));
        $model = new Model(array(
            'Items' => array(1, 2, 3),
            'ScannedCount' => 4
        ));

        $class = new \ReflectionObject($iterator);
        $method = $class->getMethod('handleResults');
        $method->setAccessible(true);
        $items = $method->invoke($iterator, $model);

        $this->assertEquals(4, $iterator->getScannedCount());
        $this->assertCount(3, $items);

        Version::$emitWarnings = $emitWarnings;
    }
}
