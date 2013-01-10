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

namespace Aws\Tests\Glacier\Model\MultipartUpload;

use Aws\Glacier\Model\MultipartUpload\UploadPart;

/**
 * @covers Aws\Glacier\Model\MultipartUpload\UploadPart
 */
class UploadPartTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testBasicOperations()
    {
        /** @var $part UploadPart */
        $part = UploadPart::fromArray(array(
            'partNumber'  => 3,
            'checksum'    => 'aaa',
            'contentHash' => 'bbb',
            'size'        => 5,
            'offset'      => 2
        ));

        $this->assertEquals(3, $part->getPartNumber());
        $this->assertEquals('aaa', $part->getChecksum());
        $this->assertEquals('bbb', $part->getContentHash());
        $this->assertEquals(5, $part->getSize());
        $this->assertEquals(2, $part->getOffset());
        $this->assertEquals(array(2, 6), $part->getRange());
        $this->assertEquals('bytes 2-6/*', $part->getFormattedRange());
    }
}
