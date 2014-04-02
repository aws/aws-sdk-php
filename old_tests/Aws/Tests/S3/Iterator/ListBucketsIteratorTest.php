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

namespace Aws\Tests\S3\Iterator;

use Aws\S3\Iterator\ListBucketsIterator;
use Guzzle\Service\Resource\Model;

/**
 * @covers Aws\S3\Iterator\ListBucketsIterator
 */
class ListBucketsIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testResultHandlingWorks()
    {
        $command = $this->getMock('Guzzle\Service\Command\CommandInterface');
        $iterator = new ListBucketsIterator($command, array('names_only' => true));
        $model = new Model(array(
            'Buckets' => array(
                array('Name' => 'Foo'),
                array('Name' => 'Bar'),
                array('Name' => 'Baz'),
            )
        ));

        $class = new \ReflectionObject($iterator);
        $method = $class->getMethod('handleResults');
        $method->setAccessible(true);
        $items = $method->invoke($iterator, $model);

        $this->assertCount(3, $items);
        $this->assertEquals(array('Foo', 'Bar', 'Baz'), $items);
    }
}
