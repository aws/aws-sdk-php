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

use Aws\S3\Iterator\OpendirIterator;

/**
 * @covers Aws\S3\Iterator\OpendirIterator
 */
class OpendirIteratorTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testIteratesOpendirResources()
    {
        $dh = opendir(__DIR__);
        $i = new OpendirIterator($dh, __DIR__ . '/');
        $found = false;
        foreach ($i as $file) {
            $this->assertInstanceOf('SplFileInfo', $file);
            $this->assertContains(__DIR__, (string) $file);
            if ($file == __FILE__) {
                $found = true;
            }
        }
        $this->assertTrue($found);
    }
}
