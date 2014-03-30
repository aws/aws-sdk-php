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

use Aws\Common\Model\MultipartUpload\AbstractUploadPart;

/**
 * Concrete test fixture
 */
class UploadPart extends AbstractUploadPart
{
    protected static $keyMap = array('PARTNUMBER' => 'partNumber', 'fOObAR' => 'fooBar');
    protected $fooBar;
}

/**
 * @covers Aws\Common\Model\MultipartUpload\AbstractUploadPart
 */
class AbstractUploadPartTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testUploadPartCorrectlyManagesData()
    {
        $startingData = array('PARTNUMBER' => 5, 'fOObAR' => 10);
        $uploadPart = UploadPart::fromArray($startingData);
        $this->assertEquals(5, $uploadPart->getPartNumber());
        $serialized = serialize($uploadPart);
        $unserialized = unserialize($serialized);
        $endingData = $unserialized->toArray();

        $this->assertEquals($startingData, $endingData);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionWhenMissingData()
    {
        UploadPart::fromArray(array('wrongKey' => 'dummyData'));
    }
}
