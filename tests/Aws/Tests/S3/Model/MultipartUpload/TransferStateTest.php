<?php

namespace Aws\Tests\S3\Model;

use Aws\S3\Model\MultipartUpload\TransferState;

/**
 * @covers Aws\S3\Model\MultipartUpload\TransferState
 */
class TransferStateTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConstructorInitializesState()
    {
        $state = new TransferState('foo', 'baz', 'bar');
        $this->assertEquals('foo', $state->getBucket());
        $this->assertEquals('baz', $state->getKey());
        $this->assertEquals('bar', $state->getUploadId());
    }

    public function testHandlesParts()
    {
        $state = new TransferState('foo', 'baz', 'bar');
        $this->assertSame($state, $state->addPart(1, 'abc', 10, gmdate('r')));
        $this->assertSame($state, $state->addPart(2, '123', 20, gmdate('r')));
        $this->assertTrue($state->hasPart(1));
        $this->assertTrue($state->hasPart(2));
        $this->assertEquals(2, count($state));
        $this->assertEquals(array(1, 2), $state->getPartNumbers());
        $this->assertInstanceOf('ArrayIterator', $state->getIterator());

        $part = $state->getPart(1);
        $this->assertArrayHasKey('LastModified', $part);
        unset($part['LastModified']);
        $this->assertEquals(array(
            'ETag'       => 'abc',
            'PartNumber' => 1,
            'Size'       => 10
        ), $part);
    }

    public function testCreatesFromExistingMultipartUpload()
    {
        $client = $this->getServiceBuilder()->get('s3');
        // Queue a mock response to return multiple pages of parts
        $this->setMockResponse($client, array(
            's3/list_parts_page_1',
            's3/list_parts_page_2'
        ));

        $state = TransferState::fromUploadId($client, 'foo', 'baz', 'bar');
        $this->assertEquals(2, count($state));

        foreach ($state as $i => $part) {
            if ($i == 1) {
                $this->assertEquals(array (
                    'ETag'         => '"7778aef83f66abc1fa1e8477f296d394"',
                    'PartNumber'   => '1',
                    'Size'         => '10485760',
                    'LastModified' => '2010-11-10T20:48:34.000Z',
                ), $part);
            } elseif ($i == 2) {
                $this->assertEquals(array (
                    'ETag' => '"aaaa18db4cc2f85cedef654fccc4a4x8"',
                    'PartNumber' => '2',
                    'Size' => '10485760',
                    'LastModified' => '2010-11-10T20:48:33.000Z',
                ), $part);
            }
        }
    }

    public function testHasAbortedFlag()
    {
        $state = new TransferState('foo', 'baz', 'bar');
        $this->assertFalse($state->isAborted());
        $this->assertSame($state, $state->setAborted(true));
        $this->assertTrue($state->isAborted());
    }
}
