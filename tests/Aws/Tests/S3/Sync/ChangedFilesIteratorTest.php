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

namespace Aws\Tests\S3\Sync;

use Aws\S3\Sync\ChangedFilesIterator;
use Aws\S3\Sync\KeyConverter;

/**
 * @covers Aws\S3\Sync\ChangedFilesIterator
 */
class ChangedFilesIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function setUp()
    {
        if (!\can_mock_internal_classes()) {
            $this->markTestSkipped('Cannot mock internal classes');
        }
    }

    public function testRetrievesAndCachesTargetData()
    {
        $ctime = strtotime('January 1, 2013');

        $a = $this->getMockBuilder('SplFileinfo')
            ->setMethods(array('getSize', 'getMTime', '__toString'))
            ->disableOriginalConstructor()
            ->getMock();
        $a->expects($this->any())->method('getSize')->will($this->returnValue(10));
        $a->expects($this->any())->method('getMTime')->will($this->returnValue($ctime));
        $a->expects($this->any())->method('__toString')->will($this->returnValue(''));

        $b = $this->getMockBuilder('SplFileinfo')
            ->setMethods(array('getSize', 'getMTime', '__toString'))
            ->disableOriginalConstructor()
            ->getMock();
        $b->expects($this->any())->method('getSize')->will($this->returnValue(11));
        $b->expects($this->any())->method('getMTime')->will($this->returnValue($ctime));
        $a->expects($this->any())->method('__toString')->will($this->returnValue(''));

        $c = 0;
        $converter = $this->getMockBuilder('Aws\S3\Sync\KeyConverter')
            ->setMethods(array('convert'))
            ->getMock();
        $converter->expects($this->any())
            ->method('convert')
            ->will($this->returnCallback(function () use (&$c) {
                if (++$c == 1) {
                    return 'foo';
                } else {
                    return 'bar';
                }
            }));

        $targetIterator = new \ArrayIterator(array($b, $a));
        $targetIterator->rewind();
        $changed = new ChangedFilesIterator($targetIterator, $targetIterator, $converter, $converter);
        $ref = new \ReflectionMethod($changed, 'getTargetData');
        $ref->setAccessible(true);
        $this->assertEquals(array(10, $ctime), $ref->invoke($changed, 'bar'));
        $this->assertEquals(array(11, $ctime), $ref->invoke($changed, 'foo'));
        $this->assertFalse($ref->invoke($changed, 'baz'));
    }

    public function compareDataProvider()
    {
        $t = strtotime('January 1, 2013');

        return array(
            array(10, $t, array(10, $t), false),
            array(10, $t, array(11, $t), true),
            array(10, $t + 10, array(10, $t), true),
            array(10, $t, false, true),
        );
    }

    /**
     * @dataProvider compareDataProvider
     */
    public function testComparesData($size1, $time1, $returnValue, $present)
    {
        $a = $this->getMockBuilder('SplFileinfo')
            ->setMethods(array('getSize', 'getMTime', '__toString'))
            ->disableOriginalConstructor()
            ->getMock();
        $a->expects($this->any())->method('getSize')->will($this->returnValue($size1));
        $a->expects($this->any())->method('getMTime')->will($this->returnValue($time1));
        $a->expects($this->any())->method('__toString')->will($this->returnValue(''));

        $i1 = new \ArrayIterator(array($a));
        $i2 = new \ArrayIterator(array());
        $converter = new KeyConverter();

        $iterator = $this->getMockBuilder('Aws\S3\Sync\ChangedFilesIterator')
            ->setMethods(array('getTargetData'))
            ->setConstructorArgs(array($i1, $i2, $converter, $converter))
            ->getMock();
        $iterator->expects($this->once())
            ->method('getTargetData')
            ->will($this->returnValue($returnValue));

        $results = iterator_to_array($iterator);

        if ($present) {
            $this->assertCount(1, $results);
        } else {
            $this->assertCount(0, $results);
            $this->assertCount(0, $iterator->getUnmatched());
        }
    }
}
