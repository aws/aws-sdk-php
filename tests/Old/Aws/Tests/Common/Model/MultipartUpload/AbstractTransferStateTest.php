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

namespace Aws\Tests\Common\Model\MultipartUpload;

use Aws\Common\Model\MultipartUpload\AbstractTransferState;
use Aws\Common\Model\MultipartUpload\AbstractUploadId;

/**
 * @covers Aws\Common\Model\MultipartUpload\AbstractTransferState
 */
class AbstractTransferStateTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @var UploadId
     */
    protected $mockUploadId;

    public function setUp()
    {
        $this->mockUploadId = $this->getMockBuilder('Aws\Common\Model\MultipartUpload\AbstractUploadId')
            ->setMethods(array('toParams'))
            ->getMock();
        $this->mockUploadId->expects($this->any())
            ->method('toParams')
            ->will($this->returnValue(array(
                'accountId' => '-',
                'vaultName' => 'foo',
                'uploadId'  => 'bar'
            )
        ));
    }

    protected function getMockedPart($number)
    {
        $part = $this->getMockForAbstractClass('Aws\Common\Model\MultipartUpload\AbstractUploadPart');
        $r = new \ReflectionClass('Aws\Common\Model\MultipartUpload\AbstractUploadPart');
        $p = $r->getProperty('partNumber');
        $p->setAccessible(true);
        $p->setValue($part, $number);

        return $part;
    }

    public function testConstructorInitializesState()
    {
        $state = $this->getMockForAbstractClass('Aws\Common\Model\MultipartUpload\AbstractTransferState',
            array($this->mockUploadId)
        );

        $this->assertSame($this->mockUploadId, $state->getUploadId());
    }

    public function testHandlesParts()
    {
        $state = $this->getMockForAbstractClass('Aws\Common\Model\MultipartUpload\AbstractTransferState',
            array($this->mockUploadId)
        );

        $part1 = $this->getMockedPart(1);
        $part2 = $this->getMockedPart(2);
        $this->assertSame($state, $state->addPart($part1));
        $this->assertSame($state, $state->addPart($part2));
        $this->assertTrue($state->hasPart(1));
        $this->assertTrue($state->hasPart(2));
        $this->assertSame($part1, $state->getPart(1));
        $this->assertSame($part2, $state->getPart(2));
        $this->assertEquals(2, count($state));
        $this->assertEquals(array(1, 2), $state->getPartNumbers());
        $this->assertInstanceOf('ArrayIterator', $state->getIterator());
    }

    public function testCanMarkStateAsAborted()
    {
        $state = $this->getMockForAbstractClass('Aws\Common\Model\MultipartUpload\AbstractTransferState',
            array($this->mockUploadId)
        );

        $this->assertSame($state, $state->setAborted(true));
        $this->assertTrue($state->isAborted());
        $this->assertSame($state, $state->setAborted(false));
        $this->assertFalse($state->isAborted());
    }

    public function testSerializationWorks()
    {
        $state1 = $this->getMockForAbstractClass('Aws\Common\Model\MultipartUpload\AbstractTransferState',
            array($this->mockUploadId)
        );

        $this->assertInstanceOf('Aws\Common\Model\MultipartUpload\AbstractUploadId', $state1->getUploadId());
        $this->assertEquals(array(), $state1->getPartNumbers());
        $this->assertFalse($state1->isAborted());

        $serialized = serialize($state1);
        $state2 = unserialize($serialized);

        $this->assertInstanceOf('Aws\Common\Model\MultipartUpload\AbstractUploadId', $state2->getUploadId());
        $this->assertEquals(array(), $state2->getPartNumbers());
        $this->assertFalse($state2->isAborted());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testSerializationFailsWhenPropertyIsMissing()
    {
        $state1 = $this->getMockForAbstractClass('Aws\Common\Model\MultipartUpload\AbstractTransferState',
            array($this->mockUploadId)
        );

        $serialized = str_replace('uploadId', 'xxxxxxxx', serialize($state1));
        unserialize($serialized);
    }
}
