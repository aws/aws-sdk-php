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

namespace Aws\Tests\S3\Model\MultipartUpload;

use Aws\Common\Enum\DateFormat;
use Aws\S3\Model\MultipartUpload\UploadPart;

/**
 * @covers Aws\S3\Model\MultipartUpload\UploadPart
 */
class UploadPartTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testBasicOperations()
    {
        $date = gmdate(DateFormat::RFC2822);

        /** @var $part UploadPart */
        $part = UploadPart::fromArray(array(
            'PartNumber'   => 3,
            'ETag'         => 'aaa',
            'LastModified' => $date,
            'Size'         => 5
        ));

        $this->assertEquals(3, $part->getPartNumber());
        $this->assertEquals('aaa', $part->getETag());
        $this->assertEquals($date, $part->getLastModified());
        $this->assertEquals(5, $part->getSize());
    }
}
