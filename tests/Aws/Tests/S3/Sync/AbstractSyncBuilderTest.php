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

use Aws\S3\Sync\AbstractSyncBuilder;
use Aws\S3\Sync\KeyConverter;

/**
 * @covers Aws\S3\Sync\AbstractSyncBuilder
 */
class AbstractSyncBuilderTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasSetters()
    {
        $b = $this->getMockBuilder('Aws\S3\Sync\AbstractSyncBuilder')
            ->getMockForAbstractClass();
        $i = new \ArrayIterator(array('foo', 'test'));
        $c1 = new KeyConverter();
        /** @var $b AbstractSyncBuilder */
        $b->enableDebugOutput(true)
            ->force(true)
            ->setBaseDir('/base')
            ->setBucket('bucket')
            ->setClient($this->getServiceBuilder()->get('s3'))
            ->setConcurrency(2)
            ->setDelimiter('\\')
            ->setKeyPrefix('/prefix/')
            ->setOperationParams(array('foo' => 'bar'))
            ->setSourceFilenameConverter($c1)
            ->setTargetFilenameConverter($c1)
            ->setSourceIterator($i)
            ->addRegexFilter('/foo/');

        $this->assertSame(true, $this->readAttribute($b, 'forcing'));
        $this->assertSame('/base', $this->readAttribute($b, 'baseDir'));
        $this->assertSame('bucket', $this->readAttribute($b, 'bucket'));
        $this->assertSame(2, $this->readAttribute($b, 'concurrency'));
        $this->assertSame('\\', $this->readAttribute($b, 'delimiter'));
        $this->assertSame('prefix/', $this->readAttribute($b, 'keyPrefix'));
        $this->assertSame(array('foo' => 'bar'), $this->readAttribute($b, 'params'));
        $this->assertSame($c1, $this->readAttribute($b, 'sourceConverter'));
        $this->assertSame($c1, $this->readAttribute($b, 'targetConverter'));
        $this->assertSame($this->getServiceBuilder()->get('s3'), $this->readAttribute($b, 'client'));

        $it = $this->readAttribute($b, 'sourceIterator');
        $this->assertInstanceOf('Guzzle\Iterator\FilterIterator', $it);
        $this->assertSame($i, $it->getInnerIterator());
        $this->assertEquals(array('test'), array_values(iterator_to_array($it)));
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     */
    public function testEnsuresSourceIteratorWhenSettingRegex()
    {
        $b = $this->getMockBuilder('Aws\S3\Sync\AbstractSyncBuilder')->getMockForAbstractClass();
        $b->addRegexFilter('/foo/');
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     */
    public function testEnsuresClientIsSet()
    {
        $b = $this->getMockBuilder('Aws\S3\Sync\AbstractSyncBuilder')->getMockForAbstractClass();
        $b->build();
    }

    /**
     * @expectedException \Aws\Common\Exception\RuntimeException
     */
    public function testEnsuresBucketIsSet()
    {
        $b = $this->getMockBuilder('Aws\S3\Sync\AbstractSyncBuilder')->getMockForAbstractClass();
        $b->setClient($this->getServiceBuilder()->get('s3'))->build();
    }

    public function testBuildsUsingSubClasses()
    {
        $a = new \ArrayIterator();
        $mockSync = $this->getMockBuilder('Aws\S3\Sync\AbstractSync')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
        $b = $this->getMockBuilder('Aws\S3\Sync\AbstractSyncBuilder')
            ->setMethods(array('specificBuild', 'getTargetIterator'))
            ->getMockForAbstractClass();
        $b->expects($this->once())
            ->method('specificBuild')
            ->will($this->returnValue($mockSync));
        $b->expects($this->once())
            ->method('getTargetIterator')
            ->will($this->returnValue($a));
        $b->setClient($this->getServiceBuilder()->get('s3'))
            ->setSourceIterator($a)
            ->enableDebugOutput()
            ->setSourceFilenameConverter(new KeyConverter)
            ->setTargetFilenameConverter(new KeyConverter)
            ->setBucket('foo');
        $this->assertSame($mockSync, $b->build());
    }
}
