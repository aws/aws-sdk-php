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

use Aws\S3\Sync\KeyConverter;

/**
 * @covers Aws\S3\Sync\KeyConverter
 */
class KeyConverterTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testConvertsKeys()
    {
        $c = new KeyConverter('/test/123', '/foo', '|');
        $this->assertEquals('/foo|abc|123', $c->convert('/test/123/abc/123'));
    }

    public function testDoesNotStripLeadingSlash()
    {
        $c = new KeyConverter('/test', '../foo/');
        $this->assertEquals('../foo/123/abc', $c->convert('/test/123/abc'));
    }
}
